<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientHistorySearch extends PatientHistory
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_history';

    // Page object name
    public $PageObjName = "PatientHistorySearch";

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

        // Table object (patient_history)
        if (!isset($GLOBALS["patient_history"]) || get_class($GLOBALS["patient_history"]) == PROJECT_NAMESPACE . "patient_history") {
            $GLOBALS["patient_history"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_history');
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
                $doc = new $class(Container("patient_history"));
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
                    if ($pageName == "PatientHistoryView") {
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
        $this->PatientId->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->MaritalHistory->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->MedicalHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->PastHistory->setVisibility();
        $this->TreatmentHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->Complaints->setVisibility();
        $this->illness->setVisibility();
        $this->PersonalHistory->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->PatID->setVisibility();
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
                    $srchStr = "PatientHistoryList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
        $this->buildSearchUrl($srchUrl, $this->MobileNumber); // MobileNumber
        $this->buildSearchUrl($srchUrl, $this->MaritalHistory); // MaritalHistory
        $this->buildSearchUrl($srchUrl, $this->MenstrualHistory); // MenstrualHistory
        $this->buildSearchUrl($srchUrl, $this->ObstetricHistory); // ObstetricHistory
        $this->buildSearchUrl($srchUrl, $this->MedicalHistory); // MedicalHistory
        $this->buildSearchUrl($srchUrl, $this->SurgicalHistory); // SurgicalHistory
        $this->buildSearchUrl($srchUrl, $this->PastHistory); // PastHistory
        $this->buildSearchUrl($srchUrl, $this->TreatmentHistory); // TreatmentHistory
        $this->buildSearchUrl($srchUrl, $this->FamilyHistory); // FamilyHistory
        $this->buildSearchUrl($srchUrl, $this->Age); // Age
        $this->buildSearchUrl($srchUrl, $this->Gender); // Gender
        $this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
        $this->buildSearchUrl($srchUrl, $this->Complaints); // Complaints
        $this->buildSearchUrl($srchUrl, $this->illness); // illness
        $this->buildSearchUrl($srchUrl, $this->PersonalHistory); // PersonalHistory
        $this->buildSearchUrl($srchUrl, $this->PatientSearch); // PatientSearch
        $this->buildSearchUrl($srchUrl, $this->PatID); // PatID
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
        if ($this->PatientId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MobileNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MaritalHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MenstrualHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ObstetricHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MedicalHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SurgicalHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PastHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TreatmentHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->FamilyHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Age->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Gender->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->profilePic->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Complaints->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->illness->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PersonalHistory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientSearch->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatID->AdvancedSearch->post()) {
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

        // PatientId

        // MobileNumber

        // MaritalHistory

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // PastHistory

        // TreatmentHistory

        // FamilyHistory

        // Age

        // Gender

        // profilePic

        // Complaints

        // illness

        // PersonalHistory

        // PatientSearch

        // PatID

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

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // MaritalHistory
            $this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
            $this->MaritalHistory->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // ObstetricHistory
            $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
            $this->ObstetricHistory->ViewCustomAttributes = "";

            // MedicalHistory
            $this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
            $this->MedicalHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // PastHistory
            $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
            $this->PastHistory->ViewCustomAttributes = "";

            // TreatmentHistory
            $this->TreatmentHistory->ViewValue = $this->TreatmentHistory->CurrentValue;
            $this->TreatmentHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Complaints
            $this->Complaints->ViewValue = $this->Complaints->CurrentValue;
            $this->Complaints->ViewCustomAttributes = "";

            // illness
            $this->illness->ViewValue = $this->illness->CurrentValue;
            $this->illness->ViewCustomAttributes = "";

            // PersonalHistory
            $this->PersonalHistory->ViewValue = $this->PersonalHistory->CurrentValue;
            $this->PersonalHistory->ViewCustomAttributes = "";

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

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

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

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // MaritalHistory
            $this->MaritalHistory->LinkCustomAttributes = "";
            $this->MaritalHistory->HrefValue = "";
            $this->MaritalHistory->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";
            $this->ObstetricHistory->TooltipValue = "";

            // MedicalHistory
            $this->MedicalHistory->LinkCustomAttributes = "";
            $this->MedicalHistory->HrefValue = "";
            $this->MedicalHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";
            $this->PastHistory->TooltipValue = "";

            // TreatmentHistory
            $this->TreatmentHistory->LinkCustomAttributes = "";
            $this->TreatmentHistory->HrefValue = "";
            $this->TreatmentHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // Complaints
            $this->Complaints->LinkCustomAttributes = "";
            $this->Complaints->HrefValue = "";
            $this->Complaints->TooltipValue = "";

            // illness
            $this->illness->LinkCustomAttributes = "";
            $this->illness->HrefValue = "";
            $this->illness->TooltipValue = "";

            // PersonalHistory
            $this->PersonalHistory->LinkCustomAttributes = "";
            $this->PersonalHistory->HrefValue = "";
            $this->PersonalHistory->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

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

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // MaritalHistory
            $this->MaritalHistory->EditAttrs["class"] = "form-control";
            $this->MaritalHistory->EditCustomAttributes = "";
            $this->MaritalHistory->EditValue = HtmlEncode($this->MaritalHistory->AdvancedSearch->SearchValue);
            $this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

            // MenstrualHistory
            $this->MenstrualHistory->EditAttrs["class"] = "form-control";
            $this->MenstrualHistory->EditCustomAttributes = "";
            $this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->AdvancedSearch->SearchValue);
            $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

            // ObstetricHistory
            $this->ObstetricHistory->EditAttrs["class"] = "form-control";
            $this->ObstetricHistory->EditCustomAttributes = "";
            $this->ObstetricHistory->EditValue = HtmlEncode($this->ObstetricHistory->AdvancedSearch->SearchValue);
            $this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

            // MedicalHistory
            $this->MedicalHistory->EditAttrs["class"] = "form-control";
            $this->MedicalHistory->EditCustomAttributes = "";
            $this->MedicalHistory->EditValue = HtmlEncode($this->MedicalHistory->AdvancedSearch->SearchValue);
            $this->MedicalHistory->PlaceHolder = RemoveHtml($this->MedicalHistory->caption());

            // SurgicalHistory
            $this->SurgicalHistory->EditAttrs["class"] = "form-control";
            $this->SurgicalHistory->EditCustomAttributes = "";
            $this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->AdvancedSearch->SearchValue);
            $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

            // PastHistory
            $this->PastHistory->EditAttrs["class"] = "form-control";
            $this->PastHistory->EditCustomAttributes = "";
            $this->PastHistory->EditValue = HtmlEncode($this->PastHistory->AdvancedSearch->SearchValue);
            $this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

            // TreatmentHistory
            $this->TreatmentHistory->EditAttrs["class"] = "form-control";
            $this->TreatmentHistory->EditCustomAttributes = "";
            $this->TreatmentHistory->EditValue = HtmlEncode($this->TreatmentHistory->AdvancedSearch->SearchValue);
            $this->TreatmentHistory->PlaceHolder = RemoveHtml($this->TreatmentHistory->caption());

            // FamilyHistory
            $this->FamilyHistory->EditAttrs["class"] = "form-control";
            $this->FamilyHistory->EditCustomAttributes = "";
            $this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->AdvancedSearch->SearchValue);
            $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

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

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Complaints
            $this->Complaints->EditAttrs["class"] = "form-control";
            $this->Complaints->EditCustomAttributes = "";
            $this->Complaints->EditValue = HtmlEncode($this->Complaints->AdvancedSearch->SearchValue);
            $this->Complaints->PlaceHolder = RemoveHtml($this->Complaints->caption());

            // illness
            $this->illness->EditAttrs["class"] = "form-control";
            $this->illness->EditCustomAttributes = "";
            $this->illness->EditValue = HtmlEncode($this->illness->AdvancedSearch->SearchValue);
            $this->illness->PlaceHolder = RemoveHtml($this->illness->caption());

            // PersonalHistory
            $this->PersonalHistory->EditAttrs["class"] = "form-control";
            $this->PersonalHistory->EditCustomAttributes = "";
            $this->PersonalHistory->EditValue = HtmlEncode($this->PersonalHistory->AdvancedSearch->SearchValue);
            $this->PersonalHistory->PlaceHolder = RemoveHtml($this->PersonalHistory->caption());

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
                foreach ($arwrk as &$row)
                    $row = $this->PatientSearch->Lookup->renderViewRow($row);
                $this->PatientSearch->EditValue = $arwrk;
            }
            $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

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
        if (!CheckInteger($this->PatientId->AdvancedSearch->SearchValue)) {
            $this->PatientId->addErrorMessage($this->PatientId->getErrorMessage(false));
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
        $this->PatientId->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->MaritalHistory->AdvancedSearch->load();
        $this->MenstrualHistory->AdvancedSearch->load();
        $this->ObstetricHistory->AdvancedSearch->load();
        $this->MedicalHistory->AdvancedSearch->load();
        $this->SurgicalHistory->AdvancedSearch->load();
        $this->PastHistory->AdvancedSearch->load();
        $this->TreatmentHistory->AdvancedSearch->load();
        $this->FamilyHistory->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->Complaints->AdvancedSearch->load();
        $this->illness->AdvancedSearch->load();
        $this->PersonalHistory->AdvancedSearch->load();
        $this->PatientSearch->AdvancedSearch->load();
        $this->PatID->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientHistoryList"), "", $this->TableVar, true);
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
