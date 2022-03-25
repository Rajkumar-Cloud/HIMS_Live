<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientVitalsSearch extends PatientVitals
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_vitals';

    // Page object name
    public $PageObjName = "PatientVitalsSearch";

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

        // Table object (patient_vitals)
        if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
            $GLOBALS["patient_vitals"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');
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
                $doc = new $class(Container("patient_vitals"));
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
                    if ($pageName == "PatientVitalsView") {
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
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatID->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->profilePic->setVisibility();
        $this->HT->setVisibility();
        $this->WT->setVisibility();
        $this->SurfaceArea->setVisibility();
        $this->BodyMassIndex->setVisibility();
        $this->ClinicalFindings->setVisibility();
        $this->ClinicalDiagnosis->setVisibility();
        $this->AnticoagulantifAny->setVisibility();
        $this->FoodAllergies->setVisibility();
        $this->GenericAllergies->setVisibility();
        $this->GroupAllergies->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->PR->setVisibility();
        $this->CNS->setVisibility();
        $this->RSA->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->PS->setVisibility();
        $this->PV->setVisibility();
        $this->clinicaldetails->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->PatientId->setVisibility();
        $this->Reception->setVisibility();
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
        $this->setupLookupOptions($this->AnticoagulantifAny);
        $this->setupLookupOptions($this->GenericAllergies);
        $this->setupLookupOptions($this->GroupAllergies);
        $this->setupLookupOptions($this->clinicaldetails);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->PatientSearch);

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
                    $srchStr = "PatientVitalsList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
        $this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
        $this->buildSearchUrl($srchUrl, $this->PatID); // PatID
        $this->buildSearchUrl($srchUrl, $this->MobileNumber); // MobileNumber
        $this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
        $this->buildSearchUrl($srchUrl, $this->HT); // HT
        $this->buildSearchUrl($srchUrl, $this->WT); // WT
        $this->buildSearchUrl($srchUrl, $this->SurfaceArea); // SurfaceArea
        $this->buildSearchUrl($srchUrl, $this->BodyMassIndex); // BodyMassIndex
        $this->buildSearchUrl($srchUrl, $this->ClinicalFindings); // ClinicalFindings
        $this->buildSearchUrl($srchUrl, $this->ClinicalDiagnosis); // ClinicalDiagnosis
        $this->buildSearchUrl($srchUrl, $this->AnticoagulantifAny); // AnticoagulantifAny
        $this->buildSearchUrl($srchUrl, $this->FoodAllergies); // FoodAllergies
        $this->buildSearchUrl($srchUrl, $this->GenericAllergies); // GenericAllergies
        $this->buildSearchUrl($srchUrl, $this->GroupAllergies); // GroupAllergies
        $this->buildSearchUrl($srchUrl, $this->Temp); // Temp
        $this->buildSearchUrl($srchUrl, $this->Pulse); // Pulse
        $this->buildSearchUrl($srchUrl, $this->BP); // BP
        $this->buildSearchUrl($srchUrl, $this->PR); // PR
        $this->buildSearchUrl($srchUrl, $this->CNS); // CNS
        $this->buildSearchUrl($srchUrl, $this->RSA); // RSA
        $this->buildSearchUrl($srchUrl, $this->CVS); // CVS
        $this->buildSearchUrl($srchUrl, $this->PA); // PA
        $this->buildSearchUrl($srchUrl, $this->PS); // PS
        $this->buildSearchUrl($srchUrl, $this->PV); // PV
        $this->buildSearchUrl($srchUrl, $this->clinicaldetails); // clinicaldetails
        $this->buildSearchUrl($srchUrl, $this->status); // status
        $this->buildSearchUrl($srchUrl, $this->createdby); // createdby
        $this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
        $this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
        $this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
        $this->buildSearchUrl($srchUrl, $this->Age); // Age
        $this->buildSearchUrl($srchUrl, $this->Gender); // Gender
        $this->buildSearchUrl($srchUrl, $this->PatientSearch); // PatientSearch
        $this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
        $this->buildSearchUrl($srchUrl, $this->Reception); // Reception
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
        if ($this->id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->mrnno->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MobileNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->profilePic->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->WT->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SurfaceArea->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BodyMassIndex->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ClinicalFindings->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ClinicalDiagnosis->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AnticoagulantifAny->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FoodAllergies->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GenericAllergies->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->GenericAllergies->AdvancedSearch->SearchValue)) {
            $this->GenericAllergies->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GenericAllergies->AdvancedSearch->SearchValue);
        }
        if (is_array($this->GenericAllergies->AdvancedSearch->SearchValue2)) {
            $this->GenericAllergies->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GenericAllergies->AdvancedSearch->SearchValue2);
        }
        if ($this->GroupAllergies->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->GroupAllergies->AdvancedSearch->SearchValue)) {
            $this->GroupAllergies->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GroupAllergies->AdvancedSearch->SearchValue);
        }
        if (is_array($this->GroupAllergies->AdvancedSearch->SearchValue2)) {
            $this->GroupAllergies->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GroupAllergies->AdvancedSearch->SearchValue2);
        }
        if ($this->Temp->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Pulse->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PR->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CNS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RSA->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CVS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PA->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PS->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PV->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->clinicaldetails->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->clinicaldetails->AdvancedSearch->SearchValue)) {
            $this->clinicaldetails->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->clinicaldetails->AdvancedSearch->SearchValue);
        }
        if (is_array($this->clinicaldetails->AdvancedSearch->SearchValue2)) {
            $this->clinicaldetails->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->clinicaldetails->AdvancedSearch->SearchValue2);
        }
        if ($this->status->AdvancedSearch->post()) {
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
        if ($this->Age->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Gender->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientSearch->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Reception->AdvancedSearch->post()) {
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

        // id

        // mrnno

        // PatientName

        // PatID

        // MobileNumber

        // profilePic

        // HT

        // WT

        // SurfaceArea

        // BodyMassIndex

        // ClinicalFindings

        // ClinicalDiagnosis

        // AnticoagulantifAny

        // FoodAllergies

        // GenericAllergies

        // GroupAllergies

        // Temp

        // Pulse

        // BP

        // PR

        // CNS

        // RSA

        // CVS

        // PA

        // PS

        // PV

        // clinicaldetails

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Age

        // Gender

        // PatientSearch

        // PatientId

        // Reception

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->CssClass = "font-weight-bold";
            $this->profilePic->ViewCustomAttributes = "";

            // HT
            $this->HT->ViewValue = $this->HT->CurrentValue;
            $this->HT->ViewCustomAttributes = "";

            // WT
            $this->WT->ViewValue = $this->WT->CurrentValue;
            $this->WT->ViewCustomAttributes = "";

            // SurfaceArea
            $this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
            $this->SurfaceArea->ViewCustomAttributes = "";

            // BodyMassIndex
            $this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
            $this->BodyMassIndex->ViewCustomAttributes = "";

            // ClinicalFindings
            $this->ClinicalFindings->ViewValue = $this->ClinicalFindings->CurrentValue;
            $this->ClinicalFindings->ViewCustomAttributes = "";

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->ViewValue = $this->ClinicalDiagnosis->CurrentValue;
            $this->ClinicalDiagnosis->ViewCustomAttributes = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
            $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
                    }
                }
            } else {
                $this->AnticoagulantifAny->ViewValue = null;
            }
            $this->AnticoagulantifAny->ViewCustomAttributes = "";

            // FoodAllergies
            $this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
            $this->FoodAllergies->ViewCustomAttributes = "";

            // GenericAllergies
            $curVal = trim(strval($this->GenericAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
                if ($this->GenericAllergies->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->GenericAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->GenericAllergies->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                            $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        }
                    } else {
                        $this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
                    }
                }
            } else {
                $this->GenericAllergies->ViewValue = null;
            }
            $this->GenericAllergies->ViewCustomAttributes = "";

            // GroupAllergies
            if ($this->GroupAllergies->VirtualValue != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
            } else {
                $curVal = trim(strval($this->GroupAllergies->CurrentValue));
                if ($curVal != "") {
                    $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
                    if ($this->GroupAllergies->ViewValue === null) { // Lookup from database
                        $arwrk = explode(",", $curVal);
                        $filterWrk = "";
                        foreach ($arwrk as $wrk) {
                            if ($filterWrk != "") {
                                $filterWrk .= " OR ";
                            }
                            $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                        }
                        $sqlWrk = $this->GroupAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $this->GroupAllergies->ViewValue = new OptionValues();
                            foreach ($rswrk as $row) {
                                $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                                $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                            }
                        } else {
                            $this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
                        }
                    }
                } else {
                    $this->GroupAllergies->ViewValue = null;
                }
            }
            $this->GroupAllergies->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // PR
            $this->PR->ViewValue = $this->PR->CurrentValue;
            $this->PR->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RSA
            $this->RSA->ViewValue = $this->RSA->CurrentValue;
            $this->RSA->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // PS
            $this->PS->ViewValue = $this->PS->CurrentValue;
            $this->PS->ViewCustomAttributes = "";

            // PV
            $this->PV->ViewValue = $this->PV->CurrentValue;
            $this->PV->ViewCustomAttributes = "";

            // clinicaldetails
            $curVal = trim(strval($this->clinicaldetails->CurrentValue));
            if ($curVal != "") {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
                if ($this->clinicaldetails->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->clinicaldetails->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->clinicaldetails->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->clinicaldetails->Lookup->renderViewRow($row);
                            $this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
                        }
                    } else {
                        $this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
                    }
                }
            } else {
                $this->clinicaldetails->ViewValue = null;
            }
            $this->clinicaldetails->ViewCustomAttributes = "";

            // status
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
                if ($this->status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                        $this->status->ViewValue = $this->status->displayValue($arwrk);
                    } else {
                        $this->status->ViewValue = $this->status->CurrentValue;
                    }
                }
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // PatientSearch
            $curVal = trim(strval($this->PatientSearch->CurrentValue));
            if ($curVal != "") {
                $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
                if ($this->PatientSearch->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                    } else {
                        $this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
                    }
                }
            } else {
                $this->PatientSearch->ViewValue = null;
            }
            $this->PatientSearch->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // HT
            $this->HT->LinkCustomAttributes = "";
            $this->HT->HrefValue = "";
            $this->HT->TooltipValue = "";

            // WT
            $this->WT->LinkCustomAttributes = "";
            $this->WT->HrefValue = "";
            $this->WT->TooltipValue = "";

            // SurfaceArea
            $this->SurfaceArea->LinkCustomAttributes = "";
            $this->SurfaceArea->HrefValue = "";
            $this->SurfaceArea->TooltipValue = "";

            // BodyMassIndex
            $this->BodyMassIndex->LinkCustomAttributes = "";
            $this->BodyMassIndex->HrefValue = "";
            $this->BodyMassIndex->TooltipValue = "";

            // ClinicalFindings
            $this->ClinicalFindings->LinkCustomAttributes = "";
            $this->ClinicalFindings->HrefValue = "";
            $this->ClinicalFindings->TooltipValue = "";

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->LinkCustomAttributes = "";
            $this->ClinicalDiagnosis->HrefValue = "";
            $this->ClinicalDiagnosis->TooltipValue = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->LinkCustomAttributes = "";
            $this->AnticoagulantifAny->HrefValue = "";
            $this->AnticoagulantifAny->TooltipValue = "";

            // FoodAllergies
            $this->FoodAllergies->LinkCustomAttributes = "";
            $this->FoodAllergies->HrefValue = "";
            $this->FoodAllergies->TooltipValue = "";

            // GenericAllergies
            $this->GenericAllergies->LinkCustomAttributes = "";
            $this->GenericAllergies->HrefValue = "";
            $this->GenericAllergies->TooltipValue = "";

            // GroupAllergies
            $this->GroupAllergies->LinkCustomAttributes = "";
            $this->GroupAllergies->HrefValue = "";
            $this->GroupAllergies->TooltipValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";
            $this->PR->TooltipValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";

            // RSA
            $this->RSA->LinkCustomAttributes = "";
            $this->RSA->HrefValue = "";
            $this->RSA->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // PS
            $this->PS->LinkCustomAttributes = "";
            $this->PS->HrefValue = "";
            $this->PS->TooltipValue = "";

            // PV
            $this->PV->LinkCustomAttributes = "";
            $this->PV->HrefValue = "";
            $this->PV->TooltipValue = "";

            // clinicaldetails
            $this->clinicaldetails->LinkCustomAttributes = "";
            $this->clinicaldetails->HrefValue = "";
            $this->clinicaldetails->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

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

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            if (!$this->profilePic->Raw) {
                $this->profilePic->AdvancedSearch->SearchValue = HtmlDecode($this->profilePic->AdvancedSearch->SearchValue);
            }
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // HT
            $this->HT->EditAttrs["class"] = "form-control";
            $this->HT->EditCustomAttributes = "";
            if (!$this->HT->Raw) {
                $this->HT->AdvancedSearch->SearchValue = HtmlDecode($this->HT->AdvancedSearch->SearchValue);
            }
            $this->HT->EditValue = HtmlEncode($this->HT->AdvancedSearch->SearchValue);
            $this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

            // WT
            $this->WT->EditAttrs["class"] = "form-control";
            $this->WT->EditCustomAttributes = "";
            if (!$this->WT->Raw) {
                $this->WT->AdvancedSearch->SearchValue = HtmlDecode($this->WT->AdvancedSearch->SearchValue);
            }
            $this->WT->EditValue = HtmlEncode($this->WT->AdvancedSearch->SearchValue);
            $this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

            // SurfaceArea
            $this->SurfaceArea->EditAttrs["class"] = "form-control";
            $this->SurfaceArea->EditCustomAttributes = "";
            if (!$this->SurfaceArea->Raw) {
                $this->SurfaceArea->AdvancedSearch->SearchValue = HtmlDecode($this->SurfaceArea->AdvancedSearch->SearchValue);
            }
            $this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->AdvancedSearch->SearchValue);
            $this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

            // BodyMassIndex
            $this->BodyMassIndex->EditAttrs["class"] = "form-control";
            $this->BodyMassIndex->EditCustomAttributes = "";
            if (!$this->BodyMassIndex->Raw) {
                $this->BodyMassIndex->AdvancedSearch->SearchValue = HtmlDecode($this->BodyMassIndex->AdvancedSearch->SearchValue);
            }
            $this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->AdvancedSearch->SearchValue);
            $this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

            // ClinicalFindings
            $this->ClinicalFindings->EditAttrs["class"] = "form-control";
            $this->ClinicalFindings->EditCustomAttributes = "";
            $this->ClinicalFindings->EditValue = HtmlEncode($this->ClinicalFindings->AdvancedSearch->SearchValue);
            $this->ClinicalFindings->PlaceHolder = RemoveHtml($this->ClinicalFindings->caption());

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->EditAttrs["class"] = "form-control";
            $this->ClinicalDiagnosis->EditCustomAttributes = "";
            $this->ClinicalDiagnosis->EditValue = HtmlEncode($this->ClinicalDiagnosis->AdvancedSearch->SearchValue);
            $this->ClinicalDiagnosis->PlaceHolder = RemoveHtml($this->ClinicalDiagnosis->caption());

            // AnticoagulantifAny
            $this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
            $this->AnticoagulantifAny->EditCustomAttributes = "";
            if (!$this->AnticoagulantifAny->Raw) {
                $this->AnticoagulantifAny->AdvancedSearch->SearchValue = HtmlDecode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
            }
            $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->AnticoagulantifAny->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->EditValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->AnticoagulantifAny->EditValue = null;
            }
            $this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

            // FoodAllergies
            $this->FoodAllergies->EditAttrs["class"] = "form-control";
            $this->FoodAllergies->EditCustomAttributes = "";
            if (!$this->FoodAllergies->Raw) {
                $this->FoodAllergies->AdvancedSearch->SearchValue = HtmlDecode($this->FoodAllergies->AdvancedSearch->SearchValue);
            }
            $this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->AdvancedSearch->SearchValue);
            $this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

            // GenericAllergies
            $this->GenericAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GenericAllergies->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->GenericAllergies->AdvancedSearch->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
            } else {
                $this->GenericAllergies->AdvancedSearch->ViewValue = $this->GenericAllergies->Lookup !== null && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GenericAllergies->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
                if ($this->GenericAllergies->AdvancedSearch->ViewValue == "") {
                    $this->GenericAllergies->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GenericAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GenericAllergies->AdvancedSearch->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                        $this->GenericAllergies->AdvancedSearch->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GenericAllergies->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GenericAllergies->EditValue = $arwrk;
            }
            $this->GenericAllergies->PlaceHolder = RemoveHtml($this->GenericAllergies->caption());

            // GroupAllergies
            $this->GroupAllergies->EditAttrs["class"] = "form-control";
            $this->GroupAllergies->EditCustomAttributes = "";
            if (!$this->GroupAllergies->Raw) {
                $this->GroupAllergies->AdvancedSearch->SearchValue = HtmlDecode($this->GroupAllergies->AdvancedSearch->SearchValue);
            }
            $this->GroupAllergies->EditValue = HtmlEncode($this->GroupAllergies->AdvancedSearch->SearchValue);
            $this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->AdvancedSearch->SearchValue = HtmlDecode($this->Temp->AdvancedSearch->SearchValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->AdvancedSearch->SearchValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->AdvancedSearch->SearchValue = HtmlDecode($this->Pulse->AdvancedSearch->SearchValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->AdvancedSearch->SearchValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->AdvancedSearch->SearchValue = HtmlDecode($this->BP->AdvancedSearch->SearchValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->AdvancedSearch->SearchValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // PR
            $this->PR->EditAttrs["class"] = "form-control";
            $this->PR->EditCustomAttributes = "";
            if (!$this->PR->Raw) {
                $this->PR->AdvancedSearch->SearchValue = HtmlDecode($this->PR->AdvancedSearch->SearchValue);
            }
            $this->PR->EditValue = HtmlEncode($this->PR->AdvancedSearch->SearchValue);
            $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->AdvancedSearch->SearchValue = HtmlDecode($this->CNS->AdvancedSearch->SearchValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->AdvancedSearch->SearchValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RSA
            $this->RSA->EditAttrs["class"] = "form-control";
            $this->RSA->EditCustomAttributes = "";
            if (!$this->RSA->Raw) {
                $this->RSA->AdvancedSearch->SearchValue = HtmlDecode($this->RSA->AdvancedSearch->SearchValue);
            }
            $this->RSA->EditValue = HtmlEncode($this->RSA->AdvancedSearch->SearchValue);
            $this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->AdvancedSearch->SearchValue = HtmlDecode($this->CVS->AdvancedSearch->SearchValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->AdvancedSearch->SearchValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->AdvancedSearch->SearchValue = HtmlDecode($this->PA->AdvancedSearch->SearchValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->AdvancedSearch->SearchValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // PS
            $this->PS->EditAttrs["class"] = "form-control";
            $this->PS->EditCustomAttributes = "";
            if (!$this->PS->Raw) {
                $this->PS->AdvancedSearch->SearchValue = HtmlDecode($this->PS->AdvancedSearch->SearchValue);
            }
            $this->PS->EditValue = HtmlEncode($this->PS->AdvancedSearch->SearchValue);
            $this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

            // PV
            $this->PV->EditAttrs["class"] = "form-control";
            $this->PV->EditCustomAttributes = "";
            if (!$this->PV->Raw) {
                $this->PV->AdvancedSearch->SearchValue = HtmlDecode($this->PV->AdvancedSearch->SearchValue);
            }
            $this->PV->EditValue = HtmlEncode($this->PV->AdvancedSearch->SearchValue);
            $this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

            // clinicaldetails
            $this->clinicaldetails->EditCustomAttributes = "";
            $curVal = trim(strval($this->clinicaldetails->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->clinicaldetails->AdvancedSearch->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
            } else {
                $this->clinicaldetails->AdvancedSearch->ViewValue = $this->clinicaldetails->Lookup !== null && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : null;
            }
            if ($this->clinicaldetails->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->clinicaldetails->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->clinicaldetails->EditValue = $arwrk;
            }
            $this->clinicaldetails->PlaceHolder = RemoveHtml($this->clinicaldetails->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $curVal = trim(strval($this->status->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->status->AdvancedSearch->ViewValue = $this->status->lookupCacheOption($curVal);
            } else {
                $this->status->AdvancedSearch->ViewValue = $this->status->Lookup !== null && is_array($this->status->Lookup->Options) ? $curVal : null;
            }
            if ($this->status->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->status->EditValue = array_values($this->status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->status->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->status->EditValue = $arwrk;
            }
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

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
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
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
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // PatientSearch
            $this->PatientSearch->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientSearch->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PatientSearch->AdvancedSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
            } else {
                $this->PatientSearch->AdvancedSearch->ViewValue = $this->PatientSearch->Lookup !== null && is_array($this->PatientSearch->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientSearch->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->PatientSearch->EditValue = array_values($this->PatientSearch->Lookup->Options);
                if ($this->PatientSearch->AdvancedSearch->ViewValue == "") {
                    $this->PatientSearch->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PatientSearch->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PatientSearch->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientSearch->AdvancedSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                } else {
                    $this->PatientSearch->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->PatientSearch->EditValue = $arwrk;
            }
            $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

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
        if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
            $this->id->addErrorMessage($this->id->getErrorMessage(false));
        }
        if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if (!CheckInteger($this->Reception->AdvancedSearch->SearchValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
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
        $this->id->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->PatID->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->HT->AdvancedSearch->load();
        $this->WT->AdvancedSearch->load();
        $this->SurfaceArea->AdvancedSearch->load();
        $this->BodyMassIndex->AdvancedSearch->load();
        $this->ClinicalFindings->AdvancedSearch->load();
        $this->ClinicalDiagnosis->AdvancedSearch->load();
        $this->AnticoagulantifAny->AdvancedSearch->load();
        $this->FoodAllergies->AdvancedSearch->load();
        $this->GenericAllergies->AdvancedSearch->load();
        $this->GroupAllergies->AdvancedSearch->load();
        $this->Temp->AdvancedSearch->load();
        $this->Pulse->AdvancedSearch->load();
        $this->BP->AdvancedSearch->load();
        $this->PR->AdvancedSearch->load();
        $this->CNS->AdvancedSearch->load();
        $this->RSA->AdvancedSearch->load();
        $this->CVS->AdvancedSearch->load();
        $this->PA->AdvancedSearch->load();
        $this->PS->AdvancedSearch->load();
        $this->PV->AdvancedSearch->load();
        $this->clinicaldetails->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->PatientSearch->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientVitalsList"), "", $this->TableVar, true);
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
                case "x_AnticoagulantifAny":
                    break;
                case "x_GenericAllergies":
                    break;
                case "x_GroupAllergies":
                    break;
                case "x_clinicaldetails":
                    break;
                case "x_status":
                    break;
                case "x_PatientSearch":
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
