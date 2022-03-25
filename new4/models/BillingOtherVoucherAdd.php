<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class BillingOtherVoucherAdd extends BillingOtherVoucher
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'billing_other_voucher';

    // Page object name
    public $PageObjName = "BillingOtherVoucherAdd";

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

        // Table object (billing_other_voucher)
        if (!isset($GLOBALS["billing_other_voucher"]) || get_class($GLOBALS["billing_other_voucher"]) == PROJECT_NAMESPACE . "billing_other_voucher") {
            $GLOBALS["billing_other_voucher"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'billing_other_voucher');
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
                $doc = new $class(Container("billing_other_voucher"));
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
                    if ($pageName == "BillingOtherVoucherView") {
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
        $this->freezed->setVisibility();
        $this->AdvanceNo->setVisibility();
        $this->PatientID->setVisibility();
        $this->PatientName->setVisibility();
        $this->Mobile->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->CardNumber->setVisibility();
        $this->BankName->setVisibility();
        $this->Name->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->Date->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->PatID->setVisibility();
        $this->VisiteType->setVisibility();
        $this->VisitDate->setVisibility();
        $this->Status->setVisibility();
        $this->AdvanceValidityDate->setVisibility();
        $this->TotalRemainingAdvance->setVisibility();
        $this->Remarks->setVisibility();
        $this->SeectPaymentMode->setVisibility();
        $this->PaidAmount->setVisibility();
        $this->Currency->setVisibility();
        $this->HospID->setVisibility();
        $this->Reception->setVisibility();
        $this->mrnno->setVisibility();
        $this->GetUserName->setVisibility();
        $this->AdjustmentwithAdvance->setVisibility();
        $this->AdjustmentBillNumber->setVisibility();
        $this->CancelAdvance->setVisibility();
        $this->CancelReasan->setVisibility();
        $this->CancelBy->setVisibility();
        $this->CancelDate->setVisibility();
        $this->CancelDateTime->setVisibility();
        $this->CanceledBy->setVisibility();
        $this->CancelStatus->setVisibility();
        $this->Cash->setVisibility();
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
        $this->setupLookupOptions($this->ModeofPayment);
        $this->setupLookupOptions($this->PatID);

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
                    $this->terminate("BillingOtherVoucherList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->GetViewUrl();
                    if (GetPageName($returnUrl) == "BillingOtherVoucherList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "BillingOtherVoucherView") {
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
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        if ($this->isConfirm()) { // Confirm page
            $this->RowType = ROWTYPE_VIEW; // Render view type
        } else {
            $this->RowType = ROWTYPE_ADD; // Render add type
        }

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
        $this->freezed->CurrentValue = null;
        $this->freezed->OldValue = $this->freezed->CurrentValue;
        $this->AdvanceNo->CurrentValue = null;
        $this->AdvanceNo->OldValue = $this->AdvanceNo->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->ModeofPayment->CurrentValue = null;
        $this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
        $this->Amount->CurrentValue = null;
        $this->Amount->OldValue = $this->Amount->CurrentValue;
        $this->CardNumber->CurrentValue = null;
        $this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
        $this->BankName->CurrentValue = null;
        $this->BankName->OldValue = $this->BankName->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->voucher_type->CurrentValue = null;
        $this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
        $this->Details->CurrentValue = null;
        $this->Details->OldValue = $this->Details->CurrentValue;
        $this->Date->CurrentValue = null;
        $this->Date->OldValue = $this->Date->CurrentValue;
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
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->VisiteType->CurrentValue = null;
        $this->VisiteType->OldValue = $this->VisiteType->CurrentValue;
        $this->VisitDate->CurrentValue = null;
        $this->VisitDate->OldValue = $this->VisitDate->CurrentValue;
        $this->Status->CurrentValue = null;
        $this->Status->OldValue = $this->Status->CurrentValue;
        $this->AdvanceValidityDate->CurrentValue = null;
        $this->AdvanceValidityDate->OldValue = $this->AdvanceValidityDate->CurrentValue;
        $this->TotalRemainingAdvance->CurrentValue = null;
        $this->TotalRemainingAdvance->OldValue = $this->TotalRemainingAdvance->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->SeectPaymentMode->CurrentValue = null;
        $this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
        $this->PaidAmount->CurrentValue = null;
        $this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
        $this->Currency->CurrentValue = null;
        $this->Currency->OldValue = $this->Currency->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->GetUserName->CurrentValue = null;
        $this->GetUserName->OldValue = $this->GetUserName->CurrentValue;
        $this->AdjustmentwithAdvance->CurrentValue = null;
        $this->AdjustmentwithAdvance->OldValue = $this->AdjustmentwithAdvance->CurrentValue;
        $this->AdjustmentBillNumber->CurrentValue = null;
        $this->AdjustmentBillNumber->OldValue = $this->AdjustmentBillNumber->CurrentValue;
        $this->CancelAdvance->CurrentValue = null;
        $this->CancelAdvance->OldValue = $this->CancelAdvance->CurrentValue;
        $this->CancelReasan->CurrentValue = null;
        $this->CancelReasan->OldValue = $this->CancelReasan->CurrentValue;
        $this->CancelBy->CurrentValue = null;
        $this->CancelBy->OldValue = $this->CancelBy->CurrentValue;
        $this->CancelDate->CurrentValue = null;
        $this->CancelDate->OldValue = $this->CancelDate->CurrentValue;
        $this->CancelDateTime->CurrentValue = null;
        $this->CancelDateTime->OldValue = $this->CancelDateTime->CurrentValue;
        $this->CanceledBy->CurrentValue = null;
        $this->CanceledBy->OldValue = $this->CanceledBy->CurrentValue;
        $this->CancelStatus->CurrentValue = null;
        $this->CancelStatus->OldValue = $this->CancelStatus->CurrentValue;
        $this->Cash->CurrentValue = null;
        $this->Cash->OldValue = $this->Cash->CurrentValue;
        $this->Card->CurrentValue = null;
        $this->Card->OldValue = $this->Card->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'freezed' first before field var 'x_freezed'
        $val = $CurrentForm->hasValue("freezed") ? $CurrentForm->getValue("freezed") : $CurrentForm->getValue("x_freezed");
        if (!$this->freezed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->freezed->Visible = false; // Disable update for API request
            } else {
                $this->freezed->setFormValue($val);
            }
        }

        // Check field name 'AdvanceNo' first before field var 'x_AdvanceNo'
        $val = $CurrentForm->hasValue("AdvanceNo") ? $CurrentForm->getValue("AdvanceNo") : $CurrentForm->getValue("x_AdvanceNo");
        if (!$this->AdvanceNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdvanceNo->Visible = false; // Disable update for API request
            } else {
                $this->AdvanceNo->setFormValue($val);
            }
        }

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
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

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
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

        // Check field name 'Date' first before field var 'x_Date'
        $val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
        if (!$this->Date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Date->Visible = false; // Disable update for API request
            } else {
                $this->Date->setFormValue($val);
            }
            $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 7);
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

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
            }
        }

        // Check field name 'VisiteType' first before field var 'x_VisiteType'
        $val = $CurrentForm->hasValue("VisiteType") ? $CurrentForm->getValue("VisiteType") : $CurrentForm->getValue("x_VisiteType");
        if (!$this->VisiteType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisiteType->Visible = false; // Disable update for API request
            } else {
                $this->VisiteType->setFormValue($val);
            }
        }

        // Check field name 'VisitDate' first before field var 'x_VisitDate'
        $val = $CurrentForm->hasValue("VisitDate") ? $CurrentForm->getValue("VisitDate") : $CurrentForm->getValue("x_VisitDate");
        if (!$this->VisitDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisitDate->Visible = false; // Disable update for API request
            } else {
                $this->VisitDate->setFormValue($val);
            }
            $this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
        }

        // Check field name 'Status' first before field var 'x_Status'
        $val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
        if (!$this->Status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Status->Visible = false; // Disable update for API request
            } else {
                $this->Status->setFormValue($val);
            }
        }

        // Check field name 'AdvanceValidityDate' first before field var 'x_AdvanceValidityDate'
        $val = $CurrentForm->hasValue("AdvanceValidityDate") ? $CurrentForm->getValue("AdvanceValidityDate") : $CurrentForm->getValue("x_AdvanceValidityDate");
        if (!$this->AdvanceValidityDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdvanceValidityDate->Visible = false; // Disable update for API request
            } else {
                $this->AdvanceValidityDate->setFormValue($val);
            }
            $this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
        }

        // Check field name 'TotalRemainingAdvance' first before field var 'x_TotalRemainingAdvance'
        $val = $CurrentForm->hasValue("TotalRemainingAdvance") ? $CurrentForm->getValue("TotalRemainingAdvance") : $CurrentForm->getValue("x_TotalRemainingAdvance");
        if (!$this->TotalRemainingAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalRemainingAdvance->Visible = false; // Disable update for API request
            } else {
                $this->TotalRemainingAdvance->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
            }
        }

        // Check field name 'GetUserName' first before field var 'x_GetUserName'
        $val = $CurrentForm->hasValue("GetUserName") ? $CurrentForm->getValue("GetUserName") : $CurrentForm->getValue("x_GetUserName");
        if (!$this->GetUserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GetUserName->Visible = false; // Disable update for API request
            } else {
                $this->GetUserName->setFormValue($val);
            }
        }

        // Check field name 'AdjustmentwithAdvance' first before field var 'x_AdjustmentwithAdvance'
        $val = $CurrentForm->hasValue("AdjustmentwithAdvance") ? $CurrentForm->getValue("AdjustmentwithAdvance") : $CurrentForm->getValue("x_AdjustmentwithAdvance");
        if (!$this->AdjustmentwithAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdjustmentwithAdvance->Visible = false; // Disable update for API request
            } else {
                $this->AdjustmentwithAdvance->setFormValue($val);
            }
        }

        // Check field name 'AdjustmentBillNumber' first before field var 'x_AdjustmentBillNumber'
        $val = $CurrentForm->hasValue("AdjustmentBillNumber") ? $CurrentForm->getValue("AdjustmentBillNumber") : $CurrentForm->getValue("x_AdjustmentBillNumber");
        if (!$this->AdjustmentBillNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdjustmentBillNumber->Visible = false; // Disable update for API request
            } else {
                $this->AdjustmentBillNumber->setFormValue($val);
            }
        }

        // Check field name 'CancelAdvance' first before field var 'x_CancelAdvance'
        $val = $CurrentForm->hasValue("CancelAdvance") ? $CurrentForm->getValue("CancelAdvance") : $CurrentForm->getValue("x_CancelAdvance");
        if (!$this->CancelAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelAdvance->Visible = false; // Disable update for API request
            } else {
                $this->CancelAdvance->setFormValue($val);
            }
        }

        // Check field name 'CancelReasan' first before field var 'x_CancelReasan'
        $val = $CurrentForm->hasValue("CancelReasan") ? $CurrentForm->getValue("CancelReasan") : $CurrentForm->getValue("x_CancelReasan");
        if (!$this->CancelReasan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelReasan->Visible = false; // Disable update for API request
            } else {
                $this->CancelReasan->setFormValue($val);
            }
        }

        // Check field name 'CancelBy' first before field var 'x_CancelBy'
        $val = $CurrentForm->hasValue("CancelBy") ? $CurrentForm->getValue("CancelBy") : $CurrentForm->getValue("x_CancelBy");
        if (!$this->CancelBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelBy->Visible = false; // Disable update for API request
            } else {
                $this->CancelBy->setFormValue($val);
            }
        }

        // Check field name 'CancelDate' first before field var 'x_CancelDate'
        $val = $CurrentForm->hasValue("CancelDate") ? $CurrentForm->getValue("CancelDate") : $CurrentForm->getValue("x_CancelDate");
        if (!$this->CancelDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelDate->Visible = false; // Disable update for API request
            } else {
                $this->CancelDate->setFormValue($val);
            }
            $this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 7);
        }

        // Check field name 'CancelDateTime' first before field var 'x_CancelDateTime'
        $val = $CurrentForm->hasValue("CancelDateTime") ? $CurrentForm->getValue("CancelDateTime") : $CurrentForm->getValue("x_CancelDateTime");
        if (!$this->CancelDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CancelDateTime->setFormValue($val);
            }
            $this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
        }

        // Check field name 'CanceledBy' first before field var 'x_CanceledBy'
        $val = $CurrentForm->hasValue("CanceledBy") ? $CurrentForm->getValue("CanceledBy") : $CurrentForm->getValue("x_CanceledBy");
        if (!$this->CanceledBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CanceledBy->Visible = false; // Disable update for API request
            } else {
                $this->CanceledBy->setFormValue($val);
            }
        }

        // Check field name 'CancelStatus' first before field var 'x_CancelStatus'
        $val = $CurrentForm->hasValue("CancelStatus") ? $CurrentForm->getValue("CancelStatus") : $CurrentForm->getValue("x_CancelStatus");
        if (!$this->CancelStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelStatus->Visible = false; // Disable update for API request
            } else {
                $this->CancelStatus->setFormValue($val);
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->freezed->CurrentValue = $this->freezed->FormValue;
        $this->AdvanceNo->CurrentValue = $this->AdvanceNo->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->Date->CurrentValue = $this->Date->FormValue;
        $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 7);
        $this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->VisiteType->CurrentValue = $this->VisiteType->FormValue;
        $this->VisitDate->CurrentValue = $this->VisitDate->FormValue;
        $this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->AdvanceValidityDate->CurrentValue = $this->AdvanceValidityDate->FormValue;
        $this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
        $this->TotalRemainingAdvance->CurrentValue = $this->TotalRemainingAdvance->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
        $this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
        $this->Currency->CurrentValue = $this->Currency->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->GetUserName->CurrentValue = $this->GetUserName->FormValue;
        $this->AdjustmentwithAdvance->CurrentValue = $this->AdjustmentwithAdvance->FormValue;
        $this->AdjustmentBillNumber->CurrentValue = $this->AdjustmentBillNumber->FormValue;
        $this->CancelAdvance->CurrentValue = $this->CancelAdvance->FormValue;
        $this->CancelReasan->CurrentValue = $this->CancelReasan->FormValue;
        $this->CancelBy->CurrentValue = $this->CancelBy->FormValue;
        $this->CancelDate->CurrentValue = $this->CancelDate->FormValue;
        $this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 7);
        $this->CancelDateTime->CurrentValue = $this->CancelDateTime->FormValue;
        $this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
        $this->CanceledBy->CurrentValue = $this->CanceledBy->FormValue;
        $this->CancelStatus->CurrentValue = $this->CancelStatus->FormValue;
        $this->Cash->CurrentValue = $this->Cash->FormValue;
        $this->Card->CurrentValue = $this->Card->FormValue;
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
        $this->freezed->setDbValue($row['freezed']);
        $this->AdvanceNo->setDbValue($row['AdvanceNo']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->Name->setDbValue($row['Name']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->Date->setDbValue($row['Date']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatID->setDbValue($row['PatID']);
        $this->VisiteType->setDbValue($row['VisiteType']);
        $this->VisitDate->setDbValue($row['VisitDate']);
        $this->Status->setDbValue($row['Status']);
        $this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
        $this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->GetUserName->setDbValue($row['GetUserName']);
        $this->AdjustmentwithAdvance->setDbValue($row['AdjustmentwithAdvance']);
        $this->AdjustmentBillNumber->setDbValue($row['AdjustmentBillNumber']);
        $this->CancelAdvance->setDbValue($row['CancelAdvance']);
        $this->CancelReasan->setDbValue($row['CancelReasan']);
        $this->CancelBy->setDbValue($row['CancelBy']);
        $this->CancelDate->setDbValue($row['CancelDate']);
        $this->CancelDateTime->setDbValue($row['CancelDateTime']);
        $this->CanceledBy->setDbValue($row['CanceledBy']);
        $this->CancelStatus->setDbValue($row['CancelStatus']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['freezed'] = $this->freezed->CurrentValue;
        $row['AdvanceNo'] = $this->AdvanceNo->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Details'] = $this->Details->CurrentValue;
        $row['Date'] = $this->Date->CurrentValue;
        $row['AnyDues'] = $this->AnyDues->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['VisiteType'] = $this->VisiteType->CurrentValue;
        $row['VisitDate'] = $this->VisitDate->CurrentValue;
        $row['Status'] = $this->Status->CurrentValue;
        $row['AdvanceValidityDate'] = $this->AdvanceValidityDate->CurrentValue;
        $row['TotalRemainingAdvance'] = $this->TotalRemainingAdvance->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
        $row['PaidAmount'] = $this->PaidAmount->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['GetUserName'] = $this->GetUserName->CurrentValue;
        $row['AdjustmentwithAdvance'] = $this->AdjustmentwithAdvance->CurrentValue;
        $row['AdjustmentBillNumber'] = $this->AdjustmentBillNumber->CurrentValue;
        $row['CancelAdvance'] = $this->CancelAdvance->CurrentValue;
        $row['CancelReasan'] = $this->CancelReasan->CurrentValue;
        $row['CancelBy'] = $this->CancelBy->CurrentValue;
        $row['CancelDate'] = $this->CancelDate->CurrentValue;
        $row['CancelDateTime'] = $this->CancelDateTime->CurrentValue;
        $row['CanceledBy'] = $this->CanceledBy->CurrentValue;
        $row['CancelStatus'] = $this->CancelStatus->CurrentValue;
        $row['Cash'] = $this->Cash->CurrentValue;
        $row['Card'] = $this->Card->CurrentValue;
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

        // freezed

        // AdvanceNo

        // PatientID

        // PatientName

        // Mobile

        // ModeofPayment

        // Amount

        // CardNumber

        // BankName

        // Name

        // voucher_type

        // Details

        // Date

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatID

        // VisiteType

        // VisitDate

        // Status

        // AdvanceValidityDate

        // TotalRemainingAdvance

        // Remarks

        // SeectPaymentMode

        // PaidAmount

        // Currency

        // HospID

        // Reception

        // mrnno

        // GetUserName

        // AdjustmentwithAdvance

        // AdjustmentBillNumber

        // CancelAdvance

        // CancelReasan

        // CancelBy

        // CancelDate

        // CancelDateTime

        // CanceledBy

        // CancelStatus

        // Cash

        // Card
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // freezed
            $this->freezed->ViewValue = $this->freezed->CurrentValue;
            $this->freezed->ViewCustomAttributes = "";

            // AdvanceNo
            $this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
            $this->AdvanceNo->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

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

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 7);
            $this->Date->ViewCustomAttributes = "";

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

            // PatID
            $curVal = trim(strval($this->PatID->CurrentValue));
            if ($curVal != "") {
                $this->PatID->ViewValue = $this->PatID->lookupCacheOption($curVal);
                if ($this->PatID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatID->Lookup->renderViewRow($rswrk[0]);
                        $this->PatID->ViewValue = $this->PatID->displayValue($arwrk);
                    } else {
                        $this->PatID->ViewValue = $this->PatID->CurrentValue;
                    }
                }
            } else {
                $this->PatID->ViewValue = null;
            }
            $this->PatID->ViewCustomAttributes = "";

            // VisiteType
            $this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
            $this->VisiteType->ViewCustomAttributes = "";

            // VisitDate
            $this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
            $this->VisitDate->ViewCustomAttributes = "";

            // Status
            $this->Status->ViewValue = $this->Status->CurrentValue;
            $this->Status->ViewCustomAttributes = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->ViewValue = $this->AdvanceValidityDate->CurrentValue;
            $this->AdvanceValidityDate->ViewValue = FormatDateTime($this->AdvanceValidityDate->ViewValue, 0);
            $this->AdvanceValidityDate->ViewCustomAttributes = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->ViewValue = $this->TotalRemainingAdvance->CurrentValue;
            $this->TotalRemainingAdvance->ViewCustomAttributes = "";

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

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // GetUserName
            $this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
            $this->GetUserName->ViewCustomAttributes = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->ViewValue = $this->AdjustmentwithAdvance->CurrentValue;
            $this->AdjustmentwithAdvance->ViewCustomAttributes = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->ViewValue = $this->AdjustmentBillNumber->CurrentValue;
            $this->AdjustmentBillNumber->ViewCustomAttributes = "";

            // CancelAdvance
            if (strval($this->CancelAdvance->CurrentValue) != "") {
                $this->CancelAdvance->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->CancelAdvance->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->CancelAdvance->ViewValue->add($this->CancelAdvance->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->CancelAdvance->ViewValue = null;
            }
            $this->CancelAdvance->ViewCustomAttributes = "";

            // CancelReasan
            $this->CancelReasan->ViewValue = $this->CancelReasan->CurrentValue;
            $this->CancelReasan->ViewCustomAttributes = "";

            // CancelBy
            $this->CancelBy->ViewValue = $this->CancelBy->CurrentValue;
            $this->CancelBy->ViewCustomAttributes = "";

            // CancelDate
            $this->CancelDate->ViewValue = $this->CancelDate->CurrentValue;
            $this->CancelDate->ViewValue = FormatDateTime($this->CancelDate->ViewValue, 7);
            $this->CancelDate->ViewCustomAttributes = "";

            // CancelDateTime
            $this->CancelDateTime->ViewValue = $this->CancelDateTime->CurrentValue;
            $this->CancelDateTime->ViewValue = FormatDateTime($this->CancelDateTime->ViewValue, 0);
            $this->CancelDateTime->ViewCustomAttributes = "";

            // CanceledBy
            $this->CanceledBy->ViewValue = $this->CanceledBy->CurrentValue;
            $this->CanceledBy->ViewCustomAttributes = "";

            // CancelStatus
            if (strval($this->CancelStatus->CurrentValue) != "") {
                $this->CancelStatus->ViewValue = $this->CancelStatus->optionCaption($this->CancelStatus->CurrentValue);
            } else {
                $this->CancelStatus->ViewValue = null;
            }
            $this->CancelStatus->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // freezed
            $this->freezed->LinkCustomAttributes = "";
            $this->freezed->HrefValue = "";
            $this->freezed->TooltipValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";
            $this->AdvanceNo->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";
            $this->voucher_type->TooltipValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";
            $this->Details->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";
            $this->VisiteType->TooltipValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";
            $this->VisitDate->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";
            $this->AdvanceValidityDate->TooltipValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";
            $this->TotalRemainingAdvance->TooltipValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";
            $this->GetUserName->TooltipValue = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->LinkCustomAttributes = "";
            $this->AdjustmentwithAdvance->HrefValue = "";
            $this->AdjustmentwithAdvance->TooltipValue = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->LinkCustomAttributes = "";
            $this->AdjustmentBillNumber->HrefValue = "";
            $this->AdjustmentBillNumber->TooltipValue = "";

            // CancelAdvance
            $this->CancelAdvance->LinkCustomAttributes = "";
            $this->CancelAdvance->HrefValue = "";
            $this->CancelAdvance->TooltipValue = "";

            // CancelReasan
            $this->CancelReasan->LinkCustomAttributes = "";
            $this->CancelReasan->HrefValue = "";
            $this->CancelReasan->TooltipValue = "";

            // CancelBy
            $this->CancelBy->LinkCustomAttributes = "";
            $this->CancelBy->HrefValue = "";
            $this->CancelBy->TooltipValue = "";

            // CancelDate
            $this->CancelDate->LinkCustomAttributes = "";
            $this->CancelDate->HrefValue = "";
            $this->CancelDate->TooltipValue = "";

            // CancelDateTime
            $this->CancelDateTime->LinkCustomAttributes = "";
            $this->CancelDateTime->HrefValue = "";
            $this->CancelDateTime->TooltipValue = "";

            // CanceledBy
            $this->CanceledBy->LinkCustomAttributes = "";
            $this->CanceledBy->HrefValue = "";
            $this->CanceledBy->TooltipValue = "";

            // CancelStatus
            $this->CancelStatus->LinkCustomAttributes = "";
            $this->CancelStatus->HrefValue = "";
            $this->CancelStatus->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // freezed
            $this->freezed->EditAttrs["class"] = "form-control";
            $this->freezed->EditCustomAttributes = "";
            if (!$this->freezed->Raw) {
                $this->freezed->CurrentValue = HtmlDecode($this->freezed->CurrentValue);
            }
            $this->freezed->EditValue = HtmlEncode($this->freezed->CurrentValue);
            $this->freezed->PlaceHolder = RemoveHtml($this->freezed->caption());

            // AdvanceNo
            $this->AdvanceNo->EditAttrs["class"] = "form-control";
            $this->AdvanceNo->EditCustomAttributes = "";
            if (!$this->AdvanceNo->Raw) {
                $this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
            }
            $this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->CurrentValue);
            $this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

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

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

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

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 7));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

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

            // PatID
            $this->PatID->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatID->CurrentValue));
            if ($curVal != "") {
                $this->PatID->ViewValue = $this->PatID->lookupCacheOption($curVal);
            } else {
                $this->PatID->ViewValue = $this->PatID->Lookup !== null && is_array($this->PatID->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatID->ViewValue !== null) { // Load from cache
                $this->PatID->EditValue = array_values($this->PatID->Lookup->Options);
                if ($this->PatID->ViewValue == "") {
                    $this->PatID->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PatID->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PatID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatID->Lookup->renderViewRow($rswrk[0]);
                    $this->PatID->ViewValue = $this->PatID->displayValue($arwrk);
                } else {
                    $this->PatID->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->PatID->EditValue = $arwrk;
            }
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // VisiteType
            $this->VisiteType->EditAttrs["class"] = "form-control";
            $this->VisiteType->EditCustomAttributes = "";
            if (!$this->VisiteType->Raw) {
                $this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
            }
            $this->VisiteType->EditValue = HtmlEncode($this->VisiteType->CurrentValue);
            $this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

            // VisitDate
            $this->VisitDate->EditAttrs["class"] = "form-control";
            $this->VisitDate->EditCustomAttributes = "";
            $this->VisitDate->EditValue = HtmlEncode($this->VisitDate->CurrentValue);
            $this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            if (!$this->Status->Raw) {
                $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
            }
            $this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // AdvanceValidityDate
            $this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
            $this->AdvanceValidityDate->EditCustomAttributes = "";
            $this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8));
            $this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
            $this->TotalRemainingAdvance->EditCustomAttributes = "";
            if (!$this->TotalRemainingAdvance->Raw) {
                $this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
            }
            $this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->CurrentValue);
            $this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

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

            // HospID

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // GetUserName

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
            $this->AdjustmentwithAdvance->EditCustomAttributes = "";
            if (!$this->AdjustmentwithAdvance->Raw) {
                $this->AdjustmentwithAdvance->CurrentValue = HtmlDecode($this->AdjustmentwithAdvance->CurrentValue);
            }
            $this->AdjustmentwithAdvance->EditValue = HtmlEncode($this->AdjustmentwithAdvance->CurrentValue);
            $this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
            $this->AdjustmentBillNumber->EditCustomAttributes = "";
            if (!$this->AdjustmentBillNumber->Raw) {
                $this->AdjustmentBillNumber->CurrentValue = HtmlDecode($this->AdjustmentBillNumber->CurrentValue);
            }
            $this->AdjustmentBillNumber->EditValue = HtmlEncode($this->AdjustmentBillNumber->CurrentValue);
            $this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

            // CancelAdvance
            $this->CancelAdvance->EditCustomAttributes = "";
            $this->CancelAdvance->EditValue = $this->CancelAdvance->options(false);
            $this->CancelAdvance->PlaceHolder = RemoveHtml($this->CancelAdvance->caption());

            // CancelReasan
            $this->CancelReasan->EditAttrs["class"] = "form-control";
            $this->CancelReasan->EditCustomAttributes = "";
            $this->CancelReasan->EditValue = HtmlEncode($this->CancelReasan->CurrentValue);
            $this->CancelReasan->PlaceHolder = RemoveHtml($this->CancelReasan->caption());

            // CancelBy
            $this->CancelBy->EditAttrs["class"] = "form-control";
            $this->CancelBy->EditCustomAttributes = "";
            if (!$this->CancelBy->Raw) {
                $this->CancelBy->CurrentValue = HtmlDecode($this->CancelBy->CurrentValue);
            }
            $this->CancelBy->EditValue = HtmlEncode($this->CancelBy->CurrentValue);
            $this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

            // CancelDate
            $this->CancelDate->EditAttrs["class"] = "form-control";
            $this->CancelDate->EditCustomAttributes = "";
            $this->CancelDate->EditValue = HtmlEncode(FormatDateTime($this->CancelDate->CurrentValue, 7));
            $this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

            // CancelDateTime
            $this->CancelDateTime->EditAttrs["class"] = "form-control";
            $this->CancelDateTime->EditCustomAttributes = "";
            $this->CancelDateTime->EditValue = HtmlEncode(FormatDateTime($this->CancelDateTime->CurrentValue, 8));
            $this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

            // CanceledBy
            $this->CanceledBy->EditAttrs["class"] = "form-control";
            $this->CanceledBy->EditCustomAttributes = "";
            if (!$this->CanceledBy->Raw) {
                $this->CanceledBy->CurrentValue = HtmlDecode($this->CanceledBy->CurrentValue);
            }
            $this->CanceledBy->EditValue = HtmlEncode($this->CanceledBy->CurrentValue);
            $this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

            // CancelStatus
            $this->CancelStatus->EditAttrs["class"] = "form-control";
            $this->CancelStatus->EditCustomAttributes = "";
            $this->CancelStatus->EditValue = $this->CancelStatus->options(true);
            $this->CancelStatus->PlaceHolder = RemoveHtml($this->CancelStatus->caption());

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

            // Add refer script

            // freezed
            $this->freezed->LinkCustomAttributes = "";
            $this->freezed->HrefValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->LinkCustomAttributes = "";
            $this->AdjustmentwithAdvance->HrefValue = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->LinkCustomAttributes = "";
            $this->AdjustmentBillNumber->HrefValue = "";

            // CancelAdvance
            $this->CancelAdvance->LinkCustomAttributes = "";
            $this->CancelAdvance->HrefValue = "";

            // CancelReasan
            $this->CancelReasan->LinkCustomAttributes = "";
            $this->CancelReasan->HrefValue = "";

            // CancelBy
            $this->CancelBy->LinkCustomAttributes = "";
            $this->CancelBy->HrefValue = "";

            // CancelDate
            $this->CancelDate->LinkCustomAttributes = "";
            $this->CancelDate->HrefValue = "";

            // CancelDateTime
            $this->CancelDateTime->LinkCustomAttributes = "";
            $this->CancelDateTime->HrefValue = "";

            // CanceledBy
            $this->CanceledBy->LinkCustomAttributes = "";
            $this->CanceledBy->HrefValue = "";

            // CancelStatus
            $this->CancelStatus->LinkCustomAttributes = "";
            $this->CancelStatus->HrefValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
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
        if ($this->freezed->Required) {
            if (!$this->freezed->IsDetailKey && EmptyValue($this->freezed->FormValue)) {
                $this->freezed->addErrorMessage(str_replace("%s", $this->freezed->caption(), $this->freezed->RequiredErrorMessage));
            }
        }
        if ($this->AdvanceNo->Required) {
            if (!$this->AdvanceNo->IsDetailKey && EmptyValue($this->AdvanceNo->FormValue)) {
                $this->AdvanceNo->addErrorMessage(str_replace("%s", $this->AdvanceNo->caption(), $this->AdvanceNo->RequiredErrorMessage));
            }
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
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
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
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
        if ($this->Date->Required) {
            if (!$this->Date->IsDetailKey && EmptyValue($this->Date->FormValue)) {
                $this->Date->addErrorMessage(str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->Date->FormValue)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->VisiteType->Required) {
            if (!$this->VisiteType->IsDetailKey && EmptyValue($this->VisiteType->FormValue)) {
                $this->VisiteType->addErrorMessage(str_replace("%s", $this->VisiteType->caption(), $this->VisiteType->RequiredErrorMessage));
            }
        }
        if ($this->VisitDate->Required) {
            if (!$this->VisitDate->IsDetailKey && EmptyValue($this->VisitDate->FormValue)) {
                $this->VisitDate->addErrorMessage(str_replace("%s", $this->VisitDate->caption(), $this->VisitDate->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->AdvanceValidityDate->Required) {
            if (!$this->AdvanceValidityDate->IsDetailKey && EmptyValue($this->AdvanceValidityDate->FormValue)) {
                $this->AdvanceValidityDate->addErrorMessage(str_replace("%s", $this->AdvanceValidityDate->caption(), $this->AdvanceValidityDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->AdvanceValidityDate->FormValue)) {
            $this->AdvanceValidityDate->addErrorMessage($this->AdvanceValidityDate->getErrorMessage(false));
        }
        if ($this->TotalRemainingAdvance->Required) {
            if (!$this->TotalRemainingAdvance->IsDetailKey && EmptyValue($this->TotalRemainingAdvance->FormValue)) {
                $this->TotalRemainingAdvance->addErrorMessage(str_replace("%s", $this->TotalRemainingAdvance->caption(), $this->TotalRemainingAdvance->RequiredErrorMessage));
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
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Reception->FormValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->GetUserName->Required) {
            if (!$this->GetUserName->IsDetailKey && EmptyValue($this->GetUserName->FormValue)) {
                $this->GetUserName->addErrorMessage(str_replace("%s", $this->GetUserName->caption(), $this->GetUserName->RequiredErrorMessage));
            }
        }
        if ($this->AdjustmentwithAdvance->Required) {
            if (!$this->AdjustmentwithAdvance->IsDetailKey && EmptyValue($this->AdjustmentwithAdvance->FormValue)) {
                $this->AdjustmentwithAdvance->addErrorMessage(str_replace("%s", $this->AdjustmentwithAdvance->caption(), $this->AdjustmentwithAdvance->RequiredErrorMessage));
            }
        }
        if ($this->AdjustmentBillNumber->Required) {
            if (!$this->AdjustmentBillNumber->IsDetailKey && EmptyValue($this->AdjustmentBillNumber->FormValue)) {
                $this->AdjustmentBillNumber->addErrorMessage(str_replace("%s", $this->AdjustmentBillNumber->caption(), $this->AdjustmentBillNumber->RequiredErrorMessage));
            }
        }
        if ($this->CancelAdvance->Required) {
            if ($this->CancelAdvance->FormValue == "") {
                $this->CancelAdvance->addErrorMessage(str_replace("%s", $this->CancelAdvance->caption(), $this->CancelAdvance->RequiredErrorMessage));
            }
        }
        if ($this->CancelReasan->Required) {
            if (!$this->CancelReasan->IsDetailKey && EmptyValue($this->CancelReasan->FormValue)) {
                $this->CancelReasan->addErrorMessage(str_replace("%s", $this->CancelReasan->caption(), $this->CancelReasan->RequiredErrorMessage));
            }
        }
        if ($this->CancelBy->Required) {
            if (!$this->CancelBy->IsDetailKey && EmptyValue($this->CancelBy->FormValue)) {
                $this->CancelBy->addErrorMessage(str_replace("%s", $this->CancelBy->caption(), $this->CancelBy->RequiredErrorMessage));
            }
        }
        if ($this->CancelDate->Required) {
            if (!$this->CancelDate->IsDetailKey && EmptyValue($this->CancelDate->FormValue)) {
                $this->CancelDate->addErrorMessage(str_replace("%s", $this->CancelDate->caption(), $this->CancelDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->CancelDate->FormValue)) {
            $this->CancelDate->addErrorMessage($this->CancelDate->getErrorMessage(false));
        }
        if ($this->CancelDateTime->Required) {
            if (!$this->CancelDateTime->IsDetailKey && EmptyValue($this->CancelDateTime->FormValue)) {
                $this->CancelDateTime->addErrorMessage(str_replace("%s", $this->CancelDateTime->caption(), $this->CancelDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CancelDateTime->FormValue)) {
            $this->CancelDateTime->addErrorMessage($this->CancelDateTime->getErrorMessage(false));
        }
        if ($this->CanceledBy->Required) {
            if (!$this->CanceledBy->IsDetailKey && EmptyValue($this->CanceledBy->FormValue)) {
                $this->CanceledBy->addErrorMessage(str_replace("%s", $this->CanceledBy->caption(), $this->CanceledBy->RequiredErrorMessage));
            }
        }
        if ($this->CancelStatus->Required) {
            if (!$this->CancelStatus->IsDetailKey && EmptyValue($this->CancelStatus->FormValue)) {
                $this->CancelStatus->addErrorMessage(str_replace("%s", $this->CancelStatus->caption(), $this->CancelStatus->RequiredErrorMessage));
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

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // freezed
        $this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, null, false);

        // AdvanceNo
        $this->AdvanceNo->setDbValueDef($rsnew, $this->AdvanceNo->CurrentValue, null, false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // CardNumber
        $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, false);

        // BankName
        $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // voucher_type
        $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, false);

        // Details
        $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, false);

        // Date
        $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 7), null, false);

        // AnyDues
        $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // VisiteType
        $this->VisiteType->setDbValueDef($rsnew, $this->VisiteType->CurrentValue, null, false);

        // VisitDate
        $this->VisitDate->setDbValueDef($rsnew, $this->VisitDate->CurrentValue, null, false);

        // Status
        $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, false);

        // AdvanceValidityDate
        $this->AdvanceValidityDate->setDbValueDef($rsnew, UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0), null, false);

        // TotalRemainingAdvance
        $this->TotalRemainingAdvance->setDbValueDef($rsnew, $this->TotalRemainingAdvance->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // SeectPaymentMode
        $this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, null, false);

        // PaidAmount
        $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, false);

        // Currency
        $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // GetUserName
        $this->GetUserName->CurrentValue = GetUserName();
        $this->GetUserName->setDbValueDef($rsnew, $this->GetUserName->CurrentValue, null);

        // AdjustmentwithAdvance
        $this->AdjustmentwithAdvance->setDbValueDef($rsnew, $this->AdjustmentwithAdvance->CurrentValue, null, false);

        // AdjustmentBillNumber
        $this->AdjustmentBillNumber->setDbValueDef($rsnew, $this->AdjustmentBillNumber->CurrentValue, null, false);

        // CancelAdvance
        $this->CancelAdvance->setDbValueDef($rsnew, $this->CancelAdvance->CurrentValue, null, false);

        // CancelReasan
        $this->CancelReasan->setDbValueDef($rsnew, $this->CancelReasan->CurrentValue, null, false);

        // CancelBy
        $this->CancelBy->setDbValueDef($rsnew, $this->CancelBy->CurrentValue, null, false);

        // CancelDate
        $this->CancelDate->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDate->CurrentValue, 7), null, false);

        // CancelDateTime
        $this->CancelDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDateTime->CurrentValue, 0), null, false);

        // CanceledBy
        $this->CanceledBy->setDbValueDef($rsnew, $this->CanceledBy->CurrentValue, null, false);

        // CancelStatus
        $this->CancelStatus->setDbValueDef($rsnew, $this->CancelStatus->CurrentValue, null, false);

        // Cash
        $this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, null, false);

        // Card
        $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, false);

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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("BillingOtherVoucherList"), "", $this->TableVar, true);
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
                case "x_ModeofPayment":
                    break;
                case "x_PatID":
                    break;
                case "x_CancelAdvance":
                    break;
                case "x_CancelStatus":
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
