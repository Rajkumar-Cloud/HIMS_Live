<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacyMovementItemGrid extends ViewPharmacyMovementItem
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacy_movement_item';

    // Page object name
    public $PageObjName = "ViewPharmacyMovementItemGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_pharmacy_movement_itemgrid";
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

        // Table object (view_pharmacy_movement_item)
        if (!isset($GLOBALS["view_pharmacy_movement_item"]) || get_class($GLOBALS["view_pharmacy_movement_item"]) == PROJECT_NAMESPACE . "view_pharmacy_movement_item") {
            $GLOBALS["view_pharmacy_movement_item"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "ViewPharmacyMovementItemAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_movement_item');
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
                $doc = new $class(Container("view_pharmacy_movement_item"));
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
        $this->ProductFrom->setVisibility();
        $this->Quantity->setVisibility();
        $this->FreeQty->setVisibility();
        $this->IQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->BRCODE->setVisibility();
        $this->OPNO->setVisibility();
        $this->IPNO->setVisibility();
        $this->PatientBILLNO->setVisibility();
        $this->BILLDT->setVisibility();
        $this->GRNNO->setVisibility();
        $this->DT->setVisibility();
        $this->Customername->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->BILLNO->setVisibility();
        $this->prc->setVisibility();
        $this->PrName->setVisibility();
        $this->BatchNo->setVisibility();
        $this->ExpDate->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->hsn->setVisibility();
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
        $this->setupLookupOptions($this->ProductFrom);
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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_pharmacy_movement") {
            $masterTbl = Container("view_pharmacy_movement");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewPharmacyMovementList"); // Return to master page
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
        if ($CurrentForm->hasValue("x_ProductFrom") && $CurrentForm->hasValue("o_ProductFrom") && $this->ProductFrom->CurrentValue != $this->ProductFrom->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue != $this->Quantity->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_FreeQty") && $CurrentForm->hasValue("o_FreeQty") && $this->FreeQty->CurrentValue != $this->FreeQty->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue != $this->IQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MRQ") && $CurrentForm->hasValue("o_MRQ") && $this->MRQ->CurrentValue != $this->MRQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BRCODE") && $CurrentForm->hasValue("o_BRCODE") && $this->BRCODE->CurrentValue != $this->BRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_OPNO") && $CurrentForm->hasValue("o_OPNO") && $this->OPNO->CurrentValue != $this->OPNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IPNO") && $CurrentForm->hasValue("o_IPNO") && $this->IPNO->CurrentValue != $this->IPNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientBILLNO") && $CurrentForm->hasValue("o_PatientBILLNO") && $this->PatientBILLNO->CurrentValue != $this->PatientBILLNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BILLDT") && $CurrentForm->hasValue("o_BILLDT") && $this->BILLDT->CurrentValue != $this->BILLDT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GRNNO") && $CurrentForm->hasValue("o_GRNNO") && $this->GRNNO->CurrentValue != $this->GRNNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DT") && $CurrentForm->hasValue("o_DT") && $this->DT->CurrentValue != $this->DT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Customername") && $CurrentForm->hasValue("o_Customername") && $this->Customername->CurrentValue != $this->Customername->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_createdby") && $CurrentForm->hasValue("o_createdby") && $this->createdby->CurrentValue != $this->createdby->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue != $this->createddatetime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_modifiedby") && $CurrentForm->hasValue("o_modifiedby") && $this->modifiedby->CurrentValue != $this->modifiedby->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_modifieddatetime") && $CurrentForm->hasValue("o_modifieddatetime") && $this->modifieddatetime->CurrentValue != $this->modifieddatetime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BILLNO") && $CurrentForm->hasValue("o_BILLNO") && $this->BILLNO->CurrentValue != $this->BILLNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_prc") && $CurrentForm->hasValue("o_prc") && $this->prc->CurrentValue != $this->prc->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrName") && $CurrentForm->hasValue("o_PrName") && $this->PrName->CurrentValue != $this->PrName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BatchNo") && $CurrentForm->hasValue("o_BatchNo") && $this->BatchNo->CurrentValue != $this->BatchNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ExpDate") && $CurrentForm->hasValue("o_ExpDate") && $this->ExpDate->CurrentValue != $this->ExpDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MFRCODE") && $CurrentForm->hasValue("o_MFRCODE") && $this->MFRCODE->CurrentValue != $this->MFRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_hsn") && $CurrentForm->hasValue("o_hsn") && $this->hsn->CurrentValue != $this->hsn->OldValue) {
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
        $this->ProductFrom->clearErrorMessage();
        $this->Quantity->clearErrorMessage();
        $this->FreeQty->clearErrorMessage();
        $this->IQ->clearErrorMessage();
        $this->MRQ->clearErrorMessage();
        $this->BRCODE->clearErrorMessage();
        $this->OPNO->clearErrorMessage();
        $this->IPNO->clearErrorMessage();
        $this->PatientBILLNO->clearErrorMessage();
        $this->BILLDT->clearErrorMessage();
        $this->GRNNO->clearErrorMessage();
        $this->DT->clearErrorMessage();
        $this->Customername->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->BILLNO->clearErrorMessage();
        $this->prc->clearErrorMessage();
        $this->PrName->clearErrorMessage();
        $this->BatchNo->clearErrorMessage();
        $this->ExpDate->clearErrorMessage();
        $this->MFRCODE->clearErrorMessage();
        $this->hsn->clearErrorMessage();
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
                        $this->prc->setSessionValue("");
                        $this->BatchNo->setSessionValue("");
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
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->ProductFrom->CurrentValue = null;
        $this->ProductFrom->OldValue = $this->ProductFrom->CurrentValue;
        $this->Quantity->CurrentValue = null;
        $this->Quantity->OldValue = $this->Quantity->CurrentValue;
        $this->FreeQty->CurrentValue = null;
        $this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
        $this->IQ->CurrentValue = null;
        $this->IQ->OldValue = $this->IQ->CurrentValue;
        $this->MRQ->CurrentValue = null;
        $this->MRQ->OldValue = $this->MRQ->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->OPNO->CurrentValue = null;
        $this->OPNO->OldValue = $this->OPNO->CurrentValue;
        $this->IPNO->CurrentValue = null;
        $this->IPNO->OldValue = $this->IPNO->CurrentValue;
        $this->PatientBILLNO->CurrentValue = null;
        $this->PatientBILLNO->OldValue = $this->PatientBILLNO->CurrentValue;
        $this->BILLDT->CurrentValue = null;
        $this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
        $this->GRNNO->CurrentValue = null;
        $this->GRNNO->OldValue = $this->GRNNO->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->Customername->CurrentValue = null;
        $this->Customername->OldValue = $this->Customername->CurrentValue;
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
        $this->prc->CurrentValue = null;
        $this->prc->OldValue = $this->prc->CurrentValue;
        $this->PrName->CurrentValue = null;
        $this->PrName->OldValue = $this->PrName->CurrentValue;
        $this->BatchNo->CurrentValue = null;
        $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
        $this->ExpDate->CurrentValue = null;
        $this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->hsn->CurrentValue = null;
        $this->hsn->OldValue = $this->hsn->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $CurrentForm->FormName = $this->FormName;

        // Check field name 'ProductFrom' first before field var 'x_ProductFrom'
        $val = $CurrentForm->hasValue("ProductFrom") ? $CurrentForm->getValue("ProductFrom") : $CurrentForm->getValue("x_ProductFrom");
        if (!$this->ProductFrom->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductFrom->Visible = false; // Disable update for API request
            } else {
                $this->ProductFrom->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ProductFrom")) {
            $this->ProductFrom->setOldValue($CurrentForm->getValue("o_ProductFrom"));
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

        // Check field name 'FreeQty' first before field var 'x_FreeQty'
        $val = $CurrentForm->hasValue("FreeQty") ? $CurrentForm->getValue("FreeQty") : $CurrentForm->getValue("x_FreeQty");
        if (!$this->FreeQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeQty->Visible = false; // Disable update for API request
            } else {
                $this->FreeQty->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_FreeQty")) {
            $this->FreeQty->setOldValue($CurrentForm->getValue("o_FreeQty"));
        }

        // Check field name 'IQ' first before field var 'x_IQ'
        $val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
        if (!$this->IQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IQ->Visible = false; // Disable update for API request
            } else {
                $this->IQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IQ")) {
            $this->IQ->setOldValue($CurrentForm->getValue("o_IQ"));
        }

        // Check field name 'MRQ' first before field var 'x_MRQ'
        $val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
        if (!$this->MRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRQ->Visible = false; // Disable update for API request
            } else {
                $this->MRQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MRQ")) {
            $this->MRQ->setOldValue($CurrentForm->getValue("o_MRQ"));
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

        // Check field name 'OPNO' first before field var 'x_OPNO'
        $val = $CurrentForm->hasValue("OPNO") ? $CurrentForm->getValue("OPNO") : $CurrentForm->getValue("x_OPNO");
        if (!$this->OPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPNO->Visible = false; // Disable update for API request
            } else {
                $this->OPNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_OPNO")) {
            $this->OPNO->setOldValue($CurrentForm->getValue("o_OPNO"));
        }

        // Check field name 'IPNO' first before field var 'x_IPNO'
        $val = $CurrentForm->hasValue("IPNO") ? $CurrentForm->getValue("IPNO") : $CurrentForm->getValue("x_IPNO");
        if (!$this->IPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IPNO->Visible = false; // Disable update for API request
            } else {
                $this->IPNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IPNO")) {
            $this->IPNO->setOldValue($CurrentForm->getValue("o_IPNO"));
        }

        // Check field name 'PatientBILLNO' first before field var 'x_PatientBILLNO'
        $val = $CurrentForm->hasValue("PatientBILLNO") ? $CurrentForm->getValue("PatientBILLNO") : $CurrentForm->getValue("x_PatientBILLNO");
        if (!$this->PatientBILLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientBILLNO->Visible = false; // Disable update for API request
            } else {
                $this->PatientBILLNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientBILLNO")) {
            $this->PatientBILLNO->setOldValue($CurrentForm->getValue("o_PatientBILLNO"));
        }

        // Check field name 'BILLDT' first before field var 'x_BILLDT'
        $val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
        if (!$this->BILLDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLDT->Visible = false; // Disable update for API request
            } else {
                $this->BILLDT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BILLDT")) {
            $this->BILLDT->setOldValue($CurrentForm->getValue("o_BILLDT"));
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
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 11);
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
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 11);
        }
        if ($CurrentForm->hasValue("o_modifieddatetime")) {
            $this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));
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

        // Check field name 'prc' first before field var 'x_prc'
        $val = $CurrentForm->hasValue("prc") ? $CurrentForm->getValue("prc") : $CurrentForm->getValue("x_prc");
        if (!$this->prc->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->prc->Visible = false; // Disable update for API request
            } else {
                $this->prc->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_prc")) {
            $this->prc->setOldValue($CurrentForm->getValue("o_prc"));
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
            $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 7);
        }
        if ($CurrentForm->hasValue("o_ExpDate")) {
            $this->ExpDate->setOldValue($CurrentForm->getValue("o_ExpDate"));
        }

        // Check field name 'MFRCODE' first before field var 'x_MFRCODE'
        $val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
        if (!$this->MFRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MFRCODE->Visible = false; // Disable update for API request
            } else {
                $this->MFRCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MFRCODE")) {
            $this->MFRCODE->setOldValue($CurrentForm->getValue("o_MFRCODE"));
        }

        // Check field name 'hsn' first before field var 'x_hsn'
        $val = $CurrentForm->hasValue("hsn") ? $CurrentForm->getValue("hsn") : $CurrentForm->getValue("x_hsn");
        if (!$this->hsn->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->hsn->Visible = false; // Disable update for API request
            } else {
                $this->hsn->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_hsn")) {
            $this->hsn->setOldValue($CurrentForm->getValue("o_hsn"));
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
        $this->ProductFrom->CurrentValue = $this->ProductFrom->FormValue;
        $this->Quantity->CurrentValue = $this->Quantity->FormValue;
        $this->FreeQty->CurrentValue = $this->FreeQty->FormValue;
        $this->IQ->CurrentValue = $this->IQ->FormValue;
        $this->MRQ->CurrentValue = $this->MRQ->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->OPNO->CurrentValue = $this->OPNO->FormValue;
        $this->IPNO->CurrentValue = $this->IPNO->FormValue;
        $this->PatientBILLNO->CurrentValue = $this->PatientBILLNO->FormValue;
        $this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
        $this->GRNNO->CurrentValue = $this->GRNNO->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->Customername->CurrentValue = $this->Customername->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 11);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 11);
        $this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
        $this->prc->CurrentValue = $this->prc->FormValue;
        $this->PrName->CurrentValue = $this->PrName->FormValue;
        $this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
        $this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
        $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 7);
        $this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
        $this->hsn->CurrentValue = $this->hsn->FormValue;
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
        $this->ProductFrom->setDbValue($row['ProductFrom']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->FreeQty->setDbValue($row['FreeQty']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->PatientBILLNO->setDbValue($row['PatientBILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->GRNNO->setDbValue($row['GRNNO']);
        $this->DT->setDbValue($row['DT']);
        $this->Customername->setDbValue($row['Customername']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->prc->setDbValue($row['prc']);
        $this->PrName->setDbValue($row['PrName']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->ExpDate->setDbValue($row['ExpDate']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->hsn->setDbValue($row['hsn']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ProductFrom'] = $this->ProductFrom->CurrentValue;
        $row['Quantity'] = $this->Quantity->CurrentValue;
        $row['FreeQty'] = $this->FreeQty->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['OPNO'] = $this->OPNO->CurrentValue;
        $row['IPNO'] = $this->IPNO->CurrentValue;
        $row['PatientBILLNO'] = $this->PatientBILLNO->CurrentValue;
        $row['BILLDT'] = $this->BILLDT->CurrentValue;
        $row['GRNNO'] = $this->GRNNO->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['Customername'] = $this->Customername->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['BILLNO'] = $this->BILLNO->CurrentValue;
        $row['prc'] = $this->prc->CurrentValue;
        $row['PrName'] = $this->PrName->CurrentValue;
        $row['BatchNo'] = $this->BatchNo->CurrentValue;
        $row['ExpDate'] = $this->ExpDate->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['hsn'] = $this->hsn->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        return false;
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

        // ProductFrom

        // Quantity

        // FreeQty

        // IQ

        // MRQ

        // BRCODE

        // OPNO

        // IPNO

        // PatientBILLNO

        // BILLDT

        // GRNNO

        // DT

        // Customername

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BILLNO

        // prc

        // PrName

        // BatchNo

        // ExpDate

        // MFRCODE

        // hsn

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // ProductFrom
            $this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
            $curVal = trim(strval($this->ProductFrom->CurrentValue));
            if ($curVal != "") {
                $this->ProductFrom->ViewValue = $this->ProductFrom->lookupCacheOption($curVal);
                if ($this->ProductFrom->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ProductFrom->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ProductFrom->Lookup->renderViewRow($rswrk[0]);
                        $this->ProductFrom->ViewValue = $this->ProductFrom->displayValue($arwrk);
                    } else {
                        $this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
                    }
                }
            } else {
                $this->ProductFrom->ViewValue = null;
            }
            $this->ProductFrom->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewCustomAttributes = "";

            // FreeQty
            $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
            $this->FreeQty->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewCustomAttributes = "";

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

            // OPNO
            $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
            $this->OPNO->ViewCustomAttributes = "";

            // IPNO
            $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
            $this->IPNO->ViewCustomAttributes = "";

            // PatientBILLNO
            $this->PatientBILLNO->ViewValue = $this->PatientBILLNO->CurrentValue;
            $this->PatientBILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
            $this->GRNNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 11);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // prc
            $this->prc->ViewValue = $this->prc->CurrentValue;
            $this->prc->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // ExpDate
            $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
            $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 7);
            $this->ExpDate->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // hsn
            $this->hsn->ViewValue = $this->hsn->CurrentValue;
            $this->hsn->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // ProductFrom
            $this->ProductFrom->LinkCustomAttributes = "";
            $this->ProductFrom->HrefValue = "";
            $this->ProductFrom->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ProductFrom->ViewValue = $this->highlightValue($this->ProductFrom);
            }

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Quantity->ViewValue = $this->highlightValue($this->Quantity);
            }

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";
            $this->FreeQty->TooltipValue = "";
            if (!$this->isExport()) {
                $this->FreeQty->ViewValue = $this->highlightValue($this->FreeQty);
            }

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IQ->ViewValue = $this->highlightValue($this->IQ);
            }

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";
            if (!$this->isExport()) {
                $this->MRQ->ViewValue = $this->highlightValue($this->MRQ);
            }

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BRCODE->ViewValue = $this->highlightValue($this->BRCODE);
            }

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";
            $this->OPNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->OPNO->ViewValue = $this->highlightValue($this->OPNO);
            }

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";
            $this->IPNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IPNO->ViewValue = $this->highlightValue($this->IPNO);
            }

            // PatientBILLNO
            $this->PatientBILLNO->LinkCustomAttributes = "";
            $this->PatientBILLNO->HrefValue = "";
            $this->PatientBILLNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientBILLNO->ViewValue = $this->highlightValue($this->PatientBILLNO);
            }

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BILLDT->ViewValue = $this->highlightValue($this->BILLDT);
            }

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";
            $this->GRNNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->GRNNO->ViewValue = $this->highlightValue($this->GRNNO);
            }

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->DT->ViewValue = $this->highlightValue($this->DT);
            }

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Customername->ViewValue = $this->highlightValue($this->Customername);
            }

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

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BILLNO->ViewValue = $this->highlightValue($this->BILLNO);
            }

            // prc
            $this->prc->LinkCustomAttributes = "";
            $this->prc->HrefValue = "";
            $this->prc->TooltipValue = "";
            if (!$this->isExport()) {
                $this->prc->ViewValue = $this->highlightValue($this->prc);
            }

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PrName->ViewValue = $this->highlightValue($this->PrName);
            }

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

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->MFRCODE->ViewValue = $this->highlightValue($this->MFRCODE);
            }

            // hsn
            $this->hsn->LinkCustomAttributes = "";
            $this->hsn->HrefValue = "";
            $this->hsn->TooltipValue = "";
            if (!$this->isExport()) {
                $this->hsn->ViewValue = $this->highlightValue($this->hsn);
            }

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ProductFrom
            $this->ProductFrom->EditAttrs["class"] = "form-control";
            $this->ProductFrom->EditCustomAttributes = "";
            if (!$this->ProductFrom->Raw) {
                $this->ProductFrom->CurrentValue = HtmlDecode($this->ProductFrom->CurrentValue);
            }
            $this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
            $curVal = trim(strval($this->ProductFrom->CurrentValue));
            if ($curVal != "") {
                $this->ProductFrom->EditValue = $this->ProductFrom->lookupCacheOption($curVal);
                if ($this->ProductFrom->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ProductFrom->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ProductFrom->Lookup->renderViewRow($rswrk[0]);
                        $this->ProductFrom->EditValue = $this->ProductFrom->displayValue($arwrk);
                    } else {
                        $this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
                    }
                }
            } else {
                $this->ProductFrom->EditValue = null;
            }
            $this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            if (!$this->Quantity->Raw) {
                $this->Quantity->CurrentValue = HtmlDecode($this->Quantity->CurrentValue);
            }
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // FreeQty
            $this->FreeQty->EditAttrs["class"] = "form-control";
            $this->FreeQty->EditCustomAttributes = "";
            if (!$this->FreeQty->Raw) {
                $this->FreeQty->CurrentValue = HtmlDecode($this->FreeQty->CurrentValue);
            }
            $this->FreeQty->EditValue = HtmlEncode($this->FreeQty->CurrentValue);
            $this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            if (!$this->IQ->Raw) {
                $this->IQ->CurrentValue = HtmlDecode($this->IQ->CurrentValue);
            }
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            if (!$this->MRQ->Raw) {
                $this->MRQ->CurrentValue = HtmlDecode($this->MRQ->CurrentValue);
            }
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            if (!$this->BRCODE->Raw) {
                $this->BRCODE->CurrentValue = HtmlDecode($this->BRCODE->CurrentValue);
            }
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

            // OPNO
            $this->OPNO->EditAttrs["class"] = "form-control";
            $this->OPNO->EditCustomAttributes = "";
            if (!$this->OPNO->Raw) {
                $this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
            }
            $this->OPNO->EditValue = HtmlEncode($this->OPNO->CurrentValue);
            $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

            // IPNO
            $this->IPNO->EditAttrs["class"] = "form-control";
            $this->IPNO->EditCustomAttributes = "";
            if (!$this->IPNO->Raw) {
                $this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
            }
            $this->IPNO->EditValue = HtmlEncode($this->IPNO->CurrentValue);
            $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

            // PatientBILLNO
            $this->PatientBILLNO->EditAttrs["class"] = "form-control";
            $this->PatientBILLNO->EditCustomAttributes = "";
            if (!$this->PatientBILLNO->Raw) {
                $this->PatientBILLNO->CurrentValue = HtmlDecode($this->PatientBILLNO->CurrentValue);
            }
            $this->PatientBILLNO->EditValue = HtmlEncode($this->PatientBILLNO->CurrentValue);
            $this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            if (!$this->BILLDT->Raw) {
                $this->BILLDT->CurrentValue = HtmlDecode($this->BILLDT->CurrentValue);
            }
            $this->BILLDT->EditValue = HtmlEncode($this->BILLDT->CurrentValue);
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

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
            if (!$this->DT->Raw) {
                $this->DT->CurrentValue = HtmlDecode($this->DT->CurrentValue);
            }
            $this->DT->EditValue = HtmlEncode($this->DT->CurrentValue);
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 11));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 11));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // prc
            $this->prc->EditAttrs["class"] = "form-control";
            $this->prc->EditCustomAttributes = "";
            if ($this->prc->getSessionValue() != "") {
                $this->prc->CurrentValue = GetForeignKeyValue($this->prc->getSessionValue());
                $this->prc->OldValue = $this->prc->CurrentValue;
                $this->prc->ViewValue = $this->prc->CurrentValue;
                $this->prc->ViewCustomAttributes = "";
            } else {
                if (!$this->prc->Raw) {
                    $this->prc->CurrentValue = HtmlDecode($this->prc->CurrentValue);
                }
                $this->prc->EditValue = HtmlEncode($this->prc->CurrentValue);
                $this->prc->PlaceHolder = RemoveHtml($this->prc->caption());
            }

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if ($this->BatchNo->getSessionValue() != "") {
                $this->BatchNo->CurrentValue = GetForeignKeyValue($this->BatchNo->getSessionValue());
                $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
                $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
                $this->BatchNo->ViewCustomAttributes = "";
            } else {
                if (!$this->BatchNo->Raw) {
                    $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
                }
                $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
                $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());
            }

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 7));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // hsn
            $this->hsn->EditAttrs["class"] = "form-control";
            $this->hsn->EditCustomAttributes = "";
            if (!$this->hsn->Raw) {
                $this->hsn->CurrentValue = HtmlDecode($this->hsn->CurrentValue);
            }
            $this->hsn->EditValue = HtmlEncode($this->hsn->CurrentValue);
            $this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

            // HospID

            // Add refer script

            // ProductFrom
            $this->ProductFrom->LinkCustomAttributes = "";
            $this->ProductFrom->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";

            // PatientBILLNO
            $this->PatientBILLNO->LinkCustomAttributes = "";
            $this->PatientBILLNO->HrefValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

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

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";

            // prc
            $this->prc->LinkCustomAttributes = "";
            $this->prc->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // hsn
            $this->hsn->LinkCustomAttributes = "";
            $this->hsn->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // ProductFrom
            $this->ProductFrom->EditAttrs["class"] = "form-control";
            $this->ProductFrom->EditCustomAttributes = "";
            if (!$this->ProductFrom->Raw) {
                $this->ProductFrom->CurrentValue = HtmlDecode($this->ProductFrom->CurrentValue);
            }
            $this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
            $curVal = trim(strval($this->ProductFrom->CurrentValue));
            if ($curVal != "") {
                $this->ProductFrom->EditValue = $this->ProductFrom->lookupCacheOption($curVal);
                if ($this->ProductFrom->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ProductFrom->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ProductFrom->Lookup->renderViewRow($rswrk[0]);
                        $this->ProductFrom->EditValue = $this->ProductFrom->displayValue($arwrk);
                    } else {
                        $this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
                    }
                }
            } else {
                $this->ProductFrom->EditValue = null;
            }
            $this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            if (!$this->Quantity->Raw) {
                $this->Quantity->CurrentValue = HtmlDecode($this->Quantity->CurrentValue);
            }
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // FreeQty
            $this->FreeQty->EditAttrs["class"] = "form-control";
            $this->FreeQty->EditCustomAttributes = "";
            if (!$this->FreeQty->Raw) {
                $this->FreeQty->CurrentValue = HtmlDecode($this->FreeQty->CurrentValue);
            }
            $this->FreeQty->EditValue = HtmlEncode($this->FreeQty->CurrentValue);
            $this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            if (!$this->IQ->Raw) {
                $this->IQ->CurrentValue = HtmlDecode($this->IQ->CurrentValue);
            }
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            if (!$this->MRQ->Raw) {
                $this->MRQ->CurrentValue = HtmlDecode($this->MRQ->CurrentValue);
            }
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            if (!$this->BRCODE->Raw) {
                $this->BRCODE->CurrentValue = HtmlDecode($this->BRCODE->CurrentValue);
            }
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

            // OPNO
            $this->OPNO->EditAttrs["class"] = "form-control";
            $this->OPNO->EditCustomAttributes = "";
            if (!$this->OPNO->Raw) {
                $this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
            }
            $this->OPNO->EditValue = HtmlEncode($this->OPNO->CurrentValue);
            $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

            // IPNO
            $this->IPNO->EditAttrs["class"] = "form-control";
            $this->IPNO->EditCustomAttributes = "";
            if (!$this->IPNO->Raw) {
                $this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
            }
            $this->IPNO->EditValue = HtmlEncode($this->IPNO->CurrentValue);
            $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

            // PatientBILLNO
            $this->PatientBILLNO->EditAttrs["class"] = "form-control";
            $this->PatientBILLNO->EditCustomAttributes = "";
            if (!$this->PatientBILLNO->Raw) {
                $this->PatientBILLNO->CurrentValue = HtmlDecode($this->PatientBILLNO->CurrentValue);
            }
            $this->PatientBILLNO->EditValue = HtmlEncode($this->PatientBILLNO->CurrentValue);
            $this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            if (!$this->BILLDT->Raw) {
                $this->BILLDT->CurrentValue = HtmlDecode($this->BILLDT->CurrentValue);
            }
            $this->BILLDT->EditValue = HtmlEncode($this->BILLDT->CurrentValue);
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

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
            if (!$this->DT->Raw) {
                $this->DT->CurrentValue = HtmlDecode($this->DT->CurrentValue);
            }
            $this->DT->EditValue = HtmlEncode($this->DT->CurrentValue);
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 11));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 11));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // prc
            $this->prc->EditAttrs["class"] = "form-control";
            $this->prc->EditCustomAttributes = "";
            if ($this->prc->getSessionValue() != "") {
                $this->prc->CurrentValue = GetForeignKeyValue($this->prc->getSessionValue());
                $this->prc->OldValue = $this->prc->CurrentValue;
                $this->prc->ViewValue = $this->prc->CurrentValue;
                $this->prc->ViewCustomAttributes = "";
            } else {
                if (!$this->prc->Raw) {
                    $this->prc->CurrentValue = HtmlDecode($this->prc->CurrentValue);
                }
                $this->prc->EditValue = HtmlEncode($this->prc->CurrentValue);
                $this->prc->PlaceHolder = RemoveHtml($this->prc->caption());
            }

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if ($this->BatchNo->getSessionValue() != "") {
                $this->BatchNo->CurrentValue = GetForeignKeyValue($this->BatchNo->getSessionValue());
                $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
                $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
                $this->BatchNo->ViewCustomAttributes = "";
            } else {
                if (!$this->BatchNo->Raw) {
                    $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
                }
                $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
                $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());
            }

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 7));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // hsn
            $this->hsn->EditAttrs["class"] = "form-control";
            $this->hsn->EditCustomAttributes = "";
            if (!$this->hsn->Raw) {
                $this->hsn->CurrentValue = HtmlDecode($this->hsn->CurrentValue);
            }
            $this->hsn->EditValue = HtmlEncode($this->hsn->CurrentValue);
            $this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

            // HospID

            // Edit refer script

            // ProductFrom
            $this->ProductFrom->LinkCustomAttributes = "";
            $this->ProductFrom->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";

            // PatientBILLNO
            $this->PatientBILLNO->LinkCustomAttributes = "";
            $this->PatientBILLNO->HrefValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

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

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";

            // prc
            $this->prc->LinkCustomAttributes = "";
            $this->prc->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // hsn
            $this->hsn->LinkCustomAttributes = "";
            $this->hsn->HrefValue = "";

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
        if ($this->ProductFrom->Required) {
            if (!$this->ProductFrom->IsDetailKey && EmptyValue($this->ProductFrom->FormValue)) {
                $this->ProductFrom->addErrorMessage(str_replace("%s", $this->ProductFrom->caption(), $this->ProductFrom->RequiredErrorMessage));
            }
        }
        if ($this->Quantity->Required) {
            if (!$this->Quantity->IsDetailKey && EmptyValue($this->Quantity->FormValue)) {
                $this->Quantity->addErrorMessage(str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
            }
        }
        if ($this->FreeQty->Required) {
            if (!$this->FreeQty->IsDetailKey && EmptyValue($this->FreeQty->FormValue)) {
                $this->FreeQty->addErrorMessage(str_replace("%s", $this->FreeQty->caption(), $this->FreeQty->RequiredErrorMessage));
            }
        }
        if ($this->IQ->Required) {
            if (!$this->IQ->IsDetailKey && EmptyValue($this->IQ->FormValue)) {
                $this->IQ->addErrorMessage(str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
            }
        }
        if ($this->MRQ->Required) {
            if (!$this->MRQ->IsDetailKey && EmptyValue($this->MRQ->FormValue)) {
                $this->MRQ->addErrorMessage(str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
            }
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if ($this->OPNO->Required) {
            if (!$this->OPNO->IsDetailKey && EmptyValue($this->OPNO->FormValue)) {
                $this->OPNO->addErrorMessage(str_replace("%s", $this->OPNO->caption(), $this->OPNO->RequiredErrorMessage));
            }
        }
        if ($this->IPNO->Required) {
            if (!$this->IPNO->IsDetailKey && EmptyValue($this->IPNO->FormValue)) {
                $this->IPNO->addErrorMessage(str_replace("%s", $this->IPNO->caption(), $this->IPNO->RequiredErrorMessage));
            }
        }
        if ($this->PatientBILLNO->Required) {
            if (!$this->PatientBILLNO->IsDetailKey && EmptyValue($this->PatientBILLNO->FormValue)) {
                $this->PatientBILLNO->addErrorMessage(str_replace("%s", $this->PatientBILLNO->caption(), $this->PatientBILLNO->RequiredErrorMessage));
            }
        }
        if ($this->BILLDT->Required) {
            if (!$this->BILLDT->IsDetailKey && EmptyValue($this->BILLDT->FormValue)) {
                $this->BILLDT->addErrorMessage(str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
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
        if ($this->Customername->Required) {
            if (!$this->Customername->IsDetailKey && EmptyValue($this->Customername->FormValue)) {
                $this->Customername->addErrorMessage(str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
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
        if (!CheckEuroDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
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
        if (!CheckEuroDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->BILLNO->Required) {
            if (!$this->BILLNO->IsDetailKey && EmptyValue($this->BILLNO->FormValue)) {
                $this->BILLNO->addErrorMessage(str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
            }
        }
        if ($this->prc->Required) {
            if (!$this->prc->IsDetailKey && EmptyValue($this->prc->FormValue)) {
                $this->prc->addErrorMessage(str_replace("%s", $this->prc->caption(), $this->prc->RequiredErrorMessage));
            }
        }
        if ($this->PrName->Required) {
            if (!$this->PrName->IsDetailKey && EmptyValue($this->PrName->FormValue)) {
                $this->PrName->addErrorMessage(str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
            }
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
        if (!CheckEuroDate($this->ExpDate->FormValue)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if ($this->MFRCODE->Required) {
            if (!$this->MFRCODE->IsDetailKey && EmptyValue($this->MFRCODE->FormValue)) {
                $this->MFRCODE->addErrorMessage(str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
            }
        }
        if ($this->hsn->Required) {
            if (!$this->hsn->IsDetailKey && EmptyValue($this->hsn->FormValue)) {
                $this->hsn->addErrorMessage(str_replace("%s", $this->hsn->caption(), $this->hsn->RequiredErrorMessage));
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

            // ProductFrom
            $this->ProductFrom->setDbValueDef($rsnew, $this->ProductFrom->CurrentValue, null, $this->ProductFrom->ReadOnly);

            // Quantity
            $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, $this->Quantity->ReadOnly);

            // FreeQty
            $this->FreeQty->setDbValueDef($rsnew, $this->FreeQty->CurrentValue, null, $this->FreeQty->ReadOnly);

            // IQ
            $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, $this->IQ->ReadOnly);

            // MRQ
            $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, $this->MRQ->ReadOnly);

            // BRCODE
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, $this->BRCODE->ReadOnly);

            // OPNO
            $this->OPNO->setDbValueDef($rsnew, $this->OPNO->CurrentValue, null, $this->OPNO->ReadOnly);

            // IPNO
            $this->IPNO->setDbValueDef($rsnew, $this->IPNO->CurrentValue, null, $this->IPNO->ReadOnly);

            // PatientBILLNO
            $this->PatientBILLNO->setDbValueDef($rsnew, $this->PatientBILLNO->CurrentValue, null, $this->PatientBILLNO->ReadOnly);

            // BILLDT
            $this->BILLDT->setDbValueDef($rsnew, $this->BILLDT->CurrentValue, null, $this->BILLDT->ReadOnly);

            // GRNNO
            $this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, null, $this->GRNNO->ReadOnly);

            // DT
            $this->DT->setDbValueDef($rsnew, $this->DT->CurrentValue, null, $this->DT->ReadOnly);

            // Customername
            $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, $this->Customername->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 11), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 11), null, $this->modifieddatetime->ReadOnly);

            // BILLNO
            $this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, null, $this->BILLNO->ReadOnly);

            // prc
            if ($this->prc->getSessionValue() != "") {
                $this->prc->ReadOnly = true;
            }
            $this->prc->setDbValueDef($rsnew, $this->prc->CurrentValue, null, $this->prc->ReadOnly);

            // PrName
            $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, $this->PrName->ReadOnly);

            // BatchNo
            if ($this->BatchNo->getSessionValue() != "") {
                $this->BatchNo->ReadOnly = true;
            }
            $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, $this->BatchNo->ReadOnly);

            // ExpDate
            $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 7), null, $this->ExpDate->ReadOnly);

            // MFRCODE
            $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, $this->MFRCODE->ReadOnly);

            // hsn
            $this->hsn->setDbValueDef($rsnew, $this->hsn->CurrentValue, null, $this->hsn->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

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
        if ($this->getCurrentMasterTable() == "view_pharmacy_movement") {
            $this->prc->CurrentValue = $this->prc->getSessionValue();
            $this->BatchNo->CurrentValue = $this->BatchNo->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // ProductFrom
        $this->ProductFrom->setDbValueDef($rsnew, $this->ProductFrom->CurrentValue, null, false);

        // Quantity
        $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, false);

        // FreeQty
        $this->FreeQty->setDbValueDef($rsnew, $this->FreeQty->CurrentValue, null, false);

        // IQ
        $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, false);

        // MRQ
        $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, false);

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // OPNO
        $this->OPNO->setDbValueDef($rsnew, $this->OPNO->CurrentValue, null, false);

        // IPNO
        $this->IPNO->setDbValueDef($rsnew, $this->IPNO->CurrentValue, null, false);

        // PatientBILLNO
        $this->PatientBILLNO->setDbValueDef($rsnew, $this->PatientBILLNO->CurrentValue, null, false);

        // BILLDT
        $this->BILLDT->setDbValueDef($rsnew, $this->BILLDT->CurrentValue, null, false);

        // GRNNO
        $this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, null, false);

        // DT
        $this->DT->setDbValueDef($rsnew, $this->DT->CurrentValue, null, false);

        // Customername
        $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 11), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 11), null, false);

        // BILLNO
        $this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, null, false);

        // prc
        $this->prc->setDbValueDef($rsnew, $this->prc->CurrentValue, null, false);

        // PrName
        $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, false);

        // BatchNo
        $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, false);

        // ExpDate
        $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 7), null, false);

        // MFRCODE
        $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, false);

        // hsn
        $this->hsn->setDbValueDef($rsnew, $this->hsn->CurrentValue, null, false);

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
        if ($masterTblVar == "view_pharmacy_movement") {
            $masterTbl = Container("view_pharmacy_movement");
            $this->prc->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->BatchNo->Visible = false;
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
                case "x_ProductFrom":
                    break;
                case "x_BRCODE":
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
