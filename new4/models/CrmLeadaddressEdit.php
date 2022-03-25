<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmLeadaddressEdit extends CrmLeadaddress
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_leadaddress';

    // Page object name
    public $PageObjName = "CrmLeadaddressEdit";

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

        // Table object (crm_leadaddress)
        if (!isset($GLOBALS["crm_leadaddress"]) || get_class($GLOBALS["crm_leadaddress"]) == PROJECT_NAMESPACE . "crm_leadaddress") {
            $GLOBALS["crm_leadaddress"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leadaddress');
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
                $doc = new $class(Container("crm_leadaddress"));
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
                    if ($pageName == "CrmLeadaddressView") {
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
            $key .= @$ar['leadaddressid'];
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
        $this->leadaddressid->setVisibility();
        $this->phone->setVisibility();
        $this->mobile->setVisibility();
        $this->fax->setVisibility();
        $this->addresslevel1a->setVisibility();
        $this->addresslevel2a->setVisibility();
        $this->addresslevel3a->setVisibility();
        $this->addresslevel4a->setVisibility();
        $this->addresslevel5a->setVisibility();
        $this->addresslevel6a->setVisibility();
        $this->addresslevel7a->setVisibility();
        $this->addresslevel8a->setVisibility();
        $this->buildingnumbera->setVisibility();
        $this->localnumbera->setVisibility();
        $this->poboxa->setVisibility();
        $this->phone_extra->setVisibility();
        $this->mobile_extra->setVisibility();
        $this->fax_extra->setVisibility();
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
            if (($keyValue = Get("leadaddressid") ?? Key(0) ?? Route(2)) !== null) {
                $this->leadaddressid->setQueryStringValue($keyValue);
                $this->leadaddressid->setOldValue($this->leadaddressid->QueryStringValue);
            } elseif (Post("leadaddressid") !== null) {
                $this->leadaddressid->setFormValue(Post("leadaddressid"));
                $this->leadaddressid->setOldValue($this->leadaddressid->FormValue);
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
                if (($keyValue = Get("leadaddressid") ?? Route("leadaddressid")) !== null) {
                    $this->leadaddressid->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->leadaddressid->CurrentValue = null;
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
                    $this->terminate("CrmLeadaddressList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "CrmLeadaddressList") {
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

        // Check field name 'leadaddressid' first before field var 'x_leadaddressid'
        $val = $CurrentForm->hasValue("leadaddressid") ? $CurrentForm->getValue("leadaddressid") : $CurrentForm->getValue("x_leadaddressid");
        if (!$this->leadaddressid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leadaddressid->Visible = false; // Disable update for API request
            } else {
                $this->leadaddressid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_leadaddressid")) {
            $this->leadaddressid->setOldValue($CurrentForm->getValue("o_leadaddressid"));
        }

        // Check field name 'phone' first before field var 'x_phone'
        $val = $CurrentForm->hasValue("phone") ? $CurrentForm->getValue("phone") : $CurrentForm->getValue("x_phone");
        if (!$this->phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->phone->Visible = false; // Disable update for API request
            } else {
                $this->phone->setFormValue($val);
            }
        }

        // Check field name 'mobile' first before field var 'x_mobile'
        $val = $CurrentForm->hasValue("mobile") ? $CurrentForm->getValue("mobile") : $CurrentForm->getValue("x_mobile");
        if (!$this->mobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobile->Visible = false; // Disable update for API request
            } else {
                $this->mobile->setFormValue($val);
            }
        }

        // Check field name 'fax' first before field var 'x_fax'
        $val = $CurrentForm->hasValue("fax") ? $CurrentForm->getValue("fax") : $CurrentForm->getValue("x_fax");
        if (!$this->fax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->fax->Visible = false; // Disable update for API request
            } else {
                $this->fax->setFormValue($val);
            }
        }

        // Check field name 'addresslevel1a' first before field var 'x_addresslevel1a'
        $val = $CurrentForm->hasValue("addresslevel1a") ? $CurrentForm->getValue("addresslevel1a") : $CurrentForm->getValue("x_addresslevel1a");
        if (!$this->addresslevel1a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel1a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel1a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel2a' first before field var 'x_addresslevel2a'
        $val = $CurrentForm->hasValue("addresslevel2a") ? $CurrentForm->getValue("addresslevel2a") : $CurrentForm->getValue("x_addresslevel2a");
        if (!$this->addresslevel2a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel2a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel2a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel3a' first before field var 'x_addresslevel3a'
        $val = $CurrentForm->hasValue("addresslevel3a") ? $CurrentForm->getValue("addresslevel3a") : $CurrentForm->getValue("x_addresslevel3a");
        if (!$this->addresslevel3a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel3a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel3a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel4a' first before field var 'x_addresslevel4a'
        $val = $CurrentForm->hasValue("addresslevel4a") ? $CurrentForm->getValue("addresslevel4a") : $CurrentForm->getValue("x_addresslevel4a");
        if (!$this->addresslevel4a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel4a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel4a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel5a' first before field var 'x_addresslevel5a'
        $val = $CurrentForm->hasValue("addresslevel5a") ? $CurrentForm->getValue("addresslevel5a") : $CurrentForm->getValue("x_addresslevel5a");
        if (!$this->addresslevel5a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel5a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel5a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel6a' first before field var 'x_addresslevel6a'
        $val = $CurrentForm->hasValue("addresslevel6a") ? $CurrentForm->getValue("addresslevel6a") : $CurrentForm->getValue("x_addresslevel6a");
        if (!$this->addresslevel6a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel6a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel6a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel7a' first before field var 'x_addresslevel7a'
        $val = $CurrentForm->hasValue("addresslevel7a") ? $CurrentForm->getValue("addresslevel7a") : $CurrentForm->getValue("x_addresslevel7a");
        if (!$this->addresslevel7a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel7a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel7a->setFormValue($val);
            }
        }

        // Check field name 'addresslevel8a' first before field var 'x_addresslevel8a'
        $val = $CurrentForm->hasValue("addresslevel8a") ? $CurrentForm->getValue("addresslevel8a") : $CurrentForm->getValue("x_addresslevel8a");
        if (!$this->addresslevel8a->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->addresslevel8a->Visible = false; // Disable update for API request
            } else {
                $this->addresslevel8a->setFormValue($val);
            }
        }

        // Check field name 'buildingnumbera' first before field var 'x_buildingnumbera'
        $val = $CurrentForm->hasValue("buildingnumbera") ? $CurrentForm->getValue("buildingnumbera") : $CurrentForm->getValue("x_buildingnumbera");
        if (!$this->buildingnumbera->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->buildingnumbera->Visible = false; // Disable update for API request
            } else {
                $this->buildingnumbera->setFormValue($val);
            }
        }

        // Check field name 'localnumbera' first before field var 'x_localnumbera'
        $val = $CurrentForm->hasValue("localnumbera") ? $CurrentForm->getValue("localnumbera") : $CurrentForm->getValue("x_localnumbera");
        if (!$this->localnumbera->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->localnumbera->Visible = false; // Disable update for API request
            } else {
                $this->localnumbera->setFormValue($val);
            }
        }

        // Check field name 'poboxa' first before field var 'x_poboxa'
        $val = $CurrentForm->hasValue("poboxa") ? $CurrentForm->getValue("poboxa") : $CurrentForm->getValue("x_poboxa");
        if (!$this->poboxa->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->poboxa->Visible = false; // Disable update for API request
            } else {
                $this->poboxa->setFormValue($val);
            }
        }

        // Check field name 'phone_extra' first before field var 'x_phone_extra'
        $val = $CurrentForm->hasValue("phone_extra") ? $CurrentForm->getValue("phone_extra") : $CurrentForm->getValue("x_phone_extra");
        if (!$this->phone_extra->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->phone_extra->Visible = false; // Disable update for API request
            } else {
                $this->phone_extra->setFormValue($val);
            }
        }

        // Check field name 'mobile_extra' first before field var 'x_mobile_extra'
        $val = $CurrentForm->hasValue("mobile_extra") ? $CurrentForm->getValue("mobile_extra") : $CurrentForm->getValue("x_mobile_extra");
        if (!$this->mobile_extra->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobile_extra->Visible = false; // Disable update for API request
            } else {
                $this->mobile_extra->setFormValue($val);
            }
        }

        // Check field name 'fax_extra' first before field var 'x_fax_extra'
        $val = $CurrentForm->hasValue("fax_extra") ? $CurrentForm->getValue("fax_extra") : $CurrentForm->getValue("x_fax_extra");
        if (!$this->fax_extra->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->fax_extra->Visible = false; // Disable update for API request
            } else {
                $this->fax_extra->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->leadaddressid->CurrentValue = $this->leadaddressid->FormValue;
        $this->phone->CurrentValue = $this->phone->FormValue;
        $this->mobile->CurrentValue = $this->mobile->FormValue;
        $this->fax->CurrentValue = $this->fax->FormValue;
        $this->addresslevel1a->CurrentValue = $this->addresslevel1a->FormValue;
        $this->addresslevel2a->CurrentValue = $this->addresslevel2a->FormValue;
        $this->addresslevel3a->CurrentValue = $this->addresslevel3a->FormValue;
        $this->addresslevel4a->CurrentValue = $this->addresslevel4a->FormValue;
        $this->addresslevel5a->CurrentValue = $this->addresslevel5a->FormValue;
        $this->addresslevel6a->CurrentValue = $this->addresslevel6a->FormValue;
        $this->addresslevel7a->CurrentValue = $this->addresslevel7a->FormValue;
        $this->addresslevel8a->CurrentValue = $this->addresslevel8a->FormValue;
        $this->buildingnumbera->CurrentValue = $this->buildingnumbera->FormValue;
        $this->localnumbera->CurrentValue = $this->localnumbera->FormValue;
        $this->poboxa->CurrentValue = $this->poboxa->FormValue;
        $this->phone_extra->CurrentValue = $this->phone_extra->FormValue;
        $this->mobile_extra->CurrentValue = $this->mobile_extra->FormValue;
        $this->fax_extra->CurrentValue = $this->fax_extra->FormValue;
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
        $this->leadaddressid->setDbValue($row['leadaddressid']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->fax->setDbValue($row['fax']);
        $this->addresslevel1a->setDbValue($row['addresslevel1a']);
        $this->addresslevel2a->setDbValue($row['addresslevel2a']);
        $this->addresslevel3a->setDbValue($row['addresslevel3a']);
        $this->addresslevel4a->setDbValue($row['addresslevel4a']);
        $this->addresslevel5a->setDbValue($row['addresslevel5a']);
        $this->addresslevel6a->setDbValue($row['addresslevel6a']);
        $this->addresslevel7a->setDbValue($row['addresslevel7a']);
        $this->addresslevel8a->setDbValue($row['addresslevel8a']);
        $this->buildingnumbera->setDbValue($row['buildingnumbera']);
        $this->localnumbera->setDbValue($row['localnumbera']);
        $this->poboxa->setDbValue($row['poboxa']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->fax_extra->setDbValue($row['fax_extra']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['leadaddressid'] = null;
        $row['phone'] = null;
        $row['mobile'] = null;
        $row['fax'] = null;
        $row['addresslevel1a'] = null;
        $row['addresslevel2a'] = null;
        $row['addresslevel3a'] = null;
        $row['addresslevel4a'] = null;
        $row['addresslevel5a'] = null;
        $row['addresslevel6a'] = null;
        $row['addresslevel7a'] = null;
        $row['addresslevel8a'] = null;
        $row['buildingnumbera'] = null;
        $row['localnumbera'] = null;
        $row['poboxa'] = null;
        $row['phone_extra'] = null;
        $row['mobile_extra'] = null;
        $row['fax_extra'] = null;
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

        // leadaddressid

        // phone

        // mobile

        // fax

        // addresslevel1a

        // addresslevel2a

        // addresslevel3a

        // addresslevel4a

        // addresslevel5a

        // addresslevel6a

        // addresslevel7a

        // addresslevel8a

        // buildingnumbera

        // localnumbera

        // poboxa

        // phone_extra

        // mobile_extra

        // fax_extra
        if ($this->RowType == ROWTYPE_VIEW) {
            // leadaddressid
            $this->leadaddressid->ViewValue = $this->leadaddressid->CurrentValue;
            $this->leadaddressid->ViewValue = FormatNumber($this->leadaddressid->ViewValue, 0, -2, -2, -2);
            $this->leadaddressid->ViewCustomAttributes = "";

            // phone
            $this->phone->ViewValue = $this->phone->CurrentValue;
            $this->phone->ViewCustomAttributes = "";

            // mobile
            $this->mobile->ViewValue = $this->mobile->CurrentValue;
            $this->mobile->ViewCustomAttributes = "";

            // fax
            $this->fax->ViewValue = $this->fax->CurrentValue;
            $this->fax->ViewCustomAttributes = "";

            // addresslevel1a
            $this->addresslevel1a->ViewValue = $this->addresslevel1a->CurrentValue;
            $this->addresslevel1a->ViewCustomAttributes = "";

            // addresslevel2a
            $this->addresslevel2a->ViewValue = $this->addresslevel2a->CurrentValue;
            $this->addresslevel2a->ViewCustomAttributes = "";

            // addresslevel3a
            $this->addresslevel3a->ViewValue = $this->addresslevel3a->CurrentValue;
            $this->addresslevel3a->ViewCustomAttributes = "";

            // addresslevel4a
            $this->addresslevel4a->ViewValue = $this->addresslevel4a->CurrentValue;
            $this->addresslevel4a->ViewCustomAttributes = "";

            // addresslevel5a
            $this->addresslevel5a->ViewValue = $this->addresslevel5a->CurrentValue;
            $this->addresslevel5a->ViewCustomAttributes = "";

            // addresslevel6a
            $this->addresslevel6a->ViewValue = $this->addresslevel6a->CurrentValue;
            $this->addresslevel6a->ViewCustomAttributes = "";

            // addresslevel7a
            $this->addresslevel7a->ViewValue = $this->addresslevel7a->CurrentValue;
            $this->addresslevel7a->ViewCustomAttributes = "";

            // addresslevel8a
            $this->addresslevel8a->ViewValue = $this->addresslevel8a->CurrentValue;
            $this->addresslevel8a->ViewCustomAttributes = "";

            // buildingnumbera
            $this->buildingnumbera->ViewValue = $this->buildingnumbera->CurrentValue;
            $this->buildingnumbera->ViewCustomAttributes = "";

            // localnumbera
            $this->localnumbera->ViewValue = $this->localnumbera->CurrentValue;
            $this->localnumbera->ViewCustomAttributes = "";

            // poboxa
            $this->poboxa->ViewValue = $this->poboxa->CurrentValue;
            $this->poboxa->ViewCustomAttributes = "";

            // phone_extra
            $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
            $this->phone_extra->ViewCustomAttributes = "";

            // mobile_extra
            $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
            $this->mobile_extra->ViewCustomAttributes = "";

            // fax_extra
            $this->fax_extra->ViewValue = $this->fax_extra->CurrentValue;
            $this->fax_extra->ViewCustomAttributes = "";

            // leadaddressid
            $this->leadaddressid->LinkCustomAttributes = "";
            $this->leadaddressid->HrefValue = "";
            $this->leadaddressid->TooltipValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";
            $this->phone->TooltipValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";
            $this->mobile->TooltipValue = "";

            // fax
            $this->fax->LinkCustomAttributes = "";
            $this->fax->HrefValue = "";
            $this->fax->TooltipValue = "";

            // addresslevel1a
            $this->addresslevel1a->LinkCustomAttributes = "";
            $this->addresslevel1a->HrefValue = "";
            $this->addresslevel1a->TooltipValue = "";

            // addresslevel2a
            $this->addresslevel2a->LinkCustomAttributes = "";
            $this->addresslevel2a->HrefValue = "";
            $this->addresslevel2a->TooltipValue = "";

            // addresslevel3a
            $this->addresslevel3a->LinkCustomAttributes = "";
            $this->addresslevel3a->HrefValue = "";
            $this->addresslevel3a->TooltipValue = "";

            // addresslevel4a
            $this->addresslevel4a->LinkCustomAttributes = "";
            $this->addresslevel4a->HrefValue = "";
            $this->addresslevel4a->TooltipValue = "";

            // addresslevel5a
            $this->addresslevel5a->LinkCustomAttributes = "";
            $this->addresslevel5a->HrefValue = "";
            $this->addresslevel5a->TooltipValue = "";

            // addresslevel6a
            $this->addresslevel6a->LinkCustomAttributes = "";
            $this->addresslevel6a->HrefValue = "";
            $this->addresslevel6a->TooltipValue = "";

            // addresslevel7a
            $this->addresslevel7a->LinkCustomAttributes = "";
            $this->addresslevel7a->HrefValue = "";
            $this->addresslevel7a->TooltipValue = "";

            // addresslevel8a
            $this->addresslevel8a->LinkCustomAttributes = "";
            $this->addresslevel8a->HrefValue = "";
            $this->addresslevel8a->TooltipValue = "";

            // buildingnumbera
            $this->buildingnumbera->LinkCustomAttributes = "";
            $this->buildingnumbera->HrefValue = "";
            $this->buildingnumbera->TooltipValue = "";

            // localnumbera
            $this->localnumbera->LinkCustomAttributes = "";
            $this->localnumbera->HrefValue = "";
            $this->localnumbera->TooltipValue = "";

            // poboxa
            $this->poboxa->LinkCustomAttributes = "";
            $this->poboxa->HrefValue = "";
            $this->poboxa->TooltipValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";
            $this->phone_extra->TooltipValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";
            $this->mobile_extra->TooltipValue = "";

            // fax_extra
            $this->fax_extra->LinkCustomAttributes = "";
            $this->fax_extra->HrefValue = "";
            $this->fax_extra->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // leadaddressid
            $this->leadaddressid->EditAttrs["class"] = "form-control";
            $this->leadaddressid->EditCustomAttributes = "";
            $this->leadaddressid->EditValue = HtmlEncode($this->leadaddressid->CurrentValue);
            $this->leadaddressid->PlaceHolder = RemoveHtml($this->leadaddressid->caption());

            // phone
            $this->phone->EditAttrs["class"] = "form-control";
            $this->phone->EditCustomAttributes = "";
            if (!$this->phone->Raw) {
                $this->phone->CurrentValue = HtmlDecode($this->phone->CurrentValue);
            }
            $this->phone->EditValue = HtmlEncode($this->phone->CurrentValue);
            $this->phone->PlaceHolder = RemoveHtml($this->phone->caption());

            // mobile
            $this->mobile->EditAttrs["class"] = "form-control";
            $this->mobile->EditCustomAttributes = "";
            if (!$this->mobile->Raw) {
                $this->mobile->CurrentValue = HtmlDecode($this->mobile->CurrentValue);
            }
            $this->mobile->EditValue = HtmlEncode($this->mobile->CurrentValue);
            $this->mobile->PlaceHolder = RemoveHtml($this->mobile->caption());

            // fax
            $this->fax->EditAttrs["class"] = "form-control";
            $this->fax->EditCustomAttributes = "";
            if (!$this->fax->Raw) {
                $this->fax->CurrentValue = HtmlDecode($this->fax->CurrentValue);
            }
            $this->fax->EditValue = HtmlEncode($this->fax->CurrentValue);
            $this->fax->PlaceHolder = RemoveHtml($this->fax->caption());

            // addresslevel1a
            $this->addresslevel1a->EditAttrs["class"] = "form-control";
            $this->addresslevel1a->EditCustomAttributes = "";
            if (!$this->addresslevel1a->Raw) {
                $this->addresslevel1a->CurrentValue = HtmlDecode($this->addresslevel1a->CurrentValue);
            }
            $this->addresslevel1a->EditValue = HtmlEncode($this->addresslevel1a->CurrentValue);
            $this->addresslevel1a->PlaceHolder = RemoveHtml($this->addresslevel1a->caption());

            // addresslevel2a
            $this->addresslevel2a->EditAttrs["class"] = "form-control";
            $this->addresslevel2a->EditCustomAttributes = "";
            if (!$this->addresslevel2a->Raw) {
                $this->addresslevel2a->CurrentValue = HtmlDecode($this->addresslevel2a->CurrentValue);
            }
            $this->addresslevel2a->EditValue = HtmlEncode($this->addresslevel2a->CurrentValue);
            $this->addresslevel2a->PlaceHolder = RemoveHtml($this->addresslevel2a->caption());

            // addresslevel3a
            $this->addresslevel3a->EditAttrs["class"] = "form-control";
            $this->addresslevel3a->EditCustomAttributes = "";
            if (!$this->addresslevel3a->Raw) {
                $this->addresslevel3a->CurrentValue = HtmlDecode($this->addresslevel3a->CurrentValue);
            }
            $this->addresslevel3a->EditValue = HtmlEncode($this->addresslevel3a->CurrentValue);
            $this->addresslevel3a->PlaceHolder = RemoveHtml($this->addresslevel3a->caption());

            // addresslevel4a
            $this->addresslevel4a->EditAttrs["class"] = "form-control";
            $this->addresslevel4a->EditCustomAttributes = "";
            if (!$this->addresslevel4a->Raw) {
                $this->addresslevel4a->CurrentValue = HtmlDecode($this->addresslevel4a->CurrentValue);
            }
            $this->addresslevel4a->EditValue = HtmlEncode($this->addresslevel4a->CurrentValue);
            $this->addresslevel4a->PlaceHolder = RemoveHtml($this->addresslevel4a->caption());

            // addresslevel5a
            $this->addresslevel5a->EditAttrs["class"] = "form-control";
            $this->addresslevel5a->EditCustomAttributes = "";
            if (!$this->addresslevel5a->Raw) {
                $this->addresslevel5a->CurrentValue = HtmlDecode($this->addresslevel5a->CurrentValue);
            }
            $this->addresslevel5a->EditValue = HtmlEncode($this->addresslevel5a->CurrentValue);
            $this->addresslevel5a->PlaceHolder = RemoveHtml($this->addresslevel5a->caption());

            // addresslevel6a
            $this->addresslevel6a->EditAttrs["class"] = "form-control";
            $this->addresslevel6a->EditCustomAttributes = "";
            if (!$this->addresslevel6a->Raw) {
                $this->addresslevel6a->CurrentValue = HtmlDecode($this->addresslevel6a->CurrentValue);
            }
            $this->addresslevel6a->EditValue = HtmlEncode($this->addresslevel6a->CurrentValue);
            $this->addresslevel6a->PlaceHolder = RemoveHtml($this->addresslevel6a->caption());

            // addresslevel7a
            $this->addresslevel7a->EditAttrs["class"] = "form-control";
            $this->addresslevel7a->EditCustomAttributes = "";
            if (!$this->addresslevel7a->Raw) {
                $this->addresslevel7a->CurrentValue = HtmlDecode($this->addresslevel7a->CurrentValue);
            }
            $this->addresslevel7a->EditValue = HtmlEncode($this->addresslevel7a->CurrentValue);
            $this->addresslevel7a->PlaceHolder = RemoveHtml($this->addresslevel7a->caption());

            // addresslevel8a
            $this->addresslevel8a->EditAttrs["class"] = "form-control";
            $this->addresslevel8a->EditCustomAttributes = "";
            if (!$this->addresslevel8a->Raw) {
                $this->addresslevel8a->CurrentValue = HtmlDecode($this->addresslevel8a->CurrentValue);
            }
            $this->addresslevel8a->EditValue = HtmlEncode($this->addresslevel8a->CurrentValue);
            $this->addresslevel8a->PlaceHolder = RemoveHtml($this->addresslevel8a->caption());

            // buildingnumbera
            $this->buildingnumbera->EditAttrs["class"] = "form-control";
            $this->buildingnumbera->EditCustomAttributes = "";
            if (!$this->buildingnumbera->Raw) {
                $this->buildingnumbera->CurrentValue = HtmlDecode($this->buildingnumbera->CurrentValue);
            }
            $this->buildingnumbera->EditValue = HtmlEncode($this->buildingnumbera->CurrentValue);
            $this->buildingnumbera->PlaceHolder = RemoveHtml($this->buildingnumbera->caption());

            // localnumbera
            $this->localnumbera->EditAttrs["class"] = "form-control";
            $this->localnumbera->EditCustomAttributes = "";
            if (!$this->localnumbera->Raw) {
                $this->localnumbera->CurrentValue = HtmlDecode($this->localnumbera->CurrentValue);
            }
            $this->localnumbera->EditValue = HtmlEncode($this->localnumbera->CurrentValue);
            $this->localnumbera->PlaceHolder = RemoveHtml($this->localnumbera->caption());

            // poboxa
            $this->poboxa->EditAttrs["class"] = "form-control";
            $this->poboxa->EditCustomAttributes = "";
            if (!$this->poboxa->Raw) {
                $this->poboxa->CurrentValue = HtmlDecode($this->poboxa->CurrentValue);
            }
            $this->poboxa->EditValue = HtmlEncode($this->poboxa->CurrentValue);
            $this->poboxa->PlaceHolder = RemoveHtml($this->poboxa->caption());

            // phone_extra
            $this->phone_extra->EditAttrs["class"] = "form-control";
            $this->phone_extra->EditCustomAttributes = "";
            if (!$this->phone_extra->Raw) {
                $this->phone_extra->CurrentValue = HtmlDecode($this->phone_extra->CurrentValue);
            }
            $this->phone_extra->EditValue = HtmlEncode($this->phone_extra->CurrentValue);
            $this->phone_extra->PlaceHolder = RemoveHtml($this->phone_extra->caption());

            // mobile_extra
            $this->mobile_extra->EditAttrs["class"] = "form-control";
            $this->mobile_extra->EditCustomAttributes = "";
            if (!$this->mobile_extra->Raw) {
                $this->mobile_extra->CurrentValue = HtmlDecode($this->mobile_extra->CurrentValue);
            }
            $this->mobile_extra->EditValue = HtmlEncode($this->mobile_extra->CurrentValue);
            $this->mobile_extra->PlaceHolder = RemoveHtml($this->mobile_extra->caption());

            // fax_extra
            $this->fax_extra->EditAttrs["class"] = "form-control";
            $this->fax_extra->EditCustomAttributes = "";
            if (!$this->fax_extra->Raw) {
                $this->fax_extra->CurrentValue = HtmlDecode($this->fax_extra->CurrentValue);
            }
            $this->fax_extra->EditValue = HtmlEncode($this->fax_extra->CurrentValue);
            $this->fax_extra->PlaceHolder = RemoveHtml($this->fax_extra->caption());

            // Edit refer script

            // leadaddressid
            $this->leadaddressid->LinkCustomAttributes = "";
            $this->leadaddressid->HrefValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";

            // fax
            $this->fax->LinkCustomAttributes = "";
            $this->fax->HrefValue = "";

            // addresslevel1a
            $this->addresslevel1a->LinkCustomAttributes = "";
            $this->addresslevel1a->HrefValue = "";

            // addresslevel2a
            $this->addresslevel2a->LinkCustomAttributes = "";
            $this->addresslevel2a->HrefValue = "";

            // addresslevel3a
            $this->addresslevel3a->LinkCustomAttributes = "";
            $this->addresslevel3a->HrefValue = "";

            // addresslevel4a
            $this->addresslevel4a->LinkCustomAttributes = "";
            $this->addresslevel4a->HrefValue = "";

            // addresslevel5a
            $this->addresslevel5a->LinkCustomAttributes = "";
            $this->addresslevel5a->HrefValue = "";

            // addresslevel6a
            $this->addresslevel6a->LinkCustomAttributes = "";
            $this->addresslevel6a->HrefValue = "";

            // addresslevel7a
            $this->addresslevel7a->LinkCustomAttributes = "";
            $this->addresslevel7a->HrefValue = "";

            // addresslevel8a
            $this->addresslevel8a->LinkCustomAttributes = "";
            $this->addresslevel8a->HrefValue = "";

            // buildingnumbera
            $this->buildingnumbera->LinkCustomAttributes = "";
            $this->buildingnumbera->HrefValue = "";

            // localnumbera
            $this->localnumbera->LinkCustomAttributes = "";
            $this->localnumbera->HrefValue = "";

            // poboxa
            $this->poboxa->LinkCustomAttributes = "";
            $this->poboxa->HrefValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";

            // fax_extra
            $this->fax_extra->LinkCustomAttributes = "";
            $this->fax_extra->HrefValue = "";
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
        if ($this->leadaddressid->Required) {
            if (!$this->leadaddressid->IsDetailKey && EmptyValue($this->leadaddressid->FormValue)) {
                $this->leadaddressid->addErrorMessage(str_replace("%s", $this->leadaddressid->caption(), $this->leadaddressid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leadaddressid->FormValue)) {
            $this->leadaddressid->addErrorMessage($this->leadaddressid->getErrorMessage(false));
        }
        if ($this->phone->Required) {
            if (!$this->phone->IsDetailKey && EmptyValue($this->phone->FormValue)) {
                $this->phone->addErrorMessage(str_replace("%s", $this->phone->caption(), $this->phone->RequiredErrorMessage));
            }
        }
        if ($this->mobile->Required) {
            if (!$this->mobile->IsDetailKey && EmptyValue($this->mobile->FormValue)) {
                $this->mobile->addErrorMessage(str_replace("%s", $this->mobile->caption(), $this->mobile->RequiredErrorMessage));
            }
        }
        if ($this->fax->Required) {
            if (!$this->fax->IsDetailKey && EmptyValue($this->fax->FormValue)) {
                $this->fax->addErrorMessage(str_replace("%s", $this->fax->caption(), $this->fax->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel1a->Required) {
            if (!$this->addresslevel1a->IsDetailKey && EmptyValue($this->addresslevel1a->FormValue)) {
                $this->addresslevel1a->addErrorMessage(str_replace("%s", $this->addresslevel1a->caption(), $this->addresslevel1a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel2a->Required) {
            if (!$this->addresslevel2a->IsDetailKey && EmptyValue($this->addresslevel2a->FormValue)) {
                $this->addresslevel2a->addErrorMessage(str_replace("%s", $this->addresslevel2a->caption(), $this->addresslevel2a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel3a->Required) {
            if (!$this->addresslevel3a->IsDetailKey && EmptyValue($this->addresslevel3a->FormValue)) {
                $this->addresslevel3a->addErrorMessage(str_replace("%s", $this->addresslevel3a->caption(), $this->addresslevel3a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel4a->Required) {
            if (!$this->addresslevel4a->IsDetailKey && EmptyValue($this->addresslevel4a->FormValue)) {
                $this->addresslevel4a->addErrorMessage(str_replace("%s", $this->addresslevel4a->caption(), $this->addresslevel4a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel5a->Required) {
            if (!$this->addresslevel5a->IsDetailKey && EmptyValue($this->addresslevel5a->FormValue)) {
                $this->addresslevel5a->addErrorMessage(str_replace("%s", $this->addresslevel5a->caption(), $this->addresslevel5a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel6a->Required) {
            if (!$this->addresslevel6a->IsDetailKey && EmptyValue($this->addresslevel6a->FormValue)) {
                $this->addresslevel6a->addErrorMessage(str_replace("%s", $this->addresslevel6a->caption(), $this->addresslevel6a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel7a->Required) {
            if (!$this->addresslevel7a->IsDetailKey && EmptyValue($this->addresslevel7a->FormValue)) {
                $this->addresslevel7a->addErrorMessage(str_replace("%s", $this->addresslevel7a->caption(), $this->addresslevel7a->RequiredErrorMessage));
            }
        }
        if ($this->addresslevel8a->Required) {
            if (!$this->addresslevel8a->IsDetailKey && EmptyValue($this->addresslevel8a->FormValue)) {
                $this->addresslevel8a->addErrorMessage(str_replace("%s", $this->addresslevel8a->caption(), $this->addresslevel8a->RequiredErrorMessage));
            }
        }
        if ($this->buildingnumbera->Required) {
            if (!$this->buildingnumbera->IsDetailKey && EmptyValue($this->buildingnumbera->FormValue)) {
                $this->buildingnumbera->addErrorMessage(str_replace("%s", $this->buildingnumbera->caption(), $this->buildingnumbera->RequiredErrorMessage));
            }
        }
        if ($this->localnumbera->Required) {
            if (!$this->localnumbera->IsDetailKey && EmptyValue($this->localnumbera->FormValue)) {
                $this->localnumbera->addErrorMessage(str_replace("%s", $this->localnumbera->caption(), $this->localnumbera->RequiredErrorMessage));
            }
        }
        if ($this->poboxa->Required) {
            if (!$this->poboxa->IsDetailKey && EmptyValue($this->poboxa->FormValue)) {
                $this->poboxa->addErrorMessage(str_replace("%s", $this->poboxa->caption(), $this->poboxa->RequiredErrorMessage));
            }
        }
        if ($this->phone_extra->Required) {
            if (!$this->phone_extra->IsDetailKey && EmptyValue($this->phone_extra->FormValue)) {
                $this->phone_extra->addErrorMessage(str_replace("%s", $this->phone_extra->caption(), $this->phone_extra->RequiredErrorMessage));
            }
        }
        if ($this->mobile_extra->Required) {
            if (!$this->mobile_extra->IsDetailKey && EmptyValue($this->mobile_extra->FormValue)) {
                $this->mobile_extra->addErrorMessage(str_replace("%s", $this->mobile_extra->caption(), $this->mobile_extra->RequiredErrorMessage));
            }
        }
        if ($this->fax_extra->Required) {
            if (!$this->fax_extra->IsDetailKey && EmptyValue($this->fax_extra->FormValue)) {
                $this->fax_extra->addErrorMessage(str_replace("%s", $this->fax_extra->caption(), $this->fax_extra->RequiredErrorMessage));
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

            // leadaddressid
            $this->leadaddressid->setDbValueDef($rsnew, $this->leadaddressid->CurrentValue, 0, $this->leadaddressid->ReadOnly);

            // phone
            $this->phone->setDbValueDef($rsnew, $this->phone->CurrentValue, null, $this->phone->ReadOnly);

            // mobile
            $this->mobile->setDbValueDef($rsnew, $this->mobile->CurrentValue, null, $this->mobile->ReadOnly);

            // fax
            $this->fax->setDbValueDef($rsnew, $this->fax->CurrentValue, null, $this->fax->ReadOnly);

            // addresslevel1a
            $this->addresslevel1a->setDbValueDef($rsnew, $this->addresslevel1a->CurrentValue, null, $this->addresslevel1a->ReadOnly);

            // addresslevel2a
            $this->addresslevel2a->setDbValueDef($rsnew, $this->addresslevel2a->CurrentValue, null, $this->addresslevel2a->ReadOnly);

            // addresslevel3a
            $this->addresslevel3a->setDbValueDef($rsnew, $this->addresslevel3a->CurrentValue, null, $this->addresslevel3a->ReadOnly);

            // addresslevel4a
            $this->addresslevel4a->setDbValueDef($rsnew, $this->addresslevel4a->CurrentValue, null, $this->addresslevel4a->ReadOnly);

            // addresslevel5a
            $this->addresslevel5a->setDbValueDef($rsnew, $this->addresslevel5a->CurrentValue, null, $this->addresslevel5a->ReadOnly);

            // addresslevel6a
            $this->addresslevel6a->setDbValueDef($rsnew, $this->addresslevel6a->CurrentValue, null, $this->addresslevel6a->ReadOnly);

            // addresslevel7a
            $this->addresslevel7a->setDbValueDef($rsnew, $this->addresslevel7a->CurrentValue, null, $this->addresslevel7a->ReadOnly);

            // addresslevel8a
            $this->addresslevel8a->setDbValueDef($rsnew, $this->addresslevel8a->CurrentValue, null, $this->addresslevel8a->ReadOnly);

            // buildingnumbera
            $this->buildingnumbera->setDbValueDef($rsnew, $this->buildingnumbera->CurrentValue, null, $this->buildingnumbera->ReadOnly);

            // localnumbera
            $this->localnumbera->setDbValueDef($rsnew, $this->localnumbera->CurrentValue, null, $this->localnumbera->ReadOnly);

            // poboxa
            $this->poboxa->setDbValueDef($rsnew, $this->poboxa->CurrentValue, null, $this->poboxa->ReadOnly);

            // phone_extra
            $this->phone_extra->setDbValueDef($rsnew, $this->phone_extra->CurrentValue, null, $this->phone_extra->ReadOnly);

            // mobile_extra
            $this->mobile_extra->setDbValueDef($rsnew, $this->mobile_extra->CurrentValue, null, $this->mobile_extra->ReadOnly);

            // fax_extra
            $this->fax_extra->setDbValueDef($rsnew, $this->fax_extra->CurrentValue, null, $this->fax_extra->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);

            // Check for duplicate key when key changed
            if ($updateRow) {
                $newKeyFilter = $this->getRecordFilter($rsnew);
                if ($newKeyFilter != $oldKeyFilter) {
                    $rsChk = $this->loadRs($newKeyFilter)->fetch();
                    if ($rsChk !== false) {
                        $keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
                        $this->setFailureMessage($keyErrMsg);
                        $updateRow = false;
                    }
                }
            }
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmLeadaddressList"), "", $this->TableVar, true);
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
