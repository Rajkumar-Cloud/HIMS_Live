<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacyMovementItemSearch extends ViewPharmacyMovementItem
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacy_movement_item';

    // Page object name
    public $PageObjName = "ViewPharmacyMovementItemSearch";

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

        // Table object (view_pharmacy_movement_item)
        if (!isset($GLOBALS["view_pharmacy_movement_item"]) || get_class($GLOBALS["view_pharmacy_movement_item"]) == PROJECT_NAMESPACE . "view_pharmacy_movement_item") {
            $GLOBALS["view_pharmacy_movement_item"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_movement_item');
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
                $doc = new $class(Container("view_pharmacy_movement_item"));
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
                    if ($pageName == "ViewPharmacyMovementItemView") {
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
        $this->ProductFrom->setVisibility();
        $this->Quantity->setVisibility();
        $this->FreeQty->setVisibility();
        $this->IQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->BRCODE->setVisibility();
        $this->OPNO->setVisibility();
        $this->IPNO->setVisibility();
        $this->PatientBILLNO->setVisibility();
        $this->BILLDT->setVisibility();
        $this->GRNNO->setVisibility();
        $this->DT->setVisibility();
        $this->Customername->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->BILLNO->setVisibility();
        $this->prc->setVisibility();
        $this->PrName->setVisibility();
        $this->BatchNo->setVisibility();
        $this->ExpDate->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->hsn->setVisibility();
        $this->HospID->setVisibility();
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
        $this->setupLookupOptions($this->ProductFrom);
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
                    $srchStr = "ViewPharmacyMovementItemList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->ProductFrom); // ProductFrom
        $this->buildSearchUrl($srchUrl, $this->Quantity); // Quantity
        $this->buildSearchUrl($srchUrl, $this->FreeQty); // FreeQty
        $this->buildSearchUrl($srchUrl, $this->IQ); // IQ
        $this->buildSearchUrl($srchUrl, $this->MRQ); // MRQ
        $this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
        $this->buildSearchUrl($srchUrl, $this->OPNO); // OPNO
        $this->buildSearchUrl($srchUrl, $this->IPNO); // IPNO
        $this->buildSearchUrl($srchUrl, $this->PatientBILLNO); // PatientBILLNO
        $this->buildSearchUrl($srchUrl, $this->BILLDT); // BILLDT
        $this->buildSearchUrl($srchUrl, $this->GRNNO); // GRNNO
        $this->buildSearchUrl($srchUrl, $this->DT); // DT
        $this->buildSearchUrl($srchUrl, $this->Customername); // Customername
        $this->buildSearchUrl($srchUrl, $this->createdby); // createdby
        $this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
        $this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
        $this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
        $this->buildSearchUrl($srchUrl, $this->BILLNO); // BILLNO
        $this->buildSearchUrl($srchUrl, $this->prc); // prc
        $this->buildSearchUrl($srchUrl, $this->PrName); // PrName
        $this->buildSearchUrl($srchUrl, $this->BatchNo); // BatchNo
        $this->buildSearchUrl($srchUrl, $this->ExpDate); // ExpDate
        $this->buildSearchUrl($srchUrl, $this->MFRCODE); // MFRCODE
        $this->buildSearchUrl($srchUrl, $this->hsn); // hsn
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
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
        if ($this->ProductFrom->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Quantity->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FreeQty->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MRQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OPNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IPNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientBILLNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BILLDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GRNNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Customername->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createdby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createddatetime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modifiedby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modifieddatetime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BILLNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->prc->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BatchNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ExpDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MFRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->hsn->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospID->AdvancedSearch->post()) {
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

        // ProductFrom

        // Quantity

        // FreeQty

        // IQ

        // MRQ

        // BRCODE

        // OPNO

        // IPNO

        // PatientBILLNO

        // BILLDT

        // GRNNO

        // DT

        // Customername

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BILLNO

        // prc

        // PrName

        // BatchNo

        // ExpDate

        // MFRCODE

        // hsn

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // ProductFrom
            $this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
            $curVal = trim(strval($this->ProductFrom->CurrentValue));
            if ($curVal != "") {
                $this->ProductFrom->ViewValue = $this->ProductFrom->lookupCacheOption($curVal);
                if ($this->ProductFrom->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ProductFrom->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ProductFrom->Lookup->renderViewRow($rswrk[0]);
                        $this->ProductFrom->ViewValue = $this->ProductFrom->displayValue($arwrk);
                    } else {
                        $this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
                    }
                }
            } else {
                $this->ProductFrom->ViewValue = null;
            }
            $this->ProductFrom->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewCustomAttributes = "";

            // FreeQty
            $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
            $this->FreeQty->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewCustomAttributes = "";

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

            // OPNO
            $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
            $this->OPNO->ViewCustomAttributes = "";

            // IPNO
            $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
            $this->IPNO->ViewCustomAttributes = "";

            // PatientBILLNO
            $this->PatientBILLNO->ViewValue = $this->PatientBILLNO->CurrentValue;
            $this->PatientBILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
            $this->GRNNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 11);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // prc
            $this->prc->ViewValue = $this->prc->CurrentValue;
            $this->prc->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // ExpDate
            $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
            $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 7);
            $this->ExpDate->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // hsn
            $this->hsn->ViewValue = $this->hsn->CurrentValue;
            $this->hsn->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // ProductFrom
            $this->ProductFrom->LinkCustomAttributes = "";
            $this->ProductFrom->HrefValue = "";
            $this->ProductFrom->TooltipValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";
            $this->FreeQty->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";
            $this->OPNO->TooltipValue = "";

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";
            $this->IPNO->TooltipValue = "";

            // PatientBILLNO
            $this->PatientBILLNO->LinkCustomAttributes = "";
            $this->PatientBILLNO->HrefValue = "";
            $this->PatientBILLNO->TooltipValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";
            $this->GRNNO->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

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

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";

            // prc
            $this->prc->LinkCustomAttributes = "";
            $this->prc->HrefValue = "";
            $this->prc->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";
            $this->ExpDate->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // hsn
            $this->hsn->LinkCustomAttributes = "";
            $this->hsn->HrefValue = "";
            $this->hsn->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // ProductFrom
            $this->ProductFrom->EditAttrs["class"] = "form-control";
            $this->ProductFrom->EditCustomAttributes = "";
            if (!$this->ProductFrom->Raw) {
                $this->ProductFrom->AdvancedSearch->SearchValue = HtmlDecode($this->ProductFrom->AdvancedSearch->SearchValue);
            }
            $this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->ProductFrom->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->ProductFrom->EditValue = $this->ProductFrom->lookupCacheOption($curVal);
                if ($this->ProductFrom->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ProductFrom->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ProductFrom->Lookup->renderViewRow($rswrk[0]);
                        $this->ProductFrom->EditValue = $this->ProductFrom->displayValue($arwrk);
                    } else {
                        $this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->ProductFrom->EditValue = null;
            }
            $this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            if (!$this->Quantity->Raw) {
                $this->Quantity->AdvancedSearch->SearchValue = HtmlDecode($this->Quantity->AdvancedSearch->SearchValue);
            }
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->AdvancedSearch->SearchValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // FreeQty
            $this->FreeQty->EditAttrs["class"] = "form-control";
            $this->FreeQty->EditCustomAttributes = "";
            if (!$this->FreeQty->Raw) {
                $this->FreeQty->AdvancedSearch->SearchValue = HtmlDecode($this->FreeQty->AdvancedSearch->SearchValue);
            }
            $this->FreeQty->EditValue = HtmlEncode($this->FreeQty->AdvancedSearch->SearchValue);
            $this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            if (!$this->IQ->Raw) {
                $this->IQ->AdvancedSearch->SearchValue = HtmlDecode($this->IQ->AdvancedSearch->SearchValue);
            }
            $this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            if (!$this->MRQ->Raw) {
                $this->MRQ->AdvancedSearch->SearchValue = HtmlDecode($this->MRQ->AdvancedSearch->SearchValue);
            }
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            if (!$this->BRCODE->Raw) {
                $this->BRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->BRCODE->AdvancedSearch->SearchValue);
            }
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

            // OPNO
            $this->OPNO->EditAttrs["class"] = "form-control";
            $this->OPNO->EditCustomAttributes = "";
            if (!$this->OPNO->Raw) {
                $this->OPNO->AdvancedSearch->SearchValue = HtmlDecode($this->OPNO->AdvancedSearch->SearchValue);
            }
            $this->OPNO->EditValue = HtmlEncode($this->OPNO->AdvancedSearch->SearchValue);
            $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

            // IPNO
            $this->IPNO->EditAttrs["class"] = "form-control";
            $this->IPNO->EditCustomAttributes = "";
            if (!$this->IPNO->Raw) {
                $this->IPNO->AdvancedSearch->SearchValue = HtmlDecode($this->IPNO->AdvancedSearch->SearchValue);
            }
            $this->IPNO->EditValue = HtmlEncode($this->IPNO->AdvancedSearch->SearchValue);
            $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

            // PatientBILLNO
            $this->PatientBILLNO->EditAttrs["class"] = "form-control";
            $this->PatientBILLNO->EditCustomAttributes = "";
            if (!$this->PatientBILLNO->Raw) {
                $this->PatientBILLNO->AdvancedSearch->SearchValue = HtmlDecode($this->PatientBILLNO->AdvancedSearch->SearchValue);
            }
            $this->PatientBILLNO->EditValue = HtmlEncode($this->PatientBILLNO->AdvancedSearch->SearchValue);
            $this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            if (!$this->BILLDT->Raw) {
                $this->BILLDT->AdvancedSearch->SearchValue = HtmlDecode($this->BILLDT->AdvancedSearch->SearchValue);
            }
            $this->BILLDT->EditValue = HtmlEncode($this->BILLDT->AdvancedSearch->SearchValue);
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

            // GRNNO
            $this->GRNNO->EditAttrs["class"] = "form-control";
            $this->GRNNO->EditCustomAttributes = "";
            if (!$this->GRNNO->Raw) {
                $this->GRNNO->AdvancedSearch->SearchValue = HtmlDecode($this->GRNNO->AdvancedSearch->SearchValue);
            }
            $this->GRNNO->EditValue = HtmlEncode($this->GRNNO->AdvancedSearch->SearchValue);
            $this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            if (!$this->DT->Raw) {
                $this->DT->AdvancedSearch->SearchValue = HtmlDecode($this->DT->AdvancedSearch->SearchValue);
            }
            $this->DT->EditValue = HtmlEncode($this->DT->AdvancedSearch->SearchValue);
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->AdvancedSearch->SearchValue = HtmlDecode($this->Customername->AdvancedSearch->SearchValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->AdvancedSearch->SearchValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 11), 11));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->AdvancedSearch->SearchValue = HtmlDecode($this->modifiedby->AdvancedSearch->SearchValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 11), 11));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->AdvancedSearch->SearchValue = HtmlDecode($this->BILLNO->AdvancedSearch->SearchValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->AdvancedSearch->SearchValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // prc
            $this->prc->EditAttrs["class"] = "form-control";
            $this->prc->EditCustomAttributes = "";
            if (!$this->prc->Raw) {
                $this->prc->AdvancedSearch->SearchValue = HtmlDecode($this->prc->AdvancedSearch->SearchValue);
            }
            $this->prc->EditValue = HtmlEncode($this->prc->AdvancedSearch->SearchValue);
            $this->prc->PlaceHolder = RemoveHtml($this->prc->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->AdvancedSearch->SearchValue = HtmlDecode($this->BatchNo->AdvancedSearch->SearchValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->AdvancedSearch->SearchValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ExpDate->AdvancedSearch->SearchValue, 7), 7));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ExpDate->AdvancedSearch->SearchValue2, 7), 7));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // hsn
            $this->hsn->EditAttrs["class"] = "form-control";
            $this->hsn->EditCustomAttributes = "";
            if (!$this->hsn->Raw) {
                $this->hsn->AdvancedSearch->SearchValue = HtmlDecode($this->hsn->AdvancedSearch->SearchValue);
            }
            $this->hsn->EditValue = HtmlEncode($this->hsn->AdvancedSearch->SearchValue);
            $this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
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
        if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->ExpDate->AdvancedSearch->SearchValue)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->ExpDate->AdvancedSearch->SearchValue2)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
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
        $this->ProductFrom->AdvancedSearch->load();
        $this->Quantity->AdvancedSearch->load();
        $this->FreeQty->AdvancedSearch->load();
        $this->IQ->AdvancedSearch->load();
        $this->MRQ->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->OPNO->AdvancedSearch->load();
        $this->IPNO->AdvancedSearch->load();
        $this->PatientBILLNO->AdvancedSearch->load();
        $this->BILLDT->AdvancedSearch->load();
        $this->GRNNO->AdvancedSearch->load();
        $this->DT->AdvancedSearch->load();
        $this->Customername->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->BILLNO->AdvancedSearch->load();
        $this->prc->AdvancedSearch->load();
        $this->PrName->AdvancedSearch->load();
        $this->BatchNo->AdvancedSearch->load();
        $this->ExpDate->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->hsn->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewPharmacyMovementItemList"), "", $this->TableVar, true);
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
                case "x_ProductFrom":
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
