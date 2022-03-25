<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmLeadstatusEdit extends CrmLeadstatus
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_leadstatus';

    // Page object name
    public $PageObjName = "CrmLeadstatusEdit";

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

        // Table object (crm_leadstatus)
        if (!isset($GLOBALS["crm_leadstatus"]) || get_class($GLOBALS["crm_leadstatus"]) == PROJECT_NAMESPACE . "crm_leadstatus") {
            $GLOBALS["crm_leadstatus"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leadstatus');
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
                $doc = new $class(Container("crm_leadstatus"));
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
                    if ($pageName == "CrmLeadstatusView") {
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
            $key .= @$ar['leadstatusid'];
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
            $this->leadstatusid->Visible = false;
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
        $this->leadstatusid->setVisibility();
        $this->leadstatus->setVisibility();
        $this->presence->setVisibility();
        $this->picklist_valueid->setVisibility();
        $this->sortorderid->setVisibility();
        $this->color->setVisibility();
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
            if (($keyValue = Get("leadstatusid") ?? Key(0) ?? Route(2)) !== null) {
                $this->leadstatusid->setQueryStringValue($keyValue);
                $this->leadstatusid->setOldValue($this->leadstatusid->QueryStringValue);
            } elseif (Post("leadstatusid") !== null) {
                $this->leadstatusid->setFormValue(Post("leadstatusid"));
                $this->leadstatusid->setOldValue($this->leadstatusid->FormValue);
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
                if (($keyValue = Get("leadstatusid") ?? Route("leadstatusid")) !== null) {
                    $this->leadstatusid->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->leadstatusid->CurrentValue = null;
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
                    $this->terminate("CrmLeadstatusList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "CrmLeadstatusList") {
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

        // Check field name 'leadstatusid' first before field var 'x_leadstatusid'
        $val = $CurrentForm->hasValue("leadstatusid") ? $CurrentForm->getValue("leadstatusid") : $CurrentForm->getValue("x_leadstatusid");
        if (!$this->leadstatusid->IsDetailKey) {
            $this->leadstatusid->setFormValue($val);
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

        // Check field name 'presence' first before field var 'x_presence'
        $val = $CurrentForm->hasValue("presence") ? $CurrentForm->getValue("presence") : $CurrentForm->getValue("x_presence");
        if (!$this->presence->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->presence->Visible = false; // Disable update for API request
            } else {
                $this->presence->setFormValue($val);
            }
        }

        // Check field name 'picklist_valueid' first before field var 'x_picklist_valueid'
        $val = $CurrentForm->hasValue("picklist_valueid") ? $CurrentForm->getValue("picklist_valueid") : $CurrentForm->getValue("x_picklist_valueid");
        if (!$this->picklist_valueid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->picklist_valueid->Visible = false; // Disable update for API request
            } else {
                $this->picklist_valueid->setFormValue($val);
            }
        }

        // Check field name 'sortorderid' first before field var 'x_sortorderid'
        $val = $CurrentForm->hasValue("sortorderid") ? $CurrentForm->getValue("sortorderid") : $CurrentForm->getValue("x_sortorderid");
        if (!$this->sortorderid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sortorderid->Visible = false; // Disable update for API request
            } else {
                $this->sortorderid->setFormValue($val);
            }
        }

        // Check field name 'color' first before field var 'x_color'
        $val = $CurrentForm->hasValue("color") ? $CurrentForm->getValue("color") : $CurrentForm->getValue("x_color");
        if (!$this->color->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->color->Visible = false; // Disable update for API request
            } else {
                $this->color->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->leadstatusid->CurrentValue = $this->leadstatusid->FormValue;
        $this->leadstatus->CurrentValue = $this->leadstatus->FormValue;
        $this->presence->CurrentValue = $this->presence->FormValue;
        $this->picklist_valueid->CurrentValue = $this->picklist_valueid->FormValue;
        $this->sortorderid->CurrentValue = $this->sortorderid->FormValue;
        $this->color->CurrentValue = $this->color->FormValue;
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
        $this->leadstatusid->setDbValue($row['leadstatusid']);
        $this->leadstatus->setDbValue($row['leadstatus']);
        $this->presence->setDbValue($row['presence']);
        $this->picklist_valueid->setDbValue($row['picklist_valueid']);
        $this->sortorderid->setDbValue($row['sortorderid']);
        $this->color->setDbValue($row['color']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['leadstatusid'] = null;
        $row['leadstatus'] = null;
        $row['presence'] = null;
        $row['picklist_valueid'] = null;
        $row['sortorderid'] = null;
        $row['color'] = null;
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

        // leadstatusid

        // leadstatus

        // presence

        // picklist_valueid

        // sortorderid

        // color
        if ($this->RowType == ROWTYPE_VIEW) {
            // leadstatusid
            $this->leadstatusid->ViewValue = $this->leadstatusid->CurrentValue;
            $this->leadstatusid->ViewCustomAttributes = "";

            // leadstatus
            $this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
            $this->leadstatus->ViewCustomAttributes = "";

            // presence
            $this->presence->ViewValue = $this->presence->CurrentValue;
            $this->presence->ViewValue = FormatNumber($this->presence->ViewValue, 0, -2, -2, -2);
            $this->presence->ViewCustomAttributes = "";

            // picklist_valueid
            $this->picklist_valueid->ViewValue = $this->picklist_valueid->CurrentValue;
            $this->picklist_valueid->ViewValue = FormatNumber($this->picklist_valueid->ViewValue, 0, -2, -2, -2);
            $this->picklist_valueid->ViewCustomAttributes = "";

            // sortorderid
            $this->sortorderid->ViewValue = $this->sortorderid->CurrentValue;
            $this->sortorderid->ViewValue = FormatNumber($this->sortorderid->ViewValue, 0, -2, -2, -2);
            $this->sortorderid->ViewCustomAttributes = "";

            // color
            $this->color->ViewValue = $this->color->CurrentValue;
            $this->color->ViewCustomAttributes = "";

            // leadstatusid
            $this->leadstatusid->LinkCustomAttributes = "";
            $this->leadstatusid->HrefValue = "";
            $this->leadstatusid->TooltipValue = "";

            // leadstatus
            $this->leadstatus->LinkCustomAttributes = "";
            $this->leadstatus->HrefValue = "";
            $this->leadstatus->TooltipValue = "";

            // presence
            $this->presence->LinkCustomAttributes = "";
            $this->presence->HrefValue = "";
            $this->presence->TooltipValue = "";

            // picklist_valueid
            $this->picklist_valueid->LinkCustomAttributes = "";
            $this->picklist_valueid->HrefValue = "";
            $this->picklist_valueid->TooltipValue = "";

            // sortorderid
            $this->sortorderid->LinkCustomAttributes = "";
            $this->sortorderid->HrefValue = "";
            $this->sortorderid->TooltipValue = "";

            // color
            $this->color->LinkCustomAttributes = "";
            $this->color->HrefValue = "";
            $this->color->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // leadstatusid
            $this->leadstatusid->EditAttrs["class"] = "form-control";
            $this->leadstatusid->EditCustomAttributes = "";
            $this->leadstatusid->EditValue = $this->leadstatusid->CurrentValue;
            $this->leadstatusid->ViewCustomAttributes = "";

            // leadstatus
            $this->leadstatus->EditAttrs["class"] = "form-control";
            $this->leadstatus->EditCustomAttributes = "";
            if (!$this->leadstatus->Raw) {
                $this->leadstatus->CurrentValue = HtmlDecode($this->leadstatus->CurrentValue);
            }
            $this->leadstatus->EditValue = HtmlEncode($this->leadstatus->CurrentValue);
            $this->leadstatus->PlaceHolder = RemoveHtml($this->leadstatus->caption());

            // presence
            $this->presence->EditAttrs["class"] = "form-control";
            $this->presence->EditCustomAttributes = "";
            $this->presence->EditValue = HtmlEncode($this->presence->CurrentValue);
            $this->presence->PlaceHolder = RemoveHtml($this->presence->caption());

            // picklist_valueid
            $this->picklist_valueid->EditAttrs["class"] = "form-control";
            $this->picklist_valueid->EditCustomAttributes = "";
            $this->picklist_valueid->EditValue = HtmlEncode($this->picklist_valueid->CurrentValue);
            $this->picklist_valueid->PlaceHolder = RemoveHtml($this->picklist_valueid->caption());

            // sortorderid
            $this->sortorderid->EditAttrs["class"] = "form-control";
            $this->sortorderid->EditCustomAttributes = "";
            $this->sortorderid->EditValue = HtmlEncode($this->sortorderid->CurrentValue);
            $this->sortorderid->PlaceHolder = RemoveHtml($this->sortorderid->caption());

            // color
            $this->color->EditAttrs["class"] = "form-control";
            $this->color->EditCustomAttributes = "";
            if (!$this->color->Raw) {
                $this->color->CurrentValue = HtmlDecode($this->color->CurrentValue);
            }
            $this->color->EditValue = HtmlEncode($this->color->CurrentValue);
            $this->color->PlaceHolder = RemoveHtml($this->color->caption());

            // Edit refer script

            // leadstatusid
            $this->leadstatusid->LinkCustomAttributes = "";
            $this->leadstatusid->HrefValue = "";

            // leadstatus
            $this->leadstatus->LinkCustomAttributes = "";
            $this->leadstatus->HrefValue = "";

            // presence
            $this->presence->LinkCustomAttributes = "";
            $this->presence->HrefValue = "";

            // picklist_valueid
            $this->picklist_valueid->LinkCustomAttributes = "";
            $this->picklist_valueid->HrefValue = "";

            // sortorderid
            $this->sortorderid->LinkCustomAttributes = "";
            $this->sortorderid->HrefValue = "";

            // color
            $this->color->LinkCustomAttributes = "";
            $this->color->HrefValue = "";
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
        if ($this->leadstatusid->Required) {
            if (!$this->leadstatusid->IsDetailKey && EmptyValue($this->leadstatusid->FormValue)) {
                $this->leadstatusid->addErrorMessage(str_replace("%s", $this->leadstatusid->caption(), $this->leadstatusid->RequiredErrorMessage));
            }
        }
        if ($this->leadstatus->Required) {
            if (!$this->leadstatus->IsDetailKey && EmptyValue($this->leadstatus->FormValue)) {
                $this->leadstatus->addErrorMessage(str_replace("%s", $this->leadstatus->caption(), $this->leadstatus->RequiredErrorMessage));
            }
        }
        if ($this->presence->Required) {
            if (!$this->presence->IsDetailKey && EmptyValue($this->presence->FormValue)) {
                $this->presence->addErrorMessage(str_replace("%s", $this->presence->caption(), $this->presence->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->presence->FormValue)) {
            $this->presence->addErrorMessage($this->presence->getErrorMessage(false));
        }
        if ($this->picklist_valueid->Required) {
            if (!$this->picklist_valueid->IsDetailKey && EmptyValue($this->picklist_valueid->FormValue)) {
                $this->picklist_valueid->addErrorMessage(str_replace("%s", $this->picklist_valueid->caption(), $this->picklist_valueid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->picklist_valueid->FormValue)) {
            $this->picklist_valueid->addErrorMessage($this->picklist_valueid->getErrorMessage(false));
        }
        if ($this->sortorderid->Required) {
            if (!$this->sortorderid->IsDetailKey && EmptyValue($this->sortorderid->FormValue)) {
                $this->sortorderid->addErrorMessage(str_replace("%s", $this->sortorderid->caption(), $this->sortorderid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->sortorderid->FormValue)) {
            $this->sortorderid->addErrorMessage($this->sortorderid->getErrorMessage(false));
        }
        if ($this->color->Required) {
            if (!$this->color->IsDetailKey && EmptyValue($this->color->FormValue)) {
                $this->color->addErrorMessage(str_replace("%s", $this->color->caption(), $this->color->RequiredErrorMessage));
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

            // leadstatus
            $this->leadstatus->setDbValueDef($rsnew, $this->leadstatus->CurrentValue, "", $this->leadstatus->ReadOnly);

            // presence
            $this->presence->setDbValueDef($rsnew, $this->presence->CurrentValue, 0, $this->presence->ReadOnly);

            // picklist_valueid
            $this->picklist_valueid->setDbValueDef($rsnew, $this->picklist_valueid->CurrentValue, 0, $this->picklist_valueid->ReadOnly);

            // sortorderid
            $this->sortorderid->setDbValueDef($rsnew, $this->sortorderid->CurrentValue, null, $this->sortorderid->ReadOnly);

            // color
            $this->color->setDbValueDef($rsnew, $this->color->CurrentValue, null, $this->color->ReadOnly);

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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmLeadstatusList"), "", $this->TableVar, true);
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
