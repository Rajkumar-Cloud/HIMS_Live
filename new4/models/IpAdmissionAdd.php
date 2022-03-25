<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IpAdmissionAdd extends IpAdmission
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ip_admission';

    // Page object name
    public $PageObjName = "IpAdmissionAdd";

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

        // Table object (ip_admission)
        if (!isset($GLOBALS["ip_admission"]) || get_class($GLOBALS["ip_admission"]) == PROJECT_NAMESPACE . "ip_admission") {
            $GLOBALS["ip_admission"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ip_admission');
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
                $doc = new $class(Container("ip_admission"));
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
                    if ($pageName == "IpAdmissionView") {
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
        $this->mrnNo->setVisibility();
        $this->PatientID->setVisibility();
        $this->patient_name->setVisibility();
        $this->mobileno->setVisibility();
        $this->gender->setVisibility();
        $this->age->setVisibility();
        $this->typeRegsisteration->setVisibility();
        $this->PaymentCategory->setVisibility();
        $this->physician_id->setVisibility();
        $this->admission_consultant_id->setVisibility();
        $this->leading_consultant_id->setVisibility();
        $this->cause->setVisibility();
        $this->admission_date->setVisibility();
        $this->release_date->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->profilePic->setVisibility();
        $this->HospID->setVisibility();
        $this->DOB->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->BillClosing->setVisibility();
        $this->BillClosingDate->setVisibility();
        $this->BillNumber->setVisibility();
        $this->ClosingAmount->setVisibility();
        $this->ClosingType->setVisibility();
        $this->BillAmount->setVisibility();
        $this->billclosedBy->setVisibility();
        $this->bllcloseByDate->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->Procedure->setVisibility();
        $this->Consultant->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->Amound->setVisibility();
        $this->Package->setVisibility();
        $this->patient_id->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->Cid->setVisibility();
        $this->PartId->setVisibility();
        $this->IDProof->setVisibility();
        $this->AdviceToOtherHospital->setVisibility();
        $this->Reason->setVisibility();
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
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->typeRegsisteration);
        $this->setupLookupOptions($this->PaymentCategory);
        $this->setupLookupOptions($this->physician_id);
        $this->setupLookupOptions($this->admission_consultant_id);
        $this->setupLookupOptions($this->leading_consultant_id);
        $this->setupLookupOptions($this->PaymentStatus);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->HospID);
        $this->setupLookupOptions($this->ReferedByDr);
        $this->setupLookupOptions($this->ReferA4TreatingConsultant);
        $this->setupLookupOptions($this->patient_id);

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
                    $this->terminate("IpAdmissionList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IpAdmissionList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IpAdmissionView") {
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
        $this->mrnNo->CurrentValue = null;
        $this->mrnNo->OldValue = $this->mrnNo->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->patient_name->CurrentValue = null;
        $this->patient_name->OldValue = $this->patient_name->CurrentValue;
        $this->mobileno->CurrentValue = null;
        $this->mobileno->OldValue = $this->mobileno->CurrentValue;
        $this->gender->CurrentValue = null;
        $this->gender->OldValue = $this->gender->CurrentValue;
        $this->age->CurrentValue = null;
        $this->age->OldValue = $this->age->CurrentValue;
        $this->typeRegsisteration->CurrentValue = null;
        $this->typeRegsisteration->OldValue = $this->typeRegsisteration->CurrentValue;
        $this->PaymentCategory->CurrentValue = null;
        $this->PaymentCategory->OldValue = $this->PaymentCategory->CurrentValue;
        $this->physician_id->CurrentValue = null;
        $this->physician_id->OldValue = $this->physician_id->CurrentValue;
        $this->admission_consultant_id->CurrentValue = null;
        $this->admission_consultant_id->OldValue = $this->admission_consultant_id->CurrentValue;
        $this->leading_consultant_id->CurrentValue = null;
        $this->leading_consultant_id->OldValue = $this->leading_consultant_id->CurrentValue;
        $this->cause->CurrentValue = null;
        $this->cause->OldValue = $this->cause->CurrentValue;
        $this->admission_date->CurrentValue = null;
        $this->admission_date->OldValue = $this->admission_date->CurrentValue;
        $this->release_date->CurrentValue = null;
        $this->release_date->OldValue = $this->release_date->CurrentValue;
        $this->PaymentStatus->CurrentValue = null;
        $this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->DOB->CurrentValue = null;
        $this->DOB->OldValue = $this->DOB->CurrentValue;
        $this->ReferedByDr->CurrentValue = null;
        $this->ReferedByDr->OldValue = $this->ReferedByDr->CurrentValue;
        $this->ReferClinicname->CurrentValue = null;
        $this->ReferClinicname->OldValue = $this->ReferClinicname->CurrentValue;
        $this->ReferCity->CurrentValue = null;
        $this->ReferCity->OldValue = $this->ReferCity->CurrentValue;
        $this->ReferMobileNo->CurrentValue = null;
        $this->ReferMobileNo->OldValue = $this->ReferMobileNo->CurrentValue;
        $this->ReferA4TreatingConsultant->CurrentValue = null;
        $this->ReferA4TreatingConsultant->OldValue = $this->ReferA4TreatingConsultant->CurrentValue;
        $this->PurposreReferredfor->CurrentValue = null;
        $this->PurposreReferredfor->OldValue = $this->PurposreReferredfor->CurrentValue;
        $this->BillClosing->CurrentValue = null;
        $this->BillClosing->OldValue = $this->BillClosing->CurrentValue;
        $this->BillClosingDate->CurrentValue = null;
        $this->BillClosingDate->OldValue = $this->BillClosingDate->CurrentValue;
        $this->BillNumber->CurrentValue = null;
        $this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
        $this->ClosingAmount->CurrentValue = null;
        $this->ClosingAmount->OldValue = $this->ClosingAmount->CurrentValue;
        $this->ClosingType->CurrentValue = null;
        $this->ClosingType->OldValue = $this->ClosingType->CurrentValue;
        $this->BillAmount->CurrentValue = null;
        $this->BillAmount->OldValue = $this->BillAmount->CurrentValue;
        $this->billclosedBy->CurrentValue = null;
        $this->billclosedBy->OldValue = $this->billclosedBy->CurrentValue;
        $this->bllcloseByDate->CurrentValue = null;
        $this->bllcloseByDate->OldValue = $this->bllcloseByDate->CurrentValue;
        $this->ReportHeader->CurrentValue = null;
        $this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
        $this->Procedure->CurrentValue = null;
        $this->Procedure->OldValue = $this->Procedure->CurrentValue;
        $this->Consultant->CurrentValue = null;
        $this->Consultant->OldValue = $this->Consultant->CurrentValue;
        $this->Anesthetist->CurrentValue = null;
        $this->Anesthetist->OldValue = $this->Anesthetist->CurrentValue;
        $this->Amound->CurrentValue = null;
        $this->Amound->OldValue = $this->Amound->CurrentValue;
        $this->Package->CurrentValue = null;
        $this->Package->OldValue = $this->Package->CurrentValue;
        $this->patient_id->CurrentValue = null;
        $this->patient_id->OldValue = $this->patient_id->CurrentValue;
        $this->PartnerID->CurrentValue = null;
        $this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
        $this->PartnerName->CurrentValue = null;
        $this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
        $this->PartnerMobile->CurrentValue = null;
        $this->PartnerMobile->OldValue = $this->PartnerMobile->CurrentValue;
        $this->Cid->CurrentValue = null;
        $this->Cid->OldValue = $this->Cid->CurrentValue;
        $this->PartId->CurrentValue = null;
        $this->PartId->OldValue = $this->PartId->CurrentValue;
        $this->IDProof->CurrentValue = null;
        $this->IDProof->OldValue = $this->IDProof->CurrentValue;
        $this->AdviceToOtherHospital->CurrentValue = null;
        $this->AdviceToOtherHospital->OldValue = $this->AdviceToOtherHospital->CurrentValue;
        $this->Reason->CurrentValue = null;
        $this->Reason->OldValue = $this->Reason->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'mrnNo' first before field var 'x_mrnNo'
        $val = $CurrentForm->hasValue("mrnNo") ? $CurrentForm->getValue("mrnNo") : $CurrentForm->getValue("x_mrnNo");
        if (!$this->mrnNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnNo->Visible = false; // Disable update for API request
            } else {
                $this->mrnNo->setFormValue($val);
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

        // Check field name 'patient_name' first before field var 'x_patient_name'
        $val = $CurrentForm->hasValue("patient_name") ? $CurrentForm->getValue("patient_name") : $CurrentForm->getValue("x_patient_name");
        if (!$this->patient_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_name->Visible = false; // Disable update for API request
            } else {
                $this->patient_name->setFormValue($val);
            }
        }

        // Check field name 'mobileno' first before field var 'x_mobileno'
        $val = $CurrentForm->hasValue("mobileno") ? $CurrentForm->getValue("mobileno") : $CurrentForm->getValue("x_mobileno");
        if (!$this->mobileno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobileno->Visible = false; // Disable update for API request
            } else {
                $this->mobileno->setFormValue($val);
            }
        }

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }

        // Check field name 'age' first before field var 'x_age'
        $val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
        if (!$this->age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->age->Visible = false; // Disable update for API request
            } else {
                $this->age->setFormValue($val);
            }
        }

        // Check field name 'typeRegsisteration' first before field var 'x_typeRegsisteration'
        $val = $CurrentForm->hasValue("typeRegsisteration") ? $CurrentForm->getValue("typeRegsisteration") : $CurrentForm->getValue("x_typeRegsisteration");
        if (!$this->typeRegsisteration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->typeRegsisteration->Visible = false; // Disable update for API request
            } else {
                $this->typeRegsisteration->setFormValue($val);
            }
        }

        // Check field name 'PaymentCategory' first before field var 'x_PaymentCategory'
        $val = $CurrentForm->hasValue("PaymentCategory") ? $CurrentForm->getValue("PaymentCategory") : $CurrentForm->getValue("x_PaymentCategory");
        if (!$this->PaymentCategory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentCategory->Visible = false; // Disable update for API request
            } else {
                $this->PaymentCategory->setFormValue($val);
            }
        }

        // Check field name 'physician_id' first before field var 'x_physician_id'
        $val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
        if (!$this->physician_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->physician_id->Visible = false; // Disable update for API request
            } else {
                $this->physician_id->setFormValue($val);
            }
        }

        // Check field name 'admission_consultant_id' first before field var 'x_admission_consultant_id'
        $val = $CurrentForm->hasValue("admission_consultant_id") ? $CurrentForm->getValue("admission_consultant_id") : $CurrentForm->getValue("x_admission_consultant_id");
        if (!$this->admission_consultant_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->admission_consultant_id->Visible = false; // Disable update for API request
            } else {
                $this->admission_consultant_id->setFormValue($val);
            }
        }

        // Check field name 'leading_consultant_id' first before field var 'x_leading_consultant_id'
        $val = $CurrentForm->hasValue("leading_consultant_id") ? $CurrentForm->getValue("leading_consultant_id") : $CurrentForm->getValue("x_leading_consultant_id");
        if (!$this->leading_consultant_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leading_consultant_id->Visible = false; // Disable update for API request
            } else {
                $this->leading_consultant_id->setFormValue($val);
            }
        }

        // Check field name 'cause' first before field var 'x_cause'
        $val = $CurrentForm->hasValue("cause") ? $CurrentForm->getValue("cause") : $CurrentForm->getValue("x_cause");
        if (!$this->cause->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->cause->Visible = false; // Disable update for API request
            } else {
                $this->cause->setFormValue($val);
            }
        }

        // Check field name 'admission_date' first before field var 'x_admission_date'
        $val = $CurrentForm->hasValue("admission_date") ? $CurrentForm->getValue("admission_date") : $CurrentForm->getValue("x_admission_date");
        if (!$this->admission_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->admission_date->Visible = false; // Disable update for API request
            } else {
                $this->admission_date->setFormValue($val);
            }
            $this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 11);
        }

        // Check field name 'release_date' first before field var 'x_release_date'
        $val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
        if (!$this->release_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->release_date->Visible = false; // Disable update for API request
            } else {
                $this->release_date->setFormValue($val);
            }
            $this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 17);
        }

        // Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
        $val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
        if (!$this->PaymentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentStatus->Visible = false; // Disable update for API request
            } else {
                $this->PaymentStatus->setFormValue($val);
            }
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

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
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

        // Check field name 'DOB' first before field var 'x_DOB'
        $val = $CurrentForm->hasValue("DOB") ? $CurrentForm->getValue("DOB") : $CurrentForm->getValue("x_DOB");
        if (!$this->DOB->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DOB->Visible = false; // Disable update for API request
            } else {
                $this->DOB->setFormValue($val);
            }
        }

        // Check field name 'ReferedByDr' first before field var 'x_ReferedByDr'
        $val = $CurrentForm->hasValue("ReferedByDr") ? $CurrentForm->getValue("ReferedByDr") : $CurrentForm->getValue("x_ReferedByDr");
        if (!$this->ReferedByDr->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferedByDr->Visible = false; // Disable update for API request
            } else {
                $this->ReferedByDr->setFormValue($val);
            }
        }

        // Check field name 'ReferClinicname' first before field var 'x_ReferClinicname'
        $val = $CurrentForm->hasValue("ReferClinicname") ? $CurrentForm->getValue("ReferClinicname") : $CurrentForm->getValue("x_ReferClinicname");
        if (!$this->ReferClinicname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferClinicname->Visible = false; // Disable update for API request
            } else {
                $this->ReferClinicname->setFormValue($val);
            }
        }

        // Check field name 'ReferCity' first before field var 'x_ReferCity'
        $val = $CurrentForm->hasValue("ReferCity") ? $CurrentForm->getValue("ReferCity") : $CurrentForm->getValue("x_ReferCity");
        if (!$this->ReferCity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferCity->Visible = false; // Disable update for API request
            } else {
                $this->ReferCity->setFormValue($val);
            }
        }

        // Check field name 'ReferMobileNo' first before field var 'x_ReferMobileNo'
        $val = $CurrentForm->hasValue("ReferMobileNo") ? $CurrentForm->getValue("ReferMobileNo") : $CurrentForm->getValue("x_ReferMobileNo");
        if (!$this->ReferMobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferMobileNo->Visible = false; // Disable update for API request
            } else {
                $this->ReferMobileNo->setFormValue($val);
            }
        }

        // Check field name 'ReferA4TreatingConsultant' first before field var 'x_ReferA4TreatingConsultant'
        $val = $CurrentForm->hasValue("ReferA4TreatingConsultant") ? $CurrentForm->getValue("ReferA4TreatingConsultant") : $CurrentForm->getValue("x_ReferA4TreatingConsultant");
        if (!$this->ReferA4TreatingConsultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferA4TreatingConsultant->Visible = false; // Disable update for API request
            } else {
                $this->ReferA4TreatingConsultant->setFormValue($val);
            }
        }

        // Check field name 'PurposreReferredfor' first before field var 'x_PurposreReferredfor'
        $val = $CurrentForm->hasValue("PurposreReferredfor") ? $CurrentForm->getValue("PurposreReferredfor") : $CurrentForm->getValue("x_PurposreReferredfor");
        if (!$this->PurposreReferredfor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurposreReferredfor->Visible = false; // Disable update for API request
            } else {
                $this->PurposreReferredfor->setFormValue($val);
            }
        }

        // Check field name 'BillClosing' first before field var 'x_BillClosing'
        $val = $CurrentForm->hasValue("BillClosing") ? $CurrentForm->getValue("BillClosing") : $CurrentForm->getValue("x_BillClosing");
        if (!$this->BillClosing->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillClosing->Visible = false; // Disable update for API request
            } else {
                $this->BillClosing->setFormValue($val);
            }
        }

        // Check field name 'BillClosingDate' first before field var 'x_BillClosingDate'
        $val = $CurrentForm->hasValue("BillClosingDate") ? $CurrentForm->getValue("BillClosingDate") : $CurrentForm->getValue("x_BillClosingDate");
        if (!$this->BillClosingDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillClosingDate->Visible = false; // Disable update for API request
            } else {
                $this->BillClosingDate->setFormValue($val);
            }
            $this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 0);
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

        // Check field name 'ClosingAmount' first before field var 'x_ClosingAmount'
        $val = $CurrentForm->hasValue("ClosingAmount") ? $CurrentForm->getValue("ClosingAmount") : $CurrentForm->getValue("x_ClosingAmount");
        if (!$this->ClosingAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClosingAmount->Visible = false; // Disable update for API request
            } else {
                $this->ClosingAmount->setFormValue($val);
            }
        }

        // Check field name 'ClosingType' first before field var 'x_ClosingType'
        $val = $CurrentForm->hasValue("ClosingType") ? $CurrentForm->getValue("ClosingType") : $CurrentForm->getValue("x_ClosingType");
        if (!$this->ClosingType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClosingType->Visible = false; // Disable update for API request
            } else {
                $this->ClosingType->setFormValue($val);
            }
        }

        // Check field name 'BillAmount' first before field var 'x_BillAmount'
        $val = $CurrentForm->hasValue("BillAmount") ? $CurrentForm->getValue("BillAmount") : $CurrentForm->getValue("x_BillAmount");
        if (!$this->BillAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillAmount->Visible = false; // Disable update for API request
            } else {
                $this->BillAmount->setFormValue($val);
            }
        }

        // Check field name 'billclosedBy' first before field var 'x_billclosedBy'
        $val = $CurrentForm->hasValue("billclosedBy") ? $CurrentForm->getValue("billclosedBy") : $CurrentForm->getValue("x_billclosedBy");
        if (!$this->billclosedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->billclosedBy->Visible = false; // Disable update for API request
            } else {
                $this->billclosedBy->setFormValue($val);
            }
        }

        // Check field name 'bllcloseByDate' first before field var 'x_bllcloseByDate'
        $val = $CurrentForm->hasValue("bllcloseByDate") ? $CurrentForm->getValue("bllcloseByDate") : $CurrentForm->getValue("x_bllcloseByDate");
        if (!$this->bllcloseByDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bllcloseByDate->Visible = false; // Disable update for API request
            } else {
                $this->bllcloseByDate->setFormValue($val);
            }
            $this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
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

        // Check field name 'Procedure' first before field var 'x_Procedure'
        $val = $CurrentForm->hasValue("Procedure") ? $CurrentForm->getValue("Procedure") : $CurrentForm->getValue("x_Procedure");
        if (!$this->Procedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Procedure->Visible = false; // Disable update for API request
            } else {
                $this->Procedure->setFormValue($val);
            }
        }

        // Check field name 'Consultant' first before field var 'x_Consultant'
        $val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
        if (!$this->Consultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Consultant->Visible = false; // Disable update for API request
            } else {
                $this->Consultant->setFormValue($val);
            }
        }

        // Check field name 'Anesthetist' first before field var 'x_Anesthetist'
        $val = $CurrentForm->hasValue("Anesthetist") ? $CurrentForm->getValue("Anesthetist") : $CurrentForm->getValue("x_Anesthetist");
        if (!$this->Anesthetist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anesthetist->Visible = false; // Disable update for API request
            } else {
                $this->Anesthetist->setFormValue($val);
            }
        }

        // Check field name 'Amound' first before field var 'x_Amound'
        $val = $CurrentForm->hasValue("Amound") ? $CurrentForm->getValue("Amound") : $CurrentForm->getValue("x_Amound");
        if (!$this->Amound->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amound->Visible = false; // Disable update for API request
            } else {
                $this->Amound->setFormValue($val);
            }
        }

        // Check field name 'Package' first before field var 'x_Package'
        $val = $CurrentForm->hasValue("Package") ? $CurrentForm->getValue("Package") : $CurrentForm->getValue("x_Package");
        if (!$this->Package->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Package->Visible = false; // Disable update for API request
            } else {
                $this->Package->setFormValue($val);
            }
        }

        // Check field name 'patient_id' first before field var 'x_patient_id'
        $val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
        if (!$this->patient_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_id->Visible = false; // Disable update for API request
            } else {
                $this->patient_id->setFormValue($val);
            }
        }

        // Check field name 'PartnerID' first before field var 'x_PartnerID'
        $val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
        if (!$this->PartnerID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerID->Visible = false; // Disable update for API request
            } else {
                $this->PartnerID->setFormValue($val);
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

        // Check field name 'PartnerMobile' first before field var 'x_PartnerMobile'
        $val = $CurrentForm->hasValue("PartnerMobile") ? $CurrentForm->getValue("PartnerMobile") : $CurrentForm->getValue("x_PartnerMobile");
        if (!$this->PartnerMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerMobile->Visible = false; // Disable update for API request
            } else {
                $this->PartnerMobile->setFormValue($val);
            }
        }

        // Check field name 'Cid' first before field var 'x_Cid'
        $val = $CurrentForm->hasValue("Cid") ? $CurrentForm->getValue("Cid") : $CurrentForm->getValue("x_Cid");
        if (!$this->Cid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cid->Visible = false; // Disable update for API request
            } else {
                $this->Cid->setFormValue($val);
            }
        }

        // Check field name 'PartId' first before field var 'x_PartId'
        $val = $CurrentForm->hasValue("PartId") ? $CurrentForm->getValue("PartId") : $CurrentForm->getValue("x_PartId");
        if (!$this->PartId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartId->Visible = false; // Disable update for API request
            } else {
                $this->PartId->setFormValue($val);
            }
        }

        // Check field name 'IDProof' first before field var 'x_IDProof'
        $val = $CurrentForm->hasValue("IDProof") ? $CurrentForm->getValue("IDProof") : $CurrentForm->getValue("x_IDProof");
        if (!$this->IDProof->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IDProof->Visible = false; // Disable update for API request
            } else {
                $this->IDProof->setFormValue($val);
            }
        }

        // Check field name 'AdviceToOtherHospital' first before field var 'x_AdviceToOtherHospital'
        $val = $CurrentForm->hasValue("AdviceToOtherHospital") ? $CurrentForm->getValue("AdviceToOtherHospital") : $CurrentForm->getValue("x_AdviceToOtherHospital");
        if (!$this->AdviceToOtherHospital->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdviceToOtherHospital->Visible = false; // Disable update for API request
            } else {
                $this->AdviceToOtherHospital->setFormValue($val);
            }
        }

        // Check field name 'Reason' first before field var 'x_Reason'
        $val = $CurrentForm->hasValue("Reason") ? $CurrentForm->getValue("Reason") : $CurrentForm->getValue("x_Reason");
        if (!$this->Reason->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reason->Visible = false; // Disable update for API request
            } else {
                $this->Reason->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->patient_name->CurrentValue = $this->patient_name->FormValue;
        $this->mobileno->CurrentValue = $this->mobileno->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->age->CurrentValue = $this->age->FormValue;
        $this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
        $this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
        $this->physician_id->CurrentValue = $this->physician_id->FormValue;
        $this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
        $this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
        $this->cause->CurrentValue = $this->cause->FormValue;
        $this->admission_date->CurrentValue = $this->admission_date->FormValue;
        $this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 11);
        $this->release_date->CurrentValue = $this->release_date->FormValue;
        $this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 17);
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->DOB->CurrentValue = $this->DOB->FormValue;
        $this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
        $this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
        $this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
        $this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
        $this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
        $this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
        $this->BillClosing->CurrentValue = $this->BillClosing->FormValue;
        $this->BillClosingDate->CurrentValue = $this->BillClosingDate->FormValue;
        $this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 0);
        $this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
        $this->ClosingAmount->CurrentValue = $this->ClosingAmount->FormValue;
        $this->ClosingType->CurrentValue = $this->ClosingType->FormValue;
        $this->BillAmount->CurrentValue = $this->BillAmount->FormValue;
        $this->billclosedBy->CurrentValue = $this->billclosedBy->FormValue;
        $this->bllcloseByDate->CurrentValue = $this->bllcloseByDate->FormValue;
        $this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
        $this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
        $this->Procedure->CurrentValue = $this->Procedure->FormValue;
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
        $this->Amound->CurrentValue = $this->Amound->FormValue;
        $this->Package->CurrentValue = $this->Package->FormValue;
        $this->patient_id->CurrentValue = $this->patient_id->FormValue;
        $this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
        $this->Cid->CurrentValue = $this->Cid->FormValue;
        $this->PartId->CurrentValue = $this->PartId->FormValue;
        $this->IDProof->CurrentValue = $this->IDProof->FormValue;
        $this->AdviceToOtherHospital->CurrentValue = $this->AdviceToOtherHospital->FormValue;
        $this->Reason->CurrentValue = $this->Reason->FormValue;
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
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->mobileno->setDbValue($row['mobileno']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->HospID->setDbValue($row['HospID']);
        $this->DOB->setDbValue($row['DOB']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        if (array_key_exists('EV__ReferedByDr', $row)) {
            $this->ReferedByDr->VirtualValue = $row['EV__ReferedByDr']; // Set up virtual field value
        } else {
            $this->ReferedByDr->VirtualValue = ""; // Clear value
        }
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        if (array_key_exists('EV__ReferA4TreatingConsultant', $row)) {
            $this->ReferA4TreatingConsultant->VirtualValue = $row['EV__ReferA4TreatingConsultant']; // Set up virtual field value
        } else {
            $this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
        }
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->BillClosing->setDbValue($row['BillClosing']);
        $this->BillClosingDate->setDbValue($row['BillClosingDate']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->ClosingAmount->setDbValue($row['ClosingAmount']);
        $this->ClosingType->setDbValue($row['ClosingType']);
        $this->BillAmount->setDbValue($row['BillAmount']);
        $this->billclosedBy->setDbValue($row['billclosedBy']);
        $this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->Amound->setDbValue($row['Amound']);
        $this->Package->setDbValue($row['Package']);
        $this->patient_id->setDbValue($row['patient_id']);
        if (array_key_exists('EV__patient_id', $row)) {
            $this->patient_id->VirtualValue = $row['EV__patient_id']; // Set up virtual field value
        } else {
            $this->patient_id->VirtualValue = ""; // Clear value
        }
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->Cid->setDbValue($row['Cid']);
        $this->PartId->setDbValue($row['PartId']);
        $this->IDProof->setDbValue($row['IDProof']);
        $this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
        $this->Reason->setDbValue($row['Reason']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['mrnNo'] = $this->mrnNo->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['patient_name'] = $this->patient_name->CurrentValue;
        $row['mobileno'] = $this->mobileno->CurrentValue;
        $row['gender'] = $this->gender->CurrentValue;
        $row['age'] = $this->age->CurrentValue;
        $row['typeRegsisteration'] = $this->typeRegsisteration->CurrentValue;
        $row['PaymentCategory'] = $this->PaymentCategory->CurrentValue;
        $row['physician_id'] = $this->physician_id->CurrentValue;
        $row['admission_consultant_id'] = $this->admission_consultant_id->CurrentValue;
        $row['leading_consultant_id'] = $this->leading_consultant_id->CurrentValue;
        $row['cause'] = $this->cause->CurrentValue;
        $row['admission_date'] = $this->admission_date->CurrentValue;
        $row['release_date'] = $this->release_date->CurrentValue;
        $row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['DOB'] = $this->DOB->CurrentValue;
        $row['ReferedByDr'] = $this->ReferedByDr->CurrentValue;
        $row['ReferClinicname'] = $this->ReferClinicname->CurrentValue;
        $row['ReferCity'] = $this->ReferCity->CurrentValue;
        $row['ReferMobileNo'] = $this->ReferMobileNo->CurrentValue;
        $row['ReferA4TreatingConsultant'] = $this->ReferA4TreatingConsultant->CurrentValue;
        $row['PurposreReferredfor'] = $this->PurposreReferredfor->CurrentValue;
        $row['BillClosing'] = $this->BillClosing->CurrentValue;
        $row['BillClosingDate'] = $this->BillClosingDate->CurrentValue;
        $row['BillNumber'] = $this->BillNumber->CurrentValue;
        $row['ClosingAmount'] = $this->ClosingAmount->CurrentValue;
        $row['ClosingType'] = $this->ClosingType->CurrentValue;
        $row['BillAmount'] = $this->BillAmount->CurrentValue;
        $row['billclosedBy'] = $this->billclosedBy->CurrentValue;
        $row['bllcloseByDate'] = $this->bllcloseByDate->CurrentValue;
        $row['ReportHeader'] = $this->ReportHeader->CurrentValue;
        $row['Procedure'] = $this->Procedure->CurrentValue;
        $row['Consultant'] = $this->Consultant->CurrentValue;
        $row['Anesthetist'] = $this->Anesthetist->CurrentValue;
        $row['Amound'] = $this->Amound->CurrentValue;
        $row['Package'] = $this->Package->CurrentValue;
        $row['patient_id'] = $this->patient_id->CurrentValue;
        $row['PartnerID'] = $this->PartnerID->CurrentValue;
        $row['PartnerName'] = $this->PartnerName->CurrentValue;
        $row['PartnerMobile'] = $this->PartnerMobile->CurrentValue;
        $row['Cid'] = $this->Cid->CurrentValue;
        $row['PartId'] = $this->PartId->CurrentValue;
        $row['IDProof'] = $this->IDProof->CurrentValue;
        $row['AdviceToOtherHospital'] = $this->AdviceToOtherHospital->CurrentValue;
        $row['Reason'] = $this->Reason->CurrentValue;
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
        if ($this->Amound->FormValue == $this->Amound->CurrentValue && is_numeric(ConvertToFloatString($this->Amound->CurrentValue))) {
            $this->Amound->CurrentValue = ConvertToFloatString($this->Amound->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // mrnNo

        // PatientID

        // patient_name

        // mobileno

        // gender

        // age

        // typeRegsisteration

        // PaymentCategory

        // physician_id

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // profilePic

        // HospID

        // DOB

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // BillClosing

        // BillClosingDate

        // BillNumber

        // ClosingAmount

        // ClosingType

        // BillAmount

        // billclosedBy

        // bllcloseByDate

        // ReportHeader

        // Procedure

        // Consultant

        // Anesthetist

        // Amound

        // Package

        // patient_id

        // PartnerID

        // PartnerName

        // PartnerMobile

        // Cid

        // PartId

        // IDProof

        // AdviceToOtherHospital

        // Reason
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
            $this->mrnNo->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // patient_name
            $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
            $this->patient_name->ViewCustomAttributes = "";

            // mobileno
            $this->mobileno->ViewValue = $this->mobileno->CurrentValue;
            $this->mobileno->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->ViewValue = $this->gender->CurrentValue;
                    }
                }
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewCustomAttributes = "";

            // typeRegsisteration
            $curVal = trim(strval($this->typeRegsisteration->CurrentValue));
            if ($curVal != "") {
                $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
                if ($this->typeRegsisteration->ViewValue === null) { // Lookup from database
                    $filterWrk = "`RegsistrationType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->typeRegsisteration->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->typeRegsisteration->Lookup->renderViewRow($rswrk[0]);
                        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->displayValue($arwrk);
                    } else {
                        $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
                    }
                }
            } else {
                $this->typeRegsisteration->ViewValue = null;
            }
            $this->typeRegsisteration->ViewCustomAttributes = "";

            // PaymentCategory
            $curVal = trim(strval($this->PaymentCategory->CurrentValue));
            if ($curVal != "") {
                $this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
                if ($this->PaymentCategory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Category`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PaymentCategory->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PaymentCategory->Lookup->renderViewRow($rswrk[0]);
                        $this->PaymentCategory->ViewValue = $this->PaymentCategory->displayValue($arwrk);
                    } else {
                        $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
                    }
                }
            } else {
                $this->PaymentCategory->ViewValue = null;
            }
            $this->PaymentCategory->ViewCustomAttributes = "";

            // physician_id
            $curVal = trim(strval($this->physician_id->CurrentValue));
            if ($curVal != "") {
                $this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
                if ($this->physician_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->physician_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->physician_id->Lookup->renderViewRow($rswrk[0]);
                        $this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
                    } else {
                        $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
                    }
                }
            } else {
                $this->physician_id->ViewValue = null;
            }
            $this->physician_id->ViewCustomAttributes = "";

            // admission_consultant_id
            $curVal = trim(strval($this->admission_consultant_id->CurrentValue));
            if ($curVal != "") {
                $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
                if ($this->admission_consultant_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->admission_consultant_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->admission_consultant_id->Lookup->renderViewRow($rswrk[0]);
                        $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->displayValue($arwrk);
                    } else {
                        $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
                    }
                }
            } else {
                $this->admission_consultant_id->ViewValue = null;
            }
            $this->admission_consultant_id->ViewCustomAttributes = "";

            // leading_consultant_id
            $curVal = trim(strval($this->leading_consultant_id->CurrentValue));
            if ($curVal != "") {
                $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->lookupCacheOption($curVal);
                if ($this->leading_consultant_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->leading_consultant_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->leading_consultant_id->Lookup->renderViewRow($rswrk[0]);
                        $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->displayValue($arwrk);
                    } else {
                        $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
                    }
                }
            } else {
                $this->leading_consultant_id->ViewValue = null;
            }
            $this->leading_consultant_id->ViewCustomAttributes = "";

            // cause
            $this->cause->ViewValue = $this->cause->CurrentValue;
            $this->cause->ViewCustomAttributes = "";

            // admission_date
            $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
            $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 11);
            $this->admission_date->ViewCustomAttributes = "";

            // release_date
            $this->release_date->ViewValue = $this->release_date->CurrentValue;
            $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 17);
            $this->release_date->ViewCustomAttributes = "";

            // PaymentStatus
            $curVal = trim(strval($this->PaymentStatus->CurrentValue));
            if ($curVal != "") {
                $this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
                if ($this->PaymentStatus->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PaymentStatus->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PaymentStatus->Lookup->renderViewRow($rswrk[0]);
                        $this->PaymentStatus->ViewValue = $this->PaymentStatus->displayValue($arwrk);
                    } else {
                        $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
                    }
                }
            } else {
                $this->PaymentStatus->ViewValue = null;
            }
            $this->PaymentStatus->ViewCustomAttributes = "";

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

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // HospID
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
                if ($this->HospID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                        $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                    } else {
                        $this->HospID->ViewValue = $this->HospID->CurrentValue;
                    }
                }
            } else {
                $this->HospID->ViewValue = null;
            }
            $this->HospID->ViewCustomAttributes = "";

            // DOB
            $this->DOB->ViewValue = $this->DOB->CurrentValue;
            $this->DOB->ViewCustomAttributes = "";

            // ReferedByDr
            if ($this->ReferedByDr->VirtualValue != "") {
                $this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferedByDr->CurrentValue));
                if ($curVal != "") {
                    $this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
                    if ($this->ReferedByDr->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferedByDr->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferedByDr->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
                        } else {
                            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferedByDr->ViewValue = null;
                }
            }
            $this->ReferedByDr->ViewCustomAttributes = "";

            // ReferClinicname
            $this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
            $this->ReferClinicname->ViewCustomAttributes = "";

            // ReferCity
            $this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
            $this->ReferCity->ViewCustomAttributes = "";

            // ReferMobileNo
            $this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
            $this->ReferMobileNo->ViewCustomAttributes = "";

            // ReferA4TreatingConsultant
            if ($this->ReferA4TreatingConsultant->VirtualValue != "") {
                $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
                if ($curVal != "") {
                    $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
                    if ($this->ReferA4TreatingConsultant->ViewValue === null) { // Lookup from database
                        $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferA4TreatingConsultant->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
                        } else {
                            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferA4TreatingConsultant->ViewValue = null;
                }
            }
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // BillClosing
            $this->BillClosing->ViewValue = $this->BillClosing->CurrentValue;
            $this->BillClosing->ViewCustomAttributes = "";

            // BillClosingDate
            $this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
            $this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
            $this->BillClosingDate->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // ClosingAmount
            $this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
            $this->ClosingAmount->ViewCustomAttributes = "";

            // ClosingType
            $this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
            $this->ClosingType->ViewCustomAttributes = "";

            // BillAmount
            $this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
            $this->BillAmount->ViewCustomAttributes = "";

            // billclosedBy
            $this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
            $this->billclosedBy->ViewCustomAttributes = "";

            // bllcloseByDate
            $this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
            $this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
            $this->bllcloseByDate->ViewCustomAttributes = "";

            // ReportHeader
            $this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
            $this->ReportHeader->ViewCustomAttributes = "";

            // Procedure
            $this->Procedure->ViewValue = $this->Procedure->CurrentValue;
            $this->Procedure->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // Anesthetist
            $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
            $this->Anesthetist->ViewCustomAttributes = "";

            // Amound
            $this->Amound->ViewValue = $this->Amound->CurrentValue;
            $this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
            $this->Amound->ViewCustomAttributes = "";

            // Package
            $this->Package->ViewValue = $this->Package->CurrentValue;
            $this->Package->ViewCustomAttributes = "";

            // patient_id
            if ($this->patient_id->VirtualValue != "") {
                $this->patient_id->ViewValue = $this->patient_id->VirtualValue;
            } else {
                $curVal = trim(strval($this->patient_id->CurrentValue));
                if ($curVal != "") {
                    $this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
                    if ($this->patient_id->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->patient_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->patient_id->Lookup->renderViewRow($rswrk[0]);
                            $this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
                        } else {
                            $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
                        }
                    }
                } else {
                    $this->patient_id->ViewValue = null;
                }
            }
            $this->patient_id->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // Cid
            $this->Cid->ViewValue = $this->Cid->CurrentValue;
            $this->Cid->ViewValue = FormatNumber($this->Cid->ViewValue, 0, -2, -2, -2);
            $this->Cid->ViewCustomAttributes = "";

            // PartId
            $this->PartId->ViewValue = $this->PartId->CurrentValue;
            $this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
            $this->PartId->ViewCustomAttributes = "";

            // IDProof
            $this->IDProof->ViewValue = $this->IDProof->CurrentValue;
            $this->IDProof->ViewCustomAttributes = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
            $this->AdviceToOtherHospital->ViewCustomAttributes = "";

            // Reason
            $this->Reason->ViewValue = $this->Reason->CurrentValue;
            $this->Reason->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";
            $this->mrnNo->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";
            $this->patient_name->TooltipValue = "";

            // mobileno
            $this->mobileno->LinkCustomAttributes = "";
            $this->mobileno->HrefValue = "";
            $this->mobileno->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";
            $this->typeRegsisteration->TooltipValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";
            $this->PaymentCategory->TooltipValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";
            $this->physician_id->TooltipValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";
            $this->admission_consultant_id->TooltipValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";
            $this->leading_consultant_id->TooltipValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";
            $this->cause->TooltipValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";
            $this->admission_date->TooltipValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";
            $this->release_date->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // DOB
            $this->DOB->LinkCustomAttributes = "";
            $this->DOB->HrefValue = "";
            $this->DOB->TooltipValue = "";

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";
            $this->ReferedByDr->TooltipValue = "";

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";
            $this->ReferClinicname->TooltipValue = "";

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";
            $this->ReferCity->TooltipValue = "";

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";
            $this->ReferMobileNo->TooltipValue = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";
            $this->ReferA4TreatingConsultant->TooltipValue = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";
            $this->PurposreReferredfor->TooltipValue = "";

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";
            $this->BillClosing->TooltipValue = "";

            // BillClosingDate
            $this->BillClosingDate->LinkCustomAttributes = "";
            $this->BillClosingDate->HrefValue = "";
            $this->BillClosingDate->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // ClosingAmount
            $this->ClosingAmount->LinkCustomAttributes = "";
            $this->ClosingAmount->HrefValue = "";
            $this->ClosingAmount->TooltipValue = "";

            // ClosingType
            $this->ClosingType->LinkCustomAttributes = "";
            $this->ClosingType->HrefValue = "";
            $this->ClosingType->TooltipValue = "";

            // BillAmount
            $this->BillAmount->LinkCustomAttributes = "";
            $this->BillAmount->HrefValue = "";
            $this->BillAmount->TooltipValue = "";

            // billclosedBy
            $this->billclosedBy->LinkCustomAttributes = "";
            $this->billclosedBy->HrefValue = "";
            $this->billclosedBy->TooltipValue = "";

            // bllcloseByDate
            $this->bllcloseByDate->LinkCustomAttributes = "";
            $this->bllcloseByDate->HrefValue = "";
            $this->bllcloseByDate->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";
            $this->Procedure->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // Amound
            $this->Amound->LinkCustomAttributes = "";
            $this->Amound->HrefValue = "";
            $this->Amound->TooltipValue = "";

            // Package
            $this->Package->LinkCustomAttributes = "";
            $this->Package->HrefValue = "";
            $this->Package->TooltipValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";
            $this->patient_id->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // Cid
            $this->Cid->LinkCustomAttributes = "";
            $this->Cid->HrefValue = "";
            $this->Cid->TooltipValue = "";

            // PartId
            $this->PartId->LinkCustomAttributes = "";
            $this->PartId->HrefValue = "";
            $this->PartId->TooltipValue = "";

            // IDProof
            $this->IDProof->LinkCustomAttributes = "";
            $this->IDProof->HrefValue = "";
            $this->IDProof->TooltipValue = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->LinkCustomAttributes = "";
            $this->AdviceToOtherHospital->HrefValue = "";
            $this->AdviceToOtherHospital->TooltipValue = "";

            // Reason
            $this->Reason->LinkCustomAttributes = "";
            $this->Reason->HrefValue = "";
            $this->Reason->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // mrnNo
            $this->mrnNo->EditAttrs["class"] = "form-control";
            $this->mrnNo->EditCustomAttributes = "";
            if (!$this->mrnNo->Raw) {
                $this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
            }
            $this->mrnNo->EditValue = HtmlEncode($this->mrnNo->CurrentValue);
            $this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // patient_name
            $this->patient_name->EditAttrs["class"] = "form-control";
            $this->patient_name->EditCustomAttributes = "";
            if (!$this->patient_name->Raw) {
                $this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
            }
            $this->patient_name->EditValue = HtmlEncode($this->patient_name->CurrentValue);
            $this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

            // mobileno
            $this->mobileno->EditAttrs["class"] = "form-control";
            $this->mobileno->EditCustomAttributes = "";
            if (!$this->mobileno->Raw) {
                $this->mobileno->CurrentValue = HtmlDecode($this->mobileno->CurrentValue);
            }
            $this->mobileno->EditValue = HtmlEncode($this->mobileno->CurrentValue);
            $this->mobileno->PlaceHolder = RemoveHtml($this->mobileno->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->EditValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->EditValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->EditValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
                    }
                }
            } else {
                $this->gender->EditValue = null;
            }
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // age
            $this->age->EditAttrs["class"] = "form-control";
            $this->age->EditCustomAttributes = "";
            if (!$this->age->Raw) {
                $this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
            }
            $this->age->EditValue = HtmlEncode($this->age->CurrentValue);
            $this->age->PlaceHolder = RemoveHtml($this->age->caption());

            // typeRegsisteration
            $this->typeRegsisteration->EditAttrs["class"] = "form-control";
            $this->typeRegsisteration->EditCustomAttributes = "";
            $curVal = trim(strval($this->typeRegsisteration->CurrentValue));
            if ($curVal != "") {
                $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
            } else {
                $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->Lookup !== null && is_array($this->typeRegsisteration->Lookup->Options) ? $curVal : null;
            }
            if ($this->typeRegsisteration->ViewValue !== null) { // Load from cache
                $this->typeRegsisteration->EditValue = array_values($this->typeRegsisteration->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`RegsistrationType`" . SearchString("=", $this->typeRegsisteration->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->typeRegsisteration->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->typeRegsisteration->EditValue = $arwrk;
            }
            $this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

            // PaymentCategory
            $this->PaymentCategory->EditAttrs["class"] = "form-control";
            $this->PaymentCategory->EditCustomAttributes = "";
            $curVal = trim(strval($this->PaymentCategory->CurrentValue));
            if ($curVal != "") {
                $this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
            } else {
                $this->PaymentCategory->ViewValue = $this->PaymentCategory->Lookup !== null && is_array($this->PaymentCategory->Lookup->Options) ? $curVal : null;
            }
            if ($this->PaymentCategory->ViewValue !== null) { // Load from cache
                $this->PaymentCategory->EditValue = array_values($this->PaymentCategory->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Category`" . SearchString("=", $this->PaymentCategory->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PaymentCategory->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PaymentCategory->EditValue = $arwrk;
            }
            $this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

            // physician_id
            $this->physician_id->EditAttrs["class"] = "form-control";
            $this->physician_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->physician_id->CurrentValue));
            if ($curVal != "") {
                $this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
            } else {
                $this->physician_id->ViewValue = $this->physician_id->Lookup !== null && is_array($this->physician_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->physician_id->ViewValue !== null) { // Load from cache
                $this->physician_id->EditValue = array_values($this->physician_id->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->physician_id->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->physician_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->physician_id->EditValue = $arwrk;
            }
            $this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

            // admission_consultant_id
            $this->admission_consultant_id->EditAttrs["class"] = "form-control";
            $this->admission_consultant_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->admission_consultant_id->CurrentValue));
            if ($curVal != "") {
                $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->lookupCacheOption($curVal);
            } else {
                $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->Lookup !== null && is_array($this->admission_consultant_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->admission_consultant_id->ViewValue !== null) { // Load from cache
                $this->admission_consultant_id->EditValue = array_values($this->admission_consultant_id->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->admission_consultant_id->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->admission_consultant_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->admission_consultant_id->EditValue = $arwrk;
            }
            $this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

            // leading_consultant_id
            $this->leading_consultant_id->EditAttrs["class"] = "form-control";
            $this->leading_consultant_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->leading_consultant_id->CurrentValue));
            if ($curVal != "") {
                $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->lookupCacheOption($curVal);
            } else {
                $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->Lookup !== null && is_array($this->leading_consultant_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->leading_consultant_id->ViewValue !== null) { // Load from cache
                $this->leading_consultant_id->EditValue = array_values($this->leading_consultant_id->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->leading_consultant_id->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->leading_consultant_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->leading_consultant_id->EditValue = $arwrk;
            }
            $this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

            // cause
            $this->cause->EditAttrs["class"] = "form-control";
            $this->cause->EditCustomAttributes = "";
            $this->cause->EditValue = HtmlEncode($this->cause->CurrentValue);
            $this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

            // admission_date
            $this->admission_date->EditAttrs["class"] = "form-control";
            $this->admission_date->EditCustomAttributes = "";
            $this->admission_date->EditValue = HtmlEncode(FormatDateTime($this->admission_date->CurrentValue, 11));
            $this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

            // release_date
            $this->release_date->EditAttrs["class"] = "form-control";
            $this->release_date->EditCustomAttributes = "";
            $this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 17));
            $this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            $curVal = trim(strval($this->PaymentStatus->CurrentValue));
            if ($curVal != "") {
                $this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
            } else {
                $this->PaymentStatus->ViewValue = $this->PaymentStatus->Lookup !== null && is_array($this->PaymentStatus->Lookup->Options) ? $curVal : null;
            }
            if ($this->PaymentStatus->ViewValue !== null) { // Load from cache
                $this->PaymentStatus->EditValue = array_values($this->PaymentStatus->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PaymentStatus->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PaymentStatus->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PaymentStatus->EditValue = $arwrk;
            }
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // status

            // createdby

            // createddatetime

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // HospID

            // DOB
            $this->DOB->EditAttrs["class"] = "form-control";
            $this->DOB->EditCustomAttributes = "";
            if (!$this->DOB->Raw) {
                $this->DOB->CurrentValue = HtmlDecode($this->DOB->CurrentValue);
            }
            $this->DOB->EditValue = HtmlEncode($this->DOB->CurrentValue);
            $this->DOB->PlaceHolder = RemoveHtml($this->DOB->caption());

            // ReferedByDr
            $this->ReferedByDr->EditCustomAttributes = "";
            $curVal = trim(strval($this->ReferedByDr->CurrentValue));
            if ($curVal != "") {
                $this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
            } else {
                $this->ReferedByDr->ViewValue = $this->ReferedByDr->Lookup !== null && is_array($this->ReferedByDr->Lookup->Options) ? $curVal : null;
            }
            if ($this->ReferedByDr->ViewValue !== null) { // Load from cache
                $this->ReferedByDr->EditValue = array_values($this->ReferedByDr->Lookup->Options);
                if ($this->ReferedByDr->ViewValue == "") {
                    $this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`reference`" . SearchString("=", $this->ReferedByDr->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ReferedByDr->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ReferedByDr->Lookup->renderViewRow($rswrk[0]);
                    $this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
                } else {
                    $this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->ReferedByDr->EditValue = $arwrk;
            }
            $this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

            // ReferClinicname
            $this->ReferClinicname->EditAttrs["class"] = "form-control";
            $this->ReferClinicname->EditCustomAttributes = "";
            if (!$this->ReferClinicname->Raw) {
                $this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
            }
            $this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->CurrentValue);
            $this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

            // ReferCity
            $this->ReferCity->EditAttrs["class"] = "form-control";
            $this->ReferCity->EditCustomAttributes = "";
            if (!$this->ReferCity->Raw) {
                $this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
            }
            $this->ReferCity->EditValue = HtmlEncode($this->ReferCity->CurrentValue);
            $this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

            // ReferMobileNo
            $this->ReferMobileNo->EditAttrs["class"] = "form-control";
            $this->ReferMobileNo->EditCustomAttributes = "";
            if (!$this->ReferMobileNo->Raw) {
                $this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
            }
            $this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->CurrentValue);
            $this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->EditCustomAttributes = "";
            $curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
            if ($curVal != "") {
                $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
            } else {
                $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->Lookup !== null && is_array($this->ReferA4TreatingConsultant->Lookup->Options) ? $curVal : null;
            }
            if ($this->ReferA4TreatingConsultant->ViewValue !== null) { // Load from cache
                $this->ReferA4TreatingConsultant->EditValue = array_values($this->ReferA4TreatingConsultant->Lookup->Options);
                if ($this->ReferA4TreatingConsultant->ViewValue == "") {
                    $this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->ReferA4TreatingConsultant->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ReferA4TreatingConsultant->Lookup->renderViewRow($rswrk[0]);
                    $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
                } else {
                    $this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->ReferA4TreatingConsultant->EditValue = $arwrk;
            }
            $this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

            // PurposreReferredfor
            $this->PurposreReferredfor->EditAttrs["class"] = "form-control";
            $this->PurposreReferredfor->EditCustomAttributes = "";
            if (!$this->PurposreReferredfor->Raw) {
                $this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
            }
            $this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->CurrentValue);
            $this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

            // BillClosing
            $this->BillClosing->EditAttrs["class"] = "form-control";
            $this->BillClosing->EditCustomAttributes = "";
            if (!$this->BillClosing->Raw) {
                $this->BillClosing->CurrentValue = HtmlDecode($this->BillClosing->CurrentValue);
            }
            $this->BillClosing->EditValue = HtmlEncode($this->BillClosing->CurrentValue);
            $this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

            // BillClosingDate
            $this->BillClosingDate->EditAttrs["class"] = "form-control";
            $this->BillClosingDate->EditCustomAttributes = "";
            $this->BillClosingDate->EditValue = HtmlEncode(FormatDateTime($this->BillClosingDate->CurrentValue, 8));
            $this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // ClosingAmount
            $this->ClosingAmount->EditAttrs["class"] = "form-control";
            $this->ClosingAmount->EditCustomAttributes = "";
            if (!$this->ClosingAmount->Raw) {
                $this->ClosingAmount->CurrentValue = HtmlDecode($this->ClosingAmount->CurrentValue);
            }
            $this->ClosingAmount->EditValue = HtmlEncode($this->ClosingAmount->CurrentValue);
            $this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

            // ClosingType
            $this->ClosingType->EditAttrs["class"] = "form-control";
            $this->ClosingType->EditCustomAttributes = "";
            if (!$this->ClosingType->Raw) {
                $this->ClosingType->CurrentValue = HtmlDecode($this->ClosingType->CurrentValue);
            }
            $this->ClosingType->EditValue = HtmlEncode($this->ClosingType->CurrentValue);
            $this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

            // BillAmount
            $this->BillAmount->EditAttrs["class"] = "form-control";
            $this->BillAmount->EditCustomAttributes = "";
            if (!$this->BillAmount->Raw) {
                $this->BillAmount->CurrentValue = HtmlDecode($this->BillAmount->CurrentValue);
            }
            $this->BillAmount->EditValue = HtmlEncode($this->BillAmount->CurrentValue);
            $this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

            // billclosedBy
            $this->billclosedBy->EditAttrs["class"] = "form-control";
            $this->billclosedBy->EditCustomAttributes = "";
            if (!$this->billclosedBy->Raw) {
                $this->billclosedBy->CurrentValue = HtmlDecode($this->billclosedBy->CurrentValue);
            }
            $this->billclosedBy->EditValue = HtmlEncode($this->billclosedBy->CurrentValue);
            $this->billclosedBy->PlaceHolder = RemoveHtml($this->billclosedBy->caption());

            // bllcloseByDate
            $this->bllcloseByDate->EditAttrs["class"] = "form-control";
            $this->bllcloseByDate->EditCustomAttributes = "";
            $this->bllcloseByDate->EditValue = HtmlEncode(FormatDateTime($this->bllcloseByDate->CurrentValue, 8));
            $this->bllcloseByDate->PlaceHolder = RemoveHtml($this->bllcloseByDate->caption());

            // ReportHeader
            $this->ReportHeader->EditAttrs["class"] = "form-control";
            $this->ReportHeader->EditCustomAttributes = "";
            if (!$this->ReportHeader->Raw) {
                $this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
            }
            $this->ReportHeader->EditValue = HtmlEncode($this->ReportHeader->CurrentValue);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // Procedure
            $this->Procedure->EditAttrs["class"] = "form-control";
            $this->Procedure->EditCustomAttributes = "";
            if (!$this->Procedure->Raw) {
                $this->Procedure->CurrentValue = HtmlDecode($this->Procedure->CurrentValue);
            }
            $this->Procedure->EditValue = HtmlEncode($this->Procedure->CurrentValue);
            $this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // Anesthetist
            $this->Anesthetist->EditAttrs["class"] = "form-control";
            $this->Anesthetist->EditCustomAttributes = "";
            if (!$this->Anesthetist->Raw) {
                $this->Anesthetist->CurrentValue = HtmlDecode($this->Anesthetist->CurrentValue);
            }
            $this->Anesthetist->EditValue = HtmlEncode($this->Anesthetist->CurrentValue);
            $this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

            // Amound
            $this->Amound->EditAttrs["class"] = "form-control";
            $this->Amound->EditCustomAttributes = "";
            $this->Amound->EditValue = HtmlEncode($this->Amound->CurrentValue);
            $this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());
            if (strval($this->Amound->EditValue) != "" && is_numeric($this->Amound->EditValue)) {
                $this->Amound->EditValue = FormatNumber($this->Amound->EditValue, -2, -2, -2, -2);
            }

            // Package
            $this->Package->EditAttrs["class"] = "form-control";
            $this->Package->EditCustomAttributes = "";
            if (!$this->Package->Raw) {
                $this->Package->CurrentValue = HtmlDecode($this->Package->CurrentValue);
            }
            $this->Package->EditValue = HtmlEncode($this->Package->CurrentValue);
            $this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

            // patient_id
            $this->patient_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->patient_id->CurrentValue));
            if ($curVal != "") {
                $this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
            } else {
                $this->patient_id->ViewValue = $this->patient_id->Lookup !== null && is_array($this->patient_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->patient_id->ViewValue !== null) { // Load from cache
                $this->patient_id->EditValue = array_values($this->patient_id->Lookup->Options);
                if ($this->patient_id->ViewValue == "") {
                    $this->patient_id->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->patient_id->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->patient_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->patient_id->Lookup->renderViewRow($rswrk[0]);
                    $this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
                } else {
                    $this->patient_id->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->patient_id->EditValue = $arwrk;
            }
            $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->CurrentValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // Cid
            $this->Cid->EditAttrs["class"] = "form-control";
            $this->Cid->EditCustomAttributes = "";
            $this->Cid->EditValue = HtmlEncode($this->Cid->CurrentValue);
            $this->Cid->PlaceHolder = RemoveHtml($this->Cid->caption());

            // PartId
            $this->PartId->EditAttrs["class"] = "form-control";
            $this->PartId->EditCustomAttributes = "";
            $this->PartId->EditValue = HtmlEncode($this->PartId->CurrentValue);
            $this->PartId->PlaceHolder = RemoveHtml($this->PartId->caption());

            // IDProof
            $this->IDProof->EditAttrs["class"] = "form-control";
            $this->IDProof->EditCustomAttributes = "";
            if (!$this->IDProof->Raw) {
                $this->IDProof->CurrentValue = HtmlDecode($this->IDProof->CurrentValue);
            }
            $this->IDProof->EditValue = HtmlEncode($this->IDProof->CurrentValue);
            $this->IDProof->PlaceHolder = RemoveHtml($this->IDProof->caption());

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
            $this->AdviceToOtherHospital->EditCustomAttributes = "";
            if (!$this->AdviceToOtherHospital->Raw) {
                $this->AdviceToOtherHospital->CurrentValue = HtmlDecode($this->AdviceToOtherHospital->CurrentValue);
            }
            $this->AdviceToOtherHospital->EditValue = HtmlEncode($this->AdviceToOtherHospital->CurrentValue);
            $this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

            // Reason
            $this->Reason->EditAttrs["class"] = "form-control";
            $this->Reason->EditCustomAttributes = "";
            $this->Reason->EditValue = HtmlEncode($this->Reason->CurrentValue);
            $this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

            // Add refer script

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";

            // mobileno
            $this->mobileno->LinkCustomAttributes = "";
            $this->mobileno->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // DOB
            $this->DOB->LinkCustomAttributes = "";
            $this->DOB->HrefValue = "";

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";

            // BillClosingDate
            $this->BillClosingDate->LinkCustomAttributes = "";
            $this->BillClosingDate->HrefValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";

            // ClosingAmount
            $this->ClosingAmount->LinkCustomAttributes = "";
            $this->ClosingAmount->HrefValue = "";

            // ClosingType
            $this->ClosingType->LinkCustomAttributes = "";
            $this->ClosingType->HrefValue = "";

            // BillAmount
            $this->BillAmount->LinkCustomAttributes = "";
            $this->BillAmount->HrefValue = "";

            // billclosedBy
            $this->billclosedBy->LinkCustomAttributes = "";
            $this->billclosedBy->HrefValue = "";

            // bllcloseByDate
            $this->bllcloseByDate->LinkCustomAttributes = "";
            $this->bllcloseByDate->HrefValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";

            // Amound
            $this->Amound->LinkCustomAttributes = "";
            $this->Amound->HrefValue = "";

            // Package
            $this->Package->LinkCustomAttributes = "";
            $this->Package->HrefValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";

            // Cid
            $this->Cid->LinkCustomAttributes = "";
            $this->Cid->HrefValue = "";

            // PartId
            $this->PartId->LinkCustomAttributes = "";
            $this->PartId->HrefValue = "";

            // IDProof
            $this->IDProof->LinkCustomAttributes = "";
            $this->IDProof->HrefValue = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->LinkCustomAttributes = "";
            $this->AdviceToOtherHospital->HrefValue = "";

            // Reason
            $this->Reason->LinkCustomAttributes = "";
            $this->Reason->HrefValue = "";
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
        if ($this->mrnNo->Required) {
            if (!$this->mrnNo->IsDetailKey && EmptyValue($this->mrnNo->FormValue)) {
                $this->mrnNo->addErrorMessage(str_replace("%s", $this->mrnNo->caption(), $this->mrnNo->RequiredErrorMessage));
            }
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->patient_name->Required) {
            if (!$this->patient_name->IsDetailKey && EmptyValue($this->patient_name->FormValue)) {
                $this->patient_name->addErrorMessage(str_replace("%s", $this->patient_name->caption(), $this->patient_name->RequiredErrorMessage));
            }
        }
        if ($this->mobileno->Required) {
            if (!$this->mobileno->IsDetailKey && EmptyValue($this->mobileno->FormValue)) {
                $this->mobileno->addErrorMessage(str_replace("%s", $this->mobileno->caption(), $this->mobileno->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->age->Required) {
            if (!$this->age->IsDetailKey && EmptyValue($this->age->FormValue)) {
                $this->age->addErrorMessage(str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
            }
        }
        if ($this->typeRegsisteration->Required) {
            if (!$this->typeRegsisteration->IsDetailKey && EmptyValue($this->typeRegsisteration->FormValue)) {
                $this->typeRegsisteration->addErrorMessage(str_replace("%s", $this->typeRegsisteration->caption(), $this->typeRegsisteration->RequiredErrorMessage));
            }
        }
        if ($this->PaymentCategory->Required) {
            if (!$this->PaymentCategory->IsDetailKey && EmptyValue($this->PaymentCategory->FormValue)) {
                $this->PaymentCategory->addErrorMessage(str_replace("%s", $this->PaymentCategory->caption(), $this->PaymentCategory->RequiredErrorMessage));
            }
        }
        if ($this->physician_id->Required) {
            if (!$this->physician_id->IsDetailKey && EmptyValue($this->physician_id->FormValue)) {
                $this->physician_id->addErrorMessage(str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
            }
        }
        if ($this->admission_consultant_id->Required) {
            if (!$this->admission_consultant_id->IsDetailKey && EmptyValue($this->admission_consultant_id->FormValue)) {
                $this->admission_consultant_id->addErrorMessage(str_replace("%s", $this->admission_consultant_id->caption(), $this->admission_consultant_id->RequiredErrorMessage));
            }
        }
        if ($this->leading_consultant_id->Required) {
            if (!$this->leading_consultant_id->IsDetailKey && EmptyValue($this->leading_consultant_id->FormValue)) {
                $this->leading_consultant_id->addErrorMessage(str_replace("%s", $this->leading_consultant_id->caption(), $this->leading_consultant_id->RequiredErrorMessage));
            }
        }
        if ($this->cause->Required) {
            if (!$this->cause->IsDetailKey && EmptyValue($this->cause->FormValue)) {
                $this->cause->addErrorMessage(str_replace("%s", $this->cause->caption(), $this->cause->RequiredErrorMessage));
            }
        }
        if ($this->admission_date->Required) {
            if (!$this->admission_date->IsDetailKey && EmptyValue($this->admission_date->FormValue)) {
                $this->admission_date->addErrorMessage(str_replace("%s", $this->admission_date->caption(), $this->admission_date->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->admission_date->FormValue)) {
            $this->admission_date->addErrorMessage($this->admission_date->getErrorMessage(false));
        }
        if ($this->release_date->Required) {
            if (!$this->release_date->IsDetailKey && EmptyValue($this->release_date->FormValue)) {
                $this->release_date->addErrorMessage(str_replace("%s", $this->release_date->caption(), $this->release_date->RequiredErrorMessage));
            }
        }
        if (!CheckShortEuroDate($this->release_date->FormValue)) {
            $this->release_date->addErrorMessage($this->release_date->getErrorMessage(false));
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->DOB->Required) {
            if (!$this->DOB->IsDetailKey && EmptyValue($this->DOB->FormValue)) {
                $this->DOB->addErrorMessage(str_replace("%s", $this->DOB->caption(), $this->DOB->RequiredErrorMessage));
            }
        }
        if ($this->ReferedByDr->Required) {
            if (!$this->ReferedByDr->IsDetailKey && EmptyValue($this->ReferedByDr->FormValue)) {
                $this->ReferedByDr->addErrorMessage(str_replace("%s", $this->ReferedByDr->caption(), $this->ReferedByDr->RequiredErrorMessage));
            }
        }
        if ($this->ReferClinicname->Required) {
            if (!$this->ReferClinicname->IsDetailKey && EmptyValue($this->ReferClinicname->FormValue)) {
                $this->ReferClinicname->addErrorMessage(str_replace("%s", $this->ReferClinicname->caption(), $this->ReferClinicname->RequiredErrorMessage));
            }
        }
        if ($this->ReferCity->Required) {
            if (!$this->ReferCity->IsDetailKey && EmptyValue($this->ReferCity->FormValue)) {
                $this->ReferCity->addErrorMessage(str_replace("%s", $this->ReferCity->caption(), $this->ReferCity->RequiredErrorMessage));
            }
        }
        if ($this->ReferMobileNo->Required) {
            if (!$this->ReferMobileNo->IsDetailKey && EmptyValue($this->ReferMobileNo->FormValue)) {
                $this->ReferMobileNo->addErrorMessage(str_replace("%s", $this->ReferMobileNo->caption(), $this->ReferMobileNo->RequiredErrorMessage));
            }
        }
        if ($this->ReferA4TreatingConsultant->Required) {
            if (!$this->ReferA4TreatingConsultant->IsDetailKey && EmptyValue($this->ReferA4TreatingConsultant->FormValue)) {
                $this->ReferA4TreatingConsultant->addErrorMessage(str_replace("%s", $this->ReferA4TreatingConsultant->caption(), $this->ReferA4TreatingConsultant->RequiredErrorMessage));
            }
        }
        if ($this->PurposreReferredfor->Required) {
            if (!$this->PurposreReferredfor->IsDetailKey && EmptyValue($this->PurposreReferredfor->FormValue)) {
                $this->PurposreReferredfor->addErrorMessage(str_replace("%s", $this->PurposreReferredfor->caption(), $this->PurposreReferredfor->RequiredErrorMessage));
            }
        }
        if ($this->BillClosing->Required) {
            if (!$this->BillClosing->IsDetailKey && EmptyValue($this->BillClosing->FormValue)) {
                $this->BillClosing->addErrorMessage(str_replace("%s", $this->BillClosing->caption(), $this->BillClosing->RequiredErrorMessage));
            }
        }
        if ($this->BillClosingDate->Required) {
            if (!$this->BillClosingDate->IsDetailKey && EmptyValue($this->BillClosingDate->FormValue)) {
                $this->BillClosingDate->addErrorMessage(str_replace("%s", $this->BillClosingDate->caption(), $this->BillClosingDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillClosingDate->FormValue)) {
            $this->BillClosingDate->addErrorMessage($this->BillClosingDate->getErrorMessage(false));
        }
        if ($this->BillNumber->Required) {
            if (!$this->BillNumber->IsDetailKey && EmptyValue($this->BillNumber->FormValue)) {
                $this->BillNumber->addErrorMessage(str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
            }
        }
        if ($this->ClosingAmount->Required) {
            if (!$this->ClosingAmount->IsDetailKey && EmptyValue($this->ClosingAmount->FormValue)) {
                $this->ClosingAmount->addErrorMessage(str_replace("%s", $this->ClosingAmount->caption(), $this->ClosingAmount->RequiredErrorMessage));
            }
        }
        if ($this->ClosingType->Required) {
            if (!$this->ClosingType->IsDetailKey && EmptyValue($this->ClosingType->FormValue)) {
                $this->ClosingType->addErrorMessage(str_replace("%s", $this->ClosingType->caption(), $this->ClosingType->RequiredErrorMessage));
            }
        }
        if ($this->BillAmount->Required) {
            if (!$this->BillAmount->IsDetailKey && EmptyValue($this->BillAmount->FormValue)) {
                $this->BillAmount->addErrorMessage(str_replace("%s", $this->BillAmount->caption(), $this->BillAmount->RequiredErrorMessage));
            }
        }
        if ($this->billclosedBy->Required) {
            if (!$this->billclosedBy->IsDetailKey && EmptyValue($this->billclosedBy->FormValue)) {
                $this->billclosedBy->addErrorMessage(str_replace("%s", $this->billclosedBy->caption(), $this->billclosedBy->RequiredErrorMessage));
            }
        }
        if ($this->bllcloseByDate->Required) {
            if (!$this->bllcloseByDate->IsDetailKey && EmptyValue($this->bllcloseByDate->FormValue)) {
                $this->bllcloseByDate->addErrorMessage(str_replace("%s", $this->bllcloseByDate->caption(), $this->bllcloseByDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->bllcloseByDate->FormValue)) {
            $this->bllcloseByDate->addErrorMessage($this->bllcloseByDate->getErrorMessage(false));
        }
        if ($this->ReportHeader->Required) {
            if (!$this->ReportHeader->IsDetailKey && EmptyValue($this->ReportHeader->FormValue)) {
                $this->ReportHeader->addErrorMessage(str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
            }
        }
        if ($this->Procedure->Required) {
            if (!$this->Procedure->IsDetailKey && EmptyValue($this->Procedure->FormValue)) {
                $this->Procedure->addErrorMessage(str_replace("%s", $this->Procedure->caption(), $this->Procedure->RequiredErrorMessage));
            }
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->Anesthetist->Required) {
            if (!$this->Anesthetist->IsDetailKey && EmptyValue($this->Anesthetist->FormValue)) {
                $this->Anesthetist->addErrorMessage(str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
            }
        }
        if ($this->Amound->Required) {
            if (!$this->Amound->IsDetailKey && EmptyValue($this->Amound->FormValue)) {
                $this->Amound->addErrorMessage(str_replace("%s", $this->Amound->caption(), $this->Amound->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Amound->FormValue)) {
            $this->Amound->addErrorMessage($this->Amound->getErrorMessage(false));
        }
        if ($this->Package->Required) {
            if (!$this->Package->IsDetailKey && EmptyValue($this->Package->FormValue)) {
                $this->Package->addErrorMessage(str_replace("%s", $this->Package->caption(), $this->Package->RequiredErrorMessage));
            }
        }
        if ($this->patient_id->Required) {
            if (!$this->patient_id->IsDetailKey && EmptyValue($this->patient_id->FormValue)) {
                $this->patient_id->addErrorMessage(str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
            }
        }
        if ($this->PartnerID->Required) {
            if (!$this->PartnerID->IsDetailKey && EmptyValue($this->PartnerID->FormValue)) {
                $this->PartnerID->addErrorMessage(str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->PartnerMobile->Required) {
            if (!$this->PartnerMobile->IsDetailKey && EmptyValue($this->PartnerMobile->FormValue)) {
                $this->PartnerMobile->addErrorMessage(str_replace("%s", $this->PartnerMobile->caption(), $this->PartnerMobile->RequiredErrorMessage));
            }
        }
        if ($this->Cid->Required) {
            if (!$this->Cid->IsDetailKey && EmptyValue($this->Cid->FormValue)) {
                $this->Cid->addErrorMessage(str_replace("%s", $this->Cid->caption(), $this->Cid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Cid->FormValue)) {
            $this->Cid->addErrorMessage($this->Cid->getErrorMessage(false));
        }
        if ($this->PartId->Required) {
            if (!$this->PartId->IsDetailKey && EmptyValue($this->PartId->FormValue)) {
                $this->PartId->addErrorMessage(str_replace("%s", $this->PartId->caption(), $this->PartId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PartId->FormValue)) {
            $this->PartId->addErrorMessage($this->PartId->getErrorMessage(false));
        }
        if ($this->IDProof->Required) {
            if (!$this->IDProof->IsDetailKey && EmptyValue($this->IDProof->FormValue)) {
                $this->IDProof->addErrorMessage(str_replace("%s", $this->IDProof->caption(), $this->IDProof->RequiredErrorMessage));
            }
        }
        if ($this->AdviceToOtherHospital->Required) {
            if (!$this->AdviceToOtherHospital->IsDetailKey && EmptyValue($this->AdviceToOtherHospital->FormValue)) {
                $this->AdviceToOtherHospital->addErrorMessage(str_replace("%s", $this->AdviceToOtherHospital->caption(), $this->AdviceToOtherHospital->RequiredErrorMessage));
            }
        }
        if ($this->Reason->Required) {
            if (!$this->Reason->IsDetailKey && EmptyValue($this->Reason->FormValue)) {
                $this->Reason->addErrorMessage(str_replace("%s", $this->Reason->caption(), $this->Reason->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("PatientVitalsGrid");
        if (in_array("patient_vitals", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientHistoryGrid");
        if (in_array("patient_history", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientProvisionalDiagnosisGrid");
        if (in_array("patient_provisional_diagnosis", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientPrescriptionGrid");
        if (in_array("patient_prescription", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientFinalDiagnosisGrid");
        if (in_array("patient_final_diagnosis", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientFollowUpGrid");
        if (in_array("patient_follow_up", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientOtDeliveryRegisterGrid");
        if (in_array("patient_ot_delivery_register", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientOtSurgeryRegisterGrid");
        if (in_array("patient_ot_surgery_register", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientServicesGrid");
        if (in_array("patient_services", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientInvestigationsGrid");
        if (in_array("patient_investigations", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientInsuranceGrid");
        if (in_array("patient_insurance", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PharmacyPharledGrid");
        if (in_array("pharmacy_pharled", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("ViewIpAdvanceGrid");
        if (in_array("view_ip_advance", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientRoomGrid");
        if (in_array("patient_room", $detailTblVar) && $detailPage->DetailAdd) {
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

        // mrnNo
        $this->mrnNo->setDbValueDef($rsnew, $this->mrnNo->CurrentValue, "", false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // patient_name
        $this->patient_name->setDbValueDef($rsnew, $this->patient_name->CurrentValue, null, false);

        // mobileno
        $this->mobileno->setDbValueDef($rsnew, $this->mobileno->CurrentValue, null, false);

        // gender
        $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, false);

        // age
        $this->age->setDbValueDef($rsnew, $this->age->CurrentValue, null, false);

        // typeRegsisteration
        $this->typeRegsisteration->setDbValueDef($rsnew, $this->typeRegsisteration->CurrentValue, null, false);

        // PaymentCategory
        $this->PaymentCategory->setDbValueDef($rsnew, $this->PaymentCategory->CurrentValue, null, false);

        // physician_id
        $this->physician_id->setDbValueDef($rsnew, $this->physician_id->CurrentValue, null, false);

        // admission_consultant_id
        $this->admission_consultant_id->setDbValueDef($rsnew, $this->admission_consultant_id->CurrentValue, null, false);

        // leading_consultant_id
        $this->leading_consultant_id->setDbValueDef($rsnew, $this->leading_consultant_id->CurrentValue, null, false);

        // cause
        $this->cause->setDbValueDef($rsnew, $this->cause->CurrentValue, null, false);

        // admission_date
        $this->admission_date->setDbValueDef($rsnew, UnFormatDateTime($this->admission_date->CurrentValue, 11), null, false);

        // release_date
        $this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 17), null, false);

        // PaymentStatus
        $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, false);

        // status
        $this->status->CurrentValue = ActiveStatusbit();
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null);

        // createdby
        $this->createdby->CurrentValue = CurrentUserID();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // DOB
        $this->DOB->setDbValueDef($rsnew, $this->DOB->CurrentValue, "", false);

        // ReferedByDr
        $this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, null, false);

        // ReferClinicname
        $this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, null, false);

        // ReferCity
        $this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, null, false);

        // ReferMobileNo
        $this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, null, false);

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, null, false);

        // PurposreReferredfor
        $this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, null, false);

        // BillClosing
        $this->BillClosing->setDbValueDef($rsnew, $this->BillClosing->CurrentValue, null, false);

        // BillClosingDate
        $this->BillClosingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillClosingDate->CurrentValue, 0), null, false);

        // BillNumber
        $this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, null, false);

        // ClosingAmount
        $this->ClosingAmount->setDbValueDef($rsnew, $this->ClosingAmount->CurrentValue, null, false);

        // ClosingType
        $this->ClosingType->setDbValueDef($rsnew, $this->ClosingType->CurrentValue, null, false);

        // BillAmount
        $this->BillAmount->setDbValueDef($rsnew, $this->BillAmount->CurrentValue, null, false);

        // billclosedBy
        $this->billclosedBy->setDbValueDef($rsnew, $this->billclosedBy->CurrentValue, null, false);

        // bllcloseByDate
        $this->bllcloseByDate->setDbValueDef($rsnew, UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0), null, false);

        // ReportHeader
        $this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, null, false);

        // Procedure
        $this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, null, false);

        // Consultant
        $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, false);

        // Anesthetist
        $this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, null, false);

        // Amound
        $this->Amound->setDbValueDef($rsnew, $this->Amound->CurrentValue, null, false);

        // Package
        $this->Package->setDbValueDef($rsnew, $this->Package->CurrentValue, null, false);

        // patient_id
        $this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, false);

        // PartnerID
        $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, false);

        // PartnerName
        $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, false);

        // PartnerMobile
        $this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, null, false);

        // Cid
        $this->Cid->setDbValueDef($rsnew, $this->Cid->CurrentValue, null, false);

        // PartId
        $this->PartId->setDbValueDef($rsnew, $this->PartId->CurrentValue, null, false);

        // IDProof
        $this->IDProof->setDbValueDef($rsnew, $this->IDProof->CurrentValue, null, false);

        // AdviceToOtherHospital
        $this->AdviceToOtherHospital->setDbValueDef($rsnew, $this->AdviceToOtherHospital->CurrentValue, null, false);

        // Reason
        $this->Reason->setDbValueDef($rsnew, $this->Reason->CurrentValue, null, false);

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
            $detailPage = Container("PatientVitalsGrid");
            if (in_array("patient_vitals", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_vitals"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientHistoryGrid");
            if (in_array("patient_history", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_history"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientProvisionalDiagnosisGrid");
            if (in_array("patient_provisional_diagnosis", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_provisional_diagnosis"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientPrescriptionGrid");
            if (in_array("patient_prescription", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_prescription"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientFinalDiagnosisGrid");
            if (in_array("patient_final_diagnosis", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_final_diagnosis"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientFollowUpGrid");
            if (in_array("patient_follow_up", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_follow_up"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientOtDeliveryRegisterGrid");
            if (in_array("patient_ot_delivery_register", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $detailPage->PId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_ot_delivery_register"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PId->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientOtSurgeryRegisterGrid");
            if (in_array("patient_ot_surgery_register", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $detailPage->PId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_ot_surgery_register"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PId->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientServicesGrid");
            if (in_array("patient_services", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $detailPage->PatID->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_services"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatID->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientInvestigationsGrid");
            if (in_array("patient_investigations", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_investigations"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientInsuranceGrid");
            if (in_array("patient_insurance", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatientId->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_insurance"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatientId->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PharmacyPharledGrid");
            if (in_array("pharmacy_pharled", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $detailPage->PatID->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "pharmacy_pharled"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatID->setSessionValue(""); // Clear master key if insert failed
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("ViewIpAdvanceGrid");
            if (in_array("view_ip_advance", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->PatID->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "view_ip_advance"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatID->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("PatientRoomGrid");
            if (in_array("patient_room", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->Reception->setSessionValue($this->id->CurrentValue); // Set master key
                $detailPage->mrnno->setSessionValue($this->mrnNo->CurrentValue); // Set master key
                $detailPage->PatID->setSessionValue($this->patient_id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_room"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->Reception->setSessionValue(""); // Clear master key if insert failed
                $detailPage->mrnno->setSessionValue(""); // Clear master key if insert failed
                $detailPage->PatID->setSessionValue(""); // Clear master key if insert failed
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
            if (in_array("patient_vitals", $detailTblVar)) {
                $detailPageObj = Container("PatientVitalsGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_history", $detailTblVar)) {
                $detailPageObj = Container("PatientHistoryGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_provisional_diagnosis", $detailTblVar)) {
                $detailPageObj = Container("PatientProvisionalDiagnosisGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_prescription", $detailTblVar)) {
                $detailPageObj = Container("PatientPrescriptionGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_final_diagnosis", $detailTblVar)) {
                $detailPageObj = Container("PatientFinalDiagnosisGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_follow_up", $detailTblVar)) {
                $detailPageObj = Container("PatientFollowUpGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_ot_delivery_register", $detailTblVar)) {
                $detailPageObj = Container("PatientOtDeliveryRegisterGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                    $detailPageObj->PId->IsDetailKey = true;
                    $detailPageObj->PId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PId->setSessionValue($detailPageObj->PId->CurrentValue);
                }
            }
            if (in_array("patient_ot_surgery_register", $detailTblVar)) {
                $detailPageObj = Container("PatientOtSurgeryRegisterGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                    $detailPageObj->PId->IsDetailKey = true;
                    $detailPageObj->PId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PId->setSessionValue($detailPageObj->PId->CurrentValue);
                }
            }
            if (in_array("patient_services", $detailTblVar)) {
                $detailPageObj = Container("PatientServicesGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                    $detailPageObj->PatID->IsDetailKey = true;
                    $detailPageObj->PatID->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatID->setSessionValue($detailPageObj->PatID->CurrentValue);
                    $detailPageObj->Vid->setSessionValue(""); // Clear session key
                }
            }
            if (in_array("patient_investigations", $detailTblVar)) {
                $detailPageObj = Container("PatientInvestigationsGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
            if (in_array("patient_insurance", $detailTblVar)) {
                $detailPageObj = Container("PatientInsuranceGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatientId->IsDetailKey = true;
                    $detailPageObj->PatientId->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatientId->setSessionValue($detailPageObj->PatientId->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                }
            }
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
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                    $detailPageObj->PatID->IsDetailKey = true;
                    $detailPageObj->PatID->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatID->setSessionValue($detailPageObj->PatID->CurrentValue);
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->pbv->setSessionValue(""); // Clear session key
                    $detailPageObj->pbt->setSessionValue(""); // Clear session key
                }
            }
            if (in_array("view_ip_advance", $detailTblVar)) {
                $detailPageObj = Container("ViewIpAdvanceGrid");
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
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->PatID->IsDetailKey = true;
                    $detailPageObj->PatID->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatID->setSessionValue($detailPageObj->PatID->CurrentValue);
                }
            }
            if (in_array("patient_room", $detailTblVar)) {
                $detailPageObj = Container("PatientRoomGrid");
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
                    $detailPageObj->Reception->IsDetailKey = true;
                    $detailPageObj->Reception->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->Reception->setSessionValue($detailPageObj->Reception->CurrentValue);
                    $detailPageObj->mrnno->IsDetailKey = true;
                    $detailPageObj->mrnno->CurrentValue = $this->mrnNo->CurrentValue;
                    $detailPageObj->mrnno->setSessionValue($detailPageObj->mrnno->CurrentValue);
                    $detailPageObj->PatID->IsDetailKey = true;
                    $detailPageObj->PatID->CurrentValue = $this->patient_id->CurrentValue;
                    $detailPageObj->PatID->setSessionValue($detailPageObj->PatID->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IpAdmissionList"), "", $this->TableVar, true);
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
                case "x_gender":
                    break;
                case "x_typeRegsisteration":
                    break;
                case "x_PaymentCategory":
                    break;
                case "x_physician_id":
                    break;
                case "x_admission_consultant_id":
                    break;
                case "x_leading_consultant_id":
                    break;
                case "x_PaymentStatus":
                    break;
                case "x_status":
                    break;
                case "x_HospID":
                    break;
                case "x_ReferedByDr":
                    break;
                case "x_ReferA4TreatingConsultant":
                    break;
                case "x_patient_id":
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
    public function pageRender() {
    	//echo "Page Render";
    		$UserProfile = new UserProfile();
    		$id =  $UserProfile->Profile['id'];
    		$HospID =  $UserProfile->Profile['HospID'];
    		$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
    		if($hospital_PreFixCode == "")
    		{
    			getHospitalDetails($HospID);
    			$UserProfile = new UserProfile();
    			$hospital_PreFixCode = $UserProfile->Profile['hospital_PreFixCode'];
    		}
    		$this->mrnNo->EditValue =  $hospital_PreFixCode . 'MRN'. getmrnNo($HospID);
    		$this->mrnNo->ReadOnly = true;
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
