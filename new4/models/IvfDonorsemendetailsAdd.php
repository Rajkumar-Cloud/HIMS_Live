<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfDonorsemendetailsAdd extends IvfDonorsemendetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_donorsemendetails';

    // Page object name
    public $PageObjName = "IvfDonorsemendetailsAdd";

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

        // Table object (ivf_donorsemendetails)
        if (!isset($GLOBALS["ivf_donorsemendetails"]) || get_class($GLOBALS["ivf_donorsemendetails"]) == PROJECT_NAMESPACE . "ivf_donorsemendetails") {
            $GLOBALS["ivf_donorsemendetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_donorsemendetails');
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
                $doc = new $class(Container("ivf_donorsemendetails"));
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
                    if ($pageName == "IvfDonorsemendetailsView") {
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
        $this->RIDNo->setVisibility();
        $this->TidNo->setVisibility();
        $this->Agency->setVisibility();
        $this->ReceivedOn->setVisibility();
        $this->ReceivedBy->setVisibility();
        $this->DonorNo->setVisibility();
        $this->BatchNo->setVisibility();
        $this->BloodGroup->setVisibility();
        $this->Height->setVisibility();
        $this->SkinColor->setVisibility();
        $this->EyeColor->setVisibility();
        $this->HairColor->setVisibility();
        $this->NoOfVials->setVisibility();
        $this->Tank->setVisibility();
        $this->Canister->setVisibility();
        $this->Remarks->setVisibility();
        $this->patientid->setVisibility();
        $this->coupleid->setVisibility();
        $this->Usedstatus->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->Lagency->setVisibility();
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
        $this->setupLookupOptions($this->BloodGroup);
        $this->setupLookupOptions($this->Lagency);

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
                    $this->terminate("IvfDonorsemendetailsList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "IvfDonorsemendetailsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfDonorsemendetailsView") {
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
        $this->RIDNo->CurrentValue = null;
        $this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->Agency->CurrentValue = null;
        $this->Agency->OldValue = $this->Agency->CurrentValue;
        $this->ReceivedOn->CurrentValue = null;
        $this->ReceivedOn->OldValue = $this->ReceivedOn->CurrentValue;
        $this->ReceivedBy->CurrentValue = null;
        $this->ReceivedBy->OldValue = $this->ReceivedBy->CurrentValue;
        $this->DonorNo->CurrentValue = null;
        $this->DonorNo->OldValue = $this->DonorNo->CurrentValue;
        $this->BatchNo->CurrentValue = null;
        $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
        $this->BloodGroup->CurrentValue = null;
        $this->BloodGroup->OldValue = $this->BloodGroup->CurrentValue;
        $this->Height->CurrentValue = null;
        $this->Height->OldValue = $this->Height->CurrentValue;
        $this->SkinColor->CurrentValue = null;
        $this->SkinColor->OldValue = $this->SkinColor->CurrentValue;
        $this->EyeColor->CurrentValue = null;
        $this->EyeColor->OldValue = $this->EyeColor->CurrentValue;
        $this->HairColor->CurrentValue = null;
        $this->HairColor->OldValue = $this->HairColor->CurrentValue;
        $this->NoOfVials->CurrentValue = null;
        $this->NoOfVials->OldValue = $this->NoOfVials->CurrentValue;
        $this->Tank->CurrentValue = null;
        $this->Tank->OldValue = $this->Tank->CurrentValue;
        $this->Canister->CurrentValue = null;
        $this->Canister->OldValue = $this->Canister->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->patientid->CurrentValue = null;
        $this->patientid->OldValue = $this->patientid->CurrentValue;
        $this->coupleid->CurrentValue = null;
        $this->coupleid->OldValue = $this->coupleid->CurrentValue;
        $this->Usedstatus->CurrentValue = null;
        $this->Usedstatus->OldValue = $this->Usedstatus->CurrentValue;
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
        $this->Lagency->CurrentValue = null;
        $this->Lagency->OldValue = $this->Lagency->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
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

        // Check field name 'Agency' first before field var 'x_Agency'
        $val = $CurrentForm->hasValue("Agency") ? $CurrentForm->getValue("Agency") : $CurrentForm->getValue("x_Agency");
        if (!$this->Agency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Agency->Visible = false; // Disable update for API request
            } else {
                $this->Agency->setFormValue($val);
            }
        }

        // Check field name 'ReceivedOn' first before field var 'x_ReceivedOn'
        $val = $CurrentForm->hasValue("ReceivedOn") ? $CurrentForm->getValue("ReceivedOn") : $CurrentForm->getValue("x_ReceivedOn");
        if (!$this->ReceivedOn->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReceivedOn->Visible = false; // Disable update for API request
            } else {
                $this->ReceivedOn->setFormValue($val);
            }
            $this->ReceivedOn->CurrentValue = UnFormatDateTime($this->ReceivedOn->CurrentValue, 0);
        }

        // Check field name 'ReceivedBy' first before field var 'x_ReceivedBy'
        $val = $CurrentForm->hasValue("ReceivedBy") ? $CurrentForm->getValue("ReceivedBy") : $CurrentForm->getValue("x_ReceivedBy");
        if (!$this->ReceivedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReceivedBy->Visible = false; // Disable update for API request
            } else {
                $this->ReceivedBy->setFormValue($val);
            }
        }

        // Check field name 'DonorNo' first before field var 'x_DonorNo'
        $val = $CurrentForm->hasValue("DonorNo") ? $CurrentForm->getValue("DonorNo") : $CurrentForm->getValue("x_DonorNo");
        if (!$this->DonorNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DonorNo->Visible = false; // Disable update for API request
            } else {
                $this->DonorNo->setFormValue($val);
            }
        }

        // Check field name 'BatchNo' first before field var 'x_BatchNo'
        $val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
        if (!$this->BatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchNo->Visible = false; // Disable update for API request
            } else {
                $this->BatchNo->setFormValue($val);
            }
        }

        // Check field name 'BloodGroup' first before field var 'x_BloodGroup'
        $val = $CurrentForm->hasValue("BloodGroup") ? $CurrentForm->getValue("BloodGroup") : $CurrentForm->getValue("x_BloodGroup");
        if (!$this->BloodGroup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BloodGroup->Visible = false; // Disable update for API request
            } else {
                $this->BloodGroup->setFormValue($val);
            }
        }

        // Check field name 'Height' first before field var 'x_Height'
        $val = $CurrentForm->hasValue("Height") ? $CurrentForm->getValue("Height") : $CurrentForm->getValue("x_Height");
        if (!$this->Height->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Height->Visible = false; // Disable update for API request
            } else {
                $this->Height->setFormValue($val);
            }
        }

        // Check field name 'SkinColor' first before field var 'x_SkinColor'
        $val = $CurrentForm->hasValue("SkinColor") ? $CurrentForm->getValue("SkinColor") : $CurrentForm->getValue("x_SkinColor");
        if (!$this->SkinColor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SkinColor->Visible = false; // Disable update for API request
            } else {
                $this->SkinColor->setFormValue($val);
            }
        }

        // Check field name 'EyeColor' first before field var 'x_EyeColor'
        $val = $CurrentForm->hasValue("EyeColor") ? $CurrentForm->getValue("EyeColor") : $CurrentForm->getValue("x_EyeColor");
        if (!$this->EyeColor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EyeColor->Visible = false; // Disable update for API request
            } else {
                $this->EyeColor->setFormValue($val);
            }
        }

        // Check field name 'HairColor' first before field var 'x_HairColor'
        $val = $CurrentForm->hasValue("HairColor") ? $CurrentForm->getValue("HairColor") : $CurrentForm->getValue("x_HairColor");
        if (!$this->HairColor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HairColor->Visible = false; // Disable update for API request
            } else {
                $this->HairColor->setFormValue($val);
            }
        }

        // Check field name 'NoOfVials' first before field var 'x_NoOfVials'
        $val = $CurrentForm->hasValue("NoOfVials") ? $CurrentForm->getValue("NoOfVials") : $CurrentForm->getValue("x_NoOfVials");
        if (!$this->NoOfVials->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfVials->Visible = false; // Disable update for API request
            } else {
                $this->NoOfVials->setFormValue($val);
            }
        }

        // Check field name 'Tank' first before field var 'x_Tank'
        $val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
        if (!$this->Tank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tank->Visible = false; // Disable update for API request
            } else {
                $this->Tank->setFormValue($val);
            }
        }

        // Check field name 'Canister' first before field var 'x_Canister'
        $val = $CurrentForm->hasValue("Canister") ? $CurrentForm->getValue("Canister") : $CurrentForm->getValue("x_Canister");
        if (!$this->Canister->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Canister->Visible = false; // Disable update for API request
            } else {
                $this->Canister->setFormValue($val);
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

        // Check field name 'patientid' first before field var 'x_patientid'
        $val = $CurrentForm->hasValue("patientid") ? $CurrentForm->getValue("patientid") : $CurrentForm->getValue("x_patientid");
        if (!$this->patientid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientid->Visible = false; // Disable update for API request
            } else {
                $this->patientid->setFormValue($val);
            }
        }

        // Check field name 'coupleid' first before field var 'x_coupleid'
        $val = $CurrentForm->hasValue("coupleid") ? $CurrentForm->getValue("coupleid") : $CurrentForm->getValue("x_coupleid");
        if (!$this->coupleid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->coupleid->Visible = false; // Disable update for API request
            } else {
                $this->coupleid->setFormValue($val);
            }
        }

        // Check field name 'Usedstatus' first before field var 'x_Usedstatus'
        $val = $CurrentForm->hasValue("Usedstatus") ? $CurrentForm->getValue("Usedstatus") : $CurrentForm->getValue("x_Usedstatus");
        if (!$this->Usedstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Usedstatus->Visible = false; // Disable update for API request
            } else {
                $this->Usedstatus->setFormValue($val);
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

        // Check field name 'Lagency' first before field var 'x_Lagency'
        $val = $CurrentForm->hasValue("Lagency") ? $CurrentForm->getValue("Lagency") : $CurrentForm->getValue("x_Lagency");
        if (!$this->Lagency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Lagency->Visible = false; // Disable update for API request
            } else {
                $this->Lagency->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->Agency->CurrentValue = $this->Agency->FormValue;
        $this->ReceivedOn->CurrentValue = $this->ReceivedOn->FormValue;
        $this->ReceivedOn->CurrentValue = UnFormatDateTime($this->ReceivedOn->CurrentValue, 0);
        $this->ReceivedBy->CurrentValue = $this->ReceivedBy->FormValue;
        $this->DonorNo->CurrentValue = $this->DonorNo->FormValue;
        $this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
        $this->BloodGroup->CurrentValue = $this->BloodGroup->FormValue;
        $this->Height->CurrentValue = $this->Height->FormValue;
        $this->SkinColor->CurrentValue = $this->SkinColor->FormValue;
        $this->EyeColor->CurrentValue = $this->EyeColor->FormValue;
        $this->HairColor->CurrentValue = $this->HairColor->FormValue;
        $this->NoOfVials->CurrentValue = $this->NoOfVials->FormValue;
        $this->Tank->CurrentValue = $this->Tank->FormValue;
        $this->Canister->CurrentValue = $this->Canister->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->patientid->CurrentValue = $this->patientid->FormValue;
        $this->coupleid->CurrentValue = $this->coupleid->FormValue;
        $this->Usedstatus->CurrentValue = $this->Usedstatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->Lagency->CurrentValue = $this->Lagency->FormValue;
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Agency->setDbValue($row['Agency']);
        $this->ReceivedOn->setDbValue($row['ReceivedOn']);
        $this->ReceivedBy->setDbValue($row['ReceivedBy']);
        $this->DonorNo->setDbValue($row['DonorNo']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->BloodGroup->setDbValue($row['BloodGroup']);
        $this->Height->setDbValue($row['Height']);
        $this->SkinColor->setDbValue($row['SkinColor']);
        $this->EyeColor->setDbValue($row['EyeColor']);
        $this->HairColor->setDbValue($row['HairColor']);
        $this->NoOfVials->setDbValue($row['NoOfVials']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Canister->setDbValue($row['Canister']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->patientid->setDbValue($row['patientid']);
        $this->coupleid->setDbValue($row['coupleid']);
        $this->Usedstatus->setDbValue($row['Usedstatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Lagency->setDbValue($row['Lagency']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNo'] = $this->RIDNo->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['Agency'] = $this->Agency->CurrentValue;
        $row['ReceivedOn'] = $this->ReceivedOn->CurrentValue;
        $row['ReceivedBy'] = $this->ReceivedBy->CurrentValue;
        $row['DonorNo'] = $this->DonorNo->CurrentValue;
        $row['BatchNo'] = $this->BatchNo->CurrentValue;
        $row['BloodGroup'] = $this->BloodGroup->CurrentValue;
        $row['Height'] = $this->Height->CurrentValue;
        $row['SkinColor'] = $this->SkinColor->CurrentValue;
        $row['EyeColor'] = $this->EyeColor->CurrentValue;
        $row['HairColor'] = $this->HairColor->CurrentValue;
        $row['NoOfVials'] = $this->NoOfVials->CurrentValue;
        $row['Tank'] = $this->Tank->CurrentValue;
        $row['Canister'] = $this->Canister->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['patientid'] = $this->patientid->CurrentValue;
        $row['coupleid'] = $this->coupleid->CurrentValue;
        $row['Usedstatus'] = $this->Usedstatus->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['Lagency'] = $this->Lagency->CurrentValue;
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

        // RIDNo

        // TidNo

        // Agency

        // ReceivedOn

        // ReceivedBy

        // DonorNo

        // BatchNo

        // BloodGroup

        // Height

        // SkinColor

        // EyeColor

        // HairColor

        // NoOfVials

        // Tank

        // Canister

        // Remarks

        // patientid

        // coupleid

        // Usedstatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Lagency
        if ($this->RowType == ROWTYPE_VIEW) {
            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Agency
            $this->Agency->ViewValue = $this->Agency->CurrentValue;
            $this->Agency->ViewCustomAttributes = "";

            // ReceivedOn
            $this->ReceivedOn->ViewValue = $this->ReceivedOn->CurrentValue;
            $this->ReceivedOn->ViewValue = FormatDateTime($this->ReceivedOn->ViewValue, 0);
            $this->ReceivedOn->ViewCustomAttributes = "";

            // ReceivedBy
            $this->ReceivedBy->ViewValue = $this->ReceivedBy->CurrentValue;
            $this->ReceivedBy->ViewCustomAttributes = "";

            // DonorNo
            $this->DonorNo->ViewValue = $this->DonorNo->CurrentValue;
            $this->DonorNo->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // BloodGroup
            $curVal = trim(strval($this->BloodGroup->CurrentValue));
            if ($curVal != "") {
                $this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
                if ($this->BloodGroup->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->BloodGroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BloodGroup->Lookup->renderViewRow($rswrk[0]);
                        $this->BloodGroup->ViewValue = $this->BloodGroup->displayValue($arwrk);
                    } else {
                        $this->BloodGroup->ViewValue = $this->BloodGroup->CurrentValue;
                    }
                }
            } else {
                $this->BloodGroup->ViewValue = null;
            }
            $this->BloodGroup->ViewCustomAttributes = "";

            // Height
            $this->Height->ViewValue = $this->Height->CurrentValue;
            $this->Height->ViewCustomAttributes = "";

            // SkinColor
            if (strval($this->SkinColor->CurrentValue) != "") {
                $this->SkinColor->ViewValue = $this->SkinColor->optionCaption($this->SkinColor->CurrentValue);
            } else {
                $this->SkinColor->ViewValue = null;
            }
            $this->SkinColor->ViewCustomAttributes = "";

            // EyeColor
            if (strval($this->EyeColor->CurrentValue) != "") {
                $this->EyeColor->ViewValue = $this->EyeColor->optionCaption($this->EyeColor->CurrentValue);
            } else {
                $this->EyeColor->ViewValue = null;
            }
            $this->EyeColor->ViewCustomAttributes = "";

            // HairColor
            if (strval($this->HairColor->CurrentValue) != "") {
                $this->HairColor->ViewValue = $this->HairColor->optionCaption($this->HairColor->CurrentValue);
            } else {
                $this->HairColor->ViewValue = null;
            }
            $this->HairColor->ViewCustomAttributes = "";

            // NoOfVials
            $this->NoOfVials->ViewValue = $this->NoOfVials->CurrentValue;
            $this->NoOfVials->ViewCustomAttributes = "";

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Canister
            $this->Canister->ViewValue = $this->Canister->CurrentValue;
            $this->Canister->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // patientid
            $this->patientid->ViewValue = $this->patientid->CurrentValue;
            $this->patientid->ViewValue = FormatNumber($this->patientid->ViewValue, 0, -2, -2, -2);
            $this->patientid->ViewCustomAttributes = "";

            // coupleid
            $this->coupleid->ViewValue = $this->coupleid->CurrentValue;
            $this->coupleid->ViewValue = FormatNumber($this->coupleid->ViewValue, 0, -2, -2, -2);
            $this->coupleid->ViewCustomAttributes = "";

            // Usedstatus
            $this->Usedstatus->ViewValue = $this->Usedstatus->CurrentValue;
            $this->Usedstatus->ViewValue = FormatNumber($this->Usedstatus->ViewValue, 0, -2, -2, -2);
            $this->Usedstatus->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // Lagency
            $curVal = trim(strval($this->Lagency->CurrentValue));
            if ($curVal != "") {
                $this->Lagency->ViewValue = $this->Lagency->lookupCacheOption($curVal);
                if ($this->Lagency->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Lagency->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Lagency->Lookup->renderViewRow($rswrk[0]);
                        $this->Lagency->ViewValue = $this->Lagency->displayValue($arwrk);
                    } else {
                        $this->Lagency->ViewValue = $this->Lagency->CurrentValue;
                    }
                }
            } else {
                $this->Lagency->ViewValue = null;
            }
            $this->Lagency->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Agency
            $this->Agency->LinkCustomAttributes = "";
            $this->Agency->HrefValue = "";
            $this->Agency->TooltipValue = "";

            // ReceivedOn
            $this->ReceivedOn->LinkCustomAttributes = "";
            $this->ReceivedOn->HrefValue = "";
            $this->ReceivedOn->TooltipValue = "";

            // ReceivedBy
            $this->ReceivedBy->LinkCustomAttributes = "";
            $this->ReceivedBy->HrefValue = "";
            $this->ReceivedBy->TooltipValue = "";

            // DonorNo
            $this->DonorNo->LinkCustomAttributes = "";
            $this->DonorNo->HrefValue = "";
            $this->DonorNo->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";

            // BloodGroup
            $this->BloodGroup->LinkCustomAttributes = "";
            $this->BloodGroup->HrefValue = "";
            $this->BloodGroup->TooltipValue = "";

            // Height
            $this->Height->LinkCustomAttributes = "";
            $this->Height->HrefValue = "";
            $this->Height->TooltipValue = "";

            // SkinColor
            $this->SkinColor->LinkCustomAttributes = "";
            $this->SkinColor->HrefValue = "";
            $this->SkinColor->TooltipValue = "";

            // EyeColor
            $this->EyeColor->LinkCustomAttributes = "";
            $this->EyeColor->HrefValue = "";
            $this->EyeColor->TooltipValue = "";

            // HairColor
            $this->HairColor->LinkCustomAttributes = "";
            $this->HairColor->HrefValue = "";
            $this->HairColor->TooltipValue = "";

            // NoOfVials
            $this->NoOfVials->LinkCustomAttributes = "";
            $this->NoOfVials->HrefValue = "";
            $this->NoOfVials->TooltipValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";
            $this->Canister->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // patientid
            $this->patientid->LinkCustomAttributes = "";
            $this->patientid->HrefValue = "";
            $this->patientid->TooltipValue = "";

            // coupleid
            $this->coupleid->LinkCustomAttributes = "";
            $this->coupleid->HrefValue = "";
            $this->coupleid->TooltipValue = "";

            // Usedstatus
            $this->Usedstatus->LinkCustomAttributes = "";
            $this->Usedstatus->HrefValue = "";
            $this->Usedstatus->TooltipValue = "";

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

            // Lagency
            $this->Lagency->LinkCustomAttributes = "";
            $this->Lagency->HrefValue = "";
            $this->Lagency->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            $this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
            $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Agency
            $this->Agency->EditAttrs["class"] = "form-control";
            $this->Agency->EditCustomAttributes = "";
            if (!$this->Agency->Raw) {
                $this->Agency->CurrentValue = HtmlDecode($this->Agency->CurrentValue);
            }
            $this->Agency->EditValue = HtmlEncode($this->Agency->CurrentValue);
            $this->Agency->PlaceHolder = RemoveHtml($this->Agency->caption());

            // ReceivedOn
            $this->ReceivedOn->EditAttrs["class"] = "form-control";
            $this->ReceivedOn->EditCustomAttributes = "";
            $this->ReceivedOn->EditValue = HtmlEncode(FormatDateTime($this->ReceivedOn->CurrentValue, 8));
            $this->ReceivedOn->PlaceHolder = RemoveHtml($this->ReceivedOn->caption());

            // ReceivedBy
            $this->ReceivedBy->EditAttrs["class"] = "form-control";
            $this->ReceivedBy->EditCustomAttributes = "";
            if (!$this->ReceivedBy->Raw) {
                $this->ReceivedBy->CurrentValue = HtmlDecode($this->ReceivedBy->CurrentValue);
            }
            $this->ReceivedBy->EditValue = HtmlEncode($this->ReceivedBy->CurrentValue);
            $this->ReceivedBy->PlaceHolder = RemoveHtml($this->ReceivedBy->caption());

            // DonorNo
            $this->DonorNo->EditAttrs["class"] = "form-control";
            $this->DonorNo->EditCustomAttributes = "";
            if (!$this->DonorNo->Raw) {
                $this->DonorNo->CurrentValue = HtmlDecode($this->DonorNo->CurrentValue);
            }
            $this->DonorNo->EditValue = HtmlEncode($this->DonorNo->CurrentValue);
            $this->DonorNo->PlaceHolder = RemoveHtml($this->DonorNo->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // BloodGroup
            $this->BloodGroup->EditAttrs["class"] = "form-control";
            $this->BloodGroup->EditCustomAttributes = "";
            $curVal = trim(strval($this->BloodGroup->CurrentValue));
            if ($curVal != "") {
                $this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
            } else {
                $this->BloodGroup->ViewValue = $this->BloodGroup->Lookup !== null && is_array($this->BloodGroup->Lookup->Options) ? $curVal : null;
            }
            if ($this->BloodGroup->ViewValue !== null) { // Load from cache
                $this->BloodGroup->EditValue = array_values($this->BloodGroup->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`BloodGroup`" . SearchString("=", $this->BloodGroup->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->BloodGroup->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->BloodGroup->EditValue = $arwrk;
            }
            $this->BloodGroup->PlaceHolder = RemoveHtml($this->BloodGroup->caption());

            // Height
            $this->Height->EditAttrs["class"] = "form-control";
            $this->Height->EditCustomAttributes = "";
            if (!$this->Height->Raw) {
                $this->Height->CurrentValue = HtmlDecode($this->Height->CurrentValue);
            }
            $this->Height->EditValue = HtmlEncode($this->Height->CurrentValue);
            $this->Height->PlaceHolder = RemoveHtml($this->Height->caption());

            // SkinColor
            $this->SkinColor->EditAttrs["class"] = "form-control";
            $this->SkinColor->EditCustomAttributes = "";
            $this->SkinColor->EditValue = $this->SkinColor->options(true);
            $this->SkinColor->PlaceHolder = RemoveHtml($this->SkinColor->caption());

            // EyeColor
            $this->EyeColor->EditAttrs["class"] = "form-control";
            $this->EyeColor->EditCustomAttributes = "";
            $this->EyeColor->EditValue = $this->EyeColor->options(true);
            $this->EyeColor->PlaceHolder = RemoveHtml($this->EyeColor->caption());

            // HairColor
            $this->HairColor->EditAttrs["class"] = "form-control";
            $this->HairColor->EditCustomAttributes = "";
            $this->HairColor->EditValue = $this->HairColor->options(true);
            $this->HairColor->PlaceHolder = RemoveHtml($this->HairColor->caption());

            // NoOfVials
            $this->NoOfVials->EditAttrs["class"] = "form-control";
            $this->NoOfVials->EditCustomAttributes = "";
            if (!$this->NoOfVials->Raw) {
                $this->NoOfVials->CurrentValue = HtmlDecode($this->NoOfVials->CurrentValue);
            }
            $this->NoOfVials->EditValue = HtmlEncode($this->NoOfVials->CurrentValue);
            $this->NoOfVials->PlaceHolder = RemoveHtml($this->NoOfVials->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Canister
            $this->Canister->EditAttrs["class"] = "form-control";
            $this->Canister->EditCustomAttributes = "";
            if (!$this->Canister->Raw) {
                $this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
            }
            $this->Canister->EditValue = HtmlEncode($this->Canister->CurrentValue);
            $this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // patientid
            $this->patientid->EditAttrs["class"] = "form-control";
            $this->patientid->EditCustomAttributes = "";
            $this->patientid->EditValue = HtmlEncode($this->patientid->CurrentValue);
            $this->patientid->PlaceHolder = RemoveHtml($this->patientid->caption());

            // coupleid
            $this->coupleid->EditAttrs["class"] = "form-control";
            $this->coupleid->EditCustomAttributes = "";
            $this->coupleid->EditValue = HtmlEncode($this->coupleid->CurrentValue);
            $this->coupleid->PlaceHolder = RemoveHtml($this->coupleid->caption());

            // Usedstatus
            $this->Usedstatus->EditAttrs["class"] = "form-control";
            $this->Usedstatus->EditCustomAttributes = "";
            $this->Usedstatus->EditValue = HtmlEncode($this->Usedstatus->CurrentValue);
            $this->Usedstatus->PlaceHolder = RemoveHtml($this->Usedstatus->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby

            // createddatetime

            // Lagency
            $this->Lagency->EditAttrs["class"] = "form-control";
            $this->Lagency->EditCustomAttributes = "";
            $curVal = trim(strval($this->Lagency->CurrentValue));
            if ($curVal != "") {
                $this->Lagency->ViewValue = $this->Lagency->lookupCacheOption($curVal);
            } else {
                $this->Lagency->ViewValue = $this->Lagency->Lookup !== null && is_array($this->Lagency->Lookup->Options) ? $curVal : null;
            }
            if ($this->Lagency->ViewValue !== null) { // Load from cache
                $this->Lagency->EditValue = array_values($this->Lagency->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->Lagency->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Lagency->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Lagency->EditValue = $arwrk;
            }
            $this->Lagency->PlaceHolder = RemoveHtml($this->Lagency->caption());

            // Add refer script

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Agency
            $this->Agency->LinkCustomAttributes = "";
            $this->Agency->HrefValue = "";

            // ReceivedOn
            $this->ReceivedOn->LinkCustomAttributes = "";
            $this->ReceivedOn->HrefValue = "";

            // ReceivedBy
            $this->ReceivedBy->LinkCustomAttributes = "";
            $this->ReceivedBy->HrefValue = "";

            // DonorNo
            $this->DonorNo->LinkCustomAttributes = "";
            $this->DonorNo->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // BloodGroup
            $this->BloodGroup->LinkCustomAttributes = "";
            $this->BloodGroup->HrefValue = "";

            // Height
            $this->Height->LinkCustomAttributes = "";
            $this->Height->HrefValue = "";

            // SkinColor
            $this->SkinColor->LinkCustomAttributes = "";
            $this->SkinColor->HrefValue = "";

            // EyeColor
            $this->EyeColor->LinkCustomAttributes = "";
            $this->EyeColor->HrefValue = "";

            // HairColor
            $this->HairColor->LinkCustomAttributes = "";
            $this->HairColor->HrefValue = "";

            // NoOfVials
            $this->NoOfVials->LinkCustomAttributes = "";
            $this->NoOfVials->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // patientid
            $this->patientid->LinkCustomAttributes = "";
            $this->patientid->HrefValue = "";

            // coupleid
            $this->coupleid->LinkCustomAttributes = "";
            $this->coupleid->HrefValue = "";

            // Usedstatus
            $this->Usedstatus->LinkCustomAttributes = "";
            $this->Usedstatus->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // Lagency
            $this->Lagency->LinkCustomAttributes = "";
            $this->Lagency->HrefValue = "";
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
        if ($this->RIDNo->Required) {
            if (!$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNo->FormValue)) {
            $this->RIDNo->addErrorMessage($this->RIDNo->getErrorMessage(false));
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->Agency->Required) {
            if (!$this->Agency->IsDetailKey && EmptyValue($this->Agency->FormValue)) {
                $this->Agency->addErrorMessage(str_replace("%s", $this->Agency->caption(), $this->Agency->RequiredErrorMessage));
            }
        }
        if ($this->ReceivedOn->Required) {
            if (!$this->ReceivedOn->IsDetailKey && EmptyValue($this->ReceivedOn->FormValue)) {
                $this->ReceivedOn->addErrorMessage(str_replace("%s", $this->ReceivedOn->caption(), $this->ReceivedOn->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ReceivedOn->FormValue)) {
            $this->ReceivedOn->addErrorMessage($this->ReceivedOn->getErrorMessage(false));
        }
        if ($this->ReceivedBy->Required) {
            if (!$this->ReceivedBy->IsDetailKey && EmptyValue($this->ReceivedBy->FormValue)) {
                $this->ReceivedBy->addErrorMessage(str_replace("%s", $this->ReceivedBy->caption(), $this->ReceivedBy->RequiredErrorMessage));
            }
        }
        if ($this->DonorNo->Required) {
            if (!$this->DonorNo->IsDetailKey && EmptyValue($this->DonorNo->FormValue)) {
                $this->DonorNo->addErrorMessage(str_replace("%s", $this->DonorNo->caption(), $this->DonorNo->RequiredErrorMessage));
            }
        }
        if ($this->BatchNo->Required) {
            if (!$this->BatchNo->IsDetailKey && EmptyValue($this->BatchNo->FormValue)) {
                $this->BatchNo->addErrorMessage(str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
            }
        }
        if ($this->BloodGroup->Required) {
            if (!$this->BloodGroup->IsDetailKey && EmptyValue($this->BloodGroup->FormValue)) {
                $this->BloodGroup->addErrorMessage(str_replace("%s", $this->BloodGroup->caption(), $this->BloodGroup->RequiredErrorMessage));
            }
        }
        if ($this->Height->Required) {
            if (!$this->Height->IsDetailKey && EmptyValue($this->Height->FormValue)) {
                $this->Height->addErrorMessage(str_replace("%s", $this->Height->caption(), $this->Height->RequiredErrorMessage));
            }
        }
        if ($this->SkinColor->Required) {
            if (!$this->SkinColor->IsDetailKey && EmptyValue($this->SkinColor->FormValue)) {
                $this->SkinColor->addErrorMessage(str_replace("%s", $this->SkinColor->caption(), $this->SkinColor->RequiredErrorMessage));
            }
        }
        if ($this->EyeColor->Required) {
            if (!$this->EyeColor->IsDetailKey && EmptyValue($this->EyeColor->FormValue)) {
                $this->EyeColor->addErrorMessage(str_replace("%s", $this->EyeColor->caption(), $this->EyeColor->RequiredErrorMessage));
            }
        }
        if ($this->HairColor->Required) {
            if (!$this->HairColor->IsDetailKey && EmptyValue($this->HairColor->FormValue)) {
                $this->HairColor->addErrorMessage(str_replace("%s", $this->HairColor->caption(), $this->HairColor->RequiredErrorMessage));
            }
        }
        if ($this->NoOfVials->Required) {
            if (!$this->NoOfVials->IsDetailKey && EmptyValue($this->NoOfVials->FormValue)) {
                $this->NoOfVials->addErrorMessage(str_replace("%s", $this->NoOfVials->caption(), $this->NoOfVials->RequiredErrorMessage));
            }
        }
        if ($this->Tank->Required) {
            if (!$this->Tank->IsDetailKey && EmptyValue($this->Tank->FormValue)) {
                $this->Tank->addErrorMessage(str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
            }
        }
        if ($this->Canister->Required) {
            if (!$this->Canister->IsDetailKey && EmptyValue($this->Canister->FormValue)) {
                $this->Canister->addErrorMessage(str_replace("%s", $this->Canister->caption(), $this->Canister->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->patientid->Required) {
            if (!$this->patientid->IsDetailKey && EmptyValue($this->patientid->FormValue)) {
                $this->patientid->addErrorMessage(str_replace("%s", $this->patientid->caption(), $this->patientid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patientid->FormValue)) {
            $this->patientid->addErrorMessage($this->patientid->getErrorMessage(false));
        }
        if ($this->coupleid->Required) {
            if (!$this->coupleid->IsDetailKey && EmptyValue($this->coupleid->FormValue)) {
                $this->coupleid->addErrorMessage(str_replace("%s", $this->coupleid->caption(), $this->coupleid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->coupleid->FormValue)) {
            $this->coupleid->addErrorMessage($this->coupleid->getErrorMessage(false));
        }
        if ($this->Usedstatus->Required) {
            if (!$this->Usedstatus->IsDetailKey && EmptyValue($this->Usedstatus->FormValue)) {
                $this->Usedstatus->addErrorMessage(str_replace("%s", $this->Usedstatus->caption(), $this->Usedstatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Usedstatus->FormValue)) {
            $this->Usedstatus->addErrorMessage($this->Usedstatus->getErrorMessage(false));
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->status->FormValue)) {
            $this->status->addErrorMessage($this->status->getErrorMessage(false));
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
        if ($this->Lagency->Required) {
            if (!$this->Lagency->IsDetailKey && EmptyValue($this->Lagency->FormValue)) {
                $this->Lagency->addErrorMessage(str_replace("%s", $this->Lagency->caption(), $this->Lagency->RequiredErrorMessage));
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

        // RIDNo
        $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // Agency
        $this->Agency->setDbValueDef($rsnew, $this->Agency->CurrentValue, null, false);

        // ReceivedOn
        $this->ReceivedOn->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedOn->CurrentValue, 0), null, false);

        // ReceivedBy
        $this->ReceivedBy->setDbValueDef($rsnew, $this->ReceivedBy->CurrentValue, null, false);

        // DonorNo
        $this->DonorNo->setDbValueDef($rsnew, $this->DonorNo->CurrentValue, null, false);

        // BatchNo
        $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, false);

        // BloodGroup
        $this->BloodGroup->setDbValueDef($rsnew, $this->BloodGroup->CurrentValue, null, false);

        // Height
        $this->Height->setDbValueDef($rsnew, $this->Height->CurrentValue, null, false);

        // SkinColor
        $this->SkinColor->setDbValueDef($rsnew, $this->SkinColor->CurrentValue, null, false);

        // EyeColor
        $this->EyeColor->setDbValueDef($rsnew, $this->EyeColor->CurrentValue, null, false);

        // HairColor
        $this->HairColor->setDbValueDef($rsnew, $this->HairColor->CurrentValue, null, false);

        // NoOfVials
        $this->NoOfVials->setDbValueDef($rsnew, $this->NoOfVials->CurrentValue, null, false);

        // Tank
        $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, false);

        // Canister
        $this->Canister->setDbValueDef($rsnew, $this->Canister->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // patientid
        $this->patientid->setDbValueDef($rsnew, $this->patientid->CurrentValue, null, false);

        // coupleid
        $this->coupleid->setDbValueDef($rsnew, $this->coupleid->CurrentValue, null, false);

        // Usedstatus
        $this->Usedstatus->setDbValueDef($rsnew, $this->Usedstatus->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // Lagency
        $this->Lagency->setDbValueDef($rsnew, $this->Lagency->CurrentValue, "", false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfDonorsemendetailsList"), "", $this->TableVar, true);
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
                case "x_BloodGroup":
                    break;
                case "x_SkinColor":
                    break;
                case "x_EyeColor":
                    break;
                case "x_HairColor":
                    break;
                case "x_Lagency":
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
