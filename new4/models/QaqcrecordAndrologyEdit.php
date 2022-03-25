<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class QaqcrecordAndrologyEdit extends QaqcrecordAndrology
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'qaqcrecord_andrology';

    // Page object name
    public $PageObjName = "QaqcrecordAndrologyEdit";

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

        // Table object (qaqcrecord_andrology)
        if (!isset($GLOBALS["qaqcrecord_andrology"]) || get_class($GLOBALS["qaqcrecord_andrology"]) == PROJECT_NAMESPACE . "qaqcrecord_andrology") {
            $GLOBALS["qaqcrecord_andrology"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'qaqcrecord_andrology');
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
                $doc = new $class(Container("qaqcrecord_andrology"));
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
                    if ($pageName == "QaqcrecordAndrologyView") {
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
        $this->Date->setVisibility();
        $this->LN2_Level->setVisibility();
        $this->LN2_Checked->setVisibility();
        $this->Incubator_Temp->setVisibility();
        $this->Incubator_Cleaned->setVisibility();
        $this->LAF_MG->setVisibility();
        $this->LAF_Cleaned->setVisibility();
        $this->REF_Temp->setVisibility();
        $this->REF_Cleaned->setVisibility();
        $this->Heating_Temp->setVisibility();
        $this->Heating_Cleaned->setVisibility();
        $this->Createdby->setVisibility();
        $this->CreatedDate->setVisibility();
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
                    $this->terminate("QaqcrecordAndrologyList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "QaqcrecordAndrologyList") {
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

        // Check field name 'Date' first before field var 'x_Date'
        $val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
        if (!$this->Date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Date->Visible = false; // Disable update for API request
            } else {
                $this->Date->setFormValue($val);
            }
            $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        }

        // Check field name 'LN2_Level' first before field var 'x_LN2_Level'
        $val = $CurrentForm->hasValue("LN2_Level") ? $CurrentForm->getValue("LN2_Level") : $CurrentForm->getValue("x_LN2_Level");
        if (!$this->LN2_Level->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LN2_Level->Visible = false; // Disable update for API request
            } else {
                $this->LN2_Level->setFormValue($val);
            }
        }

        // Check field name 'LN2_Checked' first before field var 'x_LN2_Checked'
        $val = $CurrentForm->hasValue("LN2_Checked") ? $CurrentForm->getValue("LN2_Checked") : $CurrentForm->getValue("x_LN2_Checked");
        if (!$this->LN2_Checked->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LN2_Checked->Visible = false; // Disable update for API request
            } else {
                $this->LN2_Checked->setFormValue($val);
            }
        }

        // Check field name 'Incubator_Temp' first before field var 'x_Incubator_Temp'
        $val = $CurrentForm->hasValue("Incubator_Temp") ? $CurrentForm->getValue("Incubator_Temp") : $CurrentForm->getValue("x_Incubator_Temp");
        if (!$this->Incubator_Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator_Temp->Visible = false; // Disable update for API request
            } else {
                $this->Incubator_Temp->setFormValue($val);
            }
        }

        // Check field name 'Incubator_Cleaned' first before field var 'x_Incubator_Cleaned'
        $val = $CurrentForm->hasValue("Incubator_Cleaned") ? $CurrentForm->getValue("Incubator_Cleaned") : $CurrentForm->getValue("x_Incubator_Cleaned");
        if (!$this->Incubator_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->Incubator_Cleaned->setFormValue($val);
            }
        }

        // Check field name 'LAF_MG' first before field var 'x_LAF_MG'
        $val = $CurrentForm->hasValue("LAF_MG") ? $CurrentForm->getValue("LAF_MG") : $CurrentForm->getValue("x_LAF_MG");
        if (!$this->LAF_MG->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LAF_MG->Visible = false; // Disable update for API request
            } else {
                $this->LAF_MG->setFormValue($val);
            }
        }

        // Check field name 'LAF_Cleaned' first before field var 'x_LAF_Cleaned'
        $val = $CurrentForm->hasValue("LAF_Cleaned") ? $CurrentForm->getValue("LAF_Cleaned") : $CurrentForm->getValue("x_LAF_Cleaned");
        if (!$this->LAF_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LAF_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->LAF_Cleaned->setFormValue($val);
            }
        }

        // Check field name 'REF_Temp' first before field var 'x_REF_Temp'
        $val = $CurrentForm->hasValue("REF_Temp") ? $CurrentForm->getValue("REF_Temp") : $CurrentForm->getValue("x_REF_Temp");
        if (!$this->REF_Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REF_Temp->Visible = false; // Disable update for API request
            } else {
                $this->REF_Temp->setFormValue($val);
            }
        }

        // Check field name 'REF_Cleaned' first before field var 'x_REF_Cleaned'
        $val = $CurrentForm->hasValue("REF_Cleaned") ? $CurrentForm->getValue("REF_Cleaned") : $CurrentForm->getValue("x_REF_Cleaned");
        if (!$this->REF_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REF_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->REF_Cleaned->setFormValue($val);
            }
        }

        // Check field name 'Heating_Temp' first before field var 'x_Heating_Temp'
        $val = $CurrentForm->hasValue("Heating_Temp") ? $CurrentForm->getValue("Heating_Temp") : $CurrentForm->getValue("x_Heating_Temp");
        if (!$this->Heating_Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Heating_Temp->Visible = false; // Disable update for API request
            } else {
                $this->Heating_Temp->setFormValue($val);
            }
        }

        // Check field name 'Heating_Cleaned' first before field var 'x_Heating_Cleaned'
        $val = $CurrentForm->hasValue("Heating_Cleaned") ? $CurrentForm->getValue("Heating_Cleaned") : $CurrentForm->getValue("x_Heating_Cleaned");
        if (!$this->Heating_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Heating_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->Heating_Cleaned->setFormValue($val);
            }
        }

        // Check field name 'Createdby' first before field var 'x_Createdby'
        $val = $CurrentForm->hasValue("Createdby") ? $CurrentForm->getValue("Createdby") : $CurrentForm->getValue("x_Createdby");
        if (!$this->Createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Createdby->Visible = false; // Disable update for API request
            } else {
                $this->Createdby->setFormValue($val);
            }
        }

        // Check field name 'CreatedDate' first before field var 'x_CreatedDate'
        $val = $CurrentForm->hasValue("CreatedDate") ? $CurrentForm->getValue("CreatedDate") : $CurrentForm->getValue("x_CreatedDate");
        if (!$this->CreatedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedDate->Visible = false; // Disable update for API request
            } else {
                $this->CreatedDate->setFormValue($val);
            }
            $this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->Date->CurrentValue = $this->Date->FormValue;
        $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        $this->LN2_Level->CurrentValue = $this->LN2_Level->FormValue;
        $this->LN2_Checked->CurrentValue = $this->LN2_Checked->FormValue;
        $this->Incubator_Temp->CurrentValue = $this->Incubator_Temp->FormValue;
        $this->Incubator_Cleaned->CurrentValue = $this->Incubator_Cleaned->FormValue;
        $this->LAF_MG->CurrentValue = $this->LAF_MG->FormValue;
        $this->LAF_Cleaned->CurrentValue = $this->LAF_Cleaned->FormValue;
        $this->REF_Temp->CurrentValue = $this->REF_Temp->FormValue;
        $this->REF_Cleaned->CurrentValue = $this->REF_Cleaned->FormValue;
        $this->Heating_Temp->CurrentValue = $this->Heating_Temp->FormValue;
        $this->Heating_Cleaned->CurrentValue = $this->Heating_Cleaned->FormValue;
        $this->Createdby->CurrentValue = $this->Createdby->FormValue;
        $this->CreatedDate->CurrentValue = $this->CreatedDate->FormValue;
        $this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
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
        $this->Date->setDbValue($row['Date']);
        $this->LN2_Level->setDbValue($row['LN2_Level']);
        $this->LN2_Checked->setDbValue($row['LN2_Checked']);
        $this->Incubator_Temp->setDbValue($row['Incubator_Temp']);
        $this->Incubator_Cleaned->setDbValue($row['Incubator_Cleaned']);
        $this->LAF_MG->setDbValue($row['LAF_MG']);
        $this->LAF_Cleaned->setDbValue($row['LAF_Cleaned']);
        $this->REF_Temp->setDbValue($row['REF_Temp']);
        $this->REF_Cleaned->setDbValue($row['REF_Cleaned']);
        $this->Heating_Temp->setDbValue($row['Heating_Temp']);
        $this->Heating_Cleaned->setDbValue($row['Heating_Cleaned']);
        $this->Createdby->setDbValue($row['Createdby']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Date'] = null;
        $row['LN2_Level'] = null;
        $row['LN2_Checked'] = null;
        $row['Incubator_Temp'] = null;
        $row['Incubator_Cleaned'] = null;
        $row['LAF_MG'] = null;
        $row['LAF_Cleaned'] = null;
        $row['REF_Temp'] = null;
        $row['REF_Cleaned'] = null;
        $row['Heating_Temp'] = null;
        $row['Heating_Cleaned'] = null;
        $row['Createdby'] = null;
        $row['CreatedDate'] = null;
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
        if ($this->LN2_Level->FormValue == $this->LN2_Level->CurrentValue && is_numeric(ConvertToFloatString($this->LN2_Level->CurrentValue))) {
            $this->LN2_Level->CurrentValue = ConvertToFloatString($this->LN2_Level->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Incubator_Temp->FormValue == $this->Incubator_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Incubator_Temp->CurrentValue))) {
            $this->Incubator_Temp->CurrentValue = ConvertToFloatString($this->Incubator_Temp->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LAF_MG->FormValue == $this->LAF_MG->CurrentValue && is_numeric(ConvertToFloatString($this->LAF_MG->CurrentValue))) {
            $this->LAF_MG->CurrentValue = ConvertToFloatString($this->LAF_MG->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->REF_Temp->FormValue == $this->REF_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->REF_Temp->CurrentValue))) {
            $this->REF_Temp->CurrentValue = ConvertToFloatString($this->REF_Temp->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Heating_Temp->FormValue == $this->Heating_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Heating_Temp->CurrentValue))) {
            $this->Heating_Temp->CurrentValue = ConvertToFloatString($this->Heating_Temp->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Date

        // LN2_Level

        // LN2_Checked

        // Incubator_Temp

        // Incubator_Cleaned

        // LAF_MG

        // LAF_Cleaned

        // REF_Temp

        // REF_Cleaned

        // Heating_Temp

        // Heating_Cleaned

        // Createdby

        // CreatedDate
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // LN2_Level
            $this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
            $this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
            $this->LN2_Level->ViewCustomAttributes = "";

            // LN2_Checked
            if (strval($this->LN2_Checked->CurrentValue) != "") {
                $this->LN2_Checked->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->LN2_Checked->ViewValue = null;
            }
            $this->LN2_Checked->ViewCustomAttributes = "";

            // Incubator_Temp
            $this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
            $this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
            $this->Incubator_Temp->ViewCustomAttributes = "";

            // Incubator_Cleaned
            if (strval($this->Incubator_Cleaned->CurrentValue) != "") {
                $this->Incubator_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Incubator_Cleaned->ViewValue = null;
            }
            $this->Incubator_Cleaned->ViewCustomAttributes = "";

            // LAF_MG
            $this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
            $this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
            $this->LAF_MG->ViewCustomAttributes = "";

            // LAF_Cleaned
            if (strval($this->LAF_Cleaned->CurrentValue) != "") {
                $this->LAF_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->LAF_Cleaned->ViewValue = null;
            }
            $this->LAF_Cleaned->ViewCustomAttributes = "";

            // REF_Temp
            $this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
            $this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
            $this->REF_Temp->ViewCustomAttributes = "";

            // REF_Cleaned
            if (strval($this->REF_Cleaned->CurrentValue) != "") {
                $this->REF_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->REF_Cleaned->ViewValue = null;
            }
            $this->REF_Cleaned->ViewCustomAttributes = "";

            // Heating_Temp
            $this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
            $this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
            $this->Heating_Temp->ViewCustomAttributes = "";

            // Heating_Cleaned
            if (strval($this->Heating_Cleaned->CurrentValue) != "") {
                $this->Heating_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Heating_Cleaned->ViewValue = null;
            }
            $this->Heating_Cleaned->ViewCustomAttributes = "";

            // Createdby
            $this->Createdby->ViewValue = $this->Createdby->CurrentValue;
            $this->Createdby->ViewCustomAttributes = "";

            // CreatedDate
            $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
            $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
            $this->CreatedDate->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // LN2_Level
            $this->LN2_Level->LinkCustomAttributes = "";
            $this->LN2_Level->HrefValue = "";
            $this->LN2_Level->TooltipValue = "";

            // LN2_Checked
            $this->LN2_Checked->LinkCustomAttributes = "";
            $this->LN2_Checked->HrefValue = "";
            $this->LN2_Checked->TooltipValue = "";

            // Incubator_Temp
            $this->Incubator_Temp->LinkCustomAttributes = "";
            $this->Incubator_Temp->HrefValue = "";
            $this->Incubator_Temp->TooltipValue = "";

            // Incubator_Cleaned
            $this->Incubator_Cleaned->LinkCustomAttributes = "";
            $this->Incubator_Cleaned->HrefValue = "";
            $this->Incubator_Cleaned->TooltipValue = "";

            // LAF_MG
            $this->LAF_MG->LinkCustomAttributes = "";
            $this->LAF_MG->HrefValue = "";
            $this->LAF_MG->TooltipValue = "";

            // LAF_Cleaned
            $this->LAF_Cleaned->LinkCustomAttributes = "";
            $this->LAF_Cleaned->HrefValue = "";
            $this->LAF_Cleaned->TooltipValue = "";

            // REF_Temp
            $this->REF_Temp->LinkCustomAttributes = "";
            $this->REF_Temp->HrefValue = "";
            $this->REF_Temp->TooltipValue = "";

            // REF_Cleaned
            $this->REF_Cleaned->LinkCustomAttributes = "";
            $this->REF_Cleaned->HrefValue = "";
            $this->REF_Cleaned->TooltipValue = "";

            // Heating_Temp
            $this->Heating_Temp->LinkCustomAttributes = "";
            $this->Heating_Temp->HrefValue = "";
            $this->Heating_Temp->TooltipValue = "";

            // Heating_Cleaned
            $this->Heating_Cleaned->LinkCustomAttributes = "";
            $this->Heating_Cleaned->HrefValue = "";
            $this->Heating_Cleaned->TooltipValue = "";

            // Createdby
            $this->Createdby->LinkCustomAttributes = "";
            $this->Createdby->HrefValue = "";
            $this->Createdby->TooltipValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
            $this->CreatedDate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // LN2_Level
            $this->LN2_Level->EditAttrs["class"] = "form-control";
            $this->LN2_Level->EditCustomAttributes = "";
            $this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->CurrentValue);
            $this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
            if (strval($this->LN2_Level->EditValue) != "" && is_numeric($this->LN2_Level->EditValue)) {
                $this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);
            }

            // LN2_Checked
            $this->LN2_Checked->EditCustomAttributes = "";
            $this->LN2_Checked->EditValue = $this->LN2_Checked->options(false);
            $this->LN2_Checked->PlaceHolder = RemoveHtml($this->LN2_Checked->caption());

            // Incubator_Temp
            $this->Incubator_Temp->EditAttrs["class"] = "form-control";
            $this->Incubator_Temp->EditCustomAttributes = "";
            $this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->CurrentValue);
            $this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
            if (strval($this->Incubator_Temp->EditValue) != "" && is_numeric($this->Incubator_Temp->EditValue)) {
                $this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);
            }

            // Incubator_Cleaned
            $this->Incubator_Cleaned->EditCustomAttributes = "";
            $this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(false);
            $this->Incubator_Cleaned->PlaceHolder = RemoveHtml($this->Incubator_Cleaned->caption());

            // LAF_MG
            $this->LAF_MG->EditAttrs["class"] = "form-control";
            $this->LAF_MG->EditCustomAttributes = "";
            $this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->CurrentValue);
            $this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
            if (strval($this->LAF_MG->EditValue) != "" && is_numeric($this->LAF_MG->EditValue)) {
                $this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);
            }

            // LAF_Cleaned
            $this->LAF_Cleaned->EditCustomAttributes = "";
            $this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(false);
            $this->LAF_Cleaned->PlaceHolder = RemoveHtml($this->LAF_Cleaned->caption());

            // REF_Temp
            $this->REF_Temp->EditAttrs["class"] = "form-control";
            $this->REF_Temp->EditCustomAttributes = "";
            $this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->CurrentValue);
            $this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
            if (strval($this->REF_Temp->EditValue) != "" && is_numeric($this->REF_Temp->EditValue)) {
                $this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);
            }

            // REF_Cleaned
            $this->REF_Cleaned->EditCustomAttributes = "";
            $this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(false);
            $this->REF_Cleaned->PlaceHolder = RemoveHtml($this->REF_Cleaned->caption());

            // Heating_Temp
            $this->Heating_Temp->EditAttrs["class"] = "form-control";
            $this->Heating_Temp->EditCustomAttributes = "";
            $this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->CurrentValue);
            $this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
            if (strval($this->Heating_Temp->EditValue) != "" && is_numeric($this->Heating_Temp->EditValue)) {
                $this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);
            }

            // Heating_Cleaned
            $this->Heating_Cleaned->EditCustomAttributes = "";
            $this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(false);
            $this->Heating_Cleaned->PlaceHolder = RemoveHtml($this->Heating_Cleaned->caption());

            // Createdby

            // CreatedDate

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // LN2_Level
            $this->LN2_Level->LinkCustomAttributes = "";
            $this->LN2_Level->HrefValue = "";

            // LN2_Checked
            $this->LN2_Checked->LinkCustomAttributes = "";
            $this->LN2_Checked->HrefValue = "";

            // Incubator_Temp
            $this->Incubator_Temp->LinkCustomAttributes = "";
            $this->Incubator_Temp->HrefValue = "";

            // Incubator_Cleaned
            $this->Incubator_Cleaned->LinkCustomAttributes = "";
            $this->Incubator_Cleaned->HrefValue = "";

            // LAF_MG
            $this->LAF_MG->LinkCustomAttributes = "";
            $this->LAF_MG->HrefValue = "";

            // LAF_Cleaned
            $this->LAF_Cleaned->LinkCustomAttributes = "";
            $this->LAF_Cleaned->HrefValue = "";

            // REF_Temp
            $this->REF_Temp->LinkCustomAttributes = "";
            $this->REF_Temp->HrefValue = "";

            // REF_Cleaned
            $this->REF_Cleaned->LinkCustomAttributes = "";
            $this->REF_Cleaned->HrefValue = "";

            // Heating_Temp
            $this->Heating_Temp->LinkCustomAttributes = "";
            $this->Heating_Temp->HrefValue = "";

            // Heating_Cleaned
            $this->Heating_Cleaned->LinkCustomAttributes = "";
            $this->Heating_Cleaned->HrefValue = "";

            // Createdby
            $this->Createdby->LinkCustomAttributes = "";
            $this->Createdby->HrefValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
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
        if ($this->Date->Required) {
            if (!$this->Date->IsDetailKey && EmptyValue($this->Date->FormValue)) {
                $this->Date->addErrorMessage(str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Date->FormValue)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
        }
        if ($this->LN2_Level->Required) {
            if (!$this->LN2_Level->IsDetailKey && EmptyValue($this->LN2_Level->FormValue)) {
                $this->LN2_Level->addErrorMessage(str_replace("%s", $this->LN2_Level->caption(), $this->LN2_Level->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LN2_Level->FormValue)) {
            $this->LN2_Level->addErrorMessage($this->LN2_Level->getErrorMessage(false));
        }
        if ($this->LN2_Checked->Required) {
            if ($this->LN2_Checked->FormValue == "") {
                $this->LN2_Checked->addErrorMessage(str_replace("%s", $this->LN2_Checked->caption(), $this->LN2_Checked->RequiredErrorMessage));
            }
        }
        if ($this->Incubator_Temp->Required) {
            if (!$this->Incubator_Temp->IsDetailKey && EmptyValue($this->Incubator_Temp->FormValue)) {
                $this->Incubator_Temp->addErrorMessage(str_replace("%s", $this->Incubator_Temp->caption(), $this->Incubator_Temp->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Incubator_Temp->FormValue)) {
            $this->Incubator_Temp->addErrorMessage($this->Incubator_Temp->getErrorMessage(false));
        }
        if ($this->Incubator_Cleaned->Required) {
            if ($this->Incubator_Cleaned->FormValue == "") {
                $this->Incubator_Cleaned->addErrorMessage(str_replace("%s", $this->Incubator_Cleaned->caption(), $this->Incubator_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->LAF_MG->Required) {
            if (!$this->LAF_MG->IsDetailKey && EmptyValue($this->LAF_MG->FormValue)) {
                $this->LAF_MG->addErrorMessage(str_replace("%s", $this->LAF_MG->caption(), $this->LAF_MG->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LAF_MG->FormValue)) {
            $this->LAF_MG->addErrorMessage($this->LAF_MG->getErrorMessage(false));
        }
        if ($this->LAF_Cleaned->Required) {
            if ($this->LAF_Cleaned->FormValue == "") {
                $this->LAF_Cleaned->addErrorMessage(str_replace("%s", $this->LAF_Cleaned->caption(), $this->LAF_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->REF_Temp->Required) {
            if (!$this->REF_Temp->IsDetailKey && EmptyValue($this->REF_Temp->FormValue)) {
                $this->REF_Temp->addErrorMessage(str_replace("%s", $this->REF_Temp->caption(), $this->REF_Temp->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->REF_Temp->FormValue)) {
            $this->REF_Temp->addErrorMessage($this->REF_Temp->getErrorMessage(false));
        }
        if ($this->REF_Cleaned->Required) {
            if ($this->REF_Cleaned->FormValue == "") {
                $this->REF_Cleaned->addErrorMessage(str_replace("%s", $this->REF_Cleaned->caption(), $this->REF_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->Heating_Temp->Required) {
            if (!$this->Heating_Temp->IsDetailKey && EmptyValue($this->Heating_Temp->FormValue)) {
                $this->Heating_Temp->addErrorMessage(str_replace("%s", $this->Heating_Temp->caption(), $this->Heating_Temp->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Heating_Temp->FormValue)) {
            $this->Heating_Temp->addErrorMessage($this->Heating_Temp->getErrorMessage(false));
        }
        if ($this->Heating_Cleaned->Required) {
            if ($this->Heating_Cleaned->FormValue == "") {
                $this->Heating_Cleaned->addErrorMessage(str_replace("%s", $this->Heating_Cleaned->caption(), $this->Heating_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->Createdby->Required) {
            if (!$this->Createdby->IsDetailKey && EmptyValue($this->Createdby->FormValue)) {
                $this->Createdby->addErrorMessage(str_replace("%s", $this->Createdby->caption(), $this->Createdby->RequiredErrorMessage));
            }
        }
        if ($this->CreatedDate->Required) {
            if (!$this->CreatedDate->IsDetailKey && EmptyValue($this->CreatedDate->FormValue)) {
                $this->CreatedDate->addErrorMessage(str_replace("%s", $this->CreatedDate->caption(), $this->CreatedDate->RequiredErrorMessage));
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

            // Date
            $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), CurrentDate(), $this->Date->ReadOnly);

            // LN2_Level
            $this->LN2_Level->setDbValueDef($rsnew, $this->LN2_Level->CurrentValue, null, $this->LN2_Level->ReadOnly);

            // LN2_Checked
            $this->LN2_Checked->setDbValueDef($rsnew, $this->LN2_Checked->CurrentValue, null, $this->LN2_Checked->ReadOnly);

            // Incubator_Temp
            $this->Incubator_Temp->setDbValueDef($rsnew, $this->Incubator_Temp->CurrentValue, null, $this->Incubator_Temp->ReadOnly);

            // Incubator_Cleaned
            $this->Incubator_Cleaned->setDbValueDef($rsnew, $this->Incubator_Cleaned->CurrentValue, null, $this->Incubator_Cleaned->ReadOnly);

            // LAF_MG
            $this->LAF_MG->setDbValueDef($rsnew, $this->LAF_MG->CurrentValue, null, $this->LAF_MG->ReadOnly);

            // LAF_Cleaned
            $this->LAF_Cleaned->setDbValueDef($rsnew, $this->LAF_Cleaned->CurrentValue, null, $this->LAF_Cleaned->ReadOnly);

            // REF_Temp
            $this->REF_Temp->setDbValueDef($rsnew, $this->REF_Temp->CurrentValue, null, $this->REF_Temp->ReadOnly);

            // REF_Cleaned
            $this->REF_Cleaned->setDbValueDef($rsnew, $this->REF_Cleaned->CurrentValue, null, $this->REF_Cleaned->ReadOnly);

            // Heating_Temp
            $this->Heating_Temp->setDbValueDef($rsnew, $this->Heating_Temp->CurrentValue, 0, $this->Heating_Temp->ReadOnly);

            // Heating_Cleaned
            $this->Heating_Cleaned->setDbValueDef($rsnew, $this->Heating_Cleaned->CurrentValue, null, $this->Heating_Cleaned->ReadOnly);

            // Createdby
            $this->Createdby->CurrentValue = CurrentUserName();
            $this->Createdby->setDbValueDef($rsnew, $this->Createdby->CurrentValue, null);

            // CreatedDate
            $this->CreatedDate->CurrentValue = CurrentDateTime();
            $this->CreatedDate->setDbValueDef($rsnew, $this->CreatedDate->CurrentValue, null);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("QaqcrecordAndrologyList"), "", $this->TableVar, true);
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
                case "x_LN2_Checked":
                    break;
                case "x_Incubator_Cleaned":
                    break;
                case "x_LAF_Cleaned":
                    break;
                case "x_REF_Cleaned":
                    break;
                case "x_Heating_Cleaned":
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
