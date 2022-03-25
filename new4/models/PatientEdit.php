<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientEdit extends Patient
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient';

    // Page object name
    public $PageObjName = "PatientEdit";

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

        // Table object (patient)
        if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
            $GLOBALS["patient"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');
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
                $doc = new $class(Container("patient"));
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
                    if ($pageName == "PatientView") {
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
        $this->PatientID->setVisibility();
        $this->title->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->dob->setVisibility();
        $this->Age->setVisibility();
        $this->blood_group->setVisibility();
        $this->mobile_no->setVisibility();
        $this->description->setVisibility();
        $this->status->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->profilePic->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->Religion->setVisibility();
        $this->Nationality->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->spouse_title->setVisibility();
        $this->spouse_first_name->setVisibility();
        $this->spouse_middle_name->setVisibility();
        $this->spouse_last_name->setVisibility();
        $this->spouse_gender->setVisibility();
        $this->spouse_dob->setVisibility();
        $this->spouse_Age->setVisibility();
        $this->spouse_blood_group->setVisibility();
        $this->spouse_mobile_no->setVisibility();
        $this->Maritalstatus->setVisibility();
        $this->Business->setVisibility();
        $this->Patient_Language->setVisibility();
        $this->Passport->setVisibility();
        $this->VisaNo->setVisibility();
        $this->ValidityOfVisa->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->street->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->country->setVisibility();
        $this->postal_code->setVisibility();
        $this->PEmail->setVisibility();
        $this->PEmergencyContact->setVisibility();
        $this->occupation->setVisibility();
        $this->spouse_occupation->setVisibility();
        $this->WhatsApp->setVisibility();
        $this->CouppleID->setVisibility();
        $this->MaleID->setVisibility();
        $this->FemaleID->setVisibility();
        $this->GroupID->setVisibility();
        $this->Relationship->setVisibility();
        $this->AppointmentSearch->setVisibility();
        $this->FacebookID->setVisibility();
        $this->profilePicImage->setVisibility();
        $this->Clients->setVisibility();
        $this->hideFieldsForAddEdit();
        $this->PatientID->Required = false;

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->title);
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->blood_group);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->ReferedByDr);
        $this->setupLookupOptions($this->ReferA4TreatingConsultant);
        $this->setupLookupOptions($this->spouse_title);
        $this->setupLookupOptions($this->spouse_gender);
        $this->setupLookupOptions($this->spouse_blood_group);
        $this->setupLookupOptions($this->Maritalstatus);
        $this->setupLookupOptions($this->Business);
        $this->setupLookupOptions($this->Patient_Language);
        $this->setupLookupOptions($this->WhereDidYouHear);
        $this->setupLookupOptions($this->HospID);
        $this->setupLookupOptions($this->AppointmentSearch);

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

            // Set up detail parameters
            $this->setupDetailParms();
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
                    $this->terminate("PatientList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "update": // Update
                if ($this->getCurrentDetailTable() != "") { // Master/detail edit
                    $returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
                } else {
                    $returnUrl = $this->getReturnUrl();
                }
                if (GetPageName($returnUrl) == "PatientList") {
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

                    // Set up detail parameters
                    $this->setupDetailParms();
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
        $this->profilePic->Upload->Index = $CurrentForm->Index;
        $this->profilePic->Upload->uploadFile();
        $this->profilePic->CurrentValue = $this->profilePic->Upload->FileName;
        $this->profilePicImage->Upload->Index = $CurrentForm->Index;
        $this->profilePicImage->Upload->uploadFile();
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

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
            }
        }

        // Check field name 'title' first before field var 'x_title'
        $val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x_title");
        if (!$this->title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->title->Visible = false; // Disable update for API request
            } else {
                $this->title->setFormValue($val);
            }
        }

        // Check field name 'first_name' first before field var 'x_first_name'
        $val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
        if (!$this->first_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->first_name->Visible = false; // Disable update for API request
            } else {
                $this->first_name->setFormValue($val);
            }
        }

        // Check field name 'middle_name' first before field var 'x_middle_name'
        $val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
        if (!$this->middle_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->middle_name->Visible = false; // Disable update for API request
            } else {
                $this->middle_name->setFormValue($val);
            }
        }

        // Check field name 'last_name' first before field var 'x_last_name'
        $val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
        if (!$this->last_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->last_name->Visible = false; // Disable update for API request
            } else {
                $this->last_name->setFormValue($val);
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

        // Check field name 'dob' first before field var 'x_dob'
        $val = $CurrentForm->hasValue("dob") ? $CurrentForm->getValue("dob") : $CurrentForm->getValue("x_dob");
        if (!$this->dob->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->dob->Visible = false; // Disable update for API request
            } else {
                $this->dob->setFormValue($val);
            }
            $this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 7);
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

        // Check field name 'blood_group' first before field var 'x_blood_group'
        $val = $CurrentForm->hasValue("blood_group") ? $CurrentForm->getValue("blood_group") : $CurrentForm->getValue("x_blood_group");
        if (!$this->blood_group->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->blood_group->Visible = false; // Disable update for API request
            } else {
                $this->blood_group->setFormValue($val);
            }
        }

        // Check field name 'mobile_no' first before field var 'x_mobile_no'
        $val = $CurrentForm->hasValue("mobile_no") ? $CurrentForm->getValue("mobile_no") : $CurrentForm->getValue("x_mobile_no");
        if (!$this->mobile_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobile_no->Visible = false; // Disable update for API request
            } else {
                $this->mobile_no->setFormValue($val);
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

        // Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
        $val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
        if (!$this->IdentificationMark->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IdentificationMark->Visible = false; // Disable update for API request
            } else {
                $this->IdentificationMark->setFormValue($val);
            }
        }

        // Check field name 'Religion' first before field var 'x_Religion'
        $val = $CurrentForm->hasValue("Religion") ? $CurrentForm->getValue("Religion") : $CurrentForm->getValue("x_Religion");
        if (!$this->Religion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Religion->Visible = false; // Disable update for API request
            } else {
                $this->Religion->setFormValue($val);
            }
        }

        // Check field name 'Nationality' first before field var 'x_Nationality'
        $val = $CurrentForm->hasValue("Nationality") ? $CurrentForm->getValue("Nationality") : $CurrentForm->getValue("x_Nationality");
        if (!$this->Nationality->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Nationality->Visible = false; // Disable update for API request
            } else {
                $this->Nationality->setFormValue($val);
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

        // Check field name 'spouse_title' first before field var 'x_spouse_title'
        $val = $CurrentForm->hasValue("spouse_title") ? $CurrentForm->getValue("spouse_title") : $CurrentForm->getValue("x_spouse_title");
        if (!$this->spouse_title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_title->Visible = false; // Disable update for API request
            } else {
                $this->spouse_title->setFormValue($val);
            }
        }

        // Check field name 'spouse_first_name' first before field var 'x_spouse_first_name'
        $val = $CurrentForm->hasValue("spouse_first_name") ? $CurrentForm->getValue("spouse_first_name") : $CurrentForm->getValue("x_spouse_first_name");
        if (!$this->spouse_first_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_first_name->Visible = false; // Disable update for API request
            } else {
                $this->spouse_first_name->setFormValue($val);
            }
        }

        // Check field name 'spouse_middle_name' first before field var 'x_spouse_middle_name'
        $val = $CurrentForm->hasValue("spouse_middle_name") ? $CurrentForm->getValue("spouse_middle_name") : $CurrentForm->getValue("x_spouse_middle_name");
        if (!$this->spouse_middle_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_middle_name->Visible = false; // Disable update for API request
            } else {
                $this->spouse_middle_name->setFormValue($val);
            }
        }

        // Check field name 'spouse_last_name' first before field var 'x_spouse_last_name'
        $val = $CurrentForm->hasValue("spouse_last_name") ? $CurrentForm->getValue("spouse_last_name") : $CurrentForm->getValue("x_spouse_last_name");
        if (!$this->spouse_last_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_last_name->Visible = false; // Disable update for API request
            } else {
                $this->spouse_last_name->setFormValue($val);
            }
        }

        // Check field name 'spouse_gender' first before field var 'x_spouse_gender'
        $val = $CurrentForm->hasValue("spouse_gender") ? $CurrentForm->getValue("spouse_gender") : $CurrentForm->getValue("x_spouse_gender");
        if (!$this->spouse_gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_gender->Visible = false; // Disable update for API request
            } else {
                $this->spouse_gender->setFormValue($val);
            }
        }

        // Check field name 'spouse_dob' first before field var 'x_spouse_dob'
        $val = $CurrentForm->hasValue("spouse_dob") ? $CurrentForm->getValue("spouse_dob") : $CurrentForm->getValue("x_spouse_dob");
        if (!$this->spouse_dob->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_dob->Visible = false; // Disable update for API request
            } else {
                $this->spouse_dob->setFormValue($val);
            }
            $this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 7);
        }

        // Check field name 'spouse_Age' first before field var 'x_spouse_Age'
        $val = $CurrentForm->hasValue("spouse_Age") ? $CurrentForm->getValue("spouse_Age") : $CurrentForm->getValue("x_spouse_Age");
        if (!$this->spouse_Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_Age->Visible = false; // Disable update for API request
            } else {
                $this->spouse_Age->setFormValue($val);
            }
        }

        // Check field name 'spouse_blood_group' first before field var 'x_spouse_blood_group'
        $val = $CurrentForm->hasValue("spouse_blood_group") ? $CurrentForm->getValue("spouse_blood_group") : $CurrentForm->getValue("x_spouse_blood_group");
        if (!$this->spouse_blood_group->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_blood_group->Visible = false; // Disable update for API request
            } else {
                $this->spouse_blood_group->setFormValue($val);
            }
        }

        // Check field name 'spouse_mobile_no' first before field var 'x_spouse_mobile_no'
        $val = $CurrentForm->hasValue("spouse_mobile_no") ? $CurrentForm->getValue("spouse_mobile_no") : $CurrentForm->getValue("x_spouse_mobile_no");
        if (!$this->spouse_mobile_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_mobile_no->Visible = false; // Disable update for API request
            } else {
                $this->spouse_mobile_no->setFormValue($val);
            }
        }

        // Check field name 'Maritalstatus' first before field var 'x_Maritalstatus'
        $val = $CurrentForm->hasValue("Maritalstatus") ? $CurrentForm->getValue("Maritalstatus") : $CurrentForm->getValue("x_Maritalstatus");
        if (!$this->Maritalstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Maritalstatus->Visible = false; // Disable update for API request
            } else {
                $this->Maritalstatus->setFormValue($val);
            }
        }

        // Check field name 'Business' first before field var 'x_Business'
        $val = $CurrentForm->hasValue("Business") ? $CurrentForm->getValue("Business") : $CurrentForm->getValue("x_Business");
        if (!$this->Business->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Business->Visible = false; // Disable update for API request
            } else {
                $this->Business->setFormValue($val);
            }
        }

        // Check field name 'Patient_Language' first before field var 'x_Patient_Language'
        $val = $CurrentForm->hasValue("Patient_Language") ? $CurrentForm->getValue("Patient_Language") : $CurrentForm->getValue("x_Patient_Language");
        if (!$this->Patient_Language->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Patient_Language->Visible = false; // Disable update for API request
            } else {
                $this->Patient_Language->setFormValue($val);
            }
        }

        // Check field name 'Passport' first before field var 'x_Passport'
        $val = $CurrentForm->hasValue("Passport") ? $CurrentForm->getValue("Passport") : $CurrentForm->getValue("x_Passport");
        if (!$this->Passport->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Passport->Visible = false; // Disable update for API request
            } else {
                $this->Passport->setFormValue($val);
            }
        }

        // Check field name 'VisaNo' first before field var 'x_VisaNo'
        $val = $CurrentForm->hasValue("VisaNo") ? $CurrentForm->getValue("VisaNo") : $CurrentForm->getValue("x_VisaNo");
        if (!$this->VisaNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisaNo->Visible = false; // Disable update for API request
            } else {
                $this->VisaNo->setFormValue($val);
            }
        }

        // Check field name 'ValidityOfVisa' first before field var 'x_ValidityOfVisa'
        $val = $CurrentForm->hasValue("ValidityOfVisa") ? $CurrentForm->getValue("ValidityOfVisa") : $CurrentForm->getValue("x_ValidityOfVisa");
        if (!$this->ValidityOfVisa->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ValidityOfVisa->Visible = false; // Disable update for API request
            } else {
                $this->ValidityOfVisa->setFormValue($val);
            }
        }

        // Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
        $val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
        if (!$this->WhereDidYouHear->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WhereDidYouHear->Visible = false; // Disable update for API request
            } else {
                $this->WhereDidYouHear->setFormValue($val);
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

        // Check field name 'street' first before field var 'x_street'
        $val = $CurrentForm->hasValue("street") ? $CurrentForm->getValue("street") : $CurrentForm->getValue("x_street");
        if (!$this->street->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->street->Visible = false; // Disable update for API request
            } else {
                $this->street->setFormValue($val);
            }
        }

        // Check field name 'town' first before field var 'x_town'
        $val = $CurrentForm->hasValue("town") ? $CurrentForm->getValue("town") : $CurrentForm->getValue("x_town");
        if (!$this->town->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->town->Visible = false; // Disable update for API request
            } else {
                $this->town->setFormValue($val);
            }
        }

        // Check field name 'province' first before field var 'x_province'
        $val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
        if (!$this->province->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->province->Visible = false; // Disable update for API request
            } else {
                $this->province->setFormValue($val);
            }
        }

        // Check field name 'country' first before field var 'x_country'
        $val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
        if (!$this->country->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->country->Visible = false; // Disable update for API request
            } else {
                $this->country->setFormValue($val);
            }
        }

        // Check field name 'postal_code' first before field var 'x_postal_code'
        $val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
        if (!$this->postal_code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postal_code->Visible = false; // Disable update for API request
            } else {
                $this->postal_code->setFormValue($val);
            }
        }

        // Check field name 'PEmail' first before field var 'x_PEmail'
        $val = $CurrentForm->hasValue("PEmail") ? $CurrentForm->getValue("PEmail") : $CurrentForm->getValue("x_PEmail");
        if (!$this->PEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PEmail->Visible = false; // Disable update for API request
            } else {
                $this->PEmail->setFormValue($val);
            }
        }

        // Check field name 'PEmergencyContact' first before field var 'x_PEmergencyContact'
        $val = $CurrentForm->hasValue("PEmergencyContact") ? $CurrentForm->getValue("PEmergencyContact") : $CurrentForm->getValue("x_PEmergencyContact");
        if (!$this->PEmergencyContact->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PEmergencyContact->Visible = false; // Disable update for API request
            } else {
                $this->PEmergencyContact->setFormValue($val);
            }
        }

        // Check field name 'occupation' first before field var 'x_occupation'
        $val = $CurrentForm->hasValue("occupation") ? $CurrentForm->getValue("occupation") : $CurrentForm->getValue("x_occupation");
        if (!$this->occupation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->occupation->Visible = false; // Disable update for API request
            } else {
                $this->occupation->setFormValue($val);
            }
        }

        // Check field name 'spouse_occupation' first before field var 'x_spouse_occupation'
        $val = $CurrentForm->hasValue("spouse_occupation") ? $CurrentForm->getValue("spouse_occupation") : $CurrentForm->getValue("x_spouse_occupation");
        if (!$this->spouse_occupation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_occupation->Visible = false; // Disable update for API request
            } else {
                $this->spouse_occupation->setFormValue($val);
            }
        }

        // Check field name 'WhatsApp' first before field var 'x_WhatsApp'
        $val = $CurrentForm->hasValue("WhatsApp") ? $CurrentForm->getValue("WhatsApp") : $CurrentForm->getValue("x_WhatsApp");
        if (!$this->WhatsApp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WhatsApp->Visible = false; // Disable update for API request
            } else {
                $this->WhatsApp->setFormValue($val);
            }
        }

        // Check field name 'CouppleID' first before field var 'x_CouppleID'
        $val = $CurrentForm->hasValue("CouppleID") ? $CurrentForm->getValue("CouppleID") : $CurrentForm->getValue("x_CouppleID");
        if (!$this->CouppleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CouppleID->Visible = false; // Disable update for API request
            } else {
                $this->CouppleID->setFormValue($val);
            }
        }

        // Check field name 'MaleID' first before field var 'x_MaleID'
        $val = $CurrentForm->hasValue("MaleID") ? $CurrentForm->getValue("MaleID") : $CurrentForm->getValue("x_MaleID");
        if (!$this->MaleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaleID->Visible = false; // Disable update for API request
            } else {
                $this->MaleID->setFormValue($val);
            }
        }

        // Check field name 'FemaleID' first before field var 'x_FemaleID'
        $val = $CurrentForm->hasValue("FemaleID") ? $CurrentForm->getValue("FemaleID") : $CurrentForm->getValue("x_FemaleID");
        if (!$this->FemaleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FemaleID->Visible = false; // Disable update for API request
            } else {
                $this->FemaleID->setFormValue($val);
            }
        }

        // Check field name 'GroupID' first before field var 'x_GroupID'
        $val = $CurrentForm->hasValue("GroupID") ? $CurrentForm->getValue("GroupID") : $CurrentForm->getValue("x_GroupID");
        if (!$this->GroupID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupID->Visible = false; // Disable update for API request
            } else {
                $this->GroupID->setFormValue($val);
            }
        }

        // Check field name 'Relationship' first before field var 'x_Relationship'
        $val = $CurrentForm->hasValue("Relationship") ? $CurrentForm->getValue("Relationship") : $CurrentForm->getValue("x_Relationship");
        if (!$this->Relationship->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Relationship->Visible = false; // Disable update for API request
            } else {
                $this->Relationship->setFormValue($val);
            }
        }

        // Check field name 'AppointmentSearch' first before field var 'x_AppointmentSearch'
        $val = $CurrentForm->hasValue("AppointmentSearch") ? $CurrentForm->getValue("AppointmentSearch") : $CurrentForm->getValue("x_AppointmentSearch");
        if (!$this->AppointmentSearch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AppointmentSearch->Visible = false; // Disable update for API request
            } else {
                $this->AppointmentSearch->setFormValue($val);
            }
        }

        // Check field name 'FacebookID' first before field var 'x_FacebookID'
        $val = $CurrentForm->hasValue("FacebookID") ? $CurrentForm->getValue("FacebookID") : $CurrentForm->getValue("x_FacebookID");
        if (!$this->FacebookID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FacebookID->Visible = false; // Disable update for API request
            } else {
                $this->FacebookID->setFormValue($val);
            }
        }

        // Check field name 'Clients' first before field var 'x_Clients'
        $val = $CurrentForm->hasValue("Clients") ? $CurrentForm->getValue("Clients") : $CurrentForm->getValue("x_Clients");
        if (!$this->Clients->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Clients->Visible = false; // Disable update for API request
            } else {
                $this->Clients->setFormValue($val);
            }
        }
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->title->CurrentValue = $this->title->FormValue;
        $this->first_name->CurrentValue = $this->first_name->FormValue;
        $this->middle_name->CurrentValue = $this->middle_name->FormValue;
        $this->last_name->CurrentValue = $this->last_name->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->dob->CurrentValue = $this->dob->FormValue;
        $this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 7);
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->blood_group->CurrentValue = $this->blood_group->FormValue;
        $this->mobile_no->CurrentValue = $this->mobile_no->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
        $this->Religion->CurrentValue = $this->Religion->FormValue;
        $this->Nationality->CurrentValue = $this->Nationality->FormValue;
        $this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
        $this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
        $this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
        $this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
        $this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
        $this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
        $this->spouse_title->CurrentValue = $this->spouse_title->FormValue;
        $this->spouse_first_name->CurrentValue = $this->spouse_first_name->FormValue;
        $this->spouse_middle_name->CurrentValue = $this->spouse_middle_name->FormValue;
        $this->spouse_last_name->CurrentValue = $this->spouse_last_name->FormValue;
        $this->spouse_gender->CurrentValue = $this->spouse_gender->FormValue;
        $this->spouse_dob->CurrentValue = $this->spouse_dob->FormValue;
        $this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 7);
        $this->spouse_Age->CurrentValue = $this->spouse_Age->FormValue;
        $this->spouse_blood_group->CurrentValue = $this->spouse_blood_group->FormValue;
        $this->spouse_mobile_no->CurrentValue = $this->spouse_mobile_no->FormValue;
        $this->Maritalstatus->CurrentValue = $this->Maritalstatus->FormValue;
        $this->Business->CurrentValue = $this->Business->FormValue;
        $this->Patient_Language->CurrentValue = $this->Patient_Language->FormValue;
        $this->Passport->CurrentValue = $this->Passport->FormValue;
        $this->VisaNo->CurrentValue = $this->VisaNo->FormValue;
        $this->ValidityOfVisa->CurrentValue = $this->ValidityOfVisa->FormValue;
        $this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->street->CurrentValue = $this->street->FormValue;
        $this->town->CurrentValue = $this->town->FormValue;
        $this->province->CurrentValue = $this->province->FormValue;
        $this->country->CurrentValue = $this->country->FormValue;
        $this->postal_code->CurrentValue = $this->postal_code->FormValue;
        $this->PEmail->CurrentValue = $this->PEmail->FormValue;
        $this->PEmergencyContact->CurrentValue = $this->PEmergencyContact->FormValue;
        $this->occupation->CurrentValue = $this->occupation->FormValue;
        $this->spouse_occupation->CurrentValue = $this->spouse_occupation->FormValue;
        $this->WhatsApp->CurrentValue = $this->WhatsApp->FormValue;
        $this->CouppleID->CurrentValue = $this->CouppleID->FormValue;
        $this->MaleID->CurrentValue = $this->MaleID->FormValue;
        $this->FemaleID->CurrentValue = $this->FemaleID->FormValue;
        $this->GroupID->CurrentValue = $this->GroupID->FormValue;
        $this->Relationship->CurrentValue = $this->Relationship->FormValue;
        $this->AppointmentSearch->CurrentValue = $this->AppointmentSearch->FormValue;
        $this->FacebookID->CurrentValue = $this->FacebookID->FormValue;
        $this->Clients->CurrentValue = $this->Clients->FormValue;
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->Age->setDbValue($row['Age']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->profilePic->Upload->DbValue = $row['profilePic'];
        $this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
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
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->spouse_title->setDbValue($row['spouse_title']);
        $this->spouse_first_name->setDbValue($row['spouse_first_name']);
        $this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
        $this->spouse_last_name->setDbValue($row['spouse_last_name']);
        $this->spouse_gender->setDbValue($row['spouse_gender']);
        $this->spouse_dob->setDbValue($row['spouse_dob']);
        $this->spouse_Age->setDbValue($row['spouse_Age']);
        $this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
        $this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
        $this->Maritalstatus->setDbValue($row['Maritalstatus']);
        $this->Business->setDbValue($row['Business']);
        $this->Patient_Language->setDbValue($row['Patient_Language']);
        $this->Passport->setDbValue($row['Passport']);
        $this->VisaNo->setDbValue($row['VisaNo']);
        $this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->street->setDbValue($row['street']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->country->setDbValue($row['country']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->PEmail->setDbValue($row['PEmail']);
        $this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
        $this->occupation->setDbValue($row['occupation']);
        $this->spouse_occupation->setDbValue($row['spouse_occupation']);
        $this->WhatsApp->setDbValue($row['WhatsApp']);
        $this->CouppleID->setDbValue($row['CouppleID']);
        $this->MaleID->setDbValue($row['MaleID']);
        $this->FemaleID->setDbValue($row['FemaleID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->Relationship->setDbValue($row['Relationship']);
        $this->AppointmentSearch->setDbValue($row['AppointmentSearch']);
        $this->FacebookID->setDbValue($row['FacebookID']);
        $this->profilePicImage->Upload->DbValue = $row['profilePicImage'];
        if (is_resource($this->profilePicImage->Upload->DbValue) && get_resource_type($this->profilePicImage->Upload->DbValue) == "stream") { // Byte array
            $this->profilePicImage->Upload->DbValue = stream_get_contents($this->profilePicImage->Upload->DbValue);
        }
        $this->Clients->setDbValue($row['Clients']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatientID'] = null;
        $row['title'] = null;
        $row['first_name'] = null;
        $row['middle_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['dob'] = null;
        $row['Age'] = null;
        $row['blood_group'] = null;
        $row['mobile_no'] = null;
        $row['description'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['profilePic'] = null;
        $row['IdentificationMark'] = null;
        $row['Religion'] = null;
        $row['Nationality'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['spouse_title'] = null;
        $row['spouse_first_name'] = null;
        $row['spouse_middle_name'] = null;
        $row['spouse_last_name'] = null;
        $row['spouse_gender'] = null;
        $row['spouse_dob'] = null;
        $row['spouse_Age'] = null;
        $row['spouse_blood_group'] = null;
        $row['spouse_mobile_no'] = null;
        $row['Maritalstatus'] = null;
        $row['Business'] = null;
        $row['Patient_Language'] = null;
        $row['Passport'] = null;
        $row['VisaNo'] = null;
        $row['ValidityOfVisa'] = null;
        $row['WhereDidYouHear'] = null;
        $row['HospID'] = null;
        $row['street'] = null;
        $row['town'] = null;
        $row['province'] = null;
        $row['country'] = null;
        $row['postal_code'] = null;
        $row['PEmail'] = null;
        $row['PEmergencyContact'] = null;
        $row['occupation'] = null;
        $row['spouse_occupation'] = null;
        $row['WhatsApp'] = null;
        $row['CouppleID'] = null;
        $row['MaleID'] = null;
        $row['FemaleID'] = null;
        $row['GroupID'] = null;
        $row['Relationship'] = null;
        $row['AppointmentSearch'] = null;
        $row['FacebookID'] = null;
        $row['profilePicImage'] = null;
        $row['Clients'] = null;
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

        // PatientID

        // title

        // first_name

        // middle_name

        // last_name

        // gender

        // dob

        // Age

        // blood_group

        // mobile_no

        // description

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // profilePic

        // IdentificationMark

        // Religion

        // Nationality

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // spouse_title

        // spouse_first_name

        // spouse_middle_name

        // spouse_last_name

        // spouse_gender

        // spouse_dob

        // spouse_Age

        // spouse_blood_group

        // spouse_mobile_no

        // Maritalstatus

        // Business

        // Patient_Language

        // Passport

        // VisaNo

        // ValidityOfVisa

        // WhereDidYouHear

        // HospID

        // street

        // town

        // province

        // country

        // postal_code

        // PEmail

        // PEmergencyContact

        // occupation

        // spouse_occupation

        // WhatsApp

        // CouppleID

        // MaleID

        // FemaleID

        // GroupID

        // Relationship

        // AppointmentSearch

        // FacebookID

        // profilePicImage

        // Clients
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // title
            $curVal = trim(strval($this->title->CurrentValue));
            if ($curVal != "") {
                $this->title->ViewValue = $this->title->lookupCacheOption($curVal);
                if ($this->title->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->title->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->title->Lookup->renderViewRow($rswrk[0]);
                        $this->title->ViewValue = $this->title->displayValue($arwrk);
                    } else {
                        $this->title->ViewValue = $this->title->CurrentValue;
                    }
                }
            } else {
                $this->title->ViewValue = null;
            }
            $this->title->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
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

            // dob
            $this->dob->ViewValue = $this->dob->CurrentValue;
            $this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
            $this->dob->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // blood_group
            $curVal = trim(strval($this->blood_group->CurrentValue));
            if ($curVal != "") {
                $this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
                if ($this->blood_group->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->blood_group->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->blood_group->Lookup->renderViewRow($rswrk[0]);
                        $this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
                    } else {
                        $this->blood_group->ViewValue = $this->blood_group->CurrentValue;
                    }
                }
            } else {
                $this->blood_group->ViewValue = null;
            }
            $this->blood_group->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

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

            // profilePic
            if (!EmptyValue($this->profilePic->Upload->DbValue)) {
                $this->profilePic->ImageWidth = 80;
                $this->profilePic->ImageHeight = 80;
                $this->profilePic->ImageAlt = $this->profilePic->alt();
                $this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
            } else {
                $this->profilePic->ViewValue = "";
            }
            $this->profilePic->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Nationality
            $this->Nationality->ViewValue = $this->Nationality->CurrentValue;
            $this->Nationality->ViewCustomAttributes = "";

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
            $curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
            if ($curVal != "") {
                $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
                if ($this->ReferA4TreatingConsultant->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
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
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // spouse_title
            $curVal = trim(strval($this->spouse_title->CurrentValue));
            if ($curVal != "") {
                $this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
                if ($this->spouse_title->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->spouse_title->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->spouse_title->Lookup->renderViewRow($rswrk[0]);
                        $this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
                    } else {
                        $this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
                    }
                }
            } else {
                $this->spouse_title->ViewValue = null;
            }
            $this->spouse_title->ViewCustomAttributes = "";

            // spouse_first_name
            $this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
            $this->spouse_first_name->ViewCustomAttributes = "";

            // spouse_middle_name
            $this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
            $this->spouse_middle_name->ViewCustomAttributes = "";

            // spouse_last_name
            $this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
            $this->spouse_last_name->ViewCustomAttributes = "";

            // spouse_gender
            $curVal = trim(strval($this->spouse_gender->CurrentValue));
            if ($curVal != "") {
                $this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
                if ($this->spouse_gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->spouse_gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->spouse_gender->Lookup->renderViewRow($rswrk[0]);
                        $this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
                    } else {
                        $this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
                    }
                }
            } else {
                $this->spouse_gender->ViewValue = null;
            }
            $this->spouse_gender->ViewCustomAttributes = "";

            // spouse_dob
            $this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
            $this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
            $this->spouse_dob->ViewCustomAttributes = "";

            // spouse_Age
            $this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
            $this->spouse_Age->ViewCustomAttributes = "";

            // spouse_blood_group
            $curVal = trim(strval($this->spouse_blood_group->CurrentValue));
            if ($curVal != "") {
                $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
                if ($this->spouse_blood_group->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->spouse_blood_group->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->spouse_blood_group->Lookup->renderViewRow($rswrk[0]);
                        $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
                    } else {
                        $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
                    }
                }
            } else {
                $this->spouse_blood_group->ViewValue = null;
            }
            $this->spouse_blood_group->ViewCustomAttributes = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
            $this->spouse_mobile_no->ViewCustomAttributes = "";

            // Maritalstatus
            $curVal = trim(strval($this->Maritalstatus->CurrentValue));
            if ($curVal != "") {
                $this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
                if ($this->Maritalstatus->ViewValue === null) { // Lookup from database
                    $filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Maritalstatus->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Maritalstatus->Lookup->renderViewRow($rswrk[0]);
                        $this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
                    } else {
                        $this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
                    }
                }
            } else {
                $this->Maritalstatus->ViewValue = null;
            }
            $this->Maritalstatus->ViewCustomAttributes = "";

            // Business
            $this->Business->ViewValue = $this->Business->CurrentValue;
            $curVal = trim(strval($this->Business->CurrentValue));
            if ($curVal != "") {
                $this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
                if ($this->Business->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Business->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Business->Lookup->renderViewRow($rswrk[0]);
                        $this->Business->ViewValue = $this->Business->displayValue($arwrk);
                    } else {
                        $this->Business->ViewValue = $this->Business->CurrentValue;
                    }
                }
            } else {
                $this->Business->ViewValue = null;
            }
            $this->Business->ViewCustomAttributes = "";

            // Patient_Language
            $curVal = trim(strval($this->Patient_Language->CurrentValue));
            if ($curVal != "") {
                $this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
                if ($this->Patient_Language->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Patient_Language->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Patient_Language->Lookup->renderViewRow($rswrk[0]);
                        $this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
                    } else {
                        $this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
                    }
                }
            } else {
                $this->Patient_Language->ViewValue = null;
            }
            $this->Patient_Language->ViewCustomAttributes = "";

            // Passport
            $this->Passport->ViewValue = $this->Passport->CurrentValue;
            $this->Passport->ViewCustomAttributes = "";

            // VisaNo
            $this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
            $this->VisaNo->ViewCustomAttributes = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
            $this->ValidityOfVisa->ViewCustomAttributes = "";

            // WhereDidYouHear
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
                if ($this->WhereDidYouHear->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->WhereDidYouHear->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->WhereDidYouHear->Lookup->renderViewRow($row);
                            $this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
                        }
                    } else {
                        $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
                    }
                }
            } else {
                $this->WhereDidYouHear->ViewValue = null;
            }
            $this->WhereDidYouHear->ViewCustomAttributes = "";

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

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // PEmail
            $this->PEmail->ViewValue = $this->PEmail->CurrentValue;
            $this->PEmail->ViewCustomAttributes = "";

            // PEmergencyContact
            $this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
            $this->PEmergencyContact->ViewCustomAttributes = "";

            // occupation
            $this->occupation->ViewValue = $this->occupation->CurrentValue;
            $this->occupation->ViewCustomAttributes = "";

            // spouse_occupation
            $this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
            $this->spouse_occupation->ViewCustomAttributes = "";

            // WhatsApp
            $this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
            $this->WhatsApp->ViewCustomAttributes = "";

            // CouppleID
            $this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
            $this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
            $this->CouppleID->ViewCustomAttributes = "";

            // MaleID
            $this->MaleID->ViewValue = $this->MaleID->CurrentValue;
            $this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
            $this->MaleID->ViewCustomAttributes = "";

            // FemaleID
            $this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
            $this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
            $this->FemaleID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // Relationship
            $this->Relationship->ViewValue = $this->Relationship->CurrentValue;
            $this->Relationship->ViewCustomAttributes = "";

            // AppointmentSearch
            $curVal = trim(strval($this->AppointmentSearch->CurrentValue));
            if ($curVal != "") {
                $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
                if ($this->AppointmentSearch->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AppointmentSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AppointmentSearch->Lookup->renderViewRow($rswrk[0]);
                        $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
                    } else {
                        $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->CurrentValue;
                    }
                }
            } else {
                $this->AppointmentSearch->ViewValue = null;
            }
            $this->AppointmentSearch->ViewCustomAttributes = "";

            // FacebookID
            $this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
            $this->FacebookID->ViewCustomAttributes = "";

            // profilePicImage
            if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
                $this->profilePicImage->ViewValue = $this->id->CurrentValue;
                $this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
            } else {
                $this->profilePicImage->ViewValue = "";
            }
            $this->profilePicImage->ViewCustomAttributes = "";

            // Clients
            $this->Clients->ViewValue = $this->Clients->CurrentValue;
            $this->Clients->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";
            $this->dob->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";
            $this->blood_group->TooltipValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            if (!EmptyValue($this->profilePic->Upload->DbValue)) {
                $this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
                $this->profilePic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
                }
            } else {
                $this->profilePic->HrefValue = "";
            }
            $this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
            $this->profilePic->TooltipValue = "";
            if ($this->profilePic->UseColorbox) {
                if (EmptyValue($this->profilePic->TooltipValue)) {
                    $this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->profilePic->LinkAttrs["data-rel"] = "patient_x_profilePic";
                $this->profilePic->LinkAttrs->appendClass("ew-lightbox");
            }

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";
            $this->Nationality->TooltipValue = "";

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

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";
            $this->spouse_title->TooltipValue = "";

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";
            $this->spouse_first_name->TooltipValue = "";

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";
            $this->spouse_middle_name->TooltipValue = "";

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";
            $this->spouse_last_name->TooltipValue = "";

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";
            $this->spouse_gender->TooltipValue = "";

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";
            $this->spouse_dob->TooltipValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";
            $this->spouse_Age->TooltipValue = "";

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";
            $this->spouse_blood_group->TooltipValue = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";
            $this->spouse_mobile_no->TooltipValue = "";

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";
            $this->Maritalstatus->TooltipValue = "";

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";
            $this->Business->TooltipValue = "";

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";
            $this->Patient_Language->TooltipValue = "";

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";
            $this->Passport->TooltipValue = "";

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";
            $this->VisaNo->TooltipValue = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";
            $this->ValidityOfVisa->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";
            $this->PEmail->TooltipValue = "";

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";
            $this->PEmergencyContact->TooltipValue = "";

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";
            $this->occupation->TooltipValue = "";

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";
            $this->spouse_occupation->TooltipValue = "";

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";
            $this->WhatsApp->TooltipValue = "";

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";
            $this->CouppleID->TooltipValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";
            $this->MaleID->TooltipValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";
            $this->FemaleID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";
            $this->Relationship->TooltipValue = "";

            // AppointmentSearch
            $this->AppointmentSearch->LinkCustomAttributes = "";
            $this->AppointmentSearch->HrefValue = "";
            $this->AppointmentSearch->TooltipValue = "";

            // FacebookID
            $this->FacebookID->LinkCustomAttributes = "";
            $this->FacebookID->HrefValue = "";
            $this->FacebookID->TooltipValue = "";

            // profilePicImage
            $this->profilePicImage->LinkCustomAttributes = "";
            if (!empty($this->profilePicImage->Upload->DbValue)) {
                $this->profilePicImage->HrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
                $this->profilePicImage->LinkAttrs["target"] = "";
                if ($this->profilePicImage->IsBlobImage && empty($this->profilePicImage->LinkAttrs["target"])) {
                    $this->profilePicImage->LinkAttrs["target"] = "_blank";
                }
                if ($this->isExport()) {
                    $this->profilePicImage->HrefValue = FullUrl($this->profilePicImage->HrefValue, "href");
                }
            } else {
                $this->profilePicImage->HrefValue = "";
            }
            $this->profilePicImage->ExportHrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
            $this->profilePicImage->TooltipValue = "";

            // Clients
            $this->Clients->LinkCustomAttributes = "";
            $this->Clients->HrefValue = "";
            $this->Clients->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            $this->PatientID->EditValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // title
            $this->title->EditAttrs["class"] = "form-control";
            $this->title->EditCustomAttributes = "";
            $curVal = trim(strval($this->title->CurrentValue));
            if ($curVal != "") {
                $this->title->ViewValue = $this->title->lookupCacheOption($curVal);
            } else {
                $this->title->ViewValue = $this->title->Lookup !== null && is_array($this->title->Lookup->Options) ? $curVal : null;
            }
            if ($this->title->ViewValue !== null) { // Load from cache
                $this->title->EditValue = array_values($this->title->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->title->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->title->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->title->EditValue = $arwrk;
            }
            $this->title->PlaceHolder = RemoveHtml($this->title->caption());

            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // middle_name
            $this->middle_name->EditAttrs["class"] = "form-control";
            $this->middle_name->EditCustomAttributes = "";
            if (!$this->middle_name->Raw) {
                $this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
            }
            $this->middle_name->EditValue = HtmlEncode($this->middle_name->CurrentValue);
            $this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
            } else {
                $this->gender->ViewValue = $this->gender->Lookup !== null && is_array($this->gender->Lookup->Options) ? $curVal : null;
            }
            if ($this->gender->ViewValue !== null) { // Load from cache
                $this->gender->EditValue = array_values($this->gender->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->gender->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->gender->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->gender->EditValue = $arwrk;
            }
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // dob
            $this->dob->EditAttrs["class"] = "form-control";
            $this->dob->EditCustomAttributes = "";
            $this->dob->EditValue = HtmlEncode(FormatDateTime($this->dob->CurrentValue, 7));
            $this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // blood_group
            $this->blood_group->EditAttrs["class"] = "form-control";
            $this->blood_group->EditCustomAttributes = "";
            $curVal = trim(strval($this->blood_group->CurrentValue));
            if ($curVal != "") {
                $this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
            } else {
                $this->blood_group->ViewValue = $this->blood_group->Lookup !== null && is_array($this->blood_group->Lookup->Options) ? $curVal : null;
            }
            if ($this->blood_group->ViewValue !== null) { // Load from cache
                $this->blood_group->EditValue = array_values($this->blood_group->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`BloodGroup`" . SearchString("=", $this->blood_group->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->blood_group->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->blood_group->EditValue = $arwrk;
            }
            $this->blood_group->PlaceHolder = RemoveHtml($this->blood_group->caption());

            // mobile_no
            $this->mobile_no->EditAttrs["class"] = "form-control";
            $this->mobile_no->EditCustomAttributes = "";
            if (!$this->mobile_no->Raw) {
                $this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
            }
            $this->mobile_no->EditValue = HtmlEncode($this->mobile_no->CurrentValue);
            $this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            if (!$this->description->Raw) {
                $this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
            }
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

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

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            if (!EmptyValue($this->profilePic->Upload->DbValue)) {
                $this->profilePic->ImageWidth = 80;
                $this->profilePic->ImageHeight = 80;
                $this->profilePic->ImageAlt = $this->profilePic->alt();
                $this->profilePic->EditValue = $this->profilePic->Upload->DbValue;
            } else {
                $this->profilePic->EditValue = "";
            }
            if (!EmptyValue($this->profilePic->CurrentValue)) {
                $this->profilePic->Upload->FileName = $this->profilePic->CurrentValue;
            }
            if ($this->isShow()) {
                RenderUploadField($this->profilePic);
            }

            // IdentificationMark
            $this->IdentificationMark->EditAttrs["class"] = "form-control";
            $this->IdentificationMark->EditCustomAttributes = "";
            if (!$this->IdentificationMark->Raw) {
                $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
            }
            $this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
            $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

            // Religion
            $this->Religion->EditAttrs["class"] = "form-control";
            $this->Religion->EditCustomAttributes = "";
            if (!$this->Religion->Raw) {
                $this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
            }
            $this->Religion->EditValue = HtmlEncode($this->Religion->CurrentValue);
            $this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

            // Nationality
            $this->Nationality->EditAttrs["class"] = "form-control";
            $this->Nationality->EditCustomAttributes = "";
            if (!$this->Nationality->Raw) {
                $this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
            }
            $this->Nationality->EditValue = HtmlEncode($this->Nationality->CurrentValue);
            $this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

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
                $lookupFilter = function() {
                    return "`HospID`='".HospitalID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
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

            // spouse_title
            $this->spouse_title->EditAttrs["class"] = "form-control";
            $this->spouse_title->EditCustomAttributes = "";
            $curVal = trim(strval($this->spouse_title->CurrentValue));
            if ($curVal != "") {
                $this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
            } else {
                $this->spouse_title->ViewValue = $this->spouse_title->Lookup !== null && is_array($this->spouse_title->Lookup->Options) ? $curVal : null;
            }
            if ($this->spouse_title->ViewValue !== null) { // Load from cache
                $this->spouse_title->EditValue = array_values($this->spouse_title->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->spouse_title->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->spouse_title->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->spouse_title->EditValue = $arwrk;
            }
            $this->spouse_title->PlaceHolder = RemoveHtml($this->spouse_title->caption());

            // spouse_first_name
            $this->spouse_first_name->EditAttrs["class"] = "form-control";
            $this->spouse_first_name->EditCustomAttributes = "";
            if (!$this->spouse_first_name->Raw) {
                $this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
            }
            $this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->CurrentValue);
            $this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

            // spouse_middle_name
            $this->spouse_middle_name->EditAttrs["class"] = "form-control";
            $this->spouse_middle_name->EditCustomAttributes = "";
            if (!$this->spouse_middle_name->Raw) {
                $this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
            }
            $this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->CurrentValue);
            $this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

            // spouse_last_name
            $this->spouse_last_name->EditAttrs["class"] = "form-control";
            $this->spouse_last_name->EditCustomAttributes = "";
            if (!$this->spouse_last_name->Raw) {
                $this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
            }
            $this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->CurrentValue);
            $this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

            // spouse_gender
            $this->spouse_gender->EditAttrs["class"] = "form-control";
            $this->spouse_gender->EditCustomAttributes = "";
            $curVal = trim(strval($this->spouse_gender->CurrentValue));
            if ($curVal != "") {
                $this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
            } else {
                $this->spouse_gender->ViewValue = $this->spouse_gender->Lookup !== null && is_array($this->spouse_gender->Lookup->Options) ? $curVal : null;
            }
            if ($this->spouse_gender->ViewValue !== null) { // Load from cache
                $this->spouse_gender->EditValue = array_values($this->spouse_gender->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->spouse_gender->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->spouse_gender->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->spouse_gender->EditValue = $arwrk;
            }
            $this->spouse_gender->PlaceHolder = RemoveHtml($this->spouse_gender->caption());

            // spouse_dob
            $this->spouse_dob->EditAttrs["class"] = "form-control";
            $this->spouse_dob->EditCustomAttributes = "";
            $this->spouse_dob->EditValue = HtmlEncode(FormatDateTime($this->spouse_dob->CurrentValue, 7));
            $this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

            // spouse_Age
            $this->spouse_Age->EditAttrs["class"] = "form-control";
            $this->spouse_Age->EditCustomAttributes = "";
            if (!$this->spouse_Age->Raw) {
                $this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
            }
            $this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->CurrentValue);
            $this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

            // spouse_blood_group
            $this->spouse_blood_group->EditAttrs["class"] = "form-control";
            $this->spouse_blood_group->EditCustomAttributes = "";
            $curVal = trim(strval($this->spouse_blood_group->CurrentValue));
            if ($curVal != "") {
                $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
            } else {
                $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->Lookup !== null && is_array($this->spouse_blood_group->Lookup->Options) ? $curVal : null;
            }
            if ($this->spouse_blood_group->ViewValue !== null) { // Load from cache
                $this->spouse_blood_group->EditValue = array_values($this->spouse_blood_group->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`BloodGroup`" . SearchString("=", $this->spouse_blood_group->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->spouse_blood_group->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->spouse_blood_group->EditValue = $arwrk;
            }
            $this->spouse_blood_group->PlaceHolder = RemoveHtml($this->spouse_blood_group->caption());

            // spouse_mobile_no
            $this->spouse_mobile_no->EditAttrs["class"] = "form-control";
            $this->spouse_mobile_no->EditCustomAttributes = "";
            if (!$this->spouse_mobile_no->Raw) {
                $this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
            }
            $this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->CurrentValue);
            $this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

            // Maritalstatus
            $this->Maritalstatus->EditAttrs["class"] = "form-control";
            $this->Maritalstatus->EditCustomAttributes = "";
            $curVal = trim(strval($this->Maritalstatus->CurrentValue));
            if ($curVal != "") {
                $this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
            } else {
                $this->Maritalstatus->ViewValue = $this->Maritalstatus->Lookup !== null && is_array($this->Maritalstatus->Lookup->Options) ? $curVal : null;
            }
            if ($this->Maritalstatus->ViewValue !== null) { // Load from cache
                $this->Maritalstatus->EditValue = array_values($this->Maritalstatus->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`MaritalStatus`" . SearchString("=", $this->Maritalstatus->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Maritalstatus->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Maritalstatus->EditValue = $arwrk;
            }
            $this->Maritalstatus->PlaceHolder = RemoveHtml($this->Maritalstatus->caption());

            // Business
            $this->Business->EditAttrs["class"] = "form-control";
            $this->Business->EditCustomAttributes = "";
            if (!$this->Business->Raw) {
                $this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
            }
            $this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
            $curVal = trim(strval($this->Business->CurrentValue));
            if ($curVal != "") {
                $this->Business->EditValue = $this->Business->lookupCacheOption($curVal);
                if ($this->Business->EditValue === null) { // Lookup from database
                    $filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Business->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Business->Lookup->renderViewRow($rswrk[0]);
                        $this->Business->EditValue = $this->Business->displayValue($arwrk);
                    } else {
                        $this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
                    }
                }
            } else {
                $this->Business->EditValue = null;
            }
            $this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

            // Patient_Language
            $this->Patient_Language->EditAttrs["class"] = "form-control";
            $this->Patient_Language->EditCustomAttributes = "";
            $curVal = trim(strval($this->Patient_Language->CurrentValue));
            if ($curVal != "") {
                $this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
            } else {
                $this->Patient_Language->ViewValue = $this->Patient_Language->Lookup !== null && is_array($this->Patient_Language->Lookup->Options) ? $curVal : null;
            }
            if ($this->Patient_Language->ViewValue !== null) { // Load from cache
                $this->Patient_Language->EditValue = array_values($this->Patient_Language->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Language`" . SearchString("=", $this->Patient_Language->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Patient_Language->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Patient_Language->EditValue = $arwrk;
            }
            $this->Patient_Language->PlaceHolder = RemoveHtml($this->Patient_Language->caption());

            // Passport
            $this->Passport->EditAttrs["class"] = "form-control";
            $this->Passport->EditCustomAttributes = "";
            if (!$this->Passport->Raw) {
                $this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
            }
            $this->Passport->EditValue = HtmlEncode($this->Passport->CurrentValue);
            $this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

            // VisaNo
            $this->VisaNo->EditAttrs["class"] = "form-control";
            $this->VisaNo->EditCustomAttributes = "";
            if (!$this->VisaNo->Raw) {
                $this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
            }
            $this->VisaNo->EditValue = HtmlEncode($this->VisaNo->CurrentValue);
            $this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

            // ValidityOfVisa
            $this->ValidityOfVisa->EditAttrs["class"] = "form-control";
            $this->ValidityOfVisa->EditCustomAttributes = "";
            if (!$this->ValidityOfVisa->Raw) {
                $this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
            }
            $this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->CurrentValue);
            $this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditCustomAttributes = "";
            $curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
            if ($curVal != "") {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
            } else {
                $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== null && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : null;
            }
            if ($this->WhereDidYouHear->ViewValue !== null) { // Load from cache
                $this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->WhereDidYouHear->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->WhereDidYouHear->EditValue = $arwrk;
            }
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // HospID

            // street
            $this->street->EditAttrs["class"] = "form-control";
            $this->street->EditCustomAttributes = "";
            if (!$this->street->Raw) {
                $this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
            }
            $this->street->EditValue = HtmlEncode($this->street->CurrentValue);
            $this->street->PlaceHolder = RemoveHtml($this->street->caption());

            // town
            $this->town->EditAttrs["class"] = "form-control";
            $this->town->EditCustomAttributes = "";
            if (!$this->town->Raw) {
                $this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
            }
            $this->town->EditValue = HtmlEncode($this->town->CurrentValue);
            $this->town->PlaceHolder = RemoveHtml($this->town->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            if (!$this->province->Raw) {
                $this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
            }
            $this->province->EditValue = HtmlEncode($this->province->CurrentValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->CurrentValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // PEmail
            $this->PEmail->EditAttrs["class"] = "form-control";
            $this->PEmail->EditCustomAttributes = "";
            if (!$this->PEmail->Raw) {
                $this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
            }
            $this->PEmail->EditValue = HtmlEncode($this->PEmail->CurrentValue);
            $this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

            // PEmergencyContact
            $this->PEmergencyContact->EditAttrs["class"] = "form-control";
            $this->PEmergencyContact->EditCustomAttributes = "";
            if (!$this->PEmergencyContact->Raw) {
                $this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
            }
            $this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->CurrentValue);
            $this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

            // occupation
            $this->occupation->EditAttrs["class"] = "form-control";
            $this->occupation->EditCustomAttributes = "";
            if (!$this->occupation->Raw) {
                $this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
            }
            $this->occupation->EditValue = HtmlEncode($this->occupation->CurrentValue);
            $this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

            // spouse_occupation
            $this->spouse_occupation->EditAttrs["class"] = "form-control";
            $this->spouse_occupation->EditCustomAttributes = "";
            if (!$this->spouse_occupation->Raw) {
                $this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
            }
            $this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->CurrentValue);
            $this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

            // WhatsApp
            $this->WhatsApp->EditAttrs["class"] = "form-control";
            $this->WhatsApp->EditCustomAttributes = "";
            if (!$this->WhatsApp->Raw) {
                $this->WhatsApp->CurrentValue = HtmlDecode($this->WhatsApp->CurrentValue);
            }
            $this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->CurrentValue);
            $this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

            // CouppleID
            $this->CouppleID->EditAttrs["class"] = "form-control";
            $this->CouppleID->EditCustomAttributes = "";
            $this->CouppleID->EditValue = HtmlEncode($this->CouppleID->CurrentValue);
            $this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

            // MaleID
            $this->MaleID->EditAttrs["class"] = "form-control";
            $this->MaleID->EditCustomAttributes = "";
            $this->MaleID->EditValue = HtmlEncode($this->MaleID->CurrentValue);
            $this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

            // FemaleID
            $this->FemaleID->EditAttrs["class"] = "form-control";
            $this->FemaleID->EditCustomAttributes = "";
            $this->FemaleID->EditValue = HtmlEncode($this->FemaleID->CurrentValue);
            $this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

            // GroupID
            $this->GroupID->EditAttrs["class"] = "form-control";
            $this->GroupID->EditCustomAttributes = "";
            $this->GroupID->EditValue = HtmlEncode($this->GroupID->CurrentValue);
            $this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

            // Relationship
            $this->Relationship->EditAttrs["class"] = "form-control";
            $this->Relationship->EditCustomAttributes = "";
            if (!$this->Relationship->Raw) {
                $this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
            }
            $this->Relationship->EditValue = HtmlEncode($this->Relationship->CurrentValue);
            $this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

            // AppointmentSearch
            $this->AppointmentSearch->EditCustomAttributes = "";
            $curVal = trim(strval($this->AppointmentSearch->CurrentValue));
            if ($curVal != "") {
                $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
            } else {
                $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->Lookup !== null && is_array($this->AppointmentSearch->Lookup->Options) ? $curVal : null;
            }
            if ($this->AppointmentSearch->ViewValue !== null) { // Load from cache
                $this->AppointmentSearch->EditValue = array_values($this->AppointmentSearch->Lookup->Options);
                if ($this->AppointmentSearch->ViewValue == "") {
                    $this->AppointmentSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->AppointmentSearch->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->AppointmentSearch->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AppointmentSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
                } else {
                    $this->AppointmentSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->AppointmentSearch->EditValue = $arwrk;
            }
            $this->AppointmentSearch->PlaceHolder = RemoveHtml($this->AppointmentSearch->caption());

            // FacebookID
            $this->FacebookID->EditAttrs["class"] = "form-control";
            $this->FacebookID->EditCustomAttributes = "";
            if (!$this->FacebookID->Raw) {
                $this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
            }
            $this->FacebookID->EditValue = HtmlEncode($this->FacebookID->CurrentValue);
            $this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

            // profilePicImage
            $this->profilePicImage->EditAttrs["class"] = "form-control";
            $this->profilePicImage->EditCustomAttributes = "";
            if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
                $this->profilePicImage->EditValue = $this->id->CurrentValue;
                $this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
            } else {
                $this->profilePicImage->EditValue = "";
            }
            if ($this->isShow()) {
                RenderUploadField($this->profilePicImage);
            }

            // Clients
            $this->Clients->EditAttrs["class"] = "form-control";
            $this->Clients->EditCustomAttributes = "";
            if (!$this->Clients->Raw) {
                $this->Clients->CurrentValue = HtmlDecode($this->Clients->CurrentValue);
            }
            $this->Clients->EditValue = HtmlEncode($this->Clients->CurrentValue);
            $this->Clients->PlaceHolder = RemoveHtml($this->Clients->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

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

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            if (!EmptyValue($this->profilePic->Upload->DbValue)) {
                $this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
                $this->profilePic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
                }
            } else {
                $this->profilePic->HrefValue = "";
            }
            $this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";

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

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";

            // AppointmentSearch
            $this->AppointmentSearch->LinkCustomAttributes = "";
            $this->AppointmentSearch->HrefValue = "";

            // FacebookID
            $this->FacebookID->LinkCustomAttributes = "";
            $this->FacebookID->HrefValue = "";

            // profilePicImage
            $this->profilePicImage->LinkCustomAttributes = "";
            if (!empty($this->profilePicImage->Upload->DbValue)) {
                $this->profilePicImage->HrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
                $this->profilePicImage->LinkAttrs["target"] = "";
                if ($this->profilePicImage->IsBlobImage && empty($this->profilePicImage->LinkAttrs["target"])) {
                    $this->profilePicImage->LinkAttrs["target"] = "_blank";
                }
                if ($this->isExport()) {
                    $this->profilePicImage->HrefValue = FullUrl($this->profilePicImage->HrefValue, "href");
                }
            } else {
                $this->profilePicImage->HrefValue = "";
            }
            $this->profilePicImage->ExportHrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);

            // Clients
            $this->Clients->LinkCustomAttributes = "";
            $this->Clients->HrefValue = "";
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
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->title->Required) {
            if (!$this->title->IsDetailKey && EmptyValue($this->title->FormValue)) {
                $this->title->addErrorMessage(str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
            }
        }
        if ($this->first_name->Required) {
            if (!$this->first_name->IsDetailKey && EmptyValue($this->first_name->FormValue)) {
                $this->first_name->addErrorMessage(str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
            }
        }
        if ($this->middle_name->Required) {
            if (!$this->middle_name->IsDetailKey && EmptyValue($this->middle_name->FormValue)) {
                $this->middle_name->addErrorMessage(str_replace("%s", $this->middle_name->caption(), $this->middle_name->RequiredErrorMessage));
            }
        }
        if ($this->last_name->Required) {
            if (!$this->last_name->IsDetailKey && EmptyValue($this->last_name->FormValue)) {
                $this->last_name->addErrorMessage(str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->dob->Required) {
            if (!$this->dob->IsDetailKey && EmptyValue($this->dob->FormValue)) {
                $this->dob->addErrorMessage(str_replace("%s", $this->dob->caption(), $this->dob->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->dob->FormValue)) {
            $this->dob->addErrorMessage($this->dob->getErrorMessage(false));
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->blood_group->Required) {
            if (!$this->blood_group->IsDetailKey && EmptyValue($this->blood_group->FormValue)) {
                $this->blood_group->addErrorMessage(str_replace("%s", $this->blood_group->caption(), $this->blood_group->RequiredErrorMessage));
            }
        }
        if ($this->mobile_no->Required) {
            if (!$this->mobile_no->IsDetailKey && EmptyValue($this->mobile_no->FormValue)) {
                $this->mobile_no->addErrorMessage(str_replace("%s", $this->mobile_no->caption(), $this->mobile_no->RequiredErrorMessage));
            }
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
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
        if ($this->profilePic->Required) {
            if ($this->profilePic->Upload->FileName == "" && !$this->profilePic->Upload->KeepFile) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->IdentificationMark->Required) {
            if (!$this->IdentificationMark->IsDetailKey && EmptyValue($this->IdentificationMark->FormValue)) {
                $this->IdentificationMark->addErrorMessage(str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
            }
        }
        if ($this->Religion->Required) {
            if (!$this->Religion->IsDetailKey && EmptyValue($this->Religion->FormValue)) {
                $this->Religion->addErrorMessage(str_replace("%s", $this->Religion->caption(), $this->Religion->RequiredErrorMessage));
            }
        }
        if ($this->Nationality->Required) {
            if (!$this->Nationality->IsDetailKey && EmptyValue($this->Nationality->FormValue)) {
                $this->Nationality->addErrorMessage(str_replace("%s", $this->Nationality->caption(), $this->Nationality->RequiredErrorMessage));
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
        if ($this->spouse_title->Required) {
            if (!$this->spouse_title->IsDetailKey && EmptyValue($this->spouse_title->FormValue)) {
                $this->spouse_title->addErrorMessage(str_replace("%s", $this->spouse_title->caption(), $this->spouse_title->RequiredErrorMessage));
            }
        }
        if ($this->spouse_first_name->Required) {
            if (!$this->spouse_first_name->IsDetailKey && EmptyValue($this->spouse_first_name->FormValue)) {
                $this->spouse_first_name->addErrorMessage(str_replace("%s", $this->spouse_first_name->caption(), $this->spouse_first_name->RequiredErrorMessage));
            }
        }
        if ($this->spouse_middle_name->Required) {
            if (!$this->spouse_middle_name->IsDetailKey && EmptyValue($this->spouse_middle_name->FormValue)) {
                $this->spouse_middle_name->addErrorMessage(str_replace("%s", $this->spouse_middle_name->caption(), $this->spouse_middle_name->RequiredErrorMessage));
            }
        }
        if ($this->spouse_last_name->Required) {
            if (!$this->spouse_last_name->IsDetailKey && EmptyValue($this->spouse_last_name->FormValue)) {
                $this->spouse_last_name->addErrorMessage(str_replace("%s", $this->spouse_last_name->caption(), $this->spouse_last_name->RequiredErrorMessage));
            }
        }
        if ($this->spouse_gender->Required) {
            if (!$this->spouse_gender->IsDetailKey && EmptyValue($this->spouse_gender->FormValue)) {
                $this->spouse_gender->addErrorMessage(str_replace("%s", $this->spouse_gender->caption(), $this->spouse_gender->RequiredErrorMessage));
            }
        }
        if ($this->spouse_dob->Required) {
            if (!$this->spouse_dob->IsDetailKey && EmptyValue($this->spouse_dob->FormValue)) {
                $this->spouse_dob->addErrorMessage(str_replace("%s", $this->spouse_dob->caption(), $this->spouse_dob->RequiredErrorMessage));
            }
        }
        if ($this->spouse_Age->Required) {
            if (!$this->spouse_Age->IsDetailKey && EmptyValue($this->spouse_Age->FormValue)) {
                $this->spouse_Age->addErrorMessage(str_replace("%s", $this->spouse_Age->caption(), $this->spouse_Age->RequiredErrorMessage));
            }
        }
        if ($this->spouse_blood_group->Required) {
            if (!$this->spouse_blood_group->IsDetailKey && EmptyValue($this->spouse_blood_group->FormValue)) {
                $this->spouse_blood_group->addErrorMessage(str_replace("%s", $this->spouse_blood_group->caption(), $this->spouse_blood_group->RequiredErrorMessage));
            }
        }
        if ($this->spouse_mobile_no->Required) {
            if (!$this->spouse_mobile_no->IsDetailKey && EmptyValue($this->spouse_mobile_no->FormValue)) {
                $this->spouse_mobile_no->addErrorMessage(str_replace("%s", $this->spouse_mobile_no->caption(), $this->spouse_mobile_no->RequiredErrorMessage));
            }
        }
        if ($this->Maritalstatus->Required) {
            if (!$this->Maritalstatus->IsDetailKey && EmptyValue($this->Maritalstatus->FormValue)) {
                $this->Maritalstatus->addErrorMessage(str_replace("%s", $this->Maritalstatus->caption(), $this->Maritalstatus->RequiredErrorMessage));
            }
        }
        if ($this->Business->Required) {
            if (!$this->Business->IsDetailKey && EmptyValue($this->Business->FormValue)) {
                $this->Business->addErrorMessage(str_replace("%s", $this->Business->caption(), $this->Business->RequiredErrorMessage));
            }
        }
        if ($this->Patient_Language->Required) {
            if (!$this->Patient_Language->IsDetailKey && EmptyValue($this->Patient_Language->FormValue)) {
                $this->Patient_Language->addErrorMessage(str_replace("%s", $this->Patient_Language->caption(), $this->Patient_Language->RequiredErrorMessage));
            }
        }
        if ($this->Passport->Required) {
            if (!$this->Passport->IsDetailKey && EmptyValue($this->Passport->FormValue)) {
                $this->Passport->addErrorMessage(str_replace("%s", $this->Passport->caption(), $this->Passport->RequiredErrorMessage));
            }
        }
        if ($this->VisaNo->Required) {
            if (!$this->VisaNo->IsDetailKey && EmptyValue($this->VisaNo->FormValue)) {
                $this->VisaNo->addErrorMessage(str_replace("%s", $this->VisaNo->caption(), $this->VisaNo->RequiredErrorMessage));
            }
        }
        if ($this->ValidityOfVisa->Required) {
            if (!$this->ValidityOfVisa->IsDetailKey && EmptyValue($this->ValidityOfVisa->FormValue)) {
                $this->ValidityOfVisa->addErrorMessage(str_replace("%s", $this->ValidityOfVisa->caption(), $this->ValidityOfVisa->RequiredErrorMessage));
            }
        }
        if ($this->WhereDidYouHear->Required) {
            if ($this->WhereDidYouHear->FormValue == "") {
                $this->WhereDidYouHear->addErrorMessage(str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->street->Required) {
            if (!$this->street->IsDetailKey && EmptyValue($this->street->FormValue)) {
                $this->street->addErrorMessage(str_replace("%s", $this->street->caption(), $this->street->RequiredErrorMessage));
            }
        }
        if ($this->town->Required) {
            if (!$this->town->IsDetailKey && EmptyValue($this->town->FormValue)) {
                $this->town->addErrorMessage(str_replace("%s", $this->town->caption(), $this->town->RequiredErrorMessage));
            }
        }
        if ($this->province->Required) {
            if (!$this->province->IsDetailKey && EmptyValue($this->province->FormValue)) {
                $this->province->addErrorMessage(str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
            }
        }
        if ($this->country->Required) {
            if (!$this->country->IsDetailKey && EmptyValue($this->country->FormValue)) {
                $this->country->addErrorMessage(str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
            }
        }
        if ($this->postal_code->Required) {
            if (!$this->postal_code->IsDetailKey && EmptyValue($this->postal_code->FormValue)) {
                $this->postal_code->addErrorMessage(str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
            }
        }
        if ($this->PEmail->Required) {
            if (!$this->PEmail->IsDetailKey && EmptyValue($this->PEmail->FormValue)) {
                $this->PEmail->addErrorMessage(str_replace("%s", $this->PEmail->caption(), $this->PEmail->RequiredErrorMessage));
            }
        }
        if ($this->PEmergencyContact->Required) {
            if (!$this->PEmergencyContact->IsDetailKey && EmptyValue($this->PEmergencyContact->FormValue)) {
                $this->PEmergencyContact->addErrorMessage(str_replace("%s", $this->PEmergencyContact->caption(), $this->PEmergencyContact->RequiredErrorMessage));
            }
        }
        if ($this->occupation->Required) {
            if (!$this->occupation->IsDetailKey && EmptyValue($this->occupation->FormValue)) {
                $this->occupation->addErrorMessage(str_replace("%s", $this->occupation->caption(), $this->occupation->RequiredErrorMessage));
            }
        }
        if ($this->spouse_occupation->Required) {
            if (!$this->spouse_occupation->IsDetailKey && EmptyValue($this->spouse_occupation->FormValue)) {
                $this->spouse_occupation->addErrorMessage(str_replace("%s", $this->spouse_occupation->caption(), $this->spouse_occupation->RequiredErrorMessage));
            }
        }
        if ($this->WhatsApp->Required) {
            if (!$this->WhatsApp->IsDetailKey && EmptyValue($this->WhatsApp->FormValue)) {
                $this->WhatsApp->addErrorMessage(str_replace("%s", $this->WhatsApp->caption(), $this->WhatsApp->RequiredErrorMessage));
            }
        }
        if ($this->CouppleID->Required) {
            if (!$this->CouppleID->IsDetailKey && EmptyValue($this->CouppleID->FormValue)) {
                $this->CouppleID->addErrorMessage(str_replace("%s", $this->CouppleID->caption(), $this->CouppleID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CouppleID->FormValue)) {
            $this->CouppleID->addErrorMessage($this->CouppleID->getErrorMessage(false));
        }
        if ($this->MaleID->Required) {
            if (!$this->MaleID->IsDetailKey && EmptyValue($this->MaleID->FormValue)) {
                $this->MaleID->addErrorMessage(str_replace("%s", $this->MaleID->caption(), $this->MaleID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MaleID->FormValue)) {
            $this->MaleID->addErrorMessage($this->MaleID->getErrorMessage(false));
        }
        if ($this->FemaleID->Required) {
            if (!$this->FemaleID->IsDetailKey && EmptyValue($this->FemaleID->FormValue)) {
                $this->FemaleID->addErrorMessage(str_replace("%s", $this->FemaleID->caption(), $this->FemaleID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FemaleID->FormValue)) {
            $this->FemaleID->addErrorMessage($this->FemaleID->getErrorMessage(false));
        }
        if ($this->GroupID->Required) {
            if (!$this->GroupID->IsDetailKey && EmptyValue($this->GroupID->FormValue)) {
                $this->GroupID->addErrorMessage(str_replace("%s", $this->GroupID->caption(), $this->GroupID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GroupID->FormValue)) {
            $this->GroupID->addErrorMessage($this->GroupID->getErrorMessage(false));
        }
        if ($this->Relationship->Required) {
            if (!$this->Relationship->IsDetailKey && EmptyValue($this->Relationship->FormValue)) {
                $this->Relationship->addErrorMessage(str_replace("%s", $this->Relationship->caption(), $this->Relationship->RequiredErrorMessage));
            }
        }
        if ($this->AppointmentSearch->Required) {
            if (!$this->AppointmentSearch->IsDetailKey && EmptyValue($this->AppointmentSearch->FormValue)) {
                $this->AppointmentSearch->addErrorMessage(str_replace("%s", $this->AppointmentSearch->caption(), $this->AppointmentSearch->RequiredErrorMessage));
            }
        }
        if ($this->FacebookID->Required) {
            if (!$this->FacebookID->IsDetailKey && EmptyValue($this->FacebookID->FormValue)) {
                $this->FacebookID->addErrorMessage(str_replace("%s", $this->FacebookID->caption(), $this->FacebookID->RequiredErrorMessage));
            }
        }
        if ($this->profilePicImage->Required) {
            if ($this->profilePicImage->Upload->FileName == "" && !$this->profilePicImage->Upload->KeepFile) {
                $this->profilePicImage->addErrorMessage(str_replace("%s", $this->profilePicImage->caption(), $this->profilePicImage->RequiredErrorMessage));
            }
        }
        if ($this->Clients->Required) {
            if (!$this->Clients->IsDetailKey && EmptyValue($this->Clients->FormValue)) {
                $this->Clients->addErrorMessage(str_replace("%s", $this->Clients->caption(), $this->Clients->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("PatientAddressGrid");
        if (in_array("patient_address", $detailTblVar) && $detailPage->DetailEdit) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientEmailGrid");
        if (in_array("patient_email", $detailTblVar) && $detailPage->DetailEdit) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientTelephoneGrid");
        if (in_array("patient_telephone", $detailTblVar) && $detailPage->DetailEdit) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientEmergencyContactGrid");
        if (in_array("patient_emergency_contact", $detailTblVar) && $detailPage->DetailEdit) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("PatientDocumentGrid");
        if (in_array("patient_document", $detailTblVar) && $detailPage->DetailEdit) {
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        if ($this->PatientID->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`PatientID` = '" . AdjustSql($this->PatientID->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->PatientID->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->PatientID->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                $rsChk->closeCursor();
                return false;
            }
        }
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Begin transaction
            if ($this->getCurrentDetailTable() != "") {
                $conn->beginTransaction();
            }

            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // title
            $this->title->setDbValueDef($rsnew, $this->title->CurrentValue, null, $this->title->ReadOnly);

            // first_name
            $this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, null, $this->first_name->ReadOnly);

            // middle_name
            $this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, null, $this->middle_name->ReadOnly);

            // last_name
            $this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, null, $this->last_name->ReadOnly);

            // gender
            $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, $this->gender->ReadOnly);

            // dob
            $this->dob->setDbValueDef($rsnew, UnFormatDateTime($this->dob->CurrentValue, 7), null, $this->dob->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // blood_group
            $this->blood_group->setDbValueDef($rsnew, $this->blood_group->CurrentValue, null, $this->blood_group->ReadOnly);

            // mobile_no
            $this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, null, $this->mobile_no->ReadOnly);

            // description
            $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, $this->description->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // profilePic
            if ($this->profilePic->Visible && !$this->profilePic->ReadOnly && !$this->profilePic->Upload->KeepFile) {
                $this->profilePic->Upload->DbValue = $rsold['profilePic']; // Get original value
                if ($this->profilePic->Upload->FileName == "") {
                    $rsnew['profilePic'] = null;
                } else {
                    $rsnew['profilePic'] = $this->profilePic->Upload->FileName;
                }
            }

            // IdentificationMark
            $this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, null, $this->IdentificationMark->ReadOnly);

            // Religion
            $this->Religion->setDbValueDef($rsnew, $this->Religion->CurrentValue, null, $this->Religion->ReadOnly);

            // Nationality
            $this->Nationality->setDbValueDef($rsnew, $this->Nationality->CurrentValue, null, $this->Nationality->ReadOnly);

            // ReferedByDr
            $this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, null, $this->ReferedByDr->ReadOnly);

            // ReferClinicname
            $this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, null, $this->ReferClinicname->ReadOnly);

            // ReferCity
            $this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, null, $this->ReferCity->ReadOnly);

            // ReferMobileNo
            $this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, null, $this->ReferMobileNo->ReadOnly);

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, null, $this->ReferA4TreatingConsultant->ReadOnly);

            // PurposreReferredfor
            $this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, null, $this->PurposreReferredfor->ReadOnly);

            // spouse_title
            $this->spouse_title->setDbValueDef($rsnew, $this->spouse_title->CurrentValue, null, $this->spouse_title->ReadOnly);

            // spouse_first_name
            $this->spouse_first_name->setDbValueDef($rsnew, $this->spouse_first_name->CurrentValue, null, $this->spouse_first_name->ReadOnly);

            // spouse_middle_name
            $this->spouse_middle_name->setDbValueDef($rsnew, $this->spouse_middle_name->CurrentValue, null, $this->spouse_middle_name->ReadOnly);

            // spouse_last_name
            $this->spouse_last_name->setDbValueDef($rsnew, $this->spouse_last_name->CurrentValue, null, $this->spouse_last_name->ReadOnly);

            // spouse_gender
            $this->spouse_gender->setDbValueDef($rsnew, $this->spouse_gender->CurrentValue, null, $this->spouse_gender->ReadOnly);

            // spouse_dob
            $this->spouse_dob->setDbValueDef($rsnew, UnFormatDateTime($this->spouse_dob->CurrentValue, 7), null, $this->spouse_dob->ReadOnly);

            // spouse_Age
            $this->spouse_Age->setDbValueDef($rsnew, $this->spouse_Age->CurrentValue, null, $this->spouse_Age->ReadOnly);

            // spouse_blood_group
            $this->spouse_blood_group->setDbValueDef($rsnew, $this->spouse_blood_group->CurrentValue, null, $this->spouse_blood_group->ReadOnly);

            // spouse_mobile_no
            $this->spouse_mobile_no->setDbValueDef($rsnew, $this->spouse_mobile_no->CurrentValue, null, $this->spouse_mobile_no->ReadOnly);

            // Maritalstatus
            $this->Maritalstatus->setDbValueDef($rsnew, $this->Maritalstatus->CurrentValue, null, $this->Maritalstatus->ReadOnly);

            // Business
            $this->Business->setDbValueDef($rsnew, $this->Business->CurrentValue, null, $this->Business->ReadOnly);

            // Patient_Language
            $this->Patient_Language->setDbValueDef($rsnew, $this->Patient_Language->CurrentValue, null, $this->Patient_Language->ReadOnly);

            // Passport
            $this->Passport->setDbValueDef($rsnew, $this->Passport->CurrentValue, null, $this->Passport->ReadOnly);

            // VisaNo
            $this->VisaNo->setDbValueDef($rsnew, $this->VisaNo->CurrentValue, null, $this->VisaNo->ReadOnly);

            // ValidityOfVisa
            $this->ValidityOfVisa->setDbValueDef($rsnew, $this->ValidityOfVisa->CurrentValue, null, $this->ValidityOfVisa->ReadOnly);

            // WhereDidYouHear
            $this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, null, $this->WhereDidYouHear->ReadOnly);

            // street
            $this->street->setDbValueDef($rsnew, $this->street->CurrentValue, null, $this->street->ReadOnly);

            // town
            $this->town->setDbValueDef($rsnew, $this->town->CurrentValue, null, $this->town->ReadOnly);

            // province
            $this->province->setDbValueDef($rsnew, $this->province->CurrentValue, null, $this->province->ReadOnly);

            // country
            $this->country->setDbValueDef($rsnew, $this->country->CurrentValue, null, $this->country->ReadOnly);

            // postal_code
            $this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, null, $this->postal_code->ReadOnly);

            // PEmail
            $this->PEmail->setDbValueDef($rsnew, $this->PEmail->CurrentValue, null, $this->PEmail->ReadOnly);

            // PEmergencyContact
            $this->PEmergencyContact->setDbValueDef($rsnew, $this->PEmergencyContact->CurrentValue, null, $this->PEmergencyContact->ReadOnly);

            // occupation
            $this->occupation->setDbValueDef($rsnew, $this->occupation->CurrentValue, null, $this->occupation->ReadOnly);

            // spouse_occupation
            $this->spouse_occupation->setDbValueDef($rsnew, $this->spouse_occupation->CurrentValue, null, $this->spouse_occupation->ReadOnly);

            // WhatsApp
            $this->WhatsApp->setDbValueDef($rsnew, $this->WhatsApp->CurrentValue, null, $this->WhatsApp->ReadOnly);

            // CouppleID
            $this->CouppleID->setDbValueDef($rsnew, $this->CouppleID->CurrentValue, null, $this->CouppleID->ReadOnly);

            // MaleID
            $this->MaleID->setDbValueDef($rsnew, $this->MaleID->CurrentValue, null, $this->MaleID->ReadOnly);

            // FemaleID
            $this->FemaleID->setDbValueDef($rsnew, $this->FemaleID->CurrentValue, null, $this->FemaleID->ReadOnly);

            // GroupID
            $this->GroupID->setDbValueDef($rsnew, $this->GroupID->CurrentValue, null, $this->GroupID->ReadOnly);

            // Relationship
            $this->Relationship->setDbValueDef($rsnew, $this->Relationship->CurrentValue, null, $this->Relationship->ReadOnly);

            // AppointmentSearch
            $this->AppointmentSearch->setDbValueDef($rsnew, $this->AppointmentSearch->CurrentValue, "", $this->AppointmentSearch->ReadOnly);

            // FacebookID
            $this->FacebookID->setDbValueDef($rsnew, $this->FacebookID->CurrentValue, null, $this->FacebookID->ReadOnly);

            // profilePicImage
            if ($this->profilePicImage->Visible && !$this->profilePicImage->ReadOnly && !$this->profilePicImage->Upload->KeepFile) {
                if ($this->profilePicImage->Upload->Value === null) {
                    $rsnew['profilePicImage'] = null;
                } else {
                    $rsnew['profilePicImage'] = $this->profilePicImage->Upload->Value;
                }
            }

            // Clients
            $this->Clients->setDbValueDef($rsnew, $this->Clients->CurrentValue, null, $this->Clients->ReadOnly);
            if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->profilePic->Upload->DbValue) ? [] : [$this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)];
                if (!EmptyValue($this->profilePic->Upload->FileName)) {
                    $newFiles = [$this->profilePic->Upload->FileName];
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->profilePic, $this->profilePic->Upload->Index);
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
                                $file1 = UniqueFilename($this->profilePic->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->profilePic->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->profilePic->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->profilePic->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->profilePic->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->profilePic->setDbValueDef($rsnew, $this->profilePic->Upload->FileName, null, $this->profilePic->ReadOnly);
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
                    if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->profilePic->Upload->DbValue) ? [] : [$this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)];
                        if (!EmptyValue($this->profilePic->Upload->FileName)) {
                            $newFiles = [$this->profilePic->Upload->FileName];
                            $newFiles2 = [$this->profilePic->htmlDecode($rsnew['profilePic'])];
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->profilePic->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
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
                                    @unlink($this->profilePic->oldPhysicalUploadPath() . $oldFile);
                                }
                            }
                        }
                    }
                }

                // Update detail records
                $detailTblVar = explode(",", $this->getCurrentDetailTable());
                if ($editRow) {
                    $detailPage = Container("PatientAddressGrid");
                    if (in_array("patient_address", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_address"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }
                if ($editRow) {
                    $detailPage = Container("PatientEmailGrid");
                    if (in_array("patient_email", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_email"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }
                if ($editRow) {
                    $detailPage = Container("PatientTelephoneGrid");
                    if (in_array("patient_telephone", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_telephone"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }
                if ($editRow) {
                    $detailPage = Container("PatientEmergencyContactGrid");
                    if (in_array("patient_emergency_contact", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_emergency_contact"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }
                if ($editRow) {
                    $detailPage = Container("PatientDocumentGrid");
                    if (in_array("patient_document", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_document"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }

                // Commit/Rollback transaction
                if ($this->getCurrentDetailTable() != "") {
                    if ($editRow) {
                        $conn->commit(); // Commit transaction
                    } else {
                        $conn->rollback(); // Rollback transaction
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
            // profilePic
            CleanUploadTempPath($this->profilePic, $this->profilePic->Upload->Index);

            // profilePicImage
            CleanUploadTempPath($this->profilePicImage, $this->profilePicImage->Upload->Index);
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
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
            if (in_array("patient_address", $detailTblVar)) {
                $detailPageObj = Container("PatientAddressGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_email", $detailTblVar)) {
                $detailPageObj = Container("PatientEmailGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_telephone", $detailTblVar)) {
                $detailPageObj = Container("PatientTelephoneGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_emergency_contact", $detailTblVar)) {
                $detailPageObj = Container("PatientEmergencyContactGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
                }
            }
            if (in_array("patient_document", $detailTblVar)) {
                $detailPageObj = Container("PatientDocumentGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->patient_id->IsDetailKey = true;
                    $detailPageObj->patient_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->patient_id->setSessionValue($detailPageObj->patient_id->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientList"), "", $this->TableVar, true);
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
                case "x_title":
                    break;
                case "x_gender":
                    break;
                case "x_blood_group":
                    break;
                case "x_status":
                    break;
                case "x_ReferedByDr":
                    break;
                case "x_ReferA4TreatingConsultant":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_spouse_title":
                    break;
                case "x_spouse_gender":
                    break;
                case "x_spouse_blood_group":
                    break;
                case "x_Maritalstatus":
                    break;
                case "x_Business":
                    break;
                case "x_Patient_Language":
                    break;
                case "x_WhereDidYouHear":
                    break;
                case "x_HospID":
                    break;
                case "x_AppointmentSearch":
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
