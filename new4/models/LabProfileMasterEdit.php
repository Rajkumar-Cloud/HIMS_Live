<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabProfileMasterEdit extends LabProfileMaster
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_profile_master';

    // Page object name
    public $PageObjName = "LabProfileMasterEdit";

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

        // Table object (lab_profile_master)
        if (!isset($GLOBALS["lab_profile_master"]) || get_class($GLOBALS["lab_profile_master"]) == PROJECT_NAMESPACE . "lab_profile_master") {
            $GLOBALS["lab_profile_master"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_profile_master');
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
                $doc = new $class(Container("lab_profile_master"));
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
                    if ($pageName == "LabProfileMasterView") {
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
        $this->ProfileCode->setVisibility();
        $this->ProfileName->setVisibility();
        $this->ProfileAmount->setVisibility();
        $this->ProfileSpecialAmount->setVisibility();
        $this->ProfileMasterInactive->setVisibility();
        $this->ReagentAmt->setVisibility();
        $this->LabAmt->setVisibility();
        $this->RefAmt->setVisibility();
        $this->MainDeptCD->setVisibility();
        $this->Individual->setVisibility();
        $this->ShortName->setVisibility();
        $this->Note->setVisibility();
        $this->PrevAmt->setVisibility();
        $this->BillName->setVisibility();
        $this->ActualAmt->setVisibility();
        $this->NoHeading->setVisibility();
        $this->EditDate->setVisibility();
        $this->EditUser->setVisibility();
        $this->HISCD->setVisibility();
        $this->PriceList->setVisibility();
        $this->IPAmt->setVisibility();
        $this->IInsAmt->setVisibility();
        $this->ManualCD->setVisibility();
        $this->Free->setVisibility();
        $this->IIpAmt->setVisibility();
        $this->InsAmt->setVisibility();
        $this->OutSource->setVisibility();
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
                    $this->terminate("LabProfileMasterList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "LabProfileMasterList") {
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

        // Check field name 'ProfileCode' first before field var 'x_ProfileCode'
        $val = $CurrentForm->hasValue("ProfileCode") ? $CurrentForm->getValue("ProfileCode") : $CurrentForm->getValue("x_ProfileCode");
        if (!$this->ProfileCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileCode->Visible = false; // Disable update for API request
            } else {
                $this->ProfileCode->setFormValue($val);
            }
        }

        // Check field name 'ProfileName' first before field var 'x_ProfileName'
        $val = $CurrentForm->hasValue("ProfileName") ? $CurrentForm->getValue("ProfileName") : $CurrentForm->getValue("x_ProfileName");
        if (!$this->ProfileName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileName->Visible = false; // Disable update for API request
            } else {
                $this->ProfileName->setFormValue($val);
            }
        }

        // Check field name 'ProfileAmount' first before field var 'x_ProfileAmount'
        $val = $CurrentForm->hasValue("ProfileAmount") ? $CurrentForm->getValue("ProfileAmount") : $CurrentForm->getValue("x_ProfileAmount");
        if (!$this->ProfileAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileAmount->Visible = false; // Disable update for API request
            } else {
                $this->ProfileAmount->setFormValue($val);
            }
        }

        // Check field name 'ProfileSpecialAmount' first before field var 'x_ProfileSpecialAmount'
        $val = $CurrentForm->hasValue("ProfileSpecialAmount") ? $CurrentForm->getValue("ProfileSpecialAmount") : $CurrentForm->getValue("x_ProfileSpecialAmount");
        if (!$this->ProfileSpecialAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileSpecialAmount->Visible = false; // Disable update for API request
            } else {
                $this->ProfileSpecialAmount->setFormValue($val);
            }
        }

        // Check field name 'ProfileMasterInactive' first before field var 'x_ProfileMasterInactive'
        $val = $CurrentForm->hasValue("ProfileMasterInactive") ? $CurrentForm->getValue("ProfileMasterInactive") : $CurrentForm->getValue("x_ProfileMasterInactive");
        if (!$this->ProfileMasterInactive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProfileMasterInactive->Visible = false; // Disable update for API request
            } else {
                $this->ProfileMasterInactive->setFormValue($val);
            }
        }

        // Check field name 'ReagentAmt' first before field var 'x_ReagentAmt'
        $val = $CurrentForm->hasValue("ReagentAmt") ? $CurrentForm->getValue("ReagentAmt") : $CurrentForm->getValue("x_ReagentAmt");
        if (!$this->ReagentAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReagentAmt->Visible = false; // Disable update for API request
            } else {
                $this->ReagentAmt->setFormValue($val);
            }
        }

        // Check field name 'LabAmt' first before field var 'x_LabAmt'
        $val = $CurrentForm->hasValue("LabAmt") ? $CurrentForm->getValue("LabAmt") : $CurrentForm->getValue("x_LabAmt");
        if (!$this->LabAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabAmt->Visible = false; // Disable update for API request
            } else {
                $this->LabAmt->setFormValue($val);
            }
        }

        // Check field name 'RefAmt' first before field var 'x_RefAmt'
        $val = $CurrentForm->hasValue("RefAmt") ? $CurrentForm->getValue("RefAmt") : $CurrentForm->getValue("x_RefAmt");
        if (!$this->RefAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefAmt->Visible = false; // Disable update for API request
            } else {
                $this->RefAmt->setFormValue($val);
            }
        }

        // Check field name 'MainDeptCD' first before field var 'x_MainDeptCD'
        $val = $CurrentForm->hasValue("MainDeptCD") ? $CurrentForm->getValue("MainDeptCD") : $CurrentForm->getValue("x_MainDeptCD");
        if (!$this->MainDeptCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MainDeptCD->Visible = false; // Disable update for API request
            } else {
                $this->MainDeptCD->setFormValue($val);
            }
        }

        // Check field name 'Individual' first before field var 'x_Individual'
        $val = $CurrentForm->hasValue("Individual") ? $CurrentForm->getValue("Individual") : $CurrentForm->getValue("x_Individual");
        if (!$this->Individual->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Individual->Visible = false; // Disable update for API request
            } else {
                $this->Individual->setFormValue($val);
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

        // Check field name 'Note' first before field var 'x_Note'
        $val = $CurrentForm->hasValue("Note") ? $CurrentForm->getValue("Note") : $CurrentForm->getValue("x_Note");
        if (!$this->Note->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Note->Visible = false; // Disable update for API request
            } else {
                $this->Note->setFormValue($val);
            }
        }

        // Check field name 'PrevAmt' first before field var 'x_PrevAmt'
        $val = $CurrentForm->hasValue("PrevAmt") ? $CurrentForm->getValue("PrevAmt") : $CurrentForm->getValue("x_PrevAmt");
        if (!$this->PrevAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrevAmt->Visible = false; // Disable update for API request
            } else {
                $this->PrevAmt->setFormValue($val);
            }
        }

        // Check field name 'BillName' first before field var 'x_BillName'
        $val = $CurrentForm->hasValue("BillName") ? $CurrentForm->getValue("BillName") : $CurrentForm->getValue("x_BillName");
        if (!$this->BillName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillName->Visible = false; // Disable update for API request
            } else {
                $this->BillName->setFormValue($val);
            }
        }

        // Check field name 'ActualAmt' first before field var 'x_ActualAmt'
        $val = $CurrentForm->hasValue("ActualAmt") ? $CurrentForm->getValue("ActualAmt") : $CurrentForm->getValue("x_ActualAmt");
        if (!$this->ActualAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ActualAmt->Visible = false; // Disable update for API request
            } else {
                $this->ActualAmt->setFormValue($val);
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

        // Check field name 'EditDate' first before field var 'x_EditDate'
        $val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
        if (!$this->EditDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditDate->Visible = false; // Disable update for API request
            } else {
                $this->EditDate->setFormValue($val);
            }
            $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        }

        // Check field name 'EditUser' first before field var 'x_EditUser'
        $val = $CurrentForm->hasValue("EditUser") ? $CurrentForm->getValue("EditUser") : $CurrentForm->getValue("x_EditUser");
        if (!$this->EditUser->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditUser->Visible = false; // Disable update for API request
            } else {
                $this->EditUser->setFormValue($val);
            }
        }

        // Check field name 'HISCD' first before field var 'x_HISCD'
        $val = $CurrentForm->hasValue("HISCD") ? $CurrentForm->getValue("HISCD") : $CurrentForm->getValue("x_HISCD");
        if (!$this->HISCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HISCD->Visible = false; // Disable update for API request
            } else {
                $this->HISCD->setFormValue($val);
            }
        }

        // Check field name 'PriceList' first before field var 'x_PriceList'
        $val = $CurrentForm->hasValue("PriceList") ? $CurrentForm->getValue("PriceList") : $CurrentForm->getValue("x_PriceList");
        if (!$this->PriceList->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PriceList->Visible = false; // Disable update for API request
            } else {
                $this->PriceList->setFormValue($val);
            }
        }

        // Check field name 'IPAmt' first before field var 'x_IPAmt'
        $val = $CurrentForm->hasValue("IPAmt") ? $CurrentForm->getValue("IPAmt") : $CurrentForm->getValue("x_IPAmt");
        if (!$this->IPAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IPAmt->Visible = false; // Disable update for API request
            } else {
                $this->IPAmt->setFormValue($val);
            }
        }

        // Check field name 'IInsAmt' first before field var 'x_IInsAmt'
        $val = $CurrentForm->hasValue("IInsAmt") ? $CurrentForm->getValue("IInsAmt") : $CurrentForm->getValue("x_IInsAmt");
        if (!$this->IInsAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IInsAmt->Visible = false; // Disable update for API request
            } else {
                $this->IInsAmt->setFormValue($val);
            }
        }

        // Check field name 'ManualCD' first before field var 'x_ManualCD'
        $val = $CurrentForm->hasValue("ManualCD") ? $CurrentForm->getValue("ManualCD") : $CurrentForm->getValue("x_ManualCD");
        if (!$this->ManualCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ManualCD->Visible = false; // Disable update for API request
            } else {
                $this->ManualCD->setFormValue($val);
            }
        }

        // Check field name 'Free' first before field var 'x_Free'
        $val = $CurrentForm->hasValue("Free") ? $CurrentForm->getValue("Free") : $CurrentForm->getValue("x_Free");
        if (!$this->Free->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Free->Visible = false; // Disable update for API request
            } else {
                $this->Free->setFormValue($val);
            }
        }

        // Check field name 'IIpAmt' first before field var 'x_IIpAmt'
        $val = $CurrentForm->hasValue("IIpAmt") ? $CurrentForm->getValue("IIpAmt") : $CurrentForm->getValue("x_IIpAmt");
        if (!$this->IIpAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IIpAmt->Visible = false; // Disable update for API request
            } else {
                $this->IIpAmt->setFormValue($val);
            }
        }

        // Check field name 'InsAmt' first before field var 'x_InsAmt'
        $val = $CurrentForm->hasValue("InsAmt") ? $CurrentForm->getValue("InsAmt") : $CurrentForm->getValue("x_InsAmt");
        if (!$this->InsAmt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InsAmt->Visible = false; // Disable update for API request
            } else {
                $this->InsAmt->setFormValue($val);
            }
        }

        // Check field name 'OutSource' first before field var 'x_OutSource'
        $val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
        if (!$this->OutSource->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OutSource->Visible = false; // Disable update for API request
            } else {
                $this->OutSource->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->ProfileCode->CurrentValue = $this->ProfileCode->FormValue;
        $this->ProfileName->CurrentValue = $this->ProfileName->FormValue;
        $this->ProfileAmount->CurrentValue = $this->ProfileAmount->FormValue;
        $this->ProfileSpecialAmount->CurrentValue = $this->ProfileSpecialAmount->FormValue;
        $this->ProfileMasterInactive->CurrentValue = $this->ProfileMasterInactive->FormValue;
        $this->ReagentAmt->CurrentValue = $this->ReagentAmt->FormValue;
        $this->LabAmt->CurrentValue = $this->LabAmt->FormValue;
        $this->RefAmt->CurrentValue = $this->RefAmt->FormValue;
        $this->MainDeptCD->CurrentValue = $this->MainDeptCD->FormValue;
        $this->Individual->CurrentValue = $this->Individual->FormValue;
        $this->ShortName->CurrentValue = $this->ShortName->FormValue;
        $this->Note->CurrentValue = $this->Note->FormValue;
        $this->PrevAmt->CurrentValue = $this->PrevAmt->FormValue;
        $this->BillName->CurrentValue = $this->BillName->FormValue;
        $this->ActualAmt->CurrentValue = $this->ActualAmt->FormValue;
        $this->NoHeading->CurrentValue = $this->NoHeading->FormValue;
        $this->EditDate->CurrentValue = $this->EditDate->FormValue;
        $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        $this->EditUser->CurrentValue = $this->EditUser->FormValue;
        $this->HISCD->CurrentValue = $this->HISCD->FormValue;
        $this->PriceList->CurrentValue = $this->PriceList->FormValue;
        $this->IPAmt->CurrentValue = $this->IPAmt->FormValue;
        $this->IInsAmt->CurrentValue = $this->IInsAmt->FormValue;
        $this->ManualCD->CurrentValue = $this->ManualCD->FormValue;
        $this->Free->CurrentValue = $this->Free->FormValue;
        $this->IIpAmt->CurrentValue = $this->IIpAmt->FormValue;
        $this->InsAmt->CurrentValue = $this->InsAmt->FormValue;
        $this->OutSource->CurrentValue = $this->OutSource->FormValue;
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
        $this->ProfileCode->setDbValue($row['ProfileCode']);
        $this->ProfileName->setDbValue($row['ProfileName']);
        $this->ProfileAmount->setDbValue($row['ProfileAmount']);
        $this->ProfileSpecialAmount->setDbValue($row['ProfileSpecialAmount']);
        $this->ProfileMasterInactive->setDbValue($row['ProfileMasterInactive']);
        $this->ReagentAmt->setDbValue($row['ReagentAmt']);
        $this->LabAmt->setDbValue($row['LabAmt']);
        $this->RefAmt->setDbValue($row['RefAmt']);
        $this->MainDeptCD->setDbValue($row['MainDeptCD']);
        $this->Individual->setDbValue($row['Individual']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->Note->setDbValue($row['Note']);
        $this->PrevAmt->setDbValue($row['PrevAmt']);
        $this->BillName->setDbValue($row['BillName']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditUser->setDbValue($row['EditUser']);
        $this->HISCD->setDbValue($row['HISCD']);
        $this->PriceList->setDbValue($row['PriceList']);
        $this->IPAmt->setDbValue($row['IPAmt']);
        $this->IInsAmt->setDbValue($row['IInsAmt']);
        $this->ManualCD->setDbValue($row['ManualCD']);
        $this->Free->setDbValue($row['Free']);
        $this->IIpAmt->setDbValue($row['IIpAmt']);
        $this->InsAmt->setDbValue($row['InsAmt']);
        $this->OutSource->setDbValue($row['OutSource']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ProfileCode'] = null;
        $row['ProfileName'] = null;
        $row['ProfileAmount'] = null;
        $row['ProfileSpecialAmount'] = null;
        $row['ProfileMasterInactive'] = null;
        $row['ReagentAmt'] = null;
        $row['LabAmt'] = null;
        $row['RefAmt'] = null;
        $row['MainDeptCD'] = null;
        $row['Individual'] = null;
        $row['ShortName'] = null;
        $row['Note'] = null;
        $row['PrevAmt'] = null;
        $row['BillName'] = null;
        $row['ActualAmt'] = null;
        $row['NoHeading'] = null;
        $row['EditDate'] = null;
        $row['EditUser'] = null;
        $row['HISCD'] = null;
        $row['PriceList'] = null;
        $row['IPAmt'] = null;
        $row['IInsAmt'] = null;
        $row['ManualCD'] = null;
        $row['Free'] = null;
        $row['IIpAmt'] = null;
        $row['InsAmt'] = null;
        $row['OutSource'] = null;
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
        if ($this->ProfileAmount->FormValue == $this->ProfileAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileAmount->CurrentValue))) {
            $this->ProfileAmount->CurrentValue = ConvertToFloatString($this->ProfileAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ProfileSpecialAmount->FormValue == $this->ProfileSpecialAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue))) {
            $this->ProfileSpecialAmount->CurrentValue = ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue))) {
            $this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue))) {
            $this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue))) {
            $this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue))) {
            $this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue))) {
            $this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue))) {
            $this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IInsAmt->FormValue == $this->IInsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IInsAmt->CurrentValue))) {
            $this->IInsAmt->CurrentValue = ConvertToFloatString($this->IInsAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IIpAmt->FormValue == $this->IIpAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IIpAmt->CurrentValue))) {
            $this->IIpAmt->CurrentValue = ConvertToFloatString($this->IIpAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue))) {
            $this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // ProfileCode

        // ProfileName

        // ProfileAmount

        // ProfileSpecialAmount

        // ProfileMasterInactive

        // ReagentAmt

        // LabAmt

        // RefAmt

        // MainDeptCD

        // Individual

        // ShortName

        // Note

        // PrevAmt

        // BillName

        // ActualAmt

        // NoHeading

        // EditDate

        // EditUser

        // HISCD

        // PriceList

        // IPAmt

        // IInsAmt

        // ManualCD

        // Free

        // IIpAmt

        // InsAmt

        // OutSource
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ProfileCode
            $this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
            $this->ProfileCode->ViewCustomAttributes = "";

            // ProfileName
            $this->ProfileName->ViewValue = $this->ProfileName->CurrentValue;
            $this->ProfileName->ViewCustomAttributes = "";

            // ProfileAmount
            $this->ProfileAmount->ViewValue = $this->ProfileAmount->CurrentValue;
            $this->ProfileAmount->ViewValue = FormatNumber($this->ProfileAmount->ViewValue, 2, -2, -2, -2);
            $this->ProfileAmount->ViewCustomAttributes = "";

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->ViewValue = $this->ProfileSpecialAmount->CurrentValue;
            $this->ProfileSpecialAmount->ViewValue = FormatNumber($this->ProfileSpecialAmount->ViewValue, 2, -2, -2, -2);
            $this->ProfileSpecialAmount->ViewCustomAttributes = "";

            // ProfileMasterInactive
            $this->ProfileMasterInactive->ViewValue = $this->ProfileMasterInactive->CurrentValue;
            $this->ProfileMasterInactive->ViewCustomAttributes = "";

            // ReagentAmt
            $this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
            $this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
            $this->ReagentAmt->ViewCustomAttributes = "";

            // LabAmt
            $this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
            $this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
            $this->LabAmt->ViewCustomAttributes = "";

            // RefAmt
            $this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
            $this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
            $this->RefAmt->ViewCustomAttributes = "";

            // MainDeptCD
            $this->MainDeptCD->ViewValue = $this->MainDeptCD->CurrentValue;
            $this->MainDeptCD->ViewCustomAttributes = "";

            // Individual
            $this->Individual->ViewValue = $this->Individual->CurrentValue;
            $this->Individual->ViewCustomAttributes = "";

            // ShortName
            $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
            $this->ShortName->ViewCustomAttributes = "";

            // Note
            $this->Note->ViewValue = $this->Note->CurrentValue;
            $this->Note->ViewCustomAttributes = "";

            // PrevAmt
            $this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
            $this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
            $this->PrevAmt->ViewCustomAttributes = "";

            // BillName
            $this->BillName->ViewValue = $this->BillName->CurrentValue;
            $this->BillName->ViewCustomAttributes = "";

            // ActualAmt
            $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
            $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
            $this->ActualAmt->ViewCustomAttributes = "";

            // NoHeading
            $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
            $this->NoHeading->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // EditUser
            $this->EditUser->ViewValue = $this->EditUser->CurrentValue;
            $this->EditUser->ViewCustomAttributes = "";

            // HISCD
            $this->HISCD->ViewValue = $this->HISCD->CurrentValue;
            $this->HISCD->ViewCustomAttributes = "";

            // PriceList
            $this->PriceList->ViewValue = $this->PriceList->CurrentValue;
            $this->PriceList->ViewCustomAttributes = "";

            // IPAmt
            $this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
            $this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
            $this->IPAmt->ViewCustomAttributes = "";

            // IInsAmt
            $this->IInsAmt->ViewValue = $this->IInsAmt->CurrentValue;
            $this->IInsAmt->ViewValue = FormatNumber($this->IInsAmt->ViewValue, 2, -2, -2, -2);
            $this->IInsAmt->ViewCustomAttributes = "";

            // ManualCD
            $this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
            $this->ManualCD->ViewCustomAttributes = "";

            // Free
            $this->Free->ViewValue = $this->Free->CurrentValue;
            $this->Free->ViewCustomAttributes = "";

            // IIpAmt
            $this->IIpAmt->ViewValue = $this->IIpAmt->CurrentValue;
            $this->IIpAmt->ViewValue = FormatNumber($this->IIpAmt->ViewValue, 2, -2, -2, -2);
            $this->IIpAmt->ViewCustomAttributes = "";

            // InsAmt
            $this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
            $this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
            $this->InsAmt->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ProfileCode
            $this->ProfileCode->LinkCustomAttributes = "";
            $this->ProfileCode->HrefValue = "";
            $this->ProfileCode->TooltipValue = "";

            // ProfileName
            $this->ProfileName->LinkCustomAttributes = "";
            $this->ProfileName->HrefValue = "";
            $this->ProfileName->TooltipValue = "";

            // ProfileAmount
            $this->ProfileAmount->LinkCustomAttributes = "";
            $this->ProfileAmount->HrefValue = "";
            $this->ProfileAmount->TooltipValue = "";

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->LinkCustomAttributes = "";
            $this->ProfileSpecialAmount->HrefValue = "";
            $this->ProfileSpecialAmount->TooltipValue = "";

            // ProfileMasterInactive
            $this->ProfileMasterInactive->LinkCustomAttributes = "";
            $this->ProfileMasterInactive->HrefValue = "";
            $this->ProfileMasterInactive->TooltipValue = "";

            // ReagentAmt
            $this->ReagentAmt->LinkCustomAttributes = "";
            $this->ReagentAmt->HrefValue = "";
            $this->ReagentAmt->TooltipValue = "";

            // LabAmt
            $this->LabAmt->LinkCustomAttributes = "";
            $this->LabAmt->HrefValue = "";
            $this->LabAmt->TooltipValue = "";

            // RefAmt
            $this->RefAmt->LinkCustomAttributes = "";
            $this->RefAmt->HrefValue = "";
            $this->RefAmt->TooltipValue = "";

            // MainDeptCD
            $this->MainDeptCD->LinkCustomAttributes = "";
            $this->MainDeptCD->HrefValue = "";
            $this->MainDeptCD->TooltipValue = "";

            // Individual
            $this->Individual->LinkCustomAttributes = "";
            $this->Individual->HrefValue = "";
            $this->Individual->TooltipValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";
            $this->ShortName->TooltipValue = "";

            // Note
            $this->Note->LinkCustomAttributes = "";
            $this->Note->HrefValue = "";
            $this->Note->TooltipValue = "";

            // PrevAmt
            $this->PrevAmt->LinkCustomAttributes = "";
            $this->PrevAmt->HrefValue = "";
            $this->PrevAmt->TooltipValue = "";

            // BillName
            $this->BillName->LinkCustomAttributes = "";
            $this->BillName->HrefValue = "";
            $this->BillName->TooltipValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";
            $this->ActualAmt->TooltipValue = "";

            // NoHeading
            $this->NoHeading->LinkCustomAttributes = "";
            $this->NoHeading->HrefValue = "";
            $this->NoHeading->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // EditUser
            $this->EditUser->LinkCustomAttributes = "";
            $this->EditUser->HrefValue = "";
            $this->EditUser->TooltipValue = "";

            // HISCD
            $this->HISCD->LinkCustomAttributes = "";
            $this->HISCD->HrefValue = "";
            $this->HISCD->TooltipValue = "";

            // PriceList
            $this->PriceList->LinkCustomAttributes = "";
            $this->PriceList->HrefValue = "";
            $this->PriceList->TooltipValue = "";

            // IPAmt
            $this->IPAmt->LinkCustomAttributes = "";
            $this->IPAmt->HrefValue = "";
            $this->IPAmt->TooltipValue = "";

            // IInsAmt
            $this->IInsAmt->LinkCustomAttributes = "";
            $this->IInsAmt->HrefValue = "";
            $this->IInsAmt->TooltipValue = "";

            // ManualCD
            $this->ManualCD->LinkCustomAttributes = "";
            $this->ManualCD->HrefValue = "";
            $this->ManualCD->TooltipValue = "";

            // Free
            $this->Free->LinkCustomAttributes = "";
            $this->Free->HrefValue = "";
            $this->Free->TooltipValue = "";

            // IIpAmt
            $this->IIpAmt->LinkCustomAttributes = "";
            $this->IIpAmt->HrefValue = "";
            $this->IIpAmt->TooltipValue = "";

            // InsAmt
            $this->InsAmt->LinkCustomAttributes = "";
            $this->InsAmt->HrefValue = "";
            $this->InsAmt->TooltipValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
            $this->OutSource->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ProfileCode
            $this->ProfileCode->EditAttrs["class"] = "form-control";
            $this->ProfileCode->EditCustomAttributes = "";
            if (!$this->ProfileCode->Raw) {
                $this->ProfileCode->CurrentValue = HtmlDecode($this->ProfileCode->CurrentValue);
            }
            $this->ProfileCode->EditValue = HtmlEncode($this->ProfileCode->CurrentValue);
            $this->ProfileCode->PlaceHolder = RemoveHtml($this->ProfileCode->caption());

            // ProfileName
            $this->ProfileName->EditAttrs["class"] = "form-control";
            $this->ProfileName->EditCustomAttributes = "";
            if (!$this->ProfileName->Raw) {
                $this->ProfileName->CurrentValue = HtmlDecode($this->ProfileName->CurrentValue);
            }
            $this->ProfileName->EditValue = HtmlEncode($this->ProfileName->CurrentValue);
            $this->ProfileName->PlaceHolder = RemoveHtml($this->ProfileName->caption());

            // ProfileAmount
            $this->ProfileAmount->EditAttrs["class"] = "form-control";
            $this->ProfileAmount->EditCustomAttributes = "";
            $this->ProfileAmount->EditValue = HtmlEncode($this->ProfileAmount->CurrentValue);
            $this->ProfileAmount->PlaceHolder = RemoveHtml($this->ProfileAmount->caption());
            if (strval($this->ProfileAmount->EditValue) != "" && is_numeric($this->ProfileAmount->EditValue)) {
                $this->ProfileAmount->EditValue = FormatNumber($this->ProfileAmount->EditValue, -2, -2, -2, -2);
            }

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->EditAttrs["class"] = "form-control";
            $this->ProfileSpecialAmount->EditCustomAttributes = "";
            $this->ProfileSpecialAmount->EditValue = HtmlEncode($this->ProfileSpecialAmount->CurrentValue);
            $this->ProfileSpecialAmount->PlaceHolder = RemoveHtml($this->ProfileSpecialAmount->caption());
            if (strval($this->ProfileSpecialAmount->EditValue) != "" && is_numeric($this->ProfileSpecialAmount->EditValue)) {
                $this->ProfileSpecialAmount->EditValue = FormatNumber($this->ProfileSpecialAmount->EditValue, -2, -2, -2, -2);
            }

            // ProfileMasterInactive
            $this->ProfileMasterInactive->EditAttrs["class"] = "form-control";
            $this->ProfileMasterInactive->EditCustomAttributes = "";
            if (!$this->ProfileMasterInactive->Raw) {
                $this->ProfileMasterInactive->CurrentValue = HtmlDecode($this->ProfileMasterInactive->CurrentValue);
            }
            $this->ProfileMasterInactive->EditValue = HtmlEncode($this->ProfileMasterInactive->CurrentValue);
            $this->ProfileMasterInactive->PlaceHolder = RemoveHtml($this->ProfileMasterInactive->caption());

            // ReagentAmt
            $this->ReagentAmt->EditAttrs["class"] = "form-control";
            $this->ReagentAmt->EditCustomAttributes = "";
            $this->ReagentAmt->EditValue = HtmlEncode($this->ReagentAmt->CurrentValue);
            $this->ReagentAmt->PlaceHolder = RemoveHtml($this->ReagentAmt->caption());
            if (strval($this->ReagentAmt->EditValue) != "" && is_numeric($this->ReagentAmt->EditValue)) {
                $this->ReagentAmt->EditValue = FormatNumber($this->ReagentAmt->EditValue, -2, -2, -2, -2);
            }

            // LabAmt
            $this->LabAmt->EditAttrs["class"] = "form-control";
            $this->LabAmt->EditCustomAttributes = "";
            $this->LabAmt->EditValue = HtmlEncode($this->LabAmt->CurrentValue);
            $this->LabAmt->PlaceHolder = RemoveHtml($this->LabAmt->caption());
            if (strval($this->LabAmt->EditValue) != "" && is_numeric($this->LabAmt->EditValue)) {
                $this->LabAmt->EditValue = FormatNumber($this->LabAmt->EditValue, -2, -2, -2, -2);
            }

            // RefAmt
            $this->RefAmt->EditAttrs["class"] = "form-control";
            $this->RefAmt->EditCustomAttributes = "";
            $this->RefAmt->EditValue = HtmlEncode($this->RefAmt->CurrentValue);
            $this->RefAmt->PlaceHolder = RemoveHtml($this->RefAmt->caption());
            if (strval($this->RefAmt->EditValue) != "" && is_numeric($this->RefAmt->EditValue)) {
                $this->RefAmt->EditValue = FormatNumber($this->RefAmt->EditValue, -2, -2, -2, -2);
            }

            // MainDeptCD
            $this->MainDeptCD->EditAttrs["class"] = "form-control";
            $this->MainDeptCD->EditCustomAttributes = "";
            if (!$this->MainDeptCD->Raw) {
                $this->MainDeptCD->CurrentValue = HtmlDecode($this->MainDeptCD->CurrentValue);
            }
            $this->MainDeptCD->EditValue = HtmlEncode($this->MainDeptCD->CurrentValue);
            $this->MainDeptCD->PlaceHolder = RemoveHtml($this->MainDeptCD->caption());

            // Individual
            $this->Individual->EditAttrs["class"] = "form-control";
            $this->Individual->EditCustomAttributes = "";
            if (!$this->Individual->Raw) {
                $this->Individual->CurrentValue = HtmlDecode($this->Individual->CurrentValue);
            }
            $this->Individual->EditValue = HtmlEncode($this->Individual->CurrentValue);
            $this->Individual->PlaceHolder = RemoveHtml($this->Individual->caption());

            // ShortName
            $this->ShortName->EditAttrs["class"] = "form-control";
            $this->ShortName->EditCustomAttributes = "";
            if (!$this->ShortName->Raw) {
                $this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
            }
            $this->ShortName->EditValue = HtmlEncode($this->ShortName->CurrentValue);
            $this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

            // Note
            $this->Note->EditAttrs["class"] = "form-control";
            $this->Note->EditCustomAttributes = "";
            $this->Note->EditValue = HtmlEncode($this->Note->CurrentValue);
            $this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

            // PrevAmt
            $this->PrevAmt->EditAttrs["class"] = "form-control";
            $this->PrevAmt->EditCustomAttributes = "";
            $this->PrevAmt->EditValue = HtmlEncode($this->PrevAmt->CurrentValue);
            $this->PrevAmt->PlaceHolder = RemoveHtml($this->PrevAmt->caption());
            if (strval($this->PrevAmt->EditValue) != "" && is_numeric($this->PrevAmt->EditValue)) {
                $this->PrevAmt->EditValue = FormatNumber($this->PrevAmt->EditValue, -2, -2, -2, -2);
            }

            // BillName
            $this->BillName->EditAttrs["class"] = "form-control";
            $this->BillName->EditCustomAttributes = "";
            if (!$this->BillName->Raw) {
                $this->BillName->CurrentValue = HtmlDecode($this->BillName->CurrentValue);
            }
            $this->BillName->EditValue = HtmlEncode($this->BillName->CurrentValue);
            $this->BillName->PlaceHolder = RemoveHtml($this->BillName->caption());

            // ActualAmt
            $this->ActualAmt->EditAttrs["class"] = "form-control";
            $this->ActualAmt->EditCustomAttributes = "";
            $this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->CurrentValue);
            $this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
            if (strval($this->ActualAmt->EditValue) != "" && is_numeric($this->ActualAmt->EditValue)) {
                $this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);
            }

            // NoHeading
            $this->NoHeading->EditAttrs["class"] = "form-control";
            $this->NoHeading->EditCustomAttributes = "";
            if (!$this->NoHeading->Raw) {
                $this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
            }
            $this->NoHeading->EditValue = HtmlEncode($this->NoHeading->CurrentValue);
            $this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

            // EditDate
            $this->EditDate->EditAttrs["class"] = "form-control";
            $this->EditDate->EditCustomAttributes = "";
            $this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
            $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

            // EditUser
            $this->EditUser->EditAttrs["class"] = "form-control";
            $this->EditUser->EditCustomAttributes = "";
            if (!$this->EditUser->Raw) {
                $this->EditUser->CurrentValue = HtmlDecode($this->EditUser->CurrentValue);
            }
            $this->EditUser->EditValue = HtmlEncode($this->EditUser->CurrentValue);
            $this->EditUser->PlaceHolder = RemoveHtml($this->EditUser->caption());

            // HISCD
            $this->HISCD->EditAttrs["class"] = "form-control";
            $this->HISCD->EditCustomAttributes = "";
            if (!$this->HISCD->Raw) {
                $this->HISCD->CurrentValue = HtmlDecode($this->HISCD->CurrentValue);
            }
            $this->HISCD->EditValue = HtmlEncode($this->HISCD->CurrentValue);
            $this->HISCD->PlaceHolder = RemoveHtml($this->HISCD->caption());

            // PriceList
            $this->PriceList->EditAttrs["class"] = "form-control";
            $this->PriceList->EditCustomAttributes = "";
            if (!$this->PriceList->Raw) {
                $this->PriceList->CurrentValue = HtmlDecode($this->PriceList->CurrentValue);
            }
            $this->PriceList->EditValue = HtmlEncode($this->PriceList->CurrentValue);
            $this->PriceList->PlaceHolder = RemoveHtml($this->PriceList->caption());

            // IPAmt
            $this->IPAmt->EditAttrs["class"] = "form-control";
            $this->IPAmt->EditCustomAttributes = "";
            $this->IPAmt->EditValue = HtmlEncode($this->IPAmt->CurrentValue);
            $this->IPAmt->PlaceHolder = RemoveHtml($this->IPAmt->caption());
            if (strval($this->IPAmt->EditValue) != "" && is_numeric($this->IPAmt->EditValue)) {
                $this->IPAmt->EditValue = FormatNumber($this->IPAmt->EditValue, -2, -2, -2, -2);
            }

            // IInsAmt
            $this->IInsAmt->EditAttrs["class"] = "form-control";
            $this->IInsAmt->EditCustomAttributes = "";
            $this->IInsAmt->EditValue = HtmlEncode($this->IInsAmt->CurrentValue);
            $this->IInsAmt->PlaceHolder = RemoveHtml($this->IInsAmt->caption());
            if (strval($this->IInsAmt->EditValue) != "" && is_numeric($this->IInsAmt->EditValue)) {
                $this->IInsAmt->EditValue = FormatNumber($this->IInsAmt->EditValue, -2, -2, -2, -2);
            }

            // ManualCD
            $this->ManualCD->EditAttrs["class"] = "form-control";
            $this->ManualCD->EditCustomAttributes = "";
            if (!$this->ManualCD->Raw) {
                $this->ManualCD->CurrentValue = HtmlDecode($this->ManualCD->CurrentValue);
            }
            $this->ManualCD->EditValue = HtmlEncode($this->ManualCD->CurrentValue);
            $this->ManualCD->PlaceHolder = RemoveHtml($this->ManualCD->caption());

            // Free
            $this->Free->EditAttrs["class"] = "form-control";
            $this->Free->EditCustomAttributes = "";
            if (!$this->Free->Raw) {
                $this->Free->CurrentValue = HtmlDecode($this->Free->CurrentValue);
            }
            $this->Free->EditValue = HtmlEncode($this->Free->CurrentValue);
            $this->Free->PlaceHolder = RemoveHtml($this->Free->caption());

            // IIpAmt
            $this->IIpAmt->EditAttrs["class"] = "form-control";
            $this->IIpAmt->EditCustomAttributes = "";
            $this->IIpAmt->EditValue = HtmlEncode($this->IIpAmt->CurrentValue);
            $this->IIpAmt->PlaceHolder = RemoveHtml($this->IIpAmt->caption());
            if (strval($this->IIpAmt->EditValue) != "" && is_numeric($this->IIpAmt->EditValue)) {
                $this->IIpAmt->EditValue = FormatNumber($this->IIpAmt->EditValue, -2, -2, -2, -2);
            }

            // InsAmt
            $this->InsAmt->EditAttrs["class"] = "form-control";
            $this->InsAmt->EditCustomAttributes = "";
            $this->InsAmt->EditValue = HtmlEncode($this->InsAmt->CurrentValue);
            $this->InsAmt->PlaceHolder = RemoveHtml($this->InsAmt->caption());
            if (strval($this->InsAmt->EditValue) != "" && is_numeric($this->InsAmt->EditValue)) {
                $this->InsAmt->EditValue = FormatNumber($this->InsAmt->EditValue, -2, -2, -2, -2);
            }

            // OutSource
            $this->OutSource->EditAttrs["class"] = "form-control";
            $this->OutSource->EditCustomAttributes = "";
            if (!$this->OutSource->Raw) {
                $this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
            }
            $this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
            $this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // ProfileCode
            $this->ProfileCode->LinkCustomAttributes = "";
            $this->ProfileCode->HrefValue = "";

            // ProfileName
            $this->ProfileName->LinkCustomAttributes = "";
            $this->ProfileName->HrefValue = "";

            // ProfileAmount
            $this->ProfileAmount->LinkCustomAttributes = "";
            $this->ProfileAmount->HrefValue = "";

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->LinkCustomAttributes = "";
            $this->ProfileSpecialAmount->HrefValue = "";

            // ProfileMasterInactive
            $this->ProfileMasterInactive->LinkCustomAttributes = "";
            $this->ProfileMasterInactive->HrefValue = "";

            // ReagentAmt
            $this->ReagentAmt->LinkCustomAttributes = "";
            $this->ReagentAmt->HrefValue = "";

            // LabAmt
            $this->LabAmt->LinkCustomAttributes = "";
            $this->LabAmt->HrefValue = "";

            // RefAmt
            $this->RefAmt->LinkCustomAttributes = "";
            $this->RefAmt->HrefValue = "";

            // MainDeptCD
            $this->MainDeptCD->LinkCustomAttributes = "";
            $this->MainDeptCD->HrefValue = "";

            // Individual
            $this->Individual->LinkCustomAttributes = "";
            $this->Individual->HrefValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";

            // Note
            $this->Note->LinkCustomAttributes = "";
            $this->Note->HrefValue = "";

            // PrevAmt
            $this->PrevAmt->LinkCustomAttributes = "";
            $this->PrevAmt->HrefValue = "";

            // BillName
            $this->BillName->LinkCustomAttributes = "";
            $this->BillName->HrefValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";

            // NoHeading
            $this->NoHeading->LinkCustomAttributes = "";
            $this->NoHeading->HrefValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";

            // EditUser
            $this->EditUser->LinkCustomAttributes = "";
            $this->EditUser->HrefValue = "";

            // HISCD
            $this->HISCD->LinkCustomAttributes = "";
            $this->HISCD->HrefValue = "";

            // PriceList
            $this->PriceList->LinkCustomAttributes = "";
            $this->PriceList->HrefValue = "";

            // IPAmt
            $this->IPAmt->LinkCustomAttributes = "";
            $this->IPAmt->HrefValue = "";

            // IInsAmt
            $this->IInsAmt->LinkCustomAttributes = "";
            $this->IInsAmt->HrefValue = "";

            // ManualCD
            $this->ManualCD->LinkCustomAttributes = "";
            $this->ManualCD->HrefValue = "";

            // Free
            $this->Free->LinkCustomAttributes = "";
            $this->Free->HrefValue = "";

            // IIpAmt
            $this->IIpAmt->LinkCustomAttributes = "";
            $this->IIpAmt->HrefValue = "";

            // InsAmt
            $this->InsAmt->LinkCustomAttributes = "";
            $this->InsAmt->HrefValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
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
        if ($this->ProfileCode->Required) {
            if (!$this->ProfileCode->IsDetailKey && EmptyValue($this->ProfileCode->FormValue)) {
                $this->ProfileCode->addErrorMessage(str_replace("%s", $this->ProfileCode->caption(), $this->ProfileCode->RequiredErrorMessage));
            }
        }
        if ($this->ProfileName->Required) {
            if (!$this->ProfileName->IsDetailKey && EmptyValue($this->ProfileName->FormValue)) {
                $this->ProfileName->addErrorMessage(str_replace("%s", $this->ProfileName->caption(), $this->ProfileName->RequiredErrorMessage));
            }
        }
        if ($this->ProfileAmount->Required) {
            if (!$this->ProfileAmount->IsDetailKey && EmptyValue($this->ProfileAmount->FormValue)) {
                $this->ProfileAmount->addErrorMessage(str_replace("%s", $this->ProfileAmount->caption(), $this->ProfileAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ProfileAmount->FormValue)) {
            $this->ProfileAmount->addErrorMessage($this->ProfileAmount->getErrorMessage(false));
        }
        if ($this->ProfileSpecialAmount->Required) {
            if (!$this->ProfileSpecialAmount->IsDetailKey && EmptyValue($this->ProfileSpecialAmount->FormValue)) {
                $this->ProfileSpecialAmount->addErrorMessage(str_replace("%s", $this->ProfileSpecialAmount->caption(), $this->ProfileSpecialAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ProfileSpecialAmount->FormValue)) {
            $this->ProfileSpecialAmount->addErrorMessage($this->ProfileSpecialAmount->getErrorMessage(false));
        }
        if ($this->ProfileMasterInactive->Required) {
            if (!$this->ProfileMasterInactive->IsDetailKey && EmptyValue($this->ProfileMasterInactive->FormValue)) {
                $this->ProfileMasterInactive->addErrorMessage(str_replace("%s", $this->ProfileMasterInactive->caption(), $this->ProfileMasterInactive->RequiredErrorMessage));
            }
        }
        if ($this->ReagentAmt->Required) {
            if (!$this->ReagentAmt->IsDetailKey && EmptyValue($this->ReagentAmt->FormValue)) {
                $this->ReagentAmt->addErrorMessage(str_replace("%s", $this->ReagentAmt->caption(), $this->ReagentAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ReagentAmt->FormValue)) {
            $this->ReagentAmt->addErrorMessage($this->ReagentAmt->getErrorMessage(false));
        }
        if ($this->LabAmt->Required) {
            if (!$this->LabAmt->IsDetailKey && EmptyValue($this->LabAmt->FormValue)) {
                $this->LabAmt->addErrorMessage(str_replace("%s", $this->LabAmt->caption(), $this->LabAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LabAmt->FormValue)) {
            $this->LabAmt->addErrorMessage($this->LabAmt->getErrorMessage(false));
        }
        if ($this->RefAmt->Required) {
            if (!$this->RefAmt->IsDetailKey && EmptyValue($this->RefAmt->FormValue)) {
                $this->RefAmt->addErrorMessage(str_replace("%s", $this->RefAmt->caption(), $this->RefAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RefAmt->FormValue)) {
            $this->RefAmt->addErrorMessage($this->RefAmt->getErrorMessage(false));
        }
        if ($this->MainDeptCD->Required) {
            if (!$this->MainDeptCD->IsDetailKey && EmptyValue($this->MainDeptCD->FormValue)) {
                $this->MainDeptCD->addErrorMessage(str_replace("%s", $this->MainDeptCD->caption(), $this->MainDeptCD->RequiredErrorMessage));
            }
        }
        if ($this->Individual->Required) {
            if (!$this->Individual->IsDetailKey && EmptyValue($this->Individual->FormValue)) {
                $this->Individual->addErrorMessage(str_replace("%s", $this->Individual->caption(), $this->Individual->RequiredErrorMessage));
            }
        }
        if ($this->ShortName->Required) {
            if (!$this->ShortName->IsDetailKey && EmptyValue($this->ShortName->FormValue)) {
                $this->ShortName->addErrorMessage(str_replace("%s", $this->ShortName->caption(), $this->ShortName->RequiredErrorMessage));
            }
        }
        if ($this->Note->Required) {
            if (!$this->Note->IsDetailKey && EmptyValue($this->Note->FormValue)) {
                $this->Note->addErrorMessage(str_replace("%s", $this->Note->caption(), $this->Note->RequiredErrorMessage));
            }
        }
        if ($this->PrevAmt->Required) {
            if (!$this->PrevAmt->IsDetailKey && EmptyValue($this->PrevAmt->FormValue)) {
                $this->PrevAmt->addErrorMessage(str_replace("%s", $this->PrevAmt->caption(), $this->PrevAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PrevAmt->FormValue)) {
            $this->PrevAmt->addErrorMessage($this->PrevAmt->getErrorMessage(false));
        }
        if ($this->BillName->Required) {
            if (!$this->BillName->IsDetailKey && EmptyValue($this->BillName->FormValue)) {
                $this->BillName->addErrorMessage(str_replace("%s", $this->BillName->caption(), $this->BillName->RequiredErrorMessage));
            }
        }
        if ($this->ActualAmt->Required) {
            if (!$this->ActualAmt->IsDetailKey && EmptyValue($this->ActualAmt->FormValue)) {
                $this->ActualAmt->addErrorMessage(str_replace("%s", $this->ActualAmt->caption(), $this->ActualAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ActualAmt->FormValue)) {
            $this->ActualAmt->addErrorMessage($this->ActualAmt->getErrorMessage(false));
        }
        if ($this->NoHeading->Required) {
            if (!$this->NoHeading->IsDetailKey && EmptyValue($this->NoHeading->FormValue)) {
                $this->NoHeading->addErrorMessage(str_replace("%s", $this->NoHeading->caption(), $this->NoHeading->RequiredErrorMessage));
            }
        }
        if ($this->EditDate->Required) {
            if (!$this->EditDate->IsDetailKey && EmptyValue($this->EditDate->FormValue)) {
                $this->EditDate->addErrorMessage(str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EditDate->FormValue)) {
            $this->EditDate->addErrorMessage($this->EditDate->getErrorMessage(false));
        }
        if ($this->EditUser->Required) {
            if (!$this->EditUser->IsDetailKey && EmptyValue($this->EditUser->FormValue)) {
                $this->EditUser->addErrorMessage(str_replace("%s", $this->EditUser->caption(), $this->EditUser->RequiredErrorMessage));
            }
        }
        if ($this->HISCD->Required) {
            if (!$this->HISCD->IsDetailKey && EmptyValue($this->HISCD->FormValue)) {
                $this->HISCD->addErrorMessage(str_replace("%s", $this->HISCD->caption(), $this->HISCD->RequiredErrorMessage));
            }
        }
        if ($this->PriceList->Required) {
            if (!$this->PriceList->IsDetailKey && EmptyValue($this->PriceList->FormValue)) {
                $this->PriceList->addErrorMessage(str_replace("%s", $this->PriceList->caption(), $this->PriceList->RequiredErrorMessage));
            }
        }
        if ($this->IPAmt->Required) {
            if (!$this->IPAmt->IsDetailKey && EmptyValue($this->IPAmt->FormValue)) {
                $this->IPAmt->addErrorMessage(str_replace("%s", $this->IPAmt->caption(), $this->IPAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IPAmt->FormValue)) {
            $this->IPAmt->addErrorMessage($this->IPAmt->getErrorMessage(false));
        }
        if ($this->IInsAmt->Required) {
            if (!$this->IInsAmt->IsDetailKey && EmptyValue($this->IInsAmt->FormValue)) {
                $this->IInsAmt->addErrorMessage(str_replace("%s", $this->IInsAmt->caption(), $this->IInsAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IInsAmt->FormValue)) {
            $this->IInsAmt->addErrorMessage($this->IInsAmt->getErrorMessage(false));
        }
        if ($this->ManualCD->Required) {
            if (!$this->ManualCD->IsDetailKey && EmptyValue($this->ManualCD->FormValue)) {
                $this->ManualCD->addErrorMessage(str_replace("%s", $this->ManualCD->caption(), $this->ManualCD->RequiredErrorMessage));
            }
        }
        if ($this->Free->Required) {
            if (!$this->Free->IsDetailKey && EmptyValue($this->Free->FormValue)) {
                $this->Free->addErrorMessage(str_replace("%s", $this->Free->caption(), $this->Free->RequiredErrorMessage));
            }
        }
        if ($this->IIpAmt->Required) {
            if (!$this->IIpAmt->IsDetailKey && EmptyValue($this->IIpAmt->FormValue)) {
                $this->IIpAmt->addErrorMessage(str_replace("%s", $this->IIpAmt->caption(), $this->IIpAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IIpAmt->FormValue)) {
            $this->IIpAmt->addErrorMessage($this->IIpAmt->getErrorMessage(false));
        }
        if ($this->InsAmt->Required) {
            if (!$this->InsAmt->IsDetailKey && EmptyValue($this->InsAmt->FormValue)) {
                $this->InsAmt->addErrorMessage(str_replace("%s", $this->InsAmt->caption(), $this->InsAmt->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->InsAmt->FormValue)) {
            $this->InsAmt->addErrorMessage($this->InsAmt->getErrorMessage(false));
        }
        if ($this->OutSource->Required) {
            if (!$this->OutSource->IsDetailKey && EmptyValue($this->OutSource->FormValue)) {
                $this->OutSource->addErrorMessage(str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
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

            // ProfileCode
            $this->ProfileCode->setDbValueDef($rsnew, $this->ProfileCode->CurrentValue, "", $this->ProfileCode->ReadOnly);

            // ProfileName
            $this->ProfileName->setDbValueDef($rsnew, $this->ProfileName->CurrentValue, "", $this->ProfileName->ReadOnly);

            // ProfileAmount
            $this->ProfileAmount->setDbValueDef($rsnew, $this->ProfileAmount->CurrentValue, 0, $this->ProfileAmount->ReadOnly);

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->setDbValueDef($rsnew, $this->ProfileSpecialAmount->CurrentValue, 0, $this->ProfileSpecialAmount->ReadOnly);

            // ProfileMasterInactive
            $this->ProfileMasterInactive->setDbValueDef($rsnew, $this->ProfileMasterInactive->CurrentValue, "", $this->ProfileMasterInactive->ReadOnly);

            // ReagentAmt
            $this->ReagentAmt->setDbValueDef($rsnew, $this->ReagentAmt->CurrentValue, 0, $this->ReagentAmt->ReadOnly);

            // LabAmt
            $this->LabAmt->setDbValueDef($rsnew, $this->LabAmt->CurrentValue, 0, $this->LabAmt->ReadOnly);

            // RefAmt
            $this->RefAmt->setDbValueDef($rsnew, $this->RefAmt->CurrentValue, 0, $this->RefAmt->ReadOnly);

            // MainDeptCD
            $this->MainDeptCD->setDbValueDef($rsnew, $this->MainDeptCD->CurrentValue, "", $this->MainDeptCD->ReadOnly);

            // Individual
            $this->Individual->setDbValueDef($rsnew, $this->Individual->CurrentValue, "", $this->Individual->ReadOnly);

            // ShortName
            $this->ShortName->setDbValueDef($rsnew, $this->ShortName->CurrentValue, "", $this->ShortName->ReadOnly);

            // Note
            $this->Note->setDbValueDef($rsnew, $this->Note->CurrentValue, "", $this->Note->ReadOnly);

            // PrevAmt
            $this->PrevAmt->setDbValueDef($rsnew, $this->PrevAmt->CurrentValue, 0, $this->PrevAmt->ReadOnly);

            // BillName
            $this->BillName->setDbValueDef($rsnew, $this->BillName->CurrentValue, "", $this->BillName->ReadOnly);

            // ActualAmt
            $this->ActualAmt->setDbValueDef($rsnew, $this->ActualAmt->CurrentValue, 0, $this->ActualAmt->ReadOnly);

            // NoHeading
            $this->NoHeading->setDbValueDef($rsnew, $this->NoHeading->CurrentValue, "", $this->NoHeading->ReadOnly);

            // EditDate
            $this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), null, $this->EditDate->ReadOnly);

            // EditUser
            $this->EditUser->setDbValueDef($rsnew, $this->EditUser->CurrentValue, "", $this->EditUser->ReadOnly);

            // HISCD
            $this->HISCD->setDbValueDef($rsnew, $this->HISCD->CurrentValue, "", $this->HISCD->ReadOnly);

            // PriceList
            $this->PriceList->setDbValueDef($rsnew, $this->PriceList->CurrentValue, "", $this->PriceList->ReadOnly);

            // IPAmt
            $this->IPAmt->setDbValueDef($rsnew, $this->IPAmt->CurrentValue, 0, $this->IPAmt->ReadOnly);

            // IInsAmt
            $this->IInsAmt->setDbValueDef($rsnew, $this->IInsAmt->CurrentValue, 0, $this->IInsAmt->ReadOnly);

            // ManualCD
            $this->ManualCD->setDbValueDef($rsnew, $this->ManualCD->CurrentValue, "", $this->ManualCD->ReadOnly);

            // Free
            $this->Free->setDbValueDef($rsnew, $this->Free->CurrentValue, "", $this->Free->ReadOnly);

            // IIpAmt
            $this->IIpAmt->setDbValueDef($rsnew, $this->IIpAmt->CurrentValue, 0, $this->IIpAmt->ReadOnly);

            // InsAmt
            $this->InsAmt->setDbValueDef($rsnew, $this->InsAmt->CurrentValue, 0, $this->InsAmt->ReadOnly);

            // OutSource
            $this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, "", $this->OutSource->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("LabProfileMasterList"), "", $this->TableVar, true);
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
