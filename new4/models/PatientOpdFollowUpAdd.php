<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOpdFollowUpAdd extends PatientOpdFollowUp
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_opd_follow_up';

    // Page object name
    public $PageObjName = "PatientOpdFollowUpAdd";

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

        // Table object (patient_opd_follow_up)
        if (!isset($GLOBALS["patient_opd_follow_up"]) || get_class($GLOBALS["patient_opd_follow_up"]) == PROJECT_NAMESPACE . "patient_opd_follow_up") {
            $GLOBALS["patient_opd_follow_up"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_opd_follow_up');
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
                $doc = new $class(Container("patient_opd_follow_up"));
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
                    if ($pageName == "PatientOpdFollowUpView") {
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
        $this->Reception->setVisibility();
        $this->PatID->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Telephone->setVisibility();
        $this->mrnno->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->procedurenotes->setVisibility();
        $this->NextReviewDate->setVisibility();
        $this->ICSIAdvised->setVisibility();
        $this->DeliveryRegistered->setVisibility();
        $this->EDD->setVisibility();
        $this->SerologyPositive->setVisibility();
        $this->Allergy->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->LMP->setVisibility();
        $this->Procedure->setVisibility();
        $this->ProcedureDateTime->setVisibility();
        $this->ICSIDate->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->HospID->setVisibility();
        $this->createdUserName->setVisibility();
        $this->TemplateDrNotes->setVisibility();
        $this->reportheader->setVisibility();
        $this->Purpose->setVisibility();
        $this->DrName->setVisibility();
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
        $this->setupLookupOptions($this->Allergy);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->PatientSearch);
        $this->setupLookupOptions($this->TemplateDrNotes);
        $this->setupLookupOptions($this->DrName);

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
                    $this->terminate("PatientOpdFollowUpList"); // No matching record, return to list
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
                    $returnUrl = $this->GetAddUrl();
                    if (GetPageName($returnUrl) == "PatientOpdFollowUpList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PatientOpdFollowUpView") {
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
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->MobileNumber->CurrentValue = null;
        $this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
        $this->Telephone->CurrentValue = null;
        $this->Telephone->OldValue = $this->Telephone->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->procedurenotes->CurrentValue = null;
        $this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
        $this->NextReviewDate->CurrentValue = null;
        $this->NextReviewDate->OldValue = $this->NextReviewDate->CurrentValue;
        $this->ICSIAdvised->CurrentValue = null;
        $this->ICSIAdvised->OldValue = $this->ICSIAdvised->CurrentValue;
        $this->DeliveryRegistered->CurrentValue = null;
        $this->DeliveryRegistered->OldValue = $this->DeliveryRegistered->CurrentValue;
        $this->EDD->CurrentValue = null;
        $this->EDD->OldValue = $this->EDD->CurrentValue;
        $this->SerologyPositive->CurrentValue = null;
        $this->SerologyPositive->OldValue = $this->SerologyPositive->CurrentValue;
        $this->Allergy->CurrentValue = null;
        $this->Allergy->OldValue = $this->Allergy->CurrentValue;
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
        $this->LMP->CurrentValue = null;
        $this->LMP->OldValue = $this->LMP->CurrentValue;
        $this->Procedure->CurrentValue = null;
        $this->Procedure->OldValue = $this->Procedure->CurrentValue;
        $this->ProcedureDateTime->CurrentValue = null;
        $this->ProcedureDateTime->OldValue = $this->ProcedureDateTime->CurrentValue;
        $this->ICSIDate->CurrentValue = null;
        $this->ICSIDate->OldValue = $this->ICSIDate->CurrentValue;
        $this->PatientSearch->CurrentValue = null;
        $this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->createdUserName->CurrentValue = null;
        $this->createdUserName->OldValue = $this->createdUserName->CurrentValue;
        $this->TemplateDrNotes->CurrentValue = null;
        $this->TemplateDrNotes->OldValue = $this->TemplateDrNotes->CurrentValue;
        $this->reportheader->CurrentValue = null;
        $this->reportheader->OldValue = $this->reportheader->CurrentValue;
        $this->Purpose->CurrentValue = null;
        $this->Purpose->OldValue = $this->Purpose->CurrentValue;
        $this->DrName->CurrentValue = null;
        $this->DrName->OldValue = $this->DrName->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
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

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'MobileNumber' first before field var 'x_MobileNumber'
        $val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
        if (!$this->MobileNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MobileNumber->Visible = false; // Disable update for API request
            } else {
                $this->MobileNumber->setFormValue($val);
            }
        }

        // Check field name 'Telephone' first before field var 'x_Telephone'
        $val = $CurrentForm->hasValue("Telephone") ? $CurrentForm->getValue("Telephone") : $CurrentForm->getValue("x_Telephone");
        if (!$this->Telephone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Telephone->Visible = false; // Disable update for API request
            } else {
                $this->Telephone->setFormValue($val);
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

        // Check field name 'procedurenotes' first before field var 'x_procedurenotes'
        $val = $CurrentForm->hasValue("procedurenotes") ? $CurrentForm->getValue("procedurenotes") : $CurrentForm->getValue("x_procedurenotes");
        if (!$this->procedurenotes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->procedurenotes->Visible = false; // Disable update for API request
            } else {
                $this->procedurenotes->setFormValue($val);
            }
        }

        // Check field name 'NextReviewDate' first before field var 'x_NextReviewDate'
        $val = $CurrentForm->hasValue("NextReviewDate") ? $CurrentForm->getValue("NextReviewDate") : $CurrentForm->getValue("x_NextReviewDate");
        if (!$this->NextReviewDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NextReviewDate->Visible = false; // Disable update for API request
            } else {
                $this->NextReviewDate->setFormValue($val);
            }
            $this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
        }

        // Check field name 'ICSIAdvised' first before field var 'x_ICSIAdvised'
        $val = $CurrentForm->hasValue("ICSIAdvised") ? $CurrentForm->getValue("ICSIAdvised") : $CurrentForm->getValue("x_ICSIAdvised");
        if (!$this->ICSIAdvised->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ICSIAdvised->Visible = false; // Disable update for API request
            } else {
                $this->ICSIAdvised->setFormValue($val);
            }
        }

        // Check field name 'DeliveryRegistered' first before field var 'x_DeliveryRegistered'
        $val = $CurrentForm->hasValue("DeliveryRegistered") ? $CurrentForm->getValue("DeliveryRegistered") : $CurrentForm->getValue("x_DeliveryRegistered");
        if (!$this->DeliveryRegistered->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeliveryRegistered->Visible = false; // Disable update for API request
            } else {
                $this->DeliveryRegistered->setFormValue($val);
            }
        }

        // Check field name 'EDD' first before field var 'x_EDD'
        $val = $CurrentForm->hasValue("EDD") ? $CurrentForm->getValue("EDD") : $CurrentForm->getValue("x_EDD");
        if (!$this->EDD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EDD->Visible = false; // Disable update for API request
            } else {
                $this->EDD->setFormValue($val);
            }
            $this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 7);
        }

        // Check field name 'SerologyPositive' first before field var 'x_SerologyPositive'
        $val = $CurrentForm->hasValue("SerologyPositive") ? $CurrentForm->getValue("SerologyPositive") : $CurrentForm->getValue("x_SerologyPositive");
        if (!$this->SerologyPositive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SerologyPositive->Visible = false; // Disable update for API request
            } else {
                $this->SerologyPositive->setFormValue($val);
            }
        }

        // Check field name 'Allergy' first before field var 'x_Allergy'
        $val = $CurrentForm->hasValue("Allergy") ? $CurrentForm->getValue("Allergy") : $CurrentForm->getValue("x_Allergy");
        if (!$this->Allergy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Allergy->Visible = false; // Disable update for API request
            } else {
                $this->Allergy->setFormValue($val);
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

        // Check field name 'LMP' first before field var 'x_LMP'
        $val = $CurrentForm->hasValue("LMP") ? $CurrentForm->getValue("LMP") : $CurrentForm->getValue("x_LMP");
        if (!$this->LMP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LMP->Visible = false; // Disable update for API request
            } else {
                $this->LMP->setFormValue($val);
            }
            $this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 7);
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

        // Check field name 'ProcedureDateTime' first before field var 'x_ProcedureDateTime'
        $val = $CurrentForm->hasValue("ProcedureDateTime") ? $CurrentForm->getValue("ProcedureDateTime") : $CurrentForm->getValue("x_ProcedureDateTime");
        if (!$this->ProcedureDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureDateTime->setFormValue($val);
            }
            $this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11);
        }

        // Check field name 'ICSIDate' first before field var 'x_ICSIDate'
        $val = $CurrentForm->hasValue("ICSIDate") ? $CurrentForm->getValue("ICSIDate") : $CurrentForm->getValue("x_ICSIDate");
        if (!$this->ICSIDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ICSIDate->Visible = false; // Disable update for API request
            } else {
                $this->ICSIDate->setFormValue($val);
            }
            $this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 7);
        }

        // Check field name 'PatientSearch' first before field var 'x_PatientSearch'
        $val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
        if (!$this->PatientSearch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientSearch->Visible = false; // Disable update for API request
            } else {
                $this->PatientSearch->setFormValue($val);
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

        // Check field name 'createdUserName' first before field var 'x_createdUserName'
        $val = $CurrentForm->hasValue("createdUserName") ? $CurrentForm->getValue("createdUserName") : $CurrentForm->getValue("x_createdUserName");
        if (!$this->createdUserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdUserName->Visible = false; // Disable update for API request
            } else {
                $this->createdUserName->setFormValue($val);
            }
        }

        // Check field name 'TemplateDrNotes' first before field var 'x_TemplateDrNotes'
        $val = $CurrentForm->hasValue("TemplateDrNotes") ? $CurrentForm->getValue("TemplateDrNotes") : $CurrentForm->getValue("x_TemplateDrNotes");
        if (!$this->TemplateDrNotes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateDrNotes->Visible = false; // Disable update for API request
            } else {
                $this->TemplateDrNotes->setFormValue($val);
            }
        }

        // Check field name 'reportheader' first before field var 'x_reportheader'
        $val = $CurrentForm->hasValue("reportheader") ? $CurrentForm->getValue("reportheader") : $CurrentForm->getValue("x_reportheader");
        if (!$this->reportheader->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->reportheader->Visible = false; // Disable update for API request
            } else {
                $this->reportheader->setFormValue($val);
            }
        }

        // Check field name 'Purpose' first before field var 'x_Purpose'
        $val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
        if (!$this->Purpose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Purpose->Visible = false; // Disable update for API request
            } else {
                $this->Purpose->setFormValue($val);
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->Telephone->CurrentValue = $this->Telephone->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
        $this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
        $this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
        $this->ICSIAdvised->CurrentValue = $this->ICSIAdvised->FormValue;
        $this->DeliveryRegistered->CurrentValue = $this->DeliveryRegistered->FormValue;
        $this->EDD->CurrentValue = $this->EDD->FormValue;
        $this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 7);
        $this->SerologyPositive->CurrentValue = $this->SerologyPositive->FormValue;
        $this->Allergy->CurrentValue = $this->Allergy->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->LMP->CurrentValue = $this->LMP->FormValue;
        $this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 7);
        $this->Procedure->CurrentValue = $this->Procedure->FormValue;
        $this->ProcedureDateTime->CurrentValue = $this->ProcedureDateTime->FormValue;
        $this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11);
        $this->ICSIDate->CurrentValue = $this->ICSIDate->FormValue;
        $this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 7);
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->createdUserName->CurrentValue = $this->createdUserName->FormValue;
        $this->TemplateDrNotes->CurrentValue = $this->TemplateDrNotes->FormValue;
        $this->reportheader->CurrentValue = $this->reportheader->FormValue;
        $this->Purpose->CurrentValue = $this->Purpose->FormValue;
        $this->DrName->CurrentValue = $this->DrName->FormValue;
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Telephone->setDbValue($row['Telephone']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->ICSIAdvised->setDbValue($row['ICSIAdvised']);
        $this->DeliveryRegistered->setDbValue($row['DeliveryRegistered']);
        $this->EDD->setDbValue($row['EDD']);
        $this->SerologyPositive->setDbValue($row['SerologyPositive']);
        $this->Allergy->setDbValue($row['Allergy']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->LMP->setDbValue($row['LMP']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->ProcedureDateTime->setDbValue($row['ProcedureDateTime']);
        $this->ICSIDate->setDbValue($row['ICSIDate']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdUserName->setDbValue($row['createdUserName']);
        $this->TemplateDrNotes->setDbValue($row['TemplateDrNotes']);
        $this->reportheader->setDbValue($row['reportheader']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->DrName->setDbValue($row['DrName']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['MobileNumber'] = $this->MobileNumber->CurrentValue;
        $row['Telephone'] = $this->Telephone->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['procedurenotes'] = $this->procedurenotes->CurrentValue;
        $row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
        $row['ICSIAdvised'] = $this->ICSIAdvised->CurrentValue;
        $row['DeliveryRegistered'] = $this->DeliveryRegistered->CurrentValue;
        $row['EDD'] = $this->EDD->CurrentValue;
        $row['SerologyPositive'] = $this->SerologyPositive->CurrentValue;
        $row['Allergy'] = $this->Allergy->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['LMP'] = $this->LMP->CurrentValue;
        $row['Procedure'] = $this->Procedure->CurrentValue;
        $row['ProcedureDateTime'] = $this->ProcedureDateTime->CurrentValue;
        $row['ICSIDate'] = $this->ICSIDate->CurrentValue;
        $row['PatientSearch'] = $this->PatientSearch->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['createdUserName'] = $this->createdUserName->CurrentValue;
        $row['TemplateDrNotes'] = $this->TemplateDrNotes->CurrentValue;
        $row['reportheader'] = $this->reportheader->CurrentValue;
        $row['Purpose'] = $this->Purpose->CurrentValue;
        $row['DrName'] = $this->DrName->CurrentValue;
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

        // PatID

        // PatientId

        // PatientName

        // MobileNumber

        // Telephone

        // mrnno

        // Age

        // Gender

        // profilePic

        // procedurenotes

        // NextReviewDate

        // ICSIAdvised

        // DeliveryRegistered

        // EDD

        // SerologyPositive

        // Allergy

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // LMP

        // Procedure

        // ProcedureDateTime

        // ICSIDate

        // PatientSearch

        // HospID

        // createdUserName

        // TemplateDrNotes

        // reportheader

        // Purpose

        // DrName
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Telephone
            $this->Telephone->ViewValue = $this->Telephone->CurrentValue;
            $this->Telephone->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // procedurenotes
            $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
            $this->procedurenotes->ViewCustomAttributes = "";

            // NextReviewDate
            $this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
            $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
            $this->NextReviewDate->ViewCustomAttributes = "";

            // ICSIAdvised
            if (strval($this->ICSIAdvised->CurrentValue) != "") {
                $this->ICSIAdvised->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ICSIAdvised->ViewValue = null;
            }
            $this->ICSIAdvised->ViewCustomAttributes = "";

            // DeliveryRegistered
            if (strval($this->DeliveryRegistered->CurrentValue) != "") {
                $this->DeliveryRegistered->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->DeliveryRegistered->ViewValue = null;
            }
            $this->DeliveryRegistered->ViewCustomAttributes = "";

            // EDD
            $this->EDD->ViewValue = $this->EDD->CurrentValue;
            $this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 7);
            $this->EDD->ViewCustomAttributes = "";

            // SerologyPositive
            if (strval($this->SerologyPositive->CurrentValue) != "") {
                $this->SerologyPositive->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->SerologyPositive->ViewValue = null;
            }
            $this->SerologyPositive->ViewCustomAttributes = "";

            // Allergy
            $this->Allergy->ViewValue = $this->Allergy->CurrentValue;
            $curVal = trim(strval($this->Allergy->CurrentValue));
            if ($curVal != "") {
                $this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
                if ($this->Allergy->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Allergy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Allergy->Lookup->renderViewRow($rswrk[0]);
                        $this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
                    } else {
                        $this->Allergy->ViewValue = $this->Allergy->CurrentValue;
                    }
                }
            } else {
                $this->Allergy->ViewValue = null;
            }
            $this->Allergy->ViewCustomAttributes = "";

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

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
            $this->LMP->ViewCustomAttributes = "";

            // Procedure
            $this->Procedure->ViewValue = $this->Procedure->CurrentValue;
            $this->Procedure->ViewCustomAttributes = "";

            // ProcedureDateTime
            $this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
            $this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 11);
            $this->ProcedureDateTime->ViewCustomAttributes = "";

            // ICSIDate
            $this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
            $this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 7);
            $this->ICSIDate->ViewCustomAttributes = "";

            // PatientSearch
            $curVal = trim(strval($this->PatientSearch->CurrentValue));
            if ($curVal != "") {
                $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
                if ($this->PatientSearch->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                    } else {
                        $this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
                    }
                }
            } else {
                $this->PatientSearch->ViewValue = null;
            }
            $this->PatientSearch->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // createdUserName
            $this->createdUserName->ViewValue = $this->createdUserName->CurrentValue;
            $this->createdUserName->ViewCustomAttributes = "";

            // TemplateDrNotes
            $curVal = trim(strval($this->TemplateDrNotes->CurrentValue));
            if ($curVal != "") {
                $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
                if ($this->TemplateDrNotes->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Doctor Notes'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateDrNotes->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateDrNotes->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->displayValue($arwrk);
                    } else {
                        $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->CurrentValue;
                    }
                }
            } else {
                $this->TemplateDrNotes->ViewValue = null;
            }
            $this->TemplateDrNotes->ViewCustomAttributes = "";

            // reportheader
            if (strval($this->reportheader->CurrentValue) != "") {
                $this->reportheader->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->reportheader->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->reportheader->ViewValue->add($this->reportheader->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->reportheader->ViewValue = null;
            }
            $this->reportheader->ViewCustomAttributes = "";

            // Purpose
            $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
            $this->Purpose->ViewCustomAttributes = "";

            // DrName
            $curVal = trim(strval($this->DrName->CurrentValue));
            if ($curVal != "") {
                $this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
                if ($this->DrName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrName->Lookup->renderViewRow($rswrk[0]);
                        $this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
                    } else {
                        $this->DrName->ViewValue = $this->DrName->CurrentValue;
                    }
                }
            } else {
                $this->DrName->ViewValue = null;
            }
            $this->DrName->ViewCustomAttributes = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 80);
            $this->Reception->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->ExportHrefValue = Barcode()->getHrefValue($this->PatientId->CurrentValue, 'CODE128', 40);
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // Telephone
            $this->Telephone->LinkCustomAttributes = "";
            $this->Telephone->HrefValue = "";
            $this->Telephone->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

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

            // procedurenotes
            $this->procedurenotes->LinkCustomAttributes = "";
            $this->procedurenotes->HrefValue = "";
            $this->procedurenotes->TooltipValue = "";

            // NextReviewDate
            $this->NextReviewDate->LinkCustomAttributes = "";
            $this->NextReviewDate->HrefValue = "";
            $this->NextReviewDate->TooltipValue = "";

            // ICSIAdvised
            $this->ICSIAdvised->LinkCustomAttributes = "";
            $this->ICSIAdvised->HrefValue = "";
            $this->ICSIAdvised->TooltipValue = "";

            // DeliveryRegistered
            $this->DeliveryRegistered->LinkCustomAttributes = "";
            $this->DeliveryRegistered->HrefValue = "";
            $this->DeliveryRegistered->TooltipValue = "";

            // EDD
            $this->EDD->LinkCustomAttributes = "";
            $this->EDD->HrefValue = "";
            $this->EDD->TooltipValue = "";

            // SerologyPositive
            $this->SerologyPositive->LinkCustomAttributes = "";
            $this->SerologyPositive->HrefValue = "";
            $this->SerologyPositive->TooltipValue = "";

            // Allergy
            $this->Allergy->LinkCustomAttributes = "";
            $this->Allergy->HrefValue = "";
            $this->Allergy->TooltipValue = "";

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

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";
            $this->Procedure->TooltipValue = "";

            // ProcedureDateTime
            $this->ProcedureDateTime->LinkCustomAttributes = "";
            $this->ProcedureDateTime->HrefValue = "";
            $this->ProcedureDateTime->TooltipValue = "";

            // ICSIDate
            $this->ICSIDate->LinkCustomAttributes = "";
            $this->ICSIDate->HrefValue = "";
            $this->ICSIDate->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // createdUserName
            $this->createdUserName->LinkCustomAttributes = "";
            $this->createdUserName->HrefValue = "";
            $this->createdUserName->TooltipValue = "";

            // TemplateDrNotes
            $this->TemplateDrNotes->LinkCustomAttributes = "";
            $this->TemplateDrNotes->HrefValue = "";
            $this->TemplateDrNotes->TooltipValue = "";

            // reportheader
            $this->reportheader->LinkCustomAttributes = "";
            $this->reportheader->HrefValue = "";
            $this->reportheader->TooltipValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";
            $this->Purpose->TooltipValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";
            $this->DrName->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            if (!$this->Reception->Raw) {
                $this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
            }
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
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

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // Telephone
            $this->Telephone->EditAttrs["class"] = "form-control";
            $this->Telephone->EditCustomAttributes = "";
            if (!$this->Telephone->Raw) {
                $this->Telephone->CurrentValue = HtmlDecode($this->Telephone->CurrentValue);
            }
            $this->Telephone->EditValue = HtmlEncode($this->Telephone->CurrentValue);
            $this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

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

            // procedurenotes
            $this->procedurenotes->EditAttrs["class"] = "form-control";
            $this->procedurenotes->EditCustomAttributes = "";
            $this->procedurenotes->EditValue = HtmlEncode($this->procedurenotes->CurrentValue);
            $this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

            // NextReviewDate
            $this->NextReviewDate->EditAttrs["class"] = "form-control";
            $this->NextReviewDate->EditCustomAttributes = "";
            $this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 7));
            $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

            // ICSIAdvised
            $this->ICSIAdvised->EditCustomAttributes = "";
            $this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(false);
            $this->ICSIAdvised->PlaceHolder = RemoveHtml($this->ICSIAdvised->caption());

            // DeliveryRegistered
            $this->DeliveryRegistered->EditCustomAttributes = "";
            $this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(false);
            $this->DeliveryRegistered->PlaceHolder = RemoveHtml($this->DeliveryRegistered->caption());

            // EDD
            $this->EDD->EditAttrs["class"] = "form-control";
            $this->EDD->EditCustomAttributes = "";
            $this->EDD->EditValue = HtmlEncode(FormatDateTime($this->EDD->CurrentValue, 7));
            $this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

            // SerologyPositive
            $this->SerologyPositive->EditCustomAttributes = "";
            $this->SerologyPositive->EditValue = $this->SerologyPositive->options(false);
            $this->SerologyPositive->PlaceHolder = RemoveHtml($this->SerologyPositive->caption());

            // Allergy
            $this->Allergy->EditAttrs["class"] = "form-control";
            $this->Allergy->EditCustomAttributes = "";
            if (!$this->Allergy->Raw) {
                $this->Allergy->CurrentValue = HtmlDecode($this->Allergy->CurrentValue);
            }
            $this->Allergy->EditValue = HtmlEncode($this->Allergy->CurrentValue);
            $curVal = trim(strval($this->Allergy->CurrentValue));
            if ($curVal != "") {
                $this->Allergy->EditValue = $this->Allergy->lookupCacheOption($curVal);
                if ($this->Allergy->EditValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Allergy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Allergy->Lookup->renderViewRow($rswrk[0]);
                        $this->Allergy->EditValue = $this->Allergy->displayValue($arwrk);
                    } else {
                        $this->Allergy->EditValue = HtmlEncode($this->Allergy->CurrentValue);
                    }
                }
            } else {
                $this->Allergy->EditValue = null;
            }
            $this->Allergy->PlaceHolder = RemoveHtml($this->Allergy->caption());

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

            // createdby

            // createddatetime

            // LMP
            $this->LMP->EditAttrs["class"] = "form-control";
            $this->LMP->EditCustomAttributes = "";
            $this->LMP->EditValue = HtmlEncode(FormatDateTime($this->LMP->CurrentValue, 7));
            $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

            // Procedure
            $this->Procedure->EditAttrs["class"] = "form-control";
            $this->Procedure->EditCustomAttributes = "";
            $this->Procedure->EditValue = HtmlEncode($this->Procedure->CurrentValue);
            $this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

            // ProcedureDateTime
            $this->ProcedureDateTime->EditAttrs["class"] = "form-control";
            $this->ProcedureDateTime->EditCustomAttributes = "";
            $this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime($this->ProcedureDateTime->CurrentValue, 11));
            $this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

            // ICSIDate
            $this->ICSIDate->EditAttrs["class"] = "form-control";
            $this->ICSIDate->EditCustomAttributes = "";
            $this->ICSIDate->EditValue = HtmlEncode(FormatDateTime($this->ICSIDate->CurrentValue, 7));
            $this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

            // PatientSearch
            $this->PatientSearch->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientSearch->CurrentValue));
            if ($curVal != "") {
                $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
            } else {
                $this->PatientSearch->ViewValue = $this->PatientSearch->Lookup !== null && is_array($this->PatientSearch->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientSearch->ViewValue !== null) { // Load from cache
                $this->PatientSearch->EditValue = array_values($this->PatientSearch->Lookup->Options);
                if ($this->PatientSearch->ViewValue == "") {
                    $this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PatientSearch->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PatientSearch->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                } else {
                    $this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->PatientSearch->EditValue = $arwrk;
            }
            $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

            // HospID

            // createdUserName

            // TemplateDrNotes
            $this->TemplateDrNotes->EditAttrs["class"] = "form-control";
            $this->TemplateDrNotes->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateDrNotes->CurrentValue));
            if ($curVal != "") {
                $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
            } else {
                $this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->Lookup !== null && is_array($this->TemplateDrNotes->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateDrNotes->ViewValue !== null) { // Load from cache
                $this->TemplateDrNotes->EditValue = array_values($this->TemplateDrNotes->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateDrNotes->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Doctor Notes'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateDrNotes->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateDrNotes->EditValue = $arwrk;
            }
            $this->TemplateDrNotes->PlaceHolder = RemoveHtml($this->TemplateDrNotes->caption());

            // reportheader
            $this->reportheader->EditCustomAttributes = "";
            $this->reportheader->EditValue = $this->reportheader->options(false);
            $this->reportheader->PlaceHolder = RemoveHtml($this->reportheader->caption());

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // DrName
            $this->DrName->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrName->CurrentValue));
            if ($curVal != "") {
                $this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
            } else {
                $this->DrName->ViewValue = $this->DrName->Lookup !== null && is_array($this->DrName->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrName->ViewValue !== null) { // Load from cache
                $this->DrName->EditValue = array_values($this->DrName->Lookup->Options);
                if ($this->DrName->ViewValue == "") {
                    $this->DrName->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->DrName->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DrName->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DrName->Lookup->renderViewRow($rswrk[0]);
                    $this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
                } else {
                    $this->DrName->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DrName->EditValue = $arwrk;
            }
            $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

            // Add refer script

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 80);

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->ExportHrefValue = Barcode()->getHrefValue($this->PatientId->CurrentValue, 'CODE128', 40);

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // Telephone
            $this->Telephone->LinkCustomAttributes = "";
            $this->Telephone->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // procedurenotes
            $this->procedurenotes->LinkCustomAttributes = "";
            $this->procedurenotes->HrefValue = "";

            // NextReviewDate
            $this->NextReviewDate->LinkCustomAttributes = "";
            $this->NextReviewDate->HrefValue = "";

            // ICSIAdvised
            $this->ICSIAdvised->LinkCustomAttributes = "";
            $this->ICSIAdvised->HrefValue = "";

            // DeliveryRegistered
            $this->DeliveryRegistered->LinkCustomAttributes = "";
            $this->DeliveryRegistered->HrefValue = "";

            // EDD
            $this->EDD->LinkCustomAttributes = "";
            $this->EDD->HrefValue = "";

            // SerologyPositive
            $this->SerologyPositive->LinkCustomAttributes = "";
            $this->SerologyPositive->HrefValue = "";

            // Allergy
            $this->Allergy->LinkCustomAttributes = "";
            $this->Allergy->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";

            // ProcedureDateTime
            $this->ProcedureDateTime->LinkCustomAttributes = "";
            $this->ProcedureDateTime->HrefValue = "";

            // ICSIDate
            $this->ICSIDate->LinkCustomAttributes = "";
            $this->ICSIDate->HrefValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // createdUserName
            $this->createdUserName->LinkCustomAttributes = "";
            $this->createdUserName->HrefValue = "";

            // TemplateDrNotes
            $this->TemplateDrNotes->LinkCustomAttributes = "";
            $this->TemplateDrNotes->HrefValue = "";

            // reportheader
            $this->reportheader->LinkCustomAttributes = "";
            $this->reportheader->HrefValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
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
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->Telephone->Required) {
            if (!$this->Telephone->IsDetailKey && EmptyValue($this->Telephone->FormValue)) {
                $this->Telephone->addErrorMessage(str_replace("%s", $this->Telephone->caption(), $this->Telephone->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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
        if ($this->procedurenotes->Required) {
            if (!$this->procedurenotes->IsDetailKey && EmptyValue($this->procedurenotes->FormValue)) {
                $this->procedurenotes->addErrorMessage(str_replace("%s", $this->procedurenotes->caption(), $this->procedurenotes->RequiredErrorMessage));
            }
        }
        if ($this->NextReviewDate->Required) {
            if (!$this->NextReviewDate->IsDetailKey && EmptyValue($this->NextReviewDate->FormValue)) {
                $this->NextReviewDate->addErrorMessage(str_replace("%s", $this->NextReviewDate->caption(), $this->NextReviewDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->NextReviewDate->FormValue)) {
            $this->NextReviewDate->addErrorMessage($this->NextReviewDate->getErrorMessage(false));
        }
        if ($this->ICSIAdvised->Required) {
            if ($this->ICSIAdvised->FormValue == "") {
                $this->ICSIAdvised->addErrorMessage(str_replace("%s", $this->ICSIAdvised->caption(), $this->ICSIAdvised->RequiredErrorMessage));
            }
        }
        if ($this->DeliveryRegistered->Required) {
            if ($this->DeliveryRegistered->FormValue == "") {
                $this->DeliveryRegistered->addErrorMessage(str_replace("%s", $this->DeliveryRegistered->caption(), $this->DeliveryRegistered->RequiredErrorMessage));
            }
        }
        if ($this->EDD->Required) {
            if (!$this->EDD->IsDetailKey && EmptyValue($this->EDD->FormValue)) {
                $this->EDD->addErrorMessage(str_replace("%s", $this->EDD->caption(), $this->EDD->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->EDD->FormValue)) {
            $this->EDD->addErrorMessage($this->EDD->getErrorMessage(false));
        }
        if ($this->SerologyPositive->Required) {
            if ($this->SerologyPositive->FormValue == "") {
                $this->SerologyPositive->addErrorMessage(str_replace("%s", $this->SerologyPositive->caption(), $this->SerologyPositive->RequiredErrorMessage));
            }
        }
        if ($this->Allergy->Required) {
            if (!$this->Allergy->IsDetailKey && EmptyValue($this->Allergy->FormValue)) {
                $this->Allergy->addErrorMessage(str_replace("%s", $this->Allergy->caption(), $this->Allergy->RequiredErrorMessage));
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
        if ($this->LMP->Required) {
            if (!$this->LMP->IsDetailKey && EmptyValue($this->LMP->FormValue)) {
                $this->LMP->addErrorMessage(str_replace("%s", $this->LMP->caption(), $this->LMP->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->LMP->FormValue)) {
            $this->LMP->addErrorMessage($this->LMP->getErrorMessage(false));
        }
        if ($this->Procedure->Required) {
            if (!$this->Procedure->IsDetailKey && EmptyValue($this->Procedure->FormValue)) {
                $this->Procedure->addErrorMessage(str_replace("%s", $this->Procedure->caption(), $this->Procedure->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureDateTime->Required) {
            if (!$this->ProcedureDateTime->IsDetailKey && EmptyValue($this->ProcedureDateTime->FormValue)) {
                $this->ProcedureDateTime->addErrorMessage(str_replace("%s", $this->ProcedureDateTime->caption(), $this->ProcedureDateTime->RequiredErrorMessage));
            }
        }
        if ($this->ICSIDate->Required) {
            if (!$this->ICSIDate->IsDetailKey && EmptyValue($this->ICSIDate->FormValue)) {
                $this->ICSIDate->addErrorMessage(str_replace("%s", $this->ICSIDate->caption(), $this->ICSIDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->ICSIDate->FormValue)) {
            $this->ICSIDate->addErrorMessage($this->ICSIDate->getErrorMessage(false));
        }
        if ($this->PatientSearch->Required) {
            if (!$this->PatientSearch->IsDetailKey && EmptyValue($this->PatientSearch->FormValue)) {
                $this->PatientSearch->addErrorMessage(str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->createdUserName->Required) {
            if (!$this->createdUserName->IsDetailKey && EmptyValue($this->createdUserName->FormValue)) {
                $this->createdUserName->addErrorMessage(str_replace("%s", $this->createdUserName->caption(), $this->createdUserName->RequiredErrorMessage));
            }
        }
        if ($this->TemplateDrNotes->Required) {
            if (!$this->TemplateDrNotes->IsDetailKey && EmptyValue($this->TemplateDrNotes->FormValue)) {
                $this->TemplateDrNotes->addErrorMessage(str_replace("%s", $this->TemplateDrNotes->caption(), $this->TemplateDrNotes->RequiredErrorMessage));
            }
        }
        if ($this->reportheader->Required) {
            if ($this->reportheader->FormValue == "") {
                $this->reportheader->addErrorMessage(str_replace("%s", $this->reportheader->caption(), $this->reportheader->RequiredErrorMessage));
            }
        }
        if ($this->Purpose->Required) {
            if (!$this->Purpose->IsDetailKey && EmptyValue($this->Purpose->FormValue)) {
                $this->Purpose->addErrorMessage(str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
            }
        }
        if ($this->DrName->Required) {
            if (!$this->DrName->IsDetailKey && EmptyValue($this->DrName->FormValue)) {
                $this->DrName->addErrorMessage(str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("PatientAnRegistrationGrid");
        if (in_array("patient_an_registration", $detailTblVar) && $detailPage->DetailAdd) {
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

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, "", false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, 0, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, "", false);

        // MobileNumber
        $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, "", false);

        // Telephone
        $this->Telephone->setDbValueDef($rsnew, $this->Telephone->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, "", false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // procedurenotes
        $this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, null, false);

        // NextReviewDate
        $this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 7), null, false);

        // ICSIAdvised
        $this->ICSIAdvised->setDbValueDef($rsnew, $this->ICSIAdvised->CurrentValue, null, false);

        // DeliveryRegistered
        $this->DeliveryRegistered->setDbValueDef($rsnew, $this->DeliveryRegistered->CurrentValue, null, false);

        // EDD
        $this->EDD->setDbValueDef($rsnew, UnFormatDateTime($this->EDD->CurrentValue, 7), null, false);

        // SerologyPositive
        $this->SerologyPositive->setDbValueDef($rsnew, $this->SerologyPositive->CurrentValue, null, false);

        // Allergy
        $this->Allergy->setDbValueDef($rsnew, $this->Allergy->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, false);

        // createdby
        $this->createdby->CurrentValue = GetUserID();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // LMP
        $this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 7), null, false);

        // Procedure
        $this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, null, false);

        // ProcedureDateTime
        $this->ProcedureDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11), null, false);

        // ICSIDate
        $this->ICSIDate->setDbValueDef($rsnew, UnFormatDateTime($this->ICSIDate->CurrentValue, 7), null, false);

        // PatientSearch
        $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // createdUserName
        $this->createdUserName->CurrentValue = CurrentUserName();
        $this->createdUserName->setDbValueDef($rsnew, $this->createdUserName->CurrentValue, null);

        // TemplateDrNotes
        $this->TemplateDrNotes->setDbValueDef($rsnew, $this->TemplateDrNotes->CurrentValue, "", false);

        // reportheader
        $this->reportheader->setDbValueDef($rsnew, $this->reportheader->CurrentValue, null, false);

        // Purpose
        $this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, null, false);

        // DrName
        $this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, null, false);

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
            $detailPage = Container("PatientAnRegistrationGrid");
            if (in_array("patient_an_registration", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->pid->setSessionValue($this->PatientId->CurrentValue); // Set master key
                $detailPage->fid->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "patient_an_registration"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->pid->setSessionValue(""); // Clear master key if insert failed
                $detailPage->fid->setSessionValue(""); // Clear master key if insert failed
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
            if (in_array("patient_an_registration", $detailTblVar)) {
                $detailPageObj = Container("PatientAnRegistrationGrid");
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
                    $detailPageObj->pid->IsDetailKey = true;
                    $detailPageObj->pid->CurrentValue = $this->PatientId->CurrentValue;
                    $detailPageObj->pid->setSessionValue($detailPageObj->pid->CurrentValue);
                    $detailPageObj->fid->IsDetailKey = true;
                    $detailPageObj->fid->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->fid->setSessionValue($detailPageObj->fid->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientOpdFollowUpList"), "", $this->TableVar, true);
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
                case "x_ICSIAdvised":
                    break;
                case "x_DeliveryRegistered":
                    break;
                case "x_SerologyPositive":
                    break;
                case "x_Allergy":
                    break;
                case "x_status":
                    break;
                case "x_PatientSearch":
                    break;
                case "x_TemplateDrNotes":
                    $lookupFilter = function () {
                        return "`TemplateType`='Doctor Notes'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_reportheader":
                    break;
                case "x_DrName":
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
