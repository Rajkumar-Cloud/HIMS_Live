<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOutcomeGrid extends IvfOutcome
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_outcome';

    // Page object name
    public $PageObjName = "IvfOutcomeGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fivf_outcomegrid";
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

        // Table object (ivf_outcome)
        if (!isset($GLOBALS["ivf_outcome"]) || get_class($GLOBALS["ivf_outcome"]) == PROJECT_NAMESPACE . "ivf_outcome") {
            $GLOBALS["ivf_outcome"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "IvfOutcomeAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_outcome');
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
                $doc = new $class(Container("ivf_outcome"));
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->treatment_status->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->outcomeDate->setVisibility();
        $this->outcomeDay->setVisibility();
        $this->OPResult->setVisibility();
        $this->Gestation->setVisibility();
        $this->TransferdEmbryos->setVisibility();
        $this->InitalOfSacs->setVisibility();
        $this->ImplimentationRate->setVisibility();
        $this->EmbryoNo->setVisibility();
        $this->ExtrauterineSac->setVisibility();
        $this->PregnancyMonozygotic->setVisibility();
        $this->TypeGestation->setVisibility();
        $this->Urine->setVisibility();
        $this->PTdate->setVisibility();
        $this->Reduced->setVisibility();
        $this->INduced->setVisibility();
        $this->INducedDate->setVisibility();
        $this->Miscarriage->setVisibility();
        $this->Induced1->setVisibility();
        $this->Type->setVisibility();
        $this->IfClinical->setVisibility();
        $this->GADate->setVisibility();
        $this->GA->setVisibility();
        $this->FoetalDeath->setVisibility();
        $this->FerinatalDeath->setVisibility();
        $this->TidNo->setVisibility();
        $this->Ectopic->setVisibility();
        $this->Extra->setVisibility();
        $this->Implantation->setVisibility();
        $this->DeliveryDate->setVisibility();
        $this->BabyDetails->Visible = false;
        $this->LSCSNormal->Visible = false;
        $this->Notes->Visible = false;
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
        if ($CurrentForm->hasValue("x_RIDNO") && $CurrentForm->hasValue("o_RIDNO") && $this->RIDNO->CurrentValue != $this->RIDNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue != $this->Name->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_treatment_status") && $CurrentForm->hasValue("o_treatment_status") && $this->treatment_status->CurrentValue != $this->treatment_status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ARTCYCLE") && $CurrentForm->hasValue("o_ARTCYCLE") && $this->ARTCYCLE->CurrentValue != $this->ARTCYCLE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RESULT") && $CurrentForm->hasValue("o_RESULT") && $this->RESULT->CurrentValue != $this->RESULT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue) {
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
        if ($CurrentForm->hasValue("x_outcomeDate") && $CurrentForm->hasValue("o_outcomeDate") && $this->outcomeDate->CurrentValue != $this->outcomeDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_outcomeDay") && $CurrentForm->hasValue("o_outcomeDay") && $this->outcomeDay->CurrentValue != $this->outcomeDay->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_OPResult") && $CurrentForm->hasValue("o_OPResult") && $this->OPResult->CurrentValue != $this->OPResult->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Gestation") && $CurrentForm->hasValue("o_Gestation") && $this->Gestation->CurrentValue != $this->Gestation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TransferdEmbryos") && $CurrentForm->hasValue("o_TransferdEmbryos") && $this->TransferdEmbryos->CurrentValue != $this->TransferdEmbryos->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_InitalOfSacs") && $CurrentForm->hasValue("o_InitalOfSacs") && $this->InitalOfSacs->CurrentValue != $this->InitalOfSacs->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ImplimentationRate") && $CurrentForm->hasValue("o_ImplimentationRate") && $this->ImplimentationRate->CurrentValue != $this->ImplimentationRate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EmbryoNo") && $CurrentForm->hasValue("o_EmbryoNo") && $this->EmbryoNo->CurrentValue != $this->EmbryoNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ExtrauterineSac") && $CurrentForm->hasValue("o_ExtrauterineSac") && $this->ExtrauterineSac->CurrentValue != $this->ExtrauterineSac->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PregnancyMonozygotic") && $CurrentForm->hasValue("o_PregnancyMonozygotic") && $this->PregnancyMonozygotic->CurrentValue != $this->PregnancyMonozygotic->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TypeGestation") && $CurrentForm->hasValue("o_TypeGestation") && $this->TypeGestation->CurrentValue != $this->TypeGestation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Urine") && $CurrentForm->hasValue("o_Urine") && $this->Urine->CurrentValue != $this->Urine->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PTdate") && $CurrentForm->hasValue("o_PTdate") && $this->PTdate->CurrentValue != $this->PTdate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Reduced") && $CurrentForm->hasValue("o_Reduced") && $this->Reduced->CurrentValue != $this->Reduced->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_INduced") && $CurrentForm->hasValue("o_INduced") && $this->INduced->CurrentValue != $this->INduced->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_INducedDate") && $CurrentForm->hasValue("o_INducedDate") && $this->INducedDate->CurrentValue != $this->INducedDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Miscarriage") && $CurrentForm->hasValue("o_Miscarriage") && $this->Miscarriage->CurrentValue != $this->Miscarriage->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Induced1") && $CurrentForm->hasValue("o_Induced1") && $this->Induced1->CurrentValue != $this->Induced1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Type") && $CurrentForm->hasValue("o_Type") && $this->Type->CurrentValue != $this->Type->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IfClinical") && $CurrentForm->hasValue("o_IfClinical") && $this->IfClinical->CurrentValue != $this->IfClinical->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GADate") && $CurrentForm->hasValue("o_GADate") && $this->GADate->CurrentValue != $this->GADate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GA") && $CurrentForm->hasValue("o_GA") && $this->GA->CurrentValue != $this->GA->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_FoetalDeath") && $CurrentForm->hasValue("o_FoetalDeath") && $this->FoetalDeath->CurrentValue != $this->FoetalDeath->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_FerinatalDeath") && $CurrentForm->hasValue("o_FerinatalDeath") && $this->FerinatalDeath->CurrentValue != $this->FerinatalDeath->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Ectopic") && $CurrentForm->hasValue("o_Ectopic") && $this->Ectopic->CurrentValue != $this->Ectopic->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Extra") && $CurrentForm->hasValue("o_Extra") && $this->Extra->CurrentValue != $this->Extra->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Implantation") && $CurrentForm->hasValue("o_Implantation") && $this->Implantation->CurrentValue != $this->Implantation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DeliveryDate") && $CurrentForm->hasValue("o_DeliveryDate") && $this->DeliveryDate->CurrentValue != $this->DeliveryDate->OldValue) {
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
        $this->RIDNO->clearErrorMessage();
        $this->Name->clearErrorMessage();
        $this->Age->clearErrorMessage();
        $this->treatment_status->clearErrorMessage();
        $this->ARTCYCLE->clearErrorMessage();
        $this->RESULT->clearErrorMessage();
        $this->status->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->outcomeDate->clearErrorMessage();
        $this->outcomeDay->clearErrorMessage();
        $this->OPResult->clearErrorMessage();
        $this->Gestation->clearErrorMessage();
        $this->TransferdEmbryos->clearErrorMessage();
        $this->InitalOfSacs->clearErrorMessage();
        $this->ImplimentationRate->clearErrorMessage();
        $this->EmbryoNo->clearErrorMessage();
        $this->ExtrauterineSac->clearErrorMessage();
        $this->PregnancyMonozygotic->clearErrorMessage();
        $this->TypeGestation->clearErrorMessage();
        $this->Urine->clearErrorMessage();
        $this->PTdate->clearErrorMessage();
        $this->Reduced->clearErrorMessage();
        $this->INduced->clearErrorMessage();
        $this->INducedDate->clearErrorMessage();
        $this->Miscarriage->clearErrorMessage();
        $this->Induced1->clearErrorMessage();
        $this->Type->clearErrorMessage();
        $this->IfClinical->clearErrorMessage();
        $this->GADate->clearErrorMessage();
        $this->GA->clearErrorMessage();
        $this->FoetalDeath->clearErrorMessage();
        $this->FerinatalDeath->clearErrorMessage();
        $this->TidNo->clearErrorMessage();
        $this->Ectopic->clearErrorMessage();
        $this->Extra->clearErrorMessage();
        $this->Implantation->clearErrorMessage();
        $this->DeliveryDate->clearErrorMessage();
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
                        $this->RIDNO->setSessionValue("");
                        $this->Name->setSessionValue("");
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
        $this->RIDNO->CurrentValue = null;
        $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->treatment_status->CurrentValue = null;
        $this->treatment_status->OldValue = $this->treatment_status->CurrentValue;
        $this->ARTCYCLE->CurrentValue = null;
        $this->ARTCYCLE->OldValue = $this->ARTCYCLE->CurrentValue;
        $this->RESULT->CurrentValue = null;
        $this->RESULT->OldValue = $this->RESULT->CurrentValue;
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
        $this->outcomeDate->CurrentValue = null;
        $this->outcomeDate->OldValue = $this->outcomeDate->CurrentValue;
        $this->outcomeDay->CurrentValue = null;
        $this->outcomeDay->OldValue = $this->outcomeDay->CurrentValue;
        $this->OPResult->CurrentValue = null;
        $this->OPResult->OldValue = $this->OPResult->CurrentValue;
        $this->Gestation->CurrentValue = null;
        $this->Gestation->OldValue = $this->Gestation->CurrentValue;
        $this->TransferdEmbryos->CurrentValue = null;
        $this->TransferdEmbryos->OldValue = $this->TransferdEmbryos->CurrentValue;
        $this->InitalOfSacs->CurrentValue = null;
        $this->InitalOfSacs->OldValue = $this->InitalOfSacs->CurrentValue;
        $this->ImplimentationRate->CurrentValue = null;
        $this->ImplimentationRate->OldValue = $this->ImplimentationRate->CurrentValue;
        $this->EmbryoNo->CurrentValue = null;
        $this->EmbryoNo->OldValue = $this->EmbryoNo->CurrentValue;
        $this->ExtrauterineSac->CurrentValue = null;
        $this->ExtrauterineSac->OldValue = $this->ExtrauterineSac->CurrentValue;
        $this->PregnancyMonozygotic->CurrentValue = null;
        $this->PregnancyMonozygotic->OldValue = $this->PregnancyMonozygotic->CurrentValue;
        $this->TypeGestation->CurrentValue = null;
        $this->TypeGestation->OldValue = $this->TypeGestation->CurrentValue;
        $this->Urine->CurrentValue = null;
        $this->Urine->OldValue = $this->Urine->CurrentValue;
        $this->PTdate->CurrentValue = null;
        $this->PTdate->OldValue = $this->PTdate->CurrentValue;
        $this->Reduced->CurrentValue = null;
        $this->Reduced->OldValue = $this->Reduced->CurrentValue;
        $this->INduced->CurrentValue = null;
        $this->INduced->OldValue = $this->INduced->CurrentValue;
        $this->INducedDate->CurrentValue = null;
        $this->INducedDate->OldValue = $this->INducedDate->CurrentValue;
        $this->Miscarriage->CurrentValue = null;
        $this->Miscarriage->OldValue = $this->Miscarriage->CurrentValue;
        $this->Induced1->CurrentValue = null;
        $this->Induced1->OldValue = $this->Induced1->CurrentValue;
        $this->Type->CurrentValue = null;
        $this->Type->OldValue = $this->Type->CurrentValue;
        $this->IfClinical->CurrentValue = null;
        $this->IfClinical->OldValue = $this->IfClinical->CurrentValue;
        $this->GADate->CurrentValue = null;
        $this->GADate->OldValue = $this->GADate->CurrentValue;
        $this->GA->CurrentValue = null;
        $this->GA->OldValue = $this->GA->CurrentValue;
        $this->FoetalDeath->CurrentValue = null;
        $this->FoetalDeath->OldValue = $this->FoetalDeath->CurrentValue;
        $this->FerinatalDeath->CurrentValue = null;
        $this->FerinatalDeath->OldValue = $this->FerinatalDeath->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->Ectopic->CurrentValue = null;
        $this->Ectopic->OldValue = $this->Ectopic->CurrentValue;
        $this->Extra->CurrentValue = null;
        $this->Extra->OldValue = $this->Extra->CurrentValue;
        $this->Implantation->CurrentValue = null;
        $this->Implantation->OldValue = $this->Implantation->CurrentValue;
        $this->DeliveryDate->CurrentValue = null;
        $this->DeliveryDate->OldValue = $this->DeliveryDate->CurrentValue;
        $this->BabyDetails->CurrentValue = null;
        $this->BabyDetails->OldValue = $this->BabyDetails->CurrentValue;
        $this->LSCSNormal->CurrentValue = null;
        $this->LSCSNormal->OldValue = $this->LSCSNormal->CurrentValue;
        $this->Notes->CurrentValue = null;
        $this->Notes->OldValue = $this->Notes->CurrentValue;
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

        // Check field name 'RIDNO' first before field var 'x_RIDNO'
        $val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
        if (!$this->RIDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNO->Visible = false; // Disable update for API request
            } else {
                $this->RIDNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RIDNO")) {
            $this->RIDNO->setOldValue($CurrentForm->getValue("o_RIDNO"));
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

        // Check field name 'treatment_status' first before field var 'x_treatment_status'
        $val = $CurrentForm->hasValue("treatment_status") ? $CurrentForm->getValue("treatment_status") : $CurrentForm->getValue("x_treatment_status");
        if (!$this->treatment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->treatment_status->Visible = false; // Disable update for API request
            } else {
                $this->treatment_status->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_treatment_status")) {
            $this->treatment_status->setOldValue($CurrentForm->getValue("o_treatment_status"));
        }

        // Check field name 'ARTCYCLE' first before field var 'x_ARTCYCLE'
        $val = $CurrentForm->hasValue("ARTCYCLE") ? $CurrentForm->getValue("ARTCYCLE") : $CurrentForm->getValue("x_ARTCYCLE");
        if (!$this->ARTCYCLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ARTCYCLE->Visible = false; // Disable update for API request
            } else {
                $this->ARTCYCLE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ARTCYCLE")) {
            $this->ARTCYCLE->setOldValue($CurrentForm->getValue("o_ARTCYCLE"));
        }

        // Check field name 'RESULT' first before field var 'x_RESULT'
        $val = $CurrentForm->hasValue("RESULT") ? $CurrentForm->getValue("RESULT") : $CurrentForm->getValue("x_RESULT");
        if (!$this->RESULT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RESULT->Visible = false; // Disable update for API request
            } else {
                $this->RESULT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RESULT")) {
            $this->RESULT->setOldValue($CurrentForm->getValue("o_RESULT"));
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

        // Check field name 'outcomeDate' first before field var 'x_outcomeDate'
        $val = $CurrentForm->hasValue("outcomeDate") ? $CurrentForm->getValue("outcomeDate") : $CurrentForm->getValue("x_outcomeDate");
        if (!$this->outcomeDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->outcomeDate->Visible = false; // Disable update for API request
            } else {
                $this->outcomeDate->setFormValue($val);
            }
            $this->outcomeDate->CurrentValue = UnFormatDateTime($this->outcomeDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_outcomeDate")) {
            $this->outcomeDate->setOldValue($CurrentForm->getValue("o_outcomeDate"));
        }

        // Check field name 'outcomeDay' first before field var 'x_outcomeDay'
        $val = $CurrentForm->hasValue("outcomeDay") ? $CurrentForm->getValue("outcomeDay") : $CurrentForm->getValue("x_outcomeDay");
        if (!$this->outcomeDay->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->outcomeDay->Visible = false; // Disable update for API request
            } else {
                $this->outcomeDay->setFormValue($val);
            }
            $this->outcomeDay->CurrentValue = UnFormatDateTime($this->outcomeDay->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_outcomeDay")) {
            $this->outcomeDay->setOldValue($CurrentForm->getValue("o_outcomeDay"));
        }

        // Check field name 'OPResult' first before field var 'x_OPResult'
        $val = $CurrentForm->hasValue("OPResult") ? $CurrentForm->getValue("OPResult") : $CurrentForm->getValue("x_OPResult");
        if (!$this->OPResult->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPResult->Visible = false; // Disable update for API request
            } else {
                $this->OPResult->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_OPResult")) {
            $this->OPResult->setOldValue($CurrentForm->getValue("o_OPResult"));
        }

        // Check field name 'Gestation' first before field var 'x_Gestation'
        $val = $CurrentForm->hasValue("Gestation") ? $CurrentForm->getValue("Gestation") : $CurrentForm->getValue("x_Gestation");
        if (!$this->Gestation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gestation->Visible = false; // Disable update for API request
            } else {
                $this->Gestation->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Gestation")) {
            $this->Gestation->setOldValue($CurrentForm->getValue("o_Gestation"));
        }

        // Check field name 'TransferdEmbryos' first before field var 'x_TransferdEmbryos'
        $val = $CurrentForm->hasValue("TransferdEmbryos") ? $CurrentForm->getValue("TransferdEmbryos") : $CurrentForm->getValue("x_TransferdEmbryos");
        if (!$this->TransferdEmbryos->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransferdEmbryos->Visible = false; // Disable update for API request
            } else {
                $this->TransferdEmbryos->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TransferdEmbryos")) {
            $this->TransferdEmbryos->setOldValue($CurrentForm->getValue("o_TransferdEmbryos"));
        }

        // Check field name 'InitalOfSacs' first before field var 'x_InitalOfSacs'
        $val = $CurrentForm->hasValue("InitalOfSacs") ? $CurrentForm->getValue("InitalOfSacs") : $CurrentForm->getValue("x_InitalOfSacs");
        if (!$this->InitalOfSacs->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InitalOfSacs->Visible = false; // Disable update for API request
            } else {
                $this->InitalOfSacs->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_InitalOfSacs")) {
            $this->InitalOfSacs->setOldValue($CurrentForm->getValue("o_InitalOfSacs"));
        }

        // Check field name 'ImplimentationRate' first before field var 'x_ImplimentationRate'
        $val = $CurrentForm->hasValue("ImplimentationRate") ? $CurrentForm->getValue("ImplimentationRate") : $CurrentForm->getValue("x_ImplimentationRate");
        if (!$this->ImplimentationRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ImplimentationRate->Visible = false; // Disable update for API request
            } else {
                $this->ImplimentationRate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ImplimentationRate")) {
            $this->ImplimentationRate->setOldValue($CurrentForm->getValue("o_ImplimentationRate"));
        }

        // Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
        $val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
        if (!$this->EmbryoNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryoNo->Visible = false; // Disable update for API request
            } else {
                $this->EmbryoNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_EmbryoNo")) {
            $this->EmbryoNo->setOldValue($CurrentForm->getValue("o_EmbryoNo"));
        }

        // Check field name 'ExtrauterineSac' first before field var 'x_ExtrauterineSac'
        $val = $CurrentForm->hasValue("ExtrauterineSac") ? $CurrentForm->getValue("ExtrauterineSac") : $CurrentForm->getValue("x_ExtrauterineSac");
        if (!$this->ExtrauterineSac->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExtrauterineSac->Visible = false; // Disable update for API request
            } else {
                $this->ExtrauterineSac->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ExtrauterineSac")) {
            $this->ExtrauterineSac->setOldValue($CurrentForm->getValue("o_ExtrauterineSac"));
        }

        // Check field name 'PregnancyMonozygotic' first before field var 'x_PregnancyMonozygotic'
        $val = $CurrentForm->hasValue("PregnancyMonozygotic") ? $CurrentForm->getValue("PregnancyMonozygotic") : $CurrentForm->getValue("x_PregnancyMonozygotic");
        if (!$this->PregnancyMonozygotic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PregnancyMonozygotic->Visible = false; // Disable update for API request
            } else {
                $this->PregnancyMonozygotic->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PregnancyMonozygotic")) {
            $this->PregnancyMonozygotic->setOldValue($CurrentForm->getValue("o_PregnancyMonozygotic"));
        }

        // Check field name 'TypeGestation' first before field var 'x_TypeGestation'
        $val = $CurrentForm->hasValue("TypeGestation") ? $CurrentForm->getValue("TypeGestation") : $CurrentForm->getValue("x_TypeGestation");
        if (!$this->TypeGestation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeGestation->Visible = false; // Disable update for API request
            } else {
                $this->TypeGestation->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TypeGestation")) {
            $this->TypeGestation->setOldValue($CurrentForm->getValue("o_TypeGestation"));
        }

        // Check field name 'Urine' first before field var 'x_Urine'
        $val = $CurrentForm->hasValue("Urine") ? $CurrentForm->getValue("Urine") : $CurrentForm->getValue("x_Urine");
        if (!$this->Urine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Urine->Visible = false; // Disable update for API request
            } else {
                $this->Urine->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Urine")) {
            $this->Urine->setOldValue($CurrentForm->getValue("o_Urine"));
        }

        // Check field name 'PTdate' first before field var 'x_PTdate'
        $val = $CurrentForm->hasValue("PTdate") ? $CurrentForm->getValue("PTdate") : $CurrentForm->getValue("x_PTdate");
        if (!$this->PTdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PTdate->Visible = false; // Disable update for API request
            } else {
                $this->PTdate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PTdate")) {
            $this->PTdate->setOldValue($CurrentForm->getValue("o_PTdate"));
        }

        // Check field name 'Reduced' first before field var 'x_Reduced'
        $val = $CurrentForm->hasValue("Reduced") ? $CurrentForm->getValue("Reduced") : $CurrentForm->getValue("x_Reduced");
        if (!$this->Reduced->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reduced->Visible = false; // Disable update for API request
            } else {
                $this->Reduced->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Reduced")) {
            $this->Reduced->setOldValue($CurrentForm->getValue("o_Reduced"));
        }

        // Check field name 'INduced' first before field var 'x_INduced'
        $val = $CurrentForm->hasValue("INduced") ? $CurrentForm->getValue("INduced") : $CurrentForm->getValue("x_INduced");
        if (!$this->INduced->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INduced->Visible = false; // Disable update for API request
            } else {
                $this->INduced->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_INduced")) {
            $this->INduced->setOldValue($CurrentForm->getValue("o_INduced"));
        }

        // Check field name 'INducedDate' first before field var 'x_INducedDate'
        $val = $CurrentForm->hasValue("INducedDate") ? $CurrentForm->getValue("INducedDate") : $CurrentForm->getValue("x_INducedDate");
        if (!$this->INducedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INducedDate->Visible = false; // Disable update for API request
            } else {
                $this->INducedDate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_INducedDate")) {
            $this->INducedDate->setOldValue($CurrentForm->getValue("o_INducedDate"));
        }

        // Check field name 'Miscarriage' first before field var 'x_Miscarriage'
        $val = $CurrentForm->hasValue("Miscarriage") ? $CurrentForm->getValue("Miscarriage") : $CurrentForm->getValue("x_Miscarriage");
        if (!$this->Miscarriage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Miscarriage->Visible = false; // Disable update for API request
            } else {
                $this->Miscarriage->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Miscarriage")) {
            $this->Miscarriage->setOldValue($CurrentForm->getValue("o_Miscarriage"));
        }

        // Check field name 'Induced1' first before field var 'x_Induced1'
        $val = $CurrentForm->hasValue("Induced1") ? $CurrentForm->getValue("Induced1") : $CurrentForm->getValue("x_Induced1");
        if (!$this->Induced1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Induced1->Visible = false; // Disable update for API request
            } else {
                $this->Induced1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Induced1")) {
            $this->Induced1->setOldValue($CurrentForm->getValue("o_Induced1"));
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

        // Check field name 'IfClinical' first before field var 'x_IfClinical'
        $val = $CurrentForm->hasValue("IfClinical") ? $CurrentForm->getValue("IfClinical") : $CurrentForm->getValue("x_IfClinical");
        if (!$this->IfClinical->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IfClinical->Visible = false; // Disable update for API request
            } else {
                $this->IfClinical->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IfClinical")) {
            $this->IfClinical->setOldValue($CurrentForm->getValue("o_IfClinical"));
        }

        // Check field name 'GADate' first before field var 'x_GADate'
        $val = $CurrentForm->hasValue("GADate") ? $CurrentForm->getValue("GADate") : $CurrentForm->getValue("x_GADate");
        if (!$this->GADate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GADate->Visible = false; // Disable update for API request
            } else {
                $this->GADate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GADate")) {
            $this->GADate->setOldValue($CurrentForm->getValue("o_GADate"));
        }

        // Check field name 'GA' first before field var 'x_GA'
        $val = $CurrentForm->hasValue("GA") ? $CurrentForm->getValue("GA") : $CurrentForm->getValue("x_GA");
        if (!$this->GA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GA->Visible = false; // Disable update for API request
            } else {
                $this->GA->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GA")) {
            $this->GA->setOldValue($CurrentForm->getValue("o_GA"));
        }

        // Check field name 'FoetalDeath' first before field var 'x_FoetalDeath'
        $val = $CurrentForm->hasValue("FoetalDeath") ? $CurrentForm->getValue("FoetalDeath") : $CurrentForm->getValue("x_FoetalDeath");
        if (!$this->FoetalDeath->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FoetalDeath->Visible = false; // Disable update for API request
            } else {
                $this->FoetalDeath->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_FoetalDeath")) {
            $this->FoetalDeath->setOldValue($CurrentForm->getValue("o_FoetalDeath"));
        }

        // Check field name 'FerinatalDeath' first before field var 'x_FerinatalDeath'
        $val = $CurrentForm->hasValue("FerinatalDeath") ? $CurrentForm->getValue("FerinatalDeath") : $CurrentForm->getValue("x_FerinatalDeath");
        if (!$this->FerinatalDeath->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FerinatalDeath->Visible = false; // Disable update for API request
            } else {
                $this->FerinatalDeath->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_FerinatalDeath")) {
            $this->FerinatalDeath->setOldValue($CurrentForm->getValue("o_FerinatalDeath"));
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

        // Check field name 'Ectopic' first before field var 'x_Ectopic'
        $val = $CurrentForm->hasValue("Ectopic") ? $CurrentForm->getValue("Ectopic") : $CurrentForm->getValue("x_Ectopic");
        if (!$this->Ectopic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Ectopic->Visible = false; // Disable update for API request
            } else {
                $this->Ectopic->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Ectopic")) {
            $this->Ectopic->setOldValue($CurrentForm->getValue("o_Ectopic"));
        }

        // Check field name 'Extra' first before field var 'x_Extra'
        $val = $CurrentForm->hasValue("Extra") ? $CurrentForm->getValue("Extra") : $CurrentForm->getValue("x_Extra");
        if (!$this->Extra->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Extra->Visible = false; // Disable update for API request
            } else {
                $this->Extra->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Extra")) {
            $this->Extra->setOldValue($CurrentForm->getValue("o_Extra"));
        }

        // Check field name 'Implantation' first before field var 'x_Implantation'
        $val = $CurrentForm->hasValue("Implantation") ? $CurrentForm->getValue("Implantation") : $CurrentForm->getValue("x_Implantation");
        if (!$this->Implantation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Implantation->Visible = false; // Disable update for API request
            } else {
                $this->Implantation->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Implantation")) {
            $this->Implantation->setOldValue($CurrentForm->getValue("o_Implantation"));
        }

        // Check field name 'DeliveryDate' first before field var 'x_DeliveryDate'
        $val = $CurrentForm->hasValue("DeliveryDate") ? $CurrentForm->getValue("DeliveryDate") : $CurrentForm->getValue("x_DeliveryDate");
        if (!$this->DeliveryDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeliveryDate->Visible = false; // Disable update for API request
            } else {
                $this->DeliveryDate->setFormValue($val);
            }
            $this->DeliveryDate->CurrentValue = UnFormatDateTime($this->DeliveryDate->CurrentValue, 7);
        }
        if ($CurrentForm->hasValue("o_DeliveryDate")) {
            $this->DeliveryDate->setOldValue($CurrentForm->getValue("o_DeliveryDate"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->treatment_status->CurrentValue = $this->treatment_status->FormValue;
        $this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
        $this->RESULT->CurrentValue = $this->RESULT->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->outcomeDate->CurrentValue = $this->outcomeDate->FormValue;
        $this->outcomeDate->CurrentValue = UnFormatDateTime($this->outcomeDate->CurrentValue, 0);
        $this->outcomeDay->CurrentValue = $this->outcomeDay->FormValue;
        $this->outcomeDay->CurrentValue = UnFormatDateTime($this->outcomeDay->CurrentValue, 0);
        $this->OPResult->CurrentValue = $this->OPResult->FormValue;
        $this->Gestation->CurrentValue = $this->Gestation->FormValue;
        $this->TransferdEmbryos->CurrentValue = $this->TransferdEmbryos->FormValue;
        $this->InitalOfSacs->CurrentValue = $this->InitalOfSacs->FormValue;
        $this->ImplimentationRate->CurrentValue = $this->ImplimentationRate->FormValue;
        $this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
        $this->ExtrauterineSac->CurrentValue = $this->ExtrauterineSac->FormValue;
        $this->PregnancyMonozygotic->CurrentValue = $this->PregnancyMonozygotic->FormValue;
        $this->TypeGestation->CurrentValue = $this->TypeGestation->FormValue;
        $this->Urine->CurrentValue = $this->Urine->FormValue;
        $this->PTdate->CurrentValue = $this->PTdate->FormValue;
        $this->Reduced->CurrentValue = $this->Reduced->FormValue;
        $this->INduced->CurrentValue = $this->INduced->FormValue;
        $this->INducedDate->CurrentValue = $this->INducedDate->FormValue;
        $this->Miscarriage->CurrentValue = $this->Miscarriage->FormValue;
        $this->Induced1->CurrentValue = $this->Induced1->FormValue;
        $this->Type->CurrentValue = $this->Type->FormValue;
        $this->IfClinical->CurrentValue = $this->IfClinical->FormValue;
        $this->GADate->CurrentValue = $this->GADate->FormValue;
        $this->GA->CurrentValue = $this->GA->FormValue;
        $this->FoetalDeath->CurrentValue = $this->FoetalDeath->FormValue;
        $this->FerinatalDeath->CurrentValue = $this->FerinatalDeath->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->Ectopic->CurrentValue = $this->Ectopic->FormValue;
        $this->Extra->CurrentValue = $this->Extra->FormValue;
        $this->Implantation->CurrentValue = $this->Implantation->FormValue;
        $this->DeliveryDate->CurrentValue = $this->DeliveryDate->FormValue;
        $this->DeliveryDate->CurrentValue = UnFormatDateTime($this->DeliveryDate->CurrentValue, 7);
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->outcomeDate->setDbValue($row['outcomeDate']);
        $this->outcomeDay->setDbValue($row['outcomeDay']);
        $this->OPResult->setDbValue($row['OPResult']);
        $this->Gestation->setDbValue($row['Gestation']);
        $this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
        $this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
        $this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
        $this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
        $this->TypeGestation->setDbValue($row['TypeGestation']);
        $this->Urine->setDbValue($row['Urine']);
        $this->PTdate->setDbValue($row['PTdate']);
        $this->Reduced->setDbValue($row['Reduced']);
        $this->INduced->setDbValue($row['INduced']);
        $this->INducedDate->setDbValue($row['INducedDate']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->Induced1->setDbValue($row['Induced1']);
        $this->Type->setDbValue($row['Type']);
        $this->IfClinical->setDbValue($row['IfClinical']);
        $this->GADate->setDbValue($row['GADate']);
        $this->GA->setDbValue($row['GA']);
        $this->FoetalDeath->setDbValue($row['FoetalDeath']);
        $this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Extra->setDbValue($row['Extra']);
        $this->Implantation->setDbValue($row['Implantation']);
        $this->DeliveryDate->setDbValue($row['DeliveryDate']);
        $this->BabyDetails->setDbValue($row['BabyDetails']);
        $this->LSCSNormal->setDbValue($row['LSCSNormal']);
        $this->Notes->setDbValue($row['Notes']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNO'] = $this->RIDNO->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['treatment_status'] = $this->treatment_status->CurrentValue;
        $row['ARTCYCLE'] = $this->ARTCYCLE->CurrentValue;
        $row['RESULT'] = $this->RESULT->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['outcomeDate'] = $this->outcomeDate->CurrentValue;
        $row['outcomeDay'] = $this->outcomeDay->CurrentValue;
        $row['OPResult'] = $this->OPResult->CurrentValue;
        $row['Gestation'] = $this->Gestation->CurrentValue;
        $row['TransferdEmbryos'] = $this->TransferdEmbryos->CurrentValue;
        $row['InitalOfSacs'] = $this->InitalOfSacs->CurrentValue;
        $row['ImplimentationRate'] = $this->ImplimentationRate->CurrentValue;
        $row['EmbryoNo'] = $this->EmbryoNo->CurrentValue;
        $row['ExtrauterineSac'] = $this->ExtrauterineSac->CurrentValue;
        $row['PregnancyMonozygotic'] = $this->PregnancyMonozygotic->CurrentValue;
        $row['TypeGestation'] = $this->TypeGestation->CurrentValue;
        $row['Urine'] = $this->Urine->CurrentValue;
        $row['PTdate'] = $this->PTdate->CurrentValue;
        $row['Reduced'] = $this->Reduced->CurrentValue;
        $row['INduced'] = $this->INduced->CurrentValue;
        $row['INducedDate'] = $this->INducedDate->CurrentValue;
        $row['Miscarriage'] = $this->Miscarriage->CurrentValue;
        $row['Induced1'] = $this->Induced1->CurrentValue;
        $row['Type'] = $this->Type->CurrentValue;
        $row['IfClinical'] = $this->IfClinical->CurrentValue;
        $row['GADate'] = $this->GADate->CurrentValue;
        $row['GA'] = $this->GA->CurrentValue;
        $row['FoetalDeath'] = $this->FoetalDeath->CurrentValue;
        $row['FerinatalDeath'] = $this->FerinatalDeath->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['Ectopic'] = $this->Ectopic->CurrentValue;
        $row['Extra'] = $this->Extra->CurrentValue;
        $row['Implantation'] = $this->Implantation->CurrentValue;
        $row['DeliveryDate'] = $this->DeliveryDate->CurrentValue;
        $row['BabyDetails'] = $this->BabyDetails->CurrentValue;
        $row['LSCSNormal'] = $this->LSCSNormal->CurrentValue;
        $row['Notes'] = $this->Notes->CurrentValue;
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

        // RIDNO

        // Name

        // Age

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // outcomeDate

        // outcomeDay

        // OPResult

        // Gestation

        // TransferdEmbryos

        // InitalOfSacs

        // ImplimentationRate

        // EmbryoNo

        // ExtrauterineSac

        // PregnancyMonozygotic

        // TypeGestation

        // Urine

        // PTdate

        // Reduced

        // INduced

        // INducedDate

        // Miscarriage

        // Induced1

        // Type

        // IfClinical

        // GADate

        // GA

        // FoetalDeath

        // FerinatalDeath

        // TidNo

        // Ectopic

        // Extra

        // Implantation

        // DeliveryDate

        // BabyDetails

        // LSCSNormal

        // Notes
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // treatment_status
            $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
            $this->treatment_status->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // outcomeDate
            $this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
            $this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
            $this->outcomeDate->ViewCustomAttributes = "";

            // outcomeDay
            $this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
            $this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
            $this->outcomeDay->ViewCustomAttributes = "";

            // OPResult
            $this->OPResult->ViewValue = $this->OPResult->CurrentValue;
            $this->OPResult->ViewCustomAttributes = "";

            // Gestation
            if (strval($this->Gestation->CurrentValue) != "") {
                $this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
            } else {
                $this->Gestation->ViewValue = null;
            }
            $this->Gestation->ViewCustomAttributes = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
            $this->TransferdEmbryos->ViewCustomAttributes = "";

            // InitalOfSacs
            $this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
            $this->InitalOfSacs->ViewCustomAttributes = "";

            // ImplimentationRate
            $this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
            $this->ImplimentationRate->ViewCustomAttributes = "";

            // EmbryoNo
            $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
            $this->EmbryoNo->ViewCustomAttributes = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
            $this->ExtrauterineSac->ViewCustomAttributes = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
            $this->PregnancyMonozygotic->ViewCustomAttributes = "";

            // TypeGestation
            $this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
            $this->TypeGestation->ViewCustomAttributes = "";

            // Urine
            if (strval($this->Urine->CurrentValue) != "") {
                $this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
            } else {
                $this->Urine->ViewValue = null;
            }
            $this->Urine->ViewCustomAttributes = "";

            // PTdate
            $this->PTdate->ViewValue = $this->PTdate->CurrentValue;
            $this->PTdate->ViewCustomAttributes = "";

            // Reduced
            $this->Reduced->ViewValue = $this->Reduced->CurrentValue;
            $this->Reduced->ViewCustomAttributes = "";

            // INduced
            $this->INduced->ViewValue = $this->INduced->CurrentValue;
            $this->INduced->ViewCustomAttributes = "";

            // INducedDate
            $this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
            $this->INducedDate->ViewCustomAttributes = "";

            // Miscarriage
            if (strval($this->Miscarriage->CurrentValue) != "") {
                $this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
            } else {
                $this->Miscarriage->ViewValue = null;
            }
            $this->Miscarriage->ViewCustomAttributes = "";

            // Induced1
            if (strval($this->Induced1->CurrentValue) != "") {
                $this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
            } else {
                $this->Induced1->ViewValue = null;
            }
            $this->Induced1->ViewCustomAttributes = "";

            // Type
            if (strval($this->Type->CurrentValue) != "") {
                $this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
            } else {
                $this->Type->ViewValue = null;
            }
            $this->Type->ViewCustomAttributes = "";

            // IfClinical
            $this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
            $this->IfClinical->ViewCustomAttributes = "";

            // GADate
            $this->GADate->ViewValue = $this->GADate->CurrentValue;
            $this->GADate->ViewCustomAttributes = "";

            // GA
            $this->GA->ViewValue = $this->GA->CurrentValue;
            $this->GA->ViewCustomAttributes = "";

            // FoetalDeath
            if (strval($this->FoetalDeath->CurrentValue) != "") {
                $this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
            } else {
                $this->FoetalDeath->ViewValue = null;
            }
            $this->FoetalDeath->ViewCustomAttributes = "";

            // FerinatalDeath
            if (strval($this->FerinatalDeath->CurrentValue) != "") {
                $this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
            } else {
                $this->FerinatalDeath->ViewValue = null;
            }
            $this->FerinatalDeath->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Ectopic
            if (strval($this->Ectopic->CurrentValue) != "") {
                $this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
            } else {
                $this->Ectopic->ViewValue = null;
            }
            $this->Ectopic->ViewCustomAttributes = "";

            // Extra
            if (strval($this->Extra->CurrentValue) != "") {
                $this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
            } else {
                $this->Extra->ViewValue = null;
            }
            $this->Extra->ViewCustomAttributes = "";

            // Implantation
            $this->Implantation->ViewValue = $this->Implantation->CurrentValue;
            $this->Implantation->ViewCustomAttributes = "";

            // DeliveryDate
            $this->DeliveryDate->ViewValue = $this->DeliveryDate->CurrentValue;
            $this->DeliveryDate->ViewValue = FormatDateTime($this->DeliveryDate->ViewValue, 7);
            $this->DeliveryDate->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";
            $this->treatment_status->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

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

            // outcomeDate
            $this->outcomeDate->LinkCustomAttributes = "";
            $this->outcomeDate->HrefValue = "";
            $this->outcomeDate->TooltipValue = "";

            // outcomeDay
            $this->outcomeDay->LinkCustomAttributes = "";
            $this->outcomeDay->HrefValue = "";
            $this->outcomeDay->TooltipValue = "";

            // OPResult
            $this->OPResult->LinkCustomAttributes = "";
            $this->OPResult->HrefValue = "";
            $this->OPResult->TooltipValue = "";

            // Gestation
            $this->Gestation->LinkCustomAttributes = "";
            $this->Gestation->HrefValue = "";
            $this->Gestation->TooltipValue = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->LinkCustomAttributes = "";
            $this->TransferdEmbryos->HrefValue = "";
            $this->TransferdEmbryos->TooltipValue = "";

            // InitalOfSacs
            $this->InitalOfSacs->LinkCustomAttributes = "";
            $this->InitalOfSacs->HrefValue = "";
            $this->InitalOfSacs->TooltipValue = "";

            // ImplimentationRate
            $this->ImplimentationRate->LinkCustomAttributes = "";
            $this->ImplimentationRate->HrefValue = "";
            $this->ImplimentationRate->TooltipValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";
            $this->EmbryoNo->TooltipValue = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->LinkCustomAttributes = "";
            $this->ExtrauterineSac->HrefValue = "";
            $this->ExtrauterineSac->TooltipValue = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->LinkCustomAttributes = "";
            $this->PregnancyMonozygotic->HrefValue = "";
            $this->PregnancyMonozygotic->TooltipValue = "";

            // TypeGestation
            $this->TypeGestation->LinkCustomAttributes = "";
            $this->TypeGestation->HrefValue = "";
            $this->TypeGestation->TooltipValue = "";

            // Urine
            $this->Urine->LinkCustomAttributes = "";
            $this->Urine->HrefValue = "";
            $this->Urine->TooltipValue = "";

            // PTdate
            $this->PTdate->LinkCustomAttributes = "";
            $this->PTdate->HrefValue = "";
            $this->PTdate->TooltipValue = "";

            // Reduced
            $this->Reduced->LinkCustomAttributes = "";
            $this->Reduced->HrefValue = "";
            $this->Reduced->TooltipValue = "";

            // INduced
            $this->INduced->LinkCustomAttributes = "";
            $this->INduced->HrefValue = "";
            $this->INduced->TooltipValue = "";

            // INducedDate
            $this->INducedDate->LinkCustomAttributes = "";
            $this->INducedDate->HrefValue = "";
            $this->INducedDate->TooltipValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";
            $this->Miscarriage->TooltipValue = "";

            // Induced1
            $this->Induced1->LinkCustomAttributes = "";
            $this->Induced1->HrefValue = "";
            $this->Induced1->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // IfClinical
            $this->IfClinical->LinkCustomAttributes = "";
            $this->IfClinical->HrefValue = "";
            $this->IfClinical->TooltipValue = "";

            // GADate
            $this->GADate->LinkCustomAttributes = "";
            $this->GADate->HrefValue = "";
            $this->GADate->TooltipValue = "";

            // GA
            $this->GA->LinkCustomAttributes = "";
            $this->GA->HrefValue = "";
            $this->GA->TooltipValue = "";

            // FoetalDeath
            $this->FoetalDeath->LinkCustomAttributes = "";
            $this->FoetalDeath->HrefValue = "";
            $this->FoetalDeath->TooltipValue = "";

            // FerinatalDeath
            $this->FerinatalDeath->LinkCustomAttributes = "";
            $this->FerinatalDeath->HrefValue = "";
            $this->FerinatalDeath->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";
            $this->Ectopic->TooltipValue = "";

            // Extra
            $this->Extra->LinkCustomAttributes = "";
            $this->Extra->HrefValue = "";
            $this->Extra->TooltipValue = "";

            // Implantation
            $this->Implantation->LinkCustomAttributes = "";
            $this->Implantation->HrefValue = "";
            $this->Implantation->TooltipValue = "";

            // DeliveryDate
            $this->DeliveryDate->LinkCustomAttributes = "";
            $this->DeliveryDate->HrefValue = "";
            $this->DeliveryDate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            if ($this->RIDNO->getSessionValue() != "") {
                $this->RIDNO->CurrentValue = GetForeignKeyValue($this->RIDNO->getSessionValue());
                $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
                $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
                $this->RIDNO->ViewCustomAttributes = "";
            } else {
                $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
                $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
            }

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if ($this->Name->getSessionValue() != "") {
                $this->Name->CurrentValue = GetForeignKeyValue($this->Name->getSessionValue());
                $this->Name->OldValue = $this->Name->CurrentValue;
                $this->Name->ViewValue = $this->Name->CurrentValue;
                $this->Name->ViewCustomAttributes = "";
            } else {
                if (!$this->Name->Raw) {
                    $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
                }
                $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
                $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
            }

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // treatment_status
            $this->treatment_status->EditAttrs["class"] = "form-control";
            $this->treatment_status->EditCustomAttributes = "";
            if (!$this->treatment_status->Raw) {
                $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
            }
            $this->treatment_status->EditValue = HtmlEncode($this->treatment_status->CurrentValue);
            $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

            // ARTCYCLE
            $this->ARTCYCLE->EditAttrs["class"] = "form-control";
            $this->ARTCYCLE->EditCustomAttributes = "";
            if (!$this->ARTCYCLE->Raw) {
                $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
            }
            $this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->CurrentValue);
            $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

            // RESULT
            $this->RESULT->EditAttrs["class"] = "form-control";
            $this->RESULT->EditCustomAttributes = "";
            if (!$this->RESULT->Raw) {
                $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
            }
            $this->RESULT->EditValue = HtmlEncode($this->RESULT->CurrentValue);
            $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // outcomeDate
            $this->outcomeDate->EditAttrs["class"] = "form-control";
            $this->outcomeDate->EditCustomAttributes = "";
            $this->outcomeDate->EditValue = HtmlEncode(FormatDateTime($this->outcomeDate->CurrentValue, 8));
            $this->outcomeDate->PlaceHolder = RemoveHtml($this->outcomeDate->caption());

            // outcomeDay
            $this->outcomeDay->EditAttrs["class"] = "form-control";
            $this->outcomeDay->EditCustomAttributes = "";
            $this->outcomeDay->EditValue = HtmlEncode(FormatDateTime($this->outcomeDay->CurrentValue, 8));
            $this->outcomeDay->PlaceHolder = RemoveHtml($this->outcomeDay->caption());

            // OPResult
            $this->OPResult->EditAttrs["class"] = "form-control";
            $this->OPResult->EditCustomAttributes = "";
            if (!$this->OPResult->Raw) {
                $this->OPResult->CurrentValue = HtmlDecode($this->OPResult->CurrentValue);
            }
            $this->OPResult->EditValue = HtmlEncode($this->OPResult->CurrentValue);
            $this->OPResult->PlaceHolder = RemoveHtml($this->OPResult->caption());

            // Gestation
            $this->Gestation->EditCustomAttributes = "";
            $this->Gestation->EditValue = $this->Gestation->options(false);
            $this->Gestation->PlaceHolder = RemoveHtml($this->Gestation->caption());

            // TransferdEmbryos
            $this->TransferdEmbryos->EditAttrs["class"] = "form-control";
            $this->TransferdEmbryos->EditCustomAttributes = "";
            if (!$this->TransferdEmbryos->Raw) {
                $this->TransferdEmbryos->CurrentValue = HtmlDecode($this->TransferdEmbryos->CurrentValue);
            }
            $this->TransferdEmbryos->EditValue = HtmlEncode($this->TransferdEmbryos->CurrentValue);
            $this->TransferdEmbryos->PlaceHolder = RemoveHtml($this->TransferdEmbryos->caption());

            // InitalOfSacs
            $this->InitalOfSacs->EditAttrs["class"] = "form-control";
            $this->InitalOfSacs->EditCustomAttributes = "";
            if (!$this->InitalOfSacs->Raw) {
                $this->InitalOfSacs->CurrentValue = HtmlDecode($this->InitalOfSacs->CurrentValue);
            }
            $this->InitalOfSacs->EditValue = HtmlEncode($this->InitalOfSacs->CurrentValue);
            $this->InitalOfSacs->PlaceHolder = RemoveHtml($this->InitalOfSacs->caption());

            // ImplimentationRate
            $this->ImplimentationRate->EditAttrs["class"] = "form-control";
            $this->ImplimentationRate->EditCustomAttributes = "";
            if (!$this->ImplimentationRate->Raw) {
                $this->ImplimentationRate->CurrentValue = HtmlDecode($this->ImplimentationRate->CurrentValue);
            }
            $this->ImplimentationRate->EditValue = HtmlEncode($this->ImplimentationRate->CurrentValue);
            $this->ImplimentationRate->PlaceHolder = RemoveHtml($this->ImplimentationRate->caption());

            // EmbryoNo
            $this->EmbryoNo->EditAttrs["class"] = "form-control";
            $this->EmbryoNo->EditCustomAttributes = "";
            if (!$this->EmbryoNo->Raw) {
                $this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
            }
            $this->EmbryoNo->EditValue = HtmlEncode($this->EmbryoNo->CurrentValue);
            $this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

            // ExtrauterineSac
            $this->ExtrauterineSac->EditAttrs["class"] = "form-control";
            $this->ExtrauterineSac->EditCustomAttributes = "";
            if (!$this->ExtrauterineSac->Raw) {
                $this->ExtrauterineSac->CurrentValue = HtmlDecode($this->ExtrauterineSac->CurrentValue);
            }
            $this->ExtrauterineSac->EditValue = HtmlEncode($this->ExtrauterineSac->CurrentValue);
            $this->ExtrauterineSac->PlaceHolder = RemoveHtml($this->ExtrauterineSac->caption());

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->EditAttrs["class"] = "form-control";
            $this->PregnancyMonozygotic->EditCustomAttributes = "";
            if (!$this->PregnancyMonozygotic->Raw) {
                $this->PregnancyMonozygotic->CurrentValue = HtmlDecode($this->PregnancyMonozygotic->CurrentValue);
            }
            $this->PregnancyMonozygotic->EditValue = HtmlEncode($this->PregnancyMonozygotic->CurrentValue);
            $this->PregnancyMonozygotic->PlaceHolder = RemoveHtml($this->PregnancyMonozygotic->caption());

            // TypeGestation
            $this->TypeGestation->EditAttrs["class"] = "form-control";
            $this->TypeGestation->EditCustomAttributes = "";
            if (!$this->TypeGestation->Raw) {
                $this->TypeGestation->CurrentValue = HtmlDecode($this->TypeGestation->CurrentValue);
            }
            $this->TypeGestation->EditValue = HtmlEncode($this->TypeGestation->CurrentValue);
            $this->TypeGestation->PlaceHolder = RemoveHtml($this->TypeGestation->caption());

            // Urine
            $this->Urine->EditAttrs["class"] = "form-control";
            $this->Urine->EditCustomAttributes = "";
            $this->Urine->EditValue = $this->Urine->options(true);
            $this->Urine->PlaceHolder = RemoveHtml($this->Urine->caption());

            // PTdate
            $this->PTdate->EditAttrs["class"] = "form-control";
            $this->PTdate->EditCustomAttributes = "";
            if (!$this->PTdate->Raw) {
                $this->PTdate->CurrentValue = HtmlDecode($this->PTdate->CurrentValue);
            }
            $this->PTdate->EditValue = HtmlEncode($this->PTdate->CurrentValue);
            $this->PTdate->PlaceHolder = RemoveHtml($this->PTdate->caption());

            // Reduced
            $this->Reduced->EditAttrs["class"] = "form-control";
            $this->Reduced->EditCustomAttributes = "";
            if (!$this->Reduced->Raw) {
                $this->Reduced->CurrentValue = HtmlDecode($this->Reduced->CurrentValue);
            }
            $this->Reduced->EditValue = HtmlEncode($this->Reduced->CurrentValue);
            $this->Reduced->PlaceHolder = RemoveHtml($this->Reduced->caption());

            // INduced
            $this->INduced->EditAttrs["class"] = "form-control";
            $this->INduced->EditCustomAttributes = "";
            if (!$this->INduced->Raw) {
                $this->INduced->CurrentValue = HtmlDecode($this->INduced->CurrentValue);
            }
            $this->INduced->EditValue = HtmlEncode($this->INduced->CurrentValue);
            $this->INduced->PlaceHolder = RemoveHtml($this->INduced->caption());

            // INducedDate
            $this->INducedDate->EditAttrs["class"] = "form-control";
            $this->INducedDate->EditCustomAttributes = "";
            if (!$this->INducedDate->Raw) {
                $this->INducedDate->CurrentValue = HtmlDecode($this->INducedDate->CurrentValue);
            }
            $this->INducedDate->EditValue = HtmlEncode($this->INducedDate->CurrentValue);
            $this->INducedDate->PlaceHolder = RemoveHtml($this->INducedDate->caption());

            // Miscarriage
            $this->Miscarriage->EditCustomAttributes = "";
            $this->Miscarriage->EditValue = $this->Miscarriage->options(false);
            $this->Miscarriage->PlaceHolder = RemoveHtml($this->Miscarriage->caption());

            // Induced1
            $this->Induced1->EditCustomAttributes = "";
            $this->Induced1->EditValue = $this->Induced1->options(false);
            $this->Induced1->PlaceHolder = RemoveHtml($this->Induced1->caption());

            // Type
            $this->Type->EditCustomAttributes = "";
            $this->Type->EditValue = $this->Type->options(false);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

            // IfClinical
            $this->IfClinical->EditAttrs["class"] = "form-control";
            $this->IfClinical->EditCustomAttributes = "";
            if (!$this->IfClinical->Raw) {
                $this->IfClinical->CurrentValue = HtmlDecode($this->IfClinical->CurrentValue);
            }
            $this->IfClinical->EditValue = HtmlEncode($this->IfClinical->CurrentValue);
            $this->IfClinical->PlaceHolder = RemoveHtml($this->IfClinical->caption());

            // GADate
            $this->GADate->EditAttrs["class"] = "form-control";
            $this->GADate->EditCustomAttributes = "";
            if (!$this->GADate->Raw) {
                $this->GADate->CurrentValue = HtmlDecode($this->GADate->CurrentValue);
            }
            $this->GADate->EditValue = HtmlEncode($this->GADate->CurrentValue);
            $this->GADate->PlaceHolder = RemoveHtml($this->GADate->caption());

            // GA
            $this->GA->EditAttrs["class"] = "form-control";
            $this->GA->EditCustomAttributes = "";
            if (!$this->GA->Raw) {
                $this->GA->CurrentValue = HtmlDecode($this->GA->CurrentValue);
            }
            $this->GA->EditValue = HtmlEncode($this->GA->CurrentValue);
            $this->GA->PlaceHolder = RemoveHtml($this->GA->caption());

            // FoetalDeath
            $this->FoetalDeath->EditAttrs["class"] = "form-control";
            $this->FoetalDeath->EditCustomAttributes = "";
            $this->FoetalDeath->EditValue = $this->FoetalDeath->options(true);
            $this->FoetalDeath->PlaceHolder = RemoveHtml($this->FoetalDeath->caption());

            // FerinatalDeath
            $this->FerinatalDeath->EditAttrs["class"] = "form-control";
            $this->FerinatalDeath->EditCustomAttributes = "";
            $this->FerinatalDeath->EditValue = $this->FerinatalDeath->options(true);
            $this->FerinatalDeath->PlaceHolder = RemoveHtml($this->FerinatalDeath->caption());

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

            // Ectopic
            $this->Ectopic->EditCustomAttributes = "";
            $this->Ectopic->EditValue = $this->Ectopic->options(false);
            $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

            // Extra
            $this->Extra->EditCustomAttributes = "";
            $this->Extra->EditValue = $this->Extra->options(false);
            $this->Extra->PlaceHolder = RemoveHtml($this->Extra->caption());

            // Implantation
            $this->Implantation->EditAttrs["class"] = "form-control";
            $this->Implantation->EditCustomAttributes = "";
            if (!$this->Implantation->Raw) {
                $this->Implantation->CurrentValue = HtmlDecode($this->Implantation->CurrentValue);
            }
            $this->Implantation->EditValue = HtmlEncode($this->Implantation->CurrentValue);
            $this->Implantation->PlaceHolder = RemoveHtml($this->Implantation->caption());

            // DeliveryDate
            $this->DeliveryDate->EditAttrs["class"] = "form-control";
            $this->DeliveryDate->EditCustomAttributes = "";
            $this->DeliveryDate->EditValue = HtmlEncode(FormatDateTime($this->DeliveryDate->CurrentValue, 7));
            $this->DeliveryDate->PlaceHolder = RemoveHtml($this->DeliveryDate->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";

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

            // outcomeDate
            $this->outcomeDate->LinkCustomAttributes = "";
            $this->outcomeDate->HrefValue = "";

            // outcomeDay
            $this->outcomeDay->LinkCustomAttributes = "";
            $this->outcomeDay->HrefValue = "";

            // OPResult
            $this->OPResult->LinkCustomAttributes = "";
            $this->OPResult->HrefValue = "";

            // Gestation
            $this->Gestation->LinkCustomAttributes = "";
            $this->Gestation->HrefValue = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->LinkCustomAttributes = "";
            $this->TransferdEmbryos->HrefValue = "";

            // InitalOfSacs
            $this->InitalOfSacs->LinkCustomAttributes = "";
            $this->InitalOfSacs->HrefValue = "";

            // ImplimentationRate
            $this->ImplimentationRate->LinkCustomAttributes = "";
            $this->ImplimentationRate->HrefValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->LinkCustomAttributes = "";
            $this->ExtrauterineSac->HrefValue = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->LinkCustomAttributes = "";
            $this->PregnancyMonozygotic->HrefValue = "";

            // TypeGestation
            $this->TypeGestation->LinkCustomAttributes = "";
            $this->TypeGestation->HrefValue = "";

            // Urine
            $this->Urine->LinkCustomAttributes = "";
            $this->Urine->HrefValue = "";

            // PTdate
            $this->PTdate->LinkCustomAttributes = "";
            $this->PTdate->HrefValue = "";

            // Reduced
            $this->Reduced->LinkCustomAttributes = "";
            $this->Reduced->HrefValue = "";

            // INduced
            $this->INduced->LinkCustomAttributes = "";
            $this->INduced->HrefValue = "";

            // INducedDate
            $this->INducedDate->LinkCustomAttributes = "";
            $this->INducedDate->HrefValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";

            // Induced1
            $this->Induced1->LinkCustomAttributes = "";
            $this->Induced1->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // IfClinical
            $this->IfClinical->LinkCustomAttributes = "";
            $this->IfClinical->HrefValue = "";

            // GADate
            $this->GADate->LinkCustomAttributes = "";
            $this->GADate->HrefValue = "";

            // GA
            $this->GA->LinkCustomAttributes = "";
            $this->GA->HrefValue = "";

            // FoetalDeath
            $this->FoetalDeath->LinkCustomAttributes = "";
            $this->FoetalDeath->HrefValue = "";

            // FerinatalDeath
            $this->FerinatalDeath->LinkCustomAttributes = "";
            $this->FerinatalDeath->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";

            // Extra
            $this->Extra->LinkCustomAttributes = "";
            $this->Extra->HrefValue = "";

            // Implantation
            $this->Implantation->LinkCustomAttributes = "";
            $this->Implantation->HrefValue = "";

            // DeliveryDate
            $this->DeliveryDate->LinkCustomAttributes = "";
            $this->DeliveryDate->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            if ($this->RIDNO->getSessionValue() != "") {
                $this->RIDNO->CurrentValue = GetForeignKeyValue($this->RIDNO->getSessionValue());
                $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
                $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
                $this->RIDNO->ViewCustomAttributes = "";
            } else {
                $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
                $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
            }

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if ($this->Name->getSessionValue() != "") {
                $this->Name->CurrentValue = GetForeignKeyValue($this->Name->getSessionValue());
                $this->Name->OldValue = $this->Name->CurrentValue;
                $this->Name->ViewValue = $this->Name->CurrentValue;
                $this->Name->ViewCustomAttributes = "";
            } else {
                if (!$this->Name->Raw) {
                    $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
                }
                $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
                $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
            }

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // treatment_status
            $this->treatment_status->EditAttrs["class"] = "form-control";
            $this->treatment_status->EditCustomAttributes = "";
            if (!$this->treatment_status->Raw) {
                $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
            }
            $this->treatment_status->EditValue = HtmlEncode($this->treatment_status->CurrentValue);
            $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

            // ARTCYCLE
            $this->ARTCYCLE->EditAttrs["class"] = "form-control";
            $this->ARTCYCLE->EditCustomAttributes = "";
            if (!$this->ARTCYCLE->Raw) {
                $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
            }
            $this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->CurrentValue);
            $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

            // RESULT
            $this->RESULT->EditAttrs["class"] = "form-control";
            $this->RESULT->EditCustomAttributes = "";
            if (!$this->RESULT->Raw) {
                $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
            }
            $this->RESULT->EditValue = HtmlEncode($this->RESULT->CurrentValue);
            $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // outcomeDate
            $this->outcomeDate->EditAttrs["class"] = "form-control";
            $this->outcomeDate->EditCustomAttributes = "";
            $this->outcomeDate->EditValue = HtmlEncode(FormatDateTime($this->outcomeDate->CurrentValue, 8));
            $this->outcomeDate->PlaceHolder = RemoveHtml($this->outcomeDate->caption());

            // outcomeDay
            $this->outcomeDay->EditAttrs["class"] = "form-control";
            $this->outcomeDay->EditCustomAttributes = "";
            $this->outcomeDay->EditValue = HtmlEncode(FormatDateTime($this->outcomeDay->CurrentValue, 8));
            $this->outcomeDay->PlaceHolder = RemoveHtml($this->outcomeDay->caption());

            // OPResult
            $this->OPResult->EditAttrs["class"] = "form-control";
            $this->OPResult->EditCustomAttributes = "";
            if (!$this->OPResult->Raw) {
                $this->OPResult->CurrentValue = HtmlDecode($this->OPResult->CurrentValue);
            }
            $this->OPResult->EditValue = HtmlEncode($this->OPResult->CurrentValue);
            $this->OPResult->PlaceHolder = RemoveHtml($this->OPResult->caption());

            // Gestation
            $this->Gestation->EditCustomAttributes = "";
            $this->Gestation->EditValue = $this->Gestation->options(false);
            $this->Gestation->PlaceHolder = RemoveHtml($this->Gestation->caption());

            // TransferdEmbryos
            $this->TransferdEmbryos->EditAttrs["class"] = "form-control";
            $this->TransferdEmbryos->EditCustomAttributes = "";
            if (!$this->TransferdEmbryos->Raw) {
                $this->TransferdEmbryos->CurrentValue = HtmlDecode($this->TransferdEmbryos->CurrentValue);
            }
            $this->TransferdEmbryos->EditValue = HtmlEncode($this->TransferdEmbryos->CurrentValue);
            $this->TransferdEmbryos->PlaceHolder = RemoveHtml($this->TransferdEmbryos->caption());

            // InitalOfSacs
            $this->InitalOfSacs->EditAttrs["class"] = "form-control";
            $this->InitalOfSacs->EditCustomAttributes = "";
            if (!$this->InitalOfSacs->Raw) {
                $this->InitalOfSacs->CurrentValue = HtmlDecode($this->InitalOfSacs->CurrentValue);
            }
            $this->InitalOfSacs->EditValue = HtmlEncode($this->InitalOfSacs->CurrentValue);
            $this->InitalOfSacs->PlaceHolder = RemoveHtml($this->InitalOfSacs->caption());

            // ImplimentationRate
            $this->ImplimentationRate->EditAttrs["class"] = "form-control";
            $this->ImplimentationRate->EditCustomAttributes = "";
            if (!$this->ImplimentationRate->Raw) {
                $this->ImplimentationRate->CurrentValue = HtmlDecode($this->ImplimentationRate->CurrentValue);
            }
            $this->ImplimentationRate->EditValue = HtmlEncode($this->ImplimentationRate->CurrentValue);
            $this->ImplimentationRate->PlaceHolder = RemoveHtml($this->ImplimentationRate->caption());

            // EmbryoNo
            $this->EmbryoNo->EditAttrs["class"] = "form-control";
            $this->EmbryoNo->EditCustomAttributes = "";
            if (!$this->EmbryoNo->Raw) {
                $this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
            }
            $this->EmbryoNo->EditValue = HtmlEncode($this->EmbryoNo->CurrentValue);
            $this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

            // ExtrauterineSac
            $this->ExtrauterineSac->EditAttrs["class"] = "form-control";
            $this->ExtrauterineSac->EditCustomAttributes = "";
            if (!$this->ExtrauterineSac->Raw) {
                $this->ExtrauterineSac->CurrentValue = HtmlDecode($this->ExtrauterineSac->CurrentValue);
            }
            $this->ExtrauterineSac->EditValue = HtmlEncode($this->ExtrauterineSac->CurrentValue);
            $this->ExtrauterineSac->PlaceHolder = RemoveHtml($this->ExtrauterineSac->caption());

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->EditAttrs["class"] = "form-control";
            $this->PregnancyMonozygotic->EditCustomAttributes = "";
            if (!$this->PregnancyMonozygotic->Raw) {
                $this->PregnancyMonozygotic->CurrentValue = HtmlDecode($this->PregnancyMonozygotic->CurrentValue);
            }
            $this->PregnancyMonozygotic->EditValue = HtmlEncode($this->PregnancyMonozygotic->CurrentValue);
            $this->PregnancyMonozygotic->PlaceHolder = RemoveHtml($this->PregnancyMonozygotic->caption());

            // TypeGestation
            $this->TypeGestation->EditAttrs["class"] = "form-control";
            $this->TypeGestation->EditCustomAttributes = "";
            if (!$this->TypeGestation->Raw) {
                $this->TypeGestation->CurrentValue = HtmlDecode($this->TypeGestation->CurrentValue);
            }
            $this->TypeGestation->EditValue = HtmlEncode($this->TypeGestation->CurrentValue);
            $this->TypeGestation->PlaceHolder = RemoveHtml($this->TypeGestation->caption());

            // Urine
            $this->Urine->EditAttrs["class"] = "form-control";
            $this->Urine->EditCustomAttributes = "";
            $this->Urine->EditValue = $this->Urine->options(true);
            $this->Urine->PlaceHolder = RemoveHtml($this->Urine->caption());

            // PTdate
            $this->PTdate->EditAttrs["class"] = "form-control";
            $this->PTdate->EditCustomAttributes = "";
            if (!$this->PTdate->Raw) {
                $this->PTdate->CurrentValue = HtmlDecode($this->PTdate->CurrentValue);
            }
            $this->PTdate->EditValue = HtmlEncode($this->PTdate->CurrentValue);
            $this->PTdate->PlaceHolder = RemoveHtml($this->PTdate->caption());

            // Reduced
            $this->Reduced->EditAttrs["class"] = "form-control";
            $this->Reduced->EditCustomAttributes = "";
            if (!$this->Reduced->Raw) {
                $this->Reduced->CurrentValue = HtmlDecode($this->Reduced->CurrentValue);
            }
            $this->Reduced->EditValue = HtmlEncode($this->Reduced->CurrentValue);
            $this->Reduced->PlaceHolder = RemoveHtml($this->Reduced->caption());

            // INduced
            $this->INduced->EditAttrs["class"] = "form-control";
            $this->INduced->EditCustomAttributes = "";
            if (!$this->INduced->Raw) {
                $this->INduced->CurrentValue = HtmlDecode($this->INduced->CurrentValue);
            }
            $this->INduced->EditValue = HtmlEncode($this->INduced->CurrentValue);
            $this->INduced->PlaceHolder = RemoveHtml($this->INduced->caption());

            // INducedDate
            $this->INducedDate->EditAttrs["class"] = "form-control";
            $this->INducedDate->EditCustomAttributes = "";
            if (!$this->INducedDate->Raw) {
                $this->INducedDate->CurrentValue = HtmlDecode($this->INducedDate->CurrentValue);
            }
            $this->INducedDate->EditValue = HtmlEncode($this->INducedDate->CurrentValue);
            $this->INducedDate->PlaceHolder = RemoveHtml($this->INducedDate->caption());

            // Miscarriage
            $this->Miscarriage->EditCustomAttributes = "";
            $this->Miscarriage->EditValue = $this->Miscarriage->options(false);
            $this->Miscarriage->PlaceHolder = RemoveHtml($this->Miscarriage->caption());

            // Induced1
            $this->Induced1->EditCustomAttributes = "";
            $this->Induced1->EditValue = $this->Induced1->options(false);
            $this->Induced1->PlaceHolder = RemoveHtml($this->Induced1->caption());

            // Type
            $this->Type->EditCustomAttributes = "";
            $this->Type->EditValue = $this->Type->options(false);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

            // IfClinical
            $this->IfClinical->EditAttrs["class"] = "form-control";
            $this->IfClinical->EditCustomAttributes = "";
            if (!$this->IfClinical->Raw) {
                $this->IfClinical->CurrentValue = HtmlDecode($this->IfClinical->CurrentValue);
            }
            $this->IfClinical->EditValue = HtmlEncode($this->IfClinical->CurrentValue);
            $this->IfClinical->PlaceHolder = RemoveHtml($this->IfClinical->caption());

            // GADate
            $this->GADate->EditAttrs["class"] = "form-control";
            $this->GADate->EditCustomAttributes = "";
            if (!$this->GADate->Raw) {
                $this->GADate->CurrentValue = HtmlDecode($this->GADate->CurrentValue);
            }
            $this->GADate->EditValue = HtmlEncode($this->GADate->CurrentValue);
            $this->GADate->PlaceHolder = RemoveHtml($this->GADate->caption());

            // GA
            $this->GA->EditAttrs["class"] = "form-control";
            $this->GA->EditCustomAttributes = "";
            if (!$this->GA->Raw) {
                $this->GA->CurrentValue = HtmlDecode($this->GA->CurrentValue);
            }
            $this->GA->EditValue = HtmlEncode($this->GA->CurrentValue);
            $this->GA->PlaceHolder = RemoveHtml($this->GA->caption());

            // FoetalDeath
            $this->FoetalDeath->EditAttrs["class"] = "form-control";
            $this->FoetalDeath->EditCustomAttributes = "";
            $this->FoetalDeath->EditValue = $this->FoetalDeath->options(true);
            $this->FoetalDeath->PlaceHolder = RemoveHtml($this->FoetalDeath->caption());

            // FerinatalDeath
            $this->FerinatalDeath->EditAttrs["class"] = "form-control";
            $this->FerinatalDeath->EditCustomAttributes = "";
            $this->FerinatalDeath->EditValue = $this->FerinatalDeath->options(true);
            $this->FerinatalDeath->PlaceHolder = RemoveHtml($this->FerinatalDeath->caption());

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

            // Ectopic
            $this->Ectopic->EditCustomAttributes = "";
            $this->Ectopic->EditValue = $this->Ectopic->options(false);
            $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

            // Extra
            $this->Extra->EditCustomAttributes = "";
            $this->Extra->EditValue = $this->Extra->options(false);
            $this->Extra->PlaceHolder = RemoveHtml($this->Extra->caption());

            // Implantation
            $this->Implantation->EditAttrs["class"] = "form-control";
            $this->Implantation->EditCustomAttributes = "";
            if (!$this->Implantation->Raw) {
                $this->Implantation->CurrentValue = HtmlDecode($this->Implantation->CurrentValue);
            }
            $this->Implantation->EditValue = HtmlEncode($this->Implantation->CurrentValue);
            $this->Implantation->PlaceHolder = RemoveHtml($this->Implantation->caption());

            // DeliveryDate
            $this->DeliveryDate->EditAttrs["class"] = "form-control";
            $this->DeliveryDate->EditCustomAttributes = "";
            $this->DeliveryDate->EditValue = HtmlEncode(FormatDateTime($this->DeliveryDate->CurrentValue, 7));
            $this->DeliveryDate->PlaceHolder = RemoveHtml($this->DeliveryDate->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";

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

            // outcomeDate
            $this->outcomeDate->LinkCustomAttributes = "";
            $this->outcomeDate->HrefValue = "";

            // outcomeDay
            $this->outcomeDay->LinkCustomAttributes = "";
            $this->outcomeDay->HrefValue = "";

            // OPResult
            $this->OPResult->LinkCustomAttributes = "";
            $this->OPResult->HrefValue = "";

            // Gestation
            $this->Gestation->LinkCustomAttributes = "";
            $this->Gestation->HrefValue = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->LinkCustomAttributes = "";
            $this->TransferdEmbryos->HrefValue = "";

            // InitalOfSacs
            $this->InitalOfSacs->LinkCustomAttributes = "";
            $this->InitalOfSacs->HrefValue = "";

            // ImplimentationRate
            $this->ImplimentationRate->LinkCustomAttributes = "";
            $this->ImplimentationRate->HrefValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->LinkCustomAttributes = "";
            $this->ExtrauterineSac->HrefValue = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->LinkCustomAttributes = "";
            $this->PregnancyMonozygotic->HrefValue = "";

            // TypeGestation
            $this->TypeGestation->LinkCustomAttributes = "";
            $this->TypeGestation->HrefValue = "";

            // Urine
            $this->Urine->LinkCustomAttributes = "";
            $this->Urine->HrefValue = "";

            // PTdate
            $this->PTdate->LinkCustomAttributes = "";
            $this->PTdate->HrefValue = "";

            // Reduced
            $this->Reduced->LinkCustomAttributes = "";
            $this->Reduced->HrefValue = "";

            // INduced
            $this->INduced->LinkCustomAttributes = "";
            $this->INduced->HrefValue = "";

            // INducedDate
            $this->INducedDate->LinkCustomAttributes = "";
            $this->INducedDate->HrefValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";

            // Induced1
            $this->Induced1->LinkCustomAttributes = "";
            $this->Induced1->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // IfClinical
            $this->IfClinical->LinkCustomAttributes = "";
            $this->IfClinical->HrefValue = "";

            // GADate
            $this->GADate->LinkCustomAttributes = "";
            $this->GADate->HrefValue = "";

            // GA
            $this->GA->LinkCustomAttributes = "";
            $this->GA->HrefValue = "";

            // FoetalDeath
            $this->FoetalDeath->LinkCustomAttributes = "";
            $this->FoetalDeath->HrefValue = "";

            // FerinatalDeath
            $this->FerinatalDeath->LinkCustomAttributes = "";
            $this->FerinatalDeath->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";

            // Extra
            $this->Extra->LinkCustomAttributes = "";
            $this->Extra->HrefValue = "";

            // Implantation
            $this->Implantation->LinkCustomAttributes = "";
            $this->Implantation->HrefValue = "";

            // DeliveryDate
            $this->DeliveryDate->LinkCustomAttributes = "";
            $this->DeliveryDate->HrefValue = "";
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
        if ($this->RIDNO->Required) {
            if (!$this->RIDNO->IsDetailKey && EmptyValue($this->RIDNO->FormValue)) {
                $this->RIDNO->addErrorMessage(str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNO->FormValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->treatment_status->Required) {
            if (!$this->treatment_status->IsDetailKey && EmptyValue($this->treatment_status->FormValue)) {
                $this->treatment_status->addErrorMessage(str_replace("%s", $this->treatment_status->caption(), $this->treatment_status->RequiredErrorMessage));
            }
        }
        if ($this->ARTCYCLE->Required) {
            if (!$this->ARTCYCLE->IsDetailKey && EmptyValue($this->ARTCYCLE->FormValue)) {
                $this->ARTCYCLE->addErrorMessage(str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
            }
        }
        if ($this->RESULT->Required) {
            if (!$this->RESULT->IsDetailKey && EmptyValue($this->RESULT->FormValue)) {
                $this->RESULT->addErrorMessage(str_replace("%s", $this->RESULT->caption(), $this->RESULT->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->status->FormValue)) {
            $this->status->addErrorMessage($this->status->getErrorMessage(false));
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->createdby->FormValue)) {
            $this->createdby->addErrorMessage($this->createdby->getErrorMessage(false));
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->modifiedby->FormValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->outcomeDate->Required) {
            if (!$this->outcomeDate->IsDetailKey && EmptyValue($this->outcomeDate->FormValue)) {
                $this->outcomeDate->addErrorMessage(str_replace("%s", $this->outcomeDate->caption(), $this->outcomeDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->outcomeDate->FormValue)) {
            $this->outcomeDate->addErrorMessage($this->outcomeDate->getErrorMessage(false));
        }
        if ($this->outcomeDay->Required) {
            if (!$this->outcomeDay->IsDetailKey && EmptyValue($this->outcomeDay->FormValue)) {
                $this->outcomeDay->addErrorMessage(str_replace("%s", $this->outcomeDay->caption(), $this->outcomeDay->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->outcomeDay->FormValue)) {
            $this->outcomeDay->addErrorMessage($this->outcomeDay->getErrorMessage(false));
        }
        if ($this->OPResult->Required) {
            if (!$this->OPResult->IsDetailKey && EmptyValue($this->OPResult->FormValue)) {
                $this->OPResult->addErrorMessage(str_replace("%s", $this->OPResult->caption(), $this->OPResult->RequiredErrorMessage));
            }
        }
        if ($this->Gestation->Required) {
            if ($this->Gestation->FormValue == "") {
                $this->Gestation->addErrorMessage(str_replace("%s", $this->Gestation->caption(), $this->Gestation->RequiredErrorMessage));
            }
        }
        if ($this->TransferdEmbryos->Required) {
            if (!$this->TransferdEmbryos->IsDetailKey && EmptyValue($this->TransferdEmbryos->FormValue)) {
                $this->TransferdEmbryos->addErrorMessage(str_replace("%s", $this->TransferdEmbryos->caption(), $this->TransferdEmbryos->RequiredErrorMessage));
            }
        }
        if ($this->InitalOfSacs->Required) {
            if (!$this->InitalOfSacs->IsDetailKey && EmptyValue($this->InitalOfSacs->FormValue)) {
                $this->InitalOfSacs->addErrorMessage(str_replace("%s", $this->InitalOfSacs->caption(), $this->InitalOfSacs->RequiredErrorMessage));
            }
        }
        if ($this->ImplimentationRate->Required) {
            if (!$this->ImplimentationRate->IsDetailKey && EmptyValue($this->ImplimentationRate->FormValue)) {
                $this->ImplimentationRate->addErrorMessage(str_replace("%s", $this->ImplimentationRate->caption(), $this->ImplimentationRate->RequiredErrorMessage));
            }
        }
        if ($this->EmbryoNo->Required) {
            if (!$this->EmbryoNo->IsDetailKey && EmptyValue($this->EmbryoNo->FormValue)) {
                $this->EmbryoNo->addErrorMessage(str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
            }
        }
        if ($this->ExtrauterineSac->Required) {
            if (!$this->ExtrauterineSac->IsDetailKey && EmptyValue($this->ExtrauterineSac->FormValue)) {
                $this->ExtrauterineSac->addErrorMessage(str_replace("%s", $this->ExtrauterineSac->caption(), $this->ExtrauterineSac->RequiredErrorMessage));
            }
        }
        if ($this->PregnancyMonozygotic->Required) {
            if (!$this->PregnancyMonozygotic->IsDetailKey && EmptyValue($this->PregnancyMonozygotic->FormValue)) {
                $this->PregnancyMonozygotic->addErrorMessage(str_replace("%s", $this->PregnancyMonozygotic->caption(), $this->PregnancyMonozygotic->RequiredErrorMessage));
            }
        }
        if ($this->TypeGestation->Required) {
            if (!$this->TypeGestation->IsDetailKey && EmptyValue($this->TypeGestation->FormValue)) {
                $this->TypeGestation->addErrorMessage(str_replace("%s", $this->TypeGestation->caption(), $this->TypeGestation->RequiredErrorMessage));
            }
        }
        if ($this->Urine->Required) {
            if (!$this->Urine->IsDetailKey && EmptyValue($this->Urine->FormValue)) {
                $this->Urine->addErrorMessage(str_replace("%s", $this->Urine->caption(), $this->Urine->RequiredErrorMessage));
            }
        }
        if ($this->PTdate->Required) {
            if (!$this->PTdate->IsDetailKey && EmptyValue($this->PTdate->FormValue)) {
                $this->PTdate->addErrorMessage(str_replace("%s", $this->PTdate->caption(), $this->PTdate->RequiredErrorMessage));
            }
        }
        if ($this->Reduced->Required) {
            if (!$this->Reduced->IsDetailKey && EmptyValue($this->Reduced->FormValue)) {
                $this->Reduced->addErrorMessage(str_replace("%s", $this->Reduced->caption(), $this->Reduced->RequiredErrorMessage));
            }
        }
        if ($this->INduced->Required) {
            if (!$this->INduced->IsDetailKey && EmptyValue($this->INduced->FormValue)) {
                $this->INduced->addErrorMessage(str_replace("%s", $this->INduced->caption(), $this->INduced->RequiredErrorMessage));
            }
        }
        if ($this->INducedDate->Required) {
            if (!$this->INducedDate->IsDetailKey && EmptyValue($this->INducedDate->FormValue)) {
                $this->INducedDate->addErrorMessage(str_replace("%s", $this->INducedDate->caption(), $this->INducedDate->RequiredErrorMessage));
            }
        }
        if ($this->Miscarriage->Required) {
            if ($this->Miscarriage->FormValue == "") {
                $this->Miscarriage->addErrorMessage(str_replace("%s", $this->Miscarriage->caption(), $this->Miscarriage->RequiredErrorMessage));
            }
        }
        if ($this->Induced1->Required) {
            if ($this->Induced1->FormValue == "") {
                $this->Induced1->addErrorMessage(str_replace("%s", $this->Induced1->caption(), $this->Induced1->RequiredErrorMessage));
            }
        }
        if ($this->Type->Required) {
            if ($this->Type->FormValue == "") {
                $this->Type->addErrorMessage(str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
            }
        }
        if ($this->IfClinical->Required) {
            if (!$this->IfClinical->IsDetailKey && EmptyValue($this->IfClinical->FormValue)) {
                $this->IfClinical->addErrorMessage(str_replace("%s", $this->IfClinical->caption(), $this->IfClinical->RequiredErrorMessage));
            }
        }
        if ($this->GADate->Required) {
            if (!$this->GADate->IsDetailKey && EmptyValue($this->GADate->FormValue)) {
                $this->GADate->addErrorMessage(str_replace("%s", $this->GADate->caption(), $this->GADate->RequiredErrorMessage));
            }
        }
        if ($this->GA->Required) {
            if (!$this->GA->IsDetailKey && EmptyValue($this->GA->FormValue)) {
                $this->GA->addErrorMessage(str_replace("%s", $this->GA->caption(), $this->GA->RequiredErrorMessage));
            }
        }
        if ($this->FoetalDeath->Required) {
            if (!$this->FoetalDeath->IsDetailKey && EmptyValue($this->FoetalDeath->FormValue)) {
                $this->FoetalDeath->addErrorMessage(str_replace("%s", $this->FoetalDeath->caption(), $this->FoetalDeath->RequiredErrorMessage));
            }
        }
        if ($this->FerinatalDeath->Required) {
            if (!$this->FerinatalDeath->IsDetailKey && EmptyValue($this->FerinatalDeath->FormValue)) {
                $this->FerinatalDeath->addErrorMessage(str_replace("%s", $this->FerinatalDeath->caption(), $this->FerinatalDeath->RequiredErrorMessage));
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
        if ($this->Ectopic->Required) {
            if ($this->Ectopic->FormValue == "") {
                $this->Ectopic->addErrorMessage(str_replace("%s", $this->Ectopic->caption(), $this->Ectopic->RequiredErrorMessage));
            }
        }
        if ($this->Extra->Required) {
            if ($this->Extra->FormValue == "") {
                $this->Extra->addErrorMessage(str_replace("%s", $this->Extra->caption(), $this->Extra->RequiredErrorMessage));
            }
        }
        if ($this->Implantation->Required) {
            if (!$this->Implantation->IsDetailKey && EmptyValue($this->Implantation->FormValue)) {
                $this->Implantation->addErrorMessage(str_replace("%s", $this->Implantation->caption(), $this->Implantation->RequiredErrorMessage));
            }
        }
        if ($this->DeliveryDate->Required) {
            if (!$this->DeliveryDate->IsDetailKey && EmptyValue($this->DeliveryDate->FormValue)) {
                $this->DeliveryDate->addErrorMessage(str_replace("%s", $this->DeliveryDate->caption(), $this->DeliveryDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DeliveryDate->FormValue)) {
            $this->DeliveryDate->addErrorMessage($this->DeliveryDate->getErrorMessage(false));
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

            // RIDNO
            if ($this->RIDNO->getSessionValue() != "") {
                $this->RIDNO->ReadOnly = true;
            }
            $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, $this->RIDNO->ReadOnly);

            // Name
            if ($this->Name->getSessionValue() != "") {
                $this->Name->ReadOnly = true;
            }
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // treatment_status
            $this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, null, $this->treatment_status->ReadOnly);

            // ARTCYCLE
            $this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, null, $this->ARTCYCLE->ReadOnly);

            // RESULT
            $this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, null, $this->RESULT->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // outcomeDate
            $this->outcomeDate->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDate->CurrentValue, 0), null, $this->outcomeDate->ReadOnly);

            // outcomeDay
            $this->outcomeDay->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDay->CurrentValue, 0), null, $this->outcomeDay->ReadOnly);

            // OPResult
            $this->OPResult->setDbValueDef($rsnew, $this->OPResult->CurrentValue, null, $this->OPResult->ReadOnly);

            // Gestation
            $this->Gestation->setDbValueDef($rsnew, $this->Gestation->CurrentValue, null, $this->Gestation->ReadOnly);

            // TransferdEmbryos
            $this->TransferdEmbryos->setDbValueDef($rsnew, $this->TransferdEmbryos->CurrentValue, null, $this->TransferdEmbryos->ReadOnly);

            // InitalOfSacs
            $this->InitalOfSacs->setDbValueDef($rsnew, $this->InitalOfSacs->CurrentValue, null, $this->InitalOfSacs->ReadOnly);

            // ImplimentationRate
            $this->ImplimentationRate->setDbValueDef($rsnew, $this->ImplimentationRate->CurrentValue, null, $this->ImplimentationRate->ReadOnly);

            // EmbryoNo
            $this->EmbryoNo->setDbValueDef($rsnew, $this->EmbryoNo->CurrentValue, null, $this->EmbryoNo->ReadOnly);

            // ExtrauterineSac
            $this->ExtrauterineSac->setDbValueDef($rsnew, $this->ExtrauterineSac->CurrentValue, null, $this->ExtrauterineSac->ReadOnly);

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->setDbValueDef($rsnew, $this->PregnancyMonozygotic->CurrentValue, null, $this->PregnancyMonozygotic->ReadOnly);

            // TypeGestation
            $this->TypeGestation->setDbValueDef($rsnew, $this->TypeGestation->CurrentValue, null, $this->TypeGestation->ReadOnly);

            // Urine
            $this->Urine->setDbValueDef($rsnew, $this->Urine->CurrentValue, null, $this->Urine->ReadOnly);

            // PTdate
            $this->PTdate->setDbValueDef($rsnew, $this->PTdate->CurrentValue, null, $this->PTdate->ReadOnly);

            // Reduced
            $this->Reduced->setDbValueDef($rsnew, $this->Reduced->CurrentValue, null, $this->Reduced->ReadOnly);

            // INduced
            $this->INduced->setDbValueDef($rsnew, $this->INduced->CurrentValue, null, $this->INduced->ReadOnly);

            // INducedDate
            $this->INducedDate->setDbValueDef($rsnew, $this->INducedDate->CurrentValue, null, $this->INducedDate->ReadOnly);

            // Miscarriage
            $this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, null, $this->Miscarriage->ReadOnly);

            // Induced1
            $this->Induced1->setDbValueDef($rsnew, $this->Induced1->CurrentValue, null, $this->Induced1->ReadOnly);

            // Type
            $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, null, $this->Type->ReadOnly);

            // IfClinical
            $this->IfClinical->setDbValueDef($rsnew, $this->IfClinical->CurrentValue, null, $this->IfClinical->ReadOnly);

            // GADate
            $this->GADate->setDbValueDef($rsnew, $this->GADate->CurrentValue, null, $this->GADate->ReadOnly);

            // GA
            $this->GA->setDbValueDef($rsnew, $this->GA->CurrentValue, null, $this->GA->ReadOnly);

            // FoetalDeath
            $this->FoetalDeath->setDbValueDef($rsnew, $this->FoetalDeath->CurrentValue, null, $this->FoetalDeath->ReadOnly);

            // FerinatalDeath
            $this->FerinatalDeath->setDbValueDef($rsnew, $this->FerinatalDeath->CurrentValue, null, $this->FerinatalDeath->ReadOnly);

            // TidNo
            if ($this->TidNo->getSessionValue() != "") {
                $this->TidNo->ReadOnly = true;
            }
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // Ectopic
            $this->Ectopic->setDbValueDef($rsnew, $this->Ectopic->CurrentValue, null, $this->Ectopic->ReadOnly);

            // Extra
            $this->Extra->setDbValueDef($rsnew, $this->Extra->CurrentValue, null, $this->Extra->ReadOnly);

            // Implantation
            $this->Implantation->setDbValueDef($rsnew, $this->Implantation->CurrentValue, null, $this->Implantation->ReadOnly);

            // DeliveryDate
            $this->DeliveryDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeliveryDate->CurrentValue, 7), null, $this->DeliveryDate->ReadOnly);

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
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
            $this->RIDNO->CurrentValue = $this->RIDNO->getSessionValue();
            $this->Name->CurrentValue = $this->Name->getSessionValue();
            $this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // RIDNO
        $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // treatment_status
        $this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, null, false);

        // ARTCYCLE
        $this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, null, false);

        // RESULT
        $this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // outcomeDate
        $this->outcomeDate->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDate->CurrentValue, 0), null, false);

        // outcomeDay
        $this->outcomeDay->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDay->CurrentValue, 0), null, false);

        // OPResult
        $this->OPResult->setDbValueDef($rsnew, $this->OPResult->CurrentValue, null, false);

        // Gestation
        $this->Gestation->setDbValueDef($rsnew, $this->Gestation->CurrentValue, null, false);

        // TransferdEmbryos
        $this->TransferdEmbryos->setDbValueDef($rsnew, $this->TransferdEmbryos->CurrentValue, null, false);

        // InitalOfSacs
        $this->InitalOfSacs->setDbValueDef($rsnew, $this->InitalOfSacs->CurrentValue, null, false);

        // ImplimentationRate
        $this->ImplimentationRate->setDbValueDef($rsnew, $this->ImplimentationRate->CurrentValue, null, false);

        // EmbryoNo
        $this->EmbryoNo->setDbValueDef($rsnew, $this->EmbryoNo->CurrentValue, null, false);

        // ExtrauterineSac
        $this->ExtrauterineSac->setDbValueDef($rsnew, $this->ExtrauterineSac->CurrentValue, null, false);

        // PregnancyMonozygotic
        $this->PregnancyMonozygotic->setDbValueDef($rsnew, $this->PregnancyMonozygotic->CurrentValue, null, false);

        // TypeGestation
        $this->TypeGestation->setDbValueDef($rsnew, $this->TypeGestation->CurrentValue, null, false);

        // Urine
        $this->Urine->setDbValueDef($rsnew, $this->Urine->CurrentValue, null, false);

        // PTdate
        $this->PTdate->setDbValueDef($rsnew, $this->PTdate->CurrentValue, null, false);

        // Reduced
        $this->Reduced->setDbValueDef($rsnew, $this->Reduced->CurrentValue, null, false);

        // INduced
        $this->INduced->setDbValueDef($rsnew, $this->INduced->CurrentValue, null, false);

        // INducedDate
        $this->INducedDate->setDbValueDef($rsnew, $this->INducedDate->CurrentValue, null, false);

        // Miscarriage
        $this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, null, false);

        // Induced1
        $this->Induced1->setDbValueDef($rsnew, $this->Induced1->CurrentValue, null, false);

        // Type
        $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, null, false);

        // IfClinical
        $this->IfClinical->setDbValueDef($rsnew, $this->IfClinical->CurrentValue, null, false);

        // GADate
        $this->GADate->setDbValueDef($rsnew, $this->GADate->CurrentValue, null, false);

        // GA
        $this->GA->setDbValueDef($rsnew, $this->GA->CurrentValue, null, false);

        // FoetalDeath
        $this->FoetalDeath->setDbValueDef($rsnew, $this->FoetalDeath->CurrentValue, null, false);

        // FerinatalDeath
        $this->FerinatalDeath->setDbValueDef($rsnew, $this->FerinatalDeath->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // Ectopic
        $this->Ectopic->setDbValueDef($rsnew, $this->Ectopic->CurrentValue, null, false);

        // Extra
        $this->Extra->setDbValueDef($rsnew, $this->Extra->CurrentValue, null, false);

        // Implantation
        $this->Implantation->setDbValueDef($rsnew, $this->Implantation->CurrentValue, null, false);

        // DeliveryDate
        $this->DeliveryDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeliveryDate->CurrentValue, 7), null, false);

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
        if ($masterTblVar == "ivf_treatment_plan") {
            $masterTbl = Container("ivf_treatment_plan");
            $this->RIDNO->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->Name->Visible = false;
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
                case "x_Gestation":
                    break;
                case "x_Urine":
                    break;
                case "x_Miscarriage":
                    break;
                case "x_Induced1":
                    break;
                case "x_Type":
                    break;
                case "x_FoetalDeath":
                    break;
                case "x_FerinatalDeath":
                    break;
                case "x_Ectopic":
                    break;
                case "x_Extra":
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
