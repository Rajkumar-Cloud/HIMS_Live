<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStoremastEdit extends PharmacyStoremast
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_storemast';

    // Page object name
    public $PageObjName = "PharmacyStoremastEdit";

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

        // Table object (pharmacy_storemast)
        if (!isset($GLOBALS["pharmacy_storemast"]) || get_class($GLOBALS["pharmacy_storemast"]) == PROJECT_NAMESPACE . "pharmacy_storemast") {
            $GLOBALS["pharmacy_storemast"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_storemast');
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
                $doc = new $class(Container("pharmacy_storemast"));
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
                    if ($pageName == "PharmacyStoremastView") {
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
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->TYPE->setVisibility();
        $this->DES->setVisibility();
        $this->UM->setVisibility();
        $this->RT->setVisibility();
        $this->UR->Visible = false;
        $this->TAXP->Visible = false;
        $this->BATCHNO->setVisibility();
        $this->OQ->Visible = false;
        $this->RQ->Visible = false;
        $this->MRQ->Visible = false;
        $this->IQ->Visible = false;
        $this->MRP->setVisibility();
        $this->EXPDT->setVisibility();
        $this->SALQTY->Visible = false;
        $this->LASTPURDT->setVisibility();
        $this->LASTSUPP->setVisibility();
        $this->GENNAME->setVisibility();
        $this->LASTISSDT->setVisibility();
        $this->CREATEDDT->setVisibility();
        $this->OPPRC->Visible = false;
        $this->RESTRICT->Visible = false;
        $this->BAWAPRC->Visible = false;
        $this->STAXPER->Visible = false;
        $this->TAXTYPE->Visible = false;
        $this->OLDTAXP->Visible = false;
        $this->TAXUPD->Visible = false;
        $this->PACKAGE->Visible = false;
        $this->NEWRT->Visible = false;
        $this->NEWMRP->Visible = false;
        $this->NEWUR->Visible = false;
        $this->STATUS->Visible = false;
        $this->RETNQTY->Visible = false;
        $this->KEMODISC->Visible = false;
        $this->PATSALE->Visible = false;
        $this->ORGAN->Visible = false;
        $this->OLDRQ->Visible = false;
        $this->DRID->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->COMBCODE->setVisibility();
        $this->GENCODE->setVisibility();
        $this->STRENGTH->setVisibility();
        $this->UNIT->setVisibility();
        $this->FORMULARY->setVisibility();
        $this->STOCK->Visible = false;
        $this->RACKNO->setVisibility();
        $this->SUPPNAME->setVisibility();
        $this->COMBNAME->setVisibility();
        $this->GENERICNAME->setVisibility();
        $this->REMARK->setVisibility();
        $this->TEMP->setVisibility();
        $this->PACKING->Visible = false;
        $this->PhysQty->Visible = false;
        $this->LedQty->Visible = false;
        $this->id->setVisibility();
        $this->PurValue->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SaleValue->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->SaleRate->setVisibility();
        $this->HospID->setVisibility();
        $this->BRNAME->setVisibility();
        $this->OV->Visible = false;
        $this->LATESTOV->Visible = false;
        $this->ITEMTYPE->Visible = false;
        $this->ROWID->Visible = false;
        $this->MOVED->Visible = false;
        $this->NEWTAX->Visible = false;
        $this->HSNCODE->Visible = false;
        $this->OLDTAX->Visible = false;
        $this->Scheduling->setVisibility();
        $this->Schedulingh1->setVisibility();
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
        $this->setupLookupOptions($this->LASTSUPP);
        $this->setupLookupOptions($this->GENNAME);
        $this->setupLookupOptions($this->DRID);
        $this->setupLookupOptions($this->MFRCODE);
        $this->setupLookupOptions($this->COMBCODE);
        $this->setupLookupOptions($this->GENCODE);
        $this->setupLookupOptions($this->SUPPNAME);
        $this->setupLookupOptions($this->COMBNAME);
        $this->setupLookupOptions($this->GENERICNAME);

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
                    $this->terminate("PharmacyStoremastList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PharmacyStoremastList") {
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

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }

        // Check field name 'PRC' first before field var 'x_PRC'
        $val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
        if (!$this->PRC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRC->Visible = false; // Disable update for API request
            } else {
                $this->PRC->setFormValue($val);
            }
        }

        // Check field name 'TYPE' first before field var 'x_TYPE'
        $val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
        if (!$this->TYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TYPE->Visible = false; // Disable update for API request
            } else {
                $this->TYPE->setFormValue($val);
            }
        }

        // Check field name 'DES' first before field var 'x_DES'
        $val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
        if (!$this->DES->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DES->Visible = false; // Disable update for API request
            } else {
                $this->DES->setFormValue($val);
            }
        }

        // Check field name 'UM' first before field var 'x_UM'
        $val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
        if (!$this->UM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UM->Visible = false; // Disable update for API request
            } else {
                $this->UM->setFormValue($val);
            }
        }

        // Check field name 'RT' first before field var 'x_RT'
        $val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
        if (!$this->RT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RT->Visible = false; // Disable update for API request
            } else {
                $this->RT->setFormValue($val);
            }
        }

        // Check field name 'BATCHNO' first before field var 'x_BATCHNO'
        $val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
        if (!$this->BATCHNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BATCHNO->Visible = false; // Disable update for API request
            } else {
                $this->BATCHNO->setFormValue($val);
            }
        }

        // Check field name 'MRP' first before field var 'x_MRP'
        $val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
        if (!$this->MRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRP->Visible = false; // Disable update for API request
            } else {
                $this->MRP->setFormValue($val);
            }
        }

        // Check field name 'EXPDT' first before field var 'x_EXPDT'
        $val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
        if (!$this->EXPDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EXPDT->Visible = false; // Disable update for API request
            } else {
                $this->EXPDT->setFormValue($val);
            }
            $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        }

        // Check field name 'LASTPURDT' first before field var 'x_LASTPURDT'
        $val = $CurrentForm->hasValue("LASTPURDT") ? $CurrentForm->getValue("LASTPURDT") : $CurrentForm->getValue("x_LASTPURDT");
        if (!$this->LASTPURDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LASTPURDT->Visible = false; // Disable update for API request
            } else {
                $this->LASTPURDT->setFormValue($val);
            }
            $this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
        }

        // Check field name 'LASTSUPP' first before field var 'x_LASTSUPP'
        $val = $CurrentForm->hasValue("LASTSUPP") ? $CurrentForm->getValue("LASTSUPP") : $CurrentForm->getValue("x_LASTSUPP");
        if (!$this->LASTSUPP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LASTSUPP->Visible = false; // Disable update for API request
            } else {
                $this->LASTSUPP->setFormValue($val);
            }
        }

        // Check field name 'GENNAME' first before field var 'x_GENNAME'
        $val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
        if (!$this->GENNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GENNAME->Visible = false; // Disable update for API request
            } else {
                $this->GENNAME->setFormValue($val);
            }
        }

        // Check field name 'LASTISSDT' first before field var 'x_LASTISSDT'
        $val = $CurrentForm->hasValue("LASTISSDT") ? $CurrentForm->getValue("LASTISSDT") : $CurrentForm->getValue("x_LASTISSDT");
        if (!$this->LASTISSDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LASTISSDT->Visible = false; // Disable update for API request
            } else {
                $this->LASTISSDT->setFormValue($val);
            }
            $this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
        }

        // Check field name 'CREATEDDT' first before field var 'x_CREATEDDT'
        $val = $CurrentForm->hasValue("CREATEDDT") ? $CurrentForm->getValue("CREATEDDT") : $CurrentForm->getValue("x_CREATEDDT");
        if (!$this->CREATEDDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CREATEDDT->Visible = false; // Disable update for API request
            } else {
                $this->CREATEDDT->setFormValue($val);
            }
            $this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
        }

        // Check field name 'DRID' first before field var 'x_DRID'
        $val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
        if (!$this->DRID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DRID->Visible = false; // Disable update for API request
            } else {
                $this->DRID->setFormValue($val);
            }
        }

        // Check field name 'MFRCODE' first before field var 'x_MFRCODE'
        $val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
        if (!$this->MFRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MFRCODE->Visible = false; // Disable update for API request
            } else {
                $this->MFRCODE->setFormValue($val);
            }
        }

        // Check field name 'COMBCODE' first before field var 'x_COMBCODE'
        $val = $CurrentForm->hasValue("COMBCODE") ? $CurrentForm->getValue("COMBCODE") : $CurrentForm->getValue("x_COMBCODE");
        if (!$this->COMBCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->COMBCODE->Visible = false; // Disable update for API request
            } else {
                $this->COMBCODE->setFormValue($val);
            }
        }

        // Check field name 'GENCODE' first before field var 'x_GENCODE'
        $val = $CurrentForm->hasValue("GENCODE") ? $CurrentForm->getValue("GENCODE") : $CurrentForm->getValue("x_GENCODE");
        if (!$this->GENCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GENCODE->Visible = false; // Disable update for API request
            } else {
                $this->GENCODE->setFormValue($val);
            }
        }

        // Check field name 'STRENGTH' first before field var 'x_STRENGTH'
        $val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
        if (!$this->STRENGTH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->STRENGTH->Visible = false; // Disable update for API request
            } else {
                $this->STRENGTH->setFormValue($val);
            }
        }

        // Check field name 'UNIT' first before field var 'x_UNIT'
        $val = $CurrentForm->hasValue("UNIT") ? $CurrentForm->getValue("UNIT") : $CurrentForm->getValue("x_UNIT");
        if (!$this->UNIT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UNIT->Visible = false; // Disable update for API request
            } else {
                $this->UNIT->setFormValue($val);
            }
        }

        // Check field name 'FORMULARY' first before field var 'x_FORMULARY'
        $val = $CurrentForm->hasValue("FORMULARY") ? $CurrentForm->getValue("FORMULARY") : $CurrentForm->getValue("x_FORMULARY");
        if (!$this->FORMULARY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FORMULARY->Visible = false; // Disable update for API request
            } else {
                $this->FORMULARY->setFormValue($val);
            }
        }

        // Check field name 'RACKNO' first before field var 'x_RACKNO'
        $val = $CurrentForm->hasValue("RACKNO") ? $CurrentForm->getValue("RACKNO") : $CurrentForm->getValue("x_RACKNO");
        if (!$this->RACKNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RACKNO->Visible = false; // Disable update for API request
            } else {
                $this->RACKNO->setFormValue($val);
            }
        }

        // Check field name 'SUPPNAME' first before field var 'x_SUPPNAME'
        $val = $CurrentForm->hasValue("SUPPNAME") ? $CurrentForm->getValue("SUPPNAME") : $CurrentForm->getValue("x_SUPPNAME");
        if (!$this->SUPPNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SUPPNAME->Visible = false; // Disable update for API request
            } else {
                $this->SUPPNAME->setFormValue($val);
            }
        }

        // Check field name 'COMBNAME' first before field var 'x_COMBNAME'
        $val = $CurrentForm->hasValue("COMBNAME") ? $CurrentForm->getValue("COMBNAME") : $CurrentForm->getValue("x_COMBNAME");
        if (!$this->COMBNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->COMBNAME->Visible = false; // Disable update for API request
            } else {
                $this->COMBNAME->setFormValue($val);
            }
        }

        // Check field name 'GENERICNAME' first before field var 'x_GENERICNAME'
        $val = $CurrentForm->hasValue("GENERICNAME") ? $CurrentForm->getValue("GENERICNAME") : $CurrentForm->getValue("x_GENERICNAME");
        if (!$this->GENERICNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GENERICNAME->Visible = false; // Disable update for API request
            } else {
                $this->GENERICNAME->setFormValue($val);
            }
        }

        // Check field name 'REMARK' first before field var 'x_REMARK'
        $val = $CurrentForm->hasValue("REMARK") ? $CurrentForm->getValue("REMARK") : $CurrentForm->getValue("x_REMARK");
        if (!$this->REMARK->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REMARK->Visible = false; // Disable update for API request
            } else {
                $this->REMARK->setFormValue($val);
            }
        }

        // Check field name 'TEMP' first before field var 'x_TEMP'
        $val = $CurrentForm->hasValue("TEMP") ? $CurrentForm->getValue("TEMP") : $CurrentForm->getValue("x_TEMP");
        if (!$this->TEMP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TEMP->Visible = false; // Disable update for API request
            } else {
                $this->TEMP->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }

        // Check field name 'PurValue' first before field var 'x_PurValue'
        $val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
        if (!$this->PurValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurValue->Visible = false; // Disable update for API request
            } else {
                $this->PurValue->setFormValue($val);
            }
        }

        // Check field name 'PSGST' first before field var 'x_PSGST'
        $val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
        if (!$this->PSGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PSGST->Visible = false; // Disable update for API request
            } else {
                $this->PSGST->setFormValue($val);
            }
        }

        // Check field name 'PCGST' first before field var 'x_PCGST'
        $val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
        if (!$this->PCGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PCGST->Visible = false; // Disable update for API request
            } else {
                $this->PCGST->setFormValue($val);
            }
        }

        // Check field name 'SaleValue' first before field var 'x_SaleValue'
        $val = $CurrentForm->hasValue("SaleValue") ? $CurrentForm->getValue("SaleValue") : $CurrentForm->getValue("x_SaleValue");
        if (!$this->SaleValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SaleValue->Visible = false; // Disable update for API request
            } else {
                $this->SaleValue->setFormValue($val);
            }
        }

        // Check field name 'SSGST' first before field var 'x_SSGST'
        $val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
        if (!$this->SSGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SSGST->Visible = false; // Disable update for API request
            } else {
                $this->SSGST->setFormValue($val);
            }
        }

        // Check field name 'SCGST' first before field var 'x_SCGST'
        $val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
        if (!$this->SCGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SCGST->Visible = false; // Disable update for API request
            } else {
                $this->SCGST->setFormValue($val);
            }
        }

        // Check field name 'SaleRate' first before field var 'x_SaleRate'
        $val = $CurrentForm->hasValue("SaleRate") ? $CurrentForm->getValue("SaleRate") : $CurrentForm->getValue("x_SaleRate");
        if (!$this->SaleRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SaleRate->Visible = false; // Disable update for API request
            } else {
                $this->SaleRate->setFormValue($val);
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

        // Check field name 'BRNAME' first before field var 'x_BRNAME'
        $val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
        if (!$this->BRNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRNAME->Visible = false; // Disable update for API request
            } else {
                $this->BRNAME->setFormValue($val);
            }
        }

        // Check field name 'Scheduling' first before field var 'x_Scheduling'
        $val = $CurrentForm->hasValue("Scheduling") ? $CurrentForm->getValue("Scheduling") : $CurrentForm->getValue("x_Scheduling");
        if (!$this->Scheduling->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Scheduling->Visible = false; // Disable update for API request
            } else {
                $this->Scheduling->setFormValue($val);
            }
        }

        // Check field name 'Schedulingh1' first before field var 'x_Schedulingh1'
        $val = $CurrentForm->hasValue("Schedulingh1") ? $CurrentForm->getValue("Schedulingh1") : $CurrentForm->getValue("x_Schedulingh1");
        if (!$this->Schedulingh1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Schedulingh1->Visible = false; // Disable update for API request
            } else {
                $this->Schedulingh1->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->TYPE->CurrentValue = $this->TYPE->FormValue;
        $this->DES->CurrentValue = $this->DES->FormValue;
        $this->UM->CurrentValue = $this->UM->FormValue;
        $this->RT->CurrentValue = $this->RT->FormValue;
        $this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->LASTPURDT->CurrentValue = $this->LASTPURDT->FormValue;
        $this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
        $this->LASTSUPP->CurrentValue = $this->LASTSUPP->FormValue;
        $this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
        $this->LASTISSDT->CurrentValue = $this->LASTISSDT->FormValue;
        $this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
        $this->CREATEDDT->CurrentValue = $this->CREATEDDT->FormValue;
        $this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
        $this->DRID->CurrentValue = $this->DRID->FormValue;
        $this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
        $this->COMBCODE->CurrentValue = $this->COMBCODE->FormValue;
        $this->GENCODE->CurrentValue = $this->GENCODE->FormValue;
        $this->STRENGTH->CurrentValue = $this->STRENGTH->FormValue;
        $this->UNIT->CurrentValue = $this->UNIT->FormValue;
        $this->FORMULARY->CurrentValue = $this->FORMULARY->FormValue;
        $this->RACKNO->CurrentValue = $this->RACKNO->FormValue;
        $this->SUPPNAME->CurrentValue = $this->SUPPNAME->FormValue;
        $this->COMBNAME->CurrentValue = $this->COMBNAME->FormValue;
        $this->GENERICNAME->CurrentValue = $this->GENERICNAME->FormValue;
        $this->REMARK->CurrentValue = $this->REMARK->FormValue;
        $this->TEMP->CurrentValue = $this->TEMP->FormValue;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PurValue->CurrentValue = $this->PurValue->FormValue;
        $this->PSGST->CurrentValue = $this->PSGST->FormValue;
        $this->PCGST->CurrentValue = $this->PCGST->FormValue;
        $this->SaleValue->CurrentValue = $this->SaleValue->FormValue;
        $this->SSGST->CurrentValue = $this->SSGST->FormValue;
        $this->SCGST->CurrentValue = $this->SCGST->FormValue;
        $this->SaleRate->CurrentValue = $this->SaleRate->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
        $this->Scheduling->CurrentValue = $this->Scheduling->FormValue;
        $this->Schedulingh1->CurrentValue = $this->Schedulingh1->FormValue;
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
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PRC->setDbValue($row['PRC']);
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DES->setDbValue($row['DES']);
        $this->UM->setDbValue($row['UM']);
        $this->RT->setDbValue($row['RT']);
        $this->UR->setDbValue($row['UR']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->SALQTY->setDbValue($row['SALQTY']);
        $this->LASTPURDT->setDbValue($row['LASTPURDT']);
        $this->LASTSUPP->setDbValue($row['LASTSUPP']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->LASTISSDT->setDbValue($row['LASTISSDT']);
        $this->CREATEDDT->setDbValue($row['CREATEDDT']);
        $this->OPPRC->setDbValue($row['OPPRC']);
        $this->RESTRICT->setDbValue($row['RESTRICT']);
        $this->BAWAPRC->setDbValue($row['BAWAPRC']);
        $this->STAXPER->setDbValue($row['STAXPER']);
        $this->TAXTYPE->setDbValue($row['TAXTYPE']);
        $this->OLDTAXP->setDbValue($row['OLDTAXP']);
        $this->TAXUPD->setDbValue($row['TAXUPD']);
        $this->PACKAGE->setDbValue($row['PACKAGE']);
        $this->NEWRT->setDbValue($row['NEWRT']);
        $this->NEWMRP->setDbValue($row['NEWMRP']);
        $this->NEWUR->setDbValue($row['NEWUR']);
        $this->STATUS->setDbValue($row['STATUS']);
        $this->RETNQTY->setDbValue($row['RETNQTY']);
        $this->KEMODISC->setDbValue($row['KEMODISC']);
        $this->PATSALE->setDbValue($row['PATSALE']);
        $this->ORGAN->setDbValue($row['ORGAN']);
        $this->OLDRQ->setDbValue($row['OLDRQ']);
        $this->DRID->setDbValue($row['DRID']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->COMBCODE->setDbValue($row['COMBCODE']);
        $this->GENCODE->setDbValue($row['GENCODE']);
        $this->STRENGTH->setDbValue($row['STRENGTH']);
        $this->UNIT->setDbValue($row['UNIT']);
        $this->FORMULARY->setDbValue($row['FORMULARY']);
        $this->STOCK->setDbValue($row['STOCK']);
        $this->RACKNO->setDbValue($row['RACKNO']);
        $this->SUPPNAME->setDbValue($row['SUPPNAME']);
        $this->COMBNAME->setDbValue($row['COMBNAME']);
        $this->GENERICNAME->setDbValue($row['GENERICNAME']);
        $this->REMARK->setDbValue($row['REMARK']);
        $this->TEMP->setDbValue($row['TEMP']);
        $this->PACKING->setDbValue($row['PACKING']);
        $this->PhysQty->setDbValue($row['PhysQty']);
        $this->LedQty->setDbValue($row['LedQty']);
        $this->id->setDbValue($row['id']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SaleValue->setDbValue($row['SaleValue']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->SaleRate->setDbValue($row['SaleRate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BRNAME->setDbValue($row['BRNAME']);
        $this->OV->setDbValue($row['OV']);
        $this->LATESTOV->setDbValue($row['LATESTOV']);
        $this->ITEMTYPE->setDbValue($row['ITEMTYPE']);
        $this->ROWID->setDbValue($row['ROWID']);
        $this->MOVED->setDbValue($row['MOVED']);
        $this->NEWTAX->setDbValue($row['NEWTAX']);
        $this->HSNCODE->setDbValue($row['HSNCODE']);
        $this->OLDTAX->setDbValue($row['OLDTAX']);
        $this->Scheduling->setDbValue($row['Scheduling']);
        $this->Schedulingh1->setDbValue($row['Schedulingh1']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['BRCODE'] = null;
        $row['PRC'] = null;
        $row['TYPE'] = null;
        $row['DES'] = null;
        $row['UM'] = null;
        $row['RT'] = null;
        $row['UR'] = null;
        $row['TAXP'] = null;
        $row['BATCHNO'] = null;
        $row['OQ'] = null;
        $row['RQ'] = null;
        $row['MRQ'] = null;
        $row['IQ'] = null;
        $row['MRP'] = null;
        $row['EXPDT'] = null;
        $row['SALQTY'] = null;
        $row['LASTPURDT'] = null;
        $row['LASTSUPP'] = null;
        $row['GENNAME'] = null;
        $row['LASTISSDT'] = null;
        $row['CREATEDDT'] = null;
        $row['OPPRC'] = null;
        $row['RESTRICT'] = null;
        $row['BAWAPRC'] = null;
        $row['STAXPER'] = null;
        $row['TAXTYPE'] = null;
        $row['OLDTAXP'] = null;
        $row['TAXUPD'] = null;
        $row['PACKAGE'] = null;
        $row['NEWRT'] = null;
        $row['NEWMRP'] = null;
        $row['NEWUR'] = null;
        $row['STATUS'] = null;
        $row['RETNQTY'] = null;
        $row['KEMODISC'] = null;
        $row['PATSALE'] = null;
        $row['ORGAN'] = null;
        $row['OLDRQ'] = null;
        $row['DRID'] = null;
        $row['MFRCODE'] = null;
        $row['COMBCODE'] = null;
        $row['GENCODE'] = null;
        $row['STRENGTH'] = null;
        $row['UNIT'] = null;
        $row['FORMULARY'] = null;
        $row['STOCK'] = null;
        $row['RACKNO'] = null;
        $row['SUPPNAME'] = null;
        $row['COMBNAME'] = null;
        $row['GENERICNAME'] = null;
        $row['REMARK'] = null;
        $row['TEMP'] = null;
        $row['PACKING'] = null;
        $row['PhysQty'] = null;
        $row['LedQty'] = null;
        $row['id'] = null;
        $row['PurValue'] = null;
        $row['PSGST'] = null;
        $row['PCGST'] = null;
        $row['SaleValue'] = null;
        $row['SSGST'] = null;
        $row['SCGST'] = null;
        $row['SaleRate'] = null;
        $row['HospID'] = null;
        $row['BRNAME'] = null;
        $row['OV'] = null;
        $row['LATESTOV'] = null;
        $row['ITEMTYPE'] = null;
        $row['ROWID'] = null;
        $row['MOVED'] = null;
        $row['NEWTAX'] = null;
        $row['HSNCODE'] = null;
        $row['OLDTAX'] = null;
        $row['Scheduling'] = null;
        $row['Schedulingh1'] = null;
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
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue))) {
            $this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue))) {
            $this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue))) {
            $this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue))) {
            $this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleRate->FormValue == $this->SaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->SaleRate->CurrentValue))) {
            $this->SaleRate->CurrentValue = ConvertToFloatString($this->SaleRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BRCODE

        // PRC

        // TYPE

        // DES

        // UM

        // RT

        // UR

        // TAXP

        // BATCHNO

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // SALQTY

        // LASTPURDT

        // LASTSUPP

        // GENNAME

        // LASTISSDT

        // CREATEDDT

        // OPPRC

        // RESTRICT

        // BAWAPRC

        // STAXPER

        // TAXTYPE

        // OLDTAXP

        // TAXUPD

        // PACKAGE

        // NEWRT

        // NEWMRP

        // NEWUR

        // STATUS

        // RETNQTY

        // KEMODISC

        // PATSALE

        // ORGAN

        // OLDRQ

        // DRID

        // MFRCODE

        // COMBCODE

        // GENCODE

        // STRENGTH

        // UNIT

        // FORMULARY

        // STOCK

        // RACKNO

        // SUPPNAME

        // COMBNAME

        // GENERICNAME

        // REMARK

        // TEMP

        // PACKING

        // PhysQty

        // LedQty

        // id

        // PurValue

        // PSGST

        // PCGST

        // SaleValue

        // SSGST

        // SCGST

        // SaleRate

        // HospID

        // BRNAME

        // OV

        // LATESTOV

        // ITEMTYPE

        // ROWID

        // MOVED

        // NEWTAX

        // HSNCODE

        // OLDTAX

        // Scheduling

        // Schedulingh1
        if ($this->RowType == ROWTYPE_VIEW) {
            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // TYPE
            if (strval($this->TYPE->CurrentValue) != "") {
                $this->TYPE->ViewValue = $this->TYPE->optionCaption($this->TYPE->CurrentValue);
            } else {
                $this->TYPE->ViewValue = null;
            }
            $this->TYPE->ViewCustomAttributes = "";

            // DES
            $this->DES->ViewValue = $this->DES->CurrentValue;
            $this->DES->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // LASTPURDT
            $this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
            $this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
            $this->LASTPURDT->ViewCustomAttributes = "";

            // LASTSUPP
            $curVal = trim(strval($this->LASTSUPP->CurrentValue));
            if ($curVal != "") {
                $this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
                if ($this->LASTSUPP->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->LASTSUPP->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LASTSUPP->Lookup->renderViewRow($rswrk[0]);
                        $this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
                    } else {
                        $this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
                    }
                }
            } else {
                $this->LASTSUPP->ViewValue = null;
            }
            $this->LASTSUPP->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $curVal = trim(strval($this->GENNAME->CurrentValue));
            if ($curVal != "") {
                $this->GENNAME->ViewValue = $this->GENNAME->lookupCacheOption($curVal);
                if ($this->GENNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->GENNAME->ViewValue = $this->GENNAME->displayValue($arwrk);
                    } else {
                        $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
                    }
                }
            } else {
                $this->GENNAME->ViewValue = null;
            }
            $this->GENNAME->ViewCustomAttributes = "";

            // LASTISSDT
            $this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
            $this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
            $this->LASTISSDT->ViewCustomAttributes = "";

            // CREATEDDT
            $this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
            $this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
            $this->CREATEDDT->ViewCustomAttributes = "";

            // DRID
            $curVal = trim(strval($this->DRID->CurrentValue));
            if ($curVal != "") {
                $this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
                if ($this->DRID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DRID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DRID->Lookup->renderViewRow($rswrk[0]);
                        $this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
                    } else {
                        $this->DRID->ViewValue = $this->DRID->CurrentValue;
                    }
                }
            } else {
                $this->DRID->ViewValue = null;
            }
            $this->DRID->ViewCustomAttributes = "";

            // MFRCODE
            $curVal = trim(strval($this->MFRCODE->CurrentValue));
            if ($curVal != "") {
                $this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
                if ($this->MFRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->MFRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->MFRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
                    } else {
                        $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
                    }
                }
            } else {
                $this->MFRCODE->ViewValue = null;
            }
            $this->MFRCODE->ViewCustomAttributes = "";

            // COMBCODE
            $curVal = trim(strval($this->COMBCODE->CurrentValue));
            if ($curVal != "") {
                $this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
                if ($this->COMBCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->COMBCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->COMBCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
                    } else {
                        $this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
                    }
                }
            } else {
                $this->COMBCODE->ViewValue = null;
            }
            $this->COMBCODE->ViewCustomAttributes = "";

            // GENCODE
            $curVal = trim(strval($this->GENCODE->CurrentValue));
            if ($curVal != "") {
                $this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
                if ($this->GENCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
                    } else {
                        $this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
                    }
                }
            } else {
                $this->GENCODE->ViewValue = null;
            }
            $this->GENCODE->ViewCustomAttributes = "";

            // STRENGTH
            $this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
            $this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
            $this->STRENGTH->ViewCustomAttributes = "";

            // UNIT
            if (strval($this->UNIT->CurrentValue) != "") {
                $this->UNIT->ViewValue = $this->UNIT->optionCaption($this->UNIT->CurrentValue);
            } else {
                $this->UNIT->ViewValue = null;
            }
            $this->UNIT->ViewCustomAttributes = "";

            // FORMULARY
            if (strval($this->FORMULARY->CurrentValue) != "") {
                $this->FORMULARY->ViewValue = $this->FORMULARY->optionCaption($this->FORMULARY->CurrentValue);
            } else {
                $this->FORMULARY->ViewValue = null;
            }
            $this->FORMULARY->ViewCustomAttributes = "";

            // RACKNO
            $this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
            $this->RACKNO->ViewCustomAttributes = "";

            // SUPPNAME
            $curVal = trim(strval($this->SUPPNAME->CurrentValue));
            if ($curVal != "") {
                $this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
                if ($this->SUPPNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->SUPPNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SUPPNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
                    } else {
                        $this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
                    }
                }
            } else {
                $this->SUPPNAME->ViewValue = null;
            }
            $this->SUPPNAME->ViewCustomAttributes = "";

            // COMBNAME
            $curVal = trim(strval($this->COMBNAME->CurrentValue));
            if ($curVal != "") {
                $this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
                if ($this->COMBNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->COMBNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->COMBNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
                    } else {
                        $this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
                    }
                }
            } else {
                $this->COMBNAME->ViewValue = null;
            }
            $this->COMBNAME->ViewCustomAttributes = "";

            // GENERICNAME
            $curVal = trim(strval($this->GENERICNAME->CurrentValue));
            if ($curVal != "") {
                $this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
                if ($this->GENERICNAME->ViewValue === null) { // Lookup from database
                    $filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENERICNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENERICNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
                    } else {
                        $this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
                    }
                }
            } else {
                $this->GENERICNAME->ViewValue = null;
            }
            $this->GENERICNAME->ViewCustomAttributes = "";

            // REMARK
            $this->REMARK->ViewValue = $this->REMARK->CurrentValue;
            $this->REMARK->ViewCustomAttributes = "";

            // TEMP
            $this->TEMP->ViewValue = $this->TEMP->CurrentValue;
            $this->TEMP->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SaleValue
            $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
            $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
            $this->SaleValue->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // SaleRate
            $this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
            $this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
            $this->SaleRate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // BRNAME
            $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
            $this->BRNAME->ViewCustomAttributes = "";

            // Scheduling
            if (strval($this->Scheduling->CurrentValue) != "") {
                $this->Scheduling->ViewValue = $this->Scheduling->optionCaption($this->Scheduling->CurrentValue);
            } else {
                $this->Scheduling->ViewValue = null;
            }
            $this->Scheduling->ViewCustomAttributes = "";

            // Schedulingh1
            if (strval($this->Schedulingh1->CurrentValue) != "") {
                $this->Schedulingh1->ViewValue = $this->Schedulingh1->optionCaption($this->Schedulingh1->CurrentValue);
            } else {
                $this->Schedulingh1->ViewValue = null;
            }
            $this->Schedulingh1->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // TYPE
            $this->TYPE->LinkCustomAttributes = "";
            $this->TYPE->HrefValue = "";
            $this->TYPE->TooltipValue = "";

            // DES
            $this->DES->LinkCustomAttributes = "";
            $this->DES->HrefValue = "";
            $this->DES->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // LASTPURDT
            $this->LASTPURDT->LinkCustomAttributes = "";
            $this->LASTPURDT->HrefValue = "";
            $this->LASTPURDT->TooltipValue = "";

            // LASTSUPP
            $this->LASTSUPP->LinkCustomAttributes = "";
            $this->LASTSUPP->HrefValue = "";
            $this->LASTSUPP->TooltipValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

            // LASTISSDT
            $this->LASTISSDT->LinkCustomAttributes = "";
            $this->LASTISSDT->HrefValue = "";
            $this->LASTISSDT->TooltipValue = "";

            // CREATEDDT
            $this->CREATEDDT->LinkCustomAttributes = "";
            $this->CREATEDDT->HrefValue = "";
            $this->CREATEDDT->TooltipValue = "";

            // DRID
            $this->DRID->LinkCustomAttributes = "";
            $this->DRID->HrefValue = "";
            $this->DRID->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // COMBCODE
            $this->COMBCODE->LinkCustomAttributes = "";
            $this->COMBCODE->HrefValue = "";
            $this->COMBCODE->TooltipValue = "";

            // GENCODE
            $this->GENCODE->LinkCustomAttributes = "";
            $this->GENCODE->HrefValue = "";
            $this->GENCODE->TooltipValue = "";

            // STRENGTH
            $this->STRENGTH->LinkCustomAttributes = "";
            $this->STRENGTH->HrefValue = "";
            $this->STRENGTH->TooltipValue = "";

            // UNIT
            $this->UNIT->LinkCustomAttributes = "";
            $this->UNIT->HrefValue = "";
            $this->UNIT->TooltipValue = "";

            // FORMULARY
            $this->FORMULARY->LinkCustomAttributes = "";
            $this->FORMULARY->HrefValue = "";
            $this->FORMULARY->TooltipValue = "";

            // RACKNO
            $this->RACKNO->LinkCustomAttributes = "";
            $this->RACKNO->HrefValue = "";
            $this->RACKNO->TooltipValue = "";

            // SUPPNAME
            $this->SUPPNAME->LinkCustomAttributes = "";
            $this->SUPPNAME->HrefValue = "";
            $this->SUPPNAME->TooltipValue = "";

            // COMBNAME
            $this->COMBNAME->LinkCustomAttributes = "";
            $this->COMBNAME->HrefValue = "";
            $this->COMBNAME->TooltipValue = "";

            // GENERICNAME
            $this->GENERICNAME->LinkCustomAttributes = "";
            $this->GENERICNAME->HrefValue = "";
            $this->GENERICNAME->TooltipValue = "";

            // REMARK
            $this->REMARK->LinkCustomAttributes = "";
            $this->REMARK->HrefValue = "";
            $this->REMARK->TooltipValue = "";

            // TEMP
            $this->TEMP->LinkCustomAttributes = "";
            $this->TEMP->HrefValue = "";
            $this->TEMP->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SaleValue
            $this->SaleValue->LinkCustomAttributes = "";
            $this->SaleValue->HrefValue = "";
            $this->SaleValue->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // SaleRate
            $this->SaleRate->LinkCustomAttributes = "";
            $this->SaleRate->HrefValue = "";
            $this->SaleRate->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
            $this->BRNAME->TooltipValue = "";

            // Scheduling
            $this->Scheduling->LinkCustomAttributes = "";
            $this->Scheduling->HrefValue = "";
            $this->Scheduling->TooltipValue = "";

            // Schedulingh1
            $this->Schedulingh1->LinkCustomAttributes = "";
            $this->Schedulingh1->HrefValue = "";
            $this->Schedulingh1->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // BRCODE

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // TYPE
            $this->TYPE->EditAttrs["class"] = "form-control";
            $this->TYPE->EditCustomAttributes = "";
            $this->TYPE->EditValue = $this->TYPE->options(true);
            $this->TYPE->PlaceHolder = RemoveHtml($this->TYPE->caption());

            // DES
            $this->DES->EditAttrs["class"] = "form-control";
            $this->DES->EditCustomAttributes = "";
            if (!$this->DES->Raw) {
                $this->DES->CurrentValue = HtmlDecode($this->DES->CurrentValue);
            }
            $this->DES->EditValue = HtmlEncode($this->DES->CurrentValue);
            $this->DES->PlaceHolder = RemoveHtml($this->DES->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
            }

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
            }

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // LASTPURDT
            $this->LASTPURDT->EditAttrs["class"] = "form-control";
            $this->LASTPURDT->EditCustomAttributes = "";
            $this->LASTPURDT->EditValue = HtmlEncode(FormatDateTime($this->LASTPURDT->CurrentValue, 8));
            $this->LASTPURDT->PlaceHolder = RemoveHtml($this->LASTPURDT->caption());

            // LASTSUPP
            $this->LASTSUPP->EditCustomAttributes = "";
            $curVal = trim(strval($this->LASTSUPP->CurrentValue));
            if ($curVal != "") {
                $this->LASTSUPP->ViewValue = $this->LASTSUPP->lookupCacheOption($curVal);
            } else {
                $this->LASTSUPP->ViewValue = $this->LASTSUPP->Lookup !== null && is_array($this->LASTSUPP->Lookup->Options) ? $curVal : null;
            }
            if ($this->LASTSUPP->ViewValue !== null) { // Load from cache
                $this->LASTSUPP->EditValue = array_values($this->LASTSUPP->Lookup->Options);
                if ($this->LASTSUPP->ViewValue == "") {
                    $this->LASTSUPP->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Suppliername`" . SearchString("=", $this->LASTSUPP->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->LASTSUPP->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->LASTSUPP->Lookup->renderViewRow($rswrk[0]);
                    $this->LASTSUPP->ViewValue = $this->LASTSUPP->displayValue($arwrk);
                } else {
                    $this->LASTSUPP->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->LASTSUPP->EditValue = $arwrk;
            }
            $this->LASTSUPP->PlaceHolder = RemoveHtml($this->LASTSUPP->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
            $curVal = trim(strval($this->GENNAME->CurrentValue));
            if ($curVal != "") {
                $this->GENNAME->EditValue = $this->GENNAME->lookupCacheOption($curVal);
                if ($this->GENNAME->EditValue === null) { // Lookup from database
                    $filterWrk = "`GENNAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->GENNAME->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->GENNAME->Lookup->renderViewRow($rswrk[0]);
                        $this->GENNAME->EditValue = $this->GENNAME->displayValue($arwrk);
                    } else {
                        $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
                    }
                }
            } else {
                $this->GENNAME->EditValue = null;
            }
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // LASTISSDT
            $this->LASTISSDT->EditAttrs["class"] = "form-control";
            $this->LASTISSDT->EditCustomAttributes = "";
            $this->LASTISSDT->EditValue = HtmlEncode(FormatDateTime($this->LASTISSDT->CurrentValue, 8));
            $this->LASTISSDT->PlaceHolder = RemoveHtml($this->LASTISSDT->caption());

            // CREATEDDT

            // DRID
            $this->DRID->EditCustomAttributes = "";
            $curVal = trim(strval($this->DRID->CurrentValue));
            if ($curVal != "") {
                $this->DRID->ViewValue = $this->DRID->lookupCacheOption($curVal);
            } else {
                $this->DRID->ViewValue = $this->DRID->Lookup !== null && is_array($this->DRID->Lookup->Options) ? $curVal : null;
            }
            if ($this->DRID->ViewValue !== null) { // Load from cache
                $this->DRID->EditValue = array_values($this->DRID->Lookup->Options);
                if ($this->DRID->ViewValue == "") {
                    $this->DRID->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->DRID->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->DRID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->DRID->Lookup->renderViewRow($rswrk[0]);
                    $this->DRID->ViewValue = $this->DRID->displayValue($arwrk);
                } else {
                    $this->DRID->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->DRID->EditValue = $arwrk;
            }
            $this->DRID->PlaceHolder = RemoveHtml($this->DRID->caption());

            // MFRCODE
            $this->MFRCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->MFRCODE->CurrentValue));
            if ($curVal != "") {
                $this->MFRCODE->ViewValue = $this->MFRCODE->lookupCacheOption($curVal);
            } else {
                $this->MFRCODE->ViewValue = $this->MFRCODE->Lookup !== null && is_array($this->MFRCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->MFRCODE->ViewValue !== null) { // Load from cache
                $this->MFRCODE->EditValue = array_values($this->MFRCODE->Lookup->Options);
                if ($this->MFRCODE->ViewValue == "") {
                    $this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->MFRCODE->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->MFRCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->MFRCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->MFRCODE->ViewValue = $this->MFRCODE->displayValue($arwrk);
                } else {
                    $this->MFRCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->MFRCODE->EditValue = $arwrk;
            }
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // COMBCODE
            $this->COMBCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->COMBCODE->CurrentValue));
            if ($curVal != "") {
                $this->COMBCODE->ViewValue = $this->COMBCODE->lookupCacheOption($curVal);
            } else {
                $this->COMBCODE->ViewValue = $this->COMBCODE->Lookup !== null && is_array($this->COMBCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->COMBCODE->ViewValue !== null) { // Load from cache
                $this->COMBCODE->EditValue = array_values($this->COMBCODE->Lookup->Options);
                if ($this->COMBCODE->ViewValue == "") {
                    $this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->COMBCODE->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->COMBCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->COMBCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->COMBCODE->ViewValue = $this->COMBCODE->displayValue($arwrk);
                } else {
                    $this->COMBCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->COMBCODE->EditValue = $arwrk;
            }
            $this->COMBCODE->PlaceHolder = RemoveHtml($this->COMBCODE->caption());

            // GENCODE
            $this->GENCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->GENCODE->CurrentValue));
            if ($curVal != "") {
                $this->GENCODE->ViewValue = $this->GENCODE->lookupCacheOption($curVal);
            } else {
                $this->GENCODE->ViewValue = $this->GENCODE->Lookup !== null && is_array($this->GENCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->GENCODE->ViewValue !== null) { // Load from cache
                $this->GENCODE->EditValue = array_values($this->GENCODE->Lookup->Options);
                if ($this->GENCODE->ViewValue == "") {
                    $this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`CODE`" . SearchString("=", $this->GENCODE->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->GENCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GENCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->GENCODE->ViewValue = $this->GENCODE->displayValue($arwrk);
                } else {
                    $this->GENCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GENCODE->EditValue = $arwrk;
            }
            $this->GENCODE->PlaceHolder = RemoveHtml($this->GENCODE->caption());

            // STRENGTH
            $this->STRENGTH->EditAttrs["class"] = "form-control";
            $this->STRENGTH->EditCustomAttributes = "";
            $this->STRENGTH->EditValue = HtmlEncode($this->STRENGTH->CurrentValue);
            $this->STRENGTH->PlaceHolder = RemoveHtml($this->STRENGTH->caption());
            if (strval($this->STRENGTH->EditValue) != "" && is_numeric($this->STRENGTH->EditValue)) {
                $this->STRENGTH->EditValue = FormatNumber($this->STRENGTH->EditValue, -2, -2, -2, -2);
            }

            // UNIT
            $this->UNIT->EditAttrs["class"] = "form-control";
            $this->UNIT->EditCustomAttributes = "";
            $this->UNIT->EditValue = $this->UNIT->options(true);
            $this->UNIT->PlaceHolder = RemoveHtml($this->UNIT->caption());

            // FORMULARY
            $this->FORMULARY->EditAttrs["class"] = "form-control";
            $this->FORMULARY->EditCustomAttributes = "";
            $this->FORMULARY->EditValue = $this->FORMULARY->options(true);
            $this->FORMULARY->PlaceHolder = RemoveHtml($this->FORMULARY->caption());

            // RACKNO
            $this->RACKNO->EditAttrs["class"] = "form-control";
            $this->RACKNO->EditCustomAttributes = "";
            if (!$this->RACKNO->Raw) {
                $this->RACKNO->CurrentValue = HtmlDecode($this->RACKNO->CurrentValue);
            }
            $this->RACKNO->EditValue = HtmlEncode($this->RACKNO->CurrentValue);
            $this->RACKNO->PlaceHolder = RemoveHtml($this->RACKNO->caption());

            // SUPPNAME
            $this->SUPPNAME->EditCustomAttributes = "";
            $curVal = trim(strval($this->SUPPNAME->CurrentValue));
            if ($curVal != "") {
                $this->SUPPNAME->ViewValue = $this->SUPPNAME->lookupCacheOption($curVal);
            } else {
                $this->SUPPNAME->ViewValue = $this->SUPPNAME->Lookup !== null && is_array($this->SUPPNAME->Lookup->Options) ? $curVal : null;
            }
            if ($this->SUPPNAME->ViewValue !== null) { // Load from cache
                $this->SUPPNAME->EditValue = array_values($this->SUPPNAME->Lookup->Options);
                if ($this->SUPPNAME->ViewValue == "") {
                    $this->SUPPNAME->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Suppliername`" . SearchString("=", $this->SUPPNAME->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->SUPPNAME->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->SUPPNAME->Lookup->renderViewRow($rswrk[0]);
                    $this->SUPPNAME->ViewValue = $this->SUPPNAME->displayValue($arwrk);
                } else {
                    $this->SUPPNAME->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->SUPPNAME->EditValue = $arwrk;
            }
            $this->SUPPNAME->PlaceHolder = RemoveHtml($this->SUPPNAME->caption());

            // COMBNAME
            $this->COMBNAME->EditCustomAttributes = "";
            $curVal = trim(strval($this->COMBNAME->CurrentValue));
            if ($curVal != "") {
                $this->COMBNAME->ViewValue = $this->COMBNAME->lookupCacheOption($curVal);
            } else {
                $this->COMBNAME->ViewValue = $this->COMBNAME->Lookup !== null && is_array($this->COMBNAME->Lookup->Options) ? $curVal : null;
            }
            if ($this->COMBNAME->ViewValue !== null) { // Load from cache
                $this->COMBNAME->EditValue = array_values($this->COMBNAME->Lookup->Options);
                if ($this->COMBNAME->ViewValue == "") {
                    $this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`NAME`" . SearchString("=", $this->COMBNAME->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->COMBNAME->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->COMBNAME->Lookup->renderViewRow($rswrk[0]);
                    $this->COMBNAME->ViewValue = $this->COMBNAME->displayValue($arwrk);
                } else {
                    $this->COMBNAME->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->COMBNAME->EditValue = $arwrk;
            }
            $this->COMBNAME->PlaceHolder = RemoveHtml($this->COMBNAME->caption());

            // GENERICNAME
            $this->GENERICNAME->EditCustomAttributes = "";
            $curVal = trim(strval($this->GENERICNAME->CurrentValue));
            if ($curVal != "") {
                $this->GENERICNAME->ViewValue = $this->GENERICNAME->lookupCacheOption($curVal);
            } else {
                $this->GENERICNAME->ViewValue = $this->GENERICNAME->Lookup !== null && is_array($this->GENERICNAME->Lookup->Options) ? $curVal : null;
            }
            if ($this->GENERICNAME->ViewValue !== null) { // Load from cache
                $this->GENERICNAME->EditValue = array_values($this->GENERICNAME->Lookup->Options);
                if ($this->GENERICNAME->ViewValue == "") {
                    $this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`GENNAME`" . SearchString("=", $this->GENERICNAME->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->GENERICNAME->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->GENERICNAME->Lookup->renderViewRow($rswrk[0]);
                    $this->GENERICNAME->ViewValue = $this->GENERICNAME->displayValue($arwrk);
                } else {
                    $this->GENERICNAME->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GENERICNAME->EditValue = $arwrk;
            }
            $this->GENERICNAME->PlaceHolder = RemoveHtml($this->GENERICNAME->caption());

            // REMARK
            $this->REMARK->EditAttrs["class"] = "form-control";
            $this->REMARK->EditCustomAttributes = "";
            if (!$this->REMARK->Raw) {
                $this->REMARK->CurrentValue = HtmlDecode($this->REMARK->CurrentValue);
            }
            $this->REMARK->EditValue = HtmlEncode($this->REMARK->CurrentValue);
            $this->REMARK->PlaceHolder = RemoveHtml($this->REMARK->caption());

            // TEMP
            $this->TEMP->EditAttrs["class"] = "form-control";
            $this->TEMP->EditCustomAttributes = "";
            if (!$this->TEMP->Raw) {
                $this->TEMP->CurrentValue = HtmlDecode($this->TEMP->CurrentValue);
            }
            $this->TEMP->EditValue = HtmlEncode($this->TEMP->CurrentValue);
            $this->TEMP->PlaceHolder = RemoveHtml($this->TEMP->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
            if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
                $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
            }

            // PSGST
            $this->PSGST->EditAttrs["class"] = "form-control";
            $this->PSGST->EditCustomAttributes = "";
            $this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
            $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
            if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue)) {
                $this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);
            }

            // PCGST
            $this->PCGST->EditAttrs["class"] = "form-control";
            $this->PCGST->EditCustomAttributes = "";
            $this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
            $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
            if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue)) {
                $this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);
            }

            // SaleValue
            $this->SaleValue->EditAttrs["class"] = "form-control";
            $this->SaleValue->EditCustomAttributes = "";
            $this->SaleValue->EditValue = HtmlEncode($this->SaleValue->CurrentValue);
            $this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());
            if (strval($this->SaleValue->EditValue) != "" && is_numeric($this->SaleValue->EditValue)) {
                $this->SaleValue->EditValue = FormatNumber($this->SaleValue->EditValue, -2, -2, -2, -2);
            }

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
            if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
                $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);
            }

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
            if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
                $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);
            }

            // SaleRate
            $this->SaleRate->EditAttrs["class"] = "form-control";
            $this->SaleRate->EditCustomAttributes = "";
            $this->SaleRate->EditValue = HtmlEncode($this->SaleRate->CurrentValue);
            $this->SaleRate->PlaceHolder = RemoveHtml($this->SaleRate->caption());
            if (strval($this->SaleRate->EditValue) != "" && is_numeric($this->SaleRate->EditValue)) {
                $this->SaleRate->EditValue = FormatNumber($this->SaleRate->EditValue, -2, -2, -2, -2);
            }

            // HospID

            // BRNAME

            // Scheduling
            $this->Scheduling->EditCustomAttributes = "";
            $this->Scheduling->EditValue = $this->Scheduling->options(false);
            $this->Scheduling->PlaceHolder = RemoveHtml($this->Scheduling->caption());

            // Schedulingh1
            $this->Schedulingh1->EditCustomAttributes = "";
            $this->Schedulingh1->EditValue = $this->Schedulingh1->options(false);
            $this->Schedulingh1->PlaceHolder = RemoveHtml($this->Schedulingh1->caption());

            // Edit refer script

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // TYPE
            $this->TYPE->LinkCustomAttributes = "";
            $this->TYPE->HrefValue = "";

            // DES
            $this->DES->LinkCustomAttributes = "";
            $this->DES->HrefValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // LASTPURDT
            $this->LASTPURDT->LinkCustomAttributes = "";
            $this->LASTPURDT->HrefValue = "";

            // LASTSUPP
            $this->LASTSUPP->LinkCustomAttributes = "";
            $this->LASTSUPP->HrefValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";

            // LASTISSDT
            $this->LASTISSDT->LinkCustomAttributes = "";
            $this->LASTISSDT->HrefValue = "";

            // CREATEDDT
            $this->CREATEDDT->LinkCustomAttributes = "";
            $this->CREATEDDT->HrefValue = "";

            // DRID
            $this->DRID->LinkCustomAttributes = "";
            $this->DRID->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // COMBCODE
            $this->COMBCODE->LinkCustomAttributes = "";
            $this->COMBCODE->HrefValue = "";

            // GENCODE
            $this->GENCODE->LinkCustomAttributes = "";
            $this->GENCODE->HrefValue = "";

            // STRENGTH
            $this->STRENGTH->LinkCustomAttributes = "";
            $this->STRENGTH->HrefValue = "";

            // UNIT
            $this->UNIT->LinkCustomAttributes = "";
            $this->UNIT->HrefValue = "";

            // FORMULARY
            $this->FORMULARY->LinkCustomAttributes = "";
            $this->FORMULARY->HrefValue = "";

            // RACKNO
            $this->RACKNO->LinkCustomAttributes = "";
            $this->RACKNO->HrefValue = "";

            // SUPPNAME
            $this->SUPPNAME->LinkCustomAttributes = "";
            $this->SUPPNAME->HrefValue = "";

            // COMBNAME
            $this->COMBNAME->LinkCustomAttributes = "";
            $this->COMBNAME->HrefValue = "";

            // GENERICNAME
            $this->GENERICNAME->LinkCustomAttributes = "";
            $this->GENERICNAME->HrefValue = "";

            // REMARK
            $this->REMARK->LinkCustomAttributes = "";
            $this->REMARK->HrefValue = "";

            // TEMP
            $this->TEMP->LinkCustomAttributes = "";
            $this->TEMP->HrefValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";

            // SaleValue
            $this->SaleValue->LinkCustomAttributes = "";
            $this->SaleValue->HrefValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";

            // SaleRate
            $this->SaleRate->LinkCustomAttributes = "";
            $this->SaleRate->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";

            // Scheduling
            $this->Scheduling->LinkCustomAttributes = "";
            $this->Scheduling->HrefValue = "";

            // Schedulingh1
            $this->Schedulingh1->LinkCustomAttributes = "";
            $this->Schedulingh1->HrefValue = "";
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
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->TYPE->Required) {
            if (!$this->TYPE->IsDetailKey && EmptyValue($this->TYPE->FormValue)) {
                $this->TYPE->addErrorMessage(str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
            }
        }
        if ($this->DES->Required) {
            if (!$this->DES->IsDetailKey && EmptyValue($this->DES->FormValue)) {
                $this->DES->addErrorMessage(str_replace("%s", $this->DES->caption(), $this->DES->RequiredErrorMessage));
            }
        }
        if ($this->UM->Required) {
            if (!$this->UM->IsDetailKey && EmptyValue($this->UM->FormValue)) {
                $this->UM->addErrorMessage(str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
            }
        }
        if ($this->RT->Required) {
            if (!$this->RT->IsDetailKey && EmptyValue($this->RT->FormValue)) {
                $this->RT->addErrorMessage(str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RT->FormValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
            }
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->EXPDT->Required) {
            if (!$this->EXPDT->IsDetailKey && EmptyValue($this->EXPDT->FormValue)) {
                $this->EXPDT->addErrorMessage(str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EXPDT->FormValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if ($this->LASTPURDT->Required) {
            if (!$this->LASTPURDT->IsDetailKey && EmptyValue($this->LASTPURDT->FormValue)) {
                $this->LASTPURDT->addErrorMessage(str_replace("%s", $this->LASTPURDT->caption(), $this->LASTPURDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->LASTPURDT->FormValue)) {
            $this->LASTPURDT->addErrorMessage($this->LASTPURDT->getErrorMessage(false));
        }
        if ($this->LASTSUPP->Required) {
            if (!$this->LASTSUPP->IsDetailKey && EmptyValue($this->LASTSUPP->FormValue)) {
                $this->LASTSUPP->addErrorMessage(str_replace("%s", $this->LASTSUPP->caption(), $this->LASTSUPP->RequiredErrorMessage));
            }
        }
        if ($this->GENNAME->Required) {
            if (!$this->GENNAME->IsDetailKey && EmptyValue($this->GENNAME->FormValue)) {
                $this->GENNAME->addErrorMessage(str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
            }
        }
        if ($this->LASTISSDT->Required) {
            if (!$this->LASTISSDT->IsDetailKey && EmptyValue($this->LASTISSDT->FormValue)) {
                $this->LASTISSDT->addErrorMessage(str_replace("%s", $this->LASTISSDT->caption(), $this->LASTISSDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->LASTISSDT->FormValue)) {
            $this->LASTISSDT->addErrorMessage($this->LASTISSDT->getErrorMessage(false));
        }
        if ($this->CREATEDDT->Required) {
            if (!$this->CREATEDDT->IsDetailKey && EmptyValue($this->CREATEDDT->FormValue)) {
                $this->CREATEDDT->addErrorMessage(str_replace("%s", $this->CREATEDDT->caption(), $this->CREATEDDT->RequiredErrorMessage));
            }
        }
        if ($this->DRID->Required) {
            if (!$this->DRID->IsDetailKey && EmptyValue($this->DRID->FormValue)) {
                $this->DRID->addErrorMessage(str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
            }
        }
        if ($this->MFRCODE->Required) {
            if (!$this->MFRCODE->IsDetailKey && EmptyValue($this->MFRCODE->FormValue)) {
                $this->MFRCODE->addErrorMessage(str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
            }
        }
        if ($this->COMBCODE->Required) {
            if (!$this->COMBCODE->IsDetailKey && EmptyValue($this->COMBCODE->FormValue)) {
                $this->COMBCODE->addErrorMessage(str_replace("%s", $this->COMBCODE->caption(), $this->COMBCODE->RequiredErrorMessage));
            }
        }
        if ($this->GENCODE->Required) {
            if (!$this->GENCODE->IsDetailKey && EmptyValue($this->GENCODE->FormValue)) {
                $this->GENCODE->addErrorMessage(str_replace("%s", $this->GENCODE->caption(), $this->GENCODE->RequiredErrorMessage));
            }
        }
        if ($this->STRENGTH->Required) {
            if (!$this->STRENGTH->IsDetailKey && EmptyValue($this->STRENGTH->FormValue)) {
                $this->STRENGTH->addErrorMessage(str_replace("%s", $this->STRENGTH->caption(), $this->STRENGTH->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->STRENGTH->FormValue)) {
            $this->STRENGTH->addErrorMessage($this->STRENGTH->getErrorMessage(false));
        }
        if ($this->UNIT->Required) {
            if (!$this->UNIT->IsDetailKey && EmptyValue($this->UNIT->FormValue)) {
                $this->UNIT->addErrorMessage(str_replace("%s", $this->UNIT->caption(), $this->UNIT->RequiredErrorMessage));
            }
        }
        if ($this->FORMULARY->Required) {
            if (!$this->FORMULARY->IsDetailKey && EmptyValue($this->FORMULARY->FormValue)) {
                $this->FORMULARY->addErrorMessage(str_replace("%s", $this->FORMULARY->caption(), $this->FORMULARY->RequiredErrorMessage));
            }
        }
        if ($this->RACKNO->Required) {
            if (!$this->RACKNO->IsDetailKey && EmptyValue($this->RACKNO->FormValue)) {
                $this->RACKNO->addErrorMessage(str_replace("%s", $this->RACKNO->caption(), $this->RACKNO->RequiredErrorMessage));
            }
        }
        if ($this->SUPPNAME->Required) {
            if (!$this->SUPPNAME->IsDetailKey && EmptyValue($this->SUPPNAME->FormValue)) {
                $this->SUPPNAME->addErrorMessage(str_replace("%s", $this->SUPPNAME->caption(), $this->SUPPNAME->RequiredErrorMessage));
            }
        }
        if ($this->COMBNAME->Required) {
            if (!$this->COMBNAME->IsDetailKey && EmptyValue($this->COMBNAME->FormValue)) {
                $this->COMBNAME->addErrorMessage(str_replace("%s", $this->COMBNAME->caption(), $this->COMBNAME->RequiredErrorMessage));
            }
        }
        if ($this->GENERICNAME->Required) {
            if (!$this->GENERICNAME->IsDetailKey && EmptyValue($this->GENERICNAME->FormValue)) {
                $this->GENERICNAME->addErrorMessage(str_replace("%s", $this->GENERICNAME->caption(), $this->GENERICNAME->RequiredErrorMessage));
            }
        }
        if ($this->REMARK->Required) {
            if (!$this->REMARK->IsDetailKey && EmptyValue($this->REMARK->FormValue)) {
                $this->REMARK->addErrorMessage(str_replace("%s", $this->REMARK->caption(), $this->REMARK->RequiredErrorMessage));
            }
        }
        if ($this->TEMP->Required) {
            if (!$this->TEMP->IsDetailKey && EmptyValue($this->TEMP->FormValue)) {
                $this->TEMP->addErrorMessage(str_replace("%s", $this->TEMP->caption(), $this->TEMP->RequiredErrorMessage));
            }
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->PurValue->Required) {
            if (!$this->PurValue->IsDetailKey && EmptyValue($this->PurValue->FormValue)) {
                $this->PurValue->addErrorMessage(str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurValue->FormValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if ($this->PSGST->Required) {
            if (!$this->PSGST->IsDetailKey && EmptyValue($this->PSGST->FormValue)) {
                $this->PSGST->addErrorMessage(str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PSGST->FormValue)) {
            $this->PSGST->addErrorMessage($this->PSGST->getErrorMessage(false));
        }
        if ($this->PCGST->Required) {
            if (!$this->PCGST->IsDetailKey && EmptyValue($this->PCGST->FormValue)) {
                $this->PCGST->addErrorMessage(str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PCGST->FormValue)) {
            $this->PCGST->addErrorMessage($this->PCGST->getErrorMessage(false));
        }
        if ($this->SaleValue->Required) {
            if (!$this->SaleValue->IsDetailKey && EmptyValue($this->SaleValue->FormValue)) {
                $this->SaleValue->addErrorMessage(str_replace("%s", $this->SaleValue->caption(), $this->SaleValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SaleValue->FormValue)) {
            $this->SaleValue->addErrorMessage($this->SaleValue->getErrorMessage(false));
        }
        if ($this->SSGST->Required) {
            if (!$this->SSGST->IsDetailKey && EmptyValue($this->SSGST->FormValue)) {
                $this->SSGST->addErrorMessage(str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SSGST->FormValue)) {
            $this->SSGST->addErrorMessage($this->SSGST->getErrorMessage(false));
        }
        if ($this->SCGST->Required) {
            if (!$this->SCGST->IsDetailKey && EmptyValue($this->SCGST->FormValue)) {
                $this->SCGST->addErrorMessage(str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SCGST->FormValue)) {
            $this->SCGST->addErrorMessage($this->SCGST->getErrorMessage(false));
        }
        if ($this->SaleRate->Required) {
            if (!$this->SaleRate->IsDetailKey && EmptyValue($this->SaleRate->FormValue)) {
                $this->SaleRate->addErrorMessage(str_replace("%s", $this->SaleRate->caption(), $this->SaleRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SaleRate->FormValue)) {
            $this->SaleRate->addErrorMessage($this->SaleRate->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->BRNAME->Required) {
            if (!$this->BRNAME->IsDetailKey && EmptyValue($this->BRNAME->FormValue)) {
                $this->BRNAME->addErrorMessage(str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
            }
        }
        if ($this->Scheduling->Required) {
            if ($this->Scheduling->FormValue == "") {
                $this->Scheduling->addErrorMessage(str_replace("%s", $this->Scheduling->caption(), $this->Scheduling->RequiredErrorMessage));
            }
        }
        if ($this->Schedulingh1->Required) {
            if ($this->Schedulingh1->FormValue == "") {
                $this->Schedulingh1->addErrorMessage(str_replace("%s", $this->Schedulingh1->caption(), $this->Schedulingh1->RequiredErrorMessage));
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
        if ($this->PRC->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`PRC` = '" . AdjustSql($this->PRC->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->PRC->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->PRC->CurrentValue, $idxErrMsg);
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
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // BRCODE
            $this->BRCODE->CurrentValue = PharmacyID();
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null);

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // TYPE
            $this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, null, $this->TYPE->ReadOnly);

            // DES
            $this->DES->setDbValueDef($rsnew, $this->DES->CurrentValue, null, $this->DES->ReadOnly);

            // UM
            $this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, null, $this->UM->ReadOnly);

            // RT
            $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, $this->RT->ReadOnly);

            // BATCHNO
            $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, $this->BATCHNO->ReadOnly);

            // MRP
            $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, $this->MRP->ReadOnly);

            // EXPDT
            $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, $this->EXPDT->ReadOnly);

            // LASTPURDT
            $this->LASTPURDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTPURDT->CurrentValue, 0), null, $this->LASTPURDT->ReadOnly);

            // LASTSUPP
            $this->LASTSUPP->setDbValueDef($rsnew, $this->LASTSUPP->CurrentValue, null, $this->LASTSUPP->ReadOnly);

            // GENNAME
            $this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, null, $this->GENNAME->ReadOnly);

            // LASTISSDT
            $this->LASTISSDT->setDbValueDef($rsnew, UnFormatDateTime($this->LASTISSDT->CurrentValue, 0), null, $this->LASTISSDT->ReadOnly);

            // CREATEDDT
            $this->CREATEDDT->CurrentValue = CurrentDateTime();
            $this->CREATEDDT->setDbValueDef($rsnew, $this->CREATEDDT->CurrentValue, null);

            // DRID
            $this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, null, $this->DRID->ReadOnly);

            // MFRCODE
            $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, $this->MFRCODE->ReadOnly);

            // COMBCODE
            $this->COMBCODE->setDbValueDef($rsnew, $this->COMBCODE->CurrentValue, null, $this->COMBCODE->ReadOnly);

            // GENCODE
            $this->GENCODE->setDbValueDef($rsnew, $this->GENCODE->CurrentValue, null, $this->GENCODE->ReadOnly);

            // STRENGTH
            $this->STRENGTH->setDbValueDef($rsnew, $this->STRENGTH->CurrentValue, null, $this->STRENGTH->ReadOnly);

            // UNIT
            $this->UNIT->setDbValueDef($rsnew, $this->UNIT->CurrentValue, null, $this->UNIT->ReadOnly);

            // FORMULARY
            $this->FORMULARY->setDbValueDef($rsnew, $this->FORMULARY->CurrentValue, null, $this->FORMULARY->ReadOnly);

            // RACKNO
            $this->RACKNO->setDbValueDef($rsnew, $this->RACKNO->CurrentValue, null, $this->RACKNO->ReadOnly);

            // SUPPNAME
            $this->SUPPNAME->setDbValueDef($rsnew, $this->SUPPNAME->CurrentValue, null, $this->SUPPNAME->ReadOnly);

            // COMBNAME
            $this->COMBNAME->setDbValueDef($rsnew, $this->COMBNAME->CurrentValue, null, $this->COMBNAME->ReadOnly);

            // GENERICNAME
            $this->GENERICNAME->setDbValueDef($rsnew, $this->GENERICNAME->CurrentValue, null, $this->GENERICNAME->ReadOnly);

            // REMARK
            $this->REMARK->setDbValueDef($rsnew, $this->REMARK->CurrentValue, null, $this->REMARK->ReadOnly);

            // TEMP
            $this->TEMP->setDbValueDef($rsnew, $this->TEMP->CurrentValue, null, $this->TEMP->ReadOnly);

            // PurValue
            $this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, null, $this->PurValue->ReadOnly);

            // PSGST
            $this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, null, $this->PSGST->ReadOnly);

            // PCGST
            $this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, null, $this->PCGST->ReadOnly);

            // SaleValue
            $this->SaleValue->setDbValueDef($rsnew, $this->SaleValue->CurrentValue, null, $this->SaleValue->ReadOnly);

            // SSGST
            $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, $this->SSGST->ReadOnly);

            // SCGST
            $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, $this->SCGST->ReadOnly);

            // SaleRate
            $this->SaleRate->setDbValueDef($rsnew, $this->SaleRate->CurrentValue, null, $this->SaleRate->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // BRNAME
            $this->BRNAME->CurrentValue = PharmacyID();
            $this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, null);

            // Scheduling
            $this->Scheduling->setDbValueDef($rsnew, $this->Scheduling->CurrentValue, null, $this->Scheduling->ReadOnly);

            // Schedulingh1
            $this->Schedulingh1->setDbValueDef($rsnew, $this->Schedulingh1->CurrentValue, null, $this->Schedulingh1->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyStoremastList"), "", $this->TableVar, true);
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
                case "x_TYPE":
                    break;
                case "x_LASTSUPP":
                    break;
                case "x_GENNAME":
                    break;
                case "x_DRID":
                    break;
                case "x_MFRCODE":
                    break;
                case "x_COMBCODE":
                    break;
                case "x_GENCODE":
                    break;
                case "x_UNIT":
                    break;
                case "x_FORMULARY":
                    break;
                case "x_SUPPNAME":
                    break;
                case "x_COMBNAME":
                    break;
                case "x_GENERICNAME":
                    break;
                case "x_Scheduling":
                    break;
                case "x_Schedulingh1":
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
