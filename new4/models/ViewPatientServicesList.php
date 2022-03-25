<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPatientServicesList extends ViewPatientServices
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_patient_services';

    // Page object name
    public $PageObjName = "ViewPatientServicesList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_patient_serviceslist";
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

        // Table object (view_patient_services)
        if (!isset($GLOBALS["view_patient_services"]) || get_class($GLOBALS["view_patient_services"]) == PROJECT_NAMESPACE . "view_patient_services") {
            $GLOBALS["view_patient_services"] = &$this;
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
        $this->AddUrl = "ViewPatientServicesAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewPatientServicesDelete";
        $this->MultiUpdateUrl = "ViewPatientServicesUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_patient_services');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_patient_serviceslistsrch";

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
                $doc = new $class(Container("view_patient_services"));
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

        // Create form object
        $CurrentForm = new HttpForm();

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
        $this->Reception->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->Services->setVisibility();
        $this->Unit->setVisibility();
        $this->amount->setVisibility();
        $this->Quantity->setVisibility();
        $this->DiscountCategory->setVisibility();
        $this->Discount->setVisibility();
        $this->SubTotal->setVisibility();
        $this->description->setVisibility();
        $this->patient_type->setVisibility();
        $this->charged_date->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->Aid->setVisibility();
        $this->Vid->setVisibility();
        $this->DrID->setVisibility();
        $this->DrCODE->setVisibility();
        $this->DrName->setVisibility();
        $this->Department->setVisibility();
        $this->DrSharePres->setVisibility();
        $this->HospSharePres->setVisibility();
        $this->DrShareAmount->setVisibility();
        $this->HospShareAmount->setVisibility();
        $this->DrShareSettiledAmount->setVisibility();
        $this->DrShareSettledId->setVisibility();
        $this->DrShareSettiledStatus->setVisibility();
        $this->invoiceId->setVisibility();
        $this->invoiceAmount->setVisibility();
        $this->invoiceStatus->setVisibility();
        $this->modeOfPayment->setVisibility();
        $this->HospID->setVisibility();
        $this->RIDNO->setVisibility();
        $this->ItemCode->setVisibility();
        $this->TidNo->setVisibility();
        $this->sid->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->DEptCd->setVisibility();
        $this->ProfCd->setVisibility();
        $this->LabReport->Visible = false;
        $this->Comments->setVisibility();
        $this->Method->setVisibility();
        $this->Specimen->setVisibility();
        $this->Abnormal->setVisibility();
        $this->RefValue->Visible = false;
        $this->TestUnit->setVisibility();
        $this->LOWHIGH->setVisibility();
        $this->Branch->setVisibility();
        $this->Dispatch->setVisibility();
        $this->Pic1->setVisibility();
        $this->Pic2->setVisibility();
        $this->GraphPath->setVisibility();
        $this->MachineCD->setVisibility();
        $this->TestCancel->setVisibility();
        $this->OutSource->setVisibility();
        $this->Printed->setVisibility();
        $this->PrintBy->setVisibility();
        $this->PrintDate->setVisibility();
        $this->BillingDate->setVisibility();
        $this->BilledBy->setVisibility();
        $this->Resulted->setVisibility();
        $this->ResultDate->setVisibility();
        $this->ResultedBy->setVisibility();
        $this->SampleDate->setVisibility();
        $this->SampleUser->setVisibility();
        $this->Sampled->setVisibility();
        $this->ReceivedDate->setVisibility();
        $this->ReceivedUser->setVisibility();
        $this->Recevied->setVisibility();
        $this->DeptRecvDate->setVisibility();
        $this->DeptRecvUser->setVisibility();
        $this->DeptRecived->setVisibility();
        $this->SAuthDate->setVisibility();
        $this->SAuthBy->setVisibility();
        $this->SAuthendicate->setVisibility();
        $this->AuthDate->setVisibility();
        $this->AuthBy->setVisibility();
        $this->Authencate->setVisibility();
        $this->EditDate->setVisibility();
        $this->EditBy->setVisibility();
        $this->Editted->setVisibility();
        $this->PatID->setVisibility();
        $this->PatientId->setVisibility();
        $this->Mobile->setVisibility();
        $this->CId->setVisibility();
        $this->Order->setVisibility();
        $this->Form->Visible = false;
        $this->ResType->setVisibility();
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->Visible = false;
        $this->Inactive->setVisibility();
        $this->CollSample->setVisibility();
        $this->TestType->setVisibility();
        $this->Repeated->setVisibility();
        $this->RepeatedBy->setVisibility();
        $this->RepeatedDate->setVisibility();
        $this->serviceID->setVisibility();
        $this->Service_Type->setVisibility();
        $this->Service_Department->setVisibility();
        $this->RequestNo->setVisibility();
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
        $this->setupLookupOptions($this->Services);
        $this->setupLookupOptions($this->DiscountCategory);

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

            // Check QueryString parameters
            if (Get("action") !== null) {
                $this->CurrentAction = Get("action");

                // Clear inline mode
                if ($this->isCancel()) {
                    $this->clearInlineMode();
                }

                // Switch to grid edit mode
                if ($this->isGridEdit()) {
                    $this->gridEditMode();
                }

                // Switch to grid add mode
                if ($this->isGridAdd()) {
                    $this->gridAddMode();
                }
            } else {
                if (Post("action") !== null) {
                    $this->CurrentAction = Post("action"); // Get action

                    // Grid Update
                    if (($this->isGridUpdate() || $this->isGridOverwrite()) && Session(SESSION_INLINE_MODE) == "gridedit") {
                        if ($this->validateGridForm()) {
                            $gridUpdate = $this->gridUpdate();
                        } else {
                            $gridUpdate = false;
                        }
                        if ($gridUpdate) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridEditMode(); // Stay in Grid edit mode
                        }
                    }

                    // Grid Insert
                    if ($this->isGridInsert() && Session(SESSION_INLINE_MODE) == "gridadd") {
                        if ($this->validateGridForm()) {
                            $gridInsert = $this->gridInsert();
                        } else {
                            $gridInsert = false;
                        }
                        if ($gridInsert) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridAddMode(); // Stay in Grid add mode
                        }
                    }
                } elseif (Session(SESSION_INLINE_MODE) == "gridedit") { // Previously in grid edit mode
                    if (Get(Config("TABLE_START_REC")) !== null || Get(Config("TABLE_PAGE_NO")) !== null) { // Stay in grid edit mode if paging
                        $this->gridEditMode();
                    } else { // Reset grid edit
                        $this->clearInlineMode();
                    }
                }
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

            // Show grid delete link for grid add / grid edit
            if ($this->AllowAddDeleteRow) {
                if ($this->isGridAdd() || $this->isGridEdit()) {
                    $item = $this->ListOptions["griddelete"];
                    if ($item) {
                        $item->Visible = true;
                    }
                }
            }

            // Get default search criteria
            AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_billing_voucher") {
            $masterTbl = Container("view_billing_voucher");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewBillingVoucherList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_billing_voucher_print") {
            $masterTbl = Container("view_billing_voucher_print");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewBillingVoucherPrintList"); // Return to master page
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

    // Exit inline mode
    protected function clearInlineMode()
    {
        $this->amount->FormValue = ""; // Clear form value
        $this->Discount->FormValue = ""; // Clear form value
        $this->SubTotal->FormValue = ""; // Clear form value
        $this->DrSharePres->FormValue = ""; // Clear form value
        $this->HospSharePres->FormValue = ""; // Clear form value
        $this->DrShareAmount->FormValue = ""; // Clear form value
        $this->HospShareAmount->FormValue = ""; // Clear form value
        $this->DrShareSettiledAmount->FormValue = ""; // Clear form value
        $this->invoiceAmount->FormValue = ""; // Clear form value
        $this->Order->FormValue = ""; // Clear form value
        $this->NoD->FormValue = ""; // Clear form value
        $this->BillOrder->FormValue = ""; // Clear form value
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

        // Begin transaction
        $conn->beginTransaction();
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
            $conn->commit(); // Commit transaction

            // Get new records
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Updated event
            $this->gridUpdated($rsold, $rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
            }
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
            $conn->rollback(); // Rollback transaction
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

        // Begin transaction
        $conn->beginTransaction();

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
            $this->setFailureMessage($Language->phrase("NoAddRecord"));
            $gridInsert = false;
        }
        if ($gridInsert) {
            $conn->commit(); // Commit transaction

            // Get new records
            $this->CurrentFilter = $wrkfilter;
            $sql = $this->getCurrentSql();
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Inserted event
            $this->gridInserted($rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
            }
            $this->clearInlineMode(); // Clear grid add mode
        } else {
            $conn->rollback(); // Rollback transaction
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
        if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue) {
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
        if ($CurrentForm->hasValue("x_profilePic") && $CurrentForm->hasValue("o_profilePic") && $this->profilePic->CurrentValue != $this->profilePic->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Services") && $CurrentForm->hasValue("o_Services") && $this->Services->CurrentValue != $this->Services->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Unit") && $CurrentForm->hasValue("o_Unit") && $this->Unit->CurrentValue != $this->Unit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_amount") && $CurrentForm->hasValue("o_amount") && $this->amount->CurrentValue != $this->amount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue != $this->Quantity->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DiscountCategory") && $CurrentForm->hasValue("o_DiscountCategory") && $this->DiscountCategory->CurrentValue != $this->DiscountCategory->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Discount") && $CurrentForm->hasValue("o_Discount") && $this->Discount->CurrentValue != $this->Discount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SubTotal") && $CurrentForm->hasValue("o_SubTotal") && $this->SubTotal->CurrentValue != $this->SubTotal->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_description") && $CurrentForm->hasValue("o_description") && $this->description->CurrentValue != $this->description->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_patient_type") && $CurrentForm->hasValue("o_patient_type") && $this->patient_type->CurrentValue != $this->patient_type->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_charged_date") && $CurrentForm->hasValue("o_charged_date") && $this->charged_date->CurrentValue != $this->charged_date->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Aid") && $CurrentForm->hasValue("o_Aid") && $this->Aid->CurrentValue != $this->Aid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Vid") && $CurrentForm->hasValue("o_Vid") && $this->Vid->CurrentValue != $this->Vid->OldValue) {
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
        if ($CurrentForm->hasValue("x_DrSharePres") && $CurrentForm->hasValue("o_DrSharePres") && $this->DrSharePres->CurrentValue != $this->DrSharePres->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HospSharePres") && $CurrentForm->hasValue("o_HospSharePres") && $this->HospSharePres->CurrentValue != $this->HospSharePres->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrShareAmount") && $CurrentForm->hasValue("o_DrShareAmount") && $this->DrShareAmount->CurrentValue != $this->DrShareAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HospShareAmount") && $CurrentForm->hasValue("o_HospShareAmount") && $this->HospShareAmount->CurrentValue != $this->HospShareAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrShareSettiledAmount") && $CurrentForm->hasValue("o_DrShareSettiledAmount") && $this->DrShareSettiledAmount->CurrentValue != $this->DrShareSettiledAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrShareSettledId") && $CurrentForm->hasValue("o_DrShareSettledId") && $this->DrShareSettledId->CurrentValue != $this->DrShareSettledId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DrShareSettiledStatus") && $CurrentForm->hasValue("o_DrShareSettiledStatus") && $this->DrShareSettiledStatus->CurrentValue != $this->DrShareSettiledStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_invoiceId") && $CurrentForm->hasValue("o_invoiceId") && $this->invoiceId->CurrentValue != $this->invoiceId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_invoiceAmount") && $CurrentForm->hasValue("o_invoiceAmount") && $this->invoiceAmount->CurrentValue != $this->invoiceAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_invoiceStatus") && $CurrentForm->hasValue("o_invoiceStatus") && $this->invoiceStatus->CurrentValue != $this->invoiceStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_modeOfPayment") && $CurrentForm->hasValue("o_modeOfPayment") && $this->modeOfPayment->CurrentValue != $this->modeOfPayment->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RIDNO") && $CurrentForm->hasValue("o_RIDNO") && $this->RIDNO->CurrentValue != $this->RIDNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ItemCode") && $CurrentForm->hasValue("o_ItemCode") && $this->ItemCode->CurrentValue != $this->ItemCode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue != $this->sid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TestSubCd") && $CurrentForm->hasValue("o_TestSubCd") && $this->TestSubCd->CurrentValue != $this->TestSubCd->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DEptCd") && $CurrentForm->hasValue("o_DEptCd") && $this->DEptCd->CurrentValue != $this->DEptCd->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ProfCd") && $CurrentForm->hasValue("o_ProfCd") && $this->ProfCd->CurrentValue != $this->ProfCd->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Comments") && $CurrentForm->hasValue("o_Comments") && $this->Comments->CurrentValue != $this->Comments->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Method") && $CurrentForm->hasValue("o_Method") && $this->Method->CurrentValue != $this->Method->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Specimen") && $CurrentForm->hasValue("o_Specimen") && $this->Specimen->CurrentValue != $this->Specimen->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Abnormal") && $CurrentForm->hasValue("o_Abnormal") && $this->Abnormal->CurrentValue != $this->Abnormal->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TestUnit") && $CurrentForm->hasValue("o_TestUnit") && $this->TestUnit->CurrentValue != $this->TestUnit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LOWHIGH") && $CurrentForm->hasValue("o_LOWHIGH") && $this->LOWHIGH->CurrentValue != $this->LOWHIGH->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Branch") && $CurrentForm->hasValue("o_Branch") && $this->Branch->CurrentValue != $this->Branch->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Dispatch") && $CurrentForm->hasValue("o_Dispatch") && $this->Dispatch->CurrentValue != $this->Dispatch->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Pic1") && $CurrentForm->hasValue("o_Pic1") && $this->Pic1->CurrentValue != $this->Pic1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Pic2") && $CurrentForm->hasValue("o_Pic2") && $this->Pic2->CurrentValue != $this->Pic2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GraphPath") && $CurrentForm->hasValue("o_GraphPath") && $this->GraphPath->CurrentValue != $this->GraphPath->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MachineCD") && $CurrentForm->hasValue("o_MachineCD") && $this->MachineCD->CurrentValue != $this->MachineCD->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TestCancel") && $CurrentForm->hasValue("o_TestCancel") && $this->TestCancel->CurrentValue != $this->TestCancel->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_OutSource") && $CurrentForm->hasValue("o_OutSource") && $this->OutSource->CurrentValue != $this->OutSource->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Printed") && $CurrentForm->hasValue("o_Printed") && $this->Printed->CurrentValue != $this->Printed->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrintBy") && $CurrentForm->hasValue("o_PrintBy") && $this->PrintBy->CurrentValue != $this->PrintBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrintDate") && $CurrentForm->hasValue("o_PrintDate") && $this->PrintDate->CurrentValue != $this->PrintDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillingDate") && $CurrentForm->hasValue("o_BillingDate") && $this->BillingDate->CurrentValue != $this->BillingDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BilledBy") && $CurrentForm->hasValue("o_BilledBy") && $this->BilledBy->CurrentValue != $this->BilledBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Resulted") && $CurrentForm->hasValue("o_Resulted") && $this->Resulted->CurrentValue != $this->Resulted->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ResultDate") && $CurrentForm->hasValue("o_ResultDate") && $this->ResultDate->CurrentValue != $this->ResultDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ResultedBy") && $CurrentForm->hasValue("o_ResultedBy") && $this->ResultedBy->CurrentValue != $this->ResultedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SampleDate") && $CurrentForm->hasValue("o_SampleDate") && $this->SampleDate->CurrentValue != $this->SampleDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SampleUser") && $CurrentForm->hasValue("o_SampleUser") && $this->SampleUser->CurrentValue != $this->SampleUser->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Sampled") && $CurrentForm->hasValue("o_Sampled") && $this->Sampled->CurrentValue != $this->Sampled->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ReceivedDate") && $CurrentForm->hasValue("o_ReceivedDate") && $this->ReceivedDate->CurrentValue != $this->ReceivedDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ReceivedUser") && $CurrentForm->hasValue("o_ReceivedUser") && $this->ReceivedUser->CurrentValue != $this->ReceivedUser->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Recevied") && $CurrentForm->hasValue("o_Recevied") && $this->Recevied->CurrentValue != $this->Recevied->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DeptRecvDate") && $CurrentForm->hasValue("o_DeptRecvDate") && $this->DeptRecvDate->CurrentValue != $this->DeptRecvDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DeptRecvUser") && $CurrentForm->hasValue("o_DeptRecvUser") && $this->DeptRecvUser->CurrentValue != $this->DeptRecvUser->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DeptRecived") && $CurrentForm->hasValue("o_DeptRecived") && $this->DeptRecived->CurrentValue != $this->DeptRecived->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SAuthDate") && $CurrentForm->hasValue("o_SAuthDate") && $this->SAuthDate->CurrentValue != $this->SAuthDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SAuthBy") && $CurrentForm->hasValue("o_SAuthBy") && $this->SAuthBy->CurrentValue != $this->SAuthBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SAuthendicate") && $CurrentForm->hasValue("o_SAuthendicate") && $this->SAuthendicate->CurrentValue != $this->SAuthendicate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AuthDate") && $CurrentForm->hasValue("o_AuthDate") && $this->AuthDate->CurrentValue != $this->AuthDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AuthBy") && $CurrentForm->hasValue("o_AuthBy") && $this->AuthBy->CurrentValue != $this->AuthBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Authencate") && $CurrentForm->hasValue("o_Authencate") && $this->Authencate->CurrentValue != $this->Authencate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EditDate") && $CurrentForm->hasValue("o_EditDate") && $this->EditDate->CurrentValue != $this->EditDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EditBy") && $CurrentForm->hasValue("o_EditBy") && $this->EditBy->CurrentValue != $this->EditBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Editted") && $CurrentForm->hasValue("o_Editted") && $this->Editted->CurrentValue != $this->Editted->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CId") && $CurrentForm->hasValue("o_CId") && $this->CId->CurrentValue != $this->CId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Order") && $CurrentForm->hasValue("o_Order") && $this->Order->CurrentValue != $this->Order->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ResType") && $CurrentForm->hasValue("o_ResType") && $this->ResType->CurrentValue != $this->ResType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Sample") && $CurrentForm->hasValue("o_Sample") && $this->Sample->CurrentValue != $this->Sample->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NoD") && $CurrentForm->hasValue("o_NoD") && $this->NoD->CurrentValue != $this->NoD->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillOrder") && $CurrentForm->hasValue("o_BillOrder") && $this->BillOrder->CurrentValue != $this->BillOrder->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Inactive") && $CurrentForm->hasValue("o_Inactive") && $this->Inactive->CurrentValue != $this->Inactive->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CollSample") && $CurrentForm->hasValue("o_CollSample") && $this->CollSample->CurrentValue != $this->CollSample->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TestType") && $CurrentForm->hasValue("o_TestType") && $this->TestType->CurrentValue != $this->TestType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Repeated") && $CurrentForm->hasValue("o_Repeated") && $this->Repeated->CurrentValue != $this->Repeated->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RepeatedBy") && $CurrentForm->hasValue("o_RepeatedBy") && $this->RepeatedBy->CurrentValue != $this->RepeatedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RepeatedDate") && $CurrentForm->hasValue("o_RepeatedDate") && $this->RepeatedDate->CurrentValue != $this->RepeatedDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_serviceID") && $CurrentForm->hasValue("o_serviceID") && $this->serviceID->CurrentValue != $this->serviceID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Service_Type") && $CurrentForm->hasValue("o_Service_Type") && $this->Service_Type->CurrentValue != $this->Service_Type->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Service_Department") && $CurrentForm->hasValue("o_Service_Department") && $this->Service_Department->CurrentValue != $this->Service_Department->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RequestNo") && $CurrentForm->hasValue("o_RequestNo") && $this->RequestNo->CurrentValue != $this->RequestNo->OldValue) {
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
        $this->Reception->clearErrorMessage();
        $this->mrnno->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->Age->clearErrorMessage();
        $this->Gender->clearErrorMessage();
        $this->profilePic->clearErrorMessage();
        $this->Services->clearErrorMessage();
        $this->Unit->clearErrorMessage();
        $this->amount->clearErrorMessage();
        $this->Quantity->clearErrorMessage();
        $this->DiscountCategory->clearErrorMessage();
        $this->Discount->clearErrorMessage();
        $this->SubTotal->clearErrorMessage();
        $this->description->clearErrorMessage();
        $this->patient_type->clearErrorMessage();
        $this->charged_date->clearErrorMessage();
        $this->status->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->Aid->clearErrorMessage();
        $this->Vid->clearErrorMessage();
        $this->DrID->clearErrorMessage();
        $this->DrCODE->clearErrorMessage();
        $this->DrName->clearErrorMessage();
        $this->Department->clearErrorMessage();
        $this->DrSharePres->clearErrorMessage();
        $this->HospSharePres->clearErrorMessage();
        $this->DrShareAmount->clearErrorMessage();
        $this->HospShareAmount->clearErrorMessage();
        $this->DrShareSettiledAmount->clearErrorMessage();
        $this->DrShareSettledId->clearErrorMessage();
        $this->DrShareSettiledStatus->clearErrorMessage();
        $this->invoiceId->clearErrorMessage();
        $this->invoiceAmount->clearErrorMessage();
        $this->invoiceStatus->clearErrorMessage();
        $this->modeOfPayment->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->RIDNO->clearErrorMessage();
        $this->ItemCode->clearErrorMessage();
        $this->TidNo->clearErrorMessage();
        $this->sid->clearErrorMessage();
        $this->TestSubCd->clearErrorMessage();
        $this->DEptCd->clearErrorMessage();
        $this->ProfCd->clearErrorMessage();
        $this->Comments->clearErrorMessage();
        $this->Method->clearErrorMessage();
        $this->Specimen->clearErrorMessage();
        $this->Abnormal->clearErrorMessage();
        $this->TestUnit->clearErrorMessage();
        $this->LOWHIGH->clearErrorMessage();
        $this->Branch->clearErrorMessage();
        $this->Dispatch->clearErrorMessage();
        $this->Pic1->clearErrorMessage();
        $this->Pic2->clearErrorMessage();
        $this->GraphPath->clearErrorMessage();
        $this->MachineCD->clearErrorMessage();
        $this->TestCancel->clearErrorMessage();
        $this->OutSource->clearErrorMessage();
        $this->Printed->clearErrorMessage();
        $this->PrintBy->clearErrorMessage();
        $this->PrintDate->clearErrorMessage();
        $this->BillingDate->clearErrorMessage();
        $this->BilledBy->clearErrorMessage();
        $this->Resulted->clearErrorMessage();
        $this->ResultDate->clearErrorMessage();
        $this->ResultedBy->clearErrorMessage();
        $this->SampleDate->clearErrorMessage();
        $this->SampleUser->clearErrorMessage();
        $this->Sampled->clearErrorMessage();
        $this->ReceivedDate->clearErrorMessage();
        $this->ReceivedUser->clearErrorMessage();
        $this->Recevied->clearErrorMessage();
        $this->DeptRecvDate->clearErrorMessage();
        $this->DeptRecvUser->clearErrorMessage();
        $this->DeptRecived->clearErrorMessage();
        $this->SAuthDate->clearErrorMessage();
        $this->SAuthBy->clearErrorMessage();
        $this->SAuthendicate->clearErrorMessage();
        $this->AuthDate->clearErrorMessage();
        $this->AuthBy->clearErrorMessage();
        $this->Authencate->clearErrorMessage();
        $this->EditDate->clearErrorMessage();
        $this->EditBy->clearErrorMessage();
        $this->Editted->clearErrorMessage();
        $this->PatID->clearErrorMessage();
        $this->PatientId->clearErrorMessage();
        $this->Mobile->clearErrorMessage();
        $this->CId->clearErrorMessage();
        $this->Order->clearErrorMessage();
        $this->ResType->clearErrorMessage();
        $this->Sample->clearErrorMessage();
        $this->NoD->clearErrorMessage();
        $this->BillOrder->clearErrorMessage();
        $this->Inactive->clearErrorMessage();
        $this->CollSample->clearErrorMessage();
        $this->TestType->clearErrorMessage();
        $this->Repeated->clearErrorMessage();
        $this->RepeatedBy->clearErrorMessage();
        $this->RepeatedDate->clearErrorMessage();
        $this->serviceID->clearErrorMessage();
        $this->Service_Type->clearErrorMessage();
        $this->Service_Department->clearErrorMessage();
        $this->RequestNo->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_patient_serviceslistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->Services->AdvancedSearch->toJson(), ","); // Field Services
        $filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
        $filterList = Concat($filterList, $this->amount->AdvancedSearch->toJson(), ","); // Field amount
        $filterList = Concat($filterList, $this->Quantity->AdvancedSearch->toJson(), ","); // Field Quantity
        $filterList = Concat($filterList, $this->DiscountCategory->AdvancedSearch->toJson(), ","); // Field DiscountCategory
        $filterList = Concat($filterList, $this->Discount->AdvancedSearch->toJson(), ","); // Field Discount
        $filterList = Concat($filterList, $this->SubTotal->AdvancedSearch->toJson(), ","); // Field SubTotal
        $filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
        $filterList = Concat($filterList, $this->patient_type->AdvancedSearch->toJson(), ","); // Field patient_type
        $filterList = Concat($filterList, $this->charged_date->AdvancedSearch->toJson(), ","); // Field charged_date
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->Aid->AdvancedSearch->toJson(), ","); // Field Aid
        $filterList = Concat($filterList, $this->Vid->AdvancedSearch->toJson(), ","); // Field Vid
        $filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
        $filterList = Concat($filterList, $this->DrCODE->AdvancedSearch->toJson(), ","); // Field DrCODE
        $filterList = Concat($filterList, $this->DrName->AdvancedSearch->toJson(), ","); // Field DrName
        $filterList = Concat($filterList, $this->Department->AdvancedSearch->toJson(), ","); // Field Department
        $filterList = Concat($filterList, $this->DrSharePres->AdvancedSearch->toJson(), ","); // Field DrSharePres
        $filterList = Concat($filterList, $this->HospSharePres->AdvancedSearch->toJson(), ","); // Field HospSharePres
        $filterList = Concat($filterList, $this->DrShareAmount->AdvancedSearch->toJson(), ","); // Field DrShareAmount
        $filterList = Concat($filterList, $this->HospShareAmount->AdvancedSearch->toJson(), ","); // Field HospShareAmount
        $filterList = Concat($filterList, $this->DrShareSettiledAmount->AdvancedSearch->toJson(), ","); // Field DrShareSettiledAmount
        $filterList = Concat($filterList, $this->DrShareSettledId->AdvancedSearch->toJson(), ","); // Field DrShareSettledId
        $filterList = Concat($filterList, $this->DrShareSettiledStatus->AdvancedSearch->toJson(), ","); // Field DrShareSettiledStatus
        $filterList = Concat($filterList, $this->invoiceId->AdvancedSearch->toJson(), ","); // Field invoiceId
        $filterList = Concat($filterList, $this->invoiceAmount->AdvancedSearch->toJson(), ","); // Field invoiceAmount
        $filterList = Concat($filterList, $this->invoiceStatus->AdvancedSearch->toJson(), ","); // Field invoiceStatus
        $filterList = Concat($filterList, $this->modeOfPayment->AdvancedSearch->toJson(), ","); // Field modeOfPayment
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->ItemCode->AdvancedSearch->toJson(), ","); // Field ItemCode
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->sid->AdvancedSearch->toJson(), ","); // Field sid
        $filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
        $filterList = Concat($filterList, $this->DEptCd->AdvancedSearch->toJson(), ","); // Field DEptCd
        $filterList = Concat($filterList, $this->ProfCd->AdvancedSearch->toJson(), ","); // Field ProfCd
        $filterList = Concat($filterList, $this->LabReport->AdvancedSearch->toJson(), ","); // Field LabReport
        $filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Specimen->AdvancedSearch->toJson(), ","); // Field Specimen
        $filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
        $filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
        $filterList = Concat($filterList, $this->TestUnit->AdvancedSearch->toJson(), ","); // Field TestUnit
        $filterList = Concat($filterList, $this->LOWHIGH->AdvancedSearch->toJson(), ","); // Field LOWHIGH
        $filterList = Concat($filterList, $this->Branch->AdvancedSearch->toJson(), ","); // Field Branch
        $filterList = Concat($filterList, $this->Dispatch->AdvancedSearch->toJson(), ","); // Field Dispatch
        $filterList = Concat($filterList, $this->Pic1->AdvancedSearch->toJson(), ","); // Field Pic1
        $filterList = Concat($filterList, $this->Pic2->AdvancedSearch->toJson(), ","); // Field Pic2
        $filterList = Concat($filterList, $this->GraphPath->AdvancedSearch->toJson(), ","); // Field GraphPath
        $filterList = Concat($filterList, $this->MachineCD->AdvancedSearch->toJson(), ","); // Field MachineCD
        $filterList = Concat($filterList, $this->TestCancel->AdvancedSearch->toJson(), ","); // Field TestCancel
        $filterList = Concat($filterList, $this->OutSource->AdvancedSearch->toJson(), ","); // Field OutSource
        $filterList = Concat($filterList, $this->Printed->AdvancedSearch->toJson(), ","); // Field Printed
        $filterList = Concat($filterList, $this->PrintBy->AdvancedSearch->toJson(), ","); // Field PrintBy
        $filterList = Concat($filterList, $this->PrintDate->AdvancedSearch->toJson(), ","); // Field PrintDate
        $filterList = Concat($filterList, $this->BillingDate->AdvancedSearch->toJson(), ","); // Field BillingDate
        $filterList = Concat($filterList, $this->BilledBy->AdvancedSearch->toJson(), ","); // Field BilledBy
        $filterList = Concat($filterList, $this->Resulted->AdvancedSearch->toJson(), ","); // Field Resulted
        $filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
        $filterList = Concat($filterList, $this->ResultedBy->AdvancedSearch->toJson(), ","); // Field ResultedBy
        $filterList = Concat($filterList, $this->SampleDate->AdvancedSearch->toJson(), ","); // Field SampleDate
        $filterList = Concat($filterList, $this->SampleUser->AdvancedSearch->toJson(), ","); // Field SampleUser
        $filterList = Concat($filterList, $this->Sampled->AdvancedSearch->toJson(), ","); // Field Sampled
        $filterList = Concat($filterList, $this->ReceivedDate->AdvancedSearch->toJson(), ","); // Field ReceivedDate
        $filterList = Concat($filterList, $this->ReceivedUser->AdvancedSearch->toJson(), ","); // Field ReceivedUser
        $filterList = Concat($filterList, $this->Recevied->AdvancedSearch->toJson(), ","); // Field Recevied
        $filterList = Concat($filterList, $this->DeptRecvDate->AdvancedSearch->toJson(), ","); // Field DeptRecvDate
        $filterList = Concat($filterList, $this->DeptRecvUser->AdvancedSearch->toJson(), ","); // Field DeptRecvUser
        $filterList = Concat($filterList, $this->DeptRecived->AdvancedSearch->toJson(), ","); // Field DeptRecived
        $filterList = Concat($filterList, $this->SAuthDate->AdvancedSearch->toJson(), ","); // Field SAuthDate
        $filterList = Concat($filterList, $this->SAuthBy->AdvancedSearch->toJson(), ","); // Field SAuthBy
        $filterList = Concat($filterList, $this->SAuthendicate->AdvancedSearch->toJson(), ","); // Field SAuthendicate
        $filterList = Concat($filterList, $this->AuthDate->AdvancedSearch->toJson(), ","); // Field AuthDate
        $filterList = Concat($filterList, $this->AuthBy->AdvancedSearch->toJson(), ","); // Field AuthBy
        $filterList = Concat($filterList, $this->Authencate->AdvancedSearch->toJson(), ","); // Field Authencate
        $filterList = Concat($filterList, $this->EditDate->AdvancedSearch->toJson(), ","); // Field EditDate
        $filterList = Concat($filterList, $this->EditBy->AdvancedSearch->toJson(), ","); // Field EditBy
        $filterList = Concat($filterList, $this->Editted->AdvancedSearch->toJson(), ","); // Field Editted
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
        $filterList = Concat($filterList, $this->CId->AdvancedSearch->toJson(), ","); // Field CId
        $filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
        $filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
        $filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
        $filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
        $filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
        $filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
        $filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
        $filterList = Concat($filterList, $this->TestType->AdvancedSearch->toJson(), ","); // Field TestType
        $filterList = Concat($filterList, $this->Repeated->AdvancedSearch->toJson(), ","); // Field Repeated
        $filterList = Concat($filterList, $this->RepeatedBy->AdvancedSearch->toJson(), ","); // Field RepeatedBy
        $filterList = Concat($filterList, $this->RepeatedDate->AdvancedSearch->toJson(), ","); // Field RepeatedDate
        $filterList = Concat($filterList, $this->serviceID->AdvancedSearch->toJson(), ","); // Field serviceID
        $filterList = Concat($filterList, $this->Service_Type->AdvancedSearch->toJson(), ","); // Field Service_Type
        $filterList = Concat($filterList, $this->Service_Department->AdvancedSearch->toJson(), ","); // Field Service_Department
        $filterList = Concat($filterList, $this->RequestNo->AdvancedSearch->toJson(), ","); // Field RequestNo
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_patient_serviceslistsrch", $filters);
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

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

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

        // Field Services
        $this->Services->AdvancedSearch->SearchValue = @$filter["x_Services"];
        $this->Services->AdvancedSearch->SearchOperator = @$filter["z_Services"];
        $this->Services->AdvancedSearch->SearchCondition = @$filter["v_Services"];
        $this->Services->AdvancedSearch->SearchValue2 = @$filter["y_Services"];
        $this->Services->AdvancedSearch->SearchOperator2 = @$filter["w_Services"];
        $this->Services->AdvancedSearch->save();

        // Field Unit
        $this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
        $this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
        $this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
        $this->Unit->AdvancedSearch->save();

        // Field amount
        $this->amount->AdvancedSearch->SearchValue = @$filter["x_amount"];
        $this->amount->AdvancedSearch->SearchOperator = @$filter["z_amount"];
        $this->amount->AdvancedSearch->SearchCondition = @$filter["v_amount"];
        $this->amount->AdvancedSearch->SearchValue2 = @$filter["y_amount"];
        $this->amount->AdvancedSearch->SearchOperator2 = @$filter["w_amount"];
        $this->amount->AdvancedSearch->save();

        // Field Quantity
        $this->Quantity->AdvancedSearch->SearchValue = @$filter["x_Quantity"];
        $this->Quantity->AdvancedSearch->SearchOperator = @$filter["z_Quantity"];
        $this->Quantity->AdvancedSearch->SearchCondition = @$filter["v_Quantity"];
        $this->Quantity->AdvancedSearch->SearchValue2 = @$filter["y_Quantity"];
        $this->Quantity->AdvancedSearch->SearchOperator2 = @$filter["w_Quantity"];
        $this->Quantity->AdvancedSearch->save();

        // Field DiscountCategory
        $this->DiscountCategory->AdvancedSearch->SearchValue = @$filter["x_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchOperator = @$filter["z_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchCondition = @$filter["v_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchValue2 = @$filter["y_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountCategory"];
        $this->DiscountCategory->AdvancedSearch->save();

        // Field Discount
        $this->Discount->AdvancedSearch->SearchValue = @$filter["x_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator = @$filter["z_Discount"];
        $this->Discount->AdvancedSearch->SearchCondition = @$filter["v_Discount"];
        $this->Discount->AdvancedSearch->SearchValue2 = @$filter["y_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator2 = @$filter["w_Discount"];
        $this->Discount->AdvancedSearch->save();

        // Field SubTotal
        $this->SubTotal->AdvancedSearch->SearchValue = @$filter["x_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchOperator = @$filter["z_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchCondition = @$filter["v_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchValue2 = @$filter["y_SubTotal"];
        $this->SubTotal->AdvancedSearch->SearchOperator2 = @$filter["w_SubTotal"];
        $this->SubTotal->AdvancedSearch->save();

        // Field description
        $this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
        $this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
        $this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
        $this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
        $this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
        $this->description->AdvancedSearch->save();

        // Field patient_type
        $this->patient_type->AdvancedSearch->SearchValue = @$filter["x_patient_type"];
        $this->patient_type->AdvancedSearch->SearchOperator = @$filter["z_patient_type"];
        $this->patient_type->AdvancedSearch->SearchCondition = @$filter["v_patient_type"];
        $this->patient_type->AdvancedSearch->SearchValue2 = @$filter["y_patient_type"];
        $this->patient_type->AdvancedSearch->SearchOperator2 = @$filter["w_patient_type"];
        $this->patient_type->AdvancedSearch->save();

        // Field charged_date
        $this->charged_date->AdvancedSearch->SearchValue = @$filter["x_charged_date"];
        $this->charged_date->AdvancedSearch->SearchOperator = @$filter["z_charged_date"];
        $this->charged_date->AdvancedSearch->SearchCondition = @$filter["v_charged_date"];
        $this->charged_date->AdvancedSearch->SearchValue2 = @$filter["y_charged_date"];
        $this->charged_date->AdvancedSearch->SearchOperator2 = @$filter["w_charged_date"];
        $this->charged_date->AdvancedSearch->save();

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

        // Field Aid
        $this->Aid->AdvancedSearch->SearchValue = @$filter["x_Aid"];
        $this->Aid->AdvancedSearch->SearchOperator = @$filter["z_Aid"];
        $this->Aid->AdvancedSearch->SearchCondition = @$filter["v_Aid"];
        $this->Aid->AdvancedSearch->SearchValue2 = @$filter["y_Aid"];
        $this->Aid->AdvancedSearch->SearchOperator2 = @$filter["w_Aid"];
        $this->Aid->AdvancedSearch->save();

        // Field Vid
        $this->Vid->AdvancedSearch->SearchValue = @$filter["x_Vid"];
        $this->Vid->AdvancedSearch->SearchOperator = @$filter["z_Vid"];
        $this->Vid->AdvancedSearch->SearchCondition = @$filter["v_Vid"];
        $this->Vid->AdvancedSearch->SearchValue2 = @$filter["y_Vid"];
        $this->Vid->AdvancedSearch->SearchOperator2 = @$filter["w_Vid"];
        $this->Vid->AdvancedSearch->save();

        // Field DrID
        $this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
        $this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
        $this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
        $this->DrID->AdvancedSearch->save();

        // Field DrCODE
        $this->DrCODE->AdvancedSearch->SearchValue = @$filter["x_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchOperator = @$filter["z_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchCondition = @$filter["v_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchValue2 = @$filter["y_DrCODE"];
        $this->DrCODE->AdvancedSearch->SearchOperator2 = @$filter["w_DrCODE"];
        $this->DrCODE->AdvancedSearch->save();

        // Field DrName
        $this->DrName->AdvancedSearch->SearchValue = @$filter["x_DrName"];
        $this->DrName->AdvancedSearch->SearchOperator = @$filter["z_DrName"];
        $this->DrName->AdvancedSearch->SearchCondition = @$filter["v_DrName"];
        $this->DrName->AdvancedSearch->SearchValue2 = @$filter["y_DrName"];
        $this->DrName->AdvancedSearch->SearchOperator2 = @$filter["w_DrName"];
        $this->DrName->AdvancedSearch->save();

        // Field Department
        $this->Department->AdvancedSearch->SearchValue = @$filter["x_Department"];
        $this->Department->AdvancedSearch->SearchOperator = @$filter["z_Department"];
        $this->Department->AdvancedSearch->SearchCondition = @$filter["v_Department"];
        $this->Department->AdvancedSearch->SearchValue2 = @$filter["y_Department"];
        $this->Department->AdvancedSearch->SearchOperator2 = @$filter["w_Department"];
        $this->Department->AdvancedSearch->save();

        // Field DrSharePres
        $this->DrSharePres->AdvancedSearch->SearchValue = @$filter["x_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchOperator = @$filter["z_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchCondition = @$filter["v_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchValue2 = @$filter["y_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->SearchOperator2 = @$filter["w_DrSharePres"];
        $this->DrSharePres->AdvancedSearch->save();

        // Field HospSharePres
        $this->HospSharePres->AdvancedSearch->SearchValue = @$filter["x_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchOperator = @$filter["z_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchCondition = @$filter["v_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchValue2 = @$filter["y_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->SearchOperator2 = @$filter["w_HospSharePres"];
        $this->HospSharePres->AdvancedSearch->save();

        // Field DrShareAmount
        $this->DrShareAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->save();

        // Field HospShareAmount
        $this->HospShareAmount->AdvancedSearch->SearchValue = @$filter["x_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator = @$filter["z_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchCondition = @$filter["v_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->save();

        // Field DrShareSettiledAmount
        $this->DrShareSettiledAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettiledAmount"];
        $this->DrShareSettiledAmount->AdvancedSearch->save();

        // Field DrShareSettledId
        $this->DrShareSettledId->AdvancedSearch->SearchValue = @$filter["x_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettledId"];
        $this->DrShareSettledId->AdvancedSearch->save();

        // Field DrShareSettiledStatus
        $this->DrShareSettiledStatus->AdvancedSearch->SearchValue = @$filter["x_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettiledStatus"];
        $this->DrShareSettiledStatus->AdvancedSearch->save();

        // Field invoiceId
        $this->invoiceId->AdvancedSearch->SearchValue = @$filter["x_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchOperator = @$filter["z_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchCondition = @$filter["v_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchValue2 = @$filter["y_invoiceId"];
        $this->invoiceId->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceId"];
        $this->invoiceId->AdvancedSearch->save();

        // Field invoiceAmount
        $this->invoiceAmount->AdvancedSearch->SearchValue = @$filter["x_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchOperator = @$filter["z_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchCondition = @$filter["v_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchValue2 = @$filter["y_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceAmount"];
        $this->invoiceAmount->AdvancedSearch->save();

        // Field invoiceStatus
        $this->invoiceStatus->AdvancedSearch->SearchValue = @$filter["x_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchOperator = @$filter["z_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchCondition = @$filter["v_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchValue2 = @$filter["y_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceStatus"];
        $this->invoiceStatus->AdvancedSearch->save();

        // Field modeOfPayment
        $this->modeOfPayment->AdvancedSearch->SearchValue = @$filter["x_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchOperator = @$filter["z_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchCondition = @$filter["v_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchValue2 = @$filter["y_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->SearchOperator2 = @$filter["w_modeOfPayment"];
        $this->modeOfPayment->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field RIDNO
        $this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
        $this->RIDNO->AdvancedSearch->save();

        // Field ItemCode
        $this->ItemCode->AdvancedSearch->SearchValue = @$filter["x_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchOperator = @$filter["z_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchCondition = @$filter["v_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchValue2 = @$filter["y_ItemCode"];
        $this->ItemCode->AdvancedSearch->SearchOperator2 = @$filter["w_ItemCode"];
        $this->ItemCode->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field sid
        $this->sid->AdvancedSearch->SearchValue = @$filter["x_sid"];
        $this->sid->AdvancedSearch->SearchOperator = @$filter["z_sid"];
        $this->sid->AdvancedSearch->SearchCondition = @$filter["v_sid"];
        $this->sid->AdvancedSearch->SearchValue2 = @$filter["y_sid"];
        $this->sid->AdvancedSearch->SearchOperator2 = @$filter["w_sid"];
        $this->sid->AdvancedSearch->save();

        // Field TestSubCd
        $this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->save();

        // Field DEptCd
        $this->DEptCd->AdvancedSearch->SearchValue = @$filter["x_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchOperator = @$filter["z_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchCondition = @$filter["v_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchValue2 = @$filter["y_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchOperator2 = @$filter["w_DEptCd"];
        $this->DEptCd->AdvancedSearch->save();

        // Field ProfCd
        $this->ProfCd->AdvancedSearch->SearchValue = @$filter["x_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchOperator = @$filter["z_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchCondition = @$filter["v_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchValue2 = @$filter["y_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchOperator2 = @$filter["w_ProfCd"];
        $this->ProfCd->AdvancedSearch->save();

        // Field LabReport
        $this->LabReport->AdvancedSearch->SearchValue = @$filter["x_LabReport"];
        $this->LabReport->AdvancedSearch->SearchOperator = @$filter["z_LabReport"];
        $this->LabReport->AdvancedSearch->SearchCondition = @$filter["v_LabReport"];
        $this->LabReport->AdvancedSearch->SearchValue2 = @$filter["y_LabReport"];
        $this->LabReport->AdvancedSearch->SearchOperator2 = @$filter["w_LabReport"];
        $this->LabReport->AdvancedSearch->save();

        // Field Comments
        $this->Comments->AdvancedSearch->SearchValue = @$filter["x_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator = @$filter["z_Comments"];
        $this->Comments->AdvancedSearch->SearchCondition = @$filter["v_Comments"];
        $this->Comments->AdvancedSearch->SearchValue2 = @$filter["y_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator2 = @$filter["w_Comments"];
        $this->Comments->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Specimen
        $this->Specimen->AdvancedSearch->SearchValue = @$filter["x_Specimen"];
        $this->Specimen->AdvancedSearch->SearchOperator = @$filter["z_Specimen"];
        $this->Specimen->AdvancedSearch->SearchCondition = @$filter["v_Specimen"];
        $this->Specimen->AdvancedSearch->SearchValue2 = @$filter["y_Specimen"];
        $this->Specimen->AdvancedSearch->SearchOperator2 = @$filter["w_Specimen"];
        $this->Specimen->AdvancedSearch->save();

        // Field Abnormal
        $this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
        $this->Abnormal->AdvancedSearch->save();

        // Field RefValue
        $this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
        $this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
        $this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
        $this->RefValue->AdvancedSearch->save();

        // Field TestUnit
        $this->TestUnit->AdvancedSearch->SearchValue = @$filter["x_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchOperator = @$filter["z_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchCondition = @$filter["v_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchValue2 = @$filter["y_TestUnit"];
        $this->TestUnit->AdvancedSearch->SearchOperator2 = @$filter["w_TestUnit"];
        $this->TestUnit->AdvancedSearch->save();

        // Field LOWHIGH
        $this->LOWHIGH->AdvancedSearch->SearchValue = @$filter["x_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchOperator = @$filter["z_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchCondition = @$filter["v_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchValue2 = @$filter["y_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchOperator2 = @$filter["w_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->save();

        // Field Branch
        $this->Branch->AdvancedSearch->SearchValue = @$filter["x_Branch"];
        $this->Branch->AdvancedSearch->SearchOperator = @$filter["z_Branch"];
        $this->Branch->AdvancedSearch->SearchCondition = @$filter["v_Branch"];
        $this->Branch->AdvancedSearch->SearchValue2 = @$filter["y_Branch"];
        $this->Branch->AdvancedSearch->SearchOperator2 = @$filter["w_Branch"];
        $this->Branch->AdvancedSearch->save();

        // Field Dispatch
        $this->Dispatch->AdvancedSearch->SearchValue = @$filter["x_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchOperator = @$filter["z_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchCondition = @$filter["v_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchValue2 = @$filter["y_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchOperator2 = @$filter["w_Dispatch"];
        $this->Dispatch->AdvancedSearch->save();

        // Field Pic1
        $this->Pic1->AdvancedSearch->SearchValue = @$filter["x_Pic1"];
        $this->Pic1->AdvancedSearch->SearchOperator = @$filter["z_Pic1"];
        $this->Pic1->AdvancedSearch->SearchCondition = @$filter["v_Pic1"];
        $this->Pic1->AdvancedSearch->SearchValue2 = @$filter["y_Pic1"];
        $this->Pic1->AdvancedSearch->SearchOperator2 = @$filter["w_Pic1"];
        $this->Pic1->AdvancedSearch->save();

        // Field Pic2
        $this->Pic2->AdvancedSearch->SearchValue = @$filter["x_Pic2"];
        $this->Pic2->AdvancedSearch->SearchOperator = @$filter["z_Pic2"];
        $this->Pic2->AdvancedSearch->SearchCondition = @$filter["v_Pic2"];
        $this->Pic2->AdvancedSearch->SearchValue2 = @$filter["y_Pic2"];
        $this->Pic2->AdvancedSearch->SearchOperator2 = @$filter["w_Pic2"];
        $this->Pic2->AdvancedSearch->save();

        // Field GraphPath
        $this->GraphPath->AdvancedSearch->SearchValue = @$filter["x_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchOperator = @$filter["z_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchCondition = @$filter["v_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchValue2 = @$filter["y_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchOperator2 = @$filter["w_GraphPath"];
        $this->GraphPath->AdvancedSearch->save();

        // Field MachineCD
        $this->MachineCD->AdvancedSearch->SearchValue = @$filter["x_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchOperator = @$filter["z_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchCondition = @$filter["v_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchValue2 = @$filter["y_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchOperator2 = @$filter["w_MachineCD"];
        $this->MachineCD->AdvancedSearch->save();

        // Field TestCancel
        $this->TestCancel->AdvancedSearch->SearchValue = @$filter["x_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchOperator = @$filter["z_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchCondition = @$filter["v_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchValue2 = @$filter["y_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchOperator2 = @$filter["w_TestCancel"];
        $this->TestCancel->AdvancedSearch->save();

        // Field OutSource
        $this->OutSource->AdvancedSearch->SearchValue = @$filter["x_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator = @$filter["z_OutSource"];
        $this->OutSource->AdvancedSearch->SearchCondition = @$filter["v_OutSource"];
        $this->OutSource->AdvancedSearch->SearchValue2 = @$filter["y_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator2 = @$filter["w_OutSource"];
        $this->OutSource->AdvancedSearch->save();

        // Field Printed
        $this->Printed->AdvancedSearch->SearchValue = @$filter["x_Printed"];
        $this->Printed->AdvancedSearch->SearchOperator = @$filter["z_Printed"];
        $this->Printed->AdvancedSearch->SearchCondition = @$filter["v_Printed"];
        $this->Printed->AdvancedSearch->SearchValue2 = @$filter["y_Printed"];
        $this->Printed->AdvancedSearch->SearchOperator2 = @$filter["w_Printed"];
        $this->Printed->AdvancedSearch->save();

        // Field PrintBy
        $this->PrintBy->AdvancedSearch->SearchValue = @$filter["x_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchOperator = @$filter["z_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchCondition = @$filter["v_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchValue2 = @$filter["y_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchOperator2 = @$filter["w_PrintBy"];
        $this->PrintBy->AdvancedSearch->save();

        // Field PrintDate
        $this->PrintDate->AdvancedSearch->SearchValue = @$filter["x_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchOperator = @$filter["z_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchCondition = @$filter["v_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchValue2 = @$filter["y_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchOperator2 = @$filter["w_PrintDate"];
        $this->PrintDate->AdvancedSearch->save();

        // Field BillingDate
        $this->BillingDate->AdvancedSearch->SearchValue = @$filter["x_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchOperator = @$filter["z_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchCondition = @$filter["v_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchValue2 = @$filter["y_BillingDate"];
        $this->BillingDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillingDate"];
        $this->BillingDate->AdvancedSearch->save();

        // Field BilledBy
        $this->BilledBy->AdvancedSearch->SearchValue = @$filter["x_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchOperator = @$filter["z_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchCondition = @$filter["v_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchValue2 = @$filter["y_BilledBy"];
        $this->BilledBy->AdvancedSearch->SearchOperator2 = @$filter["w_BilledBy"];
        $this->BilledBy->AdvancedSearch->save();

        // Field Resulted
        $this->Resulted->AdvancedSearch->SearchValue = @$filter["x_Resulted"];
        $this->Resulted->AdvancedSearch->SearchOperator = @$filter["z_Resulted"];
        $this->Resulted->AdvancedSearch->SearchCondition = @$filter["v_Resulted"];
        $this->Resulted->AdvancedSearch->SearchValue2 = @$filter["y_Resulted"];
        $this->Resulted->AdvancedSearch->SearchOperator2 = @$filter["w_Resulted"];
        $this->Resulted->AdvancedSearch->save();

        // Field ResultDate
        $this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
        $this->ResultDate->AdvancedSearch->save();

        // Field ResultedBy
        $this->ResultedBy->AdvancedSearch->SearchValue = @$filter["x_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchOperator = @$filter["z_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchCondition = @$filter["v_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchValue2 = @$filter["y_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ResultedBy"];
        $this->ResultedBy->AdvancedSearch->save();

        // Field SampleDate
        $this->SampleDate->AdvancedSearch->SearchValue = @$filter["x_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchOperator = @$filter["z_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchCondition = @$filter["v_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchValue2 = @$filter["y_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchOperator2 = @$filter["w_SampleDate"];
        $this->SampleDate->AdvancedSearch->save();

        // Field SampleUser
        $this->SampleUser->AdvancedSearch->SearchValue = @$filter["x_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchOperator = @$filter["z_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchCondition = @$filter["v_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchValue2 = @$filter["y_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchOperator2 = @$filter["w_SampleUser"];
        $this->SampleUser->AdvancedSearch->save();

        // Field Sampled
        $this->Sampled->AdvancedSearch->SearchValue = @$filter["x_Sampled"];
        $this->Sampled->AdvancedSearch->SearchOperator = @$filter["z_Sampled"];
        $this->Sampled->AdvancedSearch->SearchCondition = @$filter["v_Sampled"];
        $this->Sampled->AdvancedSearch->SearchValue2 = @$filter["y_Sampled"];
        $this->Sampled->AdvancedSearch->SearchOperator2 = @$filter["w_Sampled"];
        $this->Sampled->AdvancedSearch->save();

        // Field ReceivedDate
        $this->ReceivedDate->AdvancedSearch->SearchValue = @$filter["x_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchOperator = @$filter["z_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchCondition = @$filter["v_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->save();

        // Field ReceivedUser
        $this->ReceivedUser->AdvancedSearch->SearchValue = @$filter["x_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchOperator = @$filter["z_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchCondition = @$filter["v_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->save();

        // Field Recevied
        $this->Recevied->AdvancedSearch->SearchValue = @$filter["x_Recevied"];
        $this->Recevied->AdvancedSearch->SearchOperator = @$filter["z_Recevied"];
        $this->Recevied->AdvancedSearch->SearchCondition = @$filter["v_Recevied"];
        $this->Recevied->AdvancedSearch->SearchValue2 = @$filter["y_Recevied"];
        $this->Recevied->AdvancedSearch->SearchOperator2 = @$filter["w_Recevied"];
        $this->Recevied->AdvancedSearch->save();

        // Field DeptRecvDate
        $this->DeptRecvDate->AdvancedSearch->SearchValue = @$filter["x_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->save();

        // Field DeptRecvUser
        $this->DeptRecvUser->AdvancedSearch->SearchValue = @$filter["x_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->save();

        // Field DeptRecived
        $this->DeptRecived->AdvancedSearch->SearchValue = @$filter["x_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchOperator = @$filter["z_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchCondition = @$filter["v_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecived"];
        $this->DeptRecived->AdvancedSearch->save();

        // Field SAuthDate
        $this->SAuthDate->AdvancedSearch->SearchValue = @$filter["x_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchOperator = @$filter["z_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchCondition = @$filter["v_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->save();

        // Field SAuthBy
        $this->SAuthBy->AdvancedSearch->SearchValue = @$filter["x_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchOperator = @$filter["z_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchCondition = @$filter["v_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchValue2 = @$filter["y_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->save();

        // Field SAuthendicate
        $this->SAuthendicate->AdvancedSearch->SearchValue = @$filter["x_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchOperator = @$filter["z_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchCondition = @$filter["v_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthendicate"];
        $this->SAuthendicate->AdvancedSearch->save();

        // Field AuthDate
        $this->AuthDate->AdvancedSearch->SearchValue = @$filter["x_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchOperator = @$filter["z_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchCondition = @$filter["v_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchValue2 = @$filter["y_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_AuthDate"];
        $this->AuthDate->AdvancedSearch->save();

        // Field AuthBy
        $this->AuthBy->AdvancedSearch->SearchValue = @$filter["x_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchOperator = @$filter["z_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchCondition = @$filter["v_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchValue2 = @$filter["y_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_AuthBy"];
        $this->AuthBy->AdvancedSearch->save();

        // Field Authencate
        $this->Authencate->AdvancedSearch->SearchValue = @$filter["x_Authencate"];
        $this->Authencate->AdvancedSearch->SearchOperator = @$filter["z_Authencate"];
        $this->Authencate->AdvancedSearch->SearchCondition = @$filter["v_Authencate"];
        $this->Authencate->AdvancedSearch->SearchValue2 = @$filter["y_Authencate"];
        $this->Authencate->AdvancedSearch->SearchOperator2 = @$filter["w_Authencate"];
        $this->Authencate->AdvancedSearch->save();

        // Field EditDate
        $this->EditDate->AdvancedSearch->SearchValue = @$filter["x_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator = @$filter["z_EditDate"];
        $this->EditDate->AdvancedSearch->SearchCondition = @$filter["v_EditDate"];
        $this->EditDate->AdvancedSearch->SearchValue2 = @$filter["y_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator2 = @$filter["w_EditDate"];
        $this->EditDate->AdvancedSearch->save();

        // Field EditBy
        $this->EditBy->AdvancedSearch->SearchValue = @$filter["x_EditBy"];
        $this->EditBy->AdvancedSearch->SearchOperator = @$filter["z_EditBy"];
        $this->EditBy->AdvancedSearch->SearchCondition = @$filter["v_EditBy"];
        $this->EditBy->AdvancedSearch->SearchValue2 = @$filter["y_EditBy"];
        $this->EditBy->AdvancedSearch->SearchOperator2 = @$filter["w_EditBy"];
        $this->EditBy->AdvancedSearch->save();

        // Field Editted
        $this->Editted->AdvancedSearch->SearchValue = @$filter["x_Editted"];
        $this->Editted->AdvancedSearch->SearchOperator = @$filter["z_Editted"];
        $this->Editted->AdvancedSearch->SearchCondition = @$filter["v_Editted"];
        $this->Editted->AdvancedSearch->SearchValue2 = @$filter["y_Editted"];
        $this->Editted->AdvancedSearch->SearchOperator2 = @$filter["w_Editted"];
        $this->Editted->AdvancedSearch->save();

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field PatientId
        $this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
        $this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
        $this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
        $this->PatientId->AdvancedSearch->save();

        // Field Mobile
        $this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
        $this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
        $this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
        $this->Mobile->AdvancedSearch->save();

        // Field CId
        $this->CId->AdvancedSearch->SearchValue = @$filter["x_CId"];
        $this->CId->AdvancedSearch->SearchOperator = @$filter["z_CId"];
        $this->CId->AdvancedSearch->SearchCondition = @$filter["v_CId"];
        $this->CId->AdvancedSearch->SearchValue2 = @$filter["y_CId"];
        $this->CId->AdvancedSearch->SearchOperator2 = @$filter["w_CId"];
        $this->CId->AdvancedSearch->save();

        // Field Order
        $this->Order->AdvancedSearch->SearchValue = @$filter["x_Order"];
        $this->Order->AdvancedSearch->SearchOperator = @$filter["z_Order"];
        $this->Order->AdvancedSearch->SearchCondition = @$filter["v_Order"];
        $this->Order->AdvancedSearch->SearchValue2 = @$filter["y_Order"];
        $this->Order->AdvancedSearch->SearchOperator2 = @$filter["w_Order"];
        $this->Order->AdvancedSearch->save();

        // Field Form
        $this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
        $this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
        $this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
        $this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
        $this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
        $this->Form->AdvancedSearch->save();

        // Field ResType
        $this->ResType->AdvancedSearch->SearchValue = @$filter["x_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator = @$filter["z_ResType"];
        $this->ResType->AdvancedSearch->SearchCondition = @$filter["v_ResType"];
        $this->ResType->AdvancedSearch->SearchValue2 = @$filter["y_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator2 = @$filter["w_ResType"];
        $this->ResType->AdvancedSearch->save();

        // Field Sample
        $this->Sample->AdvancedSearch->SearchValue = @$filter["x_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator = @$filter["z_Sample"];
        $this->Sample->AdvancedSearch->SearchCondition = @$filter["v_Sample"];
        $this->Sample->AdvancedSearch->SearchValue2 = @$filter["y_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator2 = @$filter["w_Sample"];
        $this->Sample->AdvancedSearch->save();

        // Field NoD
        $this->NoD->AdvancedSearch->SearchValue = @$filter["x_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator = @$filter["z_NoD"];
        $this->NoD->AdvancedSearch->SearchCondition = @$filter["v_NoD"];
        $this->NoD->AdvancedSearch->SearchValue2 = @$filter["y_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator2 = @$filter["w_NoD"];
        $this->NoD->AdvancedSearch->save();

        // Field BillOrder
        $this->BillOrder->AdvancedSearch->SearchValue = @$filter["x_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator = @$filter["z_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchCondition = @$filter["v_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchValue2 = @$filter["y_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator2 = @$filter["w_BillOrder"];
        $this->BillOrder->AdvancedSearch->save();

        // Field Formula
        $this->Formula->AdvancedSearch->SearchValue = @$filter["x_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator = @$filter["z_Formula"];
        $this->Formula->AdvancedSearch->SearchCondition = @$filter["v_Formula"];
        $this->Formula->AdvancedSearch->SearchValue2 = @$filter["y_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator2 = @$filter["w_Formula"];
        $this->Formula->AdvancedSearch->save();

        // Field Inactive
        $this->Inactive->AdvancedSearch->SearchValue = @$filter["x_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator = @$filter["z_Inactive"];
        $this->Inactive->AdvancedSearch->SearchCondition = @$filter["v_Inactive"];
        $this->Inactive->AdvancedSearch->SearchValue2 = @$filter["y_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator2 = @$filter["w_Inactive"];
        $this->Inactive->AdvancedSearch->save();

        // Field CollSample
        $this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
        $this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
        $this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
        $this->CollSample->AdvancedSearch->save();

        // Field TestType
        $this->TestType->AdvancedSearch->SearchValue = @$filter["x_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator = @$filter["z_TestType"];
        $this->TestType->AdvancedSearch->SearchCondition = @$filter["v_TestType"];
        $this->TestType->AdvancedSearch->SearchValue2 = @$filter["y_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator2 = @$filter["w_TestType"];
        $this->TestType->AdvancedSearch->save();

        // Field Repeated
        $this->Repeated->AdvancedSearch->SearchValue = @$filter["x_Repeated"];
        $this->Repeated->AdvancedSearch->SearchOperator = @$filter["z_Repeated"];
        $this->Repeated->AdvancedSearch->SearchCondition = @$filter["v_Repeated"];
        $this->Repeated->AdvancedSearch->SearchValue2 = @$filter["y_Repeated"];
        $this->Repeated->AdvancedSearch->SearchOperator2 = @$filter["w_Repeated"];
        $this->Repeated->AdvancedSearch->save();

        // Field RepeatedBy
        $this->RepeatedBy->AdvancedSearch->SearchValue = @$filter["x_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchOperator = @$filter["z_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchCondition = @$filter["v_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchValue2 = @$filter["y_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RepeatedBy"];
        $this->RepeatedBy->AdvancedSearch->save();

        // Field RepeatedDate
        $this->RepeatedDate->AdvancedSearch->SearchValue = @$filter["x_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchOperator = @$filter["z_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchCondition = @$filter["v_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchValue2 = @$filter["y_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_RepeatedDate"];
        $this->RepeatedDate->AdvancedSearch->save();

        // Field serviceID
        $this->serviceID->AdvancedSearch->SearchValue = @$filter["x_serviceID"];
        $this->serviceID->AdvancedSearch->SearchOperator = @$filter["z_serviceID"];
        $this->serviceID->AdvancedSearch->SearchCondition = @$filter["v_serviceID"];
        $this->serviceID->AdvancedSearch->SearchValue2 = @$filter["y_serviceID"];
        $this->serviceID->AdvancedSearch->SearchOperator2 = @$filter["w_serviceID"];
        $this->serviceID->AdvancedSearch->save();

        // Field Service_Type
        $this->Service_Type->AdvancedSearch->SearchValue = @$filter["x_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchOperator = @$filter["z_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchCondition = @$filter["v_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchValue2 = @$filter["y_Service_Type"];
        $this->Service_Type->AdvancedSearch->SearchOperator2 = @$filter["w_Service_Type"];
        $this->Service_Type->AdvancedSearch->save();

        // Field Service_Department
        $this->Service_Department->AdvancedSearch->SearchValue = @$filter["x_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchOperator = @$filter["z_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchCondition = @$filter["v_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchValue2 = @$filter["y_Service_Department"];
        $this->Service_Department->AdvancedSearch->SearchOperator2 = @$filter["w_Service_Department"];
        $this->Service_Department->AdvancedSearch->save();

        // Field RequestNo
        $this->RequestNo->AdvancedSearch->SearchValue = @$filter["x_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchOperator = @$filter["z_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchCondition = @$filter["v_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchValue2 = @$filter["y_RequestNo"];
        $this->RequestNo->AdvancedSearch->SearchOperator2 = @$filter["w_RequestNo"];
        $this->RequestNo->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Services, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DiscountCategory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Department, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->invoiceStatus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modeOfPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ItemCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DEptCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProfCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LabReport, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Specimen, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestUnit, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LOWHIGH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Branch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Dispatch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pic1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pic2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GraphPath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MachineCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestCancel, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OutSource, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Printed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrintBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BilledBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Resulted, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResultedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SampleUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sampled, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReceivedUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Recevied, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptRecvUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptRecived, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAuthBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAuthendicate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AuthBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Authencate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EditBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Editted, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Repeated, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RepeatedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Service_Type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Service_Department, $arKeywords, $type);
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

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->Gender); // Gender
            $this->updateSort($this->profilePic); // profilePic
            $this->updateSort($this->Services); // Services
            $this->updateSort($this->Unit); // Unit
            $this->updateSort($this->amount); // amount
            $this->updateSort($this->Quantity); // Quantity
            $this->updateSort($this->DiscountCategory); // DiscountCategory
            $this->updateSort($this->Discount); // Discount
            $this->updateSort($this->SubTotal); // SubTotal
            $this->updateSort($this->description); // description
            $this->updateSort($this->patient_type); // patient_type
            $this->updateSort($this->charged_date); // charged_date
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->Aid); // Aid
            $this->updateSort($this->Vid); // Vid
            $this->updateSort($this->DrID); // DrID
            $this->updateSort($this->DrCODE); // DrCODE
            $this->updateSort($this->DrName); // DrName
            $this->updateSort($this->Department); // Department
            $this->updateSort($this->DrSharePres); // DrSharePres
            $this->updateSort($this->HospSharePres); // HospSharePres
            $this->updateSort($this->DrShareAmount); // DrShareAmount
            $this->updateSort($this->HospShareAmount); // HospShareAmount
            $this->updateSort($this->DrShareSettiledAmount); // DrShareSettiledAmount
            $this->updateSort($this->DrShareSettledId); // DrShareSettledId
            $this->updateSort($this->DrShareSettiledStatus); // DrShareSettiledStatus
            $this->updateSort($this->invoiceId); // invoiceId
            $this->updateSort($this->invoiceAmount); // invoiceAmount
            $this->updateSort($this->invoiceStatus); // invoiceStatus
            $this->updateSort($this->modeOfPayment); // modeOfPayment
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->ItemCode); // ItemCode
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->sid); // sid
            $this->updateSort($this->TestSubCd); // TestSubCd
            $this->updateSort($this->DEptCd); // DEptCd
            $this->updateSort($this->ProfCd); // ProfCd
            $this->updateSort($this->Comments); // Comments
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Specimen); // Specimen
            $this->updateSort($this->Abnormal); // Abnormal
            $this->updateSort($this->TestUnit); // TestUnit
            $this->updateSort($this->LOWHIGH); // LOWHIGH
            $this->updateSort($this->Branch); // Branch
            $this->updateSort($this->Dispatch); // Dispatch
            $this->updateSort($this->Pic1); // Pic1
            $this->updateSort($this->Pic2); // Pic2
            $this->updateSort($this->GraphPath); // GraphPath
            $this->updateSort($this->MachineCD); // MachineCD
            $this->updateSort($this->TestCancel); // TestCancel
            $this->updateSort($this->OutSource); // OutSource
            $this->updateSort($this->Printed); // Printed
            $this->updateSort($this->PrintBy); // PrintBy
            $this->updateSort($this->PrintDate); // PrintDate
            $this->updateSort($this->BillingDate); // BillingDate
            $this->updateSort($this->BilledBy); // BilledBy
            $this->updateSort($this->Resulted); // Resulted
            $this->updateSort($this->ResultDate); // ResultDate
            $this->updateSort($this->ResultedBy); // ResultedBy
            $this->updateSort($this->SampleDate); // SampleDate
            $this->updateSort($this->SampleUser); // SampleUser
            $this->updateSort($this->Sampled); // Sampled
            $this->updateSort($this->ReceivedDate); // ReceivedDate
            $this->updateSort($this->ReceivedUser); // ReceivedUser
            $this->updateSort($this->Recevied); // Recevied
            $this->updateSort($this->DeptRecvDate); // DeptRecvDate
            $this->updateSort($this->DeptRecvUser); // DeptRecvUser
            $this->updateSort($this->DeptRecived); // DeptRecived
            $this->updateSort($this->SAuthDate); // SAuthDate
            $this->updateSort($this->SAuthBy); // SAuthBy
            $this->updateSort($this->SAuthendicate); // SAuthendicate
            $this->updateSort($this->AuthDate); // AuthDate
            $this->updateSort($this->AuthBy); // AuthBy
            $this->updateSort($this->Authencate); // Authencate
            $this->updateSort($this->EditDate); // EditDate
            $this->updateSort($this->EditBy); // EditBy
            $this->updateSort($this->Editted); // Editted
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->Mobile); // Mobile
            $this->updateSort($this->CId); // CId
            $this->updateSort($this->Order); // Order
            $this->updateSort($this->ResType); // ResType
            $this->updateSort($this->Sample); // Sample
            $this->updateSort($this->NoD); // NoD
            $this->updateSort($this->BillOrder); // BillOrder
            $this->updateSort($this->Inactive); // Inactive
            $this->updateSort($this->CollSample); // CollSample
            $this->updateSort($this->TestType); // TestType
            $this->updateSort($this->Repeated); // Repeated
            $this->updateSort($this->RepeatedBy); // RepeatedBy
            $this->updateSort($this->RepeatedDate); // RepeatedDate
            $this->updateSort($this->serviceID); // serviceID
            $this->updateSort($this->Service_Type); // Service_Type
            $this->updateSort($this->Service_Department); // Service_Department
            $this->updateSort($this->RequestNo); // RequestNo
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
            // Reset search criteria
            if ($this->Command == "reset" || $this->Command == "resetall") {
                $this->resetSearchParms();
            }

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
                $this->id->setSort("");
                $this->Reception->setSort("");
                $this->mrnno->setSort("");
                $this->PatientName->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->profilePic->setSort("");
                $this->Services->setSort("");
                $this->Unit->setSort("");
                $this->amount->setSort("");
                $this->Quantity->setSort("");
                $this->DiscountCategory->setSort("");
                $this->Discount->setSort("");
                $this->SubTotal->setSort("");
                $this->description->setSort("");
                $this->patient_type->setSort("");
                $this->charged_date->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->Aid->setSort("");
                $this->Vid->setSort("");
                $this->DrID->setSort("");
                $this->DrCODE->setSort("");
                $this->DrName->setSort("");
                $this->Department->setSort("");
                $this->DrSharePres->setSort("");
                $this->HospSharePres->setSort("");
                $this->DrShareAmount->setSort("");
                $this->HospShareAmount->setSort("");
                $this->DrShareSettiledAmount->setSort("");
                $this->DrShareSettledId->setSort("");
                $this->DrShareSettiledStatus->setSort("");
                $this->invoiceId->setSort("");
                $this->invoiceAmount->setSort("");
                $this->invoiceStatus->setSort("");
                $this->modeOfPayment->setSort("");
                $this->HospID->setSort("");
                $this->RIDNO->setSort("");
                $this->ItemCode->setSort("");
                $this->TidNo->setSort("");
                $this->sid->setSort("");
                $this->TestSubCd->setSort("");
                $this->DEptCd->setSort("");
                $this->ProfCd->setSort("");
                $this->LabReport->setSort("");
                $this->Comments->setSort("");
                $this->Method->setSort("");
                $this->Specimen->setSort("");
                $this->Abnormal->setSort("");
                $this->RefValue->setSort("");
                $this->TestUnit->setSort("");
                $this->LOWHIGH->setSort("");
                $this->Branch->setSort("");
                $this->Dispatch->setSort("");
                $this->Pic1->setSort("");
                $this->Pic2->setSort("");
                $this->GraphPath->setSort("");
                $this->MachineCD->setSort("");
                $this->TestCancel->setSort("");
                $this->OutSource->setSort("");
                $this->Printed->setSort("");
                $this->PrintBy->setSort("");
                $this->PrintDate->setSort("");
                $this->BillingDate->setSort("");
                $this->BilledBy->setSort("");
                $this->Resulted->setSort("");
                $this->ResultDate->setSort("");
                $this->ResultedBy->setSort("");
                $this->SampleDate->setSort("");
                $this->SampleUser->setSort("");
                $this->Sampled->setSort("");
                $this->ReceivedDate->setSort("");
                $this->ReceivedUser->setSort("");
                $this->Recevied->setSort("");
                $this->DeptRecvDate->setSort("");
                $this->DeptRecvUser->setSort("");
                $this->DeptRecived->setSort("");
                $this->SAuthDate->setSort("");
                $this->SAuthBy->setSort("");
                $this->SAuthendicate->setSort("");
                $this->AuthDate->setSort("");
                $this->AuthBy->setSort("");
                $this->Authencate->setSort("");
                $this->EditDate->setSort("");
                $this->EditBy->setSort("");
                $this->Editted->setSort("");
                $this->PatID->setSort("");
                $this->PatientId->setSort("");
                $this->Mobile->setSort("");
                $this->CId->setSort("");
                $this->Order->setSort("");
                $this->Form->setSort("");
                $this->ResType->setSort("");
                $this->Sample->setSort("");
                $this->NoD->setSort("");
                $this->BillOrder->setSort("");
                $this->Formula->setSort("");
                $this->Inactive->setSort("");
                $this->CollSample->setSort("");
                $this->TestType->setSort("");
                $this->Repeated->setSort("");
                $this->RepeatedBy->setSort("");
                $this->RepeatedDate->setSort("");
                $this->serviceID->setSort("");
                $this->Service_Type->setSort("");
                $this->Service_Department->setSort("");
                $this->RequestNo->setSort("");
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
            if ($this->isGridAdd() || $this->isGridEdit()) {
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
        $item = &$option->add("gridadd");
        $item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridAddUrl)) . "\">" . $Language->phrase("GridAddLink") . "</a>";
        $item->Visible = $this->GridAddUrl != "" && $Security->canAdd();

        // Add grid edit
        $option = $options["addedit"];
        $item = &$option->add("gridedit");
        $item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridEditUrl)) . "\">" . $Language->phrase("GridEditLink") . "</a>";
        $item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_patient_serviceslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_patient_serviceslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
        if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
            $option = $options["action"];
            // Set up list action buttons
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_MULTIPLE) {
                    $item = &$option->add("custom_" . $listaction->Action);
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_patient_serviceslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        } else { // Grid add/edit mode
            // Hide all options first
            foreach ($options as $option) {
                $option->hideAllOptions();
            }
            $pageUrl = $this->pageUrl();

            // Grid-Add
            if ($this->isGridAdd()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                // Add grid insert
                $item = &$option->add("gridinsert");
                $item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridInsertLink") . "</a>";
                // Add grid cancel
                $item = &$option->add("gridcancel");
                $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }

            // Grid-Edit
            if ($this->isGridEdit()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                    $item = &$option->add("gridsave");
                    $item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridSaveLink") . "</a>";
                    $item = &$option->add("gridcancel");
                    $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                    $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->Services->CurrentValue = null;
        $this->Services->OldValue = $this->Services->CurrentValue;
        $this->Unit->CurrentValue = null;
        $this->Unit->OldValue = $this->Unit->CurrentValue;
        $this->amount->CurrentValue = null;
        $this->amount->OldValue = $this->amount->CurrentValue;
        $this->Quantity->CurrentValue = null;
        $this->Quantity->OldValue = $this->Quantity->CurrentValue;
        $this->DiscountCategory->CurrentValue = null;
        $this->DiscountCategory->OldValue = $this->DiscountCategory->CurrentValue;
        $this->Discount->CurrentValue = null;
        $this->Discount->OldValue = $this->Discount->CurrentValue;
        $this->SubTotal->CurrentValue = null;
        $this->SubTotal->OldValue = $this->SubTotal->CurrentValue;
        $this->description->CurrentValue = null;
        $this->description->OldValue = $this->description->CurrentValue;
        $this->patient_type->CurrentValue = null;
        $this->patient_type->OldValue = $this->patient_type->CurrentValue;
        $this->charged_date->CurrentValue = null;
        $this->charged_date->OldValue = $this->charged_date->CurrentValue;
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
        $this->Aid->CurrentValue = null;
        $this->Aid->OldValue = $this->Aid->CurrentValue;
        $this->Vid->CurrentValue = null;
        $this->Vid->OldValue = $this->Vid->CurrentValue;
        $this->DrID->CurrentValue = null;
        $this->DrID->OldValue = $this->DrID->CurrentValue;
        $this->DrCODE->CurrentValue = null;
        $this->DrCODE->OldValue = $this->DrCODE->CurrentValue;
        $this->DrName->CurrentValue = null;
        $this->DrName->OldValue = $this->DrName->CurrentValue;
        $this->Department->CurrentValue = null;
        $this->Department->OldValue = $this->Department->CurrentValue;
        $this->DrSharePres->CurrentValue = null;
        $this->DrSharePres->OldValue = $this->DrSharePres->CurrentValue;
        $this->HospSharePres->CurrentValue = null;
        $this->HospSharePres->OldValue = $this->HospSharePres->CurrentValue;
        $this->DrShareAmount->CurrentValue = null;
        $this->DrShareAmount->OldValue = $this->DrShareAmount->CurrentValue;
        $this->HospShareAmount->CurrentValue = null;
        $this->HospShareAmount->OldValue = $this->HospShareAmount->CurrentValue;
        $this->DrShareSettiledAmount->CurrentValue = null;
        $this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->CurrentValue;
        $this->DrShareSettledId->CurrentValue = null;
        $this->DrShareSettledId->OldValue = $this->DrShareSettledId->CurrentValue;
        $this->DrShareSettiledStatus->CurrentValue = null;
        $this->DrShareSettiledStatus->OldValue = $this->DrShareSettiledStatus->CurrentValue;
        $this->invoiceId->CurrentValue = null;
        $this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
        $this->invoiceAmount->CurrentValue = null;
        $this->invoiceAmount->OldValue = $this->invoiceAmount->CurrentValue;
        $this->invoiceStatus->CurrentValue = null;
        $this->invoiceStatus->OldValue = $this->invoiceStatus->CurrentValue;
        $this->modeOfPayment->CurrentValue = null;
        $this->modeOfPayment->OldValue = $this->modeOfPayment->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->RIDNO->CurrentValue = null;
        $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
        $this->ItemCode->CurrentValue = null;
        $this->ItemCode->OldValue = $this->ItemCode->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->sid->CurrentValue = null;
        $this->sid->OldValue = $this->sid->CurrentValue;
        $this->TestSubCd->CurrentValue = null;
        $this->TestSubCd->OldValue = $this->TestSubCd->CurrentValue;
        $this->DEptCd->CurrentValue = null;
        $this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
        $this->ProfCd->CurrentValue = null;
        $this->ProfCd->OldValue = $this->ProfCd->CurrentValue;
        $this->LabReport->CurrentValue = null;
        $this->LabReport->OldValue = $this->LabReport->CurrentValue;
        $this->Comments->CurrentValue = null;
        $this->Comments->OldValue = $this->Comments->CurrentValue;
        $this->Method->CurrentValue = null;
        $this->Method->OldValue = $this->Method->CurrentValue;
        $this->Specimen->CurrentValue = null;
        $this->Specimen->OldValue = $this->Specimen->CurrentValue;
        $this->Abnormal->CurrentValue = null;
        $this->Abnormal->OldValue = $this->Abnormal->CurrentValue;
        $this->RefValue->CurrentValue = null;
        $this->RefValue->OldValue = $this->RefValue->CurrentValue;
        $this->TestUnit->CurrentValue = null;
        $this->TestUnit->OldValue = $this->TestUnit->CurrentValue;
        $this->LOWHIGH->CurrentValue = null;
        $this->LOWHIGH->OldValue = $this->LOWHIGH->CurrentValue;
        $this->Branch->CurrentValue = null;
        $this->Branch->OldValue = $this->Branch->CurrentValue;
        $this->Dispatch->CurrentValue = null;
        $this->Dispatch->OldValue = $this->Dispatch->CurrentValue;
        $this->Pic1->CurrentValue = null;
        $this->Pic1->OldValue = $this->Pic1->CurrentValue;
        $this->Pic2->CurrentValue = null;
        $this->Pic2->OldValue = $this->Pic2->CurrentValue;
        $this->GraphPath->CurrentValue = null;
        $this->GraphPath->OldValue = $this->GraphPath->CurrentValue;
        $this->MachineCD->CurrentValue = null;
        $this->MachineCD->OldValue = $this->MachineCD->CurrentValue;
        $this->TestCancel->CurrentValue = null;
        $this->TestCancel->OldValue = $this->TestCancel->CurrentValue;
        $this->OutSource->CurrentValue = null;
        $this->OutSource->OldValue = $this->OutSource->CurrentValue;
        $this->Printed->CurrentValue = null;
        $this->Printed->OldValue = $this->Printed->CurrentValue;
        $this->PrintBy->CurrentValue = null;
        $this->PrintBy->OldValue = $this->PrintBy->CurrentValue;
        $this->PrintDate->CurrentValue = null;
        $this->PrintDate->OldValue = $this->PrintDate->CurrentValue;
        $this->BillingDate->CurrentValue = null;
        $this->BillingDate->OldValue = $this->BillingDate->CurrentValue;
        $this->BilledBy->CurrentValue = null;
        $this->BilledBy->OldValue = $this->BilledBy->CurrentValue;
        $this->Resulted->CurrentValue = null;
        $this->Resulted->OldValue = $this->Resulted->CurrentValue;
        $this->ResultDate->CurrentValue = null;
        $this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
        $this->ResultedBy->CurrentValue = null;
        $this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
        $this->SampleDate->CurrentValue = null;
        $this->SampleDate->OldValue = $this->SampleDate->CurrentValue;
        $this->SampleUser->CurrentValue = null;
        $this->SampleUser->OldValue = $this->SampleUser->CurrentValue;
        $this->Sampled->CurrentValue = null;
        $this->Sampled->OldValue = $this->Sampled->CurrentValue;
        $this->ReceivedDate->CurrentValue = null;
        $this->ReceivedDate->OldValue = $this->ReceivedDate->CurrentValue;
        $this->ReceivedUser->CurrentValue = null;
        $this->ReceivedUser->OldValue = $this->ReceivedUser->CurrentValue;
        $this->Recevied->CurrentValue = null;
        $this->Recevied->OldValue = $this->Recevied->CurrentValue;
        $this->DeptRecvDate->CurrentValue = null;
        $this->DeptRecvDate->OldValue = $this->DeptRecvDate->CurrentValue;
        $this->DeptRecvUser->CurrentValue = null;
        $this->DeptRecvUser->OldValue = $this->DeptRecvUser->CurrentValue;
        $this->DeptRecived->CurrentValue = null;
        $this->DeptRecived->OldValue = $this->DeptRecived->CurrentValue;
        $this->SAuthDate->CurrentValue = null;
        $this->SAuthDate->OldValue = $this->SAuthDate->CurrentValue;
        $this->SAuthBy->CurrentValue = null;
        $this->SAuthBy->OldValue = $this->SAuthBy->CurrentValue;
        $this->SAuthendicate->CurrentValue = null;
        $this->SAuthendicate->OldValue = $this->SAuthendicate->CurrentValue;
        $this->AuthDate->CurrentValue = null;
        $this->AuthDate->OldValue = $this->AuthDate->CurrentValue;
        $this->AuthBy->CurrentValue = null;
        $this->AuthBy->OldValue = $this->AuthBy->CurrentValue;
        $this->Authencate->CurrentValue = null;
        $this->Authencate->OldValue = $this->Authencate->CurrentValue;
        $this->EditDate->CurrentValue = null;
        $this->EditDate->OldValue = $this->EditDate->CurrentValue;
        $this->EditBy->CurrentValue = null;
        $this->EditBy->OldValue = $this->EditBy->CurrentValue;
        $this->Editted->CurrentValue = null;
        $this->Editted->OldValue = $this->Editted->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->CId->CurrentValue = null;
        $this->CId->OldValue = $this->CId->CurrentValue;
        $this->Order->CurrentValue = null;
        $this->Order->OldValue = $this->Order->CurrentValue;
        $this->Form->CurrentValue = null;
        $this->Form->OldValue = $this->Form->CurrentValue;
        $this->ResType->CurrentValue = null;
        $this->ResType->OldValue = $this->ResType->CurrentValue;
        $this->Sample->CurrentValue = null;
        $this->Sample->OldValue = $this->Sample->CurrentValue;
        $this->NoD->CurrentValue = null;
        $this->NoD->OldValue = $this->NoD->CurrentValue;
        $this->BillOrder->CurrentValue = null;
        $this->BillOrder->OldValue = $this->BillOrder->CurrentValue;
        $this->Formula->CurrentValue = null;
        $this->Formula->OldValue = $this->Formula->CurrentValue;
        $this->Inactive->CurrentValue = null;
        $this->Inactive->OldValue = $this->Inactive->CurrentValue;
        $this->CollSample->CurrentValue = null;
        $this->CollSample->OldValue = $this->CollSample->CurrentValue;
        $this->TestType->CurrentValue = null;
        $this->TestType->OldValue = $this->TestType->CurrentValue;
        $this->Repeated->CurrentValue = null;
        $this->Repeated->OldValue = $this->Repeated->CurrentValue;
        $this->RepeatedBy->CurrentValue = null;
        $this->RepeatedBy->OldValue = $this->RepeatedBy->CurrentValue;
        $this->RepeatedDate->CurrentValue = null;
        $this->RepeatedDate->OldValue = $this->RepeatedDate->CurrentValue;
        $this->serviceID->CurrentValue = null;
        $this->serviceID->OldValue = $this->serviceID->CurrentValue;
        $this->Service_Type->CurrentValue = null;
        $this->Service_Type->OldValue = $this->Service_Type->CurrentValue;
        $this->Service_Department->CurrentValue = null;
        $this->Service_Department->OldValue = $this->Service_Department->CurrentValue;
        $this->RequestNo->CurrentValue = 0;
        $this->RequestNo->OldValue = $this->RequestNo->CurrentValue;
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
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

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_profilePic")) {
            $this->profilePic->setOldValue($CurrentForm->getValue("o_profilePic"));
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

        // Check field name 'Unit' first before field var 'x_Unit'
        $val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
        if (!$this->Unit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit->Visible = false; // Disable update for API request
            } else {
                $this->Unit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Unit")) {
            $this->Unit->setOldValue($CurrentForm->getValue("o_Unit"));
        }

        // Check field name 'amount' first before field var 'x_amount'
        $val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
        if (!$this->amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->amount->Visible = false; // Disable update for API request
            } else {
                $this->amount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_amount")) {
            $this->amount->setOldValue($CurrentForm->getValue("o_amount"));
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

        // Check field name 'DiscountCategory' first before field var 'x_DiscountCategory'
        $val = $CurrentForm->hasValue("DiscountCategory") ? $CurrentForm->getValue("DiscountCategory") : $CurrentForm->getValue("x_DiscountCategory");
        if (!$this->DiscountCategory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountCategory->Visible = false; // Disable update for API request
            } else {
                $this->DiscountCategory->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DiscountCategory")) {
            $this->DiscountCategory->setOldValue($CurrentForm->getValue("o_DiscountCategory"));
        }

        // Check field name 'Discount' first before field var 'x_Discount'
        $val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
        if (!$this->Discount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Discount->Visible = false; // Disable update for API request
            } else {
                $this->Discount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Discount")) {
            $this->Discount->setOldValue($CurrentForm->getValue("o_Discount"));
        }

        // Check field name 'SubTotal' first before field var 'x_SubTotal'
        $val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
        if (!$this->SubTotal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SubTotal->Visible = false; // Disable update for API request
            } else {
                $this->SubTotal->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SubTotal")) {
            $this->SubTotal->setOldValue($CurrentForm->getValue("o_SubTotal"));
        }

        // Check field name 'description' first before field var 'x_description'
        $val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
        if (!$this->description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->description->Visible = false; // Disable update for API request
            } else {
                $this->description->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_description")) {
            $this->description->setOldValue($CurrentForm->getValue("o_description"));
        }

        // Check field name 'patient_type' first before field var 'x_patient_type'
        $val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
        if (!$this->patient_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_type->Visible = false; // Disable update for API request
            } else {
                $this->patient_type->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_patient_type")) {
            $this->patient_type->setOldValue($CurrentForm->getValue("o_patient_type"));
        }

        // Check field name 'charged_date' first before field var 'x_charged_date'
        $val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
        if (!$this->charged_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->charged_date->Visible = false; // Disable update for API request
            } else {
                $this->charged_date->setFormValue($val);
            }
            $this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_charged_date")) {
            $this->charged_date->setOldValue($CurrentForm->getValue("o_charged_date"));
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

        // Check field name 'Aid' first before field var 'x_Aid'
        $val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
        if (!$this->Aid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Aid->Visible = false; // Disable update for API request
            } else {
                $this->Aid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Aid")) {
            $this->Aid->setOldValue($CurrentForm->getValue("o_Aid"));
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

        // Check field name 'DrSharePres' first before field var 'x_DrSharePres'
        $val = $CurrentForm->hasValue("DrSharePres") ? $CurrentForm->getValue("DrSharePres") : $CurrentForm->getValue("x_DrSharePres");
        if (!$this->DrSharePres->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrSharePres->Visible = false; // Disable update for API request
            } else {
                $this->DrSharePres->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrSharePres")) {
            $this->DrSharePres->setOldValue($CurrentForm->getValue("o_DrSharePres"));
        }

        // Check field name 'HospSharePres' first before field var 'x_HospSharePres'
        $val = $CurrentForm->hasValue("HospSharePres") ? $CurrentForm->getValue("HospSharePres") : $CurrentForm->getValue("x_HospSharePres");
        if (!$this->HospSharePres->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospSharePres->Visible = false; // Disable update for API request
            } else {
                $this->HospSharePres->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HospSharePres")) {
            $this->HospSharePres->setOldValue($CurrentForm->getValue("o_HospSharePres"));
        }

        // Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
        $val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
        if (!$this->DrShareAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareAmount->Visible = false; // Disable update for API request
            } else {
                $this->DrShareAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrShareAmount")) {
            $this->DrShareAmount->setOldValue($CurrentForm->getValue("o_DrShareAmount"));
        }

        // Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
        $val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
        if (!$this->HospShareAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospShareAmount->Visible = false; // Disable update for API request
            } else {
                $this->HospShareAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HospShareAmount")) {
            $this->HospShareAmount->setOldValue($CurrentForm->getValue("o_HospShareAmount"));
        }

        // Check field name 'DrShareSettiledAmount' first before field var 'x_DrShareSettiledAmount'
        $val = $CurrentForm->hasValue("DrShareSettiledAmount") ? $CurrentForm->getValue("DrShareSettiledAmount") : $CurrentForm->getValue("x_DrShareSettiledAmount");
        if (!$this->DrShareSettiledAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareSettiledAmount->Visible = false; // Disable update for API request
            } else {
                $this->DrShareSettiledAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrShareSettiledAmount")) {
            $this->DrShareSettiledAmount->setOldValue($CurrentForm->getValue("o_DrShareSettiledAmount"));
        }

        // Check field name 'DrShareSettledId' first before field var 'x_DrShareSettledId'
        $val = $CurrentForm->hasValue("DrShareSettledId") ? $CurrentForm->getValue("DrShareSettledId") : $CurrentForm->getValue("x_DrShareSettledId");
        if (!$this->DrShareSettledId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareSettledId->Visible = false; // Disable update for API request
            } else {
                $this->DrShareSettledId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrShareSettledId")) {
            $this->DrShareSettledId->setOldValue($CurrentForm->getValue("o_DrShareSettledId"));
        }

        // Check field name 'DrShareSettiledStatus' first before field var 'x_DrShareSettiledStatus'
        $val = $CurrentForm->hasValue("DrShareSettiledStatus") ? $CurrentForm->getValue("DrShareSettiledStatus") : $CurrentForm->getValue("x_DrShareSettiledStatus");
        if (!$this->DrShareSettiledStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareSettiledStatus->Visible = false; // Disable update for API request
            } else {
                $this->DrShareSettiledStatus->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DrShareSettiledStatus")) {
            $this->DrShareSettiledStatus->setOldValue($CurrentForm->getValue("o_DrShareSettiledStatus"));
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

        // Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
        $val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
        if (!$this->invoiceAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceAmount->Visible = false; // Disable update for API request
            } else {
                $this->invoiceAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_invoiceAmount")) {
            $this->invoiceAmount->setOldValue($CurrentForm->getValue("o_invoiceAmount"));
        }

        // Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
        $val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
        if (!$this->invoiceStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceStatus->Visible = false; // Disable update for API request
            } else {
                $this->invoiceStatus->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_invoiceStatus")) {
            $this->invoiceStatus->setOldValue($CurrentForm->getValue("o_invoiceStatus"));
        }

        // Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
        $val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
        if (!$this->modeOfPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modeOfPayment->Visible = false; // Disable update for API request
            } else {
                $this->modeOfPayment->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_modeOfPayment")) {
            $this->modeOfPayment->setOldValue($CurrentForm->getValue("o_modeOfPayment"));
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

        // Check field name 'TestSubCd' first before field var 'x_TestSubCd'
        $val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
        if (!$this->TestSubCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestSubCd->Visible = false; // Disable update for API request
            } else {
                $this->TestSubCd->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TestSubCd")) {
            $this->TestSubCd->setOldValue($CurrentForm->getValue("o_TestSubCd"));
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

        // Check field name 'ProfCd' first before field var 'x_ProfCd'
        $val = $CurrentForm->hasValue("ProfCd") ? $CurrentForm->getValue("ProfCd") : $CurrentForm->getValue("x_ProfCd");
        if (!$this->ProfCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfCd->Visible = false; // Disable update for API request
            } else {
                $this->ProfCd->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ProfCd")) {
            $this->ProfCd->setOldValue($CurrentForm->getValue("o_ProfCd"));
        }

        // Check field name 'Comments' first before field var 'x_Comments'
        $val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
        if (!$this->Comments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Comments->Visible = false; // Disable update for API request
            } else {
                $this->Comments->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Comments")) {
            $this->Comments->setOldValue($CurrentForm->getValue("o_Comments"));
        }

        // Check field name 'Method' first before field var 'x_Method'
        $val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
        if (!$this->Method->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Method->Visible = false; // Disable update for API request
            } else {
                $this->Method->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Method")) {
            $this->Method->setOldValue($CurrentForm->getValue("o_Method"));
        }

        // Check field name 'Specimen' first before field var 'x_Specimen'
        $val = $CurrentForm->hasValue("Specimen") ? $CurrentForm->getValue("Specimen") : $CurrentForm->getValue("x_Specimen");
        if (!$this->Specimen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Specimen->Visible = false; // Disable update for API request
            } else {
                $this->Specimen->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Specimen")) {
            $this->Specimen->setOldValue($CurrentForm->getValue("o_Specimen"));
        }

        // Check field name 'Abnormal' first before field var 'x_Abnormal'
        $val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
        if (!$this->Abnormal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abnormal->Visible = false; // Disable update for API request
            } else {
                $this->Abnormal->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Abnormal")) {
            $this->Abnormal->setOldValue($CurrentForm->getValue("o_Abnormal"));
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

        // Check field name 'LOWHIGH' first before field var 'x_LOWHIGH'
        $val = $CurrentForm->hasValue("LOWHIGH") ? $CurrentForm->getValue("LOWHIGH") : $CurrentForm->getValue("x_LOWHIGH");
        if (!$this->LOWHIGH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LOWHIGH->Visible = false; // Disable update for API request
            } else {
                $this->LOWHIGH->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LOWHIGH")) {
            $this->LOWHIGH->setOldValue($CurrentForm->getValue("o_LOWHIGH"));
        }

        // Check field name 'Branch' first before field var 'x_Branch'
        $val = $CurrentForm->hasValue("Branch") ? $CurrentForm->getValue("Branch") : $CurrentForm->getValue("x_Branch");
        if (!$this->Branch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Branch->Visible = false; // Disable update for API request
            } else {
                $this->Branch->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Branch")) {
            $this->Branch->setOldValue($CurrentForm->getValue("o_Branch"));
        }

        // Check field name 'Dispatch' first before field var 'x_Dispatch'
        $val = $CurrentForm->hasValue("Dispatch") ? $CurrentForm->getValue("Dispatch") : $CurrentForm->getValue("x_Dispatch");
        if (!$this->Dispatch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Dispatch->Visible = false; // Disable update for API request
            } else {
                $this->Dispatch->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Dispatch")) {
            $this->Dispatch->setOldValue($CurrentForm->getValue("o_Dispatch"));
        }

        // Check field name 'Pic1' first before field var 'x_Pic1'
        $val = $CurrentForm->hasValue("Pic1") ? $CurrentForm->getValue("Pic1") : $CurrentForm->getValue("x_Pic1");
        if (!$this->Pic1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pic1->Visible = false; // Disable update for API request
            } else {
                $this->Pic1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Pic1")) {
            $this->Pic1->setOldValue($CurrentForm->getValue("o_Pic1"));
        }

        // Check field name 'Pic2' first before field var 'x_Pic2'
        $val = $CurrentForm->hasValue("Pic2") ? $CurrentForm->getValue("Pic2") : $CurrentForm->getValue("x_Pic2");
        if (!$this->Pic2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pic2->Visible = false; // Disable update for API request
            } else {
                $this->Pic2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Pic2")) {
            $this->Pic2->setOldValue($CurrentForm->getValue("o_Pic2"));
        }

        // Check field name 'GraphPath' first before field var 'x_GraphPath'
        $val = $CurrentForm->hasValue("GraphPath") ? $CurrentForm->getValue("GraphPath") : $CurrentForm->getValue("x_GraphPath");
        if (!$this->GraphPath->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GraphPath->Visible = false; // Disable update for API request
            } else {
                $this->GraphPath->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GraphPath")) {
            $this->GraphPath->setOldValue($CurrentForm->getValue("o_GraphPath"));
        }

        // Check field name 'MachineCD' first before field var 'x_MachineCD'
        $val = $CurrentForm->hasValue("MachineCD") ? $CurrentForm->getValue("MachineCD") : $CurrentForm->getValue("x_MachineCD");
        if (!$this->MachineCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MachineCD->Visible = false; // Disable update for API request
            } else {
                $this->MachineCD->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MachineCD")) {
            $this->MachineCD->setOldValue($CurrentForm->getValue("o_MachineCD"));
        }

        // Check field name 'TestCancel' first before field var 'x_TestCancel'
        $val = $CurrentForm->hasValue("TestCancel") ? $CurrentForm->getValue("TestCancel") : $CurrentForm->getValue("x_TestCancel");
        if (!$this->TestCancel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestCancel->Visible = false; // Disable update for API request
            } else {
                $this->TestCancel->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TestCancel")) {
            $this->TestCancel->setOldValue($CurrentForm->getValue("o_TestCancel"));
        }

        // Check field name 'OutSource' first before field var 'x_OutSource'
        $val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
        if (!$this->OutSource->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OutSource->Visible = false; // Disable update for API request
            } else {
                $this->OutSource->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_OutSource")) {
            $this->OutSource->setOldValue($CurrentForm->getValue("o_OutSource"));
        }

        // Check field name 'Printed' first before field var 'x_Printed'
        $val = $CurrentForm->hasValue("Printed") ? $CurrentForm->getValue("Printed") : $CurrentForm->getValue("x_Printed");
        if (!$this->Printed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Printed->Visible = false; // Disable update for API request
            } else {
                $this->Printed->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Printed")) {
            $this->Printed->setOldValue($CurrentForm->getValue("o_Printed"));
        }

        // Check field name 'PrintBy' first before field var 'x_PrintBy'
        $val = $CurrentForm->hasValue("PrintBy") ? $CurrentForm->getValue("PrintBy") : $CurrentForm->getValue("x_PrintBy");
        if (!$this->PrintBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrintBy->Visible = false; // Disable update for API request
            } else {
                $this->PrintBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PrintBy")) {
            $this->PrintBy->setOldValue($CurrentForm->getValue("o_PrintBy"));
        }

        // Check field name 'PrintDate' first before field var 'x_PrintDate'
        $val = $CurrentForm->hasValue("PrintDate") ? $CurrentForm->getValue("PrintDate") : $CurrentForm->getValue("x_PrintDate");
        if (!$this->PrintDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrintDate->Visible = false; // Disable update for API request
            } else {
                $this->PrintDate->setFormValue($val);
            }
            $this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_PrintDate")) {
            $this->PrintDate->setOldValue($CurrentForm->getValue("o_PrintDate"));
        }

        // Check field name 'BillingDate' first before field var 'x_BillingDate'
        $val = $CurrentForm->hasValue("BillingDate") ? $CurrentForm->getValue("BillingDate") : $CurrentForm->getValue("x_BillingDate");
        if (!$this->BillingDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillingDate->Visible = false; // Disable update for API request
            } else {
                $this->BillingDate->setFormValue($val);
            }
            $this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_BillingDate")) {
            $this->BillingDate->setOldValue($CurrentForm->getValue("o_BillingDate"));
        }

        // Check field name 'BilledBy' first before field var 'x_BilledBy'
        $val = $CurrentForm->hasValue("BilledBy") ? $CurrentForm->getValue("BilledBy") : $CurrentForm->getValue("x_BilledBy");
        if (!$this->BilledBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BilledBy->Visible = false; // Disable update for API request
            } else {
                $this->BilledBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BilledBy")) {
            $this->BilledBy->setOldValue($CurrentForm->getValue("o_BilledBy"));
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

        // Check field name 'SampleDate' first before field var 'x_SampleDate'
        $val = $CurrentForm->hasValue("SampleDate") ? $CurrentForm->getValue("SampleDate") : $CurrentForm->getValue("x_SampleDate");
        if (!$this->SampleDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleDate->Visible = false; // Disable update for API request
            } else {
                $this->SampleDate->setFormValue($val);
            }
            $this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_SampleDate")) {
            $this->SampleDate->setOldValue($CurrentForm->getValue("o_SampleDate"));
        }

        // Check field name 'SampleUser' first before field var 'x_SampleUser'
        $val = $CurrentForm->hasValue("SampleUser") ? $CurrentForm->getValue("SampleUser") : $CurrentForm->getValue("x_SampleUser");
        if (!$this->SampleUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleUser->Visible = false; // Disable update for API request
            } else {
                $this->SampleUser->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SampleUser")) {
            $this->SampleUser->setOldValue($CurrentForm->getValue("o_SampleUser"));
        }

        // Check field name 'Sampled' first before field var 'x_Sampled'
        $val = $CurrentForm->hasValue("Sampled") ? $CurrentForm->getValue("Sampled") : $CurrentForm->getValue("x_Sampled");
        if (!$this->Sampled->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Sampled->Visible = false; // Disable update for API request
            } else {
                $this->Sampled->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Sampled")) {
            $this->Sampled->setOldValue($CurrentForm->getValue("o_Sampled"));
        }

        // Check field name 'ReceivedDate' first before field var 'x_ReceivedDate'
        $val = $CurrentForm->hasValue("ReceivedDate") ? $CurrentForm->getValue("ReceivedDate") : $CurrentForm->getValue("x_ReceivedDate");
        if (!$this->ReceivedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReceivedDate->Visible = false; // Disable update for API request
            } else {
                $this->ReceivedDate->setFormValue($val);
            }
            $this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_ReceivedDate")) {
            $this->ReceivedDate->setOldValue($CurrentForm->getValue("o_ReceivedDate"));
        }

        // Check field name 'ReceivedUser' first before field var 'x_ReceivedUser'
        $val = $CurrentForm->hasValue("ReceivedUser") ? $CurrentForm->getValue("ReceivedUser") : $CurrentForm->getValue("x_ReceivedUser");
        if (!$this->ReceivedUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReceivedUser->Visible = false; // Disable update for API request
            } else {
                $this->ReceivedUser->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ReceivedUser")) {
            $this->ReceivedUser->setOldValue($CurrentForm->getValue("o_ReceivedUser"));
        }

        // Check field name 'Recevied' first before field var 'x_Recevied'
        $val = $CurrentForm->hasValue("Recevied") ? $CurrentForm->getValue("Recevied") : $CurrentForm->getValue("x_Recevied");
        if (!$this->Recevied->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Recevied->Visible = false; // Disable update for API request
            } else {
                $this->Recevied->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Recevied")) {
            $this->Recevied->setOldValue($CurrentForm->getValue("o_Recevied"));
        }

        // Check field name 'DeptRecvDate' first before field var 'x_DeptRecvDate'
        $val = $CurrentForm->hasValue("DeptRecvDate") ? $CurrentForm->getValue("DeptRecvDate") : $CurrentForm->getValue("x_DeptRecvDate");
        if (!$this->DeptRecvDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeptRecvDate->Visible = false; // Disable update for API request
            } else {
                $this->DeptRecvDate->setFormValue($val);
            }
            $this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_DeptRecvDate")) {
            $this->DeptRecvDate->setOldValue($CurrentForm->getValue("o_DeptRecvDate"));
        }

        // Check field name 'DeptRecvUser' first before field var 'x_DeptRecvUser'
        $val = $CurrentForm->hasValue("DeptRecvUser") ? $CurrentForm->getValue("DeptRecvUser") : $CurrentForm->getValue("x_DeptRecvUser");
        if (!$this->DeptRecvUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeptRecvUser->Visible = false; // Disable update for API request
            } else {
                $this->DeptRecvUser->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DeptRecvUser")) {
            $this->DeptRecvUser->setOldValue($CurrentForm->getValue("o_DeptRecvUser"));
        }

        // Check field name 'DeptRecived' first before field var 'x_DeptRecived'
        $val = $CurrentForm->hasValue("DeptRecived") ? $CurrentForm->getValue("DeptRecived") : $CurrentForm->getValue("x_DeptRecived");
        if (!$this->DeptRecived->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeptRecived->Visible = false; // Disable update for API request
            } else {
                $this->DeptRecived->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DeptRecived")) {
            $this->DeptRecived->setOldValue($CurrentForm->getValue("o_DeptRecived"));
        }

        // Check field name 'SAuthDate' first before field var 'x_SAuthDate'
        $val = $CurrentForm->hasValue("SAuthDate") ? $CurrentForm->getValue("SAuthDate") : $CurrentForm->getValue("x_SAuthDate");
        if (!$this->SAuthDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SAuthDate->Visible = false; // Disable update for API request
            } else {
                $this->SAuthDate->setFormValue($val);
            }
            $this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_SAuthDate")) {
            $this->SAuthDate->setOldValue($CurrentForm->getValue("o_SAuthDate"));
        }

        // Check field name 'SAuthBy' first before field var 'x_SAuthBy'
        $val = $CurrentForm->hasValue("SAuthBy") ? $CurrentForm->getValue("SAuthBy") : $CurrentForm->getValue("x_SAuthBy");
        if (!$this->SAuthBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SAuthBy->Visible = false; // Disable update for API request
            } else {
                $this->SAuthBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SAuthBy")) {
            $this->SAuthBy->setOldValue($CurrentForm->getValue("o_SAuthBy"));
        }

        // Check field name 'SAuthendicate' first before field var 'x_SAuthendicate'
        $val = $CurrentForm->hasValue("SAuthendicate") ? $CurrentForm->getValue("SAuthendicate") : $CurrentForm->getValue("x_SAuthendicate");
        if (!$this->SAuthendicate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SAuthendicate->Visible = false; // Disable update for API request
            } else {
                $this->SAuthendicate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SAuthendicate")) {
            $this->SAuthendicate->setOldValue($CurrentForm->getValue("o_SAuthendicate"));
        }

        // Check field name 'AuthDate' first before field var 'x_AuthDate'
        $val = $CurrentForm->hasValue("AuthDate") ? $CurrentForm->getValue("AuthDate") : $CurrentForm->getValue("x_AuthDate");
        if (!$this->AuthDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AuthDate->Visible = false; // Disable update for API request
            } else {
                $this->AuthDate->setFormValue($val);
            }
            $this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_AuthDate")) {
            $this->AuthDate->setOldValue($CurrentForm->getValue("o_AuthDate"));
        }

        // Check field name 'AuthBy' first before field var 'x_AuthBy'
        $val = $CurrentForm->hasValue("AuthBy") ? $CurrentForm->getValue("AuthBy") : $CurrentForm->getValue("x_AuthBy");
        if (!$this->AuthBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AuthBy->Visible = false; // Disable update for API request
            } else {
                $this->AuthBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_AuthBy")) {
            $this->AuthBy->setOldValue($CurrentForm->getValue("o_AuthBy"));
        }

        // Check field name 'Authencate' first before field var 'x_Authencate'
        $val = $CurrentForm->hasValue("Authencate") ? $CurrentForm->getValue("Authencate") : $CurrentForm->getValue("x_Authencate");
        if (!$this->Authencate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Authencate->Visible = false; // Disable update for API request
            } else {
                $this->Authencate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Authencate")) {
            $this->Authencate->setOldValue($CurrentForm->getValue("o_Authencate"));
        }

        // Check field name 'EditDate' first before field var 'x_EditDate'
        $val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
        if (!$this->EditDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditDate->Visible = false; // Disable update for API request
            } else {
                $this->EditDate->setFormValue($val);
            }
            $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_EditDate")) {
            $this->EditDate->setOldValue($CurrentForm->getValue("o_EditDate"));
        }

        // Check field name 'EditBy' first before field var 'x_EditBy'
        $val = $CurrentForm->hasValue("EditBy") ? $CurrentForm->getValue("EditBy") : $CurrentForm->getValue("x_EditBy");
        if (!$this->EditBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditBy->Visible = false; // Disable update for API request
            } else {
                $this->EditBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_EditBy")) {
            $this->EditBy->setOldValue($CurrentForm->getValue("o_EditBy"));
        }

        // Check field name 'Editted' first before field var 'x_Editted'
        $val = $CurrentForm->hasValue("Editted") ? $CurrentForm->getValue("Editted") : $CurrentForm->getValue("x_Editted");
        if (!$this->Editted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Editted->Visible = false; // Disable update for API request
            } else {
                $this->Editted->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Editted")) {
            $this->Editted->setOldValue($CurrentForm->getValue("o_Editted"));
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

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientId")) {
            $this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));
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

        // Check field name 'CId' first before field var 'x_CId'
        $val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
        if (!$this->CId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CId->Visible = false; // Disable update for API request
            } else {
                $this->CId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CId")) {
            $this->CId->setOldValue($CurrentForm->getValue("o_CId"));
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

        // Check field name 'ResType' first before field var 'x_ResType'
        $val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
        if (!$this->ResType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResType->Visible = false; // Disable update for API request
            } else {
                $this->ResType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ResType")) {
            $this->ResType->setOldValue($CurrentForm->getValue("o_ResType"));
        }

        // Check field name 'Sample' first before field var 'x_Sample'
        $val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
        if (!$this->Sample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Sample->Visible = false; // Disable update for API request
            } else {
                $this->Sample->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Sample")) {
            $this->Sample->setOldValue($CurrentForm->getValue("o_Sample"));
        }

        // Check field name 'NoD' first before field var 'x_NoD'
        $val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
        if (!$this->NoD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoD->Visible = false; // Disable update for API request
            } else {
                $this->NoD->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NoD")) {
            $this->NoD->setOldValue($CurrentForm->getValue("o_NoD"));
        }

        // Check field name 'BillOrder' first before field var 'x_BillOrder'
        $val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
        if (!$this->BillOrder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillOrder->Visible = false; // Disable update for API request
            } else {
                $this->BillOrder->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BillOrder")) {
            $this->BillOrder->setOldValue($CurrentForm->getValue("o_BillOrder"));
        }

        // Check field name 'Inactive' first before field var 'x_Inactive'
        $val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
        if (!$this->Inactive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Inactive->Visible = false; // Disable update for API request
            } else {
                $this->Inactive->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Inactive")) {
            $this->Inactive->setOldValue($CurrentForm->getValue("o_Inactive"));
        }

        // Check field name 'CollSample' first before field var 'x_CollSample'
        $val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
        if (!$this->CollSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollSample->Visible = false; // Disable update for API request
            } else {
                $this->CollSample->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CollSample")) {
            $this->CollSample->setOldValue($CurrentForm->getValue("o_CollSample"));
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

        // Check field name 'RepeatedBy' first before field var 'x_RepeatedBy'
        $val = $CurrentForm->hasValue("RepeatedBy") ? $CurrentForm->getValue("RepeatedBy") : $CurrentForm->getValue("x_RepeatedBy");
        if (!$this->RepeatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RepeatedBy->Visible = false; // Disable update for API request
            } else {
                $this->RepeatedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RepeatedBy")) {
            $this->RepeatedBy->setOldValue($CurrentForm->getValue("o_RepeatedBy"));
        }

        // Check field name 'RepeatedDate' first before field var 'x_RepeatedDate'
        $val = $CurrentForm->hasValue("RepeatedDate") ? $CurrentForm->getValue("RepeatedDate") : $CurrentForm->getValue("x_RepeatedDate");
        if (!$this->RepeatedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RepeatedDate->Visible = false; // Disable update for API request
            } else {
                $this->RepeatedDate->setFormValue($val);
            }
            $this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_RepeatedDate")) {
            $this->RepeatedDate->setOldValue($CurrentForm->getValue("o_RepeatedDate"));
        }

        // Check field name 'serviceID' first before field var 'x_serviceID'
        $val = $CurrentForm->hasValue("serviceID") ? $CurrentForm->getValue("serviceID") : $CurrentForm->getValue("x_serviceID");
        if (!$this->serviceID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->serviceID->Visible = false; // Disable update for API request
            } else {
                $this->serviceID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_serviceID")) {
            $this->serviceID->setOldValue($CurrentForm->getValue("o_serviceID"));
        }

        // Check field name 'Service_Type' first before field var 'x_Service_Type'
        $val = $CurrentForm->hasValue("Service_Type") ? $CurrentForm->getValue("Service_Type") : $CurrentForm->getValue("x_Service_Type");
        if (!$this->Service_Type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Service_Type->Visible = false; // Disable update for API request
            } else {
                $this->Service_Type->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Service_Type")) {
            $this->Service_Type->setOldValue($CurrentForm->getValue("o_Service_Type"));
        }

        // Check field name 'Service_Department' first before field var 'x_Service_Department'
        $val = $CurrentForm->hasValue("Service_Department") ? $CurrentForm->getValue("Service_Department") : $CurrentForm->getValue("x_Service_Department");
        if (!$this->Service_Department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Service_Department->Visible = false; // Disable update for API request
            } else {
                $this->Service_Department->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Service_Department")) {
            $this->Service_Department->setOldValue($CurrentForm->getValue("o_Service_Department"));
        }

        // Check field name 'RequestNo' first before field var 'x_RequestNo'
        $val = $CurrentForm->hasValue("RequestNo") ? $CurrentForm->getValue("RequestNo") : $CurrentForm->getValue("x_RequestNo");
        if (!$this->RequestNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RequestNo->Visible = false; // Disable update for API request
            } else {
                $this->RequestNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RequestNo")) {
            $this->RequestNo->setOldValue($CurrentForm->getValue("o_RequestNo"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->Services->CurrentValue = $this->Services->FormValue;
        $this->Unit->CurrentValue = $this->Unit->FormValue;
        $this->amount->CurrentValue = $this->amount->FormValue;
        $this->Quantity->CurrentValue = $this->Quantity->FormValue;
        $this->DiscountCategory->CurrentValue = $this->DiscountCategory->FormValue;
        $this->Discount->CurrentValue = $this->Discount->FormValue;
        $this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->patient_type->CurrentValue = $this->patient_type->FormValue;
        $this->charged_date->CurrentValue = $this->charged_date->FormValue;
        $this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->Aid->CurrentValue = $this->Aid->FormValue;
        $this->Vid->CurrentValue = $this->Vid->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
        $this->DrName->CurrentValue = $this->DrName->FormValue;
        $this->Department->CurrentValue = $this->Department->FormValue;
        $this->DrSharePres->CurrentValue = $this->DrSharePres->FormValue;
        $this->HospSharePres->CurrentValue = $this->HospSharePres->FormValue;
        $this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
        $this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
        $this->DrShareSettiledAmount->CurrentValue = $this->DrShareSettiledAmount->FormValue;
        $this->DrShareSettledId->CurrentValue = $this->DrShareSettledId->FormValue;
        $this->DrShareSettiledStatus->CurrentValue = $this->DrShareSettiledStatus->FormValue;
        $this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
        $this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
        $this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
        $this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->sid->CurrentValue = $this->sid->FormValue;
        $this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
        $this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
        $this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
        $this->Comments->CurrentValue = $this->Comments->FormValue;
        $this->Method->CurrentValue = $this->Method->FormValue;
        $this->Specimen->CurrentValue = $this->Specimen->FormValue;
        $this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
        $this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
        $this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
        $this->Branch->CurrentValue = $this->Branch->FormValue;
        $this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
        $this->Pic1->CurrentValue = $this->Pic1->FormValue;
        $this->Pic2->CurrentValue = $this->Pic2->FormValue;
        $this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
        $this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
        $this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
        $this->OutSource->CurrentValue = $this->OutSource->FormValue;
        $this->Printed->CurrentValue = $this->Printed->FormValue;
        $this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
        $this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
        $this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
        $this->BillingDate->CurrentValue = $this->BillingDate->FormValue;
        $this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
        $this->BilledBy->CurrentValue = $this->BilledBy->FormValue;
        $this->Resulted->CurrentValue = $this->Resulted->FormValue;
        $this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
        $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        $this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
        $this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
        $this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
        $this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
        $this->Sampled->CurrentValue = $this->Sampled->FormValue;
        $this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
        $this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
        $this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
        $this->Recevied->CurrentValue = $this->Recevied->FormValue;
        $this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
        $this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
        $this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
        $this->DeptRecived->CurrentValue = $this->DeptRecived->FormValue;
        $this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
        $this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
        $this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
        $this->SAuthendicate->CurrentValue = $this->SAuthendicate->FormValue;
        $this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
        $this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
        $this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
        $this->Authencate->CurrentValue = $this->Authencate->FormValue;
        $this->EditDate->CurrentValue = $this->EditDate->FormValue;
        $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        $this->EditBy->CurrentValue = $this->EditBy->FormValue;
        $this->Editted->CurrentValue = $this->Editted->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->CId->CurrentValue = $this->CId->FormValue;
        $this->Order->CurrentValue = $this->Order->FormValue;
        $this->ResType->CurrentValue = $this->ResType->FormValue;
        $this->Sample->CurrentValue = $this->Sample->FormValue;
        $this->NoD->CurrentValue = $this->NoD->FormValue;
        $this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
        $this->Inactive->CurrentValue = $this->Inactive->FormValue;
        $this->CollSample->CurrentValue = $this->CollSample->FormValue;
        $this->TestType->CurrentValue = $this->TestType->FormValue;
        $this->Repeated->CurrentValue = $this->Repeated->FormValue;
        $this->RepeatedBy->CurrentValue = $this->RepeatedBy->FormValue;
        $this->RepeatedDate->CurrentValue = $this->RepeatedDate->FormValue;
        $this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
        $this->serviceID->CurrentValue = $this->serviceID->FormValue;
        $this->Service_Type->CurrentValue = $this->Service_Type->FormValue;
        $this->Service_Department->CurrentValue = $this->Service_Department->FormValue;
        $this->RequestNo->CurrentValue = $this->RequestNo->FormValue;
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
            if (!$this->EventCancelled) {
                $this->HashValue = $this->getRowHash($row); // Get hash value for record
            }
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
        $this->Reception->setDbValue($row['Reception']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Services->setDbValue($row['Services']);
        $this->Unit->setDbValue($row['Unit']);
        $this->amount->setDbValue($row['amount']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->DiscountCategory->setDbValue($row['DiscountCategory']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->description->setDbValue($row['description']);
        $this->patient_type->setDbValue($row['patient_type']);
        $this->charged_date->setDbValue($row['charged_date']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Aid->setDbValue($row['Aid']);
        $this->Vid->setDbValue($row['Vid']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrCODE->setDbValue($row['DrCODE']);
        $this->DrName->setDbValue($row['DrName']);
        $this->Department->setDbValue($row['Department']);
        $this->DrSharePres->setDbValue($row['DrSharePres']);
        $this->HospSharePres->setDbValue($row['HospSharePres']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
        $this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
        $this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->invoiceAmount->setDbValue($row['invoiceAmount']);
        $this->invoiceStatus->setDbValue($row['invoiceStatus']);
        $this->modeOfPayment->setDbValue($row['modeOfPayment']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->sid->setDbValue($row['sid']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->ProfCd->setDbValue($row['ProfCd']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Method->setDbValue($row['Method']);
        $this->Specimen->setDbValue($row['Specimen']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->TestUnit->setDbValue($row['TestUnit']);
        $this->LOWHIGH->setDbValue($row['LOWHIGH']);
        $this->Branch->setDbValue($row['Branch']);
        $this->Dispatch->setDbValue($row['Dispatch']);
        $this->Pic1->setDbValue($row['Pic1']);
        $this->Pic2->setDbValue($row['Pic2']);
        $this->GraphPath->setDbValue($row['GraphPath']);
        $this->MachineCD->setDbValue($row['MachineCD']);
        $this->TestCancel->setDbValue($row['TestCancel']);
        $this->OutSource->setDbValue($row['OutSource']);
        $this->Printed->setDbValue($row['Printed']);
        $this->PrintBy->setDbValue($row['PrintBy']);
        $this->PrintDate->setDbValue($row['PrintDate']);
        $this->BillingDate->setDbValue($row['BillingDate']);
        $this->BilledBy->setDbValue($row['BilledBy']);
        $this->Resulted->setDbValue($row['Resulted']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->SampleDate->setDbValue($row['SampleDate']);
        $this->SampleUser->setDbValue($row['SampleUser']);
        $this->Sampled->setDbValue($row['Sampled']);
        $this->ReceivedDate->setDbValue($row['ReceivedDate']);
        $this->ReceivedUser->setDbValue($row['ReceivedUser']);
        $this->Recevied->setDbValue($row['Recevied']);
        $this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
        $this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
        $this->DeptRecived->setDbValue($row['DeptRecived']);
        $this->SAuthDate->setDbValue($row['SAuthDate']);
        $this->SAuthBy->setDbValue($row['SAuthBy']);
        $this->SAuthendicate->setDbValue($row['SAuthendicate']);
        $this->AuthDate->setDbValue($row['AuthDate']);
        $this->AuthBy->setDbValue($row['AuthBy']);
        $this->Authencate->setDbValue($row['Authencate']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditBy->setDbValue($row['EditBy']);
        $this->Editted->setDbValue($row['Editted']);
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->CId->setDbValue($row['CId']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->Repeated->setDbValue($row['Repeated']);
        $this->RepeatedBy->setDbValue($row['RepeatedBy']);
        $this->RepeatedDate->setDbValue($row['RepeatedDate']);
        $this->serviceID->setDbValue($row['serviceID']);
        $this->Service_Type->setDbValue($row['Service_Type']);
        $this->Service_Department->setDbValue($row['Service_Department']);
        $this->RequestNo->setDbValue($row['RequestNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['Services'] = $this->Services->CurrentValue;
        $row['Unit'] = $this->Unit->CurrentValue;
        $row['amount'] = $this->amount->CurrentValue;
        $row['Quantity'] = $this->Quantity->CurrentValue;
        $row['DiscountCategory'] = $this->DiscountCategory->CurrentValue;
        $row['Discount'] = $this->Discount->CurrentValue;
        $row['SubTotal'] = $this->SubTotal->CurrentValue;
        $row['description'] = $this->description->CurrentValue;
        $row['patient_type'] = $this->patient_type->CurrentValue;
        $row['charged_date'] = $this->charged_date->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['Aid'] = $this->Aid->CurrentValue;
        $row['Vid'] = $this->Vid->CurrentValue;
        $row['DrID'] = $this->DrID->CurrentValue;
        $row['DrCODE'] = $this->DrCODE->CurrentValue;
        $row['DrName'] = $this->DrName->CurrentValue;
        $row['Department'] = $this->Department->CurrentValue;
        $row['DrSharePres'] = $this->DrSharePres->CurrentValue;
        $row['HospSharePres'] = $this->HospSharePres->CurrentValue;
        $row['DrShareAmount'] = $this->DrShareAmount->CurrentValue;
        $row['HospShareAmount'] = $this->HospShareAmount->CurrentValue;
        $row['DrShareSettiledAmount'] = $this->DrShareSettiledAmount->CurrentValue;
        $row['DrShareSettledId'] = $this->DrShareSettledId->CurrentValue;
        $row['DrShareSettiledStatus'] = $this->DrShareSettiledStatus->CurrentValue;
        $row['invoiceId'] = $this->invoiceId->CurrentValue;
        $row['invoiceAmount'] = $this->invoiceAmount->CurrentValue;
        $row['invoiceStatus'] = $this->invoiceStatus->CurrentValue;
        $row['modeOfPayment'] = $this->modeOfPayment->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['RIDNO'] = $this->RIDNO->CurrentValue;
        $row['ItemCode'] = $this->ItemCode->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['sid'] = $this->sid->CurrentValue;
        $row['TestSubCd'] = $this->TestSubCd->CurrentValue;
        $row['DEptCd'] = $this->DEptCd->CurrentValue;
        $row['ProfCd'] = $this->ProfCd->CurrentValue;
        $row['LabReport'] = $this->LabReport->CurrentValue;
        $row['Comments'] = $this->Comments->CurrentValue;
        $row['Method'] = $this->Method->CurrentValue;
        $row['Specimen'] = $this->Specimen->CurrentValue;
        $row['Abnormal'] = $this->Abnormal->CurrentValue;
        $row['RefValue'] = $this->RefValue->CurrentValue;
        $row['TestUnit'] = $this->TestUnit->CurrentValue;
        $row['LOWHIGH'] = $this->LOWHIGH->CurrentValue;
        $row['Branch'] = $this->Branch->CurrentValue;
        $row['Dispatch'] = $this->Dispatch->CurrentValue;
        $row['Pic1'] = $this->Pic1->CurrentValue;
        $row['Pic2'] = $this->Pic2->CurrentValue;
        $row['GraphPath'] = $this->GraphPath->CurrentValue;
        $row['MachineCD'] = $this->MachineCD->CurrentValue;
        $row['TestCancel'] = $this->TestCancel->CurrentValue;
        $row['OutSource'] = $this->OutSource->CurrentValue;
        $row['Printed'] = $this->Printed->CurrentValue;
        $row['PrintBy'] = $this->PrintBy->CurrentValue;
        $row['PrintDate'] = $this->PrintDate->CurrentValue;
        $row['BillingDate'] = $this->BillingDate->CurrentValue;
        $row['BilledBy'] = $this->BilledBy->CurrentValue;
        $row['Resulted'] = $this->Resulted->CurrentValue;
        $row['ResultDate'] = $this->ResultDate->CurrentValue;
        $row['ResultedBy'] = $this->ResultedBy->CurrentValue;
        $row['SampleDate'] = $this->SampleDate->CurrentValue;
        $row['SampleUser'] = $this->SampleUser->CurrentValue;
        $row['Sampled'] = $this->Sampled->CurrentValue;
        $row['ReceivedDate'] = $this->ReceivedDate->CurrentValue;
        $row['ReceivedUser'] = $this->ReceivedUser->CurrentValue;
        $row['Recevied'] = $this->Recevied->CurrentValue;
        $row['DeptRecvDate'] = $this->DeptRecvDate->CurrentValue;
        $row['DeptRecvUser'] = $this->DeptRecvUser->CurrentValue;
        $row['DeptRecived'] = $this->DeptRecived->CurrentValue;
        $row['SAuthDate'] = $this->SAuthDate->CurrentValue;
        $row['SAuthBy'] = $this->SAuthBy->CurrentValue;
        $row['SAuthendicate'] = $this->SAuthendicate->CurrentValue;
        $row['AuthDate'] = $this->AuthDate->CurrentValue;
        $row['AuthBy'] = $this->AuthBy->CurrentValue;
        $row['Authencate'] = $this->Authencate->CurrentValue;
        $row['EditDate'] = $this->EditDate->CurrentValue;
        $row['EditBy'] = $this->EditBy->CurrentValue;
        $row['Editted'] = $this->Editted->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['CId'] = $this->CId->CurrentValue;
        $row['Order'] = $this->Order->CurrentValue;
        $row['Form'] = $this->Form->CurrentValue;
        $row['ResType'] = $this->ResType->CurrentValue;
        $row['Sample'] = $this->Sample->CurrentValue;
        $row['NoD'] = $this->NoD->CurrentValue;
        $row['BillOrder'] = $this->BillOrder->CurrentValue;
        $row['Formula'] = $this->Formula->CurrentValue;
        $row['Inactive'] = $this->Inactive->CurrentValue;
        $row['CollSample'] = $this->CollSample->CurrentValue;
        $row['TestType'] = $this->TestType->CurrentValue;
        $row['Repeated'] = $this->Repeated->CurrentValue;
        $row['RepeatedBy'] = $this->RepeatedBy->CurrentValue;
        $row['RepeatedDate'] = $this->RepeatedDate->CurrentValue;
        $row['serviceID'] = $this->serviceID->CurrentValue;
        $row['Service_Type'] = $this->Service_Type->CurrentValue;
        $row['Service_Department'] = $this->Service_Department->CurrentValue;
        $row['RequestNo'] = $this->RequestNo->CurrentValue;
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
        if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue))) {
            $this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue))) {
            $this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrSharePres->FormValue == $this->DrSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->DrSharePres->CurrentValue))) {
            $this->DrSharePres->CurrentValue = ConvertToFloatString($this->DrSharePres->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospSharePres->FormValue == $this->HospSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->HospSharePres->CurrentValue))) {
            $this->HospSharePres->CurrentValue = ConvertToFloatString($this->HospSharePres->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue))) {
            $this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue))) {
            $this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareSettiledAmount->FormValue == $this->DrShareSettiledAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue))) {
            $this->DrShareSettiledAmount->CurrentValue = ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue))) {
            $this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // Services

        // Unit

        // amount

        // Quantity

        // DiscountCategory

        // Discount

        // SubTotal

        // description

        // patient_type

        // charged_date

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Aid

        // Vid

        // DrID

        // DrCODE

        // DrName

        // Department

        // DrSharePres

        // HospSharePres

        // DrShareAmount

        // HospShareAmount

        // DrShareSettiledAmount

        // DrShareSettledId

        // DrShareSettiledStatus

        // invoiceId

        // invoiceAmount

        // invoiceStatus

        // modeOfPayment

        // HospID

        // RIDNO

        // ItemCode

        // TidNo

        // sid

        // TestSubCd

        // DEptCd

        // ProfCd

        // LabReport

        // Comments

        // Method

        // Specimen

        // Abnormal

        // RefValue

        // TestUnit

        // LOWHIGH

        // Branch

        // Dispatch

        // Pic1

        // Pic2

        // GraphPath

        // MachineCD

        // TestCancel

        // OutSource

        // Printed

        // PrintBy

        // PrintDate

        // BillingDate

        // BilledBy

        // Resulted

        // ResultDate

        // ResultedBy

        // SampleDate

        // SampleUser

        // Sampled

        // ReceivedDate

        // ReceivedUser

        // Recevied

        // DeptRecvDate

        // DeptRecvUser

        // DeptRecived

        // SAuthDate

        // SAuthBy

        // SAuthendicate

        // AuthDate

        // AuthBy

        // Authencate

        // EditDate

        // EditBy

        // Editted

        // PatID

        // PatientId

        // Mobile

        // CId

        // Order

        // Form

        // ResType

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // CollSample

        // TestType

        // Repeated

        // RepeatedBy

        // RepeatedDate

        // serviceID

        // Service_Type

        // Service_Department

        // RequestNo

        // Accumulate aggregate value
        if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
            if (is_numeric($this->amount->CurrentValue)) {
                $this->amount->Total += $this->amount->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->SubTotal->CurrentValue)) {
                $this->SubTotal->Total += $this->SubTotal->CurrentValue; // Accumulate total
            }
        }
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Services
            $this->Services->ViewValue = $this->Services->CurrentValue;
            $curVal = trim(strval($this->Services->CurrentValue));
            if ($curVal != "") {
                $this->Services->ViewValue = $this->Services->lookupCacheOption($curVal);
                if ($this->Services->ViewValue === null) { // Lookup from database
                    $filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Services->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Services->Lookup->renderViewRow($rswrk[0]);
                        $this->Services->ViewValue = $this->Services->displayValue($arwrk);
                    } else {
                        $this->Services->ViewValue = $this->Services->CurrentValue;
                    }
                }
            } else {
                $this->Services->ViewValue = null;
            }
            $this->Services->ViewCustomAttributes = "";

            // Unit
            $this->Unit->ViewValue = $this->Unit->CurrentValue;
            $this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
            $this->Unit->ViewCustomAttributes = "";

            // amount
            $this->amount->ViewValue = $this->amount->CurrentValue;
            $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
            $this->amount->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // DiscountCategory
            $curVal = trim(strval($this->DiscountCategory->CurrentValue));
            if ($curVal != "") {
                $this->DiscountCategory->ViewValue = $this->DiscountCategory->lookupCacheOption($curVal);
                if ($this->DiscountCategory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Particulars`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DiscountCategory->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DiscountCategory->Lookup->renderViewRow($rswrk[0]);
                        $this->DiscountCategory->ViewValue = $this->DiscountCategory->displayValue($arwrk);
                    } else {
                        $this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
                    }
                }
            } else {
                $this->DiscountCategory->ViewValue = null;
            }
            $this->DiscountCategory->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SubTotal
            $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
            $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
            $this->SubTotal->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // patient_type
            $this->patient_type->ViewValue = $this->patient_type->CurrentValue;
            $this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
            $this->patient_type->ViewCustomAttributes = "";

            // charged_date
            $this->charged_date->ViewValue = $this->charged_date->CurrentValue;
            $this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
            $this->charged_date->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

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

            // Aid
            $this->Aid->ViewValue = $this->Aid->CurrentValue;
            $this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
            $this->Aid->ViewCustomAttributes = "";

            // Vid
            $this->Vid->ViewValue = $this->Vid->CurrentValue;
            $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";

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

            // DrSharePres
            $this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
            $this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
            $this->DrSharePres->ViewCustomAttributes = "";

            // HospSharePres
            $this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
            $this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
            $this->HospSharePres->ViewCustomAttributes = "";

            // DrShareAmount
            $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
            $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareAmount->ViewCustomAttributes = "";

            // HospShareAmount
            $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
            $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
            $this->HospShareAmount->ViewCustomAttributes = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
            $this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareSettiledAmount->ViewCustomAttributes = "";

            // DrShareSettledId
            $this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
            $this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
            $this->DrShareSettledId->ViewCustomAttributes = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
            $this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
            $this->DrShareSettiledStatus->ViewCustomAttributes = "";

            // invoiceId
            $this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
            $this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
            $this->invoiceId->ViewCustomAttributes = "";

            // invoiceAmount
            $this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
            $this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
            $this->invoiceAmount->ViewCustomAttributes = "";

            // invoiceStatus
            $this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
            $this->invoiceStatus->ViewCustomAttributes = "";

            // modeOfPayment
            $this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
            $this->modeOfPayment->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // ItemCode
            $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
            $this->ItemCode->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // sid
            $this->sid->ViewValue = $this->sid->CurrentValue;
            $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
            $this->sid->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // DEptCd
            $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
            $this->DEptCd->ViewCustomAttributes = "";

            // ProfCd
            $this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
            $this->ProfCd->ViewCustomAttributes = "";

            // Comments
            $this->Comments->ViewValue = $this->Comments->CurrentValue;
            $this->Comments->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Specimen
            $this->Specimen->ViewValue = $this->Specimen->CurrentValue;
            $this->Specimen->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // TestUnit
            $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
            $this->TestUnit->ViewCustomAttributes = "";

            // LOWHIGH
            $this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
            $this->LOWHIGH->ViewCustomAttributes = "";

            // Branch
            $this->Branch->ViewValue = $this->Branch->CurrentValue;
            $this->Branch->ViewCustomAttributes = "";

            // Dispatch
            $this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
            $this->Dispatch->ViewCustomAttributes = "";

            // Pic1
            $this->Pic1->ViewValue = $this->Pic1->CurrentValue;
            $this->Pic1->ViewCustomAttributes = "";

            // Pic2
            $this->Pic2->ViewValue = $this->Pic2->CurrentValue;
            $this->Pic2->ViewCustomAttributes = "";

            // GraphPath
            $this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
            $this->GraphPath->ViewCustomAttributes = "";

            // MachineCD
            $this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
            $this->MachineCD->ViewCustomAttributes = "";

            // TestCancel
            $this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
            $this->TestCancel->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // Printed
            $this->Printed->ViewValue = $this->Printed->CurrentValue;
            $this->Printed->ViewCustomAttributes = "";

            // PrintBy
            $this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
            $this->PrintBy->ViewCustomAttributes = "";

            // PrintDate
            $this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
            $this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
            $this->PrintDate->ViewCustomAttributes = "";

            // BillingDate
            $this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
            $this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
            $this->BillingDate->ViewCustomAttributes = "";

            // BilledBy
            $this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
            $this->BilledBy->ViewCustomAttributes = "";

            // Resulted
            $this->Resulted->ViewValue = $this->Resulted->CurrentValue;
            $this->Resulted->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // ResultedBy
            $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
            $this->ResultedBy->ViewCustomAttributes = "";

            // SampleDate
            $this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
            $this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
            $this->SampleDate->ViewCustomAttributes = "";

            // SampleUser
            $this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
            $this->SampleUser->ViewCustomAttributes = "";

            // Sampled
            $this->Sampled->ViewValue = $this->Sampled->CurrentValue;
            $this->Sampled->ViewCustomAttributes = "";

            // ReceivedDate
            $this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
            $this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
            $this->ReceivedDate->ViewCustomAttributes = "";

            // ReceivedUser
            $this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
            $this->ReceivedUser->ViewCustomAttributes = "";

            // Recevied
            $this->Recevied->ViewValue = $this->Recevied->CurrentValue;
            $this->Recevied->ViewCustomAttributes = "";

            // DeptRecvDate
            $this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
            $this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
            $this->DeptRecvDate->ViewCustomAttributes = "";

            // DeptRecvUser
            $this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
            $this->DeptRecvUser->ViewCustomAttributes = "";

            // DeptRecived
            $this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
            $this->DeptRecived->ViewCustomAttributes = "";

            // SAuthDate
            $this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
            $this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
            $this->SAuthDate->ViewCustomAttributes = "";

            // SAuthBy
            $this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
            $this->SAuthBy->ViewCustomAttributes = "";

            // SAuthendicate
            $this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
            $this->SAuthendicate->ViewCustomAttributes = "";

            // AuthDate
            $this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
            $this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
            $this->AuthDate->ViewCustomAttributes = "";

            // AuthBy
            $this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
            $this->AuthBy->ViewCustomAttributes = "";

            // Authencate
            $this->Authencate->ViewValue = $this->Authencate->CurrentValue;
            $this->Authencate->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // EditBy
            $this->EditBy->ViewValue = $this->EditBy->CurrentValue;
            $this->EditBy->ViewCustomAttributes = "";

            // Editted
            $this->Editted->ViewValue = $this->Editted->CurrentValue;
            $this->Editted->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // CId
            $this->CId->ViewValue = $this->CId->CurrentValue;
            $this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
            $this->CId->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Inactive
            $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
            $this->Inactive->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // TestType
            $this->TestType->ViewValue = $this->TestType->CurrentValue;
            $this->TestType->ViewCustomAttributes = "";

            // Repeated
            $this->Repeated->ViewValue = $this->Repeated->CurrentValue;
            $this->Repeated->ViewCustomAttributes = "";

            // RepeatedBy
            $this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
            $this->RepeatedBy->ViewCustomAttributes = "";

            // RepeatedDate
            $this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
            $this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
            $this->RepeatedDate->ViewCustomAttributes = "";

            // serviceID
            $this->serviceID->ViewValue = $this->serviceID->CurrentValue;
            $this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
            $this->serviceID->ViewCustomAttributes = "";

            // Service_Type
            $this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
            $this->Service_Type->ViewCustomAttributes = "";

            // Service_Department
            $this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
            $this->Service_Department->ViewCustomAttributes = "";

            // RequestNo
            $this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
            $this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
            $this->RequestNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";
            $this->Services->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";
            $this->amount->TooltipValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // DiscountCategory
            $this->DiscountCategory->LinkCustomAttributes = "";
            $this->DiscountCategory->HrefValue = "";
            $this->DiscountCategory->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";
            $this->SubTotal->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";
            $this->patient_type->TooltipValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";
            $this->charged_date->TooltipValue = "";

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

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";
            $this->Aid->TooltipValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";
            $this->Vid->TooltipValue = "";

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

            // DrSharePres
            $this->DrSharePres->LinkCustomAttributes = "";
            $this->DrSharePres->HrefValue = "";
            $this->DrSharePres->TooltipValue = "";

            // HospSharePres
            $this->HospSharePres->LinkCustomAttributes = "";
            $this->HospSharePres->HrefValue = "";
            $this->HospSharePres->TooltipValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";
            $this->DrShareAmount->TooltipValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";
            $this->HospShareAmount->TooltipValue = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->LinkCustomAttributes = "";
            $this->DrShareSettiledAmount->HrefValue = "";
            $this->DrShareSettiledAmount->TooltipValue = "";

            // DrShareSettledId
            $this->DrShareSettledId->LinkCustomAttributes = "";
            $this->DrShareSettledId->HrefValue = "";
            $this->DrShareSettledId->TooltipValue = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->LinkCustomAttributes = "";
            $this->DrShareSettiledStatus->HrefValue = "";
            $this->DrShareSettiledStatus->TooltipValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";
            $this->invoiceId->TooltipValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";
            $this->invoiceAmount->TooltipValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";
            $this->invoiceStatus->TooltipValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";
            $this->modeOfPayment->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";
            $this->ItemCode->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";
            $this->sid->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";
            $this->DEptCd->TooltipValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";
            $this->ProfCd->TooltipValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";
            $this->Comments->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";
            $this->Specimen->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";
            $this->TestUnit->TooltipValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";
            $this->LOWHIGH->TooltipValue = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";
            $this->Branch->TooltipValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";
            $this->Dispatch->TooltipValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->TooltipValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->TooltipValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";
            $this->GraphPath->TooltipValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";
            $this->MachineCD->TooltipValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";
            $this->TestCancel->TooltipValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
            $this->OutSource->TooltipValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";
            $this->Printed->TooltipValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";
            $this->PrintBy->TooltipValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";
            $this->PrintDate->TooltipValue = "";

            // BillingDate
            $this->BillingDate->LinkCustomAttributes = "";
            $this->BillingDate->HrefValue = "";
            $this->BillingDate->TooltipValue = "";

            // BilledBy
            $this->BilledBy->LinkCustomAttributes = "";
            $this->BilledBy->HrefValue = "";
            $this->BilledBy->TooltipValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";
            $this->Resulted->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";
            $this->ResultedBy->TooltipValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";
            $this->SampleDate->TooltipValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";
            $this->SampleUser->TooltipValue = "";

            // Sampled
            $this->Sampled->LinkCustomAttributes = "";
            $this->Sampled->HrefValue = "";
            $this->Sampled->TooltipValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";
            $this->ReceivedDate->TooltipValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";
            $this->ReceivedUser->TooltipValue = "";

            // Recevied
            $this->Recevied->LinkCustomAttributes = "";
            $this->Recevied->HrefValue = "";
            $this->Recevied->TooltipValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";
            $this->DeptRecvDate->TooltipValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";
            $this->DeptRecvUser->TooltipValue = "";

            // DeptRecived
            $this->DeptRecived->LinkCustomAttributes = "";
            $this->DeptRecived->HrefValue = "";
            $this->DeptRecived->TooltipValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";
            $this->SAuthDate->TooltipValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";
            $this->SAuthBy->TooltipValue = "";

            // SAuthendicate
            $this->SAuthendicate->LinkCustomAttributes = "";
            $this->SAuthendicate->HrefValue = "";
            $this->SAuthendicate->TooltipValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";
            $this->AuthDate->TooltipValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";
            $this->AuthBy->TooltipValue = "";

            // Authencate
            $this->Authencate->LinkCustomAttributes = "";
            $this->Authencate->HrefValue = "";
            $this->Authencate->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // EditBy
            $this->EditBy->LinkCustomAttributes = "";
            $this->EditBy->HrefValue = "";
            $this->EditBy->TooltipValue = "";

            // Editted
            $this->Editted->LinkCustomAttributes = "";
            $this->Editted->HrefValue = "";
            $this->Editted->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";
            $this->Repeated->TooltipValue = "";

            // RepeatedBy
            $this->RepeatedBy->LinkCustomAttributes = "";
            $this->RepeatedBy->HrefValue = "";
            $this->RepeatedBy->TooltipValue = "";

            // RepeatedDate
            $this->RepeatedDate->LinkCustomAttributes = "";
            $this->RepeatedDate->HrefValue = "";
            $this->RepeatedDate->TooltipValue = "";

            // serviceID
            $this->serviceID->LinkCustomAttributes = "";
            $this->serviceID->HrefValue = "";
            $this->serviceID->TooltipValue = "";

            // Service_Type
            $this->Service_Type->LinkCustomAttributes = "";
            $this->Service_Type->HrefValue = "";
            $this->Service_Type->TooltipValue = "";

            // Service_Department
            $this->Service_Department->LinkCustomAttributes = "";
            $this->Service_Department->HrefValue = "";
            $this->Service_Department->TooltipValue = "";

            // RequestNo
            $this->RequestNo->LinkCustomAttributes = "";
            $this->RequestNo->HrefValue = "";
            $this->RequestNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

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

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Services
            $this->Services->EditAttrs["class"] = "form-control";
            $this->Services->EditCustomAttributes = "";
            if (!$this->Services->Raw) {
                $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
            }
            $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
            $curVal = trim(strval($this->Services->CurrentValue));
            if ($curVal != "") {
                $this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
                if ($this->Services->EditValue === null) { // Lookup from database
                    $filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Services->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Services->Lookup->renderViewRow($rswrk[0]);
                        $this->Services->EditValue = $this->Services->displayValue($arwrk);
                    } else {
                        $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
                    }
                }
            } else {
                $this->Services->EditValue = null;
            }
            $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // amount
            $this->amount->EditAttrs["class"] = "form-control";
            $this->amount->EditCustomAttributes = "";
            $this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
            $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
            if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
                $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
                $this->amount->OldValue = $this->amount->EditValue;
            }

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // DiscountCategory
            $this->DiscountCategory->EditAttrs["class"] = "form-control";
            $this->DiscountCategory->EditCustomAttributes = "";
            $curVal = trim(strval($this->DiscountCategory->CurrentValue));
            if ($curVal != "") {
                $this->DiscountCategory->ViewValue = $this->DiscountCategory->lookupCacheOption($curVal);
            } else {
                $this->DiscountCategory->ViewValue = $this->DiscountCategory->Lookup !== null && is_array($this->DiscountCategory->Lookup->Options) ? $curVal : null;
            }
            if ($this->DiscountCategory->ViewValue !== null) { // Load from cache
                $this->DiscountCategory->EditValue = array_values($this->DiscountCategory->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Particulars`" . SearchString("=", $this->DiscountCategory->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DiscountCategory->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DiscountCategory->EditValue = $arwrk;
            }
            $this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
            if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
                $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
                $this->Discount->OldValue = $this->Discount->EditValue;
            }

            // SubTotal
            $this->SubTotal->EditAttrs["class"] = "form-control";
            $this->SubTotal->EditCustomAttributes = "";
            $this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
            $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
            if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
                $this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
                $this->SubTotal->OldValue = $this->SubTotal->EditValue;
            }

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // patient_type
            $this->patient_type->EditAttrs["class"] = "form-control";
            $this->patient_type->EditCustomAttributes = "";
            $this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
            $this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

            // charged_date
            $this->charged_date->EditAttrs["class"] = "form-control";
            $this->charged_date->EditCustomAttributes = "";
            $this->charged_date->EditValue = HtmlEncode(FormatDateTime($this->charged_date->CurrentValue, 8));
            $this->charged_date->PlaceHolder = RemoveHtml($this->charged_date->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // Aid
            $this->Aid->EditAttrs["class"] = "form-control";
            $this->Aid->EditCustomAttributes = "";
            $this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
            $this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

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

            // DrSharePres
            $this->DrSharePres->EditAttrs["class"] = "form-control";
            $this->DrSharePres->EditCustomAttributes = "";
            $this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
            $this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
            if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
                $this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
                $this->DrSharePres->OldValue = $this->DrSharePres->EditValue;
            }

            // HospSharePres
            $this->HospSharePres->EditAttrs["class"] = "form-control";
            $this->HospSharePres->EditCustomAttributes = "";
            $this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
            $this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
            if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
                $this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
                $this->HospSharePres->OldValue = $this->HospSharePres->EditValue;
            }

            // DrShareAmount
            $this->DrShareAmount->EditAttrs["class"] = "form-control";
            $this->DrShareAmount->EditCustomAttributes = "";
            $this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
            $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
            if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
                $this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
                $this->DrShareAmount->OldValue = $this->DrShareAmount->EditValue;
            }

            // HospShareAmount
            $this->HospShareAmount->EditAttrs["class"] = "form-control";
            $this->HospShareAmount->EditCustomAttributes = "";
            $this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
            $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
            if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
                $this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
                $this->HospShareAmount->OldValue = $this->HospShareAmount->EditValue;
            }

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledAmount->EditCustomAttributes = "";
            $this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
            $this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
            if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
                $this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
                $this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->EditValue;
            }

            // DrShareSettledId
            $this->DrShareSettledId->EditAttrs["class"] = "form-control";
            $this->DrShareSettledId->EditCustomAttributes = "";
            $this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
            $this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledStatus->EditCustomAttributes = "";
            $this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
            $this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // invoiceAmount
            $this->invoiceAmount->EditAttrs["class"] = "form-control";
            $this->invoiceAmount->EditCustomAttributes = "";
            $this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
            $this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
            if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
                $this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
                $this->invoiceAmount->OldValue = $this->invoiceAmount->EditValue;
            }

            // invoiceStatus
            $this->invoiceStatus->EditAttrs["class"] = "form-control";
            $this->invoiceStatus->EditCustomAttributes = "";
            if (!$this->invoiceStatus->Raw) {
                $this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
            }
            $this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
            $this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

            // modeOfPayment
            $this->modeOfPayment->EditAttrs["class"] = "form-control";
            $this->modeOfPayment->EditCustomAttributes = "";
            if (!$this->modeOfPayment->Raw) {
                $this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
            }
            $this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
            $this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

            // HospID

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // ItemCode
            $this->ItemCode->EditAttrs["class"] = "form-control";
            $this->ItemCode->EditCustomAttributes = "";
            if (!$this->ItemCode->Raw) {
                $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
            }
            $this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
            $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // TestSubCd
            $this->TestSubCd->EditAttrs["class"] = "form-control";
            $this->TestSubCd->EditCustomAttributes = "";
            if (!$this->TestSubCd->Raw) {
                $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
            }
            $this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
            $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

            // DEptCd
            $this->DEptCd->EditAttrs["class"] = "form-control";
            $this->DEptCd->EditCustomAttributes = "";
            if (!$this->DEptCd->Raw) {
                $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
            }
            $this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
            $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

            // ProfCd
            $this->ProfCd->EditAttrs["class"] = "form-control";
            $this->ProfCd->EditCustomAttributes = "";
            if (!$this->ProfCd->Raw) {
                $this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
            }
            $this->ProfCd->EditValue = HtmlEncode($this->ProfCd->CurrentValue);
            $this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

            // Comments
            $this->Comments->EditAttrs["class"] = "form-control";
            $this->Comments->EditCustomAttributes = "";
            if (!$this->Comments->Raw) {
                $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
            }
            $this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
            $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Specimen
            $this->Specimen->EditAttrs["class"] = "form-control";
            $this->Specimen->EditCustomAttributes = "";
            if (!$this->Specimen->Raw) {
                $this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
            }
            $this->Specimen->EditValue = HtmlEncode($this->Specimen->CurrentValue);
            $this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // TestUnit
            $this->TestUnit->EditAttrs["class"] = "form-control";
            $this->TestUnit->EditCustomAttributes = "";
            if (!$this->TestUnit->Raw) {
                $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
            }
            $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
            $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

            // LOWHIGH
            $this->LOWHIGH->EditAttrs["class"] = "form-control";
            $this->LOWHIGH->EditCustomAttributes = "";
            if (!$this->LOWHIGH->Raw) {
                $this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
            }
            $this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
            $this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

            // Branch
            $this->Branch->EditAttrs["class"] = "form-control";
            $this->Branch->EditCustomAttributes = "";
            if (!$this->Branch->Raw) {
                $this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
            }
            $this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
            $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

            // Dispatch
            $this->Dispatch->EditAttrs["class"] = "form-control";
            $this->Dispatch->EditCustomAttributes = "";
            if (!$this->Dispatch->Raw) {
                $this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
            }
            $this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
            $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

            // Pic1
            $this->Pic1->EditAttrs["class"] = "form-control";
            $this->Pic1->EditCustomAttributes = "";
            if (!$this->Pic1->Raw) {
                $this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
            }
            $this->Pic1->EditValue = HtmlEncode($this->Pic1->CurrentValue);
            $this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

            // Pic2
            $this->Pic2->EditAttrs["class"] = "form-control";
            $this->Pic2->EditCustomAttributes = "";
            if (!$this->Pic2->Raw) {
                $this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
            }
            $this->Pic2->EditValue = HtmlEncode($this->Pic2->CurrentValue);
            $this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

            // GraphPath
            $this->GraphPath->EditAttrs["class"] = "form-control";
            $this->GraphPath->EditCustomAttributes = "";
            if (!$this->GraphPath->Raw) {
                $this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
            }
            $this->GraphPath->EditValue = HtmlEncode($this->GraphPath->CurrentValue);
            $this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

            // MachineCD
            $this->MachineCD->EditAttrs["class"] = "form-control";
            $this->MachineCD->EditCustomAttributes = "";
            if (!$this->MachineCD->Raw) {
                $this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
            }
            $this->MachineCD->EditValue = HtmlEncode($this->MachineCD->CurrentValue);
            $this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

            // TestCancel
            $this->TestCancel->EditAttrs["class"] = "form-control";
            $this->TestCancel->EditCustomAttributes = "";
            if (!$this->TestCancel->Raw) {
                $this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
            }
            $this->TestCancel->EditValue = HtmlEncode($this->TestCancel->CurrentValue);
            $this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

            // OutSource
            $this->OutSource->EditAttrs["class"] = "form-control";
            $this->OutSource->EditCustomAttributes = "";
            if (!$this->OutSource->Raw) {
                $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
            }
            $this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
            $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

            // Printed
            $this->Printed->EditAttrs["class"] = "form-control";
            $this->Printed->EditCustomAttributes = "";
            if (!$this->Printed->Raw) {
                $this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
            }
            $this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
            $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

            // PrintBy
            $this->PrintBy->EditAttrs["class"] = "form-control";
            $this->PrintBy->EditCustomAttributes = "";
            if (!$this->PrintBy->Raw) {
                $this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
            }
            $this->PrintBy->EditValue = HtmlEncode($this->PrintBy->CurrentValue);
            $this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

            // PrintDate
            $this->PrintDate->EditAttrs["class"] = "form-control";
            $this->PrintDate->EditCustomAttributes = "";
            $this->PrintDate->EditValue = HtmlEncode(FormatDateTime($this->PrintDate->CurrentValue, 8));
            $this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

            // BillingDate
            $this->BillingDate->EditAttrs["class"] = "form-control";
            $this->BillingDate->EditCustomAttributes = "";
            $this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
            $this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

            // BilledBy
            $this->BilledBy->EditAttrs["class"] = "form-control";
            $this->BilledBy->EditCustomAttributes = "";
            if (!$this->BilledBy->Raw) {
                $this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
            }
            $this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
            $this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

            // Resulted
            $this->Resulted->EditAttrs["class"] = "form-control";
            $this->Resulted->EditCustomAttributes = "";
            if (!$this->Resulted->Raw) {
                $this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
            }
            $this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
            $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

            // SampleDate
            $this->SampleDate->EditAttrs["class"] = "form-control";
            $this->SampleDate->EditCustomAttributes = "";
            $this->SampleDate->EditValue = HtmlEncode(FormatDateTime($this->SampleDate->CurrentValue, 8));
            $this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

            // SampleUser
            $this->SampleUser->EditAttrs["class"] = "form-control";
            $this->SampleUser->EditCustomAttributes = "";
            if (!$this->SampleUser->Raw) {
                $this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
            }
            $this->SampleUser->EditValue = HtmlEncode($this->SampleUser->CurrentValue);
            $this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

            // Sampled
            $this->Sampled->EditAttrs["class"] = "form-control";
            $this->Sampled->EditCustomAttributes = "";
            if (!$this->Sampled->Raw) {
                $this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
            }
            $this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
            $this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

            // ReceivedDate
            $this->ReceivedDate->EditAttrs["class"] = "form-control";
            $this->ReceivedDate->EditCustomAttributes = "";
            $this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime($this->ReceivedDate->CurrentValue, 8));
            $this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

            // ReceivedUser
            $this->ReceivedUser->EditAttrs["class"] = "form-control";
            $this->ReceivedUser->EditCustomAttributes = "";
            if (!$this->ReceivedUser->Raw) {
                $this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
            }
            $this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->CurrentValue);
            $this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

            // Recevied
            $this->Recevied->EditAttrs["class"] = "form-control";
            $this->Recevied->EditCustomAttributes = "";
            if (!$this->Recevied->Raw) {
                $this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
            }
            $this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
            $this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

            // DeptRecvDate
            $this->DeptRecvDate->EditAttrs["class"] = "form-control";
            $this->DeptRecvDate->EditCustomAttributes = "";
            $this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime($this->DeptRecvDate->CurrentValue, 8));
            $this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

            // DeptRecvUser
            $this->DeptRecvUser->EditAttrs["class"] = "form-control";
            $this->DeptRecvUser->EditCustomAttributes = "";
            if (!$this->DeptRecvUser->Raw) {
                $this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
            }
            $this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->CurrentValue);
            $this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

            // DeptRecived
            $this->DeptRecived->EditAttrs["class"] = "form-control";
            $this->DeptRecived->EditCustomAttributes = "";
            if (!$this->DeptRecived->Raw) {
                $this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
            }
            $this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
            $this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

            // SAuthDate
            $this->SAuthDate->EditAttrs["class"] = "form-control";
            $this->SAuthDate->EditCustomAttributes = "";
            $this->SAuthDate->EditValue = HtmlEncode(FormatDateTime($this->SAuthDate->CurrentValue, 8));
            $this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

            // SAuthBy
            $this->SAuthBy->EditAttrs["class"] = "form-control";
            $this->SAuthBy->EditCustomAttributes = "";
            if (!$this->SAuthBy->Raw) {
                $this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
            }
            $this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->CurrentValue);
            $this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

            // SAuthendicate
            $this->SAuthendicate->EditAttrs["class"] = "form-control";
            $this->SAuthendicate->EditCustomAttributes = "";
            if (!$this->SAuthendicate->Raw) {
                $this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
            }
            $this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
            $this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

            // AuthDate
            $this->AuthDate->EditAttrs["class"] = "form-control";
            $this->AuthDate->EditCustomAttributes = "";
            $this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
            $this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

            // AuthBy
            $this->AuthBy->EditAttrs["class"] = "form-control";
            $this->AuthBy->EditCustomAttributes = "";
            if (!$this->AuthBy->Raw) {
                $this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
            }
            $this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
            $this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

            // Authencate
            $this->Authencate->EditAttrs["class"] = "form-control";
            $this->Authencate->EditCustomAttributes = "";
            if (!$this->Authencate->Raw) {
                $this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
            }
            $this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
            $this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

            // EditDate
            $this->EditDate->EditAttrs["class"] = "form-control";
            $this->EditDate->EditCustomAttributes = "";
            $this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
            $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

            // EditBy
            $this->EditBy->EditAttrs["class"] = "form-control";
            $this->EditBy->EditCustomAttributes = "";
            if (!$this->EditBy->Raw) {
                $this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
            }
            $this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
            $this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

            // Editted
            $this->Editted->EditAttrs["class"] = "form-control";
            $this->Editted->EditCustomAttributes = "";
            if (!$this->Editted->Raw) {
                $this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
            }
            $this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
            $this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
                $this->Order->OldValue = $this->Order->EditValue;
            }

            // ResType
            $this->ResType->EditAttrs["class"] = "form-control";
            $this->ResType->EditCustomAttributes = "";
            if (!$this->ResType->Raw) {
                $this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
            }
            $this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
            $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

            // Sample
            $this->Sample->EditAttrs["class"] = "form-control";
            $this->Sample->EditCustomAttributes = "";
            if (!$this->Sample->Raw) {
                $this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
            }
            $this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
            $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

            // NoD
            $this->NoD->EditAttrs["class"] = "form-control";
            $this->NoD->EditCustomAttributes = "";
            $this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
            $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
            if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
                $this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
                $this->NoD->OldValue = $this->NoD->EditValue;
            }

            // BillOrder
            $this->BillOrder->EditAttrs["class"] = "form-control";
            $this->BillOrder->EditCustomAttributes = "";
            $this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
            $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
            if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
                $this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
                $this->BillOrder->OldValue = $this->BillOrder->EditValue;
            }

            // Inactive
            $this->Inactive->EditAttrs["class"] = "form-control";
            $this->Inactive->EditCustomAttributes = "";
            if (!$this->Inactive->Raw) {
                $this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
            }
            $this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
            $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

            // CollSample
            $this->CollSample->EditAttrs["class"] = "form-control";
            $this->CollSample->EditCustomAttributes = "";
            if (!$this->CollSample->Raw) {
                $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
            }
            $this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
            $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            if (!$this->TestType->Raw) {
                $this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
            }
            $this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
            $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

            // Repeated
            $this->Repeated->EditAttrs["class"] = "form-control";
            $this->Repeated->EditCustomAttributes = "";
            if (!$this->Repeated->Raw) {
                $this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
            }
            $this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
            $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

            // RepeatedBy
            $this->RepeatedBy->EditAttrs["class"] = "form-control";
            $this->RepeatedBy->EditCustomAttributes = "";
            if (!$this->RepeatedBy->Raw) {
                $this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
            }
            $this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
            $this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

            // RepeatedDate
            $this->RepeatedDate->EditAttrs["class"] = "form-control";
            $this->RepeatedDate->EditCustomAttributes = "";
            $this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
            $this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

            // serviceID
            $this->serviceID->EditAttrs["class"] = "form-control";
            $this->serviceID->EditCustomAttributes = "";
            $this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
            $this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

            // Service_Type
            $this->Service_Type->EditAttrs["class"] = "form-control";
            $this->Service_Type->EditCustomAttributes = "";
            if (!$this->Service_Type->Raw) {
                $this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
            }
            $this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
            $this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

            // Service_Department
            $this->Service_Department->EditAttrs["class"] = "form-control";
            $this->Service_Department->EditCustomAttributes = "";
            if (!$this->Service_Department->Raw) {
                $this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
            }
            $this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
            $this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

            // RequestNo
            $this->RequestNo->EditAttrs["class"] = "form-control";
            $this->RequestNo->EditCustomAttributes = "";
            $this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
            $this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // DiscountCategory
            $this->DiscountCategory->LinkCustomAttributes = "";
            $this->DiscountCategory->HrefValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";

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

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";

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

            // DrSharePres
            $this->DrSharePres->LinkCustomAttributes = "";
            $this->DrSharePres->HrefValue = "";

            // HospSharePres
            $this->HospSharePres->LinkCustomAttributes = "";
            $this->HospSharePres->HrefValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->LinkCustomAttributes = "";
            $this->DrShareSettiledAmount->HrefValue = "";

            // DrShareSettledId
            $this->DrShareSettledId->LinkCustomAttributes = "";
            $this->DrShareSettledId->HrefValue = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->LinkCustomAttributes = "";
            $this->DrShareSettiledStatus->HrefValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";

            // BillingDate
            $this->BillingDate->LinkCustomAttributes = "";
            $this->BillingDate->HrefValue = "";

            // BilledBy
            $this->BilledBy->LinkCustomAttributes = "";
            $this->BilledBy->HrefValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";

            // Sampled
            $this->Sampled->LinkCustomAttributes = "";
            $this->Sampled->HrefValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";

            // Recevied
            $this->Recevied->LinkCustomAttributes = "";
            $this->Recevied->HrefValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";

            // DeptRecived
            $this->DeptRecived->LinkCustomAttributes = "";
            $this->DeptRecived->HrefValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";

            // SAuthendicate
            $this->SAuthendicate->LinkCustomAttributes = "";
            $this->SAuthendicate->HrefValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";

            // Authencate
            $this->Authencate->LinkCustomAttributes = "";
            $this->Authencate->HrefValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";

            // EditBy
            $this->EditBy->LinkCustomAttributes = "";
            $this->EditBy->HrefValue = "";

            // Editted
            $this->Editted->LinkCustomAttributes = "";
            $this->Editted->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";

            // RepeatedBy
            $this->RepeatedBy->LinkCustomAttributes = "";
            $this->RepeatedBy->HrefValue = "";

            // RepeatedDate
            $this->RepeatedDate->LinkCustomAttributes = "";
            $this->RepeatedDate->HrefValue = "";

            // serviceID
            $this->serviceID->LinkCustomAttributes = "";
            $this->serviceID->HrefValue = "";

            // Service_Type
            $this->Service_Type->LinkCustomAttributes = "";
            $this->Service_Type->HrefValue = "";

            // Service_Department
            $this->Service_Department->LinkCustomAttributes = "";
            $this->Service_Department->HrefValue = "";

            // RequestNo
            $this->RequestNo->LinkCustomAttributes = "";
            $this->RequestNo->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            $this->PatientName->EditValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            $this->Age->EditValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            $this->Gender->EditValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Services
            $this->Services->EditAttrs["class"] = "form-control";
            $this->Services->EditCustomAttributes = "";
            if (!$this->Services->Raw) {
                $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
            }
            $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
            $curVal = trim(strval($this->Services->CurrentValue));
            if ($curVal != "") {
                $this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
                if ($this->Services->EditValue === null) { // Lookup from database
                    $filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Services->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Services->Lookup->renderViewRow($rswrk[0]);
                        $this->Services->EditValue = $this->Services->displayValue($arwrk);
                    } else {
                        $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
                    }
                }
            } else {
                $this->Services->EditValue = null;
            }
            $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // amount
            $this->amount->EditAttrs["class"] = "form-control";
            $this->amount->EditCustomAttributes = "";
            $this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
            $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
            if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
                $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
                $this->amount->OldValue = $this->amount->EditValue;
            }

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // DiscountCategory
            $this->DiscountCategory->EditAttrs["class"] = "form-control";
            $this->DiscountCategory->EditCustomAttributes = "";
            $curVal = trim(strval($this->DiscountCategory->CurrentValue));
            if ($curVal != "") {
                $this->DiscountCategory->ViewValue = $this->DiscountCategory->lookupCacheOption($curVal);
            } else {
                $this->DiscountCategory->ViewValue = $this->DiscountCategory->Lookup !== null && is_array($this->DiscountCategory->Lookup->Options) ? $curVal : null;
            }
            if ($this->DiscountCategory->ViewValue !== null) { // Load from cache
                $this->DiscountCategory->EditValue = array_values($this->DiscountCategory->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Particulars`" . SearchString("=", $this->DiscountCategory->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DiscountCategory->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DiscountCategory->EditValue = $arwrk;
            }
            $this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
            if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
                $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
                $this->Discount->OldValue = $this->Discount->EditValue;
            }

            // SubTotal
            $this->SubTotal->EditAttrs["class"] = "form-control";
            $this->SubTotal->EditCustomAttributes = "";
            $this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
            $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
            if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
                $this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
                $this->SubTotal->OldValue = $this->SubTotal->EditValue;
            }

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            $this->description->EditValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // patient_type
            $this->patient_type->EditAttrs["class"] = "form-control";
            $this->patient_type->EditCustomAttributes = "";
            $this->patient_type->EditValue = $this->patient_type->CurrentValue;
            $this->patient_type->EditValue = FormatNumber($this->patient_type->EditValue, 0, -2, -2, -2);
            $this->patient_type->ViewCustomAttributes = "";

            // charged_date
            $this->charged_date->EditAttrs["class"] = "form-control";
            $this->charged_date->EditCustomAttributes = "";
            $this->charged_date->EditValue = $this->charged_date->CurrentValue;
            $this->charged_date->EditValue = FormatDateTime($this->charged_date->EditValue, 0);
            $this->charged_date->ViewCustomAttributes = "";

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->CurrentValue;
            $this->status->EditValue = FormatNumber($this->status->EditValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // Aid
            $this->Aid->EditAttrs["class"] = "form-control";
            $this->Aid->EditCustomAttributes = "";
            $this->Aid->EditValue = $this->Aid->CurrentValue;
            $this->Aid->EditValue = FormatNumber($this->Aid->EditValue, 0, -2, -2, -2);
            $this->Aid->ViewCustomAttributes = "";

            // Vid
            $this->Vid->EditAttrs["class"] = "form-control";
            $this->Vid->EditCustomAttributes = "";
            $this->Vid->EditValue = $this->Vid->CurrentValue;
            $this->Vid->EditValue = FormatNumber($this->Vid->EditValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = $this->DrID->CurrentValue;
            $this->DrID->EditValue = FormatNumber($this->DrID->EditValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // DrCODE
            $this->DrCODE->EditAttrs["class"] = "form-control";
            $this->DrCODE->EditCustomAttributes = "";
            $this->DrCODE->EditValue = $this->DrCODE->CurrentValue;
            $this->DrCODE->ViewCustomAttributes = "";

            // DrName
            $this->DrName->EditAttrs["class"] = "form-control";
            $this->DrName->EditCustomAttributes = "";
            $this->DrName->EditValue = $this->DrName->CurrentValue;
            $this->DrName->ViewCustomAttributes = "";

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            $this->Department->EditValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // DrSharePres
            $this->DrSharePres->EditAttrs["class"] = "form-control";
            $this->DrSharePres->EditCustomAttributes = "";
            $this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
            $this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
            if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
                $this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
                $this->DrSharePres->OldValue = $this->DrSharePres->EditValue;
            }

            // HospSharePres
            $this->HospSharePres->EditAttrs["class"] = "form-control";
            $this->HospSharePres->EditCustomAttributes = "";
            $this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
            $this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
            if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
                $this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
                $this->HospSharePres->OldValue = $this->HospSharePres->EditValue;
            }

            // DrShareAmount
            $this->DrShareAmount->EditAttrs["class"] = "form-control";
            $this->DrShareAmount->EditCustomAttributes = "";
            $this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
            $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
            if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
                $this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
                $this->DrShareAmount->OldValue = $this->DrShareAmount->EditValue;
            }

            // HospShareAmount
            $this->HospShareAmount->EditAttrs["class"] = "form-control";
            $this->HospShareAmount->EditCustomAttributes = "";
            $this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
            $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
            if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
                $this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
                $this->HospShareAmount->OldValue = $this->HospShareAmount->EditValue;
            }

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledAmount->EditCustomAttributes = "";
            $this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
            $this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
            if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
                $this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
                $this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->EditValue;
            }

            // DrShareSettledId
            $this->DrShareSettledId->EditAttrs["class"] = "form-control";
            $this->DrShareSettledId->EditCustomAttributes = "";
            $this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
            $this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledStatus->EditCustomAttributes = "";
            $this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
            $this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // invoiceAmount
            $this->invoiceAmount->EditAttrs["class"] = "form-control";
            $this->invoiceAmount->EditCustomAttributes = "";
            $this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
            $this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
            if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
                $this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
                $this->invoiceAmount->OldValue = $this->invoiceAmount->EditValue;
            }

            // invoiceStatus
            $this->invoiceStatus->EditAttrs["class"] = "form-control";
            $this->invoiceStatus->EditCustomAttributes = "";
            if (!$this->invoiceStatus->Raw) {
                $this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
            }
            $this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
            $this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

            // modeOfPayment
            $this->modeOfPayment->EditAttrs["class"] = "form-control";
            $this->modeOfPayment->EditCustomAttributes = "";
            if (!$this->modeOfPayment->Raw) {
                $this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
            }
            $this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
            $this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

            // HospID

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // ItemCode
            $this->ItemCode->EditAttrs["class"] = "form-control";
            $this->ItemCode->EditCustomAttributes = "";
            if (!$this->ItemCode->Raw) {
                $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
            }
            $this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
            $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // TestSubCd
            $this->TestSubCd->EditAttrs["class"] = "form-control";
            $this->TestSubCd->EditCustomAttributes = "";
            if (!$this->TestSubCd->Raw) {
                $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
            }
            $this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
            $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

            // DEptCd
            $this->DEptCd->EditAttrs["class"] = "form-control";
            $this->DEptCd->EditCustomAttributes = "";
            if (!$this->DEptCd->Raw) {
                $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
            }
            $this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
            $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

            // ProfCd
            $this->ProfCd->EditAttrs["class"] = "form-control";
            $this->ProfCd->EditCustomAttributes = "";
            if (!$this->ProfCd->Raw) {
                $this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
            }
            $this->ProfCd->EditValue = HtmlEncode($this->ProfCd->CurrentValue);
            $this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

            // Comments
            $this->Comments->EditAttrs["class"] = "form-control";
            $this->Comments->EditCustomAttributes = "";
            if (!$this->Comments->Raw) {
                $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
            }
            $this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
            $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Specimen
            $this->Specimen->EditAttrs["class"] = "form-control";
            $this->Specimen->EditCustomAttributes = "";
            if (!$this->Specimen->Raw) {
                $this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
            }
            $this->Specimen->EditValue = HtmlEncode($this->Specimen->CurrentValue);
            $this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // TestUnit
            $this->TestUnit->EditAttrs["class"] = "form-control";
            $this->TestUnit->EditCustomAttributes = "";
            if (!$this->TestUnit->Raw) {
                $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
            }
            $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
            $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

            // LOWHIGH
            $this->LOWHIGH->EditAttrs["class"] = "form-control";
            $this->LOWHIGH->EditCustomAttributes = "";
            if (!$this->LOWHIGH->Raw) {
                $this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
            }
            $this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
            $this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

            // Branch
            $this->Branch->EditAttrs["class"] = "form-control";
            $this->Branch->EditCustomAttributes = "";
            if (!$this->Branch->Raw) {
                $this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
            }
            $this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
            $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

            // Dispatch
            $this->Dispatch->EditAttrs["class"] = "form-control";
            $this->Dispatch->EditCustomAttributes = "";
            if (!$this->Dispatch->Raw) {
                $this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
            }
            $this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
            $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

            // Pic1
            $this->Pic1->EditAttrs["class"] = "form-control";
            $this->Pic1->EditCustomAttributes = "";
            if (!$this->Pic1->Raw) {
                $this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
            }
            $this->Pic1->EditValue = HtmlEncode($this->Pic1->CurrentValue);
            $this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

            // Pic2
            $this->Pic2->EditAttrs["class"] = "form-control";
            $this->Pic2->EditCustomAttributes = "";
            if (!$this->Pic2->Raw) {
                $this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
            }
            $this->Pic2->EditValue = HtmlEncode($this->Pic2->CurrentValue);
            $this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

            // GraphPath
            $this->GraphPath->EditAttrs["class"] = "form-control";
            $this->GraphPath->EditCustomAttributes = "";
            if (!$this->GraphPath->Raw) {
                $this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
            }
            $this->GraphPath->EditValue = HtmlEncode($this->GraphPath->CurrentValue);
            $this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

            // MachineCD
            $this->MachineCD->EditAttrs["class"] = "form-control";
            $this->MachineCD->EditCustomAttributes = "";
            if (!$this->MachineCD->Raw) {
                $this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
            }
            $this->MachineCD->EditValue = HtmlEncode($this->MachineCD->CurrentValue);
            $this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

            // TestCancel
            $this->TestCancel->EditAttrs["class"] = "form-control";
            $this->TestCancel->EditCustomAttributes = "";
            if (!$this->TestCancel->Raw) {
                $this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
            }
            $this->TestCancel->EditValue = HtmlEncode($this->TestCancel->CurrentValue);
            $this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

            // OutSource
            $this->OutSource->EditAttrs["class"] = "form-control";
            $this->OutSource->EditCustomAttributes = "";
            if (!$this->OutSource->Raw) {
                $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
            }
            $this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
            $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

            // Printed
            $this->Printed->EditAttrs["class"] = "form-control";
            $this->Printed->EditCustomAttributes = "";
            if (!$this->Printed->Raw) {
                $this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
            }
            $this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
            $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

            // PrintBy
            $this->PrintBy->EditAttrs["class"] = "form-control";
            $this->PrintBy->EditCustomAttributes = "";
            if (!$this->PrintBy->Raw) {
                $this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
            }
            $this->PrintBy->EditValue = HtmlEncode($this->PrintBy->CurrentValue);
            $this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

            // PrintDate
            $this->PrintDate->EditAttrs["class"] = "form-control";
            $this->PrintDate->EditCustomAttributes = "";
            $this->PrintDate->EditValue = HtmlEncode(FormatDateTime($this->PrintDate->CurrentValue, 8));
            $this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

            // BillingDate
            $this->BillingDate->EditAttrs["class"] = "form-control";
            $this->BillingDate->EditCustomAttributes = "";
            $this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
            $this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

            // BilledBy
            $this->BilledBy->EditAttrs["class"] = "form-control";
            $this->BilledBy->EditCustomAttributes = "";
            if (!$this->BilledBy->Raw) {
                $this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
            }
            $this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
            $this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

            // Resulted
            $this->Resulted->EditAttrs["class"] = "form-control";
            $this->Resulted->EditCustomAttributes = "";
            if (!$this->Resulted->Raw) {
                $this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
            }
            $this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
            $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

            // SampleDate
            $this->SampleDate->EditAttrs["class"] = "form-control";
            $this->SampleDate->EditCustomAttributes = "";
            $this->SampleDate->EditValue = HtmlEncode(FormatDateTime($this->SampleDate->CurrentValue, 8));
            $this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

            // SampleUser
            $this->SampleUser->EditAttrs["class"] = "form-control";
            $this->SampleUser->EditCustomAttributes = "";
            if (!$this->SampleUser->Raw) {
                $this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
            }
            $this->SampleUser->EditValue = HtmlEncode($this->SampleUser->CurrentValue);
            $this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

            // Sampled
            $this->Sampled->EditAttrs["class"] = "form-control";
            $this->Sampled->EditCustomAttributes = "";
            if (!$this->Sampled->Raw) {
                $this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
            }
            $this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
            $this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

            // ReceivedDate
            $this->ReceivedDate->EditAttrs["class"] = "form-control";
            $this->ReceivedDate->EditCustomAttributes = "";
            $this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime($this->ReceivedDate->CurrentValue, 8));
            $this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

            // ReceivedUser
            $this->ReceivedUser->EditAttrs["class"] = "form-control";
            $this->ReceivedUser->EditCustomAttributes = "";
            if (!$this->ReceivedUser->Raw) {
                $this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
            }
            $this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->CurrentValue);
            $this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

            // Recevied
            $this->Recevied->EditAttrs["class"] = "form-control";
            $this->Recevied->EditCustomAttributes = "";
            if (!$this->Recevied->Raw) {
                $this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
            }
            $this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
            $this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

            // DeptRecvDate
            $this->DeptRecvDate->EditAttrs["class"] = "form-control";
            $this->DeptRecvDate->EditCustomAttributes = "";
            $this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime($this->DeptRecvDate->CurrentValue, 8));
            $this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

            // DeptRecvUser
            $this->DeptRecvUser->EditAttrs["class"] = "form-control";
            $this->DeptRecvUser->EditCustomAttributes = "";
            if (!$this->DeptRecvUser->Raw) {
                $this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
            }
            $this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->CurrentValue);
            $this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

            // DeptRecived
            $this->DeptRecived->EditAttrs["class"] = "form-control";
            $this->DeptRecived->EditCustomAttributes = "";
            if (!$this->DeptRecived->Raw) {
                $this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
            }
            $this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
            $this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

            // SAuthDate
            $this->SAuthDate->EditAttrs["class"] = "form-control";
            $this->SAuthDate->EditCustomAttributes = "";
            $this->SAuthDate->EditValue = HtmlEncode(FormatDateTime($this->SAuthDate->CurrentValue, 8));
            $this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

            // SAuthBy
            $this->SAuthBy->EditAttrs["class"] = "form-control";
            $this->SAuthBy->EditCustomAttributes = "";
            if (!$this->SAuthBy->Raw) {
                $this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
            }
            $this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->CurrentValue);
            $this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

            // SAuthendicate
            $this->SAuthendicate->EditAttrs["class"] = "form-control";
            $this->SAuthendicate->EditCustomAttributes = "";
            if (!$this->SAuthendicate->Raw) {
                $this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
            }
            $this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
            $this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

            // AuthDate
            $this->AuthDate->EditAttrs["class"] = "form-control";
            $this->AuthDate->EditCustomAttributes = "";
            $this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
            $this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

            // AuthBy
            $this->AuthBy->EditAttrs["class"] = "form-control";
            $this->AuthBy->EditCustomAttributes = "";
            if (!$this->AuthBy->Raw) {
                $this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
            }
            $this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
            $this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

            // Authencate
            $this->Authencate->EditAttrs["class"] = "form-control";
            $this->Authencate->EditCustomAttributes = "";
            if (!$this->Authencate->Raw) {
                $this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
            }
            $this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
            $this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

            // EditDate
            $this->EditDate->EditAttrs["class"] = "form-control";
            $this->EditDate->EditCustomAttributes = "";
            $this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
            $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

            // EditBy
            $this->EditBy->EditAttrs["class"] = "form-control";
            $this->EditBy->EditCustomAttributes = "";
            if (!$this->EditBy->Raw) {
                $this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
            }
            $this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
            $this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

            // Editted
            $this->Editted->EditAttrs["class"] = "form-control";
            $this->Editted->EditCustomAttributes = "";
            if (!$this->Editted->Raw) {
                $this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
            }
            $this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
            $this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
                $this->Order->OldValue = $this->Order->EditValue;
            }

            // ResType
            $this->ResType->EditAttrs["class"] = "form-control";
            $this->ResType->EditCustomAttributes = "";
            if (!$this->ResType->Raw) {
                $this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
            }
            $this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
            $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

            // Sample
            $this->Sample->EditAttrs["class"] = "form-control";
            $this->Sample->EditCustomAttributes = "";
            if (!$this->Sample->Raw) {
                $this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
            }
            $this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
            $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

            // NoD
            $this->NoD->EditAttrs["class"] = "form-control";
            $this->NoD->EditCustomAttributes = "";
            $this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
            $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
            if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
                $this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
                $this->NoD->OldValue = $this->NoD->EditValue;
            }

            // BillOrder
            $this->BillOrder->EditAttrs["class"] = "form-control";
            $this->BillOrder->EditCustomAttributes = "";
            $this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
            $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
            if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
                $this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
                $this->BillOrder->OldValue = $this->BillOrder->EditValue;
            }

            // Inactive
            $this->Inactive->EditAttrs["class"] = "form-control";
            $this->Inactive->EditCustomAttributes = "";
            if (!$this->Inactive->Raw) {
                $this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
            }
            $this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
            $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

            // CollSample
            $this->CollSample->EditAttrs["class"] = "form-control";
            $this->CollSample->EditCustomAttributes = "";
            if (!$this->CollSample->Raw) {
                $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
            }
            $this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
            $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            $this->TestType->EditValue = $this->TestType->CurrentValue;
            $this->TestType->ViewCustomAttributes = "";

            // Repeated
            $this->Repeated->EditAttrs["class"] = "form-control";
            $this->Repeated->EditCustomAttributes = "";
            if (!$this->Repeated->Raw) {
                $this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
            }
            $this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
            $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

            // RepeatedBy
            $this->RepeatedBy->EditAttrs["class"] = "form-control";
            $this->RepeatedBy->EditCustomAttributes = "";
            if (!$this->RepeatedBy->Raw) {
                $this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
            }
            $this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
            $this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

            // RepeatedDate
            $this->RepeatedDate->EditAttrs["class"] = "form-control";
            $this->RepeatedDate->EditCustomAttributes = "";
            $this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
            $this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

            // serviceID
            $this->serviceID->EditAttrs["class"] = "form-control";
            $this->serviceID->EditCustomAttributes = "";
            $this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
            $this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

            // Service_Type
            $this->Service_Type->EditAttrs["class"] = "form-control";
            $this->Service_Type->EditCustomAttributes = "";
            if (!$this->Service_Type->Raw) {
                $this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
            }
            $this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
            $this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

            // Service_Department
            $this->Service_Department->EditAttrs["class"] = "form-control";
            $this->Service_Department->EditCustomAttributes = "";
            if (!$this->Service_Department->Raw) {
                $this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
            }
            $this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
            $this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

            // RequestNo
            $this->RequestNo->EditAttrs["class"] = "form-control";
            $this->RequestNo->EditCustomAttributes = "";
            $this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
            $this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // DiscountCategory
            $this->DiscountCategory->LinkCustomAttributes = "";
            $this->DiscountCategory->HrefValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";
            $this->patient_type->TooltipValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";
            $this->charged_date->TooltipValue = "";

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

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";
            $this->Aid->TooltipValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";
            $this->Vid->TooltipValue = "";

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

            // DrSharePres
            $this->DrSharePres->LinkCustomAttributes = "";
            $this->DrSharePres->HrefValue = "";

            // HospSharePres
            $this->HospSharePres->LinkCustomAttributes = "";
            $this->HospSharePres->HrefValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->LinkCustomAttributes = "";
            $this->DrShareSettiledAmount->HrefValue = "";

            // DrShareSettledId
            $this->DrShareSettledId->LinkCustomAttributes = "";
            $this->DrShareSettledId->HrefValue = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->LinkCustomAttributes = "";
            $this->DrShareSettiledStatus->HrefValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";

            // BillingDate
            $this->BillingDate->LinkCustomAttributes = "";
            $this->BillingDate->HrefValue = "";

            // BilledBy
            $this->BilledBy->LinkCustomAttributes = "";
            $this->BilledBy->HrefValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";

            // Sampled
            $this->Sampled->LinkCustomAttributes = "";
            $this->Sampled->HrefValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";

            // Recevied
            $this->Recevied->LinkCustomAttributes = "";
            $this->Recevied->HrefValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";

            // DeptRecived
            $this->DeptRecived->LinkCustomAttributes = "";
            $this->DeptRecived->HrefValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";

            // SAuthendicate
            $this->SAuthendicate->LinkCustomAttributes = "";
            $this->SAuthendicate->HrefValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";

            // Authencate
            $this->Authencate->LinkCustomAttributes = "";
            $this->Authencate->HrefValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";

            // EditBy
            $this->EditBy->LinkCustomAttributes = "";
            $this->EditBy->HrefValue = "";

            // Editted
            $this->Editted->LinkCustomAttributes = "";
            $this->Editted->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";

            // RepeatedBy
            $this->RepeatedBy->LinkCustomAttributes = "";
            $this->RepeatedBy->HrefValue = "";

            // RepeatedDate
            $this->RepeatedDate->LinkCustomAttributes = "";
            $this->RepeatedDate->HrefValue = "";

            // serviceID
            $this->serviceID->LinkCustomAttributes = "";
            $this->serviceID->HrefValue = "";

            // Service_Type
            $this->Service_Type->LinkCustomAttributes = "";
            $this->Service_Type->HrefValue = "";

            // Service_Department
            $this->Service_Department->LinkCustomAttributes = "";
            $this->Service_Department->HrefValue = "";

            // RequestNo
            $this->RequestNo->LinkCustomAttributes = "";
            $this->RequestNo->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
                    $this->amount->Total = 0; // Initialize total
                    $this->SubTotal->Total = 0; // Initialize total
        } elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
            $this->amount->CurrentValue = $this->amount->Total;
            $this->amount->ViewValue = $this->amount->CurrentValue;
            $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
            $this->amount->ViewCustomAttributes = "";
            $this->amount->HrefValue = ""; // Clear href value
            $this->SubTotal->CurrentValue = $this->SubTotal->Total;
            $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
            $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
            $this->SubTotal->ViewCustomAttributes = "";
            $this->SubTotal->HrefValue = ""; // Clear href value
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
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->Services->Required) {
            if (!$this->Services->IsDetailKey && EmptyValue($this->Services->FormValue)) {
                $this->Services->addErrorMessage(str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
            }
        }
        if ($this->Unit->Required) {
            if (!$this->Unit->IsDetailKey && EmptyValue($this->Unit->FormValue)) {
                $this->Unit->addErrorMessage(str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Unit->FormValue)) {
            $this->Unit->addErrorMessage($this->Unit->getErrorMessage(false));
        }
        if ($this->amount->Required) {
            if (!$this->amount->IsDetailKey && EmptyValue($this->amount->FormValue)) {
                $this->amount->addErrorMessage(str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->amount->FormValue)) {
            $this->amount->addErrorMessage($this->amount->getErrorMessage(false));
        }
        if ($this->Quantity->Required) {
            if (!$this->Quantity->IsDetailKey && EmptyValue($this->Quantity->FormValue)) {
                $this->Quantity->addErrorMessage(str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Quantity->FormValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if ($this->DiscountCategory->Required) {
            if (!$this->DiscountCategory->IsDetailKey && EmptyValue($this->DiscountCategory->FormValue)) {
                $this->DiscountCategory->addErrorMessage(str_replace("%s", $this->DiscountCategory->caption(), $this->DiscountCategory->RequiredErrorMessage));
            }
        }
        if ($this->Discount->Required) {
            if (!$this->Discount->IsDetailKey && EmptyValue($this->Discount->FormValue)) {
                $this->Discount->addErrorMessage(str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Discount->FormValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
        }
        if ($this->SubTotal->Required) {
            if (!$this->SubTotal->IsDetailKey && EmptyValue($this->SubTotal->FormValue)) {
                $this->SubTotal->addErrorMessage(str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SubTotal->FormValue)) {
            $this->SubTotal->addErrorMessage($this->SubTotal->getErrorMessage(false));
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
            }
        }
        if ($this->patient_type->Required) {
            if (!$this->patient_type->IsDetailKey && EmptyValue($this->patient_type->FormValue)) {
                $this->patient_type->addErrorMessage(str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
            }
        }
        if ($this->charged_date->Required) {
            if (!$this->charged_date->IsDetailKey && EmptyValue($this->charged_date->FormValue)) {
                $this->charged_date->addErrorMessage(str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
        if ($this->Aid->Required) {
            if (!$this->Aid->IsDetailKey && EmptyValue($this->Aid->FormValue)) {
                $this->Aid->addErrorMessage(str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
            }
        }
        if ($this->Vid->Required) {
            if (!$this->Vid->IsDetailKey && EmptyValue($this->Vid->FormValue)) {
                $this->Vid->addErrorMessage(str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
            }
        }
        if ($this->DrID->Required) {
            if (!$this->DrID->IsDetailKey && EmptyValue($this->DrID->FormValue)) {
                $this->DrID->addErrorMessage(str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
            }
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
        if ($this->DrSharePres->Required) {
            if (!$this->DrSharePres->IsDetailKey && EmptyValue($this->DrSharePres->FormValue)) {
                $this->DrSharePres->addErrorMessage(str_replace("%s", $this->DrSharePres->caption(), $this->DrSharePres->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrSharePres->FormValue)) {
            $this->DrSharePres->addErrorMessage($this->DrSharePres->getErrorMessage(false));
        }
        if ($this->HospSharePres->Required) {
            if (!$this->HospSharePres->IsDetailKey && EmptyValue($this->HospSharePres->FormValue)) {
                $this->HospSharePres->addErrorMessage(str_replace("%s", $this->HospSharePres->caption(), $this->HospSharePres->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->HospSharePres->FormValue)) {
            $this->HospSharePres->addErrorMessage($this->HospSharePres->getErrorMessage(false));
        }
        if ($this->DrShareAmount->Required) {
            if (!$this->DrShareAmount->IsDetailKey && EmptyValue($this->DrShareAmount->FormValue)) {
                $this->DrShareAmount->addErrorMessage(str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrShareAmount->FormValue)) {
            $this->DrShareAmount->addErrorMessage($this->DrShareAmount->getErrorMessage(false));
        }
        if ($this->HospShareAmount->Required) {
            if (!$this->HospShareAmount->IsDetailKey && EmptyValue($this->HospShareAmount->FormValue)) {
                $this->HospShareAmount->addErrorMessage(str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->HospShareAmount->FormValue)) {
            $this->HospShareAmount->addErrorMessage($this->HospShareAmount->getErrorMessage(false));
        }
        if ($this->DrShareSettiledAmount->Required) {
            if (!$this->DrShareSettiledAmount->IsDetailKey && EmptyValue($this->DrShareSettiledAmount->FormValue)) {
                $this->DrShareSettiledAmount->addErrorMessage(str_replace("%s", $this->DrShareSettiledAmount->caption(), $this->DrShareSettiledAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrShareSettiledAmount->FormValue)) {
            $this->DrShareSettiledAmount->addErrorMessage($this->DrShareSettiledAmount->getErrorMessage(false));
        }
        if ($this->DrShareSettledId->Required) {
            if (!$this->DrShareSettledId->IsDetailKey && EmptyValue($this->DrShareSettledId->FormValue)) {
                $this->DrShareSettledId->addErrorMessage(str_replace("%s", $this->DrShareSettledId->caption(), $this->DrShareSettledId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrShareSettledId->FormValue)) {
            $this->DrShareSettledId->addErrorMessage($this->DrShareSettledId->getErrorMessage(false));
        }
        if ($this->DrShareSettiledStatus->Required) {
            if (!$this->DrShareSettiledStatus->IsDetailKey && EmptyValue($this->DrShareSettiledStatus->FormValue)) {
                $this->DrShareSettiledStatus->addErrorMessage(str_replace("%s", $this->DrShareSettiledStatus->caption(), $this->DrShareSettiledStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrShareSettiledStatus->FormValue)) {
            $this->DrShareSettiledStatus->addErrorMessage($this->DrShareSettiledStatus->getErrorMessage(false));
        }
        if ($this->invoiceId->Required) {
            if (!$this->invoiceId->IsDetailKey && EmptyValue($this->invoiceId->FormValue)) {
                $this->invoiceId->addErrorMessage(str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->invoiceId->FormValue)) {
            $this->invoiceId->addErrorMessage($this->invoiceId->getErrorMessage(false));
        }
        if ($this->invoiceAmount->Required) {
            if (!$this->invoiceAmount->IsDetailKey && EmptyValue($this->invoiceAmount->FormValue)) {
                $this->invoiceAmount->addErrorMessage(str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->invoiceAmount->FormValue)) {
            $this->invoiceAmount->addErrorMessage($this->invoiceAmount->getErrorMessage(false));
        }
        if ($this->invoiceStatus->Required) {
            if (!$this->invoiceStatus->IsDetailKey && EmptyValue($this->invoiceStatus->FormValue)) {
                $this->invoiceStatus->addErrorMessage(str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
            }
        }
        if ($this->modeOfPayment->Required) {
            if (!$this->modeOfPayment->IsDetailKey && EmptyValue($this->modeOfPayment->FormValue)) {
                $this->modeOfPayment->addErrorMessage(str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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
        if ($this->ItemCode->Required) {
            if (!$this->ItemCode->IsDetailKey && EmptyValue($this->ItemCode->FormValue)) {
                $this->ItemCode->addErrorMessage(str_replace("%s", $this->ItemCode->caption(), $this->ItemCode->RequiredErrorMessage));
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
        if ($this->sid->Required) {
            if (!$this->sid->IsDetailKey && EmptyValue($this->sid->FormValue)) {
                $this->sid->addErrorMessage(str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->sid->FormValue)) {
            $this->sid->addErrorMessage($this->sid->getErrorMessage(false));
        }
        if ($this->TestSubCd->Required) {
            if (!$this->TestSubCd->IsDetailKey && EmptyValue($this->TestSubCd->FormValue)) {
                $this->TestSubCd->addErrorMessage(str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
            }
        }
        if ($this->DEptCd->Required) {
            if (!$this->DEptCd->IsDetailKey && EmptyValue($this->DEptCd->FormValue)) {
                $this->DEptCd->addErrorMessage(str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
            }
        }
        if ($this->ProfCd->Required) {
            if (!$this->ProfCd->IsDetailKey && EmptyValue($this->ProfCd->FormValue)) {
                $this->ProfCd->addErrorMessage(str_replace("%s", $this->ProfCd->caption(), $this->ProfCd->RequiredErrorMessage));
            }
        }
        if ($this->Comments->Required) {
            if (!$this->Comments->IsDetailKey && EmptyValue($this->Comments->FormValue)) {
                $this->Comments->addErrorMessage(str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
            }
        }
        if ($this->Method->Required) {
            if (!$this->Method->IsDetailKey && EmptyValue($this->Method->FormValue)) {
                $this->Method->addErrorMessage(str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
            }
        }
        if ($this->Specimen->Required) {
            if (!$this->Specimen->IsDetailKey && EmptyValue($this->Specimen->FormValue)) {
                $this->Specimen->addErrorMessage(str_replace("%s", $this->Specimen->caption(), $this->Specimen->RequiredErrorMessage));
            }
        }
        if ($this->Abnormal->Required) {
            if (!$this->Abnormal->IsDetailKey && EmptyValue($this->Abnormal->FormValue)) {
                $this->Abnormal->addErrorMessage(str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
            }
        }
        if ($this->TestUnit->Required) {
            if (!$this->TestUnit->IsDetailKey && EmptyValue($this->TestUnit->FormValue)) {
                $this->TestUnit->addErrorMessage(str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
            }
        }
        if ($this->LOWHIGH->Required) {
            if (!$this->LOWHIGH->IsDetailKey && EmptyValue($this->LOWHIGH->FormValue)) {
                $this->LOWHIGH->addErrorMessage(str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
            }
        }
        if ($this->Branch->Required) {
            if (!$this->Branch->IsDetailKey && EmptyValue($this->Branch->FormValue)) {
                $this->Branch->addErrorMessage(str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
            }
        }
        if ($this->Dispatch->Required) {
            if (!$this->Dispatch->IsDetailKey && EmptyValue($this->Dispatch->FormValue)) {
                $this->Dispatch->addErrorMessage(str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
            }
        }
        if ($this->Pic1->Required) {
            if (!$this->Pic1->IsDetailKey && EmptyValue($this->Pic1->FormValue)) {
                $this->Pic1->addErrorMessage(str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
            }
        }
        if ($this->Pic2->Required) {
            if (!$this->Pic2->IsDetailKey && EmptyValue($this->Pic2->FormValue)) {
                $this->Pic2->addErrorMessage(str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
            }
        }
        if ($this->GraphPath->Required) {
            if (!$this->GraphPath->IsDetailKey && EmptyValue($this->GraphPath->FormValue)) {
                $this->GraphPath->addErrorMessage(str_replace("%s", $this->GraphPath->caption(), $this->GraphPath->RequiredErrorMessage));
            }
        }
        if ($this->MachineCD->Required) {
            if (!$this->MachineCD->IsDetailKey && EmptyValue($this->MachineCD->FormValue)) {
                $this->MachineCD->addErrorMessage(str_replace("%s", $this->MachineCD->caption(), $this->MachineCD->RequiredErrorMessage));
            }
        }
        if ($this->TestCancel->Required) {
            if (!$this->TestCancel->IsDetailKey && EmptyValue($this->TestCancel->FormValue)) {
                $this->TestCancel->addErrorMessage(str_replace("%s", $this->TestCancel->caption(), $this->TestCancel->RequiredErrorMessage));
            }
        }
        if ($this->OutSource->Required) {
            if (!$this->OutSource->IsDetailKey && EmptyValue($this->OutSource->FormValue)) {
                $this->OutSource->addErrorMessage(str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
            }
        }
        if ($this->Printed->Required) {
            if (!$this->Printed->IsDetailKey && EmptyValue($this->Printed->FormValue)) {
                $this->Printed->addErrorMessage(str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
            }
        }
        if ($this->PrintBy->Required) {
            if (!$this->PrintBy->IsDetailKey && EmptyValue($this->PrintBy->FormValue)) {
                $this->PrintBy->addErrorMessage(str_replace("%s", $this->PrintBy->caption(), $this->PrintBy->RequiredErrorMessage));
            }
        }
        if ($this->PrintDate->Required) {
            if (!$this->PrintDate->IsDetailKey && EmptyValue($this->PrintDate->FormValue)) {
                $this->PrintDate->addErrorMessage(str_replace("%s", $this->PrintDate->caption(), $this->PrintDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->PrintDate->FormValue)) {
            $this->PrintDate->addErrorMessage($this->PrintDate->getErrorMessage(false));
        }
        if ($this->BillingDate->Required) {
            if (!$this->BillingDate->IsDetailKey && EmptyValue($this->BillingDate->FormValue)) {
                $this->BillingDate->addErrorMessage(str_replace("%s", $this->BillingDate->caption(), $this->BillingDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillingDate->FormValue)) {
            $this->BillingDate->addErrorMessage($this->BillingDate->getErrorMessage(false));
        }
        if ($this->BilledBy->Required) {
            if (!$this->BilledBy->IsDetailKey && EmptyValue($this->BilledBy->FormValue)) {
                $this->BilledBy->addErrorMessage(str_replace("%s", $this->BilledBy->caption(), $this->BilledBy->RequiredErrorMessage));
            }
        }
        if ($this->Resulted->Required) {
            if (!$this->Resulted->IsDetailKey && EmptyValue($this->Resulted->FormValue)) {
                $this->Resulted->addErrorMessage(str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
            }
        }
        if ($this->ResultDate->Required) {
            if (!$this->ResultDate->IsDetailKey && EmptyValue($this->ResultDate->FormValue)) {
                $this->ResultDate->addErrorMessage(str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultDate->FormValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if ($this->ResultedBy->Required) {
            if (!$this->ResultedBy->IsDetailKey && EmptyValue($this->ResultedBy->FormValue)) {
                $this->ResultedBy->addErrorMessage(str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
            }
        }
        if ($this->SampleDate->Required) {
            if (!$this->SampleDate->IsDetailKey && EmptyValue($this->SampleDate->FormValue)) {
                $this->SampleDate->addErrorMessage(str_replace("%s", $this->SampleDate->caption(), $this->SampleDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SampleDate->FormValue)) {
            $this->SampleDate->addErrorMessage($this->SampleDate->getErrorMessage(false));
        }
        if ($this->SampleUser->Required) {
            if (!$this->SampleUser->IsDetailKey && EmptyValue($this->SampleUser->FormValue)) {
                $this->SampleUser->addErrorMessage(str_replace("%s", $this->SampleUser->caption(), $this->SampleUser->RequiredErrorMessage));
            }
        }
        if ($this->Sampled->Required) {
            if (!$this->Sampled->IsDetailKey && EmptyValue($this->Sampled->FormValue)) {
                $this->Sampled->addErrorMessage(str_replace("%s", $this->Sampled->caption(), $this->Sampled->RequiredErrorMessage));
            }
        }
        if ($this->ReceivedDate->Required) {
            if (!$this->ReceivedDate->IsDetailKey && EmptyValue($this->ReceivedDate->FormValue)) {
                $this->ReceivedDate->addErrorMessage(str_replace("%s", $this->ReceivedDate->caption(), $this->ReceivedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ReceivedDate->FormValue)) {
            $this->ReceivedDate->addErrorMessage($this->ReceivedDate->getErrorMessage(false));
        }
        if ($this->ReceivedUser->Required) {
            if (!$this->ReceivedUser->IsDetailKey && EmptyValue($this->ReceivedUser->FormValue)) {
                $this->ReceivedUser->addErrorMessage(str_replace("%s", $this->ReceivedUser->caption(), $this->ReceivedUser->RequiredErrorMessage));
            }
        }
        if ($this->Recevied->Required) {
            if (!$this->Recevied->IsDetailKey && EmptyValue($this->Recevied->FormValue)) {
                $this->Recevied->addErrorMessage(str_replace("%s", $this->Recevied->caption(), $this->Recevied->RequiredErrorMessage));
            }
        }
        if ($this->DeptRecvDate->Required) {
            if (!$this->DeptRecvDate->IsDetailKey && EmptyValue($this->DeptRecvDate->FormValue)) {
                $this->DeptRecvDate->addErrorMessage(str_replace("%s", $this->DeptRecvDate->caption(), $this->DeptRecvDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DeptRecvDate->FormValue)) {
            $this->DeptRecvDate->addErrorMessage($this->DeptRecvDate->getErrorMessage(false));
        }
        if ($this->DeptRecvUser->Required) {
            if (!$this->DeptRecvUser->IsDetailKey && EmptyValue($this->DeptRecvUser->FormValue)) {
                $this->DeptRecvUser->addErrorMessage(str_replace("%s", $this->DeptRecvUser->caption(), $this->DeptRecvUser->RequiredErrorMessage));
            }
        }
        if ($this->DeptRecived->Required) {
            if (!$this->DeptRecived->IsDetailKey && EmptyValue($this->DeptRecived->FormValue)) {
                $this->DeptRecived->addErrorMessage(str_replace("%s", $this->DeptRecived->caption(), $this->DeptRecived->RequiredErrorMessage));
            }
        }
        if ($this->SAuthDate->Required) {
            if (!$this->SAuthDate->IsDetailKey && EmptyValue($this->SAuthDate->FormValue)) {
                $this->SAuthDate->addErrorMessage(str_replace("%s", $this->SAuthDate->caption(), $this->SAuthDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SAuthDate->FormValue)) {
            $this->SAuthDate->addErrorMessage($this->SAuthDate->getErrorMessage(false));
        }
        if ($this->SAuthBy->Required) {
            if (!$this->SAuthBy->IsDetailKey && EmptyValue($this->SAuthBy->FormValue)) {
                $this->SAuthBy->addErrorMessage(str_replace("%s", $this->SAuthBy->caption(), $this->SAuthBy->RequiredErrorMessage));
            }
        }
        if ($this->SAuthendicate->Required) {
            if (!$this->SAuthendicate->IsDetailKey && EmptyValue($this->SAuthendicate->FormValue)) {
                $this->SAuthendicate->addErrorMessage(str_replace("%s", $this->SAuthendicate->caption(), $this->SAuthendicate->RequiredErrorMessage));
            }
        }
        if ($this->AuthDate->Required) {
            if (!$this->AuthDate->IsDetailKey && EmptyValue($this->AuthDate->FormValue)) {
                $this->AuthDate->addErrorMessage(str_replace("%s", $this->AuthDate->caption(), $this->AuthDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->AuthDate->FormValue)) {
            $this->AuthDate->addErrorMessage($this->AuthDate->getErrorMessage(false));
        }
        if ($this->AuthBy->Required) {
            if (!$this->AuthBy->IsDetailKey && EmptyValue($this->AuthBy->FormValue)) {
                $this->AuthBy->addErrorMessage(str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
            }
        }
        if ($this->Authencate->Required) {
            if (!$this->Authencate->IsDetailKey && EmptyValue($this->Authencate->FormValue)) {
                $this->Authencate->addErrorMessage(str_replace("%s", $this->Authencate->caption(), $this->Authencate->RequiredErrorMessage));
            }
        }
        if ($this->EditDate->Required) {
            if (!$this->EditDate->IsDetailKey && EmptyValue($this->EditDate->FormValue)) {
                $this->EditDate->addErrorMessage(str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EditDate->FormValue)) {
            $this->EditDate->addErrorMessage($this->EditDate->getErrorMessage(false));
        }
        if ($this->EditBy->Required) {
            if (!$this->EditBy->IsDetailKey && EmptyValue($this->EditBy->FormValue)) {
                $this->EditBy->addErrorMessage(str_replace("%s", $this->EditBy->caption(), $this->EditBy->RequiredErrorMessage));
            }
        }
        if ($this->Editted->Required) {
            if (!$this->Editted->IsDetailKey && EmptyValue($this->Editted->FormValue)) {
                $this->Editted->addErrorMessage(str_replace("%s", $this->Editted->caption(), $this->Editted->RequiredErrorMessage));
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
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->Mobile->Required) {
            if (!$this->Mobile->IsDetailKey && EmptyValue($this->Mobile->FormValue)) {
                $this->Mobile->addErrorMessage(str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
            }
        }
        if ($this->CId->Required) {
            if (!$this->CId->IsDetailKey && EmptyValue($this->CId->FormValue)) {
                $this->CId->addErrorMessage(str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CId->FormValue)) {
            $this->CId->addErrorMessage($this->CId->getErrorMessage(false));
        }
        if ($this->Order->Required) {
            if (!$this->Order->IsDetailKey && EmptyValue($this->Order->FormValue)) {
                $this->Order->addErrorMessage(str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Order->FormValue)) {
            $this->Order->addErrorMessage($this->Order->getErrorMessage(false));
        }
        if ($this->ResType->Required) {
            if (!$this->ResType->IsDetailKey && EmptyValue($this->ResType->FormValue)) {
                $this->ResType->addErrorMessage(str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
            }
        }
        if ($this->Sample->Required) {
            if (!$this->Sample->IsDetailKey && EmptyValue($this->Sample->FormValue)) {
                $this->Sample->addErrorMessage(str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
            }
        }
        if ($this->NoD->Required) {
            if (!$this->NoD->IsDetailKey && EmptyValue($this->NoD->FormValue)) {
                $this->NoD->addErrorMessage(str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NoD->FormValue)) {
            $this->NoD->addErrorMessage($this->NoD->getErrorMessage(false));
        }
        if ($this->BillOrder->Required) {
            if (!$this->BillOrder->IsDetailKey && EmptyValue($this->BillOrder->FormValue)) {
                $this->BillOrder->addErrorMessage(str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillOrder->FormValue)) {
            $this->BillOrder->addErrorMessage($this->BillOrder->getErrorMessage(false));
        }
        if ($this->Inactive->Required) {
            if (!$this->Inactive->IsDetailKey && EmptyValue($this->Inactive->FormValue)) {
                $this->Inactive->addErrorMessage(str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
            }
        }
        if ($this->CollSample->Required) {
            if (!$this->CollSample->IsDetailKey && EmptyValue($this->CollSample->FormValue)) {
                $this->CollSample->addErrorMessage(str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
            }
        }
        if ($this->TestType->Required) {
            if (!$this->TestType->IsDetailKey && EmptyValue($this->TestType->FormValue)) {
                $this->TestType->addErrorMessage(str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
            }
        }
        if ($this->Repeated->Required) {
            if (!$this->Repeated->IsDetailKey && EmptyValue($this->Repeated->FormValue)) {
                $this->Repeated->addErrorMessage(str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
            }
        }
        if ($this->RepeatedBy->Required) {
            if (!$this->RepeatedBy->IsDetailKey && EmptyValue($this->RepeatedBy->FormValue)) {
                $this->RepeatedBy->addErrorMessage(str_replace("%s", $this->RepeatedBy->caption(), $this->RepeatedBy->RequiredErrorMessage));
            }
        }
        if ($this->RepeatedDate->Required) {
            if (!$this->RepeatedDate->IsDetailKey && EmptyValue($this->RepeatedDate->FormValue)) {
                $this->RepeatedDate->addErrorMessage(str_replace("%s", $this->RepeatedDate->caption(), $this->RepeatedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->RepeatedDate->FormValue)) {
            $this->RepeatedDate->addErrorMessage($this->RepeatedDate->getErrorMessage(false));
        }
        if ($this->serviceID->Required) {
            if (!$this->serviceID->IsDetailKey && EmptyValue($this->serviceID->FormValue)) {
                $this->serviceID->addErrorMessage(str_replace("%s", $this->serviceID->caption(), $this->serviceID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->serviceID->FormValue)) {
            $this->serviceID->addErrorMessage($this->serviceID->getErrorMessage(false));
        }
        if ($this->Service_Type->Required) {
            if (!$this->Service_Type->IsDetailKey && EmptyValue($this->Service_Type->FormValue)) {
                $this->Service_Type->addErrorMessage(str_replace("%s", $this->Service_Type->caption(), $this->Service_Type->RequiredErrorMessage));
            }
        }
        if ($this->Service_Department->Required) {
            if (!$this->Service_Department->IsDetailKey && EmptyValue($this->Service_Department->FormValue)) {
                $this->Service_Department->addErrorMessage(str_replace("%s", $this->Service_Department->caption(), $this->Service_Department->RequiredErrorMessage));
            }
        }
        if ($this->RequestNo->Required) {
            if (!$this->RequestNo->IsDetailKey && EmptyValue($this->RequestNo->FormValue)) {
                $this->RequestNo->addErrorMessage(str_replace("%s", $this->RequestNo->caption(), $this->RequestNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RequestNo->FormValue)) {
            $this->RequestNo->addErrorMessage($this->RequestNo->getErrorMessage(false));
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

            // Services
            $this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", $this->Services->ReadOnly);

            // Unit
            $this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, null, $this->Unit->ReadOnly);

            // amount
            $this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, $this->amount->ReadOnly);

            // Quantity
            $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, $this->Quantity->ReadOnly);

            // DiscountCategory
            $this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, null, $this->DiscountCategory->ReadOnly);

            // Discount
            $this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, null, $this->Discount->ReadOnly);

            // SubTotal
            $this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, null, $this->SubTotal->ReadOnly);

            // DrSharePres
            $this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, null, $this->DrSharePres->ReadOnly);

            // HospSharePres
            $this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, null, $this->HospSharePres->ReadOnly);

            // DrShareAmount
            $this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, null, $this->DrShareAmount->ReadOnly);

            // HospShareAmount
            $this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, null, $this->HospShareAmount->ReadOnly);

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, null, $this->DrShareSettiledAmount->ReadOnly);

            // DrShareSettledId
            $this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, null, $this->DrShareSettledId->ReadOnly);

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, null, $this->DrShareSettiledStatus->ReadOnly);

            // invoiceId
            $this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, null, $this->invoiceId->ReadOnly);

            // invoiceAmount
            $this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, null, $this->invoiceAmount->ReadOnly);

            // invoiceStatus
            $this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, null, $this->invoiceStatus->ReadOnly);

            // modeOfPayment
            $this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, null, $this->modeOfPayment->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // RIDNO
            $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, $this->RIDNO->ReadOnly);

            // ItemCode
            $this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, null, $this->ItemCode->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // sid
            $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, $this->sid->ReadOnly);

            // TestSubCd
            $this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, null, $this->TestSubCd->ReadOnly);

            // DEptCd
            $this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, null, $this->DEptCd->ReadOnly);

            // ProfCd
            $this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, null, $this->ProfCd->ReadOnly);

            // Comments
            $this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, null, $this->Comments->ReadOnly);

            // Method
            $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, $this->Method->ReadOnly);

            // Specimen
            $this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, null, $this->Specimen->ReadOnly);

            // Abnormal
            $this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, null, $this->Abnormal->ReadOnly);

            // TestUnit
            $this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, null, $this->TestUnit->ReadOnly);

            // LOWHIGH
            $this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, null, $this->LOWHIGH->ReadOnly);

            // Branch
            $this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, null, $this->Branch->ReadOnly);

            // Dispatch
            $this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, null, $this->Dispatch->ReadOnly);

            // Pic1
            $this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, null, $this->Pic1->ReadOnly);

            // Pic2
            $this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, null, $this->Pic2->ReadOnly);

            // GraphPath
            $this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, null, $this->GraphPath->ReadOnly);

            // MachineCD
            $this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, null, $this->MachineCD->ReadOnly);

            // TestCancel
            $this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, null, $this->TestCancel->ReadOnly);

            // OutSource
            $this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, null, $this->OutSource->ReadOnly);

            // Printed
            $this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, null, $this->Printed->ReadOnly);

            // PrintBy
            $this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, null, $this->PrintBy->ReadOnly);

            // PrintDate
            $this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), null, $this->PrintDate->ReadOnly);

            // BillingDate
            $this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), null, $this->BillingDate->ReadOnly);

            // BilledBy
            $this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, null, $this->BilledBy->ReadOnly);

            // Resulted
            $this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, null, $this->Resulted->ReadOnly);

            // ResultDate
            $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, $this->ResultDate->ReadOnly);

            // ResultedBy
            $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null, $this->ResultedBy->ReadOnly);

            // SampleDate
            $this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), null, $this->SampleDate->ReadOnly);

            // SampleUser
            $this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, null, $this->SampleUser->ReadOnly);

            // Sampled
            $this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, null, $this->Sampled->ReadOnly);

            // ReceivedDate
            $this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), null, $this->ReceivedDate->ReadOnly);

            // ReceivedUser
            $this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, null, $this->ReceivedUser->ReadOnly);

            // Recevied
            $this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, null, $this->Recevied->ReadOnly);

            // DeptRecvDate
            $this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), null, $this->DeptRecvDate->ReadOnly);

            // DeptRecvUser
            $this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, null, $this->DeptRecvUser->ReadOnly);

            // DeptRecived
            $this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, null, $this->DeptRecived->ReadOnly);

            // SAuthDate
            $this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), null, $this->SAuthDate->ReadOnly);

            // SAuthBy
            $this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, null, $this->SAuthBy->ReadOnly);

            // SAuthendicate
            $this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, null, $this->SAuthendicate->ReadOnly);

            // AuthDate
            $this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), null, $this->AuthDate->ReadOnly);

            // AuthBy
            $this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, null, $this->AuthBy->ReadOnly);

            // Authencate
            $this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, null, $this->Authencate->ReadOnly);

            // EditDate
            $this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), null, $this->EditDate->ReadOnly);

            // EditBy
            $this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, null, $this->EditBy->ReadOnly);

            // Editted
            $this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, null, $this->Editted->ReadOnly);

            // PatID
            $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, $this->PatID->ReadOnly);

            // PatientId
            $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, $this->PatientId->ReadOnly);

            // Mobile
            $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, $this->Mobile->ReadOnly);

            // CId
            $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, $this->CId->ReadOnly);

            // Order
            $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, null, $this->Order->ReadOnly);

            // ResType
            $this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, null, $this->ResType->ReadOnly);

            // Sample
            $this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, null, $this->Sample->ReadOnly);

            // NoD
            $this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, null, $this->NoD->ReadOnly);

            // BillOrder
            $this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, null, $this->BillOrder->ReadOnly);

            // Inactive
            $this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, null, $this->Inactive->ReadOnly);

            // CollSample
            $this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, null, $this->CollSample->ReadOnly);

            // Repeated
            $this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, null, $this->Repeated->ReadOnly);

            // RepeatedBy
            $this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, null, $this->RepeatedBy->ReadOnly);

            // RepeatedDate
            $this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), null, $this->RepeatedDate->ReadOnly);

            // serviceID
            $this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, null, $this->serviceID->ReadOnly);

            // Service_Type
            $this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, null, $this->Service_Type->ReadOnly);

            // Service_Department
            $this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, null, $this->Service_Department->ReadOnly);

            // RequestNo
            $this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, null, $this->RequestNo->ReadOnly);

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

    // Load row hash
    protected function loadRowHash()
    {
        $filter = $this->getRecordFilter();

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $row = $conn->fetchAssoc($sql);
        $this->HashValue = $row ? $this->getRowHash($row) : ""; // Get hash value for record
    }

    // Get Row Hash
    public function getRowHash(&$rs)
    {
        if (!$rs) {
            return "";
        }
        $row = ($rs instanceof Recordset) ? $rs->fields : $rs;
        $hash = "";
        $hash .= GetFieldHash($row['Services']); // Services
        $hash .= GetFieldHash($row['Unit']); // Unit
        $hash .= GetFieldHash($row['amount']); // amount
        $hash .= GetFieldHash($row['Quantity']); // Quantity
        $hash .= GetFieldHash($row['DiscountCategory']); // DiscountCategory
        $hash .= GetFieldHash($row['Discount']); // Discount
        $hash .= GetFieldHash($row['SubTotal']); // SubTotal
        $hash .= GetFieldHash($row['DrSharePres']); // DrSharePres
        $hash .= GetFieldHash($row['HospSharePres']); // HospSharePres
        $hash .= GetFieldHash($row['DrShareAmount']); // DrShareAmount
        $hash .= GetFieldHash($row['HospShareAmount']); // HospShareAmount
        $hash .= GetFieldHash($row['DrShareSettiledAmount']); // DrShareSettiledAmount
        $hash .= GetFieldHash($row['DrShareSettledId']); // DrShareSettledId
        $hash .= GetFieldHash($row['DrShareSettiledStatus']); // DrShareSettiledStatus
        $hash .= GetFieldHash($row['invoiceId']); // invoiceId
        $hash .= GetFieldHash($row['invoiceAmount']); // invoiceAmount
        $hash .= GetFieldHash($row['invoiceStatus']); // invoiceStatus
        $hash .= GetFieldHash($row['modeOfPayment']); // modeOfPayment
        $hash .= GetFieldHash($row['HospID']); // HospID
        $hash .= GetFieldHash($row['RIDNO']); // RIDNO
        $hash .= GetFieldHash($row['ItemCode']); // ItemCode
        $hash .= GetFieldHash($row['TidNo']); // TidNo
        $hash .= GetFieldHash($row['sid']); // sid
        $hash .= GetFieldHash($row['TestSubCd']); // TestSubCd
        $hash .= GetFieldHash($row['DEptCd']); // DEptCd
        $hash .= GetFieldHash($row['ProfCd']); // ProfCd
        $hash .= GetFieldHash($row['Comments']); // Comments
        $hash .= GetFieldHash($row['Method']); // Method
        $hash .= GetFieldHash($row['Specimen']); // Specimen
        $hash .= GetFieldHash($row['Abnormal']); // Abnormal
        $hash .= GetFieldHash($row['TestUnit']); // TestUnit
        $hash .= GetFieldHash($row['LOWHIGH']); // LOWHIGH
        $hash .= GetFieldHash($row['Branch']); // Branch
        $hash .= GetFieldHash($row['Dispatch']); // Dispatch
        $hash .= GetFieldHash($row['Pic1']); // Pic1
        $hash .= GetFieldHash($row['Pic2']); // Pic2
        $hash .= GetFieldHash($row['GraphPath']); // GraphPath
        $hash .= GetFieldHash($row['MachineCD']); // MachineCD
        $hash .= GetFieldHash($row['TestCancel']); // TestCancel
        $hash .= GetFieldHash($row['OutSource']); // OutSource
        $hash .= GetFieldHash($row['Printed']); // Printed
        $hash .= GetFieldHash($row['PrintBy']); // PrintBy
        $hash .= GetFieldHash($row['PrintDate']); // PrintDate
        $hash .= GetFieldHash($row['BillingDate']); // BillingDate
        $hash .= GetFieldHash($row['BilledBy']); // BilledBy
        $hash .= GetFieldHash($row['Resulted']); // Resulted
        $hash .= GetFieldHash($row['ResultDate']); // ResultDate
        $hash .= GetFieldHash($row['ResultedBy']); // ResultedBy
        $hash .= GetFieldHash($row['SampleDate']); // SampleDate
        $hash .= GetFieldHash($row['SampleUser']); // SampleUser
        $hash .= GetFieldHash($row['Sampled']); // Sampled
        $hash .= GetFieldHash($row['ReceivedDate']); // ReceivedDate
        $hash .= GetFieldHash($row['ReceivedUser']); // ReceivedUser
        $hash .= GetFieldHash($row['Recevied']); // Recevied
        $hash .= GetFieldHash($row['DeptRecvDate']); // DeptRecvDate
        $hash .= GetFieldHash($row['DeptRecvUser']); // DeptRecvUser
        $hash .= GetFieldHash($row['DeptRecived']); // DeptRecived
        $hash .= GetFieldHash($row['SAuthDate']); // SAuthDate
        $hash .= GetFieldHash($row['SAuthBy']); // SAuthBy
        $hash .= GetFieldHash($row['SAuthendicate']); // SAuthendicate
        $hash .= GetFieldHash($row['AuthDate']); // AuthDate
        $hash .= GetFieldHash($row['AuthBy']); // AuthBy
        $hash .= GetFieldHash($row['Authencate']); // Authencate
        $hash .= GetFieldHash($row['EditDate']); // EditDate
        $hash .= GetFieldHash($row['EditBy']); // EditBy
        $hash .= GetFieldHash($row['Editted']); // Editted
        $hash .= GetFieldHash($row['PatID']); // PatID
        $hash .= GetFieldHash($row['PatientId']); // PatientId
        $hash .= GetFieldHash($row['Mobile']); // Mobile
        $hash .= GetFieldHash($row['CId']); // CId
        $hash .= GetFieldHash($row['Order']); // Order
        $hash .= GetFieldHash($row['ResType']); // ResType
        $hash .= GetFieldHash($row['Sample']); // Sample
        $hash .= GetFieldHash($row['NoD']); // NoD
        $hash .= GetFieldHash($row['BillOrder']); // BillOrder
        $hash .= GetFieldHash($row['Inactive']); // Inactive
        $hash .= GetFieldHash($row['CollSample']); // CollSample
        $hash .= GetFieldHash($row['Repeated']); // Repeated
        $hash .= GetFieldHash($row['RepeatedBy']); // RepeatedBy
        $hash .= GetFieldHash($row['RepeatedDate']); // RepeatedDate
        $hash .= GetFieldHash($row['serviceID']); // serviceID
        $hash .= GetFieldHash($row['Service_Type']); // Service_Type
        $hash .= GetFieldHash($row['Service_Department']); // Service_Department
        $hash .= GetFieldHash($row['RequestNo']); // RequestNo
        return md5($hash);
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // Services
        $this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", false);

        // Unit
        $this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, null, false);

        // amount
        $this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, false);

        // Quantity
        $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, false);

        // DiscountCategory
        $this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, null, false);

        // Discount
        $this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, null, false);

        // SubTotal
        $this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, null, false);

        // description
        $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, false);

        // patient_type
        $this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, null, false);

        // charged_date
        $this->charged_date->setDbValueDef($rsnew, UnFormatDateTime($this->charged_date->CurrentValue, 0), null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

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

        // Aid
        $this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, null, false);

        // Vid
        $this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, null, false);

        // DrID
        $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, false);

        // DrCODE
        $this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, null, false);

        // DrName
        $this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, null, false);

        // Department
        $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, false);

        // DrSharePres
        $this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, null, false);

        // HospSharePres
        $this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, null, false);

        // DrShareAmount
        $this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, null, false);

        // HospShareAmount
        $this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, null, false);

        // DrShareSettiledAmount
        $this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, null, false);

        // DrShareSettledId
        $this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, null, false);

        // DrShareSettiledStatus
        $this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, null, false);

        // invoiceId
        $this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, null, false);

        // invoiceAmount
        $this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, null, false);

        // invoiceStatus
        $this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, null, false);

        // modeOfPayment
        $this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // RIDNO
        $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, false);

        // ItemCode
        $this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // sid
        $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, false);

        // TestSubCd
        $this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, null, false);

        // DEptCd
        $this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, null, false);

        // ProfCd
        $this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, null, false);

        // Comments
        $this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, null, false);

        // Method
        $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, false);

        // Specimen
        $this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, null, false);

        // Abnormal
        $this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, null, false);

        // TestUnit
        $this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, null, false);

        // LOWHIGH
        $this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, null, false);

        // Branch
        $this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, null, false);

        // Dispatch
        $this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, null, false);

        // Pic1
        $this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, null, false);

        // Pic2
        $this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, null, false);

        // GraphPath
        $this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, null, false);

        // MachineCD
        $this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, null, false);

        // TestCancel
        $this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, null, false);

        // OutSource
        $this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, null, false);

        // Printed
        $this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, null, false);

        // PrintBy
        $this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, null, false);

        // PrintDate
        $this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), null, false);

        // BillingDate
        $this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), null, false);

        // BilledBy
        $this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, null, false);

        // Resulted
        $this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, null, false);

        // ResultDate
        $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, false);

        // ResultedBy
        $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null, false);

        // SampleDate
        $this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), null, false);

        // SampleUser
        $this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, null, false);

        // Sampled
        $this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, null, false);

        // ReceivedDate
        $this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), null, false);

        // ReceivedUser
        $this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, null, false);

        // Recevied
        $this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, null, false);

        // DeptRecvDate
        $this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), null, false);

        // DeptRecvUser
        $this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, null, false);

        // DeptRecived
        $this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, null, false);

        // SAuthDate
        $this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), null, false);

        // SAuthBy
        $this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, null, false);

        // SAuthendicate
        $this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, null, false);

        // AuthDate
        $this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), null, false);

        // AuthBy
        $this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, null, false);

        // Authencate
        $this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, null, false);

        // EditDate
        $this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), null, false);

        // EditBy
        $this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, null, false);

        // Editted
        $this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, null, false);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // CId
        $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, false);

        // Order
        $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, null, false);

        // ResType
        $this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, null, false);

        // Sample
        $this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, null, false);

        // NoD
        $this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, null, false);

        // BillOrder
        $this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, null, false);

        // Inactive
        $this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, null, false);

        // CollSample
        $this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, null, false);

        // TestType
        $this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, null, strval($this->TestType->CurrentValue) == "");

        // Repeated
        $this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, null, false);

        // RepeatedBy
        $this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, null, false);

        // RepeatedDate
        $this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), null, false);

        // serviceID
        $this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, null, false);

        // Service_Type
        $this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, null, false);

        // Service_Department
        $this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, null, false);

        // RequestNo
        $this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, null, strval($this->RequestNo->CurrentValue) == "");

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

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_patient_serviceslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_patient_serviceslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_patient_serviceslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_patient_services" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_patient_services\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_patient_serviceslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = false;

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_patient_serviceslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_billing_voucher") {
            $view_billing_voucher = Container("view_billing_voucher");
            $rsmaster = $view_billing_voucher->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $view_billing_voucher;
                    $view_billing_voucher->exportDocument($doc, new Recordset($rsmaster));
                    $doc->exportEmptyRow();
                    $doc->Table = &$this;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsmaster->closeCursor();
            }
        }

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_billing_voucher_print") {
            $view_billing_voucher_print = Container("view_billing_voucher_print");
            $rsmaster = $view_billing_voucher_print->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $view_billing_voucher_print;
                    $view_billing_voucher_print->exportDocument($doc, new Recordset($rsmaster));
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
            if ($masterTblVar == "view_billing_voucher") {
                $validMaster = true;
                $masterTbl = Container("view_billing_voucher");
                if (($parm = Get("fk_id", Get("Vid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Vid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Vid->setSessionValue($this->Vid->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "view_billing_voucher_print") {
                $validMaster = true;
                $masterTbl = Container("view_billing_voucher_print");
                if (($parm = Get("fk_id", Get("Vid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Vid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Vid->setSessionValue($this->Vid->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
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
            if ($masterTblVar == "view_billing_voucher") {
                $validMaster = true;
                $masterTbl = Container("view_billing_voucher");
                if (($parm = Post("fk_id", Post("Vid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Vid->setFormValue($masterTbl->id->FormValue);
                    $this->Vid->setSessionValue($this->Vid->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "view_billing_voucher_print") {
                $validMaster = true;
                $masterTbl = Container("view_billing_voucher_print");
                if (($parm = Post("fk_id", Post("Vid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Vid->setFormValue($masterTbl->id->FormValue);
                    $this->Vid->setSessionValue($this->Vid->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
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
            if ($masterTblVar != "view_billing_voucher") {
                if ($this->Vid->CurrentValue == "") {
                    $this->Vid->setSessionValue("");
                }
            }
            if ($masterTblVar != "view_billing_voucher_print") {
                if ($this->Vid->CurrentValue == "") {
                    $this->Vid->setSessionValue("");
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
                case "x_Services":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_DiscountCategory":
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
    public function pageLoad() {
    	//echo "Page Load";
    	  $this->Reception->Visible = FALSE;
    		$this->patient_id->Visible = FALSE;
    		$this->mrnno->Visible = FALSE;
    		$this->PatientName->Visible = FALSE;
    		$this->Age->Visible = FALSE;
    		$this->Gender->Visible = FALSE;
    		$this->profilePic->Visible = FALSE;
    		$this->Services->Visible = TRUE;
    		$this->Unit->Visible = FALSE;
    		$this->amount->Visible = TRUE;
    		//$this->Quantity->Visible = FALSE;
    		$this->Discount->Visible = TRUE;
    		$this->SubTotal->Visible = TRUE;
    		$this->description->Visible = FALSE;
    		$this->patient_type->Visible = FALSE;
    		$this->charged_date->Visible = FALSE;
    		$this->status->Visible = FALSE;
    		$this->createdby->Visible = FALSE;
    		$this->createddatetime->Visible = FALSE;
    		$this->modifiedby->Visible = FALSE;
    		$this->modifieddatetime->Visible = FALSE;
    		$this->Aid->Visible = FALSE;
    		$this->Vid->Visible = FALSE;
    		$this->DrID->Visible = FALSE;
    		$this->DrCODE->Visible = FALSE;
    		$this->DrName->Visible = FALSE;
    		$this->Department->Visible = FALSE;
    		$this->DrSharePres->Visible = FALSE;
    		$this->HospSharePres->Visible = FALSE;
    		$this->DrShareAmount->Visible = FALSE;
    		$this->HospShareAmount->Visible = FALSE;
    		$this->DrShareSettiledAmount->Visible = FALSE;
    		$this->DrShareSettledId->Visible = FALSE;
    		$this->DrShareSettiledStatus->Visible = FALSE;
    		$this->invoiceId->Visible = FALSE;
    		$this->invoiceAmount->Visible = FALSE;
    		$this->invoiceStatus->Visible = FALSE;
    		$this->modeOfPayment->Visible = FALSE;
    		$this->HospID->Visible = FALSE;
    		$this->RIDNO->Visible = FALSE;
    		$this->TidNo->Visible = FALSE;
    		$this->DiscountCategory->Visible = TRUE;
    		$this->sid->Visible = TRUE;
    	$this->Abnormal->Visible = FALSE;
    $this->AuthBy->Visible = FALSE;
    $this->AuthDate->Visible = FALSE;
    $this->Authencate->Visible = FALSE;
    $this->BilledBy->Visible = FALSE;
    $this->BillingDate->Visible = FALSE;
    $this->Branch->Visible = FALSE;
    $this->Comments->Visible = FALSE;
    $this->DEptCd->Visible = FALSE;
    $this->DeptRecived->Visible = FALSE;
    $this->DeptRecvDate->Visible = FALSE;
    $this->DeptRecvUser->Visible = FALSE;
    $this->Dispatch->Visible = FALSE;
    $this->EditBy->Visible = FALSE;
    $this->EditDate->Visible = FALSE;
    $this->Editted->Visible = FALSE;
    $this->GraphPath->Visible = FALSE;
    $this->LabReport->Visible = FALSE;
    $this->LOWHIGH->Visible = FALSE;
    $this->MachineCD->Visible = FALSE;
    $this->Method->Visible = FALSE;
    $this->OutSource->Visible = FALSE;
    $this->Pic1->Visible = FALSE;
    $this->Pic2->Visible = FALSE;
    $this->PrintBy->Visible = FALSE;
    $this->PrintDate->Visible = FALSE;
    $this->Printed->Visible = FALSE;
    $this->ProfCd->Visible = FALSE;
    $this->ReceivedDate->Visible = FALSE;
    $this->ReceivedUser->Visible = FALSE;
    $this->Recevied->Visible = FALSE;
    $this->RefValue->Visible = FALSE;
    $this->ResultDate->Visible = FALSE;
    $this->Resulted->Visible = FALSE;
    $this->ResultedBy->Visible = FALSE;
    $this->Sampled->Visible = FALSE;
    $this->SampleDate->Visible = FALSE;
    $this->SampleUser->Visible = FALSE;
    $this->SAuthBy->Visible = FALSE;
    $this->SAuthDate->Visible = FALSE;
    $this->SAuthendicate->Visible = FALSE;
    $this->Specimen->Visible = FALSE;
    $this->TestCancel->Visible = FALSE;
    $this->TestSubCd->Visible = FALSE;
    $this->TestUnit->Visible = FALSE;
     $this->PatID->Visible = FALSE;
     $this->PatientId->Visible = FALSE;
     $this->Mobile->Visible = FALSE;
     $this->CId->Visible = FALSE;
     $this->Order->Visible = FALSE;
     $this->Form->Visible = FALSE;
     $this->ResType->Visible = FALSE;
     $this->Sample->Visible = FALSE;
     $this->NoD->Visible = FALSE;
     $this->BillOrder->Visible = FALSE;
     $this->Formula->Visible = FALSE;
     $this->Inactive->Visible = FALSE;
     $this->CollSample->Visible = FALSE;
     $this->TestType->Visible = FALSE;
      $this->Repeated->Visible = FALSE;
      $this->RepeatedBy->Visible = FALSE;
      $this->RepeatedDate->Visible = FALSE;
      $this->serviceID->Visible = FALSE;
      $this->Service_Type->Visible = FALSE;
      $this->Service_Department->Visible = FALSE;
      $this->RequestNo->Visible = FALSE;
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
