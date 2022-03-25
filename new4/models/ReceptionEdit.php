<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ReceptionEdit extends Reception
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'reception';

    // Page object name
    public $PageObjName = "ReceptionEdit";

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

        // Table object (reception)
        if (!isset($GLOBALS["reception"]) || get_class($GLOBALS["reception"]) == PROJECT_NAMESPACE . "reception") {
            $GLOBALS["reception"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'reception');
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
                $doc = new $class(Container("reception"));
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
                    if ($pageName == "ReceptionView") {
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
        $this->PatientID->setVisibility();
        $this->PatientName->setVisibility();
        $this->OorN->setVisibility();
        $this->PRIMARY_CONSULTANT->setVisibility();
        $this->CATEGORY->setVisibility();
        $this->PROCEDURE->setVisibility();
        $this->Amount->setVisibility();
        $this->MODEOFPAYMENT->setVisibility();
        $this->NEXTREVIEWDATE->setVisibility();
        $this->REMARKS->setVisibility();
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
        $this->setupLookupOptions($this->CATEGORY);
        $this->setupLookupOptions($this->PROCEDURE);
        $this->setupLookupOptions($this->MODEOFPAYMENT);

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
                    $this->terminate("ReceptionList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "ReceptionList") {
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

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
            }
        }

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'OorN' first before field var 'x_OorN'
        $val = $CurrentForm->hasValue("OorN") ? $CurrentForm->getValue("OorN") : $CurrentForm->getValue("x_OorN");
        if (!$this->OorN->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OorN->Visible = false; // Disable update for API request
            } else {
                $this->OorN->setFormValue($val);
            }
        }

        // Check field name 'PRIMARY_CONSULTANT' first before field var 'x_PRIMARY_CONSULTANT'
        $val = $CurrentForm->hasValue("PRIMARY_CONSULTANT") ? $CurrentForm->getValue("PRIMARY_CONSULTANT") : $CurrentForm->getValue("x_PRIMARY_CONSULTANT");
        if (!$this->PRIMARY_CONSULTANT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRIMARY_CONSULTANT->Visible = false; // Disable update for API request
            } else {
                $this->PRIMARY_CONSULTANT->setFormValue($val);
            }
        }

        // Check field name 'CATEGORY' first before field var 'x_CATEGORY'
        $val = $CurrentForm->hasValue("CATEGORY") ? $CurrentForm->getValue("CATEGORY") : $CurrentForm->getValue("x_CATEGORY");
        if (!$this->CATEGORY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CATEGORY->Visible = false; // Disable update for API request
            } else {
                $this->CATEGORY->setFormValue($val);
            }
        }

        // Check field name 'PROCEDURE' first before field var 'x_PROCEDURE'
        $val = $CurrentForm->hasValue("PROCEDURE") ? $CurrentForm->getValue("PROCEDURE") : $CurrentForm->getValue("x_PROCEDURE");
        if (!$this->PROCEDURE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PROCEDURE->Visible = false; // Disable update for API request
            } else {
                $this->PROCEDURE->setFormValue($val);
            }
        }

        // Check field name 'Amount' first before field var 'x_Amount'
        $val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
        if (!$this->Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amount->Visible = false; // Disable update for API request
            } else {
                $this->Amount->setFormValue($val);
            }
        }

        // Check field name 'MODE OF PAYMENT' first before field var 'x_MODEOFPAYMENT'
        $val = $CurrentForm->hasValue("MODE OF PAYMENT") ? $CurrentForm->getValue("MODE OF PAYMENT") : $CurrentForm->getValue("x_MODEOFPAYMENT");
        if (!$this->MODEOFPAYMENT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MODEOFPAYMENT->Visible = false; // Disable update for API request
            } else {
                $this->MODEOFPAYMENT->setFormValue($val);
            }
        }

        // Check field name 'NEXT REVIEW DATE' first before field var 'x_NEXTREVIEWDATE'
        $val = $CurrentForm->hasValue("NEXT REVIEW DATE") ? $CurrentForm->getValue("NEXT REVIEW DATE") : $CurrentForm->getValue("x_NEXTREVIEWDATE");
        if (!$this->NEXTREVIEWDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NEXTREVIEWDATE->Visible = false; // Disable update for API request
            } else {
                $this->NEXTREVIEWDATE->setFormValue($val);
            }
            $this->NEXTREVIEWDATE->CurrentValue = UnFormatDateTime($this->NEXTREVIEWDATE->CurrentValue, 0);
        }

        // Check field name 'REMARKS' first before field var 'x_REMARKS'
        $val = $CurrentForm->hasValue("REMARKS") ? $CurrentForm->getValue("REMARKS") : $CurrentForm->getValue("x_REMARKS");
        if (!$this->REMARKS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REMARKS->Visible = false; // Disable update for API request
            } else {
                $this->REMARKS->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->OorN->CurrentValue = $this->OorN->FormValue;
        $this->PRIMARY_CONSULTANT->CurrentValue = $this->PRIMARY_CONSULTANT->FormValue;
        $this->CATEGORY->CurrentValue = $this->CATEGORY->FormValue;
        $this->PROCEDURE->CurrentValue = $this->PROCEDURE->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->MODEOFPAYMENT->CurrentValue = $this->MODEOFPAYMENT->FormValue;
        $this->NEXTREVIEWDATE->CurrentValue = $this->NEXTREVIEWDATE->FormValue;
        $this->NEXTREVIEWDATE->CurrentValue = UnFormatDateTime($this->NEXTREVIEWDATE->CurrentValue, 0);
        $this->REMARKS->CurrentValue = $this->REMARKS->FormValue;
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->OorN->setDbValue($row['OorN']);
        $this->PRIMARY_CONSULTANT->setDbValue($row['PRIMARY_CONSULTANT']);
        $this->CATEGORY->setDbValue($row['CATEGORY']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->Amount->setDbValue($row['Amount']);
        $this->MODEOFPAYMENT->setDbValue($row['MODE OF PAYMENT']);
        $this->NEXTREVIEWDATE->setDbValue($row['NEXT REVIEW DATE']);
        $this->REMARKS->setDbValue($row['REMARKS']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatientID'] = null;
        $row['PatientName'] = null;
        $row['OorN'] = null;
        $row['PRIMARY_CONSULTANT'] = null;
        $row['CATEGORY'] = null;
        $row['PROCEDURE'] = null;
        $row['Amount'] = null;
        $row['MODE OF PAYMENT'] = null;
        $row['NEXT REVIEW DATE'] = null;
        $row['REMARKS'] = null;
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

        // id

        // PatientID

        // PatientName

        // OorN

        // PRIMARY_CONSULTANT

        // CATEGORY

        // PROCEDURE

        // Amount

        // MODE OF PAYMENT

        // NEXT REVIEW DATE

        // REMARKS
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // OorN
            $this->OorN->ViewValue = $this->OorN->CurrentValue;
            $this->OorN->ViewCustomAttributes = "";

            // PRIMARY_CONSULTANT
            $this->PRIMARY_CONSULTANT->ViewValue = $this->PRIMARY_CONSULTANT->CurrentValue;
            $this->PRIMARY_CONSULTANT->ViewCustomAttributes = "";

            // CATEGORY
            $curVal = trim(strval($this->CATEGORY->CurrentValue));
            if ($curVal != "") {
                $this->CATEGORY->ViewValue = $this->CATEGORY->lookupCacheOption($curVal);
                if ($this->CATEGORY->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CATEGORY`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->CATEGORY->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->CATEGORY->Lookup->renderViewRow($rswrk[0]);
                        $this->CATEGORY->ViewValue = $this->CATEGORY->displayValue($arwrk);
                    } else {
                        $this->CATEGORY->ViewValue = $this->CATEGORY->CurrentValue;
                    }
                }
            } else {
                $this->CATEGORY->ViewValue = null;
            }
            $this->CATEGORY->ViewCustomAttributes = "";

            // PROCEDURE
            $curVal = trim(strval($this->PROCEDURE->CurrentValue));
            if ($curVal != "") {
                $this->PROCEDURE->ViewValue = $this->PROCEDURE->lookupCacheOption($curVal);
                if ($this->PROCEDURE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`PROCEDURE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PROCEDURE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PROCEDURE->Lookup->renderViewRow($rswrk[0]);
                        $this->PROCEDURE->ViewValue = $this->PROCEDURE->displayValue($arwrk);
                    } else {
                        $this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
                    }
                }
            } else {
                $this->PROCEDURE->ViewValue = null;
            }
            $this->PROCEDURE->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewCustomAttributes = "";

            // MODE OF PAYMENT
            $curVal = trim(strval($this->MODEOFPAYMENT->CurrentValue));
            if ($curVal != "") {
                $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->lookupCacheOption($curVal);
                if ($this->MODEOFPAYMENT->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->MODEOFPAYMENT->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->MODEOFPAYMENT->Lookup->renderViewRow($rswrk[0]);
                        $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->displayValue($arwrk);
                    } else {
                        $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->CurrentValue;
                    }
                }
            } else {
                $this->MODEOFPAYMENT->ViewValue = null;
            }
            $this->MODEOFPAYMENT->ViewCustomAttributes = "";

            // NEXT REVIEW DATE
            $this->NEXTREVIEWDATE->ViewValue = $this->NEXTREVIEWDATE->CurrentValue;
            $this->NEXTREVIEWDATE->ViewValue = FormatDateTime($this->NEXTREVIEWDATE->ViewValue, 0);
            $this->NEXTREVIEWDATE->ViewCustomAttributes = "";

            // REMARKS
            $this->REMARKS->ViewValue = $this->REMARKS->CurrentValue;
            $this->REMARKS->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // OorN
            $this->OorN->LinkCustomAttributes = "";
            $this->OorN->HrefValue = "";
            $this->OorN->TooltipValue = "";

            // PRIMARY_CONSULTANT
            $this->PRIMARY_CONSULTANT->LinkCustomAttributes = "";
            $this->PRIMARY_CONSULTANT->HrefValue = "";
            $this->PRIMARY_CONSULTANT->TooltipValue = "";

            // CATEGORY
            $this->CATEGORY->LinkCustomAttributes = "";
            $this->CATEGORY->HrefValue = "";
            $this->CATEGORY->TooltipValue = "";

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";
            $this->PROCEDURE->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // MODE OF PAYMENT
            $this->MODEOFPAYMENT->LinkCustomAttributes = "";
            $this->MODEOFPAYMENT->HrefValue = "";
            $this->MODEOFPAYMENT->TooltipValue = "";

            // NEXT REVIEW DATE
            $this->NEXTREVIEWDATE->LinkCustomAttributes = "";
            $this->NEXTREVIEWDATE->HrefValue = "";
            $this->NEXTREVIEWDATE->TooltipValue = "";

            // REMARKS
            $this->REMARKS->LinkCustomAttributes = "";
            $this->REMARKS->HrefValue = "";
            $this->REMARKS->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // OorN
            $this->OorN->EditAttrs["class"] = "form-control";
            $this->OorN->EditCustomAttributes = "";
            if (!$this->OorN->Raw) {
                $this->OorN->CurrentValue = HtmlDecode($this->OorN->CurrentValue);
            }
            $this->OorN->EditValue = HtmlEncode($this->OorN->CurrentValue);
            $this->OorN->PlaceHolder = RemoveHtml($this->OorN->caption());

            // PRIMARY_CONSULTANT
            $this->PRIMARY_CONSULTANT->EditAttrs["class"] = "form-control";
            $this->PRIMARY_CONSULTANT->EditCustomAttributes = "";
            if (!$this->PRIMARY_CONSULTANT->Raw) {
                $this->PRIMARY_CONSULTANT->CurrentValue = HtmlDecode($this->PRIMARY_CONSULTANT->CurrentValue);
            }
            $this->PRIMARY_CONSULTANT->EditValue = HtmlEncode($this->PRIMARY_CONSULTANT->CurrentValue);
            $this->PRIMARY_CONSULTANT->PlaceHolder = RemoveHtml($this->PRIMARY_CONSULTANT->caption());

            // CATEGORY
            $this->CATEGORY->EditAttrs["class"] = "form-control";
            $this->CATEGORY->EditCustomAttributes = "";
            $curVal = trim(strval($this->CATEGORY->CurrentValue));
            if ($curVal != "") {
                $this->CATEGORY->ViewValue = $this->CATEGORY->lookupCacheOption($curVal);
            } else {
                $this->CATEGORY->ViewValue = $this->CATEGORY->Lookup !== null && is_array($this->CATEGORY->Lookup->Options) ? $curVal : null;
            }
            if ($this->CATEGORY->ViewValue !== null) { // Load from cache
                $this->CATEGORY->EditValue = array_values($this->CATEGORY->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CATEGORY`" . SearchString("=", $this->CATEGORY->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->CATEGORY->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->CATEGORY->EditValue = $arwrk;
            }
            $this->CATEGORY->PlaceHolder = RemoveHtml($this->CATEGORY->caption());

            // PROCEDURE
            $this->PROCEDURE->EditAttrs["class"] = "form-control";
            $this->PROCEDURE->EditCustomAttributes = "";
            $curVal = trim(strval($this->PROCEDURE->CurrentValue));
            if ($curVal != "") {
                $this->PROCEDURE->ViewValue = $this->PROCEDURE->lookupCacheOption($curVal);
            } else {
                $this->PROCEDURE->ViewValue = $this->PROCEDURE->Lookup !== null && is_array($this->PROCEDURE->Lookup->Options) ? $curVal : null;
            }
            if ($this->PROCEDURE->ViewValue !== null) { // Load from cache
                $this->PROCEDURE->EditValue = array_values($this->PROCEDURE->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`PROCEDURE`" . SearchString("=", $this->PROCEDURE->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->PROCEDURE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PROCEDURE->EditValue = $arwrk;
            }
            $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            if (!$this->Amount->Raw) {
                $this->Amount->CurrentValue = HtmlDecode($this->Amount->CurrentValue);
            }
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // MODE OF PAYMENT
            $this->MODEOFPAYMENT->EditAttrs["class"] = "form-control";
            $this->MODEOFPAYMENT->EditCustomAttributes = "";
            $curVal = trim(strval($this->MODEOFPAYMENT->CurrentValue));
            if ($curVal != "") {
                $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->lookupCacheOption($curVal);
            } else {
                $this->MODEOFPAYMENT->ViewValue = $this->MODEOFPAYMENT->Lookup !== null && is_array($this->MODEOFPAYMENT->Lookup->Options) ? $curVal : null;
            }
            if ($this->MODEOFPAYMENT->ViewValue !== null) { // Load from cache
                $this->MODEOFPAYMENT->EditValue = array_values($this->MODEOFPAYMENT->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->MODEOFPAYMENT->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->MODEOFPAYMENT->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->MODEOFPAYMENT->EditValue = $arwrk;
            }
            $this->MODEOFPAYMENT->PlaceHolder = RemoveHtml($this->MODEOFPAYMENT->caption());

            // NEXT REVIEW DATE
            $this->NEXTREVIEWDATE->EditAttrs["class"] = "form-control";
            $this->NEXTREVIEWDATE->EditCustomAttributes = "";
            $this->NEXTREVIEWDATE->EditValue = HtmlEncode(FormatDateTime($this->NEXTREVIEWDATE->CurrentValue, 8));
            $this->NEXTREVIEWDATE->PlaceHolder = RemoveHtml($this->NEXTREVIEWDATE->caption());

            // REMARKS
            $this->REMARKS->EditAttrs["class"] = "form-control";
            $this->REMARKS->EditCustomAttributes = "";
            if (!$this->REMARKS->Raw) {
                $this->REMARKS->CurrentValue = HtmlDecode($this->REMARKS->CurrentValue);
            }
            $this->REMARKS->EditValue = HtmlEncode($this->REMARKS->CurrentValue);
            $this->REMARKS->PlaceHolder = RemoveHtml($this->REMARKS->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // OorN
            $this->OorN->LinkCustomAttributes = "";
            $this->OorN->HrefValue = "";

            // PRIMARY_CONSULTANT
            $this->PRIMARY_CONSULTANT->LinkCustomAttributes = "";
            $this->PRIMARY_CONSULTANT->HrefValue = "";

            // CATEGORY
            $this->CATEGORY->LinkCustomAttributes = "";
            $this->CATEGORY->HrefValue = "";

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // MODE OF PAYMENT
            $this->MODEOFPAYMENT->LinkCustomAttributes = "";
            $this->MODEOFPAYMENT->HrefValue = "";

            // NEXT REVIEW DATE
            $this->NEXTREVIEWDATE->LinkCustomAttributes = "";
            $this->NEXTREVIEWDATE->HrefValue = "";

            // REMARKS
            $this->REMARKS->LinkCustomAttributes = "";
            $this->REMARKS->HrefValue = "";
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
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->OorN->Required) {
            if (!$this->OorN->IsDetailKey && EmptyValue($this->OorN->FormValue)) {
                $this->OorN->addErrorMessage(str_replace("%s", $this->OorN->caption(), $this->OorN->RequiredErrorMessage));
            }
        }
        if ($this->PRIMARY_CONSULTANT->Required) {
            if (!$this->PRIMARY_CONSULTANT->IsDetailKey && EmptyValue($this->PRIMARY_CONSULTANT->FormValue)) {
                $this->PRIMARY_CONSULTANT->addErrorMessage(str_replace("%s", $this->PRIMARY_CONSULTANT->caption(), $this->PRIMARY_CONSULTANT->RequiredErrorMessage));
            }
        }
        if ($this->CATEGORY->Required) {
            if (!$this->CATEGORY->IsDetailKey && EmptyValue($this->CATEGORY->FormValue)) {
                $this->CATEGORY->addErrorMessage(str_replace("%s", $this->CATEGORY->caption(), $this->CATEGORY->RequiredErrorMessage));
            }
        }
        if ($this->PROCEDURE->Required) {
            if (!$this->PROCEDURE->IsDetailKey && EmptyValue($this->PROCEDURE->FormValue)) {
                $this->PROCEDURE->addErrorMessage(str_replace("%s", $this->PROCEDURE->caption(), $this->PROCEDURE->RequiredErrorMessage));
            }
        }
        if ($this->Amount->Required) {
            if (!$this->Amount->IsDetailKey && EmptyValue($this->Amount->FormValue)) {
                $this->Amount->addErrorMessage(str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
            }
        }
        if ($this->MODEOFPAYMENT->Required) {
            if (!$this->MODEOFPAYMENT->IsDetailKey && EmptyValue($this->MODEOFPAYMENT->FormValue)) {
                $this->MODEOFPAYMENT->addErrorMessage(str_replace("%s", $this->MODEOFPAYMENT->caption(), $this->MODEOFPAYMENT->RequiredErrorMessage));
            }
        }
        if ($this->NEXTREVIEWDATE->Required) {
            if (!$this->NEXTREVIEWDATE->IsDetailKey && EmptyValue($this->NEXTREVIEWDATE->FormValue)) {
                $this->NEXTREVIEWDATE->addErrorMessage(str_replace("%s", $this->NEXTREVIEWDATE->caption(), $this->NEXTREVIEWDATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->NEXTREVIEWDATE->FormValue)) {
            $this->NEXTREVIEWDATE->addErrorMessage($this->NEXTREVIEWDATE->getErrorMessage(false));
        }
        if ($this->REMARKS->Required) {
            if (!$this->REMARKS->IsDetailKey && EmptyValue($this->REMARKS->FormValue)) {
                $this->REMARKS->addErrorMessage(str_replace("%s", $this->REMARKS->caption(), $this->REMARKS->RequiredErrorMessage));
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

            // PatientID
            $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, $this->PatientID->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // OorN
            $this->OorN->setDbValueDef($rsnew, $this->OorN->CurrentValue, null, $this->OorN->ReadOnly);

            // PRIMARY_CONSULTANT
            $this->PRIMARY_CONSULTANT->setDbValueDef($rsnew, $this->PRIMARY_CONSULTANT->CurrentValue, null, $this->PRIMARY_CONSULTANT->ReadOnly);

            // CATEGORY
            $this->CATEGORY->setDbValueDef($rsnew, $this->CATEGORY->CurrentValue, null, $this->CATEGORY->ReadOnly);

            // PROCEDURE
            $this->PROCEDURE->setDbValueDef($rsnew, $this->PROCEDURE->CurrentValue, null, $this->PROCEDURE->ReadOnly);

            // Amount
            $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, $this->Amount->ReadOnly);

            // MODE OF PAYMENT
            $this->MODEOFPAYMENT->setDbValueDef($rsnew, $this->MODEOFPAYMENT->CurrentValue, null, $this->MODEOFPAYMENT->ReadOnly);

            // NEXT REVIEW DATE
            $this->NEXTREVIEWDATE->setDbValueDef($rsnew, UnFormatDateTime($this->NEXTREVIEWDATE->CurrentValue, 0), null, $this->NEXTREVIEWDATE->ReadOnly);

            // REMARKS
            $this->REMARKS->setDbValueDef($rsnew, $this->REMARKS->CurrentValue, null, $this->REMARKS->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ReceptionList"), "", $this->TableVar, true);
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
                case "x_CATEGORY":
                    break;
                case "x_PROCEDURE":
                    break;
                case "x_MODEOFPAYMENT":
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
