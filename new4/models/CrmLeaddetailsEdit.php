<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmLeaddetailsEdit extends CrmLeaddetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_leaddetails';

    // Page object name
    public $PageObjName = "CrmLeaddetailsEdit";

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

        // Table object (crm_leaddetails)
        if (!isset($GLOBALS["crm_leaddetails"]) || get_class($GLOBALS["crm_leaddetails"]) == PROJECT_NAMESPACE . "crm_leaddetails") {
            $GLOBALS["crm_leaddetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leaddetails');
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
                $doc = new $class(Container("crm_leaddetails"));
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
                    if ($pageName == "CrmLeaddetailsView") {
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
            $key .= @$ar['leadid'];
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
        $this->leadid->setVisibility();
        $this->lead_no->setVisibility();
        $this->_email->setVisibility();
        $this->interest->setVisibility();
        $this->firstname->setVisibility();
        $this->salutation->setVisibility();
        $this->lastname->setVisibility();
        $this->company->setVisibility();
        $this->annualrevenue->setVisibility();
        $this->industry->setVisibility();
        $this->campaign->setVisibility();
        $this->leadstatus->setVisibility();
        $this->leadsource->setVisibility();
        $this->converted->setVisibility();
        $this->licencekeystatus->setVisibility();
        $this->space->setVisibility();
        $this->comments->setVisibility();
        $this->priority->setVisibility();
        $this->demorequest->setVisibility();
        $this->partnercontact->setVisibility();
        $this->productversion->setVisibility();
        $this->product->setVisibility();
        $this->maildate->setVisibility();
        $this->nextstepdate->setVisibility();
        $this->fundingsituation->setVisibility();
        $this->purpose->setVisibility();
        $this->evaluationstatus->setVisibility();
        $this->transferdate->setVisibility();
        $this->revenuetype->setVisibility();
        $this->noofemployees->setVisibility();
        $this->secondaryemail->setVisibility();
        $this->noapprovalcalls->setVisibility();
        $this->noapprovalemails->setVisibility();
        $this->vat_id->setVisibility();
        $this->registration_number_1->setVisibility();
        $this->registration_number_2->setVisibility();
        $this->verification->setVisibility();
        $this->subindustry->setVisibility();
        $this->atenttion->setVisibility();
        $this->leads_relation->setVisibility();
        $this->legal_form->setVisibility();
        $this->sum_time->setVisibility();
        $this->active->setVisibility();
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
            if (($keyValue = Get("leadid") ?? Key(0) ?? Route(2)) !== null) {
                $this->leadid->setQueryStringValue($keyValue);
                $this->leadid->setOldValue($this->leadid->QueryStringValue);
            } elseif (Post("leadid") !== null) {
                $this->leadid->setFormValue(Post("leadid"));
                $this->leadid->setOldValue($this->leadid->FormValue);
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
                if (($keyValue = Get("leadid") ?? Route("leadid")) !== null) {
                    $this->leadid->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->leadid->CurrentValue = null;
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
                    $this->terminate("CrmLeaddetailsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "CrmLeaddetailsList") {
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

        // Check field name 'leadid' first before field var 'x_leadid'
        $val = $CurrentForm->hasValue("leadid") ? $CurrentForm->getValue("leadid") : $CurrentForm->getValue("x_leadid");
        if (!$this->leadid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leadid->Visible = false; // Disable update for API request
            } else {
                $this->leadid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_leadid")) {
            $this->leadid->setOldValue($CurrentForm->getValue("o_leadid"));
        }

        // Check field name 'lead_no' first before field var 'x_lead_no'
        $val = $CurrentForm->hasValue("lead_no") ? $CurrentForm->getValue("lead_no") : $CurrentForm->getValue("x_lead_no");
        if (!$this->lead_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->lead_no->Visible = false; // Disable update for API request
            } else {
                $this->lead_no->setFormValue($val);
            }
        }

        // Check field name 'email' first before field var 'x__email'
        $val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
        if (!$this->_email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_email->Visible = false; // Disable update for API request
            } else {
                $this->_email->setFormValue($val);
            }
        }

        // Check field name 'interest' first before field var 'x_interest'
        $val = $CurrentForm->hasValue("interest") ? $CurrentForm->getValue("interest") : $CurrentForm->getValue("x_interest");
        if (!$this->interest->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->interest->Visible = false; // Disable update for API request
            } else {
                $this->interest->setFormValue($val);
            }
        }

        // Check field name 'firstname' first before field var 'x_firstname'
        $val = $CurrentForm->hasValue("firstname") ? $CurrentForm->getValue("firstname") : $CurrentForm->getValue("x_firstname");
        if (!$this->firstname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->firstname->Visible = false; // Disable update for API request
            } else {
                $this->firstname->setFormValue($val);
            }
        }

        // Check field name 'salutation' first before field var 'x_salutation'
        $val = $CurrentForm->hasValue("salutation") ? $CurrentForm->getValue("salutation") : $CurrentForm->getValue("x_salutation");
        if (!$this->salutation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->salutation->Visible = false; // Disable update for API request
            } else {
                $this->salutation->setFormValue($val);
            }
        }

        // Check field name 'lastname' first before field var 'x_lastname'
        $val = $CurrentForm->hasValue("lastname") ? $CurrentForm->getValue("lastname") : $CurrentForm->getValue("x_lastname");
        if (!$this->lastname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->lastname->Visible = false; // Disable update for API request
            } else {
                $this->lastname->setFormValue($val);
            }
        }

        // Check field name 'company' first before field var 'x_company'
        $val = $CurrentForm->hasValue("company") ? $CurrentForm->getValue("company") : $CurrentForm->getValue("x_company");
        if (!$this->company->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->company->Visible = false; // Disable update for API request
            } else {
                $this->company->setFormValue($val);
            }
        }

        // Check field name 'annualrevenue' first before field var 'x_annualrevenue'
        $val = $CurrentForm->hasValue("annualrevenue") ? $CurrentForm->getValue("annualrevenue") : $CurrentForm->getValue("x_annualrevenue");
        if (!$this->annualrevenue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->annualrevenue->Visible = false; // Disable update for API request
            } else {
                $this->annualrevenue->setFormValue($val);
            }
        }

        // Check field name 'industry' first before field var 'x_industry'
        $val = $CurrentForm->hasValue("industry") ? $CurrentForm->getValue("industry") : $CurrentForm->getValue("x_industry");
        if (!$this->industry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->industry->Visible = false; // Disable update for API request
            } else {
                $this->industry->setFormValue($val);
            }
        }

        // Check field name 'campaign' first before field var 'x_campaign'
        $val = $CurrentForm->hasValue("campaign") ? $CurrentForm->getValue("campaign") : $CurrentForm->getValue("x_campaign");
        if (!$this->campaign->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->campaign->Visible = false; // Disable update for API request
            } else {
                $this->campaign->setFormValue($val);
            }
        }

        // Check field name 'leadstatus' first before field var 'x_leadstatus'
        $val = $CurrentForm->hasValue("leadstatus") ? $CurrentForm->getValue("leadstatus") : $CurrentForm->getValue("x_leadstatus");
        if (!$this->leadstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leadstatus->Visible = false; // Disable update for API request
            } else {
                $this->leadstatus->setFormValue($val);
            }
        }

        // Check field name 'leadsource' first before field var 'x_leadsource'
        $val = $CurrentForm->hasValue("leadsource") ? $CurrentForm->getValue("leadsource") : $CurrentForm->getValue("x_leadsource");
        if (!$this->leadsource->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leadsource->Visible = false; // Disable update for API request
            } else {
                $this->leadsource->setFormValue($val);
            }
        }

        // Check field name 'converted' first before field var 'x_converted'
        $val = $CurrentForm->hasValue("converted") ? $CurrentForm->getValue("converted") : $CurrentForm->getValue("x_converted");
        if (!$this->converted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->converted->Visible = false; // Disable update for API request
            } else {
                $this->converted->setFormValue($val);
            }
        }

        // Check field name 'licencekeystatus' first before field var 'x_licencekeystatus'
        $val = $CurrentForm->hasValue("licencekeystatus") ? $CurrentForm->getValue("licencekeystatus") : $CurrentForm->getValue("x_licencekeystatus");
        if (!$this->licencekeystatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->licencekeystatus->Visible = false; // Disable update for API request
            } else {
                $this->licencekeystatus->setFormValue($val);
            }
        }

        // Check field name 'space' first before field var 'x_space'
        $val = $CurrentForm->hasValue("space") ? $CurrentForm->getValue("space") : $CurrentForm->getValue("x_space");
        if (!$this->space->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->space->Visible = false; // Disable update for API request
            } else {
                $this->space->setFormValue($val);
            }
        }

        // Check field name 'comments' first before field var 'x_comments'
        $val = $CurrentForm->hasValue("comments") ? $CurrentForm->getValue("comments") : $CurrentForm->getValue("x_comments");
        if (!$this->comments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->comments->Visible = false; // Disable update for API request
            } else {
                $this->comments->setFormValue($val);
            }
        }

        // Check field name 'priority' first before field var 'x_priority'
        $val = $CurrentForm->hasValue("priority") ? $CurrentForm->getValue("priority") : $CurrentForm->getValue("x_priority");
        if (!$this->priority->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->priority->Visible = false; // Disable update for API request
            } else {
                $this->priority->setFormValue($val);
            }
        }

        // Check field name 'demorequest' first before field var 'x_demorequest'
        $val = $CurrentForm->hasValue("demorequest") ? $CurrentForm->getValue("demorequest") : $CurrentForm->getValue("x_demorequest");
        if (!$this->demorequest->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->demorequest->Visible = false; // Disable update for API request
            } else {
                $this->demorequest->setFormValue($val);
            }
        }

        // Check field name 'partnercontact' first before field var 'x_partnercontact'
        $val = $CurrentForm->hasValue("partnercontact") ? $CurrentForm->getValue("partnercontact") : $CurrentForm->getValue("x_partnercontact");
        if (!$this->partnercontact->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->partnercontact->Visible = false; // Disable update for API request
            } else {
                $this->partnercontact->setFormValue($val);
            }
        }

        // Check field name 'productversion' first before field var 'x_productversion'
        $val = $CurrentForm->hasValue("productversion") ? $CurrentForm->getValue("productversion") : $CurrentForm->getValue("x_productversion");
        if (!$this->productversion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->productversion->Visible = false; // Disable update for API request
            } else {
                $this->productversion->setFormValue($val);
            }
        }

        // Check field name 'product' first before field var 'x_product'
        $val = $CurrentForm->hasValue("product") ? $CurrentForm->getValue("product") : $CurrentForm->getValue("x_product");
        if (!$this->product->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->product->Visible = false; // Disable update for API request
            } else {
                $this->product->setFormValue($val);
            }
        }

        // Check field name 'maildate' first before field var 'x_maildate'
        $val = $CurrentForm->hasValue("maildate") ? $CurrentForm->getValue("maildate") : $CurrentForm->getValue("x_maildate");
        if (!$this->maildate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->maildate->Visible = false; // Disable update for API request
            } else {
                $this->maildate->setFormValue($val);
            }
            $this->maildate->CurrentValue = UnFormatDateTime($this->maildate->CurrentValue, 0);
        }

        // Check field name 'nextstepdate' first before field var 'x_nextstepdate'
        $val = $CurrentForm->hasValue("nextstepdate") ? $CurrentForm->getValue("nextstepdate") : $CurrentForm->getValue("x_nextstepdate");
        if (!$this->nextstepdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->nextstepdate->Visible = false; // Disable update for API request
            } else {
                $this->nextstepdate->setFormValue($val);
            }
            $this->nextstepdate->CurrentValue = UnFormatDateTime($this->nextstepdate->CurrentValue, 0);
        }

        // Check field name 'fundingsituation' first before field var 'x_fundingsituation'
        $val = $CurrentForm->hasValue("fundingsituation") ? $CurrentForm->getValue("fundingsituation") : $CurrentForm->getValue("x_fundingsituation");
        if (!$this->fundingsituation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->fundingsituation->Visible = false; // Disable update for API request
            } else {
                $this->fundingsituation->setFormValue($val);
            }
        }

        // Check field name 'purpose' first before field var 'x_purpose'
        $val = $CurrentForm->hasValue("purpose") ? $CurrentForm->getValue("purpose") : $CurrentForm->getValue("x_purpose");
        if (!$this->purpose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->purpose->Visible = false; // Disable update for API request
            } else {
                $this->purpose->setFormValue($val);
            }
        }

        // Check field name 'evaluationstatus' first before field var 'x_evaluationstatus'
        $val = $CurrentForm->hasValue("evaluationstatus") ? $CurrentForm->getValue("evaluationstatus") : $CurrentForm->getValue("x_evaluationstatus");
        if (!$this->evaluationstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->evaluationstatus->Visible = false; // Disable update for API request
            } else {
                $this->evaluationstatus->setFormValue($val);
            }
        }

        // Check field name 'transferdate' first before field var 'x_transferdate'
        $val = $CurrentForm->hasValue("transferdate") ? $CurrentForm->getValue("transferdate") : $CurrentForm->getValue("x_transferdate");
        if (!$this->transferdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->transferdate->Visible = false; // Disable update for API request
            } else {
                $this->transferdate->setFormValue($val);
            }
            $this->transferdate->CurrentValue = UnFormatDateTime($this->transferdate->CurrentValue, 0);
        }

        // Check field name 'revenuetype' first before field var 'x_revenuetype'
        $val = $CurrentForm->hasValue("revenuetype") ? $CurrentForm->getValue("revenuetype") : $CurrentForm->getValue("x_revenuetype");
        if (!$this->revenuetype->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->revenuetype->Visible = false; // Disable update for API request
            } else {
                $this->revenuetype->setFormValue($val);
            }
        }

        // Check field name 'noofemployees' first before field var 'x_noofemployees'
        $val = $CurrentForm->hasValue("noofemployees") ? $CurrentForm->getValue("noofemployees") : $CurrentForm->getValue("x_noofemployees");
        if (!$this->noofemployees->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->noofemployees->Visible = false; // Disable update for API request
            } else {
                $this->noofemployees->setFormValue($val);
            }
        }

        // Check field name 'secondaryemail' first before field var 'x_secondaryemail'
        $val = $CurrentForm->hasValue("secondaryemail") ? $CurrentForm->getValue("secondaryemail") : $CurrentForm->getValue("x_secondaryemail");
        if (!$this->secondaryemail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->secondaryemail->Visible = false; // Disable update for API request
            } else {
                $this->secondaryemail->setFormValue($val);
            }
        }

        // Check field name 'noapprovalcalls' first before field var 'x_noapprovalcalls'
        $val = $CurrentForm->hasValue("noapprovalcalls") ? $CurrentForm->getValue("noapprovalcalls") : $CurrentForm->getValue("x_noapprovalcalls");
        if (!$this->noapprovalcalls->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->noapprovalcalls->Visible = false; // Disable update for API request
            } else {
                $this->noapprovalcalls->setFormValue($val);
            }
        }

        // Check field name 'noapprovalemails' first before field var 'x_noapprovalemails'
        $val = $CurrentForm->hasValue("noapprovalemails") ? $CurrentForm->getValue("noapprovalemails") : $CurrentForm->getValue("x_noapprovalemails");
        if (!$this->noapprovalemails->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->noapprovalemails->Visible = false; // Disable update for API request
            } else {
                $this->noapprovalemails->setFormValue($val);
            }
        }

        // Check field name 'vat_id' first before field var 'x_vat_id'
        $val = $CurrentForm->hasValue("vat_id") ? $CurrentForm->getValue("vat_id") : $CurrentForm->getValue("x_vat_id");
        if (!$this->vat_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vat_id->Visible = false; // Disable update for API request
            } else {
                $this->vat_id->setFormValue($val);
            }
        }

        // Check field name 'registration_number_1' first before field var 'x_registration_number_1'
        $val = $CurrentForm->hasValue("registration_number_1") ? $CurrentForm->getValue("registration_number_1") : $CurrentForm->getValue("x_registration_number_1");
        if (!$this->registration_number_1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->registration_number_1->Visible = false; // Disable update for API request
            } else {
                $this->registration_number_1->setFormValue($val);
            }
        }

        // Check field name 'registration_number_2' first before field var 'x_registration_number_2'
        $val = $CurrentForm->hasValue("registration_number_2") ? $CurrentForm->getValue("registration_number_2") : $CurrentForm->getValue("x_registration_number_2");
        if (!$this->registration_number_2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->registration_number_2->Visible = false; // Disable update for API request
            } else {
                $this->registration_number_2->setFormValue($val);
            }
        }

        // Check field name 'verification' first before field var 'x_verification'
        $val = $CurrentForm->hasValue("verification") ? $CurrentForm->getValue("verification") : $CurrentForm->getValue("x_verification");
        if (!$this->verification->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->verification->Visible = false; // Disable update for API request
            } else {
                $this->verification->setFormValue($val);
            }
        }

        // Check field name 'subindustry' first before field var 'x_subindustry'
        $val = $CurrentForm->hasValue("subindustry") ? $CurrentForm->getValue("subindustry") : $CurrentForm->getValue("x_subindustry");
        if (!$this->subindustry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->subindustry->Visible = false; // Disable update for API request
            } else {
                $this->subindustry->setFormValue($val);
            }
        }

        // Check field name 'atenttion' first before field var 'x_atenttion'
        $val = $CurrentForm->hasValue("atenttion") ? $CurrentForm->getValue("atenttion") : $CurrentForm->getValue("x_atenttion");
        if (!$this->atenttion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->atenttion->Visible = false; // Disable update for API request
            } else {
                $this->atenttion->setFormValue($val);
            }
        }

        // Check field name 'leads_relation' first before field var 'x_leads_relation'
        $val = $CurrentForm->hasValue("leads_relation") ? $CurrentForm->getValue("leads_relation") : $CurrentForm->getValue("x_leads_relation");
        if (!$this->leads_relation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leads_relation->Visible = false; // Disable update for API request
            } else {
                $this->leads_relation->setFormValue($val);
            }
        }

        // Check field name 'legal_form' first before field var 'x_legal_form'
        $val = $CurrentForm->hasValue("legal_form") ? $CurrentForm->getValue("legal_form") : $CurrentForm->getValue("x_legal_form");
        if (!$this->legal_form->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->legal_form->Visible = false; // Disable update for API request
            } else {
                $this->legal_form->setFormValue($val);
            }
        }

        // Check field name 'sum_time' first before field var 'x_sum_time'
        $val = $CurrentForm->hasValue("sum_time") ? $CurrentForm->getValue("sum_time") : $CurrentForm->getValue("x_sum_time");
        if (!$this->sum_time->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sum_time->Visible = false; // Disable update for API request
            } else {
                $this->sum_time->setFormValue($val);
            }
        }

        // Check field name 'active' first before field var 'x_active'
        $val = $CurrentForm->hasValue("active") ? $CurrentForm->getValue("active") : $CurrentForm->getValue("x_active");
        if (!$this->active->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->active->Visible = false; // Disable update for API request
            } else {
                $this->active->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->leadid->CurrentValue = $this->leadid->FormValue;
        $this->lead_no->CurrentValue = $this->lead_no->FormValue;
        $this->_email->CurrentValue = $this->_email->FormValue;
        $this->interest->CurrentValue = $this->interest->FormValue;
        $this->firstname->CurrentValue = $this->firstname->FormValue;
        $this->salutation->CurrentValue = $this->salutation->FormValue;
        $this->lastname->CurrentValue = $this->lastname->FormValue;
        $this->company->CurrentValue = $this->company->FormValue;
        $this->annualrevenue->CurrentValue = $this->annualrevenue->FormValue;
        $this->industry->CurrentValue = $this->industry->FormValue;
        $this->campaign->CurrentValue = $this->campaign->FormValue;
        $this->leadstatus->CurrentValue = $this->leadstatus->FormValue;
        $this->leadsource->CurrentValue = $this->leadsource->FormValue;
        $this->converted->CurrentValue = $this->converted->FormValue;
        $this->licencekeystatus->CurrentValue = $this->licencekeystatus->FormValue;
        $this->space->CurrentValue = $this->space->FormValue;
        $this->comments->CurrentValue = $this->comments->FormValue;
        $this->priority->CurrentValue = $this->priority->FormValue;
        $this->demorequest->CurrentValue = $this->demorequest->FormValue;
        $this->partnercontact->CurrentValue = $this->partnercontact->FormValue;
        $this->productversion->CurrentValue = $this->productversion->FormValue;
        $this->product->CurrentValue = $this->product->FormValue;
        $this->maildate->CurrentValue = $this->maildate->FormValue;
        $this->maildate->CurrentValue = UnFormatDateTime($this->maildate->CurrentValue, 0);
        $this->nextstepdate->CurrentValue = $this->nextstepdate->FormValue;
        $this->nextstepdate->CurrentValue = UnFormatDateTime($this->nextstepdate->CurrentValue, 0);
        $this->fundingsituation->CurrentValue = $this->fundingsituation->FormValue;
        $this->purpose->CurrentValue = $this->purpose->FormValue;
        $this->evaluationstatus->CurrentValue = $this->evaluationstatus->FormValue;
        $this->transferdate->CurrentValue = $this->transferdate->FormValue;
        $this->transferdate->CurrentValue = UnFormatDateTime($this->transferdate->CurrentValue, 0);
        $this->revenuetype->CurrentValue = $this->revenuetype->FormValue;
        $this->noofemployees->CurrentValue = $this->noofemployees->FormValue;
        $this->secondaryemail->CurrentValue = $this->secondaryemail->FormValue;
        $this->noapprovalcalls->CurrentValue = $this->noapprovalcalls->FormValue;
        $this->noapprovalemails->CurrentValue = $this->noapprovalemails->FormValue;
        $this->vat_id->CurrentValue = $this->vat_id->FormValue;
        $this->registration_number_1->CurrentValue = $this->registration_number_1->FormValue;
        $this->registration_number_2->CurrentValue = $this->registration_number_2->FormValue;
        $this->verification->CurrentValue = $this->verification->FormValue;
        $this->subindustry->CurrentValue = $this->subindustry->FormValue;
        $this->atenttion->CurrentValue = $this->atenttion->FormValue;
        $this->leads_relation->CurrentValue = $this->leads_relation->FormValue;
        $this->legal_form->CurrentValue = $this->legal_form->FormValue;
        $this->sum_time->CurrentValue = $this->sum_time->FormValue;
        $this->active->CurrentValue = $this->active->FormValue;
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
        $this->leadid->setDbValue($row['leadid']);
        $this->lead_no->setDbValue($row['lead_no']);
        $this->_email->setDbValue($row['email']);
        $this->interest->setDbValue($row['interest']);
        $this->firstname->setDbValue($row['firstname']);
        $this->salutation->setDbValue($row['salutation']);
        $this->lastname->setDbValue($row['lastname']);
        $this->company->setDbValue($row['company']);
        $this->annualrevenue->setDbValue($row['annualrevenue']);
        $this->industry->setDbValue($row['industry']);
        $this->campaign->setDbValue($row['campaign']);
        $this->leadstatus->setDbValue($row['leadstatus']);
        $this->leadsource->setDbValue($row['leadsource']);
        $this->converted->setDbValue($row['converted']);
        $this->licencekeystatus->setDbValue($row['licencekeystatus']);
        $this->space->setDbValue($row['space']);
        $this->comments->setDbValue($row['comments']);
        $this->priority->setDbValue($row['priority']);
        $this->demorequest->setDbValue($row['demorequest']);
        $this->partnercontact->setDbValue($row['partnercontact']);
        $this->productversion->setDbValue($row['productversion']);
        $this->product->setDbValue($row['product']);
        $this->maildate->setDbValue($row['maildate']);
        $this->nextstepdate->setDbValue($row['nextstepdate']);
        $this->fundingsituation->setDbValue($row['fundingsituation']);
        $this->purpose->setDbValue($row['purpose']);
        $this->evaluationstatus->setDbValue($row['evaluationstatus']);
        $this->transferdate->setDbValue($row['transferdate']);
        $this->revenuetype->setDbValue($row['revenuetype']);
        $this->noofemployees->setDbValue($row['noofemployees']);
        $this->secondaryemail->setDbValue($row['secondaryemail']);
        $this->noapprovalcalls->setDbValue($row['noapprovalcalls']);
        $this->noapprovalemails->setDbValue($row['noapprovalemails']);
        $this->vat_id->setDbValue($row['vat_id']);
        $this->registration_number_1->setDbValue($row['registration_number_1']);
        $this->registration_number_2->setDbValue($row['registration_number_2']);
        $this->verification->setDbValue($row['verification']);
        $this->subindustry->setDbValue($row['subindustry']);
        $this->atenttion->setDbValue($row['atenttion']);
        $this->leads_relation->setDbValue($row['leads_relation']);
        $this->legal_form->setDbValue($row['legal_form']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->active->setDbValue($row['active']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['leadid'] = null;
        $row['lead_no'] = null;
        $row['email'] = null;
        $row['interest'] = null;
        $row['firstname'] = null;
        $row['salutation'] = null;
        $row['lastname'] = null;
        $row['company'] = null;
        $row['annualrevenue'] = null;
        $row['industry'] = null;
        $row['campaign'] = null;
        $row['leadstatus'] = null;
        $row['leadsource'] = null;
        $row['converted'] = null;
        $row['licencekeystatus'] = null;
        $row['space'] = null;
        $row['comments'] = null;
        $row['priority'] = null;
        $row['demorequest'] = null;
        $row['partnercontact'] = null;
        $row['productversion'] = null;
        $row['product'] = null;
        $row['maildate'] = null;
        $row['nextstepdate'] = null;
        $row['fundingsituation'] = null;
        $row['purpose'] = null;
        $row['evaluationstatus'] = null;
        $row['transferdate'] = null;
        $row['revenuetype'] = null;
        $row['noofemployees'] = null;
        $row['secondaryemail'] = null;
        $row['noapprovalcalls'] = null;
        $row['noapprovalemails'] = null;
        $row['vat_id'] = null;
        $row['registration_number_1'] = null;
        $row['registration_number_2'] = null;
        $row['verification'] = null;
        $row['subindustry'] = null;
        $row['atenttion'] = null;
        $row['leads_relation'] = null;
        $row['legal_form'] = null;
        $row['sum_time'] = null;
        $row['active'] = null;
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
        if ($this->annualrevenue->FormValue == $this->annualrevenue->CurrentValue && is_numeric(ConvertToFloatString($this->annualrevenue->CurrentValue))) {
            $this->annualrevenue->CurrentValue = ConvertToFloatString($this->annualrevenue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue))) {
            $this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // leadid

        // lead_no

        // email

        // interest

        // firstname

        // salutation

        // lastname

        // company

        // annualrevenue

        // industry

        // campaign

        // leadstatus

        // leadsource

        // converted

        // licencekeystatus

        // space

        // comments

        // priority

        // demorequest

        // partnercontact

        // productversion

        // product

        // maildate

        // nextstepdate

        // fundingsituation

        // purpose

        // evaluationstatus

        // transferdate

        // revenuetype

        // noofemployees

        // secondaryemail

        // noapprovalcalls

        // noapprovalemails

        // vat_id

        // registration_number_1

        // registration_number_2

        // verification

        // subindustry

        // atenttion

        // leads_relation

        // legal_form

        // sum_time

        // active
        if ($this->RowType == ROWTYPE_VIEW) {
            // leadid
            $this->leadid->ViewValue = $this->leadid->CurrentValue;
            $this->leadid->ViewValue = FormatNumber($this->leadid->ViewValue, 0, -2, -2, -2);
            $this->leadid->ViewCustomAttributes = "";

            // lead_no
            $this->lead_no->ViewValue = $this->lead_no->CurrentValue;
            $this->lead_no->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // interest
            $this->interest->ViewValue = $this->interest->CurrentValue;
            $this->interest->ViewCustomAttributes = "";

            // firstname
            $this->firstname->ViewValue = $this->firstname->CurrentValue;
            $this->firstname->ViewCustomAttributes = "";

            // salutation
            $this->salutation->ViewValue = $this->salutation->CurrentValue;
            $this->salutation->ViewCustomAttributes = "";

            // lastname
            $this->lastname->ViewValue = $this->lastname->CurrentValue;
            $this->lastname->ViewCustomAttributes = "";

            // company
            $this->company->ViewValue = $this->company->CurrentValue;
            $this->company->ViewCustomAttributes = "";

            // annualrevenue
            $this->annualrevenue->ViewValue = $this->annualrevenue->CurrentValue;
            $this->annualrevenue->ViewValue = FormatNumber($this->annualrevenue->ViewValue, 2, -2, -2, -2);
            $this->annualrevenue->ViewCustomAttributes = "";

            // industry
            $this->industry->ViewValue = $this->industry->CurrentValue;
            $this->industry->ViewCustomAttributes = "";

            // campaign
            $this->campaign->ViewValue = $this->campaign->CurrentValue;
            $this->campaign->ViewCustomAttributes = "";

            // leadstatus
            $this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
            $this->leadstatus->ViewCustomAttributes = "";

            // leadsource
            $this->leadsource->ViewValue = $this->leadsource->CurrentValue;
            $this->leadsource->ViewCustomAttributes = "";

            // converted
            $this->converted->ViewValue = $this->converted->CurrentValue;
            $this->converted->ViewValue = FormatNumber($this->converted->ViewValue, 0, -2, -2, -2);
            $this->converted->ViewCustomAttributes = "";

            // licencekeystatus
            $this->licencekeystatus->ViewValue = $this->licencekeystatus->CurrentValue;
            $this->licencekeystatus->ViewCustomAttributes = "";

            // space
            $this->space->ViewValue = $this->space->CurrentValue;
            $this->space->ViewCustomAttributes = "";

            // comments
            $this->comments->ViewValue = $this->comments->CurrentValue;
            $this->comments->ViewCustomAttributes = "";

            // priority
            $this->priority->ViewValue = $this->priority->CurrentValue;
            $this->priority->ViewCustomAttributes = "";

            // demorequest
            $this->demorequest->ViewValue = $this->demorequest->CurrentValue;
            $this->demorequest->ViewCustomAttributes = "";

            // partnercontact
            $this->partnercontact->ViewValue = $this->partnercontact->CurrentValue;
            $this->partnercontact->ViewCustomAttributes = "";

            // productversion
            $this->productversion->ViewValue = $this->productversion->CurrentValue;
            $this->productversion->ViewCustomAttributes = "";

            // product
            $this->product->ViewValue = $this->product->CurrentValue;
            $this->product->ViewCustomAttributes = "";

            // maildate
            $this->maildate->ViewValue = $this->maildate->CurrentValue;
            $this->maildate->ViewValue = FormatDateTime($this->maildate->ViewValue, 0);
            $this->maildate->ViewCustomAttributes = "";

            // nextstepdate
            $this->nextstepdate->ViewValue = $this->nextstepdate->CurrentValue;
            $this->nextstepdate->ViewValue = FormatDateTime($this->nextstepdate->ViewValue, 0);
            $this->nextstepdate->ViewCustomAttributes = "";

            // fundingsituation
            $this->fundingsituation->ViewValue = $this->fundingsituation->CurrentValue;
            $this->fundingsituation->ViewCustomAttributes = "";

            // purpose
            $this->purpose->ViewValue = $this->purpose->CurrentValue;
            $this->purpose->ViewCustomAttributes = "";

            // evaluationstatus
            $this->evaluationstatus->ViewValue = $this->evaluationstatus->CurrentValue;
            $this->evaluationstatus->ViewCustomAttributes = "";

            // transferdate
            $this->transferdate->ViewValue = $this->transferdate->CurrentValue;
            $this->transferdate->ViewValue = FormatDateTime($this->transferdate->ViewValue, 0);
            $this->transferdate->ViewCustomAttributes = "";

            // revenuetype
            $this->revenuetype->ViewValue = $this->revenuetype->CurrentValue;
            $this->revenuetype->ViewCustomAttributes = "";

            // noofemployees
            $this->noofemployees->ViewValue = $this->noofemployees->CurrentValue;
            $this->noofemployees->ViewValue = FormatNumber($this->noofemployees->ViewValue, 0, -2, -2, -2);
            $this->noofemployees->ViewCustomAttributes = "";

            // secondaryemail
            $this->secondaryemail->ViewValue = $this->secondaryemail->CurrentValue;
            $this->secondaryemail->ViewCustomAttributes = "";

            // noapprovalcalls
            $this->noapprovalcalls->ViewValue = $this->noapprovalcalls->CurrentValue;
            $this->noapprovalcalls->ViewValue = FormatNumber($this->noapprovalcalls->ViewValue, 0, -2, -2, -2);
            $this->noapprovalcalls->ViewCustomAttributes = "";

            // noapprovalemails
            $this->noapprovalemails->ViewValue = $this->noapprovalemails->CurrentValue;
            $this->noapprovalemails->ViewValue = FormatNumber($this->noapprovalemails->ViewValue, 0, -2, -2, -2);
            $this->noapprovalemails->ViewCustomAttributes = "";

            // vat_id
            $this->vat_id->ViewValue = $this->vat_id->CurrentValue;
            $this->vat_id->ViewCustomAttributes = "";

            // registration_number_1
            $this->registration_number_1->ViewValue = $this->registration_number_1->CurrentValue;
            $this->registration_number_1->ViewCustomAttributes = "";

            // registration_number_2
            $this->registration_number_2->ViewValue = $this->registration_number_2->CurrentValue;
            $this->registration_number_2->ViewCustomAttributes = "";

            // verification
            $this->verification->ViewValue = $this->verification->CurrentValue;
            $this->verification->ViewCustomAttributes = "";

            // subindustry
            $this->subindustry->ViewValue = $this->subindustry->CurrentValue;
            $this->subindustry->ViewCustomAttributes = "";

            // atenttion
            $this->atenttion->ViewValue = $this->atenttion->CurrentValue;
            $this->atenttion->ViewCustomAttributes = "";

            // leads_relation
            $this->leads_relation->ViewValue = $this->leads_relation->CurrentValue;
            $this->leads_relation->ViewCustomAttributes = "";

            // legal_form
            $this->legal_form->ViewValue = $this->legal_form->CurrentValue;
            $this->legal_form->ViewCustomAttributes = "";

            // sum_time
            $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
            $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
            $this->sum_time->ViewCustomAttributes = "";

            // active
            $this->active->ViewValue = $this->active->CurrentValue;
            $this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
            $this->active->ViewCustomAttributes = "";

            // leadid
            $this->leadid->LinkCustomAttributes = "";
            $this->leadid->HrefValue = "";
            $this->leadid->TooltipValue = "";

            // lead_no
            $this->lead_no->LinkCustomAttributes = "";
            $this->lead_no->HrefValue = "";
            $this->lead_no->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // interest
            $this->interest->LinkCustomAttributes = "";
            $this->interest->HrefValue = "";
            $this->interest->TooltipValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";
            $this->firstname->TooltipValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";
            $this->salutation->TooltipValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";
            $this->lastname->TooltipValue = "";

            // company
            $this->company->LinkCustomAttributes = "";
            $this->company->HrefValue = "";
            $this->company->TooltipValue = "";

            // annualrevenue
            $this->annualrevenue->LinkCustomAttributes = "";
            $this->annualrevenue->HrefValue = "";
            $this->annualrevenue->TooltipValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";
            $this->industry->TooltipValue = "";

            // campaign
            $this->campaign->LinkCustomAttributes = "";
            $this->campaign->HrefValue = "";
            $this->campaign->TooltipValue = "";

            // leadstatus
            $this->leadstatus->LinkCustomAttributes = "";
            $this->leadstatus->HrefValue = "";
            $this->leadstatus->TooltipValue = "";

            // leadsource
            $this->leadsource->LinkCustomAttributes = "";
            $this->leadsource->HrefValue = "";
            $this->leadsource->TooltipValue = "";

            // converted
            $this->converted->LinkCustomAttributes = "";
            $this->converted->HrefValue = "";
            $this->converted->TooltipValue = "";

            // licencekeystatus
            $this->licencekeystatus->LinkCustomAttributes = "";
            $this->licencekeystatus->HrefValue = "";
            $this->licencekeystatus->TooltipValue = "";

            // space
            $this->space->LinkCustomAttributes = "";
            $this->space->HrefValue = "";
            $this->space->TooltipValue = "";

            // comments
            $this->comments->LinkCustomAttributes = "";
            $this->comments->HrefValue = "";
            $this->comments->TooltipValue = "";

            // priority
            $this->priority->LinkCustomAttributes = "";
            $this->priority->HrefValue = "";
            $this->priority->TooltipValue = "";

            // demorequest
            $this->demorequest->LinkCustomAttributes = "";
            $this->demorequest->HrefValue = "";
            $this->demorequest->TooltipValue = "";

            // partnercontact
            $this->partnercontact->LinkCustomAttributes = "";
            $this->partnercontact->HrefValue = "";
            $this->partnercontact->TooltipValue = "";

            // productversion
            $this->productversion->LinkCustomAttributes = "";
            $this->productversion->HrefValue = "";
            $this->productversion->TooltipValue = "";

            // product
            $this->product->LinkCustomAttributes = "";
            $this->product->HrefValue = "";
            $this->product->TooltipValue = "";

            // maildate
            $this->maildate->LinkCustomAttributes = "";
            $this->maildate->HrefValue = "";
            $this->maildate->TooltipValue = "";

            // nextstepdate
            $this->nextstepdate->LinkCustomAttributes = "";
            $this->nextstepdate->HrefValue = "";
            $this->nextstepdate->TooltipValue = "";

            // fundingsituation
            $this->fundingsituation->LinkCustomAttributes = "";
            $this->fundingsituation->HrefValue = "";
            $this->fundingsituation->TooltipValue = "";

            // purpose
            $this->purpose->LinkCustomAttributes = "";
            $this->purpose->HrefValue = "";
            $this->purpose->TooltipValue = "";

            // evaluationstatus
            $this->evaluationstatus->LinkCustomAttributes = "";
            $this->evaluationstatus->HrefValue = "";
            $this->evaluationstatus->TooltipValue = "";

            // transferdate
            $this->transferdate->LinkCustomAttributes = "";
            $this->transferdate->HrefValue = "";
            $this->transferdate->TooltipValue = "";

            // revenuetype
            $this->revenuetype->LinkCustomAttributes = "";
            $this->revenuetype->HrefValue = "";
            $this->revenuetype->TooltipValue = "";

            // noofemployees
            $this->noofemployees->LinkCustomAttributes = "";
            $this->noofemployees->HrefValue = "";
            $this->noofemployees->TooltipValue = "";

            // secondaryemail
            $this->secondaryemail->LinkCustomAttributes = "";
            $this->secondaryemail->HrefValue = "";
            $this->secondaryemail->TooltipValue = "";

            // noapprovalcalls
            $this->noapprovalcalls->LinkCustomAttributes = "";
            $this->noapprovalcalls->HrefValue = "";
            $this->noapprovalcalls->TooltipValue = "";

            // noapprovalemails
            $this->noapprovalemails->LinkCustomAttributes = "";
            $this->noapprovalemails->HrefValue = "";
            $this->noapprovalemails->TooltipValue = "";

            // vat_id
            $this->vat_id->LinkCustomAttributes = "";
            $this->vat_id->HrefValue = "";
            $this->vat_id->TooltipValue = "";

            // registration_number_1
            $this->registration_number_1->LinkCustomAttributes = "";
            $this->registration_number_1->HrefValue = "";
            $this->registration_number_1->TooltipValue = "";

            // registration_number_2
            $this->registration_number_2->LinkCustomAttributes = "";
            $this->registration_number_2->HrefValue = "";
            $this->registration_number_2->TooltipValue = "";

            // verification
            $this->verification->LinkCustomAttributes = "";
            $this->verification->HrefValue = "";
            $this->verification->TooltipValue = "";

            // subindustry
            $this->subindustry->LinkCustomAttributes = "";
            $this->subindustry->HrefValue = "";
            $this->subindustry->TooltipValue = "";

            // atenttion
            $this->atenttion->LinkCustomAttributes = "";
            $this->atenttion->HrefValue = "";
            $this->atenttion->TooltipValue = "";

            // leads_relation
            $this->leads_relation->LinkCustomAttributes = "";
            $this->leads_relation->HrefValue = "";
            $this->leads_relation->TooltipValue = "";

            // legal_form
            $this->legal_form->LinkCustomAttributes = "";
            $this->legal_form->HrefValue = "";
            $this->legal_form->TooltipValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";
            $this->sum_time->TooltipValue = "";

            // active
            $this->active->LinkCustomAttributes = "";
            $this->active->HrefValue = "";
            $this->active->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // leadid
            $this->leadid->EditAttrs["class"] = "form-control";
            $this->leadid->EditCustomAttributes = "";
            $this->leadid->EditValue = HtmlEncode($this->leadid->CurrentValue);
            $this->leadid->PlaceHolder = RemoveHtml($this->leadid->caption());

            // lead_no
            $this->lead_no->EditAttrs["class"] = "form-control";
            $this->lead_no->EditCustomAttributes = "";
            if (!$this->lead_no->Raw) {
                $this->lead_no->CurrentValue = HtmlDecode($this->lead_no->CurrentValue);
            }
            $this->lead_no->EditValue = HtmlEncode($this->lead_no->CurrentValue);
            $this->lead_no->PlaceHolder = RemoveHtml($this->lead_no->caption());

            // email
            $this->_email->EditAttrs["class"] = "form-control";
            $this->_email->EditCustomAttributes = "";
            if (!$this->_email->Raw) {
                $this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
            }
            $this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
            $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

            // interest
            $this->interest->EditAttrs["class"] = "form-control";
            $this->interest->EditCustomAttributes = "";
            if (!$this->interest->Raw) {
                $this->interest->CurrentValue = HtmlDecode($this->interest->CurrentValue);
            }
            $this->interest->EditValue = HtmlEncode($this->interest->CurrentValue);
            $this->interest->PlaceHolder = RemoveHtml($this->interest->caption());

            // firstname
            $this->firstname->EditAttrs["class"] = "form-control";
            $this->firstname->EditCustomAttributes = "";
            if (!$this->firstname->Raw) {
                $this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
            }
            $this->firstname->EditValue = HtmlEncode($this->firstname->CurrentValue);
            $this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

            // salutation
            $this->salutation->EditAttrs["class"] = "form-control";
            $this->salutation->EditCustomAttributes = "";
            if (!$this->salutation->Raw) {
                $this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
            }
            $this->salutation->EditValue = HtmlEncode($this->salutation->CurrentValue);
            $this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

            // lastname
            $this->lastname->EditAttrs["class"] = "form-control";
            $this->lastname->EditCustomAttributes = "";
            if (!$this->lastname->Raw) {
                $this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
            }
            $this->lastname->EditValue = HtmlEncode($this->lastname->CurrentValue);
            $this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

            // company
            $this->company->EditAttrs["class"] = "form-control";
            $this->company->EditCustomAttributes = "";
            if (!$this->company->Raw) {
                $this->company->CurrentValue = HtmlDecode($this->company->CurrentValue);
            }
            $this->company->EditValue = HtmlEncode($this->company->CurrentValue);
            $this->company->PlaceHolder = RemoveHtml($this->company->caption());

            // annualrevenue
            $this->annualrevenue->EditAttrs["class"] = "form-control";
            $this->annualrevenue->EditCustomAttributes = "";
            $this->annualrevenue->EditValue = HtmlEncode($this->annualrevenue->CurrentValue);
            $this->annualrevenue->PlaceHolder = RemoveHtml($this->annualrevenue->caption());
            if (strval($this->annualrevenue->EditValue) != "" && is_numeric($this->annualrevenue->EditValue)) {
                $this->annualrevenue->EditValue = FormatNumber($this->annualrevenue->EditValue, -2, -2, -2, -2);
            }

            // industry
            $this->industry->EditAttrs["class"] = "form-control";
            $this->industry->EditCustomAttributes = "";
            if (!$this->industry->Raw) {
                $this->industry->CurrentValue = HtmlDecode($this->industry->CurrentValue);
            }
            $this->industry->EditValue = HtmlEncode($this->industry->CurrentValue);
            $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

            // campaign
            $this->campaign->EditAttrs["class"] = "form-control";
            $this->campaign->EditCustomAttributes = "";
            if (!$this->campaign->Raw) {
                $this->campaign->CurrentValue = HtmlDecode($this->campaign->CurrentValue);
            }
            $this->campaign->EditValue = HtmlEncode($this->campaign->CurrentValue);
            $this->campaign->PlaceHolder = RemoveHtml($this->campaign->caption());

            // leadstatus
            $this->leadstatus->EditAttrs["class"] = "form-control";
            $this->leadstatus->EditCustomAttributes = "";
            if (!$this->leadstatus->Raw) {
                $this->leadstatus->CurrentValue = HtmlDecode($this->leadstatus->CurrentValue);
            }
            $this->leadstatus->EditValue = HtmlEncode($this->leadstatus->CurrentValue);
            $this->leadstatus->PlaceHolder = RemoveHtml($this->leadstatus->caption());

            // leadsource
            $this->leadsource->EditAttrs["class"] = "form-control";
            $this->leadsource->EditCustomAttributes = "";
            if (!$this->leadsource->Raw) {
                $this->leadsource->CurrentValue = HtmlDecode($this->leadsource->CurrentValue);
            }
            $this->leadsource->EditValue = HtmlEncode($this->leadsource->CurrentValue);
            $this->leadsource->PlaceHolder = RemoveHtml($this->leadsource->caption());

            // converted
            $this->converted->EditAttrs["class"] = "form-control";
            $this->converted->EditCustomAttributes = "";
            $this->converted->EditValue = HtmlEncode($this->converted->CurrentValue);
            $this->converted->PlaceHolder = RemoveHtml($this->converted->caption());

            // licencekeystatus
            $this->licencekeystatus->EditAttrs["class"] = "form-control";
            $this->licencekeystatus->EditCustomAttributes = "";
            if (!$this->licencekeystatus->Raw) {
                $this->licencekeystatus->CurrentValue = HtmlDecode($this->licencekeystatus->CurrentValue);
            }
            $this->licencekeystatus->EditValue = HtmlEncode($this->licencekeystatus->CurrentValue);
            $this->licencekeystatus->PlaceHolder = RemoveHtml($this->licencekeystatus->caption());

            // space
            $this->space->EditAttrs["class"] = "form-control";
            $this->space->EditCustomAttributes = "";
            if (!$this->space->Raw) {
                $this->space->CurrentValue = HtmlDecode($this->space->CurrentValue);
            }
            $this->space->EditValue = HtmlEncode($this->space->CurrentValue);
            $this->space->PlaceHolder = RemoveHtml($this->space->caption());

            // comments
            $this->comments->EditAttrs["class"] = "form-control";
            $this->comments->EditCustomAttributes = "";
            $this->comments->EditValue = HtmlEncode($this->comments->CurrentValue);
            $this->comments->PlaceHolder = RemoveHtml($this->comments->caption());

            // priority
            $this->priority->EditAttrs["class"] = "form-control";
            $this->priority->EditCustomAttributes = "";
            if (!$this->priority->Raw) {
                $this->priority->CurrentValue = HtmlDecode($this->priority->CurrentValue);
            }
            $this->priority->EditValue = HtmlEncode($this->priority->CurrentValue);
            $this->priority->PlaceHolder = RemoveHtml($this->priority->caption());

            // demorequest
            $this->demorequest->EditAttrs["class"] = "form-control";
            $this->demorequest->EditCustomAttributes = "";
            if (!$this->demorequest->Raw) {
                $this->demorequest->CurrentValue = HtmlDecode($this->demorequest->CurrentValue);
            }
            $this->demorequest->EditValue = HtmlEncode($this->demorequest->CurrentValue);
            $this->demorequest->PlaceHolder = RemoveHtml($this->demorequest->caption());

            // partnercontact
            $this->partnercontact->EditAttrs["class"] = "form-control";
            $this->partnercontact->EditCustomAttributes = "";
            if (!$this->partnercontact->Raw) {
                $this->partnercontact->CurrentValue = HtmlDecode($this->partnercontact->CurrentValue);
            }
            $this->partnercontact->EditValue = HtmlEncode($this->partnercontact->CurrentValue);
            $this->partnercontact->PlaceHolder = RemoveHtml($this->partnercontact->caption());

            // productversion
            $this->productversion->EditAttrs["class"] = "form-control";
            $this->productversion->EditCustomAttributes = "";
            if (!$this->productversion->Raw) {
                $this->productversion->CurrentValue = HtmlDecode($this->productversion->CurrentValue);
            }
            $this->productversion->EditValue = HtmlEncode($this->productversion->CurrentValue);
            $this->productversion->PlaceHolder = RemoveHtml($this->productversion->caption());

            // product
            $this->product->EditAttrs["class"] = "form-control";
            $this->product->EditCustomAttributes = "";
            if (!$this->product->Raw) {
                $this->product->CurrentValue = HtmlDecode($this->product->CurrentValue);
            }
            $this->product->EditValue = HtmlEncode($this->product->CurrentValue);
            $this->product->PlaceHolder = RemoveHtml($this->product->caption());

            // maildate
            $this->maildate->EditAttrs["class"] = "form-control";
            $this->maildate->EditCustomAttributes = "";
            $this->maildate->EditValue = HtmlEncode(FormatDateTime($this->maildate->CurrentValue, 8));
            $this->maildate->PlaceHolder = RemoveHtml($this->maildate->caption());

            // nextstepdate
            $this->nextstepdate->EditAttrs["class"] = "form-control";
            $this->nextstepdate->EditCustomAttributes = "";
            $this->nextstepdate->EditValue = HtmlEncode(FormatDateTime($this->nextstepdate->CurrentValue, 8));
            $this->nextstepdate->PlaceHolder = RemoveHtml($this->nextstepdate->caption());

            // fundingsituation
            $this->fundingsituation->EditAttrs["class"] = "form-control";
            $this->fundingsituation->EditCustomAttributes = "";
            if (!$this->fundingsituation->Raw) {
                $this->fundingsituation->CurrentValue = HtmlDecode($this->fundingsituation->CurrentValue);
            }
            $this->fundingsituation->EditValue = HtmlEncode($this->fundingsituation->CurrentValue);
            $this->fundingsituation->PlaceHolder = RemoveHtml($this->fundingsituation->caption());

            // purpose
            $this->purpose->EditAttrs["class"] = "form-control";
            $this->purpose->EditCustomAttributes = "";
            if (!$this->purpose->Raw) {
                $this->purpose->CurrentValue = HtmlDecode($this->purpose->CurrentValue);
            }
            $this->purpose->EditValue = HtmlEncode($this->purpose->CurrentValue);
            $this->purpose->PlaceHolder = RemoveHtml($this->purpose->caption());

            // evaluationstatus
            $this->evaluationstatus->EditAttrs["class"] = "form-control";
            $this->evaluationstatus->EditCustomAttributes = "";
            if (!$this->evaluationstatus->Raw) {
                $this->evaluationstatus->CurrentValue = HtmlDecode($this->evaluationstatus->CurrentValue);
            }
            $this->evaluationstatus->EditValue = HtmlEncode($this->evaluationstatus->CurrentValue);
            $this->evaluationstatus->PlaceHolder = RemoveHtml($this->evaluationstatus->caption());

            // transferdate
            $this->transferdate->EditAttrs["class"] = "form-control";
            $this->transferdate->EditCustomAttributes = "";
            $this->transferdate->EditValue = HtmlEncode(FormatDateTime($this->transferdate->CurrentValue, 8));
            $this->transferdate->PlaceHolder = RemoveHtml($this->transferdate->caption());

            // revenuetype
            $this->revenuetype->EditAttrs["class"] = "form-control";
            $this->revenuetype->EditCustomAttributes = "";
            if (!$this->revenuetype->Raw) {
                $this->revenuetype->CurrentValue = HtmlDecode($this->revenuetype->CurrentValue);
            }
            $this->revenuetype->EditValue = HtmlEncode($this->revenuetype->CurrentValue);
            $this->revenuetype->PlaceHolder = RemoveHtml($this->revenuetype->caption());

            // noofemployees
            $this->noofemployees->EditAttrs["class"] = "form-control";
            $this->noofemployees->EditCustomAttributes = "";
            $this->noofemployees->EditValue = HtmlEncode($this->noofemployees->CurrentValue);
            $this->noofemployees->PlaceHolder = RemoveHtml($this->noofemployees->caption());

            // secondaryemail
            $this->secondaryemail->EditAttrs["class"] = "form-control";
            $this->secondaryemail->EditCustomAttributes = "";
            if (!$this->secondaryemail->Raw) {
                $this->secondaryemail->CurrentValue = HtmlDecode($this->secondaryemail->CurrentValue);
            }
            $this->secondaryemail->EditValue = HtmlEncode($this->secondaryemail->CurrentValue);
            $this->secondaryemail->PlaceHolder = RemoveHtml($this->secondaryemail->caption());

            // noapprovalcalls
            $this->noapprovalcalls->EditAttrs["class"] = "form-control";
            $this->noapprovalcalls->EditCustomAttributes = "";
            $this->noapprovalcalls->EditValue = HtmlEncode($this->noapprovalcalls->CurrentValue);
            $this->noapprovalcalls->PlaceHolder = RemoveHtml($this->noapprovalcalls->caption());

            // noapprovalemails
            $this->noapprovalemails->EditAttrs["class"] = "form-control";
            $this->noapprovalemails->EditCustomAttributes = "";
            $this->noapprovalemails->EditValue = HtmlEncode($this->noapprovalemails->CurrentValue);
            $this->noapprovalemails->PlaceHolder = RemoveHtml($this->noapprovalemails->caption());

            // vat_id
            $this->vat_id->EditAttrs["class"] = "form-control";
            $this->vat_id->EditCustomAttributes = "";
            if (!$this->vat_id->Raw) {
                $this->vat_id->CurrentValue = HtmlDecode($this->vat_id->CurrentValue);
            }
            $this->vat_id->EditValue = HtmlEncode($this->vat_id->CurrentValue);
            $this->vat_id->PlaceHolder = RemoveHtml($this->vat_id->caption());

            // registration_number_1
            $this->registration_number_1->EditAttrs["class"] = "form-control";
            $this->registration_number_1->EditCustomAttributes = "";
            if (!$this->registration_number_1->Raw) {
                $this->registration_number_1->CurrentValue = HtmlDecode($this->registration_number_1->CurrentValue);
            }
            $this->registration_number_1->EditValue = HtmlEncode($this->registration_number_1->CurrentValue);
            $this->registration_number_1->PlaceHolder = RemoveHtml($this->registration_number_1->caption());

            // registration_number_2
            $this->registration_number_2->EditAttrs["class"] = "form-control";
            $this->registration_number_2->EditCustomAttributes = "";
            if (!$this->registration_number_2->Raw) {
                $this->registration_number_2->CurrentValue = HtmlDecode($this->registration_number_2->CurrentValue);
            }
            $this->registration_number_2->EditValue = HtmlEncode($this->registration_number_2->CurrentValue);
            $this->registration_number_2->PlaceHolder = RemoveHtml($this->registration_number_2->caption());

            // verification
            $this->verification->EditAttrs["class"] = "form-control";
            $this->verification->EditCustomAttributes = "";
            $this->verification->EditValue = HtmlEncode($this->verification->CurrentValue);
            $this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

            // subindustry
            $this->subindustry->EditAttrs["class"] = "form-control";
            $this->subindustry->EditCustomAttributes = "";
            if (!$this->subindustry->Raw) {
                $this->subindustry->CurrentValue = HtmlDecode($this->subindustry->CurrentValue);
            }
            $this->subindustry->EditValue = HtmlEncode($this->subindustry->CurrentValue);
            $this->subindustry->PlaceHolder = RemoveHtml($this->subindustry->caption());

            // atenttion
            $this->atenttion->EditAttrs["class"] = "form-control";
            $this->atenttion->EditCustomAttributes = "";
            $this->atenttion->EditValue = HtmlEncode($this->atenttion->CurrentValue);
            $this->atenttion->PlaceHolder = RemoveHtml($this->atenttion->caption());

            // leads_relation
            $this->leads_relation->EditAttrs["class"] = "form-control";
            $this->leads_relation->EditCustomAttributes = "";
            if (!$this->leads_relation->Raw) {
                $this->leads_relation->CurrentValue = HtmlDecode($this->leads_relation->CurrentValue);
            }
            $this->leads_relation->EditValue = HtmlEncode($this->leads_relation->CurrentValue);
            $this->leads_relation->PlaceHolder = RemoveHtml($this->leads_relation->caption());

            // legal_form
            $this->legal_form->EditAttrs["class"] = "form-control";
            $this->legal_form->EditCustomAttributes = "";
            if (!$this->legal_form->Raw) {
                $this->legal_form->CurrentValue = HtmlDecode($this->legal_form->CurrentValue);
            }
            $this->legal_form->EditValue = HtmlEncode($this->legal_form->CurrentValue);
            $this->legal_form->PlaceHolder = RemoveHtml($this->legal_form->caption());

            // sum_time
            $this->sum_time->EditAttrs["class"] = "form-control";
            $this->sum_time->EditCustomAttributes = "";
            $this->sum_time->EditValue = HtmlEncode($this->sum_time->CurrentValue);
            $this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
            if (strval($this->sum_time->EditValue) != "" && is_numeric($this->sum_time->EditValue)) {
                $this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);
            }

            // active
            $this->active->EditAttrs["class"] = "form-control";
            $this->active->EditCustomAttributes = "";
            $this->active->EditValue = HtmlEncode($this->active->CurrentValue);
            $this->active->PlaceHolder = RemoveHtml($this->active->caption());

            // Edit refer script

            // leadid
            $this->leadid->LinkCustomAttributes = "";
            $this->leadid->HrefValue = "";

            // lead_no
            $this->lead_no->LinkCustomAttributes = "";
            $this->lead_no->HrefValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";

            // interest
            $this->interest->LinkCustomAttributes = "";
            $this->interest->HrefValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";

            // company
            $this->company->LinkCustomAttributes = "";
            $this->company->HrefValue = "";

            // annualrevenue
            $this->annualrevenue->LinkCustomAttributes = "";
            $this->annualrevenue->HrefValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";

            // campaign
            $this->campaign->LinkCustomAttributes = "";
            $this->campaign->HrefValue = "";

            // leadstatus
            $this->leadstatus->LinkCustomAttributes = "";
            $this->leadstatus->HrefValue = "";

            // leadsource
            $this->leadsource->LinkCustomAttributes = "";
            $this->leadsource->HrefValue = "";

            // converted
            $this->converted->LinkCustomAttributes = "";
            $this->converted->HrefValue = "";

            // licencekeystatus
            $this->licencekeystatus->LinkCustomAttributes = "";
            $this->licencekeystatus->HrefValue = "";

            // space
            $this->space->LinkCustomAttributes = "";
            $this->space->HrefValue = "";

            // comments
            $this->comments->LinkCustomAttributes = "";
            $this->comments->HrefValue = "";

            // priority
            $this->priority->LinkCustomAttributes = "";
            $this->priority->HrefValue = "";

            // demorequest
            $this->demorequest->LinkCustomAttributes = "";
            $this->demorequest->HrefValue = "";

            // partnercontact
            $this->partnercontact->LinkCustomAttributes = "";
            $this->partnercontact->HrefValue = "";

            // productversion
            $this->productversion->LinkCustomAttributes = "";
            $this->productversion->HrefValue = "";

            // product
            $this->product->LinkCustomAttributes = "";
            $this->product->HrefValue = "";

            // maildate
            $this->maildate->LinkCustomAttributes = "";
            $this->maildate->HrefValue = "";

            // nextstepdate
            $this->nextstepdate->LinkCustomAttributes = "";
            $this->nextstepdate->HrefValue = "";

            // fundingsituation
            $this->fundingsituation->LinkCustomAttributes = "";
            $this->fundingsituation->HrefValue = "";

            // purpose
            $this->purpose->LinkCustomAttributes = "";
            $this->purpose->HrefValue = "";

            // evaluationstatus
            $this->evaluationstatus->LinkCustomAttributes = "";
            $this->evaluationstatus->HrefValue = "";

            // transferdate
            $this->transferdate->LinkCustomAttributes = "";
            $this->transferdate->HrefValue = "";

            // revenuetype
            $this->revenuetype->LinkCustomAttributes = "";
            $this->revenuetype->HrefValue = "";

            // noofemployees
            $this->noofemployees->LinkCustomAttributes = "";
            $this->noofemployees->HrefValue = "";

            // secondaryemail
            $this->secondaryemail->LinkCustomAttributes = "";
            $this->secondaryemail->HrefValue = "";

            // noapprovalcalls
            $this->noapprovalcalls->LinkCustomAttributes = "";
            $this->noapprovalcalls->HrefValue = "";

            // noapprovalemails
            $this->noapprovalemails->LinkCustomAttributes = "";
            $this->noapprovalemails->HrefValue = "";

            // vat_id
            $this->vat_id->LinkCustomAttributes = "";
            $this->vat_id->HrefValue = "";

            // registration_number_1
            $this->registration_number_1->LinkCustomAttributes = "";
            $this->registration_number_1->HrefValue = "";

            // registration_number_2
            $this->registration_number_2->LinkCustomAttributes = "";
            $this->registration_number_2->HrefValue = "";

            // verification
            $this->verification->LinkCustomAttributes = "";
            $this->verification->HrefValue = "";

            // subindustry
            $this->subindustry->LinkCustomAttributes = "";
            $this->subindustry->HrefValue = "";

            // atenttion
            $this->atenttion->LinkCustomAttributes = "";
            $this->atenttion->HrefValue = "";

            // leads_relation
            $this->leads_relation->LinkCustomAttributes = "";
            $this->leads_relation->HrefValue = "";

            // legal_form
            $this->legal_form->LinkCustomAttributes = "";
            $this->legal_form->HrefValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";

            // active
            $this->active->LinkCustomAttributes = "";
            $this->active->HrefValue = "";
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
        if ($this->leadid->Required) {
            if (!$this->leadid->IsDetailKey && EmptyValue($this->leadid->FormValue)) {
                $this->leadid->addErrorMessage(str_replace("%s", $this->leadid->caption(), $this->leadid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leadid->FormValue)) {
            $this->leadid->addErrorMessage($this->leadid->getErrorMessage(false));
        }
        if ($this->lead_no->Required) {
            if (!$this->lead_no->IsDetailKey && EmptyValue($this->lead_no->FormValue)) {
                $this->lead_no->addErrorMessage(str_replace("%s", $this->lead_no->caption(), $this->lead_no->RequiredErrorMessage));
            }
        }
        if ($this->_email->Required) {
            if (!$this->_email->IsDetailKey && EmptyValue($this->_email->FormValue)) {
                $this->_email->addErrorMessage(str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
            }
        }
        if ($this->interest->Required) {
            if (!$this->interest->IsDetailKey && EmptyValue($this->interest->FormValue)) {
                $this->interest->addErrorMessage(str_replace("%s", $this->interest->caption(), $this->interest->RequiredErrorMessage));
            }
        }
        if ($this->firstname->Required) {
            if (!$this->firstname->IsDetailKey && EmptyValue($this->firstname->FormValue)) {
                $this->firstname->addErrorMessage(str_replace("%s", $this->firstname->caption(), $this->firstname->RequiredErrorMessage));
            }
        }
        if ($this->salutation->Required) {
            if (!$this->salutation->IsDetailKey && EmptyValue($this->salutation->FormValue)) {
                $this->salutation->addErrorMessage(str_replace("%s", $this->salutation->caption(), $this->salutation->RequiredErrorMessage));
            }
        }
        if ($this->lastname->Required) {
            if (!$this->lastname->IsDetailKey && EmptyValue($this->lastname->FormValue)) {
                $this->lastname->addErrorMessage(str_replace("%s", $this->lastname->caption(), $this->lastname->RequiredErrorMessage));
            }
        }
        if ($this->company->Required) {
            if (!$this->company->IsDetailKey && EmptyValue($this->company->FormValue)) {
                $this->company->addErrorMessage(str_replace("%s", $this->company->caption(), $this->company->RequiredErrorMessage));
            }
        }
        if ($this->annualrevenue->Required) {
            if (!$this->annualrevenue->IsDetailKey && EmptyValue($this->annualrevenue->FormValue)) {
                $this->annualrevenue->addErrorMessage(str_replace("%s", $this->annualrevenue->caption(), $this->annualrevenue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->annualrevenue->FormValue)) {
            $this->annualrevenue->addErrorMessage($this->annualrevenue->getErrorMessage(false));
        }
        if ($this->industry->Required) {
            if (!$this->industry->IsDetailKey && EmptyValue($this->industry->FormValue)) {
                $this->industry->addErrorMessage(str_replace("%s", $this->industry->caption(), $this->industry->RequiredErrorMessage));
            }
        }
        if ($this->campaign->Required) {
            if (!$this->campaign->IsDetailKey && EmptyValue($this->campaign->FormValue)) {
                $this->campaign->addErrorMessage(str_replace("%s", $this->campaign->caption(), $this->campaign->RequiredErrorMessage));
            }
        }
        if ($this->leadstatus->Required) {
            if (!$this->leadstatus->IsDetailKey && EmptyValue($this->leadstatus->FormValue)) {
                $this->leadstatus->addErrorMessage(str_replace("%s", $this->leadstatus->caption(), $this->leadstatus->RequiredErrorMessage));
            }
        }
        if ($this->leadsource->Required) {
            if (!$this->leadsource->IsDetailKey && EmptyValue($this->leadsource->FormValue)) {
                $this->leadsource->addErrorMessage(str_replace("%s", $this->leadsource->caption(), $this->leadsource->RequiredErrorMessage));
            }
        }
        if ($this->converted->Required) {
            if (!$this->converted->IsDetailKey && EmptyValue($this->converted->FormValue)) {
                $this->converted->addErrorMessage(str_replace("%s", $this->converted->caption(), $this->converted->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->converted->FormValue)) {
            $this->converted->addErrorMessage($this->converted->getErrorMessage(false));
        }
        if ($this->licencekeystatus->Required) {
            if (!$this->licencekeystatus->IsDetailKey && EmptyValue($this->licencekeystatus->FormValue)) {
                $this->licencekeystatus->addErrorMessage(str_replace("%s", $this->licencekeystatus->caption(), $this->licencekeystatus->RequiredErrorMessage));
            }
        }
        if ($this->space->Required) {
            if (!$this->space->IsDetailKey && EmptyValue($this->space->FormValue)) {
                $this->space->addErrorMessage(str_replace("%s", $this->space->caption(), $this->space->RequiredErrorMessage));
            }
        }
        if ($this->comments->Required) {
            if (!$this->comments->IsDetailKey && EmptyValue($this->comments->FormValue)) {
                $this->comments->addErrorMessage(str_replace("%s", $this->comments->caption(), $this->comments->RequiredErrorMessage));
            }
        }
        if ($this->priority->Required) {
            if (!$this->priority->IsDetailKey && EmptyValue($this->priority->FormValue)) {
                $this->priority->addErrorMessage(str_replace("%s", $this->priority->caption(), $this->priority->RequiredErrorMessage));
            }
        }
        if ($this->demorequest->Required) {
            if (!$this->demorequest->IsDetailKey && EmptyValue($this->demorequest->FormValue)) {
                $this->demorequest->addErrorMessage(str_replace("%s", $this->demorequest->caption(), $this->demorequest->RequiredErrorMessage));
            }
        }
        if ($this->partnercontact->Required) {
            if (!$this->partnercontact->IsDetailKey && EmptyValue($this->partnercontact->FormValue)) {
                $this->partnercontact->addErrorMessage(str_replace("%s", $this->partnercontact->caption(), $this->partnercontact->RequiredErrorMessage));
            }
        }
        if ($this->productversion->Required) {
            if (!$this->productversion->IsDetailKey && EmptyValue($this->productversion->FormValue)) {
                $this->productversion->addErrorMessage(str_replace("%s", $this->productversion->caption(), $this->productversion->RequiredErrorMessage));
            }
        }
        if ($this->product->Required) {
            if (!$this->product->IsDetailKey && EmptyValue($this->product->FormValue)) {
                $this->product->addErrorMessage(str_replace("%s", $this->product->caption(), $this->product->RequiredErrorMessage));
            }
        }
        if ($this->maildate->Required) {
            if (!$this->maildate->IsDetailKey && EmptyValue($this->maildate->FormValue)) {
                $this->maildate->addErrorMessage(str_replace("%s", $this->maildate->caption(), $this->maildate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->maildate->FormValue)) {
            $this->maildate->addErrorMessage($this->maildate->getErrorMessage(false));
        }
        if ($this->nextstepdate->Required) {
            if (!$this->nextstepdate->IsDetailKey && EmptyValue($this->nextstepdate->FormValue)) {
                $this->nextstepdate->addErrorMessage(str_replace("%s", $this->nextstepdate->caption(), $this->nextstepdate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->nextstepdate->FormValue)) {
            $this->nextstepdate->addErrorMessage($this->nextstepdate->getErrorMessage(false));
        }
        if ($this->fundingsituation->Required) {
            if (!$this->fundingsituation->IsDetailKey && EmptyValue($this->fundingsituation->FormValue)) {
                $this->fundingsituation->addErrorMessage(str_replace("%s", $this->fundingsituation->caption(), $this->fundingsituation->RequiredErrorMessage));
            }
        }
        if ($this->purpose->Required) {
            if (!$this->purpose->IsDetailKey && EmptyValue($this->purpose->FormValue)) {
                $this->purpose->addErrorMessage(str_replace("%s", $this->purpose->caption(), $this->purpose->RequiredErrorMessage));
            }
        }
        if ($this->evaluationstatus->Required) {
            if (!$this->evaluationstatus->IsDetailKey && EmptyValue($this->evaluationstatus->FormValue)) {
                $this->evaluationstatus->addErrorMessage(str_replace("%s", $this->evaluationstatus->caption(), $this->evaluationstatus->RequiredErrorMessage));
            }
        }
        if ($this->transferdate->Required) {
            if (!$this->transferdate->IsDetailKey && EmptyValue($this->transferdate->FormValue)) {
                $this->transferdate->addErrorMessage(str_replace("%s", $this->transferdate->caption(), $this->transferdate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->transferdate->FormValue)) {
            $this->transferdate->addErrorMessage($this->transferdate->getErrorMessage(false));
        }
        if ($this->revenuetype->Required) {
            if (!$this->revenuetype->IsDetailKey && EmptyValue($this->revenuetype->FormValue)) {
                $this->revenuetype->addErrorMessage(str_replace("%s", $this->revenuetype->caption(), $this->revenuetype->RequiredErrorMessage));
            }
        }
        if ($this->noofemployees->Required) {
            if (!$this->noofemployees->IsDetailKey && EmptyValue($this->noofemployees->FormValue)) {
                $this->noofemployees->addErrorMessage(str_replace("%s", $this->noofemployees->caption(), $this->noofemployees->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->noofemployees->FormValue)) {
            $this->noofemployees->addErrorMessage($this->noofemployees->getErrorMessage(false));
        }
        if ($this->secondaryemail->Required) {
            if (!$this->secondaryemail->IsDetailKey && EmptyValue($this->secondaryemail->FormValue)) {
                $this->secondaryemail->addErrorMessage(str_replace("%s", $this->secondaryemail->caption(), $this->secondaryemail->RequiredErrorMessage));
            }
        }
        if ($this->noapprovalcalls->Required) {
            if (!$this->noapprovalcalls->IsDetailKey && EmptyValue($this->noapprovalcalls->FormValue)) {
                $this->noapprovalcalls->addErrorMessage(str_replace("%s", $this->noapprovalcalls->caption(), $this->noapprovalcalls->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->noapprovalcalls->FormValue)) {
            $this->noapprovalcalls->addErrorMessage($this->noapprovalcalls->getErrorMessage(false));
        }
        if ($this->noapprovalemails->Required) {
            if (!$this->noapprovalemails->IsDetailKey && EmptyValue($this->noapprovalemails->FormValue)) {
                $this->noapprovalemails->addErrorMessage(str_replace("%s", $this->noapprovalemails->caption(), $this->noapprovalemails->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->noapprovalemails->FormValue)) {
            $this->noapprovalemails->addErrorMessage($this->noapprovalemails->getErrorMessage(false));
        }
        if ($this->vat_id->Required) {
            if (!$this->vat_id->IsDetailKey && EmptyValue($this->vat_id->FormValue)) {
                $this->vat_id->addErrorMessage(str_replace("%s", $this->vat_id->caption(), $this->vat_id->RequiredErrorMessage));
            }
        }
        if ($this->registration_number_1->Required) {
            if (!$this->registration_number_1->IsDetailKey && EmptyValue($this->registration_number_1->FormValue)) {
                $this->registration_number_1->addErrorMessage(str_replace("%s", $this->registration_number_1->caption(), $this->registration_number_1->RequiredErrorMessage));
            }
        }
        if ($this->registration_number_2->Required) {
            if (!$this->registration_number_2->IsDetailKey && EmptyValue($this->registration_number_2->FormValue)) {
                $this->registration_number_2->addErrorMessage(str_replace("%s", $this->registration_number_2->caption(), $this->registration_number_2->RequiredErrorMessage));
            }
        }
        if ($this->verification->Required) {
            if (!$this->verification->IsDetailKey && EmptyValue($this->verification->FormValue)) {
                $this->verification->addErrorMessage(str_replace("%s", $this->verification->caption(), $this->verification->RequiredErrorMessage));
            }
        }
        if ($this->subindustry->Required) {
            if (!$this->subindustry->IsDetailKey && EmptyValue($this->subindustry->FormValue)) {
                $this->subindustry->addErrorMessage(str_replace("%s", $this->subindustry->caption(), $this->subindustry->RequiredErrorMessage));
            }
        }
        if ($this->atenttion->Required) {
            if (!$this->atenttion->IsDetailKey && EmptyValue($this->atenttion->FormValue)) {
                $this->atenttion->addErrorMessage(str_replace("%s", $this->atenttion->caption(), $this->atenttion->RequiredErrorMessage));
            }
        }
        if ($this->leads_relation->Required) {
            if (!$this->leads_relation->IsDetailKey && EmptyValue($this->leads_relation->FormValue)) {
                $this->leads_relation->addErrorMessage(str_replace("%s", $this->leads_relation->caption(), $this->leads_relation->RequiredErrorMessage));
            }
        }
        if ($this->legal_form->Required) {
            if (!$this->legal_form->IsDetailKey && EmptyValue($this->legal_form->FormValue)) {
                $this->legal_form->addErrorMessage(str_replace("%s", $this->legal_form->caption(), $this->legal_form->RequiredErrorMessage));
            }
        }
        if ($this->sum_time->Required) {
            if (!$this->sum_time->IsDetailKey && EmptyValue($this->sum_time->FormValue)) {
                $this->sum_time->addErrorMessage(str_replace("%s", $this->sum_time->caption(), $this->sum_time->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->sum_time->FormValue)) {
            $this->sum_time->addErrorMessage($this->sum_time->getErrorMessage(false));
        }
        if ($this->active->Required) {
            if (!$this->active->IsDetailKey && EmptyValue($this->active->FormValue)) {
                $this->active->addErrorMessage(str_replace("%s", $this->active->caption(), $this->active->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->active->FormValue)) {
            $this->active->addErrorMessage($this->active->getErrorMessage(false));
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

            // leadid
            $this->leadid->setDbValueDef($rsnew, $this->leadid->CurrentValue, 0, $this->leadid->ReadOnly);

            // lead_no
            $this->lead_no->setDbValueDef($rsnew, $this->lead_no->CurrentValue, "", $this->lead_no->ReadOnly);

            // email
            $this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, null, $this->_email->ReadOnly);

            // interest
            $this->interest->setDbValueDef($rsnew, $this->interest->CurrentValue, null, $this->interest->ReadOnly);

            // firstname
            $this->firstname->setDbValueDef($rsnew, $this->firstname->CurrentValue, null, $this->firstname->ReadOnly);

            // salutation
            $this->salutation->setDbValueDef($rsnew, $this->salutation->CurrentValue, null, $this->salutation->ReadOnly);

            // lastname
            $this->lastname->setDbValueDef($rsnew, $this->lastname->CurrentValue, null, $this->lastname->ReadOnly);

            // company
            $this->company->setDbValueDef($rsnew, $this->company->CurrentValue, "", $this->company->ReadOnly);

            // annualrevenue
            $this->annualrevenue->setDbValueDef($rsnew, $this->annualrevenue->CurrentValue, null, $this->annualrevenue->ReadOnly);

            // industry
            $this->industry->setDbValueDef($rsnew, $this->industry->CurrentValue, null, $this->industry->ReadOnly);

            // campaign
            $this->campaign->setDbValueDef($rsnew, $this->campaign->CurrentValue, null, $this->campaign->ReadOnly);

            // leadstatus
            $this->leadstatus->setDbValueDef($rsnew, $this->leadstatus->CurrentValue, null, $this->leadstatus->ReadOnly);

            // leadsource
            $this->leadsource->setDbValueDef($rsnew, $this->leadsource->CurrentValue, null, $this->leadsource->ReadOnly);

            // converted
            $this->converted->setDbValueDef($rsnew, $this->converted->CurrentValue, 0, $this->converted->ReadOnly);

            // licencekeystatus
            $this->licencekeystatus->setDbValueDef($rsnew, $this->licencekeystatus->CurrentValue, null, $this->licencekeystatus->ReadOnly);

            // space
            $this->space->setDbValueDef($rsnew, $this->space->CurrentValue, null, $this->space->ReadOnly);

            // comments
            $this->comments->setDbValueDef($rsnew, $this->comments->CurrentValue, null, $this->comments->ReadOnly);

            // priority
            $this->priority->setDbValueDef($rsnew, $this->priority->CurrentValue, null, $this->priority->ReadOnly);

            // demorequest
            $this->demorequest->setDbValueDef($rsnew, $this->demorequest->CurrentValue, null, $this->demorequest->ReadOnly);

            // partnercontact
            $this->partnercontact->setDbValueDef($rsnew, $this->partnercontact->CurrentValue, null, $this->partnercontact->ReadOnly);

            // productversion
            $this->productversion->setDbValueDef($rsnew, $this->productversion->CurrentValue, null, $this->productversion->ReadOnly);

            // product
            $this->product->setDbValueDef($rsnew, $this->product->CurrentValue, null, $this->product->ReadOnly);

            // maildate
            $this->maildate->setDbValueDef($rsnew, UnFormatDateTime($this->maildate->CurrentValue, 0), null, $this->maildate->ReadOnly);

            // nextstepdate
            $this->nextstepdate->setDbValueDef($rsnew, UnFormatDateTime($this->nextstepdate->CurrentValue, 0), null, $this->nextstepdate->ReadOnly);

            // fundingsituation
            $this->fundingsituation->setDbValueDef($rsnew, $this->fundingsituation->CurrentValue, null, $this->fundingsituation->ReadOnly);

            // purpose
            $this->purpose->setDbValueDef($rsnew, $this->purpose->CurrentValue, null, $this->purpose->ReadOnly);

            // evaluationstatus
            $this->evaluationstatus->setDbValueDef($rsnew, $this->evaluationstatus->CurrentValue, null, $this->evaluationstatus->ReadOnly);

            // transferdate
            $this->transferdate->setDbValueDef($rsnew, UnFormatDateTime($this->transferdate->CurrentValue, 0), null, $this->transferdate->ReadOnly);

            // revenuetype
            $this->revenuetype->setDbValueDef($rsnew, $this->revenuetype->CurrentValue, null, $this->revenuetype->ReadOnly);

            // noofemployees
            $this->noofemployees->setDbValueDef($rsnew, $this->noofemployees->CurrentValue, null, $this->noofemployees->ReadOnly);

            // secondaryemail
            $this->secondaryemail->setDbValueDef($rsnew, $this->secondaryemail->CurrentValue, null, $this->secondaryemail->ReadOnly);

            // noapprovalcalls
            $this->noapprovalcalls->setDbValueDef($rsnew, $this->noapprovalcalls->CurrentValue, null, $this->noapprovalcalls->ReadOnly);

            // noapprovalemails
            $this->noapprovalemails->setDbValueDef($rsnew, $this->noapprovalemails->CurrentValue, null, $this->noapprovalemails->ReadOnly);

            // vat_id
            $this->vat_id->setDbValueDef($rsnew, $this->vat_id->CurrentValue, null, $this->vat_id->ReadOnly);

            // registration_number_1
            $this->registration_number_1->setDbValueDef($rsnew, $this->registration_number_1->CurrentValue, null, $this->registration_number_1->ReadOnly);

            // registration_number_2
            $this->registration_number_2->setDbValueDef($rsnew, $this->registration_number_2->CurrentValue, null, $this->registration_number_2->ReadOnly);

            // verification
            $this->verification->setDbValueDef($rsnew, $this->verification->CurrentValue, null, $this->verification->ReadOnly);

            // subindustry
            $this->subindustry->setDbValueDef($rsnew, $this->subindustry->CurrentValue, null, $this->subindustry->ReadOnly);

            // atenttion
            $this->atenttion->setDbValueDef($rsnew, $this->atenttion->CurrentValue, null, $this->atenttion->ReadOnly);

            // leads_relation
            $this->leads_relation->setDbValueDef($rsnew, $this->leads_relation->CurrentValue, null, $this->leads_relation->ReadOnly);

            // legal_form
            $this->legal_form->setDbValueDef($rsnew, $this->legal_form->CurrentValue, null, $this->legal_form->ReadOnly);

            // sum_time
            $this->sum_time->setDbValueDef($rsnew, $this->sum_time->CurrentValue, null, $this->sum_time->ReadOnly);

            // active
            $this->active->setDbValueDef($rsnew, $this->active->CurrentValue, null, $this->active->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);

            // Check for duplicate key when key changed
            if ($updateRow) {
                $newKeyFilter = $this->getRecordFilter($rsnew);
                if ($newKeyFilter != $oldKeyFilter) {
                    $rsChk = $this->loadRs($newKeyFilter)->fetch();
                    if ($rsChk !== false) {
                        $keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
                        $this->setFailureMessage($keyErrMsg);
                        $updateRow = false;
                    }
                }
            }
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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmLeaddetailsList"), "", $this->TableVar, true);
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
