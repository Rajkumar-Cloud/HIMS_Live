<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IpAdmissionList extends IpAdmission
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ip_admission';

    // Page object name
    public $PageObjName = "IpAdmissionList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fip_admissionlist";
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

    // Export URLs
    public $ExportPrintUrl;
    public $ExportHtmlUrl;
    public $ExportExcelUrl;
    public $ExportWordUrl;
    public $ExportXmlUrl;
    public $ExportCsvUrl;
    public $ExportPdfUrl;

    // Custom export
    public $ExportExcelCustom = false;
    public $ExportWordCustom = false;
    public $ExportPdfCustom = false;
    public $ExportEmailCustom = false;

    // Update URLs
    public $InlineAddUrl;
    public $InlineCopyUrl;
    public $InlineEditUrl;
    public $GridAddUrl;
    public $GridEditUrl;
    public $MultiDeleteUrl;
    public $MultiUpdateUrl;

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
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (ip_admission)
        if (!isset($GLOBALS["ip_admission"]) || get_class($GLOBALS["ip_admission"]) == PROJECT_NAMESPACE . "ip_admission") {
            $GLOBALS["ip_admission"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Initialize URLs
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->AddUrl = "IpAdmissionAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IpAdmissionDelete";
        $this->MultiUpdateUrl = "IpAdmissionUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ip_admission');
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

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Import options
        $this->ImportOptions = new ListOptions("div");
        $this->ImportOptions->TagClassName = "ew-import-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";

        // Filter options
        $this->FilterOptions = new ListOptions("div");
        $this->FilterOptions->TagClassName = "ew-filter-option fip_admissionlistsrch";

        // List actions
        $this->ListActions = new ListActions();
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

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("ip_admission"));
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
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

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
                        if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0) {
                            $val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
                        }
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
            $this->status->Visible = false;
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

        // Get export parameters
        $custom = "";
        if (Param("export") !== null) {
            $this->Export = Param("export");
            $custom = Param("custom", "");
        } elseif (IsPost()) {
            if (Post("exporttype") !== null) {
                $this->Export = Post("exporttype");
            }
            $custom = Post("custom", "");
        } elseif (Get("cmd") == "json") {
            $this->Export = Get("cmd");
        } else {
            $this->setExportReturnUrl(CurrentUrl());
        }
        $ExportFileName = $this->TableVar; // Get export file, used in header

        // Get custom export parameters
        if ($this->isExport() && $custom != "") {
            $this->CustomExport = $this->Export;
            $this->Export = "print";
        }
        $CustomExportType = $this->CustomExport;
        $ExportType = $this->Export; // Get export parameter, used in header

        // Update Export URLs
        if (Config("USE_PHPEXCEL")) {
            $this->ExportExcelCustom = false;
        }
        if (Config("USE_PHPWORD")) {
            $this->ExportWordCustom = false;
        }
        if ($this->ExportExcelCustom) {
            $this->ExportExcelUrl .= "&amp;custom=1";
        }
        if ($this->ExportWordCustom) {
            $this->ExportWordUrl .= "&amp;custom=1";
        }
        if ($this->ExportPdfCustom) {
            $this->ExportPdfUrl .= "&amp;custom=1";
        }
        $this->CurrentAction = Param("action"); // Set up current action

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();

        // Setup export options
        $this->setupExportOptions();
        $this->id->setVisibility();
        $this->mrnNo->setVisibility();
        $this->PatientID->setVisibility();
        $this->patient_name->setVisibility();
        $this->mobileno->setVisibility();
        $this->gender->setVisibility();
        $this->age->setVisibility();
        $this->typeRegsisteration->setVisibility();
        $this->PaymentCategory->setVisibility();
        $this->physician_id->setVisibility();
        $this->admission_consultant_id->setVisibility();
        $this->leading_consultant_id->setVisibility();
        $this->cause->Visible = false;
        $this->admission_date->setVisibility();
        $this->release_date->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->status->Visible = false;
        $this->createdby->Visible = false;
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->profilePic->setVisibility();
        $this->HospID->setVisibility();
        $this->DOB->Visible = false;
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->BillClosing->setVisibility();
        $this->BillClosingDate->setVisibility();
        $this->BillNumber->setVisibility();
        $this->ClosingAmount->setVisibility();
        $this->ClosingType->setVisibility();
        $this->BillAmount->setVisibility();
        $this->billclosedBy->setVisibility();
        $this->bllcloseByDate->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->Procedure->setVisibility();
        $this->Consultant->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->Amound->setVisibility();
        $this->Package->setVisibility();
        $this->patient_id->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->Cid->setVisibility();
        $this->PartId->setVisibility();
        $this->IDProof->setVisibility();
        $this->AdviceToOtherHospital->setVisibility();
        $this->Reason->Visible = false;
        $this->hideFieldsForAddEdit();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Setup other options
        $this->setupOtherOptions();

        // Set up custom action (compatible with old version)
        foreach ($this->CustomActions as $name => $action) {
            $this->ListActions->add($name, $action);
        }

        // Show checkbox column if multiple action
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
                $this->ListOptions["checkbox"]->Visible = true;
                break;
            }
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->typeRegsisteration);
        $this->setupLookupOptions($this->PaymentCategory);
        $this->setupLookupOptions($this->physician_id);
        $this->setupLookupOptions($this->admission_consultant_id);
        $this->setupLookupOptions($this->leading_consultant_id);
        $this->setupLookupOptions($this->PaymentStatus);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->HospID);
        $this->setupLookupOptions($this->ReferedByDr);
        $this->setupLookupOptions($this->ReferA4TreatingConsultant);
        $this->setupLookupOptions($this->patient_id);

        // Search filters
        $srchAdvanced = ""; // Advanced search filter
        $srchBasic = ""; // Basic search filter
        $filter = "";

        // Get command
        $this->Command = strtolower(Get("cmd"));
        if ($this->isPageRequest()) {
            // Process list action first
            if ($this->processListAction()) { // Ajax request
                $this->terminate();
                return;
            }

            // Set up records per page
            $this->setupDisplayRecords();

            // Handle reset command
            $this->resetCmd();

            // Set up Breadcrumb
            if (!$this->isExport()) {
                $this->setupBreadcrumb();
            }

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

            // Hide options
            if ($this->isExport() || $this->CurrentAction) {
                $this->ExportOptions->hideAllOptions();
                $this->FilterOptions->hideAllOptions();
                $this->ImportOptions->hideAllOptions();
            }

            // Hide other options
            if ($this->isExport()) {
                $this->OtherOptions->hideAllOptions();
            }

            // Get default search criteria
            AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(true));
            AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Get and validate search values for advanced search
            $this->loadSearchValues(); // Get search values

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
            }
            if (!$this->validateSearch()) {
                // Nothing to do
            }

            // Restore search parms from Session if not searching / reset / export
            if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms()) {
                $this->restoreSearchParms();
            }

            // Call Recordset SearchValidated event
            $this->recordsetSearchValidated();

            // Set up sorting order
            $this->setupSortOrder();

            // Get basic search criteria
            if (!$this->hasInvalidFields()) {
                $srchBasic = $this->basicSearchWhere();
            }

            // Get search criteria for advanced search
            if (!$this->hasInvalidFields()) {
                $srchAdvanced = $this->advancedSearchWhere();
            }
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

        // Load search default if no existing search criteria
        if (!$this->checkSearchParms()) {
            // Load basic search from default
            $this->BasicSearch->loadDefault();
            if ($this->BasicSearch->Keyword != "") {
                $srchBasic = $this->basicSearchWhere();
            }

            // Load advanced search from default
            if ($this->loadAdvancedSearchDefault()) {
                $srchAdvanced = $this->advancedSearchWhere();
            }
        }

        // Restore search settings from Session
        if (!$this->hasInvalidFields()) {
            $this->loadAdvancedSearch();
        }

        // Build search criteria
        AddFilter($this->SearchWhere, $srchAdvanced);
        AddFilter($this->SearchWhere, $srchBasic);

        // Call Recordset_Searching event
        $this->recordsetSearching($this->SearchWhere);

        // Save search criteria
        if ($this->Command == "search" && !$this->RestoreSearch) {
            $this->setSearchWhere($this->SearchWhere); // Save to Session
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->Command != "json") {
            $this->SearchWhere = $this->getSearchWhere();
        }

        // Build filter
        $filter = "";
        if (!$Security->canList()) {
            $filter = "(0=1)"; // Filter all records
        }
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Set up filter
        if ($this->Command == "json") {
            $this->UseSessionForListSql = false; // Do not use session for ListSQL
            $this->CurrentFilter = $filter;
        } else {
            $this->setSessionWhere($filter);
            $this->CurrentFilter = "";
        }

        // Export data only
        if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
            $this->exportData();
            $this->terminate();
            return;
        }
        if ($this->isGridAdd()) {
            $this->CurrentFilter = "0=1";
            $this->StartRecord = 1;
            $this->DisplayRecords = $this->GridAddRowCount;
            $this->TotalRecords = $this->DisplayRecords;
            $this->StopRecord = $this->DisplayRecords;
        } else {
            $this->TotalRecords = $this->listRecordCount();
            $this->StartRecord = 1;
            if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) { // Display all records
                $this->DisplayRecords = $this->TotalRecords;
            }
            if (!($this->isExport() && $this->ExportAll)) { // Set up start record position
                $this->setupStartRecord();
            }
            $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

            // Set no record found message
            if (!$this->CurrentAction && $this->TotalRecords == 0) {
                if (!$Security->canList()) {
                    $this->setWarningMessage(DeniedMessage());
                }
                if ($this->SearchWhere == "0=101") {
                    $this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
                } else {
                    $this->setWarningMessage($Language->phrase("NoRecord"));
                }
            }
        }

        // Search options
        $this->setupSearchOptions();

        // Set up search panel class
        if ($this->SearchWhere != "") {
            AppendClass($this->SearchPanelClass, "show");
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

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";

        // Load server side filters
        if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile)) {
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fip_admissionlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->mrnNo->AdvancedSearch->toJson(), ","); // Field mrnNo
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->patient_name->AdvancedSearch->toJson(), ","); // Field patient_name
        $filterList = Concat($filterList, $this->mobileno->AdvancedSearch->toJson(), ","); // Field mobileno
        $filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
        $filterList = Concat($filterList, $this->age->AdvancedSearch->toJson(), ","); // Field age
        $filterList = Concat($filterList, $this->typeRegsisteration->AdvancedSearch->toJson(), ","); // Field typeRegsisteration
        $filterList = Concat($filterList, $this->PaymentCategory->AdvancedSearch->toJson(), ","); // Field PaymentCategory
        $filterList = Concat($filterList, $this->physician_id->AdvancedSearch->toJson(), ","); // Field physician_id
        $filterList = Concat($filterList, $this->admission_consultant_id->AdvancedSearch->toJson(), ","); // Field admission_consultant_id
        $filterList = Concat($filterList, $this->leading_consultant_id->AdvancedSearch->toJson(), ","); // Field leading_consultant_id
        $filterList = Concat($filterList, $this->cause->AdvancedSearch->toJson(), ","); // Field cause
        $filterList = Concat($filterList, $this->admission_date->AdvancedSearch->toJson(), ","); // Field admission_date
        $filterList = Concat($filterList, $this->release_date->AdvancedSearch->toJson(), ","); // Field release_date
        $filterList = Concat($filterList, $this->PaymentStatus->AdvancedSearch->toJson(), ","); // Field PaymentStatus
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->DOB->AdvancedSearch->toJson(), ","); // Field DOB
        $filterList = Concat($filterList, $this->ReferedByDr->AdvancedSearch->toJson(), ","); // Field ReferedByDr
        $filterList = Concat($filterList, $this->ReferClinicname->AdvancedSearch->toJson(), ","); // Field ReferClinicname
        $filterList = Concat($filterList, $this->ReferCity->AdvancedSearch->toJson(), ","); // Field ReferCity
        $filterList = Concat($filterList, $this->ReferMobileNo->AdvancedSearch->toJson(), ","); // Field ReferMobileNo
        $filterList = Concat($filterList, $this->ReferA4TreatingConsultant->AdvancedSearch->toJson(), ","); // Field ReferA4TreatingConsultant
        $filterList = Concat($filterList, $this->PurposreReferredfor->AdvancedSearch->toJson(), ","); // Field PurposreReferredfor
        $filterList = Concat($filterList, $this->BillClosing->AdvancedSearch->toJson(), ","); // Field BillClosing
        $filterList = Concat($filterList, $this->BillClosingDate->AdvancedSearch->toJson(), ","); // Field BillClosingDate
        $filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
        $filterList = Concat($filterList, $this->ClosingAmount->AdvancedSearch->toJson(), ","); // Field ClosingAmount
        $filterList = Concat($filterList, $this->ClosingType->AdvancedSearch->toJson(), ","); // Field ClosingType
        $filterList = Concat($filterList, $this->BillAmount->AdvancedSearch->toJson(), ","); // Field BillAmount
        $filterList = Concat($filterList, $this->billclosedBy->AdvancedSearch->toJson(), ","); // Field billclosedBy
        $filterList = Concat($filterList, $this->bllcloseByDate->AdvancedSearch->toJson(), ","); // Field bllcloseByDate
        $filterList = Concat($filterList, $this->ReportHeader->AdvancedSearch->toJson(), ","); // Field ReportHeader
        $filterList = Concat($filterList, $this->Procedure->AdvancedSearch->toJson(), ","); // Field Procedure
        $filterList = Concat($filterList, $this->Consultant->AdvancedSearch->toJson(), ","); // Field Consultant
        $filterList = Concat($filterList, $this->Anesthetist->AdvancedSearch->toJson(), ","); // Field Anesthetist
        $filterList = Concat($filterList, $this->Amound->AdvancedSearch->toJson(), ","); // Field Amound
        $filterList = Concat($filterList, $this->Package->AdvancedSearch->toJson(), ","); // Field Package
        $filterList = Concat($filterList, $this->patient_id->AdvancedSearch->toJson(), ","); // Field patient_id
        $filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->PartnerMobile->AdvancedSearch->toJson(), ","); // Field PartnerMobile
        $filterList = Concat($filterList, $this->Cid->AdvancedSearch->toJson(), ","); // Field Cid
        $filterList = Concat($filterList, $this->PartId->AdvancedSearch->toJson(), ","); // Field PartId
        $filterList = Concat($filterList, $this->IDProof->AdvancedSearch->toJson(), ","); // Field IDProof
        $filterList = Concat($filterList, $this->AdviceToOtherHospital->AdvancedSearch->toJson(), ","); // Field AdviceToOtherHospital
        $filterList = Concat($filterList, $this->Reason->AdvancedSearch->toJson(), ","); // Field Reason
        if ($this->BasicSearch->Keyword != "") {
            $wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
            $filterList = Concat($filterList, $wrk, ",");
        }

        // Return filter list in JSON
        if ($filterList != "") {
            $filterList = "\"data\":{" . $filterList . "}";
        }
        if ($savedFilterList != "") {
            $filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
        }
        return ($filterList != "") ? "{" . $filterList . "}" : "null";
    }

    // Process filter list
    protected function processFilterList()
    {
        global $UserProfile;
        if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
            $filters = Post("filters");
            $UserProfile->setSearchFilters(CurrentUserName(), "fip_admissionlistsrch", $filters);
            WriteJson([["success" => true]]); // Success
            return true;
        } elseif (Post("cmd") == "resetfilter") {
            $this->restoreFilterList();
        }
        return false;
    }

    // Restore list of filters
    protected function restoreFilterList()
    {
        // Return if not reset filter
        if (Post("cmd") !== "resetfilter") {
            return false;
        }
        $filter = json_decode(Post("filter"), true);
        $this->Command = "search";

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field mrnNo
        $this->mrnNo->AdvancedSearch->SearchValue = @$filter["x_mrnNo"];
        $this->mrnNo->AdvancedSearch->SearchOperator = @$filter["z_mrnNo"];
        $this->mrnNo->AdvancedSearch->SearchCondition = @$filter["v_mrnNo"];
        $this->mrnNo->AdvancedSearch->SearchValue2 = @$filter["y_mrnNo"];
        $this->mrnNo->AdvancedSearch->SearchOperator2 = @$filter["w_mrnNo"];
        $this->mrnNo->AdvancedSearch->save();

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field patient_name
        $this->patient_name->AdvancedSearch->SearchValue = @$filter["x_patient_name"];
        $this->patient_name->AdvancedSearch->SearchOperator = @$filter["z_patient_name"];
        $this->patient_name->AdvancedSearch->SearchCondition = @$filter["v_patient_name"];
        $this->patient_name->AdvancedSearch->SearchValue2 = @$filter["y_patient_name"];
        $this->patient_name->AdvancedSearch->SearchOperator2 = @$filter["w_patient_name"];
        $this->patient_name->AdvancedSearch->save();

        // Field mobileno
        $this->mobileno->AdvancedSearch->SearchValue = @$filter["x_mobileno"];
        $this->mobileno->AdvancedSearch->SearchOperator = @$filter["z_mobileno"];
        $this->mobileno->AdvancedSearch->SearchCondition = @$filter["v_mobileno"];
        $this->mobileno->AdvancedSearch->SearchValue2 = @$filter["y_mobileno"];
        $this->mobileno->AdvancedSearch->SearchOperator2 = @$filter["w_mobileno"];
        $this->mobileno->AdvancedSearch->save();

        // Field gender
        $this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
        $this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
        $this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
        $this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
        $this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
        $this->gender->AdvancedSearch->save();

        // Field age
        $this->age->AdvancedSearch->SearchValue = @$filter["x_age"];
        $this->age->AdvancedSearch->SearchOperator = @$filter["z_age"];
        $this->age->AdvancedSearch->SearchCondition = @$filter["v_age"];
        $this->age->AdvancedSearch->SearchValue2 = @$filter["y_age"];
        $this->age->AdvancedSearch->SearchOperator2 = @$filter["w_age"];
        $this->age->AdvancedSearch->save();

        // Field typeRegsisteration
        $this->typeRegsisteration->AdvancedSearch->SearchValue = @$filter["x_typeRegsisteration"];
        $this->typeRegsisteration->AdvancedSearch->SearchOperator = @$filter["z_typeRegsisteration"];
        $this->typeRegsisteration->AdvancedSearch->SearchCondition = @$filter["v_typeRegsisteration"];
        $this->typeRegsisteration->AdvancedSearch->SearchValue2 = @$filter["y_typeRegsisteration"];
        $this->typeRegsisteration->AdvancedSearch->SearchOperator2 = @$filter["w_typeRegsisteration"];
        $this->typeRegsisteration->AdvancedSearch->save();

        // Field PaymentCategory
        $this->PaymentCategory->AdvancedSearch->SearchValue = @$filter["x_PaymentCategory"];
        $this->PaymentCategory->AdvancedSearch->SearchOperator = @$filter["z_PaymentCategory"];
        $this->PaymentCategory->AdvancedSearch->SearchCondition = @$filter["v_PaymentCategory"];
        $this->PaymentCategory->AdvancedSearch->SearchValue2 = @$filter["y_PaymentCategory"];
        $this->PaymentCategory->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentCategory"];
        $this->PaymentCategory->AdvancedSearch->save();

        // Field physician_id
        $this->physician_id->AdvancedSearch->SearchValue = @$filter["x_physician_id"];
        $this->physician_id->AdvancedSearch->SearchOperator = @$filter["z_physician_id"];
        $this->physician_id->AdvancedSearch->SearchCondition = @$filter["v_physician_id"];
        $this->physician_id->AdvancedSearch->SearchValue2 = @$filter["y_physician_id"];
        $this->physician_id->AdvancedSearch->SearchOperator2 = @$filter["w_physician_id"];
        $this->physician_id->AdvancedSearch->save();

        // Field admission_consultant_id
        $this->admission_consultant_id->AdvancedSearch->SearchValue = @$filter["x_admission_consultant_id"];
        $this->admission_consultant_id->AdvancedSearch->SearchOperator = @$filter["z_admission_consultant_id"];
        $this->admission_consultant_id->AdvancedSearch->SearchCondition = @$filter["v_admission_consultant_id"];
        $this->admission_consultant_id->AdvancedSearch->SearchValue2 = @$filter["y_admission_consultant_id"];
        $this->admission_consultant_id->AdvancedSearch->SearchOperator2 = @$filter["w_admission_consultant_id"];
        $this->admission_consultant_id->AdvancedSearch->save();

        // Field leading_consultant_id
        $this->leading_consultant_id->AdvancedSearch->SearchValue = @$filter["x_leading_consultant_id"];
        $this->leading_consultant_id->AdvancedSearch->SearchOperator = @$filter["z_leading_consultant_id"];
        $this->leading_consultant_id->AdvancedSearch->SearchCondition = @$filter["v_leading_consultant_id"];
        $this->leading_consultant_id->AdvancedSearch->SearchValue2 = @$filter["y_leading_consultant_id"];
        $this->leading_consultant_id->AdvancedSearch->SearchOperator2 = @$filter["w_leading_consultant_id"];
        $this->leading_consultant_id->AdvancedSearch->save();

        // Field cause
        $this->cause->AdvancedSearch->SearchValue = @$filter["x_cause"];
        $this->cause->AdvancedSearch->SearchOperator = @$filter["z_cause"];
        $this->cause->AdvancedSearch->SearchCondition = @$filter["v_cause"];
        $this->cause->AdvancedSearch->SearchValue2 = @$filter["y_cause"];
        $this->cause->AdvancedSearch->SearchOperator2 = @$filter["w_cause"];
        $this->cause->AdvancedSearch->save();

        // Field admission_date
        $this->admission_date->AdvancedSearch->SearchValue = @$filter["x_admission_date"];
        $this->admission_date->AdvancedSearch->SearchOperator = @$filter["z_admission_date"];
        $this->admission_date->AdvancedSearch->SearchCondition = @$filter["v_admission_date"];
        $this->admission_date->AdvancedSearch->SearchValue2 = @$filter["y_admission_date"];
        $this->admission_date->AdvancedSearch->SearchOperator2 = @$filter["w_admission_date"];
        $this->admission_date->AdvancedSearch->save();

        // Field release_date
        $this->release_date->AdvancedSearch->SearchValue = @$filter["x_release_date"];
        $this->release_date->AdvancedSearch->SearchOperator = @$filter["z_release_date"];
        $this->release_date->AdvancedSearch->SearchCondition = @$filter["v_release_date"];
        $this->release_date->AdvancedSearch->SearchValue2 = @$filter["y_release_date"];
        $this->release_date->AdvancedSearch->SearchOperator2 = @$filter["w_release_date"];
        $this->release_date->AdvancedSearch->save();

        // Field PaymentStatus
        $this->PaymentStatus->AdvancedSearch->SearchValue = @$filter["x_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchOperator = @$filter["z_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchCondition = @$filter["v_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchValue2 = @$filter["y_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

        // Field createdby
        $this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
        $this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
        $this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
        $this->createdby->AdvancedSearch->save();

        // Field createddatetime
        $this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
        $this->createddatetime->AdvancedSearch->save();

        // Field modifiedby
        $this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
        $this->modifiedby->AdvancedSearch->save();

        // Field modifieddatetime
        $this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field DOB
        $this->DOB->AdvancedSearch->SearchValue = @$filter["x_DOB"];
        $this->DOB->AdvancedSearch->SearchOperator = @$filter["z_DOB"];
        $this->DOB->AdvancedSearch->SearchCondition = @$filter["v_DOB"];
        $this->DOB->AdvancedSearch->SearchValue2 = @$filter["y_DOB"];
        $this->DOB->AdvancedSearch->SearchOperator2 = @$filter["w_DOB"];
        $this->DOB->AdvancedSearch->save();

        // Field ReferedByDr
        $this->ReferedByDr->AdvancedSearch->SearchValue = @$filter["x_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchOperator = @$filter["z_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchCondition = @$filter["v_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchValue2 = @$filter["y_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->save();

        // Field ReferClinicname
        $this->ReferClinicname->AdvancedSearch->SearchValue = @$filter["x_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchOperator = @$filter["z_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchCondition = @$filter["v_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchValue2 = @$filter["y_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchOperator2 = @$filter["w_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->save();

        // Field ReferCity
        $this->ReferCity->AdvancedSearch->SearchValue = @$filter["x_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchOperator = @$filter["z_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchCondition = @$filter["v_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchValue2 = @$filter["y_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchOperator2 = @$filter["w_ReferCity"];
        $this->ReferCity->AdvancedSearch->save();

        // Field ReferMobileNo
        $this->ReferMobileNo->AdvancedSearch->SearchValue = @$filter["x_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchOperator = @$filter["z_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchCondition = @$filter["v_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->save();

        // Field ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = @$filter["x_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchOperator = @$filter["z_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchCondition = @$filter["v_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue2 = @$filter["y_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchOperator2 = @$filter["w_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->save();

        // Field PurposreReferredfor
        $this->PurposreReferredfor->AdvancedSearch->SearchValue = @$filter["x_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchOperator = @$filter["z_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchCondition = @$filter["v_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchValue2 = @$filter["y_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchOperator2 = @$filter["w_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->save();

        // Field BillClosing
        $this->BillClosing->AdvancedSearch->SearchValue = @$filter["x_BillClosing"];
        $this->BillClosing->AdvancedSearch->SearchOperator = @$filter["z_BillClosing"];
        $this->BillClosing->AdvancedSearch->SearchCondition = @$filter["v_BillClosing"];
        $this->BillClosing->AdvancedSearch->SearchValue2 = @$filter["y_BillClosing"];
        $this->BillClosing->AdvancedSearch->SearchOperator2 = @$filter["w_BillClosing"];
        $this->BillClosing->AdvancedSearch->save();

        // Field BillClosingDate
        $this->BillClosingDate->AdvancedSearch->SearchValue = @$filter["x_BillClosingDate"];
        $this->BillClosingDate->AdvancedSearch->SearchOperator = @$filter["z_BillClosingDate"];
        $this->BillClosingDate->AdvancedSearch->SearchCondition = @$filter["v_BillClosingDate"];
        $this->BillClosingDate->AdvancedSearch->SearchValue2 = @$filter["y_BillClosingDate"];
        $this->BillClosingDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillClosingDate"];
        $this->BillClosingDate->AdvancedSearch->save();

        // Field BillNumber
        $this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
        $this->BillNumber->AdvancedSearch->save();

        // Field ClosingAmount
        $this->ClosingAmount->AdvancedSearch->SearchValue = @$filter["x_ClosingAmount"];
        $this->ClosingAmount->AdvancedSearch->SearchOperator = @$filter["z_ClosingAmount"];
        $this->ClosingAmount->AdvancedSearch->SearchCondition = @$filter["v_ClosingAmount"];
        $this->ClosingAmount->AdvancedSearch->SearchValue2 = @$filter["y_ClosingAmount"];
        $this->ClosingAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ClosingAmount"];
        $this->ClosingAmount->AdvancedSearch->save();

        // Field ClosingType
        $this->ClosingType->AdvancedSearch->SearchValue = @$filter["x_ClosingType"];
        $this->ClosingType->AdvancedSearch->SearchOperator = @$filter["z_ClosingType"];
        $this->ClosingType->AdvancedSearch->SearchCondition = @$filter["v_ClosingType"];
        $this->ClosingType->AdvancedSearch->SearchValue2 = @$filter["y_ClosingType"];
        $this->ClosingType->AdvancedSearch->SearchOperator2 = @$filter["w_ClosingType"];
        $this->ClosingType->AdvancedSearch->save();

        // Field BillAmount
        $this->BillAmount->AdvancedSearch->SearchValue = @$filter["x_BillAmount"];
        $this->BillAmount->AdvancedSearch->SearchOperator = @$filter["z_BillAmount"];
        $this->BillAmount->AdvancedSearch->SearchCondition = @$filter["v_BillAmount"];
        $this->BillAmount->AdvancedSearch->SearchValue2 = @$filter["y_BillAmount"];
        $this->BillAmount->AdvancedSearch->SearchOperator2 = @$filter["w_BillAmount"];
        $this->BillAmount->AdvancedSearch->save();

        // Field billclosedBy
        $this->billclosedBy->AdvancedSearch->SearchValue = @$filter["x_billclosedBy"];
        $this->billclosedBy->AdvancedSearch->SearchOperator = @$filter["z_billclosedBy"];
        $this->billclosedBy->AdvancedSearch->SearchCondition = @$filter["v_billclosedBy"];
        $this->billclosedBy->AdvancedSearch->SearchValue2 = @$filter["y_billclosedBy"];
        $this->billclosedBy->AdvancedSearch->SearchOperator2 = @$filter["w_billclosedBy"];
        $this->billclosedBy->AdvancedSearch->save();

        // Field bllcloseByDate
        $this->bllcloseByDate->AdvancedSearch->SearchValue = @$filter["x_bllcloseByDate"];
        $this->bllcloseByDate->AdvancedSearch->SearchOperator = @$filter["z_bllcloseByDate"];
        $this->bllcloseByDate->AdvancedSearch->SearchCondition = @$filter["v_bllcloseByDate"];
        $this->bllcloseByDate->AdvancedSearch->SearchValue2 = @$filter["y_bllcloseByDate"];
        $this->bllcloseByDate->AdvancedSearch->SearchOperator2 = @$filter["w_bllcloseByDate"];
        $this->bllcloseByDate->AdvancedSearch->save();

        // Field ReportHeader
        $this->ReportHeader->AdvancedSearch->SearchValue = @$filter["x_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchOperator = @$filter["z_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchCondition = @$filter["v_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchValue2 = @$filter["y_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchOperator2 = @$filter["w_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->save();

        // Field Procedure
        $this->Procedure->AdvancedSearch->SearchValue = @$filter["x_Procedure"];
        $this->Procedure->AdvancedSearch->SearchOperator = @$filter["z_Procedure"];
        $this->Procedure->AdvancedSearch->SearchCondition = @$filter["v_Procedure"];
        $this->Procedure->AdvancedSearch->SearchValue2 = @$filter["y_Procedure"];
        $this->Procedure->AdvancedSearch->SearchOperator2 = @$filter["w_Procedure"];
        $this->Procedure->AdvancedSearch->save();

        // Field Consultant
        $this->Consultant->AdvancedSearch->SearchValue = @$filter["x_Consultant"];
        $this->Consultant->AdvancedSearch->SearchOperator = @$filter["z_Consultant"];
        $this->Consultant->AdvancedSearch->SearchCondition = @$filter["v_Consultant"];
        $this->Consultant->AdvancedSearch->SearchValue2 = @$filter["y_Consultant"];
        $this->Consultant->AdvancedSearch->SearchOperator2 = @$filter["w_Consultant"];
        $this->Consultant->AdvancedSearch->save();

        // Field Anesthetist
        $this->Anesthetist->AdvancedSearch->SearchValue = @$filter["x_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->save();

        // Field Amound
        $this->Amound->AdvancedSearch->SearchValue = @$filter["x_Amound"];
        $this->Amound->AdvancedSearch->SearchOperator = @$filter["z_Amound"];
        $this->Amound->AdvancedSearch->SearchCondition = @$filter["v_Amound"];
        $this->Amound->AdvancedSearch->SearchValue2 = @$filter["y_Amound"];
        $this->Amound->AdvancedSearch->SearchOperator2 = @$filter["w_Amound"];
        $this->Amound->AdvancedSearch->save();

        // Field Package
        $this->Package->AdvancedSearch->SearchValue = @$filter["x_Package"];
        $this->Package->AdvancedSearch->SearchOperator = @$filter["z_Package"];
        $this->Package->AdvancedSearch->SearchCondition = @$filter["v_Package"];
        $this->Package->AdvancedSearch->SearchValue2 = @$filter["y_Package"];
        $this->Package->AdvancedSearch->SearchOperator2 = @$filter["w_Package"];
        $this->Package->AdvancedSearch->save();

        // Field patient_id
        $this->patient_id->AdvancedSearch->SearchValue = @$filter["x_patient_id"];
        $this->patient_id->AdvancedSearch->SearchOperator = @$filter["z_patient_id"];
        $this->patient_id->AdvancedSearch->SearchCondition = @$filter["v_patient_id"];
        $this->patient_id->AdvancedSearch->SearchValue2 = @$filter["y_patient_id"];
        $this->patient_id->AdvancedSearch->SearchOperator2 = @$filter["w_patient_id"];
        $this->patient_id->AdvancedSearch->save();

        // Field PartnerID
        $this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
        $this->PartnerID->AdvancedSearch->save();

        // Field PartnerName
        $this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
        $this->PartnerName->AdvancedSearch->save();

        // Field PartnerMobile
        $this->PartnerMobile->AdvancedSearch->SearchValue = @$filter["x_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchOperator = @$filter["z_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchCondition = @$filter["v_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchValue2 = @$filter["y_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->save();

        // Field Cid
        $this->Cid->AdvancedSearch->SearchValue = @$filter["x_Cid"];
        $this->Cid->AdvancedSearch->SearchOperator = @$filter["z_Cid"];
        $this->Cid->AdvancedSearch->SearchCondition = @$filter["v_Cid"];
        $this->Cid->AdvancedSearch->SearchValue2 = @$filter["y_Cid"];
        $this->Cid->AdvancedSearch->SearchOperator2 = @$filter["w_Cid"];
        $this->Cid->AdvancedSearch->save();

        // Field PartId
        $this->PartId->AdvancedSearch->SearchValue = @$filter["x_PartId"];
        $this->PartId->AdvancedSearch->SearchOperator = @$filter["z_PartId"];
        $this->PartId->AdvancedSearch->SearchCondition = @$filter["v_PartId"];
        $this->PartId->AdvancedSearch->SearchValue2 = @$filter["y_PartId"];
        $this->PartId->AdvancedSearch->SearchOperator2 = @$filter["w_PartId"];
        $this->PartId->AdvancedSearch->save();

        // Field IDProof
        $this->IDProof->AdvancedSearch->SearchValue = @$filter["x_IDProof"];
        $this->IDProof->AdvancedSearch->SearchOperator = @$filter["z_IDProof"];
        $this->IDProof->AdvancedSearch->SearchCondition = @$filter["v_IDProof"];
        $this->IDProof->AdvancedSearch->SearchValue2 = @$filter["y_IDProof"];
        $this->IDProof->AdvancedSearch->SearchOperator2 = @$filter["w_IDProof"];
        $this->IDProof->AdvancedSearch->save();

        // Field AdviceToOtherHospital
        $this->AdviceToOtherHospital->AdvancedSearch->SearchValue = @$filter["x_AdviceToOtherHospital"];
        $this->AdviceToOtherHospital->AdvancedSearch->SearchOperator = @$filter["z_AdviceToOtherHospital"];
        $this->AdviceToOtherHospital->AdvancedSearch->SearchCondition = @$filter["v_AdviceToOtherHospital"];
        $this->AdviceToOtherHospital->AdvancedSearch->SearchValue2 = @$filter["y_AdviceToOtherHospital"];
        $this->AdviceToOtherHospital->AdvancedSearch->SearchOperator2 = @$filter["w_AdviceToOtherHospital"];
        $this->AdviceToOtherHospital->AdvancedSearch->save();

        // Field Reason
        $this->Reason->AdvancedSearch->SearchValue = @$filter["x_Reason"];
        $this->Reason->AdvancedSearch->SearchOperator = @$filter["z_Reason"];
        $this->Reason->AdvancedSearch->SearchCondition = @$filter["v_Reason"];
        $this->Reason->AdvancedSearch->SearchValue2 = @$filter["y_Reason"];
        $this->Reason->AdvancedSearch->SearchOperator2 = @$filter["w_Reason"];
        $this->Reason->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Advanced search WHERE clause based on QueryString
    protected function advancedSearchWhere($default = false)
    {
        global $Security;
        $where = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $this->buildSearchSql($where, $this->id, $default, false); // id
        $this->buildSearchSql($where, $this->mrnNo, $default, false); // mrnNo
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->patient_name, $default, false); // patient_name
        $this->buildSearchSql($where, $this->mobileno, $default, false); // mobileno
        $this->buildSearchSql($where, $this->gender, $default, false); // gender
        $this->buildSearchSql($where, $this->age, $default, false); // age
        $this->buildSearchSql($where, $this->typeRegsisteration, $default, false); // typeRegsisteration
        $this->buildSearchSql($where, $this->PaymentCategory, $default, false); // PaymentCategory
        $this->buildSearchSql($where, $this->physician_id, $default, false); // physician_id
        $this->buildSearchSql($where, $this->admission_consultant_id, $default, false); // admission_consultant_id
        $this->buildSearchSql($where, $this->leading_consultant_id, $default, false); // leading_consultant_id
        $this->buildSearchSql($where, $this->cause, $default, false); // cause
        $this->buildSearchSql($where, $this->admission_date, $default, false); // admission_date
        $this->buildSearchSql($where, $this->release_date, $default, false); // release_date
        $this->buildSearchSql($where, $this->PaymentStatus, $default, false); // PaymentStatus
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->DOB, $default, false); // DOB
        $this->buildSearchSql($where, $this->ReferedByDr, $default, false); // ReferedByDr
        $this->buildSearchSql($where, $this->ReferClinicname, $default, false); // ReferClinicname
        $this->buildSearchSql($where, $this->ReferCity, $default, false); // ReferCity
        $this->buildSearchSql($where, $this->ReferMobileNo, $default, false); // ReferMobileNo
        $this->buildSearchSql($where, $this->ReferA4TreatingConsultant, $default, false); // ReferA4TreatingConsultant
        $this->buildSearchSql($where, $this->PurposreReferredfor, $default, false); // PurposreReferredfor
        $this->buildSearchSql($where, $this->BillClosing, $default, false); // BillClosing
        $this->buildSearchSql($where, $this->BillClosingDate, $default, false); // BillClosingDate
        $this->buildSearchSql($where, $this->BillNumber, $default, false); // BillNumber
        $this->buildSearchSql($where, $this->ClosingAmount, $default, false); // ClosingAmount
        $this->buildSearchSql($where, $this->ClosingType, $default, false); // ClosingType
        $this->buildSearchSql($where, $this->BillAmount, $default, false); // BillAmount
        $this->buildSearchSql($where, $this->billclosedBy, $default, false); // billclosedBy
        $this->buildSearchSql($where, $this->bllcloseByDate, $default, false); // bllcloseByDate
        $this->buildSearchSql($where, $this->ReportHeader, $default, false); // ReportHeader
        $this->buildSearchSql($where, $this->Procedure, $default, false); // Procedure
        $this->buildSearchSql($where, $this->Consultant, $default, false); // Consultant
        $this->buildSearchSql($where, $this->Anesthetist, $default, false); // Anesthetist
        $this->buildSearchSql($where, $this->Amound, $default, false); // Amound
        $this->buildSearchSql($where, $this->Package, $default, false); // Package
        $this->buildSearchSql($where, $this->patient_id, $default, false); // patient_id
        $this->buildSearchSql($where, $this->PartnerID, $default, false); // PartnerID
        $this->buildSearchSql($where, $this->PartnerName, $default, false); // PartnerName
        $this->buildSearchSql($where, $this->PartnerMobile, $default, false); // PartnerMobile
        $this->buildSearchSql($where, $this->Cid, $default, false); // Cid
        $this->buildSearchSql($where, $this->PartId, $default, false); // PartId
        $this->buildSearchSql($where, $this->IDProof, $default, false); // IDProof
        $this->buildSearchSql($where, $this->AdviceToOtherHospital, $default, false); // AdviceToOtherHospital
        $this->buildSearchSql($where, $this->Reason, $default, false); // Reason

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->mrnNo->AdvancedSearch->save(); // mrnNo
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->patient_name->AdvancedSearch->save(); // patient_name
            $this->mobileno->AdvancedSearch->save(); // mobileno
            $this->gender->AdvancedSearch->save(); // gender
            $this->age->AdvancedSearch->save(); // age
            $this->typeRegsisteration->AdvancedSearch->save(); // typeRegsisteration
            $this->PaymentCategory->AdvancedSearch->save(); // PaymentCategory
            $this->physician_id->AdvancedSearch->save(); // physician_id
            $this->admission_consultant_id->AdvancedSearch->save(); // admission_consultant_id
            $this->leading_consultant_id->AdvancedSearch->save(); // leading_consultant_id
            $this->cause->AdvancedSearch->save(); // cause
            $this->admission_date->AdvancedSearch->save(); // admission_date
            $this->release_date->AdvancedSearch->save(); // release_date
            $this->PaymentStatus->AdvancedSearch->save(); // PaymentStatus
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->DOB->AdvancedSearch->save(); // DOB
            $this->ReferedByDr->AdvancedSearch->save(); // ReferedByDr
            $this->ReferClinicname->AdvancedSearch->save(); // ReferClinicname
            $this->ReferCity->AdvancedSearch->save(); // ReferCity
            $this->ReferMobileNo->AdvancedSearch->save(); // ReferMobileNo
            $this->ReferA4TreatingConsultant->AdvancedSearch->save(); // ReferA4TreatingConsultant
            $this->PurposreReferredfor->AdvancedSearch->save(); // PurposreReferredfor
            $this->BillClosing->AdvancedSearch->save(); // BillClosing
            $this->BillClosingDate->AdvancedSearch->save(); // BillClosingDate
            $this->BillNumber->AdvancedSearch->save(); // BillNumber
            $this->ClosingAmount->AdvancedSearch->save(); // ClosingAmount
            $this->ClosingType->AdvancedSearch->save(); // ClosingType
            $this->BillAmount->AdvancedSearch->save(); // BillAmount
            $this->billclosedBy->AdvancedSearch->save(); // billclosedBy
            $this->bllcloseByDate->AdvancedSearch->save(); // bllcloseByDate
            $this->ReportHeader->AdvancedSearch->save(); // ReportHeader
            $this->Procedure->AdvancedSearch->save(); // Procedure
            $this->Consultant->AdvancedSearch->save(); // Consultant
            $this->Anesthetist->AdvancedSearch->save(); // Anesthetist
            $this->Amound->AdvancedSearch->save(); // Amound
            $this->Package->AdvancedSearch->save(); // Package
            $this->patient_id->AdvancedSearch->save(); // patient_id
            $this->PartnerID->AdvancedSearch->save(); // PartnerID
            $this->PartnerName->AdvancedSearch->save(); // PartnerName
            $this->PartnerMobile->AdvancedSearch->save(); // PartnerMobile
            $this->Cid->AdvancedSearch->save(); // Cid
            $this->PartId->AdvancedSearch->save(); // PartId
            $this->IDProof->AdvancedSearch->save(); // IDProof
            $this->AdviceToOtherHospital->AdvancedSearch->save(); // AdviceToOtherHospital
            $this->Reason->AdvancedSearch->save(); // Reason
        }
        return $where;
    }

    // Build search SQL
    protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
    {
        $fldParm = $fld->Param;
        $fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
        $fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
        $fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
        $fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
        $fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
        $wrk = "";
        if (is_array($fldVal)) {
            $fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
        }
        if (is_array($fldVal2)) {
            $fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
        }
        $fldOpr = strtoupper(trim($fldOpr));
        if ($fldOpr == "") {
            $fldOpr = "=";
        }
        $fldOpr2 = strtoupper(trim($fldOpr2));
        if ($fldOpr2 == "") {
            $fldOpr2 = "=";
        }
        if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr)) {
            $multiValue = false;
        }
        if ($multiValue) {
            $wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
            $wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
            $wrk = $wrk1; // Build final SQL
            if ($wrk2 != "") {
                $wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
            }
        } else {
            $fldVal = $this->convertSearchValue($fld, $fldVal);
            $fldVal2 = $this->convertSearchValue($fld, $fldVal2);
            $wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
        }
        AddFilter($where, $wrk);
    }

    // Convert search value
    protected function convertSearchValue(&$fld, $fldVal)
    {
        if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE")) {
            return $fldVal;
        }
        $value = $fldVal;
        if ($fld->isBoolean()) {
            if ($fldVal != "") {
                $value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
            }
        } elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
            if ($fldVal != "") {
                $value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
            }
        }
        return $value;
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->mrnNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->patient_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobileno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->typeRegsisteration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaymentCategory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->physician_id, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->admission_consultant_id, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->cause, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createddatetime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DOB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferedByDr, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferClinicname, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferCity, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferMobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferA4TreatingConsultant, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PurposreReferredfor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillClosing, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ClosingAmount, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ClosingType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillAmount, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->billclosedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReportHeader, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Procedure, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Consultant, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Anesthetist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Package, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->patient_id, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerMobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IDProof, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AdviceToOtherHospital, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Reason, $arKeywords, $type);
        return $where;
    }

    // Build basic search SQL
    protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
    {
        $defCond = ($type == "OR") ? "OR" : "AND";
        $arSql = []; // Array for SQL parts
        $arCond = []; // Array for search conditions
        $cnt = count($arKeywords);
        $j = 0; // Number of SQL parts
        for ($i = 0; $i < $cnt; $i++) {
            $keyword = $arKeywords[$i];
            $keyword = trim($keyword);
            if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
                $keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
                $ar = explode("\\", $keyword);
            } else {
                $ar = [$keyword];
            }
            foreach ($ar as $keyword) {
                if ($keyword != "") {
                    $wrk = "";
                    if ($keyword == "OR" && $type == "") {
                        if ($j > 0) {
                            $arCond[$j - 1] = "OR";
                        }
                    } elseif ($keyword == Config("NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NULL";
                    } elseif ($keyword == Config("NOT_NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NOT NULL";
                    } elseif ($fld->IsVirtual && $fld->Visible) {
                        $wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    } elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
                        $wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    }
                    if ($wrk != "") {
                        $arSql[$j] = $wrk;
                        $arCond[$j] = $defCond;
                        $j += 1;
                    }
                }
            }
        }
        $cnt = count($arSql);
        $quoted = false;
        $sql = "";
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt - 1; $i++) {
                if ($arCond[$i] == "OR") {
                    if (!$quoted) {
                        $sql .= "(";
                    }
                    $quoted = true;
                }
                $sql .= $arSql[$i];
                if ($quoted && $arCond[$i] != "OR") {
                    $sql .= ")";
                    $quoted = false;
                }
                $sql .= " " . $arCond[$i] . " ";
            }
            $sql .= $arSql[$cnt - 1];
            if ($quoted) {
                $sql .= ")";
            }
        }
        if ($sql != "") {
            if ($where != "") {
                $where .= " OR ";
            }
            $where .= "(" . $sql . ")";
        }
    }

    // Return basic search WHERE clause based on search keyword and type
    protected function basicSearchWhere($default = false)
    {
        global $Security;
        $searchStr = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
        $searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

        // Get search SQL
        if ($searchKeyword != "") {
            $ar = $this->BasicSearch->keywordList($default);
            // Search keyword in any fields
            if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
                foreach ($ar as $keyword) {
                    if ($keyword != "") {
                        if ($searchStr != "") {
                            $searchStr .= " " . $searchType . " ";
                        }
                        $searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
                    }
                }
            } else {
                $searchStr = $this->basicSearchSql($ar, $searchType);
            }
            if (!$default && in_array($this->Command, ["", "reset", "resetall"])) {
                $this->Command = "search";
            }
        }
        if (!$default && $this->Command == "search") {
            $this->BasicSearch->setKeyword($searchKeyword);
            $this->BasicSearch->setType($searchType);
        }
        return $searchStr;
    }

    // Check if search parm exists
    protected function checkSearchParms()
    {
        // Check basic search
        if ($this->BasicSearch->issetSession()) {
            return true;
        }
        if ($this->id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mrnNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->patient_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mobileno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->typeRegsisteration->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PaymentCategory->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->physician_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->admission_consultant_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->leading_consultant_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->cause->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->admission_date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->release_date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PaymentStatus->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createdby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createddatetime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->modifiedby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->modifieddatetime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->profilePic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DOB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferedByDr->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferClinicname->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferCity->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferMobileNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferA4TreatingConsultant->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurposreReferredfor->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillClosing->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillClosingDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ClosingAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ClosingType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->billclosedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->bllcloseByDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReportHeader->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Procedure->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Consultant->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Anesthetist->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Amound->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Package->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->patient_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerMobile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Cid->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IDProof->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AdviceToOtherHospital->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Reason->AdvancedSearch->issetSession()) {
            return true;
        }
        return false;
    }

    // Clear all search parameters
    protected function resetSearchParms()
    {
        // Clear search WHERE clause
        $this->SearchWhere = "";
        $this->setSearchWhere($this->SearchWhere);

        // Clear basic search parameters
        $this->resetBasicSearchParms();

        // Clear advanced search parameters
        $this->resetAdvancedSearchParms();
    }

    // Load advanced search default values
    protected function loadAdvancedSearchDefault()
    {
        return false;
    }

    // Clear all basic search parameters
    protected function resetBasicSearchParms()
    {
        $this->BasicSearch->unsetSession();
    }

    // Clear all advanced search parameters
    protected function resetAdvancedSearchParms()
    {
                $this->id->AdvancedSearch->unsetSession();
                $this->mrnNo->AdvancedSearch->unsetSession();
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->patient_name->AdvancedSearch->unsetSession();
                $this->mobileno->AdvancedSearch->unsetSession();
                $this->gender->AdvancedSearch->unsetSession();
                $this->age->AdvancedSearch->unsetSession();
                $this->typeRegsisteration->AdvancedSearch->unsetSession();
                $this->PaymentCategory->AdvancedSearch->unsetSession();
                $this->physician_id->AdvancedSearch->unsetSession();
                $this->admission_consultant_id->AdvancedSearch->unsetSession();
                $this->leading_consultant_id->AdvancedSearch->unsetSession();
                $this->cause->AdvancedSearch->unsetSession();
                $this->admission_date->AdvancedSearch->unsetSession();
                $this->release_date->AdvancedSearch->unsetSession();
                $this->PaymentStatus->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->DOB->AdvancedSearch->unsetSession();
                $this->ReferedByDr->AdvancedSearch->unsetSession();
                $this->ReferClinicname->AdvancedSearch->unsetSession();
                $this->ReferCity->AdvancedSearch->unsetSession();
                $this->ReferMobileNo->AdvancedSearch->unsetSession();
                $this->ReferA4TreatingConsultant->AdvancedSearch->unsetSession();
                $this->PurposreReferredfor->AdvancedSearch->unsetSession();
                $this->BillClosing->AdvancedSearch->unsetSession();
                $this->BillClosingDate->AdvancedSearch->unsetSession();
                $this->BillNumber->AdvancedSearch->unsetSession();
                $this->ClosingAmount->AdvancedSearch->unsetSession();
                $this->ClosingType->AdvancedSearch->unsetSession();
                $this->BillAmount->AdvancedSearch->unsetSession();
                $this->billclosedBy->AdvancedSearch->unsetSession();
                $this->bllcloseByDate->AdvancedSearch->unsetSession();
                $this->ReportHeader->AdvancedSearch->unsetSession();
                $this->Procedure->AdvancedSearch->unsetSession();
                $this->Consultant->AdvancedSearch->unsetSession();
                $this->Anesthetist->AdvancedSearch->unsetSession();
                $this->Amound->AdvancedSearch->unsetSession();
                $this->Package->AdvancedSearch->unsetSession();
                $this->patient_id->AdvancedSearch->unsetSession();
                $this->PartnerID->AdvancedSearch->unsetSession();
                $this->PartnerName->AdvancedSearch->unsetSession();
                $this->PartnerMobile->AdvancedSearch->unsetSession();
                $this->Cid->AdvancedSearch->unsetSession();
                $this->PartId->AdvancedSearch->unsetSession();
                $this->IDProof->AdvancedSearch->unsetSession();
                $this->AdviceToOtherHospital->AdvancedSearch->unsetSession();
                $this->Reason->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->mrnNo->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->patient_name->AdvancedSearch->load();
                $this->mobileno->AdvancedSearch->load();
                $this->gender->AdvancedSearch->load();
                $this->age->AdvancedSearch->load();
                $this->typeRegsisteration->AdvancedSearch->load();
                $this->PaymentCategory->AdvancedSearch->load();
                $this->physician_id->AdvancedSearch->load();
                $this->admission_consultant_id->AdvancedSearch->load();
                $this->leading_consultant_id->AdvancedSearch->load();
                $this->cause->AdvancedSearch->load();
                $this->admission_date->AdvancedSearch->load();
                $this->release_date->AdvancedSearch->load();
                $this->PaymentStatus->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->profilePic->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->DOB->AdvancedSearch->load();
                $this->ReferedByDr->AdvancedSearch->load();
                $this->ReferClinicname->AdvancedSearch->load();
                $this->ReferCity->AdvancedSearch->load();
                $this->ReferMobileNo->AdvancedSearch->load();
                $this->ReferA4TreatingConsultant->AdvancedSearch->load();
                $this->PurposreReferredfor->AdvancedSearch->load();
                $this->BillClosing->AdvancedSearch->load();
                $this->BillClosingDate->AdvancedSearch->load();
                $this->BillNumber->AdvancedSearch->load();
                $this->ClosingAmount->AdvancedSearch->load();
                $this->ClosingType->AdvancedSearch->load();
                $this->BillAmount->AdvancedSearch->load();
                $this->billclosedBy->AdvancedSearch->load();
                $this->bllcloseByDate->AdvancedSearch->load();
                $this->ReportHeader->AdvancedSearch->load();
                $this->Procedure->AdvancedSearch->load();
                $this->Consultant->AdvancedSearch->load();
                $this->Anesthetist->AdvancedSearch->load();
                $this->Amound->AdvancedSearch->load();
                $this->Package->AdvancedSearch->load();
                $this->patient_id->AdvancedSearch->load();
                $this->PartnerID->AdvancedSearch->load();
                $this->PartnerName->AdvancedSearch->load();
                $this->PartnerMobile->AdvancedSearch->load();
                $this->Cid->AdvancedSearch->load();
                $this->PartId->AdvancedSearch->load();
                $this->IDProof->AdvancedSearch->load();
                $this->AdviceToOtherHospital->AdvancedSearch->load();
                $this->Reason->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->mrnNo); // mrnNo
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->patient_name); // patient_name
            $this->updateSort($this->mobileno); // mobileno
            $this->updateSort($this->gender); // gender
            $this->updateSort($this->age); // age
            $this->updateSort($this->typeRegsisteration); // typeRegsisteration
            $this->updateSort($this->PaymentCategory); // PaymentCategory
            $this->updateSort($this->physician_id); // physician_id
            $this->updateSort($this->admission_consultant_id); // admission_consultant_id
            $this->updateSort($this->leading_consultant_id); // leading_consultant_id
            $this->updateSort($this->admission_date); // admission_date
            $this->updateSort($this->release_date); // release_date
            $this->updateSort($this->PaymentStatus); // PaymentStatus
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->profilePic); // profilePic
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->ReferedByDr); // ReferedByDr
            $this->updateSort($this->ReferClinicname); // ReferClinicname
            $this->updateSort($this->ReferCity); // ReferCity
            $this->updateSort($this->ReferMobileNo); // ReferMobileNo
            $this->updateSort($this->ReferA4TreatingConsultant); // ReferA4TreatingConsultant
            $this->updateSort($this->PurposreReferredfor); // PurposreReferredfor
            $this->updateSort($this->BillClosing); // BillClosing
            $this->updateSort($this->BillClosingDate); // BillClosingDate
            $this->updateSort($this->BillNumber); // BillNumber
            $this->updateSort($this->ClosingAmount); // ClosingAmount
            $this->updateSort($this->ClosingType); // ClosingType
            $this->updateSort($this->BillAmount); // BillAmount
            $this->updateSort($this->billclosedBy); // billclosedBy
            $this->updateSort($this->bllcloseByDate); // bllcloseByDate
            $this->updateSort($this->ReportHeader); // ReportHeader
            $this->updateSort($this->Procedure); // Procedure
            $this->updateSort($this->Consultant); // Consultant
            $this->updateSort($this->Anesthetist); // Anesthetist
            $this->updateSort($this->Amound); // Amound
            $this->updateSort($this->Package); // Package
            $this->updateSort($this->patient_id); // patient_id
            $this->updateSort($this->PartnerID); // PartnerID
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->PartnerMobile); // PartnerMobile
            $this->updateSort($this->Cid); // Cid
            $this->updateSort($this->PartId); // PartId
            $this->updateSort($this->IDProof); // IDProof
            $this->updateSort($this->AdviceToOtherHospital); // AdviceToOtherHospital
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
            // Reset search criteria
            if ($this->Command == "reset" || $this->Command == "resetall") {
                $this->resetSearchParms();
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->setSessionOrderByList($orderBy);
                $this->id->setSort("");
                $this->mrnNo->setSort("");
                $this->PatientID->setSort("");
                $this->patient_name->setSort("");
                $this->mobileno->setSort("");
                $this->gender->setSort("");
                $this->age->setSort("");
                $this->typeRegsisteration->setSort("");
                $this->PaymentCategory->setSort("");
                $this->physician_id->setSort("");
                $this->admission_consultant_id->setSort("");
                $this->leading_consultant_id->setSort("");
                $this->cause->setSort("");
                $this->admission_date->setSort("");
                $this->release_date->setSort("");
                $this->PaymentStatus->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->profilePic->setSort("");
                $this->HospID->setSort("");
                $this->DOB->setSort("");
                $this->ReferedByDr->setSort("");
                $this->ReferClinicname->setSort("");
                $this->ReferCity->setSort("");
                $this->ReferMobileNo->setSort("");
                $this->ReferA4TreatingConsultant->setSort("");
                $this->PurposreReferredfor->setSort("");
                $this->BillClosing->setSort("");
                $this->BillClosingDate->setSort("");
                $this->BillNumber->setSort("");
                $this->ClosingAmount->setSort("");
                $this->ClosingType->setSort("");
                $this->BillAmount->setSort("");
                $this->billclosedBy->setSort("");
                $this->bllcloseByDate->setSort("");
                $this->ReportHeader->setSort("");
                $this->Procedure->setSort("");
                $this->Consultant->setSort("");
                $this->Anesthetist->setSort("");
                $this->Amound->setSort("");
                $this->Package->setSort("");
                $this->patient_id->setSort("");
                $this->PartnerID->setSort("");
                $this->PartnerName->setSort("");
                $this->PartnerMobile->setSort("");
                $this->Cid->setSort("");
                $this->PartId->setSort("");
                $this->IDProof->setSort("");
                $this->AdviceToOtherHospital->setSort("");
                $this->Reason->setSort("");
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

        // "detail_patient_vitals"
        $item = &$this->ListOptions->add("detail_patient_vitals");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_vitals') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_history"
        $item = &$this->ListOptions->add("detail_patient_history");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_history') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_provisional_diagnosis"
        $item = &$this->ListOptions->add("detail_patient_provisional_diagnosis");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_provisional_diagnosis') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_prescription"
        $item = &$this->ListOptions->add("detail_patient_prescription");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_prescription') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_final_diagnosis"
        $item = &$this->ListOptions->add("detail_patient_final_diagnosis");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_final_diagnosis') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_follow_up"
        $item = &$this->ListOptions->add("detail_patient_follow_up");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_follow_up') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_ot_delivery_register"
        $item = &$this->ListOptions->add("detail_patient_ot_delivery_register");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_ot_delivery_register') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_ot_surgery_register"
        $item = &$this->ListOptions->add("detail_patient_ot_surgery_register");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_ot_surgery_register') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_services"
        $item = &$this->ListOptions->add("detail_patient_services");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_services') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_investigations"
        $item = &$this->ListOptions->add("detail_patient_investigations");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_investigations') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_insurance"
        $item = &$this->ListOptions->add("detail_patient_insurance");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_insurance') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_pharmacy_pharled"
        $item = &$this->ListOptions->add("detail_pharmacy_pharled");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'pharmacy_pharled') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_view_ip_advance"
        $item = &$this->ListOptions->add("detail_view_ip_advance");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'view_ip_advance') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_patient_room"
        $item = &$this->ListOptions->add("detail_patient_room");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_room') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // Multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$this->ListOptions->add("details");
            $item->CssClass = "text-nowrap";
            $item->Visible = $this->ShowMultipleDetails;
            $item->OnLeft = true;
            $item->ShowInButtonGroup = false;
        }

        // Set up detail pages
        $pages = new SubPages();
        $pages->add("patient_vitals");
        $pages->add("patient_history");
        $pages->add("patient_provisional_diagnosis");
        $pages->add("patient_prescription");
        $pages->add("patient_final_diagnosis");
        $pages->add("patient_follow_up");
        $pages->add("patient_ot_delivery_register");
        $pages->add("patient_ot_surgery_register");
        $pages->add("patient_services");
        $pages->add("patient_investigations");
        $pages->add("patient_insurance");
        $pages->add("pharmacy_pharled");
        $pages->add("view_ip_advance");
        $pages->add("patient_room");
        $this->DetailPages = $pages;

        // List actions
        $item = &$this->ListOptions->add("listactions");
        $item->CssClass = "text-nowrap";
        $item->OnLeft = true;
        $item->Visible = false;
        $item->ShowInButtonGroup = false;
        $item->ShowInDropDown = false;

        // "checkbox"
        $item = &$this->ListOptions->add("checkbox");
        $item->Visible = false;
        $item->OnLeft = true;
        $item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
        $item->moveTo(0);
        $item->ShowInDropDown = false;
        $item->ShowInButtonGroup = false;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = true;
        if ($this->ListOptions->UseButtonGroup && IsMobile()) {
            $this->ListOptions->UseDropDownButton = true;
        }

        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
        $this->setupListOptionsExt();
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
        $pageUrl = $this->pageUrl();
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

        // Set up list action buttons
        $opt = $this->ListOptions["listactions"];
        if ($opt && !$this->isExport() && !$this->CurrentAction) {
            $body = "";
            $links = [];
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
                    $action = $listaction->Action;
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
                    $links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a></li>";
                    if (count($links) == 1) { // Single button
                        $body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a>";
                    }
                }
            }
            if (count($links) > 1) { // More than one buttons, use dropdown
                $body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
                $content = "";
                foreach ($links as $link) {
                    $content .= "<li>" . $link . "</li>";
                }
                $body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">" . $content . "</ul>";
                $body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
            }
            if (count($links) > 0) {
                $opt->Body = $body;
                $opt->Visible = true;
            }
        }
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_patient_vitals"
        $opt = $this->ListOptions["detail_patient_vitals"];
        if ($Security->allowList(CurrentProjectID() . 'patient_vitals')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_vitals", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientVitalsList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientVitalsGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_vitals";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_vitals";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_vitals";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_history"
        $opt = $this->ListOptions["detail_patient_history"];
        if ($Security->allowList(CurrentProjectID() . 'patient_history')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_history", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientHistoryList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientHistoryGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_history";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_history";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_history";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_provisional_diagnosis"
        $opt = $this->ListOptions["detail_patient_provisional_diagnosis"];
        if ($Security->allowList(CurrentProjectID() . 'patient_provisional_diagnosis')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_provisional_diagnosis", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientProvisionalDiagnosisList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientProvisionalDiagnosisGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_provisional_diagnosis";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_provisional_diagnosis";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_provisional_diagnosis";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_prescription"
        $opt = $this->ListOptions["detail_patient_prescription"];
        if ($Security->allowList(CurrentProjectID() . 'patient_prescription')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_prescription", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientPrescriptionList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientPrescriptionGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_prescription";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_prescription";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_prescription";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_final_diagnosis"
        $opt = $this->ListOptions["detail_patient_final_diagnosis"];
        if ($Security->allowList(CurrentProjectID() . 'patient_final_diagnosis')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_final_diagnosis", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientFinalDiagnosisList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientFinalDiagnosisGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_final_diagnosis";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_final_diagnosis";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_final_diagnosis";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_follow_up"
        $opt = $this->ListOptions["detail_patient_follow_up"];
        if ($Security->allowList(CurrentProjectID() . 'patient_follow_up')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_follow_up", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientFollowUpList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientFollowUpGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_follow_up";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_follow_up";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_follow_up";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_ot_delivery_register"
        $opt = $this->ListOptions["detail_patient_ot_delivery_register"];
        if ($Security->allowList(CurrentProjectID() . 'patient_ot_delivery_register')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_ot_delivery_register", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientOtDeliveryRegisterList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientOtDeliveryRegisterGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_ot_delivery_register";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_ot_delivery_register";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_ot_delivery_register";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_ot_surgery_register"
        $opt = $this->ListOptions["detail_patient_ot_surgery_register"];
        if ($Security->allowList(CurrentProjectID() . 'patient_ot_surgery_register')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_ot_surgery_register", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientOtSurgeryRegisterList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientOtSurgeryRegisterGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_ot_surgery_register";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_ot_surgery_register";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_ot_surgery_register";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_services"
        $opt = $this->ListOptions["detail_patient_services"];
        if ($Security->allowList(CurrentProjectID() . 'patient_services')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_services", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientServicesList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientServicesGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_services";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_services";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_services";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_investigations"
        $opt = $this->ListOptions["detail_patient_investigations"];
        if ($Security->allowList(CurrentProjectID() . 'patient_investigations')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_investigations", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientInvestigationsList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientInvestigationsGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_investigations";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_investigations";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_investigations";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_insurance"
        $opt = $this->ListOptions["detail_patient_insurance"];
        if ($Security->allowList(CurrentProjectID() . 'patient_insurance')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_insurance", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientInsuranceList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientInsuranceGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_insurance";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_insurance";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_insurance";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_pharmacy_pharled"
        $opt = $this->ListOptions["detail_pharmacy_pharled"];
        if ($Security->allowList(CurrentProjectID() . 'pharmacy_pharled')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("pharmacy_pharled", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PharmacyPharledList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PharmacyPharledGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "pharmacy_pharled";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "pharmacy_pharled";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "pharmacy_pharled";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_view_ip_advance"
        $opt = $this->ListOptions["detail_view_ip_advance"];
        if ($Security->allowList(CurrentProjectID() . 'view_ip_advance')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("view_ip_advance", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ViewIpAdvanceList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("ViewIpAdvanceGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "view_ip_advance";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "view_ip_advance";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "view_ip_advance";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_patient_room"
        $opt = $this->ListOptions["detail_patient_room"];
        if ($Security->allowList(CurrentProjectID() . 'patient_room')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_room", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientRoomList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientRoomGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_room";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_room";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_room";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }
        if ($this->ShowMultipleDetails) {
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
            $links = "";
            if ($detailViewTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            }
            if ($detailEditTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            }
            if ($detailCopyTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
                $body .= "<ul class=\"dropdown-menu ew-menu\">" . $links . "</ul>";
            }
            $body .= "</div>";
            // Multiple details
            $opt = $this->ListOptions["details"];
            $opt->Body = $body;
        }

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["addedit"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("AddLink"));
        $item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("AddLink") . "</a>";
        $item->Visible = $this->AddUrl != "" && $Security->canAdd();
        $option = $options["detail"];
        $detailTableLink = "";
                $item = &$option->add("detailadd_patient_vitals");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $detailPage = Container("PatientVitalsGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_vitals";
                }
                $item = &$option->add("detailadd_patient_history");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $detailPage = Container("PatientHistoryGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_history";
                }
                $item = &$option->add("detailadd_patient_provisional_diagnosis");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $detailPage = Container("PatientProvisionalDiagnosisGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_provisional_diagnosis";
                }
                $item = &$option->add("detailadd_patient_prescription");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription");
                $detailPage = Container("PatientPrescriptionGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_prescription";
                }
                $item = &$option->add("detailadd_patient_final_diagnosis");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $detailPage = Container("PatientFinalDiagnosisGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_final_diagnosis";
                }
                $item = &$option->add("detailadd_patient_follow_up");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $detailPage = Container("PatientFollowUpGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_follow_up";
                }
                $item = &$option->add("detailadd_patient_ot_delivery_register");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $detailPage = Container("PatientOtDeliveryRegisterGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_ot_delivery_register";
                }
                $item = &$option->add("detailadd_patient_ot_surgery_register");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $detailPage = Container("PatientOtSurgeryRegisterGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_ot_surgery_register";
                }
                $item = &$option->add("detailadd_patient_services");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services");
                $detailPage = Container("PatientServicesGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_services";
                }
                $item = &$option->add("detailadd_patient_investigations");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $detailPage = Container("PatientInvestigationsGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_investigations";
                }
                $item = &$option->add("detailadd_patient_insurance");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $detailPage = Container("PatientInsuranceGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_insurance";
                }
                $item = &$option->add("detailadd_pharmacy_pharled");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $detailPage = Container("PharmacyPharledGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "pharmacy_pharled";
                }
                $item = &$option->add("detailadd_view_ip_advance");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance");
                $detailPage = Container("ViewIpAdvanceGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "view_ip_advance";
                }
                $item = &$option->add("detailadd_patient_room");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
                $detailPage = Container("PatientRoomGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ip_admission') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_room";
                }

        // Add multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$option->add("detailsadd");
            $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailTableLink);
            $caption = $Language->phrase("AddMasterDetailLink");
            $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
            $item->Visible = $detailTableLink != "" && $Security->canAdd();
            // Hide single master/detail items
            $ar = explode(",", $detailTableLink);
            $cnt = count($ar);
            for ($i = 0; $i < $cnt; $i++) {
                if ($item = $option["detailadd_" . $ar[$i]]) {
                    $item->Visible = false;
                }
            }
        }
        $option = $options["action"];

        // Set up options default
        foreach ($options as $option) {
            $option->UseDropDownButton = true;
            $option->UseButtonGroup = true;
            //$option->ButtonClass = ""; // Class for button group
            $item = &$option->add($option->GroupOptionName);
            $item->Body = "";
            $item->Visible = false;
        }
        $options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
        $options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
        $options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

        // Filter button
        $item = &$this->FilterOptions->add("savecurrentfilter");
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fip_admissionlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fip_admissionlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
        $item->Visible = true;
        $this->FilterOptions->UseDropDownButton = true;
        $this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
        $this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

        // Add group option item
        $item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Render other options
    public function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];
        // Set up list action buttons
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE) {
                $item = &$option->add("custom_" . $listaction->Action);
                $caption = $listaction->Caption;
                $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fip_admissionlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
                $item->Visible = $listaction->Allow;
            }
        }

        // Hide grid edit and other options
        if ($this->TotalRecords <= 0) {
            $option = $options["addedit"];
            $item = $option["gridedit"];
            if ($item) {
                $item->Visible = false;
            }
            $option = $options["action"];
            $option->hideAllOptions();
        }
    }

    // Process list action
    protected function processListAction()
    {
        global $Language, $Security;
        $userlist = "";
        $user = "";
        $filter = $this->getFilterFromRecordKeys();
        $userAction = Post("useraction", "");
        if ($filter != "" && $userAction != "") {
            // Check permission first
            $actionCaption = $userAction;
            if (array_key_exists($userAction, $this->ListActions->Items)) {
                $actionCaption = $this->ListActions[$userAction]->Caption;
                if (!$this->ListActions[$userAction]->Allow) {
                    $errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
                    if (Post("ajax") == $userAction) { // Ajax
                        echo "<p class=\"text-danger\">" . $errmsg . "</p>";
                        return true;
                    } else {
                        $this->setFailureMessage($errmsg);
                        return false;
                    }
                }
            }
            $this->CurrentFilter = $filter;
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $rs = LoadRecordset($sql, $conn, \PDO::FETCH_ASSOC);
            $this->CurrentAction = $userAction;

            // Call row action event
            if ($rs) {
                $conn->beginTransaction();
                $this->SelectedCount = $rs->recordCount();
                $this->SelectedIndex = 0;
                while (!$rs->EOF) {
                    $this->SelectedIndex++;
                    $row = $rs->fields;
                    $processed = $this->rowCustomAction($userAction, $row);
                    if (!$processed) {
                        break;
                    }
                    $rs->moveNext();
                }
                if ($processed) {
                    $conn->commit(); // Commit the changes
                    if ($this->getSuccessMessage() == "" && !ob_get_length()) { // No output
                        $this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
                    }
                } else {
                    $conn->rollback(); // Rollback changes

                    // Set up error message
                    if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                        // Use the message, do nothing
                    } elseif ($this->CancelMessage != "") {
                        $this->setFailureMessage($this->CancelMessage);
                        $this->CancelMessage = "";
                    } else {
                        $this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
                    }
                }
            }
            if ($rs) {
                $rs->close();
            }
            $this->CurrentAction = ""; // Clear action
            if (Post("ajax") == $userAction) { // Ajax
                if ($this->getSuccessMessage() != "") {
                    echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
                    $this->clearSuccessMessage(); // Clear message
                }
                if ($this->getFailureMessage() != "") {
                    echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
                    $this->clearFailureMessage(); // Clear message
                }
                return true;
            }
        }
        return false; // Not ajax request
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
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_vitals"
        if ($this->DetailPages && $this->DetailPages["patient_vitals"] && $this->DetailPages["patient_vitals"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_vitals"];
            $url = "PatientVitalsPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_vitals\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_vitals", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_vitals\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientVitalsList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_vitals", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientVitalsGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_vitals");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_history"
        if ($this->DetailPages && $this->DetailPages["patient_history"] && $this->DetailPages["patient_history"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_history"];
            $url = "PatientHistoryPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_history\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_history", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_history\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientHistoryList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_history", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientHistoryGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_history");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_provisional_diagnosis"
        if ($this->DetailPages && $this->DetailPages["patient_provisional_diagnosis"] && $this->DetailPages["patient_provisional_diagnosis"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_provisional_diagnosis"];
            $url = "PatientProvisionalDiagnosisPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_provisional_diagnosis\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_provisional_diagnosis", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_provisional_diagnosis\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientProvisionalDiagnosisList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_provisional_diagnosis", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientProvisionalDiagnosisGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_provisional_diagnosis");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_prescription"
        if ($this->DetailPages && $this->DetailPages["patient_prescription"] && $this->DetailPages["patient_prescription"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_prescription"];
            $url = "PatientPrescriptionPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_prescription\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_prescription", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_prescription\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientPrescriptionList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_prescription", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientPrescriptionGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_prescription");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_final_diagnosis"
        if ($this->DetailPages && $this->DetailPages["patient_final_diagnosis"] && $this->DetailPages["patient_final_diagnosis"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_final_diagnosis"];
            $url = "PatientFinalDiagnosisPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_final_diagnosis\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_final_diagnosis", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_final_diagnosis\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientFinalDiagnosisList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_final_diagnosis", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientFinalDiagnosisGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_final_diagnosis");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`='" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`='" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_follow_up"
        if ($this->DetailPages && $this->DetailPages["patient_follow_up"] && $this->DetailPages["patient_follow_up"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_follow_up"];
            $url = "PatientFollowUpPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_follow_up\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_follow_up", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_follow_up\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientFollowUpList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_follow_up", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientFollowUpGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_follow_up");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";

        // Column "detail_patient_ot_delivery_register"
        if ($this->DetailPages && $this->DetailPages["patient_ot_delivery_register"] && $this->DetailPages["patient_ot_delivery_register"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_ot_delivery_register"];
            $url = "PatientOtDeliveryRegisterPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_ot_delivery_register\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_ot_delivery_register", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_ot_delivery_register\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientOtDeliveryRegisterList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_ot_delivery_register", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientOtDeliveryRegisterGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_delivery_register");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";

        // Column "detail_patient_ot_surgery_register"
        if ($this->DetailPages && $this->DetailPages["patient_ot_surgery_register"] && $this->DetailPages["patient_ot_surgery_register"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_ot_surgery_register"];
            $url = "PatientOtSurgeryRegisterPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_ot_surgery_register\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_ot_surgery_register", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_ot_surgery_register\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientOtSurgeryRegisterList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_ot_surgery_register", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientOtSurgeryRegisterGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_ot_surgery_register");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PatID`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";

        // Column "detail_patient_services"
        if ($this->DetailPages && $this->DetailPages["patient_services"] && $this->DetailPages["patient_services"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_services"];
            $url = "PatientServicesPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_services\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_services", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_services\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientServicesList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_services", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientServicesGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_services");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`='" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`='" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_investigations"
        if ($this->DetailPages && $this->DetailPages["patient_investigations"] && $this->DetailPages["patient_investigations"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_investigations"];
            $url = "PatientInvestigationsPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_investigations\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_investigations", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_investigations\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientInvestigationsList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_investigations", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientInvestigationsGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_investigations");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientId`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_insurance"
        if ($this->DetailPages && $this->DetailPages["patient_insurance"] && $this->DetailPages["patient_insurance"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_insurance"];
            $url = "PatientInsurancePreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_insurance\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_insurance", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_insurance\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientInsuranceList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_insurance", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientInsuranceGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_insurance");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PatID`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_pharmacy_pharled"
        if ($this->DetailPages && $this->DetailPages["pharmacy_pharled"] && $this->DetailPages["pharmacy_pharled"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_pharmacy_pharled"];
            $url = "PharmacyPharledPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"pharmacy_pharled\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("pharmacy_pharled", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"pharmacy_pharled\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PharmacyPharledList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("pharmacy_pharled", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PharmacyPharledGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatID`=" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "";

        // Column "detail_view_ip_advance"
        if ($this->DetailPages && $this->DetailPages["view_ip_advance"] && $this->DetailPages["view_ip_advance"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_view_ip_advance"];
            $url = "ViewIpAdvancePreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"view_ip_advance\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("view_ip_advance", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"view_ip_advance\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("ViewIpAdvanceList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("view_ip_advance", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("ViewIpAdvanceGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_ip_advance");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`Reception`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`mrnno`='" . AdjustSql($this->mrnNo->CurrentValue, $this->Dbid) . "'";
        $sqlwrk = $sqlwrk . " AND " . "`PatID`='" . AdjustSql($this->patient_id->CurrentValue, $this->Dbid) . "'";

        // Column "detail_patient_room"
        if ($this->DetailPages && $this->DetailPages["patient_room"] && $this->DetailPages["patient_room"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_room"];
            $url = "PatientRoomPreview?t=ip_admission&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_room\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'ip_admission')) {
                $label = $Language->TablePhrase("patient_room", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_room\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientRoomList?" . Config("TABLE_SHOW_MASTER") . "=ip_admission&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_mrnNo", $this->mrnNo->CurrentValue) . "&" . GetForeignKeyUrl("fk_patient_id", $this->patient_id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_room", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientRoomGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ip_admission')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_room");
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

    // Load basic search values
    protected function loadBasicSearchValues()
    {
        $this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), false);
        if ($this->BasicSearch->Keyword != "" && $this->Command == "") {
            $this->Command = "search";
        }
        $this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), false);
    }

    // Load search values for validation
    protected function loadSearchValues()
    {
        // Load search values
        $hasValue = false;

        // id
        if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mrnNo
        if (!$this->isAddOrEdit() && $this->mrnNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mrnNo->AdvancedSearch->SearchValue != "" || $this->mrnNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientID
        if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // patient_name
        if (!$this->isAddOrEdit() && $this->patient_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->patient_name->AdvancedSearch->SearchValue != "" || $this->patient_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mobileno
        if (!$this->isAddOrEdit() && $this->mobileno->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mobileno->AdvancedSearch->SearchValue != "" || $this->mobileno->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // gender
        if (!$this->isAddOrEdit() && $this->gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->gender->AdvancedSearch->SearchValue != "" || $this->gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // age
        if (!$this->isAddOrEdit() && $this->age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->age->AdvancedSearch->SearchValue != "" || $this->age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // typeRegsisteration
        if (!$this->isAddOrEdit() && $this->typeRegsisteration->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->typeRegsisteration->AdvancedSearch->SearchValue != "" || $this->typeRegsisteration->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PaymentCategory
        if (!$this->isAddOrEdit() && $this->PaymentCategory->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PaymentCategory->AdvancedSearch->SearchValue != "" || $this->PaymentCategory->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // physician_id
        if (!$this->isAddOrEdit() && $this->physician_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->physician_id->AdvancedSearch->SearchValue != "" || $this->physician_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // admission_consultant_id
        if (!$this->isAddOrEdit() && $this->admission_consultant_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->admission_consultant_id->AdvancedSearch->SearchValue != "" || $this->admission_consultant_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // leading_consultant_id
        if (!$this->isAddOrEdit() && $this->leading_consultant_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->leading_consultant_id->AdvancedSearch->SearchValue != "" || $this->leading_consultant_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // cause
        if (!$this->isAddOrEdit() && $this->cause->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->cause->AdvancedSearch->SearchValue != "" || $this->cause->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // admission_date
        if (!$this->isAddOrEdit() && $this->admission_date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->admission_date->AdvancedSearch->SearchValue != "" || $this->admission_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // release_date
        if (!$this->isAddOrEdit() && $this->release_date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->release_date->AdvancedSearch->SearchValue != "" || $this->release_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PaymentStatus
        if (!$this->isAddOrEdit() && $this->PaymentStatus->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PaymentStatus->AdvancedSearch->SearchValue != "" || $this->PaymentStatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // status
        if (!$this->isAddOrEdit() && $this->status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->status->AdvancedSearch->SearchValue != "" || $this->status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // createdby
        if (!$this->isAddOrEdit() && $this->createdby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createdby->AdvancedSearch->SearchValue != "" || $this->createdby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // createddatetime
        if (!$this->isAddOrEdit() && $this->createddatetime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createddatetime->AdvancedSearch->SearchValue != "" || $this->createddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // modifiedby
        if (!$this->isAddOrEdit() && $this->modifiedby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->modifiedby->AdvancedSearch->SearchValue != "" || $this->modifiedby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // modifieddatetime
        if (!$this->isAddOrEdit() && $this->modifieddatetime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->modifieddatetime->AdvancedSearch->SearchValue != "" || $this->modifieddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // profilePic
        if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HospID
        if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DOB
        if (!$this->isAddOrEdit() && $this->DOB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DOB->AdvancedSearch->SearchValue != "" || $this->DOB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferedByDr
        if (!$this->isAddOrEdit() && $this->ReferedByDr->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferedByDr->AdvancedSearch->SearchValue != "" || $this->ReferedByDr->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferClinicname
        if (!$this->isAddOrEdit() && $this->ReferClinicname->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferClinicname->AdvancedSearch->SearchValue != "" || $this->ReferClinicname->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferCity
        if (!$this->isAddOrEdit() && $this->ReferCity->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferCity->AdvancedSearch->SearchValue != "" || $this->ReferCity->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferMobileNo
        if (!$this->isAddOrEdit() && $this->ReferMobileNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferMobileNo->AdvancedSearch->SearchValue != "" || $this->ReferMobileNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferA4TreatingConsultant
        if (!$this->isAddOrEdit() && $this->ReferA4TreatingConsultant->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue != "" || $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurposreReferredfor
        if (!$this->isAddOrEdit() && $this->PurposreReferredfor->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurposreReferredfor->AdvancedSearch->SearchValue != "" || $this->PurposreReferredfor->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillClosing
        if (!$this->isAddOrEdit() && $this->BillClosing->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillClosing->AdvancedSearch->SearchValue != "" || $this->BillClosing->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillClosingDate
        if (!$this->isAddOrEdit() && $this->BillClosingDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillClosingDate->AdvancedSearch->SearchValue != "" || $this->BillClosingDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillNumber
        if (!$this->isAddOrEdit() && $this->BillNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillNumber->AdvancedSearch->SearchValue != "" || $this->BillNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ClosingAmount
        if (!$this->isAddOrEdit() && $this->ClosingAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ClosingAmount->AdvancedSearch->SearchValue != "" || $this->ClosingAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ClosingType
        if (!$this->isAddOrEdit() && $this->ClosingType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ClosingType->AdvancedSearch->SearchValue != "" || $this->ClosingType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillAmount
        if (!$this->isAddOrEdit() && $this->BillAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillAmount->AdvancedSearch->SearchValue != "" || $this->BillAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // billclosedBy
        if (!$this->isAddOrEdit() && $this->billclosedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->billclosedBy->AdvancedSearch->SearchValue != "" || $this->billclosedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // bllcloseByDate
        if (!$this->isAddOrEdit() && $this->bllcloseByDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->bllcloseByDate->AdvancedSearch->SearchValue != "" || $this->bllcloseByDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReportHeader
        if (!$this->isAddOrEdit() && $this->ReportHeader->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReportHeader->AdvancedSearch->SearchValue != "" || $this->ReportHeader->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Procedure
        if (!$this->isAddOrEdit() && $this->Procedure->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Procedure->AdvancedSearch->SearchValue != "" || $this->Procedure->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Consultant
        if (!$this->isAddOrEdit() && $this->Consultant->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Consultant->AdvancedSearch->SearchValue != "" || $this->Consultant->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Anesthetist
        if (!$this->isAddOrEdit() && $this->Anesthetist->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Anesthetist->AdvancedSearch->SearchValue != "" || $this->Anesthetist->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Amound
        if (!$this->isAddOrEdit() && $this->Amound->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Amound->AdvancedSearch->SearchValue != "" || $this->Amound->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Package
        if (!$this->isAddOrEdit() && $this->Package->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Package->AdvancedSearch->SearchValue != "" || $this->Package->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // patient_id
        if (!$this->isAddOrEdit() && $this->patient_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->patient_id->AdvancedSearch->SearchValue != "" || $this->patient_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerID
        if (!$this->isAddOrEdit() && $this->PartnerID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerID->AdvancedSearch->SearchValue != "" || $this->PartnerID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerName
        if (!$this->isAddOrEdit() && $this->PartnerName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerName->AdvancedSearch->SearchValue != "" || $this->PartnerName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerMobile
        if (!$this->isAddOrEdit() && $this->PartnerMobile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerMobile->AdvancedSearch->SearchValue != "" || $this->PartnerMobile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Cid
        if (!$this->isAddOrEdit() && $this->Cid->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Cid->AdvancedSearch->SearchValue != "" || $this->Cid->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartId
        if (!$this->isAddOrEdit() && $this->PartId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartId->AdvancedSearch->SearchValue != "" || $this->PartId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IDProof
        if (!$this->isAddOrEdit() && $this->IDProof->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IDProof->AdvancedSearch->SearchValue != "" || $this->IDProof->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AdviceToOtherHospital
        if (!$this->isAddOrEdit() && $this->AdviceToOtherHospital->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AdviceToOtherHospital->AdvancedSearch->SearchValue != "" || $this->AdviceToOtherHospital->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Reason
        if (!$this->isAddOrEdit() && $this->Reason->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reason->AdvancedSearch->SearchValue != "" || $this->Reason->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        return $hasValue;
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
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->mobileno->setDbValue($row['mobileno']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->HospID->setDbValue($row['HospID']);
        $this->DOB->setDbValue($row['DOB']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        if (array_key_exists('EV__ReferedByDr', $row)) {
            $this->ReferedByDr->VirtualValue = $row['EV__ReferedByDr']; // Set up virtual field value
        } else {
            $this->ReferedByDr->VirtualValue = ""; // Clear value
        }
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        if (array_key_exists('EV__ReferA4TreatingConsultant', $row)) {
            $this->ReferA4TreatingConsultant->VirtualValue = $row['EV__ReferA4TreatingConsultant']; // Set up virtual field value
        } else {
            $this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
        }
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->BillClosing->setDbValue($row['BillClosing']);
        $this->BillClosingDate->setDbValue($row['BillClosingDate']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->ClosingAmount->setDbValue($row['ClosingAmount']);
        $this->ClosingType->setDbValue($row['ClosingType']);
        $this->BillAmount->setDbValue($row['BillAmount']);
        $this->billclosedBy->setDbValue($row['billclosedBy']);
        $this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->Amound->setDbValue($row['Amound']);
        $this->Package->setDbValue($row['Package']);
        $this->patient_id->setDbValue($row['patient_id']);
        if (array_key_exists('EV__patient_id', $row)) {
            $this->patient_id->VirtualValue = $row['EV__patient_id']; // Set up virtual field value
        } else {
            $this->patient_id->VirtualValue = ""; // Clear value
        }
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->Cid->setDbValue($row['Cid']);
        $this->PartId->setDbValue($row['PartId']);
        $this->IDProof->setDbValue($row['IDProof']);
        $this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
        $this->Reason->setDbValue($row['Reason']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['mrnNo'] = null;
        $row['PatientID'] = null;
        $row['patient_name'] = null;
        $row['mobileno'] = null;
        $row['gender'] = null;
        $row['age'] = null;
        $row['typeRegsisteration'] = null;
        $row['PaymentCategory'] = null;
        $row['physician_id'] = null;
        $row['admission_consultant_id'] = null;
        $row['leading_consultant_id'] = null;
        $row['cause'] = null;
        $row['admission_date'] = null;
        $row['release_date'] = null;
        $row['PaymentStatus'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['profilePic'] = null;
        $row['HospID'] = null;
        $row['DOB'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['BillClosing'] = null;
        $row['BillClosingDate'] = null;
        $row['BillNumber'] = null;
        $row['ClosingAmount'] = null;
        $row['ClosingType'] = null;
        $row['BillAmount'] = null;
        $row['billclosedBy'] = null;
        $row['bllcloseByDate'] = null;
        $row['ReportHeader'] = null;
        $row['Procedure'] = null;
        $row['Consultant'] = null;
        $row['Anesthetist'] = null;
        $row['Amound'] = null;
        $row['Package'] = null;
        $row['patient_id'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerMobile'] = null;
        $row['Cid'] = null;
        $row['PartId'] = null;
        $row['IDProof'] = null;
        $row['AdviceToOtherHospital'] = null;
        $row['Reason'] = null;
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
        $this->InlineEditUrl = $this->getInlineEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->InlineCopyUrl = $this->getInlineCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();

        // Convert decimal values if posted back
        if ($this->Amound->FormValue == $this->Amound->CurrentValue && is_numeric(ConvertToFloatString($this->Amound->CurrentValue))) {
            $this->Amound->CurrentValue = ConvertToFloatString($this->Amound->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // mrnNo

        // PatientID

        // patient_name

        // mobileno

        // gender

        // age

        // typeRegsisteration

        // PaymentCategory

        // physician_id

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // profilePic

        // HospID

        // DOB

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // BillClosing

        // BillClosingDate

        // BillNumber

        // ClosingAmount

        // ClosingType

        // BillAmount

        // billclosedBy

        // bllcloseByDate

        // ReportHeader

        // Procedure

        // Consultant

        // Anesthetist

        // Amound

        // Package

        // patient_id

        // PartnerID

        // PartnerName

        // PartnerMobile

        // Cid

        // PartId

        // IDProof

        // AdviceToOtherHospital

        // Reason
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
            $this->mrnNo->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // patient_name
            $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
            $this->patient_name->ViewCustomAttributes = "";

            // mobileno
            $this->mobileno->ViewValue = $this->mobileno->CurrentValue;
            $this->mobileno->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->ViewValue = $this->gender->CurrentValue;
                    }
                }
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewCustomAttributes = "";

            // typeRegsisteration
            $curVal = trim(strval($this->typeRegsisteration->CurrentValue));
            if ($curVal != "") {
                $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
                if ($this->typeRegsisteration->ViewValue === null) { // Lookup from database
                    $filterWrk = "`RegsistrationType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->typeRegsisteration->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->typeRegsisteration->Lookup->renderViewRow($rswrk[0]);
                        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->displayValue($arwrk);
                    } else {
                        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
                    }
                }
            } else {
                $this->typeRegsisteration->ViewValue = null;
            }
            $this->typeRegsisteration->ViewCustomAttributes = "";

            // PaymentCategory
            $curVal = trim(strval($this->PaymentCategory->CurrentValue));
            if ($curVal != "") {
                $this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
                if ($this->PaymentCategory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Category`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PaymentCategory->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PaymentCategory->Lookup->renderViewRow($rswrk[0]);
                        $this->PaymentCategory->ViewValue = $this->PaymentCategory->displayValue($arwrk);
                    } else {
                        $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
                    }
                }
            } else {
                $this->PaymentCategory->ViewValue = null;
            }
            $this->PaymentCategory->ViewCustomAttributes = "";

            // physician_id
            $curVal = trim(strval($this->physician_id->CurrentValue));
            if ($curVal != "") {
                $this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
                if ($this->physician_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->physician_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->physician_id->Lookup->renderViewRow($rswrk[0]);
                        $this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
                    } else {
                        $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
                    }
                }
            } else {
                $this->physician_id->ViewValue = null;
            }
            $this->physician_id->ViewCustomAttributes = "";

            // admission_consultant_id
            $curVal = trim(strval($this->admission_consultant_id->CurrentValue));
            if ($curVal != "") {
                $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
                if ($this->admission_consultant_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->admission_consultant_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->admission_consultant_id->Lookup->renderViewRow($rswrk[0]);
                        $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->displayValue($arwrk);
                    } else {
                        $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
                    }
                }
            } else {
                $this->admission_consultant_id->ViewValue = null;
            }
            $this->admission_consultant_id->ViewCustomAttributes = "";

            // leading_consultant_id
            $curVal = trim(strval($this->leading_consultant_id->CurrentValue));
            if ($curVal != "") {
                $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->lookupCacheOption($curVal);
                if ($this->leading_consultant_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->leading_consultant_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->leading_consultant_id->Lookup->renderViewRow($rswrk[0]);
                        $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->displayValue($arwrk);
                    } else {
                        $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
                    }
                }
            } else {
                $this->leading_consultant_id->ViewValue = null;
            }
            $this->leading_consultant_id->ViewCustomAttributes = "";

            // admission_date
            $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
            $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 11);
            $this->admission_date->ViewCustomAttributes = "";

            // release_date
            $this->release_date->ViewValue = $this->release_date->CurrentValue;
            $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 17);
            $this->release_date->ViewCustomAttributes = "";

            // PaymentStatus
            $curVal = trim(strval($this->PaymentStatus->CurrentValue));
            if ($curVal != "") {
                $this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
                if ($this->PaymentStatus->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PaymentStatus->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PaymentStatus->Lookup->renderViewRow($rswrk[0]);
                        $this->PaymentStatus->ViewValue = $this->PaymentStatus->displayValue($arwrk);
                    } else {
                        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
                    }
                }
            } else {
                $this->PaymentStatus->ViewValue = null;
            }
            $this->PaymentStatus->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // HospID
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
                if ($this->HospID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                        $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                    } else {
                        $this->HospID->ViewValue = $this->HospID->CurrentValue;
                    }
                }
            } else {
                $this->HospID->ViewValue = null;
            }
            $this->HospID->ViewCustomAttributes = "";

            // ReferedByDr
            if ($this->ReferedByDr->VirtualValue != "") {
                $this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferedByDr->CurrentValue));
                if ($curVal != "") {
                    $this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
                    if ($this->ReferedByDr->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferedByDr->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferedByDr->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
                        } else {
                            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferedByDr->ViewValue = null;
                }
            }
            $this->ReferedByDr->ViewCustomAttributes = "";

            // ReferClinicname
            $this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
            $this->ReferClinicname->ViewCustomAttributes = "";

            // ReferCity
            $this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
            $this->ReferCity->ViewCustomAttributes = "";

            // ReferMobileNo
            $this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
            $this->ReferMobileNo->ViewCustomAttributes = "";

            // ReferA4TreatingConsultant
            if ($this->ReferA4TreatingConsultant->VirtualValue != "") {
                $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
                if ($curVal != "") {
                    $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
                    if ($this->ReferA4TreatingConsultant->ViewValue === null) { // Lookup from database
                        $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferA4TreatingConsultant->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
                        } else {
                            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferA4TreatingConsultant->ViewValue = null;
                }
            }
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // BillClosing
            $this->BillClosing->ViewValue = $this->BillClosing->CurrentValue;
            $this->BillClosing->ViewCustomAttributes = "";

            // BillClosingDate
            $this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
            $this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
            $this->BillClosingDate->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // ClosingAmount
            $this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
            $this->ClosingAmount->ViewCustomAttributes = "";

            // ClosingType
            $this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
            $this->ClosingType->ViewCustomAttributes = "";

            // BillAmount
            $this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
            $this->BillAmount->ViewCustomAttributes = "";

            // billclosedBy
            $this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
            $this->billclosedBy->ViewCustomAttributes = "";

            // bllcloseByDate
            $this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
            $this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
            $this->bllcloseByDate->ViewCustomAttributes = "";

            // ReportHeader
            $this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
            $this->ReportHeader->ViewCustomAttributes = "";

            // Procedure
            $this->Procedure->ViewValue = $this->Procedure->CurrentValue;
            $this->Procedure->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // Anesthetist
            $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
            $this->Anesthetist->ViewCustomAttributes = "";

            // Amound
            $this->Amound->ViewValue = $this->Amound->CurrentValue;
            $this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
            $this->Amound->ViewCustomAttributes = "";

            // Package
            $this->Package->ViewValue = $this->Package->CurrentValue;
            $this->Package->ViewCustomAttributes = "";

            // patient_id
            if ($this->patient_id->VirtualValue != "") {
                $this->patient_id->ViewValue = $this->patient_id->VirtualValue;
            } else {
                $curVal = trim(strval($this->patient_id->CurrentValue));
                if ($curVal != "") {
                    $this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
                    if ($this->patient_id->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->patient_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->patient_id->Lookup->renderViewRow($rswrk[0]);
                            $this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
                        } else {
                            $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
                        }
                    }
                } else {
                    $this->patient_id->ViewValue = null;
                }
            }
            $this->patient_id->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // Cid
            $this->Cid->ViewValue = $this->Cid->CurrentValue;
            $this->Cid->ViewValue = FormatNumber($this->Cid->ViewValue, 0, -2, -2, -2);
            $this->Cid->ViewCustomAttributes = "";

            // PartId
            $this->PartId->ViewValue = $this->PartId->CurrentValue;
            $this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
            $this->PartId->ViewCustomAttributes = "";

            // IDProof
            $this->IDProof->ViewValue = $this->IDProof->CurrentValue;
            $this->IDProof->ViewCustomAttributes = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
            $this->AdviceToOtherHospital->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
            if (!$this->isExport()) {
                $this->id->ViewValue = $this->highlightValue($this->id);
            }

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";
            $this->mrnNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->mrnNo->ViewValue = $this->highlightValue($this->mrnNo);
            }

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientID->ViewValue = $this->highlightValue($this->PatientID);
            }

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";
            $this->patient_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->patient_name->ViewValue = $this->highlightValue($this->patient_name);
            }

            // mobileno
            $this->mobileno->LinkCustomAttributes = "";
            $this->mobileno->HrefValue = "";
            $this->mobileno->TooltipValue = "";
            if (!$this->isExport()) {
                $this->mobileno->ViewValue = $this->highlightValue($this->mobileno);
            }

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";
            if (!$this->isExport()) {
                $this->gender->ViewValue = $this->highlightValue($this->gender);
            }

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";
            if (!$this->isExport()) {
                $this->age->ViewValue = $this->highlightValue($this->age);
            }

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";
            $this->typeRegsisteration->TooltipValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";
            $this->PaymentCategory->TooltipValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";
            $this->physician_id->TooltipValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";
            $this->admission_consultant_id->TooltipValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";
            $this->leading_consultant_id->TooltipValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";
            $this->admission_date->TooltipValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";
            $this->release_date->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";
            if (!$this->isExport()) {
                $this->profilePic->ViewValue = $this->highlightValue($this->profilePic);
            }

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";
            $this->ReferedByDr->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferedByDr->ViewValue = $this->highlightValue($this->ReferedByDr);
            }

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";
            $this->ReferClinicname->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferClinicname->ViewValue = $this->highlightValue($this->ReferClinicname);
            }

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";
            $this->ReferCity->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferCity->ViewValue = $this->highlightValue($this->ReferCity);
            }

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";
            $this->ReferMobileNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferMobileNo->ViewValue = $this->highlightValue($this->ReferMobileNo);
            }

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";
            $this->ReferA4TreatingConsultant->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferA4TreatingConsultant->ViewValue = $this->highlightValue($this->ReferA4TreatingConsultant);
            }

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";
            $this->PurposreReferredfor->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PurposreReferredfor->ViewValue = $this->highlightValue($this->PurposreReferredfor);
            }

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";
            $this->BillClosing->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BillClosing->ViewValue = $this->highlightValue($this->BillClosing);
            }

            // BillClosingDate
            $this->BillClosingDate->LinkCustomAttributes = "";
            $this->BillClosingDate->HrefValue = "";
            $this->BillClosingDate->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BillNumber->ViewValue = $this->highlightValue($this->BillNumber);
            }

            // ClosingAmount
            $this->ClosingAmount->LinkCustomAttributes = "";
            $this->ClosingAmount->HrefValue = "";
            $this->ClosingAmount->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ClosingAmount->ViewValue = $this->highlightValue($this->ClosingAmount);
            }

            // ClosingType
            $this->ClosingType->LinkCustomAttributes = "";
            $this->ClosingType->HrefValue = "";
            $this->ClosingType->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ClosingType->ViewValue = $this->highlightValue($this->ClosingType);
            }

            // BillAmount
            $this->BillAmount->LinkCustomAttributes = "";
            $this->BillAmount->HrefValue = "";
            $this->BillAmount->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BillAmount->ViewValue = $this->highlightValue($this->BillAmount);
            }

            // billclosedBy
            $this->billclosedBy->LinkCustomAttributes = "";
            $this->billclosedBy->HrefValue = "";
            $this->billclosedBy->TooltipValue = "";
            if (!$this->isExport()) {
                $this->billclosedBy->ViewValue = $this->highlightValue($this->billclosedBy);
            }

            // bllcloseByDate
            $this->bllcloseByDate->LinkCustomAttributes = "";
            $this->bllcloseByDate->HrefValue = "";
            $this->bllcloseByDate->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReportHeader->ViewValue = $this->highlightValue($this->ReportHeader);
            }

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";
            $this->Procedure->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Procedure->ViewValue = $this->highlightValue($this->Procedure);
            }

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Consultant->ViewValue = $this->highlightValue($this->Consultant);
            }

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Anesthetist->ViewValue = $this->highlightValue($this->Anesthetist);
            }

            // Amound
            $this->Amound->LinkCustomAttributes = "";
            $this->Amound->HrefValue = "";
            $this->Amound->TooltipValue = "";

            // Package
            $this->Package->LinkCustomAttributes = "";
            $this->Package->HrefValue = "";
            $this->Package->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Package->ViewValue = $this->highlightValue($this->Package);
            }

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";
            $this->patient_id->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerID->ViewValue = $this->highlightValue($this->PartnerID);
            }

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerName->ViewValue = $this->highlightValue($this->PartnerName);
            }

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerMobile->ViewValue = $this->highlightValue($this->PartnerMobile);
            }

            // Cid
            $this->Cid->LinkCustomAttributes = "";
            $this->Cid->HrefValue = "";
            $this->Cid->TooltipValue = "";

            // PartId
            $this->PartId->LinkCustomAttributes = "";
            $this->PartId->HrefValue = "";
            $this->PartId->TooltipValue = "";

            // IDProof
            $this->IDProof->LinkCustomAttributes = "";
            $this->IDProof->HrefValue = "";
            $this->IDProof->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IDProof->ViewValue = $this->highlightValue($this->IDProof);
            }

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->LinkCustomAttributes = "";
            $this->AdviceToOtherHospital->HrefValue = "";
            $this->AdviceToOtherHospital->TooltipValue = "";
            if (!$this->isExport()) {
                $this->AdviceToOtherHospital->ViewValue = $this->highlightValue($this->AdviceToOtherHospital);
            }
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // mrnNo
            $this->mrnNo->EditAttrs["class"] = "form-control";
            $this->mrnNo->EditCustomAttributes = "";
            if (!$this->mrnNo->Raw) {
                $this->mrnNo->AdvancedSearch->SearchValue = HtmlDecode($this->mrnNo->AdvancedSearch->SearchValue);
            }
            $this->mrnNo->EditValue = HtmlEncode($this->mrnNo->AdvancedSearch->SearchValue);
            $this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // patient_name
            $this->patient_name->EditAttrs["class"] = "form-control";
            $this->patient_name->EditCustomAttributes = "";
            if (!$this->patient_name->Raw) {
                $this->patient_name->AdvancedSearch->SearchValue = HtmlDecode($this->patient_name->AdvancedSearch->SearchValue);
            }
            $this->patient_name->EditValue = HtmlEncode($this->patient_name->AdvancedSearch->SearchValue);
            $this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

            // mobileno
            $this->mobileno->EditAttrs["class"] = "form-control";
            $this->mobileno->EditCustomAttributes = "";
            if (!$this->mobileno->Raw) {
                $this->mobileno->AdvancedSearch->SearchValue = HtmlDecode($this->mobileno->AdvancedSearch->SearchValue);
            }
            $this->mobileno->EditValue = HtmlEncode($this->mobileno->AdvancedSearch->SearchValue);
            $this->mobileno->PlaceHolder = RemoveHtml($this->mobileno->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->AdvancedSearch->SearchValue = HtmlDecode($this->gender->AdvancedSearch->SearchValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->AdvancedSearch->SearchValue);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // age
            $this->age->EditAttrs["class"] = "form-control";
            $this->age->EditCustomAttributes = "";
            if (!$this->age->Raw) {
                $this->age->AdvancedSearch->SearchValue = HtmlDecode($this->age->AdvancedSearch->SearchValue);
            }
            $this->age->EditValue = HtmlEncode($this->age->AdvancedSearch->SearchValue);
            $this->age->PlaceHolder = RemoveHtml($this->age->caption());

            // typeRegsisteration
            $this->typeRegsisteration->EditAttrs["class"] = "form-control";
            $this->typeRegsisteration->EditCustomAttributes = "";
            $curVal = trim(strval($this->typeRegsisteration->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->typeRegsisteration->AdvancedSearch->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
            } else {
                $this->typeRegsisteration->AdvancedSearch->ViewValue = $this->typeRegsisteration->Lookup !== null && is_array($this->typeRegsisteration->Lookup->Options) ? $curVal : null;
            }
            if ($this->typeRegsisteration->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->typeRegsisteration->EditValue = array_values($this->typeRegsisteration->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`RegsistrationType`" . SearchString("=", $this->typeRegsisteration->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->typeRegsisteration->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->typeRegsisteration->EditValue = $arwrk;
            }
            $this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

            // PaymentCategory
            $this->PaymentCategory->EditAttrs["class"] = "form-control";
            $this->PaymentCategory->EditCustomAttributes = "";
            $curVal = trim(strval($this->PaymentCategory->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PaymentCategory->AdvancedSearch->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
            } else {
                $this->PaymentCategory->AdvancedSearch->ViewValue = $this->PaymentCategory->Lookup !== null && is_array($this->PaymentCategory->Lookup->Options) ? $curVal : null;
            }
            if ($this->PaymentCategory->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->PaymentCategory->EditValue = array_values($this->PaymentCategory->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Category`" . SearchString("=", $this->PaymentCategory->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PaymentCategory->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PaymentCategory->EditValue = $arwrk;
            }
            $this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

            // physician_id
            $this->physician_id->EditAttrs["class"] = "form-control";
            $this->physician_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->physician_id->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->physician_id->AdvancedSearch->ViewValue = $this->physician_id->lookupCacheOption($curVal);
            } else {
                $this->physician_id->AdvancedSearch->ViewValue = $this->physician_id->Lookup !== null && is_array($this->physician_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->physician_id->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->physician_id->EditValue = array_values($this->physician_id->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->physician_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->physician_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->physician_id->EditValue = $arwrk;
            }
            $this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

            // admission_consultant_id
            $this->admission_consultant_id->EditAttrs["class"] = "form-control";
            $this->admission_consultant_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->admission_consultant_id->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->admission_consultant_id->AdvancedSearch->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
            } else {
                $this->admission_consultant_id->AdvancedSearch->ViewValue = $this->admission_consultant_id->Lookup !== null && is_array($this->admission_consultant_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->admission_consultant_id->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->admission_consultant_id->EditValue = array_values($this->admission_consultant_id->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->admission_consultant_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->admission_consultant_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->admission_consultant_id->EditValue = $arwrk;
            }
            $this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

            // leading_consultant_id
            $this->leading_consultant_id->EditAttrs["class"] = "form-control";
            $this->leading_consultant_id->EditCustomAttributes = "";
            $this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

            // admission_date
            $this->admission_date->EditAttrs["class"] = "form-control";
            $this->admission_date->EditCustomAttributes = "";
            $this->admission_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->admission_date->AdvancedSearch->SearchValue, 11), 11));
            $this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

            // release_date
            $this->release_date->EditAttrs["class"] = "form-control";
            $this->release_date->EditCustomAttributes = "";
            $this->release_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->release_date->AdvancedSearch->SearchValue, 17), 17));
            $this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // ReferedByDr
            $this->ReferedByDr->EditAttrs["class"] = "form-control";
            $this->ReferedByDr->EditCustomAttributes = "";
            if (!$this->ReferedByDr->Raw) {
                $this->ReferedByDr->AdvancedSearch->SearchValue = HtmlDecode($this->ReferedByDr->AdvancedSearch->SearchValue);
            }
            $this->ReferedByDr->EditValue = HtmlEncode($this->ReferedByDr->AdvancedSearch->SearchValue);
            $this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

            // ReferClinicname
            $this->ReferClinicname->EditAttrs["class"] = "form-control";
            $this->ReferClinicname->EditCustomAttributes = "";
            if (!$this->ReferClinicname->Raw) {
                $this->ReferClinicname->AdvancedSearch->SearchValue = HtmlDecode($this->ReferClinicname->AdvancedSearch->SearchValue);
            }
            $this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->AdvancedSearch->SearchValue);
            $this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

            // ReferCity
            $this->ReferCity->EditAttrs["class"] = "form-control";
            $this->ReferCity->EditCustomAttributes = "";
            if (!$this->ReferCity->Raw) {
                $this->ReferCity->AdvancedSearch->SearchValue = HtmlDecode($this->ReferCity->AdvancedSearch->SearchValue);
            }
            $this->ReferCity->EditValue = HtmlEncode($this->ReferCity->AdvancedSearch->SearchValue);
            $this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

            // ReferMobileNo
            $this->ReferMobileNo->EditAttrs["class"] = "form-control";
            $this->ReferMobileNo->EditCustomAttributes = "";
            if (!$this->ReferMobileNo->Raw) {
                $this->ReferMobileNo->AdvancedSearch->SearchValue = HtmlDecode($this->ReferMobileNo->AdvancedSearch->SearchValue);
            }
            $this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->AdvancedSearch->SearchValue);
            $this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
            $this->ReferA4TreatingConsultant->EditCustomAttributes = "";
            if (!$this->ReferA4TreatingConsultant->Raw) {
                $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = HtmlDecode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
            }
            $this->ReferA4TreatingConsultant->EditValue = HtmlEncode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
            $this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

            // PurposreReferredfor
            $this->PurposreReferredfor->EditAttrs["class"] = "form-control";
            $this->PurposreReferredfor->EditCustomAttributes = "";
            if (!$this->PurposreReferredfor->Raw) {
                $this->PurposreReferredfor->AdvancedSearch->SearchValue = HtmlDecode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
            }
            $this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
            $this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

            // BillClosing
            $this->BillClosing->EditAttrs["class"] = "form-control";
            $this->BillClosing->EditCustomAttributes = "";
            if (!$this->BillClosing->Raw) {
                $this->BillClosing->AdvancedSearch->SearchValue = HtmlDecode($this->BillClosing->AdvancedSearch->SearchValue);
            }
            $this->BillClosing->EditValue = HtmlEncode($this->BillClosing->AdvancedSearch->SearchValue);
            $this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

            // BillClosingDate
            $this->BillClosingDate->EditAttrs["class"] = "form-control";
            $this->BillClosingDate->EditCustomAttributes = "";
            $this->BillClosingDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillClosingDate->AdvancedSearch->SearchValue, 0), 8));
            $this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // ClosingAmount
            $this->ClosingAmount->EditAttrs["class"] = "form-control";
            $this->ClosingAmount->EditCustomAttributes = "";
            if (!$this->ClosingAmount->Raw) {
                $this->ClosingAmount->AdvancedSearch->SearchValue = HtmlDecode($this->ClosingAmount->AdvancedSearch->SearchValue);
            }
            $this->ClosingAmount->EditValue = HtmlEncode($this->ClosingAmount->AdvancedSearch->SearchValue);
            $this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

            // ClosingType
            $this->ClosingType->EditAttrs["class"] = "form-control";
            $this->ClosingType->EditCustomAttributes = "";
            if (!$this->ClosingType->Raw) {
                $this->ClosingType->AdvancedSearch->SearchValue = HtmlDecode($this->ClosingType->AdvancedSearch->SearchValue);
            }
            $this->ClosingType->EditValue = HtmlEncode($this->ClosingType->AdvancedSearch->SearchValue);
            $this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

            // BillAmount
            $this->BillAmount->EditAttrs["class"] = "form-control";
            $this->BillAmount->EditCustomAttributes = "";
            if (!$this->BillAmount->Raw) {
                $this->BillAmount->AdvancedSearch->SearchValue = HtmlDecode($this->BillAmount->AdvancedSearch->SearchValue);
            }
            $this->BillAmount->EditValue = HtmlEncode($this->BillAmount->AdvancedSearch->SearchValue);
            $this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

            // billclosedBy
            $this->billclosedBy->EditAttrs["class"] = "form-control";
            $this->billclosedBy->EditCustomAttributes = "";
            if (!$this->billclosedBy->Raw) {
                $this->billclosedBy->AdvancedSearch->SearchValue = HtmlDecode($this->billclosedBy->AdvancedSearch->SearchValue);
            }
            $this->billclosedBy->EditValue = HtmlEncode($this->billclosedBy->AdvancedSearch->SearchValue);
            $this->billclosedBy->PlaceHolder = RemoveHtml($this->billclosedBy->caption());

            // bllcloseByDate
            $this->bllcloseByDate->EditAttrs["class"] = "form-control";
            $this->bllcloseByDate->EditCustomAttributes = "";
            $this->bllcloseByDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->bllcloseByDate->AdvancedSearch->SearchValue, 0), 8));
            $this->bllcloseByDate->PlaceHolder = RemoveHtml($this->bllcloseByDate->caption());

            // ReportHeader
            $this->ReportHeader->EditAttrs["class"] = "form-control";
            $this->ReportHeader->EditCustomAttributes = "";
            if (!$this->ReportHeader->Raw) {
                $this->ReportHeader->AdvancedSearch->SearchValue = HtmlDecode($this->ReportHeader->AdvancedSearch->SearchValue);
            }
            $this->ReportHeader->EditValue = HtmlEncode($this->ReportHeader->AdvancedSearch->SearchValue);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // Procedure
            $this->Procedure->EditAttrs["class"] = "form-control";
            $this->Procedure->EditCustomAttributes = "";
            if (!$this->Procedure->Raw) {
                $this->Procedure->AdvancedSearch->SearchValue = HtmlDecode($this->Procedure->AdvancedSearch->SearchValue);
            }
            $this->Procedure->EditValue = HtmlEncode($this->Procedure->AdvancedSearch->SearchValue);
            $this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->AdvancedSearch->SearchValue = HtmlDecode($this->Consultant->AdvancedSearch->SearchValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->AdvancedSearch->SearchValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // Anesthetist
            $this->Anesthetist->EditAttrs["class"] = "form-control";
            $this->Anesthetist->EditCustomAttributes = "";
            if (!$this->Anesthetist->Raw) {
                $this->Anesthetist->AdvancedSearch->SearchValue = HtmlDecode($this->Anesthetist->AdvancedSearch->SearchValue);
            }
            $this->Anesthetist->EditValue = HtmlEncode($this->Anesthetist->AdvancedSearch->SearchValue);
            $this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

            // Amound
            $this->Amound->EditAttrs["class"] = "form-control";
            $this->Amound->EditCustomAttributes = "";
            $this->Amound->EditValue = HtmlEncode($this->Amound->AdvancedSearch->SearchValue);
            $this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());

            // Package
            $this->Package->EditAttrs["class"] = "form-control";
            $this->Package->EditCustomAttributes = "";
            if (!$this->Package->Raw) {
                $this->Package->AdvancedSearch->SearchValue = HtmlDecode($this->Package->AdvancedSearch->SearchValue);
            }
            $this->Package->EditValue = HtmlEncode($this->Package->AdvancedSearch->SearchValue);
            $this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

            // patient_id
            $this->patient_id->EditAttrs["class"] = "form-control";
            $this->patient_id->EditCustomAttributes = "";
            $this->patient_id->EditValue = HtmlEncode($this->patient_id->AdvancedSearch->SearchValue);
            $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerID->AdvancedSearch->SearchValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->AdvancedSearch->SearchValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerMobile->AdvancedSearch->SearchValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->AdvancedSearch->SearchValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // Cid
            $this->Cid->EditAttrs["class"] = "form-control";
            $this->Cid->EditCustomAttributes = "";
            $this->Cid->EditValue = HtmlEncode($this->Cid->AdvancedSearch->SearchValue);
            $this->Cid->PlaceHolder = RemoveHtml($this->Cid->caption());

            // PartId
            $this->PartId->EditAttrs["class"] = "form-control";
            $this->PartId->EditCustomAttributes = "";
            $this->PartId->EditValue = HtmlEncode($this->PartId->AdvancedSearch->SearchValue);
            $this->PartId->PlaceHolder = RemoveHtml($this->PartId->caption());

            // IDProof
            $this->IDProof->EditAttrs["class"] = "form-control";
            $this->IDProof->EditCustomAttributes = "";
            if (!$this->IDProof->Raw) {
                $this->IDProof->AdvancedSearch->SearchValue = HtmlDecode($this->IDProof->AdvancedSearch->SearchValue);
            }
            $this->IDProof->EditValue = HtmlEncode($this->IDProof->AdvancedSearch->SearchValue);
            $this->IDProof->PlaceHolder = RemoveHtml($this->IDProof->caption());

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
            $this->AdviceToOtherHospital->EditCustomAttributes = "";
            if (!$this->AdviceToOtherHospital->Raw) {
                $this->AdviceToOtherHospital->AdvancedSearch->SearchValue = HtmlDecode($this->AdviceToOtherHospital->AdvancedSearch->SearchValue);
            }
            $this->AdviceToOtherHospital->EditValue = HtmlEncode($this->AdviceToOtherHospital->AdvancedSearch->SearchValue);
            $this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate search
    protected function validateSearch()
    {
        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }

        // Return validate result
        $validateSearch = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateSearch = $validateSearch && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateSearch;
    }

    // Load advanced search
    public function loadAdvancedSearch()
    {
        $this->id->AdvancedSearch->load();
        $this->mrnNo->AdvancedSearch->load();
        $this->PatientID->AdvancedSearch->load();
        $this->patient_name->AdvancedSearch->load();
        $this->mobileno->AdvancedSearch->load();
        $this->gender->AdvancedSearch->load();
        $this->age->AdvancedSearch->load();
        $this->typeRegsisteration->AdvancedSearch->load();
        $this->PaymentCategory->AdvancedSearch->load();
        $this->physician_id->AdvancedSearch->load();
        $this->admission_consultant_id->AdvancedSearch->load();
        $this->leading_consultant_id->AdvancedSearch->load();
        $this->cause->AdvancedSearch->load();
        $this->admission_date->AdvancedSearch->load();
        $this->release_date->AdvancedSearch->load();
        $this->PaymentStatus->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->DOB->AdvancedSearch->load();
        $this->ReferedByDr->AdvancedSearch->load();
        $this->ReferClinicname->AdvancedSearch->load();
        $this->ReferCity->AdvancedSearch->load();
        $this->ReferMobileNo->AdvancedSearch->load();
        $this->ReferA4TreatingConsultant->AdvancedSearch->load();
        $this->PurposreReferredfor->AdvancedSearch->load();
        $this->BillClosing->AdvancedSearch->load();
        $this->BillClosingDate->AdvancedSearch->load();
        $this->BillNumber->AdvancedSearch->load();
        $this->ClosingAmount->AdvancedSearch->load();
        $this->ClosingType->AdvancedSearch->load();
        $this->BillAmount->AdvancedSearch->load();
        $this->billclosedBy->AdvancedSearch->load();
        $this->bllcloseByDate->AdvancedSearch->load();
        $this->ReportHeader->AdvancedSearch->load();
        $this->Procedure->AdvancedSearch->load();
        $this->Consultant->AdvancedSearch->load();
        $this->Anesthetist->AdvancedSearch->load();
        $this->Amound->AdvancedSearch->load();
        $this->Package->AdvancedSearch->load();
        $this->patient_id->AdvancedSearch->load();
        $this->PartnerID->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PartnerMobile->AdvancedSearch->load();
        $this->Cid->AdvancedSearch->load();
        $this->PartId->AdvancedSearch->load();
        $this->IDProof->AdvancedSearch->load();
        $this->AdviceToOtherHospital->AdvancedSearch->load();
        $this->Reason->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fip_admissionlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fip_admissionlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fip_admissionlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
            }
        } elseif (SameText($type, "html")) {
            return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
        } elseif (SameText($type, "xml")) {
            return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
        } elseif (SameText($type, "csv")) {
            return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
        } elseif (SameText($type, "email")) {
            $url = $custom ? ",url:'" . $pageUrl . "export=email&amp;custom=1'" : "";
            return '<button id="emf_ip_admission" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ip_admission\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fip_admissionlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
        } elseif (SameText($type, "print")) {
            return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
        }
    }

    // Set up export options
    protected function setupExportOptions()
    {
        global $Language;

        // Printer friendly
        $item = &$this->ExportOptions->add("print");
        $item->Body = $this->getExportTag("print");
        $item->Visible = true;

        // Export to Excel
        $item = &$this->ExportOptions->add("excel");
        $item->Body = $this->getExportTag("excel");
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word");
        $item->Visible = true;

        // Export to Html
        $item = &$this->ExportOptions->add("html");
        $item->Body = $this->getExportTag("html");
        $item->Visible = true;

        // Export to Xml
        $item = &$this->ExportOptions->add("xml");
        $item->Body = $this->getExportTag("xml");
        $item->Visible = true;

        // Export to Csv
        $item = &$this->ExportOptions->add("csv");
        $item->Body = $this->getExportTag("csv");
        $item->Visible = true;

        // Export to Pdf
        $item = &$this->ExportOptions->add("pdf");
        $item->Body = $this->getExportTag("pdf");
        $item->Visible = true;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email");
        $item->Visible = true;

        // Drop down button for export
        $this->ExportOptions->UseButtonGroup = true;
        $this->ExportOptions->UseDropDownButton = true;
        if ($this->ExportOptions->UseButtonGroup && IsMobile()) {
            $this->ExportOptions->UseDropDownButton = true;
        }
        $this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

        // Add group option item
        $item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Set up search options
    protected function setupSearchOptions()
    {
        global $Language, $Security;
        $pageUrl = $this->pageUrl();
        $this->SearchOptions = new ListOptions("div");
        $this->SearchOptions->TagClassName = "ew-search-option";

        // Search button
        $item = &$this->SearchOptions->add("searchtoggle");
        $searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fip_admissionlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"IpAdmissionSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"ip_admission\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'IpAdmissionSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fip_admissionlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != "" && $this->TotalRecords > 0);

        // Button group for search
        $this->SearchOptions->UseDropDownButton = false;
        $this->SearchOptions->UseButtonGroup = true;
        $this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

        // Add group option item
        $item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide search options
        if ($this->isExport() || $this->CurrentAction) {
            $this->SearchOptions->hideAllOptions();
        }
        if (!$Security->canSearch()) {
            $this->SearchOptions->hideAllOptions();
            $this->FilterOptions->hideAllOptions();
        }
    }

    /**
    * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
    *
    * @param bool $return Return the data rather than output it
    * @return mixed
    */
    public function exportData($return = false)
    {
        global $Language;
        $utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");

        // Load recordset
        $this->TotalRecords = $this->listRecordCount();
        $this->StartRecord = 1;

        // Export all
        if ($this->ExportAll) {
            if (Config("EXPORT_ALL_TIME_LIMIT") >= 0) {
                @set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
            }
            $this->DisplayRecords = $this->TotalRecords;
            $this->StopRecord = $this->TotalRecords;
        } else { // Export one page only
            $this->setupStartRecord(); // Set up start record position
            // Set the last record to display
            if ($this->DisplayRecords <= 0) {
                $this->StopRecord = $this->TotalRecords;
            } else {
                $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
            }
        }
        $rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
        $this->ExportDoc = GetExportDocument($this, "h");
        $doc = &$this->ExportDoc;
        if (!$doc) {
            $this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
        }
        if (!$rs || !$doc) {
            RemoveHeader("Content-Type"); // Remove header
            RemoveHeader("Content-Disposition");
            $this->showMessage();
            return;
        }
        $this->StartRecord = 1;
        $this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;

        // Call Page Exporting server event
        $this->ExportDoc->ExportCustom = !$this->pageExporting();
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        $doc->Text .= $header;
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        $doc->Text .= $footer;

        // Close recordset
        $rs->close();

        // Call Page Exported server event
        $this->pageExported();

        // Export header and footer
        $doc->exportHeaderAndFooter();

        // Clean output buffer (without destroying output buffer)
        $buffer = ob_get_contents(); // Save the output buffer
        if (!Config("DEBUG") && $buffer) {
            ob_clean();
        }

        // Write debug message if enabled
        if (Config("DEBUG") && !$this->isExport("pdf")) {
            echo GetDebugMessage();
        }

        // Output data
        if ($this->isExport("email")) {
            if ($return) {
                return $doc->Text; // Return email content
            } else {
                echo $this->exportEmail($doc->Text); // Send email
            }
        } else {
            $doc->export();
            if ($return) {
                RemoveHeader("Content-Type"); // Remove header
                RemoveHeader("Content-Disposition");
                $content = ob_get_contents();
                if ($content) {
                    ob_clean();
                }
                if ($buffer) {
                    echo $buffer; // Resume the output buffer
                }
                return $content;
            }
        }
    }

    // Export email
    protected function exportEmail($emailContent)
    {
        global $TempImages, $Language;
        $sender = Post("sender", "");
        $recipient = Post("recipient", "");
        $cc = Post("cc", "");
        $bcc = Post("bcc", "");

        // Subject
        $subject = Post("subject", "");
        $emailSubject = $subject;

        // Message
        $content = Post("message", "");
        $emailMessage = $content;

        // Check sender
        if ($sender == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Sender"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmail($sender)) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
        }

        // Check recipient
        if ($recipient == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Recipient"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
        }

        // Check cc
        if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
        }

        // Check bcc
        if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
        }

        // Check email sent count
        $_SESSION[Config("EXPORT_EMAIL_COUNTER")] = Session(Config("EXPORT_EMAIL_COUNTER")) ?? 0;
        if ((int)Session(Config("EXPORT_EMAIL_COUNTER")) > Config("MAX_EMAIL_SENT_COUNT")) {
            return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
        }

        // Send email
        $email = new Email();
        $email->Sender = $sender; // Sender
        $email->Recipient = $recipient; // Recipient
        $email->Cc = $cc; // Cc
        $email->Bcc = $bcc; // Bcc
        $email->Subject = $emailSubject; // Subject
        $email->Format = "html";
        if ($emailMessage != "") {
            $emailMessage = RemoveXss($emailMessage) . "<br><br>";
        }
        foreach ($TempImages as $tmpImage) {
            $email->addEmbeddedImage($tmpImage);
        }
        $email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
        $eventArgs = [];
        if ($this->Recordset) {
            $eventArgs["rs"] = &$this->Recordset;
        }
        $emailSent = false;
        if ($this->emailSending($email, $eventArgs)) {
            $emailSent = $email->send();
        }

        // Check email sent status
        if ($emailSent) {
            // Update email sent count
            $_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

            // Sent email success
            return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
        } else {
            // Sent email failure
            return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
        $Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, true);
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
                case "x_gender":
                    break;
                case "x_typeRegsisteration":
                    break;
                case "x_PaymentCategory":
                    break;
                case "x_physician_id":
                    break;
                case "x_admission_consultant_id":
                    break;
                case "x_leading_consultant_id":
                    break;
                case "x_PaymentStatus":
                    break;
                case "x_status":
                    break;
                case "x_HospID":
                    break;
                case "x_ReferedByDr":
                    break;
                case "x_ReferA4TreatingConsultant":
                    break;
                case "x_patient_id":
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

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        if ($this->isPageRequest()) { // Validate request
            $startRec = Get(Config("TABLE_START_REC"));
            $pageNo = Get(Config("TABLE_PAGE_NO"));
            if ($pageNo !== null) { // Check for "pageno" parameter first
                if (is_numeric($pageNo)) {
                    $this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
                    if ($this->StartRecord <= 0) {
                        $this->StartRecord = 1;
                    } elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1) {
                        $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1;
                    }
                    $this->setStartRecordNumber($this->StartRecord);
                }
            } elseif ($startRec !== null) { // Check for "start" parameter
                $this->StartRecord = $startRec;
                $this->setStartRecordNumber($this->StartRecord);
            }
        }
        $this->StartRecord = $this->getStartRecordNumber();

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
            $this->setStartRecordNumber($this->StartRecord);
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
            $this->setStartRecordNumber($this->StartRecord);
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

    // Row Custom Action event
    public function rowCustomAction($action, $row)
    {
        // Return false to abort
        return true;
    }

    // Page Exporting event
    // $this->ExportDoc = export document object
    public function pageExporting()
    {
        //$this->ExportDoc->Text = "my header"; // Export header
        //return false; // Return false to skip default export and use Row_Export event
        return true; // Return true to use default export and skip Row_Export event
    }

    // Row Export event
    // $this->ExportDoc = export document object
    public function rowExport($rs)
    {
        //$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
    }

    // Page Exported event
    // $this->ExportDoc = export document object
    public function pageExported()
    {
        //$this->ExportDoc->Text .= "my footer"; // Export footer
        //Log($this->ExportDoc->Text);
    }

    // Page Importing event
    public function pageImporting($reader, &$options)
    {
        //var_dump($reader); // Import data reader
        //var_dump($options); // Show all options for importing
        //return false; // Return false to skip import
        return true;
    }

    // Row Import event
    public function rowImport(&$row, $cnt)
    {
        //Log($cnt); // Import record count
        //var_dump($row); // Import row
        //return false; // Return false to skip import
        return true;
    }

    // Page Imported event
    public function pageImported($reader, $results)
    {
        //var_dump($reader); // Import data reader
        //var_dump($results); // Import results
    }
}
