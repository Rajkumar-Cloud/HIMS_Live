<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmCrmentityAdd extends CrmCrmentity
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_crmentity';

    // Page object name
    public $PageObjName = "CrmCrmentityAdd";

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

        // Table object (crm_crmentity)
        if (!isset($GLOBALS["crm_crmentity"]) || get_class($GLOBALS["crm_crmentity"]) == PROJECT_NAMESPACE . "crm_crmentity") {
            $GLOBALS["crm_crmentity"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_crmentity');
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
                $doc = new $class(Container("crm_crmentity"));
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
                    if ($pageName == "CrmCrmentityView") {
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
            $key .= @$ar['crmid'];
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
            $this->crmid->Visible = false;
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
        $this->crmid->Visible = false;
        $this->smcreatorid->setVisibility();
        $this->smownerid->setVisibility();
        $this->shownerid->setVisibility();
        $this->modifiedby->setVisibility();
        $this->setype->setVisibility();
        $this->description->setVisibility();
        $this->attention->setVisibility();
        $this->createdtime->setVisibility();
        $this->modifiedtime->setVisibility();
        $this->viewedtime->setVisibility();
        $this->status->setVisibility();
        $this->version->setVisibility();
        $this->presence->setVisibility();
        $this->deleted->setVisibility();
        $this->was_read->setVisibility();
        $this->_private->setVisibility();
        $this->users->setVisibility();
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
            if (($keyValue = Get("crmid") ?? Route("crmid")) !== null) {
                $this->crmid->setQueryStringValue($keyValue);
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
                    $this->terminate("CrmCrmentityList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "CrmCrmentityList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "CrmCrmentityView") {
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
        $this->crmid->CurrentValue = null;
        $this->crmid->OldValue = $this->crmid->CurrentValue;
        $this->smcreatorid->CurrentValue = 0;
        $this->smownerid->CurrentValue = 0;
        $this->shownerid->CurrentValue = null;
        $this->shownerid->OldValue = $this->shownerid->CurrentValue;
        $this->modifiedby->CurrentValue = 0;
        $this->setype->CurrentValue = null;
        $this->setype->OldValue = $this->setype->CurrentValue;
        $this->description->CurrentValue = null;
        $this->description->OldValue = $this->description->CurrentValue;
        $this->attention->CurrentValue = null;
        $this->attention->OldValue = $this->attention->CurrentValue;
        $this->createdtime->CurrentValue = null;
        $this->createdtime->OldValue = $this->createdtime->CurrentValue;
        $this->modifiedtime->CurrentValue = null;
        $this->modifiedtime->OldValue = $this->modifiedtime->CurrentValue;
        $this->viewedtime->CurrentValue = null;
        $this->viewedtime->OldValue = $this->viewedtime->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->version->CurrentValue = 0;
        $this->presence->CurrentValue = 1;
        $this->deleted->CurrentValue = 0;
        $this->was_read->CurrentValue = 0;
        $this->_private->CurrentValue = 0;
        $this->users->CurrentValue = null;
        $this->users->OldValue = $this->users->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'smcreatorid' first before field var 'x_smcreatorid'
        $val = $CurrentForm->hasValue("smcreatorid") ? $CurrentForm->getValue("smcreatorid") : $CurrentForm->getValue("x_smcreatorid");
        if (!$this->smcreatorid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->smcreatorid->Visible = false; // Disable update for API request
            } else {
                $this->smcreatorid->setFormValue($val);
            }
        }

        // Check field name 'smownerid' first before field var 'x_smownerid'
        $val = $CurrentForm->hasValue("smownerid") ? $CurrentForm->getValue("smownerid") : $CurrentForm->getValue("x_smownerid");
        if (!$this->smownerid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->smownerid->Visible = false; // Disable update for API request
            } else {
                $this->smownerid->setFormValue($val);
            }
        }

        // Check field name 'shownerid' first before field var 'x_shownerid'
        $val = $CurrentForm->hasValue("shownerid") ? $CurrentForm->getValue("shownerid") : $CurrentForm->getValue("x_shownerid");
        if (!$this->shownerid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->shownerid->Visible = false; // Disable update for API request
            } else {
                $this->shownerid->setFormValue($val);
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

        // Check field name 'setype' first before field var 'x_setype'
        $val = $CurrentForm->hasValue("setype") ? $CurrentForm->getValue("setype") : $CurrentForm->getValue("x_setype");
        if (!$this->setype->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->setype->Visible = false; // Disable update for API request
            } else {
                $this->setype->setFormValue($val);
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

        // Check field name 'attention' first before field var 'x_attention'
        $val = $CurrentForm->hasValue("attention") ? $CurrentForm->getValue("attention") : $CurrentForm->getValue("x_attention");
        if (!$this->attention->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attention->Visible = false; // Disable update for API request
            } else {
                $this->attention->setFormValue($val);
            }
        }

        // Check field name 'createdtime' first before field var 'x_createdtime'
        $val = $CurrentForm->hasValue("createdtime") ? $CurrentForm->getValue("createdtime") : $CurrentForm->getValue("x_createdtime");
        if (!$this->createdtime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdtime->Visible = false; // Disable update for API request
            } else {
                $this->createdtime->setFormValue($val);
            }
            $this->createdtime->CurrentValue = UnFormatDateTime($this->createdtime->CurrentValue, 0);
        }

        // Check field name 'modifiedtime' first before field var 'x_modifiedtime'
        $val = $CurrentForm->hasValue("modifiedtime") ? $CurrentForm->getValue("modifiedtime") : $CurrentForm->getValue("x_modifiedtime");
        if (!$this->modifiedtime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedtime->Visible = false; // Disable update for API request
            } else {
                $this->modifiedtime->setFormValue($val);
            }
            $this->modifiedtime->CurrentValue = UnFormatDateTime($this->modifiedtime->CurrentValue, 0);
        }

        // Check field name 'viewedtime' first before field var 'x_viewedtime'
        $val = $CurrentForm->hasValue("viewedtime") ? $CurrentForm->getValue("viewedtime") : $CurrentForm->getValue("x_viewedtime");
        if (!$this->viewedtime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->viewedtime->Visible = false; // Disable update for API request
            } else {
                $this->viewedtime->setFormValue($val);
            }
            $this->viewedtime->CurrentValue = UnFormatDateTime($this->viewedtime->CurrentValue, 0);
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

        // Check field name 'version' first before field var 'x_version'
        $val = $CurrentForm->hasValue("version") ? $CurrentForm->getValue("version") : $CurrentForm->getValue("x_version");
        if (!$this->version->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->version->Visible = false; // Disable update for API request
            } else {
                $this->version->setFormValue($val);
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

        // Check field name 'deleted' first before field var 'x_deleted'
        $val = $CurrentForm->hasValue("deleted") ? $CurrentForm->getValue("deleted") : $CurrentForm->getValue("x_deleted");
        if (!$this->deleted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->deleted->Visible = false; // Disable update for API request
            } else {
                $this->deleted->setFormValue($val);
            }
        }

        // Check field name 'was_read' first before field var 'x_was_read'
        $val = $CurrentForm->hasValue("was_read") ? $CurrentForm->getValue("was_read") : $CurrentForm->getValue("x_was_read");
        if (!$this->was_read->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->was_read->Visible = false; // Disable update for API request
            } else {
                $this->was_read->setFormValue($val);
            }
        }

        // Check field name 'private' first before field var 'x__private'
        $val = $CurrentForm->hasValue("private") ? $CurrentForm->getValue("private") : $CurrentForm->getValue("x__private");
        if (!$this->_private->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_private->Visible = false; // Disable update for API request
            } else {
                $this->_private->setFormValue($val);
            }
        }

        // Check field name 'users' first before field var 'x_users'
        $val = $CurrentForm->hasValue("users") ? $CurrentForm->getValue("users") : $CurrentForm->getValue("x_users");
        if (!$this->users->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->users->Visible = false; // Disable update for API request
            } else {
                $this->users->setFormValue($val);
            }
        }

        // Check field name 'crmid' first before field var 'x_crmid'
        $val = $CurrentForm->hasValue("crmid") ? $CurrentForm->getValue("crmid") : $CurrentForm->getValue("x_crmid");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->smcreatorid->CurrentValue = $this->smcreatorid->FormValue;
        $this->smownerid->CurrentValue = $this->smownerid->FormValue;
        $this->shownerid->CurrentValue = $this->shownerid->FormValue;
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->setype->CurrentValue = $this->setype->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->attention->CurrentValue = $this->attention->FormValue;
        $this->createdtime->CurrentValue = $this->createdtime->FormValue;
        $this->createdtime->CurrentValue = UnFormatDateTime($this->createdtime->CurrentValue, 0);
        $this->modifiedtime->CurrentValue = $this->modifiedtime->FormValue;
        $this->modifiedtime->CurrentValue = UnFormatDateTime($this->modifiedtime->CurrentValue, 0);
        $this->viewedtime->CurrentValue = $this->viewedtime->FormValue;
        $this->viewedtime->CurrentValue = UnFormatDateTime($this->viewedtime->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
        $this->version->CurrentValue = $this->version->FormValue;
        $this->presence->CurrentValue = $this->presence->FormValue;
        $this->deleted->CurrentValue = $this->deleted->FormValue;
        $this->was_read->CurrentValue = $this->was_read->FormValue;
        $this->_private->CurrentValue = $this->_private->FormValue;
        $this->users->CurrentValue = $this->users->FormValue;
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
        $this->crmid->setDbValue($row['crmid']);
        $this->smcreatorid->setDbValue($row['smcreatorid']);
        $this->smownerid->setDbValue($row['smownerid']);
        $this->shownerid->setDbValue($row['shownerid']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->setype->setDbValue($row['setype']);
        $this->description->setDbValue($row['description']);
        $this->attention->setDbValue($row['attention']);
        $this->createdtime->setDbValue($row['createdtime']);
        $this->modifiedtime->setDbValue($row['modifiedtime']);
        $this->viewedtime->setDbValue($row['viewedtime']);
        $this->status->setDbValue($row['status']);
        $this->version->setDbValue($row['version']);
        $this->presence->setDbValue($row['presence']);
        $this->deleted->setDbValue($row['deleted']);
        $this->was_read->setDbValue($row['was_read']);
        $this->_private->setDbValue($row['private']);
        $this->users->setDbValue($row['users']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['crmid'] = $this->crmid->CurrentValue;
        $row['smcreatorid'] = $this->smcreatorid->CurrentValue;
        $row['smownerid'] = $this->smownerid->CurrentValue;
        $row['shownerid'] = $this->shownerid->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['setype'] = $this->setype->CurrentValue;
        $row['description'] = $this->description->CurrentValue;
        $row['attention'] = $this->attention->CurrentValue;
        $row['createdtime'] = $this->createdtime->CurrentValue;
        $row['modifiedtime'] = $this->modifiedtime->CurrentValue;
        $row['viewedtime'] = $this->viewedtime->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['version'] = $this->version->CurrentValue;
        $row['presence'] = $this->presence->CurrentValue;
        $row['deleted'] = $this->deleted->CurrentValue;
        $row['was_read'] = $this->was_read->CurrentValue;
        $row['private'] = $this->_private->CurrentValue;
        $row['users'] = $this->users->CurrentValue;
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

        // crmid

        // smcreatorid

        // smownerid

        // shownerid

        // modifiedby

        // setype

        // description

        // attention

        // createdtime

        // modifiedtime

        // viewedtime

        // status

        // version

        // presence

        // deleted

        // was_read

        // private

        // users
        if ($this->RowType == ROWTYPE_VIEW) {
            // crmid
            $this->crmid->ViewValue = $this->crmid->CurrentValue;
            $this->crmid->ViewCustomAttributes = "";

            // smcreatorid
            $this->smcreatorid->ViewValue = $this->smcreatorid->CurrentValue;
            $this->smcreatorid->ViewValue = FormatNumber($this->smcreatorid->ViewValue, 0, -2, -2, -2);
            $this->smcreatorid->ViewCustomAttributes = "";

            // smownerid
            $this->smownerid->ViewValue = $this->smownerid->CurrentValue;
            $this->smownerid->ViewValue = FormatNumber($this->smownerid->ViewValue, 0, -2, -2, -2);
            $this->smownerid->ViewCustomAttributes = "";

            // shownerid
            $this->shownerid->ViewValue = $this->shownerid->CurrentValue;
            $this->shownerid->ViewValue = FormatNumber($this->shownerid->ViewValue, 0, -2, -2, -2);
            $this->shownerid->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // setype
            $this->setype->ViewValue = $this->setype->CurrentValue;
            $this->setype->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // attention
            $this->attention->ViewValue = $this->attention->CurrentValue;
            $this->attention->ViewCustomAttributes = "";

            // createdtime
            $this->createdtime->ViewValue = $this->createdtime->CurrentValue;
            $this->createdtime->ViewValue = FormatDateTime($this->createdtime->ViewValue, 0);
            $this->createdtime->ViewCustomAttributes = "";

            // modifiedtime
            $this->modifiedtime->ViewValue = $this->modifiedtime->CurrentValue;
            $this->modifiedtime->ViewValue = FormatDateTime($this->modifiedtime->ViewValue, 0);
            $this->modifiedtime->ViewCustomAttributes = "";

            // viewedtime
            $this->viewedtime->ViewValue = $this->viewedtime->CurrentValue;
            $this->viewedtime->ViewValue = FormatDateTime($this->viewedtime->ViewValue, 0);
            $this->viewedtime->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewCustomAttributes = "";

            // version
            $this->version->ViewValue = $this->version->CurrentValue;
            $this->version->ViewValue = FormatNumber($this->version->ViewValue, 0, -2, -2, -2);
            $this->version->ViewCustomAttributes = "";

            // presence
            $this->presence->ViewValue = $this->presence->CurrentValue;
            $this->presence->ViewValue = FormatNumber($this->presence->ViewValue, 0, -2, -2, -2);
            $this->presence->ViewCustomAttributes = "";

            // deleted
            $this->deleted->ViewValue = $this->deleted->CurrentValue;
            $this->deleted->ViewValue = FormatNumber($this->deleted->ViewValue, 0, -2, -2, -2);
            $this->deleted->ViewCustomAttributes = "";

            // was_read
            $this->was_read->ViewValue = $this->was_read->CurrentValue;
            $this->was_read->ViewValue = FormatNumber($this->was_read->ViewValue, 0, -2, -2, -2);
            $this->was_read->ViewCustomAttributes = "";

            // private
            $this->_private->ViewValue = $this->_private->CurrentValue;
            $this->_private->ViewValue = FormatNumber($this->_private->ViewValue, 0, -2, -2, -2);
            $this->_private->ViewCustomAttributes = "";

            // users
            $this->users->ViewValue = $this->users->CurrentValue;
            $this->users->ViewCustomAttributes = "";

            // smcreatorid
            $this->smcreatorid->LinkCustomAttributes = "";
            $this->smcreatorid->HrefValue = "";
            $this->smcreatorid->TooltipValue = "";

            // smownerid
            $this->smownerid->LinkCustomAttributes = "";
            $this->smownerid->HrefValue = "";
            $this->smownerid->TooltipValue = "";

            // shownerid
            $this->shownerid->LinkCustomAttributes = "";
            $this->shownerid->HrefValue = "";
            $this->shownerid->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // setype
            $this->setype->LinkCustomAttributes = "";
            $this->setype->HrefValue = "";
            $this->setype->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // attention
            $this->attention->LinkCustomAttributes = "";
            $this->attention->HrefValue = "";
            $this->attention->TooltipValue = "";

            // createdtime
            $this->createdtime->LinkCustomAttributes = "";
            $this->createdtime->HrefValue = "";
            $this->createdtime->TooltipValue = "";

            // modifiedtime
            $this->modifiedtime->LinkCustomAttributes = "";
            $this->modifiedtime->HrefValue = "";
            $this->modifiedtime->TooltipValue = "";

            // viewedtime
            $this->viewedtime->LinkCustomAttributes = "";
            $this->viewedtime->HrefValue = "";
            $this->viewedtime->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // version
            $this->version->LinkCustomAttributes = "";
            $this->version->HrefValue = "";
            $this->version->TooltipValue = "";

            // presence
            $this->presence->LinkCustomAttributes = "";
            $this->presence->HrefValue = "";
            $this->presence->TooltipValue = "";

            // deleted
            $this->deleted->LinkCustomAttributes = "";
            $this->deleted->HrefValue = "";
            $this->deleted->TooltipValue = "";

            // was_read
            $this->was_read->LinkCustomAttributes = "";
            $this->was_read->HrefValue = "";
            $this->was_read->TooltipValue = "";

            // private
            $this->_private->LinkCustomAttributes = "";
            $this->_private->HrefValue = "";
            $this->_private->TooltipValue = "";

            // users
            $this->users->LinkCustomAttributes = "";
            $this->users->HrefValue = "";
            $this->users->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // smcreatorid
            $this->smcreatorid->EditAttrs["class"] = "form-control";
            $this->smcreatorid->EditCustomAttributes = "";
            $this->smcreatorid->EditValue = HtmlEncode($this->smcreatorid->CurrentValue);
            $this->smcreatorid->PlaceHolder = RemoveHtml($this->smcreatorid->caption());

            // smownerid
            $this->smownerid->EditAttrs["class"] = "form-control";
            $this->smownerid->EditCustomAttributes = "";
            $this->smownerid->EditValue = HtmlEncode($this->smownerid->CurrentValue);
            $this->smownerid->PlaceHolder = RemoveHtml($this->smownerid->caption());

            // shownerid
            $this->shownerid->EditAttrs["class"] = "form-control";
            $this->shownerid->EditCustomAttributes = "";
            $this->shownerid->EditValue = HtmlEncode($this->shownerid->CurrentValue);
            $this->shownerid->PlaceHolder = RemoveHtml($this->shownerid->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // setype
            $this->setype->EditAttrs["class"] = "form-control";
            $this->setype->EditCustomAttributes = "";
            if (!$this->setype->Raw) {
                $this->setype->CurrentValue = HtmlDecode($this->setype->CurrentValue);
            }
            $this->setype->EditValue = HtmlEncode($this->setype->CurrentValue);
            $this->setype->PlaceHolder = RemoveHtml($this->setype->caption());

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // attention
            $this->attention->EditAttrs["class"] = "form-control";
            $this->attention->EditCustomAttributes = "";
            $this->attention->EditValue = HtmlEncode($this->attention->CurrentValue);
            $this->attention->PlaceHolder = RemoveHtml($this->attention->caption());

            // createdtime
            $this->createdtime->EditAttrs["class"] = "form-control";
            $this->createdtime->EditCustomAttributes = "";
            $this->createdtime->EditValue = HtmlEncode(FormatDateTime($this->createdtime->CurrentValue, 8));
            $this->createdtime->PlaceHolder = RemoveHtml($this->createdtime->caption());

            // modifiedtime
            $this->modifiedtime->EditAttrs["class"] = "form-control";
            $this->modifiedtime->EditCustomAttributes = "";
            $this->modifiedtime->EditValue = HtmlEncode(FormatDateTime($this->modifiedtime->CurrentValue, 8));
            $this->modifiedtime->PlaceHolder = RemoveHtml($this->modifiedtime->caption());

            // viewedtime
            $this->viewedtime->EditAttrs["class"] = "form-control";
            $this->viewedtime->EditCustomAttributes = "";
            $this->viewedtime->EditValue = HtmlEncode(FormatDateTime($this->viewedtime->CurrentValue, 8));
            $this->viewedtime->PlaceHolder = RemoveHtml($this->viewedtime->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            if (!$this->status->Raw) {
                $this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
            }
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // version
            $this->version->EditAttrs["class"] = "form-control";
            $this->version->EditCustomAttributes = "";
            $this->version->EditValue = HtmlEncode($this->version->CurrentValue);
            $this->version->PlaceHolder = RemoveHtml($this->version->caption());

            // presence
            $this->presence->EditAttrs["class"] = "form-control";
            $this->presence->EditCustomAttributes = "";
            $this->presence->EditValue = HtmlEncode($this->presence->CurrentValue);
            $this->presence->PlaceHolder = RemoveHtml($this->presence->caption());

            // deleted
            $this->deleted->EditAttrs["class"] = "form-control";
            $this->deleted->EditCustomAttributes = "";
            $this->deleted->EditValue = HtmlEncode($this->deleted->CurrentValue);
            $this->deleted->PlaceHolder = RemoveHtml($this->deleted->caption());

            // was_read
            $this->was_read->EditAttrs["class"] = "form-control";
            $this->was_read->EditCustomAttributes = "";
            $this->was_read->EditValue = HtmlEncode($this->was_read->CurrentValue);
            $this->was_read->PlaceHolder = RemoveHtml($this->was_read->caption());

            // private
            $this->_private->EditAttrs["class"] = "form-control";
            $this->_private->EditCustomAttributes = "";
            $this->_private->EditValue = HtmlEncode($this->_private->CurrentValue);
            $this->_private->PlaceHolder = RemoveHtml($this->_private->caption());

            // users
            $this->users->EditAttrs["class"] = "form-control";
            $this->users->EditCustomAttributes = "";
            $this->users->EditValue = HtmlEncode($this->users->CurrentValue);
            $this->users->PlaceHolder = RemoveHtml($this->users->caption());

            // Add refer script

            // smcreatorid
            $this->smcreatorid->LinkCustomAttributes = "";
            $this->smcreatorid->HrefValue = "";

            // smownerid
            $this->smownerid->LinkCustomAttributes = "";
            $this->smownerid->HrefValue = "";

            // shownerid
            $this->shownerid->LinkCustomAttributes = "";
            $this->shownerid->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // setype
            $this->setype->LinkCustomAttributes = "";
            $this->setype->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

            // attention
            $this->attention->LinkCustomAttributes = "";
            $this->attention->HrefValue = "";

            // createdtime
            $this->createdtime->LinkCustomAttributes = "";
            $this->createdtime->HrefValue = "";

            // modifiedtime
            $this->modifiedtime->LinkCustomAttributes = "";
            $this->modifiedtime->HrefValue = "";

            // viewedtime
            $this->viewedtime->LinkCustomAttributes = "";
            $this->viewedtime->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // version
            $this->version->LinkCustomAttributes = "";
            $this->version->HrefValue = "";

            // presence
            $this->presence->LinkCustomAttributes = "";
            $this->presence->HrefValue = "";

            // deleted
            $this->deleted->LinkCustomAttributes = "";
            $this->deleted->HrefValue = "";

            // was_read
            $this->was_read->LinkCustomAttributes = "";
            $this->was_read->HrefValue = "";

            // private
            $this->_private->LinkCustomAttributes = "";
            $this->_private->HrefValue = "";

            // users
            $this->users->LinkCustomAttributes = "";
            $this->users->HrefValue = "";
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
        if ($this->smcreatorid->Required) {
            if (!$this->smcreatorid->IsDetailKey && EmptyValue($this->smcreatorid->FormValue)) {
                $this->smcreatorid->addErrorMessage(str_replace("%s", $this->smcreatorid->caption(), $this->smcreatorid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->smcreatorid->FormValue)) {
            $this->smcreatorid->addErrorMessage($this->smcreatorid->getErrorMessage(false));
        }
        if ($this->smownerid->Required) {
            if (!$this->smownerid->IsDetailKey && EmptyValue($this->smownerid->FormValue)) {
                $this->smownerid->addErrorMessage(str_replace("%s", $this->smownerid->caption(), $this->smownerid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->smownerid->FormValue)) {
            $this->smownerid->addErrorMessage($this->smownerid->getErrorMessage(false));
        }
        if ($this->shownerid->Required) {
            if (!$this->shownerid->IsDetailKey && EmptyValue($this->shownerid->FormValue)) {
                $this->shownerid->addErrorMessage(str_replace("%s", $this->shownerid->caption(), $this->shownerid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->shownerid->FormValue)) {
            $this->shownerid->addErrorMessage($this->shownerid->getErrorMessage(false));
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->modifiedby->FormValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if ($this->setype->Required) {
            if (!$this->setype->IsDetailKey && EmptyValue($this->setype->FormValue)) {
                $this->setype->addErrorMessage(str_replace("%s", $this->setype->caption(), $this->setype->RequiredErrorMessage));
            }
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
            }
        }
        if ($this->attention->Required) {
            if (!$this->attention->IsDetailKey && EmptyValue($this->attention->FormValue)) {
                $this->attention->addErrorMessage(str_replace("%s", $this->attention->caption(), $this->attention->RequiredErrorMessage));
            }
        }
        if ($this->createdtime->Required) {
            if (!$this->createdtime->IsDetailKey && EmptyValue($this->createdtime->FormValue)) {
                $this->createdtime->addErrorMessage(str_replace("%s", $this->createdtime->caption(), $this->createdtime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createdtime->FormValue)) {
            $this->createdtime->addErrorMessage($this->createdtime->getErrorMessage(false));
        }
        if ($this->modifiedtime->Required) {
            if (!$this->modifiedtime->IsDetailKey && EmptyValue($this->modifiedtime->FormValue)) {
                $this->modifiedtime->addErrorMessage(str_replace("%s", $this->modifiedtime->caption(), $this->modifiedtime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifiedtime->FormValue)) {
            $this->modifiedtime->addErrorMessage($this->modifiedtime->getErrorMessage(false));
        }
        if ($this->viewedtime->Required) {
            if (!$this->viewedtime->IsDetailKey && EmptyValue($this->viewedtime->FormValue)) {
                $this->viewedtime->addErrorMessage(str_replace("%s", $this->viewedtime->caption(), $this->viewedtime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->viewedtime->FormValue)) {
            $this->viewedtime->addErrorMessage($this->viewedtime->getErrorMessage(false));
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->version->Required) {
            if (!$this->version->IsDetailKey && EmptyValue($this->version->FormValue)) {
                $this->version->addErrorMessage(str_replace("%s", $this->version->caption(), $this->version->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->version->FormValue)) {
            $this->version->addErrorMessage($this->version->getErrorMessage(false));
        }
        if ($this->presence->Required) {
            if (!$this->presence->IsDetailKey && EmptyValue($this->presence->FormValue)) {
                $this->presence->addErrorMessage(str_replace("%s", $this->presence->caption(), $this->presence->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->presence->FormValue)) {
            $this->presence->addErrorMessage($this->presence->getErrorMessage(false));
        }
        if ($this->deleted->Required) {
            if (!$this->deleted->IsDetailKey && EmptyValue($this->deleted->FormValue)) {
                $this->deleted->addErrorMessage(str_replace("%s", $this->deleted->caption(), $this->deleted->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->deleted->FormValue)) {
            $this->deleted->addErrorMessage($this->deleted->getErrorMessage(false));
        }
        if ($this->was_read->Required) {
            if (!$this->was_read->IsDetailKey && EmptyValue($this->was_read->FormValue)) {
                $this->was_read->addErrorMessage(str_replace("%s", $this->was_read->caption(), $this->was_read->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->was_read->FormValue)) {
            $this->was_read->addErrorMessage($this->was_read->getErrorMessage(false));
        }
        if ($this->_private->Required) {
            if (!$this->_private->IsDetailKey && EmptyValue($this->_private->FormValue)) {
                $this->_private->addErrorMessage(str_replace("%s", $this->_private->caption(), $this->_private->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->_private->FormValue)) {
            $this->_private->addErrorMessage($this->_private->getErrorMessage(false));
        }
        if ($this->users->Required) {
            if (!$this->users->IsDetailKey && EmptyValue($this->users->FormValue)) {
                $this->users->addErrorMessage(str_replace("%s", $this->users->caption(), $this->users->RequiredErrorMessage));
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

        // smcreatorid
        $this->smcreatorid->setDbValueDef($rsnew, $this->smcreatorid->CurrentValue, 0, strval($this->smcreatorid->CurrentValue) == "");

        // smownerid
        $this->smownerid->setDbValueDef($rsnew, $this->smownerid->CurrentValue, 0, strval($this->smownerid->CurrentValue) == "");

        // shownerid
        $this->shownerid->setDbValueDef($rsnew, $this->shownerid->CurrentValue, null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, 0, strval($this->modifiedby->CurrentValue) == "");

        // setype
        $this->setype->setDbValueDef($rsnew, $this->setype->CurrentValue, "", false);

        // description
        $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, false);

        // attention
        $this->attention->setDbValueDef($rsnew, $this->attention->CurrentValue, null, false);

        // createdtime
        $this->createdtime->setDbValueDef($rsnew, UnFormatDateTime($this->createdtime->CurrentValue, 0), CurrentDate(), false);

        // modifiedtime
        $this->modifiedtime->setDbValueDef($rsnew, UnFormatDateTime($this->modifiedtime->CurrentValue, 0), CurrentDate(), false);

        // viewedtime
        $this->viewedtime->setDbValueDef($rsnew, UnFormatDateTime($this->viewedtime->CurrentValue, 0), null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // version
        $this->version->setDbValueDef($rsnew, $this->version->CurrentValue, 0, strval($this->version->CurrentValue) == "");

        // presence
        $this->presence->setDbValueDef($rsnew, $this->presence->CurrentValue, 0, strval($this->presence->CurrentValue) == "");

        // deleted
        $this->deleted->setDbValueDef($rsnew, $this->deleted->CurrentValue, 0, strval($this->deleted->CurrentValue) == "");

        // was_read
        $this->was_read->setDbValueDef($rsnew, $this->was_read->CurrentValue, null, strval($this->was_read->CurrentValue) == "");

        // private
        $this->_private->setDbValueDef($rsnew, $this->_private->CurrentValue, null, strval($this->_private->CurrentValue) == "");

        // users
        $this->users->setDbValueDef($rsnew, $this->users->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmCrmentityList"), "", $this->TableVar, true);
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
