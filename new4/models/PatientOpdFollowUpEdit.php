<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOpdFollowUpEdit extends PatientOpdFollowUp
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_opd_follow_up';

    // Page object name
    public $PageObjName = "PatientOpdFollowUpEdit";

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
        $this->Reception->Visible = false;
        $this->PatID->Visible = false;
        $this->PatientId->Visible = false;
        $this->PatientName->Visible = false;
        $this->MobileNumber->Visible = false;
        $this->Telephone->Visible = false;
        $this->mrnno->Visible = false;
        $this->Age->Visible = false;
        $this->Gender->Visible = false;
        $this->profilePic->Visible = false;
        $this->procedurenotes->setVisibility();
        $this->NextReviewDate->setVisibility();
        $this->ICSIAdvised->setVisibility();
        $this->DeliveryRegistered->setVisibility();
        $this->EDD->setVisibility();
        $this->SerologyPositive->setVisibility();
        $this->Allergy->setVisibility();
        $this->status->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->LMP->setVisibility();
        $this->Procedure->setVisibility();
        $this->ProcedureDateTime->setVisibility();
        $this->ICSIDate->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->HospID->Visible = false;
        $this->createdUserName->Visible = false;
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
                    $this->terminate("PatientOpdFollowUpList"); // No matching record, return to list
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
                if (GetPageName($returnUrl) == "PatientOpdFollowUpList") {
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
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
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->LMP->CurrentValue = $this->LMP->FormValue;
        $this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 7);
        $this->Procedure->CurrentValue = $this->Procedure->FormValue;
        $this->ProcedureDateTime->CurrentValue = $this->ProcedureDateTime->FormValue;
        $this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11);
        $this->ICSIDate->CurrentValue = $this->ICSIDate->FormValue;
        $this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 7);
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
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
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PatID'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['MobileNumber'] = null;
        $row['Telephone'] = null;
        $row['mrnno'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['procedurenotes'] = null;
        $row['NextReviewDate'] = null;
        $row['ICSIAdvised'] = null;
        $row['DeliveryRegistered'] = null;
        $row['EDD'] = null;
        $row['SerologyPositive'] = null;
        $row['Allergy'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['LMP'] = null;
        $row['Procedure'] = null;
        $row['ProcedureDateTime'] = null;
        $row['ICSIDate'] = null;
        $row['PatientSearch'] = null;
        $row['HospID'] = null;
        $row['createdUserName'] = null;
        $row['TemplateDrNotes'] = null;
        $row['reportheader'] = null;
        $row['Purpose'] = null;
        $row['DrName'] = null;
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

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
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

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

            // modifiedby

            // modifieddatetime

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

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

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

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
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
        if (in_array("patient_an_registration", $detailTblVar) && $detailPage->DetailEdit) {
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

            // procedurenotes
            $this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, null, $this->procedurenotes->ReadOnly);

            // NextReviewDate
            $this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 7), null, $this->NextReviewDate->ReadOnly);

            // ICSIAdvised
            $this->ICSIAdvised->setDbValueDef($rsnew, $this->ICSIAdvised->CurrentValue, null, $this->ICSIAdvised->ReadOnly);

            // DeliveryRegistered
            $this->DeliveryRegistered->setDbValueDef($rsnew, $this->DeliveryRegistered->CurrentValue, null, $this->DeliveryRegistered->ReadOnly);

            // EDD
            $this->EDD->setDbValueDef($rsnew, UnFormatDateTime($this->EDD->CurrentValue, 7), null, $this->EDD->ReadOnly);

            // SerologyPositive
            $this->SerologyPositive->setDbValueDef($rsnew, $this->SerologyPositive->CurrentValue, null, $this->SerologyPositive->ReadOnly);

            // Allergy
            $this->Allergy->setDbValueDef($rsnew, $this->Allergy->CurrentValue, null, $this->Allergy->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, $this->status->ReadOnly);

            // modifiedby
            $this->modifiedby->CurrentValue = GetUserID();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // LMP
            $this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 7), null, $this->LMP->ReadOnly);

            // Procedure
            $this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, null, $this->Procedure->ReadOnly);

            // ProcedureDateTime
            $this->ProcedureDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11), null, $this->ProcedureDateTime->ReadOnly);

            // ICSIDate
            $this->ICSIDate->setDbValueDef($rsnew, UnFormatDateTime($this->ICSIDate->CurrentValue, 7), null, $this->ICSIDate->ReadOnly);

            // PatientSearch
            $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, null, $this->PatientSearch->ReadOnly);

            // TemplateDrNotes
            $this->TemplateDrNotes->setDbValueDef($rsnew, $this->TemplateDrNotes->CurrentValue, "", $this->TemplateDrNotes->ReadOnly);

            // reportheader
            $this->reportheader->setDbValueDef($rsnew, $this->reportheader->CurrentValue, null, $this->reportheader->ReadOnly);

            // Purpose
            $this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, null, $this->Purpose->ReadOnly);

            // DrName
            $this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, null, $this->DrName->ReadOnly);

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

                // Update detail records
                $detailTblVar = explode(",", $this->getCurrentDetailTable());
                if ($editRow) {
                    $detailPage = Container("PatientAnRegistrationGrid");
                    if (in_array("patient_an_registration", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "patient_an_registration"); // Load user level of detail table
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
            if (in_array("patient_an_registration", $detailTblVar)) {
                $detailPageObj = Container("PatientAnRegistrationGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

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
