<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfArtSummaryView extends IvfArtSummary
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_art_summary';

    // Page object name
    public $PageObjName = "IvfArtSummaryView";

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

        // Table object (ivf_art_summary)
        if (!isset($GLOBALS["ivf_art_summary"]) || get_class($GLOBALS["ivf_art_summary"]) == PROJECT_NAMESPACE . "ivf_art_summary") {
            $GLOBALS["ivf_art_summary"] = &$this;
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
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_art_summary');
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
                $doc = new $class(Container("ivf_art_summary"));
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
                    if ($pageName == "IvfArtSummaryView") {
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
        $this->ARTCycle->setVisibility();
        $this->Spermorigin->setVisibility();
        $this->IndicationforART->setVisibility();
        $this->DateofICSI->setVisibility();
        $this->Origin->setVisibility();
        $this->Status->setVisibility();
        $this->Method->setVisibility();
        $this->pre_Concentration->setVisibility();
        $this->pre_Motility->setVisibility();
        $this->pre_Morphology->setVisibility();
        $this->post_Concentration->setVisibility();
        $this->post_Motility->setVisibility();
        $this->post_Morphology->setVisibility();
        $this->NumberofEmbryostransferred->setVisibility();
        $this->Embryosunderobservation->setVisibility();
        $this->EmbryoDevelopmentSummary->setVisibility();
        $this->EmbryologistSignature->setVisibility();
        $this->IVFRegistrationID->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->ICSIDetails->setVisibility();
        $this->DateofET->setVisibility();
        $this->Reasonfornotranfer->setVisibility();
        $this->EmbryosCryopreserved->setVisibility();
        $this->LegendCellStage->setVisibility();
        $this->ConsultantsSignature->setVisibility();
        $this->Name->setVisibility();
        $this->M2->setVisibility();
        $this->Mi2->setVisibility();
        $this->ICSI->setVisibility();
        $this->IVF->setVisibility();
        $this->M1->setVisibility();
        $this->GV->setVisibility();
        $this->_Others->setVisibility();
        $this->Normal2PN->setVisibility();
        $this->Abnormalfertilisation1N->setVisibility();
        $this->Abnormalfertilisation3N->setVisibility();
        $this->NotFertilized->setVisibility();
        $this->Degenerated->setVisibility();
        $this->SpermDate->setVisibility();
        $this->Code1->setVisibility();
        $this->Day1->setVisibility();
        $this->CellStage1->setVisibility();
        $this->Grade1->setVisibility();
        $this->State1->setVisibility();
        $this->Code2->setVisibility();
        $this->Day2->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade2->setVisibility();
        $this->State2->setVisibility();
        $this->Code3->setVisibility();
        $this->Day3->setVisibility();
        $this->CellStage3->setVisibility();
        $this->Grade3->setVisibility();
        $this->State3->setVisibility();
        $this->Code4->setVisibility();
        $this->Day4->setVisibility();
        $this->CellStage4->setVisibility();
        $this->Grade4->setVisibility();
        $this->State4->setVisibility();
        $this->Code5->setVisibility();
        $this->Day5->setVisibility();
        $this->CellStage5->setVisibility();
        $this->Grade5->setVisibility();
        $this->State5->setVisibility();
        $this->TidNo->setVisibility();
        $this->RIDNo->setVisibility();
        $this->Volume->setVisibility();
        $this->Volume1->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total->setVisibility();
        $this->Total1->setVisibility();
        $this->Total2->setVisibility();
        $this->Progressive->setVisibility();
        $this->Progressive1->setVisibility();
        $this->Progressive2->setVisibility();
        $this->NotProgressive->setVisibility();
        $this->NotProgressive1->setVisibility();
        $this->NotProgressive2->setVisibility();
        $this->Motility2->setVisibility();
        $this->Morphology2->setVisibility();
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
        $this->setupLookupOptions($this->ConsultantsSignature);

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
                $returnUrl = "IvfArtSummaryList"; // Return to list
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
                        $returnUrl = "IvfArtSummaryList"; // No matching record, return to list
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
            $returnUrl = "IvfArtSummaryList"; // Not page request, return to list
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
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Spermorigin->setDbValue($row['Spermorigin']);
        $this->IndicationforART->setDbValue($row['IndicationforART']);
        $this->DateofICSI->setDbValue($row['DateofICSI']);
        $this->Origin->setDbValue($row['Origin']);
        $this->Status->setDbValue($row['Status']);
        $this->Method->setDbValue($row['Method']);
        $this->pre_Concentration->setDbValue($row['pre_Concentration']);
        $this->pre_Motility->setDbValue($row['pre_Motility']);
        $this->pre_Morphology->setDbValue($row['pre_Morphology']);
        $this->post_Concentration->setDbValue($row['post_Concentration']);
        $this->post_Motility->setDbValue($row['post_Motility']);
        $this->post_Morphology->setDbValue($row['post_Morphology']);
        $this->NumberofEmbryostransferred->setDbValue($row['NumberofEmbryostransferred']);
        $this->Embryosunderobservation->setDbValue($row['Embryosunderobservation']);
        $this->EmbryoDevelopmentSummary->setDbValue($row['EmbryoDevelopmentSummary']);
        $this->EmbryologistSignature->setDbValue($row['EmbryologistSignature']);
        $this->IVFRegistrationID->setDbValue($row['IVFRegistrationID']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->ICSIDetails->setDbValue($row['ICSIDetails']);
        $this->DateofET->setDbValue($row['DateofET']);
        $this->Reasonfornotranfer->setDbValue($row['Reasonfornotranfer']);
        $this->EmbryosCryopreserved->setDbValue($row['EmbryosCryopreserved']);
        $this->LegendCellStage->setDbValue($row['LegendCellStage']);
        $this->ConsultantsSignature->setDbValue($row['ConsultantsSignature']);
        $this->Name->setDbValue($row['Name']);
        $this->M2->setDbValue($row['M2']);
        $this->Mi2->setDbValue($row['Mi2']);
        $this->ICSI->setDbValue($row['ICSI']);
        $this->IVF->setDbValue($row['IVF']);
        $this->M1->setDbValue($row['M1']);
        $this->GV->setDbValue($row['GV']);
        $this->_Others->setDbValue($row['Others']);
        $this->Normal2PN->setDbValue($row['Normal2PN']);
        $this->Abnormalfertilisation1N->setDbValue($row['Abnormalfertilisation1N']);
        $this->Abnormalfertilisation3N->setDbValue($row['Abnormalfertilisation3N']);
        $this->NotFertilized->setDbValue($row['NotFertilized']);
        $this->Degenerated->setDbValue($row['Degenerated']);
        $this->SpermDate->setDbValue($row['SpermDate']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Day1->setDbValue($row['Day1']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->State1->setDbValue($row['State1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->Day2->setDbValue($row['Day2']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->State2->setDbValue($row['State2']);
        $this->Code3->setDbValue($row['Code3']);
        $this->Day3->setDbValue($row['Day3']);
        $this->CellStage3->setDbValue($row['CellStage3']);
        $this->Grade3->setDbValue($row['Grade3']);
        $this->State3->setDbValue($row['State3']);
        $this->Code4->setDbValue($row['Code4']);
        $this->Day4->setDbValue($row['Day4']);
        $this->CellStage4->setDbValue($row['CellStage4']);
        $this->Grade4->setDbValue($row['Grade4']);
        $this->State4->setDbValue($row['State4']);
        $this->Code5->setDbValue($row['Code5']);
        $this->Day5->setDbValue($row['Day5']);
        $this->CellStage5->setDbValue($row['CellStage5']);
        $this->Grade5->setDbValue($row['Grade5']);
        $this->State5->setDbValue($row['State5']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Volume->setDbValue($row['Volume']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total->setDbValue($row['Total']);
        $this->Total1->setDbValue($row['Total1']);
        $this->Total2->setDbValue($row['Total2']);
        $this->Progressive->setDbValue($row['Progressive']);
        $this->Progressive1->setDbValue($row['Progressive1']);
        $this->Progressive2->setDbValue($row['Progressive2']);
        $this->NotProgressive->setDbValue($row['NotProgressive']);
        $this->NotProgressive1->setDbValue($row['NotProgressive1']);
        $this->NotProgressive2->setDbValue($row['NotProgressive2']);
        $this->Motility2->setDbValue($row['Motility2']);
        $this->Morphology2->setDbValue($row['Morphology2']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ARTCycle'] = null;
        $row['Spermorigin'] = null;
        $row['IndicationforART'] = null;
        $row['DateofICSI'] = null;
        $row['Origin'] = null;
        $row['Status'] = null;
        $row['Method'] = null;
        $row['pre_Concentration'] = null;
        $row['pre_Motility'] = null;
        $row['pre_Morphology'] = null;
        $row['post_Concentration'] = null;
        $row['post_Motility'] = null;
        $row['post_Morphology'] = null;
        $row['NumberofEmbryostransferred'] = null;
        $row['Embryosunderobservation'] = null;
        $row['EmbryoDevelopmentSummary'] = null;
        $row['EmbryologistSignature'] = null;
        $row['IVFRegistrationID'] = null;
        $row['InseminatinTechnique'] = null;
        $row['ICSIDetails'] = null;
        $row['DateofET'] = null;
        $row['Reasonfornotranfer'] = null;
        $row['EmbryosCryopreserved'] = null;
        $row['LegendCellStage'] = null;
        $row['ConsultantsSignature'] = null;
        $row['Name'] = null;
        $row['M2'] = null;
        $row['Mi2'] = null;
        $row['ICSI'] = null;
        $row['IVF'] = null;
        $row['M1'] = null;
        $row['GV'] = null;
        $row['Others'] = null;
        $row['Normal2PN'] = null;
        $row['Abnormalfertilisation1N'] = null;
        $row['Abnormalfertilisation3N'] = null;
        $row['NotFertilized'] = null;
        $row['Degenerated'] = null;
        $row['SpermDate'] = null;
        $row['Code1'] = null;
        $row['Day1'] = null;
        $row['CellStage1'] = null;
        $row['Grade1'] = null;
        $row['State1'] = null;
        $row['Code2'] = null;
        $row['Day2'] = null;
        $row['CellStage2'] = null;
        $row['Grade2'] = null;
        $row['State2'] = null;
        $row['Code3'] = null;
        $row['Day3'] = null;
        $row['CellStage3'] = null;
        $row['Grade3'] = null;
        $row['State3'] = null;
        $row['Code4'] = null;
        $row['Day4'] = null;
        $row['CellStage4'] = null;
        $row['Grade4'] = null;
        $row['State4'] = null;
        $row['Code5'] = null;
        $row['Day5'] = null;
        $row['CellStage5'] = null;
        $row['Grade5'] = null;
        $row['State5'] = null;
        $row['TidNo'] = null;
        $row['RIDNo'] = null;
        $row['Volume'] = null;
        $row['Volume1'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total'] = null;
        $row['Total1'] = null;
        $row['Total2'] = null;
        $row['Progressive'] = null;
        $row['Progressive1'] = null;
        $row['Progressive2'] = null;
        $row['NotProgressive'] = null;
        $row['NotProgressive1'] = null;
        $row['NotProgressive2'] = null;
        $row['Motility2'] = null;
        $row['Morphology2'] = null;
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

        // ARTCycle

        // Spermorigin

        // IndicationforART

        // DateofICSI

        // Origin

        // Status

        // Method

        // pre_Concentration

        // pre_Motility

        // pre_Morphology

        // post_Concentration

        // post_Motility

        // post_Morphology

        // NumberofEmbryostransferred

        // Embryosunderobservation

        // EmbryoDevelopmentSummary

        // EmbryologistSignature

        // IVFRegistrationID

        // InseminatinTechnique

        // ICSIDetails

        // DateofET

        // Reasonfornotranfer

        // EmbryosCryopreserved

        // LegendCellStage

        // ConsultantsSignature

        // Name

        // M2

        // Mi2

        // ICSI

        // IVF

        // M1

        // GV

        // Others

        // Normal2PN

        // Abnormalfertilisation1N

        // Abnormalfertilisation3N

        // NotFertilized

        // Degenerated

        // SpermDate

        // Code1

        // Day1

        // CellStage1

        // Grade1

        // State1

        // Code2

        // Day2

        // CellStage2

        // Grade2

        // State2

        // Code3

        // Day3

        // CellStage3

        // Grade3

        // State3

        // Code4

        // Day4

        // CellStage4

        // Grade4

        // State4

        // Code5

        // Day5

        // CellStage5

        // Grade5

        // State5

        // TidNo

        // RIDNo

        // Volume

        // Volume1

        // Volume2

        // Concentration2

        // Total

        // Total1

        // Total2

        // Progressive

        // Progressive1

        // Progressive2

        // NotProgressive

        // NotProgressive1

        // NotProgressive2

        // Motility2

        // Morphology2
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ARTCycle
            if (strval($this->ARTCycle->CurrentValue) != "") {
                $this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
            } else {
                $this->ARTCycle->ViewValue = null;
            }
            $this->ARTCycle->ViewCustomAttributes = "";

            // Spermorigin
            if (strval($this->Spermorigin->CurrentValue) != "") {
                $this->Spermorigin->ViewValue = $this->Spermorigin->optionCaption($this->Spermorigin->CurrentValue);
            } else {
                $this->Spermorigin->ViewValue = null;
            }
            $this->Spermorigin->ViewCustomAttributes = "";

            // IndicationforART
            $this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
            $this->IndicationforART->ViewCustomAttributes = "";

            // DateofICSI
            $this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
            $this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 7);
            $this->DateofICSI->ViewCustomAttributes = "";

            // Origin
            if (strval($this->Origin->CurrentValue) != "") {
                $this->Origin->ViewValue = $this->Origin->optionCaption($this->Origin->CurrentValue);
            } else {
                $this->Origin->ViewValue = null;
            }
            $this->Origin->ViewCustomAttributes = "";

            // Status
            if (strval($this->Status->CurrentValue) != "") {
                $this->Status->ViewValue = $this->Status->optionCaption($this->Status->CurrentValue);
            } else {
                $this->Status->ViewValue = null;
            }
            $this->Status->ViewCustomAttributes = "";

            // Method
            if (strval($this->Method->CurrentValue) != "") {
                $this->Method->ViewValue = $this->Method->optionCaption($this->Method->CurrentValue);
            } else {
                $this->Method->ViewValue = null;
            }
            $this->Method->ViewCustomAttributes = "";

            // pre_Concentration
            $this->pre_Concentration->ViewValue = $this->pre_Concentration->CurrentValue;
            $this->pre_Concentration->ViewCustomAttributes = "";

            // pre_Motility
            $this->pre_Motility->ViewValue = $this->pre_Motility->CurrentValue;
            $this->pre_Motility->ViewCustomAttributes = "";

            // pre_Morphology
            $this->pre_Morphology->ViewValue = $this->pre_Morphology->CurrentValue;
            $this->pre_Morphology->ViewCustomAttributes = "";

            // post_Concentration
            $this->post_Concentration->ViewValue = $this->post_Concentration->CurrentValue;
            $this->post_Concentration->ViewCustomAttributes = "";

            // post_Motility
            $this->post_Motility->ViewValue = $this->post_Motility->CurrentValue;
            $this->post_Motility->ViewCustomAttributes = "";

            // post_Morphology
            $this->post_Morphology->ViewValue = $this->post_Morphology->CurrentValue;
            $this->post_Morphology->ViewCustomAttributes = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
            $this->NumberofEmbryostransferred->ViewCustomAttributes = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
            $this->Embryosunderobservation->ViewCustomAttributes = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
            $this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
            $this->EmbryologistSignature->ViewCustomAttributes = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
            $this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
            $this->IVFRegistrationID->ViewCustomAttributes = "";

            // InseminatinTechnique
            if (strval($this->InseminatinTechnique->CurrentValue) != "") {
                $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
            } else {
                $this->InseminatinTechnique->ViewValue = null;
            }
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // ICSIDetails
            $this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
            $this->ICSIDetails->ViewCustomAttributes = "";

            // DateofET
            if (strval($this->DateofET->CurrentValue) != "") {
                $this->DateofET->ViewValue = $this->DateofET->optionCaption($this->DateofET->CurrentValue);
            } else {
                $this->DateofET->ViewValue = null;
            }
            $this->DateofET->ViewCustomAttributes = "";

            // Reasonfornotranfer
            if (strval($this->Reasonfornotranfer->CurrentValue) != "") {
                $this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->optionCaption($this->Reasonfornotranfer->CurrentValue);
            } else {
                $this->Reasonfornotranfer->ViewValue = null;
            }
            $this->Reasonfornotranfer->ViewCustomAttributes = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
            $this->EmbryosCryopreserved->ViewCustomAttributes = "";

            // LegendCellStage
            $this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
            $this->LegendCellStage->ViewCustomAttributes = "";

            // ConsultantsSignature
            $curVal = trim(strval($this->ConsultantsSignature->CurrentValue));
            if ($curVal != "") {
                $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
                if ($this->ConsultantsSignature->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ConsultantsSignature->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ConsultantsSignature->Lookup->renderViewRow($rswrk[0]);
                        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
                    } else {
                        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
                    }
                }
            } else {
                $this->ConsultantsSignature->ViewValue = null;
            }
            $this->ConsultantsSignature->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // M2
            $this->M2->ViewValue = $this->M2->CurrentValue;
            $this->M2->ViewCustomAttributes = "";

            // Mi2
            $this->Mi2->ViewValue = $this->Mi2->CurrentValue;
            $this->Mi2->ViewCustomAttributes = "";

            // ICSI
            $this->ICSI->ViewValue = $this->ICSI->CurrentValue;
            $this->ICSI->ViewCustomAttributes = "";

            // IVF
            $this->IVF->ViewValue = $this->IVF->CurrentValue;
            $this->IVF->ViewCustomAttributes = "";

            // M1
            $this->M1->ViewValue = $this->M1->CurrentValue;
            $this->M1->ViewCustomAttributes = "";

            // GV
            $this->GV->ViewValue = $this->GV->CurrentValue;
            $this->GV->ViewCustomAttributes = "";

            // Others
            $this->_Others->ViewValue = $this->_Others->CurrentValue;
            $this->_Others->ViewCustomAttributes = "";

            // Normal2PN
            $this->Normal2PN->ViewValue = $this->Normal2PN->CurrentValue;
            $this->Normal2PN->ViewCustomAttributes = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->ViewValue = $this->Abnormalfertilisation1N->CurrentValue;
            $this->Abnormalfertilisation1N->ViewCustomAttributes = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->ViewValue = $this->Abnormalfertilisation3N->CurrentValue;
            $this->Abnormalfertilisation3N->ViewCustomAttributes = "";

            // NotFertilized
            $this->NotFertilized->ViewValue = $this->NotFertilized->CurrentValue;
            $this->NotFertilized->ViewCustomAttributes = "";

            // Degenerated
            $this->Degenerated->ViewValue = $this->Degenerated->CurrentValue;
            $this->Degenerated->ViewCustomAttributes = "";

            // SpermDate
            $this->SpermDate->ViewValue = $this->SpermDate->CurrentValue;
            $this->SpermDate->ViewValue = FormatDateTime($this->SpermDate->ViewValue, 0);
            $this->SpermDate->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Day1
            if (strval($this->Day1->CurrentValue) != "") {
                $this->Day1->ViewValue = $this->Day1->optionCaption($this->Day1->CurrentValue);
            } else {
                $this->Day1->ViewValue = null;
            }
            $this->Day1->ViewCustomAttributes = "";

            // CellStage1
            if (strval($this->CellStage1->CurrentValue) != "") {
                $this->CellStage1->ViewValue = $this->CellStage1->optionCaption($this->CellStage1->CurrentValue);
            } else {
                $this->CellStage1->ViewValue = null;
            }
            $this->CellStage1->ViewCustomAttributes = "";

            // Grade1
            if (strval($this->Grade1->CurrentValue) != "") {
                $this->Grade1->ViewValue = $this->Grade1->optionCaption($this->Grade1->CurrentValue);
            } else {
                $this->Grade1->ViewValue = null;
            }
            $this->Grade1->ViewCustomAttributes = "";

            // State1
            if (strval($this->State1->CurrentValue) != "") {
                $this->State1->ViewValue = $this->State1->optionCaption($this->State1->CurrentValue);
            } else {
                $this->State1->ViewValue = null;
            }
            $this->State1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // Day2
            if (strval($this->Day2->CurrentValue) != "") {
                $this->Day2->ViewValue = $this->Day2->optionCaption($this->Day2->CurrentValue);
            } else {
                $this->Day2->ViewValue = null;
            }
            $this->Day2->ViewCustomAttributes = "";

            // CellStage2
            if (strval($this->CellStage2->CurrentValue) != "") {
                $this->CellStage2->ViewValue = $this->CellStage2->optionCaption($this->CellStage2->CurrentValue);
            } else {
                $this->CellStage2->ViewValue = null;
            }
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade2
            if (strval($this->Grade2->CurrentValue) != "") {
                $this->Grade2->ViewValue = $this->Grade2->optionCaption($this->Grade2->CurrentValue);
            } else {
                $this->Grade2->ViewValue = null;
            }
            $this->Grade2->ViewCustomAttributes = "";

            // State2
            if (strval($this->State2->CurrentValue) != "") {
                $this->State2->ViewValue = $this->State2->optionCaption($this->State2->CurrentValue);
            } else {
                $this->State2->ViewValue = null;
            }
            $this->State2->ViewCustomAttributes = "";

            // Code3
            $this->Code3->ViewValue = $this->Code3->CurrentValue;
            $this->Code3->ViewCustomAttributes = "";

            // Day3
            if (strval($this->Day3->CurrentValue) != "") {
                $this->Day3->ViewValue = $this->Day3->optionCaption($this->Day3->CurrentValue);
            } else {
                $this->Day3->ViewValue = null;
            }
            $this->Day3->ViewCustomAttributes = "";

            // CellStage3
            if (strval($this->CellStage3->CurrentValue) != "") {
                $this->CellStage3->ViewValue = $this->CellStage3->optionCaption($this->CellStage3->CurrentValue);
            } else {
                $this->CellStage3->ViewValue = null;
            }
            $this->CellStage3->ViewCustomAttributes = "";

            // Grade3
            if (strval($this->Grade3->CurrentValue) != "") {
                $this->Grade3->ViewValue = $this->Grade3->optionCaption($this->Grade3->CurrentValue);
            } else {
                $this->Grade3->ViewValue = null;
            }
            $this->Grade3->ViewCustomAttributes = "";

            // State3
            if (strval($this->State3->CurrentValue) != "") {
                $this->State3->ViewValue = $this->State3->optionCaption($this->State3->CurrentValue);
            } else {
                $this->State3->ViewValue = null;
            }
            $this->State3->ViewCustomAttributes = "";

            // Code4
            $this->Code4->ViewValue = $this->Code4->CurrentValue;
            $this->Code4->ViewCustomAttributes = "";

            // Day4
            if (strval($this->Day4->CurrentValue) != "") {
                $this->Day4->ViewValue = $this->Day4->optionCaption($this->Day4->CurrentValue);
            } else {
                $this->Day4->ViewValue = null;
            }
            $this->Day4->ViewCustomAttributes = "";

            // CellStage4
            if (strval($this->CellStage4->CurrentValue) != "") {
                $this->CellStage4->ViewValue = $this->CellStage4->optionCaption($this->CellStage4->CurrentValue);
            } else {
                $this->CellStage4->ViewValue = null;
            }
            $this->CellStage4->ViewCustomAttributes = "";

            // Grade4
            if (strval($this->Grade4->CurrentValue) != "") {
                $this->Grade4->ViewValue = $this->Grade4->optionCaption($this->Grade4->CurrentValue);
            } else {
                $this->Grade4->ViewValue = null;
            }
            $this->Grade4->ViewCustomAttributes = "";

            // State4
            if (strval($this->State4->CurrentValue) != "") {
                $this->State4->ViewValue = $this->State4->optionCaption($this->State4->CurrentValue);
            } else {
                $this->State4->ViewValue = null;
            }
            $this->State4->ViewCustomAttributes = "";

            // Code5
            $this->Code5->ViewValue = $this->Code5->CurrentValue;
            $this->Code5->ViewCustomAttributes = "";

            // Day5
            if (strval($this->Day5->CurrentValue) != "") {
                $this->Day5->ViewValue = $this->Day5->optionCaption($this->Day5->CurrentValue);
            } else {
                $this->Day5->ViewValue = null;
            }
            $this->Day5->ViewCustomAttributes = "";

            // CellStage5
            if (strval($this->CellStage5->CurrentValue) != "") {
                $this->CellStage5->ViewValue = $this->CellStage5->optionCaption($this->CellStage5->CurrentValue);
            } else {
                $this->CellStage5->ViewValue = null;
            }
            $this->CellStage5->ViewCustomAttributes = "";

            // Grade5
            if (strval($this->Grade5->CurrentValue) != "") {
                $this->Grade5->ViewValue = $this->Grade5->optionCaption($this->Grade5->CurrentValue);
            } else {
                $this->Grade5->ViewValue = null;
            }
            $this->Grade5->ViewCustomAttributes = "";

            // State5
            if (strval($this->State5->CurrentValue) != "") {
                $this->State5->ViewValue = $this->State5->optionCaption($this->State5->CurrentValue);
            } else {
                $this->State5->ViewValue = null;
            }
            $this->State5->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // Progressive
            $this->Progressive->ViewValue = $this->Progressive->CurrentValue;
            $this->Progressive->ViewCustomAttributes = "";

            // Progressive1
            $this->Progressive1->ViewValue = $this->Progressive1->CurrentValue;
            $this->Progressive1->ViewCustomAttributes = "";

            // Progressive2
            $this->Progressive2->ViewValue = $this->Progressive2->CurrentValue;
            $this->Progressive2->ViewCustomAttributes = "";

            // NotProgressive
            $this->NotProgressive->ViewValue = $this->NotProgressive->CurrentValue;
            $this->NotProgressive->ViewCustomAttributes = "";

            // NotProgressive1
            $this->NotProgressive1->ViewValue = $this->NotProgressive1->CurrentValue;
            $this->NotProgressive1->ViewCustomAttributes = "";

            // NotProgressive2
            $this->NotProgressive2->ViewValue = $this->NotProgressive2->CurrentValue;
            $this->NotProgressive2->ViewCustomAttributes = "";

            // Motility2
            $this->Motility2->ViewValue = $this->Motility2->CurrentValue;
            $this->Motility2->ViewCustomAttributes = "";

            // Morphology2
            $this->Morphology2->ViewValue = $this->Morphology2->CurrentValue;
            $this->Morphology2->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Spermorigin
            $this->Spermorigin->LinkCustomAttributes = "";
            $this->Spermorigin->HrefValue = "";
            $this->Spermorigin->TooltipValue = "";

            // IndicationforART
            $this->IndicationforART->LinkCustomAttributes = "";
            $this->IndicationforART->HrefValue = "";
            $this->IndicationforART->TooltipValue = "";

            // DateofICSI
            $this->DateofICSI->LinkCustomAttributes = "";
            $this->DateofICSI->HrefValue = "";
            $this->DateofICSI->TooltipValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // pre_Concentration
            $this->pre_Concentration->LinkCustomAttributes = "";
            $this->pre_Concentration->HrefValue = "";
            $this->pre_Concentration->TooltipValue = "";

            // pre_Motility
            $this->pre_Motility->LinkCustomAttributes = "";
            $this->pre_Motility->HrefValue = "";
            $this->pre_Motility->TooltipValue = "";

            // pre_Morphology
            $this->pre_Morphology->LinkCustomAttributes = "";
            $this->pre_Morphology->HrefValue = "";
            $this->pre_Morphology->TooltipValue = "";

            // post_Concentration
            $this->post_Concentration->LinkCustomAttributes = "";
            $this->post_Concentration->HrefValue = "";
            $this->post_Concentration->TooltipValue = "";

            // post_Motility
            $this->post_Motility->LinkCustomAttributes = "";
            $this->post_Motility->HrefValue = "";
            $this->post_Motility->TooltipValue = "";

            // post_Morphology
            $this->post_Morphology->LinkCustomAttributes = "";
            $this->post_Morphology->HrefValue = "";
            $this->post_Morphology->TooltipValue = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->LinkCustomAttributes = "";
            $this->NumberofEmbryostransferred->HrefValue = "";
            $this->NumberofEmbryostransferred->TooltipValue = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->LinkCustomAttributes = "";
            $this->Embryosunderobservation->HrefValue = "";
            $this->Embryosunderobservation->TooltipValue = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
            $this->EmbryoDevelopmentSummary->HrefValue = "";
            $this->EmbryoDevelopmentSummary->TooltipValue = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->LinkCustomAttributes = "";
            $this->EmbryologistSignature->HrefValue = "";
            $this->EmbryologistSignature->TooltipValue = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->LinkCustomAttributes = "";
            $this->IVFRegistrationID->HrefValue = "";
            $this->IVFRegistrationID->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // ICSIDetails
            $this->ICSIDetails->LinkCustomAttributes = "";
            $this->ICSIDetails->HrefValue = "";
            $this->ICSIDetails->TooltipValue = "";

            // DateofET
            $this->DateofET->LinkCustomAttributes = "";
            $this->DateofET->HrefValue = "";
            $this->DateofET->TooltipValue = "";

            // Reasonfornotranfer
            $this->Reasonfornotranfer->LinkCustomAttributes = "";
            $this->Reasonfornotranfer->HrefValue = "";
            $this->Reasonfornotranfer->TooltipValue = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->LinkCustomAttributes = "";
            $this->EmbryosCryopreserved->HrefValue = "";
            $this->EmbryosCryopreserved->TooltipValue = "";

            // LegendCellStage
            $this->LegendCellStage->LinkCustomAttributes = "";
            $this->LegendCellStage->HrefValue = "";
            $this->LegendCellStage->TooltipValue = "";

            // ConsultantsSignature
            $this->ConsultantsSignature->LinkCustomAttributes = "";
            $this->ConsultantsSignature->HrefValue = "";
            $this->ConsultantsSignature->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // M2
            $this->M2->LinkCustomAttributes = "";
            $this->M2->HrefValue = "";
            $this->M2->TooltipValue = "";

            // Mi2
            $this->Mi2->LinkCustomAttributes = "";
            $this->Mi2->HrefValue = "";
            $this->Mi2->TooltipValue = "";

            // ICSI
            $this->ICSI->LinkCustomAttributes = "";
            $this->ICSI->HrefValue = "";
            $this->ICSI->TooltipValue = "";

            // IVF
            $this->IVF->LinkCustomAttributes = "";
            $this->IVF->HrefValue = "";
            $this->IVF->TooltipValue = "";

            // M1
            $this->M1->LinkCustomAttributes = "";
            $this->M1->HrefValue = "";
            $this->M1->TooltipValue = "";

            // GV
            $this->GV->LinkCustomAttributes = "";
            $this->GV->HrefValue = "";
            $this->GV->TooltipValue = "";

            // Others
            $this->_Others->LinkCustomAttributes = "";
            $this->_Others->HrefValue = "";
            $this->_Others->TooltipValue = "";

            // Normal2PN
            $this->Normal2PN->LinkCustomAttributes = "";
            $this->Normal2PN->HrefValue = "";
            $this->Normal2PN->TooltipValue = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation1N->HrefValue = "";
            $this->Abnormalfertilisation1N->TooltipValue = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation3N->HrefValue = "";
            $this->Abnormalfertilisation3N->TooltipValue = "";

            // NotFertilized
            $this->NotFertilized->LinkCustomAttributes = "";
            $this->NotFertilized->HrefValue = "";
            $this->NotFertilized->TooltipValue = "";

            // Degenerated
            $this->Degenerated->LinkCustomAttributes = "";
            $this->Degenerated->HrefValue = "";
            $this->Degenerated->TooltipValue = "";

            // SpermDate
            $this->SpermDate->LinkCustomAttributes = "";
            $this->SpermDate->HrefValue = "";
            $this->SpermDate->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Day1
            $this->Day1->LinkCustomAttributes = "";
            $this->Day1->HrefValue = "";
            $this->Day1->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // State1
            $this->State1->LinkCustomAttributes = "";
            $this->State1->HrefValue = "";
            $this->State1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // Day2
            $this->Day2->LinkCustomAttributes = "";
            $this->Day2->HrefValue = "";
            $this->Day2->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // State2
            $this->State2->LinkCustomAttributes = "";
            $this->State2->HrefValue = "";
            $this->State2->TooltipValue = "";

            // Code3
            $this->Code3->LinkCustomAttributes = "";
            $this->Code3->HrefValue = "";
            $this->Code3->TooltipValue = "";

            // Day3
            $this->Day3->LinkCustomAttributes = "";
            $this->Day3->HrefValue = "";
            $this->Day3->TooltipValue = "";

            // CellStage3
            $this->CellStage3->LinkCustomAttributes = "";
            $this->CellStage3->HrefValue = "";
            $this->CellStage3->TooltipValue = "";

            // Grade3
            $this->Grade3->LinkCustomAttributes = "";
            $this->Grade3->HrefValue = "";
            $this->Grade3->TooltipValue = "";

            // State3
            $this->State3->LinkCustomAttributes = "";
            $this->State3->HrefValue = "";
            $this->State3->TooltipValue = "";

            // Code4
            $this->Code4->LinkCustomAttributes = "";
            $this->Code4->HrefValue = "";
            $this->Code4->TooltipValue = "";

            // Day4
            $this->Day4->LinkCustomAttributes = "";
            $this->Day4->HrefValue = "";
            $this->Day4->TooltipValue = "";

            // CellStage4
            $this->CellStage4->LinkCustomAttributes = "";
            $this->CellStage4->HrefValue = "";
            $this->CellStage4->TooltipValue = "";

            // Grade4
            $this->Grade4->LinkCustomAttributes = "";
            $this->Grade4->HrefValue = "";
            $this->Grade4->TooltipValue = "";

            // State4
            $this->State4->LinkCustomAttributes = "";
            $this->State4->HrefValue = "";
            $this->State4->TooltipValue = "";

            // Code5
            $this->Code5->LinkCustomAttributes = "";
            $this->Code5->HrefValue = "";
            $this->Code5->TooltipValue = "";

            // Day5
            $this->Day5->LinkCustomAttributes = "";
            $this->Day5->HrefValue = "";
            $this->Day5->TooltipValue = "";

            // CellStage5
            $this->CellStage5->LinkCustomAttributes = "";
            $this->CellStage5->HrefValue = "";
            $this->CellStage5->TooltipValue = "";

            // Grade5
            $this->Grade5->LinkCustomAttributes = "";
            $this->Grade5->HrefValue = "";
            $this->Grade5->TooltipValue = "";

            // State5
            $this->State5->LinkCustomAttributes = "";
            $this->State5->HrefValue = "";
            $this->State5->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // Progressive
            $this->Progressive->LinkCustomAttributes = "";
            $this->Progressive->HrefValue = "";
            $this->Progressive->TooltipValue = "";

            // Progressive1
            $this->Progressive1->LinkCustomAttributes = "";
            $this->Progressive1->HrefValue = "";
            $this->Progressive1->TooltipValue = "";

            // Progressive2
            $this->Progressive2->LinkCustomAttributes = "";
            $this->Progressive2->HrefValue = "";
            $this->Progressive2->TooltipValue = "";

            // NotProgressive
            $this->NotProgressive->LinkCustomAttributes = "";
            $this->NotProgressive->HrefValue = "";
            $this->NotProgressive->TooltipValue = "";

            // NotProgressive1
            $this->NotProgressive1->LinkCustomAttributes = "";
            $this->NotProgressive1->HrefValue = "";
            $this->NotProgressive1->TooltipValue = "";

            // NotProgressive2
            $this->NotProgressive2->LinkCustomAttributes = "";
            $this->NotProgressive2->HrefValue = "";
            $this->NotProgressive2->TooltipValue = "";

            // Motility2
            $this->Motility2->LinkCustomAttributes = "";
            $this->Motility2->HrefValue = "";
            $this->Motility2->TooltipValue = "";

            // Morphology2
            $this->Morphology2->LinkCustomAttributes = "";
            $this->Morphology2->HrefValue = "";
            $this->Morphology2->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_art_summaryview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_art_summaryview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_art_summaryview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_ivf_art_summary" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_art_summary\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_art_summaryview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfArtSummaryList"), "", $this->TableVar, true);
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
                case "x_ARTCycle":
                    break;
                case "x_Spermorigin":
                    break;
                case "x_Origin":
                    break;
                case "x_Status":
                    break;
                case "x_Method":
                    break;
                case "x_InseminatinTechnique":
                    break;
                case "x_DateofET":
                    break;
                case "x_Reasonfornotranfer":
                    break;
                case "x_ConsultantsSignature":
                    break;
                case "x_Day1":
                    break;
                case "x_CellStage1":
                    break;
                case "x_Grade1":
                    break;
                case "x_State1":
                    break;
                case "x_Day2":
                    break;
                case "x_CellStage2":
                    break;
                case "x_Grade2":
                    break;
                case "x_State2":
                    break;
                case "x_Day3":
                    break;
                case "x_CellStage3":
                    break;
                case "x_Grade3":
                    break;
                case "x_State3":
                    break;
                case "x_Day4":
                    break;
                case "x_CellStage4":
                    break;
                case "x_Grade4":
                    break;
                case "x_State4":
                    break;
                case "x_Day5":
                    break;
                case "x_CellStage5":
                    break;
                case "x_Grade5":
                    break;
                case "x_State5":
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
