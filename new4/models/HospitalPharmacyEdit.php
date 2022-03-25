<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class HospitalPharmacyEdit extends HospitalPharmacy
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'hospital_pharmacy';

    // Page object name
    public $PageObjName = "HospitalPharmacyEdit";

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

        // Table object (hospital_pharmacy)
        if (!isset($GLOBALS["hospital_pharmacy"]) || get_class($GLOBALS["hospital_pharmacy"]) == PROJECT_NAMESPACE . "hospital_pharmacy") {
            $GLOBALS["hospital_pharmacy"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'hospital_pharmacy');
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
                $doc = new $class(Container("hospital_pharmacy"));
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
                    if ($pageName == "HospitalPharmacyView") {
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
        $this->logo->setVisibility();
        $this->pharmacy->setVisibility();
        $this->street->setVisibility();
        $this->area->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->phone_no->setVisibility();
        $this->PreFixCode->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->pharmacyGST->setVisibility();
        $this->HospId->setVisibility();
        $this->BranchID->setVisibility();
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
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->HospId);

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
                    $this->terminate("HospitalPharmacyList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "HospitalPharmacyList") {
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
        $this->logo->Upload->Index = $CurrentForm->Index;
        $this->logo->Upload->uploadFile();
        $this->logo->CurrentValue = $this->logo->Upload->FileName;
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

        // Check field name 'pharmacy' first before field var 'x_pharmacy'
        $val = $CurrentForm->hasValue("pharmacy") ? $CurrentForm->getValue("pharmacy") : $CurrentForm->getValue("x_pharmacy");
        if (!$this->pharmacy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pharmacy->Visible = false; // Disable update for API request
            } else {
                $this->pharmacy->setFormValue($val);
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

        // Check field name 'area' first before field var 'x_area'
        $val = $CurrentForm->hasValue("area") ? $CurrentForm->getValue("area") : $CurrentForm->getValue("x_area");
        if (!$this->area->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->area->Visible = false; // Disable update for API request
            } else {
                $this->area->setFormValue($val);
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

        // Check field name 'postal_code' first before field var 'x_postal_code'
        $val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
        if (!$this->postal_code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postal_code->Visible = false; // Disable update for API request
            } else {
                $this->postal_code->setFormValue($val);
            }
        }

        // Check field name 'phone_no' first before field var 'x_phone_no'
        $val = $CurrentForm->hasValue("phone_no") ? $CurrentForm->getValue("phone_no") : $CurrentForm->getValue("x_phone_no");
        if (!$this->phone_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->phone_no->Visible = false; // Disable update for API request
            } else {
                $this->phone_no->setFormValue($val);
            }
        }

        // Check field name 'PreFixCode' first before field var 'x_PreFixCode'
        $val = $CurrentForm->hasValue("PreFixCode") ? $CurrentForm->getValue("PreFixCode") : $CurrentForm->getValue("x_PreFixCode");
        if (!$this->PreFixCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreFixCode->Visible = false; // Disable update for API request
            } else {
                $this->PreFixCode->setFormValue($val);
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

        // Check field name 'pharmacyGST' first before field var 'x_pharmacyGST'
        $val = $CurrentForm->hasValue("pharmacyGST") ? $CurrentForm->getValue("pharmacyGST") : $CurrentForm->getValue("x_pharmacyGST");
        if (!$this->pharmacyGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pharmacyGST->Visible = false; // Disable update for API request
            } else {
                $this->pharmacyGST->setFormValue($val);
            }
        }

        // Check field name 'HospId' first before field var 'x_HospId'
        $val = $CurrentForm->hasValue("HospId") ? $CurrentForm->getValue("HospId") : $CurrentForm->getValue("x_HospId");
        if (!$this->HospId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospId->Visible = false; // Disable update for API request
            } else {
                $this->HospId->setFormValue($val);
            }
        }

        // Check field name 'BranchID' first before field var 'x_BranchID'
        $val = $CurrentForm->hasValue("BranchID") ? $CurrentForm->getValue("BranchID") : $CurrentForm->getValue("x_BranchID");
        if (!$this->BranchID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BranchID->Visible = false; // Disable update for API request
            } else {
                $this->BranchID->setFormValue($val);
            }
        }
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->pharmacy->CurrentValue = $this->pharmacy->FormValue;
        $this->street->CurrentValue = $this->street->FormValue;
        $this->area->CurrentValue = $this->area->FormValue;
        $this->town->CurrentValue = $this->town->FormValue;
        $this->province->CurrentValue = $this->province->FormValue;
        $this->postal_code->CurrentValue = $this->postal_code->FormValue;
        $this->phone_no->CurrentValue = $this->phone_no->FormValue;
        $this->PreFixCode->CurrentValue = $this->PreFixCode->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->pharmacyGST->CurrentValue = $this->pharmacyGST->FormValue;
        $this->HospId->CurrentValue = $this->HospId->FormValue;
        $this->BranchID->CurrentValue = $this->BranchID->FormValue;
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
        $this->logo->Upload->DbValue = $row['logo'];
        $this->logo->setDbValue($this->logo->Upload->DbValue);
        $this->pharmacy->setDbValue($row['pharmacy']);
        $this->street->setDbValue($row['street']);
        $this->area->setDbValue($row['area']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->phone_no->setDbValue($row['phone_no']);
        $this->PreFixCode->setDbValue($row['PreFixCode']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->pharmacyGST->setDbValue($row['pharmacyGST']);
        $this->HospId->setDbValue($row['HospId']);
        $this->BranchID->setDbValue($row['BranchID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['logo'] = null;
        $row['pharmacy'] = null;
        $row['street'] = null;
        $row['area'] = null;
        $row['town'] = null;
        $row['province'] = null;
        $row['postal_code'] = null;
        $row['phone_no'] = null;
        $row['PreFixCode'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['pharmacyGST'] = null;
        $row['HospId'] = null;
        $row['BranchID'] = null;
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

        // logo

        // pharmacy

        // street

        // area

        // town

        // province

        // postal_code

        // phone_no

        // PreFixCode

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // pharmacyGST

        // HospId

        // BranchID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
            $this->id->ViewCustomAttributes = "";

            // logo
            if (!EmptyValue($this->logo->Upload->DbValue)) {
                $this->logo->ImageWidth = 80;
                $this->logo->ImageHeight = 80;
                $this->logo->ImageAlt = $this->logo->alt();
                $this->logo->ViewValue = $this->logo->Upload->DbValue;
            } else {
                $this->logo->ViewValue = "";
            }
            $this->logo->ViewCustomAttributes = "";

            // pharmacy
            $this->pharmacy->ViewValue = $this->pharmacy->CurrentValue;
            $this->pharmacy->ViewCustomAttributes = "";

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // area
            $this->area->ViewValue = $this->area->CurrentValue;
            $this->area->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // phone_no
            $this->phone_no->ViewValue = $this->phone_no->CurrentValue;
            $this->phone_no->ViewCustomAttributes = "";

            // PreFixCode
            $this->PreFixCode->ViewValue = $this->PreFixCode->CurrentValue;
            $this->PreFixCode->ViewCustomAttributes = "";

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

            // pharmacyGST
            $this->pharmacyGST->ViewValue = $this->pharmacyGST->CurrentValue;
            $this->pharmacyGST->ViewCustomAttributes = "";

            // HospId
            $curVal = trim(strval($this->HospId->CurrentValue));
            if ($curVal != "") {
                $this->HospId->ViewValue = $this->HospId->lookupCacheOption($curVal);
                if ($this->HospId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospId->Lookup->renderViewRow($rswrk[0]);
                        $this->HospId->ViewValue = $this->HospId->displayValue($arwrk);
                    } else {
                        $this->HospId->ViewValue = $this->HospId->CurrentValue;
                    }
                }
            } else {
                $this->HospId->ViewValue = null;
            }
            $this->HospId->ViewCustomAttributes = "";

            // BranchID
            $this->BranchID->ViewValue = $this->BranchID->CurrentValue;
            $this->BranchID->ViewValue = FormatNumber($this->BranchID->ViewValue, 0, -2, -2, -2);
            $this->BranchID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // logo
            $this->logo->LinkCustomAttributes = "";
            if (!EmptyValue($this->logo->Upload->DbValue)) {
                $this->logo->HrefValue = GetFileUploadUrl($this->logo, $this->logo->htmlDecode($this->logo->Upload->DbValue)); // Add prefix/suffix
                $this->logo->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->logo->HrefValue = FullUrl($this->logo->HrefValue, "href");
                }
            } else {
                $this->logo->HrefValue = "";
            }
            $this->logo->ExportHrefValue = $this->logo->UploadPath . $this->logo->Upload->DbValue;
            $this->logo->TooltipValue = "";
            if ($this->logo->UseColorbox) {
                if (EmptyValue($this->logo->TooltipValue)) {
                    $this->logo->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->logo->LinkAttrs["data-rel"] = "hospital_pharmacy_x_logo";
                $this->logo->LinkAttrs->appendClass("ew-lightbox");
            }

            // pharmacy
            $this->pharmacy->LinkCustomAttributes = "";
            $this->pharmacy->HrefValue = "";
            $this->pharmacy->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";

            // area
            $this->area->LinkCustomAttributes = "";
            $this->area->HrefValue = "";
            $this->area->TooltipValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // phone_no
            $this->phone_no->LinkCustomAttributes = "";
            $this->phone_no->HrefValue = "";
            $this->phone_no->TooltipValue = "";

            // PreFixCode
            $this->PreFixCode->LinkCustomAttributes = "";
            $this->PreFixCode->HrefValue = "";
            $this->PreFixCode->TooltipValue = "";

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

            // pharmacyGST
            $this->pharmacyGST->LinkCustomAttributes = "";
            $this->pharmacyGST->HrefValue = "";
            $this->pharmacyGST->TooltipValue = "";

            // HospId
            $this->HospId->LinkCustomAttributes = "";
            $this->HospId->HrefValue = "";
            $this->HospId->TooltipValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";
            $this->BranchID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->EditValue = FormatNumber($this->id->EditValue, 0, -2, -2, -2);
            $this->id->ViewCustomAttributes = "";

            // logo
            $this->logo->EditAttrs["class"] = "form-control";
            $this->logo->EditCustomAttributes = "";
            if (!EmptyValue($this->logo->Upload->DbValue)) {
                $this->logo->ImageWidth = 80;
                $this->logo->ImageHeight = 80;
                $this->logo->ImageAlt = $this->logo->alt();
                $this->logo->EditValue = $this->logo->Upload->DbValue;
            } else {
                $this->logo->EditValue = "";
            }
            if (!EmptyValue($this->logo->CurrentValue)) {
                $this->logo->Upload->FileName = $this->logo->CurrentValue;
            }
            if ($this->isShow()) {
                RenderUploadField($this->logo);
            }

            // pharmacy
            $this->pharmacy->EditAttrs["class"] = "form-control";
            $this->pharmacy->EditCustomAttributes = "";
            if (!$this->pharmacy->Raw) {
                $this->pharmacy->CurrentValue = HtmlDecode($this->pharmacy->CurrentValue);
            }
            $this->pharmacy->EditValue = HtmlEncode($this->pharmacy->CurrentValue);
            $this->pharmacy->PlaceHolder = RemoveHtml($this->pharmacy->caption());

            // street
            $this->street->EditAttrs["class"] = "form-control";
            $this->street->EditCustomAttributes = "";
            if (!$this->street->Raw) {
                $this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
            }
            $this->street->EditValue = HtmlEncode($this->street->CurrentValue);
            $this->street->PlaceHolder = RemoveHtml($this->street->caption());

            // area
            $this->area->EditAttrs["class"] = "form-control";
            $this->area->EditCustomAttributes = "";
            if (!$this->area->Raw) {
                $this->area->CurrentValue = HtmlDecode($this->area->CurrentValue);
            }
            $this->area->EditValue = HtmlEncode($this->area->CurrentValue);
            $this->area->PlaceHolder = RemoveHtml($this->area->caption());

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

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // phone_no
            $this->phone_no->EditAttrs["class"] = "form-control";
            $this->phone_no->EditCustomAttributes = "";
            if (!$this->phone_no->Raw) {
                $this->phone_no->CurrentValue = HtmlDecode($this->phone_no->CurrentValue);
            }
            $this->phone_no->EditValue = HtmlEncode($this->phone_no->CurrentValue);
            $this->phone_no->PlaceHolder = RemoveHtml($this->phone_no->caption());

            // PreFixCode
            $this->PreFixCode->EditAttrs["class"] = "form-control";
            $this->PreFixCode->EditCustomAttributes = "";
            if (!$this->PreFixCode->Raw) {
                $this->PreFixCode->CurrentValue = HtmlDecode($this->PreFixCode->CurrentValue);
            }
            $this->PreFixCode->EditValue = HtmlEncode($this->PreFixCode->CurrentValue);
            $this->PreFixCode->PlaceHolder = RemoveHtml($this->PreFixCode->caption());

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

            // modifiedby

            // modifieddatetime

            // pharmacyGST
            $this->pharmacyGST->EditAttrs["class"] = "form-control";
            $this->pharmacyGST->EditCustomAttributes = "";
            if (!$this->pharmacyGST->Raw) {
                $this->pharmacyGST->CurrentValue = HtmlDecode($this->pharmacyGST->CurrentValue);
            }
            $this->pharmacyGST->EditValue = HtmlEncode($this->pharmacyGST->CurrentValue);
            $this->pharmacyGST->PlaceHolder = RemoveHtml($this->pharmacyGST->caption());

            // HospId
            $this->HospId->EditCustomAttributes = "";
            $curVal = trim(strval($this->HospId->CurrentValue));
            if ($curVal != "") {
                $this->HospId->ViewValue = $this->HospId->lookupCacheOption($curVal);
            } else {
                $this->HospId->ViewValue = $this->HospId->Lookup !== null && is_array($this->HospId->Lookup->Options) ? $curVal : null;
            }
            if ($this->HospId->ViewValue !== null) { // Load from cache
                $this->HospId->EditValue = array_values($this->HospId->Lookup->Options);
                if ($this->HospId->ViewValue == "") {
                    $this->HospId->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->HospId->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->HospId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->HospId->Lookup->renderViewRow($rswrk[0]);
                    $this->HospId->ViewValue = $this->HospId->displayValue($arwrk);
                } else {
                    $this->HospId->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->HospId->EditValue = $arwrk;
            }
            $this->HospId->PlaceHolder = RemoveHtml($this->HospId->caption());

            // BranchID
            $this->BranchID->EditAttrs["class"] = "form-control";
            $this->BranchID->EditCustomAttributes = "";
            $this->BranchID->EditValue = HtmlEncode($this->BranchID->CurrentValue);
            $this->BranchID->PlaceHolder = RemoveHtml($this->BranchID->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // logo
            $this->logo->LinkCustomAttributes = "";
            if (!EmptyValue($this->logo->Upload->DbValue)) {
                $this->logo->HrefValue = GetFileUploadUrl($this->logo, $this->logo->htmlDecode($this->logo->Upload->DbValue)); // Add prefix/suffix
                $this->logo->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->logo->HrefValue = FullUrl($this->logo->HrefValue, "href");
                }
            } else {
                $this->logo->HrefValue = "";
            }
            $this->logo->ExportHrefValue = $this->logo->UploadPath . $this->logo->Upload->DbValue;

            // pharmacy
            $this->pharmacy->LinkCustomAttributes = "";
            $this->pharmacy->HrefValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";

            // area
            $this->area->LinkCustomAttributes = "";
            $this->area->HrefValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";

            // phone_no
            $this->phone_no->LinkCustomAttributes = "";
            $this->phone_no->HrefValue = "";

            // PreFixCode
            $this->PreFixCode->LinkCustomAttributes = "";
            $this->PreFixCode->HrefValue = "";

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

            // pharmacyGST
            $this->pharmacyGST->LinkCustomAttributes = "";
            $this->pharmacyGST->HrefValue = "";

            // HospId
            $this->HospId->LinkCustomAttributes = "";
            $this->HospId->HrefValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";
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
        if ($this->logo->Required) {
            if ($this->logo->Upload->FileName == "" && !$this->logo->Upload->KeepFile) {
                $this->logo->addErrorMessage(str_replace("%s", $this->logo->caption(), $this->logo->RequiredErrorMessage));
            }
        }
        if ($this->pharmacy->Required) {
            if (!$this->pharmacy->IsDetailKey && EmptyValue($this->pharmacy->FormValue)) {
                $this->pharmacy->addErrorMessage(str_replace("%s", $this->pharmacy->caption(), $this->pharmacy->RequiredErrorMessage));
            }
        }
        if ($this->street->Required) {
            if (!$this->street->IsDetailKey && EmptyValue($this->street->FormValue)) {
                $this->street->addErrorMessage(str_replace("%s", $this->street->caption(), $this->street->RequiredErrorMessage));
            }
        }
        if ($this->area->Required) {
            if (!$this->area->IsDetailKey && EmptyValue($this->area->FormValue)) {
                $this->area->addErrorMessage(str_replace("%s", $this->area->caption(), $this->area->RequiredErrorMessage));
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
        if ($this->postal_code->Required) {
            if (!$this->postal_code->IsDetailKey && EmptyValue($this->postal_code->FormValue)) {
                $this->postal_code->addErrorMessage(str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
            }
        }
        if ($this->phone_no->Required) {
            if (!$this->phone_no->IsDetailKey && EmptyValue($this->phone_no->FormValue)) {
                $this->phone_no->addErrorMessage(str_replace("%s", $this->phone_no->caption(), $this->phone_no->RequiredErrorMessage));
            }
        }
        if ($this->PreFixCode->Required) {
            if (!$this->PreFixCode->IsDetailKey && EmptyValue($this->PreFixCode->FormValue)) {
                $this->PreFixCode->addErrorMessage(str_replace("%s", $this->PreFixCode->caption(), $this->PreFixCode->RequiredErrorMessage));
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
        if ($this->pharmacyGST->Required) {
            if (!$this->pharmacyGST->IsDetailKey && EmptyValue($this->pharmacyGST->FormValue)) {
                $this->pharmacyGST->addErrorMessage(str_replace("%s", $this->pharmacyGST->caption(), $this->pharmacyGST->RequiredErrorMessage));
            }
        }
        if ($this->HospId->Required) {
            if (!$this->HospId->IsDetailKey && EmptyValue($this->HospId->FormValue)) {
                $this->HospId->addErrorMessage(str_replace("%s", $this->HospId->caption(), $this->HospId->RequiredErrorMessage));
            }
        }
        if ($this->BranchID->Required) {
            if (!$this->BranchID->IsDetailKey && EmptyValue($this->BranchID->FormValue)) {
                $this->BranchID->addErrorMessage(str_replace("%s", $this->BranchID->caption(), $this->BranchID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BranchID->FormValue)) {
            $this->BranchID->addErrorMessage($this->BranchID->getErrorMessage(false));
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

            // logo
            if ($this->logo->Visible && !$this->logo->ReadOnly && !$this->logo->Upload->KeepFile) {
                $this->logo->Upload->DbValue = $rsold['logo']; // Get original value
                if ($this->logo->Upload->FileName == "") {
                    $rsnew['logo'] = null;
                } else {
                    $rsnew['logo'] = $this->logo->Upload->FileName;
                }
            }

            // pharmacy
            $this->pharmacy->setDbValueDef($rsnew, $this->pharmacy->CurrentValue, "", $this->pharmacy->ReadOnly);

            // street
            $this->street->setDbValueDef($rsnew, $this->street->CurrentValue, "", $this->street->ReadOnly);

            // area
            $this->area->setDbValueDef($rsnew, $this->area->CurrentValue, null, $this->area->ReadOnly);

            // town
            $this->town->setDbValueDef($rsnew, $this->town->CurrentValue, null, $this->town->ReadOnly);

            // province
            $this->province->setDbValueDef($rsnew, $this->province->CurrentValue, null, $this->province->ReadOnly);

            // postal_code
            $this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, null, $this->postal_code->ReadOnly);

            // phone_no
            $this->phone_no->setDbValueDef($rsnew, $this->phone_no->CurrentValue, null, $this->phone_no->ReadOnly);

            // PreFixCode
            $this->PreFixCode->setDbValueDef($rsnew, $this->PreFixCode->CurrentValue, null, $this->PreFixCode->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, $this->status->ReadOnly);

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

            // pharmacyGST
            $this->pharmacyGST->setDbValueDef($rsnew, $this->pharmacyGST->CurrentValue, null, $this->pharmacyGST->ReadOnly);

            // HospId
            $this->HospId->setDbValueDef($rsnew, $this->HospId->CurrentValue, null, $this->HospId->ReadOnly);

            // BranchID
            $this->BranchID->setDbValueDef($rsnew, $this->BranchID->CurrentValue, null, $this->BranchID->ReadOnly);
            if ($this->logo->Visible && !$this->logo->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->logo->Upload->DbValue) ? [] : [$this->logo->htmlDecode($this->logo->Upload->DbValue)];
                if (!EmptyValue($this->logo->Upload->FileName)) {
                    $newFiles = [$this->logo->Upload->FileName];
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->logo, $this->logo->Upload->Index);
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
                                $file1 = UniqueFilename($this->logo->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->logo->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->logo->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->logo->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->logo->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->logo->setDbValueDef($rsnew, $this->logo->Upload->FileName, null, $this->logo->ReadOnly);
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
                    if ($this->logo->Visible && !$this->logo->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->logo->Upload->DbValue) ? [] : [$this->logo->htmlDecode($this->logo->Upload->DbValue)];
                        if (!EmptyValue($this->logo->Upload->FileName)) {
                            $newFiles = [$this->logo->Upload->FileName];
                            $newFiles2 = [$this->logo->htmlDecode($rsnew['logo'])];
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->logo, $this->logo->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->logo->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
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
                                    @unlink($this->logo->oldPhysicalUploadPath() . $oldFile);
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
            // logo
            CleanUploadTempPath($this->logo, $this->logo->Upload->Index);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("HospitalPharmacyList"), "", $this->TableVar, true);
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
                case "x_status":
                    break;
                case "x_HospId":
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
