<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientServicesSearch extends PatientServices
{
    use MessagesTrait;

    // Page ID
    public $PageID = "search";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_services';

    // Page object name
    public $PageObjName = "PatientServicesSearch";

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
        $this->Reception->setVisibility();
        $this->Services->setVisibility();
        $this->amount->setVisibility();
        $this->description->setVisibility();
        $this->patient_type->setVisibility();
        $this->charged_date->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
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
                    $srchStr = "PatientServicesList" . "?" . $srchStr;
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
        $this->buildSearchUrl($srchUrl, $this->Reception); // Reception
        $this->buildSearchUrl($srchUrl, $this->Services); // Services
        $this->buildSearchUrl($srchUrl, $this->amount); // amount
        $this->buildSearchUrl($srchUrl, $this->description); // description
        $this->buildSearchUrl($srchUrl, $this->patient_type); // patient_type
        $this->buildSearchUrl($srchUrl, $this->charged_date); // charged_date
        $this->buildSearchUrl($srchUrl, $this->status); // status
        $this->buildSearchUrl($srchUrl, $this->createdby); // createdby
        $this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
        $this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
        $this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
        $this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
        $this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
        $this->buildSearchUrl($srchUrl, $this->Age); // Age
        $this->buildSearchUrl($srchUrl, $this->Gender); // Gender
        $this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
        $this->buildSearchUrl($srchUrl, $this->Unit); // Unit
        $this->buildSearchUrl($srchUrl, $this->Quantity); // Quantity
        $this->buildSearchUrl($srchUrl, $this->Discount); // Discount
        $this->buildSearchUrl($srchUrl, $this->SubTotal); // SubTotal
        $this->buildSearchUrl($srchUrl, $this->ServiceSelect); // ServiceSelect
        $this->buildSearchUrl($srchUrl, $this->Aid); // Aid
        $this->buildSearchUrl($srchUrl, $this->Vid); // Vid
        $this->buildSearchUrl($srchUrl, $this->DrID); // DrID
        $this->buildSearchUrl($srchUrl, $this->DrCODE); // DrCODE
        $this->buildSearchUrl($srchUrl, $this->DrName); // DrName
        $this->buildSearchUrl($srchUrl, $this->Department); // Department
        $this->buildSearchUrl($srchUrl, $this->DrSharePres); // DrSharePres
        $this->buildSearchUrl($srchUrl, $this->HospSharePres); // HospSharePres
        $this->buildSearchUrl($srchUrl, $this->DrShareAmount); // DrShareAmount
        $this->buildSearchUrl($srchUrl, $this->HospShareAmount); // HospShareAmount
        $this->buildSearchUrl($srchUrl, $this->DrShareSettiledAmount); // DrShareSettiledAmount
        $this->buildSearchUrl($srchUrl, $this->DrShareSettledId); // DrShareSettledId
        $this->buildSearchUrl($srchUrl, $this->DrShareSettiledStatus); // DrShareSettiledStatus
        $this->buildSearchUrl($srchUrl, $this->invoiceId); // invoiceId
        $this->buildSearchUrl($srchUrl, $this->invoiceAmount); // invoiceAmount
        $this->buildSearchUrl($srchUrl, $this->invoiceStatus); // invoiceStatus
        $this->buildSearchUrl($srchUrl, $this->modeOfPayment); // modeOfPayment
        $this->buildSearchUrl($srchUrl, $this->HospID); // HospID
        $this->buildSearchUrl($srchUrl, $this->RIDNO); // RIDNO
        $this->buildSearchUrl($srchUrl, $this->TidNo); // TidNo
        $this->buildSearchUrl($srchUrl, $this->DiscountCategory); // DiscountCategory
        $this->buildSearchUrl($srchUrl, $this->sid); // sid
        $this->buildSearchUrl($srchUrl, $this->ItemCode); // ItemCode
        $this->buildSearchUrl($srchUrl, $this->TestSubCd); // TestSubCd
        $this->buildSearchUrl($srchUrl, $this->DEptCd); // DEptCd
        $this->buildSearchUrl($srchUrl, $this->ProfCd); // ProfCd
        $this->buildSearchUrl($srchUrl, $this->LabReport); // LabReport
        $this->buildSearchUrl($srchUrl, $this->Comments); // Comments
        $this->buildSearchUrl($srchUrl, $this->Method); // Method
        $this->buildSearchUrl($srchUrl, $this->Specimen); // Specimen
        $this->buildSearchUrl($srchUrl, $this->Abnormal); // Abnormal
        $this->buildSearchUrl($srchUrl, $this->RefValue); // RefValue
        $this->buildSearchUrl($srchUrl, $this->TestUnit); // TestUnit
        $this->buildSearchUrl($srchUrl, $this->LOWHIGH); // LOWHIGH
        $this->buildSearchUrl($srchUrl, $this->Branch); // Branch
        $this->buildSearchUrl($srchUrl, $this->Dispatch); // Dispatch
        $this->buildSearchUrl($srchUrl, $this->Pic1); // Pic1
        $this->buildSearchUrl($srchUrl, $this->Pic2); // Pic2
        $this->buildSearchUrl($srchUrl, $this->GraphPath); // GraphPath
        $this->buildSearchUrl($srchUrl, $this->MachineCD); // MachineCD
        $this->buildSearchUrl($srchUrl, $this->TestCancel); // TestCancel
        $this->buildSearchUrl($srchUrl, $this->OutSource); // OutSource
        $this->buildSearchUrl($srchUrl, $this->Printed); // Printed
        $this->buildSearchUrl($srchUrl, $this->PrintBy); // PrintBy
        $this->buildSearchUrl($srchUrl, $this->PrintDate); // PrintDate
        $this->buildSearchUrl($srchUrl, $this->BillingDate); // BillingDate
        $this->buildSearchUrl($srchUrl, $this->BilledBy); // BilledBy
        $this->buildSearchUrl($srchUrl, $this->Resulted); // Resulted
        $this->buildSearchUrl($srchUrl, $this->ResultDate); // ResultDate
        $this->buildSearchUrl($srchUrl, $this->ResultedBy); // ResultedBy
        $this->buildSearchUrl($srchUrl, $this->SampleDate); // SampleDate
        $this->buildSearchUrl($srchUrl, $this->SampleUser); // SampleUser
        $this->buildSearchUrl($srchUrl, $this->Sampled); // Sampled
        $this->buildSearchUrl($srchUrl, $this->ReceivedDate); // ReceivedDate
        $this->buildSearchUrl($srchUrl, $this->ReceivedUser); // ReceivedUser
        $this->buildSearchUrl($srchUrl, $this->Recevied); // Recevied
        $this->buildSearchUrl($srchUrl, $this->DeptRecvDate); // DeptRecvDate
        $this->buildSearchUrl($srchUrl, $this->DeptRecvUser); // DeptRecvUser
        $this->buildSearchUrl($srchUrl, $this->DeptRecived); // DeptRecived
        $this->buildSearchUrl($srchUrl, $this->SAuthDate); // SAuthDate
        $this->buildSearchUrl($srchUrl, $this->SAuthBy); // SAuthBy
        $this->buildSearchUrl($srchUrl, $this->SAuthendicate); // SAuthendicate
        $this->buildSearchUrl($srchUrl, $this->AuthDate); // AuthDate
        $this->buildSearchUrl($srchUrl, $this->AuthBy); // AuthBy
        $this->buildSearchUrl($srchUrl, $this->Authencate); // Authencate
        $this->buildSearchUrl($srchUrl, $this->EditDate); // EditDate
        $this->buildSearchUrl($srchUrl, $this->EditBy); // EditBy
        $this->buildSearchUrl($srchUrl, $this->Editted); // Editted
        $this->buildSearchUrl($srchUrl, $this->PatID); // PatID
        $this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
        $this->buildSearchUrl($srchUrl, $this->Mobile); // Mobile
        $this->buildSearchUrl($srchUrl, $this->CId); // CId
        $this->buildSearchUrl($srchUrl, $this->Order); // Order
        $this->buildSearchUrl($srchUrl, $this->Form); // Form
        $this->buildSearchUrl($srchUrl, $this->ResType); // ResType
        $this->buildSearchUrl($srchUrl, $this->Sample); // Sample
        $this->buildSearchUrl($srchUrl, $this->NoD); // NoD
        $this->buildSearchUrl($srchUrl, $this->BillOrder); // BillOrder
        $this->buildSearchUrl($srchUrl, $this->Formula); // Formula
        $this->buildSearchUrl($srchUrl, $this->Inactive); // Inactive
        $this->buildSearchUrl($srchUrl, $this->CollSample); // CollSample
        $this->buildSearchUrl($srchUrl, $this->TestType); // TestType
        $this->buildSearchUrl($srchUrl, $this->Repeated); // Repeated
        $this->buildSearchUrl($srchUrl, $this->RepeatedBy); // RepeatedBy
        $this->buildSearchUrl($srchUrl, $this->RepeatedDate); // RepeatedDate
        $this->buildSearchUrl($srchUrl, $this->serviceID); // serviceID
        $this->buildSearchUrl($srchUrl, $this->Service_Type); // Service_Type
        $this->buildSearchUrl($srchUrl, $this->Service_Department); // Service_Department
        $this->buildSearchUrl($srchUrl, $this->RequestNo); // RequestNo
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
        if ($this->Reception->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Services->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->amount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->description->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->patient_type->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->charged_date->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->status->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createdby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->createddatetime->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modifiedby->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modifieddatetime->AdvancedSearch->post()) {
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
        if ($this->Unit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Quantity->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Discount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SubTotal->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ServiceSelect->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if (is_array($this->ServiceSelect->AdvancedSearch->SearchValue)) {
            $this->ServiceSelect->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ServiceSelect->AdvancedSearch->SearchValue);
        }
        if (is_array($this->ServiceSelect->AdvancedSearch->SearchValue2)) {
            $this->ServiceSelect->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ServiceSelect->AdvancedSearch->SearchValue2);
        }
        if ($this->Aid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Vid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrCODE->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrName->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Department->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrSharePres->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospSharePres->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrShareAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->HospShareAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrShareSettiledAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrShareSettledId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DrShareSettiledStatus->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->invoiceId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->invoiceAmount->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->invoiceStatus->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->modeOfPayment->AdvancedSearch->post()) {
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
        if ($this->DiscountCategory->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->sid->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ItemCode->AdvancedSearch->post()) {
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
        if ($this->Comments->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Method->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Specimen->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Abnormal->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RefValue->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TestUnit->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->LOWHIGH->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Branch->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Dispatch->AdvancedSearch->post()) {
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
        if ($this->MachineCD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TestCancel->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->OutSource->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Printed->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrintBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PrintDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillingDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BilledBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Resulted->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResultDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResultedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SampleDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SampleUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Sampled->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReceivedDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ReceivedUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Recevied->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DeptRecvDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DeptRecvUser->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->DeptRecived->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SAuthDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SAuthBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->SAuthendicate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AuthDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->AuthBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Authencate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EditDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->EditBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Editted->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->PatientId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Mobile->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CId->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Order->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Form->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->ResType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Sample->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->NoD->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->BillOrder->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Formula->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Inactive->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->CollSample->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->TestType->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Repeated->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RepeatedBy->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RepeatedDate->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->serviceID->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Service_Type->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->Service_Department->AdvancedSearch->post()) {
            $hasValue = true;
        }
        if ($this->RequestNo->AdvancedSearch->post()) {
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

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

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
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // Services
            $this->Services->EditAttrs["class"] = "form-control";
            $this->Services->EditCustomAttributes = "";
            if (!$this->Services->Raw) {
                $this->Services->AdvancedSearch->SearchValue = HtmlDecode($this->Services->AdvancedSearch->SearchValue);
            }
            $this->Services->EditValue = HtmlEncode($this->Services->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->Services->AdvancedSearch->SearchValue));
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
                        $this->Services->EditValue = HtmlEncode($this->Services->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->Services->EditValue = null;
            }
            $this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

            // amount
            $this->amount->EditAttrs["class"] = "form-control";
            $this->amount->EditCustomAttributes = "";
            $this->amount->EditValue = HtmlEncode($this->amount->AdvancedSearch->SearchValue);
            $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            if (!$this->description->Raw) {
                $this->description->AdvancedSearch->SearchValue = HtmlDecode($this->description->AdvancedSearch->SearchValue);
            }
            $this->description->EditValue = HtmlEncode($this->description->AdvancedSearch->SearchValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // patient_type
            $this->patient_type->EditAttrs["class"] = "form-control";
            $this->patient_type->EditCustomAttributes = "";
            $this->patient_type->EditValue = HtmlEncode($this->patient_type->AdvancedSearch->SearchValue);
            $this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

            // charged_date
            $this->charged_date->EditAttrs["class"] = "form-control";
            $this->charged_date->EditCustomAttributes = "";
            $this->charged_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->charged_date->AdvancedSearch->SearchValue, 0), 8));
            $this->charged_date->PlaceHolder = RemoveHtml($this->charged_date->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $curVal = trim(strval($this->status->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->status->AdvancedSearch->ViewValue = $this->status->lookupCacheOption($curVal);
            } else {
                $this->status->AdvancedSearch->ViewValue = $this->status->Lookup !== null && is_array($this->status->Lookup->Options) ? $curVal : null;
            }
            if ($this->status->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->status->EditValue = array_values($this->status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->status->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->status->EditValue = $arwrk;
            }
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

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

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $this->Unit->EditValue = HtmlEncode($this->Unit->AdvancedSearch->SearchValue);
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->AdvancedSearch->SearchValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->AdvancedSearch->SearchValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());

            // SubTotal
            $this->SubTotal->EditAttrs["class"] = "form-control";
            $this->SubTotal->EditCustomAttributes = "";
            $this->SubTotal->EditValue = HtmlEncode($this->SubTotal->AdvancedSearch->SearchValue);
            $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());

            // ServiceSelect
            $this->ServiceSelect->EditCustomAttributes = "";
            $this->ServiceSelect->EditValue = $this->ServiceSelect->options(false);
            $this->ServiceSelect->PlaceHolder = RemoveHtml($this->ServiceSelect->caption());

            // Aid
            $this->Aid->EditAttrs["class"] = "form-control";
            $this->Aid->EditCustomAttributes = "";
            $this->Aid->EditValue = HtmlEncode($this->Aid->AdvancedSearch->SearchValue);
            $this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

            // Vid
            $this->Vid->EditAttrs["class"] = "form-control";
            $this->Vid->EditCustomAttributes = "";
            $this->Vid->EditValue = HtmlEncode($this->Vid->AdvancedSearch->SearchValue);
            $this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->AdvancedSearch->SearchValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // DrCODE
            $this->DrCODE->EditAttrs["class"] = "form-control";
            $this->DrCODE->EditCustomAttributes = "";
            if (!$this->DrCODE->Raw) {
                $this->DrCODE->AdvancedSearch->SearchValue = HtmlDecode($this->DrCODE->AdvancedSearch->SearchValue);
            }
            $this->DrCODE->EditValue = HtmlEncode($this->DrCODE->AdvancedSearch->SearchValue);
            $this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

            // DrName
            $this->DrName->EditAttrs["class"] = "form-control";
            $this->DrName->EditCustomAttributes = "";
            if (!$this->DrName->Raw) {
                $this->DrName->AdvancedSearch->SearchValue = HtmlDecode($this->DrName->AdvancedSearch->SearchValue);
            }
            $this->DrName->EditValue = HtmlEncode($this->DrName->AdvancedSearch->SearchValue);
            $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->AdvancedSearch->SearchValue = HtmlDecode($this->Department->AdvancedSearch->SearchValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->AdvancedSearch->SearchValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // DrSharePres
            $this->DrSharePres->EditAttrs["class"] = "form-control";
            $this->DrSharePres->EditCustomAttributes = "";
            $this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->AdvancedSearch->SearchValue);
            $this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());

            // HospSharePres
            $this->HospSharePres->EditAttrs["class"] = "form-control";
            $this->HospSharePres->EditCustomAttributes = "";
            $this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->AdvancedSearch->SearchValue);
            $this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());

            // DrShareAmount
            $this->DrShareAmount->EditAttrs["class"] = "form-control";
            $this->DrShareAmount->EditCustomAttributes = "";
            $this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->AdvancedSearch->SearchValue);
            $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());

            // HospShareAmount
            $this->HospShareAmount->EditAttrs["class"] = "form-control";
            $this->HospShareAmount->EditCustomAttributes = "";
            $this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->AdvancedSearch->SearchValue);
            $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());

            // DrShareSettiledAmount
            $this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledAmount->EditCustomAttributes = "";
            $this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->AdvancedSearch->SearchValue);
            $this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());

            // DrShareSettledId
            $this->DrShareSettledId->EditAttrs["class"] = "form-control";
            $this->DrShareSettledId->EditCustomAttributes = "";
            $this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->AdvancedSearch->SearchValue);
            $this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

            // DrShareSettiledStatus
            $this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
            $this->DrShareSettiledStatus->EditCustomAttributes = "";
            $this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->AdvancedSearch->SearchValue);
            $this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->AdvancedSearch->SearchValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // invoiceAmount
            $this->invoiceAmount->EditAttrs["class"] = "form-control";
            $this->invoiceAmount->EditCustomAttributes = "";
            $this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->AdvancedSearch->SearchValue);
            $this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());

            // invoiceStatus
            $this->invoiceStatus->EditAttrs["class"] = "form-control";
            $this->invoiceStatus->EditCustomAttributes = "";
            if (!$this->invoiceStatus->Raw) {
                $this->invoiceStatus->AdvancedSearch->SearchValue = HtmlDecode($this->invoiceStatus->AdvancedSearch->SearchValue);
            }
            $this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->AdvancedSearch->SearchValue);
            $this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

            // modeOfPayment
            $this->modeOfPayment->EditAttrs["class"] = "form-control";
            $this->modeOfPayment->EditCustomAttributes = "";
            if (!$this->modeOfPayment->Raw) {
                $this->modeOfPayment->AdvancedSearch->SearchValue = HtmlDecode($this->modeOfPayment->AdvancedSearch->SearchValue);
            }
            $this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->AdvancedSearch->SearchValue);
            $this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

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

            // DiscountCategory
            $this->DiscountCategory->EditAttrs["class"] = "form-control";
            $this->DiscountCategory->EditCustomAttributes = "";
            if (!$this->DiscountCategory->Raw) {
                $this->DiscountCategory->AdvancedSearch->SearchValue = HtmlDecode($this->DiscountCategory->AdvancedSearch->SearchValue);
            }
            $this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->AdvancedSearch->SearchValue);
            $this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->AdvancedSearch->SearchValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // ItemCode
            $this->ItemCode->EditAttrs["class"] = "form-control";
            $this->ItemCode->EditCustomAttributes = "";
            if (!$this->ItemCode->Raw) {
                $this->ItemCode->AdvancedSearch->SearchValue = HtmlDecode($this->ItemCode->AdvancedSearch->SearchValue);
            }
            $this->ItemCode->EditValue = HtmlEncode($this->ItemCode->AdvancedSearch->SearchValue);
            $this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

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

            // Comments
            $this->Comments->EditAttrs["class"] = "form-control";
            $this->Comments->EditCustomAttributes = "";
            if (!$this->Comments->Raw) {
                $this->Comments->AdvancedSearch->SearchValue = HtmlDecode($this->Comments->AdvancedSearch->SearchValue);
            }
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

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // RefValue
            $this->RefValue->EditAttrs["class"] = "form-control";
            $this->RefValue->EditCustomAttributes = "";
            $this->RefValue->EditValue = HtmlEncode($this->RefValue->AdvancedSearch->SearchValue);
            $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

            // TestUnit
            $this->TestUnit->EditAttrs["class"] = "form-control";
            $this->TestUnit->EditCustomAttributes = "";
            if (!$this->TestUnit->Raw) {
                $this->TestUnit->AdvancedSearch->SearchValue = HtmlDecode($this->TestUnit->AdvancedSearch->SearchValue);
            }
            $this->TestUnit->EditValue = HtmlEncode($this->TestUnit->AdvancedSearch->SearchValue);
            $this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

            // LOWHIGH
            $this->LOWHIGH->EditAttrs["class"] = "form-control";
            $this->LOWHIGH->EditCustomAttributes = "";
            if (!$this->LOWHIGH->Raw) {
                $this->LOWHIGH->AdvancedSearch->SearchValue = HtmlDecode($this->LOWHIGH->AdvancedSearch->SearchValue);
            }
            $this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->AdvancedSearch->SearchValue);
            $this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

            // Branch
            $this->Branch->EditAttrs["class"] = "form-control";
            $this->Branch->EditCustomAttributes = "";
            if (!$this->Branch->Raw) {
                $this->Branch->AdvancedSearch->SearchValue = HtmlDecode($this->Branch->AdvancedSearch->SearchValue);
            }
            $this->Branch->EditValue = HtmlEncode($this->Branch->AdvancedSearch->SearchValue);
            $this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

            // Dispatch
            $this->Dispatch->EditAttrs["class"] = "form-control";
            $this->Dispatch->EditCustomAttributes = "";
            if (!$this->Dispatch->Raw) {
                $this->Dispatch->AdvancedSearch->SearchValue = HtmlDecode($this->Dispatch->AdvancedSearch->SearchValue);
            }
            $this->Dispatch->EditValue = HtmlEncode($this->Dispatch->AdvancedSearch->SearchValue);
            $this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

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

            // Printed
            $this->Printed->EditAttrs["class"] = "form-control";
            $this->Printed->EditCustomAttributes = "";
            if (!$this->Printed->Raw) {
                $this->Printed->AdvancedSearch->SearchValue = HtmlDecode($this->Printed->AdvancedSearch->SearchValue);
            }
            $this->Printed->EditValue = HtmlEncode($this->Printed->AdvancedSearch->SearchValue);
            $this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

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

            // BillingDate
            $this->BillingDate->EditAttrs["class"] = "form-control";
            $this->BillingDate->EditCustomAttributes = "";
            $this->BillingDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillingDate->AdvancedSearch->SearchValue, 0), 8));
            $this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

            // BilledBy
            $this->BilledBy->EditAttrs["class"] = "form-control";
            $this->BilledBy->EditCustomAttributes = "";
            if (!$this->BilledBy->Raw) {
                $this->BilledBy->AdvancedSearch->SearchValue = HtmlDecode($this->BilledBy->AdvancedSearch->SearchValue);
            }
            $this->BilledBy->EditValue = HtmlEncode($this->BilledBy->AdvancedSearch->SearchValue);
            $this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

            // Resulted
            $this->Resulted->EditAttrs["class"] = "form-control";
            $this->Resulted->EditCustomAttributes = "";
            if (!$this->Resulted->Raw) {
                $this->Resulted->AdvancedSearch->SearchValue = HtmlDecode($this->Resulted->AdvancedSearch->SearchValue);
            }
            $this->Resulted->EditValue = HtmlEncode($this->Resulted->AdvancedSearch->SearchValue);
            $this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 0), 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ResultedBy->AdvancedSearch->SearchValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->AdvancedSearch->SearchValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

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

            // Sampled
            $this->Sampled->EditAttrs["class"] = "form-control";
            $this->Sampled->EditCustomAttributes = "";
            if (!$this->Sampled->Raw) {
                $this->Sampled->AdvancedSearch->SearchValue = HtmlDecode($this->Sampled->AdvancedSearch->SearchValue);
            }
            $this->Sampled->EditValue = HtmlEncode($this->Sampled->AdvancedSearch->SearchValue);
            $this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

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

            // Recevied
            $this->Recevied->EditAttrs["class"] = "form-control";
            $this->Recevied->EditCustomAttributes = "";
            if (!$this->Recevied->Raw) {
                $this->Recevied->AdvancedSearch->SearchValue = HtmlDecode($this->Recevied->AdvancedSearch->SearchValue);
            }
            $this->Recevied->EditValue = HtmlEncode($this->Recevied->AdvancedSearch->SearchValue);
            $this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

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

            // DeptRecived
            $this->DeptRecived->EditAttrs["class"] = "form-control";
            $this->DeptRecived->EditCustomAttributes = "";
            if (!$this->DeptRecived->Raw) {
                $this->DeptRecived->AdvancedSearch->SearchValue = HtmlDecode($this->DeptRecived->AdvancedSearch->SearchValue);
            }
            $this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->AdvancedSearch->SearchValue);
            $this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

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

            // SAuthendicate
            $this->SAuthendicate->EditAttrs["class"] = "form-control";
            $this->SAuthendicate->EditCustomAttributes = "";
            if (!$this->SAuthendicate->Raw) {
                $this->SAuthendicate->AdvancedSearch->SearchValue = HtmlDecode($this->SAuthendicate->AdvancedSearch->SearchValue);
            }
            $this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->AdvancedSearch->SearchValue);
            $this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

            // AuthDate
            $this->AuthDate->EditAttrs["class"] = "form-control";
            $this->AuthDate->EditCustomAttributes = "";
            $this->AuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AuthDate->AdvancedSearch->SearchValue, 0), 8));
            $this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

            // AuthBy
            $this->AuthBy->EditAttrs["class"] = "form-control";
            $this->AuthBy->EditCustomAttributes = "";
            if (!$this->AuthBy->Raw) {
                $this->AuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->AuthBy->AdvancedSearch->SearchValue);
            }
            $this->AuthBy->EditValue = HtmlEncode($this->AuthBy->AdvancedSearch->SearchValue);
            $this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

            // Authencate
            $this->Authencate->EditAttrs["class"] = "form-control";
            $this->Authencate->EditCustomAttributes = "";
            if (!$this->Authencate->Raw) {
                $this->Authencate->AdvancedSearch->SearchValue = HtmlDecode($this->Authencate->AdvancedSearch->SearchValue);
            }
            $this->Authencate->EditValue = HtmlEncode($this->Authencate->AdvancedSearch->SearchValue);
            $this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

            // EditDate
            $this->EditDate->EditAttrs["class"] = "form-control";
            $this->EditDate->EditCustomAttributes = "";
            $this->EditDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EditDate->AdvancedSearch->SearchValue, 0), 8));
            $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

            // EditBy
            $this->EditBy->EditAttrs["class"] = "form-control";
            $this->EditBy->EditCustomAttributes = "";
            if (!$this->EditBy->Raw) {
                $this->EditBy->AdvancedSearch->SearchValue = HtmlDecode($this->EditBy->AdvancedSearch->SearchValue);
            }
            $this->EditBy->EditValue = HtmlEncode($this->EditBy->AdvancedSearch->SearchValue);
            $this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

            // Editted
            $this->Editted->EditAttrs["class"] = "form-control";
            $this->Editted->EditCustomAttributes = "";
            if (!$this->Editted->Raw) {
                $this->Editted->AdvancedSearch->SearchValue = HtmlDecode($this->Editted->AdvancedSearch->SearchValue);
            }
            $this->Editted->EditValue = HtmlEncode($this->Editted->AdvancedSearch->SearchValue);
            $this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->EditValue = HtmlEncode($this->CId->AdvancedSearch->SearchValue);
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->AdvancedSearch->SearchValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            $this->Form->EditValue = HtmlEncode($this->Form->AdvancedSearch->SearchValue);
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // ResType
            $this->ResType->EditAttrs["class"] = "form-control";
            $this->ResType->EditCustomAttributes = "";
            if (!$this->ResType->Raw) {
                $this->ResType->AdvancedSearch->SearchValue = HtmlDecode($this->ResType->AdvancedSearch->SearchValue);
            }
            $this->ResType->EditValue = HtmlEncode($this->ResType->AdvancedSearch->SearchValue);
            $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

            // Sample
            $this->Sample->EditAttrs["class"] = "form-control";
            $this->Sample->EditCustomAttributes = "";
            if (!$this->Sample->Raw) {
                $this->Sample->AdvancedSearch->SearchValue = HtmlDecode($this->Sample->AdvancedSearch->SearchValue);
            }
            $this->Sample->EditValue = HtmlEncode($this->Sample->AdvancedSearch->SearchValue);
            $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

            // NoD
            $this->NoD->EditAttrs["class"] = "form-control";
            $this->NoD->EditCustomAttributes = "";
            $this->NoD->EditValue = HtmlEncode($this->NoD->AdvancedSearch->SearchValue);
            $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());

            // BillOrder
            $this->BillOrder->EditAttrs["class"] = "form-control";
            $this->BillOrder->EditCustomAttributes = "";
            $this->BillOrder->EditValue = HtmlEncode($this->BillOrder->AdvancedSearch->SearchValue);
            $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());

            // Formula
            $this->Formula->EditAttrs["class"] = "form-control";
            $this->Formula->EditCustomAttributes = "";
            $this->Formula->EditValue = HtmlEncode($this->Formula->AdvancedSearch->SearchValue);
            $this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

            // Inactive
            $this->Inactive->EditAttrs["class"] = "form-control";
            $this->Inactive->EditCustomAttributes = "";
            if (!$this->Inactive->Raw) {
                $this->Inactive->AdvancedSearch->SearchValue = HtmlDecode($this->Inactive->AdvancedSearch->SearchValue);
            }
            $this->Inactive->EditValue = HtmlEncode($this->Inactive->AdvancedSearch->SearchValue);
            $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

            // CollSample
            $this->CollSample->EditAttrs["class"] = "form-control";
            $this->CollSample->EditCustomAttributes = "";
            if (!$this->CollSample->Raw) {
                $this->CollSample->AdvancedSearch->SearchValue = HtmlDecode($this->CollSample->AdvancedSearch->SearchValue);
            }
            $this->CollSample->EditValue = HtmlEncode($this->CollSample->AdvancedSearch->SearchValue);
            $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            if (!$this->TestType->Raw) {
                $this->TestType->AdvancedSearch->SearchValue = HtmlDecode($this->TestType->AdvancedSearch->SearchValue);
            }
            $this->TestType->EditValue = HtmlEncode($this->TestType->AdvancedSearch->SearchValue);
            $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

            // Repeated
            $this->Repeated->EditAttrs["class"] = "form-control";
            $this->Repeated->EditCustomAttributes = "";
            if (!$this->Repeated->Raw) {
                $this->Repeated->AdvancedSearch->SearchValue = HtmlDecode($this->Repeated->AdvancedSearch->SearchValue);
            }
            $this->Repeated->EditValue = HtmlEncode($this->Repeated->AdvancedSearch->SearchValue);
            $this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

            // RepeatedBy
            $this->RepeatedBy->EditAttrs["class"] = "form-control";
            $this->RepeatedBy->EditCustomAttributes = "";
            if (!$this->RepeatedBy->Raw) {
                $this->RepeatedBy->AdvancedSearch->SearchValue = HtmlDecode($this->RepeatedBy->AdvancedSearch->SearchValue);
            }
            $this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->AdvancedSearch->SearchValue);
            $this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

            // RepeatedDate
            $this->RepeatedDate->EditAttrs["class"] = "form-control";
            $this->RepeatedDate->EditCustomAttributes = "";
            $this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->RepeatedDate->AdvancedSearch->SearchValue, 0), 8));
            $this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

            // serviceID
            $this->serviceID->EditAttrs["class"] = "form-control";
            $this->serviceID->EditCustomAttributes = "";
            $this->serviceID->EditValue = HtmlEncode($this->serviceID->AdvancedSearch->SearchValue);
            $this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

            // Service_Type
            $this->Service_Type->EditAttrs["class"] = "form-control";
            $this->Service_Type->EditCustomAttributes = "";
            if (!$this->Service_Type->Raw) {
                $this->Service_Type->AdvancedSearch->SearchValue = HtmlDecode($this->Service_Type->AdvancedSearch->SearchValue);
            }
            $this->Service_Type->EditValue = HtmlEncode($this->Service_Type->AdvancedSearch->SearchValue);
            $this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

            // Service_Department
            $this->Service_Department->EditAttrs["class"] = "form-control";
            $this->Service_Department->EditCustomAttributes = "";
            if (!$this->Service_Department->Raw) {
                $this->Service_Department->AdvancedSearch->SearchValue = HtmlDecode($this->Service_Department->AdvancedSearch->SearchValue);
            }
            $this->Service_Department->EditValue = HtmlEncode($this->Service_Department->AdvancedSearch->SearchValue);
            $this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

            // RequestNo
            $this->RequestNo->EditAttrs["class"] = "form-control";
            $this->RequestNo->EditCustomAttributes = "";
            $this->RequestNo->EditValue = HtmlEncode($this->RequestNo->AdvancedSearch->SearchValue);
            $this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());
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
        if (!CheckInteger($this->Reception->AdvancedSearch->SearchValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
        }
        if (!CheckNumber($this->amount->AdvancedSearch->SearchValue)) {
            $this->amount->addErrorMessage($this->amount->getErrorMessage(false));
        }
        if (!CheckInteger($this->patient_type->AdvancedSearch->SearchValue)) {
            $this->patient_type->addErrorMessage($this->patient_type->getErrorMessage(false));
        }
        if (!CheckDate($this->charged_date->AdvancedSearch->SearchValue)) {
            $this->charged_date->addErrorMessage($this->charged_date->getErrorMessage(false));
        }
        if (!CheckInteger($this->createdby->AdvancedSearch->SearchValue)) {
            $this->createdby->addErrorMessage($this->createdby->getErrorMessage(false));
        }
        if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckInteger($this->modifiedby->AdvancedSearch->SearchValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if (!CheckInteger($this->Unit->AdvancedSearch->SearchValue)) {
            $this->Unit->addErrorMessage($this->Unit->getErrorMessage(false));
        }
        if (!CheckInteger($this->Quantity->AdvancedSearch->SearchValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if (!CheckNumber($this->Discount->AdvancedSearch->SearchValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
        }
        if (!CheckNumber($this->SubTotal->AdvancedSearch->SearchValue)) {
            $this->SubTotal->addErrorMessage($this->SubTotal->getErrorMessage(false));
        }
        if (!CheckInteger($this->Aid->AdvancedSearch->SearchValue)) {
            $this->Aid->addErrorMessage($this->Aid->getErrorMessage(false));
        }
        if (!CheckInteger($this->Vid->AdvancedSearch->SearchValue)) {
            $this->Vid->addErrorMessage($this->Vid->getErrorMessage(false));
        }
        if (!CheckInteger($this->DrID->AdvancedSearch->SearchValue)) {
            $this->DrID->addErrorMessage($this->DrID->getErrorMessage(false));
        }
        if (!CheckNumber($this->DrSharePres->AdvancedSearch->SearchValue)) {
            $this->DrSharePres->addErrorMessage($this->DrSharePres->getErrorMessage(false));
        }
        if (!CheckNumber($this->HospSharePres->AdvancedSearch->SearchValue)) {
            $this->HospSharePres->addErrorMessage($this->HospSharePres->getErrorMessage(false));
        }
        if (!CheckNumber($this->DrShareAmount->AdvancedSearch->SearchValue)) {
            $this->DrShareAmount->addErrorMessage($this->DrShareAmount->getErrorMessage(false));
        }
        if (!CheckNumber($this->HospShareAmount->AdvancedSearch->SearchValue)) {
            $this->HospShareAmount->addErrorMessage($this->HospShareAmount->getErrorMessage(false));
        }
        if (!CheckNumber($this->DrShareSettiledAmount->AdvancedSearch->SearchValue)) {
            $this->DrShareSettiledAmount->addErrorMessage($this->DrShareSettiledAmount->getErrorMessage(false));
        }
        if (!CheckInteger($this->DrShareSettledId->AdvancedSearch->SearchValue)) {
            $this->DrShareSettledId->addErrorMessage($this->DrShareSettledId->getErrorMessage(false));
        }
        if (!CheckInteger($this->DrShareSettiledStatus->AdvancedSearch->SearchValue)) {
            $this->DrShareSettiledStatus->addErrorMessage($this->DrShareSettiledStatus->getErrorMessage(false));
        }
        if (!CheckInteger($this->invoiceId->AdvancedSearch->SearchValue)) {
            $this->invoiceId->addErrorMessage($this->invoiceId->getErrorMessage(false));
        }
        if (!CheckNumber($this->invoiceAmount->AdvancedSearch->SearchValue)) {
            $this->invoiceAmount->addErrorMessage($this->invoiceAmount->getErrorMessage(false));
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
        if (!CheckInteger($this->sid->AdvancedSearch->SearchValue)) {
            $this->sid->addErrorMessage($this->sid->getErrorMessage(false));
        }
        if (!CheckDate($this->PrintDate->AdvancedSearch->SearchValue)) {
            $this->PrintDate->addErrorMessage($this->PrintDate->getErrorMessage(false));
        }
        if (!CheckDate($this->BillingDate->AdvancedSearch->SearchValue)) {
            $this->BillingDate->addErrorMessage($this->BillingDate->getErrorMessage(false));
        }
        if (!CheckDate($this->ResultDate->AdvancedSearch->SearchValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
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
        if (!CheckDate($this->SAuthDate->AdvancedSearch->SearchValue)) {
            $this->SAuthDate->addErrorMessage($this->SAuthDate->getErrorMessage(false));
        }
        if (!CheckDate($this->AuthDate->AdvancedSearch->SearchValue)) {
            $this->AuthDate->addErrorMessage($this->AuthDate->getErrorMessage(false));
        }
        if (!CheckDate($this->EditDate->AdvancedSearch->SearchValue)) {
            $this->EditDate->addErrorMessage($this->EditDate->getErrorMessage(false));
        }
        if (!CheckInteger($this->PatID->AdvancedSearch->SearchValue)) {
            $this->PatID->addErrorMessage($this->PatID->getErrorMessage(false));
        }
        if (!CheckInteger($this->CId->AdvancedSearch->SearchValue)) {
            $this->CId->addErrorMessage($this->CId->getErrorMessage(false));
        }
        if (!CheckNumber($this->Order->AdvancedSearch->SearchValue)) {
            $this->Order->addErrorMessage($this->Order->getErrorMessage(false));
        }
        if (!CheckNumber($this->NoD->AdvancedSearch->SearchValue)) {
            $this->NoD->addErrorMessage($this->NoD->getErrorMessage(false));
        }
        if (!CheckNumber($this->BillOrder->AdvancedSearch->SearchValue)) {
            $this->BillOrder->addErrorMessage($this->BillOrder->getErrorMessage(false));
        }
        if (!CheckDate($this->RepeatedDate->AdvancedSearch->SearchValue)) {
            $this->RepeatedDate->addErrorMessage($this->RepeatedDate->getErrorMessage(false));
        }
        if (!CheckInteger($this->serviceID->AdvancedSearch->SearchValue)) {
            $this->serviceID->addErrorMessage($this->serviceID->getErrorMessage(false));
        }
        if (!CheckInteger($this->RequestNo->AdvancedSearch->SearchValue)) {
            $this->RequestNo->addErrorMessage($this->RequestNo->getErrorMessage(false));
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
        $this->Reception->AdvancedSearch->load();
        $this->Services->AdvancedSearch->load();
        $this->amount->AdvancedSearch->load();
        $this->description->AdvancedSearch->load();
        $this->patient_type->AdvancedSearch->load();
        $this->charged_date->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->Unit->AdvancedSearch->load();
        $this->Quantity->AdvancedSearch->load();
        $this->Discount->AdvancedSearch->load();
        $this->SubTotal->AdvancedSearch->load();
        $this->ServiceSelect->AdvancedSearch->load();
        $this->Aid->AdvancedSearch->load();
        $this->Vid->AdvancedSearch->load();
        $this->DrID->AdvancedSearch->load();
        $this->DrCODE->AdvancedSearch->load();
        $this->DrName->AdvancedSearch->load();
        $this->Department->AdvancedSearch->load();
        $this->DrSharePres->AdvancedSearch->load();
        $this->HospSharePres->AdvancedSearch->load();
        $this->DrShareAmount->AdvancedSearch->load();
        $this->HospShareAmount->AdvancedSearch->load();
        $this->DrShareSettiledAmount->AdvancedSearch->load();
        $this->DrShareSettledId->AdvancedSearch->load();
        $this->DrShareSettiledStatus->AdvancedSearch->load();
        $this->invoiceId->AdvancedSearch->load();
        $this->invoiceAmount->AdvancedSearch->load();
        $this->invoiceStatus->AdvancedSearch->load();
        $this->modeOfPayment->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->RIDNO->AdvancedSearch->load();
        $this->TidNo->AdvancedSearch->load();
        $this->DiscountCategory->AdvancedSearch->load();
        $this->sid->AdvancedSearch->load();
        $this->ItemCode->AdvancedSearch->load();
        $this->TestSubCd->AdvancedSearch->load();
        $this->DEptCd->AdvancedSearch->load();
        $this->ProfCd->AdvancedSearch->load();
        $this->LabReport->AdvancedSearch->load();
        $this->Comments->AdvancedSearch->load();
        $this->Method->AdvancedSearch->load();
        $this->Specimen->AdvancedSearch->load();
        $this->Abnormal->AdvancedSearch->load();
        $this->RefValue->AdvancedSearch->load();
        $this->TestUnit->AdvancedSearch->load();
        $this->LOWHIGH->AdvancedSearch->load();
        $this->Branch->AdvancedSearch->load();
        $this->Dispatch->AdvancedSearch->load();
        $this->Pic1->AdvancedSearch->load();
        $this->Pic2->AdvancedSearch->load();
        $this->GraphPath->AdvancedSearch->load();
        $this->MachineCD->AdvancedSearch->load();
        $this->TestCancel->AdvancedSearch->load();
        $this->OutSource->AdvancedSearch->load();
        $this->Printed->AdvancedSearch->load();
        $this->PrintBy->AdvancedSearch->load();
        $this->PrintDate->AdvancedSearch->load();
        $this->BillingDate->AdvancedSearch->load();
        $this->BilledBy->AdvancedSearch->load();
        $this->Resulted->AdvancedSearch->load();
        $this->ResultDate->AdvancedSearch->load();
        $this->ResultedBy->AdvancedSearch->load();
        $this->SampleDate->AdvancedSearch->load();
        $this->SampleUser->AdvancedSearch->load();
        $this->Sampled->AdvancedSearch->load();
        $this->ReceivedDate->AdvancedSearch->load();
        $this->ReceivedUser->AdvancedSearch->load();
        $this->Recevied->AdvancedSearch->load();
        $this->DeptRecvDate->AdvancedSearch->load();
        $this->DeptRecvUser->AdvancedSearch->load();
        $this->DeptRecived->AdvancedSearch->load();
        $this->SAuthDate->AdvancedSearch->load();
        $this->SAuthBy->AdvancedSearch->load();
        $this->SAuthendicate->AdvancedSearch->load();
        $this->AuthDate->AdvancedSearch->load();
        $this->AuthBy->AdvancedSearch->load();
        $this->Authencate->AdvancedSearch->load();
        $this->EditDate->AdvancedSearch->load();
        $this->EditBy->AdvancedSearch->load();
        $this->Editted->AdvancedSearch->load();
        $this->PatID->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->Mobile->AdvancedSearch->load();
        $this->CId->AdvancedSearch->load();
        $this->Order->AdvancedSearch->load();
        $this->Form->AdvancedSearch->load();
        $this->ResType->AdvancedSearch->load();
        $this->Sample->AdvancedSearch->load();
        $this->NoD->AdvancedSearch->load();
        $this->BillOrder->AdvancedSearch->load();
        $this->Formula->AdvancedSearch->load();
        $this->Inactive->AdvancedSearch->load();
        $this->CollSample->AdvancedSearch->load();
        $this->TestType->AdvancedSearch->load();
        $this->Repeated->AdvancedSearch->load();
        $this->RepeatedBy->AdvancedSearch->load();
        $this->RepeatedDate->AdvancedSearch->load();
        $this->serviceID->AdvancedSearch->load();
        $this->Service_Type->AdvancedSearch->load();
        $this->Service_Department->AdvancedSearch->load();
        $this->RequestNo->AdvancedSearch->load();
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientServicesList"), "", $this->TableVar, true);
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
