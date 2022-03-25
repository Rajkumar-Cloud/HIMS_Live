<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientServicesEdit extends PatientServices
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_services';

    // Page object name
    public $PageObjName = "PatientServicesEdit";

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

        // Table object (patient_services)
        if (!isset($GLOBALS["patient_services"]) || get_class($GLOBALS["patient_services"]) == PROJECT_NAMESPACE . "patient_services") {
            $GLOBALS["patient_services"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_services');
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
                $doc = new $class(Container("patient_services"));
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
                    if ($pageName == "PatientServicesView") {
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
        $this->Reception->setVisibility();
        $this->Services->setVisibility();
        $this->amount->setVisibility();
        $this->description->setVisibility();
        $this->patient_type->setVisibility();
        $this->charged_date->setVisibility();
        $this->status->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->Unit->setVisibility();
        $this->Quantity->setVisibility();
        $this->Discount->setVisibility();
        $this->SubTotal->setVisibility();
        $this->ServiceSelect->setVisibility();
        $this->Aid->setVisibility();
        $this->Vid->setVisibility();
        $this->DrID->setVisibility();
        $this->DrCODE->setVisibility();
        $this->DrName->setVisibility();
        $this->Department->setVisibility();
        $this->DrSharePres->setVisibility();
        $this->HospSharePres->setVisibility();
        $this->DrShareAmount->setVisibility();
        $this->HospShareAmount->setVisibility();
        $this->DrShareSettiledAmount->setVisibility();
        $this->DrShareSettledId->setVisibility();
        $this->DrShareSettiledStatus->setVisibility();
        $this->invoiceId->setVisibility();
        $this->invoiceAmount->setVisibility();
        $this->invoiceStatus->setVisibility();
        $this->modeOfPayment->setVisibility();
        $this->HospID->setVisibility();
        $this->RIDNO->setVisibility();
        $this->TidNo->setVisibility();
        $this->DiscountCategory->setVisibility();
        $this->sid->setVisibility();
        $this->ItemCode->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->DEptCd->setVisibility();
        $this->ProfCd->setVisibility();
        $this->LabReport->setVisibility();
        $this->Comments->setVisibility();
        $this->Method->setVisibility();
        $this->Specimen->setVisibility();
        $this->Abnormal->setVisibility();
        $this->RefValue->setVisibility();
        $this->TestUnit->setVisibility();
        $this->LOWHIGH->setVisibility();
        $this->Branch->setVisibility();
        $this->Dispatch->setVisibility();
        $this->Pic1->setVisibility();
        $this->Pic2->setVisibility();
        $this->GraphPath->setVisibility();
        $this->MachineCD->setVisibility();
        $this->TestCancel->setVisibility();
        $this->OutSource->setVisibility();
        $this->Printed->setVisibility();
        $this->PrintBy->setVisibility();
        $this->PrintDate->setVisibility();
        $this->BillingDate->setVisibility();
        $this->BilledBy->setVisibility();
        $this->Resulted->setVisibility();
        $this->ResultDate->setVisibility();
        $this->ResultedBy->setVisibility();
        $this->SampleDate->setVisibility();
        $this->SampleUser->setVisibility();
        $this->Sampled->setVisibility();
        $this->ReceivedDate->setVisibility();
        $this->ReceivedUser->setVisibility();
        $this->Recevied->setVisibility();
        $this->DeptRecvDate->setVisibility();
        $this->DeptRecvUser->setVisibility();
        $this->DeptRecived->setVisibility();
        $this->SAuthDate->setVisibility();
        $this->SAuthBy->setVisibility();
        $this->SAuthendicate->setVisibility();
        $this->AuthDate->setVisibility();
        $this->AuthBy->setVisibility();
        $this->Authencate->setVisibility();
        $this->EditDate->setVisibility();
        $this->EditBy->setVisibility();
        $this->Editted->setVisibility();
        $this->PatID->setVisibility();
        $this->PatientId->setVisibility();
        $this->Mobile->setVisibility();
        $this->CId->setVisibility();
        $this->Order->setVisibility();
        $this->Form->setVisibility();
        $this->ResType->setVisibility();
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->setVisibility();
        $this->Inactive->setVisibility();
        $this->CollSample->setVisibility();
        $this->TestType->setVisibility();
        $this->Repeated->setVisibility();
        $this->RepeatedBy->setVisibility();
        $this->RepeatedDate->setVisibility();
        $this->serviceID->setVisibility();
        $this->Service_Type->setVisibility();
        $this->Service_Department->setVisibility();
        $this->RequestNo->setVisibility();
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
        $this->setupLookupOptions($this->Services);
        $this->setupLookupOptions($this->status);

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

            // Set up master detail parameters
            $this->setupMasterParms();

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
                    $this->terminate("PatientServicesList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientServicesList") {
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
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = ROWTYPE_EDIT; // Render as Edit
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'Services' first before field var 'x_Services'
        $val = $CurrentForm->hasValue("Services") ? $CurrentForm->getValue("Services") : $CurrentForm->getValue("x_Services");
        if (!$this->Services->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Services->Visible = false; // Disable update for API request
            } else {
                $this->Services->setFormValue($val);
            }
        }

        // Check field name 'amount' first before field var 'x_amount'
        $val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
        if (!$this->amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->amount->Visible = false; // Disable update for API request
            } else {
                $this->amount->setFormValue($val);
            }
        }

        // Check field name 'description' first before field var 'x_description'
        $val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
        if (!$this->description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->description->Visible = false; // Disable update for API request
            } else {
                $this->description->setFormValue($val);
            }
        }

        // Check field name 'patient_type' first before field var 'x_patient_type'
        $val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
        if (!$this->patient_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_type->Visible = false; // Disable update for API request
            } else {
                $this->patient_type->setFormValue($val);
            }
        }

        // Check field name 'charged_date' first before field var 'x_charged_date'
        $val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
        if (!$this->charged_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->charged_date->Visible = false; // Disable update for API request
            } else {
                $this->charged_date->setFormValue($val);
            }
            $this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
        }

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
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

        // Check field name 'Unit' first before field var 'x_Unit'
        $val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
        if (!$this->Unit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit->Visible = false; // Disable update for API request
            } else {
                $this->Unit->setFormValue($val);
            }
        }

        // Check field name 'Quantity' first before field var 'x_Quantity'
        $val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
        if (!$this->Quantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Quantity->Visible = false; // Disable update for API request
            } else {
                $this->Quantity->setFormValue($val);
            }
        }

        // Check field name 'Discount' first before field var 'x_Discount'
        $val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
        if (!$this->Discount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Discount->Visible = false; // Disable update for API request
            } else {
                $this->Discount->setFormValue($val);
            }
        }

        // Check field name 'SubTotal' first before field var 'x_SubTotal'
        $val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
        if (!$this->SubTotal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SubTotal->Visible = false; // Disable update for API request
            } else {
                $this->SubTotal->setFormValue($val);
            }
        }

        // Check field name 'ServiceSelect' first before field var 'x_ServiceSelect'
        $val = $CurrentForm->hasValue("ServiceSelect") ? $CurrentForm->getValue("ServiceSelect") : $CurrentForm->getValue("x_ServiceSelect");
        if (!$this->ServiceSelect->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ServiceSelect->Visible = false; // Disable update for API request
            } else {
                $this->ServiceSelect->setFormValue($val);
            }
        }

        // Check field name 'Aid' first before field var 'x_Aid'
        $val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
        if (!$this->Aid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Aid->Visible = false; // Disable update for API request
            } else {
                $this->Aid->setFormValue($val);
            }
        }

        // Check field name 'Vid' first before field var 'x_Vid'
        $val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
        if (!$this->Vid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Vid->Visible = false; // Disable update for API request
            } else {
                $this->Vid->setFormValue($val);
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

        // Check field name 'DrCODE' first before field var 'x_DrCODE'
        $val = $CurrentForm->hasValue("DrCODE") ? $CurrentForm->getValue("DrCODE") : $CurrentForm->getValue("x_DrCODE");
        if (!$this->DrCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrCODE->Visible = false; // Disable update for API request
            } else {
                $this->DrCODE->setFormValue($val);
            }
        }

        // Check field name 'DrName' first before field var 'x_DrName'
        $val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
        if (!$this->DrName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrName->Visible = false; // Disable update for API request
            } else {
                $this->DrName->setFormValue($val);
            }
        }

        // Check field name 'Department' first before field var 'x_Department'
        $val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
        if (!$this->Department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Department->Visible = false; // Disable update for API request
            } else {
                $this->Department->setFormValue($val);
            }
        }

        // Check field name 'DrSharePres' first before field var 'x_DrSharePres'
        $val = $CurrentForm->hasValue("DrSharePres") ? $CurrentForm->getValue("DrSharePres") : $CurrentForm->getValue("x_DrSharePres");
        if (!$this->DrSharePres->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrSharePres->Visible = false; // Disable update for API request
            } else {
                $this->DrSharePres->setFormValue($val);
            }
        }

        // Check field name 'HospSharePres' first before field var 'x_HospSharePres'
        $val = $CurrentForm->hasValue("HospSharePres") ? $CurrentForm->getValue("HospSharePres") : $CurrentForm->getValue("x_HospSharePres");
        if (!$this->HospSharePres->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospSharePres->Visible = false; // Disable update for API request
            } else {
                $this->HospSharePres->setFormValue($val);
            }
        }

        // Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
        $val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
        if (!$this->DrShareAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareAmount->Visible = false; // Disable update for API request
            } else {
                $this->DrShareAmount->setFormValue($val);
            }
        }

        // Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
        $val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
        if (!$this->HospShareAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospShareAmount->Visible = false; // Disable update for API request
            } else {
                $this->HospShareAmount->setFormValue($val);
            }
        }

        // Check field name 'DrShareSettiledAmount' first before field var 'x_DrShareSettiledAmount'
        $val = $CurrentForm->hasValue("DrShareSettiledAmount") ? $CurrentForm->getValue("DrShareSettiledAmount") : $CurrentForm->getValue("x_DrShareSettiledAmount");
        if (!$this->DrShareSettiledAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareSettiledAmount->Visible = false; // Disable update for API request
            } else {
                $this->DrShareSettiledAmount->setFormValue($val);
            }
        }

        // Check field name 'DrShareSettledId' first before field var 'x_DrShareSettledId'
        $val = $CurrentForm->hasValue("DrShareSettledId") ? $CurrentForm->getValue("DrShareSettledId") : $CurrentForm->getValue("x_DrShareSettledId");
        if (!$this->DrShareSettledId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareSettledId->Visible = false; // Disable update for API request
            } else {
                $this->DrShareSettledId->setFormValue($val);
            }
        }

        // Check field name 'DrShareSettiledStatus' first before field var 'x_DrShareSettiledStatus'
        $val = $CurrentForm->hasValue("DrShareSettiledStatus") ? $CurrentForm->getValue("DrShareSettiledStatus") : $CurrentForm->getValue("x_DrShareSettiledStatus");
        if (!$this->DrShareSettiledStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareSettiledStatus->Visible = false; // Disable update for API request
            } else {
                $this->DrShareSettiledStatus->setFormValue($val);
            }
        }

        // Check field name 'invoiceId' first before field var 'x_invoiceId'
        $val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
        if (!$this->invoiceId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceId->Visible = false; // Disable update for API request
            } else {
                $this->invoiceId->setFormValue($val);
            }
        }

        // Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
        $val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
        if (!$this->invoiceAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceAmount->Visible = false; // Disable update for API request
            } else {
                $this->invoiceAmount->setFormValue($val);
            }
        }

        // Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
        $val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
        if (!$this->invoiceStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceStatus->Visible = false; // Disable update for API request
            } else {
                $this->invoiceStatus->setFormValue($val);
            }
        }

        // Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
        $val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
        if (!$this->modeOfPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modeOfPayment->Visible = false; // Disable update for API request
            } else {
                $this->modeOfPayment->setFormValue($val);
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

        // Check field name 'DiscountCategory' first before field var 'x_DiscountCategory'
        $val = $CurrentForm->hasValue("DiscountCategory") ? $CurrentForm->getValue("DiscountCategory") : $CurrentForm->getValue("x_DiscountCategory");
        if (!$this->DiscountCategory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountCategory->Visible = false; // Disable update for API request
            } else {
                $this->DiscountCategory->setFormValue($val);
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

        // Check field name 'ItemCode' first before field var 'x_ItemCode'
        $val = $CurrentForm->hasValue("ItemCode") ? $CurrentForm->getValue("ItemCode") : $CurrentForm->getValue("x_ItemCode");
        if (!$this->ItemCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ItemCode->Visible = false; // Disable update for API request
            } else {
                $this->ItemCode->setFormValue($val);
            }
        }

        // Check field name 'TestSubCd' first before field var 'x_TestSubCd'
        $val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
        if (!$this->TestSubCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestSubCd->Visible = false; // Disable update for API request
            } else {
                $this->TestSubCd->setFormValue($val);
            }
        }

        // Check field name 'DEptCd' first before field var 'x_DEptCd'
        $val = $CurrentForm->hasValue("DEptCd") ? $CurrentForm->getValue("DEptCd") : $CurrentForm->getValue("x_DEptCd");
        if (!$this->DEptCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DEptCd->Visible = false; // Disable update for API request
            } else {
                $this->DEptCd->setFormValue($val);
            }
        }

        // Check field name 'ProfCd' first before field var 'x_ProfCd'
        $val = $CurrentForm->hasValue("ProfCd") ? $CurrentForm->getValue("ProfCd") : $CurrentForm->getValue("x_ProfCd");
        if (!$this->ProfCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfCd->Visible = false; // Disable update for API request
            } else {
                $this->ProfCd->setFormValue($val);
            }
        }

        // Check field name 'LabReport' first before field var 'x_LabReport'
        $val = $CurrentForm->hasValue("LabReport") ? $CurrentForm->getValue("LabReport") : $CurrentForm->getValue("x_LabReport");
        if (!$this->LabReport->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabReport->Visible = false; // Disable update for API request
            } else {
                $this->LabReport->setFormValue($val);
            }
        }

        // Check field name 'Comments' first before field var 'x_Comments'
        $val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
        if (!$this->Comments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Comments->Visible = false; // Disable update for API request
            } else {
                $this->Comments->setFormValue($val);
            }
        }

        // Check field name 'Method' first before field var 'x_Method'
        $val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
        if (!$this->Method->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Method->Visible = false; // Disable update for API request
            } else {
                $this->Method->setFormValue($val);
            }
        }

        // Check field name 'Specimen' first before field var 'x_Specimen'
        $val = $CurrentForm->hasValue("Specimen") ? $CurrentForm->getValue("Specimen") : $CurrentForm->getValue("x_Specimen");
        if (!$this->Specimen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Specimen->Visible = false; // Disable update for API request
            } else {
                $this->Specimen->setFormValue($val);
            }
        }

        // Check field name 'Abnormal' first before field var 'x_Abnormal'
        $val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
        if (!$this->Abnormal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abnormal->Visible = false; // Disable update for API request
            } else {
                $this->Abnormal->setFormValue($val);
            }
        }

        // Check field name 'RefValue' first before field var 'x_RefValue'
        $val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
        if (!$this->RefValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefValue->Visible = false; // Disable update for API request
            } else {
                $this->RefValue->setFormValue($val);
            }
        }

        // Check field name 'TestUnit' first before field var 'x_TestUnit'
        $val = $CurrentForm->hasValue("TestUnit") ? $CurrentForm->getValue("TestUnit") : $CurrentForm->getValue("x_TestUnit");
        if (!$this->TestUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestUnit->Visible = false; // Disable update for API request
            } else {
                $this->TestUnit->setFormValue($val);
            }
        }

        // Check field name 'LOWHIGH' first before field var 'x_LOWHIGH'
        $val = $CurrentForm->hasValue("LOWHIGH") ? $CurrentForm->getValue("LOWHIGH") : $CurrentForm->getValue("x_LOWHIGH");
        if (!$this->LOWHIGH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LOWHIGH->Visible = false; // Disable update for API request
            } else {
                $this->LOWHIGH->setFormValue($val);
            }
        }

        // Check field name 'Branch' first before field var 'x_Branch'
        $val = $CurrentForm->hasValue("Branch") ? $CurrentForm->getValue("Branch") : $CurrentForm->getValue("x_Branch");
        if (!$this->Branch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Branch->Visible = false; // Disable update for API request
            } else {
                $this->Branch->setFormValue($val);
            }
        }

        // Check field name 'Dispatch' first before field var 'x_Dispatch'
        $val = $CurrentForm->hasValue("Dispatch") ? $CurrentForm->getValue("Dispatch") : $CurrentForm->getValue("x_Dispatch");
        if (!$this->Dispatch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Dispatch->Visible = false; // Disable update for API request
            } else {
                $this->Dispatch->setFormValue($val);
            }
        }

        // Check field name 'Pic1' first before field var 'x_Pic1'
        $val = $CurrentForm->hasValue("Pic1") ? $CurrentForm->getValue("Pic1") : $CurrentForm->getValue("x_Pic1");
        if (!$this->Pic1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pic1->Visible = false; // Disable update for API request
            } else {
                $this->Pic1->setFormValue($val);
            }
        }

        // Check field name 'Pic2' first before field var 'x_Pic2'
        $val = $CurrentForm->hasValue("Pic2") ? $CurrentForm->getValue("Pic2") : $CurrentForm->getValue("x_Pic2");
        if (!$this->Pic2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pic2->Visible = false; // Disable update for API request
            } else {
                $this->Pic2->setFormValue($val);
            }
        }

        // Check field name 'GraphPath' first before field var 'x_GraphPath'
        $val = $CurrentForm->hasValue("GraphPath") ? $CurrentForm->getValue("GraphPath") : $CurrentForm->getValue("x_GraphPath");
        if (!$this->GraphPath->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GraphPath->Visible = false; // Disable update for API request
            } else {
                $this->GraphPath->setFormValue($val);
            }
        }

        // Check field name 'MachineCD' first before field var 'x_MachineCD'
        $val = $CurrentForm->hasValue("MachineCD") ? $CurrentForm->getValue("MachineCD") : $CurrentForm->getValue("x_MachineCD");
        if (!$this->MachineCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MachineCD->Visible = false; // Disable update for API request
            } else {
                $this->MachineCD->setFormValue($val);
            }
        }

        // Check field name 'TestCancel' first before field var 'x_TestCancel'
        $val = $CurrentForm->hasValue("TestCancel") ? $CurrentForm->getValue("TestCancel") : $CurrentForm->getValue("x_TestCancel");
        if (!$this->TestCancel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestCancel->Visible = false; // Disable update for API request
            } else {
                $this->TestCancel->setFormValue($val);
            }
        }

        // Check field name 'OutSource' first before field var 'x_OutSource'
        $val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
        if (!$this->OutSource->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OutSource->Visible = false; // Disable update for API request
            } else {
                $this->OutSource->setFormValue($val);
            }
        }

        // Check field name 'Printed' first before field var 'x_Printed'
        $val = $CurrentForm->hasValue("Printed") ? $CurrentForm->getValue("Printed") : $CurrentForm->getValue("x_Printed");
        if (!$this->Printed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Printed->Visible = false; // Disable update for API request
            } else {
                $this->Printed->setFormValue($val);
            }
        }

        // Check field name 'PrintBy' first before field var 'x_PrintBy'
        $val = $CurrentForm->hasValue("PrintBy") ? $CurrentForm->getValue("PrintBy") : $CurrentForm->getValue("x_PrintBy");
        if (!$this->PrintBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrintBy->Visible = false; // Disable update for API request
            } else {
                $this->PrintBy->setFormValue($val);
            }
        }

        // Check field name 'PrintDate' first before field var 'x_PrintDate'
        $val = $CurrentForm->hasValue("PrintDate") ? $CurrentForm->getValue("PrintDate") : $CurrentForm->getValue("x_PrintDate");
        if (!$this->PrintDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrintDate->Visible = false; // Disable update for API request
            } else {
                $this->PrintDate->setFormValue($val);
            }
            $this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
        }

        // Check field name 'BillingDate' first before field var 'x_BillingDate'
        $val = $CurrentForm->hasValue("BillingDate") ? $CurrentForm->getValue("BillingDate") : $CurrentForm->getValue("x_BillingDate");
        if (!$this->BillingDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillingDate->Visible = false; // Disable update for API request
            } else {
                $this->BillingDate->setFormValue($val);
            }
            $this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
        }

        // Check field name 'BilledBy' first before field var 'x_BilledBy'
        $val = $CurrentForm->hasValue("BilledBy") ? $CurrentForm->getValue("BilledBy") : $CurrentForm->getValue("x_BilledBy");
        if (!$this->BilledBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BilledBy->Visible = false; // Disable update for API request
            } else {
                $this->BilledBy->setFormValue($val);
            }
        }

        // Check field name 'Resulted' first before field var 'x_Resulted'
        $val = $CurrentForm->hasValue("Resulted") ? $CurrentForm->getValue("Resulted") : $CurrentForm->getValue("x_Resulted");
        if (!$this->Resulted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Resulted->Visible = false; // Disable update for API request
            } else {
                $this->Resulted->setFormValue($val);
            }
        }

        // Check field name 'ResultDate' first before field var 'x_ResultDate'
        $val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
        if (!$this->ResultDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultDate->Visible = false; // Disable update for API request
            } else {
                $this->ResultDate->setFormValue($val);
            }
            $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        }

        // Check field name 'ResultedBy' first before field var 'x_ResultedBy'
        $val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
        if (!$this->ResultedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultedBy->Visible = false; // Disable update for API request
            } else {
                $this->ResultedBy->setFormValue($val);
            }
        }

        // Check field name 'SampleDate' first before field var 'x_SampleDate'
        $val = $CurrentForm->hasValue("SampleDate") ? $CurrentForm->getValue("SampleDate") : $CurrentForm->getValue("x_SampleDate");
        if (!$this->SampleDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleDate->Visible = false; // Disable update for API request
            } else {
                $this->SampleDate->setFormValue($val);
            }
            $this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
        }

        // Check field name 'SampleUser' first before field var 'x_SampleUser'
        $val = $CurrentForm->hasValue("SampleUser") ? $CurrentForm->getValue("SampleUser") : $CurrentForm->getValue("x_SampleUser");
        if (!$this->SampleUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleUser->Visible = false; // Disable update for API request
            } else {
                $this->SampleUser->setFormValue($val);
            }
        }

        // Check field name 'Sampled' first before field var 'x_Sampled'
        $val = $CurrentForm->hasValue("Sampled") ? $CurrentForm->getValue("Sampled") : $CurrentForm->getValue("x_Sampled");
        if (!$this->Sampled->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Sampled->Visible = false; // Disable update for API request
            } else {
                $this->Sampled->setFormValue($val);
            }
        }

        // Check field name 'ReceivedDate' first before field var 'x_ReceivedDate'
        $val = $CurrentForm->hasValue("ReceivedDate") ? $CurrentForm->getValue("ReceivedDate") : $CurrentForm->getValue("x_ReceivedDate");
        if (!$this->ReceivedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReceivedDate->Visible = false; // Disable update for API request
            } else {
                $this->ReceivedDate->setFormValue($val);
            }
            $this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
        }

        // Check field name 'ReceivedUser' first before field var 'x_ReceivedUser'
        $val = $CurrentForm->hasValue("ReceivedUser") ? $CurrentForm->getValue("ReceivedUser") : $CurrentForm->getValue("x_ReceivedUser");
        if (!$this->ReceivedUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReceivedUser->Visible = false; // Disable update for API request
            } else {
                $this->ReceivedUser->setFormValue($val);
            }
        }

        // Check field name 'Recevied' first before field var 'x_Recevied'
        $val = $CurrentForm->hasValue("Recevied") ? $CurrentForm->getValue("Recevied") : $CurrentForm->getValue("x_Recevied");
        if (!$this->Recevied->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Recevied->Visible = false; // Disable update for API request
            } else {
                $this->Recevied->setFormValue($val);
            }
        }

        // Check field name 'DeptRecvDate' first before field var 'x_DeptRecvDate'
        $val = $CurrentForm->hasValue("DeptRecvDate") ? $CurrentForm->getValue("DeptRecvDate") : $CurrentForm->getValue("x_DeptRecvDate");
        if (!$this->DeptRecvDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeptRecvDate->Visible = false; // Disable update for API request
            } else {
                $this->DeptRecvDate->setFormValue($val);
            }
            $this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
        }

        // Check field name 'DeptRecvUser' first before field var 'x_DeptRecvUser'
        $val = $CurrentForm->hasValue("DeptRecvUser") ? $CurrentForm->getValue("DeptRecvUser") : $CurrentForm->getValue("x_DeptRecvUser");
        if (!$this->DeptRecvUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeptRecvUser->Visible = false; // Disable update for API request
            } else {
                $this->DeptRecvUser->setFormValue($val);
            }
        }

        // Check field name 'DeptRecived' first before field var 'x_DeptRecived'
        $val = $CurrentForm->hasValue("DeptRecived") ? $CurrentForm->getValue("DeptRecived") : $CurrentForm->getValue("x_DeptRecived");
        if (!$this->DeptRecived->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeptRecived->Visible = false; // Disable update for API request
            } else {
                $this->DeptRecived->setFormValue($val);
            }
        }

        // Check field name 'SAuthDate' first before field var 'x_SAuthDate'
        $val = $CurrentForm->hasValue("SAuthDate") ? $CurrentForm->getValue("SAuthDate") : $CurrentForm->getValue("x_SAuthDate");
        if (!$this->SAuthDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SAuthDate->Visible = false; // Disable update for API request
            } else {
                $this->SAuthDate->setFormValue($val);
            }
            $this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
        }

        // Check field name 'SAuthBy' first before field var 'x_SAuthBy'
        $val = $CurrentForm->hasValue("SAuthBy") ? $CurrentForm->getValue("SAuthBy") : $CurrentForm->getValue("x_SAuthBy");
        if (!$this->SAuthBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SAuthBy->Visible = false; // Disable update for API request
            } else {
                $this->SAuthBy->setFormValue($val);
            }
        }

        // Check field name 'SAuthendicate' first before field var 'x_SAuthendicate'
        $val = $CurrentForm->hasValue("SAuthendicate") ? $CurrentForm->getValue("SAuthendicate") : $CurrentForm->getValue("x_SAuthendicate");
        if (!$this->SAuthendicate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SAuthendicate->Visible = false; // Disable update for API request
            } else {
                $this->SAuthendicate->setFormValue($val);
            }
        }

        // Check field name 'AuthDate' first before field var 'x_AuthDate'
        $val = $CurrentForm->hasValue("AuthDate") ? $CurrentForm->getValue("AuthDate") : $CurrentForm->getValue("x_AuthDate");
        if (!$this->AuthDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AuthDate->Visible = false; // Disable update for API request
            } else {
                $this->AuthDate->setFormValue($val);
            }
            $this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
        }

        // Check field name 'AuthBy' first before field var 'x_AuthBy'
        $val = $CurrentForm->hasValue("AuthBy") ? $CurrentForm->getValue("AuthBy") : $CurrentForm->getValue("x_AuthBy");
        if (!$this->AuthBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AuthBy->Visible = false; // Disable update for API request
            } else {
                $this->AuthBy->setFormValue($val);
            }
        }

        // Check field name 'Authencate' first before field var 'x_Authencate'
        $val = $CurrentForm->hasValue("Authencate") ? $CurrentForm->getValue("Authencate") : $CurrentForm->getValue("x_Authencate");
        if (!$this->Authencate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Authencate->Visible = false; // Disable update for API request
            } else {
                $this->Authencate->setFormValue($val);
            }
        }

        // Check field name 'EditDate' first before field var 'x_EditDate'
        $val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
        if (!$this->EditDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditDate->Visible = false; // Disable update for API request
            } else {
                $this->EditDate->setFormValue($val);
            }
            $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        }

        // Check field name 'EditBy' first before field var 'x_EditBy'
        $val = $CurrentForm->hasValue("EditBy") ? $CurrentForm->getValue("EditBy") : $CurrentForm->getValue("x_EditBy");
        if (!$this->EditBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditBy->Visible = false; // Disable update for API request
            } else {
                $this->EditBy->setFormValue($val);
            }
        }

        // Check field name 'Editted' first before field var 'x_Editted'
        $val = $CurrentForm->hasValue("Editted") ? $CurrentForm->getValue("Editted") : $CurrentForm->getValue("x_Editted");
        if (!$this->Editted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Editted->Visible = false; // Disable update for API request
            } else {
                $this->Editted->setFormValue($val);
            }
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

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
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

        // Check field name 'CId' first before field var 'x_CId'
        $val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
        if (!$this->CId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CId->Visible = false; // Disable update for API request
            } else {
                $this->CId->setFormValue($val);
            }
        }

        // Check field name 'Order' first before field var 'x_Order'
        $val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
        if (!$this->Order->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Order->Visible = false; // Disable update for API request
            } else {
                $this->Order->setFormValue($val);
            }
        }

        // Check field name 'Form' first before field var 'x_Form'
        $val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
        if (!$this->Form->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Form->Visible = false; // Disable update for API request
            } else {
                $this->Form->setFormValue($val);
            }
        }

        // Check field name 'ResType' first before field var 'x_ResType'
        $val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
        if (!$this->ResType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResType->Visible = false; // Disable update for API request
            } else {
                $this->ResType->setFormValue($val);
            }
        }

        // Check field name 'Sample' first before field var 'x_Sample'
        $val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
        if (!$this->Sample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Sample->Visible = false; // Disable update for API request
            } else {
                $this->Sample->setFormValue($val);
            }
        }

        // Check field name 'NoD' first before field var 'x_NoD'
        $val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
        if (!$this->NoD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoD->Visible = false; // Disable update for API request
            } else {
                $this->NoD->setFormValue($val);
            }
        }

        // Check field name 'BillOrder' first before field var 'x_BillOrder'
        $val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
        if (!$this->BillOrder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillOrder->Visible = false; // Disable update for API request
            } else {
                $this->BillOrder->setFormValue($val);
            }
        }

        // Check field name 'Formula' first before field var 'x_Formula'
        $val = $CurrentForm->hasValue("Formula") ? $CurrentForm->getValue("Formula") : $CurrentForm->getValue("x_Formula");
        if (!$this->Formula->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Formula->Visible = false; // Disable update for API request
            } else {
                $this->Formula->setFormValue($val);
            }
        }

        // Check field name 'Inactive' first before field var 'x_Inactive'
        $val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
        if (!$this->Inactive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Inactive->Visible = false; // Disable update for API request
            } else {
                $this->Inactive->setFormValue($val);
            }
        }

        // Check field name 'CollSample' first before field var 'x_CollSample'
        $val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
        if (!$this->CollSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollSample->Visible = false; // Disable update for API request
            } else {
                $this->CollSample->setFormValue($val);
            }
        }

        // Check field name 'TestType' first before field var 'x_TestType'
        $val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
        if (!$this->TestType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestType->Visible = false; // Disable update for API request
            } else {
                $this->TestType->setFormValue($val);
            }
        }

        // Check field name 'Repeated' first before field var 'x_Repeated'
        $val = $CurrentForm->hasValue("Repeated") ? $CurrentForm->getValue("Repeated") : $CurrentForm->getValue("x_Repeated");
        if (!$this->Repeated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Repeated->Visible = false; // Disable update for API request
            } else {
                $this->Repeated->setFormValue($val);
            }
        }

        // Check field name 'RepeatedBy' first before field var 'x_RepeatedBy'
        $val = $CurrentForm->hasValue("RepeatedBy") ? $CurrentForm->getValue("RepeatedBy") : $CurrentForm->getValue("x_RepeatedBy");
        if (!$this->RepeatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RepeatedBy->Visible = false; // Disable update for API request
            } else {
                $this->RepeatedBy->setFormValue($val);
            }
        }

        // Check field name 'RepeatedDate' first before field var 'x_RepeatedDate'
        $val = $CurrentForm->hasValue("RepeatedDate") ? $CurrentForm->getValue("RepeatedDate") : $CurrentForm->getValue("x_RepeatedDate");
        if (!$this->RepeatedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RepeatedDate->Visible = false; // Disable update for API request
            } else {
                $this->RepeatedDate->setFormValue($val);
            }
            $this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
        }

        // Check field name 'serviceID' first before field var 'x_serviceID'
        $val = $CurrentForm->hasValue("serviceID") ? $CurrentForm->getValue("serviceID") : $CurrentForm->getValue("x_serviceID");
        if (!$this->serviceID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->serviceID->Visible = false; // Disable update for API request
            } else {
                $this->serviceID->setFormValue($val);
            }
        }

        // Check field name 'Service_Type' first before field var 'x_Service_Type'
        $val = $CurrentForm->hasValue("Service_Type") ? $CurrentForm->getValue("Service_Type") : $CurrentForm->getValue("x_Service_Type");
        if (!$this->Service_Type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Service_Type->Visible = false; // Disable update for API request
            } else {
                $this->Service_Type->setFormValue($val);
            }
        }

        // Check field name 'Service_Department' first before field var 'x_Service_Department'
        $val = $CurrentForm->hasValue("Service_Department") ? $CurrentForm->getValue("Service_Department") : $CurrentForm->getValue("x_Service_Department");
        if (!$this->Service_Department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Service_Department->Visible = false; // Disable update for API request
            } else {
                $this->Service_Department->setFormValue($val);
            }
        }

        // Check field name 'RequestNo' first before field var 'x_RequestNo'
        $val = $CurrentForm->hasValue("RequestNo") ? $CurrentForm->getValue("RequestNo") : $CurrentForm->getValue("x_RequestNo");
        if (!$this->RequestNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RequestNo->Visible = false; // Disable update for API request
            } else {
                $this->RequestNo->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->Services->CurrentValue = $this->Services->FormValue;
        $this->amount->CurrentValue = $this->amount->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->patient_type->CurrentValue = $this->patient_type->FormValue;
        $this->charged_date->CurrentValue = $this->charged_date->FormValue;
        $this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->Unit->CurrentValue = $this->Unit->FormValue;
        $this->Quantity->CurrentValue = $this->Quantity->FormValue;
        $this->Discount->CurrentValue = $this->Discount->FormValue;
        $this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
        $this->ServiceSelect->CurrentValue = $this->ServiceSelect->FormValue;
        $this->Aid->CurrentValue = $this->Aid->FormValue;
        $this->Vid->CurrentValue = $this->Vid->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
        $this->DrName->CurrentValue = $this->DrName->FormValue;
        $this->Department->CurrentValue = $this->Department->FormValue;
        $this->DrSharePres->CurrentValue = $this->DrSharePres->FormValue;
        $this->HospSharePres->CurrentValue = $this->HospSharePres->FormValue;
        $this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
        $this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
        $this->DrShareSettiledAmount->CurrentValue = $this->DrShareSettiledAmount->FormValue;
        $this->DrShareSettledId->CurrentValue = $this->DrShareSettledId->FormValue;
        $this->DrShareSettiledStatus->CurrentValue = $this->DrShareSettiledStatus->FormValue;
        $this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
        $this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
        $this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
        $this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->DiscountCategory->CurrentValue = $this->DiscountCategory->FormValue;
        $this->sid->CurrentValue = $this->sid->FormValue;
        $this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
        $this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
        $this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
        $this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
        $this->LabReport->CurrentValue = $this->LabReport->FormValue;
        $this->Comments->CurrentValue = $this->Comments->FormValue;
        $this->Method->CurrentValue = $this->Method->FormValue;
        $this->Specimen->CurrentValue = $this->Specimen->FormValue;
        $this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
        $this->RefValue->CurrentValue = $this->RefValue->FormValue;
        $this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
        $this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
        $this->Branch->CurrentValue = $this->Branch->FormValue;
        $this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
        $this->Pic1->CurrentValue = $this->Pic1->FormValue;
        $this->Pic2->CurrentValue = $this->Pic2->FormValue;
        $this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
        $this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
        $this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
        $this->OutSource->CurrentValue = $this->OutSource->FormValue;
        $this->Printed->CurrentValue = $this->Printed->FormValue;
        $this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
        $this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
        $this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
        $this->BillingDate->CurrentValue = $this->BillingDate->FormValue;
        $this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
        $this->BilledBy->CurrentValue = $this->BilledBy->FormValue;
        $this->Resulted->CurrentValue = $this->Resulted->FormValue;
        $this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
        $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        $this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
        $this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
        $this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
        $this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
        $this->Sampled->CurrentValue = $this->Sampled->FormValue;
        $this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
        $this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
        $this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
        $this->Recevied->CurrentValue = $this->Recevied->FormValue;
        $this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
        $this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
        $this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
        $this->DeptRecived->CurrentValue = $this->DeptRecived->FormValue;
        $this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
        $this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
        $this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
        $this->SAuthendicate->CurrentValue = $this->SAuthendicate->FormValue;
        $this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
        $this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
        $this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
        $this->Authencate->CurrentValue = $this->Authencate->FormValue;
        $this->EditDate->CurrentValue = $this->EditDate->FormValue;
        $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        $this->EditBy->CurrentValue = $this->EditBy->FormValue;
        $this->Editted->CurrentValue = $this->Editted->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->CId->CurrentValue = $this->CId->FormValue;
        $this->Order->CurrentValue = $this->Order->FormValue;
        $this->Form->CurrentValue = $this->Form->FormValue;
        $this->ResType->CurrentValue = $this->ResType->FormValue;
        $this->Sample->CurrentValue = $this->Sample->FormValue;
        $this->NoD->CurrentValue = $this->NoD->FormValue;
        $this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
        $this->Formula->CurrentValue = $this->Formula->FormValue;
        $this->Inactive->CurrentValue = $this->Inactive->FormValue;
        $this->CollSample->CurrentValue = $this->CollSample->FormValue;
        $this->TestType->CurrentValue = $this->TestType->FormValue;
        $this->Repeated->CurrentValue = $this->Repeated->FormValue;
        $this->RepeatedBy->CurrentValue = $this->RepeatedBy->FormValue;
        $this->RepeatedDate->CurrentValue = $this->RepeatedDate->FormValue;
        $this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
        $this->serviceID->CurrentValue = $this->serviceID->FormValue;
        $this->Service_Type->CurrentValue = $this->Service_Type->FormValue;
        $this->Service_Department->CurrentValue = $this->Service_Department->FormValue;
        $this->RequestNo->CurrentValue = $this->RequestNo->FormValue;
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
        $this->Reception->setDbValue($row['Reception']);
        $this->Services->setDbValue($row['Services']);
        $this->amount->setDbValue($row['amount']);
        $this->description->setDbValue($row['description']);
        $this->patient_type->setDbValue($row['patient_type']);
        $this->charged_date->setDbValue($row['charged_date']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Unit->setDbValue($row['Unit']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->ServiceSelect->setDbValue($row['ServiceSelect']);
        $this->Aid->setDbValue($row['Aid']);
        $this->Vid->setDbValue($row['Vid']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrCODE->setDbValue($row['DrCODE']);
        $this->DrName->setDbValue($row['DrName']);
        $this->Department->setDbValue($row['Department']);
        $this->DrSharePres->setDbValue($row['DrSharePres']);
        $this->HospSharePres->setDbValue($row['HospSharePres']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
        $this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
        $this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->invoiceAmount->setDbValue($row['invoiceAmount']);
        $this->invoiceStatus->setDbValue($row['invoiceStatus']);
        $this->modeOfPayment->setDbValue($row['modeOfPayment']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->DiscountCategory->setDbValue($row['DiscountCategory']);
        $this->sid->setDbValue($row['sid']);
        $this->ItemCode->setDbValue($row['ItemCode']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->ProfCd->setDbValue($row['ProfCd']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Method->setDbValue($row['Method']);
        $this->Specimen->setDbValue($row['Specimen']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->TestUnit->setDbValue($row['TestUnit']);
        $this->LOWHIGH->setDbValue($row['LOWHIGH']);
        $this->Branch->setDbValue($row['Branch']);
        $this->Dispatch->setDbValue($row['Dispatch']);
        $this->Pic1->setDbValue($row['Pic1']);
        $this->Pic2->setDbValue($row['Pic2']);
        $this->GraphPath->setDbValue($row['GraphPath']);
        $this->MachineCD->setDbValue($row['MachineCD']);
        $this->TestCancel->setDbValue($row['TestCancel']);
        $this->OutSource->setDbValue($row['OutSource']);
        $this->Printed->setDbValue($row['Printed']);
        $this->PrintBy->setDbValue($row['PrintBy']);
        $this->PrintDate->setDbValue($row['PrintDate']);
        $this->BillingDate->setDbValue($row['BillingDate']);
        $this->BilledBy->setDbValue($row['BilledBy']);
        $this->Resulted->setDbValue($row['Resulted']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->SampleDate->setDbValue($row['SampleDate']);
        $this->SampleUser->setDbValue($row['SampleUser']);
        $this->Sampled->setDbValue($row['Sampled']);
        $this->ReceivedDate->setDbValue($row['ReceivedDate']);
        $this->ReceivedUser->setDbValue($row['ReceivedUser']);
        $this->Recevied->setDbValue($row['Recevied']);
        $this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
        $this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
        $this->DeptRecived->setDbValue($row['DeptRecived']);
        $this->SAuthDate->setDbValue($row['SAuthDate']);
        $this->SAuthBy->setDbValue($row['SAuthBy']);
        $this->SAuthendicate->setDbValue($row['SAuthendicate']);
        $this->AuthDate->setDbValue($row['AuthDate']);
        $this->AuthBy->setDbValue($row['AuthBy']);
        $this->Authencate->setDbValue($row['Authencate']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditBy->setDbValue($row['EditBy']);
        $this->Editted->setDbValue($row['Editted']);
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->CId->setDbValue($row['CId']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->Repeated->setDbValue($row['Repeated']);
        $this->RepeatedBy->setDbValue($row['RepeatedBy']);
        $this->RepeatedDate->setDbValue($row['RepeatedDate']);
        $this->serviceID->setDbValue($row['serviceID']);
        $this->Service_Type->setDbValue($row['Service_Type']);
        $this->Service_Department->setDbValue($row['Service_Department']);
        $this->RequestNo->setDbValue($row['RequestNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['Services'] = null;
        $row['amount'] = null;
        $row['description'] = null;
        $row['patient_type'] = null;
        $row['charged_date'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['Unit'] = null;
        $row['Quantity'] = null;
        $row['Discount'] = null;
        $row['SubTotal'] = null;
        $row['ServiceSelect'] = null;
        $row['Aid'] = null;
        $row['Vid'] = null;
        $row['DrID'] = null;
        $row['DrCODE'] = null;
        $row['DrName'] = null;
        $row['Department'] = null;
        $row['DrSharePres'] = null;
        $row['HospSharePres'] = null;
        $row['DrShareAmount'] = null;
        $row['HospShareAmount'] = null;
        $row['DrShareSettiledAmount'] = null;
        $row['DrShareSettledId'] = null;
        $row['DrShareSettiledStatus'] = null;
        $row['invoiceId'] = null;
        $row['invoiceAmount'] = null;
        $row['invoiceStatus'] = null;
        $row['modeOfPayment'] = null;
        $row['HospID'] = null;
        $row['RIDNO'] = null;
        $row['TidNo'] = null;
        $row['DiscountCategory'] = null;
        $row['sid'] = null;
        $row['ItemCode'] = null;
        $row['TestSubCd'] = null;
        $row['DEptCd'] = null;
        $row['ProfCd'] = null;
        $row['LabReport'] = null;
        $row['Comments'] = null;
        $row['Method'] = null;
        $row['Specimen'] = null;
        $row['Abnormal'] = null;
        $row['RefValue'] = null;
        $row['TestUnit'] = null;
        $row['LOWHIGH'] = null;
        $row['Branch'] = null;
        $row['Dispatch'] = null;
        $row['Pic1'] = null;
        $row['Pic2'] = null;
        $row['GraphPath'] = null;
        $row['MachineCD'] = null;
        $row['TestCancel'] = null;
        $row['OutSource'] = null;
        $row['Printed'] = null;
        $row['PrintBy'] = null;
        $row['PrintDate'] = null;
        $row['BillingDate'] = null;
        $row['BilledBy'] = null;
        $row['Resulted'] = null;
        $row['ResultDate'] = null;
        $row['ResultedBy'] = null;
        $row['SampleDate'] = null;
        $row['SampleUser'] = null;
        $row['Sampled'] = null;
        $row['ReceivedDate'] = null;
        $row['ReceivedUser'] = null;
        $row['Recevied'] = null;
        $row['DeptRecvDate'] = null;
        $row['DeptRecvUser'] = null;
        $row['DeptRecived'] = null;
        $row['SAuthDate'] = null;
        $row['SAuthBy'] = null;
        $row['SAuthendicate'] = null;
        $row['AuthDate'] = null;
        $row['AuthBy'] = null;
        $row['Authencate'] = null;
        $row['EditDate'] = null;
        $row['EditBy'] = null;
        $row['Editted'] = null;
        $row['PatID'] = null;
        $row['PatientId'] = null;
        $row['Mobile'] = null;
        $row['CId'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['ResType'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['CollSample'] = null;
        $row['TestType'] = null;
        $row['Repeated'] = null;
        $row['RepeatedBy'] = null;
        $row['RepeatedDate'] = null;
        $row['serviceID'] = null;
        $row['Service_Type'] = null;
        $row['Service_Department'] = null;
        $row['RequestNo'] = null;
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
        if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue))) {
            $this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue))) {
            $this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrSharePres->FormValue == $this->DrSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->DrSharePres->CurrentValue))) {
            $this->DrSharePres->CurrentValue = ConvertToFloatString($this->DrSharePres->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospSharePres->FormValue == $this->HospSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->HospSharePres->CurrentValue))) {
            $this->HospSharePres->CurrentValue = ConvertToFloatString($this->HospSharePres->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue))) {
            $this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue))) {
            $this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareSettiledAmount->FormValue == $this->DrShareSettiledAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue))) {
            $this->DrShareSettiledAmount->CurrentValue = ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue))) {
            $this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // Services

        // amount

        // description

        // patient_type

        // charged_date

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // Unit

        // Quantity

        // Discount

        // SubTotal

        // ServiceSelect

        // Aid

        // Vid

        // DrID

        // DrCODE

        // DrName

        // Department

        // DrSharePres

        // HospSharePres

        // DrShareAmount

        // HospShareAmount

        // DrShareSettiledAmount

        // DrShareSettledId

        // DrShareSettiledStatus

        // invoiceId

        // invoiceAmount

        // invoiceStatus

        // modeOfPayment

        // HospID

        // RIDNO

        // TidNo

        // DiscountCategory

        // sid

        // ItemCode

        // TestSubCd

        // DEptCd

        // ProfCd

        // LabReport

        // Comments

        // Method

        // Specimen

        // Abnormal

        // RefValue

        // TestUnit

        // LOWHIGH

        // Branch

        // Dispatch

        // Pic1

        // Pic2

        // GraphPath

        // MachineCD

        // TestCancel

        // OutSource

        // Printed

        // PrintBy

        // PrintDate

        // BillingDate

        // BilledBy

        // Resulted

        // ResultDate

        // ResultedBy

        // SampleDate

        // SampleUser

        // Sampled

        // ReceivedDate

        // ReceivedUser

        // Recevied

        // DeptRecvDate

        // DeptRecvUser

        // DeptRecived

        // SAuthDate

        // SAuthBy

        // SAuthendicate

        // AuthDate

        // AuthBy

        // Authencate

        // EditDate

        // EditBy

        // Editted

        // PatID

        // PatientId

        // Mobile

        // CId

        // Order

        // Form

        // ResType

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // CollSample

        // TestType

        // Repeated

        // RepeatedBy

        // RepeatedDate

        // serviceID

        // Service_Type

        // Service_Department

        // RequestNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // Services
            $this->Services->ViewValue = $this->Services->CurrentValue;
            $curVal = trim(strval($this->Services->CurrentValue));
            if ($curVal != "") {
                $this->Services->ViewValue = $this->Services->lookupCacheOption($curVal);
                if ($this->Services->ViewValue === null) { // Lookup from database
                    $filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`Inactive` != 'Y'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Services->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Services->Lookup->renderViewRow($rswrk[0]);
                        $this->Services->ViewValue = $this->Services->displayValue($arwrk);
                    } else {
                        $this->Services->ViewValue = $this->Services->CurrentValue;
                    }
                }
            } else {
                $this->Services->ViewValue = null;
            }
            $this->Services->ViewCustomAttributes = "";

            // amount
            $this->amount->ViewValue = $this->amount->CurrentValue;
            $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
            $this->amount->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // patient_type
            $this->patient_type->ViewValue = $this->patient_type->CurrentValue;
            $this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
            $this->patient_type->ViewCustomAttributes = "";

            // charged_date
            $this->charged_date->ViewValue = $this->charged_date->CurrentValue;
            $this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
            $this->charged_date->ViewCustomAttributes = "";

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

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

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

            // Unit
            $this->Unit->ViewValue = $this->Unit->CurrentValue;
            $this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
            $this->Unit->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SubTotal
            $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
            $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
            $this->SubTotal->ViewCustomAttributes = "";

            // ServiceSelect
            if (strval($this->ServiceSelect->CurrentValue) != "") {
                $this->ServiceSelect->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ServiceSelect->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ServiceSelect->ViewValue->add($this->ServiceSelect->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ServiceSelect->ViewValue = null;
            }
            $this->ServiceSelect->ViewCustomAttributes = "";

            // Aid
            $this->Aid->ViewValue = $this->Aid->CurrentValue;
            $this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
            $this->Aid->ViewCustomAttributes = "";

            // Vid
            $this->Vid->ViewValue = $this->Vid->CurrentValue;
            $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";

            // DrID
            $this->DrID->ViewValue = $this->DrID->CurrentValue;
            $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // DrCODE
            $this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
            $this->DrCODE->ViewCustomAttributes = "";

            // DrName
            $this->DrName->ViewValue = $this->DrName->CurrentValue;
            $this->DrName->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // DrSharePres
            $this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
            $this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
            $this->DrSharePres->ViewCustomAttributes = "";

            // HospSharePres
            $this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
            $this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
            $this->HospSharePres->ViewCustomAttributes = "";

            // DrShareAmount
            $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
            $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareAmount->ViewCustomAttributes = "";

            // HospShareAmount
            $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
            $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
            $this->HospShareAmount->ViewCustomAttributes = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
            $this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareSettiledAmount->ViewCustomAttributes = "";

            // DrShareSettledId
            $this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
            $this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
            $this->DrShareSettledId->ViewCustomAttributes = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
            $this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
            $this->DrShareSettiledStatus->ViewCustomAttributes = "";

            // invoiceId
            $this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
            $this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
            $this->invoiceId->ViewCustomAttributes = "";

            // invoiceAmount
            $this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
            $this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
            $this->invoiceAmount->ViewCustomAttributes = "";

            // invoiceStatus
            $this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
            $this->invoiceStatus->ViewCustomAttributes = "";

            // modeOfPayment
            $this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
            $this->modeOfPayment->ViewCustomAttributes = "";

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

            // DiscountCategory
            $this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
            $this->DiscountCategory->ViewCustomAttributes = "";

            // sid
            $this->sid->ViewValue = $this->sid->CurrentValue;
            $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
            $this->sid->ViewCustomAttributes = "";

            // ItemCode
            $this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
            $this->ItemCode->ViewCustomAttributes = "";

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

            // Comments
            $this->Comments->ViewValue = $this->Comments->CurrentValue;
            $this->Comments->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Specimen
            $this->Specimen->ViewValue = $this->Specimen->CurrentValue;
            $this->Specimen->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // RefValue
            $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
            $this->RefValue->ViewCustomAttributes = "";

            // TestUnit
            $this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
            $this->TestUnit->ViewCustomAttributes = "";

            // LOWHIGH
            $this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
            $this->LOWHIGH->ViewCustomAttributes = "";

            // Branch
            $this->Branch->ViewValue = $this->Branch->CurrentValue;
            $this->Branch->ViewCustomAttributes = "";

            // Dispatch
            $this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
            $this->Dispatch->ViewCustomAttributes = "";

            // Pic1
            $this->Pic1->ViewValue = $this->Pic1->CurrentValue;
            $this->Pic1->ViewCustomAttributes = "";

            // Pic2
            $this->Pic2->ViewValue = $this->Pic2->CurrentValue;
            $this->Pic2->ViewCustomAttributes = "";

            // GraphPath
            $this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
            $this->GraphPath->ViewCustomAttributes = "";

            // MachineCD
            $this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
            $this->MachineCD->ViewCustomAttributes = "";

            // TestCancel
            $this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
            $this->TestCancel->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // Printed
            $this->Printed->ViewValue = $this->Printed->CurrentValue;
            $this->Printed->ViewCustomAttributes = "";

            // PrintBy
            $this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
            $this->PrintBy->ViewCustomAttributes = "";

            // PrintDate
            $this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
            $this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
            $this->PrintDate->ViewCustomAttributes = "";

            // BillingDate
            $this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
            $this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
            $this->BillingDate->ViewCustomAttributes = "";

            // BilledBy
            $this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
            $this->BilledBy->ViewCustomAttributes = "";

            // Resulted
            $this->Resulted->ViewValue = $this->Resulted->CurrentValue;
            $this->Resulted->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // ResultedBy
            $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
            $this->ResultedBy->ViewCustomAttributes = "";

            // SampleDate
            $this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
            $this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
            $this->SampleDate->ViewCustomAttributes = "";

            // SampleUser
            $this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
            $this->SampleUser->ViewCustomAttributes = "";

            // Sampled
            $this->Sampled->ViewValue = $this->Sampled->CurrentValue;
            $this->Sampled->ViewCustomAttributes = "";

            // ReceivedDate
            $this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
            $this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
            $this->ReceivedDate->ViewCustomAttributes = "";

            // ReceivedUser
            $this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
            $this->ReceivedUser->ViewCustomAttributes = "";

            // Recevied
            $this->Recevied->ViewValue = $this->Recevied->CurrentValue;
            $this->Recevied->ViewCustomAttributes = "";

            // DeptRecvDate
            $this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
            $this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
            $this->DeptRecvDate->ViewCustomAttributes = "";

            // DeptRecvUser
            $this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
            $this->DeptRecvUser->ViewCustomAttributes = "";

            // DeptRecived
            $this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
            $this->DeptRecived->ViewCustomAttributes = "";

            // SAuthDate
            $this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
            $this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
            $this->SAuthDate->ViewCustomAttributes = "";

            // SAuthBy
            $this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
            $this->SAuthBy->ViewCustomAttributes = "";

            // SAuthendicate
            $this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
            $this->SAuthendicate->ViewCustomAttributes = "";

            // AuthDate
            $this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
            $this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
            $this->AuthDate->ViewCustomAttributes = "";

            // AuthBy
            $this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
            $this->AuthBy->ViewCustomAttributes = "";

            // Authencate
            $this->Authencate->ViewValue = $this->Authencate->CurrentValue;
            $this->Authencate->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // EditBy
            $this->EditBy->ViewValue = $this->EditBy->CurrentValue;
            $this->EditBy->ViewCustomAttributes = "";

            // Editted
            $this->Editted->ViewValue = $this->Editted->CurrentValue;
            $this->Editted->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // CId
            $this->CId->ViewValue = $this->CId->CurrentValue;
            $this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
            $this->CId->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Formula
            $this->Formula->ViewValue = $this->Formula->CurrentValue;
            $this->Formula->ViewCustomAttributes = "";

            // Inactive
            $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
            $this->Inactive->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // TestType
            $this->TestType->ViewValue = $this->TestType->CurrentValue;
            $this->TestType->ViewCustomAttributes = "";

            // Repeated
            $this->Repeated->ViewValue = $this->Repeated->CurrentValue;
            $this->Repeated->ViewCustomAttributes = "";

            // RepeatedBy
            $this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
            $this->RepeatedBy->ViewCustomAttributes = "";

            // RepeatedDate
            $this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
            $this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
            $this->RepeatedDate->ViewCustomAttributes = "";

            // serviceID
            $this->serviceID->ViewValue = $this->serviceID->CurrentValue;
            $this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
            $this->serviceID->ViewCustomAttributes = "";

            // Service_Type
            $this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
            $this->Service_Type->ViewCustomAttributes = "";

            // Service_Department
            $this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
            $this->Service_Department->ViewCustomAttributes = "";

            // RequestNo
            $this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
            $this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
            $this->RequestNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";
            $this->Services->TooltipValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";
            $this->amount->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";
            $this->patient_type->TooltipValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";
            $this->charged_date->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

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

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";
            $this->SubTotal->TooltipValue = "";

            // ServiceSelect
            $this->ServiceSelect->LinkCustomAttributes = "";
            $this->ServiceSelect->HrefValue = "";
            $this->ServiceSelect->TooltipValue = "";

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";
            $this->Aid->TooltipValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";
            $this->Vid->TooltipValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // DrCODE
            $this->DrCODE->LinkCustomAttributes = "";
            $this->DrCODE->HrefValue = "";
            $this->DrCODE->TooltipValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";
            $this->DrName->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // DrSharePres
            $this->DrSharePres->LinkCustomAttributes = "";
            $this->DrSharePres->HrefValue = "";
            $this->DrSharePres->TooltipValue = "";

            // HospSharePres
            $this->HospSharePres->LinkCustomAttributes = "";
            $this->HospSharePres->HrefValue = "";
            $this->HospSharePres->TooltipValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";
            $this->DrShareAmount->TooltipValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";
            $this->HospShareAmount->TooltipValue = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->LinkCustomAttributes = "";
            $this->DrShareSettiledAmount->HrefValue = "";
            $this->DrShareSettiledAmount->TooltipValue = "";

            // DrShareSettledId
            $this->DrShareSettledId->LinkCustomAttributes = "";
            $this->DrShareSettledId->HrefValue = "";
            $this->DrShareSettledId->TooltipValue = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->LinkCustomAttributes = "";
            $this->DrShareSettiledStatus->HrefValue = "";
            $this->DrShareSettiledStatus->TooltipValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";
            $this->invoiceId->TooltipValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";
            $this->invoiceAmount->TooltipValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";
            $this->invoiceStatus->TooltipValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";
            $this->modeOfPayment->TooltipValue = "";

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

            // DiscountCategory
            $this->DiscountCategory->LinkCustomAttributes = "";
            $this->DiscountCategory->HrefValue = "";
            $this->DiscountCategory->TooltipValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";
            $this->sid->TooltipValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";
            $this->ItemCode->TooltipValue = "";

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

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";
            $this->RefValue->TooltipValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";
            $this->TestUnit->TooltipValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";
            $this->LOWHIGH->TooltipValue = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";
            $this->Branch->TooltipValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";
            $this->Dispatch->TooltipValue = "";

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

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";
            $this->Printed->TooltipValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";
            $this->PrintBy->TooltipValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";
            $this->PrintDate->TooltipValue = "";

            // BillingDate
            $this->BillingDate->LinkCustomAttributes = "";
            $this->BillingDate->HrefValue = "";
            $this->BillingDate->TooltipValue = "";

            // BilledBy
            $this->BilledBy->LinkCustomAttributes = "";
            $this->BilledBy->HrefValue = "";
            $this->BilledBy->TooltipValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";
            $this->Resulted->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";
            $this->ResultedBy->TooltipValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";
            $this->SampleDate->TooltipValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";
            $this->SampleUser->TooltipValue = "";

            // Sampled
            $this->Sampled->LinkCustomAttributes = "";
            $this->Sampled->HrefValue = "";
            $this->Sampled->TooltipValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";
            $this->ReceivedDate->TooltipValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";
            $this->ReceivedUser->TooltipValue = "";

            // Recevied
            $this->Recevied->LinkCustomAttributes = "";
            $this->Recevied->HrefValue = "";
            $this->Recevied->TooltipValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";
            $this->DeptRecvDate->TooltipValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";
            $this->DeptRecvUser->TooltipValue = "";

            // DeptRecived
            $this->DeptRecived->LinkCustomAttributes = "";
            $this->DeptRecived->HrefValue = "";
            $this->DeptRecived->TooltipValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";
            $this->SAuthDate->TooltipValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";
            $this->SAuthBy->TooltipValue = "";

            // SAuthendicate
            $this->SAuthendicate->LinkCustomAttributes = "";
            $this->SAuthendicate->HrefValue = "";
            $this->SAuthendicate->TooltipValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";
            $this->AuthDate->TooltipValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";
            $this->AuthBy->TooltipValue = "";

            // Authencate
            $this->Authencate->LinkCustomAttributes = "";
            $this->Authencate->HrefValue = "";
            $this->Authencate->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // EditBy
            $this->EditBy->LinkCustomAttributes = "";
            $this->EditBy->HrefValue = "";
            $this->EditBy->TooltipValue = "";

            // Editted
            $this->Editted->LinkCustomAttributes = "";
            $this->Editted->HrefValue = "";
            $this->Editted->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Formula
            $this->Formula->LinkCustomAttributes = "";
            $this->Formula->HrefValue = "";
            $this->Formula->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";
            $this->Repeated->TooltipValue = "";

            // RepeatedBy
            $this->RepeatedBy->LinkCustomAttributes = "";
            $this->RepeatedBy->HrefValue = "";
            $this->RepeatedBy->TooltipValue = "";

            // RepeatedDate
            $this->RepeatedDate->LinkCustomAttributes = "";
            $this->RepeatedDate->HrefValue = "";
            $this->RepeatedDate->TooltipValue = "";

            // serviceID
            $this->serviceID->LinkCustomAttributes = "";
            $this->serviceID->HrefValue = "";
            $this->serviceID->TooltipValue = "";

            // Service_Type
            $this->Service_Type->LinkCustomAttributes = "";
            $this->Service_Type->HrefValue = "";
            $this->Service_Type->TooltipValue = "";

            // Service_Department
            $this->Service_Department->LinkCustomAttributes = "";
            $this->Service_Department->HrefValue = "";
            $this->Service_Department->TooltipValue = "";

            // RequestNo
            $this->RequestNo->LinkCustomAttributes = "";
            $this->RequestNo->HrefValue = "";
            $this->RequestNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // Services
            $this->Services->EditAttrs["class"] = "form-control";
            $this->Services->EditCustomAttributes = "";
            if (!$this->Services->Raw) {
                $this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
            }
            $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
            $curVal = trim(strval($this->Services->CurrentValue));
            if ($curVal != "") {
                $this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
                if ($this->Services->EditValue === null) { // Lookup from database
                    $filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`Inactive` != 'Y'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Services->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Services->Lookup->renderViewRow($rswrk[0]);
                        $this->Services->EditValue = $this->Services->displayValue($arwrk);
                    } else {
                        $this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
                    }
                }
            } else {
                $this->Services->EditValue = null;
            }
            $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

            // amount
            $this->amount->EditAttrs["class"] = "form-control";
            $this->amount->EditCustomAttributes = "";
            $this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
            $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
            if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
                $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
            }

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            if (!$this->description->Raw) {
                $this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
            }
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // patient_type
            $this->patient_type->EditAttrs["class"] = "form-control";
            $this->patient_type->EditCustomAttributes = "";
            $this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
            $this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

            // charged_date

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            } else {
                $this->status->ViewValue = $this->status->Lookup !== null && is_array($this->status->Lookup->Options) ? $curVal : null;
            }
            if ($this->status->ViewValue !== null) { // Load from cache
                $this->status->EditValue = array_values($this->status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->status->EditValue = $arwrk;
            }
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // modifiedby

            // modifieddatetime

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

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
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
            if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
                $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
            }

            // SubTotal
            $this->SubTotal->EditAttrs["class"] = "form-control";
            $this->SubTotal->EditCustomAttributes = "";
            $this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
            $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
            if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
                $this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
            }

            // ServiceSelect
            $this->ServiceSelect->EditCustomAttributes = "";
            $this->ServiceSelect->EditValue = $this->ServiceSelect->options(false);
            $this->ServiceSelect->PlaceHolder = RemoveHtml($this->ServiceSelect->caption());

            // Aid
            $this->Aid->EditAttrs["class"] = "form-control";
            $this->Aid->EditCustomAttributes = "";
            $this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
            $this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

            // Vid
            $this->Vid->EditAttrs["class"] = "form-control";
            $this->Vid->EditCustomAttributes = "";
            if ($this->Vid->getSessionValue() != "") {
                $this->Vid->CurrentValue = GetForeignKeyValue($this->Vid->getSessionValue());
                $this->Vid->ViewValue = $this->Vid->CurrentValue;
                $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
                $this->Vid->ViewCustomAttributes = "";
            } else {
                $this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
                $this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
            }

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // DrCODE
            $this->DrCODE->EditAttrs["class"] = "form-control";
            $this->DrCODE->EditCustomAttributes = "";
            if (!$this->DrCODE->Raw) {
                $this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
            }
            $this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
            $this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

            // DrName
            $this->DrName->EditAttrs["class"] = "form-control";
            $this->DrName->EditCustomAttributes = "";
            if (!$this->DrName->Raw) {
                $this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
            }
            $this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
            $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // DrSharePres
            $this->DrSharePres->EditAttrs["class"] = "form-control";
            $this->DrSharePres->EditCustomAttributes = "";
            $this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
            $this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
            if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
                $this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
            }

            // HospSharePres
            $this->HospSharePres->EditAttrs["class"] = "form-control";
            $this->HospSharePres->EditCustomAttributes = "";
            $this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
            $this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
            if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
                $this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
            }

            // DrShareAmount
            $this->DrShareAmount->EditAttrs["class"] = "form-control";
            $this->DrShareAmount->EditCustomAttributes = "";
            $this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
            $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
            if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
                $this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
            }

            // HospShareAmount
            $this->HospShareAmount->EditAttrs["class"] = "form-control";
            $this->HospShareAmount->EditCustomAttributes = "";
            $this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
            $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
            if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
                $this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
            }

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledAmount->EditCustomAttributes = "";
            $this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
            $this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
            if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
                $this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
            }

            // DrShareSettledId
            $this->DrShareSettledId->EditAttrs["class"] = "form-control";
            $this->DrShareSettledId->EditCustomAttributes = "";
            $this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
            $this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledStatus->EditCustomAttributes = "";
            $this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
            $this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // invoiceAmount
            $this->invoiceAmount->EditAttrs["class"] = "form-control";
            $this->invoiceAmount->EditCustomAttributes = "";
            $this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
            $this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
            if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
                $this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
            }

            // invoiceStatus
            $this->invoiceStatus->EditAttrs["class"] = "form-control";
            $this->invoiceStatus->EditCustomAttributes = "";
            if (!$this->invoiceStatus->Raw) {
                $this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
            }
            $this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
            $this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

            // modeOfPayment
            $this->modeOfPayment->EditAttrs["class"] = "form-control";
            $this->modeOfPayment->EditCustomAttributes = "";
            if (!$this->modeOfPayment->Raw) {
                $this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
            }
            $this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
            $this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

            // HospID

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->EditValue = FormatNumber($this->RIDNO->EditValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = $this->TidNo->CurrentValue;
            $this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // DiscountCategory
            $this->DiscountCategory->EditAttrs["class"] = "form-control";
            $this->DiscountCategory->EditCustomAttributes = "";
            if (!$this->DiscountCategory->Raw) {
                $this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
            }
            $this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->CurrentValue);
            $this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // ItemCode
            $this->ItemCode->EditAttrs["class"] = "form-control";
            $this->ItemCode->EditCustomAttributes = "";
            if (!$this->ItemCode->Raw) {
                $this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
            }
            $this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
            $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

            // TestSubCd
            $this->TestSubCd->EditAttrs["class"] = "form-control";
            $this->TestSubCd->EditCustomAttributes = "";
            if (!$this->TestSubCd->Raw) {
                $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
            }
            $this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
            $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

            // DEptCd
            $this->DEptCd->EditAttrs["class"] = "form-control";
            $this->DEptCd->EditCustomAttributes = "";
            if (!$this->DEptCd->Raw) {
                $this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
            }
            $this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
            $this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

            // ProfCd
            $this->ProfCd->EditAttrs["class"] = "form-control";
            $this->ProfCd->EditCustomAttributes = "";
            if (!$this->ProfCd->Raw) {
                $this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
            }
            $this->ProfCd->EditValue = HtmlEncode($this->ProfCd->CurrentValue);
            $this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

            // LabReport
            $this->LabReport->EditAttrs["class"] = "form-control";
            $this->LabReport->EditCustomAttributes = "";
            $this->LabReport->EditValue = HtmlEncode($this->LabReport->CurrentValue);
            $this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

            // Comments
            $this->Comments->EditAttrs["class"] = "form-control";
            $this->Comments->EditCustomAttributes = "";
            if (!$this->Comments->Raw) {
                $this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
            }
            $this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
            $this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Specimen
            $this->Specimen->EditAttrs["class"] = "form-control";
            $this->Specimen->EditCustomAttributes = "";
            if (!$this->Specimen->Raw) {
                $this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
            }
            $this->Specimen->EditValue = HtmlEncode($this->Specimen->CurrentValue);
            $this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // RefValue
            $this->RefValue->EditAttrs["class"] = "form-control";
            $this->RefValue->EditCustomAttributes = "";
            $this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
            $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

            // TestUnit
            $this->TestUnit->EditAttrs["class"] = "form-control";
            $this->TestUnit->EditCustomAttributes = "";
            if (!$this->TestUnit->Raw) {
                $this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
            }
            $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
            $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

            // LOWHIGH
            $this->LOWHIGH->EditAttrs["class"] = "form-control";
            $this->LOWHIGH->EditCustomAttributes = "";
            if (!$this->LOWHIGH->Raw) {
                $this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
            }
            $this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
            $this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

            // Branch
            $this->Branch->EditAttrs["class"] = "form-control";
            $this->Branch->EditCustomAttributes = "";
            if (!$this->Branch->Raw) {
                $this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
            }
            $this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
            $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

            // Dispatch
            $this->Dispatch->EditAttrs["class"] = "form-control";
            $this->Dispatch->EditCustomAttributes = "";
            if (!$this->Dispatch->Raw) {
                $this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
            }
            $this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
            $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

            // Pic1
            $this->Pic1->EditAttrs["class"] = "form-control";
            $this->Pic1->EditCustomAttributes = "";
            if (!$this->Pic1->Raw) {
                $this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
            }
            $this->Pic1->EditValue = HtmlEncode($this->Pic1->CurrentValue);
            $this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

            // Pic2
            $this->Pic2->EditAttrs["class"] = "form-control";
            $this->Pic2->EditCustomAttributes = "";
            if (!$this->Pic2->Raw) {
                $this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
            }
            $this->Pic2->EditValue = HtmlEncode($this->Pic2->CurrentValue);
            $this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

            // GraphPath
            $this->GraphPath->EditAttrs["class"] = "form-control";
            $this->GraphPath->EditCustomAttributes = "";
            if (!$this->GraphPath->Raw) {
                $this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
            }
            $this->GraphPath->EditValue = HtmlEncode($this->GraphPath->CurrentValue);
            $this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

            // MachineCD
            $this->MachineCD->EditAttrs["class"] = "form-control";
            $this->MachineCD->EditCustomAttributes = "";
            if (!$this->MachineCD->Raw) {
                $this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
            }
            $this->MachineCD->EditValue = HtmlEncode($this->MachineCD->CurrentValue);
            $this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

            // TestCancel
            $this->TestCancel->EditAttrs["class"] = "form-control";
            $this->TestCancel->EditCustomAttributes = "";
            if (!$this->TestCancel->Raw) {
                $this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
            }
            $this->TestCancel->EditValue = HtmlEncode($this->TestCancel->CurrentValue);
            $this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

            // OutSource
            $this->OutSource->EditAttrs["class"] = "form-control";
            $this->OutSource->EditCustomAttributes = "";
            if (!$this->OutSource->Raw) {
                $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
            }
            $this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
            $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

            // Printed
            $this->Printed->EditAttrs["class"] = "form-control";
            $this->Printed->EditCustomAttributes = "";
            if (!$this->Printed->Raw) {
                $this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
            }
            $this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
            $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

            // PrintBy
            $this->PrintBy->EditAttrs["class"] = "form-control";
            $this->PrintBy->EditCustomAttributes = "";
            if (!$this->PrintBy->Raw) {
                $this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
            }
            $this->PrintBy->EditValue = HtmlEncode($this->PrintBy->CurrentValue);
            $this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

            // PrintDate
            $this->PrintDate->EditAttrs["class"] = "form-control";
            $this->PrintDate->EditCustomAttributes = "";
            $this->PrintDate->EditValue = HtmlEncode(FormatDateTime($this->PrintDate->CurrentValue, 8));
            $this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

            // BillingDate
            $this->BillingDate->EditAttrs["class"] = "form-control";
            $this->BillingDate->EditCustomAttributes = "";
            $this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
            $this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

            // BilledBy
            $this->BilledBy->EditAttrs["class"] = "form-control";
            $this->BilledBy->EditCustomAttributes = "";
            if (!$this->BilledBy->Raw) {
                $this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
            }
            $this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
            $this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

            // Resulted
            $this->Resulted->EditAttrs["class"] = "form-control";
            $this->Resulted->EditCustomAttributes = "";
            if (!$this->Resulted->Raw) {
                $this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
            }
            $this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
            $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

            // SampleDate
            $this->SampleDate->EditAttrs["class"] = "form-control";
            $this->SampleDate->EditCustomAttributes = "";
            $this->SampleDate->EditValue = HtmlEncode(FormatDateTime($this->SampleDate->CurrentValue, 8));
            $this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

            // SampleUser
            $this->SampleUser->EditAttrs["class"] = "form-control";
            $this->SampleUser->EditCustomAttributes = "";
            if (!$this->SampleUser->Raw) {
                $this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
            }
            $this->SampleUser->EditValue = HtmlEncode($this->SampleUser->CurrentValue);
            $this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

            // Sampled
            $this->Sampled->EditAttrs["class"] = "form-control";
            $this->Sampled->EditCustomAttributes = "";
            if (!$this->Sampled->Raw) {
                $this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
            }
            $this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
            $this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

            // ReceivedDate
            $this->ReceivedDate->EditAttrs["class"] = "form-control";
            $this->ReceivedDate->EditCustomAttributes = "";
            $this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime($this->ReceivedDate->CurrentValue, 8));
            $this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

            // ReceivedUser
            $this->ReceivedUser->EditAttrs["class"] = "form-control";
            $this->ReceivedUser->EditCustomAttributes = "";
            if (!$this->ReceivedUser->Raw) {
                $this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
            }
            $this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->CurrentValue);
            $this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

            // Recevied
            $this->Recevied->EditAttrs["class"] = "form-control";
            $this->Recevied->EditCustomAttributes = "";
            if (!$this->Recevied->Raw) {
                $this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
            }
            $this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
            $this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

            // DeptRecvDate
            $this->DeptRecvDate->EditAttrs["class"] = "form-control";
            $this->DeptRecvDate->EditCustomAttributes = "";
            $this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime($this->DeptRecvDate->CurrentValue, 8));
            $this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

            // DeptRecvUser
            $this->DeptRecvUser->EditAttrs["class"] = "form-control";
            $this->DeptRecvUser->EditCustomAttributes = "";
            if (!$this->DeptRecvUser->Raw) {
                $this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
            }
            $this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->CurrentValue);
            $this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

            // DeptRecived
            $this->DeptRecived->EditAttrs["class"] = "form-control";
            $this->DeptRecived->EditCustomAttributes = "";
            if (!$this->DeptRecived->Raw) {
                $this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
            }
            $this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
            $this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

            // SAuthDate
            $this->SAuthDate->EditAttrs["class"] = "form-control";
            $this->SAuthDate->EditCustomAttributes = "";
            $this->SAuthDate->EditValue = HtmlEncode(FormatDateTime($this->SAuthDate->CurrentValue, 8));
            $this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

            // SAuthBy
            $this->SAuthBy->EditAttrs["class"] = "form-control";
            $this->SAuthBy->EditCustomAttributes = "";
            if (!$this->SAuthBy->Raw) {
                $this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
            }
            $this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->CurrentValue);
            $this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

            // SAuthendicate
            $this->SAuthendicate->EditAttrs["class"] = "form-control";
            $this->SAuthendicate->EditCustomAttributes = "";
            if (!$this->SAuthendicate->Raw) {
                $this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
            }
            $this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
            $this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

            // AuthDate
            $this->AuthDate->EditAttrs["class"] = "form-control";
            $this->AuthDate->EditCustomAttributes = "";
            $this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
            $this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

            // AuthBy
            $this->AuthBy->EditAttrs["class"] = "form-control";
            $this->AuthBy->EditCustomAttributes = "";
            if (!$this->AuthBy->Raw) {
                $this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
            }
            $this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
            $this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

            // Authencate
            $this->Authencate->EditAttrs["class"] = "form-control";
            $this->Authencate->EditCustomAttributes = "";
            if (!$this->Authencate->Raw) {
                $this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
            }
            $this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
            $this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

            // EditDate
            $this->EditDate->EditAttrs["class"] = "form-control";
            $this->EditDate->EditCustomAttributes = "";
            $this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
            $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

            // EditBy
            $this->EditBy->EditAttrs["class"] = "form-control";
            $this->EditBy->EditCustomAttributes = "";
            if (!$this->EditBy->Raw) {
                $this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
            }
            $this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
            $this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

            // Editted
            $this->Editted->EditAttrs["class"] = "form-control";
            $this->Editted->EditCustomAttributes = "";
            if (!$this->Editted->Raw) {
                $this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
            }
            $this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
            $this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if ($this->PatID->getSessionValue() != "") {
                $this->PatID->CurrentValue = GetForeignKeyValue($this->PatID->getSessionValue());
                $this->PatID->ViewValue = $this->PatID->CurrentValue;
                $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
                $this->PatID->ViewCustomAttributes = "";
            } else {
                $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
                $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
            }

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
            }

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            $this->Form->EditValue = HtmlEncode($this->Form->CurrentValue);
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // ResType
            $this->ResType->EditAttrs["class"] = "form-control";
            $this->ResType->EditCustomAttributes = "";
            if (!$this->ResType->Raw) {
                $this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
            }
            $this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
            $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

            // Sample
            $this->Sample->EditAttrs["class"] = "form-control";
            $this->Sample->EditCustomAttributes = "";
            if (!$this->Sample->Raw) {
                $this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
            }
            $this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
            $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

            // NoD
            $this->NoD->EditAttrs["class"] = "form-control";
            $this->NoD->EditCustomAttributes = "";
            $this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
            $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
            if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
                $this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
            }

            // BillOrder
            $this->BillOrder->EditAttrs["class"] = "form-control";
            $this->BillOrder->EditCustomAttributes = "";
            $this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
            $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
            if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
                $this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
            }

            // Formula
            $this->Formula->EditAttrs["class"] = "form-control";
            $this->Formula->EditCustomAttributes = "";
            $this->Formula->EditValue = HtmlEncode($this->Formula->CurrentValue);
            $this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

            // Inactive
            $this->Inactive->EditAttrs["class"] = "form-control";
            $this->Inactive->EditCustomAttributes = "";
            if (!$this->Inactive->Raw) {
                $this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
            }
            $this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
            $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

            // CollSample
            $this->CollSample->EditAttrs["class"] = "form-control";
            $this->CollSample->EditCustomAttributes = "";
            if (!$this->CollSample->Raw) {
                $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
            }
            $this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
            $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            if (!$this->TestType->Raw) {
                $this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
            }
            $this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
            $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

            // Repeated
            $this->Repeated->EditAttrs["class"] = "form-control";
            $this->Repeated->EditCustomAttributes = "";
            if (!$this->Repeated->Raw) {
                $this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
            }
            $this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
            $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

            // RepeatedBy
            $this->RepeatedBy->EditAttrs["class"] = "form-control";
            $this->RepeatedBy->EditCustomAttributes = "";
            if (!$this->RepeatedBy->Raw) {
                $this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
            }
            $this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
            $this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

            // RepeatedDate
            $this->RepeatedDate->EditAttrs["class"] = "form-control";
            $this->RepeatedDate->EditCustomAttributes = "";
            $this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
            $this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

            // serviceID
            $this->serviceID->EditAttrs["class"] = "form-control";
            $this->serviceID->EditCustomAttributes = "";
            $this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
            $this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

            // Service_Type
            $this->Service_Type->EditAttrs["class"] = "form-control";
            $this->Service_Type->EditCustomAttributes = "";
            if (!$this->Service_Type->Raw) {
                $this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
            }
            $this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
            $this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

            // Service_Department
            $this->Service_Department->EditAttrs["class"] = "form-control";
            $this->Service_Department->EditCustomAttributes = "";
            if (!$this->Service_Department->Raw) {
                $this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
            }
            $this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
            $this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

            // RequestNo
            $this->RequestNo->EditAttrs["class"] = "form-control";
            $this->RequestNo->EditCustomAttributes = "";
            $this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
            $this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // Services
            $this->Services->LinkCustomAttributes = "";
            $this->Services->HrefValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

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

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";

            // ServiceSelect
            $this->ServiceSelect->LinkCustomAttributes = "";
            $this->ServiceSelect->HrefValue = "";

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";

            // DrCODE
            $this->DrCODE->LinkCustomAttributes = "";
            $this->DrCODE->HrefValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // DrSharePres
            $this->DrSharePres->LinkCustomAttributes = "";
            $this->DrSharePres->HrefValue = "";

            // HospSharePres
            $this->HospSharePres->LinkCustomAttributes = "";
            $this->HospSharePres->HrefValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->LinkCustomAttributes = "";
            $this->DrShareSettiledAmount->HrefValue = "";

            // DrShareSettledId
            $this->DrShareSettledId->LinkCustomAttributes = "";
            $this->DrShareSettledId->HrefValue = "";

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->LinkCustomAttributes = "";
            $this->DrShareSettiledStatus->HrefValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";

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

            // DiscountCategory
            $this->DiscountCategory->LinkCustomAttributes = "";
            $this->DiscountCategory->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // ItemCode
            $this->ItemCode->LinkCustomAttributes = "";
            $this->ItemCode->HrefValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";

            // LabReport
            $this->LabReport->LinkCustomAttributes = "";
            $this->LabReport->HrefValue = "";

            // Comments
            $this->Comments->LinkCustomAttributes = "";
            $this->Comments->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";

            // TestUnit
            $this->TestUnit->LinkCustomAttributes = "";
            $this->TestUnit->HrefValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";

            // BillingDate
            $this->BillingDate->LinkCustomAttributes = "";
            $this->BillingDate->HrefValue = "";

            // BilledBy
            $this->BilledBy->LinkCustomAttributes = "";
            $this->BilledBy->HrefValue = "";

            // Resulted
            $this->Resulted->LinkCustomAttributes = "";
            $this->Resulted->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";

            // Sampled
            $this->Sampled->LinkCustomAttributes = "";
            $this->Sampled->HrefValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";

            // Recevied
            $this->Recevied->LinkCustomAttributes = "";
            $this->Recevied->HrefValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";

            // DeptRecived
            $this->DeptRecived->LinkCustomAttributes = "";
            $this->DeptRecived->HrefValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";

            // SAuthendicate
            $this->SAuthendicate->LinkCustomAttributes = "";
            $this->SAuthendicate->HrefValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";

            // Authencate
            $this->Authencate->LinkCustomAttributes = "";
            $this->Authencate->HrefValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";

            // EditBy
            $this->EditBy->LinkCustomAttributes = "";
            $this->EditBy->HrefValue = "";

            // Editted
            $this->Editted->LinkCustomAttributes = "";
            $this->Editted->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";

            // Formula
            $this->Formula->LinkCustomAttributes = "";
            $this->Formula->HrefValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";

            // Repeated
            $this->Repeated->LinkCustomAttributes = "";
            $this->Repeated->HrefValue = "";

            // RepeatedBy
            $this->RepeatedBy->LinkCustomAttributes = "";
            $this->RepeatedBy->HrefValue = "";

            // RepeatedDate
            $this->RepeatedDate->LinkCustomAttributes = "";
            $this->RepeatedDate->HrefValue = "";

            // serviceID
            $this->serviceID->LinkCustomAttributes = "";
            $this->serviceID->HrefValue = "";

            // Service_Type
            $this->Service_Type->LinkCustomAttributes = "";
            $this->Service_Type->HrefValue = "";

            // Service_Department
            $this->Service_Department->LinkCustomAttributes = "";
            $this->Service_Department->HrefValue = "";

            // RequestNo
            $this->RequestNo->LinkCustomAttributes = "";
            $this->RequestNo->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->Services->Required) {
            if (!$this->Services->IsDetailKey && EmptyValue($this->Services->FormValue)) {
                $this->Services->addErrorMessage(str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
            }
        }
        if ($this->amount->Required) {
            if (!$this->amount->IsDetailKey && EmptyValue($this->amount->FormValue)) {
                $this->amount->addErrorMessage(str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->amount->FormValue)) {
            $this->amount->addErrorMessage($this->amount->getErrorMessage(false));
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
            }
        }
        if ($this->patient_type->Required) {
            if (!$this->patient_type->IsDetailKey && EmptyValue($this->patient_type->FormValue)) {
                $this->patient_type->addErrorMessage(str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient_type->FormValue)) {
            $this->patient_type->addErrorMessage($this->patient_type->getErrorMessage(false));
        }
        if ($this->charged_date->Required) {
            if (!$this->charged_date->IsDetailKey && EmptyValue($this->charged_date->FormValue)) {
                $this->charged_date->addErrorMessage(str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
        if ($this->Unit->Required) {
            if (!$this->Unit->IsDetailKey && EmptyValue($this->Unit->FormValue)) {
                $this->Unit->addErrorMessage(str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Unit->FormValue)) {
            $this->Unit->addErrorMessage($this->Unit->getErrorMessage(false));
        }
        if ($this->Quantity->Required) {
            if (!$this->Quantity->IsDetailKey && EmptyValue($this->Quantity->FormValue)) {
                $this->Quantity->addErrorMessage(str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Quantity->FormValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if ($this->Discount->Required) {
            if (!$this->Discount->IsDetailKey && EmptyValue($this->Discount->FormValue)) {
                $this->Discount->addErrorMessage(str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Discount->FormValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
        }
        if ($this->SubTotal->Required) {
            if (!$this->SubTotal->IsDetailKey && EmptyValue($this->SubTotal->FormValue)) {
                $this->SubTotal->addErrorMessage(str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SubTotal->FormValue)) {
            $this->SubTotal->addErrorMessage($this->SubTotal->getErrorMessage(false));
        }
        if ($this->ServiceSelect->Required) {
            if ($this->ServiceSelect->FormValue == "") {
                $this->ServiceSelect->addErrorMessage(str_replace("%s", $this->ServiceSelect->caption(), $this->ServiceSelect->RequiredErrorMessage));
            }
        }
        if ($this->Aid->Required) {
            if (!$this->Aid->IsDetailKey && EmptyValue($this->Aid->FormValue)) {
                $this->Aid->addErrorMessage(str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Aid->FormValue)) {
            $this->Aid->addErrorMessage($this->Aid->getErrorMessage(false));
        }
        if ($this->Vid->Required) {
            if (!$this->Vid->IsDetailKey && EmptyValue($this->Vid->FormValue)) {
                $this->Vid->addErrorMessage(str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Vid->FormValue)) {
            $this->Vid->addErrorMessage($this->Vid->getErrorMessage(false));
        }
        if ($this->DrID->Required) {
            if (!$this->DrID->IsDetailKey && EmptyValue($this->DrID->FormValue)) {
                $this->DrID->addErrorMessage(str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrID->FormValue)) {
            $this->DrID->addErrorMessage($this->DrID->getErrorMessage(false));
        }
        if ($this->DrCODE->Required) {
            if (!$this->DrCODE->IsDetailKey && EmptyValue($this->DrCODE->FormValue)) {
                $this->DrCODE->addErrorMessage(str_replace("%s", $this->DrCODE->caption(), $this->DrCODE->RequiredErrorMessage));
            }
        }
        if ($this->DrName->Required) {
            if (!$this->DrName->IsDetailKey && EmptyValue($this->DrName->FormValue)) {
                $this->DrName->addErrorMessage(str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
            }
        }
        if ($this->Department->Required) {
            if (!$this->Department->IsDetailKey && EmptyValue($this->Department->FormValue)) {
                $this->Department->addErrorMessage(str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
            }
        }
        if ($this->DrSharePres->Required) {
            if (!$this->DrSharePres->IsDetailKey && EmptyValue($this->DrSharePres->FormValue)) {
                $this->DrSharePres->addErrorMessage(str_replace("%s", $this->DrSharePres->caption(), $this->DrSharePres->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrSharePres->FormValue)) {
            $this->DrSharePres->addErrorMessage($this->DrSharePres->getErrorMessage(false));
        }
        if ($this->HospSharePres->Required) {
            if (!$this->HospSharePres->IsDetailKey && EmptyValue($this->HospSharePres->FormValue)) {
                $this->HospSharePres->addErrorMessage(str_replace("%s", $this->HospSharePres->caption(), $this->HospSharePres->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->HospSharePres->FormValue)) {
            $this->HospSharePres->addErrorMessage($this->HospSharePres->getErrorMessage(false));
        }
        if ($this->DrShareAmount->Required) {
            if (!$this->DrShareAmount->IsDetailKey && EmptyValue($this->DrShareAmount->FormValue)) {
                $this->DrShareAmount->addErrorMessage(str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrShareAmount->FormValue)) {
            $this->DrShareAmount->addErrorMessage($this->DrShareAmount->getErrorMessage(false));
        }
        if ($this->HospShareAmount->Required) {
            if (!$this->HospShareAmount->IsDetailKey && EmptyValue($this->HospShareAmount->FormValue)) {
                $this->HospShareAmount->addErrorMessage(str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->HospShareAmount->FormValue)) {
            $this->HospShareAmount->addErrorMessage($this->HospShareAmount->getErrorMessage(false));
        }
        if ($this->DrShareSettiledAmount->Required) {
            if (!$this->DrShareSettiledAmount->IsDetailKey && EmptyValue($this->DrShareSettiledAmount->FormValue)) {
                $this->DrShareSettiledAmount->addErrorMessage(str_replace("%s", $this->DrShareSettiledAmount->caption(), $this->DrShareSettiledAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrShareSettiledAmount->FormValue)) {
            $this->DrShareSettiledAmount->addErrorMessage($this->DrShareSettiledAmount->getErrorMessage(false));
        }
        if ($this->DrShareSettledId->Required) {
            if (!$this->DrShareSettledId->IsDetailKey && EmptyValue($this->DrShareSettledId->FormValue)) {
                $this->DrShareSettledId->addErrorMessage(str_replace("%s", $this->DrShareSettledId->caption(), $this->DrShareSettledId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrShareSettledId->FormValue)) {
            $this->DrShareSettledId->addErrorMessage($this->DrShareSettledId->getErrorMessage(false));
        }
        if ($this->DrShareSettiledStatus->Required) {
            if (!$this->DrShareSettiledStatus->IsDetailKey && EmptyValue($this->DrShareSettiledStatus->FormValue)) {
                $this->DrShareSettiledStatus->addErrorMessage(str_replace("%s", $this->DrShareSettiledStatus->caption(), $this->DrShareSettiledStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrShareSettiledStatus->FormValue)) {
            $this->DrShareSettiledStatus->addErrorMessage($this->DrShareSettiledStatus->getErrorMessage(false));
        }
        if ($this->invoiceId->Required) {
            if (!$this->invoiceId->IsDetailKey && EmptyValue($this->invoiceId->FormValue)) {
                $this->invoiceId->addErrorMessage(str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->invoiceId->FormValue)) {
            $this->invoiceId->addErrorMessage($this->invoiceId->getErrorMessage(false));
        }
        if ($this->invoiceAmount->Required) {
            if (!$this->invoiceAmount->IsDetailKey && EmptyValue($this->invoiceAmount->FormValue)) {
                $this->invoiceAmount->addErrorMessage(str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->invoiceAmount->FormValue)) {
            $this->invoiceAmount->addErrorMessage($this->invoiceAmount->getErrorMessage(false));
        }
        if ($this->invoiceStatus->Required) {
            if (!$this->invoiceStatus->IsDetailKey && EmptyValue($this->invoiceStatus->FormValue)) {
                $this->invoiceStatus->addErrorMessage(str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
            }
        }
        if ($this->modeOfPayment->Required) {
            if (!$this->modeOfPayment->IsDetailKey && EmptyValue($this->modeOfPayment->FormValue)) {
                $this->modeOfPayment->addErrorMessage(str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
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
        if ($this->DiscountCategory->Required) {
            if (!$this->DiscountCategory->IsDetailKey && EmptyValue($this->DiscountCategory->FormValue)) {
                $this->DiscountCategory->addErrorMessage(str_replace("%s", $this->DiscountCategory->caption(), $this->DiscountCategory->RequiredErrorMessage));
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
        if ($this->ItemCode->Required) {
            if (!$this->ItemCode->IsDetailKey && EmptyValue($this->ItemCode->FormValue)) {
                $this->ItemCode->addErrorMessage(str_replace("%s", $this->ItemCode->caption(), $this->ItemCode->RequiredErrorMessage));
            }
        }
        if ($this->TestSubCd->Required) {
            if (!$this->TestSubCd->IsDetailKey && EmptyValue($this->TestSubCd->FormValue)) {
                $this->TestSubCd->addErrorMessage(str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
            }
        }
        if ($this->DEptCd->Required) {
            if (!$this->DEptCd->IsDetailKey && EmptyValue($this->DEptCd->FormValue)) {
                $this->DEptCd->addErrorMessage(str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
            }
        }
        if ($this->ProfCd->Required) {
            if (!$this->ProfCd->IsDetailKey && EmptyValue($this->ProfCd->FormValue)) {
                $this->ProfCd->addErrorMessage(str_replace("%s", $this->ProfCd->caption(), $this->ProfCd->RequiredErrorMessage));
            }
        }
        if ($this->LabReport->Required) {
            if (!$this->LabReport->IsDetailKey && EmptyValue($this->LabReport->FormValue)) {
                $this->LabReport->addErrorMessage(str_replace("%s", $this->LabReport->caption(), $this->LabReport->RequiredErrorMessage));
            }
        }
        if ($this->Comments->Required) {
            if (!$this->Comments->IsDetailKey && EmptyValue($this->Comments->FormValue)) {
                $this->Comments->addErrorMessage(str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
            }
        }
        if ($this->Method->Required) {
            if (!$this->Method->IsDetailKey && EmptyValue($this->Method->FormValue)) {
                $this->Method->addErrorMessage(str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
            }
        }
        if ($this->Specimen->Required) {
            if (!$this->Specimen->IsDetailKey && EmptyValue($this->Specimen->FormValue)) {
                $this->Specimen->addErrorMessage(str_replace("%s", $this->Specimen->caption(), $this->Specimen->RequiredErrorMessage));
            }
        }
        if ($this->Abnormal->Required) {
            if (!$this->Abnormal->IsDetailKey && EmptyValue($this->Abnormal->FormValue)) {
                $this->Abnormal->addErrorMessage(str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
            }
        }
        if ($this->RefValue->Required) {
            if (!$this->RefValue->IsDetailKey && EmptyValue($this->RefValue->FormValue)) {
                $this->RefValue->addErrorMessage(str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
            }
        }
        if ($this->TestUnit->Required) {
            if (!$this->TestUnit->IsDetailKey && EmptyValue($this->TestUnit->FormValue)) {
                $this->TestUnit->addErrorMessage(str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
            }
        }
        if ($this->LOWHIGH->Required) {
            if (!$this->LOWHIGH->IsDetailKey && EmptyValue($this->LOWHIGH->FormValue)) {
                $this->LOWHIGH->addErrorMessage(str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
            }
        }
        if ($this->Branch->Required) {
            if (!$this->Branch->IsDetailKey && EmptyValue($this->Branch->FormValue)) {
                $this->Branch->addErrorMessage(str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
            }
        }
        if ($this->Dispatch->Required) {
            if (!$this->Dispatch->IsDetailKey && EmptyValue($this->Dispatch->FormValue)) {
                $this->Dispatch->addErrorMessage(str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
            }
        }
        if ($this->Pic1->Required) {
            if (!$this->Pic1->IsDetailKey && EmptyValue($this->Pic1->FormValue)) {
                $this->Pic1->addErrorMessage(str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
            }
        }
        if ($this->Pic2->Required) {
            if (!$this->Pic2->IsDetailKey && EmptyValue($this->Pic2->FormValue)) {
                $this->Pic2->addErrorMessage(str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
            }
        }
        if ($this->GraphPath->Required) {
            if (!$this->GraphPath->IsDetailKey && EmptyValue($this->GraphPath->FormValue)) {
                $this->GraphPath->addErrorMessage(str_replace("%s", $this->GraphPath->caption(), $this->GraphPath->RequiredErrorMessage));
            }
        }
        if ($this->MachineCD->Required) {
            if (!$this->MachineCD->IsDetailKey && EmptyValue($this->MachineCD->FormValue)) {
                $this->MachineCD->addErrorMessage(str_replace("%s", $this->MachineCD->caption(), $this->MachineCD->RequiredErrorMessage));
            }
        }
        if ($this->TestCancel->Required) {
            if (!$this->TestCancel->IsDetailKey && EmptyValue($this->TestCancel->FormValue)) {
                $this->TestCancel->addErrorMessage(str_replace("%s", $this->TestCancel->caption(), $this->TestCancel->RequiredErrorMessage));
            }
        }
        if ($this->OutSource->Required) {
            if (!$this->OutSource->IsDetailKey && EmptyValue($this->OutSource->FormValue)) {
                $this->OutSource->addErrorMessage(str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
            }
        }
        if ($this->Printed->Required) {
            if (!$this->Printed->IsDetailKey && EmptyValue($this->Printed->FormValue)) {
                $this->Printed->addErrorMessage(str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
            }
        }
        if ($this->PrintBy->Required) {
            if (!$this->PrintBy->IsDetailKey && EmptyValue($this->PrintBy->FormValue)) {
                $this->PrintBy->addErrorMessage(str_replace("%s", $this->PrintBy->caption(), $this->PrintBy->RequiredErrorMessage));
            }
        }
        if ($this->PrintDate->Required) {
            if (!$this->PrintDate->IsDetailKey && EmptyValue($this->PrintDate->FormValue)) {
                $this->PrintDate->addErrorMessage(str_replace("%s", $this->PrintDate->caption(), $this->PrintDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->PrintDate->FormValue)) {
            $this->PrintDate->addErrorMessage($this->PrintDate->getErrorMessage(false));
        }
        if ($this->BillingDate->Required) {
            if (!$this->BillingDate->IsDetailKey && EmptyValue($this->BillingDate->FormValue)) {
                $this->BillingDate->addErrorMessage(str_replace("%s", $this->BillingDate->caption(), $this->BillingDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillingDate->FormValue)) {
            $this->BillingDate->addErrorMessage($this->BillingDate->getErrorMessage(false));
        }
        if ($this->BilledBy->Required) {
            if (!$this->BilledBy->IsDetailKey && EmptyValue($this->BilledBy->FormValue)) {
                $this->BilledBy->addErrorMessage(str_replace("%s", $this->BilledBy->caption(), $this->BilledBy->RequiredErrorMessage));
            }
        }
        if ($this->Resulted->Required) {
            if (!$this->Resulted->IsDetailKey && EmptyValue($this->Resulted->FormValue)) {
                $this->Resulted->addErrorMessage(str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
            }
        }
        if ($this->ResultDate->Required) {
            if (!$this->ResultDate->IsDetailKey && EmptyValue($this->ResultDate->FormValue)) {
                $this->ResultDate->addErrorMessage(str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultDate->FormValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if ($this->ResultedBy->Required) {
            if (!$this->ResultedBy->IsDetailKey && EmptyValue($this->ResultedBy->FormValue)) {
                $this->ResultedBy->addErrorMessage(str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
            }
        }
        if ($this->SampleDate->Required) {
            if (!$this->SampleDate->IsDetailKey && EmptyValue($this->SampleDate->FormValue)) {
                $this->SampleDate->addErrorMessage(str_replace("%s", $this->SampleDate->caption(), $this->SampleDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SampleDate->FormValue)) {
            $this->SampleDate->addErrorMessage($this->SampleDate->getErrorMessage(false));
        }
        if ($this->SampleUser->Required) {
            if (!$this->SampleUser->IsDetailKey && EmptyValue($this->SampleUser->FormValue)) {
                $this->SampleUser->addErrorMessage(str_replace("%s", $this->SampleUser->caption(), $this->SampleUser->RequiredErrorMessage));
            }
        }
        if ($this->Sampled->Required) {
            if (!$this->Sampled->IsDetailKey && EmptyValue($this->Sampled->FormValue)) {
                $this->Sampled->addErrorMessage(str_replace("%s", $this->Sampled->caption(), $this->Sampled->RequiredErrorMessage));
            }
        }
        if ($this->ReceivedDate->Required) {
            if (!$this->ReceivedDate->IsDetailKey && EmptyValue($this->ReceivedDate->FormValue)) {
                $this->ReceivedDate->addErrorMessage(str_replace("%s", $this->ReceivedDate->caption(), $this->ReceivedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ReceivedDate->FormValue)) {
            $this->ReceivedDate->addErrorMessage($this->ReceivedDate->getErrorMessage(false));
        }
        if ($this->ReceivedUser->Required) {
            if (!$this->ReceivedUser->IsDetailKey && EmptyValue($this->ReceivedUser->FormValue)) {
                $this->ReceivedUser->addErrorMessage(str_replace("%s", $this->ReceivedUser->caption(), $this->ReceivedUser->RequiredErrorMessage));
            }
        }
        if ($this->Recevied->Required) {
            if (!$this->Recevied->IsDetailKey && EmptyValue($this->Recevied->FormValue)) {
                $this->Recevied->addErrorMessage(str_replace("%s", $this->Recevied->caption(), $this->Recevied->RequiredErrorMessage));
            }
        }
        if ($this->DeptRecvDate->Required) {
            if (!$this->DeptRecvDate->IsDetailKey && EmptyValue($this->DeptRecvDate->FormValue)) {
                $this->DeptRecvDate->addErrorMessage(str_replace("%s", $this->DeptRecvDate->caption(), $this->DeptRecvDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DeptRecvDate->FormValue)) {
            $this->DeptRecvDate->addErrorMessage($this->DeptRecvDate->getErrorMessage(false));
        }
        if ($this->DeptRecvUser->Required) {
            if (!$this->DeptRecvUser->IsDetailKey && EmptyValue($this->DeptRecvUser->FormValue)) {
                $this->DeptRecvUser->addErrorMessage(str_replace("%s", $this->DeptRecvUser->caption(), $this->DeptRecvUser->RequiredErrorMessage));
            }
        }
        if ($this->DeptRecived->Required) {
            if (!$this->DeptRecived->IsDetailKey && EmptyValue($this->DeptRecived->FormValue)) {
                $this->DeptRecived->addErrorMessage(str_replace("%s", $this->DeptRecived->caption(), $this->DeptRecived->RequiredErrorMessage));
            }
        }
        if ($this->SAuthDate->Required) {
            if (!$this->SAuthDate->IsDetailKey && EmptyValue($this->SAuthDate->FormValue)) {
                $this->SAuthDate->addErrorMessage(str_replace("%s", $this->SAuthDate->caption(), $this->SAuthDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SAuthDate->FormValue)) {
            $this->SAuthDate->addErrorMessage($this->SAuthDate->getErrorMessage(false));
        }
        if ($this->SAuthBy->Required) {
            if (!$this->SAuthBy->IsDetailKey && EmptyValue($this->SAuthBy->FormValue)) {
                $this->SAuthBy->addErrorMessage(str_replace("%s", $this->SAuthBy->caption(), $this->SAuthBy->RequiredErrorMessage));
            }
        }
        if ($this->SAuthendicate->Required) {
            if (!$this->SAuthendicate->IsDetailKey && EmptyValue($this->SAuthendicate->FormValue)) {
                $this->SAuthendicate->addErrorMessage(str_replace("%s", $this->SAuthendicate->caption(), $this->SAuthendicate->RequiredErrorMessage));
            }
        }
        if ($this->AuthDate->Required) {
            if (!$this->AuthDate->IsDetailKey && EmptyValue($this->AuthDate->FormValue)) {
                $this->AuthDate->addErrorMessage(str_replace("%s", $this->AuthDate->caption(), $this->AuthDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->AuthDate->FormValue)) {
            $this->AuthDate->addErrorMessage($this->AuthDate->getErrorMessage(false));
        }
        if ($this->AuthBy->Required) {
            if (!$this->AuthBy->IsDetailKey && EmptyValue($this->AuthBy->FormValue)) {
                $this->AuthBy->addErrorMessage(str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
            }
        }
        if ($this->Authencate->Required) {
            if (!$this->Authencate->IsDetailKey && EmptyValue($this->Authencate->FormValue)) {
                $this->Authencate->addErrorMessage(str_replace("%s", $this->Authencate->caption(), $this->Authencate->RequiredErrorMessage));
            }
        }
        if ($this->EditDate->Required) {
            if (!$this->EditDate->IsDetailKey && EmptyValue($this->EditDate->FormValue)) {
                $this->EditDate->addErrorMessage(str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EditDate->FormValue)) {
            $this->EditDate->addErrorMessage($this->EditDate->getErrorMessage(false));
        }
        if ($this->EditBy->Required) {
            if (!$this->EditBy->IsDetailKey && EmptyValue($this->EditBy->FormValue)) {
                $this->EditBy->addErrorMessage(str_replace("%s", $this->EditBy->caption(), $this->EditBy->RequiredErrorMessage));
            }
        }
        if ($this->Editted->Required) {
            if (!$this->Editted->IsDetailKey && EmptyValue($this->Editted->FormValue)) {
                $this->Editted->addErrorMessage(str_replace("%s", $this->Editted->caption(), $this->Editted->RequiredErrorMessage));
            }
        }
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatID->FormValue)) {
            $this->PatID->addErrorMessage($this->PatID->getErrorMessage(false));
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->Mobile->Required) {
            if (!$this->Mobile->IsDetailKey && EmptyValue($this->Mobile->FormValue)) {
                $this->Mobile->addErrorMessage(str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
            }
        }
        if ($this->CId->Required) {
            if (!$this->CId->IsDetailKey && EmptyValue($this->CId->FormValue)) {
                $this->CId->addErrorMessage(str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CId->FormValue)) {
            $this->CId->addErrorMessage($this->CId->getErrorMessage(false));
        }
        if ($this->Order->Required) {
            if (!$this->Order->IsDetailKey && EmptyValue($this->Order->FormValue)) {
                $this->Order->addErrorMessage(str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Order->FormValue)) {
            $this->Order->addErrorMessage($this->Order->getErrorMessage(false));
        }
        if ($this->Form->Required) {
            if (!$this->Form->IsDetailKey && EmptyValue($this->Form->FormValue)) {
                $this->Form->addErrorMessage(str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
            }
        }
        if ($this->ResType->Required) {
            if (!$this->ResType->IsDetailKey && EmptyValue($this->ResType->FormValue)) {
                $this->ResType->addErrorMessage(str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
            }
        }
        if ($this->Sample->Required) {
            if (!$this->Sample->IsDetailKey && EmptyValue($this->Sample->FormValue)) {
                $this->Sample->addErrorMessage(str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
            }
        }
        if ($this->NoD->Required) {
            if (!$this->NoD->IsDetailKey && EmptyValue($this->NoD->FormValue)) {
                $this->NoD->addErrorMessage(str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NoD->FormValue)) {
            $this->NoD->addErrorMessage($this->NoD->getErrorMessage(false));
        }
        if ($this->BillOrder->Required) {
            if (!$this->BillOrder->IsDetailKey && EmptyValue($this->BillOrder->FormValue)) {
                $this->BillOrder->addErrorMessage(str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillOrder->FormValue)) {
            $this->BillOrder->addErrorMessage($this->BillOrder->getErrorMessage(false));
        }
        if ($this->Formula->Required) {
            if (!$this->Formula->IsDetailKey && EmptyValue($this->Formula->FormValue)) {
                $this->Formula->addErrorMessage(str_replace("%s", $this->Formula->caption(), $this->Formula->RequiredErrorMessage));
            }
        }
        if ($this->Inactive->Required) {
            if (!$this->Inactive->IsDetailKey && EmptyValue($this->Inactive->FormValue)) {
                $this->Inactive->addErrorMessage(str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
            }
        }
        if ($this->CollSample->Required) {
            if (!$this->CollSample->IsDetailKey && EmptyValue($this->CollSample->FormValue)) {
                $this->CollSample->addErrorMessage(str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
            }
        }
        if ($this->TestType->Required) {
            if (!$this->TestType->IsDetailKey && EmptyValue($this->TestType->FormValue)) {
                $this->TestType->addErrorMessage(str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
            }
        }
        if ($this->Repeated->Required) {
            if (!$this->Repeated->IsDetailKey && EmptyValue($this->Repeated->FormValue)) {
                $this->Repeated->addErrorMessage(str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
            }
        }
        if ($this->RepeatedBy->Required) {
            if (!$this->RepeatedBy->IsDetailKey && EmptyValue($this->RepeatedBy->FormValue)) {
                $this->RepeatedBy->addErrorMessage(str_replace("%s", $this->RepeatedBy->caption(), $this->RepeatedBy->RequiredErrorMessage));
            }
        }
        if ($this->RepeatedDate->Required) {
            if (!$this->RepeatedDate->IsDetailKey && EmptyValue($this->RepeatedDate->FormValue)) {
                $this->RepeatedDate->addErrorMessage(str_replace("%s", $this->RepeatedDate->caption(), $this->RepeatedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->RepeatedDate->FormValue)) {
            $this->RepeatedDate->addErrorMessage($this->RepeatedDate->getErrorMessage(false));
        }
        if ($this->serviceID->Required) {
            if (!$this->serviceID->IsDetailKey && EmptyValue($this->serviceID->FormValue)) {
                $this->serviceID->addErrorMessage(str_replace("%s", $this->serviceID->caption(), $this->serviceID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->serviceID->FormValue)) {
            $this->serviceID->addErrorMessage($this->serviceID->getErrorMessage(false));
        }
        if ($this->Service_Type->Required) {
            if (!$this->Service_Type->IsDetailKey && EmptyValue($this->Service_Type->FormValue)) {
                $this->Service_Type->addErrorMessage(str_replace("%s", $this->Service_Type->caption(), $this->Service_Type->RequiredErrorMessage));
            }
        }
        if ($this->Service_Department->Required) {
            if (!$this->Service_Department->IsDetailKey && EmptyValue($this->Service_Department->FormValue)) {
                $this->Service_Department->addErrorMessage(str_replace("%s", $this->Service_Department->caption(), $this->Service_Department->RequiredErrorMessage));
            }
        }
        if ($this->RequestNo->Required) {
            if (!$this->RequestNo->IsDetailKey && EmptyValue($this->RequestNo->FormValue)) {
                $this->RequestNo->addErrorMessage(str_replace("%s", $this->RequestNo->caption(), $this->RequestNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RequestNo->FormValue)) {
            $this->RequestNo->addErrorMessage($this->RequestNo->getErrorMessage(false));
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
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // Services
            $this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", $this->Services->ReadOnly);

            // amount
            $this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, $this->amount->ReadOnly);

            // description
            $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, $this->description->ReadOnly);

            // patient_type
            $this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, null, $this->patient_type->ReadOnly);

            // charged_date
            $this->charged_date->CurrentValue = CurrentDate();
            $this->charged_date->setDbValueDef($rsnew, $this->charged_date->CurrentValue, null);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // Unit
            $this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, null, $this->Unit->ReadOnly);

            // Quantity
            $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, $this->Quantity->ReadOnly);

            // Discount
            $this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, null, $this->Discount->ReadOnly);

            // SubTotal
            $this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, null, $this->SubTotal->ReadOnly);

            // ServiceSelect
            $this->ServiceSelect->setDbValueDef($rsnew, $this->ServiceSelect->CurrentValue, "", $this->ServiceSelect->ReadOnly);

            // Aid
            $this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, null, $this->Aid->ReadOnly);

            // Vid
            if ($this->Vid->getSessionValue() != "") {
                $this->Vid->ReadOnly = true;
            }
            $this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, null, $this->Vid->ReadOnly);

            // DrID
            $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, $this->DrID->ReadOnly);

            // DrCODE
            $this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, null, $this->DrCODE->ReadOnly);

            // DrName
            $this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, null, $this->DrName->ReadOnly);

            // Department
            $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, $this->Department->ReadOnly);

            // DrSharePres
            $this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, null, $this->DrSharePres->ReadOnly);

            // HospSharePres
            $this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, null, $this->HospSharePres->ReadOnly);

            // DrShareAmount
            $this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, null, $this->DrShareAmount->ReadOnly);

            // HospShareAmount
            $this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, null, $this->HospShareAmount->ReadOnly);

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, null, $this->DrShareSettiledAmount->ReadOnly);

            // DrShareSettledId
            $this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, null, $this->DrShareSettledId->ReadOnly);

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, null, $this->DrShareSettiledStatus->ReadOnly);

            // invoiceId
            $this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, null, $this->invoiceId->ReadOnly);

            // invoiceAmount
            $this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, null, $this->invoiceAmount->ReadOnly);

            // invoiceStatus
            $this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, null, $this->invoiceStatus->ReadOnly);

            // modeOfPayment
            $this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, null, $this->modeOfPayment->ReadOnly);

            // DiscountCategory
            $this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, null, $this->DiscountCategory->ReadOnly);

            // sid
            $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, $this->sid->ReadOnly);

            // ItemCode
            $this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, null, $this->ItemCode->ReadOnly);

            // TestSubCd
            $this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, null, $this->TestSubCd->ReadOnly);

            // DEptCd
            $this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, null, $this->DEptCd->ReadOnly);

            // ProfCd
            $this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, null, $this->ProfCd->ReadOnly);

            // LabReport
            $this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, null, $this->LabReport->ReadOnly);

            // Comments
            $this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, null, $this->Comments->ReadOnly);

            // Method
            $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, $this->Method->ReadOnly);

            // Specimen
            $this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, null, $this->Specimen->ReadOnly);

            // Abnormal
            $this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, null, $this->Abnormal->ReadOnly);

            // RefValue
            $this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, null, $this->RefValue->ReadOnly);

            // TestUnit
            $this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, null, $this->TestUnit->ReadOnly);

            // LOWHIGH
            $this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, null, $this->LOWHIGH->ReadOnly);

            // Branch
            $this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, null, $this->Branch->ReadOnly);

            // Dispatch
            $this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, null, $this->Dispatch->ReadOnly);

            // Pic1
            $this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, null, $this->Pic1->ReadOnly);

            // Pic2
            $this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, null, $this->Pic2->ReadOnly);

            // GraphPath
            $this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, null, $this->GraphPath->ReadOnly);

            // MachineCD
            $this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, null, $this->MachineCD->ReadOnly);

            // TestCancel
            $this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, null, $this->TestCancel->ReadOnly);

            // OutSource
            $this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, null, $this->OutSource->ReadOnly);

            // Printed
            $this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, null, $this->Printed->ReadOnly);

            // PrintBy
            $this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, null, $this->PrintBy->ReadOnly);

            // PrintDate
            $this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), null, $this->PrintDate->ReadOnly);

            // BillingDate
            $this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), null, $this->BillingDate->ReadOnly);

            // BilledBy
            $this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, null, $this->BilledBy->ReadOnly);

            // Resulted
            $this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, null, $this->Resulted->ReadOnly);

            // ResultDate
            $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, $this->ResultDate->ReadOnly);

            // ResultedBy
            $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null, $this->ResultedBy->ReadOnly);

            // SampleDate
            $this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), null, $this->SampleDate->ReadOnly);

            // SampleUser
            $this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, null, $this->SampleUser->ReadOnly);

            // Sampled
            $this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, null, $this->Sampled->ReadOnly);

            // ReceivedDate
            $this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), null, $this->ReceivedDate->ReadOnly);

            // ReceivedUser
            $this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, null, $this->ReceivedUser->ReadOnly);

            // Recevied
            $this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, null, $this->Recevied->ReadOnly);

            // DeptRecvDate
            $this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), null, $this->DeptRecvDate->ReadOnly);

            // DeptRecvUser
            $this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, null, $this->DeptRecvUser->ReadOnly);

            // DeptRecived
            $this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, null, $this->DeptRecived->ReadOnly);

            // SAuthDate
            $this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), null, $this->SAuthDate->ReadOnly);

            // SAuthBy
            $this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, null, $this->SAuthBy->ReadOnly);

            // SAuthendicate
            $this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, null, $this->SAuthendicate->ReadOnly);

            // AuthDate
            $this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), null, $this->AuthDate->ReadOnly);

            // AuthBy
            $this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, null, $this->AuthBy->ReadOnly);

            // Authencate
            $this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, null, $this->Authencate->ReadOnly);

            // EditDate
            $this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), null, $this->EditDate->ReadOnly);

            // EditBy
            $this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, null, $this->EditBy->ReadOnly);

            // Editted
            $this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, null, $this->Editted->ReadOnly);

            // PatID
            if ($this->PatID->getSessionValue() != "") {
                $this->PatID->ReadOnly = true;
            }
            $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, $this->PatID->ReadOnly);

            // PatientId
            $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, $this->PatientId->ReadOnly);

            // Mobile
            $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, $this->Mobile->ReadOnly);

            // CId
            $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, $this->CId->ReadOnly);

            // Order
            $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, null, $this->Order->ReadOnly);

            // Form
            $this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, null, $this->Form->ReadOnly);

            // ResType
            $this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, null, $this->ResType->ReadOnly);

            // Sample
            $this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, null, $this->Sample->ReadOnly);

            // NoD
            $this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, null, $this->NoD->ReadOnly);

            // BillOrder
            $this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, null, $this->BillOrder->ReadOnly);

            // Formula
            $this->Formula->setDbValueDef($rsnew, $this->Formula->CurrentValue, null, $this->Formula->ReadOnly);

            // Inactive
            $this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, null, $this->Inactive->ReadOnly);

            // CollSample
            $this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, null, $this->CollSample->ReadOnly);

            // TestType
            $this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, null, $this->TestType->ReadOnly);

            // Repeated
            $this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, null, $this->Repeated->ReadOnly);

            // RepeatedBy
            $this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, null, $this->RepeatedBy->ReadOnly);

            // RepeatedDate
            $this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), null, $this->RepeatedDate->ReadOnly);

            // serviceID
            $this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, null, $this->serviceID->ReadOnly);

            // Service_Type
            $this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, null, $this->Service_Type->ReadOnly);

            // Service_Department
            $this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, null, $this->Service_Department->ReadOnly);

            // RequestNo
            $this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, null, $this->RequestNo->ReadOnly);

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

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "billing_voucher") {
                $validMaster = true;
                $masterTbl = Container("billing_voucher");
                if (($parm = Get("fk_id", Get("Vid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Vid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Vid->setSessionValue($this->Vid->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Get("fk_id", Get("Reception"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Reception->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Reception->setSessionValue($this->Reception->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setQueryStringValue($parm);
                    $this->mrnno->setQueryStringValue($masterTbl->mrnNo->QueryStringValue);
                    $this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_patient_id", Get("PatID"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PatID->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PatID->setSessionValue($this->PatID->QueryStringValue);
                    if (!is_numeric($masterTbl->patient_id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "billing_voucher") {
                $validMaster = true;
                $masterTbl = Container("billing_voucher");
                if (($parm = Post("fk_id", Post("Vid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Vid->setFormValue($masterTbl->id->FormValue);
                    $this->Vid->setSessionValue($this->Vid->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Post("fk_id", Post("Reception"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Reception->setFormValue($masterTbl->id->FormValue);
                    $this->Reception->setSessionValue($this->Reception->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setFormValue($parm);
                    $this->mrnno->setFormValue($masterTbl->mrnNo->FormValue);
                    $this->mrnno->setSessionValue($this->mrnno->FormValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_patient_id", Post("PatID"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PatID->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PatID->setSessionValue($this->PatID->FormValue);
                    if (!is_numeric($masterTbl->patient_id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);
            $this->setSessionWhere($this->getDetailFilter());

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "billing_voucher") {
                if ($this->Vid->CurrentValue == "") {
                    $this->Vid->setSessionValue("");
                }
            }
            if ($masterTblVar != "ip_admission") {
                if ($this->Reception->CurrentValue == "") {
                    $this->Reception->setSessionValue("");
                }
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
                }
                if ($this->PatID->CurrentValue == "") {
                    $this->PatID->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientServicesList"), "", $this->TableVar, true);
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
                case "x_Services":
                    $lookupFilter = function () {
                        return "`Inactive` != 'Y'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_status":
                    break;
                case "x_ServiceSelect":
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
