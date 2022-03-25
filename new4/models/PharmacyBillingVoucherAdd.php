<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyBillingVoucherAdd extends PharmacyBillingVoucher
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_billing_voucher';

    // Page object name
    public $PageObjName = "PharmacyBillingVoucherAdd";

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

        // Table object (pharmacy_billing_voucher)
        if (!isset($GLOBALS["pharmacy_billing_voucher"]) || get_class($GLOBALS["pharmacy_billing_voucher"]) == PROJECT_NAMESPACE . "pharmacy_billing_voucher") {
            $GLOBALS["pharmacy_billing_voucher"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_billing_voucher');
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
                $doc = new $class(Container("pharmacy_billing_voucher"));
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
                    if ($pageName == "PharmacyBillingVoucherView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $OldRecordset;
    public $CopyRecord;

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
        $this->id->Visible = false;
        $this->BillNumber->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Reception->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Mobile->setVisibility();
        $this->Age->setVisibility();
        $this->mrnno->setVisibility();
        $this->IP_OP->setVisibility();
        $this->Doctor->setVisibility();
        $this->Gender->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
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
        $this->profilePic->setVisibility();
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
        $this->PharID->setVisibility();
        $this->_UserName->setVisibility();
        $this->CardType->setVisibility();
        $this->DiscountAmount->setVisibility();
        $this->ApprovalNumber->setVisibility();
        $this->Cash->setVisibility();
        $this->Card->setVisibility();
        $this->BillType->setVisibility();
        $this->PartialSave->setVisibility();
        $this->PatientGST->setVisibility();
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
        $this->setupLookupOptions($this->RIDNO);
        $this->setupLookupOptions($this->CId);
        $this->setupLookupOptions($this->PatId);
        $this->setupLookupOptions($this->RefferedBy);
        $this->setupLookupOptions($this->DrID);

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-add-form ew-horizontal";
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action"); // Get form action
            $this->setKey(Post($this->OldKeyName));
            $postBack = true;
        } else {
            // Load key values from QueryString
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $this->CopyRecord = !EmptyValue($this->OldKey);
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record / default values
        $loaded = $this->loadOldRecord();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Set up detail parameters
        $this->setupDetailParms();

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$loaded) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("PharmacyBillingVoucherList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->GetViewUrl();
                    if (GetPageName($returnUrl) == "PharmacyBillingVoucherList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PharmacyBillingVoucherView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }
                    if (IsApi()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values

                    // Set up detail parameters
                    $this->setupDetailParms();
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = ROWTYPE_ADD; // Render add type

        // Render row
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

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->BillNumber->CurrentValue = null;
        $this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
        $this->voucher_type->CurrentValue = null;
        $this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->IP_OP->CurrentValue = null;
        $this->IP_OP->OldValue = $this->IP_OP->CurrentValue;
        $this->Doctor->CurrentValue = null;
        $this->Doctor->OldValue = $this->Doctor->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->Details->CurrentValue = null;
        $this->Details->OldValue = $this->Details->CurrentValue;
        $this->ModeofPayment->CurrentValue = null;
        $this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
        $this->Amount->CurrentValue = null;
        $this->Amount->OldValue = $this->Amount->CurrentValue;
        $this->AnyDues->CurrentValue = null;
        $this->AnyDues->OldValue = $this->AnyDues->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->RealizationAmount->CurrentValue = null;
        $this->RealizationAmount->OldValue = $this->RealizationAmount->CurrentValue;
        $this->RealizationStatus->CurrentValue = null;
        $this->RealizationStatus->OldValue = $this->RealizationStatus->CurrentValue;
        $this->RealizationRemarks->CurrentValue = null;
        $this->RealizationRemarks->OldValue = $this->RealizationRemarks->CurrentValue;
        $this->RealizationBatchNo->CurrentValue = null;
        $this->RealizationBatchNo->OldValue = $this->RealizationBatchNo->CurrentValue;
        $this->RealizationDate->CurrentValue = null;
        $this->RealizationDate->OldValue = $this->RealizationDate->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->RIDNO->CurrentValue = null;
        $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->CId->CurrentValue = null;
        $this->CId->OldValue = $this->CId->CurrentValue;
        $this->PartnerName->CurrentValue = null;
        $this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
        $this->PayerType->CurrentValue = null;
        $this->PayerType->OldValue = $this->PayerType->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->Dob->CurrentValue = null;
        $this->Dob->OldValue = $this->Dob->CurrentValue;
        $this->Currency->CurrentValue = null;
        $this->Currency->OldValue = $this->Currency->CurrentValue;
        $this->DiscountRemarks->CurrentValue = null;
        $this->DiscountRemarks->OldValue = $this->DiscountRemarks->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->PatId->CurrentValue = null;
        $this->PatId->OldValue = $this->PatId->CurrentValue;
        $this->DrDepartment->CurrentValue = null;
        $this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
        $this->RefferedBy->CurrentValue = null;
        $this->RefferedBy->OldValue = $this->RefferedBy->CurrentValue;
        $this->CardNumber->CurrentValue = null;
        $this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
        $this->BankName->CurrentValue = null;
        $this->BankName->OldValue = $this->BankName->CurrentValue;
        $this->DrID->CurrentValue = null;
        $this->DrID->OldValue = $this->DrID->CurrentValue;
        $this->BillStatus->CurrentValue = 0;
        $this->ReportHeader->CurrentValue = null;
        $this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
        $this->PharID->CurrentValue = null;
        $this->PharID->OldValue = $this->PharID->CurrentValue;
        $this->_UserName->CurrentValue = null;
        $this->_UserName->OldValue = $this->_UserName->CurrentValue;
        $this->CardType->CurrentValue = null;
        $this->CardType->OldValue = $this->CardType->CurrentValue;
        $this->DiscountAmount->CurrentValue = 0;
        $this->ApprovalNumber->CurrentValue = null;
        $this->ApprovalNumber->OldValue = $this->ApprovalNumber->CurrentValue;
        $this->Cash->CurrentValue = null;
        $this->Cash->OldValue = $this->Cash->CurrentValue;
        $this->Card->CurrentValue = null;
        $this->Card->OldValue = $this->Card->CurrentValue;
        $this->BillType->CurrentValue = OP;
        $this->PartialSave->CurrentValue = null;
        $this->PartialSave->OldValue = $this->PartialSave->CurrentValue;
        $this->PatientGST->CurrentValue = null;
        $this->PatientGST->OldValue = $this->PatientGST->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'BillNumber' first before field var 'x_BillNumber'
        $val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
        if (!$this->BillNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillNumber->Visible = false; // Disable update for API request
            } else {
                $this->BillNumber->setFormValue($val);
            }
        }

        // Check field name 'voucher_type' first before field var 'x_voucher_type'
        $val = $CurrentForm->hasValue("voucher_type") ? $CurrentForm->getValue("voucher_type") : $CurrentForm->getValue("x_voucher_type");
        if (!$this->voucher_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->voucher_type->Visible = false; // Disable update for API request
            } else {
                $this->voucher_type->setFormValue($val);
            }
        }

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
            }
        }

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'Mobile' first before field var 'x_Mobile'
        $val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
        if (!$this->Mobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mobile->Visible = false; // Disable update for API request
            } else {
                $this->Mobile->setFormValue($val);
            }
        }

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
            }
        }

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
            }
        }

        // Check field name 'IP_OP' first before field var 'x_IP_OP'
        $val = $CurrentForm->hasValue("IP_OP") ? $CurrentForm->getValue("IP_OP") : $CurrentForm->getValue("x_IP_OP");
        if (!$this->IP_OP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IP_OP->Visible = false; // Disable update for API request
            } else {
                $this->IP_OP->setFormValue($val);
            }
        }

        // Check field name 'Doctor' first before field var 'x_Doctor'
        $val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
        if (!$this->Doctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Doctor->Visible = false; // Disable update for API request
            } else {
                $this->Doctor->setFormValue($val);
            }
        }

        // Check field name 'Gender' first before field var 'x_Gender'
        $val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
        if (!$this->Gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gender->Visible = false; // Disable update for API request
            } else {
                $this->Gender->setFormValue($val);
            }
        }

        // Check field name 'Details' first before field var 'x_Details'
        $val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
        if (!$this->Details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Details->Visible = false; // Disable update for API request
            } else {
                $this->Details->setFormValue($val);
            }
        }

        // Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
        $val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
        if (!$this->ModeofPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModeofPayment->Visible = false; // Disable update for API request
            } else {
                $this->ModeofPayment->setFormValue($val);
            }
        }

        // Check field name 'Amount' first before field var 'x_Amount'
        $val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
        if (!$this->Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amount->Visible = false; // Disable update for API request
            } else {
                $this->Amount->setFormValue($val);
            }
        }

        // Check field name 'AnyDues' first before field var 'x_AnyDues'
        $val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
        if (!$this->AnyDues->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnyDues->Visible = false; // Disable update for API request
            } else {
                $this->AnyDues->setFormValue($val);
            }
        }

        // Check field name 'createdby' first before field var 'x_createdby'
        $val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
        if (!$this->createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdby->Visible = false; // Disable update for API request
            } else {
                $this->createdby->setFormValue($val);
            }
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
        }

        // Check field name 'RealizationAmount' first before field var 'x_RealizationAmount'
        $val = $CurrentForm->hasValue("RealizationAmount") ? $CurrentForm->getValue("RealizationAmount") : $CurrentForm->getValue("x_RealizationAmount");
        if (!$this->RealizationAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationAmount->Visible = false; // Disable update for API request
            } else {
                $this->RealizationAmount->setFormValue($val);
            }
        }

        // Check field name 'RealizationStatus' first before field var 'x_RealizationStatus'
        $val = $CurrentForm->hasValue("RealizationStatus") ? $CurrentForm->getValue("RealizationStatus") : $CurrentForm->getValue("x_RealizationStatus");
        if (!$this->RealizationStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationStatus->Visible = false; // Disable update for API request
            } else {
                $this->RealizationStatus->setFormValue($val);
            }
        }

        // Check field name 'RealizationRemarks' first before field var 'x_RealizationRemarks'
        $val = $CurrentForm->hasValue("RealizationRemarks") ? $CurrentForm->getValue("RealizationRemarks") : $CurrentForm->getValue("x_RealizationRemarks");
        if (!$this->RealizationRemarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationRemarks->Visible = false; // Disable update for API request
            } else {
                $this->RealizationRemarks->setFormValue($val);
            }
        }

        // Check field name 'RealizationBatchNo' first before field var 'x_RealizationBatchNo'
        $val = $CurrentForm->hasValue("RealizationBatchNo") ? $CurrentForm->getValue("RealizationBatchNo") : $CurrentForm->getValue("x_RealizationBatchNo");
        if (!$this->RealizationBatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationBatchNo->Visible = false; // Disable update for API request
            } else {
                $this->RealizationBatchNo->setFormValue($val);
            }
        }

        // Check field name 'RealizationDate' first before field var 'x_RealizationDate'
        $val = $CurrentForm->hasValue("RealizationDate") ? $CurrentForm->getValue("RealizationDate") : $CurrentForm->getValue("x_RealizationDate");
        if (!$this->RealizationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationDate->Visible = false; // Disable update for API request
            } else {
                $this->RealizationDate->setFormValue($val);
            }
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }

        // Check field name 'RIDNO' first before field var 'x_RIDNO'
        $val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
        if (!$this->RIDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNO->Visible = false; // Disable update for API request
            } else {
                $this->RIDNO->setFormValue($val);
            }
        }

        // Check field name 'TidNo' first before field var 'x_TidNo'
        $val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
        if (!$this->TidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TidNo->Visible = false; // Disable update for API request
            } else {
                $this->TidNo->setFormValue($val);
            }
        }

        // Check field name 'CId' first before field var 'x_CId'
        $val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
        if (!$this->CId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CId->Visible = false; // Disable update for API request
            } else {
                $this->CId->setFormValue($val);
            }
        }

        // Check field name 'PartnerName' first before field var 'x_PartnerName'
        $val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
        if (!$this->PartnerName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerName->Visible = false; // Disable update for API request
            } else {
                $this->PartnerName->setFormValue($val);
            }
        }

        // Check field name 'PayerType' first before field var 'x_PayerType'
        $val = $CurrentForm->hasValue("PayerType") ? $CurrentForm->getValue("PayerType") : $CurrentForm->getValue("x_PayerType");
        if (!$this->PayerType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PayerType->Visible = false; // Disable update for API request
            } else {
                $this->PayerType->setFormValue($val);
            }
        }

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
            }
        }

        // Check field name 'Dob' first before field var 'x_Dob'
        $val = $CurrentForm->hasValue("Dob") ? $CurrentForm->getValue("Dob") : $CurrentForm->getValue("x_Dob");
        if (!$this->Dob->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Dob->Visible = false; // Disable update for API request
            } else {
                $this->Dob->setFormValue($val);
            }
        }

        // Check field name 'Currency' first before field var 'x_Currency'
        $val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
        if (!$this->Currency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Currency->Visible = false; // Disable update for API request
            } else {
                $this->Currency->setFormValue($val);
            }
        }

        // Check field name 'DiscountRemarks' first before field var 'x_DiscountRemarks'
        $val = $CurrentForm->hasValue("DiscountRemarks") ? $CurrentForm->getValue("DiscountRemarks") : $CurrentForm->getValue("x_DiscountRemarks");
        if (!$this->DiscountRemarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountRemarks->Visible = false; // Disable update for API request
            } else {
                $this->DiscountRemarks->setFormValue($val);
            }
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }

        // Check field name 'PatId' first before field var 'x_PatId'
        $val = $CurrentForm->hasValue("PatId") ? $CurrentForm->getValue("PatId") : $CurrentForm->getValue("x_PatId");
        if (!$this->PatId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatId->Visible = false; // Disable update for API request
            } else {
                $this->PatId->setFormValue($val);
            }
        }

        // Check field name 'DrDepartment' first before field var 'x_DrDepartment'
        $val = $CurrentForm->hasValue("DrDepartment") ? $CurrentForm->getValue("DrDepartment") : $CurrentForm->getValue("x_DrDepartment");
        if (!$this->DrDepartment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrDepartment->Visible = false; // Disable update for API request
            } else {
                $this->DrDepartment->setFormValue($val);
            }
        }

        // Check field name 'RefferedBy' first before field var 'x_RefferedBy'
        $val = $CurrentForm->hasValue("RefferedBy") ? $CurrentForm->getValue("RefferedBy") : $CurrentForm->getValue("x_RefferedBy");
        if (!$this->RefferedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefferedBy->Visible = false; // Disable update for API request
            } else {
                $this->RefferedBy->setFormValue($val);
            }
        }

        // Check field name 'CardNumber' first before field var 'x_CardNumber'
        $val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
        if (!$this->CardNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CardNumber->Visible = false; // Disable update for API request
            } else {
                $this->CardNumber->setFormValue($val);
            }
        }

        // Check field name 'BankName' first before field var 'x_BankName'
        $val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
        if (!$this->BankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BankName->Visible = false; // Disable update for API request
            } else {
                $this->BankName->setFormValue($val);
            }
        }

        // Check field name 'DrID' first before field var 'x_DrID'
        $val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
        if (!$this->DrID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrID->Visible = false; // Disable update for API request
            } else {
                $this->DrID->setFormValue($val);
            }
        }

        // Check field name 'BillStatus' first before field var 'x_BillStatus'
        $val = $CurrentForm->hasValue("BillStatus") ? $CurrentForm->getValue("BillStatus") : $CurrentForm->getValue("x_BillStatus");
        if (!$this->BillStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillStatus->Visible = false; // Disable update for API request
            } else {
                $this->BillStatus->setFormValue($val);
            }
        }

        // Check field name 'ReportHeader' first before field var 'x_ReportHeader'
        $val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
        if (!$this->ReportHeader->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReportHeader->Visible = false; // Disable update for API request
            } else {
                $this->ReportHeader->setFormValue($val);
            }
        }

        // Check field name 'PharID' first before field var 'x_PharID'
        $val = $CurrentForm->hasValue("PharID") ? $CurrentForm->getValue("PharID") : $CurrentForm->getValue("x_PharID");
        if (!$this->PharID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PharID->Visible = false; // Disable update for API request
            } else {
                $this->PharID->setFormValue($val);
            }
        }

        // Check field name 'UserName' first before field var 'x__UserName'
        $val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x__UserName");
        if (!$this->_UserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_UserName->Visible = false; // Disable update for API request
            } else {
                $this->_UserName->setFormValue($val);
            }
        }

        // Check field name 'CardType' first before field var 'x_CardType'
        $val = $CurrentForm->hasValue("CardType") ? $CurrentForm->getValue("CardType") : $CurrentForm->getValue("x_CardType");
        if (!$this->CardType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CardType->Visible = false; // Disable update for API request
            } else {
                $this->CardType->setFormValue($val);
            }
        }

        // Check field name 'DiscountAmount' first before field var 'x_DiscountAmount'
        $val = $CurrentForm->hasValue("DiscountAmount") ? $CurrentForm->getValue("DiscountAmount") : $CurrentForm->getValue("x_DiscountAmount");
        if (!$this->DiscountAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountAmount->Visible = false; // Disable update for API request
            } else {
                $this->DiscountAmount->setFormValue($val);
            }
        }

        // Check field name 'ApprovalNumber' first before field var 'x_ApprovalNumber'
        $val = $CurrentForm->hasValue("ApprovalNumber") ? $CurrentForm->getValue("ApprovalNumber") : $CurrentForm->getValue("x_ApprovalNumber");
        if (!$this->ApprovalNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ApprovalNumber->Visible = false; // Disable update for API request
            } else {
                $this->ApprovalNumber->setFormValue($val);
            }
        }

        // Check field name 'Cash' first before field var 'x_Cash'
        $val = $CurrentForm->hasValue("Cash") ? $CurrentForm->getValue("Cash") : $CurrentForm->getValue("x_Cash");
        if (!$this->Cash->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cash->Visible = false; // Disable update for API request
            } else {
                $this->Cash->setFormValue($val);
            }
        }

        // Check field name 'Card' first before field var 'x_Card'
        $val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
        if (!$this->Card->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Card->Visible = false; // Disable update for API request
            } else {
                $this->Card->setFormValue($val);
            }
        }

        // Check field name 'BillType' first before field var 'x_BillType'
        $val = $CurrentForm->hasValue("BillType") ? $CurrentForm->getValue("BillType") : $CurrentForm->getValue("x_BillType");
        if (!$this->BillType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillType->Visible = false; // Disable update for API request
            } else {
                $this->BillType->setFormValue($val);
            }
        }

        // Check field name 'PartialSave' first before field var 'x_PartialSave'
        $val = $CurrentForm->hasValue("PartialSave") ? $CurrentForm->getValue("PartialSave") : $CurrentForm->getValue("x_PartialSave");
        if (!$this->PartialSave->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartialSave->Visible = false; // Disable update for API request
            } else {
                $this->PartialSave->setFormValue($val);
            }
        }

        // Check field name 'PatientGST' first before field var 'x_PatientGST'
        $val = $CurrentForm->hasValue("PatientGST") ? $CurrentForm->getValue("PatientGST") : $CurrentForm->getValue("x_PatientGST");
        if (!$this->PatientGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientGST->Visible = false; // Disable update for API request
            } else {
                $this->PatientGST->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
        $this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->IP_OP->CurrentValue = $this->IP_OP->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
        $this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
        $this->RealizationStatus->CurrentValue = $this->RealizationStatus->FormValue;
        $this->RealizationRemarks->CurrentValue = $this->RealizationRemarks->FormValue;
        $this->RealizationBatchNo->CurrentValue = $this->RealizationBatchNo->FormValue;
        $this->RealizationDate->CurrentValue = $this->RealizationDate->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->CId->CurrentValue = $this->CId->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PayerType->CurrentValue = $this->PayerType->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->Dob->CurrentValue = $this->Dob->FormValue;
        $this->Currency->CurrentValue = $this->Currency->FormValue;
        $this->DiscountRemarks->CurrentValue = $this->DiscountRemarks->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->PatId->CurrentValue = $this->PatId->FormValue;
        $this->DrDepartment->CurrentValue = $this->DrDepartment->FormValue;
        $this->RefferedBy->CurrentValue = $this->RefferedBy->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
        $this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
        $this->PharID->CurrentValue = $this->PharID->FormValue;
        $this->_UserName->CurrentValue = $this->_UserName->FormValue;
        $this->CardType->CurrentValue = $this->CardType->FormValue;
        $this->DiscountAmount->CurrentValue = $this->DiscountAmount->FormValue;
        $this->ApprovalNumber->CurrentValue = $this->ApprovalNumber->FormValue;
        $this->Cash->CurrentValue = $this->Cash->FormValue;
        $this->Card->CurrentValue = $this->Card->FormValue;
        $this->BillType->CurrentValue = $this->BillType->FormValue;
        $this->PartialSave->CurrentValue = $this->PartialSave->FormValue;
        $this->PatientGST->CurrentValue = $this->PatientGST->FormValue;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->Age->setDbValue($row['Age']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->IP_OP->setDbValue($row['IP_OP']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Gender->setDbValue($row['Gender']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->RealizationAmount->setDbValue($row['RealizationAmount']);
        $this->RealizationStatus->setDbValue($row['RealizationStatus']);
        $this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
        $this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
        $this->RealizationDate->setDbValue($row['RealizationDate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->CId->setDbValue($row['CId']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PayerType->setDbValue($row['PayerType']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Dob->setDbValue($row['Dob']);
        $this->Currency->setDbValue($row['Currency']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->PatId->setDbValue($row['PatId']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->PharID->setDbValue($row['PharID']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->CardType->setDbValue($row['CardType']);
        $this->DiscountAmount->setDbValue($row['DiscountAmount']);
        $this->ApprovalNumber->setDbValue($row['ApprovalNumber']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
        $this->BillType->setDbValue($row['BillType']);
        $this->PartialSave->setDbValue($row['PartialSave']);
        $this->PatientGST->setDbValue($row['PatientGST']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['BillNumber'] = $this->BillNumber->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['IP_OP'] = $this->IP_OP->CurrentValue;
        $row['Doctor'] = $this->Doctor->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['Details'] = $this->Details->CurrentValue;
        $row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['AnyDues'] = $this->AnyDues->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
        $row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
        $row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
        $row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
        $row['RealizationDate'] = $this->RealizationDate->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['RIDNO'] = $this->RIDNO->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['CId'] = $this->CId->CurrentValue;
        $row['PartnerName'] = $this->PartnerName->CurrentValue;
        $row['PayerType'] = $this->PayerType->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['Dob'] = $this->Dob->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['DiscountRemarks'] = $this->DiscountRemarks->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['PatId'] = $this->PatId->CurrentValue;
        $row['DrDepartment'] = $this->DrDepartment->CurrentValue;
        $row['RefferedBy'] = $this->RefferedBy->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['DrID'] = $this->DrID->CurrentValue;
        $row['BillStatus'] = $this->BillStatus->CurrentValue;
        $row['ReportHeader'] = $this->ReportHeader->CurrentValue;
        $row['PharID'] = $this->PharID->CurrentValue;
        $row['UserName'] = $this->_UserName->CurrentValue;
        $row['CardType'] = $this->CardType->CurrentValue;
        $row['DiscountAmount'] = $this->DiscountAmount->CurrentValue;
        $row['ApprovalNumber'] = $this->ApprovalNumber->CurrentValue;
        $row['Cash'] = $this->Cash->CurrentValue;
        $row['Card'] = $this->Card->CurrentValue;
        $row['BillType'] = $this->BillType->CurrentValue;
        $row['PartialSave'] = $this->PartialSave->CurrentValue;
        $row['PatientGST'] = $this->PatientGST->CurrentValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load old record
        $this->OldRecordset = null;
        $validKey = $this->OldKey != "";
        if ($validKey) {
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $this->OldRecordset = LoadRecordset($sql, $conn);
        }
        $this->loadRowValues($this->OldRecordset); // Load row values
        return $validKey;
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
        if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue))) {
            $this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue))) {
            $this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue))) {
            $this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // BillNumber

        // voucher_type

        // Reception

        // PatientId

        // PatientName

        // Mobile

        // Age

        // mrnno

        // IP_OP

        // Doctor

        // Gender

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

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

        // profilePic

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

        // PharID

        // UserName

        // CardType

        // DiscountAmount

        // ApprovalNumber

        // Cash

        // Card

        // BillType

        // PartialSave

        // PatientGST
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

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

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // IP_OP
            $this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
            $this->IP_OP->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

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

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
            $this->createddatetime->ViewCustomAttributes = "";

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
            $curVal = trim(strval($this->RIDNO->CurrentValue));
            if ($curVal != "") {
                $this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
                if ($this->RIDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
                    } else {
                        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                    }
                }
            } else {
                $this->RIDNO->ViewValue = null;
            }
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

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

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
                    $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
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

            // PharID
            $this->PharID->ViewValue = $this->PharID->CurrentValue;
            $this->PharID->ViewValue = FormatNumber($this->PharID->ViewValue, 0, -2, -2, -2);
            $this->PharID->ViewCustomAttributes = "";

            // UserName
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";

            // CardType
            if (strval($this->CardType->CurrentValue) != "") {
                $this->CardType->ViewValue = $this->CardType->optionCaption($this->CardType->CurrentValue);
            } else {
                $this->CardType->ViewValue = null;
            }
            $this->CardType->ViewCustomAttributes = "";

            // DiscountAmount
            $this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
            $this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, $this->DiscountAmount->DefaultDecimalPrecision);
            $this->DiscountAmount->ViewCustomAttributes = "";

            // ApprovalNumber
            $this->ApprovalNumber->ViewValue = $this->ApprovalNumber->CurrentValue;
            $this->ApprovalNumber->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // BillType
            if (strval($this->BillType->CurrentValue) != "") {
                $this->BillType->ViewValue = $this->BillType->optionCaption($this->BillType->CurrentValue);
            } else {
                $this->BillType->ViewValue = null;
            }
            $this->BillType->ViewCustomAttributes = "";

            // PartialSave
            if (strval($this->PartialSave->CurrentValue) != "") {
                $this->PartialSave->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->PartialSave->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->PartialSave->ViewValue->add($this->PartialSave->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->PartialSave->ViewValue = null;
            }
            $this->PartialSave->ViewCustomAttributes = "";

            // PatientGST
            $this->PatientGST->ViewValue = $this->PatientGST->CurrentValue;
            $this->PatientGST->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";
            $this->voucher_type->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";
            $this->IP_OP->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

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

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

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

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
            $this->PharID->TooltipValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";
            $this->_UserName->TooltipValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";
            $this->CardType->TooltipValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";
            $this->DiscountAmount->TooltipValue = "";

            // ApprovalNumber
            $this->ApprovalNumber->LinkCustomAttributes = "";
            $this->ApprovalNumber->HrefValue = "";
            $this->ApprovalNumber->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";
            $this->BillType->TooltipValue = "";

            // PartialSave
            $this->PartialSave->LinkCustomAttributes = "";
            $this->PartialSave->HrefValue = "";
            $this->PartialSave->TooltipValue = "";

            // PatientGST
            $this->PatientGST->LinkCustomAttributes = "";
            $this->PatientGST->HrefValue = "";
            $this->PatientGST->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

            // Reception
            $this->Reception->EditCustomAttributes = "";
            $curVal = trim(strval($this->Reception->CurrentValue));
            if ($curVal != "") {
                $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
            } else {
                $this->Reception->ViewValue = $this->Reception->Lookup !== null && is_array($this->Reception->Lookup->Options) ? $curVal : null;
            }
            if ($this->Reception->ViewValue !== null) { // Load from cache
                $this->Reception->EditValue = array_values($this->Reception->Lookup->Options);
                if ($this->Reception->ViewValue == "") {
                    $this->Reception->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Reception->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Reception->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                    $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                } else {
                    $this->Reception->ViewValue = $Language->phrase("PleaseSelect");
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
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // IP_OP
            $this->IP_OP->EditAttrs["class"] = "form-control";
            $this->IP_OP->EditCustomAttributes = "";
            if (!$this->IP_OP->Raw) {
                $this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
            }
            $this->IP_OP->EditValue = HtmlEncode($this->IP_OP->CurrentValue);
            $this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            if (!$this->Doctor->Raw) {
                $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
            }
            $this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            } else {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== null && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : null;
            }
            if ($this->ModeofPayment->ViewValue !== null) { // Load from cache
                $this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
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
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
            if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
                $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
            }

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // createdby

            // createddatetime

            // RealizationAmount
            $this->RealizationAmount->EditAttrs["class"] = "form-control";
            $this->RealizationAmount->EditCustomAttributes = "";
            $this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
            $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
            if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue)) {
                $this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
            }

            // RealizationStatus
            $this->RealizationStatus->EditAttrs["class"] = "form-control";
            $this->RealizationStatus->EditCustomAttributes = "";
            if (!$this->RealizationStatus->Raw) {
                $this->RealizationStatus->CurrentValue = HtmlDecode($this->RealizationStatus->CurrentValue);
            }
            $this->RealizationStatus->EditValue = HtmlEncode($this->RealizationStatus->CurrentValue);
            $this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

            // RealizationRemarks
            $this->RealizationRemarks->EditAttrs["class"] = "form-control";
            $this->RealizationRemarks->EditCustomAttributes = "";
            if (!$this->RealizationRemarks->Raw) {
                $this->RealizationRemarks->CurrentValue = HtmlDecode($this->RealizationRemarks->CurrentValue);
            }
            $this->RealizationRemarks->EditValue = HtmlEncode($this->RealizationRemarks->CurrentValue);
            $this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

            // RealizationBatchNo
            $this->RealizationBatchNo->EditAttrs["class"] = "form-control";
            $this->RealizationBatchNo->EditCustomAttributes = "";
            if (!$this->RealizationBatchNo->Raw) {
                $this->RealizationBatchNo->CurrentValue = HtmlDecode($this->RealizationBatchNo->CurrentValue);
            }
            $this->RealizationBatchNo->EditValue = HtmlEncode($this->RealizationBatchNo->CurrentValue);
            $this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

            // RealizationDate
            $this->RealizationDate->EditAttrs["class"] = "form-control";
            $this->RealizationDate->EditCustomAttributes = "";
            if (!$this->RealizationDate->Raw) {
                $this->RealizationDate->CurrentValue = HtmlDecode($this->RealizationDate->CurrentValue);
            }
            $this->RealizationDate->EditValue = HtmlEncode($this->RealizationDate->CurrentValue);
            $this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

            // HospID

            // RIDNO
            $this->RIDNO->EditCustomAttributes = "";
            $curVal = trim(strval($this->RIDNO->CurrentValue));
            if ($curVal != "") {
                $this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
            } else {
                $this->RIDNO->ViewValue = $this->RIDNO->Lookup !== null && is_array($this->RIDNO->Lookup->Options) ? $curVal : null;
            }
            if ($this->RIDNO->ViewValue !== null) { // Load from cache
                $this->RIDNO->EditValue = array_values($this->RIDNO->Lookup->Options);
                if ($this->RIDNO->ViewValue == "") {
                    $this->RIDNO->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->RIDNO->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->RIDNO->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RIDNO->Lookup->renderViewRow($rswrk[0]);
                    $this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
                } else {
                    $this->RIDNO->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->RIDNO->EditValue = $arwrk;
            }
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // CId
            $this->CId->EditCustomAttributes = "";
            $curVal = trim(strval($this->CId->CurrentValue));
            if ($curVal != "") {
                $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
            } else {
                $this->CId->ViewValue = $this->CId->Lookup !== null && is_array($this->CId->Lookup->Options) ? $curVal : null;
            }
            if ($this->CId->ViewValue !== null) { // Load from cache
                $this->CId->EditValue = array_values($this->CId->Lookup->Options);
                if ($this->CId->ViewValue == "") {
                    $this->CId->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->CId->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->CId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                    $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                } else {
                    $this->CId->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->CId->EditValue = $arwrk;
            }
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PayerType
            $this->PayerType->EditAttrs["class"] = "form-control";
            $this->PayerType->EditCustomAttributes = "";
            if (!$this->PayerType->Raw) {
                $this->PayerType->CurrentValue = HtmlDecode($this->PayerType->CurrentValue);
            }
            $this->PayerType->EditValue = HtmlEncode($this->PayerType->CurrentValue);
            $this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Dob
            $this->Dob->EditAttrs["class"] = "form-control";
            $this->Dob->EditCustomAttributes = "";
            if (!$this->Dob->Raw) {
                $this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
            }
            $this->Dob->EditValue = HtmlEncode($this->Dob->CurrentValue);
            $this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // DiscountRemarks
            $this->DiscountRemarks->EditAttrs["class"] = "form-control";
            $this->DiscountRemarks->EditCustomAttributes = "";
            if (!$this->DiscountRemarks->Raw) {
                $this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
            }
            $this->DiscountRemarks->EditValue = HtmlEncode($this->DiscountRemarks->CurrentValue);
            $this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // PatId
            $this->PatId->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatId->CurrentValue));
            if ($curVal != "") {
                $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
            } else {
                $this->PatId->ViewValue = $this->PatId->Lookup !== null && is_array($this->PatId->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatId->ViewValue !== null) { // Load from cache
                $this->PatId->EditValue = array_values($this->PatId->Lookup->Options);
                if ($this->PatId->ViewValue == "") {
                    $this->PatId->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PatId->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PatId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                    $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                } else {
                    $this->PatId->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->PatId->EditValue = $arwrk;
            }
            $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

            // DrDepartment
            $this->DrDepartment->EditAttrs["class"] = "form-control";
            $this->DrDepartment->EditCustomAttributes = "";
            if (!$this->DrDepartment->Raw) {
                $this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
            }
            $this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->CurrentValue);
            $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

            // RefferedBy
            $this->RefferedBy->EditCustomAttributes = "";
            $curVal = trim(strval($this->RefferedBy->CurrentValue));
            if ($curVal != "") {
                $this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
            } else {
                $this->RefferedBy->ViewValue = $this->RefferedBy->Lookup !== null && is_array($this->RefferedBy->Lookup->Options) ? $curVal : null;
            }
            if ($this->RefferedBy->ViewValue !== null) { // Load from cache
                $this->RefferedBy->EditValue = array_values($this->RefferedBy->Lookup->Options);
                if ($this->RefferedBy->ViewValue == "") {
                    $this->RefferedBy->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`reference`" . SearchString("=", $this->RefferedBy->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->RefferedBy->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->RefferedBy->Lookup->renderViewRow($rswrk[0]);
                    $this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
                } else {
                    $this->RefferedBy->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->RefferedBy->EditValue = $arwrk;
            }
            $this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // DrID
            $this->DrID->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrID->CurrentValue));
            if ($curVal != "") {
                $this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
            } else {
                $this->DrID->ViewValue = $this->DrID->Lookup !== null && is_array($this->DrID->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrID->ViewValue !== null) { // Load from cache
                $this->DrID->EditValue = array_values($this->DrID->Lookup->Options);
                if ($this->DrID->ViewValue == "") {
                    $this->DrID->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->DrID->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->DrID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                    $this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
                } else {
                    $this->DrID->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DrID->EditValue = $arwrk;
            }
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // ReportHeader
            $this->ReportHeader->EditCustomAttributes = "";
            $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // PharID

            // UserName

            // CardType
            $this->CardType->EditCustomAttributes = "";
            $this->CardType->EditValue = $this->CardType->options(false);
            $this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

            // DiscountAmount
            $this->DiscountAmount->EditAttrs["class"] = "form-control";
            $this->DiscountAmount->EditCustomAttributes = "";
            $this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
            $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
            if (strval($this->DiscountAmount->EditValue) != "" && is_numeric($this->DiscountAmount->EditValue)) {
                $this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -1, -2, 0);
            }

            // ApprovalNumber
            $this->ApprovalNumber->EditAttrs["class"] = "form-control";
            $this->ApprovalNumber->EditCustomAttributes = "";
            if (!$this->ApprovalNumber->Raw) {
                $this->ApprovalNumber->CurrentValue = HtmlDecode($this->ApprovalNumber->CurrentValue);
            }
            $this->ApprovalNumber->EditValue = HtmlEncode($this->ApprovalNumber->CurrentValue);
            $this->ApprovalNumber->PlaceHolder = RemoveHtml($this->ApprovalNumber->caption());

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = HtmlEncode($this->Cash->CurrentValue);
            $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
            if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
                $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
            }

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
            if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
                $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
            }

            // BillType
            $this->BillType->EditCustomAttributes = "";
            $this->BillType->EditValue = $this->BillType->options(false);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // PartialSave
            $this->PartialSave->EditCustomAttributes = "";
            $this->PartialSave->EditValue = $this->PartialSave->options(false);
            $this->PartialSave->PlaceHolder = RemoveHtml($this->PartialSave->caption());

            // PatientGST
            $this->PatientGST->EditAttrs["class"] = "form-control";
            $this->PatientGST->EditCustomAttributes = "";
            if (!$this->PatientGST->Raw) {
                $this->PatientGST->CurrentValue = HtmlDecode($this->PatientGST->CurrentValue);
            }
            $this->PatientGST->EditValue = HtmlEncode($this->PatientGST->CurrentValue);
            $this->PatientGST->PlaceHolder = RemoveHtml($this->PatientGST->caption());

            // Add refer script

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";

            // RealizationStatus
            $this->RealizationStatus->LinkCustomAttributes = "";
            $this->RealizationStatus->HrefValue = "";

            // RealizationRemarks
            $this->RealizationRemarks->LinkCustomAttributes = "";
            $this->RealizationRemarks->HrefValue = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->LinkCustomAttributes = "";
            $this->RealizationBatchNo->HrefValue = "";

            // RealizationDate
            $this->RealizationDate->LinkCustomAttributes = "";
            $this->RealizationDate->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PayerType
            $this->PayerType->LinkCustomAttributes = "";
            $this->PayerType->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Dob
            $this->Dob->LinkCustomAttributes = "";
            $this->Dob->HrefValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";

            // DiscountRemarks
            $this->DiscountRemarks->LinkCustomAttributes = "";
            $this->DiscountRemarks->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";

            // DrDepartment
            $this->DrDepartment->LinkCustomAttributes = "";
            $this->DrDepartment->HrefValue = "";

            // RefferedBy
            $this->RefferedBy->LinkCustomAttributes = "";
            $this->RefferedBy->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";

            // ApprovalNumber
            $this->ApprovalNumber->LinkCustomAttributes = "";
            $this->ApprovalNumber->HrefValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";

            // PartialSave
            $this->PartialSave->LinkCustomAttributes = "";
            $this->PartialSave->HrefValue = "";

            // PatientGST
            $this->PatientGST->LinkCustomAttributes = "";
            $this->PatientGST->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->BillNumber->Required) {
            if (!$this->BillNumber->IsDetailKey && EmptyValue($this->BillNumber->FormValue)) {
                $this->BillNumber->addErrorMessage(str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
            }
        }
        if ($this->voucher_type->Required) {
            if (!$this->voucher_type->IsDetailKey && EmptyValue($this->voucher_type->FormValue)) {
                $this->voucher_type->addErrorMessage(str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->Mobile->Required) {
            if (!$this->Mobile->IsDetailKey && EmptyValue($this->Mobile->FormValue)) {
                $this->Mobile->addErrorMessage(str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->IP_OP->Required) {
            if (!$this->IP_OP->IsDetailKey && EmptyValue($this->IP_OP->FormValue)) {
                $this->IP_OP->addErrorMessage(str_replace("%s", $this->IP_OP->caption(), $this->IP_OP->RequiredErrorMessage));
            }
        }
        if ($this->Doctor->Required) {
            if (!$this->Doctor->IsDetailKey && EmptyValue($this->Doctor->FormValue)) {
                $this->Doctor->addErrorMessage(str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
            }
        }
        if ($this->Gender->Required) {
            if (!$this->Gender->IsDetailKey && EmptyValue($this->Gender->FormValue)) {
                $this->Gender->addErrorMessage(str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
            }
        }
        if ($this->Details->Required) {
            if (!$this->Details->IsDetailKey && EmptyValue($this->Details->FormValue)) {
                $this->Details->addErrorMessage(str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
            }
        }
        if ($this->ModeofPayment->Required) {
            if (!$this->ModeofPayment->IsDetailKey && EmptyValue($this->ModeofPayment->FormValue)) {
                $this->ModeofPayment->addErrorMessage(str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
            }
        }
        if ($this->Amount->Required) {
            if (!$this->Amount->IsDetailKey && EmptyValue($this->Amount->FormValue)) {
                $this->Amount->addErrorMessage(str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Amount->FormValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if ($this->AnyDues->Required) {
            if (!$this->AnyDues->IsDetailKey && EmptyValue($this->AnyDues->FormValue)) {
                $this->AnyDues->addErrorMessage(str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
            }
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if ($this->RealizationAmount->Required) {
            if (!$this->RealizationAmount->IsDetailKey && EmptyValue($this->RealizationAmount->FormValue)) {
                $this->RealizationAmount->addErrorMessage(str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RealizationAmount->FormValue)) {
            $this->RealizationAmount->addErrorMessage($this->RealizationAmount->getErrorMessage(false));
        }
        if ($this->RealizationStatus->Required) {
            if (!$this->RealizationStatus->IsDetailKey && EmptyValue($this->RealizationStatus->FormValue)) {
                $this->RealizationStatus->addErrorMessage(str_replace("%s", $this->RealizationStatus->caption(), $this->RealizationStatus->RequiredErrorMessage));
            }
        }
        if ($this->RealizationRemarks->Required) {
            if (!$this->RealizationRemarks->IsDetailKey && EmptyValue($this->RealizationRemarks->FormValue)) {
                $this->RealizationRemarks->addErrorMessage(str_replace("%s", $this->RealizationRemarks->caption(), $this->RealizationRemarks->RequiredErrorMessage));
            }
        }
        if ($this->RealizationBatchNo->Required) {
            if (!$this->RealizationBatchNo->IsDetailKey && EmptyValue($this->RealizationBatchNo->FormValue)) {
                $this->RealizationBatchNo->addErrorMessage(str_replace("%s", $this->RealizationBatchNo->caption(), $this->RealizationBatchNo->RequiredErrorMessage));
            }
        }
        if ($this->RealizationDate->Required) {
            if (!$this->RealizationDate->IsDetailKey && EmptyValue($this->RealizationDate->FormValue)) {
                $this->RealizationDate->addErrorMessage(str_replace("%s", $this->RealizationDate->caption(), $this->RealizationDate->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->RIDNO->Required) {
            if (!$this->RIDNO->IsDetailKey && EmptyValue($this->RIDNO->FormValue)) {
                $this->RIDNO->addErrorMessage(str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->CId->Required) {
            if (!$this->CId->IsDetailKey && EmptyValue($this->CId->FormValue)) {
                $this->CId->addErrorMessage(str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->PayerType->Required) {
            if (!$this->PayerType->IsDetailKey && EmptyValue($this->PayerType->FormValue)) {
                $this->PayerType->addErrorMessage(str_replace("%s", $this->PayerType->caption(), $this->PayerType->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->Dob->Required) {
            if (!$this->Dob->IsDetailKey && EmptyValue($this->Dob->FormValue)) {
                $this->Dob->addErrorMessage(str_replace("%s", $this->Dob->caption(), $this->Dob->RequiredErrorMessage));
            }
        }
        if ($this->Currency->Required) {
            if (!$this->Currency->IsDetailKey && EmptyValue($this->Currency->FormValue)) {
                $this->Currency->addErrorMessage(str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
            }
        }
        if ($this->DiscountRemarks->Required) {
            if (!$this->DiscountRemarks->IsDetailKey && EmptyValue($this->DiscountRemarks->FormValue)) {
                $this->DiscountRemarks->addErrorMessage(str_replace("%s", $this->DiscountRemarks->caption(), $this->DiscountRemarks->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->PatId->Required) {
            if (!$this->PatId->IsDetailKey && EmptyValue($this->PatId->FormValue)) {
                $this->PatId->addErrorMessage(str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
            }
        }
        if ($this->DrDepartment->Required) {
            if (!$this->DrDepartment->IsDetailKey && EmptyValue($this->DrDepartment->FormValue)) {
                $this->DrDepartment->addErrorMessage(str_replace("%s", $this->DrDepartment->caption(), $this->DrDepartment->RequiredErrorMessage));
            }
        }
        if ($this->RefferedBy->Required) {
            if (!$this->RefferedBy->IsDetailKey && EmptyValue($this->RefferedBy->FormValue)) {
                $this->RefferedBy->addErrorMessage(str_replace("%s", $this->RefferedBy->caption(), $this->RefferedBy->RequiredErrorMessage));
            }
        }
        if ($this->CardNumber->Required) {
            if (!$this->CardNumber->IsDetailKey && EmptyValue($this->CardNumber->FormValue)) {
                $this->CardNumber->addErrorMessage(str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
            }
        }
        if ($this->BankName->Required) {
            if (!$this->BankName->IsDetailKey && EmptyValue($this->BankName->FormValue)) {
                $this->BankName->addErrorMessage(str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
            }
        }
        if ($this->DrID->Required) {
            if (!$this->DrID->IsDetailKey && EmptyValue($this->DrID->FormValue)) {
                $this->DrID->addErrorMessage(str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
            }
        }
        if ($this->BillStatus->Required) {
            if (!$this->BillStatus->IsDetailKey && EmptyValue($this->BillStatus->FormValue)) {
                $this->BillStatus->addErrorMessage(str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BillStatus->FormValue)) {
            $this->BillStatus->addErrorMessage($this->BillStatus->getErrorMessage(false));
        }
        if ($this->ReportHeader->Required) {
            if ($this->ReportHeader->FormValue == "") {
                $this->ReportHeader->addErrorMessage(str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
            }
        }
        if ($this->PharID->Required) {
            if (!$this->PharID->IsDetailKey && EmptyValue($this->PharID->FormValue)) {
                $this->PharID->addErrorMessage(str_replace("%s", $this->PharID->caption(), $this->PharID->RequiredErrorMessage));
            }
        }
        if ($this->_UserName->Required) {
            if (!$this->_UserName->IsDetailKey && EmptyValue($this->_UserName->FormValue)) {
                $this->_UserName->addErrorMessage(str_replace("%s", $this->_UserName->caption(), $this->_UserName->RequiredErrorMessage));
            }
        }
        if ($this->CardType->Required) {
            if ($this->CardType->FormValue == "") {
                $this->CardType->addErrorMessage(str_replace("%s", $this->CardType->caption(), $this->CardType->RequiredErrorMessage));
            }
        }
        if ($this->DiscountAmount->Required) {
            if (!$this->DiscountAmount->IsDetailKey && EmptyValue($this->DiscountAmount->FormValue)) {
                $this->DiscountAmount->addErrorMessage(str_replace("%s", $this->DiscountAmount->caption(), $this->DiscountAmount->RequiredErrorMessage));
            }
        }
        if ($this->ApprovalNumber->Required) {
            if (!$this->ApprovalNumber->IsDetailKey && EmptyValue($this->ApprovalNumber->FormValue)) {
                $this->ApprovalNumber->addErrorMessage(str_replace("%s", $this->ApprovalNumber->caption(), $this->ApprovalNumber->RequiredErrorMessage));
            }
        }
        if ($this->Cash->Required) {
            if (!$this->Cash->IsDetailKey && EmptyValue($this->Cash->FormValue)) {
                $this->Cash->addErrorMessage(str_replace("%s", $this->Cash->caption(), $this->Cash->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Cash->FormValue)) {
            $this->Cash->addErrorMessage($this->Cash->getErrorMessage(false));
        }
        if ($this->Card->Required) {
            if (!$this->Card->IsDetailKey && EmptyValue($this->Card->FormValue)) {
                $this->Card->addErrorMessage(str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Card->FormValue)) {
            $this->Card->addErrorMessage($this->Card->getErrorMessage(false));
        }
        if ($this->BillType->Required) {
            if ($this->BillType->FormValue == "") {
                $this->BillType->addErrorMessage(str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
            }
        }
        if ($this->PartialSave->Required) {
            if ($this->PartialSave->FormValue == "") {
                $this->PartialSave->addErrorMessage(str_replace("%s", $this->PartialSave->caption(), $this->PartialSave->RequiredErrorMessage));
            }
        }
        if ($this->PatientGST->Required) {
            if (!$this->PatientGST->IsDetailKey && EmptyValue($this->PatientGST->FormValue)) {
                $this->PatientGST->addErrorMessage(str_replace("%s", $this->PatientGST->caption(), $this->PatientGST->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("PharmacyPharledGrid");
        if (in_array("pharmacy_pharled", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Begin transaction
        if ($this->getCurrentDetailTable() != "") {
            $conn->beginTransaction();
        }

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // BillNumber
        $this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, null, false);

        // voucher_type
        $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, false);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // IP_OP
        $this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, null, false);

        // Doctor
        $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // Details
        $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // AnyDues
        $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // RealizationAmount
        $this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, null, false);

        // RealizationStatus
        $this->RealizationStatus->setDbValueDef($rsnew, $this->RealizationStatus->CurrentValue, null, false);

        // RealizationRemarks
        $this->RealizationRemarks->setDbValueDef($rsnew, $this->RealizationRemarks->CurrentValue, null, false);

        // RealizationBatchNo
        $this->RealizationBatchNo->setDbValueDef($rsnew, $this->RealizationBatchNo->CurrentValue, null, false);

        // RealizationDate
        $this->RealizationDate->setDbValueDef($rsnew, $this->RealizationDate->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // RIDNO
        $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // CId
        $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, false);

        // PartnerName
        $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, false);

        // PayerType
        $this->PayerType->setDbValueDef($rsnew, $this->PayerType->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // Dob
        $this->Dob->setDbValueDef($rsnew, $this->Dob->CurrentValue, null, false);

        // Currency
        $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, false);

        // DiscountRemarks
        $this->DiscountRemarks->setDbValueDef($rsnew, $this->DiscountRemarks->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // PatId
        $this->PatId->setDbValueDef($rsnew, $this->PatId->CurrentValue, null, false);

        // DrDepartment
        $this->DrDepartment->setDbValueDef($rsnew, $this->DrDepartment->CurrentValue, null, false);

        // RefferedBy
        $this->RefferedBy->setDbValueDef($rsnew, $this->RefferedBy->CurrentValue, null, false);

        // CardNumber
        $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, false);

        // BankName
        $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, false);

        // DrID
        $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, false);

        // BillStatus
        $this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, null, strval($this->BillStatus->CurrentValue) == "");

        // ReportHeader
        $this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, null, false);

        // PharID
        $this->PharID->CurrentValue = PharmacyID();
        $this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, null);

        // UserName
        $this->_UserName->CurrentValue = GetUserName();
        $this->_UserName->setDbValueDef($rsnew, $this->_UserName->CurrentValue, null);

        // CardType
        $this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, null, false);

        // DiscountAmount
        $this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, null, false);

        // ApprovalNumber
        $this->ApprovalNumber->setDbValueDef($rsnew, $this->ApprovalNumber->CurrentValue, null, false);

        // Cash
        $this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, null, false);

        // Card
        $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, false);

        // BillType
        $this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, null, false);

        // PartialSave
        $this->PartialSave->setDbValueDef($rsnew, $this->PartialSave->CurrentValue, null, false);

        // PatientGST
        $this->PatientGST->setDbValueDef($rsnew, $this->PatientGST->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        $addRow = false;
        if ($insertRow) {
            try {
                $addRow = $this->insert($rsnew);
            } catch (\Exception $e) {
                $this->setFailureMessage($e->getMessage());
            }
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }

        // Add detail records
        if ($addRow) {
            $detailTblVar = explode(",", $this->getCurrentDetailTable());
            $detailPage = Container("PharmacyPharledGrid");
            if (in_array("pharmacy_pharled", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->pbv->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "pharmacy_pharled"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->pbv->setSessionValue(""); // Clear master key if insert failed
                }
            }
        }

        // Commit/Rollback transaction
        if ($this->getCurrentDetailTable() != "") {
            if ($addRow) {
                $conn->commit(); // Commit transaction
            } else {
                $conn->rollback(); // Rollback transaction
            }
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
    }

    // Set up detail parms based on QueryString
    protected function setupDetailParms()
    {
        // Get the keys for master table
        $detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
        if ($detailTblVar !== null) {
            $this->setCurrentDetailTable($detailTblVar);
        } else {
            $detailTblVar = $this->getCurrentDetailTable();
        }
        if ($detailTblVar != "") {
            $detailTblVar = explode(",", $detailTblVar);
            if (in_array("pharmacy_pharled", $detailTblVar)) {
                $detailPageObj = Container("PharmacyPharledGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->pbv->IsDetailKey = true;
                    $detailPageObj->pbv->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->pbv->setSessionValue($detailPageObj->pbv->CurrentValue);
                    $detailPageObj->pbt->setSessionValue(""); // Clear session key
                    $detailPageObj->mrnno->setSessionValue(""); // Clear session key
                    $detailPageObj->PatID->setSessionValue(""); // Clear session key
                    $detailPageObj->Reception->setSessionValue(""); // Clear session key
                }
            }
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyBillingVoucherList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
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
                case "x_RIDNO":
                    break;
                case "x_CId":
                    break;
                case "x_PatId":
                    break;
                case "x_RefferedBy":
                    break;
                case "x_DrID":
                    break;
                case "x_ReportHeader":
                    break;
                case "x_CardType":
                    break;
                case "x_BillType":
                    break;
                case "x_PartialSave":
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
