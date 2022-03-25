<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyBatchmasSearch extends PharmacyBatchmas
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_batchmas';

    // Page object name
    public $PageObjName = "PharmacyBatchmasSearch";

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

        // Table object (pharmacy_batchmas)
        if (!isset($GLOBALS["pharmacy_batchmas"]) || get_class($GLOBALS["pharmacy_batchmas"]) == PROJECT_NAMESPACE . "pharmacy_batchmas") {
            $GLOBALS["pharmacy_batchmas"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_batchmas');
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
                $doc = new $class(Container("pharmacy_batchmas"));
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
                    if ($pageName == "PharmacyBatchmasView") {
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
        $this->PRC->setVisibility();
        $this->PrName->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->BATCH->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->EXPDT->setVisibility();
        $this->PRCODE->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->FRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->MRP->setVisibility();
        $this->UR->setVisibility();
        $this->PC->setVisibility();
        $this->OLDRT->setVisibility();
        $this->TEMPMRQ->setVisibility();
        $this->TAXP->setVisibility();
        $this->OLDRATE->setVisibility();
        $this->NEWRATE->setVisibility();
        $this->OTEMPMRA->setVisibility();
        $this->ACTIVESTATUS->setVisibility();
        $this->id->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->RT->setVisibility();
        $this->BRCODE->setVisibility();
        $this->HospID->setVisibility();
        $this->UM->setVisibility();
        $this->GENNAME->setVisibility();
        $this->BILLDATE->setVisibility();
        $this->PUnit->setVisibility();
        $this->SUnit->setVisibility();
        $this->PurValue->setVisibility();
        $this->PurRate->setVisibility();
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
        $this->setupLookupOptions($this->PrName);
        $this->setupLookupOptions($this->BRCODE);

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
                    $srchStr = "PharmacyBatchmasList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->PRC); // PRC
        $this->buildSearchUrl($srchUrl, $this->PrName); // PrName
        $this->buildSearchUrl($srchUrl, $this->BATCHNO); // BATCHNO
        $this->buildSearchUrl($srchUrl, $this->BATCH); // BATCH
        $this->buildSearchUrl($srchUrl, $this->MFRCODE); // MFRCODE
        $this->buildSearchUrl($srchUrl, $this->EXPDT); // EXPDT
        $this->buildSearchUrl($srchUrl, $this->PRCODE); // PRCODE
        $this->buildSearchUrl($srchUrl, $this->OQ); // OQ
        $this->buildSearchUrl($srchUrl, $this->RQ); // RQ
        $this->buildSearchUrl($srchUrl, $this->FRQ); // FRQ
        $this->buildSearchUrl($srchUrl, $this->IQ); // IQ
        $this->buildSearchUrl($srchUrl, $this->MRQ); // MRQ
        $this->buildSearchUrl($srchUrl, $this->MRP); // MRP
        $this->buildSearchUrl($srchUrl, $this->UR); // UR
        $this->buildSearchUrl($srchUrl, $this->PC); // PC
        $this->buildSearchUrl($srchUrl, $this->OLDRT); // OLDRT
        $this->buildSearchUrl($srchUrl, $this->TEMPMRQ); // TEMPMRQ
        $this->buildSearchUrl($srchUrl, $this->TAXP); // TAXP
        $this->buildSearchUrl($srchUrl, $this->OLDRATE); // OLDRATE
        $this->buildSearchUrl($srchUrl, $this->NEWRATE); // NEWRATE
        $this->buildSearchUrl($srchUrl, $this->OTEMPMRA); // OTEMPMRA
        $this->buildSearchUrl($srchUrl, $this->ACTIVESTATUS); // ACTIVESTATUS
        $this->buildSearchUrl($srchUrl, $this->id); // id
        $this->buildSearchUrl($srchUrl, $this->PSGST); // PSGST
        $this->buildSearchUrl($srchUrl, $this->PCGST); // PCGST
        $this->buildSearchUrl($srchUrl, $this->SSGST); // SSGST
        $this->buildSearchUrl($srchUrl, $this->SCGST); // SCGST
        $this->buildSearchUrl($srchUrl, $this->RT); // RT
        $this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->UM); // UM
        $this->buildSearchUrl($srchUrl, $this->GENNAME); // GENNAME
        $this->buildSearchUrl($srchUrl, $this->BILLDATE); // BILLDATE
        $this->buildSearchUrl($srchUrl, $this->PUnit); // PUnit
        $this->buildSearchUrl($srchUrl, $this->SUnit); // SUnit
        $this->buildSearchUrl($srchUrl, $this->PurValue); // PurValue
        $this->buildSearchUrl($srchUrl, $this->PurRate); // PurRate
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
        if ($this->PRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BATCHNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BATCH->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MFRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EXPDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FRQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MRQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MRP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UR->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OLDRT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TEMPMRQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TAXP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OLDRATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NEWRATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OTEMPMRA->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ACTIVESTATUS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PSGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PCGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SSGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SCGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UM->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GENNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BILLDATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PUnit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SUnit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PurValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PurRate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        return $hasValue;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue))) {
            $this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue))) {
            $this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue))) {
            $this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRT->FormValue == $this->OLDRT->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRT->CurrentValue))) {
            $this->OLDRT->CurrentValue = ConvertToFloatString($this->OLDRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TEMPMRQ->FormValue == $this->TEMPMRQ->CurrentValue && is_numeric(ConvertToFloatString($this->TEMPMRQ->CurrentValue))) {
            $this->TEMPMRQ->CurrentValue = ConvertToFloatString($this->TEMPMRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRATE->FormValue == $this->OLDRATE->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRATE->CurrentValue))) {
            $this->OLDRATE->CurrentValue = ConvertToFloatString($this->OLDRATE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWRATE->FormValue == $this->NEWRATE->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRATE->CurrentValue))) {
            $this->NEWRATE->CurrentValue = ConvertToFloatString($this->NEWRATE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OTEMPMRA->FormValue == $this->OTEMPMRA->CurrentValue && is_numeric(ConvertToFloatString($this->OTEMPMRA->CurrentValue))) {
            $this->OTEMPMRA->CurrentValue = ConvertToFloatString($this->OTEMPMRA->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue))) {
            $this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue))) {
            $this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // PRC

        // PrName

        // BATCHNO

        // BATCH

        // MFRCODE

        // EXPDT

        // PRCODE

        // OQ

        // RQ

        // FRQ

        // IQ

        // MRQ

        // MRP

        // UR

        // PC

        // OLDRT

        // TEMPMRQ

        // TAXP

        // OLDRATE

        // NEWRATE

        // OTEMPMRA

        // ACTIVESTATUS

        // id

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // RT

        // BRCODE

        // HospID

        // UM

        // GENNAME

        // BILLDATE

        // PUnit

        // SUnit

        // PurValue

        // PurRate
        if ($this->RowType == ROWTYPE_VIEW) {
            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $curVal = trim(strval($this->PrName->CurrentValue));
            if ($curVal != "") {
                $this->PrName->ViewValue = $this->PrName->lookupCacheOption($curVal);
                if ($this->PrName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PrName->Lookup->renderViewRow($rswrk[0]);
                        $this->PrName->ViewValue = $this->PrName->displayValue($arwrk);
                    } else {
                        $this->PrName->ViewValue = $this->PrName->CurrentValue;
                    }
                }
            } else {
                $this->PrName->ViewValue = null;
            }
            $this->PrName->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // BATCH
            $this->BATCH->ViewValue = $this->BATCH->CurrentValue;
            $this->BATCH->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // FRQ
            $this->FRQ->ViewValue = $this->FRQ->CurrentValue;
            $this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
            $this->FRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // OLDRT
            $this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
            $this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
            $this->OLDRT->ViewCustomAttributes = "";

            // TEMPMRQ
            $this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
            $this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
            $this->TEMPMRQ->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // OLDRATE
            $this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
            $this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
            $this->OLDRATE->ViewCustomAttributes = "";

            // NEWRATE
            $this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
            $this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
            $this->NEWRATE->ViewCustomAttributes = "";

            // OTEMPMRA
            $this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
            $this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
            $this->OTEMPMRA->ViewCustomAttributes = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
            $this->ACTIVESTATUS->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, $this->PSGST->DefaultDecimalPrecision);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, $this->PCGST->DefaultDecimalPrecision);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, $this->SSGST->DefaultDecimalPrecision);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, $this->SCGST->DefaultDecimalPrecision);
            $this->SCGST->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // BRCODE
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
                    }
                }
            } else {
                $this->BRCODE->ViewValue = null;
            }
            $this->BRCODE->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $this->GENNAME->ViewCustomAttributes = "";

            // BILLDATE
            $this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
            $this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
            $this->BILLDATE->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // BATCH
            $this->BATCH->LinkCustomAttributes = "";
            $this->BATCH->HrefValue = "";
            $this->BATCH->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";
            $this->PRCODE->TooltipValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";
            $this->OQ->TooltipValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";
            $this->RQ->TooltipValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";
            $this->FRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // OLDRT
            $this->OLDRT->LinkCustomAttributes = "";
            $this->OLDRT->HrefValue = "";
            $this->OLDRT->TooltipValue = "";

            // TEMPMRQ
            $this->TEMPMRQ->LinkCustomAttributes = "";
            $this->TEMPMRQ->HrefValue = "";
            $this->TEMPMRQ->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // OLDRATE
            $this->OLDRATE->LinkCustomAttributes = "";
            $this->OLDRATE->HrefValue = "";
            $this->OLDRATE->TooltipValue = "";

            // NEWRATE
            $this->NEWRATE->LinkCustomAttributes = "";
            $this->NEWRATE->HrefValue = "";
            $this->NEWRATE->TooltipValue = "";

            // OTEMPMRA
            $this->OTEMPMRA->LinkCustomAttributes = "";
            $this->OTEMPMRA->HrefValue = "";
            $this->OTEMPMRA->TooltipValue = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->LinkCustomAttributes = "";
            $this->ACTIVESTATUS->HrefValue = "";
            $this->ACTIVESTATUS->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";
            $this->BILLDATE->TooltipValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";
            $this->PUnit->TooltipValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";
            $this->SUnit->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->PrName->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PrName->EditValue = $this->PrName->lookupCacheOption($curVal);
                if ($this->PrName->EditValue === null) { // Lookup from database
                    $filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PrName->Lookup->renderViewRow($rswrk[0]);
                        $this->PrName->EditValue = $this->PrName->displayValue($arwrk);
                    } else {
                        $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->PrName->EditValue = null;
            }
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // BATCH
            $this->BATCH->EditAttrs["class"] = "form-control";
            $this->BATCH->EditCustomAttributes = "";
            if (!$this->BATCH->Raw) {
                $this->BATCH->AdvancedSearch->SearchValue = HtmlDecode($this->BATCH->AdvancedSearch->SearchValue);
            }
            $this->BATCH->EditValue = HtmlEncode($this->BATCH->AdvancedSearch->SearchValue);
            $this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue2, 0), 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->PRCODE->AdvancedSearch->SearchValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->AdvancedSearch->SearchValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->AdvancedSearch->SearchValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->AdvancedSearch->SearchValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());

            // FRQ
            $this->FRQ->EditAttrs["class"] = "form-control";
            $this->FRQ->EditCustomAttributes = "";
            $this->FRQ->EditValue = HtmlEncode($this->FRQ->AdvancedSearch->SearchValue);
            $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->AdvancedSearch->SearchValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->AdvancedSearch->SearchValue = HtmlDecode($this->PC->AdvancedSearch->SearchValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->AdvancedSearch->SearchValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // OLDRT
            $this->OLDRT->EditAttrs["class"] = "form-control";
            $this->OLDRT->EditCustomAttributes = "";
            $this->OLDRT->EditValue = HtmlEncode($this->OLDRT->AdvancedSearch->SearchValue);
            $this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());

            // TEMPMRQ
            $this->TEMPMRQ->EditAttrs["class"] = "form-control";
            $this->TEMPMRQ->EditCustomAttributes = "";
            $this->TEMPMRQ->EditValue = HtmlEncode($this->TEMPMRQ->AdvancedSearch->SearchValue);
            $this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());

            // TAXP
            $this->TAXP->EditAttrs["class"] = "form-control";
            $this->TAXP->EditCustomAttributes = "";
            $this->TAXP->EditValue = HtmlEncode($this->TAXP->AdvancedSearch->SearchValue);
            $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());

            // OLDRATE
            $this->OLDRATE->EditAttrs["class"] = "form-control";
            $this->OLDRATE->EditCustomAttributes = "";
            $this->OLDRATE->EditValue = HtmlEncode($this->OLDRATE->AdvancedSearch->SearchValue);
            $this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());

            // NEWRATE
            $this->NEWRATE->EditAttrs["class"] = "form-control";
            $this->NEWRATE->EditCustomAttributes = "";
            $this->NEWRATE->EditValue = HtmlEncode($this->NEWRATE->AdvancedSearch->SearchValue);
            $this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());

            // OTEMPMRA
            $this->OTEMPMRA->EditAttrs["class"] = "form-control";
            $this->OTEMPMRA->EditCustomAttributes = "";
            $this->OTEMPMRA->EditValue = HtmlEncode($this->OTEMPMRA->AdvancedSearch->SearchValue);
            $this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());

            // ACTIVESTATUS
            $this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
            $this->ACTIVESTATUS->EditCustomAttributes = "";
            if (!$this->ACTIVESTATUS->Raw) {
                $this->ACTIVESTATUS->AdvancedSearch->SearchValue = HtmlDecode($this->ACTIVESTATUS->AdvancedSearch->SearchValue);
            }
            $this->ACTIVESTATUS->EditValue = HtmlEncode($this->ACTIVESTATUS->AdvancedSearch->SearchValue);
            $this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PSGST
            $this->PSGST->EditAttrs["class"] = "form-control";
            $this->PSGST->EditCustomAttributes = "";
            $this->PSGST->EditValue = HtmlEncode($this->PSGST->AdvancedSearch->SearchValue);
            $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());

            // PCGST
            $this->PCGST->EditAttrs["class"] = "form-control";
            $this->PCGST->EditCustomAttributes = "";
            $this->PCGST->EditValue = HtmlEncode($this->PCGST->AdvancedSearch->SearchValue);
            $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->AdvancedSearch->SearchValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->AdvancedSearch->SearchValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

            // BRCODE
            $this->BRCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->BRCODE->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->BRCODE->AdvancedSearch->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
            } else {
                $this->BRCODE->AdvancedSearch->ViewValue = $this->BRCODE->Lookup !== null && is_array($this->BRCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->BRCODE->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->BRCODE->EditValue = array_values($this->BRCODE->Lookup->Options);
                if ($this->BRCODE->AdvancedSearch->ViewValue == "") {
                    $this->BRCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->BRCODE->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->BRCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->BRCODE->AdvancedSearch->ViewValue = $this->BRCODE->displayValue($arwrk);
                } else {
                    $this->BRCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->BRCODE->EditValue = $arwrk;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // BILLDATE
            $this->BILLDATE->EditAttrs["class"] = "form-control";
            $this->BILLDATE->EditCustomAttributes = "";
            $this->BILLDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->AdvancedSearch->SearchValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->AdvancedSearch->SearchValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->AdvancedSearch->SearchValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
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
        if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue2)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if (!CheckNumber($this->OQ->AdvancedSearch->SearchValue)) {
            $this->OQ->addErrorMessage($this->OQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->RQ->AdvancedSearch->SearchValue)) {
            $this->RQ->addErrorMessage($this->RQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->FRQ->AdvancedSearch->SearchValue)) {
            $this->FRQ->addErrorMessage($this->FRQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->IQ->AdvancedSearch->SearchValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->MRQ->AdvancedSearch->SearchValue)) {
            $this->MRQ->addErrorMessage($this->MRQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->MRP->AdvancedSearch->SearchValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if (!CheckNumber($this->UR->AdvancedSearch->SearchValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if (!CheckNumber($this->OLDRT->AdvancedSearch->SearchValue)) {
            $this->OLDRT->addErrorMessage($this->OLDRT->getErrorMessage(false));
        }
        if (!CheckNumber($this->TEMPMRQ->AdvancedSearch->SearchValue)) {
            $this->TEMPMRQ->addErrorMessage($this->TEMPMRQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->TAXP->AdvancedSearch->SearchValue)) {
            $this->TAXP->addErrorMessage($this->TAXP->getErrorMessage(false));
        }
        if (!CheckNumber($this->OLDRATE->AdvancedSearch->SearchValue)) {
            $this->OLDRATE->addErrorMessage($this->OLDRATE->getErrorMessage(false));
        }
        if (!CheckNumber($this->NEWRATE->AdvancedSearch->SearchValue)) {
            $this->NEWRATE->addErrorMessage($this->NEWRATE->getErrorMessage(false));
        }
        if (!CheckNumber($this->OTEMPMRA->AdvancedSearch->SearchValue)) {
            $this->OTEMPMRA->addErrorMessage($this->OTEMPMRA->getErrorMessage(false));
        }
        if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
            $this->id->addErrorMessage($this->id->getErrorMessage(false));
        }
        if (!CheckNumber($this->RT->AdvancedSearch->SearchValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if (!CheckDate($this->BILLDATE->AdvancedSearch->SearchValue)) {
            $this->BILLDATE->addErrorMessage($this->BILLDATE->getErrorMessage(false));
        }
        if (!CheckInteger($this->PUnit->AdvancedSearch->SearchValue)) {
            $this->PUnit->addErrorMessage($this->PUnit->getErrorMessage(false));
        }
        if (!CheckInteger($this->SUnit->AdvancedSearch->SearchValue)) {
            $this->SUnit->addErrorMessage($this->SUnit->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurValue->AdvancedSearch->SearchValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurRate->AdvancedSearch->SearchValue)) {
            $this->PurRate->addErrorMessage($this->PurRate->getErrorMessage(false));
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
        $this->PRC->AdvancedSearch->load();
        $this->PrName->AdvancedSearch->load();
        $this->BATCHNO->AdvancedSearch->load();
        $this->BATCH->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->EXPDT->AdvancedSearch->load();
        $this->PRCODE->AdvancedSearch->load();
        $this->OQ->AdvancedSearch->load();
        $this->RQ->AdvancedSearch->load();
        $this->FRQ->AdvancedSearch->load();
        $this->IQ->AdvancedSearch->load();
        $this->MRQ->AdvancedSearch->load();
        $this->MRP->AdvancedSearch->load();
        $this->UR->AdvancedSearch->load();
        $this->PC->AdvancedSearch->load();
        $this->OLDRT->AdvancedSearch->load();
        $this->TEMPMRQ->AdvancedSearch->load();
        $this->TAXP->AdvancedSearch->load();
        $this->OLDRATE->AdvancedSearch->load();
        $this->NEWRATE->AdvancedSearch->load();
        $this->OTEMPMRA->AdvancedSearch->load();
        $this->ACTIVESTATUS->AdvancedSearch->load();
        $this->id->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->RT->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->UM->AdvancedSearch->load();
        $this->GENNAME->AdvancedSearch->load();
        $this->BILLDATE->AdvancedSearch->load();
        $this->PUnit->AdvancedSearch->load();
        $this->SUnit->AdvancedSearch->load();
        $this->PurValue->AdvancedSearch->load();
        $this->PurRate->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyBatchmasList"), "", $this->TableVar, true);
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
                case "x_PrName":
                    break;
                case "x_BRCODE":
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
