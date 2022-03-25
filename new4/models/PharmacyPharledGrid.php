<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyPharledGrid extends PharmacyPharled
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_pharled';

    // Page object name
    public $PageObjName = "PharmacyPharledGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpharmacy_pharledgrid";
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

        // Table object (pharmacy_pharled)
        if (!isset($GLOBALS["pharmacy_pharled"]) || get_class($GLOBALS["pharmacy_pharled"]) == PROJECT_NAMESPACE . "pharmacy_pharled") {
            $GLOBALS["pharmacy_pharled"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "PharmacyPharledAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_pharled');
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
                $doc = new $class(Container("pharmacy_pharled"));
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
            $this->BRCODE->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->_USERID->Visible = false;
        }
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->HosoID->Visible = false;
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
            $this->BRNAME->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->isdate->Visible = false;
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
        $this->SiNo->setVisibility();
        $this->SLNO->setVisibility();
        $this->Product->setVisibility();
        $this->RT->setVisibility();
        $this->IQ->setVisibility();
        $this->DAMT->setVisibility();
        $this->Mfg->setVisibility();
        $this->EXPDT->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->BRCODE->setVisibility();
        $this->TYPE->Visible = false;
        $this->DN->Visible = false;
        $this->RDN->Visible = false;
        $this->DT->Visible = false;
        $this->PRC->setVisibility();
        $this->OQ->Visible = false;
        $this->RQ->Visible = false;
        $this->MRQ->Visible = false;
        $this->BILLNO->Visible = false;
        $this->BILLDT->Visible = false;
        $this->VALUE->Visible = false;
        $this->DISC->Visible = false;
        $this->TAXP->Visible = false;
        $this->TAX->Visible = false;
        $this->TAXR->Visible = false;
        $this->EMPNO->Visible = false;
        $this->PC->Visible = false;
        $this->DRNAME->Visible = false;
        $this->BTIME->Visible = false;
        $this->ONO->Visible = false;
        $this->ODT->Visible = false;
        $this->PURRT->Visible = false;
        $this->GRP->Visible = false;
        $this->IBATCH->Visible = false;
        $this->IPNO->Visible = false;
        $this->OPNO->Visible = false;
        $this->RECID->Visible = false;
        $this->FQTY->Visible = false;
        $this->UR->setVisibility();
        $this->DCID->Visible = false;
        $this->_USERID->setVisibility();
        $this->MODDT->Visible = false;
        $this->FYM->Visible = false;
        $this->PRCBATCH->Visible = false;
        $this->MRP->Visible = false;
        $this->BILLYM->Visible = false;
        $this->BILLGRP->Visible = false;
        $this->STAFF->Visible = false;
        $this->TEMPIPNO->Visible = false;
        $this->PRNTED->Visible = false;
        $this->PATNAME->Visible = false;
        $this->PJVNO->Visible = false;
        $this->PJVSLNO->Visible = false;
        $this->OTHDISC->Visible = false;
        $this->PJVYM->Visible = false;
        $this->PURDISCPER->Visible = false;
        $this->CASHIER->Visible = false;
        $this->CASHTIME->Visible = false;
        $this->CASHRECD->Visible = false;
        $this->CASHREFNO->Visible = false;
        $this->CASHIERSHIFT->Visible = false;
        $this->PRCODE->Visible = false;
        $this->RELEASEBY->Visible = false;
        $this->CRAUTHOR->Visible = false;
        $this->PAYMENT->Visible = false;
        $this->DRID->Visible = false;
        $this->WARD->Visible = false;
        $this->STAXTYPE->Visible = false;
        $this->PURDISCVAL->Visible = false;
        $this->RNDOFF->Visible = false;
        $this->DISCONMRP->Visible = false;
        $this->DELVDT->Visible = false;
        $this->DELVTIME->Visible = false;
        $this->DELVBY->Visible = false;
        $this->HOSPNO->Visible = false;
        $this->id->setVisibility();
        $this->pbv->Visible = false;
        $this->pbt->Visible = false;
        $this->HosoID->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->MFRCODE->Visible = false;
        $this->Reception->Visible = false;
        $this->PatID->Visible = false;
        $this->mrnno->Visible = false;
        $this->BRNAME->setVisibility();
        $this->sretid->Visible = false;
        $this->sprid->Visible = false;
        $this->baid->setVisibility();
        $this->isdate->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->PurValue->setVisibility();
        $this->PurRate->setVisibility();
        $this->PUnit->setVisibility();
        $this->SUnit->setVisibility();
        $this->HSNCODE->setVisibility();
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
        $this->setupLookupOptions($this->SLNO);

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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_voucher") {
            $masterTbl = Container("pharmacy_billing_voucher");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("PharmacyBillingVoucherList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_issue") {
            $masterTbl = Container("pharmacy_billing_issue");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("PharmacyBillingIssueList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

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
        $this->RT->FormValue = ""; // Clear form value
        $this->IQ->FormValue = ""; // Clear form value
        $this->DAMT->FormValue = ""; // Clear form value
        $this->UR->FormValue = ""; // Clear form value
        $this->PSGST->FormValue = ""; // Clear form value
        $this->PCGST->FormValue = ""; // Clear form value
        $this->SSGST->FormValue = ""; // Clear form value
        $this->SCGST->FormValue = ""; // Clear form value
        $this->PurValue->FormValue = ""; // Clear form value
        $this->PurRate->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_SiNo") && $CurrentForm->hasValue("o_SiNo") && $this->SiNo->CurrentValue != $this->SiNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SLNO") && $CurrentForm->hasValue("o_SLNO") && $this->SLNO->CurrentValue != $this->SLNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Product") && $CurrentForm->hasValue("o_Product") && $this->Product->CurrentValue != $this->Product->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RT") && $CurrentForm->hasValue("o_RT") && $this->RT->CurrentValue != $this->RT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue != $this->IQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DAMT") && $CurrentForm->hasValue("o_DAMT") && $this->DAMT->CurrentValue != $this->DAMT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mfg") && $CurrentForm->hasValue("o_Mfg") && $this->Mfg->CurrentValue != $this->Mfg->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue != $this->EXPDT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BATCHNO") && $CurrentForm->hasValue("o_BATCHNO") && $this->BATCHNO->CurrentValue != $this->BATCHNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue != $this->PRC->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_UR") && $CurrentForm->hasValue("o_UR") && $this->UR->CurrentValue != $this->UR->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_baid") && $CurrentForm->hasValue("o_baid") && $this->baid->CurrentValue != $this->baid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PSGST") && $CurrentForm->hasValue("o_PSGST") && $this->PSGST->CurrentValue != $this->PSGST->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PCGST") && $CurrentForm->hasValue("o_PCGST") && $this->PCGST->CurrentValue != $this->PCGST->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SSGST") && $CurrentForm->hasValue("o_SSGST") && $this->SSGST->CurrentValue != $this->SSGST->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SCGST") && $CurrentForm->hasValue("o_SCGST") && $this->SCGST->CurrentValue != $this->SCGST->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PurValue") && $CurrentForm->hasValue("o_PurValue") && $this->PurValue->CurrentValue != $this->PurValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PurRate") && $CurrentForm->hasValue("o_PurRate") && $this->PurRate->CurrentValue != $this->PurRate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PUnit") && $CurrentForm->hasValue("o_PUnit") && $this->PUnit->CurrentValue != $this->PUnit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SUnit") && $CurrentForm->hasValue("o_SUnit") && $this->SUnit->CurrentValue != $this->SUnit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HSNCODE") && $CurrentForm->hasValue("o_HSNCODE") && $this->HSNCODE->CurrentValue != $this->HSNCODE->OldValue) {
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
        $this->SiNo->clearErrorMessage();
        $this->SLNO->clearErrorMessage();
        $this->Product->clearErrorMessage();
        $this->RT->clearErrorMessage();
        $this->IQ->clearErrorMessage();
        $this->DAMT->clearErrorMessage();
        $this->Mfg->clearErrorMessage();
        $this->EXPDT->clearErrorMessage();
        $this->BATCHNO->clearErrorMessage();
        $this->BRCODE->clearErrorMessage();
        $this->PRC->clearErrorMessage();
        $this->UR->clearErrorMessage();
        $this->_USERID->clearErrorMessage();
        $this->id->clearErrorMessage();
        $this->HosoID->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->BRNAME->clearErrorMessage();
        $this->baid->clearErrorMessage();
        $this->isdate->clearErrorMessage();
        $this->PSGST->clearErrorMessage();
        $this->PCGST->clearErrorMessage();
        $this->SSGST->clearErrorMessage();
        $this->SCGST->clearErrorMessage();
        $this->PurValue->clearErrorMessage();
        $this->PurRate->clearErrorMessage();
        $this->PUnit->clearErrorMessage();
        $this->SUnit->clearErrorMessage();
        $this->HSNCODE->clearErrorMessage();
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
                        $this->pbv->setSessionValue("");
                        $this->pbt->setSessionValue("");
                        $this->mrnno->setSessionValue("");
                        $this->PatID->setSessionValue("");
                        $this->Reception->setSessionValue("");
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
        $this->SiNo->CurrentValue = null;
        $this->SiNo->OldValue = $this->SiNo->CurrentValue;
        $this->SLNO->CurrentValue = null;
        $this->SLNO->OldValue = $this->SLNO->CurrentValue;
        $this->Product->CurrentValue = null;
        $this->Product->OldValue = $this->Product->CurrentValue;
        $this->RT->CurrentValue = null;
        $this->RT->OldValue = $this->RT->CurrentValue;
        $this->IQ->CurrentValue = null;
        $this->IQ->OldValue = $this->IQ->CurrentValue;
        $this->DAMT->CurrentValue = null;
        $this->DAMT->OldValue = $this->DAMT->CurrentValue;
        $this->Mfg->CurrentValue = null;
        $this->Mfg->OldValue = $this->Mfg->CurrentValue;
        $this->EXPDT->CurrentValue = null;
        $this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
        $this->BATCHNO->CurrentValue = null;
        $this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->TYPE->CurrentValue = null;
        $this->TYPE->OldValue = $this->TYPE->CurrentValue;
        $this->DN->CurrentValue = null;
        $this->DN->OldValue = $this->DN->CurrentValue;
        $this->RDN->CurrentValue = null;
        $this->RDN->OldValue = $this->RDN->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->OQ->CurrentValue = null;
        $this->OQ->OldValue = $this->OQ->CurrentValue;
        $this->RQ->CurrentValue = null;
        $this->RQ->OldValue = $this->RQ->CurrentValue;
        $this->MRQ->CurrentValue = null;
        $this->MRQ->OldValue = $this->MRQ->CurrentValue;
        $this->BILLNO->CurrentValue = null;
        $this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
        $this->BILLDT->CurrentValue = null;
        $this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
        $this->VALUE->CurrentValue = null;
        $this->VALUE->OldValue = $this->VALUE->CurrentValue;
        $this->DISC->CurrentValue = null;
        $this->DISC->OldValue = $this->DISC->CurrentValue;
        $this->TAXP->CurrentValue = null;
        $this->TAXP->OldValue = $this->TAXP->CurrentValue;
        $this->TAX->CurrentValue = null;
        $this->TAX->OldValue = $this->TAX->CurrentValue;
        $this->TAXR->CurrentValue = null;
        $this->TAXR->OldValue = $this->TAXR->CurrentValue;
        $this->EMPNO->CurrentValue = null;
        $this->EMPNO->OldValue = $this->EMPNO->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->DRNAME->CurrentValue = null;
        $this->DRNAME->OldValue = $this->DRNAME->CurrentValue;
        $this->BTIME->CurrentValue = null;
        $this->BTIME->OldValue = $this->BTIME->CurrentValue;
        $this->ONO->CurrentValue = null;
        $this->ONO->OldValue = $this->ONO->CurrentValue;
        $this->ODT->CurrentValue = null;
        $this->ODT->OldValue = $this->ODT->CurrentValue;
        $this->PURRT->CurrentValue = null;
        $this->PURRT->OldValue = $this->PURRT->CurrentValue;
        $this->GRP->CurrentValue = null;
        $this->GRP->OldValue = $this->GRP->CurrentValue;
        $this->IBATCH->CurrentValue = null;
        $this->IBATCH->OldValue = $this->IBATCH->CurrentValue;
        $this->IPNO->CurrentValue = null;
        $this->IPNO->OldValue = $this->IPNO->CurrentValue;
        $this->OPNO->CurrentValue = null;
        $this->OPNO->OldValue = $this->OPNO->CurrentValue;
        $this->RECID->CurrentValue = null;
        $this->RECID->OldValue = $this->RECID->CurrentValue;
        $this->FQTY->CurrentValue = null;
        $this->FQTY->OldValue = $this->FQTY->CurrentValue;
        $this->UR->CurrentValue = null;
        $this->UR->OldValue = $this->UR->CurrentValue;
        $this->DCID->CurrentValue = null;
        $this->DCID->OldValue = $this->DCID->CurrentValue;
        $this->_USERID->CurrentValue = null;
        $this->_USERID->OldValue = $this->_USERID->CurrentValue;
        $this->MODDT->CurrentValue = null;
        $this->MODDT->OldValue = $this->MODDT->CurrentValue;
        $this->FYM->CurrentValue = null;
        $this->FYM->OldValue = $this->FYM->CurrentValue;
        $this->PRCBATCH->CurrentValue = null;
        $this->PRCBATCH->OldValue = $this->PRCBATCH->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->BILLYM->CurrentValue = null;
        $this->BILLYM->OldValue = $this->BILLYM->CurrentValue;
        $this->BILLGRP->CurrentValue = null;
        $this->BILLGRP->OldValue = $this->BILLGRP->CurrentValue;
        $this->STAFF->CurrentValue = null;
        $this->STAFF->OldValue = $this->STAFF->CurrentValue;
        $this->TEMPIPNO->CurrentValue = null;
        $this->TEMPIPNO->OldValue = $this->TEMPIPNO->CurrentValue;
        $this->PRNTED->CurrentValue = null;
        $this->PRNTED->OldValue = $this->PRNTED->CurrentValue;
        $this->PATNAME->CurrentValue = null;
        $this->PATNAME->OldValue = $this->PATNAME->CurrentValue;
        $this->PJVNO->CurrentValue = null;
        $this->PJVNO->OldValue = $this->PJVNO->CurrentValue;
        $this->PJVSLNO->CurrentValue = null;
        $this->PJVSLNO->OldValue = $this->PJVSLNO->CurrentValue;
        $this->OTHDISC->CurrentValue = null;
        $this->OTHDISC->OldValue = $this->OTHDISC->CurrentValue;
        $this->PJVYM->CurrentValue = null;
        $this->PJVYM->OldValue = $this->PJVYM->CurrentValue;
        $this->PURDISCPER->CurrentValue = null;
        $this->PURDISCPER->OldValue = $this->PURDISCPER->CurrentValue;
        $this->CASHIER->CurrentValue = null;
        $this->CASHIER->OldValue = $this->CASHIER->CurrentValue;
        $this->CASHTIME->CurrentValue = null;
        $this->CASHTIME->OldValue = $this->CASHTIME->CurrentValue;
        $this->CASHRECD->CurrentValue = null;
        $this->CASHRECD->OldValue = $this->CASHRECD->CurrentValue;
        $this->CASHREFNO->CurrentValue = null;
        $this->CASHREFNO->OldValue = $this->CASHREFNO->CurrentValue;
        $this->CASHIERSHIFT->CurrentValue = null;
        $this->CASHIERSHIFT->OldValue = $this->CASHIERSHIFT->CurrentValue;
        $this->PRCODE->CurrentValue = null;
        $this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
        $this->RELEASEBY->CurrentValue = null;
        $this->RELEASEBY->OldValue = $this->RELEASEBY->CurrentValue;
        $this->CRAUTHOR->CurrentValue = null;
        $this->CRAUTHOR->OldValue = $this->CRAUTHOR->CurrentValue;
        $this->PAYMENT->CurrentValue = null;
        $this->PAYMENT->OldValue = $this->PAYMENT->CurrentValue;
        $this->DRID->CurrentValue = null;
        $this->DRID->OldValue = $this->DRID->CurrentValue;
        $this->WARD->CurrentValue = null;
        $this->WARD->OldValue = $this->WARD->CurrentValue;
        $this->STAXTYPE->CurrentValue = null;
        $this->STAXTYPE->OldValue = $this->STAXTYPE->CurrentValue;
        $this->PURDISCVAL->CurrentValue = null;
        $this->PURDISCVAL->OldValue = $this->PURDISCVAL->CurrentValue;
        $this->RNDOFF->CurrentValue = null;
        $this->RNDOFF->OldValue = $this->RNDOFF->CurrentValue;
        $this->DISCONMRP->CurrentValue = null;
        $this->DISCONMRP->OldValue = $this->DISCONMRP->CurrentValue;
        $this->DELVDT->CurrentValue = null;
        $this->DELVDT->OldValue = $this->DELVDT->CurrentValue;
        $this->DELVTIME->CurrentValue = null;
        $this->DELVTIME->OldValue = $this->DELVTIME->CurrentValue;
        $this->DELVBY->CurrentValue = null;
        $this->DELVBY->OldValue = $this->DELVBY->CurrentValue;
        $this->HOSPNO->CurrentValue = null;
        $this->HOSPNO->OldValue = $this->HOSPNO->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->pbv->CurrentValue = null;
        $this->pbv->OldValue = $this->pbv->CurrentValue;
        $this->pbt->CurrentValue = null;
        $this->pbt->OldValue = $this->pbt->CurrentValue;
        $this->HosoID->CurrentValue = null;
        $this->HosoID->OldValue = $this->HosoID->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->BRNAME->CurrentValue = null;
        $this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
        $this->sretid->CurrentValue = null;
        $this->sretid->OldValue = $this->sretid->CurrentValue;
        $this->sprid->CurrentValue = null;
        $this->sprid->OldValue = $this->sprid->CurrentValue;
        $this->baid->CurrentValue = null;
        $this->baid->OldValue = $this->baid->CurrentValue;
        $this->isdate->CurrentValue = null;
        $this->isdate->OldValue = $this->isdate->CurrentValue;
        $this->PSGST->CurrentValue = null;
        $this->PSGST->OldValue = $this->PSGST->CurrentValue;
        $this->PCGST->CurrentValue = null;
        $this->PCGST->OldValue = $this->PCGST->CurrentValue;
        $this->SSGST->CurrentValue = null;
        $this->SSGST->OldValue = $this->SSGST->CurrentValue;
        $this->SCGST->CurrentValue = null;
        $this->SCGST->OldValue = $this->SCGST->CurrentValue;
        $this->PurValue->CurrentValue = null;
        $this->PurValue->OldValue = $this->PurValue->CurrentValue;
        $this->PurRate->CurrentValue = null;
        $this->PurRate->OldValue = $this->PurRate->CurrentValue;
        $this->PUnit->CurrentValue = null;
        $this->PUnit->OldValue = $this->PUnit->CurrentValue;
        $this->SUnit->CurrentValue = null;
        $this->SUnit->OldValue = $this->SUnit->CurrentValue;
        $this->HSNCODE->CurrentValue = null;
        $this->HSNCODE->OldValue = $this->HSNCODE->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $CurrentForm->FormName = $this->FormName;

        // Check field name 'SiNo' first before field var 'x_SiNo'
        $val = $CurrentForm->hasValue("SiNo") ? $CurrentForm->getValue("SiNo") : $CurrentForm->getValue("x_SiNo");
        if (!$this->SiNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SiNo->Visible = false; // Disable update for API request
            } else {
                $this->SiNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SiNo")) {
            $this->SiNo->setOldValue($CurrentForm->getValue("o_SiNo"));
        }

        // Check field name 'SLNO' first before field var 'x_SLNO'
        $val = $CurrentForm->hasValue("SLNO") ? $CurrentForm->getValue("SLNO") : $CurrentForm->getValue("x_SLNO");
        if (!$this->SLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SLNO->Visible = false; // Disable update for API request
            } else {
                $this->SLNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SLNO")) {
            $this->SLNO->setOldValue($CurrentForm->getValue("o_SLNO"));
        }

        // Check field name 'Product' first before field var 'x_Product'
        $val = $CurrentForm->hasValue("Product") ? $CurrentForm->getValue("Product") : $CurrentForm->getValue("x_Product");
        if (!$this->Product->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Product->Visible = false; // Disable update for API request
            } else {
                $this->Product->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Product")) {
            $this->Product->setOldValue($CurrentForm->getValue("o_Product"));
        }

        // Check field name 'RT' first before field var 'x_RT'
        $val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
        if (!$this->RT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RT->Visible = false; // Disable update for API request
            } else {
                $this->RT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RT")) {
            $this->RT->setOldValue($CurrentForm->getValue("o_RT"));
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

        // Check field name 'DAMT' first before field var 'x_DAMT'
        $val = $CurrentForm->hasValue("DAMT") ? $CurrentForm->getValue("DAMT") : $CurrentForm->getValue("x_DAMT");
        if (!$this->DAMT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAMT->Visible = false; // Disable update for API request
            } else {
                $this->DAMT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DAMT")) {
            $this->DAMT->setOldValue($CurrentForm->getValue("o_DAMT"));
        }

        // Check field name 'Mfg' first before field var 'x_Mfg'
        $val = $CurrentForm->hasValue("Mfg") ? $CurrentForm->getValue("Mfg") : $CurrentForm->getValue("x_Mfg");
        if (!$this->Mfg->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mfg->Visible = false; // Disable update for API request
            } else {
                $this->Mfg->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Mfg")) {
            $this->Mfg->setOldValue($CurrentForm->getValue("o_Mfg"));
        }

        // Check field name 'EXPDT' first before field var 'x_EXPDT'
        $val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
        if (!$this->EXPDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EXPDT->Visible = false; // Disable update for API request
            } else {
                $this->EXPDT->setFormValue($val);
            }
            $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_EXPDT")) {
            $this->EXPDT->setOldValue($CurrentForm->getValue("o_EXPDT"));
        }

        // Check field name 'BATCHNO' first before field var 'x_BATCHNO'
        $val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
        if (!$this->BATCHNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BATCHNO->Visible = false; // Disable update for API request
            } else {
                $this->BATCHNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BATCHNO")) {
            $this->BATCHNO->setOldValue($CurrentForm->getValue("o_BATCHNO"));
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

        // Check field name 'UR' first before field var 'x_UR'
        $val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
        if (!$this->UR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UR->Visible = false; // Disable update for API request
            } else {
                $this->UR->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_UR")) {
            $this->UR->setOldValue($CurrentForm->getValue("o_UR"));
        }

        // Check field name 'USERID' first before field var 'x__USERID'
        $val = $CurrentForm->hasValue("USERID") ? $CurrentForm->getValue("USERID") : $CurrentForm->getValue("x__USERID");
        if (!$this->_USERID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_USERID->Visible = false; // Disable update for API request
            } else {
                $this->_USERID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o__USERID")) {
            $this->_USERID->setOldValue($CurrentForm->getValue("o__USERID"));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
        }

        // Check field name 'HosoID' first before field var 'x_HosoID'
        $val = $CurrentForm->hasValue("HosoID") ? $CurrentForm->getValue("HosoID") : $CurrentForm->getValue("x_HosoID");
        if (!$this->HosoID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HosoID->Visible = false; // Disable update for API request
            } else {
                $this->HosoID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HosoID")) {
            $this->HosoID->setOldValue($CurrentForm->getValue("o_HosoID"));
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

        // Check field name 'BRNAME' first before field var 'x_BRNAME'
        $val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
        if (!$this->BRNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRNAME->Visible = false; // Disable update for API request
            } else {
                $this->BRNAME->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BRNAME")) {
            $this->BRNAME->setOldValue($CurrentForm->getValue("o_BRNAME"));
        }

        // Check field name 'baid' first before field var 'x_baid'
        $val = $CurrentForm->hasValue("baid") ? $CurrentForm->getValue("baid") : $CurrentForm->getValue("x_baid");
        if (!$this->baid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->baid->Visible = false; // Disable update for API request
            } else {
                $this->baid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_baid")) {
            $this->baid->setOldValue($CurrentForm->getValue("o_baid"));
        }

        // Check field name 'isdate' first before field var 'x_isdate'
        $val = $CurrentForm->hasValue("isdate") ? $CurrentForm->getValue("isdate") : $CurrentForm->getValue("x_isdate");
        if (!$this->isdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->isdate->Visible = false; // Disable update for API request
            } else {
                $this->isdate->setFormValue($val);
            }
            $this->isdate->CurrentValue = UnFormatDateTime($this->isdate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_isdate")) {
            $this->isdate->setOldValue($CurrentForm->getValue("o_isdate"));
        }

        // Check field name 'PSGST' first before field var 'x_PSGST'
        $val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
        if (!$this->PSGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PSGST->Visible = false; // Disable update for API request
            } else {
                $this->PSGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PSGST")) {
            $this->PSGST->setOldValue($CurrentForm->getValue("o_PSGST"));
        }

        // Check field name 'PCGST' first before field var 'x_PCGST'
        $val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
        if (!$this->PCGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PCGST->Visible = false; // Disable update for API request
            } else {
                $this->PCGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PCGST")) {
            $this->PCGST->setOldValue($CurrentForm->getValue("o_PCGST"));
        }

        // Check field name 'SSGST' first before field var 'x_SSGST'
        $val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
        if (!$this->SSGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SSGST->Visible = false; // Disable update for API request
            } else {
                $this->SSGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SSGST")) {
            $this->SSGST->setOldValue($CurrentForm->getValue("o_SSGST"));
        }

        // Check field name 'SCGST' first before field var 'x_SCGST'
        $val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
        if (!$this->SCGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SCGST->Visible = false; // Disable update for API request
            } else {
                $this->SCGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SCGST")) {
            $this->SCGST->setOldValue($CurrentForm->getValue("o_SCGST"));
        }

        // Check field name 'PurValue' first before field var 'x_PurValue'
        $val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
        if (!$this->PurValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurValue->Visible = false; // Disable update for API request
            } else {
                $this->PurValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PurValue")) {
            $this->PurValue->setOldValue($CurrentForm->getValue("o_PurValue"));
        }

        // Check field name 'PurRate' first before field var 'x_PurRate'
        $val = $CurrentForm->hasValue("PurRate") ? $CurrentForm->getValue("PurRate") : $CurrentForm->getValue("x_PurRate");
        if (!$this->PurRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurRate->Visible = false; // Disable update for API request
            } else {
                $this->PurRate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PurRate")) {
            $this->PurRate->setOldValue($CurrentForm->getValue("o_PurRate"));
        }

        // Check field name 'PUnit' first before field var 'x_PUnit'
        $val = $CurrentForm->hasValue("PUnit") ? $CurrentForm->getValue("PUnit") : $CurrentForm->getValue("x_PUnit");
        if (!$this->PUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PUnit->Visible = false; // Disable update for API request
            } else {
                $this->PUnit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PUnit")) {
            $this->PUnit->setOldValue($CurrentForm->getValue("o_PUnit"));
        }

        // Check field name 'SUnit' first before field var 'x_SUnit'
        $val = $CurrentForm->hasValue("SUnit") ? $CurrentForm->getValue("SUnit") : $CurrentForm->getValue("x_SUnit");
        if (!$this->SUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SUnit->Visible = false; // Disable update for API request
            } else {
                $this->SUnit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SUnit")) {
            $this->SUnit->setOldValue($CurrentForm->getValue("o_SUnit"));
        }

        // Check field name 'HSNCODE' first before field var 'x_HSNCODE'
        $val = $CurrentForm->hasValue("HSNCODE") ? $CurrentForm->getValue("HSNCODE") : $CurrentForm->getValue("x_HSNCODE");
        if (!$this->HSNCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HSNCODE->Visible = false; // Disable update for API request
            } else {
                $this->HSNCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HSNCODE")) {
            $this->HSNCODE->setOldValue($CurrentForm->getValue("o_HSNCODE"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->SiNo->CurrentValue = $this->SiNo->FormValue;
        $this->SLNO->CurrentValue = $this->SLNO->FormValue;
        $this->Product->CurrentValue = $this->Product->FormValue;
        $this->RT->CurrentValue = $this->RT->FormValue;
        $this->IQ->CurrentValue = $this->IQ->FormValue;
        $this->DAMT->CurrentValue = $this->DAMT->FormValue;
        $this->Mfg->CurrentValue = $this->Mfg->FormValue;
        $this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->UR->CurrentValue = $this->UR->FormValue;
        $this->_USERID->CurrentValue = $this->_USERID->FormValue;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->HosoID->CurrentValue = $this->HosoID->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
        $this->baid->CurrentValue = $this->baid->FormValue;
        $this->isdate->CurrentValue = $this->isdate->FormValue;
        $this->isdate->CurrentValue = UnFormatDateTime($this->isdate->CurrentValue, 0);
        $this->PSGST->CurrentValue = $this->PSGST->FormValue;
        $this->PCGST->CurrentValue = $this->PCGST->FormValue;
        $this->SSGST->CurrentValue = $this->SSGST->FormValue;
        $this->SCGST->CurrentValue = $this->SCGST->FormValue;
        $this->PurValue->CurrentValue = $this->PurValue->FormValue;
        $this->PurRate->CurrentValue = $this->PurRate->FormValue;
        $this->PUnit->CurrentValue = $this->PUnit->FormValue;
        $this->SUnit->CurrentValue = $this->SUnit->FormValue;
        $this->HSNCODE->CurrentValue = $this->HSNCODE->FormValue;
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
        $this->SiNo->setDbValue($row['SiNo']);
        $this->SLNO->setDbValue($row['SLNO']);
        $this->Product->setDbValue($row['Product']);
        $this->RT->setDbValue($row['RT']);
        $this->IQ->setDbValue($row['IQ']);
        $this->DAMT->setDbValue($row['DAMT']);
        $this->Mfg->setDbValue($row['Mfg']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DN->setDbValue($row['DN']);
        $this->RDN->setDbValue($row['RDN']);
        $this->DT->setDbValue($row['DT']);
        $this->PRC->setDbValue($row['PRC']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->VALUE->setDbValue($row['VALUE']);
        $this->DISC->setDbValue($row['DISC']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->TAX->setDbValue($row['TAX']);
        $this->TAXR->setDbValue($row['TAXR']);
        $this->EMPNO->setDbValue($row['EMPNO']);
        $this->PC->setDbValue($row['PC']);
        $this->DRNAME->setDbValue($row['DRNAME']);
        $this->BTIME->setDbValue($row['BTIME']);
        $this->ONO->setDbValue($row['ONO']);
        $this->ODT->setDbValue($row['ODT']);
        $this->PURRT->setDbValue($row['PURRT']);
        $this->GRP->setDbValue($row['GRP']);
        $this->IBATCH->setDbValue($row['IBATCH']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->RECID->setDbValue($row['RECID']);
        $this->FQTY->setDbValue($row['FQTY']);
        $this->UR->setDbValue($row['UR']);
        $this->DCID->setDbValue($row['DCID']);
        $this->_USERID->setDbValue($row['USERID']);
        $this->MODDT->setDbValue($row['MODDT']);
        $this->FYM->setDbValue($row['FYM']);
        $this->PRCBATCH->setDbValue($row['PRCBATCH']);
        $this->MRP->setDbValue($row['MRP']);
        $this->BILLYM->setDbValue($row['BILLYM']);
        $this->BILLGRP->setDbValue($row['BILLGRP']);
        $this->STAFF->setDbValue($row['STAFF']);
        $this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
        $this->PRNTED->setDbValue($row['PRNTED']);
        $this->PATNAME->setDbValue($row['PATNAME']);
        $this->PJVNO->setDbValue($row['PJVNO']);
        $this->PJVSLNO->setDbValue($row['PJVSLNO']);
        $this->OTHDISC->setDbValue($row['OTHDISC']);
        $this->PJVYM->setDbValue($row['PJVYM']);
        $this->PURDISCPER->setDbValue($row['PURDISCPER']);
        $this->CASHIER->setDbValue($row['CASHIER']);
        $this->CASHTIME->setDbValue($row['CASHTIME']);
        $this->CASHRECD->setDbValue($row['CASHRECD']);
        $this->CASHREFNO->setDbValue($row['CASHREFNO']);
        $this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->RELEASEBY->setDbValue($row['RELEASEBY']);
        $this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
        $this->PAYMENT->setDbValue($row['PAYMENT']);
        $this->DRID->setDbValue($row['DRID']);
        $this->WARD->setDbValue($row['WARD']);
        $this->STAXTYPE->setDbValue($row['STAXTYPE']);
        $this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
        $this->RNDOFF->setDbValue($row['RNDOFF']);
        $this->DISCONMRP->setDbValue($row['DISCONMRP']);
        $this->DELVDT->setDbValue($row['DELVDT']);
        $this->DELVTIME->setDbValue($row['DELVTIME']);
        $this->DELVBY->setDbValue($row['DELVBY']);
        $this->HOSPNO->setDbValue($row['HOSPNO']);
        $this->id->setDbValue($row['id']);
        $this->pbv->setDbValue($row['pbv']);
        $this->pbt->setDbValue($row['pbt']);
        $this->HosoID->setDbValue($row['HosoID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->BRNAME->setDbValue($row['BRNAME']);
        $this->sretid->setDbValue($row['sretid']);
        $this->sprid->setDbValue($row['sprid']);
        $this->baid->setDbValue($row['baid']);
        $this->isdate->setDbValue($row['isdate']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->HSNCODE->setDbValue($row['HSNCODE']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['SiNo'] = $this->SiNo->CurrentValue;
        $row['SLNO'] = $this->SLNO->CurrentValue;
        $row['Product'] = $this->Product->CurrentValue;
        $row['RT'] = $this->RT->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['DAMT'] = $this->DAMT->CurrentValue;
        $row['Mfg'] = $this->Mfg->CurrentValue;
        $row['EXPDT'] = $this->EXPDT->CurrentValue;
        $row['BATCHNO'] = $this->BATCHNO->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['TYPE'] = $this->TYPE->CurrentValue;
        $row['DN'] = $this->DN->CurrentValue;
        $row['RDN'] = $this->RDN->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['OQ'] = $this->OQ->CurrentValue;
        $row['RQ'] = $this->RQ->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['BILLNO'] = $this->BILLNO->CurrentValue;
        $row['BILLDT'] = $this->BILLDT->CurrentValue;
        $row['VALUE'] = $this->VALUE->CurrentValue;
        $row['DISC'] = $this->DISC->CurrentValue;
        $row['TAXP'] = $this->TAXP->CurrentValue;
        $row['TAX'] = $this->TAX->CurrentValue;
        $row['TAXR'] = $this->TAXR->CurrentValue;
        $row['EMPNO'] = $this->EMPNO->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['DRNAME'] = $this->DRNAME->CurrentValue;
        $row['BTIME'] = $this->BTIME->CurrentValue;
        $row['ONO'] = $this->ONO->CurrentValue;
        $row['ODT'] = $this->ODT->CurrentValue;
        $row['PURRT'] = $this->PURRT->CurrentValue;
        $row['GRP'] = $this->GRP->CurrentValue;
        $row['IBATCH'] = $this->IBATCH->CurrentValue;
        $row['IPNO'] = $this->IPNO->CurrentValue;
        $row['OPNO'] = $this->OPNO->CurrentValue;
        $row['RECID'] = $this->RECID->CurrentValue;
        $row['FQTY'] = $this->FQTY->CurrentValue;
        $row['UR'] = $this->UR->CurrentValue;
        $row['DCID'] = $this->DCID->CurrentValue;
        $row['USERID'] = $this->_USERID->CurrentValue;
        $row['MODDT'] = $this->MODDT->CurrentValue;
        $row['FYM'] = $this->FYM->CurrentValue;
        $row['PRCBATCH'] = $this->PRCBATCH->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['BILLYM'] = $this->BILLYM->CurrentValue;
        $row['BILLGRP'] = $this->BILLGRP->CurrentValue;
        $row['STAFF'] = $this->STAFF->CurrentValue;
        $row['TEMPIPNO'] = $this->TEMPIPNO->CurrentValue;
        $row['PRNTED'] = $this->PRNTED->CurrentValue;
        $row['PATNAME'] = $this->PATNAME->CurrentValue;
        $row['PJVNO'] = $this->PJVNO->CurrentValue;
        $row['PJVSLNO'] = $this->PJVSLNO->CurrentValue;
        $row['OTHDISC'] = $this->OTHDISC->CurrentValue;
        $row['PJVYM'] = $this->PJVYM->CurrentValue;
        $row['PURDISCPER'] = $this->PURDISCPER->CurrentValue;
        $row['CASHIER'] = $this->CASHIER->CurrentValue;
        $row['CASHTIME'] = $this->CASHTIME->CurrentValue;
        $row['CASHRECD'] = $this->CASHRECD->CurrentValue;
        $row['CASHREFNO'] = $this->CASHREFNO->CurrentValue;
        $row['CASHIERSHIFT'] = $this->CASHIERSHIFT->CurrentValue;
        $row['PRCODE'] = $this->PRCODE->CurrentValue;
        $row['RELEASEBY'] = $this->RELEASEBY->CurrentValue;
        $row['CRAUTHOR'] = $this->CRAUTHOR->CurrentValue;
        $row['PAYMENT'] = $this->PAYMENT->CurrentValue;
        $row['DRID'] = $this->DRID->CurrentValue;
        $row['WARD'] = $this->WARD->CurrentValue;
        $row['STAXTYPE'] = $this->STAXTYPE->CurrentValue;
        $row['PURDISCVAL'] = $this->PURDISCVAL->CurrentValue;
        $row['RNDOFF'] = $this->RNDOFF->CurrentValue;
        $row['DISCONMRP'] = $this->DISCONMRP->CurrentValue;
        $row['DELVDT'] = $this->DELVDT->CurrentValue;
        $row['DELVTIME'] = $this->DELVTIME->CurrentValue;
        $row['DELVBY'] = $this->DELVBY->CurrentValue;
        $row['HOSPNO'] = $this->HOSPNO->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['pbv'] = $this->pbv->CurrentValue;
        $row['pbt'] = $this->pbt->CurrentValue;
        $row['HosoID'] = $this->HosoID->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['BRNAME'] = $this->BRNAME->CurrentValue;
        $row['sretid'] = $this->sretid->CurrentValue;
        $row['sprid'] = $this->sprid->CurrentValue;
        $row['baid'] = $this->baid->CurrentValue;
        $row['isdate'] = $this->isdate->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['PurValue'] = $this->PurValue->CurrentValue;
        $row['PurRate'] = $this->PurRate->CurrentValue;
        $row['PUnit'] = $this->PUnit->CurrentValue;
        $row['SUnit'] = $this->SUnit->CurrentValue;
        $row['HSNCODE'] = $this->HSNCODE->CurrentValue;
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
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue))) {
            $this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue))) {
            $this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue))) {
            $this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // SiNo

        // SLNO

        // Product

        // RT

        // IQ

        // DAMT

        // Mfg

        // EXPDT

        // BATCHNO

        // BRCODE

        // TYPE

        // DN

        // RDN

        // DT

        // PRC

        // OQ

        // RQ

        // MRQ

        // BILLNO

        // BILLDT

        // VALUE

        // DISC

        // TAXP

        // TAX

        // TAXR

        // EMPNO

        // PC

        // DRNAME

        // BTIME

        // ONO

        // ODT

        // PURRT

        // GRP

        // IBATCH

        // IPNO

        // OPNO

        // RECID

        // FQTY

        // UR

        // DCID

        // USERID

        // MODDT

        // FYM

        // PRCBATCH

        // MRP

        // BILLYM

        // BILLGRP

        // STAFF

        // TEMPIPNO

        // PRNTED

        // PATNAME

        // PJVNO

        // PJVSLNO

        // OTHDISC

        // PJVYM

        // PURDISCPER

        // CASHIER

        // CASHTIME

        // CASHRECD

        // CASHREFNO

        // CASHIERSHIFT

        // PRCODE

        // RELEASEBY

        // CRAUTHOR

        // PAYMENT

        // DRID

        // WARD

        // STAXTYPE

        // PURDISCVAL

        // RNDOFF

        // DISCONMRP

        // DELVDT

        // DELVTIME

        // DELVBY

        // HOSPNO

        // id

        // pbv

        // pbt

        // HosoID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // MFRCODE

        // Reception

        // PatID

        // mrnno

        // BRNAME

        // sretid

        // sprid

        // baid

        // isdate

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // PurValue

        // PurRate

        // PUnit

        // SUnit

        // HSNCODE
        if ($this->RowType == ROWTYPE_VIEW) {
            // SiNo
            $this->SiNo->ViewValue = $this->SiNo->CurrentValue;
            $this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
            $this->SiNo->ViewCustomAttributes = "";

            // SLNO
            $this->SLNO->ViewValue = $this->SLNO->CurrentValue;
            $curVal = trim(strval($this->SLNO->CurrentValue));
            if ($curVal != "") {
                $this->SLNO->ViewValue = $this->SLNO->lookupCacheOption($curVal);
                if ($this->SLNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->SLNO->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SLNO->Lookup->renderViewRow($rswrk[0]);
                        $this->SLNO->ViewValue = $this->SLNO->displayValue($arwrk);
                    } else {
                        $this->SLNO->ViewValue = $this->SLNO->CurrentValue;
                    }
                }
            } else {
                $this->SLNO->ViewValue = null;
            }
            $this->SLNO->ViewCustomAttributes = "";

            // Product
            $this->Product->ViewValue = $this->Product->CurrentValue;
            $this->Product->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // DAMT
            $this->DAMT->ViewValue = $this->DAMT->CurrentValue;
            $this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
            $this->DAMT->ViewCustomAttributes = "";

            // Mfg
            $this->Mfg->ViewValue = $this->Mfg->CurrentValue;
            $this->Mfg->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewCustomAttributes = "";

            // TYPE
            $this->TYPE->ViewValue = $this->TYPE->CurrentValue;
            $this->TYPE->ViewCustomAttributes = "";

            // DN
            $this->DN->ViewValue = $this->DN->CurrentValue;
            $this->DN->ViewCustomAttributes = "";

            // RDN
            $this->RDN->ViewValue = $this->RDN->CurrentValue;
            $this->RDN->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
            $this->BILLDT->ViewCustomAttributes = "";

            // VALUE
            $this->VALUE->ViewValue = $this->VALUE->CurrentValue;
            $this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
            $this->VALUE->ViewCustomAttributes = "";

            // DISC
            $this->DISC->ViewValue = $this->DISC->CurrentValue;
            $this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
            $this->DISC->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // TAX
            $this->TAX->ViewValue = $this->TAX->CurrentValue;
            $this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
            $this->TAX->ViewCustomAttributes = "";

            // TAXR
            $this->TAXR->ViewValue = $this->TAXR->CurrentValue;
            $this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
            $this->TAXR->ViewCustomAttributes = "";

            // EMPNO
            $this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
            $this->EMPNO->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // DRNAME
            $this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
            $this->DRNAME->ViewCustomAttributes = "";

            // BTIME
            $this->BTIME->ViewValue = $this->BTIME->CurrentValue;
            $this->BTIME->ViewCustomAttributes = "";

            // ONO
            $this->ONO->ViewValue = $this->ONO->CurrentValue;
            $this->ONO->ViewCustomAttributes = "";

            // ODT
            $this->ODT->ViewValue = $this->ODT->CurrentValue;
            $this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
            $this->ODT->ViewCustomAttributes = "";

            // PURRT
            $this->PURRT->ViewValue = $this->PURRT->CurrentValue;
            $this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
            $this->PURRT->ViewCustomAttributes = "";

            // GRP
            $this->GRP->ViewValue = $this->GRP->CurrentValue;
            $this->GRP->ViewCustomAttributes = "";

            // IBATCH
            $this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
            $this->IBATCH->ViewCustomAttributes = "";

            // IPNO
            $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
            $this->IPNO->ViewCustomAttributes = "";

            // OPNO
            $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
            $this->OPNO->ViewCustomAttributes = "";

            // RECID
            $this->RECID->ViewValue = $this->RECID->CurrentValue;
            $this->RECID->ViewCustomAttributes = "";

            // FQTY
            $this->FQTY->ViewValue = $this->FQTY->CurrentValue;
            $this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
            $this->FQTY->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // DCID
            $this->DCID->ViewValue = $this->DCID->CurrentValue;
            $this->DCID->ViewCustomAttributes = "";

            // USERID
            $this->_USERID->ViewValue = $this->_USERID->CurrentValue;
            $this->_USERID->ViewCustomAttributes = "";

            // MODDT
            $this->MODDT->ViewValue = $this->MODDT->CurrentValue;
            $this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
            $this->MODDT->ViewCustomAttributes = "";

            // FYM
            $this->FYM->ViewValue = $this->FYM->CurrentValue;
            $this->FYM->ViewCustomAttributes = "";

            // PRCBATCH
            $this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
            $this->PRCBATCH->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // BILLYM
            $this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
            $this->BILLYM->ViewCustomAttributes = "";

            // BILLGRP
            $this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
            $this->BILLGRP->ViewCustomAttributes = "";

            // STAFF
            $this->STAFF->ViewValue = $this->STAFF->CurrentValue;
            $this->STAFF->ViewCustomAttributes = "";

            // TEMPIPNO
            $this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
            $this->TEMPIPNO->ViewCustomAttributes = "";

            // PRNTED
            $this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
            $this->PRNTED->ViewCustomAttributes = "";

            // PATNAME
            $this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
            $this->PATNAME->ViewCustomAttributes = "";

            // PJVNO
            $this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
            $this->PJVNO->ViewCustomAttributes = "";

            // PJVSLNO
            $this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
            $this->PJVSLNO->ViewCustomAttributes = "";

            // OTHDISC
            $this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
            $this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
            $this->OTHDISC->ViewCustomAttributes = "";

            // PJVYM
            $this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
            $this->PJVYM->ViewCustomAttributes = "";

            // PURDISCPER
            $this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
            $this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
            $this->PURDISCPER->ViewCustomAttributes = "";

            // CASHIER
            $this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
            $this->CASHIER->ViewCustomAttributes = "";

            // CASHTIME
            $this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
            $this->CASHTIME->ViewCustomAttributes = "";

            // CASHRECD
            $this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
            $this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
            $this->CASHRECD->ViewCustomAttributes = "";

            // CASHREFNO
            $this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
            $this->CASHREFNO->ViewCustomAttributes = "";

            // CASHIERSHIFT
            $this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
            $this->CASHIERSHIFT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // RELEASEBY
            $this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
            $this->RELEASEBY->ViewCustomAttributes = "";

            // CRAUTHOR
            $this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
            $this->CRAUTHOR->ViewCustomAttributes = "";

            // PAYMENT
            $this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
            $this->PAYMENT->ViewCustomAttributes = "";

            // DRID
            $this->DRID->ViewValue = $this->DRID->CurrentValue;
            $this->DRID->ViewCustomAttributes = "";

            // WARD
            $this->WARD->ViewValue = $this->WARD->CurrentValue;
            $this->WARD->ViewCustomAttributes = "";

            // STAXTYPE
            $this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
            $this->STAXTYPE->ViewCustomAttributes = "";

            // PURDISCVAL
            $this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
            $this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
            $this->PURDISCVAL->ViewCustomAttributes = "";

            // RNDOFF
            $this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
            $this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
            $this->RNDOFF->ViewCustomAttributes = "";

            // DISCONMRP
            $this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
            $this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
            $this->DISCONMRP->ViewCustomAttributes = "";

            // DELVDT
            $this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
            $this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
            $this->DELVDT->ViewCustomAttributes = "";

            // DELVTIME
            $this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
            $this->DELVTIME->ViewCustomAttributes = "";

            // DELVBY
            $this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
            $this->DELVBY->ViewCustomAttributes = "";

            // HOSPNO
            $this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
            $this->HOSPNO->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // pbv
            $this->pbv->ViewValue = $this->pbv->CurrentValue;
            $this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
            $this->pbv->ViewCustomAttributes = "";

            // pbt
            $this->pbt->ViewValue = $this->pbt->CurrentValue;
            $this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
            $this->pbt->ViewCustomAttributes = "";

            // HosoID
            $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
            $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
            $this->HosoID->ViewCustomAttributes = "";

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

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // BRNAME
            $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
            $this->BRNAME->ViewCustomAttributes = "";

            // sretid
            $this->sretid->ViewValue = $this->sretid->CurrentValue;
            $this->sretid->ViewValue = FormatNumber($this->sretid->ViewValue, 0, -2, -2, -2);
            $this->sretid->ViewCustomAttributes = "";

            // sprid
            $this->sprid->ViewValue = $this->sprid->CurrentValue;
            $this->sprid->ViewValue = FormatNumber($this->sprid->ViewValue, 0, -2, -2, -2);
            $this->sprid->ViewCustomAttributes = "";

            // baid
            $this->baid->ViewValue = $this->baid->CurrentValue;
            $this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
            $this->baid->ViewCustomAttributes = "";

            // isdate
            $this->isdate->ViewValue = $this->isdate->CurrentValue;
            $this->isdate->ViewValue = FormatDateTime($this->isdate->ViewValue, 0);
            $this->isdate->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // HSNCODE
            $this->HSNCODE->ViewValue = $this->HSNCODE->CurrentValue;
            $this->HSNCODE->ViewCustomAttributes = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";
            $this->SiNo->TooltipValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";
            $this->SLNO->TooltipValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";
            $this->Product->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";
            $this->DAMT->TooltipValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";
            $this->Mfg->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";
            $this->_USERID->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";
            $this->HosoID->TooltipValue = "";

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

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
            $this->BRNAME->TooltipValue = "";

            // baid
            $this->baid->LinkCustomAttributes = "";
            $this->baid->HrefValue = "";
            $this->baid->TooltipValue = "";

            // isdate
            $this->isdate->LinkCustomAttributes = "";
            $this->isdate->HrefValue = "";
            $this->isdate->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";
            $this->PUnit->TooltipValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";
            $this->SUnit->TooltipValue = "";

            // HSNCODE
            $this->HSNCODE->LinkCustomAttributes = "";
            $this->HSNCODE->HrefValue = "";
            $this->HSNCODE->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // SiNo
            $this->SiNo->EditAttrs["class"] = "form-control";
            $this->SiNo->EditCustomAttributes = "";
            $this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
            $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

            // SLNO
            $this->SLNO->EditAttrs["class"] = "form-control";
            $this->SLNO->EditCustomAttributes = "";
            $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
            $curVal = trim(strval($this->SLNO->CurrentValue));
            if ($curVal != "") {
                $this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
                if ($this->SLNO->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->SLNO->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SLNO->Lookup->renderViewRow($rswrk[0]);
                        $this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
                    } else {
                        $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
                    }
                }
            } else {
                $this->SLNO->EditValue = null;
            }
            $this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

            // Product
            $this->Product->EditAttrs["class"] = "form-control";
            $this->Product->EditCustomAttributes = "";
            if (!$this->Product->Raw) {
                $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
            }
            $this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
            $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
                $this->RT->OldValue = $this->RT->EditValue;
            }

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
                $this->IQ->OldValue = $this->IQ->EditValue;
            }

            // DAMT
            $this->DAMT->EditAttrs["class"] = "form-control";
            $this->DAMT->EditCustomAttributes = "";
            $this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
            $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
            if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
                $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
                $this->DAMT->OldValue = $this->DAMT->EditValue;
            }

            // Mfg
            $this->Mfg->EditAttrs["class"] = "form-control";
            $this->Mfg->EditCustomAttributes = "";
            if (!$this->Mfg->Raw) {
                $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
            }
            $this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
            $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // BRCODE

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
                $this->UR->OldValue = $this->UR->EditValue;
            }

            // USERID

            // id

            // HosoID

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // BRNAME

            // baid
            $this->baid->EditAttrs["class"] = "form-control";
            $this->baid->EditCustomAttributes = "";
            $this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
            $this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

            // isdate

            // PSGST
            $this->PSGST->EditAttrs["class"] = "form-control";
            $this->PSGST->EditCustomAttributes = "";
            $this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
            $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
            if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue)) {
                $this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
                $this->PSGST->OldValue = $this->PSGST->EditValue;
            }

            // PCGST
            $this->PCGST->EditAttrs["class"] = "form-control";
            $this->PCGST->EditCustomAttributes = "";
            $this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
            $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
            if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue)) {
                $this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
                $this->PCGST->OldValue = $this->PCGST->EditValue;
            }

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
            if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
                $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
                $this->SSGST->OldValue = $this->SSGST->EditValue;
            }

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
            if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
                $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
                $this->SCGST->OldValue = $this->SCGST->EditValue;
            }

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
            if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
                $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
                $this->PurValue->OldValue = $this->PurValue->EditValue;
            }

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
            if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
                $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
                $this->PurRate->OldValue = $this->PurRate->EditValue;
            }

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // HSNCODE
            $this->HSNCODE->EditAttrs["class"] = "form-control";
            $this->HSNCODE->EditCustomAttributes = "";
            if (!$this->HSNCODE->Raw) {
                $this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
            }
            $this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
            $this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

            // Add refer script

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";

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

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";

            // baid
            $this->baid->LinkCustomAttributes = "";
            $this->baid->HrefValue = "";

            // isdate
            $this->isdate->LinkCustomAttributes = "";
            $this->isdate->HrefValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";

            // HSNCODE
            $this->HSNCODE->LinkCustomAttributes = "";
            $this->HSNCODE->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // SiNo
            $this->SiNo->EditAttrs["class"] = "form-control";
            $this->SiNo->EditCustomAttributes = "";
            $this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
            $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

            // SLNO
            $this->SLNO->EditAttrs["class"] = "form-control";
            $this->SLNO->EditCustomAttributes = "";
            $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
            $curVal = trim(strval($this->SLNO->CurrentValue));
            if ($curVal != "") {
                $this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
                if ($this->SLNO->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->SLNO->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SLNO->Lookup->renderViewRow($rswrk[0]);
                        $this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
                    } else {
                        $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
                    }
                }
            } else {
                $this->SLNO->EditValue = null;
            }
            $this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

            // Product
            $this->Product->EditAttrs["class"] = "form-control";
            $this->Product->EditCustomAttributes = "";
            if (!$this->Product->Raw) {
                $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
            }
            $this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
            $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
                $this->RT->OldValue = $this->RT->EditValue;
            }

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
                $this->IQ->OldValue = $this->IQ->EditValue;
            }

            // DAMT
            $this->DAMT->EditAttrs["class"] = "form-control";
            $this->DAMT->EditCustomAttributes = "";
            $this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
            $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
            if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
                $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
                $this->DAMT->OldValue = $this->DAMT->EditValue;
            }

            // Mfg
            $this->Mfg->EditAttrs["class"] = "form-control";
            $this->Mfg->EditCustomAttributes = "";
            if (!$this->Mfg->Raw) {
                $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
            }
            $this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
            $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // BRCODE

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
                $this->UR->OldValue = $this->UR->EditValue;
            }

            // USERID

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // HosoID

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // BRNAME

            // baid
            $this->baid->EditAttrs["class"] = "form-control";
            $this->baid->EditCustomAttributes = "";
            $this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
            $this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

            // isdate

            // PSGST
            $this->PSGST->EditAttrs["class"] = "form-control";
            $this->PSGST->EditCustomAttributes = "";
            $this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
            $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
            if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue)) {
                $this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
                $this->PSGST->OldValue = $this->PSGST->EditValue;
            }

            // PCGST
            $this->PCGST->EditAttrs["class"] = "form-control";
            $this->PCGST->EditCustomAttributes = "";
            $this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
            $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
            if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue)) {
                $this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
                $this->PCGST->OldValue = $this->PCGST->EditValue;
            }

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
            if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
                $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
                $this->SSGST->OldValue = $this->SSGST->EditValue;
            }

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
            if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
                $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
                $this->SCGST->OldValue = $this->SCGST->EditValue;
            }

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
            if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
                $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
                $this->PurValue->OldValue = $this->PurValue->EditValue;
            }

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
            if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
                $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
                $this->PurRate->OldValue = $this->PurRate->EditValue;
            }

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // HSNCODE
            $this->HSNCODE->EditAttrs["class"] = "form-control";
            $this->HSNCODE->EditCustomAttributes = "";
            if (!$this->HSNCODE->Raw) {
                $this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
            }
            $this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
            $this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

            // Edit refer script

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";

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

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";

            // baid
            $this->baid->LinkCustomAttributes = "";
            $this->baid->HrefValue = "";

            // isdate
            $this->isdate->LinkCustomAttributes = "";
            $this->isdate->HrefValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";

            // HSNCODE
            $this->HSNCODE->LinkCustomAttributes = "";
            $this->HSNCODE->HrefValue = "";
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
        if ($this->SiNo->Required) {
            if (!$this->SiNo->IsDetailKey && EmptyValue($this->SiNo->FormValue)) {
                $this->SiNo->addErrorMessage(str_replace("%s", $this->SiNo->caption(), $this->SiNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SiNo->FormValue)) {
            $this->SiNo->addErrorMessage($this->SiNo->getErrorMessage(false));
        }
        if ($this->SLNO->Required) {
            if (!$this->SLNO->IsDetailKey && EmptyValue($this->SLNO->FormValue)) {
                $this->SLNO->addErrorMessage(str_replace("%s", $this->SLNO->caption(), $this->SLNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SLNO->FormValue)) {
            $this->SLNO->addErrorMessage($this->SLNO->getErrorMessage(false));
        }
        if ($this->Product->Required) {
            if (!$this->Product->IsDetailKey && EmptyValue($this->Product->FormValue)) {
                $this->Product->addErrorMessage(str_replace("%s", $this->Product->caption(), $this->Product->RequiredErrorMessage));
            }
        }
        if ($this->RT->Required) {
            if (!$this->RT->IsDetailKey && EmptyValue($this->RT->FormValue)) {
                $this->RT->addErrorMessage(str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RT->FormValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if ($this->IQ->Required) {
            if (!$this->IQ->IsDetailKey && EmptyValue($this->IQ->FormValue)) {
                $this->IQ->addErrorMessage(str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IQ->FormValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if ($this->DAMT->Required) {
            if (!$this->DAMT->IsDetailKey && EmptyValue($this->DAMT->FormValue)) {
                $this->DAMT->addErrorMessage(str_replace("%s", $this->DAMT->caption(), $this->DAMT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DAMT->FormValue)) {
            $this->DAMT->addErrorMessage($this->DAMT->getErrorMessage(false));
        }
        if ($this->Mfg->Required) {
            if (!$this->Mfg->IsDetailKey && EmptyValue($this->Mfg->FormValue)) {
                $this->Mfg->addErrorMessage(str_replace("%s", $this->Mfg->caption(), $this->Mfg->RequiredErrorMessage));
            }
        }
        if ($this->EXPDT->Required) {
            if (!$this->EXPDT->IsDetailKey && EmptyValue($this->EXPDT->FormValue)) {
                $this->EXPDT->addErrorMessage(str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EXPDT->FormValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
            }
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->UR->Required) {
            if (!$this->UR->IsDetailKey && EmptyValue($this->UR->FormValue)) {
                $this->UR->addErrorMessage(str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UR->FormValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if ($this->_USERID->Required) {
            if (!$this->_USERID->IsDetailKey && EmptyValue($this->_USERID->FormValue)) {
                $this->_USERID->addErrorMessage(str_replace("%s", $this->_USERID->caption(), $this->_USERID->RequiredErrorMessage));
            }
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->HosoID->Required) {
            if (!$this->HosoID->IsDetailKey && EmptyValue($this->HosoID->FormValue)) {
                $this->HosoID->addErrorMessage(str_replace("%s", $this->HosoID->caption(), $this->HosoID->RequiredErrorMessage));
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
        if ($this->BRNAME->Required) {
            if (!$this->BRNAME->IsDetailKey && EmptyValue($this->BRNAME->FormValue)) {
                $this->BRNAME->addErrorMessage(str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
            }
        }
        if ($this->baid->Required) {
            if (!$this->baid->IsDetailKey && EmptyValue($this->baid->FormValue)) {
                $this->baid->addErrorMessage(str_replace("%s", $this->baid->caption(), $this->baid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->baid->FormValue)) {
            $this->baid->addErrorMessage($this->baid->getErrorMessage(false));
        }
        if ($this->isdate->Required) {
            if (!$this->isdate->IsDetailKey && EmptyValue($this->isdate->FormValue)) {
                $this->isdate->addErrorMessage(str_replace("%s", $this->isdate->caption(), $this->isdate->RequiredErrorMessage));
            }
        }
        if ($this->PSGST->Required) {
            if (!$this->PSGST->IsDetailKey && EmptyValue($this->PSGST->FormValue)) {
                $this->PSGST->addErrorMessage(str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PSGST->FormValue)) {
            $this->PSGST->addErrorMessage($this->PSGST->getErrorMessage(false));
        }
        if ($this->PCGST->Required) {
            if (!$this->PCGST->IsDetailKey && EmptyValue($this->PCGST->FormValue)) {
                $this->PCGST->addErrorMessage(str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PCGST->FormValue)) {
            $this->PCGST->addErrorMessage($this->PCGST->getErrorMessage(false));
        }
        if ($this->SSGST->Required) {
            if (!$this->SSGST->IsDetailKey && EmptyValue($this->SSGST->FormValue)) {
                $this->SSGST->addErrorMessage(str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SSGST->FormValue)) {
            $this->SSGST->addErrorMessage($this->SSGST->getErrorMessage(false));
        }
        if ($this->SCGST->Required) {
            if (!$this->SCGST->IsDetailKey && EmptyValue($this->SCGST->FormValue)) {
                $this->SCGST->addErrorMessage(str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SCGST->FormValue)) {
            $this->SCGST->addErrorMessage($this->SCGST->getErrorMessage(false));
        }
        if ($this->PurValue->Required) {
            if (!$this->PurValue->IsDetailKey && EmptyValue($this->PurValue->FormValue)) {
                $this->PurValue->addErrorMessage(str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurValue->FormValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if ($this->PurRate->Required) {
            if (!$this->PurRate->IsDetailKey && EmptyValue($this->PurRate->FormValue)) {
                $this->PurRate->addErrorMessage(str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurRate->FormValue)) {
            $this->PurRate->addErrorMessage($this->PurRate->getErrorMessage(false));
        }
        if ($this->PUnit->Required) {
            if (!$this->PUnit->IsDetailKey && EmptyValue($this->PUnit->FormValue)) {
                $this->PUnit->addErrorMessage(str_replace("%s", $this->PUnit->caption(), $this->PUnit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PUnit->FormValue)) {
            $this->PUnit->addErrorMessage($this->PUnit->getErrorMessage(false));
        }
        if ($this->SUnit->Required) {
            if (!$this->SUnit->IsDetailKey && EmptyValue($this->SUnit->FormValue)) {
                $this->SUnit->addErrorMessage(str_replace("%s", $this->SUnit->caption(), $this->SUnit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SUnit->FormValue)) {
            $this->SUnit->addErrorMessage($this->SUnit->getErrorMessage(false));
        }
        if ($this->HSNCODE->Required) {
            if (!$this->HSNCODE->IsDetailKey && EmptyValue($this->HSNCODE->FormValue)) {
                $this->HSNCODE->addErrorMessage(str_replace("%s", $this->HSNCODE->caption(), $this->HSNCODE->RequiredErrorMessage));
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

            // SiNo
            $this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, null, $this->SiNo->ReadOnly);

            // SLNO
            $this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, null, $this->SLNO->ReadOnly);

            // Product
            $this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, null, $this->Product->ReadOnly);

            // RT
            $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, $this->RT->ReadOnly);

            // IQ
            $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, $this->IQ->ReadOnly);

            // DAMT
            $this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, null, $this->DAMT->ReadOnly);

            // Mfg
            $this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, null, $this->Mfg->ReadOnly);

            // EXPDT
            $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, $this->EXPDT->ReadOnly);

            // BATCHNO
            $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, $this->BATCHNO->ReadOnly);

            // BRCODE
            $this->BRCODE->CurrentValue = PharmacyID();
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null);

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // UR
            $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, $this->UR->ReadOnly);

            // USERID
            $this->_USERID->CurrentValue = CurrentUserID();
            $this->_USERID->setDbValueDef($rsnew, $this->_USERID->CurrentValue, null);

            // HosoID
            $this->HosoID->CurrentValue = HospitalID();
            $this->HosoID->setDbValueDef($rsnew, $this->HosoID->CurrentValue, null);

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

            // BRNAME
            $this->BRNAME->CurrentValue = PharmacyID();
            $this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, null);

            // baid
            $this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, null, $this->baid->ReadOnly);

            // isdate
            $this->isdate->CurrentValue = CurrentDate();
            $this->isdate->setDbValueDef($rsnew, $this->isdate->CurrentValue, null);

            // PSGST
            $this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, null, $this->PSGST->ReadOnly);

            // PCGST
            $this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, null, $this->PCGST->ReadOnly);

            // SSGST
            $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, $this->SSGST->ReadOnly);

            // SCGST
            $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, $this->SCGST->ReadOnly);

            // PurValue
            $this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, null, $this->PurValue->ReadOnly);

            // PurRate
            $this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, null, $this->PurRate->ReadOnly);

            // PUnit
            $this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, null, $this->PUnit->ReadOnly);

            // SUnit
            $this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, null, $this->SUnit->ReadOnly);

            // HSNCODE
            $this->HSNCODE->setDbValueDef($rsnew, $this->HSNCODE->CurrentValue, null, $this->HSNCODE->ReadOnly);

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
        if ($this->getCurrentMasterTable() == "pharmacy_billing_voucher") {
            $this->pbv->CurrentValue = $this->pbv->getSessionValue();
        }
        if ($this->getCurrentMasterTable() == "pharmacy_billing_issue") {
            $this->pbt->CurrentValue = $this->pbt->getSessionValue();
        }
        if ($this->getCurrentMasterTable() == "ip_admission") {
            $this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
            $this->PatID->CurrentValue = $this->PatID->getSessionValue();
            $this->Reception->CurrentValue = $this->Reception->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // SiNo
        $this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, null, false);

        // SLNO
        $this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, null, false);

        // Product
        $this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, null, false);

        // RT
        $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, false);

        // IQ
        $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, false);

        // DAMT
        $this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, null, false);

        // Mfg
        $this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, null, false);

        // EXPDT
        $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, false);

        // BATCHNO
        $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, false);

        // BRCODE
        $this->BRCODE->CurrentValue = PharmacyID();
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null);

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // UR
        $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, false);

        // USERID
        $this->_USERID->CurrentValue = CurrentUserID();
        $this->_USERID->setDbValueDef($rsnew, $this->_USERID->CurrentValue, null);

        // HosoID
        $this->HosoID->CurrentValue = HospitalID();
        $this->HosoID->setDbValueDef($rsnew, $this->HosoID->CurrentValue, null);

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

        // BRNAME
        $this->BRNAME->CurrentValue = PharmacyID();
        $this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, null);

        // baid
        $this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, null, false);

        // isdate
        $this->isdate->CurrentValue = CurrentDate();
        $this->isdate->setDbValueDef($rsnew, $this->isdate->CurrentValue, null);

        // PSGST
        $this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, null, false);

        // PCGST
        $this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, null, false);

        // SSGST
        $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, false);

        // SCGST
        $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, false);

        // PurValue
        $this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, null, false);

        // PurRate
        $this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, null, false);

        // PUnit
        $this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, null, false);

        // SUnit
        $this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, null, false);

        // HSNCODE
        $this->HSNCODE->setDbValueDef($rsnew, $this->HSNCODE->CurrentValue, null, false);

        // pbv
        if ($this->pbv->getSessionValue() != "") {
            $rsnew['pbv'] = $this->pbv->getSessionValue();
        }

        // pbt
        if ($this->pbt->getSessionValue() != "") {
            $rsnew['pbt'] = $this->pbt->getSessionValue();
        }

        // Reception
        if ($this->Reception->getSessionValue() != "") {
            $rsnew['Reception'] = $this->Reception->getSessionValue();
        }

        // PatID
        if ($this->PatID->getSessionValue() != "") {
            $rsnew['PatID'] = $this->PatID->getSessionValue();
        }

        // mrnno
        if ($this->mrnno->getSessionValue() != "") {
            $rsnew['mrnno'] = $this->mrnno->getSessionValue();
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
        if ($masterTblVar == "pharmacy_billing_voucher") {
            $masterTbl = Container("pharmacy_billing_voucher");
            $this->pbv->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
        }
        if ($masterTblVar == "pharmacy_billing_issue") {
            $masterTbl = Container("pharmacy_billing_issue");
            $this->pbt->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
        }
        if ($masterTblVar == "ip_admission") {
            $masterTbl = Container("ip_admission");
            $this->mrnno->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->PatID->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->Reception->Visible = false;
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
                case "x_SLNO":
                    $lookupFilter = function () {
                        return "`BRCODE`='".PharmacyID()."'  and  `Stock`>0 ";
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
    public function pageRender() {
    //	$this->SiNo->CurrentValue=$this->RowIndex;
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
