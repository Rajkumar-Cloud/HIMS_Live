<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreGrnGrid extends StoreGrn
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_grn';

    // Page object name
    public $PageObjName = "StoreGrnGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fstore_grngrid";
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

        // Table object (store_grn)
        if (!isset($GLOBALS["store_grn"]) || get_class($GLOBALS["store_grn"]) == PROJECT_NAMESPACE . "store_grn") {
            $GLOBALS["store_grn"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "StoreGrnAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_grn');
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
                $doc = new $class(Container("store_grn"));
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
            $this->PharmacyID->Visible = false;
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
    public $DisplayRecords = 8;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "5,8,10,20,40,60,100,500,1000,-1"; // Page sizes (comma separated)
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
        $this->GRNNO->setVisibility();
        $this->DT->setVisibility();
        $this->YM->Visible = false;
        $this->PC->Visible = false;
        $this->Customercode->Visible = false;
        $this->Customername->setVisibility();
        $this->pharmacy_pocol->Visible = false;
        $this->Address1->Visible = false;
        $this->Address2->Visible = false;
        $this->Address3->Visible = false;
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->Visible = false;
        $this->EEmail->Visible = false;
        $this->HospID->Visible = false;
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->BILLNO->setVisibility();
        $this->BILLDT->setVisibility();
        $this->BRCODE->Visible = false;
        $this->PharmacyID->Visible = false;
        $this->BillTotalValue->setVisibility();
        $this->GRNTotalValue->setVisibility();
        $this->BillDiscount->setVisibility();
        $this->BillUpload->Visible = false;
        $this->TransPort->Visible = false;
        $this->AnyOther->Visible = false;
        $this->Remarks->Visible = false;
        $this->GrnValue->setVisibility();
        $this->Pid->setVisibility();
        $this->PaymentNo->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->PaidAmount->setVisibility();
        $this->StoreID->setVisibility();
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
        $this->setupLookupOptions($this->PC);
        $this->setupLookupOptions($this->BRCODE);

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
            $this->DisplayRecords = 8; // Load default
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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "store_payment") {
            $masterTbl = Container("store_payment");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("StorePaymentList"); // Return to master page
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
                    $this->DisplayRecords = 8; // Non-numeric, load default
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
        $this->BillTotalValue->FormValue = ""; // Clear form value
        $this->GRNTotalValue->FormValue = ""; // Clear form value
        $this->BillDiscount->FormValue = ""; // Clear form value
        $this->GrnValue->FormValue = ""; // Clear form value
        $this->PaidAmount->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_GRNNO") && $CurrentForm->hasValue("o_GRNNO") && $this->GRNNO->CurrentValue != $this->GRNNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DT") && $CurrentForm->hasValue("o_DT") && $this->DT->CurrentValue != $this->DT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Customername") && $CurrentForm->hasValue("o_Customername") && $this->Customername->CurrentValue != $this->Customername->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_State") && $CurrentForm->hasValue("o_State") && $this->State->CurrentValue != $this->State->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Pincode") && $CurrentForm->hasValue("o_Pincode") && $this->Pincode->CurrentValue != $this->Pincode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Phone") && $CurrentForm->hasValue("o_Phone") && $this->Phone->CurrentValue != $this->Phone->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BILLNO") && $CurrentForm->hasValue("o_BILLNO") && $this->BILLNO->CurrentValue != $this->BILLNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BILLDT") && $CurrentForm->hasValue("o_BILLDT") && $this->BILLDT->CurrentValue != $this->BILLDT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillTotalValue") && $CurrentForm->hasValue("o_BillTotalValue") && $this->BillTotalValue->CurrentValue != $this->BillTotalValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GRNTotalValue") && $CurrentForm->hasValue("o_GRNTotalValue") && $this->GRNTotalValue->CurrentValue != $this->GRNTotalValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillDiscount") && $CurrentForm->hasValue("o_BillDiscount") && $this->BillDiscount->CurrentValue != $this->BillDiscount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GrnValue") && $CurrentForm->hasValue("o_GrnValue") && $this->GrnValue->CurrentValue != $this->GrnValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Pid") && $CurrentForm->hasValue("o_Pid") && $this->Pid->CurrentValue != $this->Pid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaymentNo") && $CurrentForm->hasValue("o_PaymentNo") && $this->PaymentNo->CurrentValue != $this->PaymentNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaymentStatus") && $CurrentForm->hasValue("o_PaymentStatus") && $this->PaymentStatus->CurrentValue != $this->PaymentStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaidAmount") && $CurrentForm->hasValue("o_PaidAmount") && $this->PaidAmount->CurrentValue != $this->PaidAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_StoreID") && $CurrentForm->hasValue("o_StoreID") && $this->StoreID->CurrentValue != $this->StoreID->OldValue) {
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
        $this->GRNNO->clearErrorMessage();
        $this->DT->clearErrorMessage();
        $this->Customername->clearErrorMessage();
        $this->State->clearErrorMessage();
        $this->Pincode->clearErrorMessage();
        $this->Phone->clearErrorMessage();
        $this->BILLNO->clearErrorMessage();
        $this->BILLDT->clearErrorMessage();
        $this->BillTotalValue->clearErrorMessage();
        $this->GRNTotalValue->clearErrorMessage();
        $this->BillDiscount->clearErrorMessage();
        $this->GrnValue->clearErrorMessage();
        $this->Pid->clearErrorMessage();
        $this->PaymentNo->clearErrorMessage();
        $this->PaymentStatus->clearErrorMessage();
        $this->PaidAmount->clearErrorMessage();
        $this->StoreID->clearErrorMessage();
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
                        $this->Pid->setSessionValue("");
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
        $links = "";
        $btngrps = "";
        $sqlwrk = "`grnid`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_view_store_grn"
        if ($this->DetailPages && $this->DetailPages["view_store_grn"] && $this->DetailPages["view_store_grn"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_view_store_grn"];
            $url = "ViewStoreGrnPreview?t=store_grn&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"view_store_grn\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'store_grn')) {
                $label = $Language->TablePhrase("view_store_grn", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"view_store_grn\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("ViewStoreGrnList?" . Config("TABLE_SHOW_MASTER") . "=store_grn&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("view_store_grn", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("ViewStoreGrnGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
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
        $this->GRNNO->CurrentValue = null;
        $this->GRNNO->OldValue = $this->GRNNO->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->YM->CurrentValue = null;
        $this->YM->OldValue = $this->YM->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->Customercode->CurrentValue = null;
        $this->Customercode->OldValue = $this->Customercode->CurrentValue;
        $this->Customername->CurrentValue = null;
        $this->Customername->OldValue = $this->Customername->CurrentValue;
        $this->pharmacy_pocol->CurrentValue = null;
        $this->pharmacy_pocol->OldValue = $this->pharmacy_pocol->CurrentValue;
        $this->Address1->CurrentValue = null;
        $this->Address1->OldValue = $this->Address1->CurrentValue;
        $this->Address2->CurrentValue = null;
        $this->Address2->OldValue = $this->Address2->CurrentValue;
        $this->Address3->CurrentValue = null;
        $this->Address3->OldValue = $this->Address3->CurrentValue;
        $this->State->CurrentValue = null;
        $this->State->OldValue = $this->State->CurrentValue;
        $this->Pincode->CurrentValue = null;
        $this->Pincode->OldValue = $this->Pincode->CurrentValue;
        $this->Phone->CurrentValue = null;
        $this->Phone->OldValue = $this->Phone->CurrentValue;
        $this->Fax->CurrentValue = null;
        $this->Fax->OldValue = $this->Fax->CurrentValue;
        $this->EEmail->CurrentValue = null;
        $this->EEmail->OldValue = $this->EEmail->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->BILLNO->CurrentValue = null;
        $this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
        $this->BILLDT->CurrentValue = null;
        $this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->PharmacyID->CurrentValue = null;
        $this->PharmacyID->OldValue = $this->PharmacyID->CurrentValue;
        $this->BillTotalValue->CurrentValue = 0.00;
        $this->BillTotalValue->OldValue = $this->BillTotalValue->CurrentValue;
        $this->GRNTotalValue->CurrentValue = 0.00;
        $this->GRNTotalValue->OldValue = $this->GRNTotalValue->CurrentValue;
        $this->BillDiscount->CurrentValue = 0.00;
        $this->BillDiscount->OldValue = $this->BillDiscount->CurrentValue;
        $this->BillUpload->Upload->DbValue = null;
        $this->BillUpload->OldValue = $this->BillUpload->Upload->DbValue;
        $this->BillUpload->Upload->Index = $this->RowIndex;
        $this->TransPort->CurrentValue = 0.00;
        $this->TransPort->OldValue = $this->TransPort->CurrentValue;
        $this->AnyOther->CurrentValue = 0.00;
        $this->AnyOther->OldValue = $this->AnyOther->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->GrnValue->CurrentValue = null;
        $this->GrnValue->OldValue = $this->GrnValue->CurrentValue;
        $this->Pid->CurrentValue = null;
        $this->Pid->OldValue = $this->Pid->CurrentValue;
        $this->PaymentNo->CurrentValue = null;
        $this->PaymentNo->OldValue = $this->PaymentNo->CurrentValue;
        $this->PaymentStatus->CurrentValue = null;
        $this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
        $this->PaidAmount->CurrentValue = null;
        $this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
        $this->StoreID->CurrentValue = null;
        $this->StoreID->OldValue = $this->StoreID->CurrentValue;
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

        // Check field name 'GRNNO' first before field var 'x_GRNNO'
        $val = $CurrentForm->hasValue("GRNNO") ? $CurrentForm->getValue("GRNNO") : $CurrentForm->getValue("x_GRNNO");
        if (!$this->GRNNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRNNO->Visible = false; // Disable update for API request
            } else {
                $this->GRNNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GRNNO")) {
            $this->GRNNO->setOldValue($CurrentForm->getValue("o_GRNNO"));
        }

        // Check field name 'DT' first before field var 'x_DT'
        $val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
        if (!$this->DT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DT->Visible = false; // Disable update for API request
            } else {
                $this->DT->setFormValue($val);
            }
            $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_DT")) {
            $this->DT->setOldValue($CurrentForm->getValue("o_DT"));
        }

        // Check field name 'Customername' first before field var 'x_Customername'
        $val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
        if (!$this->Customername->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customername->Visible = false; // Disable update for API request
            } else {
                $this->Customername->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Customername")) {
            $this->Customername->setOldValue($CurrentForm->getValue("o_Customername"));
        }

        // Check field name 'State' first before field var 'x_State'
        $val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
        if (!$this->State->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State->Visible = false; // Disable update for API request
            } else {
                $this->State->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_State")) {
            $this->State->setOldValue($CurrentForm->getValue("o_State"));
        }

        // Check field name 'Pincode' first before field var 'x_Pincode'
        $val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
        if (!$this->Pincode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pincode->Visible = false; // Disable update for API request
            } else {
                $this->Pincode->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Pincode")) {
            $this->Pincode->setOldValue($CurrentForm->getValue("o_Pincode"));
        }

        // Check field name 'Phone' first before field var 'x_Phone'
        $val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
        if (!$this->Phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Phone->Visible = false; // Disable update for API request
            } else {
                $this->Phone->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Phone")) {
            $this->Phone->setOldValue($CurrentForm->getValue("o_Phone"));
        }

        // Check field name 'BILLNO' first before field var 'x_BILLNO'
        $val = $CurrentForm->hasValue("BILLNO") ? $CurrentForm->getValue("BILLNO") : $CurrentForm->getValue("x_BILLNO");
        if (!$this->BILLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLNO->Visible = false; // Disable update for API request
            } else {
                $this->BILLNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BILLNO")) {
            $this->BILLNO->setOldValue($CurrentForm->getValue("o_BILLNO"));
        }

        // Check field name 'BILLDT' first before field var 'x_BILLDT'
        $val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
        if (!$this->BILLDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLDT->Visible = false; // Disable update for API request
            } else {
                $this->BILLDT->setFormValue($val);
            }
            $this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_BILLDT")) {
            $this->BILLDT->setOldValue($CurrentForm->getValue("o_BILLDT"));
        }

        // Check field name 'BillTotalValue' first before field var 'x_BillTotalValue'
        $val = $CurrentForm->hasValue("BillTotalValue") ? $CurrentForm->getValue("BillTotalValue") : $CurrentForm->getValue("x_BillTotalValue");
        if (!$this->BillTotalValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillTotalValue->Visible = false; // Disable update for API request
            } else {
                $this->BillTotalValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BillTotalValue")) {
            $this->BillTotalValue->setOldValue($CurrentForm->getValue("o_BillTotalValue"));
        }

        // Check field name 'GRNTotalValue' first before field var 'x_GRNTotalValue'
        $val = $CurrentForm->hasValue("GRNTotalValue") ? $CurrentForm->getValue("GRNTotalValue") : $CurrentForm->getValue("x_GRNTotalValue");
        if (!$this->GRNTotalValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRNTotalValue->Visible = false; // Disable update for API request
            } else {
                $this->GRNTotalValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GRNTotalValue")) {
            $this->GRNTotalValue->setOldValue($CurrentForm->getValue("o_GRNTotalValue"));
        }

        // Check field name 'BillDiscount' first before field var 'x_BillDiscount'
        $val = $CurrentForm->hasValue("BillDiscount") ? $CurrentForm->getValue("BillDiscount") : $CurrentForm->getValue("x_BillDiscount");
        if (!$this->BillDiscount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillDiscount->Visible = false; // Disable update for API request
            } else {
                $this->BillDiscount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BillDiscount")) {
            $this->BillDiscount->setOldValue($CurrentForm->getValue("o_BillDiscount"));
        }

        // Check field name 'GrnValue' first before field var 'x_GrnValue'
        $val = $CurrentForm->hasValue("GrnValue") ? $CurrentForm->getValue("GrnValue") : $CurrentForm->getValue("x_GrnValue");
        if (!$this->GrnValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GrnValue->Visible = false; // Disable update for API request
            } else {
                $this->GrnValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GrnValue")) {
            $this->GrnValue->setOldValue($CurrentForm->getValue("o_GrnValue"));
        }

        // Check field name 'Pid' first before field var 'x_Pid'
        $val = $CurrentForm->hasValue("Pid") ? $CurrentForm->getValue("Pid") : $CurrentForm->getValue("x_Pid");
        if (!$this->Pid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pid->Visible = false; // Disable update for API request
            } else {
                $this->Pid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Pid")) {
            $this->Pid->setOldValue($CurrentForm->getValue("o_Pid"));
        }

        // Check field name 'PaymentNo' first before field var 'x_PaymentNo'
        $val = $CurrentForm->hasValue("PaymentNo") ? $CurrentForm->getValue("PaymentNo") : $CurrentForm->getValue("x_PaymentNo");
        if (!$this->PaymentNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentNo->Visible = false; // Disable update for API request
            } else {
                $this->PaymentNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PaymentNo")) {
            $this->PaymentNo->setOldValue($CurrentForm->getValue("o_PaymentNo"));
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

        // Check field name 'StoreID' first before field var 'x_StoreID'
        $val = $CurrentForm->hasValue("StoreID") ? $CurrentForm->getValue("StoreID") : $CurrentForm->getValue("x_StoreID");
        if (!$this->StoreID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StoreID->Visible = false; // Disable update for API request
            } else {
                $this->StoreID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_StoreID")) {
            $this->StoreID->setOldValue($CurrentForm->getValue("o_StoreID"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->GRNNO->CurrentValue = $this->GRNNO->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        $this->Customername->CurrentValue = $this->Customername->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Pincode->CurrentValue = $this->Pincode->FormValue;
        $this->Phone->CurrentValue = $this->Phone->FormValue;
        $this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
        $this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
        $this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
        $this->BillTotalValue->CurrentValue = $this->BillTotalValue->FormValue;
        $this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->FormValue;
        $this->BillDiscount->CurrentValue = $this->BillDiscount->FormValue;
        $this->GrnValue->CurrentValue = $this->GrnValue->FormValue;
        $this->Pid->CurrentValue = $this->Pid->FormValue;
        $this->PaymentNo->CurrentValue = $this->PaymentNo->FormValue;
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
        $this->StoreID->CurrentValue = $this->StoreID->FormValue;
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
        $this->GRNNO->setDbValue($row['GRNNO']);
        $this->DT->setDbValue($row['DT']);
        $this->YM->setDbValue($row['YM']);
        $this->PC->setDbValue($row['PC']);
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->EEmail->setDbValue($row['EEmail']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PharmacyID->setDbValue($row['PharmacyID']);
        $this->BillTotalValue->setDbValue($row['BillTotalValue']);
        $this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
        $this->BillDiscount->setDbValue($row['BillDiscount']);
        $this->BillUpload->Upload->DbValue = $row['BillUpload'];
        $this->BillUpload->setDbValue($this->BillUpload->Upload->DbValue);
        $this->BillUpload->Upload->Index = $this->RowIndex;
        $this->TransPort->setDbValue($row['TransPort']);
        $this->AnyOther->setDbValue($row['AnyOther']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->GrnValue->setDbValue($row['GrnValue']);
        $this->Pid->setDbValue($row['Pid']);
        $this->PaymentNo->setDbValue($row['PaymentNo']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->StoreID->setDbValue($row['StoreID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['GRNNO'] = $this->GRNNO->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['YM'] = $this->YM->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['Customercode'] = $this->Customercode->CurrentValue;
        $row['Customername'] = $this->Customername->CurrentValue;
        $row['pharmacy_pocol'] = $this->pharmacy_pocol->CurrentValue;
        $row['Address1'] = $this->Address1->CurrentValue;
        $row['Address2'] = $this->Address2->CurrentValue;
        $row['Address3'] = $this->Address3->CurrentValue;
        $row['State'] = $this->State->CurrentValue;
        $row['Pincode'] = $this->Pincode->CurrentValue;
        $row['Phone'] = $this->Phone->CurrentValue;
        $row['Fax'] = $this->Fax->CurrentValue;
        $row['EEmail'] = $this->EEmail->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['BILLNO'] = $this->BILLNO->CurrentValue;
        $row['BILLDT'] = $this->BILLDT->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['PharmacyID'] = $this->PharmacyID->CurrentValue;
        $row['BillTotalValue'] = $this->BillTotalValue->CurrentValue;
        $row['GRNTotalValue'] = $this->GRNTotalValue->CurrentValue;
        $row['BillDiscount'] = $this->BillDiscount->CurrentValue;
        $row['BillUpload'] = $this->BillUpload->Upload->DbValue;
        $row['TransPort'] = $this->TransPort->CurrentValue;
        $row['AnyOther'] = $this->AnyOther->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['GrnValue'] = $this->GrnValue->CurrentValue;
        $row['Pid'] = $this->Pid->CurrentValue;
        $row['PaymentNo'] = $this->PaymentNo->CurrentValue;
        $row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
        $row['PaidAmount'] = $this->PaidAmount->CurrentValue;
        $row['StoreID'] = $this->StoreID->CurrentValue;
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
        if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue))) {
            $this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue))) {
            $this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue))) {
            $this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GrnValue->FormValue == $this->GrnValue->CurrentValue && is_numeric(ConvertToFloatString($this->GrnValue->CurrentValue))) {
            $this->GrnValue->CurrentValue = ConvertToFloatString($this->GrnValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PaidAmount->FormValue == $this->PaidAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PaidAmount->CurrentValue))) {
            $this->PaidAmount->CurrentValue = ConvertToFloatString($this->PaidAmount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // GRNNO

        // DT

        // YM

        // PC

        // Customercode

        // Customername

        // pharmacy_pocol

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // EEmail

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BILLNO

        // BILLDT

        // BRCODE

        // PharmacyID

        // BillTotalValue

        // GRNTotalValue

        // BillDiscount

        // BillUpload

        // TransPort

        // AnyOther

        // Remarks

        // GrnValue

        // Pid

        // PaymentNo

        // PaymentStatus

        // PaidAmount

        // StoreID

        // Accumulate aggregate value
        if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
            if (is_numeric($this->BillTotalValue->CurrentValue)) {
                $this->BillTotalValue->Total += $this->BillTotalValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->GRNTotalValue->CurrentValue)) {
                $this->GRNTotalValue->Total += $this->GRNTotalValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->BillDiscount->CurrentValue)) {
                $this->BillDiscount->Total += $this->BillDiscount->CurrentValue; // Accumulate total
            }
        }
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
            $this->GRNNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // PC
            $curVal = trim(strval($this->PC->CurrentValue));
            if ($curVal != "") {
                $this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
                if ($this->PC->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PC->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PC->Lookup->renderViewRow($rswrk[0]);
                        $this->PC->ViewValue = $this->PC->displayValue($arwrk);
                    } else {
                        $this->PC->ViewValue = $this->PC->CurrentValue;
                    }
                }
            } else {
                $this->PC->ViewValue = null;
            }
            $this->PC->ViewCustomAttributes = "";

            // Customercode
            $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
            $this->Customercode->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
            $this->pharmacy_pocol->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // EEmail
            $this->EEmail->ViewValue = $this->EEmail->CurrentValue;
            $this->EEmail->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

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

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
            $this->BILLDT->ViewCustomAttributes = "";

            // BRCODE
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`id`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
                    }
                }
            } else {
                $this->BRCODE->ViewValue = null;
            }
            $this->BRCODE->ViewCustomAttributes = "";

            // PharmacyID
            $this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
            $this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
            $this->PharmacyID->ViewCustomAttributes = "";

            // BillTotalValue
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";

            // GRNTotalValue
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";

            // BillDiscount
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";

            // TransPort
            $this->TransPort->ViewValue = $this->TransPort->CurrentValue;
            $this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
            $this->TransPort->ViewCustomAttributes = "";

            // AnyOther
            $this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
            $this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
            $this->AnyOther->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // GrnValue
            $this->GrnValue->ViewValue = $this->GrnValue->CurrentValue;
            $this->GrnValue->ViewValue = FormatNumber($this->GrnValue->ViewValue, 2, -2, -2, -2);
            $this->GrnValue->ViewCustomAttributes = "";

            // Pid
            $this->Pid->ViewValue = $this->Pid->CurrentValue;
            $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
            $this->Pid->ViewCustomAttributes = "";

            // PaymentNo
            $this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
            $this->PaymentNo->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewValue = FormatNumber($this->PaidAmount->ViewValue, 2, -2, -2, -2);
            $this->PaidAmount->ViewCustomAttributes = "";

            // StoreID
            $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
            $this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
            $this->StoreID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";
            $this->GRNNO->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";
            $this->BillTotalValue->TooltipValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";
            $this->GRNTotalValue->TooltipValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";
            $this->BillDiscount->TooltipValue = "";

            // GrnValue
            $this->GrnValue->LinkCustomAttributes = "";
            $this->GrnValue->HrefValue = "";
            $this->GrnValue->TooltipValue = "";

            // Pid
            $this->Pid->LinkCustomAttributes = "";
            $this->Pid->HrefValue = "";
            $this->Pid->TooltipValue = "";

            // PaymentNo
            $this->PaymentNo->LinkCustomAttributes = "";
            $this->PaymentNo->HrefValue = "";
            $this->PaymentNo->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // GRNNO
            $this->GRNNO->EditAttrs["class"] = "form-control";
            $this->GRNNO->EditCustomAttributes = "";
            if (!$this->GRNNO->Raw) {
                $this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
            }
            $this->GRNNO->EditValue = HtmlEncode($this->GRNNO->CurrentValue);
            $this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Pincode
            $this->Pincode->EditAttrs["class"] = "form-control";
            $this->Pincode->EditCustomAttributes = "";
            if (!$this->Pincode->Raw) {
                $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
            }
            $this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
            $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

            // Phone
            $this->Phone->EditAttrs["class"] = "form-control";
            $this->Phone->EditCustomAttributes = "";
            if (!$this->Phone->Raw) {
                $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
            }
            $this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
            $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            $this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

            // BillTotalValue
            $this->BillTotalValue->EditAttrs["class"] = "form-control";
            $this->BillTotalValue->EditCustomAttributes = "";
            $this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
            $this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
            if (strval($this->BillTotalValue->EditValue) != "" && is_numeric($this->BillTotalValue->EditValue)) {
                $this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
                $this->BillTotalValue->OldValue = $this->BillTotalValue->EditValue;
            }

            // GRNTotalValue
            $this->GRNTotalValue->EditAttrs["class"] = "form-control";
            $this->GRNTotalValue->EditCustomAttributes = "";
            $this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
            $this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
            if (strval($this->GRNTotalValue->EditValue) != "" && is_numeric($this->GRNTotalValue->EditValue)) {
                $this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
                $this->GRNTotalValue->OldValue = $this->GRNTotalValue->EditValue;
            }

            // BillDiscount
            $this->BillDiscount->EditAttrs["class"] = "form-control";
            $this->BillDiscount->EditCustomAttributes = "";
            $this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
            $this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
            if (strval($this->BillDiscount->EditValue) != "" && is_numeric($this->BillDiscount->EditValue)) {
                $this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
                $this->BillDiscount->OldValue = $this->BillDiscount->EditValue;
            }

            // GrnValue
            $this->GrnValue->EditAttrs["class"] = "form-control";
            $this->GrnValue->EditCustomAttributes = "";
            $this->GrnValue->EditValue = HtmlEncode($this->GrnValue->CurrentValue);
            $this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
            if (strval($this->GrnValue->EditValue) != "" && is_numeric($this->GrnValue->EditValue)) {
                $this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);
                $this->GrnValue->OldValue = $this->GrnValue->EditValue;
            }

            // Pid
            $this->Pid->EditAttrs["class"] = "form-control";
            $this->Pid->EditCustomAttributes = "";
            if ($this->Pid->getSessionValue() != "") {
                $this->Pid->CurrentValue = GetForeignKeyValue($this->Pid->getSessionValue());
                $this->Pid->OldValue = $this->Pid->CurrentValue;
                $this->Pid->ViewValue = $this->Pid->CurrentValue;
                $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
                $this->Pid->ViewCustomAttributes = "";
            } else {
                $this->Pid->EditValue = HtmlEncode($this->Pid->CurrentValue);
                $this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
            }

            // PaymentNo
            $this->PaymentNo->EditAttrs["class"] = "form-control";
            $this->PaymentNo->EditCustomAttributes = "";
            if (!$this->PaymentNo->Raw) {
                $this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
            }
            $this->PaymentNo->EditValue = HtmlEncode($this->PaymentNo->CurrentValue);
            $this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            if (!$this->PaymentStatus->Raw) {
                $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
            }
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
            if (strval($this->PaidAmount->EditValue) != "" && is_numeric($this->PaidAmount->EditValue)) {
                $this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);
                $this->PaidAmount->OldValue = $this->PaidAmount->EditValue;
            }

            // StoreID
            $this->StoreID->EditAttrs["class"] = "form-control";
            $this->StoreID->EditCustomAttributes = "";
            $this->StoreID->EditValue = HtmlEncode($this->StoreID->CurrentValue);
            $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";

            // GrnValue
            $this->GrnValue->LinkCustomAttributes = "";
            $this->GrnValue->HrefValue = "";

            // Pid
            $this->Pid->LinkCustomAttributes = "";
            $this->Pid->HrefValue = "";

            // PaymentNo
            $this->PaymentNo->LinkCustomAttributes = "";
            $this->PaymentNo->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->EditAttrs["class"] = "form-control";
            $this->GRNNO->EditCustomAttributes = "";
            if (!$this->GRNNO->Raw) {
                $this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
            }
            $this->GRNNO->EditValue = HtmlEncode($this->GRNNO->CurrentValue);
            $this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Pincode
            $this->Pincode->EditAttrs["class"] = "form-control";
            $this->Pincode->EditCustomAttributes = "";
            if (!$this->Pincode->Raw) {
                $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
            }
            $this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
            $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

            // Phone
            $this->Phone->EditAttrs["class"] = "form-control";
            $this->Phone->EditCustomAttributes = "";
            if (!$this->Phone->Raw) {
                $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
            }
            $this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
            $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            $this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

            // BillTotalValue
            $this->BillTotalValue->EditAttrs["class"] = "form-control";
            $this->BillTotalValue->EditCustomAttributes = "";
            $this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
            $this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
            if (strval($this->BillTotalValue->EditValue) != "" && is_numeric($this->BillTotalValue->EditValue)) {
                $this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
                $this->BillTotalValue->OldValue = $this->BillTotalValue->EditValue;
            }

            // GRNTotalValue
            $this->GRNTotalValue->EditAttrs["class"] = "form-control";
            $this->GRNTotalValue->EditCustomAttributes = "";
            $this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
            $this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
            if (strval($this->GRNTotalValue->EditValue) != "" && is_numeric($this->GRNTotalValue->EditValue)) {
                $this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
                $this->GRNTotalValue->OldValue = $this->GRNTotalValue->EditValue;
            }

            // BillDiscount
            $this->BillDiscount->EditAttrs["class"] = "form-control";
            $this->BillDiscount->EditCustomAttributes = "";
            $this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
            $this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
            if (strval($this->BillDiscount->EditValue) != "" && is_numeric($this->BillDiscount->EditValue)) {
                $this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
                $this->BillDiscount->OldValue = $this->BillDiscount->EditValue;
            }

            // GrnValue
            $this->GrnValue->EditAttrs["class"] = "form-control";
            $this->GrnValue->EditCustomAttributes = "";
            $this->GrnValue->EditValue = HtmlEncode($this->GrnValue->CurrentValue);
            $this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
            if (strval($this->GrnValue->EditValue) != "" && is_numeric($this->GrnValue->EditValue)) {
                $this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);
                $this->GrnValue->OldValue = $this->GrnValue->EditValue;
            }

            // Pid
            $this->Pid->EditAttrs["class"] = "form-control";
            $this->Pid->EditCustomAttributes = "";
            if ($this->Pid->getSessionValue() != "") {
                $this->Pid->CurrentValue = GetForeignKeyValue($this->Pid->getSessionValue());
                $this->Pid->OldValue = $this->Pid->CurrentValue;
                $this->Pid->ViewValue = $this->Pid->CurrentValue;
                $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
                $this->Pid->ViewCustomAttributes = "";
            } else {
                $this->Pid->EditValue = HtmlEncode($this->Pid->CurrentValue);
                $this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
            }

            // PaymentNo
            $this->PaymentNo->EditAttrs["class"] = "form-control";
            $this->PaymentNo->EditCustomAttributes = "";
            if (!$this->PaymentNo->Raw) {
                $this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
            }
            $this->PaymentNo->EditValue = HtmlEncode($this->PaymentNo->CurrentValue);
            $this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            if (!$this->PaymentStatus->Raw) {
                $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
            }
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
            if (strval($this->PaidAmount->EditValue) != "" && is_numeric($this->PaidAmount->EditValue)) {
                $this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);
                $this->PaidAmount->OldValue = $this->PaidAmount->EditValue;
            }

            // StoreID
            $this->StoreID->EditAttrs["class"] = "form-control";
            $this->StoreID->EditCustomAttributes = "";
            $this->StoreID->EditValue = HtmlEncode($this->StoreID->CurrentValue);
            $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";

            // GrnValue
            $this->GrnValue->LinkCustomAttributes = "";
            $this->GrnValue->HrefValue = "";

            // Pid
            $this->Pid->LinkCustomAttributes = "";
            $this->Pid->HrefValue = "";

            // PaymentNo
            $this->PaymentNo->LinkCustomAttributes = "";
            $this->PaymentNo->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
                    $this->BillTotalValue->Total = 0; // Initialize total
                    $this->GRNTotalValue->Total = 0; // Initialize total
                    $this->BillDiscount->Total = 0; // Initialize total
        } elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
            $this->BillTotalValue->CurrentValue = $this->BillTotalValue->Total;
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";
            $this->BillTotalValue->HrefValue = ""; // Clear href value
            $this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->Total;
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = ""; // Clear href value
            $this->BillDiscount->CurrentValue = $this->BillDiscount->Total;
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";
            $this->BillDiscount->HrefValue = ""; // Clear href value
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
        if ($this->GRNNO->Required) {
            if (!$this->GRNNO->IsDetailKey && EmptyValue($this->GRNNO->FormValue)) {
                $this->GRNNO->addErrorMessage(str_replace("%s", $this->GRNNO->caption(), $this->GRNNO->RequiredErrorMessage));
            }
        }
        if ($this->DT->Required) {
            if (!$this->DT->IsDetailKey && EmptyValue($this->DT->FormValue)) {
                $this->DT->addErrorMessage(str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DT->FormValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if ($this->Customername->Required) {
            if (!$this->Customername->IsDetailKey && EmptyValue($this->Customername->FormValue)) {
                $this->Customername->addErrorMessage(str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
            }
        }
        if ($this->State->Required) {
            if (!$this->State->IsDetailKey && EmptyValue($this->State->FormValue)) {
                $this->State->addErrorMessage(str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
            }
        }
        if ($this->Pincode->Required) {
            if (!$this->Pincode->IsDetailKey && EmptyValue($this->Pincode->FormValue)) {
                $this->Pincode->addErrorMessage(str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
            }
        }
        if ($this->Phone->Required) {
            if (!$this->Phone->IsDetailKey && EmptyValue($this->Phone->FormValue)) {
                $this->Phone->addErrorMessage(str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
            }
        }
        if ($this->BILLNO->Required) {
            if (!$this->BILLNO->IsDetailKey && EmptyValue($this->BILLNO->FormValue)) {
                $this->BILLNO->addErrorMessage(str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
            }
        }
        if ($this->BILLDT->Required) {
            if (!$this->BILLDT->IsDetailKey && EmptyValue($this->BILLDT->FormValue)) {
                $this->BILLDT->addErrorMessage(str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BILLDT->FormValue)) {
            $this->BILLDT->addErrorMessage($this->BILLDT->getErrorMessage(false));
        }
        if ($this->BillTotalValue->Required) {
            if (!$this->BillTotalValue->IsDetailKey && EmptyValue($this->BillTotalValue->FormValue)) {
                $this->BillTotalValue->addErrorMessage(str_replace("%s", $this->BillTotalValue->caption(), $this->BillTotalValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillTotalValue->FormValue)) {
            $this->BillTotalValue->addErrorMessage($this->BillTotalValue->getErrorMessage(false));
        }
        if ($this->GRNTotalValue->Required) {
            if (!$this->GRNTotalValue->IsDetailKey && EmptyValue($this->GRNTotalValue->FormValue)) {
                $this->GRNTotalValue->addErrorMessage(str_replace("%s", $this->GRNTotalValue->caption(), $this->GRNTotalValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GRNTotalValue->FormValue)) {
            $this->GRNTotalValue->addErrorMessage($this->GRNTotalValue->getErrorMessage(false));
        }
        if ($this->BillDiscount->Required) {
            if (!$this->BillDiscount->IsDetailKey && EmptyValue($this->BillDiscount->FormValue)) {
                $this->BillDiscount->addErrorMessage(str_replace("%s", $this->BillDiscount->caption(), $this->BillDiscount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillDiscount->FormValue)) {
            $this->BillDiscount->addErrorMessage($this->BillDiscount->getErrorMessage(false));
        }
        if ($this->GrnValue->Required) {
            if (!$this->GrnValue->IsDetailKey && EmptyValue($this->GrnValue->FormValue)) {
                $this->GrnValue->addErrorMessage(str_replace("%s", $this->GrnValue->caption(), $this->GrnValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GrnValue->FormValue)) {
            $this->GrnValue->addErrorMessage($this->GrnValue->getErrorMessage(false));
        }
        if ($this->Pid->Required) {
            if (!$this->Pid->IsDetailKey && EmptyValue($this->Pid->FormValue)) {
                $this->Pid->addErrorMessage(str_replace("%s", $this->Pid->caption(), $this->Pid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Pid->FormValue)) {
            $this->Pid->addErrorMessage($this->Pid->getErrorMessage(false));
        }
        if ($this->PaymentNo->Required) {
            if (!$this->PaymentNo->IsDetailKey && EmptyValue($this->PaymentNo->FormValue)) {
                $this->PaymentNo->addErrorMessage(str_replace("%s", $this->PaymentNo->caption(), $this->PaymentNo->RequiredErrorMessage));
            }
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if ($this->PaidAmount->Required) {
            if (!$this->PaidAmount->IsDetailKey && EmptyValue($this->PaidAmount->FormValue)) {
                $this->PaidAmount->addErrorMessage(str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PaidAmount->FormValue)) {
            $this->PaidAmount->addErrorMessage($this->PaidAmount->getErrorMessage(false));
        }
        if ($this->StoreID->Required) {
            if (!$this->StoreID->IsDetailKey && EmptyValue($this->StoreID->FormValue)) {
                $this->StoreID->addErrorMessage(str_replace("%s", $this->StoreID->caption(), $this->StoreID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->StoreID->FormValue)) {
            $this->StoreID->addErrorMessage($this->StoreID->getErrorMessage(false));
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
        if ($this->BILLNO->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`BILLNO` = '" . AdjustSql($this->BILLNO->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->BILLNO->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->BILLNO->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                $rsChk->closeCursor();
                return false;
            }
        }
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

            // GRNNO
            $this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, null, $this->GRNNO->ReadOnly);

            // DT
            $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), null, $this->DT->ReadOnly);

            // Customername
            $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, $this->Customername->ReadOnly);

            // State
            $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, $this->State->ReadOnly);

            // Pincode
            $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, $this->Pincode->ReadOnly);

            // Phone
            $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, $this->Phone->ReadOnly);

            // BILLNO
            $this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, null, $this->BILLNO->ReadOnly);

            // BILLDT
            $this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), null, $this->BILLDT->ReadOnly);

            // BillTotalValue
            $this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, null, $this->BillTotalValue->ReadOnly);

            // GRNTotalValue
            $this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, null, $this->GRNTotalValue->ReadOnly);

            // BillDiscount
            $this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, null, $this->BillDiscount->ReadOnly);

            // GrnValue
            $this->GrnValue->setDbValueDef($rsnew, $this->GrnValue->CurrentValue, null, $this->GrnValue->ReadOnly);

            // Pid
            if ($this->Pid->getSessionValue() != "") {
                $this->Pid->ReadOnly = true;
            }
            $this->Pid->setDbValueDef($rsnew, $this->Pid->CurrentValue, null, $this->Pid->ReadOnly);

            // PaymentNo
            $this->PaymentNo->setDbValueDef($rsnew, $this->PaymentNo->CurrentValue, null, $this->PaymentNo->ReadOnly);

            // PaymentStatus
            $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, $this->PaymentStatus->ReadOnly);

            // PaidAmount
            $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, $this->PaidAmount->ReadOnly);

            // StoreID
            $this->StoreID->setDbValueDef($rsnew, $this->StoreID->CurrentValue, null, $this->StoreID->ReadOnly);

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
        if ($this->getCurrentMasterTable() == "store_payment") {
            $this->Pid->CurrentValue = $this->Pid->getSessionValue();
        }
        if ($this->BILLNO->CurrentValue != "") { // Check field with unique index
            $filter = "(`BILLNO` = '" . AdjustSql($this->BILLNO->CurrentValue, $this->Dbid) . "')";
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $idxErrMsg = str_replace("%f", $this->BILLNO->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->BILLNO->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                return false;
            }
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // GRNNO
        $this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, null, false);

        // DT
        $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), null, false);

        // Customername
        $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, false);

        // State
        $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, false);

        // Pincode
        $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, false);

        // Phone
        $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, false);

        // BILLNO
        $this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, null, false);

        // BILLDT
        $this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), null, false);

        // BillTotalValue
        $this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, null, false);

        // GRNTotalValue
        $this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, null, false);

        // BillDiscount
        $this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, null, false);

        // GrnValue
        $this->GrnValue->setDbValueDef($rsnew, $this->GrnValue->CurrentValue, null, false);

        // Pid
        $this->Pid->setDbValueDef($rsnew, $this->Pid->CurrentValue, null, false);

        // PaymentNo
        $this->PaymentNo->setDbValueDef($rsnew, $this->PaymentNo->CurrentValue, null, false);

        // PaymentStatus
        $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, false);

        // PaidAmount
        $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, false);

        // StoreID
        $this->StoreID->setDbValueDef($rsnew, $this->StoreID->CurrentValue, null, false);

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
        if ($masterTblVar == "store_payment") {
            $masterTbl = Container("store_payment");
            $this->Pid->Visible = false;
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
                case "x_PC":
                    break;
                case "x_BRCODE":
                    $lookupFilter = function () {
                        return "`id`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
