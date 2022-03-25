<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewSemenanalysisSearch extends ViewSemenanalysis
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_semenanalysis';

    // Page object name
    public $PageObjName = "ViewSemenanalysisSearch";

    // Rendering View
    public $RenderingView = false;

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

        // Table object (view_semenanalysis)
        if (!isset($GLOBALS["view_semenanalysis"]) || get_class($GLOBALS["view_semenanalysis"]) == PROJECT_NAMESPACE . "view_semenanalysis") {
            $GLOBALS["view_semenanalysis"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_semenanalysis');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
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
                $doc = new $class(Container("view_semenanalysis"));
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

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "ViewSemenanalysisView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-search-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;

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

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
        $this->PaID->setVisibility();
        $this->PaName->setVisibility();
        $this->PaMobile->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->RIDNo->setVisibility();
        $this->PatientName->setVisibility();
        $this->HusbandName->setVisibility();
        $this->RequestDr->setVisibility();
        $this->CollectionDate->setVisibility();
        $this->ResultDate->setVisibility();
        $this->RequestSample->setVisibility();
        $this->CollectionType->setVisibility();
        $this->CollectionMethod->setVisibility();
        $this->Medicationused->setVisibility();
        $this->DifficultiesinCollection->setVisibility();
        $this->Volume->setVisibility();
        $this->pH->setVisibility();
        $this->Timeofcollection->setVisibility();
        $this->Timeofexamination->setVisibility();
        $this->Concentration->setVisibility();
        $this->Total->setVisibility();
        $this->ProgressiveMotility->setVisibility();
        $this->NonProgrssiveMotile->setVisibility();
        $this->Immotile->setVisibility();
        $this->TotalProgrssiveMotile->setVisibility();
        $this->Appearance->setVisibility();
        $this->Homogenosity->setVisibility();
        $this->CompleteSample->setVisibility();
        $this->Liquefactiontime->setVisibility();
        $this->Normal->setVisibility();
        $this->Abnormal->setVisibility();
        $this->Headdefects->setVisibility();
        $this->MidpieceDefects->setVisibility();
        $this->TailDefects->setVisibility();
        $this->NormalProgMotile->setVisibility();
        $this->ImmatureForms->setVisibility();
        $this->Leucocytes->setVisibility();
        $this->Agglutination->setVisibility();
        $this->Debris->setVisibility();
        $this->Diagnosis->setVisibility();
        $this->Observations->setVisibility();
        $this->Signature->setVisibility();
        $this->SemenOrgin->setVisibility();
        $this->Donor->setVisibility();
        $this->DonorBloodgroup->setVisibility();
        $this->Tank->setVisibility();
        $this->Location->setVisibility();
        $this->Volume1->setVisibility();
        $this->Concentration1->setVisibility();
        $this->Total1->setVisibility();
        $this->ProgressiveMotility1->setVisibility();
        $this->NonProgrssiveMotile1->setVisibility();
        $this->Immotile1->setVisibility();
        $this->TotalProgrssiveMotile1->setVisibility();
        $this->TidNo->setVisibility();
        $this->Color->setVisibility();
        $this->DoneBy->setVisibility();
        $this->Method->setVisibility();
        $this->Abstinence->setVisibility();
        $this->ProcessedBy->setVisibility();
        $this->InseminationTime->setVisibility();
        $this->InseminationBy->setVisibility();
        $this->Big->setVisibility();
        $this->Medium->setVisibility();
        $this->Small->setVisibility();
        $this->NoHalo->setVisibility();
        $this->Fragmented->setVisibility();
        $this->NonFragmented->setVisibility();
        $this->DFI->setVisibility();
        $this->IsueBy->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total2->setVisibility();
        $this->ProgressiveMotility2->setVisibility();
        $this->NonProgrssiveMotile2->setVisibility();
        $this->Immotile2->setVisibility();
        $this->TotalProgrssiveMotile2->setVisibility();
        $this->IssuedBy->setVisibility();
        $this->IssuedTo->setVisibility();
        $this->MACS->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
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
        $this->setupLookupOptions($this->RIDNo);
        $this->setupLookupOptions($this->PatientName);
        $this->setupLookupOptions($this->HusbandName);
        $this->setupLookupOptions($this->Medicationused);
        $this->setupLookupOptions($this->Donor);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        if ($this->isPageRequest()) {
            // Get action
            $this->CurrentAction = Post("action");
            if ($this->isSearch()) {
                // Build search string for advanced search, remove blank field
                $this->loadSearchValues(); // Get search values
                if ($this->validateSearch()) {
                    $srchStr = $this->buildAdvancedSearch();
                } else {
                    $srchStr = "";
                }
                if ($srchStr != "") {
                    $srchStr = $this->getUrlParm($srchStr);
                    $srchStr = "ViewSemenanalysisList" . "?" . $srchStr;
                    $this->terminate($srchStr); // Go to list page
                    return;
                }
            }
        }

        // Restore search settings from Session
        if (!$this->hasInvalidFields()) {
            $this->loadAdvancedSearch();
        }

        // Render row for search
        $this->RowType = ROWTYPE_SEARCH;
        $this->resetAttributes();
        $this->renderRow();

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

    // Build advanced search
    protected function buildAdvancedSearch()
    {
        $srchUrl = "";
        $this->buildSearchUrl($srchUrl, $this->id); // id
        $this->buildSearchUrl($srchUrl, $this->PaID); // PaID
        $this->buildSearchUrl($srchUrl, $this->PaName); // PaName
        $this->buildSearchUrl($srchUrl, $this->PaMobile); // PaMobile
        $this->buildSearchUrl($srchUrl, $this->PartnerID); // PartnerID
        $this->buildSearchUrl($srchUrl, $this->PartnerName); // PartnerName
        $this->buildSearchUrl($srchUrl, $this->PartnerMobile); // PartnerMobile
        $this->buildSearchUrl($srchUrl, $this->RIDNo); // RIDNo
        $this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
        $this->buildSearchUrl($srchUrl, $this->HusbandName); // HusbandName
        $this->buildSearchUrl($srchUrl, $this->RequestDr); // RequestDr
        $this->buildSearchUrl($srchUrl, $this->CollectionDate); // CollectionDate
        $this->buildSearchUrl($srchUrl, $this->ResultDate); // ResultDate
        $this->buildSearchUrl($srchUrl, $this->RequestSample); // RequestSample
        $this->buildSearchUrl($srchUrl, $this->CollectionType); // CollectionType
        $this->buildSearchUrl($srchUrl, $this->CollectionMethod); // CollectionMethod
        $this->buildSearchUrl($srchUrl, $this->Medicationused); // Medicationused
        $this->buildSearchUrl($srchUrl, $this->DifficultiesinCollection); // DifficultiesinCollection
        $this->buildSearchUrl($srchUrl, $this->Volume); // Volume
        $this->buildSearchUrl($srchUrl, $this->pH); // pH
        $this->buildSearchUrl($srchUrl, $this->Timeofcollection); // Timeofcollection
        $this->buildSearchUrl($srchUrl, $this->Timeofexamination); // Timeofexamination
        $this->buildSearchUrl($srchUrl, $this->Concentration); // Concentration
        $this->buildSearchUrl($srchUrl, $this->Total); // Total
        $this->buildSearchUrl($srchUrl, $this->ProgressiveMotility); // ProgressiveMotility
        $this->buildSearchUrl($srchUrl, $this->NonProgrssiveMotile); // NonProgrssiveMotile
        $this->buildSearchUrl($srchUrl, $this->Immotile); // Immotile
        $this->buildSearchUrl($srchUrl, $this->TotalProgrssiveMotile); // TotalProgrssiveMotile
        $this->buildSearchUrl($srchUrl, $this->Appearance); // Appearance
        $this->buildSearchUrl($srchUrl, $this->Homogenosity); // Homogenosity
        $this->buildSearchUrl($srchUrl, $this->CompleteSample); // CompleteSample
        $this->buildSearchUrl($srchUrl, $this->Liquefactiontime); // Liquefactiontime
        $this->buildSearchUrl($srchUrl, $this->Normal); // Normal
        $this->buildSearchUrl($srchUrl, $this->Abnormal); // Abnormal
        $this->buildSearchUrl($srchUrl, $this->Headdefects); // Headdefects
        $this->buildSearchUrl($srchUrl, $this->MidpieceDefects); // MidpieceDefects
        $this->buildSearchUrl($srchUrl, $this->TailDefects); // TailDefects
        $this->buildSearchUrl($srchUrl, $this->NormalProgMotile); // NormalProgMotile
        $this->buildSearchUrl($srchUrl, $this->ImmatureForms); // ImmatureForms
        $this->buildSearchUrl($srchUrl, $this->Leucocytes); // Leucocytes
        $this->buildSearchUrl($srchUrl, $this->Agglutination); // Agglutination
        $this->buildSearchUrl($srchUrl, $this->Debris); // Debris
        $this->buildSearchUrl($srchUrl, $this->Diagnosis); // Diagnosis
        $this->buildSearchUrl($srchUrl, $this->Observations); // Observations
        $this->buildSearchUrl($srchUrl, $this->Signature); // Signature
        $this->buildSearchUrl($srchUrl, $this->SemenOrgin); // SemenOrgin
        $this->buildSearchUrl($srchUrl, $this->Donor); // Donor
        $this->buildSearchUrl($srchUrl, $this->DonorBloodgroup); // DonorBloodgroup
        $this->buildSearchUrl($srchUrl, $this->Tank); // Tank
        $this->buildSearchUrl($srchUrl, $this->Location); // Location
        $this->buildSearchUrl($srchUrl, $this->Volume1); // Volume1
        $this->buildSearchUrl($srchUrl, $this->Concentration1); // Concentration1
        $this->buildSearchUrl($srchUrl, $this->Total1); // Total1
        $this->buildSearchUrl($srchUrl, $this->ProgressiveMotility1); // ProgressiveMotility1
        $this->buildSearchUrl($srchUrl, $this->NonProgrssiveMotile1); // NonProgrssiveMotile1
        $this->buildSearchUrl($srchUrl, $this->Immotile1); // Immotile1
        $this->buildSearchUrl($srchUrl, $this->TotalProgrssiveMotile1); // TotalProgrssiveMotile1
        $this->buildSearchUrl($srchUrl, $this->TidNo); // TidNo
        $this->buildSearchUrl($srchUrl, $this->Color); // Color
        $this->buildSearchUrl($srchUrl, $this->DoneBy); // DoneBy
        $this->buildSearchUrl($srchUrl, $this->Method); // Method
        $this->buildSearchUrl($srchUrl, $this->Abstinence); // Abstinence
        $this->buildSearchUrl($srchUrl, $this->ProcessedBy); // ProcessedBy
        $this->buildSearchUrl($srchUrl, $this->InseminationTime); // InseminationTime
        $this->buildSearchUrl($srchUrl, $this->InseminationBy); // InseminationBy
        $this->buildSearchUrl($srchUrl, $this->Big); // Big
        $this->buildSearchUrl($srchUrl, $this->Medium); // Medium
        $this->buildSearchUrl($srchUrl, $this->Small); // Small
        $this->buildSearchUrl($srchUrl, $this->NoHalo); // NoHalo
        $this->buildSearchUrl($srchUrl, $this->Fragmented); // Fragmented
        $this->buildSearchUrl($srchUrl, $this->NonFragmented); // NonFragmented
        $this->buildSearchUrl($srchUrl, $this->DFI); // DFI
        $this->buildSearchUrl($srchUrl, $this->IsueBy); // IsueBy
        $this->buildSearchUrl($srchUrl, $this->Volume2); // Volume2
        $this->buildSearchUrl($srchUrl, $this->Concentration2); // Concentration2
        $this->buildSearchUrl($srchUrl, $this->Total2); // Total2
        $this->buildSearchUrl($srchUrl, $this->ProgressiveMotility2); // ProgressiveMotility2
        $this->buildSearchUrl($srchUrl, $this->NonProgrssiveMotile2); // NonProgrssiveMotile2
        $this->buildSearchUrl($srchUrl, $this->Immotile2); // Immotile2
        $this->buildSearchUrl($srchUrl, $this->TotalProgrssiveMotile2); // TotalProgrssiveMotile2
        $this->buildSearchUrl($srchUrl, $this->IssuedBy); // IssuedBy
        $this->buildSearchUrl($srchUrl, $this->IssuedTo); // IssuedTo
        $this->buildSearchUrl($srchUrl, $this->MACS); // MACS
        $this->buildSearchUrl($srchUrl, $this->PREG_TEST_DATE); // PREG_TEST_DATE
        $this->buildSearchUrl($srchUrl, $this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
        $this->buildSearchUrl($srchUrl, $this->IMSC_1); // IMSC_1
        $this->buildSearchUrl($srchUrl, $this->IMSC_2); // IMSC_2
        $this->buildSearchUrl($srchUrl, $this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
        $this->buildSearchUrl($srchUrl, $this->IUI_PREP_METHOD); // IUI_PREP_METHOD
        $this->buildSearchUrl($srchUrl, $this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
        $this->buildSearchUrl($srchUrl, $this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
        $this->buildSearchUrl($srchUrl, $this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
        if ($srchUrl != "") {
            $srchUrl .= "&";
        }
        $srchUrl .= "cmd=search";
        return $srchUrl;
    }

    // Build search URL
    protected function buildSearchUrl(&$url, &$fld, $oprOnly = false)
    {
        global $CurrentForm;
        $wrk = "";
        $fldParm = $fld->Param;
        $fldVal = $CurrentForm->getValue("x_$fldParm");
        $fldOpr = $CurrentForm->getValue("z_$fldParm");
        $fldCond = $CurrentForm->getValue("v_$fldParm");
        $fldVal2 = $CurrentForm->getValue("y_$fldParm");
        $fldOpr2 = $CurrentForm->getValue("w_$fldParm");
        if (is_array($fldVal)) {
            $fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
        }
        if (is_array($fldVal2)) {
            $fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
        }
        $fldOpr = strtoupper(trim($fldOpr));
        $fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
        if ($fldOpr == "BETWEEN") {
            $isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
                ($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
            if ($fldVal != "" && $fldVal2 != "" && $isValidValue) {
                $wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
                    "&y_" . $fldParm . "=" . urlencode($fldVal2) .
                    "&z_" . $fldParm . "=" . urlencode($fldOpr);
            }
        } else {
            $isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
                ($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
            if ($fldVal != "" && $isValidValue && IsValidOperator($fldOpr, $fldDataType)) {
                $wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
                    "&z_" . $fldParm . "=" . urlencode($fldOpr);
            } elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr != "" && $oprOnly && IsValidOperator($fldOpr, $fldDataType))) {
                $wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
            }
            $isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
                ($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
            if ($fldVal2 != "" && $isValidValue && IsValidOperator($fldOpr2, $fldDataType)) {
                if ($wrk != "") {
                    $wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
                }
                $wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
                    "&w_" . $fldParm . "=" . urlencode($fldOpr2);
            } elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 != "" && $oprOnly && IsValidOperator($fldOpr2, $fldDataType))) {
                if ($wrk != "") {
                    $wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
                }
                $wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
            }
        }
        if ($wrk != "") {
            if ($url != "") {
                $url .= "&";
            }
            $url .= $wrk;
        }
    }

    // Check if search value is numeric
    protected function searchValueIsNumeric($fld, $value)
    {
        if (IsFloatFormat($fld->Type)) {
            $value = ConvertToFloatString($value);
        }
        return is_numeric($value);
    }

    // Load search values for validation
    protected function loadSearchValues()
    {
        // Load search values
        $hasValue = false;
        if ($this->id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PaID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PaName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PaMobile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PartnerID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PartnerName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PartnerMobile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RIDNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HusbandName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RequestDr->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CollectionDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResultDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RequestSample->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CollectionType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CollectionMethod->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Medicationused->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DifficultiesinCollection->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Volume->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->pH->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Timeofcollection->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Timeofexamination->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Concentration->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Total->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProgressiveMotility->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NonProgrssiveMotile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Immotile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TotalProgrssiveMotile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Appearance->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Homogenosity->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CompleteSample->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Liquefactiontime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Normal->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Abnormal->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Headdefects->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MidpieceDefects->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TailDefects->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NormalProgMotile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ImmatureForms->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Leucocytes->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Agglutination->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Debris->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Diagnosis->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Observations->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Signature->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SemenOrgin->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Donor->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DonorBloodgroup->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Tank->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Location->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Volume1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Concentration1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Total1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProgressiveMotility1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NonProgrssiveMotile1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Immotile1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TotalProgrssiveMotile1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TidNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Color->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DoneBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Method->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Abstinence->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProcessedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->InseminationTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->InseminationBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Big->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Medium->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Small->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NoHalo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Fragmented->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NonFragmented->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DFI->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IsueBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Volume2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Concentration2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Total2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProgressiveMotility2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NonProgrssiveMotile2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Immotile2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TotalProgrssiveMotile2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IssuedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IssuedTo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MACS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->MACS->AdvancedSearch->SearchValue)) {
            $this->MACS->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->MACS->AdvancedSearch->SearchValue);
        }
        if (is_array($this->MACS->AdvancedSearch->SearchValue2)) {
            $this->MACS->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->MACS->AdvancedSearch->SearchValue2);
        }
        if ($this->PREG_TEST_DATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SPECIFIC_PROBLEMS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IMSC_1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IMSC_2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LIQUIFACTION_STORAGE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IUI_PREP_METHOD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TIME_FROM_TRIGGER->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->COLLECTION_TO_PREPARATION->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->post()) {
            $hasValue = true;
        }
        return $hasValue;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // PaID

        // PaName

        // PaMobile

        // PartnerID

        // PartnerName

        // PartnerMobile

        // RIDNo

        // PatientName

        // HusbandName

        // RequestDr

        // CollectionDate

        // ResultDate

        // RequestSample

        // CollectionType

        // CollectionMethod

        // Medicationused

        // DifficultiesinCollection

        // Volume

        // pH

        // Timeofcollection

        // Timeofexamination

        // Concentration

        // Total

        // ProgressiveMotility

        // NonProgrssiveMotile

        // Immotile

        // TotalProgrssiveMotile

        // Appearance

        // Homogenosity

        // CompleteSample

        // Liquefactiontime

        // Normal

        // Abnormal

        // Headdefects

        // MidpieceDefects

        // TailDefects

        // NormalProgMotile

        // ImmatureForms

        // Leucocytes

        // Agglutination

        // Debris

        // Diagnosis

        // Observations

        // Signature

        // SemenOrgin

        // Donor

        // DonorBloodgroup

        // Tank

        // Location

        // Volume1

        // Concentration1

        // Total1

        // ProgressiveMotility1

        // NonProgrssiveMotile1

        // Immotile1

        // TotalProgrssiveMotile1

        // TidNo

        // Color

        // DoneBy

        // Method

        // Abstinence

        // ProcessedBy

        // InseminationTime

        // InseminationBy

        // Big

        // Medium

        // Small

        // NoHalo

        // Fragmented

        // NonFragmented

        // DFI

        // IsueBy

        // Volume2

        // Concentration2

        // Total2

        // ProgressiveMotility2

        // NonProgrssiveMotile2

        // Immotile2

        // TotalProgrssiveMotile2

        // IssuedBy

        // IssuedTo

        // MACS

        // PREG_TEST_DATE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PaID
            $this->PaID->ViewValue = $this->PaID->CurrentValue;
            $this->PaID->ViewCustomAttributes = "";

            // PaName
            $this->PaName->ViewValue = $this->PaName->CurrentValue;
            $this->PaName->ViewCustomAttributes = "";

            // PaMobile
            $this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
            $this->PaMobile->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // RIDNo
            $curVal = trim(strval($this->RIDNo->CurrentValue));
            if ($curVal != "") {
                $this->RIDNo->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
                if ($this->RIDNo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNo->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNo->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNo->ViewValue = $this->RIDNo->displayValue($arwrk);
                    } else {
                        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
                    }
                }
            } else {
                $this->RIDNo->ViewValue = null;
            }
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $curVal = trim(strval($this->PatientName->CurrentValue));
            if ($curVal != "") {
                $this->PatientName->ViewValue = $this->PatientName->lookupCacheOption($curVal);
                if ($this->PatientName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientName->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientName->ViewValue = $this->PatientName->displayValue($arwrk);
                    } else {
                        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
                    }
                }
            } else {
                $this->PatientName->ViewValue = null;
            }
            $this->PatientName->ViewCustomAttributes = "";

            // HusbandName
            $curVal = trim(strval($this->HusbandName->CurrentValue));
            if ($curVal != "") {
                $this->HusbandName->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
                if ($this->HusbandName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HusbandName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HusbandName->Lookup->renderViewRow($rswrk[0]);
                        $this->HusbandName->ViewValue = $this->HusbandName->displayValue($arwrk);
                    } else {
                        $this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
                    }
                }
            } else {
                $this->HusbandName->ViewValue = null;
            }
            $this->HusbandName->ViewCustomAttributes = "";

            // RequestDr
            $this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
            $this->RequestDr->ViewCustomAttributes = "";

            // CollectionDate
            $this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
            $this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 7);
            $this->CollectionDate->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 7);
            $this->ResultDate->ViewCustomAttributes = "";

            // RequestSample
            if (strval($this->RequestSample->CurrentValue) != "") {
                $this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
            } else {
                $this->RequestSample->ViewValue = null;
            }
            $this->RequestSample->ViewCustomAttributes = "";

            // CollectionType
            if (strval($this->CollectionType->CurrentValue) != "") {
                $this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
            } else {
                $this->CollectionType->ViewValue = null;
            }
            $this->CollectionType->ViewCustomAttributes = "";

            // CollectionMethod
            if (strval($this->CollectionMethod->CurrentValue) != "") {
                $this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
            } else {
                $this->CollectionMethod->ViewValue = null;
            }
            $this->CollectionMethod->ViewCustomAttributes = "";

            // Medicationused
            $curVal = trim(strval($this->Medicationused->CurrentValue));
            if ($curVal != "") {
                $this->Medicationused->ViewValue = $this->Medicationused->lookupCacheOption($curVal);
                if ($this->Medicationused->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Medication`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Medicationused->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Medicationused->Lookup->renderViewRow($rswrk[0]);
                        $this->Medicationused->ViewValue = $this->Medicationused->displayValue($arwrk);
                    } else {
                        $this->Medicationused->ViewValue = $this->Medicationused->CurrentValue;
                    }
                }
            } else {
                $this->Medicationused->ViewValue = null;
            }
            $this->Medicationused->ViewCustomAttributes = "";

            // DifficultiesinCollection
            if (strval($this->DifficultiesinCollection->CurrentValue) != "") {
                $this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
            } else {
                $this->DifficultiesinCollection->ViewValue = null;
            }
            $this->DifficultiesinCollection->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // pH
            $this->pH->ViewValue = $this->pH->CurrentValue;
            $this->pH->ViewCustomAttributes = "";

            // Timeofcollection
            $this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
            $this->Timeofcollection->ViewCustomAttributes = "";

            // Timeofexamination
            $this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
            $this->Timeofexamination->ViewCustomAttributes = "";

            // Concentration
            $this->Concentration->ViewValue = $this->Concentration->CurrentValue;
            $this->Concentration->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
            $this->ProgressiveMotility->ViewCustomAttributes = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
            $this->NonProgrssiveMotile->ViewCustomAttributes = "";

            // Immotile
            $this->Immotile->ViewValue = $this->Immotile->CurrentValue;
            $this->Immotile->ViewCustomAttributes = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
            $this->TotalProgrssiveMotile->ViewCustomAttributes = "";

            // Appearance
            $this->Appearance->ViewValue = $this->Appearance->CurrentValue;
            $this->Appearance->ViewCustomAttributes = "";

            // Homogenosity
            if (strval($this->Homogenosity->CurrentValue) != "") {
                $this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
            } else {
                $this->Homogenosity->ViewValue = null;
            }
            $this->Homogenosity->ViewCustomAttributes = "";

            // CompleteSample
            if (strval($this->CompleteSample->CurrentValue) != "") {
                $this->CompleteSample->ViewValue = $this->CompleteSample->optionCaption($this->CompleteSample->CurrentValue);
            } else {
                $this->CompleteSample->ViewValue = null;
            }
            $this->CompleteSample->ViewCustomAttributes = "";

            // Liquefactiontime
            $this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
            $this->Liquefactiontime->ViewCustomAttributes = "";

            // Normal
            $this->Normal->ViewValue = $this->Normal->CurrentValue;
            $this->Normal->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // Headdefects
            $this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
            $this->Headdefects->ViewCustomAttributes = "";

            // MidpieceDefects
            $this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
            $this->MidpieceDefects->ViewCustomAttributes = "";

            // TailDefects
            $this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
            $this->TailDefects->ViewCustomAttributes = "";

            // NormalProgMotile
            $this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
            $this->NormalProgMotile->ViewCustomAttributes = "";

            // ImmatureForms
            $this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
            $this->ImmatureForms->ViewCustomAttributes = "";

            // Leucocytes
            $this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
            $this->Leucocytes->ViewCustomAttributes = "";

            // Agglutination
            $this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
            $this->Agglutination->ViewCustomAttributes = "";

            // Debris
            $this->Debris->ViewValue = $this->Debris->CurrentValue;
            $this->Debris->ViewCustomAttributes = "";

            // Diagnosis
            $this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
            $this->Diagnosis->ViewCustomAttributes = "";

            // Observations
            $this->Observations->ViewValue = $this->Observations->CurrentValue;
            $this->Observations->ViewCustomAttributes = "";

            // Signature
            $this->Signature->ViewValue = $this->Signature->CurrentValue;
            $this->Signature->ViewCustomAttributes = "";

            // SemenOrgin
            if (strval($this->SemenOrgin->CurrentValue) != "") {
                $this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
            } else {
                $this->SemenOrgin->ViewValue = null;
            }
            $this->SemenOrgin->ViewCustomAttributes = "";

            // Donor
            $curVal = trim(strval($this->Donor->CurrentValue));
            if ($curVal != "") {
                $this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
                if ($this->Donor->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Donor->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                        $this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
                    } else {
                        $this->Donor->ViewValue = $this->Donor->CurrentValue;
                    }
                }
            } else {
                $this->Donor->ViewValue = null;
            }
            $this->Donor->ViewCustomAttributes = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
            $this->DonorBloodgroup->ViewCustomAttributes = "";

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Location
            $this->Location->ViewValue = $this->Location->CurrentValue;
            $this->Location->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Concentration1
            $this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
            $this->Concentration1->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
            $this->ProgressiveMotility1->ViewCustomAttributes = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
            $this->NonProgrssiveMotile1->ViewCustomAttributes = "";

            // Immotile1
            $this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
            $this->Immotile1->ViewCustomAttributes = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
            $this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Color
            $this->Color->ViewValue = $this->Color->CurrentValue;
            $this->Color->ViewCustomAttributes = "";

            // DoneBy
            $this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
            $this->DoneBy->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Abstinence
            $this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
            $this->Abstinence->ViewCustomAttributes = "";

            // ProcessedBy
            $this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
            $this->ProcessedBy->ViewCustomAttributes = "";

            // InseminationTime
            $this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
            $this->InseminationTime->ViewCustomAttributes = "";

            // InseminationBy
            $this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
            $this->InseminationBy->ViewCustomAttributes = "";

            // Big
            $this->Big->ViewValue = $this->Big->CurrentValue;
            $this->Big->ViewCustomAttributes = "";

            // Medium
            $this->Medium->ViewValue = $this->Medium->CurrentValue;
            $this->Medium->ViewCustomAttributes = "";

            // Small
            $this->Small->ViewValue = $this->Small->CurrentValue;
            $this->Small->ViewCustomAttributes = "";

            // NoHalo
            $this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
            $this->NoHalo->ViewCustomAttributes = "";

            // Fragmented
            $this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
            $this->Fragmented->ViewCustomAttributes = "";

            // NonFragmented
            $this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
            $this->NonFragmented->ViewCustomAttributes = "";

            // DFI
            $this->DFI->ViewValue = $this->DFI->CurrentValue;
            $this->DFI->ViewCustomAttributes = "";

            // IsueBy
            $this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
            $this->IsueBy->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
            $this->ProgressiveMotility2->ViewCustomAttributes = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
            $this->NonProgrssiveMotile2->ViewCustomAttributes = "";

            // Immotile2
            $this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
            $this->Immotile2->ViewCustomAttributes = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
            $this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

            // IssuedBy
            $this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
            $this->IssuedBy->ViewCustomAttributes = "";

            // IssuedTo
            $this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
            $this->IssuedTo->ViewCustomAttributes = "";

            // MACS
            if (strval($this->MACS->CurrentValue) != "") {
                $this->MACS->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->MACS->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->MACS->ViewValue->add($this->MACS->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->MACS->ViewValue = null;
            }
            $this->MACS->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) != "") {
                $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->optionCaption($this->SPECIFIC_PROBLEMS->CurrentValue);
            } else {
                $this->SPECIFIC_PROBLEMS->ViewValue = null;
            }
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) != "") {
                $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
            } else {
                $this->LIQUIFACTION_STORAGE->ViewValue = null;
            }
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            if (strval($this->IUI_PREP_METHOD->CurrentValue) != "") {
                $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
            } else {
                $this->IUI_PREP_METHOD->ViewValue = null;
            }
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            if (strval($this->TIME_FROM_TRIGGER->CurrentValue) != "") {
                $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
            } else {
                $this->TIME_FROM_TRIGGER->ViewValue = null;
            }
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) != "") {
                $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
            } else {
                $this->COLLECTION_TO_PREPARATION->ViewValue = null;
            }
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            if (strval($this->TIME_FROM_PREP_TO_INSEM->CurrentValue) != "") {
                $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->optionCaption($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            } else {
                $this->TIME_FROM_PREP_TO_INSEM->ViewValue = null;
            }
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";
            $this->PaID->TooltipValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";
            $this->PaName->TooltipValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";
            $this->PaMobile->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";
            $this->HusbandName->TooltipValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";
            $this->RequestDr->TooltipValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";
            $this->CollectionDate->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";
            $this->RequestSample->TooltipValue = "";

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";
            $this->CollectionType->TooltipValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";
            $this->CollectionMethod->TooltipValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";
            $this->Medicationused->TooltipValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";
            $this->DifficultiesinCollection->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";
            $this->pH->TooltipValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";
            $this->Timeofcollection->TooltipValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";
            $this->Timeofexamination->TooltipValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";
            $this->Concentration->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";
            $this->ProgressiveMotility->TooltipValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";
            $this->NonProgrssiveMotile->TooltipValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";
            $this->Immotile->TooltipValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";
            $this->TotalProgrssiveMotile->TooltipValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";
            $this->Appearance->TooltipValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";
            $this->Homogenosity->TooltipValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";
            $this->CompleteSample->TooltipValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";
            $this->Liquefactiontime->TooltipValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";
            $this->Normal->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";
            $this->Headdefects->TooltipValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";
            $this->MidpieceDefects->TooltipValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";
            $this->TailDefects->TooltipValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";
            $this->NormalProgMotile->TooltipValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";
            $this->ImmatureForms->TooltipValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";
            $this->Leucocytes->TooltipValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";
            $this->Agglutination->TooltipValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";
            $this->Debris->TooltipValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";
            $this->Diagnosis->TooltipValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";
            $this->Observations->TooltipValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";
            $this->Signature->TooltipValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";
            $this->SemenOrgin->TooltipValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";
            $this->Donor->TooltipValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";
            $this->DonorBloodgroup->TooltipValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";
            $this->Location->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";
            $this->Concentration1->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";
            $this->ProgressiveMotility1->TooltipValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";
            $this->NonProgrssiveMotile1->TooltipValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";
            $this->Immotile1->TooltipValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";
            $this->TotalProgrssiveMotile1->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";
            $this->Color->TooltipValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";
            $this->DoneBy->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";
            $this->Abstinence->TooltipValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";
            $this->ProcessedBy->TooltipValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";
            $this->InseminationTime->TooltipValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";
            $this->InseminationBy->TooltipValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";
            $this->Big->TooltipValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";
            $this->Medium->TooltipValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";
            $this->Small->TooltipValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";
            $this->NoHalo->TooltipValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";
            $this->Fragmented->TooltipValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";
            $this->NonFragmented->TooltipValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";
            $this->DFI->TooltipValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";
            $this->IsueBy->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";
            $this->ProgressiveMotility2->TooltipValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";
            $this->NonProgrssiveMotile2->TooltipValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";
            $this->Immotile2->TooltipValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";
            $this->TotalProgrssiveMotile2->TooltipValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";
            $this->IssuedBy->TooltipValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";
            $this->IssuedTo->TooltipValue = "";

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";
            $this->MACS->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_PROBLEMS->TooltipValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";
            $this->IMSC_1->TooltipValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";
            $this->IMSC_2->TooltipValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";
            $this->LIQUIFACTION_STORAGE->TooltipValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";
            $this->IUI_PREP_METHOD->TooltipValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";
            $this->TIME_FROM_TRIGGER->TooltipValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";
            $this->COLLECTION_TO_PREPARATION->TooltipValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
            $this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PaID
            $this->PaID->EditAttrs["class"] = "form-control";
            $this->PaID->EditCustomAttributes = "";
            if (!$this->PaID->Raw) {
                $this->PaID->AdvancedSearch->SearchValue = HtmlDecode($this->PaID->AdvancedSearch->SearchValue);
            }
            $this->PaID->EditValue = HtmlEncode($this->PaID->AdvancedSearch->SearchValue);
            $this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

            // PaName
            $this->PaName->EditAttrs["class"] = "form-control";
            $this->PaName->EditCustomAttributes = "";
            if (!$this->PaName->Raw) {
                $this->PaName->AdvancedSearch->SearchValue = HtmlDecode($this->PaName->AdvancedSearch->SearchValue);
            }
            $this->PaName->EditValue = HtmlEncode($this->PaName->AdvancedSearch->SearchValue);
            $this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

            // PaMobile
            $this->PaMobile->EditAttrs["class"] = "form-control";
            $this->PaMobile->EditCustomAttributes = "";
            if (!$this->PaMobile->Raw) {
                $this->PaMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PaMobile->AdvancedSearch->SearchValue);
            }
            $this->PaMobile->EditValue = HtmlEncode($this->PaMobile->AdvancedSearch->SearchValue);
            $this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

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

            // RIDNo
            $this->RIDNo->EditCustomAttributes = "";
            $curVal = trim(strval($this->RIDNo->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->RIDNo->AdvancedSearch->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
            } else {
                $this->RIDNo->AdvancedSearch->ViewValue = $this->RIDNo->Lookup !== null && is_array($this->RIDNo->Lookup->Options) ? $curVal : null;
            }
            if ($this->RIDNo->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->RIDNo->EditValue = array_values($this->RIDNo->Lookup->Options);
                if ($this->RIDNo->AdvancedSearch->ViewValue == "") {
                    $this->RIDNo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->RIDNo->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->RIDNo->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RIDNo->Lookup->renderViewRow($rswrk[0]);
                    $this->RIDNo->AdvancedSearch->ViewValue = $this->RIDNo->displayValue($arwrk);
                } else {
                    $this->RIDNo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->RIDNo->EditValue = $arwrk;
            }
            $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->PatientName->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PatientName->EditValue = $this->PatientName->lookupCacheOption($curVal);
                if ($this->PatientName->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientName->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientName->EditValue = $this->PatientName->displayValue($arwrk);
                    } else {
                        $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->PatientName->EditValue = null;
            }
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // HusbandName
            $this->HusbandName->EditCustomAttributes = "";
            $curVal = trim(strval($this->HusbandName->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->HusbandName->AdvancedSearch->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
            } else {
                $this->HusbandName->AdvancedSearch->ViewValue = $this->HusbandName->Lookup !== null && is_array($this->HusbandName->Lookup->Options) ? $curVal : null;
            }
            if ($this->HusbandName->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->HusbandName->EditValue = array_values($this->HusbandName->Lookup->Options);
                if ($this->HusbandName->AdvancedSearch->ViewValue == "") {
                    $this->HusbandName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->HusbandName->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->HusbandName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HusbandName->Lookup->renderViewRow($rswrk[0]);
                    $this->HusbandName->AdvancedSearch->ViewValue = $this->HusbandName->displayValue($arwrk);
                } else {
                    $this->HusbandName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->HusbandName->EditValue = $arwrk;
            }
            $this->HusbandName->PlaceHolder = RemoveHtml($this->HusbandName->caption());

            // RequestDr
            $this->RequestDr->EditAttrs["class"] = "form-control";
            $this->RequestDr->EditCustomAttributes = "";
            if (!$this->RequestDr->Raw) {
                $this->RequestDr->AdvancedSearch->SearchValue = HtmlDecode($this->RequestDr->AdvancedSearch->SearchValue);
            }
            $this->RequestDr->EditValue = HtmlEncode($this->RequestDr->AdvancedSearch->SearchValue);
            $this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

            // CollectionDate
            $this->CollectionDate->EditAttrs["class"] = "form-control";
            $this->CollectionDate->EditCustomAttributes = "";
            $this->CollectionDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CollectionDate->AdvancedSearch->SearchValue, 7), 7));
            $this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 7), 7));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // RequestSample
            $this->RequestSample->EditAttrs["class"] = "form-control";
            $this->RequestSample->EditCustomAttributes = "";
            $this->RequestSample->EditValue = $this->RequestSample->options(true);
            $this->RequestSample->PlaceHolder = RemoveHtml($this->RequestSample->caption());

            // CollectionType
            $this->CollectionType->EditAttrs["class"] = "form-control";
            $this->CollectionType->EditCustomAttributes = "";
            $this->CollectionType->EditValue = $this->CollectionType->options(true);
            $this->CollectionType->PlaceHolder = RemoveHtml($this->CollectionType->caption());

            // CollectionMethod
            $this->CollectionMethod->EditAttrs["class"] = "form-control";
            $this->CollectionMethod->EditCustomAttributes = "";
            $this->CollectionMethod->EditValue = $this->CollectionMethod->options(true);
            $this->CollectionMethod->PlaceHolder = RemoveHtml($this->CollectionMethod->caption());

            // Medicationused
            $this->Medicationused->EditAttrs["class"] = "form-control";
            $this->Medicationused->EditCustomAttributes = "";
            $curVal = trim(strval($this->Medicationused->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->Medicationused->AdvancedSearch->ViewValue = $this->Medicationused->lookupCacheOption($curVal);
            } else {
                $this->Medicationused->AdvancedSearch->ViewValue = $this->Medicationused->Lookup !== null && is_array($this->Medicationused->Lookup->Options) ? $curVal : null;
            }
            if ($this->Medicationused->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->Medicationused->EditValue = array_values($this->Medicationused->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Medication`" . SearchString("=", $this->Medicationused->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Medicationused->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Medicationused->EditValue = $arwrk;
            }
            $this->Medicationused->PlaceHolder = RemoveHtml($this->Medicationused->caption());

            // DifficultiesinCollection
            $this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
            $this->DifficultiesinCollection->EditCustomAttributes = "";
            $this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(true);
            $this->DifficultiesinCollection->PlaceHolder = RemoveHtml($this->DifficultiesinCollection->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            if (!$this->Volume->Raw) {
                $this->Volume->AdvancedSearch->SearchValue = HtmlDecode($this->Volume->AdvancedSearch->SearchValue);
            }
            $this->Volume->EditValue = HtmlEncode($this->Volume->AdvancedSearch->SearchValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

            // pH
            $this->pH->EditAttrs["class"] = "form-control";
            $this->pH->EditCustomAttributes = "";
            if (!$this->pH->Raw) {
                $this->pH->AdvancedSearch->SearchValue = HtmlDecode($this->pH->AdvancedSearch->SearchValue);
            }
            $this->pH->EditValue = HtmlEncode($this->pH->AdvancedSearch->SearchValue);
            $this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

            // Timeofcollection
            $this->Timeofcollection->EditAttrs["class"] = "form-control";
            $this->Timeofcollection->EditCustomAttributes = "";
            if (!$this->Timeofcollection->Raw) {
                $this->Timeofcollection->AdvancedSearch->SearchValue = HtmlDecode($this->Timeofcollection->AdvancedSearch->SearchValue);
            }
            $this->Timeofcollection->EditValue = HtmlEncode($this->Timeofcollection->AdvancedSearch->SearchValue);
            $this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

            // Timeofexamination
            $this->Timeofexamination->EditAttrs["class"] = "form-control";
            $this->Timeofexamination->EditCustomAttributes = "";
            if (!$this->Timeofexamination->Raw) {
                $this->Timeofexamination->AdvancedSearch->SearchValue = HtmlDecode($this->Timeofexamination->AdvancedSearch->SearchValue);
            }
            $this->Timeofexamination->EditValue = HtmlEncode($this->Timeofexamination->AdvancedSearch->SearchValue);
            $this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

            // Concentration
            $this->Concentration->EditAttrs["class"] = "form-control";
            $this->Concentration->EditCustomAttributes = "";
            if (!$this->Concentration->Raw) {
                $this->Concentration->AdvancedSearch->SearchValue = HtmlDecode($this->Concentration->AdvancedSearch->SearchValue);
            }
            $this->Concentration->EditValue = HtmlEncode($this->Concentration->AdvancedSearch->SearchValue);
            $this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

            // Total
            $this->Total->EditAttrs["class"] = "form-control";
            $this->Total->EditCustomAttributes = "";
            if (!$this->Total->Raw) {
                $this->Total->AdvancedSearch->SearchValue = HtmlDecode($this->Total->AdvancedSearch->SearchValue);
            }
            $this->Total->EditValue = HtmlEncode($this->Total->AdvancedSearch->SearchValue);
            $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

            // ProgressiveMotility
            $this->ProgressiveMotility->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility->Raw) {
                $this->ProgressiveMotility->AdvancedSearch->SearchValue = HtmlDecode($this->ProgressiveMotility->AdvancedSearch->SearchValue);
            }
            $this->ProgressiveMotility->EditValue = HtmlEncode($this->ProgressiveMotility->AdvancedSearch->SearchValue);
            $this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile->Raw) {
                $this->NonProgrssiveMotile->AdvancedSearch->SearchValue = HtmlDecode($this->NonProgrssiveMotile->AdvancedSearch->SearchValue);
            }
            $this->NonProgrssiveMotile->EditValue = HtmlEncode($this->NonProgrssiveMotile->AdvancedSearch->SearchValue);
            $this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

            // Immotile
            $this->Immotile->EditAttrs["class"] = "form-control";
            $this->Immotile->EditCustomAttributes = "";
            if (!$this->Immotile->Raw) {
                $this->Immotile->AdvancedSearch->SearchValue = HtmlDecode($this->Immotile->AdvancedSearch->SearchValue);
            }
            $this->Immotile->EditValue = HtmlEncode($this->Immotile->AdvancedSearch->SearchValue);
            $this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile->Raw) {
                $this->TotalProgrssiveMotile->AdvancedSearch->SearchValue = HtmlDecode($this->TotalProgrssiveMotile->AdvancedSearch->SearchValue);
            }
            $this->TotalProgrssiveMotile->EditValue = HtmlEncode($this->TotalProgrssiveMotile->AdvancedSearch->SearchValue);
            $this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

            // Appearance
            $this->Appearance->EditAttrs["class"] = "form-control";
            $this->Appearance->EditCustomAttributes = "";
            if (!$this->Appearance->Raw) {
                $this->Appearance->AdvancedSearch->SearchValue = HtmlDecode($this->Appearance->AdvancedSearch->SearchValue);
            }
            $this->Appearance->EditValue = HtmlEncode($this->Appearance->AdvancedSearch->SearchValue);
            $this->Appearance->PlaceHolder = RemoveHtml($this->Appearance->caption());

            // Homogenosity
            $this->Homogenosity->EditAttrs["class"] = "form-control";
            $this->Homogenosity->EditCustomAttributes = "";
            $this->Homogenosity->EditValue = $this->Homogenosity->options(true);
            $this->Homogenosity->PlaceHolder = RemoveHtml($this->Homogenosity->caption());

            // CompleteSample
            $this->CompleteSample->EditAttrs["class"] = "form-control";
            $this->CompleteSample->EditCustomAttributes = "";
            $this->CompleteSample->EditValue = $this->CompleteSample->options(true);
            $this->CompleteSample->PlaceHolder = RemoveHtml($this->CompleteSample->caption());

            // Liquefactiontime
            $this->Liquefactiontime->EditAttrs["class"] = "form-control";
            $this->Liquefactiontime->EditCustomAttributes = "";
            if (!$this->Liquefactiontime->Raw) {
                $this->Liquefactiontime->AdvancedSearch->SearchValue = HtmlDecode($this->Liquefactiontime->AdvancedSearch->SearchValue);
            }
            $this->Liquefactiontime->EditValue = HtmlEncode($this->Liquefactiontime->AdvancedSearch->SearchValue);
            $this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

            // Normal
            $this->Normal->EditAttrs["class"] = "form-control";
            $this->Normal->EditCustomAttributes = "";
            if (!$this->Normal->Raw) {
                $this->Normal->AdvancedSearch->SearchValue = HtmlDecode($this->Normal->AdvancedSearch->SearchValue);
            }
            $this->Normal->EditValue = HtmlEncode($this->Normal->AdvancedSearch->SearchValue);
            $this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // Headdefects
            $this->Headdefects->EditAttrs["class"] = "form-control";
            $this->Headdefects->EditCustomAttributes = "";
            if (!$this->Headdefects->Raw) {
                $this->Headdefects->AdvancedSearch->SearchValue = HtmlDecode($this->Headdefects->AdvancedSearch->SearchValue);
            }
            $this->Headdefects->EditValue = HtmlEncode($this->Headdefects->AdvancedSearch->SearchValue);
            $this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

            // MidpieceDefects
            $this->MidpieceDefects->EditAttrs["class"] = "form-control";
            $this->MidpieceDefects->EditCustomAttributes = "";
            if (!$this->MidpieceDefects->Raw) {
                $this->MidpieceDefects->AdvancedSearch->SearchValue = HtmlDecode($this->MidpieceDefects->AdvancedSearch->SearchValue);
            }
            $this->MidpieceDefects->EditValue = HtmlEncode($this->MidpieceDefects->AdvancedSearch->SearchValue);
            $this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

            // TailDefects
            $this->TailDefects->EditAttrs["class"] = "form-control";
            $this->TailDefects->EditCustomAttributes = "";
            if (!$this->TailDefects->Raw) {
                $this->TailDefects->AdvancedSearch->SearchValue = HtmlDecode($this->TailDefects->AdvancedSearch->SearchValue);
            }
            $this->TailDefects->EditValue = HtmlEncode($this->TailDefects->AdvancedSearch->SearchValue);
            $this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

            // NormalProgMotile
            $this->NormalProgMotile->EditAttrs["class"] = "form-control";
            $this->NormalProgMotile->EditCustomAttributes = "";
            if (!$this->NormalProgMotile->Raw) {
                $this->NormalProgMotile->AdvancedSearch->SearchValue = HtmlDecode($this->NormalProgMotile->AdvancedSearch->SearchValue);
            }
            $this->NormalProgMotile->EditValue = HtmlEncode($this->NormalProgMotile->AdvancedSearch->SearchValue);
            $this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

            // ImmatureForms
            $this->ImmatureForms->EditAttrs["class"] = "form-control";
            $this->ImmatureForms->EditCustomAttributes = "";
            if (!$this->ImmatureForms->Raw) {
                $this->ImmatureForms->AdvancedSearch->SearchValue = HtmlDecode($this->ImmatureForms->AdvancedSearch->SearchValue);
            }
            $this->ImmatureForms->EditValue = HtmlEncode($this->ImmatureForms->AdvancedSearch->SearchValue);
            $this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

            // Leucocytes
            $this->Leucocytes->EditAttrs["class"] = "form-control";
            $this->Leucocytes->EditCustomAttributes = "";
            if (!$this->Leucocytes->Raw) {
                $this->Leucocytes->AdvancedSearch->SearchValue = HtmlDecode($this->Leucocytes->AdvancedSearch->SearchValue);
            }
            $this->Leucocytes->EditValue = HtmlEncode($this->Leucocytes->AdvancedSearch->SearchValue);
            $this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

            // Agglutination
            $this->Agglutination->EditAttrs["class"] = "form-control";
            $this->Agglutination->EditCustomAttributes = "";
            if (!$this->Agglutination->Raw) {
                $this->Agglutination->AdvancedSearch->SearchValue = HtmlDecode($this->Agglutination->AdvancedSearch->SearchValue);
            }
            $this->Agglutination->EditValue = HtmlEncode($this->Agglutination->AdvancedSearch->SearchValue);
            $this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

            // Debris
            $this->Debris->EditAttrs["class"] = "form-control";
            $this->Debris->EditCustomAttributes = "";
            if (!$this->Debris->Raw) {
                $this->Debris->AdvancedSearch->SearchValue = HtmlDecode($this->Debris->AdvancedSearch->SearchValue);
            }
            $this->Debris->EditValue = HtmlEncode($this->Debris->AdvancedSearch->SearchValue);
            $this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

            // Diagnosis
            $this->Diagnosis->EditAttrs["class"] = "form-control";
            $this->Diagnosis->EditCustomAttributes = "";
            if (!$this->Diagnosis->Raw) {
                $this->Diagnosis->AdvancedSearch->SearchValue = HtmlDecode($this->Diagnosis->AdvancedSearch->SearchValue);
            }
            $this->Diagnosis->EditValue = HtmlEncode($this->Diagnosis->AdvancedSearch->SearchValue);
            $this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

            // Observations
            $this->Observations->EditAttrs["class"] = "form-control";
            $this->Observations->EditCustomAttributes = "";
            if (!$this->Observations->Raw) {
                $this->Observations->AdvancedSearch->SearchValue = HtmlDecode($this->Observations->AdvancedSearch->SearchValue);
            }
            $this->Observations->EditValue = HtmlEncode($this->Observations->AdvancedSearch->SearchValue);
            $this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

            // Signature
            $this->Signature->EditAttrs["class"] = "form-control";
            $this->Signature->EditCustomAttributes = "";
            if (!$this->Signature->Raw) {
                $this->Signature->AdvancedSearch->SearchValue = HtmlDecode($this->Signature->AdvancedSearch->SearchValue);
            }
            $this->Signature->EditValue = HtmlEncode($this->Signature->AdvancedSearch->SearchValue);
            $this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

            // SemenOrgin
            $this->SemenOrgin->EditAttrs["class"] = "form-control";
            $this->SemenOrgin->EditCustomAttributes = "";
            $this->SemenOrgin->EditValue = $this->SemenOrgin->options(true);
            $this->SemenOrgin->PlaceHolder = RemoveHtml($this->SemenOrgin->caption());

            // Donor
            $this->Donor->EditCustomAttributes = "";
            $curVal = trim(strval($this->Donor->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->Donor->AdvancedSearch->ViewValue = $this->Donor->lookupCacheOption($curVal);
            } else {
                $this->Donor->AdvancedSearch->ViewValue = $this->Donor->Lookup !== null && is_array($this->Donor->Lookup->Options) ? $curVal : null;
            }
            if ($this->Donor->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->Donor->EditValue = array_values($this->Donor->Lookup->Options);
                if ($this->Donor->AdvancedSearch->ViewValue == "") {
                    $this->Donor->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Donor->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Donor->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                    $this->Donor->AdvancedSearch->ViewValue = $this->Donor->displayValue($arwrk);
                } else {
                    $this->Donor->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Donor->EditValue = $arwrk;
            }
            $this->Donor->PlaceHolder = RemoveHtml($this->Donor->caption());

            // DonorBloodgroup
            $this->DonorBloodgroup->EditAttrs["class"] = "form-control";
            $this->DonorBloodgroup->EditCustomAttributes = "";
            if (!$this->DonorBloodgroup->Raw) {
                $this->DonorBloodgroup->AdvancedSearch->SearchValue = HtmlDecode($this->DonorBloodgroup->AdvancedSearch->SearchValue);
            }
            $this->DonorBloodgroup->EditValue = HtmlEncode($this->DonorBloodgroup->AdvancedSearch->SearchValue);
            $this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->AdvancedSearch->SearchValue = HtmlDecode($this->Tank->AdvancedSearch->SearchValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->AdvancedSearch->SearchValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Location
            $this->Location->EditAttrs["class"] = "form-control";
            $this->Location->EditCustomAttributes = "";
            if (!$this->Location->Raw) {
                $this->Location->AdvancedSearch->SearchValue = HtmlDecode($this->Location->AdvancedSearch->SearchValue);
            }
            $this->Location->EditValue = HtmlEncode($this->Location->AdvancedSearch->SearchValue);
            $this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

            // Volume1
            $this->Volume1->EditAttrs["class"] = "form-control";
            $this->Volume1->EditCustomAttributes = "";
            if (!$this->Volume1->Raw) {
                $this->Volume1->AdvancedSearch->SearchValue = HtmlDecode($this->Volume1->AdvancedSearch->SearchValue);
            }
            $this->Volume1->EditValue = HtmlEncode($this->Volume1->AdvancedSearch->SearchValue);
            $this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

            // Concentration1
            $this->Concentration1->EditAttrs["class"] = "form-control";
            $this->Concentration1->EditCustomAttributes = "";
            if (!$this->Concentration1->Raw) {
                $this->Concentration1->AdvancedSearch->SearchValue = HtmlDecode($this->Concentration1->AdvancedSearch->SearchValue);
            }
            $this->Concentration1->EditValue = HtmlEncode($this->Concentration1->AdvancedSearch->SearchValue);
            $this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

            // Total1
            $this->Total1->EditAttrs["class"] = "form-control";
            $this->Total1->EditCustomAttributes = "";
            if (!$this->Total1->Raw) {
                $this->Total1->AdvancedSearch->SearchValue = HtmlDecode($this->Total1->AdvancedSearch->SearchValue);
            }
            $this->Total1->EditValue = HtmlEncode($this->Total1->AdvancedSearch->SearchValue);
            $this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

            // ProgressiveMotility1
            $this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility1->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility1->Raw) {
                $this->ProgressiveMotility1->AdvancedSearch->SearchValue = HtmlDecode($this->ProgressiveMotility1->AdvancedSearch->SearchValue);
            }
            $this->ProgressiveMotility1->EditValue = HtmlEncode($this->ProgressiveMotility1->AdvancedSearch->SearchValue);
            $this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile1->Raw) {
                $this->NonProgrssiveMotile1->AdvancedSearch->SearchValue = HtmlDecode($this->NonProgrssiveMotile1->AdvancedSearch->SearchValue);
            }
            $this->NonProgrssiveMotile1->EditValue = HtmlEncode($this->NonProgrssiveMotile1->AdvancedSearch->SearchValue);
            $this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

            // Immotile1
            $this->Immotile1->EditAttrs["class"] = "form-control";
            $this->Immotile1->EditCustomAttributes = "";
            if (!$this->Immotile1->Raw) {
                $this->Immotile1->AdvancedSearch->SearchValue = HtmlDecode($this->Immotile1->AdvancedSearch->SearchValue);
            }
            $this->Immotile1->EditValue = HtmlEncode($this->Immotile1->AdvancedSearch->SearchValue);
            $this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile1->Raw) {
                $this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue = HtmlDecode($this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue);
            }
            $this->TotalProgrssiveMotile1->EditValue = HtmlEncode($this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue);
            $this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->AdvancedSearch->SearchValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Color
            $this->Color->EditAttrs["class"] = "form-control";
            $this->Color->EditCustomAttributes = "";
            if (!$this->Color->Raw) {
                $this->Color->AdvancedSearch->SearchValue = HtmlDecode($this->Color->AdvancedSearch->SearchValue);
            }
            $this->Color->EditValue = HtmlEncode($this->Color->AdvancedSearch->SearchValue);
            $this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

            // DoneBy
            $this->DoneBy->EditAttrs["class"] = "form-control";
            $this->DoneBy->EditCustomAttributes = "";
            if (!$this->DoneBy->Raw) {
                $this->DoneBy->AdvancedSearch->SearchValue = HtmlDecode($this->DoneBy->AdvancedSearch->SearchValue);
            }
            $this->DoneBy->EditValue = HtmlEncode($this->DoneBy->AdvancedSearch->SearchValue);
            $this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->AdvancedSearch->SearchValue = HtmlDecode($this->Method->AdvancedSearch->SearchValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->AdvancedSearch->SearchValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Abstinence
            $this->Abstinence->EditAttrs["class"] = "form-control";
            $this->Abstinence->EditCustomAttributes = "";
            if (!$this->Abstinence->Raw) {
                $this->Abstinence->AdvancedSearch->SearchValue = HtmlDecode($this->Abstinence->AdvancedSearch->SearchValue);
            }
            $this->Abstinence->EditValue = HtmlEncode($this->Abstinence->AdvancedSearch->SearchValue);
            $this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

            // ProcessedBy
            $this->ProcessedBy->EditAttrs["class"] = "form-control";
            $this->ProcessedBy->EditCustomAttributes = "";
            if (!$this->ProcessedBy->Raw) {
                $this->ProcessedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ProcessedBy->AdvancedSearch->SearchValue);
            }
            $this->ProcessedBy->EditValue = HtmlEncode($this->ProcessedBy->AdvancedSearch->SearchValue);
            $this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

            // InseminationTime
            $this->InseminationTime->EditAttrs["class"] = "form-control";
            $this->InseminationTime->EditCustomAttributes = "";
            if (!$this->InseminationTime->Raw) {
                $this->InseminationTime->AdvancedSearch->SearchValue = HtmlDecode($this->InseminationTime->AdvancedSearch->SearchValue);
            }
            $this->InseminationTime->EditValue = HtmlEncode($this->InseminationTime->AdvancedSearch->SearchValue);
            $this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

            // InseminationBy
            $this->InseminationBy->EditAttrs["class"] = "form-control";
            $this->InseminationBy->EditCustomAttributes = "";
            if (!$this->InseminationBy->Raw) {
                $this->InseminationBy->AdvancedSearch->SearchValue = HtmlDecode($this->InseminationBy->AdvancedSearch->SearchValue);
            }
            $this->InseminationBy->EditValue = HtmlEncode($this->InseminationBy->AdvancedSearch->SearchValue);
            $this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

            // Big
            $this->Big->EditAttrs["class"] = "form-control";
            $this->Big->EditCustomAttributes = "";
            if (!$this->Big->Raw) {
                $this->Big->AdvancedSearch->SearchValue = HtmlDecode($this->Big->AdvancedSearch->SearchValue);
            }
            $this->Big->EditValue = HtmlEncode($this->Big->AdvancedSearch->SearchValue);
            $this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

            // Medium
            $this->Medium->EditAttrs["class"] = "form-control";
            $this->Medium->EditCustomAttributes = "";
            if (!$this->Medium->Raw) {
                $this->Medium->AdvancedSearch->SearchValue = HtmlDecode($this->Medium->AdvancedSearch->SearchValue);
            }
            $this->Medium->EditValue = HtmlEncode($this->Medium->AdvancedSearch->SearchValue);
            $this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

            // Small
            $this->Small->EditAttrs["class"] = "form-control";
            $this->Small->EditCustomAttributes = "";
            if (!$this->Small->Raw) {
                $this->Small->AdvancedSearch->SearchValue = HtmlDecode($this->Small->AdvancedSearch->SearchValue);
            }
            $this->Small->EditValue = HtmlEncode($this->Small->AdvancedSearch->SearchValue);
            $this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

            // NoHalo
            $this->NoHalo->EditAttrs["class"] = "form-control";
            $this->NoHalo->EditCustomAttributes = "";
            if (!$this->NoHalo->Raw) {
                $this->NoHalo->AdvancedSearch->SearchValue = HtmlDecode($this->NoHalo->AdvancedSearch->SearchValue);
            }
            $this->NoHalo->EditValue = HtmlEncode($this->NoHalo->AdvancedSearch->SearchValue);
            $this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

            // Fragmented
            $this->Fragmented->EditAttrs["class"] = "form-control";
            $this->Fragmented->EditCustomAttributes = "";
            if (!$this->Fragmented->Raw) {
                $this->Fragmented->AdvancedSearch->SearchValue = HtmlDecode($this->Fragmented->AdvancedSearch->SearchValue);
            }
            $this->Fragmented->EditValue = HtmlEncode($this->Fragmented->AdvancedSearch->SearchValue);
            $this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

            // NonFragmented
            $this->NonFragmented->EditAttrs["class"] = "form-control";
            $this->NonFragmented->EditCustomAttributes = "";
            if (!$this->NonFragmented->Raw) {
                $this->NonFragmented->AdvancedSearch->SearchValue = HtmlDecode($this->NonFragmented->AdvancedSearch->SearchValue);
            }
            $this->NonFragmented->EditValue = HtmlEncode($this->NonFragmented->AdvancedSearch->SearchValue);
            $this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

            // DFI
            $this->DFI->EditAttrs["class"] = "form-control";
            $this->DFI->EditCustomAttributes = "";
            if (!$this->DFI->Raw) {
                $this->DFI->AdvancedSearch->SearchValue = HtmlDecode($this->DFI->AdvancedSearch->SearchValue);
            }
            $this->DFI->EditValue = HtmlEncode($this->DFI->AdvancedSearch->SearchValue);
            $this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

            // IsueBy
            $this->IsueBy->EditAttrs["class"] = "form-control";
            $this->IsueBy->EditCustomAttributes = "";
            if (!$this->IsueBy->Raw) {
                $this->IsueBy->AdvancedSearch->SearchValue = HtmlDecode($this->IsueBy->AdvancedSearch->SearchValue);
            }
            $this->IsueBy->EditValue = HtmlEncode($this->IsueBy->AdvancedSearch->SearchValue);
            $this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

            // Volume2
            $this->Volume2->EditAttrs["class"] = "form-control";
            $this->Volume2->EditCustomAttributes = "";
            if (!$this->Volume2->Raw) {
                $this->Volume2->AdvancedSearch->SearchValue = HtmlDecode($this->Volume2->AdvancedSearch->SearchValue);
            }
            $this->Volume2->EditValue = HtmlEncode($this->Volume2->AdvancedSearch->SearchValue);
            $this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

            // Concentration2
            $this->Concentration2->EditAttrs["class"] = "form-control";
            $this->Concentration2->EditCustomAttributes = "";
            if (!$this->Concentration2->Raw) {
                $this->Concentration2->AdvancedSearch->SearchValue = HtmlDecode($this->Concentration2->AdvancedSearch->SearchValue);
            }
            $this->Concentration2->EditValue = HtmlEncode($this->Concentration2->AdvancedSearch->SearchValue);
            $this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

            // Total2
            $this->Total2->EditAttrs["class"] = "form-control";
            $this->Total2->EditCustomAttributes = "";
            if (!$this->Total2->Raw) {
                $this->Total2->AdvancedSearch->SearchValue = HtmlDecode($this->Total2->AdvancedSearch->SearchValue);
            }
            $this->Total2->EditValue = HtmlEncode($this->Total2->AdvancedSearch->SearchValue);
            $this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

            // ProgressiveMotility2
            $this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility2->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility2->Raw) {
                $this->ProgressiveMotility2->AdvancedSearch->SearchValue = HtmlDecode($this->ProgressiveMotility2->AdvancedSearch->SearchValue);
            }
            $this->ProgressiveMotility2->EditValue = HtmlEncode($this->ProgressiveMotility2->AdvancedSearch->SearchValue);
            $this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile2->Raw) {
                $this->NonProgrssiveMotile2->AdvancedSearch->SearchValue = HtmlDecode($this->NonProgrssiveMotile2->AdvancedSearch->SearchValue);
            }
            $this->NonProgrssiveMotile2->EditValue = HtmlEncode($this->NonProgrssiveMotile2->AdvancedSearch->SearchValue);
            $this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

            // Immotile2
            $this->Immotile2->EditAttrs["class"] = "form-control";
            $this->Immotile2->EditCustomAttributes = "";
            if (!$this->Immotile2->Raw) {
                $this->Immotile2->AdvancedSearch->SearchValue = HtmlDecode($this->Immotile2->AdvancedSearch->SearchValue);
            }
            $this->Immotile2->EditValue = HtmlEncode($this->Immotile2->AdvancedSearch->SearchValue);
            $this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile2->Raw) {
                $this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue = HtmlDecode($this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue);
            }
            $this->TotalProgrssiveMotile2->EditValue = HtmlEncode($this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue);
            $this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

            // IssuedBy
            $this->IssuedBy->EditAttrs["class"] = "form-control";
            $this->IssuedBy->EditCustomAttributes = "";
            if (!$this->IssuedBy->Raw) {
                $this->IssuedBy->AdvancedSearch->SearchValue = HtmlDecode($this->IssuedBy->AdvancedSearch->SearchValue);
            }
            $this->IssuedBy->EditValue = HtmlEncode($this->IssuedBy->AdvancedSearch->SearchValue);
            $this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

            // IssuedTo
            $this->IssuedTo->EditAttrs["class"] = "form-control";
            $this->IssuedTo->EditCustomAttributes = "";
            if (!$this->IssuedTo->Raw) {
                $this->IssuedTo->AdvancedSearch->SearchValue = HtmlDecode($this->IssuedTo->AdvancedSearch->SearchValue);
            }
            $this->IssuedTo->EditValue = HtmlEncode($this->IssuedTo->AdvancedSearch->SearchValue);
            $this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

            // MACS
            $this->MACS->EditCustomAttributes = "";
            $this->MACS->EditValue = $this->MACS->options(false);
            $this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(true);
            $this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

            // IMSC_1
            $this->IMSC_1->EditAttrs["class"] = "form-control";
            $this->IMSC_1->EditCustomAttributes = "";
            if (!$this->IMSC_1->Raw) {
                $this->IMSC_1->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_1->AdvancedSearch->SearchValue);
            }
            $this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->AdvancedSearch->SearchValue);
            $this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

            // IMSC_2
            $this->IMSC_2->EditAttrs["class"] = "form-control";
            $this->IMSC_2->EditCustomAttributes = "";
            if (!$this->IMSC_2->Raw) {
                $this->IMSC_2->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_2->AdvancedSearch->SearchValue);
            }
            $this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->AdvancedSearch->SearchValue);
            $this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
            $this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->options(true);
            $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
            $this->IUI_PREP_METHOD->EditCustomAttributes = "";
            $this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->options(true);
            $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->options(true);
            $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
            $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->options(true);
            $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->EditValue = $this->TIME_FROM_PREP_TO_INSEM->options(true);
            $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());
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
        if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
            $this->id->addErrorMessage($this->id->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->CollectionDate->AdvancedSearch->SearchValue)) {
            $this->CollectionDate->addErrorMessage($this->CollectionDate->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->ResultDate->AdvancedSearch->SearchValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if (!CheckInteger($this->TidNo->AdvancedSearch->SearchValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
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
        $this->PaID->AdvancedSearch->load();
        $this->PaName->AdvancedSearch->load();
        $this->PaMobile->AdvancedSearch->load();
        $this->PartnerID->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PartnerMobile->AdvancedSearch->load();
        $this->RIDNo->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->HusbandName->AdvancedSearch->load();
        $this->RequestDr->AdvancedSearch->load();
        $this->CollectionDate->AdvancedSearch->load();
        $this->ResultDate->AdvancedSearch->load();
        $this->RequestSample->AdvancedSearch->load();
        $this->CollectionType->AdvancedSearch->load();
        $this->CollectionMethod->AdvancedSearch->load();
        $this->Medicationused->AdvancedSearch->load();
        $this->DifficultiesinCollection->AdvancedSearch->load();
        $this->Volume->AdvancedSearch->load();
        $this->pH->AdvancedSearch->load();
        $this->Timeofcollection->AdvancedSearch->load();
        $this->Timeofexamination->AdvancedSearch->load();
        $this->Concentration->AdvancedSearch->load();
        $this->Total->AdvancedSearch->load();
        $this->ProgressiveMotility->AdvancedSearch->load();
        $this->NonProgrssiveMotile->AdvancedSearch->load();
        $this->Immotile->AdvancedSearch->load();
        $this->TotalProgrssiveMotile->AdvancedSearch->load();
        $this->Appearance->AdvancedSearch->load();
        $this->Homogenosity->AdvancedSearch->load();
        $this->CompleteSample->AdvancedSearch->load();
        $this->Liquefactiontime->AdvancedSearch->load();
        $this->Normal->AdvancedSearch->load();
        $this->Abnormal->AdvancedSearch->load();
        $this->Headdefects->AdvancedSearch->load();
        $this->MidpieceDefects->AdvancedSearch->load();
        $this->TailDefects->AdvancedSearch->load();
        $this->NormalProgMotile->AdvancedSearch->load();
        $this->ImmatureForms->AdvancedSearch->load();
        $this->Leucocytes->AdvancedSearch->load();
        $this->Agglutination->AdvancedSearch->load();
        $this->Debris->AdvancedSearch->load();
        $this->Diagnosis->AdvancedSearch->load();
        $this->Observations->AdvancedSearch->load();
        $this->Signature->AdvancedSearch->load();
        $this->SemenOrgin->AdvancedSearch->load();
        $this->Donor->AdvancedSearch->load();
        $this->DonorBloodgroup->AdvancedSearch->load();
        $this->Tank->AdvancedSearch->load();
        $this->Location->AdvancedSearch->load();
        $this->Volume1->AdvancedSearch->load();
        $this->Concentration1->AdvancedSearch->load();
        $this->Total1->AdvancedSearch->load();
        $this->ProgressiveMotility1->AdvancedSearch->load();
        $this->NonProgrssiveMotile1->AdvancedSearch->load();
        $this->Immotile1->AdvancedSearch->load();
        $this->TotalProgrssiveMotile1->AdvancedSearch->load();
        $this->TidNo->AdvancedSearch->load();
        $this->Color->AdvancedSearch->load();
        $this->DoneBy->AdvancedSearch->load();
        $this->Method->AdvancedSearch->load();
        $this->Abstinence->AdvancedSearch->load();
        $this->ProcessedBy->AdvancedSearch->load();
        $this->InseminationTime->AdvancedSearch->load();
        $this->InseminationBy->AdvancedSearch->load();
        $this->Big->AdvancedSearch->load();
        $this->Medium->AdvancedSearch->load();
        $this->Small->AdvancedSearch->load();
        $this->NoHalo->AdvancedSearch->load();
        $this->Fragmented->AdvancedSearch->load();
        $this->NonFragmented->AdvancedSearch->load();
        $this->DFI->AdvancedSearch->load();
        $this->IsueBy->AdvancedSearch->load();
        $this->Volume2->AdvancedSearch->load();
        $this->Concentration2->AdvancedSearch->load();
        $this->Total2->AdvancedSearch->load();
        $this->ProgressiveMotility2->AdvancedSearch->load();
        $this->NonProgrssiveMotile2->AdvancedSearch->load();
        $this->Immotile2->AdvancedSearch->load();
        $this->TotalProgrssiveMotile2->AdvancedSearch->load();
        $this->IssuedBy->AdvancedSearch->load();
        $this->IssuedTo->AdvancedSearch->load();
        $this->MACS->AdvancedSearch->load();
        $this->PREG_TEST_DATE->AdvancedSearch->load();
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
        $this->IMSC_1->AdvancedSearch->load();
        $this->IMSC_2->AdvancedSearch->load();
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
        $this->IUI_PREP_METHOD->AdvancedSearch->load();
        $this->TIME_FROM_TRIGGER->AdvancedSearch->load();
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewSemenanalysisList"), "", $this->TableVar, true);
        $pageId = "search";
        $Breadcrumb->add("search", $pageId, $url);
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
                case "x_RIDNo":
                    break;
                case "x_PatientName":
                    break;
                case "x_HusbandName":
                    break;
                case "x_RequestSample":
                    break;
                case "x_CollectionType":
                    break;
                case "x_CollectionMethod":
                    break;
                case "x_Medicationused":
                    break;
                case "x_DifficultiesinCollection":
                    break;
                case "x_Homogenosity":
                    break;
                case "x_CompleteSample":
                    break;
                case "x_SemenOrgin":
                    break;
                case "x_Donor":
                    break;
                case "x_MACS":
                    break;
                case "x_SPECIFIC_PROBLEMS":
                    break;
                case "x_LIQUIFACTION_STORAGE":
                    break;
                case "x_IUI_PREP_METHOD":
                    break;
                case "x_TIME_FROM_TRIGGER":
                    break;
                case "x_COLLECTION_TO_PREPARATION":
                    break;
                case "x_TIME_FROM_PREP_TO_INSEM":
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
}
