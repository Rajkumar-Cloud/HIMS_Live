<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StorePaymentAdd extends StorePayment
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_payment';

    // Page object name
    public $PageObjName = "StorePaymentAdd";

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

        // Table object (store_payment)
        if (!isset($GLOBALS["store_payment"]) || get_class($GLOBALS["store_payment"]) == PROJECT_NAMESPACE . "store_payment") {
            $GLOBALS["store_payment"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_payment');
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
                $doc = new $class(Container("store_payment"));
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
                    if ($pageName == "StorePaymentView") {
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
        $this->PAYNO->setVisibility();
        $this->DT->setVisibility();
        $this->YM->setVisibility();
        $this->PC->setVisibility();
        $this->Customercode->setVisibility();
        $this->Customername->setVisibility();
        $this->pharmacy_pocol->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->EEmail->setVisibility();
        $this->HospID->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->PharmacyID->setVisibility();
        $this->BillTotalValue->setVisibility();
        $this->GRNTotalValue->setVisibility();
        $this->BillDiscount->setVisibility();
        $this->BillUpload->setVisibility();
        $this->TransPort->setVisibility();
        $this->AnyOther->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->BankName->setVisibility();
        $this->AccountNumber->setVisibility();
        $this->chequeNumber->setVisibility();
        $this->Remarks->setVisibility();
        $this->SeectPaymentMode->setVisibility();
        $this->PaidAmount->setVisibility();
        $this->Currency->setVisibility();
        $this->CardNumber->setVisibility();
        $this->BranchID->setVisibility();
        $this->StoreID->setVisibility();
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
        $this->setupLookupOptions($this->Customername);
        $this->setupLookupOptions($this->pharmacy_pocol);
        $this->setupLookupOptions($this->ModeofPayment);

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
                    $this->terminate("StorePaymentList"); // No matching record, return to list
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
                    if ($this->getCurrentDetailTable() != "") { // Master/detail add
                        $returnUrl = $this->getDetailUrl();
                    } else {
                        $returnUrl = $this->getReturnUrl();
                    }
                    if (GetPageName($returnUrl) == "StorePaymentList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "StorePaymentView") {
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
        $this->PAYNO->CurrentValue = null;
        $this->PAYNO->OldValue = $this->PAYNO->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->YM->CurrentValue = null;
        $this->YM->OldValue = $this->YM->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->Customercode->CurrentValue = null;
        $this->Customercode->OldValue = $this->Customercode->CurrentValue;
        $this->Customername->CurrentValue = null;
        $this->Customername->OldValue = $this->Customername->CurrentValue;
        $this->pharmacy_pocol->CurrentValue = null;
        $this->pharmacy_pocol->OldValue = $this->pharmacy_pocol->CurrentValue;
        $this->Address1->CurrentValue = null;
        $this->Address1->OldValue = $this->Address1->CurrentValue;
        $this->Address2->CurrentValue = null;
        $this->Address2->OldValue = $this->Address2->CurrentValue;
        $this->Address3->CurrentValue = null;
        $this->Address3->OldValue = $this->Address3->CurrentValue;
        $this->State->CurrentValue = null;
        $this->State->OldValue = $this->State->CurrentValue;
        $this->Pincode->CurrentValue = null;
        $this->Pincode->OldValue = $this->Pincode->CurrentValue;
        $this->Phone->CurrentValue = null;
        $this->Phone->OldValue = $this->Phone->CurrentValue;
        $this->Fax->CurrentValue = null;
        $this->Fax->OldValue = $this->Fax->CurrentValue;
        $this->EEmail->CurrentValue = null;
        $this->EEmail->OldValue = $this->EEmail->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->PharmacyID->CurrentValue = null;
        $this->PharmacyID->OldValue = $this->PharmacyID->CurrentValue;
        $this->BillTotalValue->CurrentValue = null;
        $this->BillTotalValue->OldValue = $this->BillTotalValue->CurrentValue;
        $this->GRNTotalValue->CurrentValue = null;
        $this->GRNTotalValue->OldValue = $this->GRNTotalValue->CurrentValue;
        $this->BillDiscount->CurrentValue = null;
        $this->BillDiscount->OldValue = $this->BillDiscount->CurrentValue;
        $this->BillUpload->CurrentValue = null;
        $this->BillUpload->OldValue = $this->BillUpload->CurrentValue;
        $this->TransPort->CurrentValue = null;
        $this->TransPort->OldValue = $this->TransPort->CurrentValue;
        $this->AnyOther->CurrentValue = null;
        $this->AnyOther->OldValue = $this->AnyOther->CurrentValue;
        $this->voucher_type->CurrentValue = null;
        $this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
        $this->Details->CurrentValue = null;
        $this->Details->OldValue = $this->Details->CurrentValue;
        $this->ModeofPayment->CurrentValue = null;
        $this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
        $this->Amount->CurrentValue = null;
        $this->Amount->OldValue = $this->Amount->CurrentValue;
        $this->BankName->CurrentValue = null;
        $this->BankName->OldValue = $this->BankName->CurrentValue;
        $this->AccountNumber->CurrentValue = null;
        $this->AccountNumber->OldValue = $this->AccountNumber->CurrentValue;
        $this->chequeNumber->CurrentValue = null;
        $this->chequeNumber->OldValue = $this->chequeNumber->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->SeectPaymentMode->CurrentValue = null;
        $this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
        $this->PaidAmount->CurrentValue = null;
        $this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
        $this->Currency->CurrentValue = null;
        $this->Currency->OldValue = $this->Currency->CurrentValue;
        $this->CardNumber->CurrentValue = null;
        $this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
        $this->BranchID->CurrentValue = null;
        $this->BranchID->OldValue = $this->BranchID->CurrentValue;
        $this->StoreID->CurrentValue = null;
        $this->StoreID->OldValue = $this->StoreID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PAYNO' first before field var 'x_PAYNO'
        $val = $CurrentForm->hasValue("PAYNO") ? $CurrentForm->getValue("PAYNO") : $CurrentForm->getValue("x_PAYNO");
        if (!$this->PAYNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PAYNO->Visible = false; // Disable update for API request
            } else {
                $this->PAYNO->setFormValue($val);
            }
        }

        // Check field name 'DT' first before field var 'x_DT'
        $val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
        if (!$this->DT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DT->Visible = false; // Disable update for API request
            } else {
                $this->DT->setFormValue($val);
            }
            $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
        }

        // Check field name 'YM' first before field var 'x_YM'
        $val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
        if (!$this->YM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->YM->Visible = false; // Disable update for API request
            } else {
                $this->YM->setFormValue($val);
            }
        }

        // Check field name 'PC' first before field var 'x_PC'
        $val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
        if (!$this->PC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PC->Visible = false; // Disable update for API request
            } else {
                $this->PC->setFormValue($val);
            }
        }

        // Check field name 'Customercode' first before field var 'x_Customercode'
        $val = $CurrentForm->hasValue("Customercode") ? $CurrentForm->getValue("Customercode") : $CurrentForm->getValue("x_Customercode");
        if (!$this->Customercode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customercode->Visible = false; // Disable update for API request
            } else {
                $this->Customercode->setFormValue($val);
            }
        }

        // Check field name 'Customername' first before field var 'x_Customername'
        $val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
        if (!$this->Customername->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customername->Visible = false; // Disable update for API request
            } else {
                $this->Customername->setFormValue($val);
            }
        }

        // Check field name 'pharmacy_pocol' first before field var 'x_pharmacy_pocol'
        $val = $CurrentForm->hasValue("pharmacy_pocol") ? $CurrentForm->getValue("pharmacy_pocol") : $CurrentForm->getValue("x_pharmacy_pocol");
        if (!$this->pharmacy_pocol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pharmacy_pocol->Visible = false; // Disable update for API request
            } else {
                $this->pharmacy_pocol->setFormValue($val);
            }
        }

        // Check field name 'Address1' first before field var 'x_Address1'
        $val = $CurrentForm->hasValue("Address1") ? $CurrentForm->getValue("Address1") : $CurrentForm->getValue("x_Address1");
        if (!$this->Address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address1->Visible = false; // Disable update for API request
            } else {
                $this->Address1->setFormValue($val);
            }
        }

        // Check field name 'Address2' first before field var 'x_Address2'
        $val = $CurrentForm->hasValue("Address2") ? $CurrentForm->getValue("Address2") : $CurrentForm->getValue("x_Address2");
        if (!$this->Address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address2->Visible = false; // Disable update for API request
            } else {
                $this->Address2->setFormValue($val);
            }
        }

        // Check field name 'Address3' first before field var 'x_Address3'
        $val = $CurrentForm->hasValue("Address3") ? $CurrentForm->getValue("Address3") : $CurrentForm->getValue("x_Address3");
        if (!$this->Address3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address3->Visible = false; // Disable update for API request
            } else {
                $this->Address3->setFormValue($val);
            }
        }

        // Check field name 'State' first before field var 'x_State'
        $val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
        if (!$this->State->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State->Visible = false; // Disable update for API request
            } else {
                $this->State->setFormValue($val);
            }
        }

        // Check field name 'Pincode' first before field var 'x_Pincode'
        $val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
        if (!$this->Pincode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pincode->Visible = false; // Disable update for API request
            } else {
                $this->Pincode->setFormValue($val);
            }
        }

        // Check field name 'Phone' first before field var 'x_Phone'
        $val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
        if (!$this->Phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Phone->Visible = false; // Disable update for API request
            } else {
                $this->Phone->setFormValue($val);
            }
        }

        // Check field name 'Fax' first before field var 'x_Fax'
        $val = $CurrentForm->hasValue("Fax") ? $CurrentForm->getValue("Fax") : $CurrentForm->getValue("x_Fax");
        if (!$this->Fax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Fax->Visible = false; // Disable update for API request
            } else {
                $this->Fax->setFormValue($val);
            }
        }

        // Check field name 'EEmail' first before field var 'x_EEmail'
        $val = $CurrentForm->hasValue("EEmail") ? $CurrentForm->getValue("EEmail") : $CurrentForm->getValue("x_EEmail");
        if (!$this->EEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EEmail->Visible = false; // Disable update for API request
            } else {
                $this->EEmail->setFormValue($val);
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
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        }

        // Check field name 'PharmacyID' first before field var 'x_PharmacyID'
        $val = $CurrentForm->hasValue("PharmacyID") ? $CurrentForm->getValue("PharmacyID") : $CurrentForm->getValue("x_PharmacyID");
        if (!$this->PharmacyID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PharmacyID->Visible = false; // Disable update for API request
            } else {
                $this->PharmacyID->setFormValue($val);
            }
        }

        // Check field name 'BillTotalValue' first before field var 'x_BillTotalValue'
        $val = $CurrentForm->hasValue("BillTotalValue") ? $CurrentForm->getValue("BillTotalValue") : $CurrentForm->getValue("x_BillTotalValue");
        if (!$this->BillTotalValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillTotalValue->Visible = false; // Disable update for API request
            } else {
                $this->BillTotalValue->setFormValue($val);
            }
        }

        // Check field name 'GRNTotalValue' first before field var 'x_GRNTotalValue'
        $val = $CurrentForm->hasValue("GRNTotalValue") ? $CurrentForm->getValue("GRNTotalValue") : $CurrentForm->getValue("x_GRNTotalValue");
        if (!$this->GRNTotalValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRNTotalValue->Visible = false; // Disable update for API request
            } else {
                $this->GRNTotalValue->setFormValue($val);
            }
        }

        // Check field name 'BillDiscount' first before field var 'x_BillDiscount'
        $val = $CurrentForm->hasValue("BillDiscount") ? $CurrentForm->getValue("BillDiscount") : $CurrentForm->getValue("x_BillDiscount");
        if (!$this->BillDiscount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillDiscount->Visible = false; // Disable update for API request
            } else {
                $this->BillDiscount->setFormValue($val);
            }
        }

        // Check field name 'BillUpload' first before field var 'x_BillUpload'
        $val = $CurrentForm->hasValue("BillUpload") ? $CurrentForm->getValue("BillUpload") : $CurrentForm->getValue("x_BillUpload");
        if (!$this->BillUpload->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillUpload->Visible = false; // Disable update for API request
            } else {
                $this->BillUpload->setFormValue($val);
            }
        }

        // Check field name 'TransPort' first before field var 'x_TransPort'
        $val = $CurrentForm->hasValue("TransPort") ? $CurrentForm->getValue("TransPort") : $CurrentForm->getValue("x_TransPort");
        if (!$this->TransPort->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransPort->Visible = false; // Disable update for API request
            } else {
                $this->TransPort->setFormValue($val);
            }
        }

        // Check field name 'AnyOther' first before field var 'x_AnyOther'
        $val = $CurrentForm->hasValue("AnyOther") ? $CurrentForm->getValue("AnyOther") : $CurrentForm->getValue("x_AnyOther");
        if (!$this->AnyOther->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnyOther->Visible = false; // Disable update for API request
            } else {
                $this->AnyOther->setFormValue($val);
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

        // Check field name 'BankName' first before field var 'x_BankName'
        $val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
        if (!$this->BankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BankName->Visible = false; // Disable update for API request
            } else {
                $this->BankName->setFormValue($val);
            }
        }

        // Check field name 'AccountNumber' first before field var 'x_AccountNumber'
        $val = $CurrentForm->hasValue("AccountNumber") ? $CurrentForm->getValue("AccountNumber") : $CurrentForm->getValue("x_AccountNumber");
        if (!$this->AccountNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AccountNumber->Visible = false; // Disable update for API request
            } else {
                $this->AccountNumber->setFormValue($val);
            }
        }

        // Check field name 'chequeNumber' first before field var 'x_chequeNumber'
        $val = $CurrentForm->hasValue("chequeNumber") ? $CurrentForm->getValue("chequeNumber") : $CurrentForm->getValue("x_chequeNumber");
        if (!$this->chequeNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->chequeNumber->Visible = false; // Disable update for API request
            } else {
                $this->chequeNumber->setFormValue($val);
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

        // Check field name 'SeectPaymentMode' first before field var 'x_SeectPaymentMode'
        $val = $CurrentForm->hasValue("SeectPaymentMode") ? $CurrentForm->getValue("SeectPaymentMode") : $CurrentForm->getValue("x_SeectPaymentMode");
        if (!$this->SeectPaymentMode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SeectPaymentMode->Visible = false; // Disable update for API request
            } else {
                $this->SeectPaymentMode->setFormValue($val);
            }
        }

        // Check field name 'PaidAmount' first before field var 'x_PaidAmount'
        $val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
        if (!$this->PaidAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaidAmount->Visible = false; // Disable update for API request
            } else {
                $this->PaidAmount->setFormValue($val);
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

        // Check field name 'CardNumber' first before field var 'x_CardNumber'
        $val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
        if (!$this->CardNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CardNumber->Visible = false; // Disable update for API request
            } else {
                $this->CardNumber->setFormValue($val);
            }
        }

        // Check field name 'BranchID' first before field var 'x_BranchID'
        $val = $CurrentForm->hasValue("BranchID") ? $CurrentForm->getValue("BranchID") : $CurrentForm->getValue("x_BranchID");
        if (!$this->BranchID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BranchID->Visible = false; // Disable update for API request
            } else {
                $this->BranchID->setFormValue($val);
            }
        }

        // Check field name 'StoreID' first before field var 'x_StoreID'
        $val = $CurrentForm->hasValue("StoreID") ? $CurrentForm->getValue("StoreID") : $CurrentForm->getValue("x_StoreID");
        if (!$this->StoreID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StoreID->Visible = false; // Disable update for API request
            } else {
                $this->StoreID->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->PAYNO->CurrentValue = $this->PAYNO->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
        $this->YM->CurrentValue = $this->YM->FormValue;
        $this->PC->CurrentValue = $this->PC->FormValue;
        $this->Customercode->CurrentValue = $this->Customercode->FormValue;
        $this->Customername->CurrentValue = $this->Customername->FormValue;
        $this->pharmacy_pocol->CurrentValue = $this->pharmacy_pocol->FormValue;
        $this->Address1->CurrentValue = $this->Address1->FormValue;
        $this->Address2->CurrentValue = $this->Address2->FormValue;
        $this->Address3->CurrentValue = $this->Address3->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Pincode->CurrentValue = $this->Pincode->FormValue;
        $this->Phone->CurrentValue = $this->Phone->FormValue;
        $this->Fax->CurrentValue = $this->Fax->FormValue;
        $this->EEmail->CurrentValue = $this->EEmail->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->PharmacyID->CurrentValue = $this->PharmacyID->FormValue;
        $this->BillTotalValue->CurrentValue = $this->BillTotalValue->FormValue;
        $this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->FormValue;
        $this->BillDiscount->CurrentValue = $this->BillDiscount->FormValue;
        $this->BillUpload->CurrentValue = $this->BillUpload->FormValue;
        $this->TransPort->CurrentValue = $this->TransPort->FormValue;
        $this->AnyOther->CurrentValue = $this->AnyOther->FormValue;
        $this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->AccountNumber->CurrentValue = $this->AccountNumber->FormValue;
        $this->chequeNumber->CurrentValue = $this->chequeNumber->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
        $this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
        $this->Currency->CurrentValue = $this->Currency->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BranchID->CurrentValue = $this->BranchID->FormValue;
        $this->StoreID->CurrentValue = $this->StoreID->FormValue;
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
        $this->PAYNO->setDbValue($row['PAYNO']);
        $this->DT->setDbValue($row['DT']);
        $this->YM->setDbValue($row['YM']);
        $this->PC->setDbValue($row['PC']);
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->EEmail->setDbValue($row['EEmail']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PharmacyID->setDbValue($row['PharmacyID']);
        $this->BillTotalValue->setDbValue($row['BillTotalValue']);
        $this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
        $this->BillDiscount->setDbValue($row['BillDiscount']);
        $this->BillUpload->setDbValue($row['BillUpload']);
        $this->TransPort->setDbValue($row['TransPort']);
        $this->AnyOther->setDbValue($row['AnyOther']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->BankName->setDbValue($row['BankName']);
        $this->AccountNumber->setDbValue($row['AccountNumber']);
        $this->chequeNumber->setDbValue($row['chequeNumber']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BranchID->setDbValue($row['BranchID']);
        $this->StoreID->setDbValue($row['StoreID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PAYNO'] = $this->PAYNO->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['YM'] = $this->YM->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['Customercode'] = $this->Customercode->CurrentValue;
        $row['Customername'] = $this->Customername->CurrentValue;
        $row['pharmacy_pocol'] = $this->pharmacy_pocol->CurrentValue;
        $row['Address1'] = $this->Address1->CurrentValue;
        $row['Address2'] = $this->Address2->CurrentValue;
        $row['Address3'] = $this->Address3->CurrentValue;
        $row['State'] = $this->State->CurrentValue;
        $row['Pincode'] = $this->Pincode->CurrentValue;
        $row['Phone'] = $this->Phone->CurrentValue;
        $row['Fax'] = $this->Fax->CurrentValue;
        $row['EEmail'] = $this->EEmail->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['PharmacyID'] = $this->PharmacyID->CurrentValue;
        $row['BillTotalValue'] = $this->BillTotalValue->CurrentValue;
        $row['GRNTotalValue'] = $this->GRNTotalValue->CurrentValue;
        $row['BillDiscount'] = $this->BillDiscount->CurrentValue;
        $row['BillUpload'] = $this->BillUpload->CurrentValue;
        $row['TransPort'] = $this->TransPort->CurrentValue;
        $row['AnyOther'] = $this->AnyOther->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Details'] = $this->Details->CurrentValue;
        $row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['AccountNumber'] = $this->AccountNumber->CurrentValue;
        $row['chequeNumber'] = $this->chequeNumber->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
        $row['PaidAmount'] = $this->PaidAmount->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BranchID'] = $this->BranchID->CurrentValue;
        $row['StoreID'] = $this->StoreID->CurrentValue;
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
        if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue))) {
            $this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue))) {
            $this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue))) {
            $this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TransPort->FormValue == $this->TransPort->CurrentValue && is_numeric(ConvertToFloatString($this->TransPort->CurrentValue))) {
            $this->TransPort->CurrentValue = ConvertToFloatString($this->TransPort->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->AnyOther->FormValue == $this->AnyOther->CurrentValue && is_numeric(ConvertToFloatString($this->AnyOther->CurrentValue))) {
            $this->AnyOther->CurrentValue = ConvertToFloatString($this->AnyOther->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // PAYNO

        // DT

        // YM

        // PC

        // Customercode

        // Customername

        // pharmacy_pocol

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // EEmail

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PharmacyID

        // BillTotalValue

        // GRNTotalValue

        // BillDiscount

        // BillUpload

        // TransPort

        // AnyOther

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // BankName

        // AccountNumber

        // chequeNumber

        // Remarks

        // SeectPaymentMode

        // PaidAmount

        // Currency

        // CardNumber

        // BranchID

        // StoreID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PAYNO
            $this->PAYNO->ViewValue = $this->PAYNO->CurrentValue;
            $this->PAYNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 7);
            $this->DT->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // Customercode
            $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
            $this->Customercode->ViewCustomAttributes = "";

            // Customername
            $curVal = trim(strval($this->Customername->CurrentValue));
            if ($curVal != "") {
                $this->Customername->ViewValue = $this->Customername->lookupCacheOption($curVal);
                if ($this->Customername->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Suppliername`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->Customername->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->Customername->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->Customername->Lookup->renderViewRow($row);
                            $this->Customername->ViewValue->add($this->Customername->displayValue($arwrk));
                        }
                    } else {
                        $this->Customername->ViewValue = $this->Customername->CurrentValue;
                    }
                }
            } else {
                $this->Customername->ViewValue = null;
            }
            $this->Customername->ViewCustomAttributes = "";

            // pharmacy_pocol
            $curVal = trim(strval($this->pharmacy_pocol->CurrentValue));
            if ($curVal != "") {
                $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->lookupCacheOption($curVal);
                if ($this->pharmacy_pocol->ViewValue === null) { // Lookup from database
                    $filterWrk = "`pharmacy`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospId`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->pharmacy_pocol->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->pharmacy_pocol->Lookup->renderViewRow($rswrk[0]);
                        $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->displayValue($arwrk);
                    } else {
                        $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
                    }
                }
            } else {
                $this->pharmacy_pocol->ViewValue = null;
            }
            $this->pharmacy_pocol->ViewCustomAttributes = "";

            // Address1
            $this->Address1->ViewValue = $this->Address1->CurrentValue;
            $this->Address1->ViewCustomAttributes = "";

            // Address2
            $this->Address2->ViewValue = $this->Address2->CurrentValue;
            $this->Address2->ViewCustomAttributes = "";

            // Address3
            $this->Address3->ViewValue = $this->Address3->CurrentValue;
            $this->Address3->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // EEmail
            $this->EEmail->ViewValue = $this->EEmail->CurrentValue;
            $this->EEmail->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

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

            // PharmacyID
            $this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
            $this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
            $this->PharmacyID->ViewCustomAttributes = "";

            // BillTotalValue
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";

            // GRNTotalValue
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";

            // BillDiscount
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";

            // BillUpload
            $this->BillUpload->ViewValue = $this->BillUpload->CurrentValue;
            $this->BillUpload->ViewCustomAttributes = "";

            // TransPort
            $this->TransPort->ViewValue = $this->TransPort->CurrentValue;
            $this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
            $this->TransPort->ViewCustomAttributes = "";

            // AnyOther
            $this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
            $this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
            $this->AnyOther->ViewCustomAttributes = "";

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

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // AccountNumber
            $this->AccountNumber->ViewValue = $this->AccountNumber->CurrentValue;
            $this->AccountNumber->ViewCustomAttributes = "";

            // chequeNumber
            $this->chequeNumber->ViewValue = $this->chequeNumber->CurrentValue;
            $this->chequeNumber->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->ViewValue = $this->SeectPaymentMode->CurrentValue;
            $this->SeectPaymentMode->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewCustomAttributes = "";

            // Currency
            $this->Currency->ViewValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BranchID
            $this->BranchID->ViewValue = $this->BranchID->CurrentValue;
            $this->BranchID->ViewValue = FormatNumber($this->BranchID->ViewValue, 0, -2, -2, -2);
            $this->BranchID->ViewCustomAttributes = "";

            // StoreID
            $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
            $this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
            $this->StoreID->ViewCustomAttributes = "";

            // PAYNO
            $this->PAYNO->LinkCustomAttributes = "";
            $this->PAYNO->HrefValue = "";
            $this->PAYNO->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";
            $this->YM->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";
            $this->Customercode->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->LinkCustomAttributes = "";
            $this->pharmacy_pocol->HrefValue = "";
            $this->pharmacy_pocol->TooltipValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";
            $this->Address1->TooltipValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";
            $this->Address2->TooltipValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";
            $this->Address3->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";
            $this->Fax->TooltipValue = "";

            // EEmail
            $this->EEmail->LinkCustomAttributes = "";
            $this->EEmail->HrefValue = "";
            $this->EEmail->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // PharmacyID
            $this->PharmacyID->LinkCustomAttributes = "";
            $this->PharmacyID->HrefValue = "";
            $this->PharmacyID->TooltipValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";
            $this->BillTotalValue->TooltipValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";
            $this->GRNTotalValue->TooltipValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";
            $this->BillDiscount->TooltipValue = "";

            // BillUpload
            $this->BillUpload->LinkCustomAttributes = "";
            $this->BillUpload->HrefValue = "";
            $this->BillUpload->TooltipValue = "";

            // TransPort
            $this->TransPort->LinkCustomAttributes = "";
            $this->TransPort->HrefValue = "";
            $this->TransPort->TooltipValue = "";

            // AnyOther
            $this->AnyOther->LinkCustomAttributes = "";
            $this->AnyOther->HrefValue = "";
            $this->AnyOther->TooltipValue = "";

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

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // AccountNumber
            $this->AccountNumber->LinkCustomAttributes = "";
            $this->AccountNumber->HrefValue = "";
            $this->AccountNumber->TooltipValue = "";

            // chequeNumber
            $this->chequeNumber->LinkCustomAttributes = "";
            $this->chequeNumber->HrefValue = "";
            $this->chequeNumber->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";
            $this->SeectPaymentMode->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";
            $this->Currency->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";
            $this->BranchID->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PAYNO
            $this->PAYNO->EditAttrs["class"] = "form-control";
            $this->PAYNO->EditCustomAttributes = "";
            if (!$this->PAYNO->Raw) {
                $this->PAYNO->CurrentValue = HtmlDecode($this->PAYNO->CurrentValue);
            }
            $this->PAYNO->EditValue = HtmlEncode($this->PAYNO->CurrentValue);
            $this->PAYNO->PlaceHolder = RemoveHtml($this->PAYNO->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 7));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // YM
            $this->YM->EditAttrs["class"] = "form-control";
            $this->YM->EditCustomAttributes = "";
            if (!$this->YM->Raw) {
                $this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
            }
            $this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
            $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // Customercode
            $this->Customercode->EditAttrs["class"] = "form-control";
            $this->Customercode->EditCustomAttributes = "";
            if (!$this->Customercode->Raw) {
                $this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
            }
            $this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
            $this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

            // Customername
            $this->Customername->EditCustomAttributes = "";
            $curVal = trim(strval($this->Customername->CurrentValue));
            if ($curVal != "") {
                $this->Customername->ViewValue = $this->Customername->lookupCacheOption($curVal);
            } else {
                $this->Customername->ViewValue = $this->Customername->Lookup !== null && is_array($this->Customername->Lookup->Options) ? $curVal : null;
            }
            if ($this->Customername->ViewValue !== null) { // Load from cache
                $this->Customername->EditValue = array_values($this->Customername->Lookup->Options);
                if ($this->Customername->ViewValue == "") {
                    $this->Customername->ViewValue = $Language->phrase("PleaseSelect");
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
                        $filterWrk .= "`Suppliername`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->Customername->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->Customername->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->Customername->Lookup->renderViewRow($row);
                        $this->Customername->ViewValue->add($this->Customername->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->Customername->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Customername->EditValue = $arwrk;
            }
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // pharmacy_pocol
            $this->pharmacy_pocol->EditAttrs["class"] = "form-control";
            $this->pharmacy_pocol->EditCustomAttributes = "";
            $curVal = trim(strval($this->pharmacy_pocol->CurrentValue));
            if ($curVal != "") {
                $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->lookupCacheOption($curVal);
            } else {
                $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->Lookup !== null && is_array($this->pharmacy_pocol->Lookup->Options) ? $curVal : null;
            }
            if ($this->pharmacy_pocol->ViewValue !== null) { // Load from cache
                $this->pharmacy_pocol->EditValue = array_values($this->pharmacy_pocol->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`pharmacy`" . SearchString("=", $this->pharmacy_pocol->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`HospId`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->pharmacy_pocol->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->pharmacy_pocol->EditValue = $arwrk;
            }
            $this->pharmacy_pocol->PlaceHolder = RemoveHtml($this->pharmacy_pocol->caption());

            // Address1
            $this->Address1->EditAttrs["class"] = "form-control";
            $this->Address1->EditCustomAttributes = "";
            if (!$this->Address1->Raw) {
                $this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
            }
            $this->Address1->EditValue = HtmlEncode($this->Address1->CurrentValue);
            $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

            // Address2
            $this->Address2->EditAttrs["class"] = "form-control";
            $this->Address2->EditCustomAttributes = "";
            if (!$this->Address2->Raw) {
                $this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
            }
            $this->Address2->EditValue = HtmlEncode($this->Address2->CurrentValue);
            $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

            // Address3
            $this->Address3->EditAttrs["class"] = "form-control";
            $this->Address3->EditCustomAttributes = "";
            if (!$this->Address3->Raw) {
                $this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
            }
            $this->Address3->EditValue = HtmlEncode($this->Address3->CurrentValue);
            $this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Pincode
            $this->Pincode->EditAttrs["class"] = "form-control";
            $this->Pincode->EditCustomAttributes = "";
            if (!$this->Pincode->Raw) {
                $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
            }
            $this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
            $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

            // Phone
            $this->Phone->EditAttrs["class"] = "form-control";
            $this->Phone->EditCustomAttributes = "";
            if (!$this->Phone->Raw) {
                $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
            }
            $this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
            $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

            // Fax
            $this->Fax->EditAttrs["class"] = "form-control";
            $this->Fax->EditCustomAttributes = "";
            if (!$this->Fax->Raw) {
                $this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
            }
            $this->Fax->EditValue = HtmlEncode($this->Fax->CurrentValue);
            $this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

            // EEmail
            $this->EEmail->EditAttrs["class"] = "form-control";
            $this->EEmail->EditCustomAttributes = "";
            if (!$this->EEmail->Raw) {
                $this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
            }
            $this->EEmail->EditValue = HtmlEncode($this->EEmail->CurrentValue);
            $this->EEmail->PlaceHolder = RemoveHtml($this->EEmail->caption());

            // HospID

            // createdby

            // createddatetime

            // PharmacyID

            // BillTotalValue
            $this->BillTotalValue->EditAttrs["class"] = "form-control";
            $this->BillTotalValue->EditCustomAttributes = "";
            $this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
            $this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
            if (strval($this->BillTotalValue->EditValue) != "" && is_numeric($this->BillTotalValue->EditValue)) {
                $this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
            }

            // GRNTotalValue
            $this->GRNTotalValue->EditAttrs["class"] = "form-control";
            $this->GRNTotalValue->EditCustomAttributes = "";
            $this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
            $this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
            if (strval($this->GRNTotalValue->EditValue) != "" && is_numeric($this->GRNTotalValue->EditValue)) {
                $this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
            }

            // BillDiscount
            $this->BillDiscount->EditAttrs["class"] = "form-control";
            $this->BillDiscount->EditCustomAttributes = "";
            $this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
            $this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
            if (strval($this->BillDiscount->EditValue) != "" && is_numeric($this->BillDiscount->EditValue)) {
                $this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
            }

            // BillUpload
            $this->BillUpload->EditAttrs["class"] = "form-control";
            $this->BillUpload->EditCustomAttributes = "";
            $this->BillUpload->EditValue = HtmlEncode($this->BillUpload->CurrentValue);
            $this->BillUpload->PlaceHolder = RemoveHtml($this->BillUpload->caption());

            // TransPort
            $this->TransPort->EditAttrs["class"] = "form-control";
            $this->TransPort->EditCustomAttributes = "";
            $this->TransPort->EditValue = HtmlEncode($this->TransPort->CurrentValue);
            $this->TransPort->PlaceHolder = RemoveHtml($this->TransPort->caption());
            if (strval($this->TransPort->EditValue) != "" && is_numeric($this->TransPort->EditValue)) {
                $this->TransPort->EditValue = FormatNumber($this->TransPort->EditValue, -2, -2, -2, -2);
            }

            // AnyOther
            $this->AnyOther->EditAttrs["class"] = "form-control";
            $this->AnyOther->EditCustomAttributes = "";
            $this->AnyOther->EditValue = HtmlEncode($this->AnyOther->CurrentValue);
            $this->AnyOther->PlaceHolder = RemoveHtml($this->AnyOther->caption());
            if (strval($this->AnyOther->EditValue) != "" && is_numeric($this->AnyOther->EditValue)) {
                $this->AnyOther->EditValue = FormatNumber($this->AnyOther->EditValue, -2, -2, -2, -2);
            }

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

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

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // AccountNumber
            $this->AccountNumber->EditAttrs["class"] = "form-control";
            $this->AccountNumber->EditCustomAttributes = "";
            if (!$this->AccountNumber->Raw) {
                $this->AccountNumber->CurrentValue = HtmlDecode($this->AccountNumber->CurrentValue);
            }
            $this->AccountNumber->EditValue = HtmlEncode($this->AccountNumber->CurrentValue);
            $this->AccountNumber->PlaceHolder = RemoveHtml($this->AccountNumber->caption());

            // chequeNumber
            $this->chequeNumber->EditAttrs["class"] = "form-control";
            $this->chequeNumber->EditCustomAttributes = "";
            if (!$this->chequeNumber->Raw) {
                $this->chequeNumber->CurrentValue = HtmlDecode($this->chequeNumber->CurrentValue);
            }
            $this->chequeNumber->EditValue = HtmlEncode($this->chequeNumber->CurrentValue);
            $this->chequeNumber->PlaceHolder = RemoveHtml($this->chequeNumber->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // SeectPaymentMode
            $this->SeectPaymentMode->EditAttrs["class"] = "form-control";
            $this->SeectPaymentMode->EditCustomAttributes = "";
            if (!$this->SeectPaymentMode->Raw) {
                $this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
            }
            $this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->CurrentValue);
            $this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            if (!$this->PaidAmount->Raw) {
                $this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
            }
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BranchID
            $this->BranchID->EditAttrs["class"] = "form-control";
            $this->BranchID->EditCustomAttributes = "";
            $this->BranchID->EditValue = HtmlEncode($this->BranchID->CurrentValue);
            $this->BranchID->PlaceHolder = RemoveHtml($this->BranchID->caption());

            // StoreID
            $this->StoreID->EditAttrs["class"] = "form-control";
            $this->StoreID->EditCustomAttributes = "";
            $this->StoreID->EditValue = HtmlEncode($this->StoreID->CurrentValue);
            $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

            // Add refer script

            // PAYNO
            $this->PAYNO->LinkCustomAttributes = "";
            $this->PAYNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->LinkCustomAttributes = "";
            $this->pharmacy_pocol->HrefValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";

            // EEmail
            $this->EEmail->LinkCustomAttributes = "";
            $this->EEmail->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // PharmacyID
            $this->PharmacyID->LinkCustomAttributes = "";
            $this->PharmacyID->HrefValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";

            // BillUpload
            $this->BillUpload->LinkCustomAttributes = "";
            $this->BillUpload->HrefValue = "";

            // TransPort
            $this->TransPort->LinkCustomAttributes = "";
            $this->TransPort->HrefValue = "";

            // AnyOther
            $this->AnyOther->LinkCustomAttributes = "";
            $this->AnyOther->HrefValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // AccountNumber
            $this->AccountNumber->LinkCustomAttributes = "";
            $this->AccountNumber->HrefValue = "";

            // chequeNumber
            $this->chequeNumber->LinkCustomAttributes = "";
            $this->chequeNumber->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
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
        if ($this->PAYNO->Required) {
            if (!$this->PAYNO->IsDetailKey && EmptyValue($this->PAYNO->FormValue)) {
                $this->PAYNO->addErrorMessage(str_replace("%s", $this->PAYNO->caption(), $this->PAYNO->RequiredErrorMessage));
            }
        }
        if ($this->DT->Required) {
            if (!$this->DT->IsDetailKey && EmptyValue($this->DT->FormValue)) {
                $this->DT->addErrorMessage(str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DT->FormValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if ($this->YM->Required) {
            if (!$this->YM->IsDetailKey && EmptyValue($this->YM->FormValue)) {
                $this->YM->addErrorMessage(str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
            }
        }
        if ($this->PC->Required) {
            if (!$this->PC->IsDetailKey && EmptyValue($this->PC->FormValue)) {
                $this->PC->addErrorMessage(str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
            }
        }
        if ($this->Customercode->Required) {
            if (!$this->Customercode->IsDetailKey && EmptyValue($this->Customercode->FormValue)) {
                $this->Customercode->addErrorMessage(str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
            }
        }
        if ($this->Customername->Required) {
            if ($this->Customername->FormValue == "") {
                $this->Customername->addErrorMessage(str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
            }
        }
        if ($this->pharmacy_pocol->Required) {
            if (!$this->pharmacy_pocol->IsDetailKey && EmptyValue($this->pharmacy_pocol->FormValue)) {
                $this->pharmacy_pocol->addErrorMessage(str_replace("%s", $this->pharmacy_pocol->caption(), $this->pharmacy_pocol->RequiredErrorMessage));
            }
        }
        if ($this->Address1->Required) {
            if (!$this->Address1->IsDetailKey && EmptyValue($this->Address1->FormValue)) {
                $this->Address1->addErrorMessage(str_replace("%s", $this->Address1->caption(), $this->Address1->RequiredErrorMessage));
            }
        }
        if ($this->Address2->Required) {
            if (!$this->Address2->IsDetailKey && EmptyValue($this->Address2->FormValue)) {
                $this->Address2->addErrorMessage(str_replace("%s", $this->Address2->caption(), $this->Address2->RequiredErrorMessage));
            }
        }
        if ($this->Address3->Required) {
            if (!$this->Address3->IsDetailKey && EmptyValue($this->Address3->FormValue)) {
                $this->Address3->addErrorMessage(str_replace("%s", $this->Address3->caption(), $this->Address3->RequiredErrorMessage));
            }
        }
        if ($this->State->Required) {
            if (!$this->State->IsDetailKey && EmptyValue($this->State->FormValue)) {
                $this->State->addErrorMessage(str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
            }
        }
        if ($this->Pincode->Required) {
            if (!$this->Pincode->IsDetailKey && EmptyValue($this->Pincode->FormValue)) {
                $this->Pincode->addErrorMessage(str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
            }
        }
        if ($this->Phone->Required) {
            if (!$this->Phone->IsDetailKey && EmptyValue($this->Phone->FormValue)) {
                $this->Phone->addErrorMessage(str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
            }
        }
        if ($this->Fax->Required) {
            if (!$this->Fax->IsDetailKey && EmptyValue($this->Fax->FormValue)) {
                $this->Fax->addErrorMessage(str_replace("%s", $this->Fax->caption(), $this->Fax->RequiredErrorMessage));
            }
        }
        if ($this->EEmail->Required) {
            if (!$this->EEmail->IsDetailKey && EmptyValue($this->EEmail->FormValue)) {
                $this->EEmail->addErrorMessage(str_replace("%s", $this->EEmail->caption(), $this->EEmail->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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
        if ($this->PharmacyID->Required) {
            if (!$this->PharmacyID->IsDetailKey && EmptyValue($this->PharmacyID->FormValue)) {
                $this->PharmacyID->addErrorMessage(str_replace("%s", $this->PharmacyID->caption(), $this->PharmacyID->RequiredErrorMessage));
            }
        }
        if ($this->BillTotalValue->Required) {
            if (!$this->BillTotalValue->IsDetailKey && EmptyValue($this->BillTotalValue->FormValue)) {
                $this->BillTotalValue->addErrorMessage(str_replace("%s", $this->BillTotalValue->caption(), $this->BillTotalValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillTotalValue->FormValue)) {
            $this->BillTotalValue->addErrorMessage($this->BillTotalValue->getErrorMessage(false));
        }
        if ($this->GRNTotalValue->Required) {
            if (!$this->GRNTotalValue->IsDetailKey && EmptyValue($this->GRNTotalValue->FormValue)) {
                $this->GRNTotalValue->addErrorMessage(str_replace("%s", $this->GRNTotalValue->caption(), $this->GRNTotalValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GRNTotalValue->FormValue)) {
            $this->GRNTotalValue->addErrorMessage($this->GRNTotalValue->getErrorMessage(false));
        }
        if ($this->BillDiscount->Required) {
            if (!$this->BillDiscount->IsDetailKey && EmptyValue($this->BillDiscount->FormValue)) {
                $this->BillDiscount->addErrorMessage(str_replace("%s", $this->BillDiscount->caption(), $this->BillDiscount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillDiscount->FormValue)) {
            $this->BillDiscount->addErrorMessage($this->BillDiscount->getErrorMessage(false));
        }
        if ($this->BillUpload->Required) {
            if (!$this->BillUpload->IsDetailKey && EmptyValue($this->BillUpload->FormValue)) {
                $this->BillUpload->addErrorMessage(str_replace("%s", $this->BillUpload->caption(), $this->BillUpload->RequiredErrorMessage));
            }
        }
        if ($this->TransPort->Required) {
            if (!$this->TransPort->IsDetailKey && EmptyValue($this->TransPort->FormValue)) {
                $this->TransPort->addErrorMessage(str_replace("%s", $this->TransPort->caption(), $this->TransPort->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TransPort->FormValue)) {
            $this->TransPort->addErrorMessage($this->TransPort->getErrorMessage(false));
        }
        if ($this->AnyOther->Required) {
            if (!$this->AnyOther->IsDetailKey && EmptyValue($this->AnyOther->FormValue)) {
                $this->AnyOther->addErrorMessage(str_replace("%s", $this->AnyOther->caption(), $this->AnyOther->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->AnyOther->FormValue)) {
            $this->AnyOther->addErrorMessage($this->AnyOther->getErrorMessage(false));
        }
        if ($this->voucher_type->Required) {
            if (!$this->voucher_type->IsDetailKey && EmptyValue($this->voucher_type->FormValue)) {
                $this->voucher_type->addErrorMessage(str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
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
        if ($this->BankName->Required) {
            if (!$this->BankName->IsDetailKey && EmptyValue($this->BankName->FormValue)) {
                $this->BankName->addErrorMessage(str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
            }
        }
        if ($this->AccountNumber->Required) {
            if (!$this->AccountNumber->IsDetailKey && EmptyValue($this->AccountNumber->FormValue)) {
                $this->AccountNumber->addErrorMessage(str_replace("%s", $this->AccountNumber->caption(), $this->AccountNumber->RequiredErrorMessage));
            }
        }
        if ($this->chequeNumber->Required) {
            if (!$this->chequeNumber->IsDetailKey && EmptyValue($this->chequeNumber->FormValue)) {
                $this->chequeNumber->addErrorMessage(str_replace("%s", $this->chequeNumber->caption(), $this->chequeNumber->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->SeectPaymentMode->Required) {
            if (!$this->SeectPaymentMode->IsDetailKey && EmptyValue($this->SeectPaymentMode->FormValue)) {
                $this->SeectPaymentMode->addErrorMessage(str_replace("%s", $this->SeectPaymentMode->caption(), $this->SeectPaymentMode->RequiredErrorMessage));
            }
        }
        if ($this->PaidAmount->Required) {
            if (!$this->PaidAmount->IsDetailKey && EmptyValue($this->PaidAmount->FormValue)) {
                $this->PaidAmount->addErrorMessage(str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
            }
        }
        if ($this->Currency->Required) {
            if (!$this->Currency->IsDetailKey && EmptyValue($this->Currency->FormValue)) {
                $this->Currency->addErrorMessage(str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
            }
        }
        if ($this->CardNumber->Required) {
            if (!$this->CardNumber->IsDetailKey && EmptyValue($this->CardNumber->FormValue)) {
                $this->CardNumber->addErrorMessage(str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
            }
        }
        if ($this->BranchID->Required) {
            if (!$this->BranchID->IsDetailKey && EmptyValue($this->BranchID->FormValue)) {
                $this->BranchID->addErrorMessage(str_replace("%s", $this->BranchID->caption(), $this->BranchID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BranchID->FormValue)) {
            $this->BranchID->addErrorMessage($this->BranchID->getErrorMessage(false));
        }
        if ($this->StoreID->Required) {
            if (!$this->StoreID->IsDetailKey && EmptyValue($this->StoreID->FormValue)) {
                $this->StoreID->addErrorMessage(str_replace("%s", $this->StoreID->caption(), $this->StoreID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->StoreID->FormValue)) {
            $this->StoreID->addErrorMessage($this->StoreID->getErrorMessage(false));
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("StoreGrnGrid");
        if (in_array("store_grn", $detailTblVar) && $detailPage->DetailAdd) {
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

        // PAYNO
        $this->PAYNO->setDbValueDef($rsnew, $this->PAYNO->CurrentValue, null, false);

        // DT
        $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 7), null, false);

        // YM
        $this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, null, false);

        // PC
        $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, false);

        // Customercode
        $this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, null, false);

        // Customername
        $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, false);

        // pharmacy_pocol
        $this->pharmacy_pocol->setDbValueDef($rsnew, $this->pharmacy_pocol->CurrentValue, null, false);

        // Address1
        $this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, null, false);

        // Address2
        $this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, null, false);

        // Address3
        $this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, null, false);

        // State
        $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, false);

        // Pincode
        $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, false);

        // Phone
        $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, false);

        // Fax
        $this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, null, false);

        // EEmail
        $this->EEmail->setDbValueDef($rsnew, $this->EEmail->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // PharmacyID
        $this->PharmacyID->CurrentValue = PharmacyID();
        $this->PharmacyID->setDbValueDef($rsnew, $this->PharmacyID->CurrentValue, null);

        // BillTotalValue
        $this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, null, false);

        // GRNTotalValue
        $this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, null, false);

        // BillDiscount
        $this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, null, false);

        // BillUpload
        $this->BillUpload->setDbValueDef($rsnew, $this->BillUpload->CurrentValue, null, false);

        // TransPort
        $this->TransPort->setDbValueDef($rsnew, $this->TransPort->CurrentValue, null, false);

        // AnyOther
        $this->AnyOther->setDbValueDef($rsnew, $this->AnyOther->CurrentValue, null, false);

        // voucher_type
        $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, false);

        // Details
        $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // BankName
        $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, false);

        // AccountNumber
        $this->AccountNumber->setDbValueDef($rsnew, $this->AccountNumber->CurrentValue, null, false);

        // chequeNumber
        $this->chequeNumber->setDbValueDef($rsnew, $this->chequeNumber->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // SeectPaymentMode
        $this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, null, false);

        // PaidAmount
        $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, false);

        // Currency
        $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, false);

        // CardNumber
        $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, false);

        // BranchID
        $this->BranchID->setDbValueDef($rsnew, $this->BranchID->CurrentValue, null, false);

        // StoreID
        $this->StoreID->setDbValueDef($rsnew, $this->StoreID->CurrentValue, null, false);

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
            $detailPage = Container("StoreGrnGrid");
            if (in_array("store_grn", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Pid->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "store_grn"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Pid->setSessionValue(""); // Clear master key if insert failed
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
            if (in_array("store_grn", $detailTblVar)) {
                $detailPageObj = Container("StoreGrnGrid");
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
                    $detailPageObj->Pid->IsDetailKey = true;
                    $detailPageObj->Pid->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Pid->setSessionValue($detailPageObj->Pid->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("StorePaymentList"), "", $this->TableVar, true);
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
                case "x_Customername":
                    break;
                case "x_pharmacy_pocol":
                    $lookupFilter = function () {
                        return "`HospId`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_ModeofPayment":
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
