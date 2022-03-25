<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabDrugMastAdd extends LabDrugMast
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_drug_mast';

    // Page object name
    public $PageObjName = "LabDrugMastAdd";

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

        // Table object (lab_drug_mast)
        if (!isset($GLOBALS["lab_drug_mast"]) || get_class($GLOBALS["lab_drug_mast"]) == PROJECT_NAMESPACE . "lab_drug_mast") {
            $GLOBALS["lab_drug_mast"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_drug_mast');
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
                $doc = new $class(Container("lab_drug_mast"));
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
                    if ($pageName == "LabDrugMastView") {
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
        $this->DrugName->setVisibility();
        $this->Positive->setVisibility();
        $this->Negative->setVisibility();
        $this->ShortName->setVisibility();
        $this->GroupCD->setVisibility();
        $this->_Content->setVisibility();
        $this->Order->setVisibility();
        $this->DrugCD->setVisibility();
        $this->id->Visible = false;
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
                    $this->terminate("LabDrugMastList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "LabDrugMastList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "LabDrugMastView") {
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
        $this->DrugName->CurrentValue = null;
        $this->DrugName->OldValue = $this->DrugName->CurrentValue;
        $this->Positive->CurrentValue = null;
        $this->Positive->OldValue = $this->Positive->CurrentValue;
        $this->Negative->CurrentValue = null;
        $this->Negative->OldValue = $this->Negative->CurrentValue;
        $this->ShortName->CurrentValue = null;
        $this->ShortName->OldValue = $this->ShortName->CurrentValue;
        $this->GroupCD->CurrentValue = null;
        $this->GroupCD->OldValue = $this->GroupCD->CurrentValue;
        $this->_Content->CurrentValue = null;
        $this->_Content->OldValue = $this->_Content->CurrentValue;
        $this->Order->CurrentValue = null;
        $this->Order->OldValue = $this->Order->CurrentValue;
        $this->DrugCD->CurrentValue = null;
        $this->DrugCD->OldValue = $this->DrugCD->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'DrugName' first before field var 'x_DrugName'
        $val = $CurrentForm->hasValue("DrugName") ? $CurrentForm->getValue("DrugName") : $CurrentForm->getValue("x_DrugName");
        if (!$this->DrugName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrugName->Visible = false; // Disable update for API request
            } else {
                $this->DrugName->setFormValue($val);
            }
        }

        // Check field name 'Positive' first before field var 'x_Positive'
        $val = $CurrentForm->hasValue("Positive") ? $CurrentForm->getValue("Positive") : $CurrentForm->getValue("x_Positive");
        if (!$this->Positive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Positive->Visible = false; // Disable update for API request
            } else {
                $this->Positive->setFormValue($val);
            }
        }

        // Check field name 'Negative' first before field var 'x_Negative'
        $val = $CurrentForm->hasValue("Negative") ? $CurrentForm->getValue("Negative") : $CurrentForm->getValue("x_Negative");
        if (!$this->Negative->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Negative->Visible = false; // Disable update for API request
            } else {
                $this->Negative->setFormValue($val);
            }
        }

        // Check field name 'ShortName' first before field var 'x_ShortName'
        $val = $CurrentForm->hasValue("ShortName") ? $CurrentForm->getValue("ShortName") : $CurrentForm->getValue("x_ShortName");
        if (!$this->ShortName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ShortName->Visible = false; // Disable update for API request
            } else {
                $this->ShortName->setFormValue($val);
            }
        }

        // Check field name 'GroupCD' first before field var 'x_GroupCD'
        $val = $CurrentForm->hasValue("GroupCD") ? $CurrentForm->getValue("GroupCD") : $CurrentForm->getValue("x_GroupCD");
        if (!$this->GroupCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupCD->Visible = false; // Disable update for API request
            } else {
                $this->GroupCD->setFormValue($val);
            }
        }

        // Check field name 'Content' first before field var 'x__Content'
        $val = $CurrentForm->hasValue("Content") ? $CurrentForm->getValue("Content") : $CurrentForm->getValue("x__Content");
        if (!$this->_Content->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Content->Visible = false; // Disable update for API request
            } else {
                $this->_Content->setFormValue($val);
            }
        }

        // Check field name 'Order' first before field var 'x_Order'
        $val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
        if (!$this->Order->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Order->Visible = false; // Disable update for API request
            } else {
                $this->Order->setFormValue($val);
            }
        }

        // Check field name 'DrugCD' first before field var 'x_DrugCD'
        $val = $CurrentForm->hasValue("DrugCD") ? $CurrentForm->getValue("DrugCD") : $CurrentForm->getValue("x_DrugCD");
        if (!$this->DrugCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrugCD->Visible = false; // Disable update for API request
            } else {
                $this->DrugCD->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->DrugName->CurrentValue = $this->DrugName->FormValue;
        $this->Positive->CurrentValue = $this->Positive->FormValue;
        $this->Negative->CurrentValue = $this->Negative->FormValue;
        $this->ShortName->CurrentValue = $this->ShortName->FormValue;
        $this->GroupCD->CurrentValue = $this->GroupCD->FormValue;
        $this->_Content->CurrentValue = $this->_Content->FormValue;
        $this->Order->CurrentValue = $this->Order->FormValue;
        $this->DrugCD->CurrentValue = $this->DrugCD->FormValue;
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
        $this->DrugName->setDbValue($row['DrugName']);
        $this->Positive->setDbValue($row['Positive']);
        $this->Negative->setDbValue($row['Negative']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->GroupCD->setDbValue($row['GroupCD']);
        $this->_Content->setDbValue($row['Content']);
        $this->Order->setDbValue($row['Order']);
        $this->DrugCD->setDbValue($row['DrugCD']);
        $this->id->setDbValue($row['id']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['DrugName'] = $this->DrugName->CurrentValue;
        $row['Positive'] = $this->Positive->CurrentValue;
        $row['Negative'] = $this->Negative->CurrentValue;
        $row['ShortName'] = $this->ShortName->CurrentValue;
        $row['GroupCD'] = $this->GroupCD->CurrentValue;
        $row['Content'] = $this->_Content->CurrentValue;
        $row['Order'] = $this->Order->CurrentValue;
        $row['DrugCD'] = $this->DrugCD->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
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
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // DrugName

        // Positive

        // Negative

        // ShortName

        // GroupCD

        // Content

        // Order

        // DrugCD

        // id
        if ($this->RowType == ROWTYPE_VIEW) {
            // DrugName
            $this->DrugName->ViewValue = $this->DrugName->CurrentValue;
            $this->DrugName->ViewCustomAttributes = "";

            // Positive
            $this->Positive->ViewValue = $this->Positive->CurrentValue;
            $this->Positive->ViewCustomAttributes = "";

            // Negative
            $this->Negative->ViewValue = $this->Negative->CurrentValue;
            $this->Negative->ViewCustomAttributes = "";

            // ShortName
            $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
            $this->ShortName->ViewCustomAttributes = "";

            // GroupCD
            $this->GroupCD->ViewValue = $this->GroupCD->CurrentValue;
            $this->GroupCD->ViewCustomAttributes = "";

            // Content
            $this->_Content->ViewValue = $this->_Content->CurrentValue;
            $this->_Content->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // DrugCD
            $this->DrugCD->ViewValue = $this->DrugCD->CurrentValue;
            $this->DrugCD->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // DrugName
            $this->DrugName->LinkCustomAttributes = "";
            $this->DrugName->HrefValue = "";
            $this->DrugName->TooltipValue = "";

            // Positive
            $this->Positive->LinkCustomAttributes = "";
            $this->Positive->HrefValue = "";
            $this->Positive->TooltipValue = "";

            // Negative
            $this->Negative->LinkCustomAttributes = "";
            $this->Negative->HrefValue = "";
            $this->Negative->TooltipValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";
            $this->ShortName->TooltipValue = "";

            // GroupCD
            $this->GroupCD->LinkCustomAttributes = "";
            $this->GroupCD->HrefValue = "";
            $this->GroupCD->TooltipValue = "";

            // Content
            $this->_Content->LinkCustomAttributes = "";
            $this->_Content->HrefValue = "";
            $this->_Content->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // DrugCD
            $this->DrugCD->LinkCustomAttributes = "";
            $this->DrugCD->HrefValue = "";
            $this->DrugCD->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // DrugName
            $this->DrugName->EditAttrs["class"] = "form-control";
            $this->DrugName->EditCustomAttributes = "";
            if (!$this->DrugName->Raw) {
                $this->DrugName->CurrentValue = HtmlDecode($this->DrugName->CurrentValue);
            }
            $this->DrugName->EditValue = HtmlEncode($this->DrugName->CurrentValue);
            $this->DrugName->PlaceHolder = RemoveHtml($this->DrugName->caption());

            // Positive
            $this->Positive->EditAttrs["class"] = "form-control";
            $this->Positive->EditCustomAttributes = "";
            if (!$this->Positive->Raw) {
                $this->Positive->CurrentValue = HtmlDecode($this->Positive->CurrentValue);
            }
            $this->Positive->EditValue = HtmlEncode($this->Positive->CurrentValue);
            $this->Positive->PlaceHolder = RemoveHtml($this->Positive->caption());

            // Negative
            $this->Negative->EditAttrs["class"] = "form-control";
            $this->Negative->EditCustomAttributes = "";
            if (!$this->Negative->Raw) {
                $this->Negative->CurrentValue = HtmlDecode($this->Negative->CurrentValue);
            }
            $this->Negative->EditValue = HtmlEncode($this->Negative->CurrentValue);
            $this->Negative->PlaceHolder = RemoveHtml($this->Negative->caption());

            // ShortName
            $this->ShortName->EditAttrs["class"] = "form-control";
            $this->ShortName->EditCustomAttributes = "";
            if (!$this->ShortName->Raw) {
                $this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
            }
            $this->ShortName->EditValue = HtmlEncode($this->ShortName->CurrentValue);
            $this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

            // GroupCD
            $this->GroupCD->EditAttrs["class"] = "form-control";
            $this->GroupCD->EditCustomAttributes = "";
            if (!$this->GroupCD->Raw) {
                $this->GroupCD->CurrentValue = HtmlDecode($this->GroupCD->CurrentValue);
            }
            $this->GroupCD->EditValue = HtmlEncode($this->GroupCD->CurrentValue);
            $this->GroupCD->PlaceHolder = RemoveHtml($this->GroupCD->caption());

            // Content
            $this->_Content->EditAttrs["class"] = "form-control";
            $this->_Content->EditCustomAttributes = "";
            if (!$this->_Content->Raw) {
                $this->_Content->CurrentValue = HtmlDecode($this->_Content->CurrentValue);
            }
            $this->_Content->EditValue = HtmlEncode($this->_Content->CurrentValue);
            $this->_Content->PlaceHolder = RemoveHtml($this->_Content->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
            }

            // DrugCD
            $this->DrugCD->EditAttrs["class"] = "form-control";
            $this->DrugCD->EditCustomAttributes = "";
            if (!$this->DrugCD->Raw) {
                $this->DrugCD->CurrentValue = HtmlDecode($this->DrugCD->CurrentValue);
            }
            $this->DrugCD->EditValue = HtmlEncode($this->DrugCD->CurrentValue);
            $this->DrugCD->PlaceHolder = RemoveHtml($this->DrugCD->caption());

            // Add refer script

            // DrugName
            $this->DrugName->LinkCustomAttributes = "";
            $this->DrugName->HrefValue = "";

            // Positive
            $this->Positive->LinkCustomAttributes = "";
            $this->Positive->HrefValue = "";

            // Negative
            $this->Negative->LinkCustomAttributes = "";
            $this->Negative->HrefValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";

            // GroupCD
            $this->GroupCD->LinkCustomAttributes = "";
            $this->GroupCD->HrefValue = "";

            // Content
            $this->_Content->LinkCustomAttributes = "";
            $this->_Content->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // DrugCD
            $this->DrugCD->LinkCustomAttributes = "";
            $this->DrugCD->HrefValue = "";
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
        if ($this->DrugName->Required) {
            if (!$this->DrugName->IsDetailKey && EmptyValue($this->DrugName->FormValue)) {
                $this->DrugName->addErrorMessage(str_replace("%s", $this->DrugName->caption(), $this->DrugName->RequiredErrorMessage));
            }
        }
        if ($this->Positive->Required) {
            if (!$this->Positive->IsDetailKey && EmptyValue($this->Positive->FormValue)) {
                $this->Positive->addErrorMessage(str_replace("%s", $this->Positive->caption(), $this->Positive->RequiredErrorMessage));
            }
        }
        if ($this->Negative->Required) {
            if (!$this->Negative->IsDetailKey && EmptyValue($this->Negative->FormValue)) {
                $this->Negative->addErrorMessage(str_replace("%s", $this->Negative->caption(), $this->Negative->RequiredErrorMessage));
            }
        }
        if ($this->ShortName->Required) {
            if (!$this->ShortName->IsDetailKey && EmptyValue($this->ShortName->FormValue)) {
                $this->ShortName->addErrorMessage(str_replace("%s", $this->ShortName->caption(), $this->ShortName->RequiredErrorMessage));
            }
        }
        if ($this->GroupCD->Required) {
            if (!$this->GroupCD->IsDetailKey && EmptyValue($this->GroupCD->FormValue)) {
                $this->GroupCD->addErrorMessage(str_replace("%s", $this->GroupCD->caption(), $this->GroupCD->RequiredErrorMessage));
            }
        }
        if ($this->_Content->Required) {
            if (!$this->_Content->IsDetailKey && EmptyValue($this->_Content->FormValue)) {
                $this->_Content->addErrorMessage(str_replace("%s", $this->_Content->caption(), $this->_Content->RequiredErrorMessage));
            }
        }
        if ($this->Order->Required) {
            if (!$this->Order->IsDetailKey && EmptyValue($this->Order->FormValue)) {
                $this->Order->addErrorMessage(str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Order->FormValue)) {
            $this->Order->addErrorMessage($this->Order->getErrorMessage(false));
        }
        if ($this->DrugCD->Required) {
            if (!$this->DrugCD->IsDetailKey && EmptyValue($this->DrugCD->FormValue)) {
                $this->DrugCD->addErrorMessage(str_replace("%s", $this->DrugCD->caption(), $this->DrugCD->RequiredErrorMessage));
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

        // DrugName
        $this->DrugName->setDbValueDef($rsnew, $this->DrugName->CurrentValue, "", false);

        // Positive
        $this->Positive->setDbValueDef($rsnew, $this->Positive->CurrentValue, "", false);

        // Negative
        $this->Negative->setDbValueDef($rsnew, $this->Negative->CurrentValue, "", false);

        // ShortName
        $this->ShortName->setDbValueDef($rsnew, $this->ShortName->CurrentValue, "", false);

        // GroupCD
        $this->GroupCD->setDbValueDef($rsnew, $this->GroupCD->CurrentValue, "", false);

        // Content
        $this->_Content->setDbValueDef($rsnew, $this->_Content->CurrentValue, "", false);

        // Order
        $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, 0, false);

        // DrugCD
        $this->DrugCD->setDbValueDef($rsnew, $this->DrugCD->CurrentValue, "", false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("LabDrugMastList"), "", $this->TableVar, true);
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
