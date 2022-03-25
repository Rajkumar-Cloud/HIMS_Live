<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresTradenamesNewAdd extends PresTradenamesNew
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_tradenames_new';

    // Page object name
    public $PageObjName = "PresTradenamesNewAdd";

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

        // Table object (pres_tradenames_new)
        if (!isset($GLOBALS["pres_tradenames_new"]) || get_class($GLOBALS["pres_tradenames_new"]) == PROJECT_NAMESPACE . "pres_tradenames_new") {
            $GLOBALS["pres_tradenames_new"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_tradenames_new');
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
                $doc = new $class(Container("pres_tradenames_new"));
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
                    if ($pageName == "PresTradenamesNewView") {
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
            $key .= @$ar['ID'];
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
        $this->ID->Visible = false;
        $this->Drug_Name->setVisibility();
        $this->Generic_Name->setVisibility();
        $this->Trade_Name->setVisibility();
        $this->PR_CODE->setVisibility();
        $this->Form->setVisibility();
        $this->Strength->setVisibility();
        $this->Unit->setVisibility();
        $this->CONTAINER_TYPE->setVisibility();
        $this->CONTAINER_STRENGTH->setVisibility();
        $this->TypeOfDrug->setVisibility();
        $this->ProductType->setVisibility();
        $this->Generic_Name1->setVisibility();
        $this->Strength1->setVisibility();
        $this->Unit1->setVisibility();
        $this->Generic_Name2->setVisibility();
        $this->Strength2->setVisibility();
        $this->Unit2->setVisibility();
        $this->Generic_Name3->setVisibility();
        $this->Strength3->setVisibility();
        $this->Unit3->setVisibility();
        $this->Generic_Name4->setVisibility();
        $this->Generic_Name5->setVisibility();
        $this->Strength4->setVisibility();
        $this->Strength5->setVisibility();
        $this->Unit4->setVisibility();
        $this->Unit5->setVisibility();
        $this->AlterNative1->setVisibility();
        $this->AlterNative2->setVisibility();
        $this->AlterNative3->setVisibility();
        $this->AlterNative4->setVisibility();
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
        $this->setupLookupOptions($this->Generic_Name);
        $this->setupLookupOptions($this->Form);
        $this->setupLookupOptions($this->Unit);
        $this->setupLookupOptions($this->Generic_Name1);
        $this->setupLookupOptions($this->Unit1);
        $this->setupLookupOptions($this->Generic_Name2);
        $this->setupLookupOptions($this->Unit2);
        $this->setupLookupOptions($this->Generic_Name3);
        $this->setupLookupOptions($this->Unit3);
        $this->setupLookupOptions($this->Generic_Name4);
        $this->setupLookupOptions($this->Generic_Name5);
        $this->setupLookupOptions($this->Unit4);
        $this->setupLookupOptions($this->Unit5);
        $this->setupLookupOptions($this->AlterNative1);
        $this->setupLookupOptions($this->AlterNative2);
        $this->setupLookupOptions($this->AlterNative3);
        $this->setupLookupOptions($this->AlterNative4);

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
            if (($keyValue = Get("ID") ?? Route("ID")) !== null) {
                $this->ID->setQueryStringValue($keyValue);
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

        // Set up detail parameters
        $this->setupDetailParms();

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
                    $this->terminate("PresTradenamesNewList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    if ($this->getCurrentDetailTable() != "") { // Master/detail add
                        $returnUrl = $this->getDetailUrl();
                    } else {
                        $returnUrl = $this->getReturnUrl();
                    }
                    if (GetPageName($returnUrl) == "PresTradenamesNewList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PresTradenamesNewView") {
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

                    // Set up detail parameters
                    $this->setupDetailParms();
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
        $this->ID->CurrentValue = null;
        $this->ID->OldValue = $this->ID->CurrentValue;
        $this->Drug_Name->CurrentValue = null;
        $this->Drug_Name->OldValue = $this->Drug_Name->CurrentValue;
        $this->Generic_Name->CurrentValue = null;
        $this->Generic_Name->OldValue = $this->Generic_Name->CurrentValue;
        $this->Trade_Name->CurrentValue = null;
        $this->Trade_Name->OldValue = $this->Trade_Name->CurrentValue;
        $this->PR_CODE->CurrentValue = null;
        $this->PR_CODE->OldValue = $this->PR_CODE->CurrentValue;
        $this->Form->CurrentValue = null;
        $this->Form->OldValue = $this->Form->CurrentValue;
        $this->Strength->CurrentValue = null;
        $this->Strength->OldValue = $this->Strength->CurrentValue;
        $this->Unit->CurrentValue = null;
        $this->Unit->OldValue = $this->Unit->CurrentValue;
        $this->CONTAINER_TYPE->CurrentValue = null;
        $this->CONTAINER_TYPE->OldValue = $this->CONTAINER_TYPE->CurrentValue;
        $this->CONTAINER_STRENGTH->CurrentValue = null;
        $this->CONTAINER_STRENGTH->OldValue = $this->CONTAINER_STRENGTH->CurrentValue;
        $this->TypeOfDrug->CurrentValue = null;
        $this->TypeOfDrug->OldValue = $this->TypeOfDrug->CurrentValue;
        $this->ProductType->CurrentValue = null;
        $this->ProductType->OldValue = $this->ProductType->CurrentValue;
        $this->Generic_Name1->CurrentValue = null;
        $this->Generic_Name1->OldValue = $this->Generic_Name1->CurrentValue;
        $this->Strength1->CurrentValue = null;
        $this->Strength1->OldValue = $this->Strength1->CurrentValue;
        $this->Unit1->CurrentValue = null;
        $this->Unit1->OldValue = $this->Unit1->CurrentValue;
        $this->Generic_Name2->CurrentValue = null;
        $this->Generic_Name2->OldValue = $this->Generic_Name2->CurrentValue;
        $this->Strength2->CurrentValue = null;
        $this->Strength2->OldValue = $this->Strength2->CurrentValue;
        $this->Unit2->CurrentValue = null;
        $this->Unit2->OldValue = $this->Unit2->CurrentValue;
        $this->Generic_Name3->CurrentValue = null;
        $this->Generic_Name3->OldValue = $this->Generic_Name3->CurrentValue;
        $this->Strength3->CurrentValue = null;
        $this->Strength3->OldValue = $this->Strength3->CurrentValue;
        $this->Unit3->CurrentValue = null;
        $this->Unit3->OldValue = $this->Unit3->CurrentValue;
        $this->Generic_Name4->CurrentValue = null;
        $this->Generic_Name4->OldValue = $this->Generic_Name4->CurrentValue;
        $this->Generic_Name5->CurrentValue = null;
        $this->Generic_Name5->OldValue = $this->Generic_Name5->CurrentValue;
        $this->Strength4->CurrentValue = null;
        $this->Strength4->OldValue = $this->Strength4->CurrentValue;
        $this->Strength5->CurrentValue = null;
        $this->Strength5->OldValue = $this->Strength5->CurrentValue;
        $this->Unit4->CurrentValue = null;
        $this->Unit4->OldValue = $this->Unit4->CurrentValue;
        $this->Unit5->CurrentValue = null;
        $this->Unit5->OldValue = $this->Unit5->CurrentValue;
        $this->AlterNative1->CurrentValue = null;
        $this->AlterNative1->OldValue = $this->AlterNative1->CurrentValue;
        $this->AlterNative2->CurrentValue = null;
        $this->AlterNative2->OldValue = $this->AlterNative2->CurrentValue;
        $this->AlterNative3->CurrentValue = null;
        $this->AlterNative3->OldValue = $this->AlterNative3->CurrentValue;
        $this->AlterNative4->CurrentValue = null;
        $this->AlterNative4->OldValue = $this->AlterNative4->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Drug_Name' first before field var 'x_Drug_Name'
        $val = $CurrentForm->hasValue("Drug_Name") ? $CurrentForm->getValue("Drug_Name") : $CurrentForm->getValue("x_Drug_Name");
        if (!$this->Drug_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Drug_Name->Visible = false; // Disable update for API request
            } else {
                $this->Drug_Name->setFormValue($val);
            }
        }

        // Check field name 'Generic_Name' first before field var 'x_Generic_Name'
        $val = $CurrentForm->hasValue("Generic_Name") ? $CurrentForm->getValue("Generic_Name") : $CurrentForm->getValue("x_Generic_Name");
        if (!$this->Generic_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name->setFormValue($val);
            }
        }

        // Check field name 'Trade_Name' first before field var 'x_Trade_Name'
        $val = $CurrentForm->hasValue("Trade_Name") ? $CurrentForm->getValue("Trade_Name") : $CurrentForm->getValue("x_Trade_Name");
        if (!$this->Trade_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Trade_Name->Visible = false; // Disable update for API request
            } else {
                $this->Trade_Name->setFormValue($val);
            }
        }

        // Check field name 'PR_CODE' first before field var 'x_PR_CODE'
        $val = $CurrentForm->hasValue("PR_CODE") ? $CurrentForm->getValue("PR_CODE") : $CurrentForm->getValue("x_PR_CODE");
        if (!$this->PR_CODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PR_CODE->Visible = false; // Disable update for API request
            } else {
                $this->PR_CODE->setFormValue($val);
            }
        }

        // Check field name 'Form' first before field var 'x_Form'
        $val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
        if (!$this->Form->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Form->Visible = false; // Disable update for API request
            } else {
                $this->Form->setFormValue($val);
            }
        }

        // Check field name 'Strength' first before field var 'x_Strength'
        $val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
        if (!$this->Strength->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength->Visible = false; // Disable update for API request
            } else {
                $this->Strength->setFormValue($val);
            }
        }

        // Check field name 'Unit' first before field var 'x_Unit'
        $val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
        if (!$this->Unit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit->Visible = false; // Disable update for API request
            } else {
                $this->Unit->setFormValue($val);
            }
        }

        // Check field name 'CONTAINER_TYPE' first before field var 'x_CONTAINER_TYPE'
        $val = $CurrentForm->hasValue("CONTAINER_TYPE") ? $CurrentForm->getValue("CONTAINER_TYPE") : $CurrentForm->getValue("x_CONTAINER_TYPE");
        if (!$this->CONTAINER_TYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CONTAINER_TYPE->Visible = false; // Disable update for API request
            } else {
                $this->CONTAINER_TYPE->setFormValue($val);
            }
        }

        // Check field name 'CONTAINER_STRENGTH' first before field var 'x_CONTAINER_STRENGTH'
        $val = $CurrentForm->hasValue("CONTAINER_STRENGTH") ? $CurrentForm->getValue("CONTAINER_STRENGTH") : $CurrentForm->getValue("x_CONTAINER_STRENGTH");
        if (!$this->CONTAINER_STRENGTH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CONTAINER_STRENGTH->Visible = false; // Disable update for API request
            } else {
                $this->CONTAINER_STRENGTH->setFormValue($val);
            }
        }

        // Check field name 'TypeOfDrug' first before field var 'x_TypeOfDrug'
        $val = $CurrentForm->hasValue("TypeOfDrug") ? $CurrentForm->getValue("TypeOfDrug") : $CurrentForm->getValue("x_TypeOfDrug");
        if (!$this->TypeOfDrug->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeOfDrug->Visible = false; // Disable update for API request
            } else {
                $this->TypeOfDrug->setFormValue($val);
            }
        }

        // Check field name 'ProductType' first before field var 'x_ProductType'
        $val = $CurrentForm->hasValue("ProductType") ? $CurrentForm->getValue("ProductType") : $CurrentForm->getValue("x_ProductType");
        if (!$this->ProductType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProductType->Visible = false; // Disable update for API request
            } else {
                $this->ProductType->setFormValue($val);
            }
        }

        // Check field name 'Generic_Name1' first before field var 'x_Generic_Name1'
        $val = $CurrentForm->hasValue("Generic_Name1") ? $CurrentForm->getValue("Generic_Name1") : $CurrentForm->getValue("x_Generic_Name1");
        if (!$this->Generic_Name1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name1->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name1->setFormValue($val);
            }
        }

        // Check field name 'Strength1' first before field var 'x_Strength1'
        $val = $CurrentForm->hasValue("Strength1") ? $CurrentForm->getValue("Strength1") : $CurrentForm->getValue("x_Strength1");
        if (!$this->Strength1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength1->Visible = false; // Disable update for API request
            } else {
                $this->Strength1->setFormValue($val);
            }
        }

        // Check field name 'Unit1' first before field var 'x_Unit1'
        $val = $CurrentForm->hasValue("Unit1") ? $CurrentForm->getValue("Unit1") : $CurrentForm->getValue("x_Unit1");
        if (!$this->Unit1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit1->Visible = false; // Disable update for API request
            } else {
                $this->Unit1->setFormValue($val);
            }
        }

        // Check field name 'Generic_Name2' first before field var 'x_Generic_Name2'
        $val = $CurrentForm->hasValue("Generic_Name2") ? $CurrentForm->getValue("Generic_Name2") : $CurrentForm->getValue("x_Generic_Name2");
        if (!$this->Generic_Name2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name2->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name2->setFormValue($val);
            }
        }

        // Check field name 'Strength2' first before field var 'x_Strength2'
        $val = $CurrentForm->hasValue("Strength2") ? $CurrentForm->getValue("Strength2") : $CurrentForm->getValue("x_Strength2");
        if (!$this->Strength2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength2->Visible = false; // Disable update for API request
            } else {
                $this->Strength2->setFormValue($val);
            }
        }

        // Check field name 'Unit2' first before field var 'x_Unit2'
        $val = $CurrentForm->hasValue("Unit2") ? $CurrentForm->getValue("Unit2") : $CurrentForm->getValue("x_Unit2");
        if (!$this->Unit2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit2->Visible = false; // Disable update for API request
            } else {
                $this->Unit2->setFormValue($val);
            }
        }

        // Check field name 'Generic_Name3' first before field var 'x_Generic_Name3'
        $val = $CurrentForm->hasValue("Generic_Name3") ? $CurrentForm->getValue("Generic_Name3") : $CurrentForm->getValue("x_Generic_Name3");
        if (!$this->Generic_Name3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name3->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name3->setFormValue($val);
            }
        }

        // Check field name 'Strength3' first before field var 'x_Strength3'
        $val = $CurrentForm->hasValue("Strength3") ? $CurrentForm->getValue("Strength3") : $CurrentForm->getValue("x_Strength3");
        if (!$this->Strength3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength3->Visible = false; // Disable update for API request
            } else {
                $this->Strength3->setFormValue($val);
            }
        }

        // Check field name 'Unit3' first before field var 'x_Unit3'
        $val = $CurrentForm->hasValue("Unit3") ? $CurrentForm->getValue("Unit3") : $CurrentForm->getValue("x_Unit3");
        if (!$this->Unit3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit3->Visible = false; // Disable update for API request
            } else {
                $this->Unit3->setFormValue($val);
            }
        }

        // Check field name 'Generic_Name4' first before field var 'x_Generic_Name4'
        $val = $CurrentForm->hasValue("Generic_Name4") ? $CurrentForm->getValue("Generic_Name4") : $CurrentForm->getValue("x_Generic_Name4");
        if (!$this->Generic_Name4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name4->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name4->setFormValue($val);
            }
        }

        // Check field name 'Generic_Name5' first before field var 'x_Generic_Name5'
        $val = $CurrentForm->hasValue("Generic_Name5") ? $CurrentForm->getValue("Generic_Name5") : $CurrentForm->getValue("x_Generic_Name5");
        if (!$this->Generic_Name5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name5->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name5->setFormValue($val);
            }
        }

        // Check field name 'Strength4' first before field var 'x_Strength4'
        $val = $CurrentForm->hasValue("Strength4") ? $CurrentForm->getValue("Strength4") : $CurrentForm->getValue("x_Strength4");
        if (!$this->Strength4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength4->Visible = false; // Disable update for API request
            } else {
                $this->Strength4->setFormValue($val);
            }
        }

        // Check field name 'Strength5' first before field var 'x_Strength5'
        $val = $CurrentForm->hasValue("Strength5") ? $CurrentForm->getValue("Strength5") : $CurrentForm->getValue("x_Strength5");
        if (!$this->Strength5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength5->Visible = false; // Disable update for API request
            } else {
                $this->Strength5->setFormValue($val);
            }
        }

        // Check field name 'Unit4' first before field var 'x_Unit4'
        $val = $CurrentForm->hasValue("Unit4") ? $CurrentForm->getValue("Unit4") : $CurrentForm->getValue("x_Unit4");
        if (!$this->Unit4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit4->Visible = false; // Disable update for API request
            } else {
                $this->Unit4->setFormValue($val);
            }
        }

        // Check field name 'Unit5' first before field var 'x_Unit5'
        $val = $CurrentForm->hasValue("Unit5") ? $CurrentForm->getValue("Unit5") : $CurrentForm->getValue("x_Unit5");
        if (!$this->Unit5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit5->Visible = false; // Disable update for API request
            } else {
                $this->Unit5->setFormValue($val);
            }
        }

        // Check field name 'AlterNative1' first before field var 'x_AlterNative1'
        $val = $CurrentForm->hasValue("AlterNative1") ? $CurrentForm->getValue("AlterNative1") : $CurrentForm->getValue("x_AlterNative1");
        if (!$this->AlterNative1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlterNative1->Visible = false; // Disable update for API request
            } else {
                $this->AlterNative1->setFormValue($val);
            }
        }

        // Check field name 'AlterNative2' first before field var 'x_AlterNative2'
        $val = $CurrentForm->hasValue("AlterNative2") ? $CurrentForm->getValue("AlterNative2") : $CurrentForm->getValue("x_AlterNative2");
        if (!$this->AlterNative2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlterNative2->Visible = false; // Disable update for API request
            } else {
                $this->AlterNative2->setFormValue($val);
            }
        }

        // Check field name 'AlterNative3' first before field var 'x_AlterNative3'
        $val = $CurrentForm->hasValue("AlterNative3") ? $CurrentForm->getValue("AlterNative3") : $CurrentForm->getValue("x_AlterNative3");
        if (!$this->AlterNative3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlterNative3->Visible = false; // Disable update for API request
            } else {
                $this->AlterNative3->setFormValue($val);
            }
        }

        // Check field name 'AlterNative4' first before field var 'x_AlterNative4'
        $val = $CurrentForm->hasValue("AlterNative4") ? $CurrentForm->getValue("AlterNative4") : $CurrentForm->getValue("x_AlterNative4");
        if (!$this->AlterNative4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AlterNative4->Visible = false; // Disable update for API request
            } else {
                $this->AlterNative4->setFormValue($val);
            }
        }

        // Check field name 'ID' first before field var 'x_ID'
        $val = $CurrentForm->hasValue("ID") ? $CurrentForm->getValue("ID") : $CurrentForm->getValue("x_ID");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Drug_Name->CurrentValue = $this->Drug_Name->FormValue;
        $this->Generic_Name->CurrentValue = $this->Generic_Name->FormValue;
        $this->Trade_Name->CurrentValue = $this->Trade_Name->FormValue;
        $this->PR_CODE->CurrentValue = $this->PR_CODE->FormValue;
        $this->Form->CurrentValue = $this->Form->FormValue;
        $this->Strength->CurrentValue = $this->Strength->FormValue;
        $this->Unit->CurrentValue = $this->Unit->FormValue;
        $this->CONTAINER_TYPE->CurrentValue = $this->CONTAINER_TYPE->FormValue;
        $this->CONTAINER_STRENGTH->CurrentValue = $this->CONTAINER_STRENGTH->FormValue;
        $this->TypeOfDrug->CurrentValue = $this->TypeOfDrug->FormValue;
        $this->ProductType->CurrentValue = $this->ProductType->FormValue;
        $this->Generic_Name1->CurrentValue = $this->Generic_Name1->FormValue;
        $this->Strength1->CurrentValue = $this->Strength1->FormValue;
        $this->Unit1->CurrentValue = $this->Unit1->FormValue;
        $this->Generic_Name2->CurrentValue = $this->Generic_Name2->FormValue;
        $this->Strength2->CurrentValue = $this->Strength2->FormValue;
        $this->Unit2->CurrentValue = $this->Unit2->FormValue;
        $this->Generic_Name3->CurrentValue = $this->Generic_Name3->FormValue;
        $this->Strength3->CurrentValue = $this->Strength3->FormValue;
        $this->Unit3->CurrentValue = $this->Unit3->FormValue;
        $this->Generic_Name4->CurrentValue = $this->Generic_Name4->FormValue;
        $this->Generic_Name5->CurrentValue = $this->Generic_Name5->FormValue;
        $this->Strength4->CurrentValue = $this->Strength4->FormValue;
        $this->Strength5->CurrentValue = $this->Strength5->FormValue;
        $this->Unit4->CurrentValue = $this->Unit4->FormValue;
        $this->Unit5->CurrentValue = $this->Unit5->FormValue;
        $this->AlterNative1->CurrentValue = $this->AlterNative1->FormValue;
        $this->AlterNative2->CurrentValue = $this->AlterNative2->FormValue;
        $this->AlterNative3->CurrentValue = $this->AlterNative3->FormValue;
        $this->AlterNative4->CurrentValue = $this->AlterNative4->FormValue;
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
        $this->ID->setDbValue($row['ID']);
        $this->Drug_Name->setDbValue($row['Drug_Name']);
        $this->Generic_Name->setDbValue($row['Generic_Name']);
        $this->Trade_Name->setDbValue($row['Trade_Name']);
        $this->PR_CODE->setDbValue($row['PR_CODE']);
        $this->Form->setDbValue($row['Form']);
        $this->Strength->setDbValue($row['Strength']);
        $this->Unit->setDbValue($row['Unit']);
        $this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
        $this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
        $this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
        $this->ProductType->setDbValue($row['ProductType']);
        $this->Generic_Name1->setDbValue($row['Generic_Name1']);
        $this->Strength1->setDbValue($row['Strength1']);
        $this->Unit1->setDbValue($row['Unit1']);
        $this->Generic_Name2->setDbValue($row['Generic_Name2']);
        $this->Strength2->setDbValue($row['Strength2']);
        $this->Unit2->setDbValue($row['Unit2']);
        $this->Generic_Name3->setDbValue($row['Generic_Name3']);
        $this->Strength3->setDbValue($row['Strength3']);
        $this->Unit3->setDbValue($row['Unit3']);
        $this->Generic_Name4->setDbValue($row['Generic_Name4']);
        $this->Generic_Name5->setDbValue($row['Generic_Name5']);
        $this->Strength4->setDbValue($row['Strength4']);
        $this->Strength5->setDbValue($row['Strength5']);
        $this->Unit4->setDbValue($row['Unit4']);
        $this->Unit5->setDbValue($row['Unit5']);
        $this->AlterNative1->setDbValue($row['AlterNative1']);
        $this->AlterNative2->setDbValue($row['AlterNative2']);
        $this->AlterNative3->setDbValue($row['AlterNative3']);
        $this->AlterNative4->setDbValue($row['AlterNative4']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ID'] = $this->ID->CurrentValue;
        $row['Drug_Name'] = $this->Drug_Name->CurrentValue;
        $row['Generic_Name'] = $this->Generic_Name->CurrentValue;
        $row['Trade_Name'] = $this->Trade_Name->CurrentValue;
        $row['PR_CODE'] = $this->PR_CODE->CurrentValue;
        $row['Form'] = $this->Form->CurrentValue;
        $row['Strength'] = $this->Strength->CurrentValue;
        $row['Unit'] = $this->Unit->CurrentValue;
        $row['CONTAINER_TYPE'] = $this->CONTAINER_TYPE->CurrentValue;
        $row['CONTAINER_STRENGTH'] = $this->CONTAINER_STRENGTH->CurrentValue;
        $row['TypeOfDrug'] = $this->TypeOfDrug->CurrentValue;
        $row['ProductType'] = $this->ProductType->CurrentValue;
        $row['Generic_Name1'] = $this->Generic_Name1->CurrentValue;
        $row['Strength1'] = $this->Strength1->CurrentValue;
        $row['Unit1'] = $this->Unit1->CurrentValue;
        $row['Generic_Name2'] = $this->Generic_Name2->CurrentValue;
        $row['Strength2'] = $this->Strength2->CurrentValue;
        $row['Unit2'] = $this->Unit2->CurrentValue;
        $row['Generic_Name3'] = $this->Generic_Name3->CurrentValue;
        $row['Strength3'] = $this->Strength3->CurrentValue;
        $row['Unit3'] = $this->Unit3->CurrentValue;
        $row['Generic_Name4'] = $this->Generic_Name4->CurrentValue;
        $row['Generic_Name5'] = $this->Generic_Name5->CurrentValue;
        $row['Strength4'] = $this->Strength4->CurrentValue;
        $row['Strength5'] = $this->Strength5->CurrentValue;
        $row['Unit4'] = $this->Unit4->CurrentValue;
        $row['Unit5'] = $this->Unit5->CurrentValue;
        $row['AlterNative1'] = $this->AlterNative1->CurrentValue;
        $row['AlterNative2'] = $this->AlterNative2->CurrentValue;
        $row['AlterNative3'] = $this->AlterNative3->CurrentValue;
        $row['AlterNative4'] = $this->AlterNative4->CurrentValue;
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

        // ID

        // Drug_Name

        // Generic_Name

        // Trade_Name

        // PR_CODE

        // Form

        // Strength

        // Unit

        // CONTAINER_TYPE

        // CONTAINER_STRENGTH

        // TypeOfDrug

        // ProductType

        // Generic_Name1

        // Strength1

        // Unit1

        // Generic_Name2

        // Strength2

        // Unit2

        // Generic_Name3

        // Strength3

        // Unit3

        // Generic_Name4

        // Generic_Name5

        // Strength4

        // Strength5

        // Unit4

        // Unit5

        // AlterNative1

        // AlterNative2

        // AlterNative3

        // AlterNative4
        if ($this->RowType == ROWTYPE_VIEW) {
            // ID
            $this->ID->ViewValue = $this->ID->CurrentValue;
            $this->ID->ViewCustomAttributes = "";

            // Drug_Name
            $this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
            $this->Drug_Name->ViewCustomAttributes = "";

            // Generic_Name
            $curVal = trim(strval($this->Generic_Name->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
                if ($this->Generic_Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
                    } else {
                        $this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name->ViewValue = null;
            }
            $this->Generic_Name->ViewCustomAttributes = "";

            // Trade_Name
            $this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
            $this->Trade_Name->ViewCustomAttributes = "";

            // PR_CODE
            $this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
            $this->PR_CODE->ViewCustomAttributes = "";

            // Form
            $curVal = trim(strval($this->Form->CurrentValue));
            if ($curVal != "") {
                $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
                if ($this->Form->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Form->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Form->Lookup->renderViewRow($rswrk[0]);
                        $this->Form->ViewValue = $this->Form->displayValue($arwrk);
                    } else {
                        $this->Form->ViewValue = $this->Form->CurrentValue;
                    }
                }
            } else {
                $this->Form->ViewValue = null;
            }
            $this->Form->ViewCustomAttributes = "";

            // Strength
            $this->Strength->ViewValue = $this->Strength->CurrentValue;
            $this->Strength->ViewCustomAttributes = "";

            // Unit
            $curVal = trim(strval($this->Unit->CurrentValue));
            if ($curVal != "") {
                $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
                if ($this->Unit->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
                    } else {
                        $this->Unit->ViewValue = $this->Unit->CurrentValue;
                    }
                }
            } else {
                $this->Unit->ViewValue = null;
            }
            $this->Unit->ViewCustomAttributes = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
            $this->CONTAINER_TYPE->ViewCustomAttributes = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
            $this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

            // TypeOfDrug
            if (strval($this->TypeOfDrug->CurrentValue) != "") {
                $this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
            } else {
                $this->TypeOfDrug->ViewValue = null;
            }
            $this->TypeOfDrug->ViewCustomAttributes = "";

            // ProductType
            if (strval($this->ProductType->CurrentValue) != "") {
                $this->ProductType->ViewValue = $this->ProductType->optionCaption($this->ProductType->CurrentValue);
            } else {
                $this->ProductType->ViewValue = null;
            }
            $this->ProductType->ViewCustomAttributes = "";

            // Generic_Name1
            $curVal = trim(strval($this->Generic_Name1->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
                if ($this->Generic_Name1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name1->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
                    } else {
                        $this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name1->ViewValue = null;
            }
            $this->Generic_Name1->ViewCustomAttributes = "";

            // Strength1
            $this->Strength1->ViewValue = $this->Strength1->CurrentValue;
            $this->Strength1->ViewCustomAttributes = "";

            // Unit1
            $curVal = trim(strval($this->Unit1->CurrentValue));
            if ($curVal != "") {
                $this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
                if ($this->Unit1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit1->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit1->ViewValue = $this->Unit1->displayValue($arwrk);
                    } else {
                        $this->Unit1->ViewValue = $this->Unit1->CurrentValue;
                    }
                }
            } else {
                $this->Unit1->ViewValue = null;
            }
            $this->Unit1->ViewCustomAttributes = "";

            // Generic_Name2
            $curVal = trim(strval($this->Generic_Name2->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
                if ($this->Generic_Name2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name2->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
                    } else {
                        $this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name2->ViewValue = null;
            }
            $this->Generic_Name2->ViewCustomAttributes = "";

            // Strength2
            $this->Strength2->ViewValue = $this->Strength2->CurrentValue;
            $this->Strength2->ViewCustomAttributes = "";

            // Unit2
            $curVal = trim(strval($this->Unit2->CurrentValue));
            if ($curVal != "") {
                $this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
                if ($this->Unit2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit2->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit2->ViewValue = $this->Unit2->displayValue($arwrk);
                    } else {
                        $this->Unit2->ViewValue = $this->Unit2->CurrentValue;
                    }
                }
            } else {
                $this->Unit2->ViewValue = null;
            }
            $this->Unit2->ViewCustomAttributes = "";

            // Generic_Name3
            $curVal = trim(strval($this->Generic_Name3->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
                if ($this->Generic_Name3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name3->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
                    } else {
                        $this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name3->ViewValue = null;
            }
            $this->Generic_Name3->ViewCustomAttributes = "";

            // Strength3
            $this->Strength3->ViewValue = $this->Strength3->CurrentValue;
            $this->Strength3->ViewCustomAttributes = "";

            // Unit3
            $curVal = trim(strval($this->Unit3->CurrentValue));
            if ($curVal != "") {
                $this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
                if ($this->Unit3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit3->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit3->ViewValue = $this->Unit3->displayValue($arwrk);
                    } else {
                        $this->Unit3->ViewValue = $this->Unit3->CurrentValue;
                    }
                }
            } else {
                $this->Unit3->ViewValue = null;
            }
            $this->Unit3->ViewCustomAttributes = "";

            // Generic_Name4
            $curVal = trim(strval($this->Generic_Name4->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
                if ($this->Generic_Name4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name4->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
                    } else {
                        $this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name4->ViewValue = null;
            }
            $this->Generic_Name4->ViewCustomAttributes = "";

            // Generic_Name5
            $curVal = trim(strval($this->Generic_Name5->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
                if ($this->Generic_Name5->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name5->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
                    } else {
                        $this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name5->ViewValue = null;
            }
            $this->Generic_Name5->ViewCustomAttributes = "";

            // Strength4
            $this->Strength4->ViewValue = $this->Strength4->CurrentValue;
            $this->Strength4->ViewCustomAttributes = "";

            // Strength5
            $this->Strength5->ViewValue = $this->Strength5->CurrentValue;
            $this->Strength5->ViewCustomAttributes = "";

            // Unit4
            $curVal = trim(strval($this->Unit4->CurrentValue));
            if ($curVal != "") {
                $this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
                if ($this->Unit4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit4->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit4->ViewValue = $this->Unit4->displayValue($arwrk);
                    } else {
                        $this->Unit4->ViewValue = $this->Unit4->CurrentValue;
                    }
                }
            } else {
                $this->Unit4->ViewValue = null;
            }
            $this->Unit4->ViewCustomAttributes = "";

            // Unit5
            $curVal = trim(strval($this->Unit5->CurrentValue));
            if ($curVal != "") {
                $this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
                if ($this->Unit5->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit5->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit5->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit5->ViewValue = $this->Unit5->displayValue($arwrk);
                    } else {
                        $this->Unit5->ViewValue = $this->Unit5->CurrentValue;
                    }
                }
            } else {
                $this->Unit5->ViewValue = null;
            }
            $this->Unit5->ViewCustomAttributes = "";

            // AlterNative1
            $curVal = trim(strval($this->AlterNative1->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
                if ($this->AlterNative1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative1->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
                    } else {
                        $this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative1->ViewValue = null;
            }
            $this->AlterNative1->ViewCustomAttributes = "";

            // AlterNative2
            $curVal = trim(strval($this->AlterNative2->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
                if ($this->AlterNative2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative2->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
                    } else {
                        $this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative2->ViewValue = null;
            }
            $this->AlterNative2->ViewCustomAttributes = "";

            // AlterNative3
            $curVal = trim(strval($this->AlterNative3->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
                if ($this->AlterNative3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative3->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
                    } else {
                        $this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative3->ViewValue = null;
            }
            $this->AlterNative3->ViewCustomAttributes = "";

            // AlterNative4
            $curVal = trim(strval($this->AlterNative4->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
                if ($this->AlterNative4->ViewValue === null) { // Lookup from database
                    $filterWrk = "`ID`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->AlterNative4->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AlterNative4->Lookup->renderViewRow($rswrk[0]);
                        $this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
                    } else {
                        $this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
                    }
                }
            } else {
                $this->AlterNative4->ViewValue = null;
            }
            $this->AlterNative4->ViewCustomAttributes = "";

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";
            $this->Drug_Name->TooltipValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";
            $this->Generic_Name->TooltipValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";
            $this->Trade_Name->TooltipValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";
            $this->PR_CODE->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";
            $this->Strength->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->LinkCustomAttributes = "";
            $this->CONTAINER_TYPE->HrefValue = "";
            $this->CONTAINER_TYPE->TooltipValue = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
            $this->CONTAINER_STRENGTH->HrefValue = "";
            $this->CONTAINER_STRENGTH->TooltipValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";
            $this->TypeOfDrug->TooltipValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";
            $this->ProductType->TooltipValue = "";

            // Generic_Name1
            $this->Generic_Name1->LinkCustomAttributes = "";
            $this->Generic_Name1->HrefValue = "";
            $this->Generic_Name1->TooltipValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";
            $this->Strength1->TooltipValue = "";

            // Unit1
            $this->Unit1->LinkCustomAttributes = "";
            $this->Unit1->HrefValue = "";
            $this->Unit1->TooltipValue = "";

            // Generic_Name2
            $this->Generic_Name2->LinkCustomAttributes = "";
            $this->Generic_Name2->HrefValue = "";
            $this->Generic_Name2->TooltipValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";
            $this->Strength2->TooltipValue = "";

            // Unit2
            $this->Unit2->LinkCustomAttributes = "";
            $this->Unit2->HrefValue = "";
            $this->Unit2->TooltipValue = "";

            // Generic_Name3
            $this->Generic_Name3->LinkCustomAttributes = "";
            $this->Generic_Name3->HrefValue = "";
            $this->Generic_Name3->TooltipValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";
            $this->Strength3->TooltipValue = "";

            // Unit3
            $this->Unit3->LinkCustomAttributes = "";
            $this->Unit3->HrefValue = "";
            $this->Unit3->TooltipValue = "";

            // Generic_Name4
            $this->Generic_Name4->LinkCustomAttributes = "";
            $this->Generic_Name4->HrefValue = "";
            $this->Generic_Name4->TooltipValue = "";

            // Generic_Name5
            $this->Generic_Name5->LinkCustomAttributes = "";
            $this->Generic_Name5->HrefValue = "";
            $this->Generic_Name5->TooltipValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";
            $this->Strength4->TooltipValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";
            $this->Strength5->TooltipValue = "";

            // Unit4
            $this->Unit4->LinkCustomAttributes = "";
            $this->Unit4->HrefValue = "";
            $this->Unit4->TooltipValue = "";

            // Unit5
            $this->Unit5->LinkCustomAttributes = "";
            $this->Unit5->HrefValue = "";
            $this->Unit5->TooltipValue = "";

            // AlterNative1
            $this->AlterNative1->LinkCustomAttributes = "";
            $this->AlterNative1->HrefValue = "";
            $this->AlterNative1->TooltipValue = "";

            // AlterNative2
            $this->AlterNative2->LinkCustomAttributes = "";
            $this->AlterNative2->HrefValue = "";
            $this->AlterNative2->TooltipValue = "";

            // AlterNative3
            $this->AlterNative3->LinkCustomAttributes = "";
            $this->AlterNative3->HrefValue = "";
            $this->AlterNative3->TooltipValue = "";

            // AlterNative4
            $this->AlterNative4->LinkCustomAttributes = "";
            $this->AlterNative4->HrefValue = "";
            $this->AlterNative4->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Drug_Name
            $this->Drug_Name->EditAttrs["class"] = "form-control";
            $this->Drug_Name->EditCustomAttributes = "";
            if (!$this->Drug_Name->Raw) {
                $this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
            }
            $this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->CurrentValue);
            $this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

            // Generic_Name
            $this->Generic_Name->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name->ViewValue = $this->Generic_Name->Lookup !== null && is_array($this->Generic_Name->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name->ViewValue !== null) { // Load from cache
                $this->Generic_Name->EditValue = array_values($this->Generic_Name->Lookup->Options);
                if ($this->Generic_Name->ViewValue == "") {
                    $this->Generic_Name->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
                } else {
                    $this->Generic_Name->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Generic_Name->EditValue = $arwrk;
            }
            $this->Generic_Name->PlaceHolder = RemoveHtml($this->Generic_Name->caption());

            // Trade_Name
            $this->Trade_Name->EditAttrs["class"] = "form-control";
            $this->Trade_Name->EditCustomAttributes = "";
            if (!$this->Trade_Name->Raw) {
                $this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
            }
            $this->Trade_Name->EditValue = HtmlEncode($this->Trade_Name->CurrentValue);
            $this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

            // PR_CODE
            $this->PR_CODE->EditAttrs["class"] = "form-control";
            $this->PR_CODE->EditCustomAttributes = "";
            if (!$this->PR_CODE->Raw) {
                $this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
            }
            $this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->CurrentValue);
            $this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            $curVal = trim(strval($this->Form->CurrentValue));
            if ($curVal != "") {
                $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
            } else {
                $this->Form->ViewValue = $this->Form->Lookup !== null && is_array($this->Form->Lookup->Options) ? $curVal : null;
            }
            if ($this->Form->ViewValue !== null) { // Load from cache
                $this->Form->EditValue = array_values($this->Form->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Forms`" . SearchString("=", $this->Form->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Form->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Form->EditValue = $arwrk;
            }
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // Strength
            $this->Strength->EditAttrs["class"] = "form-control";
            $this->Strength->EditCustomAttributes = "";
            if (!$this->Strength->Raw) {
                $this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
            }
            $this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
            $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit->CurrentValue));
            if ($curVal != "") {
                $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
            } else {
                $this->Unit->ViewValue = $this->Unit->Lookup !== null && is_array($this->Unit->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit->ViewValue !== null) { // Load from cache
                $this->Unit->EditValue = array_values($this->Unit->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit->EditValue = $arwrk;
            }
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
            $this->CONTAINER_TYPE->EditCustomAttributes = "";
            if (!$this->CONTAINER_TYPE->Raw) {
                $this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
            }
            $this->CONTAINER_TYPE->EditValue = HtmlEncode($this->CONTAINER_TYPE->CurrentValue);
            $this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
            $this->CONTAINER_STRENGTH->EditCustomAttributes = "";
            if (!$this->CONTAINER_STRENGTH->Raw) {
                $this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
            }
            $this->CONTAINER_STRENGTH->EditValue = HtmlEncode($this->CONTAINER_STRENGTH->CurrentValue);
            $this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

            // TypeOfDrug
            $this->TypeOfDrug->EditAttrs["class"] = "form-control";
            $this->TypeOfDrug->EditCustomAttributes = "";
            $this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(true);
            $this->TypeOfDrug->PlaceHolder = RemoveHtml($this->TypeOfDrug->caption());

            // ProductType
            $this->ProductType->EditAttrs["class"] = "form-control";
            $this->ProductType->EditCustomAttributes = "";
            $this->ProductType->EditValue = $this->ProductType->options(true);
            $this->ProductType->PlaceHolder = RemoveHtml($this->ProductType->caption());

            // Generic_Name1
            $this->Generic_Name1->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name1->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name1->ViewValue = $this->Generic_Name1->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name1->ViewValue = $this->Generic_Name1->Lookup !== null && is_array($this->Generic_Name1->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name1->ViewValue !== null) { // Load from cache
                $this->Generic_Name1->EditValue = array_values($this->Generic_Name1->Lookup->Options);
                if ($this->Generic_Name1->ViewValue == "") {
                    $this->Generic_Name1->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name1->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name1->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name1->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name1->ViewValue = $this->Generic_Name1->displayValue($arwrk);
                } else {
                    $this->Generic_Name1->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Generic_Name1->EditValue = $arwrk;
            }
            $this->Generic_Name1->PlaceHolder = RemoveHtml($this->Generic_Name1->caption());

            // Strength1
            $this->Strength1->EditAttrs["class"] = "form-control";
            $this->Strength1->EditCustomAttributes = "";
            if (!$this->Strength1->Raw) {
                $this->Strength1->CurrentValue = HtmlDecode($this->Strength1->CurrentValue);
            }
            $this->Strength1->EditValue = HtmlEncode($this->Strength1->CurrentValue);
            $this->Strength1->PlaceHolder = RemoveHtml($this->Strength1->caption());

            // Unit1
            $this->Unit1->EditAttrs["class"] = "form-control";
            $this->Unit1->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit1->CurrentValue));
            if ($curVal != "") {
                $this->Unit1->ViewValue = $this->Unit1->lookupCacheOption($curVal);
            } else {
                $this->Unit1->ViewValue = $this->Unit1->Lookup !== null && is_array($this->Unit1->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit1->ViewValue !== null) { // Load from cache
                $this->Unit1->EditValue = array_values($this->Unit1->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit1->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit1->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit1->EditValue = $arwrk;
            }
            $this->Unit1->PlaceHolder = RemoveHtml($this->Unit1->caption());

            // Generic_Name2
            $this->Generic_Name2->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name2->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name2->ViewValue = $this->Generic_Name2->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name2->ViewValue = $this->Generic_Name2->Lookup !== null && is_array($this->Generic_Name2->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name2->ViewValue !== null) { // Load from cache
                $this->Generic_Name2->EditValue = array_values($this->Generic_Name2->Lookup->Options);
                if ($this->Generic_Name2->ViewValue == "") {
                    $this->Generic_Name2->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name2->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name2->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name2->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name2->ViewValue = $this->Generic_Name2->displayValue($arwrk);
                } else {
                    $this->Generic_Name2->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Generic_Name2->EditValue = $arwrk;
            }
            $this->Generic_Name2->PlaceHolder = RemoveHtml($this->Generic_Name2->caption());

            // Strength2
            $this->Strength2->EditAttrs["class"] = "form-control";
            $this->Strength2->EditCustomAttributes = "";
            if (!$this->Strength2->Raw) {
                $this->Strength2->CurrentValue = HtmlDecode($this->Strength2->CurrentValue);
            }
            $this->Strength2->EditValue = HtmlEncode($this->Strength2->CurrentValue);
            $this->Strength2->PlaceHolder = RemoveHtml($this->Strength2->caption());

            // Unit2
            $this->Unit2->EditAttrs["class"] = "form-control";
            $this->Unit2->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit2->CurrentValue));
            if ($curVal != "") {
                $this->Unit2->ViewValue = $this->Unit2->lookupCacheOption($curVal);
            } else {
                $this->Unit2->ViewValue = $this->Unit2->Lookup !== null && is_array($this->Unit2->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit2->ViewValue !== null) { // Load from cache
                $this->Unit2->EditValue = array_values($this->Unit2->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit2->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit2->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit2->EditValue = $arwrk;
            }
            $this->Unit2->PlaceHolder = RemoveHtml($this->Unit2->caption());

            // Generic_Name3
            $this->Generic_Name3->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name3->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name3->ViewValue = $this->Generic_Name3->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name3->ViewValue = $this->Generic_Name3->Lookup !== null && is_array($this->Generic_Name3->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name3->ViewValue !== null) { // Load from cache
                $this->Generic_Name3->EditValue = array_values($this->Generic_Name3->Lookup->Options);
                if ($this->Generic_Name3->ViewValue == "") {
                    $this->Generic_Name3->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name3->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name3->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name3->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name3->ViewValue = $this->Generic_Name3->displayValue($arwrk);
                } else {
                    $this->Generic_Name3->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Generic_Name3->EditValue = $arwrk;
            }
            $this->Generic_Name3->PlaceHolder = RemoveHtml($this->Generic_Name3->caption());

            // Strength3
            $this->Strength3->EditAttrs["class"] = "form-control";
            $this->Strength3->EditCustomAttributes = "";
            if (!$this->Strength3->Raw) {
                $this->Strength3->CurrentValue = HtmlDecode($this->Strength3->CurrentValue);
            }
            $this->Strength3->EditValue = HtmlEncode($this->Strength3->CurrentValue);
            $this->Strength3->PlaceHolder = RemoveHtml($this->Strength3->caption());

            // Unit3
            $this->Unit3->EditAttrs["class"] = "form-control";
            $this->Unit3->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit3->CurrentValue));
            if ($curVal != "") {
                $this->Unit3->ViewValue = $this->Unit3->lookupCacheOption($curVal);
            } else {
                $this->Unit3->ViewValue = $this->Unit3->Lookup !== null && is_array($this->Unit3->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit3->ViewValue !== null) { // Load from cache
                $this->Unit3->EditValue = array_values($this->Unit3->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit3->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit3->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit3->EditValue = $arwrk;
            }
            $this->Unit3->PlaceHolder = RemoveHtml($this->Unit3->caption());

            // Generic_Name4
            $this->Generic_Name4->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name4->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name4->ViewValue = $this->Generic_Name4->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name4->ViewValue = $this->Generic_Name4->Lookup !== null && is_array($this->Generic_Name4->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name4->ViewValue !== null) { // Load from cache
                $this->Generic_Name4->EditValue = array_values($this->Generic_Name4->Lookup->Options);
                if ($this->Generic_Name4->ViewValue == "") {
                    $this->Generic_Name4->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name4->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name4->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name4->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name4->ViewValue = $this->Generic_Name4->displayValue($arwrk);
                } else {
                    $this->Generic_Name4->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Generic_Name4->EditValue = $arwrk;
            }
            $this->Generic_Name4->PlaceHolder = RemoveHtml($this->Generic_Name4->caption());

            // Generic_Name5
            $this->Generic_Name5->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name5->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name5->ViewValue = $this->Generic_Name5->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name5->ViewValue = $this->Generic_Name5->Lookup !== null && is_array($this->Generic_Name5->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name5->ViewValue !== null) { // Load from cache
                $this->Generic_Name5->EditValue = array_values($this->Generic_Name5->Lookup->Options);
                if ($this->Generic_Name5->ViewValue == "") {
                    $this->Generic_Name5->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name5->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name5->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Generic_Name5->Lookup->renderViewRow($rswrk[0]);
                    $this->Generic_Name5->ViewValue = $this->Generic_Name5->displayValue($arwrk);
                } else {
                    $this->Generic_Name5->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Generic_Name5->EditValue = $arwrk;
            }
            $this->Generic_Name5->PlaceHolder = RemoveHtml($this->Generic_Name5->caption());

            // Strength4
            $this->Strength4->EditAttrs["class"] = "form-control";
            $this->Strength4->EditCustomAttributes = "";
            if (!$this->Strength4->Raw) {
                $this->Strength4->CurrentValue = HtmlDecode($this->Strength4->CurrentValue);
            }
            $this->Strength4->EditValue = HtmlEncode($this->Strength4->CurrentValue);
            $this->Strength4->PlaceHolder = RemoveHtml($this->Strength4->caption());

            // Strength5
            $this->Strength5->EditAttrs["class"] = "form-control";
            $this->Strength5->EditCustomAttributes = "";
            if (!$this->Strength5->Raw) {
                $this->Strength5->CurrentValue = HtmlDecode($this->Strength5->CurrentValue);
            }
            $this->Strength5->EditValue = HtmlEncode($this->Strength5->CurrentValue);
            $this->Strength5->PlaceHolder = RemoveHtml($this->Strength5->caption());

            // Unit4
            $this->Unit4->EditAttrs["class"] = "form-control";
            $this->Unit4->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit4->CurrentValue));
            if ($curVal != "") {
                $this->Unit4->ViewValue = $this->Unit4->lookupCacheOption($curVal);
            } else {
                $this->Unit4->ViewValue = $this->Unit4->Lookup !== null && is_array($this->Unit4->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit4->ViewValue !== null) { // Load from cache
                $this->Unit4->EditValue = array_values($this->Unit4->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit4->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit4->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit4->EditValue = $arwrk;
            }
            $this->Unit4->PlaceHolder = RemoveHtml($this->Unit4->caption());

            // Unit5
            $this->Unit5->EditAttrs["class"] = "form-control";
            $this->Unit5->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit5->CurrentValue));
            if ($curVal != "") {
                $this->Unit5->ViewValue = $this->Unit5->lookupCacheOption($curVal);
            } else {
                $this->Unit5->ViewValue = $this->Unit5->Lookup !== null && is_array($this->Unit5->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit5->ViewValue !== null) { // Load from cache
                $this->Unit5->EditValue = array_values($this->Unit5->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit5->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit5->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit5->EditValue = $arwrk;
            }
            $this->Unit5->PlaceHolder = RemoveHtml($this->Unit5->caption());

            // AlterNative1
            $this->AlterNative1->EditCustomAttributes = "";
            $curVal = trim(strval($this->AlterNative1->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative1->ViewValue = $this->AlterNative1->lookupCacheOption($curVal);
            } else {
                $this->AlterNative1->ViewValue = $this->AlterNative1->Lookup !== null && is_array($this->AlterNative1->Lookup->Options) ? $curVal : null;
            }
            if ($this->AlterNative1->ViewValue !== null) { // Load from cache
                $this->AlterNative1->EditValue = array_values($this->AlterNative1->Lookup->Options);
                if ($this->AlterNative1->ViewValue == "") {
                    $this->AlterNative1->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`ID`" . SearchString("=", $this->AlterNative1->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->AlterNative1->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AlterNative1->Lookup->renderViewRow($rswrk[0]);
                    $this->AlterNative1->ViewValue = $this->AlterNative1->displayValue($arwrk);
                } else {
                    $this->AlterNative1->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->AlterNative1->EditValue = $arwrk;
            }
            $this->AlterNative1->PlaceHolder = RemoveHtml($this->AlterNative1->caption());

            // AlterNative2
            $this->AlterNative2->EditCustomAttributes = "";
            $curVal = trim(strval($this->AlterNative2->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative2->ViewValue = $this->AlterNative2->lookupCacheOption($curVal);
            } else {
                $this->AlterNative2->ViewValue = $this->AlterNative2->Lookup !== null && is_array($this->AlterNative2->Lookup->Options) ? $curVal : null;
            }
            if ($this->AlterNative2->ViewValue !== null) { // Load from cache
                $this->AlterNative2->EditValue = array_values($this->AlterNative2->Lookup->Options);
                if ($this->AlterNative2->ViewValue == "") {
                    $this->AlterNative2->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`ID`" . SearchString("=", $this->AlterNative2->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->AlterNative2->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AlterNative2->Lookup->renderViewRow($rswrk[0]);
                    $this->AlterNative2->ViewValue = $this->AlterNative2->displayValue($arwrk);
                } else {
                    $this->AlterNative2->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->AlterNative2->EditValue = $arwrk;
            }
            $this->AlterNative2->PlaceHolder = RemoveHtml($this->AlterNative2->caption());

            // AlterNative3
            $this->AlterNative3->EditCustomAttributes = "";
            $curVal = trim(strval($this->AlterNative3->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative3->ViewValue = $this->AlterNative3->lookupCacheOption($curVal);
            } else {
                $this->AlterNative3->ViewValue = $this->AlterNative3->Lookup !== null && is_array($this->AlterNative3->Lookup->Options) ? $curVal : null;
            }
            if ($this->AlterNative3->ViewValue !== null) { // Load from cache
                $this->AlterNative3->EditValue = array_values($this->AlterNative3->Lookup->Options);
                if ($this->AlterNative3->ViewValue == "") {
                    $this->AlterNative3->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`ID`" . SearchString("=", $this->AlterNative3->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->AlterNative3->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AlterNative3->Lookup->renderViewRow($rswrk[0]);
                    $this->AlterNative3->ViewValue = $this->AlterNative3->displayValue($arwrk);
                } else {
                    $this->AlterNative3->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->AlterNative3->EditValue = $arwrk;
            }
            $this->AlterNative3->PlaceHolder = RemoveHtml($this->AlterNative3->caption());

            // AlterNative4
            $this->AlterNative4->EditCustomAttributes = "";
            $curVal = trim(strval($this->AlterNative4->CurrentValue));
            if ($curVal != "") {
                $this->AlterNative4->ViewValue = $this->AlterNative4->lookupCacheOption($curVal);
            } else {
                $this->AlterNative4->ViewValue = $this->AlterNative4->Lookup !== null && is_array($this->AlterNative4->Lookup->Options) ? $curVal : null;
            }
            if ($this->AlterNative4->ViewValue !== null) { // Load from cache
                $this->AlterNative4->EditValue = array_values($this->AlterNative4->Lookup->Options);
                if ($this->AlterNative4->ViewValue == "") {
                    $this->AlterNative4->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`ID`" . SearchString("=", $this->AlterNative4->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->AlterNative4->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->AlterNative4->Lookup->renderViewRow($rswrk[0]);
                    $this->AlterNative4->ViewValue = $this->AlterNative4->displayValue($arwrk);
                } else {
                    $this->AlterNative4->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->AlterNative4->EditValue = $arwrk;
            }
            $this->AlterNative4->PlaceHolder = RemoveHtml($this->AlterNative4->caption());

            // Add refer script

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->LinkCustomAttributes = "";
            $this->CONTAINER_TYPE->HrefValue = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
            $this->CONTAINER_STRENGTH->HrefValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";

            // Generic_Name1
            $this->Generic_Name1->LinkCustomAttributes = "";
            $this->Generic_Name1->HrefValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";

            // Unit1
            $this->Unit1->LinkCustomAttributes = "";
            $this->Unit1->HrefValue = "";

            // Generic_Name2
            $this->Generic_Name2->LinkCustomAttributes = "";
            $this->Generic_Name2->HrefValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";

            // Unit2
            $this->Unit2->LinkCustomAttributes = "";
            $this->Unit2->HrefValue = "";

            // Generic_Name3
            $this->Generic_Name3->LinkCustomAttributes = "";
            $this->Generic_Name3->HrefValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";

            // Unit3
            $this->Unit3->LinkCustomAttributes = "";
            $this->Unit3->HrefValue = "";

            // Generic_Name4
            $this->Generic_Name4->LinkCustomAttributes = "";
            $this->Generic_Name4->HrefValue = "";

            // Generic_Name5
            $this->Generic_Name5->LinkCustomAttributes = "";
            $this->Generic_Name5->HrefValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";

            // Unit4
            $this->Unit4->LinkCustomAttributes = "";
            $this->Unit4->HrefValue = "";

            // Unit5
            $this->Unit5->LinkCustomAttributes = "";
            $this->Unit5->HrefValue = "";

            // AlterNative1
            $this->AlterNative1->LinkCustomAttributes = "";
            $this->AlterNative1->HrefValue = "";

            // AlterNative2
            $this->AlterNative2->LinkCustomAttributes = "";
            $this->AlterNative2->HrefValue = "";

            // AlterNative3
            $this->AlterNative3->LinkCustomAttributes = "";
            $this->AlterNative3->HrefValue = "";

            // AlterNative4
            $this->AlterNative4->LinkCustomAttributes = "";
            $this->AlterNative4->HrefValue = "";
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
        if ($this->Drug_Name->Required) {
            if (!$this->Drug_Name->IsDetailKey && EmptyValue($this->Drug_Name->FormValue)) {
                $this->Drug_Name->addErrorMessage(str_replace("%s", $this->Drug_Name->caption(), $this->Drug_Name->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name->Required) {
            if (!$this->Generic_Name->IsDetailKey && EmptyValue($this->Generic_Name->FormValue)) {
                $this->Generic_Name->addErrorMessage(str_replace("%s", $this->Generic_Name->caption(), $this->Generic_Name->RequiredErrorMessage));
            }
        }
        if ($this->Trade_Name->Required) {
            if (!$this->Trade_Name->IsDetailKey && EmptyValue($this->Trade_Name->FormValue)) {
                $this->Trade_Name->addErrorMessage(str_replace("%s", $this->Trade_Name->caption(), $this->Trade_Name->RequiredErrorMessage));
            }
        }
        if ($this->PR_CODE->Required) {
            if (!$this->PR_CODE->IsDetailKey && EmptyValue($this->PR_CODE->FormValue)) {
                $this->PR_CODE->addErrorMessage(str_replace("%s", $this->PR_CODE->caption(), $this->PR_CODE->RequiredErrorMessage));
            }
        }
        if ($this->Form->Required) {
            if (!$this->Form->IsDetailKey && EmptyValue($this->Form->FormValue)) {
                $this->Form->addErrorMessage(str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
            }
        }
        if ($this->Strength->Required) {
            if (!$this->Strength->IsDetailKey && EmptyValue($this->Strength->FormValue)) {
                $this->Strength->addErrorMessage(str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
            }
        }
        if ($this->Unit->Required) {
            if (!$this->Unit->IsDetailKey && EmptyValue($this->Unit->FormValue)) {
                $this->Unit->addErrorMessage(str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
            }
        }
        if ($this->CONTAINER_TYPE->Required) {
            if (!$this->CONTAINER_TYPE->IsDetailKey && EmptyValue($this->CONTAINER_TYPE->FormValue)) {
                $this->CONTAINER_TYPE->addErrorMessage(str_replace("%s", $this->CONTAINER_TYPE->caption(), $this->CONTAINER_TYPE->RequiredErrorMessage));
            }
        }
        if ($this->CONTAINER_STRENGTH->Required) {
            if (!$this->CONTAINER_STRENGTH->IsDetailKey && EmptyValue($this->CONTAINER_STRENGTH->FormValue)) {
                $this->CONTAINER_STRENGTH->addErrorMessage(str_replace("%s", $this->CONTAINER_STRENGTH->caption(), $this->CONTAINER_STRENGTH->RequiredErrorMessage));
            }
        }
        if ($this->TypeOfDrug->Required) {
            if (!$this->TypeOfDrug->IsDetailKey && EmptyValue($this->TypeOfDrug->FormValue)) {
                $this->TypeOfDrug->addErrorMessage(str_replace("%s", $this->TypeOfDrug->caption(), $this->TypeOfDrug->RequiredErrorMessage));
            }
        }
        if ($this->ProductType->Required) {
            if (!$this->ProductType->IsDetailKey && EmptyValue($this->ProductType->FormValue)) {
                $this->ProductType->addErrorMessage(str_replace("%s", $this->ProductType->caption(), $this->ProductType->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name1->Required) {
            if (!$this->Generic_Name1->IsDetailKey && EmptyValue($this->Generic_Name1->FormValue)) {
                $this->Generic_Name1->addErrorMessage(str_replace("%s", $this->Generic_Name1->caption(), $this->Generic_Name1->RequiredErrorMessage));
            }
        }
        if ($this->Strength1->Required) {
            if (!$this->Strength1->IsDetailKey && EmptyValue($this->Strength1->FormValue)) {
                $this->Strength1->addErrorMessage(str_replace("%s", $this->Strength1->caption(), $this->Strength1->RequiredErrorMessage));
            }
        }
        if ($this->Unit1->Required) {
            if (!$this->Unit1->IsDetailKey && EmptyValue($this->Unit1->FormValue)) {
                $this->Unit1->addErrorMessage(str_replace("%s", $this->Unit1->caption(), $this->Unit1->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name2->Required) {
            if (!$this->Generic_Name2->IsDetailKey && EmptyValue($this->Generic_Name2->FormValue)) {
                $this->Generic_Name2->addErrorMessage(str_replace("%s", $this->Generic_Name2->caption(), $this->Generic_Name2->RequiredErrorMessage));
            }
        }
        if ($this->Strength2->Required) {
            if (!$this->Strength2->IsDetailKey && EmptyValue($this->Strength2->FormValue)) {
                $this->Strength2->addErrorMessage(str_replace("%s", $this->Strength2->caption(), $this->Strength2->RequiredErrorMessage));
            }
        }
        if ($this->Unit2->Required) {
            if (!$this->Unit2->IsDetailKey && EmptyValue($this->Unit2->FormValue)) {
                $this->Unit2->addErrorMessage(str_replace("%s", $this->Unit2->caption(), $this->Unit2->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name3->Required) {
            if (!$this->Generic_Name3->IsDetailKey && EmptyValue($this->Generic_Name3->FormValue)) {
                $this->Generic_Name3->addErrorMessage(str_replace("%s", $this->Generic_Name3->caption(), $this->Generic_Name3->RequiredErrorMessage));
            }
        }
        if ($this->Strength3->Required) {
            if (!$this->Strength3->IsDetailKey && EmptyValue($this->Strength3->FormValue)) {
                $this->Strength3->addErrorMessage(str_replace("%s", $this->Strength3->caption(), $this->Strength3->RequiredErrorMessage));
            }
        }
        if ($this->Unit3->Required) {
            if (!$this->Unit3->IsDetailKey && EmptyValue($this->Unit3->FormValue)) {
                $this->Unit3->addErrorMessage(str_replace("%s", $this->Unit3->caption(), $this->Unit3->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name4->Required) {
            if (!$this->Generic_Name4->IsDetailKey && EmptyValue($this->Generic_Name4->FormValue)) {
                $this->Generic_Name4->addErrorMessage(str_replace("%s", $this->Generic_Name4->caption(), $this->Generic_Name4->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name5->Required) {
            if (!$this->Generic_Name5->IsDetailKey && EmptyValue($this->Generic_Name5->FormValue)) {
                $this->Generic_Name5->addErrorMessage(str_replace("%s", $this->Generic_Name5->caption(), $this->Generic_Name5->RequiredErrorMessage));
            }
        }
        if ($this->Strength4->Required) {
            if (!$this->Strength4->IsDetailKey && EmptyValue($this->Strength4->FormValue)) {
                $this->Strength4->addErrorMessage(str_replace("%s", $this->Strength4->caption(), $this->Strength4->RequiredErrorMessage));
            }
        }
        if ($this->Strength5->Required) {
            if (!$this->Strength5->IsDetailKey && EmptyValue($this->Strength5->FormValue)) {
                $this->Strength5->addErrorMessage(str_replace("%s", $this->Strength5->caption(), $this->Strength5->RequiredErrorMessage));
            }
        }
        if ($this->Unit4->Required) {
            if (!$this->Unit4->IsDetailKey && EmptyValue($this->Unit4->FormValue)) {
                $this->Unit4->addErrorMessage(str_replace("%s", $this->Unit4->caption(), $this->Unit4->RequiredErrorMessage));
            }
        }
        if ($this->Unit5->Required) {
            if (!$this->Unit5->IsDetailKey && EmptyValue($this->Unit5->FormValue)) {
                $this->Unit5->addErrorMessage(str_replace("%s", $this->Unit5->caption(), $this->Unit5->RequiredErrorMessage));
            }
        }
        if ($this->AlterNative1->Required) {
            if (!$this->AlterNative1->IsDetailKey && EmptyValue($this->AlterNative1->FormValue)) {
                $this->AlterNative1->addErrorMessage(str_replace("%s", $this->AlterNative1->caption(), $this->AlterNative1->RequiredErrorMessage));
            }
        }
        if ($this->AlterNative2->Required) {
            if (!$this->AlterNative2->IsDetailKey && EmptyValue($this->AlterNative2->FormValue)) {
                $this->AlterNative2->addErrorMessage(str_replace("%s", $this->AlterNative2->caption(), $this->AlterNative2->RequiredErrorMessage));
            }
        }
        if ($this->AlterNative3->Required) {
            if (!$this->AlterNative3->IsDetailKey && EmptyValue($this->AlterNative3->FormValue)) {
                $this->AlterNative3->addErrorMessage(str_replace("%s", $this->AlterNative3->caption(), $this->AlterNative3->RequiredErrorMessage));
            }
        }
        if ($this->AlterNative4->Required) {
            if (!$this->AlterNative4->IsDetailKey && EmptyValue($this->AlterNative4->FormValue)) {
                $this->AlterNative4->addErrorMessage(str_replace("%s", $this->AlterNative4->caption(), $this->AlterNative4->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("PresTradeCombinationNamesNewGrid");
        if (in_array("pres_trade_combination_names_new", $detailTblVar) && $detailPage->DetailAdd) {
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

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Begin transaction
        if ($this->getCurrentDetailTable() != "") {
            $conn->beginTransaction();
        }

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // Drug_Name
        $this->Drug_Name->setDbValueDef($rsnew, $this->Drug_Name->CurrentValue, null, false);

        // Generic_Name
        $this->Generic_Name->setDbValueDef($rsnew, $this->Generic_Name->CurrentValue, null, false);

        // Trade_Name
        $this->Trade_Name->setDbValueDef($rsnew, $this->Trade_Name->CurrentValue, "", false);

        // PR_CODE
        $this->PR_CODE->setDbValueDef($rsnew, $this->PR_CODE->CurrentValue, "", false);

        // Form
        $this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, null, false);

        // Strength
        $this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, null, false);

        // Unit
        $this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, null, false);

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE->setDbValueDef($rsnew, $this->CONTAINER_TYPE->CurrentValue, null, false);

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->setDbValueDef($rsnew, $this->CONTAINER_STRENGTH->CurrentValue, null, false);

        // TypeOfDrug
        $this->TypeOfDrug->setDbValueDef($rsnew, $this->TypeOfDrug->CurrentValue, null, false);

        // ProductType
        $this->ProductType->setDbValueDef($rsnew, $this->ProductType->CurrentValue, null, false);

        // Generic_Name1
        $this->Generic_Name1->setDbValueDef($rsnew, $this->Generic_Name1->CurrentValue, null, false);

        // Strength1
        $this->Strength1->setDbValueDef($rsnew, $this->Strength1->CurrentValue, null, false);

        // Unit1
        $this->Unit1->setDbValueDef($rsnew, $this->Unit1->CurrentValue, null, false);

        // Generic_Name2
        $this->Generic_Name2->setDbValueDef($rsnew, $this->Generic_Name2->CurrentValue, null, false);

        // Strength2
        $this->Strength2->setDbValueDef($rsnew, $this->Strength2->CurrentValue, null, false);

        // Unit2
        $this->Unit2->setDbValueDef($rsnew, $this->Unit2->CurrentValue, null, false);

        // Generic_Name3
        $this->Generic_Name3->setDbValueDef($rsnew, $this->Generic_Name3->CurrentValue, null, false);

        // Strength3
        $this->Strength3->setDbValueDef($rsnew, $this->Strength3->CurrentValue, null, false);

        // Unit3
        $this->Unit3->setDbValueDef($rsnew, $this->Unit3->CurrentValue, null, false);

        // Generic_Name4
        $this->Generic_Name4->setDbValueDef($rsnew, $this->Generic_Name4->CurrentValue, null, false);

        // Generic_Name5
        $this->Generic_Name5->setDbValueDef($rsnew, $this->Generic_Name5->CurrentValue, null, false);

        // Strength4
        $this->Strength4->setDbValueDef($rsnew, $this->Strength4->CurrentValue, null, false);

        // Strength5
        $this->Strength5->setDbValueDef($rsnew, $this->Strength5->CurrentValue, null, false);

        // Unit4
        $this->Unit4->setDbValueDef($rsnew, $this->Unit4->CurrentValue, null, false);

        // Unit5
        $this->Unit5->setDbValueDef($rsnew, $this->Unit5->CurrentValue, null, false);

        // AlterNative1
        $this->AlterNative1->setDbValueDef($rsnew, $this->AlterNative1->CurrentValue, null, false);

        // AlterNative2
        $this->AlterNative2->setDbValueDef($rsnew, $this->AlterNative2->CurrentValue, null, false);

        // AlterNative3
        $this->AlterNative3->setDbValueDef($rsnew, $this->AlterNative3->CurrentValue, null, false);

        // AlterNative4
        $this->AlterNative4->setDbValueDef($rsnew, $this->AlterNative4->CurrentValue, null, false);

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

        // Add detail records
        if ($addRow) {
            $detailTblVar = explode(",", $this->getCurrentDetailTable());
            $detailPage = Container("PresTradeCombinationNamesNewGrid");
            if (in_array("pres_trade_combination_names_new", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->tradenames_id->setSessionValue($this->ID->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "pres_trade_combination_names_new"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->tradenames_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
        }

        // Commit/Rollback transaction
        if ($this->getCurrentDetailTable() != "") {
            if ($addRow) {
                $conn->commit(); // Commit transaction
            } else {
                $conn->rollback(); // Rollback transaction
            }
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
            if (in_array("pres_trade_combination_names_new", $detailTblVar)) {
                $detailPageObj = Container("PresTradeCombinationNamesNewGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->tradenames_id->IsDetailKey = true;
                    $detailPageObj->tradenames_id->CurrentValue = $this->ID->CurrentValue;
                    $detailPageObj->tradenames_id->setSessionValue($detailPageObj->tradenames_id->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresTradenamesNewList"), "", $this->TableVar, true);
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
                case "x_Generic_Name":
                    break;
                case "x_Form":
                    break;
                case "x_Unit":
                    break;
                case "x_TypeOfDrug":
                    break;
                case "x_ProductType":
                    break;
                case "x_Generic_Name1":
                    break;
                case "x_Unit1":
                    break;
                case "x_Generic_Name2":
                    break;
                case "x_Unit2":
                    break;
                case "x_Generic_Name3":
                    break;
                case "x_Unit3":
                    break;
                case "x_Generic_Name4":
                    break;
                case "x_Generic_Name5":
                    break;
                case "x_Unit4":
                    break;
                case "x_Unit5":
                    break;
                case "x_AlterNative1":
                    break;
                case "x_AlterNative2":
                    break;
                case "x_AlterNative3":
                    break;
                case "x_AlterNative4":
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
