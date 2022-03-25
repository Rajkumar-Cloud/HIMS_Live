<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOtDeliveryRegisterEdit extends PatientOtDeliveryRegister
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_ot_delivery_register';

    // Page object name
    public $PageObjName = "PatientOtDeliveryRegisterEdit";

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

        // Table object (patient_ot_delivery_register)
        if (!isset($GLOBALS["patient_ot_delivery_register"]) || get_class($GLOBALS["patient_ot_delivery_register"]) == PROJECT_NAMESPACE . "patient_ot_delivery_register") {
            $GLOBALS["patient_ot_delivery_register"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_delivery_register');
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
                $doc = new $class(Container("patient_ot_delivery_register"));
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
                    if ($pageName == "PatientOtDeliveryRegisterView") {
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
        $this->PatID->setVisibility();
        $this->PatientName->setVisibility();
        $this->mrnno->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->ObstetricsHistryMale->Visible = false;
        $this->ObstetricsHistryFeMale->setVisibility();
        $this->Abortion->setVisibility();
        $this->ChildBirthDate->setVisibility();
        $this->ChildBirthTime->setVisibility();
        $this->ChildSex->setVisibility();
        $this->ChildWt->setVisibility();
        $this->ChildDay->setVisibility();
        $this->ChildOE->setVisibility();
        $this->TypeofDelivery->setVisibility();
        $this->ChildBlGrp->setVisibility();
        $this->ApgarScore->setVisibility();
        $this->birthnotification->setVisibility();
        $this->formno->setVisibility();
        $this->dte->setVisibility();
        $this->motherReligion->setVisibility();
        $this->bloodgroup->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->ChildBirthDate1->setVisibility();
        $this->ChildBirthTime1->setVisibility();
        $this->ChildSex1->setVisibility();
        $this->ChildWt1->setVisibility();
        $this->ChildDay1->setVisibility();
        $this->ChildOE1->setVisibility();
        $this->TypeofDelivery1->setVisibility();
        $this->ChildBlGrp1->setVisibility();
        $this->ApgarScore1->setVisibility();
        $this->birthnotification1->setVisibility();
        $this->formno1->setVisibility();
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
        $this->DrVisit1->setVisibility();
        $this->DrVisit2->setVisibility();
        $this->DrVisit3->setVisibility();
        $this->DrVisit4->setVisibility();
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
        $this->Reception->setVisibility();
        $this->PId->setVisibility();
        $this->PatientSearch->setVisibility();
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
        $this->setupLookupOptions($this->DrVisit1);
        $this->setupLookupOptions($this->DrVisit2);
        $this->setupLookupOptions($this->DrVisit3);
        $this->setupLookupOptions($this->DrVisit4);
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
                    $this->terminate("PatientOtDeliveryRegisterList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientOtDeliveryRegisterList") {
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

        // Check field name 'ObstetricsHistryFeMale' first before field var 'x_ObstetricsHistryFeMale'
        $val = $CurrentForm->hasValue("ObstetricsHistryFeMale") ? $CurrentForm->getValue("ObstetricsHistryFeMale") : $CurrentForm->getValue("x_ObstetricsHistryFeMale");
        if (!$this->ObstetricsHistryFeMale->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ObstetricsHistryFeMale->Visible = false; // Disable update for API request
            } else {
                $this->ObstetricsHistryFeMale->setFormValue($val);
            }
        }

        // Check field name 'Abortion' first before field var 'x_Abortion'
        $val = $CurrentForm->hasValue("Abortion") ? $CurrentForm->getValue("Abortion") : $CurrentForm->getValue("x_Abortion");
        if (!$this->Abortion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abortion->Visible = false; // Disable update for API request
            } else {
                $this->Abortion->setFormValue($val);
            }
        }

        // Check field name 'ChildBirthDate' first before field var 'x_ChildBirthDate'
        $val = $CurrentForm->hasValue("ChildBirthDate") ? $CurrentForm->getValue("ChildBirthDate") : $CurrentForm->getValue("x_ChildBirthDate");
        if (!$this->ChildBirthDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildBirthDate->Visible = false; // Disable update for API request
            } else {
                $this->ChildBirthDate->setFormValue($val);
            }
            $this->ChildBirthDate->CurrentValue = UnFormatDateTime($this->ChildBirthDate->CurrentValue, 7);
        }

        // Check field name 'ChildBirthTime' first before field var 'x_ChildBirthTime'
        $val = $CurrentForm->hasValue("ChildBirthTime") ? $CurrentForm->getValue("ChildBirthTime") : $CurrentForm->getValue("x_ChildBirthTime");
        if (!$this->ChildBirthTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildBirthTime->Visible = false; // Disable update for API request
            } else {
                $this->ChildBirthTime->setFormValue($val);
            }
        }

        // Check field name 'ChildSex' first before field var 'x_ChildSex'
        $val = $CurrentForm->hasValue("ChildSex") ? $CurrentForm->getValue("ChildSex") : $CurrentForm->getValue("x_ChildSex");
        if (!$this->ChildSex->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildSex->Visible = false; // Disable update for API request
            } else {
                $this->ChildSex->setFormValue($val);
            }
        }

        // Check field name 'ChildWt' first before field var 'x_ChildWt'
        $val = $CurrentForm->hasValue("ChildWt") ? $CurrentForm->getValue("ChildWt") : $CurrentForm->getValue("x_ChildWt");
        if (!$this->ChildWt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildWt->Visible = false; // Disable update for API request
            } else {
                $this->ChildWt->setFormValue($val);
            }
        }

        // Check field name 'ChildDay' first before field var 'x_ChildDay'
        $val = $CurrentForm->hasValue("ChildDay") ? $CurrentForm->getValue("ChildDay") : $CurrentForm->getValue("x_ChildDay");
        if (!$this->ChildDay->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildDay->Visible = false; // Disable update for API request
            } else {
                $this->ChildDay->setFormValue($val);
            }
        }

        // Check field name 'ChildOE' first before field var 'x_ChildOE'
        $val = $CurrentForm->hasValue("ChildOE") ? $CurrentForm->getValue("ChildOE") : $CurrentForm->getValue("x_ChildOE");
        if (!$this->ChildOE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildOE->Visible = false; // Disable update for API request
            } else {
                $this->ChildOE->setFormValue($val);
            }
        }

        // Check field name 'TypeofDelivery' first before field var 'x_TypeofDelivery'
        $val = $CurrentForm->hasValue("TypeofDelivery") ? $CurrentForm->getValue("TypeofDelivery") : $CurrentForm->getValue("x_TypeofDelivery");
        if (!$this->TypeofDelivery->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeofDelivery->Visible = false; // Disable update for API request
            } else {
                $this->TypeofDelivery->setFormValue($val);
            }
        }

        // Check field name 'ChildBlGrp' first before field var 'x_ChildBlGrp'
        $val = $CurrentForm->hasValue("ChildBlGrp") ? $CurrentForm->getValue("ChildBlGrp") : $CurrentForm->getValue("x_ChildBlGrp");
        if (!$this->ChildBlGrp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildBlGrp->Visible = false; // Disable update for API request
            } else {
                $this->ChildBlGrp->setFormValue($val);
            }
        }

        // Check field name 'ApgarScore' first before field var 'x_ApgarScore'
        $val = $CurrentForm->hasValue("ApgarScore") ? $CurrentForm->getValue("ApgarScore") : $CurrentForm->getValue("x_ApgarScore");
        if (!$this->ApgarScore->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ApgarScore->Visible = false; // Disable update for API request
            } else {
                $this->ApgarScore->setFormValue($val);
            }
        }

        // Check field name 'birthnotification' first before field var 'x_birthnotification'
        $val = $CurrentForm->hasValue("birthnotification") ? $CurrentForm->getValue("birthnotification") : $CurrentForm->getValue("x_birthnotification");
        if (!$this->birthnotification->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->birthnotification->Visible = false; // Disable update for API request
            } else {
                $this->birthnotification->setFormValue($val);
            }
        }

        // Check field name 'formno' first before field var 'x_formno'
        $val = $CurrentForm->hasValue("formno") ? $CurrentForm->getValue("formno") : $CurrentForm->getValue("x_formno");
        if (!$this->formno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->formno->Visible = false; // Disable update for API request
            } else {
                $this->formno->setFormValue($val);
            }
        }

        // Check field name 'dte' first before field var 'x_dte'
        $val = $CurrentForm->hasValue("dte") ? $CurrentForm->getValue("dte") : $CurrentForm->getValue("x_dte");
        if (!$this->dte->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->dte->Visible = false; // Disable update for API request
            } else {
                $this->dte->setFormValue($val);
            }
            $this->dte->CurrentValue = UnFormatDateTime($this->dte->CurrentValue, 0);
        }

        // Check field name 'motherReligion' first before field var 'x_motherReligion'
        $val = $CurrentForm->hasValue("motherReligion") ? $CurrentForm->getValue("motherReligion") : $CurrentForm->getValue("x_motherReligion");
        if (!$this->motherReligion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->motherReligion->Visible = false; // Disable update for API request
            } else {
                $this->motherReligion->setFormValue($val);
            }
        }

        // Check field name 'bloodgroup' first before field var 'x_bloodgroup'
        $val = $CurrentForm->hasValue("bloodgroup") ? $CurrentForm->getValue("bloodgroup") : $CurrentForm->getValue("x_bloodgroup");
        if (!$this->bloodgroup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bloodgroup->Visible = false; // Disable update for API request
            } else {
                $this->bloodgroup->setFormValue($val);
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

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
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

        // Check field name 'ChildBirthDate1' first before field var 'x_ChildBirthDate1'
        $val = $CurrentForm->hasValue("ChildBirthDate1") ? $CurrentForm->getValue("ChildBirthDate1") : $CurrentForm->getValue("x_ChildBirthDate1");
        if (!$this->ChildBirthDate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildBirthDate1->Visible = false; // Disable update for API request
            } else {
                $this->ChildBirthDate1->setFormValue($val);
            }
            $this->ChildBirthDate1->CurrentValue = UnFormatDateTime($this->ChildBirthDate1->CurrentValue, 0);
        }

        // Check field name 'ChildBirthTime1' first before field var 'x_ChildBirthTime1'
        $val = $CurrentForm->hasValue("ChildBirthTime1") ? $CurrentForm->getValue("ChildBirthTime1") : $CurrentForm->getValue("x_ChildBirthTime1");
        if (!$this->ChildBirthTime1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildBirthTime1->Visible = false; // Disable update for API request
            } else {
                $this->ChildBirthTime1->setFormValue($val);
            }
        }

        // Check field name 'ChildSex1' first before field var 'x_ChildSex1'
        $val = $CurrentForm->hasValue("ChildSex1") ? $CurrentForm->getValue("ChildSex1") : $CurrentForm->getValue("x_ChildSex1");
        if (!$this->ChildSex1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildSex1->Visible = false; // Disable update for API request
            } else {
                $this->ChildSex1->setFormValue($val);
            }
        }

        // Check field name 'ChildWt1' first before field var 'x_ChildWt1'
        $val = $CurrentForm->hasValue("ChildWt1") ? $CurrentForm->getValue("ChildWt1") : $CurrentForm->getValue("x_ChildWt1");
        if (!$this->ChildWt1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildWt1->Visible = false; // Disable update for API request
            } else {
                $this->ChildWt1->setFormValue($val);
            }
        }

        // Check field name 'ChildDay1' first before field var 'x_ChildDay1'
        $val = $CurrentForm->hasValue("ChildDay1") ? $CurrentForm->getValue("ChildDay1") : $CurrentForm->getValue("x_ChildDay1");
        if (!$this->ChildDay1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildDay1->Visible = false; // Disable update for API request
            } else {
                $this->ChildDay1->setFormValue($val);
            }
        }

        // Check field name 'ChildOE1' first before field var 'x_ChildOE1'
        $val = $CurrentForm->hasValue("ChildOE1") ? $CurrentForm->getValue("ChildOE1") : $CurrentForm->getValue("x_ChildOE1");
        if (!$this->ChildOE1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildOE1->Visible = false; // Disable update for API request
            } else {
                $this->ChildOE1->setFormValue($val);
            }
        }

        // Check field name 'TypeofDelivery1' first before field var 'x_TypeofDelivery1'
        $val = $CurrentForm->hasValue("TypeofDelivery1") ? $CurrentForm->getValue("TypeofDelivery1") : $CurrentForm->getValue("x_TypeofDelivery1");
        if (!$this->TypeofDelivery1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeofDelivery1->Visible = false; // Disable update for API request
            } else {
                $this->TypeofDelivery1->setFormValue($val);
            }
        }

        // Check field name 'ChildBlGrp1' first before field var 'x_ChildBlGrp1'
        $val = $CurrentForm->hasValue("ChildBlGrp1") ? $CurrentForm->getValue("ChildBlGrp1") : $CurrentForm->getValue("x_ChildBlGrp1");
        if (!$this->ChildBlGrp1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChildBlGrp1->Visible = false; // Disable update for API request
            } else {
                $this->ChildBlGrp1->setFormValue($val);
            }
        }

        // Check field name 'ApgarScore1' first before field var 'x_ApgarScore1'
        $val = $CurrentForm->hasValue("ApgarScore1") ? $CurrentForm->getValue("ApgarScore1") : $CurrentForm->getValue("x_ApgarScore1");
        if (!$this->ApgarScore1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ApgarScore1->Visible = false; // Disable update for API request
            } else {
                $this->ApgarScore1->setFormValue($val);
            }
        }

        // Check field name 'birthnotification1' first before field var 'x_birthnotification1'
        $val = $CurrentForm->hasValue("birthnotification1") ? $CurrentForm->getValue("birthnotification1") : $CurrentForm->getValue("x_birthnotification1");
        if (!$this->birthnotification1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->birthnotification1->Visible = false; // Disable update for API request
            } else {
                $this->birthnotification1->setFormValue($val);
            }
        }

        // Check field name 'formno1' first before field var 'x_formno1'
        $val = $CurrentForm->hasValue("formno1") ? $CurrentForm->getValue("formno1") : $CurrentForm->getValue("x_formno1");
        if (!$this->formno1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->formno1->Visible = false; // Disable update for API request
            } else {
                $this->formno1->setFormValue($val);
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
            $this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 11);
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

        // Check field name 'DrVisit1' first before field var 'x_DrVisit1'
        $val = $CurrentForm->hasValue("DrVisit1") ? $CurrentForm->getValue("DrVisit1") : $CurrentForm->getValue("x_DrVisit1");
        if (!$this->DrVisit1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrVisit1->Visible = false; // Disable update for API request
            } else {
                $this->DrVisit1->setFormValue($val);
            }
        }

        // Check field name 'DrVisit2' first before field var 'x_DrVisit2'
        $val = $CurrentForm->hasValue("DrVisit2") ? $CurrentForm->getValue("DrVisit2") : $CurrentForm->getValue("x_DrVisit2");
        if (!$this->DrVisit2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrVisit2->Visible = false; // Disable update for API request
            } else {
                $this->DrVisit2->setFormValue($val);
            }
        }

        // Check field name 'DrVisit3' first before field var 'x_DrVisit3'
        $val = $CurrentForm->hasValue("DrVisit3") ? $CurrentForm->getValue("DrVisit3") : $CurrentForm->getValue("x_DrVisit3");
        if (!$this->DrVisit3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrVisit3->Visible = false; // Disable update for API request
            } else {
                $this->DrVisit3->setFormValue($val);
            }
        }

        // Check field name 'DrVisit4' first before field var 'x_DrVisit4'
        $val = $CurrentForm->hasValue("DrVisit4") ? $CurrentForm->getValue("DrVisit4") : $CurrentForm->getValue("x_DrVisit4");
        if (!$this->DrVisit4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrVisit4->Visible = false; // Disable update for API request
            } else {
                $this->DrVisit4->setFormValue($val);
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
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

        // Check field name 'PatientSearch' first before field var 'x_PatientSearch'
        $val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
        if (!$this->PatientSearch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientSearch->Visible = false; // Disable update for API request
            } else {
                $this->PatientSearch->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->ObstetricsHistryFeMale->CurrentValue = $this->ObstetricsHistryFeMale->FormValue;
        $this->Abortion->CurrentValue = $this->Abortion->FormValue;
        $this->ChildBirthDate->CurrentValue = $this->ChildBirthDate->FormValue;
        $this->ChildBirthDate->CurrentValue = UnFormatDateTime($this->ChildBirthDate->CurrentValue, 7);
        $this->ChildBirthTime->CurrentValue = $this->ChildBirthTime->FormValue;
        $this->ChildSex->CurrentValue = $this->ChildSex->FormValue;
        $this->ChildWt->CurrentValue = $this->ChildWt->FormValue;
        $this->ChildDay->CurrentValue = $this->ChildDay->FormValue;
        $this->ChildOE->CurrentValue = $this->ChildOE->FormValue;
        $this->TypeofDelivery->CurrentValue = $this->TypeofDelivery->FormValue;
        $this->ChildBlGrp->CurrentValue = $this->ChildBlGrp->FormValue;
        $this->ApgarScore->CurrentValue = $this->ApgarScore->FormValue;
        $this->birthnotification->CurrentValue = $this->birthnotification->FormValue;
        $this->formno->CurrentValue = $this->formno->FormValue;
        $this->dte->CurrentValue = $this->dte->FormValue;
        $this->dte->CurrentValue = UnFormatDateTime($this->dte->CurrentValue, 0);
        $this->motherReligion->CurrentValue = $this->motherReligion->FormValue;
        $this->bloodgroup->CurrentValue = $this->bloodgroup->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->ChildBirthDate1->CurrentValue = $this->ChildBirthDate1->FormValue;
        $this->ChildBirthDate1->CurrentValue = UnFormatDateTime($this->ChildBirthDate1->CurrentValue, 0);
        $this->ChildBirthTime1->CurrentValue = $this->ChildBirthTime1->FormValue;
        $this->ChildSex1->CurrentValue = $this->ChildSex1->FormValue;
        $this->ChildWt1->CurrentValue = $this->ChildWt1->FormValue;
        $this->ChildDay1->CurrentValue = $this->ChildDay1->FormValue;
        $this->ChildOE1->CurrentValue = $this->ChildOE1->FormValue;
        $this->TypeofDelivery1->CurrentValue = $this->TypeofDelivery1->FormValue;
        $this->ChildBlGrp1->CurrentValue = $this->ChildBlGrp1->FormValue;
        $this->ApgarScore1->CurrentValue = $this->ApgarScore1->FormValue;
        $this->birthnotification1->CurrentValue = $this->birthnotification1->FormValue;
        $this->formno1->CurrentValue = $this->formno1->FormValue;
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
        $this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 11);
        $this->RecoveryTime->CurrentValue = $this->RecoveryTime->FormValue;
        $this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
        $this->ShiftedTime->CurrentValue = $this->ShiftedTime->FormValue;
        $this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
        $this->Duration->CurrentValue = $this->Duration->FormValue;
        $this->DrVisit1->CurrentValue = $this->DrVisit1->FormValue;
        $this->DrVisit2->CurrentValue = $this->DrVisit2->FormValue;
        $this->DrVisit3->CurrentValue = $this->DrVisit3->FormValue;
        $this->DrVisit4->CurrentValue = $this->DrVisit4->FormValue;
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
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PId->CurrentValue = $this->PId->FormValue;
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
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
        $this->ObstetricsHistryMale->setDbValue($row['ObstetricsHistryMale']);
        $this->ObstetricsHistryFeMale->setDbValue($row['ObstetricsHistryFeMale']);
        $this->Abortion->setDbValue($row['Abortion']);
        $this->ChildBirthDate->setDbValue($row['ChildBirthDate']);
        $this->ChildBirthTime->setDbValue($row['ChildBirthTime']);
        $this->ChildSex->setDbValue($row['ChildSex']);
        $this->ChildWt->setDbValue($row['ChildWt']);
        $this->ChildDay->setDbValue($row['ChildDay']);
        $this->ChildOE->setDbValue($row['ChildOE']);
        $this->TypeofDelivery->setDbValue($row['TypeofDelivery']);
        $this->ChildBlGrp->setDbValue($row['ChildBlGrp']);
        $this->ApgarScore->setDbValue($row['ApgarScore']);
        $this->birthnotification->setDbValue($row['birthnotification']);
        $this->formno->setDbValue($row['formno']);
        $this->dte->setDbValue($row['dte']);
        $this->motherReligion->setDbValue($row['motherReligion']);
        $this->bloodgroup->setDbValue($row['bloodgroup']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ChildBirthDate1->setDbValue($row['ChildBirthDate1']);
        $this->ChildBirthTime1->setDbValue($row['ChildBirthTime1']);
        $this->ChildSex1->setDbValue($row['ChildSex1']);
        $this->ChildWt1->setDbValue($row['ChildWt1']);
        $this->ChildDay1->setDbValue($row['ChildDay1']);
        $this->ChildOE1->setDbValue($row['ChildOE1']);
        $this->TypeofDelivery1->setDbValue($row['TypeofDelivery1']);
        $this->ChildBlGrp1->setDbValue($row['ChildBlGrp1']);
        $this->ApgarScore1->setDbValue($row['ApgarScore1']);
        $this->birthnotification1->setDbValue($row['birthnotification1']);
        $this->formno1->setDbValue($row['formno1']);
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
        $this->DrVisit1->setDbValue($row['DrVisit1']);
        $this->DrVisit2->setDbValue($row['DrVisit2']);
        $this->DrVisit3->setDbValue($row['DrVisit3']);
        $this->DrVisit4->setDbValue($row['DrVisit4']);
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PId->setDbValue($row['PId']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatID'] = null;
        $row['PatientName'] = null;
        $row['mrnno'] = null;
        $row['MobileNumber'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['ObstetricsHistryMale'] = null;
        $row['ObstetricsHistryFeMale'] = null;
        $row['Abortion'] = null;
        $row['ChildBirthDate'] = null;
        $row['ChildBirthTime'] = null;
        $row['ChildSex'] = null;
        $row['ChildWt'] = null;
        $row['ChildDay'] = null;
        $row['ChildOE'] = null;
        $row['TypeofDelivery'] = null;
        $row['ChildBlGrp'] = null;
        $row['ApgarScore'] = null;
        $row['birthnotification'] = null;
        $row['formno'] = null;
        $row['dte'] = null;
        $row['motherReligion'] = null;
        $row['bloodgroup'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatientID'] = null;
        $row['HospID'] = null;
        $row['ChildBirthDate1'] = null;
        $row['ChildBirthTime1'] = null;
        $row['ChildSex1'] = null;
        $row['ChildWt1'] = null;
        $row['ChildDay1'] = null;
        $row['ChildOE1'] = null;
        $row['TypeofDelivery1'] = null;
        $row['ChildBlGrp1'] = null;
        $row['ApgarScore1'] = null;
        $row['birthnotification1'] = null;
        $row['formno1'] = null;
        $row['proposedSurgery'] = null;
        $row['surgeryProcedure'] = null;
        $row['typeOfAnaesthesia'] = null;
        $row['RecievedTime'] = null;
        $row['AnaesthesiaStarted'] = null;
        $row['AnaesthesiaEnded'] = null;
        $row['surgeryStarted'] = null;
        $row['surgeryEnded'] = null;
        $row['RecoveryTime'] = null;
        $row['ShiftedTime'] = null;
        $row['Duration'] = null;
        $row['DrVisit1'] = null;
        $row['DrVisit2'] = null;
        $row['DrVisit3'] = null;
        $row['DrVisit4'] = null;
        $row['Surgeon'] = null;
        $row['Anaesthetist'] = null;
        $row['AsstSurgeon1'] = null;
        $row['AsstSurgeon2'] = null;
        $row['paediatric'] = null;
        $row['ScrubNurse1'] = null;
        $row['ScrubNurse2'] = null;
        $row['FloorNurse'] = null;
        $row['Technician'] = null;
        $row['HouseKeeping'] = null;
        $row['countsCheckedMops'] = null;
        $row['gauze'] = null;
        $row['needles'] = null;
        $row['bloodloss'] = null;
        $row['bloodtransfusion'] = null;
        $row['implantsUsed'] = null;
        $row['MaterialsForHPE'] = null;
        $row['Reception'] = null;
        $row['PId'] = null;
        $row['PatientSearch'] = null;
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

        // ObstetricsHistryMale

        // ObstetricsHistryFeMale

        // Abortion

        // ChildBirthDate

        // ChildBirthTime

        // ChildSex

        // ChildWt

        // ChildDay

        // ChildOE

        // TypeofDelivery

        // ChildBlGrp

        // ApgarScore

        // birthnotification

        // formno

        // dte

        // motherReligion

        // bloodgroup

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatientID

        // HospID

        // ChildBirthDate1

        // ChildBirthTime1

        // ChildSex1

        // ChildWt1

        // ChildDay1

        // ChildOE1

        // TypeofDelivery1

        // ChildBlGrp1

        // ApgarScore1

        // birthnotification1

        // formno1

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

        // DrVisit1

        // DrVisit2

        // DrVisit3

        // DrVisit4

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

        // Reception

        // PId

        // PatientSearch
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

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->ViewValue = $this->ObstetricsHistryFeMale->CurrentValue;
            $this->ObstetricsHistryFeMale->ViewCustomAttributes = "";

            // Abortion
            $this->Abortion->ViewValue = $this->Abortion->CurrentValue;
            $this->Abortion->ViewCustomAttributes = "";

            // ChildBirthDate
            $this->ChildBirthDate->ViewValue = $this->ChildBirthDate->CurrentValue;
            $this->ChildBirthDate->ViewValue = FormatDateTime($this->ChildBirthDate->ViewValue, 7);
            $this->ChildBirthDate->ViewCustomAttributes = "";

            // ChildBirthTime
            $this->ChildBirthTime->ViewValue = $this->ChildBirthTime->CurrentValue;
            $this->ChildBirthTime->ViewCustomAttributes = "";

            // ChildSex
            $this->ChildSex->ViewValue = $this->ChildSex->CurrentValue;
            $this->ChildSex->ViewCustomAttributes = "";

            // ChildWt
            $this->ChildWt->ViewValue = $this->ChildWt->CurrentValue;
            $this->ChildWt->ViewCustomAttributes = "";

            // ChildDay
            $this->ChildDay->ViewValue = $this->ChildDay->CurrentValue;
            $this->ChildDay->ViewCustomAttributes = "";

            // ChildOE
            $this->ChildOE->ViewValue = $this->ChildOE->CurrentValue;
            $this->ChildOE->ViewCustomAttributes = "";

            // TypeofDelivery
            $this->TypeofDelivery->ViewValue = $this->TypeofDelivery->CurrentValue;
            $this->TypeofDelivery->ViewCustomAttributes = "";

            // ChildBlGrp
            $this->ChildBlGrp->ViewValue = $this->ChildBlGrp->CurrentValue;
            $this->ChildBlGrp->ViewCustomAttributes = "";

            // ApgarScore
            $this->ApgarScore->ViewValue = $this->ApgarScore->CurrentValue;
            $this->ApgarScore->ViewCustomAttributes = "";

            // birthnotification
            $this->birthnotification->ViewValue = $this->birthnotification->CurrentValue;
            $this->birthnotification->ViewCustomAttributes = "";

            // formno
            $this->formno->ViewValue = $this->formno->CurrentValue;
            $this->formno->ViewCustomAttributes = "";

            // dte
            $this->dte->ViewValue = $this->dte->CurrentValue;
            $this->dte->ViewValue = FormatDateTime($this->dte->ViewValue, 0);
            $this->dte->ViewCustomAttributes = "";

            // motherReligion
            $this->motherReligion->ViewValue = $this->motherReligion->CurrentValue;
            $this->motherReligion->ViewCustomAttributes = "";

            // bloodgroup
            $this->bloodgroup->ViewValue = $this->bloodgroup->CurrentValue;
            $this->bloodgroup->ViewCustomAttributes = "";

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

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->ViewValue = $this->ChildBirthDate1->CurrentValue;
            $this->ChildBirthDate1->ViewValue = FormatDateTime($this->ChildBirthDate1->ViewValue, 0);
            $this->ChildBirthDate1->ViewCustomAttributes = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->ViewValue = $this->ChildBirthTime1->CurrentValue;
            $this->ChildBirthTime1->ViewCustomAttributes = "";

            // ChildSex1
            $this->ChildSex1->ViewValue = $this->ChildSex1->CurrentValue;
            $this->ChildSex1->ViewCustomAttributes = "";

            // ChildWt1
            $this->ChildWt1->ViewValue = $this->ChildWt1->CurrentValue;
            $this->ChildWt1->ViewCustomAttributes = "";

            // ChildDay1
            $this->ChildDay1->ViewValue = $this->ChildDay1->CurrentValue;
            $this->ChildDay1->ViewCustomAttributes = "";

            // ChildOE1
            $this->ChildOE1->ViewValue = $this->ChildOE1->CurrentValue;
            $this->ChildOE1->ViewCustomAttributes = "";

            // TypeofDelivery1
            $this->TypeofDelivery1->ViewValue = $this->TypeofDelivery1->CurrentValue;
            $this->TypeofDelivery1->ViewCustomAttributes = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->ViewValue = $this->ChildBlGrp1->CurrentValue;
            $this->ChildBlGrp1->ViewCustomAttributes = "";

            // ApgarScore1
            $this->ApgarScore1->ViewValue = $this->ApgarScore1->CurrentValue;
            $this->ApgarScore1->ViewCustomAttributes = "";

            // birthnotification1
            $this->birthnotification1->ViewValue = $this->birthnotification1->CurrentValue;
            $this->birthnotification1->ViewCustomAttributes = "";

            // formno1
            $this->formno1->ViewValue = $this->formno1->CurrentValue;
            $this->formno1->ViewCustomAttributes = "";

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
            $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 11);
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

            // DrVisit1
            $curVal = trim(strval($this->DrVisit1->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit1->ViewValue = $this->DrVisit1->lookupCacheOption($curVal);
                if ($this->DrVisit1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DrVisit1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrVisit1->Lookup->renderViewRow($rswrk[0]);
                        $this->DrVisit1->ViewValue = $this->DrVisit1->displayValue($arwrk);
                    } else {
                        $this->DrVisit1->ViewValue = $this->DrVisit1->CurrentValue;
                    }
                }
            } else {
                $this->DrVisit1->ViewValue = null;
            }
            $this->DrVisit1->ViewCustomAttributes = "";

            // DrVisit2
            $curVal = trim(strval($this->DrVisit2->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit2->ViewValue = $this->DrVisit2->lookupCacheOption($curVal);
                if ($this->DrVisit2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DrVisit2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrVisit2->Lookup->renderViewRow($rswrk[0]);
                        $this->DrVisit2->ViewValue = $this->DrVisit2->displayValue($arwrk);
                    } else {
                        $this->DrVisit2->ViewValue = $this->DrVisit2->CurrentValue;
                    }
                }
            } else {
                $this->DrVisit2->ViewValue = null;
            }
            $this->DrVisit2->ViewCustomAttributes = "";

            // DrVisit3
            $curVal = trim(strval($this->DrVisit3->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit3->ViewValue = $this->DrVisit3->lookupCacheOption($curVal);
                if ($this->DrVisit3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DrVisit3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrVisit3->Lookup->renderViewRow($rswrk[0]);
                        $this->DrVisit3->ViewValue = $this->DrVisit3->displayValue($arwrk);
                    } else {
                        $this->DrVisit3->ViewValue = $this->DrVisit3->CurrentValue;
                    }
                }
            } else {
                $this->DrVisit3->ViewValue = null;
            }
            $this->DrVisit3->ViewCustomAttributes = "";

            // DrVisit4
            $curVal = trim(strval($this->DrVisit4->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit4->ViewValue = $this->DrVisit4->lookupCacheOption($curVal);
                if ($this->DrVisit4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DrVisit4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrVisit4->Lookup->renderViewRow($rswrk[0]);
                        $this->DrVisit4->ViewValue = $this->DrVisit4->displayValue($arwrk);
                    } else {
                        $this->DrVisit4->ViewValue = $this->DrVisit4->CurrentValue;
                    }
                }
            } else {
                $this->DrVisit4->ViewValue = null;
            }
            $this->DrVisit4->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
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
            $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
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
            $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
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
            $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
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
            $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
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

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->LinkCustomAttributes = "";
            $this->ObstetricsHistryFeMale->HrefValue = "";
            $this->ObstetricsHistryFeMale->TooltipValue = "";

            // Abortion
            $this->Abortion->LinkCustomAttributes = "";
            $this->Abortion->HrefValue = "";
            $this->Abortion->TooltipValue = "";

            // ChildBirthDate
            $this->ChildBirthDate->LinkCustomAttributes = "";
            $this->ChildBirthDate->HrefValue = "";
            $this->ChildBirthDate->TooltipValue = "";

            // ChildBirthTime
            $this->ChildBirthTime->LinkCustomAttributes = "";
            $this->ChildBirthTime->HrefValue = "";
            $this->ChildBirthTime->TooltipValue = "";

            // ChildSex
            $this->ChildSex->LinkCustomAttributes = "";
            $this->ChildSex->HrefValue = "";
            $this->ChildSex->TooltipValue = "";

            // ChildWt
            $this->ChildWt->LinkCustomAttributes = "";
            $this->ChildWt->HrefValue = "";
            $this->ChildWt->TooltipValue = "";

            // ChildDay
            $this->ChildDay->LinkCustomAttributes = "";
            $this->ChildDay->HrefValue = "";
            $this->ChildDay->TooltipValue = "";

            // ChildOE
            $this->ChildOE->LinkCustomAttributes = "";
            $this->ChildOE->HrefValue = "";
            $this->ChildOE->TooltipValue = "";

            // TypeofDelivery
            $this->TypeofDelivery->LinkCustomAttributes = "";
            $this->TypeofDelivery->HrefValue = "";
            $this->TypeofDelivery->TooltipValue = "";

            // ChildBlGrp
            $this->ChildBlGrp->LinkCustomAttributes = "";
            $this->ChildBlGrp->HrefValue = "";
            $this->ChildBlGrp->TooltipValue = "";

            // ApgarScore
            $this->ApgarScore->LinkCustomAttributes = "";
            $this->ApgarScore->HrefValue = "";
            $this->ApgarScore->TooltipValue = "";

            // birthnotification
            $this->birthnotification->LinkCustomAttributes = "";
            $this->birthnotification->HrefValue = "";
            $this->birthnotification->TooltipValue = "";

            // formno
            $this->formno->LinkCustomAttributes = "";
            $this->formno->HrefValue = "";
            $this->formno->TooltipValue = "";

            // dte
            $this->dte->LinkCustomAttributes = "";
            $this->dte->HrefValue = "";
            $this->dte->TooltipValue = "";

            // motherReligion
            $this->motherReligion->LinkCustomAttributes = "";
            $this->motherReligion->HrefValue = "";
            $this->motherReligion->TooltipValue = "";

            // bloodgroup
            $this->bloodgroup->LinkCustomAttributes = "";
            $this->bloodgroup->HrefValue = "";
            $this->bloodgroup->TooltipValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->LinkCustomAttributes = "";
            $this->ChildBirthDate1->HrefValue = "";
            $this->ChildBirthDate1->TooltipValue = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->LinkCustomAttributes = "";
            $this->ChildBirthTime1->HrefValue = "";
            $this->ChildBirthTime1->TooltipValue = "";

            // ChildSex1
            $this->ChildSex1->LinkCustomAttributes = "";
            $this->ChildSex1->HrefValue = "";
            $this->ChildSex1->TooltipValue = "";

            // ChildWt1
            $this->ChildWt1->LinkCustomAttributes = "";
            $this->ChildWt1->HrefValue = "";
            $this->ChildWt1->TooltipValue = "";

            // ChildDay1
            $this->ChildDay1->LinkCustomAttributes = "";
            $this->ChildDay1->HrefValue = "";
            $this->ChildDay1->TooltipValue = "";

            // ChildOE1
            $this->ChildOE1->LinkCustomAttributes = "";
            $this->ChildOE1->HrefValue = "";
            $this->ChildOE1->TooltipValue = "";

            // TypeofDelivery1
            $this->TypeofDelivery1->LinkCustomAttributes = "";
            $this->TypeofDelivery1->HrefValue = "";
            $this->TypeofDelivery1->TooltipValue = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->LinkCustomAttributes = "";
            $this->ChildBlGrp1->HrefValue = "";
            $this->ChildBlGrp1->TooltipValue = "";

            // ApgarScore1
            $this->ApgarScore1->LinkCustomAttributes = "";
            $this->ApgarScore1->HrefValue = "";
            $this->ApgarScore1->TooltipValue = "";

            // birthnotification1
            $this->birthnotification1->LinkCustomAttributes = "";
            $this->birthnotification1->HrefValue = "";
            $this->birthnotification1->TooltipValue = "";

            // formno1
            $this->formno1->LinkCustomAttributes = "";
            $this->formno1->HrefValue = "";
            $this->formno1->TooltipValue = "";

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

            // DrVisit1
            $this->DrVisit1->LinkCustomAttributes = "";
            $this->DrVisit1->HrefValue = "";
            $this->DrVisit1->TooltipValue = "";

            // DrVisit2
            $this->DrVisit2->LinkCustomAttributes = "";
            $this->DrVisit2->HrefValue = "";
            $this->DrVisit2->TooltipValue = "";

            // DrVisit3
            $this->DrVisit3->LinkCustomAttributes = "";
            $this->DrVisit3->HrefValue = "";
            $this->DrVisit3->TooltipValue = "";

            // DrVisit4
            $this->DrVisit4->LinkCustomAttributes = "";
            $this->DrVisit4->HrefValue = "";
            $this->DrVisit4->TooltipValue = "";

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

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

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

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->EditAttrs["class"] = "form-control";
            $this->ObstetricsHistryFeMale->EditCustomAttributes = "";
            if (!$this->ObstetricsHistryFeMale->Raw) {
                $this->ObstetricsHistryFeMale->CurrentValue = HtmlDecode($this->ObstetricsHistryFeMale->CurrentValue);
            }
            $this->ObstetricsHistryFeMale->EditValue = HtmlEncode($this->ObstetricsHistryFeMale->CurrentValue);
            $this->ObstetricsHistryFeMale->PlaceHolder = RemoveHtml($this->ObstetricsHistryFeMale->caption());

            // Abortion
            $this->Abortion->EditAttrs["class"] = "form-control";
            $this->Abortion->EditCustomAttributes = "";
            if (!$this->Abortion->Raw) {
                $this->Abortion->CurrentValue = HtmlDecode($this->Abortion->CurrentValue);
            }
            $this->Abortion->EditValue = HtmlEncode($this->Abortion->CurrentValue);
            $this->Abortion->PlaceHolder = RemoveHtml($this->Abortion->caption());

            // ChildBirthDate
            $this->ChildBirthDate->EditAttrs["class"] = "form-control";
            $this->ChildBirthDate->EditCustomAttributes = "";
            $this->ChildBirthDate->EditValue = HtmlEncode(FormatDateTime($this->ChildBirthDate->CurrentValue, 7));
            $this->ChildBirthDate->PlaceHolder = RemoveHtml($this->ChildBirthDate->caption());

            // ChildBirthTime
            $this->ChildBirthTime->EditAttrs["class"] = "form-control";
            $this->ChildBirthTime->EditCustomAttributes = "";
            if (!$this->ChildBirthTime->Raw) {
                $this->ChildBirthTime->CurrentValue = HtmlDecode($this->ChildBirthTime->CurrentValue);
            }
            $this->ChildBirthTime->EditValue = HtmlEncode($this->ChildBirthTime->CurrentValue);
            $this->ChildBirthTime->PlaceHolder = RemoveHtml($this->ChildBirthTime->caption());

            // ChildSex
            $this->ChildSex->EditAttrs["class"] = "form-control";
            $this->ChildSex->EditCustomAttributes = "";
            if (!$this->ChildSex->Raw) {
                $this->ChildSex->CurrentValue = HtmlDecode($this->ChildSex->CurrentValue);
            }
            $this->ChildSex->EditValue = HtmlEncode($this->ChildSex->CurrentValue);
            $this->ChildSex->PlaceHolder = RemoveHtml($this->ChildSex->caption());

            // ChildWt
            $this->ChildWt->EditAttrs["class"] = "form-control";
            $this->ChildWt->EditCustomAttributes = "";
            if (!$this->ChildWt->Raw) {
                $this->ChildWt->CurrentValue = HtmlDecode($this->ChildWt->CurrentValue);
            }
            $this->ChildWt->EditValue = HtmlEncode($this->ChildWt->CurrentValue);
            $this->ChildWt->PlaceHolder = RemoveHtml($this->ChildWt->caption());

            // ChildDay
            $this->ChildDay->EditAttrs["class"] = "form-control";
            $this->ChildDay->EditCustomAttributes = "";
            if (!$this->ChildDay->Raw) {
                $this->ChildDay->CurrentValue = HtmlDecode($this->ChildDay->CurrentValue);
            }
            $this->ChildDay->EditValue = HtmlEncode($this->ChildDay->CurrentValue);
            $this->ChildDay->PlaceHolder = RemoveHtml($this->ChildDay->caption());

            // ChildOE
            $this->ChildOE->EditAttrs["class"] = "form-control";
            $this->ChildOE->EditCustomAttributes = "";
            if (!$this->ChildOE->Raw) {
                $this->ChildOE->CurrentValue = HtmlDecode($this->ChildOE->CurrentValue);
            }
            $this->ChildOE->EditValue = HtmlEncode($this->ChildOE->CurrentValue);
            $this->ChildOE->PlaceHolder = RemoveHtml($this->ChildOE->caption());

            // TypeofDelivery
            $this->TypeofDelivery->EditAttrs["class"] = "form-control";
            $this->TypeofDelivery->EditCustomAttributes = "";
            $this->TypeofDelivery->EditValue = HtmlEncode($this->TypeofDelivery->CurrentValue);
            $this->TypeofDelivery->PlaceHolder = RemoveHtml($this->TypeofDelivery->caption());

            // ChildBlGrp
            $this->ChildBlGrp->EditAttrs["class"] = "form-control";
            $this->ChildBlGrp->EditCustomAttributes = "";
            if (!$this->ChildBlGrp->Raw) {
                $this->ChildBlGrp->CurrentValue = HtmlDecode($this->ChildBlGrp->CurrentValue);
            }
            $this->ChildBlGrp->EditValue = HtmlEncode($this->ChildBlGrp->CurrentValue);
            $this->ChildBlGrp->PlaceHolder = RemoveHtml($this->ChildBlGrp->caption());

            // ApgarScore
            $this->ApgarScore->EditAttrs["class"] = "form-control";
            $this->ApgarScore->EditCustomAttributes = "";
            if (!$this->ApgarScore->Raw) {
                $this->ApgarScore->CurrentValue = HtmlDecode($this->ApgarScore->CurrentValue);
            }
            $this->ApgarScore->EditValue = HtmlEncode($this->ApgarScore->CurrentValue);
            $this->ApgarScore->PlaceHolder = RemoveHtml($this->ApgarScore->caption());

            // birthnotification
            $this->birthnotification->EditAttrs["class"] = "form-control";
            $this->birthnotification->EditCustomAttributes = "";
            if (!$this->birthnotification->Raw) {
                $this->birthnotification->CurrentValue = HtmlDecode($this->birthnotification->CurrentValue);
            }
            $this->birthnotification->EditValue = HtmlEncode($this->birthnotification->CurrentValue);
            $this->birthnotification->PlaceHolder = RemoveHtml($this->birthnotification->caption());

            // formno
            $this->formno->EditAttrs["class"] = "form-control";
            $this->formno->EditCustomAttributes = "";
            if (!$this->formno->Raw) {
                $this->formno->CurrentValue = HtmlDecode($this->formno->CurrentValue);
            }
            $this->formno->EditValue = HtmlEncode($this->formno->CurrentValue);
            $this->formno->PlaceHolder = RemoveHtml($this->formno->caption());

            // dte
            $this->dte->EditAttrs["class"] = "form-control";
            $this->dte->EditCustomAttributes = "";
            $this->dte->EditValue = HtmlEncode(FormatDateTime($this->dte->CurrentValue, 8));
            $this->dte->PlaceHolder = RemoveHtml($this->dte->caption());

            // motherReligion
            $this->motherReligion->EditAttrs["class"] = "form-control";
            $this->motherReligion->EditCustomAttributes = "";
            if (!$this->motherReligion->Raw) {
                $this->motherReligion->CurrentValue = HtmlDecode($this->motherReligion->CurrentValue);
            }
            $this->motherReligion->EditValue = HtmlEncode($this->motherReligion->CurrentValue);
            $this->motherReligion->PlaceHolder = RemoveHtml($this->motherReligion->caption());

            // bloodgroup
            $this->bloodgroup->EditAttrs["class"] = "form-control";
            $this->bloodgroup->EditCustomAttributes = "";
            if (!$this->bloodgroup->Raw) {
                $this->bloodgroup->CurrentValue = HtmlDecode($this->bloodgroup->CurrentValue);
            }
            $this->bloodgroup->EditValue = HtmlEncode($this->bloodgroup->CurrentValue);
            $this->bloodgroup->PlaceHolder = RemoveHtml($this->bloodgroup->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // HospID

            // ChildBirthDate1
            $this->ChildBirthDate1->EditAttrs["class"] = "form-control";
            $this->ChildBirthDate1->EditCustomAttributes = "";
            $this->ChildBirthDate1->EditValue = HtmlEncode(FormatDateTime($this->ChildBirthDate1->CurrentValue, 8));
            $this->ChildBirthDate1->PlaceHolder = RemoveHtml($this->ChildBirthDate1->caption());

            // ChildBirthTime1
            $this->ChildBirthTime1->EditAttrs["class"] = "form-control";
            $this->ChildBirthTime1->EditCustomAttributes = "";
            if (!$this->ChildBirthTime1->Raw) {
                $this->ChildBirthTime1->CurrentValue = HtmlDecode($this->ChildBirthTime1->CurrentValue);
            }
            $this->ChildBirthTime1->EditValue = HtmlEncode($this->ChildBirthTime1->CurrentValue);
            $this->ChildBirthTime1->PlaceHolder = RemoveHtml($this->ChildBirthTime1->caption());

            // ChildSex1
            $this->ChildSex1->EditAttrs["class"] = "form-control";
            $this->ChildSex1->EditCustomAttributes = "";
            if (!$this->ChildSex1->Raw) {
                $this->ChildSex1->CurrentValue = HtmlDecode($this->ChildSex1->CurrentValue);
            }
            $this->ChildSex1->EditValue = HtmlEncode($this->ChildSex1->CurrentValue);
            $this->ChildSex1->PlaceHolder = RemoveHtml($this->ChildSex1->caption());

            // ChildWt1
            $this->ChildWt1->EditAttrs["class"] = "form-control";
            $this->ChildWt1->EditCustomAttributes = "";
            if (!$this->ChildWt1->Raw) {
                $this->ChildWt1->CurrentValue = HtmlDecode($this->ChildWt1->CurrentValue);
            }
            $this->ChildWt1->EditValue = HtmlEncode($this->ChildWt1->CurrentValue);
            $this->ChildWt1->PlaceHolder = RemoveHtml($this->ChildWt1->caption());

            // ChildDay1
            $this->ChildDay1->EditAttrs["class"] = "form-control";
            $this->ChildDay1->EditCustomAttributes = "";
            if (!$this->ChildDay1->Raw) {
                $this->ChildDay1->CurrentValue = HtmlDecode($this->ChildDay1->CurrentValue);
            }
            $this->ChildDay1->EditValue = HtmlEncode($this->ChildDay1->CurrentValue);
            $this->ChildDay1->PlaceHolder = RemoveHtml($this->ChildDay1->caption());

            // ChildOE1
            $this->ChildOE1->EditAttrs["class"] = "form-control";
            $this->ChildOE1->EditCustomAttributes = "";
            if (!$this->ChildOE1->Raw) {
                $this->ChildOE1->CurrentValue = HtmlDecode($this->ChildOE1->CurrentValue);
            }
            $this->ChildOE1->EditValue = HtmlEncode($this->ChildOE1->CurrentValue);
            $this->ChildOE1->PlaceHolder = RemoveHtml($this->ChildOE1->caption());

            // TypeofDelivery1
            $this->TypeofDelivery1->EditAttrs["class"] = "form-control";
            $this->TypeofDelivery1->EditCustomAttributes = "";
            $this->TypeofDelivery1->EditValue = HtmlEncode($this->TypeofDelivery1->CurrentValue);
            $this->TypeofDelivery1->PlaceHolder = RemoveHtml($this->TypeofDelivery1->caption());

            // ChildBlGrp1
            $this->ChildBlGrp1->EditAttrs["class"] = "form-control";
            $this->ChildBlGrp1->EditCustomAttributes = "";
            if (!$this->ChildBlGrp1->Raw) {
                $this->ChildBlGrp1->CurrentValue = HtmlDecode($this->ChildBlGrp1->CurrentValue);
            }
            $this->ChildBlGrp1->EditValue = HtmlEncode($this->ChildBlGrp1->CurrentValue);
            $this->ChildBlGrp1->PlaceHolder = RemoveHtml($this->ChildBlGrp1->caption());

            // ApgarScore1
            $this->ApgarScore1->EditAttrs["class"] = "form-control";
            $this->ApgarScore1->EditCustomAttributes = "";
            if (!$this->ApgarScore1->Raw) {
                $this->ApgarScore1->CurrentValue = HtmlDecode($this->ApgarScore1->CurrentValue);
            }
            $this->ApgarScore1->EditValue = HtmlEncode($this->ApgarScore1->CurrentValue);
            $this->ApgarScore1->PlaceHolder = RemoveHtml($this->ApgarScore1->caption());

            // birthnotification1
            $this->birthnotification1->EditAttrs["class"] = "form-control";
            $this->birthnotification1->EditCustomAttributes = "";
            if (!$this->birthnotification1->Raw) {
                $this->birthnotification1->CurrentValue = HtmlDecode($this->birthnotification1->CurrentValue);
            }
            $this->birthnotification1->EditValue = HtmlEncode($this->birthnotification1->CurrentValue);
            $this->birthnotification1->PlaceHolder = RemoveHtml($this->birthnotification1->caption());

            // formno1
            $this->formno1->EditAttrs["class"] = "form-control";
            $this->formno1->EditCustomAttributes = "";
            if (!$this->formno1->Raw) {
                $this->formno1->CurrentValue = HtmlDecode($this->formno1->CurrentValue);
            }
            $this->formno1->EditValue = HtmlEncode($this->formno1->CurrentValue);
            $this->formno1->PlaceHolder = RemoveHtml($this->formno1->caption());

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
            $this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime($this->surgeryEnded->CurrentValue, 11));
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

            // DrVisit1
            $this->DrVisit1->EditAttrs["class"] = "form-control";
            $this->DrVisit1->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrVisit1->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit1->ViewValue = $this->DrVisit1->lookupCacheOption($curVal);
            } else {
                $this->DrVisit1->ViewValue = $this->DrVisit1->Lookup !== null && is_array($this->DrVisit1->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrVisit1->ViewValue !== null) { // Load from cache
                $this->DrVisit1->EditValue = array_values($this->DrVisit1->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DrVisit1->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DrVisit1->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DrVisit1->EditValue = $arwrk;
            }
            $this->DrVisit1->PlaceHolder = RemoveHtml($this->DrVisit1->caption());

            // DrVisit2
            $this->DrVisit2->EditAttrs["class"] = "form-control";
            $this->DrVisit2->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrVisit2->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit2->ViewValue = $this->DrVisit2->lookupCacheOption($curVal);
            } else {
                $this->DrVisit2->ViewValue = $this->DrVisit2->Lookup !== null && is_array($this->DrVisit2->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrVisit2->ViewValue !== null) { // Load from cache
                $this->DrVisit2->EditValue = array_values($this->DrVisit2->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DrVisit2->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DrVisit2->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DrVisit2->EditValue = $arwrk;
            }
            $this->DrVisit2->PlaceHolder = RemoveHtml($this->DrVisit2->caption());

            // DrVisit3
            $this->DrVisit3->EditAttrs["class"] = "form-control";
            $this->DrVisit3->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrVisit3->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit3->ViewValue = $this->DrVisit3->lookupCacheOption($curVal);
            } else {
                $this->DrVisit3->ViewValue = $this->DrVisit3->Lookup !== null && is_array($this->DrVisit3->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrVisit3->ViewValue !== null) { // Load from cache
                $this->DrVisit3->EditValue = array_values($this->DrVisit3->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DrVisit3->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DrVisit3->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DrVisit3->EditValue = $arwrk;
            }
            $this->DrVisit3->PlaceHolder = RemoveHtml($this->DrVisit3->caption());

            // DrVisit4
            $this->DrVisit4->EditAttrs["class"] = "form-control";
            $this->DrVisit4->EditCustomAttributes = "";
            $curVal = trim(strval($this->DrVisit4->CurrentValue));
            if ($curVal != "") {
                $this->DrVisit4->ViewValue = $this->DrVisit4->lookupCacheOption($curVal);
            } else {
                $this->DrVisit4->ViewValue = $this->DrVisit4->Lookup !== null && is_array($this->DrVisit4->Lookup->Options) ? $curVal : null;
            }
            if ($this->DrVisit4->ViewValue !== null) { // Load from cache
                $this->DrVisit4->EditValue = array_values($this->DrVisit4->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DrVisit4->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DrVisit4->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DrVisit4->EditValue = $arwrk;
            }
            $this->DrVisit4->PlaceHolder = RemoveHtml($this->DrVisit4->caption());

            // Surgeon
            $this->Surgeon->EditAttrs["class"] = "form-control";
            $this->Surgeon->EditCustomAttributes = "";
            if (!$this->Surgeon->Raw) {
                $this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
            }
            $this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
            $curVal = trim(strval($this->Surgeon->CurrentValue));
            if ($curVal != "") {
                $this->Surgeon->EditValue = $this->Surgeon->lookupCacheOption($curVal);
                if ($this->Surgeon->EditValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Surgeon->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Surgeon->Lookup->renderViewRow($rswrk[0]);
                        $this->Surgeon->EditValue = $this->Surgeon->displayValue($arwrk);
                    } else {
                        $this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
                    }
                }
            } else {
                $this->Surgeon->EditValue = null;
            }
            $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

            // Anaesthetist
            $this->Anaesthetist->EditAttrs["class"] = "form-control";
            $this->Anaesthetist->EditCustomAttributes = "";
            if (!$this->Anaesthetist->Raw) {
                $this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
            }
            $this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
            $curVal = trim(strval($this->Anaesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anaesthetist->EditValue = $this->Anaesthetist->lookupCacheOption($curVal);
                if ($this->Anaesthetist->EditValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Anaesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Anaesthetist->Lookup->renderViewRow($rswrk[0]);
                        $this->Anaesthetist->EditValue = $this->Anaesthetist->displayValue($arwrk);
                    } else {
                        $this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
                    }
                }
            } else {
                $this->Anaesthetist->EditValue = null;
            }
            $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

            // AsstSurgeon1
            $this->AsstSurgeon1->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon1->EditCustomAttributes = "";
            if (!$this->AsstSurgeon1->Raw) {
                $this->AsstSurgeon1->CurrentValue = HtmlDecode($this->AsstSurgeon1->CurrentValue);
            }
            $this->AsstSurgeon1->EditValue = HtmlEncode($this->AsstSurgeon1->CurrentValue);
            $curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon1->EditValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
                if ($this->AsstSurgeon1->EditValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon1->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon1->EditValue = $this->AsstSurgeon1->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon1->EditValue = HtmlEncode($this->AsstSurgeon1->CurrentValue);
                    }
                }
            } else {
                $this->AsstSurgeon1->EditValue = null;
            }
            $this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

            // AsstSurgeon2
            $this->AsstSurgeon2->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon2->EditCustomAttributes = "";
            if (!$this->AsstSurgeon2->Raw) {
                $this->AsstSurgeon2->CurrentValue = HtmlDecode($this->AsstSurgeon2->CurrentValue);
            }
            $this->AsstSurgeon2->EditValue = HtmlEncode($this->AsstSurgeon2->CurrentValue);
            $curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
            if ($curVal != "") {
                $this->AsstSurgeon2->EditValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
                if ($this->AsstSurgeon2->EditValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AsstSurgeon2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AsstSurgeon2->Lookup->renderViewRow($rswrk[0]);
                        $this->AsstSurgeon2->EditValue = $this->AsstSurgeon2->displayValue($arwrk);
                    } else {
                        $this->AsstSurgeon2->EditValue = HtmlEncode($this->AsstSurgeon2->CurrentValue);
                    }
                }
            } else {
                $this->AsstSurgeon2->EditValue = null;
            }
            $this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

            // paediatric
            $this->paediatric->EditAttrs["class"] = "form-control";
            $this->paediatric->EditCustomAttributes = "";
            if (!$this->paediatric->Raw) {
                $this->paediatric->CurrentValue = HtmlDecode($this->paediatric->CurrentValue);
            }
            $this->paediatric->EditValue = HtmlEncode($this->paediatric->CurrentValue);
            $curVal = trim(strval($this->paediatric->CurrentValue));
            if ($curVal != "") {
                $this->paediatric->EditValue = $this->paediatric->lookupCacheOption($curVal);
                if ($this->paediatric->EditValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->paediatric->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->paediatric->Lookup->renderViewRow($rswrk[0]);
                        $this->paediatric->EditValue = $this->paediatric->displayValue($arwrk);
                    } else {
                        $this->paediatric->EditValue = HtmlEncode($this->paediatric->CurrentValue);
                    }
                }
            } else {
                $this->paediatric->EditValue = null;
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

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

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

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->LinkCustomAttributes = "";
            $this->ObstetricsHistryFeMale->HrefValue = "";

            // Abortion
            $this->Abortion->LinkCustomAttributes = "";
            $this->Abortion->HrefValue = "";

            // ChildBirthDate
            $this->ChildBirthDate->LinkCustomAttributes = "";
            $this->ChildBirthDate->HrefValue = "";

            // ChildBirthTime
            $this->ChildBirthTime->LinkCustomAttributes = "";
            $this->ChildBirthTime->HrefValue = "";

            // ChildSex
            $this->ChildSex->LinkCustomAttributes = "";
            $this->ChildSex->HrefValue = "";

            // ChildWt
            $this->ChildWt->LinkCustomAttributes = "";
            $this->ChildWt->HrefValue = "";

            // ChildDay
            $this->ChildDay->LinkCustomAttributes = "";
            $this->ChildDay->HrefValue = "";

            // ChildOE
            $this->ChildOE->LinkCustomAttributes = "";
            $this->ChildOE->HrefValue = "";

            // TypeofDelivery
            $this->TypeofDelivery->LinkCustomAttributes = "";
            $this->TypeofDelivery->HrefValue = "";

            // ChildBlGrp
            $this->ChildBlGrp->LinkCustomAttributes = "";
            $this->ChildBlGrp->HrefValue = "";

            // ApgarScore
            $this->ApgarScore->LinkCustomAttributes = "";
            $this->ApgarScore->HrefValue = "";

            // birthnotification
            $this->birthnotification->LinkCustomAttributes = "";
            $this->birthnotification->HrefValue = "";

            // formno
            $this->formno->LinkCustomAttributes = "";
            $this->formno->HrefValue = "";

            // dte
            $this->dte->LinkCustomAttributes = "";
            $this->dte->HrefValue = "";

            // motherReligion
            $this->motherReligion->LinkCustomAttributes = "";
            $this->motherReligion->HrefValue = "";

            // bloodgroup
            $this->bloodgroup->LinkCustomAttributes = "";
            $this->bloodgroup->HrefValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // ChildBirthDate1
            $this->ChildBirthDate1->LinkCustomAttributes = "";
            $this->ChildBirthDate1->HrefValue = "";

            // ChildBirthTime1
            $this->ChildBirthTime1->LinkCustomAttributes = "";
            $this->ChildBirthTime1->HrefValue = "";

            // ChildSex1
            $this->ChildSex1->LinkCustomAttributes = "";
            $this->ChildSex1->HrefValue = "";

            // ChildWt1
            $this->ChildWt1->LinkCustomAttributes = "";
            $this->ChildWt1->HrefValue = "";

            // ChildDay1
            $this->ChildDay1->LinkCustomAttributes = "";
            $this->ChildDay1->HrefValue = "";

            // ChildOE1
            $this->ChildOE1->LinkCustomAttributes = "";
            $this->ChildOE1->HrefValue = "";

            // TypeofDelivery1
            $this->TypeofDelivery1->LinkCustomAttributes = "";
            $this->TypeofDelivery1->HrefValue = "";

            // ChildBlGrp1
            $this->ChildBlGrp1->LinkCustomAttributes = "";
            $this->ChildBlGrp1->HrefValue = "";

            // ApgarScore1
            $this->ApgarScore1->LinkCustomAttributes = "";
            $this->ApgarScore1->HrefValue = "";

            // birthnotification1
            $this->birthnotification1->LinkCustomAttributes = "";
            $this->birthnotification1->HrefValue = "";

            // formno1
            $this->formno1->LinkCustomAttributes = "";
            $this->formno1->HrefValue = "";

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

            // DrVisit1
            $this->DrVisit1->LinkCustomAttributes = "";
            $this->DrVisit1->HrefValue = "";

            // DrVisit2
            $this->DrVisit2->LinkCustomAttributes = "";
            $this->DrVisit2->HrefValue = "";

            // DrVisit3
            $this->DrVisit3->LinkCustomAttributes = "";
            $this->DrVisit3->HrefValue = "";

            // DrVisit4
            $this->DrVisit4->LinkCustomAttributes = "";
            $this->DrVisit4->HrefValue = "";

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

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
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
        if ($this->ObstetricsHistryFeMale->Required) {
            if (!$this->ObstetricsHistryFeMale->IsDetailKey && EmptyValue($this->ObstetricsHistryFeMale->FormValue)) {
                $this->ObstetricsHistryFeMale->addErrorMessage(str_replace("%s", $this->ObstetricsHistryFeMale->caption(), $this->ObstetricsHistryFeMale->RequiredErrorMessage));
            }
        }
        if ($this->Abortion->Required) {
            if (!$this->Abortion->IsDetailKey && EmptyValue($this->Abortion->FormValue)) {
                $this->Abortion->addErrorMessage(str_replace("%s", $this->Abortion->caption(), $this->Abortion->RequiredErrorMessage));
            }
        }
        if ($this->ChildBirthDate->Required) {
            if (!$this->ChildBirthDate->IsDetailKey && EmptyValue($this->ChildBirthDate->FormValue)) {
                $this->ChildBirthDate->addErrorMessage(str_replace("%s", $this->ChildBirthDate->caption(), $this->ChildBirthDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->ChildBirthDate->FormValue)) {
            $this->ChildBirthDate->addErrorMessage($this->ChildBirthDate->getErrorMessage(false));
        }
        if ($this->ChildBirthTime->Required) {
            if (!$this->ChildBirthTime->IsDetailKey && EmptyValue($this->ChildBirthTime->FormValue)) {
                $this->ChildBirthTime->addErrorMessage(str_replace("%s", $this->ChildBirthTime->caption(), $this->ChildBirthTime->RequiredErrorMessage));
            }
        }
        if ($this->ChildSex->Required) {
            if (!$this->ChildSex->IsDetailKey && EmptyValue($this->ChildSex->FormValue)) {
                $this->ChildSex->addErrorMessage(str_replace("%s", $this->ChildSex->caption(), $this->ChildSex->RequiredErrorMessage));
            }
        }
        if ($this->ChildWt->Required) {
            if (!$this->ChildWt->IsDetailKey && EmptyValue($this->ChildWt->FormValue)) {
                $this->ChildWt->addErrorMessage(str_replace("%s", $this->ChildWt->caption(), $this->ChildWt->RequiredErrorMessage));
            }
        }
        if ($this->ChildDay->Required) {
            if (!$this->ChildDay->IsDetailKey && EmptyValue($this->ChildDay->FormValue)) {
                $this->ChildDay->addErrorMessage(str_replace("%s", $this->ChildDay->caption(), $this->ChildDay->RequiredErrorMessage));
            }
        }
        if ($this->ChildOE->Required) {
            if (!$this->ChildOE->IsDetailKey && EmptyValue($this->ChildOE->FormValue)) {
                $this->ChildOE->addErrorMessage(str_replace("%s", $this->ChildOE->caption(), $this->ChildOE->RequiredErrorMessage));
            }
        }
        if ($this->TypeofDelivery->Required) {
            if (!$this->TypeofDelivery->IsDetailKey && EmptyValue($this->TypeofDelivery->FormValue)) {
                $this->TypeofDelivery->addErrorMessage(str_replace("%s", $this->TypeofDelivery->caption(), $this->TypeofDelivery->RequiredErrorMessage));
            }
        }
        if ($this->ChildBlGrp->Required) {
            if (!$this->ChildBlGrp->IsDetailKey && EmptyValue($this->ChildBlGrp->FormValue)) {
                $this->ChildBlGrp->addErrorMessage(str_replace("%s", $this->ChildBlGrp->caption(), $this->ChildBlGrp->RequiredErrorMessage));
            }
        }
        if ($this->ApgarScore->Required) {
            if (!$this->ApgarScore->IsDetailKey && EmptyValue($this->ApgarScore->FormValue)) {
                $this->ApgarScore->addErrorMessage(str_replace("%s", $this->ApgarScore->caption(), $this->ApgarScore->RequiredErrorMessage));
            }
        }
        if ($this->birthnotification->Required) {
            if (!$this->birthnotification->IsDetailKey && EmptyValue($this->birthnotification->FormValue)) {
                $this->birthnotification->addErrorMessage(str_replace("%s", $this->birthnotification->caption(), $this->birthnotification->RequiredErrorMessage));
            }
        }
        if ($this->formno->Required) {
            if (!$this->formno->IsDetailKey && EmptyValue($this->formno->FormValue)) {
                $this->formno->addErrorMessage(str_replace("%s", $this->formno->caption(), $this->formno->RequiredErrorMessage));
            }
        }
        if ($this->dte->Required) {
            if (!$this->dte->IsDetailKey && EmptyValue($this->dte->FormValue)) {
                $this->dte->addErrorMessage(str_replace("%s", $this->dte->caption(), $this->dte->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->dte->FormValue)) {
            $this->dte->addErrorMessage($this->dte->getErrorMessage(false));
        }
        if ($this->motherReligion->Required) {
            if (!$this->motherReligion->IsDetailKey && EmptyValue($this->motherReligion->FormValue)) {
                $this->motherReligion->addErrorMessage(str_replace("%s", $this->motherReligion->caption(), $this->motherReligion->RequiredErrorMessage));
            }
        }
        if ($this->bloodgroup->Required) {
            if (!$this->bloodgroup->IsDetailKey && EmptyValue($this->bloodgroup->FormValue)) {
                $this->bloodgroup->addErrorMessage(str_replace("%s", $this->bloodgroup->caption(), $this->bloodgroup->RequiredErrorMessage));
            }
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
        if (!CheckInteger($this->createdby->FormValue)) {
            $this->createdby->addErrorMessage($this->createdby->getErrorMessage(false));
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->modifiedby->FormValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->ChildBirthDate1->Required) {
            if (!$this->ChildBirthDate1->IsDetailKey && EmptyValue($this->ChildBirthDate1->FormValue)) {
                $this->ChildBirthDate1->addErrorMessage(str_replace("%s", $this->ChildBirthDate1->caption(), $this->ChildBirthDate1->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ChildBirthDate1->FormValue)) {
            $this->ChildBirthDate1->addErrorMessage($this->ChildBirthDate1->getErrorMessage(false));
        }
        if ($this->ChildBirthTime1->Required) {
            if (!$this->ChildBirthTime1->IsDetailKey && EmptyValue($this->ChildBirthTime1->FormValue)) {
                $this->ChildBirthTime1->addErrorMessage(str_replace("%s", $this->ChildBirthTime1->caption(), $this->ChildBirthTime1->RequiredErrorMessage));
            }
        }
        if ($this->ChildSex1->Required) {
            if (!$this->ChildSex1->IsDetailKey && EmptyValue($this->ChildSex1->FormValue)) {
                $this->ChildSex1->addErrorMessage(str_replace("%s", $this->ChildSex1->caption(), $this->ChildSex1->RequiredErrorMessage));
            }
        }
        if ($this->ChildWt1->Required) {
            if (!$this->ChildWt1->IsDetailKey && EmptyValue($this->ChildWt1->FormValue)) {
                $this->ChildWt1->addErrorMessage(str_replace("%s", $this->ChildWt1->caption(), $this->ChildWt1->RequiredErrorMessage));
            }
        }
        if ($this->ChildDay1->Required) {
            if (!$this->ChildDay1->IsDetailKey && EmptyValue($this->ChildDay1->FormValue)) {
                $this->ChildDay1->addErrorMessage(str_replace("%s", $this->ChildDay1->caption(), $this->ChildDay1->RequiredErrorMessage));
            }
        }
        if ($this->ChildOE1->Required) {
            if (!$this->ChildOE1->IsDetailKey && EmptyValue($this->ChildOE1->FormValue)) {
                $this->ChildOE1->addErrorMessage(str_replace("%s", $this->ChildOE1->caption(), $this->ChildOE1->RequiredErrorMessage));
            }
        }
        if ($this->TypeofDelivery1->Required) {
            if (!$this->TypeofDelivery1->IsDetailKey && EmptyValue($this->TypeofDelivery1->FormValue)) {
                $this->TypeofDelivery1->addErrorMessage(str_replace("%s", $this->TypeofDelivery1->caption(), $this->TypeofDelivery1->RequiredErrorMessage));
            }
        }
        if ($this->ChildBlGrp1->Required) {
            if (!$this->ChildBlGrp1->IsDetailKey && EmptyValue($this->ChildBlGrp1->FormValue)) {
                $this->ChildBlGrp1->addErrorMessage(str_replace("%s", $this->ChildBlGrp1->caption(), $this->ChildBlGrp1->RequiredErrorMessage));
            }
        }
        if ($this->ApgarScore1->Required) {
            if (!$this->ApgarScore1->IsDetailKey && EmptyValue($this->ApgarScore1->FormValue)) {
                $this->ApgarScore1->addErrorMessage(str_replace("%s", $this->ApgarScore1->caption(), $this->ApgarScore1->RequiredErrorMessage));
            }
        }
        if ($this->birthnotification1->Required) {
            if (!$this->birthnotification1->IsDetailKey && EmptyValue($this->birthnotification1->FormValue)) {
                $this->birthnotification1->addErrorMessage(str_replace("%s", $this->birthnotification1->caption(), $this->birthnotification1->RequiredErrorMessage));
            }
        }
        if ($this->formno1->Required) {
            if (!$this->formno1->IsDetailKey && EmptyValue($this->formno1->FormValue)) {
                $this->formno1->addErrorMessage(str_replace("%s", $this->formno1->caption(), $this->formno1->RequiredErrorMessage));
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
        if (!CheckEuroDate($this->surgeryEnded->FormValue)) {
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
        if ($this->DrVisit1->Required) {
            if (!$this->DrVisit1->IsDetailKey && EmptyValue($this->DrVisit1->FormValue)) {
                $this->DrVisit1->addErrorMessage(str_replace("%s", $this->DrVisit1->caption(), $this->DrVisit1->RequiredErrorMessage));
            }
        }
        if ($this->DrVisit2->Required) {
            if (!$this->DrVisit2->IsDetailKey && EmptyValue($this->DrVisit2->FormValue)) {
                $this->DrVisit2->addErrorMessage(str_replace("%s", $this->DrVisit2->caption(), $this->DrVisit2->RequiredErrorMessage));
            }
        }
        if ($this->DrVisit3->Required) {
            if (!$this->DrVisit3->IsDetailKey && EmptyValue($this->DrVisit3->FormValue)) {
                $this->DrVisit3->addErrorMessage(str_replace("%s", $this->DrVisit3->caption(), $this->DrVisit3->RequiredErrorMessage));
            }
        }
        if ($this->DrVisit4->Required) {
            if (!$this->DrVisit4->IsDetailKey && EmptyValue($this->DrVisit4->FormValue)) {
                $this->DrVisit4->addErrorMessage(str_replace("%s", $this->DrVisit4->caption(), $this->DrVisit4->RequiredErrorMessage));
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Reception->FormValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
        }
        if ($this->PId->Required) {
            if (!$this->PId->IsDetailKey && EmptyValue($this->PId->FormValue)) {
                $this->PId->addErrorMessage(str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PId->FormValue)) {
            $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
        }
        if ($this->PatientSearch->Required) {
            if (!$this->PatientSearch->IsDetailKey && EmptyValue($this->PatientSearch->FormValue)) {
                $this->PatientSearch->addErrorMessage(str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
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

            // PatID
            $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, $this->PatID->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // mrnno
            if ($this->mrnno->getSessionValue() != "") {
                $this->mrnno->ReadOnly = true;
            }
            $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, $this->mrnno->ReadOnly);

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // ObstetricsHistryFeMale
            $this->ObstetricsHistryFeMale->setDbValueDef($rsnew, $this->ObstetricsHistryFeMale->CurrentValue, null, $this->ObstetricsHistryFeMale->ReadOnly);

            // Abortion
            $this->Abortion->setDbValueDef($rsnew, $this->Abortion->CurrentValue, null, $this->Abortion->ReadOnly);

            // ChildBirthDate
            $this->ChildBirthDate->setDbValueDef($rsnew, UnFormatDateTime($this->ChildBirthDate->CurrentValue, 7), null, $this->ChildBirthDate->ReadOnly);

            // ChildBirthTime
            $this->ChildBirthTime->setDbValueDef($rsnew, $this->ChildBirthTime->CurrentValue, null, $this->ChildBirthTime->ReadOnly);

            // ChildSex
            $this->ChildSex->setDbValueDef($rsnew, $this->ChildSex->CurrentValue, null, $this->ChildSex->ReadOnly);

            // ChildWt
            $this->ChildWt->setDbValueDef($rsnew, $this->ChildWt->CurrentValue, null, $this->ChildWt->ReadOnly);

            // ChildDay
            $this->ChildDay->setDbValueDef($rsnew, $this->ChildDay->CurrentValue, null, $this->ChildDay->ReadOnly);

            // ChildOE
            $this->ChildOE->setDbValueDef($rsnew, $this->ChildOE->CurrentValue, null, $this->ChildOE->ReadOnly);

            // TypeofDelivery
            $this->TypeofDelivery->setDbValueDef($rsnew, $this->TypeofDelivery->CurrentValue, null, $this->TypeofDelivery->ReadOnly);

            // ChildBlGrp
            $this->ChildBlGrp->setDbValueDef($rsnew, $this->ChildBlGrp->CurrentValue, null, $this->ChildBlGrp->ReadOnly);

            // ApgarScore
            $this->ApgarScore->setDbValueDef($rsnew, $this->ApgarScore->CurrentValue, null, $this->ApgarScore->ReadOnly);

            // birthnotification
            $this->birthnotification->setDbValueDef($rsnew, $this->birthnotification->CurrentValue, null, $this->birthnotification->ReadOnly);

            // formno
            $this->formno->setDbValueDef($rsnew, $this->formno->CurrentValue, null, $this->formno->ReadOnly);

            // dte
            $this->dte->setDbValueDef($rsnew, UnFormatDateTime($this->dte->CurrentValue, 0), null, $this->dte->ReadOnly);

            // motherReligion
            $this->motherReligion->setDbValueDef($rsnew, $this->motherReligion->CurrentValue, null, $this->motherReligion->ReadOnly);

            // bloodgroup
            $this->bloodgroup->setDbValueDef($rsnew, $this->bloodgroup->CurrentValue, null, $this->bloodgroup->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // PatientID
            $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, $this->PatientID->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // ChildBirthDate1
            $this->ChildBirthDate1->setDbValueDef($rsnew, UnFormatDateTime($this->ChildBirthDate1->CurrentValue, 0), null, $this->ChildBirthDate1->ReadOnly);

            // ChildBirthTime1
            $this->ChildBirthTime1->setDbValueDef($rsnew, $this->ChildBirthTime1->CurrentValue, null, $this->ChildBirthTime1->ReadOnly);

            // ChildSex1
            $this->ChildSex1->setDbValueDef($rsnew, $this->ChildSex1->CurrentValue, null, $this->ChildSex1->ReadOnly);

            // ChildWt1
            $this->ChildWt1->setDbValueDef($rsnew, $this->ChildWt1->CurrentValue, null, $this->ChildWt1->ReadOnly);

            // ChildDay1
            $this->ChildDay1->setDbValueDef($rsnew, $this->ChildDay1->CurrentValue, null, $this->ChildDay1->ReadOnly);

            // ChildOE1
            $this->ChildOE1->setDbValueDef($rsnew, $this->ChildOE1->CurrentValue, null, $this->ChildOE1->ReadOnly);

            // TypeofDelivery1
            $this->TypeofDelivery1->setDbValueDef($rsnew, $this->TypeofDelivery1->CurrentValue, null, $this->TypeofDelivery1->ReadOnly);

            // ChildBlGrp1
            $this->ChildBlGrp1->setDbValueDef($rsnew, $this->ChildBlGrp1->CurrentValue, null, $this->ChildBlGrp1->ReadOnly);

            // ApgarScore1
            $this->ApgarScore1->setDbValueDef($rsnew, $this->ApgarScore1->CurrentValue, null, $this->ApgarScore1->ReadOnly);

            // birthnotification1
            $this->birthnotification1->setDbValueDef($rsnew, $this->birthnotification1->CurrentValue, null, $this->birthnotification1->ReadOnly);

            // formno1
            $this->formno1->setDbValueDef($rsnew, $this->formno1->CurrentValue, null, $this->formno1->ReadOnly);

            // proposedSurgery
            $this->proposedSurgery->setDbValueDef($rsnew, $this->proposedSurgery->CurrentValue, null, $this->proposedSurgery->ReadOnly);

            // surgeryProcedure
            $this->surgeryProcedure->setDbValueDef($rsnew, $this->surgeryProcedure->CurrentValue, null, $this->surgeryProcedure->ReadOnly);

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->setDbValueDef($rsnew, $this->typeOfAnaesthesia->CurrentValue, null, $this->typeOfAnaesthesia->ReadOnly);

            // RecievedTime
            $this->RecievedTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecievedTime->CurrentValue, 11), null, $this->RecievedTime->ReadOnly);

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11), null, $this->AnaesthesiaStarted->ReadOnly);

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11), null, $this->AnaesthesiaEnded->ReadOnly);

            // surgeryStarted
            $this->surgeryStarted->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryStarted->CurrentValue, 11), null, $this->surgeryStarted->ReadOnly);

            // surgeryEnded
            $this->surgeryEnded->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryEnded->CurrentValue, 11), null, $this->surgeryEnded->ReadOnly);

            // RecoveryTime
            $this->RecoveryTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecoveryTime->CurrentValue, 11), null, $this->RecoveryTime->ReadOnly);

            // ShiftedTime
            $this->ShiftedTime->setDbValueDef($rsnew, UnFormatDateTime($this->ShiftedTime->CurrentValue, 11), null, $this->ShiftedTime->ReadOnly);

            // Duration
            $this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, null, $this->Duration->ReadOnly);

            // DrVisit1
            $this->DrVisit1->setDbValueDef($rsnew, $this->DrVisit1->CurrentValue, null, $this->DrVisit1->ReadOnly);

            // DrVisit2
            $this->DrVisit2->setDbValueDef($rsnew, $this->DrVisit2->CurrentValue, null, $this->DrVisit2->ReadOnly);

            // DrVisit3
            $this->DrVisit3->setDbValueDef($rsnew, $this->DrVisit3->CurrentValue, null, $this->DrVisit3->ReadOnly);

            // DrVisit4
            $this->DrVisit4->setDbValueDef($rsnew, $this->DrVisit4->CurrentValue, null, $this->DrVisit4->ReadOnly);

            // Surgeon
            $this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, null, $this->Surgeon->ReadOnly);

            // Anaesthetist
            $this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, null, $this->Anaesthetist->ReadOnly);

            // AsstSurgeon1
            $this->AsstSurgeon1->setDbValueDef($rsnew, $this->AsstSurgeon1->CurrentValue, null, $this->AsstSurgeon1->ReadOnly);

            // AsstSurgeon2
            $this->AsstSurgeon2->setDbValueDef($rsnew, $this->AsstSurgeon2->CurrentValue, null, $this->AsstSurgeon2->ReadOnly);

            // paediatric
            $this->paediatric->setDbValueDef($rsnew, $this->paediatric->CurrentValue, null, $this->paediatric->ReadOnly);

            // ScrubNurse1
            $this->ScrubNurse1->setDbValueDef($rsnew, $this->ScrubNurse1->CurrentValue, null, $this->ScrubNurse1->ReadOnly);

            // ScrubNurse2
            $this->ScrubNurse2->setDbValueDef($rsnew, $this->ScrubNurse2->CurrentValue, null, $this->ScrubNurse2->ReadOnly);

            // FloorNurse
            $this->FloorNurse->setDbValueDef($rsnew, $this->FloorNurse->CurrentValue, null, $this->FloorNurse->ReadOnly);

            // Technician
            $this->Technician->setDbValueDef($rsnew, $this->Technician->CurrentValue, null, $this->Technician->ReadOnly);

            // HouseKeeping
            $this->HouseKeeping->setDbValueDef($rsnew, $this->HouseKeeping->CurrentValue, null, $this->HouseKeeping->ReadOnly);

            // countsCheckedMops
            $this->countsCheckedMops->setDbValueDef($rsnew, $this->countsCheckedMops->CurrentValue, null, $this->countsCheckedMops->ReadOnly);

            // gauze
            $this->gauze->setDbValueDef($rsnew, $this->gauze->CurrentValue, null, $this->gauze->ReadOnly);

            // needles
            $this->needles->setDbValueDef($rsnew, $this->needles->CurrentValue, null, $this->needles->ReadOnly);

            // bloodloss
            $this->bloodloss->setDbValueDef($rsnew, $this->bloodloss->CurrentValue, null, $this->bloodloss->ReadOnly);

            // bloodtransfusion
            $this->bloodtransfusion->setDbValueDef($rsnew, $this->bloodtransfusion->CurrentValue, null, $this->bloodtransfusion->ReadOnly);

            // implantsUsed
            $this->implantsUsed->setDbValueDef($rsnew, $this->implantsUsed->CurrentValue, null, $this->implantsUsed->ReadOnly);

            // MaterialsForHPE
            $this->MaterialsForHPE->setDbValueDef($rsnew, $this->MaterialsForHPE->CurrentValue, null, $this->MaterialsForHPE->ReadOnly);

            // Reception
            if ($this->Reception->getSessionValue() != "") {
                $this->Reception->ReadOnly = true;
            }
            $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, $this->Reception->ReadOnly);

            // PId
            if ($this->PId->getSessionValue() != "") {
                $this->PId->ReadOnly = true;
            }
            $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, $this->PId->ReadOnly);

            // PatientSearch
            $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", $this->PatientSearch->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientOtDeliveryRegisterList"), "", $this->TableVar, true);
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
                case "x_DrVisit1":
                    break;
                case "x_DrVisit2":
                    break;
                case "x_DrVisit3":
                    break;
                case "x_DrVisit4":
                    break;
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
