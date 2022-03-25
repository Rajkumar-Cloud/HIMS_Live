<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresFluidformulationEdit extends PresFluidformulation
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_fluidformulation';

    // Page object name
    public $PageObjName = "PresFluidformulationEdit";

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

        // Table object (pres_fluidformulation)
        if (!isset($GLOBALS["pres_fluidformulation"]) || get_class($GLOBALS["pres_fluidformulation"]) == PROJECT_NAMESPACE . "pres_fluidformulation") {
            $GLOBALS["pres_fluidformulation"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_fluidformulation');
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
                $doc = new $class(Container("pres_fluidformulation"));
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
                    if ($pageName == "PresFluidformulationView") {
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
        $this->Tradename->setVisibility();
        $this->Itemcode->setVisibility();
        $this->Genericname->setVisibility();
        $this->Volume->setVisibility();
        $this->VolumeUnit->setVisibility();
        $this->Strength->setVisibility();
        $this->StrengthUnit->setVisibility();
        $this->_Route->setVisibility();
        $this->Forms->setVisibility();
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
                    $this->terminate("PresFluidformulationList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PresFluidformulationList") {
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

        // Check field name 'Tradename' first before field var 'x_Tradename'
        $val = $CurrentForm->hasValue("Tradename") ? $CurrentForm->getValue("Tradename") : $CurrentForm->getValue("x_Tradename");
        if (!$this->Tradename->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tradename->Visible = false; // Disable update for API request
            } else {
                $this->Tradename->setFormValue($val);
            }
        }

        // Check field name 'Itemcode' first before field var 'x_Itemcode'
        $val = $CurrentForm->hasValue("Itemcode") ? $CurrentForm->getValue("Itemcode") : $CurrentForm->getValue("x_Itemcode");
        if (!$this->Itemcode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Itemcode->Visible = false; // Disable update for API request
            } else {
                $this->Itemcode->setFormValue($val);
            }
        }

        // Check field name 'Genericname' first before field var 'x_Genericname'
        $val = $CurrentForm->hasValue("Genericname") ? $CurrentForm->getValue("Genericname") : $CurrentForm->getValue("x_Genericname");
        if (!$this->Genericname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Genericname->Visible = false; // Disable update for API request
            } else {
                $this->Genericname->setFormValue($val);
            }
        }

        // Check field name 'Volume' first before field var 'x_Volume'
        $val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
        if (!$this->Volume->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume->Visible = false; // Disable update for API request
            } else {
                $this->Volume->setFormValue($val);
            }
        }

        // Check field name 'VolumeUnit' first before field var 'x_VolumeUnit'
        $val = $CurrentForm->hasValue("VolumeUnit") ? $CurrentForm->getValue("VolumeUnit") : $CurrentForm->getValue("x_VolumeUnit");
        if (!$this->VolumeUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VolumeUnit->Visible = false; // Disable update for API request
            } else {
                $this->VolumeUnit->setFormValue($val);
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

        // Check field name 'StrengthUnit' first before field var 'x_StrengthUnit'
        $val = $CurrentForm->hasValue("StrengthUnit") ? $CurrentForm->getValue("StrengthUnit") : $CurrentForm->getValue("x_StrengthUnit");
        if (!$this->StrengthUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StrengthUnit->Visible = false; // Disable update for API request
            } else {
                $this->StrengthUnit->setFormValue($val);
            }
        }

        // Check field name 'Route' first before field var 'x__Route'
        $val = $CurrentForm->hasValue("Route") ? $CurrentForm->getValue("Route") : $CurrentForm->getValue("x__Route");
        if (!$this->_Route->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Route->Visible = false; // Disable update for API request
            } else {
                $this->_Route->setFormValue($val);
            }
        }

        // Check field name 'Forms' first before field var 'x_Forms'
        $val = $CurrentForm->hasValue("Forms") ? $CurrentForm->getValue("Forms") : $CurrentForm->getValue("x_Forms");
        if (!$this->Forms->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Forms->Visible = false; // Disable update for API request
            } else {
                $this->Forms->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->Tradename->CurrentValue = $this->Tradename->FormValue;
        $this->Itemcode->CurrentValue = $this->Itemcode->FormValue;
        $this->Genericname->CurrentValue = $this->Genericname->FormValue;
        $this->Volume->CurrentValue = $this->Volume->FormValue;
        $this->VolumeUnit->CurrentValue = $this->VolumeUnit->FormValue;
        $this->Strength->CurrentValue = $this->Strength->FormValue;
        $this->StrengthUnit->CurrentValue = $this->StrengthUnit->FormValue;
        $this->_Route->CurrentValue = $this->_Route->FormValue;
        $this->Forms->CurrentValue = $this->Forms->FormValue;
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
        $this->Tradename->setDbValue($row['Tradename']);
        $this->Itemcode->setDbValue($row['Itemcode']);
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Volume->setDbValue($row['Volume']);
        $this->VolumeUnit->setDbValue($row['VolumeUnit']);
        $this->Strength->setDbValue($row['Strength']);
        $this->StrengthUnit->setDbValue($row['StrengthUnit']);
        $this->_Route->setDbValue($row['Route']);
        $this->Forms->setDbValue($row['Forms']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Tradename'] = null;
        $row['Itemcode'] = null;
        $row['Genericname'] = null;
        $row['Volume'] = null;
        $row['VolumeUnit'] = null;
        $row['Strength'] = null;
        $row['StrengthUnit'] = null;
        $row['Route'] = null;
        $row['Forms'] = null;
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
        if ($this->Volume->FormValue == $this->Volume->CurrentValue && is_numeric(ConvertToFloatString($this->Volume->CurrentValue))) {
            $this->Volume->CurrentValue = ConvertToFloatString($this->Volume->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Strength->FormValue == $this->Strength->CurrentValue && is_numeric(ConvertToFloatString($this->Strength->CurrentValue))) {
            $this->Strength->CurrentValue = ConvertToFloatString($this->Strength->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Tradename

        // Itemcode

        // Genericname

        // Volume

        // VolumeUnit

        // Strength

        // StrengthUnit

        // Route

        // Forms
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Tradename
            $this->Tradename->ViewValue = $this->Tradename->CurrentValue;
            $this->Tradename->ViewCustomAttributes = "";

            // Itemcode
            $this->Itemcode->ViewValue = $this->Itemcode->CurrentValue;
            $this->Itemcode->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
            $this->Genericname->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
            $this->Volume->ViewCustomAttributes = "";

            // VolumeUnit
            $this->VolumeUnit->ViewValue = $this->VolumeUnit->CurrentValue;
            $this->VolumeUnit->ViewCustomAttributes = "";

            // Strength
            $this->Strength->ViewValue = $this->Strength->CurrentValue;
            $this->Strength->ViewValue = FormatNumber($this->Strength->ViewValue, 2, -2, -2, -2);
            $this->Strength->ViewCustomAttributes = "";

            // StrengthUnit
            $this->StrengthUnit->ViewValue = $this->StrengthUnit->CurrentValue;
            $this->StrengthUnit->ViewCustomAttributes = "";

            // Route
            $this->_Route->ViewValue = $this->_Route->CurrentValue;
            $this->_Route->ViewCustomAttributes = "";

            // Forms
            $this->Forms->ViewValue = $this->Forms->CurrentValue;
            $this->Forms->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Tradename
            $this->Tradename->LinkCustomAttributes = "";
            $this->Tradename->HrefValue = "";
            $this->Tradename->TooltipValue = "";

            // Itemcode
            $this->Itemcode->LinkCustomAttributes = "";
            $this->Itemcode->HrefValue = "";
            $this->Itemcode->TooltipValue = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";
            $this->Genericname->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // VolumeUnit
            $this->VolumeUnit->LinkCustomAttributes = "";
            $this->VolumeUnit->HrefValue = "";
            $this->VolumeUnit->TooltipValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";
            $this->Strength->TooltipValue = "";

            // StrengthUnit
            $this->StrengthUnit->LinkCustomAttributes = "";
            $this->StrengthUnit->HrefValue = "";
            $this->StrengthUnit->TooltipValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";
            $this->_Route->TooltipValue = "";

            // Forms
            $this->Forms->LinkCustomAttributes = "";
            $this->Forms->HrefValue = "";
            $this->Forms->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Tradename
            $this->Tradename->EditAttrs["class"] = "form-control";
            $this->Tradename->EditCustomAttributes = "";
            if (!$this->Tradename->Raw) {
                $this->Tradename->CurrentValue = HtmlDecode($this->Tradename->CurrentValue);
            }
            $this->Tradename->EditValue = HtmlEncode($this->Tradename->CurrentValue);
            $this->Tradename->PlaceHolder = RemoveHtml($this->Tradename->caption());

            // Itemcode
            $this->Itemcode->EditAttrs["class"] = "form-control";
            $this->Itemcode->EditCustomAttributes = "";
            if (!$this->Itemcode->Raw) {
                $this->Itemcode->CurrentValue = HtmlDecode($this->Itemcode->CurrentValue);
            }
            $this->Itemcode->EditValue = HtmlEncode($this->Itemcode->CurrentValue);
            $this->Itemcode->PlaceHolder = RemoveHtml($this->Itemcode->caption());

            // Genericname
            $this->Genericname->EditAttrs["class"] = "form-control";
            $this->Genericname->EditCustomAttributes = "";
            if (!$this->Genericname->Raw) {
                $this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
            }
            $this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
            $this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
            if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue)) {
                $this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
            }

            // VolumeUnit
            $this->VolumeUnit->EditAttrs["class"] = "form-control";
            $this->VolumeUnit->EditCustomAttributes = "";
            if (!$this->VolumeUnit->Raw) {
                $this->VolumeUnit->CurrentValue = HtmlDecode($this->VolumeUnit->CurrentValue);
            }
            $this->VolumeUnit->EditValue = HtmlEncode($this->VolumeUnit->CurrentValue);
            $this->VolumeUnit->PlaceHolder = RemoveHtml($this->VolumeUnit->caption());

            // Strength
            $this->Strength->EditAttrs["class"] = "form-control";
            $this->Strength->EditCustomAttributes = "";
            $this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
            $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());
            if (strval($this->Strength->EditValue) != "" && is_numeric($this->Strength->EditValue)) {
                $this->Strength->EditValue = FormatNumber($this->Strength->EditValue, -2, -2, -2, -2);
            }

            // StrengthUnit
            $this->StrengthUnit->EditAttrs["class"] = "form-control";
            $this->StrengthUnit->EditCustomAttributes = "";
            if (!$this->StrengthUnit->Raw) {
                $this->StrengthUnit->CurrentValue = HtmlDecode($this->StrengthUnit->CurrentValue);
            }
            $this->StrengthUnit->EditValue = HtmlEncode($this->StrengthUnit->CurrentValue);
            $this->StrengthUnit->PlaceHolder = RemoveHtml($this->StrengthUnit->caption());

            // Route
            $this->_Route->EditAttrs["class"] = "form-control";
            $this->_Route->EditCustomAttributes = "";
            if (!$this->_Route->Raw) {
                $this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
            }
            $this->_Route->EditValue = HtmlEncode($this->_Route->CurrentValue);
            $this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

            // Forms
            $this->Forms->EditAttrs["class"] = "form-control";
            $this->Forms->EditCustomAttributes = "";
            if (!$this->Forms->Raw) {
                $this->Forms->CurrentValue = HtmlDecode($this->Forms->CurrentValue);
            }
            $this->Forms->EditValue = HtmlEncode($this->Forms->CurrentValue);
            $this->Forms->PlaceHolder = RemoveHtml($this->Forms->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Tradename
            $this->Tradename->LinkCustomAttributes = "";
            $this->Tradename->HrefValue = "";

            // Itemcode
            $this->Itemcode->LinkCustomAttributes = "";
            $this->Itemcode->HrefValue = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // VolumeUnit
            $this->VolumeUnit->LinkCustomAttributes = "";
            $this->VolumeUnit->HrefValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";

            // StrengthUnit
            $this->StrengthUnit->LinkCustomAttributes = "";
            $this->StrengthUnit->HrefValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";

            // Forms
            $this->Forms->LinkCustomAttributes = "";
            $this->Forms->HrefValue = "";
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
        if ($this->Tradename->Required) {
            if (!$this->Tradename->IsDetailKey && EmptyValue($this->Tradename->FormValue)) {
                $this->Tradename->addErrorMessage(str_replace("%s", $this->Tradename->caption(), $this->Tradename->RequiredErrorMessage));
            }
        }
        if ($this->Itemcode->Required) {
            if (!$this->Itemcode->IsDetailKey && EmptyValue($this->Itemcode->FormValue)) {
                $this->Itemcode->addErrorMessage(str_replace("%s", $this->Itemcode->caption(), $this->Itemcode->RequiredErrorMessage));
            }
        }
        if ($this->Genericname->Required) {
            if (!$this->Genericname->IsDetailKey && EmptyValue($this->Genericname->FormValue)) {
                $this->Genericname->addErrorMessage(str_replace("%s", $this->Genericname->caption(), $this->Genericname->RequiredErrorMessage));
            }
        }
        if ($this->Volume->Required) {
            if (!$this->Volume->IsDetailKey && EmptyValue($this->Volume->FormValue)) {
                $this->Volume->addErrorMessage(str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Volume->FormValue)) {
            $this->Volume->addErrorMessage($this->Volume->getErrorMessage(false));
        }
        if ($this->VolumeUnit->Required) {
            if (!$this->VolumeUnit->IsDetailKey && EmptyValue($this->VolumeUnit->FormValue)) {
                $this->VolumeUnit->addErrorMessage(str_replace("%s", $this->VolumeUnit->caption(), $this->VolumeUnit->RequiredErrorMessage));
            }
        }
        if ($this->Strength->Required) {
            if (!$this->Strength->IsDetailKey && EmptyValue($this->Strength->FormValue)) {
                $this->Strength->addErrorMessage(str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Strength->FormValue)) {
            $this->Strength->addErrorMessage($this->Strength->getErrorMessage(false));
        }
        if ($this->StrengthUnit->Required) {
            if (!$this->StrengthUnit->IsDetailKey && EmptyValue($this->StrengthUnit->FormValue)) {
                $this->StrengthUnit->addErrorMessage(str_replace("%s", $this->StrengthUnit->caption(), $this->StrengthUnit->RequiredErrorMessage));
            }
        }
        if ($this->_Route->Required) {
            if (!$this->_Route->IsDetailKey && EmptyValue($this->_Route->FormValue)) {
                $this->_Route->addErrorMessage(str_replace("%s", $this->_Route->caption(), $this->_Route->RequiredErrorMessage));
            }
        }
        if ($this->Forms->Required) {
            if (!$this->Forms->IsDetailKey && EmptyValue($this->Forms->FormValue)) {
                $this->Forms->addErrorMessage(str_replace("%s", $this->Forms->caption(), $this->Forms->RequiredErrorMessage));
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

            // Tradename
            $this->Tradename->setDbValueDef($rsnew, $this->Tradename->CurrentValue, null, $this->Tradename->ReadOnly);

            // Itemcode
            $this->Itemcode->setDbValueDef($rsnew, $this->Itemcode->CurrentValue, null, $this->Itemcode->ReadOnly);

            // Genericname
            $this->Genericname->setDbValueDef($rsnew, $this->Genericname->CurrentValue, null, $this->Genericname->ReadOnly);

            // Volume
            $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, $this->Volume->ReadOnly);

            // VolumeUnit
            $this->VolumeUnit->setDbValueDef($rsnew, $this->VolumeUnit->CurrentValue, null, $this->VolumeUnit->ReadOnly);

            // Strength
            $this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, null, $this->Strength->ReadOnly);

            // StrengthUnit
            $this->StrengthUnit->setDbValueDef($rsnew, $this->StrengthUnit->CurrentValue, null, $this->StrengthUnit->ReadOnly);

            // Route
            $this->_Route->setDbValueDef($rsnew, $this->_Route->CurrentValue, null, $this->_Route->ReadOnly);

            // Forms
            $this->Forms->setDbValueDef($rsnew, $this->Forms->CurrentValue, null, $this->Forms->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresFluidformulationList"), "", $this->TableVar, true);
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
