<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStoremastSearch extends PharmacyStoremast
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_storemast';

    // Page object name
    public $PageObjName = "PharmacyStoremastSearch";

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

        // Table object (pharmacy_storemast)
        if (!isset($GLOBALS["pharmacy_storemast"]) || get_class($GLOBALS["pharmacy_storemast"]) == PROJECT_NAMESPACE . "pharmacy_storemast") {
            $GLOBALS["pharmacy_storemast"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_storemast');
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
                $doc = new $class(Container("pharmacy_storemast"));
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
                    if ($pageName == "PharmacyStoremastView") {
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
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->TYPE->setVisibility();
        $this->DES->setVisibility();
        $this->UM->setVisibility();
        $this->RT->setVisibility();
        $this->UR->setVisibility();
        $this->TAXP->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRP->setVisibility();
        $this->EXPDT->setVisibility();
        $this->SALQTY->setVisibility();
        $this->LASTPURDT->setVisibility();
        $this->LASTSUPP->setVisibility();
        $this->GENNAME->setVisibility();
        $this->LASTISSDT->setVisibility();
        $this->CREATEDDT->setVisibility();
        $this->OPPRC->setVisibility();
        $this->RESTRICT->setVisibility();
        $this->BAWAPRC->setVisibility();
        $this->STAXPER->setVisibility();
        $this->TAXTYPE->setVisibility();
        $this->OLDTAXP->setVisibility();
        $this->TAXUPD->setVisibility();
        $this->PACKAGE->setVisibility();
        $this->NEWRT->setVisibility();
        $this->NEWMRP->setVisibility();
        $this->NEWUR->setVisibility();
        $this->STATUS->setVisibility();
        $this->RETNQTY->setVisibility();
        $this->KEMODISC->setVisibility();
        $this->PATSALE->setVisibility();
        $this->ORGAN->setVisibility();
        $this->OLDRQ->setVisibility();
        $this->DRID->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->COMBCODE->setVisibility();
        $this->GENCODE->setVisibility();
        $this->STRENGTH->setVisibility();
        $this->UNIT->setVisibility();
        $this->FORMULARY->setVisibility();
        $this->STOCK->setVisibility();
        $this->RACKNO->setVisibility();
        $this->SUPPNAME->setVisibility();
        $this->COMBNAME->setVisibility();
        $this->GENERICNAME->setVisibility();
        $this->REMARK->setVisibility();
        $this->TEMP->setVisibility();
        $this->PACKING->setVisibility();
        $this->PhysQty->setVisibility();
        $this->LedQty->setVisibility();
        $this->id->setVisibility();
        $this->PurValue->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SaleValue->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->SaleRate->setVisibility();
        $this->HospID->setVisibility();
        $this->BRNAME->setVisibility();
        $this->OV->Visible = false;
        $this->LATESTOV->Visible = false;
        $this->ITEMTYPE->Visible = false;
        $this->ROWID->Visible = false;
        $this->MOVED->Visible = false;
        $this->NEWTAX->Visible = false;
        $this->HSNCODE->Visible = false;
        $this->OLDTAX->Visible = false;
        $this->Scheduling->setVisibility();
        $this->Schedulingh1->setVisibility();
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
        $this->setupLookupOptions($this->LASTSUPP);
        $this->setupLookupOptions($this->GENNAME);
        $this->setupLookupOptions($this->DRID);
        $this->setupLookupOptions($this->MFRCODE);
        $this->setupLookupOptions($this->COMBCODE);
        $this->setupLookupOptions($this->GENCODE);
        $this->setupLookupOptions($this->SUPPNAME);
        $this->setupLookupOptions($this->COMBNAME);
        $this->setupLookupOptions($this->GENERICNAME);

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
                    $srchStr = "PharmacyStoremastList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->BRCODE); // BRCODE
        $this->buildSearchUrl($srchUrl, $this->PRC); // PRC
        $this->buildSearchUrl($srchUrl, $this->TYPE); // TYPE
        $this->buildSearchUrl($srchUrl, $this->DES); // DES
        $this->buildSearchUrl($srchUrl, $this->UM); // UM
        $this->buildSearchUrl($srchUrl, $this->RT); // RT
        $this->buildSearchUrl($srchUrl, $this->UR); // UR
        $this->buildSearchUrl($srchUrl, $this->TAXP); // TAXP
        $this->buildSearchUrl($srchUrl, $this->BATCHNO); // BATCHNO
        $this->buildSearchUrl($srchUrl, $this->OQ); // OQ
        $this->buildSearchUrl($srchUrl, $this->RQ); // RQ
        $this->buildSearchUrl($srchUrl, $this->MRQ); // MRQ
        $this->buildSearchUrl($srchUrl, $this->IQ); // IQ
        $this->buildSearchUrl($srchUrl, $this->MRP); // MRP
        $this->buildSearchUrl($srchUrl, $this->EXPDT); // EXPDT
        $this->buildSearchUrl($srchUrl, $this->SALQTY); // SALQTY
        $this->buildSearchUrl($srchUrl, $this->LASTPURDT); // LASTPURDT
        $this->buildSearchUrl($srchUrl, $this->LASTSUPP); // LASTSUPP
        $this->buildSearchUrl($srchUrl, $this->GENNAME); // GENNAME
        $this->buildSearchUrl($srchUrl, $this->LASTISSDT); // LASTISSDT
        $this->buildSearchUrl($srchUrl, $this->CREATEDDT); // CREATEDDT
        $this->buildSearchUrl($srchUrl, $this->OPPRC); // OPPRC
        $this->buildSearchUrl($srchUrl, $this->RESTRICT); // RESTRICT
        $this->buildSearchUrl($srchUrl, $this->BAWAPRC); // BAWAPRC
        $this->buildSearchUrl($srchUrl, $this->STAXPER); // STAXPER
        $this->buildSearchUrl($srchUrl, $this->TAXTYPE); // TAXTYPE
        $this->buildSearchUrl($srchUrl, $this->OLDTAXP); // OLDTAXP
        $this->buildSearchUrl($srchUrl, $this->TAXUPD); // TAXUPD
        $this->buildSearchUrl($srchUrl, $this->PACKAGE); // PACKAGE
        $this->buildSearchUrl($srchUrl, $this->NEWRT); // NEWRT
        $this->buildSearchUrl($srchUrl, $this->NEWMRP); // NEWMRP
        $this->buildSearchUrl($srchUrl, $this->NEWUR); // NEWUR
        $this->buildSearchUrl($srchUrl, $this->STATUS); // STATUS
        $this->buildSearchUrl($srchUrl, $this->RETNQTY); // RETNQTY
        $this->buildSearchUrl($srchUrl, $this->KEMODISC); // KEMODISC
        $this->buildSearchUrl($srchUrl, $this->PATSALE); // PATSALE
        $this->buildSearchUrl($srchUrl, $this->ORGAN); // ORGAN
        $this->buildSearchUrl($srchUrl, $this->OLDRQ); // OLDRQ
        $this->buildSearchUrl($srchUrl, $this->DRID); // DRID
        $this->buildSearchUrl($srchUrl, $this->MFRCODE); // MFRCODE
        $this->buildSearchUrl($srchUrl, $this->COMBCODE); // COMBCODE
        $this->buildSearchUrl($srchUrl, $this->GENCODE); // GENCODE
        $this->buildSearchUrl($srchUrl, $this->STRENGTH); // STRENGTH
        $this->buildSearchUrl($srchUrl, $this->UNIT); // UNIT
        $this->buildSearchUrl($srchUrl, $this->FORMULARY); // FORMULARY
        $this->buildSearchUrl($srchUrl, $this->STOCK); // STOCK
        $this->buildSearchUrl($srchUrl, $this->RACKNO); // RACKNO
        $this->buildSearchUrl($srchUrl, $this->SUPPNAME); // SUPPNAME
        $this->buildSearchUrl($srchUrl, $this->COMBNAME); // COMBNAME
        $this->buildSearchUrl($srchUrl, $this->GENERICNAME); // GENERICNAME
        $this->buildSearchUrl($srchUrl, $this->REMARK); // REMARK
        $this->buildSearchUrl($srchUrl, $this->TEMP); // TEMP
        $this->buildSearchUrl($srchUrl, $this->PACKING); // PACKING
        $this->buildSearchUrl($srchUrl, $this->PhysQty); // PhysQty
        $this->buildSearchUrl($srchUrl, $this->LedQty); // LedQty
        $this->buildSearchUrl($srchUrl, $this->id); // id
        $this->buildSearchUrl($srchUrl, $this->PurValue); // PurValue
        $this->buildSearchUrl($srchUrl, $this->PSGST); // PSGST
        $this->buildSearchUrl($srchUrl, $this->PCGST); // PCGST
        $this->buildSearchUrl($srchUrl, $this->SaleValue); // SaleValue
        $this->buildSearchUrl($srchUrl, $this->SSGST); // SSGST
        $this->buildSearchUrl($srchUrl, $this->SCGST); // SCGST
        $this->buildSearchUrl($srchUrl, $this->SaleRate); // SaleRate
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->BRNAME); // BRNAME
        $this->buildSearchUrl($srchUrl, $this->Scheduling); // Scheduling
        $this->buildSearchUrl($srchUrl, $this->Schedulingh1); // Schedulingh1
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
        if ($this->BRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TYPE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DES->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UM->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UR->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TAXP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BATCHNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MRQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MRP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EXPDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SALQTY->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LASTPURDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LASTSUPP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GENNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LASTISSDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CREATEDDT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OPPRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RESTRICT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BAWAPRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->STAXPER->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TAXTYPE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OLDTAXP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TAXUPD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PACKAGE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NEWRT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NEWMRP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NEWUR->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->STATUS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RETNQTY->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->KEMODISC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PATSALE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ORGAN->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OLDRQ->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DRID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MFRCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->COMBCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GENCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->STRENGTH->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UNIT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FORMULARY->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->STOCK->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RACKNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SUPPNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->COMBNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GENERICNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->REMARK->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TEMP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PACKING->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PhysQty->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LedQty->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PurValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PSGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PCGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SaleValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SSGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SCGST->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SaleRate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BRNAME->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Scheduling->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Schedulingh1->AdvancedSearch->post()) {
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
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue))) {
            $this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue))) {
            $this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SALQTY->FormValue == $this->SALQTY->CurrentValue && is_numeric(ConvertToFloatString($this->SALQTY->CurrentValue))) {
            $this->SALQTY->CurrentValue = ConvertToFloatString($this->SALQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STAXPER->FormValue == $this->STAXPER->CurrentValue && is_numeric(ConvertToFloatString($this->STAXPER->CurrentValue))) {
            $this->STAXPER->CurrentValue = ConvertToFloatString($this->STAXPER->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDTAXP->FormValue == $this->OLDTAXP->CurrentValue && is_numeric(ConvertToFloatString($this->OLDTAXP->CurrentValue))) {
            $this->OLDTAXP->CurrentValue = ConvertToFloatString($this->OLDTAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWRT->FormValue == $this->NEWRT->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRT->CurrentValue))) {
            $this->NEWRT->CurrentValue = ConvertToFloatString($this->NEWRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWMRP->FormValue == $this->NEWMRP->CurrentValue && is_numeric(ConvertToFloatString($this->NEWMRP->CurrentValue))) {
            $this->NEWMRP->CurrentValue = ConvertToFloatString($this->NEWMRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWUR->FormValue == $this->NEWUR->CurrentValue && is_numeric(ConvertToFloatString($this->NEWUR->CurrentValue))) {
            $this->NEWUR->CurrentValue = ConvertToFloatString($this->NEWUR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RETNQTY->FormValue == $this->RETNQTY->CurrentValue && is_numeric(ConvertToFloatString($this->RETNQTY->CurrentValue))) {
            $this->RETNQTY->CurrentValue = ConvertToFloatString($this->RETNQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PATSALE->FormValue == $this->PATSALE->CurrentValue && is_numeric(ConvertToFloatString($this->PATSALE->CurrentValue))) {
            $this->PATSALE->CurrentValue = ConvertToFloatString($this->PATSALE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRQ->FormValue == $this->OLDRQ->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRQ->CurrentValue))) {
            $this->OLDRQ->CurrentValue = ConvertToFloatString($this->OLDRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue))) {
            $this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STOCK->FormValue == $this->STOCK->CurrentValue && is_numeric(ConvertToFloatString($this->STOCK->CurrentValue))) {
            $this->STOCK->CurrentValue = ConvertToFloatString($this->STOCK->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PACKING->FormValue == $this->PACKING->CurrentValue && is_numeric(ConvertToFloatString($this->PACKING->CurrentValue))) {
            $this->PACKING->CurrentValue = ConvertToFloatString($this->PACKING->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PhysQty->FormValue == $this->PhysQty->CurrentValue && is_numeric(ConvertToFloatString($this->PhysQty->CurrentValue))) {
            $this->PhysQty->CurrentValue = ConvertToFloatString($this->PhysQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LedQty->FormValue == $this->LedQty->CurrentValue && is_numeric(ConvertToFloatString($this->LedQty->CurrentValue))) {
            $this->LedQty->CurrentValue = ConvertToFloatString($this->LedQty->CurrentValue);
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
        if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue))) {
            $this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);
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
        if ($this->SaleRate->FormValue == $this->SaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->SaleRate->CurrentValue))) {
            $this->SaleRate->CurrentValue = ConvertToFloatString($this->SaleRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BRCODE

        // PRC

        // TYPE

        // DES

        // UM

        // RT

        // UR

        // TAXP

        // BATCHNO

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // SALQTY

        // LASTPURDT

        // LASTSUPP

        // GENNAME

        // LASTISSDT

        // CREATEDDT

        // OPPRC

        // RESTRICT

        // BAWAPRC

        // STAXPER

        // TAXTYPE

        // OLDTAXP

        // TAXUPD

        // PACKAGE

        // NEWRT

        // NEWMRP

        // NEWUR

        // STATUS

        // RETNQTY

        // KEMODISC

        // PATSALE

        // ORGAN

        // OLDRQ

        // DRID

        // MFRCODE

        // COMBCODE

        // GENCODE

        // STRENGTH

        // UNIT

        // FORMULARY

        // STOCK

        // RACKNO

        // SUPPNAME

        // COMBNAME

        // GENERICNAME

        // REMARK

        // TEMP

        // PACKING

        // PhysQty

        // LedQty

        // id

        // PurValue

        // PSGST

        // PCGST

        // SaleValue

        // SSGST

        // SCGST

        // SaleRate

        // HospID

        // BRNAME

        // OV

        // LATESTOV

        // ITEMTYPE

        // ROWID

        // MOVED

        // NEWTAX

        // HSNCODE

        // OLDTAX

        // Scheduling

        // Schedulingh1
        if ($this->RowType == ROWTYPE_VIEW) {
            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // TYPE
            if (strval($this->TYPE->CurrentValue) != "") {
                $this->TYPE->ViewValue = $this->TYPE->optionCaption($this->TYPE->CurrentValue);
            } else {
                $this->TYPE->ViewValue = null;
            }
            $this->TYPE->ViewCustomAttributes = "";

            // DES
            $this->DES->ViewValue = $this->DES->CurrentValue;
            $this->DES->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // SALQTY
            $this->SALQTY->ViewValue = $this->SALQTY->CurrentValue;
            $this->SALQTY->ViewValue = FormatNumber($this->SALQTY->ViewValue, 2, -2, -2, -2);
            $this->SALQTY->ViewCustomAttributes = "";

            // LASTPURDT
            $this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
            $this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
            $this->LASTPURDT->ViewCustomAttributes = "";

            // LASTSUPP
            $curVal = trim(strval($this->LASTSUPP->CurrentValue));
            if ($curVal != "") {
                $this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
                if ($this->LASTSUPP->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->LASTSUPP->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LASTSUPP->Lookup->renderViewRow($rswrk[0]);
                        $this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
                    } else {
                        $this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
                    }
                }
            } else {
                $this->LASTSUPP->ViewValue = null;
            }
            $this->LASTSUPP->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $curVal = trim(strval($this->GENNAME->CurrentValue));
            if ($curVal != "") {
                $this->GENNAME->ViewValue = $this->GENNAME->lookupCacheOption($curVal);
                if ($this->GENNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->GENNAME->ViewValue = $this->GENNAME->displayValue($arwrk);
                    } else {
                        $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
                    }
                }
            } else {
                $this->GENNAME->ViewValue = null;
            }
            $this->GENNAME->ViewCustomAttributes = "";

            // LASTISSDT
            $this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
            $this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
            $this->LASTISSDT->ViewCustomAttributes = "";

            // CREATEDDT
            $this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
            $this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
            $this->CREATEDDT->ViewCustomAttributes = "";

            // OPPRC
            $this->OPPRC->ViewValue = $this->OPPRC->CurrentValue;
            $this->OPPRC->ViewCustomAttributes = "";

            // RESTRICT
            $this->RESTRICT->ViewValue = $this->RESTRICT->CurrentValue;
            $this->RESTRICT->ViewCustomAttributes = "";

            // BAWAPRC
            $this->BAWAPRC->ViewValue = $this->BAWAPRC->CurrentValue;
            $this->BAWAPRC->ViewCustomAttributes = "";

            // STAXPER
            $this->STAXPER->ViewValue = $this->STAXPER->CurrentValue;
            $this->STAXPER->ViewValue = FormatNumber($this->STAXPER->ViewValue, 2, -2, -2, -2);
            $this->STAXPER->ViewCustomAttributes = "";

            // TAXTYPE
            $this->TAXTYPE->ViewValue = $this->TAXTYPE->CurrentValue;
            $this->TAXTYPE->ViewCustomAttributes = "";

            // OLDTAXP
            $this->OLDTAXP->ViewValue = $this->OLDTAXP->CurrentValue;
            $this->OLDTAXP->ViewValue = FormatNumber($this->OLDTAXP->ViewValue, 2, -2, -2, -2);
            $this->OLDTAXP->ViewCustomAttributes = "";

            // TAXUPD
            $this->TAXUPD->ViewValue = $this->TAXUPD->CurrentValue;
            $this->TAXUPD->ViewCustomAttributes = "";

            // PACKAGE
            $this->PACKAGE->ViewValue = $this->PACKAGE->CurrentValue;
            $this->PACKAGE->ViewCustomAttributes = "";

            // NEWRT
            $this->NEWRT->ViewValue = $this->NEWRT->CurrentValue;
            $this->NEWRT->ViewValue = FormatNumber($this->NEWRT->ViewValue, 2, -2, -2, -2);
            $this->NEWRT->ViewCustomAttributes = "";

            // NEWMRP
            $this->NEWMRP->ViewValue = $this->NEWMRP->CurrentValue;
            $this->NEWMRP->ViewValue = FormatNumber($this->NEWMRP->ViewValue, 2, -2, -2, -2);
            $this->NEWMRP->ViewCustomAttributes = "";

            // NEWUR
            $this->NEWUR->ViewValue = $this->NEWUR->CurrentValue;
            $this->NEWUR->ViewValue = FormatNumber($this->NEWUR->ViewValue, 2, -2, -2, -2);
            $this->NEWUR->ViewCustomAttributes = "";

            // STATUS
            $this->STATUS->ViewValue = $this->STATUS->CurrentValue;
            $this->STATUS->ViewCustomAttributes = "";

            // RETNQTY
            $this->RETNQTY->ViewValue = $this->RETNQTY->CurrentValue;
            $this->RETNQTY->ViewValue = FormatNumber($this->RETNQTY->ViewValue, 2, -2, -2, -2);
            $this->RETNQTY->ViewCustomAttributes = "";

            // KEMODISC
            $this->KEMODISC->ViewValue = $this->KEMODISC->CurrentValue;
            $this->KEMODISC->ViewCustomAttributes = "";

            // PATSALE
            $this->PATSALE->ViewValue = $this->PATSALE->CurrentValue;
            $this->PATSALE->ViewValue = FormatNumber($this->PATSALE->ViewValue, 2, -2, -2, -2);
            $this->PATSALE->ViewCustomAttributes = "";

            // ORGAN
            $this->ORGAN->ViewValue = $this->ORGAN->CurrentValue;
            $this->ORGAN->ViewCustomAttributes = "";

            // OLDRQ
            $this->OLDRQ->ViewValue = $this->OLDRQ->CurrentValue;
            $this->OLDRQ->ViewValue = FormatNumber($this->OLDRQ->ViewValue, 2, -2, -2, -2);
            $this->OLDRQ->ViewCustomAttributes = "";

            // DRID
            $curVal = trim(strval($this->DRID->CurrentValue));
            if ($curVal != "") {
                $this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
                if ($this->DRID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DRID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DRID->Lookup->renderViewRow($rswrk[0]);
                        $this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
                    } else {
                        $this->DRID->ViewValue = $this->DRID->CurrentValue;
                    }
                }
            } else {
                $this->DRID->ViewValue = null;
            }
            $this->DRID->ViewCustomAttributes = "";

            // MFRCODE
            $curVal = trim(strval($this->MFRCODE->CurrentValue));
            if ($curVal != "") {
                $this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
                if ($this->MFRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->MFRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->MFRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
                    } else {
                        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
                    }
                }
            } else {
                $this->MFRCODE->ViewValue = null;
            }
            $this->MFRCODE->ViewCustomAttributes = "";

            // COMBCODE
            $curVal = trim(strval($this->COMBCODE->CurrentValue));
            if ($curVal != "") {
                $this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
                if ($this->COMBCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->COMBCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->COMBCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
                    } else {
                        $this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
                    }
                }
            } else {
                $this->COMBCODE->ViewValue = null;
            }
            $this->COMBCODE->ViewCustomAttributes = "";

            // GENCODE
            $curVal = trim(strval($this->GENCODE->CurrentValue));
            if ($curVal != "") {
                $this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
                if ($this->GENCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
                    } else {
                        $this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
                    }
                }
            } else {
                $this->GENCODE->ViewValue = null;
            }
            $this->GENCODE->ViewCustomAttributes = "";

            // STRENGTH
            $this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
            $this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
            $this->STRENGTH->ViewCustomAttributes = "";

            // UNIT
            if (strval($this->UNIT->CurrentValue) != "") {
                $this->UNIT->ViewValue = $this->UNIT->optionCaption($this->UNIT->CurrentValue);
            } else {
                $this->UNIT->ViewValue = null;
            }
            $this->UNIT->ViewCustomAttributes = "";

            // FORMULARY
            if (strval($this->FORMULARY->CurrentValue) != "") {
                $this->FORMULARY->ViewValue = $this->FORMULARY->optionCaption($this->FORMULARY->CurrentValue);
            } else {
                $this->FORMULARY->ViewValue = null;
            }
            $this->FORMULARY->ViewCustomAttributes = "";

            // STOCK
            $this->STOCK->ViewValue = $this->STOCK->CurrentValue;
            $this->STOCK->ViewValue = FormatNumber($this->STOCK->ViewValue, 2, -2, -2, -2);
            $this->STOCK->ViewCustomAttributes = "";

            // RACKNO
            $this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
            $this->RACKNO->ViewCustomAttributes = "";

            // SUPPNAME
            $curVal = trim(strval($this->SUPPNAME->CurrentValue));
            if ($curVal != "") {
                $this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
                if ($this->SUPPNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->SUPPNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SUPPNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
                    } else {
                        $this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
                    }
                }
            } else {
                $this->SUPPNAME->ViewValue = null;
            }
            $this->SUPPNAME->ViewCustomAttributes = "";

            // COMBNAME
            $curVal = trim(strval($this->COMBNAME->CurrentValue));
            if ($curVal != "") {
                $this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
                if ($this->COMBNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->COMBNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->COMBNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
                    } else {
                        $this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
                    }
                }
            } else {
                $this->COMBNAME->ViewValue = null;
            }
            $this->COMBNAME->ViewCustomAttributes = "";

            // GENERICNAME
            $curVal = trim(strval($this->GENERICNAME->CurrentValue));
            if ($curVal != "") {
                $this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
                if ($this->GENERICNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENERICNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENERICNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
                    } else {
                        $this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
                    }
                }
            } else {
                $this->GENERICNAME->ViewValue = null;
            }
            $this->GENERICNAME->ViewCustomAttributes = "";

            // REMARK
            $this->REMARK->ViewValue = $this->REMARK->CurrentValue;
            $this->REMARK->ViewCustomAttributes = "";

            // TEMP
            $this->TEMP->ViewValue = $this->TEMP->CurrentValue;
            $this->TEMP->ViewCustomAttributes = "";

            // PACKING
            $this->PACKING->ViewValue = $this->PACKING->CurrentValue;
            $this->PACKING->ViewValue = FormatNumber($this->PACKING->ViewValue, 2, -2, -2, -2);
            $this->PACKING->ViewCustomAttributes = "";

            // PhysQty
            $this->PhysQty->ViewValue = $this->PhysQty->CurrentValue;
            $this->PhysQty->ViewValue = FormatNumber($this->PhysQty->ViewValue, 2, -2, -2, -2);
            $this->PhysQty->ViewCustomAttributes = "";

            // LedQty
            $this->LedQty->ViewValue = $this->LedQty->CurrentValue;
            $this->LedQty->ViewValue = FormatNumber($this->LedQty->ViewValue, 2, -2, -2, -2);
            $this->LedQty->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SaleValue
            $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
            $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
            $this->SaleValue->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // SaleRate
            $this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
            $this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
            $this->SaleRate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // BRNAME
            $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
            $this->BRNAME->ViewCustomAttributes = "";

            // Scheduling
            if (strval($this->Scheduling->CurrentValue) != "") {
                $this->Scheduling->ViewValue = $this->Scheduling->optionCaption($this->Scheduling->CurrentValue);
            } else {
                $this->Scheduling->ViewValue = null;
            }
            $this->Scheduling->ViewCustomAttributes = "";

            // Schedulingh1
            if (strval($this->Schedulingh1->CurrentValue) != "") {
                $this->Schedulingh1->ViewValue = $this->Schedulingh1->optionCaption($this->Schedulingh1->CurrentValue);
            } else {
                $this->Schedulingh1->ViewValue = null;
            }
            $this->Schedulingh1->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // TYPE
            $this->TYPE->LinkCustomAttributes = "";
            $this->TYPE->HrefValue = "";
            $this->TYPE->TooltipValue = "";

            // DES
            $this->DES->LinkCustomAttributes = "";
            $this->DES->HrefValue = "";
            $this->DES->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";
            $this->OQ->TooltipValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";
            $this->RQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // SALQTY
            $this->SALQTY->LinkCustomAttributes = "";
            $this->SALQTY->HrefValue = "";
            $this->SALQTY->TooltipValue = "";

            // LASTPURDT
            $this->LASTPURDT->LinkCustomAttributes = "";
            $this->LASTPURDT->HrefValue = "";
            $this->LASTPURDT->TooltipValue = "";

            // LASTSUPP
            $this->LASTSUPP->LinkCustomAttributes = "";
            $this->LASTSUPP->HrefValue = "";
            $this->LASTSUPP->TooltipValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

            // LASTISSDT
            $this->LASTISSDT->LinkCustomAttributes = "";
            $this->LASTISSDT->HrefValue = "";
            $this->LASTISSDT->TooltipValue = "";

            // CREATEDDT
            $this->CREATEDDT->LinkCustomAttributes = "";
            $this->CREATEDDT->HrefValue = "";
            $this->CREATEDDT->TooltipValue = "";

            // OPPRC
            $this->OPPRC->LinkCustomAttributes = "";
            $this->OPPRC->HrefValue = "";
            $this->OPPRC->TooltipValue = "";

            // RESTRICT
            $this->RESTRICT->LinkCustomAttributes = "";
            $this->RESTRICT->HrefValue = "";
            $this->RESTRICT->TooltipValue = "";

            // BAWAPRC
            $this->BAWAPRC->LinkCustomAttributes = "";
            $this->BAWAPRC->HrefValue = "";
            $this->BAWAPRC->TooltipValue = "";

            // STAXPER
            $this->STAXPER->LinkCustomAttributes = "";
            $this->STAXPER->HrefValue = "";
            $this->STAXPER->TooltipValue = "";

            // TAXTYPE
            $this->TAXTYPE->LinkCustomAttributes = "";
            $this->TAXTYPE->HrefValue = "";
            $this->TAXTYPE->TooltipValue = "";

            // OLDTAXP
            $this->OLDTAXP->LinkCustomAttributes = "";
            $this->OLDTAXP->HrefValue = "";
            $this->OLDTAXP->TooltipValue = "";

            // TAXUPD
            $this->TAXUPD->LinkCustomAttributes = "";
            $this->TAXUPD->HrefValue = "";
            $this->TAXUPD->TooltipValue = "";

            // PACKAGE
            $this->PACKAGE->LinkCustomAttributes = "";
            $this->PACKAGE->HrefValue = "";
            $this->PACKAGE->TooltipValue = "";

            // NEWRT
            $this->NEWRT->LinkCustomAttributes = "";
            $this->NEWRT->HrefValue = "";
            $this->NEWRT->TooltipValue = "";

            // NEWMRP
            $this->NEWMRP->LinkCustomAttributes = "";
            $this->NEWMRP->HrefValue = "";
            $this->NEWMRP->TooltipValue = "";

            // NEWUR
            $this->NEWUR->LinkCustomAttributes = "";
            $this->NEWUR->HrefValue = "";
            $this->NEWUR->TooltipValue = "";

            // STATUS
            $this->STATUS->LinkCustomAttributes = "";
            $this->STATUS->HrefValue = "";
            $this->STATUS->TooltipValue = "";

            // RETNQTY
            $this->RETNQTY->LinkCustomAttributes = "";
            $this->RETNQTY->HrefValue = "";
            $this->RETNQTY->TooltipValue = "";

            // KEMODISC
            $this->KEMODISC->LinkCustomAttributes = "";
            $this->KEMODISC->HrefValue = "";
            $this->KEMODISC->TooltipValue = "";

            // PATSALE
            $this->PATSALE->LinkCustomAttributes = "";
            $this->PATSALE->HrefValue = "";
            $this->PATSALE->TooltipValue = "";

            // ORGAN
            $this->ORGAN->LinkCustomAttributes = "";
            $this->ORGAN->HrefValue = "";
            $this->ORGAN->TooltipValue = "";

            // OLDRQ
            $this->OLDRQ->LinkCustomAttributes = "";
            $this->OLDRQ->HrefValue = "";
            $this->OLDRQ->TooltipValue = "";

            // DRID
            $this->DRID->LinkCustomAttributes = "";
            $this->DRID->HrefValue = "";
            $this->DRID->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // COMBCODE
            $this->COMBCODE->LinkCustomAttributes = "";
            $this->COMBCODE->HrefValue = "";
            $this->COMBCODE->TooltipValue = "";

            // GENCODE
            $this->GENCODE->LinkCustomAttributes = "";
            $this->GENCODE->HrefValue = "";
            $this->GENCODE->TooltipValue = "";

            // STRENGTH
            $this->STRENGTH->LinkCustomAttributes = "";
            $this->STRENGTH->HrefValue = "";
            $this->STRENGTH->TooltipValue = "";

            // UNIT
            $this->UNIT->LinkCustomAttributes = "";
            $this->UNIT->HrefValue = "";
            $this->UNIT->TooltipValue = "";

            // FORMULARY
            $this->FORMULARY->LinkCustomAttributes = "";
            $this->FORMULARY->HrefValue = "";
            $this->FORMULARY->TooltipValue = "";

            // STOCK
            $this->STOCK->LinkCustomAttributes = "";
            $this->STOCK->HrefValue = "";
            $this->STOCK->TooltipValue = "";

            // RACKNO
            $this->RACKNO->LinkCustomAttributes = "";
            $this->RACKNO->HrefValue = "";
            $this->RACKNO->TooltipValue = "";

            // SUPPNAME
            $this->SUPPNAME->LinkCustomAttributes = "";
            $this->SUPPNAME->HrefValue = "";
            $this->SUPPNAME->TooltipValue = "";

            // COMBNAME
            $this->COMBNAME->LinkCustomAttributes = "";
            $this->COMBNAME->HrefValue = "";
            $this->COMBNAME->TooltipValue = "";

            // GENERICNAME
            $this->GENERICNAME->LinkCustomAttributes = "";
            $this->GENERICNAME->HrefValue = "";
            $this->GENERICNAME->TooltipValue = "";

            // REMARK
            $this->REMARK->LinkCustomAttributes = "";
            $this->REMARK->HrefValue = "";
            $this->REMARK->TooltipValue = "";

            // TEMP
            $this->TEMP->LinkCustomAttributes = "";
            $this->TEMP->HrefValue = "";
            $this->TEMP->TooltipValue = "";

            // PACKING
            $this->PACKING->LinkCustomAttributes = "";
            $this->PACKING->HrefValue = "";
            $this->PACKING->TooltipValue = "";

            // PhysQty
            $this->PhysQty->LinkCustomAttributes = "";
            $this->PhysQty->HrefValue = "";
            $this->PhysQty->TooltipValue = "";

            // LedQty
            $this->LedQty->LinkCustomAttributes = "";
            $this->LedQty->HrefValue = "";
            $this->LedQty->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SaleValue
            $this->SaleValue->LinkCustomAttributes = "";
            $this->SaleValue->HrefValue = "";
            $this->SaleValue->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // SaleRate
            $this->SaleRate->LinkCustomAttributes = "";
            $this->SaleRate->HrefValue = "";
            $this->SaleRate->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
            $this->BRNAME->TooltipValue = "";

            // Scheduling
            $this->Scheduling->LinkCustomAttributes = "";
            $this->Scheduling->HrefValue = "";
            $this->Scheduling->TooltipValue = "";

            // Schedulingh1
            $this->Schedulingh1->LinkCustomAttributes = "";
            $this->Schedulingh1->HrefValue = "";
            $this->Schedulingh1->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // TYPE
            $this->TYPE->EditAttrs["class"] = "form-control";
            $this->TYPE->EditCustomAttributes = "";
            $this->TYPE->EditValue = $this->TYPE->options(true);
            $this->TYPE->PlaceHolder = RemoveHtml($this->TYPE->caption());

            // DES
            $this->DES->EditAttrs["class"] = "form-control";
            $this->DES->EditCustomAttributes = "";
            if (!$this->DES->Raw) {
                $this->DES->AdvancedSearch->SearchValue = HtmlDecode($this->DES->AdvancedSearch->SearchValue);
            }
            $this->DES->EditValue = HtmlEncode($this->DES->AdvancedSearch->SearchValue);
            $this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->AdvancedSearch->SearchValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());

            // TAXP
            $this->TAXP->EditAttrs["class"] = "form-control";
            $this->TAXP->EditCustomAttributes = "";
            $this->TAXP->EditValue = HtmlEncode($this->TAXP->AdvancedSearch->SearchValue);
            $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // SALQTY
            $this->SALQTY->EditAttrs["class"] = "form-control";
            $this->SALQTY->EditCustomAttributes = "";
            $this->SALQTY->EditValue = HtmlEncode($this->SALQTY->AdvancedSearch->SearchValue);
            $this->SALQTY->PlaceHolder = RemoveHtml($this->SALQTY->caption());

            // LASTPURDT
            $this->LASTPURDT->EditAttrs["class"] = "form-control";
            $this->LASTPURDT->EditCustomAttributes = "";
            $this->LASTPURDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LASTPURDT->AdvancedSearch->SearchValue, 0), 8));
            $this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

            // LASTSUPP
            $this->LASTSUPP->EditCustomAttributes = "";
            $curVal = trim(strval($this->LASTSUPP->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->LASTSUPP->AdvancedSearch->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
            } else {
                $this->LASTSUPP->AdvancedSearch->ViewValue = $this->LASTSUPP->Lookup !== null && is_array($this->LASTSUPP->Lookup->Options) ? $curVal : null;
            }
            if ($this->LASTSUPP->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->LASTSUPP->EditValue = array_values($this->LASTSUPP->Lookup->Options);
                if ($this->LASTSUPP->AdvancedSearch->ViewValue == "") {
                    $this->LASTSUPP->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Suppliername`" . SearchString("=", $this->LASTSUPP->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->LASTSUPP->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->LASTSUPP->Lookup->renderViewRow($rswrk[0]);
                    $this->LASTSUPP->AdvancedSearch->ViewValue = $this->LASTSUPP->displayValue($arwrk);
                } else {
                    $this->LASTSUPP->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->LASTSUPP->EditValue = $arwrk;
            }
            $this->LASTSUPP->PlaceHolder = RemoveHtml($this->LASTSUPP->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->GENNAME->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
                if ($this->GENNAME->EditValue === null) { // Lookup from database
                    $filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
                    } else {
                        $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->GENNAME->EditValue = null;
            }
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // LASTISSDT
            $this->LASTISSDT->EditAttrs["class"] = "form-control";
            $this->LASTISSDT->EditCustomAttributes = "";
            $this->LASTISSDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LASTISSDT->AdvancedSearch->SearchValue, 0), 8));
            $this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

            // CREATEDDT
            $this->CREATEDDT->EditAttrs["class"] = "form-control";
            $this->CREATEDDT->EditCustomAttributes = "";
            $this->CREATEDDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CREATEDDT->AdvancedSearch->SearchValue, 0), 8));
            $this->CREATEDDT->PlaceHolder = RemoveHtml($this->CREATEDDT->caption());

            // OPPRC
            $this->OPPRC->EditAttrs["class"] = "form-control";
            $this->OPPRC->EditCustomAttributes = "";
            if (!$this->OPPRC->Raw) {
                $this->OPPRC->AdvancedSearch->SearchValue = HtmlDecode($this->OPPRC->AdvancedSearch->SearchValue);
            }
            $this->OPPRC->EditValue = HtmlEncode($this->OPPRC->AdvancedSearch->SearchValue);
            $this->OPPRC->PlaceHolder = RemoveHtml($this->OPPRC->caption());

            // RESTRICT
            $this->RESTRICT->EditAttrs["class"] = "form-control";
            $this->RESTRICT->EditCustomAttributes = "";
            if (!$this->RESTRICT->Raw) {
                $this->RESTRICT->AdvancedSearch->SearchValue = HtmlDecode($this->RESTRICT->AdvancedSearch->SearchValue);
            }
            $this->RESTRICT->EditValue = HtmlEncode($this->RESTRICT->AdvancedSearch->SearchValue);
            $this->RESTRICT->PlaceHolder = RemoveHtml($this->RESTRICT->caption());

            // BAWAPRC
            $this->BAWAPRC->EditAttrs["class"] = "form-control";
            $this->BAWAPRC->EditCustomAttributes = "";
            if (!$this->BAWAPRC->Raw) {
                $this->BAWAPRC->AdvancedSearch->SearchValue = HtmlDecode($this->BAWAPRC->AdvancedSearch->SearchValue);
            }
            $this->BAWAPRC->EditValue = HtmlEncode($this->BAWAPRC->AdvancedSearch->SearchValue);
            $this->BAWAPRC->PlaceHolder = RemoveHtml($this->BAWAPRC->caption());

            // STAXPER
            $this->STAXPER->EditAttrs["class"] = "form-control";
            $this->STAXPER->EditCustomAttributes = "";
            $this->STAXPER->EditValue = HtmlEncode($this->STAXPER->AdvancedSearch->SearchValue);
            $this->STAXPER->PlaceHolder = RemoveHtml($this->STAXPER->caption());

            // TAXTYPE
            $this->TAXTYPE->EditAttrs["class"] = "form-control";
            $this->TAXTYPE->EditCustomAttributes = "";
            if (!$this->TAXTYPE->Raw) {
                $this->TAXTYPE->AdvancedSearch->SearchValue = HtmlDecode($this->TAXTYPE->AdvancedSearch->SearchValue);
            }
            $this->TAXTYPE->EditValue = HtmlEncode($this->TAXTYPE->AdvancedSearch->SearchValue);
            $this->TAXTYPE->PlaceHolder = RemoveHtml($this->TAXTYPE->caption());

            // OLDTAXP
            $this->OLDTAXP->EditAttrs["class"] = "form-control";
            $this->OLDTAXP->EditCustomAttributes = "";
            $this->OLDTAXP->EditValue = HtmlEncode($this->OLDTAXP->AdvancedSearch->SearchValue);
            $this->OLDTAXP->PlaceHolder = RemoveHtml($this->OLDTAXP->caption());

            // TAXUPD
            $this->TAXUPD->EditAttrs["class"] = "form-control";
            $this->TAXUPD->EditCustomAttributes = "";
            if (!$this->TAXUPD->Raw) {
                $this->TAXUPD->AdvancedSearch->SearchValue = HtmlDecode($this->TAXUPD->AdvancedSearch->SearchValue);
            }
            $this->TAXUPD->EditValue = HtmlEncode($this->TAXUPD->AdvancedSearch->SearchValue);
            $this->TAXUPD->PlaceHolder = RemoveHtml($this->TAXUPD->caption());

            // PACKAGE
            $this->PACKAGE->EditAttrs["class"] = "form-control";
            $this->PACKAGE->EditCustomAttributes = "";
            if (!$this->PACKAGE->Raw) {
                $this->PACKAGE->AdvancedSearch->SearchValue = HtmlDecode($this->PACKAGE->AdvancedSearch->SearchValue);
            }
            $this->PACKAGE->EditValue = HtmlEncode($this->PACKAGE->AdvancedSearch->SearchValue);
            $this->PACKAGE->PlaceHolder = RemoveHtml($this->PACKAGE->caption());

            // NEWRT
            $this->NEWRT->EditAttrs["class"] = "form-control";
            $this->NEWRT->EditCustomAttributes = "";
            $this->NEWRT->EditValue = HtmlEncode($this->NEWRT->AdvancedSearch->SearchValue);
            $this->NEWRT->PlaceHolder = RemoveHtml($this->NEWRT->caption());

            // NEWMRP
            $this->NEWMRP->EditAttrs["class"] = "form-control";
            $this->NEWMRP->EditCustomAttributes = "";
            $this->NEWMRP->EditValue = HtmlEncode($this->NEWMRP->AdvancedSearch->SearchValue);
            $this->NEWMRP->PlaceHolder = RemoveHtml($this->NEWMRP->caption());

            // NEWUR
            $this->NEWUR->EditAttrs["class"] = "form-control";
            $this->NEWUR->EditCustomAttributes = "";
            $this->NEWUR->EditValue = HtmlEncode($this->NEWUR->AdvancedSearch->SearchValue);
            $this->NEWUR->PlaceHolder = RemoveHtml($this->NEWUR->caption());

            // STATUS
            $this->STATUS->EditAttrs["class"] = "form-control";
            $this->STATUS->EditCustomAttributes = "";
            if (!$this->STATUS->Raw) {
                $this->STATUS->AdvancedSearch->SearchValue = HtmlDecode($this->STATUS->AdvancedSearch->SearchValue);
            }
            $this->STATUS->EditValue = HtmlEncode($this->STATUS->AdvancedSearch->SearchValue);
            $this->STATUS->PlaceHolder = RemoveHtml($this->STATUS->caption());

            // RETNQTY
            $this->RETNQTY->EditAttrs["class"] = "form-control";
            $this->RETNQTY->EditCustomAttributes = "";
            $this->RETNQTY->EditValue = HtmlEncode($this->RETNQTY->AdvancedSearch->SearchValue);
            $this->RETNQTY->PlaceHolder = RemoveHtml($this->RETNQTY->caption());

            // KEMODISC
            $this->KEMODISC->EditAttrs["class"] = "form-control";
            $this->KEMODISC->EditCustomAttributes = "";
            if (!$this->KEMODISC->Raw) {
                $this->KEMODISC->AdvancedSearch->SearchValue = HtmlDecode($this->KEMODISC->AdvancedSearch->SearchValue);
            }
            $this->KEMODISC->EditValue = HtmlEncode($this->KEMODISC->AdvancedSearch->SearchValue);
            $this->KEMODISC->PlaceHolder = RemoveHtml($this->KEMODISC->caption());

            // PATSALE
            $this->PATSALE->EditAttrs["class"] = "form-control";
            $this->PATSALE->EditCustomAttributes = "";
            $this->PATSALE->EditValue = HtmlEncode($this->PATSALE->AdvancedSearch->SearchValue);
            $this->PATSALE->PlaceHolder = RemoveHtml($this->PATSALE->caption());

            // ORGAN
            $this->ORGAN->EditAttrs["class"] = "form-control";
            $this->ORGAN->EditCustomAttributes = "";
            if (!$this->ORGAN->Raw) {
                $this->ORGAN->AdvancedSearch->SearchValue = HtmlDecode($this->ORGAN->AdvancedSearch->SearchValue);
            }
            $this->ORGAN->EditValue = HtmlEncode($this->ORGAN->AdvancedSearch->SearchValue);
            $this->ORGAN->PlaceHolder = RemoveHtml($this->ORGAN->caption());

            // OLDRQ
            $this->OLDRQ->EditAttrs["class"] = "form-control";
            $this->OLDRQ->EditCustomAttributes = "";
            $this->OLDRQ->EditValue = HtmlEncode($this->OLDRQ->AdvancedSearch->SearchValue);
            $this->OLDRQ->PlaceHolder = RemoveHtml($this->OLDRQ->caption());

            // DRID
            $this->DRID->EditCustomAttributes = "";
            $curVal = trim(strval($this->DRID->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->DRID->AdvancedSearch->ViewValue = $this->DRID->lookupCacheOption($curVal);
            } else {
                $this->DRID->AdvancedSearch->ViewValue = $this->DRID->Lookup !== null && is_array($this->DRID->Lookup->Options) ? $curVal : null;
            }
            if ($this->DRID->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
                if ($this->DRID->AdvancedSearch->ViewValue == "") {
                    $this->DRID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DRID->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DRID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DRID->Lookup->renderViewRow($rswrk[0]);
                    $this->DRID->AdvancedSearch->ViewValue = $this->DRID->displayValue($arwrk);
                } else {
                    $this->DRID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DRID->EditValue = $arwrk;
            }
            $this->DRID->PlaceHolder = RemoveHtml($this->DRID->caption());

            // MFRCODE
            $this->MFRCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->MFRCODE->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->MFRCODE->AdvancedSearch->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
            } else {
                $this->MFRCODE->AdvancedSearch->ViewValue = $this->MFRCODE->Lookup !== null && is_array($this->MFRCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->MFRCODE->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
                if ($this->MFRCODE->AdvancedSearch->ViewValue == "") {
                    $this->MFRCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->MFRCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->MFRCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->MFRCODE->AdvancedSearch->ViewValue = $this->MFRCODE->displayValue($arwrk);
                } else {
                    $this->MFRCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->MFRCODE->EditValue = $arwrk;
            }
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // COMBCODE
            $this->COMBCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->COMBCODE->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->COMBCODE->AdvancedSearch->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
            } else {
                $this->COMBCODE->AdvancedSearch->ViewValue = $this->COMBCODE->Lookup !== null && is_array($this->COMBCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->COMBCODE->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
                if ($this->COMBCODE->AdvancedSearch->ViewValue == "") {
                    $this->COMBCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->COMBCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->COMBCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->COMBCODE->AdvancedSearch->ViewValue = $this->COMBCODE->displayValue($arwrk);
                } else {
                    $this->COMBCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->COMBCODE->EditValue = $arwrk;
            }
            $this->COMBCODE->PlaceHolder = RemoveHtml($this->COMBCODE->caption());

            // GENCODE
            $this->GENCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->GENCODE->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->GENCODE->AdvancedSearch->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
            } else {
                $this->GENCODE->AdvancedSearch->ViewValue = $this->GENCODE->Lookup !== null && is_array($this->GENCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->GENCODE->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
                if ($this->GENCODE->AdvancedSearch->ViewValue == "") {
                    $this->GENCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->GENCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GENCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->GENCODE->AdvancedSearch->ViewValue = $this->GENCODE->displayValue($arwrk);
                } else {
                    $this->GENCODE->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GENCODE->EditValue = $arwrk;
            }
            $this->GENCODE->PlaceHolder = RemoveHtml($this->GENCODE->caption());

            // STRENGTH
            $this->STRENGTH->EditAttrs["class"] = "form-control";
            $this->STRENGTH->EditCustomAttributes = "";
            $this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->AdvancedSearch->SearchValue);
            $this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());

            // UNIT
            $this->UNIT->EditAttrs["class"] = "form-control";
            $this->UNIT->EditCustomAttributes = "";
            $this->UNIT->EditValue = $this->UNIT->options(true);
            $this->UNIT->PlaceHolder = RemoveHtml($this->UNIT->caption());

            // FORMULARY
            $this->FORMULARY->EditAttrs["class"] = "form-control";
            $this->FORMULARY->EditCustomAttributes = "";
            $this->FORMULARY->EditValue = $this->FORMULARY->options(true);
            $this->FORMULARY->PlaceHolder = RemoveHtml($this->FORMULARY->caption());

            // STOCK
            $this->STOCK->EditAttrs["class"] = "form-control";
            $this->STOCK->EditCustomAttributes = "";
            $this->STOCK->EditValue = HtmlEncode($this->STOCK->AdvancedSearch->SearchValue);
            $this->STOCK->PlaceHolder = RemoveHtml($this->STOCK->caption());

            // RACKNO
            $this->RACKNO->EditAttrs["class"] = "form-control";
            $this->RACKNO->EditCustomAttributes = "";
            if (!$this->RACKNO->Raw) {
                $this->RACKNO->AdvancedSearch->SearchValue = HtmlDecode($this->RACKNO->AdvancedSearch->SearchValue);
            }
            $this->RACKNO->EditValue = HtmlEncode($this->RACKNO->AdvancedSearch->SearchValue);
            $this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

            // SUPPNAME
            $this->SUPPNAME->EditCustomAttributes = "";
            $curVal = trim(strval($this->SUPPNAME->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->SUPPNAME->AdvancedSearch->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
            } else {
                $this->SUPPNAME->AdvancedSearch->ViewValue = $this->SUPPNAME->Lookup !== null && is_array($this->SUPPNAME->Lookup->Options) ? $curVal : null;
            }
            if ($this->SUPPNAME->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->SUPPNAME->EditValue = array_values($this->SUPPNAME->Lookup->Options);
                if ($this->SUPPNAME->AdvancedSearch->ViewValue == "") {
                    $this->SUPPNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Suppliername`" . SearchString("=", $this->SUPPNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->SUPPNAME->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->SUPPNAME->Lookup->renderViewRow($rswrk[0]);
                    $this->SUPPNAME->AdvancedSearch->ViewValue = $this->SUPPNAME->displayValue($arwrk);
                } else {
                    $this->SUPPNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->SUPPNAME->EditValue = $arwrk;
            }
            $this->SUPPNAME->PlaceHolder = RemoveHtml($this->SUPPNAME->caption());

            // COMBNAME
            $this->COMBNAME->EditCustomAttributes = "";
            $curVal = trim(strval($this->COMBNAME->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
            } else {
                $this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->Lookup !== null && is_array($this->COMBNAME->Lookup->Options) ? $curVal : null;
            }
            if ($this->COMBNAME->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
                if ($this->COMBNAME->AdvancedSearch->ViewValue == "") {
                    $this->COMBNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->COMBNAME->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->COMBNAME->Lookup->renderViewRow($rswrk[0]);
                    $this->COMBNAME->AdvancedSearch->ViewValue = $this->COMBNAME->displayValue($arwrk);
                } else {
                    $this->COMBNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->COMBNAME->EditValue = $arwrk;
            }
            $this->COMBNAME->PlaceHolder = RemoveHtml($this->COMBNAME->caption());

            // GENERICNAME
            $this->GENERICNAME->EditCustomAttributes = "";
            $curVal = trim(strval($this->GENERICNAME->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
            } else {
                $this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->Lookup !== null && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : null;
            }
            if ($this->GENERICNAME->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
                if ($this->GENERICNAME->AdvancedSearch->ViewValue == "") {
                    $this->GENERICNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->GENERICNAME->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GENERICNAME->Lookup->renderViewRow($rswrk[0]);
                    $this->GENERICNAME->AdvancedSearch->ViewValue = $this->GENERICNAME->displayValue($arwrk);
                } else {
                    $this->GENERICNAME->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GENERICNAME->EditValue = $arwrk;
            }
            $this->GENERICNAME->PlaceHolder = RemoveHtml($this->GENERICNAME->caption());

            // REMARK
            $this->REMARK->EditAttrs["class"] = "form-control";
            $this->REMARK->EditCustomAttributes = "";
            if (!$this->REMARK->Raw) {
                $this->REMARK->AdvancedSearch->SearchValue = HtmlDecode($this->REMARK->AdvancedSearch->SearchValue);
            }
            $this->REMARK->EditValue = HtmlEncode($this->REMARK->AdvancedSearch->SearchValue);
            $this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

            // TEMP
            $this->TEMP->EditAttrs["class"] = "form-control";
            $this->TEMP->EditCustomAttributes = "";
            if (!$this->TEMP->Raw) {
                $this->TEMP->AdvancedSearch->SearchValue = HtmlDecode($this->TEMP->AdvancedSearch->SearchValue);
            }
            $this->TEMP->EditValue = HtmlEncode($this->TEMP->AdvancedSearch->SearchValue);
            $this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

            // PACKING
            $this->PACKING->EditAttrs["class"] = "form-control";
            $this->PACKING->EditCustomAttributes = "";
            $this->PACKING->EditValue = HtmlEncode($this->PACKING->AdvancedSearch->SearchValue);
            $this->PACKING->PlaceHolder = RemoveHtml($this->PACKING->caption());

            // PhysQty
            $this->PhysQty->EditAttrs["class"] = "form-control";
            $this->PhysQty->EditCustomAttributes = "";
            $this->PhysQty->EditValue = HtmlEncode($this->PhysQty->AdvancedSearch->SearchValue);
            $this->PhysQty->PlaceHolder = RemoveHtml($this->PhysQty->caption());

            // LedQty
            $this->LedQty->EditAttrs["class"] = "form-control";
            $this->LedQty->EditCustomAttributes = "";
            $this->LedQty->EditValue = HtmlEncode($this->LedQty->AdvancedSearch->SearchValue);
            $this->LedQty->PlaceHolder = RemoveHtml($this->LedQty->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

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

            // SaleValue
            $this->SaleValue->EditAttrs["class"] = "form-control";
            $this->SaleValue->EditCustomAttributes = "";
            $this->SaleValue->EditValue = HtmlEncode($this->SaleValue->AdvancedSearch->SearchValue);
            $this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());

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

            // SaleRate
            $this->SaleRate->EditAttrs["class"] = "form-control";
            $this->SaleRate->EditCustomAttributes = "";
            $this->SaleRate->EditValue = HtmlEncode($this->SaleRate->AdvancedSearch->SearchValue);
            $this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // BRNAME
            $this->BRNAME->EditAttrs["class"] = "form-control";
            $this->BRNAME->EditCustomAttributes = "";
            if (!$this->BRNAME->Raw) {
                $this->BRNAME->AdvancedSearch->SearchValue = HtmlDecode($this->BRNAME->AdvancedSearch->SearchValue);
            }
            $this->BRNAME->EditValue = HtmlEncode($this->BRNAME->AdvancedSearch->SearchValue);
            $this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

            // Scheduling
            $this->Scheduling->EditCustomAttributes = "";
            $this->Scheduling->EditValue = $this->Scheduling->options(false);
            $this->Scheduling->PlaceHolder = RemoveHtml($this->Scheduling->caption());

            // Schedulingh1
            $this->Schedulingh1->EditCustomAttributes = "";
            $this->Schedulingh1->EditValue = $this->Schedulingh1->options(false);
            $this->Schedulingh1->PlaceHolder = RemoveHtml($this->Schedulingh1->caption());
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
        if (!CheckNumber($this->RT->AdvancedSearch->SearchValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if (!CheckNumber($this->UR->AdvancedSearch->SearchValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if (!CheckNumber($this->TAXP->AdvancedSearch->SearchValue)) {
            $this->TAXP->addErrorMessage($this->TAXP->getErrorMessage(false));
        }
        if (!CheckNumber($this->OQ->AdvancedSearch->SearchValue)) {
            $this->OQ->addErrorMessage($this->OQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->RQ->AdvancedSearch->SearchValue)) {
            $this->RQ->addErrorMessage($this->RQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->MRQ->AdvancedSearch->SearchValue)) {
            $this->MRQ->addErrorMessage($this->MRQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->IQ->AdvancedSearch->SearchValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->MRP->AdvancedSearch->SearchValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if (!CheckNumber($this->SALQTY->AdvancedSearch->SearchValue)) {
            $this->SALQTY->addErrorMessage($this->SALQTY->getErrorMessage(false));
        }
        if (!CheckDate($this->LASTPURDT->AdvancedSearch->SearchValue)) {
            $this->LASTPURDT->addErrorMessage($this->LASTPURDT->getErrorMessage(false));
        }
        if (!CheckDate($this->LASTISSDT->AdvancedSearch->SearchValue)) {
            $this->LASTISSDT->addErrorMessage($this->LASTISSDT->getErrorMessage(false));
        }
        if (!CheckDate($this->CREATEDDT->AdvancedSearch->SearchValue)) {
            $this->CREATEDDT->addErrorMessage($this->CREATEDDT->getErrorMessage(false));
        }
        if (!CheckNumber($this->STAXPER->AdvancedSearch->SearchValue)) {
            $this->STAXPER->addErrorMessage($this->STAXPER->getErrorMessage(false));
        }
        if (!CheckNumber($this->OLDTAXP->AdvancedSearch->SearchValue)) {
            $this->OLDTAXP->addErrorMessage($this->OLDTAXP->getErrorMessage(false));
        }
        if (!CheckNumber($this->NEWRT->AdvancedSearch->SearchValue)) {
            $this->NEWRT->addErrorMessage($this->NEWRT->getErrorMessage(false));
        }
        if (!CheckNumber($this->NEWMRP->AdvancedSearch->SearchValue)) {
            $this->NEWMRP->addErrorMessage($this->NEWMRP->getErrorMessage(false));
        }
        if (!CheckNumber($this->NEWUR->AdvancedSearch->SearchValue)) {
            $this->NEWUR->addErrorMessage($this->NEWUR->getErrorMessage(false));
        }
        if (!CheckNumber($this->RETNQTY->AdvancedSearch->SearchValue)) {
            $this->RETNQTY->addErrorMessage($this->RETNQTY->getErrorMessage(false));
        }
        if (!CheckNumber($this->PATSALE->AdvancedSearch->SearchValue)) {
            $this->PATSALE->addErrorMessage($this->PATSALE->getErrorMessage(false));
        }
        if (!CheckNumber($this->OLDRQ->AdvancedSearch->SearchValue)) {
            $this->OLDRQ->addErrorMessage($this->OLDRQ->getErrorMessage(false));
        }
        if (!CheckNumber($this->STRENGTH->AdvancedSearch->SearchValue)) {
            $this->STRENGTH->addErrorMessage($this->STRENGTH->getErrorMessage(false));
        }
        if (!CheckNumber($this->STOCK->AdvancedSearch->SearchValue)) {
            $this->STOCK->addErrorMessage($this->STOCK->getErrorMessage(false));
        }
        if (!CheckNumber($this->PACKING->AdvancedSearch->SearchValue)) {
            $this->PACKING->addErrorMessage($this->PACKING->getErrorMessage(false));
        }
        if (!CheckNumber($this->PhysQty->AdvancedSearch->SearchValue)) {
            $this->PhysQty->addErrorMessage($this->PhysQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->LedQty->AdvancedSearch->SearchValue)) {
            $this->LedQty->addErrorMessage($this->LedQty->getErrorMessage(false));
        }
        if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
            $this->id->addErrorMessage($this->id->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurValue->AdvancedSearch->SearchValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if (!CheckNumber($this->PSGST->AdvancedSearch->SearchValue)) {
            $this->PSGST->addErrorMessage($this->PSGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->PCGST->AdvancedSearch->SearchValue)) {
            $this->PCGST->addErrorMessage($this->PCGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->SaleValue->AdvancedSearch->SearchValue)) {
            $this->SaleValue->addErrorMessage($this->SaleValue->getErrorMessage(false));
        }
        if (!CheckNumber($this->SSGST->AdvancedSearch->SearchValue)) {
            $this->SSGST->addErrorMessage($this->SSGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->SCGST->AdvancedSearch->SearchValue)) {
            $this->SCGST->addErrorMessage($this->SCGST->getErrorMessage(false));
        }
        if (!CheckNumber($this->SaleRate->AdvancedSearch->SearchValue)) {
            $this->SaleRate->addErrorMessage($this->SaleRate->getErrorMessage(false));
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
        $this->BRCODE->AdvancedSearch->load();
        $this->PRC->AdvancedSearch->load();
        $this->TYPE->AdvancedSearch->load();
        $this->DES->AdvancedSearch->load();
        $this->UM->AdvancedSearch->load();
        $this->RT->AdvancedSearch->load();
        $this->UR->AdvancedSearch->load();
        $this->TAXP->AdvancedSearch->load();
        $this->BATCHNO->AdvancedSearch->load();
        $this->OQ->AdvancedSearch->load();
        $this->RQ->AdvancedSearch->load();
        $this->MRQ->AdvancedSearch->load();
        $this->IQ->AdvancedSearch->load();
        $this->MRP->AdvancedSearch->load();
        $this->EXPDT->AdvancedSearch->load();
        $this->SALQTY->AdvancedSearch->load();
        $this->LASTPURDT->AdvancedSearch->load();
        $this->LASTSUPP->AdvancedSearch->load();
        $this->GENNAME->AdvancedSearch->load();
        $this->LASTISSDT->AdvancedSearch->load();
        $this->CREATEDDT->AdvancedSearch->load();
        $this->OPPRC->AdvancedSearch->load();
        $this->RESTRICT->AdvancedSearch->load();
        $this->BAWAPRC->AdvancedSearch->load();
        $this->STAXPER->AdvancedSearch->load();
        $this->TAXTYPE->AdvancedSearch->load();
        $this->OLDTAXP->AdvancedSearch->load();
        $this->TAXUPD->AdvancedSearch->load();
        $this->PACKAGE->AdvancedSearch->load();
        $this->NEWRT->AdvancedSearch->load();
        $this->NEWMRP->AdvancedSearch->load();
        $this->NEWUR->AdvancedSearch->load();
        $this->STATUS->AdvancedSearch->load();
        $this->RETNQTY->AdvancedSearch->load();
        $this->KEMODISC->AdvancedSearch->load();
        $this->PATSALE->AdvancedSearch->load();
        $this->ORGAN->AdvancedSearch->load();
        $this->OLDRQ->AdvancedSearch->load();
        $this->DRID->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->COMBCODE->AdvancedSearch->load();
        $this->GENCODE->AdvancedSearch->load();
        $this->STRENGTH->AdvancedSearch->load();
        $this->UNIT->AdvancedSearch->load();
        $this->FORMULARY->AdvancedSearch->load();
        $this->STOCK->AdvancedSearch->load();
        $this->RACKNO->AdvancedSearch->load();
        $this->SUPPNAME->AdvancedSearch->load();
        $this->COMBNAME->AdvancedSearch->load();
        $this->GENERICNAME->AdvancedSearch->load();
        $this->REMARK->AdvancedSearch->load();
        $this->TEMP->AdvancedSearch->load();
        $this->PACKING->AdvancedSearch->load();
        $this->PhysQty->AdvancedSearch->load();
        $this->LedQty->AdvancedSearch->load();
        $this->id->AdvancedSearch->load();
        $this->PurValue->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->SaleValue->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->SaleRate->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->BRNAME->AdvancedSearch->load();
        $this->Scheduling->AdvancedSearch->load();
        $this->Schedulingh1->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyStoremastList"), "", $this->TableVar, true);
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
                case "x_TYPE":
                    break;
                case "x_LASTSUPP":
                    break;
                case "x_GENNAME":
                    break;
                case "x_DRID":
                    break;
                case "x_MFRCODE":
                    break;
                case "x_COMBCODE":
                    break;
                case "x_GENCODE":
                    break;
                case "x_UNIT":
                    break;
                case "x_FORMULARY":
                    break;
                case "x_SUPPNAME":
                    break;
                case "x_COMBNAME":
                    break;
                case "x_GENERICNAME":
                    break;
                case "x_Scheduling":
                    break;
                case "x_Schedulingh1":
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
