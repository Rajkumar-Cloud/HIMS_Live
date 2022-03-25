<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacySalesSearch extends ViewPharmacySales
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacy_sales';

    // Page object name
    public $PageObjName = "ViewPharmacySalesSearch";

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

        // Table object (view_pharmacy_sales)
        if (!isset($GLOBALS["view_pharmacy_sales"]) || get_class($GLOBALS["view_pharmacy_sales"]) == PROJECT_NAMESPACE . "view_pharmacy_sales") {
            $GLOBALS["view_pharmacy_sales"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_sales');
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
                $doc = new $class(Container("view_pharmacy_sales"));
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
                    if ($pageName == "ViewPharmacySalesView") {
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
        $this->BillDate->setVisibility();
        $this->BILLNO->setVisibility();
        $this->Product->setVisibility();
        $this->SiNo->setVisibility();
        $this->PRC->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->EXPDT->setVisibility();
        $this->Mfg->setVisibility();
        $this->HSN->setVisibility();
        $this->IPNO->setVisibility();
        $this->OPNO->setVisibility();
        $this->SalRate->setVisibility();
        $this->IQ->setVisibility();
        $this->RT->setVisibility();
        $this->DAMT->setVisibility();
        $this->Taxable->setVisibility();
        $this->BILLDT->setVisibility();
        $this->BRCODE->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->PurValue->setVisibility();
        $this->PurRate->setVisibility();
        $this->PAMT->setVisibility();
        $this->PSGSTAmount->setVisibility();
        $this->PCGSTAmount->setVisibility();
        $this->SSGSTAmount->setVisibility();
        $this->SCGSTAmount->setVisibility();
        $this->HosoID->setVisibility();
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
        $this->setupLookupOptions($this->SiNo);
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
                    $srchStr = "ViewPharmacySalesList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->BillDate); // BillDate
        $this->buildSearchUrl($srchUrl, $this->BILLNO); // BILLNO
        $this->buildSearchUrl($srchUrl, $this->Product); // Product
        $this->buildSearchUrl($srchUrl, $this->SiNo); // SiNo
        $this->buildSearchUrl($srchUrl, $this->PRC); // PRC
        $this->buildSearchUrl($srchUrl, $this->BATCHNO); // BATCHNO
        $this->buildSearchUrl($srchUrl, $this->EXPDT); // EXPDT
        $this->buildSearchUrl($srchUrl, $this->Mfg); // Mfg
        $this->buildSearchUrl($srchUrl, $this->HSN); // HSN
        $this->buildSearchUrl($srchUrl, $this->IPNO); // IPNO
        $this->buildSearchUrl($srchUrl, $this->OPNO); // OPNO
        $this->buildSearchUrl($srchUrl, $this->SalRate); // SalRate
        $this->buildSearchUrl($srchUrl, $this->IQ); // IQ
        $this->buildSearchUrl($srchUrl, $this->RT); // RT
        $this->buildSearchUrl($srchUrl, $this->DAMT); // DAMT
        $this->buildSearchUrl($srchUrl, $this->Taxable); // Taxable
        $this->buildSearchUrl($srchUrl, $this->BILLDT); // BILLDT
        $this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
        $this->buildSearchUrl($srchUrl, $this->PSGST); // PSGST
        $this->buildSearchUrl($srchUrl, $this->PCGST); // PCGST
        $this->buildSearchUrl($srchUrl, $this->SSGST); // SSGST
        $this->buildSearchUrl($srchUrl, $this->SCGST); // SCGST
        $this->buildSearchUrl($srchUrl, $this->PurValue); // PurValue
        $this->buildSearchUrl($srchUrl, $this->PurRate); // PurRate
        $this->buildSearchUrl($srchUrl, $this->PAMT); // PAMT
        $this->buildSearchUrl($srchUrl, $this->PSGSTAmount); // PSGSTAmount
        $this->buildSearchUrl($srchUrl, $this->PCGSTAmount); // PCGSTAmount
        $this->buildSearchUrl($srchUrl, $this->SSGSTAmount); // SSGSTAmount
        $this->buildSearchUrl($srchUrl, $this->SCGSTAmount); // SCGSTAmount
        $this->buildSearchUrl($srchUrl, $this->HosoID); // HosoID
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
        if ($this->BillDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BILLNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Product->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SiNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BATCHNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EXPDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Mfg->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HSN->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IPNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OPNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SalRate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DAMT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Taxable->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BILLDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BRCODE->AdvancedSearch->post()) {
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
        if ($this->PurValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PurRate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PAMT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PSGSTAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PCGSTAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SSGSTAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SCGSTAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HosoID->AdvancedSearch->post()) {
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
        if ($this->SalRate->FormValue == $this->SalRate->CurrentValue && is_numeric(ConvertToFloatString($this->SalRate->CurrentValue))) {
            $this->SalRate->CurrentValue = ConvertToFloatString($this->SalRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue))) {
            $this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);
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
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PAMT->FormValue == $this->PAMT->CurrentValue && is_numeric(ConvertToFloatString($this->PAMT->CurrentValue))) {
            $this->PAMT->CurrentValue = ConvertToFloatString($this->PAMT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PSGSTAmount->FormValue == $this->PSGSTAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PSGSTAmount->CurrentValue))) {
            $this->PSGSTAmount->CurrentValue = ConvertToFloatString($this->PSGSTAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PCGSTAmount->FormValue == $this->PCGSTAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PCGSTAmount->CurrentValue))) {
            $this->PCGSTAmount->CurrentValue = ConvertToFloatString($this->PCGSTAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGSTAmount->FormValue == $this->SSGSTAmount->CurrentValue && is_numeric(ConvertToFloatString($this->SSGSTAmount->CurrentValue))) {
            $this->SSGSTAmount->CurrentValue = ConvertToFloatString($this->SSGSTAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGSTAmount->FormValue == $this->SCGSTAmount->CurrentValue && is_numeric(ConvertToFloatString($this->SCGSTAmount->CurrentValue))) {
            $this->SCGSTAmount->CurrentValue = ConvertToFloatString($this->SCGSTAmount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BillDate

        // BILLNO

        // Product

        // SiNo

        // PRC

        // BATCHNO

        // EXPDT

        // Mfg

        // HSN

        // IPNO

        // OPNO

        // SalRate

        // IQ

        // RT

        // DAMT

        // Taxable

        // BILLDT

        // BRCODE

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // PurValue

        // PurRate

        // PAMT

        // PSGSTAmount

        // PCGSTAmount

        // SSGSTAmount

        // SCGSTAmount

        // HosoID
        if ($this->RowType == ROWTYPE_VIEW) {
            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
            $this->BillDate->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // Product
            $this->Product->ViewValue = $this->Product->CurrentValue;
            $this->Product->ViewCustomAttributes = "";

            // SiNo
            $curVal = trim(strval($this->SiNo->CurrentValue));
            if ($curVal != "") {
                $this->SiNo->ViewValue = $this->SiNo->lookupCacheOption($curVal);
                if ($this->SiNo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->SiNo->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SiNo->Lookup->renderViewRow($rswrk[0]);
                        $this->SiNo->ViewValue = $this->SiNo->displayValue($arwrk);
                    } else {
                        $this->SiNo->ViewValue = $this->SiNo->CurrentValue;
                    }
                }
            } else {
                $this->SiNo->ViewValue = null;
            }
            $this->SiNo->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 7);
            $this->EXPDT->ViewCustomAttributes = "";

            // Mfg
            $this->Mfg->ViewValue = $this->Mfg->CurrentValue;
            $this->Mfg->ViewCustomAttributes = "";

            // HSN
            $this->HSN->ViewValue = $this->HSN->CurrentValue;
            $this->HSN->ViewCustomAttributes = "";

            // IPNO
            $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
            $this->IPNO->ViewCustomAttributes = "";

            // OPNO
            $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
            $this->OPNO->ViewCustomAttributes = "";

            // SalRate
            $this->SalRate->ViewValue = $this->SalRate->CurrentValue;
            $this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
            $this->SalRate->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // DAMT
            $this->DAMT->ViewValue = $this->DAMT->CurrentValue;
            $this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
            $this->DAMT->ViewCustomAttributes = "";

            // Taxable
            $this->Taxable->ViewValue = $this->Taxable->CurrentValue;
            $this->Taxable->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 7);
            $this->BILLDT->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
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

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // PAMT
            $this->PAMT->ViewValue = $this->PAMT->CurrentValue;
            $this->PAMT->ViewValue = FormatNumber($this->PAMT->ViewValue, 2, -2, -2, -2);
            $this->PAMT->ViewCustomAttributes = "";

            // PSGSTAmount
            $this->PSGSTAmount->ViewValue = $this->PSGSTAmount->CurrentValue;
            $this->PSGSTAmount->ViewValue = FormatNumber($this->PSGSTAmount->ViewValue, 2, -2, -2, -2);
            $this->PSGSTAmount->ViewCustomAttributes = "";

            // PCGSTAmount
            $this->PCGSTAmount->ViewValue = $this->PCGSTAmount->CurrentValue;
            $this->PCGSTAmount->ViewValue = FormatNumber($this->PCGSTAmount->ViewValue, 2, -2, -2, -2);
            $this->PCGSTAmount->ViewCustomAttributes = "";

            // SSGSTAmount
            $this->SSGSTAmount->ViewValue = $this->SSGSTAmount->CurrentValue;
            $this->SSGSTAmount->ViewValue = FormatNumber($this->SSGSTAmount->ViewValue, 2, -2, -2, -2);
            $this->SSGSTAmount->ViewCustomAttributes = "";

            // SCGSTAmount
            $this->SCGSTAmount->ViewValue = $this->SCGSTAmount->CurrentValue;
            $this->SCGSTAmount->ViewValue = FormatNumber($this->SCGSTAmount->ViewValue, 2, -2, -2, -2);
            $this->SCGSTAmount->ViewCustomAttributes = "";

            // HosoID
            $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
            $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
            $this->HosoID->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";
            $this->BillDate->TooltipValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";
            $this->Product->TooltipValue = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";
            $this->SiNo->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";
            $this->Mfg->TooltipValue = "";

            // HSN
            $this->HSN->LinkCustomAttributes = "";
            $this->HSN->HrefValue = "";
            $this->HSN->TooltipValue = "";

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";
            $this->IPNO->TooltipValue = "";

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";
            $this->OPNO->TooltipValue = "";

            // SalRate
            $this->SalRate->LinkCustomAttributes = "";
            $this->SalRate->HrefValue = "";
            $this->SalRate->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";
            $this->DAMT->TooltipValue = "";

            // Taxable
            $this->Taxable->LinkCustomAttributes = "";
            $this->Taxable->HrefValue = "";
            $this->Taxable->TooltipValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

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

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";

            // PAMT
            $this->PAMT->LinkCustomAttributes = "";
            $this->PAMT->HrefValue = "";
            $this->PAMT->TooltipValue = "";

            // PSGSTAmount
            $this->PSGSTAmount->LinkCustomAttributes = "";
            $this->PSGSTAmount->HrefValue = "";
            $this->PSGSTAmount->TooltipValue = "";

            // PCGSTAmount
            $this->PCGSTAmount->LinkCustomAttributes = "";
            $this->PCGSTAmount->HrefValue = "";
            $this->PCGSTAmount->TooltipValue = "";

            // SSGSTAmount
            $this->SSGSTAmount->LinkCustomAttributes = "";
            $this->SSGSTAmount->HrefValue = "";
            $this->SSGSTAmount->TooltipValue = "";

            // SCGSTAmount
            $this->SCGSTAmount->LinkCustomAttributes = "";
            $this->SCGSTAmount->HrefValue = "";
            $this->SCGSTAmount->TooltipValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";
            $this->HosoID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue, 7), 7));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue2, 7), 7));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->AdvancedSearch->SearchValue = HtmlDecode($this->BILLNO->AdvancedSearch->SearchValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->AdvancedSearch->SearchValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // Product
            $this->Product->EditAttrs["class"] = "form-control";
            $this->Product->EditCustomAttributes = "";
            if (!$this->Product->Raw) {
                $this->Product->AdvancedSearch->SearchValue = HtmlDecode($this->Product->AdvancedSearch->SearchValue);
            }
            $this->Product->EditValue = HtmlEncode($this->Product->AdvancedSearch->SearchValue);
            $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

            // SiNo
            $this->SiNo->EditAttrs["class"] = "form-control";
            $this->SiNo->EditCustomAttributes = "";
            $curVal = trim(strval($this->SiNo->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->SiNo->AdvancedSearch->ViewValue = $this->SiNo->lookupCacheOption($curVal);
            } else {
                $this->SiNo->AdvancedSearch->ViewValue = $this->SiNo->Lookup !== null && is_array($this->SiNo->Lookup->Options) ? $curVal : null;
            }
            if ($this->SiNo->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->SiNo->EditValue = array_values($this->SiNo->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->SiNo->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->SiNo->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->SiNo->EditValue = $arwrk;
            }
            $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 7), 7));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // Mfg
            $this->Mfg->EditAttrs["class"] = "form-control";
            $this->Mfg->EditCustomAttributes = "";
            if (!$this->Mfg->Raw) {
                $this->Mfg->AdvancedSearch->SearchValue = HtmlDecode($this->Mfg->AdvancedSearch->SearchValue);
            }
            $this->Mfg->EditValue = HtmlEncode($this->Mfg->AdvancedSearch->SearchValue);
            $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

            // HSN
            $this->HSN->EditAttrs["class"] = "form-control";
            $this->HSN->EditCustomAttributes = "";
            if (!$this->HSN->Raw) {
                $this->HSN->AdvancedSearch->SearchValue = HtmlDecode($this->HSN->AdvancedSearch->SearchValue);
            }
            $this->HSN->EditValue = HtmlEncode($this->HSN->AdvancedSearch->SearchValue);
            $this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

            // IPNO
            $this->IPNO->EditAttrs["class"] = "form-control";
            $this->IPNO->EditCustomAttributes = "";
            if (!$this->IPNO->Raw) {
                $this->IPNO->AdvancedSearch->SearchValue = HtmlDecode($this->IPNO->AdvancedSearch->SearchValue);
            }
            $this->IPNO->EditValue = HtmlEncode($this->IPNO->AdvancedSearch->SearchValue);
            $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

            // OPNO
            $this->OPNO->EditAttrs["class"] = "form-control";
            $this->OPNO->EditCustomAttributes = "";
            if (!$this->OPNO->Raw) {
                $this->OPNO->AdvancedSearch->SearchValue = HtmlDecode($this->OPNO->AdvancedSearch->SearchValue);
            }
            $this->OPNO->EditValue = HtmlEncode($this->OPNO->AdvancedSearch->SearchValue);
            $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

            // SalRate
            $this->SalRate->EditAttrs["class"] = "form-control";
            $this->SalRate->EditCustomAttributes = "";
            $this->SalRate->EditValue = HtmlEncode($this->SalRate->AdvancedSearch->SearchValue);
            $this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

            // DAMT
            $this->DAMT->EditAttrs["class"] = "form-control";
            $this->DAMT->EditCustomAttributes = "";
            $this->DAMT->EditValue = HtmlEncode($this->DAMT->AdvancedSearch->SearchValue);
            $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());

            // Taxable
            $this->Taxable->EditAttrs["class"] = "form-control";
            $this->Taxable->EditCustomAttributes = "";
            if (!$this->Taxable->Raw) {
                $this->Taxable->AdvancedSearch->SearchValue = HtmlDecode($this->Taxable->AdvancedSearch->SearchValue);
            }
            $this->Taxable->EditValue = HtmlEncode($this->Taxable->AdvancedSearch->SearchValue);
            $this->Taxable->PlaceHolder = RemoveHtml($this->Taxable->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            $this->BILLDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDT->AdvancedSearch->SearchValue, 7), 7));
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->BRCODE->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->BRCODE->EditValue = null;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

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

            // PAMT
            $this->PAMT->EditAttrs["class"] = "form-control";
            $this->PAMT->EditCustomAttributes = "";
            $this->PAMT->EditValue = HtmlEncode($this->PAMT->AdvancedSearch->SearchValue);
            $this->PAMT->PlaceHolder = RemoveHtml($this->PAMT->caption());

            // PSGSTAmount
            $this->PSGSTAmount->EditAttrs["class"] = "form-control";
            $this->PSGSTAmount->EditCustomAttributes = "";
            $this->PSGSTAmount->EditValue = HtmlEncode($this->PSGSTAmount->AdvancedSearch->SearchValue);
            $this->PSGSTAmount->PlaceHolder = RemoveHtml($this->PSGSTAmount->caption());

            // PCGSTAmount
            $this->PCGSTAmount->EditAttrs["class"] = "form-control";
            $this->PCGSTAmount->EditCustomAttributes = "";
            $this->PCGSTAmount->EditValue = HtmlEncode($this->PCGSTAmount->AdvancedSearch->SearchValue);
            $this->PCGSTAmount->PlaceHolder = RemoveHtml($this->PCGSTAmount->caption());

            // SSGSTAmount
            $this->SSGSTAmount->EditAttrs["class"] = "form-control";
            $this->SSGSTAmount->EditCustomAttributes = "";
            $this->SSGSTAmount->EditValue = HtmlEncode($this->SSGSTAmount->AdvancedSearch->SearchValue);
            $this->SSGSTAmount->PlaceHolder = RemoveHtml($this->SSGSTAmount->caption());

            // SCGSTAmount
            $this->SCGSTAmount->EditAttrs["class"] = "form-control";
            $this->SCGSTAmount->EditCustomAttributes = "";
            $this->SCGSTAmount->EditValue = HtmlEncode($this->SCGSTAmount->AdvancedSearch->SearchValue);
            $this->SCGSTAmount->PlaceHolder = RemoveHtml($this->SCGSTAmount->caption());

            // HosoID
            $this->HosoID->EditAttrs["class"] = "form-control";
            $this->HosoID->EditCustomAttributes = "";
            $this->HosoID->EditValue = HtmlEncode($this->HosoID->AdvancedSearch->SearchValue);
            $this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());
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
        if (!CheckEuroDate($this->BillDate->AdvancedSearch->SearchValue)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->BillDate->AdvancedSearch->SearchValue2)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->EXPDT->AdvancedSearch->SearchValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if (!CheckNumber($this->SalRate->AdvancedSearch->SearchValue)) {
            $this->SalRate->addErrorMessage($this->SalRate->getErrorMessage(false));
        }
        if (!CheckNumber($this->IQ->AdvancedSearch->SearchValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->RT->AdvancedSearch->SearchValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if (!CheckNumber($this->DAMT->AdvancedSearch->SearchValue)) {
            $this->DAMT->addErrorMessage($this->DAMT->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->BILLDT->AdvancedSearch->SearchValue)) {
            $this->BILLDT->addErrorMessage($this->BILLDT->getErrorMessage(false));
        }
        if (!CheckInteger($this->BRCODE->AdvancedSearch->SearchValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if (!CheckNumber($this->PSGST->AdvancedSearch->SearchValue)) {
            $this->PSGST->addErrorMessage($this->PSGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->PCGST->AdvancedSearch->SearchValue)) {
            $this->PCGST->addErrorMessage($this->PCGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->SSGST->AdvancedSearch->SearchValue)) {
            $this->SSGST->addErrorMessage($this->SSGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->SCGST->AdvancedSearch->SearchValue)) {
            $this->SCGST->addErrorMessage($this->SCGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurValue->AdvancedSearch->SearchValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurRate->AdvancedSearch->SearchValue)) {
            $this->PurRate->addErrorMessage($this->PurRate->getErrorMessage(false));
        }
        if (!CheckNumber($this->PAMT->AdvancedSearch->SearchValue)) {
            $this->PAMT->addErrorMessage($this->PAMT->getErrorMessage(false));
        }
        if (!CheckNumber($this->PSGSTAmount->AdvancedSearch->SearchValue)) {
            $this->PSGSTAmount->addErrorMessage($this->PSGSTAmount->getErrorMessage(false));
        }
        if (!CheckNumber($this->PCGSTAmount->AdvancedSearch->SearchValue)) {
            $this->PCGSTAmount->addErrorMessage($this->PCGSTAmount->getErrorMessage(false));
        }
        if (!CheckNumber($this->SSGSTAmount->AdvancedSearch->SearchValue)) {
            $this->SSGSTAmount->addErrorMessage($this->SSGSTAmount->getErrorMessage(false));
        }
        if (!CheckNumber($this->SCGSTAmount->AdvancedSearch->SearchValue)) {
            $this->SCGSTAmount->addErrorMessage($this->SCGSTAmount->getErrorMessage(false));
        }
        if (!CheckInteger($this->HosoID->AdvancedSearch->SearchValue)) {
            $this->HosoID->addErrorMessage($this->HosoID->getErrorMessage(false));
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
        $this->BillDate->AdvancedSearch->load();
        $this->BILLNO->AdvancedSearch->load();
        $this->Product->AdvancedSearch->load();
        $this->SiNo->AdvancedSearch->load();
        $this->PRC->AdvancedSearch->load();
        $this->BATCHNO->AdvancedSearch->load();
        $this->EXPDT->AdvancedSearch->load();
        $this->Mfg->AdvancedSearch->load();
        $this->HSN->AdvancedSearch->load();
        $this->IPNO->AdvancedSearch->load();
        $this->OPNO->AdvancedSearch->load();
        $this->SalRate->AdvancedSearch->load();
        $this->IQ->AdvancedSearch->load();
        $this->RT->AdvancedSearch->load();
        $this->DAMT->AdvancedSearch->load();
        $this->Taxable->AdvancedSearch->load();
        $this->BILLDT->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->PurValue->AdvancedSearch->load();
        $this->PurRate->AdvancedSearch->load();
        $this->PAMT->AdvancedSearch->load();
        $this->PSGSTAmount->AdvancedSearch->load();
        $this->PCGSTAmount->AdvancedSearch->load();
        $this->SSGSTAmount->AdvancedSearch->load();
        $this->SCGSTAmount->AdvancedSearch->load();
        $this->HosoID->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewPharmacySalesList"), "", $this->TableVar, true);
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
                case "x_SiNo":
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
