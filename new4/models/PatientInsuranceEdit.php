<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientInsuranceEdit extends PatientInsurance
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_insurance';

    // Page object name
    public $PageObjName = "PatientInsuranceEdit";

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

        // Table object (patient_insurance)
        if (!isset($GLOBALS["patient_insurance"]) || get_class($GLOBALS["patient_insurance"]) == PROJECT_NAMESPACE . "patient_insurance") {
            $GLOBALS["patient_insurance"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_insurance');
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
                $doc = new $class(Container("patient_insurance"));
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
                    if ($pageName == "PatientInsuranceView") {
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
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Company->setVisibility();
        $this->AddressInsuranceCarierName->setVisibility();
        $this->ContactName->setVisibility();
        $this->ContactMobile->setVisibility();
        $this->PolicyType->setVisibility();
        $this->PolicyName->setVisibility();
        $this->PolicyNo->setVisibility();
        $this->PolicyAmount->setVisibility();
        $this->RefLetterNo->setVisibility();
        $this->ReferenceBy->setVisibility();
        $this->ReferenceDate->setVisibility();
        $this->DocumentAttatch->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->mrnno->setVisibility();
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
                    $this->terminate("PatientInsuranceList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientInsuranceList") {
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
        $this->DocumentAttatch->Upload->Index = $CurrentForm->Index;
        $this->DocumentAttatch->Upload->uploadFile();
        $this->DocumentAttatch->CurrentValue = $this->DocumentAttatch->Upload->FileName;
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

        // Check field name 'Company' first before field var 'x_Company'
        $val = $CurrentForm->hasValue("Company") ? $CurrentForm->getValue("Company") : $CurrentForm->getValue("x_Company");
        if (!$this->Company->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Company->Visible = false; // Disable update for API request
            } else {
                $this->Company->setFormValue($val);
            }
        }

        // Check field name 'AddressInsuranceCarierName' first before field var 'x_AddressInsuranceCarierName'
        $val = $CurrentForm->hasValue("AddressInsuranceCarierName") ? $CurrentForm->getValue("AddressInsuranceCarierName") : $CurrentForm->getValue("x_AddressInsuranceCarierName");
        if (!$this->AddressInsuranceCarierName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AddressInsuranceCarierName->Visible = false; // Disable update for API request
            } else {
                $this->AddressInsuranceCarierName->setFormValue($val);
            }
        }

        // Check field name 'ContactName' first before field var 'x_ContactName'
        $val = $CurrentForm->hasValue("ContactName") ? $CurrentForm->getValue("ContactName") : $CurrentForm->getValue("x_ContactName");
        if (!$this->ContactName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ContactName->Visible = false; // Disable update for API request
            } else {
                $this->ContactName->setFormValue($val);
            }
        }

        // Check field name 'ContactMobile' first before field var 'x_ContactMobile'
        $val = $CurrentForm->hasValue("ContactMobile") ? $CurrentForm->getValue("ContactMobile") : $CurrentForm->getValue("x_ContactMobile");
        if (!$this->ContactMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ContactMobile->Visible = false; // Disable update for API request
            } else {
                $this->ContactMobile->setFormValue($val);
            }
        }

        // Check field name 'PolicyType' first before field var 'x_PolicyType'
        $val = $CurrentForm->hasValue("PolicyType") ? $CurrentForm->getValue("PolicyType") : $CurrentForm->getValue("x_PolicyType");
        if (!$this->PolicyType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PolicyType->Visible = false; // Disable update for API request
            } else {
                $this->PolicyType->setFormValue($val);
            }
        }

        // Check field name 'PolicyName' first before field var 'x_PolicyName'
        $val = $CurrentForm->hasValue("PolicyName") ? $CurrentForm->getValue("PolicyName") : $CurrentForm->getValue("x_PolicyName");
        if (!$this->PolicyName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PolicyName->Visible = false; // Disable update for API request
            } else {
                $this->PolicyName->setFormValue($val);
            }
        }

        // Check field name 'PolicyNo' first before field var 'x_PolicyNo'
        $val = $CurrentForm->hasValue("PolicyNo") ? $CurrentForm->getValue("PolicyNo") : $CurrentForm->getValue("x_PolicyNo");
        if (!$this->PolicyNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PolicyNo->Visible = false; // Disable update for API request
            } else {
                $this->PolicyNo->setFormValue($val);
            }
        }

        // Check field name 'PolicyAmount' first before field var 'x_PolicyAmount'
        $val = $CurrentForm->hasValue("PolicyAmount") ? $CurrentForm->getValue("PolicyAmount") : $CurrentForm->getValue("x_PolicyAmount");
        if (!$this->PolicyAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PolicyAmount->Visible = false; // Disable update for API request
            } else {
                $this->PolicyAmount->setFormValue($val);
            }
        }

        // Check field name 'RefLetterNo' first before field var 'x_RefLetterNo'
        $val = $CurrentForm->hasValue("RefLetterNo") ? $CurrentForm->getValue("RefLetterNo") : $CurrentForm->getValue("x_RefLetterNo");
        if (!$this->RefLetterNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefLetterNo->Visible = false; // Disable update for API request
            } else {
                $this->RefLetterNo->setFormValue($val);
            }
        }

        // Check field name 'ReferenceBy' first before field var 'x_ReferenceBy'
        $val = $CurrentForm->hasValue("ReferenceBy") ? $CurrentForm->getValue("ReferenceBy") : $CurrentForm->getValue("x_ReferenceBy");
        if (!$this->ReferenceBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferenceBy->Visible = false; // Disable update for API request
            } else {
                $this->ReferenceBy->setFormValue($val);
            }
        }

        // Check field name 'ReferenceDate' first before field var 'x_ReferenceDate'
        $val = $CurrentForm->hasValue("ReferenceDate") ? $CurrentForm->getValue("ReferenceDate") : $CurrentForm->getValue("x_ReferenceDate");
        if (!$this->ReferenceDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferenceDate->Visible = false; // Disable update for API request
            } else {
                $this->ReferenceDate->setFormValue($val);
            }
            $this->ReferenceDate->CurrentValue = UnFormatDateTime($this->ReferenceDate->CurrentValue, 0);
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
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Company->CurrentValue = $this->Company->FormValue;
        $this->AddressInsuranceCarierName->CurrentValue = $this->AddressInsuranceCarierName->FormValue;
        $this->ContactName->CurrentValue = $this->ContactName->FormValue;
        $this->ContactMobile->CurrentValue = $this->ContactMobile->FormValue;
        $this->PolicyType->CurrentValue = $this->PolicyType->FormValue;
        $this->PolicyName->CurrentValue = $this->PolicyName->FormValue;
        $this->PolicyNo->CurrentValue = $this->PolicyNo->FormValue;
        $this->PolicyAmount->CurrentValue = $this->PolicyAmount->FormValue;
        $this->RefLetterNo->CurrentValue = $this->RefLetterNo->FormValue;
        $this->ReferenceBy->CurrentValue = $this->ReferenceBy->FormValue;
        $this->ReferenceDate->CurrentValue = $this->ReferenceDate->FormValue;
        $this->ReferenceDate->CurrentValue = UnFormatDateTime($this->ReferenceDate->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
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
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Company->setDbValue($row['Company']);
        $this->AddressInsuranceCarierName->setDbValue($row['AddressInsuranceCarierName']);
        $this->ContactName->setDbValue($row['ContactName']);
        $this->ContactMobile->setDbValue($row['ContactMobile']);
        $this->PolicyType->setDbValue($row['PolicyType']);
        $this->PolicyName->setDbValue($row['PolicyName']);
        $this->PolicyNo->setDbValue($row['PolicyNo']);
        $this->PolicyAmount->setDbValue($row['PolicyAmount']);
        $this->RefLetterNo->setDbValue($row['RefLetterNo']);
        $this->ReferenceBy->setDbValue($row['ReferenceBy']);
        $this->ReferenceDate->setDbValue($row['ReferenceDate']);
        $this->DocumentAttatch->Upload->DbValue = $row['DocumentAttatch'];
        $this->DocumentAttatch->setDbValue($this->DocumentAttatch->Upload->DbValue);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->mrnno->setDbValue($row['mrnno']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['Company'] = null;
        $row['AddressInsuranceCarierName'] = null;
        $row['ContactName'] = null;
        $row['ContactMobile'] = null;
        $row['PolicyType'] = null;
        $row['PolicyName'] = null;
        $row['PolicyNo'] = null;
        $row['PolicyAmount'] = null;
        $row['RefLetterNo'] = null;
        $row['ReferenceBy'] = null;
        $row['ReferenceDate'] = null;
        $row['DocumentAttatch'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['mrnno'] = null;
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // PatientId

        // PatientName

        // Company

        // AddressInsuranceCarierName

        // ContactName

        // ContactMobile

        // PolicyType

        // PolicyName

        // PolicyNo

        // PolicyAmount

        // RefLetterNo

        // ReferenceBy

        // ReferenceDate

        // DocumentAttatch

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // mrnno
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Company
            $this->Company->ViewValue = $this->Company->CurrentValue;
            $this->Company->ViewCustomAttributes = "";

            // AddressInsuranceCarierName
            $this->AddressInsuranceCarierName->ViewValue = $this->AddressInsuranceCarierName->CurrentValue;
            $this->AddressInsuranceCarierName->ViewCustomAttributes = "";

            // ContactName
            $this->ContactName->ViewValue = $this->ContactName->CurrentValue;
            $this->ContactName->ViewCustomAttributes = "";

            // ContactMobile
            $this->ContactMobile->ViewValue = $this->ContactMobile->CurrentValue;
            $this->ContactMobile->ViewCustomAttributes = "";

            // PolicyType
            $this->PolicyType->ViewValue = $this->PolicyType->CurrentValue;
            $this->PolicyType->ViewCustomAttributes = "";

            // PolicyName
            $this->PolicyName->ViewValue = $this->PolicyName->CurrentValue;
            $this->PolicyName->ViewCustomAttributes = "";

            // PolicyNo
            $this->PolicyNo->ViewValue = $this->PolicyNo->CurrentValue;
            $this->PolicyNo->ViewCustomAttributes = "";

            // PolicyAmount
            $this->PolicyAmount->ViewValue = $this->PolicyAmount->CurrentValue;
            $this->PolicyAmount->ViewCustomAttributes = "";

            // RefLetterNo
            $this->RefLetterNo->ViewValue = $this->RefLetterNo->CurrentValue;
            $this->RefLetterNo->ViewCustomAttributes = "";

            // ReferenceBy
            $this->ReferenceBy->ViewValue = $this->ReferenceBy->CurrentValue;
            $this->ReferenceBy->ViewCustomAttributes = "";

            // ReferenceDate
            $this->ReferenceDate->ViewValue = $this->ReferenceDate->CurrentValue;
            $this->ReferenceDate->ViewValue = FormatDateTime($this->ReferenceDate->ViewValue, 0);
            $this->ReferenceDate->ViewCustomAttributes = "";

            // DocumentAttatch
            if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
                $this->DocumentAttatch->ViewValue = $this->DocumentAttatch->Upload->DbValue;
            } else {
                $this->DocumentAttatch->ViewValue = "";
            }
            $this->DocumentAttatch->ViewCustomAttributes = "";

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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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

            // Company
            $this->Company->LinkCustomAttributes = "";
            $this->Company->HrefValue = "";
            $this->Company->TooltipValue = "";

            // AddressInsuranceCarierName
            $this->AddressInsuranceCarierName->LinkCustomAttributes = "";
            $this->AddressInsuranceCarierName->HrefValue = "";
            $this->AddressInsuranceCarierName->TooltipValue = "";

            // ContactName
            $this->ContactName->LinkCustomAttributes = "";
            $this->ContactName->HrefValue = "";
            $this->ContactName->TooltipValue = "";

            // ContactMobile
            $this->ContactMobile->LinkCustomAttributes = "";
            $this->ContactMobile->HrefValue = "";
            $this->ContactMobile->TooltipValue = "";

            // PolicyType
            $this->PolicyType->LinkCustomAttributes = "";
            $this->PolicyType->HrefValue = "";
            $this->PolicyType->TooltipValue = "";

            // PolicyName
            $this->PolicyName->LinkCustomAttributes = "";
            $this->PolicyName->HrefValue = "";
            $this->PolicyName->TooltipValue = "";

            // PolicyNo
            $this->PolicyNo->LinkCustomAttributes = "";
            $this->PolicyNo->HrefValue = "";
            $this->PolicyNo->TooltipValue = "";

            // PolicyAmount
            $this->PolicyAmount->LinkCustomAttributes = "";
            $this->PolicyAmount->HrefValue = "";
            $this->PolicyAmount->TooltipValue = "";

            // RefLetterNo
            $this->RefLetterNo->LinkCustomAttributes = "";
            $this->RefLetterNo->HrefValue = "";
            $this->RefLetterNo->TooltipValue = "";

            // ReferenceBy
            $this->ReferenceBy->LinkCustomAttributes = "";
            $this->ReferenceBy->HrefValue = "";
            $this->ReferenceBy->TooltipValue = "";

            // ReferenceDate
            $this->ReferenceDate->LinkCustomAttributes = "";
            $this->ReferenceDate->HrefValue = "";
            $this->ReferenceDate->TooltipValue = "";

            // DocumentAttatch
            $this->DocumentAttatch->LinkCustomAttributes = "";
            $this->DocumentAttatch->HrefValue = "";
            $this->DocumentAttatch->ExportHrefValue = $this->DocumentAttatch->UploadPath . $this->DocumentAttatch->Upload->DbValue;
            $this->DocumentAttatch->TooltipValue = "";

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

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Company
            $this->Company->EditAttrs["class"] = "form-control";
            $this->Company->EditCustomAttributes = "";
            if (!$this->Company->Raw) {
                $this->Company->CurrentValue = HtmlDecode($this->Company->CurrentValue);
            }
            $this->Company->EditValue = HtmlEncode($this->Company->CurrentValue);
            $this->Company->PlaceHolder = RemoveHtml($this->Company->caption());

            // AddressInsuranceCarierName
            $this->AddressInsuranceCarierName->EditAttrs["class"] = "form-control";
            $this->AddressInsuranceCarierName->EditCustomAttributes = "";
            if (!$this->AddressInsuranceCarierName->Raw) {
                $this->AddressInsuranceCarierName->CurrentValue = HtmlDecode($this->AddressInsuranceCarierName->CurrentValue);
            }
            $this->AddressInsuranceCarierName->EditValue = HtmlEncode($this->AddressInsuranceCarierName->CurrentValue);
            $this->AddressInsuranceCarierName->PlaceHolder = RemoveHtml($this->AddressInsuranceCarierName->caption());

            // ContactName
            $this->ContactName->EditAttrs["class"] = "form-control";
            $this->ContactName->EditCustomAttributes = "";
            if (!$this->ContactName->Raw) {
                $this->ContactName->CurrentValue = HtmlDecode($this->ContactName->CurrentValue);
            }
            $this->ContactName->EditValue = HtmlEncode($this->ContactName->CurrentValue);
            $this->ContactName->PlaceHolder = RemoveHtml($this->ContactName->caption());

            // ContactMobile
            $this->ContactMobile->EditAttrs["class"] = "form-control";
            $this->ContactMobile->EditCustomAttributes = "";
            if (!$this->ContactMobile->Raw) {
                $this->ContactMobile->CurrentValue = HtmlDecode($this->ContactMobile->CurrentValue);
            }
            $this->ContactMobile->EditValue = HtmlEncode($this->ContactMobile->CurrentValue);
            $this->ContactMobile->PlaceHolder = RemoveHtml($this->ContactMobile->caption());

            // PolicyType
            $this->PolicyType->EditAttrs["class"] = "form-control";
            $this->PolicyType->EditCustomAttributes = "";
            if (!$this->PolicyType->Raw) {
                $this->PolicyType->CurrentValue = HtmlDecode($this->PolicyType->CurrentValue);
            }
            $this->PolicyType->EditValue = HtmlEncode($this->PolicyType->CurrentValue);
            $this->PolicyType->PlaceHolder = RemoveHtml($this->PolicyType->caption());

            // PolicyName
            $this->PolicyName->EditAttrs["class"] = "form-control";
            $this->PolicyName->EditCustomAttributes = "";
            if (!$this->PolicyName->Raw) {
                $this->PolicyName->CurrentValue = HtmlDecode($this->PolicyName->CurrentValue);
            }
            $this->PolicyName->EditValue = HtmlEncode($this->PolicyName->CurrentValue);
            $this->PolicyName->PlaceHolder = RemoveHtml($this->PolicyName->caption());

            // PolicyNo
            $this->PolicyNo->EditAttrs["class"] = "form-control";
            $this->PolicyNo->EditCustomAttributes = "";
            if (!$this->PolicyNo->Raw) {
                $this->PolicyNo->CurrentValue = HtmlDecode($this->PolicyNo->CurrentValue);
            }
            $this->PolicyNo->EditValue = HtmlEncode($this->PolicyNo->CurrentValue);
            $this->PolicyNo->PlaceHolder = RemoveHtml($this->PolicyNo->caption());

            // PolicyAmount
            $this->PolicyAmount->EditAttrs["class"] = "form-control";
            $this->PolicyAmount->EditCustomAttributes = "";
            if (!$this->PolicyAmount->Raw) {
                $this->PolicyAmount->CurrentValue = HtmlDecode($this->PolicyAmount->CurrentValue);
            }
            $this->PolicyAmount->EditValue = HtmlEncode($this->PolicyAmount->CurrentValue);
            $this->PolicyAmount->PlaceHolder = RemoveHtml($this->PolicyAmount->caption());

            // RefLetterNo
            $this->RefLetterNo->EditAttrs["class"] = "form-control";
            $this->RefLetterNo->EditCustomAttributes = "";
            if (!$this->RefLetterNo->Raw) {
                $this->RefLetterNo->CurrentValue = HtmlDecode($this->RefLetterNo->CurrentValue);
            }
            $this->RefLetterNo->EditValue = HtmlEncode($this->RefLetterNo->CurrentValue);
            $this->RefLetterNo->PlaceHolder = RemoveHtml($this->RefLetterNo->caption());

            // ReferenceBy
            $this->ReferenceBy->EditAttrs["class"] = "form-control";
            $this->ReferenceBy->EditCustomAttributes = "";
            if (!$this->ReferenceBy->Raw) {
                $this->ReferenceBy->CurrentValue = HtmlDecode($this->ReferenceBy->CurrentValue);
            }
            $this->ReferenceBy->EditValue = HtmlEncode($this->ReferenceBy->CurrentValue);
            $this->ReferenceBy->PlaceHolder = RemoveHtml($this->ReferenceBy->caption());

            // ReferenceDate
            $this->ReferenceDate->EditAttrs["class"] = "form-control";
            $this->ReferenceDate->EditCustomAttributes = "";
            $this->ReferenceDate->EditValue = HtmlEncode(FormatDateTime($this->ReferenceDate->CurrentValue, 8));
            $this->ReferenceDate->PlaceHolder = RemoveHtml($this->ReferenceDate->caption());

            // DocumentAttatch
            $this->DocumentAttatch->EditAttrs["class"] = "form-control";
            $this->DocumentAttatch->EditCustomAttributes = "";
            if (!EmptyValue($this->DocumentAttatch->Upload->DbValue)) {
                $this->DocumentAttatch->EditValue = $this->DocumentAttatch->Upload->DbValue;
            } else {
                $this->DocumentAttatch->EditValue = "";
            }
            if (!EmptyValue($this->DocumentAttatch->CurrentValue)) {
                $this->DocumentAttatch->Upload->FileName = $this->DocumentAttatch->CurrentValue;
            }
            if ($this->isShow()) {
                RenderUploadField($this->DocumentAttatch);
            }

            // modifiedby

            // modifieddatetime

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if ($this->mrnno->getSessionValue() != "") {
                $this->mrnno->CurrentValue = GetForeignKeyValue($this->mrnno->getSessionValue());
                $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
                $this->mrnno->ViewCustomAttributes = "";
            } else {
                if (!$this->mrnno->Raw) {
                    $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
                }
                $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
                $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
            }

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

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

            // Company
            $this->Company->LinkCustomAttributes = "";
            $this->Company->HrefValue = "";

            // AddressInsuranceCarierName
            $this->AddressInsuranceCarierName->LinkCustomAttributes = "";
            $this->AddressInsuranceCarierName->HrefValue = "";

            // ContactName
            $this->ContactName->LinkCustomAttributes = "";
            $this->ContactName->HrefValue = "";

            // ContactMobile
            $this->ContactMobile->LinkCustomAttributes = "";
            $this->ContactMobile->HrefValue = "";

            // PolicyType
            $this->PolicyType->LinkCustomAttributes = "";
            $this->PolicyType->HrefValue = "";

            // PolicyName
            $this->PolicyName->LinkCustomAttributes = "";
            $this->PolicyName->HrefValue = "";

            // PolicyNo
            $this->PolicyNo->LinkCustomAttributes = "";
            $this->PolicyNo->HrefValue = "";

            // PolicyAmount
            $this->PolicyAmount->LinkCustomAttributes = "";
            $this->PolicyAmount->HrefValue = "";

            // RefLetterNo
            $this->RefLetterNo->LinkCustomAttributes = "";
            $this->RefLetterNo->HrefValue = "";

            // ReferenceBy
            $this->ReferenceBy->LinkCustomAttributes = "";
            $this->ReferenceBy->HrefValue = "";

            // ReferenceDate
            $this->ReferenceDate->LinkCustomAttributes = "";
            $this->ReferenceDate->HrefValue = "";

            // DocumentAttatch
            $this->DocumentAttatch->LinkCustomAttributes = "";
            $this->DocumentAttatch->HrefValue = "";
            $this->DocumentAttatch->ExportHrefValue = $this->DocumentAttatch->UploadPath . $this->DocumentAttatch->Upload->DbValue;

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
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
        if ($this->Company->Required) {
            if (!$this->Company->IsDetailKey && EmptyValue($this->Company->FormValue)) {
                $this->Company->addErrorMessage(str_replace("%s", $this->Company->caption(), $this->Company->RequiredErrorMessage));
            }
        }
        if ($this->AddressInsuranceCarierName->Required) {
            if (!$this->AddressInsuranceCarierName->IsDetailKey && EmptyValue($this->AddressInsuranceCarierName->FormValue)) {
                $this->AddressInsuranceCarierName->addErrorMessage(str_replace("%s", $this->AddressInsuranceCarierName->caption(), $this->AddressInsuranceCarierName->RequiredErrorMessage));
            }
        }
        if ($this->ContactName->Required) {
            if (!$this->ContactName->IsDetailKey && EmptyValue($this->ContactName->FormValue)) {
                $this->ContactName->addErrorMessage(str_replace("%s", $this->ContactName->caption(), $this->ContactName->RequiredErrorMessage));
            }
        }
        if ($this->ContactMobile->Required) {
            if (!$this->ContactMobile->IsDetailKey && EmptyValue($this->ContactMobile->FormValue)) {
                $this->ContactMobile->addErrorMessage(str_replace("%s", $this->ContactMobile->caption(), $this->ContactMobile->RequiredErrorMessage));
            }
        }
        if ($this->PolicyType->Required) {
            if (!$this->PolicyType->IsDetailKey && EmptyValue($this->PolicyType->FormValue)) {
                $this->PolicyType->addErrorMessage(str_replace("%s", $this->PolicyType->caption(), $this->PolicyType->RequiredErrorMessage));
            }
        }
        if ($this->PolicyName->Required) {
            if (!$this->PolicyName->IsDetailKey && EmptyValue($this->PolicyName->FormValue)) {
                $this->PolicyName->addErrorMessage(str_replace("%s", $this->PolicyName->caption(), $this->PolicyName->RequiredErrorMessage));
            }
        }
        if ($this->PolicyNo->Required) {
            if (!$this->PolicyNo->IsDetailKey && EmptyValue($this->PolicyNo->FormValue)) {
                $this->PolicyNo->addErrorMessage(str_replace("%s", $this->PolicyNo->caption(), $this->PolicyNo->RequiredErrorMessage));
            }
        }
        if ($this->PolicyAmount->Required) {
            if (!$this->PolicyAmount->IsDetailKey && EmptyValue($this->PolicyAmount->FormValue)) {
                $this->PolicyAmount->addErrorMessage(str_replace("%s", $this->PolicyAmount->caption(), $this->PolicyAmount->RequiredErrorMessage));
            }
        }
        if ($this->RefLetterNo->Required) {
            if (!$this->RefLetterNo->IsDetailKey && EmptyValue($this->RefLetterNo->FormValue)) {
                $this->RefLetterNo->addErrorMessage(str_replace("%s", $this->RefLetterNo->caption(), $this->RefLetterNo->RequiredErrorMessage));
            }
        }
        if ($this->ReferenceBy->Required) {
            if (!$this->ReferenceBy->IsDetailKey && EmptyValue($this->ReferenceBy->FormValue)) {
                $this->ReferenceBy->addErrorMessage(str_replace("%s", $this->ReferenceBy->caption(), $this->ReferenceBy->RequiredErrorMessage));
            }
        }
        if ($this->ReferenceDate->Required) {
            if (!$this->ReferenceDate->IsDetailKey && EmptyValue($this->ReferenceDate->FormValue)) {
                $this->ReferenceDate->addErrorMessage(str_replace("%s", $this->ReferenceDate->caption(), $this->ReferenceDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ReferenceDate->FormValue)) {
            $this->ReferenceDate->addErrorMessage($this->ReferenceDate->getErrorMessage(false));
        }
        if ($this->DocumentAttatch->Required) {
            if ($this->DocumentAttatch->Upload->FileName == "" && !$this->DocumentAttatch->Upload->KeepFile) {
                $this->DocumentAttatch->addErrorMessage(str_replace("%s", $this->DocumentAttatch->caption(), $this->DocumentAttatch->RequiredErrorMessage));
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

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Company
            $this->Company->setDbValueDef($rsnew, $this->Company->CurrentValue, null, $this->Company->ReadOnly);

            // AddressInsuranceCarierName
            $this->AddressInsuranceCarierName->setDbValueDef($rsnew, $this->AddressInsuranceCarierName->CurrentValue, null, $this->AddressInsuranceCarierName->ReadOnly);

            // ContactName
            $this->ContactName->setDbValueDef($rsnew, $this->ContactName->CurrentValue, null, $this->ContactName->ReadOnly);

            // ContactMobile
            $this->ContactMobile->setDbValueDef($rsnew, $this->ContactMobile->CurrentValue, null, $this->ContactMobile->ReadOnly);

            // PolicyType
            $this->PolicyType->setDbValueDef($rsnew, $this->PolicyType->CurrentValue, null, $this->PolicyType->ReadOnly);

            // PolicyName
            $this->PolicyName->setDbValueDef($rsnew, $this->PolicyName->CurrentValue, null, $this->PolicyName->ReadOnly);

            // PolicyNo
            $this->PolicyNo->setDbValueDef($rsnew, $this->PolicyNo->CurrentValue, null, $this->PolicyNo->ReadOnly);

            // PolicyAmount
            $this->PolicyAmount->setDbValueDef($rsnew, $this->PolicyAmount->CurrentValue, null, $this->PolicyAmount->ReadOnly);

            // RefLetterNo
            $this->RefLetterNo->setDbValueDef($rsnew, $this->RefLetterNo->CurrentValue, null, $this->RefLetterNo->ReadOnly);

            // ReferenceBy
            $this->ReferenceBy->setDbValueDef($rsnew, $this->ReferenceBy->CurrentValue, null, $this->ReferenceBy->ReadOnly);

            // ReferenceDate
            $this->ReferenceDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReferenceDate->CurrentValue, 0), null, $this->ReferenceDate->ReadOnly);

            // DocumentAttatch
            if ($this->DocumentAttatch->Visible && !$this->DocumentAttatch->ReadOnly && !$this->DocumentAttatch->Upload->KeepFile) {
                $this->DocumentAttatch->Upload->DbValue = $rsold['DocumentAttatch']; // Get original value
                if ($this->DocumentAttatch->Upload->FileName == "") {
                    $rsnew['DocumentAttatch'] = null;
                } else {
                    $rsnew['DocumentAttatch'] = $this->DocumentAttatch->Upload->FileName;
                }
            }

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserID();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // mrnno
            if ($this->mrnno->getSessionValue() != "") {
                $this->mrnno->ReadOnly = true;
            }
            $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, $this->mrnno->ReadOnly);
            if ($this->DocumentAttatch->Visible && !$this->DocumentAttatch->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->DocumentAttatch->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->htmlDecode(strval($this->DocumentAttatch->Upload->DbValue)));
                if (!EmptyValue($this->DocumentAttatch->Upload->FileName)) {
                    $newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), strval($this->DocumentAttatch->Upload->FileName));
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->DocumentAttatch, $this->DocumentAttatch->Upload->Index);
                            if (file_exists($tempPath . $file)) {
                                if (Config("DELETE_UPLOADED_FILES")) {
                                    $oldFileFound = false;
                                    $oldFileCount = count($oldFiles);
                                    for ($j = 0; $j < $oldFileCount; $j++) {
                                        $oldFile = $oldFiles[$j];
                                        if ($oldFile == $file) { // Old file found, no need to delete anymore
                                            array_splice($oldFiles, $j, 1);
                                            $oldFileFound = true;
                                            break;
                                        }
                                    }
                                    if ($oldFileFound) { // No need to check if file exists further
                                        continue;
                                    }
                                }
                                $file1 = UniqueFilename($this->DocumentAttatch->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->DocumentAttatch->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->DocumentAttatch->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->DocumentAttatch->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->DocumentAttatch->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->DocumentAttatch->setDbValueDef($rsnew, $this->DocumentAttatch->Upload->FileName, null, $this->DocumentAttatch->ReadOnly);
                }
            }

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
                    if ($this->DocumentAttatch->Visible && !$this->DocumentAttatch->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->DocumentAttatch->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->htmlDecode(strval($this->DocumentAttatch->Upload->DbValue)));
                        if (!EmptyValue($this->DocumentAttatch->Upload->FileName)) {
                            $newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->Upload->FileName);
                            $newFiles2 = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->DocumentAttatch->htmlDecode($rsnew['DocumentAttatch']));
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->DocumentAttatch, $this->DocumentAttatch->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->DocumentAttatch->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                            $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                            return false;
                                        }
                                    }
                                }
                            }
                        } else {
                            $newFiles = [];
                        }
                        if (Config("DELETE_UPLOADED_FILES")) {
                            foreach ($oldFiles as $oldFile) {
                                if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                    @unlink($this->DocumentAttatch->oldPhysicalUploadPath() . $oldFile);
                                }
                            }
                        }
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
            // DocumentAttatch
            CleanUploadTempPath($this->DocumentAttatch, $this->DocumentAttatch->Upload->Index);
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
                if (($parm = Get("fk_patient_id", Get("PatientId"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PatientId->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
                    if (!is_numeric($masterTbl->patient_id->QueryStringValue)) {
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
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
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
                if (($parm = Post("fk_patient_id", Post("PatientId"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PatientId->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PatientId->setSessionValue($this->PatientId->FormValue);
                    if (!is_numeric($masterTbl->patient_id->FormValue)) {
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
            if ($masterTblVar != "ip_admission") {
                if ($this->Reception->CurrentValue == "") {
                    $this->Reception->setSessionValue("");
                }
                if ($this->PatientId->CurrentValue == "") {
                    $this->PatientId->setSessionValue("");
                }
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientInsuranceList"), "", $this->TableVar, true);
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
