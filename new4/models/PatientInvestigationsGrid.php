<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientInvestigationsGrid extends PatientInvestigations
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_investigations';

    // Page object name
    public $PageObjName = "PatientInvestigationsGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpatient_investigationsgrid";
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

        // Table object (patient_investigations)
        if (!isset($GLOBALS["patient_investigations"]) || get_class($GLOBALS["patient_investigations"]) == PROJECT_NAMESPACE . "patient_investigations") {
            $GLOBALS["patient_investigations"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "PatientInvestigationsAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_investigations');
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
                $doc = new $class(Container("patient_investigations"));
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
        $this->Reception->Visible = false;
        $this->PatientId->Visible = false;
        $this->PatientName->Visible = false;
        $this->Investigation->setVisibility();
        $this->Value->setVisibility();
        $this->NormalRange->setVisibility();
        $this->mrnno->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->Visible = false;
        $this->SampleCollected->setVisibility();
        $this->SampleCollectedBy->setVisibility();
        $this->ResultedDate->setVisibility();
        $this->ResultedBy->setVisibility();
        $this->Modified->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->Created->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->GroupHead->setVisibility();
        $this->Cost->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->PayMode->setVisibility();
        $this->VoucherNo->setVisibility();
        $this->InvestigationMultiselect->Visible = false;
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
        $this->Cost->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_Investigation") && $CurrentForm->hasValue("o_Investigation") && $this->Investigation->CurrentValue != $this->Investigation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Value") && $CurrentForm->hasValue("o_Value") && $this->Value->CurrentValue != $this->Value->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NormalRange") && $CurrentForm->hasValue("o_NormalRange") && $this->NormalRange->CurrentValue != $this->NormalRange->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SampleCollected") && $CurrentForm->hasValue("o_SampleCollected") && $this->SampleCollected->CurrentValue != $this->SampleCollected->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SampleCollectedBy") && $CurrentForm->hasValue("o_SampleCollectedBy") && $this->SampleCollectedBy->CurrentValue != $this->SampleCollectedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ResultedDate") && $CurrentForm->hasValue("o_ResultedDate") && $this->ResultedDate->CurrentValue != $this->ResultedDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ResultedBy") && $CurrentForm->hasValue("o_ResultedBy") && $this->ResultedBy->CurrentValue != $this->ResultedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Modified") && $CurrentForm->hasValue("o_Modified") && $this->Modified->CurrentValue != $this->Modified->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ModifiedBy") && $CurrentForm->hasValue("o_ModifiedBy") && $this->ModifiedBy->CurrentValue != $this->ModifiedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Created") && $CurrentForm->hasValue("o_Created") && $this->Created->CurrentValue != $this->Created->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CreatedBy") && $CurrentForm->hasValue("o_CreatedBy") && $this->CreatedBy->CurrentValue != $this->CreatedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GroupHead") && $CurrentForm->hasValue("o_GroupHead") && $this->GroupHead->CurrentValue != $this->GroupHead->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Cost") && $CurrentForm->hasValue("o_Cost") && $this->Cost->CurrentValue != $this->Cost->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaymentStatus") && $CurrentForm->hasValue("o_PaymentStatus") && $this->PaymentStatus->CurrentValue != $this->PaymentStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PayMode") && $CurrentForm->hasValue("o_PayMode") && $this->PayMode->CurrentValue != $this->PayMode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_VoucherNo") && $CurrentForm->hasValue("o_VoucherNo") && $this->VoucherNo->CurrentValue != $this->VoucherNo->OldValue) {
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
        $this->Investigation->clearErrorMessage();
        $this->Value->clearErrorMessage();
        $this->NormalRange->clearErrorMessage();
        $this->mrnno->clearErrorMessage();
        $this->Age->clearErrorMessage();
        $this->Gender->clearErrorMessage();
        $this->SampleCollected->clearErrorMessage();
        $this->SampleCollectedBy->clearErrorMessage();
        $this->ResultedDate->clearErrorMessage();
        $this->ResultedBy->clearErrorMessage();
        $this->Modified->clearErrorMessage();
        $this->ModifiedBy->clearErrorMessage();
        $this->Created->clearErrorMessage();
        $this->CreatedBy->clearErrorMessage();
        $this->GroupHead->clearErrorMessage();
        $this->Cost->clearErrorMessage();
        $this->PaymentStatus->clearErrorMessage();
        $this->PayMode->clearErrorMessage();
        $this->VoucherNo->clearErrorMessage();
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
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Investigation->CurrentValue = null;
        $this->Investigation->OldValue = $this->Investigation->CurrentValue;
        $this->Value->CurrentValue = null;
        $this->Value->OldValue = $this->Value->CurrentValue;
        $this->NormalRange->CurrentValue = null;
        $this->NormalRange->OldValue = $this->NormalRange->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->SampleCollected->CurrentValue = null;
        $this->SampleCollected->OldValue = $this->SampleCollected->CurrentValue;
        $this->SampleCollectedBy->CurrentValue = null;
        $this->SampleCollectedBy->OldValue = $this->SampleCollectedBy->CurrentValue;
        $this->ResultedDate->CurrentValue = null;
        $this->ResultedDate->OldValue = $this->ResultedDate->CurrentValue;
        $this->ResultedBy->CurrentValue = null;
        $this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
        $this->Modified->CurrentValue = null;
        $this->Modified->OldValue = $this->Modified->CurrentValue;
        $this->ModifiedBy->CurrentValue = null;
        $this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
        $this->Created->CurrentValue = null;
        $this->Created->OldValue = $this->Created->CurrentValue;
        $this->CreatedBy->CurrentValue = null;
        $this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
        $this->GroupHead->CurrentValue = null;
        $this->GroupHead->OldValue = $this->GroupHead->CurrentValue;
        $this->Cost->CurrentValue = null;
        $this->Cost->OldValue = $this->Cost->CurrentValue;
        $this->PaymentStatus->CurrentValue = null;
        $this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
        $this->PayMode->CurrentValue = null;
        $this->PayMode->OldValue = $this->PayMode->CurrentValue;
        $this->VoucherNo->CurrentValue = null;
        $this->VoucherNo->OldValue = $this->VoucherNo->CurrentValue;
        $this->InvestigationMultiselect->CurrentValue = null;
        $this->InvestigationMultiselect->OldValue = $this->InvestigationMultiselect->CurrentValue;
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

        // Check field name 'Investigation' first before field var 'x_Investigation'
        $val = $CurrentForm->hasValue("Investigation") ? $CurrentForm->getValue("Investigation") : $CurrentForm->getValue("x_Investigation");
        if (!$this->Investigation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Investigation->Visible = false; // Disable update for API request
            } else {
                $this->Investigation->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Investigation")) {
            $this->Investigation->setOldValue($CurrentForm->getValue("o_Investigation"));
        }

        // Check field name 'Value' first before field var 'x_Value'
        $val = $CurrentForm->hasValue("Value") ? $CurrentForm->getValue("Value") : $CurrentForm->getValue("x_Value");
        if (!$this->Value->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Value->Visible = false; // Disable update for API request
            } else {
                $this->Value->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Value")) {
            $this->Value->setOldValue($CurrentForm->getValue("o_Value"));
        }

        // Check field name 'NormalRange' first before field var 'x_NormalRange'
        $val = $CurrentForm->hasValue("NormalRange") ? $CurrentForm->getValue("NormalRange") : $CurrentForm->getValue("x_NormalRange");
        if (!$this->NormalRange->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NormalRange->Visible = false; // Disable update for API request
            } else {
                $this->NormalRange->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NormalRange")) {
            $this->NormalRange->setOldValue($CurrentForm->getValue("o_NormalRange"));
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

        // Check field name 'SampleCollected' first before field var 'x_SampleCollected'
        $val = $CurrentForm->hasValue("SampleCollected") ? $CurrentForm->getValue("SampleCollected") : $CurrentForm->getValue("x_SampleCollected");
        if (!$this->SampleCollected->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleCollected->Visible = false; // Disable update for API request
            } else {
                $this->SampleCollected->setFormValue($val);
            }
            $this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_SampleCollected")) {
            $this->SampleCollected->setOldValue($CurrentForm->getValue("o_SampleCollected"));
        }

        // Check field name 'SampleCollectedBy' first before field var 'x_SampleCollectedBy'
        $val = $CurrentForm->hasValue("SampleCollectedBy") ? $CurrentForm->getValue("SampleCollectedBy") : $CurrentForm->getValue("x_SampleCollectedBy");
        if (!$this->SampleCollectedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleCollectedBy->Visible = false; // Disable update for API request
            } else {
                $this->SampleCollectedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SampleCollectedBy")) {
            $this->SampleCollectedBy->setOldValue($CurrentForm->getValue("o_SampleCollectedBy"));
        }

        // Check field name 'ResultedDate' first before field var 'x_ResultedDate'
        $val = $CurrentForm->hasValue("ResultedDate") ? $CurrentForm->getValue("ResultedDate") : $CurrentForm->getValue("x_ResultedDate");
        if (!$this->ResultedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultedDate->Visible = false; // Disable update for API request
            } else {
                $this->ResultedDate->setFormValue($val);
            }
            $this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_ResultedDate")) {
            $this->ResultedDate->setOldValue($CurrentForm->getValue("o_ResultedDate"));
        }

        // Check field name 'ResultedBy' first before field var 'x_ResultedBy'
        $val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
        if (!$this->ResultedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultedBy->Visible = false; // Disable update for API request
            } else {
                $this->ResultedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ResultedBy")) {
            $this->ResultedBy->setOldValue($CurrentForm->getValue("o_ResultedBy"));
        }

        // Check field name 'Modified' first before field var 'x_Modified'
        $val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
        if (!$this->Modified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Modified->Visible = false; // Disable update for API request
            } else {
                $this->Modified->setFormValue($val);
            }
            $this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_Modified")) {
            $this->Modified->setOldValue($CurrentForm->getValue("o_Modified"));
        }

        // Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
        $val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
        if (!$this->ModifiedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedBy->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ModifiedBy")) {
            $this->ModifiedBy->setOldValue($CurrentForm->getValue("o_ModifiedBy"));
        }

        // Check field name 'Created' first before field var 'x_Created'
        $val = $CurrentForm->hasValue("Created") ? $CurrentForm->getValue("Created") : $CurrentForm->getValue("x_Created");
        if (!$this->Created->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Created->Visible = false; // Disable update for API request
            } else {
                $this->Created->setFormValue($val);
            }
            $this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_Created")) {
            $this->Created->setOldValue($CurrentForm->getValue("o_Created"));
        }

        // Check field name 'CreatedBy' first before field var 'x_CreatedBy'
        $val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
        if (!$this->CreatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedBy->Visible = false; // Disable update for API request
            } else {
                $this->CreatedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CreatedBy")) {
            $this->CreatedBy->setOldValue($CurrentForm->getValue("o_CreatedBy"));
        }

        // Check field name 'GroupHead' first before field var 'x_GroupHead'
        $val = $CurrentForm->hasValue("GroupHead") ? $CurrentForm->getValue("GroupHead") : $CurrentForm->getValue("x_GroupHead");
        if (!$this->GroupHead->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupHead->Visible = false; // Disable update for API request
            } else {
                $this->GroupHead->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GroupHead")) {
            $this->GroupHead->setOldValue($CurrentForm->getValue("o_GroupHead"));
        }

        // Check field name 'Cost' first before field var 'x_Cost'
        $val = $CurrentForm->hasValue("Cost") ? $CurrentForm->getValue("Cost") : $CurrentForm->getValue("x_Cost");
        if (!$this->Cost->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cost->Visible = false; // Disable update for API request
            } else {
                $this->Cost->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Cost")) {
            $this->Cost->setOldValue($CurrentForm->getValue("o_Cost"));
        }

        // Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
        $val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
        if (!$this->PaymentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentStatus->Visible = false; // Disable update for API request
            } else {
                $this->PaymentStatus->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PaymentStatus")) {
            $this->PaymentStatus->setOldValue($CurrentForm->getValue("o_PaymentStatus"));
        }

        // Check field name 'PayMode' first before field var 'x_PayMode'
        $val = $CurrentForm->hasValue("PayMode") ? $CurrentForm->getValue("PayMode") : $CurrentForm->getValue("x_PayMode");
        if (!$this->PayMode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PayMode->Visible = false; // Disable update for API request
            } else {
                $this->PayMode->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PayMode")) {
            $this->PayMode->setOldValue($CurrentForm->getValue("o_PayMode"));
        }

        // Check field name 'VoucherNo' first before field var 'x_VoucherNo'
        $val = $CurrentForm->hasValue("VoucherNo") ? $CurrentForm->getValue("VoucherNo") : $CurrentForm->getValue("x_VoucherNo");
        if (!$this->VoucherNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VoucherNo->Visible = false; // Disable update for API request
            } else {
                $this->VoucherNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_VoucherNo")) {
            $this->VoucherNo->setOldValue($CurrentForm->getValue("o_VoucherNo"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->Investigation->CurrentValue = $this->Investigation->FormValue;
        $this->Value->CurrentValue = $this->Value->FormValue;
        $this->NormalRange->CurrentValue = $this->NormalRange->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->SampleCollected->CurrentValue = $this->SampleCollected->FormValue;
        $this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
        $this->SampleCollectedBy->CurrentValue = $this->SampleCollectedBy->FormValue;
        $this->ResultedDate->CurrentValue = $this->ResultedDate->FormValue;
        $this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
        $this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
        $this->Modified->CurrentValue = $this->Modified->FormValue;
        $this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->Created->CurrentValue = $this->Created->FormValue;
        $this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->GroupHead->CurrentValue = $this->GroupHead->FormValue;
        $this->Cost->CurrentValue = $this->Cost->FormValue;
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->PayMode->CurrentValue = $this->PayMode->FormValue;
        $this->VoucherNo->CurrentValue = $this->VoucherNo->FormValue;
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Investigation->setDbValue($row['Investigation']);
        $this->Value->setDbValue($row['Value']);
        $this->NormalRange->setDbValue($row['NormalRange']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->SampleCollected->setDbValue($row['SampleCollected']);
        $this->SampleCollectedBy->setDbValue($row['SampleCollectedBy']);
        $this->ResultedDate->setDbValue($row['ResultedDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->GroupHead->setDbValue($row['GroupHead']);
        $this->Cost->setDbValue($row['Cost']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PayMode->setDbValue($row['PayMode']);
        $this->VoucherNo->setDbValue($row['VoucherNo']);
        $this->InvestigationMultiselect->setDbValue($row['InvestigationMultiselect']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Investigation'] = $this->Investigation->CurrentValue;
        $row['Value'] = $this->Value->CurrentValue;
        $row['NormalRange'] = $this->NormalRange->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['SampleCollected'] = $this->SampleCollected->CurrentValue;
        $row['SampleCollectedBy'] = $this->SampleCollectedBy->CurrentValue;
        $row['ResultedDate'] = $this->ResultedDate->CurrentValue;
        $row['ResultedBy'] = $this->ResultedBy->CurrentValue;
        $row['Modified'] = $this->Modified->CurrentValue;
        $row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
        $row['Created'] = $this->Created->CurrentValue;
        $row['CreatedBy'] = $this->CreatedBy->CurrentValue;
        $row['GroupHead'] = $this->GroupHead->CurrentValue;
        $row['Cost'] = $this->Cost->CurrentValue;
        $row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
        $row['PayMode'] = $this->PayMode->CurrentValue;
        $row['VoucherNo'] = $this->VoucherNo->CurrentValue;
        $row['InvestigationMultiselect'] = $this->InvestigationMultiselect->CurrentValue;
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

        // Convert decimal values if posted back
        if ($this->Cost->FormValue == $this->Cost->CurrentValue && is_numeric(ConvertToFloatString($this->Cost->CurrentValue))) {
            $this->Cost->CurrentValue = ConvertToFloatString($this->Cost->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // PatientId

        // PatientName

        // Investigation

        // Value

        // NormalRange

        // mrnno

        // Age

        // Gender

        // profilePic

        // SampleCollected

        // SampleCollectedBy

        // ResultedDate

        // ResultedBy

        // Modified

        // ModifiedBy

        // Created

        // CreatedBy

        // GroupHead

        // Cost

        // PaymentStatus

        // PayMode

        // VoucherNo

        // InvestigationMultiselect
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Investigation
            $this->Investigation->ViewValue = $this->Investigation->CurrentValue;
            $this->Investigation->ViewCustomAttributes = "";

            // Value
            $this->Value->ViewValue = $this->Value->CurrentValue;
            $this->Value->ViewCustomAttributes = "";

            // NormalRange
            $this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
            $this->NormalRange->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // SampleCollected
            $this->SampleCollected->ViewValue = $this->SampleCollected->CurrentValue;
            $this->SampleCollected->ViewValue = FormatDateTime($this->SampleCollected->ViewValue, 0);
            $this->SampleCollected->ViewCustomAttributes = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->ViewValue = $this->SampleCollectedBy->CurrentValue;
            $this->SampleCollectedBy->ViewCustomAttributes = "";

            // ResultedDate
            $this->ResultedDate->ViewValue = $this->ResultedDate->CurrentValue;
            $this->ResultedDate->ViewValue = FormatDateTime($this->ResultedDate->ViewValue, 0);
            $this->ResultedDate->ViewCustomAttributes = "";

            // ResultedBy
            $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
            $this->ResultedBy->ViewCustomAttributes = "";

            // Modified
            $this->Modified->ViewValue = $this->Modified->CurrentValue;
            $this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
            $this->Modified->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // Created
            $this->Created->ViewValue = $this->Created->CurrentValue;
            $this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
            $this->Created->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // GroupHead
            $this->GroupHead->ViewValue = $this->GroupHead->CurrentValue;
            $this->GroupHead->ViewCustomAttributes = "";

            // Cost
            $this->Cost->ViewValue = $this->Cost->CurrentValue;
            $this->Cost->ViewValue = FormatNumber($this->Cost->ViewValue, 2, -2, -2, -2);
            $this->Cost->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewCustomAttributes = "";

            // PayMode
            $this->PayMode->ViewValue = $this->PayMode->CurrentValue;
            $this->PayMode->ViewCustomAttributes = "";

            // VoucherNo
            $this->VoucherNo->ViewValue = $this->VoucherNo->CurrentValue;
            $this->VoucherNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Investigation
            $this->Investigation->LinkCustomAttributes = "";
            $this->Investigation->HrefValue = "";
            $this->Investigation->TooltipValue = "";

            // Value
            $this->Value->LinkCustomAttributes = "";
            $this->Value->HrefValue = "";
            $this->Value->TooltipValue = "";

            // NormalRange
            $this->NormalRange->LinkCustomAttributes = "";
            $this->NormalRange->HrefValue = "";
            $this->NormalRange->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // SampleCollected
            $this->SampleCollected->LinkCustomAttributes = "";
            $this->SampleCollected->HrefValue = "";
            $this->SampleCollected->TooltipValue = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->LinkCustomAttributes = "";
            $this->SampleCollectedBy->HrefValue = "";
            $this->SampleCollectedBy->TooltipValue = "";

            // ResultedDate
            $this->ResultedDate->LinkCustomAttributes = "";
            $this->ResultedDate->HrefValue = "";
            $this->ResultedDate->TooltipValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";
            $this->ResultedBy->TooltipValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";
            $this->Modified->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // Created
            $this->Created->LinkCustomAttributes = "";
            $this->Created->HrefValue = "";
            $this->Created->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // GroupHead
            $this->GroupHead->LinkCustomAttributes = "";
            $this->GroupHead->HrefValue = "";
            $this->GroupHead->TooltipValue = "";

            // Cost
            $this->Cost->LinkCustomAttributes = "";
            $this->Cost->HrefValue = "";
            $this->Cost->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // PayMode
            $this->PayMode->LinkCustomAttributes = "";
            $this->PayMode->HrefValue = "";
            $this->PayMode->TooltipValue = "";

            // VoucherNo
            $this->VoucherNo->LinkCustomAttributes = "";
            $this->VoucherNo->HrefValue = "";
            $this->VoucherNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // Investigation
            $this->Investigation->EditAttrs["class"] = "form-control";
            $this->Investigation->EditCustomAttributes = "";
            if (!$this->Investigation->Raw) {
                $this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
            }
            $this->Investigation->EditValue = HtmlEncode($this->Investigation->CurrentValue);
            $this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

            // Value
            $this->Value->EditAttrs["class"] = "form-control";
            $this->Value->EditCustomAttributes = "";
            if (!$this->Value->Raw) {
                $this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
            }
            $this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
            $this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

            // NormalRange
            $this->NormalRange->EditAttrs["class"] = "form-control";
            $this->NormalRange->EditCustomAttributes = "";
            if (!$this->NormalRange->Raw) {
                $this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
            }
            $this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
            $this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

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

            // SampleCollected
            $this->SampleCollected->EditAttrs["class"] = "form-control";
            $this->SampleCollected->EditCustomAttributes = "";
            $this->SampleCollected->EditValue = HtmlEncode(FormatDateTime($this->SampleCollected->CurrentValue, 8));
            $this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

            // SampleCollectedBy
            $this->SampleCollectedBy->EditAttrs["class"] = "form-control";
            $this->SampleCollectedBy->EditCustomAttributes = "";
            if (!$this->SampleCollectedBy->Raw) {
                $this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
            }
            $this->SampleCollectedBy->EditValue = HtmlEncode($this->SampleCollectedBy->CurrentValue);
            $this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

            // ResultedDate
            $this->ResultedDate->EditAttrs["class"] = "form-control";
            $this->ResultedDate->EditCustomAttributes = "";
            $this->ResultedDate->EditValue = HtmlEncode(FormatDateTime($this->ResultedDate->CurrentValue, 8));
            $this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

            // Modified
            $this->Modified->EditAttrs["class"] = "form-control";
            $this->Modified->EditCustomAttributes = "";
            $this->Modified->EditValue = HtmlEncode(FormatDateTime($this->Modified->CurrentValue, 8));
            $this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // Created
            $this->Created->EditAttrs["class"] = "form-control";
            $this->Created->EditCustomAttributes = "";
            $this->Created->EditValue = HtmlEncode(FormatDateTime($this->Created->CurrentValue, 8));
            $this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // GroupHead
            $this->GroupHead->EditAttrs["class"] = "form-control";
            $this->GroupHead->EditCustomAttributes = "";
            if (!$this->GroupHead->Raw) {
                $this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
            }
            $this->GroupHead->EditValue = HtmlEncode($this->GroupHead->CurrentValue);
            $this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

            // Cost
            $this->Cost->EditAttrs["class"] = "form-control";
            $this->Cost->EditCustomAttributes = "";
            $this->Cost->EditValue = HtmlEncode($this->Cost->CurrentValue);
            $this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
            if (strval($this->Cost->EditValue) != "" && is_numeric($this->Cost->EditValue)) {
                $this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
                $this->Cost->OldValue = $this->Cost->EditValue;
            }

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            if (!$this->PaymentStatus->Raw) {
                $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
            }
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // PayMode
            $this->PayMode->EditAttrs["class"] = "form-control";
            $this->PayMode->EditCustomAttributes = "";
            if (!$this->PayMode->Raw) {
                $this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
            }
            $this->PayMode->EditValue = HtmlEncode($this->PayMode->CurrentValue);
            $this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

            // VoucherNo
            $this->VoucherNo->EditAttrs["class"] = "form-control";
            $this->VoucherNo->EditCustomAttributes = "";
            if (!$this->VoucherNo->Raw) {
                $this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
            }
            $this->VoucherNo->EditValue = HtmlEncode($this->VoucherNo->CurrentValue);
            $this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Investigation
            $this->Investigation->LinkCustomAttributes = "";
            $this->Investigation->HrefValue = "";

            // Value
            $this->Value->LinkCustomAttributes = "";
            $this->Value->HrefValue = "";

            // NormalRange
            $this->NormalRange->LinkCustomAttributes = "";
            $this->NormalRange->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // SampleCollected
            $this->SampleCollected->LinkCustomAttributes = "";
            $this->SampleCollected->HrefValue = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->LinkCustomAttributes = "";
            $this->SampleCollectedBy->HrefValue = "";

            // ResultedDate
            $this->ResultedDate->LinkCustomAttributes = "";
            $this->ResultedDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // Created
            $this->Created->LinkCustomAttributes = "";
            $this->Created->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // GroupHead
            $this->GroupHead->LinkCustomAttributes = "";
            $this->GroupHead->HrefValue = "";

            // Cost
            $this->Cost->LinkCustomAttributes = "";
            $this->Cost->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // PayMode
            $this->PayMode->LinkCustomAttributes = "";
            $this->PayMode->HrefValue = "";

            // VoucherNo
            $this->VoucherNo->LinkCustomAttributes = "";
            $this->VoucherNo->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Investigation
            $this->Investigation->EditAttrs["class"] = "form-control";
            $this->Investigation->EditCustomAttributes = "";
            if (!$this->Investigation->Raw) {
                $this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
            }
            $this->Investigation->EditValue = HtmlEncode($this->Investigation->CurrentValue);
            $this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

            // Value
            $this->Value->EditAttrs["class"] = "form-control";
            $this->Value->EditCustomAttributes = "";
            if (!$this->Value->Raw) {
                $this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
            }
            $this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
            $this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

            // NormalRange
            $this->NormalRange->EditAttrs["class"] = "form-control";
            $this->NormalRange->EditCustomAttributes = "";
            if (!$this->NormalRange->Raw) {
                $this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
            }
            $this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
            $this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

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

            // SampleCollected
            $this->SampleCollected->EditAttrs["class"] = "form-control";
            $this->SampleCollected->EditCustomAttributes = "";
            $this->SampleCollected->EditValue = HtmlEncode(FormatDateTime($this->SampleCollected->CurrentValue, 8));
            $this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

            // SampleCollectedBy
            $this->SampleCollectedBy->EditAttrs["class"] = "form-control";
            $this->SampleCollectedBy->EditCustomAttributes = "";
            if (!$this->SampleCollectedBy->Raw) {
                $this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
            }
            $this->SampleCollectedBy->EditValue = HtmlEncode($this->SampleCollectedBy->CurrentValue);
            $this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

            // ResultedDate
            $this->ResultedDate->EditAttrs["class"] = "form-control";
            $this->ResultedDate->EditCustomAttributes = "";
            $this->ResultedDate->EditValue = HtmlEncode(FormatDateTime($this->ResultedDate->CurrentValue, 8));
            $this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

            // Modified
            $this->Modified->EditAttrs["class"] = "form-control";
            $this->Modified->EditCustomAttributes = "";
            $this->Modified->EditValue = HtmlEncode(FormatDateTime($this->Modified->CurrentValue, 8));
            $this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // Created
            $this->Created->EditAttrs["class"] = "form-control";
            $this->Created->EditCustomAttributes = "";
            $this->Created->EditValue = HtmlEncode(FormatDateTime($this->Created->CurrentValue, 8));
            $this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // GroupHead
            $this->GroupHead->EditAttrs["class"] = "form-control";
            $this->GroupHead->EditCustomAttributes = "";
            if (!$this->GroupHead->Raw) {
                $this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
            }
            $this->GroupHead->EditValue = HtmlEncode($this->GroupHead->CurrentValue);
            $this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

            // Cost
            $this->Cost->EditAttrs["class"] = "form-control";
            $this->Cost->EditCustomAttributes = "";
            $this->Cost->EditValue = HtmlEncode($this->Cost->CurrentValue);
            $this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
            if (strval($this->Cost->EditValue) != "" && is_numeric($this->Cost->EditValue)) {
                $this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
                $this->Cost->OldValue = $this->Cost->EditValue;
            }

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            if (!$this->PaymentStatus->Raw) {
                $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
            }
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // PayMode
            $this->PayMode->EditAttrs["class"] = "form-control";
            $this->PayMode->EditCustomAttributes = "";
            if (!$this->PayMode->Raw) {
                $this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
            }
            $this->PayMode->EditValue = HtmlEncode($this->PayMode->CurrentValue);
            $this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

            // VoucherNo
            $this->VoucherNo->EditAttrs["class"] = "form-control";
            $this->VoucherNo->EditCustomAttributes = "";
            if (!$this->VoucherNo->Raw) {
                $this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
            }
            $this->VoucherNo->EditValue = HtmlEncode($this->VoucherNo->CurrentValue);
            $this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Investigation
            $this->Investigation->LinkCustomAttributes = "";
            $this->Investigation->HrefValue = "";

            // Value
            $this->Value->LinkCustomAttributes = "";
            $this->Value->HrefValue = "";

            // NormalRange
            $this->NormalRange->LinkCustomAttributes = "";
            $this->NormalRange->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // SampleCollected
            $this->SampleCollected->LinkCustomAttributes = "";
            $this->SampleCollected->HrefValue = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->LinkCustomAttributes = "";
            $this->SampleCollectedBy->HrefValue = "";

            // ResultedDate
            $this->ResultedDate->LinkCustomAttributes = "";
            $this->ResultedDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // Created
            $this->Created->LinkCustomAttributes = "";
            $this->Created->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // GroupHead
            $this->GroupHead->LinkCustomAttributes = "";
            $this->GroupHead->HrefValue = "";

            // Cost
            $this->Cost->LinkCustomAttributes = "";
            $this->Cost->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // PayMode
            $this->PayMode->LinkCustomAttributes = "";
            $this->PayMode->HrefValue = "";

            // VoucherNo
            $this->VoucherNo->LinkCustomAttributes = "";
            $this->VoucherNo->HrefValue = "";
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
        if ($this->Investigation->Required) {
            if (!$this->Investigation->IsDetailKey && EmptyValue($this->Investigation->FormValue)) {
                $this->Investigation->addErrorMessage(str_replace("%s", $this->Investigation->caption(), $this->Investigation->RequiredErrorMessage));
            }
        }
        if ($this->Value->Required) {
            if (!$this->Value->IsDetailKey && EmptyValue($this->Value->FormValue)) {
                $this->Value->addErrorMessage(str_replace("%s", $this->Value->caption(), $this->Value->RequiredErrorMessage));
            }
        }
        if ($this->NormalRange->Required) {
            if (!$this->NormalRange->IsDetailKey && EmptyValue($this->NormalRange->FormValue)) {
                $this->NormalRange->addErrorMessage(str_replace("%s", $this->NormalRange->caption(), $this->NormalRange->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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
        if ($this->SampleCollected->Required) {
            if (!$this->SampleCollected->IsDetailKey && EmptyValue($this->SampleCollected->FormValue)) {
                $this->SampleCollected->addErrorMessage(str_replace("%s", $this->SampleCollected->caption(), $this->SampleCollected->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SampleCollected->FormValue)) {
            $this->SampleCollected->addErrorMessage($this->SampleCollected->getErrorMessage(false));
        }
        if ($this->SampleCollectedBy->Required) {
            if (!$this->SampleCollectedBy->IsDetailKey && EmptyValue($this->SampleCollectedBy->FormValue)) {
                $this->SampleCollectedBy->addErrorMessage(str_replace("%s", $this->SampleCollectedBy->caption(), $this->SampleCollectedBy->RequiredErrorMessage));
            }
        }
        if ($this->ResultedDate->Required) {
            if (!$this->ResultedDate->IsDetailKey && EmptyValue($this->ResultedDate->FormValue)) {
                $this->ResultedDate->addErrorMessage(str_replace("%s", $this->ResultedDate->caption(), $this->ResultedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultedDate->FormValue)) {
            $this->ResultedDate->addErrorMessage($this->ResultedDate->getErrorMessage(false));
        }
        if ($this->ResultedBy->Required) {
            if (!$this->ResultedBy->IsDetailKey && EmptyValue($this->ResultedBy->FormValue)) {
                $this->ResultedBy->addErrorMessage(str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
            }
        }
        if ($this->Modified->Required) {
            if (!$this->Modified->IsDetailKey && EmptyValue($this->Modified->FormValue)) {
                $this->Modified->addErrorMessage(str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Modified->FormValue)) {
            $this->Modified->addErrorMessage($this->Modified->getErrorMessage(false));
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if ($this->Created->Required) {
            if (!$this->Created->IsDetailKey && EmptyValue($this->Created->FormValue)) {
                $this->Created->addErrorMessage(str_replace("%s", $this->Created->caption(), $this->Created->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Created->FormValue)) {
            $this->Created->addErrorMessage($this->Created->getErrorMessage(false));
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if ($this->GroupHead->Required) {
            if (!$this->GroupHead->IsDetailKey && EmptyValue($this->GroupHead->FormValue)) {
                $this->GroupHead->addErrorMessage(str_replace("%s", $this->GroupHead->caption(), $this->GroupHead->RequiredErrorMessage));
            }
        }
        if ($this->Cost->Required) {
            if (!$this->Cost->IsDetailKey && EmptyValue($this->Cost->FormValue)) {
                $this->Cost->addErrorMessage(str_replace("%s", $this->Cost->caption(), $this->Cost->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Cost->FormValue)) {
            $this->Cost->addErrorMessage($this->Cost->getErrorMessage(false));
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if ($this->PayMode->Required) {
            if (!$this->PayMode->IsDetailKey && EmptyValue($this->PayMode->FormValue)) {
                $this->PayMode->addErrorMessage(str_replace("%s", $this->PayMode->caption(), $this->PayMode->RequiredErrorMessage));
            }
        }
        if ($this->VoucherNo->Required) {
            if (!$this->VoucherNo->IsDetailKey && EmptyValue($this->VoucherNo->FormValue)) {
                $this->VoucherNo->addErrorMessage(str_replace("%s", $this->VoucherNo->caption(), $this->VoucherNo->RequiredErrorMessage));
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

            // Investigation
            $this->Investigation->setDbValueDef($rsnew, $this->Investigation->CurrentValue, null, $this->Investigation->ReadOnly);

            // Value
            $this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, null, $this->Value->ReadOnly);

            // NormalRange
            $this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, null, $this->NormalRange->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // SampleCollected
            $this->SampleCollected->setDbValueDef($rsnew, UnFormatDateTime($this->SampleCollected->CurrentValue, 0), null, $this->SampleCollected->ReadOnly);

            // SampleCollectedBy
            $this->SampleCollectedBy->setDbValueDef($rsnew, $this->SampleCollectedBy->CurrentValue, null, $this->SampleCollectedBy->ReadOnly);

            // ResultedDate
            $this->ResultedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultedDate->CurrentValue, 0), null, $this->ResultedDate->ReadOnly);

            // ResultedBy
            $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null, $this->ResultedBy->ReadOnly);

            // Modified
            $this->Modified->setDbValueDef($rsnew, UnFormatDateTime($this->Modified->CurrentValue, 0), null, $this->Modified->ReadOnly);

            // ModifiedBy
            $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, $this->ModifiedBy->ReadOnly);

            // Created
            $this->Created->setDbValueDef($rsnew, UnFormatDateTime($this->Created->CurrentValue, 0), null, $this->Created->ReadOnly);

            // CreatedBy
            $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, $this->CreatedBy->ReadOnly);

            // GroupHead
            $this->GroupHead->setDbValueDef($rsnew, $this->GroupHead->CurrentValue, null, $this->GroupHead->ReadOnly);

            // Cost
            $this->Cost->setDbValueDef($rsnew, $this->Cost->CurrentValue, null, $this->Cost->ReadOnly);

            // PaymentStatus
            $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, $this->PaymentStatus->ReadOnly);

            // PayMode
            $this->PayMode->setDbValueDef($rsnew, $this->PayMode->CurrentValue, null, $this->PayMode->ReadOnly);

            // VoucherNo
            $this->VoucherNo->setDbValueDef($rsnew, $this->VoucherNo->CurrentValue, null, $this->VoucherNo->ReadOnly);

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

        // Investigation
        $this->Investigation->setDbValueDef($rsnew, $this->Investigation->CurrentValue, null, false);

        // Value
        $this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, null, false);

        // NormalRange
        $this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // SampleCollected
        $this->SampleCollected->setDbValueDef($rsnew, UnFormatDateTime($this->SampleCollected->CurrentValue, 0), null, false);

        // SampleCollectedBy
        $this->SampleCollectedBy->setDbValueDef($rsnew, $this->SampleCollectedBy->CurrentValue, null, false);

        // ResultedDate
        $this->ResultedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultedDate->CurrentValue, 0), null, false);

        // ResultedBy
        $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null, false);

        // Modified
        $this->Modified->setDbValueDef($rsnew, UnFormatDateTime($this->Modified->CurrentValue, 0), null, false);

        // ModifiedBy
        $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, false);

        // Created
        $this->Created->setDbValueDef($rsnew, UnFormatDateTime($this->Created->CurrentValue, 0), null, false);

        // CreatedBy
        $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, false);

        // GroupHead
        $this->GroupHead->setDbValueDef($rsnew, $this->GroupHead->CurrentValue, null, false);

        // Cost
        $this->Cost->setDbValueDef($rsnew, $this->Cost->CurrentValue, null, false);

        // PaymentStatus
        $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, false);

        // PayMode
        $this->PayMode->setDbValueDef($rsnew, $this->PayMode->CurrentValue, null, false);

        // VoucherNo
        $this->VoucherNo->setDbValueDef($rsnew, $this->VoucherNo->CurrentValue, null, false);

        // Reception
        if ($this->Reception->getSessionValue() != "") {
            $rsnew['Reception'] = $this->Reception->getSessionValue();
        }

        // PatientId
        if ($this->PatientId->getSessionValue() != "") {
            $rsnew['PatientId'] = $this->PatientId->getSessionValue();
        }

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
