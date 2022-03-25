<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewFollowupsList extends ViewFollowups
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_followups';

    // Page object name
    public $PageObjName = "ViewFollowupsList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_followupslist";
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
    public $ExportExcelCustom = true;
    public $ExportWordCustom = true;
    public $ExportPdfCustom = true;
    public $ExportEmailCustom = true;

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

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (view_followups)
        if (!isset($GLOBALS["view_followups"]) || get_class($GLOBALS["view_followups"]) == PROJECT_NAMESPACE . "view_followups") {
            $GLOBALS["view_followups"] = &$this;
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
        $this->AddUrl = "ViewFollowupsAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewFollowupsDelete";
        $this->MultiUpdateUrl = "ViewFollowupsUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_followups');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_followupslistsrch";

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
        if (Post("customexport") === null) {
             // Page Unload event
            if (method_exists($this, "pageUnload")) {
                $this->pageUnload();
            }

            // Global Page Unloaded event (in userfn*.php)
            Page_Unloaded();
        }

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            if (is_array(Session(SESSION_TEMP_IMAGES))) { // Restore temp images
                $TempImages = Session(SESSION_TEMP_IMAGES);
            }
            if (Post("data") !== null) {
                $content = Post("data");
            }
            $ExportFileName = Post("filename", "");
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("view_followups"));
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
        if ($this->CustomExport) { // Save temp images array for custom export
            if (is_array($TempImages)) {
                $_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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

        // Custom export (post back from ew.applyTemplate), export and terminate page
        if (Post("customexport") !== null) {
            $this->CustomExport = Post("customexport");
            $this->Export = $this->CustomExport;
            $this->terminate();
            return;
        }

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
        $this->PatientID->setVisibility();
        $this->title->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->dob->setVisibility();
        $this->Age->setVisibility();
        $this->blood_group->setVisibility();
        $this->mobile_no->setVisibility();
        $this->description->Visible = false;
        $this->IdentificationMark->setVisibility();
        $this->Religion->setVisibility();
        $this->Nationality->setVisibility();
        $this->profilePic->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->spouse_title->setVisibility();
        $this->spouse_first_name->setVisibility();
        $this->spouse_middle_name->setVisibility();
        $this->spouse_last_name->setVisibility();
        $this->spouse_gender->setVisibility();
        $this->spouse_dob->setVisibility();
        $this->spouse_Age->setVisibility();
        $this->spouse_blood_group->setVisibility();
        $this->spouse_mobile_no->setVisibility();
        $this->Maritalstatus->setVisibility();
        $this->Business->setVisibility();
        $this->Patient_Language->setVisibility();
        $this->Passport->setVisibility();
        $this->VisaNo->setVisibility();
        $this->ValidityOfVisa->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->street->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->country->setVisibility();
        $this->postal_code->setVisibility();
        $this->PEmail->setVisibility();
        $this->PEmergencyContact->setVisibility();
        $this->occupation->setVisibility();
        $this->spouse_occupation->setVisibility();
        $this->WhatsApp->setVisibility();
        $this->CouppleID->setVisibility();
        $this->MaleID->setVisibility();
        $this->FemaleID->setVisibility();
        $this->GroupID->setVisibility();
        $this->Relationship->setVisibility();
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
        $this->AllowAddDeleteRow = false; // Do not allow add/delete row

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_followupslistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->title->AdvancedSearch->toJson(), ","); // Field title
        $filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
        $filterList = Concat($filterList, $this->middle_name->AdvancedSearch->toJson(), ","); // Field middle_name
        $filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
        $filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
        $filterList = Concat($filterList, $this->dob->AdvancedSearch->toJson(), ","); // Field dob
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->blood_group->AdvancedSearch->toJson(), ","); // Field blood_group
        $filterList = Concat($filterList, $this->mobile_no->AdvancedSearch->toJson(), ","); // Field mobile_no
        $filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
        $filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
        $filterList = Concat($filterList, $this->Religion->AdvancedSearch->toJson(), ","); // Field Religion
        $filterList = Concat($filterList, $this->Nationality->AdvancedSearch->toJson(), ","); // Field Nationality
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->ReferedByDr->AdvancedSearch->toJson(), ","); // Field ReferedByDr
        $filterList = Concat($filterList, $this->ReferClinicname->AdvancedSearch->toJson(), ","); // Field ReferClinicname
        $filterList = Concat($filterList, $this->ReferCity->AdvancedSearch->toJson(), ","); // Field ReferCity
        $filterList = Concat($filterList, $this->ReferMobileNo->AdvancedSearch->toJson(), ","); // Field ReferMobileNo
        $filterList = Concat($filterList, $this->ReferA4TreatingConsultant->AdvancedSearch->toJson(), ","); // Field ReferA4TreatingConsultant
        $filterList = Concat($filterList, $this->PurposreReferredfor->AdvancedSearch->toJson(), ","); // Field PurposreReferredfor
        $filterList = Concat($filterList, $this->spouse_title->AdvancedSearch->toJson(), ","); // Field spouse_title
        $filterList = Concat($filterList, $this->spouse_first_name->AdvancedSearch->toJson(), ","); // Field spouse_first_name
        $filterList = Concat($filterList, $this->spouse_middle_name->AdvancedSearch->toJson(), ","); // Field spouse_middle_name
        $filterList = Concat($filterList, $this->spouse_last_name->AdvancedSearch->toJson(), ","); // Field spouse_last_name
        $filterList = Concat($filterList, $this->spouse_gender->AdvancedSearch->toJson(), ","); // Field spouse_gender
        $filterList = Concat($filterList, $this->spouse_dob->AdvancedSearch->toJson(), ","); // Field spouse_dob
        $filterList = Concat($filterList, $this->spouse_Age->AdvancedSearch->toJson(), ","); // Field spouse_Age
        $filterList = Concat($filterList, $this->spouse_blood_group->AdvancedSearch->toJson(), ","); // Field spouse_blood_group
        $filterList = Concat($filterList, $this->spouse_mobile_no->AdvancedSearch->toJson(), ","); // Field spouse_mobile_no
        $filterList = Concat($filterList, $this->Maritalstatus->AdvancedSearch->toJson(), ","); // Field Maritalstatus
        $filterList = Concat($filterList, $this->Business->AdvancedSearch->toJson(), ","); // Field Business
        $filterList = Concat($filterList, $this->Patient_Language->AdvancedSearch->toJson(), ","); // Field Patient_Language
        $filterList = Concat($filterList, $this->Passport->AdvancedSearch->toJson(), ","); // Field Passport
        $filterList = Concat($filterList, $this->VisaNo->AdvancedSearch->toJson(), ","); // Field VisaNo
        $filterList = Concat($filterList, $this->ValidityOfVisa->AdvancedSearch->toJson(), ","); // Field ValidityOfVisa
        $filterList = Concat($filterList, $this->WhereDidYouHear->AdvancedSearch->toJson(), ","); // Field WhereDidYouHear
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->street->AdvancedSearch->toJson(), ","); // Field street
        $filterList = Concat($filterList, $this->town->AdvancedSearch->toJson(), ","); // Field town
        $filterList = Concat($filterList, $this->province->AdvancedSearch->toJson(), ","); // Field province
        $filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
        $filterList = Concat($filterList, $this->postal_code->AdvancedSearch->toJson(), ","); // Field postal_code
        $filterList = Concat($filterList, $this->PEmail->AdvancedSearch->toJson(), ","); // Field PEmail
        $filterList = Concat($filterList, $this->PEmergencyContact->AdvancedSearch->toJson(), ","); // Field PEmergencyContact
        $filterList = Concat($filterList, $this->occupation->AdvancedSearch->toJson(), ","); // Field occupation
        $filterList = Concat($filterList, $this->spouse_occupation->AdvancedSearch->toJson(), ","); // Field spouse_occupation
        $filterList = Concat($filterList, $this->WhatsApp->AdvancedSearch->toJson(), ","); // Field WhatsApp
        $filterList = Concat($filterList, $this->CouppleID->AdvancedSearch->toJson(), ","); // Field CouppleID
        $filterList = Concat($filterList, $this->MaleID->AdvancedSearch->toJson(), ","); // Field MaleID
        $filterList = Concat($filterList, $this->FemaleID->AdvancedSearch->toJson(), ","); // Field FemaleID
        $filterList = Concat($filterList, $this->GroupID->AdvancedSearch->toJson(), ","); // Field GroupID
        $filterList = Concat($filterList, $this->Relationship->AdvancedSearch->toJson(), ","); // Field Relationship
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_followupslistsrch", $filters);
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

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field title
        $this->title->AdvancedSearch->SearchValue = @$filter["x_title"];
        $this->title->AdvancedSearch->SearchOperator = @$filter["z_title"];
        $this->title->AdvancedSearch->SearchCondition = @$filter["v_title"];
        $this->title->AdvancedSearch->SearchValue2 = @$filter["y_title"];
        $this->title->AdvancedSearch->SearchOperator2 = @$filter["w_title"];
        $this->title->AdvancedSearch->save();

        // Field first_name
        $this->first_name->AdvancedSearch->SearchValue = @$filter["x_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator = @$filter["z_first_name"];
        $this->first_name->AdvancedSearch->SearchCondition = @$filter["v_first_name"];
        $this->first_name->AdvancedSearch->SearchValue2 = @$filter["y_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator2 = @$filter["w_first_name"];
        $this->first_name->AdvancedSearch->save();

        // Field middle_name
        $this->middle_name->AdvancedSearch->SearchValue = @$filter["x_middle_name"];
        $this->middle_name->AdvancedSearch->SearchOperator = @$filter["z_middle_name"];
        $this->middle_name->AdvancedSearch->SearchCondition = @$filter["v_middle_name"];
        $this->middle_name->AdvancedSearch->SearchValue2 = @$filter["y_middle_name"];
        $this->middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_middle_name"];
        $this->middle_name->AdvancedSearch->save();

        // Field last_name
        $this->last_name->AdvancedSearch->SearchValue = @$filter["x_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator = @$filter["z_last_name"];
        $this->last_name->AdvancedSearch->SearchCondition = @$filter["v_last_name"];
        $this->last_name->AdvancedSearch->SearchValue2 = @$filter["y_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator2 = @$filter["w_last_name"];
        $this->last_name->AdvancedSearch->save();

        // Field gender
        $this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
        $this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
        $this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
        $this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
        $this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
        $this->gender->AdvancedSearch->save();

        // Field dob
        $this->dob->AdvancedSearch->SearchValue = @$filter["x_dob"];
        $this->dob->AdvancedSearch->SearchOperator = @$filter["z_dob"];
        $this->dob->AdvancedSearch->SearchCondition = @$filter["v_dob"];
        $this->dob->AdvancedSearch->SearchValue2 = @$filter["y_dob"];
        $this->dob->AdvancedSearch->SearchOperator2 = @$filter["w_dob"];
        $this->dob->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field blood_group
        $this->blood_group->AdvancedSearch->SearchValue = @$filter["x_blood_group"];
        $this->blood_group->AdvancedSearch->SearchOperator = @$filter["z_blood_group"];
        $this->blood_group->AdvancedSearch->SearchCondition = @$filter["v_blood_group"];
        $this->blood_group->AdvancedSearch->SearchValue2 = @$filter["y_blood_group"];
        $this->blood_group->AdvancedSearch->SearchOperator2 = @$filter["w_blood_group"];
        $this->blood_group->AdvancedSearch->save();

        // Field mobile_no
        $this->mobile_no->AdvancedSearch->SearchValue = @$filter["x_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchOperator = @$filter["z_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchCondition = @$filter["v_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchValue2 = @$filter["y_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_no"];
        $this->mobile_no->AdvancedSearch->save();

        // Field description
        $this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
        $this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
        $this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
        $this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
        $this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
        $this->description->AdvancedSearch->save();

        // Field IdentificationMark
        $this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->save();

        // Field Religion
        $this->Religion->AdvancedSearch->SearchValue = @$filter["x_Religion"];
        $this->Religion->AdvancedSearch->SearchOperator = @$filter["z_Religion"];
        $this->Religion->AdvancedSearch->SearchCondition = @$filter["v_Religion"];
        $this->Religion->AdvancedSearch->SearchValue2 = @$filter["y_Religion"];
        $this->Religion->AdvancedSearch->SearchOperator2 = @$filter["w_Religion"];
        $this->Religion->AdvancedSearch->save();

        // Field Nationality
        $this->Nationality->AdvancedSearch->SearchValue = @$filter["x_Nationality"];
        $this->Nationality->AdvancedSearch->SearchOperator = @$filter["z_Nationality"];
        $this->Nationality->AdvancedSearch->SearchCondition = @$filter["v_Nationality"];
        $this->Nationality->AdvancedSearch->SearchValue2 = @$filter["y_Nationality"];
        $this->Nationality->AdvancedSearch->SearchOperator2 = @$filter["w_Nationality"];
        $this->Nationality->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

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

        // Field spouse_title
        $this->spouse_title->AdvancedSearch->SearchValue = @$filter["x_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchOperator = @$filter["z_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchCondition = @$filter["v_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchValue2 = @$filter["y_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_title"];
        $this->spouse_title->AdvancedSearch->save();

        // Field spouse_first_name
        $this->spouse_first_name->AdvancedSearch->SearchValue = @$filter["x_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->save();

        // Field spouse_middle_name
        $this->spouse_middle_name->AdvancedSearch->SearchValue = @$filter["x_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->save();

        // Field spouse_last_name
        $this->spouse_last_name->AdvancedSearch->SearchValue = @$filter["x_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->save();

        // Field spouse_gender
        $this->spouse_gender->AdvancedSearch->SearchValue = @$filter["x_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchOperator = @$filter["z_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchCondition = @$filter["v_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchValue2 = @$filter["y_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->save();

        // Field spouse_dob
        $this->spouse_dob->AdvancedSearch->SearchValue = @$filter["x_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchOperator = @$filter["z_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchCondition = @$filter["v_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchValue2 = @$filter["y_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->save();

        // Field spouse_Age
        $this->spouse_Age->AdvancedSearch->SearchValue = @$filter["x_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchOperator = @$filter["z_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchCondition = @$filter["v_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchValue2 = @$filter["y_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->save();

        // Field spouse_blood_group
        $this->spouse_blood_group->AdvancedSearch->SearchValue = @$filter["x_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchOperator = @$filter["z_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchCondition = @$filter["v_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchValue2 = @$filter["y_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->save();

        // Field spouse_mobile_no
        $this->spouse_mobile_no->AdvancedSearch->SearchValue = @$filter["x_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchOperator = @$filter["z_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchCondition = @$filter["v_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchValue2 = @$filter["y_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->save();

        // Field Maritalstatus
        $this->Maritalstatus->AdvancedSearch->SearchValue = @$filter["x_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchOperator = @$filter["z_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchCondition = @$filter["v_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchValue2 = @$filter["y_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchOperator2 = @$filter["w_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->save();

        // Field Business
        $this->Business->AdvancedSearch->SearchValue = @$filter["x_Business"];
        $this->Business->AdvancedSearch->SearchOperator = @$filter["z_Business"];
        $this->Business->AdvancedSearch->SearchCondition = @$filter["v_Business"];
        $this->Business->AdvancedSearch->SearchValue2 = @$filter["y_Business"];
        $this->Business->AdvancedSearch->SearchOperator2 = @$filter["w_Business"];
        $this->Business->AdvancedSearch->save();

        // Field Patient_Language
        $this->Patient_Language->AdvancedSearch->SearchValue = @$filter["x_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchOperator = @$filter["z_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchCondition = @$filter["v_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchValue2 = @$filter["y_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchOperator2 = @$filter["w_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->save();

        // Field Passport
        $this->Passport->AdvancedSearch->SearchValue = @$filter["x_Passport"];
        $this->Passport->AdvancedSearch->SearchOperator = @$filter["z_Passport"];
        $this->Passport->AdvancedSearch->SearchCondition = @$filter["v_Passport"];
        $this->Passport->AdvancedSearch->SearchValue2 = @$filter["y_Passport"];
        $this->Passport->AdvancedSearch->SearchOperator2 = @$filter["w_Passport"];
        $this->Passport->AdvancedSearch->save();

        // Field VisaNo
        $this->VisaNo->AdvancedSearch->SearchValue = @$filter["x_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchOperator = @$filter["z_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchCondition = @$filter["v_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchValue2 = @$filter["y_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchOperator2 = @$filter["w_VisaNo"];
        $this->VisaNo->AdvancedSearch->save();

        // Field ValidityOfVisa
        $this->ValidityOfVisa->AdvancedSearch->SearchValue = @$filter["x_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchOperator = @$filter["z_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchCondition = @$filter["v_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchValue2 = @$filter["y_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchOperator2 = @$filter["w_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->save();

        // Field WhereDidYouHear
        $this->WhereDidYouHear->AdvancedSearch->SearchValue = @$filter["x_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchOperator = @$filter["z_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchCondition = @$filter["v_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchValue2 = @$filter["y_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchOperator2 = @$filter["w_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field street
        $this->street->AdvancedSearch->SearchValue = @$filter["x_street"];
        $this->street->AdvancedSearch->SearchOperator = @$filter["z_street"];
        $this->street->AdvancedSearch->SearchCondition = @$filter["v_street"];
        $this->street->AdvancedSearch->SearchValue2 = @$filter["y_street"];
        $this->street->AdvancedSearch->SearchOperator2 = @$filter["w_street"];
        $this->street->AdvancedSearch->save();

        // Field town
        $this->town->AdvancedSearch->SearchValue = @$filter["x_town"];
        $this->town->AdvancedSearch->SearchOperator = @$filter["z_town"];
        $this->town->AdvancedSearch->SearchCondition = @$filter["v_town"];
        $this->town->AdvancedSearch->SearchValue2 = @$filter["y_town"];
        $this->town->AdvancedSearch->SearchOperator2 = @$filter["w_town"];
        $this->town->AdvancedSearch->save();

        // Field province
        $this->province->AdvancedSearch->SearchValue = @$filter["x_province"];
        $this->province->AdvancedSearch->SearchOperator = @$filter["z_province"];
        $this->province->AdvancedSearch->SearchCondition = @$filter["v_province"];
        $this->province->AdvancedSearch->SearchValue2 = @$filter["y_province"];
        $this->province->AdvancedSearch->SearchOperator2 = @$filter["w_province"];
        $this->province->AdvancedSearch->save();

        // Field country
        $this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
        $this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
        $this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
        $this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
        $this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
        $this->country->AdvancedSearch->save();

        // Field postal_code
        $this->postal_code->AdvancedSearch->SearchValue = @$filter["x_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator = @$filter["z_postal_code"];
        $this->postal_code->AdvancedSearch->SearchCondition = @$filter["v_postal_code"];
        $this->postal_code->AdvancedSearch->SearchValue2 = @$filter["y_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator2 = @$filter["w_postal_code"];
        $this->postal_code->AdvancedSearch->save();

        // Field PEmail
        $this->PEmail->AdvancedSearch->SearchValue = @$filter["x_PEmail"];
        $this->PEmail->AdvancedSearch->SearchOperator = @$filter["z_PEmail"];
        $this->PEmail->AdvancedSearch->SearchCondition = @$filter["v_PEmail"];
        $this->PEmail->AdvancedSearch->SearchValue2 = @$filter["y_PEmail"];
        $this->PEmail->AdvancedSearch->SearchOperator2 = @$filter["w_PEmail"];
        $this->PEmail->AdvancedSearch->save();

        // Field PEmergencyContact
        $this->PEmergencyContact->AdvancedSearch->SearchValue = @$filter["x_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchOperator = @$filter["z_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchCondition = @$filter["v_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchValue2 = @$filter["y_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchOperator2 = @$filter["w_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->save();

        // Field occupation
        $this->occupation->AdvancedSearch->SearchValue = @$filter["x_occupation"];
        $this->occupation->AdvancedSearch->SearchOperator = @$filter["z_occupation"];
        $this->occupation->AdvancedSearch->SearchCondition = @$filter["v_occupation"];
        $this->occupation->AdvancedSearch->SearchValue2 = @$filter["y_occupation"];
        $this->occupation->AdvancedSearch->SearchOperator2 = @$filter["w_occupation"];
        $this->occupation->AdvancedSearch->save();

        // Field spouse_occupation
        $this->spouse_occupation->AdvancedSearch->SearchValue = @$filter["x_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchOperator = @$filter["z_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchCondition = @$filter["v_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchValue2 = @$filter["y_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->save();

        // Field WhatsApp
        $this->WhatsApp->AdvancedSearch->SearchValue = @$filter["x_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchOperator = @$filter["z_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchCondition = @$filter["v_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchValue2 = @$filter["y_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchOperator2 = @$filter["w_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->save();

        // Field CouppleID
        $this->CouppleID->AdvancedSearch->SearchValue = @$filter["x_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchOperator = @$filter["z_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchCondition = @$filter["v_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchValue2 = @$filter["y_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchOperator2 = @$filter["w_CouppleID"];
        $this->CouppleID->AdvancedSearch->save();

        // Field MaleID
        $this->MaleID->AdvancedSearch->SearchValue = @$filter["x_MaleID"];
        $this->MaleID->AdvancedSearch->SearchOperator = @$filter["z_MaleID"];
        $this->MaleID->AdvancedSearch->SearchCondition = @$filter["v_MaleID"];
        $this->MaleID->AdvancedSearch->SearchValue2 = @$filter["y_MaleID"];
        $this->MaleID->AdvancedSearch->SearchOperator2 = @$filter["w_MaleID"];
        $this->MaleID->AdvancedSearch->save();

        // Field FemaleID
        $this->FemaleID->AdvancedSearch->SearchValue = @$filter["x_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchOperator = @$filter["z_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchCondition = @$filter["v_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchValue2 = @$filter["y_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleID"];
        $this->FemaleID->AdvancedSearch->save();

        // Field GroupID
        $this->GroupID->AdvancedSearch->SearchValue = @$filter["x_GroupID"];
        $this->GroupID->AdvancedSearch->SearchOperator = @$filter["z_GroupID"];
        $this->GroupID->AdvancedSearch->SearchCondition = @$filter["v_GroupID"];
        $this->GroupID->AdvancedSearch->SearchValue2 = @$filter["y_GroupID"];
        $this->GroupID->AdvancedSearch->SearchOperator2 = @$filter["w_GroupID"];
        $this->GroupID->AdvancedSearch->save();

        // Field Relationship
        $this->Relationship->AdvancedSearch->SearchValue = @$filter["x_Relationship"];
        $this->Relationship->AdvancedSearch->SearchOperator = @$filter["z_Relationship"];
        $this->Relationship->AdvancedSearch->SearchCondition = @$filter["v_Relationship"];
        $this->Relationship->AdvancedSearch->SearchValue2 = @$filter["y_Relationship"];
        $this->Relationship->AdvancedSearch->SearchOperator2 = @$filter["w_Relationship"];
        $this->Relationship->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->title, $default, false); // title
        $this->buildSearchSql($where, $this->first_name, $default, false); // first_name
        $this->buildSearchSql($where, $this->middle_name, $default, false); // middle_name
        $this->buildSearchSql($where, $this->last_name, $default, false); // last_name
        $this->buildSearchSql($where, $this->gender, $default, false); // gender
        $this->buildSearchSql($where, $this->dob, $default, false); // dob
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->blood_group, $default, false); // blood_group
        $this->buildSearchSql($where, $this->mobile_no, $default, false); // mobile_no
        $this->buildSearchSql($where, $this->description, $default, false); // description
        $this->buildSearchSql($where, $this->IdentificationMark, $default, false); // IdentificationMark
        $this->buildSearchSql($where, $this->Religion, $default, false); // Religion
        $this->buildSearchSql($where, $this->Nationality, $default, false); // Nationality
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->ReferedByDr, $default, false); // ReferedByDr
        $this->buildSearchSql($where, $this->ReferClinicname, $default, false); // ReferClinicname
        $this->buildSearchSql($where, $this->ReferCity, $default, false); // ReferCity
        $this->buildSearchSql($where, $this->ReferMobileNo, $default, false); // ReferMobileNo
        $this->buildSearchSql($where, $this->ReferA4TreatingConsultant, $default, false); // ReferA4TreatingConsultant
        $this->buildSearchSql($where, $this->PurposreReferredfor, $default, false); // PurposreReferredfor
        $this->buildSearchSql($where, $this->spouse_title, $default, false); // spouse_title
        $this->buildSearchSql($where, $this->spouse_first_name, $default, false); // spouse_first_name
        $this->buildSearchSql($where, $this->spouse_middle_name, $default, false); // spouse_middle_name
        $this->buildSearchSql($where, $this->spouse_last_name, $default, false); // spouse_last_name
        $this->buildSearchSql($where, $this->spouse_gender, $default, false); // spouse_gender
        $this->buildSearchSql($where, $this->spouse_dob, $default, false); // spouse_dob
        $this->buildSearchSql($where, $this->spouse_Age, $default, false); // spouse_Age
        $this->buildSearchSql($where, $this->spouse_blood_group, $default, false); // spouse_blood_group
        $this->buildSearchSql($where, $this->spouse_mobile_no, $default, false); // spouse_mobile_no
        $this->buildSearchSql($where, $this->Maritalstatus, $default, false); // Maritalstatus
        $this->buildSearchSql($where, $this->Business, $default, false); // Business
        $this->buildSearchSql($where, $this->Patient_Language, $default, false); // Patient_Language
        $this->buildSearchSql($where, $this->Passport, $default, false); // Passport
        $this->buildSearchSql($where, $this->VisaNo, $default, false); // VisaNo
        $this->buildSearchSql($where, $this->ValidityOfVisa, $default, false); // ValidityOfVisa
        $this->buildSearchSql($where, $this->WhereDidYouHear, $default, false); // WhereDidYouHear
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->street, $default, false); // street
        $this->buildSearchSql($where, $this->town, $default, false); // town
        $this->buildSearchSql($where, $this->province, $default, false); // province
        $this->buildSearchSql($where, $this->country, $default, false); // country
        $this->buildSearchSql($where, $this->postal_code, $default, false); // postal_code
        $this->buildSearchSql($where, $this->PEmail, $default, false); // PEmail
        $this->buildSearchSql($where, $this->PEmergencyContact, $default, false); // PEmergencyContact
        $this->buildSearchSql($where, $this->occupation, $default, false); // occupation
        $this->buildSearchSql($where, $this->spouse_occupation, $default, false); // spouse_occupation
        $this->buildSearchSql($where, $this->WhatsApp, $default, false); // WhatsApp
        $this->buildSearchSql($where, $this->CouppleID, $default, false); // CouppleID
        $this->buildSearchSql($where, $this->MaleID, $default, false); // MaleID
        $this->buildSearchSql($where, $this->FemaleID, $default, false); // FemaleID
        $this->buildSearchSql($where, $this->GroupID, $default, false); // GroupID
        $this->buildSearchSql($where, $this->Relationship, $default, false); // Relationship

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->title->AdvancedSearch->save(); // title
            $this->first_name->AdvancedSearch->save(); // first_name
            $this->middle_name->AdvancedSearch->save(); // middle_name
            $this->last_name->AdvancedSearch->save(); // last_name
            $this->gender->AdvancedSearch->save(); // gender
            $this->dob->AdvancedSearch->save(); // dob
            $this->Age->AdvancedSearch->save(); // Age
            $this->blood_group->AdvancedSearch->save(); // blood_group
            $this->mobile_no->AdvancedSearch->save(); // mobile_no
            $this->description->AdvancedSearch->save(); // description
            $this->IdentificationMark->AdvancedSearch->save(); // IdentificationMark
            $this->Religion->AdvancedSearch->save(); // Religion
            $this->Nationality->AdvancedSearch->save(); // Nationality
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->ReferedByDr->AdvancedSearch->save(); // ReferedByDr
            $this->ReferClinicname->AdvancedSearch->save(); // ReferClinicname
            $this->ReferCity->AdvancedSearch->save(); // ReferCity
            $this->ReferMobileNo->AdvancedSearch->save(); // ReferMobileNo
            $this->ReferA4TreatingConsultant->AdvancedSearch->save(); // ReferA4TreatingConsultant
            $this->PurposreReferredfor->AdvancedSearch->save(); // PurposreReferredfor
            $this->spouse_title->AdvancedSearch->save(); // spouse_title
            $this->spouse_first_name->AdvancedSearch->save(); // spouse_first_name
            $this->spouse_middle_name->AdvancedSearch->save(); // spouse_middle_name
            $this->spouse_last_name->AdvancedSearch->save(); // spouse_last_name
            $this->spouse_gender->AdvancedSearch->save(); // spouse_gender
            $this->spouse_dob->AdvancedSearch->save(); // spouse_dob
            $this->spouse_Age->AdvancedSearch->save(); // spouse_Age
            $this->spouse_blood_group->AdvancedSearch->save(); // spouse_blood_group
            $this->spouse_mobile_no->AdvancedSearch->save(); // spouse_mobile_no
            $this->Maritalstatus->AdvancedSearch->save(); // Maritalstatus
            $this->Business->AdvancedSearch->save(); // Business
            $this->Patient_Language->AdvancedSearch->save(); // Patient_Language
            $this->Passport->AdvancedSearch->save(); // Passport
            $this->VisaNo->AdvancedSearch->save(); // VisaNo
            $this->ValidityOfVisa->AdvancedSearch->save(); // ValidityOfVisa
            $this->WhereDidYouHear->AdvancedSearch->save(); // WhereDidYouHear
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->street->AdvancedSearch->save(); // street
            $this->town->AdvancedSearch->save(); // town
            $this->province->AdvancedSearch->save(); // province
            $this->country->AdvancedSearch->save(); // country
            $this->postal_code->AdvancedSearch->save(); // postal_code
            $this->PEmail->AdvancedSearch->save(); // PEmail
            $this->PEmergencyContact->AdvancedSearch->save(); // PEmergencyContact
            $this->occupation->AdvancedSearch->save(); // occupation
            $this->spouse_occupation->AdvancedSearch->save(); // spouse_occupation
            $this->WhatsApp->AdvancedSearch->save(); // WhatsApp
            $this->CouppleID->AdvancedSearch->save(); // CouppleID
            $this->MaleID->AdvancedSearch->save(); // MaleID
            $this->FemaleID->AdvancedSearch->save(); // FemaleID
            $this->GroupID->AdvancedSearch->save(); // GroupID
            $this->Relationship->AdvancedSearch->save(); // Relationship
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
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->middle_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->blood_group, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobile_no, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Religion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Nationality, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferedByDr, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferClinicname, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferCity, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferMobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferA4TreatingConsultant, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PurposreReferredfor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_title, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_first_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_middle_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_last_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_blood_group, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_mobile_no, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Maritalstatus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Business, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Patient_Language, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Passport, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VisaNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ValidityOfVisa, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WhereDidYouHear, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->street, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->town, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->province, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->country, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->postal_code, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PEmail, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PEmergencyContact, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->occupation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_occupation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WhatsApp, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Relationship, $arKeywords, $type);
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
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->title->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->first_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->middle_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->last_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->dob->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->blood_group->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mobile_no->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->description->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IdentificationMark->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Religion->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Nationality->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->profilePic->AdvancedSearch->issetSession()) {
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
        if ($this->spouse_title->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_first_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_middle_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_last_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_dob->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_blood_group->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_mobile_no->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Maritalstatus->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Business->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Patient_Language->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Passport->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->VisaNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ValidityOfVisa->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WhereDidYouHear->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->street->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->town->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->province->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->country->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->postal_code->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PEmail->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PEmergencyContact->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->occupation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->spouse_occupation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WhatsApp->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CouppleID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MaleID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FemaleID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GroupID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Relationship->AdvancedSearch->issetSession()) {
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
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->title->AdvancedSearch->unsetSession();
                $this->first_name->AdvancedSearch->unsetSession();
                $this->middle_name->AdvancedSearch->unsetSession();
                $this->last_name->AdvancedSearch->unsetSession();
                $this->gender->AdvancedSearch->unsetSession();
                $this->dob->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->blood_group->AdvancedSearch->unsetSession();
                $this->mobile_no->AdvancedSearch->unsetSession();
                $this->description->AdvancedSearch->unsetSession();
                $this->IdentificationMark->AdvancedSearch->unsetSession();
                $this->Religion->AdvancedSearch->unsetSession();
                $this->Nationality->AdvancedSearch->unsetSession();
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->ReferedByDr->AdvancedSearch->unsetSession();
                $this->ReferClinicname->AdvancedSearch->unsetSession();
                $this->ReferCity->AdvancedSearch->unsetSession();
                $this->ReferMobileNo->AdvancedSearch->unsetSession();
                $this->ReferA4TreatingConsultant->AdvancedSearch->unsetSession();
                $this->PurposreReferredfor->AdvancedSearch->unsetSession();
                $this->spouse_title->AdvancedSearch->unsetSession();
                $this->spouse_first_name->AdvancedSearch->unsetSession();
                $this->spouse_middle_name->AdvancedSearch->unsetSession();
                $this->spouse_last_name->AdvancedSearch->unsetSession();
                $this->spouse_gender->AdvancedSearch->unsetSession();
                $this->spouse_dob->AdvancedSearch->unsetSession();
                $this->spouse_Age->AdvancedSearch->unsetSession();
                $this->spouse_blood_group->AdvancedSearch->unsetSession();
                $this->spouse_mobile_no->AdvancedSearch->unsetSession();
                $this->Maritalstatus->AdvancedSearch->unsetSession();
                $this->Business->AdvancedSearch->unsetSession();
                $this->Patient_Language->AdvancedSearch->unsetSession();
                $this->Passport->AdvancedSearch->unsetSession();
                $this->VisaNo->AdvancedSearch->unsetSession();
                $this->ValidityOfVisa->AdvancedSearch->unsetSession();
                $this->WhereDidYouHear->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->street->AdvancedSearch->unsetSession();
                $this->town->AdvancedSearch->unsetSession();
                $this->province->AdvancedSearch->unsetSession();
                $this->country->AdvancedSearch->unsetSession();
                $this->postal_code->AdvancedSearch->unsetSession();
                $this->PEmail->AdvancedSearch->unsetSession();
                $this->PEmergencyContact->AdvancedSearch->unsetSession();
                $this->occupation->AdvancedSearch->unsetSession();
                $this->spouse_occupation->AdvancedSearch->unsetSession();
                $this->WhatsApp->AdvancedSearch->unsetSession();
                $this->CouppleID->AdvancedSearch->unsetSession();
                $this->MaleID->AdvancedSearch->unsetSession();
                $this->FemaleID->AdvancedSearch->unsetSession();
                $this->GroupID->AdvancedSearch->unsetSession();
                $this->Relationship->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->title->AdvancedSearch->load();
                $this->first_name->AdvancedSearch->load();
                $this->middle_name->AdvancedSearch->load();
                $this->last_name->AdvancedSearch->load();
                $this->gender->AdvancedSearch->load();
                $this->dob->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->blood_group->AdvancedSearch->load();
                $this->mobile_no->AdvancedSearch->load();
                $this->description->AdvancedSearch->load();
                $this->IdentificationMark->AdvancedSearch->load();
                $this->Religion->AdvancedSearch->load();
                $this->Nationality->AdvancedSearch->load();
                $this->profilePic->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->ReferedByDr->AdvancedSearch->load();
                $this->ReferClinicname->AdvancedSearch->load();
                $this->ReferCity->AdvancedSearch->load();
                $this->ReferMobileNo->AdvancedSearch->load();
                $this->ReferA4TreatingConsultant->AdvancedSearch->load();
                $this->PurposreReferredfor->AdvancedSearch->load();
                $this->spouse_title->AdvancedSearch->load();
                $this->spouse_first_name->AdvancedSearch->load();
                $this->spouse_middle_name->AdvancedSearch->load();
                $this->spouse_last_name->AdvancedSearch->load();
                $this->spouse_gender->AdvancedSearch->load();
                $this->spouse_dob->AdvancedSearch->load();
                $this->spouse_Age->AdvancedSearch->load();
                $this->spouse_blood_group->AdvancedSearch->load();
                $this->spouse_mobile_no->AdvancedSearch->load();
                $this->Maritalstatus->AdvancedSearch->load();
                $this->Business->AdvancedSearch->load();
                $this->Patient_Language->AdvancedSearch->load();
                $this->Passport->AdvancedSearch->load();
                $this->VisaNo->AdvancedSearch->load();
                $this->ValidityOfVisa->AdvancedSearch->load();
                $this->WhereDidYouHear->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->street->AdvancedSearch->load();
                $this->town->AdvancedSearch->load();
                $this->province->AdvancedSearch->load();
                $this->country->AdvancedSearch->load();
                $this->postal_code->AdvancedSearch->load();
                $this->PEmail->AdvancedSearch->load();
                $this->PEmergencyContact->AdvancedSearch->load();
                $this->occupation->AdvancedSearch->load();
                $this->spouse_occupation->AdvancedSearch->load();
                $this->WhatsApp->AdvancedSearch->load();
                $this->CouppleID->AdvancedSearch->load();
                $this->MaleID->AdvancedSearch->load();
                $this->FemaleID->AdvancedSearch->load();
                $this->GroupID->AdvancedSearch->load();
                $this->Relationship->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->title); // title
            $this->updateSort($this->first_name); // first_name
            $this->updateSort($this->middle_name); // middle_name
            $this->updateSort($this->last_name); // last_name
            $this->updateSort($this->gender); // gender
            $this->updateSort($this->dob); // dob
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->blood_group); // blood_group
            $this->updateSort($this->mobile_no); // mobile_no
            $this->updateSort($this->IdentificationMark); // IdentificationMark
            $this->updateSort($this->Religion); // Religion
            $this->updateSort($this->Nationality); // Nationality
            $this->updateSort($this->profilePic); // profilePic
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->ReferedByDr); // ReferedByDr
            $this->updateSort($this->ReferClinicname); // ReferClinicname
            $this->updateSort($this->ReferCity); // ReferCity
            $this->updateSort($this->ReferMobileNo); // ReferMobileNo
            $this->updateSort($this->ReferA4TreatingConsultant); // ReferA4TreatingConsultant
            $this->updateSort($this->PurposreReferredfor); // PurposreReferredfor
            $this->updateSort($this->spouse_title); // spouse_title
            $this->updateSort($this->spouse_first_name); // spouse_first_name
            $this->updateSort($this->spouse_middle_name); // spouse_middle_name
            $this->updateSort($this->spouse_last_name); // spouse_last_name
            $this->updateSort($this->spouse_gender); // spouse_gender
            $this->updateSort($this->spouse_dob); // spouse_dob
            $this->updateSort($this->spouse_Age); // spouse_Age
            $this->updateSort($this->spouse_blood_group); // spouse_blood_group
            $this->updateSort($this->spouse_mobile_no); // spouse_mobile_no
            $this->updateSort($this->Maritalstatus); // Maritalstatus
            $this->updateSort($this->Business); // Business
            $this->updateSort($this->Patient_Language); // Patient_Language
            $this->updateSort($this->Passport); // Passport
            $this->updateSort($this->VisaNo); // VisaNo
            $this->updateSort($this->ValidityOfVisa); // ValidityOfVisa
            $this->updateSort($this->WhereDidYouHear); // WhereDidYouHear
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->street); // street
            $this->updateSort($this->town); // town
            $this->updateSort($this->province); // province
            $this->updateSort($this->country); // country
            $this->updateSort($this->postal_code); // postal_code
            $this->updateSort($this->PEmail); // PEmail
            $this->updateSort($this->PEmergencyContact); // PEmergencyContact
            $this->updateSort($this->occupation); // occupation
            $this->updateSort($this->spouse_occupation); // spouse_occupation
            $this->updateSort($this->WhatsApp); // WhatsApp
            $this->updateSort($this->CouppleID); // CouppleID
            $this->updateSort($this->MaleID); // MaleID
            $this->updateSort($this->FemaleID); // FemaleID
            $this->updateSort($this->GroupID); // GroupID
            $this->updateSort($this->Relationship); // Relationship
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
                $this->id->setSort("");
                $this->PatientID->setSort("");
                $this->title->setSort("");
                $this->first_name->setSort("");
                $this->middle_name->setSort("");
                $this->last_name->setSort("");
                $this->gender->setSort("");
                $this->dob->setSort("");
                $this->Age->setSort("");
                $this->blood_group->setSort("");
                $this->mobile_no->setSort("");
                $this->description->setSort("");
                $this->IdentificationMark->setSort("");
                $this->Religion->setSort("");
                $this->Nationality->setSort("");
                $this->profilePic->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->ReferedByDr->setSort("");
                $this->ReferClinicname->setSort("");
                $this->ReferCity->setSort("");
                $this->ReferMobileNo->setSort("");
                $this->ReferA4TreatingConsultant->setSort("");
                $this->PurposreReferredfor->setSort("");
                $this->spouse_title->setSort("");
                $this->spouse_first_name->setSort("");
                $this->spouse_middle_name->setSort("");
                $this->spouse_last_name->setSort("");
                $this->spouse_gender->setSort("");
                $this->spouse_dob->setSort("");
                $this->spouse_Age->setSort("");
                $this->spouse_blood_group->setSort("");
                $this->spouse_mobile_no->setSort("");
                $this->Maritalstatus->setSort("");
                $this->Business->setSort("");
                $this->Patient_Language->setSort("");
                $this->Passport->setSort("");
                $this->VisaNo->setSort("");
                $this->ValidityOfVisa->setSort("");
                $this->WhereDidYouHear->setSort("");
                $this->HospID->setSort("");
                $this->street->setSort("");
                $this->town->setSort("");
                $this->province->setSort("");
                $this->country->setSort("");
                $this->postal_code->setSort("");
                $this->PEmail->setSort("");
                $this->PEmergencyContact->setSort("");
                $this->occupation->setSort("");
                $this->spouse_occupation->setSort("");
                $this->WhatsApp->setSort("");
                $this->CouppleID->setSort("");
                $this->MaleID->setSort("");
                $this->FemaleID->setSort("");
                $this->GroupID->setSort("");
                $this->Relationship->setSort("");
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
        if ($this->CurrentMode == "view") { // View mode
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_followupslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_followupslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_followupslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // PatientID
        if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // title
        if (!$this->isAddOrEdit() && $this->title->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->title->AdvancedSearch->SearchValue != "" || $this->title->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // first_name
        if (!$this->isAddOrEdit() && $this->first_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->first_name->AdvancedSearch->SearchValue != "" || $this->first_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // middle_name
        if (!$this->isAddOrEdit() && $this->middle_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->middle_name->AdvancedSearch->SearchValue != "" || $this->middle_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // last_name
        if (!$this->isAddOrEdit() && $this->last_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->last_name->AdvancedSearch->SearchValue != "" || $this->last_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // dob
        if (!$this->isAddOrEdit() && $this->dob->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->dob->AdvancedSearch->SearchValue != "" || $this->dob->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Age
        if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // blood_group
        if (!$this->isAddOrEdit() && $this->blood_group->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->blood_group->AdvancedSearch->SearchValue != "" || $this->blood_group->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mobile_no
        if (!$this->isAddOrEdit() && $this->mobile_no->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mobile_no->AdvancedSearch->SearchValue != "" || $this->mobile_no->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // description
        if (!$this->isAddOrEdit() && $this->description->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->description->AdvancedSearch->SearchValue != "" || $this->description->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IdentificationMark
        if (!$this->isAddOrEdit() && $this->IdentificationMark->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IdentificationMark->AdvancedSearch->SearchValue != "" || $this->IdentificationMark->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Religion
        if (!$this->isAddOrEdit() && $this->Religion->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Religion->AdvancedSearch->SearchValue != "" || $this->Religion->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Nationality
        if (!$this->isAddOrEdit() && $this->Nationality->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Nationality->AdvancedSearch->SearchValue != "" || $this->Nationality->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // spouse_title
        if (!$this->isAddOrEdit() && $this->spouse_title->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_title->AdvancedSearch->SearchValue != "" || $this->spouse_title->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_first_name
        if (!$this->isAddOrEdit() && $this->spouse_first_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_first_name->AdvancedSearch->SearchValue != "" || $this->spouse_first_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_middle_name
        if (!$this->isAddOrEdit() && $this->spouse_middle_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_middle_name->AdvancedSearch->SearchValue != "" || $this->spouse_middle_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_last_name
        if (!$this->isAddOrEdit() && $this->spouse_last_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_last_name->AdvancedSearch->SearchValue != "" || $this->spouse_last_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_gender
        if (!$this->isAddOrEdit() && $this->spouse_gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_gender->AdvancedSearch->SearchValue != "" || $this->spouse_gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_dob
        if (!$this->isAddOrEdit() && $this->spouse_dob->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_dob->AdvancedSearch->SearchValue != "" || $this->spouse_dob->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_Age
        if (!$this->isAddOrEdit() && $this->spouse_Age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_Age->AdvancedSearch->SearchValue != "" || $this->spouse_Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_blood_group
        if (!$this->isAddOrEdit() && $this->spouse_blood_group->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_blood_group->AdvancedSearch->SearchValue != "" || $this->spouse_blood_group->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_mobile_no
        if (!$this->isAddOrEdit() && $this->spouse_mobile_no->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_mobile_no->AdvancedSearch->SearchValue != "" || $this->spouse_mobile_no->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Maritalstatus
        if (!$this->isAddOrEdit() && $this->Maritalstatus->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Maritalstatus->AdvancedSearch->SearchValue != "" || $this->Maritalstatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Business
        if (!$this->isAddOrEdit() && $this->Business->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Business->AdvancedSearch->SearchValue != "" || $this->Business->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Patient_Language
        if (!$this->isAddOrEdit() && $this->Patient_Language->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Patient_Language->AdvancedSearch->SearchValue != "" || $this->Patient_Language->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Passport
        if (!$this->isAddOrEdit() && $this->Passport->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Passport->AdvancedSearch->SearchValue != "" || $this->Passport->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // VisaNo
        if (!$this->isAddOrEdit() && $this->VisaNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->VisaNo->AdvancedSearch->SearchValue != "" || $this->VisaNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ValidityOfVisa
        if (!$this->isAddOrEdit() && $this->ValidityOfVisa->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ValidityOfVisa->AdvancedSearch->SearchValue != "" || $this->ValidityOfVisa->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WhereDidYouHear
        if (!$this->isAddOrEdit() && $this->WhereDidYouHear->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WhereDidYouHear->AdvancedSearch->SearchValue != "" || $this->WhereDidYouHear->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // street
        if (!$this->isAddOrEdit() && $this->street->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->street->AdvancedSearch->SearchValue != "" || $this->street->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // town
        if (!$this->isAddOrEdit() && $this->town->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->town->AdvancedSearch->SearchValue != "" || $this->town->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // province
        if (!$this->isAddOrEdit() && $this->province->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->province->AdvancedSearch->SearchValue != "" || $this->province->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // country
        if (!$this->isAddOrEdit() && $this->country->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->country->AdvancedSearch->SearchValue != "" || $this->country->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // postal_code
        if (!$this->isAddOrEdit() && $this->postal_code->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->postal_code->AdvancedSearch->SearchValue != "" || $this->postal_code->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PEmail
        if (!$this->isAddOrEdit() && $this->PEmail->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PEmail->AdvancedSearch->SearchValue != "" || $this->PEmail->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PEmergencyContact
        if (!$this->isAddOrEdit() && $this->PEmergencyContact->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PEmergencyContact->AdvancedSearch->SearchValue != "" || $this->PEmergencyContact->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // occupation
        if (!$this->isAddOrEdit() && $this->occupation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->occupation->AdvancedSearch->SearchValue != "" || $this->occupation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // spouse_occupation
        if (!$this->isAddOrEdit() && $this->spouse_occupation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->spouse_occupation->AdvancedSearch->SearchValue != "" || $this->spouse_occupation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WhatsApp
        if (!$this->isAddOrEdit() && $this->WhatsApp->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WhatsApp->AdvancedSearch->SearchValue != "" || $this->WhatsApp->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CouppleID
        if (!$this->isAddOrEdit() && $this->CouppleID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CouppleID->AdvancedSearch->SearchValue != "" || $this->CouppleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MaleID
        if (!$this->isAddOrEdit() && $this->MaleID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MaleID->AdvancedSearch->SearchValue != "" || $this->MaleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FemaleID
        if (!$this->isAddOrEdit() && $this->FemaleID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FemaleID->AdvancedSearch->SearchValue != "" || $this->FemaleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GroupID
        if (!$this->isAddOrEdit() && $this->GroupID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GroupID->AdvancedSearch->SearchValue != "" || $this->GroupID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Relationship
        if (!$this->isAddOrEdit() && $this->Relationship->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Relationship->AdvancedSearch->SearchValue != "" || $this->Relationship->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->Age->setDbValue($row['Age']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->spouse_title->setDbValue($row['spouse_title']);
        $this->spouse_first_name->setDbValue($row['spouse_first_name']);
        $this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
        $this->spouse_last_name->setDbValue($row['spouse_last_name']);
        $this->spouse_gender->setDbValue($row['spouse_gender']);
        $this->spouse_dob->setDbValue($row['spouse_dob']);
        $this->spouse_Age->setDbValue($row['spouse_Age']);
        $this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
        $this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
        $this->Maritalstatus->setDbValue($row['Maritalstatus']);
        $this->Business->setDbValue($row['Business']);
        $this->Patient_Language->setDbValue($row['Patient_Language']);
        $this->Passport->setDbValue($row['Passport']);
        $this->VisaNo->setDbValue($row['VisaNo']);
        $this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->street->setDbValue($row['street']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->country->setDbValue($row['country']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->PEmail->setDbValue($row['PEmail']);
        $this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
        $this->occupation->setDbValue($row['occupation']);
        $this->spouse_occupation->setDbValue($row['spouse_occupation']);
        $this->WhatsApp->setDbValue($row['WhatsApp']);
        $this->CouppleID->setDbValue($row['CouppleID']);
        $this->MaleID->setDbValue($row['MaleID']);
        $this->FemaleID->setDbValue($row['FemaleID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->Relationship->setDbValue($row['Relationship']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatientID'] = null;
        $row['title'] = null;
        $row['first_name'] = null;
        $row['middle_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['dob'] = null;
        $row['Age'] = null;
        $row['blood_group'] = null;
        $row['mobile_no'] = null;
        $row['description'] = null;
        $row['IdentificationMark'] = null;
        $row['Religion'] = null;
        $row['Nationality'] = null;
        $row['profilePic'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['spouse_title'] = null;
        $row['spouse_first_name'] = null;
        $row['spouse_middle_name'] = null;
        $row['spouse_last_name'] = null;
        $row['spouse_gender'] = null;
        $row['spouse_dob'] = null;
        $row['spouse_Age'] = null;
        $row['spouse_blood_group'] = null;
        $row['spouse_mobile_no'] = null;
        $row['Maritalstatus'] = null;
        $row['Business'] = null;
        $row['Patient_Language'] = null;
        $row['Passport'] = null;
        $row['VisaNo'] = null;
        $row['ValidityOfVisa'] = null;
        $row['WhereDidYouHear'] = null;
        $row['HospID'] = null;
        $row['street'] = null;
        $row['town'] = null;
        $row['province'] = null;
        $row['country'] = null;
        $row['postal_code'] = null;
        $row['PEmail'] = null;
        $row['PEmergencyContact'] = null;
        $row['occupation'] = null;
        $row['spouse_occupation'] = null;
        $row['WhatsApp'] = null;
        $row['CouppleID'] = null;
        $row['MaleID'] = null;
        $row['FemaleID'] = null;
        $row['GroupID'] = null;
        $row['Relationship'] = null;
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // PatientID

        // title

        // first_name

        // middle_name

        // last_name

        // gender

        // dob

        // Age

        // blood_group

        // mobile_no

        // description

        // IdentificationMark

        // Religion

        // Nationality

        // profilePic

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // spouse_title

        // spouse_first_name

        // spouse_middle_name

        // spouse_last_name

        // spouse_gender

        // spouse_dob

        // spouse_Age

        // spouse_blood_group

        // spouse_mobile_no

        // Maritalstatus

        // Business

        // Patient_Language

        // Passport

        // VisaNo

        // ValidityOfVisa

        // WhereDidYouHear

        // HospID

        // street

        // town

        // province

        // country

        // postal_code

        // PEmail

        // PEmergencyContact

        // occupation

        // spouse_occupation

        // WhatsApp

        // CouppleID

        // MaleID

        // FemaleID

        // GroupID

        // Relationship
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // title
            $this->title->ViewValue = $this->title->CurrentValue;
            $this->title->ViewValue = FormatNumber($this->title->ViewValue, 0, -2, -2, -2);
            $this->title->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // dob
            $this->dob->ViewValue = $this->dob->CurrentValue;
            $this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
            $this->dob->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // blood_group
            $this->blood_group->ViewValue = $this->blood_group->CurrentValue;
            $this->blood_group->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Nationality
            $this->Nationality->ViewValue = $this->Nationality->CurrentValue;
            $this->Nationality->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

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

            // ReferedByDr
            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
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
            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // spouse_title
            $this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
            $this->spouse_title->ViewCustomAttributes = "";

            // spouse_first_name
            $this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
            $this->spouse_first_name->ViewCustomAttributes = "";

            // spouse_middle_name
            $this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
            $this->spouse_middle_name->ViewCustomAttributes = "";

            // spouse_last_name
            $this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
            $this->spouse_last_name->ViewCustomAttributes = "";

            // spouse_gender
            $this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
            $this->spouse_gender->ViewCustomAttributes = "";

            // spouse_dob
            $this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
            $this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 0);
            $this->spouse_dob->ViewCustomAttributes = "";

            // spouse_Age
            $this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
            $this->spouse_Age->ViewCustomAttributes = "";

            // spouse_blood_group
            $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
            $this->spouse_blood_group->ViewCustomAttributes = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
            $this->spouse_mobile_no->ViewCustomAttributes = "";

            // Maritalstatus
            $this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
            $this->Maritalstatus->ViewCustomAttributes = "";

            // Business
            $this->Business->ViewValue = $this->Business->CurrentValue;
            $this->Business->ViewCustomAttributes = "";

            // Patient_Language
            $this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
            $this->Patient_Language->ViewCustomAttributes = "";

            // Passport
            $this->Passport->ViewValue = $this->Passport->CurrentValue;
            $this->Passport->ViewCustomAttributes = "";

            // VisaNo
            $this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
            $this->VisaNo->ViewCustomAttributes = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
            $this->ValidityOfVisa->ViewCustomAttributes = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // PEmail
            $this->PEmail->ViewValue = $this->PEmail->CurrentValue;
            $this->PEmail->ViewCustomAttributes = "";

            // PEmergencyContact
            $this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
            $this->PEmergencyContact->ViewCustomAttributes = "";

            // occupation
            $this->occupation->ViewValue = $this->occupation->CurrentValue;
            $this->occupation->ViewCustomAttributes = "";

            // spouse_occupation
            $this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
            $this->spouse_occupation->ViewCustomAttributes = "";

            // WhatsApp
            $this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
            $this->WhatsApp->ViewCustomAttributes = "";

            // CouppleID
            $this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
            $this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
            $this->CouppleID->ViewCustomAttributes = "";

            // MaleID
            $this->MaleID->ViewValue = $this->MaleID->CurrentValue;
            $this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
            $this->MaleID->ViewCustomAttributes = "";

            // FemaleID
            $this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
            $this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
            $this->FemaleID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // Relationship
            $this->Relationship->ViewValue = $this->Relationship->CurrentValue;
            $this->Relationship->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientID->ViewValue = $this->highlightValue($this->PatientID);
            }

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->first_name->ViewValue = $this->highlightValue($this->first_name);
            }

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->middle_name->ViewValue = $this->highlightValue($this->middle_name);
            }

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->last_name->ViewValue = $this->highlightValue($this->last_name);
            }

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";
            if (!$this->isExport()) {
                $this->gender->ViewValue = $this->highlightValue($this->gender);
            }

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";
            $this->dob->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Age->ViewValue = $this->highlightValue($this->Age);
            }

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";
            $this->blood_group->TooltipValue = "";
            if (!$this->isExport()) {
                $this->blood_group->ViewValue = $this->highlightValue($this->blood_group);
            }

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";
            if (!$this->isExport()) {
                $this->mobile_no->ViewValue = $this->highlightValue($this->mobile_no);
            }

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IdentificationMark->ViewValue = $this->highlightValue($this->IdentificationMark);
            }

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Religion->ViewValue = $this->highlightValue($this->Religion);
            }

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";
            $this->Nationality->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Nationality->ViewValue = $this->highlightValue($this->Nationality);
            }

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";
            if (!$this->isExport()) {
                $this->profilePic->ViewValue = $this->highlightValue($this->profilePic);
            }

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

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";
            $this->spouse_title->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_title->ViewValue = $this->highlightValue($this->spouse_title);
            }

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";
            $this->spouse_first_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_first_name->ViewValue = $this->highlightValue($this->spouse_first_name);
            }

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";
            $this->spouse_middle_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_middle_name->ViewValue = $this->highlightValue($this->spouse_middle_name);
            }

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";
            $this->spouse_last_name->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_last_name->ViewValue = $this->highlightValue($this->spouse_last_name);
            }

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";
            $this->spouse_gender->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_gender->ViewValue = $this->highlightValue($this->spouse_gender);
            }

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";
            $this->spouse_dob->TooltipValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";
            $this->spouse_Age->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_Age->ViewValue = $this->highlightValue($this->spouse_Age);
            }

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";
            $this->spouse_blood_group->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_blood_group->ViewValue = $this->highlightValue($this->spouse_blood_group);
            }

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";
            $this->spouse_mobile_no->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_mobile_no->ViewValue = $this->highlightValue($this->spouse_mobile_no);
            }

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";
            $this->Maritalstatus->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Maritalstatus->ViewValue = $this->highlightValue($this->Maritalstatus);
            }

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";
            $this->Business->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Business->ViewValue = $this->highlightValue($this->Business);
            }

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";
            $this->Patient_Language->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Patient_Language->ViewValue = $this->highlightValue($this->Patient_Language);
            }

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";
            $this->Passport->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Passport->ViewValue = $this->highlightValue($this->Passport);
            }

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";
            $this->VisaNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->VisaNo->ViewValue = $this->highlightValue($this->VisaNo);
            }

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";
            $this->ValidityOfVisa->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ValidityOfVisa->ViewValue = $this->highlightValue($this->ValidityOfVisa);
            }

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WhereDidYouHear->ViewValue = $this->highlightValue($this->WhereDidYouHear);
            }

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HospID->ViewValue = $this->highlightValue($this->HospID);
            }

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";
            if (!$this->isExport()) {
                $this->street->ViewValue = $this->highlightValue($this->street);
            }

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";
            if (!$this->isExport()) {
                $this->town->ViewValue = $this->highlightValue($this->town);
            }

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";
            if (!$this->isExport()) {
                $this->province->ViewValue = $this->highlightValue($this->province);
            }

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";
            if (!$this->isExport()) {
                $this->country->ViewValue = $this->highlightValue($this->country);
            }

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";
            if (!$this->isExport()) {
                $this->postal_code->ViewValue = $this->highlightValue($this->postal_code);
            }

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";
            $this->PEmail->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PEmail->ViewValue = $this->highlightValue($this->PEmail);
            }

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";
            $this->PEmergencyContact->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PEmergencyContact->ViewValue = $this->highlightValue($this->PEmergencyContact);
            }

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";
            $this->occupation->TooltipValue = "";
            if (!$this->isExport()) {
                $this->occupation->ViewValue = $this->highlightValue($this->occupation);
            }

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";
            $this->spouse_occupation->TooltipValue = "";
            if (!$this->isExport()) {
                $this->spouse_occupation->ViewValue = $this->highlightValue($this->spouse_occupation);
            }

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";
            $this->WhatsApp->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WhatsApp->ViewValue = $this->highlightValue($this->WhatsApp);
            }

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";
            $this->CouppleID->TooltipValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";
            $this->MaleID->TooltipValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";
            $this->FemaleID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";
            $this->Relationship->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Relationship->ViewValue = $this->highlightValue($this->Relationship);
            }
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // title
            $this->title->EditAttrs["class"] = "form-control";
            $this->title->EditCustomAttributes = "";
            $this->title->EditValue = HtmlEncode($this->title->AdvancedSearch->SearchValue);
            $this->title->PlaceHolder = RemoveHtml($this->title->caption());

            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->AdvancedSearch->SearchValue = HtmlDecode($this->first_name->AdvancedSearch->SearchValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->AdvancedSearch->SearchValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // middle_name
            $this->middle_name->EditAttrs["class"] = "form-control";
            $this->middle_name->EditCustomAttributes = "";
            if (!$this->middle_name->Raw) {
                $this->middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->middle_name->AdvancedSearch->SearchValue);
            }
            $this->middle_name->EditValue = HtmlEncode($this->middle_name->AdvancedSearch->SearchValue);
            $this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->AdvancedSearch->SearchValue = HtmlDecode($this->last_name->AdvancedSearch->SearchValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->AdvancedSearch->SearchValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->AdvancedSearch->SearchValue = HtmlDecode($this->gender->AdvancedSearch->SearchValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->AdvancedSearch->SearchValue);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // dob
            $this->dob->EditAttrs["class"] = "form-control";
            $this->dob->EditCustomAttributes = "";
            $this->dob->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->dob->AdvancedSearch->SearchValue, 0), 8));
            $this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // blood_group
            $this->blood_group->EditAttrs["class"] = "form-control";
            $this->blood_group->EditCustomAttributes = "";
            if (!$this->blood_group->Raw) {
                $this->blood_group->AdvancedSearch->SearchValue = HtmlDecode($this->blood_group->AdvancedSearch->SearchValue);
            }
            $this->blood_group->EditValue = HtmlEncode($this->blood_group->AdvancedSearch->SearchValue);
            $this->blood_group->PlaceHolder = RemoveHtml($this->blood_group->caption());

            // mobile_no
            $this->mobile_no->EditAttrs["class"] = "form-control";
            $this->mobile_no->EditCustomAttributes = "";
            if (!$this->mobile_no->Raw) {
                $this->mobile_no->AdvancedSearch->SearchValue = HtmlDecode($this->mobile_no->AdvancedSearch->SearchValue);
            }
            $this->mobile_no->EditValue = HtmlEncode($this->mobile_no->AdvancedSearch->SearchValue);
            $this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

            // IdentificationMark
            $this->IdentificationMark->EditAttrs["class"] = "form-control";
            $this->IdentificationMark->EditCustomAttributes = "";
            if (!$this->IdentificationMark->Raw) {
                $this->IdentificationMark->AdvancedSearch->SearchValue = HtmlDecode($this->IdentificationMark->AdvancedSearch->SearchValue);
            }
            $this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->AdvancedSearch->SearchValue);
            $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

            // Religion
            $this->Religion->EditAttrs["class"] = "form-control";
            $this->Religion->EditCustomAttributes = "";
            if (!$this->Religion->Raw) {
                $this->Religion->AdvancedSearch->SearchValue = HtmlDecode($this->Religion->AdvancedSearch->SearchValue);
            }
            $this->Religion->EditValue = HtmlEncode($this->Religion->AdvancedSearch->SearchValue);
            $this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

            // Nationality
            $this->Nationality->EditAttrs["class"] = "form-control";
            $this->Nationality->EditCustomAttributes = "";
            if (!$this->Nationality->Raw) {
                $this->Nationality->AdvancedSearch->SearchValue = HtmlDecode($this->Nationality->AdvancedSearch->SearchValue);
            }
            $this->Nationality->EditValue = HtmlEncode($this->Nationality->AdvancedSearch->SearchValue);
            $this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            if (!$this->profilePic->Raw) {
                $this->profilePic->AdvancedSearch->SearchValue = HtmlDecode($this->profilePic->AdvancedSearch->SearchValue);
            }
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->AdvancedSearch->SearchValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

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

            // spouse_title
            $this->spouse_title->EditAttrs["class"] = "form-control";
            $this->spouse_title->EditCustomAttributes = "";
            if (!$this->spouse_title->Raw) {
                $this->spouse_title->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_title->AdvancedSearch->SearchValue);
            }
            $this->spouse_title->EditValue = HtmlEncode($this->spouse_title->AdvancedSearch->SearchValue);
            $this->spouse_title->PlaceHolder = RemoveHtml($this->spouse_title->caption());

            // spouse_first_name
            $this->spouse_first_name->EditAttrs["class"] = "form-control";
            $this->spouse_first_name->EditCustomAttributes = "";
            if (!$this->spouse_first_name->Raw) {
                $this->spouse_first_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_first_name->AdvancedSearch->SearchValue);
            }
            $this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->AdvancedSearch->SearchValue);
            $this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

            // spouse_middle_name
            $this->spouse_middle_name->EditAttrs["class"] = "form-control";
            $this->spouse_middle_name->EditCustomAttributes = "";
            if (!$this->spouse_middle_name->Raw) {
                $this->spouse_middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_middle_name->AdvancedSearch->SearchValue);
            }
            $this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->AdvancedSearch->SearchValue);
            $this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

            // spouse_last_name
            $this->spouse_last_name->EditAttrs["class"] = "form-control";
            $this->spouse_last_name->EditCustomAttributes = "";
            if (!$this->spouse_last_name->Raw) {
                $this->spouse_last_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_last_name->AdvancedSearch->SearchValue);
            }
            $this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->AdvancedSearch->SearchValue);
            $this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

            // spouse_gender
            $this->spouse_gender->EditAttrs["class"] = "form-control";
            $this->spouse_gender->EditCustomAttributes = "";
            if (!$this->spouse_gender->Raw) {
                $this->spouse_gender->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_gender->AdvancedSearch->SearchValue);
            }
            $this->spouse_gender->EditValue = HtmlEncode($this->spouse_gender->AdvancedSearch->SearchValue);
            $this->spouse_gender->PlaceHolder = RemoveHtml($this->spouse_gender->caption());

            // spouse_dob
            $this->spouse_dob->EditAttrs["class"] = "form-control";
            $this->spouse_dob->EditCustomAttributes = "";
            $this->spouse_dob->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->spouse_dob->AdvancedSearch->SearchValue, 0), 8));
            $this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

            // spouse_Age
            $this->spouse_Age->EditAttrs["class"] = "form-control";
            $this->spouse_Age->EditCustomAttributes = "";
            if (!$this->spouse_Age->Raw) {
                $this->spouse_Age->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_Age->AdvancedSearch->SearchValue);
            }
            $this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->AdvancedSearch->SearchValue);
            $this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

            // spouse_blood_group
            $this->spouse_blood_group->EditAttrs["class"] = "form-control";
            $this->spouse_blood_group->EditCustomAttributes = "";
            if (!$this->spouse_blood_group->Raw) {
                $this->spouse_blood_group->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_blood_group->AdvancedSearch->SearchValue);
            }
            $this->spouse_blood_group->EditValue = HtmlEncode($this->spouse_blood_group->AdvancedSearch->SearchValue);
            $this->spouse_blood_group->PlaceHolder = RemoveHtml($this->spouse_blood_group->caption());

            // spouse_mobile_no
            $this->spouse_mobile_no->EditAttrs["class"] = "form-control";
            $this->spouse_mobile_no->EditCustomAttributes = "";
            if (!$this->spouse_mobile_no->Raw) {
                $this->spouse_mobile_no->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_mobile_no->AdvancedSearch->SearchValue);
            }
            $this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->AdvancedSearch->SearchValue);
            $this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

            // Maritalstatus
            $this->Maritalstatus->EditAttrs["class"] = "form-control";
            $this->Maritalstatus->EditCustomAttributes = "";
            if (!$this->Maritalstatus->Raw) {
                $this->Maritalstatus->AdvancedSearch->SearchValue = HtmlDecode($this->Maritalstatus->AdvancedSearch->SearchValue);
            }
            $this->Maritalstatus->EditValue = HtmlEncode($this->Maritalstatus->AdvancedSearch->SearchValue);
            $this->Maritalstatus->PlaceHolder = RemoveHtml($this->Maritalstatus->caption());

            // Business
            $this->Business->EditAttrs["class"] = "form-control";
            $this->Business->EditCustomAttributes = "";
            if (!$this->Business->Raw) {
                $this->Business->AdvancedSearch->SearchValue = HtmlDecode($this->Business->AdvancedSearch->SearchValue);
            }
            $this->Business->EditValue = HtmlEncode($this->Business->AdvancedSearch->SearchValue);
            $this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

            // Patient_Language
            $this->Patient_Language->EditAttrs["class"] = "form-control";
            $this->Patient_Language->EditCustomAttributes = "";
            if (!$this->Patient_Language->Raw) {
                $this->Patient_Language->AdvancedSearch->SearchValue = HtmlDecode($this->Patient_Language->AdvancedSearch->SearchValue);
            }
            $this->Patient_Language->EditValue = HtmlEncode($this->Patient_Language->AdvancedSearch->SearchValue);
            $this->Patient_Language->PlaceHolder = RemoveHtml($this->Patient_Language->caption());

            // Passport
            $this->Passport->EditAttrs["class"] = "form-control";
            $this->Passport->EditCustomAttributes = "";
            if (!$this->Passport->Raw) {
                $this->Passport->AdvancedSearch->SearchValue = HtmlDecode($this->Passport->AdvancedSearch->SearchValue);
            }
            $this->Passport->EditValue = HtmlEncode($this->Passport->AdvancedSearch->SearchValue);
            $this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

            // VisaNo
            $this->VisaNo->EditAttrs["class"] = "form-control";
            $this->VisaNo->EditCustomAttributes = "";
            if (!$this->VisaNo->Raw) {
                $this->VisaNo->AdvancedSearch->SearchValue = HtmlDecode($this->VisaNo->AdvancedSearch->SearchValue);
            }
            $this->VisaNo->EditValue = HtmlEncode($this->VisaNo->AdvancedSearch->SearchValue);
            $this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

            // ValidityOfVisa
            $this->ValidityOfVisa->EditAttrs["class"] = "form-control";
            $this->ValidityOfVisa->EditCustomAttributes = "";
            if (!$this->ValidityOfVisa->Raw) {
                $this->ValidityOfVisa->AdvancedSearch->SearchValue = HtmlDecode($this->ValidityOfVisa->AdvancedSearch->SearchValue);
            }
            $this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->AdvancedSearch->SearchValue);
            $this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditAttrs["class"] = "form-control";
            $this->WhereDidYouHear->EditCustomAttributes = "";
            if (!$this->WhereDidYouHear->Raw) {
                $this->WhereDidYouHear->AdvancedSearch->SearchValue = HtmlDecode($this->WhereDidYouHear->AdvancedSearch->SearchValue);
            }
            $this->WhereDidYouHear->EditValue = HtmlEncode($this->WhereDidYouHear->AdvancedSearch->SearchValue);
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            if (!$this->HospID->Raw) {
                $this->HospID->AdvancedSearch->SearchValue = HtmlDecode($this->HospID->AdvancedSearch->SearchValue);
            }
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // street
            $this->street->EditAttrs["class"] = "form-control";
            $this->street->EditCustomAttributes = "";
            if (!$this->street->Raw) {
                $this->street->AdvancedSearch->SearchValue = HtmlDecode($this->street->AdvancedSearch->SearchValue);
            }
            $this->street->EditValue = HtmlEncode($this->street->AdvancedSearch->SearchValue);
            $this->street->PlaceHolder = RemoveHtml($this->street->caption());

            // town
            $this->town->EditAttrs["class"] = "form-control";
            $this->town->EditCustomAttributes = "";
            if (!$this->town->Raw) {
                $this->town->AdvancedSearch->SearchValue = HtmlDecode($this->town->AdvancedSearch->SearchValue);
            }
            $this->town->EditValue = HtmlEncode($this->town->AdvancedSearch->SearchValue);
            $this->town->PlaceHolder = RemoveHtml($this->town->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            if (!$this->province->Raw) {
                $this->province->AdvancedSearch->SearchValue = HtmlDecode($this->province->AdvancedSearch->SearchValue);
            }
            $this->province->EditValue = HtmlEncode($this->province->AdvancedSearch->SearchValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->AdvancedSearch->SearchValue = HtmlDecode($this->country->AdvancedSearch->SearchValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->AdvancedSearch->SearchValue = HtmlDecode($this->postal_code->AdvancedSearch->SearchValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->AdvancedSearch->SearchValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // PEmail
            $this->PEmail->EditAttrs["class"] = "form-control";
            $this->PEmail->EditCustomAttributes = "";
            if (!$this->PEmail->Raw) {
                $this->PEmail->AdvancedSearch->SearchValue = HtmlDecode($this->PEmail->AdvancedSearch->SearchValue);
            }
            $this->PEmail->EditValue = HtmlEncode($this->PEmail->AdvancedSearch->SearchValue);
            $this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

            // PEmergencyContact
            $this->PEmergencyContact->EditAttrs["class"] = "form-control";
            $this->PEmergencyContact->EditCustomAttributes = "";
            if (!$this->PEmergencyContact->Raw) {
                $this->PEmergencyContact->AdvancedSearch->SearchValue = HtmlDecode($this->PEmergencyContact->AdvancedSearch->SearchValue);
            }
            $this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->AdvancedSearch->SearchValue);
            $this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

            // occupation
            $this->occupation->EditAttrs["class"] = "form-control";
            $this->occupation->EditCustomAttributes = "";
            if (!$this->occupation->Raw) {
                $this->occupation->AdvancedSearch->SearchValue = HtmlDecode($this->occupation->AdvancedSearch->SearchValue);
            }
            $this->occupation->EditValue = HtmlEncode($this->occupation->AdvancedSearch->SearchValue);
            $this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

            // spouse_occupation
            $this->spouse_occupation->EditAttrs["class"] = "form-control";
            $this->spouse_occupation->EditCustomAttributes = "";
            if (!$this->spouse_occupation->Raw) {
                $this->spouse_occupation->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_occupation->AdvancedSearch->SearchValue);
            }
            $this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->AdvancedSearch->SearchValue);
            $this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

            // WhatsApp
            $this->WhatsApp->EditAttrs["class"] = "form-control";
            $this->WhatsApp->EditCustomAttributes = "";
            if (!$this->WhatsApp->Raw) {
                $this->WhatsApp->AdvancedSearch->SearchValue = HtmlDecode($this->WhatsApp->AdvancedSearch->SearchValue);
            }
            $this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->AdvancedSearch->SearchValue);
            $this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

            // CouppleID
            $this->CouppleID->EditAttrs["class"] = "form-control";
            $this->CouppleID->EditCustomAttributes = "";
            $this->CouppleID->EditValue = HtmlEncode($this->CouppleID->AdvancedSearch->SearchValue);
            $this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

            // MaleID
            $this->MaleID->EditAttrs["class"] = "form-control";
            $this->MaleID->EditCustomAttributes = "";
            $this->MaleID->EditValue = HtmlEncode($this->MaleID->AdvancedSearch->SearchValue);
            $this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

            // FemaleID
            $this->FemaleID->EditAttrs["class"] = "form-control";
            $this->FemaleID->EditCustomAttributes = "";
            $this->FemaleID->EditValue = HtmlEncode($this->FemaleID->AdvancedSearch->SearchValue);
            $this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

            // GroupID
            $this->GroupID->EditAttrs["class"] = "form-control";
            $this->GroupID->EditCustomAttributes = "";
            $this->GroupID->EditValue = HtmlEncode($this->GroupID->AdvancedSearch->SearchValue);
            $this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

            // Relationship
            $this->Relationship->EditAttrs["class"] = "form-control";
            $this->Relationship->EditCustomAttributes = "";
            if (!$this->Relationship->Raw) {
                $this->Relationship->AdvancedSearch->SearchValue = HtmlDecode($this->Relationship->AdvancedSearch->SearchValue);
            }
            $this->Relationship->EditValue = HtmlEncode($this->Relationship->AdvancedSearch->SearchValue);
            $this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
        }
    }

    // Validate search
    protected function validateSearch()
    {
        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
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
        $this->PatientID->AdvancedSearch->load();
        $this->title->AdvancedSearch->load();
        $this->first_name->AdvancedSearch->load();
        $this->middle_name->AdvancedSearch->load();
        $this->last_name->AdvancedSearch->load();
        $this->gender->AdvancedSearch->load();
        $this->dob->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->blood_group->AdvancedSearch->load();
        $this->mobile_no->AdvancedSearch->load();
        $this->description->AdvancedSearch->load();
        $this->IdentificationMark->AdvancedSearch->load();
        $this->Religion->AdvancedSearch->load();
        $this->Nationality->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->ReferedByDr->AdvancedSearch->load();
        $this->ReferClinicname->AdvancedSearch->load();
        $this->ReferCity->AdvancedSearch->load();
        $this->ReferMobileNo->AdvancedSearch->load();
        $this->ReferA4TreatingConsultant->AdvancedSearch->load();
        $this->PurposreReferredfor->AdvancedSearch->load();
        $this->spouse_title->AdvancedSearch->load();
        $this->spouse_first_name->AdvancedSearch->load();
        $this->spouse_middle_name->AdvancedSearch->load();
        $this->spouse_last_name->AdvancedSearch->load();
        $this->spouse_gender->AdvancedSearch->load();
        $this->spouse_dob->AdvancedSearch->load();
        $this->spouse_Age->AdvancedSearch->load();
        $this->spouse_blood_group->AdvancedSearch->load();
        $this->spouse_mobile_no->AdvancedSearch->load();
        $this->Maritalstatus->AdvancedSearch->load();
        $this->Business->AdvancedSearch->load();
        $this->Patient_Language->AdvancedSearch->load();
        $this->Passport->AdvancedSearch->load();
        $this->VisaNo->AdvancedSearch->load();
        $this->ValidityOfVisa->AdvancedSearch->load();
        $this->WhereDidYouHear->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->street->AdvancedSearch->load();
        $this->town->AdvancedSearch->load();
        $this->province->AdvancedSearch->load();
        $this->country->AdvancedSearch->load();
        $this->postal_code->AdvancedSearch->load();
        $this->PEmail->AdvancedSearch->load();
        $this->PEmergencyContact->AdvancedSearch->load();
        $this->occupation->AdvancedSearch->load();
        $this->spouse_occupation->AdvancedSearch->load();
        $this->WhatsApp->AdvancedSearch->load();
        $this->CouppleID->AdvancedSearch->load();
        $this->MaleID->AdvancedSearch->load();
        $this->FemaleID->AdvancedSearch->load();
        $this->GroupID->AdvancedSearch->load();
        $this->Relationship->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_followupslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_followupslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_followupslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_followups" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_followups\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_followupslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word", $this->ExportWordCustom);
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
        $item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
        $item->Visible = false;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email", $this->ExportEmailCustom);
        $item->Visible = false;

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_followupslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_followupslistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
            // Export-to-email disabled
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
