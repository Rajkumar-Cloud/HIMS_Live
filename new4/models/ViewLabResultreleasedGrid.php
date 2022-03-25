<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewLabResultreleasedGrid extends ViewLabResultreleased
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_lab_resultreleased';

    // Page object name
    public $PageObjName = "ViewLabResultreleasedGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_lab_resultreleasedgrid";
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

        // Table object (view_lab_resultreleased)
        if (!isset($GLOBALS["view_lab_resultreleased"]) || get_class($GLOBALS["view_lab_resultreleased"]) == PROJECT_NAMESPACE . "view_lab_resultreleased") {
            $GLOBALS["view_lab_resultreleased"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "ViewLabResultreleasedAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_resultreleased');
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
                $doc = new $class(Container("view_lab_resultreleased"));
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
            $this->ResultDate->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->ResultedBy->Visible = false;
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
    public $DisplayRecords = 2000;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "20,40,60,100,500,1000,2000,-1"; // Page sizes (comma separated)
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
        $this->PatID->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->sid->setVisibility();
        $this->ItemCode->setVisibility();
        $this->DEptCd->setVisibility();
        $this->Resulted->setVisibility();
        $this->Services->setVisibility();
        $this->LabReport->setVisibility();
        $this->Pic1->setVisibility();
        $this->Pic2->setVisibility();
        $this->TestUnit->setVisibility();
        $this->RefValue->setVisibility();
        $this->Order->setVisibility();
        $this->Repeated->setVisibility();
        $this->Vid->setVisibility();
        $this->invoiceId->setVisibility();
        $this->DrID->setVisibility();
        $this->DrCODE->setVisibility();
        $this->DrName->setVisibility();
        $this->Department->setVisibility();
        $this->createddatetime->setVisibility();
        $this->status->setVisibility();
        $this->TestType->setVisibility();
        $this->ResultDate->setVisibility();
        $this->ResultedBy->setVisibility();
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
        $this->setupLookupOptions($this->TestUnit);

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
            $this->DisplayRecords = 2000; // Load default
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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_lab_services") {
            $masterTbl = Container("view_lab_services");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewLabServicesList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_labreport_print") {
            $masterTbl = Container("view_labreport_print");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewLabreportPrintList"); // Return to master page
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
                    $this->DisplayRecords = 2000; // Non-numeric, load default
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
        $this->Order->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue != $this->sid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ItemCode") && $CurrentForm->hasValue("o_ItemCode") && $this->ItemCode->CurrentValue != $this->ItemCode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DEptCd") && $CurrentForm->hasValue("o_DEptCd") && $this->DEptCd->CurrentValue != $this->DEptCd->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Resulted") && $CurrentForm->hasValue("o_Resulted") && $this->Resulted->CurrentValue != $this->Resulted->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Services") && $CurrentForm->hasValue("o_Services") && $this->Services->CurrentValue != $this->Services->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LabReport") && $CurrentForm->hasValue("o_LabReport") && $this->LabReport->CurrentValue != $this->LabReport->OldValue) {
            return false;
        }
        if (!EmptyValue($this->Pic1->Upload->Value)) {
            return false;
        }
        if (!EmptyValue($this->Pic2->Upload->Value)) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TestUnit") && $CurrentForm->hasValue("o_TestUnit") && $this->TestUnit->CurrentValue != $this->TestUnit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RefValue") && $CurrentForm->hasValue("o_RefValue") && $this->RefValue->CurrentValue != $this->RefValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Order") && $CurrentForm->hasValue("o_Order") && $this->Order->CurrentValue != $this->Order->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Repeated") && $CurrentForm->hasValue("o_Repeated") && $this->Repeated->CurrentValue != $this->Repeated->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Vid") && $CurrentForm->hasValue("o_Vid") && $this->Vid->CurrentValue != $this->Vid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_invoiceId") && $CurrentForm->hasValue("o_invoiceId") && $this->invoiceId->CurrentValue != $this->invoiceId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrID") && $CurrentForm->hasValue("o_DrID") && $this->DrID->CurrentValue != $this->DrID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrCODE") && $CurrentForm->hasValue("o_DrCODE") && $this->DrCODE->CurrentValue != $this->DrCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrName") && $CurrentForm->hasValue("o_DrName") && $this->DrName->CurrentValue != $this->DrName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Department") && $CurrentForm->hasValue("o_Department") && $this->Department->CurrentValue != $this->Department->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue != $this->createddatetime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TestType") && $CurrentForm->hasValue("o_TestType") && $this->TestType->CurrentValue != $this->TestType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HospID") && $CurrentForm->hasValue("o_HospID") && $this->HospID->CurrentValue != $this->HospID->OldValue) {
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
        $this->PatID->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->Age->clearErrorMessage();
        $this->Gender->clearErrorMessage();
        $this->sid->clearErrorMessage();
        $this->ItemCode->clearErrorMessage();
        $this->DEptCd->clearErrorMessage();
        $this->Resulted->clearErrorMessage();
        $this->Services->clearErrorMessage();
        $this->LabReport->clearErrorMessage();
        $this->Pic1->clearErrorMessage();
        $this->Pic2->clearErrorMessage();
        $this->TestUnit->clearErrorMessage();
        $this->RefValue->clearErrorMessage();
        $this->Order->clearErrorMessage();
        $this->Repeated->clearErrorMessage();
        $this->Vid->clearErrorMessage();
        $this->invoiceId->clearErrorMessage();
        $this->DrID->clearErrorMessage();
        $this->DrCODE->clearErrorMessage();
        $this->DrName->clearErrorMessage();
        $this->Department->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->status->clearErrorMessage();
        $this->TestType->clearErrorMessage();
        $this->ResultDate->clearErrorMessage();
        $this->ResultedBy->clearErrorMessage();
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
                        $this->Vid->setSessionValue("");
                        $this->Vid->setSessionValue("");
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
                if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
                    $opt->Body = "&nbsp;";
                } else {
                    $opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
                }
            }
        }
        if ($this->CurrentMode == "view") { // View mode
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
                $item->Visible = false;
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
        $this->Pic1->Upload->Index = $CurrentForm->Index;
        $this->Pic1->Upload->uploadFile();
        $this->Pic1->CurrentValue = $this->Pic1->Upload->FileName;
        $this->Pic2->Upload->Index = $CurrentForm->Index;
        $this->Pic2->Upload->uploadFile();
        $this->Pic2->CurrentValue = $this->Pic2->Upload->FileName;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->sid->CurrentValue = null;
        $this->sid->OldValue = $this->sid->CurrentValue;
        $this->ItemCode->CurrentValue = null;
        $this->ItemCode->OldValue = $this->ItemCode->CurrentValue;
        $this->DEptCd->CurrentValue = null;
        $this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
        $this->Resulted->CurrentValue = null;
        $this->Resulted->OldValue = $this->Resulted->CurrentValue;
        $this->Services->CurrentValue = null;
        $this->Services->OldValue = $this->Services->CurrentValue;
        $this->LabReport->CurrentValue = null;
        $this->LabReport->OldValue = $this->LabReport->CurrentValue;
        $this->Pic1->Upload->DbValue = null;
        $this->Pic1->OldValue = $this->Pic1->Upload->DbValue;
        $this->Pic1->Upload->Index = $this->RowIndex;
        $this->Pic2->Upload->DbValue = null;
        $this->Pic2->OldValue = $this->Pic2->Upload->DbValue;
        $this->Pic2->Upload->Index = $this->RowIndex;
        $this->TestUnit->CurrentValue = null;
        $this->TestUnit->OldValue = $this->TestUnit->CurrentValue;
        $this->RefValue->CurrentValue = null;
        $this->RefValue->OldValue = $this->RefValue->CurrentValue;
        $this->Order->CurrentValue = null;
        $this->Order->OldValue = $this->Order->CurrentValue;
        $this->Repeated->CurrentValue = null;
        $this->Repeated->OldValue = $this->Repeated->CurrentValue;
        $this->Vid->CurrentValue = null;
        $this->Vid->OldValue = $this->Vid->CurrentValue;
        $this->invoiceId->CurrentValue = null;
        $this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
        $this->DrID->CurrentValue = null;
        $this->DrID->OldValue = $this->DrID->CurrentValue;
        $this->DrCODE->CurrentValue = null;
        $this->DrCODE->OldValue = $this->DrCODE->CurrentValue;
        $this->DrName->CurrentValue = null;
        $this->DrName->OldValue = $this->DrName->CurrentValue;
        $this->Department->CurrentValue = null;
        $this->Department->OldValue = $this->Department->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->TestType->CurrentValue = null;
        $this->TestType->OldValue = $this->TestType->CurrentValue;
        $this->ResultDate->CurrentValue = null;
        $this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
        $this->ResultedBy->CurrentValue = null;
        $this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
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

        // Check field name 'sid' first before field var 'x_sid'
        $val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
        if (!$this->sid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sid->Visible = false; // Disable update for API request
            } else {
                $this->sid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_sid")) {
            $this->sid->setOldValue($CurrentForm->getValue("o_sid"));
        }

        // Check field name 'ItemCode' first before field var 'x_ItemCode'
        $val = $CurrentForm->hasValue("ItemCode") ? $CurrentForm->getValue("ItemCode") : $CurrentForm->getValue("x_ItemCode");
        if (!$this->ItemCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ItemCode->Visible = false; // Disable update for API request
            } else {
                $this->ItemCode->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ItemCode")) {
            $this->ItemCode->setOldValue($CurrentForm->getValue("o_ItemCode"));
        }

        // Check field name 'DEptCd' first before field var 'x_DEptCd'
        $val = $CurrentForm->hasValue("DEptCd") ? $CurrentForm->getValue("DEptCd") : $CurrentForm->getValue("x_DEptCd");
        if (!$this->DEptCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DEptCd->Visible = false; // Disable update for API request
            } else {
                $this->DEptCd->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DEptCd")) {
            $this->DEptCd->setOldValue($CurrentForm->getValue("o_DEptCd"));
        }

        // Check field name 'Resulted' first before field var 'x_Resulted'
        $val = $CurrentForm->hasValue("Resulted") ? $CurrentForm->getValue("Resulted") : $CurrentForm->getValue("x_Resulted");
        if (!$this->Resulted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Resulted->Visible = false; // Disable update for API request
            } else {
                $this->Resulted->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Resulted")) {
            $this->Resulted->setOldValue($CurrentForm->getValue("o_Resulted"));
        }

        // Check field name 'Services' first before field var 'x_Services'
        $val = $CurrentForm->hasValue("Services") ? $CurrentForm->getValue("Services") : $CurrentForm->getValue("x_Services");
        if (!$this->Services->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Services->Visible = false; // Disable update for API request
            } else {
                $this->Services->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Services")) {
            $this->Services->setOldValue($CurrentForm->getValue("o_Services"));
        }

        // Check field name 'LabReport' first before field var 'x_LabReport'
        $val = $CurrentForm->hasValue("LabReport") ? $CurrentForm->getValue("LabReport") : $CurrentForm->getValue("x_LabReport");
        if (!$this->LabReport->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabReport->Visible = false; // Disable update for API request
            } else {
                $this->LabReport->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LabReport")) {
            $this->LabReport->setOldValue($CurrentForm->getValue("o_LabReport"));
        }

        // Check field name 'TestUnit' first before field var 'x_TestUnit'
        $val = $CurrentForm->hasValue("TestUnit") ? $CurrentForm->getValue("TestUnit") : $CurrentForm->getValue("x_TestUnit");
        if (!$this->TestUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestUnit->Visible = false; // Disable update for API request
            } else {
                $this->TestUnit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TestUnit")) {
            $this->TestUnit->setOldValue($CurrentForm->getValue("o_TestUnit"));
        }

        // Check field name 'RefValue' first before field var 'x_RefValue'
        $val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
        if (!$this->RefValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefValue->Visible = false; // Disable update for API request
            } else {
                $this->RefValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RefValue")) {
            $this->RefValue->setOldValue($CurrentForm->getValue("o_RefValue"));
        }

        // Check field name 'Order' first before field var 'x_Order'
        $val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
        if (!$this->Order->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Order->Visible = false; // Disable update for API request
            } else {
                $this->Order->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Order")) {
            $this->Order->setOldValue($CurrentForm->getValue("o_Order"));
        }

        // Check field name 'Repeated' first before field var 'x_Repeated'
        $val = $CurrentForm->hasValue("Repeated") ? $CurrentForm->getValue("Repeated") : $CurrentForm->getValue("x_Repeated");
        if (!$this->Repeated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Repeated->Visible = false; // Disable update for API request
            } else {
                $this->Repeated->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Repeated")) {
            $this->Repeated->setOldValue($CurrentForm->getValue("o_Repeated"));
        }

        // Check field name 'Vid' first before field var 'x_Vid'
        $val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
        if (!$this->Vid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Vid->Visible = false; // Disable update for API request
            } else {
                $this->Vid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Vid")) {
            $this->Vid->setOldValue($CurrentForm->getValue("o_Vid"));
        }

        // Check field name 'invoiceId' first before field var 'x_invoiceId'
        $val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
        if (!$this->invoiceId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceId->Visible = false; // Disable update for API request
            } else {
                $this->invoiceId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_invoiceId")) {
            $this->invoiceId->setOldValue($CurrentForm->getValue("o_invoiceId"));
        }

        // Check field name 'DrID' first before field var 'x_DrID'
        $val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
        if (!$this->DrID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrID->Visible = false; // Disable update for API request
            } else {
                $this->DrID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrID")) {
            $this->DrID->setOldValue($CurrentForm->getValue("o_DrID"));
        }

        // Check field name 'DrCODE' first before field var 'x_DrCODE'
        $val = $CurrentForm->hasValue("DrCODE") ? $CurrentForm->getValue("DrCODE") : $CurrentForm->getValue("x_DrCODE");
        if (!$this->DrCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrCODE->Visible = false; // Disable update for API request
            } else {
                $this->DrCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrCODE")) {
            $this->DrCODE->setOldValue($CurrentForm->getValue("o_DrCODE"));
        }

        // Check field name 'DrName' first before field var 'x_DrName'
        $val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
        if (!$this->DrName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrName->Visible = false; // Disable update for API request
            } else {
                $this->DrName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrName")) {
            $this->DrName->setOldValue($CurrentForm->getValue("o_DrName"));
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

        // Check field name 'TestType' first before field var 'x_TestType'
        $val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
        if (!$this->TestType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestType->Visible = false; // Disable update for API request
            } else {
                $this->TestType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TestType")) {
            $this->TestType->setOldValue($CurrentForm->getValue("o_TestType"));
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
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->sid->CurrentValue = $this->sid->FormValue;
        $this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
        $this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
        $this->Resulted->CurrentValue = $this->Resulted->FormValue;
        $this->Services->CurrentValue = $this->Services->FormValue;
        $this->LabReport->CurrentValue = $this->LabReport->FormValue;
        $this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
        $this->RefValue->CurrentValue = $this->RefValue->FormValue;
        $this->Order->CurrentValue = $this->Order->FormValue;
        $this->Repeated->CurrentValue = $this->Repeated->FormValue;
        $this->Vid->CurrentValue = $this->Vid->FormValue;
        $this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
        $this->DrName->CurrentValue = $this->DrName->FormValue;
        $this->Department->CurrentValue = $this->Department->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
        $this->TestType->CurrentValue = $this->TestType->FormValue;
        $this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
        $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        $this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->sid->setDbValue($row['sid']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->Resulted->setDbValue($row['Resulted']);
        $this->Services->setDbValue($row['Services']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->Pic1->Upload->DbValue = $row['Pic1'];
        $this->Pic1->setDbValue($this->Pic1->Upload->DbValue);
        $this->Pic1->Upload->Index = $this->RowIndex;
        $this->Pic2->Upload->DbValue = $row['Pic2'];
        $this->Pic2->setDbValue($this->Pic2->Upload->DbValue);
        $this->Pic2->Upload->Index = $this->RowIndex;
        $this->TestUnit->setDbValue($row['TestUnit']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Order->setDbValue($row['Order']);
        $this->Repeated->setDbValue($row['Repeated']);
        $this->Vid->setDbValue($row['Vid']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrCODE->setDbValue($row['DrCODE']);
        $this->DrName->setDbValue($row['DrName']);
        $this->Department->setDbValue($row['Department']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->status->setDbValue($row['status']);
        $this->TestType->setDbValue($row['TestType']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['sid'] = $this->sid->CurrentValue;
        $row['ItemCode'] = $this->ItemCode->CurrentValue;
        $row['DEptCd'] = $this->DEptCd->CurrentValue;
        $row['Resulted'] = $this->Resulted->CurrentValue;
        $row['Services'] = $this->Services->CurrentValue;
        $row['LabReport'] = $this->LabReport->CurrentValue;
        $row['Pic1'] = $this->Pic1->Upload->DbValue;
        $row['Pic2'] = $this->Pic2->Upload->DbValue;
        $row['TestUnit'] = $this->TestUnit->CurrentValue;
        $row['RefValue'] = $this->RefValue->CurrentValue;
        $row['Order'] = $this->Order->CurrentValue;
        $row['Repeated'] = $this->Repeated->CurrentValue;
        $row['Vid'] = $this->Vid->CurrentValue;
        $row['invoiceId'] = $this->invoiceId->CurrentValue;
        $row['DrID'] = $this->DrID->CurrentValue;
        $row['DrCODE'] = $this->DrCODE->CurrentValue;
        $row['DrName'] = $this->DrName->CurrentValue;
        $row['Department'] = $this->Department->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['TestType'] = $this->TestType->CurrentValue;
        $row['ResultDate'] = $this->ResultDate->CurrentValue;
        $row['ResultedBy'] = $this->ResultedBy->CurrentValue;
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

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // PatID

        // PatientName

        // Age

        // Gender

        // sid

        // ItemCode

        // DEptCd

        // Resulted

        // Services

        // LabReport

        // Pic1

        // Pic2

        // TestUnit

        // RefValue

        // Order

        // Repeated

        // Vid

        // invoiceId

        // DrID

        // DrCODE

        // DrName

        // Department

        // createddatetime

        // status

        // TestType

        // ResultDate

        // ResultedBy

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // sid
            $this->sid->ViewValue = $this->sid->CurrentValue;
            $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
            $this->sid->ViewCustomAttributes = "";

            // ItemCode
            $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
            $this->ItemCode->ViewCustomAttributes = "";

            // DEptCd
            $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
            $this->DEptCd->ViewCustomAttributes = "";

            // Resulted
            if (strval($this->Resulted->CurrentValue) != "") {
                $this->Resulted->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Resulted->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Resulted->ViewValue->add($this->Resulted->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Resulted->ViewValue = null;
            }
            $this->Resulted->ViewCustomAttributes = "";

            // Services
            $this->Services->ViewValue = $this->Services->CurrentValue;
            $this->Services->ViewCustomAttributes = "";

            // LabReport
            $this->LabReport->ViewValue = $this->LabReport->CurrentValue;
            $this->LabReport->ViewCustomAttributes = "";

            // Pic1
            if (!EmptyValue($this->Pic1->Upload->DbValue)) {
                $this->Pic1->ViewValue = $this->Pic1->Upload->DbValue;
            } else {
                $this->Pic1->ViewValue = "";
            }
            $this->Pic1->ViewCustomAttributes = "";

            // Pic2
            if (!EmptyValue($this->Pic2->Upload->DbValue)) {
                $this->Pic2->ViewValue = $this->Pic2->Upload->DbValue;
            } else {
                $this->Pic2->ViewValue = "";
            }
            $this->Pic2->ViewCustomAttributes = "";

            // TestUnit
            $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
            $curVal = trim(strval($this->TestUnit->CurrentValue));
            if ($curVal != "") {
                $this->TestUnit->ViewValue = $this->TestUnit->lookupCacheOption($curVal);
                if ($this->TestUnit->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->TestUnit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TestUnit->Lookup->renderViewRow($rswrk[0]);
                        $this->TestUnit->ViewValue = $this->TestUnit->displayValue($arwrk);
                    } else {
                        $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
                    }
                }
            } else {
                $this->TestUnit->ViewValue = null;
            }
            $this->TestUnit->ViewCustomAttributes = "";

            // RefValue
            $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
            $this->RefValue->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // Repeated
            if (strval($this->Repeated->CurrentValue) != "") {
                $this->Repeated->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Repeated->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Repeated->ViewValue->add($this->Repeated->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Repeated->ViewValue = null;
            }
            $this->Repeated->ViewCustomAttributes = "";

            // Vid
            $this->Vid->ViewValue = $this->Vid->CurrentValue;
            $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";

            // invoiceId
            $this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
            $this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
            $this->invoiceId->ViewCustomAttributes = "";

            // DrID
            $this->DrID->ViewValue = $this->DrID->CurrentValue;
            $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // DrCODE
            $this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
            $this->DrCODE->ViewCustomAttributes = "";

            // DrName
            $this->DrName->ViewValue = $this->DrName->CurrentValue;
            $this->DrName->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // TestType
            $this->TestType->ViewValue = $this->TestType->CurrentValue;
            $this->TestType->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // ResultedBy
            $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
            $this->ResultedBy->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";
            $this->sid->TooltipValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";
            $this->ItemCode->TooltipValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";
            $this->DEptCd->TooltipValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";
            $this->Resulted->TooltipValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";
            $this->Services->TooltipValue = "";

            // LabReport
            $this->LabReport->LinkCustomAttributes = "";
            $this->LabReport->HrefValue = "";
            $this->LabReport->TooltipValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;
            $this->Pic1->TooltipValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;
            $this->Pic2->TooltipValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";
            $this->TestUnit->TooltipValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";
            $this->RefValue->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";
            $this->Repeated->TooltipValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";
            $this->Vid->TooltipValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";
            $this->invoiceId->TooltipValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // DrCODE
            $this->DrCODE->LinkCustomAttributes = "";
            $this->DrCODE->HrefValue = "";
            $this->DrCODE->TooltipValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";
            $this->DrName->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";
            $this->ResultedBy->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // ItemCode
            $this->ItemCode->EditAttrs["class"] = "form-control";
            $this->ItemCode->EditCustomAttributes = "";
            if (!$this->ItemCode->Raw) {
                $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
            }
            $this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
            $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

            // DEptCd
            $this->DEptCd->EditAttrs["class"] = "form-control";
            $this->DEptCd->EditCustomAttributes = "";
            if (!$this->DEptCd->Raw) {
                $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
            }
            $this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
            $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

            // Resulted
            $this->Resulted->EditCustomAttributes = "";
            $this->Resulted->EditValue = $this->Resulted->options(false);
            $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

            // Services
            $this->Services->EditAttrs["class"] = "form-control";
            $this->Services->EditCustomAttributes = "";
            if (!$this->Services->Raw) {
                $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
            }
            $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
            $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

            // LabReport
            $this->LabReport->EditAttrs["class"] = "form-control";
            $this->LabReport->EditCustomAttributes = "";
            $this->LabReport->EditValue = HtmlEncode($this->LabReport->CurrentValue);
            $this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

            // Pic1
            $this->Pic1->EditAttrs["class"] = "form-control";
            $this->Pic1->EditCustomAttributes = "";
            if (!EmptyValue($this->Pic1->Upload->DbValue)) {
                $this->Pic1->EditValue = $this->Pic1->Upload->DbValue;
            } else {
                $this->Pic1->EditValue = "";
            }
            if (!EmptyValue($this->Pic1->CurrentValue)) {
                if ($this->RowIndex == '$rowindex$') {
                    $this->Pic1->Upload->FileName = "";
                } else {
                    $this->Pic1->Upload->FileName = $this->Pic1->CurrentValue;
                }
            }
            if (is_numeric($this->RowIndex)) {
                RenderUploadField($this->Pic1, $this->RowIndex);
            }

            // Pic2
            $this->Pic2->EditAttrs["class"] = "form-control";
            $this->Pic2->EditCustomAttributes = "";
            if (!EmptyValue($this->Pic2->Upload->DbValue)) {
                $this->Pic2->EditValue = $this->Pic2->Upload->DbValue;
            } else {
                $this->Pic2->EditValue = "";
            }
            if (!EmptyValue($this->Pic2->CurrentValue)) {
                if ($this->RowIndex == '$rowindex$') {
                    $this->Pic2->Upload->FileName = "";
                } else {
                    $this->Pic2->Upload->FileName = $this->Pic2->CurrentValue;
                }
            }
            if (is_numeric($this->RowIndex)) {
                RenderUploadField($this->Pic2, $this->RowIndex);
            }

            // TestUnit
            $this->TestUnit->EditAttrs["class"] = "form-control";
            $this->TestUnit->EditCustomAttributes = "";
            if (!$this->TestUnit->Raw) {
                $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
            }
            $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
            $curVal = trim(strval($this->TestUnit->CurrentValue));
            if ($curVal != "") {
                $this->TestUnit->EditValue = $this->TestUnit->lookupCacheOption($curVal);
                if ($this->TestUnit->EditValue === null) { // Lookup from database
                    $filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->TestUnit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TestUnit->Lookup->renderViewRow($rswrk[0]);
                        $this->TestUnit->EditValue = $this->TestUnit->displayValue($arwrk);
                    } else {
                        $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
                    }
                }
            } else {
                $this->TestUnit->EditValue = null;
            }
            $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

            // RefValue
            $this->RefValue->EditAttrs["class"] = "form-control";
            $this->RefValue->EditCustomAttributes = "";
            $this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
            $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
                $this->Order->OldValue = $this->Order->EditValue;
            }

            // Repeated
            $this->Repeated->EditCustomAttributes = "";
            $this->Repeated->EditValue = $this->Repeated->options(false);
            $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

            // Vid
            $this->Vid->EditAttrs["class"] = "form-control";
            $this->Vid->EditCustomAttributes = "";
            if ($this->Vid->getSessionValue() != "") {
                $this->Vid->CurrentValue = GetForeignKeyValue($this->Vid->getSessionValue());
                $this->Vid->OldValue = $this->Vid->CurrentValue;
                $this->Vid->ViewValue = $this->Vid->CurrentValue;
                $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
                $this->Vid->ViewCustomAttributes = "";
            } else {
                $this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
                $this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
            }

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // DrCODE
            $this->DrCODE->EditAttrs["class"] = "form-control";
            $this->DrCODE->EditCustomAttributes = "";
            if (!$this->DrCODE->Raw) {
                $this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
            }
            $this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
            $this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

            // DrName
            $this->DrName->EditAttrs["class"] = "form-control";
            $this->DrName->EditCustomAttributes = "";
            if (!$this->DrName->Raw) {
                $this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
            }
            $this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
            $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            if (!$this->TestType->Raw) {
                $this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
            }
            $this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
            $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

            // ResultDate

            // ResultedBy

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";

            // LabReport
            $this->LabReport->LinkCustomAttributes = "";
            $this->LabReport->HrefValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";

            // DrCODE
            $this->DrCODE->LinkCustomAttributes = "";
            $this->DrCODE->HrefValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // ItemCode
            $this->ItemCode->EditAttrs["class"] = "form-control";
            $this->ItemCode->EditCustomAttributes = "";
            if (!$this->ItemCode->Raw) {
                $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
            }
            $this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
            $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

            // DEptCd
            $this->DEptCd->EditAttrs["class"] = "form-control";
            $this->DEptCd->EditCustomAttributes = "";
            if (!$this->DEptCd->Raw) {
                $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
            }
            $this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
            $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

            // Resulted
            $this->Resulted->EditCustomAttributes = "";
            $this->Resulted->EditValue = $this->Resulted->options(false);
            $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

            // Services
            $this->Services->EditAttrs["class"] = "form-control";
            $this->Services->EditCustomAttributes = "";
            if (!$this->Services->Raw) {
                $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
            }
            $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
            $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

            // LabReport
            $this->LabReport->EditAttrs["class"] = "form-control";
            $this->LabReport->EditCustomAttributes = "";
            $this->LabReport->EditValue = HtmlEncode($this->LabReport->CurrentValue);
            $this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

            // Pic1
            $this->Pic1->EditAttrs["class"] = "form-control";
            $this->Pic1->EditCustomAttributes = "";
            if (!EmptyValue($this->Pic1->Upload->DbValue)) {
                $this->Pic1->EditValue = $this->Pic1->Upload->DbValue;
            } else {
                $this->Pic1->EditValue = "";
            }
            if (!EmptyValue($this->Pic1->CurrentValue)) {
                if ($this->RowIndex == '$rowindex$') {
                    $this->Pic1->Upload->FileName = "";
                } else {
                    $this->Pic1->Upload->FileName = $this->Pic1->CurrentValue;
                }
            }
            if (is_numeric($this->RowIndex)) {
                RenderUploadField($this->Pic1, $this->RowIndex);
            }

            // Pic2
            $this->Pic2->EditAttrs["class"] = "form-control";
            $this->Pic2->EditCustomAttributes = "";
            if (!EmptyValue($this->Pic2->Upload->DbValue)) {
                $this->Pic2->EditValue = $this->Pic2->Upload->DbValue;
            } else {
                $this->Pic2->EditValue = "";
            }
            if (!EmptyValue($this->Pic2->CurrentValue)) {
                if ($this->RowIndex == '$rowindex$') {
                    $this->Pic2->Upload->FileName = "";
                } else {
                    $this->Pic2->Upload->FileName = $this->Pic2->CurrentValue;
                }
            }
            if (is_numeric($this->RowIndex)) {
                RenderUploadField($this->Pic2, $this->RowIndex);
            }

            // TestUnit
            $this->TestUnit->EditAttrs["class"] = "form-control";
            $this->TestUnit->EditCustomAttributes = "";
            if (!$this->TestUnit->Raw) {
                $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
            }
            $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
            $curVal = trim(strval($this->TestUnit->CurrentValue));
            if ($curVal != "") {
                $this->TestUnit->EditValue = $this->TestUnit->lookupCacheOption($curVal);
                if ($this->TestUnit->EditValue === null) { // Lookup from database
                    $filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->TestUnit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TestUnit->Lookup->renderViewRow($rswrk[0]);
                        $this->TestUnit->EditValue = $this->TestUnit->displayValue($arwrk);
                    } else {
                        $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
                    }
                }
            } else {
                $this->TestUnit->EditValue = null;
            }
            $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

            // RefValue
            $this->RefValue->EditAttrs["class"] = "form-control";
            $this->RefValue->EditCustomAttributes = "";
            $this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
            $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
                $this->Order->OldValue = $this->Order->EditValue;
            }

            // Repeated
            $this->Repeated->EditCustomAttributes = "";
            $this->Repeated->EditValue = $this->Repeated->options(false);
            $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

            // Vid
            $this->Vid->EditAttrs["class"] = "form-control";
            $this->Vid->EditCustomAttributes = "";
            if ($this->Vid->getSessionValue() != "") {
                $this->Vid->CurrentValue = GetForeignKeyValue($this->Vid->getSessionValue());
                $this->Vid->OldValue = $this->Vid->CurrentValue;
                $this->Vid->ViewValue = $this->Vid->CurrentValue;
                $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
                $this->Vid->ViewCustomAttributes = "";
            } else {
                $this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
                $this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
            }

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // DrCODE
            $this->DrCODE->EditAttrs["class"] = "form-control";
            $this->DrCODE->EditCustomAttributes = "";
            if (!$this->DrCODE->Raw) {
                $this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
            }
            $this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
            $this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

            // DrName
            $this->DrName->EditAttrs["class"] = "form-control";
            $this->DrName->EditCustomAttributes = "";
            if (!$this->DrName->Raw) {
                $this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
            }
            $this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
            $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            if (!$this->TestType->Raw) {
                $this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
            }
            $this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
            $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

            // ResultDate

            // ResultedBy

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";

            // LabReport
            $this->LabReport->LinkCustomAttributes = "";
            $this->LabReport->HrefValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";

            // DrCODE
            $this->DrCODE->LinkCustomAttributes = "";
            $this->DrCODE->HrefValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatID->FormValue)) {
            $this->PatID->addErrorMessage($this->PatID->getErrorMessage(false));
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
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
        if ($this->sid->Required) {
            if (!$this->sid->IsDetailKey && EmptyValue($this->sid->FormValue)) {
                $this->sid->addErrorMessage(str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->sid->FormValue)) {
            $this->sid->addErrorMessage($this->sid->getErrorMessage(false));
        }
        if ($this->ItemCode->Required) {
            if (!$this->ItemCode->IsDetailKey && EmptyValue($this->ItemCode->FormValue)) {
                $this->ItemCode->addErrorMessage(str_replace("%s", $this->ItemCode->caption(), $this->ItemCode->RequiredErrorMessage));
            }
        }
        if ($this->DEptCd->Required) {
            if (!$this->DEptCd->IsDetailKey && EmptyValue($this->DEptCd->FormValue)) {
                $this->DEptCd->addErrorMessage(str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
            }
        }
        if ($this->Resulted->Required) {
            if ($this->Resulted->FormValue == "") {
                $this->Resulted->addErrorMessage(str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
            }
        }
        if ($this->Services->Required) {
            if (!$this->Services->IsDetailKey && EmptyValue($this->Services->FormValue)) {
                $this->Services->addErrorMessage(str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
            }
        }
        if ($this->LabReport->Required) {
            if (!$this->LabReport->IsDetailKey && EmptyValue($this->LabReport->FormValue)) {
                $this->LabReport->addErrorMessage(str_replace("%s", $this->LabReport->caption(), $this->LabReport->RequiredErrorMessage));
            }
        }
        if ($this->Pic1->Required) {
            if ($this->Pic1->Upload->FileName == "" && !$this->Pic1->Upload->KeepFile) {
                $this->Pic1->addErrorMessage(str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
            }
        }
        if ($this->Pic2->Required) {
            if ($this->Pic2->Upload->FileName == "" && !$this->Pic2->Upload->KeepFile) {
                $this->Pic2->addErrorMessage(str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
            }
        }
        if ($this->TestUnit->Required) {
            if (!$this->TestUnit->IsDetailKey && EmptyValue($this->TestUnit->FormValue)) {
                $this->TestUnit->addErrorMessage(str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
            }
        }
        if ($this->RefValue->Required) {
            if (!$this->RefValue->IsDetailKey && EmptyValue($this->RefValue->FormValue)) {
                $this->RefValue->addErrorMessage(str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
            }
        }
        if ($this->Order->Required) {
            if (!$this->Order->IsDetailKey && EmptyValue($this->Order->FormValue)) {
                $this->Order->addErrorMessage(str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Order->FormValue)) {
            $this->Order->addErrorMessage($this->Order->getErrorMessage(false));
        }
        if ($this->Repeated->Required) {
            if ($this->Repeated->FormValue == "") {
                $this->Repeated->addErrorMessage(str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
            }
        }
        if ($this->Vid->Required) {
            if (!$this->Vid->IsDetailKey && EmptyValue($this->Vid->FormValue)) {
                $this->Vid->addErrorMessage(str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Vid->FormValue)) {
            $this->Vid->addErrorMessage($this->Vid->getErrorMessage(false));
        }
        if ($this->invoiceId->Required) {
            if (!$this->invoiceId->IsDetailKey && EmptyValue($this->invoiceId->FormValue)) {
                $this->invoiceId->addErrorMessage(str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->invoiceId->FormValue)) {
            $this->invoiceId->addErrorMessage($this->invoiceId->getErrorMessage(false));
        }
        if ($this->DrID->Required) {
            if (!$this->DrID->IsDetailKey && EmptyValue($this->DrID->FormValue)) {
                $this->DrID->addErrorMessage(str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrID->FormValue)) {
            $this->DrID->addErrorMessage($this->DrID->getErrorMessage(false));
        }
        if ($this->DrCODE->Required) {
            if (!$this->DrCODE->IsDetailKey && EmptyValue($this->DrCODE->FormValue)) {
                $this->DrCODE->addErrorMessage(str_replace("%s", $this->DrCODE->caption(), $this->DrCODE->RequiredErrorMessage));
            }
        }
        if ($this->DrName->Required) {
            if (!$this->DrName->IsDetailKey && EmptyValue($this->DrName->FormValue)) {
                $this->DrName->addErrorMessage(str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
            }
        }
        if ($this->Department->Required) {
            if (!$this->Department->IsDetailKey && EmptyValue($this->Department->FormValue)) {
                $this->Department->addErrorMessage(str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
            }
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->status->FormValue)) {
            $this->status->addErrorMessage($this->status->getErrorMessage(false));
        }
        if ($this->TestType->Required) {
            if (!$this->TestType->IsDetailKey && EmptyValue($this->TestType->FormValue)) {
                $this->TestType->addErrorMessage(str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
            }
        }
        if ($this->ResultDate->Required) {
            if (!$this->ResultDate->IsDetailKey && EmptyValue($this->ResultDate->FormValue)) {
                $this->ResultDate->addErrorMessage(str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
            }
        }
        if ($this->ResultedBy->Required) {
            if (!$this->ResultedBy->IsDetailKey && EmptyValue($this->ResultedBy->FormValue)) {
                $this->ResultedBy->addErrorMessage(str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
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

            // PatID
            $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, $this->PatID->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // sid
            $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, $this->sid->ReadOnly);

            // ItemCode
            $this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, null, $this->ItemCode->ReadOnly);

            // DEptCd
            $this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, null, $this->DEptCd->ReadOnly);

            // Resulted
            $this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, null, $this->Resulted->ReadOnly);

            // Services
            $this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", $this->Services->ReadOnly);

            // LabReport
            $this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, null, $this->LabReport->ReadOnly);

            // Pic1
            if ($this->Pic1->Visible && !$this->Pic1->ReadOnly && !$this->Pic1->Upload->KeepFile) {
                $this->Pic1->Upload->DbValue = $rsold['Pic1']; // Get original value
                if ($this->Pic1->Upload->FileName == "") {
                    $rsnew['Pic1'] = null;
                } else {
                    $rsnew['Pic1'] = $this->Pic1->Upload->FileName;
                }
            }

            // Pic2
            if ($this->Pic2->Visible && !$this->Pic2->ReadOnly && !$this->Pic2->Upload->KeepFile) {
                $this->Pic2->Upload->DbValue = $rsold['Pic2']; // Get original value
                if ($this->Pic2->Upload->FileName == "") {
                    $rsnew['Pic2'] = null;
                } else {
                    $rsnew['Pic2'] = $this->Pic2->Upload->FileName;
                }
            }

            // TestUnit
            $this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, null, $this->TestUnit->ReadOnly);

            // RefValue
            $this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, null, $this->RefValue->ReadOnly);

            // Order
            $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, null, $this->Order->ReadOnly);

            // Repeated
            $this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, null, $this->Repeated->ReadOnly);

            // Vid
            if ($this->Vid->getSessionValue() != "") {
                $this->Vid->ReadOnly = true;
            }
            $this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, null, $this->Vid->ReadOnly);

            // invoiceId
            $this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, null, $this->invoiceId->ReadOnly);

            // DrID
            $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, $this->DrID->ReadOnly);

            // DrCODE
            $this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, null, $this->DrCODE->ReadOnly);

            // DrName
            $this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, null, $this->DrName->ReadOnly);

            // Department
            $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, $this->Department->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // TestType
            $this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, null, $this->TestType->ReadOnly);

            // ResultDate
            $this->ResultDate->CurrentValue = CurrentDateTime();
            $this->ResultDate->setDbValueDef($rsnew, $this->ResultDate->CurrentValue, null);

            // ResultedBy
            $this->ResultedBy->CurrentValue = CurrentUserName();
            $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null);

            // HospID
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, $this->HospID->ReadOnly);
            if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? [] : [$this->Pic1->htmlDecode($this->Pic1->Upload->DbValue)];
                if (!EmptyValue($this->Pic1->Upload->FileName)) {
                    $newFiles = [$this->Pic1->Upload->FileName];
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->Pic1, $this->Pic1->Upload->Index);
                            if (file_exists($tempPath . $file)) {
                                if (Config("DELETE_UPLOADED_FILES")) {
                                    $oldFileFound = false;
                                    $oldFileCount = count($oldFiles);
                                    for ($j = 0; $j < $oldFileCount; $j++) {
                                        $oldFile = $oldFiles[$j];
                                        if ($oldFile == $file) { // Old file found, no need to delete anymore
                                            array_splice($oldFiles, $j, 1);
                                            $oldFileFound = true;
                                            break;
                                        }
                                    }
                                    if ($oldFileFound) { // No need to check if file exists further
                                        continue;
                                    }
                                }
                                $file1 = UniqueFilename($this->Pic1->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->Pic1->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->Pic1->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->Pic1->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->Pic1->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->Pic1->setDbValueDef($rsnew, $this->Pic1->Upload->FileName, null, $this->Pic1->ReadOnly);
                }
            }
            if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? [] : [$this->Pic2->htmlDecode($this->Pic2->Upload->DbValue)];
                if (!EmptyValue($this->Pic2->Upload->FileName)) {
                    $newFiles = [$this->Pic2->Upload->FileName];
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->Pic2, $this->Pic2->Upload->Index);
                            if (file_exists($tempPath . $file)) {
                                if (Config("DELETE_UPLOADED_FILES")) {
                                    $oldFileFound = false;
                                    $oldFileCount = count($oldFiles);
                                    for ($j = 0; $j < $oldFileCount; $j++) {
                                        $oldFile = $oldFiles[$j];
                                        if ($oldFile == $file) { // Old file found, no need to delete anymore
                                            array_splice($oldFiles, $j, 1);
                                            $oldFileFound = true;
                                            break;
                                        }
                                    }
                                    if ($oldFileFound) { // No need to check if file exists further
                                        continue;
                                    }
                                }
                                $file1 = UniqueFilename($this->Pic2->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->Pic2->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->Pic2->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->Pic2->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->Pic2->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->Pic2->setDbValueDef($rsnew, $this->Pic2->Upload->FileName, null, $this->Pic2->ReadOnly);
                }
            }

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
                    if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? [] : [$this->Pic1->htmlDecode($this->Pic1->Upload->DbValue)];
                        if (!EmptyValue($this->Pic1->Upload->FileName)) {
                            $newFiles = [$this->Pic1->Upload->FileName];
                            $newFiles2 = [$this->Pic1->htmlDecode($rsnew['Pic1'])];
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->Pic1->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                            $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                            return false;
                                        }
                                    }
                                }
                            }
                        } else {
                            $newFiles = [];
                        }
                        if (Config("DELETE_UPLOADED_FILES")) {
                            foreach ($oldFiles as $oldFile) {
                                if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                    @unlink($this->Pic1->oldPhysicalUploadPath() . $oldFile);
                                }
                            }
                        }
                    }
                    if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? [] : [$this->Pic2->htmlDecode($this->Pic2->Upload->DbValue)];
                        if (!EmptyValue($this->Pic2->Upload->FileName)) {
                            $newFiles = [$this->Pic2->Upload->FileName];
                            $newFiles2 = [$this->Pic2->htmlDecode($rsnew['Pic2'])];
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->Pic2->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                            $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                            return false;
                                        }
                                    }
                                }
                            }
                        } else {
                            $newFiles = [];
                        }
                        if (Config("DELETE_UPLOADED_FILES")) {
                            foreach ($oldFiles as $oldFile) {
                                if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                    @unlink($this->Pic2->oldPhysicalUploadPath() . $oldFile);
                                }
                            }
                        }
                    }
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
            // Pic1
            CleanUploadTempPath($this->Pic1, $this->Pic1->Upload->Index);

            // Pic2
            CleanUploadTempPath($this->Pic2, $this->Pic2->Upload->Index);
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
        if ($this->getCurrentMasterTable() == "view_lab_services") {
            $this->Vid->CurrentValue = $this->Vid->getSessionValue();
        }
        if ($this->getCurrentMasterTable() == "view_labreport_print") {
            $this->Vid->CurrentValue = $this->Vid->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // sid
        $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, false);

        // ItemCode
        $this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, null, false);

        // DEptCd
        $this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, null, false);

        // Resulted
        $this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, null, false);

        // Services
        $this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", false);

        // LabReport
        $this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, null, false);

        // Pic1
        if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
            $this->Pic1->Upload->DbValue = ""; // No need to delete old file
            if ($this->Pic1->Upload->FileName == "") {
                $rsnew['Pic1'] = null;
            } else {
                $rsnew['Pic1'] = $this->Pic1->Upload->FileName;
            }
        }

        // Pic2
        if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
            $this->Pic2->Upload->DbValue = ""; // No need to delete old file
            if ($this->Pic2->Upload->FileName == "") {
                $rsnew['Pic2'] = null;
            } else {
                $rsnew['Pic2'] = $this->Pic2->Upload->FileName;
            }
        }

        // TestUnit
        $this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, null, false);

        // RefValue
        $this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, null, false);

        // Order
        $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, null, false);

        // Repeated
        $this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, null, false);

        // Vid
        $this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, null, false);

        // invoiceId
        $this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, null, false);

        // DrID
        $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, false);

        // DrCODE
        $this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, null, false);

        // DrName
        $this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, null, false);

        // Department
        $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // TestType
        $this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, null, strval($this->TestType->CurrentValue) == "");

        // ResultDate
        $this->ResultDate->CurrentValue = CurrentDateTime();
        $this->ResultDate->setDbValueDef($rsnew, $this->ResultDate->CurrentValue, null);

        // ResultedBy
        $this->ResultedBy->CurrentValue = CurrentUserName();
        $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);
        if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
            $oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? [] : [$this->Pic1->htmlDecode($this->Pic1->Upload->DbValue)];
            if (!EmptyValue($this->Pic1->Upload->FileName)) {
                $newFiles = [$this->Pic1->Upload->FileName];
                $NewFileCount = count($newFiles);
                for ($i = 0; $i < $NewFileCount; $i++) {
                    if ($newFiles[$i] != "") {
                        $file = $newFiles[$i];
                        $tempPath = UploadTempPath($this->Pic1, $this->Pic1->Upload->Index);
                        if (file_exists($tempPath . $file)) {
                            if (Config("DELETE_UPLOADED_FILES")) {
                                $oldFileFound = false;
                                $oldFileCount = count($oldFiles);
                                for ($j = 0; $j < $oldFileCount; $j++) {
                                    $oldFile = $oldFiles[$j];
                                    if ($oldFile == $file) { // Old file found, no need to delete anymore
                                        array_splice($oldFiles, $j, 1);
                                        $oldFileFound = true;
                                        break;
                                    }
                                }
                                if ($oldFileFound) { // No need to check if file exists further
                                    continue;
                                }
                            }
                            $file1 = UniqueFilename($this->Pic1->physicalUploadPath(), $file); // Get new file name
                            if ($file1 != $file) { // Rename temp file
                                while (file_exists($tempPath . $file1) || file_exists($this->Pic1->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                    $file1 = UniqueFilename([$this->Pic1->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                }
                                rename($tempPath . $file, $tempPath . $file1);
                                $newFiles[$i] = $file1;
                            }
                        }
                    }
                }
                $this->Pic1->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                $this->Pic1->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                $this->Pic1->setDbValueDef($rsnew, $this->Pic1->Upload->FileName, null, false);
            }
        }
        if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
            $oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? [] : [$this->Pic2->htmlDecode($this->Pic2->Upload->DbValue)];
            if (!EmptyValue($this->Pic2->Upload->FileName)) {
                $newFiles = [$this->Pic2->Upload->FileName];
                $NewFileCount = count($newFiles);
                for ($i = 0; $i < $NewFileCount; $i++) {
                    if ($newFiles[$i] != "") {
                        $file = $newFiles[$i];
                        $tempPath = UploadTempPath($this->Pic2, $this->Pic2->Upload->Index);
                        if (file_exists($tempPath . $file)) {
                            if (Config("DELETE_UPLOADED_FILES")) {
                                $oldFileFound = false;
                                $oldFileCount = count($oldFiles);
                                for ($j = 0; $j < $oldFileCount; $j++) {
                                    $oldFile = $oldFiles[$j];
                                    if ($oldFile == $file) { // Old file found, no need to delete anymore
                                        array_splice($oldFiles, $j, 1);
                                        $oldFileFound = true;
                                        break;
                                    }
                                }
                                if ($oldFileFound) { // No need to check if file exists further
                                    continue;
                                }
                            }
                            $file1 = UniqueFilename($this->Pic2->physicalUploadPath(), $file); // Get new file name
                            if ($file1 != $file) { // Rename temp file
                                while (file_exists($tempPath . $file1) || file_exists($this->Pic2->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                    $file1 = UniqueFilename([$this->Pic2->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                }
                                rename($tempPath . $file, $tempPath . $file1);
                                $newFiles[$i] = $file1;
                            }
                        }
                    }
                }
                $this->Pic2->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                $this->Pic2->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                $this->Pic2->setDbValueDef($rsnew, $this->Pic2->Upload->FileName, null, false);
            }
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
                if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
                    $oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? [] : [$this->Pic1->htmlDecode($this->Pic1->Upload->DbValue)];
                    if (!EmptyValue($this->Pic1->Upload->FileName)) {
                        $newFiles = [$this->Pic1->Upload->FileName];
                        $newFiles2 = [$this->Pic1->htmlDecode($rsnew['Pic1'])];
                        $newFileCount = count($newFiles);
                        for ($i = 0; $i < $newFileCount; $i++) {
                            if ($newFiles[$i] != "") {
                                $file = UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $newFiles[$i];
                                if (file_exists($file)) {
                                    if (@$newFiles2[$i] != "") { // Use correct file name
                                        $newFiles[$i] = $newFiles2[$i];
                                    }
                                    if (!$this->Pic1->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                        $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                        return false;
                                    }
                                }
                            }
                        }
                    } else {
                        $newFiles = [];
                    }
                    if (Config("DELETE_UPLOADED_FILES")) {
                        foreach ($oldFiles as $oldFile) {
                            if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                @unlink($this->Pic1->oldPhysicalUploadPath() . $oldFile);
                            }
                        }
                    }
                }
                if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
                    $oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? [] : [$this->Pic2->htmlDecode($this->Pic2->Upload->DbValue)];
                    if (!EmptyValue($this->Pic2->Upload->FileName)) {
                        $newFiles = [$this->Pic2->Upload->FileName];
                        $newFiles2 = [$this->Pic2->htmlDecode($rsnew['Pic2'])];
                        $newFileCount = count($newFiles);
                        for ($i = 0; $i < $newFileCount; $i++) {
                            if ($newFiles[$i] != "") {
                                $file = UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $newFiles[$i];
                                if (file_exists($file)) {
                                    if (@$newFiles2[$i] != "") { // Use correct file name
                                        $newFiles[$i] = $newFiles2[$i];
                                    }
                                    if (!$this->Pic2->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                        $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                        return false;
                                    }
                                }
                            }
                        }
                    } else {
                        $newFiles = [];
                    }
                    if (Config("DELETE_UPLOADED_FILES")) {
                        foreach ($oldFiles as $oldFile) {
                            if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                @unlink($this->Pic2->oldPhysicalUploadPath() . $oldFile);
                            }
                        }
                    }
                }
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
            // Pic1
            CleanUploadTempPath($this->Pic1, $this->Pic1->Upload->Index);

            // Pic2
            CleanUploadTempPath($this->Pic2, $this->Pic2->Upload->Index);
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
        if ($masterTblVar == "view_lab_services") {
            $masterTbl = Container("view_lab_services");
            $this->Vid->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
        }
        if ($masterTblVar == "view_labreport_print") {
            $masterTbl = Container("view_labreport_print");
            $this->Vid->Visible = false;
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
                case "x_Resulted":
                    break;
                case "x_TestUnit":
                    break;
                case "x_Repeated":
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
    $this->id->Visible = FALSE;
    $this->PatID->Visible = FALSE;
    $this->PatientName->Visible = FALSE;
    $this->Age->Visible = FALSE;
    $this->sid->Visible = FALSE;
    $this->ItemCode->Visible = FALSE;
    $this->DEptCd->Visible = FALSE;
    $this->Gender->Visible = FALSE;
    $this->Vid->Visible = FALSE;
    $this->invoiceId->Visible = FALSE;
    $this->DrID->Visible = FALSE;
    $this->DrCODE->Visible = FALSE;
    $this->DrName->Visible = FALSE;
    $this->Department->Visible = FALSE;
    $this->createddatetime->Visible = FALSE;
    $this->status->Visible = FALSE;
    $this->TestType->Visible = FALSE;
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
