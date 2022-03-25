<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmContactsubdetailsAdd extends CrmContactsubdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_contactsubdetails';

    // Page object name
    public $PageObjName = "CrmContactsubdetailsAdd";

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

        // Table object (crm_contactsubdetails)
        if (!isset($GLOBALS["crm_contactsubdetails"]) || get_class($GLOBALS["crm_contactsubdetails"]) == PROJECT_NAMESPACE . "crm_contactsubdetails") {
            $GLOBALS["crm_contactsubdetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_contactsubdetails');
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
                $doc = new $class(Container("crm_contactsubdetails"));
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
                    if ($pageName == "CrmContactsubdetailsView") {
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
            $key .= @$ar['contactsubscriptionid'];
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
        $this->contactsubscriptionid->setVisibility();
        $this->birthday->setVisibility();
        $this->laststayintouchrequest->setVisibility();
        $this->laststayintouchsavedate->setVisibility();
        $this->leadsource->setVisibility();
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
            if (($keyValue = Get("contactsubscriptionid") ?? Route("contactsubscriptionid")) !== null) {
                $this->contactsubscriptionid->setQueryStringValue($keyValue);
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
                    $this->terminate("CrmContactsubdetailsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "CrmContactsubdetailsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "CrmContactsubdetailsView") {
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
        $this->contactsubscriptionid->CurrentValue = 0;
        $this->birthday->CurrentValue = null;
        $this->birthday->OldValue = $this->birthday->CurrentValue;
        $this->laststayintouchrequest->CurrentValue = 0;
        $this->laststayintouchsavedate->CurrentValue = 0;
        $this->leadsource->CurrentValue = null;
        $this->leadsource->OldValue = $this->leadsource->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'contactsubscriptionid' first before field var 'x_contactsubscriptionid'
        $val = $CurrentForm->hasValue("contactsubscriptionid") ? $CurrentForm->getValue("contactsubscriptionid") : $CurrentForm->getValue("x_contactsubscriptionid");
        if (!$this->contactsubscriptionid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->contactsubscriptionid->Visible = false; // Disable update for API request
            } else {
                $this->contactsubscriptionid->setFormValue($val);
            }
        }

        // Check field name 'birthday' first before field var 'x_birthday'
        $val = $CurrentForm->hasValue("birthday") ? $CurrentForm->getValue("birthday") : $CurrentForm->getValue("x_birthday");
        if (!$this->birthday->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->birthday->Visible = false; // Disable update for API request
            } else {
                $this->birthday->setFormValue($val);
            }
            $this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
        }

        // Check field name 'laststayintouchrequest' first before field var 'x_laststayintouchrequest'
        $val = $CurrentForm->hasValue("laststayintouchrequest") ? $CurrentForm->getValue("laststayintouchrequest") : $CurrentForm->getValue("x_laststayintouchrequest");
        if (!$this->laststayintouchrequest->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->laststayintouchrequest->Visible = false; // Disable update for API request
            } else {
                $this->laststayintouchrequest->setFormValue($val);
            }
        }

        // Check field name 'laststayintouchsavedate' first before field var 'x_laststayintouchsavedate'
        $val = $CurrentForm->hasValue("laststayintouchsavedate") ? $CurrentForm->getValue("laststayintouchsavedate") : $CurrentForm->getValue("x_laststayintouchsavedate");
        if (!$this->laststayintouchsavedate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->laststayintouchsavedate->Visible = false; // Disable update for API request
            } else {
                $this->laststayintouchsavedate->setFormValue($val);
            }
        }

        // Check field name 'leadsource' first before field var 'x_leadsource'
        $val = $CurrentForm->hasValue("leadsource") ? $CurrentForm->getValue("leadsource") : $CurrentForm->getValue("x_leadsource");
        if (!$this->leadsource->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leadsource->Visible = false; // Disable update for API request
            } else {
                $this->leadsource->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->contactsubscriptionid->CurrentValue = $this->contactsubscriptionid->FormValue;
        $this->birthday->CurrentValue = $this->birthday->FormValue;
        $this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
        $this->laststayintouchrequest->CurrentValue = $this->laststayintouchrequest->FormValue;
        $this->laststayintouchsavedate->CurrentValue = $this->laststayintouchsavedate->FormValue;
        $this->leadsource->CurrentValue = $this->leadsource->FormValue;
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
        $this->contactsubscriptionid->setDbValue($row['contactsubscriptionid']);
        $this->birthday->setDbValue($row['birthday']);
        $this->laststayintouchrequest->setDbValue($row['laststayintouchrequest']);
        $this->laststayintouchsavedate->setDbValue($row['laststayintouchsavedate']);
        $this->leadsource->setDbValue($row['leadsource']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['contactsubscriptionid'] = $this->contactsubscriptionid->CurrentValue;
        $row['birthday'] = $this->birthday->CurrentValue;
        $row['laststayintouchrequest'] = $this->laststayintouchrequest->CurrentValue;
        $row['laststayintouchsavedate'] = $this->laststayintouchsavedate->CurrentValue;
        $row['leadsource'] = $this->leadsource->CurrentValue;
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

        // contactsubscriptionid

        // birthday

        // laststayintouchrequest

        // laststayintouchsavedate

        // leadsource
        if ($this->RowType == ROWTYPE_VIEW) {
            // contactsubscriptionid
            $this->contactsubscriptionid->ViewValue = $this->contactsubscriptionid->CurrentValue;
            $this->contactsubscriptionid->ViewValue = FormatNumber($this->contactsubscriptionid->ViewValue, 0, -2, -2, -2);
            $this->contactsubscriptionid->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // laststayintouchrequest
            $this->laststayintouchrequest->ViewValue = $this->laststayintouchrequest->CurrentValue;
            $this->laststayintouchrequest->ViewValue = FormatNumber($this->laststayintouchrequest->ViewValue, 0, -2, -2, -2);
            $this->laststayintouchrequest->ViewCustomAttributes = "";

            // laststayintouchsavedate
            $this->laststayintouchsavedate->ViewValue = $this->laststayintouchsavedate->CurrentValue;
            $this->laststayintouchsavedate->ViewValue = FormatNumber($this->laststayintouchsavedate->ViewValue, 0, -2, -2, -2);
            $this->laststayintouchsavedate->ViewCustomAttributes = "";

            // leadsource
            $this->leadsource->ViewValue = $this->leadsource->CurrentValue;
            $this->leadsource->ViewCustomAttributes = "";

            // contactsubscriptionid
            $this->contactsubscriptionid->LinkCustomAttributes = "";
            $this->contactsubscriptionid->HrefValue = "";
            $this->contactsubscriptionid->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // laststayintouchrequest
            $this->laststayintouchrequest->LinkCustomAttributes = "";
            $this->laststayintouchrequest->HrefValue = "";
            $this->laststayintouchrequest->TooltipValue = "";

            // laststayintouchsavedate
            $this->laststayintouchsavedate->LinkCustomAttributes = "";
            $this->laststayintouchsavedate->HrefValue = "";
            $this->laststayintouchsavedate->TooltipValue = "";

            // leadsource
            $this->leadsource->LinkCustomAttributes = "";
            $this->leadsource->HrefValue = "";
            $this->leadsource->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // contactsubscriptionid
            $this->contactsubscriptionid->EditAttrs["class"] = "form-control";
            $this->contactsubscriptionid->EditCustomAttributes = "";
            $this->contactsubscriptionid->EditValue = HtmlEncode($this->contactsubscriptionid->CurrentValue);
            $this->contactsubscriptionid->PlaceHolder = RemoveHtml($this->contactsubscriptionid->caption());

            // birthday
            $this->birthday->EditAttrs["class"] = "form-control";
            $this->birthday->EditCustomAttributes = "";
            $this->birthday->EditValue = HtmlEncode(FormatDateTime($this->birthday->CurrentValue, 8));
            $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

            // laststayintouchrequest
            $this->laststayintouchrequest->EditAttrs["class"] = "form-control";
            $this->laststayintouchrequest->EditCustomAttributes = "";
            $this->laststayintouchrequest->EditValue = HtmlEncode($this->laststayintouchrequest->CurrentValue);
            $this->laststayintouchrequest->PlaceHolder = RemoveHtml($this->laststayintouchrequest->caption());

            // laststayintouchsavedate
            $this->laststayintouchsavedate->EditAttrs["class"] = "form-control";
            $this->laststayintouchsavedate->EditCustomAttributes = "";
            $this->laststayintouchsavedate->EditValue = HtmlEncode($this->laststayintouchsavedate->CurrentValue);
            $this->laststayintouchsavedate->PlaceHolder = RemoveHtml($this->laststayintouchsavedate->caption());

            // leadsource
            $this->leadsource->EditAttrs["class"] = "form-control";
            $this->leadsource->EditCustomAttributes = "";
            if (!$this->leadsource->Raw) {
                $this->leadsource->CurrentValue = HtmlDecode($this->leadsource->CurrentValue);
            }
            $this->leadsource->EditValue = HtmlEncode($this->leadsource->CurrentValue);
            $this->leadsource->PlaceHolder = RemoveHtml($this->leadsource->caption());

            // Add refer script

            // contactsubscriptionid
            $this->contactsubscriptionid->LinkCustomAttributes = "";
            $this->contactsubscriptionid->HrefValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";

            // laststayintouchrequest
            $this->laststayintouchrequest->LinkCustomAttributes = "";
            $this->laststayintouchrequest->HrefValue = "";

            // laststayintouchsavedate
            $this->laststayintouchsavedate->LinkCustomAttributes = "";
            $this->laststayintouchsavedate->HrefValue = "";

            // leadsource
            $this->leadsource->LinkCustomAttributes = "";
            $this->leadsource->HrefValue = "";
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
        if ($this->contactsubscriptionid->Required) {
            if (!$this->contactsubscriptionid->IsDetailKey && EmptyValue($this->contactsubscriptionid->FormValue)) {
                $this->contactsubscriptionid->addErrorMessage(str_replace("%s", $this->contactsubscriptionid->caption(), $this->contactsubscriptionid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->contactsubscriptionid->FormValue)) {
            $this->contactsubscriptionid->addErrorMessage($this->contactsubscriptionid->getErrorMessage(false));
        }
        if ($this->birthday->Required) {
            if (!$this->birthday->IsDetailKey && EmptyValue($this->birthday->FormValue)) {
                $this->birthday->addErrorMessage(str_replace("%s", $this->birthday->caption(), $this->birthday->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->birthday->FormValue)) {
            $this->birthday->addErrorMessage($this->birthday->getErrorMessage(false));
        }
        if ($this->laststayintouchrequest->Required) {
            if (!$this->laststayintouchrequest->IsDetailKey && EmptyValue($this->laststayintouchrequest->FormValue)) {
                $this->laststayintouchrequest->addErrorMessage(str_replace("%s", $this->laststayintouchrequest->caption(), $this->laststayintouchrequest->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->laststayintouchrequest->FormValue)) {
            $this->laststayintouchrequest->addErrorMessage($this->laststayintouchrequest->getErrorMessage(false));
        }
        if ($this->laststayintouchsavedate->Required) {
            if (!$this->laststayintouchsavedate->IsDetailKey && EmptyValue($this->laststayintouchsavedate->FormValue)) {
                $this->laststayintouchsavedate->addErrorMessage(str_replace("%s", $this->laststayintouchsavedate->caption(), $this->laststayintouchsavedate->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->laststayintouchsavedate->FormValue)) {
            $this->laststayintouchsavedate->addErrorMessage($this->laststayintouchsavedate->getErrorMessage(false));
        }
        if ($this->leadsource->Required) {
            if (!$this->leadsource->IsDetailKey && EmptyValue($this->leadsource->FormValue)) {
                $this->leadsource->addErrorMessage(str_replace("%s", $this->leadsource->caption(), $this->leadsource->RequiredErrorMessage));
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

        // contactsubscriptionid
        $this->contactsubscriptionid->setDbValueDef($rsnew, $this->contactsubscriptionid->CurrentValue, 0, strval($this->contactsubscriptionid->CurrentValue) == "");

        // birthday
        $this->birthday->setDbValueDef($rsnew, UnFormatDateTime($this->birthday->CurrentValue, 0), null, false);

        // laststayintouchrequest
        $this->laststayintouchrequest->setDbValueDef($rsnew, $this->laststayintouchrequest->CurrentValue, null, strval($this->laststayintouchrequest->CurrentValue) == "");

        // laststayintouchsavedate
        $this->laststayintouchsavedate->setDbValueDef($rsnew, $this->laststayintouchsavedate->CurrentValue, null, strval($this->laststayintouchsavedate->CurrentValue) == "");

        // leadsource
        $this->leadsource->setDbValueDef($rsnew, $this->leadsource->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);

        // Check if key value entered
        if ($insertRow && $this->ValidateKey && strval($rsnew['contactsubscriptionid']) == "") {
            $this->setFailureMessage($Language->phrase("InvalidKeyValue"));
            $insertRow = false;
        }

        // Check for duplicate key
        if ($insertRow && $this->ValidateKey) {
            $filter = $this->getRecordFilter($rsnew);
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
                $this->setFailureMessage($keyErrMsg);
                $insertRow = false;
            }
        }
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmContactsubdetailsList"), "", $this->TableVar, true);
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
