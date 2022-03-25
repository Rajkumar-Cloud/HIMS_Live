<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreSuppliersAddopt extends StoreSuppliers
{
    use MessagesTrait;

    // Page ID
    public $PageID = "addopt";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_suppliers';

    // Page object name
    public $PageObjName = "StoreSuppliersAddopt";

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

        // Table object (store_suppliers)
        if (!isset($GLOBALS["store_suppliers"]) || get_class($GLOBALS["store_suppliers"]) == PROJECT_NAMESPACE . "store_suppliers") {
            $GLOBALS["store_suppliers"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_suppliers');
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
                $doc = new $class(Container("store_suppliers"));
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
            SaveDebugMessage();
            Redirect(GetUrl($url));
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
    public $IsModal = false;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->Suppliercode->setVisibility();
        $this->Suppliername->setVisibility();
        $this->Abbreviation->setVisibility();
        $this->Creationdate->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->Citycode->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Tngstnumber->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->_Email->setVisibility();
        $this->Paymentmode->setVisibility();
        $this->Contactperson1->setVisibility();
        $this->CP1Address1->setVisibility();
        $this->CP1Address2->setVisibility();
        $this->CP1Address3->setVisibility();
        $this->CP1Citycode->setVisibility();
        $this->CP1State->setVisibility();
        $this->CP1Pincode->setVisibility();
        $this->CP1Designation->setVisibility();
        $this->CP1Phone->setVisibility();
        $this->CP1MobileNo->setVisibility();
        $this->CP1Fax->setVisibility();
        $this->CP1Email->setVisibility();
        $this->Contactperson2->setVisibility();
        $this->CP2Address1->setVisibility();
        $this->CP2Address2->setVisibility();
        $this->CP2Address3->setVisibility();
        $this->CP2Citycode->setVisibility();
        $this->CP2State->setVisibility();
        $this->CP2Pincode->setVisibility();
        $this->CP2Designation->setVisibility();
        $this->CP2Phone->setVisibility();
        $this->CP2MobileNo->setVisibility();
        $this->CP2Fax->setVisibility();
        $this->CP2Email->setVisibility();
        $this->Type->setVisibility();
        $this->Creditterms->setVisibility();
        $this->Remarks->setVisibility();
        $this->Tinnumber->setVisibility();
        $this->Universalsuppliercode->setVisibility();
        $this->Mobilenumber->setVisibility();
        $this->PANNumber->setVisibility();
        $this->SalesRepMobileNo->setVisibility();
        $this->GSTNumber->setVisibility();
        $this->TANNumber->setVisibility();
        $this->id->Visible = false;
        $this->HospID->setVisibility();
        $this->BranchID->setVisibility();
        $this->StoreID->setVisibility();
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

        // Set up Breadcrumb
        //$this->setupBreadcrumb(); // Not used
        $this->loadRowValues(); // Load default values

        // Render row
        $this->RowType = ROWTYPE_ADD; // Render add type
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
        $this->Suppliercode->CurrentValue = null;
        $this->Suppliercode->OldValue = $this->Suppliercode->CurrentValue;
        $this->Suppliername->CurrentValue = null;
        $this->Suppliername->OldValue = $this->Suppliername->CurrentValue;
        $this->Abbreviation->CurrentValue = null;
        $this->Abbreviation->OldValue = $this->Abbreviation->CurrentValue;
        $this->Creationdate->CurrentValue = null;
        $this->Creationdate->OldValue = $this->Creationdate->CurrentValue;
        $this->Address1->CurrentValue = null;
        $this->Address1->OldValue = $this->Address1->CurrentValue;
        $this->Address2->CurrentValue = null;
        $this->Address2->OldValue = $this->Address2->CurrentValue;
        $this->Address3->CurrentValue = null;
        $this->Address3->OldValue = $this->Address3->CurrentValue;
        $this->Citycode->CurrentValue = null;
        $this->Citycode->OldValue = $this->Citycode->CurrentValue;
        $this->State->CurrentValue = null;
        $this->State->OldValue = $this->State->CurrentValue;
        $this->Pincode->CurrentValue = null;
        $this->Pincode->OldValue = $this->Pincode->CurrentValue;
        $this->Tngstnumber->CurrentValue = null;
        $this->Tngstnumber->OldValue = $this->Tngstnumber->CurrentValue;
        $this->Phone->CurrentValue = null;
        $this->Phone->OldValue = $this->Phone->CurrentValue;
        $this->Fax->CurrentValue = null;
        $this->Fax->OldValue = $this->Fax->CurrentValue;
        $this->_Email->CurrentValue = null;
        $this->_Email->OldValue = $this->_Email->CurrentValue;
        $this->Paymentmode->CurrentValue = null;
        $this->Paymentmode->OldValue = $this->Paymentmode->CurrentValue;
        $this->Contactperson1->CurrentValue = null;
        $this->Contactperson1->OldValue = $this->Contactperson1->CurrentValue;
        $this->CP1Address1->CurrentValue = null;
        $this->CP1Address1->OldValue = $this->CP1Address1->CurrentValue;
        $this->CP1Address2->CurrentValue = null;
        $this->CP1Address2->OldValue = $this->CP1Address2->CurrentValue;
        $this->CP1Address3->CurrentValue = null;
        $this->CP1Address3->OldValue = $this->CP1Address3->CurrentValue;
        $this->CP1Citycode->CurrentValue = null;
        $this->CP1Citycode->OldValue = $this->CP1Citycode->CurrentValue;
        $this->CP1State->CurrentValue = null;
        $this->CP1State->OldValue = $this->CP1State->CurrentValue;
        $this->CP1Pincode->CurrentValue = null;
        $this->CP1Pincode->OldValue = $this->CP1Pincode->CurrentValue;
        $this->CP1Designation->CurrentValue = null;
        $this->CP1Designation->OldValue = $this->CP1Designation->CurrentValue;
        $this->CP1Phone->CurrentValue = null;
        $this->CP1Phone->OldValue = $this->CP1Phone->CurrentValue;
        $this->CP1MobileNo->CurrentValue = null;
        $this->CP1MobileNo->OldValue = $this->CP1MobileNo->CurrentValue;
        $this->CP1Fax->CurrentValue = null;
        $this->CP1Fax->OldValue = $this->CP1Fax->CurrentValue;
        $this->CP1Email->CurrentValue = null;
        $this->CP1Email->OldValue = $this->CP1Email->CurrentValue;
        $this->Contactperson2->CurrentValue = null;
        $this->Contactperson2->OldValue = $this->Contactperson2->CurrentValue;
        $this->CP2Address1->CurrentValue = null;
        $this->CP2Address1->OldValue = $this->CP2Address1->CurrentValue;
        $this->CP2Address2->CurrentValue = null;
        $this->CP2Address2->OldValue = $this->CP2Address2->CurrentValue;
        $this->CP2Address3->CurrentValue = null;
        $this->CP2Address3->OldValue = $this->CP2Address3->CurrentValue;
        $this->CP2Citycode->CurrentValue = null;
        $this->CP2Citycode->OldValue = $this->CP2Citycode->CurrentValue;
        $this->CP2State->CurrentValue = null;
        $this->CP2State->OldValue = $this->CP2State->CurrentValue;
        $this->CP2Pincode->CurrentValue = null;
        $this->CP2Pincode->OldValue = $this->CP2Pincode->CurrentValue;
        $this->CP2Designation->CurrentValue = null;
        $this->CP2Designation->OldValue = $this->CP2Designation->CurrentValue;
        $this->CP2Phone->CurrentValue = null;
        $this->CP2Phone->OldValue = $this->CP2Phone->CurrentValue;
        $this->CP2MobileNo->CurrentValue = null;
        $this->CP2MobileNo->OldValue = $this->CP2MobileNo->CurrentValue;
        $this->CP2Fax->CurrentValue = null;
        $this->CP2Fax->OldValue = $this->CP2Fax->CurrentValue;
        $this->CP2Email->CurrentValue = null;
        $this->CP2Email->OldValue = $this->CP2Email->CurrentValue;
        $this->Type->CurrentValue = null;
        $this->Type->OldValue = $this->Type->CurrentValue;
        $this->Creditterms->CurrentValue = null;
        $this->Creditterms->OldValue = $this->Creditterms->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->Tinnumber->CurrentValue = null;
        $this->Tinnumber->OldValue = $this->Tinnumber->CurrentValue;
        $this->Universalsuppliercode->CurrentValue = null;
        $this->Universalsuppliercode->OldValue = $this->Universalsuppliercode->CurrentValue;
        $this->Mobilenumber->CurrentValue = null;
        $this->Mobilenumber->OldValue = $this->Mobilenumber->CurrentValue;
        $this->PANNumber->CurrentValue = null;
        $this->PANNumber->OldValue = $this->PANNumber->CurrentValue;
        $this->SalesRepMobileNo->CurrentValue = null;
        $this->SalesRepMobileNo->OldValue = $this->SalesRepMobileNo->CurrentValue;
        $this->GSTNumber->CurrentValue = null;
        $this->GSTNumber->OldValue = $this->GSTNumber->CurrentValue;
        $this->TANNumber->CurrentValue = null;
        $this->TANNumber->OldValue = $this->TANNumber->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->BranchID->CurrentValue = null;
        $this->BranchID->OldValue = $this->BranchID->CurrentValue;
        $this->StoreID->CurrentValue = null;
        $this->StoreID->OldValue = $this->StoreID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Suppliercode' first before field var 'x_Suppliercode'
        $val = $CurrentForm->hasValue("Suppliercode") ? $CurrentForm->getValue("Suppliercode") : $CurrentForm->getValue("x_Suppliercode");
        if (!$this->Suppliercode->IsDetailKey) {
            $this->Suppliercode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Suppliername' first before field var 'x_Suppliername'
        $val = $CurrentForm->hasValue("Suppliername") ? $CurrentForm->getValue("Suppliername") : $CurrentForm->getValue("x_Suppliername");
        if (!$this->Suppliername->IsDetailKey) {
            $this->Suppliername->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Abbreviation' first before field var 'x_Abbreviation'
        $val = $CurrentForm->hasValue("Abbreviation") ? $CurrentForm->getValue("Abbreviation") : $CurrentForm->getValue("x_Abbreviation");
        if (!$this->Abbreviation->IsDetailKey) {
            $this->Abbreviation->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Creationdate' first before field var 'x_Creationdate'
        $val = $CurrentForm->hasValue("Creationdate") ? $CurrentForm->getValue("Creationdate") : $CurrentForm->getValue("x_Creationdate");
        if (!$this->Creationdate->IsDetailKey) {
            $this->Creationdate->setFormValue(ConvertFromUtf8($val));
            $this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
        }

        // Check field name 'Address1' first before field var 'x_Address1'
        $val = $CurrentForm->hasValue("Address1") ? $CurrentForm->getValue("Address1") : $CurrentForm->getValue("x_Address1");
        if (!$this->Address1->IsDetailKey) {
            $this->Address1->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Address2' first before field var 'x_Address2'
        $val = $CurrentForm->hasValue("Address2") ? $CurrentForm->getValue("Address2") : $CurrentForm->getValue("x_Address2");
        if (!$this->Address2->IsDetailKey) {
            $this->Address2->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Address3' first before field var 'x_Address3'
        $val = $CurrentForm->hasValue("Address3") ? $CurrentForm->getValue("Address3") : $CurrentForm->getValue("x_Address3");
        if (!$this->Address3->IsDetailKey) {
            $this->Address3->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Citycode' first before field var 'x_Citycode'
        $val = $CurrentForm->hasValue("Citycode") ? $CurrentForm->getValue("Citycode") : $CurrentForm->getValue("x_Citycode");
        if (!$this->Citycode->IsDetailKey) {
            $this->Citycode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'State' first before field var 'x_State'
        $val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
        if (!$this->State->IsDetailKey) {
            $this->State->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Pincode' first before field var 'x_Pincode'
        $val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
        if (!$this->Pincode->IsDetailKey) {
            $this->Pincode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Tngstnumber' first before field var 'x_Tngstnumber'
        $val = $CurrentForm->hasValue("Tngstnumber") ? $CurrentForm->getValue("Tngstnumber") : $CurrentForm->getValue("x_Tngstnumber");
        if (!$this->Tngstnumber->IsDetailKey) {
            $this->Tngstnumber->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Phone' first before field var 'x_Phone'
        $val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
        if (!$this->Phone->IsDetailKey) {
            $this->Phone->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Fax' first before field var 'x_Fax'
        $val = $CurrentForm->hasValue("Fax") ? $CurrentForm->getValue("Fax") : $CurrentForm->getValue("x_Fax");
        if (!$this->Fax->IsDetailKey) {
            $this->Fax->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Email' first before field var 'x__Email'
        $val = $CurrentForm->hasValue("Email") ? $CurrentForm->getValue("Email") : $CurrentForm->getValue("x__Email");
        if (!$this->_Email->IsDetailKey) {
            $this->_Email->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Paymentmode' first before field var 'x_Paymentmode'
        $val = $CurrentForm->hasValue("Paymentmode") ? $CurrentForm->getValue("Paymentmode") : $CurrentForm->getValue("x_Paymentmode");
        if (!$this->Paymentmode->IsDetailKey) {
            $this->Paymentmode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Contactperson1' first before field var 'x_Contactperson1'
        $val = $CurrentForm->hasValue("Contactperson1") ? $CurrentForm->getValue("Contactperson1") : $CurrentForm->getValue("x_Contactperson1");
        if (!$this->Contactperson1->IsDetailKey) {
            $this->Contactperson1->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Address1' first before field var 'x_CP1Address1'
        $val = $CurrentForm->hasValue("CP1Address1") ? $CurrentForm->getValue("CP1Address1") : $CurrentForm->getValue("x_CP1Address1");
        if (!$this->CP1Address1->IsDetailKey) {
            $this->CP1Address1->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Address2' first before field var 'x_CP1Address2'
        $val = $CurrentForm->hasValue("CP1Address2") ? $CurrentForm->getValue("CP1Address2") : $CurrentForm->getValue("x_CP1Address2");
        if (!$this->CP1Address2->IsDetailKey) {
            $this->CP1Address2->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Address3' first before field var 'x_CP1Address3'
        $val = $CurrentForm->hasValue("CP1Address3") ? $CurrentForm->getValue("CP1Address3") : $CurrentForm->getValue("x_CP1Address3");
        if (!$this->CP1Address3->IsDetailKey) {
            $this->CP1Address3->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Citycode' first before field var 'x_CP1Citycode'
        $val = $CurrentForm->hasValue("CP1Citycode") ? $CurrentForm->getValue("CP1Citycode") : $CurrentForm->getValue("x_CP1Citycode");
        if (!$this->CP1Citycode->IsDetailKey) {
            $this->CP1Citycode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1State' first before field var 'x_CP1State'
        $val = $CurrentForm->hasValue("CP1State") ? $CurrentForm->getValue("CP1State") : $CurrentForm->getValue("x_CP1State");
        if (!$this->CP1State->IsDetailKey) {
            $this->CP1State->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Pincode' first before field var 'x_CP1Pincode'
        $val = $CurrentForm->hasValue("CP1Pincode") ? $CurrentForm->getValue("CP1Pincode") : $CurrentForm->getValue("x_CP1Pincode");
        if (!$this->CP1Pincode->IsDetailKey) {
            $this->CP1Pincode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Designation' first before field var 'x_CP1Designation'
        $val = $CurrentForm->hasValue("CP1Designation") ? $CurrentForm->getValue("CP1Designation") : $CurrentForm->getValue("x_CP1Designation");
        if (!$this->CP1Designation->IsDetailKey) {
            $this->CP1Designation->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Phone' first before field var 'x_CP1Phone'
        $val = $CurrentForm->hasValue("CP1Phone") ? $CurrentForm->getValue("CP1Phone") : $CurrentForm->getValue("x_CP1Phone");
        if (!$this->CP1Phone->IsDetailKey) {
            $this->CP1Phone->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1MobileNo' first before field var 'x_CP1MobileNo'
        $val = $CurrentForm->hasValue("CP1MobileNo") ? $CurrentForm->getValue("CP1MobileNo") : $CurrentForm->getValue("x_CP1MobileNo");
        if (!$this->CP1MobileNo->IsDetailKey) {
            $this->CP1MobileNo->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Fax' first before field var 'x_CP1Fax'
        $val = $CurrentForm->hasValue("CP1Fax") ? $CurrentForm->getValue("CP1Fax") : $CurrentForm->getValue("x_CP1Fax");
        if (!$this->CP1Fax->IsDetailKey) {
            $this->CP1Fax->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP1Email' first before field var 'x_CP1Email'
        $val = $CurrentForm->hasValue("CP1Email") ? $CurrentForm->getValue("CP1Email") : $CurrentForm->getValue("x_CP1Email");
        if (!$this->CP1Email->IsDetailKey) {
            $this->CP1Email->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Contactperson2' first before field var 'x_Contactperson2'
        $val = $CurrentForm->hasValue("Contactperson2") ? $CurrentForm->getValue("Contactperson2") : $CurrentForm->getValue("x_Contactperson2");
        if (!$this->Contactperson2->IsDetailKey) {
            $this->Contactperson2->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Address1' first before field var 'x_CP2Address1'
        $val = $CurrentForm->hasValue("CP2Address1") ? $CurrentForm->getValue("CP2Address1") : $CurrentForm->getValue("x_CP2Address1");
        if (!$this->CP2Address1->IsDetailKey) {
            $this->CP2Address1->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Address2' first before field var 'x_CP2Address2'
        $val = $CurrentForm->hasValue("CP2Address2") ? $CurrentForm->getValue("CP2Address2") : $CurrentForm->getValue("x_CP2Address2");
        if (!$this->CP2Address2->IsDetailKey) {
            $this->CP2Address2->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Address3' first before field var 'x_CP2Address3'
        $val = $CurrentForm->hasValue("CP2Address3") ? $CurrentForm->getValue("CP2Address3") : $CurrentForm->getValue("x_CP2Address3");
        if (!$this->CP2Address3->IsDetailKey) {
            $this->CP2Address3->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Citycode' first before field var 'x_CP2Citycode'
        $val = $CurrentForm->hasValue("CP2Citycode") ? $CurrentForm->getValue("CP2Citycode") : $CurrentForm->getValue("x_CP2Citycode");
        if (!$this->CP2Citycode->IsDetailKey) {
            $this->CP2Citycode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2State' first before field var 'x_CP2State'
        $val = $CurrentForm->hasValue("CP2State") ? $CurrentForm->getValue("CP2State") : $CurrentForm->getValue("x_CP2State");
        if (!$this->CP2State->IsDetailKey) {
            $this->CP2State->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Pincode' first before field var 'x_CP2Pincode'
        $val = $CurrentForm->hasValue("CP2Pincode") ? $CurrentForm->getValue("CP2Pincode") : $CurrentForm->getValue("x_CP2Pincode");
        if (!$this->CP2Pincode->IsDetailKey) {
            $this->CP2Pincode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Designation' first before field var 'x_CP2Designation'
        $val = $CurrentForm->hasValue("CP2Designation") ? $CurrentForm->getValue("CP2Designation") : $CurrentForm->getValue("x_CP2Designation");
        if (!$this->CP2Designation->IsDetailKey) {
            $this->CP2Designation->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Phone' first before field var 'x_CP2Phone'
        $val = $CurrentForm->hasValue("CP2Phone") ? $CurrentForm->getValue("CP2Phone") : $CurrentForm->getValue("x_CP2Phone");
        if (!$this->CP2Phone->IsDetailKey) {
            $this->CP2Phone->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2MobileNo' first before field var 'x_CP2MobileNo'
        $val = $CurrentForm->hasValue("CP2MobileNo") ? $CurrentForm->getValue("CP2MobileNo") : $CurrentForm->getValue("x_CP2MobileNo");
        if (!$this->CP2MobileNo->IsDetailKey) {
            $this->CP2MobileNo->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Fax' first before field var 'x_CP2Fax'
        $val = $CurrentForm->hasValue("CP2Fax") ? $CurrentForm->getValue("CP2Fax") : $CurrentForm->getValue("x_CP2Fax");
        if (!$this->CP2Fax->IsDetailKey) {
            $this->CP2Fax->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'CP2Email' first before field var 'x_CP2Email'
        $val = $CurrentForm->hasValue("CP2Email") ? $CurrentForm->getValue("CP2Email") : $CurrentForm->getValue("x_CP2Email");
        if (!$this->CP2Email->IsDetailKey) {
            $this->CP2Email->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Type' first before field var 'x_Type'
        $val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
        if (!$this->Type->IsDetailKey) {
            $this->Type->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Creditterms' first before field var 'x_Creditterms'
        $val = $CurrentForm->hasValue("Creditterms") ? $CurrentForm->getValue("Creditterms") : $CurrentForm->getValue("x_Creditterms");
        if (!$this->Creditterms->IsDetailKey) {
            $this->Creditterms->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            $this->Remarks->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Tinnumber' first before field var 'x_Tinnumber'
        $val = $CurrentForm->hasValue("Tinnumber") ? $CurrentForm->getValue("Tinnumber") : $CurrentForm->getValue("x_Tinnumber");
        if (!$this->Tinnumber->IsDetailKey) {
            $this->Tinnumber->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Universalsuppliercode' first before field var 'x_Universalsuppliercode'
        $val = $CurrentForm->hasValue("Universalsuppliercode") ? $CurrentForm->getValue("Universalsuppliercode") : $CurrentForm->getValue("x_Universalsuppliercode");
        if (!$this->Universalsuppliercode->IsDetailKey) {
            $this->Universalsuppliercode->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Mobilenumber' first before field var 'x_Mobilenumber'
        $val = $CurrentForm->hasValue("Mobilenumber") ? $CurrentForm->getValue("Mobilenumber") : $CurrentForm->getValue("x_Mobilenumber");
        if (!$this->Mobilenumber->IsDetailKey) {
            $this->Mobilenumber->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PANNumber' first before field var 'x_PANNumber'
        $val = $CurrentForm->hasValue("PANNumber") ? $CurrentForm->getValue("PANNumber") : $CurrentForm->getValue("x_PANNumber");
        if (!$this->PANNumber->IsDetailKey) {
            $this->PANNumber->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'SalesRepMobileNo' first before field var 'x_SalesRepMobileNo'
        $val = $CurrentForm->hasValue("SalesRepMobileNo") ? $CurrentForm->getValue("SalesRepMobileNo") : $CurrentForm->getValue("x_SalesRepMobileNo");
        if (!$this->SalesRepMobileNo->IsDetailKey) {
            $this->SalesRepMobileNo->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'GSTNumber' first before field var 'x_GSTNumber'
        $val = $CurrentForm->hasValue("GSTNumber") ? $CurrentForm->getValue("GSTNumber") : $CurrentForm->getValue("x_GSTNumber");
        if (!$this->GSTNumber->IsDetailKey) {
            $this->GSTNumber->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'TANNumber' first before field var 'x_TANNumber'
        $val = $CurrentForm->hasValue("TANNumber") ? $CurrentForm->getValue("TANNumber") : $CurrentForm->getValue("x_TANNumber");
        if (!$this->TANNumber->IsDetailKey) {
            $this->TANNumber->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            $this->HospID->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'BranchID' first before field var 'x_BranchID'
        $val = $CurrentForm->hasValue("BranchID") ? $CurrentForm->getValue("BranchID") : $CurrentForm->getValue("x_BranchID");
        if (!$this->BranchID->IsDetailKey) {
            $this->BranchID->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'StoreID' first before field var 'x_StoreID'
        $val = $CurrentForm->hasValue("StoreID") ? $CurrentForm->getValue("StoreID") : $CurrentForm->getValue("x_StoreID");
        if (!$this->StoreID->IsDetailKey) {
            $this->StoreID->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Suppliercode->CurrentValue = ConvertToUtf8($this->Suppliercode->FormValue);
        $this->Suppliername->CurrentValue = ConvertToUtf8($this->Suppliername->FormValue);
        $this->Abbreviation->CurrentValue = ConvertToUtf8($this->Abbreviation->FormValue);
        $this->Creationdate->CurrentValue = ConvertToUtf8($this->Creationdate->FormValue);
        $this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
        $this->Address1->CurrentValue = ConvertToUtf8($this->Address1->FormValue);
        $this->Address2->CurrentValue = ConvertToUtf8($this->Address2->FormValue);
        $this->Address3->CurrentValue = ConvertToUtf8($this->Address3->FormValue);
        $this->Citycode->CurrentValue = ConvertToUtf8($this->Citycode->FormValue);
        $this->State->CurrentValue = ConvertToUtf8($this->State->FormValue);
        $this->Pincode->CurrentValue = ConvertToUtf8($this->Pincode->FormValue);
        $this->Tngstnumber->CurrentValue = ConvertToUtf8($this->Tngstnumber->FormValue);
        $this->Phone->CurrentValue = ConvertToUtf8($this->Phone->FormValue);
        $this->Fax->CurrentValue = ConvertToUtf8($this->Fax->FormValue);
        $this->_Email->CurrentValue = ConvertToUtf8($this->_Email->FormValue);
        $this->Paymentmode->CurrentValue = ConvertToUtf8($this->Paymentmode->FormValue);
        $this->Contactperson1->CurrentValue = ConvertToUtf8($this->Contactperson1->FormValue);
        $this->CP1Address1->CurrentValue = ConvertToUtf8($this->CP1Address1->FormValue);
        $this->CP1Address2->CurrentValue = ConvertToUtf8($this->CP1Address2->FormValue);
        $this->CP1Address3->CurrentValue = ConvertToUtf8($this->CP1Address3->FormValue);
        $this->CP1Citycode->CurrentValue = ConvertToUtf8($this->CP1Citycode->FormValue);
        $this->CP1State->CurrentValue = ConvertToUtf8($this->CP1State->FormValue);
        $this->CP1Pincode->CurrentValue = ConvertToUtf8($this->CP1Pincode->FormValue);
        $this->CP1Designation->CurrentValue = ConvertToUtf8($this->CP1Designation->FormValue);
        $this->CP1Phone->CurrentValue = ConvertToUtf8($this->CP1Phone->FormValue);
        $this->CP1MobileNo->CurrentValue = ConvertToUtf8($this->CP1MobileNo->FormValue);
        $this->CP1Fax->CurrentValue = ConvertToUtf8($this->CP1Fax->FormValue);
        $this->CP1Email->CurrentValue = ConvertToUtf8($this->CP1Email->FormValue);
        $this->Contactperson2->CurrentValue = ConvertToUtf8($this->Contactperson2->FormValue);
        $this->CP2Address1->CurrentValue = ConvertToUtf8($this->CP2Address1->FormValue);
        $this->CP2Address2->CurrentValue = ConvertToUtf8($this->CP2Address2->FormValue);
        $this->CP2Address3->CurrentValue = ConvertToUtf8($this->CP2Address3->FormValue);
        $this->CP2Citycode->CurrentValue = ConvertToUtf8($this->CP2Citycode->FormValue);
        $this->CP2State->CurrentValue = ConvertToUtf8($this->CP2State->FormValue);
        $this->CP2Pincode->CurrentValue = ConvertToUtf8($this->CP2Pincode->FormValue);
        $this->CP2Designation->CurrentValue = ConvertToUtf8($this->CP2Designation->FormValue);
        $this->CP2Phone->CurrentValue = ConvertToUtf8($this->CP2Phone->FormValue);
        $this->CP2MobileNo->CurrentValue = ConvertToUtf8($this->CP2MobileNo->FormValue);
        $this->CP2Fax->CurrentValue = ConvertToUtf8($this->CP2Fax->FormValue);
        $this->CP2Email->CurrentValue = ConvertToUtf8($this->CP2Email->FormValue);
        $this->Type->CurrentValue = ConvertToUtf8($this->Type->FormValue);
        $this->Creditterms->CurrentValue = ConvertToUtf8($this->Creditterms->FormValue);
        $this->Remarks->CurrentValue = ConvertToUtf8($this->Remarks->FormValue);
        $this->Tinnumber->CurrentValue = ConvertToUtf8($this->Tinnumber->FormValue);
        $this->Universalsuppliercode->CurrentValue = ConvertToUtf8($this->Universalsuppliercode->FormValue);
        $this->Mobilenumber->CurrentValue = ConvertToUtf8($this->Mobilenumber->FormValue);
        $this->PANNumber->CurrentValue = ConvertToUtf8($this->PANNumber->FormValue);
        $this->SalesRepMobileNo->CurrentValue = ConvertToUtf8($this->SalesRepMobileNo->FormValue);
        $this->GSTNumber->CurrentValue = ConvertToUtf8($this->GSTNumber->FormValue);
        $this->TANNumber->CurrentValue = ConvertToUtf8($this->TANNumber->FormValue);
        $this->HospID->CurrentValue = ConvertToUtf8($this->HospID->FormValue);
        $this->BranchID->CurrentValue = ConvertToUtf8($this->BranchID->FormValue);
        $this->StoreID->CurrentValue = ConvertToUtf8($this->StoreID->FormValue);
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
        $this->Suppliercode->setDbValue($row['Suppliercode']);
        $this->Suppliername->setDbValue($row['Suppliername']);
        $this->Abbreviation->setDbValue($row['Abbreviation']);
        $this->Creationdate->setDbValue($row['Creationdate']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->Citycode->setDbValue($row['Citycode']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Tngstnumber->setDbValue($row['Tngstnumber']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->_Email->setDbValue($row['Email']);
        $this->Paymentmode->setDbValue($row['Paymentmode']);
        $this->Contactperson1->setDbValue($row['Contactperson1']);
        $this->CP1Address1->setDbValue($row['CP1Address1']);
        $this->CP1Address2->setDbValue($row['CP1Address2']);
        $this->CP1Address3->setDbValue($row['CP1Address3']);
        $this->CP1Citycode->setDbValue($row['CP1Citycode']);
        $this->CP1State->setDbValue($row['CP1State']);
        $this->CP1Pincode->setDbValue($row['CP1Pincode']);
        $this->CP1Designation->setDbValue($row['CP1Designation']);
        $this->CP1Phone->setDbValue($row['CP1Phone']);
        $this->CP1MobileNo->setDbValue($row['CP1MobileNo']);
        $this->CP1Fax->setDbValue($row['CP1Fax']);
        $this->CP1Email->setDbValue($row['CP1Email']);
        $this->Contactperson2->setDbValue($row['Contactperson2']);
        $this->CP2Address1->setDbValue($row['CP2Address1']);
        $this->CP2Address2->setDbValue($row['CP2Address2']);
        $this->CP2Address3->setDbValue($row['CP2Address3']);
        $this->CP2Citycode->setDbValue($row['CP2Citycode']);
        $this->CP2State->setDbValue($row['CP2State']);
        $this->CP2Pincode->setDbValue($row['CP2Pincode']);
        $this->CP2Designation->setDbValue($row['CP2Designation']);
        $this->CP2Phone->setDbValue($row['CP2Phone']);
        $this->CP2MobileNo->setDbValue($row['CP2MobileNo']);
        $this->CP2Fax->setDbValue($row['CP2Fax']);
        $this->CP2Email->setDbValue($row['CP2Email']);
        $this->Type->setDbValue($row['Type']);
        $this->Creditterms->setDbValue($row['Creditterms']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->Tinnumber->setDbValue($row['Tinnumber']);
        $this->Universalsuppliercode->setDbValue($row['Universalsuppliercode']);
        $this->Mobilenumber->setDbValue($row['Mobilenumber']);
        $this->PANNumber->setDbValue($row['PANNumber']);
        $this->SalesRepMobileNo->setDbValue($row['SalesRepMobileNo']);
        $this->GSTNumber->setDbValue($row['GSTNumber']);
        $this->TANNumber->setDbValue($row['TANNumber']);
        $this->id->setDbValue($row['id']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BranchID->setDbValue($row['BranchID']);
        $this->StoreID->setDbValue($row['StoreID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['Suppliercode'] = $this->Suppliercode->CurrentValue;
        $row['Suppliername'] = $this->Suppliername->CurrentValue;
        $row['Abbreviation'] = $this->Abbreviation->CurrentValue;
        $row['Creationdate'] = $this->Creationdate->CurrentValue;
        $row['Address1'] = $this->Address1->CurrentValue;
        $row['Address2'] = $this->Address2->CurrentValue;
        $row['Address3'] = $this->Address3->CurrentValue;
        $row['Citycode'] = $this->Citycode->CurrentValue;
        $row['State'] = $this->State->CurrentValue;
        $row['Pincode'] = $this->Pincode->CurrentValue;
        $row['Tngstnumber'] = $this->Tngstnumber->CurrentValue;
        $row['Phone'] = $this->Phone->CurrentValue;
        $row['Fax'] = $this->Fax->CurrentValue;
        $row['Email'] = $this->_Email->CurrentValue;
        $row['Paymentmode'] = $this->Paymentmode->CurrentValue;
        $row['Contactperson1'] = $this->Contactperson1->CurrentValue;
        $row['CP1Address1'] = $this->CP1Address1->CurrentValue;
        $row['CP1Address2'] = $this->CP1Address2->CurrentValue;
        $row['CP1Address3'] = $this->CP1Address3->CurrentValue;
        $row['CP1Citycode'] = $this->CP1Citycode->CurrentValue;
        $row['CP1State'] = $this->CP1State->CurrentValue;
        $row['CP1Pincode'] = $this->CP1Pincode->CurrentValue;
        $row['CP1Designation'] = $this->CP1Designation->CurrentValue;
        $row['CP1Phone'] = $this->CP1Phone->CurrentValue;
        $row['CP1MobileNo'] = $this->CP1MobileNo->CurrentValue;
        $row['CP1Fax'] = $this->CP1Fax->CurrentValue;
        $row['CP1Email'] = $this->CP1Email->CurrentValue;
        $row['Contactperson2'] = $this->Contactperson2->CurrentValue;
        $row['CP2Address1'] = $this->CP2Address1->CurrentValue;
        $row['CP2Address2'] = $this->CP2Address2->CurrentValue;
        $row['CP2Address3'] = $this->CP2Address3->CurrentValue;
        $row['CP2Citycode'] = $this->CP2Citycode->CurrentValue;
        $row['CP2State'] = $this->CP2State->CurrentValue;
        $row['CP2Pincode'] = $this->CP2Pincode->CurrentValue;
        $row['CP2Designation'] = $this->CP2Designation->CurrentValue;
        $row['CP2Phone'] = $this->CP2Phone->CurrentValue;
        $row['CP2MobileNo'] = $this->CP2MobileNo->CurrentValue;
        $row['CP2Fax'] = $this->CP2Fax->CurrentValue;
        $row['CP2Email'] = $this->CP2Email->CurrentValue;
        $row['Type'] = $this->Type->CurrentValue;
        $row['Creditterms'] = $this->Creditterms->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['Tinnumber'] = $this->Tinnumber->CurrentValue;
        $row['Universalsuppliercode'] = $this->Universalsuppliercode->CurrentValue;
        $row['Mobilenumber'] = $this->Mobilenumber->CurrentValue;
        $row['PANNumber'] = $this->PANNumber->CurrentValue;
        $row['SalesRepMobileNo'] = $this->SalesRepMobileNo->CurrentValue;
        $row['GSTNumber'] = $this->GSTNumber->CurrentValue;
        $row['TANNumber'] = $this->TANNumber->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['BranchID'] = $this->BranchID->CurrentValue;
        $row['StoreID'] = $this->StoreID->CurrentValue;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Suppliercode

        // Suppliername

        // Abbreviation

        // Creationdate

        // Address1

        // Address2

        // Address3

        // Citycode

        // State

        // Pincode

        // Tngstnumber

        // Phone

        // Fax

        // Email

        // Paymentmode

        // Contactperson1

        // CP1Address1

        // CP1Address2

        // CP1Address3

        // CP1Citycode

        // CP1State

        // CP1Pincode

        // CP1Designation

        // CP1Phone

        // CP1MobileNo

        // CP1Fax

        // CP1Email

        // Contactperson2

        // CP2Address1

        // CP2Address2

        // CP2Address3

        // CP2Citycode

        // CP2State

        // CP2Pincode

        // CP2Designation

        // CP2Phone

        // CP2MobileNo

        // CP2Fax

        // CP2Email

        // Type

        // Creditterms

        // Remarks

        // Tinnumber

        // Universalsuppliercode

        // Mobilenumber

        // PANNumber

        // SalesRepMobileNo

        // GSTNumber

        // TANNumber

        // id

        // HospID

        // BranchID

        // StoreID
        if ($this->RowType == ROWTYPE_VIEW) {
            // Suppliercode
            $this->Suppliercode->ViewValue = $this->Suppliercode->CurrentValue;
            $this->Suppliercode->ViewCustomAttributes = "";

            // Suppliername
            $this->Suppliername->ViewValue = $this->Suppliername->CurrentValue;
            $this->Suppliername->ViewCustomAttributes = "";

            // Abbreviation
            $this->Abbreviation->ViewValue = $this->Abbreviation->CurrentValue;
            $this->Abbreviation->ViewCustomAttributes = "";

            // Creationdate
            $this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
            $this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
            $this->Creationdate->ViewCustomAttributes = "";

            // Address1
            $this->Address1->ViewValue = $this->Address1->CurrentValue;
            $this->Address1->ViewCustomAttributes = "";

            // Address2
            $this->Address2->ViewValue = $this->Address2->CurrentValue;
            $this->Address2->ViewCustomAttributes = "";

            // Address3
            $this->Address3->ViewValue = $this->Address3->CurrentValue;
            $this->Address3->ViewCustomAttributes = "";

            // Citycode
            $this->Citycode->ViewValue = $this->Citycode->CurrentValue;
            $this->Citycode->ViewValue = FormatNumber($this->Citycode->ViewValue, 0, -2, -2, -2);
            $this->Citycode->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Tngstnumber
            $this->Tngstnumber->ViewValue = $this->Tngstnumber->CurrentValue;
            $this->Tngstnumber->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // Email
            $this->_Email->ViewValue = $this->_Email->CurrentValue;
            $this->_Email->ViewCustomAttributes = "";

            // Paymentmode
            $this->Paymentmode->ViewValue = $this->Paymentmode->CurrentValue;
            $this->Paymentmode->ViewCustomAttributes = "";

            // Contactperson1
            $this->Contactperson1->ViewValue = $this->Contactperson1->CurrentValue;
            $this->Contactperson1->ViewCustomAttributes = "";

            // CP1Address1
            $this->CP1Address1->ViewValue = $this->CP1Address1->CurrentValue;
            $this->CP1Address1->ViewCustomAttributes = "";

            // CP1Address2
            $this->CP1Address2->ViewValue = $this->CP1Address2->CurrentValue;
            $this->CP1Address2->ViewCustomAttributes = "";

            // CP1Address3
            $this->CP1Address3->ViewValue = $this->CP1Address3->CurrentValue;
            $this->CP1Address3->ViewCustomAttributes = "";

            // CP1Citycode
            $this->CP1Citycode->ViewValue = $this->CP1Citycode->CurrentValue;
            $this->CP1Citycode->ViewValue = FormatNumber($this->CP1Citycode->ViewValue, 0, -2, -2, -2);
            $this->CP1Citycode->ViewCustomAttributes = "";

            // CP1State
            $this->CP1State->ViewValue = $this->CP1State->CurrentValue;
            $this->CP1State->ViewCustomAttributes = "";

            // CP1Pincode
            $this->CP1Pincode->ViewValue = $this->CP1Pincode->CurrentValue;
            $this->CP1Pincode->ViewCustomAttributes = "";

            // CP1Designation
            $this->CP1Designation->ViewValue = $this->CP1Designation->CurrentValue;
            $this->CP1Designation->ViewCustomAttributes = "";

            // CP1Phone
            $this->CP1Phone->ViewValue = $this->CP1Phone->CurrentValue;
            $this->CP1Phone->ViewCustomAttributes = "";

            // CP1MobileNo
            $this->CP1MobileNo->ViewValue = $this->CP1MobileNo->CurrentValue;
            $this->CP1MobileNo->ViewCustomAttributes = "";

            // CP1Fax
            $this->CP1Fax->ViewValue = $this->CP1Fax->CurrentValue;
            $this->CP1Fax->ViewCustomAttributes = "";

            // CP1Email
            $this->CP1Email->ViewValue = $this->CP1Email->CurrentValue;
            $this->CP1Email->ViewCustomAttributes = "";

            // Contactperson2
            $this->Contactperson2->ViewValue = $this->Contactperson2->CurrentValue;
            $this->Contactperson2->ViewCustomAttributes = "";

            // CP2Address1
            $this->CP2Address1->ViewValue = $this->CP2Address1->CurrentValue;
            $this->CP2Address1->ViewCustomAttributes = "";

            // CP2Address2
            $this->CP2Address2->ViewValue = $this->CP2Address2->CurrentValue;
            $this->CP2Address2->ViewCustomAttributes = "";

            // CP2Address3
            $this->CP2Address3->ViewValue = $this->CP2Address3->CurrentValue;
            $this->CP2Address3->ViewCustomAttributes = "";

            // CP2Citycode
            $this->CP2Citycode->ViewValue = $this->CP2Citycode->CurrentValue;
            $this->CP2Citycode->ViewValue = FormatNumber($this->CP2Citycode->ViewValue, 0, -2, -2, -2);
            $this->CP2Citycode->ViewCustomAttributes = "";

            // CP2State
            $this->CP2State->ViewValue = $this->CP2State->CurrentValue;
            $this->CP2State->ViewCustomAttributes = "";

            // CP2Pincode
            $this->CP2Pincode->ViewValue = $this->CP2Pincode->CurrentValue;
            $this->CP2Pincode->ViewCustomAttributes = "";

            // CP2Designation
            $this->CP2Designation->ViewValue = $this->CP2Designation->CurrentValue;
            $this->CP2Designation->ViewCustomAttributes = "";

            // CP2Phone
            $this->CP2Phone->ViewValue = $this->CP2Phone->CurrentValue;
            $this->CP2Phone->ViewCustomAttributes = "";

            // CP2MobileNo
            $this->CP2MobileNo->ViewValue = $this->CP2MobileNo->CurrentValue;
            $this->CP2MobileNo->ViewCustomAttributes = "";

            // CP2Fax
            $this->CP2Fax->ViewValue = $this->CP2Fax->CurrentValue;
            $this->CP2Fax->ViewCustomAttributes = "";

            // CP2Email
            $this->CP2Email->ViewValue = $this->CP2Email->CurrentValue;
            $this->CP2Email->ViewCustomAttributes = "";

            // Type
            $this->Type->ViewValue = $this->Type->CurrentValue;
            $this->Type->ViewCustomAttributes = "";

            // Creditterms
            $this->Creditterms->ViewValue = $this->Creditterms->CurrentValue;
            $this->Creditterms->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // Tinnumber
            $this->Tinnumber->ViewValue = $this->Tinnumber->CurrentValue;
            $this->Tinnumber->ViewCustomAttributes = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->ViewValue = $this->Universalsuppliercode->CurrentValue;
            $this->Universalsuppliercode->ViewCustomAttributes = "";

            // Mobilenumber
            $this->Mobilenumber->ViewValue = $this->Mobilenumber->CurrentValue;
            $this->Mobilenumber->ViewCustomAttributes = "";

            // PANNumber
            $this->PANNumber->ViewValue = $this->PANNumber->CurrentValue;
            $this->PANNumber->ViewCustomAttributes = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->ViewValue = $this->SalesRepMobileNo->CurrentValue;
            $this->SalesRepMobileNo->ViewCustomAttributes = "";

            // GSTNumber
            $this->GSTNumber->ViewValue = $this->GSTNumber->CurrentValue;
            $this->GSTNumber->ViewCustomAttributes = "";

            // TANNumber
            $this->TANNumber->ViewValue = $this->TANNumber->CurrentValue;
            $this->TANNumber->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // BranchID
            $this->BranchID->ViewValue = $this->BranchID->CurrentValue;
            $this->BranchID->ViewValue = FormatNumber($this->BranchID->ViewValue, 0, -2, -2, -2);
            $this->BranchID->ViewCustomAttributes = "";

            // StoreID
            $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
            $this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
            $this->StoreID->ViewCustomAttributes = "";

            // Suppliercode
            $this->Suppliercode->LinkCustomAttributes = "";
            $this->Suppliercode->HrefValue = "";
            $this->Suppliercode->TooltipValue = "";

            // Suppliername
            $this->Suppliername->LinkCustomAttributes = "";
            $this->Suppliername->HrefValue = "";
            $this->Suppliername->TooltipValue = "";

            // Abbreviation
            $this->Abbreviation->LinkCustomAttributes = "";
            $this->Abbreviation->HrefValue = "";
            $this->Abbreviation->TooltipValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";
            $this->Creationdate->TooltipValue = "";

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

            // Citycode
            $this->Citycode->LinkCustomAttributes = "";
            $this->Citycode->HrefValue = "";
            $this->Citycode->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Tngstnumber
            $this->Tngstnumber->LinkCustomAttributes = "";
            $this->Tngstnumber->HrefValue = "";
            $this->Tngstnumber->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";
            $this->Fax->TooltipValue = "";

            // Email
            $this->_Email->LinkCustomAttributes = "";
            $this->_Email->HrefValue = "";
            $this->_Email->TooltipValue = "";

            // Paymentmode
            $this->Paymentmode->LinkCustomAttributes = "";
            $this->Paymentmode->HrefValue = "";
            $this->Paymentmode->TooltipValue = "";

            // Contactperson1
            $this->Contactperson1->LinkCustomAttributes = "";
            $this->Contactperson1->HrefValue = "";
            $this->Contactperson1->TooltipValue = "";

            // CP1Address1
            $this->CP1Address1->LinkCustomAttributes = "";
            $this->CP1Address1->HrefValue = "";
            $this->CP1Address1->TooltipValue = "";

            // CP1Address2
            $this->CP1Address2->LinkCustomAttributes = "";
            $this->CP1Address2->HrefValue = "";
            $this->CP1Address2->TooltipValue = "";

            // CP1Address3
            $this->CP1Address3->LinkCustomAttributes = "";
            $this->CP1Address3->HrefValue = "";
            $this->CP1Address3->TooltipValue = "";

            // CP1Citycode
            $this->CP1Citycode->LinkCustomAttributes = "";
            $this->CP1Citycode->HrefValue = "";
            $this->CP1Citycode->TooltipValue = "";

            // CP1State
            $this->CP1State->LinkCustomAttributes = "";
            $this->CP1State->HrefValue = "";
            $this->CP1State->TooltipValue = "";

            // CP1Pincode
            $this->CP1Pincode->LinkCustomAttributes = "";
            $this->CP1Pincode->HrefValue = "";
            $this->CP1Pincode->TooltipValue = "";

            // CP1Designation
            $this->CP1Designation->LinkCustomAttributes = "";
            $this->CP1Designation->HrefValue = "";
            $this->CP1Designation->TooltipValue = "";

            // CP1Phone
            $this->CP1Phone->LinkCustomAttributes = "";
            $this->CP1Phone->HrefValue = "";
            $this->CP1Phone->TooltipValue = "";

            // CP1MobileNo
            $this->CP1MobileNo->LinkCustomAttributes = "";
            $this->CP1MobileNo->HrefValue = "";
            $this->CP1MobileNo->TooltipValue = "";

            // CP1Fax
            $this->CP1Fax->LinkCustomAttributes = "";
            $this->CP1Fax->HrefValue = "";
            $this->CP1Fax->TooltipValue = "";

            // CP1Email
            $this->CP1Email->LinkCustomAttributes = "";
            $this->CP1Email->HrefValue = "";
            $this->CP1Email->TooltipValue = "";

            // Contactperson2
            $this->Contactperson2->LinkCustomAttributes = "";
            $this->Contactperson2->HrefValue = "";
            $this->Contactperson2->TooltipValue = "";

            // CP2Address1
            $this->CP2Address1->LinkCustomAttributes = "";
            $this->CP2Address1->HrefValue = "";
            $this->CP2Address1->TooltipValue = "";

            // CP2Address2
            $this->CP2Address2->LinkCustomAttributes = "";
            $this->CP2Address2->HrefValue = "";
            $this->CP2Address2->TooltipValue = "";

            // CP2Address3
            $this->CP2Address3->LinkCustomAttributes = "";
            $this->CP2Address3->HrefValue = "";
            $this->CP2Address3->TooltipValue = "";

            // CP2Citycode
            $this->CP2Citycode->LinkCustomAttributes = "";
            $this->CP2Citycode->HrefValue = "";
            $this->CP2Citycode->TooltipValue = "";

            // CP2State
            $this->CP2State->LinkCustomAttributes = "";
            $this->CP2State->HrefValue = "";
            $this->CP2State->TooltipValue = "";

            // CP2Pincode
            $this->CP2Pincode->LinkCustomAttributes = "";
            $this->CP2Pincode->HrefValue = "";
            $this->CP2Pincode->TooltipValue = "";

            // CP2Designation
            $this->CP2Designation->LinkCustomAttributes = "";
            $this->CP2Designation->HrefValue = "";
            $this->CP2Designation->TooltipValue = "";

            // CP2Phone
            $this->CP2Phone->LinkCustomAttributes = "";
            $this->CP2Phone->HrefValue = "";
            $this->CP2Phone->TooltipValue = "";

            // CP2MobileNo
            $this->CP2MobileNo->LinkCustomAttributes = "";
            $this->CP2MobileNo->HrefValue = "";
            $this->CP2MobileNo->TooltipValue = "";

            // CP2Fax
            $this->CP2Fax->LinkCustomAttributes = "";
            $this->CP2Fax->HrefValue = "";
            $this->CP2Fax->TooltipValue = "";

            // CP2Email
            $this->CP2Email->LinkCustomAttributes = "";
            $this->CP2Email->HrefValue = "";
            $this->CP2Email->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // Creditterms
            $this->Creditterms->LinkCustomAttributes = "";
            $this->Creditterms->HrefValue = "";
            $this->Creditterms->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // Tinnumber
            $this->Tinnumber->LinkCustomAttributes = "";
            $this->Tinnumber->HrefValue = "";
            $this->Tinnumber->TooltipValue = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->LinkCustomAttributes = "";
            $this->Universalsuppliercode->HrefValue = "";
            $this->Universalsuppliercode->TooltipValue = "";

            // Mobilenumber
            $this->Mobilenumber->LinkCustomAttributes = "";
            $this->Mobilenumber->HrefValue = "";
            $this->Mobilenumber->TooltipValue = "";

            // PANNumber
            $this->PANNumber->LinkCustomAttributes = "";
            $this->PANNumber->HrefValue = "";
            $this->PANNumber->TooltipValue = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->LinkCustomAttributes = "";
            $this->SalesRepMobileNo->HrefValue = "";
            $this->SalesRepMobileNo->TooltipValue = "";

            // GSTNumber
            $this->GSTNumber->LinkCustomAttributes = "";
            $this->GSTNumber->HrefValue = "";
            $this->GSTNumber->TooltipValue = "";

            // TANNumber
            $this->TANNumber->LinkCustomAttributes = "";
            $this->TANNumber->HrefValue = "";
            $this->TANNumber->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";
            $this->BranchID->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Suppliercode
            $this->Suppliercode->EditAttrs["class"] = "form-control";
            $this->Suppliercode->EditCustomAttributes = "";
            if (!$this->Suppliercode->Raw) {
                $this->Suppliercode->CurrentValue = HtmlDecode($this->Suppliercode->CurrentValue);
            }
            $this->Suppliercode->EditValue = HtmlEncode($this->Suppliercode->CurrentValue);
            $this->Suppliercode->PlaceHolder = RemoveHtml($this->Suppliercode->caption());

            // Suppliername
            $this->Suppliername->EditAttrs["class"] = "form-control";
            $this->Suppliername->EditCustomAttributes = "";
            if (!$this->Suppliername->Raw) {
                $this->Suppliername->CurrentValue = HtmlDecode($this->Suppliername->CurrentValue);
            }
            $this->Suppliername->EditValue = HtmlEncode($this->Suppliername->CurrentValue);
            $this->Suppliername->PlaceHolder = RemoveHtml($this->Suppliername->caption());

            // Abbreviation
            $this->Abbreviation->EditAttrs["class"] = "form-control";
            $this->Abbreviation->EditCustomAttributes = "";
            if (!$this->Abbreviation->Raw) {
                $this->Abbreviation->CurrentValue = HtmlDecode($this->Abbreviation->CurrentValue);
            }
            $this->Abbreviation->EditValue = HtmlEncode($this->Abbreviation->CurrentValue);
            $this->Abbreviation->PlaceHolder = RemoveHtml($this->Abbreviation->caption());

            // Creationdate
            $this->Creationdate->EditAttrs["class"] = "form-control";
            $this->Creationdate->EditCustomAttributes = "";
            $this->Creationdate->EditValue = HtmlEncode(FormatDateTime($this->Creationdate->CurrentValue, 8));
            $this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

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

            // Citycode
            $this->Citycode->EditAttrs["class"] = "form-control";
            $this->Citycode->EditCustomAttributes = "";
            $this->Citycode->EditValue = HtmlEncode($this->Citycode->CurrentValue);
            $this->Citycode->PlaceHolder = RemoveHtml($this->Citycode->caption());

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

            // Tngstnumber
            $this->Tngstnumber->EditAttrs["class"] = "form-control";
            $this->Tngstnumber->EditCustomAttributes = "";
            if (!$this->Tngstnumber->Raw) {
                $this->Tngstnumber->CurrentValue = HtmlDecode($this->Tngstnumber->CurrentValue);
            }
            $this->Tngstnumber->EditValue = HtmlEncode($this->Tngstnumber->CurrentValue);
            $this->Tngstnumber->PlaceHolder = RemoveHtml($this->Tngstnumber->caption());

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

            // Email
            $this->_Email->EditAttrs["class"] = "form-control";
            $this->_Email->EditCustomAttributes = "";
            if (!$this->_Email->Raw) {
                $this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
            }
            $this->_Email->EditValue = HtmlEncode($this->_Email->CurrentValue);
            $this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

            // Paymentmode
            $this->Paymentmode->EditAttrs["class"] = "form-control";
            $this->Paymentmode->EditCustomAttributes = "";
            if (!$this->Paymentmode->Raw) {
                $this->Paymentmode->CurrentValue = HtmlDecode($this->Paymentmode->CurrentValue);
            }
            $this->Paymentmode->EditValue = HtmlEncode($this->Paymentmode->CurrentValue);
            $this->Paymentmode->PlaceHolder = RemoveHtml($this->Paymentmode->caption());

            // Contactperson1
            $this->Contactperson1->EditAttrs["class"] = "form-control";
            $this->Contactperson1->EditCustomAttributes = "";
            if (!$this->Contactperson1->Raw) {
                $this->Contactperson1->CurrentValue = HtmlDecode($this->Contactperson1->CurrentValue);
            }
            $this->Contactperson1->EditValue = HtmlEncode($this->Contactperson1->CurrentValue);
            $this->Contactperson1->PlaceHolder = RemoveHtml($this->Contactperson1->caption());

            // CP1Address1
            $this->CP1Address1->EditAttrs["class"] = "form-control";
            $this->CP1Address1->EditCustomAttributes = "";
            if (!$this->CP1Address1->Raw) {
                $this->CP1Address1->CurrentValue = HtmlDecode($this->CP1Address1->CurrentValue);
            }
            $this->CP1Address1->EditValue = HtmlEncode($this->CP1Address1->CurrentValue);
            $this->CP1Address1->PlaceHolder = RemoveHtml($this->CP1Address1->caption());

            // CP1Address2
            $this->CP1Address2->EditAttrs["class"] = "form-control";
            $this->CP1Address2->EditCustomAttributes = "";
            if (!$this->CP1Address2->Raw) {
                $this->CP1Address2->CurrentValue = HtmlDecode($this->CP1Address2->CurrentValue);
            }
            $this->CP1Address2->EditValue = HtmlEncode($this->CP1Address2->CurrentValue);
            $this->CP1Address2->PlaceHolder = RemoveHtml($this->CP1Address2->caption());

            // CP1Address3
            $this->CP1Address3->EditAttrs["class"] = "form-control";
            $this->CP1Address3->EditCustomAttributes = "";
            if (!$this->CP1Address3->Raw) {
                $this->CP1Address3->CurrentValue = HtmlDecode($this->CP1Address3->CurrentValue);
            }
            $this->CP1Address3->EditValue = HtmlEncode($this->CP1Address3->CurrentValue);
            $this->CP1Address3->PlaceHolder = RemoveHtml($this->CP1Address3->caption());

            // CP1Citycode
            $this->CP1Citycode->EditAttrs["class"] = "form-control";
            $this->CP1Citycode->EditCustomAttributes = "";
            $this->CP1Citycode->EditValue = HtmlEncode($this->CP1Citycode->CurrentValue);
            $this->CP1Citycode->PlaceHolder = RemoveHtml($this->CP1Citycode->caption());

            // CP1State
            $this->CP1State->EditAttrs["class"] = "form-control";
            $this->CP1State->EditCustomAttributes = "";
            if (!$this->CP1State->Raw) {
                $this->CP1State->CurrentValue = HtmlDecode($this->CP1State->CurrentValue);
            }
            $this->CP1State->EditValue = HtmlEncode($this->CP1State->CurrentValue);
            $this->CP1State->PlaceHolder = RemoveHtml($this->CP1State->caption());

            // CP1Pincode
            $this->CP1Pincode->EditAttrs["class"] = "form-control";
            $this->CP1Pincode->EditCustomAttributes = "";
            if (!$this->CP1Pincode->Raw) {
                $this->CP1Pincode->CurrentValue = HtmlDecode($this->CP1Pincode->CurrentValue);
            }
            $this->CP1Pincode->EditValue = HtmlEncode($this->CP1Pincode->CurrentValue);
            $this->CP1Pincode->PlaceHolder = RemoveHtml($this->CP1Pincode->caption());

            // CP1Designation
            $this->CP1Designation->EditAttrs["class"] = "form-control";
            $this->CP1Designation->EditCustomAttributes = "";
            if (!$this->CP1Designation->Raw) {
                $this->CP1Designation->CurrentValue = HtmlDecode($this->CP1Designation->CurrentValue);
            }
            $this->CP1Designation->EditValue = HtmlEncode($this->CP1Designation->CurrentValue);
            $this->CP1Designation->PlaceHolder = RemoveHtml($this->CP1Designation->caption());

            // CP1Phone
            $this->CP1Phone->EditAttrs["class"] = "form-control";
            $this->CP1Phone->EditCustomAttributes = "";
            if (!$this->CP1Phone->Raw) {
                $this->CP1Phone->CurrentValue = HtmlDecode($this->CP1Phone->CurrentValue);
            }
            $this->CP1Phone->EditValue = HtmlEncode($this->CP1Phone->CurrentValue);
            $this->CP1Phone->PlaceHolder = RemoveHtml($this->CP1Phone->caption());

            // CP1MobileNo
            $this->CP1MobileNo->EditAttrs["class"] = "form-control";
            $this->CP1MobileNo->EditCustomAttributes = "";
            if (!$this->CP1MobileNo->Raw) {
                $this->CP1MobileNo->CurrentValue = HtmlDecode($this->CP1MobileNo->CurrentValue);
            }
            $this->CP1MobileNo->EditValue = HtmlEncode($this->CP1MobileNo->CurrentValue);
            $this->CP1MobileNo->PlaceHolder = RemoveHtml($this->CP1MobileNo->caption());

            // CP1Fax
            $this->CP1Fax->EditAttrs["class"] = "form-control";
            $this->CP1Fax->EditCustomAttributes = "";
            if (!$this->CP1Fax->Raw) {
                $this->CP1Fax->CurrentValue = HtmlDecode($this->CP1Fax->CurrentValue);
            }
            $this->CP1Fax->EditValue = HtmlEncode($this->CP1Fax->CurrentValue);
            $this->CP1Fax->PlaceHolder = RemoveHtml($this->CP1Fax->caption());

            // CP1Email
            $this->CP1Email->EditAttrs["class"] = "form-control";
            $this->CP1Email->EditCustomAttributes = "";
            if (!$this->CP1Email->Raw) {
                $this->CP1Email->CurrentValue = HtmlDecode($this->CP1Email->CurrentValue);
            }
            $this->CP1Email->EditValue = HtmlEncode($this->CP1Email->CurrentValue);
            $this->CP1Email->PlaceHolder = RemoveHtml($this->CP1Email->caption());

            // Contactperson2
            $this->Contactperson2->EditAttrs["class"] = "form-control";
            $this->Contactperson2->EditCustomAttributes = "";
            if (!$this->Contactperson2->Raw) {
                $this->Contactperson2->CurrentValue = HtmlDecode($this->Contactperson2->CurrentValue);
            }
            $this->Contactperson2->EditValue = HtmlEncode($this->Contactperson2->CurrentValue);
            $this->Contactperson2->PlaceHolder = RemoveHtml($this->Contactperson2->caption());

            // CP2Address1
            $this->CP2Address1->EditAttrs["class"] = "form-control";
            $this->CP2Address1->EditCustomAttributes = "";
            if (!$this->CP2Address1->Raw) {
                $this->CP2Address1->CurrentValue = HtmlDecode($this->CP2Address1->CurrentValue);
            }
            $this->CP2Address1->EditValue = HtmlEncode($this->CP2Address1->CurrentValue);
            $this->CP2Address1->PlaceHolder = RemoveHtml($this->CP2Address1->caption());

            // CP2Address2
            $this->CP2Address2->EditAttrs["class"] = "form-control";
            $this->CP2Address2->EditCustomAttributes = "";
            if (!$this->CP2Address2->Raw) {
                $this->CP2Address2->CurrentValue = HtmlDecode($this->CP2Address2->CurrentValue);
            }
            $this->CP2Address2->EditValue = HtmlEncode($this->CP2Address2->CurrentValue);
            $this->CP2Address2->PlaceHolder = RemoveHtml($this->CP2Address2->caption());

            // CP2Address3
            $this->CP2Address3->EditAttrs["class"] = "form-control";
            $this->CP2Address3->EditCustomAttributes = "";
            if (!$this->CP2Address3->Raw) {
                $this->CP2Address3->CurrentValue = HtmlDecode($this->CP2Address3->CurrentValue);
            }
            $this->CP2Address3->EditValue = HtmlEncode($this->CP2Address3->CurrentValue);
            $this->CP2Address3->PlaceHolder = RemoveHtml($this->CP2Address3->caption());

            // CP2Citycode
            $this->CP2Citycode->EditAttrs["class"] = "form-control";
            $this->CP2Citycode->EditCustomAttributes = "";
            $this->CP2Citycode->EditValue = HtmlEncode($this->CP2Citycode->CurrentValue);
            $this->CP2Citycode->PlaceHolder = RemoveHtml($this->CP2Citycode->caption());

            // CP2State
            $this->CP2State->EditAttrs["class"] = "form-control";
            $this->CP2State->EditCustomAttributes = "";
            if (!$this->CP2State->Raw) {
                $this->CP2State->CurrentValue = HtmlDecode($this->CP2State->CurrentValue);
            }
            $this->CP2State->EditValue = HtmlEncode($this->CP2State->CurrentValue);
            $this->CP2State->PlaceHolder = RemoveHtml($this->CP2State->caption());

            // CP2Pincode
            $this->CP2Pincode->EditAttrs["class"] = "form-control";
            $this->CP2Pincode->EditCustomAttributes = "";
            if (!$this->CP2Pincode->Raw) {
                $this->CP2Pincode->CurrentValue = HtmlDecode($this->CP2Pincode->CurrentValue);
            }
            $this->CP2Pincode->EditValue = HtmlEncode($this->CP2Pincode->CurrentValue);
            $this->CP2Pincode->PlaceHolder = RemoveHtml($this->CP2Pincode->caption());

            // CP2Designation
            $this->CP2Designation->EditAttrs["class"] = "form-control";
            $this->CP2Designation->EditCustomAttributes = "";
            if (!$this->CP2Designation->Raw) {
                $this->CP2Designation->CurrentValue = HtmlDecode($this->CP2Designation->CurrentValue);
            }
            $this->CP2Designation->EditValue = HtmlEncode($this->CP2Designation->CurrentValue);
            $this->CP2Designation->PlaceHolder = RemoveHtml($this->CP2Designation->caption());

            // CP2Phone
            $this->CP2Phone->EditAttrs["class"] = "form-control";
            $this->CP2Phone->EditCustomAttributes = "";
            if (!$this->CP2Phone->Raw) {
                $this->CP2Phone->CurrentValue = HtmlDecode($this->CP2Phone->CurrentValue);
            }
            $this->CP2Phone->EditValue = HtmlEncode($this->CP2Phone->CurrentValue);
            $this->CP2Phone->PlaceHolder = RemoveHtml($this->CP2Phone->caption());

            // CP2MobileNo
            $this->CP2MobileNo->EditAttrs["class"] = "form-control";
            $this->CP2MobileNo->EditCustomAttributes = "";
            if (!$this->CP2MobileNo->Raw) {
                $this->CP2MobileNo->CurrentValue = HtmlDecode($this->CP2MobileNo->CurrentValue);
            }
            $this->CP2MobileNo->EditValue = HtmlEncode($this->CP2MobileNo->CurrentValue);
            $this->CP2MobileNo->PlaceHolder = RemoveHtml($this->CP2MobileNo->caption());

            // CP2Fax
            $this->CP2Fax->EditAttrs["class"] = "form-control";
            $this->CP2Fax->EditCustomAttributes = "";
            if (!$this->CP2Fax->Raw) {
                $this->CP2Fax->CurrentValue = HtmlDecode($this->CP2Fax->CurrentValue);
            }
            $this->CP2Fax->EditValue = HtmlEncode($this->CP2Fax->CurrentValue);
            $this->CP2Fax->PlaceHolder = RemoveHtml($this->CP2Fax->caption());

            // CP2Email
            $this->CP2Email->EditAttrs["class"] = "form-control";
            $this->CP2Email->EditCustomAttributes = "";
            if (!$this->CP2Email->Raw) {
                $this->CP2Email->CurrentValue = HtmlDecode($this->CP2Email->CurrentValue);
            }
            $this->CP2Email->EditValue = HtmlEncode($this->CP2Email->CurrentValue);
            $this->CP2Email->PlaceHolder = RemoveHtml($this->CP2Email->caption());

            // Type
            $this->Type->EditAttrs["class"] = "form-control";
            $this->Type->EditCustomAttributes = "";
            if (!$this->Type->Raw) {
                $this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
            }
            $this->Type->EditValue = HtmlEncode($this->Type->CurrentValue);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

            // Creditterms
            $this->Creditterms->EditAttrs["class"] = "form-control";
            $this->Creditterms->EditCustomAttributes = "";
            if (!$this->Creditterms->Raw) {
                $this->Creditterms->CurrentValue = HtmlDecode($this->Creditterms->CurrentValue);
            }
            $this->Creditterms->EditValue = HtmlEncode($this->Creditterms->CurrentValue);
            $this->Creditterms->PlaceHolder = RemoveHtml($this->Creditterms->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // Tinnumber
            $this->Tinnumber->EditAttrs["class"] = "form-control";
            $this->Tinnumber->EditCustomAttributes = "";
            if (!$this->Tinnumber->Raw) {
                $this->Tinnumber->CurrentValue = HtmlDecode($this->Tinnumber->CurrentValue);
            }
            $this->Tinnumber->EditValue = HtmlEncode($this->Tinnumber->CurrentValue);
            $this->Tinnumber->PlaceHolder = RemoveHtml($this->Tinnumber->caption());

            // Universalsuppliercode
            $this->Universalsuppliercode->EditAttrs["class"] = "form-control";
            $this->Universalsuppliercode->EditCustomAttributes = "";
            if (!$this->Universalsuppliercode->Raw) {
                $this->Universalsuppliercode->CurrentValue = HtmlDecode($this->Universalsuppliercode->CurrentValue);
            }
            $this->Universalsuppliercode->EditValue = HtmlEncode($this->Universalsuppliercode->CurrentValue);
            $this->Universalsuppliercode->PlaceHolder = RemoveHtml($this->Universalsuppliercode->caption());

            // Mobilenumber
            $this->Mobilenumber->EditAttrs["class"] = "form-control";
            $this->Mobilenumber->EditCustomAttributes = "";
            if (!$this->Mobilenumber->Raw) {
                $this->Mobilenumber->CurrentValue = HtmlDecode($this->Mobilenumber->CurrentValue);
            }
            $this->Mobilenumber->EditValue = HtmlEncode($this->Mobilenumber->CurrentValue);
            $this->Mobilenumber->PlaceHolder = RemoveHtml($this->Mobilenumber->caption());

            // PANNumber
            $this->PANNumber->EditAttrs["class"] = "form-control";
            $this->PANNumber->EditCustomAttributes = "";
            if (!$this->PANNumber->Raw) {
                $this->PANNumber->CurrentValue = HtmlDecode($this->PANNumber->CurrentValue);
            }
            $this->PANNumber->EditValue = HtmlEncode($this->PANNumber->CurrentValue);
            $this->PANNumber->PlaceHolder = RemoveHtml($this->PANNumber->caption());

            // SalesRepMobileNo
            $this->SalesRepMobileNo->EditAttrs["class"] = "form-control";
            $this->SalesRepMobileNo->EditCustomAttributes = "";
            if (!$this->SalesRepMobileNo->Raw) {
                $this->SalesRepMobileNo->CurrentValue = HtmlDecode($this->SalesRepMobileNo->CurrentValue);
            }
            $this->SalesRepMobileNo->EditValue = HtmlEncode($this->SalesRepMobileNo->CurrentValue);
            $this->SalesRepMobileNo->PlaceHolder = RemoveHtml($this->SalesRepMobileNo->caption());

            // GSTNumber
            $this->GSTNumber->EditAttrs["class"] = "form-control";
            $this->GSTNumber->EditCustomAttributes = "";
            if (!$this->GSTNumber->Raw) {
                $this->GSTNumber->CurrentValue = HtmlDecode($this->GSTNumber->CurrentValue);
            }
            $this->GSTNumber->EditValue = HtmlEncode($this->GSTNumber->CurrentValue);
            $this->GSTNumber->PlaceHolder = RemoveHtml($this->GSTNumber->caption());

            // TANNumber
            $this->TANNumber->EditAttrs["class"] = "form-control";
            $this->TANNumber->EditCustomAttributes = "";
            if (!$this->TANNumber->Raw) {
                $this->TANNumber->CurrentValue = HtmlDecode($this->TANNumber->CurrentValue);
            }
            $this->TANNumber->EditValue = HtmlEncode($this->TANNumber->CurrentValue);
            $this->TANNumber->PlaceHolder = RemoveHtml($this->TANNumber->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // BranchID
            $this->BranchID->EditAttrs["class"] = "form-control";
            $this->BranchID->EditCustomAttributes = "";
            $this->BranchID->EditValue = HtmlEncode($this->BranchID->CurrentValue);
            $this->BranchID->PlaceHolder = RemoveHtml($this->BranchID->caption());

            // StoreID
            $this->StoreID->EditAttrs["class"] = "form-control";
            $this->StoreID->EditCustomAttributes = "";
            $this->StoreID->EditValue = HtmlEncode($this->StoreID->CurrentValue);
            $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

            // Add refer script

            // Suppliercode
            $this->Suppliercode->LinkCustomAttributes = "";
            $this->Suppliercode->HrefValue = "";

            // Suppliername
            $this->Suppliername->LinkCustomAttributes = "";
            $this->Suppliername->HrefValue = "";

            // Abbreviation
            $this->Abbreviation->LinkCustomAttributes = "";
            $this->Abbreviation->HrefValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";

            // Citycode
            $this->Citycode->LinkCustomAttributes = "";
            $this->Citycode->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Tngstnumber
            $this->Tngstnumber->LinkCustomAttributes = "";
            $this->Tngstnumber->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";

            // Email
            $this->_Email->LinkCustomAttributes = "";
            $this->_Email->HrefValue = "";

            // Paymentmode
            $this->Paymentmode->LinkCustomAttributes = "";
            $this->Paymentmode->HrefValue = "";

            // Contactperson1
            $this->Contactperson1->LinkCustomAttributes = "";
            $this->Contactperson1->HrefValue = "";

            // CP1Address1
            $this->CP1Address1->LinkCustomAttributes = "";
            $this->CP1Address1->HrefValue = "";

            // CP1Address2
            $this->CP1Address2->LinkCustomAttributes = "";
            $this->CP1Address2->HrefValue = "";

            // CP1Address3
            $this->CP1Address3->LinkCustomAttributes = "";
            $this->CP1Address3->HrefValue = "";

            // CP1Citycode
            $this->CP1Citycode->LinkCustomAttributes = "";
            $this->CP1Citycode->HrefValue = "";

            // CP1State
            $this->CP1State->LinkCustomAttributes = "";
            $this->CP1State->HrefValue = "";

            // CP1Pincode
            $this->CP1Pincode->LinkCustomAttributes = "";
            $this->CP1Pincode->HrefValue = "";

            // CP1Designation
            $this->CP1Designation->LinkCustomAttributes = "";
            $this->CP1Designation->HrefValue = "";

            // CP1Phone
            $this->CP1Phone->LinkCustomAttributes = "";
            $this->CP1Phone->HrefValue = "";

            // CP1MobileNo
            $this->CP1MobileNo->LinkCustomAttributes = "";
            $this->CP1MobileNo->HrefValue = "";

            // CP1Fax
            $this->CP1Fax->LinkCustomAttributes = "";
            $this->CP1Fax->HrefValue = "";

            // CP1Email
            $this->CP1Email->LinkCustomAttributes = "";
            $this->CP1Email->HrefValue = "";

            // Contactperson2
            $this->Contactperson2->LinkCustomAttributes = "";
            $this->Contactperson2->HrefValue = "";

            // CP2Address1
            $this->CP2Address1->LinkCustomAttributes = "";
            $this->CP2Address1->HrefValue = "";

            // CP2Address2
            $this->CP2Address2->LinkCustomAttributes = "";
            $this->CP2Address2->HrefValue = "";

            // CP2Address3
            $this->CP2Address3->LinkCustomAttributes = "";
            $this->CP2Address3->HrefValue = "";

            // CP2Citycode
            $this->CP2Citycode->LinkCustomAttributes = "";
            $this->CP2Citycode->HrefValue = "";

            // CP2State
            $this->CP2State->LinkCustomAttributes = "";
            $this->CP2State->HrefValue = "";

            // CP2Pincode
            $this->CP2Pincode->LinkCustomAttributes = "";
            $this->CP2Pincode->HrefValue = "";

            // CP2Designation
            $this->CP2Designation->LinkCustomAttributes = "";
            $this->CP2Designation->HrefValue = "";

            // CP2Phone
            $this->CP2Phone->LinkCustomAttributes = "";
            $this->CP2Phone->HrefValue = "";

            // CP2MobileNo
            $this->CP2MobileNo->LinkCustomAttributes = "";
            $this->CP2MobileNo->HrefValue = "";

            // CP2Fax
            $this->CP2Fax->LinkCustomAttributes = "";
            $this->CP2Fax->HrefValue = "";

            // CP2Email
            $this->CP2Email->LinkCustomAttributes = "";
            $this->CP2Email->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // Creditterms
            $this->Creditterms->LinkCustomAttributes = "";
            $this->Creditterms->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // Tinnumber
            $this->Tinnumber->LinkCustomAttributes = "";
            $this->Tinnumber->HrefValue = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->LinkCustomAttributes = "";
            $this->Universalsuppliercode->HrefValue = "";

            // Mobilenumber
            $this->Mobilenumber->LinkCustomAttributes = "";
            $this->Mobilenumber->HrefValue = "";

            // PANNumber
            $this->PANNumber->LinkCustomAttributes = "";
            $this->PANNumber->HrefValue = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->LinkCustomAttributes = "";
            $this->SalesRepMobileNo->HrefValue = "";

            // GSTNumber
            $this->GSTNumber->LinkCustomAttributes = "";
            $this->GSTNumber->HrefValue = "";

            // TANNumber
            $this->TANNumber->LinkCustomAttributes = "";
            $this->TANNumber->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
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
        if ($this->Suppliercode->Required) {
            if (!$this->Suppliercode->IsDetailKey && EmptyValue($this->Suppliercode->FormValue)) {
                $this->Suppliercode->addErrorMessage(str_replace("%s", $this->Suppliercode->caption(), $this->Suppliercode->RequiredErrorMessage));
            }
        }
        if ($this->Suppliername->Required) {
            if (!$this->Suppliername->IsDetailKey && EmptyValue($this->Suppliername->FormValue)) {
                $this->Suppliername->addErrorMessage(str_replace("%s", $this->Suppliername->caption(), $this->Suppliername->RequiredErrorMessage));
            }
        }
        if ($this->Abbreviation->Required) {
            if (!$this->Abbreviation->IsDetailKey && EmptyValue($this->Abbreviation->FormValue)) {
                $this->Abbreviation->addErrorMessage(str_replace("%s", $this->Abbreviation->caption(), $this->Abbreviation->RequiredErrorMessage));
            }
        }
        if ($this->Creationdate->Required) {
            if (!$this->Creationdate->IsDetailKey && EmptyValue($this->Creationdate->FormValue)) {
                $this->Creationdate->addErrorMessage(str_replace("%s", $this->Creationdate->caption(), $this->Creationdate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Creationdate->FormValue)) {
            $this->Creationdate->addErrorMessage($this->Creationdate->getErrorMessage(false));
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
        if ($this->Citycode->Required) {
            if (!$this->Citycode->IsDetailKey && EmptyValue($this->Citycode->FormValue)) {
                $this->Citycode->addErrorMessage(str_replace("%s", $this->Citycode->caption(), $this->Citycode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Citycode->FormValue)) {
            $this->Citycode->addErrorMessage($this->Citycode->getErrorMessage(false));
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
        if ($this->Tngstnumber->Required) {
            if (!$this->Tngstnumber->IsDetailKey && EmptyValue($this->Tngstnumber->FormValue)) {
                $this->Tngstnumber->addErrorMessage(str_replace("%s", $this->Tngstnumber->caption(), $this->Tngstnumber->RequiredErrorMessage));
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
        if ($this->_Email->Required) {
            if (!$this->_Email->IsDetailKey && EmptyValue($this->_Email->FormValue)) {
                $this->_Email->addErrorMessage(str_replace("%s", $this->_Email->caption(), $this->_Email->RequiredErrorMessage));
            }
        }
        if ($this->Paymentmode->Required) {
            if (!$this->Paymentmode->IsDetailKey && EmptyValue($this->Paymentmode->FormValue)) {
                $this->Paymentmode->addErrorMessage(str_replace("%s", $this->Paymentmode->caption(), $this->Paymentmode->RequiredErrorMessage));
            }
        }
        if ($this->Contactperson1->Required) {
            if (!$this->Contactperson1->IsDetailKey && EmptyValue($this->Contactperson1->FormValue)) {
                $this->Contactperson1->addErrorMessage(str_replace("%s", $this->Contactperson1->caption(), $this->Contactperson1->RequiredErrorMessage));
            }
        }
        if ($this->CP1Address1->Required) {
            if (!$this->CP1Address1->IsDetailKey && EmptyValue($this->CP1Address1->FormValue)) {
                $this->CP1Address1->addErrorMessage(str_replace("%s", $this->CP1Address1->caption(), $this->CP1Address1->RequiredErrorMessage));
            }
        }
        if ($this->CP1Address2->Required) {
            if (!$this->CP1Address2->IsDetailKey && EmptyValue($this->CP1Address2->FormValue)) {
                $this->CP1Address2->addErrorMessage(str_replace("%s", $this->CP1Address2->caption(), $this->CP1Address2->RequiredErrorMessage));
            }
        }
        if ($this->CP1Address3->Required) {
            if (!$this->CP1Address3->IsDetailKey && EmptyValue($this->CP1Address3->FormValue)) {
                $this->CP1Address3->addErrorMessage(str_replace("%s", $this->CP1Address3->caption(), $this->CP1Address3->RequiredErrorMessage));
            }
        }
        if ($this->CP1Citycode->Required) {
            if (!$this->CP1Citycode->IsDetailKey && EmptyValue($this->CP1Citycode->FormValue)) {
                $this->CP1Citycode->addErrorMessage(str_replace("%s", $this->CP1Citycode->caption(), $this->CP1Citycode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CP1Citycode->FormValue)) {
            $this->CP1Citycode->addErrorMessage($this->CP1Citycode->getErrorMessage(false));
        }
        if ($this->CP1State->Required) {
            if (!$this->CP1State->IsDetailKey && EmptyValue($this->CP1State->FormValue)) {
                $this->CP1State->addErrorMessage(str_replace("%s", $this->CP1State->caption(), $this->CP1State->RequiredErrorMessage));
            }
        }
        if ($this->CP1Pincode->Required) {
            if (!$this->CP1Pincode->IsDetailKey && EmptyValue($this->CP1Pincode->FormValue)) {
                $this->CP1Pincode->addErrorMessage(str_replace("%s", $this->CP1Pincode->caption(), $this->CP1Pincode->RequiredErrorMessage));
            }
        }
        if ($this->CP1Designation->Required) {
            if (!$this->CP1Designation->IsDetailKey && EmptyValue($this->CP1Designation->FormValue)) {
                $this->CP1Designation->addErrorMessage(str_replace("%s", $this->CP1Designation->caption(), $this->CP1Designation->RequiredErrorMessage));
            }
        }
        if ($this->CP1Phone->Required) {
            if (!$this->CP1Phone->IsDetailKey && EmptyValue($this->CP1Phone->FormValue)) {
                $this->CP1Phone->addErrorMessage(str_replace("%s", $this->CP1Phone->caption(), $this->CP1Phone->RequiredErrorMessage));
            }
        }
        if ($this->CP1MobileNo->Required) {
            if (!$this->CP1MobileNo->IsDetailKey && EmptyValue($this->CP1MobileNo->FormValue)) {
                $this->CP1MobileNo->addErrorMessage(str_replace("%s", $this->CP1MobileNo->caption(), $this->CP1MobileNo->RequiredErrorMessage));
            }
        }
        if ($this->CP1Fax->Required) {
            if (!$this->CP1Fax->IsDetailKey && EmptyValue($this->CP1Fax->FormValue)) {
                $this->CP1Fax->addErrorMessage(str_replace("%s", $this->CP1Fax->caption(), $this->CP1Fax->RequiredErrorMessage));
            }
        }
        if ($this->CP1Email->Required) {
            if (!$this->CP1Email->IsDetailKey && EmptyValue($this->CP1Email->FormValue)) {
                $this->CP1Email->addErrorMessage(str_replace("%s", $this->CP1Email->caption(), $this->CP1Email->RequiredErrorMessage));
            }
        }
        if ($this->Contactperson2->Required) {
            if (!$this->Contactperson2->IsDetailKey && EmptyValue($this->Contactperson2->FormValue)) {
                $this->Contactperson2->addErrorMessage(str_replace("%s", $this->Contactperson2->caption(), $this->Contactperson2->RequiredErrorMessage));
            }
        }
        if ($this->CP2Address1->Required) {
            if (!$this->CP2Address1->IsDetailKey && EmptyValue($this->CP2Address1->FormValue)) {
                $this->CP2Address1->addErrorMessage(str_replace("%s", $this->CP2Address1->caption(), $this->CP2Address1->RequiredErrorMessage));
            }
        }
        if ($this->CP2Address2->Required) {
            if (!$this->CP2Address2->IsDetailKey && EmptyValue($this->CP2Address2->FormValue)) {
                $this->CP2Address2->addErrorMessage(str_replace("%s", $this->CP2Address2->caption(), $this->CP2Address2->RequiredErrorMessage));
            }
        }
        if ($this->CP2Address3->Required) {
            if (!$this->CP2Address3->IsDetailKey && EmptyValue($this->CP2Address3->FormValue)) {
                $this->CP2Address3->addErrorMessage(str_replace("%s", $this->CP2Address3->caption(), $this->CP2Address3->RequiredErrorMessage));
            }
        }
        if ($this->CP2Citycode->Required) {
            if (!$this->CP2Citycode->IsDetailKey && EmptyValue($this->CP2Citycode->FormValue)) {
                $this->CP2Citycode->addErrorMessage(str_replace("%s", $this->CP2Citycode->caption(), $this->CP2Citycode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CP2Citycode->FormValue)) {
            $this->CP2Citycode->addErrorMessage($this->CP2Citycode->getErrorMessage(false));
        }
        if ($this->CP2State->Required) {
            if (!$this->CP2State->IsDetailKey && EmptyValue($this->CP2State->FormValue)) {
                $this->CP2State->addErrorMessage(str_replace("%s", $this->CP2State->caption(), $this->CP2State->RequiredErrorMessage));
            }
        }
        if ($this->CP2Pincode->Required) {
            if (!$this->CP2Pincode->IsDetailKey && EmptyValue($this->CP2Pincode->FormValue)) {
                $this->CP2Pincode->addErrorMessage(str_replace("%s", $this->CP2Pincode->caption(), $this->CP2Pincode->RequiredErrorMessage));
            }
        }
        if ($this->CP2Designation->Required) {
            if (!$this->CP2Designation->IsDetailKey && EmptyValue($this->CP2Designation->FormValue)) {
                $this->CP2Designation->addErrorMessage(str_replace("%s", $this->CP2Designation->caption(), $this->CP2Designation->RequiredErrorMessage));
            }
        }
        if ($this->CP2Phone->Required) {
            if (!$this->CP2Phone->IsDetailKey && EmptyValue($this->CP2Phone->FormValue)) {
                $this->CP2Phone->addErrorMessage(str_replace("%s", $this->CP2Phone->caption(), $this->CP2Phone->RequiredErrorMessage));
            }
        }
        if ($this->CP2MobileNo->Required) {
            if (!$this->CP2MobileNo->IsDetailKey && EmptyValue($this->CP2MobileNo->FormValue)) {
                $this->CP2MobileNo->addErrorMessage(str_replace("%s", $this->CP2MobileNo->caption(), $this->CP2MobileNo->RequiredErrorMessage));
            }
        }
        if ($this->CP2Fax->Required) {
            if (!$this->CP2Fax->IsDetailKey && EmptyValue($this->CP2Fax->FormValue)) {
                $this->CP2Fax->addErrorMessage(str_replace("%s", $this->CP2Fax->caption(), $this->CP2Fax->RequiredErrorMessage));
            }
        }
        if ($this->CP2Email->Required) {
            if (!$this->CP2Email->IsDetailKey && EmptyValue($this->CP2Email->FormValue)) {
                $this->CP2Email->addErrorMessage(str_replace("%s", $this->CP2Email->caption(), $this->CP2Email->RequiredErrorMessage));
            }
        }
        if ($this->Type->Required) {
            if (!$this->Type->IsDetailKey && EmptyValue($this->Type->FormValue)) {
                $this->Type->addErrorMessage(str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
            }
        }
        if ($this->Creditterms->Required) {
            if (!$this->Creditterms->IsDetailKey && EmptyValue($this->Creditterms->FormValue)) {
                $this->Creditterms->addErrorMessage(str_replace("%s", $this->Creditterms->caption(), $this->Creditterms->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->Tinnumber->Required) {
            if (!$this->Tinnumber->IsDetailKey && EmptyValue($this->Tinnumber->FormValue)) {
                $this->Tinnumber->addErrorMessage(str_replace("%s", $this->Tinnumber->caption(), $this->Tinnumber->RequiredErrorMessage));
            }
        }
        if ($this->Universalsuppliercode->Required) {
            if (!$this->Universalsuppliercode->IsDetailKey && EmptyValue($this->Universalsuppliercode->FormValue)) {
                $this->Universalsuppliercode->addErrorMessage(str_replace("%s", $this->Universalsuppliercode->caption(), $this->Universalsuppliercode->RequiredErrorMessage));
            }
        }
        if ($this->Mobilenumber->Required) {
            if (!$this->Mobilenumber->IsDetailKey && EmptyValue($this->Mobilenumber->FormValue)) {
                $this->Mobilenumber->addErrorMessage(str_replace("%s", $this->Mobilenumber->caption(), $this->Mobilenumber->RequiredErrorMessage));
            }
        }
        if ($this->PANNumber->Required) {
            if (!$this->PANNumber->IsDetailKey && EmptyValue($this->PANNumber->FormValue)) {
                $this->PANNumber->addErrorMessage(str_replace("%s", $this->PANNumber->caption(), $this->PANNumber->RequiredErrorMessage));
            }
        }
        if ($this->SalesRepMobileNo->Required) {
            if (!$this->SalesRepMobileNo->IsDetailKey && EmptyValue($this->SalesRepMobileNo->FormValue)) {
                $this->SalesRepMobileNo->addErrorMessage(str_replace("%s", $this->SalesRepMobileNo->caption(), $this->SalesRepMobileNo->RequiredErrorMessage));
            }
        }
        if ($this->GSTNumber->Required) {
            if (!$this->GSTNumber->IsDetailKey && EmptyValue($this->GSTNumber->FormValue)) {
                $this->GSTNumber->addErrorMessage(str_replace("%s", $this->GSTNumber->caption(), $this->GSTNumber->RequiredErrorMessage));
            }
        }
        if ($this->TANNumber->Required) {
            if (!$this->TANNumber->IsDetailKey && EmptyValue($this->TANNumber->FormValue)) {
                $this->TANNumber->addErrorMessage(str_replace("%s", $this->TANNumber->caption(), $this->TANNumber->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if ($this->BranchID->Required) {
            if (!$this->BranchID->IsDetailKey && EmptyValue($this->BranchID->FormValue)) {
                $this->BranchID->addErrorMessage(str_replace("%s", $this->BranchID->caption(), $this->BranchID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BranchID->FormValue)) {
            $this->BranchID->addErrorMessage($this->BranchID->getErrorMessage(false));
        }
        if ($this->StoreID->Required) {
            if (!$this->StoreID->IsDetailKey && EmptyValue($this->StoreID->FormValue)) {
                $this->StoreID->addErrorMessage(str_replace("%s", $this->StoreID->caption(), $this->StoreID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->StoreID->FormValue)) {
            $this->StoreID->addErrorMessage($this->StoreID->getErrorMessage(false));
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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("StoreSuppliersList"), "", $this->TableVar, true);
        $pageId = "addopt";
        $Breadcrumb->add("addopt", $pageId, $url);
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
}
