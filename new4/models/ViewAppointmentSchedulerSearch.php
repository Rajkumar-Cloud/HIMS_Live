<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewAppointmentSchedulerSearch extends ViewAppointmentScheduler
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_appointment_scheduler';

    // Page object name
    public $PageObjName = "ViewAppointmentSchedulerSearch";

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

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (view_appointment_scheduler)
        if (!isset($GLOBALS["view_appointment_scheduler"]) || get_class($GLOBALS["view_appointment_scheduler"]) == PROJECT_NAMESPACE . "view_appointment_scheduler") {
            $GLOBALS["view_appointment_scheduler"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_appointment_scheduler');
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
        if (Post("customexport") === null) {
             // Page Unload event
            if (method_exists($this, "pageUnload")) {
                $this->pageUnload();
            }

            // Global Page Unloaded event (in userfn*.php)
            Page_Unloaded();
        }

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            if (is_array(Session(SESSION_TEMP_IMAGES))) { // Restore temp images
                $TempImages = Session(SESSION_TEMP_IMAGES);
            }
            if (Post("data") !== null) {
                $content = Post("data");
            }
            $ExportFileName = Post("filename", "");
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("view_appointment_scheduler"));
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
        if ($this->CustomExport) { // Save temp images array for custom export
            if (is_array($TempImages)) {
                $_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
                    if ($pageName == "ViewAppointmentSchedulerView") {
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
        $this->patientID->setVisibility();
        $this->patientName->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Purpose->setVisibility();
        $this->PatientType->setVisibility();
        $this->Referal->setVisibility();
        $this->start_date->setVisibility();
        $this->DoctorName->setVisibility();
        $this->HospID->setVisibility();
        $this->end_date->setVisibility();
        $this->DoctorID->setVisibility();
        $this->DoctorCode->setVisibility();
        $this->Department->setVisibility();
        $this->AppointmentStatus->setVisibility();
        $this->status->setVisibility();
        $this->scheduler_id->setVisibility();
        $this->text->setVisibility();
        $this->appointment_status->setVisibility();
        $this->PId->setVisibility();
        $this->SchEmail->setVisibility();
        $this->appointment_type->setVisibility();
        $this->Notified->setVisibility();
        $this->Notes->setVisibility();
        $this->paymentType->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->createdBy->setVisibility();
        $this->createdDateTime->setVisibility();
        $this->PatientTypee->setVisibility();
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
        $this->setupLookupOptions($this->patientID);
        $this->setupLookupOptions($this->Referal);
        $this->setupLookupOptions($this->DoctorName);
        $this->setupLookupOptions($this->WhereDidYouHear);
        $this->setupLookupOptions($this->PatientTypee);

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
                    $srchStr = "ViewAppointmentSchedulerList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->patientID); // patientID
        $this->buildSearchUrl($srchUrl, $this->patientName); // patientName
        $this->buildSearchUrl($srchUrl, $this->MobileNumber); // MobileNumber
        $this->buildSearchUrl($srchUrl, $this->Purpose); // Purpose
        $this->buildSearchUrl($srchUrl, $this->PatientType); // PatientType
        $this->buildSearchUrl($srchUrl, $this->Referal); // Referal
        $this->buildSearchUrl($srchUrl, $this->start_date); // start_date
        $this->buildSearchUrl($srchUrl, $this->DoctorName); // DoctorName
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->end_date); // end_date
        $this->buildSearchUrl($srchUrl, $this->DoctorID); // DoctorID
        $this->buildSearchUrl($srchUrl, $this->DoctorCode); // DoctorCode
        $this->buildSearchUrl($srchUrl, $this->Department); // Department
        $this->buildSearchUrl($srchUrl, $this->AppointmentStatus); // AppointmentStatus
        $this->buildSearchUrl($srchUrl, $this->status); // status
        $this->buildSearchUrl($srchUrl, $this->scheduler_id); // scheduler_id
        $this->buildSearchUrl($srchUrl, $this->text); // text
        $this->buildSearchUrl($srchUrl, $this->appointment_status); // appointment_status
        $this->buildSearchUrl($srchUrl, $this->PId); // PId
        $this->buildSearchUrl($srchUrl, $this->SchEmail); // SchEmail
        $this->buildSearchUrl($srchUrl, $this->appointment_type); // appointment_type
        $this->buildSearchUrl($srchUrl, $this->Notified); // Notified
        $this->buildSearchUrl($srchUrl, $this->Notes); // Notes
        $this->buildSearchUrl($srchUrl, $this->paymentType); // paymentType
        $this->buildSearchUrl($srchUrl, $this->WhereDidYouHear); // WhereDidYouHear
        $this->buildSearchUrl($srchUrl, $this->createdBy); // createdBy
        $this->buildSearchUrl($srchUrl, $this->createdDateTime); // createdDateTime
        $this->buildSearchUrl($srchUrl, $this->PatientTypee); // PatientTypee
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
        if ($this->patientID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->patientName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MobileNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Purpose->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientType->AdvancedSearch->post()) {
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
        if ($this->end_date->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DoctorID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DoctorCode->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Department->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AppointmentStatus->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->status->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->status->AdvancedSearch->SearchValue)) {
            $this->status->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->status->AdvancedSearch->SearchValue);
        }
        if (is_array($this->status->AdvancedSearch->SearchValue2)) {
            $this->status->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->status->AdvancedSearch->SearchValue2);
        }
        if ($this->scheduler_id->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->text->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->appointment_status->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SchEmail->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->appointment_type->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Notified->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->Notified->AdvancedSearch->SearchValue)) {
            $this->Notified->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Notified->AdvancedSearch->SearchValue);
        }
        if (is_array($this->Notified->AdvancedSearch->SearchValue2)) {
            $this->Notified->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Notified->AdvancedSearch->SearchValue2);
        }
        if ($this->Notes->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->paymentType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->WhereDidYouHear->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue)) {
            $this->WhereDidYouHear->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->WhereDidYouHear->AdvancedSearch->SearchValue);
        }
        if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue2)) {
            $this->WhereDidYouHear->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->WhereDidYouHear->AdvancedSearch->SearchValue2);
        }
        if ($this->createdBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createdDateTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientTypee->AdvancedSearch->post()) {
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

        // patientID

        // patientName

        // MobileNumber

        // Purpose

        // PatientType

        // Referal

        // start_date

        // DoctorName

        // HospID

        // end_date

        // DoctorID

        // DoctorCode

        // Department

        // AppointmentStatus

        // status

        // scheduler_id

        // text

        // appointment_status

        // PId

        // SchEmail

        // appointment_type

        // Notified

        // Notes

        // paymentType

        // WhereDidYouHear

        // createdBy

        // createdDateTime

        // PatientTypee
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // patientID
            $curVal = trim(strval($this->patientID->CurrentValue));
            if ($curVal != "") {
                $this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
                if ($this->patientID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->patientID->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                        $this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
                    } else {
                        $this->patientID->ViewValue = $this->patientID->CurrentValue;
                    }
                }
            } else {
                $this->patientID->ViewValue = null;
            }
            $this->patientID->ViewCustomAttributes = "";

            // patientName
            $this->patientName->ViewValue = $this->patientName->CurrentValue;
            $this->patientName->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Purpose
            $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
            $this->Purpose->ViewCustomAttributes = "";

            // PatientType
            if (strval($this->PatientType->CurrentValue) != "") {
                $this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
            } else {
                $this->PatientType->ViewValue = null;
            }
            $this->PatientType->ViewCustomAttributes = "";

            // Referal
            if ($this->Referal->VirtualValue != "") {
                $this->Referal->ViewValue = $this->Referal->VirtualValue;
            } else {
                $curVal = trim(strval($this->Referal->CurrentValue));
                if ($curVal != "") {
                    $this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
                    if ($this->Referal->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
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

            // end_date
            $this->end_date->ViewValue = $this->end_date->CurrentValue;
            $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
            $this->end_date->ViewCustomAttributes = "";

            // DoctorID
            $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
            $this->DoctorID->ViewCustomAttributes = "";

            // DoctorCode
            $this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
            $this->DoctorCode->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // AppointmentStatus
            $this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
            $this->AppointmentStatus->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->status->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // scheduler_id
            $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // text
            $this->text->ViewValue = $this->text->CurrentValue;
            $this->text->ViewCustomAttributes = "";

            // appointment_status
            $this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
            $this->appointment_status->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // SchEmail
            $this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
            $this->SchEmail->ViewCustomAttributes = "";

            // appointment_type
            if (strval($this->appointment_type->CurrentValue) != "") {
                $this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
            } else {
                $this->appointment_type->ViewValue = null;
            }
            $this->appointment_type->ViewCustomAttributes = "";

            // Notified
            if (strval($this->Notified->CurrentValue) != "") {
                $this->Notified->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Notified->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Notified->ViewValue = null;
            }
            $this->Notified->ViewCustomAttributes = "";

            // Notes
            $this->Notes->ViewValue = $this->Notes->CurrentValue;
            $this->Notes->ViewCustomAttributes = "";

            // paymentType
            $this->paymentType->ViewValue = $this->paymentType->CurrentValue;
            $this->paymentType->ViewCustomAttributes = "";

            // WhereDidYouHear
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
                if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->WhereDidYouHear->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                            $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                        }
                    } else {
                        $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                    }
                }
            } else {
                $this->WhereDidYouHear->ViewValue = null;
            }
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // createdBy
            $this->createdBy->ViewValue = $this->createdBy->CurrentValue;
            $this->createdBy->ViewCustomAttributes = "";

            // createdDateTime
            $this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
            $this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
            $this->createdDateTime->ViewCustomAttributes = "";

            // PatientTypee
            $curVal = trim(strval($this->PatientTypee->CurrentValue));
            if ($curVal != "") {
                $this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
                if ($this->PatientTypee->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PatientTypee->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientTypee->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
                    } else {
                        $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
                    }
                }
            } else {
                $this->PatientTypee->ViewValue = null;
            }
            $this->PatientTypee->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";
            $this->Purpose->TooltipValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";
            $this->PatientType->TooltipValue = "";

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

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";
            $this->end_date->TooltipValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";
            $this->DoctorID->TooltipValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";
            $this->DoctorCode->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";
            $this->AppointmentStatus->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";
            $this->text->TooltipValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";
            $this->appointment_status->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";
            $this->SchEmail->TooltipValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";
            $this->appointment_type->TooltipValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";
            $this->Notified->TooltipValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
            $this->Notes->TooltipValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";
            $this->paymentType->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";
            $this->createdBy->TooltipValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";
            $this->createdDateTime->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
            $this->PatientTypee->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // patientID
            $this->patientID->EditCustomAttributes = "";
            $curVal = trim(strval($this->patientID->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->patientID->AdvancedSearch->ViewValue = $this->patientID->lookupCacheOption($curVal);
            } else {
                $this->patientID->AdvancedSearch->ViewValue = $this->patientID->Lookup !== null && is_array($this->patientID->Lookup->Options) ? $curVal : null;
            }
            if ($this->patientID->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
                if ($this->patientID->AdvancedSearch->ViewValue == "") {
                    $this->patientID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`PatientID`" . SearchString("=", $this->patientID->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`HospID`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->patientID->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->patientID->Lookup->renderViewRow($rswrk[0]);
                    $this->patientID->AdvancedSearch->ViewValue = $this->patientID->displayValue($arwrk);
                } else {
                    $this->patientID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->patientID->EditValue = $arwrk;
            }
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

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            if (!$this->Purpose->Raw) {
                $this->Purpose->AdvancedSearch->SearchValue = HtmlDecode($this->Purpose->AdvancedSearch->SearchValue);
            }
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->AdvancedSearch->SearchValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // PatientType
            $this->PatientType->EditCustomAttributes = "";
            $this->PatientType->EditValue = $this->PatientType->options(false);
            $this->PatientType->PlaceHolder = RemoveHtml($this->PatientType->caption());

            // Referal
            $this->Referal->EditAttrs["class"] = "form-control";
            $this->Referal->EditCustomAttributes = "";
            if (!$this->Referal->Raw) {
                $this->Referal->AdvancedSearch->SearchValue = HtmlDecode($this->Referal->AdvancedSearch->SearchValue);
            }
            $this->Referal->EditValue = HtmlEncode($this->Referal->AdvancedSearch->SearchValue);
            $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->start_date->AdvancedSearch->SearchValue, 11), 11));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // DoctorName
            $this->DoctorName->EditCustomAttributes = "";
            $curVal = trim(strval($this->DoctorName->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->DoctorName->AdvancedSearch->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
            } else {
                $this->DoctorName->AdvancedSearch->ViewValue = $this->DoctorName->Lookup !== null && is_array($this->DoctorName->Lookup->Options) ? $curVal : null;
            }
            if ($this->DoctorName->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
                if ($this->DoctorName->AdvancedSearch->ViewValue == "") {
                    $this->DoctorName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DoctorName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DoctorName->Lookup->renderViewRow($rswrk[0]);
                    $this->DoctorName->AdvancedSearch->ViewValue = $this->DoctorName->displayValue($arwrk);
                } else {
                    $this->DoctorName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DoctorName->EditValue = $arwrk;
            }
            $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // end_date
            $this->end_date->EditAttrs["class"] = "form-control";
            $this->end_date->EditCustomAttributes = "";
            $this->end_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->end_date->AdvancedSearch->SearchValue, 11), 11));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // DoctorID
            $this->DoctorID->EditAttrs["class"] = "form-control";
            $this->DoctorID->EditCustomAttributes = "";
            $this->DoctorID->EditValue = HtmlEncode($this->DoctorID->AdvancedSearch->SearchValue);
            $this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());

            // DoctorCode
            $this->DoctorCode->EditAttrs["class"] = "form-control";
            $this->DoctorCode->EditCustomAttributes = "";
            if (!$this->DoctorCode->Raw) {
                $this->DoctorCode->AdvancedSearch->SearchValue = HtmlDecode($this->DoctorCode->AdvancedSearch->SearchValue);
            }
            $this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->AdvancedSearch->SearchValue);
            $this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->AdvancedSearch->SearchValue = HtmlDecode($this->Department->AdvancedSearch->SearchValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->AdvancedSearch->SearchValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // AppointmentStatus
            $this->AppointmentStatus->EditAttrs["class"] = "form-control";
            $this->AppointmentStatus->EditCustomAttributes = "";
            if (!$this->AppointmentStatus->Raw) {
                $this->AppointmentStatus->AdvancedSearch->SearchValue = HtmlDecode($this->AppointmentStatus->AdvancedSearch->SearchValue);
            }
            $this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->AdvancedSearch->SearchValue);
            $this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // scheduler_id
            $this->scheduler_id->EditAttrs["class"] = "form-control";
            $this->scheduler_id->EditCustomAttributes = "";
            if (!$this->scheduler_id->Raw) {
                $this->scheduler_id->AdvancedSearch->SearchValue = HtmlDecode($this->scheduler_id->AdvancedSearch->SearchValue);
            }
            $this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->AdvancedSearch->SearchValue);
            $this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

            // text
            $this->text->EditAttrs["class"] = "form-control";
            $this->text->EditCustomAttributes = "";
            if (!$this->text->Raw) {
                $this->text->AdvancedSearch->SearchValue = HtmlDecode($this->text->AdvancedSearch->SearchValue);
            }
            $this->text->EditValue = HtmlEncode($this->text->AdvancedSearch->SearchValue);
            $this->text->PlaceHolder = RemoveHtml($this->text->caption());

            // appointment_status
            $this->appointment_status->EditAttrs["class"] = "form-control";
            $this->appointment_status->EditCustomAttributes = "";
            if (!$this->appointment_status->Raw) {
                $this->appointment_status->AdvancedSearch->SearchValue = HtmlDecode($this->appointment_status->AdvancedSearch->SearchValue);
            }
            $this->appointment_status->EditValue = HtmlEncode($this->appointment_status->AdvancedSearch->SearchValue);
            $this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->AdvancedSearch->SearchValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

            // SchEmail
            $this->SchEmail->EditAttrs["class"] = "form-control";
            $this->SchEmail->EditCustomAttributes = "";
            if (!$this->SchEmail->Raw) {
                $this->SchEmail->AdvancedSearch->SearchValue = HtmlDecode($this->SchEmail->AdvancedSearch->SearchValue);
            }
            $this->SchEmail->EditValue = HtmlEncode($this->SchEmail->AdvancedSearch->SearchValue);
            $this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

            // appointment_type
            $this->appointment_type->EditCustomAttributes = "";
            $this->appointment_type->EditValue = $this->appointment_type->options(false);
            $this->appointment_type->PlaceHolder = RemoveHtml($this->appointment_type->caption());

            // Notified
            $this->Notified->EditCustomAttributes = "";
            $this->Notified->EditValue = $this->Notified->options(false);
            $this->Notified->PlaceHolder = RemoveHtml($this->Notified->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            if (!$this->Notes->Raw) {
                $this->Notes->AdvancedSearch->SearchValue = HtmlDecode($this->Notes->AdvancedSearch->SearchValue);
            }
            $this->Notes->EditValue = HtmlEncode($this->Notes->AdvancedSearch->SearchValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

            // paymentType
            $this->paymentType->EditAttrs["class"] = "form-control";
            $this->paymentType->EditCustomAttributes = "";
            if (!$this->paymentType->Raw) {
                $this->paymentType->AdvancedSearch->SearchValue = HtmlDecode($this->paymentType->AdvancedSearch->SearchValue);
            }
            $this->paymentType->EditValue = HtmlEncode($this->paymentType->AdvancedSearch->SearchValue);
            $this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditCustomAttributes = "";
            $curVal = trim(strval($this->WhereDidYouHear->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->AdvancedSearch->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            } else {
                $this->WhereDidYouHear->AdvancedSearch->ViewValue = $this->WhereDidYouHear->Lookup !== null && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : null;
            }
            if ($this->WhereDidYouHear->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
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
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->WhereDidYouHear->EditValue = $arwrk;
            }
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // createdBy
            $this->createdBy->EditAttrs["class"] = "form-control";
            $this->createdBy->EditCustomAttributes = "";
            if (!$this->createdBy->Raw) {
                $this->createdBy->AdvancedSearch->SearchValue = HtmlDecode($this->createdBy->AdvancedSearch->SearchValue);
            }
            $this->createdBy->EditValue = HtmlEncode($this->createdBy->AdvancedSearch->SearchValue);
            $this->createdBy->PlaceHolder = RemoveHtml($this->createdBy->caption());

            // createdDateTime
            $this->createdDateTime->EditAttrs["class"] = "form-control";
            $this->createdDateTime->EditCustomAttributes = "";
            $this->createdDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createdDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->createdDateTime->PlaceHolder = RemoveHtml($this->createdDateTime->caption());

            // PatientTypee
            $this->PatientTypee->EditAttrs["class"] = "form-control";
            $this->PatientTypee->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientTypee->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PatientTypee->AdvancedSearch->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
            } else {
                $this->PatientTypee->AdvancedSearch->ViewValue = $this->PatientTypee->Lookup !== null && is_array($this->PatientTypee->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientTypee->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PatientTypee->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PatientTypee->EditValue = $arwrk;
            }
            $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());
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
        if (!CheckEuroDate($this->start_date->AdvancedSearch->SearchValue)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->end_date->AdvancedSearch->SearchValue)) {
            $this->end_date->addErrorMessage($this->end_date->getErrorMessage(false));
        }
        if (!CheckInteger($this->PId->AdvancedSearch->SearchValue)) {
            $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
        }
        if (!CheckDate($this->createdDateTime->AdvancedSearch->SearchValue)) {
            $this->createdDateTime->addErrorMessage($this->createdDateTime->getErrorMessage(false));
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
        $this->patientID->AdvancedSearch->load();
        $this->patientName->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->Purpose->AdvancedSearch->load();
        $this->PatientType->AdvancedSearch->load();
        $this->Referal->AdvancedSearch->load();
        $this->start_date->AdvancedSearch->load();
        $this->DoctorName->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->end_date->AdvancedSearch->load();
        $this->DoctorID->AdvancedSearch->load();
        $this->DoctorCode->AdvancedSearch->load();
        $this->Department->AdvancedSearch->load();
        $this->AppointmentStatus->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->scheduler_id->AdvancedSearch->load();
        $this->text->AdvancedSearch->load();
        $this->appointment_status->AdvancedSearch->load();
        $this->PId->AdvancedSearch->load();
        $this->SchEmail->AdvancedSearch->load();
        $this->appointment_type->AdvancedSearch->load();
        $this->Notified->AdvancedSearch->load();
        $this->Notes->AdvancedSearch->load();
        $this->paymentType->AdvancedSearch->load();
        $this->WhereDidYouHear->AdvancedSearch->load();
        $this->createdBy->AdvancedSearch->load();
        $this->createdDateTime->AdvancedSearch->load();
        $this->PatientTypee->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewAppointmentSchedulerList"), "", $this->TableVar, true);
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
                case "x_patientID":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_PatientType":
                    break;
                case "x_Referal":
                    break;
                case "x_DoctorName":
                    break;
                case "x_status":
                    break;
                case "x_appointment_type":
                    break;
                case "x_Notified":
                    break;
                case "x_WhereDidYouHear":
                    break;
                case "x_PatientTypee":
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
