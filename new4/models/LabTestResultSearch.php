<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabTestResultSearch extends LabTestResult
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_test_result';

    // Page object name
    public $PageObjName = "LabTestResultSearch";

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

        // Table object (lab_test_result)
        if (!isset($GLOBALS["lab_test_result"]) || get_class($GLOBALS["lab_test_result"]) == PROJECT_NAMESPACE . "lab_test_result") {
            $GLOBALS["lab_test_result"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_result');
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
                $doc = new $class(Container("lab_test_result"));
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
                    if ($pageName == "LabTestResultView") {
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
        $this->Branch->setVisibility();
        $this->SidNo->setVisibility();
        $this->SidDate->setVisibility();
        $this->TestCd->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->DEptCd->setVisibility();
        $this->ProfCd->setVisibility();
        $this->LabReport->setVisibility();
        $this->ResultDate->setVisibility();
        $this->Comments->setVisibility();
        $this->Method->setVisibility();
        $this->Specimen->setVisibility();
        $this->Amount->setVisibility();
        $this->ResultBy->setVisibility();
        $this->AuthBy->setVisibility();
        $this->AuthDate->setVisibility();
        $this->Abnormal->setVisibility();
        $this->Printed->setVisibility();
        $this->Dispatch->setVisibility();
        $this->LOWHIGH->setVisibility();
        $this->RefValue->setVisibility();
        $this->Unit->setVisibility();
        $this->ResDate->setVisibility();
        $this->Pic1->setVisibility();
        $this->Pic2->setVisibility();
        $this->GraphPath->setVisibility();
        $this->SampleDate->setVisibility();
        $this->SampleUser->setVisibility();
        $this->ReceivedDate->setVisibility();
        $this->ReceivedUser->setVisibility();
        $this->DeptRecvDate->setVisibility();
        $this->DeptRecvUser->setVisibility();
        $this->PrintBy->setVisibility();
        $this->PrintDate->setVisibility();
        $this->MachineCD->setVisibility();
        $this->TestCancel->setVisibility();
        $this->OutSource->setVisibility();
        $this->Tariff->setVisibility();
        $this->EDITDATE->setVisibility();
        $this->UPLOAD->setVisibility();
        $this->SAuthDate->setVisibility();
        $this->SAuthBy->setVisibility();
        $this->NoRC->setVisibility();
        $this->DispDt->setVisibility();
        $this->DispUser->setVisibility();
        $this->DispRemarks->setVisibility();
        $this->DispMode->setVisibility();
        $this->ProductCD->setVisibility();
        $this->Nos->setVisibility();
        $this->WBCPath->setVisibility();
        $this->RBCPath->setVisibility();
        $this->PTPath->setVisibility();
        $this->ActualAmt->setVisibility();
        $this->NoSign->setVisibility();
        $this->_Barcode->setVisibility();
        $this->ReadTime->setVisibility();
        $this->Result->setVisibility();
        $this->VailID->setVisibility();
        $this->ReadMachine->setVisibility();
        $this->LabCD->setVisibility();
        $this->OutLabAmt->setVisibility();
        $this->ProductQty->setVisibility();
        $this->Repeat->setVisibility();
        $this->DeptNo->setVisibility();
        $this->Desc1->setVisibility();
        $this->Desc2->setVisibility();
        $this->RptResult->setVisibility();
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
                    $srchStr = "LabTestResultList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->Branch); // Branch
        $this->buildSearchUrl($srchUrl, $this->SidNo); // SidNo
        $this->buildSearchUrl($srchUrl, $this->SidDate); // SidDate
        $this->buildSearchUrl($srchUrl, $this->TestCd); // TestCd
        $this->buildSearchUrl($srchUrl, $this->TestSubCd); // TestSubCd
        $this->buildSearchUrl($srchUrl, $this->DEptCd); // DEptCd
        $this->buildSearchUrl($srchUrl, $this->ProfCd); // ProfCd
        $this->buildSearchUrl($srchUrl, $this->LabReport); // LabReport
        $this->buildSearchUrl($srchUrl, $this->ResultDate); // ResultDate
        $this->buildSearchUrl($srchUrl, $this->Comments); // Comments
        $this->buildSearchUrl($srchUrl, $this->Method); // Method
        $this->buildSearchUrl($srchUrl, $this->Specimen); // Specimen
        $this->buildSearchUrl($srchUrl, $this->Amount); // Amount
        $this->buildSearchUrl($srchUrl, $this->ResultBy); // ResultBy
        $this->buildSearchUrl($srchUrl, $this->AuthBy); // AuthBy
        $this->buildSearchUrl($srchUrl, $this->AuthDate); // AuthDate
        $this->buildSearchUrl($srchUrl, $this->Abnormal); // Abnormal
        $this->buildSearchUrl($srchUrl, $this->Printed); // Printed
        $this->buildSearchUrl($srchUrl, $this->Dispatch); // Dispatch
        $this->buildSearchUrl($srchUrl, $this->LOWHIGH); // LOWHIGH
        $this->buildSearchUrl($srchUrl, $this->RefValue); // RefValue
        $this->buildSearchUrl($srchUrl, $this->Unit); // Unit
        $this->buildSearchUrl($srchUrl, $this->ResDate); // ResDate
        $this->buildSearchUrl($srchUrl, $this->Pic1); // Pic1
        $this->buildSearchUrl($srchUrl, $this->Pic2); // Pic2
        $this->buildSearchUrl($srchUrl, $this->GraphPath); // GraphPath
        $this->buildSearchUrl($srchUrl, $this->SampleDate); // SampleDate
        $this->buildSearchUrl($srchUrl, $this->SampleUser); // SampleUser
        $this->buildSearchUrl($srchUrl, $this->ReceivedDate); // ReceivedDate
        $this->buildSearchUrl($srchUrl, $this->ReceivedUser); // ReceivedUser
        $this->buildSearchUrl($srchUrl, $this->DeptRecvDate); // DeptRecvDate
        $this->buildSearchUrl($srchUrl, $this->DeptRecvUser); // DeptRecvUser
        $this->buildSearchUrl($srchUrl, $this->PrintBy); // PrintBy
        $this->buildSearchUrl($srchUrl, $this->PrintDate); // PrintDate
        $this->buildSearchUrl($srchUrl, $this->MachineCD); // MachineCD
        $this->buildSearchUrl($srchUrl, $this->TestCancel); // TestCancel
        $this->buildSearchUrl($srchUrl, $this->OutSource); // OutSource
        $this->buildSearchUrl($srchUrl, $this->Tariff); // Tariff
        $this->buildSearchUrl($srchUrl, $this->EDITDATE); // EDITDATE
        $this->buildSearchUrl($srchUrl, $this->UPLOAD); // UPLOAD
        $this->buildSearchUrl($srchUrl, $this->SAuthDate); // SAuthDate
        $this->buildSearchUrl($srchUrl, $this->SAuthBy); // SAuthBy
        $this->buildSearchUrl($srchUrl, $this->NoRC); // NoRC
        $this->buildSearchUrl($srchUrl, $this->DispDt); // DispDt
        $this->buildSearchUrl($srchUrl, $this->DispUser); // DispUser
        $this->buildSearchUrl($srchUrl, $this->DispRemarks); // DispRemarks
        $this->buildSearchUrl($srchUrl, $this->DispMode); // DispMode
        $this->buildSearchUrl($srchUrl, $this->ProductCD); // ProductCD
        $this->buildSearchUrl($srchUrl, $this->Nos); // Nos
        $this->buildSearchUrl($srchUrl, $this->WBCPath); // WBCPath
        $this->buildSearchUrl($srchUrl, $this->RBCPath); // RBCPath
        $this->buildSearchUrl($srchUrl, $this->PTPath); // PTPath
        $this->buildSearchUrl($srchUrl, $this->ActualAmt); // ActualAmt
        $this->buildSearchUrl($srchUrl, $this->NoSign); // NoSign
        $this->buildSearchUrl($srchUrl, $this->_Barcode); // Barcode
        $this->buildSearchUrl($srchUrl, $this->ReadTime); // ReadTime
        $this->buildSearchUrl($srchUrl, $this->Result); // Result
        $this->buildSearchUrl($srchUrl, $this->VailID); // VailID
        $this->buildSearchUrl($srchUrl, $this->ReadMachine); // ReadMachine
        $this->buildSearchUrl($srchUrl, $this->LabCD); // LabCD
        $this->buildSearchUrl($srchUrl, $this->OutLabAmt); // OutLabAmt
        $this->buildSearchUrl($srchUrl, $this->ProductQty); // ProductQty
        $this->buildSearchUrl($srchUrl, $this->Repeat); // Repeat
        $this->buildSearchUrl($srchUrl, $this->DeptNo); // DeptNo
        $this->buildSearchUrl($srchUrl, $this->Desc1); // Desc1
        $this->buildSearchUrl($srchUrl, $this->Desc2); // Desc2
        $this->buildSearchUrl($srchUrl, $this->RptResult); // RptResult
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
        if ($this->Branch->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SidNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SidDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TestCd->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TestSubCd->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DEptCd->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProfCd->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LabReport->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResultDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Comments->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Method->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Specimen->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Amount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResultBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AuthBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AuthDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Abnormal->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Printed->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Dispatch->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LOWHIGH->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RefValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Unit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Pic1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Pic2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->GraphPath->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SampleDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SampleUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReceivedDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReceivedUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DeptRecvDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DeptRecvUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrintBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrintDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->MachineCD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TestCancel->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OutSource->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Tariff->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EDITDATE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->UPLOAD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SAuthDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SAuthBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NoRC->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DispDt->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DispUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DispRemarks->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DispMode->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProductCD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Nos->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->WBCPath->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RBCPath->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PTPath->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ActualAmt->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NoSign->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->_Barcode->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReadTime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Result->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->VailID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReadMachine->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LabCD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OutLabAmt->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProductQty->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Repeat->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DeptNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Desc1->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Desc2->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RptResult->AdvancedSearch->post()) {
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
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Tariff->FormValue == $this->Tariff->CurrentValue && is_numeric(ConvertToFloatString($this->Tariff->CurrentValue))) {
            $this->Tariff->CurrentValue = ConvertToFloatString($this->Tariff->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Nos->FormValue == $this->Nos->CurrentValue && is_numeric(ConvertToFloatString($this->Nos->CurrentValue))) {
            $this->Nos->CurrentValue = ConvertToFloatString($this->Nos->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue))) {
            $this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OutLabAmt->FormValue == $this->OutLabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->OutLabAmt->CurrentValue))) {
            $this->OutLabAmt->CurrentValue = ConvertToFloatString($this->OutLabAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ProductQty->FormValue == $this->ProductQty->CurrentValue && is_numeric(ConvertToFloatString($this->ProductQty->CurrentValue))) {
            $this->ProductQty->CurrentValue = ConvertToFloatString($this->ProductQty->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Branch

        // SidNo

        // SidDate

        // TestCd

        // TestSubCd

        // DEptCd

        // ProfCd

        // LabReport

        // ResultDate

        // Comments

        // Method

        // Specimen

        // Amount

        // ResultBy

        // AuthBy

        // AuthDate

        // Abnormal

        // Printed

        // Dispatch

        // LOWHIGH

        // RefValue

        // Unit

        // ResDate

        // Pic1

        // Pic2

        // GraphPath

        // SampleDate

        // SampleUser

        // ReceivedDate

        // ReceivedUser

        // DeptRecvDate

        // DeptRecvUser

        // PrintBy

        // PrintDate

        // MachineCD

        // TestCancel

        // OutSource

        // Tariff

        // EDITDATE

        // UPLOAD

        // SAuthDate

        // SAuthBy

        // NoRC

        // DispDt

        // DispUser

        // DispRemarks

        // DispMode

        // ProductCD

        // Nos

        // WBCPath

        // RBCPath

        // PTPath

        // ActualAmt

        // NoSign

        // Barcode

        // ReadTime

        // Result

        // VailID

        // ReadMachine

        // LabCD

        // OutLabAmt

        // ProductQty

        // Repeat

        // DeptNo

        // Desc1

        // Desc2

        // RptResult
        if ($this->RowType == ROWTYPE_VIEW) {
            // Branch
            $this->Branch->ViewValue = $this->Branch->CurrentValue;
            $this->Branch->ViewCustomAttributes = "";

            // SidNo
            $this->SidNo->ViewValue = $this->SidNo->CurrentValue;
            $this->SidNo->ViewCustomAttributes = "";

            // SidDate
            $this->SidDate->ViewValue = $this->SidDate->CurrentValue;
            $this->SidDate->ViewValue = FormatDateTime($this->SidDate->ViewValue, 0);
            $this->SidDate->ViewCustomAttributes = "";

            // TestCd
            $this->TestCd->ViewValue = $this->TestCd->CurrentValue;
            $this->TestCd->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // DEptCd
            $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
            $this->DEptCd->ViewCustomAttributes = "";

            // ProfCd
            $this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
            $this->ProfCd->ViewCustomAttributes = "";

            // LabReport
            $this->LabReport->ViewValue = $this->LabReport->CurrentValue;
            $this->LabReport->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // Comments
            $this->Comments->ViewValue = $this->Comments->CurrentValue;
            $this->Comments->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Specimen
            $this->Specimen->ViewValue = $this->Specimen->CurrentValue;
            $this->Specimen->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // ResultBy
            $this->ResultBy->ViewValue = $this->ResultBy->CurrentValue;
            $this->ResultBy->ViewCustomAttributes = "";

            // AuthBy
            $this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
            $this->AuthBy->ViewCustomAttributes = "";

            // AuthDate
            $this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
            $this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
            $this->AuthDate->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // Printed
            $this->Printed->ViewValue = $this->Printed->CurrentValue;
            $this->Printed->ViewCustomAttributes = "";

            // Dispatch
            $this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
            $this->Dispatch->ViewCustomAttributes = "";

            // LOWHIGH
            $this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
            $this->LOWHIGH->ViewCustomAttributes = "";

            // RefValue
            $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
            $this->RefValue->ViewCustomAttributes = "";

            // Unit
            $this->Unit->ViewValue = $this->Unit->CurrentValue;
            $this->Unit->ViewCustomAttributes = "";

            // ResDate
            $this->ResDate->ViewValue = $this->ResDate->CurrentValue;
            $this->ResDate->ViewValue = FormatDateTime($this->ResDate->ViewValue, 0);
            $this->ResDate->ViewCustomAttributes = "";

            // Pic1
            $this->Pic1->ViewValue = $this->Pic1->CurrentValue;
            $this->Pic1->ViewCustomAttributes = "";

            // Pic2
            $this->Pic2->ViewValue = $this->Pic2->CurrentValue;
            $this->Pic2->ViewCustomAttributes = "";

            // GraphPath
            $this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
            $this->GraphPath->ViewCustomAttributes = "";

            // SampleDate
            $this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
            $this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
            $this->SampleDate->ViewCustomAttributes = "";

            // SampleUser
            $this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
            $this->SampleUser->ViewCustomAttributes = "";

            // ReceivedDate
            $this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
            $this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
            $this->ReceivedDate->ViewCustomAttributes = "";

            // ReceivedUser
            $this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
            $this->ReceivedUser->ViewCustomAttributes = "";

            // DeptRecvDate
            $this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
            $this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
            $this->DeptRecvDate->ViewCustomAttributes = "";

            // DeptRecvUser
            $this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
            $this->DeptRecvUser->ViewCustomAttributes = "";

            // PrintBy
            $this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
            $this->PrintBy->ViewCustomAttributes = "";

            // PrintDate
            $this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
            $this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
            $this->PrintDate->ViewCustomAttributes = "";

            // MachineCD
            $this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
            $this->MachineCD->ViewCustomAttributes = "";

            // TestCancel
            $this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
            $this->TestCancel->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // Tariff
            $this->Tariff->ViewValue = $this->Tariff->CurrentValue;
            $this->Tariff->ViewValue = FormatNumber($this->Tariff->ViewValue, 2, -2, -2, -2);
            $this->Tariff->ViewCustomAttributes = "";

            // EDITDATE
            $this->EDITDATE->ViewValue = $this->EDITDATE->CurrentValue;
            $this->EDITDATE->ViewValue = FormatDateTime($this->EDITDATE->ViewValue, 0);
            $this->EDITDATE->ViewCustomAttributes = "";

            // UPLOAD
            $this->UPLOAD->ViewValue = $this->UPLOAD->CurrentValue;
            $this->UPLOAD->ViewCustomAttributes = "";

            // SAuthDate
            $this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
            $this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
            $this->SAuthDate->ViewCustomAttributes = "";

            // SAuthBy
            $this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
            $this->SAuthBy->ViewCustomAttributes = "";

            // NoRC
            $this->NoRC->ViewValue = $this->NoRC->CurrentValue;
            $this->NoRC->ViewCustomAttributes = "";

            // DispDt
            $this->DispDt->ViewValue = $this->DispDt->CurrentValue;
            $this->DispDt->ViewValue = FormatDateTime($this->DispDt->ViewValue, 0);
            $this->DispDt->ViewCustomAttributes = "";

            // DispUser
            $this->DispUser->ViewValue = $this->DispUser->CurrentValue;
            $this->DispUser->ViewCustomAttributes = "";

            // DispRemarks
            $this->DispRemarks->ViewValue = $this->DispRemarks->CurrentValue;
            $this->DispRemarks->ViewCustomAttributes = "";

            // DispMode
            $this->DispMode->ViewValue = $this->DispMode->CurrentValue;
            $this->DispMode->ViewCustomAttributes = "";

            // ProductCD
            $this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
            $this->ProductCD->ViewCustomAttributes = "";

            // Nos
            $this->Nos->ViewValue = $this->Nos->CurrentValue;
            $this->Nos->ViewValue = FormatNumber($this->Nos->ViewValue, 2, -2, -2, -2);
            $this->Nos->ViewCustomAttributes = "";

            // WBCPath
            $this->WBCPath->ViewValue = $this->WBCPath->CurrentValue;
            $this->WBCPath->ViewCustomAttributes = "";

            // RBCPath
            $this->RBCPath->ViewValue = $this->RBCPath->CurrentValue;
            $this->RBCPath->ViewCustomAttributes = "";

            // PTPath
            $this->PTPath->ViewValue = $this->PTPath->CurrentValue;
            $this->PTPath->ViewCustomAttributes = "";

            // ActualAmt
            $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
            $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
            $this->ActualAmt->ViewCustomAttributes = "";

            // NoSign
            $this->NoSign->ViewValue = $this->NoSign->CurrentValue;
            $this->NoSign->ViewCustomAttributes = "";

            // Barcode
            $this->_Barcode->ViewValue = $this->_Barcode->CurrentValue;
            $this->_Barcode->ViewCustomAttributes = "";

            // ReadTime
            $this->ReadTime->ViewValue = $this->ReadTime->CurrentValue;
            $this->ReadTime->ViewValue = FormatDateTime($this->ReadTime->ViewValue, 0);
            $this->ReadTime->ViewCustomAttributes = "";

            // Result
            $this->Result->ViewValue = $this->Result->CurrentValue;
            $this->Result->ViewCustomAttributes = "";

            // VailID
            $this->VailID->ViewValue = $this->VailID->CurrentValue;
            $this->VailID->ViewCustomAttributes = "";

            // ReadMachine
            $this->ReadMachine->ViewValue = $this->ReadMachine->CurrentValue;
            $this->ReadMachine->ViewCustomAttributes = "";

            // LabCD
            $this->LabCD->ViewValue = $this->LabCD->CurrentValue;
            $this->LabCD->ViewCustomAttributes = "";

            // OutLabAmt
            $this->OutLabAmt->ViewValue = $this->OutLabAmt->CurrentValue;
            $this->OutLabAmt->ViewValue = FormatNumber($this->OutLabAmt->ViewValue, 2, -2, -2, -2);
            $this->OutLabAmt->ViewCustomAttributes = "";

            // ProductQty
            $this->ProductQty->ViewValue = $this->ProductQty->CurrentValue;
            $this->ProductQty->ViewValue = FormatNumber($this->ProductQty->ViewValue, 2, -2, -2, -2);
            $this->ProductQty->ViewCustomAttributes = "";

            // Repeat
            $this->Repeat->ViewValue = $this->Repeat->CurrentValue;
            $this->Repeat->ViewCustomAttributes = "";

            // DeptNo
            $this->DeptNo->ViewValue = $this->DeptNo->CurrentValue;
            $this->DeptNo->ViewCustomAttributes = "";

            // Desc1
            $this->Desc1->ViewValue = $this->Desc1->CurrentValue;
            $this->Desc1->ViewCustomAttributes = "";

            // Desc2
            $this->Desc2->ViewValue = $this->Desc2->CurrentValue;
            $this->Desc2->ViewCustomAttributes = "";

            // RptResult
            $this->RptResult->ViewValue = $this->RptResult->CurrentValue;
            $this->RptResult->ViewCustomAttributes = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";
            $this->Branch->TooltipValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";
            $this->SidNo->TooltipValue = "";

            // SidDate
            $this->SidDate->LinkCustomAttributes = "";
            $this->SidDate->HrefValue = "";
            $this->SidDate->TooltipValue = "";

            // TestCd
            $this->TestCd->LinkCustomAttributes = "";
            $this->TestCd->HrefValue = "";
            $this->TestCd->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";
            $this->DEptCd->TooltipValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";
            $this->ProfCd->TooltipValue = "";

            // LabReport
            $this->LabReport->LinkCustomAttributes = "";
            $this->LabReport->HrefValue = "";
            $this->LabReport->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";
            $this->Comments->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";
            $this->Specimen->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // ResultBy
            $this->ResultBy->LinkCustomAttributes = "";
            $this->ResultBy->HrefValue = "";
            $this->ResultBy->TooltipValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";
            $this->AuthBy->TooltipValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";
            $this->AuthDate->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";
            $this->Printed->TooltipValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";
            $this->Dispatch->TooltipValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";
            $this->LOWHIGH->TooltipValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";
            $this->RefValue->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // ResDate
            $this->ResDate->LinkCustomAttributes = "";
            $this->ResDate->HrefValue = "";
            $this->ResDate->TooltipValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->TooltipValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->TooltipValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";
            $this->GraphPath->TooltipValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";
            $this->SampleDate->TooltipValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";
            $this->SampleUser->TooltipValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";
            $this->ReceivedDate->TooltipValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";
            $this->ReceivedUser->TooltipValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";
            $this->DeptRecvDate->TooltipValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";
            $this->DeptRecvUser->TooltipValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";
            $this->PrintBy->TooltipValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";
            $this->PrintDate->TooltipValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";
            $this->MachineCD->TooltipValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";
            $this->TestCancel->TooltipValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
            $this->OutSource->TooltipValue = "";

            // Tariff
            $this->Tariff->LinkCustomAttributes = "";
            $this->Tariff->HrefValue = "";
            $this->Tariff->TooltipValue = "";

            // EDITDATE
            $this->EDITDATE->LinkCustomAttributes = "";
            $this->EDITDATE->HrefValue = "";
            $this->EDITDATE->TooltipValue = "";

            // UPLOAD
            $this->UPLOAD->LinkCustomAttributes = "";
            $this->UPLOAD->HrefValue = "";
            $this->UPLOAD->TooltipValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";
            $this->SAuthDate->TooltipValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";
            $this->SAuthBy->TooltipValue = "";

            // NoRC
            $this->NoRC->LinkCustomAttributes = "";
            $this->NoRC->HrefValue = "";
            $this->NoRC->TooltipValue = "";

            // DispDt
            $this->DispDt->LinkCustomAttributes = "";
            $this->DispDt->HrefValue = "";
            $this->DispDt->TooltipValue = "";

            // DispUser
            $this->DispUser->LinkCustomAttributes = "";
            $this->DispUser->HrefValue = "";
            $this->DispUser->TooltipValue = "";

            // DispRemarks
            $this->DispRemarks->LinkCustomAttributes = "";
            $this->DispRemarks->HrefValue = "";
            $this->DispRemarks->TooltipValue = "";

            // DispMode
            $this->DispMode->LinkCustomAttributes = "";
            $this->DispMode->HrefValue = "";
            $this->DispMode->TooltipValue = "";

            // ProductCD
            $this->ProductCD->LinkCustomAttributes = "";
            $this->ProductCD->HrefValue = "";
            $this->ProductCD->TooltipValue = "";

            // Nos
            $this->Nos->LinkCustomAttributes = "";
            $this->Nos->HrefValue = "";
            $this->Nos->TooltipValue = "";

            // WBCPath
            $this->WBCPath->LinkCustomAttributes = "";
            $this->WBCPath->HrefValue = "";
            $this->WBCPath->TooltipValue = "";

            // RBCPath
            $this->RBCPath->LinkCustomAttributes = "";
            $this->RBCPath->HrefValue = "";
            $this->RBCPath->TooltipValue = "";

            // PTPath
            $this->PTPath->LinkCustomAttributes = "";
            $this->PTPath->HrefValue = "";
            $this->PTPath->TooltipValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";
            $this->ActualAmt->TooltipValue = "";

            // NoSign
            $this->NoSign->LinkCustomAttributes = "";
            $this->NoSign->HrefValue = "";
            $this->NoSign->TooltipValue = "";

            // Barcode
            $this->_Barcode->LinkCustomAttributes = "";
            $this->_Barcode->HrefValue = "";
            $this->_Barcode->TooltipValue = "";

            // ReadTime
            $this->ReadTime->LinkCustomAttributes = "";
            $this->ReadTime->HrefValue = "";
            $this->ReadTime->TooltipValue = "";

            // Result
            $this->Result->LinkCustomAttributes = "";
            $this->Result->HrefValue = "";
            $this->Result->TooltipValue = "";

            // VailID
            $this->VailID->LinkCustomAttributes = "";
            $this->VailID->HrefValue = "";
            $this->VailID->TooltipValue = "";

            // ReadMachine
            $this->ReadMachine->LinkCustomAttributes = "";
            $this->ReadMachine->HrefValue = "";
            $this->ReadMachine->TooltipValue = "";

            // LabCD
            $this->LabCD->LinkCustomAttributes = "";
            $this->LabCD->HrefValue = "";
            $this->LabCD->TooltipValue = "";

            // OutLabAmt
            $this->OutLabAmt->LinkCustomAttributes = "";
            $this->OutLabAmt->HrefValue = "";
            $this->OutLabAmt->TooltipValue = "";

            // ProductQty
            $this->ProductQty->LinkCustomAttributes = "";
            $this->ProductQty->HrefValue = "";
            $this->ProductQty->TooltipValue = "";

            // Repeat
            $this->Repeat->LinkCustomAttributes = "";
            $this->Repeat->HrefValue = "";
            $this->Repeat->TooltipValue = "";

            // DeptNo
            $this->DeptNo->LinkCustomAttributes = "";
            $this->DeptNo->HrefValue = "";
            $this->DeptNo->TooltipValue = "";

            // Desc1
            $this->Desc1->LinkCustomAttributes = "";
            $this->Desc1->HrefValue = "";
            $this->Desc1->TooltipValue = "";

            // Desc2
            $this->Desc2->LinkCustomAttributes = "";
            $this->Desc2->HrefValue = "";
            $this->Desc2->TooltipValue = "";

            // RptResult
            $this->RptResult->LinkCustomAttributes = "";
            $this->RptResult->HrefValue = "";
            $this->RptResult->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // Branch
            $this->Branch->EditAttrs["class"] = "form-control";
            $this->Branch->EditCustomAttributes = "";
            if (!$this->Branch->Raw) {
                $this->Branch->AdvancedSearch->SearchValue = HtmlDecode($this->Branch->AdvancedSearch->SearchValue);
            }
            $this->Branch->EditValue = HtmlEncode($this->Branch->AdvancedSearch->SearchValue);
            $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

            // SidNo
            $this->SidNo->EditAttrs["class"] = "form-control";
            $this->SidNo->EditCustomAttributes = "";
            if (!$this->SidNo->Raw) {
                $this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
            }
            $this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
            $this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

            // SidDate
            $this->SidDate->EditAttrs["class"] = "form-control";
            $this->SidDate->EditCustomAttributes = "";
            $this->SidDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SidDate->AdvancedSearch->SearchValue, 0), 8));
            $this->SidDate->PlaceHolder = RemoveHtml($this->SidDate->caption());

            // TestCd
            $this->TestCd->EditAttrs["class"] = "form-control";
            $this->TestCd->EditCustomAttributes = "";
            if (!$this->TestCd->Raw) {
                $this->TestCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestCd->AdvancedSearch->SearchValue);
            }
            $this->TestCd->EditValue = HtmlEncode($this->TestCd->AdvancedSearch->SearchValue);
            $this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

            // TestSubCd
            $this->TestSubCd->EditAttrs["class"] = "form-control";
            $this->TestSubCd->EditCustomAttributes = "";
            if (!$this->TestSubCd->Raw) {
                $this->TestSubCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestSubCd->AdvancedSearch->SearchValue);
            }
            $this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->AdvancedSearch->SearchValue);
            $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

            // DEptCd
            $this->DEptCd->EditAttrs["class"] = "form-control";
            $this->DEptCd->EditCustomAttributes = "";
            if (!$this->DEptCd->Raw) {
                $this->DEptCd->AdvancedSearch->SearchValue = HtmlDecode($this->DEptCd->AdvancedSearch->SearchValue);
            }
            $this->DEptCd->EditValue = HtmlEncode($this->DEptCd->AdvancedSearch->SearchValue);
            $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

            // ProfCd
            $this->ProfCd->EditAttrs["class"] = "form-control";
            $this->ProfCd->EditCustomAttributes = "";
            if (!$this->ProfCd->Raw) {
                $this->ProfCd->AdvancedSearch->SearchValue = HtmlDecode($this->ProfCd->AdvancedSearch->SearchValue);
            }
            $this->ProfCd->EditValue = HtmlEncode($this->ProfCd->AdvancedSearch->SearchValue);
            $this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

            // LabReport
            $this->LabReport->EditAttrs["class"] = "form-control";
            $this->LabReport->EditCustomAttributes = "";
            $this->LabReport->EditValue = HtmlEncode($this->LabReport->AdvancedSearch->SearchValue);
            $this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 0), 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // Comments
            $this->Comments->EditAttrs["class"] = "form-control";
            $this->Comments->EditCustomAttributes = "";
            $this->Comments->EditValue = HtmlEncode($this->Comments->AdvancedSearch->SearchValue);
            $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->AdvancedSearch->SearchValue = HtmlDecode($this->Method->AdvancedSearch->SearchValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->AdvancedSearch->SearchValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Specimen
            $this->Specimen->EditAttrs["class"] = "form-control";
            $this->Specimen->EditCustomAttributes = "";
            if (!$this->Specimen->Raw) {
                $this->Specimen->AdvancedSearch->SearchValue = HtmlDecode($this->Specimen->AdvancedSearch->SearchValue);
            }
            $this->Specimen->EditValue = HtmlEncode($this->Specimen->AdvancedSearch->SearchValue);
            $this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // ResultBy
            $this->ResultBy->EditAttrs["class"] = "form-control";
            $this->ResultBy->EditCustomAttributes = "";
            if (!$this->ResultBy->Raw) {
                $this->ResultBy->AdvancedSearch->SearchValue = HtmlDecode($this->ResultBy->AdvancedSearch->SearchValue);
            }
            $this->ResultBy->EditValue = HtmlEncode($this->ResultBy->AdvancedSearch->SearchValue);
            $this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

            // AuthBy
            $this->AuthBy->EditAttrs["class"] = "form-control";
            $this->AuthBy->EditCustomAttributes = "";
            if (!$this->AuthBy->Raw) {
                $this->AuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->AuthBy->AdvancedSearch->SearchValue);
            }
            $this->AuthBy->EditValue = HtmlEncode($this->AuthBy->AdvancedSearch->SearchValue);
            $this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

            // AuthDate
            $this->AuthDate->EditAttrs["class"] = "form-control";
            $this->AuthDate->EditCustomAttributes = "";
            $this->AuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AuthDate->AdvancedSearch->SearchValue, 0), 8));
            $this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // Printed
            $this->Printed->EditAttrs["class"] = "form-control";
            $this->Printed->EditCustomAttributes = "";
            if (!$this->Printed->Raw) {
                $this->Printed->AdvancedSearch->SearchValue = HtmlDecode($this->Printed->AdvancedSearch->SearchValue);
            }
            $this->Printed->EditValue = HtmlEncode($this->Printed->AdvancedSearch->SearchValue);
            $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

            // Dispatch
            $this->Dispatch->EditAttrs["class"] = "form-control";
            $this->Dispatch->EditCustomAttributes = "";
            if (!$this->Dispatch->Raw) {
                $this->Dispatch->AdvancedSearch->SearchValue = HtmlDecode($this->Dispatch->AdvancedSearch->SearchValue);
            }
            $this->Dispatch->EditValue = HtmlEncode($this->Dispatch->AdvancedSearch->SearchValue);
            $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

            // LOWHIGH
            $this->LOWHIGH->EditAttrs["class"] = "form-control";
            $this->LOWHIGH->EditCustomAttributes = "";
            if (!$this->LOWHIGH->Raw) {
                $this->LOWHIGH->AdvancedSearch->SearchValue = HtmlDecode($this->LOWHIGH->AdvancedSearch->SearchValue);
            }
            $this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->AdvancedSearch->SearchValue);
            $this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

            // RefValue
            $this->RefValue->EditAttrs["class"] = "form-control";
            $this->RefValue->EditCustomAttributes = "";
            $this->RefValue->EditValue = HtmlEncode($this->RefValue->AdvancedSearch->SearchValue);
            $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            if (!$this->Unit->Raw) {
                $this->Unit->AdvancedSearch->SearchValue = HtmlDecode($this->Unit->AdvancedSearch->SearchValue);
            }
            $this->Unit->EditValue = HtmlEncode($this->Unit->AdvancedSearch->SearchValue);
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // ResDate
            $this->ResDate->EditAttrs["class"] = "form-control";
            $this->ResDate->EditCustomAttributes = "";
            $this->ResDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResDate->AdvancedSearch->SearchValue, 0), 8));
            $this->ResDate->PlaceHolder = RemoveHtml($this->ResDate->caption());

            // Pic1
            $this->Pic1->EditAttrs["class"] = "form-control";
            $this->Pic1->EditCustomAttributes = "";
            if (!$this->Pic1->Raw) {
                $this->Pic1->AdvancedSearch->SearchValue = HtmlDecode($this->Pic1->AdvancedSearch->SearchValue);
            }
            $this->Pic1->EditValue = HtmlEncode($this->Pic1->AdvancedSearch->SearchValue);
            $this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

            // Pic2
            $this->Pic2->EditAttrs["class"] = "form-control";
            $this->Pic2->EditCustomAttributes = "";
            if (!$this->Pic2->Raw) {
                $this->Pic2->AdvancedSearch->SearchValue = HtmlDecode($this->Pic2->AdvancedSearch->SearchValue);
            }
            $this->Pic2->EditValue = HtmlEncode($this->Pic2->AdvancedSearch->SearchValue);
            $this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

            // GraphPath
            $this->GraphPath->EditAttrs["class"] = "form-control";
            $this->GraphPath->EditCustomAttributes = "";
            if (!$this->GraphPath->Raw) {
                $this->GraphPath->AdvancedSearch->SearchValue = HtmlDecode($this->GraphPath->AdvancedSearch->SearchValue);
            }
            $this->GraphPath->EditValue = HtmlEncode($this->GraphPath->AdvancedSearch->SearchValue);
            $this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

            // SampleDate
            $this->SampleDate->EditAttrs["class"] = "form-control";
            $this->SampleDate->EditCustomAttributes = "";
            $this->SampleDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SampleDate->AdvancedSearch->SearchValue, 0), 8));
            $this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

            // SampleUser
            $this->SampleUser->EditAttrs["class"] = "form-control";
            $this->SampleUser->EditCustomAttributes = "";
            if (!$this->SampleUser->Raw) {
                $this->SampleUser->AdvancedSearch->SearchValue = HtmlDecode($this->SampleUser->AdvancedSearch->SearchValue);
            }
            $this->SampleUser->EditValue = HtmlEncode($this->SampleUser->AdvancedSearch->SearchValue);
            $this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

            // ReceivedDate
            $this->ReceivedDate->EditAttrs["class"] = "form-control";
            $this->ReceivedDate->EditCustomAttributes = "";
            $this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ReceivedDate->AdvancedSearch->SearchValue, 0), 8));
            $this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

            // ReceivedUser
            $this->ReceivedUser->EditAttrs["class"] = "form-control";
            $this->ReceivedUser->EditCustomAttributes = "";
            if (!$this->ReceivedUser->Raw) {
                $this->ReceivedUser->AdvancedSearch->SearchValue = HtmlDecode($this->ReceivedUser->AdvancedSearch->SearchValue);
            }
            $this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->AdvancedSearch->SearchValue);
            $this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

            // DeptRecvDate
            $this->DeptRecvDate->EditAttrs["class"] = "form-control";
            $this->DeptRecvDate->EditCustomAttributes = "";
            $this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DeptRecvDate->AdvancedSearch->SearchValue, 0), 8));
            $this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

            // DeptRecvUser
            $this->DeptRecvUser->EditAttrs["class"] = "form-control";
            $this->DeptRecvUser->EditCustomAttributes = "";
            if (!$this->DeptRecvUser->Raw) {
                $this->DeptRecvUser->AdvancedSearch->SearchValue = HtmlDecode($this->DeptRecvUser->AdvancedSearch->SearchValue);
            }
            $this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->AdvancedSearch->SearchValue);
            $this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

            // PrintBy
            $this->PrintBy->EditAttrs["class"] = "form-control";
            $this->PrintBy->EditCustomAttributes = "";
            if (!$this->PrintBy->Raw) {
                $this->PrintBy->AdvancedSearch->SearchValue = HtmlDecode($this->PrintBy->AdvancedSearch->SearchValue);
            }
            $this->PrintBy->EditValue = HtmlEncode($this->PrintBy->AdvancedSearch->SearchValue);
            $this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

            // PrintDate
            $this->PrintDate->EditAttrs["class"] = "form-control";
            $this->PrintDate->EditCustomAttributes = "";
            $this->PrintDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PrintDate->AdvancedSearch->SearchValue, 0), 8));
            $this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

            // MachineCD
            $this->MachineCD->EditAttrs["class"] = "form-control";
            $this->MachineCD->EditCustomAttributes = "";
            if (!$this->MachineCD->Raw) {
                $this->MachineCD->AdvancedSearch->SearchValue = HtmlDecode($this->MachineCD->AdvancedSearch->SearchValue);
            }
            $this->MachineCD->EditValue = HtmlEncode($this->MachineCD->AdvancedSearch->SearchValue);
            $this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

            // TestCancel
            $this->TestCancel->EditAttrs["class"] = "form-control";
            $this->TestCancel->EditCustomAttributes = "";
            if (!$this->TestCancel->Raw) {
                $this->TestCancel->AdvancedSearch->SearchValue = HtmlDecode($this->TestCancel->AdvancedSearch->SearchValue);
            }
            $this->TestCancel->EditValue = HtmlEncode($this->TestCancel->AdvancedSearch->SearchValue);
            $this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

            // OutSource
            $this->OutSource->EditAttrs["class"] = "form-control";
            $this->OutSource->EditCustomAttributes = "";
            if (!$this->OutSource->Raw) {
                $this->OutSource->AdvancedSearch->SearchValue = HtmlDecode($this->OutSource->AdvancedSearch->SearchValue);
            }
            $this->OutSource->EditValue = HtmlEncode($this->OutSource->AdvancedSearch->SearchValue);
            $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

            // Tariff
            $this->Tariff->EditAttrs["class"] = "form-control";
            $this->Tariff->EditCustomAttributes = "";
            $this->Tariff->EditValue = HtmlEncode($this->Tariff->AdvancedSearch->SearchValue);
            $this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());

            // EDITDATE
            $this->EDITDATE->EditAttrs["class"] = "form-control";
            $this->EDITDATE->EditCustomAttributes = "";
            $this->EDITDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDITDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

            // UPLOAD
            $this->UPLOAD->EditAttrs["class"] = "form-control";
            $this->UPLOAD->EditCustomAttributes = "";
            if (!$this->UPLOAD->Raw) {
                $this->UPLOAD->AdvancedSearch->SearchValue = HtmlDecode($this->UPLOAD->AdvancedSearch->SearchValue);
            }
            $this->UPLOAD->EditValue = HtmlEncode($this->UPLOAD->AdvancedSearch->SearchValue);
            $this->UPLOAD->PlaceHolder = RemoveHtml($this->UPLOAD->caption());

            // SAuthDate
            $this->SAuthDate->EditAttrs["class"] = "form-control";
            $this->SAuthDate->EditCustomAttributes = "";
            $this->SAuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SAuthDate->AdvancedSearch->SearchValue, 0), 8));
            $this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

            // SAuthBy
            $this->SAuthBy->EditAttrs["class"] = "form-control";
            $this->SAuthBy->EditCustomAttributes = "";
            if (!$this->SAuthBy->Raw) {
                $this->SAuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->SAuthBy->AdvancedSearch->SearchValue);
            }
            $this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->AdvancedSearch->SearchValue);
            $this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

            // NoRC
            $this->NoRC->EditAttrs["class"] = "form-control";
            $this->NoRC->EditCustomAttributes = "";
            if (!$this->NoRC->Raw) {
                $this->NoRC->AdvancedSearch->SearchValue = HtmlDecode($this->NoRC->AdvancedSearch->SearchValue);
            }
            $this->NoRC->EditValue = HtmlEncode($this->NoRC->AdvancedSearch->SearchValue);
            $this->NoRC->PlaceHolder = RemoveHtml($this->NoRC->caption());

            // DispDt
            $this->DispDt->EditAttrs["class"] = "form-control";
            $this->DispDt->EditCustomAttributes = "";
            $this->DispDt->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DispDt->AdvancedSearch->SearchValue, 0), 8));
            $this->DispDt->PlaceHolder = RemoveHtml($this->DispDt->caption());

            // DispUser
            $this->DispUser->EditAttrs["class"] = "form-control";
            $this->DispUser->EditCustomAttributes = "";
            if (!$this->DispUser->Raw) {
                $this->DispUser->AdvancedSearch->SearchValue = HtmlDecode($this->DispUser->AdvancedSearch->SearchValue);
            }
            $this->DispUser->EditValue = HtmlEncode($this->DispUser->AdvancedSearch->SearchValue);
            $this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

            // DispRemarks
            $this->DispRemarks->EditAttrs["class"] = "form-control";
            $this->DispRemarks->EditCustomAttributes = "";
            if (!$this->DispRemarks->Raw) {
                $this->DispRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->DispRemarks->AdvancedSearch->SearchValue);
            }
            $this->DispRemarks->EditValue = HtmlEncode($this->DispRemarks->AdvancedSearch->SearchValue);
            $this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

            // DispMode
            $this->DispMode->EditAttrs["class"] = "form-control";
            $this->DispMode->EditCustomAttributes = "";
            if (!$this->DispMode->Raw) {
                $this->DispMode->AdvancedSearch->SearchValue = HtmlDecode($this->DispMode->AdvancedSearch->SearchValue);
            }
            $this->DispMode->EditValue = HtmlEncode($this->DispMode->AdvancedSearch->SearchValue);
            $this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

            // ProductCD
            $this->ProductCD->EditAttrs["class"] = "form-control";
            $this->ProductCD->EditCustomAttributes = "";
            if (!$this->ProductCD->Raw) {
                $this->ProductCD->AdvancedSearch->SearchValue = HtmlDecode($this->ProductCD->AdvancedSearch->SearchValue);
            }
            $this->ProductCD->EditValue = HtmlEncode($this->ProductCD->AdvancedSearch->SearchValue);
            $this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

            // Nos
            $this->Nos->EditAttrs["class"] = "form-control";
            $this->Nos->EditCustomAttributes = "";
            $this->Nos->EditValue = HtmlEncode($this->Nos->AdvancedSearch->SearchValue);
            $this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());

            // WBCPath
            $this->WBCPath->EditAttrs["class"] = "form-control";
            $this->WBCPath->EditCustomAttributes = "";
            if (!$this->WBCPath->Raw) {
                $this->WBCPath->AdvancedSearch->SearchValue = HtmlDecode($this->WBCPath->AdvancedSearch->SearchValue);
            }
            $this->WBCPath->EditValue = HtmlEncode($this->WBCPath->AdvancedSearch->SearchValue);
            $this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

            // RBCPath
            $this->RBCPath->EditAttrs["class"] = "form-control";
            $this->RBCPath->EditCustomAttributes = "";
            if (!$this->RBCPath->Raw) {
                $this->RBCPath->AdvancedSearch->SearchValue = HtmlDecode($this->RBCPath->AdvancedSearch->SearchValue);
            }
            $this->RBCPath->EditValue = HtmlEncode($this->RBCPath->AdvancedSearch->SearchValue);
            $this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

            // PTPath
            $this->PTPath->EditAttrs["class"] = "form-control";
            $this->PTPath->EditCustomAttributes = "";
            if (!$this->PTPath->Raw) {
                $this->PTPath->AdvancedSearch->SearchValue = HtmlDecode($this->PTPath->AdvancedSearch->SearchValue);
            }
            $this->PTPath->EditValue = HtmlEncode($this->PTPath->AdvancedSearch->SearchValue);
            $this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

            // ActualAmt
            $this->ActualAmt->EditAttrs["class"] = "form-control";
            $this->ActualAmt->EditCustomAttributes = "";
            $this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->AdvancedSearch->SearchValue);
            $this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());

            // NoSign
            $this->NoSign->EditAttrs["class"] = "form-control";
            $this->NoSign->EditCustomAttributes = "";
            if (!$this->NoSign->Raw) {
                $this->NoSign->AdvancedSearch->SearchValue = HtmlDecode($this->NoSign->AdvancedSearch->SearchValue);
            }
            $this->NoSign->EditValue = HtmlEncode($this->NoSign->AdvancedSearch->SearchValue);
            $this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

            // Barcode
            $this->_Barcode->EditAttrs["class"] = "form-control";
            $this->_Barcode->EditCustomAttributes = "";
            if (!$this->_Barcode->Raw) {
                $this->_Barcode->AdvancedSearch->SearchValue = HtmlDecode($this->_Barcode->AdvancedSearch->SearchValue);
            }
            $this->_Barcode->EditValue = HtmlEncode($this->_Barcode->AdvancedSearch->SearchValue);
            $this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

            // ReadTime
            $this->ReadTime->EditAttrs["class"] = "form-control";
            $this->ReadTime->EditCustomAttributes = "";
            $this->ReadTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ReadTime->AdvancedSearch->SearchValue, 0), 8));
            $this->ReadTime->PlaceHolder = RemoveHtml($this->ReadTime->caption());

            // Result
            $this->Result->EditAttrs["class"] = "form-control";
            $this->Result->EditCustomAttributes = "";
            $this->Result->EditValue = HtmlEncode($this->Result->AdvancedSearch->SearchValue);
            $this->Result->PlaceHolder = RemoveHtml($this->Result->caption());

            // VailID
            $this->VailID->EditAttrs["class"] = "form-control";
            $this->VailID->EditCustomAttributes = "";
            if (!$this->VailID->Raw) {
                $this->VailID->AdvancedSearch->SearchValue = HtmlDecode($this->VailID->AdvancedSearch->SearchValue);
            }
            $this->VailID->EditValue = HtmlEncode($this->VailID->AdvancedSearch->SearchValue);
            $this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

            // ReadMachine
            $this->ReadMachine->EditAttrs["class"] = "form-control";
            $this->ReadMachine->EditCustomAttributes = "";
            if (!$this->ReadMachine->Raw) {
                $this->ReadMachine->AdvancedSearch->SearchValue = HtmlDecode($this->ReadMachine->AdvancedSearch->SearchValue);
            }
            $this->ReadMachine->EditValue = HtmlEncode($this->ReadMachine->AdvancedSearch->SearchValue);
            $this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

            // LabCD
            $this->LabCD->EditAttrs["class"] = "form-control";
            $this->LabCD->EditCustomAttributes = "";
            if (!$this->LabCD->Raw) {
                $this->LabCD->AdvancedSearch->SearchValue = HtmlDecode($this->LabCD->AdvancedSearch->SearchValue);
            }
            $this->LabCD->EditValue = HtmlEncode($this->LabCD->AdvancedSearch->SearchValue);
            $this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

            // OutLabAmt
            $this->OutLabAmt->EditAttrs["class"] = "form-control";
            $this->OutLabAmt->EditCustomAttributes = "";
            $this->OutLabAmt->EditValue = HtmlEncode($this->OutLabAmt->AdvancedSearch->SearchValue);
            $this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());

            // ProductQty
            $this->ProductQty->EditAttrs["class"] = "form-control";
            $this->ProductQty->EditCustomAttributes = "";
            $this->ProductQty->EditValue = HtmlEncode($this->ProductQty->AdvancedSearch->SearchValue);
            $this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());

            // Repeat
            $this->Repeat->EditAttrs["class"] = "form-control";
            $this->Repeat->EditCustomAttributes = "";
            if (!$this->Repeat->Raw) {
                $this->Repeat->AdvancedSearch->SearchValue = HtmlDecode($this->Repeat->AdvancedSearch->SearchValue);
            }
            $this->Repeat->EditValue = HtmlEncode($this->Repeat->AdvancedSearch->SearchValue);
            $this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

            // DeptNo
            $this->DeptNo->EditAttrs["class"] = "form-control";
            $this->DeptNo->EditCustomAttributes = "";
            if (!$this->DeptNo->Raw) {
                $this->DeptNo->AdvancedSearch->SearchValue = HtmlDecode($this->DeptNo->AdvancedSearch->SearchValue);
            }
            $this->DeptNo->EditValue = HtmlEncode($this->DeptNo->AdvancedSearch->SearchValue);
            $this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

            // Desc1
            $this->Desc1->EditAttrs["class"] = "form-control";
            $this->Desc1->EditCustomAttributes = "";
            if (!$this->Desc1->Raw) {
                $this->Desc1->AdvancedSearch->SearchValue = HtmlDecode($this->Desc1->AdvancedSearch->SearchValue);
            }
            $this->Desc1->EditValue = HtmlEncode($this->Desc1->AdvancedSearch->SearchValue);
            $this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

            // Desc2
            $this->Desc2->EditAttrs["class"] = "form-control";
            $this->Desc2->EditCustomAttributes = "";
            if (!$this->Desc2->Raw) {
                $this->Desc2->AdvancedSearch->SearchValue = HtmlDecode($this->Desc2->AdvancedSearch->SearchValue);
            }
            $this->Desc2->EditValue = HtmlEncode($this->Desc2->AdvancedSearch->SearchValue);
            $this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

            // RptResult
            $this->RptResult->EditAttrs["class"] = "form-control";
            $this->RptResult->EditCustomAttributes = "";
            if (!$this->RptResult->Raw) {
                $this->RptResult->AdvancedSearch->SearchValue = HtmlDecode($this->RptResult->AdvancedSearch->SearchValue);
            }
            $this->RptResult->EditValue = HtmlEncode($this->RptResult->AdvancedSearch->SearchValue);
            $this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());
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
        if (!CheckDate($this->SidDate->AdvancedSearch->SearchValue)) {
            $this->SidDate->addErrorMessage($this->SidDate->getErrorMessage(false));
        }
        if (!CheckDate($this->ResultDate->AdvancedSearch->SearchValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if (!CheckNumber($this->Amount->AdvancedSearch->SearchValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if (!CheckDate($this->AuthDate->AdvancedSearch->SearchValue)) {
            $this->AuthDate->addErrorMessage($this->AuthDate->getErrorMessage(false));
        }
        if (!CheckDate($this->ResDate->AdvancedSearch->SearchValue)) {
            $this->ResDate->addErrorMessage($this->ResDate->getErrorMessage(false));
        }
        if (!CheckDate($this->SampleDate->AdvancedSearch->SearchValue)) {
            $this->SampleDate->addErrorMessage($this->SampleDate->getErrorMessage(false));
        }
        if (!CheckDate($this->ReceivedDate->AdvancedSearch->SearchValue)) {
            $this->ReceivedDate->addErrorMessage($this->ReceivedDate->getErrorMessage(false));
        }
        if (!CheckDate($this->DeptRecvDate->AdvancedSearch->SearchValue)) {
            $this->DeptRecvDate->addErrorMessage($this->DeptRecvDate->getErrorMessage(false));
        }
        if (!CheckDate($this->PrintDate->AdvancedSearch->SearchValue)) {
            $this->PrintDate->addErrorMessage($this->PrintDate->getErrorMessage(false));
        }
        if (!CheckNumber($this->Tariff->AdvancedSearch->SearchValue)) {
            $this->Tariff->addErrorMessage($this->Tariff->getErrorMessage(false));
        }
        if (!CheckDate($this->EDITDATE->AdvancedSearch->SearchValue)) {
            $this->EDITDATE->addErrorMessage($this->EDITDATE->getErrorMessage(false));
        }
        if (!CheckDate($this->SAuthDate->AdvancedSearch->SearchValue)) {
            $this->SAuthDate->addErrorMessage($this->SAuthDate->getErrorMessage(false));
        }
        if (!CheckDate($this->DispDt->AdvancedSearch->SearchValue)) {
            $this->DispDt->addErrorMessage($this->DispDt->getErrorMessage(false));
        }
        if (!CheckNumber($this->Nos->AdvancedSearch->SearchValue)) {
            $this->Nos->addErrorMessage($this->Nos->getErrorMessage(false));
        }
        if (!CheckNumber($this->ActualAmt->AdvancedSearch->SearchValue)) {
            $this->ActualAmt->addErrorMessage($this->ActualAmt->getErrorMessage(false));
        }
        if (!CheckDate($this->ReadTime->AdvancedSearch->SearchValue)) {
            $this->ReadTime->addErrorMessage($this->ReadTime->getErrorMessage(false));
        }
        if (!CheckNumber($this->OutLabAmt->AdvancedSearch->SearchValue)) {
            $this->OutLabAmt->addErrorMessage($this->OutLabAmt->getErrorMessage(false));
        }
        if (!CheckNumber($this->ProductQty->AdvancedSearch->SearchValue)) {
            $this->ProductQty->addErrorMessage($this->ProductQty->getErrorMessage(false));
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
        $this->Branch->AdvancedSearch->load();
        $this->SidNo->AdvancedSearch->load();
        $this->SidDate->AdvancedSearch->load();
        $this->TestCd->AdvancedSearch->load();
        $this->TestSubCd->AdvancedSearch->load();
        $this->DEptCd->AdvancedSearch->load();
        $this->ProfCd->AdvancedSearch->load();
        $this->LabReport->AdvancedSearch->load();
        $this->ResultDate->AdvancedSearch->load();
        $this->Comments->AdvancedSearch->load();
        $this->Method->AdvancedSearch->load();
        $this->Specimen->AdvancedSearch->load();
        $this->Amount->AdvancedSearch->load();
        $this->ResultBy->AdvancedSearch->load();
        $this->AuthBy->AdvancedSearch->load();
        $this->AuthDate->AdvancedSearch->load();
        $this->Abnormal->AdvancedSearch->load();
        $this->Printed->AdvancedSearch->load();
        $this->Dispatch->AdvancedSearch->load();
        $this->LOWHIGH->AdvancedSearch->load();
        $this->RefValue->AdvancedSearch->load();
        $this->Unit->AdvancedSearch->load();
        $this->ResDate->AdvancedSearch->load();
        $this->Pic1->AdvancedSearch->load();
        $this->Pic2->AdvancedSearch->load();
        $this->GraphPath->AdvancedSearch->load();
        $this->SampleDate->AdvancedSearch->load();
        $this->SampleUser->AdvancedSearch->load();
        $this->ReceivedDate->AdvancedSearch->load();
        $this->ReceivedUser->AdvancedSearch->load();
        $this->DeptRecvDate->AdvancedSearch->load();
        $this->DeptRecvUser->AdvancedSearch->load();
        $this->PrintBy->AdvancedSearch->load();
        $this->PrintDate->AdvancedSearch->load();
        $this->MachineCD->AdvancedSearch->load();
        $this->TestCancel->AdvancedSearch->load();
        $this->OutSource->AdvancedSearch->load();
        $this->Tariff->AdvancedSearch->load();
        $this->EDITDATE->AdvancedSearch->load();
        $this->UPLOAD->AdvancedSearch->load();
        $this->SAuthDate->AdvancedSearch->load();
        $this->SAuthBy->AdvancedSearch->load();
        $this->NoRC->AdvancedSearch->load();
        $this->DispDt->AdvancedSearch->load();
        $this->DispUser->AdvancedSearch->load();
        $this->DispRemarks->AdvancedSearch->load();
        $this->DispMode->AdvancedSearch->load();
        $this->ProductCD->AdvancedSearch->load();
        $this->Nos->AdvancedSearch->load();
        $this->WBCPath->AdvancedSearch->load();
        $this->RBCPath->AdvancedSearch->load();
        $this->PTPath->AdvancedSearch->load();
        $this->ActualAmt->AdvancedSearch->load();
        $this->NoSign->AdvancedSearch->load();
        $this->_Barcode->AdvancedSearch->load();
        $this->ReadTime->AdvancedSearch->load();
        $this->Result->AdvancedSearch->load();
        $this->VailID->AdvancedSearch->load();
        $this->ReadMachine->AdvancedSearch->load();
        $this->LabCD->AdvancedSearch->load();
        $this->OutLabAmt->AdvancedSearch->load();
        $this->ProductQty->AdvancedSearch->load();
        $this->Repeat->AdvancedSearch->load();
        $this->DeptNo->AdvancedSearch->load();
        $this->Desc1->AdvancedSearch->load();
        $this->Desc2->AdvancedSearch->load();
        $this->RptResult->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("LabTestResultList"), "", $this->TableVar, true);
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
