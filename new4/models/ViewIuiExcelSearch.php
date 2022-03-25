<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIuiExcelSearch extends ViewIuiExcel
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_iui_excel';

    // Page object name
    public $PageObjName = "ViewIuiExcelSearch";

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

        // Table object (view_iui_excel)
        if (!isset($GLOBALS["view_iui_excel"]) || get_class($GLOBALS["view_iui_excel"]) == PROJECT_NAMESPACE . "view_iui_excel") {
            $GLOBALS["view_iui_excel"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_iui_excel');
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
                $doc = new $class(Container("view_iui_excel"));
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
                    if ($pageName == "ViewIuiExcelView") {
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
            $key .= @$ar['CoupleID'];
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
        $this->NAME->setVisibility();
        $this->HUSBANDNAME->setVisibility();
        $this->CoupleID->setVisibility();
        $this->AGEWIFE->setVisibility();
        $this->AGEHUSBAND->setVisibility();
        $this->ANXIOUSTOCONCEIVEFOR->setVisibility();
        $this->AMHNGML->setVisibility();
        $this->TUBAL_PATENCY->setVisibility();
        $this->HSG->setVisibility();
        $this->DHL->setVisibility();
        $this->UTERINE_PROBLEMS->setVisibility();
        $this->W_COMORBIDS->setVisibility();
        $this->H_COMORBIDS->setVisibility();
        $this->SEXUAL_DYSFUNCTION->setVisibility();
        $this->PREVIUI->setVisibility();
        $this->PREV_IVF->setVisibility();
        $this->TABLETS->setVisibility();
        $this->INJTYPE->setVisibility();
        $this->LMP->setVisibility();
        $this->TRIGGERR->setVisibility();
        $this->TRIGGERDATE->setVisibility();
        $this->FOLLICLE_STATUS->setVisibility();
        $this->NUMBER_OF_IUI->setVisibility();
        $this->PROCEDURE->setVisibility();
        $this->LUTEAL_SUPPORT->setVisibility();
        $this->HDSAMPLE->setVisibility();
        $this->DONORID->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->COLLECTIONMETHOD->setVisibility();
        $this->SAMPLESOURCE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
        $this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
        $this->RESULTS->setVisibility();
        $this->ONGOING_PREG->setVisibility();
        $this->EDD_Date->setVisibility();
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
                    $srchStr = "ViewIuiExcelList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->NAME); // NAME
        $this->buildSearchUrl($srchUrl, $this->HUSBANDNAME); // HUSBAND NAME
        $this->buildSearchUrl($srchUrl, $this->CoupleID); // CoupleID
        $this->buildSearchUrl($srchUrl, $this->AGEWIFE); // AGE  - WIFE
        $this->buildSearchUrl($srchUrl, $this->AGEHUSBAND); // AGE- HUSBAND
        $this->buildSearchUrl($srchUrl, $this->ANXIOUSTOCONCEIVEFOR); // ANXIOUS TO CONCEIVE FOR
        $this->buildSearchUrl($srchUrl, $this->AMHNGML); // AMH ( NG/ML)
        $this->buildSearchUrl($srchUrl, $this->TUBAL_PATENCY); // TUBAL_PATENCY
        $this->buildSearchUrl($srchUrl, $this->HSG); // HSG
        $this->buildSearchUrl($srchUrl, $this->DHL); // DHL
        $this->buildSearchUrl($srchUrl, $this->UTERINE_PROBLEMS); // UTERINE_PROBLEMS
        $this->buildSearchUrl($srchUrl, $this->W_COMORBIDS); // W_COMORBIDS
        $this->buildSearchUrl($srchUrl, $this->H_COMORBIDS); // H_COMORBIDS
        $this->buildSearchUrl($srchUrl, $this->SEXUAL_DYSFUNCTION); // SEXUAL_DYSFUNCTION
        $this->buildSearchUrl($srchUrl, $this->PREVIUI); // PREV IUI
        $this->buildSearchUrl($srchUrl, $this->PREV_IVF); // PREV_IVF
        $this->buildSearchUrl($srchUrl, $this->TABLETS); // TABLETS
        $this->buildSearchUrl($srchUrl, $this->INJTYPE); // INJTYPE
        $this->buildSearchUrl($srchUrl, $this->LMP); // LMP
        $this->buildSearchUrl($srchUrl, $this->TRIGGERR); // TRIGGERR
        $this->buildSearchUrl($srchUrl, $this->TRIGGERDATE); // TRIGGERDATE
        $this->buildSearchUrl($srchUrl, $this->FOLLICLE_STATUS); // FOLLICLE_STATUS
        $this->buildSearchUrl($srchUrl, $this->NUMBER_OF_IUI); // NUMBER_OF_IUI
        $this->buildSearchUrl($srchUrl, $this->PROCEDURE); // PROCEDURE
        $this->buildSearchUrl($srchUrl, $this->LUTEAL_SUPPORT); // LUTEAL_SUPPORT
        $this->buildSearchUrl($srchUrl, $this->HDSAMPLE); // H/D SAMPLE
        $this->buildSearchUrl($srchUrl, $this->DONORID); // DONOR - I.D
        $this->buildSearchUrl($srchUrl, $this->PREG_TEST_DATE); // PREG_TEST_DATE
        $this->buildSearchUrl($srchUrl, $this->COLLECTIONMETHOD); // COLLECTION  METHOD
        $this->buildSearchUrl($srchUrl, $this->SAMPLESOURCE); // SAMPLE SOURCE
        $this->buildSearchUrl($srchUrl, $this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
        $this->buildSearchUrl($srchUrl, $this->IMSC_1); // IMSC_1
        $this->buildSearchUrl($srchUrl, $this->IMSC_2); // IMSC_2
        $this->buildSearchUrl($srchUrl, $this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
        $this->buildSearchUrl($srchUrl, $this->IUI_PREP_METHOD); // IUI_PREP_METHOD
        $this->buildSearchUrl($srchUrl, $this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
        $this->buildSearchUrl($srchUrl, $this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
        $this->buildSearchUrl($srchUrl, $this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
        $this->buildSearchUrl($srchUrl, $this->SPECIFIC_MATERNAL_PROBLEMS); // SPECIFIC_MATERNAL_PROBLEMS
        $this->buildSearchUrl($srchUrl, $this->RESULTS); // RESULTS
        $this->buildSearchUrl($srchUrl, $this->ONGOING_PREG); // ONGOING_PREG
        $this->buildSearchUrl($srchUrl, $this->EDD_Date); // EDD_Date
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
        if ($this->NAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HUSBANDNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CoupleID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AGEWIFE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AGEHUSBAND->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AMHNGML->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TUBAL_PATENCY->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HSG->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DHL->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UTERINE_PROBLEMS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->W_COMORBIDS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->H_COMORBIDS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SEXUAL_DYSFUNCTION->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PREVIUI->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PREV_IVF->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TABLETS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->INJTYPE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LMP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TRIGGERR->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TRIGGERDATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FOLLICLE_STATUS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NUMBER_OF_IUI->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PROCEDURE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LUTEAL_SUPPORT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HDSAMPLE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DONORID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PREG_TEST_DATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->COLLECTIONMETHOD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SAMPLESOURCE->AdvancedSearch->post()) {
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
        if ($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RESULTS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ONGOING_PREG->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EDD_Date->AdvancedSearch->post()) {
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

        // NAME

        // HUSBAND NAME

        // CoupleID

        // AGE  - WIFE

        // AGE- HUSBAND

        // ANXIOUS TO CONCEIVE FOR

        // AMH ( NG/ML)

        // TUBAL_PATENCY

        // HSG

        // DHL

        // UTERINE_PROBLEMS

        // W_COMORBIDS

        // H_COMORBIDS

        // SEXUAL_DYSFUNCTION

        // PREV IUI

        // PREV_IVF

        // TABLETS

        // INJTYPE

        // LMP

        // TRIGGERR

        // TRIGGERDATE

        // FOLLICLE_STATUS

        // NUMBER_OF_IUI

        // PROCEDURE

        // LUTEAL_SUPPORT

        // H/D SAMPLE

        // DONOR - I.D

        // PREG_TEST_DATE

        // COLLECTION  METHOD

        // SAMPLE SOURCE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM

        // SPECIFIC_MATERNAL_PROBLEMS

        // RESULTS

        // ONGOING_PREG

        // EDD_Date
        if ($this->RowType == ROWTYPE_VIEW) {
            // NAME
            $this->NAME->ViewValue = $this->NAME->CurrentValue;
            $this->NAME->ViewCustomAttributes = "";

            // HUSBAND NAME
            $this->HUSBANDNAME->ViewValue = $this->HUSBANDNAME->CurrentValue;
            $this->HUSBANDNAME->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // AGE  - WIFE
            $this->AGEWIFE->ViewValue = $this->AGEWIFE->CurrentValue;
            $this->AGEWIFE->ViewCustomAttributes = "";

            // AGE- HUSBAND
            $this->AGEHUSBAND->ViewValue = $this->AGEHUSBAND->CurrentValue;
            $this->AGEHUSBAND->ViewCustomAttributes = "";

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUSTOCONCEIVEFOR->ViewValue = $this->ANXIOUSTOCONCEIVEFOR->CurrentValue;
            $this->ANXIOUSTOCONCEIVEFOR->ViewCustomAttributes = "";

            // AMH ( NG/ML)
            $this->AMHNGML->ViewValue = $this->AMHNGML->CurrentValue;
            $this->AMHNGML->ViewCustomAttributes = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
            $this->TUBAL_PATENCY->ViewCustomAttributes = "";

            // HSG
            $this->HSG->ViewValue = $this->HSG->CurrentValue;
            $this->HSG->ViewCustomAttributes = "";

            // DHL
            $this->DHL->ViewValue = $this->DHL->CurrentValue;
            $this->DHL->ViewCustomAttributes = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
            $this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
            $this->W_COMORBIDS->ViewCustomAttributes = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
            $this->H_COMORBIDS->ViewCustomAttributes = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
            $this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

            // PREV IUI
            $this->PREVIUI->ViewValue = $this->PREVIUI->CurrentValue;
            $this->PREVIUI->ViewCustomAttributes = "";

            // PREV_IVF
            $this->PREV_IVF->ViewValue = $this->PREV_IVF->CurrentValue;
            $this->PREV_IVF->ViewCustomAttributes = "";

            // TABLETS
            $this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
            $this->TABLETS->ViewCustomAttributes = "";

            // INJTYPE
            $this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
            $this->INJTYPE->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
            $this->LMP->ViewCustomAttributes = "";

            // TRIGGERR
            $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
            $this->TRIGGERR->ViewCustomAttributes = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
            $this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
            $this->TRIGGERDATE->ViewCustomAttributes = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
            $this->FOLLICLE_STATUS->ViewCustomAttributes = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
            $this->NUMBER_OF_IUI->ViewCustomAttributes = "";

            // PROCEDURE
            $this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
            $this->PROCEDURE->ViewCustomAttributes = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
            $this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

            // H/D SAMPLE
            $this->HDSAMPLE->ViewValue = $this->HDSAMPLE->CurrentValue;
            $this->HDSAMPLE->ViewCustomAttributes = "";

            // DONOR - I.D
            $this->DONORID->ViewValue = $this->DONORID->CurrentValue;
            $this->DONORID->ViewValue = FormatNumber($this->DONORID->ViewValue, 0, -2, -2, -2);
            $this->DONORID->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // COLLECTION  METHOD
            $this->COLLECTIONMETHOD->ViewValue = $this->COLLECTIONMETHOD->CurrentValue;
            $this->COLLECTIONMETHOD->ViewCustomAttributes = "";

            // SAMPLE SOURCE
            $this->SAMPLESOURCE->ViewValue = $this->SAMPLESOURCE->CurrentValue;
            $this->SAMPLESOURCE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

            // RESULTS
            $this->RESULTS->ViewValue = $this->RESULTS->CurrentValue;
            $this->RESULTS->ViewCustomAttributes = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
            $this->ONGOING_PREG->ViewCustomAttributes = "";

            // EDD_Date
            $this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
            $this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
            $this->EDD_Date->ViewCustomAttributes = "";

            // NAME
            $this->NAME->LinkCustomAttributes = "";
            $this->NAME->HrefValue = "";
            $this->NAME->TooltipValue = "";

            // HUSBAND NAME
            $this->HUSBANDNAME->LinkCustomAttributes = "";
            $this->HUSBANDNAME->HrefValue = "";
            $this->HUSBANDNAME->TooltipValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";

            // AGE  - WIFE
            $this->AGEWIFE->LinkCustomAttributes = "";
            $this->AGEWIFE->HrefValue = "";
            $this->AGEWIFE->TooltipValue = "";

            // AGE- HUSBAND
            $this->AGEHUSBAND->LinkCustomAttributes = "";
            $this->AGEHUSBAND->HrefValue = "";
            $this->AGEHUSBAND->TooltipValue = "";

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUSTOCONCEIVEFOR->LinkCustomAttributes = "";
            $this->ANXIOUSTOCONCEIVEFOR->HrefValue = "";
            $this->ANXIOUSTOCONCEIVEFOR->TooltipValue = "";

            // AMH ( NG/ML)
            $this->AMHNGML->LinkCustomAttributes = "";
            $this->AMHNGML->HrefValue = "";
            $this->AMHNGML->TooltipValue = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->LinkCustomAttributes = "";
            $this->TUBAL_PATENCY->HrefValue = "";
            $this->TUBAL_PATENCY->TooltipValue = "";

            // HSG
            $this->HSG->LinkCustomAttributes = "";
            $this->HSG->HrefValue = "";
            $this->HSG->TooltipValue = "";

            // DHL
            $this->DHL->LinkCustomAttributes = "";
            $this->DHL->HrefValue = "";
            $this->DHL->TooltipValue = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
            $this->UTERINE_PROBLEMS->HrefValue = "";
            $this->UTERINE_PROBLEMS->TooltipValue = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->LinkCustomAttributes = "";
            $this->W_COMORBIDS->HrefValue = "";
            $this->W_COMORBIDS->TooltipValue = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->LinkCustomAttributes = "";
            $this->H_COMORBIDS->HrefValue = "";
            $this->H_COMORBIDS->TooltipValue = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
            $this->SEXUAL_DYSFUNCTION->HrefValue = "";
            $this->SEXUAL_DYSFUNCTION->TooltipValue = "";

            // PREV IUI
            $this->PREVIUI->LinkCustomAttributes = "";
            $this->PREVIUI->HrefValue = "";
            $this->PREVIUI->TooltipValue = "";

            // PREV_IVF
            $this->PREV_IVF->LinkCustomAttributes = "";
            $this->PREV_IVF->HrefValue = "";
            $this->PREV_IVF->TooltipValue = "";

            // TABLETS
            $this->TABLETS->LinkCustomAttributes = "";
            $this->TABLETS->HrefValue = "";
            $this->TABLETS->TooltipValue = "";

            // INJTYPE
            $this->INJTYPE->LinkCustomAttributes = "";
            $this->INJTYPE->HrefValue = "";
            $this->INJTYPE->TooltipValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // TRIGGERR
            $this->TRIGGERR->LinkCustomAttributes = "";
            $this->TRIGGERR->HrefValue = "";
            $this->TRIGGERR->TooltipValue = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->LinkCustomAttributes = "";
            $this->TRIGGERDATE->HrefValue = "";
            $this->TRIGGERDATE->TooltipValue = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->LinkCustomAttributes = "";
            $this->FOLLICLE_STATUS->HrefValue = "";
            $this->FOLLICLE_STATUS->TooltipValue = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->LinkCustomAttributes = "";
            $this->NUMBER_OF_IUI->HrefValue = "";
            $this->NUMBER_OF_IUI->TooltipValue = "";

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";
            $this->PROCEDURE->TooltipValue = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
            $this->LUTEAL_SUPPORT->HrefValue = "";
            $this->LUTEAL_SUPPORT->TooltipValue = "";

            // H/D SAMPLE
            $this->HDSAMPLE->LinkCustomAttributes = "";
            $this->HDSAMPLE->HrefValue = "";
            $this->HDSAMPLE->TooltipValue = "";

            // DONOR - I.D
            $this->DONORID->LinkCustomAttributes = "";
            $this->DONORID->HrefValue = "";
            $this->DONORID->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // COLLECTION  METHOD
            $this->COLLECTIONMETHOD->LinkCustomAttributes = "";
            $this->COLLECTIONMETHOD->HrefValue = "";
            $this->COLLECTIONMETHOD->TooltipValue = "";

            // SAMPLE SOURCE
            $this->SAMPLESOURCE->LinkCustomAttributes = "";
            $this->SAMPLESOURCE->HrefValue = "";
            $this->SAMPLESOURCE->TooltipValue = "";

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

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

            // RESULTS
            $this->RESULTS->LinkCustomAttributes = "";
            $this->RESULTS->HrefValue = "";
            $this->RESULTS->TooltipValue = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->LinkCustomAttributes = "";
            $this->ONGOING_PREG->HrefValue = "";
            $this->ONGOING_PREG->TooltipValue = "";

            // EDD_Date
            $this->EDD_Date->LinkCustomAttributes = "";
            $this->EDD_Date->HrefValue = "";
            $this->EDD_Date->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // NAME
            $this->NAME->EditAttrs["class"] = "form-control";
            $this->NAME->EditCustomAttributes = "";
            if (!$this->NAME->Raw) {
                $this->NAME->AdvancedSearch->SearchValue = HtmlDecode($this->NAME->AdvancedSearch->SearchValue);
            }
            $this->NAME->EditValue = HtmlEncode($this->NAME->AdvancedSearch->SearchValue);
            $this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

            // HUSBAND NAME
            $this->HUSBANDNAME->EditAttrs["class"] = "form-control";
            $this->HUSBANDNAME->EditCustomAttributes = "";
            if (!$this->HUSBANDNAME->Raw) {
                $this->HUSBANDNAME->AdvancedSearch->SearchValue = HtmlDecode($this->HUSBANDNAME->AdvancedSearch->SearchValue);
            }
            $this->HUSBANDNAME->EditValue = HtmlEncode($this->HUSBANDNAME->AdvancedSearch->SearchValue);
            $this->HUSBANDNAME->PlaceHolder = RemoveHtml($this->HUSBANDNAME->caption());

            // CoupleID
            $this->CoupleID->EditAttrs["class"] = "form-control";
            $this->CoupleID->EditCustomAttributes = "";
            if (!$this->CoupleID->Raw) {
                $this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
            }
            $this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
            $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

            // AGE  - WIFE
            $this->AGEWIFE->EditAttrs["class"] = "form-control";
            $this->AGEWIFE->EditCustomAttributes = "";
            if (!$this->AGEWIFE->Raw) {
                $this->AGEWIFE->AdvancedSearch->SearchValue = HtmlDecode($this->AGEWIFE->AdvancedSearch->SearchValue);
            }
            $this->AGEWIFE->EditValue = HtmlEncode($this->AGEWIFE->AdvancedSearch->SearchValue);
            $this->AGEWIFE->PlaceHolder = RemoveHtml($this->AGEWIFE->caption());

            // AGE- HUSBAND
            $this->AGEHUSBAND->EditAttrs["class"] = "form-control";
            $this->AGEHUSBAND->EditCustomAttributes = "";
            if (!$this->AGEHUSBAND->Raw) {
                $this->AGEHUSBAND->AdvancedSearch->SearchValue = HtmlDecode($this->AGEHUSBAND->AdvancedSearch->SearchValue);
            }
            $this->AGEHUSBAND->EditValue = HtmlEncode($this->AGEHUSBAND->AdvancedSearch->SearchValue);
            $this->AGEHUSBAND->PlaceHolder = RemoveHtml($this->AGEHUSBAND->caption());

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUSTOCONCEIVEFOR->EditAttrs["class"] = "form-control";
            $this->ANXIOUSTOCONCEIVEFOR->EditCustomAttributes = "";
            if (!$this->ANXIOUSTOCONCEIVEFOR->Raw) {
                $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue = HtmlDecode($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue);
            }
            $this->ANXIOUSTOCONCEIVEFOR->EditValue = HtmlEncode($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue);
            $this->ANXIOUSTOCONCEIVEFOR->PlaceHolder = RemoveHtml($this->ANXIOUSTOCONCEIVEFOR->caption());

            // AMH ( NG/ML)
            $this->AMHNGML->EditAttrs["class"] = "form-control";
            $this->AMHNGML->EditCustomAttributes = "";
            if (!$this->AMHNGML->Raw) {
                $this->AMHNGML->AdvancedSearch->SearchValue = HtmlDecode($this->AMHNGML->AdvancedSearch->SearchValue);
            }
            $this->AMHNGML->EditValue = HtmlEncode($this->AMHNGML->AdvancedSearch->SearchValue);
            $this->AMHNGML->PlaceHolder = RemoveHtml($this->AMHNGML->caption());

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
            $this->TUBAL_PATENCY->EditCustomAttributes = "";
            if (!$this->TUBAL_PATENCY->Raw) {
                $this->TUBAL_PATENCY->AdvancedSearch->SearchValue = HtmlDecode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
            }
            $this->TUBAL_PATENCY->EditValue = HtmlEncode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
            $this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

            // HSG
            $this->HSG->EditAttrs["class"] = "form-control";
            $this->HSG->EditCustomAttributes = "";
            if (!$this->HSG->Raw) {
                $this->HSG->AdvancedSearch->SearchValue = HtmlDecode($this->HSG->AdvancedSearch->SearchValue);
            }
            $this->HSG->EditValue = HtmlEncode($this->HSG->AdvancedSearch->SearchValue);
            $this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

            // DHL
            $this->DHL->EditAttrs["class"] = "form-control";
            $this->DHL->EditCustomAttributes = "";
            if (!$this->DHL->Raw) {
                $this->DHL->AdvancedSearch->SearchValue = HtmlDecode($this->DHL->AdvancedSearch->SearchValue);
            }
            $this->DHL->EditValue = HtmlEncode($this->DHL->AdvancedSearch->SearchValue);
            $this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->UTERINE_PROBLEMS->EditCustomAttributes = "";
            if (!$this->UTERINE_PROBLEMS->Raw) {
                $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
            }
            $this->UTERINE_PROBLEMS->EditValue = HtmlEncode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
            $this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

            // W_COMORBIDS
            $this->W_COMORBIDS->EditAttrs["class"] = "form-control";
            $this->W_COMORBIDS->EditCustomAttributes = "";
            if (!$this->W_COMORBIDS->Raw) {
                $this->W_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
            }
            $this->W_COMORBIDS->EditValue = HtmlEncode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
            $this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

            // H_COMORBIDS
            $this->H_COMORBIDS->EditAttrs["class"] = "form-control";
            $this->H_COMORBIDS->EditCustomAttributes = "";
            if (!$this->H_COMORBIDS->Raw) {
                $this->H_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
            }
            $this->H_COMORBIDS->EditValue = HtmlEncode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
            $this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
            $this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
            if (!$this->SEXUAL_DYSFUNCTION->Raw) {
                $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
            }
            $this->SEXUAL_DYSFUNCTION->EditValue = HtmlEncode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
            $this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

            // PREV IUI
            $this->PREVIUI->EditAttrs["class"] = "form-control";
            $this->PREVIUI->EditCustomAttributes = "";
            if (!$this->PREVIUI->Raw) {
                $this->PREVIUI->AdvancedSearch->SearchValue = HtmlDecode($this->PREVIUI->AdvancedSearch->SearchValue);
            }
            $this->PREVIUI->EditValue = HtmlEncode($this->PREVIUI->AdvancedSearch->SearchValue);
            $this->PREVIUI->PlaceHolder = RemoveHtml($this->PREVIUI->caption());

            // PREV_IVF
            $this->PREV_IVF->EditAttrs["class"] = "form-control";
            $this->PREV_IVF->EditCustomAttributes = "";
            $this->PREV_IVF->EditValue = HtmlEncode($this->PREV_IVF->AdvancedSearch->SearchValue);
            $this->PREV_IVF->PlaceHolder = RemoveHtml($this->PREV_IVF->caption());

            // TABLETS
            $this->TABLETS->EditAttrs["class"] = "form-control";
            $this->TABLETS->EditCustomAttributes = "";
            if (!$this->TABLETS->Raw) {
                $this->TABLETS->AdvancedSearch->SearchValue = HtmlDecode($this->TABLETS->AdvancedSearch->SearchValue);
            }
            $this->TABLETS->EditValue = HtmlEncode($this->TABLETS->AdvancedSearch->SearchValue);
            $this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

            // INJTYPE
            $this->INJTYPE->EditAttrs["class"] = "form-control";
            $this->INJTYPE->EditCustomAttributes = "";
            if (!$this->INJTYPE->Raw) {
                $this->INJTYPE->AdvancedSearch->SearchValue = HtmlDecode($this->INJTYPE->AdvancedSearch->SearchValue);
            }
            $this->INJTYPE->EditValue = HtmlEncode($this->INJTYPE->AdvancedSearch->SearchValue);
            $this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

            // LMP
            $this->LMP->EditAttrs["class"] = "form-control";
            $this->LMP->EditCustomAttributes = "";
            $this->LMP->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LMP->AdvancedSearch->SearchValue, 0), 8));
            $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

            // TRIGGERR
            $this->TRIGGERR->EditAttrs["class"] = "form-control";
            $this->TRIGGERR->EditCustomAttributes = "";
            if (!$this->TRIGGERR->Raw) {
                $this->TRIGGERR->AdvancedSearch->SearchValue = HtmlDecode($this->TRIGGERR->AdvancedSearch->SearchValue);
            }
            $this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->AdvancedSearch->SearchValue);
            $this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

            // TRIGGERDATE
            $this->TRIGGERDATE->EditAttrs["class"] = "form-control";
            $this->TRIGGERDATE->EditCustomAttributes = "";
            $this->TRIGGERDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TRIGGERDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
            $this->FOLLICLE_STATUS->EditCustomAttributes = "";
            if (!$this->FOLLICLE_STATUS->Raw) {
                $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = HtmlDecode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
            }
            $this->FOLLICLE_STATUS->EditValue = HtmlEncode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
            $this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
            $this->NUMBER_OF_IUI->EditCustomAttributes = "";
            if (!$this->NUMBER_OF_IUI->Raw) {
                $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = HtmlDecode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
            }
            $this->NUMBER_OF_IUI->EditValue = HtmlEncode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
            $this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

            // PROCEDURE
            $this->PROCEDURE->EditAttrs["class"] = "form-control";
            $this->PROCEDURE->EditCustomAttributes = "";
            if (!$this->PROCEDURE->Raw) {
                $this->PROCEDURE->AdvancedSearch->SearchValue = HtmlDecode($this->PROCEDURE->AdvancedSearch->SearchValue);
            }
            $this->PROCEDURE->EditValue = HtmlEncode($this->PROCEDURE->AdvancedSearch->SearchValue);
            $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
            $this->LUTEAL_SUPPORT->EditCustomAttributes = "";
            if (!$this->LUTEAL_SUPPORT->Raw) {
                $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = HtmlDecode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
            }
            $this->LUTEAL_SUPPORT->EditValue = HtmlEncode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
            $this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

            // H/D SAMPLE
            $this->HDSAMPLE->EditAttrs["class"] = "form-control";
            $this->HDSAMPLE->EditCustomAttributes = "";
            if (!$this->HDSAMPLE->Raw) {
                $this->HDSAMPLE->AdvancedSearch->SearchValue = HtmlDecode($this->HDSAMPLE->AdvancedSearch->SearchValue);
            }
            $this->HDSAMPLE->EditValue = HtmlEncode($this->HDSAMPLE->AdvancedSearch->SearchValue);
            $this->HDSAMPLE->PlaceHolder = RemoveHtml($this->HDSAMPLE->caption());

            // DONOR - I.D
            $this->DONORID->EditAttrs["class"] = "form-control";
            $this->DONORID->EditCustomAttributes = "";
            $this->DONORID->EditValue = HtmlEncode($this->DONORID->AdvancedSearch->SearchValue);
            $this->DONORID->PlaceHolder = RemoveHtml($this->DONORID->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

            // COLLECTION  METHOD
            $this->COLLECTIONMETHOD->EditAttrs["class"] = "form-control";
            $this->COLLECTIONMETHOD->EditCustomAttributes = "";
            if (!$this->COLLECTIONMETHOD->Raw) {
                $this->COLLECTIONMETHOD->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTIONMETHOD->AdvancedSearch->SearchValue);
            }
            $this->COLLECTIONMETHOD->EditValue = HtmlEncode($this->COLLECTIONMETHOD->AdvancedSearch->SearchValue);
            $this->COLLECTIONMETHOD->PlaceHolder = RemoveHtml($this->COLLECTIONMETHOD->caption());

            // SAMPLE SOURCE
            $this->SAMPLESOURCE->EditAttrs["class"] = "form-control";
            $this->SAMPLESOURCE->EditCustomAttributes = "";
            if (!$this->SAMPLESOURCE->Raw) {
                $this->SAMPLESOURCE->AdvancedSearch->SearchValue = HtmlDecode($this->SAMPLESOURCE->AdvancedSearch->SearchValue);
            }
            $this->SAMPLESOURCE->EditValue = HtmlEncode($this->SAMPLESOURCE->AdvancedSearch->SearchValue);
            $this->SAMPLESOURCE->PlaceHolder = RemoveHtml($this->SAMPLESOURCE->caption());

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
            if (!$this->SPECIFIC_PROBLEMS->Raw) {
                $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
            }
            $this->SPECIFIC_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
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
            if (!$this->LIQUIFACTION_STORAGE->Raw) {
                $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = HtmlDecode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
            }
            $this->LIQUIFACTION_STORAGE->EditValue = HtmlEncode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
            $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
            $this->IUI_PREP_METHOD->EditCustomAttributes = "";
            if (!$this->IUI_PREP_METHOD->Raw) {
                $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = HtmlDecode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
            }
            $this->IUI_PREP_METHOD->EditValue = HtmlEncode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
            $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
            if (!$this->TIME_FROM_TRIGGER->Raw) {
                $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
            }
            $this->TIME_FROM_TRIGGER->EditValue = HtmlEncode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
            $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
            $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
            if (!$this->COLLECTION_TO_PREPARATION->Raw) {
                $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
            }
            $this->COLLECTION_TO_PREPARATION->EditValue = HtmlEncode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
            $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
            if (!$this->TIME_FROM_PREP_TO_INSEM->Raw) {
                $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
            }
            $this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
            $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
            if (!$this->SPECIFIC_MATERNAL_PROBLEMS->Raw) {
                $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
            }
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
            $this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

            // RESULTS
            $this->RESULTS->EditAttrs["class"] = "form-control";
            $this->RESULTS->EditCustomAttributes = "";
            $this->RESULTS->EditValue = HtmlEncode($this->RESULTS->AdvancedSearch->SearchValue);
            $this->RESULTS->PlaceHolder = RemoveHtml($this->RESULTS->caption());

            // ONGOING_PREG
            $this->ONGOING_PREG->EditAttrs["class"] = "form-control";
            $this->ONGOING_PREG->EditCustomAttributes = "";
            if (!$this->ONGOING_PREG->Raw) {
                $this->ONGOING_PREG->AdvancedSearch->SearchValue = HtmlDecode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
            }
            $this->ONGOING_PREG->EditValue = HtmlEncode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
            $this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

            // EDD_Date
            $this->EDD_Date->EditAttrs["class"] = "form-control";
            $this->EDD_Date->EditCustomAttributes = "";
            $this->EDD_Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue, 0), 8));
            $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
            $this->EDD_Date->EditAttrs["class"] = "form-control";
            $this->EDD_Date->EditCustomAttributes = "";
            $this->EDD_Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue2, 0), 8));
            $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
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
        if (!CheckDate($this->LMP->AdvancedSearch->SearchValue)) {
            $this->LMP->addErrorMessage($this->LMP->getErrorMessage(false));
        }
        if (!CheckDate($this->TRIGGERDATE->AdvancedSearch->SearchValue)) {
            $this->TRIGGERDATE->addErrorMessage($this->TRIGGERDATE->getErrorMessage(false));
        }
        if (!CheckInteger($this->DONORID->AdvancedSearch->SearchValue)) {
            $this->DONORID->addErrorMessage($this->DONORID->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue)) {
            $this->EDD_Date->addErrorMessage($this->EDD_Date->getErrorMessage(false));
        }
        if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue2)) {
            $this->EDD_Date->addErrorMessage($this->EDD_Date->getErrorMessage(false));
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
        $this->NAME->AdvancedSearch->load();
        $this->HUSBANDNAME->AdvancedSearch->load();
        $this->CoupleID->AdvancedSearch->load();
        $this->AGEWIFE->AdvancedSearch->load();
        $this->AGEHUSBAND->AdvancedSearch->load();
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->load();
        $this->AMHNGML->AdvancedSearch->load();
        $this->TUBAL_PATENCY->AdvancedSearch->load();
        $this->HSG->AdvancedSearch->load();
        $this->DHL->AdvancedSearch->load();
        $this->UTERINE_PROBLEMS->AdvancedSearch->load();
        $this->W_COMORBIDS->AdvancedSearch->load();
        $this->H_COMORBIDS->AdvancedSearch->load();
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->load();
        $this->PREVIUI->AdvancedSearch->load();
        $this->PREV_IVF->AdvancedSearch->load();
        $this->TABLETS->AdvancedSearch->load();
        $this->INJTYPE->AdvancedSearch->load();
        $this->LMP->AdvancedSearch->load();
        $this->TRIGGERR->AdvancedSearch->load();
        $this->TRIGGERDATE->AdvancedSearch->load();
        $this->FOLLICLE_STATUS->AdvancedSearch->load();
        $this->NUMBER_OF_IUI->AdvancedSearch->load();
        $this->PROCEDURE->AdvancedSearch->load();
        $this->LUTEAL_SUPPORT->AdvancedSearch->load();
        $this->HDSAMPLE->AdvancedSearch->load();
        $this->DONORID->AdvancedSearch->load();
        $this->PREG_TEST_DATE->AdvancedSearch->load();
        $this->COLLECTIONMETHOD->AdvancedSearch->load();
        $this->SAMPLESOURCE->AdvancedSearch->load();
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
        $this->IMSC_1->AdvancedSearch->load();
        $this->IMSC_2->AdvancedSearch->load();
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
        $this->IUI_PREP_METHOD->AdvancedSearch->load();
        $this->TIME_FROM_TRIGGER->AdvancedSearch->load();
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->load();
        $this->RESULTS->AdvancedSearch->load();
        $this->ONGOING_PREG->AdvancedSearch->load();
        $this->EDD_Date->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewIuiExcelList"), "", $this->TableVar, true);
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
