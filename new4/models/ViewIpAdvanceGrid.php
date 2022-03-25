<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIpAdvanceGrid extends ViewIpAdvance
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_ip_advance';

    // Page object name
    public $PageObjName = "ViewIpAdvanceGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_ip_advancegrid";
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

        // Table object (view_ip_advance)
        if (!isset($GLOBALS["view_ip_advance"]) || get_class($GLOBALS["view_ip_advance"]) == PROJECT_NAMESPACE . "view_ip_advance") {
            $GLOBALS["view_ip_advance"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "ViewIpAdvanceAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ip_advance');
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
                $doc = new $class(Container("view_ip_advance"));
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
        $this->Name->setVisibility();
        $this->Mobile->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatID->setVisibility();
        $this->PatientID->setVisibility();
        $this->PatientName->setVisibility();
        $this->VisiteType->setVisibility();
        $this->VisitDate->setVisibility();
        $this->AdvanceNo->setVisibility();
        $this->Status->setVisibility();
        $this->Date->setVisibility();
        $this->AdvanceValidityDate->setVisibility();
        $this->TotalRemainingAdvance->setVisibility();
        $this->Remarks->setVisibility();
        $this->SeectPaymentMode->setVisibility();
        $this->PaidAmount->setVisibility();
        $this->Currency->setVisibility();
        $this->CardNumber->setVisibility();
        $this->BankName->setVisibility();
        $this->HospID->setVisibility();
        $this->Reception->setVisibility();
        $this->mrnno->setVisibility();
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
        $this->setupLookupOptions($this->ModeofPayment);
        $this->setupLookupOptions($this->Reception);

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
        $this->Amount->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue != $this->Name->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_voucher_type") && $CurrentForm->hasValue("o_voucher_type") && $this->voucher_type->CurrentValue != $this->voucher_type->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Details") && $CurrentForm->hasValue("o_Details") && $this->Details->CurrentValue != $this->Details->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ModeofPayment") && $CurrentForm->hasValue("o_ModeofPayment") && $this->ModeofPayment->CurrentValue != $this->ModeofPayment->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue != $this->Amount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AnyDues") && $CurrentForm->hasValue("o_AnyDues") && $this->AnyDues->CurrentValue != $this->AnyDues->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientID") && $CurrentForm->hasValue("o_PatientID") && $this->PatientID->CurrentValue != $this->PatientID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_VisiteType") && $CurrentForm->hasValue("o_VisiteType") && $this->VisiteType->CurrentValue != $this->VisiteType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_VisitDate") && $CurrentForm->hasValue("o_VisitDate") && $this->VisitDate->CurrentValue != $this->VisitDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AdvanceNo") && $CurrentForm->hasValue("o_AdvanceNo") && $this->AdvanceNo->CurrentValue != $this->AdvanceNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue != $this->Status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Date") && $CurrentForm->hasValue("o_Date") && $this->Date->CurrentValue != $this->Date->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AdvanceValidityDate") && $CurrentForm->hasValue("o_AdvanceValidityDate") && $this->AdvanceValidityDate->CurrentValue != $this->AdvanceValidityDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TotalRemainingAdvance") && $CurrentForm->hasValue("o_TotalRemainingAdvance") && $this->TotalRemainingAdvance->CurrentValue != $this->TotalRemainingAdvance->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Remarks") && $CurrentForm->hasValue("o_Remarks") && $this->Remarks->CurrentValue != $this->Remarks->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SeectPaymentMode") && $CurrentForm->hasValue("o_SeectPaymentMode") && $this->SeectPaymentMode->CurrentValue != $this->SeectPaymentMode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaidAmount") && $CurrentForm->hasValue("o_PaidAmount") && $this->PaidAmount->CurrentValue != $this->PaidAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Currency") && $CurrentForm->hasValue("o_Currency") && $this->Currency->CurrentValue != $this->Currency->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CardNumber") && $CurrentForm->hasValue("o_CardNumber") && $this->CardNumber->CurrentValue != $this->CardNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BankName") && $CurrentForm->hasValue("o_BankName") && $this->BankName->CurrentValue != $this->BankName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue) {
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
        $this->Name->clearErrorMessage();
        $this->Mobile->clearErrorMessage();
        $this->voucher_type->clearErrorMessage();
        $this->Details->clearErrorMessage();
        $this->ModeofPayment->clearErrorMessage();
        $this->Amount->clearErrorMessage();
        $this->AnyDues->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->PatID->clearErrorMessage();
        $this->PatientID->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->VisiteType->clearErrorMessage();
        $this->VisitDate->clearErrorMessage();
        $this->AdvanceNo->clearErrorMessage();
        $this->Status->clearErrorMessage();
        $this->Date->clearErrorMessage();
        $this->AdvanceValidityDate->clearErrorMessage();
        $this->TotalRemainingAdvance->clearErrorMessage();
        $this->Remarks->clearErrorMessage();
        $this->SeectPaymentMode->clearErrorMessage();
        $this->PaidAmount->clearErrorMessage();
        $this->Currency->clearErrorMessage();
        $this->CardNumber->clearErrorMessage();
        $this->BankName->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->Reception->clearErrorMessage();
        $this->mrnno->clearErrorMessage();
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
                        $this->mrnno->setSessionValue("");
                        $this->Reception->setSessionValue("");
                        $this->PatID->setSessionValue("");
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
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->voucher_type->CurrentValue = null;
        $this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
        $this->Details->CurrentValue = null;
        $this->Details->OldValue = $this->Details->CurrentValue;
        $this->ModeofPayment->CurrentValue = null;
        $this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
        $this->Amount->CurrentValue = null;
        $this->Amount->OldValue = $this->Amount->CurrentValue;
        $this->AnyDues->CurrentValue = null;
        $this->AnyDues->OldValue = $this->AnyDues->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->VisiteType->CurrentValue = null;
        $this->VisiteType->OldValue = $this->VisiteType->CurrentValue;
        $this->VisitDate->CurrentValue = null;
        $this->VisitDate->OldValue = $this->VisitDate->CurrentValue;
        $this->AdvanceNo->CurrentValue = null;
        $this->AdvanceNo->OldValue = $this->AdvanceNo->CurrentValue;
        $this->Status->CurrentValue = null;
        $this->Status->OldValue = $this->Status->CurrentValue;
        $this->Date->CurrentValue = null;
        $this->Date->OldValue = $this->Date->CurrentValue;
        $this->AdvanceValidityDate->CurrentValue = null;
        $this->AdvanceValidityDate->OldValue = $this->AdvanceValidityDate->CurrentValue;
        $this->TotalRemainingAdvance->CurrentValue = null;
        $this->TotalRemainingAdvance->OldValue = $this->TotalRemainingAdvance->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->SeectPaymentMode->CurrentValue = null;
        $this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
        $this->PaidAmount->CurrentValue = null;
        $this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
        $this->Currency->CurrentValue = null;
        $this->Currency->OldValue = $this->Currency->CurrentValue;
        $this->CardNumber->CurrentValue = null;
        $this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
        $this->BankName->CurrentValue = null;
        $this->BankName->OldValue = $this->BankName->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
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

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Name")) {
            $this->Name->setOldValue($CurrentForm->getValue("o_Name"));
        }

        // Check field name 'Mobile' first before field var 'x_Mobile'
        $val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
        if (!$this->Mobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mobile->Visible = false; // Disable update for API request
            } else {
                $this->Mobile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Mobile")) {
            $this->Mobile->setOldValue($CurrentForm->getValue("o_Mobile"));
        }

        // Check field name 'voucher_type' first before field var 'x_voucher_type'
        $val = $CurrentForm->hasValue("voucher_type") ? $CurrentForm->getValue("voucher_type") : $CurrentForm->getValue("x_voucher_type");
        if (!$this->voucher_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->voucher_type->Visible = false; // Disable update for API request
            } else {
                $this->voucher_type->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_voucher_type")) {
            $this->voucher_type->setOldValue($CurrentForm->getValue("o_voucher_type"));
        }

        // Check field name 'Details' first before field var 'x_Details'
        $val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
        if (!$this->Details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Details->Visible = false; // Disable update for API request
            } else {
                $this->Details->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Details")) {
            $this->Details->setOldValue($CurrentForm->getValue("o_Details"));
        }

        // Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
        $val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
        if (!$this->ModeofPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModeofPayment->Visible = false; // Disable update for API request
            } else {
                $this->ModeofPayment->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ModeofPayment")) {
            $this->ModeofPayment->setOldValue($CurrentForm->getValue("o_ModeofPayment"));
        }

        // Check field name 'Amount' first before field var 'x_Amount'
        $val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
        if (!$this->Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amount->Visible = false; // Disable update for API request
            } else {
                $this->Amount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Amount")) {
            $this->Amount->setOldValue($CurrentForm->getValue("o_Amount"));
        }

        // Check field name 'AnyDues' first before field var 'x_AnyDues'
        $val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
        if (!$this->AnyDues->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnyDues->Visible = false; // Disable update for API request
            } else {
                $this->AnyDues->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_AnyDues")) {
            $this->AnyDues->setOldValue($CurrentForm->getValue("o_AnyDues"));
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

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientID")) {
            $this->PatientID->setOldValue($CurrentForm->getValue("o_PatientID"));
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

        // Check field name 'VisiteType' first before field var 'x_VisiteType'
        $val = $CurrentForm->hasValue("VisiteType") ? $CurrentForm->getValue("VisiteType") : $CurrentForm->getValue("x_VisiteType");
        if (!$this->VisiteType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisiteType->Visible = false; // Disable update for API request
            } else {
                $this->VisiteType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_VisiteType")) {
            $this->VisiteType->setOldValue($CurrentForm->getValue("o_VisiteType"));
        }

        // Check field name 'VisitDate' first before field var 'x_VisitDate'
        $val = $CurrentForm->hasValue("VisitDate") ? $CurrentForm->getValue("VisitDate") : $CurrentForm->getValue("x_VisitDate");
        if (!$this->VisitDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisitDate->Visible = false; // Disable update for API request
            } else {
                $this->VisitDate->setFormValue($val);
            }
            $this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_VisitDate")) {
            $this->VisitDate->setOldValue($CurrentForm->getValue("o_VisitDate"));
        }

        // Check field name 'AdvanceNo' first before field var 'x_AdvanceNo'
        $val = $CurrentForm->hasValue("AdvanceNo") ? $CurrentForm->getValue("AdvanceNo") : $CurrentForm->getValue("x_AdvanceNo");
        if (!$this->AdvanceNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdvanceNo->Visible = false; // Disable update for API request
            } else {
                $this->AdvanceNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_AdvanceNo")) {
            $this->AdvanceNo->setOldValue($CurrentForm->getValue("o_AdvanceNo"));
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

        // Check field name 'Date' first before field var 'x_Date'
        $val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
        if (!$this->Date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Date->Visible = false; // Disable update for API request
            } else {
                $this->Date->setFormValue($val);
            }
            $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_Date")) {
            $this->Date->setOldValue($CurrentForm->getValue("o_Date"));
        }

        // Check field name 'AdvanceValidityDate' first before field var 'x_AdvanceValidityDate'
        $val = $CurrentForm->hasValue("AdvanceValidityDate") ? $CurrentForm->getValue("AdvanceValidityDate") : $CurrentForm->getValue("x_AdvanceValidityDate");
        if (!$this->AdvanceValidityDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdvanceValidityDate->Visible = false; // Disable update for API request
            } else {
                $this->AdvanceValidityDate->setFormValue($val);
            }
            $this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_AdvanceValidityDate")) {
            $this->AdvanceValidityDate->setOldValue($CurrentForm->getValue("o_AdvanceValidityDate"));
        }

        // Check field name 'TotalRemainingAdvance' first before field var 'x_TotalRemainingAdvance'
        $val = $CurrentForm->hasValue("TotalRemainingAdvance") ? $CurrentForm->getValue("TotalRemainingAdvance") : $CurrentForm->getValue("x_TotalRemainingAdvance");
        if (!$this->TotalRemainingAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalRemainingAdvance->Visible = false; // Disable update for API request
            } else {
                $this->TotalRemainingAdvance->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TotalRemainingAdvance")) {
            $this->TotalRemainingAdvance->setOldValue($CurrentForm->getValue("o_TotalRemainingAdvance"));
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Remarks")) {
            $this->Remarks->setOldValue($CurrentForm->getValue("o_Remarks"));
        }

        // Check field name 'SeectPaymentMode' first before field var 'x_SeectPaymentMode'
        $val = $CurrentForm->hasValue("SeectPaymentMode") ? $CurrentForm->getValue("SeectPaymentMode") : $CurrentForm->getValue("x_SeectPaymentMode");
        if (!$this->SeectPaymentMode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SeectPaymentMode->Visible = false; // Disable update for API request
            } else {
                $this->SeectPaymentMode->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SeectPaymentMode")) {
            $this->SeectPaymentMode->setOldValue($CurrentForm->getValue("o_SeectPaymentMode"));
        }

        // Check field name 'PaidAmount' first before field var 'x_PaidAmount'
        $val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
        if (!$this->PaidAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaidAmount->Visible = false; // Disable update for API request
            } else {
                $this->PaidAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PaidAmount")) {
            $this->PaidAmount->setOldValue($CurrentForm->getValue("o_PaidAmount"));
        }

        // Check field name 'Currency' first before field var 'x_Currency'
        $val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
        if (!$this->Currency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Currency->Visible = false; // Disable update for API request
            } else {
                $this->Currency->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Currency")) {
            $this->Currency->setOldValue($CurrentForm->getValue("o_Currency"));
        }

        // Check field name 'CardNumber' first before field var 'x_CardNumber'
        $val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
        if (!$this->CardNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CardNumber->Visible = false; // Disable update for API request
            } else {
                $this->CardNumber->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CardNumber")) {
            $this->CardNumber->setOldValue($CurrentForm->getValue("o_CardNumber"));
        }

        // Check field name 'BankName' first before field var 'x_BankName'
        $val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
        if (!$this->BankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BankName->Visible = false; // Disable update for API request
            } else {
                $this->BankName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BankName")) {
            $this->BankName->setOldValue($CurrentForm->getValue("o_BankName"));
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->VisiteType->CurrentValue = $this->VisiteType->FormValue;
        $this->VisitDate->CurrentValue = $this->VisitDate->FormValue;
        $this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
        $this->AdvanceNo->CurrentValue = $this->AdvanceNo->FormValue;
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->Date->CurrentValue = $this->Date->FormValue;
        $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        $this->AdvanceValidityDate->CurrentValue = $this->AdvanceValidityDate->FormValue;
        $this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
        $this->TotalRemainingAdvance->CurrentValue = $this->TotalRemainingAdvance->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
        $this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
        $this->Currency->CurrentValue = $this->Currency->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
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
        $this->Name->setDbValue($row['Name']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->VisiteType->setDbValue($row['VisiteType']);
        $this->VisitDate->setDbValue($row['VisitDate']);
        $this->AdvanceNo->setDbValue($row['AdvanceNo']);
        $this->Status->setDbValue($row['Status']);
        $this->Date->setDbValue($row['Date']);
        $this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
        $this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->mrnno->setDbValue($row['mrnno']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Details'] = $this->Details->CurrentValue;
        $row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['AnyDues'] = $this->AnyDues->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['VisiteType'] = $this->VisiteType->CurrentValue;
        $row['VisitDate'] = $this->VisitDate->CurrentValue;
        $row['AdvanceNo'] = $this->AdvanceNo->CurrentValue;
        $row['Status'] = $this->Status->CurrentValue;
        $row['Date'] = $this->Date->CurrentValue;
        $row['AdvanceValidityDate'] = $this->AdvanceValidityDate->CurrentValue;
        $row['TotalRemainingAdvance'] = $this->TotalRemainingAdvance->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
        $row['PaidAmount'] = $this->PaidAmount->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
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
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Name

        // Mobile

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatID

        // PatientID

        // PatientName

        // VisiteType

        // VisitDate

        // AdvanceNo

        // Status

        // Date

        // AdvanceValidityDate

        // TotalRemainingAdvance

        // Remarks

        // SeectPaymentMode

        // PaidAmount

        // Currency

        // CardNumber

        // BankName

        // HospID

        // Reception

        // mrnno
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // ModeofPayment
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
                if ($this->ModeofPayment->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ModeofPayment->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ModeofPayment->Lookup->renderViewRow($rswrk[0]);
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
                    } else {
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
                    }
                }
            } else {
                $this->ModeofPayment->ViewValue = null;
            }
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // AnyDues
            $this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
            $this->AnyDues->ViewCustomAttributes = "";

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

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // VisiteType
            $this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
            $this->VisiteType->ViewCustomAttributes = "";

            // VisitDate
            $this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
            $this->VisitDate->ViewValue = FormatDateTime($this->VisitDate->ViewValue, 0);
            $this->VisitDate->ViewCustomAttributes = "";

            // AdvanceNo
            $this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
            $this->AdvanceNo->ViewCustomAttributes = "";

            // Status
            $this->Status->ViewValue = $this->Status->CurrentValue;
            $this->Status->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->ViewValue = $this->AdvanceValidityDate->CurrentValue;
            $this->AdvanceValidityDate->ViewValue = FormatDateTime($this->AdvanceValidityDate->ViewValue, 0);
            $this->AdvanceValidityDate->ViewCustomAttributes = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->ViewValue = $this->TotalRemainingAdvance->CurrentValue;
            $this->TotalRemainingAdvance->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->ViewValue = $this->SeectPaymentMode->CurrentValue;
            $this->SeectPaymentMode->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewCustomAttributes = "";

            // Currency
            $this->Currency->ViewValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Reception
            $curVal = trim(strval($this->Reception->CurrentValue));
            if ($curVal != "") {
                $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
                if ($this->Reception->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                        $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                    } else {
                        $this->Reception->ViewValue = $this->Reception->CurrentValue;
                    }
                }
            } else {
                $this->Reception->ViewValue = null;
            }
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";
            $this->voucher_type->TooltipValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";
            $this->Details->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";
            $this->AnyDues->TooltipValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";
            $this->VisiteType->TooltipValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";
            $this->VisitDate->TooltipValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";
            $this->AdvanceNo->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";
            $this->AdvanceValidityDate->TooltipValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";
            $this->TotalRemainingAdvance->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";
            $this->SeectPaymentMode->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";
            $this->Currency->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            } else {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== null && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : null;
            }
            if ($this->ModeofPayment->ViewValue !== null) { // Load from cache
                $this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ModeofPayment->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->ModeofPayment->EditValue = $arwrk;
            }
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
            if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
                $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
                $this->Amount->OldValue = $this->Amount->EditValue;
            }

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if ($this->PatID->getSessionValue() != "") {
                $this->PatID->CurrentValue = GetForeignKeyValue($this->PatID->getSessionValue());
                $this->PatID->OldValue = $this->PatID->CurrentValue;
                $this->PatID->ViewValue = $this->PatID->CurrentValue;
                $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
                $this->PatID->ViewCustomAttributes = "";
            } else {
                $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
                $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
            }

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // VisiteType
            $this->VisiteType->EditAttrs["class"] = "form-control";
            $this->VisiteType->EditCustomAttributes = "";
            if (!$this->VisiteType->Raw) {
                $this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
            }
            $this->VisiteType->EditValue = HtmlEncode($this->VisiteType->CurrentValue);
            $this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

            // VisitDate
            $this->VisitDate->EditAttrs["class"] = "form-control";
            $this->VisitDate->EditCustomAttributes = "";
            $this->VisitDate->EditValue = HtmlEncode(FormatDateTime($this->VisitDate->CurrentValue, 8));
            $this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

            // AdvanceNo
            $this->AdvanceNo->EditAttrs["class"] = "form-control";
            $this->AdvanceNo->EditCustomAttributes = "";
            if (!$this->AdvanceNo->Raw) {
                $this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
            }
            $this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->CurrentValue);
            $this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            if (!$this->Status->Raw) {
                $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
            }
            $this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // AdvanceValidityDate
            $this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
            $this->AdvanceValidityDate->EditCustomAttributes = "";
            $this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8));
            $this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
            $this->TotalRemainingAdvance->EditCustomAttributes = "";
            if (!$this->TotalRemainingAdvance->Raw) {
                $this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
            }
            $this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->CurrentValue);
            $this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // SeectPaymentMode
            $this->SeectPaymentMode->EditAttrs["class"] = "form-control";
            $this->SeectPaymentMode->EditCustomAttributes = "";
            if (!$this->SeectPaymentMode->Raw) {
                $this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
            }
            $this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->CurrentValue);
            $this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            if (!$this->PaidAmount->Raw) {
                $this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
            }
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // HospID

            // Reception
            $this->Reception->EditCustomAttributes = "";
            if ($this->Reception->getSessionValue() != "") {
                $this->Reception->CurrentValue = GetForeignKeyValue($this->Reception->getSessionValue());
                $this->Reception->OldValue = $this->Reception->CurrentValue;
                $curVal = trim(strval($this->Reception->CurrentValue));
                if ($curVal != "") {
                    $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
                    if ($this->Reception->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                            $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                        } else {
                            $this->Reception->ViewValue = $this->Reception->CurrentValue;
                        }
                    }
                } else {
                    $this->Reception->ViewValue = null;
                }
                $this->Reception->ViewCustomAttributes = "";
            } else {
                $curVal = trim(strval($this->Reception->CurrentValue));
                if ($curVal != "") {
                    $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
                } else {
                    $this->Reception->ViewValue = $this->Reception->Lookup !== null && is_array($this->Reception->Lookup->Options) ? $curVal : null;
                }
                if ($this->Reception->ViewValue !== null) { // Load from cache
                    $this->Reception->EditValue = array_values($this->Reception->Lookup->Options);
                    if ($this->Reception->ViewValue == "") {
                        $this->Reception->ViewValue = $Language->phrase("PleaseSelect");
                    }
                } else { // Lookup from database
                    if ($curVal == "") {
                        $filterWrk = "0=1";
                    } else {
                        $filterWrk = "`id`" . SearchString("=", $this->Reception->CurrentValue, DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->Reception->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                        $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                    } else {
                        $this->Reception->ViewValue = $Language->phrase("PleaseSelect");
                    }
                    $arwrk = $rswrk;
                    foreach ($arwrk as &$row)
                        $row = $this->Reception->Lookup->renderViewRow($row);
                    $this->Reception->EditValue = $arwrk;
                }
                $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
            }

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

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            } else {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== null && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : null;
            }
            if ($this->ModeofPayment->ViewValue !== null) { // Load from cache
                $this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ModeofPayment->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->ModeofPayment->EditValue = $arwrk;
            }
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
            if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
                $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
                $this->Amount->OldValue = $this->Amount->EditValue;
            }

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = $this->PatID->CurrentValue;
            $this->PatID->EditValue = FormatNumber($this->PatID->EditValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // VisiteType
            $this->VisiteType->EditAttrs["class"] = "form-control";
            $this->VisiteType->EditCustomAttributes = "";
            if (!$this->VisiteType->Raw) {
                $this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
            }
            $this->VisiteType->EditValue = HtmlEncode($this->VisiteType->CurrentValue);
            $this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

            // VisitDate
            $this->VisitDate->EditAttrs["class"] = "form-control";
            $this->VisitDate->EditCustomAttributes = "";
            $this->VisitDate->EditValue = HtmlEncode(FormatDateTime($this->VisitDate->CurrentValue, 8));
            $this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

            // AdvanceNo
            $this->AdvanceNo->EditAttrs["class"] = "form-control";
            $this->AdvanceNo->EditCustomAttributes = "";
            if (!$this->AdvanceNo->Raw) {
                $this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
            }
            $this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->CurrentValue);
            $this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            if (!$this->Status->Raw) {
                $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
            }
            $this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // AdvanceValidityDate
            $this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
            $this->AdvanceValidityDate->EditCustomAttributes = "";
            $this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8));
            $this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
            $this->TotalRemainingAdvance->EditCustomAttributes = "";
            if (!$this->TotalRemainingAdvance->Raw) {
                $this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
            }
            $this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->CurrentValue);
            $this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // SeectPaymentMode
            $this->SeectPaymentMode->EditAttrs["class"] = "form-control";
            $this->SeectPaymentMode->EditCustomAttributes = "";
            if (!$this->SeectPaymentMode->Raw) {
                $this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
            }
            $this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->CurrentValue);
            $this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            if (!$this->PaidAmount->Raw) {
                $this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
            }
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // HospID

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $curVal = trim(strval($this->Reception->CurrentValue));
            if ($curVal != "") {
                $this->Reception->EditValue = $this->Reception->lookupCacheOption($curVal);
                if ($this->Reception->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                        $this->Reception->EditValue = $this->Reception->displayValue($arwrk);
                    } else {
                        $this->Reception->EditValue = $this->Reception->CurrentValue;
                    }
                }
            } else {
                $this->Reception->EditValue = null;
            }
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";
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
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->Mobile->Required) {
            if (!$this->Mobile->IsDetailKey && EmptyValue($this->Mobile->FormValue)) {
                $this->Mobile->addErrorMessage(str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
            }
        }
        if ($this->voucher_type->Required) {
            if (!$this->voucher_type->IsDetailKey && EmptyValue($this->voucher_type->FormValue)) {
                $this->voucher_type->addErrorMessage(str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
            }
        }
        if ($this->Details->Required) {
            if (!$this->Details->IsDetailKey && EmptyValue($this->Details->FormValue)) {
                $this->Details->addErrorMessage(str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
            }
        }
        if ($this->ModeofPayment->Required) {
            if (!$this->ModeofPayment->IsDetailKey && EmptyValue($this->ModeofPayment->FormValue)) {
                $this->ModeofPayment->addErrorMessage(str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
            }
        }
        if ($this->Amount->Required) {
            if (!$this->Amount->IsDetailKey && EmptyValue($this->Amount->FormValue)) {
                $this->Amount->addErrorMessage(str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Amount->FormValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if ($this->AnyDues->Required) {
            if (!$this->AnyDues->IsDetailKey && EmptyValue($this->AnyDues->FormValue)) {
                $this->AnyDues->addErrorMessage(str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->VisiteType->Required) {
            if (!$this->VisiteType->IsDetailKey && EmptyValue($this->VisiteType->FormValue)) {
                $this->VisiteType->addErrorMessage(str_replace("%s", $this->VisiteType->caption(), $this->VisiteType->RequiredErrorMessage));
            }
        }
        if ($this->VisitDate->Required) {
            if (!$this->VisitDate->IsDetailKey && EmptyValue($this->VisitDate->FormValue)) {
                $this->VisitDate->addErrorMessage(str_replace("%s", $this->VisitDate->caption(), $this->VisitDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->VisitDate->FormValue)) {
            $this->VisitDate->addErrorMessage($this->VisitDate->getErrorMessage(false));
        }
        if ($this->AdvanceNo->Required) {
            if (!$this->AdvanceNo->IsDetailKey && EmptyValue($this->AdvanceNo->FormValue)) {
                $this->AdvanceNo->addErrorMessage(str_replace("%s", $this->AdvanceNo->caption(), $this->AdvanceNo->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->Date->Required) {
            if (!$this->Date->IsDetailKey && EmptyValue($this->Date->FormValue)) {
                $this->Date->addErrorMessage(str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Date->FormValue)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
        }
        if ($this->AdvanceValidityDate->Required) {
            if (!$this->AdvanceValidityDate->IsDetailKey && EmptyValue($this->AdvanceValidityDate->FormValue)) {
                $this->AdvanceValidityDate->addErrorMessage(str_replace("%s", $this->AdvanceValidityDate->caption(), $this->AdvanceValidityDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->AdvanceValidityDate->FormValue)) {
            $this->AdvanceValidityDate->addErrorMessage($this->AdvanceValidityDate->getErrorMessage(false));
        }
        if ($this->TotalRemainingAdvance->Required) {
            if (!$this->TotalRemainingAdvance->IsDetailKey && EmptyValue($this->TotalRemainingAdvance->FormValue)) {
                $this->TotalRemainingAdvance->addErrorMessage(str_replace("%s", $this->TotalRemainingAdvance->caption(), $this->TotalRemainingAdvance->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->SeectPaymentMode->Required) {
            if (!$this->SeectPaymentMode->IsDetailKey && EmptyValue($this->SeectPaymentMode->FormValue)) {
                $this->SeectPaymentMode->addErrorMessage(str_replace("%s", $this->SeectPaymentMode->caption(), $this->SeectPaymentMode->RequiredErrorMessage));
            }
        }
        if ($this->PaidAmount->Required) {
            if (!$this->PaidAmount->IsDetailKey && EmptyValue($this->PaidAmount->FormValue)) {
                $this->PaidAmount->addErrorMessage(str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
            }
        }
        if ($this->Currency->Required) {
            if (!$this->Currency->IsDetailKey && EmptyValue($this->Currency->FormValue)) {
                $this->Currency->addErrorMessage(str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
            }
        }
        if ($this->CardNumber->Required) {
            if (!$this->CardNumber->IsDetailKey && EmptyValue($this->CardNumber->FormValue)) {
                $this->CardNumber->addErrorMessage(str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
            }
        }
        if ($this->BankName->Required) {
            if (!$this->BankName->IsDetailKey && EmptyValue($this->BankName->FormValue)) {
                $this->BankName->addErrorMessage(str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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

            // Name
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // Mobile
            $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, $this->Mobile->ReadOnly);

            // voucher_type
            $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, $this->voucher_type->ReadOnly);

            // Details
            $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, $this->Details->ReadOnly);

            // ModeofPayment
            $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, $this->ModeofPayment->ReadOnly);

            // Amount
            $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, $this->Amount->ReadOnly);

            // AnyDues
            $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, $this->AnyDues->ReadOnly);

            // createdby
            $this->createdby->CurrentValue = CurrentUserID();
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

            // createddatetime
            $this->createddatetime->CurrentValue = CurrentDateTime();
            $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserID();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // PatientID
            $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, $this->PatientID->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // VisiteType
            $this->VisiteType->setDbValueDef($rsnew, $this->VisiteType->CurrentValue, null, $this->VisiteType->ReadOnly);

            // VisitDate
            $this->VisitDate->setDbValueDef($rsnew, UnFormatDateTime($this->VisitDate->CurrentValue, 0), null, $this->VisitDate->ReadOnly);

            // AdvanceNo
            $this->AdvanceNo->setDbValueDef($rsnew, $this->AdvanceNo->CurrentValue, null, $this->AdvanceNo->ReadOnly);

            // Status
            $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, $this->Status->ReadOnly);

            // Date
            $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), null, $this->Date->ReadOnly);

            // AdvanceValidityDate
            $this->AdvanceValidityDate->setDbValueDef($rsnew, UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0), null, $this->AdvanceValidityDate->ReadOnly);

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->setDbValueDef($rsnew, $this->TotalRemainingAdvance->CurrentValue, null, $this->TotalRemainingAdvance->ReadOnly);

            // Remarks
            $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, $this->Remarks->ReadOnly);

            // SeectPaymentMode
            $this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, null, $this->SeectPaymentMode->ReadOnly);

            // PaidAmount
            $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, $this->PaidAmount->ReadOnly);

            // Currency
            $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, $this->Currency->ReadOnly);

            // CardNumber
            $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, $this->CardNumber->ReadOnly);

            // BankName
            $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, $this->BankName->ReadOnly);

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
            $this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
            $this->Reception->CurrentValue = $this->Reception->getSessionValue();
            $this->PatID->CurrentValue = $this->PatID->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // voucher_type
        $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, false);

        // Details
        $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // AnyDues
        $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserID();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // modifiedby
        $this->modifiedby->CurrentValue = CurrentUserID();
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

        // modifieddatetime
        $this->modifieddatetime->CurrentValue = CurrentDateTime();
        $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // VisiteType
        $this->VisiteType->setDbValueDef($rsnew, $this->VisiteType->CurrentValue, null, false);

        // VisitDate
        $this->VisitDate->setDbValueDef($rsnew, UnFormatDateTime($this->VisitDate->CurrentValue, 0), null, false);

        // AdvanceNo
        $this->AdvanceNo->setDbValueDef($rsnew, $this->AdvanceNo->CurrentValue, null, false);

        // Status
        $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, false);

        // Date
        $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), null, false);

        // AdvanceValidityDate
        $this->AdvanceValidityDate->setDbValueDef($rsnew, UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0), null, false);

        // TotalRemainingAdvance
        $this->TotalRemainingAdvance->setDbValueDef($rsnew, $this->TotalRemainingAdvance->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // SeectPaymentMode
        $this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, null, false);

        // PaidAmount
        $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, false);

        // Currency
        $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, false);

        // CardNumber
        $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, false);

        // BankName
        $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

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
            $this->mrnno->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->Reception->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->PatID->Visible = false;
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
                case "x_ModeofPayment":
                    break;
                case "x_Reception":
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
