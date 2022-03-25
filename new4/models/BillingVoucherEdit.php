<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class BillingVoucherEdit extends BillingVoucher
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'billing_voucher';

    // Page object name
    public $PageObjName = "BillingVoucherEdit";

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

        // Table object (billing_voucher)
        if (!isset($GLOBALS["billing_voucher"]) || get_class($GLOBALS["billing_voucher"]) == PROJECT_NAMESPACE . "billing_voucher") {
            $GLOBALS["billing_voucher"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'billing_voucher');
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
                $doc = new $class(Container("billing_voucher"));
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
                    if ($pageName == "BillingVoucherView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $HashValue; // Hash Value
    public $DisplayRecords = 1;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecordCount;

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
        $this->PatId->setVisibility();
        $this->Reception->setVisibility();
        $this->BillNumber->setVisibility();
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
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
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
        $this->LabTestReleased->setVisibility();
        $this->GoogleReviewID->setVisibility();
        $this->CardType->setVisibility();
        $this->PharmacyBill->setVisibility();
        $this->DiscountAmount->setVisibility();
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
        $this->setupLookupOptions($this->Reception);
        $this->setupLookupOptions($this->Doctor);
        $this->setupLookupOptions($this->voucher_type);
        $this->setupLookupOptions($this->ModeofPayment);

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-edit-form ew-horizontal";
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id") ?? Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->id->setOldValue($this->id->QueryStringValue);
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->id->setOldValue($this->id->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Get key from Form
                $this->setKey(Post($this->OldKeyName), $this->isShow());
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id") ?? Route("id")) !== null) {
                    $this->id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id->CurrentValue = null;
                }
            }

            // Load recordset
            if ($this->isShow()) {
                // Load current record
                $loaded = $this->loadRow();
                $this->OldKey = $loaded ? $this->getKey(true) : ""; // Get from CurrentValue
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values

            // Set up detail parameters
            $this->setupDetailParms();
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                if (!$loaded) { // Load record based on key
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("BillingVoucherList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "update": // Update
                if ($this->getCurrentDetailTable() != "") { // Master/detail edit
                    $returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
                } else {
                    $returnUrl = $this->getReturnUrl();
                }
                if (GetPageName($returnUrl) == "BillingVoucherList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }
                    if (IsApi()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed

                    // Set up detail parameters
                    $this->setupDetailParms();
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        if ($this->isConfirm()) { // Confirm page
            $this->RowType = ROWTYPE_VIEW; // Render as View
        } else {
            $this->RowType = ROWTYPE_EDIT; // Render as Edit
        }
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'BillNumber' first before field var 'x_BillNumber'
        $val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
        if (!$this->BillNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillNumber->Visible = false; // Disable update for API request
            } else {
                $this->BillNumber->setFormValue($val);
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
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

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
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

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
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

        // Check field name 'AnyDues' first before field var 'x_AnyDues'
        $val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
        if (!$this->AnyDues->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnyDues->Visible = false; // Disable update for API request
            } else {
                $this->AnyDues->setFormValue($val);
            }
        }

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
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

        // Check field name 'UserName' first before field var 'x__UserName'
        $val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x__UserName");
        if (!$this->_UserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_UserName->Visible = false; // Disable update for API request
            } else {
                $this->_UserName->setFormValue($val);
            }
        }

        // Check field name 'AdjustmentAdvance' first before field var 'x_AdjustmentAdvance'
        $val = $CurrentForm->hasValue("AdjustmentAdvance") ? $CurrentForm->getValue("AdjustmentAdvance") : $CurrentForm->getValue("x_AdjustmentAdvance");
        if (!$this->AdjustmentAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdjustmentAdvance->Visible = false; // Disable update for API request
            } else {
                $this->AdjustmentAdvance->setFormValue($val);
            }
        }

        // Check field name 'billing_vouchercol' first before field var 'x_billing_vouchercol'
        $val = $CurrentForm->hasValue("billing_vouchercol") ? $CurrentForm->getValue("billing_vouchercol") : $CurrentForm->getValue("x_billing_vouchercol");
        if (!$this->billing_vouchercol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->billing_vouchercol->Visible = false; // Disable update for API request
            } else {
                $this->billing_vouchercol->setFormValue($val);
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

        // Check field name 'ProcedureName' first before field var 'x_ProcedureName'
        $val = $CurrentForm->hasValue("ProcedureName") ? $CurrentForm->getValue("ProcedureName") : $CurrentForm->getValue("x_ProcedureName");
        if (!$this->ProcedureName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureName->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureName->setFormValue($val);
            }
        }

        // Check field name 'ProcedureAmount' first before field var 'x_ProcedureAmount'
        $val = $CurrentForm->hasValue("ProcedureAmount") ? $CurrentForm->getValue("ProcedureAmount") : $CurrentForm->getValue("x_ProcedureAmount");
        if (!$this->ProcedureAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureAmount->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureAmount->setFormValue($val);
            }
        }

        // Check field name 'IncludePackage' first before field var 'x_IncludePackage'
        $val = $CurrentForm->hasValue("IncludePackage") ? $CurrentForm->getValue("IncludePackage") : $CurrentForm->getValue("x_IncludePackage");
        if (!$this->IncludePackage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IncludePackage->Visible = false; // Disable update for API request
            } else {
                $this->IncludePackage->setFormValue($val);
            }
        }

        // Check field name 'CancelBill' first before field var 'x_CancelBill'
        $val = $CurrentForm->hasValue("CancelBill") ? $CurrentForm->getValue("CancelBill") : $CurrentForm->getValue("x_CancelBill");
        if (!$this->CancelBill->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelBill->Visible = false; // Disable update for API request
            } else {
                $this->CancelBill->setFormValue($val);
            }
        }

        // Check field name 'CancelReason' first before field var 'x_CancelReason'
        $val = $CurrentForm->hasValue("CancelReason") ? $CurrentForm->getValue("CancelReason") : $CurrentForm->getValue("x_CancelReason");
        if (!$this->CancelReason->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelReason->Visible = false; // Disable update for API request
            } else {
                $this->CancelReason->setFormValue($val);
            }
        }

        // Check field name 'CancelModeOfPayment' first before field var 'x_CancelModeOfPayment'
        $val = $CurrentForm->hasValue("CancelModeOfPayment") ? $CurrentForm->getValue("CancelModeOfPayment") : $CurrentForm->getValue("x_CancelModeOfPayment");
        if (!$this->CancelModeOfPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelModeOfPayment->Visible = false; // Disable update for API request
            } else {
                $this->CancelModeOfPayment->setFormValue($val);
            }
        }

        // Check field name 'CancelAmount' first before field var 'x_CancelAmount'
        $val = $CurrentForm->hasValue("CancelAmount") ? $CurrentForm->getValue("CancelAmount") : $CurrentForm->getValue("x_CancelAmount");
        if (!$this->CancelAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelAmount->Visible = false; // Disable update for API request
            } else {
                $this->CancelAmount->setFormValue($val);
            }
        }

        // Check field name 'CancelBankName' first before field var 'x_CancelBankName'
        $val = $CurrentForm->hasValue("CancelBankName") ? $CurrentForm->getValue("CancelBankName") : $CurrentForm->getValue("x_CancelBankName");
        if (!$this->CancelBankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelBankName->Visible = false; // Disable update for API request
            } else {
                $this->CancelBankName->setFormValue($val);
            }
        }

        // Check field name 'CancelTransactionNumber' first before field var 'x_CancelTransactionNumber'
        $val = $CurrentForm->hasValue("CancelTransactionNumber") ? $CurrentForm->getValue("CancelTransactionNumber") : $CurrentForm->getValue("x_CancelTransactionNumber");
        if (!$this->CancelTransactionNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelTransactionNumber->Visible = false; // Disable update for API request
            } else {
                $this->CancelTransactionNumber->setFormValue($val);
            }
        }

        // Check field name 'LabTest' first before field var 'x_LabTest'
        $val = $CurrentForm->hasValue("LabTest") ? $CurrentForm->getValue("LabTest") : $CurrentForm->getValue("x_LabTest");
        if (!$this->LabTest->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabTest->Visible = false; // Disable update for API request
            } else {
                $this->LabTest->setFormValue($val);
            }
        }

        // Check field name 'sid' first before field var 'x_sid'
        $val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
        if (!$this->sid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sid->Visible = false; // Disable update for API request
            } else {
                $this->sid->setFormValue($val);
            }
        }

        // Check field name 'SidNo' first before field var 'x_SidNo'
        $val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
        if (!$this->SidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SidNo->Visible = false; // Disable update for API request
            } else {
                $this->SidNo->setFormValue($val);
            }
        }

        // Check field name 'createdDatettime' first before field var 'x_createdDatettime'
        $val = $CurrentForm->hasValue("createdDatettime") ? $CurrentForm->getValue("createdDatettime") : $CurrentForm->getValue("x_createdDatettime");
        if (!$this->createdDatettime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdDatettime->Visible = false; // Disable update for API request
            } else {
                $this->createdDatettime->setFormValue($val);
            }
            $this->createdDatettime->CurrentValue = UnFormatDateTime($this->createdDatettime->CurrentValue, 0);
        }

        // Check field name 'LabTestReleased' first before field var 'x_LabTestReleased'
        $val = $CurrentForm->hasValue("LabTestReleased") ? $CurrentForm->getValue("LabTestReleased") : $CurrentForm->getValue("x_LabTestReleased");
        if (!$this->LabTestReleased->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabTestReleased->Visible = false; // Disable update for API request
            } else {
                $this->LabTestReleased->setFormValue($val);
            }
        }

        // Check field name 'GoogleReviewID' first before field var 'x_GoogleReviewID'
        $val = $CurrentForm->hasValue("GoogleReviewID") ? $CurrentForm->getValue("GoogleReviewID") : $CurrentForm->getValue("x_GoogleReviewID");
        if (!$this->GoogleReviewID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GoogleReviewID->Visible = false; // Disable update for API request
            } else {
                $this->GoogleReviewID->setFormValue($val);
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

        // Check field name 'PharmacyBill' first before field var 'x_PharmacyBill'
        $val = $CurrentForm->hasValue("PharmacyBill") ? $CurrentForm->getValue("PharmacyBill") : $CurrentForm->getValue("x_PharmacyBill");
        if (!$this->PharmacyBill->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PharmacyBill->Visible = false; // Disable update for API request
            } else {
                $this->PharmacyBill->setFormValue($val);
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PatId->CurrentValue = $this->PatId->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->IP_OP->CurrentValue = $this->IP_OP->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
        $this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
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
        $this->Dob->CurrentValue = $this->Dob->FormValue;
        $this->Currency->CurrentValue = $this->Currency->FormValue;
        $this->DiscountRemarks->CurrentValue = $this->DiscountRemarks->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->DrDepartment->CurrentValue = $this->DrDepartment->FormValue;
        $this->RefferedBy->CurrentValue = $this->RefferedBy->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
        $this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
        $this->_UserName->CurrentValue = $this->_UserName->FormValue;
        $this->AdjustmentAdvance->CurrentValue = $this->AdjustmentAdvance->FormValue;
        $this->billing_vouchercol->CurrentValue = $this->billing_vouchercol->FormValue;
        $this->BillType->CurrentValue = $this->BillType->FormValue;
        $this->ProcedureName->CurrentValue = $this->ProcedureName->FormValue;
        $this->ProcedureAmount->CurrentValue = $this->ProcedureAmount->FormValue;
        $this->IncludePackage->CurrentValue = $this->IncludePackage->FormValue;
        $this->CancelBill->CurrentValue = $this->CancelBill->FormValue;
        $this->CancelReason->CurrentValue = $this->CancelReason->FormValue;
        $this->CancelModeOfPayment->CurrentValue = $this->CancelModeOfPayment->FormValue;
        $this->CancelAmount->CurrentValue = $this->CancelAmount->FormValue;
        $this->CancelBankName->CurrentValue = $this->CancelBankName->FormValue;
        $this->CancelTransactionNumber->CurrentValue = $this->CancelTransactionNumber->FormValue;
        $this->LabTest->CurrentValue = $this->LabTest->FormValue;
        $this->sid->CurrentValue = $this->sid->FormValue;
        $this->SidNo->CurrentValue = $this->SidNo->FormValue;
        $this->createdDatettime->CurrentValue = $this->createdDatettime->FormValue;
        $this->createdDatettime->CurrentValue = UnFormatDateTime($this->createdDatettime->CurrentValue, 0);
        $this->LabTestReleased->CurrentValue = $this->LabTestReleased->FormValue;
        $this->GoogleReviewID->CurrentValue = $this->GoogleReviewID->FormValue;
        $this->CardType->CurrentValue = $this->CardType->FormValue;
        $this->PharmacyBill->CurrentValue = $this->PharmacyBill->FormValue;
        $this->DiscountAmount->CurrentValue = $this->DiscountAmount->FormValue;
        $this->Cash->CurrentValue = $this->Cash->FormValue;
        $this->Card->CurrentValue = $this->Card->FormValue;
        $this->resetDetailParms();
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
        $this->PatId->setDbValue($row['PatId']);
        $this->Reception->setDbValue($row['Reception']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->IP_OP->setDbValue($row['IP_OP']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->voucher_type->setDbValue($row['voucher_type']);
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
        $this->Dob->setDbValue($row['Dob']);
        $this->Currency->setDbValue($row['Currency']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->AdjustmentAdvance->setDbValue($row['AdjustmentAdvance']);
        $this->billing_vouchercol->setDbValue($row['billing_vouchercol']);
        $this->BillType->setDbValue($row['BillType']);
        $this->ProcedureName->setDbValue($row['ProcedureName']);
        $this->ProcedureAmount->setDbValue($row['ProcedureAmount']);
        $this->IncludePackage->setDbValue($row['IncludePackage']);
        $this->CancelBill->setDbValue($row['CancelBill']);
        $this->CancelReason->setDbValue($row['CancelReason']);
        $this->CancelModeOfPayment->setDbValue($row['CancelModeOfPayment']);
        $this->CancelAmount->setDbValue($row['CancelAmount']);
        $this->CancelBankName->setDbValue($row['CancelBankName']);
        $this->CancelTransactionNumber->setDbValue($row['CancelTransactionNumber']);
        $this->LabTest->setDbValue($row['LabTest']);
        $this->sid->setDbValue($row['sid']);
        $this->SidNo->setDbValue($row['SidNo']);
        $this->createdDatettime->setDbValue($row['createdDatettime']);
        $this->LabTestReleased->setDbValue($row['LabTestReleased']);
        $this->GoogleReviewID->setDbValue($row['GoogleReviewID']);
        $this->CardType->setDbValue($row['CardType']);
        $this->PharmacyBill->setDbValue($row['PharmacyBill']);
        $this->DiscountAmount->setDbValue($row['DiscountAmount']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatId'] = null;
        $row['Reception'] = null;
        $row['BillNumber'] = null;
        $row['PatientId'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['Mobile'] = null;
        $row['IP_OP'] = null;
        $row['Doctor'] = null;
        $row['voucher_type'] = null;
        $row['Details'] = null;
        $row['ModeofPayment'] = null;
        $row['Amount'] = null;
        $row['AnyDues'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['RealizationAmount'] = null;
        $row['RealizationStatus'] = null;
        $row['RealizationRemarks'] = null;
        $row['RealizationBatchNo'] = null;
        $row['RealizationDate'] = null;
        $row['HospID'] = null;
        $row['RIDNO'] = null;
        $row['TidNo'] = null;
        $row['CId'] = null;
        $row['PartnerName'] = null;
        $row['PayerType'] = null;
        $row['Dob'] = null;
        $row['Currency'] = null;
        $row['DiscountRemarks'] = null;
        $row['Remarks'] = null;
        $row['DrDepartment'] = null;
        $row['RefferedBy'] = null;
        $row['CardNumber'] = null;
        $row['BankName'] = null;
        $row['DrID'] = null;
        $row['BillStatus'] = null;
        $row['ReportHeader'] = null;
        $row['UserName'] = null;
        $row['AdjustmentAdvance'] = null;
        $row['billing_vouchercol'] = null;
        $row['BillType'] = null;
        $row['ProcedureName'] = null;
        $row['ProcedureAmount'] = null;
        $row['IncludePackage'] = null;
        $row['CancelBill'] = null;
        $row['CancelReason'] = null;
        $row['CancelModeOfPayment'] = null;
        $row['CancelAmount'] = null;
        $row['CancelBankName'] = null;
        $row['CancelTransactionNumber'] = null;
        $row['LabTest'] = null;
        $row['sid'] = null;
        $row['SidNo'] = null;
        $row['createdDatettime'] = null;
        $row['LabTestReleased'] = null;
        $row['GoogleReviewID'] = null;
        $row['CardType'] = null;
        $row['PharmacyBill'] = null;
        $row['DiscountAmount'] = null;
        $row['Cash'] = null;
        $row['Card'] = null;
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
        if ($this->ProcedureAmount->FormValue == $this->ProcedureAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProcedureAmount->CurrentValue))) {
            $this->ProcedureAmount->CurrentValue = ConvertToFloatString($this->ProcedureAmount->CurrentValue);
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

        // PatId

        // Reception

        // BillNumber

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

        // Dob

        // Currency

        // DiscountRemarks

        // Remarks

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

        // LabTestReleased

        // GoogleReviewID

        // CardType

        // PharmacyBill

        // DiscountAmount

        // Cash

        // Card
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatId
            $this->PatId->ViewValue = $this->PatId->CurrentValue;
            $this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
            $this->PatId->ViewCustomAttributes = "";

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

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ImageWidth = 180;
            $this->PatientId->ImageHeight = 60;
            $this->PatientId->ImageAlt = $this->PatientId->alt();
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
            $curVal = trim(strval($this->Doctor->CurrentValue));
            if ($curVal != "") {
                $this->Doctor->ViewValue = $this->Doctor->lookupCacheOption($curVal);
                if ($this->Doctor->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Doctor->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Doctor->Lookup->renderViewRow($rswrk[0]);
                        $this->Doctor->ViewValue = $this->Doctor->displayValue($arwrk);
                    } else {
                        $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
                    }
                }
            } else {
                $this->Doctor->ViewValue = null;
            }
            $this->Doctor->ViewCustomAttributes = "";

            // voucher_type
            $curVal = trim(strval($this->voucher_type->CurrentValue));
            if ($curVal != "") {
                $this->voucher_type->ViewValue = $this->voucher_type->lookupCacheOption($curVal);
                if ($this->voucher_type->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Type`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->voucher_type->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->voucher_type->Lookup->renderViewRow($rswrk[0]);
                        $this->voucher_type->ViewValue = $this->voucher_type->displayValue($arwrk);
                    } else {
                        $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
                    }
                }
            } else {
                $this->voucher_type->ViewValue = null;
            }
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

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
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
            $this->CId->ViewValue = $this->CId->CurrentValue;
            $this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
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

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // RefferedBy
            $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
            $this->RefferedBy->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // DrID
            $this->DrID->ViewValue = $this->DrID->CurrentValue;
            $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // BillStatus
            $this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
            $this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
            $this->BillStatus->ViewCustomAttributes = "";

            // ReportHeader
            $this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
            $this->ReportHeader->ViewCustomAttributes = "";

            // UserName
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";

            // AdjustmentAdvance
            $this->AdjustmentAdvance->ViewValue = $this->AdjustmentAdvance->CurrentValue;
            $this->AdjustmentAdvance->ViewCustomAttributes = "";

            // billing_vouchercol
            $this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
            $this->billing_vouchercol->ViewCustomAttributes = "";

            // BillType
            $this->BillType->ViewValue = $this->BillType->CurrentValue;
            $this->BillType->ViewCustomAttributes = "";

            // ProcedureName
            $this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
            $this->ProcedureName->ViewCustomAttributes = "";

            // ProcedureAmount
            $this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
            $this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
            $this->ProcedureAmount->ViewCustomAttributes = "";

            // IncludePackage
            $this->IncludePackage->ViewValue = $this->IncludePackage->CurrentValue;
            $this->IncludePackage->ViewCustomAttributes = "";

            // CancelBill
            $this->CancelBill->ViewValue = $this->CancelBill->CurrentValue;
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

            // LabTestReleased
            $this->LabTestReleased->ViewValue = $this->LabTestReleased->CurrentValue;
            $this->LabTestReleased->ViewCustomAttributes = "";

            // GoogleReviewID
            $this->GoogleReviewID->ViewValue = $this->GoogleReviewID->CurrentValue;
            $this->GoogleReviewID->ViewCustomAttributes = "";

            // CardType
            $this->CardType->ViewValue = $this->CardType->CurrentValue;
            $this->CardType->ViewCustomAttributes = "";

            // PharmacyBill
            $this->PharmacyBill->ViewValue = $this->PharmacyBill->CurrentValue;
            $this->PharmacyBill->ViewCustomAttributes = "";

            // DiscountAmount
            $this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
            $this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
            $this->DiscountAmount->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->ExportHrefValue = Barcode()->getHrefValue($this->PatId->CurrentValue, 'QRCODE', 60);
            $this->PatId->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 60);
            $this->Reception->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

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

            // LabTestReleased
            $this->LabTestReleased->LinkCustomAttributes = "";
            $this->LabTestReleased->HrefValue = "";
            $this->LabTestReleased->TooltipValue = "";

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

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";
            $this->DiscountAmount->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatId
            $this->PatId->EditAttrs["class"] = "form-control";
            $this->PatId->EditCustomAttributes = "";
            $this->PatId->EditValue = HtmlEncode($this->PatId->CurrentValue);
            $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

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
                $this->Reception->EditValue = $arwrk;
            }
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            if (!$this->profilePic->Raw) {
                $this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
            }
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

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
            $curVal = trim(strval($this->Doctor->CurrentValue));
            if ($curVal != "") {
                $this->Doctor->EditValue = $this->Doctor->lookupCacheOption($curVal);
                if ($this->Doctor->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Doctor->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Doctor->Lookup->renderViewRow($rswrk[0]);
                        $this->Doctor->EditValue = $this->Doctor->displayValue($arwrk);
                    } else {
                        $this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
                    }
                }
            } else {
                $this->Doctor->EditValue = null;
            }
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            $curVal = trim(strval($this->voucher_type->CurrentValue));
            if ($curVal != "") {
                $this->voucher_type->ViewValue = $this->voucher_type->lookupCacheOption($curVal);
            } else {
                $this->voucher_type->ViewValue = $this->voucher_type->Lookup !== null && is_array($this->voucher_type->Lookup->Options) ? $curVal : null;
            }
            if ($this->voucher_type->ViewValue !== null) { // Load from cache
                $this->voucher_type->EditValue = array_values($this->voucher_type->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Type`" . SearchString("=", $this->voucher_type->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->voucher_type->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->voucher_type->EditValue = $arwrk;
            }
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

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // modifiedby

            // modifieddatetime

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
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
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

            // DrDepartment
            $this->DrDepartment->EditAttrs["class"] = "form-control";
            $this->DrDepartment->EditCustomAttributes = "";
            if (!$this->DrDepartment->Raw) {
                $this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
            }
            $this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->CurrentValue);
            $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

            // RefferedBy
            $this->RefferedBy->EditAttrs["class"] = "form-control";
            $this->RefferedBy->EditCustomAttributes = "";
            if (!$this->RefferedBy->Raw) {
                $this->RefferedBy->CurrentValue = HtmlDecode($this->RefferedBy->CurrentValue);
            }
            $this->RefferedBy->EditValue = HtmlEncode($this->RefferedBy->CurrentValue);
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
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // ReportHeader
            $this->ReportHeader->EditAttrs["class"] = "form-control";
            $this->ReportHeader->EditCustomAttributes = "";
            if (!$this->ReportHeader->Raw) {
                $this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
            }
            $this->ReportHeader->EditValue = HtmlEncode($this->ReportHeader->CurrentValue);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // UserName

            // AdjustmentAdvance
            $this->AdjustmentAdvance->EditAttrs["class"] = "form-control";
            $this->AdjustmentAdvance->EditCustomAttributes = "";
            if (!$this->AdjustmentAdvance->Raw) {
                $this->AdjustmentAdvance->CurrentValue = HtmlDecode($this->AdjustmentAdvance->CurrentValue);
            }
            $this->AdjustmentAdvance->EditValue = HtmlEncode($this->AdjustmentAdvance->CurrentValue);
            $this->AdjustmentAdvance->PlaceHolder = RemoveHtml($this->AdjustmentAdvance->caption());

            // billing_vouchercol
            $this->billing_vouchercol->EditAttrs["class"] = "form-control";
            $this->billing_vouchercol->EditCustomAttributes = "";
            if (!$this->billing_vouchercol->Raw) {
                $this->billing_vouchercol->CurrentValue = HtmlDecode($this->billing_vouchercol->CurrentValue);
            }
            $this->billing_vouchercol->EditValue = HtmlEncode($this->billing_vouchercol->CurrentValue);
            $this->billing_vouchercol->PlaceHolder = RemoveHtml($this->billing_vouchercol->caption());

            // BillType
            $this->BillType->EditAttrs["class"] = "form-control";
            $this->BillType->EditCustomAttributes = "";
            if (!$this->BillType->Raw) {
                $this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
            }
            $this->BillType->EditValue = HtmlEncode($this->BillType->CurrentValue);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // ProcedureName
            $this->ProcedureName->EditAttrs["class"] = "form-control";
            $this->ProcedureName->EditCustomAttributes = "";
            if (!$this->ProcedureName->Raw) {
                $this->ProcedureName->CurrentValue = HtmlDecode($this->ProcedureName->CurrentValue);
            }
            $this->ProcedureName->EditValue = HtmlEncode($this->ProcedureName->CurrentValue);
            $this->ProcedureName->PlaceHolder = RemoveHtml($this->ProcedureName->caption());

            // ProcedureAmount
            $this->ProcedureAmount->EditAttrs["class"] = "form-control";
            $this->ProcedureAmount->EditCustomAttributes = "";
            $this->ProcedureAmount->EditValue = HtmlEncode($this->ProcedureAmount->CurrentValue);
            $this->ProcedureAmount->PlaceHolder = RemoveHtml($this->ProcedureAmount->caption());
            if (strval($this->ProcedureAmount->EditValue) != "" && is_numeric($this->ProcedureAmount->EditValue)) {
                $this->ProcedureAmount->EditValue = FormatNumber($this->ProcedureAmount->EditValue, -2, -2, -2, -2);
            }

            // IncludePackage
            $this->IncludePackage->EditAttrs["class"] = "form-control";
            $this->IncludePackage->EditCustomAttributes = "";
            if (!$this->IncludePackage->Raw) {
                $this->IncludePackage->CurrentValue = HtmlDecode($this->IncludePackage->CurrentValue);
            }
            $this->IncludePackage->EditValue = HtmlEncode($this->IncludePackage->CurrentValue);
            $this->IncludePackage->PlaceHolder = RemoveHtml($this->IncludePackage->caption());

            // CancelBill
            $this->CancelBill->EditAttrs["class"] = "form-control";
            $this->CancelBill->EditCustomAttributes = "";
            if (!$this->CancelBill->Raw) {
                $this->CancelBill->CurrentValue = HtmlDecode($this->CancelBill->CurrentValue);
            }
            $this->CancelBill->EditValue = HtmlEncode($this->CancelBill->CurrentValue);
            $this->CancelBill->PlaceHolder = RemoveHtml($this->CancelBill->caption());

            // CancelReason
            $this->CancelReason->EditAttrs["class"] = "form-control";
            $this->CancelReason->EditCustomAttributes = "";
            if (!$this->CancelReason->Raw) {
                $this->CancelReason->CurrentValue = HtmlDecode($this->CancelReason->CurrentValue);
            }
            $this->CancelReason->EditValue = HtmlEncode($this->CancelReason->CurrentValue);
            $this->CancelReason->PlaceHolder = RemoveHtml($this->CancelReason->caption());

            // CancelModeOfPayment
            $this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
            $this->CancelModeOfPayment->EditCustomAttributes = "";
            if (!$this->CancelModeOfPayment->Raw) {
                $this->CancelModeOfPayment->CurrentValue = HtmlDecode($this->CancelModeOfPayment->CurrentValue);
            }
            $this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->CurrentValue);
            $this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

            // CancelAmount
            $this->CancelAmount->EditAttrs["class"] = "form-control";
            $this->CancelAmount->EditCustomAttributes = "";
            if (!$this->CancelAmount->Raw) {
                $this->CancelAmount->CurrentValue = HtmlDecode($this->CancelAmount->CurrentValue);
            }
            $this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->CurrentValue);
            $this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

            // CancelBankName
            $this->CancelBankName->EditAttrs["class"] = "form-control";
            $this->CancelBankName->EditCustomAttributes = "";
            if (!$this->CancelBankName->Raw) {
                $this->CancelBankName->CurrentValue = HtmlDecode($this->CancelBankName->CurrentValue);
            }
            $this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->CurrentValue);
            $this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

            // CancelTransactionNumber
            $this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
            $this->CancelTransactionNumber->EditCustomAttributes = "";
            if (!$this->CancelTransactionNumber->Raw) {
                $this->CancelTransactionNumber->CurrentValue = HtmlDecode($this->CancelTransactionNumber->CurrentValue);
            }
            $this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->CurrentValue);
            $this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

            // LabTest
            $this->LabTest->EditAttrs["class"] = "form-control";
            $this->LabTest->EditCustomAttributes = "";
            if (!$this->LabTest->Raw) {
                $this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
            }
            $this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
            $this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // SidNo
            $this->SidNo->EditAttrs["class"] = "form-control";
            $this->SidNo->EditCustomAttributes = "";
            if (!$this->SidNo->Raw) {
                $this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
            }
            $this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
            $this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

            // createdDatettime

            // LabTestReleased
            $this->LabTestReleased->EditAttrs["class"] = "form-control";
            $this->LabTestReleased->EditCustomAttributes = "";
            if (!$this->LabTestReleased->Raw) {
                $this->LabTestReleased->CurrentValue = HtmlDecode($this->LabTestReleased->CurrentValue);
            }
            $this->LabTestReleased->EditValue = HtmlEncode($this->LabTestReleased->CurrentValue);
            $this->LabTestReleased->PlaceHolder = RemoveHtml($this->LabTestReleased->caption());

            // GoogleReviewID
            $this->GoogleReviewID->EditAttrs["class"] = "form-control";
            $this->GoogleReviewID->EditCustomAttributes = "";
            if (!$this->GoogleReviewID->Raw) {
                $this->GoogleReviewID->CurrentValue = HtmlDecode($this->GoogleReviewID->CurrentValue);
            }
            $this->GoogleReviewID->EditValue = HtmlEncode($this->GoogleReviewID->CurrentValue);
            $this->GoogleReviewID->PlaceHolder = RemoveHtml($this->GoogleReviewID->caption());

            // CardType
            $this->CardType->EditAttrs["class"] = "form-control";
            $this->CardType->EditCustomAttributes = "";
            if (!$this->CardType->Raw) {
                $this->CardType->CurrentValue = HtmlDecode($this->CardType->CurrentValue);
            }
            $this->CardType->EditValue = HtmlEncode($this->CardType->CurrentValue);
            $this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

            // PharmacyBill
            $this->PharmacyBill->EditAttrs["class"] = "form-control";
            $this->PharmacyBill->EditCustomAttributes = "";
            if (!$this->PharmacyBill->Raw) {
                $this->PharmacyBill->CurrentValue = HtmlDecode($this->PharmacyBill->CurrentValue);
            }
            $this->PharmacyBill->EditValue = HtmlEncode($this->PharmacyBill->CurrentValue);
            $this->PharmacyBill->PlaceHolder = RemoveHtml($this->PharmacyBill->caption());

            // DiscountAmount
            $this->DiscountAmount->EditAttrs["class"] = "form-control";
            $this->DiscountAmount->EditCustomAttributes = "";
            $this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
            $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
            if (strval($this->DiscountAmount->EditValue) != "" && is_numeric($this->DiscountAmount->EditValue)) {
                $this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);
            }

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

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->ExportHrefValue = Barcode()->getHrefValue($this->PatId->CurrentValue, 'QRCODE', 60);

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 60);

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";

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

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

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

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";

            // AdjustmentAdvance
            $this->AdjustmentAdvance->LinkCustomAttributes = "";
            $this->AdjustmentAdvance->HrefValue = "";

            // billing_vouchercol
            $this->billing_vouchercol->LinkCustomAttributes = "";
            $this->billing_vouchercol->HrefValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";

            // ProcedureName
            $this->ProcedureName->LinkCustomAttributes = "";
            $this->ProcedureName->HrefValue = "";

            // ProcedureAmount
            $this->ProcedureAmount->LinkCustomAttributes = "";
            $this->ProcedureAmount->HrefValue = "";

            // IncludePackage
            $this->IncludePackage->LinkCustomAttributes = "";
            $this->IncludePackage->HrefValue = "";

            // CancelBill
            $this->CancelBill->LinkCustomAttributes = "";
            $this->CancelBill->HrefValue = "";

            // CancelReason
            $this->CancelReason->LinkCustomAttributes = "";
            $this->CancelReason->HrefValue = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->LinkCustomAttributes = "";
            $this->CancelModeOfPayment->HrefValue = "";

            // CancelAmount
            $this->CancelAmount->LinkCustomAttributes = "";
            $this->CancelAmount->HrefValue = "";

            // CancelBankName
            $this->CancelBankName->LinkCustomAttributes = "";
            $this->CancelBankName->HrefValue = "";

            // CancelTransactionNumber
            $this->CancelTransactionNumber->LinkCustomAttributes = "";
            $this->CancelTransactionNumber->HrefValue = "";

            // LabTest
            $this->LabTest->LinkCustomAttributes = "";
            $this->LabTest->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";

            // createdDatettime
            $this->createdDatettime->LinkCustomAttributes = "";
            $this->createdDatettime->HrefValue = "";

            // LabTestReleased
            $this->LabTestReleased->LinkCustomAttributes = "";
            $this->LabTestReleased->HrefValue = "";

            // GoogleReviewID
            $this->GoogleReviewID->LinkCustomAttributes = "";
            $this->GoogleReviewID->HrefValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";

            // PharmacyBill
            $this->PharmacyBill->LinkCustomAttributes = "";
            $this->PharmacyBill->HrefValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";

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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->PatId->Required) {
            if (!$this->PatId->IsDetailKey && EmptyValue($this->PatId->FormValue)) {
                $this->PatId->addErrorMessage(str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatId->FormValue)) {
            $this->PatId->addErrorMessage($this->PatId->getErrorMessage(false));
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->BillNumber->Required) {
            if (!$this->BillNumber->IsDetailKey && EmptyValue($this->BillNumber->FormValue)) {
                $this->BillNumber->addErrorMessage(str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatientId->FormValue)) {
            $this->PatientId->addErrorMessage($this->PatientId->getErrorMessage(false));
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->Gender->Required) {
            if (!$this->Gender->IsDetailKey && EmptyValue($this->Gender->FormValue)) {
                $this->Gender->addErrorMessage(str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->Mobile->Required) {
            if (!$this->Mobile->IsDetailKey && EmptyValue($this->Mobile->FormValue)) {
                $this->Mobile->addErrorMessage(str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
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
        if ($this->AnyDues->Required) {
            if (!$this->AnyDues->IsDetailKey && EmptyValue($this->AnyDues->FormValue)) {
                $this->AnyDues->addErrorMessage(str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
            }
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
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
        if (!CheckInteger($this->RIDNO->FormValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
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
        if (!CheckInteger($this->CId->FormValue)) {
            $this->CId->addErrorMessage($this->CId->getErrorMessage(false));
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
        if (!CheckInteger($this->DrID->FormValue)) {
            $this->DrID->addErrorMessage($this->DrID->getErrorMessage(false));
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
            if (!$this->ReportHeader->IsDetailKey && EmptyValue($this->ReportHeader->FormValue)) {
                $this->ReportHeader->addErrorMessage(str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
            }
        }
        if ($this->_UserName->Required) {
            if (!$this->_UserName->IsDetailKey && EmptyValue($this->_UserName->FormValue)) {
                $this->_UserName->addErrorMessage(str_replace("%s", $this->_UserName->caption(), $this->_UserName->RequiredErrorMessage));
            }
        }
        if ($this->AdjustmentAdvance->Required) {
            if (!$this->AdjustmentAdvance->IsDetailKey && EmptyValue($this->AdjustmentAdvance->FormValue)) {
                $this->AdjustmentAdvance->addErrorMessage(str_replace("%s", $this->AdjustmentAdvance->caption(), $this->AdjustmentAdvance->RequiredErrorMessage));
            }
        }
        if ($this->billing_vouchercol->Required) {
            if (!$this->billing_vouchercol->IsDetailKey && EmptyValue($this->billing_vouchercol->FormValue)) {
                $this->billing_vouchercol->addErrorMessage(str_replace("%s", $this->billing_vouchercol->caption(), $this->billing_vouchercol->RequiredErrorMessage));
            }
        }
        if ($this->BillType->Required) {
            if (!$this->BillType->IsDetailKey && EmptyValue($this->BillType->FormValue)) {
                $this->BillType->addErrorMessage(str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureName->Required) {
            if (!$this->ProcedureName->IsDetailKey && EmptyValue($this->ProcedureName->FormValue)) {
                $this->ProcedureName->addErrorMessage(str_replace("%s", $this->ProcedureName->caption(), $this->ProcedureName->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureAmount->Required) {
            if (!$this->ProcedureAmount->IsDetailKey && EmptyValue($this->ProcedureAmount->FormValue)) {
                $this->ProcedureAmount->addErrorMessage(str_replace("%s", $this->ProcedureAmount->caption(), $this->ProcedureAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ProcedureAmount->FormValue)) {
            $this->ProcedureAmount->addErrorMessage($this->ProcedureAmount->getErrorMessage(false));
        }
        if ($this->IncludePackage->Required) {
            if (!$this->IncludePackage->IsDetailKey && EmptyValue($this->IncludePackage->FormValue)) {
                $this->IncludePackage->addErrorMessage(str_replace("%s", $this->IncludePackage->caption(), $this->IncludePackage->RequiredErrorMessage));
            }
        }
        if ($this->CancelBill->Required) {
            if (!$this->CancelBill->IsDetailKey && EmptyValue($this->CancelBill->FormValue)) {
                $this->CancelBill->addErrorMessage(str_replace("%s", $this->CancelBill->caption(), $this->CancelBill->RequiredErrorMessage));
            }
        }
        if ($this->CancelReason->Required) {
            if (!$this->CancelReason->IsDetailKey && EmptyValue($this->CancelReason->FormValue)) {
                $this->CancelReason->addErrorMessage(str_replace("%s", $this->CancelReason->caption(), $this->CancelReason->RequiredErrorMessage));
            }
        }
        if ($this->CancelModeOfPayment->Required) {
            if (!$this->CancelModeOfPayment->IsDetailKey && EmptyValue($this->CancelModeOfPayment->FormValue)) {
                $this->CancelModeOfPayment->addErrorMessage(str_replace("%s", $this->CancelModeOfPayment->caption(), $this->CancelModeOfPayment->RequiredErrorMessage));
            }
        }
        if ($this->CancelAmount->Required) {
            if (!$this->CancelAmount->IsDetailKey && EmptyValue($this->CancelAmount->FormValue)) {
                $this->CancelAmount->addErrorMessage(str_replace("%s", $this->CancelAmount->caption(), $this->CancelAmount->RequiredErrorMessage));
            }
        }
        if ($this->CancelBankName->Required) {
            if (!$this->CancelBankName->IsDetailKey && EmptyValue($this->CancelBankName->FormValue)) {
                $this->CancelBankName->addErrorMessage(str_replace("%s", $this->CancelBankName->caption(), $this->CancelBankName->RequiredErrorMessage));
            }
        }
        if ($this->CancelTransactionNumber->Required) {
            if (!$this->CancelTransactionNumber->IsDetailKey && EmptyValue($this->CancelTransactionNumber->FormValue)) {
                $this->CancelTransactionNumber->addErrorMessage(str_replace("%s", $this->CancelTransactionNumber->caption(), $this->CancelTransactionNumber->RequiredErrorMessage));
            }
        }
        if ($this->LabTest->Required) {
            if (!$this->LabTest->IsDetailKey && EmptyValue($this->LabTest->FormValue)) {
                $this->LabTest->addErrorMessage(str_replace("%s", $this->LabTest->caption(), $this->LabTest->RequiredErrorMessage));
            }
        }
        if ($this->sid->Required) {
            if (!$this->sid->IsDetailKey && EmptyValue($this->sid->FormValue)) {
                $this->sid->addErrorMessage(str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->sid->FormValue)) {
            $this->sid->addErrorMessage($this->sid->getErrorMessage(false));
        }
        if ($this->SidNo->Required) {
            if (!$this->SidNo->IsDetailKey && EmptyValue($this->SidNo->FormValue)) {
                $this->SidNo->addErrorMessage(str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
            }
        }
        if ($this->createdDatettime->Required) {
            if (!$this->createdDatettime->IsDetailKey && EmptyValue($this->createdDatettime->FormValue)) {
                $this->createdDatettime->addErrorMessage(str_replace("%s", $this->createdDatettime->caption(), $this->createdDatettime->RequiredErrorMessage));
            }
        }
        if ($this->LabTestReleased->Required) {
            if (!$this->LabTestReleased->IsDetailKey && EmptyValue($this->LabTestReleased->FormValue)) {
                $this->LabTestReleased->addErrorMessage(str_replace("%s", $this->LabTestReleased->caption(), $this->LabTestReleased->RequiredErrorMessage));
            }
        }
        if ($this->GoogleReviewID->Required) {
            if (!$this->GoogleReviewID->IsDetailKey && EmptyValue($this->GoogleReviewID->FormValue)) {
                $this->GoogleReviewID->addErrorMessage(str_replace("%s", $this->GoogleReviewID->caption(), $this->GoogleReviewID->RequiredErrorMessage));
            }
        }
        if ($this->CardType->Required) {
            if (!$this->CardType->IsDetailKey && EmptyValue($this->CardType->FormValue)) {
                $this->CardType->addErrorMessage(str_replace("%s", $this->CardType->caption(), $this->CardType->RequiredErrorMessage));
            }
        }
        if ($this->PharmacyBill->Required) {
            if (!$this->PharmacyBill->IsDetailKey && EmptyValue($this->PharmacyBill->FormValue)) {
                $this->PharmacyBill->addErrorMessage(str_replace("%s", $this->PharmacyBill->caption(), $this->PharmacyBill->RequiredErrorMessage));
            }
        }
        if ($this->DiscountAmount->Required) {
            if (!$this->DiscountAmount->IsDetailKey && EmptyValue($this->DiscountAmount->FormValue)) {
                $this->DiscountAmount->addErrorMessage(str_replace("%s", $this->DiscountAmount->caption(), $this->DiscountAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DiscountAmount->FormValue)) {
            $this->DiscountAmount->addErrorMessage($this->DiscountAmount->getErrorMessage(false));
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

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("PatientServicesGrid");
        if (in_array("patient_services", $detailTblVar) && $detailPage->DetailEdit) {
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Begin transaction
            if ($this->getCurrentDetailTable() != "") {
                $conn->beginTransaction();
            }

            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // PatId
            $this->PatId->setDbValueDef($rsnew, $this->PatId->CurrentValue, null, $this->PatId->ReadOnly);

            // Reception
            $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, $this->Reception->ReadOnly);

            // BillNumber
            $this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, null, $this->BillNumber->ReadOnly);

            // PatientId
            $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, $this->PatientId->ReadOnly);

            // mrnno
            $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, $this->mrnno->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // Mobile
            $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, $this->Mobile->ReadOnly);

            // IP_OP
            $this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, null, $this->IP_OP->ReadOnly);

            // Doctor
            $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, $this->Doctor->ReadOnly);

            // voucher_type
            $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, $this->voucher_type->ReadOnly);

            // Details
            $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, $this->Details->ReadOnly);

            // ModeofPayment
            $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, $this->ModeofPayment->ReadOnly);

            // Amount
            $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, $this->Amount->ReadOnly);

            // AnyDues
            $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, $this->AnyDues->ReadOnly);

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserName();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // RealizationAmount
            $this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, null, $this->RealizationAmount->ReadOnly);

            // RealizationStatus
            $this->RealizationStatus->setDbValueDef($rsnew, $this->RealizationStatus->CurrentValue, null, $this->RealizationStatus->ReadOnly);

            // RealizationRemarks
            $this->RealizationRemarks->setDbValueDef($rsnew, $this->RealizationRemarks->CurrentValue, null, $this->RealizationRemarks->ReadOnly);

            // RealizationBatchNo
            $this->RealizationBatchNo->setDbValueDef($rsnew, $this->RealizationBatchNo->CurrentValue, null, $this->RealizationBatchNo->ReadOnly);

            // RealizationDate
            $this->RealizationDate->setDbValueDef($rsnew, $this->RealizationDate->CurrentValue, null, $this->RealizationDate->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // RIDNO
            $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, $this->RIDNO->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // CId
            $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, $this->CId->ReadOnly);

            // PartnerName
            $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, $this->PartnerName->ReadOnly);

            // PayerType
            $this->PayerType->setDbValueDef($rsnew, $this->PayerType->CurrentValue, null, $this->PayerType->ReadOnly);

            // Dob
            $this->Dob->setDbValueDef($rsnew, $this->Dob->CurrentValue, null, $this->Dob->ReadOnly);

            // Currency
            $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, $this->Currency->ReadOnly);

            // DiscountRemarks
            $this->DiscountRemarks->setDbValueDef($rsnew, $this->DiscountRemarks->CurrentValue, null, $this->DiscountRemarks->ReadOnly);

            // Remarks
            $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, $this->Remarks->ReadOnly);

            // DrDepartment
            $this->DrDepartment->setDbValueDef($rsnew, $this->DrDepartment->CurrentValue, null, $this->DrDepartment->ReadOnly);

            // RefferedBy
            $this->RefferedBy->setDbValueDef($rsnew, $this->RefferedBy->CurrentValue, null, $this->RefferedBy->ReadOnly);

            // CardNumber
            $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, $this->CardNumber->ReadOnly);

            // BankName
            $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, $this->BankName->ReadOnly);

            // DrID
            $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, $this->DrID->ReadOnly);

            // BillStatus
            $this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, null, $this->BillStatus->ReadOnly);

            // ReportHeader
            $this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, null, $this->ReportHeader->ReadOnly);

            // UserName
            $this->_UserName->CurrentValue = CurrentUserName();
            $this->_UserName->setDbValueDef($rsnew, $this->_UserName->CurrentValue, null);

            // AdjustmentAdvance
            $this->AdjustmentAdvance->setDbValueDef($rsnew, $this->AdjustmentAdvance->CurrentValue, null, $this->AdjustmentAdvance->ReadOnly);

            // billing_vouchercol
            $this->billing_vouchercol->setDbValueDef($rsnew, $this->billing_vouchercol->CurrentValue, null, $this->billing_vouchercol->ReadOnly);

            // BillType
            $this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, null, $this->BillType->ReadOnly);

            // ProcedureName
            $this->ProcedureName->setDbValueDef($rsnew, $this->ProcedureName->CurrentValue, null, $this->ProcedureName->ReadOnly);

            // ProcedureAmount
            $this->ProcedureAmount->setDbValueDef($rsnew, $this->ProcedureAmount->CurrentValue, null, $this->ProcedureAmount->ReadOnly);

            // IncludePackage
            $this->IncludePackage->setDbValueDef($rsnew, $this->IncludePackage->CurrentValue, null, $this->IncludePackage->ReadOnly);

            // CancelBill
            $this->CancelBill->setDbValueDef($rsnew, $this->CancelBill->CurrentValue, null, $this->CancelBill->ReadOnly);

            // CancelReason
            $this->CancelReason->setDbValueDef($rsnew, $this->CancelReason->CurrentValue, null, $this->CancelReason->ReadOnly);

            // CancelModeOfPayment
            $this->CancelModeOfPayment->setDbValueDef($rsnew, $this->CancelModeOfPayment->CurrentValue, null, $this->CancelModeOfPayment->ReadOnly);

            // CancelAmount
            $this->CancelAmount->setDbValueDef($rsnew, $this->CancelAmount->CurrentValue, null, $this->CancelAmount->ReadOnly);

            // CancelBankName
            $this->CancelBankName->setDbValueDef($rsnew, $this->CancelBankName->CurrentValue, null, $this->CancelBankName->ReadOnly);

            // CancelTransactionNumber
            $this->CancelTransactionNumber->setDbValueDef($rsnew, $this->CancelTransactionNumber->CurrentValue, null, $this->CancelTransactionNumber->ReadOnly);

            // LabTest
            $this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, null, $this->LabTest->ReadOnly);

            // sid
            $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, $this->sid->ReadOnly);

            // SidNo
            $this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, null, $this->SidNo->ReadOnly);

            // createdDatettime
            $this->createdDatettime->CurrentValue = CurrentDateTime();
            $this->createdDatettime->setDbValueDef($rsnew, $this->createdDatettime->CurrentValue, null);

            // LabTestReleased
            $this->LabTestReleased->setDbValueDef($rsnew, $this->LabTestReleased->CurrentValue, null, $this->LabTestReleased->ReadOnly);

            // GoogleReviewID
            $this->GoogleReviewID->setDbValueDef($rsnew, $this->GoogleReviewID->CurrentValue, null, $this->GoogleReviewID->ReadOnly);

            // CardType
            $this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, null, $this->CardType->ReadOnly);

            // PharmacyBill
            $this->PharmacyBill->setDbValueDef($rsnew, $this->PharmacyBill->CurrentValue, null, $this->PharmacyBill->ReadOnly);

            // DiscountAmount
            $this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, null, $this->DiscountAmount->ReadOnly);

            // Cash
            $this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, null, $this->Cash->ReadOnly);

            // Card
            $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, $this->Card->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    try {
                        $editRow = $this->update($rsnew, "", $rsold);
                    } catch (\Exception $e) {
                        $this->setFailureMessage($e->getMessage());
                    }
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }

                // Update detail records
                $detailTblVar = explode(",", $this->getCurrentDetailTable());
                if ($editRow) {
                    $detailPage = Container("PatientServicesGrid");
                    if (in_array("patient_services", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_services"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }

                // Commit/Rollback transaction
                if ($this->getCurrentDetailTable() != "") {
                    if ($editRow) {
                        $conn->commit(); // Commit transaction
                    } else {
                        $conn->rollback(); // Rollback transaction
                    }
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
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
            if (in_array("patient_services", $detailTblVar)) {
                $detailPageObj = Container("PatientServicesGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    if ($this->isConfirm()) {
                        $detailPageObj->CurrentAction = "confirm";
                    } else {
                        $detailPageObj->CurrentAction = "gridedit";
                    }
                    if ($this->isCancel()) {
                        $detailPageObj->EventCancelled = true;
                    }

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->Vid->IsDetailKey = true;
                    $detailPageObj->Vid->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Vid->setSessionValue($detailPageObj->Vid->CurrentValue);
                    $detailPageObj->Reception->setSessionValue(""); // Clear session key
                    $detailPageObj->mrnno->setSessionValue(""); // Clear session key
                    $detailPageObj->PatID->setSessionValue(""); // Clear session key
                }
            }
        }
    }

        // Reset detail parms
    protected function resetDetailParms()
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
            if (in_array("patient_services", $detailTblVar)) {
                $detailPageObj = Container("PatientServicesGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentAction = "gridedit";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("BillingVoucherList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
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
                case "x_Doctor":
                    break;
                case "x_voucher_type":
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

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        if ($this->isPageRequest()) { // Validate request
            $startRec = Get(Config("TABLE_START_REC"));
            $pageNo = Get(Config("TABLE_PAGE_NO"));
            if ($pageNo !== null) { // Check for "pageno" parameter first
                if (is_numeric($pageNo)) {
                    $this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
                    if ($this->StartRecord <= 0) {
                        $this->StartRecord = 1;
                    } elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1) {
                        $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1;
                    }
                    $this->setStartRecordNumber($this->StartRecord);
                }
            } elseif ($startRec !== null) { // Check for "start" parameter
                $this->StartRecord = $startRec;
                $this->setStartRecordNumber($this->StartRecord);
            }
        }
        $this->StartRecord = $this->getStartRecordNumber();

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
            $this->setStartRecordNumber($this->StartRecord);
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
            $this->setStartRecordNumber($this->StartRecord);
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
