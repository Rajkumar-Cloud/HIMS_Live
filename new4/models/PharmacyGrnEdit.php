<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyGrnEdit extends PharmacyGrn
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_grn';

    // Page object name
    public $PageObjName = "PharmacyGrnEdit";

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

        // Table object (pharmacy_grn)
        if (!isset($GLOBALS["pharmacy_grn"]) || get_class($GLOBALS["pharmacy_grn"]) == PROJECT_NAMESPACE . "pharmacy_grn") {
            $GLOBALS["pharmacy_grn"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_grn');
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
                $doc = new $class(Container("pharmacy_grn"));
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
                    if ($pageName == "PharmacyGrnView") {
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
        $this->GRNNO->setVisibility();
        $this->DT->setVisibility();
        $this->YM->setVisibility();
        $this->PC->setVisibility();
        $this->Customercode->setVisibility();
        $this->Customername->setVisibility();
        $this->pharmacy_pocol->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->EEmail->setVisibility();
        $this->HospID->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->BILLNO->setVisibility();
        $this->BILLDT->setVisibility();
        $this->BRCODE->setVisibility();
        $this->PharmacyID->setVisibility();
        $this->BillTotalValue->setVisibility();
        $this->GRNTotalValue->setVisibility();
        $this->BillDiscount->setVisibility();
        $this->BillUpload->setVisibility();
        $this->TransPort->setVisibility();
        $this->AnyOther->setVisibility();
        $this->Remarks->setVisibility();
        $this->GrnValue->setVisibility();
        $this->Pid->setVisibility();
        $this->PaymentNo->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->PaidAmount->setVisibility();
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
        $this->setupLookupOptions($this->PC);
        $this->setupLookupOptions($this->BRCODE);

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

            // Set up master detail parameters
            $this->setupMasterParms();

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
                    $this->terminate("PharmacyGrnList"); // No matching record, return to list
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
                if (GetPageName($returnUrl) == "PharmacyGrnList") {
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
        $this->BillUpload->Upload->Index = $CurrentForm->Index;
        $this->BillUpload->Upload->uploadFile();
        $this->BillUpload->CurrentValue = $this->BillUpload->Upload->FileName;
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

        // Check field name 'GRNNO' first before field var 'x_GRNNO'
        $val = $CurrentForm->hasValue("GRNNO") ? $CurrentForm->getValue("GRNNO") : $CurrentForm->getValue("x_GRNNO");
        if (!$this->GRNNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRNNO->Visible = false; // Disable update for API request
            } else {
                $this->GRNNO->setFormValue($val);
            }
        }

        // Check field name 'DT' first before field var 'x_DT'
        $val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
        if (!$this->DT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DT->Visible = false; // Disable update for API request
            } else {
                $this->DT->setFormValue($val);
            }
            $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
        }

        // Check field name 'YM' first before field var 'x_YM'
        $val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
        if (!$this->YM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->YM->Visible = false; // Disable update for API request
            } else {
                $this->YM->setFormValue($val);
            }
        }

        // Check field name 'PC' first before field var 'x_PC'
        $val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
        if (!$this->PC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PC->Visible = false; // Disable update for API request
            } else {
                $this->PC->setFormValue($val);
            }
        }

        // Check field name 'Customercode' first before field var 'x_Customercode'
        $val = $CurrentForm->hasValue("Customercode") ? $CurrentForm->getValue("Customercode") : $CurrentForm->getValue("x_Customercode");
        if (!$this->Customercode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customercode->Visible = false; // Disable update for API request
            } else {
                $this->Customercode->setFormValue($val);
            }
        }

        // Check field name 'Customername' first before field var 'x_Customername'
        $val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
        if (!$this->Customername->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customername->Visible = false; // Disable update for API request
            } else {
                $this->Customername->setFormValue($val);
            }
        }

        // Check field name 'pharmacy_pocol' first before field var 'x_pharmacy_pocol'
        $val = $CurrentForm->hasValue("pharmacy_pocol") ? $CurrentForm->getValue("pharmacy_pocol") : $CurrentForm->getValue("x_pharmacy_pocol");
        if (!$this->pharmacy_pocol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pharmacy_pocol->Visible = false; // Disable update for API request
            } else {
                $this->pharmacy_pocol->setFormValue($val);
            }
        }

        // Check field name 'Address1' first before field var 'x_Address1'
        $val = $CurrentForm->hasValue("Address1") ? $CurrentForm->getValue("Address1") : $CurrentForm->getValue("x_Address1");
        if (!$this->Address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address1->Visible = false; // Disable update for API request
            } else {
                $this->Address1->setFormValue($val);
            }
        }

        // Check field name 'Address2' first before field var 'x_Address2'
        $val = $CurrentForm->hasValue("Address2") ? $CurrentForm->getValue("Address2") : $CurrentForm->getValue("x_Address2");
        if (!$this->Address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address2->Visible = false; // Disable update for API request
            } else {
                $this->Address2->setFormValue($val);
            }
        }

        // Check field name 'Address3' first before field var 'x_Address3'
        $val = $CurrentForm->hasValue("Address3") ? $CurrentForm->getValue("Address3") : $CurrentForm->getValue("x_Address3");
        if (!$this->Address3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address3->Visible = false; // Disable update for API request
            } else {
                $this->Address3->setFormValue($val);
            }
        }

        // Check field name 'State' first before field var 'x_State'
        $val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
        if (!$this->State->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State->Visible = false; // Disable update for API request
            } else {
                $this->State->setFormValue($val);
            }
        }

        // Check field name 'Pincode' first before field var 'x_Pincode'
        $val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
        if (!$this->Pincode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pincode->Visible = false; // Disable update for API request
            } else {
                $this->Pincode->setFormValue($val);
            }
        }

        // Check field name 'Phone' first before field var 'x_Phone'
        $val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
        if (!$this->Phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Phone->Visible = false; // Disable update for API request
            } else {
                $this->Phone->setFormValue($val);
            }
        }

        // Check field name 'Fax' first before field var 'x_Fax'
        $val = $CurrentForm->hasValue("Fax") ? $CurrentForm->getValue("Fax") : $CurrentForm->getValue("x_Fax");
        if (!$this->Fax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Fax->Visible = false; // Disable update for API request
            } else {
                $this->Fax->setFormValue($val);
            }
        }

        // Check field name 'EEmail' first before field var 'x_EEmail'
        $val = $CurrentForm->hasValue("EEmail") ? $CurrentForm->getValue("EEmail") : $CurrentForm->getValue("x_EEmail");
        if (!$this->EEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EEmail->Visible = false; // Disable update for API request
            } else {
                $this->EEmail->setFormValue($val);
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

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        }

        // Check field name 'BILLNO' first before field var 'x_BILLNO'
        $val = $CurrentForm->hasValue("BILLNO") ? $CurrentForm->getValue("BILLNO") : $CurrentForm->getValue("x_BILLNO");
        if (!$this->BILLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLNO->Visible = false; // Disable update for API request
            } else {
                $this->BILLNO->setFormValue($val);
            }
        }

        // Check field name 'BILLDT' first before field var 'x_BILLDT'
        $val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
        if (!$this->BILLDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLDT->Visible = false; // Disable update for API request
            } else {
                $this->BILLDT->setFormValue($val);
            }
            $this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
        }

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }

        // Check field name 'PharmacyID' first before field var 'x_PharmacyID'
        $val = $CurrentForm->hasValue("PharmacyID") ? $CurrentForm->getValue("PharmacyID") : $CurrentForm->getValue("x_PharmacyID");
        if (!$this->PharmacyID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PharmacyID->Visible = false; // Disable update for API request
            } else {
                $this->PharmacyID->setFormValue($val);
            }
        }

        // Check field name 'BillTotalValue' first before field var 'x_BillTotalValue'
        $val = $CurrentForm->hasValue("BillTotalValue") ? $CurrentForm->getValue("BillTotalValue") : $CurrentForm->getValue("x_BillTotalValue");
        if (!$this->BillTotalValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillTotalValue->Visible = false; // Disable update for API request
            } else {
                $this->BillTotalValue->setFormValue($val);
            }
        }

        // Check field name 'GRNTotalValue' first before field var 'x_GRNTotalValue'
        $val = $CurrentForm->hasValue("GRNTotalValue") ? $CurrentForm->getValue("GRNTotalValue") : $CurrentForm->getValue("x_GRNTotalValue");
        if (!$this->GRNTotalValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRNTotalValue->Visible = false; // Disable update for API request
            } else {
                $this->GRNTotalValue->setFormValue($val);
            }
        }

        // Check field name 'BillDiscount' first before field var 'x_BillDiscount'
        $val = $CurrentForm->hasValue("BillDiscount") ? $CurrentForm->getValue("BillDiscount") : $CurrentForm->getValue("x_BillDiscount");
        if (!$this->BillDiscount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillDiscount->Visible = false; // Disable update for API request
            } else {
                $this->BillDiscount->setFormValue($val);
            }
        }

        // Check field name 'TransPort' first before field var 'x_TransPort'
        $val = $CurrentForm->hasValue("TransPort") ? $CurrentForm->getValue("TransPort") : $CurrentForm->getValue("x_TransPort");
        if (!$this->TransPort->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransPort->Visible = false; // Disable update for API request
            } else {
                $this->TransPort->setFormValue($val);
            }
        }

        // Check field name 'AnyOther' first before field var 'x_AnyOther'
        $val = $CurrentForm->hasValue("AnyOther") ? $CurrentForm->getValue("AnyOther") : $CurrentForm->getValue("x_AnyOther");
        if (!$this->AnyOther->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnyOther->Visible = false; // Disable update for API request
            } else {
                $this->AnyOther->setFormValue($val);
            }
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }

        // Check field name 'GrnValue' first before field var 'x_GrnValue'
        $val = $CurrentForm->hasValue("GrnValue") ? $CurrentForm->getValue("GrnValue") : $CurrentForm->getValue("x_GrnValue");
        if (!$this->GrnValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GrnValue->Visible = false; // Disable update for API request
            } else {
                $this->GrnValue->setFormValue($val);
            }
        }

        // Check field name 'Pid' first before field var 'x_Pid'
        $val = $CurrentForm->hasValue("Pid") ? $CurrentForm->getValue("Pid") : $CurrentForm->getValue("x_Pid");
        if (!$this->Pid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pid->Visible = false; // Disable update for API request
            } else {
                $this->Pid->setFormValue($val);
            }
        }

        // Check field name 'PaymentNo' first before field var 'x_PaymentNo'
        $val = $CurrentForm->hasValue("PaymentNo") ? $CurrentForm->getValue("PaymentNo") : $CurrentForm->getValue("x_PaymentNo");
        if (!$this->PaymentNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentNo->Visible = false; // Disable update for API request
            } else {
                $this->PaymentNo->setFormValue($val);
            }
        }

        // Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
        $val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
        if (!$this->PaymentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentStatus->Visible = false; // Disable update for API request
            } else {
                $this->PaymentStatus->setFormValue($val);
            }
        }

        // Check field name 'PaidAmount' first before field var 'x_PaidAmount'
        $val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
        if (!$this->PaidAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaidAmount->Visible = false; // Disable update for API request
            } else {
                $this->PaidAmount->setFormValue($val);
            }
        }
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->GRNNO->CurrentValue = $this->GRNNO->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
        $this->YM->CurrentValue = $this->YM->FormValue;
        $this->PC->CurrentValue = $this->PC->FormValue;
        $this->Customercode->CurrentValue = $this->Customercode->FormValue;
        $this->Customername->CurrentValue = $this->Customername->FormValue;
        $this->pharmacy_pocol->CurrentValue = $this->pharmacy_pocol->FormValue;
        $this->Address1->CurrentValue = $this->Address1->FormValue;
        $this->Address2->CurrentValue = $this->Address2->FormValue;
        $this->Address3->CurrentValue = $this->Address3->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Pincode->CurrentValue = $this->Pincode->FormValue;
        $this->Phone->CurrentValue = $this->Phone->FormValue;
        $this->Fax->CurrentValue = $this->Fax->FormValue;
        $this->EEmail->CurrentValue = $this->EEmail->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
        $this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
        $this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->PharmacyID->CurrentValue = $this->PharmacyID->FormValue;
        $this->BillTotalValue->CurrentValue = $this->BillTotalValue->FormValue;
        $this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->FormValue;
        $this->BillDiscount->CurrentValue = $this->BillDiscount->FormValue;
        $this->TransPort->CurrentValue = $this->TransPort->FormValue;
        $this->AnyOther->CurrentValue = $this->AnyOther->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->GrnValue->CurrentValue = $this->GrnValue->FormValue;
        $this->Pid->CurrentValue = $this->Pid->FormValue;
        $this->PaymentNo->CurrentValue = $this->PaymentNo->FormValue;
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
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
        $this->GRNNO->setDbValue($row['GRNNO']);
        $this->DT->setDbValue($row['DT']);
        $this->YM->setDbValue($row['YM']);
        $this->PC->setDbValue($row['PC']);
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->EEmail->setDbValue($row['EEmail']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PharmacyID->setDbValue($row['PharmacyID']);
        $this->BillTotalValue->setDbValue($row['BillTotalValue']);
        $this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
        $this->BillDiscount->setDbValue($row['BillDiscount']);
        $this->BillUpload->Upload->DbValue = $row['BillUpload'];
        $this->BillUpload->setDbValue($this->BillUpload->Upload->DbValue);
        $this->TransPort->setDbValue($row['TransPort']);
        $this->AnyOther->setDbValue($row['AnyOther']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->GrnValue->setDbValue($row['GrnValue']);
        $this->Pid->setDbValue($row['Pid']);
        $this->PaymentNo->setDbValue($row['PaymentNo']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['GRNNO'] = null;
        $row['DT'] = null;
        $row['YM'] = null;
        $row['PC'] = null;
        $row['Customercode'] = null;
        $row['Customername'] = null;
        $row['pharmacy_pocol'] = null;
        $row['Address1'] = null;
        $row['Address2'] = null;
        $row['Address3'] = null;
        $row['State'] = null;
        $row['Pincode'] = null;
        $row['Phone'] = null;
        $row['Fax'] = null;
        $row['EEmail'] = null;
        $row['HospID'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['BILLNO'] = null;
        $row['BILLDT'] = null;
        $row['BRCODE'] = null;
        $row['PharmacyID'] = null;
        $row['BillTotalValue'] = null;
        $row['GRNTotalValue'] = null;
        $row['BillDiscount'] = null;
        $row['BillUpload'] = null;
        $row['TransPort'] = null;
        $row['AnyOther'] = null;
        $row['Remarks'] = null;
        $row['GrnValue'] = null;
        $row['Pid'] = null;
        $row['PaymentNo'] = null;
        $row['PaymentStatus'] = null;
        $row['PaidAmount'] = null;
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
        if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue))) {
            $this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue))) {
            $this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue))) {
            $this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TransPort->FormValue == $this->TransPort->CurrentValue && is_numeric(ConvertToFloatString($this->TransPort->CurrentValue))) {
            $this->TransPort->CurrentValue = ConvertToFloatString($this->TransPort->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->AnyOther->FormValue == $this->AnyOther->CurrentValue && is_numeric(ConvertToFloatString($this->AnyOther->CurrentValue))) {
            $this->AnyOther->CurrentValue = ConvertToFloatString($this->AnyOther->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GrnValue->FormValue == $this->GrnValue->CurrentValue && is_numeric(ConvertToFloatString($this->GrnValue->CurrentValue))) {
            $this->GrnValue->CurrentValue = ConvertToFloatString($this->GrnValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PaidAmount->FormValue == $this->PaidAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PaidAmount->CurrentValue))) {
            $this->PaidAmount->CurrentValue = ConvertToFloatString($this->PaidAmount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // GRNNO

        // DT

        // YM

        // PC

        // Customercode

        // Customername

        // pharmacy_pocol

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // EEmail

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BILLNO

        // BILLDT

        // BRCODE

        // PharmacyID

        // BillTotalValue

        // GRNTotalValue

        // BillDiscount

        // BillUpload

        // TransPort

        // AnyOther

        // Remarks

        // GrnValue

        // Pid

        // PaymentNo

        // PaymentStatus

        // PaidAmount
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
            $this->GRNNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 7);
            $this->DT->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // PC
            $curVal = trim(strval($this->PC->CurrentValue));
            if ($curVal != "") {
                $this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
                if ($this->PC->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PC->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PC->Lookup->renderViewRow($rswrk[0]);
                        $this->PC->ViewValue = $this->PC->displayValue($arwrk);
                    } else {
                        $this->PC->ViewValue = $this->PC->CurrentValue;
                    }
                }
            } else {
                $this->PC->ViewValue = null;
            }
            $this->PC->ViewCustomAttributes = "";

            // Customercode
            $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
            $this->Customercode->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
            $this->pharmacy_pocol->ViewCustomAttributes = "";

            // Address1
            $this->Address1->ViewValue = $this->Address1->CurrentValue;
            $this->Address1->ViewCustomAttributes = "";

            // Address2
            $this->Address2->ViewValue = $this->Address2->CurrentValue;
            $this->Address2->ViewCustomAttributes = "";

            // Address3
            $this->Address3->ViewValue = $this->Address3->CurrentValue;
            $this->Address3->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // EEmail
            $this->EEmail->ViewValue = $this->EEmail->CurrentValue;
            $this->EEmail->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
            $this->BILLDT->ViewCustomAttributes = "";

            // BRCODE
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`id`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
                    }
                }
            } else {
                $this->BRCODE->ViewValue = null;
            }
            $this->BRCODE->ViewCustomAttributes = "";

            // PharmacyID
            $this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
            $this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
            $this->PharmacyID->ViewCustomAttributes = "";

            // BillTotalValue
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";

            // GRNTotalValue
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";

            // BillDiscount
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";

            // BillUpload
            if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
                $this->BillUpload->ImageAlt = $this->BillUpload->alt();
                $this->BillUpload->ViewValue = $this->BillUpload->Upload->DbValue;
            } else {
                $this->BillUpload->ViewValue = "";
            }
            $this->BillUpload->ViewCustomAttributes = "";

            // TransPort
            $this->TransPort->ViewValue = $this->TransPort->CurrentValue;
            $this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
            $this->TransPort->ViewCustomAttributes = "";

            // AnyOther
            $this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
            $this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
            $this->AnyOther->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // GrnValue
            $this->GrnValue->ViewValue = $this->GrnValue->CurrentValue;
            $this->GrnValue->ViewValue = FormatNumber($this->GrnValue->ViewValue, 2, -2, -2, -2);
            $this->GrnValue->ViewCustomAttributes = "";

            // Pid
            $this->Pid->ViewValue = $this->Pid->CurrentValue;
            $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
            $this->Pid->ViewCustomAttributes = "";

            // PaymentNo
            $this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
            $this->PaymentNo->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewValue = FormatNumber($this->PaidAmount->ViewValue, 2, -2, -2, -2);
            $this->PaidAmount->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";
            $this->GRNNO->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";
            $this->YM->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";
            $this->Customercode->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->LinkCustomAttributes = "";
            $this->pharmacy_pocol->HrefValue = "";
            $this->pharmacy_pocol->TooltipValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";
            $this->Address1->TooltipValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";
            $this->Address2->TooltipValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";
            $this->Address3->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";
            $this->Fax->TooltipValue = "";

            // EEmail
            $this->EEmail->LinkCustomAttributes = "";
            $this->EEmail->HrefValue = "";
            $this->EEmail->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PharmacyID
            $this->PharmacyID->LinkCustomAttributes = "";
            $this->PharmacyID->HrefValue = "";
            $this->PharmacyID->TooltipValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";
            $this->BillTotalValue->TooltipValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";
            $this->GRNTotalValue->TooltipValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";
            $this->BillDiscount->TooltipValue = "";

            // BillUpload
            $this->BillUpload->LinkCustomAttributes = "";
            if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
                $this->BillUpload->HrefValue = GetFileUploadUrl($this->BillUpload, $this->BillUpload->htmlDecode($this->BillUpload->Upload->DbValue)); // Add prefix/suffix
                $this->BillUpload->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->BillUpload->HrefValue = FullUrl($this->BillUpload->HrefValue, "href");
                }
            } else {
                $this->BillUpload->HrefValue = "";
            }
            $this->BillUpload->ExportHrefValue = $this->BillUpload->UploadPath . $this->BillUpload->Upload->DbValue;
            $this->BillUpload->TooltipValue = "";
            if ($this->BillUpload->UseColorbox) {
                if (EmptyValue($this->BillUpload->TooltipValue)) {
                    $this->BillUpload->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->BillUpload->LinkAttrs["data-rel"] = "pharmacy_grn_x_BillUpload";
                $this->BillUpload->LinkAttrs->appendClass("ew-lightbox");
            }

            // TransPort
            $this->TransPort->LinkCustomAttributes = "";
            $this->TransPort->HrefValue = "";
            $this->TransPort->TooltipValue = "";

            // AnyOther
            $this->AnyOther->LinkCustomAttributes = "";
            $this->AnyOther->HrefValue = "";
            $this->AnyOther->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // GrnValue
            $this->GrnValue->LinkCustomAttributes = "";
            $this->GrnValue->HrefValue = "";
            $this->GrnValue->TooltipValue = "";

            // Pid
            $this->Pid->LinkCustomAttributes = "";
            $this->Pid->HrefValue = "";
            $this->Pid->TooltipValue = "";

            // PaymentNo
            $this->PaymentNo->LinkCustomAttributes = "";
            $this->PaymentNo->HrefValue = "";
            $this->PaymentNo->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->EditAttrs["class"] = "form-control";
            $this->GRNNO->EditCustomAttributes = "";
            if (!$this->GRNNO->Raw) {
                $this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
            }
            $this->GRNNO->EditValue = HtmlEncode($this->GRNNO->CurrentValue);
            $this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 7));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // YM
            $this->YM->EditAttrs["class"] = "form-control";
            $this->YM->EditCustomAttributes = "";
            if (!$this->YM->Raw) {
                $this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
            }
            $this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
            $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

            // PC
            $this->PC->EditCustomAttributes = "";
            $curVal = trim(strval($this->PC->CurrentValue));
            if ($curVal != "") {
                $this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
            } else {
                $this->PC->ViewValue = $this->PC->Lookup !== null && is_array($this->PC->Lookup->Options) ? $curVal : null;
            }
            if ($this->PC->ViewValue !== null) { // Load from cache
                $this->PC->EditValue = array_values($this->PC->Lookup->Options);
                if ($this->PC->ViewValue == "") {
                    $this->PC->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PC->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PC->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PC->Lookup->renderViewRow($rswrk[0]);
                    $this->PC->ViewValue = $this->PC->displayValue($arwrk);
                } else {
                    $this->PC->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->PC->EditValue = $arwrk;
            }
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // Customercode
            $this->Customercode->EditAttrs["class"] = "form-control";
            $this->Customercode->EditCustomAttributes = "";
            if (!$this->Customercode->Raw) {
                $this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
            }
            $this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
            $this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // pharmacy_pocol
            $this->pharmacy_pocol->EditAttrs["class"] = "form-control";
            $this->pharmacy_pocol->EditCustomAttributes = "";
            if (!$this->pharmacy_pocol->Raw) {
                $this->pharmacy_pocol->CurrentValue = HtmlDecode($this->pharmacy_pocol->CurrentValue);
            }
            $this->pharmacy_pocol->EditValue = HtmlEncode($this->pharmacy_pocol->CurrentValue);
            $this->pharmacy_pocol->PlaceHolder = RemoveHtml($this->pharmacy_pocol->caption());

            // Address1
            $this->Address1->EditAttrs["class"] = "form-control";
            $this->Address1->EditCustomAttributes = "";
            if (!$this->Address1->Raw) {
                $this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
            }
            $this->Address1->EditValue = HtmlEncode($this->Address1->CurrentValue);
            $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

            // Address2
            $this->Address2->EditAttrs["class"] = "form-control";
            $this->Address2->EditCustomAttributes = "";
            if (!$this->Address2->Raw) {
                $this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
            }
            $this->Address2->EditValue = HtmlEncode($this->Address2->CurrentValue);
            $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

            // Address3
            $this->Address3->EditAttrs["class"] = "form-control";
            $this->Address3->EditCustomAttributes = "";
            if (!$this->Address3->Raw) {
                $this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
            }
            $this->Address3->EditValue = HtmlEncode($this->Address3->CurrentValue);
            $this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Pincode
            $this->Pincode->EditAttrs["class"] = "form-control";
            $this->Pincode->EditCustomAttributes = "";
            if (!$this->Pincode->Raw) {
                $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
            }
            $this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
            $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

            // Phone
            $this->Phone->EditAttrs["class"] = "form-control";
            $this->Phone->EditCustomAttributes = "";
            if (!$this->Phone->Raw) {
                $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
            }
            $this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
            $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

            // Fax
            $this->Fax->EditAttrs["class"] = "form-control";
            $this->Fax->EditCustomAttributes = "";
            if (!$this->Fax->Raw) {
                $this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
            }
            $this->Fax->EditValue = HtmlEncode($this->Fax->CurrentValue);
            $this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

            // EEmail
            $this->EEmail->EditAttrs["class"] = "form-control";
            $this->EEmail->EditCustomAttributes = "";
            if (!$this->EEmail->Raw) {
                $this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
            }
            $this->EEmail->EditValue = HtmlEncode($this->EEmail->CurrentValue);
            $this->EEmail->PlaceHolder = RemoveHtml($this->EEmail->caption());

            // HospID

            // modifiedby

            // modifieddatetime

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            $this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
            } else {
                $this->BRCODE->ViewValue = $this->BRCODE->Lookup !== null && is_array($this->BRCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->BRCODE->ViewValue !== null) { // Load from cache
                $this->BRCODE->EditValue = array_values($this->BRCODE->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->BRCODE->CurrentValue, DATATYPE_NUMBER, "");
                }
                $lookupFilter = function() {
                    return "`id`='".PharmacyID()."'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->BRCODE->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->BRCODE->EditValue = $arwrk;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // PharmacyID

            // BillTotalValue
            $this->BillTotalValue->EditAttrs["class"] = "form-control";
            $this->BillTotalValue->EditCustomAttributes = "";
            $this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
            $this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
            if (strval($this->BillTotalValue->EditValue) != "" && is_numeric($this->BillTotalValue->EditValue)) {
                $this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
            }

            // GRNTotalValue
            $this->GRNTotalValue->EditAttrs["class"] = "form-control";
            $this->GRNTotalValue->EditCustomAttributes = "";
            $this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
            $this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
            if (strval($this->GRNTotalValue->EditValue) != "" && is_numeric($this->GRNTotalValue->EditValue)) {
                $this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
            }

            // BillDiscount
            $this->BillDiscount->EditAttrs["class"] = "form-control";
            $this->BillDiscount->EditCustomAttributes = "";
            $this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
            $this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
            if (strval($this->BillDiscount->EditValue) != "" && is_numeric($this->BillDiscount->EditValue)) {
                $this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
            }

            // BillUpload
            $this->BillUpload->EditAttrs["class"] = "form-control";
            $this->BillUpload->EditCustomAttributes = "";
            if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
                $this->BillUpload->ImageAlt = $this->BillUpload->alt();
                $this->BillUpload->EditValue = $this->BillUpload->Upload->DbValue;
            } else {
                $this->BillUpload->EditValue = "";
            }
            if (!EmptyValue($this->BillUpload->CurrentValue)) {
                $this->BillUpload->Upload->FileName = $this->BillUpload->CurrentValue;
            }
            if ($this->isShow()) {
                RenderUploadField($this->BillUpload);
            }

            // TransPort
            $this->TransPort->EditAttrs["class"] = "form-control";
            $this->TransPort->EditCustomAttributes = "";
            $this->TransPort->EditValue = HtmlEncode($this->TransPort->CurrentValue);
            $this->TransPort->PlaceHolder = RemoveHtml($this->TransPort->caption());
            if (strval($this->TransPort->EditValue) != "" && is_numeric($this->TransPort->EditValue)) {
                $this->TransPort->EditValue = FormatNumber($this->TransPort->EditValue, -2, -2, -2, -2);
            }

            // AnyOther
            $this->AnyOther->EditAttrs["class"] = "form-control";
            $this->AnyOther->EditCustomAttributes = "";
            $this->AnyOther->EditValue = HtmlEncode($this->AnyOther->CurrentValue);
            $this->AnyOther->PlaceHolder = RemoveHtml($this->AnyOther->caption());
            if (strval($this->AnyOther->EditValue) != "" && is_numeric($this->AnyOther->EditValue)) {
                $this->AnyOther->EditValue = FormatNumber($this->AnyOther->EditValue, -2, -2, -2, -2);
            }

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // GrnValue
            $this->GrnValue->EditAttrs["class"] = "form-control";
            $this->GrnValue->EditCustomAttributes = "";
            $this->GrnValue->EditValue = HtmlEncode($this->GrnValue->CurrentValue);
            $this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
            if (strval($this->GrnValue->EditValue) != "" && is_numeric($this->GrnValue->EditValue)) {
                $this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);
            }

            // Pid
            $this->Pid->EditAttrs["class"] = "form-control";
            $this->Pid->EditCustomAttributes = "";
            if ($this->Pid->getSessionValue() != "") {
                $this->Pid->CurrentValue = GetForeignKeyValue($this->Pid->getSessionValue());
                $this->Pid->ViewValue = $this->Pid->CurrentValue;
                $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
                $this->Pid->ViewCustomAttributes = "";
            } else {
                $this->Pid->EditValue = HtmlEncode($this->Pid->CurrentValue);
                $this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
            }

            // PaymentNo
            $this->PaymentNo->EditAttrs["class"] = "form-control";
            $this->PaymentNo->EditCustomAttributes = "";
            if (!$this->PaymentNo->Raw) {
                $this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
            }
            $this->PaymentNo->EditValue = HtmlEncode($this->PaymentNo->CurrentValue);
            $this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            if (!$this->PaymentStatus->Raw) {
                $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
            }
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
            if (strval($this->PaidAmount->EditValue) != "" && is_numeric($this->PaidAmount->EditValue)) {
                $this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);
            }

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->LinkCustomAttributes = "";
            $this->pharmacy_pocol->HrefValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";

            // EEmail
            $this->EEmail->LinkCustomAttributes = "";
            $this->EEmail->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PharmacyID
            $this->PharmacyID->LinkCustomAttributes = "";
            $this->PharmacyID->HrefValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";

            // BillUpload
            $this->BillUpload->LinkCustomAttributes = "";
            if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
                $this->BillUpload->HrefValue = GetFileUploadUrl($this->BillUpload, $this->BillUpload->htmlDecode($this->BillUpload->Upload->DbValue)); // Add prefix/suffix
                $this->BillUpload->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->BillUpload->HrefValue = FullUrl($this->BillUpload->HrefValue, "href");
                }
            } else {
                $this->BillUpload->HrefValue = "";
            }
            $this->BillUpload->ExportHrefValue = $this->BillUpload->UploadPath . $this->BillUpload->Upload->DbValue;

            // TransPort
            $this->TransPort->LinkCustomAttributes = "";
            $this->TransPort->HrefValue = "";

            // AnyOther
            $this->AnyOther->LinkCustomAttributes = "";
            $this->AnyOther->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // GrnValue
            $this->GrnValue->LinkCustomAttributes = "";
            $this->GrnValue->HrefValue = "";

            // Pid
            $this->Pid->LinkCustomAttributes = "";
            $this->Pid->HrefValue = "";

            // PaymentNo
            $this->PaymentNo->LinkCustomAttributes = "";
            $this->PaymentNo->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->GRNNO->Required) {
            if (!$this->GRNNO->IsDetailKey && EmptyValue($this->GRNNO->FormValue)) {
                $this->GRNNO->addErrorMessage(str_replace("%s", $this->GRNNO->caption(), $this->GRNNO->RequiredErrorMessage));
            }
        }
        if ($this->DT->Required) {
            if (!$this->DT->IsDetailKey && EmptyValue($this->DT->FormValue)) {
                $this->DT->addErrorMessage(str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DT->FormValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if ($this->YM->Required) {
            if (!$this->YM->IsDetailKey && EmptyValue($this->YM->FormValue)) {
                $this->YM->addErrorMessage(str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
            }
        }
        if ($this->PC->Required) {
            if (!$this->PC->IsDetailKey && EmptyValue($this->PC->FormValue)) {
                $this->PC->addErrorMessage(str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
            }
        }
        if ($this->Customercode->Required) {
            if (!$this->Customercode->IsDetailKey && EmptyValue($this->Customercode->FormValue)) {
                $this->Customercode->addErrorMessage(str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
            }
        }
        if ($this->Customername->Required) {
            if (!$this->Customername->IsDetailKey && EmptyValue($this->Customername->FormValue)) {
                $this->Customername->addErrorMessage(str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
            }
        }
        if ($this->pharmacy_pocol->Required) {
            if (!$this->pharmacy_pocol->IsDetailKey && EmptyValue($this->pharmacy_pocol->FormValue)) {
                $this->pharmacy_pocol->addErrorMessage(str_replace("%s", $this->pharmacy_pocol->caption(), $this->pharmacy_pocol->RequiredErrorMessage));
            }
        }
        if ($this->Address1->Required) {
            if (!$this->Address1->IsDetailKey && EmptyValue($this->Address1->FormValue)) {
                $this->Address1->addErrorMessage(str_replace("%s", $this->Address1->caption(), $this->Address1->RequiredErrorMessage));
            }
        }
        if ($this->Address2->Required) {
            if (!$this->Address2->IsDetailKey && EmptyValue($this->Address2->FormValue)) {
                $this->Address2->addErrorMessage(str_replace("%s", $this->Address2->caption(), $this->Address2->RequiredErrorMessage));
            }
        }
        if ($this->Address3->Required) {
            if (!$this->Address3->IsDetailKey && EmptyValue($this->Address3->FormValue)) {
                $this->Address3->addErrorMessage(str_replace("%s", $this->Address3->caption(), $this->Address3->RequiredErrorMessage));
            }
        }
        if ($this->State->Required) {
            if (!$this->State->IsDetailKey && EmptyValue($this->State->FormValue)) {
                $this->State->addErrorMessage(str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
            }
        }
        if ($this->Pincode->Required) {
            if (!$this->Pincode->IsDetailKey && EmptyValue($this->Pincode->FormValue)) {
                $this->Pincode->addErrorMessage(str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
            }
        }
        if ($this->Phone->Required) {
            if (!$this->Phone->IsDetailKey && EmptyValue($this->Phone->FormValue)) {
                $this->Phone->addErrorMessage(str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
            }
        }
        if ($this->Fax->Required) {
            if (!$this->Fax->IsDetailKey && EmptyValue($this->Fax->FormValue)) {
                $this->Fax->addErrorMessage(str_replace("%s", $this->Fax->caption(), $this->Fax->RequiredErrorMessage));
            }
        }
        if ($this->EEmail->Required) {
            if (!$this->EEmail->IsDetailKey && EmptyValue($this->EEmail->FormValue)) {
                $this->EEmail->addErrorMessage(str_replace("%s", $this->EEmail->caption(), $this->EEmail->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if ($this->BILLNO->Required) {
            if (!$this->BILLNO->IsDetailKey && EmptyValue($this->BILLNO->FormValue)) {
                $this->BILLNO->addErrorMessage(str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
            }
        }
        if ($this->BILLDT->Required) {
            if (!$this->BILLDT->IsDetailKey && EmptyValue($this->BILLDT->FormValue)) {
                $this->BILLDT->addErrorMessage(str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BILLDT->FormValue)) {
            $this->BILLDT->addErrorMessage($this->BILLDT->getErrorMessage(false));
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if ($this->PharmacyID->Required) {
            if (!$this->PharmacyID->IsDetailKey && EmptyValue($this->PharmacyID->FormValue)) {
                $this->PharmacyID->addErrorMessage(str_replace("%s", $this->PharmacyID->caption(), $this->PharmacyID->RequiredErrorMessage));
            }
        }
        if ($this->BillTotalValue->Required) {
            if (!$this->BillTotalValue->IsDetailKey && EmptyValue($this->BillTotalValue->FormValue)) {
                $this->BillTotalValue->addErrorMessage(str_replace("%s", $this->BillTotalValue->caption(), $this->BillTotalValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillTotalValue->FormValue)) {
            $this->BillTotalValue->addErrorMessage($this->BillTotalValue->getErrorMessage(false));
        }
        if ($this->GRNTotalValue->Required) {
            if (!$this->GRNTotalValue->IsDetailKey && EmptyValue($this->GRNTotalValue->FormValue)) {
                $this->GRNTotalValue->addErrorMessage(str_replace("%s", $this->GRNTotalValue->caption(), $this->GRNTotalValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GRNTotalValue->FormValue)) {
            $this->GRNTotalValue->addErrorMessage($this->GRNTotalValue->getErrorMessage(false));
        }
        if ($this->BillDiscount->Required) {
            if (!$this->BillDiscount->IsDetailKey && EmptyValue($this->BillDiscount->FormValue)) {
                $this->BillDiscount->addErrorMessage(str_replace("%s", $this->BillDiscount->caption(), $this->BillDiscount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BillDiscount->FormValue)) {
            $this->BillDiscount->addErrorMessage($this->BillDiscount->getErrorMessage(false));
        }
        if ($this->BillUpload->Required) {
            if ($this->BillUpload->Upload->FileName == "" && !$this->BillUpload->Upload->KeepFile) {
                $this->BillUpload->addErrorMessage(str_replace("%s", $this->BillUpload->caption(), $this->BillUpload->RequiredErrorMessage));
            }
        }
        if ($this->TransPort->Required) {
            if (!$this->TransPort->IsDetailKey && EmptyValue($this->TransPort->FormValue)) {
                $this->TransPort->addErrorMessage(str_replace("%s", $this->TransPort->caption(), $this->TransPort->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TransPort->FormValue)) {
            $this->TransPort->addErrorMessage($this->TransPort->getErrorMessage(false));
        }
        if ($this->AnyOther->Required) {
            if (!$this->AnyOther->IsDetailKey && EmptyValue($this->AnyOther->FormValue)) {
                $this->AnyOther->addErrorMessage(str_replace("%s", $this->AnyOther->caption(), $this->AnyOther->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->AnyOther->FormValue)) {
            $this->AnyOther->addErrorMessage($this->AnyOther->getErrorMessage(false));
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->GrnValue->Required) {
            if (!$this->GrnValue->IsDetailKey && EmptyValue($this->GrnValue->FormValue)) {
                $this->GrnValue->addErrorMessage(str_replace("%s", $this->GrnValue->caption(), $this->GrnValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GrnValue->FormValue)) {
            $this->GrnValue->addErrorMessage($this->GrnValue->getErrorMessage(false));
        }
        if ($this->Pid->Required) {
            if (!$this->Pid->IsDetailKey && EmptyValue($this->Pid->FormValue)) {
                $this->Pid->addErrorMessage(str_replace("%s", $this->Pid->caption(), $this->Pid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Pid->FormValue)) {
            $this->Pid->addErrorMessage($this->Pid->getErrorMessage(false));
        }
        if ($this->PaymentNo->Required) {
            if (!$this->PaymentNo->IsDetailKey && EmptyValue($this->PaymentNo->FormValue)) {
                $this->PaymentNo->addErrorMessage(str_replace("%s", $this->PaymentNo->caption(), $this->PaymentNo->RequiredErrorMessage));
            }
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if ($this->PaidAmount->Required) {
            if (!$this->PaidAmount->IsDetailKey && EmptyValue($this->PaidAmount->FormValue)) {
                $this->PaidAmount->addErrorMessage(str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PaidAmount->FormValue)) {
            $this->PaidAmount->addErrorMessage($this->PaidAmount->getErrorMessage(false));
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("ViewPharmacygrnGrid");
        if (in_array("view_pharmacygrn", $detailTblVar) && $detailPage->DetailEdit) {
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
        if ($this->BILLNO->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`BILLNO` = '" . AdjustSql($this->BILLNO->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->BILLNO->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->BILLNO->CurrentValue, $idxErrMsg);
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

            // GRNNO
            $this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, null, $this->GRNNO->ReadOnly);

            // DT
            $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 7), null, $this->DT->ReadOnly);

            // YM
            $this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, null, $this->YM->ReadOnly);

            // PC
            $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, $this->PC->ReadOnly);

            // Customercode
            $this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, null, $this->Customercode->ReadOnly);

            // Customername
            $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, $this->Customername->ReadOnly);

            // pharmacy_pocol
            $this->pharmacy_pocol->setDbValueDef($rsnew, $this->pharmacy_pocol->CurrentValue, null, $this->pharmacy_pocol->ReadOnly);

            // Address1
            $this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, null, $this->Address1->ReadOnly);

            // Address2
            $this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, null, $this->Address2->ReadOnly);

            // Address3
            $this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, null, $this->Address3->ReadOnly);

            // State
            $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, $this->State->ReadOnly);

            // Pincode
            $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, $this->Pincode->ReadOnly);

            // Phone
            $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, $this->Phone->ReadOnly);

            // Fax
            $this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, null, $this->Fax->ReadOnly);

            // EEmail
            $this->EEmail->setDbValueDef($rsnew, $this->EEmail->CurrentValue, null, $this->EEmail->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserName();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // BILLNO
            $this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, null, $this->BILLNO->ReadOnly);

            // BILLDT
            $this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), null, $this->BILLDT->ReadOnly);

            // BRCODE
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, $this->BRCODE->ReadOnly);

            // PharmacyID
            $this->PharmacyID->CurrentValue = PharmacyID();
            $this->PharmacyID->setDbValueDef($rsnew, $this->PharmacyID->CurrentValue, null);

            // BillTotalValue
            $this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, null, $this->BillTotalValue->ReadOnly);

            // GRNTotalValue
            $this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, null, $this->GRNTotalValue->ReadOnly);

            // BillDiscount
            $this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, null, $this->BillDiscount->ReadOnly);

            // BillUpload
            if ($this->BillUpload->Visible && !$this->BillUpload->ReadOnly && !$this->BillUpload->Upload->KeepFile) {
                $this->BillUpload->Upload->DbValue = $rsold['BillUpload']; // Get original value
                if ($this->BillUpload->Upload->FileName == "") {
                    $rsnew['BillUpload'] = null;
                } else {
                    $rsnew['BillUpload'] = $this->BillUpload->Upload->FileName;
                }
            }

            // TransPort
            $this->TransPort->setDbValueDef($rsnew, $this->TransPort->CurrentValue, null, $this->TransPort->ReadOnly);

            // AnyOther
            $this->AnyOther->setDbValueDef($rsnew, $this->AnyOther->CurrentValue, null, $this->AnyOther->ReadOnly);

            // Remarks
            $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, $this->Remarks->ReadOnly);

            // GrnValue
            $this->GrnValue->setDbValueDef($rsnew, $this->GrnValue->CurrentValue, null, $this->GrnValue->ReadOnly);

            // Pid
            if ($this->Pid->getSessionValue() != "") {
                $this->Pid->ReadOnly = true;
            }
            $this->Pid->setDbValueDef($rsnew, $this->Pid->CurrentValue, null, $this->Pid->ReadOnly);

            // PaymentNo
            $this->PaymentNo->setDbValueDef($rsnew, $this->PaymentNo->CurrentValue, null, $this->PaymentNo->ReadOnly);

            // PaymentStatus
            $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, $this->PaymentStatus->ReadOnly);

            // PaidAmount
            $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, $this->PaidAmount->ReadOnly);
            if ($this->BillUpload->Visible && !$this->BillUpload->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->BillUpload->Upload->DbValue) ? [] : [$this->BillUpload->htmlDecode($this->BillUpload->Upload->DbValue)];
                if (!EmptyValue($this->BillUpload->Upload->FileName)) {
                    $newFiles = [$this->BillUpload->Upload->FileName];
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index);
                            if (file_exists($tempPath . $file)) {
                                if (Config("DELETE_UPLOADED_FILES")) {
                                    $oldFileFound = false;
                                    $oldFileCount = count($oldFiles);
                                    for ($j = 0; $j < $oldFileCount; $j++) {
                                        $oldFile = $oldFiles[$j];
                                        if ($oldFile == $file) { // Old file found, no need to delete anymore
                                            array_splice($oldFiles, $j, 1);
                                            $oldFileFound = true;
                                            break;
                                        }
                                    }
                                    if ($oldFileFound) { // No need to check if file exists further
                                        continue;
                                    }
                                }
                                $file1 = UniqueFilename($this->BillUpload->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->BillUpload->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->BillUpload->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->BillUpload->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->BillUpload->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->BillUpload->setDbValueDef($rsnew, $this->BillUpload->Upload->FileName, null, $this->BillUpload->ReadOnly);
                }
            }

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
                    if ($this->BillUpload->Visible && !$this->BillUpload->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->BillUpload->Upload->DbValue) ? [] : [$this->BillUpload->htmlDecode($this->BillUpload->Upload->DbValue)];
                        if (!EmptyValue($this->BillUpload->Upload->FileName)) {
                            $newFiles = [$this->BillUpload->Upload->FileName];
                            $newFiles2 = [$this->BillUpload->htmlDecode($rsnew['BillUpload'])];
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->BillUpload->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                            $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                            return false;
                                        }
                                    }
                                }
                            }
                        } else {
                            $newFiles = [];
                        }
                        if (Config("DELETE_UPLOADED_FILES")) {
                            foreach ($oldFiles as $oldFile) {
                                if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                    @unlink($this->BillUpload->oldPhysicalUploadPath() . $oldFile);
                                }
                            }
                        }
                    }
                }

                // Update detail records
                $detailTblVar = explode(",", $this->getCurrentDetailTable());
                if ($editRow) {
                    $detailPage = Container("ViewPharmacygrnGrid");
                    if (in_array("view_pharmacygrn", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "view_pharmacygrn"); // Load user level of detail table
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
            // BillUpload
            CleanUploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index);
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "pharmacy_payment") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_payment");
                if (($parm = Get("fk_id", Get("Pid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Pid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Pid->setSessionValue($this->Pid->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "pharmacy_payment") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_payment");
                if (($parm = Post("fk_id", Post("Pid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Pid->setFormValue($masterTbl->id->FormValue);
                    $this->Pid->setSessionValue($this->Pid->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);
            $this->setSessionWhere($this->getDetailFilter());

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "pharmacy_payment") {
                if ($this->Pid->CurrentValue == "") {
                    $this->Pid->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
            if (in_array("view_pharmacygrn", $detailTblVar)) {
                $detailPageObj = Container("ViewPharmacygrnGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->grnid->IsDetailKey = true;
                    $detailPageObj->grnid->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->grnid->setSessionValue($detailPageObj->grnid->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyGrnList"), "", $this->TableVar, true);
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
                case "x_PC":
                    break;
                case "x_BRCODE":
                    $lookupFilter = function () {
                        return "`id`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
