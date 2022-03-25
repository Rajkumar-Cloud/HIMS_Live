<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewLabProfileEdit extends ViewLabProfile
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_lab_profile';

    // Page object name
    public $PageObjName = "ViewLabProfileEdit";

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

        // Table object (view_lab_profile)
        if (!isset($GLOBALS["view_lab_profile"]) || get_class($GLOBALS["view_lab_profile"]) == PROJECT_NAMESPACE . "view_lab_profile") {
            $GLOBALS["view_lab_profile"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_profile');
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
                $doc = new $class(Container("view_lab_profile"));
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
                    if ($pageName == "ViewLabProfileView") {
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
            $key .= @$ar['Id'];
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
        $this->Id->setVisibility();
        $this->CODE->setVisibility();
        $this->SERVICE->setVisibility();
        $this->UNITS->setVisibility();
        $this->AMOUNT->setVisibility();
        $this->SERVICE_TYPE->setVisibility();
        $this->DEPARTMENT->setVisibility();
        $this->Created->Visible = false;
        $this->CreatedDateTime->Visible = false;
        $this->Modified->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->mas_services_billingcol->setVisibility();
        $this->DrShareAmount->setVisibility();
        $this->HospShareAmount->setVisibility();
        $this->DrSharePer->setVisibility();
        $this->HospSharePer->setVisibility();
        $this->HospID->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->Method->setVisibility();
        $this->Order->setVisibility();
        $this->Form->setVisibility();
        $this->ResType->setVisibility();
        $this->UnitCD->setVisibility();
        $this->RefValue->setVisibility();
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->setVisibility();
        $this->Inactive->setVisibility();
        $this->Outsource->setVisibility();
        $this->CollSample->setVisibility();
        $this->TestType->setVisibility();
        $this->NoHeading->setVisibility();
        $this->ChemicalCode->setVisibility();
        $this->ChemicalName->setVisibility();
        $this->Utilaization->setVisibility();
        $this->Interpretation->setVisibility();
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
        $this->setupLookupOptions($this->SERVICE_TYPE);
        $this->setupLookupOptions($this->DEPARTMENT);

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
            if (($keyValue = Get("Id") ?? Key(0) ?? Route(2)) !== null) {
                $this->Id->setQueryStringValue($keyValue);
                $this->Id->setOldValue($this->Id->QueryStringValue);
            } elseif (Post("Id") !== null) {
                $this->Id->setFormValue(Post("Id"));
                $this->Id->setOldValue($this->Id->FormValue);
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
                if (($keyValue = Get("Id") ?? Route("Id")) !== null) {
                    $this->Id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->Id->CurrentValue = null;
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

            // Set up detail parameters
            $this->setupDetailParms();
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
                    $this->terminate("ViewLabProfileList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "update": // Update
                if ($this->getCurrentDetailTable() != "") { // Master/detail edit
                    $returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
                } else {
                    $returnUrl = $this->getReturnUrl();
                }
                if (GetPageName($returnUrl) == "ViewLabProfileList") {
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

                    // Set up detail parameters
                    $this->setupDetailParms();
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

        // Check field name 'Id' first before field var 'x_Id'
        $val = $CurrentForm->hasValue("Id") ? $CurrentForm->getValue("Id") : $CurrentForm->getValue("x_Id");
        if (!$this->Id->IsDetailKey) {
            $this->Id->setFormValue($val);
        }

        // Check field name 'CODE' first before field var 'x_CODE'
        $val = $CurrentForm->hasValue("CODE") ? $CurrentForm->getValue("CODE") : $CurrentForm->getValue("x_CODE");
        if (!$this->CODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CODE->Visible = false; // Disable update for API request
            } else {
                $this->CODE->setFormValue($val);
            }
        }

        // Check field name 'SERVICE' first before field var 'x_SERVICE'
        $val = $CurrentForm->hasValue("SERVICE") ? $CurrentForm->getValue("SERVICE") : $CurrentForm->getValue("x_SERVICE");
        if (!$this->SERVICE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SERVICE->Visible = false; // Disable update for API request
            } else {
                $this->SERVICE->setFormValue($val);
            }
        }

        // Check field name 'UNITS' first before field var 'x_UNITS'
        $val = $CurrentForm->hasValue("UNITS") ? $CurrentForm->getValue("UNITS") : $CurrentForm->getValue("x_UNITS");
        if (!$this->UNITS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UNITS->Visible = false; // Disable update for API request
            } else {
                $this->UNITS->setFormValue($val);
            }
        }

        // Check field name 'AMOUNT' first before field var 'x_AMOUNT'
        $val = $CurrentForm->hasValue("AMOUNT") ? $CurrentForm->getValue("AMOUNT") : $CurrentForm->getValue("x_AMOUNT");
        if (!$this->AMOUNT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AMOUNT->Visible = false; // Disable update for API request
            } else {
                $this->AMOUNT->setFormValue($val);
            }
        }

        // Check field name 'SERVICE_TYPE' first before field var 'x_SERVICE_TYPE'
        $val = $CurrentForm->hasValue("SERVICE_TYPE") ? $CurrentForm->getValue("SERVICE_TYPE") : $CurrentForm->getValue("x_SERVICE_TYPE");
        if (!$this->SERVICE_TYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SERVICE_TYPE->Visible = false; // Disable update for API request
            } else {
                $this->SERVICE_TYPE->setFormValue($val);
            }
        }

        // Check field name 'DEPARTMENT' first before field var 'x_DEPARTMENT'
        $val = $CurrentForm->hasValue("DEPARTMENT") ? $CurrentForm->getValue("DEPARTMENT") : $CurrentForm->getValue("x_DEPARTMENT");
        if (!$this->DEPARTMENT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DEPARTMENT->Visible = false; // Disable update for API request
            } else {
                $this->DEPARTMENT->setFormValue($val);
            }
        }

        // Check field name 'Modified' first before field var 'x_Modified'
        $val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
        if (!$this->Modified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Modified->Visible = false; // Disable update for API request
            } else {
                $this->Modified->setFormValue($val);
            }
        }

        // Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
        $val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
        if (!$this->ModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedDateTime->setFormValue($val);
            }
            $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
        }

        // Check field name 'mas_services_billingcol' first before field var 'x_mas_services_billingcol'
        $val = $CurrentForm->hasValue("mas_services_billingcol") ? $CurrentForm->getValue("mas_services_billingcol") : $CurrentForm->getValue("x_mas_services_billingcol");
        if (!$this->mas_services_billingcol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mas_services_billingcol->Visible = false; // Disable update for API request
            } else {
                $this->mas_services_billingcol->setFormValue($val);
            }
        }

        // Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
        $val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
        if (!$this->DrShareAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrShareAmount->Visible = false; // Disable update for API request
            } else {
                $this->DrShareAmount->setFormValue($val);
            }
        }

        // Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
        $val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
        if (!$this->HospShareAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospShareAmount->Visible = false; // Disable update for API request
            } else {
                $this->HospShareAmount->setFormValue($val);
            }
        }

        // Check field name 'DrSharePer' first before field var 'x_DrSharePer'
        $val = $CurrentForm->hasValue("DrSharePer") ? $CurrentForm->getValue("DrSharePer") : $CurrentForm->getValue("x_DrSharePer");
        if (!$this->DrSharePer->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrSharePer->Visible = false; // Disable update for API request
            } else {
                $this->DrSharePer->setFormValue($val);
            }
        }

        // Check field name 'HospSharePer' first before field var 'x_HospSharePer'
        $val = $CurrentForm->hasValue("HospSharePer") ? $CurrentForm->getValue("HospSharePer") : $CurrentForm->getValue("x_HospSharePer");
        if (!$this->HospSharePer->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospSharePer->Visible = false; // Disable update for API request
            } else {
                $this->HospSharePer->setFormValue($val);
            }
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }

        // Check field name 'TestSubCd' first before field var 'x_TestSubCd'
        $val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
        if (!$this->TestSubCd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestSubCd->Visible = false; // Disable update for API request
            } else {
                $this->TestSubCd->setFormValue($val);
            }
        }

        // Check field name 'Method' first before field var 'x_Method'
        $val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
        if (!$this->Method->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Method->Visible = false; // Disable update for API request
            } else {
                $this->Method->setFormValue($val);
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

        // Check field name 'Form' first before field var 'x_Form'
        $val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
        if (!$this->Form->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Form->Visible = false; // Disable update for API request
            } else {
                $this->Form->setFormValue($val);
            }
        }

        // Check field name 'ResType' first before field var 'x_ResType'
        $val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
        if (!$this->ResType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResType->Visible = false; // Disable update for API request
            } else {
                $this->ResType->setFormValue($val);
            }
        }

        // Check field name 'UnitCD' first before field var 'x_UnitCD'
        $val = $CurrentForm->hasValue("UnitCD") ? $CurrentForm->getValue("UnitCD") : $CurrentForm->getValue("x_UnitCD");
        if (!$this->UnitCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UnitCD->Visible = false; // Disable update for API request
            } else {
                $this->UnitCD->setFormValue($val);
            }
        }

        // Check field name 'RefValue' first before field var 'x_RefValue'
        $val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
        if (!$this->RefValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefValue->Visible = false; // Disable update for API request
            } else {
                $this->RefValue->setFormValue($val);
            }
        }

        // Check field name 'Sample' first before field var 'x_Sample'
        $val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
        if (!$this->Sample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Sample->Visible = false; // Disable update for API request
            } else {
                $this->Sample->setFormValue($val);
            }
        }

        // Check field name 'NoD' first before field var 'x_NoD'
        $val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
        if (!$this->NoD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoD->Visible = false; // Disable update for API request
            } else {
                $this->NoD->setFormValue($val);
            }
        }

        // Check field name 'BillOrder' first before field var 'x_BillOrder'
        $val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
        if (!$this->BillOrder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillOrder->Visible = false; // Disable update for API request
            } else {
                $this->BillOrder->setFormValue($val);
            }
        }

        // Check field name 'Formula' first before field var 'x_Formula'
        $val = $CurrentForm->hasValue("Formula") ? $CurrentForm->getValue("Formula") : $CurrentForm->getValue("x_Formula");
        if (!$this->Formula->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Formula->Visible = false; // Disable update for API request
            } else {
                $this->Formula->setFormValue($val);
            }
        }

        // Check field name 'Inactive' first before field var 'x_Inactive'
        $val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
        if (!$this->Inactive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Inactive->Visible = false; // Disable update for API request
            } else {
                $this->Inactive->setFormValue($val);
            }
        }

        // Check field name 'Outsource' first before field var 'x_Outsource'
        $val = $CurrentForm->hasValue("Outsource") ? $CurrentForm->getValue("Outsource") : $CurrentForm->getValue("x_Outsource");
        if (!$this->Outsource->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Outsource->Visible = false; // Disable update for API request
            } else {
                $this->Outsource->setFormValue($val);
            }
        }

        // Check field name 'CollSample' first before field var 'x_CollSample'
        $val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
        if (!$this->CollSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollSample->Visible = false; // Disable update for API request
            } else {
                $this->CollSample->setFormValue($val);
            }
        }

        // Check field name 'TestType' first before field var 'x_TestType'
        $val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
        if (!$this->TestType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TestType->Visible = false; // Disable update for API request
            } else {
                $this->TestType->setFormValue($val);
            }
        }

        // Check field name 'NoHeading' first before field var 'x_NoHeading'
        $val = $CurrentForm->hasValue("NoHeading") ? $CurrentForm->getValue("NoHeading") : $CurrentForm->getValue("x_NoHeading");
        if (!$this->NoHeading->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoHeading->Visible = false; // Disable update for API request
            } else {
                $this->NoHeading->setFormValue($val);
            }
        }

        // Check field name 'ChemicalCode' first before field var 'x_ChemicalCode'
        $val = $CurrentForm->hasValue("ChemicalCode") ? $CurrentForm->getValue("ChemicalCode") : $CurrentForm->getValue("x_ChemicalCode");
        if (!$this->ChemicalCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChemicalCode->Visible = false; // Disable update for API request
            } else {
                $this->ChemicalCode->setFormValue($val);
            }
        }

        // Check field name 'ChemicalName' first before field var 'x_ChemicalName'
        $val = $CurrentForm->hasValue("ChemicalName") ? $CurrentForm->getValue("ChemicalName") : $CurrentForm->getValue("x_ChemicalName");
        if (!$this->ChemicalName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChemicalName->Visible = false; // Disable update for API request
            } else {
                $this->ChemicalName->setFormValue($val);
            }
        }

        // Check field name 'Utilaization' first before field var 'x_Utilaization'
        $val = $CurrentForm->hasValue("Utilaization") ? $CurrentForm->getValue("Utilaization") : $CurrentForm->getValue("x_Utilaization");
        if (!$this->Utilaization->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Utilaization->Visible = false; // Disable update for API request
            } else {
                $this->Utilaization->setFormValue($val);
            }
        }

        // Check field name 'Interpretation' first before field var 'x_Interpretation'
        $val = $CurrentForm->hasValue("Interpretation") ? $CurrentForm->getValue("Interpretation") : $CurrentForm->getValue("x_Interpretation");
        if (!$this->Interpretation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Interpretation->Visible = false; // Disable update for API request
            } else {
                $this->Interpretation->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Id->CurrentValue = $this->Id->FormValue;
        $this->CODE->CurrentValue = $this->CODE->FormValue;
        $this->SERVICE->CurrentValue = $this->SERVICE->FormValue;
        $this->UNITS->CurrentValue = $this->UNITS->FormValue;
        $this->AMOUNT->CurrentValue = $this->AMOUNT->FormValue;
        $this->SERVICE_TYPE->CurrentValue = $this->SERVICE_TYPE->FormValue;
        $this->DEPARTMENT->CurrentValue = $this->DEPARTMENT->FormValue;
        $this->Modified->CurrentValue = $this->Modified->FormValue;
        $this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
        $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
        $this->mas_services_billingcol->CurrentValue = $this->mas_services_billingcol->FormValue;
        $this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
        $this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
        $this->DrSharePer->CurrentValue = $this->DrSharePer->FormValue;
        $this->HospSharePer->CurrentValue = $this->HospSharePer->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
        $this->Method->CurrentValue = $this->Method->FormValue;
        $this->Order->CurrentValue = $this->Order->FormValue;
        $this->Form->CurrentValue = $this->Form->FormValue;
        $this->ResType->CurrentValue = $this->ResType->FormValue;
        $this->UnitCD->CurrentValue = $this->UnitCD->FormValue;
        $this->RefValue->CurrentValue = $this->RefValue->FormValue;
        $this->Sample->CurrentValue = $this->Sample->FormValue;
        $this->NoD->CurrentValue = $this->NoD->FormValue;
        $this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
        $this->Formula->CurrentValue = $this->Formula->FormValue;
        $this->Inactive->CurrentValue = $this->Inactive->FormValue;
        $this->Outsource->CurrentValue = $this->Outsource->FormValue;
        $this->CollSample->CurrentValue = $this->CollSample->FormValue;
        $this->TestType->CurrentValue = $this->TestType->FormValue;
        $this->NoHeading->CurrentValue = $this->NoHeading->FormValue;
        $this->ChemicalCode->CurrentValue = $this->ChemicalCode->FormValue;
        $this->ChemicalName->CurrentValue = $this->ChemicalName->FormValue;
        $this->Utilaization->CurrentValue = $this->Utilaization->FormValue;
        $this->Interpretation->CurrentValue = $this->Interpretation->FormValue;
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
        $this->Id->setDbValue($row['Id']);
        $this->CODE->setDbValue($row['CODE']);
        $this->SERVICE->setDbValue($row['SERVICE']);
        $this->UNITS->setDbValue($row['UNITS']);
        $this->AMOUNT->setDbValue($row['AMOUNT']);
        $this->SERVICE_TYPE->setDbValue($row['SERVICE_TYPE']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->mas_services_billingcol->setDbValue($row['mas_services_billingcol']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrSharePer->setDbValue($row['DrSharePer']);
        $this->HospSharePer->setDbValue($row['HospSharePer']);
        $this->HospID->setDbValue($row['HospID']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->ChemicalCode->setDbValue($row['ChemicalCode']);
        $this->ChemicalName->setDbValue($row['ChemicalName']);
        $this->Utilaization->setDbValue($row['Utilaization']);
        $this->Interpretation->setDbValue($row['Interpretation']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Id'] = null;
        $row['CODE'] = null;
        $row['SERVICE'] = null;
        $row['UNITS'] = null;
        $row['AMOUNT'] = null;
        $row['SERVICE_TYPE'] = null;
        $row['DEPARTMENT'] = null;
        $row['Created'] = null;
        $row['CreatedDateTime'] = null;
        $row['Modified'] = null;
        $row['ModifiedDateTime'] = null;
        $row['mas_services_billingcol'] = null;
        $row['DrShareAmount'] = null;
        $row['HospShareAmount'] = null;
        $row['DrSharePer'] = null;
        $row['HospSharePer'] = null;
        $row['HospID'] = null;
        $row['TestSubCd'] = null;
        $row['Method'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['ResType'] = null;
        $row['UnitCD'] = null;
        $row['RefValue'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['Outsource'] = null;
        $row['CollSample'] = null;
        $row['TestType'] = null;
        $row['NoHeading'] = null;
        $row['ChemicalCode'] = null;
        $row['ChemicalName'] = null;
        $row['Utilaization'] = null;
        $row['Interpretation'] = null;
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
        if ($this->AMOUNT->FormValue == $this->AMOUNT->CurrentValue && is_numeric(ConvertToFloatString($this->AMOUNT->CurrentValue))) {
            $this->AMOUNT->CurrentValue = ConvertToFloatString($this->AMOUNT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue))) {
            $this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue))) {
            $this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Id

        // CODE

        // SERVICE

        // UNITS

        // AMOUNT

        // SERVICE_TYPE

        // DEPARTMENT

        // Created

        // CreatedDateTime

        // Modified

        // ModifiedDateTime

        // mas_services_billingcol

        // DrShareAmount

        // HospShareAmount

        // DrSharePer

        // HospSharePer

        // HospID

        // TestSubCd

        // Method

        // Order

        // Form

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // Outsource

        // CollSample

        // TestType

        // NoHeading

        // ChemicalCode

        // ChemicalName

        // Utilaization

        // Interpretation
        if ($this->RowType == ROWTYPE_VIEW) {
            // Id
            $this->Id->ViewValue = $this->Id->CurrentValue;
            $this->Id->ViewCustomAttributes = "";

            // CODE
            $this->CODE->ViewValue = $this->CODE->CurrentValue;
            $this->CODE->ViewCustomAttributes = "";

            // SERVICE
            $this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
            $this->SERVICE->ViewCustomAttributes = "";

            // UNITS
            $this->UNITS->ViewValue = $this->UNITS->CurrentValue;
            $this->UNITS->ViewValue = FormatNumber($this->UNITS->ViewValue, 0, -2, -2, -2);
            $this->UNITS->ViewCustomAttributes = "";

            // AMOUNT
            $this->AMOUNT->ViewValue = $this->AMOUNT->CurrentValue;
            $this->AMOUNT->ViewValue = FormatNumber($this->AMOUNT->ViewValue, $this->AMOUNT->DefaultDecimalPrecision);
            $this->AMOUNT->ViewCustomAttributes = "";

            // SERVICE_TYPE
            $curVal = trim(strval($this->SERVICE_TYPE->CurrentValue));
            if ($curVal != "") {
                $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
                if ($this->SERVICE_TYPE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SERVICE_TYPE->Lookup->renderViewRow($rswrk[0]);
                        $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->displayValue($arwrk);
                    } else {
                        $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
                    }
                }
            } else {
                $this->SERVICE_TYPE->ViewValue = null;
            }
            $this->SERVICE_TYPE->ViewCustomAttributes = "";

            // DEPARTMENT
            $curVal = trim(strval($this->DEPARTMENT->CurrentValue));
            if ($curVal != "") {
                $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->lookupCacheOption($curVal);
                if ($this->DEPARTMENT->ViewValue === null) { // Lookup from database
                    $filterWrk = "`department`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DEPARTMENT->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DEPARTMENT->Lookup->renderViewRow($rswrk[0]);
                        $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->displayValue($arwrk);
                    } else {
                        $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
                    }
                }
            } else {
                $this->DEPARTMENT->ViewValue = null;
            }
            $this->DEPARTMENT->ViewCustomAttributes = "";

            // Modified
            $this->Modified->ViewValue = $this->Modified->CurrentValue;
            $this->Modified->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // mas_services_billingcol
            $this->mas_services_billingcol->ViewValue = $this->mas_services_billingcol->CurrentValue;
            $this->mas_services_billingcol->ViewCustomAttributes = "";

            // DrShareAmount
            $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
            $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareAmount->ViewCustomAttributes = "";

            // HospShareAmount
            $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
            $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
            $this->HospShareAmount->ViewCustomAttributes = "";

            // DrSharePer
            $this->DrSharePer->ViewValue = $this->DrSharePer->CurrentValue;
            $this->DrSharePer->ViewValue = FormatNumber($this->DrSharePer->ViewValue, 0, -2, -2, -2);
            $this->DrSharePer->ViewCustomAttributes = "";

            // HospSharePer
            $this->HospSharePer->ViewValue = $this->HospSharePer->CurrentValue;
            $this->HospSharePer->ViewValue = FormatNumber($this->HospSharePer->ViewValue, 0, -2, -2, -2);
            $this->HospSharePer->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // UnitCD
            $this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
            $this->UnitCD->ViewCustomAttributes = "";

            // RefValue
            $this->RefValue->ViewValue = $this->RefValue->CurrentValue;
            $this->RefValue->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Formula
            $this->Formula->ViewValue = $this->Formula->CurrentValue;
            $this->Formula->ViewCustomAttributes = "";

            // Inactive
            $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
            $this->Inactive->ViewCustomAttributes = "";

            // Outsource
            $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
            $this->Outsource->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // TestType
            if (strval($this->TestType->CurrentValue) != "") {
                $this->TestType->ViewValue = $this->TestType->optionCaption($this->TestType->CurrentValue);
            } else {
                $this->TestType->ViewValue = null;
            }
            $this->TestType->ViewCustomAttributes = "";

            // NoHeading
            $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
            $this->NoHeading->ViewCustomAttributes = "";

            // ChemicalCode
            $this->ChemicalCode->ViewValue = $this->ChemicalCode->CurrentValue;
            $this->ChemicalCode->ViewCustomAttributes = "";

            // ChemicalName
            $this->ChemicalName->ViewValue = $this->ChemicalName->CurrentValue;
            $this->ChemicalName->ViewCustomAttributes = "";

            // Utilaization
            $this->Utilaization->ViewValue = $this->Utilaization->CurrentValue;
            $this->Utilaization->ViewCustomAttributes = "";

            // Interpretation
            $this->Interpretation->ViewValue = $this->Interpretation->CurrentValue;
            $this->Interpretation->ViewCustomAttributes = "";

            // Id
            $this->Id->LinkCustomAttributes = "";
            $this->Id->HrefValue = "";
            $this->Id->TooltipValue = "";

            // CODE
            $this->CODE->LinkCustomAttributes = "";
            $this->CODE->HrefValue = "";
            $this->CODE->TooltipValue = "";

            // SERVICE
            $this->SERVICE->LinkCustomAttributes = "";
            $this->SERVICE->HrefValue = "";
            $this->SERVICE->TooltipValue = "";

            // UNITS
            $this->UNITS->LinkCustomAttributes = "";
            $this->UNITS->HrefValue = "";
            $this->UNITS->TooltipValue = "";

            // AMOUNT
            $this->AMOUNT->LinkCustomAttributes = "";
            $this->AMOUNT->HrefValue = "";
            $this->AMOUNT->TooltipValue = "";

            // SERVICE_TYPE
            $this->SERVICE_TYPE->LinkCustomAttributes = "";
            $this->SERVICE_TYPE->HrefValue = "";
            $this->SERVICE_TYPE->TooltipValue = "";

            // DEPARTMENT
            $this->DEPARTMENT->LinkCustomAttributes = "";
            $this->DEPARTMENT->HrefValue = "";
            $this->DEPARTMENT->TooltipValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";
            $this->Modified->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // mas_services_billingcol
            $this->mas_services_billingcol->LinkCustomAttributes = "";
            $this->mas_services_billingcol->HrefValue = "";
            $this->mas_services_billingcol->TooltipValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";
            $this->DrShareAmount->TooltipValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";
            $this->HospShareAmount->TooltipValue = "";

            // DrSharePer
            $this->DrSharePer->LinkCustomAttributes = "";
            $this->DrSharePer->HrefValue = "";
            $this->DrSharePer->TooltipValue = "";

            // HospSharePer
            $this->HospSharePer->LinkCustomAttributes = "";
            $this->HospSharePer->HrefValue = "";
            $this->HospSharePer->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // UnitCD
            $this->UnitCD->LinkCustomAttributes = "";
            $this->UnitCD->HrefValue = "";
            $this->UnitCD->TooltipValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";
            $this->RefValue->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Formula
            $this->Formula->LinkCustomAttributes = "";
            $this->Formula->HrefValue = "";
            $this->Formula->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // Outsource
            $this->Outsource->LinkCustomAttributes = "";
            $this->Outsource->HrefValue = "";
            $this->Outsource->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // NoHeading
            $this->NoHeading->LinkCustomAttributes = "";
            $this->NoHeading->HrefValue = "";
            $this->NoHeading->TooltipValue = "";

            // ChemicalCode
            $this->ChemicalCode->LinkCustomAttributes = "";
            $this->ChemicalCode->HrefValue = "";
            $this->ChemicalCode->TooltipValue = "";

            // ChemicalName
            $this->ChemicalName->LinkCustomAttributes = "";
            $this->ChemicalName->HrefValue = "";
            $this->ChemicalName->TooltipValue = "";

            // Utilaization
            $this->Utilaization->LinkCustomAttributes = "";
            $this->Utilaization->HrefValue = "";
            $this->Utilaization->TooltipValue = "";

            // Interpretation
            $this->Interpretation->LinkCustomAttributes = "";
            $this->Interpretation->HrefValue = "";
            $this->Interpretation->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // Id
            $this->Id->EditAttrs["class"] = "form-control";
            $this->Id->EditCustomAttributes = "";
            $this->Id->EditValue = $this->Id->CurrentValue;
            $this->Id->ViewCustomAttributes = "";

            // CODE
            $this->CODE->EditAttrs["class"] = "form-control";
            $this->CODE->EditCustomAttributes = "";
            if (!$this->CODE->Raw) {
                $this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
            }
            $this->CODE->EditValue = HtmlEncode($this->CODE->CurrentValue);
            $this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

            // SERVICE
            $this->SERVICE->EditAttrs["class"] = "form-control";
            $this->SERVICE->EditCustomAttributes = "";
            if (!$this->SERVICE->Raw) {
                $this->SERVICE->CurrentValue = HtmlDecode($this->SERVICE->CurrentValue);
            }
            $this->SERVICE->EditValue = HtmlEncode($this->SERVICE->CurrentValue);
            $this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

            // UNITS
            $this->UNITS->EditAttrs["class"] = "form-control";
            $this->UNITS->EditCustomAttributes = "";
            $this->UNITS->EditValue = HtmlEncode($this->UNITS->CurrentValue);
            $this->UNITS->PlaceHolder = RemoveHtml($this->UNITS->caption());

            // AMOUNT
            $this->AMOUNT->EditAttrs["class"] = "form-control";
            $this->AMOUNT->EditCustomAttributes = "";
            $this->AMOUNT->EditValue = HtmlEncode($this->AMOUNT->CurrentValue);
            $this->AMOUNT->PlaceHolder = RemoveHtml($this->AMOUNT->caption());
            if (strval($this->AMOUNT->EditValue) != "" && is_numeric($this->AMOUNT->EditValue)) {
                $this->AMOUNT->EditValue = FormatNumber($this->AMOUNT->EditValue, -2, -1, -2, 0);
            }

            // SERVICE_TYPE
            $this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
            $this->SERVICE_TYPE->EditCustomAttributes = "";
            $curVal = trim(strval($this->SERVICE_TYPE->CurrentValue));
            if ($curVal != "") {
                $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
            } else {
                $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->Lookup !== null && is_array($this->SERVICE_TYPE->Lookup->Options) ? $curVal : null;
            }
            if ($this->SERVICE_TYPE->ViewValue !== null) { // Load from cache
                $this->SERVICE_TYPE->EditValue = array_values($this->SERVICE_TYPE->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`name`" . SearchString("=", $this->SERVICE_TYPE->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->SERVICE_TYPE->EditValue = $arwrk;
            }
            $this->SERVICE_TYPE->PlaceHolder = RemoveHtml($this->SERVICE_TYPE->caption());

            // DEPARTMENT
            $this->DEPARTMENT->EditAttrs["class"] = "form-control";
            $this->DEPARTMENT->EditCustomAttributes = "";
            $curVal = trim(strval($this->DEPARTMENT->CurrentValue));
            if ($curVal != "") {
                $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->lookupCacheOption($curVal);
            } else {
                $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->Lookup !== null && is_array($this->DEPARTMENT->Lookup->Options) ? $curVal : null;
            }
            if ($this->DEPARTMENT->ViewValue !== null) { // Load from cache
                $this->DEPARTMENT->EditValue = array_values($this->DEPARTMENT->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`department`" . SearchString("=", $this->DEPARTMENT->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DEPARTMENT->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DEPARTMENT->EditValue = $arwrk;
            }
            $this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

            // Modified

            // ModifiedDateTime

            // mas_services_billingcol
            $this->mas_services_billingcol->EditAttrs["class"] = "form-control";
            $this->mas_services_billingcol->EditCustomAttributes = "";
            if (!$this->mas_services_billingcol->Raw) {
                $this->mas_services_billingcol->CurrentValue = HtmlDecode($this->mas_services_billingcol->CurrentValue);
            }
            $this->mas_services_billingcol->EditValue = HtmlEncode($this->mas_services_billingcol->CurrentValue);
            $this->mas_services_billingcol->PlaceHolder = RemoveHtml($this->mas_services_billingcol->caption());

            // DrShareAmount
            $this->DrShareAmount->EditAttrs["class"] = "form-control";
            $this->DrShareAmount->EditCustomAttributes = "";
            $this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
            $this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
            if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
                $this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
            }

            // HospShareAmount
            $this->HospShareAmount->EditAttrs["class"] = "form-control";
            $this->HospShareAmount->EditCustomAttributes = "";
            $this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
            $this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
            if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
                $this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
            }

            // DrSharePer
            $this->DrSharePer->EditAttrs["class"] = "form-control";
            $this->DrSharePer->EditCustomAttributes = "";
            $this->DrSharePer->EditValue = HtmlEncode($this->DrSharePer->CurrentValue);
            $this->DrSharePer->PlaceHolder = RemoveHtml($this->DrSharePer->caption());

            // HospSharePer
            $this->HospSharePer->EditAttrs["class"] = "form-control";
            $this->HospSharePer->EditCustomAttributes = "";
            $this->HospSharePer->EditValue = HtmlEncode($this->HospSharePer->CurrentValue);
            $this->HospSharePer->PlaceHolder = RemoveHtml($this->HospSharePer->caption());

            // HospID

            // TestSubCd
            $this->TestSubCd->EditAttrs["class"] = "form-control";
            $this->TestSubCd->EditCustomAttributes = "";
            if (!$this->TestSubCd->Raw) {
                $this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
            }
            $this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
            $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
            }

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            $this->Form->EditValue = HtmlEncode($this->Form->CurrentValue);
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // ResType
            $this->ResType->EditAttrs["class"] = "form-control";
            $this->ResType->EditCustomAttributes = "";
            if (!$this->ResType->Raw) {
                $this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
            }
            $this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
            $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

            // UnitCD
            $this->UnitCD->EditAttrs["class"] = "form-control";
            $this->UnitCD->EditCustomAttributes = "";
            if (!$this->UnitCD->Raw) {
                $this->UnitCD->CurrentValue = HtmlDecode($this->UnitCD->CurrentValue);
            }
            $this->UnitCD->EditValue = HtmlEncode($this->UnitCD->CurrentValue);
            $this->UnitCD->PlaceHolder = RemoveHtml($this->UnitCD->caption());

            // RefValue
            $this->RefValue->EditAttrs["class"] = "form-control";
            $this->RefValue->EditCustomAttributes = "";
            $this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
            $this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

            // Sample
            $this->Sample->EditAttrs["class"] = "form-control";
            $this->Sample->EditCustomAttributes = "";
            if (!$this->Sample->Raw) {
                $this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
            }
            $this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
            $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

            // NoD
            $this->NoD->EditAttrs["class"] = "form-control";
            $this->NoD->EditCustomAttributes = "";
            $this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
            $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
            if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
                $this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
            }

            // BillOrder
            $this->BillOrder->EditAttrs["class"] = "form-control";
            $this->BillOrder->EditCustomAttributes = "";
            $this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
            $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
            if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
                $this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
            }

            // Formula
            $this->Formula->EditAttrs["class"] = "form-control";
            $this->Formula->EditCustomAttributes = "";
            $this->Formula->EditValue = HtmlEncode($this->Formula->CurrentValue);
            $this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

            // Inactive
            $this->Inactive->EditAttrs["class"] = "form-control";
            $this->Inactive->EditCustomAttributes = "";
            if (!$this->Inactive->Raw) {
                $this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
            }
            $this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
            $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

            // Outsource
            $this->Outsource->EditAttrs["class"] = "form-control";
            $this->Outsource->EditCustomAttributes = "";
            if (!$this->Outsource->Raw) {
                $this->Outsource->CurrentValue = HtmlDecode($this->Outsource->CurrentValue);
            }
            $this->Outsource->EditValue = HtmlEncode($this->Outsource->CurrentValue);
            $this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

            // CollSample
            $this->CollSample->EditAttrs["class"] = "form-control";
            $this->CollSample->EditCustomAttributes = "";
            if (!$this->CollSample->Raw) {
                $this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
            }
            $this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
            $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

            // TestType
            $this->TestType->EditAttrs["class"] = "form-control";
            $this->TestType->EditCustomAttributes = "";
            $this->TestType->EditValue = $this->TestType->options(true);
            $this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

            // NoHeading
            $this->NoHeading->EditAttrs["class"] = "form-control";
            $this->NoHeading->EditCustomAttributes = "";
            if (!$this->NoHeading->Raw) {
                $this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
            }
            $this->NoHeading->EditValue = HtmlEncode($this->NoHeading->CurrentValue);
            $this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

            // ChemicalCode
            $this->ChemicalCode->EditAttrs["class"] = "form-control";
            $this->ChemicalCode->EditCustomAttributes = "";
            if (!$this->ChemicalCode->Raw) {
                $this->ChemicalCode->CurrentValue = HtmlDecode($this->ChemicalCode->CurrentValue);
            }
            $this->ChemicalCode->EditValue = HtmlEncode($this->ChemicalCode->CurrentValue);
            $this->ChemicalCode->PlaceHolder = RemoveHtml($this->ChemicalCode->caption());

            // ChemicalName
            $this->ChemicalName->EditAttrs["class"] = "form-control";
            $this->ChemicalName->EditCustomAttributes = "";
            if (!$this->ChemicalName->Raw) {
                $this->ChemicalName->CurrentValue = HtmlDecode($this->ChemicalName->CurrentValue);
            }
            $this->ChemicalName->EditValue = HtmlEncode($this->ChemicalName->CurrentValue);
            $this->ChemicalName->PlaceHolder = RemoveHtml($this->ChemicalName->caption());

            // Utilaization
            $this->Utilaization->EditAttrs["class"] = "form-control";
            $this->Utilaization->EditCustomAttributes = "";
            if (!$this->Utilaization->Raw) {
                $this->Utilaization->CurrentValue = HtmlDecode($this->Utilaization->CurrentValue);
            }
            $this->Utilaization->EditValue = HtmlEncode($this->Utilaization->CurrentValue);
            $this->Utilaization->PlaceHolder = RemoveHtml($this->Utilaization->caption());

            // Interpretation
            $this->Interpretation->EditAttrs["class"] = "form-control";
            $this->Interpretation->EditCustomAttributes = "";
            $this->Interpretation->EditValue = HtmlEncode($this->Interpretation->CurrentValue);
            $this->Interpretation->PlaceHolder = RemoveHtml($this->Interpretation->caption());

            // Edit refer script

            // Id
            $this->Id->LinkCustomAttributes = "";
            $this->Id->HrefValue = "";

            // CODE
            $this->CODE->LinkCustomAttributes = "";
            $this->CODE->HrefValue = "";

            // SERVICE
            $this->SERVICE->LinkCustomAttributes = "";
            $this->SERVICE->HrefValue = "";

            // UNITS
            $this->UNITS->LinkCustomAttributes = "";
            $this->UNITS->HrefValue = "";

            // AMOUNT
            $this->AMOUNT->LinkCustomAttributes = "";
            $this->AMOUNT->HrefValue = "";

            // SERVICE_TYPE
            $this->SERVICE_TYPE->LinkCustomAttributes = "";
            $this->SERVICE_TYPE->HrefValue = "";

            // DEPARTMENT
            $this->DEPARTMENT->LinkCustomAttributes = "";
            $this->DEPARTMENT->HrefValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";

            // mas_services_billingcol
            $this->mas_services_billingcol->LinkCustomAttributes = "";
            $this->mas_services_billingcol->HrefValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";

            // DrSharePer
            $this->DrSharePer->LinkCustomAttributes = "";
            $this->DrSharePer->HrefValue = "";

            // HospSharePer
            $this->HospSharePer->LinkCustomAttributes = "";
            $this->HospSharePer->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";

            // UnitCD
            $this->UnitCD->LinkCustomAttributes = "";
            $this->UnitCD->HrefValue = "";

            // RefValue
            $this->RefValue->LinkCustomAttributes = "";
            $this->RefValue->HrefValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";

            // Formula
            $this->Formula->LinkCustomAttributes = "";
            $this->Formula->HrefValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";

            // Outsource
            $this->Outsource->LinkCustomAttributes = "";
            $this->Outsource->HrefValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";

            // NoHeading
            $this->NoHeading->LinkCustomAttributes = "";
            $this->NoHeading->HrefValue = "";

            // ChemicalCode
            $this->ChemicalCode->LinkCustomAttributes = "";
            $this->ChemicalCode->HrefValue = "";

            // ChemicalName
            $this->ChemicalName->LinkCustomAttributes = "";
            $this->ChemicalName->HrefValue = "";

            // Utilaization
            $this->Utilaization->LinkCustomAttributes = "";
            $this->Utilaization->HrefValue = "";

            // Interpretation
            $this->Interpretation->LinkCustomAttributes = "";
            $this->Interpretation->HrefValue = "";
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
        if ($this->Id->Required) {
            if (!$this->Id->IsDetailKey && EmptyValue($this->Id->FormValue)) {
                $this->Id->addErrorMessage(str_replace("%s", $this->Id->caption(), $this->Id->RequiredErrorMessage));
            }
        }
        if ($this->CODE->Required) {
            if (!$this->CODE->IsDetailKey && EmptyValue($this->CODE->FormValue)) {
                $this->CODE->addErrorMessage(str_replace("%s", $this->CODE->caption(), $this->CODE->RequiredErrorMessage));
            }
        }
        if ($this->SERVICE->Required) {
            if (!$this->SERVICE->IsDetailKey && EmptyValue($this->SERVICE->FormValue)) {
                $this->SERVICE->addErrorMessage(str_replace("%s", $this->SERVICE->caption(), $this->SERVICE->RequiredErrorMessage));
            }
        }
        if ($this->UNITS->Required) {
            if (!$this->UNITS->IsDetailKey && EmptyValue($this->UNITS->FormValue)) {
                $this->UNITS->addErrorMessage(str_replace("%s", $this->UNITS->caption(), $this->UNITS->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->UNITS->FormValue)) {
            $this->UNITS->addErrorMessage($this->UNITS->getErrorMessage(false));
        }
        if ($this->AMOUNT->Required) {
            if (!$this->AMOUNT->IsDetailKey && EmptyValue($this->AMOUNT->FormValue)) {
                $this->AMOUNT->addErrorMessage(str_replace("%s", $this->AMOUNT->caption(), $this->AMOUNT->RequiredErrorMessage));
            }
        }
        if ($this->SERVICE_TYPE->Required) {
            if (!$this->SERVICE_TYPE->IsDetailKey && EmptyValue($this->SERVICE_TYPE->FormValue)) {
                $this->SERVICE_TYPE->addErrorMessage(str_replace("%s", $this->SERVICE_TYPE->caption(), $this->SERVICE_TYPE->RequiredErrorMessage));
            }
        }
        if ($this->DEPARTMENT->Required) {
            if (!$this->DEPARTMENT->IsDetailKey && EmptyValue($this->DEPARTMENT->FormValue)) {
                $this->DEPARTMENT->addErrorMessage(str_replace("%s", $this->DEPARTMENT->caption(), $this->DEPARTMENT->RequiredErrorMessage));
            }
        }
        if ($this->Modified->Required) {
            if (!$this->Modified->IsDetailKey && EmptyValue($this->Modified->FormValue)) {
                $this->Modified->addErrorMessage(str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->mas_services_billingcol->Required) {
            if (!$this->mas_services_billingcol->IsDetailKey && EmptyValue($this->mas_services_billingcol->FormValue)) {
                $this->mas_services_billingcol->addErrorMessage(str_replace("%s", $this->mas_services_billingcol->caption(), $this->mas_services_billingcol->RequiredErrorMessage));
            }
        }
        if ($this->DrShareAmount->Required) {
            if (!$this->DrShareAmount->IsDetailKey && EmptyValue($this->DrShareAmount->FormValue)) {
                $this->DrShareAmount->addErrorMessage(str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DrShareAmount->FormValue)) {
            $this->DrShareAmount->addErrorMessage($this->DrShareAmount->getErrorMessage(false));
        }
        if ($this->HospShareAmount->Required) {
            if (!$this->HospShareAmount->IsDetailKey && EmptyValue($this->HospShareAmount->FormValue)) {
                $this->HospShareAmount->addErrorMessage(str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->HospShareAmount->FormValue)) {
            $this->HospShareAmount->addErrorMessage($this->HospShareAmount->getErrorMessage(false));
        }
        if ($this->DrSharePer->Required) {
            if (!$this->DrSharePer->IsDetailKey && EmptyValue($this->DrSharePer->FormValue)) {
                $this->DrSharePer->addErrorMessage(str_replace("%s", $this->DrSharePer->caption(), $this->DrSharePer->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrSharePer->FormValue)) {
            $this->DrSharePer->addErrorMessage($this->DrSharePer->getErrorMessage(false));
        }
        if ($this->HospSharePer->Required) {
            if (!$this->HospSharePer->IsDetailKey && EmptyValue($this->HospSharePer->FormValue)) {
                $this->HospSharePer->addErrorMessage(str_replace("%s", $this->HospSharePer->caption(), $this->HospSharePer->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospSharePer->FormValue)) {
            $this->HospSharePer->addErrorMessage($this->HospSharePer->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->TestSubCd->Required) {
            if (!$this->TestSubCd->IsDetailKey && EmptyValue($this->TestSubCd->FormValue)) {
                $this->TestSubCd->addErrorMessage(str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
            }
        }
        if ($this->Method->Required) {
            if (!$this->Method->IsDetailKey && EmptyValue($this->Method->FormValue)) {
                $this->Method->addErrorMessage(str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
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
        if ($this->Form->Required) {
            if (!$this->Form->IsDetailKey && EmptyValue($this->Form->FormValue)) {
                $this->Form->addErrorMessage(str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
            }
        }
        if ($this->ResType->Required) {
            if (!$this->ResType->IsDetailKey && EmptyValue($this->ResType->FormValue)) {
                $this->ResType->addErrorMessage(str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
            }
        }
        if ($this->UnitCD->Required) {
            if (!$this->UnitCD->IsDetailKey && EmptyValue($this->UnitCD->FormValue)) {
                $this->UnitCD->addErrorMessage(str_replace("%s", $this->UnitCD->caption(), $this->UnitCD->RequiredErrorMessage));
            }
        }
        if ($this->RefValue->Required) {
            if (!$this->RefValue->IsDetailKey && EmptyValue($this->RefValue->FormValue)) {
                $this->RefValue->addErrorMessage(str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
            }
        }
        if ($this->Sample->Required) {
            if (!$this->Sample->IsDetailKey && EmptyValue($this->Sample->FormValue)) {
                $this->Sample->addErrorMessage(str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
            }
        }
        if ($this->NoD->Required) {
            if (!$this->NoD->IsDetailKey && EmptyValue($this->NoD->FormValue)) {
                $this->NoD->addErrorMessage(str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NoD->FormValue)) {
            $this->NoD->addErrorMessage($this->NoD->getErrorMessage(false));
        }
        if ($this->BillOrder->Required) {
            if (!$this->BillOrder->IsDetailKey && EmptyValue($this->BillOrder->FormValue)) {
                $this->BillOrder->addErrorMessage(str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillOrder->FormValue)) {
            $this->BillOrder->addErrorMessage($this->BillOrder->getErrorMessage(false));
        }
        if ($this->Formula->Required) {
            if (!$this->Formula->IsDetailKey && EmptyValue($this->Formula->FormValue)) {
                $this->Formula->addErrorMessage(str_replace("%s", $this->Formula->caption(), $this->Formula->RequiredErrorMessage));
            }
        }
        if ($this->Inactive->Required) {
            if (!$this->Inactive->IsDetailKey && EmptyValue($this->Inactive->FormValue)) {
                $this->Inactive->addErrorMessage(str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
            }
        }
        if ($this->Outsource->Required) {
            if (!$this->Outsource->IsDetailKey && EmptyValue($this->Outsource->FormValue)) {
                $this->Outsource->addErrorMessage(str_replace("%s", $this->Outsource->caption(), $this->Outsource->RequiredErrorMessage));
            }
        }
        if ($this->CollSample->Required) {
            if (!$this->CollSample->IsDetailKey && EmptyValue($this->CollSample->FormValue)) {
                $this->CollSample->addErrorMessage(str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
            }
        }
        if ($this->TestType->Required) {
            if (!$this->TestType->IsDetailKey && EmptyValue($this->TestType->FormValue)) {
                $this->TestType->addErrorMessage(str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
            }
        }
        if ($this->NoHeading->Required) {
            if (!$this->NoHeading->IsDetailKey && EmptyValue($this->NoHeading->FormValue)) {
                $this->NoHeading->addErrorMessage(str_replace("%s", $this->NoHeading->caption(), $this->NoHeading->RequiredErrorMessage));
            }
        }
        if ($this->ChemicalCode->Required) {
            if (!$this->ChemicalCode->IsDetailKey && EmptyValue($this->ChemicalCode->FormValue)) {
                $this->ChemicalCode->addErrorMessage(str_replace("%s", $this->ChemicalCode->caption(), $this->ChemicalCode->RequiredErrorMessage));
            }
        }
        if ($this->ChemicalName->Required) {
            if (!$this->ChemicalName->IsDetailKey && EmptyValue($this->ChemicalName->FormValue)) {
                $this->ChemicalName->addErrorMessage(str_replace("%s", $this->ChemicalName->caption(), $this->ChemicalName->RequiredErrorMessage));
            }
        }
        if ($this->Utilaization->Required) {
            if (!$this->Utilaization->IsDetailKey && EmptyValue($this->Utilaization->FormValue)) {
                $this->Utilaization->addErrorMessage(str_replace("%s", $this->Utilaization->caption(), $this->Utilaization->RequiredErrorMessage));
            }
        }
        if ($this->Interpretation->Required) {
            if (!$this->Interpretation->IsDetailKey && EmptyValue($this->Interpretation->FormValue)) {
                $this->Interpretation->addErrorMessage(str_replace("%s", $this->Interpretation->caption(), $this->Interpretation->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("LabProfileDetailsGrid");
        if (in_array("lab_profile_details", $detailTblVar) && $detailPage->DetailEdit) {
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        if ($this->CODE->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`CODE` = '" . AdjustSql($this->CODE->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->CODE->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->CODE->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                $rsChk->closeCursor();
                return false;
            }
        }
        if ($this->SERVICE->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`SERVICE` = '" . AdjustSql($this->SERVICE->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->SERVICE->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->SERVICE->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                $rsChk->closeCursor();
                return false;
            }
        }
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Begin transaction
            if ($this->getCurrentDetailTable() != "") {
                $conn->beginTransaction();
            }

            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // CODE
            $this->CODE->setDbValueDef($rsnew, $this->CODE->CurrentValue, null, $this->CODE->ReadOnly);

            // SERVICE
            $this->SERVICE->setDbValueDef($rsnew, $this->SERVICE->CurrentValue, null, $this->SERVICE->ReadOnly);

            // UNITS
            $this->UNITS->setDbValueDef($rsnew, $this->UNITS->CurrentValue, null, $this->UNITS->ReadOnly);

            // AMOUNT
            $this->AMOUNT->setDbValueDef($rsnew, $this->AMOUNT->CurrentValue, null, $this->AMOUNT->ReadOnly);

            // SERVICE_TYPE
            $this->SERVICE_TYPE->setDbValueDef($rsnew, $this->SERVICE_TYPE->CurrentValue, null, $this->SERVICE_TYPE->ReadOnly);

            // DEPARTMENT
            $this->DEPARTMENT->setDbValueDef($rsnew, $this->DEPARTMENT->CurrentValue, null, $this->DEPARTMENT->ReadOnly);

            // Modified
            $this->Modified->CurrentValue = CurrentUserName();
            $this->Modified->setDbValueDef($rsnew, $this->Modified->CurrentValue, null);

            // ModifiedDateTime
            $this->ModifiedDateTime->CurrentValue = CurrentDateTime();
            $this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, null);

            // mas_services_billingcol
            $this->mas_services_billingcol->setDbValueDef($rsnew, $this->mas_services_billingcol->CurrentValue, null, $this->mas_services_billingcol->ReadOnly);

            // DrShareAmount
            $this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, null, $this->DrShareAmount->ReadOnly);

            // HospShareAmount
            $this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, null, $this->HospShareAmount->ReadOnly);

            // DrSharePer
            $this->DrSharePer->setDbValueDef($rsnew, $this->DrSharePer->CurrentValue, null, $this->DrSharePer->ReadOnly);

            // HospSharePer
            $this->HospSharePer->setDbValueDef($rsnew, $this->HospSharePer->CurrentValue, null, $this->HospSharePer->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // TestSubCd
            $this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, null, $this->TestSubCd->ReadOnly);

            // Method
            $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, $this->Method->ReadOnly);

            // Order
            $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, null, $this->Order->ReadOnly);

            // Form
            $this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, null, $this->Form->ReadOnly);

            // ResType
            $this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, null, $this->ResType->ReadOnly);

            // UnitCD
            $this->UnitCD->setDbValueDef($rsnew, $this->UnitCD->CurrentValue, null, $this->UnitCD->ReadOnly);

            // RefValue
            $this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, null, $this->RefValue->ReadOnly);

            // Sample
            $this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, null, $this->Sample->ReadOnly);

            // NoD
            $this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, null, $this->NoD->ReadOnly);

            // BillOrder
            $this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, null, $this->BillOrder->ReadOnly);

            // Formula
            $this->Formula->setDbValueDef($rsnew, $this->Formula->CurrentValue, null, $this->Formula->ReadOnly);

            // Inactive
            $this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, null, $this->Inactive->ReadOnly);

            // Outsource
            $this->Outsource->setDbValueDef($rsnew, $this->Outsource->CurrentValue, null, $this->Outsource->ReadOnly);

            // CollSample
            $this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, null, $this->CollSample->ReadOnly);

            // TestType
            $this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, null, $this->TestType->ReadOnly);

            // NoHeading
            $this->NoHeading->setDbValueDef($rsnew, $this->NoHeading->CurrentValue, null, $this->NoHeading->ReadOnly);

            // ChemicalCode
            $this->ChemicalCode->setDbValueDef($rsnew, $this->ChemicalCode->CurrentValue, null, $this->ChemicalCode->ReadOnly);

            // ChemicalName
            $this->ChemicalName->setDbValueDef($rsnew, $this->ChemicalName->CurrentValue, null, $this->ChemicalName->ReadOnly);

            // Utilaization
            $this->Utilaization->setDbValueDef($rsnew, $this->Utilaization->CurrentValue, null, $this->Utilaization->ReadOnly);

            // Interpretation
            $this->Interpretation->setDbValueDef($rsnew, $this->Interpretation->CurrentValue, null, $this->Interpretation->ReadOnly);

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

                // Update detail records
                $detailTblVar = explode(",", $this->getCurrentDetailTable());
                if ($editRow) {
                    $detailPage = Container("LabProfileDetailsGrid");
                    if (in_array("lab_profile_details", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "lab_profile_details"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }

                // Commit/Rollback transaction
                if ($this->getCurrentDetailTable() != "") {
                    if ($editRow) {
                        $conn->commit(); // Commit transaction
                    } else {
                        $conn->rollback(); // Rollback transaction
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
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
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
            if (in_array("lab_profile_details", $detailTblVar)) {
                $detailPageObj = Container("LabProfileDetailsGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->ProfileCode->IsDetailKey = true;
                    $detailPageObj->ProfileCode->CurrentValue = $this->CODE->CurrentValue;
                    $detailPageObj->ProfileCode->setSessionValue($detailPageObj->ProfileCode->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewLabProfileList"), "", $this->TableVar, true);
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
                case "x_SERVICE_TYPE":
                    break;
                case "x_DEPARTMENT":
                    break;
                case "x_TestType":
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
