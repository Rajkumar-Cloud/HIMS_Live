<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class HrTrainingsessionsEdit extends HrTrainingsessions
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'hr_trainingsessions';

    // Page object name
    public $PageObjName = "HrTrainingsessionsEdit";

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

        // Table object (hr_trainingsessions)
        if (!isset($GLOBALS["hr_trainingsessions"]) || get_class($GLOBALS["hr_trainingsessions"]) == PROJECT_NAMESPACE . "hr_trainingsessions") {
            $GLOBALS["hr_trainingsessions"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'hr_trainingsessions');
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
                $doc = new $class(Container("hr_trainingsessions"));
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
                    if ($pageName == "HrTrainingsessionsView") {
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
        $this->name->setVisibility();
        $this->course->setVisibility();
        $this->description->setVisibility();
        $this->scheduled->setVisibility();
        $this->dueDate->setVisibility();
        $this->deliveryMethod->setVisibility();
        $this->deliveryLocation->setVisibility();
        $this->status->setVisibility();
        $this->attendanceType->setVisibility();
        $this->attachment->setVisibility();
        $this->created->setVisibility();
        $this->updated->setVisibility();
        $this->requireProof->setVisibility();
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
                    $this->terminate("HrTrainingsessionsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "HrTrainingsessionsList") {
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

        // Check field name 'name' first before field var 'x_name'
        $val = $CurrentForm->hasValue("name") ? $CurrentForm->getValue("name") : $CurrentForm->getValue("x_name");
        if (!$this->name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->name->Visible = false; // Disable update for API request
            } else {
                $this->name->setFormValue($val);
            }
        }

        // Check field name 'course' first before field var 'x_course'
        $val = $CurrentForm->hasValue("course") ? $CurrentForm->getValue("course") : $CurrentForm->getValue("x_course");
        if (!$this->course->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->course->Visible = false; // Disable update for API request
            } else {
                $this->course->setFormValue($val);
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

        // Check field name 'scheduled' first before field var 'x_scheduled'
        $val = $CurrentForm->hasValue("scheduled") ? $CurrentForm->getValue("scheduled") : $CurrentForm->getValue("x_scheduled");
        if (!$this->scheduled->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->scheduled->Visible = false; // Disable update for API request
            } else {
                $this->scheduled->setFormValue($val);
            }
            $this->scheduled->CurrentValue = UnFormatDateTime($this->scheduled->CurrentValue, 0);
        }

        // Check field name 'dueDate' first before field var 'x_dueDate'
        $val = $CurrentForm->hasValue("dueDate") ? $CurrentForm->getValue("dueDate") : $CurrentForm->getValue("x_dueDate");
        if (!$this->dueDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->dueDate->Visible = false; // Disable update for API request
            } else {
                $this->dueDate->setFormValue($val);
            }
            $this->dueDate->CurrentValue = UnFormatDateTime($this->dueDate->CurrentValue, 0);
        }

        // Check field name 'deliveryMethod' first before field var 'x_deliveryMethod'
        $val = $CurrentForm->hasValue("deliveryMethod") ? $CurrentForm->getValue("deliveryMethod") : $CurrentForm->getValue("x_deliveryMethod");
        if (!$this->deliveryMethod->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->deliveryMethod->Visible = false; // Disable update for API request
            } else {
                $this->deliveryMethod->setFormValue($val);
            }
        }

        // Check field name 'deliveryLocation' first before field var 'x_deliveryLocation'
        $val = $CurrentForm->hasValue("deliveryLocation") ? $CurrentForm->getValue("deliveryLocation") : $CurrentForm->getValue("x_deliveryLocation");
        if (!$this->deliveryLocation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->deliveryLocation->Visible = false; // Disable update for API request
            } else {
                $this->deliveryLocation->setFormValue($val);
            }
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

        // Check field name 'attendanceType' first before field var 'x_attendanceType'
        $val = $CurrentForm->hasValue("attendanceType") ? $CurrentForm->getValue("attendanceType") : $CurrentForm->getValue("x_attendanceType");
        if (!$this->attendanceType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attendanceType->Visible = false; // Disable update for API request
            } else {
                $this->attendanceType->setFormValue($val);
            }
        }

        // Check field name 'attachment' first before field var 'x_attachment'
        $val = $CurrentForm->hasValue("attachment") ? $CurrentForm->getValue("attachment") : $CurrentForm->getValue("x_attachment");
        if (!$this->attachment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attachment->Visible = false; // Disable update for API request
            } else {
                $this->attachment->setFormValue($val);
            }
        }

        // Check field name 'created' first before field var 'x_created'
        $val = $CurrentForm->hasValue("created") ? $CurrentForm->getValue("created") : $CurrentForm->getValue("x_created");
        if (!$this->created->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->created->Visible = false; // Disable update for API request
            } else {
                $this->created->setFormValue($val);
            }
            $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        }

        // Check field name 'updated' first before field var 'x_updated'
        $val = $CurrentForm->hasValue("updated") ? $CurrentForm->getValue("updated") : $CurrentForm->getValue("x_updated");
        if (!$this->updated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->updated->Visible = false; // Disable update for API request
            } else {
                $this->updated->setFormValue($val);
            }
            $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
        }

        // Check field name 'requireProof' first before field var 'x_requireProof'
        $val = $CurrentForm->hasValue("requireProof") ? $CurrentForm->getValue("requireProof") : $CurrentForm->getValue("x_requireProof");
        if (!$this->requireProof->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->requireProof->Visible = false; // Disable update for API request
            } else {
                $this->requireProof->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->name->CurrentValue = $this->name->FormValue;
        $this->course->CurrentValue = $this->course->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->scheduled->CurrentValue = $this->scheduled->FormValue;
        $this->scheduled->CurrentValue = UnFormatDateTime($this->scheduled->CurrentValue, 0);
        $this->dueDate->CurrentValue = $this->dueDate->FormValue;
        $this->dueDate->CurrentValue = UnFormatDateTime($this->dueDate->CurrentValue, 0);
        $this->deliveryMethod->CurrentValue = $this->deliveryMethod->FormValue;
        $this->deliveryLocation->CurrentValue = $this->deliveryLocation->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->attendanceType->CurrentValue = $this->attendanceType->FormValue;
        $this->attachment->CurrentValue = $this->attachment->FormValue;
        $this->created->CurrentValue = $this->created->FormValue;
        $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        $this->updated->CurrentValue = $this->updated->FormValue;
        $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
        $this->requireProof->CurrentValue = $this->requireProof->FormValue;
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
        $this->name->setDbValue($row['name']);
        $this->course->setDbValue($row['course']);
        $this->description->setDbValue($row['description']);
        $this->scheduled->setDbValue($row['scheduled']);
        $this->dueDate->setDbValue($row['dueDate']);
        $this->deliveryMethod->setDbValue($row['deliveryMethod']);
        $this->deliveryLocation->setDbValue($row['deliveryLocation']);
        $this->status->setDbValue($row['status']);
        $this->attendanceType->setDbValue($row['attendanceType']);
        $this->attachment->setDbValue($row['attachment']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->requireProof->setDbValue($row['requireProof']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['name'] = null;
        $row['course'] = null;
        $row['description'] = null;
        $row['scheduled'] = null;
        $row['dueDate'] = null;
        $row['deliveryMethod'] = null;
        $row['deliveryLocation'] = null;
        $row['status'] = null;
        $row['attendanceType'] = null;
        $row['attachment'] = null;
        $row['created'] = null;
        $row['updated'] = null;
        $row['requireProof'] = null;
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

        // name

        // course

        // description

        // scheduled

        // dueDate

        // deliveryMethod

        // deliveryLocation

        // status

        // attendanceType

        // attachment

        // created

        // updated

        // requireProof
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // name
            $this->name->ViewValue = $this->name->CurrentValue;
            $this->name->ViewCustomAttributes = "";

            // course
            $this->course->ViewValue = $this->course->CurrentValue;
            $this->course->ViewValue = FormatNumber($this->course->ViewValue, 0, -2, -2, -2);
            $this->course->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // scheduled
            $this->scheduled->ViewValue = $this->scheduled->CurrentValue;
            $this->scheduled->ViewValue = FormatDateTime($this->scheduled->ViewValue, 0);
            $this->scheduled->ViewCustomAttributes = "";

            // dueDate
            $this->dueDate->ViewValue = $this->dueDate->CurrentValue;
            $this->dueDate->ViewValue = FormatDateTime($this->dueDate->ViewValue, 0);
            $this->dueDate->ViewCustomAttributes = "";

            // deliveryMethod
            if (strval($this->deliveryMethod->CurrentValue) != "") {
                $this->deliveryMethod->ViewValue = $this->deliveryMethod->optionCaption($this->deliveryMethod->CurrentValue);
            } else {
                $this->deliveryMethod->ViewValue = null;
            }
            $this->deliveryMethod->ViewCustomAttributes = "";

            // deliveryLocation
            $this->deliveryLocation->ViewValue = $this->deliveryLocation->CurrentValue;
            $this->deliveryLocation->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // attendanceType
            if (strval($this->attendanceType->CurrentValue) != "") {
                $this->attendanceType->ViewValue = $this->attendanceType->optionCaption($this->attendanceType->CurrentValue);
            } else {
                $this->attendanceType->ViewValue = null;
            }
            $this->attendanceType->ViewCustomAttributes = "";

            // attachment
            $this->attachment->ViewValue = $this->attachment->CurrentValue;
            $this->attachment->ViewCustomAttributes = "";

            // created
            $this->created->ViewValue = $this->created->CurrentValue;
            $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
            $this->created->ViewCustomAttributes = "";

            // updated
            $this->updated->ViewValue = $this->updated->CurrentValue;
            $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
            $this->updated->ViewCustomAttributes = "";

            // requireProof
            if (strval($this->requireProof->CurrentValue) != "") {
                $this->requireProof->ViewValue = $this->requireProof->optionCaption($this->requireProof->CurrentValue);
            } else {
                $this->requireProof->ViewValue = null;
            }
            $this->requireProof->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // name
            $this->name->LinkCustomAttributes = "";
            $this->name->HrefValue = "";
            $this->name->TooltipValue = "";

            // course
            $this->course->LinkCustomAttributes = "";
            $this->course->HrefValue = "";
            $this->course->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // scheduled
            $this->scheduled->LinkCustomAttributes = "";
            $this->scheduled->HrefValue = "";
            $this->scheduled->TooltipValue = "";

            // dueDate
            $this->dueDate->LinkCustomAttributes = "";
            $this->dueDate->HrefValue = "";
            $this->dueDate->TooltipValue = "";

            // deliveryMethod
            $this->deliveryMethod->LinkCustomAttributes = "";
            $this->deliveryMethod->HrefValue = "";
            $this->deliveryMethod->TooltipValue = "";

            // deliveryLocation
            $this->deliveryLocation->LinkCustomAttributes = "";
            $this->deliveryLocation->HrefValue = "";
            $this->deliveryLocation->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // attendanceType
            $this->attendanceType->LinkCustomAttributes = "";
            $this->attendanceType->HrefValue = "";
            $this->attendanceType->TooltipValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";
            $this->attachment->TooltipValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";
            $this->created->TooltipValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";
            $this->updated->TooltipValue = "";

            // requireProof
            $this->requireProof->LinkCustomAttributes = "";
            $this->requireProof->HrefValue = "";
            $this->requireProof->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // name
            $this->name->EditAttrs["class"] = "form-control";
            $this->name->EditCustomAttributes = "";
            $this->name->EditValue = HtmlEncode($this->name->CurrentValue);
            $this->name->PlaceHolder = RemoveHtml($this->name->caption());

            // course
            $this->course->EditAttrs["class"] = "form-control";
            $this->course->EditCustomAttributes = "";
            $this->course->EditValue = HtmlEncode($this->course->CurrentValue);
            $this->course->PlaceHolder = RemoveHtml($this->course->caption());

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // scheduled
            $this->scheduled->EditAttrs["class"] = "form-control";
            $this->scheduled->EditCustomAttributes = "";
            $this->scheduled->EditValue = HtmlEncode(FormatDateTime($this->scheduled->CurrentValue, 8));
            $this->scheduled->PlaceHolder = RemoveHtml($this->scheduled->caption());

            // dueDate
            $this->dueDate->EditAttrs["class"] = "form-control";
            $this->dueDate->EditCustomAttributes = "";
            $this->dueDate->EditValue = HtmlEncode(FormatDateTime($this->dueDate->CurrentValue, 8));
            $this->dueDate->PlaceHolder = RemoveHtml($this->dueDate->caption());

            // deliveryMethod
            $this->deliveryMethod->EditCustomAttributes = "";
            $this->deliveryMethod->EditValue = $this->deliveryMethod->options(false);
            $this->deliveryMethod->PlaceHolder = RemoveHtml($this->deliveryMethod->caption());

            // deliveryLocation
            $this->deliveryLocation->EditAttrs["class"] = "form-control";
            $this->deliveryLocation->EditCustomAttributes = "";
            $this->deliveryLocation->EditValue = HtmlEncode($this->deliveryLocation->CurrentValue);
            $this->deliveryLocation->PlaceHolder = RemoveHtml($this->deliveryLocation->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // attendanceType
            $this->attendanceType->EditCustomAttributes = "";
            $this->attendanceType->EditValue = $this->attendanceType->options(false);
            $this->attendanceType->PlaceHolder = RemoveHtml($this->attendanceType->caption());

            // attachment
            $this->attachment->EditAttrs["class"] = "form-control";
            $this->attachment->EditCustomAttributes = "";
            $this->attachment->EditValue = HtmlEncode($this->attachment->CurrentValue);
            $this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

            // created
            $this->created->EditAttrs["class"] = "form-control";
            $this->created->EditCustomAttributes = "";
            $this->created->EditValue = HtmlEncode(FormatDateTime($this->created->CurrentValue, 8));
            $this->created->PlaceHolder = RemoveHtml($this->created->caption());

            // updated
            $this->updated->EditAttrs["class"] = "form-control";
            $this->updated->EditCustomAttributes = "";
            $this->updated->EditValue = HtmlEncode(FormatDateTime($this->updated->CurrentValue, 8));
            $this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

            // requireProof
            $this->requireProof->EditCustomAttributes = "";
            $this->requireProof->EditValue = $this->requireProof->options(false);
            $this->requireProof->PlaceHolder = RemoveHtml($this->requireProof->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // name
            $this->name->LinkCustomAttributes = "";
            $this->name->HrefValue = "";

            // course
            $this->course->LinkCustomAttributes = "";
            $this->course->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

            // scheduled
            $this->scheduled->LinkCustomAttributes = "";
            $this->scheduled->HrefValue = "";

            // dueDate
            $this->dueDate->LinkCustomAttributes = "";
            $this->dueDate->HrefValue = "";

            // deliveryMethod
            $this->deliveryMethod->LinkCustomAttributes = "";
            $this->deliveryMethod->HrefValue = "";

            // deliveryLocation
            $this->deliveryLocation->LinkCustomAttributes = "";
            $this->deliveryLocation->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // attendanceType
            $this->attendanceType->LinkCustomAttributes = "";
            $this->attendanceType->HrefValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";

            // requireProof
            $this->requireProof->LinkCustomAttributes = "";
            $this->requireProof->HrefValue = "";
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
        if ($this->name->Required) {
            if (!$this->name->IsDetailKey && EmptyValue($this->name->FormValue)) {
                $this->name->addErrorMessage(str_replace("%s", $this->name->caption(), $this->name->RequiredErrorMessage));
            }
        }
        if ($this->course->Required) {
            if (!$this->course->IsDetailKey && EmptyValue($this->course->FormValue)) {
                $this->course->addErrorMessage(str_replace("%s", $this->course->caption(), $this->course->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->course->FormValue)) {
            $this->course->addErrorMessage($this->course->getErrorMessage(false));
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
            }
        }
        if ($this->scheduled->Required) {
            if (!$this->scheduled->IsDetailKey && EmptyValue($this->scheduled->FormValue)) {
                $this->scheduled->addErrorMessage(str_replace("%s", $this->scheduled->caption(), $this->scheduled->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->scheduled->FormValue)) {
            $this->scheduled->addErrorMessage($this->scheduled->getErrorMessage(false));
        }
        if ($this->dueDate->Required) {
            if (!$this->dueDate->IsDetailKey && EmptyValue($this->dueDate->FormValue)) {
                $this->dueDate->addErrorMessage(str_replace("%s", $this->dueDate->caption(), $this->dueDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->dueDate->FormValue)) {
            $this->dueDate->addErrorMessage($this->dueDate->getErrorMessage(false));
        }
        if ($this->deliveryMethod->Required) {
            if ($this->deliveryMethod->FormValue == "") {
                $this->deliveryMethod->addErrorMessage(str_replace("%s", $this->deliveryMethod->caption(), $this->deliveryMethod->RequiredErrorMessage));
            }
        }
        if ($this->deliveryLocation->Required) {
            if (!$this->deliveryLocation->IsDetailKey && EmptyValue($this->deliveryLocation->FormValue)) {
                $this->deliveryLocation->addErrorMessage(str_replace("%s", $this->deliveryLocation->caption(), $this->deliveryLocation->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->attendanceType->Required) {
            if ($this->attendanceType->FormValue == "") {
                $this->attendanceType->addErrorMessage(str_replace("%s", $this->attendanceType->caption(), $this->attendanceType->RequiredErrorMessage));
            }
        }
        if ($this->attachment->Required) {
            if (!$this->attachment->IsDetailKey && EmptyValue($this->attachment->FormValue)) {
                $this->attachment->addErrorMessage(str_replace("%s", $this->attachment->caption(), $this->attachment->RequiredErrorMessage));
            }
        }
        if ($this->created->Required) {
            if (!$this->created->IsDetailKey && EmptyValue($this->created->FormValue)) {
                $this->created->addErrorMessage(str_replace("%s", $this->created->caption(), $this->created->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->created->FormValue)) {
            $this->created->addErrorMessage($this->created->getErrorMessage(false));
        }
        if ($this->updated->Required) {
            if (!$this->updated->IsDetailKey && EmptyValue($this->updated->FormValue)) {
                $this->updated->addErrorMessage(str_replace("%s", $this->updated->caption(), $this->updated->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->updated->FormValue)) {
            $this->updated->addErrorMessage($this->updated->getErrorMessage(false));
        }
        if ($this->requireProof->Required) {
            if ($this->requireProof->FormValue == "") {
                $this->requireProof->addErrorMessage(str_replace("%s", $this->requireProof->caption(), $this->requireProof->RequiredErrorMessage));
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

            // name
            $this->name->setDbValueDef($rsnew, $this->name->CurrentValue, "", $this->name->ReadOnly);

            // course
            $this->course->setDbValueDef($rsnew, $this->course->CurrentValue, 0, $this->course->ReadOnly);

            // description
            $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, $this->description->ReadOnly);

            // scheduled
            $this->scheduled->setDbValueDef($rsnew, UnFormatDateTime($this->scheduled->CurrentValue, 0), null, $this->scheduled->ReadOnly);

            // dueDate
            $this->dueDate->setDbValueDef($rsnew, UnFormatDateTime($this->dueDate->CurrentValue, 0), null, $this->dueDate->ReadOnly);

            // deliveryMethod
            $this->deliveryMethod->setDbValueDef($rsnew, $this->deliveryMethod->CurrentValue, null, $this->deliveryMethod->ReadOnly);

            // deliveryLocation
            $this->deliveryLocation->setDbValueDef($rsnew, $this->deliveryLocation->CurrentValue, null, $this->deliveryLocation->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // attendanceType
            $this->attendanceType->setDbValueDef($rsnew, $this->attendanceType->CurrentValue, null, $this->attendanceType->ReadOnly);

            // attachment
            $this->attachment->setDbValueDef($rsnew, $this->attachment->CurrentValue, null, $this->attachment->ReadOnly);

            // created
            $this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), null, $this->created->ReadOnly);

            // updated
            $this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), null, $this->updated->ReadOnly);

            // requireProof
            $this->requireProof->setDbValueDef($rsnew, $this->requireProof->CurrentValue, null, $this->requireProof->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("HrTrainingsessionsList"), "", $this->TableVar, true);
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
                case "x_deliveryMethod":
                    break;
                case "x_status":
                    break;
                case "x_attendanceType":
                    break;
                case "x_requireProof":
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
