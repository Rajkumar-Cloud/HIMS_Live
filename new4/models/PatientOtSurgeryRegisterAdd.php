<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOtSurgeryRegisterAdd extends PatientOtSurgeryRegister
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_ot_surgery_register';

    // Page object name
    public $PageObjName = "PatientOtSurgeryRegisterAdd";

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

        // Table object (patient_ot_surgery_register)
        if (!isset($GLOBALS["patient_ot_surgery_register"]) || get_class($GLOBALS["patient_ot_surgery_register"]) == PROJECT_NAMESPACE . "patient_ot_surgery_register") {
            $GLOBALS["patient_ot_surgery_register"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_surgery_register');
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
                $doc = new $class(Container("patient_ot_surgery_register"));
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
                    if ($pageName == "PatientOtSurgeryRegisterView") {
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
        $this->PatID->setVisibility();
        $this->PatientName->setVisibility();
        $this->mrnno->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->diagnosis->setVisibility();
        $this->proposedSurgery->setVisibility();
        $this->surgeryProcedure->setVisibility();
        $this->typeOfAnaesthesia->setVisibility();
        $this->RecievedTime->setVisibility();
        $this->AnaesthesiaStarted->setVisibility();
        $this->AnaesthesiaEnded->setVisibility();
        $this->surgeryStarted->setVisibility();
        $this->surgeryEnded->setVisibility();
        $this->RecoveryTime->setVisibility();
        $this->ShiftedTime->setVisibility();
        $this->Duration->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anaesthetist->setVisibility();
        $this->AsstSurgeon1->setVisibility();
        $this->AsstSurgeon2->setVisibility();
        $this->paediatric->setVisibility();
        $this->ScrubNurse1->setVisibility();
        $this->ScrubNurse2->setVisibility();
        $this->FloorNurse->setVisibility();
        $this->Technician->setVisibility();
        $this->HouseKeeping->setVisibility();
        $this->countsCheckedMops->setVisibility();
        $this->gauze->setVisibility();
        $this->needles->setVisibility();
        $this->bloodloss->setVisibility();
        $this->bloodtransfusion->setVisibility();
        $this->implantsUsed->setVisibility();
        $this->MaterialsForHPE->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->HospID->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->Reception->setVisibility();
        $this->PatientID->setVisibility();
        $this->PId->setVisibility();
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
        $this->setupLookupOptions($this->Surgeon);
        $this->setupLookupOptions($this->Anaesthetist);
        $this->setupLookupOptions($this->AsstSurgeon1);
        $this->setupLookupOptions($this->AsstSurgeon2);
        $this->setupLookupOptions($this->paediatric);
        $this->setupLookupOptions($this->PatientSearch);

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

        // Set up master/detail parameters
        // NOTE: must be after loadOldRecord to prevent master key values overwritten
        $this->setupMasterParms();

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
                    $this->terminate("PatientOtSurgeryRegisterList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "PatientOtSurgeryRegisterList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PatientOtSurgeryRegisterView") {
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
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->MobileNumber->CurrentValue = null;
        $this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->diagnosis->CurrentValue = null;
        $this->diagnosis->OldValue = $this->diagnosis->CurrentValue;
        $this->proposedSurgery->CurrentValue = null;
        $this->proposedSurgery->OldValue = $this->proposedSurgery->CurrentValue;
        $this->surgeryProcedure->CurrentValue = null;
        $this->surgeryProcedure->OldValue = $this->surgeryProcedure->CurrentValue;
        $this->typeOfAnaesthesia->CurrentValue = null;
        $this->typeOfAnaesthesia->OldValue = $this->typeOfAnaesthesia->CurrentValue;
        $this->RecievedTime->CurrentValue = null;
        $this->RecievedTime->OldValue = $this->RecievedTime->CurrentValue;
        $this->AnaesthesiaStarted->CurrentValue = null;
        $this->AnaesthesiaStarted->OldValue = $this->AnaesthesiaStarted->CurrentValue;
        $this->AnaesthesiaEnded->CurrentValue = null;
        $this->AnaesthesiaEnded->OldValue = $this->AnaesthesiaEnded->CurrentValue;
        $this->surgeryStarted->CurrentValue = null;
        $this->surgeryStarted->OldValue = $this->surgeryStarted->CurrentValue;
        $this->surgeryEnded->CurrentValue = null;
        $this->surgeryEnded->OldValue = $this->surgeryEnded->CurrentValue;
        $this->RecoveryTime->CurrentValue = null;
        $this->RecoveryTime->OldValue = $this->RecoveryTime->CurrentValue;
        $this->ShiftedTime->CurrentValue = null;
        $this->ShiftedTime->OldValue = $this->ShiftedTime->CurrentValue;
        $this->Duration->CurrentValue = null;
        $this->Duration->OldValue = $this->Duration->CurrentValue;
        $this->Surgeon->CurrentValue = null;
        $this->Surgeon->OldValue = $this->Surgeon->CurrentValue;
        $this->Anaesthetist->CurrentValue = null;
        $this->Anaesthetist->OldValue = $this->Anaesthetist->CurrentValue;
        $this->AsstSurgeon1->CurrentValue = null;
        $this->AsstSurgeon1->OldValue = $this->AsstSurgeon1->CurrentValue;
        $this->AsstSurgeon2->CurrentValue = null;
        $this->AsstSurgeon2->OldValue = $this->AsstSurgeon2->CurrentValue;
        $this->paediatric->CurrentValue = null;
        $this->paediatric->OldValue = $this->paediatric->CurrentValue;
        $this->ScrubNurse1->CurrentValue = null;
        $this->ScrubNurse1->OldValue = $this->ScrubNurse1->CurrentValue;
        $this->ScrubNurse2->CurrentValue = null;
        $this->ScrubNurse2->OldValue = $this->ScrubNurse2->CurrentValue;
        $this->FloorNurse->CurrentValue = null;
        $this->FloorNurse->OldValue = $this->FloorNurse->CurrentValue;
        $this->Technician->CurrentValue = null;
        $this->Technician->OldValue = $this->Technician->CurrentValue;
        $this->HouseKeeping->CurrentValue = null;
        $this->HouseKeeping->OldValue = $this->HouseKeeping->CurrentValue;
        $this->countsCheckedMops->CurrentValue = null;
        $this->countsCheckedMops->OldValue = $this->countsCheckedMops->CurrentValue;
        $this->gauze->CurrentValue = null;
        $this->gauze->OldValue = $this->gauze->CurrentValue;
        $this->needles->CurrentValue = null;
        $this->needles->OldValue = $this->needles->CurrentValue;
        $this->bloodloss->CurrentValue = null;
        $this->bloodloss->OldValue = $this->bloodloss->CurrentValue;
        $this->bloodtransfusion->CurrentValue = null;
        $this->bloodtransfusion->OldValue = $this->bloodtransfusion->CurrentValue;
        $this->implantsUsed->CurrentValue = null;
        $this->implantsUsed->OldValue = $this->implantsUsed->CurrentValue;
        $this->MaterialsForHPE->CurrentValue = null;
        $this->MaterialsForHPE->OldValue = $this->MaterialsForHPE->CurrentValue;
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
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->PatientSearch->CurrentValue = null;
        $this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->PId->CurrentValue = null;
        $this->PId->OldValue = $this->PId->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
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

        // Check field name 'diagnosis' first before field var 'x_diagnosis'
        $val = $CurrentForm->hasValue("diagnosis") ? $CurrentForm->getValue("diagnosis") : $CurrentForm->getValue("x_diagnosis");
        if (!$this->diagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->diagnosis->Visible = false; // Disable update for API request
            } else {
                $this->diagnosis->setFormValue($val);
            }
        }

        // Check field name 'proposedSurgery' first before field var 'x_proposedSurgery'
        $val = $CurrentForm->hasValue("proposedSurgery") ? $CurrentForm->getValue("proposedSurgery") : $CurrentForm->getValue("x_proposedSurgery");
        if (!$this->proposedSurgery->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->proposedSurgery->Visible = false; // Disable update for API request
            } else {
                $this->proposedSurgery->setFormValue($val);
            }
        }

        // Check field name 'surgeryProcedure' first before field var 'x_surgeryProcedure'
        $val = $CurrentForm->hasValue("surgeryProcedure") ? $CurrentForm->getValue("surgeryProcedure") : $CurrentForm->getValue("x_surgeryProcedure");
        if (!$this->surgeryProcedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->surgeryProcedure->Visible = false; // Disable update for API request
            } else {
                $this->surgeryProcedure->setFormValue($val);
            }
        }

        // Check field name 'typeOfAnaesthesia' first before field var 'x_typeOfAnaesthesia'
        $val = $CurrentForm->hasValue("typeOfAnaesthesia") ? $CurrentForm->getValue("typeOfAnaesthesia") : $CurrentForm->getValue("x_typeOfAnaesthesia");
        if (!$this->typeOfAnaesthesia->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->typeOfAnaesthesia->Visible = false; // Disable update for API request
            } else {
                $this->typeOfAnaesthesia->setFormValue($val);
            }
        }

        // Check field name 'RecievedTime' first before field var 'x_RecievedTime'
        $val = $CurrentForm->hasValue("RecievedTime") ? $CurrentForm->getValue("RecievedTime") : $CurrentForm->getValue("x_RecievedTime");
        if (!$this->RecievedTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecievedTime->Visible = false; // Disable update for API request
            } else {
                $this->RecievedTime->setFormValue($val);
            }
            $this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 11);
        }

        // Check field name 'AnaesthesiaStarted' first before field var 'x_AnaesthesiaStarted'
        $val = $CurrentForm->hasValue("AnaesthesiaStarted") ? $CurrentForm->getValue("AnaesthesiaStarted") : $CurrentForm->getValue("x_AnaesthesiaStarted");
        if (!$this->AnaesthesiaStarted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnaesthesiaStarted->Visible = false; // Disable update for API request
            } else {
                $this->AnaesthesiaStarted->setFormValue($val);
            }
            $this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
        }

        // Check field name 'AnaesthesiaEnded' first before field var 'x_AnaesthesiaEnded'
        $val = $CurrentForm->hasValue("AnaesthesiaEnded") ? $CurrentForm->getValue("AnaesthesiaEnded") : $CurrentForm->getValue("x_AnaesthesiaEnded");
        if (!$this->AnaesthesiaEnded->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnaesthesiaEnded->Visible = false; // Disable update for API request
            } else {
                $this->AnaesthesiaEnded->setFormValue($val);
            }
            $this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
        }

        // Check field name 'surgeryStarted' first before field var 'x_surgeryStarted'
        $val = $CurrentForm->hasValue("surgeryStarted") ? $CurrentForm->getValue("surgeryStarted") : $CurrentForm->getValue("x_surgeryStarted");
        if (!$this->surgeryStarted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->surgeryStarted->Visible = false; // Disable update for API request
            } else {
                $this->surgeryStarted->setFormValue($val);
            }
            $this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 11);
        }

        // Check field name 'surgeryEnded' first before field var 'x_surgeryEnded'
        $val = $CurrentForm->hasValue("surgeryEnded") ? $CurrentForm->getValue("surgeryEnded") : $CurrentForm->getValue("x_surgeryEnded");
        if (!$this->surgeryEnded->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->surgeryEnded->Visible = false; // Disable update for API request
            } else {
                $this->surgeryEnded->setFormValue($val);
            }
            $this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 17);
        }

        // Check field name 'RecoveryTime' first before field var 'x_RecoveryTime'
        $val = $CurrentForm->hasValue("RecoveryTime") ? $CurrentForm->getValue("RecoveryTime") : $CurrentForm->getValue("x_RecoveryTime");
        if (!$this->RecoveryTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecoveryTime->Visible = false; // Disable update for API request
            } else {
                $this->RecoveryTime->setFormValue($val);
            }
            $this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
        }

        // Check field name 'ShiftedTime' first before field var 'x_ShiftedTime'
        $val = $CurrentForm->hasValue("ShiftedTime") ? $CurrentForm->getValue("ShiftedTime") : $CurrentForm->getValue("x_ShiftedTime");
        if (!$this->ShiftedTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ShiftedTime->Visible = false; // Disable update for API request
            } else {
                $this->ShiftedTime->setFormValue($val);
            }
            $this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
        }

        // Check field name 'Duration' first before field var 'x_Duration'
        $val = $CurrentForm->hasValue("Duration") ? $CurrentForm->getValue("Duration") : $CurrentForm->getValue("x_Duration");
        if (!$this->Duration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Duration->Visible = false; // Disable update for API request
            } else {
                $this->Duration->setFormValue($val);
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

        // Check field name 'Anaesthetist' first before field var 'x_Anaesthetist'
        $val = $CurrentForm->hasValue("Anaesthetist") ? $CurrentForm->getValue("Anaesthetist") : $CurrentForm->getValue("x_Anaesthetist");
        if (!$this->Anaesthetist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anaesthetist->Visible = false; // Disable update for API request
            } else {
                $this->Anaesthetist->setFormValue($val);
            }
        }

        // Check field name 'AsstSurgeon1' first before field var 'x_AsstSurgeon1'
        $val = $CurrentForm->hasValue("AsstSurgeon1") ? $CurrentForm->getValue("AsstSurgeon1") : $CurrentForm->getValue("x_AsstSurgeon1");
        if (!$this->AsstSurgeon1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AsstSurgeon1->Visible = false; // Disable update for API request
            } else {
                $this->AsstSurgeon1->setFormValue($val);
            }
        }

        // Check field name 'AsstSurgeon2' first before field var 'x_AsstSurgeon2'
        $val = $CurrentForm->hasValue("AsstSurgeon2") ? $CurrentForm->getValue("AsstSurgeon2") : $CurrentForm->getValue("x_AsstSurgeon2");
        if (!$this->AsstSurgeon2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AsstSurgeon2->Visible = false; // Disable update for API request
            } else {
                $this->AsstSurgeon2->setFormValue($val);
            }
        }

        // Check field name 'paediatric' first before field var 'x_paediatric'
        $val = $CurrentForm->hasValue("paediatric") ? $CurrentForm->getValue("paediatric") : $CurrentForm->getValue("x_paediatric");
        if (!$this->paediatric->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->paediatric->Visible = false; // Disable update for API request
            } else {
                $this->paediatric->setFormValue($val);
            }
        }

        // Check field name 'ScrubNurse1' first before field var 'x_ScrubNurse1'
        $val = $CurrentForm->hasValue("ScrubNurse1") ? $CurrentForm->getValue("ScrubNurse1") : $CurrentForm->getValue("x_ScrubNurse1");
        if (!$this->ScrubNurse1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ScrubNurse1->Visible = false; // Disable update for API request
            } else {
                $this->ScrubNurse1->setFormValue($val);
            }
        }

        // Check field name 'ScrubNurse2' first before field var 'x_ScrubNurse2'
        $val = $CurrentForm->hasValue("ScrubNurse2") ? $CurrentForm->getValue("ScrubNurse2") : $CurrentForm->getValue("x_ScrubNurse2");
        if (!$this->ScrubNurse2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ScrubNurse2->Visible = false; // Disable update for API request
            } else {
                $this->ScrubNurse2->setFormValue($val);
            }
        }

        // Check field name 'FloorNurse' first before field var 'x_FloorNurse'
        $val = $CurrentForm->hasValue("FloorNurse") ? $CurrentForm->getValue("FloorNurse") : $CurrentForm->getValue("x_FloorNurse");
        if (!$this->FloorNurse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FloorNurse->Visible = false; // Disable update for API request
            } else {
                $this->FloorNurse->setFormValue($val);
            }
        }

        // Check field name 'Technician' first before field var 'x_Technician'
        $val = $CurrentForm->hasValue("Technician") ? $CurrentForm->getValue("Technician") : $CurrentForm->getValue("x_Technician");
        if (!$this->Technician->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Technician->Visible = false; // Disable update for API request
            } else {
                $this->Technician->setFormValue($val);
            }
        }

        // Check field name 'HouseKeeping' first before field var 'x_HouseKeeping'
        $val = $CurrentForm->hasValue("HouseKeeping") ? $CurrentForm->getValue("HouseKeeping") : $CurrentForm->getValue("x_HouseKeeping");
        if (!$this->HouseKeeping->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HouseKeeping->Visible = false; // Disable update for API request
            } else {
                $this->HouseKeeping->setFormValue($val);
            }
        }

        // Check field name 'countsCheckedMops' first before field var 'x_countsCheckedMops'
        $val = $CurrentForm->hasValue("countsCheckedMops") ? $CurrentForm->getValue("countsCheckedMops") : $CurrentForm->getValue("x_countsCheckedMops");
        if (!$this->countsCheckedMops->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->countsCheckedMops->Visible = false; // Disable update for API request
            } else {
                $this->countsCheckedMops->setFormValue($val);
            }
        }

        // Check field name 'gauze' first before field var 'x_gauze'
        $val = $CurrentForm->hasValue("gauze") ? $CurrentForm->getValue("gauze") : $CurrentForm->getValue("x_gauze");
        if (!$this->gauze->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gauze->Visible = false; // Disable update for API request
            } else {
                $this->gauze->setFormValue($val);
            }
        }

        // Check field name 'needles' first before field var 'x_needles'
        $val = $CurrentForm->hasValue("needles") ? $CurrentForm->getValue("needles") : $CurrentForm->getValue("x_needles");
        if (!$this->needles->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->needles->Visible = false; // Disable update for API request
            } else {
                $this->needles->setFormValue($val);
            }
        }

        // Check field name 'bloodloss' first before field var 'x_bloodloss'
        $val = $CurrentForm->hasValue("bloodloss") ? $CurrentForm->getValue("bloodloss") : $CurrentForm->getValue("x_bloodloss");
        if (!$this->bloodloss->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bloodloss->Visible = false; // Disable update for API request
            } else {
                $this->bloodloss->setFormValue($val);
            }
        }

        // Check field name 'bloodtransfusion' first before field var 'x_bloodtransfusion'
        $val = $CurrentForm->hasValue("bloodtransfusion") ? $CurrentForm->getValue("bloodtransfusion") : $CurrentForm->getValue("x_bloodtransfusion");
        if (!$this->bloodtransfusion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bloodtransfusion->Visible = false; // Disable update for API request
            } else {
                $this->bloodtransfusion->setFormValue($val);
            }
        }

        // Check field name 'implantsUsed' first before field var 'x_implantsUsed'
        $val = $CurrentForm->hasValue("implantsUsed") ? $CurrentForm->getValue("implantsUsed") : $CurrentForm->getValue("x_implantsUsed");
        if (!$this->implantsUsed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->implantsUsed->Visible = false; // Disable update for API request
            } else {
                $this->implantsUsed->setFormValue($val);
            }
        }

        // Check field name 'MaterialsForHPE' first before field var 'x_MaterialsForHPE'
        $val = $CurrentForm->hasValue("MaterialsForHPE") ? $CurrentForm->getValue("MaterialsForHPE") : $CurrentForm->getValue("x_MaterialsForHPE");
        if (!$this->MaterialsForHPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaterialsForHPE->Visible = false; // Disable update for API request
            } else {
                $this->MaterialsForHPE->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
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

        // Check field name 'PId' first before field var 'x_PId'
        $val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
        if (!$this->PId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PId->Visible = false; // Disable update for API request
            } else {
                $this->PId->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->diagnosis->CurrentValue = $this->diagnosis->FormValue;
        $this->proposedSurgery->CurrentValue = $this->proposedSurgery->FormValue;
        $this->surgeryProcedure->CurrentValue = $this->surgeryProcedure->FormValue;
        $this->typeOfAnaesthesia->CurrentValue = $this->typeOfAnaesthesia->FormValue;
        $this->RecievedTime->CurrentValue = $this->RecievedTime->FormValue;
        $this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 11);
        $this->AnaesthesiaStarted->CurrentValue = $this->AnaesthesiaStarted->FormValue;
        $this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
        $this->AnaesthesiaEnded->CurrentValue = $this->AnaesthesiaEnded->FormValue;
        $this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
        $this->surgeryStarted->CurrentValue = $this->surgeryStarted->FormValue;
        $this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 11);
        $this->surgeryEnded->CurrentValue = $this->surgeryEnded->FormValue;
        $this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 17);
        $this->RecoveryTime->CurrentValue = $this->RecoveryTime->FormValue;
        $this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
        $this->ShiftedTime->CurrentValue = $this->ShiftedTime->FormValue;
        $this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
        $this->Duration->CurrentValue = $this->Duration->FormValue;
        $this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
        $this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
        $this->AsstSurgeon1->CurrentValue = $this->AsstSurgeon1->FormValue;
        $this->AsstSurgeon2->CurrentValue = $this->AsstSurgeon2->FormValue;
        $this->paediatric->CurrentValue = $this->paediatric->FormValue;
        $this->ScrubNurse1->CurrentValue = $this->ScrubNurse1->FormValue;
        $this->ScrubNurse2->CurrentValue = $this->ScrubNurse2->FormValue;
        $this->FloorNurse->CurrentValue = $this->FloorNurse->FormValue;
        $this->Technician->CurrentValue = $this->Technician->FormValue;
        $this->HouseKeeping->CurrentValue = $this->HouseKeeping->FormValue;
        $this->countsCheckedMops->CurrentValue = $this->countsCheckedMops->FormValue;
        $this->gauze->CurrentValue = $this->gauze->FormValue;
        $this->needles->CurrentValue = $this->needles->FormValue;
        $this->bloodloss->CurrentValue = $this->bloodloss->FormValue;
        $this->bloodtransfusion->CurrentValue = $this->bloodtransfusion->FormValue;
        $this->implantsUsed->CurrentValue = $this->implantsUsed->FormValue;
        $this->MaterialsForHPE->CurrentValue = $this->MaterialsForHPE->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PId->CurrentValue = $this->PId->FormValue;
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->diagnosis->setDbValue($row['diagnosis']);
        $this->proposedSurgery->setDbValue($row['proposedSurgery']);
        $this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
        $this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
        $this->RecievedTime->setDbValue($row['RecievedTime']);
        $this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
        $this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
        $this->surgeryStarted->setDbValue($row['surgeryStarted']);
        $this->surgeryEnded->setDbValue($row['surgeryEnded']);
        $this->RecoveryTime->setDbValue($row['RecoveryTime']);
        $this->ShiftedTime->setDbValue($row['ShiftedTime']);
        $this->Duration->setDbValue($row['Duration']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
        $this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
        $this->paediatric->setDbValue($row['paediatric']);
        $this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
        $this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
        $this->FloorNurse->setDbValue($row['FloorNurse']);
        $this->Technician->setDbValue($row['Technician']);
        $this->HouseKeeping->setDbValue($row['HouseKeeping']);
        $this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
        $this->gauze->setDbValue($row['gauze']);
        $this->needles->setDbValue($row['needles']);
        $this->bloodloss->setDbValue($row['bloodloss']);
        $this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
        $this->implantsUsed->setDbValue($row['implantsUsed']);
        $this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PId->setDbValue($row['PId']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['MobileNumber'] = $this->MobileNumber->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['diagnosis'] = $this->diagnosis->CurrentValue;
        $row['proposedSurgery'] = $this->proposedSurgery->CurrentValue;
        $row['surgeryProcedure'] = $this->surgeryProcedure->CurrentValue;
        $row['typeOfAnaesthesia'] = $this->typeOfAnaesthesia->CurrentValue;
        $row['RecievedTime'] = $this->RecievedTime->CurrentValue;
        $row['AnaesthesiaStarted'] = $this->AnaesthesiaStarted->CurrentValue;
        $row['AnaesthesiaEnded'] = $this->AnaesthesiaEnded->CurrentValue;
        $row['surgeryStarted'] = $this->surgeryStarted->CurrentValue;
        $row['surgeryEnded'] = $this->surgeryEnded->CurrentValue;
        $row['RecoveryTime'] = $this->RecoveryTime->CurrentValue;
        $row['ShiftedTime'] = $this->ShiftedTime->CurrentValue;
        $row['Duration'] = $this->Duration->CurrentValue;
        $row['Surgeon'] = $this->Surgeon->CurrentValue;
        $row['Anaesthetist'] = $this->Anaesthetist->CurrentValue;
        $row['AsstSurgeon1'] = $this->AsstSurgeon1->CurrentValue;
        $row['AsstSurgeon2'] = $this->AsstSurgeon2->CurrentValue;
        $row['paediatric'] = $this->paediatric->CurrentValue;
        $row['ScrubNurse1'] = $this->ScrubNurse1->CurrentValue;
        $row['ScrubNurse2'] = $this->ScrubNurse2->CurrentValue;
        $row['FloorNurse'] = $this->FloorNurse->CurrentValue;
        $row['Technician'] = $this->Technician->CurrentValue;
        $row['HouseKeeping'] = $this->HouseKeeping->CurrentValue;
        $row['countsCheckedMops'] = $this->countsCheckedMops->CurrentValue;
        $row['gauze'] = $this->gauze->CurrentValue;
        $row['needles'] = $this->needles->CurrentValue;
        $row['bloodloss'] = $this->bloodloss->CurrentValue;
        $row['bloodtransfusion'] = $this->bloodtransfusion->CurrentValue;
        $row['implantsUsed'] = $this->implantsUsed->CurrentValue;
        $row['MaterialsForHPE'] = $this->MaterialsForHPE->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['PatientSearch'] = $this->PatientSearch->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['PId'] = $this->PId->CurrentValue;
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

        // PatID

        // PatientName

        // mrnno

        // MobileNumber

        // Age

        // Gender

        // profilePic

        // diagnosis

        // proposedSurgery

        // surgeryProcedure

        // typeOfAnaesthesia

        // RecievedTime

        // AnaesthesiaStarted

        // AnaesthesiaEnded

        // surgeryStarted

        // surgeryEnded

        // RecoveryTime

        // ShiftedTime

        // Duration

        // Surgeon

        // Anaesthetist

        // AsstSurgeon1

        // AsstSurgeon2

        // paediatric

        // ScrubNurse1

        // ScrubNurse2

        // FloorNurse

        // Technician

        // HouseKeeping

        // countsCheckedMops

        // gauze

        // needles

        // bloodloss

        // bloodtransfusion

        // implantsUsed

        // MaterialsForHPE

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // PatientSearch

        // Reception

        // PatientID

        // PId
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // diagnosis
            $this->diagnosis->ViewValue = $this->diagnosis->CurrentValue;
            $this->diagnosis->ViewCustomAttributes = "";

            // proposedSurgery
            $this->proposedSurgery->ViewValue = $this->proposedSurgery->CurrentValue;
            $this->proposedSurgery->ViewCustomAttributes = "";

            // surgeryProcedure
            $this->surgeryProcedure->ViewValue = $this->surgeryProcedure->CurrentValue;
            $this->surgeryProcedure->ViewCustomAttributes = "";

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->ViewValue = $this->typeOfAnaesthesia->CurrentValue;
            $this->typeOfAnaesthesia->ViewCustomAttributes = "";

            // RecievedTime
            $this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
            $this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
            $this->RecievedTime->ViewCustomAttributes = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
            $this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
            $this->AnaesthesiaStarted->ViewCustomAttributes = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
            $this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
            $this->AnaesthesiaEnded->ViewCustomAttributes = "";

            // surgeryStarted
            $this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
            $this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
            $this->surgeryStarted->ViewCustomAttributes = "";

            // surgeryEnded
            $this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
            $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 17);
            $this->surgeryEnded->ViewCustomAttributes = "";

            // RecoveryTime
            $this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
            $this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
            $this->RecoveryTime->ViewCustomAttributes = "";

            // ShiftedTime
            $this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
            $this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
            $this->ShiftedTime->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewCustomAttributes = "";

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

            // Anaesthetist
            $curVal = trim(strval($this->Anaesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
                if ($this->Anaesthetist->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Anaesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Anaesthetist->Lookup->renderViewRow($rswrk[0]);
                        $this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
                    } else {
                        $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
                    }
                }
            } else {
                $this->Anaesthetist->ViewValue = null;
            }
            $this->Anaesthetist->ViewCustomAttributes = "";

            // AsstSurgeon1
            $curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
                if ($this->AsstSurgeon1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon1->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
                    }
                }
            } else {
                $this->AsstSurgeon1->ViewValue = null;
            }
            $this->AsstSurgeon1->ViewCustomAttributes = "";

            // AsstSurgeon2
            $curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
                if ($this->AsstSurgeon2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon2->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
                    }
                }
            } else {
                $this->AsstSurgeon2->ViewValue = null;
            }
            $this->AsstSurgeon2->ViewCustomAttributes = "";

            // paediatric
            $curVal = trim(strval($this->paediatric->CurrentValue));
            if ($curVal != "") {
                $this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
                if ($this->paediatric->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->paediatric->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->paediatric->Lookup->renderViewRow($rswrk[0]);
                        $this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
                    } else {
                        $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
                    }
                }
            } else {
                $this->paediatric->ViewValue = null;
            }
            $this->paediatric->ViewCustomAttributes = "";

            // ScrubNurse1
            $this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
            $this->ScrubNurse1->ViewCustomAttributes = "";

            // ScrubNurse2
            $this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
            $this->ScrubNurse2->ViewCustomAttributes = "";

            // FloorNurse
            $this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
            $this->FloorNurse->ViewCustomAttributes = "";

            // Technician
            $this->Technician->ViewValue = $this->Technician->CurrentValue;
            $this->Technician->ViewCustomAttributes = "";

            // HouseKeeping
            $this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
            $this->HouseKeeping->ViewCustomAttributes = "";

            // countsCheckedMops
            $this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
            $this->countsCheckedMops->ViewCustomAttributes = "";

            // gauze
            $this->gauze->ViewValue = $this->gauze->CurrentValue;
            $this->gauze->ViewCustomAttributes = "";

            // needles
            $this->needles->ViewValue = $this->needles->CurrentValue;
            $this->needles->ViewCustomAttributes = "";

            // bloodloss
            $this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
            $this->bloodloss->ViewCustomAttributes = "";

            // bloodtransfusion
            $this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
            $this->bloodtransfusion->ViewCustomAttributes = "";

            // implantsUsed
            $this->implantsUsed->ViewValue = $this->implantsUsed->CurrentValue;
            $this->implantsUsed->ViewCustomAttributes = "";

            // MaterialsForHPE
            $this->MaterialsForHPE->ViewValue = $this->MaterialsForHPE->CurrentValue;
            $this->MaterialsForHPE->ViewCustomAttributes = "";

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

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

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

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

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

            // diagnosis
            $this->diagnosis->LinkCustomAttributes = "";
            $this->diagnosis->HrefValue = "";
            $this->diagnosis->TooltipValue = "";

            // proposedSurgery
            $this->proposedSurgery->LinkCustomAttributes = "";
            $this->proposedSurgery->HrefValue = "";
            $this->proposedSurgery->TooltipValue = "";

            // surgeryProcedure
            $this->surgeryProcedure->LinkCustomAttributes = "";
            $this->surgeryProcedure->HrefValue = "";
            $this->surgeryProcedure->TooltipValue = "";

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->LinkCustomAttributes = "";
            $this->typeOfAnaesthesia->HrefValue = "";
            $this->typeOfAnaesthesia->TooltipValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";
            $this->RecievedTime->TooltipValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";
            $this->AnaesthesiaStarted->TooltipValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";
            $this->AnaesthesiaEnded->TooltipValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";
            $this->surgeryStarted->TooltipValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";
            $this->surgeryEnded->TooltipValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";
            $this->RecoveryTime->TooltipValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";
            $this->ShiftedTime->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";
            $this->Anaesthetist->TooltipValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";
            $this->AsstSurgeon1->TooltipValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";
            $this->AsstSurgeon2->TooltipValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";
            $this->paediatric->TooltipValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";
            $this->ScrubNurse1->TooltipValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";
            $this->ScrubNurse2->TooltipValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";
            $this->FloorNurse->TooltipValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";
            $this->Technician->TooltipValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";
            $this->HouseKeeping->TooltipValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";
            $this->countsCheckedMops->TooltipValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";
            $this->gauze->TooltipValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";
            $this->needles->TooltipValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";
            $this->bloodloss->TooltipValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";
            $this->bloodtransfusion->TooltipValue = "";

            // implantsUsed
            $this->implantsUsed->LinkCustomAttributes = "";
            $this->implantsUsed->HrefValue = "";
            $this->implantsUsed->TooltipValue = "";

            // MaterialsForHPE
            $this->MaterialsForHPE->LinkCustomAttributes = "";
            $this->MaterialsForHPE->HrefValue = "";
            $this->MaterialsForHPE->TooltipValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

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

            // diagnosis
            $this->diagnosis->EditAttrs["class"] = "form-control";
            $this->diagnosis->EditCustomAttributes = "";
            $this->diagnosis->EditValue = HtmlEncode($this->diagnosis->CurrentValue);
            $this->diagnosis->PlaceHolder = RemoveHtml($this->diagnosis->caption());

            // proposedSurgery
            $this->proposedSurgery->EditAttrs["class"] = "form-control";
            $this->proposedSurgery->EditCustomAttributes = "";
            $this->proposedSurgery->EditValue = HtmlEncode($this->proposedSurgery->CurrentValue);
            $this->proposedSurgery->PlaceHolder = RemoveHtml($this->proposedSurgery->caption());

            // surgeryProcedure
            $this->surgeryProcedure->EditAttrs["class"] = "form-control";
            $this->surgeryProcedure->EditCustomAttributes = "";
            $this->surgeryProcedure->EditValue = HtmlEncode($this->surgeryProcedure->CurrentValue);
            $this->surgeryProcedure->PlaceHolder = RemoveHtml($this->surgeryProcedure->caption());

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->EditAttrs["class"] = "form-control";
            $this->typeOfAnaesthesia->EditCustomAttributes = "";
            $this->typeOfAnaesthesia->EditValue = HtmlEncode($this->typeOfAnaesthesia->CurrentValue);
            $this->typeOfAnaesthesia->PlaceHolder = RemoveHtml($this->typeOfAnaesthesia->caption());

            // RecievedTime
            $this->RecievedTime->EditAttrs["class"] = "form-control";
            $this->RecievedTime->EditCustomAttributes = "";
            $this->RecievedTime->EditValue = HtmlEncode(FormatDateTime($this->RecievedTime->CurrentValue, 11));
            $this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
            $this->AnaesthesiaStarted->EditCustomAttributes = "";
            $this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11));
            $this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
            $this->AnaesthesiaEnded->EditCustomAttributes = "";
            $this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11));
            $this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

            // surgeryStarted
            $this->surgeryStarted->EditAttrs["class"] = "form-control";
            $this->surgeryStarted->EditCustomAttributes = "";
            $this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime($this->surgeryStarted->CurrentValue, 11));
            $this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

            // surgeryEnded
            $this->surgeryEnded->EditAttrs["class"] = "form-control";
            $this->surgeryEnded->EditCustomAttributes = "";
            $this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime($this->surgeryEnded->CurrentValue, 17));
            $this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

            // RecoveryTime
            $this->RecoveryTime->EditAttrs["class"] = "form-control";
            $this->RecoveryTime->EditCustomAttributes = "";
            $this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime($this->RecoveryTime->CurrentValue, 11));
            $this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

            // ShiftedTime
            $this->ShiftedTime->EditAttrs["class"] = "form-control";
            $this->ShiftedTime->EditCustomAttributes = "";
            $this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime($this->ShiftedTime->CurrentValue, 11));
            $this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

            // Duration
            $this->Duration->EditAttrs["class"] = "form-control";
            $this->Duration->EditCustomAttributes = "";
            if (!$this->Duration->Raw) {
                $this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
            }
            $this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
            $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

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

            // Anaesthetist
            $this->Anaesthetist->EditAttrs["class"] = "form-control";
            $this->Anaesthetist->EditCustomAttributes = "";
            $curVal = trim(strval($this->Anaesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
            } else {
                $this->Anaesthetist->ViewValue = $this->Anaesthetist->Lookup !== null && is_array($this->Anaesthetist->Lookup->Options) ? $curVal : null;
            }
            if ($this->Anaesthetist->ViewValue !== null) { // Load from cache
                $this->Anaesthetist->EditValue = array_values($this->Anaesthetist->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->Anaesthetist->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Anaesthetist->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Anaesthetist->EditValue = $arwrk;
            }
            $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

            // AsstSurgeon1
            $this->AsstSurgeon1->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon1->EditCustomAttributes = "";
            $curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
            } else {
                $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->Lookup !== null && is_array($this->AsstSurgeon1->Lookup->Options) ? $curVal : null;
            }
            if ($this->AsstSurgeon1->ViewValue !== null) { // Load from cache
                $this->AsstSurgeon1->EditValue = array_values($this->AsstSurgeon1->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon1->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->AsstSurgeon1->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->AsstSurgeon1->EditValue = $arwrk;
            }
            $this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

            // AsstSurgeon2
            $this->AsstSurgeon2->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon2->EditCustomAttributes = "";
            $curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
            } else {
                $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->Lookup !== null && is_array($this->AsstSurgeon2->Lookup->Options) ? $curVal : null;
            }
            if ($this->AsstSurgeon2->ViewValue !== null) { // Load from cache
                $this->AsstSurgeon2->EditValue = array_values($this->AsstSurgeon2->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon2->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->AsstSurgeon2->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->AsstSurgeon2->EditValue = $arwrk;
            }
            $this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

            // paediatric
            $this->paediatric->EditAttrs["class"] = "form-control";
            $this->paediatric->EditCustomAttributes = "";
            $curVal = trim(strval($this->paediatric->CurrentValue));
            if ($curVal != "") {
                $this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
            } else {
                $this->paediatric->ViewValue = $this->paediatric->Lookup !== null && is_array($this->paediatric->Lookup->Options) ? $curVal : null;
            }
            if ($this->paediatric->ViewValue !== null) { // Load from cache
                $this->paediatric->EditValue = array_values($this->paediatric->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->paediatric->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->paediatric->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->paediatric->EditValue = $arwrk;
            }
            $this->paediatric->PlaceHolder = RemoveHtml($this->paediatric->caption());

            // ScrubNurse1
            $this->ScrubNurse1->EditAttrs["class"] = "form-control";
            $this->ScrubNurse1->EditCustomAttributes = "";
            if (!$this->ScrubNurse1->Raw) {
                $this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
            }
            $this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->CurrentValue);
            $this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

            // ScrubNurse2
            $this->ScrubNurse2->EditAttrs["class"] = "form-control";
            $this->ScrubNurse2->EditCustomAttributes = "";
            if (!$this->ScrubNurse2->Raw) {
                $this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
            }
            $this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->CurrentValue);
            $this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

            // FloorNurse
            $this->FloorNurse->EditAttrs["class"] = "form-control";
            $this->FloorNurse->EditCustomAttributes = "";
            if (!$this->FloorNurse->Raw) {
                $this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
            }
            $this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->CurrentValue);
            $this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

            // Technician
            $this->Technician->EditAttrs["class"] = "form-control";
            $this->Technician->EditCustomAttributes = "";
            if (!$this->Technician->Raw) {
                $this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
            }
            $this->Technician->EditValue = HtmlEncode($this->Technician->CurrentValue);
            $this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

            // HouseKeeping
            $this->HouseKeeping->EditAttrs["class"] = "form-control";
            $this->HouseKeeping->EditCustomAttributes = "";
            if (!$this->HouseKeeping->Raw) {
                $this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
            }
            $this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->CurrentValue);
            $this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

            // countsCheckedMops
            $this->countsCheckedMops->EditAttrs["class"] = "form-control";
            $this->countsCheckedMops->EditCustomAttributes = "";
            if (!$this->countsCheckedMops->Raw) {
                $this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
            }
            $this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->CurrentValue);
            $this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

            // gauze
            $this->gauze->EditAttrs["class"] = "form-control";
            $this->gauze->EditCustomAttributes = "";
            if (!$this->gauze->Raw) {
                $this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
            }
            $this->gauze->EditValue = HtmlEncode($this->gauze->CurrentValue);
            $this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

            // needles
            $this->needles->EditAttrs["class"] = "form-control";
            $this->needles->EditCustomAttributes = "";
            if (!$this->needles->Raw) {
                $this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
            }
            $this->needles->EditValue = HtmlEncode($this->needles->CurrentValue);
            $this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

            // bloodloss
            $this->bloodloss->EditAttrs["class"] = "form-control";
            $this->bloodloss->EditCustomAttributes = "";
            if (!$this->bloodloss->Raw) {
                $this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
            }
            $this->bloodloss->EditValue = HtmlEncode($this->bloodloss->CurrentValue);
            $this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

            // bloodtransfusion
            $this->bloodtransfusion->EditAttrs["class"] = "form-control";
            $this->bloodtransfusion->EditCustomAttributes = "";
            if (!$this->bloodtransfusion->Raw) {
                $this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
            }
            $this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->CurrentValue);
            $this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

            // implantsUsed
            $this->implantsUsed->EditAttrs["class"] = "form-control";
            $this->implantsUsed->EditCustomAttributes = "";
            $this->implantsUsed->EditValue = HtmlEncode($this->implantsUsed->CurrentValue);
            $this->implantsUsed->PlaceHolder = RemoveHtml($this->implantsUsed->caption());

            // MaterialsForHPE
            $this->MaterialsForHPE->EditAttrs["class"] = "form-control";
            $this->MaterialsForHPE->EditCustomAttributes = "";
            $this->MaterialsForHPE->EditValue = HtmlEncode($this->MaterialsForHPE->CurrentValue);
            $this->MaterialsForHPE->PlaceHolder = RemoveHtml($this->MaterialsForHPE->caption());

            // status

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // HospID

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
                foreach ($arwrk as &$row)
                    $row = $this->PatientSearch->Lookup->renderViewRow($row);
                $this->PatientSearch->EditValue = $arwrk;
            }
            $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            if ($this->Reception->getSessionValue() != "") {
                $this->Reception->CurrentValue = GetForeignKeyValue($this->Reception->getSessionValue());
                $this->Reception->ViewValue = $this->Reception->CurrentValue;
                $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
                $this->Reception->ViewCustomAttributes = "";
            } else {
                $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
                $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
            }

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            if ($this->PId->getSessionValue() != "") {
                $this->PId->CurrentValue = GetForeignKeyValue($this->PId->getSessionValue());
                $this->PId->ViewValue = $this->PId->CurrentValue;
                $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
                $this->PId->ViewCustomAttributes = "";
            } else {
                $this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
                $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
            }

            // Add refer script

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // diagnosis
            $this->diagnosis->LinkCustomAttributes = "";
            $this->diagnosis->HrefValue = "";

            // proposedSurgery
            $this->proposedSurgery->LinkCustomAttributes = "";
            $this->proposedSurgery->HrefValue = "";

            // surgeryProcedure
            $this->surgeryProcedure->LinkCustomAttributes = "";
            $this->surgeryProcedure->HrefValue = "";

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->LinkCustomAttributes = "";
            $this->typeOfAnaesthesia->HrefValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";

            // implantsUsed
            $this->implantsUsed->LinkCustomAttributes = "";
            $this->implantsUsed->HrefValue = "";

            // MaterialsForHPE
            $this->MaterialsForHPE->LinkCustomAttributes = "";
            $this->MaterialsForHPE->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
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
        if ($this->diagnosis->Required) {
            if (!$this->diagnosis->IsDetailKey && EmptyValue($this->diagnosis->FormValue)) {
                $this->diagnosis->addErrorMessage(str_replace("%s", $this->diagnosis->caption(), $this->diagnosis->RequiredErrorMessage));
            }
        }
        if ($this->proposedSurgery->Required) {
            if (!$this->proposedSurgery->IsDetailKey && EmptyValue($this->proposedSurgery->FormValue)) {
                $this->proposedSurgery->addErrorMessage(str_replace("%s", $this->proposedSurgery->caption(), $this->proposedSurgery->RequiredErrorMessage));
            }
        }
        if ($this->surgeryProcedure->Required) {
            if (!$this->surgeryProcedure->IsDetailKey && EmptyValue($this->surgeryProcedure->FormValue)) {
                $this->surgeryProcedure->addErrorMessage(str_replace("%s", $this->surgeryProcedure->caption(), $this->surgeryProcedure->RequiredErrorMessage));
            }
        }
        if ($this->typeOfAnaesthesia->Required) {
            if (!$this->typeOfAnaesthesia->IsDetailKey && EmptyValue($this->typeOfAnaesthesia->FormValue)) {
                $this->typeOfAnaesthesia->addErrorMessage(str_replace("%s", $this->typeOfAnaesthesia->caption(), $this->typeOfAnaesthesia->RequiredErrorMessage));
            }
        }
        if ($this->RecievedTime->Required) {
            if (!$this->RecievedTime->IsDetailKey && EmptyValue($this->RecievedTime->FormValue)) {
                $this->RecievedTime->addErrorMessage(str_replace("%s", $this->RecievedTime->caption(), $this->RecievedTime->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->RecievedTime->FormValue)) {
            $this->RecievedTime->addErrorMessage($this->RecievedTime->getErrorMessage(false));
        }
        if ($this->AnaesthesiaStarted->Required) {
            if (!$this->AnaesthesiaStarted->IsDetailKey && EmptyValue($this->AnaesthesiaStarted->FormValue)) {
                $this->AnaesthesiaStarted->addErrorMessage(str_replace("%s", $this->AnaesthesiaStarted->caption(), $this->AnaesthesiaStarted->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->AnaesthesiaStarted->FormValue)) {
            $this->AnaesthesiaStarted->addErrorMessage($this->AnaesthesiaStarted->getErrorMessage(false));
        }
        if ($this->AnaesthesiaEnded->Required) {
            if (!$this->AnaesthesiaEnded->IsDetailKey && EmptyValue($this->AnaesthesiaEnded->FormValue)) {
                $this->AnaesthesiaEnded->addErrorMessage(str_replace("%s", $this->AnaesthesiaEnded->caption(), $this->AnaesthesiaEnded->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->AnaesthesiaEnded->FormValue)) {
            $this->AnaesthesiaEnded->addErrorMessage($this->AnaesthesiaEnded->getErrorMessage(false));
        }
        if ($this->surgeryStarted->Required) {
            if (!$this->surgeryStarted->IsDetailKey && EmptyValue($this->surgeryStarted->FormValue)) {
                $this->surgeryStarted->addErrorMessage(str_replace("%s", $this->surgeryStarted->caption(), $this->surgeryStarted->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->surgeryStarted->FormValue)) {
            $this->surgeryStarted->addErrorMessage($this->surgeryStarted->getErrorMessage(false));
        }
        if ($this->surgeryEnded->Required) {
            if (!$this->surgeryEnded->IsDetailKey && EmptyValue($this->surgeryEnded->FormValue)) {
                $this->surgeryEnded->addErrorMessage(str_replace("%s", $this->surgeryEnded->caption(), $this->surgeryEnded->RequiredErrorMessage));
            }
        }
        if (!CheckShortEuroDate($this->surgeryEnded->FormValue)) {
            $this->surgeryEnded->addErrorMessage($this->surgeryEnded->getErrorMessage(false));
        }
        if ($this->RecoveryTime->Required) {
            if (!$this->RecoveryTime->IsDetailKey && EmptyValue($this->RecoveryTime->FormValue)) {
                $this->RecoveryTime->addErrorMessage(str_replace("%s", $this->RecoveryTime->caption(), $this->RecoveryTime->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->RecoveryTime->FormValue)) {
            $this->RecoveryTime->addErrorMessage($this->RecoveryTime->getErrorMessage(false));
        }
        if ($this->ShiftedTime->Required) {
            if (!$this->ShiftedTime->IsDetailKey && EmptyValue($this->ShiftedTime->FormValue)) {
                $this->ShiftedTime->addErrorMessage(str_replace("%s", $this->ShiftedTime->caption(), $this->ShiftedTime->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->ShiftedTime->FormValue)) {
            $this->ShiftedTime->addErrorMessage($this->ShiftedTime->getErrorMessage(false));
        }
        if ($this->Duration->Required) {
            if (!$this->Duration->IsDetailKey && EmptyValue($this->Duration->FormValue)) {
                $this->Duration->addErrorMessage(str_replace("%s", $this->Duration->caption(), $this->Duration->RequiredErrorMessage));
            }
        }
        if ($this->Surgeon->Required) {
            if (!$this->Surgeon->IsDetailKey && EmptyValue($this->Surgeon->FormValue)) {
                $this->Surgeon->addErrorMessage(str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
            }
        }
        if ($this->Anaesthetist->Required) {
            if (!$this->Anaesthetist->IsDetailKey && EmptyValue($this->Anaesthetist->FormValue)) {
                $this->Anaesthetist->addErrorMessage(str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
            }
        }
        if ($this->AsstSurgeon1->Required) {
            if (!$this->AsstSurgeon1->IsDetailKey && EmptyValue($this->AsstSurgeon1->FormValue)) {
                $this->AsstSurgeon1->addErrorMessage(str_replace("%s", $this->AsstSurgeon1->caption(), $this->AsstSurgeon1->RequiredErrorMessage));
            }
        }
        if ($this->AsstSurgeon2->Required) {
            if (!$this->AsstSurgeon2->IsDetailKey && EmptyValue($this->AsstSurgeon2->FormValue)) {
                $this->AsstSurgeon2->addErrorMessage(str_replace("%s", $this->AsstSurgeon2->caption(), $this->AsstSurgeon2->RequiredErrorMessage));
            }
        }
        if ($this->paediatric->Required) {
            if (!$this->paediatric->IsDetailKey && EmptyValue($this->paediatric->FormValue)) {
                $this->paediatric->addErrorMessage(str_replace("%s", $this->paediatric->caption(), $this->paediatric->RequiredErrorMessage));
            }
        }
        if ($this->ScrubNurse1->Required) {
            if (!$this->ScrubNurse1->IsDetailKey && EmptyValue($this->ScrubNurse1->FormValue)) {
                $this->ScrubNurse1->addErrorMessage(str_replace("%s", $this->ScrubNurse1->caption(), $this->ScrubNurse1->RequiredErrorMessage));
            }
        }
        if ($this->ScrubNurse2->Required) {
            if (!$this->ScrubNurse2->IsDetailKey && EmptyValue($this->ScrubNurse2->FormValue)) {
                $this->ScrubNurse2->addErrorMessage(str_replace("%s", $this->ScrubNurse2->caption(), $this->ScrubNurse2->RequiredErrorMessage));
            }
        }
        if ($this->FloorNurse->Required) {
            if (!$this->FloorNurse->IsDetailKey && EmptyValue($this->FloorNurse->FormValue)) {
                $this->FloorNurse->addErrorMessage(str_replace("%s", $this->FloorNurse->caption(), $this->FloorNurse->RequiredErrorMessage));
            }
        }
        if ($this->Technician->Required) {
            if (!$this->Technician->IsDetailKey && EmptyValue($this->Technician->FormValue)) {
                $this->Technician->addErrorMessage(str_replace("%s", $this->Technician->caption(), $this->Technician->RequiredErrorMessage));
            }
        }
        if ($this->HouseKeeping->Required) {
            if (!$this->HouseKeeping->IsDetailKey && EmptyValue($this->HouseKeeping->FormValue)) {
                $this->HouseKeeping->addErrorMessage(str_replace("%s", $this->HouseKeeping->caption(), $this->HouseKeeping->RequiredErrorMessage));
            }
        }
        if ($this->countsCheckedMops->Required) {
            if (!$this->countsCheckedMops->IsDetailKey && EmptyValue($this->countsCheckedMops->FormValue)) {
                $this->countsCheckedMops->addErrorMessage(str_replace("%s", $this->countsCheckedMops->caption(), $this->countsCheckedMops->RequiredErrorMessage));
            }
        }
        if ($this->gauze->Required) {
            if (!$this->gauze->IsDetailKey && EmptyValue($this->gauze->FormValue)) {
                $this->gauze->addErrorMessage(str_replace("%s", $this->gauze->caption(), $this->gauze->RequiredErrorMessage));
            }
        }
        if ($this->needles->Required) {
            if (!$this->needles->IsDetailKey && EmptyValue($this->needles->FormValue)) {
                $this->needles->addErrorMessage(str_replace("%s", $this->needles->caption(), $this->needles->RequiredErrorMessage));
            }
        }
        if ($this->bloodloss->Required) {
            if (!$this->bloodloss->IsDetailKey && EmptyValue($this->bloodloss->FormValue)) {
                $this->bloodloss->addErrorMessage(str_replace("%s", $this->bloodloss->caption(), $this->bloodloss->RequiredErrorMessage));
            }
        }
        if ($this->bloodtransfusion->Required) {
            if (!$this->bloodtransfusion->IsDetailKey && EmptyValue($this->bloodtransfusion->FormValue)) {
                $this->bloodtransfusion->addErrorMessage(str_replace("%s", $this->bloodtransfusion->caption(), $this->bloodtransfusion->RequiredErrorMessage));
            }
        }
        if ($this->implantsUsed->Required) {
            if (!$this->implantsUsed->IsDetailKey && EmptyValue($this->implantsUsed->FormValue)) {
                $this->implantsUsed->addErrorMessage(str_replace("%s", $this->implantsUsed->caption(), $this->implantsUsed->RequiredErrorMessage));
            }
        }
        if ($this->MaterialsForHPE->Required) {
            if (!$this->MaterialsForHPE->IsDetailKey && EmptyValue($this->MaterialsForHPE->FormValue)) {
                $this->MaterialsForHPE->addErrorMessage(str_replace("%s", $this->MaterialsForHPE->caption(), $this->MaterialsForHPE->RequiredErrorMessage));
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
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->PatientSearch->Required) {
            if (!$this->PatientSearch->IsDetailKey && EmptyValue($this->PatientSearch->FormValue)) {
                $this->PatientSearch->addErrorMessage(str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
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
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->PId->Required) {
            if (!$this->PId->IsDetailKey && EmptyValue($this->PId->FormValue)) {
                $this->PId->addErrorMessage(str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PId->FormValue)) {
            $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
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

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // MobileNumber
        $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // diagnosis
        $this->diagnosis->setDbValueDef($rsnew, $this->diagnosis->CurrentValue, null, false);

        // proposedSurgery
        $this->proposedSurgery->setDbValueDef($rsnew, $this->proposedSurgery->CurrentValue, null, false);

        // surgeryProcedure
        $this->surgeryProcedure->setDbValueDef($rsnew, $this->surgeryProcedure->CurrentValue, null, false);

        // typeOfAnaesthesia
        $this->typeOfAnaesthesia->setDbValueDef($rsnew, $this->typeOfAnaesthesia->CurrentValue, null, false);

        // RecievedTime
        $this->RecievedTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecievedTime->CurrentValue, 11), null, false);

        // AnaesthesiaStarted
        $this->AnaesthesiaStarted->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11), null, false);

        // AnaesthesiaEnded
        $this->AnaesthesiaEnded->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11), null, false);

        // surgeryStarted
        $this->surgeryStarted->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryStarted->CurrentValue, 11), null, false);

        // surgeryEnded
        $this->surgeryEnded->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryEnded->CurrentValue, 17), null, false);

        // RecoveryTime
        $this->RecoveryTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecoveryTime->CurrentValue, 11), null, false);

        // ShiftedTime
        $this->ShiftedTime->setDbValueDef($rsnew, UnFormatDateTime($this->ShiftedTime->CurrentValue, 11), null, false);

        // Duration
        $this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, null, false);

        // Surgeon
        $this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, null, false);

        // Anaesthetist
        $this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, null, false);

        // AsstSurgeon1
        $this->AsstSurgeon1->setDbValueDef($rsnew, $this->AsstSurgeon1->CurrentValue, null, false);

        // AsstSurgeon2
        $this->AsstSurgeon2->setDbValueDef($rsnew, $this->AsstSurgeon2->CurrentValue, null, false);

        // paediatric
        $this->paediatric->setDbValueDef($rsnew, $this->paediatric->CurrentValue, null, false);

        // ScrubNurse1
        $this->ScrubNurse1->setDbValueDef($rsnew, $this->ScrubNurse1->CurrentValue, null, false);

        // ScrubNurse2
        $this->ScrubNurse2->setDbValueDef($rsnew, $this->ScrubNurse2->CurrentValue, null, false);

        // FloorNurse
        $this->FloorNurse->setDbValueDef($rsnew, $this->FloorNurse->CurrentValue, null, false);

        // Technician
        $this->Technician->setDbValueDef($rsnew, $this->Technician->CurrentValue, null, false);

        // HouseKeeping
        $this->HouseKeeping->setDbValueDef($rsnew, $this->HouseKeeping->CurrentValue, null, false);

        // countsCheckedMops
        $this->countsCheckedMops->setDbValueDef($rsnew, $this->countsCheckedMops->CurrentValue, null, false);

        // gauze
        $this->gauze->setDbValueDef($rsnew, $this->gauze->CurrentValue, null, false);

        // needles
        $this->needles->setDbValueDef($rsnew, $this->needles->CurrentValue, null, false);

        // bloodloss
        $this->bloodloss->setDbValueDef($rsnew, $this->bloodloss->CurrentValue, null, false);

        // bloodtransfusion
        $this->bloodtransfusion->setDbValueDef($rsnew, $this->bloodtransfusion->CurrentValue, null, false);

        // implantsUsed
        $this->implantsUsed->setDbValueDef($rsnew, $this->implantsUsed->CurrentValue, null, false);

        // MaterialsForHPE
        $this->MaterialsForHPE->setDbValueDef($rsnew, $this->MaterialsForHPE->CurrentValue, null, false);

        // status
        $this->status->CurrentValue = ActiveStatusbit();
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // modifiedby
        $this->modifiedby->CurrentValue = CurrentUserName();
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

        // modifieddatetime
        $this->modifieddatetime->CurrentValue = CurrentDateTime();
        $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // PatientSearch
        $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", false);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // PId
        $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, false);

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
                if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setQueryStringValue($parm);
                    $this->mrnno->setQueryStringValue($masterTbl->mrnNo->QueryStringValue);
                    $this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_patient_id", Get("PId"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PId->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PId->setSessionValue($this->PId->QueryStringValue);
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
                if (($parm = Post("fk_patient_id", Post("PId"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PId->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PId->setSessionValue($this->PId->FormValue);
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
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
                }
                if ($this->PId->CurrentValue == "") {
                    $this->PId->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientOtSurgeryRegisterList"), "", $this->TableVar, true);
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
                case "x_Surgeon":
                    break;
                case "x_Anaesthetist":
                    break;
                case "x_AsstSurgeon1":
                    break;
                case "x_AsstSurgeon2":
                    break;
                case "x_paediatric":
                    break;
                case "x_PatientSearch":
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
    public function pageRedirecting(&$url) {
    	// Example:
    	//$url = "your URL";
    	$dbhelper = &DbHelper();
    	$Tid = $_POST["fk_patient_id"] ;
    	$Reception = $_POST["fk_id"] ;
    	$PatientId = $_POST["fk_patient_id"] ;
    	$mrnno = $_POST["fk_mrnNo"] ;
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}		
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}		
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$PageReDirect = $_POST["Repagehistoryview"];
    	if($PageReDirect == "patientvitals")
    	{
       	  $url = $vitalsURL;
    	}
    	if($PageReDirect == "patienthistory")
    	{
       	  $url = $historyURL;
    	}
    	if($PageReDirect == "patientprovisionaldiagnosis")
    	{
       	  $url = $provisionaldiagnosisURL;
    	}
    	 if($PageReDirect == "patientprescription")
    	{
       	  $url = $prescriptionURL;
    	} 
    	if($PageReDirect == "patientfinaldiagnosis")
    	{
       	  $url = $finaldiagnosisURL;
    	}
    	if($PageReDirect == "patientfollowup")
    	{
       	  $url = $followupURL;
    	}
    	if($PageReDirect == "patientotdeliveryregister")
    	{
       	  $url = $deliveryregisterURL;
    	}
    	if($PageReDirect == "patientotsurgeryregister")
    	{
       	  $url = $surgeryregisterURL;
    	}
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
