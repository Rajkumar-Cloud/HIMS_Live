<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmContactdetailsEdit extends CrmContactdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_contactdetails';

    // Page object name
    public $PageObjName = "CrmContactdetailsEdit";

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

        // Table object (crm_contactdetails)
        if (!isset($GLOBALS["crm_contactdetails"]) || get_class($GLOBALS["crm_contactdetails"]) == PROJECT_NAMESPACE . "crm_contactdetails") {
            $GLOBALS["crm_contactdetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_contactdetails');
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
                $doc = new $class(Container("crm_contactdetails"));
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
                    if ($pageName == "CrmContactdetailsView") {
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
            $key .= @$ar['contactid'];
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
        $this->contactid->setVisibility();
        $this->contact_no->setVisibility();
        $this->parentid->setVisibility();
        $this->salutation->setVisibility();
        $this->firstname->setVisibility();
        $this->lastname->setVisibility();
        $this->_email->setVisibility();
        $this->phone->setVisibility();
        $this->mobile->setVisibility();
        $this->reportsto->setVisibility();
        $this->training->setVisibility();
        $this->usertype->setVisibility();
        $this->contacttype->setVisibility();
        $this->otheremail->setVisibility();
        $this->donotcall->setVisibility();
        $this->emailoptout->setVisibility();
        $this->imagename->setVisibility();
        $this->isconvertedfromlead->setVisibility();
        $this->verification->setVisibility();
        $this->secondary_email->setVisibility();
        $this->notifilanguage->setVisibility();
        $this->contactstatus->setVisibility();
        $this->dav_status->setVisibility();
        $this->jobtitle->setVisibility();
        $this->decision_maker->setVisibility();
        $this->sum_time->setVisibility();
        $this->phone_extra->setVisibility();
        $this->mobile_extra->setVisibility();
        $this->approvals->setVisibility();
        $this->gender->setVisibility();
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
            if (($keyValue = Get("contactid") ?? Key(0) ?? Route(2)) !== null) {
                $this->contactid->setQueryStringValue($keyValue);
                $this->contactid->setOldValue($this->contactid->QueryStringValue);
            } elseif (Post("contactid") !== null) {
                $this->contactid->setFormValue(Post("contactid"));
                $this->contactid->setOldValue($this->contactid->FormValue);
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
                if (($keyValue = Get("contactid") ?? Route("contactid")) !== null) {
                    $this->contactid->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->contactid->CurrentValue = null;
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
                    $this->terminate("CrmContactdetailsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "CrmContactdetailsList") {
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

        // Check field name 'contactid' first before field var 'x_contactid'
        $val = $CurrentForm->hasValue("contactid") ? $CurrentForm->getValue("contactid") : $CurrentForm->getValue("x_contactid");
        if (!$this->contactid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->contactid->Visible = false; // Disable update for API request
            } else {
                $this->contactid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_contactid")) {
            $this->contactid->setOldValue($CurrentForm->getValue("o_contactid"));
        }

        // Check field name 'contact_no' first before field var 'x_contact_no'
        $val = $CurrentForm->hasValue("contact_no") ? $CurrentForm->getValue("contact_no") : $CurrentForm->getValue("x_contact_no");
        if (!$this->contact_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->contact_no->Visible = false; // Disable update for API request
            } else {
                $this->contact_no->setFormValue($val);
            }
        }

        // Check field name 'parentid' first before field var 'x_parentid'
        $val = $CurrentForm->hasValue("parentid") ? $CurrentForm->getValue("parentid") : $CurrentForm->getValue("x_parentid");
        if (!$this->parentid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->parentid->Visible = false; // Disable update for API request
            } else {
                $this->parentid->setFormValue($val);
            }
        }

        // Check field name 'salutation' first before field var 'x_salutation'
        $val = $CurrentForm->hasValue("salutation") ? $CurrentForm->getValue("salutation") : $CurrentForm->getValue("x_salutation");
        if (!$this->salutation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->salutation->Visible = false; // Disable update for API request
            } else {
                $this->salutation->setFormValue($val);
            }
        }

        // Check field name 'firstname' first before field var 'x_firstname'
        $val = $CurrentForm->hasValue("firstname") ? $CurrentForm->getValue("firstname") : $CurrentForm->getValue("x_firstname");
        if (!$this->firstname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->firstname->Visible = false; // Disable update for API request
            } else {
                $this->firstname->setFormValue($val);
            }
        }

        // Check field name 'lastname' first before field var 'x_lastname'
        $val = $CurrentForm->hasValue("lastname") ? $CurrentForm->getValue("lastname") : $CurrentForm->getValue("x_lastname");
        if (!$this->lastname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->lastname->Visible = false; // Disable update for API request
            } else {
                $this->lastname->setFormValue($val);
            }
        }

        // Check field name 'email' first before field var 'x__email'
        $val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
        if (!$this->_email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_email->Visible = false; // Disable update for API request
            } else {
                $this->_email->setFormValue($val);
            }
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

        // Check field name 'reportsto' first before field var 'x_reportsto'
        $val = $CurrentForm->hasValue("reportsto") ? $CurrentForm->getValue("reportsto") : $CurrentForm->getValue("x_reportsto");
        if (!$this->reportsto->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->reportsto->Visible = false; // Disable update for API request
            } else {
                $this->reportsto->setFormValue($val);
            }
        }

        // Check field name 'training' first before field var 'x_training'
        $val = $CurrentForm->hasValue("training") ? $CurrentForm->getValue("training") : $CurrentForm->getValue("x_training");
        if (!$this->training->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->training->Visible = false; // Disable update for API request
            } else {
                $this->training->setFormValue($val);
            }
        }

        // Check field name 'usertype' first before field var 'x_usertype'
        $val = $CurrentForm->hasValue("usertype") ? $CurrentForm->getValue("usertype") : $CurrentForm->getValue("x_usertype");
        if (!$this->usertype->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->usertype->Visible = false; // Disable update for API request
            } else {
                $this->usertype->setFormValue($val);
            }
        }

        // Check field name 'contacttype' first before field var 'x_contacttype'
        $val = $CurrentForm->hasValue("contacttype") ? $CurrentForm->getValue("contacttype") : $CurrentForm->getValue("x_contacttype");
        if (!$this->contacttype->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->contacttype->Visible = false; // Disable update for API request
            } else {
                $this->contacttype->setFormValue($val);
            }
        }

        // Check field name 'otheremail' first before field var 'x_otheremail'
        $val = $CurrentForm->hasValue("otheremail") ? $CurrentForm->getValue("otheremail") : $CurrentForm->getValue("x_otheremail");
        if (!$this->otheremail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->otheremail->Visible = false; // Disable update for API request
            } else {
                $this->otheremail->setFormValue($val);
            }
        }

        // Check field name 'donotcall' first before field var 'x_donotcall'
        $val = $CurrentForm->hasValue("donotcall") ? $CurrentForm->getValue("donotcall") : $CurrentForm->getValue("x_donotcall");
        if (!$this->donotcall->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->donotcall->Visible = false; // Disable update for API request
            } else {
                $this->donotcall->setFormValue($val);
            }
        }

        // Check field name 'emailoptout' first before field var 'x_emailoptout'
        $val = $CurrentForm->hasValue("emailoptout") ? $CurrentForm->getValue("emailoptout") : $CurrentForm->getValue("x_emailoptout");
        if (!$this->emailoptout->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->emailoptout->Visible = false; // Disable update for API request
            } else {
                $this->emailoptout->setFormValue($val);
            }
        }

        // Check field name 'imagename' first before field var 'x_imagename'
        $val = $CurrentForm->hasValue("imagename") ? $CurrentForm->getValue("imagename") : $CurrentForm->getValue("x_imagename");
        if (!$this->imagename->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->imagename->Visible = false; // Disable update for API request
            } else {
                $this->imagename->setFormValue($val);
            }
        }

        // Check field name 'isconvertedfromlead' first before field var 'x_isconvertedfromlead'
        $val = $CurrentForm->hasValue("isconvertedfromlead") ? $CurrentForm->getValue("isconvertedfromlead") : $CurrentForm->getValue("x_isconvertedfromlead");
        if (!$this->isconvertedfromlead->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->isconvertedfromlead->Visible = false; // Disable update for API request
            } else {
                $this->isconvertedfromlead->setFormValue($val);
            }
        }

        // Check field name 'verification' first before field var 'x_verification'
        $val = $CurrentForm->hasValue("verification") ? $CurrentForm->getValue("verification") : $CurrentForm->getValue("x_verification");
        if (!$this->verification->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->verification->Visible = false; // Disable update for API request
            } else {
                $this->verification->setFormValue($val);
            }
        }

        // Check field name 'secondary_email' first before field var 'x_secondary_email'
        $val = $CurrentForm->hasValue("secondary_email") ? $CurrentForm->getValue("secondary_email") : $CurrentForm->getValue("x_secondary_email");
        if (!$this->secondary_email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->secondary_email->Visible = false; // Disable update for API request
            } else {
                $this->secondary_email->setFormValue($val);
            }
        }

        // Check field name 'notifilanguage' first before field var 'x_notifilanguage'
        $val = $CurrentForm->hasValue("notifilanguage") ? $CurrentForm->getValue("notifilanguage") : $CurrentForm->getValue("x_notifilanguage");
        if (!$this->notifilanguage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->notifilanguage->Visible = false; // Disable update for API request
            } else {
                $this->notifilanguage->setFormValue($val);
            }
        }

        // Check field name 'contactstatus' first before field var 'x_contactstatus'
        $val = $CurrentForm->hasValue("contactstatus") ? $CurrentForm->getValue("contactstatus") : $CurrentForm->getValue("x_contactstatus");
        if (!$this->contactstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->contactstatus->Visible = false; // Disable update for API request
            } else {
                $this->contactstatus->setFormValue($val);
            }
        }

        // Check field name 'dav_status' first before field var 'x_dav_status'
        $val = $CurrentForm->hasValue("dav_status") ? $CurrentForm->getValue("dav_status") : $CurrentForm->getValue("x_dav_status");
        if (!$this->dav_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->dav_status->Visible = false; // Disable update for API request
            } else {
                $this->dav_status->setFormValue($val);
            }
        }

        // Check field name 'jobtitle' first before field var 'x_jobtitle'
        $val = $CurrentForm->hasValue("jobtitle") ? $CurrentForm->getValue("jobtitle") : $CurrentForm->getValue("x_jobtitle");
        if (!$this->jobtitle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->jobtitle->Visible = false; // Disable update for API request
            } else {
                $this->jobtitle->setFormValue($val);
            }
        }

        // Check field name 'decision_maker' first before field var 'x_decision_maker'
        $val = $CurrentForm->hasValue("decision_maker") ? $CurrentForm->getValue("decision_maker") : $CurrentForm->getValue("x_decision_maker");
        if (!$this->decision_maker->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->decision_maker->Visible = false; // Disable update for API request
            } else {
                $this->decision_maker->setFormValue($val);
            }
        }

        // Check field name 'sum_time' first before field var 'x_sum_time'
        $val = $CurrentForm->hasValue("sum_time") ? $CurrentForm->getValue("sum_time") : $CurrentForm->getValue("x_sum_time");
        if (!$this->sum_time->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sum_time->Visible = false; // Disable update for API request
            } else {
                $this->sum_time->setFormValue($val);
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

        // Check field name 'approvals' first before field var 'x_approvals'
        $val = $CurrentForm->hasValue("approvals") ? $CurrentForm->getValue("approvals") : $CurrentForm->getValue("x_approvals");
        if (!$this->approvals->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->approvals->Visible = false; // Disable update for API request
            } else {
                $this->approvals->setFormValue($val);
            }
        }

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->contactid->CurrentValue = $this->contactid->FormValue;
        $this->contact_no->CurrentValue = $this->contact_no->FormValue;
        $this->parentid->CurrentValue = $this->parentid->FormValue;
        $this->salutation->CurrentValue = $this->salutation->FormValue;
        $this->firstname->CurrentValue = $this->firstname->FormValue;
        $this->lastname->CurrentValue = $this->lastname->FormValue;
        $this->_email->CurrentValue = $this->_email->FormValue;
        $this->phone->CurrentValue = $this->phone->FormValue;
        $this->mobile->CurrentValue = $this->mobile->FormValue;
        $this->reportsto->CurrentValue = $this->reportsto->FormValue;
        $this->training->CurrentValue = $this->training->FormValue;
        $this->usertype->CurrentValue = $this->usertype->FormValue;
        $this->contacttype->CurrentValue = $this->contacttype->FormValue;
        $this->otheremail->CurrentValue = $this->otheremail->FormValue;
        $this->donotcall->CurrentValue = $this->donotcall->FormValue;
        $this->emailoptout->CurrentValue = $this->emailoptout->FormValue;
        $this->imagename->CurrentValue = $this->imagename->FormValue;
        $this->isconvertedfromlead->CurrentValue = $this->isconvertedfromlead->FormValue;
        $this->verification->CurrentValue = $this->verification->FormValue;
        $this->secondary_email->CurrentValue = $this->secondary_email->FormValue;
        $this->notifilanguage->CurrentValue = $this->notifilanguage->FormValue;
        $this->contactstatus->CurrentValue = $this->contactstatus->FormValue;
        $this->dav_status->CurrentValue = $this->dav_status->FormValue;
        $this->jobtitle->CurrentValue = $this->jobtitle->FormValue;
        $this->decision_maker->CurrentValue = $this->decision_maker->FormValue;
        $this->sum_time->CurrentValue = $this->sum_time->FormValue;
        $this->phone_extra->CurrentValue = $this->phone_extra->FormValue;
        $this->mobile_extra->CurrentValue = $this->mobile_extra->FormValue;
        $this->approvals->CurrentValue = $this->approvals->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
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
        $this->contactid->setDbValue($row['contactid']);
        $this->contact_no->setDbValue($row['contact_no']);
        $this->parentid->setDbValue($row['parentid']);
        $this->salutation->setDbValue($row['salutation']);
        $this->firstname->setDbValue($row['firstname']);
        $this->lastname->setDbValue($row['lastname']);
        $this->_email->setDbValue($row['email']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->reportsto->setDbValue($row['reportsto']);
        $this->training->setDbValue($row['training']);
        $this->usertype->setDbValue($row['usertype']);
        $this->contacttype->setDbValue($row['contacttype']);
        $this->otheremail->setDbValue($row['otheremail']);
        $this->donotcall->setDbValue($row['donotcall']);
        $this->emailoptout->setDbValue($row['emailoptout']);
        $this->imagename->setDbValue($row['imagename']);
        $this->isconvertedfromlead->setDbValue($row['isconvertedfromlead']);
        $this->verification->setDbValue($row['verification']);
        $this->secondary_email->setDbValue($row['secondary_email']);
        $this->notifilanguage->setDbValue($row['notifilanguage']);
        $this->contactstatus->setDbValue($row['contactstatus']);
        $this->dav_status->setDbValue($row['dav_status']);
        $this->jobtitle->setDbValue($row['jobtitle']);
        $this->decision_maker->setDbValue($row['decision_maker']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->approvals->setDbValue($row['approvals']);
        $this->gender->setDbValue($row['gender']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['contactid'] = null;
        $row['contact_no'] = null;
        $row['parentid'] = null;
        $row['salutation'] = null;
        $row['firstname'] = null;
        $row['lastname'] = null;
        $row['email'] = null;
        $row['phone'] = null;
        $row['mobile'] = null;
        $row['reportsto'] = null;
        $row['training'] = null;
        $row['usertype'] = null;
        $row['contacttype'] = null;
        $row['otheremail'] = null;
        $row['donotcall'] = null;
        $row['emailoptout'] = null;
        $row['imagename'] = null;
        $row['isconvertedfromlead'] = null;
        $row['verification'] = null;
        $row['secondary_email'] = null;
        $row['notifilanguage'] = null;
        $row['contactstatus'] = null;
        $row['dav_status'] = null;
        $row['jobtitle'] = null;
        $row['decision_maker'] = null;
        $row['sum_time'] = null;
        $row['phone_extra'] = null;
        $row['mobile_extra'] = null;
        $row['approvals'] = null;
        $row['gender'] = null;
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
        if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue))) {
            $this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // contactid

        // contact_no

        // parentid

        // salutation

        // firstname

        // lastname

        // email

        // phone

        // mobile

        // reportsto

        // training

        // usertype

        // contacttype

        // otheremail

        // donotcall

        // emailoptout

        // imagename

        // isconvertedfromlead

        // verification

        // secondary_email

        // notifilanguage

        // contactstatus

        // dav_status

        // jobtitle

        // decision_maker

        // sum_time

        // phone_extra

        // mobile_extra

        // approvals

        // gender
        if ($this->RowType == ROWTYPE_VIEW) {
            // contactid
            $this->contactid->ViewValue = $this->contactid->CurrentValue;
            $this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
            $this->contactid->ViewCustomAttributes = "";

            // contact_no
            $this->contact_no->ViewValue = $this->contact_no->CurrentValue;
            $this->contact_no->ViewCustomAttributes = "";

            // parentid
            $this->parentid->ViewValue = $this->parentid->CurrentValue;
            $this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
            $this->parentid->ViewCustomAttributes = "";

            // salutation
            $this->salutation->ViewValue = $this->salutation->CurrentValue;
            $this->salutation->ViewCustomAttributes = "";

            // firstname
            $this->firstname->ViewValue = $this->firstname->CurrentValue;
            $this->firstname->ViewCustomAttributes = "";

            // lastname
            $this->lastname->ViewValue = $this->lastname->CurrentValue;
            $this->lastname->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // phone
            $this->phone->ViewValue = $this->phone->CurrentValue;
            $this->phone->ViewCustomAttributes = "";

            // mobile
            $this->mobile->ViewValue = $this->mobile->CurrentValue;
            $this->mobile->ViewCustomAttributes = "";

            // reportsto
            $this->reportsto->ViewValue = $this->reportsto->CurrentValue;
            $this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
            $this->reportsto->ViewCustomAttributes = "";

            // training
            $this->training->ViewValue = $this->training->CurrentValue;
            $this->training->ViewCustomAttributes = "";

            // usertype
            $this->usertype->ViewValue = $this->usertype->CurrentValue;
            $this->usertype->ViewCustomAttributes = "";

            // contacttype
            $this->contacttype->ViewValue = $this->contacttype->CurrentValue;
            $this->contacttype->ViewCustomAttributes = "";

            // otheremail
            $this->otheremail->ViewValue = $this->otheremail->CurrentValue;
            $this->otheremail->ViewCustomAttributes = "";

            // donotcall
            $this->donotcall->ViewValue = $this->donotcall->CurrentValue;
            $this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
            $this->donotcall->ViewCustomAttributes = "";

            // emailoptout
            $this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
            $this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
            $this->emailoptout->ViewCustomAttributes = "";

            // imagename
            $this->imagename->ViewValue = $this->imagename->CurrentValue;
            $this->imagename->ViewCustomAttributes = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
            $this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
            $this->isconvertedfromlead->ViewCustomAttributes = "";

            // verification
            $this->verification->ViewValue = $this->verification->CurrentValue;
            $this->verification->ViewCustomAttributes = "";

            // secondary_email
            $this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
            $this->secondary_email->ViewCustomAttributes = "";

            // notifilanguage
            $this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
            $this->notifilanguage->ViewCustomAttributes = "";

            // contactstatus
            $this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
            $this->contactstatus->ViewCustomAttributes = "";

            // dav_status
            $this->dav_status->ViewValue = $this->dav_status->CurrentValue;
            $this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
            $this->dav_status->ViewCustomAttributes = "";

            // jobtitle
            $this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
            $this->jobtitle->ViewCustomAttributes = "";

            // decision_maker
            $this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
            $this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
            $this->decision_maker->ViewCustomAttributes = "";

            // sum_time
            $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
            $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
            $this->sum_time->ViewCustomAttributes = "";

            // phone_extra
            $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
            $this->phone_extra->ViewCustomAttributes = "";

            // mobile_extra
            $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
            $this->mobile_extra->ViewCustomAttributes = "";

            // approvals
            $this->approvals->ViewValue = $this->approvals->CurrentValue;
            $this->approvals->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // contactid
            $this->contactid->LinkCustomAttributes = "";
            $this->contactid->HrefValue = "";
            $this->contactid->TooltipValue = "";

            // contact_no
            $this->contact_no->LinkCustomAttributes = "";
            $this->contact_no->HrefValue = "";
            $this->contact_no->TooltipValue = "";

            // parentid
            $this->parentid->LinkCustomAttributes = "";
            $this->parentid->HrefValue = "";
            $this->parentid->TooltipValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";
            $this->salutation->TooltipValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";
            $this->firstname->TooltipValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";
            $this->lastname->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";
            $this->phone->TooltipValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";
            $this->mobile->TooltipValue = "";

            // reportsto
            $this->reportsto->LinkCustomAttributes = "";
            $this->reportsto->HrefValue = "";
            $this->reportsto->TooltipValue = "";

            // training
            $this->training->LinkCustomAttributes = "";
            $this->training->HrefValue = "";
            $this->training->TooltipValue = "";

            // usertype
            $this->usertype->LinkCustomAttributes = "";
            $this->usertype->HrefValue = "";
            $this->usertype->TooltipValue = "";

            // contacttype
            $this->contacttype->LinkCustomAttributes = "";
            $this->contacttype->HrefValue = "";
            $this->contacttype->TooltipValue = "";

            // otheremail
            $this->otheremail->LinkCustomAttributes = "";
            $this->otheremail->HrefValue = "";
            $this->otheremail->TooltipValue = "";

            // donotcall
            $this->donotcall->LinkCustomAttributes = "";
            $this->donotcall->HrefValue = "";
            $this->donotcall->TooltipValue = "";

            // emailoptout
            $this->emailoptout->LinkCustomAttributes = "";
            $this->emailoptout->HrefValue = "";
            $this->emailoptout->TooltipValue = "";

            // imagename
            $this->imagename->LinkCustomAttributes = "";
            $this->imagename->HrefValue = "";
            $this->imagename->TooltipValue = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->LinkCustomAttributes = "";
            $this->isconvertedfromlead->HrefValue = "";
            $this->isconvertedfromlead->TooltipValue = "";

            // verification
            $this->verification->LinkCustomAttributes = "";
            $this->verification->HrefValue = "";
            $this->verification->TooltipValue = "";

            // secondary_email
            $this->secondary_email->LinkCustomAttributes = "";
            $this->secondary_email->HrefValue = "";
            $this->secondary_email->TooltipValue = "";

            // notifilanguage
            $this->notifilanguage->LinkCustomAttributes = "";
            $this->notifilanguage->HrefValue = "";
            $this->notifilanguage->TooltipValue = "";

            // contactstatus
            $this->contactstatus->LinkCustomAttributes = "";
            $this->contactstatus->HrefValue = "";
            $this->contactstatus->TooltipValue = "";

            // dav_status
            $this->dav_status->LinkCustomAttributes = "";
            $this->dav_status->HrefValue = "";
            $this->dav_status->TooltipValue = "";

            // jobtitle
            $this->jobtitle->LinkCustomAttributes = "";
            $this->jobtitle->HrefValue = "";
            $this->jobtitle->TooltipValue = "";

            // decision_maker
            $this->decision_maker->LinkCustomAttributes = "";
            $this->decision_maker->HrefValue = "";
            $this->decision_maker->TooltipValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";
            $this->sum_time->TooltipValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";
            $this->phone_extra->TooltipValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";
            $this->mobile_extra->TooltipValue = "";

            // approvals
            $this->approvals->LinkCustomAttributes = "";
            $this->approvals->HrefValue = "";
            $this->approvals->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // contactid
            $this->contactid->EditAttrs["class"] = "form-control";
            $this->contactid->EditCustomAttributes = "";
            $this->contactid->EditValue = HtmlEncode($this->contactid->CurrentValue);
            $this->contactid->PlaceHolder = RemoveHtml($this->contactid->caption());

            // contact_no
            $this->contact_no->EditAttrs["class"] = "form-control";
            $this->contact_no->EditCustomAttributes = "";
            if (!$this->contact_no->Raw) {
                $this->contact_no->CurrentValue = HtmlDecode($this->contact_no->CurrentValue);
            }
            $this->contact_no->EditValue = HtmlEncode($this->contact_no->CurrentValue);
            $this->contact_no->PlaceHolder = RemoveHtml($this->contact_no->caption());

            // parentid
            $this->parentid->EditAttrs["class"] = "form-control";
            $this->parentid->EditCustomAttributes = "";
            $this->parentid->EditValue = HtmlEncode($this->parentid->CurrentValue);
            $this->parentid->PlaceHolder = RemoveHtml($this->parentid->caption());

            // salutation
            $this->salutation->EditAttrs["class"] = "form-control";
            $this->salutation->EditCustomAttributes = "";
            if (!$this->salutation->Raw) {
                $this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
            }
            $this->salutation->EditValue = HtmlEncode($this->salutation->CurrentValue);
            $this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

            // firstname
            $this->firstname->EditAttrs["class"] = "form-control";
            $this->firstname->EditCustomAttributes = "";
            if (!$this->firstname->Raw) {
                $this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
            }
            $this->firstname->EditValue = HtmlEncode($this->firstname->CurrentValue);
            $this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

            // lastname
            $this->lastname->EditAttrs["class"] = "form-control";
            $this->lastname->EditCustomAttributes = "";
            if (!$this->lastname->Raw) {
                $this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
            }
            $this->lastname->EditValue = HtmlEncode($this->lastname->CurrentValue);
            $this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

            // email
            $this->_email->EditAttrs["class"] = "form-control";
            $this->_email->EditCustomAttributes = "";
            if (!$this->_email->Raw) {
                $this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
            }
            $this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
            $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

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

            // reportsto
            $this->reportsto->EditAttrs["class"] = "form-control";
            $this->reportsto->EditCustomAttributes = "";
            $this->reportsto->EditValue = HtmlEncode($this->reportsto->CurrentValue);
            $this->reportsto->PlaceHolder = RemoveHtml($this->reportsto->caption());

            // training
            $this->training->EditAttrs["class"] = "form-control";
            $this->training->EditCustomAttributes = "";
            if (!$this->training->Raw) {
                $this->training->CurrentValue = HtmlDecode($this->training->CurrentValue);
            }
            $this->training->EditValue = HtmlEncode($this->training->CurrentValue);
            $this->training->PlaceHolder = RemoveHtml($this->training->caption());

            // usertype
            $this->usertype->EditAttrs["class"] = "form-control";
            $this->usertype->EditCustomAttributes = "";
            if (!$this->usertype->Raw) {
                $this->usertype->CurrentValue = HtmlDecode($this->usertype->CurrentValue);
            }
            $this->usertype->EditValue = HtmlEncode($this->usertype->CurrentValue);
            $this->usertype->PlaceHolder = RemoveHtml($this->usertype->caption());

            // contacttype
            $this->contacttype->EditAttrs["class"] = "form-control";
            $this->contacttype->EditCustomAttributes = "";
            if (!$this->contacttype->Raw) {
                $this->contacttype->CurrentValue = HtmlDecode($this->contacttype->CurrentValue);
            }
            $this->contacttype->EditValue = HtmlEncode($this->contacttype->CurrentValue);
            $this->contacttype->PlaceHolder = RemoveHtml($this->contacttype->caption());

            // otheremail
            $this->otheremail->EditAttrs["class"] = "form-control";
            $this->otheremail->EditCustomAttributes = "";
            if (!$this->otheremail->Raw) {
                $this->otheremail->CurrentValue = HtmlDecode($this->otheremail->CurrentValue);
            }
            $this->otheremail->EditValue = HtmlEncode($this->otheremail->CurrentValue);
            $this->otheremail->PlaceHolder = RemoveHtml($this->otheremail->caption());

            // donotcall
            $this->donotcall->EditAttrs["class"] = "form-control";
            $this->donotcall->EditCustomAttributes = "";
            $this->donotcall->EditValue = HtmlEncode($this->donotcall->CurrentValue);
            $this->donotcall->PlaceHolder = RemoveHtml($this->donotcall->caption());

            // emailoptout
            $this->emailoptout->EditAttrs["class"] = "form-control";
            $this->emailoptout->EditCustomAttributes = "";
            $this->emailoptout->EditValue = HtmlEncode($this->emailoptout->CurrentValue);
            $this->emailoptout->PlaceHolder = RemoveHtml($this->emailoptout->caption());

            // imagename
            $this->imagename->EditAttrs["class"] = "form-control";
            $this->imagename->EditCustomAttributes = "";
            $this->imagename->EditValue = HtmlEncode($this->imagename->CurrentValue);
            $this->imagename->PlaceHolder = RemoveHtml($this->imagename->caption());

            // isconvertedfromlead
            $this->isconvertedfromlead->EditAttrs["class"] = "form-control";
            $this->isconvertedfromlead->EditCustomAttributes = "";
            $this->isconvertedfromlead->EditValue = HtmlEncode($this->isconvertedfromlead->CurrentValue);
            $this->isconvertedfromlead->PlaceHolder = RemoveHtml($this->isconvertedfromlead->caption());

            // verification
            $this->verification->EditAttrs["class"] = "form-control";
            $this->verification->EditCustomAttributes = "";
            $this->verification->EditValue = HtmlEncode($this->verification->CurrentValue);
            $this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

            // secondary_email
            $this->secondary_email->EditAttrs["class"] = "form-control";
            $this->secondary_email->EditCustomAttributes = "";
            if (!$this->secondary_email->Raw) {
                $this->secondary_email->CurrentValue = HtmlDecode($this->secondary_email->CurrentValue);
            }
            $this->secondary_email->EditValue = HtmlEncode($this->secondary_email->CurrentValue);
            $this->secondary_email->PlaceHolder = RemoveHtml($this->secondary_email->caption());

            // notifilanguage
            $this->notifilanguage->EditAttrs["class"] = "form-control";
            $this->notifilanguage->EditCustomAttributes = "";
            if (!$this->notifilanguage->Raw) {
                $this->notifilanguage->CurrentValue = HtmlDecode($this->notifilanguage->CurrentValue);
            }
            $this->notifilanguage->EditValue = HtmlEncode($this->notifilanguage->CurrentValue);
            $this->notifilanguage->PlaceHolder = RemoveHtml($this->notifilanguage->caption());

            // contactstatus
            $this->contactstatus->EditAttrs["class"] = "form-control";
            $this->contactstatus->EditCustomAttributes = "";
            if (!$this->contactstatus->Raw) {
                $this->contactstatus->CurrentValue = HtmlDecode($this->contactstatus->CurrentValue);
            }
            $this->contactstatus->EditValue = HtmlEncode($this->contactstatus->CurrentValue);
            $this->contactstatus->PlaceHolder = RemoveHtml($this->contactstatus->caption());

            // dav_status
            $this->dav_status->EditAttrs["class"] = "form-control";
            $this->dav_status->EditCustomAttributes = "";
            $this->dav_status->EditValue = HtmlEncode($this->dav_status->CurrentValue);
            $this->dav_status->PlaceHolder = RemoveHtml($this->dav_status->caption());

            // jobtitle
            $this->jobtitle->EditAttrs["class"] = "form-control";
            $this->jobtitle->EditCustomAttributes = "";
            if (!$this->jobtitle->Raw) {
                $this->jobtitle->CurrentValue = HtmlDecode($this->jobtitle->CurrentValue);
            }
            $this->jobtitle->EditValue = HtmlEncode($this->jobtitle->CurrentValue);
            $this->jobtitle->PlaceHolder = RemoveHtml($this->jobtitle->caption());

            // decision_maker
            $this->decision_maker->EditAttrs["class"] = "form-control";
            $this->decision_maker->EditCustomAttributes = "";
            $this->decision_maker->EditValue = HtmlEncode($this->decision_maker->CurrentValue);
            $this->decision_maker->PlaceHolder = RemoveHtml($this->decision_maker->caption());

            // sum_time
            $this->sum_time->EditAttrs["class"] = "form-control";
            $this->sum_time->EditCustomAttributes = "";
            $this->sum_time->EditValue = HtmlEncode($this->sum_time->CurrentValue);
            $this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
            if (strval($this->sum_time->EditValue) != "" && is_numeric($this->sum_time->EditValue)) {
                $this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);
            }

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

            // approvals
            $this->approvals->EditAttrs["class"] = "form-control";
            $this->approvals->EditCustomAttributes = "";
            $this->approvals->EditValue = HtmlEncode($this->approvals->CurrentValue);
            $this->approvals->PlaceHolder = RemoveHtml($this->approvals->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // Edit refer script

            // contactid
            $this->contactid->LinkCustomAttributes = "";
            $this->contactid->HrefValue = "";

            // contact_no
            $this->contact_no->LinkCustomAttributes = "";
            $this->contact_no->HrefValue = "";

            // parentid
            $this->parentid->LinkCustomAttributes = "";
            $this->parentid->HrefValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";

            // reportsto
            $this->reportsto->LinkCustomAttributes = "";
            $this->reportsto->HrefValue = "";

            // training
            $this->training->LinkCustomAttributes = "";
            $this->training->HrefValue = "";

            // usertype
            $this->usertype->LinkCustomAttributes = "";
            $this->usertype->HrefValue = "";

            // contacttype
            $this->contacttype->LinkCustomAttributes = "";
            $this->contacttype->HrefValue = "";

            // otheremail
            $this->otheremail->LinkCustomAttributes = "";
            $this->otheremail->HrefValue = "";

            // donotcall
            $this->donotcall->LinkCustomAttributes = "";
            $this->donotcall->HrefValue = "";

            // emailoptout
            $this->emailoptout->LinkCustomAttributes = "";
            $this->emailoptout->HrefValue = "";

            // imagename
            $this->imagename->LinkCustomAttributes = "";
            $this->imagename->HrefValue = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->LinkCustomAttributes = "";
            $this->isconvertedfromlead->HrefValue = "";

            // verification
            $this->verification->LinkCustomAttributes = "";
            $this->verification->HrefValue = "";

            // secondary_email
            $this->secondary_email->LinkCustomAttributes = "";
            $this->secondary_email->HrefValue = "";

            // notifilanguage
            $this->notifilanguage->LinkCustomAttributes = "";
            $this->notifilanguage->HrefValue = "";

            // contactstatus
            $this->contactstatus->LinkCustomAttributes = "";
            $this->contactstatus->HrefValue = "";

            // dav_status
            $this->dav_status->LinkCustomAttributes = "";
            $this->dav_status->HrefValue = "";

            // jobtitle
            $this->jobtitle->LinkCustomAttributes = "";
            $this->jobtitle->HrefValue = "";

            // decision_maker
            $this->decision_maker->LinkCustomAttributes = "";
            $this->decision_maker->HrefValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";

            // approvals
            $this->approvals->LinkCustomAttributes = "";
            $this->approvals->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
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
        if ($this->contactid->Required) {
            if (!$this->contactid->IsDetailKey && EmptyValue($this->contactid->FormValue)) {
                $this->contactid->addErrorMessage(str_replace("%s", $this->contactid->caption(), $this->contactid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->contactid->FormValue)) {
            $this->contactid->addErrorMessage($this->contactid->getErrorMessage(false));
        }
        if ($this->contact_no->Required) {
            if (!$this->contact_no->IsDetailKey && EmptyValue($this->contact_no->FormValue)) {
                $this->contact_no->addErrorMessage(str_replace("%s", $this->contact_no->caption(), $this->contact_no->RequiredErrorMessage));
            }
        }
        if ($this->parentid->Required) {
            if (!$this->parentid->IsDetailKey && EmptyValue($this->parentid->FormValue)) {
                $this->parentid->addErrorMessage(str_replace("%s", $this->parentid->caption(), $this->parentid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->parentid->FormValue)) {
            $this->parentid->addErrorMessage($this->parentid->getErrorMessage(false));
        }
        if ($this->salutation->Required) {
            if (!$this->salutation->IsDetailKey && EmptyValue($this->salutation->FormValue)) {
                $this->salutation->addErrorMessage(str_replace("%s", $this->salutation->caption(), $this->salutation->RequiredErrorMessage));
            }
        }
        if ($this->firstname->Required) {
            if (!$this->firstname->IsDetailKey && EmptyValue($this->firstname->FormValue)) {
                $this->firstname->addErrorMessage(str_replace("%s", $this->firstname->caption(), $this->firstname->RequiredErrorMessage));
            }
        }
        if ($this->lastname->Required) {
            if (!$this->lastname->IsDetailKey && EmptyValue($this->lastname->FormValue)) {
                $this->lastname->addErrorMessage(str_replace("%s", $this->lastname->caption(), $this->lastname->RequiredErrorMessage));
            }
        }
        if ($this->_email->Required) {
            if (!$this->_email->IsDetailKey && EmptyValue($this->_email->FormValue)) {
                $this->_email->addErrorMessage(str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
            }
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
        if ($this->reportsto->Required) {
            if (!$this->reportsto->IsDetailKey && EmptyValue($this->reportsto->FormValue)) {
                $this->reportsto->addErrorMessage(str_replace("%s", $this->reportsto->caption(), $this->reportsto->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->reportsto->FormValue)) {
            $this->reportsto->addErrorMessage($this->reportsto->getErrorMessage(false));
        }
        if ($this->training->Required) {
            if (!$this->training->IsDetailKey && EmptyValue($this->training->FormValue)) {
                $this->training->addErrorMessage(str_replace("%s", $this->training->caption(), $this->training->RequiredErrorMessage));
            }
        }
        if ($this->usertype->Required) {
            if (!$this->usertype->IsDetailKey && EmptyValue($this->usertype->FormValue)) {
                $this->usertype->addErrorMessage(str_replace("%s", $this->usertype->caption(), $this->usertype->RequiredErrorMessage));
            }
        }
        if ($this->contacttype->Required) {
            if (!$this->contacttype->IsDetailKey && EmptyValue($this->contacttype->FormValue)) {
                $this->contacttype->addErrorMessage(str_replace("%s", $this->contacttype->caption(), $this->contacttype->RequiredErrorMessage));
            }
        }
        if ($this->otheremail->Required) {
            if (!$this->otheremail->IsDetailKey && EmptyValue($this->otheremail->FormValue)) {
                $this->otheremail->addErrorMessage(str_replace("%s", $this->otheremail->caption(), $this->otheremail->RequiredErrorMessage));
            }
        }
        if ($this->donotcall->Required) {
            if (!$this->donotcall->IsDetailKey && EmptyValue($this->donotcall->FormValue)) {
                $this->donotcall->addErrorMessage(str_replace("%s", $this->donotcall->caption(), $this->donotcall->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->donotcall->FormValue)) {
            $this->donotcall->addErrorMessage($this->donotcall->getErrorMessage(false));
        }
        if ($this->emailoptout->Required) {
            if (!$this->emailoptout->IsDetailKey && EmptyValue($this->emailoptout->FormValue)) {
                $this->emailoptout->addErrorMessage(str_replace("%s", $this->emailoptout->caption(), $this->emailoptout->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->emailoptout->FormValue)) {
            $this->emailoptout->addErrorMessage($this->emailoptout->getErrorMessage(false));
        }
        if ($this->imagename->Required) {
            if (!$this->imagename->IsDetailKey && EmptyValue($this->imagename->FormValue)) {
                $this->imagename->addErrorMessage(str_replace("%s", $this->imagename->caption(), $this->imagename->RequiredErrorMessage));
            }
        }
        if ($this->isconvertedfromlead->Required) {
            if (!$this->isconvertedfromlead->IsDetailKey && EmptyValue($this->isconvertedfromlead->FormValue)) {
                $this->isconvertedfromlead->addErrorMessage(str_replace("%s", $this->isconvertedfromlead->caption(), $this->isconvertedfromlead->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->isconvertedfromlead->FormValue)) {
            $this->isconvertedfromlead->addErrorMessage($this->isconvertedfromlead->getErrorMessage(false));
        }
        if ($this->verification->Required) {
            if (!$this->verification->IsDetailKey && EmptyValue($this->verification->FormValue)) {
                $this->verification->addErrorMessage(str_replace("%s", $this->verification->caption(), $this->verification->RequiredErrorMessage));
            }
        }
        if ($this->secondary_email->Required) {
            if (!$this->secondary_email->IsDetailKey && EmptyValue($this->secondary_email->FormValue)) {
                $this->secondary_email->addErrorMessage(str_replace("%s", $this->secondary_email->caption(), $this->secondary_email->RequiredErrorMessage));
            }
        }
        if ($this->notifilanguage->Required) {
            if (!$this->notifilanguage->IsDetailKey && EmptyValue($this->notifilanguage->FormValue)) {
                $this->notifilanguage->addErrorMessage(str_replace("%s", $this->notifilanguage->caption(), $this->notifilanguage->RequiredErrorMessage));
            }
        }
        if ($this->contactstatus->Required) {
            if (!$this->contactstatus->IsDetailKey && EmptyValue($this->contactstatus->FormValue)) {
                $this->contactstatus->addErrorMessage(str_replace("%s", $this->contactstatus->caption(), $this->contactstatus->RequiredErrorMessage));
            }
        }
        if ($this->dav_status->Required) {
            if (!$this->dav_status->IsDetailKey && EmptyValue($this->dav_status->FormValue)) {
                $this->dav_status->addErrorMessage(str_replace("%s", $this->dav_status->caption(), $this->dav_status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->dav_status->FormValue)) {
            $this->dav_status->addErrorMessage($this->dav_status->getErrorMessage(false));
        }
        if ($this->jobtitle->Required) {
            if (!$this->jobtitle->IsDetailKey && EmptyValue($this->jobtitle->FormValue)) {
                $this->jobtitle->addErrorMessage(str_replace("%s", $this->jobtitle->caption(), $this->jobtitle->RequiredErrorMessage));
            }
        }
        if ($this->decision_maker->Required) {
            if (!$this->decision_maker->IsDetailKey && EmptyValue($this->decision_maker->FormValue)) {
                $this->decision_maker->addErrorMessage(str_replace("%s", $this->decision_maker->caption(), $this->decision_maker->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->decision_maker->FormValue)) {
            $this->decision_maker->addErrorMessage($this->decision_maker->getErrorMessage(false));
        }
        if ($this->sum_time->Required) {
            if (!$this->sum_time->IsDetailKey && EmptyValue($this->sum_time->FormValue)) {
                $this->sum_time->addErrorMessage(str_replace("%s", $this->sum_time->caption(), $this->sum_time->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->sum_time->FormValue)) {
            $this->sum_time->addErrorMessage($this->sum_time->getErrorMessage(false));
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
        if ($this->approvals->Required) {
            if (!$this->approvals->IsDetailKey && EmptyValue($this->approvals->FormValue)) {
                $this->approvals->addErrorMessage(str_replace("%s", $this->approvals->caption(), $this->approvals->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
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

            // contactid
            $this->contactid->setDbValueDef($rsnew, $this->contactid->CurrentValue, 0, $this->contactid->ReadOnly);

            // contact_no
            $this->contact_no->setDbValueDef($rsnew, $this->contact_no->CurrentValue, "", $this->contact_no->ReadOnly);

            // parentid
            $this->parentid->setDbValueDef($rsnew, $this->parentid->CurrentValue, null, $this->parentid->ReadOnly);

            // salutation
            $this->salutation->setDbValueDef($rsnew, $this->salutation->CurrentValue, null, $this->salutation->ReadOnly);

            // firstname
            $this->firstname->setDbValueDef($rsnew, $this->firstname->CurrentValue, null, $this->firstname->ReadOnly);

            // lastname
            $this->lastname->setDbValueDef($rsnew, $this->lastname->CurrentValue, "", $this->lastname->ReadOnly);

            // email
            $this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, null, $this->_email->ReadOnly);

            // phone
            $this->phone->setDbValueDef($rsnew, $this->phone->CurrentValue, null, $this->phone->ReadOnly);

            // mobile
            $this->mobile->setDbValueDef($rsnew, $this->mobile->CurrentValue, null, $this->mobile->ReadOnly);

            // reportsto
            $this->reportsto->setDbValueDef($rsnew, $this->reportsto->CurrentValue, null, $this->reportsto->ReadOnly);

            // training
            $this->training->setDbValueDef($rsnew, $this->training->CurrentValue, null, $this->training->ReadOnly);

            // usertype
            $this->usertype->setDbValueDef($rsnew, $this->usertype->CurrentValue, null, $this->usertype->ReadOnly);

            // contacttype
            $this->contacttype->setDbValueDef($rsnew, $this->contacttype->CurrentValue, null, $this->contacttype->ReadOnly);

            // otheremail
            $this->otheremail->setDbValueDef($rsnew, $this->otheremail->CurrentValue, null, $this->otheremail->ReadOnly);

            // donotcall
            $this->donotcall->setDbValueDef($rsnew, $this->donotcall->CurrentValue, null, $this->donotcall->ReadOnly);

            // emailoptout
            $this->emailoptout->setDbValueDef($rsnew, $this->emailoptout->CurrentValue, null, $this->emailoptout->ReadOnly);

            // imagename
            $this->imagename->setDbValueDef($rsnew, $this->imagename->CurrentValue, null, $this->imagename->ReadOnly);

            // isconvertedfromlead
            $this->isconvertedfromlead->setDbValueDef($rsnew, $this->isconvertedfromlead->CurrentValue, null, $this->isconvertedfromlead->ReadOnly);

            // verification
            $this->verification->setDbValueDef($rsnew, $this->verification->CurrentValue, null, $this->verification->ReadOnly);

            // secondary_email
            $this->secondary_email->setDbValueDef($rsnew, $this->secondary_email->CurrentValue, null, $this->secondary_email->ReadOnly);

            // notifilanguage
            $this->notifilanguage->setDbValueDef($rsnew, $this->notifilanguage->CurrentValue, null, $this->notifilanguage->ReadOnly);

            // contactstatus
            $this->contactstatus->setDbValueDef($rsnew, $this->contactstatus->CurrentValue, null, $this->contactstatus->ReadOnly);

            // dav_status
            $this->dav_status->setDbValueDef($rsnew, $this->dav_status->CurrentValue, null, $this->dav_status->ReadOnly);

            // jobtitle
            $this->jobtitle->setDbValueDef($rsnew, $this->jobtitle->CurrentValue, null, $this->jobtitle->ReadOnly);

            // decision_maker
            $this->decision_maker->setDbValueDef($rsnew, $this->decision_maker->CurrentValue, null, $this->decision_maker->ReadOnly);

            // sum_time
            $this->sum_time->setDbValueDef($rsnew, $this->sum_time->CurrentValue, null, $this->sum_time->ReadOnly);

            // phone_extra
            $this->phone_extra->setDbValueDef($rsnew, $this->phone_extra->CurrentValue, null, $this->phone_extra->ReadOnly);

            // mobile_extra
            $this->mobile_extra->setDbValueDef($rsnew, $this->mobile_extra->CurrentValue, null, $this->mobile_extra->ReadOnly);

            // approvals
            $this->approvals->setDbValueDef($rsnew, $this->approvals->CurrentValue, null, $this->approvals->ReadOnly);

            // gender
            $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, $this->gender->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("CrmContactdetailsList"), "", $this->TableVar, true);
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
