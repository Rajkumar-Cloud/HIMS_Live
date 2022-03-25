<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfVitalsHistoryView extends IvfVitalsHistory
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_vitals_history';

    // Page object name
    public $PageObjName = "IvfVitalsHistoryView";

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

        // Table object (ivf_vitals_history)
        if (!isset($GLOBALS["ivf_vitals_history"]) || get_class($GLOBALS["ivf_vitals_history"]) == PROJECT_NAMESPACE . "ivf_vitals_history") {
            $GLOBALS["ivf_vitals_history"] = &$this;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_vitals_history');
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
                $doc = new $class(Container("ivf_vitals_history"));
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
                    if ($pageName == "IvfVitalsHistoryView") {
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->SEX->setVisibility();
        $this->Religion->setVisibility();
        $this->Address->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->DoublewitnessName1->setVisibility();
        $this->DoublewitnessName2->setVisibility();
        $this->Chiefcomplaints->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->MedicalHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->Generalexaminationpallor->setVisibility();
        $this->PR->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Investigations->setVisibility();
        $this->Fheight->setVisibility();
        $this->Fweight->setVisibility();
        $this->FBMI->setVisibility();
        $this->FBloodgroup->setVisibility();
        $this->Mheight->setVisibility();
        $this->Mweight->setVisibility();
        $this->MBMI->setVisibility();
        $this->MBloodgroup->setVisibility();
        $this->FBuild->setVisibility();
        $this->MBuild->setVisibility();
        $this->FSkinColor->setVisibility();
        $this->MSkinColor->setVisibility();
        $this->FEyesColor->setVisibility();
        $this->MEyesColor->setVisibility();
        $this->FHairColor->setVisibility();
        $this->MhairColor->setVisibility();
        $this->FhairTexture->setVisibility();
        $this->MHairTexture->setVisibility();
        $this->Fothers->setVisibility();
        $this->Mothers->setVisibility();
        $this->PGE->setVisibility();
        $this->PPR->setVisibility();
        $this->PBP->setVisibility();
        $this->Breast->setVisibility();
        $this->PPA->setVisibility();
        $this->PPSV->setVisibility();
        $this->PPAPSMEAR->setVisibility();
        $this->PTHYROID->setVisibility();
        $this->MTHYROID->setVisibility();
        $this->SecSexCharacters->setVisibility();
        $this->PenisUM->setVisibility();
        $this->VAS->setVisibility();
        $this->EPIDIDYMIS->setVisibility();
        $this->Varicocele->setVisibility();
        $this->FertilityTreatmentHistory->setVisibility();
        $this->SurgeryHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->PInvestigations->setVisibility();
        $this->Addictions->setVisibility();
        $this->Medications->setVisibility();
        $this->Medical->setVisibility();
        $this->Surgical->setVisibility();
        $this->CoitalHistory->setVisibility();
        $this->SemenAnalysis->setVisibility();
        $this->MInsvestications->setVisibility();
        $this->PImpression->setVisibility();
        $this->MIMpression->setVisibility();
        $this->PPlanOfManagement->setVisibility();
        $this->MPlanOfManagement->setVisibility();
        $this->PReadMore->setVisibility();
        $this->MReadMore->setVisibility();
        $this->MariedFor->setVisibility();
        $this->CMNCM->setVisibility();
        $this->TemplateMenstrualHistory->setVisibility();
        $this->TemplateObstetricHistory->setVisibility();
        $this->TemplateFertilityTreatmentHistory->setVisibility();
        $this->TemplateSurgeryHistory->setVisibility();
        $this->TemplateFInvestigations->setVisibility();
        $this->TemplatePlanOfManagement->setVisibility();
        $this->TemplatePImpression->setVisibility();
        $this->TemplateMedications->setVisibility();
        $this->TemplateSemenAnalysis->setVisibility();
        $this->MaleInsvestications->setVisibility();
        $this->TemplateMIMpression->setVisibility();
        $this->TemplateMalePlanOfManagement->setVisibility();
        $this->TidNo->setVisibility();
        $this->pFamilyHistory->setVisibility();
        $this->pTemplateMedications->setVisibility();
        $this->AntiTPO->setVisibility();
        $this->AntiTG->setVisibility();
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
        $this->setupLookupOptions($this->FBloodgroup);
        $this->setupLookupOptions($this->MBloodgroup);
        $this->setupLookupOptions($this->FamilyHistory);
        $this->setupLookupOptions($this->Surgical);
        $this->setupLookupOptions($this->CoitalHistory);
        $this->setupLookupOptions($this->TemplateMenstrualHistory);
        $this->setupLookupOptions($this->TemplateObstetricHistory);
        $this->setupLookupOptions($this->TemplateFertilityTreatmentHistory);
        $this->setupLookupOptions($this->TemplateSurgeryHistory);
        $this->setupLookupOptions($this->TemplateFInvestigations);
        $this->setupLookupOptions($this->TemplatePlanOfManagement);
        $this->setupLookupOptions($this->TemplatePImpression);
        $this->setupLookupOptions($this->TemplateMedications);
        $this->setupLookupOptions($this->TemplateSemenAnalysis);
        $this->setupLookupOptions($this->MaleInsvestications);
        $this->setupLookupOptions($this->TemplateMIMpression);
        $this->setupLookupOptions($this->TemplateMalePlanOfManagement);
        $this->setupLookupOptions($this->pFamilyHistory);

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
                $returnUrl = "IvfVitalsHistoryList"; // Return to list
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
                        $returnUrl = "IvfVitalsHistoryList"; // No matching record, return to list
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
            $returnUrl = "IvfVitalsHistoryList"; // Not page request, return to list
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Address->setDbValue($row['Address']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->DoublewitnessName1->setDbValue($row['DoublewitnessName1']);
        $this->DoublewitnessName2->setDbValue($row['DoublewitnessName2']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->MedicalHistory->setDbValue($row['MedicalHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->Generalexaminationpallor->setDbValue($row['Generalexaminationpallor']);
        $this->PR->setDbValue($row['PR']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Investigations->setDbValue($row['Investigations']);
        $this->Fheight->setDbValue($row['Fheight']);
        $this->Fweight->setDbValue($row['Fweight']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->FBloodgroup->setDbValue($row['FBloodgroup']);
        $this->Mheight->setDbValue($row['Mheight']);
        $this->Mweight->setDbValue($row['Mweight']);
        $this->MBMI->setDbValue($row['MBMI']);
        $this->MBloodgroup->setDbValue($row['MBloodgroup']);
        $this->FBuild->setDbValue($row['FBuild']);
        $this->MBuild->setDbValue($row['MBuild']);
        $this->FSkinColor->setDbValue($row['FSkinColor']);
        $this->MSkinColor->setDbValue($row['MSkinColor']);
        $this->FEyesColor->setDbValue($row['FEyesColor']);
        $this->MEyesColor->setDbValue($row['MEyesColor']);
        $this->FHairColor->setDbValue($row['FHairColor']);
        $this->MhairColor->setDbValue($row['MhairColor']);
        $this->FhairTexture->setDbValue($row['FhairTexture']);
        $this->MHairTexture->setDbValue($row['MHairTexture']);
        $this->Fothers->setDbValue($row['Fothers']);
        $this->Mothers->setDbValue($row['Mothers']);
        $this->PGE->setDbValue($row['PGE']);
        $this->PPR->setDbValue($row['PPR']);
        $this->PBP->setDbValue($row['PBP']);
        $this->Breast->setDbValue($row['Breast']);
        $this->PPA->setDbValue($row['PPA']);
        $this->PPSV->setDbValue($row['PPSV']);
        $this->PPAPSMEAR->setDbValue($row['PPAPSMEAR']);
        $this->PTHYROID->setDbValue($row['PTHYROID']);
        $this->MTHYROID->setDbValue($row['MTHYROID']);
        $this->SecSexCharacters->setDbValue($row['SecSexCharacters']);
        $this->PenisUM->setDbValue($row['PenisUM']);
        $this->VAS->setDbValue($row['VAS']);
        $this->EPIDIDYMIS->setDbValue($row['EPIDIDYMIS']);
        $this->Varicocele->setDbValue($row['Varicocele']);
        $this->FertilityTreatmentHistory->setDbValue($row['FertilityTreatmentHistory']);
        $this->SurgeryHistory->setDbValue($row['SurgeryHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->PInvestigations->setDbValue($row['PInvestigations']);
        $this->Addictions->setDbValue($row['Addictions']);
        $this->Medications->setDbValue($row['Medications']);
        $this->Medical->setDbValue($row['Medical']);
        $this->Surgical->setDbValue($row['Surgical']);
        $this->CoitalHistory->setDbValue($row['CoitalHistory']);
        $this->SemenAnalysis->setDbValue($row['SemenAnalysis']);
        $this->MInsvestications->setDbValue($row['MInsvestications']);
        $this->PImpression->setDbValue($row['PImpression']);
        $this->MIMpression->setDbValue($row['MIMpression']);
        $this->PPlanOfManagement->setDbValue($row['PPlanOfManagement']);
        $this->MPlanOfManagement->setDbValue($row['MPlanOfManagement']);
        $this->PReadMore->setDbValue($row['PReadMore']);
        $this->MReadMore->setDbValue($row['MReadMore']);
        $this->MariedFor->setDbValue($row['MariedFor']);
        $this->CMNCM->setDbValue($row['CMNCM']);
        $this->TemplateMenstrualHistory->setDbValue($row['TemplateMenstrualHistory']);
        $this->TemplateObstetricHistory->setDbValue($row['TemplateObstetricHistory']);
        $this->TemplateFertilityTreatmentHistory->setDbValue($row['TemplateFertilityTreatmentHistory']);
        $this->TemplateSurgeryHistory->setDbValue($row['TemplateSurgeryHistory']);
        $this->TemplateFInvestigations->setDbValue($row['TemplateFInvestigations']);
        $this->TemplatePlanOfManagement->setDbValue($row['TemplatePlanOfManagement']);
        $this->TemplatePImpression->setDbValue($row['TemplatePImpression']);
        $this->TemplateMedications->setDbValue($row['TemplateMedications']);
        $this->TemplateSemenAnalysis->setDbValue($row['TemplateSemenAnalysis']);
        $this->MaleInsvestications->setDbValue($row['MaleInsvestications']);
        $this->TemplateMIMpression->setDbValue($row['TemplateMIMpression']);
        $this->TemplateMalePlanOfManagement->setDbValue($row['TemplateMalePlanOfManagement']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->pFamilyHistory->setDbValue($row['pFamilyHistory']);
        $this->pTemplateMedications->setDbValue($row['pTemplateMedications']);
        $this->AntiTPO->setDbValue($row['AntiTPO']);
        $this->AntiTG->setDbValue($row['AntiTG']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['SEX'] = null;
        $row['Religion'] = null;
        $row['Address'] = null;
        $row['IdentificationMark'] = null;
        $row['DoublewitnessName1'] = null;
        $row['DoublewitnessName2'] = null;
        $row['Chiefcomplaints'] = null;
        $row['MenstrualHistory'] = null;
        $row['ObstetricHistory'] = null;
        $row['MedicalHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['Generalexaminationpallor'] = null;
        $row['PR'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['PROVISIONALDIAGNOSIS'] = null;
        $row['Investigations'] = null;
        $row['Fheight'] = null;
        $row['Fweight'] = null;
        $row['FBMI'] = null;
        $row['FBloodgroup'] = null;
        $row['Mheight'] = null;
        $row['Mweight'] = null;
        $row['MBMI'] = null;
        $row['MBloodgroup'] = null;
        $row['FBuild'] = null;
        $row['MBuild'] = null;
        $row['FSkinColor'] = null;
        $row['MSkinColor'] = null;
        $row['FEyesColor'] = null;
        $row['MEyesColor'] = null;
        $row['FHairColor'] = null;
        $row['MhairColor'] = null;
        $row['FhairTexture'] = null;
        $row['MHairTexture'] = null;
        $row['Fothers'] = null;
        $row['Mothers'] = null;
        $row['PGE'] = null;
        $row['PPR'] = null;
        $row['PBP'] = null;
        $row['Breast'] = null;
        $row['PPA'] = null;
        $row['PPSV'] = null;
        $row['PPAPSMEAR'] = null;
        $row['PTHYROID'] = null;
        $row['MTHYROID'] = null;
        $row['SecSexCharacters'] = null;
        $row['PenisUM'] = null;
        $row['VAS'] = null;
        $row['EPIDIDYMIS'] = null;
        $row['Varicocele'] = null;
        $row['FertilityTreatmentHistory'] = null;
        $row['SurgeryHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['PInvestigations'] = null;
        $row['Addictions'] = null;
        $row['Medications'] = null;
        $row['Medical'] = null;
        $row['Surgical'] = null;
        $row['CoitalHistory'] = null;
        $row['SemenAnalysis'] = null;
        $row['MInsvestications'] = null;
        $row['PImpression'] = null;
        $row['MIMpression'] = null;
        $row['PPlanOfManagement'] = null;
        $row['MPlanOfManagement'] = null;
        $row['PReadMore'] = null;
        $row['MReadMore'] = null;
        $row['MariedFor'] = null;
        $row['CMNCM'] = null;
        $row['TemplateMenstrualHistory'] = null;
        $row['TemplateObstetricHistory'] = null;
        $row['TemplateFertilityTreatmentHistory'] = null;
        $row['TemplateSurgeryHistory'] = null;
        $row['TemplateFInvestigations'] = null;
        $row['TemplatePlanOfManagement'] = null;
        $row['TemplatePImpression'] = null;
        $row['TemplateMedications'] = null;
        $row['TemplateSemenAnalysis'] = null;
        $row['MaleInsvestications'] = null;
        $row['TemplateMIMpression'] = null;
        $row['TemplateMalePlanOfManagement'] = null;
        $row['TidNo'] = null;
        $row['pFamilyHistory'] = null;
        $row['pTemplateMedications'] = null;
        $row['AntiTPO'] = null;
        $row['AntiTG'] = null;
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

        // RIDNO

        // Name

        // Age

        // SEX

        // Religion

        // Address

        // IdentificationMark

        // DoublewitnessName1

        // DoublewitnessName2

        // Chiefcomplaints

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // Generalexaminationpallor

        // PR

        // CVS

        // PA

        // PROVISIONALDIAGNOSIS

        // Investigations

        // Fheight

        // Fweight

        // FBMI

        // FBloodgroup

        // Mheight

        // Mweight

        // MBMI

        // MBloodgroup

        // FBuild

        // MBuild

        // FSkinColor

        // MSkinColor

        // FEyesColor

        // MEyesColor

        // FHairColor

        // MhairColor

        // FhairTexture

        // MHairTexture

        // Fothers

        // Mothers

        // PGE

        // PPR

        // PBP

        // Breast

        // PPA

        // PPSV

        // PPAPSMEAR

        // PTHYROID

        // MTHYROID

        // SecSexCharacters

        // PenisUM

        // VAS

        // EPIDIDYMIS

        // Varicocele

        // FertilityTreatmentHistory

        // SurgeryHistory

        // FamilyHistory

        // PInvestigations

        // Addictions

        // Medications

        // Medical

        // Surgical

        // CoitalHistory

        // SemenAnalysis

        // MInsvestications

        // PImpression

        // MIMpression

        // PPlanOfManagement

        // MPlanOfManagement

        // PReadMore

        // MReadMore

        // MariedFor

        // CMNCM

        // TemplateMenstrualHistory

        // TemplateObstetricHistory

        // TemplateFertilityTreatmentHistory

        // TemplateSurgeryHistory

        // TemplateFInvestigations

        // TemplatePlanOfManagement

        // TemplatePImpression

        // TemplateMedications

        // TemplateSemenAnalysis

        // MaleInsvestications

        // TemplateMIMpression

        // TemplateMalePlanOfManagement

        // TidNo

        // pFamilyHistory

        // pTemplateMedications

        // AntiTPO

        // AntiTG
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

            // SEX
            $this->SEX->ViewValue = $this->SEX->CurrentValue;
            $this->SEX->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Address
            $this->Address->ViewValue = $this->Address->CurrentValue;
            $this->Address->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // DoublewitnessName1
            $this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
            $this->DoublewitnessName1->ViewCustomAttributes = "";

            // DoublewitnessName2
            $this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
            $this->DoublewitnessName2->ViewCustomAttributes = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
            $this->Chiefcomplaints->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // ObstetricHistory
            $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
            $this->ObstetricHistory->ViewCustomAttributes = "";

            // MedicalHistory
            if (strval($this->MedicalHistory->CurrentValue) != "") {
                $this->MedicalHistory->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->MedicalHistory->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->MedicalHistory->ViewValue->add($this->MedicalHistory->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->MedicalHistory->ViewValue = null;
            }
            $this->MedicalHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // Generalexaminationpallor
            $this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
            $this->Generalexaminationpallor->ViewCustomAttributes = "";

            // PR
            $this->PR->ViewValue = $this->PR->CurrentValue;
            $this->PR->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Investigations
            $this->Investigations->ViewValue = $this->Investigations->CurrentValue;
            $this->Investigations->ViewCustomAttributes = "";

            // Fheight
            $this->Fheight->ViewValue = $this->Fheight->CurrentValue;
            $this->Fheight->ViewCustomAttributes = "";

            // Fweight
            $this->Fweight->ViewValue = $this->Fweight->CurrentValue;
            $this->Fweight->ViewCustomAttributes = "";

            // FBMI
            $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
            $this->FBMI->ViewCustomAttributes = "";

            // FBloodgroup
            $curVal = trim(strval($this->FBloodgroup->CurrentValue));
            if ($curVal != "") {
                $this->FBloodgroup->ViewValue = $this->FBloodgroup->lookupCacheOption($curVal);
                if ($this->FBloodgroup->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->FBloodgroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->FBloodgroup->Lookup->renderViewRow($rswrk[0]);
                        $this->FBloodgroup->ViewValue = $this->FBloodgroup->displayValue($arwrk);
                    } else {
                        $this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
                    }
                }
            } else {
                $this->FBloodgroup->ViewValue = null;
            }
            $this->FBloodgroup->ViewCustomAttributes = "";

            // Mheight
            $this->Mheight->ViewValue = $this->Mheight->CurrentValue;
            $this->Mheight->ViewCustomAttributes = "";

            // Mweight
            $this->Mweight->ViewValue = $this->Mweight->CurrentValue;
            $this->Mweight->ViewCustomAttributes = "";

            // MBMI
            $this->MBMI->ViewValue = $this->MBMI->CurrentValue;
            $this->MBMI->ViewCustomAttributes = "";

            // MBloodgroup
            $curVal = trim(strval($this->MBloodgroup->CurrentValue));
            if ($curVal != "") {
                $this->MBloodgroup->ViewValue = $this->MBloodgroup->lookupCacheOption($curVal);
                if ($this->MBloodgroup->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->MBloodgroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->MBloodgroup->Lookup->renderViewRow($rswrk[0]);
                        $this->MBloodgroup->ViewValue = $this->MBloodgroup->displayValue($arwrk);
                    } else {
                        $this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
                    }
                }
            } else {
                $this->MBloodgroup->ViewValue = null;
            }
            $this->MBloodgroup->ViewCustomAttributes = "";

            // FBuild
            if (strval($this->FBuild->CurrentValue) != "") {
                $this->FBuild->ViewValue = $this->FBuild->optionCaption($this->FBuild->CurrentValue);
            } else {
                $this->FBuild->ViewValue = null;
            }
            $this->FBuild->ViewCustomAttributes = "";

            // MBuild
            if (strval($this->MBuild->CurrentValue) != "") {
                $this->MBuild->ViewValue = $this->MBuild->optionCaption($this->MBuild->CurrentValue);
            } else {
                $this->MBuild->ViewValue = null;
            }
            $this->MBuild->ViewCustomAttributes = "";

            // FSkinColor
            if (strval($this->FSkinColor->CurrentValue) != "") {
                $this->FSkinColor->ViewValue = $this->FSkinColor->optionCaption($this->FSkinColor->CurrentValue);
            } else {
                $this->FSkinColor->ViewValue = null;
            }
            $this->FSkinColor->ViewCustomAttributes = "";

            // MSkinColor
            if (strval($this->MSkinColor->CurrentValue) != "") {
                $this->MSkinColor->ViewValue = $this->MSkinColor->optionCaption($this->MSkinColor->CurrentValue);
            } else {
                $this->MSkinColor->ViewValue = null;
            }
            $this->MSkinColor->ViewCustomAttributes = "";

            // FEyesColor
            if (strval($this->FEyesColor->CurrentValue) != "") {
                $this->FEyesColor->ViewValue = $this->FEyesColor->optionCaption($this->FEyesColor->CurrentValue);
            } else {
                $this->FEyesColor->ViewValue = null;
            }
            $this->FEyesColor->ViewCustomAttributes = "";

            // MEyesColor
            if (strval($this->MEyesColor->CurrentValue) != "") {
                $this->MEyesColor->ViewValue = $this->MEyesColor->optionCaption($this->MEyesColor->CurrentValue);
            } else {
                $this->MEyesColor->ViewValue = null;
            }
            $this->MEyesColor->ViewCustomAttributes = "";

            // FHairColor
            if (strval($this->FHairColor->CurrentValue) != "") {
                $this->FHairColor->ViewValue = $this->FHairColor->optionCaption($this->FHairColor->CurrentValue);
            } else {
                $this->FHairColor->ViewValue = null;
            }
            $this->FHairColor->ViewCustomAttributes = "";

            // MhairColor
            if (strval($this->MhairColor->CurrentValue) != "") {
                $this->MhairColor->ViewValue = $this->MhairColor->optionCaption($this->MhairColor->CurrentValue);
            } else {
                $this->MhairColor->ViewValue = null;
            }
            $this->MhairColor->ViewCustomAttributes = "";

            // FhairTexture
            if (strval($this->FhairTexture->CurrentValue) != "") {
                $this->FhairTexture->ViewValue = $this->FhairTexture->optionCaption($this->FhairTexture->CurrentValue);
            } else {
                $this->FhairTexture->ViewValue = null;
            }
            $this->FhairTexture->ViewCustomAttributes = "";

            // MHairTexture
            if (strval($this->MHairTexture->CurrentValue) != "") {
                $this->MHairTexture->ViewValue = $this->MHairTexture->optionCaption($this->MHairTexture->CurrentValue);
            } else {
                $this->MHairTexture->ViewValue = null;
            }
            $this->MHairTexture->ViewCustomAttributes = "";

            // Fothers
            $this->Fothers->ViewValue = $this->Fothers->CurrentValue;
            $this->Fothers->ViewCustomAttributes = "";

            // Mothers
            $this->Mothers->ViewValue = $this->Mothers->CurrentValue;
            $this->Mothers->ViewCustomAttributes = "";

            // PGE
            $this->PGE->ViewValue = $this->PGE->CurrentValue;
            $this->PGE->ViewCustomAttributes = "";

            // PPR
            $this->PPR->ViewValue = $this->PPR->CurrentValue;
            $this->PPR->ViewCustomAttributes = "";

            // PBP
            $this->PBP->ViewValue = $this->PBP->CurrentValue;
            $this->PBP->ViewCustomAttributes = "";

            // Breast
            $this->Breast->ViewValue = $this->Breast->CurrentValue;
            $this->Breast->ViewCustomAttributes = "";

            // PPA
            $this->PPA->ViewValue = $this->PPA->CurrentValue;
            $this->PPA->ViewCustomAttributes = "";

            // PPSV
            $this->PPSV->ViewValue = $this->PPSV->CurrentValue;
            $this->PPSV->ViewCustomAttributes = "";

            // PPAPSMEAR
            $this->PPAPSMEAR->ViewValue = $this->PPAPSMEAR->CurrentValue;
            $this->PPAPSMEAR->ViewCustomAttributes = "";

            // PTHYROID
            $this->PTHYROID->ViewValue = $this->PTHYROID->CurrentValue;
            $this->PTHYROID->ViewCustomAttributes = "";

            // MTHYROID
            $this->MTHYROID->ViewValue = $this->MTHYROID->CurrentValue;
            $this->MTHYROID->ViewCustomAttributes = "";

            // SecSexCharacters
            $this->SecSexCharacters->ViewValue = $this->SecSexCharacters->CurrentValue;
            $this->SecSexCharacters->ViewCustomAttributes = "";

            // PenisUM
            $this->PenisUM->ViewValue = $this->PenisUM->CurrentValue;
            $this->PenisUM->ViewCustomAttributes = "";

            // VAS
            $this->VAS->ViewValue = $this->VAS->CurrentValue;
            $this->VAS->ViewCustomAttributes = "";

            // EPIDIDYMIS
            $this->EPIDIDYMIS->ViewValue = $this->EPIDIDYMIS->CurrentValue;
            $this->EPIDIDYMIS->ViewCustomAttributes = "";

            // Varicocele
            $this->Varicocele->ViewValue = $this->Varicocele->CurrentValue;
            $this->Varicocele->ViewCustomAttributes = "";

            // FertilityTreatmentHistory
            $this->FertilityTreatmentHistory->ViewValue = $this->FertilityTreatmentHistory->CurrentValue;
            $this->FertilityTreatmentHistory->ViewCustomAttributes = "";

            // SurgeryHistory
            $this->SurgeryHistory->ViewValue = $this->SurgeryHistory->CurrentValue;
            $this->SurgeryHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $curVal = trim(strval($this->FamilyHistory->CurrentValue));
            if ($curVal != "") {
                $this->FamilyHistory->ViewValue = $this->FamilyHistory->lookupCacheOption($curVal);
                if ($this->FamilyHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='FamilyHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->FamilyHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->FamilyHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->FamilyHistory->ViewValue = $this->FamilyHistory->displayValue($arwrk);
                    } else {
                        $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
                    }
                }
            } else {
                $this->FamilyHistory->ViewValue = null;
            }
            $this->FamilyHistory->ViewCustomAttributes = "";

            // PInvestigations
            $this->PInvestigations->ViewValue = $this->PInvestigations->CurrentValue;
            $this->PInvestigations->ViewCustomAttributes = "";

            // Addictions
            if (strval($this->Addictions->CurrentValue) != "") {
                $this->Addictions->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Addictions->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Addictions->ViewValue->add($this->Addictions->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Addictions->ViewValue = null;
            }
            $this->Addictions->ViewCustomAttributes = "";

            // Medications
            $this->Medications->ViewValue = $this->Medications->CurrentValue;
            $this->Medications->ViewCustomAttributes = "";

            // Medical
            if (strval($this->Medical->CurrentValue) != "") {
                $this->Medical->ViewValue = $this->Medical->optionCaption($this->Medical->CurrentValue);
            } else {
                $this->Medical->ViewValue = null;
            }
            $this->Medical->ViewCustomAttributes = "";

            // Surgical
            $this->Surgical->ViewValue = $this->Surgical->CurrentValue;
            $curVal = trim(strval($this->Surgical->CurrentValue));
            if ($curVal != "") {
                $this->Surgical->ViewValue = $this->Surgical->lookupCacheOption($curVal);
                if ($this->Surgical->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='SurgicalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Surgical->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Surgical->Lookup->renderViewRow($rswrk[0]);
                        $this->Surgical->ViewValue = $this->Surgical->displayValue($arwrk);
                    } else {
                        $this->Surgical->ViewValue = $this->Surgical->CurrentValue;
                    }
                }
            } else {
                $this->Surgical->ViewValue = null;
            }
            $this->Surgical->ViewCustomAttributes = "";

            // CoitalHistory
            $this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
            $curVal = trim(strval($this->CoitalHistory->CurrentValue));
            if ($curVal != "") {
                $this->CoitalHistory->ViewValue = $this->CoitalHistory->lookupCacheOption($curVal);
                if ($this->CoitalHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='CoitalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->CoitalHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->CoitalHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->CoitalHistory->ViewValue = $this->CoitalHistory->displayValue($arwrk);
                    } else {
                        $this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
                    }
                }
            } else {
                $this->CoitalHistory->ViewValue = null;
            }
            $this->CoitalHistory->ViewCustomAttributes = "";

            // SemenAnalysis
            $this->SemenAnalysis->ViewValue = $this->SemenAnalysis->CurrentValue;
            $this->SemenAnalysis->ViewCustomAttributes = "";

            // MInsvestications
            $this->MInsvestications->ViewValue = $this->MInsvestications->CurrentValue;
            $this->MInsvestications->ViewCustomAttributes = "";

            // PImpression
            $this->PImpression->ViewValue = $this->PImpression->CurrentValue;
            $this->PImpression->ViewCustomAttributes = "";

            // MIMpression
            $this->MIMpression->ViewValue = $this->MIMpression->CurrentValue;
            $this->MIMpression->ViewCustomAttributes = "";

            // PPlanOfManagement
            $this->PPlanOfManagement->ViewValue = $this->PPlanOfManagement->CurrentValue;
            $this->PPlanOfManagement->ViewCustomAttributes = "";

            // MPlanOfManagement
            $this->MPlanOfManagement->ViewValue = $this->MPlanOfManagement->CurrentValue;
            $this->MPlanOfManagement->ViewCustomAttributes = "";

            // PReadMore
            $this->PReadMore->ViewValue = $this->PReadMore->CurrentValue;
            $this->PReadMore->ViewCustomAttributes = "";

            // MReadMore
            $this->MReadMore->ViewValue = $this->MReadMore->CurrentValue;
            $this->MReadMore->ViewCustomAttributes = "";

            // MariedFor
            $this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
            $this->MariedFor->ViewCustomAttributes = "";

            // CMNCM
            $this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
            $this->CMNCM->ViewCustomAttributes = "";

            // TemplateMenstrualHistory
            $curVal = trim(strval($this->TemplateMenstrualHistory->CurrentValue));
            if ($curVal != "") {
                $this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->lookupCacheOption($curVal);
                if ($this->TemplateMenstrualHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Menstrual History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateMenstrualHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateMenstrualHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->displayValue($arwrk);
                    } else {
                        $this->TemplateMenstrualHistory->ViewValue = $this->TemplateMenstrualHistory->CurrentValue;
                    }
                }
            } else {
                $this->TemplateMenstrualHistory->ViewValue = null;
            }
            $this->TemplateMenstrualHistory->ViewCustomAttributes = "";

            // TemplateObstetricHistory
            $curVal = trim(strval($this->TemplateObstetricHistory->CurrentValue));
            if ($curVal != "") {
                $this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->lookupCacheOption($curVal);
                if ($this->TemplateObstetricHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Obstetric History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateObstetricHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateObstetricHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->displayValue($arwrk);
                    } else {
                        $this->TemplateObstetricHistory->ViewValue = $this->TemplateObstetricHistory->CurrentValue;
                    }
                }
            } else {
                $this->TemplateObstetricHistory->ViewValue = null;
            }
            $this->TemplateObstetricHistory->ViewCustomAttributes = "";

            // TemplateFertilityTreatmentHistory
            $curVal = trim(strval($this->TemplateFertilityTreatmentHistory->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->lookupCacheOption($curVal);
                if ($this->TemplateFertilityTreatmentHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Fertility Treatment History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateFertilityTreatmentHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateFertilityTreatmentHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->displayValue($arwrk);
                    } else {
                        $this->TemplateFertilityTreatmentHistory->ViewValue = $this->TemplateFertilityTreatmentHistory->CurrentValue;
                    }
                }
            } else {
                $this->TemplateFertilityTreatmentHistory->ViewValue = null;
            }
            $this->TemplateFertilityTreatmentHistory->ViewCustomAttributes = "";

            // TemplateSurgeryHistory
            $curVal = trim(strval($this->TemplateSurgeryHistory->CurrentValue));
            if ($curVal != "") {
                $this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->lookupCacheOption($curVal);
                if ($this->TemplateSurgeryHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Surgery History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateSurgeryHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateSurgeryHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->displayValue($arwrk);
                    } else {
                        $this->TemplateSurgeryHistory->ViewValue = $this->TemplateSurgeryHistory->CurrentValue;
                    }
                }
            } else {
                $this->TemplateSurgeryHistory->ViewValue = null;
            }
            $this->TemplateSurgeryHistory->ViewCustomAttributes = "";

            // TemplateFInvestigations
            $curVal = trim(strval($this->TemplateFInvestigations->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->lookupCacheOption($curVal);
                if ($this->TemplateFInvestigations->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Female Investigations'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateFInvestigations->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateFInvestigations->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->displayValue($arwrk);
                    } else {
                        $this->TemplateFInvestigations->ViewValue = $this->TemplateFInvestigations->CurrentValue;
                    }
                }
            } else {
                $this->TemplateFInvestigations->ViewValue = null;
            }
            $this->TemplateFInvestigations->ViewCustomAttributes = "";

            // TemplatePlanOfManagement
            $curVal = trim(strval($this->TemplatePlanOfManagement->CurrentValue));
            if ($curVal != "") {
                $this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->lookupCacheOption($curVal);
                if ($this->TemplatePlanOfManagement->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Female Plan Of Management'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplatePlanOfManagement->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplatePlanOfManagement->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->displayValue($arwrk);
                    } else {
                        $this->TemplatePlanOfManagement->ViewValue = $this->TemplatePlanOfManagement->CurrentValue;
                    }
                }
            } else {
                $this->TemplatePlanOfManagement->ViewValue = null;
            }
            $this->TemplatePlanOfManagement->ViewCustomAttributes = "";

            // TemplatePImpression
            $curVal = trim(strval($this->TemplatePImpression->CurrentValue));
            if ($curVal != "") {
                $this->TemplatePImpression->ViewValue = $this->TemplatePImpression->lookupCacheOption($curVal);
                if ($this->TemplatePImpression->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Female Impression'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplatePImpression->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplatePImpression->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplatePImpression->ViewValue = $this->TemplatePImpression->displayValue($arwrk);
                    } else {
                        $this->TemplatePImpression->ViewValue = $this->TemplatePImpression->CurrentValue;
                    }
                }
            } else {
                $this->TemplatePImpression->ViewValue = null;
            }
            $this->TemplatePImpression->ViewCustomAttributes = "";

            // TemplateMedications
            $curVal = trim(strval($this->TemplateMedications->CurrentValue));
            if ($curVal != "") {
                $this->TemplateMedications->ViewValue = $this->TemplateMedications->lookupCacheOption($curVal);
                if ($this->TemplateMedications->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Medications'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateMedications->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateMedications->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateMedications->ViewValue = $this->TemplateMedications->displayValue($arwrk);
                    } else {
                        $this->TemplateMedications->ViewValue = $this->TemplateMedications->CurrentValue;
                    }
                }
            } else {
                $this->TemplateMedications->ViewValue = null;
            }
            $this->TemplateMedications->ViewCustomAttributes = "";

            // TemplateSemenAnalysis
            $curVal = trim(strval($this->TemplateSemenAnalysis->CurrentValue));
            if ($curVal != "") {
                $this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->lookupCacheOption($curVal);
                if ($this->TemplateSemenAnalysis->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Semen Analysis'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateSemenAnalysis->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateSemenAnalysis->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->displayValue($arwrk);
                    } else {
                        $this->TemplateSemenAnalysis->ViewValue = $this->TemplateSemenAnalysis->CurrentValue;
                    }
                }
            } else {
                $this->TemplateSemenAnalysis->ViewValue = null;
            }
            $this->TemplateSemenAnalysis->ViewCustomAttributes = "";

            // MaleInsvestications
            $curVal = trim(strval($this->MaleInsvestications->CurrentValue));
            if ($curVal != "") {
                $this->MaleInsvestications->ViewValue = $this->MaleInsvestications->lookupCacheOption($curVal);
                if ($this->MaleInsvestications->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Male Insvestications'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->MaleInsvestications->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->MaleInsvestications->Lookup->renderViewRow($rswrk[0]);
                        $this->MaleInsvestications->ViewValue = $this->MaleInsvestications->displayValue($arwrk);
                    } else {
                        $this->MaleInsvestications->ViewValue = $this->MaleInsvestications->CurrentValue;
                    }
                }
            } else {
                $this->MaleInsvestications->ViewValue = null;
            }
            $this->MaleInsvestications->ViewCustomAttributes = "";

            // TemplateMIMpression
            $curVal = trim(strval($this->TemplateMIMpression->CurrentValue));
            if ($curVal != "") {
                $this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->lookupCacheOption($curVal);
                if ($this->TemplateMIMpression->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Male Impression'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateMIMpression->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateMIMpression->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->displayValue($arwrk);
                    } else {
                        $this->TemplateMIMpression->ViewValue = $this->TemplateMIMpression->CurrentValue;
                    }
                }
            } else {
                $this->TemplateMIMpression->ViewValue = null;
            }
            $this->TemplateMIMpression->ViewCustomAttributes = "";

            // TemplateMalePlanOfManagement
            $curVal = trim(strval($this->TemplateMalePlanOfManagement->CurrentValue));
            if ($curVal != "") {
                $this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->lookupCacheOption($curVal);
                if ($this->TemplateMalePlanOfManagement->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Male Plan Of Management'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateMalePlanOfManagement->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateMalePlanOfManagement->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->displayValue($arwrk);
                    } else {
                        $this->TemplateMalePlanOfManagement->ViewValue = $this->TemplateMalePlanOfManagement->CurrentValue;
                    }
                }
            } else {
                $this->TemplateMalePlanOfManagement->ViewValue = null;
            }
            $this->TemplateMalePlanOfManagement->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // pFamilyHistory
            $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
            $curVal = trim(strval($this->pFamilyHistory->CurrentValue));
            if ($curVal != "") {
                $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->lookupCacheOption($curVal);
                if ($this->pFamilyHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='FamilyHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->pFamilyHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->pFamilyHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->displayValue($arwrk);
                    } else {
                        $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
                    }
                }
            } else {
                $this->pFamilyHistory->ViewValue = null;
            }
            $this->pFamilyHistory->ViewCustomAttributes = "";

            // pTemplateMedications
            $this->pTemplateMedications->ViewValue = $this->pTemplateMedications->CurrentValue;
            $this->pTemplateMedications->ViewCustomAttributes = "";

            // AntiTPO
            $this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
            $this->AntiTPO->ViewCustomAttributes = "";

            // AntiTG
            $this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
            $this->AntiTG->ViewCustomAttributes = "";

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

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";
            $this->SEX->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";
            $this->Address->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // DoublewitnessName1
            $this->DoublewitnessName1->LinkCustomAttributes = "";
            $this->DoublewitnessName1->HrefValue = "";
            $this->DoublewitnessName1->TooltipValue = "";

            // DoublewitnessName2
            $this->DoublewitnessName2->LinkCustomAttributes = "";
            $this->DoublewitnessName2->HrefValue = "";
            $this->DoublewitnessName2->TooltipValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";
            $this->Chiefcomplaints->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";
            $this->ObstetricHistory->TooltipValue = "";

            // MedicalHistory
            $this->MedicalHistory->LinkCustomAttributes = "";
            $this->MedicalHistory->HrefValue = "";
            $this->MedicalHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // Generalexaminationpallor
            $this->Generalexaminationpallor->LinkCustomAttributes = "";
            $this->Generalexaminationpallor->HrefValue = "";
            $this->Generalexaminationpallor->TooltipValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";
            $this->PR->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Investigations
            $this->Investigations->LinkCustomAttributes = "";
            $this->Investigations->HrefValue = "";
            $this->Investigations->TooltipValue = "";

            // Fheight
            $this->Fheight->LinkCustomAttributes = "";
            $this->Fheight->HrefValue = "";
            $this->Fheight->TooltipValue = "";

            // Fweight
            $this->Fweight->LinkCustomAttributes = "";
            $this->Fweight->HrefValue = "";
            $this->Fweight->TooltipValue = "";

            // FBMI
            $this->FBMI->LinkCustomAttributes = "";
            $this->FBMI->HrefValue = "";
            $this->FBMI->TooltipValue = "";

            // FBloodgroup
            $this->FBloodgroup->LinkCustomAttributes = "";
            $this->FBloodgroup->HrefValue = "";
            $this->FBloodgroup->TooltipValue = "";

            // Mheight
            $this->Mheight->LinkCustomAttributes = "";
            $this->Mheight->HrefValue = "";
            $this->Mheight->TooltipValue = "";

            // Mweight
            $this->Mweight->LinkCustomAttributes = "";
            $this->Mweight->HrefValue = "";
            $this->Mweight->TooltipValue = "";

            // MBMI
            $this->MBMI->LinkCustomAttributes = "";
            $this->MBMI->HrefValue = "";
            $this->MBMI->TooltipValue = "";

            // MBloodgroup
            $this->MBloodgroup->LinkCustomAttributes = "";
            $this->MBloodgroup->HrefValue = "";
            $this->MBloodgroup->TooltipValue = "";

            // FBuild
            $this->FBuild->LinkCustomAttributes = "";
            $this->FBuild->HrefValue = "";
            $this->FBuild->TooltipValue = "";

            // MBuild
            $this->MBuild->LinkCustomAttributes = "";
            $this->MBuild->HrefValue = "";
            $this->MBuild->TooltipValue = "";

            // FSkinColor
            $this->FSkinColor->LinkCustomAttributes = "";
            $this->FSkinColor->HrefValue = "";
            $this->FSkinColor->TooltipValue = "";

            // MSkinColor
            $this->MSkinColor->LinkCustomAttributes = "";
            $this->MSkinColor->HrefValue = "";
            $this->MSkinColor->TooltipValue = "";

            // FEyesColor
            $this->FEyesColor->LinkCustomAttributes = "";
            $this->FEyesColor->HrefValue = "";
            $this->FEyesColor->TooltipValue = "";

            // MEyesColor
            $this->MEyesColor->LinkCustomAttributes = "";
            $this->MEyesColor->HrefValue = "";
            $this->MEyesColor->TooltipValue = "";

            // FHairColor
            $this->FHairColor->LinkCustomAttributes = "";
            $this->FHairColor->HrefValue = "";
            $this->FHairColor->TooltipValue = "";

            // MhairColor
            $this->MhairColor->LinkCustomAttributes = "";
            $this->MhairColor->HrefValue = "";
            $this->MhairColor->TooltipValue = "";

            // FhairTexture
            $this->FhairTexture->LinkCustomAttributes = "";
            $this->FhairTexture->HrefValue = "";
            $this->FhairTexture->TooltipValue = "";

            // MHairTexture
            $this->MHairTexture->LinkCustomAttributes = "";
            $this->MHairTexture->HrefValue = "";
            $this->MHairTexture->TooltipValue = "";

            // Fothers
            $this->Fothers->LinkCustomAttributes = "";
            $this->Fothers->HrefValue = "";
            $this->Fothers->TooltipValue = "";

            // Mothers
            $this->Mothers->LinkCustomAttributes = "";
            $this->Mothers->HrefValue = "";
            $this->Mothers->TooltipValue = "";

            // PGE
            $this->PGE->LinkCustomAttributes = "";
            $this->PGE->HrefValue = "";
            $this->PGE->TooltipValue = "";

            // PPR
            $this->PPR->LinkCustomAttributes = "";
            $this->PPR->HrefValue = "";
            $this->PPR->TooltipValue = "";

            // PBP
            $this->PBP->LinkCustomAttributes = "";
            $this->PBP->HrefValue = "";
            $this->PBP->TooltipValue = "";

            // Breast
            $this->Breast->LinkCustomAttributes = "";
            $this->Breast->HrefValue = "";
            $this->Breast->TooltipValue = "";

            // PPA
            $this->PPA->LinkCustomAttributes = "";
            $this->PPA->HrefValue = "";
            $this->PPA->TooltipValue = "";

            // PPSV
            $this->PPSV->LinkCustomAttributes = "";
            $this->PPSV->HrefValue = "";
            $this->PPSV->TooltipValue = "";

            // PPAPSMEAR
            $this->PPAPSMEAR->LinkCustomAttributes = "";
            $this->PPAPSMEAR->HrefValue = "";
            $this->PPAPSMEAR->TooltipValue = "";

            // PTHYROID
            $this->PTHYROID->LinkCustomAttributes = "";
            $this->PTHYROID->HrefValue = "";
            $this->PTHYROID->TooltipValue = "";

            // MTHYROID
            $this->MTHYROID->LinkCustomAttributes = "";
            $this->MTHYROID->HrefValue = "";
            $this->MTHYROID->TooltipValue = "";

            // SecSexCharacters
            $this->SecSexCharacters->LinkCustomAttributes = "";
            $this->SecSexCharacters->HrefValue = "";
            $this->SecSexCharacters->TooltipValue = "";

            // PenisUM
            $this->PenisUM->LinkCustomAttributes = "";
            $this->PenisUM->HrefValue = "";
            $this->PenisUM->TooltipValue = "";

            // VAS
            $this->VAS->LinkCustomAttributes = "";
            $this->VAS->HrefValue = "";
            $this->VAS->TooltipValue = "";

            // EPIDIDYMIS
            $this->EPIDIDYMIS->LinkCustomAttributes = "";
            $this->EPIDIDYMIS->HrefValue = "";
            $this->EPIDIDYMIS->TooltipValue = "";

            // Varicocele
            $this->Varicocele->LinkCustomAttributes = "";
            $this->Varicocele->HrefValue = "";
            $this->Varicocele->TooltipValue = "";

            // FertilityTreatmentHistory
            $this->FertilityTreatmentHistory->LinkCustomAttributes = "";
            $this->FertilityTreatmentHistory->HrefValue = "";
            $this->FertilityTreatmentHistory->TooltipValue = "";

            // SurgeryHistory
            $this->SurgeryHistory->LinkCustomAttributes = "";
            $this->SurgeryHistory->HrefValue = "";
            $this->SurgeryHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // PInvestigations
            $this->PInvestigations->LinkCustomAttributes = "";
            $this->PInvestigations->HrefValue = "";
            $this->PInvestigations->TooltipValue = "";

            // Addictions
            $this->Addictions->LinkCustomAttributes = "";
            $this->Addictions->HrefValue = "";
            $this->Addictions->TooltipValue = "";

            // Medications
            $this->Medications->LinkCustomAttributes = "";
            $this->Medications->HrefValue = "";
            $this->Medications->TooltipValue = "";

            // Medical
            $this->Medical->LinkCustomAttributes = "";
            $this->Medical->HrefValue = "";
            $this->Medical->TooltipValue = "";

            // Surgical
            $this->Surgical->LinkCustomAttributes = "";
            $this->Surgical->HrefValue = "";
            $this->Surgical->TooltipValue = "";

            // CoitalHistory
            $this->CoitalHistory->LinkCustomAttributes = "";
            $this->CoitalHistory->HrefValue = "";
            $this->CoitalHistory->TooltipValue = "";

            // SemenAnalysis
            $this->SemenAnalysis->LinkCustomAttributes = "";
            $this->SemenAnalysis->HrefValue = "";
            $this->SemenAnalysis->TooltipValue = "";

            // MInsvestications
            $this->MInsvestications->LinkCustomAttributes = "";
            $this->MInsvestications->HrefValue = "";
            $this->MInsvestications->TooltipValue = "";

            // PImpression
            $this->PImpression->LinkCustomAttributes = "";
            $this->PImpression->HrefValue = "";
            $this->PImpression->TooltipValue = "";

            // MIMpression
            $this->MIMpression->LinkCustomAttributes = "";
            $this->MIMpression->HrefValue = "";
            $this->MIMpression->TooltipValue = "";

            // PPlanOfManagement
            $this->PPlanOfManagement->LinkCustomAttributes = "";
            $this->PPlanOfManagement->HrefValue = "";
            $this->PPlanOfManagement->TooltipValue = "";

            // MPlanOfManagement
            $this->MPlanOfManagement->LinkCustomAttributes = "";
            $this->MPlanOfManagement->HrefValue = "";
            $this->MPlanOfManagement->TooltipValue = "";

            // PReadMore
            $this->PReadMore->LinkCustomAttributes = "";
            $this->PReadMore->HrefValue = "";
            $this->PReadMore->TooltipValue = "";

            // MReadMore
            $this->MReadMore->LinkCustomAttributes = "";
            $this->MReadMore->HrefValue = "";
            $this->MReadMore->TooltipValue = "";

            // MariedFor
            $this->MariedFor->LinkCustomAttributes = "";
            $this->MariedFor->HrefValue = "";
            $this->MariedFor->TooltipValue = "";

            // CMNCM
            $this->CMNCM->LinkCustomAttributes = "";
            $this->CMNCM->HrefValue = "";
            $this->CMNCM->TooltipValue = "";

            // TemplateMenstrualHistory
            $this->TemplateMenstrualHistory->LinkCustomAttributes = "";
            $this->TemplateMenstrualHistory->HrefValue = "";
            $this->TemplateMenstrualHistory->TooltipValue = "";

            // TemplateObstetricHistory
            $this->TemplateObstetricHistory->LinkCustomAttributes = "";
            $this->TemplateObstetricHistory->HrefValue = "";
            $this->TemplateObstetricHistory->TooltipValue = "";

            // TemplateFertilityTreatmentHistory
            $this->TemplateFertilityTreatmentHistory->LinkCustomAttributes = "";
            $this->TemplateFertilityTreatmentHistory->HrefValue = "";
            $this->TemplateFertilityTreatmentHistory->TooltipValue = "";

            // TemplateSurgeryHistory
            $this->TemplateSurgeryHistory->LinkCustomAttributes = "";
            $this->TemplateSurgeryHistory->HrefValue = "";
            $this->TemplateSurgeryHistory->TooltipValue = "";

            // TemplateFInvestigations
            $this->TemplateFInvestigations->LinkCustomAttributes = "";
            $this->TemplateFInvestigations->HrefValue = "";
            $this->TemplateFInvestigations->TooltipValue = "";

            // TemplatePlanOfManagement
            $this->TemplatePlanOfManagement->LinkCustomAttributes = "";
            $this->TemplatePlanOfManagement->HrefValue = "";
            $this->TemplatePlanOfManagement->TooltipValue = "";

            // TemplatePImpression
            $this->TemplatePImpression->LinkCustomAttributes = "";
            $this->TemplatePImpression->HrefValue = "";
            $this->TemplatePImpression->TooltipValue = "";

            // TemplateMedications
            $this->TemplateMedications->LinkCustomAttributes = "";
            $this->TemplateMedications->HrefValue = "";
            $this->TemplateMedications->TooltipValue = "";

            // TemplateSemenAnalysis
            $this->TemplateSemenAnalysis->LinkCustomAttributes = "";
            $this->TemplateSemenAnalysis->HrefValue = "";
            $this->TemplateSemenAnalysis->TooltipValue = "";

            // MaleInsvestications
            $this->MaleInsvestications->LinkCustomAttributes = "";
            $this->MaleInsvestications->HrefValue = "";
            $this->MaleInsvestications->TooltipValue = "";

            // TemplateMIMpression
            $this->TemplateMIMpression->LinkCustomAttributes = "";
            $this->TemplateMIMpression->HrefValue = "";
            $this->TemplateMIMpression->TooltipValue = "";

            // TemplateMalePlanOfManagement
            $this->TemplateMalePlanOfManagement->LinkCustomAttributes = "";
            $this->TemplateMalePlanOfManagement->HrefValue = "";
            $this->TemplateMalePlanOfManagement->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // pFamilyHistory
            $this->pFamilyHistory->LinkCustomAttributes = "";
            $this->pFamilyHistory->HrefValue = "";
            $this->pFamilyHistory->TooltipValue = "";

            // pTemplateMedications
            $this->pTemplateMedications->LinkCustomAttributes = "";
            $this->pTemplateMedications->HrefValue = "";
            $this->pTemplateMedications->TooltipValue = "";

            // AntiTPO
            $this->AntiTPO->LinkCustomAttributes = "";
            $this->AntiTPO->HrefValue = "";
            $this->AntiTPO->TooltipValue = "";

            // AntiTG
            $this->AntiTG->LinkCustomAttributes = "";
            $this->AntiTG->HrefValue = "";
            $this->AntiTG->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_vitals_historyview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_vitals_historyview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_vitals_historyview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_ivf_vitals_history" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_vitals_history\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_vitals_historyview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfVitalsHistoryList"), "", $this->TableVar, true);
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
                case "x_MedicalHistory":
                    break;
                case "x_FBloodgroup":
                    break;
                case "x_MBloodgroup":
                    break;
                case "x_FBuild":
                    break;
                case "x_MBuild":
                    break;
                case "x_FSkinColor":
                    break;
                case "x_MSkinColor":
                    break;
                case "x_FEyesColor":
                    break;
                case "x_MEyesColor":
                    break;
                case "x_FHairColor":
                    break;
                case "x_MhairColor":
                    break;
                case "x_FhairTexture":
                    break;
                case "x_MHairTexture":
                    break;
                case "x_FamilyHistory":
                    $lookupFilter = function () {
                        return "`HistoryType`='FamilyHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_Addictions":
                    break;
                case "x_Medical":
                    break;
                case "x_Surgical":
                    $lookupFilter = function () {
                        return "`HistoryType`='SurgicalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_CoitalHistory":
                    $lookupFilter = function () {
                        return "`HistoryType`='CoitalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateMenstrualHistory":
                    $lookupFilter = function () {
                        return "`TemplateType`='Menstrual History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateObstetricHistory":
                    $lookupFilter = function () {
                        return "`TemplateType`='Obstetric History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFertilityTreatmentHistory":
                    $lookupFilter = function () {
                        return "`TemplateType`='Fertility Treatment History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateSurgeryHistory":
                    $lookupFilter = function () {
                        return "`TemplateType`='Surgery History'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFInvestigations":
                    $lookupFilter = function () {
                        return "`TemplateType`='Female Investigations'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplatePlanOfManagement":
                    $lookupFilter = function () {
                        return "`TemplateType`='Female Plan Of Management'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplatePImpression":
                    $lookupFilter = function () {
                        return "`TemplateType`='Female Impression'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateMedications":
                    $lookupFilter = function () {
                        return "`TemplateType`='Medications'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateSemenAnalysis":
                    $lookupFilter = function () {
                        return "`TemplateType`='Semen Analysis'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_MaleInsvestications":
                    $lookupFilter = function () {
                        return "`TemplateType`='Male Insvestications'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateMIMpression":
                    $lookupFilter = function () {
                        return "`TemplateType`='Male Impression'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateMalePlanOfManagement":
                    $lookupFilter = function () {
                        return "`TemplateType`='Male Plan Of Management'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_pFamilyHistory":
                    $lookupFilter = function () {
                        return "`HistoryType`='FamilyHistory'";
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
