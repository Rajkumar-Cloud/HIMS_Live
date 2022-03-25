<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOvumPickUpChartView extends IvfOvumPickUpChart
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_ovum_pick_up_chart';

    // Page object name
    public $PageObjName = "IvfOvumPickUpChartView";

    // Rendering View
    public $RenderingView = false;

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

        // Table object (ivf_ovum_pick_up_chart)
        if (!isset($GLOBALS["ivf_ovum_pick_up_chart"]) || get_class($GLOBALS["ivf_ovum_pick_up_chart"]) == PROJECT_NAMESPACE . "ivf_ovum_pick_up_chart") {
            $GLOBALS["ivf_ovum_pick_up_chart"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        if (($keyValue = Get("id") ?? Route("id")) !== null) {
            $this->RecKey["id"] = $keyValue;
        }
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_ovum_pick_up_chart');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
                $doc = new $class(Container("ivf_ovum_pick_up_chart"));
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

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "IvfOvumPickUpChartView") {
                        $row["view"] = "1";
                    }
                } else { // List page should not be shown as modal => error
                    $row["error"] = $this->getFailureMessage();
                    $this->clearFailureMessage();
                }
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
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
    public $ExportOptions; // Export options
    public $OtherOptions; // Other options
    public $DisplayRecords = 1;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecKey = [];
    public $IsModal = false;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $SkipHeaderFooter;

        // Is modal
        $this->IsModal = Param("modal") == "1";

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
        if (Get("id") !== null) {
            if ($ExportFileName != "") {
                $ExportFileName .= "_";
            }
            $ExportFileName .= Get("id");
        }

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

        // Setup export options
        $this->setupExportOptions();
        $this->id->setVisibility();
        $this->RIDNo->setVisibility();
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->Consultant->setVisibility();
        $this->TotalDoseOfStimulation->setVisibility();
        $this->Protocol->setVisibility();
        $this->NumberOfDaysOfStimulation->setVisibility();
        $this->TriggerDateTime->setVisibility();
        $this->OPUDateTime->setVisibility();
        $this->HoursAfterTrigger->setVisibility();
        $this->SerumE2->setVisibility();
        $this->SerumP4->setVisibility();
        $this->FORT->setVisibility();
        $this->ExperctedOocytes->setVisibility();
        $this->NoOfOocytesRetrieved->setVisibility();
        $this->OocytesRetreivalRate->setVisibility();
        $this->Anesthesia->setVisibility();
        $this->TrialCannulation->setVisibility();
        $this->UCL->setVisibility();
        $this->Angle->setVisibility();
        $this->EMS->setVisibility();
        $this->Cannulation->setVisibility();
        $this->ProcedureT->setVisibility();
        $this->NoOfOocytesRetrievedd->setVisibility();
        $this->CourseInHospital->setVisibility();
        $this->DischargeAdvise->setVisibility();
        $this->FollowUpAdvise->setVisibility();
        $this->PlanT->setVisibility();
        $this->ReviewDate->setVisibility();
        $this->ReviewDoctor->setVisibility();
        $this->TemplateProcedure->setVisibility();
        $this->TemplateCourseInHospital->setVisibility();
        $this->TemplateDischargeAdvise->setVisibility();
        $this->TemplateFollowUpAdvise->setVisibility();
        $this->TidNo->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->TemplateProcedure);
        $this->setupLookupOptions($this->TemplateCourseInHospital);
        $this->setupLookupOptions($this->TemplateDischargeAdvise);
        $this->setupLookupOptions($this->TemplateFollowUpAdvise);

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }

        // Load current record
        $loadCurrentRecord = false;
        $returnUrl = "";
        $matchRecord = false;
        if ($this->isPageRequest()) { // Validate request
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->RecKey["id"] = $this->id->QueryStringValue;
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->RecKey["id"] = $this->id->FormValue;
            } elseif (IsApi() && ($keyValue = Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->RecKey["id"] = $this->id->QueryStringValue;
            } else {
                $returnUrl = "IvfOvumPickUpChartList"; // Return to list
            }

            // Get action
            $this->CurrentAction = "show"; // Display
            switch ($this->CurrentAction) {
                case "show": // Get a record to display

                    // Load record based on key
                    if (IsApi()) {
                        $filter = $this->getRecordFilter();
                        $this->CurrentFilter = $filter;
                        $sql = $this->getCurrentSql();
                        $conn = $this->getConnection();
                        $this->Recordset = LoadRecordset($sql, $conn);
                        $res = $this->Recordset && !$this->Recordset->EOF;
                    } else {
                        $res = $this->loadRow();
                    }
                    if (!$res) { // Load record based on key
                        if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "") {
                            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                        }
                        $returnUrl = "IvfOvumPickUpChartList"; // No matching record, return to list
                    }
                    break;
            }

            // Export data only
            if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
                $this->exportData();
                $this->terminate();
                return;
            }
        } else {
            $returnUrl = "IvfOvumPickUpChartList"; // Not page request, return to list
        }
        if ($returnUrl != "") {
            $this->terminate($returnUrl);
            return;
        }

        // Set up Breadcrumb
        if (!$this->isExport()) {
            $this->setupBreadcrumb();
        }

        // Render row
        $this->RowType = ROWTYPE_VIEW;
        $this->resetAttributes();
        $this->renderRow();

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset, true); // Get current record only
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows]);
            $this->terminate(true);
            return;
        }

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

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->AddUrl)) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
        }
        $item->Visible = ($this->AddUrl != "" && $Security->canAdd());

        // Edit
        $item = &$option->add("edit");
        $editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->EditUrl)) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        }
        $item->Visible = ($this->EditUrl != "" && $Security->canEdit());

        // Copy
        $item = &$option->add("copy");
        $copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode(GetUrl($this->CopyUrl)) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        }
        $item->Visible = ($this->CopyUrl != "" && $Security->canAdd());

        // Delete
        $item = &$option->add("delete");
        if ($this->IsModal) { // Handle as inline delete
            $item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery(GetUrl($this->DeleteUrl), "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        }
        $item->Visible = ($this->DeleteUrl != "" && $Security->canDelete());

        // Set up action default
        $option = $options["action"];
        $option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
        $option->UseDropDownButton = false;
        $option->UseButtonGroup = true;
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->TotalDoseOfStimulation->setDbValue($row['TotalDoseOfStimulation']);
        $this->Protocol->setDbValue($row['Protocol']);
        $this->NumberOfDaysOfStimulation->setDbValue($row['NumberOfDaysOfStimulation']);
        $this->TriggerDateTime->setDbValue($row['TriggerDateTime']);
        $this->OPUDateTime->setDbValue($row['OPUDateTime']);
        $this->HoursAfterTrigger->setDbValue($row['HoursAfterTrigger']);
        $this->SerumE2->setDbValue($row['SerumE2']);
        $this->SerumP4->setDbValue($row['SerumP4']);
        $this->FORT->setDbValue($row['FORT']);
        $this->ExperctedOocytes->setDbValue($row['ExperctedOocytes']);
        $this->NoOfOocytesRetrieved->setDbValue($row['NoOfOocytesRetrieved']);
        $this->OocytesRetreivalRate->setDbValue($row['OocytesRetreivalRate']);
        $this->Anesthesia->setDbValue($row['Anesthesia']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->UCL->setDbValue($row['UCL']);
        $this->Angle->setDbValue($row['Angle']);
        $this->EMS->setDbValue($row['EMS']);
        $this->Cannulation->setDbValue($row['Cannulation']);
        $this->ProcedureT->setDbValue($row['ProcedureT']);
        $this->NoOfOocytesRetrievedd->setDbValue($row['NoOfOocytesRetrievedd']);
        $this->CourseInHospital->setDbValue($row['CourseInHospital']);
        $this->DischargeAdvise->setDbValue($row['DischargeAdvise']);
        $this->FollowUpAdvise->setDbValue($row['FollowUpAdvise']);
        $this->PlanT->setDbValue($row['PlanT']);
        $this->ReviewDate->setDbValue($row['ReviewDate']);
        $this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
        $this->TemplateProcedure->setDbValue($row['TemplateProcedure']);
        $this->TemplateCourseInHospital->setDbValue($row['TemplateCourseInHospital']);
        $this->TemplateDischargeAdvise->setDbValue($row['TemplateDischargeAdvise']);
        $this->TemplateFollowUpAdvise->setDbValue($row['TemplateFollowUpAdvise']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['Consultant'] = null;
        $row['TotalDoseOfStimulation'] = null;
        $row['Protocol'] = null;
        $row['NumberOfDaysOfStimulation'] = null;
        $row['TriggerDateTime'] = null;
        $row['OPUDateTime'] = null;
        $row['HoursAfterTrigger'] = null;
        $row['SerumE2'] = null;
        $row['SerumP4'] = null;
        $row['FORT'] = null;
        $row['ExperctedOocytes'] = null;
        $row['NoOfOocytesRetrieved'] = null;
        $row['OocytesRetreivalRate'] = null;
        $row['Anesthesia'] = null;
        $row['TrialCannulation'] = null;
        $row['UCL'] = null;
        $row['Angle'] = null;
        $row['EMS'] = null;
        $row['Cannulation'] = null;
        $row['ProcedureT'] = null;
        $row['NoOfOocytesRetrievedd'] = null;
        $row['CourseInHospital'] = null;
        $row['DischargeAdvise'] = null;
        $row['FollowUpAdvise'] = null;
        $row['PlanT'] = null;
        $row['ReviewDate'] = null;
        $row['ReviewDoctor'] = null;
        $row['TemplateProcedure'] = null;
        $row['TemplateCourseInHospital'] = null;
        $row['TemplateDischargeAdvise'] = null;
        $row['TemplateFollowUpAdvise'] = null;
        $row['TidNo'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs
        $this->AddUrl = $this->getAddUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();
        $this->ListUrl = $this->getListUrl();
        $this->setupOtherOptions();

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // RIDNo

        // Name

        // ARTCycle

        // Consultant

        // TotalDoseOfStimulation

        // Protocol

        // NumberOfDaysOfStimulation

        // TriggerDateTime

        // OPUDateTime

        // HoursAfterTrigger

        // SerumE2

        // SerumP4

        // FORT

        // ExperctedOocytes

        // NoOfOocytesRetrieved

        // OocytesRetreivalRate

        // Anesthesia

        // TrialCannulation

        // UCL

        // Angle

        // EMS

        // Cannulation

        // ProcedureT

        // NoOfOocytesRetrievedd

        // CourseInHospital

        // DischargeAdvise

        // FollowUpAdvise

        // PlanT

        // ReviewDate

        // ReviewDoctor

        // TemplateProcedure

        // TemplateCourseInHospital

        // TemplateDischargeAdvise

        // TemplateFollowUpAdvise

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
            $this->ARTCycle->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // TotalDoseOfStimulation
            $this->TotalDoseOfStimulation->ViewValue = $this->TotalDoseOfStimulation->CurrentValue;
            $this->TotalDoseOfStimulation->ViewCustomAttributes = "";

            // Protocol
            if (strval($this->Protocol->CurrentValue) != "") {
                $this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
            } else {
                $this->Protocol->ViewValue = null;
            }
            $this->Protocol->ViewCustomAttributes = "";

            // NumberOfDaysOfStimulation
            $this->NumberOfDaysOfStimulation->ViewValue = $this->NumberOfDaysOfStimulation->CurrentValue;
            $this->NumberOfDaysOfStimulation->ViewCustomAttributes = "";

            // TriggerDateTime
            $this->TriggerDateTime->ViewValue = $this->TriggerDateTime->CurrentValue;
            $this->TriggerDateTime->ViewValue = FormatDateTime($this->TriggerDateTime->ViewValue, 0);
            $this->TriggerDateTime->ViewCustomAttributes = "";

            // OPUDateTime
            $this->OPUDateTime->ViewValue = $this->OPUDateTime->CurrentValue;
            $this->OPUDateTime->ViewValue = FormatDateTime($this->OPUDateTime->ViewValue, 0);
            $this->OPUDateTime->ViewCustomAttributes = "";

            // HoursAfterTrigger
            $this->HoursAfterTrigger->ViewValue = $this->HoursAfterTrigger->CurrentValue;
            $this->HoursAfterTrigger->ViewCustomAttributes = "";

            // SerumE2
            $this->SerumE2->ViewValue = $this->SerumE2->CurrentValue;
            $this->SerumE2->ViewCustomAttributes = "";

            // SerumP4
            $this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
            $this->SerumP4->ViewCustomAttributes = "";

            // FORT
            $this->FORT->ViewValue = $this->FORT->CurrentValue;
            $this->FORT->ViewCustomAttributes = "";

            // ExperctedOocytes
            $this->ExperctedOocytes->ViewValue = $this->ExperctedOocytes->CurrentValue;
            $this->ExperctedOocytes->ViewCustomAttributes = "";

            // NoOfOocytesRetrieved
            $this->NoOfOocytesRetrieved->ViewValue = $this->NoOfOocytesRetrieved->CurrentValue;
            $this->NoOfOocytesRetrieved->ViewCustomAttributes = "";

            // OocytesRetreivalRate
            $this->OocytesRetreivalRate->ViewValue = $this->OocytesRetreivalRate->CurrentValue;
            $this->OocytesRetreivalRate->ViewCustomAttributes = "";

            // Anesthesia
            $this->Anesthesia->ViewValue = $this->Anesthesia->CurrentValue;
            $this->Anesthesia->ViewCustomAttributes = "";

            // TrialCannulation
            $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
            $this->TrialCannulation->ViewCustomAttributes = "";

            // UCL
            $this->UCL->ViewValue = $this->UCL->CurrentValue;
            $this->UCL->ViewCustomAttributes = "";

            // Angle
            $this->Angle->ViewValue = $this->Angle->CurrentValue;
            $this->Angle->ViewCustomAttributes = "";

            // EMS
            $this->EMS->ViewValue = $this->EMS->CurrentValue;
            $this->EMS->ViewCustomAttributes = "";

            // Cannulation
            if (strval($this->Cannulation->CurrentValue) != "") {
                $this->Cannulation->ViewValue = $this->Cannulation->optionCaption($this->Cannulation->CurrentValue);
            } else {
                $this->Cannulation->ViewValue = null;
            }
            $this->Cannulation->ViewCustomAttributes = "";

            // ProcedureT
            $this->ProcedureT->ViewValue = $this->ProcedureT->CurrentValue;
            $this->ProcedureT->ViewCustomAttributes = "";

            // NoOfOocytesRetrievedd
            $this->NoOfOocytesRetrievedd->ViewValue = $this->NoOfOocytesRetrievedd->CurrentValue;
            $this->NoOfOocytesRetrievedd->ViewCustomAttributes = "";

            // CourseInHospital
            $this->CourseInHospital->ViewValue = $this->CourseInHospital->CurrentValue;
            $this->CourseInHospital->ViewCustomAttributes = "";

            // DischargeAdvise
            $this->DischargeAdvise->ViewValue = $this->DischargeAdvise->CurrentValue;
            $this->DischargeAdvise->ViewCustomAttributes = "";

            // FollowUpAdvise
            $this->FollowUpAdvise->ViewValue = $this->FollowUpAdvise->CurrentValue;
            $this->FollowUpAdvise->ViewCustomAttributes = "";

            // PlanT
            if (strval($this->PlanT->CurrentValue) != "") {
                $this->PlanT->ViewValue = $this->PlanT->optionCaption($this->PlanT->CurrentValue);
            } else {
                $this->PlanT->ViewValue = null;
            }
            $this->PlanT->ViewCustomAttributes = "";

            // ReviewDate
            $this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
            $this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
            $this->ReviewDate->ViewCustomAttributes = "";

            // ReviewDoctor
            $this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
            $this->ReviewDoctor->ViewCustomAttributes = "";

            // TemplateProcedure
            $curVal = trim(strval($this->TemplateProcedure->CurrentValue));
            if ($curVal != "") {
                $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->lookupCacheOption($curVal);
                if ($this->TemplateProcedure->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Procedure'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateProcedure->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateProcedure->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->displayValue($arwrk);
                    } else {
                        $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->CurrentValue;
                    }
                }
            } else {
                $this->TemplateProcedure->ViewValue = null;
            }
            $this->TemplateProcedure->ViewCustomAttributes = "";

            // TemplateCourseInHospital
            $curVal = trim(strval($this->TemplateCourseInHospital->CurrentValue));
            if ($curVal != "") {
                $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->lookupCacheOption($curVal);
                if ($this->TemplateCourseInHospital->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Course In Hospital'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateCourseInHospital->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateCourseInHospital->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->displayValue($arwrk);
                    } else {
                        $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->CurrentValue;
                    }
                }
            } else {
                $this->TemplateCourseInHospital->ViewValue = null;
            }
            $this->TemplateCourseInHospital->ViewCustomAttributes = "";

            // TemplateDischargeAdvise
            $curVal = trim(strval($this->TemplateDischargeAdvise->CurrentValue));
            if ($curVal != "") {
                $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->lookupCacheOption($curVal);
                if ($this->TemplateDischargeAdvise->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Discharge Advise'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateDischargeAdvise->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateDischargeAdvise->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->displayValue($arwrk);
                    } else {
                        $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->CurrentValue;
                    }
                }
            } else {
                $this->TemplateDischargeAdvise->ViewValue = null;
            }
            $this->TemplateDischargeAdvise->ViewCustomAttributes = "";

            // TemplateFollowUpAdvise
            $curVal = trim(strval($this->TemplateFollowUpAdvise->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->lookupCacheOption($curVal);
                if ($this->TemplateFollowUpAdvise->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Follow Up Advise'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateFollowUpAdvise->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateFollowUpAdvise->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->displayValue($arwrk);
                    } else {
                        $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->CurrentValue;
                    }
                }
            } else {
                $this->TemplateFollowUpAdvise->ViewValue = null;
            }
            $this->TemplateFollowUpAdvise->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // TotalDoseOfStimulation
            $this->TotalDoseOfStimulation->LinkCustomAttributes = "";
            $this->TotalDoseOfStimulation->HrefValue = "";
            $this->TotalDoseOfStimulation->TooltipValue = "";

            // Protocol
            $this->Protocol->LinkCustomAttributes = "";
            $this->Protocol->HrefValue = "";
            $this->Protocol->TooltipValue = "";

            // NumberOfDaysOfStimulation
            $this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
            $this->NumberOfDaysOfStimulation->HrefValue = "";
            $this->NumberOfDaysOfStimulation->TooltipValue = "";

            // TriggerDateTime
            $this->TriggerDateTime->LinkCustomAttributes = "";
            $this->TriggerDateTime->HrefValue = "";
            $this->TriggerDateTime->TooltipValue = "";

            // OPUDateTime
            $this->OPUDateTime->LinkCustomAttributes = "";
            $this->OPUDateTime->HrefValue = "";
            $this->OPUDateTime->TooltipValue = "";

            // HoursAfterTrigger
            $this->HoursAfterTrigger->LinkCustomAttributes = "";
            $this->HoursAfterTrigger->HrefValue = "";
            $this->HoursAfterTrigger->TooltipValue = "";

            // SerumE2
            $this->SerumE2->LinkCustomAttributes = "";
            $this->SerumE2->HrefValue = "";
            $this->SerumE2->TooltipValue = "";

            // SerumP4
            $this->SerumP4->LinkCustomAttributes = "";
            $this->SerumP4->HrefValue = "";
            $this->SerumP4->TooltipValue = "";

            // FORT
            $this->FORT->LinkCustomAttributes = "";
            $this->FORT->HrefValue = "";
            $this->FORT->TooltipValue = "";

            // ExperctedOocytes
            $this->ExperctedOocytes->LinkCustomAttributes = "";
            $this->ExperctedOocytes->HrefValue = "";
            $this->ExperctedOocytes->TooltipValue = "";

            // NoOfOocytesRetrieved
            $this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
            $this->NoOfOocytesRetrieved->HrefValue = "";
            $this->NoOfOocytesRetrieved->TooltipValue = "";

            // OocytesRetreivalRate
            $this->OocytesRetreivalRate->LinkCustomAttributes = "";
            $this->OocytesRetreivalRate->HrefValue = "";
            $this->OocytesRetreivalRate->TooltipValue = "";

            // Anesthesia
            $this->Anesthesia->LinkCustomAttributes = "";
            $this->Anesthesia->HrefValue = "";
            $this->Anesthesia->TooltipValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";
            $this->TrialCannulation->TooltipValue = "";

            // UCL
            $this->UCL->LinkCustomAttributes = "";
            $this->UCL->HrefValue = "";
            $this->UCL->TooltipValue = "";

            // Angle
            $this->Angle->LinkCustomAttributes = "";
            $this->Angle->HrefValue = "";
            $this->Angle->TooltipValue = "";

            // EMS
            $this->EMS->LinkCustomAttributes = "";
            $this->EMS->HrefValue = "";
            $this->EMS->TooltipValue = "";

            // Cannulation
            $this->Cannulation->LinkCustomAttributes = "";
            $this->Cannulation->HrefValue = "";
            $this->Cannulation->TooltipValue = "";

            // ProcedureT
            $this->ProcedureT->LinkCustomAttributes = "";
            $this->ProcedureT->HrefValue = "";
            $this->ProcedureT->TooltipValue = "";

            // NoOfOocytesRetrievedd
            $this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
            $this->NoOfOocytesRetrievedd->HrefValue = "";
            $this->NoOfOocytesRetrievedd->TooltipValue = "";

            // CourseInHospital
            $this->CourseInHospital->LinkCustomAttributes = "";
            $this->CourseInHospital->HrefValue = "";
            $this->CourseInHospital->TooltipValue = "";

            // DischargeAdvise
            $this->DischargeAdvise->LinkCustomAttributes = "";
            $this->DischargeAdvise->HrefValue = "";
            $this->DischargeAdvise->TooltipValue = "";

            // FollowUpAdvise
            $this->FollowUpAdvise->LinkCustomAttributes = "";
            $this->FollowUpAdvise->HrefValue = "";
            $this->FollowUpAdvise->TooltipValue = "";

            // PlanT
            $this->PlanT->LinkCustomAttributes = "";
            $this->PlanT->HrefValue = "";
            $this->PlanT->TooltipValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";
            $this->ReviewDate->TooltipValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";
            $this->ReviewDoctor->TooltipValue = "";

            // TemplateProcedure
            $this->TemplateProcedure->LinkCustomAttributes = "";
            $this->TemplateProcedure->HrefValue = "";
            $this->TemplateProcedure->TooltipValue = "";

            // TemplateCourseInHospital
            $this->TemplateCourseInHospital->LinkCustomAttributes = "";
            $this->TemplateCourseInHospital->HrefValue = "";
            $this->TemplateCourseInHospital->TooltipValue = "";

            // TemplateDischargeAdvise
            $this->TemplateDischargeAdvise->LinkCustomAttributes = "";
            $this->TemplateDischargeAdvise->HrefValue = "";
            $this->TemplateDischargeAdvise->TooltipValue = "";

            // TemplateFollowUpAdvise
            $this->TemplateFollowUpAdvise->LinkCustomAttributes = "";
            $this->TemplateFollowUpAdvise->HrefValue = "";
            $this->TemplateFollowUpAdvise->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
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

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_ovum_pick_up_chartview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_ovum_pick_up_chartview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_ovum_pick_up_chartview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_ivf_ovum_pick_up_chart" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_ovum_pick_up_chart\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_ovum_pick_up_chartview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = true;

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

        // Hide options for export
        if ($this->isExport()) {
            $this->ExportOptions->hideAllOptions();
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
        if (!$this->Recordset) {
            $this->Recordset = $this->loadRecordset();
        }
        $rs = &$this->Recordset;
        if ($rs) {
            $this->TotalRecords = $rs->recordCount();
        }
        $this->StartRecord = 1;
        $this->setupStartRecord(); // Set up start record position

        // Set the last record to display
        if ($this->DisplayRecords <= 0) {
            $this->StopRecord = $this->TotalRecords;
        } else {
            $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
        }
        $this->ExportDoc = GetExportDocument($this, "v");
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
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "view");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOvumPickUpChartList"), "", $this->TableVar, true);
        $pageId = "view";
        $Breadcrumb->add("view", $pageId, $url);
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
                case "x_Protocol":
                    break;
                case "x_Cannulation":
                    break;
                case "x_PlanT":
                    break;
                case "x_TemplateProcedure":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Procedure'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateCourseInHospital":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Course In Hospital'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateDischargeAdvise":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Discharge Advise'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFollowUpAdvise":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Follow Up Advise'";
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
}
