<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewBillingVoucherSearch extends ViewBillingVoucher
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_billing_voucher';

    // Page object name
    public $PageObjName = "ViewBillingVoucherSearch";

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

        // Table object (view_billing_voucher)
        if (!isset($GLOBALS["view_billing_voucher"]) || get_class($GLOBALS["view_billing_voucher"]) == PROJECT_NAMESPACE . "view_billing_voucher") {
            $GLOBALS["view_billing_voucher"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_billing_voucher');
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
                $doc = new $class(Container("view_billing_voucher"));
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
                    if ($pageName == "ViewBillingVoucherView") {
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
        $this->createddatetime->setVisibility();
        $this->BillNumber->setVisibility();
        $this->Reception->setVisibility();
        $this->PatientId->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->Mobile->setVisibility();
        $this->IP_OP->setVisibility();
        $this->Doctor->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->DiscountAmount->setVisibility();
        $this->createdby->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->RealizationAmount->setVisibility();
        $this->RealizationStatus->setVisibility();
        $this->RealizationRemarks->setVisibility();
        $this->RealizationBatchNo->setVisibility();
        $this->RealizationDate->setVisibility();
        $this->HospID->setVisibility();
        $this->RIDNO->setVisibility();
        $this->TidNo->setVisibility();
        $this->CId->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PayerType->setVisibility();
        $this->Dob->setVisibility();
        $this->Currency->setVisibility();
        $this->DiscountRemarks->setVisibility();
        $this->Remarks->setVisibility();
        $this->PatId->setVisibility();
        $this->DrDepartment->setVisibility();
        $this->RefferedBy->setVisibility();
        $this->CardNumber->setVisibility();
        $this->BankName->setVisibility();
        $this->DrID->setVisibility();
        $this->BillStatus->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->_UserName->setVisibility();
        $this->AdjustmentAdvance->setVisibility();
        $this->billing_vouchercol->setVisibility();
        $this->BillType->setVisibility();
        $this->ProcedureName->setVisibility();
        $this->ProcedureAmount->setVisibility();
        $this->IncludePackage->setVisibility();
        $this->CancelBill->setVisibility();
        $this->CancelReason->setVisibility();
        $this->CancelModeOfPayment->setVisibility();
        $this->CancelAmount->setVisibility();
        $this->CancelBankName->setVisibility();
        $this->CancelTransactionNumber->setVisibility();
        $this->LabTest->setVisibility();
        $this->sid->setVisibility();
        $this->SidNo->setVisibility();
        $this->createdDatettime->setVisibility();
        $this->BillClosing->setVisibility();
        $this->GoogleReviewID->setVisibility();
        $this->CardType->setVisibility();
        $this->PharmacyBill->setVisibility();
        $this->cash->setVisibility();
        $this->Card->setVisibility();
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
        $this->setupLookupOptions($this->Reception);
        $this->setupLookupOptions($this->ModeofPayment);
        $this->setupLookupOptions($this->CId);
        $this->setupLookupOptions($this->PatId);
        $this->setupLookupOptions($this->RefferedBy);
        $this->setupLookupOptions($this->DrID);

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
                    $srchStr = "ViewBillingVoucherList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
        $this->buildSearchUrl($srchUrl, $this->BillNumber); // BillNumber
        $this->buildSearchUrl($srchUrl, $this->Reception); // Reception
        $this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
        $this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
        $this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
        $this->buildSearchUrl($srchUrl, $this->Age); // Age
        $this->buildSearchUrl($srchUrl, $this->Gender); // Gender
        $this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
        $this->buildSearchUrl($srchUrl, $this->Mobile); // Mobile
        $this->buildSearchUrl($srchUrl, $this->IP_OP); // IP_OP
        $this->buildSearchUrl($srchUrl, $this->Doctor); // Doctor
        $this->buildSearchUrl($srchUrl, $this->voucher_type); // voucher_type
        $this->buildSearchUrl($srchUrl, $this->Details); // Details
        $this->buildSearchUrl($srchUrl, $this->ModeofPayment); // ModeofPayment
        $this->buildSearchUrl($srchUrl, $this->Amount); // Amount
        $this->buildSearchUrl($srchUrl, $this->AnyDues); // AnyDues
        $this->buildSearchUrl($srchUrl, $this->DiscountAmount); // DiscountAmount
        $this->buildSearchUrl($srchUrl, $this->createdby); // createdby
        $this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
        $this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
        $this->buildSearchUrl($srchUrl, $this->RealizationAmount); // RealizationAmount
        $this->buildSearchUrl($srchUrl, $this->RealizationStatus); // RealizationStatus
        $this->buildSearchUrl($srchUrl, $this->RealizationRemarks); // RealizationRemarks
        $this->buildSearchUrl($srchUrl, $this->RealizationBatchNo); // RealizationBatchNo
        $this->buildSearchUrl($srchUrl, $this->RealizationDate); // RealizationDate
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->RIDNO); // RIDNO
        $this->buildSearchUrl($srchUrl, $this->TidNo); // TidNo
        $this->buildSearchUrl($srchUrl, $this->CId); // CId
        $this->buildSearchUrl($srchUrl, $this->PartnerName); // PartnerName
        $this->buildSearchUrl($srchUrl, $this->PayerType); // PayerType
        $this->buildSearchUrl($srchUrl, $this->Dob); // Dob
        $this->buildSearchUrl($srchUrl, $this->Currency); // Currency
        $this->buildSearchUrl($srchUrl, $this->DiscountRemarks); // DiscountRemarks
        $this->buildSearchUrl($srchUrl, $this->Remarks); // Remarks
        $this->buildSearchUrl($srchUrl, $this->PatId); // PatId
        $this->buildSearchUrl($srchUrl, $this->DrDepartment); // DrDepartment
        $this->buildSearchUrl($srchUrl, $this->RefferedBy); // RefferedBy
        $this->buildSearchUrl($srchUrl, $this->CardNumber); // CardNumber
        $this->buildSearchUrl($srchUrl, $this->BankName); // BankName
        $this->buildSearchUrl($srchUrl, $this->DrID); // DrID
        $this->buildSearchUrl($srchUrl, $this->BillStatus); // BillStatus
        $this->buildSearchUrl($srchUrl, $this->ReportHeader); // ReportHeader
        $this->buildSearchUrl($srchUrl, $this->_UserName); // UserName
        $this->buildSearchUrl($srchUrl, $this->AdjustmentAdvance); // AdjustmentAdvance
        $this->buildSearchUrl($srchUrl, $this->billing_vouchercol); // billing_vouchercol
        $this->buildSearchUrl($srchUrl, $this->BillType); // BillType
        $this->buildSearchUrl($srchUrl, $this->ProcedureName); // ProcedureName
        $this->buildSearchUrl($srchUrl, $this->ProcedureAmount); // ProcedureAmount
        $this->buildSearchUrl($srchUrl, $this->IncludePackage); // IncludePackage
        $this->buildSearchUrl($srchUrl, $this->CancelBill); // CancelBill
        $this->buildSearchUrl($srchUrl, $this->CancelReason); // CancelReason
        $this->buildSearchUrl($srchUrl, $this->CancelModeOfPayment); // CancelModeOfPayment
        $this->buildSearchUrl($srchUrl, $this->CancelAmount); // CancelAmount
        $this->buildSearchUrl($srchUrl, $this->CancelBankName); // CancelBankName
        $this->buildSearchUrl($srchUrl, $this->CancelTransactionNumber); // CancelTransactionNumber
        $this->buildSearchUrl($srchUrl, $this->LabTest); // LabTest
        $this->buildSearchUrl($srchUrl, $this->sid); // sid
        $this->buildSearchUrl($srchUrl, $this->SidNo); // SidNo
        $this->buildSearchUrl($srchUrl, $this->createdDatettime); // createdDatettime
        $this->buildSearchUrl($srchUrl, $this->BillClosing); // BillClosing
        $this->buildSearchUrl($srchUrl, $this->GoogleReviewID); // GoogleReviewID
        $this->buildSearchUrl($srchUrl, $this->CardType); // CardType
        $this->buildSearchUrl($srchUrl, $this->PharmacyBill); // PharmacyBill
        $this->buildSearchUrl($srchUrl, $this->cash); // cash
        $this->buildSearchUrl($srchUrl, $this->Card); // Card
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
        if ($this->createddatetime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Reception->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->mrnno->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientName->AdvancedSearch->post()) {
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
        if ($this->Mobile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IP_OP->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Doctor->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->voucher_type->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Details->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ModeofPayment->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Amount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AnyDues->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DiscountAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createdby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modifiedby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modifieddatetime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RealizationAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RealizationStatus->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RealizationRemarks->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RealizationBatchNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RealizationDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RIDNO->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TidNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PartnerName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PayerType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Dob->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Currency->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DiscountRemarks->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Remarks->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrDepartment->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RefferedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CardNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BankName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillStatus->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReportHeader->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->ReportHeader->AdvancedSearch->SearchValue)) {
            $this->ReportHeader->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ReportHeader->AdvancedSearch->SearchValue);
        }
        if (is_array($this->ReportHeader->AdvancedSearch->SearchValue2)) {
            $this->ReportHeader->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ReportHeader->AdvancedSearch->SearchValue2);
        }
        if ($this->_UserName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AdjustmentAdvance->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue)) {
            $this->AdjustmentAdvance->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->AdjustmentAdvance->AdvancedSearch->SearchValue);
        }
        if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue2)) {
            $this->AdjustmentAdvance->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->AdjustmentAdvance->AdvancedSearch->SearchValue2);
        }
        if ($this->billing_vouchercol->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProcedureName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ProcedureAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->IncludePackage->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->IncludePackage->AdvancedSearch->SearchValue)) {
            $this->IncludePackage->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->IncludePackage->AdvancedSearch->SearchValue);
        }
        if (is_array($this->IncludePackage->AdvancedSearch->SearchValue2)) {
            $this->IncludePackage->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->IncludePackage->AdvancedSearch->SearchValue2);
        }
        if ($this->CancelBill->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CancelReason->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CancelModeOfPayment->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CancelAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CancelBankName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CancelTransactionNumber->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LabTest->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->sid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SidNo->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createdDatettime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillClosing->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->BillClosing->AdvancedSearch->SearchValue)) {
            $this->BillClosing->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->BillClosing->AdvancedSearch->SearchValue);
        }
        if (is_array($this->BillClosing->AdvancedSearch->SearchValue2)) {
            $this->BillClosing->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->BillClosing->AdvancedSearch->SearchValue2);
        }
        if ($this->GoogleReviewID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->GoogleReviewID->AdvancedSearch->SearchValue)) {
            $this->GoogleReviewID->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GoogleReviewID->AdvancedSearch->SearchValue);
        }
        if (is_array($this->GoogleReviewID->AdvancedSearch->SearchValue2)) {
            $this->GoogleReviewID->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GoogleReviewID->AdvancedSearch->SearchValue2);
        }
        if ($this->CardType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PharmacyBill->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->PharmacyBill->AdvancedSearch->SearchValue)) {
            $this->PharmacyBill->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->PharmacyBill->AdvancedSearch->SearchValue);
        }
        if (is_array($this->PharmacyBill->AdvancedSearch->SearchValue2)) {
            $this->PharmacyBill->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->PharmacyBill->AdvancedSearch->SearchValue2);
        }
        if ($this->cash->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Card->AdvancedSearch->post()) {
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
        if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue))) {
            $this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue))) {
            $this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ProcedureAmount->FormValue == $this->ProcedureAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProcedureAmount->CurrentValue))) {
            $this->ProcedureAmount->CurrentValue = ConvertToFloatString($this->ProcedureAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->cash->FormValue == $this->cash->CurrentValue && is_numeric(ConvertToFloatString($this->cash->CurrentValue))) {
            $this->cash->CurrentValue = ConvertToFloatString($this->cash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // createddatetime

        // BillNumber

        // Reception

        // PatientId

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // Mobile

        // IP_OP

        // Doctor

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // DiscountAmount

        // createdby

        // modifiedby

        // modifieddatetime

        // RealizationAmount

        // RealizationStatus

        // RealizationRemarks

        // RealizationBatchNo

        // RealizationDate

        // HospID

        // RIDNO

        // TidNo

        // CId

        // PartnerName

        // PayerType

        // Dob

        // Currency

        // DiscountRemarks

        // Remarks

        // PatId

        // DrDepartment

        // RefferedBy

        // CardNumber

        // BankName

        // DrID

        // BillStatus

        // ReportHeader

        // UserName

        // AdjustmentAdvance

        // billing_vouchercol

        // BillType

        // ProcedureName

        // ProcedureAmount

        // IncludePackage

        // CancelBill

        // CancelReason

        // CancelModeOfPayment

        // CancelAmount

        // CancelBankName

        // CancelTransactionNumber

        // LabTest

        // sid

        // SidNo

        // createdDatettime

        // BillClosing

        // GoogleReviewID

        // CardType

        // PharmacyBill

        // cash

        // Card
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
            $this->createddatetime->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // Reception
            $curVal = trim(strval($this->Reception->CurrentValue));
            if ($curVal != "") {
                $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
                if ($this->Reception->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                        $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                    } else {
                        $this->Reception->ViewValue = $this->Reception->CurrentValue;
                    }
                }
            } else {
                $this->Reception->ViewValue = null;
            }
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // IP_OP
            $this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
            $this->IP_OP->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // ModeofPayment
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
                if ($this->ModeofPayment->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ModeofPayment->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ModeofPayment->Lookup->renderViewRow($rswrk[0]);
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
                    } else {
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
                    }
                }
            } else {
                $this->ModeofPayment->ViewValue = null;
            }
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // AnyDues
            $this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
            $this->AnyDues->ViewCustomAttributes = "";

            // DiscountAmount
            $this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
            $this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
            $this->DiscountAmount->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // RealizationAmount
            $this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
            $this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
            $this->RealizationAmount->ViewCustomAttributes = "";

            // RealizationStatus
            $this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
            $this->RealizationStatus->ViewCustomAttributes = "";

            // RealizationRemarks
            $this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
            $this->RealizationRemarks->ViewCustomAttributes = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
            $this->RealizationBatchNo->ViewCustomAttributes = "";

            // RealizationDate
            $this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
            $this->RealizationDate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // CId
            $curVal = trim(strval($this->CId->CurrentValue));
            if ($curVal != "") {
                $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
                if ($this->CId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->CId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                        $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                    } else {
                        $this->CId->ViewValue = $this->CId->CurrentValue;
                    }
                }
            } else {
                $this->CId->ViewValue = null;
            }
            $this->CId->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PayerType
            $this->PayerType->ViewValue = $this->PayerType->CurrentValue;
            $this->PayerType->ViewCustomAttributes = "";

            // Dob
            $this->Dob->ViewValue = $this->Dob->CurrentValue;
            $this->Dob->ViewCustomAttributes = "";

            // Currency
            $this->Currency->ViewValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // DiscountRemarks
            $this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
            $this->DiscountRemarks->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // PatId
            $curVal = trim(strval($this->PatId->CurrentValue));
            if ($curVal != "") {
                $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
                if ($this->PatId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                        $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                    } else {
                        $this->PatId->ViewValue = $this->PatId->CurrentValue;
                    }
                }
            } else {
                $this->PatId->ViewValue = null;
            }
            $this->PatId->ViewCustomAttributes = "";

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // RefferedBy
            $curVal = trim(strval($this->RefferedBy->CurrentValue));
            if ($curVal != "") {
                $this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
                if ($this->RefferedBy->ViewValue === null) { // Lookup from database
                    $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->RefferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RefferedBy->Lookup->renderViewRow($rswrk[0]);
                        $this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
                    } else {
                        $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
                    }
                }
            } else {
                $this->RefferedBy->ViewValue = null;
            }
            $this->RefferedBy->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // DrID
            $curVal = trim(strval($this->DrID->CurrentValue));
            if ($curVal != "") {
                $this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
                if ($this->DrID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                        $this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
                    } else {
                        $this->DrID->ViewValue = $this->DrID->CurrentValue;
                    }
                }
            } else {
                $this->DrID->ViewValue = null;
            }
            $this->DrID->ViewCustomAttributes = "";

            // BillStatus
            $this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
            $this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
            $this->BillStatus->ViewCustomAttributes = "";

            // ReportHeader
            if (strval($this->ReportHeader->CurrentValue) != "") {
                $this->ReportHeader->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ReportHeader->ViewValue = null;
            }
            $this->ReportHeader->ViewCustomAttributes = "";

            // UserName
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";

            // AdjustmentAdvance
            if (strval($this->AdjustmentAdvance->CurrentValue) != "") {
                $this->AdjustmentAdvance->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->AdjustmentAdvance->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->AdjustmentAdvance->ViewValue->add($this->AdjustmentAdvance->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->AdjustmentAdvance->ViewValue = null;
            }
            $this->AdjustmentAdvance->ViewCustomAttributes = "";

            // billing_vouchercol
            $this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
            $this->billing_vouchercol->ViewCustomAttributes = "";

            // BillType
            if (strval($this->BillType->CurrentValue) != "") {
                $this->BillType->ViewValue = $this->BillType->optionCaption($this->BillType->CurrentValue);
            } else {
                $this->BillType->ViewValue = null;
            }
            $this->BillType->ViewCustomAttributes = "";

            // ProcedureName
            $this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
            $this->ProcedureName->ViewCustomAttributes = "";

            // ProcedureAmount
            $this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
            $this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
            $this->ProcedureAmount->ViewCustomAttributes = "";

            // IncludePackage
            if (strval($this->IncludePackage->CurrentValue) != "") {
                $this->IncludePackage->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IncludePackage->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IncludePackage->ViewValue->add($this->IncludePackage->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IncludePackage->ViewValue = null;
            }
            $this->IncludePackage->ViewCustomAttributes = "";

            // CancelBill
            if (strval($this->CancelBill->CurrentValue) != "") {
                $this->CancelBill->ViewValue = $this->CancelBill->optionCaption($this->CancelBill->CurrentValue);
            } else {
                $this->CancelBill->ViewValue = null;
            }
            $this->CancelBill->ViewCustomAttributes = "";

            // CancelReason
            $this->CancelReason->ViewValue = $this->CancelReason->CurrentValue;
            $this->CancelReason->ViewCustomAttributes = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->ViewValue = $this->CancelModeOfPayment->CurrentValue;
            $this->CancelModeOfPayment->ViewCustomAttributes = "";

            // CancelAmount
            $this->CancelAmount->ViewValue = $this->CancelAmount->CurrentValue;
            $this->CancelAmount->ViewCustomAttributes = "";

            // CancelBankName
            $this->CancelBankName->ViewValue = $this->CancelBankName->CurrentValue;
            $this->CancelBankName->ViewCustomAttributes = "";

            // CancelTransactionNumber
            $this->CancelTransactionNumber->ViewValue = $this->CancelTransactionNumber->CurrentValue;
            $this->CancelTransactionNumber->ViewCustomAttributes = "";

            // LabTest
            $this->LabTest->ViewValue = $this->LabTest->CurrentValue;
            $this->LabTest->ViewCustomAttributes = "";

            // sid
            $this->sid->ViewValue = $this->sid->CurrentValue;
            $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
            $this->sid->ViewCustomAttributes = "";

            // SidNo
            $this->SidNo->ViewValue = $this->SidNo->CurrentValue;
            $this->SidNo->ViewCustomAttributes = "";

            // createdDatettime
            $this->createdDatettime->ViewValue = $this->createdDatettime->CurrentValue;
            $this->createdDatettime->ViewValue = FormatDateTime($this->createdDatettime->ViewValue, 0);
            $this->createdDatettime->ViewCustomAttributes = "";

            // BillClosing
            if (strval($this->BillClosing->CurrentValue) != "") {
                $this->BillClosing->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->BillClosing->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->BillClosing->ViewValue->add($this->BillClosing->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->BillClosing->ViewValue = null;
            }
            $this->BillClosing->ViewCustomAttributes = "";

            // GoogleReviewID
            if (strval($this->GoogleReviewID->CurrentValue) != "") {
                $this->GoogleReviewID->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->GoogleReviewID->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->GoogleReviewID->ViewValue->add($this->GoogleReviewID->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->GoogleReviewID->ViewValue = null;
            }
            $this->GoogleReviewID->ViewCustomAttributes = "";

            // CardType
            if (strval($this->CardType->CurrentValue) != "") {
                $this->CardType->ViewValue = $this->CardType->optionCaption($this->CardType->CurrentValue);
            } else {
                $this->CardType->ViewValue = null;
            }
            $this->CardType->ViewCustomAttributes = "";

            // PharmacyBill
            if (strval($this->PharmacyBill->CurrentValue) != "") {
                $this->PharmacyBill->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->PharmacyBill->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->PharmacyBill->ViewValue->add($this->PharmacyBill->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->PharmacyBill->ViewValue = null;
            }
            $this->PharmacyBill->ViewCustomAttributes = "";

            // cash
            $this->cash->ViewValue = $this->cash->CurrentValue;
            $this->cash->ViewValue = FormatNumber($this->cash->ViewValue, 2, -2, -2, -2);
            $this->cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

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

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";
            $this->IP_OP->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";
            $this->voucher_type->TooltipValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";
            $this->Details->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";
            $this->AnyDues->TooltipValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";
            $this->DiscountAmount->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";
            $this->RealizationAmount->TooltipValue = "";

            // RealizationStatus
            $this->RealizationStatus->LinkCustomAttributes = "";
            $this->RealizationStatus->HrefValue = "";
            $this->RealizationStatus->TooltipValue = "";

            // RealizationRemarks
            $this->RealizationRemarks->LinkCustomAttributes = "";
            $this->RealizationRemarks->HrefValue = "";
            $this->RealizationRemarks->TooltipValue = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->LinkCustomAttributes = "";
            $this->RealizationBatchNo->HrefValue = "";
            $this->RealizationBatchNo->TooltipValue = "";

            // RealizationDate
            $this->RealizationDate->LinkCustomAttributes = "";
            $this->RealizationDate->HrefValue = "";
            $this->RealizationDate->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PayerType
            $this->PayerType->LinkCustomAttributes = "";
            $this->PayerType->HrefValue = "";
            $this->PayerType->TooltipValue = "";

            // Dob
            $this->Dob->LinkCustomAttributes = "";
            $this->Dob->HrefValue = "";
            $this->Dob->TooltipValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";
            $this->Currency->TooltipValue = "";

            // DiscountRemarks
            $this->DiscountRemarks->LinkCustomAttributes = "";
            $this->DiscountRemarks->HrefValue = "";
            $this->DiscountRemarks->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->TooltipValue = "";

            // DrDepartment
            $this->DrDepartment->LinkCustomAttributes = "";
            $this->DrDepartment->HrefValue = "";
            $this->DrDepartment->TooltipValue = "";

            // RefferedBy
            $this->RefferedBy->LinkCustomAttributes = "";
            $this->RefferedBy->HrefValue = "";
            $this->RefferedBy->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";
            $this->BillStatus->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";
            $this->_UserName->TooltipValue = "";

            // AdjustmentAdvance
            $this->AdjustmentAdvance->LinkCustomAttributes = "";
            $this->AdjustmentAdvance->HrefValue = "";
            $this->AdjustmentAdvance->TooltipValue = "";

            // billing_vouchercol
            $this->billing_vouchercol->LinkCustomAttributes = "";
            $this->billing_vouchercol->HrefValue = "";
            $this->billing_vouchercol->TooltipValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";
            $this->BillType->TooltipValue = "";

            // ProcedureName
            $this->ProcedureName->LinkCustomAttributes = "";
            $this->ProcedureName->HrefValue = "";
            $this->ProcedureName->TooltipValue = "";

            // ProcedureAmount
            $this->ProcedureAmount->LinkCustomAttributes = "";
            $this->ProcedureAmount->HrefValue = "";
            $this->ProcedureAmount->TooltipValue = "";

            // IncludePackage
            $this->IncludePackage->LinkCustomAttributes = "";
            $this->IncludePackage->HrefValue = "";
            $this->IncludePackage->TooltipValue = "";

            // CancelBill
            $this->CancelBill->LinkCustomAttributes = "";
            $this->CancelBill->HrefValue = "";
            $this->CancelBill->TooltipValue = "";

            // CancelReason
            $this->CancelReason->LinkCustomAttributes = "";
            $this->CancelReason->HrefValue = "";
            $this->CancelReason->TooltipValue = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->LinkCustomAttributes = "";
            $this->CancelModeOfPayment->HrefValue = "";
            $this->CancelModeOfPayment->TooltipValue = "";

            // CancelAmount
            $this->CancelAmount->LinkCustomAttributes = "";
            $this->CancelAmount->HrefValue = "";
            $this->CancelAmount->TooltipValue = "";

            // CancelBankName
            $this->CancelBankName->LinkCustomAttributes = "";
            $this->CancelBankName->HrefValue = "";
            $this->CancelBankName->TooltipValue = "";

            // CancelTransactionNumber
            $this->CancelTransactionNumber->LinkCustomAttributes = "";
            $this->CancelTransactionNumber->HrefValue = "";
            $this->CancelTransactionNumber->TooltipValue = "";

            // LabTest
            $this->LabTest->LinkCustomAttributes = "";
            $this->LabTest->HrefValue = "";
            $this->LabTest->TooltipValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";
            $this->sid->TooltipValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";
            $this->SidNo->TooltipValue = "";

            // createdDatettime
            $this->createdDatettime->LinkCustomAttributes = "";
            $this->createdDatettime->HrefValue = "";
            $this->createdDatettime->TooltipValue = "";

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";
            $this->BillClosing->TooltipValue = "";

            // GoogleReviewID
            $this->GoogleReviewID->LinkCustomAttributes = "";
            $this->GoogleReviewID->HrefValue = "";
            $this->GoogleReviewID->TooltipValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";
            $this->CardType->TooltipValue = "";

            // PharmacyBill
            $this->PharmacyBill->LinkCustomAttributes = "";
            $this->PharmacyBill->HrefValue = "";
            $this->PharmacyBill->TooltipValue = "";

            // cash
            $this->cash->LinkCustomAttributes = "";
            $this->cash->HrefValue = "";
            $this->cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 7), 7));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 7), 7));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // Reception
            $this->Reception->EditCustomAttributes = "";
            $curVal = trim(strval($this->Reception->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->Reception->AdvancedSearch->ViewValue = $this->Reception->lookupCacheOption($curVal);
            } else {
                $this->Reception->AdvancedSearch->ViewValue = $this->Reception->Lookup !== null && is_array($this->Reception->Lookup->Options) ? $curVal : null;
            }
            if ($this->Reception->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->Reception->EditValue = array_values($this->Reception->Lookup->Options);
                if ($this->Reception->AdvancedSearch->ViewValue == "") {
                    $this->Reception->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Reception->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Reception->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                    $this->Reception->AdvancedSearch->ViewValue = $this->Reception->displayValue($arwrk);
                } else {
                    $this->Reception->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                foreach ($arwrk as &$row)
                    $row = $this->Reception->Lookup->renderViewRow($row);
                $this->Reception->EditValue = $arwrk;
            }
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

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

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // IP_OP
            $this->IP_OP->EditAttrs["class"] = "form-control";
            $this->IP_OP->EditCustomAttributes = "";
            if (!$this->IP_OP->Raw) {
                $this->IP_OP->AdvancedSearch->SearchValue = HtmlDecode($this->IP_OP->AdvancedSearch->SearchValue);
            }
            $this->IP_OP->EditValue = HtmlEncode($this->IP_OP->AdvancedSearch->SearchValue);
            $this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            if (!$this->Doctor->Raw) {
                $this->Doctor->AdvancedSearch->SearchValue = HtmlDecode($this->Doctor->AdvancedSearch->SearchValue);
            }
            $this->Doctor->EditValue = HtmlEncode($this->Doctor->AdvancedSearch->SearchValue);
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->AdvancedSearch->SearchValue = HtmlDecode($this->voucher_type->AdvancedSearch->SearchValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->AdvancedSearch->SearchValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->AdvancedSearch->SearchValue = HtmlDecode($this->Details->AdvancedSearch->SearchValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->AdvancedSearch->SearchValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $curVal = trim(strval($this->ModeofPayment->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->ModeofPayment->AdvancedSearch->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            } else {
                $this->ModeofPayment->AdvancedSearch->ViewValue = $this->ModeofPayment->Lookup !== null && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : null;
            }
            if ($this->ModeofPayment->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ModeofPayment->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->ModeofPayment->EditValue = $arwrk;
            }
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->AdvancedSearch->SearchValue = HtmlDecode($this->AnyDues->AdvancedSearch->SearchValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->AdvancedSearch->SearchValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // DiscountAmount
            $this->DiscountAmount->EditAttrs["class"] = "form-control";
            $this->DiscountAmount->EditCustomAttributes = "";
            $this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->AdvancedSearch->SearchValue);
            $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

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

            // RealizationAmount
            $this->RealizationAmount->EditAttrs["class"] = "form-control";
            $this->RealizationAmount->EditCustomAttributes = "";
            $this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->AdvancedSearch->SearchValue);
            $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

            // RealizationStatus
            $this->RealizationStatus->EditAttrs["class"] = "form-control";
            $this->RealizationStatus->EditCustomAttributes = "";
            if (!$this->RealizationStatus->Raw) {
                $this->RealizationStatus->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationStatus->AdvancedSearch->SearchValue);
            }
            $this->RealizationStatus->EditValue = HtmlEncode($this->RealizationStatus->AdvancedSearch->SearchValue);
            $this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

            // RealizationRemarks
            $this->RealizationRemarks->EditAttrs["class"] = "form-control";
            $this->RealizationRemarks->EditCustomAttributes = "";
            if (!$this->RealizationRemarks->Raw) {
                $this->RealizationRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationRemarks->AdvancedSearch->SearchValue);
            }
            $this->RealizationRemarks->EditValue = HtmlEncode($this->RealizationRemarks->AdvancedSearch->SearchValue);
            $this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

            // RealizationBatchNo
            $this->RealizationBatchNo->EditAttrs["class"] = "form-control";
            $this->RealizationBatchNo->EditCustomAttributes = "";
            if (!$this->RealizationBatchNo->Raw) {
                $this->RealizationBatchNo->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationBatchNo->AdvancedSearch->SearchValue);
            }
            $this->RealizationBatchNo->EditValue = HtmlEncode($this->RealizationBatchNo->AdvancedSearch->SearchValue);
            $this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

            // RealizationDate
            $this->RealizationDate->EditAttrs["class"] = "form-control";
            $this->RealizationDate->EditCustomAttributes = "";
            if (!$this->RealizationDate->Raw) {
                $this->RealizationDate->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationDate->AdvancedSearch->SearchValue);
            }
            $this->RealizationDate->EditValue = HtmlEncode($this->RealizationDate->AdvancedSearch->SearchValue);
            $this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->AdvancedSearch->SearchValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->AdvancedSearch->SearchValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // CId
            $this->CId->EditCustomAttributes = "";
            $curVal = trim(strval($this->CId->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->CId->AdvancedSearch->ViewValue = $this->CId->lookupCacheOption($curVal);
            } else {
                $this->CId->AdvancedSearch->ViewValue = $this->CId->Lookup !== null && is_array($this->CId->Lookup->Options) ? $curVal : null;
            }
            if ($this->CId->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->CId->EditValue = array_values($this->CId->Lookup->Options);
                if ($this->CId->AdvancedSearch->ViewValue == "") {
                    $this->CId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->CId->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->CId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                    $this->CId->AdvancedSearch->ViewValue = $this->CId->displayValue($arwrk);
                } else {
                    $this->CId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->CId->EditValue = $arwrk;
            }
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PayerType
            $this->PayerType->EditAttrs["class"] = "form-control";
            $this->PayerType->EditCustomAttributes = "";
            if (!$this->PayerType->Raw) {
                $this->PayerType->AdvancedSearch->SearchValue = HtmlDecode($this->PayerType->AdvancedSearch->SearchValue);
            }
            $this->PayerType->EditValue = HtmlEncode($this->PayerType->AdvancedSearch->SearchValue);
            $this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

            // Dob
            $this->Dob->EditAttrs["class"] = "form-control";
            $this->Dob->EditCustomAttributes = "";
            if (!$this->Dob->Raw) {
                $this->Dob->AdvancedSearch->SearchValue = HtmlDecode($this->Dob->AdvancedSearch->SearchValue);
            }
            $this->Dob->EditValue = HtmlEncode($this->Dob->AdvancedSearch->SearchValue);
            $this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->AdvancedSearch->SearchValue = HtmlDecode($this->Currency->AdvancedSearch->SearchValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->AdvancedSearch->SearchValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // DiscountRemarks
            $this->DiscountRemarks->EditAttrs["class"] = "form-control";
            $this->DiscountRemarks->EditCustomAttributes = "";
            if (!$this->DiscountRemarks->Raw) {
                $this->DiscountRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->DiscountRemarks->AdvancedSearch->SearchValue);
            }
            $this->DiscountRemarks->EditValue = HtmlEncode($this->DiscountRemarks->AdvancedSearch->SearchValue);
            $this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->AdvancedSearch->SearchValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // PatId
            $this->PatId->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatId->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PatId->AdvancedSearch->ViewValue = $this->PatId->lookupCacheOption($curVal);
            } else {
                $this->PatId->AdvancedSearch->ViewValue = $this->PatId->Lookup !== null && is_array($this->PatId->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatId->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->PatId->EditValue = array_values($this->PatId->Lookup->Options);
                if ($this->PatId->AdvancedSearch->ViewValue == "") {
                    $this->PatId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PatId->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PatId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                    $this->PatId->AdvancedSearch->ViewValue = $this->PatId->displayValue($arwrk);
                } else {
                    $this->PatId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->PatId->EditValue = $arwrk;
            }
            $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

            // DrDepartment
            $this->DrDepartment->EditAttrs["class"] = "form-control";
            $this->DrDepartment->EditCustomAttributes = "";
            if (!$this->DrDepartment->Raw) {
                $this->DrDepartment->AdvancedSearch->SearchValue = HtmlDecode($this->DrDepartment->AdvancedSearch->SearchValue);
            }
            $this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->AdvancedSearch->SearchValue);
            $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

            // RefferedBy
            $this->RefferedBy->EditCustomAttributes = "";
            $curVal = trim(strval($this->RefferedBy->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->RefferedBy->AdvancedSearch->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
            } else {
                $this->RefferedBy->AdvancedSearch->ViewValue = $this->RefferedBy->Lookup !== null && is_array($this->RefferedBy->Lookup->Options) ? $curVal : null;
            }
            if ($this->RefferedBy->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->RefferedBy->EditValue = array_values($this->RefferedBy->Lookup->Options);
                if ($this->RefferedBy->AdvancedSearch->ViewValue == "") {
                    $this->RefferedBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`reference`" . SearchString("=", $this->RefferedBy->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->RefferedBy->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RefferedBy->Lookup->renderViewRow($rswrk[0]);
                    $this->RefferedBy->AdvancedSearch->ViewValue = $this->RefferedBy->displayValue($arwrk);
                } else {
                    $this->RefferedBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->RefferedBy->EditValue = $arwrk;
            }
            $this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CardNumber->AdvancedSearch->SearchValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->AdvancedSearch->SearchValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->AdvancedSearch->SearchValue = HtmlDecode($this->BankName->AdvancedSearch->SearchValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->AdvancedSearch->SearchValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // DrID
            $this->DrID->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrID->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->DrID->AdvancedSearch->ViewValue = $this->DrID->lookupCacheOption($curVal);
            } else {
                $this->DrID->AdvancedSearch->ViewValue = $this->DrID->Lookup !== null && is_array($this->DrID->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrID->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->DrID->EditValue = array_values($this->DrID->Lookup->Options);
                if ($this->DrID->AdvancedSearch->ViewValue == "") {
                    $this->DrID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->DrID->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $lookupFilter = function() {
                    return "`HospID`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->DrID->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                    $this->DrID->AdvancedSearch->ViewValue = $this->DrID->displayValue($arwrk);
                } else {
                    $this->DrID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DrID->EditValue = $arwrk;
            }
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->AdvancedSearch->SearchValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // ReportHeader
            $this->ReportHeader->EditCustomAttributes = "";
            $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // UserName
            $this->_UserName->EditAttrs["class"] = "form-control";
            $this->_UserName->EditCustomAttributes = "";
            if (!$this->_UserName->Raw) {
                $this->_UserName->AdvancedSearch->SearchValue = HtmlDecode($this->_UserName->AdvancedSearch->SearchValue);
            }
            $this->_UserName->EditValue = HtmlEncode($this->_UserName->AdvancedSearch->SearchValue);
            $this->_UserName->PlaceHolder = RemoveHtml($this->_UserName->caption());

            // AdjustmentAdvance
            $this->AdjustmentAdvance->EditCustomAttributes = "";
            $this->AdjustmentAdvance->EditValue = $this->AdjustmentAdvance->options(false);
            $this->AdjustmentAdvance->PlaceHolder = RemoveHtml($this->AdjustmentAdvance->caption());

            // billing_vouchercol
            $this->billing_vouchercol->EditAttrs["class"] = "form-control";
            $this->billing_vouchercol->EditCustomAttributes = "";
            if (!$this->billing_vouchercol->Raw) {
                $this->billing_vouchercol->AdvancedSearch->SearchValue = HtmlDecode($this->billing_vouchercol->AdvancedSearch->SearchValue);
            }
            $this->billing_vouchercol->EditValue = HtmlEncode($this->billing_vouchercol->AdvancedSearch->SearchValue);
            $this->billing_vouchercol->PlaceHolder = RemoveHtml($this->billing_vouchercol->caption());

            // BillType
            $this->BillType->EditCustomAttributes = "";
            $this->BillType->EditValue = $this->BillType->options(false);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // ProcedureName
            $this->ProcedureName->EditAttrs["class"] = "form-control";
            $this->ProcedureName->EditCustomAttributes = "";
            if (!$this->ProcedureName->Raw) {
                $this->ProcedureName->AdvancedSearch->SearchValue = HtmlDecode($this->ProcedureName->AdvancedSearch->SearchValue);
            }
            $this->ProcedureName->EditValue = HtmlEncode($this->ProcedureName->AdvancedSearch->SearchValue);
            $this->ProcedureName->PlaceHolder = RemoveHtml($this->ProcedureName->caption());

            // ProcedureAmount
            $this->ProcedureAmount->EditAttrs["class"] = "form-control";
            $this->ProcedureAmount->EditCustomAttributes = "";
            $this->ProcedureAmount->EditValue = HtmlEncode($this->ProcedureAmount->AdvancedSearch->SearchValue);
            $this->ProcedureAmount->PlaceHolder = RemoveHtml($this->ProcedureAmount->caption());

            // IncludePackage
            $this->IncludePackage->EditCustomAttributes = "";
            $this->IncludePackage->EditValue = $this->IncludePackage->options(false);
            $this->IncludePackage->PlaceHolder = RemoveHtml($this->IncludePackage->caption());

            // CancelBill
            $this->CancelBill->EditAttrs["class"] = "form-control";
            $this->CancelBill->EditCustomAttributes = "";
            $this->CancelBill->EditValue = $this->CancelBill->options(true);
            $this->CancelBill->PlaceHolder = RemoveHtml($this->CancelBill->caption());

            // CancelReason
            $this->CancelReason->EditAttrs["class"] = "form-control";
            $this->CancelReason->EditCustomAttributes = "";
            $this->CancelReason->EditValue = HtmlEncode($this->CancelReason->AdvancedSearch->SearchValue);
            $this->CancelReason->PlaceHolder = RemoveHtml($this->CancelReason->caption());

            // CancelModeOfPayment
            $this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
            $this->CancelModeOfPayment->EditCustomAttributes = "";
            if (!$this->CancelModeOfPayment->Raw) {
                $this->CancelModeOfPayment->AdvancedSearch->SearchValue = HtmlDecode($this->CancelModeOfPayment->AdvancedSearch->SearchValue);
            }
            $this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->AdvancedSearch->SearchValue);
            $this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

            // CancelAmount
            $this->CancelAmount->EditAttrs["class"] = "form-control";
            $this->CancelAmount->EditCustomAttributes = "";
            if (!$this->CancelAmount->Raw) {
                $this->CancelAmount->AdvancedSearch->SearchValue = HtmlDecode($this->CancelAmount->AdvancedSearch->SearchValue);
            }
            $this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->AdvancedSearch->SearchValue);
            $this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

            // CancelBankName
            $this->CancelBankName->EditAttrs["class"] = "form-control";
            $this->CancelBankName->EditCustomAttributes = "";
            if (!$this->CancelBankName->Raw) {
                $this->CancelBankName->AdvancedSearch->SearchValue = HtmlDecode($this->CancelBankName->AdvancedSearch->SearchValue);
            }
            $this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->AdvancedSearch->SearchValue);
            $this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

            // CancelTransactionNumber
            $this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
            $this->CancelTransactionNumber->EditCustomAttributes = "";
            if (!$this->CancelTransactionNumber->Raw) {
                $this->CancelTransactionNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CancelTransactionNumber->AdvancedSearch->SearchValue);
            }
            $this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->AdvancedSearch->SearchValue);
            $this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

            // LabTest
            $this->LabTest->EditAttrs["class"] = "form-control";
            $this->LabTest->EditCustomAttributes = "";
            if (!$this->LabTest->Raw) {
                $this->LabTest->AdvancedSearch->SearchValue = HtmlDecode($this->LabTest->AdvancedSearch->SearchValue);
            }
            $this->LabTest->EditValue = HtmlEncode($this->LabTest->AdvancedSearch->SearchValue);
            $this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->AdvancedSearch->SearchValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // SidNo
            $this->SidNo->EditAttrs["class"] = "form-control";
            $this->SidNo->EditCustomAttributes = "";
            if (!$this->SidNo->Raw) {
                $this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
            }
            $this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
            $this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

            // createdDatettime
            $this->createdDatettime->EditAttrs["class"] = "form-control";
            $this->createdDatettime->EditCustomAttributes = "";
            $this->createdDatettime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createdDatettime->AdvancedSearch->SearchValue, 0), 8));
            $this->createdDatettime->PlaceHolder = RemoveHtml($this->createdDatettime->caption());

            // BillClosing
            $this->BillClosing->EditCustomAttributes = "";
            $this->BillClosing->EditValue = $this->BillClosing->options(false);
            $this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

            // GoogleReviewID
            $this->GoogleReviewID->EditCustomAttributes = "";
            $this->GoogleReviewID->EditValue = $this->GoogleReviewID->options(false);
            $this->GoogleReviewID->PlaceHolder = RemoveHtml($this->GoogleReviewID->caption());

            // CardType
            $this->CardType->EditCustomAttributes = "";
            $this->CardType->EditValue = $this->CardType->options(false);
            $this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

            // PharmacyBill
            $this->PharmacyBill->EditCustomAttributes = "";
            $this->PharmacyBill->EditValue = $this->PharmacyBill->options(false);
            $this->PharmacyBill->PlaceHolder = RemoveHtml($this->PharmacyBill->caption());

            // cash
            $this->cash->EditAttrs["class"] = "form-control";
            $this->cash->EditCustomAttributes = "";
            $this->cash->EditValue = HtmlEncode($this->cash->AdvancedSearch->SearchValue);
            $this->cash->PlaceHolder = RemoveHtml($this->cash->caption());

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->AdvancedSearch->SearchValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
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
        if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckNumber($this->Amount->AdvancedSearch->SearchValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if (!CheckNumber($this->DiscountAmount->AdvancedSearch->SearchValue)) {
            $this->DiscountAmount->addErrorMessage($this->DiscountAmount->getErrorMessage(false));
        }
        if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if (!CheckNumber($this->RealizationAmount->AdvancedSearch->SearchValue)) {
            $this->RealizationAmount->addErrorMessage($this->RealizationAmount->getErrorMessage(false));
        }
        if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if (!CheckInteger($this->RIDNO->AdvancedSearch->SearchValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
        }
        if (!CheckInteger($this->TidNo->AdvancedSearch->SearchValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if (!CheckInteger($this->BillStatus->AdvancedSearch->SearchValue)) {
            $this->BillStatus->addErrorMessage($this->BillStatus->getErrorMessage(false));
        }
        if (!CheckNumber($this->ProcedureAmount->AdvancedSearch->SearchValue)) {
            $this->ProcedureAmount->addErrorMessage($this->ProcedureAmount->getErrorMessage(false));
        }
        if (!CheckInteger($this->sid->AdvancedSearch->SearchValue)) {
            $this->sid->addErrorMessage($this->sid->getErrorMessage(false));
        }
        if (!CheckDate($this->createdDatettime->AdvancedSearch->SearchValue)) {
            $this->createdDatettime->addErrorMessage($this->createdDatettime->getErrorMessage(false));
        }
        if (!CheckNumber($this->cash->AdvancedSearch->SearchValue)) {
            $this->cash->addErrorMessage($this->cash->getErrorMessage(false));
        }
        if (!CheckNumber($this->Card->AdvancedSearch->SearchValue)) {
            $this->Card->addErrorMessage($this->Card->getErrorMessage(false));
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
        $this->createddatetime->AdvancedSearch->load();
        $this->BillNumber->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->Mobile->AdvancedSearch->load();
        $this->IP_OP->AdvancedSearch->load();
        $this->Doctor->AdvancedSearch->load();
        $this->voucher_type->AdvancedSearch->load();
        $this->Details->AdvancedSearch->load();
        $this->ModeofPayment->AdvancedSearch->load();
        $this->Amount->AdvancedSearch->load();
        $this->AnyDues->AdvancedSearch->load();
        $this->DiscountAmount->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->RealizationAmount->AdvancedSearch->load();
        $this->RealizationStatus->AdvancedSearch->load();
        $this->RealizationRemarks->AdvancedSearch->load();
        $this->RealizationBatchNo->AdvancedSearch->load();
        $this->RealizationDate->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->RIDNO->AdvancedSearch->load();
        $this->TidNo->AdvancedSearch->load();
        $this->CId->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PayerType->AdvancedSearch->load();
        $this->Dob->AdvancedSearch->load();
        $this->Currency->AdvancedSearch->load();
        $this->DiscountRemarks->AdvancedSearch->load();
        $this->Remarks->AdvancedSearch->load();
        $this->PatId->AdvancedSearch->load();
        $this->DrDepartment->AdvancedSearch->load();
        $this->RefferedBy->AdvancedSearch->load();
        $this->CardNumber->AdvancedSearch->load();
        $this->BankName->AdvancedSearch->load();
        $this->DrID->AdvancedSearch->load();
        $this->BillStatus->AdvancedSearch->load();
        $this->ReportHeader->AdvancedSearch->load();
        $this->_UserName->AdvancedSearch->load();
        $this->AdjustmentAdvance->AdvancedSearch->load();
        $this->billing_vouchercol->AdvancedSearch->load();
        $this->BillType->AdvancedSearch->load();
        $this->ProcedureName->AdvancedSearch->load();
        $this->ProcedureAmount->AdvancedSearch->load();
        $this->IncludePackage->AdvancedSearch->load();
        $this->CancelBill->AdvancedSearch->load();
        $this->CancelReason->AdvancedSearch->load();
        $this->CancelModeOfPayment->AdvancedSearch->load();
        $this->CancelAmount->AdvancedSearch->load();
        $this->CancelBankName->AdvancedSearch->load();
        $this->CancelTransactionNumber->AdvancedSearch->load();
        $this->LabTest->AdvancedSearch->load();
        $this->sid->AdvancedSearch->load();
        $this->SidNo->AdvancedSearch->load();
        $this->createdDatettime->AdvancedSearch->load();
        $this->BillClosing->AdvancedSearch->load();
        $this->GoogleReviewID->AdvancedSearch->load();
        $this->CardType->AdvancedSearch->load();
        $this->PharmacyBill->AdvancedSearch->load();
        $this->cash->AdvancedSearch->load();
        $this->Card->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewBillingVoucherList"), "", $this->TableVar, true);
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
                case "x_Reception":
                    break;
                case "x_ModeofPayment":
                    break;
                case "x_CId":
                    break;
                case "x_PatId":
                    break;
                case "x_RefferedBy":
                    break;
                case "x_DrID":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_ReportHeader":
                    break;
                case "x_AdjustmentAdvance":
                    break;
                case "x_BillType":
                    break;
                case "x_IncludePackage":
                    break;
                case "x_CancelBill":
                    break;
                case "x_BillClosing":
                    break;
                case "x_GoogleReviewID":
                    break;
                case "x_CardType":
                    break;
                case "x_PharmacyBill":
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
