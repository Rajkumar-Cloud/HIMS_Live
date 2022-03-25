<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacytransferGrid extends ViewPharmacytransfer
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacytransfer';

    // Page object name
    public $PageObjName = "ViewPharmacytransferGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_pharmacytransfergrid";
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

        // Table object (view_pharmacytransfer)
        if (!isset($GLOBALS["view_pharmacytransfer"]) || get_class($GLOBALS["view_pharmacytransfer"]) == PROJECT_NAMESPACE . "view_pharmacytransfer") {
            $GLOBALS["view_pharmacytransfer"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "ViewPharmacytransferAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacytransfer');
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
                $doc = new $class(Container("view_pharmacytransfer"));
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
        if ($this->isAddOrEdit()) {
            $this->ORDNO->Visible = false;
        }
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->HospID->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grncreatedby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grncreatedDateTime->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grnModifiedby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grnModifiedDateTime->Visible = false;
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
        $this->ORDNO->setVisibility();
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->QTY->Visible = false;
        $this->DT->Visible = false;
        $this->PC->Visible = false;
        $this->YM->Visible = false;
        $this->Stock->Visible = false;
        $this->Printcheck->Visible = false;
        $this->id->Visible = false;
        $this->grnid->Visible = false;
        $this->poid->Visible = false;
        $this->LastMonthSale->setVisibility();
        $this->PrName->setVisibility();
        $this->GrnQuantity->Visible = false;
        $this->Quantity->setVisibility();
        $this->FreeQty->Visible = false;
        $this->BatchNo->setVisibility();
        $this->ExpDate->setVisibility();
        $this->HSN->Visible = false;
        $this->MFRCODE->Visible = false;
        $this->PUnit->Visible = false;
        $this->SUnit->Visible = false;
        $this->MRP->setVisibility();
        $this->PurValue->Visible = false;
        $this->Disc->Visible = false;
        $this->PSGST->Visible = false;
        $this->PCGST->Visible = false;
        $this->PTax->Visible = false;
        $this->ItemValue->setVisibility();
        $this->SalTax->Visible = false;
        $this->PurRate->Visible = false;
        $this->SalRate->Visible = false;
        $this->Discount->Visible = false;
        $this->SSGST->Visible = false;
        $this->SCGST->Visible = false;
        $this->Pack->Visible = false;
        $this->GrnMRP->Visible = false;
        $this->trid->setVisibility();
        $this->HospID->setVisibility();
        $this->CreatedBy->Visible = false;
        $this->CreatedDateTime->Visible = false;
        $this->ModifiedBy->Visible = false;
        $this->ModifiedDateTime->Visible = false;
        $this->grncreatedby->setVisibility();
        $this->grncreatedDateTime->setVisibility();
        $this->grnModifiedby->setVisibility();
        $this->grnModifiedDateTime->setVisibility();
        $this->Received->Visible = false;
        $this->BillDate->setVisibility();
        $this->CurStock->setVisibility();
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
        $this->setupLookupOptions($this->ORDNO);
        $this->setupLookupOptions($this->BRCODE);
        $this->setupLookupOptions($this->LastMonthSale);

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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
            $masterTbl = Container("pharmacy_billing_transfer");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("PharmacyBillingTransferList"); // Return to master page
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
        $this->MRP->FormValue = ""; // Clear form value
        $this->ItemValue->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_BRCODE") && $CurrentForm->hasValue("o_BRCODE") && $this->BRCODE->CurrentValue != $this->BRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue != $this->PRC->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LastMonthSale") && $CurrentForm->hasValue("o_LastMonthSale") && $this->LastMonthSale->CurrentValue != $this->LastMonthSale->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrName") && $CurrentForm->hasValue("o_PrName") && $this->PrName->CurrentValue != $this->PrName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue != $this->Quantity->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BatchNo") && $CurrentForm->hasValue("o_BatchNo") && $this->BatchNo->CurrentValue != $this->BatchNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ExpDate") && $CurrentForm->hasValue("o_ExpDate") && $this->ExpDate->CurrentValue != $this->ExpDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MRP") && $CurrentForm->hasValue("o_MRP") && $this->MRP->CurrentValue != $this->MRP->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ItemValue") && $CurrentForm->hasValue("o_ItemValue") && $this->ItemValue->CurrentValue != $this->ItemValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_trid") && $CurrentForm->hasValue("o_trid") && $this->trid->CurrentValue != $this->trid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillDate") && $CurrentForm->hasValue("o_BillDate") && $this->BillDate->CurrentValue != $this->BillDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CurStock") && $CurrentForm->hasValue("o_CurStock") && $this->CurStock->CurrentValue != $this->CurStock->OldValue) {
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
        $this->ORDNO->clearErrorMessage();
        $this->BRCODE->clearErrorMessage();
        $this->PRC->clearErrorMessage();
        $this->LastMonthSale->clearErrorMessage();
        $this->PrName->clearErrorMessage();
        $this->Quantity->clearErrorMessage();
        $this->BatchNo->clearErrorMessage();
        $this->ExpDate->clearErrorMessage();
        $this->MRP->clearErrorMessage();
        $this->ItemValue->clearErrorMessage();
        $this->trid->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->grncreatedby->clearErrorMessage();
        $this->grncreatedDateTime->clearErrorMessage();
        $this->grnModifiedby->clearErrorMessage();
        $this->grnModifiedDateTime->clearErrorMessage();
        $this->BillDate->clearErrorMessage();
        $this->CurStock->clearErrorMessage();
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
                        $this->trid->setSessionValue("");
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
        $this->ORDNO->CurrentValue = null;
        $this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->QTY->CurrentValue = null;
        $this->QTY->OldValue = $this->QTY->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->YM->CurrentValue = null;
        $this->YM->OldValue = $this->YM->CurrentValue;
        $this->Stock->CurrentValue = null;
        $this->Stock->OldValue = $this->Stock->CurrentValue;
        $this->Printcheck->CurrentValue = null;
        $this->Printcheck->OldValue = $this->Printcheck->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->grnid->CurrentValue = null;
        $this->grnid->OldValue = $this->grnid->CurrentValue;
        $this->poid->CurrentValue = null;
        $this->poid->OldValue = $this->poid->CurrentValue;
        $this->LastMonthSale->CurrentValue = null;
        $this->LastMonthSale->OldValue = $this->LastMonthSale->CurrentValue;
        $this->PrName->CurrentValue = null;
        $this->PrName->OldValue = $this->PrName->CurrentValue;
        $this->GrnQuantity->CurrentValue = null;
        $this->GrnQuantity->OldValue = $this->GrnQuantity->CurrentValue;
        $this->Quantity->CurrentValue = null;
        $this->Quantity->OldValue = $this->Quantity->CurrentValue;
        $this->FreeQty->CurrentValue = null;
        $this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
        $this->BatchNo->CurrentValue = null;
        $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
        $this->ExpDate->CurrentValue = null;
        $this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
        $this->HSN->CurrentValue = null;
        $this->HSN->OldValue = $this->HSN->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->PUnit->CurrentValue = 0;
        $this->PUnit->OldValue = $this->PUnit->CurrentValue;
        $this->SUnit->CurrentValue = 0;
        $this->SUnit->OldValue = $this->SUnit->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->PurValue->CurrentValue = null;
        $this->PurValue->OldValue = $this->PurValue->CurrentValue;
        $this->Disc->CurrentValue = null;
        $this->Disc->OldValue = $this->Disc->CurrentValue;
        $this->PSGST->CurrentValue = null;
        $this->PSGST->OldValue = $this->PSGST->CurrentValue;
        $this->PCGST->CurrentValue = null;
        $this->PCGST->OldValue = $this->PCGST->CurrentValue;
        $this->PTax->CurrentValue = null;
        $this->PTax->OldValue = $this->PTax->CurrentValue;
        $this->ItemValue->CurrentValue = null;
        $this->ItemValue->OldValue = $this->ItemValue->CurrentValue;
        $this->SalTax->CurrentValue = null;
        $this->SalTax->OldValue = $this->SalTax->CurrentValue;
        $this->PurRate->CurrentValue = null;
        $this->PurRate->OldValue = $this->PurRate->CurrentValue;
        $this->SalRate->CurrentValue = null;
        $this->SalRate->OldValue = $this->SalRate->CurrentValue;
        $this->Discount->CurrentValue = null;
        $this->Discount->OldValue = $this->Discount->CurrentValue;
        $this->SSGST->CurrentValue = null;
        $this->SSGST->OldValue = $this->SSGST->CurrentValue;
        $this->SCGST->CurrentValue = null;
        $this->SCGST->OldValue = $this->SCGST->CurrentValue;
        $this->Pack->CurrentValue = null;
        $this->Pack->OldValue = $this->Pack->CurrentValue;
        $this->GrnMRP->CurrentValue = null;
        $this->GrnMRP->OldValue = $this->GrnMRP->CurrentValue;
        $this->trid->CurrentValue = null;
        $this->trid->OldValue = $this->trid->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->CreatedBy->CurrentValue = null;
        $this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
        $this->CreatedDateTime->CurrentValue = null;
        $this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
        $this->ModifiedBy->CurrentValue = null;
        $this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedDateTime->CurrentValue = null;
        $this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
        $this->grncreatedby->CurrentValue = null;
        $this->grncreatedby->OldValue = $this->grncreatedby->CurrentValue;
        $this->grncreatedDateTime->CurrentValue = null;
        $this->grncreatedDateTime->OldValue = $this->grncreatedDateTime->CurrentValue;
        $this->grnModifiedby->CurrentValue = null;
        $this->grnModifiedby->OldValue = $this->grnModifiedby->CurrentValue;
        $this->grnModifiedDateTime->CurrentValue = null;
        $this->grnModifiedDateTime->OldValue = $this->grnModifiedDateTime->CurrentValue;
        $this->Received->CurrentValue = null;
        $this->Received->OldValue = $this->Received->CurrentValue;
        $this->BillDate->CurrentValue = null;
        $this->BillDate->OldValue = $this->BillDate->CurrentValue;
        $this->CurStock->CurrentValue = null;
        $this->CurStock->OldValue = $this->CurStock->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $CurrentForm->FormName = $this->FormName;

        // Check field name 'ORDNO' first before field var 'x_ORDNO'
        $val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
        if (!$this->ORDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ORDNO->Visible = false; // Disable update for API request
            } else {
                $this->ORDNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ORDNO")) {
            $this->ORDNO->setOldValue($CurrentForm->getValue("o_ORDNO"));
        }

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BRCODE")) {
            $this->BRCODE->setOldValue($CurrentForm->getValue("o_BRCODE"));
        }

        // Check field name 'PRC' first before field var 'x_PRC'
        $val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
        if (!$this->PRC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRC->Visible = false; // Disable update for API request
            } else {
                $this->PRC->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PRC")) {
            $this->PRC->setOldValue($CurrentForm->getValue("o_PRC"));
        }

        // Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
        $val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
        if (!$this->LastMonthSale->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LastMonthSale->Visible = false; // Disable update for API request
            } else {
                $this->LastMonthSale->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LastMonthSale")) {
            $this->LastMonthSale->setOldValue($CurrentForm->getValue("o_LastMonthSale"));
        }

        // Check field name 'PrName' first before field var 'x_PrName'
        $val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
        if (!$this->PrName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrName->Visible = false; // Disable update for API request
            } else {
                $this->PrName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PrName")) {
            $this->PrName->setOldValue($CurrentForm->getValue("o_PrName"));
        }

        // Check field name 'Quantity' first before field var 'x_Quantity'
        $val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
        if (!$this->Quantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Quantity->Visible = false; // Disable update for API request
            } else {
                $this->Quantity->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Quantity")) {
            $this->Quantity->setOldValue($CurrentForm->getValue("o_Quantity"));
        }

        // Check field name 'BatchNo' first before field var 'x_BatchNo'
        $val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
        if (!$this->BatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchNo->Visible = false; // Disable update for API request
            } else {
                $this->BatchNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BatchNo")) {
            $this->BatchNo->setOldValue($CurrentForm->getValue("o_BatchNo"));
        }

        // Check field name 'ExpDate' first before field var 'x_ExpDate'
        $val = $CurrentForm->hasValue("ExpDate") ? $CurrentForm->getValue("ExpDate") : $CurrentForm->getValue("x_ExpDate");
        if (!$this->ExpDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpDate->Visible = false; // Disable update for API request
            } else {
                $this->ExpDate->setFormValue($val);
            }
            $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_ExpDate")) {
            $this->ExpDate->setOldValue($CurrentForm->getValue("o_ExpDate"));
        }

        // Check field name 'MRP' first before field var 'x_MRP'
        $val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
        if (!$this->MRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRP->Visible = false; // Disable update for API request
            } else {
                $this->MRP->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MRP")) {
            $this->MRP->setOldValue($CurrentForm->getValue("o_MRP"));
        }

        // Check field name 'ItemValue' first before field var 'x_ItemValue'
        $val = $CurrentForm->hasValue("ItemValue") ? $CurrentForm->getValue("ItemValue") : $CurrentForm->getValue("x_ItemValue");
        if (!$this->ItemValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ItemValue->Visible = false; // Disable update for API request
            } else {
                $this->ItemValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ItemValue")) {
            $this->ItemValue->setOldValue($CurrentForm->getValue("o_ItemValue"));
        }

        // Check field name 'trid' first before field var 'x_trid'
        $val = $CurrentForm->hasValue("trid") ? $CurrentForm->getValue("trid") : $CurrentForm->getValue("x_trid");
        if (!$this->trid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->trid->Visible = false; // Disable update for API request
            } else {
                $this->trid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_trid")) {
            $this->trid->setOldValue($CurrentForm->getValue("o_trid"));
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

        // Check field name 'grncreatedby' first before field var 'x_grncreatedby'
        $val = $CurrentForm->hasValue("grncreatedby") ? $CurrentForm->getValue("grncreatedby") : $CurrentForm->getValue("x_grncreatedby");
        if (!$this->grncreatedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grncreatedby->Visible = false; // Disable update for API request
            } else {
                $this->grncreatedby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_grncreatedby")) {
            $this->grncreatedby->setOldValue($CurrentForm->getValue("o_grncreatedby"));
        }

        // Check field name 'grncreatedDateTime' first before field var 'x_grncreatedDateTime'
        $val = $CurrentForm->hasValue("grncreatedDateTime") ? $CurrentForm->getValue("grncreatedDateTime") : $CurrentForm->getValue("x_grncreatedDateTime");
        if (!$this->grncreatedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grncreatedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->grncreatedDateTime->setFormValue($val);
            }
            $this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_grncreatedDateTime")) {
            $this->grncreatedDateTime->setOldValue($CurrentForm->getValue("o_grncreatedDateTime"));
        }

        // Check field name 'grnModifiedby' first before field var 'x_grnModifiedby'
        $val = $CurrentForm->hasValue("grnModifiedby") ? $CurrentForm->getValue("grnModifiedby") : $CurrentForm->getValue("x_grnModifiedby");
        if (!$this->grnModifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnModifiedby->Visible = false; // Disable update for API request
            } else {
                $this->grnModifiedby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_grnModifiedby")) {
            $this->grnModifiedby->setOldValue($CurrentForm->getValue("o_grnModifiedby"));
        }

        // Check field name 'grnModifiedDateTime' first before field var 'x_grnModifiedDateTime'
        $val = $CurrentForm->hasValue("grnModifiedDateTime") ? $CurrentForm->getValue("grnModifiedDateTime") : $CurrentForm->getValue("x_grnModifiedDateTime");
        if (!$this->grnModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->grnModifiedDateTime->setFormValue($val);
            }
            $this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_grnModifiedDateTime")) {
            $this->grnModifiedDateTime->setOldValue($CurrentForm->getValue("o_grnModifiedDateTime"));
        }

        // Check field name 'BillDate' first before field var 'x_BillDate'
        $val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
        if (!$this->BillDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillDate->Visible = false; // Disable update for API request
            } else {
                $this->BillDate->setFormValue($val);
            }
            $this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_BillDate")) {
            $this->BillDate->setOldValue($CurrentForm->getValue("o_BillDate"));
        }

        // Check field name 'CurStock' first before field var 'x_CurStock'
        $val = $CurrentForm->hasValue("CurStock") ? $CurrentForm->getValue("CurStock") : $CurrentForm->getValue("x_CurStock");
        if (!$this->CurStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CurStock->Visible = false; // Disable update for API request
            } else {
                $this->CurStock->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CurStock")) {
            $this->CurStock->setOldValue($CurrentForm->getValue("o_CurStock"));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
        $this->PrName->CurrentValue = $this->PrName->FormValue;
        $this->Quantity->CurrentValue = $this->Quantity->FormValue;
        $this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
        $this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
        $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->ItemValue->CurrentValue = $this->ItemValue->FormValue;
        $this->trid->CurrentValue = $this->trid->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->grncreatedby->CurrentValue = $this->grncreatedby->FormValue;
        $this->grncreatedDateTime->CurrentValue = $this->grncreatedDateTime->FormValue;
        $this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
        $this->grnModifiedby->CurrentValue = $this->grnModifiedby->FormValue;
        $this->grnModifiedDateTime->CurrentValue = $this->grnModifiedDateTime->FormValue;
        $this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
        $this->BillDate->CurrentValue = $this->BillDate->FormValue;
        $this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
        $this->CurStock->CurrentValue = $this->CurStock->FormValue;
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
        $this->ORDNO->setDbValue($row['ORDNO']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PRC->setDbValue($row['PRC']);
        $this->QTY->setDbValue($row['QTY']);
        $this->DT->setDbValue($row['DT']);
        $this->PC->setDbValue($row['PC']);
        $this->YM->setDbValue($row['YM']);
        $this->Stock->setDbValue($row['Stock']);
        $this->Printcheck->setDbValue($row['Printcheck']);
        $this->id->setDbValue($row['id']);
        $this->grnid->setDbValue($row['grnid']);
        $this->poid->setDbValue($row['poid']);
        $this->LastMonthSale->setDbValue($row['LastMonthSale']);
        $this->PrName->setDbValue($row['PrName']);
        $this->GrnQuantity->setDbValue($row['GrnQuantity']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->FreeQty->setDbValue($row['FreeQty']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->ExpDate->setDbValue($row['ExpDate']);
        $this->HSN->setDbValue($row['HSN']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->MRP->setDbValue($row['MRP']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->Disc->setDbValue($row['Disc']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->PTax->setDbValue($row['PTax']);
        $this->ItemValue->setDbValue($row['ItemValue']);
        $this->SalTax->setDbValue($row['SalTax']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->SalRate->setDbValue($row['SalRate']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->Pack->setDbValue($row['Pack']);
        $this->GrnMRP->setDbValue($row['GrnMRP']);
        $this->trid->setDbValue($row['trid']);
        $this->HospID->setDbValue($row['HospID']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->grncreatedby->setDbValue($row['grncreatedby']);
        $this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
        $this->grnModifiedby->setDbValue($row['grnModifiedby']);
        $this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
        $this->Received->setDbValue($row['Received']);
        $this->BillDate->setDbValue($row['BillDate']);
        $this->CurStock->setDbValue($row['CurStock']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ORDNO'] = $this->ORDNO->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['QTY'] = $this->QTY->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['YM'] = $this->YM->CurrentValue;
        $row['Stock'] = $this->Stock->CurrentValue;
        $row['Printcheck'] = $this->Printcheck->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['grnid'] = $this->grnid->CurrentValue;
        $row['poid'] = $this->poid->CurrentValue;
        $row['LastMonthSale'] = $this->LastMonthSale->CurrentValue;
        $row['PrName'] = $this->PrName->CurrentValue;
        $row['GrnQuantity'] = $this->GrnQuantity->CurrentValue;
        $row['Quantity'] = $this->Quantity->CurrentValue;
        $row['FreeQty'] = $this->FreeQty->CurrentValue;
        $row['BatchNo'] = $this->BatchNo->CurrentValue;
        $row['ExpDate'] = $this->ExpDate->CurrentValue;
        $row['HSN'] = $this->HSN->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['PUnit'] = $this->PUnit->CurrentValue;
        $row['SUnit'] = $this->SUnit->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['PurValue'] = $this->PurValue->CurrentValue;
        $row['Disc'] = $this->Disc->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['PTax'] = $this->PTax->CurrentValue;
        $row['ItemValue'] = $this->ItemValue->CurrentValue;
        $row['SalTax'] = $this->SalTax->CurrentValue;
        $row['PurRate'] = $this->PurRate->CurrentValue;
        $row['SalRate'] = $this->SalRate->CurrentValue;
        $row['Discount'] = $this->Discount->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['Pack'] = $this->Pack->CurrentValue;
        $row['GrnMRP'] = $this->GrnMRP->CurrentValue;
        $row['trid'] = $this->trid->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['CreatedBy'] = $this->CreatedBy->CurrentValue;
        $row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
        $row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
        $row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
        $row['grncreatedby'] = $this->grncreatedby->CurrentValue;
        $row['grncreatedDateTime'] = $this->grncreatedDateTime->CurrentValue;
        $row['grnModifiedby'] = $this->grnModifiedby->CurrentValue;
        $row['grnModifiedDateTime'] = $this->grnModifiedDateTime->CurrentValue;
        $row['Received'] = $this->Received->CurrentValue;
        $row['BillDate'] = $this->BillDate->CurrentValue;
        $row['CurStock'] = $this->CurStock->CurrentValue;
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
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue))) {
            $this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ORDNO

        // BRCODE

        // PRC

        // QTY

        // DT

        // PC

        // YM

        // Stock

        // Printcheck

        // id

        // grnid

        // poid

        // LastMonthSale

        // PrName

        // GrnQuantity

        // Quantity

        // FreeQty

        // BatchNo

        // ExpDate

        // HSN

        // MFRCODE

        // PUnit

        // SUnit

        // MRP

        // PurValue

        // Disc

        // PSGST

        // PCGST

        // PTax

        // ItemValue

        // SalTax

        // PurRate

        // SalRate

        // Discount

        // SSGST

        // SCGST

        // Pack

        // GrnMRP

        // trid

        // HospID

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // grncreatedby

        // grncreatedDateTime

        // grnModifiedby

        // grnModifiedDateTime

        // Received

        // BillDate

        // CurStock
        if ($this->RowType == ROWTYPE_VIEW) {
            // ORDNO
            $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
            $curVal = trim(strval($this->ORDNO->CurrentValue));
            if ($curVal != "") {
                $this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
                if ($this->ORDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ORDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ORDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
                    } else {
                        $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
                    }
                }
            } else {
                $this->ORDNO->ViewValue = null;
            }
            $this->ORDNO->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
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

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // QTY
            $this->QTY->ViewValue = $this->QTY->CurrentValue;
            $this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
            $this->QTY->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // Stock
            $this->Stock->ViewValue = $this->Stock->CurrentValue;
            $this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
            $this->Stock->ViewCustomAttributes = "";

            // Printcheck
            $this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
            $this->Printcheck->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // grnid
            $this->grnid->ViewValue = $this->grnid->CurrentValue;
            $this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
            $this->grnid->ViewCustomAttributes = "";

            // poid
            $this->poid->ViewValue = $this->poid->CurrentValue;
            $this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
            $this->poid->ViewCustomAttributes = "";

            // LastMonthSale
            $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
                    }
                }
            } else {
                $this->LastMonthSale->ViewValue = null;
            }
            $this->LastMonthSale->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // GrnQuantity
            $this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
            $this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
            $this->GrnQuantity->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // FreeQty
            $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
            $this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
            $this->FreeQty->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // ExpDate
            $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
            $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
            $this->ExpDate->ViewCustomAttributes = "";

            // HSN
            $this->HSN->ViewValue = $this->HSN->CurrentValue;
            $this->HSN->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // Disc
            $this->Disc->ViewValue = $this->Disc->CurrentValue;
            $this->Disc->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // PTax
            $this->PTax->ViewValue = $this->PTax->CurrentValue;
            $this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
            $this->PTax->ViewCustomAttributes = "";

            // ItemValue
            $this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
            $this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
            $this->ItemValue->ViewCustomAttributes = "";

            // SalTax
            $this->SalTax->ViewValue = $this->SalTax->CurrentValue;
            $this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
            $this->SalTax->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // SalRate
            $this->SalRate->ViewValue = $this->SalRate->CurrentValue;
            $this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
            $this->SalRate->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // Pack
            $this->Pack->ViewValue = $this->Pack->CurrentValue;
            $this->Pack->ViewCustomAttributes = "";

            // GrnMRP
            $this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
            $this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
            $this->GrnMRP->ViewCustomAttributes = "";

            // trid
            $this->trid->ViewValue = $this->trid->CurrentValue;
            $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
            $this->trid->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // grncreatedby
            $this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
            $this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
            $this->grncreatedby->ViewCustomAttributes = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
            $this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
            $this->grncreatedDateTime->ViewCustomAttributes = "";

            // grnModifiedby
            $this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
            $this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
            $this->grnModifiedby->ViewCustomAttributes = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
            $this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
            $this->grnModifiedDateTime->ViewCustomAttributes = "";

            // Received
            $this->Received->ViewValue = $this->Received->CurrentValue;
            $this->Received->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
            $this->BillDate->ViewCustomAttributes = "";

            // CurStock
            $this->CurStock->ViewValue = $this->CurStock->CurrentValue;
            $this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
            $this->CurStock->ViewCustomAttributes = "";

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";
            $this->ORDNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ORDNO->ViewValue = $this->highlightValue($this->ORDNO);
            }

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PRC->ViewValue = $this->highlightValue($this->PRC);
            }

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";
            $this->LastMonthSale->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PrName->ViewValue = $this->highlightValue($this->PrName);
            }

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BatchNo->ViewValue = $this->highlightValue($this->BatchNo);
            }

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";
            $this->ExpDate->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";
            $this->ItemValue->TooltipValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";
            $this->trid->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";
            $this->grncreatedby->TooltipValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";
            $this->grncreatedDateTime->TooltipValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";
            $this->grnModifiedby->TooltipValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";
            $this->grnModifiedDateTime->TooltipValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";
            $this->BillDate->TooltipValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
            $this->CurStock->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ORDNO

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
                    }
                }
            } else {
                $this->BRCODE->EditValue = null;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // LastMonthSale
            $this->LastMonthSale->EditAttrs["class"] = "form-control";
            $this->LastMonthSale->EditCustomAttributes = "";
            $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
                    }
                }
            } else {
                $this->LastMonthSale->EditValue = null;
            }
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
                $this->MRP->OldValue = $this->MRP->EditValue;
            }

            // ItemValue
            $this->ItemValue->EditAttrs["class"] = "form-control";
            $this->ItemValue->EditCustomAttributes = "";
            $this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
            $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
            if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue)) {
                $this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
                $this->ItemValue->OldValue = $this->ItemValue->EditValue;
            }

            // trid
            $this->trid->EditAttrs["class"] = "form-control";
            $this->trid->EditCustomAttributes = "";
            if ($this->trid->getSessionValue() != "") {
                $this->trid->CurrentValue = GetForeignKeyValue($this->trid->getSessionValue());
                $this->trid->OldValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
                $this->trid->ViewCustomAttributes = "";
            } else {
                $this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
                $this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
            }

            // HospID

            // grncreatedby

            // grncreatedDateTime

            // grnModifiedby

            // grnModifiedDateTime

            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // CurStock
            $this->CurStock->EditAttrs["class"] = "form-control";
            $this->CurStock->EditCustomAttributes = "";
            $this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
            $this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

            // Add refer script

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // ORDNO

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
                    }
                }
            } else {
                $this->BRCODE->EditValue = null;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // LastMonthSale
            $this->LastMonthSale->EditAttrs["class"] = "form-control";
            $this->LastMonthSale->EditCustomAttributes = "";
            $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
                    }
                }
            } else {
                $this->LastMonthSale->EditValue = null;
            }
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
                $this->MRP->OldValue = $this->MRP->EditValue;
            }

            // ItemValue
            $this->ItemValue->EditAttrs["class"] = "form-control";
            $this->ItemValue->EditCustomAttributes = "";
            $this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
            $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
            if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue)) {
                $this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
                $this->ItemValue->OldValue = $this->ItemValue->EditValue;
            }

            // trid
            $this->trid->EditAttrs["class"] = "form-control";
            $this->trid->EditCustomAttributes = "";
            if ($this->trid->getSessionValue() != "") {
                $this->trid->CurrentValue = GetForeignKeyValue($this->trid->getSessionValue());
                $this->trid->OldValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
                $this->trid->ViewCustomAttributes = "";
            } else {
                $this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
                $this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
            }

            // HospID

            // grncreatedby

            // grncreatedDateTime

            // grnModifiedby

            // grnModifiedDateTime

            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // CurStock
            $this->CurStock->EditAttrs["class"] = "form-control";
            $this->CurStock->EditCustomAttributes = "";
            $this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
            $this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

            // Edit refer script

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
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
        if ($this->ORDNO->Required) {
            if (!$this->ORDNO->IsDetailKey && EmptyValue($this->ORDNO->FormValue)) {
                $this->ORDNO->addErrorMessage(str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
            }
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BRCODE->FormValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->LastMonthSale->Required) {
            if (!$this->LastMonthSale->IsDetailKey && EmptyValue($this->LastMonthSale->FormValue)) {
                $this->LastMonthSale->addErrorMessage(str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->LastMonthSale->FormValue)) {
            $this->LastMonthSale->addErrorMessage($this->LastMonthSale->getErrorMessage(false));
        }
        if ($this->PrName->Required) {
            if (!$this->PrName->IsDetailKey && EmptyValue($this->PrName->FormValue)) {
                $this->PrName->addErrorMessage(str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
            }
        }
        if ($this->Quantity->Required) {
            if (!$this->Quantity->IsDetailKey && EmptyValue($this->Quantity->FormValue)) {
                $this->Quantity->addErrorMessage(str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Quantity->FormValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if ($this->BatchNo->Required) {
            if (!$this->BatchNo->IsDetailKey && EmptyValue($this->BatchNo->FormValue)) {
                $this->BatchNo->addErrorMessage(str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
            }
        }
        if ($this->ExpDate->Required) {
            if (!$this->ExpDate->IsDetailKey && EmptyValue($this->ExpDate->FormValue)) {
                $this->ExpDate->addErrorMessage(str_replace("%s", $this->ExpDate->caption(), $this->ExpDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ExpDate->FormValue)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->ItemValue->Required) {
            if (!$this->ItemValue->IsDetailKey && EmptyValue($this->ItemValue->FormValue)) {
                $this->ItemValue->addErrorMessage(str_replace("%s", $this->ItemValue->caption(), $this->ItemValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ItemValue->FormValue)) {
            $this->ItemValue->addErrorMessage($this->ItemValue->getErrorMessage(false));
        }
        if ($this->trid->Required) {
            if (!$this->trid->IsDetailKey && EmptyValue($this->trid->FormValue)) {
                $this->trid->addErrorMessage(str_replace("%s", $this->trid->caption(), $this->trid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->trid->FormValue)) {
            $this->trid->addErrorMessage($this->trid->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->grncreatedby->Required) {
            if (!$this->grncreatedby->IsDetailKey && EmptyValue($this->grncreatedby->FormValue)) {
                $this->grncreatedby->addErrorMessage(str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
            }
        }
        if ($this->grncreatedDateTime->Required) {
            if (!$this->grncreatedDateTime->IsDetailKey && EmptyValue($this->grncreatedDateTime->FormValue)) {
                $this->grncreatedDateTime->addErrorMessage(str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->grnModifiedby->Required) {
            if (!$this->grnModifiedby->IsDetailKey && EmptyValue($this->grnModifiedby->FormValue)) {
                $this->grnModifiedby->addErrorMessage(str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
            }
        }
        if ($this->grnModifiedDateTime->Required) {
            if (!$this->grnModifiedDateTime->IsDetailKey && EmptyValue($this->grnModifiedDateTime->FormValue)) {
                $this->grnModifiedDateTime->addErrorMessage(str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->BillDate->Required) {
            if (!$this->BillDate->IsDetailKey && EmptyValue($this->BillDate->FormValue)) {
                $this->BillDate->addErrorMessage(str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillDate->FormValue)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if ($this->CurStock->Required) {
            if (!$this->CurStock->IsDetailKey && EmptyValue($this->CurStock->FormValue)) {
                $this->CurStock->addErrorMessage(str_replace("%s", $this->CurStock->caption(), $this->CurStock->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CurStock->FormValue)) {
            $this->CurStock->addErrorMessage($this->CurStock->getErrorMessage(false));
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

            // ORDNO
            $this->ORDNO->CurrentValue = PharmacyID();
            $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null);

            // BRCODE
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, $this->BRCODE->ReadOnly);

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // LastMonthSale
            $this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, null, $this->LastMonthSale->ReadOnly);

            // PrName
            $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, $this->PrName->ReadOnly);

            // Quantity
            $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, $this->Quantity->ReadOnly);

            // BatchNo
            $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, $this->BatchNo->ReadOnly);

            // ExpDate
            $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), null, $this->ExpDate->ReadOnly);

            // MRP
            $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, $this->MRP->ReadOnly);

            // ItemValue
            $this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, null, $this->ItemValue->ReadOnly);

            // trid
            if ($this->trid->getSessionValue() != "") {
                $this->trid->ReadOnly = true;
            }
            $this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, null, $this->trid->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // grncreatedby
            $this->grncreatedby->CurrentValue = CurrentUserID();
            $this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, null);

            // grncreatedDateTime
            $this->grncreatedDateTime->CurrentValue = CurrentDateTime();
            $this->grncreatedDateTime->setDbValueDef($rsnew, $this->grncreatedDateTime->CurrentValue, null);

            // grnModifiedby
            $this->grnModifiedby->CurrentValue = CurrentUserID();
            $this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, null);

            // grnModifiedDateTime
            $this->grnModifiedDateTime->CurrentValue = CurrentDateTime();
            $this->grnModifiedDateTime->setDbValueDef($rsnew, $this->grnModifiedDateTime->CurrentValue, null);

            // BillDate
            $this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), null, $this->BillDate->ReadOnly);

            // CurStock
            $this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, null, $this->CurStock->ReadOnly);

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
        if ($this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
            $this->trid->CurrentValue = $this->trid->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // ORDNO
        $this->ORDNO->CurrentValue = PharmacyID();
        $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null);

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // LastMonthSale
        $this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, null, false);

        // PrName
        $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, false);

        // Quantity
        $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, false);

        // BatchNo
        $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, false);

        // ExpDate
        $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), null, false);

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, false);

        // ItemValue
        $this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, null, false);

        // trid
        $this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // grncreatedby
        $this->grncreatedby->CurrentValue = CurrentUserID();
        $this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, null);

        // grncreatedDateTime
        $this->grncreatedDateTime->CurrentValue = CurrentDateTime();
        $this->grncreatedDateTime->setDbValueDef($rsnew, $this->grncreatedDateTime->CurrentValue, null);

        // grnModifiedby
        $this->grnModifiedby->CurrentValue = CurrentUserID();
        $this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, null);

        // grnModifiedDateTime
        $this->grnModifiedDateTime->CurrentValue = CurrentDateTime();
        $this->grnModifiedDateTime->setDbValueDef($rsnew, $this->grnModifiedDateTime->CurrentValue, null);

        // BillDate
        $this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), null, false);

        // CurStock
        $this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, null, false);

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
        if ($masterTblVar == "pharmacy_billing_transfer") {
            $masterTbl = Container("pharmacy_billing_transfer");
            $this->trid->Visible = false;
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
                case "x_ORDNO":
                    break;
                case "x_BRCODE":
                    break;
                case "x_LastMonthSale":
                    $lookupFilter = function () {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
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
