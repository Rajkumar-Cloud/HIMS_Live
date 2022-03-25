<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacytransferSearch extends ViewPharmacytransfer
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacytransfer';

    // Page object name
    public $PageObjName = "ViewPharmacytransferSearch";

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

        // Table object (view_pharmacytransfer)
        if (!isset($GLOBALS["view_pharmacytransfer"]) || get_class($GLOBALS["view_pharmacytransfer"]) == PROJECT_NAMESPACE . "view_pharmacytransfer") {
            $GLOBALS["view_pharmacytransfer"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacytransfer');
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
                $doc = new $class(Container("view_pharmacytransfer"));
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
                    if ($pageName == "ViewPharmacytransferView") {
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
        $this->ORDNO->setVisibility();
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->QTY->setVisibility();
        $this->DT->setVisibility();
        $this->PC->setVisibility();
        $this->YM->setVisibility();
        $this->Stock->setVisibility();
        $this->Printcheck->setVisibility();
        $this->id->setVisibility();
        $this->grnid->setVisibility();
        $this->poid->setVisibility();
        $this->LastMonthSale->setVisibility();
        $this->PrName->setVisibility();
        $this->GrnQuantity->setVisibility();
        $this->Quantity->setVisibility();
        $this->FreeQty->setVisibility();
        $this->BatchNo->setVisibility();
        $this->ExpDate->setVisibility();
        $this->HSN->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->PUnit->setVisibility();
        $this->SUnit->setVisibility();
        $this->MRP->setVisibility();
        $this->PurValue->setVisibility();
        $this->Disc->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->PTax->setVisibility();
        $this->ItemValue->setVisibility();
        $this->SalTax->setVisibility();
        $this->PurRate->setVisibility();
        $this->SalRate->setVisibility();
        $this->Discount->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->Pack->setVisibility();
        $this->GrnMRP->setVisibility();
        $this->trid->setVisibility();
        $this->HospID->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->grncreatedby->setVisibility();
        $this->grncreatedDateTime->setVisibility();
        $this->grnModifiedby->setVisibility();
        $this->grnModifiedDateTime->setVisibility();
        $this->Received->setVisibility();
        $this->BillDate->setVisibility();
        $this->CurStock->setVisibility();
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
        $this->setupLookupOptions($this->ORDNO);
        $this->setupLookupOptions($this->BRCODE);
        $this->setupLookupOptions($this->LastMonthSale);

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
                    $srchStr = "ViewPharmacytransferList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->ORDNO); // ORDNO
        $this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
        $this->buildSearchUrl($srchUrl, $this->PRC); // PRC
        $this->buildSearchUrl($srchUrl, $this->QTY); // QTY
        $this->buildSearchUrl($srchUrl, $this->DT); // DT
        $this->buildSearchUrl($srchUrl, $this->PC); // PC
        $this->buildSearchUrl($srchUrl, $this->YM); // YM
        $this->buildSearchUrl($srchUrl, $this->Stock); // Stock
        $this->buildSearchUrl($srchUrl, $this->Printcheck); // Printcheck
        $this->buildSearchUrl($srchUrl, $this->id); // id
        $this->buildSearchUrl($srchUrl, $this->grnid); // grnid
        $this->buildSearchUrl($srchUrl, $this->poid); // poid
        $this->buildSearchUrl($srchUrl, $this->LastMonthSale); // LastMonthSale
        $this->buildSearchUrl($srchUrl, $this->PrName); // PrName
        $this->buildSearchUrl($srchUrl, $this->GrnQuantity); // GrnQuantity
        $this->buildSearchUrl($srchUrl, $this->Quantity); // Quantity
        $this->buildSearchUrl($srchUrl, $this->FreeQty); // FreeQty
        $this->buildSearchUrl($srchUrl, $this->BatchNo); // BatchNo
        $this->buildSearchUrl($srchUrl, $this->ExpDate); // ExpDate
        $this->buildSearchUrl($srchUrl, $this->HSN); // HSN
        $this->buildSearchUrl($srchUrl, $this->MFRCODE); // MFRCODE
        $this->buildSearchUrl($srchUrl, $this->PUnit); // PUnit
        $this->buildSearchUrl($srchUrl, $this->SUnit); // SUnit
        $this->buildSearchUrl($srchUrl, $this->MRP); // MRP
        $this->buildSearchUrl($srchUrl, $this->PurValue); // PurValue
        $this->buildSearchUrl($srchUrl, $this->Disc); // Disc
        $this->buildSearchUrl($srchUrl, $this->PSGST); // PSGST
        $this->buildSearchUrl($srchUrl, $this->PCGST); // PCGST
        $this->buildSearchUrl($srchUrl, $this->PTax); // PTax
        $this->buildSearchUrl($srchUrl, $this->ItemValue); // ItemValue
        $this->buildSearchUrl($srchUrl, $this->SalTax); // SalTax
        $this->buildSearchUrl($srchUrl, $this->PurRate); // PurRate
        $this->buildSearchUrl($srchUrl, $this->SalRate); // SalRate
        $this->buildSearchUrl($srchUrl, $this->Discount); // Discount
        $this->buildSearchUrl($srchUrl, $this->SSGST); // SSGST
        $this->buildSearchUrl($srchUrl, $this->SCGST); // SCGST
        $this->buildSearchUrl($srchUrl, $this->Pack); // Pack
        $this->buildSearchUrl($srchUrl, $this->GrnMRP); // GrnMRP
        $this->buildSearchUrl($srchUrl, $this->trid); // trid
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->CreatedBy); // CreatedBy
        $this->buildSearchUrl($srchUrl, $this->CreatedDateTime); // CreatedDateTime
        $this->buildSearchUrl($srchUrl, $this->ModifiedBy); // ModifiedBy
        $this->buildSearchUrl($srchUrl, $this->ModifiedDateTime); // ModifiedDateTime
        $this->buildSearchUrl($srchUrl, $this->grncreatedby); // grncreatedby
        $this->buildSearchUrl($srchUrl, $this->grncreatedDateTime); // grncreatedDateTime
        $this->buildSearchUrl($srchUrl, $this->grnModifiedby); // grnModifiedby
        $this->buildSearchUrl($srchUrl, $this->grnModifiedDateTime); // grnModifiedDateTime
        $this->buildSearchUrl($srchUrl, $this->Received); // Received
        $this->buildSearchUrl($srchUrl, $this->BillDate); // BillDate
        $this->buildSearchUrl($srchUrl, $this->CurStock); // CurStock
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
        if ($this->ORDNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->QTY->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->YM->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Stock->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Printcheck->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->grnid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->poid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LastMonthSale->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GrnQuantity->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Quantity->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FreeQty->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BatchNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ExpDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HSN->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MFRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PUnit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SUnit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MRP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PurValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Disc->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PSGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PCGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PTax->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ItemValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SalTax->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PurRate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SalRate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Discount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SSGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SCGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Pack->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GrnMRP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->trid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CreatedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CreatedDateTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ModifiedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ModifiedDateTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->grncreatedby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->grncreatedDateTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->grnModifiedby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->grnModifiedDateTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Received->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CurStock->AdvancedSearch->post()) {
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
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
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
        if ($this->PTax->FormValue == $this->PTax->CurrentValue && is_numeric(ConvertToFloatString($this->PTax->CurrentValue))) {
            $this->PTax->CurrentValue = ConvertToFloatString($this->PTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue))) {
            $this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalTax->FormValue == $this->SalTax->CurrentValue && is_numeric(ConvertToFloatString($this->SalTax->CurrentValue))) {
            $this->SalTax->CurrentValue = ConvertToFloatString($this->SalTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalRate->FormValue == $this->SalRate->CurrentValue && is_numeric(ConvertToFloatString($this->SalRate->CurrentValue))) {
            $this->SalRate->CurrentValue = ConvertToFloatString($this->SalRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
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
        if ($this->GrnMRP->FormValue == $this->GrnMRP->CurrentValue && is_numeric(ConvertToFloatString($this->GrnMRP->CurrentValue))) {
            $this->GrnMRP->CurrentValue = ConvertToFloatString($this->GrnMRP->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ORDNO

        // BRCODE

        // PRC

        // QTY

        // DT

        // PC

        // YM

        // Stock

        // Printcheck

        // id

        // grnid

        // poid

        // LastMonthSale

        // PrName

        // GrnQuantity

        // Quantity

        // FreeQty

        // BatchNo

        // ExpDate

        // HSN

        // MFRCODE

        // PUnit

        // SUnit

        // MRP

        // PurValue

        // Disc

        // PSGST

        // PCGST

        // PTax

        // ItemValue

        // SalTax

        // PurRate

        // SalRate

        // Discount

        // SSGST

        // SCGST

        // Pack

        // GrnMRP

        // trid

        // HospID

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // grncreatedby

        // grncreatedDateTime

        // grnModifiedby

        // grnModifiedDateTime

        // Received

        // BillDate

        // CurStock
        if ($this->RowType == ROWTYPE_VIEW) {
            // ORDNO
            $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
            $curVal = trim(strval($this->ORDNO->CurrentValue));
            if ($curVal != "") {
                $this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
                if ($this->ORDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ORDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ORDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
                    } else {
                        $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
                    }
                }
            } else {
                $this->ORDNO->ViewValue = null;
            }
            $this->ORDNO->ViewCustomAttributes = "";

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

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // QTY
            $this->QTY->ViewValue = $this->QTY->CurrentValue;
            $this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
            $this->QTY->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // Stock
            $this->Stock->ViewValue = $this->Stock->CurrentValue;
            $this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
            $this->Stock->ViewCustomAttributes = "";

            // Printcheck
            $this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
            $this->Printcheck->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // grnid
            $this->grnid->ViewValue = $this->grnid->CurrentValue;
            $this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
            $this->grnid->ViewCustomAttributes = "";

            // poid
            $this->poid->ViewValue = $this->poid->CurrentValue;
            $this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
            $this->poid->ViewCustomAttributes = "";

            // LastMonthSale
            $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
                    }
                }
            } else {
                $this->LastMonthSale->ViewValue = null;
            }
            $this->LastMonthSale->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // GrnQuantity
            $this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
            $this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
            $this->GrnQuantity->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // FreeQty
            $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
            $this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
            $this->FreeQty->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // ExpDate
            $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
            $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
            $this->ExpDate->ViewCustomAttributes = "";

            // HSN
            $this->HSN->ViewValue = $this->HSN->CurrentValue;
            $this->HSN->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // Disc
            $this->Disc->ViewValue = $this->Disc->CurrentValue;
            $this->Disc->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // PTax
            $this->PTax->ViewValue = $this->PTax->CurrentValue;
            $this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
            $this->PTax->ViewCustomAttributes = "";

            // ItemValue
            $this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
            $this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
            $this->ItemValue->ViewCustomAttributes = "";

            // SalTax
            $this->SalTax->ViewValue = $this->SalTax->CurrentValue;
            $this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
            $this->SalTax->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // SalRate
            $this->SalRate->ViewValue = $this->SalRate->CurrentValue;
            $this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
            $this->SalRate->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // Pack
            $this->Pack->ViewValue = $this->Pack->CurrentValue;
            $this->Pack->ViewCustomAttributes = "";

            // GrnMRP
            $this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
            $this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
            $this->GrnMRP->ViewCustomAttributes = "";

            // trid
            $this->trid->ViewValue = $this->trid->CurrentValue;
            $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
            $this->trid->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // grncreatedby
            $this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
            $this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
            $this->grncreatedby->ViewCustomAttributes = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
            $this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
            $this->grncreatedDateTime->ViewCustomAttributes = "";

            // grnModifiedby
            $this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
            $this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
            $this->grnModifiedby->ViewCustomAttributes = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
            $this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
            $this->grnModifiedDateTime->ViewCustomAttributes = "";

            // Received
            $this->Received->ViewValue = $this->Received->CurrentValue;
            $this->Received->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
            $this->BillDate->ViewCustomAttributes = "";

            // CurStock
            $this->CurStock->ViewValue = $this->CurStock->CurrentValue;
            $this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
            $this->CurStock->ViewCustomAttributes = "";

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";
            $this->ORDNO->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // QTY
            $this->QTY->LinkCustomAttributes = "";
            $this->QTY->HrefValue = "";
            $this->QTY->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";
            $this->YM->TooltipValue = "";

            // Stock
            $this->Stock->LinkCustomAttributes = "";
            $this->Stock->HrefValue = "";
            $this->Stock->TooltipValue = "";

            // Printcheck
            $this->Printcheck->LinkCustomAttributes = "";
            $this->Printcheck->HrefValue = "";
            $this->Printcheck->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // grnid
            $this->grnid->LinkCustomAttributes = "";
            $this->grnid->HrefValue = "";
            $this->grnid->TooltipValue = "";

            // poid
            $this->poid->LinkCustomAttributes = "";
            $this->poid->HrefValue = "";
            $this->poid->TooltipValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";
            $this->LastMonthSale->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";

            // GrnQuantity
            $this->GrnQuantity->LinkCustomAttributes = "";
            $this->GrnQuantity->HrefValue = "";
            $this->GrnQuantity->TooltipValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";
            $this->FreeQty->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";
            $this->ExpDate->TooltipValue = "";

            // HSN
            $this->HSN->LinkCustomAttributes = "";
            $this->HSN->HrefValue = "";
            $this->HSN->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";
            $this->PUnit->TooltipValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";
            $this->SUnit->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // Disc
            $this->Disc->LinkCustomAttributes = "";
            $this->Disc->HrefValue = "";
            $this->Disc->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // PTax
            $this->PTax->LinkCustomAttributes = "";
            $this->PTax->HrefValue = "";
            $this->PTax->TooltipValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";
            $this->ItemValue->TooltipValue = "";

            // SalTax
            $this->SalTax->LinkCustomAttributes = "";
            $this->SalTax->HrefValue = "";
            $this->SalTax->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";

            // SalRate
            $this->SalRate->LinkCustomAttributes = "";
            $this->SalRate->HrefValue = "";
            $this->SalRate->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // Pack
            $this->Pack->LinkCustomAttributes = "";
            $this->Pack->HrefValue = "";
            $this->Pack->TooltipValue = "";

            // GrnMRP
            $this->GrnMRP->LinkCustomAttributes = "";
            $this->GrnMRP->HrefValue = "";
            $this->GrnMRP->TooltipValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";
            $this->trid->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";
            $this->grncreatedby->TooltipValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";
            $this->grncreatedDateTime->TooltipValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";
            $this->grnModifiedby->TooltipValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";
            $this->grnModifiedDateTime->TooltipValue = "";

            // Received
            $this->Received->LinkCustomAttributes = "";
            $this->Received->HrefValue = "";
            $this->Received->TooltipValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";
            $this->BillDate->TooltipValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
            $this->CurStock->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // ORDNO
            $this->ORDNO->EditAttrs["class"] = "form-control";
            $this->ORDNO->EditCustomAttributes = "";
            if (!$this->ORDNO->Raw) {
                $this->ORDNO->AdvancedSearch->SearchValue = HtmlDecode($this->ORDNO->AdvancedSearch->SearchValue);
            }
            $this->ORDNO->EditValue = HtmlEncode($this->ORDNO->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->ORDNO->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->ORDNO->EditValue = $this->ORDNO->lookupCacheOption($curVal);
                if ($this->ORDNO->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ORDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ORDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->ORDNO->EditValue = $this->ORDNO->displayValue($arwrk);
                    } else {
                        $this->ORDNO->EditValue = HtmlEncode($this->ORDNO->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->ORDNO->EditValue = null;
            }
            $this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

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

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // QTY
            $this->QTY->EditAttrs["class"] = "form-control";
            $this->QTY->EditCustomAttributes = "";
            $this->QTY->EditValue = HtmlEncode($this->QTY->AdvancedSearch->SearchValue);
            $this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DT->AdvancedSearch->SearchValue, 0), 8));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->AdvancedSearch->SearchValue = HtmlDecode($this->PC->AdvancedSearch->SearchValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->AdvancedSearch->SearchValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // YM
            $this->YM->EditAttrs["class"] = "form-control";
            $this->YM->EditCustomAttributes = "";
            if (!$this->YM->Raw) {
                $this->YM->AdvancedSearch->SearchValue = HtmlDecode($this->YM->AdvancedSearch->SearchValue);
            }
            $this->YM->EditValue = HtmlEncode($this->YM->AdvancedSearch->SearchValue);
            $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

            // Stock
            $this->Stock->EditAttrs["class"] = "form-control";
            $this->Stock->EditCustomAttributes = "";
            $this->Stock->EditValue = HtmlEncode($this->Stock->AdvancedSearch->SearchValue);
            $this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

            // Printcheck
            $this->Printcheck->EditAttrs["class"] = "form-control";
            $this->Printcheck->EditCustomAttributes = "";
            if (!$this->Printcheck->Raw) {
                $this->Printcheck->AdvancedSearch->SearchValue = HtmlDecode($this->Printcheck->AdvancedSearch->SearchValue);
            }
            $this->Printcheck->EditValue = HtmlEncode($this->Printcheck->AdvancedSearch->SearchValue);
            $this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // grnid
            $this->grnid->EditAttrs["class"] = "form-control";
            $this->grnid->EditCustomAttributes = "";
            $this->grnid->EditValue = HtmlEncode($this->grnid->AdvancedSearch->SearchValue);
            $this->grnid->PlaceHolder = RemoveHtml($this->grnid->caption());

            // poid
            $this->poid->EditAttrs["class"] = "form-control";
            $this->poid->EditCustomAttributes = "";
            $this->poid->EditValue = HtmlEncode($this->poid->AdvancedSearch->SearchValue);
            $this->poid->PlaceHolder = RemoveHtml($this->poid->caption());

            // LastMonthSale
            $this->LastMonthSale->EditAttrs["class"] = "form-control";
            $this->LastMonthSale->EditCustomAttributes = "";
            $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->LastMonthSale->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->LastMonthSale->EditValue = null;
            }
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // GrnQuantity
            $this->GrnQuantity->EditAttrs["class"] = "form-control";
            $this->GrnQuantity->EditCustomAttributes = "";
            $this->GrnQuantity->EditValue = HtmlEncode($this->GrnQuantity->AdvancedSearch->SearchValue);
            $this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->AdvancedSearch->SearchValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // FreeQty
            $this->FreeQty->EditAttrs["class"] = "form-control";
            $this->FreeQty->EditCustomAttributes = "";
            $this->FreeQty->EditValue = HtmlEncode($this->FreeQty->AdvancedSearch->SearchValue);
            $this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

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
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ExpDate->AdvancedSearch->SearchValue, 0), 8));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // HSN
            $this->HSN->EditAttrs["class"] = "form-control";
            $this->HSN->EditCustomAttributes = "";
            if (!$this->HSN->Raw) {
                $this->HSN->AdvancedSearch->SearchValue = HtmlDecode($this->HSN->AdvancedSearch->SearchValue);
            }
            $this->HSN->EditValue = HtmlEncode($this->HSN->AdvancedSearch->SearchValue);
            $this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

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

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

            // Disc
            $this->Disc->EditAttrs["class"] = "form-control";
            $this->Disc->EditCustomAttributes = "";
            if (!$this->Disc->Raw) {
                $this->Disc->AdvancedSearch->SearchValue = HtmlDecode($this->Disc->AdvancedSearch->SearchValue);
            }
            $this->Disc->EditValue = HtmlEncode($this->Disc->AdvancedSearch->SearchValue);
            $this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());

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

            // PTax
            $this->PTax->EditAttrs["class"] = "form-control";
            $this->PTax->EditCustomAttributes = "";
            $this->PTax->EditValue = HtmlEncode($this->PTax->AdvancedSearch->SearchValue);
            $this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());

            // ItemValue
            $this->ItemValue->EditAttrs["class"] = "form-control";
            $this->ItemValue->EditCustomAttributes = "";
            $this->ItemValue->EditValue = HtmlEncode($this->ItemValue->AdvancedSearch->SearchValue);
            $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());

            // SalTax
            $this->SalTax->EditAttrs["class"] = "form-control";
            $this->SalTax->EditCustomAttributes = "";
            $this->SalTax->EditValue = HtmlEncode($this->SalTax->AdvancedSearch->SearchValue);
            $this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->AdvancedSearch->SearchValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());

            // SalRate
            $this->SalRate->EditAttrs["class"] = "form-control";
            $this->SalRate->EditCustomAttributes = "";
            $this->SalRate->EditValue = HtmlEncode($this->SalRate->AdvancedSearch->SearchValue);
            $this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->AdvancedSearch->SearchValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());

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

            // Pack
            $this->Pack->EditAttrs["class"] = "form-control";
            $this->Pack->EditCustomAttributes = "";
            if (!$this->Pack->Raw) {
                $this->Pack->AdvancedSearch->SearchValue = HtmlDecode($this->Pack->AdvancedSearch->SearchValue);
            }
            $this->Pack->EditValue = HtmlEncode($this->Pack->AdvancedSearch->SearchValue);
            $this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

            // GrnMRP
            $this->GrnMRP->EditAttrs["class"] = "form-control";
            $this->GrnMRP->EditCustomAttributes = "";
            $this->GrnMRP->EditValue = HtmlEncode($this->GrnMRP->AdvancedSearch->SearchValue);
            $this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());

            // trid
            $this->trid->EditAttrs["class"] = "form-control";
            $this->trid->EditCustomAttributes = "";
            $this->trid->EditValue = HtmlEncode($this->trid->AdvancedSearch->SearchValue);
            $this->trid->PlaceHolder = RemoveHtml($this->trid->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->AdvancedSearch->SearchValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreatedDateTime
            $this->CreatedDateTime->EditAttrs["class"] = "form-control";
            $this->CreatedDateTime->EditCustomAttributes = "";
            $this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->AdvancedSearch->SearchValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            $this->ModifiedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ModifiedDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // grncreatedby
            $this->grncreatedby->EditAttrs["class"] = "form-control";
            $this->grncreatedby->EditCustomAttributes = "";
            $this->grncreatedby->EditValue = HtmlEncode($this->grncreatedby->AdvancedSearch->SearchValue);
            $this->grncreatedby->PlaceHolder = RemoveHtml($this->grncreatedby->caption());

            // grncreatedDateTime
            $this->grncreatedDateTime->EditAttrs["class"] = "form-control";
            $this->grncreatedDateTime->EditCustomAttributes = "";
            $this->grncreatedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->grncreatedDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->grncreatedDateTime->PlaceHolder = RemoveHtml($this->grncreatedDateTime->caption());

            // grnModifiedby
            $this->grnModifiedby->EditAttrs["class"] = "form-control";
            $this->grnModifiedby->EditCustomAttributes = "";
            $this->grnModifiedby->EditValue = HtmlEncode($this->grnModifiedby->AdvancedSearch->SearchValue);
            $this->grnModifiedby->PlaceHolder = RemoveHtml($this->grnModifiedby->caption());

            // grnModifiedDateTime
            $this->grnModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->grnModifiedDateTime->EditCustomAttributes = "";
            $this->grnModifiedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->grnModifiedDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->grnModifiedDateTime->PlaceHolder = RemoveHtml($this->grnModifiedDateTime->caption());

            // Received
            $this->Received->EditAttrs["class"] = "form-control";
            $this->Received->EditCustomAttributes = "";
            if (!$this->Received->Raw) {
                $this->Received->AdvancedSearch->SearchValue = HtmlDecode($this->Received->AdvancedSearch->SearchValue);
            }
            $this->Received->EditValue = HtmlEncode($this->Received->AdvancedSearch->SearchValue);
            $this->Received->PlaceHolder = RemoveHtml($this->Received->caption());

            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue, 0), 8));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // CurStock
            $this->CurStock->EditAttrs["class"] = "form-control";
            $this->CurStock->EditCustomAttributes = "";
            $this->CurStock->EditValue = HtmlEncode($this->CurStock->AdvancedSearch->SearchValue);
            $this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());
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
        if (!CheckInteger($this->BRCODE->AdvancedSearch->SearchValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if (!CheckInteger($this->QTY->AdvancedSearch->SearchValue)) {
            $this->QTY->addErrorMessage($this->QTY->getErrorMessage(false));
        }
        if (!CheckDate($this->DT->AdvancedSearch->SearchValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if (!CheckInteger($this->Stock->AdvancedSearch->SearchValue)) {
            $this->Stock->addErrorMessage($this->Stock->getErrorMessage(false));
        }
        if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
            $this->id->addErrorMessage($this->id->getErrorMessage(false));
        }
        if (!CheckInteger($this->grnid->AdvancedSearch->SearchValue)) {
            $this->grnid->addErrorMessage($this->grnid->getErrorMessage(false));
        }
        if (!CheckInteger($this->poid->AdvancedSearch->SearchValue)) {
            $this->poid->addErrorMessage($this->poid->getErrorMessage(false));
        }
        if (!CheckInteger($this->LastMonthSale->AdvancedSearch->SearchValue)) {
            $this->LastMonthSale->addErrorMessage($this->LastMonthSale->getErrorMessage(false));
        }
        if (!CheckInteger($this->GrnQuantity->AdvancedSearch->SearchValue)) {
            $this->GrnQuantity->addErrorMessage($this->GrnQuantity->getErrorMessage(false));
        }
        if (!CheckInteger($this->Quantity->AdvancedSearch->SearchValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if (!CheckInteger($this->FreeQty->AdvancedSearch->SearchValue)) {
            $this->FreeQty->addErrorMessage($this->FreeQty->getErrorMessage(false));
        }
        if (!CheckDate($this->ExpDate->AdvancedSearch->SearchValue)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if (!CheckInteger($this->PUnit->AdvancedSearch->SearchValue)) {
            $this->PUnit->addErrorMessage($this->PUnit->getErrorMessage(false));
        }
        if (!CheckInteger($this->SUnit->AdvancedSearch->SearchValue)) {
            $this->SUnit->addErrorMessage($this->SUnit->getErrorMessage(false));
        }
        if (!CheckNumber($this->MRP->AdvancedSearch->SearchValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurValue->AdvancedSearch->SearchValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if (!CheckNumber($this->Disc->AdvancedSearch->SearchValue)) {
            $this->Disc->addErrorMessage($this->Disc->getErrorMessage(false));
        }
        if (!CheckNumber($this->PSGST->AdvancedSearch->SearchValue)) {
            $this->PSGST->addErrorMessage($this->PSGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->PCGST->AdvancedSearch->SearchValue)) {
            $this->PCGST->addErrorMessage($this->PCGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->PTax->AdvancedSearch->SearchValue)) {
            $this->PTax->addErrorMessage($this->PTax->getErrorMessage(false));
        }
        if (!CheckNumber($this->ItemValue->AdvancedSearch->SearchValue)) {
            $this->ItemValue->addErrorMessage($this->ItemValue->getErrorMessage(false));
        }
        if (!CheckNumber($this->SalTax->AdvancedSearch->SearchValue)) {
            $this->SalTax->addErrorMessage($this->SalTax->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurRate->AdvancedSearch->SearchValue)) {
            $this->PurRate->addErrorMessage($this->PurRate->getErrorMessage(false));
        }
        if (!CheckNumber($this->SalRate->AdvancedSearch->SearchValue)) {
            $this->SalRate->addErrorMessage($this->SalRate->getErrorMessage(false));
        }
        if (!CheckNumber($this->Discount->AdvancedSearch->SearchValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
        }
        if (!CheckNumber($this->SSGST->AdvancedSearch->SearchValue)) {
            $this->SSGST->addErrorMessage($this->SSGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->SCGST->AdvancedSearch->SearchValue)) {
            $this->SCGST->addErrorMessage($this->SCGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->GrnMRP->AdvancedSearch->SearchValue)) {
            $this->GrnMRP->addErrorMessage($this->GrnMRP->getErrorMessage(false));
        }
        if (!CheckInteger($this->trid->AdvancedSearch->SearchValue)) {
            $this->trid->addErrorMessage($this->trid->getErrorMessage(false));
        }
        if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if (!CheckInteger($this->CreatedBy->AdvancedSearch->SearchValue)) {
            $this->CreatedBy->addErrorMessage($this->CreatedBy->getErrorMessage(false));
        }
        if (!CheckDate($this->CreatedDateTime->AdvancedSearch->SearchValue)) {
            $this->CreatedDateTime->addErrorMessage($this->CreatedDateTime->getErrorMessage(false));
        }
        if (!CheckInteger($this->ModifiedBy->AdvancedSearch->SearchValue)) {
            $this->ModifiedBy->addErrorMessage($this->ModifiedBy->getErrorMessage(false));
        }
        if (!CheckDate($this->ModifiedDateTime->AdvancedSearch->SearchValue)) {
            $this->ModifiedDateTime->addErrorMessage($this->ModifiedDateTime->getErrorMessage(false));
        }
        if (!CheckInteger($this->grncreatedby->AdvancedSearch->SearchValue)) {
            $this->grncreatedby->addErrorMessage($this->grncreatedby->getErrorMessage(false));
        }
        if (!CheckDate($this->grncreatedDateTime->AdvancedSearch->SearchValue)) {
            $this->grncreatedDateTime->addErrorMessage($this->grncreatedDateTime->getErrorMessage(false));
        }
        if (!CheckInteger($this->grnModifiedby->AdvancedSearch->SearchValue)) {
            $this->grnModifiedby->addErrorMessage($this->grnModifiedby->getErrorMessage(false));
        }
        if (!CheckDate($this->grnModifiedDateTime->AdvancedSearch->SearchValue)) {
            $this->grnModifiedDateTime->addErrorMessage($this->grnModifiedDateTime->getErrorMessage(false));
        }
        if (!CheckDate($this->BillDate->AdvancedSearch->SearchValue)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if (!CheckInteger($this->CurStock->AdvancedSearch->SearchValue)) {
            $this->CurStock->addErrorMessage($this->CurStock->getErrorMessage(false));
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
        $this->ORDNO->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->PRC->AdvancedSearch->load();
        $this->QTY->AdvancedSearch->load();
        $this->DT->AdvancedSearch->load();
        $this->PC->AdvancedSearch->load();
        $this->YM->AdvancedSearch->load();
        $this->Stock->AdvancedSearch->load();
        $this->Printcheck->AdvancedSearch->load();
        $this->id->AdvancedSearch->load();
        $this->grnid->AdvancedSearch->load();
        $this->poid->AdvancedSearch->load();
        $this->LastMonthSale->AdvancedSearch->load();
        $this->PrName->AdvancedSearch->load();
        $this->GrnQuantity->AdvancedSearch->load();
        $this->Quantity->AdvancedSearch->load();
        $this->FreeQty->AdvancedSearch->load();
        $this->BatchNo->AdvancedSearch->load();
        $this->ExpDate->AdvancedSearch->load();
        $this->HSN->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->PUnit->AdvancedSearch->load();
        $this->SUnit->AdvancedSearch->load();
        $this->MRP->AdvancedSearch->load();
        $this->PurValue->AdvancedSearch->load();
        $this->Disc->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->PTax->AdvancedSearch->load();
        $this->ItemValue->AdvancedSearch->load();
        $this->SalTax->AdvancedSearch->load();
        $this->PurRate->AdvancedSearch->load();
        $this->SalRate->AdvancedSearch->load();
        $this->Discount->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->Pack->AdvancedSearch->load();
        $this->GrnMRP->AdvancedSearch->load();
        $this->trid->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->CreatedBy->AdvancedSearch->load();
        $this->CreatedDateTime->AdvancedSearch->load();
        $this->ModifiedBy->AdvancedSearch->load();
        $this->ModifiedDateTime->AdvancedSearch->load();
        $this->grncreatedby->AdvancedSearch->load();
        $this->grncreatedDateTime->AdvancedSearch->load();
        $this->grnModifiedby->AdvancedSearch->load();
        $this->grnModifiedDateTime->AdvancedSearch->load();
        $this->Received->AdvancedSearch->load();
        $this->BillDate->AdvancedSearch->load();
        $this->CurStock->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewPharmacytransferList"), "", $this->TableVar, true);
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
                case "x_ORDNO":
                    break;
                case "x_BRCODE":
                    break;
                case "x_LastMonthSale":
                    $lookupFilter = function () {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
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
