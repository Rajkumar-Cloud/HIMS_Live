<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOtDeliveryRegisterList extends PatientOtDeliveryRegister
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_ot_delivery_register';

    // Page object name
    public $PageObjName = "PatientOtDeliveryRegisterList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpatient_ot_delivery_registerlist";
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

        // Table object (patient_ot_delivery_register)
        if (!isset($GLOBALS["patient_ot_delivery_register"]) || get_class($GLOBALS["patient_ot_delivery_register"]) == PROJECT_NAMESPACE . "patient_ot_delivery_register") {
            $GLOBALS["patient_ot_delivery_register"] = &$this;
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
        $this->AddUrl = "PatientOtDeliveryRegisterAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PatientOtDeliveryRegisterDelete";
        $this->MultiUpdateUrl = "PatientOtDeliveryRegisterUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_delivery_register');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpatient_ot_delivery_registerlistsrch";

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
                $doc = new $class(Container("patient_ot_delivery_register"));
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
        $this->PatID->setVisibility();
        $this->PatientName->setVisibility();
        $this->mrnno->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->Visible = false;
        $this->ObstetricsHistryMale->Visible = false;
        $this->ObstetricsHistryFeMale->setVisibility();
        $this->Abortion->setVisibility();
        $this->ChildBirthDate->setVisibility();
        $this->ChildBirthTime->setVisibility();
        $this->ChildSex->setVisibility();
        $this->ChildWt->setVisibility();
        $this->ChildDay->setVisibility();
        $this->ChildOE->setVisibility();
        $this->TypeofDelivery->Visible = false;
        $this->ChildBlGrp->setVisibility();
        $this->ApgarScore->setVisibility();
        $this->birthnotification->setVisibility();
        $this->formno->setVisibility();
        $this->dte->setVisibility();
        $this->motherReligion->setVisibility();
        $this->bloodgroup->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->ChildBirthDate1->setVisibility();
        $this->ChildBirthTime1->setVisibility();
        $this->ChildSex1->setVisibility();
        $this->ChildWt1->setVisibility();
        $this->ChildDay1->setVisibility();
        $this->ChildOE1->setVisibility();
        $this->TypeofDelivery1->Visible = false;
        $this->ChildBlGrp1->setVisibility();
        $this->ApgarScore1->setVisibility();
        $this->birthnotification1->setVisibility();
        $this->formno1->setVisibility();
        $this->proposedSurgery->Visible = false;
        $this->surgeryProcedure->Visible = false;
        $this->typeOfAnaesthesia->Visible = false;
        $this->RecievedTime->setVisibility();
        $this->AnaesthesiaStarted->setVisibility();
        $this->AnaesthesiaEnded->setVisibility();
        $this->surgeryStarted->setVisibility();
        $this->surgeryEnded->setVisibility();
        $this->RecoveryTime->setVisibility();
        $this->ShiftedTime->setVisibility();
        $this->Duration->setVisibility();
        $this->DrVisit1->Visible = false;
        $this->DrVisit2->Visible = false;
        $this->DrVisit3->Visible = false;
        $this->DrVisit4->Visible = false;
        $this->Surgeon->setVisibility();
        $this->Anaesthetist->setVisibility();
        $this->AsstSurgeon1->setVisibility();
        $this->AsstSurgeon2->setVisibility();
        $this->paediatric->setVisibility();
        $this->ScrubNurse1->setVisibility();
        $this->ScrubNurse2->setVisibility();
        $this->FloorNurse->setVisibility();
        $this->Technician->setVisibility();
        $this->HouseKeeping->setVisibility();
        $this->countsCheckedMops->setVisibility();
        $this->gauze->setVisibility();
        $this->needles->setVisibility();
        $this->bloodloss->setVisibility();
        $this->bloodtransfusion->setVisibility();
        $this->implantsUsed->Visible = false;
        $this->MaterialsForHPE->Visible = false;
        $this->Reception->setVisibility();
        $this->PId->setVisibility();
        $this->PatientSearch->Visible = false;
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
        $this->setupLookupOptions($this->DrVisit1);
        $this->setupLookupOptions($this->DrVisit2);
        $this->setupLookupOptions($this->DrVisit3);
        $this->setupLookupOptions($this->DrVisit4);
        $this->setupLookupOptions($this->Surgeon);
        $this->setupLookupOptions($this->Anaesthetist);
        $this->setupLookupOptions($this->AsstSurgeon1);
        $this->setupLookupOptions($this->AsstSurgeon2);
        $this->setupLookupOptions($this->paediatric);
        $this->setupLookupOptions($this->PatientSearch);

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_ot_delivery_registerlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->ObstetricsHistryMale->AdvancedSearch->toJson(), ","); // Field ObstetricsHistryMale
        $filterList = Concat($filterList, $this->ObstetricsHistryFeMale->AdvancedSearch->toJson(), ","); // Field ObstetricsHistryFeMale
        $filterList = Concat($filterList, $this->Abortion->AdvancedSearch->toJson(), ","); // Field Abortion
        $filterList = Concat($filterList, $this->ChildBirthDate->AdvancedSearch->toJson(), ","); // Field ChildBirthDate
        $filterList = Concat($filterList, $this->ChildBirthTime->AdvancedSearch->toJson(), ","); // Field ChildBirthTime
        $filterList = Concat($filterList, $this->ChildSex->AdvancedSearch->toJson(), ","); // Field ChildSex
        $filterList = Concat($filterList, $this->ChildWt->AdvancedSearch->toJson(), ","); // Field ChildWt
        $filterList = Concat($filterList, $this->ChildDay->AdvancedSearch->toJson(), ","); // Field ChildDay
        $filterList = Concat($filterList, $this->ChildOE->AdvancedSearch->toJson(), ","); // Field ChildOE
        $filterList = Concat($filterList, $this->TypeofDelivery->AdvancedSearch->toJson(), ","); // Field TypeofDelivery
        $filterList = Concat($filterList, $this->ChildBlGrp->AdvancedSearch->toJson(), ","); // Field ChildBlGrp
        $filterList = Concat($filterList, $this->ApgarScore->AdvancedSearch->toJson(), ","); // Field ApgarScore
        $filterList = Concat($filterList, $this->birthnotification->AdvancedSearch->toJson(), ","); // Field birthnotification
        $filterList = Concat($filterList, $this->formno->AdvancedSearch->toJson(), ","); // Field formno
        $filterList = Concat($filterList, $this->dte->AdvancedSearch->toJson(), ","); // Field dte
        $filterList = Concat($filterList, $this->motherReligion->AdvancedSearch->toJson(), ","); // Field motherReligion
        $filterList = Concat($filterList, $this->bloodgroup->AdvancedSearch->toJson(), ","); // Field bloodgroup
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->ChildBirthDate1->AdvancedSearch->toJson(), ","); // Field ChildBirthDate1
        $filterList = Concat($filterList, $this->ChildBirthTime1->AdvancedSearch->toJson(), ","); // Field ChildBirthTime1
        $filterList = Concat($filterList, $this->ChildSex1->AdvancedSearch->toJson(), ","); // Field ChildSex1
        $filterList = Concat($filterList, $this->ChildWt1->AdvancedSearch->toJson(), ","); // Field ChildWt1
        $filterList = Concat($filterList, $this->ChildDay1->AdvancedSearch->toJson(), ","); // Field ChildDay1
        $filterList = Concat($filterList, $this->ChildOE1->AdvancedSearch->toJson(), ","); // Field ChildOE1
        $filterList = Concat($filterList, $this->TypeofDelivery1->AdvancedSearch->toJson(), ","); // Field TypeofDelivery1
        $filterList = Concat($filterList, $this->ChildBlGrp1->AdvancedSearch->toJson(), ","); // Field ChildBlGrp1
        $filterList = Concat($filterList, $this->ApgarScore1->AdvancedSearch->toJson(), ","); // Field ApgarScore1
        $filterList = Concat($filterList, $this->birthnotification1->AdvancedSearch->toJson(), ","); // Field birthnotification1
        $filterList = Concat($filterList, $this->formno1->AdvancedSearch->toJson(), ","); // Field formno1
        $filterList = Concat($filterList, $this->proposedSurgery->AdvancedSearch->toJson(), ","); // Field proposedSurgery
        $filterList = Concat($filterList, $this->surgeryProcedure->AdvancedSearch->toJson(), ","); // Field surgeryProcedure
        $filterList = Concat($filterList, $this->typeOfAnaesthesia->AdvancedSearch->toJson(), ","); // Field typeOfAnaesthesia
        $filterList = Concat($filterList, $this->RecievedTime->AdvancedSearch->toJson(), ","); // Field RecievedTime
        $filterList = Concat($filterList, $this->AnaesthesiaStarted->AdvancedSearch->toJson(), ","); // Field AnaesthesiaStarted
        $filterList = Concat($filterList, $this->AnaesthesiaEnded->AdvancedSearch->toJson(), ","); // Field AnaesthesiaEnded
        $filterList = Concat($filterList, $this->surgeryStarted->AdvancedSearch->toJson(), ","); // Field surgeryStarted
        $filterList = Concat($filterList, $this->surgeryEnded->AdvancedSearch->toJson(), ","); // Field surgeryEnded
        $filterList = Concat($filterList, $this->RecoveryTime->AdvancedSearch->toJson(), ","); // Field RecoveryTime
        $filterList = Concat($filterList, $this->ShiftedTime->AdvancedSearch->toJson(), ","); // Field ShiftedTime
        $filterList = Concat($filterList, $this->Duration->AdvancedSearch->toJson(), ","); // Field Duration
        $filterList = Concat($filterList, $this->DrVisit1->AdvancedSearch->toJson(), ","); // Field DrVisit1
        $filterList = Concat($filterList, $this->DrVisit2->AdvancedSearch->toJson(), ","); // Field DrVisit2
        $filterList = Concat($filterList, $this->DrVisit3->AdvancedSearch->toJson(), ","); // Field DrVisit3
        $filterList = Concat($filterList, $this->DrVisit4->AdvancedSearch->toJson(), ","); // Field DrVisit4
        $filterList = Concat($filterList, $this->Surgeon->AdvancedSearch->toJson(), ","); // Field Surgeon
        $filterList = Concat($filterList, $this->Anaesthetist->AdvancedSearch->toJson(), ","); // Field Anaesthetist
        $filterList = Concat($filterList, $this->AsstSurgeon1->AdvancedSearch->toJson(), ","); // Field AsstSurgeon1
        $filterList = Concat($filterList, $this->AsstSurgeon2->AdvancedSearch->toJson(), ","); // Field AsstSurgeon2
        $filterList = Concat($filterList, $this->paediatric->AdvancedSearch->toJson(), ","); // Field paediatric
        $filterList = Concat($filterList, $this->ScrubNurse1->AdvancedSearch->toJson(), ","); // Field ScrubNurse1
        $filterList = Concat($filterList, $this->ScrubNurse2->AdvancedSearch->toJson(), ","); // Field ScrubNurse2
        $filterList = Concat($filterList, $this->FloorNurse->AdvancedSearch->toJson(), ","); // Field FloorNurse
        $filterList = Concat($filterList, $this->Technician->AdvancedSearch->toJson(), ","); // Field Technician
        $filterList = Concat($filterList, $this->HouseKeeping->AdvancedSearch->toJson(), ","); // Field HouseKeeping
        $filterList = Concat($filterList, $this->countsCheckedMops->AdvancedSearch->toJson(), ","); // Field countsCheckedMops
        $filterList = Concat($filterList, $this->gauze->AdvancedSearch->toJson(), ","); // Field gauze
        $filterList = Concat($filterList, $this->needles->AdvancedSearch->toJson(), ","); // Field needles
        $filterList = Concat($filterList, $this->bloodloss->AdvancedSearch->toJson(), ","); // Field bloodloss
        $filterList = Concat($filterList, $this->bloodtransfusion->AdvancedSearch->toJson(), ","); // Field bloodtransfusion
        $filterList = Concat($filterList, $this->implantsUsed->AdvancedSearch->toJson(), ","); // Field implantsUsed
        $filterList = Concat($filterList, $this->MaterialsForHPE->AdvancedSearch->toJson(), ","); // Field MaterialsForHPE
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PId->AdvancedSearch->toJson(), ","); // Field PId
        $filterList = Concat($filterList, $this->PatientSearch->AdvancedSearch->toJson(), ","); // Field PatientSearch
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpatient_ot_delivery_registerlistsrch", $filters);
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

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field MobileNumber
        $this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field Gender
        $this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
        $this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
        $this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
        $this->Gender->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

        // Field ObstetricsHistryMale
        $this->ObstetricsHistryMale->AdvancedSearch->SearchValue = @$filter["x_ObstetricsHistryMale"];
        $this->ObstetricsHistryMale->AdvancedSearch->SearchOperator = @$filter["z_ObstetricsHistryMale"];
        $this->ObstetricsHistryMale->AdvancedSearch->SearchCondition = @$filter["v_ObstetricsHistryMale"];
        $this->ObstetricsHistryMale->AdvancedSearch->SearchValue2 = @$filter["y_ObstetricsHistryMale"];
        $this->ObstetricsHistryMale->AdvancedSearch->SearchOperator2 = @$filter["w_ObstetricsHistryMale"];
        $this->ObstetricsHistryMale->AdvancedSearch->save();

        // Field ObstetricsHistryFeMale
        $this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue = @$filter["x_ObstetricsHistryFeMale"];
        $this->ObstetricsHistryFeMale->AdvancedSearch->SearchOperator = @$filter["z_ObstetricsHistryFeMale"];
        $this->ObstetricsHistryFeMale->AdvancedSearch->SearchCondition = @$filter["v_ObstetricsHistryFeMale"];
        $this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue2 = @$filter["y_ObstetricsHistryFeMale"];
        $this->ObstetricsHistryFeMale->AdvancedSearch->SearchOperator2 = @$filter["w_ObstetricsHistryFeMale"];
        $this->ObstetricsHistryFeMale->AdvancedSearch->save();

        // Field Abortion
        $this->Abortion->AdvancedSearch->SearchValue = @$filter["x_Abortion"];
        $this->Abortion->AdvancedSearch->SearchOperator = @$filter["z_Abortion"];
        $this->Abortion->AdvancedSearch->SearchCondition = @$filter["v_Abortion"];
        $this->Abortion->AdvancedSearch->SearchValue2 = @$filter["y_Abortion"];
        $this->Abortion->AdvancedSearch->SearchOperator2 = @$filter["w_Abortion"];
        $this->Abortion->AdvancedSearch->save();

        // Field ChildBirthDate
        $this->ChildBirthDate->AdvancedSearch->SearchValue = @$filter["x_ChildBirthDate"];
        $this->ChildBirthDate->AdvancedSearch->SearchOperator = @$filter["z_ChildBirthDate"];
        $this->ChildBirthDate->AdvancedSearch->SearchCondition = @$filter["v_ChildBirthDate"];
        $this->ChildBirthDate->AdvancedSearch->SearchValue2 = @$filter["y_ChildBirthDate"];
        $this->ChildBirthDate->AdvancedSearch->SearchOperator2 = @$filter["w_ChildBirthDate"];
        $this->ChildBirthDate->AdvancedSearch->save();

        // Field ChildBirthTime
        $this->ChildBirthTime->AdvancedSearch->SearchValue = @$filter["x_ChildBirthTime"];
        $this->ChildBirthTime->AdvancedSearch->SearchOperator = @$filter["z_ChildBirthTime"];
        $this->ChildBirthTime->AdvancedSearch->SearchCondition = @$filter["v_ChildBirthTime"];
        $this->ChildBirthTime->AdvancedSearch->SearchValue2 = @$filter["y_ChildBirthTime"];
        $this->ChildBirthTime->AdvancedSearch->SearchOperator2 = @$filter["w_ChildBirthTime"];
        $this->ChildBirthTime->AdvancedSearch->save();

        // Field ChildSex
        $this->ChildSex->AdvancedSearch->SearchValue = @$filter["x_ChildSex"];
        $this->ChildSex->AdvancedSearch->SearchOperator = @$filter["z_ChildSex"];
        $this->ChildSex->AdvancedSearch->SearchCondition = @$filter["v_ChildSex"];
        $this->ChildSex->AdvancedSearch->SearchValue2 = @$filter["y_ChildSex"];
        $this->ChildSex->AdvancedSearch->SearchOperator2 = @$filter["w_ChildSex"];
        $this->ChildSex->AdvancedSearch->save();

        // Field ChildWt
        $this->ChildWt->AdvancedSearch->SearchValue = @$filter["x_ChildWt"];
        $this->ChildWt->AdvancedSearch->SearchOperator = @$filter["z_ChildWt"];
        $this->ChildWt->AdvancedSearch->SearchCondition = @$filter["v_ChildWt"];
        $this->ChildWt->AdvancedSearch->SearchValue2 = @$filter["y_ChildWt"];
        $this->ChildWt->AdvancedSearch->SearchOperator2 = @$filter["w_ChildWt"];
        $this->ChildWt->AdvancedSearch->save();

        // Field ChildDay
        $this->ChildDay->AdvancedSearch->SearchValue = @$filter["x_ChildDay"];
        $this->ChildDay->AdvancedSearch->SearchOperator = @$filter["z_ChildDay"];
        $this->ChildDay->AdvancedSearch->SearchCondition = @$filter["v_ChildDay"];
        $this->ChildDay->AdvancedSearch->SearchValue2 = @$filter["y_ChildDay"];
        $this->ChildDay->AdvancedSearch->SearchOperator2 = @$filter["w_ChildDay"];
        $this->ChildDay->AdvancedSearch->save();

        // Field ChildOE
        $this->ChildOE->AdvancedSearch->SearchValue = @$filter["x_ChildOE"];
        $this->ChildOE->AdvancedSearch->SearchOperator = @$filter["z_ChildOE"];
        $this->ChildOE->AdvancedSearch->SearchCondition = @$filter["v_ChildOE"];
        $this->ChildOE->AdvancedSearch->SearchValue2 = @$filter["y_ChildOE"];
        $this->ChildOE->AdvancedSearch->SearchOperator2 = @$filter["w_ChildOE"];
        $this->ChildOE->AdvancedSearch->save();

        // Field TypeofDelivery
        $this->TypeofDelivery->AdvancedSearch->SearchValue = @$filter["x_TypeofDelivery"];
        $this->TypeofDelivery->AdvancedSearch->SearchOperator = @$filter["z_TypeofDelivery"];
        $this->TypeofDelivery->AdvancedSearch->SearchCondition = @$filter["v_TypeofDelivery"];
        $this->TypeofDelivery->AdvancedSearch->SearchValue2 = @$filter["y_TypeofDelivery"];
        $this->TypeofDelivery->AdvancedSearch->SearchOperator2 = @$filter["w_TypeofDelivery"];
        $this->TypeofDelivery->AdvancedSearch->save();

        // Field ChildBlGrp
        $this->ChildBlGrp->AdvancedSearch->SearchValue = @$filter["x_ChildBlGrp"];
        $this->ChildBlGrp->AdvancedSearch->SearchOperator = @$filter["z_ChildBlGrp"];
        $this->ChildBlGrp->AdvancedSearch->SearchCondition = @$filter["v_ChildBlGrp"];
        $this->ChildBlGrp->AdvancedSearch->SearchValue2 = @$filter["y_ChildBlGrp"];
        $this->ChildBlGrp->AdvancedSearch->SearchOperator2 = @$filter["w_ChildBlGrp"];
        $this->ChildBlGrp->AdvancedSearch->save();

        // Field ApgarScore
        $this->ApgarScore->AdvancedSearch->SearchValue = @$filter["x_ApgarScore"];
        $this->ApgarScore->AdvancedSearch->SearchOperator = @$filter["z_ApgarScore"];
        $this->ApgarScore->AdvancedSearch->SearchCondition = @$filter["v_ApgarScore"];
        $this->ApgarScore->AdvancedSearch->SearchValue2 = @$filter["y_ApgarScore"];
        $this->ApgarScore->AdvancedSearch->SearchOperator2 = @$filter["w_ApgarScore"];
        $this->ApgarScore->AdvancedSearch->save();

        // Field birthnotification
        $this->birthnotification->AdvancedSearch->SearchValue = @$filter["x_birthnotification"];
        $this->birthnotification->AdvancedSearch->SearchOperator = @$filter["z_birthnotification"];
        $this->birthnotification->AdvancedSearch->SearchCondition = @$filter["v_birthnotification"];
        $this->birthnotification->AdvancedSearch->SearchValue2 = @$filter["y_birthnotification"];
        $this->birthnotification->AdvancedSearch->SearchOperator2 = @$filter["w_birthnotification"];
        $this->birthnotification->AdvancedSearch->save();

        // Field formno
        $this->formno->AdvancedSearch->SearchValue = @$filter["x_formno"];
        $this->formno->AdvancedSearch->SearchOperator = @$filter["z_formno"];
        $this->formno->AdvancedSearch->SearchCondition = @$filter["v_formno"];
        $this->formno->AdvancedSearch->SearchValue2 = @$filter["y_formno"];
        $this->formno->AdvancedSearch->SearchOperator2 = @$filter["w_formno"];
        $this->formno->AdvancedSearch->save();

        // Field dte
        $this->dte->AdvancedSearch->SearchValue = @$filter["x_dte"];
        $this->dte->AdvancedSearch->SearchOperator = @$filter["z_dte"];
        $this->dte->AdvancedSearch->SearchCondition = @$filter["v_dte"];
        $this->dte->AdvancedSearch->SearchValue2 = @$filter["y_dte"];
        $this->dte->AdvancedSearch->SearchOperator2 = @$filter["w_dte"];
        $this->dte->AdvancedSearch->save();

        // Field motherReligion
        $this->motherReligion->AdvancedSearch->SearchValue = @$filter["x_motherReligion"];
        $this->motherReligion->AdvancedSearch->SearchOperator = @$filter["z_motherReligion"];
        $this->motherReligion->AdvancedSearch->SearchCondition = @$filter["v_motherReligion"];
        $this->motherReligion->AdvancedSearch->SearchValue2 = @$filter["y_motherReligion"];
        $this->motherReligion->AdvancedSearch->SearchOperator2 = @$filter["w_motherReligion"];
        $this->motherReligion->AdvancedSearch->save();

        // Field bloodgroup
        $this->bloodgroup->AdvancedSearch->SearchValue = @$filter["x_bloodgroup"];
        $this->bloodgroup->AdvancedSearch->SearchOperator = @$filter["z_bloodgroup"];
        $this->bloodgroup->AdvancedSearch->SearchCondition = @$filter["v_bloodgroup"];
        $this->bloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_bloodgroup"];
        $this->bloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_bloodgroup"];
        $this->bloodgroup->AdvancedSearch->save();

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

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field ChildBirthDate1
        $this->ChildBirthDate1->AdvancedSearch->SearchValue = @$filter["x_ChildBirthDate1"];
        $this->ChildBirthDate1->AdvancedSearch->SearchOperator = @$filter["z_ChildBirthDate1"];
        $this->ChildBirthDate1->AdvancedSearch->SearchCondition = @$filter["v_ChildBirthDate1"];
        $this->ChildBirthDate1->AdvancedSearch->SearchValue2 = @$filter["y_ChildBirthDate1"];
        $this->ChildBirthDate1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildBirthDate1"];
        $this->ChildBirthDate1->AdvancedSearch->save();

        // Field ChildBirthTime1
        $this->ChildBirthTime1->AdvancedSearch->SearchValue = @$filter["x_ChildBirthTime1"];
        $this->ChildBirthTime1->AdvancedSearch->SearchOperator = @$filter["z_ChildBirthTime1"];
        $this->ChildBirthTime1->AdvancedSearch->SearchCondition = @$filter["v_ChildBirthTime1"];
        $this->ChildBirthTime1->AdvancedSearch->SearchValue2 = @$filter["y_ChildBirthTime1"];
        $this->ChildBirthTime1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildBirthTime1"];
        $this->ChildBirthTime1->AdvancedSearch->save();

        // Field ChildSex1
        $this->ChildSex1->AdvancedSearch->SearchValue = @$filter["x_ChildSex1"];
        $this->ChildSex1->AdvancedSearch->SearchOperator = @$filter["z_ChildSex1"];
        $this->ChildSex1->AdvancedSearch->SearchCondition = @$filter["v_ChildSex1"];
        $this->ChildSex1->AdvancedSearch->SearchValue2 = @$filter["y_ChildSex1"];
        $this->ChildSex1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildSex1"];
        $this->ChildSex1->AdvancedSearch->save();

        // Field ChildWt1
        $this->ChildWt1->AdvancedSearch->SearchValue = @$filter["x_ChildWt1"];
        $this->ChildWt1->AdvancedSearch->SearchOperator = @$filter["z_ChildWt1"];
        $this->ChildWt1->AdvancedSearch->SearchCondition = @$filter["v_ChildWt1"];
        $this->ChildWt1->AdvancedSearch->SearchValue2 = @$filter["y_ChildWt1"];
        $this->ChildWt1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildWt1"];
        $this->ChildWt1->AdvancedSearch->save();

        // Field ChildDay1
        $this->ChildDay1->AdvancedSearch->SearchValue = @$filter["x_ChildDay1"];
        $this->ChildDay1->AdvancedSearch->SearchOperator = @$filter["z_ChildDay1"];
        $this->ChildDay1->AdvancedSearch->SearchCondition = @$filter["v_ChildDay1"];
        $this->ChildDay1->AdvancedSearch->SearchValue2 = @$filter["y_ChildDay1"];
        $this->ChildDay1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildDay1"];
        $this->ChildDay1->AdvancedSearch->save();

        // Field ChildOE1
        $this->ChildOE1->AdvancedSearch->SearchValue = @$filter["x_ChildOE1"];
        $this->ChildOE1->AdvancedSearch->SearchOperator = @$filter["z_ChildOE1"];
        $this->ChildOE1->AdvancedSearch->SearchCondition = @$filter["v_ChildOE1"];
        $this->ChildOE1->AdvancedSearch->SearchValue2 = @$filter["y_ChildOE1"];
        $this->ChildOE1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildOE1"];
        $this->ChildOE1->AdvancedSearch->save();

        // Field TypeofDelivery1
        $this->TypeofDelivery1->AdvancedSearch->SearchValue = @$filter["x_TypeofDelivery1"];
        $this->TypeofDelivery1->AdvancedSearch->SearchOperator = @$filter["z_TypeofDelivery1"];
        $this->TypeofDelivery1->AdvancedSearch->SearchCondition = @$filter["v_TypeofDelivery1"];
        $this->TypeofDelivery1->AdvancedSearch->SearchValue2 = @$filter["y_TypeofDelivery1"];
        $this->TypeofDelivery1->AdvancedSearch->SearchOperator2 = @$filter["w_TypeofDelivery1"];
        $this->TypeofDelivery1->AdvancedSearch->save();

        // Field ChildBlGrp1
        $this->ChildBlGrp1->AdvancedSearch->SearchValue = @$filter["x_ChildBlGrp1"];
        $this->ChildBlGrp1->AdvancedSearch->SearchOperator = @$filter["z_ChildBlGrp1"];
        $this->ChildBlGrp1->AdvancedSearch->SearchCondition = @$filter["v_ChildBlGrp1"];
        $this->ChildBlGrp1->AdvancedSearch->SearchValue2 = @$filter["y_ChildBlGrp1"];
        $this->ChildBlGrp1->AdvancedSearch->SearchOperator2 = @$filter["w_ChildBlGrp1"];
        $this->ChildBlGrp1->AdvancedSearch->save();

        // Field ApgarScore1
        $this->ApgarScore1->AdvancedSearch->SearchValue = @$filter["x_ApgarScore1"];
        $this->ApgarScore1->AdvancedSearch->SearchOperator = @$filter["z_ApgarScore1"];
        $this->ApgarScore1->AdvancedSearch->SearchCondition = @$filter["v_ApgarScore1"];
        $this->ApgarScore1->AdvancedSearch->SearchValue2 = @$filter["y_ApgarScore1"];
        $this->ApgarScore1->AdvancedSearch->SearchOperator2 = @$filter["w_ApgarScore1"];
        $this->ApgarScore1->AdvancedSearch->save();

        // Field birthnotification1
        $this->birthnotification1->AdvancedSearch->SearchValue = @$filter["x_birthnotification1"];
        $this->birthnotification1->AdvancedSearch->SearchOperator = @$filter["z_birthnotification1"];
        $this->birthnotification1->AdvancedSearch->SearchCondition = @$filter["v_birthnotification1"];
        $this->birthnotification1->AdvancedSearch->SearchValue2 = @$filter["y_birthnotification1"];
        $this->birthnotification1->AdvancedSearch->SearchOperator2 = @$filter["w_birthnotification1"];
        $this->birthnotification1->AdvancedSearch->save();

        // Field formno1
        $this->formno1->AdvancedSearch->SearchValue = @$filter["x_formno1"];
        $this->formno1->AdvancedSearch->SearchOperator = @$filter["z_formno1"];
        $this->formno1->AdvancedSearch->SearchCondition = @$filter["v_formno1"];
        $this->formno1->AdvancedSearch->SearchValue2 = @$filter["y_formno1"];
        $this->formno1->AdvancedSearch->SearchOperator2 = @$filter["w_formno1"];
        $this->formno1->AdvancedSearch->save();

        // Field proposedSurgery
        $this->proposedSurgery->AdvancedSearch->SearchValue = @$filter["x_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchOperator = @$filter["z_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchCondition = @$filter["v_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchValue2 = @$filter["y_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchOperator2 = @$filter["w_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->save();

        // Field surgeryProcedure
        $this->surgeryProcedure->AdvancedSearch->SearchValue = @$filter["x_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchOperator = @$filter["z_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchCondition = @$filter["v_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchValue2 = @$filter["y_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->save();

        // Field typeOfAnaesthesia
        $this->typeOfAnaesthesia->AdvancedSearch->SearchValue = @$filter["x_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchOperator = @$filter["z_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchCondition = @$filter["v_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchValue2 = @$filter["y_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchOperator2 = @$filter["w_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->save();

        // Field RecievedTime
        $this->RecievedTime->AdvancedSearch->SearchValue = @$filter["x_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchOperator = @$filter["z_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchCondition = @$filter["v_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchValue2 = @$filter["y_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchOperator2 = @$filter["w_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->save();

        // Field AnaesthesiaStarted
        $this->AnaesthesiaStarted->AdvancedSearch->SearchValue = @$filter["x_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchOperator = @$filter["z_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchCondition = @$filter["v_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchValue2 = @$filter["y_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchOperator2 = @$filter["w_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->save();

        // Field AnaesthesiaEnded
        $this->AnaesthesiaEnded->AdvancedSearch->SearchValue = @$filter["x_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchOperator = @$filter["z_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchCondition = @$filter["v_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchValue2 = @$filter["y_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchOperator2 = @$filter["w_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->save();

        // Field surgeryStarted
        $this->surgeryStarted->AdvancedSearch->SearchValue = @$filter["x_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchOperator = @$filter["z_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchCondition = @$filter["v_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchValue2 = @$filter["y_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->save();

        // Field surgeryEnded
        $this->surgeryEnded->AdvancedSearch->SearchValue = @$filter["x_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchOperator = @$filter["z_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchCondition = @$filter["v_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchValue2 = @$filter["y_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->save();

        // Field RecoveryTime
        $this->RecoveryTime->AdvancedSearch->SearchValue = @$filter["x_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchOperator = @$filter["z_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchCondition = @$filter["v_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchValue2 = @$filter["y_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchOperator2 = @$filter["w_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->save();

        // Field ShiftedTime
        $this->ShiftedTime->AdvancedSearch->SearchValue = @$filter["x_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchOperator = @$filter["z_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchCondition = @$filter["v_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchValue2 = @$filter["y_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchOperator2 = @$filter["w_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->save();

        // Field Duration
        $this->Duration->AdvancedSearch->SearchValue = @$filter["x_Duration"];
        $this->Duration->AdvancedSearch->SearchOperator = @$filter["z_Duration"];
        $this->Duration->AdvancedSearch->SearchCondition = @$filter["v_Duration"];
        $this->Duration->AdvancedSearch->SearchValue2 = @$filter["y_Duration"];
        $this->Duration->AdvancedSearch->SearchOperator2 = @$filter["w_Duration"];
        $this->Duration->AdvancedSearch->save();

        // Field DrVisit1
        $this->DrVisit1->AdvancedSearch->SearchValue = @$filter["x_DrVisit1"];
        $this->DrVisit1->AdvancedSearch->SearchOperator = @$filter["z_DrVisit1"];
        $this->DrVisit1->AdvancedSearch->SearchCondition = @$filter["v_DrVisit1"];
        $this->DrVisit1->AdvancedSearch->SearchValue2 = @$filter["y_DrVisit1"];
        $this->DrVisit1->AdvancedSearch->SearchOperator2 = @$filter["w_DrVisit1"];
        $this->DrVisit1->AdvancedSearch->save();

        // Field DrVisit2
        $this->DrVisit2->AdvancedSearch->SearchValue = @$filter["x_DrVisit2"];
        $this->DrVisit2->AdvancedSearch->SearchOperator = @$filter["z_DrVisit2"];
        $this->DrVisit2->AdvancedSearch->SearchCondition = @$filter["v_DrVisit2"];
        $this->DrVisit2->AdvancedSearch->SearchValue2 = @$filter["y_DrVisit2"];
        $this->DrVisit2->AdvancedSearch->SearchOperator2 = @$filter["w_DrVisit2"];
        $this->DrVisit2->AdvancedSearch->save();

        // Field DrVisit3
        $this->DrVisit3->AdvancedSearch->SearchValue = @$filter["x_DrVisit3"];
        $this->DrVisit3->AdvancedSearch->SearchOperator = @$filter["z_DrVisit3"];
        $this->DrVisit3->AdvancedSearch->SearchCondition = @$filter["v_DrVisit3"];
        $this->DrVisit3->AdvancedSearch->SearchValue2 = @$filter["y_DrVisit3"];
        $this->DrVisit3->AdvancedSearch->SearchOperator2 = @$filter["w_DrVisit3"];
        $this->DrVisit3->AdvancedSearch->save();

        // Field DrVisit4
        $this->DrVisit4->AdvancedSearch->SearchValue = @$filter["x_DrVisit4"];
        $this->DrVisit4->AdvancedSearch->SearchOperator = @$filter["z_DrVisit4"];
        $this->DrVisit4->AdvancedSearch->SearchCondition = @$filter["v_DrVisit4"];
        $this->DrVisit4->AdvancedSearch->SearchValue2 = @$filter["y_DrVisit4"];
        $this->DrVisit4->AdvancedSearch->SearchOperator2 = @$filter["w_DrVisit4"];
        $this->DrVisit4->AdvancedSearch->save();

        // Field Surgeon
        $this->Surgeon->AdvancedSearch->SearchValue = @$filter["x_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchOperator = @$filter["z_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchCondition = @$filter["v_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchValue2 = @$filter["y_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchOperator2 = @$filter["w_Surgeon"];
        $this->Surgeon->AdvancedSearch->save();

        // Field Anaesthetist
        $this->Anaesthetist->AdvancedSearch->SearchValue = @$filter["x_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->save();

        // Field AsstSurgeon1
        $this->AsstSurgeon1->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->save();

        // Field AsstSurgeon2
        $this->AsstSurgeon2->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->save();

        // Field paediatric
        $this->paediatric->AdvancedSearch->SearchValue = @$filter["x_paediatric"];
        $this->paediatric->AdvancedSearch->SearchOperator = @$filter["z_paediatric"];
        $this->paediatric->AdvancedSearch->SearchCondition = @$filter["v_paediatric"];
        $this->paediatric->AdvancedSearch->SearchValue2 = @$filter["y_paediatric"];
        $this->paediatric->AdvancedSearch->SearchOperator2 = @$filter["w_paediatric"];
        $this->paediatric->AdvancedSearch->save();

        // Field ScrubNurse1
        $this->ScrubNurse1->AdvancedSearch->SearchValue = @$filter["x_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchOperator = @$filter["z_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchCondition = @$filter["v_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchValue2 = @$filter["y_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchOperator2 = @$filter["w_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->save();

        // Field ScrubNurse2
        $this->ScrubNurse2->AdvancedSearch->SearchValue = @$filter["x_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchOperator = @$filter["z_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchCondition = @$filter["v_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchValue2 = @$filter["y_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchOperator2 = @$filter["w_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->save();

        // Field FloorNurse
        $this->FloorNurse->AdvancedSearch->SearchValue = @$filter["x_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchOperator = @$filter["z_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchCondition = @$filter["v_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchValue2 = @$filter["y_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchOperator2 = @$filter["w_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->save();

        // Field Technician
        $this->Technician->AdvancedSearch->SearchValue = @$filter["x_Technician"];
        $this->Technician->AdvancedSearch->SearchOperator = @$filter["z_Technician"];
        $this->Technician->AdvancedSearch->SearchCondition = @$filter["v_Technician"];
        $this->Technician->AdvancedSearch->SearchValue2 = @$filter["y_Technician"];
        $this->Technician->AdvancedSearch->SearchOperator2 = @$filter["w_Technician"];
        $this->Technician->AdvancedSearch->save();

        // Field HouseKeeping
        $this->HouseKeeping->AdvancedSearch->SearchValue = @$filter["x_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchOperator = @$filter["z_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchCondition = @$filter["v_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchValue2 = @$filter["y_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchOperator2 = @$filter["w_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->save();

        // Field countsCheckedMops
        $this->countsCheckedMops->AdvancedSearch->SearchValue = @$filter["x_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchOperator = @$filter["z_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchCondition = @$filter["v_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchValue2 = @$filter["y_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchOperator2 = @$filter["w_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->save();

        // Field gauze
        $this->gauze->AdvancedSearch->SearchValue = @$filter["x_gauze"];
        $this->gauze->AdvancedSearch->SearchOperator = @$filter["z_gauze"];
        $this->gauze->AdvancedSearch->SearchCondition = @$filter["v_gauze"];
        $this->gauze->AdvancedSearch->SearchValue2 = @$filter["y_gauze"];
        $this->gauze->AdvancedSearch->SearchOperator2 = @$filter["w_gauze"];
        $this->gauze->AdvancedSearch->save();

        // Field needles
        $this->needles->AdvancedSearch->SearchValue = @$filter["x_needles"];
        $this->needles->AdvancedSearch->SearchOperator = @$filter["z_needles"];
        $this->needles->AdvancedSearch->SearchCondition = @$filter["v_needles"];
        $this->needles->AdvancedSearch->SearchValue2 = @$filter["y_needles"];
        $this->needles->AdvancedSearch->SearchOperator2 = @$filter["w_needles"];
        $this->needles->AdvancedSearch->save();

        // Field bloodloss
        $this->bloodloss->AdvancedSearch->SearchValue = @$filter["x_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchOperator = @$filter["z_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchCondition = @$filter["v_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchValue2 = @$filter["y_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchOperator2 = @$filter["w_bloodloss"];
        $this->bloodloss->AdvancedSearch->save();

        // Field bloodtransfusion
        $this->bloodtransfusion->AdvancedSearch->SearchValue = @$filter["x_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchOperator = @$filter["z_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchCondition = @$filter["v_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchValue2 = @$filter["y_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchOperator2 = @$filter["w_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->save();

        // Field implantsUsed
        $this->implantsUsed->AdvancedSearch->SearchValue = @$filter["x_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchOperator = @$filter["z_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchCondition = @$filter["v_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchValue2 = @$filter["y_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchOperator2 = @$filter["w_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->save();

        // Field MaterialsForHPE
        $this->MaterialsForHPE->AdvancedSearch->SearchValue = @$filter["x_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchOperator = @$filter["z_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchCondition = @$filter["v_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchValue2 = @$filter["y_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchOperator2 = @$filter["w_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->save();

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field PId
        $this->PId->AdvancedSearch->SearchValue = @$filter["x_PId"];
        $this->PId->AdvancedSearch->SearchOperator = @$filter["z_PId"];
        $this->PId->AdvancedSearch->SearchCondition = @$filter["v_PId"];
        $this->PId->AdvancedSearch->SearchValue2 = @$filter["y_PId"];
        $this->PId->AdvancedSearch->SearchOperator2 = @$filter["w_PId"];
        $this->PId->AdvancedSearch->save();

        // Field PatientSearch
        $this->PatientSearch->AdvancedSearch->SearchValue = @$filter["x_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchOperator = @$filter["z_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchCondition = @$filter["v_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchValue2 = @$filter["y_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchOperator2 = @$filter["w_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->PatID, $default, false); // PatID
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->mrnno, $default, false); // mrnno
        $this->buildSearchSql($where, $this->MobileNumber, $default, false); // MobileNumber
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->Gender, $default, false); // Gender
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->ObstetricsHistryMale, $default, false); // ObstetricsHistryMale
        $this->buildSearchSql($where, $this->ObstetricsHistryFeMale, $default, false); // ObstetricsHistryFeMale
        $this->buildSearchSql($where, $this->Abortion, $default, false); // Abortion
        $this->buildSearchSql($where, $this->ChildBirthDate, $default, false); // ChildBirthDate
        $this->buildSearchSql($where, $this->ChildBirthTime, $default, false); // ChildBirthTime
        $this->buildSearchSql($where, $this->ChildSex, $default, false); // ChildSex
        $this->buildSearchSql($where, $this->ChildWt, $default, false); // ChildWt
        $this->buildSearchSql($where, $this->ChildDay, $default, false); // ChildDay
        $this->buildSearchSql($where, $this->ChildOE, $default, false); // ChildOE
        $this->buildSearchSql($where, $this->TypeofDelivery, $default, false); // TypeofDelivery
        $this->buildSearchSql($where, $this->ChildBlGrp, $default, false); // ChildBlGrp
        $this->buildSearchSql($where, $this->ApgarScore, $default, false); // ApgarScore
        $this->buildSearchSql($where, $this->birthnotification, $default, false); // birthnotification
        $this->buildSearchSql($where, $this->formno, $default, false); // formno
        $this->buildSearchSql($where, $this->dte, $default, false); // dte
        $this->buildSearchSql($where, $this->motherReligion, $default, false); // motherReligion
        $this->buildSearchSql($where, $this->bloodgroup, $default, false); // bloodgroup
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->ChildBirthDate1, $default, false); // ChildBirthDate1
        $this->buildSearchSql($where, $this->ChildBirthTime1, $default, false); // ChildBirthTime1
        $this->buildSearchSql($where, $this->ChildSex1, $default, false); // ChildSex1
        $this->buildSearchSql($where, $this->ChildWt1, $default, false); // ChildWt1
        $this->buildSearchSql($where, $this->ChildDay1, $default, false); // ChildDay1
        $this->buildSearchSql($where, $this->ChildOE1, $default, false); // ChildOE1
        $this->buildSearchSql($where, $this->TypeofDelivery1, $default, false); // TypeofDelivery1
        $this->buildSearchSql($where, $this->ChildBlGrp1, $default, false); // ChildBlGrp1
        $this->buildSearchSql($where, $this->ApgarScore1, $default, false); // ApgarScore1
        $this->buildSearchSql($where, $this->birthnotification1, $default, false); // birthnotification1
        $this->buildSearchSql($where, $this->formno1, $default, false); // formno1
        $this->buildSearchSql($where, $this->proposedSurgery, $default, false); // proposedSurgery
        $this->buildSearchSql($where, $this->surgeryProcedure, $default, false); // surgeryProcedure
        $this->buildSearchSql($where, $this->typeOfAnaesthesia, $default, false); // typeOfAnaesthesia
        $this->buildSearchSql($where, $this->RecievedTime, $default, false); // RecievedTime
        $this->buildSearchSql($where, $this->AnaesthesiaStarted, $default, false); // AnaesthesiaStarted
        $this->buildSearchSql($where, $this->AnaesthesiaEnded, $default, false); // AnaesthesiaEnded
        $this->buildSearchSql($where, $this->surgeryStarted, $default, false); // surgeryStarted
        $this->buildSearchSql($where, $this->surgeryEnded, $default, false); // surgeryEnded
        $this->buildSearchSql($where, $this->RecoveryTime, $default, false); // RecoveryTime
        $this->buildSearchSql($where, $this->ShiftedTime, $default, false); // ShiftedTime
        $this->buildSearchSql($where, $this->Duration, $default, false); // Duration
        $this->buildSearchSql($where, $this->DrVisit1, $default, false); // DrVisit1
        $this->buildSearchSql($where, $this->DrVisit2, $default, false); // DrVisit2
        $this->buildSearchSql($where, $this->DrVisit3, $default, false); // DrVisit3
        $this->buildSearchSql($where, $this->DrVisit4, $default, false); // DrVisit4
        $this->buildSearchSql($where, $this->Surgeon, $default, false); // Surgeon
        $this->buildSearchSql($where, $this->Anaesthetist, $default, false); // Anaesthetist
        $this->buildSearchSql($where, $this->AsstSurgeon1, $default, false); // AsstSurgeon1
        $this->buildSearchSql($where, $this->AsstSurgeon2, $default, false); // AsstSurgeon2
        $this->buildSearchSql($where, $this->paediatric, $default, false); // paediatric
        $this->buildSearchSql($where, $this->ScrubNurse1, $default, false); // ScrubNurse1
        $this->buildSearchSql($where, $this->ScrubNurse2, $default, false); // ScrubNurse2
        $this->buildSearchSql($where, $this->FloorNurse, $default, false); // FloorNurse
        $this->buildSearchSql($where, $this->Technician, $default, false); // Technician
        $this->buildSearchSql($where, $this->HouseKeeping, $default, false); // HouseKeeping
        $this->buildSearchSql($where, $this->countsCheckedMops, $default, false); // countsCheckedMops
        $this->buildSearchSql($where, $this->gauze, $default, false); // gauze
        $this->buildSearchSql($where, $this->needles, $default, false); // needles
        $this->buildSearchSql($where, $this->bloodloss, $default, false); // bloodloss
        $this->buildSearchSql($where, $this->bloodtransfusion, $default, false); // bloodtransfusion
        $this->buildSearchSql($where, $this->implantsUsed, $default, false); // implantsUsed
        $this->buildSearchSql($where, $this->MaterialsForHPE, $default, false); // MaterialsForHPE
        $this->buildSearchSql($where, $this->Reception, $default, false); // Reception
        $this->buildSearchSql($where, $this->PId, $default, false); // PId
        $this->buildSearchSql($where, $this->PatientSearch, $default, false); // PatientSearch

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->PatID->AdvancedSearch->save(); // PatID
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->mrnno->AdvancedSearch->save(); // mrnno
            $this->MobileNumber->AdvancedSearch->save(); // MobileNumber
            $this->Age->AdvancedSearch->save(); // Age
            $this->Gender->AdvancedSearch->save(); // Gender
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->ObstetricsHistryMale->AdvancedSearch->save(); // ObstetricsHistryMale
            $this->ObstetricsHistryFeMale->AdvancedSearch->save(); // ObstetricsHistryFeMale
            $this->Abortion->AdvancedSearch->save(); // Abortion
            $this->ChildBirthDate->AdvancedSearch->save(); // ChildBirthDate
            $this->ChildBirthTime->AdvancedSearch->save(); // ChildBirthTime
            $this->ChildSex->AdvancedSearch->save(); // ChildSex
            $this->ChildWt->AdvancedSearch->save(); // ChildWt
            $this->ChildDay->AdvancedSearch->save(); // ChildDay
            $this->ChildOE->AdvancedSearch->save(); // ChildOE
            $this->TypeofDelivery->AdvancedSearch->save(); // TypeofDelivery
            $this->ChildBlGrp->AdvancedSearch->save(); // ChildBlGrp
            $this->ApgarScore->AdvancedSearch->save(); // ApgarScore
            $this->birthnotification->AdvancedSearch->save(); // birthnotification
            $this->formno->AdvancedSearch->save(); // formno
            $this->dte->AdvancedSearch->save(); // dte
            $this->motherReligion->AdvancedSearch->save(); // motherReligion
            $this->bloodgroup->AdvancedSearch->save(); // bloodgroup
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->ChildBirthDate1->AdvancedSearch->save(); // ChildBirthDate1
            $this->ChildBirthTime1->AdvancedSearch->save(); // ChildBirthTime1
            $this->ChildSex1->AdvancedSearch->save(); // ChildSex1
            $this->ChildWt1->AdvancedSearch->save(); // ChildWt1
            $this->ChildDay1->AdvancedSearch->save(); // ChildDay1
            $this->ChildOE1->AdvancedSearch->save(); // ChildOE1
            $this->TypeofDelivery1->AdvancedSearch->save(); // TypeofDelivery1
            $this->ChildBlGrp1->AdvancedSearch->save(); // ChildBlGrp1
            $this->ApgarScore1->AdvancedSearch->save(); // ApgarScore1
            $this->birthnotification1->AdvancedSearch->save(); // birthnotification1
            $this->formno1->AdvancedSearch->save(); // formno1
            $this->proposedSurgery->AdvancedSearch->save(); // proposedSurgery
            $this->surgeryProcedure->AdvancedSearch->save(); // surgeryProcedure
            $this->typeOfAnaesthesia->AdvancedSearch->save(); // typeOfAnaesthesia
            $this->RecievedTime->AdvancedSearch->save(); // RecievedTime
            $this->AnaesthesiaStarted->AdvancedSearch->save(); // AnaesthesiaStarted
            $this->AnaesthesiaEnded->AdvancedSearch->save(); // AnaesthesiaEnded
            $this->surgeryStarted->AdvancedSearch->save(); // surgeryStarted
            $this->surgeryEnded->AdvancedSearch->save(); // surgeryEnded
            $this->RecoveryTime->AdvancedSearch->save(); // RecoveryTime
            $this->ShiftedTime->AdvancedSearch->save(); // ShiftedTime
            $this->Duration->AdvancedSearch->save(); // Duration
            $this->DrVisit1->AdvancedSearch->save(); // DrVisit1
            $this->DrVisit2->AdvancedSearch->save(); // DrVisit2
            $this->DrVisit3->AdvancedSearch->save(); // DrVisit3
            $this->DrVisit4->AdvancedSearch->save(); // DrVisit4
            $this->Surgeon->AdvancedSearch->save(); // Surgeon
            $this->Anaesthetist->AdvancedSearch->save(); // Anaesthetist
            $this->AsstSurgeon1->AdvancedSearch->save(); // AsstSurgeon1
            $this->AsstSurgeon2->AdvancedSearch->save(); // AsstSurgeon2
            $this->paediatric->AdvancedSearch->save(); // paediatric
            $this->ScrubNurse1->AdvancedSearch->save(); // ScrubNurse1
            $this->ScrubNurse2->AdvancedSearch->save(); // ScrubNurse2
            $this->FloorNurse->AdvancedSearch->save(); // FloorNurse
            $this->Technician->AdvancedSearch->save(); // Technician
            $this->HouseKeeping->AdvancedSearch->save(); // HouseKeeping
            $this->countsCheckedMops->AdvancedSearch->save(); // countsCheckedMops
            $this->gauze->AdvancedSearch->save(); // gauze
            $this->needles->AdvancedSearch->save(); // needles
            $this->bloodloss->AdvancedSearch->save(); // bloodloss
            $this->bloodtransfusion->AdvancedSearch->save(); // bloodtransfusion
            $this->implantsUsed->AdvancedSearch->save(); // implantsUsed
            $this->MaterialsForHPE->AdvancedSearch->save(); // MaterialsForHPE
            $this->Reception->AdvancedSearch->save(); // Reception
            $this->PId->AdvancedSearch->save(); // PId
            $this->PatientSearch->AdvancedSearch->save(); // PatientSearch
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
        $this->buildBasicSearchSql($where, $this->PatID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ObstetricsHistryMale, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ObstetricsHistryFeMale, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abortion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildSex, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildWt, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildDay, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildOE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeofDelivery, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildBlGrp, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ApgarScore, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->birthnotification, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->formno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->motherReligion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->bloodgroup, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildBirthTime1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildSex1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildWt1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildDay1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildOE1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeofDelivery1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChildBlGrp1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ApgarScore1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->birthnotification1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->formno1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->proposedSurgery, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->surgeryProcedure, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->typeOfAnaesthesia, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Duration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrVisit1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrVisit2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrVisit3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrVisit4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Surgeon, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Anaesthetist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AsstSurgeon1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AsstSurgeon2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->paediatric, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ScrubNurse1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ScrubNurse2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FloorNurse, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Technician, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HouseKeeping, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->countsCheckedMops, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gauze, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->needles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->bloodloss, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->bloodtransfusion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->implantsUsed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaterialsForHPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientSearch, $arKeywords, $type);
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
        if ($this->PatID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mrnno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MobileNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->profilePic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ObstetricsHistryMale->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ObstetricsHistryFeMale->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Abortion->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildBirthDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildBirthTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildSex->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildWt->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildDay->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildOE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TypeofDelivery->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildBlGrp->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ApgarScore->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->birthnotification->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->formno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->dte->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->motherReligion->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->bloodgroup->AdvancedSearch->issetSession()) {
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
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildBirthDate1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildBirthTime1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildSex1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildWt1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildDay1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildOE1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TypeofDelivery1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChildBlGrp1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ApgarScore1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->birthnotification1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->formno1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->proposedSurgery->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->surgeryProcedure->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->typeOfAnaesthesia->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RecievedTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AnaesthesiaStarted->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AnaesthesiaEnded->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->surgeryStarted->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->surgeryEnded->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RecoveryTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ShiftedTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Duration->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrVisit1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrVisit2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrVisit3->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrVisit4->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Surgeon->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Anaesthetist->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AsstSurgeon1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AsstSurgeon2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->paediatric->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ScrubNurse1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ScrubNurse2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FloorNurse->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Technician->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HouseKeeping->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->countsCheckedMops->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->gauze->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->needles->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->bloodloss->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->bloodtransfusion->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->implantsUsed->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MaterialsForHPE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Reception->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientSearch->AdvancedSearch->issetSession()) {
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
                $this->PatID->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->mrnno->AdvancedSearch->unsetSession();
                $this->MobileNumber->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->Gender->AdvancedSearch->unsetSession();
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->ObstetricsHistryMale->AdvancedSearch->unsetSession();
                $this->ObstetricsHistryFeMale->AdvancedSearch->unsetSession();
                $this->Abortion->AdvancedSearch->unsetSession();
                $this->ChildBirthDate->AdvancedSearch->unsetSession();
                $this->ChildBirthTime->AdvancedSearch->unsetSession();
                $this->ChildSex->AdvancedSearch->unsetSession();
                $this->ChildWt->AdvancedSearch->unsetSession();
                $this->ChildDay->AdvancedSearch->unsetSession();
                $this->ChildOE->AdvancedSearch->unsetSession();
                $this->TypeofDelivery->AdvancedSearch->unsetSession();
                $this->ChildBlGrp->AdvancedSearch->unsetSession();
                $this->ApgarScore->AdvancedSearch->unsetSession();
                $this->birthnotification->AdvancedSearch->unsetSession();
                $this->formno->AdvancedSearch->unsetSession();
                $this->dte->AdvancedSearch->unsetSession();
                $this->motherReligion->AdvancedSearch->unsetSession();
                $this->bloodgroup->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->ChildBirthDate1->AdvancedSearch->unsetSession();
                $this->ChildBirthTime1->AdvancedSearch->unsetSession();
                $this->ChildSex1->AdvancedSearch->unsetSession();
                $this->ChildWt1->AdvancedSearch->unsetSession();
                $this->ChildDay1->AdvancedSearch->unsetSession();
                $this->ChildOE1->AdvancedSearch->unsetSession();
                $this->TypeofDelivery1->AdvancedSearch->unsetSession();
                $this->ChildBlGrp1->AdvancedSearch->unsetSession();
                $this->ApgarScore1->AdvancedSearch->unsetSession();
                $this->birthnotification1->AdvancedSearch->unsetSession();
                $this->formno1->AdvancedSearch->unsetSession();
                $this->proposedSurgery->AdvancedSearch->unsetSession();
                $this->surgeryProcedure->AdvancedSearch->unsetSession();
                $this->typeOfAnaesthesia->AdvancedSearch->unsetSession();
                $this->RecievedTime->AdvancedSearch->unsetSession();
                $this->AnaesthesiaStarted->AdvancedSearch->unsetSession();
                $this->AnaesthesiaEnded->AdvancedSearch->unsetSession();
                $this->surgeryStarted->AdvancedSearch->unsetSession();
                $this->surgeryEnded->AdvancedSearch->unsetSession();
                $this->RecoveryTime->AdvancedSearch->unsetSession();
                $this->ShiftedTime->AdvancedSearch->unsetSession();
                $this->Duration->AdvancedSearch->unsetSession();
                $this->DrVisit1->AdvancedSearch->unsetSession();
                $this->DrVisit2->AdvancedSearch->unsetSession();
                $this->DrVisit3->AdvancedSearch->unsetSession();
                $this->DrVisit4->AdvancedSearch->unsetSession();
                $this->Surgeon->AdvancedSearch->unsetSession();
                $this->Anaesthetist->AdvancedSearch->unsetSession();
                $this->AsstSurgeon1->AdvancedSearch->unsetSession();
                $this->AsstSurgeon2->AdvancedSearch->unsetSession();
                $this->paediatric->AdvancedSearch->unsetSession();
                $this->ScrubNurse1->AdvancedSearch->unsetSession();
                $this->ScrubNurse2->AdvancedSearch->unsetSession();
                $this->FloorNurse->AdvancedSearch->unsetSession();
                $this->Technician->AdvancedSearch->unsetSession();
                $this->HouseKeeping->AdvancedSearch->unsetSession();
                $this->countsCheckedMops->AdvancedSearch->unsetSession();
                $this->gauze->AdvancedSearch->unsetSession();
                $this->needles->AdvancedSearch->unsetSession();
                $this->bloodloss->AdvancedSearch->unsetSession();
                $this->bloodtransfusion->AdvancedSearch->unsetSession();
                $this->implantsUsed->AdvancedSearch->unsetSession();
                $this->MaterialsForHPE->AdvancedSearch->unsetSession();
                $this->Reception->AdvancedSearch->unsetSession();
                $this->PId->AdvancedSearch->unsetSession();
                $this->PatientSearch->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->PatID->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->mrnno->AdvancedSearch->load();
                $this->MobileNumber->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->Gender->AdvancedSearch->load();
                $this->profilePic->AdvancedSearch->load();
                $this->ObstetricsHistryMale->AdvancedSearch->load();
                $this->ObstetricsHistryFeMale->AdvancedSearch->load();
                $this->Abortion->AdvancedSearch->load();
                $this->ChildBirthDate->AdvancedSearch->load();
                $this->ChildBirthTime->AdvancedSearch->load();
                $this->ChildSex->AdvancedSearch->load();
                $this->ChildWt->AdvancedSearch->load();
                $this->ChildDay->AdvancedSearch->load();
                $this->ChildOE->AdvancedSearch->load();
                $this->TypeofDelivery->AdvancedSearch->load();
                $this->ChildBlGrp->AdvancedSearch->load();
                $this->ApgarScore->AdvancedSearch->load();
                $this->birthnotification->AdvancedSearch->load();
                $this->formno->AdvancedSearch->load();
                $this->dte->AdvancedSearch->load();
                $this->motherReligion->AdvancedSearch->load();
                $this->bloodgroup->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->ChildBirthDate1->AdvancedSearch->load();
                $this->ChildBirthTime1->AdvancedSearch->load();
                $this->ChildSex1->AdvancedSearch->load();
                $this->ChildWt1->AdvancedSearch->load();
                $this->ChildDay1->AdvancedSearch->load();
                $this->ChildOE1->AdvancedSearch->load();
                $this->TypeofDelivery1->AdvancedSearch->load();
                $this->ChildBlGrp1->AdvancedSearch->load();
                $this->ApgarScore1->AdvancedSearch->load();
                $this->birthnotification1->AdvancedSearch->load();
                $this->formno1->AdvancedSearch->load();
                $this->proposedSurgery->AdvancedSearch->load();
                $this->surgeryProcedure->AdvancedSearch->load();
                $this->typeOfAnaesthesia->AdvancedSearch->load();
                $this->RecievedTime->AdvancedSearch->load();
                $this->AnaesthesiaStarted->AdvancedSearch->load();
                $this->AnaesthesiaEnded->AdvancedSearch->load();
                $this->surgeryStarted->AdvancedSearch->load();
                $this->surgeryEnded->AdvancedSearch->load();
                $this->RecoveryTime->AdvancedSearch->load();
                $this->ShiftedTime->AdvancedSearch->load();
                $this->Duration->AdvancedSearch->load();
                $this->DrVisit1->AdvancedSearch->load();
                $this->DrVisit2->AdvancedSearch->load();
                $this->DrVisit3->AdvancedSearch->load();
                $this->DrVisit4->AdvancedSearch->load();
                $this->Surgeon->AdvancedSearch->load();
                $this->Anaesthetist->AdvancedSearch->load();
                $this->AsstSurgeon1->AdvancedSearch->load();
                $this->AsstSurgeon2->AdvancedSearch->load();
                $this->paediatric->AdvancedSearch->load();
                $this->ScrubNurse1->AdvancedSearch->load();
                $this->ScrubNurse2->AdvancedSearch->load();
                $this->FloorNurse->AdvancedSearch->load();
                $this->Technician->AdvancedSearch->load();
                $this->HouseKeeping->AdvancedSearch->load();
                $this->countsCheckedMops->AdvancedSearch->load();
                $this->gauze->AdvancedSearch->load();
                $this->needles->AdvancedSearch->load();
                $this->bloodloss->AdvancedSearch->load();
                $this->bloodtransfusion->AdvancedSearch->load();
                $this->implantsUsed->AdvancedSearch->load();
                $this->MaterialsForHPE->AdvancedSearch->load();
                $this->Reception->AdvancedSearch->load();
                $this->PId->AdvancedSearch->load();
                $this->PatientSearch->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->MobileNumber); // MobileNumber
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->Gender); // Gender
            $this->updateSort($this->ObstetricsHistryFeMale); // ObstetricsHistryFeMale
            $this->updateSort($this->Abortion); // Abortion
            $this->updateSort($this->ChildBirthDate); // ChildBirthDate
            $this->updateSort($this->ChildBirthTime); // ChildBirthTime
            $this->updateSort($this->ChildSex); // ChildSex
            $this->updateSort($this->ChildWt); // ChildWt
            $this->updateSort($this->ChildDay); // ChildDay
            $this->updateSort($this->ChildOE); // ChildOE
            $this->updateSort($this->ChildBlGrp); // ChildBlGrp
            $this->updateSort($this->ApgarScore); // ApgarScore
            $this->updateSort($this->birthnotification); // birthnotification
            $this->updateSort($this->formno); // formno
            $this->updateSort($this->dte); // dte
            $this->updateSort($this->motherReligion); // motherReligion
            $this->updateSort($this->bloodgroup); // bloodgroup
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->ChildBirthDate1); // ChildBirthDate1
            $this->updateSort($this->ChildBirthTime1); // ChildBirthTime1
            $this->updateSort($this->ChildSex1); // ChildSex1
            $this->updateSort($this->ChildWt1); // ChildWt1
            $this->updateSort($this->ChildDay1); // ChildDay1
            $this->updateSort($this->ChildOE1); // ChildOE1
            $this->updateSort($this->ChildBlGrp1); // ChildBlGrp1
            $this->updateSort($this->ApgarScore1); // ApgarScore1
            $this->updateSort($this->birthnotification1); // birthnotification1
            $this->updateSort($this->formno1); // formno1
            $this->updateSort($this->RecievedTime); // RecievedTime
            $this->updateSort($this->AnaesthesiaStarted); // AnaesthesiaStarted
            $this->updateSort($this->AnaesthesiaEnded); // AnaesthesiaEnded
            $this->updateSort($this->surgeryStarted); // surgeryStarted
            $this->updateSort($this->surgeryEnded); // surgeryEnded
            $this->updateSort($this->RecoveryTime); // RecoveryTime
            $this->updateSort($this->ShiftedTime); // ShiftedTime
            $this->updateSort($this->Duration); // Duration
            $this->updateSort($this->Surgeon); // Surgeon
            $this->updateSort($this->Anaesthetist); // Anaesthetist
            $this->updateSort($this->AsstSurgeon1); // AsstSurgeon1
            $this->updateSort($this->AsstSurgeon2); // AsstSurgeon2
            $this->updateSort($this->paediatric); // paediatric
            $this->updateSort($this->ScrubNurse1); // ScrubNurse1
            $this->updateSort($this->ScrubNurse2); // ScrubNurse2
            $this->updateSort($this->FloorNurse); // FloorNurse
            $this->updateSort($this->Technician); // Technician
            $this->updateSort($this->HouseKeeping); // HouseKeeping
            $this->updateSort($this->countsCheckedMops); // countsCheckedMops
            $this->updateSort($this->gauze); // gauze
            $this->updateSort($this->needles); // needles
            $this->updateSort($this->bloodloss); // bloodloss
            $this->updateSort($this->bloodtransfusion); // bloodtransfusion
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->PId); // PId
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

            // Reset master/detail keys
            if ($this->Command == "resetall") {
                $this->setCurrentMasterTable(""); // Clear master table
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
                        $this->Reception->setSessionValue("");
                        $this->mrnno->setSessionValue("");
                        $this->PId->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->PatID->setSort("");
                $this->PatientName->setSort("");
                $this->mrnno->setSort("");
                $this->MobileNumber->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->profilePic->setSort("");
                $this->ObstetricsHistryMale->setSort("");
                $this->ObstetricsHistryFeMale->setSort("");
                $this->Abortion->setSort("");
                $this->ChildBirthDate->setSort("");
                $this->ChildBirthTime->setSort("");
                $this->ChildSex->setSort("");
                $this->ChildWt->setSort("");
                $this->ChildDay->setSort("");
                $this->ChildOE->setSort("");
                $this->TypeofDelivery->setSort("");
                $this->ChildBlGrp->setSort("");
                $this->ApgarScore->setSort("");
                $this->birthnotification->setSort("");
                $this->formno->setSort("");
                $this->dte->setSort("");
                $this->motherReligion->setSort("");
                $this->bloodgroup->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->PatientID->setSort("");
                $this->HospID->setSort("");
                $this->ChildBirthDate1->setSort("");
                $this->ChildBirthTime1->setSort("");
                $this->ChildSex1->setSort("");
                $this->ChildWt1->setSort("");
                $this->ChildDay1->setSort("");
                $this->ChildOE1->setSort("");
                $this->TypeofDelivery1->setSort("");
                $this->ChildBlGrp1->setSort("");
                $this->ApgarScore1->setSort("");
                $this->birthnotification1->setSort("");
                $this->formno1->setSort("");
                $this->proposedSurgery->setSort("");
                $this->surgeryProcedure->setSort("");
                $this->typeOfAnaesthesia->setSort("");
                $this->RecievedTime->setSort("");
                $this->AnaesthesiaStarted->setSort("");
                $this->AnaesthesiaEnded->setSort("");
                $this->surgeryStarted->setSort("");
                $this->surgeryEnded->setSort("");
                $this->RecoveryTime->setSort("");
                $this->ShiftedTime->setSort("");
                $this->Duration->setSort("");
                $this->DrVisit1->setSort("");
                $this->DrVisit2->setSort("");
                $this->DrVisit3->setSort("");
                $this->DrVisit4->setSort("");
                $this->Surgeon->setSort("");
                $this->Anaesthetist->setSort("");
                $this->AsstSurgeon1->setSort("");
                $this->AsstSurgeon2->setSort("");
                $this->paediatric->setSort("");
                $this->ScrubNurse1->setSort("");
                $this->ScrubNurse2->setSort("");
                $this->FloorNurse->setSort("");
                $this->Technician->setSort("");
                $this->HouseKeeping->setSort("");
                $this->countsCheckedMops->setSort("");
                $this->gauze->setSort("");
                $this->needles->setSort("");
                $this->bloodloss->setSort("");
                $this->bloodtransfusion->setSort("");
                $this->implantsUsed->setSort("");
                $this->MaterialsForHPE->setSort("");
                $this->Reception->setSort("");
                $this->PId->setSort("");
                $this->PatientSearch->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_ot_delivery_registerlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_ot_delivery_registerlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpatient_ot_delivery_registerlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // PatID
        if (!$this->isAddOrEdit() && $this->PatID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatID->AdvancedSearch->SearchValue != "" || $this->PatID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientName
        if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mrnno
        if (!$this->isAddOrEdit() && $this->mrnno->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mrnno->AdvancedSearch->SearchValue != "" || $this->mrnno->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MobileNumber
        if (!$this->isAddOrEdit() && $this->MobileNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MobileNumber->AdvancedSearch->SearchValue != "" || $this->MobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Gender
        if (!$this->isAddOrEdit() && $this->Gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Gender->AdvancedSearch->SearchValue != "" || $this->Gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // ObstetricsHistryMale
        if (!$this->isAddOrEdit() && $this->ObstetricsHistryMale->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ObstetricsHistryMale->AdvancedSearch->SearchValue != "" || $this->ObstetricsHistryMale->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ObstetricsHistryFeMale
        if (!$this->isAddOrEdit() && $this->ObstetricsHistryFeMale->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue != "" || $this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Abortion
        if (!$this->isAddOrEdit() && $this->Abortion->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Abortion->AdvancedSearch->SearchValue != "" || $this->Abortion->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildBirthDate
        if (!$this->isAddOrEdit() && $this->ChildBirthDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildBirthDate->AdvancedSearch->SearchValue != "" || $this->ChildBirthDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildBirthTime
        if (!$this->isAddOrEdit() && $this->ChildBirthTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildBirthTime->AdvancedSearch->SearchValue != "" || $this->ChildBirthTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildSex
        if (!$this->isAddOrEdit() && $this->ChildSex->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildSex->AdvancedSearch->SearchValue != "" || $this->ChildSex->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildWt
        if (!$this->isAddOrEdit() && $this->ChildWt->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildWt->AdvancedSearch->SearchValue != "" || $this->ChildWt->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildDay
        if (!$this->isAddOrEdit() && $this->ChildDay->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildDay->AdvancedSearch->SearchValue != "" || $this->ChildDay->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildOE
        if (!$this->isAddOrEdit() && $this->ChildOE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildOE->AdvancedSearch->SearchValue != "" || $this->ChildOE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TypeofDelivery
        if (!$this->isAddOrEdit() && $this->TypeofDelivery->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TypeofDelivery->AdvancedSearch->SearchValue != "" || $this->TypeofDelivery->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildBlGrp
        if (!$this->isAddOrEdit() && $this->ChildBlGrp->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildBlGrp->AdvancedSearch->SearchValue != "" || $this->ChildBlGrp->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ApgarScore
        if (!$this->isAddOrEdit() && $this->ApgarScore->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ApgarScore->AdvancedSearch->SearchValue != "" || $this->ApgarScore->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // birthnotification
        if (!$this->isAddOrEdit() && $this->birthnotification->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->birthnotification->AdvancedSearch->SearchValue != "" || $this->birthnotification->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // formno
        if (!$this->isAddOrEdit() && $this->formno->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->formno->AdvancedSearch->SearchValue != "" || $this->formno->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // dte
        if (!$this->isAddOrEdit() && $this->dte->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->dte->AdvancedSearch->SearchValue != "" || $this->dte->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // motherReligion
        if (!$this->isAddOrEdit() && $this->motherReligion->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->motherReligion->AdvancedSearch->SearchValue != "" || $this->motherReligion->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // bloodgroup
        if (!$this->isAddOrEdit() && $this->bloodgroup->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->bloodgroup->AdvancedSearch->SearchValue != "" || $this->bloodgroup->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatientID
        if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // ChildBirthDate1
        if (!$this->isAddOrEdit() && $this->ChildBirthDate1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildBirthDate1->AdvancedSearch->SearchValue != "" || $this->ChildBirthDate1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildBirthTime1
        if (!$this->isAddOrEdit() && $this->ChildBirthTime1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildBirthTime1->AdvancedSearch->SearchValue != "" || $this->ChildBirthTime1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildSex1
        if (!$this->isAddOrEdit() && $this->ChildSex1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildSex1->AdvancedSearch->SearchValue != "" || $this->ChildSex1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildWt1
        if (!$this->isAddOrEdit() && $this->ChildWt1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildWt1->AdvancedSearch->SearchValue != "" || $this->ChildWt1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildDay1
        if (!$this->isAddOrEdit() && $this->ChildDay1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildDay1->AdvancedSearch->SearchValue != "" || $this->ChildDay1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildOE1
        if (!$this->isAddOrEdit() && $this->ChildOE1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildOE1->AdvancedSearch->SearchValue != "" || $this->ChildOE1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TypeofDelivery1
        if (!$this->isAddOrEdit() && $this->TypeofDelivery1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TypeofDelivery1->AdvancedSearch->SearchValue != "" || $this->TypeofDelivery1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChildBlGrp1
        if (!$this->isAddOrEdit() && $this->ChildBlGrp1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChildBlGrp1->AdvancedSearch->SearchValue != "" || $this->ChildBlGrp1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ApgarScore1
        if (!$this->isAddOrEdit() && $this->ApgarScore1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ApgarScore1->AdvancedSearch->SearchValue != "" || $this->ApgarScore1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // birthnotification1
        if (!$this->isAddOrEdit() && $this->birthnotification1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->birthnotification1->AdvancedSearch->SearchValue != "" || $this->birthnotification1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // formno1
        if (!$this->isAddOrEdit() && $this->formno1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->formno1->AdvancedSearch->SearchValue != "" || $this->formno1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // proposedSurgery
        if (!$this->isAddOrEdit() && $this->proposedSurgery->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->proposedSurgery->AdvancedSearch->SearchValue != "" || $this->proposedSurgery->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // surgeryProcedure
        if (!$this->isAddOrEdit() && $this->surgeryProcedure->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->surgeryProcedure->AdvancedSearch->SearchValue != "" || $this->surgeryProcedure->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // typeOfAnaesthesia
        if (!$this->isAddOrEdit() && $this->typeOfAnaesthesia->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->typeOfAnaesthesia->AdvancedSearch->SearchValue != "" || $this->typeOfAnaesthesia->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RecievedTime
        if (!$this->isAddOrEdit() && $this->RecievedTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RecievedTime->AdvancedSearch->SearchValue != "" || $this->RecievedTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AnaesthesiaStarted
        if (!$this->isAddOrEdit() && $this->AnaesthesiaStarted->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AnaesthesiaStarted->AdvancedSearch->SearchValue != "" || $this->AnaesthesiaStarted->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AnaesthesiaEnded
        if (!$this->isAddOrEdit() && $this->AnaesthesiaEnded->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AnaesthesiaEnded->AdvancedSearch->SearchValue != "" || $this->AnaesthesiaEnded->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // surgeryStarted
        if (!$this->isAddOrEdit() && $this->surgeryStarted->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->surgeryStarted->AdvancedSearch->SearchValue != "" || $this->surgeryStarted->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // surgeryEnded
        if (!$this->isAddOrEdit() && $this->surgeryEnded->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->surgeryEnded->AdvancedSearch->SearchValue != "" || $this->surgeryEnded->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RecoveryTime
        if (!$this->isAddOrEdit() && $this->RecoveryTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RecoveryTime->AdvancedSearch->SearchValue != "" || $this->RecoveryTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ShiftedTime
        if (!$this->isAddOrEdit() && $this->ShiftedTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ShiftedTime->AdvancedSearch->SearchValue != "" || $this->ShiftedTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Duration
        if (!$this->isAddOrEdit() && $this->Duration->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Duration->AdvancedSearch->SearchValue != "" || $this->Duration->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrVisit1
        if (!$this->isAddOrEdit() && $this->DrVisit1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrVisit1->AdvancedSearch->SearchValue != "" || $this->DrVisit1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrVisit2
        if (!$this->isAddOrEdit() && $this->DrVisit2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrVisit2->AdvancedSearch->SearchValue != "" || $this->DrVisit2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrVisit3
        if (!$this->isAddOrEdit() && $this->DrVisit3->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrVisit3->AdvancedSearch->SearchValue != "" || $this->DrVisit3->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrVisit4
        if (!$this->isAddOrEdit() && $this->DrVisit4->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrVisit4->AdvancedSearch->SearchValue != "" || $this->DrVisit4->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Surgeon
        if (!$this->isAddOrEdit() && $this->Surgeon->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Surgeon->AdvancedSearch->SearchValue != "" || $this->Surgeon->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Anaesthetist
        if (!$this->isAddOrEdit() && $this->Anaesthetist->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Anaesthetist->AdvancedSearch->SearchValue != "" || $this->Anaesthetist->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AsstSurgeon1
        if (!$this->isAddOrEdit() && $this->AsstSurgeon1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AsstSurgeon1->AdvancedSearch->SearchValue != "" || $this->AsstSurgeon1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AsstSurgeon2
        if (!$this->isAddOrEdit() && $this->AsstSurgeon2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AsstSurgeon2->AdvancedSearch->SearchValue != "" || $this->AsstSurgeon2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // paediatric
        if (!$this->isAddOrEdit() && $this->paediatric->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->paediatric->AdvancedSearch->SearchValue != "" || $this->paediatric->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ScrubNurse1
        if (!$this->isAddOrEdit() && $this->ScrubNurse1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ScrubNurse1->AdvancedSearch->SearchValue != "" || $this->ScrubNurse1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ScrubNurse2
        if (!$this->isAddOrEdit() && $this->ScrubNurse2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ScrubNurse2->AdvancedSearch->SearchValue != "" || $this->ScrubNurse2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FloorNurse
        if (!$this->isAddOrEdit() && $this->FloorNurse->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FloorNurse->AdvancedSearch->SearchValue != "" || $this->FloorNurse->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Technician
        if (!$this->isAddOrEdit() && $this->Technician->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Technician->AdvancedSearch->SearchValue != "" || $this->Technician->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HouseKeeping
        if (!$this->isAddOrEdit() && $this->HouseKeeping->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HouseKeeping->AdvancedSearch->SearchValue != "" || $this->HouseKeeping->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // countsCheckedMops
        if (!$this->isAddOrEdit() && $this->countsCheckedMops->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->countsCheckedMops->AdvancedSearch->SearchValue != "" || $this->countsCheckedMops->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // gauze
        if (!$this->isAddOrEdit() && $this->gauze->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->gauze->AdvancedSearch->SearchValue != "" || $this->gauze->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // needles
        if (!$this->isAddOrEdit() && $this->needles->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->needles->AdvancedSearch->SearchValue != "" || $this->needles->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // bloodloss
        if (!$this->isAddOrEdit() && $this->bloodloss->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->bloodloss->AdvancedSearch->SearchValue != "" || $this->bloodloss->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // bloodtransfusion
        if (!$this->isAddOrEdit() && $this->bloodtransfusion->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->bloodtransfusion->AdvancedSearch->SearchValue != "" || $this->bloodtransfusion->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // implantsUsed
        if (!$this->isAddOrEdit() && $this->implantsUsed->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->implantsUsed->AdvancedSearch->SearchValue != "" || $this->implantsUsed->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MaterialsForHPE
        if (!$this->isAddOrEdit() && $this->MaterialsForHPE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MaterialsForHPE->AdvancedSearch->SearchValue != "" || $this->MaterialsForHPE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Reception
        if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PId
        if (!$this->isAddOrEdit() && $this->PId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PId->AdvancedSearch->SearchValue != "" || $this->PId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientSearch
        if (!$this->isAddOrEdit() && $this->PatientSearch->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientSearch->AdvancedSearch->SearchValue != "" || $this->PatientSearch->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->ObstetricsHistryMale->setDbValue($row['ObstetricsHistryMale']);
        $this->ObstetricsHistryFeMale->setDbValue($row['ObstetricsHistryFeMale']);
        $this->Abortion->setDbValue($row['Abortion']);
        $this->ChildBirthDate->setDbValue($row['ChildBirthDate']);
        $this->ChildBirthTime->setDbValue($row['ChildBirthTime']);
        $this->ChildSex->setDbValue($row['ChildSex']);
        $this->ChildWt->setDbValue($row['ChildWt']);
        $this->ChildDay->setDbValue($row['ChildDay']);
        $this->ChildOE->setDbValue($row['ChildOE']);
        $this->TypeofDelivery->setDbValue($row['TypeofDelivery']);
        $this->ChildBlGrp->setDbValue($row['ChildBlGrp']);
        $this->ApgarScore->setDbValue($row['ApgarScore']);
        $this->birthnotification->setDbValue($row['birthnotification']);
        $this->formno->setDbValue($row['formno']);
        $this->dte->setDbValue($row['dte']);
        $this->motherReligion->setDbValue($row['motherReligion']);
        $this->bloodgroup->setDbValue($row['bloodgroup']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ChildBirthDate1->setDbValue($row['ChildBirthDate1']);
        $this->ChildBirthTime1->setDbValue($row['ChildBirthTime1']);
        $this->ChildSex1->setDbValue($row['ChildSex1']);
        $this->ChildWt1->setDbValue($row['ChildWt1']);
        $this->ChildDay1->setDbValue($row['ChildDay1']);
        $this->ChildOE1->setDbValue($row['ChildOE1']);
        $this->TypeofDelivery1->setDbValue($row['TypeofDelivery1']);
        $this->ChildBlGrp1->setDbValue($row['ChildBlGrp1']);
        $this->ApgarScore1->setDbValue($row['ApgarScore1']);
        $this->birthnotification1->setDbValue($row['birthnotification1']);
        $this->formno1->setDbValue($row['formno1']);
        $this->proposedSurgery->setDbValue($row['proposedSurgery']);
        $this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
        $this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
        $this->RecievedTime->setDbValue($row['RecievedTime']);
        $this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
        $this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
        $this->surgeryStarted->setDbValue($row['surgeryStarted']);
        $this->surgeryEnded->setDbValue($row['surgeryEnded']);
        $this->RecoveryTime->setDbValue($row['RecoveryTime']);
        $this->ShiftedTime->setDbValue($row['ShiftedTime']);
        $this->Duration->setDbValue($row['Duration']);
        $this->DrVisit1->setDbValue($row['DrVisit1']);
        $this->DrVisit2->setDbValue($row['DrVisit2']);
        $this->DrVisit3->setDbValue($row['DrVisit3']);
        $this->DrVisit4->setDbValue($row['DrVisit4']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
        $this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
        $this->paediatric->setDbValue($row['paediatric']);
        $this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
        $this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
        $this->FloorNurse->setDbValue($row['FloorNurse']);
        $this->Technician->setDbValue($row['Technician']);
        $this->HouseKeeping->setDbValue($row['HouseKeeping']);
        $this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
        $this->gauze->setDbValue($row['gauze']);
        $this->needles->setDbValue($row['needles']);
        $this->bloodloss->setDbValue($row['bloodloss']);
        $this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
        $this->implantsUsed->setDbValue($row['implantsUsed']);
        $this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PId->setDbValue($row['PId']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatID'] = null;
        $row['PatientName'] = null;
        $row['mrnno'] = null;
        $row['MobileNumber'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['ObstetricsHistryMale'] = null;
        $row['ObstetricsHistryFeMale'] = null;
        $row['Abortion'] = null;
        $row['ChildBirthDate'] = null;
        $row['ChildBirthTime'] = null;
        $row['ChildSex'] = null;
        $row['ChildWt'] = null;
        $row['ChildDay'] = null;
        $row['ChildOE'] = null;
        $row['TypeofDelivery'] = null;
        $row['ChildBlGrp'] = null;
        $row['ApgarScore'] = null;
        $row['birthnotification'] = null;
        $row['formno'] = null;
        $row['dte'] = null;
        $row['motherReligion'] = null;
        $row['bloodgroup'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatientID'] = null;
        $row['HospID'] = null;
        $row['ChildBirthDate1'] = null;
        $row['ChildBirthTime1'] = null;
        $row['ChildSex1'] = null;
        $row['ChildWt1'] = null;
        $row['ChildDay1'] = null;
        $row['ChildOE1'] = null;
        $row['TypeofDelivery1'] = null;
        $row['ChildBlGrp1'] = null;
        $row['ApgarScore1'] = null;
        $row['birthnotification1'] = null;
        $row['formno1'] = null;
        $row['proposedSurgery'] = null;
        $row['surgeryProcedure'] = null;
        $row['typeOfAnaesthesia'] = null;
        $row['RecievedTime'] = null;
        $row['AnaesthesiaStarted'] = null;
        $row['AnaesthesiaEnded'] = null;
        $row['surgeryStarted'] = null;
        $row['surgeryEnded'] = null;
        $row['RecoveryTime'] = null;
        $row['ShiftedTime'] = null;
        $row['Duration'] = null;
        $row['DrVisit1'] = null;
        $row['DrVisit2'] = null;
        $row['DrVisit3'] = null;
        $row['DrVisit4'] = null;
        $row['Surgeon'] = null;
        $row['Anaesthetist'] = null;
        $row['AsstSurgeon1'] = null;
        $row['AsstSurgeon2'] = null;
        $row['paediatric'] = null;
        $row['ScrubNurse1'] = null;
        $row['ScrubNurse2'] = null;
        $row['FloorNurse'] = null;
        $row['Technician'] = null;
        $row['HouseKeeping'] = null;
        $row['countsCheckedMops'] = null;
        $row['gauze'] = null;
        $row['needles'] = null;
        $row['bloodloss'] = null;
        $row['bloodtransfusion'] = null;
        $row['implantsUsed'] = null;
        $row['MaterialsForHPE'] = null;
        $row['Reception'] = null;
        $row['PId'] = null;
        $row['PatientSearch'] = null;
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

        // PatID

        // PatientName

        // mrnno

        // MobileNumber

        // Age

        // Gender

        // profilePic

        // ObstetricsHistryMale

        // ObstetricsHistryFeMale

        // Abortion

        // ChildBirthDate

        // ChildBirthTime

        // ChildSex

        // ChildWt

        // ChildDay

        // ChildOE

        // TypeofDelivery

        // ChildBlGrp

        // ApgarScore

        // birthnotification

        // formno

        // dte

        // motherReligion

        // bloodgroup

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatientID

        // HospID

        // ChildBirthDate1

        // ChildBirthTime1

        // ChildSex1

        // ChildWt1

        // ChildDay1

        // ChildOE1

        // TypeofDelivery1

        // ChildBlGrp1

        // ApgarScore1

        // birthnotification1

        // formno1

        // proposedSurgery

        // surgeryProcedure

        // typeOfAnaesthesia

        // RecievedTime

        // AnaesthesiaStarted

        // AnaesthesiaEnded

        // surgeryStarted

        // surgeryEnded

        // RecoveryTime

        // ShiftedTime

        // Duration

        // DrVisit1

        // DrVisit2

        // DrVisit3

        // DrVisit4

        // Surgeon

        // Anaesthetist

        // AsstSurgeon1

        // AsstSurgeon2

        // paediatric

        // ScrubNurse1

        // ScrubNurse2

        // FloorNurse

        // Technician

        // HouseKeeping

        // countsCheckedMops

        // gauze

        // needles

        // bloodloss

        // bloodtransfusion

        // implantsUsed

        // MaterialsForHPE

        // Reception

        // PId

        // PatientSearch
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->ViewValue = $this->ObstetricsHistryFeMale->CurrentValue;
            $this->ObstetricsHistryFeMale->ViewCustomAttributes = "";

            // Abortion
            $this->Abortion->ViewValue = $this->Abortion->CurrentValue;
            $this->Abortion->ViewCustomAttributes = "";

            // ChildBirthDate
            $this->ChildBirthDate->ViewValue = $this->ChildBirthDate->CurrentValue;
            $this->ChildBirthDate->ViewValue = FormatDateTime($this->ChildBirthDate->ViewValue, 7);
            $this->ChildBirthDate->ViewCustomAttributes = "";

            // ChildBirthTime
            $this->ChildBirthTime->ViewValue = $this->ChildBirthTime->CurrentValue;
            $this->ChildBirthTime->ViewCustomAttributes = "";

            // ChildSex
            $this->ChildSex->ViewValue = $this->ChildSex->CurrentValue;
            $this->ChildSex->ViewCustomAttributes = "";

            // ChildWt
            $this->ChildWt->ViewValue = $this->ChildWt->CurrentValue;
            $this->ChildWt->ViewCustomAttributes = "";

            // ChildDay
            $this->ChildDay->ViewValue = $this->ChildDay->CurrentValue;
            $this->ChildDay->ViewCustomAttributes = "";

            // ChildOE
            $this->ChildOE->ViewValue = $this->ChildOE->CurrentValue;
            $this->ChildOE->ViewCustomAttributes = "";

            // ChildBlGrp
            $this->ChildBlGrp->ViewValue = $this->ChildBlGrp->CurrentValue;
            $this->ChildBlGrp->ViewCustomAttributes = "";

            // ApgarScore
            $this->ApgarScore->ViewValue = $this->ApgarScore->CurrentValue;
            $this->ApgarScore->ViewCustomAttributes = "";

            // birthnotification
            $this->birthnotification->ViewValue = $this->birthnotification->CurrentValue;
            $this->birthnotification->ViewCustomAttributes = "";

            // formno
            $this->formno->ViewValue = $this->formno->CurrentValue;
            $this->formno->ViewCustomAttributes = "";

            // dte
            $this->dte->ViewValue = $this->dte->CurrentValue;
            $this->dte->ViewValue = FormatDateTime($this->dte->ViewValue, 0);
            $this->dte->ViewCustomAttributes = "";

            // motherReligion
            $this->motherReligion->ViewValue = $this->motherReligion->CurrentValue;
            $this->motherReligion->ViewCustomAttributes = "";

            // bloodgroup
            $this->bloodgroup->ViewValue = $this->bloodgroup->CurrentValue;
            $this->bloodgroup->ViewCustomAttributes = "";

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

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->ViewValue = $this->ChildBirthDate1->CurrentValue;
            $this->ChildBirthDate1->ViewValue = FormatDateTime($this->ChildBirthDate1->ViewValue, 0);
            $this->ChildBirthDate1->ViewCustomAttributes = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->ViewValue = $this->ChildBirthTime1->CurrentValue;
            $this->ChildBirthTime1->ViewCustomAttributes = "";

            // ChildSex1
            $this->ChildSex1->ViewValue = $this->ChildSex1->CurrentValue;
            $this->ChildSex1->ViewCustomAttributes = "";

            // ChildWt1
            $this->ChildWt1->ViewValue = $this->ChildWt1->CurrentValue;
            $this->ChildWt1->ViewCustomAttributes = "";

            // ChildDay1
            $this->ChildDay1->ViewValue = $this->ChildDay1->CurrentValue;
            $this->ChildDay1->ViewCustomAttributes = "";

            // ChildOE1
            $this->ChildOE1->ViewValue = $this->ChildOE1->CurrentValue;
            $this->ChildOE1->ViewCustomAttributes = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->ViewValue = $this->ChildBlGrp1->CurrentValue;
            $this->ChildBlGrp1->ViewCustomAttributes = "";

            // ApgarScore1
            $this->ApgarScore1->ViewValue = $this->ApgarScore1->CurrentValue;
            $this->ApgarScore1->ViewCustomAttributes = "";

            // birthnotification1
            $this->birthnotification1->ViewValue = $this->birthnotification1->CurrentValue;
            $this->birthnotification1->ViewCustomAttributes = "";

            // formno1
            $this->formno1->ViewValue = $this->formno1->CurrentValue;
            $this->formno1->ViewCustomAttributes = "";

            // RecievedTime
            $this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
            $this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
            $this->RecievedTime->ViewCustomAttributes = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
            $this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
            $this->AnaesthesiaStarted->ViewCustomAttributes = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
            $this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
            $this->AnaesthesiaEnded->ViewCustomAttributes = "";

            // surgeryStarted
            $this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
            $this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
            $this->surgeryStarted->ViewCustomAttributes = "";

            // surgeryEnded
            $this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
            $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 11);
            $this->surgeryEnded->ViewCustomAttributes = "";

            // RecoveryTime
            $this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
            $this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
            $this->RecoveryTime->ViewCustomAttributes = "";

            // ShiftedTime
            $this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
            $this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
            $this->ShiftedTime->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
            $curVal = trim(strval($this->Surgeon->CurrentValue));
            if ($curVal != "") {
                $this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
                if ($this->Surgeon->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Surgeon->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Surgeon->Lookup->renderViewRow($rswrk[0]);
                        $this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
                    } else {
                        $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
                    }
                }
            } else {
                $this->Surgeon->ViewValue = null;
            }
            $this->Surgeon->ViewCustomAttributes = "";

            // Anaesthetist
            $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
            $curVal = trim(strval($this->Anaesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
                if ($this->Anaesthetist->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Anaesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Anaesthetist->Lookup->renderViewRow($rswrk[0]);
                        $this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
                    } else {
                        $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
                    }
                }
            } else {
                $this->Anaesthetist->ViewValue = null;
            }
            $this->Anaesthetist->ViewCustomAttributes = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
            $curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
                if ($this->AsstSurgeon1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon1->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
                    }
                }
            } else {
                $this->AsstSurgeon1->ViewValue = null;
            }
            $this->AsstSurgeon1->ViewCustomAttributes = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
            $curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
                if ($this->AsstSurgeon2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon2->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
                    }
                }
            } else {
                $this->AsstSurgeon2->ViewValue = null;
            }
            $this->AsstSurgeon2->ViewCustomAttributes = "";

            // paediatric
            $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
            $curVal = trim(strval($this->paediatric->CurrentValue));
            if ($curVal != "") {
                $this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
                if ($this->paediatric->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->paediatric->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->paediatric->Lookup->renderViewRow($rswrk[0]);
                        $this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
                    } else {
                        $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
                    }
                }
            } else {
                $this->paediatric->ViewValue = null;
            }
            $this->paediatric->ViewCustomAttributes = "";

            // ScrubNurse1
            $this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
            $this->ScrubNurse1->ViewCustomAttributes = "";

            // ScrubNurse2
            $this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
            $this->ScrubNurse2->ViewCustomAttributes = "";

            // FloorNurse
            $this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
            $this->FloorNurse->ViewCustomAttributes = "";

            // Technician
            $this->Technician->ViewValue = $this->Technician->CurrentValue;
            $this->Technician->ViewCustomAttributes = "";

            // HouseKeeping
            $this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
            $this->HouseKeeping->ViewCustomAttributes = "";

            // countsCheckedMops
            $this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
            $this->countsCheckedMops->ViewCustomAttributes = "";

            // gauze
            $this->gauze->ViewValue = $this->gauze->CurrentValue;
            $this->gauze->ViewCustomAttributes = "";

            // needles
            $this->needles->ViewValue = $this->needles->CurrentValue;
            $this->needles->ViewCustomAttributes = "";

            // bloodloss
            $this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
            $this->bloodloss->ViewCustomAttributes = "";

            // bloodtransfusion
            $this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
            $this->bloodtransfusion->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

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

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->LinkCustomAttributes = "";
            $this->ObstetricsHistryFeMale->HrefValue = "";
            $this->ObstetricsHistryFeMale->TooltipValue = "";

            // Abortion
            $this->Abortion->LinkCustomAttributes = "";
            $this->Abortion->HrefValue = "";
            $this->Abortion->TooltipValue = "";

            // ChildBirthDate
            $this->ChildBirthDate->LinkCustomAttributes = "";
            $this->ChildBirthDate->HrefValue = "";
            $this->ChildBirthDate->TooltipValue = "";

            // ChildBirthTime
            $this->ChildBirthTime->LinkCustomAttributes = "";
            $this->ChildBirthTime->HrefValue = "";
            $this->ChildBirthTime->TooltipValue = "";

            // ChildSex
            $this->ChildSex->LinkCustomAttributes = "";
            $this->ChildSex->HrefValue = "";
            $this->ChildSex->TooltipValue = "";

            // ChildWt
            $this->ChildWt->LinkCustomAttributes = "";
            $this->ChildWt->HrefValue = "";
            $this->ChildWt->TooltipValue = "";

            // ChildDay
            $this->ChildDay->LinkCustomAttributes = "";
            $this->ChildDay->HrefValue = "";
            $this->ChildDay->TooltipValue = "";

            // ChildOE
            $this->ChildOE->LinkCustomAttributes = "";
            $this->ChildOE->HrefValue = "";
            $this->ChildOE->TooltipValue = "";

            // ChildBlGrp
            $this->ChildBlGrp->LinkCustomAttributes = "";
            $this->ChildBlGrp->HrefValue = "";
            $this->ChildBlGrp->TooltipValue = "";

            // ApgarScore
            $this->ApgarScore->LinkCustomAttributes = "";
            $this->ApgarScore->HrefValue = "";
            $this->ApgarScore->TooltipValue = "";

            // birthnotification
            $this->birthnotification->LinkCustomAttributes = "";
            $this->birthnotification->HrefValue = "";
            $this->birthnotification->TooltipValue = "";

            // formno
            $this->formno->LinkCustomAttributes = "";
            $this->formno->HrefValue = "";
            $this->formno->TooltipValue = "";

            // dte
            $this->dte->LinkCustomAttributes = "";
            $this->dte->HrefValue = "";
            $this->dte->TooltipValue = "";

            // motherReligion
            $this->motherReligion->LinkCustomAttributes = "";
            $this->motherReligion->HrefValue = "";
            $this->motherReligion->TooltipValue = "";

            // bloodgroup
            $this->bloodgroup->LinkCustomAttributes = "";
            $this->bloodgroup->HrefValue = "";
            $this->bloodgroup->TooltipValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->LinkCustomAttributes = "";
            $this->ChildBirthDate1->HrefValue = "";
            $this->ChildBirthDate1->TooltipValue = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->LinkCustomAttributes = "";
            $this->ChildBirthTime1->HrefValue = "";
            $this->ChildBirthTime1->TooltipValue = "";

            // ChildSex1
            $this->ChildSex1->LinkCustomAttributes = "";
            $this->ChildSex1->HrefValue = "";
            $this->ChildSex1->TooltipValue = "";

            // ChildWt1
            $this->ChildWt1->LinkCustomAttributes = "";
            $this->ChildWt1->HrefValue = "";
            $this->ChildWt1->TooltipValue = "";

            // ChildDay1
            $this->ChildDay1->LinkCustomAttributes = "";
            $this->ChildDay1->HrefValue = "";
            $this->ChildDay1->TooltipValue = "";

            // ChildOE1
            $this->ChildOE1->LinkCustomAttributes = "";
            $this->ChildOE1->HrefValue = "";
            $this->ChildOE1->TooltipValue = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->LinkCustomAttributes = "";
            $this->ChildBlGrp1->HrefValue = "";
            $this->ChildBlGrp1->TooltipValue = "";

            // ApgarScore1
            $this->ApgarScore1->LinkCustomAttributes = "";
            $this->ApgarScore1->HrefValue = "";
            $this->ApgarScore1->TooltipValue = "";

            // birthnotification1
            $this->birthnotification1->LinkCustomAttributes = "";
            $this->birthnotification1->HrefValue = "";
            $this->birthnotification1->TooltipValue = "";

            // formno1
            $this->formno1->LinkCustomAttributes = "";
            $this->formno1->HrefValue = "";
            $this->formno1->TooltipValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";
            $this->RecievedTime->TooltipValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";
            $this->AnaesthesiaStarted->TooltipValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";
            $this->AnaesthesiaEnded->TooltipValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";
            $this->surgeryStarted->TooltipValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";
            $this->surgeryEnded->TooltipValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";
            $this->RecoveryTime->TooltipValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";
            $this->ShiftedTime->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";
            $this->Anaesthetist->TooltipValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";
            $this->AsstSurgeon1->TooltipValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";
            $this->AsstSurgeon2->TooltipValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";
            $this->paediatric->TooltipValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";
            $this->ScrubNurse1->TooltipValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";
            $this->ScrubNurse2->TooltipValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";
            $this->FloorNurse->TooltipValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";
            $this->Technician->TooltipValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";
            $this->HouseKeeping->TooltipValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";
            $this->countsCheckedMops->TooltipValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";
            $this->gauze->TooltipValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";
            $this->needles->TooltipValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";
            $this->bloodloss->TooltipValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";
            $this->bloodtransfusion->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->EditAttrs["class"] = "form-control";
            $this->ObstetricsHistryFeMale->EditCustomAttributes = "";
            if (!$this->ObstetricsHistryFeMale->Raw) {
                $this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue = HtmlDecode($this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue);
            }
            $this->ObstetricsHistryFeMale->EditValue = HtmlEncode($this->ObstetricsHistryFeMale->AdvancedSearch->SearchValue);
            $this->ObstetricsHistryFeMale->PlaceHolder = RemoveHtml($this->ObstetricsHistryFeMale->caption());

            // Abortion
            $this->Abortion->EditAttrs["class"] = "form-control";
            $this->Abortion->EditCustomAttributes = "";
            if (!$this->Abortion->Raw) {
                $this->Abortion->AdvancedSearch->SearchValue = HtmlDecode($this->Abortion->AdvancedSearch->SearchValue);
            }
            $this->Abortion->EditValue = HtmlEncode($this->Abortion->AdvancedSearch->SearchValue);
            $this->Abortion->PlaceHolder = RemoveHtml($this->Abortion->caption());

            // ChildBirthDate
            $this->ChildBirthDate->EditAttrs["class"] = "form-control";
            $this->ChildBirthDate->EditCustomAttributes = "";
            $this->ChildBirthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ChildBirthDate->AdvancedSearch->SearchValue, 7), 7));
            $this->ChildBirthDate->PlaceHolder = RemoveHtml($this->ChildBirthDate->caption());

            // ChildBirthTime
            $this->ChildBirthTime->EditAttrs["class"] = "form-control";
            $this->ChildBirthTime->EditCustomAttributes = "";
            if (!$this->ChildBirthTime->Raw) {
                $this->ChildBirthTime->AdvancedSearch->SearchValue = HtmlDecode($this->ChildBirthTime->AdvancedSearch->SearchValue);
            }
            $this->ChildBirthTime->EditValue = HtmlEncode($this->ChildBirthTime->AdvancedSearch->SearchValue);
            $this->ChildBirthTime->PlaceHolder = RemoveHtml($this->ChildBirthTime->caption());

            // ChildSex
            $this->ChildSex->EditAttrs["class"] = "form-control";
            $this->ChildSex->EditCustomAttributes = "";
            if (!$this->ChildSex->Raw) {
                $this->ChildSex->AdvancedSearch->SearchValue = HtmlDecode($this->ChildSex->AdvancedSearch->SearchValue);
            }
            $this->ChildSex->EditValue = HtmlEncode($this->ChildSex->AdvancedSearch->SearchValue);
            $this->ChildSex->PlaceHolder = RemoveHtml($this->ChildSex->caption());

            // ChildWt
            $this->ChildWt->EditAttrs["class"] = "form-control";
            $this->ChildWt->EditCustomAttributes = "";
            if (!$this->ChildWt->Raw) {
                $this->ChildWt->AdvancedSearch->SearchValue = HtmlDecode($this->ChildWt->AdvancedSearch->SearchValue);
            }
            $this->ChildWt->EditValue = HtmlEncode($this->ChildWt->AdvancedSearch->SearchValue);
            $this->ChildWt->PlaceHolder = RemoveHtml($this->ChildWt->caption());

            // ChildDay
            $this->ChildDay->EditAttrs["class"] = "form-control";
            $this->ChildDay->EditCustomAttributes = "";
            if (!$this->ChildDay->Raw) {
                $this->ChildDay->AdvancedSearch->SearchValue = HtmlDecode($this->ChildDay->AdvancedSearch->SearchValue);
            }
            $this->ChildDay->EditValue = HtmlEncode($this->ChildDay->AdvancedSearch->SearchValue);
            $this->ChildDay->PlaceHolder = RemoveHtml($this->ChildDay->caption());

            // ChildOE
            $this->ChildOE->EditAttrs["class"] = "form-control";
            $this->ChildOE->EditCustomAttributes = "";
            if (!$this->ChildOE->Raw) {
                $this->ChildOE->AdvancedSearch->SearchValue = HtmlDecode($this->ChildOE->AdvancedSearch->SearchValue);
            }
            $this->ChildOE->EditValue = HtmlEncode($this->ChildOE->AdvancedSearch->SearchValue);
            $this->ChildOE->PlaceHolder = RemoveHtml($this->ChildOE->caption());

            // ChildBlGrp
            $this->ChildBlGrp->EditAttrs["class"] = "form-control";
            $this->ChildBlGrp->EditCustomAttributes = "";
            if (!$this->ChildBlGrp->Raw) {
                $this->ChildBlGrp->AdvancedSearch->SearchValue = HtmlDecode($this->ChildBlGrp->AdvancedSearch->SearchValue);
            }
            $this->ChildBlGrp->EditValue = HtmlEncode($this->ChildBlGrp->AdvancedSearch->SearchValue);
            $this->ChildBlGrp->PlaceHolder = RemoveHtml($this->ChildBlGrp->caption());

            // ApgarScore
            $this->ApgarScore->EditAttrs["class"] = "form-control";
            $this->ApgarScore->EditCustomAttributes = "";
            if (!$this->ApgarScore->Raw) {
                $this->ApgarScore->AdvancedSearch->SearchValue = HtmlDecode($this->ApgarScore->AdvancedSearch->SearchValue);
            }
            $this->ApgarScore->EditValue = HtmlEncode($this->ApgarScore->AdvancedSearch->SearchValue);
            $this->ApgarScore->PlaceHolder = RemoveHtml($this->ApgarScore->caption());

            // birthnotification
            $this->birthnotification->EditAttrs["class"] = "form-control";
            $this->birthnotification->EditCustomAttributes = "";
            if (!$this->birthnotification->Raw) {
                $this->birthnotification->AdvancedSearch->SearchValue = HtmlDecode($this->birthnotification->AdvancedSearch->SearchValue);
            }
            $this->birthnotification->EditValue = HtmlEncode($this->birthnotification->AdvancedSearch->SearchValue);
            $this->birthnotification->PlaceHolder = RemoveHtml($this->birthnotification->caption());

            // formno
            $this->formno->EditAttrs["class"] = "form-control";
            $this->formno->EditCustomAttributes = "";
            if (!$this->formno->Raw) {
                $this->formno->AdvancedSearch->SearchValue = HtmlDecode($this->formno->AdvancedSearch->SearchValue);
            }
            $this->formno->EditValue = HtmlEncode($this->formno->AdvancedSearch->SearchValue);
            $this->formno->PlaceHolder = RemoveHtml($this->formno->caption());

            // dte
            $this->dte->EditAttrs["class"] = "form-control";
            $this->dte->EditCustomAttributes = "";
            $this->dte->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->dte->AdvancedSearch->SearchValue, 0), 8));
            $this->dte->PlaceHolder = RemoveHtml($this->dte->caption());
            $this->dte->EditAttrs["class"] = "form-control";
            $this->dte->EditCustomAttributes = "";
            $this->dte->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->dte->AdvancedSearch->SearchValue2, 0), 8));
            $this->dte->PlaceHolder = RemoveHtml($this->dte->caption());

            // motherReligion
            $this->motherReligion->EditAttrs["class"] = "form-control";
            $this->motherReligion->EditCustomAttributes = "";
            if (!$this->motherReligion->Raw) {
                $this->motherReligion->AdvancedSearch->SearchValue = HtmlDecode($this->motherReligion->AdvancedSearch->SearchValue);
            }
            $this->motherReligion->EditValue = HtmlEncode($this->motherReligion->AdvancedSearch->SearchValue);
            $this->motherReligion->PlaceHolder = RemoveHtml($this->motherReligion->caption());

            // bloodgroup
            $this->bloodgroup->EditAttrs["class"] = "form-control";
            $this->bloodgroup->EditCustomAttributes = "";
            if (!$this->bloodgroup->Raw) {
                $this->bloodgroup->AdvancedSearch->SearchValue = HtmlDecode($this->bloodgroup->AdvancedSearch->SearchValue);
            }
            $this->bloodgroup->EditValue = HtmlEncode($this->bloodgroup->AdvancedSearch->SearchValue);
            $this->bloodgroup->PlaceHolder = RemoveHtml($this->bloodgroup->caption());

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
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 0), 8));
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

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // ChildBirthDate1
            $this->ChildBirthDate1->EditAttrs["class"] = "form-control";
            $this->ChildBirthDate1->EditCustomAttributes = "";
            $this->ChildBirthDate1->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ChildBirthDate1->AdvancedSearch->SearchValue, 0), 8));
            $this->ChildBirthDate1->PlaceHolder = RemoveHtml($this->ChildBirthDate1->caption());

            // ChildBirthTime1
            $this->ChildBirthTime1->EditAttrs["class"] = "form-control";
            $this->ChildBirthTime1->EditCustomAttributes = "";
            if (!$this->ChildBirthTime1->Raw) {
                $this->ChildBirthTime1->AdvancedSearch->SearchValue = HtmlDecode($this->ChildBirthTime1->AdvancedSearch->SearchValue);
            }
            $this->ChildBirthTime1->EditValue = HtmlEncode($this->ChildBirthTime1->AdvancedSearch->SearchValue);
            $this->ChildBirthTime1->PlaceHolder = RemoveHtml($this->ChildBirthTime1->caption());

            // ChildSex1
            $this->ChildSex1->EditAttrs["class"] = "form-control";
            $this->ChildSex1->EditCustomAttributes = "";
            if (!$this->ChildSex1->Raw) {
                $this->ChildSex1->AdvancedSearch->SearchValue = HtmlDecode($this->ChildSex1->AdvancedSearch->SearchValue);
            }
            $this->ChildSex1->EditValue = HtmlEncode($this->ChildSex1->AdvancedSearch->SearchValue);
            $this->ChildSex1->PlaceHolder = RemoveHtml($this->ChildSex1->caption());

            // ChildWt1
            $this->ChildWt1->EditAttrs["class"] = "form-control";
            $this->ChildWt1->EditCustomAttributes = "";
            if (!$this->ChildWt1->Raw) {
                $this->ChildWt1->AdvancedSearch->SearchValue = HtmlDecode($this->ChildWt1->AdvancedSearch->SearchValue);
            }
            $this->ChildWt1->EditValue = HtmlEncode($this->ChildWt1->AdvancedSearch->SearchValue);
            $this->ChildWt1->PlaceHolder = RemoveHtml($this->ChildWt1->caption());

            // ChildDay1
            $this->ChildDay1->EditAttrs["class"] = "form-control";
            $this->ChildDay1->EditCustomAttributes = "";
            if (!$this->ChildDay1->Raw) {
                $this->ChildDay1->AdvancedSearch->SearchValue = HtmlDecode($this->ChildDay1->AdvancedSearch->SearchValue);
            }
            $this->ChildDay1->EditValue = HtmlEncode($this->ChildDay1->AdvancedSearch->SearchValue);
            $this->ChildDay1->PlaceHolder = RemoveHtml($this->ChildDay1->caption());

            // ChildOE1
            $this->ChildOE1->EditAttrs["class"] = "form-control";
            $this->ChildOE1->EditCustomAttributes = "";
            if (!$this->ChildOE1->Raw) {
                $this->ChildOE1->AdvancedSearch->SearchValue = HtmlDecode($this->ChildOE1->AdvancedSearch->SearchValue);
            }
            $this->ChildOE1->EditValue = HtmlEncode($this->ChildOE1->AdvancedSearch->SearchValue);
            $this->ChildOE1->PlaceHolder = RemoveHtml($this->ChildOE1->caption());

            // ChildBlGrp1
            $this->ChildBlGrp1->EditAttrs["class"] = "form-control";
            $this->ChildBlGrp1->EditCustomAttributes = "";
            if (!$this->ChildBlGrp1->Raw) {
                $this->ChildBlGrp1->AdvancedSearch->SearchValue = HtmlDecode($this->ChildBlGrp1->AdvancedSearch->SearchValue);
            }
            $this->ChildBlGrp1->EditValue = HtmlEncode($this->ChildBlGrp1->AdvancedSearch->SearchValue);
            $this->ChildBlGrp1->PlaceHolder = RemoveHtml($this->ChildBlGrp1->caption());

            // ApgarScore1
            $this->ApgarScore1->EditAttrs["class"] = "form-control";
            $this->ApgarScore1->EditCustomAttributes = "";
            if (!$this->ApgarScore1->Raw) {
                $this->ApgarScore1->AdvancedSearch->SearchValue = HtmlDecode($this->ApgarScore1->AdvancedSearch->SearchValue);
            }
            $this->ApgarScore1->EditValue = HtmlEncode($this->ApgarScore1->AdvancedSearch->SearchValue);
            $this->ApgarScore1->PlaceHolder = RemoveHtml($this->ApgarScore1->caption());

            // birthnotification1
            $this->birthnotification1->EditAttrs["class"] = "form-control";
            $this->birthnotification1->EditCustomAttributes = "";
            if (!$this->birthnotification1->Raw) {
                $this->birthnotification1->AdvancedSearch->SearchValue = HtmlDecode($this->birthnotification1->AdvancedSearch->SearchValue);
            }
            $this->birthnotification1->EditValue = HtmlEncode($this->birthnotification1->AdvancedSearch->SearchValue);
            $this->birthnotification1->PlaceHolder = RemoveHtml($this->birthnotification1->caption());

            // formno1
            $this->formno1->EditAttrs["class"] = "form-control";
            $this->formno1->EditCustomAttributes = "";
            if (!$this->formno1->Raw) {
                $this->formno1->AdvancedSearch->SearchValue = HtmlDecode($this->formno1->AdvancedSearch->SearchValue);
            }
            $this->formno1->EditValue = HtmlEncode($this->formno1->AdvancedSearch->SearchValue);
            $this->formno1->PlaceHolder = RemoveHtml($this->formno1->caption());

            // RecievedTime
            $this->RecievedTime->EditAttrs["class"] = "form-control";
            $this->RecievedTime->EditCustomAttributes = "";
            $this->RecievedTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->RecievedTime->AdvancedSearch->SearchValue, 11), 11));
            $this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
            $this->AnaesthesiaStarted->EditCustomAttributes = "";
            $this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AnaesthesiaStarted->AdvancedSearch->SearchValue, 11), 11));
            $this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
            $this->AnaesthesiaEnded->EditCustomAttributes = "";
            $this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AnaesthesiaEnded->AdvancedSearch->SearchValue, 11), 11));
            $this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

            // surgeryStarted
            $this->surgeryStarted->EditAttrs["class"] = "form-control";
            $this->surgeryStarted->EditCustomAttributes = "";
            $this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->surgeryStarted->AdvancedSearch->SearchValue, 11), 11));
            $this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

            // surgeryEnded
            $this->surgeryEnded->EditAttrs["class"] = "form-control";
            $this->surgeryEnded->EditCustomAttributes = "";
            $this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->surgeryEnded->AdvancedSearch->SearchValue, 11), 11));
            $this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

            // RecoveryTime
            $this->RecoveryTime->EditAttrs["class"] = "form-control";
            $this->RecoveryTime->EditCustomAttributes = "";
            $this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->RecoveryTime->AdvancedSearch->SearchValue, 11), 11));
            $this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

            // ShiftedTime
            $this->ShiftedTime->EditAttrs["class"] = "form-control";
            $this->ShiftedTime->EditCustomAttributes = "";
            $this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ShiftedTime->AdvancedSearch->SearchValue, 11), 11));
            $this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

            // Duration
            $this->Duration->EditAttrs["class"] = "form-control";
            $this->Duration->EditCustomAttributes = "";
            if (!$this->Duration->Raw) {
                $this->Duration->AdvancedSearch->SearchValue = HtmlDecode($this->Duration->AdvancedSearch->SearchValue);
            }
            $this->Duration->EditValue = HtmlEncode($this->Duration->AdvancedSearch->SearchValue);
            $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

            // Surgeon
            $this->Surgeon->EditAttrs["class"] = "form-control";
            $this->Surgeon->EditCustomAttributes = "";
            if (!$this->Surgeon->Raw) {
                $this->Surgeon->AdvancedSearch->SearchValue = HtmlDecode($this->Surgeon->AdvancedSearch->SearchValue);
            }
            $this->Surgeon->EditValue = HtmlEncode($this->Surgeon->AdvancedSearch->SearchValue);
            $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

            // Anaesthetist
            $this->Anaesthetist->EditAttrs["class"] = "form-control";
            $this->Anaesthetist->EditCustomAttributes = "";
            if (!$this->Anaesthetist->Raw) {
                $this->Anaesthetist->AdvancedSearch->SearchValue = HtmlDecode($this->Anaesthetist->AdvancedSearch->SearchValue);
            }
            $this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->AdvancedSearch->SearchValue);
            $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

            // AsstSurgeon1
            $this->AsstSurgeon1->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon1->EditCustomAttributes = "";
            if (!$this->AsstSurgeon1->Raw) {
                $this->AsstSurgeon1->AdvancedSearch->SearchValue = HtmlDecode($this->AsstSurgeon1->AdvancedSearch->SearchValue);
            }
            $this->AsstSurgeon1->EditValue = HtmlEncode($this->AsstSurgeon1->AdvancedSearch->SearchValue);
            $this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

            // AsstSurgeon2
            $this->AsstSurgeon2->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon2->EditCustomAttributes = "";
            if (!$this->AsstSurgeon2->Raw) {
                $this->AsstSurgeon2->AdvancedSearch->SearchValue = HtmlDecode($this->AsstSurgeon2->AdvancedSearch->SearchValue);
            }
            $this->AsstSurgeon2->EditValue = HtmlEncode($this->AsstSurgeon2->AdvancedSearch->SearchValue);
            $this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

            // paediatric
            $this->paediatric->EditAttrs["class"] = "form-control";
            $this->paediatric->EditCustomAttributes = "";
            if (!$this->paediatric->Raw) {
                $this->paediatric->AdvancedSearch->SearchValue = HtmlDecode($this->paediatric->AdvancedSearch->SearchValue);
            }
            $this->paediatric->EditValue = HtmlEncode($this->paediatric->AdvancedSearch->SearchValue);
            $this->paediatric->PlaceHolder = RemoveHtml($this->paediatric->caption());

            // ScrubNurse1
            $this->ScrubNurse1->EditAttrs["class"] = "form-control";
            $this->ScrubNurse1->EditCustomAttributes = "";
            if (!$this->ScrubNurse1->Raw) {
                $this->ScrubNurse1->AdvancedSearch->SearchValue = HtmlDecode($this->ScrubNurse1->AdvancedSearch->SearchValue);
            }
            $this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->AdvancedSearch->SearchValue);
            $this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

            // ScrubNurse2
            $this->ScrubNurse2->EditAttrs["class"] = "form-control";
            $this->ScrubNurse2->EditCustomAttributes = "";
            if (!$this->ScrubNurse2->Raw) {
                $this->ScrubNurse2->AdvancedSearch->SearchValue = HtmlDecode($this->ScrubNurse2->AdvancedSearch->SearchValue);
            }
            $this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->AdvancedSearch->SearchValue);
            $this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

            // FloorNurse
            $this->FloorNurse->EditAttrs["class"] = "form-control";
            $this->FloorNurse->EditCustomAttributes = "";
            if (!$this->FloorNurse->Raw) {
                $this->FloorNurse->AdvancedSearch->SearchValue = HtmlDecode($this->FloorNurse->AdvancedSearch->SearchValue);
            }
            $this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->AdvancedSearch->SearchValue);
            $this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

            // Technician
            $this->Technician->EditAttrs["class"] = "form-control";
            $this->Technician->EditCustomAttributes = "";
            if (!$this->Technician->Raw) {
                $this->Technician->AdvancedSearch->SearchValue = HtmlDecode($this->Technician->AdvancedSearch->SearchValue);
            }
            $this->Technician->EditValue = HtmlEncode($this->Technician->AdvancedSearch->SearchValue);
            $this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

            // HouseKeeping
            $this->HouseKeeping->EditAttrs["class"] = "form-control";
            $this->HouseKeeping->EditCustomAttributes = "";
            if (!$this->HouseKeeping->Raw) {
                $this->HouseKeeping->AdvancedSearch->SearchValue = HtmlDecode($this->HouseKeeping->AdvancedSearch->SearchValue);
            }
            $this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->AdvancedSearch->SearchValue);
            $this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

            // countsCheckedMops
            $this->countsCheckedMops->EditAttrs["class"] = "form-control";
            $this->countsCheckedMops->EditCustomAttributes = "";
            if (!$this->countsCheckedMops->Raw) {
                $this->countsCheckedMops->AdvancedSearch->SearchValue = HtmlDecode($this->countsCheckedMops->AdvancedSearch->SearchValue);
            }
            $this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->AdvancedSearch->SearchValue);
            $this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

            // gauze
            $this->gauze->EditAttrs["class"] = "form-control";
            $this->gauze->EditCustomAttributes = "";
            if (!$this->gauze->Raw) {
                $this->gauze->AdvancedSearch->SearchValue = HtmlDecode($this->gauze->AdvancedSearch->SearchValue);
            }
            $this->gauze->EditValue = HtmlEncode($this->gauze->AdvancedSearch->SearchValue);
            $this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

            // needles
            $this->needles->EditAttrs["class"] = "form-control";
            $this->needles->EditCustomAttributes = "";
            if (!$this->needles->Raw) {
                $this->needles->AdvancedSearch->SearchValue = HtmlDecode($this->needles->AdvancedSearch->SearchValue);
            }
            $this->needles->EditValue = HtmlEncode($this->needles->AdvancedSearch->SearchValue);
            $this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

            // bloodloss
            $this->bloodloss->EditAttrs["class"] = "form-control";
            $this->bloodloss->EditCustomAttributes = "";
            if (!$this->bloodloss->Raw) {
                $this->bloodloss->AdvancedSearch->SearchValue = HtmlDecode($this->bloodloss->AdvancedSearch->SearchValue);
            }
            $this->bloodloss->EditValue = HtmlEncode($this->bloodloss->AdvancedSearch->SearchValue);
            $this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

            // bloodtransfusion
            $this->bloodtransfusion->EditAttrs["class"] = "form-control";
            $this->bloodtransfusion->EditCustomAttributes = "";
            if (!$this->bloodtransfusion->Raw) {
                $this->bloodtransfusion->AdvancedSearch->SearchValue = HtmlDecode($this->bloodtransfusion->AdvancedSearch->SearchValue);
            }
            $this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->AdvancedSearch->SearchValue);
            $this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->AdvancedSearch->SearchValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
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
        if (!CheckDate($this->dte->AdvancedSearch->SearchValue)) {
            $this->dte->addErrorMessage($this->dte->getErrorMessage(false));
        }
        if (!CheckDate($this->dte->AdvancedSearch->SearchValue2)) {
            $this->dte->addErrorMessage($this->dte->getErrorMessage(false));
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
        $this->PatID->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->ObstetricsHistryMale->AdvancedSearch->load();
        $this->ObstetricsHistryFeMale->AdvancedSearch->load();
        $this->Abortion->AdvancedSearch->load();
        $this->ChildBirthDate->AdvancedSearch->load();
        $this->ChildBirthTime->AdvancedSearch->load();
        $this->ChildSex->AdvancedSearch->load();
        $this->ChildWt->AdvancedSearch->load();
        $this->ChildDay->AdvancedSearch->load();
        $this->ChildOE->AdvancedSearch->load();
        $this->TypeofDelivery->AdvancedSearch->load();
        $this->ChildBlGrp->AdvancedSearch->load();
        $this->ApgarScore->AdvancedSearch->load();
        $this->birthnotification->AdvancedSearch->load();
        $this->formno->AdvancedSearch->load();
        $this->dte->AdvancedSearch->load();
        $this->motherReligion->AdvancedSearch->load();
        $this->bloodgroup->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->PatientID->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->ChildBirthDate1->AdvancedSearch->load();
        $this->ChildBirthTime1->AdvancedSearch->load();
        $this->ChildSex1->AdvancedSearch->load();
        $this->ChildWt1->AdvancedSearch->load();
        $this->ChildDay1->AdvancedSearch->load();
        $this->ChildOE1->AdvancedSearch->load();
        $this->TypeofDelivery1->AdvancedSearch->load();
        $this->ChildBlGrp1->AdvancedSearch->load();
        $this->ApgarScore1->AdvancedSearch->load();
        $this->birthnotification1->AdvancedSearch->load();
        $this->formno1->AdvancedSearch->load();
        $this->proposedSurgery->AdvancedSearch->load();
        $this->surgeryProcedure->AdvancedSearch->load();
        $this->typeOfAnaesthesia->AdvancedSearch->load();
        $this->RecievedTime->AdvancedSearch->load();
        $this->AnaesthesiaStarted->AdvancedSearch->load();
        $this->AnaesthesiaEnded->AdvancedSearch->load();
        $this->surgeryStarted->AdvancedSearch->load();
        $this->surgeryEnded->AdvancedSearch->load();
        $this->RecoveryTime->AdvancedSearch->load();
        $this->ShiftedTime->AdvancedSearch->load();
        $this->Duration->AdvancedSearch->load();
        $this->DrVisit1->AdvancedSearch->load();
        $this->DrVisit2->AdvancedSearch->load();
        $this->DrVisit3->AdvancedSearch->load();
        $this->DrVisit4->AdvancedSearch->load();
        $this->Surgeon->AdvancedSearch->load();
        $this->Anaesthetist->AdvancedSearch->load();
        $this->AsstSurgeon1->AdvancedSearch->load();
        $this->AsstSurgeon2->AdvancedSearch->load();
        $this->paediatric->AdvancedSearch->load();
        $this->ScrubNurse1->AdvancedSearch->load();
        $this->ScrubNurse2->AdvancedSearch->load();
        $this->FloorNurse->AdvancedSearch->load();
        $this->Technician->AdvancedSearch->load();
        $this->HouseKeeping->AdvancedSearch->load();
        $this->countsCheckedMops->AdvancedSearch->load();
        $this->gauze->AdvancedSearch->load();
        $this->needles->AdvancedSearch->load();
        $this->bloodloss->AdvancedSearch->load();
        $this->bloodtransfusion->AdvancedSearch->load();
        $this->implantsUsed->AdvancedSearch->load();
        $this->MaterialsForHPE->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->PId->AdvancedSearch->load();
        $this->PatientSearch->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatient_ot_delivery_registerlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatient_ot_delivery_registerlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatient_ot_delivery_registerlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_patient_ot_delivery_register" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient_ot_delivery_register\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatient_ot_delivery_registerlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_ot_delivery_registerlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

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

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ip_admission") {
            $ip_admission = Container("ip_admission");
            $rsmaster = $ip_admission->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $ip_admission;
                    $ip_admission->exportDocument($doc, new Recordset($rsmaster));
                    $doc->exportEmptyRow();
                    $doc->Table = &$this;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsmaster->closeCursor();
            }
        }
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

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Get("fk_id", Get("Reception"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Reception->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Reception->setSessionValue($this->Reception->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setQueryStringValue($parm);
                    $this->mrnno->setQueryStringValue($masterTbl->mrnNo->QueryStringValue);
                    $this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_patient_id", Get("PId"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PId->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PId->setSessionValue($this->PId->QueryStringValue);
                    if (!is_numeric($masterTbl->patient_id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Post("fk_id", Post("Reception"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Reception->setFormValue($masterTbl->id->FormValue);
                    $this->Reception->setSessionValue($this->Reception->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setFormValue($parm);
                    $this->mrnno->setFormValue($masterTbl->mrnNo->FormValue);
                    $this->mrnno->setSessionValue($this->mrnno->FormValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_patient_id", Post("PId"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PId->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PId->setSessionValue($this->PId->FormValue);
                    if (!is_numeric($masterTbl->patient_id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);

            // Update URL
            $this->AddUrl = $this->addMasterUrl($this->AddUrl);
            $this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
            $this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
            $this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "ip_admission") {
                if ($this->Reception->CurrentValue == "") {
                    $this->Reception->setSessionValue("");
                }
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
                }
                if ($this->PId->CurrentValue == "") {
                    $this->PId->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
                case "x_DrVisit1":
                    break;
                case "x_DrVisit2":
                    break;
                case "x_DrVisit3":
                    break;
                case "x_DrVisit4":
                    break;
                case "x_Surgeon":
                    break;
                case "x_Anaesthetist":
                    break;
                case "x_AsstSurgeon1":
                    break;
                case "x_AsstSurgeon2":
                    break;
                case "x_paediatric":
                    break;
                case "x_PatientSearch":
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
