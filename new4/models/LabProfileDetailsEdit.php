<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabProfileDetailsEdit extends LabProfileDetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_profile_details';

    // Page object name
    public $PageObjName = "LabProfileDetailsEdit";

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

        // Table object (lab_profile_details)
        if (!isset($GLOBALS["lab_profile_details"]) || get_class($GLOBALS["lab_profile_details"]) == PROJECT_NAMESPACE . "lab_profile_details") {
            $GLOBALS["lab_profile_details"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_profile_details');
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
                $doc = new $class(Container("lab_profile_details"));
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
                    if ($pageName == "LabProfileDetailsView") {
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
        $this->ProfileCode->setVisibility();
        $this->SubProfileCode->setVisibility();
        $this->ProfileTestCode->setVisibility();
        $this->ProfileSubTestCode->setVisibility();
        $this->TestOrder->setVisibility();
        $this->TestAmount->setVisibility();
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
        $this->setupLookupOptions($this->SubProfileCode);
        $this->setupLookupOptions($this->ProfileTestCode);

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
                    $this->terminate("LabProfileDetailsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "LabProfileDetailsList") {
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

        // Check field name 'ProfileCode' first before field var 'x_ProfileCode'
        $val = $CurrentForm->hasValue("ProfileCode") ? $CurrentForm->getValue("ProfileCode") : $CurrentForm->getValue("x_ProfileCode");
        if (!$this->ProfileCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileCode->Visible = false; // Disable update for API request
            } else {
                $this->ProfileCode->setFormValue($val);
            }
        }

        // Check field name 'SubProfileCode' first before field var 'x_SubProfileCode'
        $val = $CurrentForm->hasValue("SubProfileCode") ? $CurrentForm->getValue("SubProfileCode") : $CurrentForm->getValue("x_SubProfileCode");
        if (!$this->SubProfileCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SubProfileCode->Visible = false; // Disable update for API request
            } else {
                $this->SubProfileCode->setFormValue($val);
            }
        }

        // Check field name 'ProfileTestCode' first before field var 'x_ProfileTestCode'
        $val = $CurrentForm->hasValue("ProfileTestCode") ? $CurrentForm->getValue("ProfileTestCode") : $CurrentForm->getValue("x_ProfileTestCode");
        if (!$this->ProfileTestCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileTestCode->Visible = false; // Disable update for API request
            } else {
                $this->ProfileTestCode->setFormValue($val);
            }
        }

        // Check field name 'ProfileSubTestCode' first before field var 'x_ProfileSubTestCode'
        $val = $CurrentForm->hasValue("ProfileSubTestCode") ? $CurrentForm->getValue("ProfileSubTestCode") : $CurrentForm->getValue("x_ProfileSubTestCode");
        if (!$this->ProfileSubTestCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileSubTestCode->Visible = false; // Disable update for API request
            } else {
                $this->ProfileSubTestCode->setFormValue($val);
            }
        }

        // Check field name 'TestOrder' first before field var 'x_TestOrder'
        $val = $CurrentForm->hasValue("TestOrder") ? $CurrentForm->getValue("TestOrder") : $CurrentForm->getValue("x_TestOrder");
        if (!$this->TestOrder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestOrder->Visible = false; // Disable update for API request
            } else {
                $this->TestOrder->setFormValue($val);
            }
        }

        // Check field name 'TestAmount' first before field var 'x_TestAmount'
        $val = $CurrentForm->hasValue("TestAmount") ? $CurrentForm->getValue("TestAmount") : $CurrentForm->getValue("x_TestAmount");
        if (!$this->TestAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestAmount->Visible = false; // Disable update for API request
            } else {
                $this->TestAmount->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->ProfileCode->CurrentValue = $this->ProfileCode->FormValue;
        $this->SubProfileCode->CurrentValue = $this->SubProfileCode->FormValue;
        $this->ProfileTestCode->CurrentValue = $this->ProfileTestCode->FormValue;
        $this->ProfileSubTestCode->CurrentValue = $this->ProfileSubTestCode->FormValue;
        $this->TestOrder->CurrentValue = $this->TestOrder->FormValue;
        $this->TestAmount->CurrentValue = $this->TestAmount->FormValue;
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
        $this->ProfileCode->setDbValue($row['ProfileCode']);
        $this->SubProfileCode->setDbValue($row['SubProfileCode']);
        $this->ProfileTestCode->setDbValue($row['ProfileTestCode']);
        $this->ProfileSubTestCode->setDbValue($row['ProfileSubTestCode']);
        $this->TestOrder->setDbValue($row['TestOrder']);
        $this->TestAmount->setDbValue($row['TestAmount']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ProfileCode'] = null;
        $row['SubProfileCode'] = null;
        $row['ProfileTestCode'] = null;
        $row['ProfileSubTestCode'] = null;
        $row['TestOrder'] = null;
        $row['TestAmount'] = null;
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
        if ($this->TestOrder->FormValue == $this->TestOrder->CurrentValue && is_numeric(ConvertToFloatString($this->TestOrder->CurrentValue))) {
            $this->TestOrder->CurrentValue = ConvertToFloatString($this->TestOrder->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TestAmount->FormValue == $this->TestAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TestAmount->CurrentValue))) {
            $this->TestAmount->CurrentValue = ConvertToFloatString($this->TestAmount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // ProfileCode

        // SubProfileCode

        // ProfileTestCode

        // ProfileSubTestCode

        // TestOrder

        // TestAmount
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ProfileCode
            $this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
            $this->ProfileCode->ViewCustomAttributes = "";

            // SubProfileCode
            $curVal = trim(strval($this->SubProfileCode->CurrentValue));
            if ($curVal != "") {
                $this->SubProfileCode->ViewValue = $this->SubProfileCode->lookupCacheOption($curVal);
                if ($this->SubProfileCode->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->SubProfileCode->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SubProfileCode->Lookup->renderViewRow($rswrk[0]);
                        $this->SubProfileCode->ViewValue = $this->SubProfileCode->displayValue($arwrk);
                    } else {
                        $this->SubProfileCode->ViewValue = $this->SubProfileCode->CurrentValue;
                    }
                }
            } else {
                $this->SubProfileCode->ViewValue = null;
            }
            $this->SubProfileCode->ViewCustomAttributes = "";

            // ProfileTestCode
            $curVal = trim(strval($this->ProfileTestCode->CurrentValue));
            if ($curVal != "") {
                $this->ProfileTestCode->ViewValue = $this->ProfileTestCode->lookupCacheOption($curVal);
                if ($this->ProfileTestCode->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ProfileTestCode->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ProfileTestCode->Lookup->renderViewRow($rswrk[0]);
                        $this->ProfileTestCode->ViewValue = $this->ProfileTestCode->displayValue($arwrk);
                    } else {
                        $this->ProfileTestCode->ViewValue = $this->ProfileTestCode->CurrentValue;
                    }
                }
            } else {
                $this->ProfileTestCode->ViewValue = null;
            }
            $this->ProfileTestCode->ViewCustomAttributes = "";

            // ProfileSubTestCode
            $this->ProfileSubTestCode->ViewValue = $this->ProfileSubTestCode->CurrentValue;
            $this->ProfileSubTestCode->ViewCustomAttributes = "";

            // TestOrder
            $this->TestOrder->ViewValue = $this->TestOrder->CurrentValue;
            $this->TestOrder->ViewValue = FormatNumber($this->TestOrder->ViewValue, 2, -2, -2, -2);
            $this->TestOrder->ViewCustomAttributes = "";

            // TestAmount
            $this->TestAmount->ViewValue = $this->TestAmount->CurrentValue;
            $this->TestAmount->ViewValue = FormatNumber($this->TestAmount->ViewValue, 2, -2, -2, -2);
            $this->TestAmount->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ProfileCode
            $this->ProfileCode->LinkCustomAttributes = "";
            $this->ProfileCode->HrefValue = "";
            $this->ProfileCode->TooltipValue = "";

            // SubProfileCode
            $this->SubProfileCode->LinkCustomAttributes = "";
            $this->SubProfileCode->HrefValue = "";
            $this->SubProfileCode->TooltipValue = "";

            // ProfileTestCode
            $this->ProfileTestCode->LinkCustomAttributes = "";
            $this->ProfileTestCode->HrefValue = "";
            $this->ProfileTestCode->TooltipValue = "";

            // ProfileSubTestCode
            $this->ProfileSubTestCode->LinkCustomAttributes = "";
            $this->ProfileSubTestCode->HrefValue = "";
            $this->ProfileSubTestCode->TooltipValue = "";

            // TestOrder
            $this->TestOrder->LinkCustomAttributes = "";
            $this->TestOrder->HrefValue = "";
            $this->TestOrder->TooltipValue = "";

            // TestAmount
            $this->TestAmount->LinkCustomAttributes = "";
            $this->TestAmount->HrefValue = "";
            $this->TestAmount->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ProfileCode
            $this->ProfileCode->EditAttrs["class"] = "form-control";
            $this->ProfileCode->EditCustomAttributes = "";
            if ($this->ProfileCode->getSessionValue() != "") {
                $this->ProfileCode->CurrentValue = GetForeignKeyValue($this->ProfileCode->getSessionValue());
                $this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
                $this->ProfileCode->ViewCustomAttributes = "";
            } else {
                if (!$this->ProfileCode->Raw) {
                    $this->ProfileCode->CurrentValue = HtmlDecode($this->ProfileCode->CurrentValue);
                }
                $this->ProfileCode->EditValue = HtmlEncode($this->ProfileCode->CurrentValue);
                $this->ProfileCode->PlaceHolder = RemoveHtml($this->ProfileCode->caption());
            }

            // SubProfileCode
            $this->SubProfileCode->EditCustomAttributes = "";
            $curVal = trim(strval($this->SubProfileCode->CurrentValue));
            if ($curVal != "") {
                $this->SubProfileCode->ViewValue = $this->SubProfileCode->lookupCacheOption($curVal);
            } else {
                $this->SubProfileCode->ViewValue = $this->SubProfileCode->Lookup !== null && is_array($this->SubProfileCode->Lookup->Options) ? $curVal : null;
            }
            if ($this->SubProfileCode->ViewValue !== null) { // Load from cache
                $this->SubProfileCode->EditValue = array_values($this->SubProfileCode->Lookup->Options);
                if ($this->SubProfileCode->ViewValue == "") {
                    $this->SubProfileCode->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->SubProfileCode->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->SubProfileCode->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->SubProfileCode->Lookup->renderViewRow($rswrk[0]);
                    $this->SubProfileCode->ViewValue = $this->SubProfileCode->displayValue($arwrk);
                } else {
                    $this->SubProfileCode->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->SubProfileCode->EditValue = $arwrk;
            }
            $this->SubProfileCode->PlaceHolder = RemoveHtml($this->SubProfileCode->caption());

            // ProfileTestCode
            $this->ProfileTestCode->EditCustomAttributes = "";
            $curVal = trim(strval($this->ProfileTestCode->CurrentValue));
            if ($curVal != "") {
                $this->ProfileTestCode->ViewValue = $this->ProfileTestCode->lookupCacheOption($curVal);
            } else {
                $this->ProfileTestCode->ViewValue = $this->ProfileTestCode->Lookup !== null && is_array($this->ProfileTestCode->Lookup->Options) ? $curVal : null;
            }
            if ($this->ProfileTestCode->ViewValue !== null) { // Load from cache
                $this->ProfileTestCode->EditValue = array_values($this->ProfileTestCode->Lookup->Options);
                if ($this->ProfileTestCode->ViewValue == "") {
                    $this->ProfileTestCode->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->ProfileTestCode->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ProfileTestCode->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->ProfileTestCode->Lookup->renderViewRow($rswrk[0]);
                    $this->ProfileTestCode->ViewValue = $this->ProfileTestCode->displayValue($arwrk);
                } else {
                    $this->ProfileTestCode->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->ProfileTestCode->EditValue = $arwrk;
            }
            $this->ProfileTestCode->PlaceHolder = RemoveHtml($this->ProfileTestCode->caption());

            // ProfileSubTestCode
            $this->ProfileSubTestCode->EditAttrs["class"] = "form-control";
            $this->ProfileSubTestCode->EditCustomAttributes = "";
            if (!$this->ProfileSubTestCode->Raw) {
                $this->ProfileSubTestCode->CurrentValue = HtmlDecode($this->ProfileSubTestCode->CurrentValue);
            }
            $this->ProfileSubTestCode->EditValue = HtmlEncode($this->ProfileSubTestCode->CurrentValue);
            $this->ProfileSubTestCode->PlaceHolder = RemoveHtml($this->ProfileSubTestCode->caption());

            // TestOrder
            $this->TestOrder->EditAttrs["class"] = "form-control";
            $this->TestOrder->EditCustomAttributes = "";
            $this->TestOrder->EditValue = HtmlEncode($this->TestOrder->CurrentValue);
            $this->TestOrder->PlaceHolder = RemoveHtml($this->TestOrder->caption());
            if (strval($this->TestOrder->EditValue) != "" && is_numeric($this->TestOrder->EditValue)) {
                $this->TestOrder->EditValue = FormatNumber($this->TestOrder->EditValue, -2, -2, -2, -2);
            }

            // TestAmount
            $this->TestAmount->EditAttrs["class"] = "form-control";
            $this->TestAmount->EditCustomAttributes = "";
            $this->TestAmount->EditValue = HtmlEncode($this->TestAmount->CurrentValue);
            $this->TestAmount->PlaceHolder = RemoveHtml($this->TestAmount->caption());
            if (strval($this->TestAmount->EditValue) != "" && is_numeric($this->TestAmount->EditValue)) {
                $this->TestAmount->EditValue = FormatNumber($this->TestAmount->EditValue, -2, -2, -2, -2);
            }

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // ProfileCode
            $this->ProfileCode->LinkCustomAttributes = "";
            $this->ProfileCode->HrefValue = "";

            // SubProfileCode
            $this->SubProfileCode->LinkCustomAttributes = "";
            $this->SubProfileCode->HrefValue = "";

            // ProfileTestCode
            $this->ProfileTestCode->LinkCustomAttributes = "";
            $this->ProfileTestCode->HrefValue = "";

            // ProfileSubTestCode
            $this->ProfileSubTestCode->LinkCustomAttributes = "";
            $this->ProfileSubTestCode->HrefValue = "";

            // TestOrder
            $this->TestOrder->LinkCustomAttributes = "";
            $this->TestOrder->HrefValue = "";

            // TestAmount
            $this->TestAmount->LinkCustomAttributes = "";
            $this->TestAmount->HrefValue = "";
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
        if ($this->ProfileCode->Required) {
            if (!$this->ProfileCode->IsDetailKey && EmptyValue($this->ProfileCode->FormValue)) {
                $this->ProfileCode->addErrorMessage(str_replace("%s", $this->ProfileCode->caption(), $this->ProfileCode->RequiredErrorMessage));
            }
        }
        if ($this->SubProfileCode->Required) {
            if (!$this->SubProfileCode->IsDetailKey && EmptyValue($this->SubProfileCode->FormValue)) {
                $this->SubProfileCode->addErrorMessage(str_replace("%s", $this->SubProfileCode->caption(), $this->SubProfileCode->RequiredErrorMessage));
            }
        }
        if ($this->ProfileTestCode->Required) {
            if (!$this->ProfileTestCode->IsDetailKey && EmptyValue($this->ProfileTestCode->FormValue)) {
                $this->ProfileTestCode->addErrorMessage(str_replace("%s", $this->ProfileTestCode->caption(), $this->ProfileTestCode->RequiredErrorMessage));
            }
        }
        if ($this->ProfileSubTestCode->Required) {
            if (!$this->ProfileSubTestCode->IsDetailKey && EmptyValue($this->ProfileSubTestCode->FormValue)) {
                $this->ProfileSubTestCode->addErrorMessage(str_replace("%s", $this->ProfileSubTestCode->caption(), $this->ProfileSubTestCode->RequiredErrorMessage));
            }
        }
        if ($this->TestOrder->Required) {
            if (!$this->TestOrder->IsDetailKey && EmptyValue($this->TestOrder->FormValue)) {
                $this->TestOrder->addErrorMessage(str_replace("%s", $this->TestOrder->caption(), $this->TestOrder->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TestOrder->FormValue)) {
            $this->TestOrder->addErrorMessage($this->TestOrder->getErrorMessage(false));
        }
        if ($this->TestAmount->Required) {
            if (!$this->TestAmount->IsDetailKey && EmptyValue($this->TestAmount->FormValue)) {
                $this->TestAmount->addErrorMessage(str_replace("%s", $this->TestAmount->caption(), $this->TestAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TestAmount->FormValue)) {
            $this->TestAmount->addErrorMessage($this->TestAmount->getErrorMessage(false));
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

            // ProfileCode
            if ($this->ProfileCode->getSessionValue() != "") {
                $this->ProfileCode->ReadOnly = true;
            }
            $this->ProfileCode->setDbValueDef($rsnew, $this->ProfileCode->CurrentValue, "", $this->ProfileCode->ReadOnly);

            // SubProfileCode
            $this->SubProfileCode->setDbValueDef($rsnew, $this->SubProfileCode->CurrentValue, null, $this->SubProfileCode->ReadOnly);

            // ProfileTestCode
            $this->ProfileTestCode->setDbValueDef($rsnew, $this->ProfileTestCode->CurrentValue, "", $this->ProfileTestCode->ReadOnly);

            // ProfileSubTestCode
            $this->ProfileSubTestCode->setDbValueDef($rsnew, $this->ProfileSubTestCode->CurrentValue, null, $this->ProfileSubTestCode->ReadOnly);

            // TestOrder
            $this->TestOrder->setDbValueDef($rsnew, $this->TestOrder->CurrentValue, null, $this->TestOrder->ReadOnly);

            // TestAmount
            $this->TestAmount->setDbValueDef($rsnew, $this->TestAmount->CurrentValue, null, $this->TestAmount->ReadOnly);

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
            if ($masterTblVar == "view_lab_profile") {
                $validMaster = true;
                $masterTbl = Container("view_lab_profile");
                if (($parm = Get("fk_CODE", Get("ProfileCode"))) !== null) {
                    $masterTbl->CODE->setQueryStringValue($parm);
                    $this->ProfileCode->setQueryStringValue($masterTbl->CODE->QueryStringValue);
                    $this->ProfileCode->setSessionValue($this->ProfileCode->QueryStringValue);
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
            if ($masterTblVar == "view_lab_profile") {
                $validMaster = true;
                $masterTbl = Container("view_lab_profile");
                if (($parm = Post("fk_CODE", Post("ProfileCode"))) !== null) {
                    $masterTbl->CODE->setFormValue($parm);
                    $this->ProfileCode->setFormValue($masterTbl->CODE->FormValue);
                    $this->ProfileCode->setSessionValue($this->ProfileCode->FormValue);
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
            if ($masterTblVar != "view_lab_profile") {
                if ($this->ProfileCode->CurrentValue == "") {
                    $this->ProfileCode->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("LabProfileDetailsList"), "", $this->TableVar, true);
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
                case "x_SubProfileCode":
                    break;
                case "x_ProfileTestCode":
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
