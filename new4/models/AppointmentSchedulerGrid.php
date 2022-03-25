<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class AppointmentSchedulerGrid extends AppointmentScheduler
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'appointment_scheduler';

    // Page object name
    public $PageObjName = "AppointmentSchedulerGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fappointment_schedulergrid";
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

        // Table object (appointment_scheduler)
        if (!isset($GLOBALS["appointment_scheduler"]) || get_class($GLOBALS["appointment_scheduler"]) == PROJECT_NAMESPACE . "appointment_scheduler") {
            $GLOBALS["appointment_scheduler"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "AppointmentSchedulerAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'appointment_scheduler');
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
                $doc = new $class(Container("appointment_scheduler"));
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
            $this->HospID->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->createdBy->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->createdDateTime->Visible = false;
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
        $this->start_date->setVisibility();
        $this->end_date->setVisibility();
        $this->patientID->setVisibility();
        $this->patientName->setVisibility();
        $this->DoctorID->setVisibility();
        $this->DoctorName->setVisibility();
        $this->AppointmentStatus->setVisibility();
        $this->status->setVisibility();
        $this->DoctorCode->setVisibility();
        $this->Department->setVisibility();
        $this->scheduler_id->setVisibility();
        $this->text->setVisibility();
        $this->appointment_status->setVisibility();
        $this->PId->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->SchEmail->setVisibility();
        $this->appointment_type->setVisibility();
        $this->Notified->setVisibility();
        $this->Purpose->setVisibility();
        $this->Notes->setVisibility();
        $this->PatientType->setVisibility();
        $this->Referal->setVisibility();
        $this->paymentType->setVisibility();
        $this->tittle->Visible = false;
        $this->gendar->Visible = false;
        $this->Dob->Visible = false;
        $this->Age->Visible = false;
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->createdBy->setVisibility();
        $this->createdDateTime->setVisibility();
        $this->PatientTypee->setVisibility();
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
        $this->setupLookupOptions($this->patientID);
        $this->setupLookupOptions($this->DoctorName);
        $this->setupLookupOptions($this->Referal);
        $this->setupLookupOptions($this->tittle);
        $this->setupLookupOptions($this->gendar);
        $this->setupLookupOptions($this->WhereDidYouHear);
        $this->setupLookupOptions($this->PatientTypee);

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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "doctors") {
            $masterTbl = Container("doctors");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("DoctorsList"); // Return to master page
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
        if ($CurrentForm->hasValue("x_start_date") && $CurrentForm->hasValue("o_start_date") && $this->start_date->CurrentValue != $this->start_date->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_end_date") && $CurrentForm->hasValue("o_end_date") && $this->end_date->CurrentValue != $this->end_date->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_patientID") && $CurrentForm->hasValue("o_patientID") && $this->patientID->CurrentValue != $this->patientID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_patientName") && $CurrentForm->hasValue("o_patientName") && $this->patientName->CurrentValue != $this->patientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DoctorID") && $CurrentForm->hasValue("o_DoctorID") && $this->DoctorID->CurrentValue != $this->DoctorID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DoctorName") && $CurrentForm->hasValue("o_DoctorName") && $this->DoctorName->CurrentValue != $this->DoctorName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AppointmentStatus") && $CurrentForm->hasValue("o_AppointmentStatus") && $this->AppointmentStatus->CurrentValue != $this->AppointmentStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DoctorCode") && $CurrentForm->hasValue("o_DoctorCode") && $this->DoctorCode->CurrentValue != $this->DoctorCode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Department") && $CurrentForm->hasValue("o_Department") && $this->Department->CurrentValue != $this->Department->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_scheduler_id") && $CurrentForm->hasValue("o_scheduler_id") && $this->scheduler_id->CurrentValue != $this->scheduler_id->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_text") && $CurrentForm->hasValue("o_text") && $this->text->CurrentValue != $this->text->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_appointment_status") && $CurrentForm->hasValue("o_appointment_status") && $this->appointment_status->CurrentValue != $this->appointment_status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PId") && $CurrentForm->hasValue("o_PId") && $this->PId->CurrentValue != $this->PId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MobileNumber") && $CurrentForm->hasValue("o_MobileNumber") && $this->MobileNumber->CurrentValue != $this->MobileNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SchEmail") && $CurrentForm->hasValue("o_SchEmail") && $this->SchEmail->CurrentValue != $this->SchEmail->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_appointment_type") && $CurrentForm->hasValue("o_appointment_type") && $this->appointment_type->CurrentValue != $this->appointment_type->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Notified") && $CurrentForm->hasValue("o_Notified") && $this->Notified->CurrentValue != $this->Notified->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Purpose") && $CurrentForm->hasValue("o_Purpose") && $this->Purpose->CurrentValue != $this->Purpose->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Notes") && $CurrentForm->hasValue("o_Notes") && $this->Notes->CurrentValue != $this->Notes->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientType") && $CurrentForm->hasValue("o_PatientType") && $this->PatientType->CurrentValue != $this->PatientType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Referal") && $CurrentForm->hasValue("o_Referal") && $this->Referal->CurrentValue != $this->Referal->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_paymentType") && $CurrentForm->hasValue("o_paymentType") && $this->paymentType->CurrentValue != $this->paymentType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_WhereDidYouHear") && $CurrentForm->hasValue("o_WhereDidYouHear") && $this->WhereDidYouHear->CurrentValue != $this->WhereDidYouHear->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientTypee") && $CurrentForm->hasValue("o_PatientTypee") && $this->PatientTypee->CurrentValue != $this->PatientTypee->OldValue) {
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
        $this->start_date->clearErrorMessage();
        $this->end_date->clearErrorMessage();
        $this->patientID->clearErrorMessage();
        $this->patientName->clearErrorMessage();
        $this->DoctorID->clearErrorMessage();
        $this->DoctorName->clearErrorMessage();
        $this->AppointmentStatus->clearErrorMessage();
        $this->status->clearErrorMessage();
        $this->DoctorCode->clearErrorMessage();
        $this->Department->clearErrorMessage();
        $this->scheduler_id->clearErrorMessage();
        $this->text->clearErrorMessage();
        $this->appointment_status->clearErrorMessage();
        $this->PId->clearErrorMessage();
        $this->MobileNumber->clearErrorMessage();
        $this->SchEmail->clearErrorMessage();
        $this->appointment_type->clearErrorMessage();
        $this->Notified->clearErrorMessage();
        $this->Purpose->clearErrorMessage();
        $this->Notes->clearErrorMessage();
        $this->PatientType->clearErrorMessage();
        $this->Referal->clearErrorMessage();
        $this->paymentType->clearErrorMessage();
        $this->WhereDidYouHear->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->createdBy->clearErrorMessage();
        $this->createdDateTime->clearErrorMessage();
        $this->PatientTypee->clearErrorMessage();
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
                        $this->DoctorID->setSessionValue("");
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
        $this->start_date->CurrentValue = null;
        $this->start_date->OldValue = $this->start_date->CurrentValue;
        $this->end_date->CurrentValue = null;
        $this->end_date->OldValue = $this->end_date->CurrentValue;
        $this->patientID->CurrentValue = null;
        $this->patientID->OldValue = $this->patientID->CurrentValue;
        $this->patientName->CurrentValue = null;
        $this->patientName->OldValue = $this->patientName->CurrentValue;
        $this->DoctorID->CurrentValue = null;
        $this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
        $this->DoctorName->CurrentValue = null;
        $this->DoctorName->OldValue = $this->DoctorName->CurrentValue;
        $this->AppointmentStatus->CurrentValue = null;
        $this->AppointmentStatus->OldValue = $this->AppointmentStatus->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->DoctorCode->CurrentValue = null;
        $this->DoctorCode->OldValue = $this->DoctorCode->CurrentValue;
        $this->Department->CurrentValue = null;
        $this->Department->OldValue = $this->Department->CurrentValue;
        $this->scheduler_id->CurrentValue = null;
        $this->scheduler_id->OldValue = $this->scheduler_id->CurrentValue;
        $this->text->CurrentValue = null;
        $this->text->OldValue = $this->text->CurrentValue;
        $this->appointment_status->CurrentValue = null;
        $this->appointment_status->OldValue = $this->appointment_status->CurrentValue;
        $this->PId->CurrentValue = null;
        $this->PId->OldValue = $this->PId->CurrentValue;
        $this->MobileNumber->CurrentValue = null;
        $this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
        $this->SchEmail->CurrentValue = null;
        $this->SchEmail->OldValue = $this->SchEmail->CurrentValue;
        $this->appointment_type->CurrentValue = null;
        $this->appointment_type->OldValue = $this->appointment_type->CurrentValue;
        $this->Notified->CurrentValue = null;
        $this->Notified->OldValue = $this->Notified->CurrentValue;
        $this->Purpose->CurrentValue = null;
        $this->Purpose->OldValue = $this->Purpose->CurrentValue;
        $this->Notes->CurrentValue = null;
        $this->Notes->OldValue = $this->Notes->CurrentValue;
        $this->PatientType->CurrentValue = null;
        $this->PatientType->OldValue = $this->PatientType->CurrentValue;
        $this->Referal->CurrentValue = null;
        $this->Referal->OldValue = $this->Referal->CurrentValue;
        $this->paymentType->CurrentValue = null;
        $this->paymentType->OldValue = $this->paymentType->CurrentValue;
        $this->tittle->CurrentValue = null;
        $this->tittle->OldValue = $this->tittle->CurrentValue;
        $this->gendar->CurrentValue = null;
        $this->gendar->OldValue = $this->gendar->CurrentValue;
        $this->Dob->CurrentValue = null;
        $this->Dob->OldValue = $this->Dob->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->WhereDidYouHear->CurrentValue = null;
        $this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->createdBy->CurrentValue = null;
        $this->createdBy->OldValue = $this->createdBy->CurrentValue;
        $this->createdDateTime->CurrentValue = null;
        $this->createdDateTime->OldValue = $this->createdDateTime->CurrentValue;
        $this->PatientTypee->CurrentValue = null;
        $this->PatientTypee->OldValue = $this->PatientTypee->CurrentValue;
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

        // Check field name 'start_date' first before field var 'x_start_date'
        $val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
        if (!$this->start_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_date->Visible = false; // Disable update for API request
            } else {
                $this->start_date->setFormValue($val);
            }
            $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
        }
        if ($CurrentForm->hasValue("o_start_date")) {
            $this->start_date->setOldValue($CurrentForm->getValue("o_start_date"));
        }

        // Check field name 'end_date' first before field var 'x_end_date'
        $val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
        if (!$this->end_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_date->Visible = false; // Disable update for API request
            } else {
                $this->end_date->setFormValue($val);
            }
            $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
        }
        if ($CurrentForm->hasValue("o_end_date")) {
            $this->end_date->setOldValue($CurrentForm->getValue("o_end_date"));
        }

        // Check field name 'patientID' first before field var 'x_patientID'
        $val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
        if (!$this->patientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientID->Visible = false; // Disable update for API request
            } else {
                $this->patientID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_patientID")) {
            $this->patientID->setOldValue($CurrentForm->getValue("o_patientID"));
        }

        // Check field name 'patientName' first before field var 'x_patientName'
        $val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
        if (!$this->patientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientName->Visible = false; // Disable update for API request
            } else {
                $this->patientName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_patientName")) {
            $this->patientName->setOldValue($CurrentForm->getValue("o_patientName"));
        }

        // Check field name 'DoctorID' first before field var 'x_DoctorID'
        $val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
        if (!$this->DoctorID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorID->Visible = false; // Disable update for API request
            } else {
                $this->DoctorID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DoctorID")) {
            $this->DoctorID->setOldValue($CurrentForm->getValue("o_DoctorID"));
        }

        // Check field name 'DoctorName' first before field var 'x_DoctorName'
        $val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
        if (!$this->DoctorName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorName->Visible = false; // Disable update for API request
            } else {
                $this->DoctorName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DoctorName")) {
            $this->DoctorName->setOldValue($CurrentForm->getValue("o_DoctorName"));
        }

        // Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
        $val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
        if (!$this->AppointmentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AppointmentStatus->Visible = false; // Disable update for API request
            } else {
                $this->AppointmentStatus->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_AppointmentStatus")) {
            $this->AppointmentStatus->setOldValue($CurrentForm->getValue("o_AppointmentStatus"));
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

        // Check field name 'DoctorCode' first before field var 'x_DoctorCode'
        $val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
        if (!$this->DoctorCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorCode->Visible = false; // Disable update for API request
            } else {
                $this->DoctorCode->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DoctorCode")) {
            $this->DoctorCode->setOldValue($CurrentForm->getValue("o_DoctorCode"));
        }

        // Check field name 'Department' first before field var 'x_Department'
        $val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
        if (!$this->Department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Department->Visible = false; // Disable update for API request
            } else {
                $this->Department->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Department")) {
            $this->Department->setOldValue($CurrentForm->getValue("o_Department"));
        }

        // Check field name 'scheduler_id' first before field var 'x_scheduler_id'
        $val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
        if (!$this->scheduler_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->scheduler_id->Visible = false; // Disable update for API request
            } else {
                $this->scheduler_id->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_scheduler_id")) {
            $this->scheduler_id->setOldValue($CurrentForm->getValue("o_scheduler_id"));
        }

        // Check field name 'text' first before field var 'x_text'
        $val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
        if (!$this->text->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->text->Visible = false; // Disable update for API request
            } else {
                $this->text->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_text")) {
            $this->text->setOldValue($CurrentForm->getValue("o_text"));
        }

        // Check field name 'appointment_status' first before field var 'x_appointment_status'
        $val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
        if (!$this->appointment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->appointment_status->Visible = false; // Disable update for API request
            } else {
                $this->appointment_status->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_appointment_status")) {
            $this->appointment_status->setOldValue($CurrentForm->getValue("o_appointment_status"));
        }

        // Check field name 'PId' first before field var 'x_PId'
        $val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
        if (!$this->PId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PId->Visible = false; // Disable update for API request
            } else {
                $this->PId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PId")) {
            $this->PId->setOldValue($CurrentForm->getValue("o_PId"));
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

        // Check field name 'SchEmail' first before field var 'x_SchEmail'
        $val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
        if (!$this->SchEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SchEmail->Visible = false; // Disable update for API request
            } else {
                $this->SchEmail->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SchEmail")) {
            $this->SchEmail->setOldValue($CurrentForm->getValue("o_SchEmail"));
        }

        // Check field name 'appointment_type' first before field var 'x_appointment_type'
        $val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
        if (!$this->appointment_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->appointment_type->Visible = false; // Disable update for API request
            } else {
                $this->appointment_type->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_appointment_type")) {
            $this->appointment_type->setOldValue($CurrentForm->getValue("o_appointment_type"));
        }

        // Check field name 'Notified' first before field var 'x_Notified'
        $val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
        if (!$this->Notified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notified->Visible = false; // Disable update for API request
            } else {
                $this->Notified->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Notified")) {
            $this->Notified->setOldValue($CurrentForm->getValue("o_Notified"));
        }

        // Check field name 'Purpose' first before field var 'x_Purpose'
        $val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
        if (!$this->Purpose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Purpose->Visible = false; // Disable update for API request
            } else {
                $this->Purpose->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Purpose")) {
            $this->Purpose->setOldValue($CurrentForm->getValue("o_Purpose"));
        }

        // Check field name 'Notes' first before field var 'x_Notes'
        $val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
        if (!$this->Notes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notes->Visible = false; // Disable update for API request
            } else {
                $this->Notes->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Notes")) {
            $this->Notes->setOldValue($CurrentForm->getValue("o_Notes"));
        }

        // Check field name 'PatientType' first before field var 'x_PatientType'
        $val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
        if (!$this->PatientType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientType->Visible = false; // Disable update for API request
            } else {
                $this->PatientType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientType")) {
            $this->PatientType->setOldValue($CurrentForm->getValue("o_PatientType"));
        }

        // Check field name 'Referal' first before field var 'x_Referal'
        $val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
        if (!$this->Referal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Referal->Visible = false; // Disable update for API request
            } else {
                $this->Referal->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Referal")) {
            $this->Referal->setOldValue($CurrentForm->getValue("o_Referal"));
        }

        // Check field name 'paymentType' first before field var 'x_paymentType'
        $val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
        if (!$this->paymentType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->paymentType->Visible = false; // Disable update for API request
            } else {
                $this->paymentType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_paymentType")) {
            $this->paymentType->setOldValue($CurrentForm->getValue("o_paymentType"));
        }

        // Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
        $val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
        if (!$this->WhereDidYouHear->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WhereDidYouHear->Visible = false; // Disable update for API request
            } else {
                $this->WhereDidYouHear->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_WhereDidYouHear")) {
            $this->WhereDidYouHear->setOldValue($CurrentForm->getValue("o_WhereDidYouHear"));
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

        // Check field name 'createdBy' first before field var 'x_createdBy'
        $val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
        if (!$this->createdBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdBy->Visible = false; // Disable update for API request
            } else {
                $this->createdBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_createdBy")) {
            $this->createdBy->setOldValue($CurrentForm->getValue("o_createdBy"));
        }

        // Check field name 'createdDateTime' first before field var 'x_createdDateTime'
        $val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
        if (!$this->createdDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdDateTime->Visible = false; // Disable update for API request
            } else {
                $this->createdDateTime->setFormValue($val);
            }
            $this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_createdDateTime")) {
            $this->createdDateTime->setOldValue($CurrentForm->getValue("o_createdDateTime"));
        }

        // Check field name 'PatientTypee' first before field var 'x_PatientTypee'
        $val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
        if (!$this->PatientTypee->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientTypee->Visible = false; // Disable update for API request
            } else {
                $this->PatientTypee->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientTypee")) {
            $this->PatientTypee->setOldValue($CurrentForm->getValue("o_PatientTypee"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->start_date->CurrentValue = $this->start_date->FormValue;
        $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
        $this->end_date->CurrentValue = $this->end_date->FormValue;
        $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
        $this->patientID->CurrentValue = $this->patientID->FormValue;
        $this->patientName->CurrentValue = $this->patientName->FormValue;
        $this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
        $this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
        $this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
        $this->Department->CurrentValue = $this->Department->FormValue;
        $this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
        $this->text->CurrentValue = $this->text->FormValue;
        $this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
        $this->PId->CurrentValue = $this->PId->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
        $this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
        $this->Notified->CurrentValue = $this->Notified->FormValue;
        $this->Purpose->CurrentValue = $this->Purpose->FormValue;
        $this->Notes->CurrentValue = $this->Notes->FormValue;
        $this->PatientType->CurrentValue = $this->PatientType->FormValue;
        $this->Referal->CurrentValue = $this->Referal->FormValue;
        $this->paymentType->CurrentValue = $this->paymentType->FormValue;
        $this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->createdBy->CurrentValue = $this->createdBy->FormValue;
        $this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
        $this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
        $this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
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
        $this->start_date->setDbValue($row['start_date']);
        $this->end_date->setDbValue($row['end_date']);
        $this->patientID->setDbValue($row['patientID']);
        if (array_key_exists('EV__patientID', $row)) {
            $this->patientID->VirtualValue = $row['EV__patientID']; // Set up virtual field value
        } else {
            $this->patientID->VirtualValue = ""; // Clear value
        }
        $this->patientName->setDbValue($row['patientName']);
        $this->DoctorID->setDbValue($row['DoctorID']);
        $this->DoctorName->setDbValue($row['DoctorName']);
        $this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
        $this->status->setDbValue($row['status']);
        $this->DoctorCode->setDbValue($row['DoctorCode']);
        $this->Department->setDbValue($row['Department']);
        $this->scheduler_id->setDbValue($row['scheduler_id']);
        $this->text->setDbValue($row['text']);
        $this->appointment_status->setDbValue($row['appointment_status']);
        $this->PId->setDbValue($row['PId']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->SchEmail->setDbValue($row['SchEmail']);
        $this->appointment_type->setDbValue($row['appointment_type']);
        $this->Notified->setDbValue($row['Notified']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->Notes->setDbValue($row['Notes']);
        $this->PatientType->setDbValue($row['PatientType']);
        $this->Referal->setDbValue($row['Referal']);
        if (array_key_exists('EV__Referal', $row)) {
            $this->Referal->VirtualValue = $row['EV__Referal']; // Set up virtual field value
        } else {
            $this->Referal->VirtualValue = ""; // Clear value
        }
        $this->paymentType->setDbValue($row['paymentType']);
        $this->tittle->setDbValue($row['tittle']);
        $this->gendar->setDbValue($row['gendar']);
        $this->Dob->setDbValue($row['Dob']);
        $this->Age->setDbValue($row['Age']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdBy->setDbValue($row['createdBy']);
        $this->createdDateTime->setDbValue($row['createdDateTime']);
        $this->PatientTypee->setDbValue($row['PatientTypee']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['start_date'] = $this->start_date->CurrentValue;
        $row['end_date'] = $this->end_date->CurrentValue;
        $row['patientID'] = $this->patientID->CurrentValue;
        $row['patientName'] = $this->patientName->CurrentValue;
        $row['DoctorID'] = $this->DoctorID->CurrentValue;
        $row['DoctorName'] = $this->DoctorName->CurrentValue;
        $row['AppointmentStatus'] = $this->AppointmentStatus->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['DoctorCode'] = $this->DoctorCode->CurrentValue;
        $row['Department'] = $this->Department->CurrentValue;
        $row['scheduler_id'] = $this->scheduler_id->CurrentValue;
        $row['text'] = $this->text->CurrentValue;
        $row['appointment_status'] = $this->appointment_status->CurrentValue;
        $row['PId'] = $this->PId->CurrentValue;
        $row['MobileNumber'] = $this->MobileNumber->CurrentValue;
        $row['SchEmail'] = $this->SchEmail->CurrentValue;
        $row['appointment_type'] = $this->appointment_type->CurrentValue;
        $row['Notified'] = $this->Notified->CurrentValue;
        $row['Purpose'] = $this->Purpose->CurrentValue;
        $row['Notes'] = $this->Notes->CurrentValue;
        $row['PatientType'] = $this->PatientType->CurrentValue;
        $row['Referal'] = $this->Referal->CurrentValue;
        $row['paymentType'] = $this->paymentType->CurrentValue;
        $row['tittle'] = $this->tittle->CurrentValue;
        $row['gendar'] = $this->gendar->CurrentValue;
        $row['Dob'] = $this->Dob->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['createdBy'] = $this->createdBy->CurrentValue;
        $row['createdDateTime'] = $this->createdDateTime->CurrentValue;
        $row['PatientTypee'] = $this->PatientTypee->CurrentValue;
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

        // start_date

        // end_date

        // patientID

        // patientName

        // DoctorID

        // DoctorName

        // AppointmentStatus

        // status

        // DoctorCode

        // Department

        // scheduler_id

        // text

        // appointment_status

        // PId

        // MobileNumber

        // SchEmail

        // appointment_type

        // Notified

        // Purpose

        // Notes

        // PatientType

        // Referal

        // paymentType

        // tittle

        // gendar

        // Dob

        // Age

        // WhereDidYouHear

        // HospID

        // createdBy

        // createdDateTime

        // PatientTypee
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
            $this->start_date->ViewCustomAttributes = "";

            // end_date
            $this->end_date->ViewValue = $this->end_date->CurrentValue;
            $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
            $this->end_date->ViewCustomAttributes = "";

            // patientID
            if ($this->patientID->VirtualValue != "") {
                $this->patientID->ViewValue = $this->patientID->VirtualValue;
            } else {
                $curVal = trim(strval($this->patientID->CurrentValue));
                if ($curVal != "") {
                    $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
                    if ($this->patientID->ViewValue === null) { // Lookup from database
                        $filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->patientID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                            $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                        } else {
                            $this->patientID->ViewValue = $this->patientID->CurrentValue;
                        }
                    }
                } else {
                    $this->patientID->ViewValue = null;
                }
            }
            $this->patientID->ViewCustomAttributes = "";

            // patientName
            $this->patientName->ViewValue = $this->patientName->CurrentValue;
            $this->patientName->ViewCustomAttributes = "";

            // DoctorID
            $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
            $this->DoctorID->ViewCustomAttributes = "";

            // DoctorName
            $curVal = trim(strval($this->DoctorName->CurrentValue));
            if ($curVal != "") {
                $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
                if ($this->DoctorName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DoctorName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                        $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                    } else {
                        $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
                    }
                }
            } else {
                $this->DoctorName->ViewValue = null;
            }
            $this->DoctorName->ViewCustomAttributes = "";

            // AppointmentStatus
            $this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
            $this->AppointmentStatus->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->status->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // DoctorCode
            $this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
            $this->DoctorCode->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // scheduler_id
            $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // text
            $this->text->ViewValue = $this->text->CurrentValue;
            $this->text->ViewCustomAttributes = "";

            // appointment_status
            $this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
            $this->appointment_status->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // SchEmail
            $this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
            $this->SchEmail->ViewCustomAttributes = "";

            // appointment_type
            if (strval($this->appointment_type->CurrentValue) != "") {
                $this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
            } else {
                $this->appointment_type->ViewValue = null;
            }
            $this->appointment_type->ViewCustomAttributes = "";

            // Notified
            if (strval($this->Notified->CurrentValue) != "") {
                $this->Notified->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Notified->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Notified->ViewValue = null;
            }
            $this->Notified->ViewCustomAttributes = "";

            // Purpose
            $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
            $this->Purpose->ViewCustomAttributes = "";

            // Notes
            $this->Notes->ViewValue = $this->Notes->CurrentValue;
            $this->Notes->ViewCustomAttributes = "";

            // PatientType
            if (strval($this->PatientType->CurrentValue) != "") {
                $this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
            } else {
                $this->PatientType->ViewValue = null;
            }
            $this->PatientType->ViewCustomAttributes = "";

            // Referal
            if ($this->Referal->VirtualValue != "") {
                $this->Referal->ViewValue = $this->Referal->VirtualValue;
            } else {
                $curVal = trim(strval($this->Referal->CurrentValue));
                if ($curVal != "") {
                    $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
                    if ($this->Referal->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->Referal->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                            $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                        } else {
                            $this->Referal->ViewValue = $this->Referal->CurrentValue;
                        }
                    }
                } else {
                    $this->Referal->ViewValue = null;
                }
            }
            $this->Referal->ViewCustomAttributes = "";

            // paymentType
            $this->paymentType->ViewValue = $this->paymentType->CurrentValue;
            $this->paymentType->ViewCustomAttributes = "";

            // WhereDidYouHear
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
                if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->WhereDidYouHear->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                            $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                        }
                    } else {
                        $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                    }
                }
            } else {
                $this->WhereDidYouHear->ViewValue = null;
            }
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // createdBy
            $this->createdBy->ViewValue = $this->createdBy->CurrentValue;
            $this->createdBy->ViewCustomAttributes = "";

            // createdDateTime
            $this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
            $this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
            $this->createdDateTime->ViewCustomAttributes = "";

            // PatientTypee
            $curVal = trim(strval($this->PatientTypee->CurrentValue));
            if ($curVal != "") {
                $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
                if ($this->PatientTypee->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PatientTypee->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientTypee->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
                    } else {
                        $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
                    }
                }
            } else {
                $this->PatientTypee->ViewValue = null;
            }
            $this->PatientTypee->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";
            $this->start_date->TooltipValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";
            $this->end_date->TooltipValue = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";
            $this->patientID->TooltipValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";
            $this->patientName->TooltipValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";
            $this->DoctorID->TooltipValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";
            $this->DoctorName->TooltipValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";
            $this->AppointmentStatus->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";
            $this->DoctorCode->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";
            $this->text->TooltipValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";
            $this->appointment_status->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";
            $this->SchEmail->TooltipValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";
            $this->appointment_type->TooltipValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";
            $this->Notified->TooltipValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";
            $this->Purpose->TooltipValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
            $this->Notes->TooltipValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";
            $this->PatientType->TooltipValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";
            $this->Referal->TooltipValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";
            $this->paymentType->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";
            $this->createdBy->TooltipValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";
            $this->createdDateTime->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
            $this->PatientTypee->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // end_date
            $this->end_date->EditAttrs["class"] = "form-control";
            $this->end_date->EditCustomAttributes = "";
            $this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // patientID
            $this->patientID->EditCustomAttributes = "";
            $curVal = trim(strval($this->patientID->CurrentValue));
            if ($curVal != "") {
                $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
            } else {
                $this->patientID->ViewValue = $this->patientID->Lookup !== null && is_array($this->patientID->Lookup->Options) ? $curVal : null;
            }
            if ($this->patientID->ViewValue !== null) { // Load from cache
                $this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
                if ($this->patientID->ViewValue == "") {
                    $this->patientID->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->patientID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                    $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                } else {
                    $this->patientID->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->patientID->EditValue = $arwrk;
            }
            $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

            // patientName
            $this->patientName->EditAttrs["class"] = "form-control";
            $this->patientName->EditCustomAttributes = "";
            if (!$this->patientName->Raw) {
                $this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
            }
            $this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
            $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

            // DoctorID
            $this->DoctorID->EditAttrs["class"] = "form-control";
            $this->DoctorID->EditCustomAttributes = "";
            if ($this->DoctorID->getSessionValue() != "") {
                $this->DoctorID->CurrentValue = GetForeignKeyValue($this->DoctorID->getSessionValue());
                $this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
                $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
                $this->DoctorID->ViewCustomAttributes = "";
            } else {
                $this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
                $this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());
            }

            // DoctorName
            $this->DoctorName->EditCustomAttributes = "";
            $curVal = trim(strval($this->DoctorName->CurrentValue));
            if ($curVal != "") {
                $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
            } else {
                $this->DoctorName->ViewValue = $this->DoctorName->Lookup !== null && is_array($this->DoctorName->Lookup->Options) ? $curVal : null;
            }
            if ($this->DoctorName->ViewValue !== null) { // Load from cache
                $this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
                if ($this->DoctorName->ViewValue == "") {
                    $this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DoctorName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                    $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                } else {
                    $this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DoctorName->EditValue = $arwrk;
            }
            $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

            // AppointmentStatus
            $this->AppointmentStatus->EditAttrs["class"] = "form-control";
            $this->AppointmentStatus->EditCustomAttributes = "";
            if (!$this->AppointmentStatus->Raw) {
                $this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
            }
            $this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
            $this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // DoctorCode
            $this->DoctorCode->EditAttrs["class"] = "form-control";
            $this->DoctorCode->EditCustomAttributes = "";
            if (!$this->DoctorCode->Raw) {
                $this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
            }
            $this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
            $this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // scheduler_id
            $this->scheduler_id->EditAttrs["class"] = "form-control";
            $this->scheduler_id->EditCustomAttributes = "";
            if (!$this->scheduler_id->Raw) {
                $this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
            }
            $this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
            $this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

            // text
            $this->text->EditAttrs["class"] = "form-control";
            $this->text->EditCustomAttributes = "";
            if (!$this->text->Raw) {
                $this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
            }
            $this->text->EditValue = HtmlEncode($this->text->CurrentValue);
            $this->text->PlaceHolder = RemoveHtml($this->text->caption());

            // appointment_status
            $this->appointment_status->EditAttrs["class"] = "form-control";
            $this->appointment_status->EditCustomAttributes = "";
            if (!$this->appointment_status->Raw) {
                $this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
            }
            $this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
            $this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // SchEmail
            $this->SchEmail->EditAttrs["class"] = "form-control";
            $this->SchEmail->EditCustomAttributes = "";
            if (!$this->SchEmail->Raw) {
                $this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
            }
            $this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
            $this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

            // appointment_type
            $this->appointment_type->EditCustomAttributes = "";
            $this->appointment_type->EditValue = $this->appointment_type->options(false);
            $this->appointment_type->PlaceHolder = RemoveHtml($this->appointment_type->caption());

            // Notified
            $this->Notified->EditCustomAttributes = "";
            $this->Notified->EditValue = $this->Notified->options(false);
            $this->Notified->PlaceHolder = RemoveHtml($this->Notified->caption());

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            if (!$this->Purpose->Raw) {
                $this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
            }
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            if (!$this->Notes->Raw) {
                $this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
            }
            $this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

            // PatientType
            $this->PatientType->EditCustomAttributes = "";
            $this->PatientType->EditValue = $this->PatientType->options(false);
            $this->PatientType->PlaceHolder = RemoveHtml($this->PatientType->caption());

            // Referal
            $this->Referal->EditCustomAttributes = "";
            $curVal = trim(strval($this->Referal->CurrentValue));
            if ($curVal != "") {
                $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
            } else {
                $this->Referal->ViewValue = $this->Referal->Lookup !== null && is_array($this->Referal->Lookup->Options) ? $curVal : null;
            }
            if ($this->Referal->ViewValue !== null) { // Load from cache
                $this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
                if ($this->Referal->ViewValue == "") {
                    $this->Referal->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Referal->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                    $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                } else {
                    $this->Referal->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Referal->EditValue = $arwrk;
            }
            $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

            // paymentType
            $this->paymentType->EditAttrs["class"] = "form-control";
            $this->paymentType->EditCustomAttributes = "";
            if (!$this->paymentType->Raw) {
                $this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
            }
            $this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
            $this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditCustomAttributes = "";
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            } else {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== null && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : null;
            }
            if ($this->WhereDidYouHear->ViewValue !== null) { // Load from cache
                $this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
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
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->WhereDidYouHear->EditValue = $arwrk;
            }
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // HospID

            // createdBy

            // createdDateTime

            // PatientTypee
            $this->PatientTypee->EditAttrs["class"] = "form-control";
            $this->PatientTypee->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientTypee->CurrentValue));
            if ($curVal != "") {
                $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
            } else {
                $this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== null && is_array($this->PatientTypee->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientTypee->ViewValue !== null) { // Load from cache
                $this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PatientTypee->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PatientTypee->EditValue = $arwrk;
            }
            $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // end_date
            $this->end_date->EditAttrs["class"] = "form-control";
            $this->end_date->EditCustomAttributes = "";
            $this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // patientID
            $this->patientID->EditCustomAttributes = "";
            $curVal = trim(strval($this->patientID->CurrentValue));
            if ($curVal != "") {
                $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
            } else {
                $this->patientID->ViewValue = $this->patientID->Lookup !== null && is_array($this->patientID->Lookup->Options) ? $curVal : null;
            }
            if ($this->patientID->ViewValue !== null) { // Load from cache
                $this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
                if ($this->patientID->ViewValue == "") {
                    $this->patientID->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->patientID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                    $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                } else {
                    $this->patientID->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->patientID->EditValue = $arwrk;
            }
            $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

            // patientName
            $this->patientName->EditAttrs["class"] = "form-control";
            $this->patientName->EditCustomAttributes = "";
            if (!$this->patientName->Raw) {
                $this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
            }
            $this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
            $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

            // DoctorID
            $this->DoctorID->EditAttrs["class"] = "form-control";
            $this->DoctorID->EditCustomAttributes = "";
            if ($this->DoctorID->getSessionValue() != "") {
                $this->DoctorID->CurrentValue = GetForeignKeyValue($this->DoctorID->getSessionValue());
                $this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
                $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
                $this->DoctorID->ViewCustomAttributes = "";
            } else {
                $this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
                $this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());
            }

            // DoctorName
            $this->DoctorName->EditCustomAttributes = "";
            $curVal = trim(strval($this->DoctorName->CurrentValue));
            if ($curVal != "") {
                $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
            } else {
                $this->DoctorName->ViewValue = $this->DoctorName->Lookup !== null && is_array($this->DoctorName->Lookup->Options) ? $curVal : null;
            }
            if ($this->DoctorName->ViewValue !== null) { // Load from cache
                $this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
                if ($this->DoctorName->ViewValue == "") {
                    $this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DoctorName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                    $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                } else {
                    $this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DoctorName->EditValue = $arwrk;
            }
            $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

            // AppointmentStatus
            $this->AppointmentStatus->EditAttrs["class"] = "form-control";
            $this->AppointmentStatus->EditCustomAttributes = "";
            if (!$this->AppointmentStatus->Raw) {
                $this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
            }
            $this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
            $this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // DoctorCode
            $this->DoctorCode->EditAttrs["class"] = "form-control";
            $this->DoctorCode->EditCustomAttributes = "";
            if (!$this->DoctorCode->Raw) {
                $this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
            }
            $this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
            $this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // scheduler_id
            $this->scheduler_id->EditAttrs["class"] = "form-control";
            $this->scheduler_id->EditCustomAttributes = "";
            $this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // text
            $this->text->EditAttrs["class"] = "form-control";
            $this->text->EditCustomAttributes = "";
            if (!$this->text->Raw) {
                $this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
            }
            $this->text->EditValue = HtmlEncode($this->text->CurrentValue);
            $this->text->PlaceHolder = RemoveHtml($this->text->caption());

            // appointment_status
            $this->appointment_status->EditAttrs["class"] = "form-control";
            $this->appointment_status->EditCustomAttributes = "";
            if (!$this->appointment_status->Raw) {
                $this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
            }
            $this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
            $this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // SchEmail
            $this->SchEmail->EditAttrs["class"] = "form-control";
            $this->SchEmail->EditCustomAttributes = "";
            if (!$this->SchEmail->Raw) {
                $this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
            }
            $this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
            $this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

            // appointment_type
            $this->appointment_type->EditCustomAttributes = "";
            $this->appointment_type->EditValue = $this->appointment_type->options(false);
            $this->appointment_type->PlaceHolder = RemoveHtml($this->appointment_type->caption());

            // Notified
            $this->Notified->EditCustomAttributes = "";
            $this->Notified->EditValue = $this->Notified->options(false);
            $this->Notified->PlaceHolder = RemoveHtml($this->Notified->caption());

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            if (!$this->Purpose->Raw) {
                $this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
            }
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            if (!$this->Notes->Raw) {
                $this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
            }
            $this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

            // PatientType
            $this->PatientType->EditCustomAttributes = "";
            $this->PatientType->EditValue = $this->PatientType->options(false);
            $this->PatientType->PlaceHolder = RemoveHtml($this->PatientType->caption());

            // Referal
            $this->Referal->EditCustomAttributes = "";
            $curVal = trim(strval($this->Referal->CurrentValue));
            if ($curVal != "") {
                $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
            } else {
                $this->Referal->ViewValue = $this->Referal->Lookup !== null && is_array($this->Referal->Lookup->Options) ? $curVal : null;
            }
            if ($this->Referal->ViewValue !== null) { // Load from cache
                $this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
                if ($this->Referal->ViewValue == "") {
                    $this->Referal->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Referal->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                    $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                } else {
                    $this->Referal->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Referal->EditValue = $arwrk;
            }
            $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

            // paymentType
            $this->paymentType->EditAttrs["class"] = "form-control";
            $this->paymentType->EditCustomAttributes = "";
            if (!$this->paymentType->Raw) {
                $this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
            }
            $this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
            $this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditCustomAttributes = "";
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            } else {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== null && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : null;
            }
            if ($this->WhereDidYouHear->ViewValue !== null) { // Load from cache
                $this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
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
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->WhereDidYouHear->EditValue = $arwrk;
            }
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // HospID

            // createdBy

            // createdDateTime

            // PatientTypee
            $this->PatientTypee->EditAttrs["class"] = "form-control";
            $this->PatientTypee->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientTypee->CurrentValue));
            if ($curVal != "") {
                $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
            } else {
                $this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== null && is_array($this->PatientTypee->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientTypee->ViewValue !== null) { // Load from cache
                $this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PatientTypee->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PatientTypee->EditValue = $arwrk;
            }
            $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";
            $this->createdBy->TooltipValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";
            $this->createdDateTime->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
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
        if ($this->start_date->Required) {
            if (!$this->start_date->IsDetailKey && EmptyValue($this->start_date->FormValue)) {
                $this->start_date->addErrorMessage(str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->start_date->FormValue)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if ($this->end_date->Required) {
            if (!$this->end_date->IsDetailKey && EmptyValue($this->end_date->FormValue)) {
                $this->end_date->addErrorMessage(str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->end_date->FormValue)) {
            $this->end_date->addErrorMessage($this->end_date->getErrorMessage(false));
        }
        if ($this->patientID->Required) {
            if (!$this->patientID->IsDetailKey && EmptyValue($this->patientID->FormValue)) {
                $this->patientID->addErrorMessage(str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
            }
        }
        if ($this->patientName->Required) {
            if (!$this->patientName->IsDetailKey && EmptyValue($this->patientName->FormValue)) {
                $this->patientName->addErrorMessage(str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
            }
        }
        if ($this->DoctorID->Required) {
            if (!$this->DoctorID->IsDetailKey && EmptyValue($this->DoctorID->FormValue)) {
                $this->DoctorID->addErrorMessage(str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
            }
        }
        if ($this->DoctorName->Required) {
            if (!$this->DoctorName->IsDetailKey && EmptyValue($this->DoctorName->FormValue)) {
                $this->DoctorName->addErrorMessage(str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
            }
        }
        if ($this->AppointmentStatus->Required) {
            if (!$this->AppointmentStatus->IsDetailKey && EmptyValue($this->AppointmentStatus->FormValue)) {
                $this->AppointmentStatus->addErrorMessage(str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->DoctorCode->Required) {
            if (!$this->DoctorCode->IsDetailKey && EmptyValue($this->DoctorCode->FormValue)) {
                $this->DoctorCode->addErrorMessage(str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
            }
        }
        if ($this->Department->Required) {
            if (!$this->Department->IsDetailKey && EmptyValue($this->Department->FormValue)) {
                $this->Department->addErrorMessage(str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
            }
        }
        if ($this->scheduler_id->Required) {
            if (!$this->scheduler_id->IsDetailKey && EmptyValue($this->scheduler_id->FormValue)) {
                $this->scheduler_id->addErrorMessage(str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
            }
        }
        if ($this->text->Required) {
            if (!$this->text->IsDetailKey && EmptyValue($this->text->FormValue)) {
                $this->text->addErrorMessage(str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
            }
        }
        if ($this->appointment_status->Required) {
            if (!$this->appointment_status->IsDetailKey && EmptyValue($this->appointment_status->FormValue)) {
                $this->appointment_status->addErrorMessage(str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
            }
        }
        if ($this->PId->Required) {
            if (!$this->PId->IsDetailKey && EmptyValue($this->PId->FormValue)) {
                $this->PId->addErrorMessage(str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PId->FormValue)) {
            $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->SchEmail->Required) {
            if (!$this->SchEmail->IsDetailKey && EmptyValue($this->SchEmail->FormValue)) {
                $this->SchEmail->addErrorMessage(str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
            }
        }
        if ($this->appointment_type->Required) {
            if ($this->appointment_type->FormValue == "") {
                $this->appointment_type->addErrorMessage(str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
            }
        }
        if ($this->Notified->Required) {
            if ($this->Notified->FormValue == "") {
                $this->Notified->addErrorMessage(str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
            }
        }
        if ($this->Purpose->Required) {
            if (!$this->Purpose->IsDetailKey && EmptyValue($this->Purpose->FormValue)) {
                $this->Purpose->addErrorMessage(str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
            }
        }
        if ($this->Notes->Required) {
            if (!$this->Notes->IsDetailKey && EmptyValue($this->Notes->FormValue)) {
                $this->Notes->addErrorMessage(str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
            }
        }
        if ($this->PatientType->Required) {
            if ($this->PatientType->FormValue == "") {
                $this->PatientType->addErrorMessage(str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
            }
        }
        if ($this->Referal->Required) {
            if (!$this->Referal->IsDetailKey && EmptyValue($this->Referal->FormValue)) {
                $this->Referal->addErrorMessage(str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
            }
        }
        if ($this->paymentType->Required) {
            if (!$this->paymentType->IsDetailKey && EmptyValue($this->paymentType->FormValue)) {
                $this->paymentType->addErrorMessage(str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
            }
        }
        if ($this->WhereDidYouHear->Required) {
            if ($this->WhereDidYouHear->FormValue == "") {
                $this->WhereDidYouHear->addErrorMessage(str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->createdBy->Required) {
            if (!$this->createdBy->IsDetailKey && EmptyValue($this->createdBy->FormValue)) {
                $this->createdBy->addErrorMessage(str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
            }
        }
        if ($this->createdDateTime->Required) {
            if (!$this->createdDateTime->IsDetailKey && EmptyValue($this->createdDateTime->FormValue)) {
                $this->createdDateTime->addErrorMessage(str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
            }
        }
        if ($this->PatientTypee->Required) {
            if (!$this->PatientTypee->IsDetailKey && EmptyValue($this->PatientTypee->FormValue)) {
                $this->PatientTypee->addErrorMessage(str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
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

            // start_date
            $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), null, $this->start_date->ReadOnly);

            // end_date
            $this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), null, $this->end_date->ReadOnly);

            // patientID
            $this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, null, $this->patientID->ReadOnly);

            // patientName
            $this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, null, $this->patientName->ReadOnly);

            // DoctorID
            if ($this->DoctorID->getSessionValue() != "") {
                $this->DoctorID->ReadOnly = true;
            }
            $this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, null, $this->DoctorID->ReadOnly);

            // DoctorName
            $this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, null, $this->DoctorName->ReadOnly);

            // AppointmentStatus
            $this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, null, $this->AppointmentStatus->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // DoctorCode
            $this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, null, $this->DoctorCode->ReadOnly);

            // Department
            $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, $this->Department->ReadOnly);

            // text
            $this->text->setDbValueDef($rsnew, $this->text->CurrentValue, null, $this->text->ReadOnly);

            // appointment_status
            $this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, null, $this->appointment_status->ReadOnly);

            // PId
            $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, $this->PId->ReadOnly);

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly);

            // SchEmail
            $this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, null, $this->SchEmail->ReadOnly);

            // appointment_type
            $this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, null, $this->appointment_type->ReadOnly);

            // Notified
            $this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, null, $this->Notified->ReadOnly);

            // Purpose
            $this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, null, $this->Purpose->ReadOnly);

            // Notes
            $this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, null, $this->Notes->ReadOnly);

            // PatientType
            $this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, null, $this->PatientType->ReadOnly);

            // Referal
            $this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, null, $this->Referal->ReadOnly);

            // paymentType
            $this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, null, $this->paymentType->ReadOnly);

            // WhereDidYouHear
            $this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, null, $this->WhereDidYouHear->ReadOnly);

            // PatientTypee
            $this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, null, $this->PatientTypee->ReadOnly);

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
        if ($this->getCurrentMasterTable() == "doctors") {
            $this->DoctorID->CurrentValue = $this->DoctorID->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // start_date
        $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), null, false);

        // end_date
        $this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), null, false);

        // patientID
        $this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, null, false);

        // patientName
        $this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, null, false);

        // DoctorID
        $this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, null, false);

        // DoctorName
        $this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, null, false);

        // AppointmentStatus
        $this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // DoctorCode
        $this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, null, false);

        // Department
        $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, false);

        // scheduler_id
        $this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, null, false);

        // text
        $this->text->setDbValueDef($rsnew, $this->text->CurrentValue, null, false);

        // appointment_status
        $this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, null, false);

        // PId
        $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, false);

        // MobileNumber
        $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, false);

        // SchEmail
        $this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, null, false);

        // appointment_type
        $this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, null, false);

        // Notified
        $this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, null, false);

        // Purpose
        $this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, null, false);

        // Notes
        $this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, null, false);

        // PatientType
        $this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, null, false);

        // Referal
        $this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, null, false);

        // paymentType
        $this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, null, false);

        // WhereDidYouHear
        $this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // createdBy
        $this->createdBy->CurrentValue = GetUserName();
        $this->createdBy->setDbValueDef($rsnew, $this->createdBy->CurrentValue, null);

        // createdDateTime
        $this->createdDateTime->CurrentValue = CurrentDateTime();
        $this->createdDateTime->setDbValueDef($rsnew, $this->createdDateTime->CurrentValue, null);

        // PatientTypee
        $this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, null, false);

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
        if ($masterTblVar == "doctors") {
            $masterTbl = Container("doctors");
            $this->DoctorID->Visible = false;
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
                case "x_patientID":
                    break;
                case "x_DoctorName":
                    break;
                case "x_status":
                    break;
                case "x_appointment_type":
                    break;
                case "x_Notified":
                    break;
                case "x_PatientType":
                    break;
                case "x_Referal":
                    break;
                case "x_tittle":
                    break;
                case "x_gendar":
                    break;
                case "x_WhereDidYouHear":
                    break;
                case "x_PatientTypee":
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
