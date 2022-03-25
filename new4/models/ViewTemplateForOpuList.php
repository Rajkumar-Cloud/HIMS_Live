<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewTemplateForOpuList extends ViewTemplateForOpu
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_template_for_opu';

    // Page object name
    public $PageObjName = "ViewTemplateForOpuList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_template_for_opulist";
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

        // Table object (view_template_for_opu)
        if (!isset($GLOBALS["view_template_for_opu"]) || get_class($GLOBALS["view_template_for_opu"]) == PROJECT_NAMESPACE . "view_template_for_opu") {
            $GLOBALS["view_template_for_opu"] = &$this;
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
        $this->AddUrl = "ViewTemplateForOpuAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewTemplateForOpuDelete";
        $this->MultiUpdateUrl = "ViewTemplateForOpuUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_template_for_opu');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_template_for_opulistsrch";

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
                $doc = new $class(Container("view_template_for_opu"));
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
        $this->RIDNO->setVisibility();
        $this->Treatment->setVisibility();
        $this->Origin->setVisibility();
        $this->MaleIndications->setVisibility();
        $this->FemaleIndications->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatientID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerID->setVisibility();
        $this->A4ICSICycle->setVisibility();
        $this->TotalICSICycle->setVisibility();
        $this->TypeOfInfertility->setVisibility();
        $this->RelevantHistory->setVisibility();
        $this->IUICycles->setVisibility();
        $this->AMH->setVisibility();
        $this->FBMI->setVisibility();
        $this->ANTAGONISTSTARTDAY->setVisibility();
        $this->OvarianSurgery->setVisibility();
        $this->OPUDATE->setVisibility();
        $this->RFSH1->setVisibility();
        $this->RFSH2->setVisibility();
        $this->RFSH3->setVisibility();
        $this->E21->setVisibility();
        $this->Hysteroscopy->setVisibility();
        $this->HospID->setVisibility();
        $this->Fweight->setVisibility();
        $this->AntiTPO->setVisibility();
        $this->AntiTG->setVisibility();
        $this->PatientAge->setVisibility();
        $this->PartnerAge->setVisibility();
        $this->CYCLES->Visible = false;
        $this->MF->Visible = false;
        $this->CauseOfINFERTILITY->Visible = false;
        $this->SIS->Visible = false;
        $this->Scratching->Visible = false;
        $this->Cannulation->Visible = false;
        $this->MEPRATE->Visible = false;
        $this->ROVARY->setVisibility();
        $this->RAFC->setVisibility();
        $this->LOVARY->setVisibility();
        $this->LAFC->setVisibility();
        $this->LH1->Visible = false;
        $this->E2->setVisibility();
        $this->StemCellInstallation->Visible = false;
        $this->DHEAS->Visible = false;
        $this->Mtorr->Visible = false;
        $this->AMH1->setVisibility();
        $this->LH->Visible = false;
        $this->BMIMALE->setVisibility();
        $this->MaleMedicalConditions->setVisibility();
        $this->MaleExamination->Visible = false;
        $this->SpermConcentration->Visible = false;
        $this->SpermMotilityPNP->Visible = false;
        $this->SpermMorphology->Visible = false;
        $this->SpermRetrival->Visible = false;
        $this->MTestosterone->Visible = false;
        $this->DFI->Visible = false;
        $this->PreRX->Visible = false;
        $this->CC100->setVisibility();
        $this->RFSH1A->setVisibility();
        $this->HMG1->setVisibility();
        $this->RLH->Visible = false;
        $this->HMG_HP->Visible = false;
        $this->day_of_HMG->Visible = false;
        $this->Reason_for_HMG->Visible = false;
        $this->RLH_day->Visible = false;
        $this->DAYSOFSTIMULATION->setVisibility();
        $this->AnychangeinbetweenDoseaddedday->Visible = false;
        $this->dayofAnta->Visible = false;
        $this->RFSHTD->Visible = false;
        $this->RFSHHMGTD->Visible = false;
        $this->RFSHRLHTD->Visible = false;
        $this->HMGTD->Visible = false;
        $this->LHTD->Visible = false;
        $this->D1LH->Visible = false;
        $this->D1E2->Visible = false;
        $this->TriggerdayE2->Visible = false;
        $this->TriggerdayP4->Visible = false;
        $this->TriggerdayLH->Visible = false;
        $this->VITD->Visible = false;
        $this->TRIGGERR->setVisibility();
        $this->BHCGBEFORERETRIEVAL->Visible = false;
        $this->LH12HRS->Visible = false;
        $this->P412HRS->Visible = false;
        $this->ETonhCGday->Visible = false;
        $this->ETdoppler->Visible = false;
        $this->VIFIVFI->Visible = false;
        $this->Endometrialabnormality->Visible = false;
        $this->AFCONS1->Visible = false;
        $this->TIMEOFOPUFROMTRIGGER->Visible = false;
        $this->SPERMTYPE->Visible = false;
        $this->EXPECTEDONTRIGGERDAY->Visible = false;
        $this->OOCYTESRETRIEVED->Visible = false;
        $this->TIMEOFDENUDATION->Visible = false;
        $this->MII->Visible = false;
        $this->MI->Visible = false;
        $this->GV->Visible = false;
        $this->ICSITIMEFORMOPU->Visible = false;
        $this->FERT2PN->Visible = false;
        $this->DEG->Visible = false;
        $this->D3GRADEA->Visible = false;
        $this->D3GRADEB->Visible = false;
        $this->D3GRADEC->Visible = false;
        $this->D3GRADED->Visible = false;
        $this->USABLEONDAY3ET->Visible = false;
        $this->USABLEONday3FREEZING->Visible = false;
        $this->D5GARDEA->Visible = false;
        $this->D5GRADEB->Visible = false;
        $this->D5GRADEC->Visible = false;
        $this->D5GRADED->Visible = false;
        $this->USABLEOND5ET->Visible = false;
        $this->USABLEOND5FREEZING->Visible = false;
        $this->D6GRADEA->Visible = false;
        $this->D6GRADEB->Visible = false;
        $this->D6GRADEC->Visible = false;
        $this->D6GRADED->Visible = false;
        $this->D6USABLEEMBRYOET->Visible = false;
        $this->D6USABLEFREEZING->Visible = false;
        $this->TOTALBLAST->Visible = false;
        $this->PGS->Visible = false;
        $this->REMARKS->Visible = false;
        $this->PUDB->Visible = false;
        $this->ICSIDB->Visible = false;
        $this->VITDB->Visible = false;
        $this->ETDB->Visible = false;
        $this->LABCOMMENTS->Visible = false;
        $this->ReasonfornoFRESHtransfer->Visible = false;
        $this->NoofembryostransferredDay35ABC->Visible = false;
        $this->EMBRYOSPENDING->Visible = false;
        $this->DAYOFTRANSFER->Visible = false;
        $this->HDsperm->Visible = false;
        $this->Comments->Visible = false;
        $this->scprogesterone->Visible = false;
        $this->Naturalmicronised400mgbdduphaston10mgbd->Visible = false;
        $this->CRINONE->Visible = false;
        $this->progynova->Visible = false;
        $this->Heparin->Visible = false;
        $this->cabergolin->Visible = false;
        $this->Antagonist->Visible = false;
        $this->OHSS->Visible = false;
        $this->Complications->Visible = false;
        $this->LPbleeding->Visible = false;
        $this->hCG->Visible = false;
        $this->Implantationrate->Visible = false;
        $this->Ectopic->Visible = false;
        $this->Typeofpreg->Visible = false;
        $this->ANC->Visible = false;
        $this->anomalies->Visible = false;
        $this->babywt->Visible = false;
        $this->GAatdelivery->Visible = false;
        $this->Pregnancyoutcome->Visible = false;
        $this->_1stFET->Visible = false;
        $this->AFTERHYSTEROSCOPY->Visible = false;
        $this->AFTERERA->Visible = false;
        $this->ERA->Visible = false;
        $this->HRT->Visible = false;
        $this->XGRASTPRP->Visible = false;
        $this->EMBRYODETAILSDAY35ABC->Visible = false;
        $this->LMWH40MG->Visible = false;
        $this->hCG2->Visible = false;
        $this->Implantationrate1->Visible = false;
        $this->Ectopic1->Visible = false;
        $this->TypeofpregA->Visible = false;
        $this->ANC1->Visible = false;
        $this->anomalies2->Visible = false;
        $this->babywt2->Visible = false;
        $this->GAatdelivery1->Visible = false;
        $this->Pregnancyoutcome1->Visible = false;
        $this->_2NDFET->Visible = false;
        $this->AFTERHYSTEROSCOPY1->Visible = false;
        $this->AFTERERA1->Visible = false;
        $this->ERA1->Visible = false;
        $this->HRT1->Visible = false;
        $this->XGRASTPRP1->Visible = false;
        $this->NUMBEROFEMBRYOS->Visible = false;
        $this->EMBRYODETAILSDAY356ABC->Visible = false;
        $this->INTRALIPIDANDBARGLOBIN->Visible = false;
        $this->LMWH40MG1->Visible = false;
        $this->hCG1->Visible = false;
        $this->Implantationrate2->Visible = false;
        $this->Ectopic2->Visible = false;
        $this->Typeofpreg2->Visible = false;
        $this->ANCA->Visible = false;
        $this->anomalies1->Visible = false;
        $this->babywt1->Visible = false;
        $this->GAatdelivery2->Visible = false;
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_template_for_opulistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
        $filterList = Concat($filterList, $this->Origin->AdvancedSearch->toJson(), ","); // Field Origin
        $filterList = Concat($filterList, $this->MaleIndications->AdvancedSearch->toJson(), ","); // Field MaleIndications
        $filterList = Concat($filterList, $this->FemaleIndications->AdvancedSearch->toJson(), ","); // Field FemaleIndications
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
        $filterList = Concat($filterList, $this->A4ICSICycle->AdvancedSearch->toJson(), ","); // Field A4ICSICycle
        $filterList = Concat($filterList, $this->TotalICSICycle->AdvancedSearch->toJson(), ","); // Field TotalICSICycle
        $filterList = Concat($filterList, $this->TypeOfInfertility->AdvancedSearch->toJson(), ","); // Field TypeOfInfertility
        $filterList = Concat($filterList, $this->RelevantHistory->AdvancedSearch->toJson(), ","); // Field RelevantHistory
        $filterList = Concat($filterList, $this->IUICycles->AdvancedSearch->toJson(), ","); // Field IUICycles
        $filterList = Concat($filterList, $this->AMH->AdvancedSearch->toJson(), ","); // Field AMH
        $filterList = Concat($filterList, $this->FBMI->AdvancedSearch->toJson(), ","); // Field FBMI
        $filterList = Concat($filterList, $this->ANTAGONISTSTARTDAY->AdvancedSearch->toJson(), ","); // Field ANTAGONISTSTARTDAY
        $filterList = Concat($filterList, $this->OvarianSurgery->AdvancedSearch->toJson(), ","); // Field OvarianSurgery
        $filterList = Concat($filterList, $this->OPUDATE->AdvancedSearch->toJson(), ","); // Field OPUDATE
        $filterList = Concat($filterList, $this->RFSH1->AdvancedSearch->toJson(), ","); // Field RFSH1
        $filterList = Concat($filterList, $this->RFSH2->AdvancedSearch->toJson(), ","); // Field RFSH2
        $filterList = Concat($filterList, $this->RFSH3->AdvancedSearch->toJson(), ","); // Field RFSH3
        $filterList = Concat($filterList, $this->E21->AdvancedSearch->toJson(), ","); // Field E21
        $filterList = Concat($filterList, $this->Hysteroscopy->AdvancedSearch->toJson(), ","); // Field Hysteroscopy
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->Fweight->AdvancedSearch->toJson(), ","); // Field Fweight
        $filterList = Concat($filterList, $this->AntiTPO->AdvancedSearch->toJson(), ","); // Field AntiTPO
        $filterList = Concat($filterList, $this->AntiTG->AdvancedSearch->toJson(), ","); // Field AntiTG
        $filterList = Concat($filterList, $this->PatientAge->AdvancedSearch->toJson(), ","); // Field PatientAge
        $filterList = Concat($filterList, $this->PartnerAge->AdvancedSearch->toJson(), ","); // Field PartnerAge
        $filterList = Concat($filterList, $this->CYCLES->AdvancedSearch->toJson(), ","); // Field CYCLES
        $filterList = Concat($filterList, $this->MF->AdvancedSearch->toJson(), ","); // Field MF
        $filterList = Concat($filterList, $this->CauseOfINFERTILITY->AdvancedSearch->toJson(), ","); // Field CauseOfINFERTILITY
        $filterList = Concat($filterList, $this->SIS->AdvancedSearch->toJson(), ","); // Field SIS
        $filterList = Concat($filterList, $this->Scratching->AdvancedSearch->toJson(), ","); // Field Scratching
        $filterList = Concat($filterList, $this->Cannulation->AdvancedSearch->toJson(), ","); // Field Cannulation
        $filterList = Concat($filterList, $this->MEPRATE->AdvancedSearch->toJson(), ","); // Field MEPRATE
        $filterList = Concat($filterList, $this->ROVARY->AdvancedSearch->toJson(), ","); // Field R.OVARY
        $filterList = Concat($filterList, $this->RAFC->AdvancedSearch->toJson(), ","); // Field R.AFC
        $filterList = Concat($filterList, $this->LOVARY->AdvancedSearch->toJson(), ","); // Field L.OVARY
        $filterList = Concat($filterList, $this->LAFC->AdvancedSearch->toJson(), ","); // Field L.AFC
        $filterList = Concat($filterList, $this->LH1->AdvancedSearch->toJson(), ","); // Field LH1
        $filterList = Concat($filterList, $this->E2->AdvancedSearch->toJson(), ","); // Field E2
        $filterList = Concat($filterList, $this->StemCellInstallation->AdvancedSearch->toJson(), ","); // Field StemCellInstallation
        $filterList = Concat($filterList, $this->DHEAS->AdvancedSearch->toJson(), ","); // Field DHEAS
        $filterList = Concat($filterList, $this->Mtorr->AdvancedSearch->toJson(), ","); // Field Mtorr
        $filterList = Concat($filterList, $this->AMH1->AdvancedSearch->toJson(), ","); // Field AMH1
        $filterList = Concat($filterList, $this->LH->AdvancedSearch->toJson(), ","); // Field LH
        $filterList = Concat($filterList, $this->BMIMALE->AdvancedSearch->toJson(), ","); // Field BMI(MALE)
        $filterList = Concat($filterList, $this->MaleMedicalConditions->AdvancedSearch->toJson(), ","); // Field MaleMedicalConditions
        $filterList = Concat($filterList, $this->MaleExamination->AdvancedSearch->toJson(), ","); // Field MaleExamination
        $filterList = Concat($filterList, $this->SpermConcentration->AdvancedSearch->toJson(), ","); // Field SpermConcentration
        $filterList = Concat($filterList, $this->SpermMotilityPNP->AdvancedSearch->toJson(), ","); // Field SpermMotility(P&NP)
        $filterList = Concat($filterList, $this->SpermMorphology->AdvancedSearch->toJson(), ","); // Field SpermMorphology
        $filterList = Concat($filterList, $this->SpermRetrival->AdvancedSearch->toJson(), ","); // Field SpermRetrival
        $filterList = Concat($filterList, $this->MTestosterone->AdvancedSearch->toJson(), ","); // Field M.Testosterone
        $filterList = Concat($filterList, $this->DFI->AdvancedSearch->toJson(), ","); // Field DFI
        $filterList = Concat($filterList, $this->PreRX->AdvancedSearch->toJson(), ","); // Field PreRX
        $filterList = Concat($filterList, $this->CC100->AdvancedSearch->toJson(), ","); // Field CC 100
        $filterList = Concat($filterList, $this->RFSH1A->AdvancedSearch->toJson(), ","); // Field RFSH1A
        $filterList = Concat($filterList, $this->HMG1->AdvancedSearch->toJson(), ","); // Field HMG1
        $filterList = Concat($filterList, $this->RLH->AdvancedSearch->toJson(), ","); // Field RLH
        $filterList = Concat($filterList, $this->HMG_HP->AdvancedSearch->toJson(), ","); // Field HMG_HP
        $filterList = Concat($filterList, $this->day_of_HMG->AdvancedSearch->toJson(), ","); // Field day_of_HMG
        $filterList = Concat($filterList, $this->Reason_for_HMG->AdvancedSearch->toJson(), ","); // Field Reason_for_HMG
        $filterList = Concat($filterList, $this->RLH_day->AdvancedSearch->toJson(), ","); // Field RLH_day
        $filterList = Concat($filterList, $this->DAYSOFSTIMULATION->AdvancedSearch->toJson(), ","); // Field DAYSOFSTIMULATION
        $filterList = Concat($filterList, $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->toJson(), ","); // Field Any change inbetween ( Dose added , day)
        $filterList = Concat($filterList, $this->dayofAnta->AdvancedSearch->toJson(), ","); // Field day of Anta
        $filterList = Concat($filterList, $this->RFSHTD->AdvancedSearch->toJson(), ","); // Field R FSH TD
        $filterList = Concat($filterList, $this->RFSHHMGTD->AdvancedSearch->toJson(), ","); // Field R FSH + HMG TD
        $filterList = Concat($filterList, $this->RFSHRLHTD->AdvancedSearch->toJson(), ","); // Field R FSH + R LH TD
        $filterList = Concat($filterList, $this->HMGTD->AdvancedSearch->toJson(), ","); // Field HMG TD
        $filterList = Concat($filterList, $this->LHTD->AdvancedSearch->toJson(), ","); // Field LH TD
        $filterList = Concat($filterList, $this->D1LH->AdvancedSearch->toJson(), ","); // Field D1 LH
        $filterList = Concat($filterList, $this->D1E2->AdvancedSearch->toJson(), ","); // Field D1 E2
        $filterList = Concat($filterList, $this->TriggerdayE2->AdvancedSearch->toJson(), ","); // Field Trigger day E2
        $filterList = Concat($filterList, $this->TriggerdayP4->AdvancedSearch->toJson(), ","); // Field Trigger day P4
        $filterList = Concat($filterList, $this->TriggerdayLH->AdvancedSearch->toJson(), ","); // Field Trigger day LH
        $filterList = Concat($filterList, $this->VITD->AdvancedSearch->toJson(), ","); // Field VIT-D
        $filterList = Concat($filterList, $this->TRIGGERR->AdvancedSearch->toJson(), ","); // Field TRIGGERR
        $filterList = Concat($filterList, $this->BHCGBEFORERETRIEVAL->AdvancedSearch->toJson(), ","); // Field BHCG BEFORE RETRIEVAL
        $filterList = Concat($filterList, $this->LH12HRS->AdvancedSearch->toJson(), ","); // Field LH -12 HRS
        $filterList = Concat($filterList, $this->P412HRS->AdvancedSearch->toJson(), ","); // Field P4 -12 HRS
        $filterList = Concat($filterList, $this->ETonhCGday->AdvancedSearch->toJson(), ","); // Field ET on hCG day
        $filterList = Concat($filterList, $this->ETdoppler->AdvancedSearch->toJson(), ","); // Field ET doppler
        $filterList = Concat($filterList, $this->VIFIVFI->AdvancedSearch->toJson(), ","); // Field VI/FI/VFI
        $filterList = Concat($filterList, $this->Endometrialabnormality->AdvancedSearch->toJson(), ","); // Field Endometrial abnormality
        $filterList = Concat($filterList, $this->AFCONS1->AdvancedSearch->toJson(), ","); // Field AFC ON S1
        $filterList = Concat($filterList, $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->toJson(), ","); // Field TIME OF OPU FROM TRIGGER
        $filterList = Concat($filterList, $this->SPERMTYPE->AdvancedSearch->toJson(), ","); // Field SPERM TYPE
        $filterList = Concat($filterList, $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->toJson(), ","); // Field EXPECTED ON TRIGGER DAY
        $filterList = Concat($filterList, $this->OOCYTESRETRIEVED->AdvancedSearch->toJson(), ","); // Field OOCYTES RETRIEVED
        $filterList = Concat($filterList, $this->TIMEOFDENUDATION->AdvancedSearch->toJson(), ","); // Field TIME OF DENUDATION
        $filterList = Concat($filterList, $this->MII->AdvancedSearch->toJson(), ","); // Field M-II
        $filterList = Concat($filterList, $this->MI->AdvancedSearch->toJson(), ","); // Field MI
        $filterList = Concat($filterList, $this->GV->AdvancedSearch->toJson(), ","); // Field GV
        $filterList = Concat($filterList, $this->ICSITIMEFORMOPU->AdvancedSearch->toJson(), ","); // Field ICSI TIME FORM OPU
        $filterList = Concat($filterList, $this->FERT2PN->AdvancedSearch->toJson(), ","); // Field FERT ( 2 PN )
        $filterList = Concat($filterList, $this->DEG->AdvancedSearch->toJson(), ","); // Field DEG
        $filterList = Concat($filterList, $this->D3GRADEA->AdvancedSearch->toJson(), ","); // Field D3 GRADE A
        $filterList = Concat($filterList, $this->D3GRADEB->AdvancedSearch->toJson(), ","); // Field D3 GRADE B
        $filterList = Concat($filterList, $this->D3GRADEC->AdvancedSearch->toJson(), ","); // Field D3 GRADE C
        $filterList = Concat($filterList, $this->D3GRADED->AdvancedSearch->toJson(), ","); // Field D3 GRADE D
        $filterList = Concat($filterList, $this->USABLEONDAY3ET->AdvancedSearch->toJson(), ","); // Field USABLE ON DAY 3 ET
        $filterList = Concat($filterList, $this->USABLEONday3FREEZING->AdvancedSearch->toJson(), ","); // Field USABLE ON day 3 FREEZING
        $filterList = Concat($filterList, $this->D5GARDEA->AdvancedSearch->toJson(), ","); // Field D5 GARDE A
        $filterList = Concat($filterList, $this->D5GRADEB->AdvancedSearch->toJson(), ","); // Field D5 GRADE B
        $filterList = Concat($filterList, $this->D5GRADEC->AdvancedSearch->toJson(), ","); // Field D5 GRADE C
        $filterList = Concat($filterList, $this->D5GRADED->AdvancedSearch->toJson(), ","); // Field D5 GRADE D
        $filterList = Concat($filterList, $this->USABLEOND5ET->AdvancedSearch->toJson(), ","); // Field USABLE ON D5 ET
        $filterList = Concat($filterList, $this->USABLEOND5FREEZING->AdvancedSearch->toJson(), ","); // Field USABLE ON D5 FREEZING
        $filterList = Concat($filterList, $this->D6GRADEA->AdvancedSearch->toJson(), ","); // Field D6 GRADE A
        $filterList = Concat($filterList, $this->D6GRADEB->AdvancedSearch->toJson(), ","); // Field D6 GRADE B
        $filterList = Concat($filterList, $this->D6GRADEC->AdvancedSearch->toJson(), ","); // Field D6 GRADE C
        $filterList = Concat($filterList, $this->D6GRADED->AdvancedSearch->toJson(), ","); // Field D6 GRADE D
        $filterList = Concat($filterList, $this->D6USABLEEMBRYOET->AdvancedSearch->toJson(), ","); // Field D6 USABLE EMBRYO ET
        $filterList = Concat($filterList, $this->D6USABLEFREEZING->AdvancedSearch->toJson(), ","); // Field D6 USABLE FREEZING
        $filterList = Concat($filterList, $this->TOTALBLAST->AdvancedSearch->toJson(), ","); // Field TOTAL BLAST
        $filterList = Concat($filterList, $this->PGS->AdvancedSearch->toJson(), ","); // Field PGS
        $filterList = Concat($filterList, $this->REMARKS->AdvancedSearch->toJson(), ","); // Field REMARKS
        $filterList = Concat($filterList, $this->PUDB->AdvancedSearch->toJson(), ","); // Field PU - D/B
        $filterList = Concat($filterList, $this->ICSIDB->AdvancedSearch->toJson(), ","); // Field ICSI D/B
        $filterList = Concat($filterList, $this->VITDB->AdvancedSearch->toJson(), ","); // Field VIT D/B
        $filterList = Concat($filterList, $this->ETDB->AdvancedSearch->toJson(), ","); // Field ET D/B
        $filterList = Concat($filterList, $this->LABCOMMENTS->AdvancedSearch->toJson(), ","); // Field LAB COMMENTS
        $filterList = Concat($filterList, $this->ReasonfornoFRESHtransfer->AdvancedSearch->toJson(), ","); // Field Reason for no FRESH transfer
        $filterList = Concat($filterList, $this->NoofembryostransferredDay35ABC->AdvancedSearch->toJson(), ","); // Field No of embryos transferred Day 3/5, A,B,C
        $filterList = Concat($filterList, $this->EMBRYOSPENDING->AdvancedSearch->toJson(), ","); // Field EMBRYOS PENDING
        $filterList = Concat($filterList, $this->DAYOFTRANSFER->AdvancedSearch->toJson(), ","); // Field DAY OF TRANSFER
        $filterList = Concat($filterList, $this->HDsperm->AdvancedSearch->toJson(), ","); // Field H/D sperm
        $filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
        $filterList = Concat($filterList, $this->scprogesterone->AdvancedSearch->toJson(), ","); // Field sc progesterone
        $filterList = Concat($filterList, $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->toJson(), ","); // Field Natural micronised 400mg bd + duphaston 10mg bd
        $filterList = Concat($filterList, $this->CRINONE->AdvancedSearch->toJson(), ","); // Field CRINONE
        $filterList = Concat($filterList, $this->progynova->AdvancedSearch->toJson(), ","); // Field progynova
        $filterList = Concat($filterList, $this->Heparin->AdvancedSearch->toJson(), ","); // Field Heparin
        $filterList = Concat($filterList, $this->cabergolin->AdvancedSearch->toJson(), ","); // Field cabergolin
        $filterList = Concat($filterList, $this->Antagonist->AdvancedSearch->toJson(), ","); // Field Antagonist
        $filterList = Concat($filterList, $this->OHSS->AdvancedSearch->toJson(), ","); // Field OHSS
        $filterList = Concat($filterList, $this->Complications->AdvancedSearch->toJson(), ","); // Field Complications
        $filterList = Concat($filterList, $this->LPbleeding->AdvancedSearch->toJson(), ","); // Field LP bleeding
        $filterList = Concat($filterList, $this->hCG->AdvancedSearch->toJson(), ","); // Field ß-hCG
        $filterList = Concat($filterList, $this->Implantationrate->AdvancedSearch->toJson(), ","); // Field Implantation rate
        $filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
        $filterList = Concat($filterList, $this->Typeofpreg->AdvancedSearch->toJson(), ","); // Field Type of preg
        $filterList = Concat($filterList, $this->ANC->AdvancedSearch->toJson(), ","); // Field ANC
        $filterList = Concat($filterList, $this->anomalies->AdvancedSearch->toJson(), ","); // Field anomalies
        $filterList = Concat($filterList, $this->babywt->AdvancedSearch->toJson(), ","); // Field baby wt
        $filterList = Concat($filterList, $this->GAatdelivery->AdvancedSearch->toJson(), ","); // Field GA at delivery
        $filterList = Concat($filterList, $this->Pregnancyoutcome->AdvancedSearch->toJson(), ","); // Field Pregnancy outcome
        $filterList = Concat($filterList, $this->_1stFET->AdvancedSearch->toJson(), ","); // Field 1st FET
        $filterList = Concat($filterList, $this->AFTERHYSTEROSCOPY->AdvancedSearch->toJson(), ","); // Field AFTER HYSTEROSCOPY
        $filterList = Concat($filterList, $this->AFTERERA->AdvancedSearch->toJson(), ","); // Field AFTER ERA
        $filterList = Concat($filterList, $this->ERA->AdvancedSearch->toJson(), ","); // Field ERA
        $filterList = Concat($filterList, $this->HRT->AdvancedSearch->toJson(), ","); // Field HRT
        $filterList = Concat($filterList, $this->XGRASTPRP->AdvancedSearch->toJson(), ","); // Field XGRAST/PRP
        $filterList = Concat($filterList, $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->toJson(), ","); // Field EMBRYO DETAILS DAY 3/ 5, A, B, C
        $filterList = Concat($filterList, $this->LMWH40MG->AdvancedSearch->toJson(), ","); // Field LMWH 40MG
        $filterList = Concat($filterList, $this->hCG2->AdvancedSearch->toJson(), ","); // Field ß-hCG2
        $filterList = Concat($filterList, $this->Implantationrate1->AdvancedSearch->toJson(), ","); // Field Implantation rate1
        $filterList = Concat($filterList, $this->Ectopic1->AdvancedSearch->toJson(), ","); // Field Ectopic1
        $filterList = Concat($filterList, $this->TypeofpregA->AdvancedSearch->toJson(), ","); // Field Type of pregA
        $filterList = Concat($filterList, $this->ANC1->AdvancedSearch->toJson(), ","); // Field ANC1
        $filterList = Concat($filterList, $this->anomalies2->AdvancedSearch->toJson(), ","); // Field anomalies2
        $filterList = Concat($filterList, $this->babywt2->AdvancedSearch->toJson(), ","); // Field baby wt2
        $filterList = Concat($filterList, $this->GAatdelivery1->AdvancedSearch->toJson(), ","); // Field GA at delivery1
        $filterList = Concat($filterList, $this->Pregnancyoutcome1->AdvancedSearch->toJson(), ","); // Field Pregnancy outcome1
        $filterList = Concat($filterList, $this->_2NDFET->AdvancedSearch->toJson(), ","); // Field 2ND FET
        $filterList = Concat($filterList, $this->AFTERHYSTEROSCOPY1->AdvancedSearch->toJson(), ","); // Field AFTER HYSTEROSCOPY1
        $filterList = Concat($filterList, $this->AFTERERA1->AdvancedSearch->toJson(), ","); // Field AFTER ERA1
        $filterList = Concat($filterList, $this->ERA1->AdvancedSearch->toJson(), ","); // Field ERA1
        $filterList = Concat($filterList, $this->HRT1->AdvancedSearch->toJson(), ","); // Field HRT1
        $filterList = Concat($filterList, $this->XGRASTPRP1->AdvancedSearch->toJson(), ","); // Field XGRAST/PRP1
        $filterList = Concat($filterList, $this->NUMBEROFEMBRYOS->AdvancedSearch->toJson(), ","); // Field NUMBER OF EMBRYOS
        $filterList = Concat($filterList, $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->toJson(), ","); // Field EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $filterList = Concat($filterList, $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->toJson(), ","); // Field INTRALIPID AND BARGLOBIN
        $filterList = Concat($filterList, $this->LMWH40MG1->AdvancedSearch->toJson(), ","); // Field LMWH 40MG1
        $filterList = Concat($filterList, $this->hCG1->AdvancedSearch->toJson(), ","); // Field ß-hCG1
        $filterList = Concat($filterList, $this->Implantationrate2->AdvancedSearch->toJson(), ","); // Field Implantation rate2
        $filterList = Concat($filterList, $this->Ectopic2->AdvancedSearch->toJson(), ","); // Field Ectopic2
        $filterList = Concat($filterList, $this->Typeofpreg2->AdvancedSearch->toJson(), ","); // Field Type of preg2
        $filterList = Concat($filterList, $this->ANCA->AdvancedSearch->toJson(), ","); // Field ANCA
        $filterList = Concat($filterList, $this->anomalies1->AdvancedSearch->toJson(), ","); // Field anomalies1
        $filterList = Concat($filterList, $this->babywt1->AdvancedSearch->toJson(), ","); // Field baby wt1
        $filterList = Concat($filterList, $this->GAatdelivery2->AdvancedSearch->toJson(), ","); // Field GA at delivery2
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_template_for_opulistsrch", $filters);
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

        // Field RIDNO
        $this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
        $this->RIDNO->AdvancedSearch->save();

        // Field Treatment
        $this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
        $this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
        $this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
        $this->Treatment->AdvancedSearch->save();

        // Field Origin
        $this->Origin->AdvancedSearch->SearchValue = @$filter["x_Origin"];
        $this->Origin->AdvancedSearch->SearchOperator = @$filter["z_Origin"];
        $this->Origin->AdvancedSearch->SearchCondition = @$filter["v_Origin"];
        $this->Origin->AdvancedSearch->SearchValue2 = @$filter["y_Origin"];
        $this->Origin->AdvancedSearch->SearchOperator2 = @$filter["w_Origin"];
        $this->Origin->AdvancedSearch->save();

        // Field MaleIndications
        $this->MaleIndications->AdvancedSearch->SearchValue = @$filter["x_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchOperator = @$filter["z_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchCondition = @$filter["v_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->save();

        // Field FemaleIndications
        $this->FemaleIndications->AdvancedSearch->SearchValue = @$filter["x_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchOperator = @$filter["z_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchCondition = @$filter["v_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field PartnerName
        $this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
        $this->PartnerName->AdvancedSearch->save();

        // Field PartnerID
        $this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
        $this->PartnerID->AdvancedSearch->save();

        // Field A4ICSICycle
        $this->A4ICSICycle->AdvancedSearch->SearchValue = @$filter["x_A4ICSICycle"];
        $this->A4ICSICycle->AdvancedSearch->SearchOperator = @$filter["z_A4ICSICycle"];
        $this->A4ICSICycle->AdvancedSearch->SearchCondition = @$filter["v_A4ICSICycle"];
        $this->A4ICSICycle->AdvancedSearch->SearchValue2 = @$filter["y_A4ICSICycle"];
        $this->A4ICSICycle->AdvancedSearch->SearchOperator2 = @$filter["w_A4ICSICycle"];
        $this->A4ICSICycle->AdvancedSearch->save();

        // Field TotalICSICycle
        $this->TotalICSICycle->AdvancedSearch->SearchValue = @$filter["x_TotalICSICycle"];
        $this->TotalICSICycle->AdvancedSearch->SearchOperator = @$filter["z_TotalICSICycle"];
        $this->TotalICSICycle->AdvancedSearch->SearchCondition = @$filter["v_TotalICSICycle"];
        $this->TotalICSICycle->AdvancedSearch->SearchValue2 = @$filter["y_TotalICSICycle"];
        $this->TotalICSICycle->AdvancedSearch->SearchOperator2 = @$filter["w_TotalICSICycle"];
        $this->TotalICSICycle->AdvancedSearch->save();

        // Field TypeOfInfertility
        $this->TypeOfInfertility->AdvancedSearch->SearchValue = @$filter["x_TypeOfInfertility"];
        $this->TypeOfInfertility->AdvancedSearch->SearchOperator = @$filter["z_TypeOfInfertility"];
        $this->TypeOfInfertility->AdvancedSearch->SearchCondition = @$filter["v_TypeOfInfertility"];
        $this->TypeOfInfertility->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfInfertility"];
        $this->TypeOfInfertility->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfInfertility"];
        $this->TypeOfInfertility->AdvancedSearch->save();

        // Field RelevantHistory
        $this->RelevantHistory->AdvancedSearch->SearchValue = @$filter["x_RelevantHistory"];
        $this->RelevantHistory->AdvancedSearch->SearchOperator = @$filter["z_RelevantHistory"];
        $this->RelevantHistory->AdvancedSearch->SearchCondition = @$filter["v_RelevantHistory"];
        $this->RelevantHistory->AdvancedSearch->SearchValue2 = @$filter["y_RelevantHistory"];
        $this->RelevantHistory->AdvancedSearch->SearchOperator2 = @$filter["w_RelevantHistory"];
        $this->RelevantHistory->AdvancedSearch->save();

        // Field IUICycles
        $this->IUICycles->AdvancedSearch->SearchValue = @$filter["x_IUICycles"];
        $this->IUICycles->AdvancedSearch->SearchOperator = @$filter["z_IUICycles"];
        $this->IUICycles->AdvancedSearch->SearchCondition = @$filter["v_IUICycles"];
        $this->IUICycles->AdvancedSearch->SearchValue2 = @$filter["y_IUICycles"];
        $this->IUICycles->AdvancedSearch->SearchOperator2 = @$filter["w_IUICycles"];
        $this->IUICycles->AdvancedSearch->save();

        // Field AMH
        $this->AMH->AdvancedSearch->SearchValue = @$filter["x_AMH"];
        $this->AMH->AdvancedSearch->SearchOperator = @$filter["z_AMH"];
        $this->AMH->AdvancedSearch->SearchCondition = @$filter["v_AMH"];
        $this->AMH->AdvancedSearch->SearchValue2 = @$filter["y_AMH"];
        $this->AMH->AdvancedSearch->SearchOperator2 = @$filter["w_AMH"];
        $this->AMH->AdvancedSearch->save();

        // Field FBMI
        $this->FBMI->AdvancedSearch->SearchValue = @$filter["x_FBMI"];
        $this->FBMI->AdvancedSearch->SearchOperator = @$filter["z_FBMI"];
        $this->FBMI->AdvancedSearch->SearchCondition = @$filter["v_FBMI"];
        $this->FBMI->AdvancedSearch->SearchValue2 = @$filter["y_FBMI"];
        $this->FBMI->AdvancedSearch->SearchOperator2 = @$filter["w_FBMI"];
        $this->FBMI->AdvancedSearch->save();

        // Field ANTAGONISTSTARTDAY
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue = @$filter["x_ANTAGONISTSTARTDAY"];
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchOperator = @$filter["z_ANTAGONISTSTARTDAY"];
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchCondition = @$filter["v_ANTAGONISTSTARTDAY"];
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue2 = @$filter["y_ANTAGONISTSTARTDAY"];
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchOperator2 = @$filter["w_ANTAGONISTSTARTDAY"];
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->save();

        // Field OvarianSurgery
        $this->OvarianSurgery->AdvancedSearch->SearchValue = @$filter["x_OvarianSurgery"];
        $this->OvarianSurgery->AdvancedSearch->SearchOperator = @$filter["z_OvarianSurgery"];
        $this->OvarianSurgery->AdvancedSearch->SearchCondition = @$filter["v_OvarianSurgery"];
        $this->OvarianSurgery->AdvancedSearch->SearchValue2 = @$filter["y_OvarianSurgery"];
        $this->OvarianSurgery->AdvancedSearch->SearchOperator2 = @$filter["w_OvarianSurgery"];
        $this->OvarianSurgery->AdvancedSearch->save();

        // Field OPUDATE
        $this->OPUDATE->AdvancedSearch->SearchValue = @$filter["x_OPUDATE"];
        $this->OPUDATE->AdvancedSearch->SearchOperator = @$filter["z_OPUDATE"];
        $this->OPUDATE->AdvancedSearch->SearchCondition = @$filter["v_OPUDATE"];
        $this->OPUDATE->AdvancedSearch->SearchValue2 = @$filter["y_OPUDATE"];
        $this->OPUDATE->AdvancedSearch->SearchOperator2 = @$filter["w_OPUDATE"];
        $this->OPUDATE->AdvancedSearch->save();

        // Field RFSH1
        $this->RFSH1->AdvancedSearch->SearchValue = @$filter["x_RFSH1"];
        $this->RFSH1->AdvancedSearch->SearchOperator = @$filter["z_RFSH1"];
        $this->RFSH1->AdvancedSearch->SearchCondition = @$filter["v_RFSH1"];
        $this->RFSH1->AdvancedSearch->SearchValue2 = @$filter["y_RFSH1"];
        $this->RFSH1->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH1"];
        $this->RFSH1->AdvancedSearch->save();

        // Field RFSH2
        $this->RFSH2->AdvancedSearch->SearchValue = @$filter["x_RFSH2"];
        $this->RFSH2->AdvancedSearch->SearchOperator = @$filter["z_RFSH2"];
        $this->RFSH2->AdvancedSearch->SearchCondition = @$filter["v_RFSH2"];
        $this->RFSH2->AdvancedSearch->SearchValue2 = @$filter["y_RFSH2"];
        $this->RFSH2->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH2"];
        $this->RFSH2->AdvancedSearch->save();

        // Field RFSH3
        $this->RFSH3->AdvancedSearch->SearchValue = @$filter["x_RFSH3"];
        $this->RFSH3->AdvancedSearch->SearchOperator = @$filter["z_RFSH3"];
        $this->RFSH3->AdvancedSearch->SearchCondition = @$filter["v_RFSH3"];
        $this->RFSH3->AdvancedSearch->SearchValue2 = @$filter["y_RFSH3"];
        $this->RFSH3->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH3"];
        $this->RFSH3->AdvancedSearch->save();

        // Field E21
        $this->E21->AdvancedSearch->SearchValue = @$filter["x_E21"];
        $this->E21->AdvancedSearch->SearchOperator = @$filter["z_E21"];
        $this->E21->AdvancedSearch->SearchCondition = @$filter["v_E21"];
        $this->E21->AdvancedSearch->SearchValue2 = @$filter["y_E21"];
        $this->E21->AdvancedSearch->SearchOperator2 = @$filter["w_E21"];
        $this->E21->AdvancedSearch->save();

        // Field Hysteroscopy
        $this->Hysteroscopy->AdvancedSearch->SearchValue = @$filter["x_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchOperator = @$filter["z_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchCondition = @$filter["v_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchValue2 = @$filter["y_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchOperator2 = @$filter["w_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field Fweight
        $this->Fweight->AdvancedSearch->SearchValue = @$filter["x_Fweight"];
        $this->Fweight->AdvancedSearch->SearchOperator = @$filter["z_Fweight"];
        $this->Fweight->AdvancedSearch->SearchCondition = @$filter["v_Fweight"];
        $this->Fweight->AdvancedSearch->SearchValue2 = @$filter["y_Fweight"];
        $this->Fweight->AdvancedSearch->SearchOperator2 = @$filter["w_Fweight"];
        $this->Fweight->AdvancedSearch->save();

        // Field AntiTPO
        $this->AntiTPO->AdvancedSearch->SearchValue = @$filter["x_AntiTPO"];
        $this->AntiTPO->AdvancedSearch->SearchOperator = @$filter["z_AntiTPO"];
        $this->AntiTPO->AdvancedSearch->SearchCondition = @$filter["v_AntiTPO"];
        $this->AntiTPO->AdvancedSearch->SearchValue2 = @$filter["y_AntiTPO"];
        $this->AntiTPO->AdvancedSearch->SearchOperator2 = @$filter["w_AntiTPO"];
        $this->AntiTPO->AdvancedSearch->save();

        // Field AntiTG
        $this->AntiTG->AdvancedSearch->SearchValue = @$filter["x_AntiTG"];
        $this->AntiTG->AdvancedSearch->SearchOperator = @$filter["z_AntiTG"];
        $this->AntiTG->AdvancedSearch->SearchCondition = @$filter["v_AntiTG"];
        $this->AntiTG->AdvancedSearch->SearchValue2 = @$filter["y_AntiTG"];
        $this->AntiTG->AdvancedSearch->SearchOperator2 = @$filter["w_AntiTG"];
        $this->AntiTG->AdvancedSearch->save();

        // Field PatientAge
        $this->PatientAge->AdvancedSearch->SearchValue = @$filter["x_PatientAge"];
        $this->PatientAge->AdvancedSearch->SearchOperator = @$filter["z_PatientAge"];
        $this->PatientAge->AdvancedSearch->SearchCondition = @$filter["v_PatientAge"];
        $this->PatientAge->AdvancedSearch->SearchValue2 = @$filter["y_PatientAge"];
        $this->PatientAge->AdvancedSearch->SearchOperator2 = @$filter["w_PatientAge"];
        $this->PatientAge->AdvancedSearch->save();

        // Field PartnerAge
        $this->PartnerAge->AdvancedSearch->SearchValue = @$filter["x_PartnerAge"];
        $this->PartnerAge->AdvancedSearch->SearchOperator = @$filter["z_PartnerAge"];
        $this->PartnerAge->AdvancedSearch->SearchCondition = @$filter["v_PartnerAge"];
        $this->PartnerAge->AdvancedSearch->SearchValue2 = @$filter["y_PartnerAge"];
        $this->PartnerAge->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerAge"];
        $this->PartnerAge->AdvancedSearch->save();

        // Field CYCLES
        $this->CYCLES->AdvancedSearch->SearchValue = @$filter["x_CYCLES"];
        $this->CYCLES->AdvancedSearch->SearchOperator = @$filter["z_CYCLES"];
        $this->CYCLES->AdvancedSearch->SearchCondition = @$filter["v_CYCLES"];
        $this->CYCLES->AdvancedSearch->SearchValue2 = @$filter["y_CYCLES"];
        $this->CYCLES->AdvancedSearch->SearchOperator2 = @$filter["w_CYCLES"];
        $this->CYCLES->AdvancedSearch->save();

        // Field MF
        $this->MF->AdvancedSearch->SearchValue = @$filter["x_MF"];
        $this->MF->AdvancedSearch->SearchOperator = @$filter["z_MF"];
        $this->MF->AdvancedSearch->SearchCondition = @$filter["v_MF"];
        $this->MF->AdvancedSearch->SearchValue2 = @$filter["y_MF"];
        $this->MF->AdvancedSearch->SearchOperator2 = @$filter["w_MF"];
        $this->MF->AdvancedSearch->save();

        // Field CauseOfINFERTILITY
        $this->CauseOfINFERTILITY->AdvancedSearch->SearchValue = @$filter["x_CauseOfINFERTILITY"];
        $this->CauseOfINFERTILITY->AdvancedSearch->SearchOperator = @$filter["z_CauseOfINFERTILITY"];
        $this->CauseOfINFERTILITY->AdvancedSearch->SearchCondition = @$filter["v_CauseOfINFERTILITY"];
        $this->CauseOfINFERTILITY->AdvancedSearch->SearchValue2 = @$filter["y_CauseOfINFERTILITY"];
        $this->CauseOfINFERTILITY->AdvancedSearch->SearchOperator2 = @$filter["w_CauseOfINFERTILITY"];
        $this->CauseOfINFERTILITY->AdvancedSearch->save();

        // Field SIS
        $this->SIS->AdvancedSearch->SearchValue = @$filter["x_SIS"];
        $this->SIS->AdvancedSearch->SearchOperator = @$filter["z_SIS"];
        $this->SIS->AdvancedSearch->SearchCondition = @$filter["v_SIS"];
        $this->SIS->AdvancedSearch->SearchValue2 = @$filter["y_SIS"];
        $this->SIS->AdvancedSearch->SearchOperator2 = @$filter["w_SIS"];
        $this->SIS->AdvancedSearch->save();

        // Field Scratching
        $this->Scratching->AdvancedSearch->SearchValue = @$filter["x_Scratching"];
        $this->Scratching->AdvancedSearch->SearchOperator = @$filter["z_Scratching"];
        $this->Scratching->AdvancedSearch->SearchCondition = @$filter["v_Scratching"];
        $this->Scratching->AdvancedSearch->SearchValue2 = @$filter["y_Scratching"];
        $this->Scratching->AdvancedSearch->SearchOperator2 = @$filter["w_Scratching"];
        $this->Scratching->AdvancedSearch->save();

        // Field Cannulation
        $this->Cannulation->AdvancedSearch->SearchValue = @$filter["x_Cannulation"];
        $this->Cannulation->AdvancedSearch->SearchOperator = @$filter["z_Cannulation"];
        $this->Cannulation->AdvancedSearch->SearchCondition = @$filter["v_Cannulation"];
        $this->Cannulation->AdvancedSearch->SearchValue2 = @$filter["y_Cannulation"];
        $this->Cannulation->AdvancedSearch->SearchOperator2 = @$filter["w_Cannulation"];
        $this->Cannulation->AdvancedSearch->save();

        // Field MEPRATE
        $this->MEPRATE->AdvancedSearch->SearchValue = @$filter["x_MEPRATE"];
        $this->MEPRATE->AdvancedSearch->SearchOperator = @$filter["z_MEPRATE"];
        $this->MEPRATE->AdvancedSearch->SearchCondition = @$filter["v_MEPRATE"];
        $this->MEPRATE->AdvancedSearch->SearchValue2 = @$filter["y_MEPRATE"];
        $this->MEPRATE->AdvancedSearch->SearchOperator2 = @$filter["w_MEPRATE"];
        $this->MEPRATE->AdvancedSearch->save();

        // Field R.OVARY
        $this->ROVARY->AdvancedSearch->SearchValue = @$filter["x_ROVARY"];
        $this->ROVARY->AdvancedSearch->SearchOperator = @$filter["z_ROVARY"];
        $this->ROVARY->AdvancedSearch->SearchCondition = @$filter["v_ROVARY"];
        $this->ROVARY->AdvancedSearch->SearchValue2 = @$filter["y_ROVARY"];
        $this->ROVARY->AdvancedSearch->SearchOperator2 = @$filter["w_ROVARY"];
        $this->ROVARY->AdvancedSearch->save();

        // Field R.AFC
        $this->RAFC->AdvancedSearch->SearchValue = @$filter["x_RAFC"];
        $this->RAFC->AdvancedSearch->SearchOperator = @$filter["z_RAFC"];
        $this->RAFC->AdvancedSearch->SearchCondition = @$filter["v_RAFC"];
        $this->RAFC->AdvancedSearch->SearchValue2 = @$filter["y_RAFC"];
        $this->RAFC->AdvancedSearch->SearchOperator2 = @$filter["w_RAFC"];
        $this->RAFC->AdvancedSearch->save();

        // Field L.OVARY
        $this->LOVARY->AdvancedSearch->SearchValue = @$filter["x_LOVARY"];
        $this->LOVARY->AdvancedSearch->SearchOperator = @$filter["z_LOVARY"];
        $this->LOVARY->AdvancedSearch->SearchCondition = @$filter["v_LOVARY"];
        $this->LOVARY->AdvancedSearch->SearchValue2 = @$filter["y_LOVARY"];
        $this->LOVARY->AdvancedSearch->SearchOperator2 = @$filter["w_LOVARY"];
        $this->LOVARY->AdvancedSearch->save();

        // Field L.AFC
        $this->LAFC->AdvancedSearch->SearchValue = @$filter["x_LAFC"];
        $this->LAFC->AdvancedSearch->SearchOperator = @$filter["z_LAFC"];
        $this->LAFC->AdvancedSearch->SearchCondition = @$filter["v_LAFC"];
        $this->LAFC->AdvancedSearch->SearchValue2 = @$filter["y_LAFC"];
        $this->LAFC->AdvancedSearch->SearchOperator2 = @$filter["w_LAFC"];
        $this->LAFC->AdvancedSearch->save();

        // Field LH1
        $this->LH1->AdvancedSearch->SearchValue = @$filter["x_LH1"];
        $this->LH1->AdvancedSearch->SearchOperator = @$filter["z_LH1"];
        $this->LH1->AdvancedSearch->SearchCondition = @$filter["v_LH1"];
        $this->LH1->AdvancedSearch->SearchValue2 = @$filter["y_LH1"];
        $this->LH1->AdvancedSearch->SearchOperator2 = @$filter["w_LH1"];
        $this->LH1->AdvancedSearch->save();

        // Field E2
        $this->E2->AdvancedSearch->SearchValue = @$filter["x_E2"];
        $this->E2->AdvancedSearch->SearchOperator = @$filter["z_E2"];
        $this->E2->AdvancedSearch->SearchCondition = @$filter["v_E2"];
        $this->E2->AdvancedSearch->SearchValue2 = @$filter["y_E2"];
        $this->E2->AdvancedSearch->SearchOperator2 = @$filter["w_E2"];
        $this->E2->AdvancedSearch->save();

        // Field StemCellInstallation
        $this->StemCellInstallation->AdvancedSearch->SearchValue = @$filter["x_StemCellInstallation"];
        $this->StemCellInstallation->AdvancedSearch->SearchOperator = @$filter["z_StemCellInstallation"];
        $this->StemCellInstallation->AdvancedSearch->SearchCondition = @$filter["v_StemCellInstallation"];
        $this->StemCellInstallation->AdvancedSearch->SearchValue2 = @$filter["y_StemCellInstallation"];
        $this->StemCellInstallation->AdvancedSearch->SearchOperator2 = @$filter["w_StemCellInstallation"];
        $this->StemCellInstallation->AdvancedSearch->save();

        // Field DHEAS
        $this->DHEAS->AdvancedSearch->SearchValue = @$filter["x_DHEAS"];
        $this->DHEAS->AdvancedSearch->SearchOperator = @$filter["z_DHEAS"];
        $this->DHEAS->AdvancedSearch->SearchCondition = @$filter["v_DHEAS"];
        $this->DHEAS->AdvancedSearch->SearchValue2 = @$filter["y_DHEAS"];
        $this->DHEAS->AdvancedSearch->SearchOperator2 = @$filter["w_DHEAS"];
        $this->DHEAS->AdvancedSearch->save();

        // Field Mtorr
        $this->Mtorr->AdvancedSearch->SearchValue = @$filter["x_Mtorr"];
        $this->Mtorr->AdvancedSearch->SearchOperator = @$filter["z_Mtorr"];
        $this->Mtorr->AdvancedSearch->SearchCondition = @$filter["v_Mtorr"];
        $this->Mtorr->AdvancedSearch->SearchValue2 = @$filter["y_Mtorr"];
        $this->Mtorr->AdvancedSearch->SearchOperator2 = @$filter["w_Mtorr"];
        $this->Mtorr->AdvancedSearch->save();

        // Field AMH1
        $this->AMH1->AdvancedSearch->SearchValue = @$filter["x_AMH1"];
        $this->AMH1->AdvancedSearch->SearchOperator = @$filter["z_AMH1"];
        $this->AMH1->AdvancedSearch->SearchCondition = @$filter["v_AMH1"];
        $this->AMH1->AdvancedSearch->SearchValue2 = @$filter["y_AMH1"];
        $this->AMH1->AdvancedSearch->SearchOperator2 = @$filter["w_AMH1"];
        $this->AMH1->AdvancedSearch->save();

        // Field LH
        $this->LH->AdvancedSearch->SearchValue = @$filter["x_LH"];
        $this->LH->AdvancedSearch->SearchOperator = @$filter["z_LH"];
        $this->LH->AdvancedSearch->SearchCondition = @$filter["v_LH"];
        $this->LH->AdvancedSearch->SearchValue2 = @$filter["y_LH"];
        $this->LH->AdvancedSearch->SearchOperator2 = @$filter["w_LH"];
        $this->LH->AdvancedSearch->save();

        // Field BMI(MALE)
        $this->BMIMALE->AdvancedSearch->SearchValue = @$filter["x_BMIMALE"];
        $this->BMIMALE->AdvancedSearch->SearchOperator = @$filter["z_BMIMALE"];
        $this->BMIMALE->AdvancedSearch->SearchCondition = @$filter["v_BMIMALE"];
        $this->BMIMALE->AdvancedSearch->SearchValue2 = @$filter["y_BMIMALE"];
        $this->BMIMALE->AdvancedSearch->SearchOperator2 = @$filter["w_BMIMALE"];
        $this->BMIMALE->AdvancedSearch->save();

        // Field MaleMedicalConditions
        $this->MaleMedicalConditions->AdvancedSearch->SearchValue = @$filter["x_MaleMedicalConditions"];
        $this->MaleMedicalConditions->AdvancedSearch->SearchOperator = @$filter["z_MaleMedicalConditions"];
        $this->MaleMedicalConditions->AdvancedSearch->SearchCondition = @$filter["v_MaleMedicalConditions"];
        $this->MaleMedicalConditions->AdvancedSearch->SearchValue2 = @$filter["y_MaleMedicalConditions"];
        $this->MaleMedicalConditions->AdvancedSearch->SearchOperator2 = @$filter["w_MaleMedicalConditions"];
        $this->MaleMedicalConditions->AdvancedSearch->save();

        // Field MaleExamination
        $this->MaleExamination->AdvancedSearch->SearchValue = @$filter["x_MaleExamination"];
        $this->MaleExamination->AdvancedSearch->SearchOperator = @$filter["z_MaleExamination"];
        $this->MaleExamination->AdvancedSearch->SearchCondition = @$filter["v_MaleExamination"];
        $this->MaleExamination->AdvancedSearch->SearchValue2 = @$filter["y_MaleExamination"];
        $this->MaleExamination->AdvancedSearch->SearchOperator2 = @$filter["w_MaleExamination"];
        $this->MaleExamination->AdvancedSearch->save();

        // Field SpermConcentration
        $this->SpermConcentration->AdvancedSearch->SearchValue = @$filter["x_SpermConcentration"];
        $this->SpermConcentration->AdvancedSearch->SearchOperator = @$filter["z_SpermConcentration"];
        $this->SpermConcentration->AdvancedSearch->SearchCondition = @$filter["v_SpermConcentration"];
        $this->SpermConcentration->AdvancedSearch->SearchValue2 = @$filter["y_SpermConcentration"];
        $this->SpermConcentration->AdvancedSearch->SearchOperator2 = @$filter["w_SpermConcentration"];
        $this->SpermConcentration->AdvancedSearch->save();

        // Field SpermMotility(P&NP)
        $this->SpermMotilityPNP->AdvancedSearch->SearchValue = @$filter["x_SpermMotilityPNP"];
        $this->SpermMotilityPNP->AdvancedSearch->SearchOperator = @$filter["z_SpermMotilityPNP"];
        $this->SpermMotilityPNP->AdvancedSearch->SearchCondition = @$filter["v_SpermMotilityPNP"];
        $this->SpermMotilityPNP->AdvancedSearch->SearchValue2 = @$filter["y_SpermMotilityPNP"];
        $this->SpermMotilityPNP->AdvancedSearch->SearchOperator2 = @$filter["w_SpermMotilityPNP"];
        $this->SpermMotilityPNP->AdvancedSearch->save();

        // Field SpermMorphology
        $this->SpermMorphology->AdvancedSearch->SearchValue = @$filter["x_SpermMorphology"];
        $this->SpermMorphology->AdvancedSearch->SearchOperator = @$filter["z_SpermMorphology"];
        $this->SpermMorphology->AdvancedSearch->SearchCondition = @$filter["v_SpermMorphology"];
        $this->SpermMorphology->AdvancedSearch->SearchValue2 = @$filter["y_SpermMorphology"];
        $this->SpermMorphology->AdvancedSearch->SearchOperator2 = @$filter["w_SpermMorphology"];
        $this->SpermMorphology->AdvancedSearch->save();

        // Field SpermRetrival
        $this->SpermRetrival->AdvancedSearch->SearchValue = @$filter["x_SpermRetrival"];
        $this->SpermRetrival->AdvancedSearch->SearchOperator = @$filter["z_SpermRetrival"];
        $this->SpermRetrival->AdvancedSearch->SearchCondition = @$filter["v_SpermRetrival"];
        $this->SpermRetrival->AdvancedSearch->SearchValue2 = @$filter["y_SpermRetrival"];
        $this->SpermRetrival->AdvancedSearch->SearchOperator2 = @$filter["w_SpermRetrival"];
        $this->SpermRetrival->AdvancedSearch->save();

        // Field M.Testosterone
        $this->MTestosterone->AdvancedSearch->SearchValue = @$filter["x_MTestosterone"];
        $this->MTestosterone->AdvancedSearch->SearchOperator = @$filter["z_MTestosterone"];
        $this->MTestosterone->AdvancedSearch->SearchCondition = @$filter["v_MTestosterone"];
        $this->MTestosterone->AdvancedSearch->SearchValue2 = @$filter["y_MTestosterone"];
        $this->MTestosterone->AdvancedSearch->SearchOperator2 = @$filter["w_MTestosterone"];
        $this->MTestosterone->AdvancedSearch->save();

        // Field DFI
        $this->DFI->AdvancedSearch->SearchValue = @$filter["x_DFI"];
        $this->DFI->AdvancedSearch->SearchOperator = @$filter["z_DFI"];
        $this->DFI->AdvancedSearch->SearchCondition = @$filter["v_DFI"];
        $this->DFI->AdvancedSearch->SearchValue2 = @$filter["y_DFI"];
        $this->DFI->AdvancedSearch->SearchOperator2 = @$filter["w_DFI"];
        $this->DFI->AdvancedSearch->save();

        // Field PreRX
        $this->PreRX->AdvancedSearch->SearchValue = @$filter["x_PreRX"];
        $this->PreRX->AdvancedSearch->SearchOperator = @$filter["z_PreRX"];
        $this->PreRX->AdvancedSearch->SearchCondition = @$filter["v_PreRX"];
        $this->PreRX->AdvancedSearch->SearchValue2 = @$filter["y_PreRX"];
        $this->PreRX->AdvancedSearch->SearchOperator2 = @$filter["w_PreRX"];
        $this->PreRX->AdvancedSearch->save();

        // Field CC 100
        $this->CC100->AdvancedSearch->SearchValue = @$filter["x_CC100"];
        $this->CC100->AdvancedSearch->SearchOperator = @$filter["z_CC100"];
        $this->CC100->AdvancedSearch->SearchCondition = @$filter["v_CC100"];
        $this->CC100->AdvancedSearch->SearchValue2 = @$filter["y_CC100"];
        $this->CC100->AdvancedSearch->SearchOperator2 = @$filter["w_CC100"];
        $this->CC100->AdvancedSearch->save();

        // Field RFSH1A
        $this->RFSH1A->AdvancedSearch->SearchValue = @$filter["x_RFSH1A"];
        $this->RFSH1A->AdvancedSearch->SearchOperator = @$filter["z_RFSH1A"];
        $this->RFSH1A->AdvancedSearch->SearchCondition = @$filter["v_RFSH1A"];
        $this->RFSH1A->AdvancedSearch->SearchValue2 = @$filter["y_RFSH1A"];
        $this->RFSH1A->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH1A"];
        $this->RFSH1A->AdvancedSearch->save();

        // Field HMG1
        $this->HMG1->AdvancedSearch->SearchValue = @$filter["x_HMG1"];
        $this->HMG1->AdvancedSearch->SearchOperator = @$filter["z_HMG1"];
        $this->HMG1->AdvancedSearch->SearchCondition = @$filter["v_HMG1"];
        $this->HMG1->AdvancedSearch->SearchValue2 = @$filter["y_HMG1"];
        $this->HMG1->AdvancedSearch->SearchOperator2 = @$filter["w_HMG1"];
        $this->HMG1->AdvancedSearch->save();

        // Field RLH
        $this->RLH->AdvancedSearch->SearchValue = @$filter["x_RLH"];
        $this->RLH->AdvancedSearch->SearchOperator = @$filter["z_RLH"];
        $this->RLH->AdvancedSearch->SearchCondition = @$filter["v_RLH"];
        $this->RLH->AdvancedSearch->SearchValue2 = @$filter["y_RLH"];
        $this->RLH->AdvancedSearch->SearchOperator2 = @$filter["w_RLH"];
        $this->RLH->AdvancedSearch->save();

        // Field HMG_HP
        $this->HMG_HP->AdvancedSearch->SearchValue = @$filter["x_HMG_HP"];
        $this->HMG_HP->AdvancedSearch->SearchOperator = @$filter["z_HMG_HP"];
        $this->HMG_HP->AdvancedSearch->SearchCondition = @$filter["v_HMG_HP"];
        $this->HMG_HP->AdvancedSearch->SearchValue2 = @$filter["y_HMG_HP"];
        $this->HMG_HP->AdvancedSearch->SearchOperator2 = @$filter["w_HMG_HP"];
        $this->HMG_HP->AdvancedSearch->save();

        // Field day_of_HMG
        $this->day_of_HMG->AdvancedSearch->SearchValue = @$filter["x_day_of_HMG"];
        $this->day_of_HMG->AdvancedSearch->SearchOperator = @$filter["z_day_of_HMG"];
        $this->day_of_HMG->AdvancedSearch->SearchCondition = @$filter["v_day_of_HMG"];
        $this->day_of_HMG->AdvancedSearch->SearchValue2 = @$filter["y_day_of_HMG"];
        $this->day_of_HMG->AdvancedSearch->SearchOperator2 = @$filter["w_day_of_HMG"];
        $this->day_of_HMG->AdvancedSearch->save();

        // Field Reason_for_HMG
        $this->Reason_for_HMG->AdvancedSearch->SearchValue = @$filter["x_Reason_for_HMG"];
        $this->Reason_for_HMG->AdvancedSearch->SearchOperator = @$filter["z_Reason_for_HMG"];
        $this->Reason_for_HMG->AdvancedSearch->SearchCondition = @$filter["v_Reason_for_HMG"];
        $this->Reason_for_HMG->AdvancedSearch->SearchValue2 = @$filter["y_Reason_for_HMG"];
        $this->Reason_for_HMG->AdvancedSearch->SearchOperator2 = @$filter["w_Reason_for_HMG"];
        $this->Reason_for_HMG->AdvancedSearch->save();

        // Field RLH_day
        $this->RLH_day->AdvancedSearch->SearchValue = @$filter["x_RLH_day"];
        $this->RLH_day->AdvancedSearch->SearchOperator = @$filter["z_RLH_day"];
        $this->RLH_day->AdvancedSearch->SearchCondition = @$filter["v_RLH_day"];
        $this->RLH_day->AdvancedSearch->SearchValue2 = @$filter["y_RLH_day"];
        $this->RLH_day->AdvancedSearch->SearchOperator2 = @$filter["w_RLH_day"];
        $this->RLH_day->AdvancedSearch->save();

        // Field DAYSOFSTIMULATION
        $this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue = @$filter["x_DAYSOFSTIMULATION"];
        $this->DAYSOFSTIMULATION->AdvancedSearch->SearchOperator = @$filter["z_DAYSOFSTIMULATION"];
        $this->DAYSOFSTIMULATION->AdvancedSearch->SearchCondition = @$filter["v_DAYSOFSTIMULATION"];
        $this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue2 = @$filter["y_DAYSOFSTIMULATION"];
        $this->DAYSOFSTIMULATION->AdvancedSearch->SearchOperator2 = @$filter["w_DAYSOFSTIMULATION"];
        $this->DAYSOFSTIMULATION->AdvancedSearch->save();

        // Field Any change inbetween ( Dose added , day)
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchValue = @$filter["x_AnychangeinbetweenDoseaddedday"];
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchOperator = @$filter["z_AnychangeinbetweenDoseaddedday"];
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchCondition = @$filter["v_AnychangeinbetweenDoseaddedday"];
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchValue2 = @$filter["y_AnychangeinbetweenDoseaddedday"];
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchOperator2 = @$filter["w_AnychangeinbetweenDoseaddedday"];
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->save();

        // Field day of Anta
        $this->dayofAnta->AdvancedSearch->SearchValue = @$filter["x_dayofAnta"];
        $this->dayofAnta->AdvancedSearch->SearchOperator = @$filter["z_dayofAnta"];
        $this->dayofAnta->AdvancedSearch->SearchCondition = @$filter["v_dayofAnta"];
        $this->dayofAnta->AdvancedSearch->SearchValue2 = @$filter["y_dayofAnta"];
        $this->dayofAnta->AdvancedSearch->SearchOperator2 = @$filter["w_dayofAnta"];
        $this->dayofAnta->AdvancedSearch->save();

        // Field R FSH TD
        $this->RFSHTD->AdvancedSearch->SearchValue = @$filter["x_RFSHTD"];
        $this->RFSHTD->AdvancedSearch->SearchOperator = @$filter["z_RFSHTD"];
        $this->RFSHTD->AdvancedSearch->SearchCondition = @$filter["v_RFSHTD"];
        $this->RFSHTD->AdvancedSearch->SearchValue2 = @$filter["y_RFSHTD"];
        $this->RFSHTD->AdvancedSearch->SearchOperator2 = @$filter["w_RFSHTD"];
        $this->RFSHTD->AdvancedSearch->save();

        // Field R FSH + HMG TD
        $this->RFSHHMGTD->AdvancedSearch->SearchValue = @$filter["x_RFSHHMGTD"];
        $this->RFSHHMGTD->AdvancedSearch->SearchOperator = @$filter["z_RFSHHMGTD"];
        $this->RFSHHMGTD->AdvancedSearch->SearchCondition = @$filter["v_RFSHHMGTD"];
        $this->RFSHHMGTD->AdvancedSearch->SearchValue2 = @$filter["y_RFSHHMGTD"];
        $this->RFSHHMGTD->AdvancedSearch->SearchOperator2 = @$filter["w_RFSHHMGTD"];
        $this->RFSHHMGTD->AdvancedSearch->save();

        // Field R FSH + R LH TD
        $this->RFSHRLHTD->AdvancedSearch->SearchValue = @$filter["x_RFSHRLHTD"];
        $this->RFSHRLHTD->AdvancedSearch->SearchOperator = @$filter["z_RFSHRLHTD"];
        $this->RFSHRLHTD->AdvancedSearch->SearchCondition = @$filter["v_RFSHRLHTD"];
        $this->RFSHRLHTD->AdvancedSearch->SearchValue2 = @$filter["y_RFSHRLHTD"];
        $this->RFSHRLHTD->AdvancedSearch->SearchOperator2 = @$filter["w_RFSHRLHTD"];
        $this->RFSHRLHTD->AdvancedSearch->save();

        // Field HMG TD
        $this->HMGTD->AdvancedSearch->SearchValue = @$filter["x_HMGTD"];
        $this->HMGTD->AdvancedSearch->SearchOperator = @$filter["z_HMGTD"];
        $this->HMGTD->AdvancedSearch->SearchCondition = @$filter["v_HMGTD"];
        $this->HMGTD->AdvancedSearch->SearchValue2 = @$filter["y_HMGTD"];
        $this->HMGTD->AdvancedSearch->SearchOperator2 = @$filter["w_HMGTD"];
        $this->HMGTD->AdvancedSearch->save();

        // Field LH TD
        $this->LHTD->AdvancedSearch->SearchValue = @$filter["x_LHTD"];
        $this->LHTD->AdvancedSearch->SearchOperator = @$filter["z_LHTD"];
        $this->LHTD->AdvancedSearch->SearchCondition = @$filter["v_LHTD"];
        $this->LHTD->AdvancedSearch->SearchValue2 = @$filter["y_LHTD"];
        $this->LHTD->AdvancedSearch->SearchOperator2 = @$filter["w_LHTD"];
        $this->LHTD->AdvancedSearch->save();

        // Field D1 LH
        $this->D1LH->AdvancedSearch->SearchValue = @$filter["x_D1LH"];
        $this->D1LH->AdvancedSearch->SearchOperator = @$filter["z_D1LH"];
        $this->D1LH->AdvancedSearch->SearchCondition = @$filter["v_D1LH"];
        $this->D1LH->AdvancedSearch->SearchValue2 = @$filter["y_D1LH"];
        $this->D1LH->AdvancedSearch->SearchOperator2 = @$filter["w_D1LH"];
        $this->D1LH->AdvancedSearch->save();

        // Field D1 E2
        $this->D1E2->AdvancedSearch->SearchValue = @$filter["x_D1E2"];
        $this->D1E2->AdvancedSearch->SearchOperator = @$filter["z_D1E2"];
        $this->D1E2->AdvancedSearch->SearchCondition = @$filter["v_D1E2"];
        $this->D1E2->AdvancedSearch->SearchValue2 = @$filter["y_D1E2"];
        $this->D1E2->AdvancedSearch->SearchOperator2 = @$filter["w_D1E2"];
        $this->D1E2->AdvancedSearch->save();

        // Field Trigger day E2
        $this->TriggerdayE2->AdvancedSearch->SearchValue = @$filter["x_TriggerdayE2"];
        $this->TriggerdayE2->AdvancedSearch->SearchOperator = @$filter["z_TriggerdayE2"];
        $this->TriggerdayE2->AdvancedSearch->SearchCondition = @$filter["v_TriggerdayE2"];
        $this->TriggerdayE2->AdvancedSearch->SearchValue2 = @$filter["y_TriggerdayE2"];
        $this->TriggerdayE2->AdvancedSearch->SearchOperator2 = @$filter["w_TriggerdayE2"];
        $this->TriggerdayE2->AdvancedSearch->save();

        // Field Trigger day P4
        $this->TriggerdayP4->AdvancedSearch->SearchValue = @$filter["x_TriggerdayP4"];
        $this->TriggerdayP4->AdvancedSearch->SearchOperator = @$filter["z_TriggerdayP4"];
        $this->TriggerdayP4->AdvancedSearch->SearchCondition = @$filter["v_TriggerdayP4"];
        $this->TriggerdayP4->AdvancedSearch->SearchValue2 = @$filter["y_TriggerdayP4"];
        $this->TriggerdayP4->AdvancedSearch->SearchOperator2 = @$filter["w_TriggerdayP4"];
        $this->TriggerdayP4->AdvancedSearch->save();

        // Field Trigger day LH
        $this->TriggerdayLH->AdvancedSearch->SearchValue = @$filter["x_TriggerdayLH"];
        $this->TriggerdayLH->AdvancedSearch->SearchOperator = @$filter["z_TriggerdayLH"];
        $this->TriggerdayLH->AdvancedSearch->SearchCondition = @$filter["v_TriggerdayLH"];
        $this->TriggerdayLH->AdvancedSearch->SearchValue2 = @$filter["y_TriggerdayLH"];
        $this->TriggerdayLH->AdvancedSearch->SearchOperator2 = @$filter["w_TriggerdayLH"];
        $this->TriggerdayLH->AdvancedSearch->save();

        // Field VIT-D
        $this->VITD->AdvancedSearch->SearchValue = @$filter["x_VITD"];
        $this->VITD->AdvancedSearch->SearchOperator = @$filter["z_VITD"];
        $this->VITD->AdvancedSearch->SearchCondition = @$filter["v_VITD"];
        $this->VITD->AdvancedSearch->SearchValue2 = @$filter["y_VITD"];
        $this->VITD->AdvancedSearch->SearchOperator2 = @$filter["w_VITD"];
        $this->VITD->AdvancedSearch->save();

        // Field TRIGGERR
        $this->TRIGGERR->AdvancedSearch->SearchValue = @$filter["x_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->save();

        // Field BHCG BEFORE RETRIEVAL
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchValue = @$filter["x_BHCGBEFORERETRIEVAL"];
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchOperator = @$filter["z_BHCGBEFORERETRIEVAL"];
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchCondition = @$filter["v_BHCGBEFORERETRIEVAL"];
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchValue2 = @$filter["y_BHCGBEFORERETRIEVAL"];
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchOperator2 = @$filter["w_BHCGBEFORERETRIEVAL"];
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->save();

        // Field LH -12 HRS
        $this->LH12HRS->AdvancedSearch->SearchValue = @$filter["x_LH12HRS"];
        $this->LH12HRS->AdvancedSearch->SearchOperator = @$filter["z_LH12HRS"];
        $this->LH12HRS->AdvancedSearch->SearchCondition = @$filter["v_LH12HRS"];
        $this->LH12HRS->AdvancedSearch->SearchValue2 = @$filter["y_LH12HRS"];
        $this->LH12HRS->AdvancedSearch->SearchOperator2 = @$filter["w_LH12HRS"];
        $this->LH12HRS->AdvancedSearch->save();

        // Field P4 -12 HRS
        $this->P412HRS->AdvancedSearch->SearchValue = @$filter["x_P412HRS"];
        $this->P412HRS->AdvancedSearch->SearchOperator = @$filter["z_P412HRS"];
        $this->P412HRS->AdvancedSearch->SearchCondition = @$filter["v_P412HRS"];
        $this->P412HRS->AdvancedSearch->SearchValue2 = @$filter["y_P412HRS"];
        $this->P412HRS->AdvancedSearch->SearchOperator2 = @$filter["w_P412HRS"];
        $this->P412HRS->AdvancedSearch->save();

        // Field ET on hCG day
        $this->ETonhCGday->AdvancedSearch->SearchValue = @$filter["x_ETonhCGday"];
        $this->ETonhCGday->AdvancedSearch->SearchOperator = @$filter["z_ETonhCGday"];
        $this->ETonhCGday->AdvancedSearch->SearchCondition = @$filter["v_ETonhCGday"];
        $this->ETonhCGday->AdvancedSearch->SearchValue2 = @$filter["y_ETonhCGday"];
        $this->ETonhCGday->AdvancedSearch->SearchOperator2 = @$filter["w_ETonhCGday"];
        $this->ETonhCGday->AdvancedSearch->save();

        // Field ET doppler
        $this->ETdoppler->AdvancedSearch->SearchValue = @$filter["x_ETdoppler"];
        $this->ETdoppler->AdvancedSearch->SearchOperator = @$filter["z_ETdoppler"];
        $this->ETdoppler->AdvancedSearch->SearchCondition = @$filter["v_ETdoppler"];
        $this->ETdoppler->AdvancedSearch->SearchValue2 = @$filter["y_ETdoppler"];
        $this->ETdoppler->AdvancedSearch->SearchOperator2 = @$filter["w_ETdoppler"];
        $this->ETdoppler->AdvancedSearch->save();

        // Field VI/FI/VFI
        $this->VIFIVFI->AdvancedSearch->SearchValue = @$filter["x_VIFIVFI"];
        $this->VIFIVFI->AdvancedSearch->SearchOperator = @$filter["z_VIFIVFI"];
        $this->VIFIVFI->AdvancedSearch->SearchCondition = @$filter["v_VIFIVFI"];
        $this->VIFIVFI->AdvancedSearch->SearchValue2 = @$filter["y_VIFIVFI"];
        $this->VIFIVFI->AdvancedSearch->SearchOperator2 = @$filter["w_VIFIVFI"];
        $this->VIFIVFI->AdvancedSearch->save();

        // Field Endometrial abnormality
        $this->Endometrialabnormality->AdvancedSearch->SearchValue = @$filter["x_Endometrialabnormality"];
        $this->Endometrialabnormality->AdvancedSearch->SearchOperator = @$filter["z_Endometrialabnormality"];
        $this->Endometrialabnormality->AdvancedSearch->SearchCondition = @$filter["v_Endometrialabnormality"];
        $this->Endometrialabnormality->AdvancedSearch->SearchValue2 = @$filter["y_Endometrialabnormality"];
        $this->Endometrialabnormality->AdvancedSearch->SearchOperator2 = @$filter["w_Endometrialabnormality"];
        $this->Endometrialabnormality->AdvancedSearch->save();

        // Field AFC ON S1
        $this->AFCONS1->AdvancedSearch->SearchValue = @$filter["x_AFCONS1"];
        $this->AFCONS1->AdvancedSearch->SearchOperator = @$filter["z_AFCONS1"];
        $this->AFCONS1->AdvancedSearch->SearchCondition = @$filter["v_AFCONS1"];
        $this->AFCONS1->AdvancedSearch->SearchValue2 = @$filter["y_AFCONS1"];
        $this->AFCONS1->AdvancedSearch->SearchOperator2 = @$filter["w_AFCONS1"];
        $this->AFCONS1->AdvancedSearch->save();

        // Field TIME OF OPU FROM TRIGGER
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIMEOFOPUFROMTRIGGER"];
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIMEOFOPUFROMTRIGGER"];
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIMEOFOPUFROMTRIGGER"];
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIMEOFOPUFROMTRIGGER"];
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIMEOFOPUFROMTRIGGER"];
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->save();

        // Field SPERM TYPE
        $this->SPERMTYPE->AdvancedSearch->SearchValue = @$filter["x_SPERMTYPE"];
        $this->SPERMTYPE->AdvancedSearch->SearchOperator = @$filter["z_SPERMTYPE"];
        $this->SPERMTYPE->AdvancedSearch->SearchCondition = @$filter["v_SPERMTYPE"];
        $this->SPERMTYPE->AdvancedSearch->SearchValue2 = @$filter["y_SPERMTYPE"];
        $this->SPERMTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_SPERMTYPE"];
        $this->SPERMTYPE->AdvancedSearch->save();

        // Field EXPECTED ON TRIGGER DAY
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchValue = @$filter["x_EXPECTEDONTRIGGERDAY"];
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchOperator = @$filter["z_EXPECTEDONTRIGGERDAY"];
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchCondition = @$filter["v_EXPECTEDONTRIGGERDAY"];
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchValue2 = @$filter["y_EXPECTEDONTRIGGERDAY"];
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchOperator2 = @$filter["w_EXPECTEDONTRIGGERDAY"];
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->save();

        // Field OOCYTES RETRIEVED
        $this->OOCYTESRETRIEVED->AdvancedSearch->SearchValue = @$filter["x_OOCYTESRETRIEVED"];
        $this->OOCYTESRETRIEVED->AdvancedSearch->SearchOperator = @$filter["z_OOCYTESRETRIEVED"];
        $this->OOCYTESRETRIEVED->AdvancedSearch->SearchCondition = @$filter["v_OOCYTESRETRIEVED"];
        $this->OOCYTESRETRIEVED->AdvancedSearch->SearchValue2 = @$filter["y_OOCYTESRETRIEVED"];
        $this->OOCYTESRETRIEVED->AdvancedSearch->SearchOperator2 = @$filter["w_OOCYTESRETRIEVED"];
        $this->OOCYTESRETRIEVED->AdvancedSearch->save();

        // Field TIME OF DENUDATION
        $this->TIMEOFDENUDATION->AdvancedSearch->SearchValue = @$filter["x_TIMEOFDENUDATION"];
        $this->TIMEOFDENUDATION->AdvancedSearch->SearchOperator = @$filter["z_TIMEOFDENUDATION"];
        $this->TIMEOFDENUDATION->AdvancedSearch->SearchCondition = @$filter["v_TIMEOFDENUDATION"];
        $this->TIMEOFDENUDATION->AdvancedSearch->SearchValue2 = @$filter["y_TIMEOFDENUDATION"];
        $this->TIMEOFDENUDATION->AdvancedSearch->SearchOperator2 = @$filter["w_TIMEOFDENUDATION"];
        $this->TIMEOFDENUDATION->AdvancedSearch->save();

        // Field M-II
        $this->MII->AdvancedSearch->SearchValue = @$filter["x_MII"];
        $this->MII->AdvancedSearch->SearchOperator = @$filter["z_MII"];
        $this->MII->AdvancedSearch->SearchCondition = @$filter["v_MII"];
        $this->MII->AdvancedSearch->SearchValue2 = @$filter["y_MII"];
        $this->MII->AdvancedSearch->SearchOperator2 = @$filter["w_MII"];
        $this->MII->AdvancedSearch->save();

        // Field MI
        $this->MI->AdvancedSearch->SearchValue = @$filter["x_MI"];
        $this->MI->AdvancedSearch->SearchOperator = @$filter["z_MI"];
        $this->MI->AdvancedSearch->SearchCondition = @$filter["v_MI"];
        $this->MI->AdvancedSearch->SearchValue2 = @$filter["y_MI"];
        $this->MI->AdvancedSearch->SearchOperator2 = @$filter["w_MI"];
        $this->MI->AdvancedSearch->save();

        // Field GV
        $this->GV->AdvancedSearch->SearchValue = @$filter["x_GV"];
        $this->GV->AdvancedSearch->SearchOperator = @$filter["z_GV"];
        $this->GV->AdvancedSearch->SearchCondition = @$filter["v_GV"];
        $this->GV->AdvancedSearch->SearchValue2 = @$filter["y_GV"];
        $this->GV->AdvancedSearch->SearchOperator2 = @$filter["w_GV"];
        $this->GV->AdvancedSearch->save();

        // Field ICSI TIME FORM OPU
        $this->ICSITIMEFORMOPU->AdvancedSearch->SearchValue = @$filter["x_ICSITIMEFORMOPU"];
        $this->ICSITIMEFORMOPU->AdvancedSearch->SearchOperator = @$filter["z_ICSITIMEFORMOPU"];
        $this->ICSITIMEFORMOPU->AdvancedSearch->SearchCondition = @$filter["v_ICSITIMEFORMOPU"];
        $this->ICSITIMEFORMOPU->AdvancedSearch->SearchValue2 = @$filter["y_ICSITIMEFORMOPU"];
        $this->ICSITIMEFORMOPU->AdvancedSearch->SearchOperator2 = @$filter["w_ICSITIMEFORMOPU"];
        $this->ICSITIMEFORMOPU->AdvancedSearch->save();

        // Field FERT ( 2 PN )
        $this->FERT2PN->AdvancedSearch->SearchValue = @$filter["x_FERT2PN"];
        $this->FERT2PN->AdvancedSearch->SearchOperator = @$filter["z_FERT2PN"];
        $this->FERT2PN->AdvancedSearch->SearchCondition = @$filter["v_FERT2PN"];
        $this->FERT2PN->AdvancedSearch->SearchValue2 = @$filter["y_FERT2PN"];
        $this->FERT2PN->AdvancedSearch->SearchOperator2 = @$filter["w_FERT2PN"];
        $this->FERT2PN->AdvancedSearch->save();

        // Field DEG
        $this->DEG->AdvancedSearch->SearchValue = @$filter["x_DEG"];
        $this->DEG->AdvancedSearch->SearchOperator = @$filter["z_DEG"];
        $this->DEG->AdvancedSearch->SearchCondition = @$filter["v_DEG"];
        $this->DEG->AdvancedSearch->SearchValue2 = @$filter["y_DEG"];
        $this->DEG->AdvancedSearch->SearchOperator2 = @$filter["w_DEG"];
        $this->DEG->AdvancedSearch->save();

        // Field D3 GRADE A
        $this->D3GRADEA->AdvancedSearch->SearchValue = @$filter["x_D3GRADEA"];
        $this->D3GRADEA->AdvancedSearch->SearchOperator = @$filter["z_D3GRADEA"];
        $this->D3GRADEA->AdvancedSearch->SearchCondition = @$filter["v_D3GRADEA"];
        $this->D3GRADEA->AdvancedSearch->SearchValue2 = @$filter["y_D3GRADEA"];
        $this->D3GRADEA->AdvancedSearch->SearchOperator2 = @$filter["w_D3GRADEA"];
        $this->D3GRADEA->AdvancedSearch->save();

        // Field D3 GRADE B
        $this->D3GRADEB->AdvancedSearch->SearchValue = @$filter["x_D3GRADEB"];
        $this->D3GRADEB->AdvancedSearch->SearchOperator = @$filter["z_D3GRADEB"];
        $this->D3GRADEB->AdvancedSearch->SearchCondition = @$filter["v_D3GRADEB"];
        $this->D3GRADEB->AdvancedSearch->SearchValue2 = @$filter["y_D3GRADEB"];
        $this->D3GRADEB->AdvancedSearch->SearchOperator2 = @$filter["w_D3GRADEB"];
        $this->D3GRADEB->AdvancedSearch->save();

        // Field D3 GRADE C
        $this->D3GRADEC->AdvancedSearch->SearchValue = @$filter["x_D3GRADEC"];
        $this->D3GRADEC->AdvancedSearch->SearchOperator = @$filter["z_D3GRADEC"];
        $this->D3GRADEC->AdvancedSearch->SearchCondition = @$filter["v_D3GRADEC"];
        $this->D3GRADEC->AdvancedSearch->SearchValue2 = @$filter["y_D3GRADEC"];
        $this->D3GRADEC->AdvancedSearch->SearchOperator2 = @$filter["w_D3GRADEC"];
        $this->D3GRADEC->AdvancedSearch->save();

        // Field D3 GRADE D
        $this->D3GRADED->AdvancedSearch->SearchValue = @$filter["x_D3GRADED"];
        $this->D3GRADED->AdvancedSearch->SearchOperator = @$filter["z_D3GRADED"];
        $this->D3GRADED->AdvancedSearch->SearchCondition = @$filter["v_D3GRADED"];
        $this->D3GRADED->AdvancedSearch->SearchValue2 = @$filter["y_D3GRADED"];
        $this->D3GRADED->AdvancedSearch->SearchOperator2 = @$filter["w_D3GRADED"];
        $this->D3GRADED->AdvancedSearch->save();

        // Field USABLE ON DAY 3 ET
        $this->USABLEONDAY3ET->AdvancedSearch->SearchValue = @$filter["x_USABLEONDAY3ET"];
        $this->USABLEONDAY3ET->AdvancedSearch->SearchOperator = @$filter["z_USABLEONDAY3ET"];
        $this->USABLEONDAY3ET->AdvancedSearch->SearchCondition = @$filter["v_USABLEONDAY3ET"];
        $this->USABLEONDAY3ET->AdvancedSearch->SearchValue2 = @$filter["y_USABLEONDAY3ET"];
        $this->USABLEONDAY3ET->AdvancedSearch->SearchOperator2 = @$filter["w_USABLEONDAY3ET"];
        $this->USABLEONDAY3ET->AdvancedSearch->save();

        // Field USABLE ON day 3 FREEZING
        $this->USABLEONday3FREEZING->AdvancedSearch->SearchValue = @$filter["x_USABLEONday3FREEZING"];
        $this->USABLEONday3FREEZING->AdvancedSearch->SearchOperator = @$filter["z_USABLEONday3FREEZING"];
        $this->USABLEONday3FREEZING->AdvancedSearch->SearchCondition = @$filter["v_USABLEONday3FREEZING"];
        $this->USABLEONday3FREEZING->AdvancedSearch->SearchValue2 = @$filter["y_USABLEONday3FREEZING"];
        $this->USABLEONday3FREEZING->AdvancedSearch->SearchOperator2 = @$filter["w_USABLEONday3FREEZING"];
        $this->USABLEONday3FREEZING->AdvancedSearch->save();

        // Field D5 GARDE A
        $this->D5GARDEA->AdvancedSearch->SearchValue = @$filter["x_D5GARDEA"];
        $this->D5GARDEA->AdvancedSearch->SearchOperator = @$filter["z_D5GARDEA"];
        $this->D5GARDEA->AdvancedSearch->SearchCondition = @$filter["v_D5GARDEA"];
        $this->D5GARDEA->AdvancedSearch->SearchValue2 = @$filter["y_D5GARDEA"];
        $this->D5GARDEA->AdvancedSearch->SearchOperator2 = @$filter["w_D5GARDEA"];
        $this->D5GARDEA->AdvancedSearch->save();

        // Field D5 GRADE B
        $this->D5GRADEB->AdvancedSearch->SearchValue = @$filter["x_D5GRADEB"];
        $this->D5GRADEB->AdvancedSearch->SearchOperator = @$filter["z_D5GRADEB"];
        $this->D5GRADEB->AdvancedSearch->SearchCondition = @$filter["v_D5GRADEB"];
        $this->D5GRADEB->AdvancedSearch->SearchValue2 = @$filter["y_D5GRADEB"];
        $this->D5GRADEB->AdvancedSearch->SearchOperator2 = @$filter["w_D5GRADEB"];
        $this->D5GRADEB->AdvancedSearch->save();

        // Field D5 GRADE C
        $this->D5GRADEC->AdvancedSearch->SearchValue = @$filter["x_D5GRADEC"];
        $this->D5GRADEC->AdvancedSearch->SearchOperator = @$filter["z_D5GRADEC"];
        $this->D5GRADEC->AdvancedSearch->SearchCondition = @$filter["v_D5GRADEC"];
        $this->D5GRADEC->AdvancedSearch->SearchValue2 = @$filter["y_D5GRADEC"];
        $this->D5GRADEC->AdvancedSearch->SearchOperator2 = @$filter["w_D5GRADEC"];
        $this->D5GRADEC->AdvancedSearch->save();

        // Field D5 GRADE D
        $this->D5GRADED->AdvancedSearch->SearchValue = @$filter["x_D5GRADED"];
        $this->D5GRADED->AdvancedSearch->SearchOperator = @$filter["z_D5GRADED"];
        $this->D5GRADED->AdvancedSearch->SearchCondition = @$filter["v_D5GRADED"];
        $this->D5GRADED->AdvancedSearch->SearchValue2 = @$filter["y_D5GRADED"];
        $this->D5GRADED->AdvancedSearch->SearchOperator2 = @$filter["w_D5GRADED"];
        $this->D5GRADED->AdvancedSearch->save();

        // Field USABLE ON D5 ET
        $this->USABLEOND5ET->AdvancedSearch->SearchValue = @$filter["x_USABLEOND5ET"];
        $this->USABLEOND5ET->AdvancedSearch->SearchOperator = @$filter["z_USABLEOND5ET"];
        $this->USABLEOND5ET->AdvancedSearch->SearchCondition = @$filter["v_USABLEOND5ET"];
        $this->USABLEOND5ET->AdvancedSearch->SearchValue2 = @$filter["y_USABLEOND5ET"];
        $this->USABLEOND5ET->AdvancedSearch->SearchOperator2 = @$filter["w_USABLEOND5ET"];
        $this->USABLEOND5ET->AdvancedSearch->save();

        // Field USABLE ON D5 FREEZING
        $this->USABLEOND5FREEZING->AdvancedSearch->SearchValue = @$filter["x_USABLEOND5FREEZING"];
        $this->USABLEOND5FREEZING->AdvancedSearch->SearchOperator = @$filter["z_USABLEOND5FREEZING"];
        $this->USABLEOND5FREEZING->AdvancedSearch->SearchCondition = @$filter["v_USABLEOND5FREEZING"];
        $this->USABLEOND5FREEZING->AdvancedSearch->SearchValue2 = @$filter["y_USABLEOND5FREEZING"];
        $this->USABLEOND5FREEZING->AdvancedSearch->SearchOperator2 = @$filter["w_USABLEOND5FREEZING"];
        $this->USABLEOND5FREEZING->AdvancedSearch->save();

        // Field D6 GRADE A
        $this->D6GRADEA->AdvancedSearch->SearchValue = @$filter["x_D6GRADEA"];
        $this->D6GRADEA->AdvancedSearch->SearchOperator = @$filter["z_D6GRADEA"];
        $this->D6GRADEA->AdvancedSearch->SearchCondition = @$filter["v_D6GRADEA"];
        $this->D6GRADEA->AdvancedSearch->SearchValue2 = @$filter["y_D6GRADEA"];
        $this->D6GRADEA->AdvancedSearch->SearchOperator2 = @$filter["w_D6GRADEA"];
        $this->D6GRADEA->AdvancedSearch->save();

        // Field D6 GRADE B
        $this->D6GRADEB->AdvancedSearch->SearchValue = @$filter["x_D6GRADEB"];
        $this->D6GRADEB->AdvancedSearch->SearchOperator = @$filter["z_D6GRADEB"];
        $this->D6GRADEB->AdvancedSearch->SearchCondition = @$filter["v_D6GRADEB"];
        $this->D6GRADEB->AdvancedSearch->SearchValue2 = @$filter["y_D6GRADEB"];
        $this->D6GRADEB->AdvancedSearch->SearchOperator2 = @$filter["w_D6GRADEB"];
        $this->D6GRADEB->AdvancedSearch->save();

        // Field D6 GRADE C
        $this->D6GRADEC->AdvancedSearch->SearchValue = @$filter["x_D6GRADEC"];
        $this->D6GRADEC->AdvancedSearch->SearchOperator = @$filter["z_D6GRADEC"];
        $this->D6GRADEC->AdvancedSearch->SearchCondition = @$filter["v_D6GRADEC"];
        $this->D6GRADEC->AdvancedSearch->SearchValue2 = @$filter["y_D6GRADEC"];
        $this->D6GRADEC->AdvancedSearch->SearchOperator2 = @$filter["w_D6GRADEC"];
        $this->D6GRADEC->AdvancedSearch->save();

        // Field D6 GRADE D
        $this->D6GRADED->AdvancedSearch->SearchValue = @$filter["x_D6GRADED"];
        $this->D6GRADED->AdvancedSearch->SearchOperator = @$filter["z_D6GRADED"];
        $this->D6GRADED->AdvancedSearch->SearchCondition = @$filter["v_D6GRADED"];
        $this->D6GRADED->AdvancedSearch->SearchValue2 = @$filter["y_D6GRADED"];
        $this->D6GRADED->AdvancedSearch->SearchOperator2 = @$filter["w_D6GRADED"];
        $this->D6GRADED->AdvancedSearch->save();

        // Field D6 USABLE EMBRYO ET
        $this->D6USABLEEMBRYOET->AdvancedSearch->SearchValue = @$filter["x_D6USABLEEMBRYOET"];
        $this->D6USABLEEMBRYOET->AdvancedSearch->SearchOperator = @$filter["z_D6USABLEEMBRYOET"];
        $this->D6USABLEEMBRYOET->AdvancedSearch->SearchCondition = @$filter["v_D6USABLEEMBRYOET"];
        $this->D6USABLEEMBRYOET->AdvancedSearch->SearchValue2 = @$filter["y_D6USABLEEMBRYOET"];
        $this->D6USABLEEMBRYOET->AdvancedSearch->SearchOperator2 = @$filter["w_D6USABLEEMBRYOET"];
        $this->D6USABLEEMBRYOET->AdvancedSearch->save();

        // Field D6 USABLE FREEZING
        $this->D6USABLEFREEZING->AdvancedSearch->SearchValue = @$filter["x_D6USABLEFREEZING"];
        $this->D6USABLEFREEZING->AdvancedSearch->SearchOperator = @$filter["z_D6USABLEFREEZING"];
        $this->D6USABLEFREEZING->AdvancedSearch->SearchCondition = @$filter["v_D6USABLEFREEZING"];
        $this->D6USABLEFREEZING->AdvancedSearch->SearchValue2 = @$filter["y_D6USABLEFREEZING"];
        $this->D6USABLEFREEZING->AdvancedSearch->SearchOperator2 = @$filter["w_D6USABLEFREEZING"];
        $this->D6USABLEFREEZING->AdvancedSearch->save();

        // Field TOTAL BLAST
        $this->TOTALBLAST->AdvancedSearch->SearchValue = @$filter["x_TOTALBLAST"];
        $this->TOTALBLAST->AdvancedSearch->SearchOperator = @$filter["z_TOTALBLAST"];
        $this->TOTALBLAST->AdvancedSearch->SearchCondition = @$filter["v_TOTALBLAST"];
        $this->TOTALBLAST->AdvancedSearch->SearchValue2 = @$filter["y_TOTALBLAST"];
        $this->TOTALBLAST->AdvancedSearch->SearchOperator2 = @$filter["w_TOTALBLAST"];
        $this->TOTALBLAST->AdvancedSearch->save();

        // Field PGS
        $this->PGS->AdvancedSearch->SearchValue = @$filter["x_PGS"];
        $this->PGS->AdvancedSearch->SearchOperator = @$filter["z_PGS"];
        $this->PGS->AdvancedSearch->SearchCondition = @$filter["v_PGS"];
        $this->PGS->AdvancedSearch->SearchValue2 = @$filter["y_PGS"];
        $this->PGS->AdvancedSearch->SearchOperator2 = @$filter["w_PGS"];
        $this->PGS->AdvancedSearch->save();

        // Field REMARKS
        $this->REMARKS->AdvancedSearch->SearchValue = @$filter["x_REMARKS"];
        $this->REMARKS->AdvancedSearch->SearchOperator = @$filter["z_REMARKS"];
        $this->REMARKS->AdvancedSearch->SearchCondition = @$filter["v_REMARKS"];
        $this->REMARKS->AdvancedSearch->SearchValue2 = @$filter["y_REMARKS"];
        $this->REMARKS->AdvancedSearch->SearchOperator2 = @$filter["w_REMARKS"];
        $this->REMARKS->AdvancedSearch->save();

        // Field PU - D/B
        $this->PUDB->AdvancedSearch->SearchValue = @$filter["x_PUDB"];
        $this->PUDB->AdvancedSearch->SearchOperator = @$filter["z_PUDB"];
        $this->PUDB->AdvancedSearch->SearchCondition = @$filter["v_PUDB"];
        $this->PUDB->AdvancedSearch->SearchValue2 = @$filter["y_PUDB"];
        $this->PUDB->AdvancedSearch->SearchOperator2 = @$filter["w_PUDB"];
        $this->PUDB->AdvancedSearch->save();

        // Field ICSI D/B
        $this->ICSIDB->AdvancedSearch->SearchValue = @$filter["x_ICSIDB"];
        $this->ICSIDB->AdvancedSearch->SearchOperator = @$filter["z_ICSIDB"];
        $this->ICSIDB->AdvancedSearch->SearchCondition = @$filter["v_ICSIDB"];
        $this->ICSIDB->AdvancedSearch->SearchValue2 = @$filter["y_ICSIDB"];
        $this->ICSIDB->AdvancedSearch->SearchOperator2 = @$filter["w_ICSIDB"];
        $this->ICSIDB->AdvancedSearch->save();

        // Field VIT D/B
        $this->VITDB->AdvancedSearch->SearchValue = @$filter["x_VITDB"];
        $this->VITDB->AdvancedSearch->SearchOperator = @$filter["z_VITDB"];
        $this->VITDB->AdvancedSearch->SearchCondition = @$filter["v_VITDB"];
        $this->VITDB->AdvancedSearch->SearchValue2 = @$filter["y_VITDB"];
        $this->VITDB->AdvancedSearch->SearchOperator2 = @$filter["w_VITDB"];
        $this->VITDB->AdvancedSearch->save();

        // Field ET D/B
        $this->ETDB->AdvancedSearch->SearchValue = @$filter["x_ETDB"];
        $this->ETDB->AdvancedSearch->SearchOperator = @$filter["z_ETDB"];
        $this->ETDB->AdvancedSearch->SearchCondition = @$filter["v_ETDB"];
        $this->ETDB->AdvancedSearch->SearchValue2 = @$filter["y_ETDB"];
        $this->ETDB->AdvancedSearch->SearchOperator2 = @$filter["w_ETDB"];
        $this->ETDB->AdvancedSearch->save();

        // Field LAB COMMENTS
        $this->LABCOMMENTS->AdvancedSearch->SearchValue = @$filter["x_LABCOMMENTS"];
        $this->LABCOMMENTS->AdvancedSearch->SearchOperator = @$filter["z_LABCOMMENTS"];
        $this->LABCOMMENTS->AdvancedSearch->SearchCondition = @$filter["v_LABCOMMENTS"];
        $this->LABCOMMENTS->AdvancedSearch->SearchValue2 = @$filter["y_LABCOMMENTS"];
        $this->LABCOMMENTS->AdvancedSearch->SearchOperator2 = @$filter["w_LABCOMMENTS"];
        $this->LABCOMMENTS->AdvancedSearch->save();

        // Field Reason for no FRESH transfer
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchValue = @$filter["x_ReasonfornoFRESHtransfer"];
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchOperator = @$filter["z_ReasonfornoFRESHtransfer"];
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchCondition = @$filter["v_ReasonfornoFRESHtransfer"];
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchValue2 = @$filter["y_ReasonfornoFRESHtransfer"];
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchOperator2 = @$filter["w_ReasonfornoFRESHtransfer"];
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->save();

        // Field No of embryos transferred Day 3/5, A,B,C
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchValue = @$filter["x_NoofembryostransferredDay35ABC"];
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchOperator = @$filter["z_NoofembryostransferredDay35ABC"];
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchCondition = @$filter["v_NoofembryostransferredDay35ABC"];
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchValue2 = @$filter["y_NoofembryostransferredDay35ABC"];
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchOperator2 = @$filter["w_NoofembryostransferredDay35ABC"];
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->save();

        // Field EMBRYOS PENDING
        $this->EMBRYOSPENDING->AdvancedSearch->SearchValue = @$filter["x_EMBRYOSPENDING"];
        $this->EMBRYOSPENDING->AdvancedSearch->SearchOperator = @$filter["z_EMBRYOSPENDING"];
        $this->EMBRYOSPENDING->AdvancedSearch->SearchCondition = @$filter["v_EMBRYOSPENDING"];
        $this->EMBRYOSPENDING->AdvancedSearch->SearchValue2 = @$filter["y_EMBRYOSPENDING"];
        $this->EMBRYOSPENDING->AdvancedSearch->SearchOperator2 = @$filter["w_EMBRYOSPENDING"];
        $this->EMBRYOSPENDING->AdvancedSearch->save();

        // Field DAY OF TRANSFER
        $this->DAYOFTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DAYOFTRANSFER"];
        $this->DAYOFTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DAYOFTRANSFER"];
        $this->DAYOFTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DAYOFTRANSFER"];
        $this->DAYOFTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFTRANSFER"];
        $this->DAYOFTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFTRANSFER"];
        $this->DAYOFTRANSFER->AdvancedSearch->save();

        // Field H/D sperm
        $this->HDsperm->AdvancedSearch->SearchValue = @$filter["x_HDsperm"];
        $this->HDsperm->AdvancedSearch->SearchOperator = @$filter["z_HDsperm"];
        $this->HDsperm->AdvancedSearch->SearchCondition = @$filter["v_HDsperm"];
        $this->HDsperm->AdvancedSearch->SearchValue2 = @$filter["y_HDsperm"];
        $this->HDsperm->AdvancedSearch->SearchOperator2 = @$filter["w_HDsperm"];
        $this->HDsperm->AdvancedSearch->save();

        // Field Comments
        $this->Comments->AdvancedSearch->SearchValue = @$filter["x_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator = @$filter["z_Comments"];
        $this->Comments->AdvancedSearch->SearchCondition = @$filter["v_Comments"];
        $this->Comments->AdvancedSearch->SearchValue2 = @$filter["y_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator2 = @$filter["w_Comments"];
        $this->Comments->AdvancedSearch->save();

        // Field sc progesterone
        $this->scprogesterone->AdvancedSearch->SearchValue = @$filter["x_scprogesterone"];
        $this->scprogesterone->AdvancedSearch->SearchOperator = @$filter["z_scprogesterone"];
        $this->scprogesterone->AdvancedSearch->SearchCondition = @$filter["v_scprogesterone"];
        $this->scprogesterone->AdvancedSearch->SearchValue2 = @$filter["y_scprogesterone"];
        $this->scprogesterone->AdvancedSearch->SearchOperator2 = @$filter["w_scprogesterone"];
        $this->scprogesterone->AdvancedSearch->save();

        // Field Natural micronised 400mg bd + duphaston 10mg bd
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchValue = @$filter["x_Naturalmicronised400mgbdduphaston10mgbd"];
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchOperator = @$filter["z_Naturalmicronised400mgbdduphaston10mgbd"];
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchCondition = @$filter["v_Naturalmicronised400mgbdduphaston10mgbd"];
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchValue2 = @$filter["y_Naturalmicronised400mgbdduphaston10mgbd"];
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchOperator2 = @$filter["w_Naturalmicronised400mgbdduphaston10mgbd"];
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->save();

        // Field CRINONE
        $this->CRINONE->AdvancedSearch->SearchValue = @$filter["x_CRINONE"];
        $this->CRINONE->AdvancedSearch->SearchOperator = @$filter["z_CRINONE"];
        $this->CRINONE->AdvancedSearch->SearchCondition = @$filter["v_CRINONE"];
        $this->CRINONE->AdvancedSearch->SearchValue2 = @$filter["y_CRINONE"];
        $this->CRINONE->AdvancedSearch->SearchOperator2 = @$filter["w_CRINONE"];
        $this->CRINONE->AdvancedSearch->save();

        // Field progynova
        $this->progynova->AdvancedSearch->SearchValue = @$filter["x_progynova"];
        $this->progynova->AdvancedSearch->SearchOperator = @$filter["z_progynova"];
        $this->progynova->AdvancedSearch->SearchCondition = @$filter["v_progynova"];
        $this->progynova->AdvancedSearch->SearchValue2 = @$filter["y_progynova"];
        $this->progynova->AdvancedSearch->SearchOperator2 = @$filter["w_progynova"];
        $this->progynova->AdvancedSearch->save();

        // Field Heparin
        $this->Heparin->AdvancedSearch->SearchValue = @$filter["x_Heparin"];
        $this->Heparin->AdvancedSearch->SearchOperator = @$filter["z_Heparin"];
        $this->Heparin->AdvancedSearch->SearchCondition = @$filter["v_Heparin"];
        $this->Heparin->AdvancedSearch->SearchValue2 = @$filter["y_Heparin"];
        $this->Heparin->AdvancedSearch->SearchOperator2 = @$filter["w_Heparin"];
        $this->Heparin->AdvancedSearch->save();

        // Field cabergolin
        $this->cabergolin->AdvancedSearch->SearchValue = @$filter["x_cabergolin"];
        $this->cabergolin->AdvancedSearch->SearchOperator = @$filter["z_cabergolin"];
        $this->cabergolin->AdvancedSearch->SearchCondition = @$filter["v_cabergolin"];
        $this->cabergolin->AdvancedSearch->SearchValue2 = @$filter["y_cabergolin"];
        $this->cabergolin->AdvancedSearch->SearchOperator2 = @$filter["w_cabergolin"];
        $this->cabergolin->AdvancedSearch->save();

        // Field Antagonist
        $this->Antagonist->AdvancedSearch->SearchValue = @$filter["x_Antagonist"];
        $this->Antagonist->AdvancedSearch->SearchOperator = @$filter["z_Antagonist"];
        $this->Antagonist->AdvancedSearch->SearchCondition = @$filter["v_Antagonist"];
        $this->Antagonist->AdvancedSearch->SearchValue2 = @$filter["y_Antagonist"];
        $this->Antagonist->AdvancedSearch->SearchOperator2 = @$filter["w_Antagonist"];
        $this->Antagonist->AdvancedSearch->save();

        // Field OHSS
        $this->OHSS->AdvancedSearch->SearchValue = @$filter["x_OHSS"];
        $this->OHSS->AdvancedSearch->SearchOperator = @$filter["z_OHSS"];
        $this->OHSS->AdvancedSearch->SearchCondition = @$filter["v_OHSS"];
        $this->OHSS->AdvancedSearch->SearchValue2 = @$filter["y_OHSS"];
        $this->OHSS->AdvancedSearch->SearchOperator2 = @$filter["w_OHSS"];
        $this->OHSS->AdvancedSearch->save();

        // Field Complications
        $this->Complications->AdvancedSearch->SearchValue = @$filter["x_Complications"];
        $this->Complications->AdvancedSearch->SearchOperator = @$filter["z_Complications"];
        $this->Complications->AdvancedSearch->SearchCondition = @$filter["v_Complications"];
        $this->Complications->AdvancedSearch->SearchValue2 = @$filter["y_Complications"];
        $this->Complications->AdvancedSearch->SearchOperator2 = @$filter["w_Complications"];
        $this->Complications->AdvancedSearch->save();

        // Field LP bleeding
        $this->LPbleeding->AdvancedSearch->SearchValue = @$filter["x_LPbleeding"];
        $this->LPbleeding->AdvancedSearch->SearchOperator = @$filter["z_LPbleeding"];
        $this->LPbleeding->AdvancedSearch->SearchCondition = @$filter["v_LPbleeding"];
        $this->LPbleeding->AdvancedSearch->SearchValue2 = @$filter["y_LPbleeding"];
        $this->LPbleeding->AdvancedSearch->SearchOperator2 = @$filter["w_LPbleeding"];
        $this->LPbleeding->AdvancedSearch->save();

        // Field ß-hCG
        $this->hCG->AdvancedSearch->SearchValue = @$filter["x_hCG"];
        $this->hCG->AdvancedSearch->SearchOperator = @$filter["z_hCG"];
        $this->hCG->AdvancedSearch->SearchCondition = @$filter["v_hCG"];
        $this->hCG->AdvancedSearch->SearchValue2 = @$filter["y_hCG"];
        $this->hCG->AdvancedSearch->SearchOperator2 = @$filter["w_hCG"];
        $this->hCG->AdvancedSearch->save();

        // Field Implantation rate
        $this->Implantationrate->AdvancedSearch->SearchValue = @$filter["x_Implantationrate"];
        $this->Implantationrate->AdvancedSearch->SearchOperator = @$filter["z_Implantationrate"];
        $this->Implantationrate->AdvancedSearch->SearchCondition = @$filter["v_Implantationrate"];
        $this->Implantationrate->AdvancedSearch->SearchValue2 = @$filter["y_Implantationrate"];
        $this->Implantationrate->AdvancedSearch->SearchOperator2 = @$filter["w_Implantationrate"];
        $this->Implantationrate->AdvancedSearch->save();

        // Field Ectopic
        $this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
        $this->Ectopic->AdvancedSearch->save();

        // Field Type of preg
        $this->Typeofpreg->AdvancedSearch->SearchValue = @$filter["x_Typeofpreg"];
        $this->Typeofpreg->AdvancedSearch->SearchOperator = @$filter["z_Typeofpreg"];
        $this->Typeofpreg->AdvancedSearch->SearchCondition = @$filter["v_Typeofpreg"];
        $this->Typeofpreg->AdvancedSearch->SearchValue2 = @$filter["y_Typeofpreg"];
        $this->Typeofpreg->AdvancedSearch->SearchOperator2 = @$filter["w_Typeofpreg"];
        $this->Typeofpreg->AdvancedSearch->save();

        // Field ANC
        $this->ANC->AdvancedSearch->SearchValue = @$filter["x_ANC"];
        $this->ANC->AdvancedSearch->SearchOperator = @$filter["z_ANC"];
        $this->ANC->AdvancedSearch->SearchCondition = @$filter["v_ANC"];
        $this->ANC->AdvancedSearch->SearchValue2 = @$filter["y_ANC"];
        $this->ANC->AdvancedSearch->SearchOperator2 = @$filter["w_ANC"];
        $this->ANC->AdvancedSearch->save();

        // Field anomalies
        $this->anomalies->AdvancedSearch->SearchValue = @$filter["x_anomalies"];
        $this->anomalies->AdvancedSearch->SearchOperator = @$filter["z_anomalies"];
        $this->anomalies->AdvancedSearch->SearchCondition = @$filter["v_anomalies"];
        $this->anomalies->AdvancedSearch->SearchValue2 = @$filter["y_anomalies"];
        $this->anomalies->AdvancedSearch->SearchOperator2 = @$filter["w_anomalies"];
        $this->anomalies->AdvancedSearch->save();

        // Field baby wt
        $this->babywt->AdvancedSearch->SearchValue = @$filter["x_babywt"];
        $this->babywt->AdvancedSearch->SearchOperator = @$filter["z_babywt"];
        $this->babywt->AdvancedSearch->SearchCondition = @$filter["v_babywt"];
        $this->babywt->AdvancedSearch->SearchValue2 = @$filter["y_babywt"];
        $this->babywt->AdvancedSearch->SearchOperator2 = @$filter["w_babywt"];
        $this->babywt->AdvancedSearch->save();

        // Field GA at delivery
        $this->GAatdelivery->AdvancedSearch->SearchValue = @$filter["x_GAatdelivery"];
        $this->GAatdelivery->AdvancedSearch->SearchOperator = @$filter["z_GAatdelivery"];
        $this->GAatdelivery->AdvancedSearch->SearchCondition = @$filter["v_GAatdelivery"];
        $this->GAatdelivery->AdvancedSearch->SearchValue2 = @$filter["y_GAatdelivery"];
        $this->GAatdelivery->AdvancedSearch->SearchOperator2 = @$filter["w_GAatdelivery"];
        $this->GAatdelivery->AdvancedSearch->save();

        // Field Pregnancy outcome
        $this->Pregnancyoutcome->AdvancedSearch->SearchValue = @$filter["x_Pregnancyoutcome"];
        $this->Pregnancyoutcome->AdvancedSearch->SearchOperator = @$filter["z_Pregnancyoutcome"];
        $this->Pregnancyoutcome->AdvancedSearch->SearchCondition = @$filter["v_Pregnancyoutcome"];
        $this->Pregnancyoutcome->AdvancedSearch->SearchValue2 = @$filter["y_Pregnancyoutcome"];
        $this->Pregnancyoutcome->AdvancedSearch->SearchOperator2 = @$filter["w_Pregnancyoutcome"];
        $this->Pregnancyoutcome->AdvancedSearch->save();

        // Field 1st FET
        $this->_1stFET->AdvancedSearch->SearchValue = @$filter["x__1stFET"];
        $this->_1stFET->AdvancedSearch->SearchOperator = @$filter["z__1stFET"];
        $this->_1stFET->AdvancedSearch->SearchCondition = @$filter["v__1stFET"];
        $this->_1stFET->AdvancedSearch->SearchValue2 = @$filter["y__1stFET"];
        $this->_1stFET->AdvancedSearch->SearchOperator2 = @$filter["w__1stFET"];
        $this->_1stFET->AdvancedSearch->save();

        // Field AFTER HYSTEROSCOPY
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchValue = @$filter["x_AFTERHYSTEROSCOPY"];
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchOperator = @$filter["z_AFTERHYSTEROSCOPY"];
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchCondition = @$filter["v_AFTERHYSTEROSCOPY"];
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchValue2 = @$filter["y_AFTERHYSTEROSCOPY"];
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchOperator2 = @$filter["w_AFTERHYSTEROSCOPY"];
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->save();

        // Field AFTER ERA
        $this->AFTERERA->AdvancedSearch->SearchValue = @$filter["x_AFTERERA"];
        $this->AFTERERA->AdvancedSearch->SearchOperator = @$filter["z_AFTERERA"];
        $this->AFTERERA->AdvancedSearch->SearchCondition = @$filter["v_AFTERERA"];
        $this->AFTERERA->AdvancedSearch->SearchValue2 = @$filter["y_AFTERERA"];
        $this->AFTERERA->AdvancedSearch->SearchOperator2 = @$filter["w_AFTERERA"];
        $this->AFTERERA->AdvancedSearch->save();

        // Field ERA
        $this->ERA->AdvancedSearch->SearchValue = @$filter["x_ERA"];
        $this->ERA->AdvancedSearch->SearchOperator = @$filter["z_ERA"];
        $this->ERA->AdvancedSearch->SearchCondition = @$filter["v_ERA"];
        $this->ERA->AdvancedSearch->SearchValue2 = @$filter["y_ERA"];
        $this->ERA->AdvancedSearch->SearchOperator2 = @$filter["w_ERA"];
        $this->ERA->AdvancedSearch->save();

        // Field HRT
        $this->HRT->AdvancedSearch->SearchValue = @$filter["x_HRT"];
        $this->HRT->AdvancedSearch->SearchOperator = @$filter["z_HRT"];
        $this->HRT->AdvancedSearch->SearchCondition = @$filter["v_HRT"];
        $this->HRT->AdvancedSearch->SearchValue2 = @$filter["y_HRT"];
        $this->HRT->AdvancedSearch->SearchOperator2 = @$filter["w_HRT"];
        $this->HRT->AdvancedSearch->save();

        // Field XGRAST/PRP
        $this->XGRASTPRP->AdvancedSearch->SearchValue = @$filter["x_XGRASTPRP"];
        $this->XGRASTPRP->AdvancedSearch->SearchOperator = @$filter["z_XGRASTPRP"];
        $this->XGRASTPRP->AdvancedSearch->SearchCondition = @$filter["v_XGRASTPRP"];
        $this->XGRASTPRP->AdvancedSearch->SearchValue2 = @$filter["y_XGRASTPRP"];
        $this->XGRASTPRP->AdvancedSearch->SearchOperator2 = @$filter["w_XGRASTPRP"];
        $this->XGRASTPRP->AdvancedSearch->save();

        // Field EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchValue = @$filter["x_EMBRYODETAILSDAY35ABC"];
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchOperator = @$filter["z_EMBRYODETAILSDAY35ABC"];
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchCondition = @$filter["v_EMBRYODETAILSDAY35ABC"];
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchValue2 = @$filter["y_EMBRYODETAILSDAY35ABC"];
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchOperator2 = @$filter["w_EMBRYODETAILSDAY35ABC"];
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->save();

        // Field LMWH 40MG
        $this->LMWH40MG->AdvancedSearch->SearchValue = @$filter["x_LMWH40MG"];
        $this->LMWH40MG->AdvancedSearch->SearchOperator = @$filter["z_LMWH40MG"];
        $this->LMWH40MG->AdvancedSearch->SearchCondition = @$filter["v_LMWH40MG"];
        $this->LMWH40MG->AdvancedSearch->SearchValue2 = @$filter["y_LMWH40MG"];
        $this->LMWH40MG->AdvancedSearch->SearchOperator2 = @$filter["w_LMWH40MG"];
        $this->LMWH40MG->AdvancedSearch->save();

        // Field ß-hCG2
        $this->hCG2->AdvancedSearch->SearchValue = @$filter["x_hCG2"];
        $this->hCG2->AdvancedSearch->SearchOperator = @$filter["z_hCG2"];
        $this->hCG2->AdvancedSearch->SearchCondition = @$filter["v_hCG2"];
        $this->hCG2->AdvancedSearch->SearchValue2 = @$filter["y_hCG2"];
        $this->hCG2->AdvancedSearch->SearchOperator2 = @$filter["w_hCG2"];
        $this->hCG2->AdvancedSearch->save();

        // Field Implantation rate1
        $this->Implantationrate1->AdvancedSearch->SearchValue = @$filter["x_Implantationrate1"];
        $this->Implantationrate1->AdvancedSearch->SearchOperator = @$filter["z_Implantationrate1"];
        $this->Implantationrate1->AdvancedSearch->SearchCondition = @$filter["v_Implantationrate1"];
        $this->Implantationrate1->AdvancedSearch->SearchValue2 = @$filter["y_Implantationrate1"];
        $this->Implantationrate1->AdvancedSearch->SearchOperator2 = @$filter["w_Implantationrate1"];
        $this->Implantationrate1->AdvancedSearch->save();

        // Field Ectopic1
        $this->Ectopic1->AdvancedSearch->SearchValue = @$filter["x_Ectopic1"];
        $this->Ectopic1->AdvancedSearch->SearchOperator = @$filter["z_Ectopic1"];
        $this->Ectopic1->AdvancedSearch->SearchCondition = @$filter["v_Ectopic1"];
        $this->Ectopic1->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic1"];
        $this->Ectopic1->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic1"];
        $this->Ectopic1->AdvancedSearch->save();

        // Field Type of pregA
        $this->TypeofpregA->AdvancedSearch->SearchValue = @$filter["x_TypeofpregA"];
        $this->TypeofpregA->AdvancedSearch->SearchOperator = @$filter["z_TypeofpregA"];
        $this->TypeofpregA->AdvancedSearch->SearchCondition = @$filter["v_TypeofpregA"];
        $this->TypeofpregA->AdvancedSearch->SearchValue2 = @$filter["y_TypeofpregA"];
        $this->TypeofpregA->AdvancedSearch->SearchOperator2 = @$filter["w_TypeofpregA"];
        $this->TypeofpregA->AdvancedSearch->save();

        // Field ANC1
        $this->ANC1->AdvancedSearch->SearchValue = @$filter["x_ANC1"];
        $this->ANC1->AdvancedSearch->SearchOperator = @$filter["z_ANC1"];
        $this->ANC1->AdvancedSearch->SearchCondition = @$filter["v_ANC1"];
        $this->ANC1->AdvancedSearch->SearchValue2 = @$filter["y_ANC1"];
        $this->ANC1->AdvancedSearch->SearchOperator2 = @$filter["w_ANC1"];
        $this->ANC1->AdvancedSearch->save();

        // Field anomalies2
        $this->anomalies2->AdvancedSearch->SearchValue = @$filter["x_anomalies2"];
        $this->anomalies2->AdvancedSearch->SearchOperator = @$filter["z_anomalies2"];
        $this->anomalies2->AdvancedSearch->SearchCondition = @$filter["v_anomalies2"];
        $this->anomalies2->AdvancedSearch->SearchValue2 = @$filter["y_anomalies2"];
        $this->anomalies2->AdvancedSearch->SearchOperator2 = @$filter["w_anomalies2"];
        $this->anomalies2->AdvancedSearch->save();

        // Field baby wt2
        $this->babywt2->AdvancedSearch->SearchValue = @$filter["x_babywt2"];
        $this->babywt2->AdvancedSearch->SearchOperator = @$filter["z_babywt2"];
        $this->babywt2->AdvancedSearch->SearchCondition = @$filter["v_babywt2"];
        $this->babywt2->AdvancedSearch->SearchValue2 = @$filter["y_babywt2"];
        $this->babywt2->AdvancedSearch->SearchOperator2 = @$filter["w_babywt2"];
        $this->babywt2->AdvancedSearch->save();

        // Field GA at delivery1
        $this->GAatdelivery1->AdvancedSearch->SearchValue = @$filter["x_GAatdelivery1"];
        $this->GAatdelivery1->AdvancedSearch->SearchOperator = @$filter["z_GAatdelivery1"];
        $this->GAatdelivery1->AdvancedSearch->SearchCondition = @$filter["v_GAatdelivery1"];
        $this->GAatdelivery1->AdvancedSearch->SearchValue2 = @$filter["y_GAatdelivery1"];
        $this->GAatdelivery1->AdvancedSearch->SearchOperator2 = @$filter["w_GAatdelivery1"];
        $this->GAatdelivery1->AdvancedSearch->save();

        // Field Pregnancy outcome1
        $this->Pregnancyoutcome1->AdvancedSearch->SearchValue = @$filter["x_Pregnancyoutcome1"];
        $this->Pregnancyoutcome1->AdvancedSearch->SearchOperator = @$filter["z_Pregnancyoutcome1"];
        $this->Pregnancyoutcome1->AdvancedSearch->SearchCondition = @$filter["v_Pregnancyoutcome1"];
        $this->Pregnancyoutcome1->AdvancedSearch->SearchValue2 = @$filter["y_Pregnancyoutcome1"];
        $this->Pregnancyoutcome1->AdvancedSearch->SearchOperator2 = @$filter["w_Pregnancyoutcome1"];
        $this->Pregnancyoutcome1->AdvancedSearch->save();

        // Field 2ND FET
        $this->_2NDFET->AdvancedSearch->SearchValue = @$filter["x__2NDFET"];
        $this->_2NDFET->AdvancedSearch->SearchOperator = @$filter["z__2NDFET"];
        $this->_2NDFET->AdvancedSearch->SearchCondition = @$filter["v__2NDFET"];
        $this->_2NDFET->AdvancedSearch->SearchValue2 = @$filter["y__2NDFET"];
        $this->_2NDFET->AdvancedSearch->SearchOperator2 = @$filter["w__2NDFET"];
        $this->_2NDFET->AdvancedSearch->save();

        // Field AFTER HYSTEROSCOPY1
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchValue = @$filter["x_AFTERHYSTEROSCOPY1"];
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchOperator = @$filter["z_AFTERHYSTEROSCOPY1"];
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchCondition = @$filter["v_AFTERHYSTEROSCOPY1"];
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchValue2 = @$filter["y_AFTERHYSTEROSCOPY1"];
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchOperator2 = @$filter["w_AFTERHYSTEROSCOPY1"];
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->save();

        // Field AFTER ERA1
        $this->AFTERERA1->AdvancedSearch->SearchValue = @$filter["x_AFTERERA1"];
        $this->AFTERERA1->AdvancedSearch->SearchOperator = @$filter["z_AFTERERA1"];
        $this->AFTERERA1->AdvancedSearch->SearchCondition = @$filter["v_AFTERERA1"];
        $this->AFTERERA1->AdvancedSearch->SearchValue2 = @$filter["y_AFTERERA1"];
        $this->AFTERERA1->AdvancedSearch->SearchOperator2 = @$filter["w_AFTERERA1"];
        $this->AFTERERA1->AdvancedSearch->save();

        // Field ERA1
        $this->ERA1->AdvancedSearch->SearchValue = @$filter["x_ERA1"];
        $this->ERA1->AdvancedSearch->SearchOperator = @$filter["z_ERA1"];
        $this->ERA1->AdvancedSearch->SearchCondition = @$filter["v_ERA1"];
        $this->ERA1->AdvancedSearch->SearchValue2 = @$filter["y_ERA1"];
        $this->ERA1->AdvancedSearch->SearchOperator2 = @$filter["w_ERA1"];
        $this->ERA1->AdvancedSearch->save();

        // Field HRT1
        $this->HRT1->AdvancedSearch->SearchValue = @$filter["x_HRT1"];
        $this->HRT1->AdvancedSearch->SearchOperator = @$filter["z_HRT1"];
        $this->HRT1->AdvancedSearch->SearchCondition = @$filter["v_HRT1"];
        $this->HRT1->AdvancedSearch->SearchValue2 = @$filter["y_HRT1"];
        $this->HRT1->AdvancedSearch->SearchOperator2 = @$filter["w_HRT1"];
        $this->HRT1->AdvancedSearch->save();

        // Field XGRAST/PRP1
        $this->XGRASTPRP1->AdvancedSearch->SearchValue = @$filter["x_XGRASTPRP1"];
        $this->XGRASTPRP1->AdvancedSearch->SearchOperator = @$filter["z_XGRASTPRP1"];
        $this->XGRASTPRP1->AdvancedSearch->SearchCondition = @$filter["v_XGRASTPRP1"];
        $this->XGRASTPRP1->AdvancedSearch->SearchValue2 = @$filter["y_XGRASTPRP1"];
        $this->XGRASTPRP1->AdvancedSearch->SearchOperator2 = @$filter["w_XGRASTPRP1"];
        $this->XGRASTPRP1->AdvancedSearch->save();

        // Field NUMBER OF EMBRYOS
        $this->NUMBEROFEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_NUMBEROFEMBRYOS"];
        $this->NUMBEROFEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_NUMBEROFEMBRYOS"];
        $this->NUMBEROFEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_NUMBEROFEMBRYOS"];
        $this->NUMBEROFEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_NUMBEROFEMBRYOS"];
        $this->NUMBEROFEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_NUMBEROFEMBRYOS"];
        $this->NUMBEROFEMBRYOS->AdvancedSearch->save();

        // Field EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchValue = @$filter["x_EMBRYODETAILSDAY356ABC"];
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchOperator = @$filter["z_EMBRYODETAILSDAY356ABC"];
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchCondition = @$filter["v_EMBRYODETAILSDAY356ABC"];
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchValue2 = @$filter["y_EMBRYODETAILSDAY356ABC"];
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchOperator2 = @$filter["w_EMBRYODETAILSDAY356ABC"];
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->save();

        // Field INTRALIPID AND BARGLOBIN
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchValue = @$filter["x_INTRALIPIDANDBARGLOBIN"];
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchOperator = @$filter["z_INTRALIPIDANDBARGLOBIN"];
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchCondition = @$filter["v_INTRALIPIDANDBARGLOBIN"];
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchValue2 = @$filter["y_INTRALIPIDANDBARGLOBIN"];
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchOperator2 = @$filter["w_INTRALIPIDANDBARGLOBIN"];
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->save();

        // Field LMWH 40MG1
        $this->LMWH40MG1->AdvancedSearch->SearchValue = @$filter["x_LMWH40MG1"];
        $this->LMWH40MG1->AdvancedSearch->SearchOperator = @$filter["z_LMWH40MG1"];
        $this->LMWH40MG1->AdvancedSearch->SearchCondition = @$filter["v_LMWH40MG1"];
        $this->LMWH40MG1->AdvancedSearch->SearchValue2 = @$filter["y_LMWH40MG1"];
        $this->LMWH40MG1->AdvancedSearch->SearchOperator2 = @$filter["w_LMWH40MG1"];
        $this->LMWH40MG1->AdvancedSearch->save();

        // Field ß-hCG1
        $this->hCG1->AdvancedSearch->SearchValue = @$filter["x_hCG1"];
        $this->hCG1->AdvancedSearch->SearchOperator = @$filter["z_hCG1"];
        $this->hCG1->AdvancedSearch->SearchCondition = @$filter["v_hCG1"];
        $this->hCG1->AdvancedSearch->SearchValue2 = @$filter["y_hCG1"];
        $this->hCG1->AdvancedSearch->SearchOperator2 = @$filter["w_hCG1"];
        $this->hCG1->AdvancedSearch->save();

        // Field Implantation rate2
        $this->Implantationrate2->AdvancedSearch->SearchValue = @$filter["x_Implantationrate2"];
        $this->Implantationrate2->AdvancedSearch->SearchOperator = @$filter["z_Implantationrate2"];
        $this->Implantationrate2->AdvancedSearch->SearchCondition = @$filter["v_Implantationrate2"];
        $this->Implantationrate2->AdvancedSearch->SearchValue2 = @$filter["y_Implantationrate2"];
        $this->Implantationrate2->AdvancedSearch->SearchOperator2 = @$filter["w_Implantationrate2"];
        $this->Implantationrate2->AdvancedSearch->save();

        // Field Ectopic2
        $this->Ectopic2->AdvancedSearch->SearchValue = @$filter["x_Ectopic2"];
        $this->Ectopic2->AdvancedSearch->SearchOperator = @$filter["z_Ectopic2"];
        $this->Ectopic2->AdvancedSearch->SearchCondition = @$filter["v_Ectopic2"];
        $this->Ectopic2->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic2"];
        $this->Ectopic2->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic2"];
        $this->Ectopic2->AdvancedSearch->save();

        // Field Type of preg2
        $this->Typeofpreg2->AdvancedSearch->SearchValue = @$filter["x_Typeofpreg2"];
        $this->Typeofpreg2->AdvancedSearch->SearchOperator = @$filter["z_Typeofpreg2"];
        $this->Typeofpreg2->AdvancedSearch->SearchCondition = @$filter["v_Typeofpreg2"];
        $this->Typeofpreg2->AdvancedSearch->SearchValue2 = @$filter["y_Typeofpreg2"];
        $this->Typeofpreg2->AdvancedSearch->SearchOperator2 = @$filter["w_Typeofpreg2"];
        $this->Typeofpreg2->AdvancedSearch->save();

        // Field ANCA
        $this->ANCA->AdvancedSearch->SearchValue = @$filter["x_ANCA"];
        $this->ANCA->AdvancedSearch->SearchOperator = @$filter["z_ANCA"];
        $this->ANCA->AdvancedSearch->SearchCondition = @$filter["v_ANCA"];
        $this->ANCA->AdvancedSearch->SearchValue2 = @$filter["y_ANCA"];
        $this->ANCA->AdvancedSearch->SearchOperator2 = @$filter["w_ANCA"];
        $this->ANCA->AdvancedSearch->save();

        // Field anomalies1
        $this->anomalies1->AdvancedSearch->SearchValue = @$filter["x_anomalies1"];
        $this->anomalies1->AdvancedSearch->SearchOperator = @$filter["z_anomalies1"];
        $this->anomalies1->AdvancedSearch->SearchCondition = @$filter["v_anomalies1"];
        $this->anomalies1->AdvancedSearch->SearchValue2 = @$filter["y_anomalies1"];
        $this->anomalies1->AdvancedSearch->SearchOperator2 = @$filter["w_anomalies1"];
        $this->anomalies1->AdvancedSearch->save();

        // Field baby wt1
        $this->babywt1->AdvancedSearch->SearchValue = @$filter["x_babywt1"];
        $this->babywt1->AdvancedSearch->SearchOperator = @$filter["z_babywt1"];
        $this->babywt1->AdvancedSearch->SearchCondition = @$filter["v_babywt1"];
        $this->babywt1->AdvancedSearch->SearchValue2 = @$filter["y_babywt1"];
        $this->babywt1->AdvancedSearch->SearchOperator2 = @$filter["w_babywt1"];
        $this->babywt1->AdvancedSearch->save();

        // Field GA at delivery2
        $this->GAatdelivery2->AdvancedSearch->SearchValue = @$filter["x_GAatdelivery2"];
        $this->GAatdelivery2->AdvancedSearch->SearchOperator = @$filter["z_GAatdelivery2"];
        $this->GAatdelivery2->AdvancedSearch->SearchCondition = @$filter["v_GAatdelivery2"];
        $this->GAatdelivery2->AdvancedSearch->SearchValue2 = @$filter["y_GAatdelivery2"];
        $this->GAatdelivery2->AdvancedSearch->SearchOperator2 = @$filter["w_GAatdelivery2"];
        $this->GAatdelivery2->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->RIDNO, $default, false); // RIDNO
        $this->buildSearchSql($where, $this->Treatment, $default, false); // Treatment
        $this->buildSearchSql($where, $this->Origin, $default, false); // Origin
        $this->buildSearchSql($where, $this->MaleIndications, $default, false); // MaleIndications
        $this->buildSearchSql($where, $this->FemaleIndications, $default, false); // FemaleIndications
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->PartnerName, $default, false); // PartnerName
        $this->buildSearchSql($where, $this->PartnerID, $default, false); // PartnerID
        $this->buildSearchSql($where, $this->A4ICSICycle, $default, false); // A4ICSICycle
        $this->buildSearchSql($where, $this->TotalICSICycle, $default, false); // TotalICSICycle
        $this->buildSearchSql($where, $this->TypeOfInfertility, $default, false); // TypeOfInfertility
        $this->buildSearchSql($where, $this->RelevantHistory, $default, false); // RelevantHistory
        $this->buildSearchSql($where, $this->IUICycles, $default, false); // IUICycles
        $this->buildSearchSql($where, $this->AMH, $default, false); // AMH
        $this->buildSearchSql($where, $this->FBMI, $default, false); // FBMI
        $this->buildSearchSql($where, $this->ANTAGONISTSTARTDAY, $default, false); // ANTAGONISTSTARTDAY
        $this->buildSearchSql($where, $this->OvarianSurgery, $default, false); // OvarianSurgery
        $this->buildSearchSql($where, $this->OPUDATE, $default, false); // OPUDATE
        $this->buildSearchSql($where, $this->RFSH1, $default, false); // RFSH1
        $this->buildSearchSql($where, $this->RFSH2, $default, false); // RFSH2
        $this->buildSearchSql($where, $this->RFSH3, $default, false); // RFSH3
        $this->buildSearchSql($where, $this->E21, $default, false); // E21
        $this->buildSearchSql($where, $this->Hysteroscopy, $default, false); // Hysteroscopy
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->Fweight, $default, false); // Fweight
        $this->buildSearchSql($where, $this->AntiTPO, $default, false); // AntiTPO
        $this->buildSearchSql($where, $this->AntiTG, $default, false); // AntiTG
        $this->buildSearchSql($where, $this->PatientAge, $default, false); // PatientAge
        $this->buildSearchSql($where, $this->PartnerAge, $default, false); // PartnerAge
        $this->buildSearchSql($where, $this->CYCLES, $default, false); // CYCLES
        $this->buildSearchSql($where, $this->MF, $default, false); // MF
        $this->buildSearchSql($where, $this->CauseOfINFERTILITY, $default, false); // CauseOfINFERTILITY
        $this->buildSearchSql($where, $this->SIS, $default, false); // SIS
        $this->buildSearchSql($where, $this->Scratching, $default, false); // Scratching
        $this->buildSearchSql($where, $this->Cannulation, $default, false); // Cannulation
        $this->buildSearchSql($where, $this->MEPRATE, $default, false); // MEPRATE
        $this->buildSearchSql($where, $this->ROVARY, $default, false); // R.OVARY
        $this->buildSearchSql($where, $this->RAFC, $default, false); // R.AFC
        $this->buildSearchSql($where, $this->LOVARY, $default, false); // L.OVARY
        $this->buildSearchSql($where, $this->LAFC, $default, false); // L.AFC
        $this->buildSearchSql($where, $this->LH1, $default, false); // LH1
        $this->buildSearchSql($where, $this->E2, $default, false); // E2
        $this->buildSearchSql($where, $this->StemCellInstallation, $default, false); // StemCellInstallation
        $this->buildSearchSql($where, $this->DHEAS, $default, false); // DHEAS
        $this->buildSearchSql($where, $this->Mtorr, $default, false); // Mtorr
        $this->buildSearchSql($where, $this->AMH1, $default, false); // AMH1
        $this->buildSearchSql($where, $this->LH, $default, false); // LH
        $this->buildSearchSql($where, $this->BMIMALE, $default, false); // BMI(MALE)
        $this->buildSearchSql($where, $this->MaleMedicalConditions, $default, false); // MaleMedicalConditions
        $this->buildSearchSql($where, $this->MaleExamination, $default, false); // MaleExamination
        $this->buildSearchSql($where, $this->SpermConcentration, $default, false); // SpermConcentration
        $this->buildSearchSql($where, $this->SpermMotilityPNP, $default, false); // SpermMotility(P&NP)
        $this->buildSearchSql($where, $this->SpermMorphology, $default, false); // SpermMorphology
        $this->buildSearchSql($where, $this->SpermRetrival, $default, false); // SpermRetrival
        $this->buildSearchSql($where, $this->MTestosterone, $default, false); // M.Testosterone
        $this->buildSearchSql($where, $this->DFI, $default, false); // DFI
        $this->buildSearchSql($where, $this->PreRX, $default, false); // PreRX
        $this->buildSearchSql($where, $this->CC100, $default, false); // CC 100
        $this->buildSearchSql($where, $this->RFSH1A, $default, false); // RFSH1A
        $this->buildSearchSql($where, $this->HMG1, $default, false); // HMG1
        $this->buildSearchSql($where, $this->RLH, $default, false); // RLH
        $this->buildSearchSql($where, $this->HMG_HP, $default, false); // HMG_HP
        $this->buildSearchSql($where, $this->day_of_HMG, $default, false); // day_of_HMG
        $this->buildSearchSql($where, $this->Reason_for_HMG, $default, false); // Reason_for_HMG
        $this->buildSearchSql($where, $this->RLH_day, $default, false); // RLH_day
        $this->buildSearchSql($where, $this->DAYSOFSTIMULATION, $default, false); // DAYSOFSTIMULATION
        $this->buildSearchSql($where, $this->AnychangeinbetweenDoseaddedday, $default, false); // Any change inbetween ( Dose added , day)
        $this->buildSearchSql($where, $this->dayofAnta, $default, false); // day of Anta
        $this->buildSearchSql($where, $this->RFSHTD, $default, false); // R FSH TD
        $this->buildSearchSql($where, $this->RFSHHMGTD, $default, false); // R FSH + HMG TD
        $this->buildSearchSql($where, $this->RFSHRLHTD, $default, false); // R FSH + R LH TD
        $this->buildSearchSql($where, $this->HMGTD, $default, false); // HMG TD
        $this->buildSearchSql($where, $this->LHTD, $default, false); // LH TD
        $this->buildSearchSql($where, $this->D1LH, $default, false); // D1 LH
        $this->buildSearchSql($where, $this->D1E2, $default, false); // D1 E2
        $this->buildSearchSql($where, $this->TriggerdayE2, $default, false); // Trigger day E2
        $this->buildSearchSql($where, $this->TriggerdayP4, $default, false); // Trigger day P4
        $this->buildSearchSql($where, $this->TriggerdayLH, $default, false); // Trigger day LH
        $this->buildSearchSql($where, $this->VITD, $default, false); // VIT-D
        $this->buildSearchSql($where, $this->TRIGGERR, $default, false); // TRIGGERR
        $this->buildSearchSql($where, $this->BHCGBEFORERETRIEVAL, $default, false); // BHCG BEFORE RETRIEVAL
        $this->buildSearchSql($where, $this->LH12HRS, $default, false); // LH -12 HRS
        $this->buildSearchSql($where, $this->P412HRS, $default, false); // P4 -12 HRS
        $this->buildSearchSql($where, $this->ETonhCGday, $default, false); // ET on hCG day
        $this->buildSearchSql($where, $this->ETdoppler, $default, false); // ET doppler
        $this->buildSearchSql($where, $this->VIFIVFI, $default, false); // VI/FI/VFI
        $this->buildSearchSql($where, $this->Endometrialabnormality, $default, false); // Endometrial abnormality
        $this->buildSearchSql($where, $this->AFCONS1, $default, false); // AFC ON S1
        $this->buildSearchSql($where, $this->TIMEOFOPUFROMTRIGGER, $default, false); // TIME OF OPU FROM TRIGGER
        $this->buildSearchSql($where, $this->SPERMTYPE, $default, false); // SPERM TYPE
        $this->buildSearchSql($where, $this->EXPECTEDONTRIGGERDAY, $default, false); // EXPECTED ON TRIGGER DAY
        $this->buildSearchSql($where, $this->OOCYTESRETRIEVED, $default, false); // OOCYTES RETRIEVED
        $this->buildSearchSql($where, $this->TIMEOFDENUDATION, $default, false); // TIME OF DENUDATION
        $this->buildSearchSql($where, $this->MII, $default, false); // M-II
        $this->buildSearchSql($where, $this->MI, $default, false); // MI
        $this->buildSearchSql($where, $this->GV, $default, false); // GV
        $this->buildSearchSql($where, $this->ICSITIMEFORMOPU, $default, false); // ICSI TIME FORM OPU
        $this->buildSearchSql($where, $this->FERT2PN, $default, false); // FERT ( 2 PN )
        $this->buildSearchSql($where, $this->DEG, $default, false); // DEG
        $this->buildSearchSql($where, $this->D3GRADEA, $default, false); // D3 GRADE A
        $this->buildSearchSql($where, $this->D3GRADEB, $default, false); // D3 GRADE B
        $this->buildSearchSql($where, $this->D3GRADEC, $default, false); // D3 GRADE C
        $this->buildSearchSql($where, $this->D3GRADED, $default, false); // D3 GRADE D
        $this->buildSearchSql($where, $this->USABLEONDAY3ET, $default, false); // USABLE ON DAY 3 ET
        $this->buildSearchSql($where, $this->USABLEONday3FREEZING, $default, false); // USABLE ON day 3 FREEZING
        $this->buildSearchSql($where, $this->D5GARDEA, $default, false); // D5 GARDE A
        $this->buildSearchSql($where, $this->D5GRADEB, $default, false); // D5 GRADE B
        $this->buildSearchSql($where, $this->D5GRADEC, $default, false); // D5 GRADE C
        $this->buildSearchSql($where, $this->D5GRADED, $default, false); // D5 GRADE D
        $this->buildSearchSql($where, $this->USABLEOND5ET, $default, false); // USABLE ON D5 ET
        $this->buildSearchSql($where, $this->USABLEOND5FREEZING, $default, false); // USABLE ON D5 FREEZING
        $this->buildSearchSql($where, $this->D6GRADEA, $default, false); // D6 GRADE A
        $this->buildSearchSql($where, $this->D6GRADEB, $default, false); // D6 GRADE B
        $this->buildSearchSql($where, $this->D6GRADEC, $default, false); // D6 GRADE C
        $this->buildSearchSql($where, $this->D6GRADED, $default, false); // D6 GRADE D
        $this->buildSearchSql($where, $this->D6USABLEEMBRYOET, $default, false); // D6 USABLE EMBRYO ET
        $this->buildSearchSql($where, $this->D6USABLEFREEZING, $default, false); // D6 USABLE FREEZING
        $this->buildSearchSql($where, $this->TOTALBLAST, $default, false); // TOTAL BLAST
        $this->buildSearchSql($where, $this->PGS, $default, false); // PGS
        $this->buildSearchSql($where, $this->REMARKS, $default, false); // REMARKS
        $this->buildSearchSql($where, $this->PUDB, $default, false); // PU - D/B
        $this->buildSearchSql($where, $this->ICSIDB, $default, false); // ICSI D/B
        $this->buildSearchSql($where, $this->VITDB, $default, false); // VIT D/B
        $this->buildSearchSql($where, $this->ETDB, $default, false); // ET D/B
        $this->buildSearchSql($where, $this->LABCOMMENTS, $default, false); // LAB COMMENTS
        $this->buildSearchSql($where, $this->ReasonfornoFRESHtransfer, $default, false); // Reason for no FRESH transfer
        $this->buildSearchSql($where, $this->NoofembryostransferredDay35ABC, $default, false); // No of embryos transferred Day 3/5, A,B,C
        $this->buildSearchSql($where, $this->EMBRYOSPENDING, $default, false); // EMBRYOS PENDING
        $this->buildSearchSql($where, $this->DAYOFTRANSFER, $default, false); // DAY OF TRANSFER
        $this->buildSearchSql($where, $this->HDsperm, $default, false); // H/D sperm
        $this->buildSearchSql($where, $this->Comments, $default, false); // Comments
        $this->buildSearchSql($where, $this->scprogesterone, $default, false); // sc progesterone
        $this->buildSearchSql($where, $this->Naturalmicronised400mgbdduphaston10mgbd, $default, false); // Natural micronised 400mg bd + duphaston 10mg bd
        $this->buildSearchSql($where, $this->CRINONE, $default, false); // CRINONE
        $this->buildSearchSql($where, $this->progynova, $default, false); // progynova
        $this->buildSearchSql($where, $this->Heparin, $default, false); // Heparin
        $this->buildSearchSql($where, $this->cabergolin, $default, false); // cabergolin
        $this->buildSearchSql($where, $this->Antagonist, $default, false); // Antagonist
        $this->buildSearchSql($where, $this->OHSS, $default, false); // OHSS
        $this->buildSearchSql($where, $this->Complications, $default, false); // Complications
        $this->buildSearchSql($where, $this->LPbleeding, $default, false); // LP bleeding
        $this->buildSearchSql($where, $this->hCG, $default, false); // ß-hCG
        $this->buildSearchSql($where, $this->Implantationrate, $default, false); // Implantation rate
        $this->buildSearchSql($where, $this->Ectopic, $default, false); // Ectopic
        $this->buildSearchSql($where, $this->Typeofpreg, $default, false); // Type of preg
        $this->buildSearchSql($where, $this->ANC, $default, false); // ANC
        $this->buildSearchSql($where, $this->anomalies, $default, false); // anomalies
        $this->buildSearchSql($where, $this->babywt, $default, false); // baby wt
        $this->buildSearchSql($where, $this->GAatdelivery, $default, false); // GA at delivery
        $this->buildSearchSql($where, $this->Pregnancyoutcome, $default, false); // Pregnancy outcome
        $this->buildSearchSql($where, $this->_1stFET, $default, false); // 1st FET
        $this->buildSearchSql($where, $this->AFTERHYSTEROSCOPY, $default, false); // AFTER HYSTEROSCOPY
        $this->buildSearchSql($where, $this->AFTERERA, $default, false); // AFTER ERA
        $this->buildSearchSql($where, $this->ERA, $default, false); // ERA
        $this->buildSearchSql($where, $this->HRT, $default, false); // HRT
        $this->buildSearchSql($where, $this->XGRASTPRP, $default, false); // XGRAST/PRP
        $this->buildSearchSql($where, $this->EMBRYODETAILSDAY35ABC, $default, false); // EMBRYO DETAILS DAY 3/ 5, A, B, C
        $this->buildSearchSql($where, $this->LMWH40MG, $default, false); // LMWH 40MG
        $this->buildSearchSql($where, $this->hCG2, $default, false); // ß-hCG2
        $this->buildSearchSql($where, $this->Implantationrate1, $default, false); // Implantation rate1
        $this->buildSearchSql($where, $this->Ectopic1, $default, false); // Ectopic1
        $this->buildSearchSql($where, $this->TypeofpregA, $default, false); // Type of pregA
        $this->buildSearchSql($where, $this->ANC1, $default, false); // ANC1
        $this->buildSearchSql($where, $this->anomalies2, $default, false); // anomalies2
        $this->buildSearchSql($where, $this->babywt2, $default, false); // baby wt2
        $this->buildSearchSql($where, $this->GAatdelivery1, $default, false); // GA at delivery1
        $this->buildSearchSql($where, $this->Pregnancyoutcome1, $default, false); // Pregnancy outcome1
        $this->buildSearchSql($where, $this->_2NDFET, $default, false); // 2ND FET
        $this->buildSearchSql($where, $this->AFTERHYSTEROSCOPY1, $default, false); // AFTER HYSTEROSCOPY1
        $this->buildSearchSql($where, $this->AFTERERA1, $default, false); // AFTER ERA1
        $this->buildSearchSql($where, $this->ERA1, $default, false); // ERA1
        $this->buildSearchSql($where, $this->HRT1, $default, false); // HRT1
        $this->buildSearchSql($where, $this->XGRASTPRP1, $default, false); // XGRAST/PRP1
        $this->buildSearchSql($where, $this->NUMBEROFEMBRYOS, $default, false); // NUMBER OF EMBRYOS
        $this->buildSearchSql($where, $this->EMBRYODETAILSDAY356ABC, $default, false); // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        $this->buildSearchSql($where, $this->INTRALIPIDANDBARGLOBIN, $default, false); // INTRALIPID AND BARGLOBIN
        $this->buildSearchSql($where, $this->LMWH40MG1, $default, false); // LMWH 40MG1
        $this->buildSearchSql($where, $this->hCG1, $default, false); // ß-hCG1
        $this->buildSearchSql($where, $this->Implantationrate2, $default, false); // Implantation rate2
        $this->buildSearchSql($where, $this->Ectopic2, $default, false); // Ectopic2
        $this->buildSearchSql($where, $this->Typeofpreg2, $default, false); // Type of preg2
        $this->buildSearchSql($where, $this->ANCA, $default, false); // ANCA
        $this->buildSearchSql($where, $this->anomalies1, $default, false); // anomalies1
        $this->buildSearchSql($where, $this->babywt1, $default, false); // baby wt1
        $this->buildSearchSql($where, $this->GAatdelivery2, $default, false); // GA at delivery2

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->RIDNO->AdvancedSearch->save(); // RIDNO
            $this->Treatment->AdvancedSearch->save(); // Treatment
            $this->Origin->AdvancedSearch->save(); // Origin
            $this->MaleIndications->AdvancedSearch->save(); // MaleIndications
            $this->FemaleIndications->AdvancedSearch->save(); // FemaleIndications
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->PartnerName->AdvancedSearch->save(); // PartnerName
            $this->PartnerID->AdvancedSearch->save(); // PartnerID
            $this->A4ICSICycle->AdvancedSearch->save(); // A4ICSICycle
            $this->TotalICSICycle->AdvancedSearch->save(); // TotalICSICycle
            $this->TypeOfInfertility->AdvancedSearch->save(); // TypeOfInfertility
            $this->RelevantHistory->AdvancedSearch->save(); // RelevantHistory
            $this->IUICycles->AdvancedSearch->save(); // IUICycles
            $this->AMH->AdvancedSearch->save(); // AMH
            $this->FBMI->AdvancedSearch->save(); // FBMI
            $this->ANTAGONISTSTARTDAY->AdvancedSearch->save(); // ANTAGONISTSTARTDAY
            $this->OvarianSurgery->AdvancedSearch->save(); // OvarianSurgery
            $this->OPUDATE->AdvancedSearch->save(); // OPUDATE
            $this->RFSH1->AdvancedSearch->save(); // RFSH1
            $this->RFSH2->AdvancedSearch->save(); // RFSH2
            $this->RFSH3->AdvancedSearch->save(); // RFSH3
            $this->E21->AdvancedSearch->save(); // E21
            $this->Hysteroscopy->AdvancedSearch->save(); // Hysteroscopy
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->Fweight->AdvancedSearch->save(); // Fweight
            $this->AntiTPO->AdvancedSearch->save(); // AntiTPO
            $this->AntiTG->AdvancedSearch->save(); // AntiTG
            $this->PatientAge->AdvancedSearch->save(); // PatientAge
            $this->PartnerAge->AdvancedSearch->save(); // PartnerAge
            $this->CYCLES->AdvancedSearch->save(); // CYCLES
            $this->MF->AdvancedSearch->save(); // MF
            $this->CauseOfINFERTILITY->AdvancedSearch->save(); // CauseOfINFERTILITY
            $this->SIS->AdvancedSearch->save(); // SIS
            $this->Scratching->AdvancedSearch->save(); // Scratching
            $this->Cannulation->AdvancedSearch->save(); // Cannulation
            $this->MEPRATE->AdvancedSearch->save(); // MEPRATE
            $this->ROVARY->AdvancedSearch->save(); // R.OVARY
            $this->RAFC->AdvancedSearch->save(); // R.AFC
            $this->LOVARY->AdvancedSearch->save(); // L.OVARY
            $this->LAFC->AdvancedSearch->save(); // L.AFC
            $this->LH1->AdvancedSearch->save(); // LH1
            $this->E2->AdvancedSearch->save(); // E2
            $this->StemCellInstallation->AdvancedSearch->save(); // StemCellInstallation
            $this->DHEAS->AdvancedSearch->save(); // DHEAS
            $this->Mtorr->AdvancedSearch->save(); // Mtorr
            $this->AMH1->AdvancedSearch->save(); // AMH1
            $this->LH->AdvancedSearch->save(); // LH
            $this->BMIMALE->AdvancedSearch->save(); // BMI(MALE)
            $this->MaleMedicalConditions->AdvancedSearch->save(); // MaleMedicalConditions
            $this->MaleExamination->AdvancedSearch->save(); // MaleExamination
            $this->SpermConcentration->AdvancedSearch->save(); // SpermConcentration
            $this->SpermMotilityPNP->AdvancedSearch->save(); // SpermMotility(P&NP)
            $this->SpermMorphology->AdvancedSearch->save(); // SpermMorphology
            $this->SpermRetrival->AdvancedSearch->save(); // SpermRetrival
            $this->MTestosterone->AdvancedSearch->save(); // M.Testosterone
            $this->DFI->AdvancedSearch->save(); // DFI
            $this->PreRX->AdvancedSearch->save(); // PreRX
            $this->CC100->AdvancedSearch->save(); // CC 100
            $this->RFSH1A->AdvancedSearch->save(); // RFSH1A
            $this->HMG1->AdvancedSearch->save(); // HMG1
            $this->RLH->AdvancedSearch->save(); // RLH
            $this->HMG_HP->AdvancedSearch->save(); // HMG_HP
            $this->day_of_HMG->AdvancedSearch->save(); // day_of_HMG
            $this->Reason_for_HMG->AdvancedSearch->save(); // Reason_for_HMG
            $this->RLH_day->AdvancedSearch->save(); // RLH_day
            $this->DAYSOFSTIMULATION->AdvancedSearch->save(); // DAYSOFSTIMULATION
            $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->save(); // Any change inbetween ( Dose added , day)
            $this->dayofAnta->AdvancedSearch->save(); // day of Anta
            $this->RFSHTD->AdvancedSearch->save(); // R FSH TD
            $this->RFSHHMGTD->AdvancedSearch->save(); // R FSH + HMG TD
            $this->RFSHRLHTD->AdvancedSearch->save(); // R FSH + R LH TD
            $this->HMGTD->AdvancedSearch->save(); // HMG TD
            $this->LHTD->AdvancedSearch->save(); // LH TD
            $this->D1LH->AdvancedSearch->save(); // D1 LH
            $this->D1E2->AdvancedSearch->save(); // D1 E2
            $this->TriggerdayE2->AdvancedSearch->save(); // Trigger day E2
            $this->TriggerdayP4->AdvancedSearch->save(); // Trigger day P4
            $this->TriggerdayLH->AdvancedSearch->save(); // Trigger day LH
            $this->VITD->AdvancedSearch->save(); // VIT-D
            $this->TRIGGERR->AdvancedSearch->save(); // TRIGGERR
            $this->BHCGBEFORERETRIEVAL->AdvancedSearch->save(); // BHCG BEFORE RETRIEVAL
            $this->LH12HRS->AdvancedSearch->save(); // LH -12 HRS
            $this->P412HRS->AdvancedSearch->save(); // P4 -12 HRS
            $this->ETonhCGday->AdvancedSearch->save(); // ET on hCG day
            $this->ETdoppler->AdvancedSearch->save(); // ET doppler
            $this->VIFIVFI->AdvancedSearch->save(); // VI/FI/VFI
            $this->Endometrialabnormality->AdvancedSearch->save(); // Endometrial abnormality
            $this->AFCONS1->AdvancedSearch->save(); // AFC ON S1
            $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->save(); // TIME OF OPU FROM TRIGGER
            $this->SPERMTYPE->AdvancedSearch->save(); // SPERM TYPE
            $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->save(); // EXPECTED ON TRIGGER DAY
            $this->OOCYTESRETRIEVED->AdvancedSearch->save(); // OOCYTES RETRIEVED
            $this->TIMEOFDENUDATION->AdvancedSearch->save(); // TIME OF DENUDATION
            $this->MII->AdvancedSearch->save(); // M-II
            $this->MI->AdvancedSearch->save(); // MI
            $this->GV->AdvancedSearch->save(); // GV
            $this->ICSITIMEFORMOPU->AdvancedSearch->save(); // ICSI TIME FORM OPU
            $this->FERT2PN->AdvancedSearch->save(); // FERT ( 2 PN )
            $this->DEG->AdvancedSearch->save(); // DEG
            $this->D3GRADEA->AdvancedSearch->save(); // D3 GRADE A
            $this->D3GRADEB->AdvancedSearch->save(); // D3 GRADE B
            $this->D3GRADEC->AdvancedSearch->save(); // D3 GRADE C
            $this->D3GRADED->AdvancedSearch->save(); // D3 GRADE D
            $this->USABLEONDAY3ET->AdvancedSearch->save(); // USABLE ON DAY 3 ET
            $this->USABLEONday3FREEZING->AdvancedSearch->save(); // USABLE ON day 3 FREEZING
            $this->D5GARDEA->AdvancedSearch->save(); // D5 GARDE A
            $this->D5GRADEB->AdvancedSearch->save(); // D5 GRADE B
            $this->D5GRADEC->AdvancedSearch->save(); // D5 GRADE C
            $this->D5GRADED->AdvancedSearch->save(); // D5 GRADE D
            $this->USABLEOND5ET->AdvancedSearch->save(); // USABLE ON D5 ET
            $this->USABLEOND5FREEZING->AdvancedSearch->save(); // USABLE ON D5 FREEZING
            $this->D6GRADEA->AdvancedSearch->save(); // D6 GRADE A
            $this->D6GRADEB->AdvancedSearch->save(); // D6 GRADE B
            $this->D6GRADEC->AdvancedSearch->save(); // D6 GRADE C
            $this->D6GRADED->AdvancedSearch->save(); // D6 GRADE D
            $this->D6USABLEEMBRYOET->AdvancedSearch->save(); // D6 USABLE EMBRYO ET
            $this->D6USABLEFREEZING->AdvancedSearch->save(); // D6 USABLE FREEZING
            $this->TOTALBLAST->AdvancedSearch->save(); // TOTAL BLAST
            $this->PGS->AdvancedSearch->save(); // PGS
            $this->REMARKS->AdvancedSearch->save(); // REMARKS
            $this->PUDB->AdvancedSearch->save(); // PU - D/B
            $this->ICSIDB->AdvancedSearch->save(); // ICSI D/B
            $this->VITDB->AdvancedSearch->save(); // VIT D/B
            $this->ETDB->AdvancedSearch->save(); // ET D/B
            $this->LABCOMMENTS->AdvancedSearch->save(); // LAB COMMENTS
            $this->ReasonfornoFRESHtransfer->AdvancedSearch->save(); // Reason for no FRESH transfer
            $this->NoofembryostransferredDay35ABC->AdvancedSearch->save(); // No of embryos transferred Day 3/5, A,B,C
            $this->EMBRYOSPENDING->AdvancedSearch->save(); // EMBRYOS PENDING
            $this->DAYOFTRANSFER->AdvancedSearch->save(); // DAY OF TRANSFER
            $this->HDsperm->AdvancedSearch->save(); // H/D sperm
            $this->Comments->AdvancedSearch->save(); // Comments
            $this->scprogesterone->AdvancedSearch->save(); // sc progesterone
            $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->save(); // Natural micronised 400mg bd + duphaston 10mg bd
            $this->CRINONE->AdvancedSearch->save(); // CRINONE
            $this->progynova->AdvancedSearch->save(); // progynova
            $this->Heparin->AdvancedSearch->save(); // Heparin
            $this->cabergolin->AdvancedSearch->save(); // cabergolin
            $this->Antagonist->AdvancedSearch->save(); // Antagonist
            $this->OHSS->AdvancedSearch->save(); // OHSS
            $this->Complications->AdvancedSearch->save(); // Complications
            $this->LPbleeding->AdvancedSearch->save(); // LP bleeding
            $this->hCG->AdvancedSearch->save(); // ß-hCG
            $this->Implantationrate->AdvancedSearch->save(); // Implantation rate
            $this->Ectopic->AdvancedSearch->save(); // Ectopic
            $this->Typeofpreg->AdvancedSearch->save(); // Type of preg
            $this->ANC->AdvancedSearch->save(); // ANC
            $this->anomalies->AdvancedSearch->save(); // anomalies
            $this->babywt->AdvancedSearch->save(); // baby wt
            $this->GAatdelivery->AdvancedSearch->save(); // GA at delivery
            $this->Pregnancyoutcome->AdvancedSearch->save(); // Pregnancy outcome
            $this->_1stFET->AdvancedSearch->save(); // 1st FET
            $this->AFTERHYSTEROSCOPY->AdvancedSearch->save(); // AFTER HYSTEROSCOPY
            $this->AFTERERA->AdvancedSearch->save(); // AFTER ERA
            $this->ERA->AdvancedSearch->save(); // ERA
            $this->HRT->AdvancedSearch->save(); // HRT
            $this->XGRASTPRP->AdvancedSearch->save(); // XGRAST/PRP
            $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->save(); // EMBRYO DETAILS DAY 3/ 5, A, B, C
            $this->LMWH40MG->AdvancedSearch->save(); // LMWH 40MG
            $this->hCG2->AdvancedSearch->save(); // ß-hCG2
            $this->Implantationrate1->AdvancedSearch->save(); // Implantation rate1
            $this->Ectopic1->AdvancedSearch->save(); // Ectopic1
            $this->TypeofpregA->AdvancedSearch->save(); // Type of pregA
            $this->ANC1->AdvancedSearch->save(); // ANC1
            $this->anomalies2->AdvancedSearch->save(); // anomalies2
            $this->babywt2->AdvancedSearch->save(); // baby wt2
            $this->GAatdelivery1->AdvancedSearch->save(); // GA at delivery1
            $this->Pregnancyoutcome1->AdvancedSearch->save(); // Pregnancy outcome1
            $this->_2NDFET->AdvancedSearch->save(); // 2ND FET
            $this->AFTERHYSTEROSCOPY1->AdvancedSearch->save(); // AFTER HYSTEROSCOPY1
            $this->AFTERERA1->AdvancedSearch->save(); // AFTER ERA1
            $this->ERA1->AdvancedSearch->save(); // ERA1
            $this->HRT1->AdvancedSearch->save(); // HRT1
            $this->XGRASTPRP1->AdvancedSearch->save(); // XGRAST/PRP1
            $this->NUMBEROFEMBRYOS->AdvancedSearch->save(); // NUMBER OF EMBRYOS
            $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->save(); // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
            $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->save(); // INTRALIPID AND BARGLOBIN
            $this->LMWH40MG1->AdvancedSearch->save(); // LMWH 40MG1
            $this->hCG1->AdvancedSearch->save(); // ß-hCG1
            $this->Implantationrate2->AdvancedSearch->save(); // Implantation rate2
            $this->Ectopic2->AdvancedSearch->save(); // Ectopic2
            $this->Typeofpreg2->AdvancedSearch->save(); // Type of preg2
            $this->ANCA->AdvancedSearch->save(); // ANCA
            $this->anomalies1->AdvancedSearch->save(); // anomalies1
            $this->babywt1->AdvancedSearch->save(); // baby wt1
            $this->GAatdelivery2->AdvancedSearch->save(); // GA at delivery2
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
        $this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Origin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaleIndications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FemaleIndications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->A4ICSICycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalICSICycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeOfInfertility, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RelevantHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUICycles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AMH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FBMI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANTAGONISTSTARTDAY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OvarianSurgery, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSH1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSH2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSH3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->E21, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Hysteroscopy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fweight, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AntiTPO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AntiTG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientAge, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerAge, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CYCLES, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CauseOfINFERTILITY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SIS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Scratching, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Cannulation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MEPRATE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ROVARY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RAFC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LOVARY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LAFC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LH1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->E2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->StemCellInstallation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DHEAS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mtorr, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AMH1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BMIMALE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaleMedicalConditions, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaleExamination, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermConcentration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermMotilityPNP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermMorphology, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermRetrival, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MTestosterone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DFI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PreRX, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CC100, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSH1A, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HMG1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RLH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HMG_HP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->day_of_HMG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Reason_for_HMG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RLH_day, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DAYSOFSTIMULATION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AnychangeinbetweenDoseaddedday, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->dayofAnta, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSHTD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSHHMGTD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RFSHRLHTD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HMGTD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LHTD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D1LH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D1E2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TriggerdayE2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TriggerdayP4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TriggerdayLH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VITD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TRIGGERR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BHCGBEFORERETRIEVAL, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LH12HRS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->P412HRS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETonhCGday, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETdoppler, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VIFIVFI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Endometrialabnormality, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AFCONS1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIMEOFOPUFROMTRIGGER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPERMTYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EXPECTEDONTRIGGERDAY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OOCYTESRETRIEVED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIMEOFDENUDATION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MII, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GV, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ICSITIMEFORMOPU, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FERT2PN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DEG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D3GRADEA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D3GRADEB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D3GRADEC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D3GRADED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->USABLEONDAY3ET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->USABLEONday3FREEZING, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D5GARDEA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D5GRADEB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D5GRADEC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D5GRADED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->USABLEOND5ET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->USABLEOND5FREEZING, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D6GRADEA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D6GRADEB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D6GRADEC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D6GRADED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D6USABLEEMBRYOET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->D6USABLEFREEZING, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TOTALBLAST, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PGS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->REMARKS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PUDB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ICSIDB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VITDB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETDB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LABCOMMENTS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReasonfornoFRESHtransfer, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoofembryostransferredDay35ABC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EMBRYOSPENDING, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DAYOFTRANSFER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HDsperm, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->scprogesterone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Naturalmicronised400mgbdduphaston10mgbd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CRINONE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->progynova, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Heparin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->cabergolin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Antagonist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OHSS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Complications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LPbleeding, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->hCG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Implantationrate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Typeofpreg, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->anomalies, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->babywt, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GAatdelivery, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pregnancyoutcome, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_1stFET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AFTERHYSTEROSCOPY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AFTERERA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ERA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HRT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->XGRASTPRP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EMBRYODETAILSDAY35ABC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LMWH40MG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->hCG2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Implantationrate1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Ectopic1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeofpregA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANC1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->anomalies2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->babywt2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GAatdelivery1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pregnancyoutcome1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_2NDFET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AFTERHYSTEROSCOPY1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AFTERERA1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ERA1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HRT1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->XGRASTPRP1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NUMBEROFEMBRYOS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EMBRYODETAILSDAY356ABC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->INTRALIPIDANDBARGLOBIN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LMWH40MG1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->hCG1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Implantationrate2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Ectopic2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Typeofpreg2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANCA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->anomalies1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->babywt1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GAatdelivery2, $arKeywords, $type);
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
        if ($this->RIDNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Treatment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Origin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MaleIndications->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FemaleIndications->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->A4ICSICycle->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TotalICSICycle->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TypeOfInfertility->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RelevantHistory->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IUICycles->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AMH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FBMI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANTAGONISTSTARTDAY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OvarianSurgery->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OPUDATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSH1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSH2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSH3->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->E21->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Hysteroscopy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Fweight->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AntiTPO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AntiTG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientAge->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerAge->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CYCLES->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MF->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CauseOfINFERTILITY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SIS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Scratching->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Cannulation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MEPRATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ROVARY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RAFC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LOVARY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LAFC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LH1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->E2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->StemCellInstallation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DHEAS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Mtorr->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AMH1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BMIMALE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MaleMedicalConditions->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MaleExamination->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SpermConcentration->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SpermMotilityPNP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SpermMorphology->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SpermRetrival->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MTestosterone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DFI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PreRX->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CC100->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSH1A->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HMG1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RLH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HMG_HP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->day_of_HMG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Reason_for_HMG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RLH_day->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DAYSOFSTIMULATION->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AnychangeinbetweenDoseaddedday->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->dayofAnta->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSHTD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSHHMGTD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RFSHRLHTD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HMGTD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LHTD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D1LH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D1E2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TriggerdayE2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TriggerdayP4->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TriggerdayLH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->VITD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TRIGGERR->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BHCGBEFORERETRIEVAL->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LH12HRS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->P412HRS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ETonhCGday->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ETdoppler->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->VIFIVFI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Endometrialabnormality->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AFCONS1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SPERMTYPE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EXPECTEDONTRIGGERDAY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OOCYTESRETRIEVED->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TIMEOFDENUDATION->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MII->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GV->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ICSITIMEFORMOPU->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FERT2PN->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DEG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D3GRADEA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D3GRADEB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D3GRADEC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D3GRADED->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->USABLEONDAY3ET->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->USABLEONday3FREEZING->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D5GARDEA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D5GRADEB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D5GRADEC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D5GRADED->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->USABLEOND5ET->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->USABLEOND5FREEZING->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D6GRADEA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D6GRADEB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D6GRADEC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D6GRADED->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D6USABLEEMBRYOET->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->D6USABLEFREEZING->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TOTALBLAST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PGS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->REMARKS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PUDB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ICSIDB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->VITDB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ETDB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LABCOMMENTS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReasonfornoFRESHtransfer->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NoofembryostransferredDay35ABC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EMBRYOSPENDING->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DAYOFTRANSFER->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HDsperm->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Comments->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->scprogesterone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CRINONE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->progynova->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Heparin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->cabergolin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Antagonist->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OHSS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Complications->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LPbleeding->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->hCG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Implantationrate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Ectopic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Typeofpreg->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->anomalies->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->babywt->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GAatdelivery->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Pregnancyoutcome->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->_1stFET->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AFTERHYSTEROSCOPY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AFTERERA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ERA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HRT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->XGRASTPRP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EMBRYODETAILSDAY35ABC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LMWH40MG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->hCG2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Implantationrate1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Ectopic1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TypeofpregA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANC1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->anomalies2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->babywt2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GAatdelivery1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Pregnancyoutcome1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->_2NDFET->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AFTERHYSTEROSCOPY1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AFTERERA1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ERA1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HRT1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->XGRASTPRP1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NUMBEROFEMBRYOS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EMBRYODETAILSDAY356ABC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LMWH40MG1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->hCG1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Implantationrate2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Ectopic2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Typeofpreg2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANCA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->anomalies1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->babywt1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GAatdelivery2->AdvancedSearch->issetSession()) {
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
                $this->RIDNO->AdvancedSearch->unsetSession();
                $this->Treatment->AdvancedSearch->unsetSession();
                $this->Origin->AdvancedSearch->unsetSession();
                $this->MaleIndications->AdvancedSearch->unsetSession();
                $this->FemaleIndications->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->PartnerName->AdvancedSearch->unsetSession();
                $this->PartnerID->AdvancedSearch->unsetSession();
                $this->A4ICSICycle->AdvancedSearch->unsetSession();
                $this->TotalICSICycle->AdvancedSearch->unsetSession();
                $this->TypeOfInfertility->AdvancedSearch->unsetSession();
                $this->RelevantHistory->AdvancedSearch->unsetSession();
                $this->IUICycles->AdvancedSearch->unsetSession();
                $this->AMH->AdvancedSearch->unsetSession();
                $this->FBMI->AdvancedSearch->unsetSession();
                $this->ANTAGONISTSTARTDAY->AdvancedSearch->unsetSession();
                $this->OvarianSurgery->AdvancedSearch->unsetSession();
                $this->OPUDATE->AdvancedSearch->unsetSession();
                $this->RFSH1->AdvancedSearch->unsetSession();
                $this->RFSH2->AdvancedSearch->unsetSession();
                $this->RFSH3->AdvancedSearch->unsetSession();
                $this->E21->AdvancedSearch->unsetSession();
                $this->Hysteroscopy->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->Fweight->AdvancedSearch->unsetSession();
                $this->AntiTPO->AdvancedSearch->unsetSession();
                $this->AntiTG->AdvancedSearch->unsetSession();
                $this->PatientAge->AdvancedSearch->unsetSession();
                $this->PartnerAge->AdvancedSearch->unsetSession();
                $this->CYCLES->AdvancedSearch->unsetSession();
                $this->MF->AdvancedSearch->unsetSession();
                $this->CauseOfINFERTILITY->AdvancedSearch->unsetSession();
                $this->SIS->AdvancedSearch->unsetSession();
                $this->Scratching->AdvancedSearch->unsetSession();
                $this->Cannulation->AdvancedSearch->unsetSession();
                $this->MEPRATE->AdvancedSearch->unsetSession();
                $this->ROVARY->AdvancedSearch->unsetSession();
                $this->RAFC->AdvancedSearch->unsetSession();
                $this->LOVARY->AdvancedSearch->unsetSession();
                $this->LAFC->AdvancedSearch->unsetSession();
                $this->LH1->AdvancedSearch->unsetSession();
                $this->E2->AdvancedSearch->unsetSession();
                $this->StemCellInstallation->AdvancedSearch->unsetSession();
                $this->DHEAS->AdvancedSearch->unsetSession();
                $this->Mtorr->AdvancedSearch->unsetSession();
                $this->AMH1->AdvancedSearch->unsetSession();
                $this->LH->AdvancedSearch->unsetSession();
                $this->BMIMALE->AdvancedSearch->unsetSession();
                $this->MaleMedicalConditions->AdvancedSearch->unsetSession();
                $this->MaleExamination->AdvancedSearch->unsetSession();
                $this->SpermConcentration->AdvancedSearch->unsetSession();
                $this->SpermMotilityPNP->AdvancedSearch->unsetSession();
                $this->SpermMorphology->AdvancedSearch->unsetSession();
                $this->SpermRetrival->AdvancedSearch->unsetSession();
                $this->MTestosterone->AdvancedSearch->unsetSession();
                $this->DFI->AdvancedSearch->unsetSession();
                $this->PreRX->AdvancedSearch->unsetSession();
                $this->CC100->AdvancedSearch->unsetSession();
                $this->RFSH1A->AdvancedSearch->unsetSession();
                $this->HMG1->AdvancedSearch->unsetSession();
                $this->RLH->AdvancedSearch->unsetSession();
                $this->HMG_HP->AdvancedSearch->unsetSession();
                $this->day_of_HMG->AdvancedSearch->unsetSession();
                $this->Reason_for_HMG->AdvancedSearch->unsetSession();
                $this->RLH_day->AdvancedSearch->unsetSession();
                $this->DAYSOFSTIMULATION->AdvancedSearch->unsetSession();
                $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->unsetSession();
                $this->dayofAnta->AdvancedSearch->unsetSession();
                $this->RFSHTD->AdvancedSearch->unsetSession();
                $this->RFSHHMGTD->AdvancedSearch->unsetSession();
                $this->RFSHRLHTD->AdvancedSearch->unsetSession();
                $this->HMGTD->AdvancedSearch->unsetSession();
                $this->LHTD->AdvancedSearch->unsetSession();
                $this->D1LH->AdvancedSearch->unsetSession();
                $this->D1E2->AdvancedSearch->unsetSession();
                $this->TriggerdayE2->AdvancedSearch->unsetSession();
                $this->TriggerdayP4->AdvancedSearch->unsetSession();
                $this->TriggerdayLH->AdvancedSearch->unsetSession();
                $this->VITD->AdvancedSearch->unsetSession();
                $this->TRIGGERR->AdvancedSearch->unsetSession();
                $this->BHCGBEFORERETRIEVAL->AdvancedSearch->unsetSession();
                $this->LH12HRS->AdvancedSearch->unsetSession();
                $this->P412HRS->AdvancedSearch->unsetSession();
                $this->ETonhCGday->AdvancedSearch->unsetSession();
                $this->ETdoppler->AdvancedSearch->unsetSession();
                $this->VIFIVFI->AdvancedSearch->unsetSession();
                $this->Endometrialabnormality->AdvancedSearch->unsetSession();
                $this->AFCONS1->AdvancedSearch->unsetSession();
                $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->unsetSession();
                $this->SPERMTYPE->AdvancedSearch->unsetSession();
                $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->unsetSession();
                $this->OOCYTESRETRIEVED->AdvancedSearch->unsetSession();
                $this->TIMEOFDENUDATION->AdvancedSearch->unsetSession();
                $this->MII->AdvancedSearch->unsetSession();
                $this->MI->AdvancedSearch->unsetSession();
                $this->GV->AdvancedSearch->unsetSession();
                $this->ICSITIMEFORMOPU->AdvancedSearch->unsetSession();
                $this->FERT2PN->AdvancedSearch->unsetSession();
                $this->DEG->AdvancedSearch->unsetSession();
                $this->D3GRADEA->AdvancedSearch->unsetSession();
                $this->D3GRADEB->AdvancedSearch->unsetSession();
                $this->D3GRADEC->AdvancedSearch->unsetSession();
                $this->D3GRADED->AdvancedSearch->unsetSession();
                $this->USABLEONDAY3ET->AdvancedSearch->unsetSession();
                $this->USABLEONday3FREEZING->AdvancedSearch->unsetSession();
                $this->D5GARDEA->AdvancedSearch->unsetSession();
                $this->D5GRADEB->AdvancedSearch->unsetSession();
                $this->D5GRADEC->AdvancedSearch->unsetSession();
                $this->D5GRADED->AdvancedSearch->unsetSession();
                $this->USABLEOND5ET->AdvancedSearch->unsetSession();
                $this->USABLEOND5FREEZING->AdvancedSearch->unsetSession();
                $this->D6GRADEA->AdvancedSearch->unsetSession();
                $this->D6GRADEB->AdvancedSearch->unsetSession();
                $this->D6GRADEC->AdvancedSearch->unsetSession();
                $this->D6GRADED->AdvancedSearch->unsetSession();
                $this->D6USABLEEMBRYOET->AdvancedSearch->unsetSession();
                $this->D6USABLEFREEZING->AdvancedSearch->unsetSession();
                $this->TOTALBLAST->AdvancedSearch->unsetSession();
                $this->PGS->AdvancedSearch->unsetSession();
                $this->REMARKS->AdvancedSearch->unsetSession();
                $this->PUDB->AdvancedSearch->unsetSession();
                $this->ICSIDB->AdvancedSearch->unsetSession();
                $this->VITDB->AdvancedSearch->unsetSession();
                $this->ETDB->AdvancedSearch->unsetSession();
                $this->LABCOMMENTS->AdvancedSearch->unsetSession();
                $this->ReasonfornoFRESHtransfer->AdvancedSearch->unsetSession();
                $this->NoofembryostransferredDay35ABC->AdvancedSearch->unsetSession();
                $this->EMBRYOSPENDING->AdvancedSearch->unsetSession();
                $this->DAYOFTRANSFER->AdvancedSearch->unsetSession();
                $this->HDsperm->AdvancedSearch->unsetSession();
                $this->Comments->AdvancedSearch->unsetSession();
                $this->scprogesterone->AdvancedSearch->unsetSession();
                $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->unsetSession();
                $this->CRINONE->AdvancedSearch->unsetSession();
                $this->progynova->AdvancedSearch->unsetSession();
                $this->Heparin->AdvancedSearch->unsetSession();
                $this->cabergolin->AdvancedSearch->unsetSession();
                $this->Antagonist->AdvancedSearch->unsetSession();
                $this->OHSS->AdvancedSearch->unsetSession();
                $this->Complications->AdvancedSearch->unsetSession();
                $this->LPbleeding->AdvancedSearch->unsetSession();
                $this->hCG->AdvancedSearch->unsetSession();
                $this->Implantationrate->AdvancedSearch->unsetSession();
                $this->Ectopic->AdvancedSearch->unsetSession();
                $this->Typeofpreg->AdvancedSearch->unsetSession();
                $this->ANC->AdvancedSearch->unsetSession();
                $this->anomalies->AdvancedSearch->unsetSession();
                $this->babywt->AdvancedSearch->unsetSession();
                $this->GAatdelivery->AdvancedSearch->unsetSession();
                $this->Pregnancyoutcome->AdvancedSearch->unsetSession();
                $this->_1stFET->AdvancedSearch->unsetSession();
                $this->AFTERHYSTEROSCOPY->AdvancedSearch->unsetSession();
                $this->AFTERERA->AdvancedSearch->unsetSession();
                $this->ERA->AdvancedSearch->unsetSession();
                $this->HRT->AdvancedSearch->unsetSession();
                $this->XGRASTPRP->AdvancedSearch->unsetSession();
                $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->unsetSession();
                $this->LMWH40MG->AdvancedSearch->unsetSession();
                $this->hCG2->AdvancedSearch->unsetSession();
                $this->Implantationrate1->AdvancedSearch->unsetSession();
                $this->Ectopic1->AdvancedSearch->unsetSession();
                $this->TypeofpregA->AdvancedSearch->unsetSession();
                $this->ANC1->AdvancedSearch->unsetSession();
                $this->anomalies2->AdvancedSearch->unsetSession();
                $this->babywt2->AdvancedSearch->unsetSession();
                $this->GAatdelivery1->AdvancedSearch->unsetSession();
                $this->Pregnancyoutcome1->AdvancedSearch->unsetSession();
                $this->_2NDFET->AdvancedSearch->unsetSession();
                $this->AFTERHYSTEROSCOPY1->AdvancedSearch->unsetSession();
                $this->AFTERERA1->AdvancedSearch->unsetSession();
                $this->ERA1->AdvancedSearch->unsetSession();
                $this->HRT1->AdvancedSearch->unsetSession();
                $this->XGRASTPRP1->AdvancedSearch->unsetSession();
                $this->NUMBEROFEMBRYOS->AdvancedSearch->unsetSession();
                $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->unsetSession();
                $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->unsetSession();
                $this->LMWH40MG1->AdvancedSearch->unsetSession();
                $this->hCG1->AdvancedSearch->unsetSession();
                $this->Implantationrate2->AdvancedSearch->unsetSession();
                $this->Ectopic2->AdvancedSearch->unsetSession();
                $this->Typeofpreg2->AdvancedSearch->unsetSession();
                $this->ANCA->AdvancedSearch->unsetSession();
                $this->anomalies1->AdvancedSearch->unsetSession();
                $this->babywt1->AdvancedSearch->unsetSession();
                $this->GAatdelivery2->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->RIDNO->AdvancedSearch->load();
                $this->Treatment->AdvancedSearch->load();
                $this->Origin->AdvancedSearch->load();
                $this->MaleIndications->AdvancedSearch->load();
                $this->FemaleIndications->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->PartnerName->AdvancedSearch->load();
                $this->PartnerID->AdvancedSearch->load();
                $this->A4ICSICycle->AdvancedSearch->load();
                $this->TotalICSICycle->AdvancedSearch->load();
                $this->TypeOfInfertility->AdvancedSearch->load();
                $this->RelevantHistory->AdvancedSearch->load();
                $this->IUICycles->AdvancedSearch->load();
                $this->AMH->AdvancedSearch->load();
                $this->FBMI->AdvancedSearch->load();
                $this->ANTAGONISTSTARTDAY->AdvancedSearch->load();
                $this->OvarianSurgery->AdvancedSearch->load();
                $this->OPUDATE->AdvancedSearch->load();
                $this->RFSH1->AdvancedSearch->load();
                $this->RFSH2->AdvancedSearch->load();
                $this->RFSH3->AdvancedSearch->load();
                $this->E21->AdvancedSearch->load();
                $this->Hysteroscopy->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->Fweight->AdvancedSearch->load();
                $this->AntiTPO->AdvancedSearch->load();
                $this->AntiTG->AdvancedSearch->load();
                $this->PatientAge->AdvancedSearch->load();
                $this->PartnerAge->AdvancedSearch->load();
                $this->CYCLES->AdvancedSearch->load();
                $this->MF->AdvancedSearch->load();
                $this->CauseOfINFERTILITY->AdvancedSearch->load();
                $this->SIS->AdvancedSearch->load();
                $this->Scratching->AdvancedSearch->load();
                $this->Cannulation->AdvancedSearch->load();
                $this->MEPRATE->AdvancedSearch->load();
                $this->ROVARY->AdvancedSearch->load();
                $this->RAFC->AdvancedSearch->load();
                $this->LOVARY->AdvancedSearch->load();
                $this->LAFC->AdvancedSearch->load();
                $this->LH1->AdvancedSearch->load();
                $this->E2->AdvancedSearch->load();
                $this->StemCellInstallation->AdvancedSearch->load();
                $this->DHEAS->AdvancedSearch->load();
                $this->Mtorr->AdvancedSearch->load();
                $this->AMH1->AdvancedSearch->load();
                $this->LH->AdvancedSearch->load();
                $this->BMIMALE->AdvancedSearch->load();
                $this->MaleMedicalConditions->AdvancedSearch->load();
                $this->MaleExamination->AdvancedSearch->load();
                $this->SpermConcentration->AdvancedSearch->load();
                $this->SpermMotilityPNP->AdvancedSearch->load();
                $this->SpermMorphology->AdvancedSearch->load();
                $this->SpermRetrival->AdvancedSearch->load();
                $this->MTestosterone->AdvancedSearch->load();
                $this->DFI->AdvancedSearch->load();
                $this->PreRX->AdvancedSearch->load();
                $this->CC100->AdvancedSearch->load();
                $this->RFSH1A->AdvancedSearch->load();
                $this->HMG1->AdvancedSearch->load();
                $this->RLH->AdvancedSearch->load();
                $this->HMG_HP->AdvancedSearch->load();
                $this->day_of_HMG->AdvancedSearch->load();
                $this->Reason_for_HMG->AdvancedSearch->load();
                $this->RLH_day->AdvancedSearch->load();
                $this->DAYSOFSTIMULATION->AdvancedSearch->load();
                $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->load();
                $this->dayofAnta->AdvancedSearch->load();
                $this->RFSHTD->AdvancedSearch->load();
                $this->RFSHHMGTD->AdvancedSearch->load();
                $this->RFSHRLHTD->AdvancedSearch->load();
                $this->HMGTD->AdvancedSearch->load();
                $this->LHTD->AdvancedSearch->load();
                $this->D1LH->AdvancedSearch->load();
                $this->D1E2->AdvancedSearch->load();
                $this->TriggerdayE2->AdvancedSearch->load();
                $this->TriggerdayP4->AdvancedSearch->load();
                $this->TriggerdayLH->AdvancedSearch->load();
                $this->VITD->AdvancedSearch->load();
                $this->TRIGGERR->AdvancedSearch->load();
                $this->BHCGBEFORERETRIEVAL->AdvancedSearch->load();
                $this->LH12HRS->AdvancedSearch->load();
                $this->P412HRS->AdvancedSearch->load();
                $this->ETonhCGday->AdvancedSearch->load();
                $this->ETdoppler->AdvancedSearch->load();
                $this->VIFIVFI->AdvancedSearch->load();
                $this->Endometrialabnormality->AdvancedSearch->load();
                $this->AFCONS1->AdvancedSearch->load();
                $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->load();
                $this->SPERMTYPE->AdvancedSearch->load();
                $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->load();
                $this->OOCYTESRETRIEVED->AdvancedSearch->load();
                $this->TIMEOFDENUDATION->AdvancedSearch->load();
                $this->MII->AdvancedSearch->load();
                $this->MI->AdvancedSearch->load();
                $this->GV->AdvancedSearch->load();
                $this->ICSITIMEFORMOPU->AdvancedSearch->load();
                $this->FERT2PN->AdvancedSearch->load();
                $this->DEG->AdvancedSearch->load();
                $this->D3GRADEA->AdvancedSearch->load();
                $this->D3GRADEB->AdvancedSearch->load();
                $this->D3GRADEC->AdvancedSearch->load();
                $this->D3GRADED->AdvancedSearch->load();
                $this->USABLEONDAY3ET->AdvancedSearch->load();
                $this->USABLEONday3FREEZING->AdvancedSearch->load();
                $this->D5GARDEA->AdvancedSearch->load();
                $this->D5GRADEB->AdvancedSearch->load();
                $this->D5GRADEC->AdvancedSearch->load();
                $this->D5GRADED->AdvancedSearch->load();
                $this->USABLEOND5ET->AdvancedSearch->load();
                $this->USABLEOND5FREEZING->AdvancedSearch->load();
                $this->D6GRADEA->AdvancedSearch->load();
                $this->D6GRADEB->AdvancedSearch->load();
                $this->D6GRADEC->AdvancedSearch->load();
                $this->D6GRADED->AdvancedSearch->load();
                $this->D6USABLEEMBRYOET->AdvancedSearch->load();
                $this->D6USABLEFREEZING->AdvancedSearch->load();
                $this->TOTALBLAST->AdvancedSearch->load();
                $this->PGS->AdvancedSearch->load();
                $this->REMARKS->AdvancedSearch->load();
                $this->PUDB->AdvancedSearch->load();
                $this->ICSIDB->AdvancedSearch->load();
                $this->VITDB->AdvancedSearch->load();
                $this->ETDB->AdvancedSearch->load();
                $this->LABCOMMENTS->AdvancedSearch->load();
                $this->ReasonfornoFRESHtransfer->AdvancedSearch->load();
                $this->NoofembryostransferredDay35ABC->AdvancedSearch->load();
                $this->EMBRYOSPENDING->AdvancedSearch->load();
                $this->DAYOFTRANSFER->AdvancedSearch->load();
                $this->HDsperm->AdvancedSearch->load();
                $this->Comments->AdvancedSearch->load();
                $this->scprogesterone->AdvancedSearch->load();
                $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->load();
                $this->CRINONE->AdvancedSearch->load();
                $this->progynova->AdvancedSearch->load();
                $this->Heparin->AdvancedSearch->load();
                $this->cabergolin->AdvancedSearch->load();
                $this->Antagonist->AdvancedSearch->load();
                $this->OHSS->AdvancedSearch->load();
                $this->Complications->AdvancedSearch->load();
                $this->LPbleeding->AdvancedSearch->load();
                $this->hCG->AdvancedSearch->load();
                $this->Implantationrate->AdvancedSearch->load();
                $this->Ectopic->AdvancedSearch->load();
                $this->Typeofpreg->AdvancedSearch->load();
                $this->ANC->AdvancedSearch->load();
                $this->anomalies->AdvancedSearch->load();
                $this->babywt->AdvancedSearch->load();
                $this->GAatdelivery->AdvancedSearch->load();
                $this->Pregnancyoutcome->AdvancedSearch->load();
                $this->_1stFET->AdvancedSearch->load();
                $this->AFTERHYSTEROSCOPY->AdvancedSearch->load();
                $this->AFTERERA->AdvancedSearch->load();
                $this->ERA->AdvancedSearch->load();
                $this->HRT->AdvancedSearch->load();
                $this->XGRASTPRP->AdvancedSearch->load();
                $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->load();
                $this->LMWH40MG->AdvancedSearch->load();
                $this->hCG2->AdvancedSearch->load();
                $this->Implantationrate1->AdvancedSearch->load();
                $this->Ectopic1->AdvancedSearch->load();
                $this->TypeofpregA->AdvancedSearch->load();
                $this->ANC1->AdvancedSearch->load();
                $this->anomalies2->AdvancedSearch->load();
                $this->babywt2->AdvancedSearch->load();
                $this->GAatdelivery1->AdvancedSearch->load();
                $this->Pregnancyoutcome1->AdvancedSearch->load();
                $this->_2NDFET->AdvancedSearch->load();
                $this->AFTERHYSTEROSCOPY1->AdvancedSearch->load();
                $this->AFTERERA1->AdvancedSearch->load();
                $this->ERA1->AdvancedSearch->load();
                $this->HRT1->AdvancedSearch->load();
                $this->XGRASTPRP1->AdvancedSearch->load();
                $this->NUMBEROFEMBRYOS->AdvancedSearch->load();
                $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->load();
                $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->load();
                $this->LMWH40MG1->AdvancedSearch->load();
                $this->hCG1->AdvancedSearch->load();
                $this->Implantationrate2->AdvancedSearch->load();
                $this->Ectopic2->AdvancedSearch->load();
                $this->Typeofpreg2->AdvancedSearch->load();
                $this->ANCA->AdvancedSearch->load();
                $this->anomalies1->AdvancedSearch->load();
                $this->babywt1->AdvancedSearch->load();
                $this->GAatdelivery2->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->Treatment); // Treatment
            $this->updateSort($this->Origin); // Origin
            $this->updateSort($this->MaleIndications); // MaleIndications
            $this->updateSort($this->FemaleIndications); // FemaleIndications
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->PartnerID); // PartnerID
            $this->updateSort($this->A4ICSICycle); // A4ICSICycle
            $this->updateSort($this->TotalICSICycle); // TotalICSICycle
            $this->updateSort($this->TypeOfInfertility); // TypeOfInfertility
            $this->updateSort($this->RelevantHistory); // RelevantHistory
            $this->updateSort($this->IUICycles); // IUICycles
            $this->updateSort($this->AMH); // AMH
            $this->updateSort($this->FBMI); // FBMI
            $this->updateSort($this->ANTAGONISTSTARTDAY); // ANTAGONISTSTARTDAY
            $this->updateSort($this->OvarianSurgery); // OvarianSurgery
            $this->updateSort($this->OPUDATE); // OPUDATE
            $this->updateSort($this->RFSH1); // RFSH1
            $this->updateSort($this->RFSH2); // RFSH2
            $this->updateSort($this->RFSH3); // RFSH3
            $this->updateSort($this->E21); // E21
            $this->updateSort($this->Hysteroscopy); // Hysteroscopy
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->Fweight); // Fweight
            $this->updateSort($this->AntiTPO); // AntiTPO
            $this->updateSort($this->AntiTG); // AntiTG
            $this->updateSort($this->PatientAge); // PatientAge
            $this->updateSort($this->PartnerAge); // PartnerAge
            $this->updateSort($this->ROVARY); // R.OVARY
            $this->updateSort($this->RAFC); // R.AFC
            $this->updateSort($this->LOVARY); // L.OVARY
            $this->updateSort($this->LAFC); // L.AFC
            $this->updateSort($this->E2); // E2
            $this->updateSort($this->AMH1); // AMH1
            $this->updateSort($this->BMIMALE); // BMI(MALE)
            $this->updateSort($this->MaleMedicalConditions); // MaleMedicalConditions
            $this->updateSort($this->CC100); // CC 100
            $this->updateSort($this->RFSH1A); // RFSH1A
            $this->updateSort($this->HMG1); // HMG1
            $this->updateSort($this->DAYSOFSTIMULATION); // DAYSOFSTIMULATION
            $this->updateSort($this->TRIGGERR); // TRIGGERR
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

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->RIDNO->setSort("");
                $this->Treatment->setSort("");
                $this->Origin->setSort("");
                $this->MaleIndications->setSort("");
                $this->FemaleIndications->setSort("");
                $this->PatientName->setSort("");
                $this->PatientID->setSort("");
                $this->PartnerName->setSort("");
                $this->PartnerID->setSort("");
                $this->A4ICSICycle->setSort("");
                $this->TotalICSICycle->setSort("");
                $this->TypeOfInfertility->setSort("");
                $this->RelevantHistory->setSort("");
                $this->IUICycles->setSort("");
                $this->AMH->setSort("");
                $this->FBMI->setSort("");
                $this->ANTAGONISTSTARTDAY->setSort("");
                $this->OvarianSurgery->setSort("");
                $this->OPUDATE->setSort("");
                $this->RFSH1->setSort("");
                $this->RFSH2->setSort("");
                $this->RFSH3->setSort("");
                $this->E21->setSort("");
                $this->Hysteroscopy->setSort("");
                $this->HospID->setSort("");
                $this->Fweight->setSort("");
                $this->AntiTPO->setSort("");
                $this->AntiTG->setSort("");
                $this->PatientAge->setSort("");
                $this->PartnerAge->setSort("");
                $this->CYCLES->setSort("");
                $this->MF->setSort("");
                $this->CauseOfINFERTILITY->setSort("");
                $this->SIS->setSort("");
                $this->Scratching->setSort("");
                $this->Cannulation->setSort("");
                $this->MEPRATE->setSort("");
                $this->ROVARY->setSort("");
                $this->RAFC->setSort("");
                $this->LOVARY->setSort("");
                $this->LAFC->setSort("");
                $this->LH1->setSort("");
                $this->E2->setSort("");
                $this->StemCellInstallation->setSort("");
                $this->DHEAS->setSort("");
                $this->Mtorr->setSort("");
                $this->AMH1->setSort("");
                $this->LH->setSort("");
                $this->BMIMALE->setSort("");
                $this->MaleMedicalConditions->setSort("");
                $this->MaleExamination->setSort("");
                $this->SpermConcentration->setSort("");
                $this->SpermMotilityPNP->setSort("");
                $this->SpermMorphology->setSort("");
                $this->SpermRetrival->setSort("");
                $this->MTestosterone->setSort("");
                $this->DFI->setSort("");
                $this->PreRX->setSort("");
                $this->CC100->setSort("");
                $this->RFSH1A->setSort("");
                $this->HMG1->setSort("");
                $this->RLH->setSort("");
                $this->HMG_HP->setSort("");
                $this->day_of_HMG->setSort("");
                $this->Reason_for_HMG->setSort("");
                $this->RLH_day->setSort("");
                $this->DAYSOFSTIMULATION->setSort("");
                $this->AnychangeinbetweenDoseaddedday->setSort("");
                $this->dayofAnta->setSort("");
                $this->RFSHTD->setSort("");
                $this->RFSHHMGTD->setSort("");
                $this->RFSHRLHTD->setSort("");
                $this->HMGTD->setSort("");
                $this->LHTD->setSort("");
                $this->D1LH->setSort("");
                $this->D1E2->setSort("");
                $this->TriggerdayE2->setSort("");
                $this->TriggerdayP4->setSort("");
                $this->TriggerdayLH->setSort("");
                $this->VITD->setSort("");
                $this->TRIGGERR->setSort("");
                $this->BHCGBEFORERETRIEVAL->setSort("");
                $this->LH12HRS->setSort("");
                $this->P412HRS->setSort("");
                $this->ETonhCGday->setSort("");
                $this->ETdoppler->setSort("");
                $this->VIFIVFI->setSort("");
                $this->Endometrialabnormality->setSort("");
                $this->AFCONS1->setSort("");
                $this->TIMEOFOPUFROMTRIGGER->setSort("");
                $this->SPERMTYPE->setSort("");
                $this->EXPECTEDONTRIGGERDAY->setSort("");
                $this->OOCYTESRETRIEVED->setSort("");
                $this->TIMEOFDENUDATION->setSort("");
                $this->MII->setSort("");
                $this->MI->setSort("");
                $this->GV->setSort("");
                $this->ICSITIMEFORMOPU->setSort("");
                $this->FERT2PN->setSort("");
                $this->DEG->setSort("");
                $this->D3GRADEA->setSort("");
                $this->D3GRADEB->setSort("");
                $this->D3GRADEC->setSort("");
                $this->D3GRADED->setSort("");
                $this->USABLEONDAY3ET->setSort("");
                $this->USABLEONday3FREEZING->setSort("");
                $this->D5GARDEA->setSort("");
                $this->D5GRADEB->setSort("");
                $this->D5GRADEC->setSort("");
                $this->D5GRADED->setSort("");
                $this->USABLEOND5ET->setSort("");
                $this->USABLEOND5FREEZING->setSort("");
                $this->D6GRADEA->setSort("");
                $this->D6GRADEB->setSort("");
                $this->D6GRADEC->setSort("");
                $this->D6GRADED->setSort("");
                $this->D6USABLEEMBRYOET->setSort("");
                $this->D6USABLEFREEZING->setSort("");
                $this->TOTALBLAST->setSort("");
                $this->PGS->setSort("");
                $this->REMARKS->setSort("");
                $this->PUDB->setSort("");
                $this->ICSIDB->setSort("");
                $this->VITDB->setSort("");
                $this->ETDB->setSort("");
                $this->LABCOMMENTS->setSort("");
                $this->ReasonfornoFRESHtransfer->setSort("");
                $this->NoofembryostransferredDay35ABC->setSort("");
                $this->EMBRYOSPENDING->setSort("");
                $this->DAYOFTRANSFER->setSort("");
                $this->HDsperm->setSort("");
                $this->Comments->setSort("");
                $this->scprogesterone->setSort("");
                $this->Naturalmicronised400mgbdduphaston10mgbd->setSort("");
                $this->CRINONE->setSort("");
                $this->progynova->setSort("");
                $this->Heparin->setSort("");
                $this->cabergolin->setSort("");
                $this->Antagonist->setSort("");
                $this->OHSS->setSort("");
                $this->Complications->setSort("");
                $this->LPbleeding->setSort("");
                $this->hCG->setSort("");
                $this->Implantationrate->setSort("");
                $this->Ectopic->setSort("");
                $this->Typeofpreg->setSort("");
                $this->ANC->setSort("");
                $this->anomalies->setSort("");
                $this->babywt->setSort("");
                $this->GAatdelivery->setSort("");
                $this->Pregnancyoutcome->setSort("");
                $this->_1stFET->setSort("");
                $this->AFTERHYSTEROSCOPY->setSort("");
                $this->AFTERERA->setSort("");
                $this->ERA->setSort("");
                $this->HRT->setSort("");
                $this->XGRASTPRP->setSort("");
                $this->EMBRYODETAILSDAY35ABC->setSort("");
                $this->LMWH40MG->setSort("");
                $this->hCG2->setSort("");
                $this->Implantationrate1->setSort("");
                $this->Ectopic1->setSort("");
                $this->TypeofpregA->setSort("");
                $this->ANC1->setSort("");
                $this->anomalies2->setSort("");
                $this->babywt2->setSort("");
                $this->GAatdelivery1->setSort("");
                $this->Pregnancyoutcome1->setSort("");
                $this->_2NDFET->setSort("");
                $this->AFTERHYSTEROSCOPY1->setSort("");
                $this->AFTERERA1->setSort("");
                $this->ERA1->setSort("");
                $this->HRT1->setSort("");
                $this->XGRASTPRP1->setSort("");
                $this->NUMBEROFEMBRYOS->setSort("");
                $this->EMBRYODETAILSDAY356ABC->setSort("");
                $this->INTRALIPIDANDBARGLOBIN->setSort("");
                $this->LMWH40MG1->setSort("");
                $this->hCG1->setSort("");
                $this->Implantationrate2->setSort("");
                $this->Ectopic2->setSort("");
                $this->Typeofpreg2->setSort("");
                $this->ANCA->setSort("");
                $this->anomalies1->setSort("");
                $this->babywt1->setSort("");
                $this->GAatdelivery2->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_template_for_opulistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_template_for_opulistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_template_for_opulist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // RIDNO
        if (!$this->isAddOrEdit() && $this->RIDNO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RIDNO->AdvancedSearch->SearchValue != "" || $this->RIDNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Treatment
        if (!$this->isAddOrEdit() && $this->Treatment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Treatment->AdvancedSearch->SearchValue != "" || $this->Treatment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Origin
        if (!$this->isAddOrEdit() && $this->Origin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Origin->AdvancedSearch->SearchValue != "" || $this->Origin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MaleIndications
        if (!$this->isAddOrEdit() && $this->MaleIndications->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MaleIndications->AdvancedSearch->SearchValue != "" || $this->MaleIndications->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FemaleIndications
        if (!$this->isAddOrEdit() && $this->FemaleIndications->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FemaleIndications->AdvancedSearch->SearchValue != "" || $this->FemaleIndications->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatientID
        if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PartnerID
        if (!$this->isAddOrEdit() && $this->PartnerID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerID->AdvancedSearch->SearchValue != "" || $this->PartnerID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // A4ICSICycle
        if (!$this->isAddOrEdit() && $this->A4ICSICycle->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->A4ICSICycle->AdvancedSearch->SearchValue != "" || $this->A4ICSICycle->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TotalICSICycle
        if (!$this->isAddOrEdit() && $this->TotalICSICycle->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TotalICSICycle->AdvancedSearch->SearchValue != "" || $this->TotalICSICycle->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TypeOfInfertility
        if (!$this->isAddOrEdit() && $this->TypeOfInfertility->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TypeOfInfertility->AdvancedSearch->SearchValue != "" || $this->TypeOfInfertility->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RelevantHistory
        if (!$this->isAddOrEdit() && $this->RelevantHistory->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RelevantHistory->AdvancedSearch->SearchValue != "" || $this->RelevantHistory->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IUICycles
        if (!$this->isAddOrEdit() && $this->IUICycles->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IUICycles->AdvancedSearch->SearchValue != "" || $this->IUICycles->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AMH
        if (!$this->isAddOrEdit() && $this->AMH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AMH->AdvancedSearch->SearchValue != "" || $this->AMH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FBMI
        if (!$this->isAddOrEdit() && $this->FBMI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FBMI->AdvancedSearch->SearchValue != "" || $this->FBMI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANTAGONISTSTARTDAY
        if (!$this->isAddOrEdit() && $this->ANTAGONISTSTARTDAY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue != "" || $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OvarianSurgery
        if (!$this->isAddOrEdit() && $this->OvarianSurgery->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OvarianSurgery->AdvancedSearch->SearchValue != "" || $this->OvarianSurgery->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OPUDATE
        if (!$this->isAddOrEdit() && $this->OPUDATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OPUDATE->AdvancedSearch->SearchValue != "" || $this->OPUDATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RFSH1
        if (!$this->isAddOrEdit() && $this->RFSH1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSH1->AdvancedSearch->SearchValue != "" || $this->RFSH1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RFSH2
        if (!$this->isAddOrEdit() && $this->RFSH2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSH2->AdvancedSearch->SearchValue != "" || $this->RFSH2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RFSH3
        if (!$this->isAddOrEdit() && $this->RFSH3->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSH3->AdvancedSearch->SearchValue != "" || $this->RFSH3->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // E21
        if (!$this->isAddOrEdit() && $this->E21->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->E21->AdvancedSearch->SearchValue != "" || $this->E21->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Hysteroscopy
        if (!$this->isAddOrEdit() && $this->Hysteroscopy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Hysteroscopy->AdvancedSearch->SearchValue != "" || $this->Hysteroscopy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Fweight
        if (!$this->isAddOrEdit() && $this->Fweight->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Fweight->AdvancedSearch->SearchValue != "" || $this->Fweight->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AntiTPO
        if (!$this->isAddOrEdit() && $this->AntiTPO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AntiTPO->AdvancedSearch->SearchValue != "" || $this->AntiTPO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AntiTG
        if (!$this->isAddOrEdit() && $this->AntiTG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AntiTG->AdvancedSearch->SearchValue != "" || $this->AntiTG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientAge
        if (!$this->isAddOrEdit() && $this->PatientAge->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientAge->AdvancedSearch->SearchValue != "" || $this->PatientAge->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerAge
        if (!$this->isAddOrEdit() && $this->PartnerAge->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerAge->AdvancedSearch->SearchValue != "" || $this->PartnerAge->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CYCLES
        if (!$this->isAddOrEdit() && $this->CYCLES->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CYCLES->AdvancedSearch->SearchValue != "" || $this->CYCLES->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MF
        if (!$this->isAddOrEdit() && $this->MF->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MF->AdvancedSearch->SearchValue != "" || $this->MF->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CauseOfINFERTILITY
        if (!$this->isAddOrEdit() && $this->CauseOfINFERTILITY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CauseOfINFERTILITY->AdvancedSearch->SearchValue != "" || $this->CauseOfINFERTILITY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SIS
        if (!$this->isAddOrEdit() && $this->SIS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SIS->AdvancedSearch->SearchValue != "" || $this->SIS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Scratching
        if (!$this->isAddOrEdit() && $this->Scratching->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Scratching->AdvancedSearch->SearchValue != "" || $this->Scratching->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Cannulation
        if (!$this->isAddOrEdit() && $this->Cannulation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Cannulation->AdvancedSearch->SearchValue != "" || $this->Cannulation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MEPRATE
        if (!$this->isAddOrEdit() && $this->MEPRATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MEPRATE->AdvancedSearch->SearchValue != "" || $this->MEPRATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // R.OVARY
        if (!$this->isAddOrEdit() && $this->ROVARY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ROVARY->AdvancedSearch->SearchValue != "" || $this->ROVARY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // R.AFC
        if (!$this->isAddOrEdit() && $this->RAFC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RAFC->AdvancedSearch->SearchValue != "" || $this->RAFC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // L.OVARY
        if (!$this->isAddOrEdit() && $this->LOVARY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LOVARY->AdvancedSearch->SearchValue != "" || $this->LOVARY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // L.AFC
        if (!$this->isAddOrEdit() && $this->LAFC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LAFC->AdvancedSearch->SearchValue != "" || $this->LAFC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LH1
        if (!$this->isAddOrEdit() && $this->LH1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LH1->AdvancedSearch->SearchValue != "" || $this->LH1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // E2
        if (!$this->isAddOrEdit() && $this->E2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->E2->AdvancedSearch->SearchValue != "" || $this->E2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // StemCellInstallation
        if (!$this->isAddOrEdit() && $this->StemCellInstallation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->StemCellInstallation->AdvancedSearch->SearchValue != "" || $this->StemCellInstallation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DHEAS
        if (!$this->isAddOrEdit() && $this->DHEAS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DHEAS->AdvancedSearch->SearchValue != "" || $this->DHEAS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Mtorr
        if (!$this->isAddOrEdit() && $this->Mtorr->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Mtorr->AdvancedSearch->SearchValue != "" || $this->Mtorr->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AMH1
        if (!$this->isAddOrEdit() && $this->AMH1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AMH1->AdvancedSearch->SearchValue != "" || $this->AMH1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LH
        if (!$this->isAddOrEdit() && $this->LH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LH->AdvancedSearch->SearchValue != "" || $this->LH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BMI(MALE)
        if (!$this->isAddOrEdit() && $this->BMIMALE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BMIMALE->AdvancedSearch->SearchValue != "" || $this->BMIMALE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MaleMedicalConditions
        if (!$this->isAddOrEdit() && $this->MaleMedicalConditions->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MaleMedicalConditions->AdvancedSearch->SearchValue != "" || $this->MaleMedicalConditions->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MaleExamination
        if (!$this->isAddOrEdit() && $this->MaleExamination->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MaleExamination->AdvancedSearch->SearchValue != "" || $this->MaleExamination->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SpermConcentration
        if (!$this->isAddOrEdit() && $this->SpermConcentration->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SpermConcentration->AdvancedSearch->SearchValue != "" || $this->SpermConcentration->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SpermMotility(P&NP)
        if (!$this->isAddOrEdit() && $this->SpermMotilityPNP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SpermMotilityPNP->AdvancedSearch->SearchValue != "" || $this->SpermMotilityPNP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SpermMorphology
        if (!$this->isAddOrEdit() && $this->SpermMorphology->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SpermMorphology->AdvancedSearch->SearchValue != "" || $this->SpermMorphology->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SpermRetrival
        if (!$this->isAddOrEdit() && $this->SpermRetrival->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SpermRetrival->AdvancedSearch->SearchValue != "" || $this->SpermRetrival->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // M.Testosterone
        if (!$this->isAddOrEdit() && $this->MTestosterone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MTestosterone->AdvancedSearch->SearchValue != "" || $this->MTestosterone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DFI
        if (!$this->isAddOrEdit() && $this->DFI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DFI->AdvancedSearch->SearchValue != "" || $this->DFI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PreRX
        if (!$this->isAddOrEdit() && $this->PreRX->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PreRX->AdvancedSearch->SearchValue != "" || $this->PreRX->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CC 100
        if (!$this->isAddOrEdit() && $this->CC100->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CC100->AdvancedSearch->SearchValue != "" || $this->CC100->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RFSH1A
        if (!$this->isAddOrEdit() && $this->RFSH1A->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSH1A->AdvancedSearch->SearchValue != "" || $this->RFSH1A->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HMG1
        if (!$this->isAddOrEdit() && $this->HMG1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HMG1->AdvancedSearch->SearchValue != "" || $this->HMG1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RLH
        if (!$this->isAddOrEdit() && $this->RLH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RLH->AdvancedSearch->SearchValue != "" || $this->RLH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HMG_HP
        if (!$this->isAddOrEdit() && $this->HMG_HP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HMG_HP->AdvancedSearch->SearchValue != "" || $this->HMG_HP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // day_of_HMG
        if (!$this->isAddOrEdit() && $this->day_of_HMG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->day_of_HMG->AdvancedSearch->SearchValue != "" || $this->day_of_HMG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Reason_for_HMG
        if (!$this->isAddOrEdit() && $this->Reason_for_HMG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reason_for_HMG->AdvancedSearch->SearchValue != "" || $this->Reason_for_HMG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RLH_day
        if (!$this->isAddOrEdit() && $this->RLH_day->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RLH_day->AdvancedSearch->SearchValue != "" || $this->RLH_day->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DAYSOFSTIMULATION
        if (!$this->isAddOrEdit() && $this->DAYSOFSTIMULATION->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue != "" || $this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Any change inbetween ( Dose added , day)
        if (!$this->isAddOrEdit() && $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchValue != "" || $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // day of Anta
        if (!$this->isAddOrEdit() && $this->dayofAnta->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->dayofAnta->AdvancedSearch->SearchValue != "" || $this->dayofAnta->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // R FSH TD
        if (!$this->isAddOrEdit() && $this->RFSHTD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSHTD->AdvancedSearch->SearchValue != "" || $this->RFSHTD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // R FSH + HMG TD
        if (!$this->isAddOrEdit() && $this->RFSHHMGTD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSHHMGTD->AdvancedSearch->SearchValue != "" || $this->RFSHHMGTD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // R FSH + R LH TD
        if (!$this->isAddOrEdit() && $this->RFSHRLHTD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RFSHRLHTD->AdvancedSearch->SearchValue != "" || $this->RFSHRLHTD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HMG TD
        if (!$this->isAddOrEdit() && $this->HMGTD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HMGTD->AdvancedSearch->SearchValue != "" || $this->HMGTD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LH TD
        if (!$this->isAddOrEdit() && $this->LHTD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LHTD->AdvancedSearch->SearchValue != "" || $this->LHTD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D1 LH
        if (!$this->isAddOrEdit() && $this->D1LH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D1LH->AdvancedSearch->SearchValue != "" || $this->D1LH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D1 E2
        if (!$this->isAddOrEdit() && $this->D1E2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D1E2->AdvancedSearch->SearchValue != "" || $this->D1E2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Trigger day E2
        if (!$this->isAddOrEdit() && $this->TriggerdayE2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TriggerdayE2->AdvancedSearch->SearchValue != "" || $this->TriggerdayE2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Trigger day P4
        if (!$this->isAddOrEdit() && $this->TriggerdayP4->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TriggerdayP4->AdvancedSearch->SearchValue != "" || $this->TriggerdayP4->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Trigger day LH
        if (!$this->isAddOrEdit() && $this->TriggerdayLH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TriggerdayLH->AdvancedSearch->SearchValue != "" || $this->TriggerdayLH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // VIT-D
        if (!$this->isAddOrEdit() && $this->VITD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->VITD->AdvancedSearch->SearchValue != "" || $this->VITD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TRIGGERR
        if (!$this->isAddOrEdit() && $this->TRIGGERR->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TRIGGERR->AdvancedSearch->SearchValue != "" || $this->TRIGGERR->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BHCG BEFORE RETRIEVAL
        if (!$this->isAddOrEdit() && $this->BHCGBEFORERETRIEVAL->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchValue != "" || $this->BHCGBEFORERETRIEVAL->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LH -12 HRS
        if (!$this->isAddOrEdit() && $this->LH12HRS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LH12HRS->AdvancedSearch->SearchValue != "" || $this->LH12HRS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // P4 -12 HRS
        if (!$this->isAddOrEdit() && $this->P412HRS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->P412HRS->AdvancedSearch->SearchValue != "" || $this->P412HRS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ET on hCG day
        if (!$this->isAddOrEdit() && $this->ETonhCGday->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ETonhCGday->AdvancedSearch->SearchValue != "" || $this->ETonhCGday->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ET doppler
        if (!$this->isAddOrEdit() && $this->ETdoppler->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ETdoppler->AdvancedSearch->SearchValue != "" || $this->ETdoppler->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // VI/FI/VFI
        if (!$this->isAddOrEdit() && $this->VIFIVFI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->VIFIVFI->AdvancedSearch->SearchValue != "" || $this->VIFIVFI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Endometrial abnormality
        if (!$this->isAddOrEdit() && $this->Endometrialabnormality->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Endometrialabnormality->AdvancedSearch->SearchValue != "" || $this->Endometrialabnormality->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AFC ON S1
        if (!$this->isAddOrEdit() && $this->AFCONS1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AFCONS1->AdvancedSearch->SearchValue != "" || $this->AFCONS1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TIME OF OPU FROM TRIGGER
        if (!$this->isAddOrEdit() && $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchValue != "" || $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SPERM TYPE
        if (!$this->isAddOrEdit() && $this->SPERMTYPE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SPERMTYPE->AdvancedSearch->SearchValue != "" || $this->SPERMTYPE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EXPECTED ON TRIGGER DAY
        if (!$this->isAddOrEdit() && $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchValue != "" || $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OOCYTES RETRIEVED
        if (!$this->isAddOrEdit() && $this->OOCYTESRETRIEVED->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OOCYTESRETRIEVED->AdvancedSearch->SearchValue != "" || $this->OOCYTESRETRIEVED->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TIME OF DENUDATION
        if (!$this->isAddOrEdit() && $this->TIMEOFDENUDATION->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TIMEOFDENUDATION->AdvancedSearch->SearchValue != "" || $this->TIMEOFDENUDATION->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // M-II
        if (!$this->isAddOrEdit() && $this->MII->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MII->AdvancedSearch->SearchValue != "" || $this->MII->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MI
        if (!$this->isAddOrEdit() && $this->MI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MI->AdvancedSearch->SearchValue != "" || $this->MI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GV
        if (!$this->isAddOrEdit() && $this->GV->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GV->AdvancedSearch->SearchValue != "" || $this->GV->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ICSI TIME FORM OPU
        if (!$this->isAddOrEdit() && $this->ICSITIMEFORMOPU->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ICSITIMEFORMOPU->AdvancedSearch->SearchValue != "" || $this->ICSITIMEFORMOPU->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FERT ( 2 PN )
        if (!$this->isAddOrEdit() && $this->FERT2PN->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FERT2PN->AdvancedSearch->SearchValue != "" || $this->FERT2PN->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DEG
        if (!$this->isAddOrEdit() && $this->DEG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DEG->AdvancedSearch->SearchValue != "" || $this->DEG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D3 GRADE A
        if (!$this->isAddOrEdit() && $this->D3GRADEA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D3GRADEA->AdvancedSearch->SearchValue != "" || $this->D3GRADEA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D3 GRADE B
        if (!$this->isAddOrEdit() && $this->D3GRADEB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D3GRADEB->AdvancedSearch->SearchValue != "" || $this->D3GRADEB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D3 GRADE C
        if (!$this->isAddOrEdit() && $this->D3GRADEC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D3GRADEC->AdvancedSearch->SearchValue != "" || $this->D3GRADEC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D3 GRADE D
        if (!$this->isAddOrEdit() && $this->D3GRADED->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D3GRADED->AdvancedSearch->SearchValue != "" || $this->D3GRADED->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // USABLE ON DAY 3 ET
        if (!$this->isAddOrEdit() && $this->USABLEONDAY3ET->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->USABLEONDAY3ET->AdvancedSearch->SearchValue != "" || $this->USABLEONDAY3ET->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // USABLE ON day 3 FREEZING
        if (!$this->isAddOrEdit() && $this->USABLEONday3FREEZING->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->USABLEONday3FREEZING->AdvancedSearch->SearchValue != "" || $this->USABLEONday3FREEZING->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D5 GARDE A
        if (!$this->isAddOrEdit() && $this->D5GARDEA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D5GARDEA->AdvancedSearch->SearchValue != "" || $this->D5GARDEA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D5 GRADE B
        if (!$this->isAddOrEdit() && $this->D5GRADEB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D5GRADEB->AdvancedSearch->SearchValue != "" || $this->D5GRADEB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D5 GRADE C
        if (!$this->isAddOrEdit() && $this->D5GRADEC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D5GRADEC->AdvancedSearch->SearchValue != "" || $this->D5GRADEC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D5 GRADE D
        if (!$this->isAddOrEdit() && $this->D5GRADED->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D5GRADED->AdvancedSearch->SearchValue != "" || $this->D5GRADED->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // USABLE ON D5 ET
        if (!$this->isAddOrEdit() && $this->USABLEOND5ET->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->USABLEOND5ET->AdvancedSearch->SearchValue != "" || $this->USABLEOND5ET->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // USABLE ON D5 FREEZING
        if (!$this->isAddOrEdit() && $this->USABLEOND5FREEZING->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->USABLEOND5FREEZING->AdvancedSearch->SearchValue != "" || $this->USABLEOND5FREEZING->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D6 GRADE A
        if (!$this->isAddOrEdit() && $this->D6GRADEA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D6GRADEA->AdvancedSearch->SearchValue != "" || $this->D6GRADEA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D6 GRADE B
        if (!$this->isAddOrEdit() && $this->D6GRADEB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D6GRADEB->AdvancedSearch->SearchValue != "" || $this->D6GRADEB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D6 GRADE C
        if (!$this->isAddOrEdit() && $this->D6GRADEC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D6GRADEC->AdvancedSearch->SearchValue != "" || $this->D6GRADEC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D6 GRADE D
        if (!$this->isAddOrEdit() && $this->D6GRADED->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D6GRADED->AdvancedSearch->SearchValue != "" || $this->D6GRADED->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D6 USABLE EMBRYO ET
        if (!$this->isAddOrEdit() && $this->D6USABLEEMBRYOET->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D6USABLEEMBRYOET->AdvancedSearch->SearchValue != "" || $this->D6USABLEEMBRYOET->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // D6 USABLE FREEZING
        if (!$this->isAddOrEdit() && $this->D6USABLEFREEZING->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->D6USABLEFREEZING->AdvancedSearch->SearchValue != "" || $this->D6USABLEFREEZING->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TOTAL BLAST
        if (!$this->isAddOrEdit() && $this->TOTALBLAST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TOTALBLAST->AdvancedSearch->SearchValue != "" || $this->TOTALBLAST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PGS
        if (!$this->isAddOrEdit() && $this->PGS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PGS->AdvancedSearch->SearchValue != "" || $this->PGS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // REMARKS
        if (!$this->isAddOrEdit() && $this->REMARKS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->REMARKS->AdvancedSearch->SearchValue != "" || $this->REMARKS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PU - D/B
        if (!$this->isAddOrEdit() && $this->PUDB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PUDB->AdvancedSearch->SearchValue != "" || $this->PUDB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ICSI D/B
        if (!$this->isAddOrEdit() && $this->ICSIDB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ICSIDB->AdvancedSearch->SearchValue != "" || $this->ICSIDB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // VIT D/B
        if (!$this->isAddOrEdit() && $this->VITDB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->VITDB->AdvancedSearch->SearchValue != "" || $this->VITDB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ET D/B
        if (!$this->isAddOrEdit() && $this->ETDB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ETDB->AdvancedSearch->SearchValue != "" || $this->ETDB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LAB COMMENTS
        if (!$this->isAddOrEdit() && $this->LABCOMMENTS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LABCOMMENTS->AdvancedSearch->SearchValue != "" || $this->LABCOMMENTS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Reason for no FRESH transfer
        if (!$this->isAddOrEdit() && $this->ReasonfornoFRESHtransfer->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchValue != "" || $this->ReasonfornoFRESHtransfer->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // No of embryos transferred Day 3/5, A,B,C
        if (!$this->isAddOrEdit() && $this->NoofembryostransferredDay35ABC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchValue != "" || $this->NoofembryostransferredDay35ABC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EMBRYOS PENDING
        if (!$this->isAddOrEdit() && $this->EMBRYOSPENDING->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EMBRYOSPENDING->AdvancedSearch->SearchValue != "" || $this->EMBRYOSPENDING->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DAY OF TRANSFER
        if (!$this->isAddOrEdit() && $this->DAYOFTRANSFER->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DAYOFTRANSFER->AdvancedSearch->SearchValue != "" || $this->DAYOFTRANSFER->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // H/D sperm
        if (!$this->isAddOrEdit() && $this->HDsperm->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HDsperm->AdvancedSearch->SearchValue != "" || $this->HDsperm->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Comments
        if (!$this->isAddOrEdit() && $this->Comments->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Comments->AdvancedSearch->SearchValue != "" || $this->Comments->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // sc progesterone
        if (!$this->isAddOrEdit() && $this->scprogesterone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->scprogesterone->AdvancedSearch->SearchValue != "" || $this->scprogesterone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Natural micronised 400mg bd + duphaston 10mg bd
        if (!$this->isAddOrEdit() && $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchValue != "" || $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CRINONE
        if (!$this->isAddOrEdit() && $this->CRINONE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CRINONE->AdvancedSearch->SearchValue != "" || $this->CRINONE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // progynova
        if (!$this->isAddOrEdit() && $this->progynova->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->progynova->AdvancedSearch->SearchValue != "" || $this->progynova->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Heparin
        if (!$this->isAddOrEdit() && $this->Heparin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Heparin->AdvancedSearch->SearchValue != "" || $this->Heparin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // cabergolin
        if (!$this->isAddOrEdit() && $this->cabergolin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->cabergolin->AdvancedSearch->SearchValue != "" || $this->cabergolin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Antagonist
        if (!$this->isAddOrEdit() && $this->Antagonist->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Antagonist->AdvancedSearch->SearchValue != "" || $this->Antagonist->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OHSS
        if (!$this->isAddOrEdit() && $this->OHSS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OHSS->AdvancedSearch->SearchValue != "" || $this->OHSS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Complications
        if (!$this->isAddOrEdit() && $this->Complications->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Complications->AdvancedSearch->SearchValue != "" || $this->Complications->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LP bleeding
        if (!$this->isAddOrEdit() && $this->LPbleeding->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LPbleeding->AdvancedSearch->SearchValue != "" || $this->LPbleeding->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ß-hCG
        if (!$this->isAddOrEdit() && $this->hCG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->hCG->AdvancedSearch->SearchValue != "" || $this->hCG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Implantation rate
        if (!$this->isAddOrEdit() && $this->Implantationrate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Implantationrate->AdvancedSearch->SearchValue != "" || $this->Implantationrate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Ectopic
        if (!$this->isAddOrEdit() && $this->Ectopic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Ectopic->AdvancedSearch->SearchValue != "" || $this->Ectopic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Type of preg
        if (!$this->isAddOrEdit() && $this->Typeofpreg->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Typeofpreg->AdvancedSearch->SearchValue != "" || $this->Typeofpreg->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANC
        if (!$this->isAddOrEdit() && $this->ANC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANC->AdvancedSearch->SearchValue != "" || $this->ANC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // anomalies
        if (!$this->isAddOrEdit() && $this->anomalies->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->anomalies->AdvancedSearch->SearchValue != "" || $this->anomalies->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // baby wt
        if (!$this->isAddOrEdit() && $this->babywt->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->babywt->AdvancedSearch->SearchValue != "" || $this->babywt->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GA at delivery
        if (!$this->isAddOrEdit() && $this->GAatdelivery->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GAatdelivery->AdvancedSearch->SearchValue != "" || $this->GAatdelivery->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Pregnancy outcome
        if (!$this->isAddOrEdit() && $this->Pregnancyoutcome->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Pregnancyoutcome->AdvancedSearch->SearchValue != "" || $this->Pregnancyoutcome->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // 1st FET
        if (!$this->isAddOrEdit() && $this->_1stFET->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->_1stFET->AdvancedSearch->SearchValue != "" || $this->_1stFET->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AFTER HYSTEROSCOPY
        if (!$this->isAddOrEdit() && $this->AFTERHYSTEROSCOPY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchValue != "" || $this->AFTERHYSTEROSCOPY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AFTER ERA
        if (!$this->isAddOrEdit() && $this->AFTERERA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AFTERERA->AdvancedSearch->SearchValue != "" || $this->AFTERERA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ERA
        if (!$this->isAddOrEdit() && $this->ERA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ERA->AdvancedSearch->SearchValue != "" || $this->ERA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HRT
        if (!$this->isAddOrEdit() && $this->HRT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HRT->AdvancedSearch->SearchValue != "" || $this->HRT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // XGRAST/PRP
        if (!$this->isAddOrEdit() && $this->XGRASTPRP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->XGRASTPRP->AdvancedSearch->SearchValue != "" || $this->XGRASTPRP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EMBRYO DETAILS DAY 3/ 5, A, B, C
        if (!$this->isAddOrEdit() && $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchValue != "" || $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LMWH 40MG
        if (!$this->isAddOrEdit() && $this->LMWH40MG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LMWH40MG->AdvancedSearch->SearchValue != "" || $this->LMWH40MG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ß-hCG2
        if (!$this->isAddOrEdit() && $this->hCG2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->hCG2->AdvancedSearch->SearchValue != "" || $this->hCG2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Implantation rate1
        if (!$this->isAddOrEdit() && $this->Implantationrate1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Implantationrate1->AdvancedSearch->SearchValue != "" || $this->Implantationrate1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Ectopic1
        if (!$this->isAddOrEdit() && $this->Ectopic1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Ectopic1->AdvancedSearch->SearchValue != "" || $this->Ectopic1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Type of pregA
        if (!$this->isAddOrEdit() && $this->TypeofpregA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TypeofpregA->AdvancedSearch->SearchValue != "" || $this->TypeofpregA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANC1
        if (!$this->isAddOrEdit() && $this->ANC1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANC1->AdvancedSearch->SearchValue != "" || $this->ANC1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // anomalies2
        if (!$this->isAddOrEdit() && $this->anomalies2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->anomalies2->AdvancedSearch->SearchValue != "" || $this->anomalies2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // baby wt2
        if (!$this->isAddOrEdit() && $this->babywt2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->babywt2->AdvancedSearch->SearchValue != "" || $this->babywt2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GA at delivery1
        if (!$this->isAddOrEdit() && $this->GAatdelivery1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GAatdelivery1->AdvancedSearch->SearchValue != "" || $this->GAatdelivery1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Pregnancy outcome1
        if (!$this->isAddOrEdit() && $this->Pregnancyoutcome1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Pregnancyoutcome1->AdvancedSearch->SearchValue != "" || $this->Pregnancyoutcome1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // 2ND FET
        if (!$this->isAddOrEdit() && $this->_2NDFET->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->_2NDFET->AdvancedSearch->SearchValue != "" || $this->_2NDFET->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AFTER HYSTEROSCOPY1
        if (!$this->isAddOrEdit() && $this->AFTERHYSTEROSCOPY1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchValue != "" || $this->AFTERHYSTEROSCOPY1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AFTER ERA1
        if (!$this->isAddOrEdit() && $this->AFTERERA1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AFTERERA1->AdvancedSearch->SearchValue != "" || $this->AFTERERA1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ERA1
        if (!$this->isAddOrEdit() && $this->ERA1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ERA1->AdvancedSearch->SearchValue != "" || $this->ERA1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HRT1
        if (!$this->isAddOrEdit() && $this->HRT1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HRT1->AdvancedSearch->SearchValue != "" || $this->HRT1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // XGRAST/PRP1
        if (!$this->isAddOrEdit() && $this->XGRASTPRP1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->XGRASTPRP1->AdvancedSearch->SearchValue != "" || $this->XGRASTPRP1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NUMBER OF EMBRYOS
        if (!$this->isAddOrEdit() && $this->NUMBEROFEMBRYOS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NUMBEROFEMBRYOS->AdvancedSearch->SearchValue != "" || $this->NUMBEROFEMBRYOS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C
        if (!$this->isAddOrEdit() && $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchValue != "" || $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // INTRALIPID AND BARGLOBIN
        if (!$this->isAddOrEdit() && $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchValue != "" || $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LMWH 40MG1
        if (!$this->isAddOrEdit() && $this->LMWH40MG1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LMWH40MG1->AdvancedSearch->SearchValue != "" || $this->LMWH40MG1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ß-hCG1
        if (!$this->isAddOrEdit() && $this->hCG1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->hCG1->AdvancedSearch->SearchValue != "" || $this->hCG1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Implantation rate2
        if (!$this->isAddOrEdit() && $this->Implantationrate2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Implantationrate2->AdvancedSearch->SearchValue != "" || $this->Implantationrate2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Ectopic2
        if (!$this->isAddOrEdit() && $this->Ectopic2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Ectopic2->AdvancedSearch->SearchValue != "" || $this->Ectopic2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Type of preg2
        if (!$this->isAddOrEdit() && $this->Typeofpreg2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Typeofpreg2->AdvancedSearch->SearchValue != "" || $this->Typeofpreg2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANCA
        if (!$this->isAddOrEdit() && $this->ANCA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANCA->AdvancedSearch->SearchValue != "" || $this->ANCA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // anomalies1
        if (!$this->isAddOrEdit() && $this->anomalies1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->anomalies1->AdvancedSearch->SearchValue != "" || $this->anomalies1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // baby wt1
        if (!$this->isAddOrEdit() && $this->babywt1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->babywt1->AdvancedSearch->SearchValue != "" || $this->babywt1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GA at delivery2
        if (!$this->isAddOrEdit() && $this->GAatdelivery2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GAatdelivery2->AdvancedSearch->SearchValue != "" || $this->GAatdelivery2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->Origin->setDbValue($row['Origin']);
        $this->MaleIndications->setDbValue($row['MaleIndications']);
        $this->FemaleIndications->setDbValue($row['FemaleIndications']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
        $this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
        $this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
        $this->RelevantHistory->setDbValue($row['RelevantHistory']);
        $this->IUICycles->setDbValue($row['IUICycles']);
        $this->AMH->setDbValue($row['AMH']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
        $this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
        $this->OPUDATE->setDbValue($row['OPUDATE']);
        $this->RFSH1->setDbValue($row['RFSH1']);
        $this->RFSH2->setDbValue($row['RFSH2']);
        $this->RFSH3->setDbValue($row['RFSH3']);
        $this->E21->setDbValue($row['E21']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Fweight->setDbValue($row['Fweight']);
        $this->AntiTPO->setDbValue($row['AntiTPO']);
        $this->AntiTG->setDbValue($row['AntiTG']);
        $this->PatientAge->setDbValue($row['PatientAge']);
        $this->PartnerAge->setDbValue($row['PartnerAge']);
        $this->CYCLES->setDbValue($row['CYCLES']);
        $this->MF->setDbValue($row['MF']);
        $this->CauseOfINFERTILITY->setDbValue($row['CauseOfINFERTILITY']);
        $this->SIS->setDbValue($row['SIS']);
        $this->Scratching->setDbValue($row['Scratching']);
        $this->Cannulation->setDbValue($row['Cannulation']);
        $this->MEPRATE->setDbValue($row['MEPRATE']);
        $this->ROVARY->setDbValue($row['R.OVARY']);
        $this->RAFC->setDbValue($row['R.AFC']);
        $this->LOVARY->setDbValue($row['L.OVARY']);
        $this->LAFC->setDbValue($row['L.AFC']);
        $this->LH1->setDbValue($row['LH1']);
        $this->E2->setDbValue($row['E2']);
        $this->StemCellInstallation->setDbValue($row['StemCellInstallation']);
        $this->DHEAS->setDbValue($row['DHEAS']);
        $this->Mtorr->setDbValue($row['Mtorr']);
        $this->AMH1->setDbValue($row['AMH1']);
        $this->LH->setDbValue($row['LH']);
        $this->BMIMALE->setDbValue($row['BMI(MALE)']);
        $this->MaleMedicalConditions->setDbValue($row['MaleMedicalConditions']);
        $this->MaleExamination->setDbValue($row['MaleExamination']);
        $this->SpermConcentration->setDbValue($row['SpermConcentration']);
        $this->SpermMotilityPNP->setDbValue($row['SpermMotility(P&NP)']);
        $this->SpermMorphology->setDbValue($row['SpermMorphology']);
        $this->SpermRetrival->setDbValue($row['SpermRetrival']);
        $this->MTestosterone->setDbValue($row['M.Testosterone']);
        $this->DFI->setDbValue($row['DFI']);
        $this->PreRX->setDbValue($row['PreRX']);
        $this->CC100->setDbValue($row['CC 100']);
        $this->RFSH1A->setDbValue($row['RFSH1A']);
        $this->HMG1->setDbValue($row['HMG1']);
        $this->RLH->setDbValue($row['RLH']);
        $this->HMG_HP->setDbValue($row['HMG_HP']);
        $this->day_of_HMG->setDbValue($row['day_of_HMG']);
        $this->Reason_for_HMG->setDbValue($row['Reason_for_HMG']);
        $this->RLH_day->setDbValue($row['RLH_day']);
        $this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
        $this->AnychangeinbetweenDoseaddedday->setDbValue($row['Any change inbetween ( Dose added , day)']);
        $this->dayofAnta->setDbValue($row['day of Anta']);
        $this->RFSHTD->setDbValue($row['R FSH TD']);
        $this->RFSHHMGTD->setDbValue($row['R FSH + HMG TD']);
        $this->RFSHRLHTD->setDbValue($row['R FSH + R LH TD']);
        $this->HMGTD->setDbValue($row['HMG TD']);
        $this->LHTD->setDbValue($row['LH TD']);
        $this->D1LH->setDbValue($row['D1 LH']);
        $this->D1E2->setDbValue($row['D1 E2']);
        $this->TriggerdayE2->setDbValue($row['Trigger day E2']);
        $this->TriggerdayP4->setDbValue($row['Trigger day P4']);
        $this->TriggerdayLH->setDbValue($row['Trigger day LH']);
        $this->VITD->setDbValue($row['VIT-D']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->BHCGBEFORERETRIEVAL->setDbValue($row['BHCG BEFORE RETRIEVAL']);
        $this->LH12HRS->setDbValue($row['LH -12 HRS']);
        $this->P412HRS->setDbValue($row['P4 -12 HRS']);
        $this->ETonhCGday->setDbValue($row['ET on hCG day']);
        $this->ETdoppler->setDbValue($row['ET doppler']);
        $this->VIFIVFI->setDbValue($row['VI/FI/VFI']);
        $this->Endometrialabnormality->setDbValue($row['Endometrial abnormality']);
        $this->AFCONS1->setDbValue($row['AFC ON S1']);
        $this->TIMEOFOPUFROMTRIGGER->setDbValue($row['TIME OF OPU FROM TRIGGER']);
        $this->SPERMTYPE->setDbValue($row['SPERM TYPE']);
        $this->EXPECTEDONTRIGGERDAY->setDbValue($row['EXPECTED ON TRIGGER DAY']);
        $this->OOCYTESRETRIEVED->setDbValue($row['OOCYTES RETRIEVED']);
        $this->TIMEOFDENUDATION->setDbValue($row['TIME OF DENUDATION']);
        $this->MII->setDbValue($row['M-II']);
        $this->MI->setDbValue($row['MI']);
        $this->GV->setDbValue($row['GV']);
        $this->ICSITIMEFORMOPU->setDbValue($row['ICSI TIME FORM OPU']);
        $this->FERT2PN->setDbValue($row['FERT ( 2 PN )']);
        $this->DEG->setDbValue($row['DEG']);
        $this->D3GRADEA->setDbValue($row['D3 GRADE A']);
        $this->D3GRADEB->setDbValue($row['D3 GRADE B']);
        $this->D3GRADEC->setDbValue($row['D3 GRADE C']);
        $this->D3GRADED->setDbValue($row['D3 GRADE D']);
        $this->USABLEONDAY3ET->setDbValue($row['USABLE ON DAY 3 ET']);
        $this->USABLEONday3FREEZING->setDbValue($row['USABLE ON day 3 FREEZING']);
        $this->D5GARDEA->setDbValue($row['D5 GARDE A']);
        $this->D5GRADEB->setDbValue($row['D5 GRADE B']);
        $this->D5GRADEC->setDbValue($row['D5 GRADE C']);
        $this->D5GRADED->setDbValue($row['D5 GRADE D']);
        $this->USABLEOND5ET->setDbValue($row['USABLE ON D5 ET']);
        $this->USABLEOND5FREEZING->setDbValue($row['USABLE ON D5 FREEZING']);
        $this->D6GRADEA->setDbValue($row['D6 GRADE A']);
        $this->D6GRADEB->setDbValue($row['D6 GRADE B']);
        $this->D6GRADEC->setDbValue($row['D6 GRADE C']);
        $this->D6GRADED->setDbValue($row['D6 GRADE D']);
        $this->D6USABLEEMBRYOET->setDbValue($row['D6 USABLE EMBRYO ET']);
        $this->D6USABLEFREEZING->setDbValue($row['D6 USABLE FREEZING']);
        $this->TOTALBLAST->setDbValue($row['TOTAL BLAST']);
        $this->PGS->setDbValue($row['PGS']);
        $this->REMARKS->setDbValue($row['REMARKS']);
        $this->PUDB->setDbValue($row['PU - D/B']);
        $this->ICSIDB->setDbValue($row['ICSI D/B']);
        $this->VITDB->setDbValue($row['VIT D/B']);
        $this->ETDB->setDbValue($row['ET D/B']);
        $this->LABCOMMENTS->setDbValue($row['LAB COMMENTS']);
        $this->ReasonfornoFRESHtransfer->setDbValue($row['Reason for no FRESH transfer']);
        $this->NoofembryostransferredDay35ABC->setDbValue($row['No of embryos transferred Day 3/5, A,B,C']);
        $this->EMBRYOSPENDING->setDbValue($row['EMBRYOS PENDING']);
        $this->DAYOFTRANSFER->setDbValue($row['DAY OF TRANSFER']);
        $this->HDsperm->setDbValue($row['H/D sperm']);
        $this->Comments->setDbValue($row['Comments']);
        $this->scprogesterone->setDbValue($row['sc progesterone']);
        $this->Naturalmicronised400mgbdduphaston10mgbd->setDbValue($row['Natural micronised 400mg bd + duphaston 10mg bd']);
        $this->CRINONE->setDbValue($row['CRINONE']);
        $this->progynova->setDbValue($row['progynova']);
        $this->Heparin->setDbValue($row['Heparin']);
        $this->cabergolin->setDbValue($row['cabergolin']);
        $this->Antagonist->setDbValue($row['Antagonist']);
        $this->OHSS->setDbValue($row['OHSS']);
        $this->Complications->setDbValue($row['Complications']);
        $this->LPbleeding->setDbValue($row['LP bleeding']);
        $this->hCG->setDbValue($row['ß-hCG']);
        $this->Implantationrate->setDbValue($row['Implantation rate']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Typeofpreg->setDbValue($row['Type of preg']);
        $this->ANC->setDbValue($row['ANC']);
        $this->anomalies->setDbValue($row['anomalies']);
        $this->babywt->setDbValue($row['baby wt']);
        $this->GAatdelivery->setDbValue($row['GA at delivery']);
        $this->Pregnancyoutcome->setDbValue($row['Pregnancy outcome']);
        $this->_1stFET->setDbValue($row['1st FET']);
        $this->AFTERHYSTEROSCOPY->setDbValue($row['AFTER HYSTEROSCOPY']);
        $this->AFTERERA->setDbValue($row['AFTER ERA']);
        $this->ERA->setDbValue($row['ERA']);
        $this->HRT->setDbValue($row['HRT']);
        $this->XGRASTPRP->setDbValue($row['XGRAST/PRP']);
        $this->EMBRYODETAILSDAY35ABC->setDbValue($row['EMBRYO DETAILS DAY 3/ 5, A, B, C']);
        $this->LMWH40MG->setDbValue($row['LMWH 40MG']);
        $this->hCG2->setDbValue($row['ß-hCG2']);
        $this->Implantationrate1->setDbValue($row['Implantation rate1']);
        $this->Ectopic1->setDbValue($row['Ectopic1']);
        $this->TypeofpregA->setDbValue($row['Type of pregA']);
        $this->ANC1->setDbValue($row['ANC1']);
        $this->anomalies2->setDbValue($row['anomalies2']);
        $this->babywt2->setDbValue($row['baby wt2']);
        $this->GAatdelivery1->setDbValue($row['GA at delivery1']);
        $this->Pregnancyoutcome1->setDbValue($row['Pregnancy outcome1']);
        $this->_2NDFET->setDbValue($row['2ND FET']);
        $this->AFTERHYSTEROSCOPY1->setDbValue($row['AFTER HYSTEROSCOPY1']);
        $this->AFTERERA1->setDbValue($row['AFTER ERA1']);
        $this->ERA1->setDbValue($row['ERA1']);
        $this->HRT1->setDbValue($row['HRT1']);
        $this->XGRASTPRP1->setDbValue($row['XGRAST/PRP1']);
        $this->NUMBEROFEMBRYOS->setDbValue($row['NUMBER OF EMBRYOS']);
        $this->EMBRYODETAILSDAY356ABC->setDbValue($row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C']);
        $this->INTRALIPIDANDBARGLOBIN->setDbValue($row['INTRALIPID AND BARGLOBIN']);
        $this->LMWH40MG1->setDbValue($row['LMWH 40MG1']);
        $this->hCG1->setDbValue($row['ß-hCG1']);
        $this->Implantationrate2->setDbValue($row['Implantation rate2']);
        $this->Ectopic2->setDbValue($row['Ectopic2']);
        $this->Typeofpreg2->setDbValue($row['Type of preg2']);
        $this->ANCA->setDbValue($row['ANCA']);
        $this->anomalies1->setDbValue($row['anomalies1']);
        $this->babywt1->setDbValue($row['baby wt1']);
        $this->GAatdelivery2->setDbValue($row['GA at delivery2']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Treatment'] = null;
        $row['Origin'] = null;
        $row['MaleIndications'] = null;
        $row['FemaleIndications'] = null;
        $row['PatientName'] = null;
        $row['PatientID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerID'] = null;
        $row['A4ICSICycle'] = null;
        $row['TotalICSICycle'] = null;
        $row['TypeOfInfertility'] = null;
        $row['RelevantHistory'] = null;
        $row['IUICycles'] = null;
        $row['AMH'] = null;
        $row['FBMI'] = null;
        $row['ANTAGONISTSTARTDAY'] = null;
        $row['OvarianSurgery'] = null;
        $row['OPUDATE'] = null;
        $row['RFSH1'] = null;
        $row['RFSH2'] = null;
        $row['RFSH3'] = null;
        $row['E21'] = null;
        $row['Hysteroscopy'] = null;
        $row['HospID'] = null;
        $row['Fweight'] = null;
        $row['AntiTPO'] = null;
        $row['AntiTG'] = null;
        $row['PatientAge'] = null;
        $row['PartnerAge'] = null;
        $row['CYCLES'] = null;
        $row['MF'] = null;
        $row['CauseOfINFERTILITY'] = null;
        $row['SIS'] = null;
        $row['Scratching'] = null;
        $row['Cannulation'] = null;
        $row['MEPRATE'] = null;
        $row['R.OVARY'] = null;
        $row['R.AFC'] = null;
        $row['L.OVARY'] = null;
        $row['L.AFC'] = null;
        $row['LH1'] = null;
        $row['E2'] = null;
        $row['StemCellInstallation'] = null;
        $row['DHEAS'] = null;
        $row['Mtorr'] = null;
        $row['AMH1'] = null;
        $row['LH'] = null;
        $row['BMI(MALE)'] = null;
        $row['MaleMedicalConditions'] = null;
        $row['MaleExamination'] = null;
        $row['SpermConcentration'] = null;
        $row['SpermMotility(P&NP)'] = null;
        $row['SpermMorphology'] = null;
        $row['SpermRetrival'] = null;
        $row['M.Testosterone'] = null;
        $row['DFI'] = null;
        $row['PreRX'] = null;
        $row['CC 100'] = null;
        $row['RFSH1A'] = null;
        $row['HMG1'] = null;
        $row['RLH'] = null;
        $row['HMG_HP'] = null;
        $row['day_of_HMG'] = null;
        $row['Reason_for_HMG'] = null;
        $row['RLH_day'] = null;
        $row['DAYSOFSTIMULATION'] = null;
        $row['Any change inbetween ( Dose added , day)'] = null;
        $row['day of Anta'] = null;
        $row['R FSH TD'] = null;
        $row['R FSH + HMG TD'] = null;
        $row['R FSH + R LH TD'] = null;
        $row['HMG TD'] = null;
        $row['LH TD'] = null;
        $row['D1 LH'] = null;
        $row['D1 E2'] = null;
        $row['Trigger day E2'] = null;
        $row['Trigger day P4'] = null;
        $row['Trigger day LH'] = null;
        $row['VIT-D'] = null;
        $row['TRIGGERR'] = null;
        $row['BHCG BEFORE RETRIEVAL'] = null;
        $row['LH -12 HRS'] = null;
        $row['P4 -12 HRS'] = null;
        $row['ET on hCG day'] = null;
        $row['ET doppler'] = null;
        $row['VI/FI/VFI'] = null;
        $row['Endometrial abnormality'] = null;
        $row['AFC ON S1'] = null;
        $row['TIME OF OPU FROM TRIGGER'] = null;
        $row['SPERM TYPE'] = null;
        $row['EXPECTED ON TRIGGER DAY'] = null;
        $row['OOCYTES RETRIEVED'] = null;
        $row['TIME OF DENUDATION'] = null;
        $row['M-II'] = null;
        $row['MI'] = null;
        $row['GV'] = null;
        $row['ICSI TIME FORM OPU'] = null;
        $row['FERT ( 2 PN )'] = null;
        $row['DEG'] = null;
        $row['D3 GRADE A'] = null;
        $row['D3 GRADE B'] = null;
        $row['D3 GRADE C'] = null;
        $row['D3 GRADE D'] = null;
        $row['USABLE ON DAY 3 ET'] = null;
        $row['USABLE ON day 3 FREEZING'] = null;
        $row['D5 GARDE A'] = null;
        $row['D5 GRADE B'] = null;
        $row['D5 GRADE C'] = null;
        $row['D5 GRADE D'] = null;
        $row['USABLE ON D5 ET'] = null;
        $row['USABLE ON D5 FREEZING'] = null;
        $row['D6 GRADE A'] = null;
        $row['D6 GRADE B'] = null;
        $row['D6 GRADE C'] = null;
        $row['D6 GRADE D'] = null;
        $row['D6 USABLE EMBRYO ET'] = null;
        $row['D6 USABLE FREEZING'] = null;
        $row['TOTAL BLAST'] = null;
        $row['PGS'] = null;
        $row['REMARKS'] = null;
        $row['PU - D/B'] = null;
        $row['ICSI D/B'] = null;
        $row['VIT D/B'] = null;
        $row['ET D/B'] = null;
        $row['LAB COMMENTS'] = null;
        $row['Reason for no FRESH transfer'] = null;
        $row['No of embryos transferred Day 3/5, A,B,C'] = null;
        $row['EMBRYOS PENDING'] = null;
        $row['DAY OF TRANSFER'] = null;
        $row['H/D sperm'] = null;
        $row['Comments'] = null;
        $row['sc progesterone'] = null;
        $row['Natural micronised 400mg bd + duphaston 10mg bd'] = null;
        $row['CRINONE'] = null;
        $row['progynova'] = null;
        $row['Heparin'] = null;
        $row['cabergolin'] = null;
        $row['Antagonist'] = null;
        $row['OHSS'] = null;
        $row['Complications'] = null;
        $row['LP bleeding'] = null;
        $row['ß-hCG'] = null;
        $row['Implantation rate'] = null;
        $row['Ectopic'] = null;
        $row['Type of preg'] = null;
        $row['ANC'] = null;
        $row['anomalies'] = null;
        $row['baby wt'] = null;
        $row['GA at delivery'] = null;
        $row['Pregnancy outcome'] = null;
        $row['1st FET'] = null;
        $row['AFTER HYSTEROSCOPY'] = null;
        $row['AFTER ERA'] = null;
        $row['ERA'] = null;
        $row['HRT'] = null;
        $row['XGRAST/PRP'] = null;
        $row['EMBRYO DETAILS DAY 3/ 5, A, B, C'] = null;
        $row['LMWH 40MG'] = null;
        $row['ß-hCG2'] = null;
        $row['Implantation rate1'] = null;
        $row['Ectopic1'] = null;
        $row['Type of pregA'] = null;
        $row['ANC1'] = null;
        $row['anomalies2'] = null;
        $row['baby wt2'] = null;
        $row['GA at delivery1'] = null;
        $row['Pregnancy outcome1'] = null;
        $row['2ND FET'] = null;
        $row['AFTER HYSTEROSCOPY1'] = null;
        $row['AFTER ERA1'] = null;
        $row['ERA1'] = null;
        $row['HRT1'] = null;
        $row['XGRAST/PRP1'] = null;
        $row['NUMBER OF EMBRYOS'] = null;
        $row['EMBRYO DETAILS DAY 3/ 5,/6 A, B, C'] = null;
        $row['INTRALIPID AND BARGLOBIN'] = null;
        $row['LMWH 40MG1'] = null;
        $row['ß-hCG1'] = null;
        $row['Implantation rate2'] = null;
        $row['Ectopic2'] = null;
        $row['Type of preg2'] = null;
        $row['ANCA'] = null;
        $row['anomalies1'] = null;
        $row['baby wt1'] = null;
        $row['GA at delivery2'] = null;
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

        // RIDNO

        // Treatment

        // Origin

        // MaleIndications

        // FemaleIndications

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // A4ICSICycle

        // TotalICSICycle

        // TypeOfInfertility

        // RelevantHistory

        // IUICycles

        // AMH

        // FBMI

        // ANTAGONISTSTARTDAY

        // OvarianSurgery

        // OPUDATE

        // RFSH1

        // RFSH2

        // RFSH3

        // E21

        // Hysteroscopy

        // HospID

        // Fweight

        // AntiTPO

        // AntiTG

        // PatientAge

        // PartnerAge

        // CYCLES

        // MF

        // CauseOfINFERTILITY

        // SIS

        // Scratching

        // Cannulation

        // MEPRATE

        // R.OVARY

        // R.AFC

        // L.OVARY

        // L.AFC

        // LH1

        // E2

        // StemCellInstallation

        // DHEAS

        // Mtorr

        // AMH1

        // LH

        // BMI(MALE)

        // MaleMedicalConditions

        // MaleExamination

        // SpermConcentration

        // SpermMotility(P&NP)

        // SpermMorphology

        // SpermRetrival

        // M.Testosterone

        // DFI

        // PreRX

        // CC 100

        // RFSH1A

        // HMG1

        // RLH

        // HMG_HP

        // day_of_HMG

        // Reason_for_HMG

        // RLH_day

        // DAYSOFSTIMULATION

        // Any change inbetween ( Dose added , day)

        // day of Anta

        // R FSH TD

        // R FSH + HMG TD

        // R FSH + R LH TD

        // HMG TD

        // LH TD

        // D1 LH

        // D1 E2

        // Trigger day E2

        // Trigger day P4

        // Trigger day LH

        // VIT-D

        // TRIGGERR

        // BHCG BEFORE RETRIEVAL

        // LH -12 HRS

        // P4 -12 HRS

        // ET on hCG day

        // ET doppler

        // VI/FI/VFI

        // Endometrial abnormality

        // AFC ON S1

        // TIME OF OPU FROM TRIGGER

        // SPERM TYPE

        // EXPECTED ON TRIGGER DAY

        // OOCYTES RETRIEVED

        // TIME OF DENUDATION

        // M-II

        // MI

        // GV

        // ICSI TIME FORM OPU

        // FERT ( 2 PN )

        // DEG

        // D3 GRADE A

        // D3 GRADE B

        // D3 GRADE C

        // D3 GRADE D

        // USABLE ON DAY 3 ET

        // USABLE ON day 3 FREEZING

        // D5 GARDE A

        // D5 GRADE B

        // D5 GRADE C

        // D5 GRADE D

        // USABLE ON D5 ET

        // USABLE ON D5 FREEZING

        // D6 GRADE A

        // D6 GRADE B

        // D6 GRADE C

        // D6 GRADE D

        // D6 USABLE EMBRYO ET

        // D6 USABLE FREEZING

        // TOTAL BLAST

        // PGS

        // REMARKS

        // PU - D/B

        // ICSI D/B

        // VIT D/B

        // ET D/B

        // LAB COMMENTS

        // Reason for no FRESH transfer

        // No of embryos transferred Day 3/5, A,B,C

        // EMBRYOS PENDING

        // DAY OF TRANSFER

        // H/D sperm

        // Comments

        // sc progesterone

        // Natural micronised 400mg bd + duphaston 10mg bd

        // CRINONE

        // progynova

        // Heparin

        // cabergolin

        // Antagonist

        // OHSS

        // Complications

        // LP bleeding

        // ß-hCG

        // Implantation rate

        // Ectopic

        // Type of preg

        // ANC

        // anomalies

        // baby wt

        // GA at delivery

        // Pregnancy outcome

        // 1st FET

        // AFTER HYSTEROSCOPY

        // AFTER ERA

        // ERA

        // HRT

        // XGRAST/PRP

        // EMBRYO DETAILS DAY 3/ 5, A, B, C

        // LMWH 40MG

        // ß-hCG2

        // Implantation rate1

        // Ectopic1

        // Type of pregA

        // ANC1

        // anomalies2

        // baby wt2

        // GA at delivery1

        // Pregnancy outcome1

        // 2ND FET

        // AFTER HYSTEROSCOPY1

        // AFTER ERA1

        // ERA1

        // HRT1

        // XGRAST/PRP1

        // NUMBER OF EMBRYOS

        // EMBRYO DETAILS DAY 3/ 5,/6 A, B, C

        // INTRALIPID AND BARGLOBIN

        // LMWH 40MG1

        // ß-hCG1

        // Implantation rate2

        // Ectopic2

        // Type of preg2

        // ANCA

        // anomalies1

        // baby wt1

        // GA at delivery2
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // Origin
            $this->Origin->ViewValue = $this->Origin->CurrentValue;
            $this->Origin->ViewCustomAttributes = "";

            // MaleIndications
            $this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
            $this->MaleIndications->ViewCustomAttributes = "";

            // FemaleIndications
            $this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
            $this->FemaleIndications->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // A4ICSICycle
            $this->A4ICSICycle->ViewValue = $this->A4ICSICycle->CurrentValue;
            $this->A4ICSICycle->ViewCustomAttributes = "";

            // TotalICSICycle
            $this->TotalICSICycle->ViewValue = $this->TotalICSICycle->CurrentValue;
            $this->TotalICSICycle->ViewCustomAttributes = "";

            // TypeOfInfertility
            $this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->CurrentValue;
            $this->TypeOfInfertility->ViewCustomAttributes = "";

            // RelevantHistory
            $this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
            $this->RelevantHistory->ViewCustomAttributes = "";

            // IUICycles
            $this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
            $this->IUICycles->ViewCustomAttributes = "";

            // AMH
            $this->AMH->ViewValue = $this->AMH->CurrentValue;
            $this->AMH->ViewCustomAttributes = "";

            // FBMI
            $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
            $this->FBMI->ViewCustomAttributes = "";

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->CurrentValue;
            $this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

            // OvarianSurgery
            $this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
            $this->OvarianSurgery->ViewCustomAttributes = "";

            // OPUDATE
            $this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
            $this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 0);
            $this->OPUDATE->ViewCustomAttributes = "";

            // RFSH1
            $this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
            $this->RFSH1->ViewCustomAttributes = "";

            // RFSH2
            $this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
            $this->RFSH2->ViewCustomAttributes = "";

            // RFSH3
            $this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
            $this->RFSH3->ViewCustomAttributes = "";

            // E21
            $this->E21->ViewValue = $this->E21->CurrentValue;
            $this->E21->ViewCustomAttributes = "";

            // Hysteroscopy
            $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
            $this->Hysteroscopy->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Fweight
            $this->Fweight->ViewValue = $this->Fweight->CurrentValue;
            $this->Fweight->ViewCustomAttributes = "";

            // AntiTPO
            $this->AntiTPO->ViewValue = $this->AntiTPO->CurrentValue;
            $this->AntiTPO->ViewCustomAttributes = "";

            // AntiTG
            $this->AntiTG->ViewValue = $this->AntiTG->CurrentValue;
            $this->AntiTG->ViewCustomAttributes = "";

            // PatientAge
            $this->PatientAge->ViewValue = $this->PatientAge->CurrentValue;
            $this->PatientAge->ViewCustomAttributes = "";

            // PartnerAge
            $this->PartnerAge->ViewValue = $this->PartnerAge->CurrentValue;
            $this->PartnerAge->ViewCustomAttributes = "";

            // R.OVARY
            $this->ROVARY->ViewValue = $this->ROVARY->CurrentValue;
            $this->ROVARY->ViewCustomAttributes = "";

            // R.AFC
            $this->RAFC->ViewValue = $this->RAFC->CurrentValue;
            $this->RAFC->ViewCustomAttributes = "";

            // L.OVARY
            $this->LOVARY->ViewValue = $this->LOVARY->CurrentValue;
            $this->LOVARY->ViewCustomAttributes = "";

            // L.AFC
            $this->LAFC->ViewValue = $this->LAFC->CurrentValue;
            $this->LAFC->ViewCustomAttributes = "";

            // E2
            $this->E2->ViewValue = $this->E2->CurrentValue;
            $this->E2->ViewCustomAttributes = "";

            // AMH1
            $this->AMH1->ViewValue = $this->AMH1->CurrentValue;
            $this->AMH1->ViewCustomAttributes = "";

            // BMI(MALE)
            $this->BMIMALE->ViewValue = $this->BMIMALE->CurrentValue;
            $this->BMIMALE->ViewCustomAttributes = "";

            // MaleMedicalConditions
            $this->MaleMedicalConditions->ViewValue = $this->MaleMedicalConditions->CurrentValue;
            $this->MaleMedicalConditions->ViewCustomAttributes = "";

            // CC 100
            $this->CC100->ViewValue = $this->CC100->CurrentValue;
            $this->CC100->ViewCustomAttributes = "";

            // RFSH1A
            $this->RFSH1A->ViewValue = $this->RFSH1A->CurrentValue;
            $this->RFSH1A->ViewCustomAttributes = "";

            // HMG1
            $this->HMG1->ViewValue = $this->HMG1->CurrentValue;
            $this->HMG1->ViewCustomAttributes = "";

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
            $this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

            // TRIGGERR
            $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
            $this->TRIGGERR->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";

            // MaleIndications
            $this->MaleIndications->LinkCustomAttributes = "";
            $this->MaleIndications->HrefValue = "";
            $this->MaleIndications->TooltipValue = "";

            // FemaleIndications
            $this->FemaleIndications->LinkCustomAttributes = "";
            $this->FemaleIndications->HrefValue = "";
            $this->FemaleIndications->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // A4ICSICycle
            $this->A4ICSICycle->LinkCustomAttributes = "";
            $this->A4ICSICycle->HrefValue = "";
            $this->A4ICSICycle->TooltipValue = "";

            // TotalICSICycle
            $this->TotalICSICycle->LinkCustomAttributes = "";
            $this->TotalICSICycle->HrefValue = "";
            $this->TotalICSICycle->TooltipValue = "";

            // TypeOfInfertility
            $this->TypeOfInfertility->LinkCustomAttributes = "";
            $this->TypeOfInfertility->HrefValue = "";
            $this->TypeOfInfertility->TooltipValue = "";

            // RelevantHistory
            $this->RelevantHistory->LinkCustomAttributes = "";
            $this->RelevantHistory->HrefValue = "";
            $this->RelevantHistory->TooltipValue = "";

            // IUICycles
            $this->IUICycles->LinkCustomAttributes = "";
            $this->IUICycles->HrefValue = "";
            $this->IUICycles->TooltipValue = "";

            // AMH
            $this->AMH->LinkCustomAttributes = "";
            $this->AMH->HrefValue = "";
            $this->AMH->TooltipValue = "";

            // FBMI
            $this->FBMI->LinkCustomAttributes = "";
            $this->FBMI->HrefValue = "";
            $this->FBMI->TooltipValue = "";

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
            $this->ANTAGONISTSTARTDAY->HrefValue = "";
            $this->ANTAGONISTSTARTDAY->TooltipValue = "";

            // OvarianSurgery
            $this->OvarianSurgery->LinkCustomAttributes = "";
            $this->OvarianSurgery->HrefValue = "";
            $this->OvarianSurgery->TooltipValue = "";

            // OPUDATE
            $this->OPUDATE->LinkCustomAttributes = "";
            $this->OPUDATE->HrefValue = "";
            $this->OPUDATE->TooltipValue = "";

            // RFSH1
            $this->RFSH1->LinkCustomAttributes = "";
            $this->RFSH1->HrefValue = "";
            $this->RFSH1->TooltipValue = "";

            // RFSH2
            $this->RFSH2->LinkCustomAttributes = "";
            $this->RFSH2->HrefValue = "";
            $this->RFSH2->TooltipValue = "";

            // RFSH3
            $this->RFSH3->LinkCustomAttributes = "";
            $this->RFSH3->HrefValue = "";
            $this->RFSH3->TooltipValue = "";

            // E21
            $this->E21->LinkCustomAttributes = "";
            $this->E21->HrefValue = "";
            $this->E21->TooltipValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";
            $this->Hysteroscopy->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Fweight
            $this->Fweight->LinkCustomAttributes = "";
            $this->Fweight->HrefValue = "";
            $this->Fweight->TooltipValue = "";

            // AntiTPO
            $this->AntiTPO->LinkCustomAttributes = "";
            $this->AntiTPO->HrefValue = "";
            $this->AntiTPO->TooltipValue = "";

            // AntiTG
            $this->AntiTG->LinkCustomAttributes = "";
            $this->AntiTG->HrefValue = "";
            $this->AntiTG->TooltipValue = "";

            // PatientAge
            $this->PatientAge->LinkCustomAttributes = "";
            $this->PatientAge->HrefValue = "";
            $this->PatientAge->TooltipValue = "";

            // PartnerAge
            $this->PartnerAge->LinkCustomAttributes = "";
            $this->PartnerAge->HrefValue = "";
            $this->PartnerAge->TooltipValue = "";

            // R.OVARY
            $this->ROVARY->LinkCustomAttributes = "";
            $this->ROVARY->HrefValue = "";
            $this->ROVARY->TooltipValue = "";

            // R.AFC
            $this->RAFC->LinkCustomAttributes = "";
            $this->RAFC->HrefValue = "";
            $this->RAFC->TooltipValue = "";

            // L.OVARY
            $this->LOVARY->LinkCustomAttributes = "";
            $this->LOVARY->HrefValue = "";
            $this->LOVARY->TooltipValue = "";

            // L.AFC
            $this->LAFC->LinkCustomAttributes = "";
            $this->LAFC->HrefValue = "";
            $this->LAFC->TooltipValue = "";

            // E2
            $this->E2->LinkCustomAttributes = "";
            $this->E2->HrefValue = "";
            $this->E2->TooltipValue = "";

            // AMH1
            $this->AMH1->LinkCustomAttributes = "";
            $this->AMH1->HrefValue = "";
            $this->AMH1->TooltipValue = "";

            // BMI(MALE)
            $this->BMIMALE->LinkCustomAttributes = "";
            $this->BMIMALE->HrefValue = "";
            $this->BMIMALE->TooltipValue = "";

            // MaleMedicalConditions
            $this->MaleMedicalConditions->LinkCustomAttributes = "";
            $this->MaleMedicalConditions->HrefValue = "";
            $this->MaleMedicalConditions->TooltipValue = "";

            // CC 100
            $this->CC100->LinkCustomAttributes = "";
            $this->CC100->HrefValue = "";
            $this->CC100->TooltipValue = "";

            // RFSH1A
            $this->RFSH1A->LinkCustomAttributes = "";
            $this->RFSH1A->HrefValue = "";
            $this->RFSH1A->TooltipValue = "";

            // HMG1
            $this->HMG1->LinkCustomAttributes = "";
            $this->HMG1->HrefValue = "";
            $this->HMG1->TooltipValue = "";

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
            $this->DAYSOFSTIMULATION->HrefValue = "";
            $this->DAYSOFSTIMULATION->TooltipValue = "";

            // TRIGGERR
            $this->TRIGGERR->LinkCustomAttributes = "";
            $this->TRIGGERR->HrefValue = "";
            $this->TRIGGERR->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->AdvancedSearch->SearchValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // Treatment
            $this->Treatment->EditAttrs["class"] = "form-control";
            $this->Treatment->EditCustomAttributes = "";
            if (!$this->Treatment->Raw) {
                $this->Treatment->AdvancedSearch->SearchValue = HtmlDecode($this->Treatment->AdvancedSearch->SearchValue);
            }
            $this->Treatment->EditValue = HtmlEncode($this->Treatment->AdvancedSearch->SearchValue);
            $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

            // Origin
            $this->Origin->EditAttrs["class"] = "form-control";
            $this->Origin->EditCustomAttributes = "";
            if (!$this->Origin->Raw) {
                $this->Origin->AdvancedSearch->SearchValue = HtmlDecode($this->Origin->AdvancedSearch->SearchValue);
            }
            $this->Origin->EditValue = HtmlEncode($this->Origin->AdvancedSearch->SearchValue);
            $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

            // MaleIndications
            $this->MaleIndications->EditAttrs["class"] = "form-control";
            $this->MaleIndications->EditCustomAttributes = "";
            if (!$this->MaleIndications->Raw) {
                $this->MaleIndications->AdvancedSearch->SearchValue = HtmlDecode($this->MaleIndications->AdvancedSearch->SearchValue);
            }
            $this->MaleIndications->EditValue = HtmlEncode($this->MaleIndications->AdvancedSearch->SearchValue);
            $this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

            // FemaleIndications
            $this->FemaleIndications->EditAttrs["class"] = "form-control";
            $this->FemaleIndications->EditCustomAttributes = "";
            if (!$this->FemaleIndications->Raw) {
                $this->FemaleIndications->AdvancedSearch->SearchValue = HtmlDecode($this->FemaleIndications->AdvancedSearch->SearchValue);
            }
            $this->FemaleIndications->EditValue = HtmlEncode($this->FemaleIndications->AdvancedSearch->SearchValue);
            $this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerID->AdvancedSearch->SearchValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->AdvancedSearch->SearchValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // A4ICSICycle
            $this->A4ICSICycle->EditAttrs["class"] = "form-control";
            $this->A4ICSICycle->EditCustomAttributes = "";
            if (!$this->A4ICSICycle->Raw) {
                $this->A4ICSICycle->AdvancedSearch->SearchValue = HtmlDecode($this->A4ICSICycle->AdvancedSearch->SearchValue);
            }
            $this->A4ICSICycle->EditValue = HtmlEncode($this->A4ICSICycle->AdvancedSearch->SearchValue);
            $this->A4ICSICycle->PlaceHolder = RemoveHtml($this->A4ICSICycle->caption());

            // TotalICSICycle
            $this->TotalICSICycle->EditAttrs["class"] = "form-control";
            $this->TotalICSICycle->EditCustomAttributes = "";
            if (!$this->TotalICSICycle->Raw) {
                $this->TotalICSICycle->AdvancedSearch->SearchValue = HtmlDecode($this->TotalICSICycle->AdvancedSearch->SearchValue);
            }
            $this->TotalICSICycle->EditValue = HtmlEncode($this->TotalICSICycle->AdvancedSearch->SearchValue);
            $this->TotalICSICycle->PlaceHolder = RemoveHtml($this->TotalICSICycle->caption());

            // TypeOfInfertility
            $this->TypeOfInfertility->EditAttrs["class"] = "form-control";
            $this->TypeOfInfertility->EditCustomAttributes = "";
            if (!$this->TypeOfInfertility->Raw) {
                $this->TypeOfInfertility->AdvancedSearch->SearchValue = HtmlDecode($this->TypeOfInfertility->AdvancedSearch->SearchValue);
            }
            $this->TypeOfInfertility->EditValue = HtmlEncode($this->TypeOfInfertility->AdvancedSearch->SearchValue);
            $this->TypeOfInfertility->PlaceHolder = RemoveHtml($this->TypeOfInfertility->caption());

            // RelevantHistory
            $this->RelevantHistory->EditAttrs["class"] = "form-control";
            $this->RelevantHistory->EditCustomAttributes = "";
            if (!$this->RelevantHistory->Raw) {
                $this->RelevantHistory->AdvancedSearch->SearchValue = HtmlDecode($this->RelevantHistory->AdvancedSearch->SearchValue);
            }
            $this->RelevantHistory->EditValue = HtmlEncode($this->RelevantHistory->AdvancedSearch->SearchValue);
            $this->RelevantHistory->PlaceHolder = RemoveHtml($this->RelevantHistory->caption());

            // IUICycles
            $this->IUICycles->EditAttrs["class"] = "form-control";
            $this->IUICycles->EditCustomAttributes = "";
            if (!$this->IUICycles->Raw) {
                $this->IUICycles->AdvancedSearch->SearchValue = HtmlDecode($this->IUICycles->AdvancedSearch->SearchValue);
            }
            $this->IUICycles->EditValue = HtmlEncode($this->IUICycles->AdvancedSearch->SearchValue);
            $this->IUICycles->PlaceHolder = RemoveHtml($this->IUICycles->caption());

            // AMH
            $this->AMH->EditAttrs["class"] = "form-control";
            $this->AMH->EditCustomAttributes = "";
            if (!$this->AMH->Raw) {
                $this->AMH->AdvancedSearch->SearchValue = HtmlDecode($this->AMH->AdvancedSearch->SearchValue);
            }
            $this->AMH->EditValue = HtmlEncode($this->AMH->AdvancedSearch->SearchValue);
            $this->AMH->PlaceHolder = RemoveHtml($this->AMH->caption());

            // FBMI
            $this->FBMI->EditAttrs["class"] = "form-control";
            $this->FBMI->EditCustomAttributes = "";
            if (!$this->FBMI->Raw) {
                $this->FBMI->AdvancedSearch->SearchValue = HtmlDecode($this->FBMI->AdvancedSearch->SearchValue);
            }
            $this->FBMI->EditValue = HtmlEncode($this->FBMI->AdvancedSearch->SearchValue);
            $this->FBMI->PlaceHolder = RemoveHtml($this->FBMI->caption());

            // ANTAGONISTSTARTDAY
            $this->ANTAGONISTSTARTDAY->EditAttrs["class"] = "form-control";
            $this->ANTAGONISTSTARTDAY->EditCustomAttributes = "";
            if (!$this->ANTAGONISTSTARTDAY->Raw) {
                $this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue = HtmlDecode($this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue);
            }
            $this->ANTAGONISTSTARTDAY->EditValue = HtmlEncode($this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue);
            $this->ANTAGONISTSTARTDAY->PlaceHolder = RemoveHtml($this->ANTAGONISTSTARTDAY->caption());

            // OvarianSurgery
            $this->OvarianSurgery->EditAttrs["class"] = "form-control";
            $this->OvarianSurgery->EditCustomAttributes = "";
            if (!$this->OvarianSurgery->Raw) {
                $this->OvarianSurgery->AdvancedSearch->SearchValue = HtmlDecode($this->OvarianSurgery->AdvancedSearch->SearchValue);
            }
            $this->OvarianSurgery->EditValue = HtmlEncode($this->OvarianSurgery->AdvancedSearch->SearchValue);
            $this->OvarianSurgery->PlaceHolder = RemoveHtml($this->OvarianSurgery->caption());

            // OPUDATE
            $this->OPUDATE->EditAttrs["class"] = "form-control";
            $this->OPUDATE->EditCustomAttributes = "";
            $this->OPUDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->OPUDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->OPUDATE->PlaceHolder = RemoveHtml($this->OPUDATE->caption());

            // RFSH1
            $this->RFSH1->EditAttrs["class"] = "form-control";
            $this->RFSH1->EditCustomAttributes = "";
            if (!$this->RFSH1->Raw) {
                $this->RFSH1->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH1->AdvancedSearch->SearchValue);
            }
            $this->RFSH1->EditValue = HtmlEncode($this->RFSH1->AdvancedSearch->SearchValue);
            $this->RFSH1->PlaceHolder = RemoveHtml($this->RFSH1->caption());

            // RFSH2
            $this->RFSH2->EditAttrs["class"] = "form-control";
            $this->RFSH2->EditCustomAttributes = "";
            if (!$this->RFSH2->Raw) {
                $this->RFSH2->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH2->AdvancedSearch->SearchValue);
            }
            $this->RFSH2->EditValue = HtmlEncode($this->RFSH2->AdvancedSearch->SearchValue);
            $this->RFSH2->PlaceHolder = RemoveHtml($this->RFSH2->caption());

            // RFSH3
            $this->RFSH3->EditAttrs["class"] = "form-control";
            $this->RFSH3->EditCustomAttributes = "";
            if (!$this->RFSH3->Raw) {
                $this->RFSH3->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH3->AdvancedSearch->SearchValue);
            }
            $this->RFSH3->EditValue = HtmlEncode($this->RFSH3->AdvancedSearch->SearchValue);
            $this->RFSH3->PlaceHolder = RemoveHtml($this->RFSH3->caption());

            // E21
            $this->E21->EditAttrs["class"] = "form-control";
            $this->E21->EditCustomAttributes = "";
            if (!$this->E21->Raw) {
                $this->E21->AdvancedSearch->SearchValue = HtmlDecode($this->E21->AdvancedSearch->SearchValue);
            }
            $this->E21->EditValue = HtmlEncode($this->E21->AdvancedSearch->SearchValue);
            $this->E21->PlaceHolder = RemoveHtml($this->E21->caption());

            // Hysteroscopy
            $this->Hysteroscopy->EditAttrs["class"] = "form-control";
            $this->Hysteroscopy->EditCustomAttributes = "";
            if (!$this->Hysteroscopy->Raw) {
                $this->Hysteroscopy->AdvancedSearch->SearchValue = HtmlDecode($this->Hysteroscopy->AdvancedSearch->SearchValue);
            }
            $this->Hysteroscopy->EditValue = HtmlEncode($this->Hysteroscopy->AdvancedSearch->SearchValue);
            $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Fweight
            $this->Fweight->EditAttrs["class"] = "form-control";
            $this->Fweight->EditCustomAttributes = "";
            if (!$this->Fweight->Raw) {
                $this->Fweight->AdvancedSearch->SearchValue = HtmlDecode($this->Fweight->AdvancedSearch->SearchValue);
            }
            $this->Fweight->EditValue = HtmlEncode($this->Fweight->AdvancedSearch->SearchValue);
            $this->Fweight->PlaceHolder = RemoveHtml($this->Fweight->caption());

            // AntiTPO
            $this->AntiTPO->EditAttrs["class"] = "form-control";
            $this->AntiTPO->EditCustomAttributes = "";
            if (!$this->AntiTPO->Raw) {
                $this->AntiTPO->AdvancedSearch->SearchValue = HtmlDecode($this->AntiTPO->AdvancedSearch->SearchValue);
            }
            $this->AntiTPO->EditValue = HtmlEncode($this->AntiTPO->AdvancedSearch->SearchValue);
            $this->AntiTPO->PlaceHolder = RemoveHtml($this->AntiTPO->caption());

            // AntiTG
            $this->AntiTG->EditAttrs["class"] = "form-control";
            $this->AntiTG->EditCustomAttributes = "";
            if (!$this->AntiTG->Raw) {
                $this->AntiTG->AdvancedSearch->SearchValue = HtmlDecode($this->AntiTG->AdvancedSearch->SearchValue);
            }
            $this->AntiTG->EditValue = HtmlEncode($this->AntiTG->AdvancedSearch->SearchValue);
            $this->AntiTG->PlaceHolder = RemoveHtml($this->AntiTG->caption());

            // PatientAge
            $this->PatientAge->EditAttrs["class"] = "form-control";
            $this->PatientAge->EditCustomAttributes = "";
            if (!$this->PatientAge->Raw) {
                $this->PatientAge->AdvancedSearch->SearchValue = HtmlDecode($this->PatientAge->AdvancedSearch->SearchValue);
            }
            $this->PatientAge->EditValue = HtmlEncode($this->PatientAge->AdvancedSearch->SearchValue);
            $this->PatientAge->PlaceHolder = RemoveHtml($this->PatientAge->caption());

            // PartnerAge
            $this->PartnerAge->EditAttrs["class"] = "form-control";
            $this->PartnerAge->EditCustomAttributes = "";
            if (!$this->PartnerAge->Raw) {
                $this->PartnerAge->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerAge->AdvancedSearch->SearchValue);
            }
            $this->PartnerAge->EditValue = HtmlEncode($this->PartnerAge->AdvancedSearch->SearchValue);
            $this->PartnerAge->PlaceHolder = RemoveHtml($this->PartnerAge->caption());

            // R.OVARY
            $this->ROVARY->EditAttrs["class"] = "form-control";
            $this->ROVARY->EditCustomAttributes = "";
            if (!$this->ROVARY->Raw) {
                $this->ROVARY->AdvancedSearch->SearchValue = HtmlDecode($this->ROVARY->AdvancedSearch->SearchValue);
            }
            $this->ROVARY->EditValue = HtmlEncode($this->ROVARY->AdvancedSearch->SearchValue);
            $this->ROVARY->PlaceHolder = RemoveHtml($this->ROVARY->caption());

            // R.AFC
            $this->RAFC->EditAttrs["class"] = "form-control";
            $this->RAFC->EditCustomAttributes = "";
            if (!$this->RAFC->Raw) {
                $this->RAFC->AdvancedSearch->SearchValue = HtmlDecode($this->RAFC->AdvancedSearch->SearchValue);
            }
            $this->RAFC->EditValue = HtmlEncode($this->RAFC->AdvancedSearch->SearchValue);
            $this->RAFC->PlaceHolder = RemoveHtml($this->RAFC->caption());

            // L.OVARY
            $this->LOVARY->EditAttrs["class"] = "form-control";
            $this->LOVARY->EditCustomAttributes = "";
            if (!$this->LOVARY->Raw) {
                $this->LOVARY->AdvancedSearch->SearchValue = HtmlDecode($this->LOVARY->AdvancedSearch->SearchValue);
            }
            $this->LOVARY->EditValue = HtmlEncode($this->LOVARY->AdvancedSearch->SearchValue);
            $this->LOVARY->PlaceHolder = RemoveHtml($this->LOVARY->caption());

            // L.AFC
            $this->LAFC->EditAttrs["class"] = "form-control";
            $this->LAFC->EditCustomAttributes = "";
            if (!$this->LAFC->Raw) {
                $this->LAFC->AdvancedSearch->SearchValue = HtmlDecode($this->LAFC->AdvancedSearch->SearchValue);
            }
            $this->LAFC->EditValue = HtmlEncode($this->LAFC->AdvancedSearch->SearchValue);
            $this->LAFC->PlaceHolder = RemoveHtml($this->LAFC->caption());

            // E2
            $this->E2->EditAttrs["class"] = "form-control";
            $this->E2->EditCustomAttributes = "";
            if (!$this->E2->Raw) {
                $this->E2->AdvancedSearch->SearchValue = HtmlDecode($this->E2->AdvancedSearch->SearchValue);
            }
            $this->E2->EditValue = HtmlEncode($this->E2->AdvancedSearch->SearchValue);
            $this->E2->PlaceHolder = RemoveHtml($this->E2->caption());

            // AMH1
            $this->AMH1->EditAttrs["class"] = "form-control";
            $this->AMH1->EditCustomAttributes = "";
            if (!$this->AMH1->Raw) {
                $this->AMH1->AdvancedSearch->SearchValue = HtmlDecode($this->AMH1->AdvancedSearch->SearchValue);
            }
            $this->AMH1->EditValue = HtmlEncode($this->AMH1->AdvancedSearch->SearchValue);
            $this->AMH1->PlaceHolder = RemoveHtml($this->AMH1->caption());

            // BMI(MALE)
            $this->BMIMALE->EditAttrs["class"] = "form-control";
            $this->BMIMALE->EditCustomAttributes = "";
            if (!$this->BMIMALE->Raw) {
                $this->BMIMALE->AdvancedSearch->SearchValue = HtmlDecode($this->BMIMALE->AdvancedSearch->SearchValue);
            }
            $this->BMIMALE->EditValue = HtmlEncode($this->BMIMALE->AdvancedSearch->SearchValue);
            $this->BMIMALE->PlaceHolder = RemoveHtml($this->BMIMALE->caption());

            // MaleMedicalConditions
            $this->MaleMedicalConditions->EditAttrs["class"] = "form-control";
            $this->MaleMedicalConditions->EditCustomAttributes = "";
            if (!$this->MaleMedicalConditions->Raw) {
                $this->MaleMedicalConditions->AdvancedSearch->SearchValue = HtmlDecode($this->MaleMedicalConditions->AdvancedSearch->SearchValue);
            }
            $this->MaleMedicalConditions->EditValue = HtmlEncode($this->MaleMedicalConditions->AdvancedSearch->SearchValue);
            $this->MaleMedicalConditions->PlaceHolder = RemoveHtml($this->MaleMedicalConditions->caption());

            // CC 100
            $this->CC100->EditAttrs["class"] = "form-control";
            $this->CC100->EditCustomAttributes = "";
            if (!$this->CC100->Raw) {
                $this->CC100->AdvancedSearch->SearchValue = HtmlDecode($this->CC100->AdvancedSearch->SearchValue);
            }
            $this->CC100->EditValue = HtmlEncode($this->CC100->AdvancedSearch->SearchValue);
            $this->CC100->PlaceHolder = RemoveHtml($this->CC100->caption());

            // RFSH1A
            $this->RFSH1A->EditAttrs["class"] = "form-control";
            $this->RFSH1A->EditCustomAttributes = "";
            if (!$this->RFSH1A->Raw) {
                $this->RFSH1A->AdvancedSearch->SearchValue = HtmlDecode($this->RFSH1A->AdvancedSearch->SearchValue);
            }
            $this->RFSH1A->EditValue = HtmlEncode($this->RFSH1A->AdvancedSearch->SearchValue);
            $this->RFSH1A->PlaceHolder = RemoveHtml($this->RFSH1A->caption());

            // HMG1
            $this->HMG1->EditAttrs["class"] = "form-control";
            $this->HMG1->EditCustomAttributes = "";
            if (!$this->HMG1->Raw) {
                $this->HMG1->AdvancedSearch->SearchValue = HtmlDecode($this->HMG1->AdvancedSearch->SearchValue);
            }
            $this->HMG1->EditValue = HtmlEncode($this->HMG1->AdvancedSearch->SearchValue);
            $this->HMG1->PlaceHolder = RemoveHtml($this->HMG1->caption());

            // DAYSOFSTIMULATION
            $this->DAYSOFSTIMULATION->EditAttrs["class"] = "form-control";
            $this->DAYSOFSTIMULATION->EditCustomAttributes = "";
            if (!$this->DAYSOFSTIMULATION->Raw) {
                $this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue = HtmlDecode($this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue);
            }
            $this->DAYSOFSTIMULATION->EditValue = HtmlEncode($this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue);
            $this->DAYSOFSTIMULATION->PlaceHolder = RemoveHtml($this->DAYSOFSTIMULATION->caption());

            // TRIGGERR
            $this->TRIGGERR->EditAttrs["class"] = "form-control";
            $this->TRIGGERR->EditCustomAttributes = "";
            if (!$this->TRIGGERR->Raw) {
                $this->TRIGGERR->AdvancedSearch->SearchValue = HtmlDecode($this->TRIGGERR->AdvancedSearch->SearchValue);
            }
            $this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->AdvancedSearch->SearchValue);
            $this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());
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
        $this->RIDNO->AdvancedSearch->load();
        $this->Treatment->AdvancedSearch->load();
        $this->Origin->AdvancedSearch->load();
        $this->MaleIndications->AdvancedSearch->load();
        $this->FemaleIndications->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->PatientID->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PartnerID->AdvancedSearch->load();
        $this->A4ICSICycle->AdvancedSearch->load();
        $this->TotalICSICycle->AdvancedSearch->load();
        $this->TypeOfInfertility->AdvancedSearch->load();
        $this->RelevantHistory->AdvancedSearch->load();
        $this->IUICycles->AdvancedSearch->load();
        $this->AMH->AdvancedSearch->load();
        $this->FBMI->AdvancedSearch->load();
        $this->ANTAGONISTSTARTDAY->AdvancedSearch->load();
        $this->OvarianSurgery->AdvancedSearch->load();
        $this->OPUDATE->AdvancedSearch->load();
        $this->RFSH1->AdvancedSearch->load();
        $this->RFSH2->AdvancedSearch->load();
        $this->RFSH3->AdvancedSearch->load();
        $this->E21->AdvancedSearch->load();
        $this->Hysteroscopy->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->Fweight->AdvancedSearch->load();
        $this->AntiTPO->AdvancedSearch->load();
        $this->AntiTG->AdvancedSearch->load();
        $this->PatientAge->AdvancedSearch->load();
        $this->PartnerAge->AdvancedSearch->load();
        $this->CYCLES->AdvancedSearch->load();
        $this->MF->AdvancedSearch->load();
        $this->CauseOfINFERTILITY->AdvancedSearch->load();
        $this->SIS->AdvancedSearch->load();
        $this->Scratching->AdvancedSearch->load();
        $this->Cannulation->AdvancedSearch->load();
        $this->MEPRATE->AdvancedSearch->load();
        $this->ROVARY->AdvancedSearch->load();
        $this->RAFC->AdvancedSearch->load();
        $this->LOVARY->AdvancedSearch->load();
        $this->LAFC->AdvancedSearch->load();
        $this->LH1->AdvancedSearch->load();
        $this->E2->AdvancedSearch->load();
        $this->StemCellInstallation->AdvancedSearch->load();
        $this->DHEAS->AdvancedSearch->load();
        $this->Mtorr->AdvancedSearch->load();
        $this->AMH1->AdvancedSearch->load();
        $this->LH->AdvancedSearch->load();
        $this->BMIMALE->AdvancedSearch->load();
        $this->MaleMedicalConditions->AdvancedSearch->load();
        $this->MaleExamination->AdvancedSearch->load();
        $this->SpermConcentration->AdvancedSearch->load();
        $this->SpermMotilityPNP->AdvancedSearch->load();
        $this->SpermMorphology->AdvancedSearch->load();
        $this->SpermRetrival->AdvancedSearch->load();
        $this->MTestosterone->AdvancedSearch->load();
        $this->DFI->AdvancedSearch->load();
        $this->PreRX->AdvancedSearch->load();
        $this->CC100->AdvancedSearch->load();
        $this->RFSH1A->AdvancedSearch->load();
        $this->HMG1->AdvancedSearch->load();
        $this->RLH->AdvancedSearch->load();
        $this->HMG_HP->AdvancedSearch->load();
        $this->day_of_HMG->AdvancedSearch->load();
        $this->Reason_for_HMG->AdvancedSearch->load();
        $this->RLH_day->AdvancedSearch->load();
        $this->DAYSOFSTIMULATION->AdvancedSearch->load();
        $this->AnychangeinbetweenDoseaddedday->AdvancedSearch->load();
        $this->dayofAnta->AdvancedSearch->load();
        $this->RFSHTD->AdvancedSearch->load();
        $this->RFSHHMGTD->AdvancedSearch->load();
        $this->RFSHRLHTD->AdvancedSearch->load();
        $this->HMGTD->AdvancedSearch->load();
        $this->LHTD->AdvancedSearch->load();
        $this->D1LH->AdvancedSearch->load();
        $this->D1E2->AdvancedSearch->load();
        $this->TriggerdayE2->AdvancedSearch->load();
        $this->TriggerdayP4->AdvancedSearch->load();
        $this->TriggerdayLH->AdvancedSearch->load();
        $this->VITD->AdvancedSearch->load();
        $this->TRIGGERR->AdvancedSearch->load();
        $this->BHCGBEFORERETRIEVAL->AdvancedSearch->load();
        $this->LH12HRS->AdvancedSearch->load();
        $this->P412HRS->AdvancedSearch->load();
        $this->ETonhCGday->AdvancedSearch->load();
        $this->ETdoppler->AdvancedSearch->load();
        $this->VIFIVFI->AdvancedSearch->load();
        $this->Endometrialabnormality->AdvancedSearch->load();
        $this->AFCONS1->AdvancedSearch->load();
        $this->TIMEOFOPUFROMTRIGGER->AdvancedSearch->load();
        $this->SPERMTYPE->AdvancedSearch->load();
        $this->EXPECTEDONTRIGGERDAY->AdvancedSearch->load();
        $this->OOCYTESRETRIEVED->AdvancedSearch->load();
        $this->TIMEOFDENUDATION->AdvancedSearch->load();
        $this->MII->AdvancedSearch->load();
        $this->MI->AdvancedSearch->load();
        $this->GV->AdvancedSearch->load();
        $this->ICSITIMEFORMOPU->AdvancedSearch->load();
        $this->FERT2PN->AdvancedSearch->load();
        $this->DEG->AdvancedSearch->load();
        $this->D3GRADEA->AdvancedSearch->load();
        $this->D3GRADEB->AdvancedSearch->load();
        $this->D3GRADEC->AdvancedSearch->load();
        $this->D3GRADED->AdvancedSearch->load();
        $this->USABLEONDAY3ET->AdvancedSearch->load();
        $this->USABLEONday3FREEZING->AdvancedSearch->load();
        $this->D5GARDEA->AdvancedSearch->load();
        $this->D5GRADEB->AdvancedSearch->load();
        $this->D5GRADEC->AdvancedSearch->load();
        $this->D5GRADED->AdvancedSearch->load();
        $this->USABLEOND5ET->AdvancedSearch->load();
        $this->USABLEOND5FREEZING->AdvancedSearch->load();
        $this->D6GRADEA->AdvancedSearch->load();
        $this->D6GRADEB->AdvancedSearch->load();
        $this->D6GRADEC->AdvancedSearch->load();
        $this->D6GRADED->AdvancedSearch->load();
        $this->D6USABLEEMBRYOET->AdvancedSearch->load();
        $this->D6USABLEFREEZING->AdvancedSearch->load();
        $this->TOTALBLAST->AdvancedSearch->load();
        $this->PGS->AdvancedSearch->load();
        $this->REMARKS->AdvancedSearch->load();
        $this->PUDB->AdvancedSearch->load();
        $this->ICSIDB->AdvancedSearch->load();
        $this->VITDB->AdvancedSearch->load();
        $this->ETDB->AdvancedSearch->load();
        $this->LABCOMMENTS->AdvancedSearch->load();
        $this->ReasonfornoFRESHtransfer->AdvancedSearch->load();
        $this->NoofembryostransferredDay35ABC->AdvancedSearch->load();
        $this->EMBRYOSPENDING->AdvancedSearch->load();
        $this->DAYOFTRANSFER->AdvancedSearch->load();
        $this->HDsperm->AdvancedSearch->load();
        $this->Comments->AdvancedSearch->load();
        $this->scprogesterone->AdvancedSearch->load();
        $this->Naturalmicronised400mgbdduphaston10mgbd->AdvancedSearch->load();
        $this->CRINONE->AdvancedSearch->load();
        $this->progynova->AdvancedSearch->load();
        $this->Heparin->AdvancedSearch->load();
        $this->cabergolin->AdvancedSearch->load();
        $this->Antagonist->AdvancedSearch->load();
        $this->OHSS->AdvancedSearch->load();
        $this->Complications->AdvancedSearch->load();
        $this->LPbleeding->AdvancedSearch->load();
        $this->hCG->AdvancedSearch->load();
        $this->Implantationrate->AdvancedSearch->load();
        $this->Ectopic->AdvancedSearch->load();
        $this->Typeofpreg->AdvancedSearch->load();
        $this->ANC->AdvancedSearch->load();
        $this->anomalies->AdvancedSearch->load();
        $this->babywt->AdvancedSearch->load();
        $this->GAatdelivery->AdvancedSearch->load();
        $this->Pregnancyoutcome->AdvancedSearch->load();
        $this->_1stFET->AdvancedSearch->load();
        $this->AFTERHYSTEROSCOPY->AdvancedSearch->load();
        $this->AFTERERA->AdvancedSearch->load();
        $this->ERA->AdvancedSearch->load();
        $this->HRT->AdvancedSearch->load();
        $this->XGRASTPRP->AdvancedSearch->load();
        $this->EMBRYODETAILSDAY35ABC->AdvancedSearch->load();
        $this->LMWH40MG->AdvancedSearch->load();
        $this->hCG2->AdvancedSearch->load();
        $this->Implantationrate1->AdvancedSearch->load();
        $this->Ectopic1->AdvancedSearch->load();
        $this->TypeofpregA->AdvancedSearch->load();
        $this->ANC1->AdvancedSearch->load();
        $this->anomalies2->AdvancedSearch->load();
        $this->babywt2->AdvancedSearch->load();
        $this->GAatdelivery1->AdvancedSearch->load();
        $this->Pregnancyoutcome1->AdvancedSearch->load();
        $this->_2NDFET->AdvancedSearch->load();
        $this->AFTERHYSTEROSCOPY1->AdvancedSearch->load();
        $this->AFTERERA1->AdvancedSearch->load();
        $this->ERA1->AdvancedSearch->load();
        $this->HRT1->AdvancedSearch->load();
        $this->XGRASTPRP1->AdvancedSearch->load();
        $this->NUMBEROFEMBRYOS->AdvancedSearch->load();
        $this->EMBRYODETAILSDAY356ABC->AdvancedSearch->load();
        $this->INTRALIPIDANDBARGLOBIN->AdvancedSearch->load();
        $this->LMWH40MG1->AdvancedSearch->load();
        $this->hCG1->AdvancedSearch->load();
        $this->Implantationrate2->AdvancedSearch->load();
        $this->Ectopic2->AdvancedSearch->load();
        $this->Typeofpreg2->AdvancedSearch->load();
        $this->ANCA->AdvancedSearch->load();
        $this->anomalies1->AdvancedSearch->load();
        $this->babywt1->AdvancedSearch->load();
        $this->GAatdelivery2->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_template_for_opulist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_template_for_opulist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_template_for_opulist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_template_for_opu" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_template_for_opu\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_template_for_opulist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_template_for_opulistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
