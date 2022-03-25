<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientPrescriptionGrid extends PatientPrescription
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_prescription';

    // Page object name
    public $PageObjName = "PatientPrescriptionGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpatient_prescriptiongrid";
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

        // Table object (patient_prescription)
        if (!isset($GLOBALS["patient_prescription"]) || get_class($GLOBALS["patient_prescription"]) == PROJECT_NAMESPACE . "patient_prescription") {
            $GLOBALS["patient_prescription"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "PatientPrescriptionAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_prescription');
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
                $doc = new $class(Container("patient_prescription"));
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
    public $SearchFieldsPerRow = 20; // For extended search
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
        $this->Reception->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Medicine->setVisibility();
        $this->M->setVisibility();
        $this->A->setVisibility();
        $this->N->setVisibility();
        $this->NoOfDays->setVisibility();
        $this->PreRoute->setVisibility();
        $this->TimeOfTaking->setVisibility();
        $this->Type->setVisibility();
        $this->mrnno->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->Status->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreateDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
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
        $this->setupLookupOptions($this->Medicine);
        $this->setupLookupOptions($this->PreRoute);
        $this->setupLookupOptions($this->TimeOfTaking);
        $this->setupLookupOptions($this->Status);

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
        if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Medicine") && $CurrentForm->hasValue("o_Medicine") && $this->Medicine->CurrentValue != $this->Medicine->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_M") && $CurrentForm->hasValue("o_M") && $this->M->CurrentValue != $this->M->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_A") && $CurrentForm->hasValue("o_A") && $this->A->CurrentValue != $this->A->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_N") && $CurrentForm->hasValue("o_N") && $this->N->CurrentValue != $this->N->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NoOfDays") && $CurrentForm->hasValue("o_NoOfDays") && $this->NoOfDays->CurrentValue != $this->NoOfDays->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PreRoute") && $CurrentForm->hasValue("o_PreRoute") && $this->PreRoute->CurrentValue != $this->PreRoute->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TimeOfTaking") && $CurrentForm->hasValue("o_TimeOfTaking") && $this->TimeOfTaking->CurrentValue != $this->TimeOfTaking->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Type") && $CurrentForm->hasValue("o_Type") && $this->Type->CurrentValue != $this->Type->OldValue) {
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
        if ($CurrentForm->hasValue("x_profilePic") && $CurrentForm->hasValue("o_profilePic") && $this->profilePic->CurrentValue != $this->profilePic->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue != $this->Status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CreatedBy") && $CurrentForm->hasValue("o_CreatedBy") && $this->CreatedBy->CurrentValue != $this->CreatedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CreateDateTime") && $CurrentForm->hasValue("o_CreateDateTime") && $this->CreateDateTime->CurrentValue != $this->CreateDateTime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ModifiedBy") && $CurrentForm->hasValue("o_ModifiedBy") && $this->ModifiedBy->CurrentValue != $this->ModifiedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ModifiedDateTime") && $CurrentForm->hasValue("o_ModifiedDateTime") && $this->ModifiedDateTime->CurrentValue != $this->ModifiedDateTime->OldValue) {
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
        $this->Reception->clearErrorMessage();
        $this->PatientId->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->Medicine->clearErrorMessage();
        $this->M->clearErrorMessage();
        $this->A->clearErrorMessage();
        $this->N->clearErrorMessage();
        $this->NoOfDays->clearErrorMessage();
        $this->PreRoute->clearErrorMessage();
        $this->TimeOfTaking->clearErrorMessage();
        $this->Type->clearErrorMessage();
        $this->mrnno->clearErrorMessage();
        $this->Age->clearErrorMessage();
        $this->Gender->clearErrorMessage();
        $this->profilePic->clearErrorMessage();
        $this->Status->clearErrorMessage();
        $this->CreatedBy->clearErrorMessage();
        $this->CreateDateTime->clearErrorMessage();
        $this->ModifiedBy->clearErrorMessage();
        $this->ModifiedDateTime->clearErrorMessage();
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

            // "delete"
            $opt = $this->ListOptions["delete"];
            if ($Security->canDelete()) {
            $opt->Body = "<a class=\"ew-row-link ew-delete\"" . " onclick=\"return ew.confirmDelete(this);\"" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("DeleteLink") . "</a>";
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
        $this->Medicine->CurrentValue = null;
        $this->Medicine->OldValue = $this->Medicine->CurrentValue;
        $this->M->CurrentValue = null;
        $this->M->OldValue = $this->M->CurrentValue;
        $this->A->CurrentValue = null;
        $this->A->OldValue = $this->A->CurrentValue;
        $this->N->CurrentValue = null;
        $this->N->OldValue = $this->N->CurrentValue;
        $this->NoOfDays->CurrentValue = null;
        $this->NoOfDays->OldValue = $this->NoOfDays->CurrentValue;
        $this->PreRoute->CurrentValue = null;
        $this->PreRoute->OldValue = $this->PreRoute->CurrentValue;
        $this->TimeOfTaking->CurrentValue = null;
        $this->TimeOfTaking->OldValue = $this->TimeOfTaking->CurrentValue;
        $this->Type->CurrentValue = null;
        $this->Type->OldValue = $this->Type->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->Status->CurrentValue = null;
        $this->Status->OldValue = $this->Status->CurrentValue;
        $this->CreatedBy->CurrentValue = null;
        $this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
        $this->CreateDateTime->CurrentValue = null;
        $this->CreateDateTime->OldValue = $this->CreateDateTime->CurrentValue;
        $this->ModifiedBy->CurrentValue = null;
        $this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedDateTime->CurrentValue = null;
        $this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
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

        // Check field name 'Medicine' first before field var 'x_Medicine'
        $val = $CurrentForm->hasValue("Medicine") ? $CurrentForm->getValue("Medicine") : $CurrentForm->getValue("x_Medicine");
        if (!$this->Medicine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medicine->Visible = false; // Disable update for API request
            } else {
                $this->Medicine->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Medicine")) {
            $this->Medicine->setOldValue($CurrentForm->getValue("o_Medicine"));
        }

        // Check field name 'M' first before field var 'x_M'
        $val = $CurrentForm->hasValue("M") ? $CurrentForm->getValue("M") : $CurrentForm->getValue("x_M");
        if (!$this->M->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->M->Visible = false; // Disable update for API request
            } else {
                $this->M->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_M")) {
            $this->M->setOldValue($CurrentForm->getValue("o_M"));
        }

        // Check field name 'A' first before field var 'x_A'
        $val = $CurrentForm->hasValue("A") ? $CurrentForm->getValue("A") : $CurrentForm->getValue("x_A");
        if (!$this->A->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A->Visible = false; // Disable update for API request
            } else {
                $this->A->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_A")) {
            $this->A->setOldValue($CurrentForm->getValue("o_A"));
        }

        // Check field name 'N' first before field var 'x_N'
        $val = $CurrentForm->hasValue("N") ? $CurrentForm->getValue("N") : $CurrentForm->getValue("x_N");
        if (!$this->N->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->N->Visible = false; // Disable update for API request
            } else {
                $this->N->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_N")) {
            $this->N->setOldValue($CurrentForm->getValue("o_N"));
        }

        // Check field name 'NoOfDays' first before field var 'x_NoOfDays'
        $val = $CurrentForm->hasValue("NoOfDays") ? $CurrentForm->getValue("NoOfDays") : $CurrentForm->getValue("x_NoOfDays");
        if (!$this->NoOfDays->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfDays->Visible = false; // Disable update for API request
            } else {
                $this->NoOfDays->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NoOfDays")) {
            $this->NoOfDays->setOldValue($CurrentForm->getValue("o_NoOfDays"));
        }

        // Check field name 'PreRoute' first before field var 'x_PreRoute'
        $val = $CurrentForm->hasValue("PreRoute") ? $CurrentForm->getValue("PreRoute") : $CurrentForm->getValue("x_PreRoute");
        if (!$this->PreRoute->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreRoute->Visible = false; // Disable update for API request
            } else {
                $this->PreRoute->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PreRoute")) {
            $this->PreRoute->setOldValue($CurrentForm->getValue("o_PreRoute"));
        }

        // Check field name 'TimeOfTaking' first before field var 'x_TimeOfTaking'
        $val = $CurrentForm->hasValue("TimeOfTaking") ? $CurrentForm->getValue("TimeOfTaking") : $CurrentForm->getValue("x_TimeOfTaking");
        if (!$this->TimeOfTaking->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TimeOfTaking->Visible = false; // Disable update for API request
            } else {
                $this->TimeOfTaking->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TimeOfTaking")) {
            $this->TimeOfTaking->setOldValue($CurrentForm->getValue("o_TimeOfTaking"));
        }

        // Check field name 'Type' first before field var 'x_Type'
        $val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
        if (!$this->Type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Type->Visible = false; // Disable update for API request
            } else {
                $this->Type->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Type")) {
            $this->Type->setOldValue($CurrentForm->getValue("o_Type"));
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

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_profilePic")) {
            $this->profilePic->setOldValue($CurrentForm->getValue("o_profilePic"));
        }

        // Check field name 'Status' first before field var 'x_Status'
        $val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
        if (!$this->Status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Status->Visible = false; // Disable update for API request
            } else {
                $this->Status->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Status")) {
            $this->Status->setOldValue($CurrentForm->getValue("o_Status"));
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

        // Check field name 'CreateDateTime' first before field var 'x_CreateDateTime'
        $val = $CurrentForm->hasValue("CreateDateTime") ? $CurrentForm->getValue("CreateDateTime") : $CurrentForm->getValue("x_CreateDateTime");
        if (!$this->CreateDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreateDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CreateDateTime->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CreateDateTime")) {
            $this->CreateDateTime->setOldValue($CurrentForm->getValue("o_CreateDateTime"));
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

        // Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
        $val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
        if (!$this->ModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedDateTime->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ModifiedDateTime")) {
            $this->ModifiedDateTime->setOldValue($CurrentForm->getValue("o_ModifiedDateTime"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Medicine->CurrentValue = $this->Medicine->FormValue;
        $this->M->CurrentValue = $this->M->FormValue;
        $this->A->CurrentValue = $this->A->FormValue;
        $this->N->CurrentValue = $this->N->FormValue;
        $this->NoOfDays->CurrentValue = $this->NoOfDays->FormValue;
        $this->PreRoute->CurrentValue = $this->PreRoute->FormValue;
        $this->TimeOfTaking->CurrentValue = $this->TimeOfTaking->FormValue;
        $this->Type->CurrentValue = $this->Type->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->CreateDateTime->CurrentValue = $this->CreateDateTime->FormValue;
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
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
        $this->Medicine->setDbValue($row['Medicine']);
        $this->M->setDbValue($row['M']);
        $this->A->setDbValue($row['A']);
        $this->N->setDbValue($row['N']);
        $this->NoOfDays->setDbValue($row['NoOfDays']);
        $this->PreRoute->setDbValue($row['PreRoute']);
        if (array_key_exists('EV__PreRoute', $row)) {
            $this->PreRoute->VirtualValue = $row['EV__PreRoute']; // Set up virtual field value
        } else {
            $this->PreRoute->VirtualValue = ""; // Clear value
        }
        $this->TimeOfTaking->setDbValue($row['TimeOfTaking']);
        if (array_key_exists('EV__TimeOfTaking', $row)) {
            $this->TimeOfTaking->VirtualValue = $row['EV__TimeOfTaking']; // Set up virtual field value
        } else {
            $this->TimeOfTaking->VirtualValue = ""; // Clear value
        }
        $this->Type->setDbValue($row['Type']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Status->setDbValue($row['Status']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreateDateTime->setDbValue($row['CreateDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
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
        $row['Medicine'] = $this->Medicine->CurrentValue;
        $row['M'] = $this->M->CurrentValue;
        $row['A'] = $this->A->CurrentValue;
        $row['N'] = $this->N->CurrentValue;
        $row['NoOfDays'] = $this->NoOfDays->CurrentValue;
        $row['PreRoute'] = $this->PreRoute->CurrentValue;
        $row['TimeOfTaking'] = $this->TimeOfTaking->CurrentValue;
        $row['Type'] = $this->Type->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['Status'] = $this->Status->CurrentValue;
        $row['CreatedBy'] = $this->CreatedBy->CurrentValue;
        $row['CreateDateTime'] = $this->CreateDateTime->CurrentValue;
        $row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
        $row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
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

        // Reception

        // PatientId

        // PatientName

        // Medicine
        $this->Medicine->CellCssStyle = "min-width: 20px;";

        // M

        // A

        // N

        // NoOfDays

        // PreRoute

        // TimeOfTaking

        // Type
        $this->Type->CellCssStyle = "min-width: 12px;";

        // mrnno

        // Age

        // Gender

        // profilePic

        // Status

        // CreatedBy

        // CreateDateTime

        // ModifiedBy

        // ModifiedDateTime
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Medicine
            $this->Medicine->ViewValue = $this->Medicine->CurrentValue;
            $curVal = trim(strval($this->Medicine->CurrentValue));
            if ($curVal != "") {
                $this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
                if ($this->Medicine->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Medicine->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Medicine->Lookup->renderViewRow($rswrk[0]);
                        $this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
                    } else {
                        $this->Medicine->ViewValue = $this->Medicine->CurrentValue;
                    }
                }
            } else {
                $this->Medicine->ViewValue = null;
            }
            $this->Medicine->ViewCustomAttributes = "";

            // M
            $this->M->ViewValue = $this->M->CurrentValue;
            $this->M->ViewCustomAttributes = "";

            // A
            $this->A->ViewValue = $this->A->CurrentValue;
            $this->A->ViewCustomAttributes = "";

            // N
            $this->N->ViewValue = $this->N->CurrentValue;
            $this->N->ViewCustomAttributes = "";

            // NoOfDays
            $this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
            $this->NoOfDays->ViewCustomAttributes = "";

            // PreRoute
            if ($this->PreRoute->VirtualValue != "") {
                $this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
            } else {
                $this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
                $curVal = trim(strval($this->PreRoute->CurrentValue));
                if ($curVal != "") {
                    $this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
                    if ($this->PreRoute->ViewValue === null) { // Lookup from database
                        $filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->PreRoute->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->PreRoute->Lookup->renderViewRow($rswrk[0]);
                            $this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
                        } else {
                            $this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
                        }
                    }
                } else {
                    $this->PreRoute->ViewValue = null;
                }
            }
            $this->PreRoute->ViewCustomAttributes = "";

            // TimeOfTaking
            if ($this->TimeOfTaking->VirtualValue != "") {
                $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
            } else {
                $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
                $curVal = trim(strval($this->TimeOfTaking->CurrentValue));
                if ($curVal != "") {
                    $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
                    if ($this->TimeOfTaking->ViewValue === null) { // Lookup from database
                        $filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->TimeOfTaking->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->TimeOfTaking->Lookup->renderViewRow($rswrk[0]);
                            $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
                        } else {
                            $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
                        }
                    }
                } else {
                    $this->TimeOfTaking->ViewValue = null;
                }
            }
            $this->TimeOfTaking->ViewCustomAttributes = "";

            // Type
            if (strval($this->Type->CurrentValue) != "") {
                $this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
            } else {
                $this->Type->ViewValue = null;
            }
            $this->Type->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Status
            $curVal = trim(strval($this->Status->CurrentValue));
            if ($curVal != "") {
                $this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
                if ($this->Status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Status`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Status->Lookup->renderViewRow($rswrk[0]);
                        $this->Status->ViewValue = $this->Status->displayValue($arwrk);
                    } else {
                        $this->Status->ViewValue = $this->Status->CurrentValue;
                    }
                }
            } else {
                $this->Status->ViewValue = null;
            }
            $this->Status->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreateDateTime
            $this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
            $this->CreateDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Medicine
            $this->Medicine->LinkCustomAttributes = "";
            $this->Medicine->HrefValue = "";
            $this->Medicine->TooltipValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";
            $this->M->TooltipValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";
            $this->A->TooltipValue = "";

            // N
            $this->N->LinkCustomAttributes = "";
            $this->N->HrefValue = "";
            $this->N->TooltipValue = "";

            // NoOfDays
            $this->NoOfDays->LinkCustomAttributes = "";
            $this->NoOfDays->HrefValue = "";
            $this->NoOfDays->TooltipValue = "";

            // PreRoute
            $this->PreRoute->LinkCustomAttributes = "";
            $this->PreRoute->HrefValue = "";
            $this->PreRoute->TooltipValue = "";

            // TimeOfTaking
            $this->TimeOfTaking->LinkCustomAttributes = "";
            $this->TimeOfTaking->HrefValue = "";
            $this->TimeOfTaking->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreateDateTime
            $this->CreateDateTime->LinkCustomAttributes = "";
            $this->CreateDateTime->HrefValue = "";
            $this->CreateDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

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

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if ($this->PatientId->getSessionValue() != "") {
                $this->PatientId->CurrentValue = GetForeignKeyValue($this->PatientId->getSessionValue());
                $this->PatientId->OldValue = $this->PatientId->CurrentValue;
                $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
                $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
                $this->PatientId->ViewCustomAttributes = "";
            } else {
                $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
                $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
            }

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Medicine
            $this->Medicine->EditAttrs["class"] = "form-control";
            $this->Medicine->EditCustomAttributes = "";
            if (!$this->Medicine->Raw) {
                $this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
            }
            $this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
            $curVal = trim(strval($this->Medicine->CurrentValue));
            if ($curVal != "") {
                $this->Medicine->EditValue = $this->Medicine->lookupCacheOption($curVal);
                if ($this->Medicine->EditValue === null) { // Lookup from database
                    $filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Medicine->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Medicine->Lookup->renderViewRow($rswrk[0]);
                        $this->Medicine->EditValue = $this->Medicine->displayValue($arwrk);
                    } else {
                        $this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
                    }
                }
            } else {
                $this->Medicine->EditValue = null;
            }
            $this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

            // M
            $this->M->EditAttrs["class"] = "form-control";
            $this->M->EditCustomAttributes = "";
            if (!$this->M->Raw) {
                $this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
            }
            $this->M->EditValue = HtmlEncode($this->M->CurrentValue);
            $this->M->PlaceHolder = RemoveHtml($this->M->caption());

            // A
            $this->A->EditAttrs["class"] = "form-control";
            $this->A->EditCustomAttributes = "";
            if (!$this->A->Raw) {
                $this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
            }
            $this->A->EditValue = HtmlEncode($this->A->CurrentValue);
            $this->A->PlaceHolder = RemoveHtml($this->A->caption());

            // N
            $this->N->EditAttrs["class"] = "form-control";
            $this->N->EditCustomAttributes = "";
            if (!$this->N->Raw) {
                $this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
            }
            $this->N->EditValue = HtmlEncode($this->N->CurrentValue);
            $this->N->PlaceHolder = RemoveHtml($this->N->caption());

            // NoOfDays
            $this->NoOfDays->EditAttrs["class"] = "form-control";
            $this->NoOfDays->EditCustomAttributes = "";
            if (!$this->NoOfDays->Raw) {
                $this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
            }
            $this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
            $this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

            // PreRoute
            $this->PreRoute->EditAttrs["class"] = "form-control";
            $this->PreRoute->EditCustomAttributes = "";
            if (!$this->PreRoute->Raw) {
                $this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
            }
            $this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
            $this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

            // TimeOfTaking
            $this->TimeOfTaking->EditAttrs["class"] = "form-control";
            $this->TimeOfTaking->EditCustomAttributes = "";
            if (!$this->TimeOfTaking->Raw) {
                $this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
            }
            $this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
            $this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

            // Type
            $this->Type->EditAttrs["class"] = "form-control";
            $this->Type->EditCustomAttributes = "";
            $this->Type->EditValue = $this->Type->options(true);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

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

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            $curVal = trim(strval($this->Status->CurrentValue));
            if ($curVal != "") {
                $this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
            } else {
                $this->Status->ViewValue = $this->Status->Lookup !== null && is_array($this->Status->Lookup->Options) ? $curVal : null;
            }
            if ($this->Status->ViewValue !== null) { // Load from cache
                $this->Status->EditValue = array_values($this->Status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Status`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Status->EditValue = $arwrk;
            }
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreateDateTime
            $this->CreateDateTime->EditAttrs["class"] = "form-control";
            $this->CreateDateTime->EditCustomAttributes = "";
            if (!$this->CreateDateTime->Raw) {
                $this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
            }
            $this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->CurrentValue);
            $this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            if (!$this->ModifiedDateTime->Raw) {
                $this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
            }
            $this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->CurrentValue);
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Medicine
            $this->Medicine->LinkCustomAttributes = "";
            $this->Medicine->HrefValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";

            // N
            $this->N->LinkCustomAttributes = "";
            $this->N->HrefValue = "";

            // NoOfDays
            $this->NoOfDays->LinkCustomAttributes = "";
            $this->NoOfDays->HrefValue = "";

            // PreRoute
            $this->PreRoute->LinkCustomAttributes = "";
            $this->PreRoute->HrefValue = "";

            // TimeOfTaking
            $this->TimeOfTaking->LinkCustomAttributes = "";
            $this->TimeOfTaking->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // CreateDateTime
            $this->CreateDateTime->LinkCustomAttributes = "";
            $this->CreateDateTime->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Medicine
            $this->Medicine->EditAttrs["class"] = "form-control";
            $this->Medicine->EditCustomAttributes = "";
            if (!$this->Medicine->Raw) {
                $this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
            }
            $this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
            $curVal = trim(strval($this->Medicine->CurrentValue));
            if ($curVal != "") {
                $this->Medicine->EditValue = $this->Medicine->lookupCacheOption($curVal);
                if ($this->Medicine->EditValue === null) { // Lookup from database
                    $filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Medicine->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Medicine->Lookup->renderViewRow($rswrk[0]);
                        $this->Medicine->EditValue = $this->Medicine->displayValue($arwrk);
                    } else {
                        $this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
                    }
                }
            } else {
                $this->Medicine->EditValue = null;
            }
            $this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

            // M
            $this->M->EditAttrs["class"] = "form-control";
            $this->M->EditCustomAttributes = "";
            if (!$this->M->Raw) {
                $this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
            }
            $this->M->EditValue = HtmlEncode($this->M->CurrentValue);
            $this->M->PlaceHolder = RemoveHtml($this->M->caption());

            // A
            $this->A->EditAttrs["class"] = "form-control";
            $this->A->EditCustomAttributes = "";
            if (!$this->A->Raw) {
                $this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
            }
            $this->A->EditValue = HtmlEncode($this->A->CurrentValue);
            $this->A->PlaceHolder = RemoveHtml($this->A->caption());

            // N
            $this->N->EditAttrs["class"] = "form-control";
            $this->N->EditCustomAttributes = "";
            if (!$this->N->Raw) {
                $this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
            }
            $this->N->EditValue = HtmlEncode($this->N->CurrentValue);
            $this->N->PlaceHolder = RemoveHtml($this->N->caption());

            // NoOfDays
            $this->NoOfDays->EditAttrs["class"] = "form-control";
            $this->NoOfDays->EditCustomAttributes = "";
            if (!$this->NoOfDays->Raw) {
                $this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
            }
            $this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
            $this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

            // PreRoute
            $this->PreRoute->EditAttrs["class"] = "form-control";
            $this->PreRoute->EditCustomAttributes = "";
            if (!$this->PreRoute->Raw) {
                $this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
            }
            $this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
            $this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

            // TimeOfTaking
            $this->TimeOfTaking->EditAttrs["class"] = "form-control";
            $this->TimeOfTaking->EditCustomAttributes = "";
            if (!$this->TimeOfTaking->Raw) {
                $this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
            }
            $this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
            $this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

            // Type
            $this->Type->EditAttrs["class"] = "form-control";
            $this->Type->EditCustomAttributes = "";
            $this->Type->EditValue = $this->Type->options(true);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

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

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            $curVal = trim(strval($this->Status->CurrentValue));
            if ($curVal != "") {
                $this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
            } else {
                $this->Status->ViewValue = $this->Status->Lookup !== null && is_array($this->Status->Lookup->Options) ? $curVal : null;
            }
            if ($this->Status->ViewValue !== null) { // Load from cache
                $this->Status->EditValue = array_values($this->Status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Status`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Status->EditValue = $arwrk;
            }
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreateDateTime
            $this->CreateDateTime->EditAttrs["class"] = "form-control";
            $this->CreateDateTime->EditCustomAttributes = "";
            if (!$this->CreateDateTime->Raw) {
                $this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
            }
            $this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->CurrentValue);
            $this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            if (!$this->ModifiedDateTime->Raw) {
                $this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
            }
            $this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->CurrentValue);
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Medicine
            $this->Medicine->LinkCustomAttributes = "";
            $this->Medicine->HrefValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";

            // N
            $this->N->LinkCustomAttributes = "";
            $this->N->HrefValue = "";

            // NoOfDays
            $this->NoOfDays->LinkCustomAttributes = "";
            $this->NoOfDays->HrefValue = "";

            // PreRoute
            $this->PreRoute->LinkCustomAttributes = "";
            $this->PreRoute->HrefValue = "";

            // TimeOfTaking
            $this->TimeOfTaking->LinkCustomAttributes = "";
            $this->TimeOfTaking->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // CreateDateTime
            $this->CreateDateTime->LinkCustomAttributes = "";
            $this->CreateDateTime->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->Medicine->Required) {
            if (!$this->Medicine->IsDetailKey && EmptyValue($this->Medicine->FormValue)) {
                $this->Medicine->addErrorMessage(str_replace("%s", $this->Medicine->caption(), $this->Medicine->RequiredErrorMessage));
            }
        }
        if ($this->M->Required) {
            if (!$this->M->IsDetailKey && EmptyValue($this->M->FormValue)) {
                $this->M->addErrorMessage(str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
            }
        }
        if ($this->A->Required) {
            if (!$this->A->IsDetailKey && EmptyValue($this->A->FormValue)) {
                $this->A->addErrorMessage(str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
            }
        }
        if ($this->N->Required) {
            if (!$this->N->IsDetailKey && EmptyValue($this->N->FormValue)) {
                $this->N->addErrorMessage(str_replace("%s", $this->N->caption(), $this->N->RequiredErrorMessage));
            }
        }
        if ($this->NoOfDays->Required) {
            if (!$this->NoOfDays->IsDetailKey && EmptyValue($this->NoOfDays->FormValue)) {
                $this->NoOfDays->addErrorMessage(str_replace("%s", $this->NoOfDays->caption(), $this->NoOfDays->RequiredErrorMessage));
            }
        }
        if ($this->PreRoute->Required) {
            if (!$this->PreRoute->IsDetailKey && EmptyValue($this->PreRoute->FormValue)) {
                $this->PreRoute->addErrorMessage(str_replace("%s", $this->PreRoute->caption(), $this->PreRoute->RequiredErrorMessage));
            }
        }
        if ($this->TimeOfTaking->Required) {
            if (!$this->TimeOfTaking->IsDetailKey && EmptyValue($this->TimeOfTaking->FormValue)) {
                $this->TimeOfTaking->addErrorMessage(str_replace("%s", $this->TimeOfTaking->caption(), $this->TimeOfTaking->RequiredErrorMessage));
            }
        }
        if ($this->Type->Required) {
            if (!$this->Type->IsDetailKey && EmptyValue($this->Type->FormValue)) {
                $this->Type->addErrorMessage(str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
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
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if ($this->CreateDateTime->Required) {
            if (!$this->CreateDateTime->IsDetailKey && EmptyValue($this->CreateDateTime->FormValue)) {
                $this->CreateDateTime->addErrorMessage(str_replace("%s", $this->CreateDateTime->caption(), $this->CreateDateTime->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
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

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Medicine
            $this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, null, $this->Medicine->ReadOnly);

            // M
            $this->M->setDbValueDef($rsnew, $this->M->CurrentValue, null, $this->M->ReadOnly);

            // A
            $this->A->setDbValueDef($rsnew, $this->A->CurrentValue, null, $this->A->ReadOnly);

            // N
            $this->N->setDbValueDef($rsnew, $this->N->CurrentValue, null, $this->N->ReadOnly);

            // NoOfDays
            $this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, null, $this->NoOfDays->ReadOnly);

            // PreRoute
            $this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, null, $this->PreRoute->ReadOnly);

            // TimeOfTaking
            $this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, null, $this->TimeOfTaking->ReadOnly);

            // Type
            $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, null, $this->Type->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // Status
            $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, $this->Status->ReadOnly);

            // CreatedBy
            $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, $this->CreatedBy->ReadOnly);

            // CreateDateTime
            $this->CreateDateTime->setDbValueDef($rsnew, $this->CreateDateTime->CurrentValue, null, $this->CreateDateTime->ReadOnly);

            // ModifiedBy
            $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, $this->ModifiedBy->ReadOnly);

            // ModifiedDateTime
            $this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, null, $this->ModifiedDateTime->ReadOnly);

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

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, 0, false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, 0, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Medicine
        $this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, null, false);

        // M
        $this->M->setDbValueDef($rsnew, $this->M->CurrentValue, null, false);

        // A
        $this->A->setDbValueDef($rsnew, $this->A->CurrentValue, null, false);

        // N
        $this->N->setDbValueDef($rsnew, $this->N->CurrentValue, null, false);

        // NoOfDays
        $this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, null, false);

        // PreRoute
        $this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, null, false);

        // TimeOfTaking
        $this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, null, false);

        // Type
        $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // Status
        $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, false);

        // CreatedBy
        $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, false);

        // CreateDateTime
        $this->CreateDateTime->setDbValueDef($rsnew, $this->CreateDateTime->CurrentValue, null, false);

        // ModifiedBy
        $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, false);

        // ModifiedDateTime
        $this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, null, false);

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
                case "x_Medicine":
                    break;
                case "x_PreRoute":
                    break;
                case "x_TimeOfTaking":
                    break;
                case "x_Type":
                    break;
                case "x_Status":
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
    public function pageLoad() {
    	//echo "Page Load";
    	$this->GridAddRowCount = 20;
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
