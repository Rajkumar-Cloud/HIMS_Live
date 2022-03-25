<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewAppointmentSchedulerNewSearch extends ViewAppointmentSchedulerNew
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_appointment_scheduler_new';

    // Page object name
    public $PageObjName = "ViewAppointmentSchedulerNewSearch";

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

        // Table object (view_appointment_scheduler_new)
        if (!isset($GLOBALS["view_appointment_scheduler_new"]) || get_class($GLOBALS["view_appointment_scheduler_new"]) == PROJECT_NAMESPACE . "view_appointment_scheduler_new") {
            $GLOBALS["view_appointment_scheduler_new"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_appointment_scheduler_new');
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
                $doc = new $class(Container("view_appointment_scheduler_new"));
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
                    if ($pageName == "ViewAppointmentSchedulerNewView") {
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
            $key .= @$ar['Id'];
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
            $this->Id->Visible = false;
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
        $this->patientID->setVisibility();
        $this->patientName->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->start_time->setVisibility();
        $this->Purpose->setVisibility();
        $this->patienttype->setVisibility();
        $this->Referal->setVisibility();
        $this->start_date->setVisibility();
        $this->DoctorName->setVisibility();
        $this->HospID->setVisibility();
        $this->Id->setVisibility();
        $this->PatientTypee->setVisibility();
        $this->Notes->setVisibility();
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
        $this->setupLookupOptions($this->Referal);
        $this->setupLookupOptions($this->DoctorName);

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
                    $srchStr = "ViewAppointmentSchedulerNewList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->patientID); // patientID
        $this->buildSearchUrl($srchUrl, $this->patientName); // patientName
        $this->buildSearchUrl($srchUrl, $this->MobileNumber); // MobileNumber
        $this->buildSearchUrl($srchUrl, $this->start_time); // start_time
        $this->buildSearchUrl($srchUrl, $this->Purpose); // Purpose
        $this->buildSearchUrl($srchUrl, $this->patienttype); // patienttype
        $this->buildSearchUrl($srchUrl, $this->Referal); // Referal
        $this->buildSearchUrl($srchUrl, $this->start_date); // start_date
        $this->buildSearchUrl($srchUrl, $this->DoctorName); // DoctorName
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->Id); // Id
        $this->buildSearchUrl($srchUrl, $this->PatientTypee); // PatientTypee
        $this->buildSearchUrl($srchUrl, $this->Notes); // Notes
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
        if ($this->patientID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->patientName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MobileNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->start_time->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Purpose->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->patienttype->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Referal->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->start_date->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DoctorName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientTypee->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Notes->AdvancedSearch->post()) {
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

        // patientID

        // patientName

        // MobileNumber

        // start_time

        // Purpose

        // patienttype

        // Referal

        // start_date

        // DoctorName

        // HospID

        // Id

        // PatientTypee

        // Notes
        if ($this->RowType == ROWTYPE_VIEW) {
            // patientID
            $this->patientID->ViewValue = $this->patientID->CurrentValue;
            $this->patientID->ViewCustomAttributes = "";

            // patientName
            $this->patientName->ViewValue = $this->patientName->CurrentValue;
            $this->patientName->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // start_time
            $this->start_time->ViewValue = $this->start_time->CurrentValue;
            $this->start_time->ViewValue = FormatDateTime($this->start_time->ViewValue, 3);
            $this->start_time->ViewCustomAttributes = "";

            // Purpose
            $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
            $this->Purpose->ViewCustomAttributes = "";

            // patienttype
            $this->patienttype->ViewValue = $this->patienttype->CurrentValue;
            $this->patienttype->ViewCustomAttributes = "";

            // Referal
            $this->Referal->ViewValue = $this->Referal->CurrentValue;
            $curVal = trim(strval($this->Referal->CurrentValue));
            if ($curVal != "") {
                $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
                if ($this->Referal->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Referal->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                        $this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
                    } else {
                        $this->Referal->ViewValue = $this->Referal->CurrentValue;
                    }
                }
            } else {
                $this->Referal->ViewValue = null;
            }
            $this->Referal->ViewCustomAttributes = "";

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
            $this->start_date->ViewCustomAttributes = "";

            // DoctorName
            $curVal = trim(strval($this->DoctorName->CurrentValue));
            if ($curVal != "") {
                $this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
                if ($this->DoctorName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DoctorName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                        $this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
                    } else {
                        $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
                    }
                }
            } else {
                $this->DoctorName->ViewValue = null;
            }
            $this->DoctorName->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Id
            $this->Id->ViewValue = $this->Id->CurrentValue;
            $this->Id->ViewCustomAttributes = "";

            // PatientTypee
            $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
            $this->PatientTypee->ViewCustomAttributes = "";

            // Notes
            $this->Notes->ViewValue = $this->Notes->CurrentValue;
            $this->Notes->ViewCustomAttributes = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";
            $this->patientID->TooltipValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";
            $this->patientName->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // start_time
            $this->start_time->LinkCustomAttributes = "";
            $this->start_time->HrefValue = "";
            $this->start_time->TooltipValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";
            $this->Purpose->TooltipValue = "";

            // patienttype
            $this->patienttype->LinkCustomAttributes = "";
            $this->patienttype->HrefValue = "";
            $this->patienttype->TooltipValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";
            $this->Referal->TooltipValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";
            $this->start_date->TooltipValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";
            $this->DoctorName->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Id
            $this->Id->LinkCustomAttributes = "";
            $this->Id->HrefValue = "";
            $this->Id->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
            $this->PatientTypee->TooltipValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
            $this->Notes->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // patientID
            $this->patientID->EditAttrs["class"] = "form-control";
            $this->patientID->EditCustomAttributes = "";
            if (!$this->patientID->Raw) {
                $this->patientID->AdvancedSearch->SearchValue = HtmlDecode($this->patientID->AdvancedSearch->SearchValue);
            }
            $this->patientID->EditValue = HtmlEncode($this->patientID->AdvancedSearch->SearchValue);
            $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

            // patientName
            $this->patientName->EditAttrs["class"] = "form-control";
            $this->patientName->EditCustomAttributes = "";
            if (!$this->patientName->Raw) {
                $this->patientName->AdvancedSearch->SearchValue = HtmlDecode($this->patientName->AdvancedSearch->SearchValue);
            }
            $this->patientName->EditValue = HtmlEncode($this->patientName->AdvancedSearch->SearchValue);
            $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // start_time
            $this->start_time->EditAttrs["class"] = "form-control";
            $this->start_time->EditCustomAttributes = "";
            $this->start_time->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->start_time->AdvancedSearch->SearchValue, 3), 3));
            $this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            if (!$this->Purpose->Raw) {
                $this->Purpose->AdvancedSearch->SearchValue = HtmlDecode($this->Purpose->AdvancedSearch->SearchValue);
            }
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->AdvancedSearch->SearchValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // patienttype
            $this->patienttype->EditAttrs["class"] = "form-control";
            $this->patienttype->EditCustomAttributes = "";
            if (!$this->patienttype->Raw) {
                $this->patienttype->AdvancedSearch->SearchValue = HtmlDecode($this->patienttype->AdvancedSearch->SearchValue);
            }
            $this->patienttype->EditValue = HtmlEncode($this->patienttype->AdvancedSearch->SearchValue);
            $this->patienttype->PlaceHolder = RemoveHtml($this->patienttype->caption());

            // Referal
            $this->Referal->EditAttrs["class"] = "form-control";
            $this->Referal->EditCustomAttributes = "";
            if (!$this->Referal->Raw) {
                $this->Referal->AdvancedSearch->SearchValue = HtmlDecode($this->Referal->AdvancedSearch->SearchValue);
            }
            $this->Referal->EditValue = HtmlEncode($this->Referal->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->Referal->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->Referal->EditValue = $this->Referal->lookupCacheOption($curVal);
                if ($this->Referal->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Referal->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Referal->Lookup->renderViewRow($rswrk[0]);
                        $this->Referal->EditValue = $this->Referal->displayValue($arwrk);
                    } else {
                        $this->Referal->EditValue = HtmlEncode($this->Referal->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->Referal->EditValue = null;
            }
            $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->start_date->AdvancedSearch->SearchValue, 11), 11));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->start_date->AdvancedSearch->SearchValue2, 11), 11));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // DoctorName
            $this->DoctorName->EditAttrs["class"] = "form-control";
            $this->DoctorName->EditCustomAttributes = "";
            $curVal = trim(strval($this->DoctorName->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->DoctorName->AdvancedSearch->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
            } else {
                $this->DoctorName->AdvancedSearch->ViewValue = $this->DoctorName->Lookup !== null && is_array($this->DoctorName->Lookup->Options) ? $curVal : null;
            }
            if ($this->DoctorName->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DoctorName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DoctorName->EditValue = $arwrk;
            }
            $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Id
            $this->Id->EditAttrs["class"] = "form-control";
            $this->Id->EditCustomAttributes = "";
            $this->Id->EditValue = HtmlEncode($this->Id->AdvancedSearch->SearchValue);
            $this->Id->PlaceHolder = RemoveHtml($this->Id->caption());

            // PatientTypee
            $this->PatientTypee->EditAttrs["class"] = "form-control";
            $this->PatientTypee->EditCustomAttributes = "";
            if (!$this->PatientTypee->Raw) {
                $this->PatientTypee->AdvancedSearch->SearchValue = HtmlDecode($this->PatientTypee->AdvancedSearch->SearchValue);
            }
            $this->PatientTypee->EditValue = HtmlEncode($this->PatientTypee->AdvancedSearch->SearchValue);
            $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            if (!$this->Notes->Raw) {
                $this->Notes->AdvancedSearch->SearchValue = HtmlDecode($this->Notes->AdvancedSearch->SearchValue);
            }
            $this->Notes->EditValue = HtmlEncode($this->Notes->AdvancedSearch->SearchValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());
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
        if (!CheckDate($this->start_time->AdvancedSearch->SearchValue)) {
            $this->start_time->addErrorMessage($this->start_time->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->start_date->AdvancedSearch->SearchValue)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->start_date->AdvancedSearch->SearchValue2)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if (!CheckInteger($this->Id->AdvancedSearch->SearchValue)) {
            $this->Id->addErrorMessage($this->Id->getErrorMessage(false));
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
        $this->patientID->AdvancedSearch->load();
        $this->patientName->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->start_time->AdvancedSearch->load();
        $this->Purpose->AdvancedSearch->load();
        $this->patienttype->AdvancedSearch->load();
        $this->Referal->AdvancedSearch->load();
        $this->start_date->AdvancedSearch->load();
        $this->DoctorName->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->Id->AdvancedSearch->load();
        $this->PatientTypee->AdvancedSearch->load();
        $this->Notes->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewAppointmentSchedulerNewList"), "", $this->TableVar, true);
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
                case "x_Referal":
                    break;
                case "x_DoctorName":
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
