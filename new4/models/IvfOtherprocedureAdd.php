<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOtherprocedureAdd extends IvfOtherprocedure
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_otherprocedure';

    // Page object name
    public $PageObjName = "IvfOtherprocedureAdd";

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

        // Table object (ivf_otherprocedure)
        if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
            $GLOBALS["ivf_otherprocedure"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');
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
                $doc = new $class(Container("ivf_otherprocedure"));
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
                    if ($pageName == "IvfOtherprocedureView") {
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->SEX->setVisibility();
        $this->Address->setVisibility();
        $this->DateofAdmission->setVisibility();
        $this->DateofProcedure->setVisibility();
        $this->DateofDischarge->setVisibility();
        $this->Consultant->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->ProcedureDone->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Chiefcomplaints->setVisibility();
        $this->MaritallHistory->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->PastHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->CNS->setVisibility();
        $this->_RS->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->InvestigationReport->setVisibility();
        $this->FinalDiagnosis->setVisibility();
        $this->Treatment->setVisibility();
        $this->DetailOfOperation->setVisibility();
        $this->FollowUpAdvice->setVisibility();
        $this->FollowUpMedication->setVisibility();
        $this->Plan->setVisibility();
        $this->TempleteFinalDiagnosis->setVisibility();
        $this->TemplateTreatment->setVisibility();
        $this->TemplateOperation->setVisibility();
        $this->TemplateFollowUpAdvice->setVisibility();
        $this->TemplateFollowUpMedication->setVisibility();
        $this->TemplatePlan->setVisibility();
        $this->QRCode->setVisibility();
        $this->TidNo->setVisibility();
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
        $this->setupLookupOptions($this->Name);
        $this->setupLookupOptions($this->Consultant);
        $this->setupLookupOptions($this->Surgeon);
        $this->setupLookupOptions($this->Anesthetist);
        $this->setupLookupOptions($this->TempleteFinalDiagnosis);
        $this->setupLookupOptions($this->TemplateTreatment);
        $this->setupLookupOptions($this->TemplateOperation);
        $this->setupLookupOptions($this->TemplateFollowUpAdvice);
        $this->setupLookupOptions($this->TemplateFollowUpMedication);
        $this->setupLookupOptions($this->TemplatePlan);

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
                    $this->terminate("IvfOtherprocedureList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IvfOtherprocedureList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfOtherprocedureView") {
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
        $this->RIDNO->CurrentValue = null;
        $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->SEX->CurrentValue = null;
        $this->SEX->OldValue = $this->SEX->CurrentValue;
        $this->Address->CurrentValue = null;
        $this->Address->OldValue = $this->Address->CurrentValue;
        $this->DateofAdmission->CurrentValue = null;
        $this->DateofAdmission->OldValue = $this->DateofAdmission->CurrentValue;
        $this->DateofProcedure->CurrentValue = null;
        $this->DateofProcedure->OldValue = $this->DateofProcedure->CurrentValue;
        $this->DateofDischarge->CurrentValue = null;
        $this->DateofDischarge->OldValue = $this->DateofDischarge->CurrentValue;
        $this->Consultant->CurrentValue = null;
        $this->Consultant->OldValue = $this->Consultant->CurrentValue;
        $this->Surgeon->CurrentValue = null;
        $this->Surgeon->OldValue = $this->Surgeon->CurrentValue;
        $this->Anesthetist->CurrentValue = null;
        $this->Anesthetist->OldValue = $this->Anesthetist->CurrentValue;
        $this->IdentificationMark->CurrentValue = null;
        $this->IdentificationMark->OldValue = $this->IdentificationMark->CurrentValue;
        $this->ProcedureDone->CurrentValue = null;
        $this->ProcedureDone->OldValue = $this->ProcedureDone->CurrentValue;
        $this->PROVISIONALDIAGNOSIS->CurrentValue = null;
        $this->PROVISIONALDIAGNOSIS->OldValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
        $this->Chiefcomplaints->CurrentValue = null;
        $this->Chiefcomplaints->OldValue = $this->Chiefcomplaints->CurrentValue;
        $this->MaritallHistory->CurrentValue = null;
        $this->MaritallHistory->OldValue = $this->MaritallHistory->CurrentValue;
        $this->MenstrualHistory->CurrentValue = null;
        $this->MenstrualHistory->OldValue = $this->MenstrualHistory->CurrentValue;
        $this->SurgicalHistory->CurrentValue = null;
        $this->SurgicalHistory->OldValue = $this->SurgicalHistory->CurrentValue;
        $this->PastHistory->CurrentValue = null;
        $this->PastHistory->OldValue = $this->PastHistory->CurrentValue;
        $this->FamilyHistory->CurrentValue = null;
        $this->FamilyHistory->OldValue = $this->FamilyHistory->CurrentValue;
        $this->Temp->CurrentValue = null;
        $this->Temp->OldValue = $this->Temp->CurrentValue;
        $this->Pulse->CurrentValue = null;
        $this->Pulse->OldValue = $this->Pulse->CurrentValue;
        $this->BP->CurrentValue = null;
        $this->BP->OldValue = $this->BP->CurrentValue;
        $this->CNS->CurrentValue = null;
        $this->CNS->OldValue = $this->CNS->CurrentValue;
        $this->_RS->CurrentValue = null;
        $this->_RS->OldValue = $this->_RS->CurrentValue;
        $this->CVS->CurrentValue = null;
        $this->CVS->OldValue = $this->CVS->CurrentValue;
        $this->PA->CurrentValue = null;
        $this->PA->OldValue = $this->PA->CurrentValue;
        $this->InvestigationReport->CurrentValue = null;
        $this->InvestigationReport->OldValue = $this->InvestigationReport->CurrentValue;
        $this->FinalDiagnosis->CurrentValue = null;
        $this->FinalDiagnosis->OldValue = $this->FinalDiagnosis->CurrentValue;
        $this->Treatment->CurrentValue = null;
        $this->Treatment->OldValue = $this->Treatment->CurrentValue;
        $this->DetailOfOperation->CurrentValue = null;
        $this->DetailOfOperation->OldValue = $this->DetailOfOperation->CurrentValue;
        $this->FollowUpAdvice->CurrentValue = null;
        $this->FollowUpAdvice->OldValue = $this->FollowUpAdvice->CurrentValue;
        $this->FollowUpMedication->CurrentValue = null;
        $this->FollowUpMedication->OldValue = $this->FollowUpMedication->CurrentValue;
        $this->Plan->CurrentValue = null;
        $this->Plan->OldValue = $this->Plan->CurrentValue;
        $this->TempleteFinalDiagnosis->CurrentValue = null;
        $this->TempleteFinalDiagnosis->OldValue = $this->TempleteFinalDiagnosis->CurrentValue;
        $this->TemplateTreatment->CurrentValue = null;
        $this->TemplateTreatment->OldValue = $this->TemplateTreatment->CurrentValue;
        $this->TemplateOperation->CurrentValue = null;
        $this->TemplateOperation->OldValue = $this->TemplateOperation->CurrentValue;
        $this->TemplateFollowUpAdvice->CurrentValue = null;
        $this->TemplateFollowUpAdvice->OldValue = $this->TemplateFollowUpAdvice->CurrentValue;
        $this->TemplateFollowUpMedication->CurrentValue = null;
        $this->TemplateFollowUpMedication->OldValue = $this->TemplateFollowUpMedication->CurrentValue;
        $this->TemplatePlan->CurrentValue = null;
        $this->TemplatePlan->OldValue = $this->TemplatePlan->CurrentValue;
        $this->QRCode->CurrentValue = null;
        $this->QRCode->OldValue = $this->QRCode->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'RIDNO' first before field var 'x_RIDNO'
        $val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
        if (!$this->RIDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNO->Visible = false; // Disable update for API request
            } else {
                $this->RIDNO->setFormValue($val);
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

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
            }
        }

        // Check field name 'SEX' first before field var 'x_SEX'
        $val = $CurrentForm->hasValue("SEX") ? $CurrentForm->getValue("SEX") : $CurrentForm->getValue("x_SEX");
        if (!$this->SEX->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SEX->Visible = false; // Disable update for API request
            } else {
                $this->SEX->setFormValue($val);
            }
        }

        // Check field name 'Address' first before field var 'x_Address'
        $val = $CurrentForm->hasValue("Address") ? $CurrentForm->getValue("Address") : $CurrentForm->getValue("x_Address");
        if (!$this->Address->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address->Visible = false; // Disable update for API request
            } else {
                $this->Address->setFormValue($val);
            }
        }

        // Check field name 'DateofAdmission' first before field var 'x_DateofAdmission'
        $val = $CurrentForm->hasValue("DateofAdmission") ? $CurrentForm->getValue("DateofAdmission") : $CurrentForm->getValue("x_DateofAdmission");
        if (!$this->DateofAdmission->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofAdmission->Visible = false; // Disable update for API request
            } else {
                $this->DateofAdmission->setFormValue($val);
            }
            $this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 11);
        }

        // Check field name 'DateofProcedure' first before field var 'x_DateofProcedure'
        $val = $CurrentForm->hasValue("DateofProcedure") ? $CurrentForm->getValue("DateofProcedure") : $CurrentForm->getValue("x_DateofProcedure");
        if (!$this->DateofProcedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofProcedure->Visible = false; // Disable update for API request
            } else {
                $this->DateofProcedure->setFormValue($val);
            }
            $this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 11);
        }

        // Check field name 'DateofDischarge' first before field var 'x_DateofDischarge'
        $val = $CurrentForm->hasValue("DateofDischarge") ? $CurrentForm->getValue("DateofDischarge") : $CurrentForm->getValue("x_DateofDischarge");
        if (!$this->DateofDischarge->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofDischarge->Visible = false; // Disable update for API request
            } else {
                $this->DateofDischarge->setFormValue($val);
            }
            $this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 11);
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

        // Check field name 'Surgeon' first before field var 'x_Surgeon'
        $val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
        if (!$this->Surgeon->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Surgeon->Visible = false; // Disable update for API request
            } else {
                $this->Surgeon->setFormValue($val);
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

        // Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
        $val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
        if (!$this->IdentificationMark->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IdentificationMark->Visible = false; // Disable update for API request
            } else {
                $this->IdentificationMark->setFormValue($val);
            }
        }

        // Check field name 'ProcedureDone' first before field var 'x_ProcedureDone'
        $val = $CurrentForm->hasValue("ProcedureDone") ? $CurrentForm->getValue("ProcedureDone") : $CurrentForm->getValue("x_ProcedureDone");
        if (!$this->ProcedureDone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureDone->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureDone->setFormValue($val);
            }
        }

        // Check field name 'PROVISIONALDIAGNOSIS' first before field var 'x_PROVISIONALDIAGNOSIS'
        $val = $CurrentForm->hasValue("PROVISIONALDIAGNOSIS") ? $CurrentForm->getValue("PROVISIONALDIAGNOSIS") : $CurrentForm->getValue("x_PROVISIONALDIAGNOSIS");
        if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PROVISIONALDIAGNOSIS->Visible = false; // Disable update for API request
            } else {
                $this->PROVISIONALDIAGNOSIS->setFormValue($val);
            }
        }

        // Check field name 'Chiefcomplaints' first before field var 'x_Chiefcomplaints'
        $val = $CurrentForm->hasValue("Chiefcomplaints") ? $CurrentForm->getValue("Chiefcomplaints") : $CurrentForm->getValue("x_Chiefcomplaints");
        if (!$this->Chiefcomplaints->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Chiefcomplaints->Visible = false; // Disable update for API request
            } else {
                $this->Chiefcomplaints->setFormValue($val);
            }
        }

        // Check field name 'MaritallHistory' first before field var 'x_MaritallHistory'
        $val = $CurrentForm->hasValue("MaritallHistory") ? $CurrentForm->getValue("MaritallHistory") : $CurrentForm->getValue("x_MaritallHistory");
        if (!$this->MaritallHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaritallHistory->Visible = false; // Disable update for API request
            } else {
                $this->MaritallHistory->setFormValue($val);
            }
        }

        // Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
        $val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
        if (!$this->MenstrualHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MenstrualHistory->Visible = false; // Disable update for API request
            } else {
                $this->MenstrualHistory->setFormValue($val);
            }
        }

        // Check field name 'SurgicalHistory' first before field var 'x_SurgicalHistory'
        $val = $CurrentForm->hasValue("SurgicalHistory") ? $CurrentForm->getValue("SurgicalHistory") : $CurrentForm->getValue("x_SurgicalHistory");
        if (!$this->SurgicalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurgicalHistory->Visible = false; // Disable update for API request
            } else {
                $this->SurgicalHistory->setFormValue($val);
            }
        }

        // Check field name 'PastHistory' first before field var 'x_PastHistory'
        $val = $CurrentForm->hasValue("PastHistory") ? $CurrentForm->getValue("PastHistory") : $CurrentForm->getValue("x_PastHistory");
        if (!$this->PastHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastHistory->Visible = false; // Disable update for API request
            } else {
                $this->PastHistory->setFormValue($val);
            }
        }

        // Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
        $val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
        if (!$this->FamilyHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FamilyHistory->Visible = false; // Disable update for API request
            } else {
                $this->FamilyHistory->setFormValue($val);
            }
        }

        // Check field name 'Temp' first before field var 'x_Temp'
        $val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
        if (!$this->Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Temp->Visible = false; // Disable update for API request
            } else {
                $this->Temp->setFormValue($val);
            }
        }

        // Check field name 'Pulse' first before field var 'x_Pulse'
        $val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
        if (!$this->Pulse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pulse->Visible = false; // Disable update for API request
            } else {
                $this->Pulse->setFormValue($val);
            }
        }

        // Check field name 'BP' first before field var 'x_BP'
        $val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
        if (!$this->BP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BP->Visible = false; // Disable update for API request
            } else {
                $this->BP->setFormValue($val);
            }
        }

        // Check field name 'CNS' first before field var 'x_CNS'
        $val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
        if (!$this->CNS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CNS->Visible = false; // Disable update for API request
            } else {
                $this->CNS->setFormValue($val);
            }
        }

        // Check field name 'RS' first before field var 'x__RS'
        $val = $CurrentForm->hasValue("RS") ? $CurrentForm->getValue("RS") : $CurrentForm->getValue("x__RS");
        if (!$this->_RS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_RS->Visible = false; // Disable update for API request
            } else {
                $this->_RS->setFormValue($val);
            }
        }

        // Check field name 'CVS' first before field var 'x_CVS'
        $val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
        if (!$this->CVS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CVS->Visible = false; // Disable update for API request
            } else {
                $this->CVS->setFormValue($val);
            }
        }

        // Check field name 'PA' first before field var 'x_PA'
        $val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
        if (!$this->PA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PA->Visible = false; // Disable update for API request
            } else {
                $this->PA->setFormValue($val);
            }
        }

        // Check field name 'InvestigationReport' first before field var 'x_InvestigationReport'
        $val = $CurrentForm->hasValue("InvestigationReport") ? $CurrentForm->getValue("InvestigationReport") : $CurrentForm->getValue("x_InvestigationReport");
        if (!$this->InvestigationReport->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InvestigationReport->Visible = false; // Disable update for API request
            } else {
                $this->InvestigationReport->setFormValue($val);
            }
        }

        // Check field name 'FinalDiagnosis' first before field var 'x_FinalDiagnosis'
        $val = $CurrentForm->hasValue("FinalDiagnosis") ? $CurrentForm->getValue("FinalDiagnosis") : $CurrentForm->getValue("x_FinalDiagnosis");
        if (!$this->FinalDiagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FinalDiagnosis->Visible = false; // Disable update for API request
            } else {
                $this->FinalDiagnosis->setFormValue($val);
            }
        }

        // Check field name 'Treatment' first before field var 'x_Treatment'
        $val = $CurrentForm->hasValue("Treatment") ? $CurrentForm->getValue("Treatment") : $CurrentForm->getValue("x_Treatment");
        if (!$this->Treatment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Treatment->Visible = false; // Disable update for API request
            } else {
                $this->Treatment->setFormValue($val);
            }
        }

        // Check field name 'DetailOfOperation' first before field var 'x_DetailOfOperation'
        $val = $CurrentForm->hasValue("DetailOfOperation") ? $CurrentForm->getValue("DetailOfOperation") : $CurrentForm->getValue("x_DetailOfOperation");
        if (!$this->DetailOfOperation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DetailOfOperation->Visible = false; // Disable update for API request
            } else {
                $this->DetailOfOperation->setFormValue($val);
            }
        }

        // Check field name 'FollowUpAdvice' first before field var 'x_FollowUpAdvice'
        $val = $CurrentForm->hasValue("FollowUpAdvice") ? $CurrentForm->getValue("FollowUpAdvice") : $CurrentForm->getValue("x_FollowUpAdvice");
        if (!$this->FollowUpAdvice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FollowUpAdvice->Visible = false; // Disable update for API request
            } else {
                $this->FollowUpAdvice->setFormValue($val);
            }
        }

        // Check field name 'FollowUpMedication' first before field var 'x_FollowUpMedication'
        $val = $CurrentForm->hasValue("FollowUpMedication") ? $CurrentForm->getValue("FollowUpMedication") : $CurrentForm->getValue("x_FollowUpMedication");
        if (!$this->FollowUpMedication->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FollowUpMedication->Visible = false; // Disable update for API request
            } else {
                $this->FollowUpMedication->setFormValue($val);
            }
        }

        // Check field name 'Plan' first before field var 'x_Plan'
        $val = $CurrentForm->hasValue("Plan") ? $CurrentForm->getValue("Plan") : $CurrentForm->getValue("x_Plan");
        if (!$this->Plan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Plan->Visible = false; // Disable update for API request
            } else {
                $this->Plan->setFormValue($val);
            }
        }

        // Check field name 'TempleteFinalDiagnosis' first before field var 'x_TempleteFinalDiagnosis'
        $val = $CurrentForm->hasValue("TempleteFinalDiagnosis") ? $CurrentForm->getValue("TempleteFinalDiagnosis") : $CurrentForm->getValue("x_TempleteFinalDiagnosis");
        if (!$this->TempleteFinalDiagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TempleteFinalDiagnosis->Visible = false; // Disable update for API request
            } else {
                $this->TempleteFinalDiagnosis->setFormValue($val);
            }
        }

        // Check field name 'TemplateTreatment' first before field var 'x_TemplateTreatment'
        $val = $CurrentForm->hasValue("TemplateTreatment") ? $CurrentForm->getValue("TemplateTreatment") : $CurrentForm->getValue("x_TemplateTreatment");
        if (!$this->TemplateTreatment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateTreatment->Visible = false; // Disable update for API request
            } else {
                $this->TemplateTreatment->setFormValue($val);
            }
        }

        // Check field name 'TemplateOperation' first before field var 'x_TemplateOperation'
        $val = $CurrentForm->hasValue("TemplateOperation") ? $CurrentForm->getValue("TemplateOperation") : $CurrentForm->getValue("x_TemplateOperation");
        if (!$this->TemplateOperation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateOperation->Visible = false; // Disable update for API request
            } else {
                $this->TemplateOperation->setFormValue($val);
            }
        }

        // Check field name 'TemplateFollowUpAdvice' first before field var 'x_TemplateFollowUpAdvice'
        $val = $CurrentForm->hasValue("TemplateFollowUpAdvice") ? $CurrentForm->getValue("TemplateFollowUpAdvice") : $CurrentForm->getValue("x_TemplateFollowUpAdvice");
        if (!$this->TemplateFollowUpAdvice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateFollowUpAdvice->Visible = false; // Disable update for API request
            } else {
                $this->TemplateFollowUpAdvice->setFormValue($val);
            }
        }

        // Check field name 'TemplateFollowUpMedication' first before field var 'x_TemplateFollowUpMedication'
        $val = $CurrentForm->hasValue("TemplateFollowUpMedication") ? $CurrentForm->getValue("TemplateFollowUpMedication") : $CurrentForm->getValue("x_TemplateFollowUpMedication");
        if (!$this->TemplateFollowUpMedication->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateFollowUpMedication->Visible = false; // Disable update for API request
            } else {
                $this->TemplateFollowUpMedication->setFormValue($val);
            }
        }

        // Check field name 'TemplatePlan' first before field var 'x_TemplatePlan'
        $val = $CurrentForm->hasValue("TemplatePlan") ? $CurrentForm->getValue("TemplatePlan") : $CurrentForm->getValue("x_TemplatePlan");
        if (!$this->TemplatePlan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplatePlan->Visible = false; // Disable update for API request
            } else {
                $this->TemplatePlan->setFormValue($val);
            }
        }

        // Check field name 'QRCode' first before field var 'x_QRCode'
        $val = $CurrentForm->hasValue("QRCode") ? $CurrentForm->getValue("QRCode") : $CurrentForm->getValue("x_QRCode");
        if (!$this->QRCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->QRCode->Visible = false; // Disable update for API request
            } else {
                $this->QRCode->setFormValue($val);
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->SEX->CurrentValue = $this->SEX->FormValue;
        $this->Address->CurrentValue = $this->Address->FormValue;
        $this->DateofAdmission->CurrentValue = $this->DateofAdmission->FormValue;
        $this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 11);
        $this->DateofProcedure->CurrentValue = $this->DateofProcedure->FormValue;
        $this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 11);
        $this->DateofDischarge->CurrentValue = $this->DateofDischarge->FormValue;
        $this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 11);
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
        $this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
        $this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
        $this->ProcedureDone->CurrentValue = $this->ProcedureDone->FormValue;
        $this->PROVISIONALDIAGNOSIS->CurrentValue = $this->PROVISIONALDIAGNOSIS->FormValue;
        $this->Chiefcomplaints->CurrentValue = $this->Chiefcomplaints->FormValue;
        $this->MaritallHistory->CurrentValue = $this->MaritallHistory->FormValue;
        $this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
        $this->SurgicalHistory->CurrentValue = $this->SurgicalHistory->FormValue;
        $this->PastHistory->CurrentValue = $this->PastHistory->FormValue;
        $this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
        $this->Temp->CurrentValue = $this->Temp->FormValue;
        $this->Pulse->CurrentValue = $this->Pulse->FormValue;
        $this->BP->CurrentValue = $this->BP->FormValue;
        $this->CNS->CurrentValue = $this->CNS->FormValue;
        $this->_RS->CurrentValue = $this->_RS->FormValue;
        $this->CVS->CurrentValue = $this->CVS->FormValue;
        $this->PA->CurrentValue = $this->PA->FormValue;
        $this->InvestigationReport->CurrentValue = $this->InvestigationReport->FormValue;
        $this->FinalDiagnosis->CurrentValue = $this->FinalDiagnosis->FormValue;
        $this->Treatment->CurrentValue = $this->Treatment->FormValue;
        $this->DetailOfOperation->CurrentValue = $this->DetailOfOperation->FormValue;
        $this->FollowUpAdvice->CurrentValue = $this->FollowUpAdvice->FormValue;
        $this->FollowUpMedication->CurrentValue = $this->FollowUpMedication->FormValue;
        $this->Plan->CurrentValue = $this->Plan->FormValue;
        $this->TempleteFinalDiagnosis->CurrentValue = $this->TempleteFinalDiagnosis->FormValue;
        $this->TemplateTreatment->CurrentValue = $this->TemplateTreatment->FormValue;
        $this->TemplateOperation->CurrentValue = $this->TemplateOperation->FormValue;
        $this->TemplateFollowUpAdvice->CurrentValue = $this->TemplateFollowUpAdvice->FormValue;
        $this->TemplateFollowUpMedication->CurrentValue = $this->TemplateFollowUpMedication->FormValue;
        $this->TemplatePlan->CurrentValue = $this->TemplatePlan->FormValue;
        $this->QRCode->CurrentValue = $this->QRCode->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Address->setDbValue($row['Address']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateofProcedure->setDbValue($row['DateofProcedure']);
        $this->DateofDischarge->setDbValue($row['DateofDischarge']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->ProcedureDone->setDbValue($row['ProcedureDone']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MaritallHistory->setDbValue($row['MaritallHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->CNS->setDbValue($row['CNS']);
        $this->_RS->setDbValue($row['RS']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->InvestigationReport->setDbValue($row['InvestigationReport']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
        $this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
        $this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
        $this->Plan->setDbValue($row['Plan']);
        $this->TempleteFinalDiagnosis->setDbValue($row['TempleteFinalDiagnosis']);
        $this->TemplateTreatment->setDbValue($row['TemplateTreatment']);
        $this->TemplateOperation->setDbValue($row['TemplateOperation']);
        $this->TemplateFollowUpAdvice->setDbValue($row['TemplateFollowUpAdvice']);
        $this->TemplateFollowUpMedication->setDbValue($row['TemplateFollowUpMedication']);
        $this->TemplatePlan->setDbValue($row['TemplatePlan']);
        $this->QRCode->setDbValue($row['QRCode']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNO'] = $this->RIDNO->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['SEX'] = $this->SEX->CurrentValue;
        $row['Address'] = $this->Address->CurrentValue;
        $row['DateofAdmission'] = $this->DateofAdmission->CurrentValue;
        $row['DateofProcedure'] = $this->DateofProcedure->CurrentValue;
        $row['DateofDischarge'] = $this->DateofDischarge->CurrentValue;
        $row['Consultant'] = $this->Consultant->CurrentValue;
        $row['Surgeon'] = $this->Surgeon->CurrentValue;
        $row['Anesthetist'] = $this->Anesthetist->CurrentValue;
        $row['IdentificationMark'] = $this->IdentificationMark->CurrentValue;
        $row['ProcedureDone'] = $this->ProcedureDone->CurrentValue;
        $row['PROVISIONALDIAGNOSIS'] = $this->PROVISIONALDIAGNOSIS->CurrentValue;
        $row['Chiefcomplaints'] = $this->Chiefcomplaints->CurrentValue;
        $row['MaritallHistory'] = $this->MaritallHistory->CurrentValue;
        $row['MenstrualHistory'] = $this->MenstrualHistory->CurrentValue;
        $row['SurgicalHistory'] = $this->SurgicalHistory->CurrentValue;
        $row['PastHistory'] = $this->PastHistory->CurrentValue;
        $row['FamilyHistory'] = $this->FamilyHistory->CurrentValue;
        $row['Temp'] = $this->Temp->CurrentValue;
        $row['Pulse'] = $this->Pulse->CurrentValue;
        $row['BP'] = $this->BP->CurrentValue;
        $row['CNS'] = $this->CNS->CurrentValue;
        $row['RS'] = $this->_RS->CurrentValue;
        $row['CVS'] = $this->CVS->CurrentValue;
        $row['PA'] = $this->PA->CurrentValue;
        $row['InvestigationReport'] = $this->InvestigationReport->CurrentValue;
        $row['FinalDiagnosis'] = $this->FinalDiagnosis->CurrentValue;
        $row['Treatment'] = $this->Treatment->CurrentValue;
        $row['DetailOfOperation'] = $this->DetailOfOperation->CurrentValue;
        $row['FollowUpAdvice'] = $this->FollowUpAdvice->CurrentValue;
        $row['FollowUpMedication'] = $this->FollowUpMedication->CurrentValue;
        $row['Plan'] = $this->Plan->CurrentValue;
        $row['TempleteFinalDiagnosis'] = $this->TempleteFinalDiagnosis->CurrentValue;
        $row['TemplateTreatment'] = $this->TemplateTreatment->CurrentValue;
        $row['TemplateOperation'] = $this->TemplateOperation->CurrentValue;
        $row['TemplateFollowUpAdvice'] = $this->TemplateFollowUpAdvice->CurrentValue;
        $row['TemplateFollowUpMedication'] = $this->TemplateFollowUpMedication->CurrentValue;
        $row['TemplatePlan'] = $this->TemplatePlan->CurrentValue;
        $row['QRCode'] = $this->QRCode->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
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

        // RIDNO

        // Name

        // Age

        // SEX

        // Address

        // DateofAdmission

        // DateofProcedure

        // DateofDischarge

        // Consultant

        // Surgeon

        // Anesthetist

        // IdentificationMark

        // ProcedureDone

        // PROVISIONALDIAGNOSIS

        // Chiefcomplaints

        // MaritallHistory

        // MenstrualHistory

        // SurgicalHistory

        // PastHistory

        // FamilyHistory

        // Temp

        // Pulse

        // BP

        // CNS

        // RS

        // CVS

        // PA

        // InvestigationReport

        // FinalDiagnosis

        // Treatment

        // DetailOfOperation

        // FollowUpAdvice

        // FollowUpMedication

        // Plan

        // TempleteFinalDiagnosis

        // TemplateTreatment

        // TemplateOperation

        // TemplateFollowUpAdvice

        // TemplateFollowUpMedication

        // TemplatePlan

        // QRCode

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $curVal = trim(strval($this->Name->CurrentValue));
            if ($curVal != "") {
                $this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
                if ($this->Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Name->Lookup->renderViewRow($rswrk[0]);
                        $this->Name->ViewValue = $this->Name->displayValue($arwrk);
                    } else {
                        $this->Name->ViewValue = $this->Name->CurrentValue;
                    }
                }
            } else {
                $this->Name->ViewValue = null;
            }
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // SEX
            $this->SEX->ViewValue = $this->SEX->CurrentValue;
            $this->SEX->ViewCustomAttributes = "";

            // Address
            $this->Address->ViewValue = $this->Address->CurrentValue;
            $this->Address->ViewCustomAttributes = "";

            // DateofAdmission
            $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
            $this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 11);
            $this->DateofAdmission->ViewCustomAttributes = "";

            // DateofProcedure
            $this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
            $this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 11);
            $this->DateofProcedure->ViewCustomAttributes = "";

            // DateofDischarge
            $this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
            $this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 11);
            $this->DateofDischarge->ViewCustomAttributes = "";

            // Consultant
            $curVal = trim(strval($this->Consultant->CurrentValue));
            if ($curVal != "") {
                $this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
                if ($this->Consultant->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Consultant->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Consultant->Lookup->renderViewRow($rswrk[0]);
                        $this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
                    } else {
                        $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
                    }
                }
            } else {
                $this->Consultant->ViewValue = null;
            }
            $this->Consultant->ViewCustomAttributes = "";

            // Surgeon
            $curVal = trim(strval($this->Surgeon->CurrentValue));
            if ($curVal != "") {
                $this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
                if ($this->Surgeon->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Surgeon->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Surgeon->Lookup->renderViewRow($rswrk[0]);
                        $this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
                    } else {
                        $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
                    }
                }
            } else {
                $this->Surgeon->ViewValue = null;
            }
            $this->Surgeon->ViewCustomAttributes = "";

            // Anesthetist
            $curVal = trim(strval($this->Anesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
                if ($this->Anesthetist->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Anesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Anesthetist->Lookup->renderViewRow($rswrk[0]);
                        $this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
                    } else {
                        $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
                    }
                }
            } else {
                $this->Anesthetist->ViewValue = null;
            }
            $this->Anesthetist->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // ProcedureDone
            $this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
            $this->ProcedureDone->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
            $this->Chiefcomplaints->ViewCustomAttributes = "";

            // MaritallHistory
            $this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
            $this->MaritallHistory->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // PastHistory
            $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
            $this->PastHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RS
            $this->_RS->ViewValue = $this->_RS->CurrentValue;
            $this->_RS->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // InvestigationReport
            $this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
            $this->InvestigationReport->ViewCustomAttributes = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
            $this->FinalDiagnosis->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // DetailOfOperation
            $this->DetailOfOperation->ViewValue = $this->DetailOfOperation->CurrentValue;
            $this->DetailOfOperation->ViewCustomAttributes = "";

            // FollowUpAdvice
            $this->FollowUpAdvice->ViewValue = $this->FollowUpAdvice->CurrentValue;
            $this->FollowUpAdvice->ViewCustomAttributes = "";

            // FollowUpMedication
            $this->FollowUpMedication->ViewValue = $this->FollowUpMedication->CurrentValue;
            $this->FollowUpMedication->ViewCustomAttributes = "";

            // Plan
            $this->Plan->ViewValue = $this->Plan->CurrentValue;
            $this->Plan->ViewCustomAttributes = "";

            // TempleteFinalDiagnosis
            $curVal = trim(strval($this->TempleteFinalDiagnosis->CurrentValue));
            if ($curVal != "") {
                $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->lookupCacheOption($curVal);
                if ($this->TempleteFinalDiagnosis->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='TemplateDiagnosis'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TempleteFinalDiagnosis->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TempleteFinalDiagnosis->Lookup->renderViewRow($rswrk[0]);
                        $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->displayValue($arwrk);
                    } else {
                        $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->CurrentValue;
                    }
                }
            } else {
                $this->TempleteFinalDiagnosis->ViewValue = null;
            }
            $this->TempleteFinalDiagnosis->ViewCustomAttributes = "";

            // TemplateTreatment
            $curVal = trim(strval($this->TemplateTreatment->CurrentValue));
            if ($curVal != "") {
                $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->lookupCacheOption($curVal);
                if ($this->TemplateTreatment->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Treatment'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateTreatment->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateTreatment->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->displayValue($arwrk);
                    } else {
                        $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->CurrentValue;
                    }
                }
            } else {
                $this->TemplateTreatment->ViewValue = null;
            }
            $this->TemplateTreatment->ViewCustomAttributes = "";

            // TemplateOperation
            $curVal = trim(strval($this->TemplateOperation->CurrentValue));
            if ($curVal != "") {
                $this->TemplateOperation->ViewValue = $this->TemplateOperation->lookupCacheOption($curVal);
                if ($this->TemplateOperation->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Operation'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateOperation->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateOperation->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateOperation->ViewValue = $this->TemplateOperation->displayValue($arwrk);
                    } else {
                        $this->TemplateOperation->ViewValue = $this->TemplateOperation->CurrentValue;
                    }
                }
            } else {
                $this->TemplateOperation->ViewValue = null;
            }
            $this->TemplateOperation->ViewCustomAttributes = "";

            // TemplateFollowUpAdvice
            $curVal = trim(strval($this->TemplateFollowUpAdvice->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->lookupCacheOption($curVal);
                if ($this->TemplateFollowUpAdvice->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='FollowUpAdvice '";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateFollowUpAdvice->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateFollowUpAdvice->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->displayValue($arwrk);
                    } else {
                        $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->CurrentValue;
                    }
                }
            } else {
                $this->TemplateFollowUpAdvice->ViewValue = null;
            }
            $this->TemplateFollowUpAdvice->ViewCustomAttributes = "";

            // TemplateFollowUpMedication
            $curVal = trim(strval($this->TemplateFollowUpMedication->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->lookupCacheOption($curVal);
                if ($this->TemplateFollowUpMedication->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='FollowUpMedication'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateFollowUpMedication->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateFollowUpMedication->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->displayValue($arwrk);
                    } else {
                        $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->CurrentValue;
                    }
                }
            } else {
                $this->TemplateFollowUpMedication->ViewValue = null;
            }
            $this->TemplateFollowUpMedication->ViewCustomAttributes = "";

            // TemplatePlan
            $curVal = trim(strval($this->TemplatePlan->CurrentValue));
            if ($curVal != "") {
                $this->TemplatePlan->ViewValue = $this->TemplatePlan->lookupCacheOption($curVal);
                if ($this->TemplatePlan->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='TemplatePlan'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplatePlan->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplatePlan->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplatePlan->ViewValue = $this->TemplatePlan->displayValue($arwrk);
                    } else {
                        $this->TemplatePlan->ViewValue = $this->TemplatePlan->CurrentValue;
                    }
                }
            } else {
                $this->TemplatePlan->ViewValue = null;
            }
            $this->TemplatePlan->ViewCustomAttributes = "";

            // QRCode
            $this->QRCode->ViewValue = $this->QRCode->CurrentValue;
            $this->QRCode->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";
            $this->SEX->TooltipValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";
            $this->Address->TooltipValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";
            $this->DateofAdmission->TooltipValue = "";

            // DateofProcedure
            $this->DateofProcedure->LinkCustomAttributes = "";
            $this->DateofProcedure->HrefValue = "";
            $this->DateofProcedure->TooltipValue = "";

            // DateofDischarge
            $this->DateofDischarge->LinkCustomAttributes = "";
            $this->DateofDischarge->HrefValue = "";
            $this->DateofDischarge->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // ProcedureDone
            $this->ProcedureDone->LinkCustomAttributes = "";
            $this->ProcedureDone->HrefValue = "";
            $this->ProcedureDone->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";
            $this->Chiefcomplaints->TooltipValue = "";

            // MaritallHistory
            $this->MaritallHistory->LinkCustomAttributes = "";
            $this->MaritallHistory->HrefValue = "";
            $this->MaritallHistory->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";
            $this->PastHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";

            // RS
            $this->_RS->LinkCustomAttributes = "";
            $this->_RS->HrefValue = "";
            $this->_RS->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // InvestigationReport
            $this->InvestigationReport->LinkCustomAttributes = "";
            $this->InvestigationReport->HrefValue = "";
            $this->InvestigationReport->TooltipValue = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->LinkCustomAttributes = "";
            $this->FinalDiagnosis->HrefValue = "";
            $this->FinalDiagnosis->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // DetailOfOperation
            $this->DetailOfOperation->LinkCustomAttributes = "";
            $this->DetailOfOperation->HrefValue = "";
            $this->DetailOfOperation->TooltipValue = "";

            // FollowUpAdvice
            $this->FollowUpAdvice->LinkCustomAttributes = "";
            $this->FollowUpAdvice->HrefValue = "";
            $this->FollowUpAdvice->TooltipValue = "";

            // FollowUpMedication
            $this->FollowUpMedication->LinkCustomAttributes = "";
            $this->FollowUpMedication->HrefValue = "";
            $this->FollowUpMedication->TooltipValue = "";

            // Plan
            $this->Plan->LinkCustomAttributes = "";
            $this->Plan->HrefValue = "";
            $this->Plan->TooltipValue = "";

            // TempleteFinalDiagnosis
            $this->TempleteFinalDiagnosis->LinkCustomAttributes = "";
            $this->TempleteFinalDiagnosis->HrefValue = "";
            $this->TempleteFinalDiagnosis->TooltipValue = "";

            // TemplateTreatment
            $this->TemplateTreatment->LinkCustomAttributes = "";
            $this->TemplateTreatment->HrefValue = "";
            $this->TemplateTreatment->TooltipValue = "";

            // TemplateOperation
            $this->TemplateOperation->LinkCustomAttributes = "";
            $this->TemplateOperation->HrefValue = "";
            $this->TemplateOperation->TooltipValue = "";

            // TemplateFollowUpAdvice
            $this->TemplateFollowUpAdvice->LinkCustomAttributes = "";
            $this->TemplateFollowUpAdvice->HrefValue = "";
            $this->TemplateFollowUpAdvice->TooltipValue = "";

            // TemplateFollowUpMedication
            $this->TemplateFollowUpMedication->LinkCustomAttributes = "";
            $this->TemplateFollowUpMedication->HrefValue = "";
            $this->TemplateFollowUpMedication->TooltipValue = "";

            // TemplatePlan
            $this->TemplatePlan->LinkCustomAttributes = "";
            $this->TemplatePlan->HrefValue = "";
            $this->TemplatePlan->TooltipValue = "";

            // QRCode
            $this->QRCode->LinkCustomAttributes = "";
            $this->QRCode->HrefValue = "";
            $this->QRCode->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'QRCODE', 80);
            $this->QRCode->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $curVal = trim(strval($this->Name->CurrentValue));
            if ($curVal != "") {
                $this->Name->EditValue = $this->Name->lookupCacheOption($curVal);
                if ($this->Name->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Name->Lookup->renderViewRow($rswrk[0]);
                        $this->Name->EditValue = $this->Name->displayValue($arwrk);
                    } else {
                        $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
                    }
                }
            } else {
                $this->Name->EditValue = null;
            }
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // SEX
            $this->SEX->EditAttrs["class"] = "form-control";
            $this->SEX->EditCustomAttributes = "";
            if (!$this->SEX->Raw) {
                $this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
            }
            $this->SEX->EditValue = HtmlEncode($this->SEX->CurrentValue);
            $this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

            // Address
            $this->Address->EditAttrs["class"] = "form-control";
            $this->Address->EditCustomAttributes = "";
            if (!$this->Address->Raw) {
                $this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
            }
            $this->Address->EditValue = HtmlEncode($this->Address->CurrentValue);
            $this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

            // DateofAdmission
            $this->DateofAdmission->EditAttrs["class"] = "form-control";
            $this->DateofAdmission->EditCustomAttributes = "";
            $this->DateofAdmission->EditValue = HtmlEncode(FormatDateTime($this->DateofAdmission->CurrentValue, 11));
            $this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

            // DateofProcedure
            $this->DateofProcedure->EditAttrs["class"] = "form-control";
            $this->DateofProcedure->EditCustomAttributes = "";
            $this->DateofProcedure->EditValue = HtmlEncode(FormatDateTime($this->DateofProcedure->CurrentValue, 11));
            $this->DateofProcedure->PlaceHolder = RemoveHtml($this->DateofProcedure->caption());

            // DateofDischarge
            $this->DateofDischarge->EditAttrs["class"] = "form-control";
            $this->DateofDischarge->EditCustomAttributes = "";
            $this->DateofDischarge->EditValue = HtmlEncode(FormatDateTime($this->DateofDischarge->CurrentValue, 11));
            $this->DateofDischarge->PlaceHolder = RemoveHtml($this->DateofDischarge->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            $curVal = trim(strval($this->Consultant->CurrentValue));
            if ($curVal != "") {
                $this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
            } else {
                $this->Consultant->ViewValue = $this->Consultant->Lookup !== null && is_array($this->Consultant->Lookup->Options) ? $curVal : null;
            }
            if ($this->Consultant->ViewValue !== null) { // Load from cache
                $this->Consultant->EditValue = array_values($this->Consultant->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->Consultant->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Consultant->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Consultant->EditValue = $arwrk;
            }
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // Surgeon
            $this->Surgeon->EditAttrs["class"] = "form-control";
            $this->Surgeon->EditCustomAttributes = "";
            $curVal = trim(strval($this->Surgeon->CurrentValue));
            if ($curVal != "") {
                $this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
            } else {
                $this->Surgeon->ViewValue = $this->Surgeon->Lookup !== null && is_array($this->Surgeon->Lookup->Options) ? $curVal : null;
            }
            if ($this->Surgeon->ViewValue !== null) { // Load from cache
                $this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Surgeon->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Surgeon->EditValue = $arwrk;
            }
            $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

            // Anesthetist
            $this->Anesthetist->EditAttrs["class"] = "form-control";
            $this->Anesthetist->EditCustomAttributes = "";
            $curVal = trim(strval($this->Anesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
            } else {
                $this->Anesthetist->ViewValue = $this->Anesthetist->Lookup !== null && is_array($this->Anesthetist->Lookup->Options) ? $curVal : null;
            }
            if ($this->Anesthetist->ViewValue !== null) { // Load from cache
                $this->Anesthetist->EditValue = array_values($this->Anesthetist->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->Anesthetist->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Anesthetist->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Anesthetist->EditValue = $arwrk;
            }
            $this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

            // IdentificationMark
            $this->IdentificationMark->EditAttrs["class"] = "form-control";
            $this->IdentificationMark->EditCustomAttributes = "";
            if (!$this->IdentificationMark->Raw) {
                $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
            }
            $this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
            $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

            // ProcedureDone
            $this->ProcedureDone->EditAttrs["class"] = "form-control";
            $this->ProcedureDone->EditCustomAttributes = "";
            if (!$this->ProcedureDone->Raw) {
                $this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
            }
            $this->ProcedureDone->EditValue = HtmlEncode($this->ProcedureDone->CurrentValue);
            $this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
            $this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
            if (!$this->PROVISIONALDIAGNOSIS->Raw) {
                $this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
            }
            $this->PROVISIONALDIAGNOSIS->EditValue = HtmlEncode($this->PROVISIONALDIAGNOSIS->CurrentValue);
            $this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

            // Chiefcomplaints
            $this->Chiefcomplaints->EditAttrs["class"] = "form-control";
            $this->Chiefcomplaints->EditCustomAttributes = "";
            if (!$this->Chiefcomplaints->Raw) {
                $this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
            }
            $this->Chiefcomplaints->EditValue = HtmlEncode($this->Chiefcomplaints->CurrentValue);
            $this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

            // MaritallHistory
            $this->MaritallHistory->EditAttrs["class"] = "form-control";
            $this->MaritallHistory->EditCustomAttributes = "";
            if (!$this->MaritallHistory->Raw) {
                $this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
            }
            $this->MaritallHistory->EditValue = HtmlEncode($this->MaritallHistory->CurrentValue);
            $this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

            // MenstrualHistory
            $this->MenstrualHistory->EditAttrs["class"] = "form-control";
            $this->MenstrualHistory->EditCustomAttributes = "";
            if (!$this->MenstrualHistory->Raw) {
                $this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
            }
            $this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
            $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

            // SurgicalHistory
            $this->SurgicalHistory->EditAttrs["class"] = "form-control";
            $this->SurgicalHistory->EditCustomAttributes = "";
            if (!$this->SurgicalHistory->Raw) {
                $this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
            }
            $this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
            $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

            // PastHistory
            $this->PastHistory->EditAttrs["class"] = "form-control";
            $this->PastHistory->EditCustomAttributes = "";
            if (!$this->PastHistory->Raw) {
                $this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
            }
            $this->PastHistory->EditValue = HtmlEncode($this->PastHistory->CurrentValue);
            $this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

            // FamilyHistory
            $this->FamilyHistory->EditAttrs["class"] = "form-control";
            $this->FamilyHistory->EditCustomAttributes = "";
            if (!$this->FamilyHistory->Raw) {
                $this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
            }
            $this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
            $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RS
            $this->_RS->EditAttrs["class"] = "form-control";
            $this->_RS->EditCustomAttributes = "";
            if (!$this->_RS->Raw) {
                $this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
            }
            $this->_RS->EditValue = HtmlEncode($this->_RS->CurrentValue);
            $this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // InvestigationReport
            $this->InvestigationReport->EditAttrs["class"] = "form-control";
            $this->InvestigationReport->EditCustomAttributes = "";
            $this->InvestigationReport->EditValue = HtmlEncode($this->InvestigationReport->CurrentValue);
            $this->InvestigationReport->PlaceHolder = RemoveHtml($this->InvestigationReport->caption());

            // FinalDiagnosis
            $this->FinalDiagnosis->EditAttrs["class"] = "form-control";
            $this->FinalDiagnosis->EditCustomAttributes = "";
            $this->FinalDiagnosis->EditValue = HtmlEncode($this->FinalDiagnosis->CurrentValue);
            $this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

            // Treatment
            $this->Treatment->EditAttrs["class"] = "form-control";
            $this->Treatment->EditCustomAttributes = "";
            $this->Treatment->EditValue = HtmlEncode($this->Treatment->CurrentValue);
            $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

            // DetailOfOperation
            $this->DetailOfOperation->EditAttrs["class"] = "form-control";
            $this->DetailOfOperation->EditCustomAttributes = "";
            $this->DetailOfOperation->EditValue = HtmlEncode($this->DetailOfOperation->CurrentValue);
            $this->DetailOfOperation->PlaceHolder = RemoveHtml($this->DetailOfOperation->caption());

            // FollowUpAdvice
            $this->FollowUpAdvice->EditAttrs["class"] = "form-control";
            $this->FollowUpAdvice->EditCustomAttributes = "";
            $this->FollowUpAdvice->EditValue = HtmlEncode($this->FollowUpAdvice->CurrentValue);
            $this->FollowUpAdvice->PlaceHolder = RemoveHtml($this->FollowUpAdvice->caption());

            // FollowUpMedication
            $this->FollowUpMedication->EditAttrs["class"] = "form-control";
            $this->FollowUpMedication->EditCustomAttributes = "";
            $this->FollowUpMedication->EditValue = HtmlEncode($this->FollowUpMedication->CurrentValue);
            $this->FollowUpMedication->PlaceHolder = RemoveHtml($this->FollowUpMedication->caption());

            // Plan
            $this->Plan->EditAttrs["class"] = "form-control";
            $this->Plan->EditCustomAttributes = "";
            $this->Plan->EditValue = HtmlEncode($this->Plan->CurrentValue);
            $this->Plan->PlaceHolder = RemoveHtml($this->Plan->caption());

            // TempleteFinalDiagnosis
            $this->TempleteFinalDiagnosis->EditAttrs["class"] = "form-control";
            $this->TempleteFinalDiagnosis->EditCustomAttributes = "";
            $curVal = trim(strval($this->TempleteFinalDiagnosis->CurrentValue));
            if ($curVal != "") {
                $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->lookupCacheOption($curVal);
            } else {
                $this->TempleteFinalDiagnosis->ViewValue = $this->TempleteFinalDiagnosis->Lookup !== null && is_array($this->TempleteFinalDiagnosis->Lookup->Options) ? $curVal : null;
            }
            if ($this->TempleteFinalDiagnosis->ViewValue !== null) { // Load from cache
                $this->TempleteFinalDiagnosis->EditValue = array_values($this->TempleteFinalDiagnosis->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TempleteFinalDiagnosis->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='TemplateDiagnosis'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TempleteFinalDiagnosis->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TempleteFinalDiagnosis->EditValue = $arwrk;
            }
            $this->TempleteFinalDiagnosis->PlaceHolder = RemoveHtml($this->TempleteFinalDiagnosis->caption());

            // TemplateTreatment
            $this->TemplateTreatment->EditAttrs["class"] = "form-control";
            $this->TemplateTreatment->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateTreatment->CurrentValue));
            if ($curVal != "") {
                $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->lookupCacheOption($curVal);
            } else {
                $this->TemplateTreatment->ViewValue = $this->TemplateTreatment->Lookup !== null && is_array($this->TemplateTreatment->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateTreatment->ViewValue !== null) { // Load from cache
                $this->TemplateTreatment->EditValue = array_values($this->TemplateTreatment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateTreatment->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Treatment'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateTreatment->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateTreatment->EditValue = $arwrk;
            }
            $this->TemplateTreatment->PlaceHolder = RemoveHtml($this->TemplateTreatment->caption());

            // TemplateOperation
            $this->TemplateOperation->EditAttrs["class"] = "form-control";
            $this->TemplateOperation->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateOperation->CurrentValue));
            if ($curVal != "") {
                $this->TemplateOperation->ViewValue = $this->TemplateOperation->lookupCacheOption($curVal);
            } else {
                $this->TemplateOperation->ViewValue = $this->TemplateOperation->Lookup !== null && is_array($this->TemplateOperation->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateOperation->ViewValue !== null) { // Load from cache
                $this->TemplateOperation->EditValue = array_values($this->TemplateOperation->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateOperation->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Operation'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateOperation->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateOperation->EditValue = $arwrk;
            }
            $this->TemplateOperation->PlaceHolder = RemoveHtml($this->TemplateOperation->caption());

            // TemplateFollowUpAdvice
            $this->TemplateFollowUpAdvice->EditAttrs["class"] = "form-control";
            $this->TemplateFollowUpAdvice->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateFollowUpAdvice->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->lookupCacheOption($curVal);
            } else {
                $this->TemplateFollowUpAdvice->ViewValue = $this->TemplateFollowUpAdvice->Lookup !== null && is_array($this->TemplateFollowUpAdvice->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateFollowUpAdvice->ViewValue !== null) { // Load from cache
                $this->TemplateFollowUpAdvice->EditValue = array_values($this->TemplateFollowUpAdvice->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFollowUpAdvice->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='FollowUpAdvice '";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateFollowUpAdvice->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateFollowUpAdvice->EditValue = $arwrk;
            }
            $this->TemplateFollowUpAdvice->PlaceHolder = RemoveHtml($this->TemplateFollowUpAdvice->caption());

            // TemplateFollowUpMedication
            $this->TemplateFollowUpMedication->EditAttrs["class"] = "form-control";
            $this->TemplateFollowUpMedication->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateFollowUpMedication->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->lookupCacheOption($curVal);
            } else {
                $this->TemplateFollowUpMedication->ViewValue = $this->TemplateFollowUpMedication->Lookup !== null && is_array($this->TemplateFollowUpMedication->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateFollowUpMedication->ViewValue !== null) { // Load from cache
                $this->TemplateFollowUpMedication->EditValue = array_values($this->TemplateFollowUpMedication->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFollowUpMedication->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='FollowUpMedication'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateFollowUpMedication->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateFollowUpMedication->EditValue = $arwrk;
            }
            $this->TemplateFollowUpMedication->PlaceHolder = RemoveHtml($this->TemplateFollowUpMedication->caption());

            // TemplatePlan
            $this->TemplatePlan->EditAttrs["class"] = "form-control";
            $this->TemplatePlan->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplatePlan->CurrentValue));
            if ($curVal != "") {
                $this->TemplatePlan->ViewValue = $this->TemplatePlan->lookupCacheOption($curVal);
            } else {
                $this->TemplatePlan->ViewValue = $this->TemplatePlan->Lookup !== null && is_array($this->TemplatePlan->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplatePlan->ViewValue !== null) { // Load from cache
                $this->TemplatePlan->EditValue = array_values($this->TemplatePlan->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplatePlan->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='TemplatePlan'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplatePlan->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplatePlan->EditValue = $arwrk;
            }
            $this->TemplatePlan->PlaceHolder = RemoveHtml($this->TemplatePlan->caption());

            // QRCode
            $this->QRCode->EditAttrs["class"] = "form-control";
            $this->QRCode->EditCustomAttributes = "";
            $this->QRCode->EditValue = HtmlEncode($this->QRCode->CurrentValue);
            $this->QRCode->PlaceHolder = RemoveHtml($this->QRCode->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Add refer script

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";

            // DateofProcedure
            $this->DateofProcedure->LinkCustomAttributes = "";
            $this->DateofProcedure->HrefValue = "";

            // DateofDischarge
            $this->DateofDischarge->LinkCustomAttributes = "";
            $this->DateofDischarge->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";

            // ProcedureDone
            $this->ProcedureDone->LinkCustomAttributes = "";
            $this->ProcedureDone->HrefValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";

            // MaritallHistory
            $this->MaritallHistory->LinkCustomAttributes = "";
            $this->MaritallHistory->HrefValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";

            // RS
            $this->_RS->LinkCustomAttributes = "";
            $this->_RS->HrefValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";

            // InvestigationReport
            $this->InvestigationReport->LinkCustomAttributes = "";
            $this->InvestigationReport->HrefValue = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->LinkCustomAttributes = "";
            $this->FinalDiagnosis->HrefValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";

            // DetailOfOperation
            $this->DetailOfOperation->LinkCustomAttributes = "";
            $this->DetailOfOperation->HrefValue = "";

            // FollowUpAdvice
            $this->FollowUpAdvice->LinkCustomAttributes = "";
            $this->FollowUpAdvice->HrefValue = "";

            // FollowUpMedication
            $this->FollowUpMedication->LinkCustomAttributes = "";
            $this->FollowUpMedication->HrefValue = "";

            // Plan
            $this->Plan->LinkCustomAttributes = "";
            $this->Plan->HrefValue = "";

            // TempleteFinalDiagnosis
            $this->TempleteFinalDiagnosis->LinkCustomAttributes = "";
            $this->TempleteFinalDiagnosis->HrefValue = "";

            // TemplateTreatment
            $this->TemplateTreatment->LinkCustomAttributes = "";
            $this->TemplateTreatment->HrefValue = "";

            // TemplateOperation
            $this->TemplateOperation->LinkCustomAttributes = "";
            $this->TemplateOperation->HrefValue = "";

            // TemplateFollowUpAdvice
            $this->TemplateFollowUpAdvice->LinkCustomAttributes = "";
            $this->TemplateFollowUpAdvice->HrefValue = "";

            // TemplateFollowUpMedication
            $this->TemplateFollowUpMedication->LinkCustomAttributes = "";
            $this->TemplateFollowUpMedication->HrefValue = "";

            // TemplatePlan
            $this->TemplatePlan->LinkCustomAttributes = "";
            $this->TemplatePlan->HrefValue = "";

            // QRCode
            $this->QRCode->LinkCustomAttributes = "";
            $this->QRCode->HrefValue = "";
            $this->QRCode->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'QRCODE', 80);

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
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
        if ($this->RIDNO->Required) {
            if (!$this->RIDNO->IsDetailKey && EmptyValue($this->RIDNO->FormValue)) {
                $this->RIDNO->addErrorMessage(str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNO->FormValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->SEX->Required) {
            if (!$this->SEX->IsDetailKey && EmptyValue($this->SEX->FormValue)) {
                $this->SEX->addErrorMessage(str_replace("%s", $this->SEX->caption(), $this->SEX->RequiredErrorMessage));
            }
        }
        if ($this->Address->Required) {
            if (!$this->Address->IsDetailKey && EmptyValue($this->Address->FormValue)) {
                $this->Address->addErrorMessage(str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
            }
        }
        if ($this->DateofAdmission->Required) {
            if (!$this->DateofAdmission->IsDetailKey && EmptyValue($this->DateofAdmission->FormValue)) {
                $this->DateofAdmission->addErrorMessage(str_replace("%s", $this->DateofAdmission->caption(), $this->DateofAdmission->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DateofAdmission->FormValue)) {
            $this->DateofAdmission->addErrorMessage($this->DateofAdmission->getErrorMessage(false));
        }
        if ($this->DateofProcedure->Required) {
            if (!$this->DateofProcedure->IsDetailKey && EmptyValue($this->DateofProcedure->FormValue)) {
                $this->DateofProcedure->addErrorMessage(str_replace("%s", $this->DateofProcedure->caption(), $this->DateofProcedure->RequiredErrorMessage));
            }
        }
        if ($this->DateofDischarge->Required) {
            if (!$this->DateofDischarge->IsDetailKey && EmptyValue($this->DateofDischarge->FormValue)) {
                $this->DateofDischarge->addErrorMessage(str_replace("%s", $this->DateofDischarge->caption(), $this->DateofDischarge->RequiredErrorMessage));
            }
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->Surgeon->Required) {
            if (!$this->Surgeon->IsDetailKey && EmptyValue($this->Surgeon->FormValue)) {
                $this->Surgeon->addErrorMessage(str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
            }
        }
        if ($this->Anesthetist->Required) {
            if (!$this->Anesthetist->IsDetailKey && EmptyValue($this->Anesthetist->FormValue)) {
                $this->Anesthetist->addErrorMessage(str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
            }
        }
        if ($this->IdentificationMark->Required) {
            if (!$this->IdentificationMark->IsDetailKey && EmptyValue($this->IdentificationMark->FormValue)) {
                $this->IdentificationMark->addErrorMessage(str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureDone->Required) {
            if (!$this->ProcedureDone->IsDetailKey && EmptyValue($this->ProcedureDone->FormValue)) {
                $this->ProcedureDone->addErrorMessage(str_replace("%s", $this->ProcedureDone->caption(), $this->ProcedureDone->RequiredErrorMessage));
            }
        }
        if ($this->PROVISIONALDIAGNOSIS->Required) {
            if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey && EmptyValue($this->PROVISIONALDIAGNOSIS->FormValue)) {
                $this->PROVISIONALDIAGNOSIS->addErrorMessage(str_replace("%s", $this->PROVISIONALDIAGNOSIS->caption(), $this->PROVISIONALDIAGNOSIS->RequiredErrorMessage));
            }
        }
        if ($this->Chiefcomplaints->Required) {
            if (!$this->Chiefcomplaints->IsDetailKey && EmptyValue($this->Chiefcomplaints->FormValue)) {
                $this->Chiefcomplaints->addErrorMessage(str_replace("%s", $this->Chiefcomplaints->caption(), $this->Chiefcomplaints->RequiredErrorMessage));
            }
        }
        if ($this->MaritallHistory->Required) {
            if (!$this->MaritallHistory->IsDetailKey && EmptyValue($this->MaritallHistory->FormValue)) {
                $this->MaritallHistory->addErrorMessage(str_replace("%s", $this->MaritallHistory->caption(), $this->MaritallHistory->RequiredErrorMessage));
            }
        }
        if ($this->MenstrualHistory->Required) {
            if (!$this->MenstrualHistory->IsDetailKey && EmptyValue($this->MenstrualHistory->FormValue)) {
                $this->MenstrualHistory->addErrorMessage(str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
            }
        }
        if ($this->SurgicalHistory->Required) {
            if (!$this->SurgicalHistory->IsDetailKey && EmptyValue($this->SurgicalHistory->FormValue)) {
                $this->SurgicalHistory->addErrorMessage(str_replace("%s", $this->SurgicalHistory->caption(), $this->SurgicalHistory->RequiredErrorMessage));
            }
        }
        if ($this->PastHistory->Required) {
            if (!$this->PastHistory->IsDetailKey && EmptyValue($this->PastHistory->FormValue)) {
                $this->PastHistory->addErrorMessage(str_replace("%s", $this->PastHistory->caption(), $this->PastHistory->RequiredErrorMessage));
            }
        }
        if ($this->FamilyHistory->Required) {
            if (!$this->FamilyHistory->IsDetailKey && EmptyValue($this->FamilyHistory->FormValue)) {
                $this->FamilyHistory->addErrorMessage(str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
            }
        }
        if ($this->Temp->Required) {
            if (!$this->Temp->IsDetailKey && EmptyValue($this->Temp->FormValue)) {
                $this->Temp->addErrorMessage(str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
            }
        }
        if ($this->Pulse->Required) {
            if (!$this->Pulse->IsDetailKey && EmptyValue($this->Pulse->FormValue)) {
                $this->Pulse->addErrorMessage(str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
            }
        }
        if ($this->BP->Required) {
            if (!$this->BP->IsDetailKey && EmptyValue($this->BP->FormValue)) {
                $this->BP->addErrorMessage(str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
            }
        }
        if ($this->CNS->Required) {
            if (!$this->CNS->IsDetailKey && EmptyValue($this->CNS->FormValue)) {
                $this->CNS->addErrorMessage(str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
            }
        }
        if ($this->_RS->Required) {
            if (!$this->_RS->IsDetailKey && EmptyValue($this->_RS->FormValue)) {
                $this->_RS->addErrorMessage(str_replace("%s", $this->_RS->caption(), $this->_RS->RequiredErrorMessage));
            }
        }
        if ($this->CVS->Required) {
            if (!$this->CVS->IsDetailKey && EmptyValue($this->CVS->FormValue)) {
                $this->CVS->addErrorMessage(str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
            }
        }
        if ($this->PA->Required) {
            if (!$this->PA->IsDetailKey && EmptyValue($this->PA->FormValue)) {
                $this->PA->addErrorMessage(str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
            }
        }
        if ($this->InvestigationReport->Required) {
            if (!$this->InvestigationReport->IsDetailKey && EmptyValue($this->InvestigationReport->FormValue)) {
                $this->InvestigationReport->addErrorMessage(str_replace("%s", $this->InvestigationReport->caption(), $this->InvestigationReport->RequiredErrorMessage));
            }
        }
        if ($this->FinalDiagnosis->Required) {
            if (!$this->FinalDiagnosis->IsDetailKey && EmptyValue($this->FinalDiagnosis->FormValue)) {
                $this->FinalDiagnosis->addErrorMessage(str_replace("%s", $this->FinalDiagnosis->caption(), $this->FinalDiagnosis->RequiredErrorMessage));
            }
        }
        if ($this->Treatment->Required) {
            if (!$this->Treatment->IsDetailKey && EmptyValue($this->Treatment->FormValue)) {
                $this->Treatment->addErrorMessage(str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
            }
        }
        if ($this->DetailOfOperation->Required) {
            if (!$this->DetailOfOperation->IsDetailKey && EmptyValue($this->DetailOfOperation->FormValue)) {
                $this->DetailOfOperation->addErrorMessage(str_replace("%s", $this->DetailOfOperation->caption(), $this->DetailOfOperation->RequiredErrorMessage));
            }
        }
        if ($this->FollowUpAdvice->Required) {
            if (!$this->FollowUpAdvice->IsDetailKey && EmptyValue($this->FollowUpAdvice->FormValue)) {
                $this->FollowUpAdvice->addErrorMessage(str_replace("%s", $this->FollowUpAdvice->caption(), $this->FollowUpAdvice->RequiredErrorMessage));
            }
        }
        if ($this->FollowUpMedication->Required) {
            if (!$this->FollowUpMedication->IsDetailKey && EmptyValue($this->FollowUpMedication->FormValue)) {
                $this->FollowUpMedication->addErrorMessage(str_replace("%s", $this->FollowUpMedication->caption(), $this->FollowUpMedication->RequiredErrorMessage));
            }
        }
        if ($this->Plan->Required) {
            if (!$this->Plan->IsDetailKey && EmptyValue($this->Plan->FormValue)) {
                $this->Plan->addErrorMessage(str_replace("%s", $this->Plan->caption(), $this->Plan->RequiredErrorMessage));
            }
        }
        if ($this->TempleteFinalDiagnosis->Required) {
            if (!$this->TempleteFinalDiagnosis->IsDetailKey && EmptyValue($this->TempleteFinalDiagnosis->FormValue)) {
                $this->TempleteFinalDiagnosis->addErrorMessage(str_replace("%s", $this->TempleteFinalDiagnosis->caption(), $this->TempleteFinalDiagnosis->RequiredErrorMessage));
            }
        }
        if ($this->TemplateTreatment->Required) {
            if (!$this->TemplateTreatment->IsDetailKey && EmptyValue($this->TemplateTreatment->FormValue)) {
                $this->TemplateTreatment->addErrorMessage(str_replace("%s", $this->TemplateTreatment->caption(), $this->TemplateTreatment->RequiredErrorMessage));
            }
        }
        if ($this->TemplateOperation->Required) {
            if (!$this->TemplateOperation->IsDetailKey && EmptyValue($this->TemplateOperation->FormValue)) {
                $this->TemplateOperation->addErrorMessage(str_replace("%s", $this->TemplateOperation->caption(), $this->TemplateOperation->RequiredErrorMessage));
            }
        }
        if ($this->TemplateFollowUpAdvice->Required) {
            if (!$this->TemplateFollowUpAdvice->IsDetailKey && EmptyValue($this->TemplateFollowUpAdvice->FormValue)) {
                $this->TemplateFollowUpAdvice->addErrorMessage(str_replace("%s", $this->TemplateFollowUpAdvice->caption(), $this->TemplateFollowUpAdvice->RequiredErrorMessage));
            }
        }
        if ($this->TemplateFollowUpMedication->Required) {
            if (!$this->TemplateFollowUpMedication->IsDetailKey && EmptyValue($this->TemplateFollowUpMedication->FormValue)) {
                $this->TemplateFollowUpMedication->addErrorMessage(str_replace("%s", $this->TemplateFollowUpMedication->caption(), $this->TemplateFollowUpMedication->RequiredErrorMessage));
            }
        }
        if ($this->TemplatePlan->Required) {
            if (!$this->TemplatePlan->IsDetailKey && EmptyValue($this->TemplatePlan->FormValue)) {
                $this->TemplatePlan->addErrorMessage(str_replace("%s", $this->TemplatePlan->caption(), $this->TemplatePlan->RequiredErrorMessage));
            }
        }
        if ($this->QRCode->Required) {
            if (!$this->QRCode->IsDetailKey && EmptyValue($this->QRCode->FormValue)) {
                $this->QRCode->addErrorMessage(str_replace("%s", $this->QRCode->caption(), $this->QRCode->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
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

        // RIDNO
        $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // SEX
        $this->SEX->setDbValueDef($rsnew, $this->SEX->CurrentValue, null, false);

        // Address
        $this->Address->setDbValueDef($rsnew, $this->Address->CurrentValue, null, false);

        // DateofAdmission
        $this->DateofAdmission->setDbValueDef($rsnew, UnFormatDateTime($this->DateofAdmission->CurrentValue, 11), null, false);

        // DateofProcedure
        $this->DateofProcedure->setDbValueDef($rsnew, UnFormatDateTime($this->DateofProcedure->CurrentValue, 11), null, false);

        // DateofDischarge
        $this->DateofDischarge->setDbValueDef($rsnew, UnFormatDateTime($this->DateofDischarge->CurrentValue, 11), null, false);

        // Consultant
        $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, false);

        // Surgeon
        $this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, null, false);

        // Anesthetist
        $this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, null, false);

        // IdentificationMark
        $this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, null, false);

        // ProcedureDone
        $this->ProcedureDone->setDbValueDef($rsnew, $this->ProcedureDone->CurrentValue, null, false);

        // PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->setDbValueDef($rsnew, $this->PROVISIONALDIAGNOSIS->CurrentValue, null, false);

        // Chiefcomplaints
        $this->Chiefcomplaints->setDbValueDef($rsnew, $this->Chiefcomplaints->CurrentValue, null, false);

        // MaritallHistory
        $this->MaritallHistory->setDbValueDef($rsnew, $this->MaritallHistory->CurrentValue, null, false);

        // MenstrualHistory
        $this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, null, false);

        // SurgicalHistory
        $this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, null, false);

        // PastHistory
        $this->PastHistory->setDbValueDef($rsnew, $this->PastHistory->CurrentValue, null, false);

        // FamilyHistory
        $this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, null, false);

        // Temp
        $this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, null, false);

        // Pulse
        $this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, null, false);

        // BP
        $this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, null, false);

        // CNS
        $this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, null, false);

        // RS
        $this->_RS->setDbValueDef($rsnew, $this->_RS->CurrentValue, null, false);

        // CVS
        $this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, null, false);

        // PA
        $this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, null, false);

        // InvestigationReport
        $this->InvestigationReport->setDbValueDef($rsnew, $this->InvestigationReport->CurrentValue, null, false);

        // FinalDiagnosis
        $this->FinalDiagnosis->setDbValueDef($rsnew, $this->FinalDiagnosis->CurrentValue, null, false);

        // Treatment
        $this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, null, false);

        // DetailOfOperation
        $this->DetailOfOperation->setDbValueDef($rsnew, $this->DetailOfOperation->CurrentValue, null, false);

        // FollowUpAdvice
        $this->FollowUpAdvice->setDbValueDef($rsnew, $this->FollowUpAdvice->CurrentValue, null, false);

        // FollowUpMedication
        $this->FollowUpMedication->setDbValueDef($rsnew, $this->FollowUpMedication->CurrentValue, null, false);

        // Plan
        $this->Plan->setDbValueDef($rsnew, $this->Plan->CurrentValue, null, false);

        // TempleteFinalDiagnosis
        $this->TempleteFinalDiagnosis->setDbValueDef($rsnew, $this->TempleteFinalDiagnosis->CurrentValue, "", false);

        // TemplateTreatment
        $this->TemplateTreatment->setDbValueDef($rsnew, $this->TemplateTreatment->CurrentValue, "", false);

        // TemplateOperation
        $this->TemplateOperation->setDbValueDef($rsnew, $this->TemplateOperation->CurrentValue, "", false);

        // TemplateFollowUpAdvice
        $this->TemplateFollowUpAdvice->setDbValueDef($rsnew, $this->TemplateFollowUpAdvice->CurrentValue, "", false);

        // TemplateFollowUpMedication
        $this->TemplateFollowUpMedication->setDbValueDef($rsnew, $this->TemplateFollowUpMedication->CurrentValue, "", false);

        // TemplatePlan
        $this->TemplatePlan->setDbValueDef($rsnew, $this->TemplatePlan->CurrentValue, "", false);

        // QRCode
        $this->QRCode->setDbValueDef($rsnew, $this->QRCode->CurrentValue, "", false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOtherprocedureList"), "", $this->TableVar, true);
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
                case "x_Name":
                    break;
                case "x_Consultant":
                    break;
                case "x_Surgeon":
                    break;
                case "x_Anesthetist":
                    break;
                case "x_TempleteFinalDiagnosis":
                    $lookupFilter = function () {
                        return "`TemplateType`='TemplateDiagnosis'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateTreatment":
                    $lookupFilter = function () {
                        return "`TemplateType`='Treatment'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateOperation":
                    $lookupFilter = function () {
                        return "`TemplateType`='Operation'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFollowUpAdvice":
                    $lookupFilter = function () {
                        return "`TemplateType`='FollowUpAdvice '";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFollowUpMedication":
                    $lookupFilter = function () {
                        return "`TemplateType`='FollowUpMedication'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplatePlan":
                    $lookupFilter = function () {
                        return "`TemplateType`='TemplatePlan'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
