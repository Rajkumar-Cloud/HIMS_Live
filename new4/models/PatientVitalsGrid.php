<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientVitalsGrid extends PatientVitals
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_vitals';

    // Page object name
    public $PageObjName = "PatientVitalsGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpatient_vitalsgrid";
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

        // Table object (patient_vitals)
        if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
            $GLOBALS["patient_vitals"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "PatientVitalsAdd";

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

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();
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
        if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MobileNumber") && $CurrentForm->hasValue("o_MobileNumber") && $this->MobileNumber->CurrentValue != $this->MobileNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HT") && $CurrentForm->hasValue("o_HT") && $this->HT->CurrentValue != $this->HT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_WT") && $CurrentForm->hasValue("o_WT") && $this->WT->CurrentValue != $this->WT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SurfaceArea") && $CurrentForm->hasValue("o_SurfaceArea") && $this->SurfaceArea->CurrentValue != $this->SurfaceArea->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BodyMassIndex") && $CurrentForm->hasValue("o_BodyMassIndex") && $this->BodyMassIndex->CurrentValue != $this->BodyMassIndex->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AnticoagulantifAny") && $CurrentForm->hasValue("o_AnticoagulantifAny") && $this->AnticoagulantifAny->CurrentValue != $this->AnticoagulantifAny->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_FoodAllergies") && $CurrentForm->hasValue("o_FoodAllergies") && $this->FoodAllergies->CurrentValue != $this->FoodAllergies->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GenericAllergies") && $CurrentForm->hasValue("o_GenericAllergies") && $this->GenericAllergies->CurrentValue != $this->GenericAllergies->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GroupAllergies") && $CurrentForm->hasValue("o_GroupAllergies") && $this->GroupAllergies->CurrentValue != $this->GroupAllergies->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Temp") && $CurrentForm->hasValue("o_Temp") && $this->Temp->CurrentValue != $this->Temp->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Pulse") && $CurrentForm->hasValue("o_Pulse") && $this->Pulse->CurrentValue != $this->Pulse->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BP") && $CurrentForm->hasValue("o_BP") && $this->BP->CurrentValue != $this->BP->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PR") && $CurrentForm->hasValue("o_PR") && $this->PR->CurrentValue != $this->PR->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CNS") && $CurrentForm->hasValue("o_CNS") && $this->CNS->CurrentValue != $this->CNS->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RSA") && $CurrentForm->hasValue("o_RSA") && $this->RSA->CurrentValue != $this->RSA->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CVS") && $CurrentForm->hasValue("o_CVS") && $this->CVS->CurrentValue != $this->CVS->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PA") && $CurrentForm->hasValue("o_PA") && $this->PA->CurrentValue != $this->PA->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PS") && $CurrentForm->hasValue("o_PS") && $this->PS->CurrentValue != $this->PS->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PV") && $CurrentForm->hasValue("o_PV") && $this->PV->CurrentValue != $this->PV->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_clinicaldetails") && $CurrentForm->hasValue("o_clinicaldetails") && $this->clinicaldetails->CurrentValue != $this->clinicaldetails->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue) {
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
        $this->mrnno->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->PatID->clearErrorMessage();
        $this->MobileNumber->clearErrorMessage();
        $this->HT->clearErrorMessage();
        $this->WT->clearErrorMessage();
        $this->SurfaceArea->clearErrorMessage();
        $this->BodyMassIndex->clearErrorMessage();
        $this->AnticoagulantifAny->clearErrorMessage();
        $this->FoodAllergies->clearErrorMessage();
        $this->GenericAllergies->clearErrorMessage();
        $this->GroupAllergies->clearErrorMessage();
        $this->Temp->clearErrorMessage();
        $this->Pulse->clearErrorMessage();
        $this->BP->clearErrorMessage();
        $this->PR->clearErrorMessage();
        $this->CNS->clearErrorMessage();
        $this->RSA->clearErrorMessage();
        $this->CVS->clearErrorMessage();
        $this->PA->clearErrorMessage();
        $this->PS->clearErrorMessage();
        $this->PV->clearErrorMessage();
        $this->clinicaldetails->clearErrorMessage();
        $this->status->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->Age->clearErrorMessage();
        $this->Gender->clearErrorMessage();
        $this->PatientId->clearErrorMessage();
        $this->Reception->clearErrorMessage();
        $this->HospID->clearErrorMessage();
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
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->MobileNumber->CurrentValue = null;
        $this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->HT->CurrentValue = null;
        $this->HT->OldValue = $this->HT->CurrentValue;
        $this->WT->CurrentValue = null;
        $this->WT->OldValue = $this->WT->CurrentValue;
        $this->SurfaceArea->CurrentValue = null;
        $this->SurfaceArea->OldValue = $this->SurfaceArea->CurrentValue;
        $this->BodyMassIndex->CurrentValue = null;
        $this->BodyMassIndex->OldValue = $this->BodyMassIndex->CurrentValue;
        $this->ClinicalFindings->CurrentValue = null;
        $this->ClinicalFindings->OldValue = $this->ClinicalFindings->CurrentValue;
        $this->ClinicalDiagnosis->CurrentValue = null;
        $this->ClinicalDiagnosis->OldValue = $this->ClinicalDiagnosis->CurrentValue;
        $this->AnticoagulantifAny->CurrentValue = null;
        $this->AnticoagulantifAny->OldValue = $this->AnticoagulantifAny->CurrentValue;
        $this->FoodAllergies->CurrentValue = null;
        $this->FoodAllergies->OldValue = $this->FoodAllergies->CurrentValue;
        $this->GenericAllergies->CurrentValue = null;
        $this->GenericAllergies->OldValue = $this->GenericAllergies->CurrentValue;
        $this->GroupAllergies->CurrentValue = null;
        $this->GroupAllergies->OldValue = $this->GroupAllergies->CurrentValue;
        $this->Temp->CurrentValue = null;
        $this->Temp->OldValue = $this->Temp->CurrentValue;
        $this->Pulse->CurrentValue = null;
        $this->Pulse->OldValue = $this->Pulse->CurrentValue;
        $this->BP->CurrentValue = null;
        $this->BP->OldValue = $this->BP->CurrentValue;
        $this->PR->CurrentValue = null;
        $this->PR->OldValue = $this->PR->CurrentValue;
        $this->CNS->CurrentValue = null;
        $this->CNS->OldValue = $this->CNS->CurrentValue;
        $this->RSA->CurrentValue = null;
        $this->RSA->OldValue = $this->RSA->CurrentValue;
        $this->CVS->CurrentValue = null;
        $this->CVS->OldValue = $this->CVS->CurrentValue;
        $this->PA->CurrentValue = null;
        $this->PA->OldValue = $this->PA->CurrentValue;
        $this->PS->CurrentValue = null;
        $this->PS->OldValue = $this->PS->CurrentValue;
        $this->PV->CurrentValue = null;
        $this->PV->OldValue = $this->PV->CurrentValue;
        $this->clinicaldetails->CurrentValue = null;
        $this->clinicaldetails->OldValue = $this->clinicaldetails->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->PatientSearch->CurrentValue = null;
        $this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_mrnno")) {
            $this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));
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

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatID")) {
            $this->PatID->setOldValue($CurrentForm->getValue("o_PatID"));
        }

        // Check field name 'MobileNumber' first before field var 'x_MobileNumber'
        $val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
        if (!$this->MobileNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MobileNumber->Visible = false; // Disable update for API request
            } else {
                $this->MobileNumber->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MobileNumber")) {
            $this->MobileNumber->setOldValue($CurrentForm->getValue("o_MobileNumber"));
        }

        // Check field name 'HT' first before field var 'x_HT'
        $val = $CurrentForm->hasValue("HT") ? $CurrentForm->getValue("HT") : $CurrentForm->getValue("x_HT");
        if (!$this->HT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HT->Visible = false; // Disable update for API request
            } else {
                $this->HT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HT")) {
            $this->HT->setOldValue($CurrentForm->getValue("o_HT"));
        }

        // Check field name 'WT' first before field var 'x_WT'
        $val = $CurrentForm->hasValue("WT") ? $CurrentForm->getValue("WT") : $CurrentForm->getValue("x_WT");
        if (!$this->WT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WT->Visible = false; // Disable update for API request
            } else {
                $this->WT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_WT")) {
            $this->WT->setOldValue($CurrentForm->getValue("o_WT"));
        }

        // Check field name 'SurfaceArea' first before field var 'x_SurfaceArea'
        $val = $CurrentForm->hasValue("SurfaceArea") ? $CurrentForm->getValue("SurfaceArea") : $CurrentForm->getValue("x_SurfaceArea");
        if (!$this->SurfaceArea->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurfaceArea->Visible = false; // Disable update for API request
            } else {
                $this->SurfaceArea->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SurfaceArea")) {
            $this->SurfaceArea->setOldValue($CurrentForm->getValue("o_SurfaceArea"));
        }

        // Check field name 'BodyMassIndex' first before field var 'x_BodyMassIndex'
        $val = $CurrentForm->hasValue("BodyMassIndex") ? $CurrentForm->getValue("BodyMassIndex") : $CurrentForm->getValue("x_BodyMassIndex");
        if (!$this->BodyMassIndex->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BodyMassIndex->Visible = false; // Disable update for API request
            } else {
                $this->BodyMassIndex->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BodyMassIndex")) {
            $this->BodyMassIndex->setOldValue($CurrentForm->getValue("o_BodyMassIndex"));
        }

        // Check field name 'AnticoagulantifAny' first before field var 'x_AnticoagulantifAny'
        $val = $CurrentForm->hasValue("AnticoagulantifAny") ? $CurrentForm->getValue("AnticoagulantifAny") : $CurrentForm->getValue("x_AnticoagulantifAny");
        if (!$this->AnticoagulantifAny->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnticoagulantifAny->Visible = false; // Disable update for API request
            } else {
                $this->AnticoagulantifAny->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_AnticoagulantifAny")) {
            $this->AnticoagulantifAny->setOldValue($CurrentForm->getValue("o_AnticoagulantifAny"));
        }

        // Check field name 'FoodAllergies' first before field var 'x_FoodAllergies'
        $val = $CurrentForm->hasValue("FoodAllergies") ? $CurrentForm->getValue("FoodAllergies") : $CurrentForm->getValue("x_FoodAllergies");
        if (!$this->FoodAllergies->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FoodAllergies->Visible = false; // Disable update for API request
            } else {
                $this->FoodAllergies->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_FoodAllergies")) {
            $this->FoodAllergies->setOldValue($CurrentForm->getValue("o_FoodAllergies"));
        }

        // Check field name 'GenericAllergies' first before field var 'x_GenericAllergies'
        $val = $CurrentForm->hasValue("GenericAllergies") ? $CurrentForm->getValue("GenericAllergies") : $CurrentForm->getValue("x_GenericAllergies");
        if (!$this->GenericAllergies->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GenericAllergies->Visible = false; // Disable update for API request
            } else {
                $this->GenericAllergies->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GenericAllergies")) {
            $this->GenericAllergies->setOldValue($CurrentForm->getValue("o_GenericAllergies"));
        }

        // Check field name 'GroupAllergies' first before field var 'x_GroupAllergies'
        $val = $CurrentForm->hasValue("GroupAllergies") ? $CurrentForm->getValue("GroupAllergies") : $CurrentForm->getValue("x_GroupAllergies");
        if (!$this->GroupAllergies->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupAllergies->Visible = false; // Disable update for API request
            } else {
                $this->GroupAllergies->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GroupAllergies")) {
            $this->GroupAllergies->setOldValue($CurrentForm->getValue("o_GroupAllergies"));
        }

        // Check field name 'Temp' first before field var 'x_Temp'
        $val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
        if (!$this->Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Temp->Visible = false; // Disable update for API request
            } else {
                $this->Temp->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Temp")) {
            $this->Temp->setOldValue($CurrentForm->getValue("o_Temp"));
        }

        // Check field name 'Pulse' first before field var 'x_Pulse'
        $val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
        if (!$this->Pulse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pulse->Visible = false; // Disable update for API request
            } else {
                $this->Pulse->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Pulse")) {
            $this->Pulse->setOldValue($CurrentForm->getValue("o_Pulse"));
        }

        // Check field name 'BP' first before field var 'x_BP'
        $val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
        if (!$this->BP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BP->Visible = false; // Disable update for API request
            } else {
                $this->BP->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BP")) {
            $this->BP->setOldValue($CurrentForm->getValue("o_BP"));
        }

        // Check field name 'PR' first before field var 'x_PR'
        $val = $CurrentForm->hasValue("PR") ? $CurrentForm->getValue("PR") : $CurrentForm->getValue("x_PR");
        if (!$this->PR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PR->Visible = false; // Disable update for API request
            } else {
                $this->PR->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PR")) {
            $this->PR->setOldValue($CurrentForm->getValue("o_PR"));
        }

        // Check field name 'CNS' first before field var 'x_CNS'
        $val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
        if (!$this->CNS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CNS->Visible = false; // Disable update for API request
            } else {
                $this->CNS->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CNS")) {
            $this->CNS->setOldValue($CurrentForm->getValue("o_CNS"));
        }

        // Check field name 'RSA' first before field var 'x_RSA'
        $val = $CurrentForm->hasValue("RSA") ? $CurrentForm->getValue("RSA") : $CurrentForm->getValue("x_RSA");
        if (!$this->RSA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RSA->Visible = false; // Disable update for API request
            } else {
                $this->RSA->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RSA")) {
            $this->RSA->setOldValue($CurrentForm->getValue("o_RSA"));
        }

        // Check field name 'CVS' first before field var 'x_CVS'
        $val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
        if (!$this->CVS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CVS->Visible = false; // Disable update for API request
            } else {
                $this->CVS->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CVS")) {
            $this->CVS->setOldValue($CurrentForm->getValue("o_CVS"));
        }

        // Check field name 'PA' first before field var 'x_PA'
        $val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
        if (!$this->PA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PA->Visible = false; // Disable update for API request
            } else {
                $this->PA->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PA")) {
            $this->PA->setOldValue($CurrentForm->getValue("o_PA"));
        }

        // Check field name 'PS' first before field var 'x_PS'
        $val = $CurrentForm->hasValue("PS") ? $CurrentForm->getValue("PS") : $CurrentForm->getValue("x_PS");
        if (!$this->PS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PS->Visible = false; // Disable update for API request
            } else {
                $this->PS->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PS")) {
            $this->PS->setOldValue($CurrentForm->getValue("o_PS"));
        }

        // Check field name 'PV' first before field var 'x_PV'
        $val = $CurrentForm->hasValue("PV") ? $CurrentForm->getValue("PV") : $CurrentForm->getValue("x_PV");
        if (!$this->PV->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PV->Visible = false; // Disable update for API request
            } else {
                $this->PV->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PV")) {
            $this->PV->setOldValue($CurrentForm->getValue("o_PV"));
        }

        // Check field name 'clinicaldetails' first before field var 'x_clinicaldetails'
        $val = $CurrentForm->hasValue("clinicaldetails") ? $CurrentForm->getValue("clinicaldetails") : $CurrentForm->getValue("x_clinicaldetails");
        if (!$this->clinicaldetails->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->clinicaldetails->Visible = false; // Disable update for API request
            } else {
                $this->clinicaldetails->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_clinicaldetails")) {
            $this->clinicaldetails->setOldValue($CurrentForm->getValue("o_clinicaldetails"));
        }

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_status")) {
            $this->status->setOldValue($CurrentForm->getValue("o_status"));
        }

        // Check field name 'createdby' first before field var 'x_createdby'
        $val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
        if (!$this->createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdby->Visible = false; // Disable update for API request
            } else {
                $this->createdby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_createdby")) {
            $this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_createddatetime")) {
            $this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));
        }

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_modifiedby")) {
            $this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_modifieddatetime")) {
            $this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));
        }

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Age")) {
            $this->Age->setOldValue($CurrentForm->getValue("o_Age"));
        }

        // Check field name 'Gender' first before field var 'x_Gender'
        $val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
        if (!$this->Gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gender->Visible = false; // Disable update for API request
            } else {
                $this->Gender->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Gender")) {
            $this->Gender->setOldValue($CurrentForm->getValue("o_Gender"));
        }

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientId")) {
            $this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));
        }

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Reception")) {
            $this->Reception->setOldValue($CurrentForm->getValue("o_Reception"));
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HospID")) {
            $this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->HT->CurrentValue = $this->HT->FormValue;
        $this->WT->CurrentValue = $this->WT->FormValue;
        $this->SurfaceArea->CurrentValue = $this->SurfaceArea->FormValue;
        $this->BodyMassIndex->CurrentValue = $this->BodyMassIndex->FormValue;
        $this->AnticoagulantifAny->CurrentValue = $this->AnticoagulantifAny->FormValue;
        $this->FoodAllergies->CurrentValue = $this->FoodAllergies->FormValue;
        $this->GenericAllergies->CurrentValue = $this->GenericAllergies->FormValue;
        $this->GroupAllergies->CurrentValue = $this->GroupAllergies->FormValue;
        $this->Temp->CurrentValue = $this->Temp->FormValue;
        $this->Pulse->CurrentValue = $this->Pulse->FormValue;
        $this->BP->CurrentValue = $this->BP->FormValue;
        $this->PR->CurrentValue = $this->PR->FormValue;
        $this->CNS->CurrentValue = $this->CNS->FormValue;
        $this->RSA->CurrentValue = $this->RSA->FormValue;
        $this->CVS->CurrentValue = $this->CVS->FormValue;
        $this->PA->CurrentValue = $this->PA->FormValue;
        $this->PS->CurrentValue = $this->PS->FormValue;
        $this->PV->CurrentValue = $this->PV->FormValue;
        $this->clinicaldetails->CurrentValue = $this->clinicaldetails->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
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
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['MobileNumber'] = $this->MobileNumber->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['HT'] = $this->HT->CurrentValue;
        $row['WT'] = $this->WT->CurrentValue;
        $row['SurfaceArea'] = $this->SurfaceArea->CurrentValue;
        $row['BodyMassIndex'] = $this->BodyMassIndex->CurrentValue;
        $row['ClinicalFindings'] = $this->ClinicalFindings->CurrentValue;
        $row['ClinicalDiagnosis'] = $this->ClinicalDiagnosis->CurrentValue;
        $row['AnticoagulantifAny'] = $this->AnticoagulantifAny->CurrentValue;
        $row['FoodAllergies'] = $this->FoodAllergies->CurrentValue;
        $row['GenericAllergies'] = $this->GenericAllergies->CurrentValue;
        $row['GroupAllergies'] = $this->GroupAllergies->CurrentValue;
        $row['Temp'] = $this->Temp->CurrentValue;
        $row['Pulse'] = $this->Pulse->CurrentValue;
        $row['BP'] = $this->BP->CurrentValue;
        $row['PR'] = $this->PR->CurrentValue;
        $row['CNS'] = $this->CNS->CurrentValue;
        $row['RSA'] = $this->RSA->CurrentValue;
        $row['CVS'] = $this->CVS->CurrentValue;
        $row['PA'] = $this->PA->CurrentValue;
        $row['PS'] = $this->PS->CurrentValue;
        $row['PV'] = $this->PV->CurrentValue;
        $row['clinicaldetails'] = $this->clinicaldetails->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['PatientSearch'] = $this->PatientSearch->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
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
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if ($this->mrnno->getSessionValue() != "") {
                $this->mrnno->CurrentValue = GetForeignKeyValue($this->mrnno->getSessionValue());
                $this->mrnno->OldValue = $this->mrnno->CurrentValue;
                $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
                $this->mrnno->ViewCustomAttributes = "";
            } else {
                if (!$this->mrnno->Raw) {
                    $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
                }
                $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
                $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
            }

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // HT
            $this->HT->EditAttrs["class"] = "form-control";
            $this->HT->EditCustomAttributes = "";
            if (!$this->HT->Raw) {
                $this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
            }
            $this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
            $this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

            // WT
            $this->WT->EditAttrs["class"] = "form-control";
            $this->WT->EditCustomAttributes = "";
            if (!$this->WT->Raw) {
                $this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
            }
            $this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
            $this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

            // SurfaceArea
            $this->SurfaceArea->EditAttrs["class"] = "form-control";
            $this->SurfaceArea->EditCustomAttributes = "";
            if (!$this->SurfaceArea->Raw) {
                $this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
            }
            $this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
            $this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

            // BodyMassIndex
            $this->BodyMassIndex->EditAttrs["class"] = "form-control";
            $this->BodyMassIndex->EditCustomAttributes = "";
            if (!$this->BodyMassIndex->Raw) {
                $this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
            }
            $this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
            $this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

            // AnticoagulantifAny
            $this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
            $this->AnticoagulantifAny->EditCustomAttributes = "";
            if (!$this->AnticoagulantifAny->Raw) {
                $this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
            }
            $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
            $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->EditValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
                    }
                }
            } else {
                $this->AnticoagulantifAny->EditValue = null;
            }
            $this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

            // FoodAllergies
            $this->FoodAllergies->EditAttrs["class"] = "form-control";
            $this->FoodAllergies->EditCustomAttributes = "";
            if (!$this->FoodAllergies->Raw) {
                $this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
            }
            $this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
            $this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

            // GenericAllergies
            $this->GenericAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GenericAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
            } else {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== null && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GenericAllergies->ViewValue !== null) { // Load from cache
                $this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
                if ($this->GenericAllergies->ViewValue == "") {
                    $this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GenericAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GenericAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                        $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GenericAllergies->EditValue = $arwrk;
            }
            $this->GenericAllergies->PlaceHolder = RemoveHtml($this->GenericAllergies->caption());

            // GroupAllergies
            $this->GroupAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GroupAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
            } else {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== null && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GroupAllergies->ViewValue !== null) { // Load from cache
                $this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
                if ($this->GroupAllergies->ViewValue == "") {
                    $this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GroupAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GroupAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                        $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GroupAllergies->EditValue = $arwrk;
            }
            $this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // PR
            $this->PR->EditAttrs["class"] = "form-control";
            $this->PR->EditCustomAttributes = "";
            if (!$this->PR->Raw) {
                $this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
            }
            $this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
            $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RSA
            $this->RSA->EditAttrs["class"] = "form-control";
            $this->RSA->EditCustomAttributes = "";
            if (!$this->RSA->Raw) {
                $this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
            }
            $this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
            $this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // PS
            $this->PS->EditAttrs["class"] = "form-control";
            $this->PS->EditCustomAttributes = "";
            if (!$this->PS->Raw) {
                $this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
            }
            $this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
            $this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

            // PV
            $this->PV->EditAttrs["class"] = "form-control";
            $this->PV->EditCustomAttributes = "";
            if (!$this->PV->Raw) {
                $this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
            }
            $this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
            $this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

            // clinicaldetails
            $this->clinicaldetails->EditCustomAttributes = "";
            $curVal = trim(strval($this->clinicaldetails->CurrentValue));
            if ($curVal != "") {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
            } else {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== null && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : null;
            }
            if ($this->clinicaldetails->ViewValue !== null) { // Load from cache
                $this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->clinicaldetails->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->clinicaldetails->EditValue = $arwrk;
            }
            $this->clinicaldetails->PlaceHolder = RemoveHtml($this->clinicaldetails->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            } else {
                $this->status->ViewValue = $this->status->Lookup !== null && is_array($this->status->Lookup->Options) ? $curVal : null;
            }
            if ($this->status->ViewValue !== null) { // Load from cache
                $this->status->EditValue = array_values($this->status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->status->EditValue = $arwrk;
            }
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if ($this->PatientId->getSessionValue() != "") {
                $this->PatientId->CurrentValue = GetForeignKeyValue($this->PatientId->getSessionValue());
                $this->PatientId->OldValue = $this->PatientId->CurrentValue;
                $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
                $this->PatientId->ViewCustomAttributes = "";
            } else {
                $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
                $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
            }

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            if ($this->Reception->getSessionValue() != "") {
                $this->Reception->CurrentValue = GetForeignKeyValue($this->Reception->getSessionValue());
                $this->Reception->OldValue = $this->Reception->CurrentValue;
                $this->Reception->ViewValue = $this->Reception->CurrentValue;
                $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
                $this->Reception->ViewCustomAttributes = "";
            } else {
                $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
                $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
            }

            // HospID

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // HT
            $this->HT->LinkCustomAttributes = "";
            $this->HT->HrefValue = "";

            // WT
            $this->WT->LinkCustomAttributes = "";
            $this->WT->HrefValue = "";

            // SurfaceArea
            $this->SurfaceArea->LinkCustomAttributes = "";
            $this->SurfaceArea->HrefValue = "";

            // BodyMassIndex
            $this->BodyMassIndex->LinkCustomAttributes = "";
            $this->BodyMassIndex->HrefValue = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->LinkCustomAttributes = "";
            $this->AnticoagulantifAny->HrefValue = "";

            // FoodAllergies
            $this->FoodAllergies->LinkCustomAttributes = "";
            $this->FoodAllergies->HrefValue = "";

            // GenericAllergies
            $this->GenericAllergies->LinkCustomAttributes = "";
            $this->GenericAllergies->HrefValue = "";

            // GroupAllergies
            $this->GroupAllergies->LinkCustomAttributes = "";
            $this->GroupAllergies->HrefValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";

            // RSA
            $this->RSA->LinkCustomAttributes = "";
            $this->RSA->HrefValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";

            // PS
            $this->PS->LinkCustomAttributes = "";
            $this->PS->HrefValue = "";

            // PV
            $this->PV->LinkCustomAttributes = "";
            $this->PV->HrefValue = "";

            // clinicaldetails
            $this->clinicaldetails->LinkCustomAttributes = "";
            $this->clinicaldetails->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            $this->PatientName->EditValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // HT
            $this->HT->EditAttrs["class"] = "form-control";
            $this->HT->EditCustomAttributes = "";
            if (!$this->HT->Raw) {
                $this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
            }
            $this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
            $this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

            // WT
            $this->WT->EditAttrs["class"] = "form-control";
            $this->WT->EditCustomAttributes = "";
            if (!$this->WT->Raw) {
                $this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
            }
            $this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
            $this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

            // SurfaceArea
            $this->SurfaceArea->EditAttrs["class"] = "form-control";
            $this->SurfaceArea->EditCustomAttributes = "";
            if (!$this->SurfaceArea->Raw) {
                $this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
            }
            $this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
            $this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

            // BodyMassIndex
            $this->BodyMassIndex->EditAttrs["class"] = "form-control";
            $this->BodyMassIndex->EditCustomAttributes = "";
            if (!$this->BodyMassIndex->Raw) {
                $this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
            }
            $this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
            $this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

            // AnticoagulantifAny
            $this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
            $this->AnticoagulantifAny->EditCustomAttributes = "";
            if (!$this->AnticoagulantifAny->Raw) {
                $this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
            }
            $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
            $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->EditValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
                    }
                }
            } else {
                $this->AnticoagulantifAny->EditValue = null;
            }
            $this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

            // FoodAllergies
            $this->FoodAllergies->EditAttrs["class"] = "form-control";
            $this->FoodAllergies->EditCustomAttributes = "";
            if (!$this->FoodAllergies->Raw) {
                $this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
            }
            $this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
            $this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

            // GenericAllergies
            $this->GenericAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GenericAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
            } else {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== null && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GenericAllergies->ViewValue !== null) { // Load from cache
                $this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
                if ($this->GenericAllergies->ViewValue == "") {
                    $this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GenericAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GenericAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                        $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GenericAllergies->EditValue = $arwrk;
            }
            $this->GenericAllergies->PlaceHolder = RemoveHtml($this->GenericAllergies->caption());

            // GroupAllergies
            $this->GroupAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GroupAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
            } else {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== null && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GroupAllergies->ViewValue !== null) { // Load from cache
                $this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
                if ($this->GroupAllergies->ViewValue == "") {
                    $this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GroupAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GroupAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                        $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GroupAllergies->EditValue = $arwrk;
            }
            $this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // PR
            $this->PR->EditAttrs["class"] = "form-control";
            $this->PR->EditCustomAttributes = "";
            if (!$this->PR->Raw) {
                $this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
            }
            $this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
            $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RSA
            $this->RSA->EditAttrs["class"] = "form-control";
            $this->RSA->EditCustomAttributes = "";
            if (!$this->RSA->Raw) {
                $this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
            }
            $this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
            $this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // PS
            $this->PS->EditAttrs["class"] = "form-control";
            $this->PS->EditCustomAttributes = "";
            if (!$this->PS->Raw) {
                $this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
            }
            $this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
            $this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

            // PV
            $this->PV->EditAttrs["class"] = "form-control";
            $this->PV->EditCustomAttributes = "";
            if (!$this->PV->Raw) {
                $this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
            }
            $this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
            $this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

            // clinicaldetails
            $this->clinicaldetails->EditCustomAttributes = "";
            $curVal = trim(strval($this->clinicaldetails->CurrentValue));
            if ($curVal != "") {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
            } else {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== null && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : null;
            }
            if ($this->clinicaldetails->ViewValue !== null) { // Load from cache
                $this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->clinicaldetails->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->clinicaldetails->EditValue = $arwrk;
            }
            $this->clinicaldetails->PlaceHolder = RemoveHtml($this->clinicaldetails->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            } else {
                $this->status->ViewValue = $this->status->Lookup !== null && is_array($this->status->Lookup->Options) ? $curVal : null;
            }
            if ($this->status->ViewValue !== null) { // Load from cache
                $this->status->EditValue = array_values($this->status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->status->EditValue = $arwrk;
            }
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // HospID

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // HT
            $this->HT->LinkCustomAttributes = "";
            $this->HT->HrefValue = "";

            // WT
            $this->WT->LinkCustomAttributes = "";
            $this->WT->HrefValue = "";

            // SurfaceArea
            $this->SurfaceArea->LinkCustomAttributes = "";
            $this->SurfaceArea->HrefValue = "";

            // BodyMassIndex
            $this->BodyMassIndex->LinkCustomAttributes = "";
            $this->BodyMassIndex->HrefValue = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->LinkCustomAttributes = "";
            $this->AnticoagulantifAny->HrefValue = "";

            // FoodAllergies
            $this->FoodAllergies->LinkCustomAttributes = "";
            $this->FoodAllergies->HrefValue = "";

            // GenericAllergies
            $this->GenericAllergies->LinkCustomAttributes = "";
            $this->GenericAllergies->HrefValue = "";

            // GroupAllergies
            $this->GroupAllergies->LinkCustomAttributes = "";
            $this->GroupAllergies->HrefValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";

            // RSA
            $this->RSA->LinkCustomAttributes = "";
            $this->RSA->HrefValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";

            // PS
            $this->PS->LinkCustomAttributes = "";
            $this->PS->HrefValue = "";

            // PV
            $this->PV->LinkCustomAttributes = "";
            $this->PV->HrefValue = "";

            // clinicaldetails
            $this->clinicaldetails->LinkCustomAttributes = "";
            $this->clinicaldetails->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

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

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
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
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->HT->Required) {
            if (!$this->HT->IsDetailKey && EmptyValue($this->HT->FormValue)) {
                $this->HT->addErrorMessage(str_replace("%s", $this->HT->caption(), $this->HT->RequiredErrorMessage));
            }
        }
        if ($this->WT->Required) {
            if (!$this->WT->IsDetailKey && EmptyValue($this->WT->FormValue)) {
                $this->WT->addErrorMessage(str_replace("%s", $this->WT->caption(), $this->WT->RequiredErrorMessage));
            }
        }
        if ($this->SurfaceArea->Required) {
            if (!$this->SurfaceArea->IsDetailKey && EmptyValue($this->SurfaceArea->FormValue)) {
                $this->SurfaceArea->addErrorMessage(str_replace("%s", $this->SurfaceArea->caption(), $this->SurfaceArea->RequiredErrorMessage));
            }
        }
        if ($this->BodyMassIndex->Required) {
            if (!$this->BodyMassIndex->IsDetailKey && EmptyValue($this->BodyMassIndex->FormValue)) {
                $this->BodyMassIndex->addErrorMessage(str_replace("%s", $this->BodyMassIndex->caption(), $this->BodyMassIndex->RequiredErrorMessage));
            }
        }
        if ($this->AnticoagulantifAny->Required) {
            if (!$this->AnticoagulantifAny->IsDetailKey && EmptyValue($this->AnticoagulantifAny->FormValue)) {
                $this->AnticoagulantifAny->addErrorMessage(str_replace("%s", $this->AnticoagulantifAny->caption(), $this->AnticoagulantifAny->RequiredErrorMessage));
            }
        }
        if ($this->FoodAllergies->Required) {
            if (!$this->FoodAllergies->IsDetailKey && EmptyValue($this->FoodAllergies->FormValue)) {
                $this->FoodAllergies->addErrorMessage(str_replace("%s", $this->FoodAllergies->caption(), $this->FoodAllergies->RequiredErrorMessage));
            }
        }
        if ($this->GenericAllergies->Required) {
            if ($this->GenericAllergies->FormValue == "") {
                $this->GenericAllergies->addErrorMessage(str_replace("%s", $this->GenericAllergies->caption(), $this->GenericAllergies->RequiredErrorMessage));
            }
        }
        if ($this->GroupAllergies->Required) {
            if ($this->GroupAllergies->FormValue == "") {
                $this->GroupAllergies->addErrorMessage(str_replace("%s", $this->GroupAllergies->caption(), $this->GroupAllergies->RequiredErrorMessage));
            }
        }
        if ($this->Temp->Required) {
            if (!$this->Temp->IsDetailKey && EmptyValue($this->Temp->FormValue)) {
                $this->Temp->addErrorMessage(str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
            }
        }
        if ($this->Pulse->Required) {
            if (!$this->Pulse->IsDetailKey && EmptyValue($this->Pulse->FormValue)) {
                $this->Pulse->addErrorMessage(str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
            }
        }
        if ($this->BP->Required) {
            if (!$this->BP->IsDetailKey && EmptyValue($this->BP->FormValue)) {
                $this->BP->addErrorMessage(str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
            }
        }
        if ($this->PR->Required) {
            if (!$this->PR->IsDetailKey && EmptyValue($this->PR->FormValue)) {
                $this->PR->addErrorMessage(str_replace("%s", $this->PR->caption(), $this->PR->RequiredErrorMessage));
            }
        }
        if ($this->CNS->Required) {
            if (!$this->CNS->IsDetailKey && EmptyValue($this->CNS->FormValue)) {
                $this->CNS->addErrorMessage(str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
            }
        }
        if ($this->RSA->Required) {
            if (!$this->RSA->IsDetailKey && EmptyValue($this->RSA->FormValue)) {
                $this->RSA->addErrorMessage(str_replace("%s", $this->RSA->caption(), $this->RSA->RequiredErrorMessage));
            }
        }
        if ($this->CVS->Required) {
            if (!$this->CVS->IsDetailKey && EmptyValue($this->CVS->FormValue)) {
                $this->CVS->addErrorMessage(str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
            }
        }
        if ($this->PA->Required) {
            if (!$this->PA->IsDetailKey && EmptyValue($this->PA->FormValue)) {
                $this->PA->addErrorMessage(str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
            }
        }
        if ($this->PS->Required) {
            if (!$this->PS->IsDetailKey && EmptyValue($this->PS->FormValue)) {
                $this->PS->addErrorMessage(str_replace("%s", $this->PS->caption(), $this->PS->RequiredErrorMessage));
            }
        }
        if ($this->PV->Required) {
            if (!$this->PV->IsDetailKey && EmptyValue($this->PV->FormValue)) {
                $this->PV->addErrorMessage(str_replace("%s", $this->PV->caption(), $this->PV->RequiredErrorMessage));
            }
        }
        if ($this->clinicaldetails->Required) {
            if ($this->clinicaldetails->FormValue == "") {
                $this->clinicaldetails->addErrorMessage(str_replace("%s", $this->clinicaldetails->caption(), $this->clinicaldetails->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->Gender->Required) {
            if (!$this->Gender->IsDetailKey && EmptyValue($this->Gender->FormValue)) {
                $this->Gender->addErrorMessage(str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly);

            // HT
            $this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, null, $this->HT->ReadOnly);

            // WT
            $this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, null, $this->WT->ReadOnly);

            // SurfaceArea
            $this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, null, $this->SurfaceArea->ReadOnly);

            // BodyMassIndex
            $this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, null, $this->BodyMassIndex->ReadOnly);

            // AnticoagulantifAny
            $this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, null, $this->AnticoagulantifAny->ReadOnly);

            // FoodAllergies
            $this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, null, $this->FoodAllergies->ReadOnly);

            // GenericAllergies
            $this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, null, $this->GenericAllergies->ReadOnly);

            // GroupAllergies
            $this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, null, $this->GroupAllergies->ReadOnly);

            // Temp
            $this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, null, $this->Temp->ReadOnly);

            // Pulse
            $this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, null, $this->Pulse->ReadOnly);

            // BP
            $this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, null, $this->BP->ReadOnly);

            // PR
            $this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, null, $this->PR->ReadOnly);

            // CNS
            $this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, null, $this->CNS->ReadOnly);

            // RSA
            $this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, null, $this->RSA->ReadOnly);

            // CVS
            $this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, null, $this->CVS->ReadOnly);

            // PA
            $this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, null, $this->PA->ReadOnly);

            // PS
            $this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, null, $this->PS->ReadOnly);

            // PV
            $this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, null, $this->PV->ReadOnly);

            // clinicaldetails
            $this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, null, $this->clinicaldetails->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserName();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

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
        if ($this->getCurrentMasterTable() == "ip_admission") {
            $this->Reception->CurrentValue = $this->Reception->getSessionValue();
            $this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
            $this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // MobileNumber
        $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, false);

        // HT
        $this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, null, false);

        // WT
        $this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, null, false);

        // SurfaceArea
        $this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, null, false);

        // BodyMassIndex
        $this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, null, false);

        // AnticoagulantifAny
        $this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, null, false);

        // FoodAllergies
        $this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, null, false);

        // GenericAllergies
        $this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, null, false);

        // GroupAllergies
        $this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, null, false);

        // Temp
        $this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, null, false);

        // Pulse
        $this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, null, false);

        // BP
        $this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, null, false);

        // PR
        $this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, null, false);

        // CNS
        $this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, null, false);

        // RSA
        $this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, null, false);

        // CVS
        $this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, null, false);

        // PA
        $this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, null, false);

        // PS
        $this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, null, false);

        // PV
        $this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, null, false);

        // clinicaldetails
        $this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // modifiedby
        $this->modifiedby->CurrentValue = CurrentUserName();
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

        // modifieddatetime
        $this->modifieddatetime->CurrentValue = CurrentDateTime();
        $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, false);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

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
        if ($masterTblVar == "ip_admission") {
            $masterTbl = Container("ip_admission");
            $this->Reception->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->PatientId->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->mrnno->Visible = false;
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
