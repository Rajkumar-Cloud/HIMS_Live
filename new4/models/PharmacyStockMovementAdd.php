<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStockMovementAdd extends PharmacyStockMovement
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_stock_movement';

    // Page object name
    public $PageObjName = "PharmacyStockMovementAdd";

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

        // Table object (pharmacy_stock_movement)
        if (!isset($GLOBALS["pharmacy_stock_movement"]) || get_class($GLOBALS["pharmacy_stock_movement"]) == PROJECT_NAMESPACE . "pharmacy_stock_movement") {
            $GLOBALS["pharmacy_stock_movement"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_stock_movement');
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
                $doc = new $class(Container("pharmacy_stock_movement"));
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
                    if ($pageName == "PharmacyStockMovementView") {
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
        $this->id->Visible = false;
        $this->PRC->setVisibility();
        $this->PrName->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->OpeningStk->setVisibility();
        $this->PurchaseQty->setVisibility();
        $this->SalesQty->setVisibility();
        $this->ClosingStk->setVisibility();
        $this->PurchasefreeQty->setVisibility();
        $this->TransferingQty->setVisibility();
        $this->UnitPurchaseRate->setVisibility();
        $this->UnitSaleRate->setVisibility();
        $this->CreatedDate->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRP->setVisibility();
        $this->EXPDT->setVisibility();
        $this->UR->setVisibility();
        $this->RT->setVisibility();
        $this->PRCODE->setVisibility();
        $this->BATCH->setVisibility();
        $this->PC->setVisibility();
        $this->OLDRT->setVisibility();
        $this->TEMPMRQ->setVisibility();
        $this->TAXP->setVisibility();
        $this->OLDRATE->setVisibility();
        $this->NEWRATE->setVisibility();
        $this->OTEMPMRA->setVisibility();
        $this->ACTIVESTATUS->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->BRCODE->setVisibility();
        $this->FRQ->setVisibility();
        $this->HospID->setVisibility();
        $this->UM->setVisibility();
        $this->GENNAME->setVisibility();
        $this->BILLDATE->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->baid->setVisibility();
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
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
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
                    $this->terminate("PharmacyStockMovementList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "PharmacyStockMovementList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PharmacyStockMovementView") {
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
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->PrName->CurrentValue = null;
        $this->PrName->OldValue = $this->PrName->CurrentValue;
        $this->BATCHNO->CurrentValue = null;
        $this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
        $this->OpeningStk->CurrentValue = 0.00;
        $this->PurchaseQty->CurrentValue = 0.00;
        $this->SalesQty->CurrentValue = 0.00;
        $this->ClosingStk->CurrentValue = 0.00;
        $this->PurchasefreeQty->CurrentValue = 0.00;
        $this->TransferingQty->CurrentValue = 0.00;
        $this->UnitPurchaseRate->CurrentValue = 0.00;
        $this->UnitSaleRate->CurrentValue = 0.00;
        $this->CreatedDate->CurrentValue = null;
        $this->CreatedDate->OldValue = $this->CreatedDate->CurrentValue;
        $this->OQ->CurrentValue = 0.00;
        $this->RQ->CurrentValue = 0.00;
        $this->MRQ->CurrentValue = 0.00;
        $this->IQ->CurrentValue = 0.00;
        $this->MRP->CurrentValue = 0.00;
        $this->EXPDT->CurrentValue = null;
        $this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
        $this->UR->CurrentValue = 0.00;
        $this->RT->CurrentValue = 0.00;
        $this->PRCODE->CurrentValue = null;
        $this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
        $this->BATCH->CurrentValue = null;
        $this->BATCH->OldValue = $this->BATCH->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->OLDRT->CurrentValue = null;
        $this->OLDRT->OldValue = $this->OLDRT->CurrentValue;
        $this->TEMPMRQ->CurrentValue = null;
        $this->TEMPMRQ->OldValue = $this->TEMPMRQ->CurrentValue;
        $this->TAXP->CurrentValue = null;
        $this->TAXP->OldValue = $this->TAXP->CurrentValue;
        $this->OLDRATE->CurrentValue = null;
        $this->OLDRATE->OldValue = $this->OLDRATE->CurrentValue;
        $this->NEWRATE->CurrentValue = null;
        $this->NEWRATE->OldValue = $this->NEWRATE->CurrentValue;
        $this->OTEMPMRA->CurrentValue = null;
        $this->OTEMPMRA->OldValue = $this->OTEMPMRA->CurrentValue;
        $this->ACTIVESTATUS->CurrentValue = null;
        $this->ACTIVESTATUS->OldValue = $this->ACTIVESTATUS->CurrentValue;
        $this->PSGST->CurrentValue = 0.00;
        $this->PCGST->CurrentValue = 0.00;
        $this->SSGST->CurrentValue = 0.00;
        $this->SCGST->CurrentValue = 0.00;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->FRQ->CurrentValue = 0.00;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->UM->CurrentValue = null;
        $this->UM->OldValue = $this->UM->CurrentValue;
        $this->GENNAME->CurrentValue = null;
        $this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
        $this->BILLDATE->CurrentValue = null;
        $this->BILLDATE->OldValue = $this->BILLDATE->CurrentValue;
        $this->CreatedDateTime->CurrentValue = null;
        $this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
        $this->baid->CurrentValue = null;
        $this->baid->OldValue = $this->baid->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PRC' first before field var 'x_PRC'
        $val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
        if (!$this->PRC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRC->Visible = false; // Disable update for API request
            } else {
                $this->PRC->setFormValue($val);
            }
        }

        // Check field name 'PrName' first before field var 'x_PrName'
        $val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
        if (!$this->PrName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrName->Visible = false; // Disable update for API request
            } else {
                $this->PrName->setFormValue($val);
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

        // Check field name 'OpeningStk' first before field var 'x_OpeningStk'
        $val = $CurrentForm->hasValue("OpeningStk") ? $CurrentForm->getValue("OpeningStk") : $CurrentForm->getValue("x_OpeningStk");
        if (!$this->OpeningStk->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OpeningStk->Visible = false; // Disable update for API request
            } else {
                $this->OpeningStk->setFormValue($val);
            }
        }

        // Check field name 'PurchaseQty' first before field var 'x_PurchaseQty'
        $val = $CurrentForm->hasValue("PurchaseQty") ? $CurrentForm->getValue("PurchaseQty") : $CurrentForm->getValue("x_PurchaseQty");
        if (!$this->PurchaseQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurchaseQty->Visible = false; // Disable update for API request
            } else {
                $this->PurchaseQty->setFormValue($val);
            }
        }

        // Check field name 'SalesQty' first before field var 'x_SalesQty'
        $val = $CurrentForm->hasValue("SalesQty") ? $CurrentForm->getValue("SalesQty") : $CurrentForm->getValue("x_SalesQty");
        if (!$this->SalesQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalesQty->Visible = false; // Disable update for API request
            } else {
                $this->SalesQty->setFormValue($val);
            }
        }

        // Check field name 'ClosingStk' first before field var 'x_ClosingStk'
        $val = $CurrentForm->hasValue("ClosingStk") ? $CurrentForm->getValue("ClosingStk") : $CurrentForm->getValue("x_ClosingStk");
        if (!$this->ClosingStk->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClosingStk->Visible = false; // Disable update for API request
            } else {
                $this->ClosingStk->setFormValue($val);
            }
        }

        // Check field name 'PurchasefreeQty' first before field var 'x_PurchasefreeQty'
        $val = $CurrentForm->hasValue("PurchasefreeQty") ? $CurrentForm->getValue("PurchasefreeQty") : $CurrentForm->getValue("x_PurchasefreeQty");
        if (!$this->PurchasefreeQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurchasefreeQty->Visible = false; // Disable update for API request
            } else {
                $this->PurchasefreeQty->setFormValue($val);
            }
        }

        // Check field name 'TransferingQty' first before field var 'x_TransferingQty'
        $val = $CurrentForm->hasValue("TransferingQty") ? $CurrentForm->getValue("TransferingQty") : $CurrentForm->getValue("x_TransferingQty");
        if (!$this->TransferingQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransferingQty->Visible = false; // Disable update for API request
            } else {
                $this->TransferingQty->setFormValue($val);
            }
        }

        // Check field name 'UnitPurchaseRate' first before field var 'x_UnitPurchaseRate'
        $val = $CurrentForm->hasValue("UnitPurchaseRate") ? $CurrentForm->getValue("UnitPurchaseRate") : $CurrentForm->getValue("x_UnitPurchaseRate");
        if (!$this->UnitPurchaseRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UnitPurchaseRate->Visible = false; // Disable update for API request
            } else {
                $this->UnitPurchaseRate->setFormValue($val);
            }
        }

        // Check field name 'UnitSaleRate' first before field var 'x_UnitSaleRate'
        $val = $CurrentForm->hasValue("UnitSaleRate") ? $CurrentForm->getValue("UnitSaleRate") : $CurrentForm->getValue("x_UnitSaleRate");
        if (!$this->UnitSaleRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UnitSaleRate->Visible = false; // Disable update for API request
            } else {
                $this->UnitSaleRate->setFormValue($val);
            }
        }

        // Check field name 'CreatedDate' first before field var 'x_CreatedDate'
        $val = $CurrentForm->hasValue("CreatedDate") ? $CurrentForm->getValue("CreatedDate") : $CurrentForm->getValue("x_CreatedDate");
        if (!$this->CreatedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedDate->Visible = false; // Disable update for API request
            } else {
                $this->CreatedDate->setFormValue($val);
            }
            $this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
        }

        // Check field name 'OQ' first before field var 'x_OQ'
        $val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
        if (!$this->OQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OQ->Visible = false; // Disable update for API request
            } else {
                $this->OQ->setFormValue($val);
            }
        }

        // Check field name 'RQ' first before field var 'x_RQ'
        $val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
        if (!$this->RQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RQ->Visible = false; // Disable update for API request
            } else {
                $this->RQ->setFormValue($val);
            }
        }

        // Check field name 'MRQ' first before field var 'x_MRQ'
        $val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
        if (!$this->MRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRQ->Visible = false; // Disable update for API request
            } else {
                $this->MRQ->setFormValue($val);
            }
        }

        // Check field name 'IQ' first before field var 'x_IQ'
        $val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
        if (!$this->IQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IQ->Visible = false; // Disable update for API request
            } else {
                $this->IQ->setFormValue($val);
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

        // Check field name 'UR' first before field var 'x_UR'
        $val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
        if (!$this->UR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UR->Visible = false; // Disable update for API request
            } else {
                $this->UR->setFormValue($val);
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

        // Check field name 'PRCODE' first before field var 'x_PRCODE'
        $val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
        if (!$this->PRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRCODE->Visible = false; // Disable update for API request
            } else {
                $this->PRCODE->setFormValue($val);
            }
        }

        // Check field name 'BATCH' first before field var 'x_BATCH'
        $val = $CurrentForm->hasValue("BATCH") ? $CurrentForm->getValue("BATCH") : $CurrentForm->getValue("x_BATCH");
        if (!$this->BATCH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BATCH->Visible = false; // Disable update for API request
            } else {
                $this->BATCH->setFormValue($val);
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

        // Check field name 'OLDRT' first before field var 'x_OLDRT'
        $val = $CurrentForm->hasValue("OLDRT") ? $CurrentForm->getValue("OLDRT") : $CurrentForm->getValue("x_OLDRT");
        if (!$this->OLDRT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OLDRT->Visible = false; // Disable update for API request
            } else {
                $this->OLDRT->setFormValue($val);
            }
        }

        // Check field name 'TEMPMRQ' first before field var 'x_TEMPMRQ'
        $val = $CurrentForm->hasValue("TEMPMRQ") ? $CurrentForm->getValue("TEMPMRQ") : $CurrentForm->getValue("x_TEMPMRQ");
        if (!$this->TEMPMRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TEMPMRQ->Visible = false; // Disable update for API request
            } else {
                $this->TEMPMRQ->setFormValue($val);
            }
        }

        // Check field name 'TAXP' first before field var 'x_TAXP'
        $val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
        if (!$this->TAXP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TAXP->Visible = false; // Disable update for API request
            } else {
                $this->TAXP->setFormValue($val);
            }
        }

        // Check field name 'OLDRATE' first before field var 'x_OLDRATE'
        $val = $CurrentForm->hasValue("OLDRATE") ? $CurrentForm->getValue("OLDRATE") : $CurrentForm->getValue("x_OLDRATE");
        if (!$this->OLDRATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OLDRATE->Visible = false; // Disable update for API request
            } else {
                $this->OLDRATE->setFormValue($val);
            }
        }

        // Check field name 'NEWRATE' first before field var 'x_NEWRATE'
        $val = $CurrentForm->hasValue("NEWRATE") ? $CurrentForm->getValue("NEWRATE") : $CurrentForm->getValue("x_NEWRATE");
        if (!$this->NEWRATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NEWRATE->Visible = false; // Disable update for API request
            } else {
                $this->NEWRATE->setFormValue($val);
            }
        }

        // Check field name 'OTEMPMRA' first before field var 'x_OTEMPMRA'
        $val = $CurrentForm->hasValue("OTEMPMRA") ? $CurrentForm->getValue("OTEMPMRA") : $CurrentForm->getValue("x_OTEMPMRA");
        if (!$this->OTEMPMRA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OTEMPMRA->Visible = false; // Disable update for API request
            } else {
                $this->OTEMPMRA->setFormValue($val);
            }
        }

        // Check field name 'ACTIVESTATUS' first before field var 'x_ACTIVESTATUS'
        $val = $CurrentForm->hasValue("ACTIVESTATUS") ? $CurrentForm->getValue("ACTIVESTATUS") : $CurrentForm->getValue("x_ACTIVESTATUS");
        if (!$this->ACTIVESTATUS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ACTIVESTATUS->Visible = false; // Disable update for API request
            } else {
                $this->ACTIVESTATUS->setFormValue($val);
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

        // Check field name 'MFRCODE' first before field var 'x_MFRCODE'
        $val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
        if (!$this->MFRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MFRCODE->Visible = false; // Disable update for API request
            } else {
                $this->MFRCODE->setFormValue($val);
            }
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

        // Check field name 'FRQ' first before field var 'x_FRQ'
        $val = $CurrentForm->hasValue("FRQ") ? $CurrentForm->getValue("FRQ") : $CurrentForm->getValue("x_FRQ");
        if (!$this->FRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FRQ->Visible = false; // Disable update for API request
            } else {
                $this->FRQ->setFormValue($val);
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

        // Check field name 'UM' first before field var 'x_UM'
        $val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
        if (!$this->UM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UM->Visible = false; // Disable update for API request
            } else {
                $this->UM->setFormValue($val);
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

        // Check field name 'BILLDATE' first before field var 'x_BILLDATE'
        $val = $CurrentForm->hasValue("BILLDATE") ? $CurrentForm->getValue("BILLDATE") : $CurrentForm->getValue("x_BILLDATE");
        if (!$this->BILLDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLDATE->Visible = false; // Disable update for API request
            } else {
                $this->BILLDATE->setFormValue($val);
            }
            $this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
        }

        // Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
        $val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
        if (!$this->CreatedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CreatedDateTime->setFormValue($val);
            }
            $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        }

        // Check field name 'baid' first before field var 'x_baid'
        $val = $CurrentForm->hasValue("baid") ? $CurrentForm->getValue("baid") : $CurrentForm->getValue("x_baid");
        if (!$this->baid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->baid->Visible = false; // Disable update for API request
            } else {
                $this->baid->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->PrName->CurrentValue = $this->PrName->FormValue;
        $this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
        $this->OpeningStk->CurrentValue = $this->OpeningStk->FormValue;
        $this->PurchaseQty->CurrentValue = $this->PurchaseQty->FormValue;
        $this->SalesQty->CurrentValue = $this->SalesQty->FormValue;
        $this->ClosingStk->CurrentValue = $this->ClosingStk->FormValue;
        $this->PurchasefreeQty->CurrentValue = $this->PurchasefreeQty->FormValue;
        $this->TransferingQty->CurrentValue = $this->TransferingQty->FormValue;
        $this->UnitPurchaseRate->CurrentValue = $this->UnitPurchaseRate->FormValue;
        $this->UnitSaleRate->CurrentValue = $this->UnitSaleRate->FormValue;
        $this->CreatedDate->CurrentValue = $this->CreatedDate->FormValue;
        $this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
        $this->OQ->CurrentValue = $this->OQ->FormValue;
        $this->RQ->CurrentValue = $this->RQ->FormValue;
        $this->MRQ->CurrentValue = $this->MRQ->FormValue;
        $this->IQ->CurrentValue = $this->IQ->FormValue;
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->UR->CurrentValue = $this->UR->FormValue;
        $this->RT->CurrentValue = $this->RT->FormValue;
        $this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
        $this->BATCH->CurrentValue = $this->BATCH->FormValue;
        $this->PC->CurrentValue = $this->PC->FormValue;
        $this->OLDRT->CurrentValue = $this->OLDRT->FormValue;
        $this->TEMPMRQ->CurrentValue = $this->TEMPMRQ->FormValue;
        $this->TAXP->CurrentValue = $this->TAXP->FormValue;
        $this->OLDRATE->CurrentValue = $this->OLDRATE->FormValue;
        $this->NEWRATE->CurrentValue = $this->NEWRATE->FormValue;
        $this->OTEMPMRA->CurrentValue = $this->OTEMPMRA->FormValue;
        $this->ACTIVESTATUS->CurrentValue = $this->ACTIVESTATUS->FormValue;
        $this->PSGST->CurrentValue = $this->PSGST->FormValue;
        $this->PCGST->CurrentValue = $this->PCGST->FormValue;
        $this->SSGST->CurrentValue = $this->SSGST->FormValue;
        $this->SCGST->CurrentValue = $this->SCGST->FormValue;
        $this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->FRQ->CurrentValue = $this->FRQ->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->UM->CurrentValue = $this->UM->FormValue;
        $this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
        $this->BILLDATE->CurrentValue = $this->BILLDATE->FormValue;
        $this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
        $this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
        $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        $this->baid->CurrentValue = $this->baid->FormValue;
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
        $this->PRC->setDbValue($row['PRC']);
        $this->PrName->setDbValue($row['PrName']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->OpeningStk->setDbValue($row['OpeningStk']);
        $this->PurchaseQty->setDbValue($row['PurchaseQty']);
        $this->SalesQty->setDbValue($row['SalesQty']);
        $this->ClosingStk->setDbValue($row['ClosingStk']);
        $this->PurchasefreeQty->setDbValue($row['PurchasefreeQty']);
        $this->TransferingQty->setDbValue($row['TransferingQty']);
        $this->UnitPurchaseRate->setDbValue($row['UnitPurchaseRate']);
        $this->UnitSaleRate->setDbValue($row['UnitSaleRate']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->UR->setDbValue($row['UR']);
        $this->RT->setDbValue($row['RT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->BATCH->setDbValue($row['BATCH']);
        $this->PC->setDbValue($row['PC']);
        $this->OLDRT->setDbValue($row['OLDRT']);
        $this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->OLDRATE->setDbValue($row['OLDRATE']);
        $this->NEWRATE->setDbValue($row['NEWRATE']);
        $this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
        $this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->FRQ->setDbValue($row['FRQ']);
        $this->HospID->setDbValue($row['HospID']);
        $this->UM->setDbValue($row['UM']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->BILLDATE->setDbValue($row['BILLDATE']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->baid->setDbValue($row['baid']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['PrName'] = $this->PrName->CurrentValue;
        $row['BATCHNO'] = $this->BATCHNO->CurrentValue;
        $row['OpeningStk'] = $this->OpeningStk->CurrentValue;
        $row['PurchaseQty'] = $this->PurchaseQty->CurrentValue;
        $row['SalesQty'] = $this->SalesQty->CurrentValue;
        $row['ClosingStk'] = $this->ClosingStk->CurrentValue;
        $row['PurchasefreeQty'] = $this->PurchasefreeQty->CurrentValue;
        $row['TransferingQty'] = $this->TransferingQty->CurrentValue;
        $row['UnitPurchaseRate'] = $this->UnitPurchaseRate->CurrentValue;
        $row['UnitSaleRate'] = $this->UnitSaleRate->CurrentValue;
        $row['CreatedDate'] = $this->CreatedDate->CurrentValue;
        $row['OQ'] = $this->OQ->CurrentValue;
        $row['RQ'] = $this->RQ->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['EXPDT'] = $this->EXPDT->CurrentValue;
        $row['UR'] = $this->UR->CurrentValue;
        $row['RT'] = $this->RT->CurrentValue;
        $row['PRCODE'] = $this->PRCODE->CurrentValue;
        $row['BATCH'] = $this->BATCH->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['OLDRT'] = $this->OLDRT->CurrentValue;
        $row['TEMPMRQ'] = $this->TEMPMRQ->CurrentValue;
        $row['TAXP'] = $this->TAXP->CurrentValue;
        $row['OLDRATE'] = $this->OLDRATE->CurrentValue;
        $row['NEWRATE'] = $this->NEWRATE->CurrentValue;
        $row['OTEMPMRA'] = $this->OTEMPMRA->CurrentValue;
        $row['ACTIVESTATUS'] = $this->ACTIVESTATUS->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['FRQ'] = $this->FRQ->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['UM'] = $this->UM->CurrentValue;
        $row['GENNAME'] = $this->GENNAME->CurrentValue;
        $row['BILLDATE'] = $this->BILLDATE->CurrentValue;
        $row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
        $row['baid'] = $this->baid->CurrentValue;
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
        if ($this->OpeningStk->FormValue == $this->OpeningStk->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningStk->CurrentValue))) {
            $this->OpeningStk->CurrentValue = ConvertToFloatString($this->OpeningStk->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchaseQty->FormValue == $this->PurchaseQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseQty->CurrentValue))) {
            $this->PurchaseQty->CurrentValue = ConvertToFloatString($this->PurchaseQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalesQty->FormValue == $this->SalesQty->CurrentValue && is_numeric(ConvertToFloatString($this->SalesQty->CurrentValue))) {
            $this->SalesQty->CurrentValue = ConvertToFloatString($this->SalesQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ClosingStk->FormValue == $this->ClosingStk->CurrentValue && is_numeric(ConvertToFloatString($this->ClosingStk->CurrentValue))) {
            $this->ClosingStk->CurrentValue = ConvertToFloatString($this->ClosingStk->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchasefreeQty->FormValue == $this->PurchasefreeQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchasefreeQty->CurrentValue))) {
            $this->PurchasefreeQty->CurrentValue = ConvertToFloatString($this->PurchasefreeQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TransferingQty->FormValue == $this->TransferingQty->CurrentValue && is_numeric(ConvertToFloatString($this->TransferingQty->CurrentValue))) {
            $this->TransferingQty->CurrentValue = ConvertToFloatString($this->TransferingQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UnitPurchaseRate->FormValue == $this->UnitPurchaseRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitPurchaseRate->CurrentValue))) {
            $this->UnitPurchaseRate->CurrentValue = ConvertToFloatString($this->UnitPurchaseRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UnitSaleRate->FormValue == $this->UnitSaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitSaleRate->CurrentValue))) {
            $this->UnitSaleRate->CurrentValue = ConvertToFloatString($this->UnitSaleRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue))) {
            $this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue))) {
            $this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRT->FormValue == $this->OLDRT->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRT->CurrentValue))) {
            $this->OLDRT->CurrentValue = ConvertToFloatString($this->OLDRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TEMPMRQ->FormValue == $this->TEMPMRQ->CurrentValue && is_numeric(ConvertToFloatString($this->TEMPMRQ->CurrentValue))) {
            $this->TEMPMRQ->CurrentValue = ConvertToFloatString($this->TEMPMRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRATE->FormValue == $this->OLDRATE->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRATE->CurrentValue))) {
            $this->OLDRATE->CurrentValue = ConvertToFloatString($this->OLDRATE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWRATE->FormValue == $this->NEWRATE->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRATE->CurrentValue))) {
            $this->NEWRATE->CurrentValue = ConvertToFloatString($this->NEWRATE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OTEMPMRA->FormValue == $this->OTEMPMRA->CurrentValue && is_numeric(ConvertToFloatString($this->OTEMPMRA->CurrentValue))) {
            $this->OTEMPMRA->CurrentValue = ConvertToFloatString($this->OTEMPMRA->CurrentValue);
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
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue))) {
            $this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // PRC

        // PrName

        // BATCHNO

        // OpeningStk

        // PurchaseQty

        // SalesQty

        // ClosingStk

        // PurchasefreeQty

        // TransferingQty

        // UnitPurchaseRate

        // UnitSaleRate

        // CreatedDate

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // UR

        // RT

        // PRCODE

        // BATCH

        // PC

        // OLDRT

        // TEMPMRQ

        // TAXP

        // OLDRATE

        // NEWRATE

        // OTEMPMRA

        // ACTIVESTATUS

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // MFRCODE

        // BRCODE

        // FRQ

        // HospID

        // UM

        // GENNAME

        // BILLDATE

        // CreatedDateTime

        // baid
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // OpeningStk
            $this->OpeningStk->ViewValue = $this->OpeningStk->CurrentValue;
            $this->OpeningStk->ViewValue = FormatNumber($this->OpeningStk->ViewValue, 2, -2, -2, -2);
            $this->OpeningStk->ViewCustomAttributes = "";

            // PurchaseQty
            $this->PurchaseQty->ViewValue = $this->PurchaseQty->CurrentValue;
            $this->PurchaseQty->ViewValue = FormatNumber($this->PurchaseQty->ViewValue, 2, -2, -2, -2);
            $this->PurchaseQty->ViewCustomAttributes = "";

            // SalesQty
            $this->SalesQty->ViewValue = $this->SalesQty->CurrentValue;
            $this->SalesQty->ViewValue = FormatNumber($this->SalesQty->ViewValue, 2, -2, -2, -2);
            $this->SalesQty->ViewCustomAttributes = "";

            // ClosingStk
            $this->ClosingStk->ViewValue = $this->ClosingStk->CurrentValue;
            $this->ClosingStk->ViewValue = FormatNumber($this->ClosingStk->ViewValue, 2, -2, -2, -2);
            $this->ClosingStk->ViewCustomAttributes = "";

            // PurchasefreeQty
            $this->PurchasefreeQty->ViewValue = $this->PurchasefreeQty->CurrentValue;
            $this->PurchasefreeQty->ViewValue = FormatNumber($this->PurchasefreeQty->ViewValue, 2, -2, -2, -2);
            $this->PurchasefreeQty->ViewCustomAttributes = "";

            // TransferingQty
            $this->TransferingQty->ViewValue = $this->TransferingQty->CurrentValue;
            $this->TransferingQty->ViewValue = FormatNumber($this->TransferingQty->ViewValue, 2, -2, -2, -2);
            $this->TransferingQty->ViewCustomAttributes = "";

            // UnitPurchaseRate
            $this->UnitPurchaseRate->ViewValue = $this->UnitPurchaseRate->CurrentValue;
            $this->UnitPurchaseRate->ViewValue = FormatNumber($this->UnitPurchaseRate->ViewValue, 2, -2, -2, -2);
            $this->UnitPurchaseRate->ViewCustomAttributes = "";

            // UnitSaleRate
            $this->UnitSaleRate->ViewValue = $this->UnitSaleRate->CurrentValue;
            $this->UnitSaleRate->ViewValue = FormatNumber($this->UnitSaleRate->ViewValue, 2, -2, -2, -2);
            $this->UnitSaleRate->ViewCustomAttributes = "";

            // CreatedDate
            $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
            $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
            $this->CreatedDate->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // BATCH
            $this->BATCH->ViewValue = $this->BATCH->CurrentValue;
            $this->BATCH->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // OLDRT
            $this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
            $this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
            $this->OLDRT->ViewCustomAttributes = "";

            // TEMPMRQ
            $this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
            $this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
            $this->TEMPMRQ->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // OLDRATE
            $this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
            $this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
            $this->OLDRATE->ViewCustomAttributes = "";

            // NEWRATE
            $this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
            $this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
            $this->NEWRATE->ViewCustomAttributes = "";

            // OTEMPMRA
            $this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
            $this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
            $this->OTEMPMRA->ViewCustomAttributes = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
            $this->ACTIVESTATUS->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
            $this->BRCODE->ViewCustomAttributes = "";

            // FRQ
            $this->FRQ->ViewValue = $this->FRQ->CurrentValue;
            $this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
            $this->FRQ->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $this->GENNAME->ViewCustomAttributes = "";

            // BILLDATE
            $this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
            $this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
            $this->BILLDATE->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // baid
            $this->baid->ViewValue = $this->baid->CurrentValue;
            $this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
            $this->baid->ViewCustomAttributes = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // OpeningStk
            $this->OpeningStk->LinkCustomAttributes = "";
            $this->OpeningStk->HrefValue = "";
            $this->OpeningStk->TooltipValue = "";

            // PurchaseQty
            $this->PurchaseQty->LinkCustomAttributes = "";
            $this->PurchaseQty->HrefValue = "";
            $this->PurchaseQty->TooltipValue = "";

            // SalesQty
            $this->SalesQty->LinkCustomAttributes = "";
            $this->SalesQty->HrefValue = "";
            $this->SalesQty->TooltipValue = "";

            // ClosingStk
            $this->ClosingStk->LinkCustomAttributes = "";
            $this->ClosingStk->HrefValue = "";
            $this->ClosingStk->TooltipValue = "";

            // PurchasefreeQty
            $this->PurchasefreeQty->LinkCustomAttributes = "";
            $this->PurchasefreeQty->HrefValue = "";
            $this->PurchasefreeQty->TooltipValue = "";

            // TransferingQty
            $this->TransferingQty->LinkCustomAttributes = "";
            $this->TransferingQty->HrefValue = "";
            $this->TransferingQty->TooltipValue = "";

            // UnitPurchaseRate
            $this->UnitPurchaseRate->LinkCustomAttributes = "";
            $this->UnitPurchaseRate->HrefValue = "";
            $this->UnitPurchaseRate->TooltipValue = "";

            // UnitSaleRate
            $this->UnitSaleRate->LinkCustomAttributes = "";
            $this->UnitSaleRate->HrefValue = "";
            $this->UnitSaleRate->TooltipValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
            $this->CreatedDate->TooltipValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";
            $this->OQ->TooltipValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";
            $this->RQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";
            $this->PRCODE->TooltipValue = "";

            // BATCH
            $this->BATCH->LinkCustomAttributes = "";
            $this->BATCH->HrefValue = "";
            $this->BATCH->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // OLDRT
            $this->OLDRT->LinkCustomAttributes = "";
            $this->OLDRT->HrefValue = "";
            $this->OLDRT->TooltipValue = "";

            // TEMPMRQ
            $this->TEMPMRQ->LinkCustomAttributes = "";
            $this->TEMPMRQ->HrefValue = "";
            $this->TEMPMRQ->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // OLDRATE
            $this->OLDRATE->LinkCustomAttributes = "";
            $this->OLDRATE->HrefValue = "";
            $this->OLDRATE->TooltipValue = "";

            // NEWRATE
            $this->NEWRATE->LinkCustomAttributes = "";
            $this->NEWRATE->HrefValue = "";
            $this->NEWRATE->TooltipValue = "";

            // OTEMPMRA
            $this->OTEMPMRA->LinkCustomAttributes = "";
            $this->OTEMPMRA->HrefValue = "";
            $this->OTEMPMRA->TooltipValue = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->LinkCustomAttributes = "";
            $this->ACTIVESTATUS->HrefValue = "";
            $this->ACTIVESTATUS->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";
            $this->FRQ->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";
            $this->BILLDATE->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // baid
            $this->baid->LinkCustomAttributes = "";
            $this->baid->HrefValue = "";
            $this->baid->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // OpeningStk
            $this->OpeningStk->EditAttrs["class"] = "form-control";
            $this->OpeningStk->EditCustomAttributes = "";
            $this->OpeningStk->EditValue = HtmlEncode($this->OpeningStk->CurrentValue);
            $this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());
            if (strval($this->OpeningStk->EditValue) != "" && is_numeric($this->OpeningStk->EditValue)) {
                $this->OpeningStk->EditValue = FormatNumber($this->OpeningStk->EditValue, -2, -2, -2, -2);
            }

            // PurchaseQty
            $this->PurchaseQty->EditAttrs["class"] = "form-control";
            $this->PurchaseQty->EditCustomAttributes = "";
            $this->PurchaseQty->EditValue = HtmlEncode($this->PurchaseQty->CurrentValue);
            $this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());
            if (strval($this->PurchaseQty->EditValue) != "" && is_numeric($this->PurchaseQty->EditValue)) {
                $this->PurchaseQty->EditValue = FormatNumber($this->PurchaseQty->EditValue, -2, -2, -2, -2);
            }

            // SalesQty
            $this->SalesQty->EditAttrs["class"] = "form-control";
            $this->SalesQty->EditCustomAttributes = "";
            $this->SalesQty->EditValue = HtmlEncode($this->SalesQty->CurrentValue);
            $this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());
            if (strval($this->SalesQty->EditValue) != "" && is_numeric($this->SalesQty->EditValue)) {
                $this->SalesQty->EditValue = FormatNumber($this->SalesQty->EditValue, -2, -2, -2, -2);
            }

            // ClosingStk
            $this->ClosingStk->EditAttrs["class"] = "form-control";
            $this->ClosingStk->EditCustomAttributes = "";
            $this->ClosingStk->EditValue = HtmlEncode($this->ClosingStk->CurrentValue);
            $this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());
            if (strval($this->ClosingStk->EditValue) != "" && is_numeric($this->ClosingStk->EditValue)) {
                $this->ClosingStk->EditValue = FormatNumber($this->ClosingStk->EditValue, -2, -2, -2, -2);
            }

            // PurchasefreeQty
            $this->PurchasefreeQty->EditAttrs["class"] = "form-control";
            $this->PurchasefreeQty->EditCustomAttributes = "";
            $this->PurchasefreeQty->EditValue = HtmlEncode($this->PurchasefreeQty->CurrentValue);
            $this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());
            if (strval($this->PurchasefreeQty->EditValue) != "" && is_numeric($this->PurchasefreeQty->EditValue)) {
                $this->PurchasefreeQty->EditValue = FormatNumber($this->PurchasefreeQty->EditValue, -2, -2, -2, -2);
            }

            // TransferingQty
            $this->TransferingQty->EditAttrs["class"] = "form-control";
            $this->TransferingQty->EditCustomAttributes = "";
            $this->TransferingQty->EditValue = HtmlEncode($this->TransferingQty->CurrentValue);
            $this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());
            if (strval($this->TransferingQty->EditValue) != "" && is_numeric($this->TransferingQty->EditValue)) {
                $this->TransferingQty->EditValue = FormatNumber($this->TransferingQty->EditValue, -2, -2, -2, -2);
            }

            // UnitPurchaseRate
            $this->UnitPurchaseRate->EditAttrs["class"] = "form-control";
            $this->UnitPurchaseRate->EditCustomAttributes = "";
            $this->UnitPurchaseRate->EditValue = HtmlEncode($this->UnitPurchaseRate->CurrentValue);
            $this->UnitPurchaseRate->PlaceHolder = RemoveHtml($this->UnitPurchaseRate->caption());
            if (strval($this->UnitPurchaseRate->EditValue) != "" && is_numeric($this->UnitPurchaseRate->EditValue)) {
                $this->UnitPurchaseRate->EditValue = FormatNumber($this->UnitPurchaseRate->EditValue, -2, -2, -2, -2);
            }

            // UnitSaleRate
            $this->UnitSaleRate->EditAttrs["class"] = "form-control";
            $this->UnitSaleRate->EditCustomAttributes = "";
            $this->UnitSaleRate->EditValue = HtmlEncode($this->UnitSaleRate->CurrentValue);
            $this->UnitSaleRate->PlaceHolder = RemoveHtml($this->UnitSaleRate->caption());
            if (strval($this->UnitSaleRate->EditValue) != "" && is_numeric($this->UnitSaleRate->EditValue)) {
                $this->UnitSaleRate->EditValue = FormatNumber($this->UnitSaleRate->EditValue, -2, -2, -2, -2);
            }

            // CreatedDate
            $this->CreatedDate->EditAttrs["class"] = "form-control";
            $this->CreatedDate->EditCustomAttributes = "";
            $this->CreatedDate->EditValue = HtmlEncode(FormatDateTime($this->CreatedDate->CurrentValue, 8));
            $this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->CurrentValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
            if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue)) {
                $this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
            }

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->CurrentValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
            if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue)) {
                $this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
            }

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
            if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue)) {
                $this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
            }

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
            }

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

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
            }

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
            }

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // BATCH
            $this->BATCH->EditAttrs["class"] = "form-control";
            $this->BATCH->EditCustomAttributes = "";
            if (!$this->BATCH->Raw) {
                $this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
            }
            $this->BATCH->EditValue = HtmlEncode($this->BATCH->CurrentValue);
            $this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // OLDRT
            $this->OLDRT->EditAttrs["class"] = "form-control";
            $this->OLDRT->EditCustomAttributes = "";
            $this->OLDRT->EditValue = HtmlEncode($this->OLDRT->CurrentValue);
            $this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());
            if (strval($this->OLDRT->EditValue) != "" && is_numeric($this->OLDRT->EditValue)) {
                $this->OLDRT->EditValue = FormatNumber($this->OLDRT->EditValue, -2, -2, -2, -2);
            }

            // TEMPMRQ
            $this->TEMPMRQ->EditAttrs["class"] = "form-control";
            $this->TEMPMRQ->EditCustomAttributes = "";
            $this->TEMPMRQ->EditValue = HtmlEncode($this->TEMPMRQ->CurrentValue);
            $this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());
            if (strval($this->TEMPMRQ->EditValue) != "" && is_numeric($this->TEMPMRQ->EditValue)) {
                $this->TEMPMRQ->EditValue = FormatNumber($this->TEMPMRQ->EditValue, -2, -2, -2, -2);
            }

            // TAXP
            $this->TAXP->EditAttrs["class"] = "form-control";
            $this->TAXP->EditCustomAttributes = "";
            $this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
            $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
            if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue)) {
                $this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
            }

            // OLDRATE
            $this->OLDRATE->EditAttrs["class"] = "form-control";
            $this->OLDRATE->EditCustomAttributes = "";
            $this->OLDRATE->EditValue = HtmlEncode($this->OLDRATE->CurrentValue);
            $this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());
            if (strval($this->OLDRATE->EditValue) != "" && is_numeric($this->OLDRATE->EditValue)) {
                $this->OLDRATE->EditValue = FormatNumber($this->OLDRATE->EditValue, -2, -2, -2, -2);
            }

            // NEWRATE
            $this->NEWRATE->EditAttrs["class"] = "form-control";
            $this->NEWRATE->EditCustomAttributes = "";
            $this->NEWRATE->EditValue = HtmlEncode($this->NEWRATE->CurrentValue);
            $this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());
            if (strval($this->NEWRATE->EditValue) != "" && is_numeric($this->NEWRATE->EditValue)) {
                $this->NEWRATE->EditValue = FormatNumber($this->NEWRATE->EditValue, -2, -2, -2, -2);
            }

            // OTEMPMRA
            $this->OTEMPMRA->EditAttrs["class"] = "form-control";
            $this->OTEMPMRA->EditCustomAttributes = "";
            $this->OTEMPMRA->EditValue = HtmlEncode($this->OTEMPMRA->CurrentValue);
            $this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());
            if (strval($this->OTEMPMRA->EditValue) != "" && is_numeric($this->OTEMPMRA->EditValue)) {
                $this->OTEMPMRA->EditValue = FormatNumber($this->OTEMPMRA->EditValue, -2, -2, -2, -2);
            }

            // ACTIVESTATUS
            $this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
            $this->ACTIVESTATUS->EditCustomAttributes = "";
            if (!$this->ACTIVESTATUS->Raw) {
                $this->ACTIVESTATUS->CurrentValue = HtmlDecode($this->ACTIVESTATUS->CurrentValue);
            }
            $this->ACTIVESTATUS->EditValue = HtmlEncode($this->ACTIVESTATUS->CurrentValue);
            $this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

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

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // FRQ
            $this->FRQ->EditAttrs["class"] = "form-control";
            $this->FRQ->EditCustomAttributes = "";
            $this->FRQ->EditValue = HtmlEncode($this->FRQ->CurrentValue);
            $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());
            if (strval($this->FRQ->EditValue) != "" && is_numeric($this->FRQ->EditValue)) {
                $this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);
            }

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // BILLDATE
            $this->BILLDATE->EditAttrs["class"] = "form-control";
            $this->BILLDATE->EditCustomAttributes = "";
            $this->BILLDATE->EditValue = HtmlEncode(FormatDateTime($this->BILLDATE->CurrentValue, 8));
            $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

            // CreatedDateTime
            $this->CreatedDateTime->EditAttrs["class"] = "form-control";
            $this->CreatedDateTime->EditCustomAttributes = "";
            $this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->CreatedDateTime->CurrentValue, 8));
            $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

            // baid
            $this->baid->EditAttrs["class"] = "form-control";
            $this->baid->EditCustomAttributes = "";
            $this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
            $this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

            // Add refer script

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // OpeningStk
            $this->OpeningStk->LinkCustomAttributes = "";
            $this->OpeningStk->HrefValue = "";

            // PurchaseQty
            $this->PurchaseQty->LinkCustomAttributes = "";
            $this->PurchaseQty->HrefValue = "";

            // SalesQty
            $this->SalesQty->LinkCustomAttributes = "";
            $this->SalesQty->HrefValue = "";

            // ClosingStk
            $this->ClosingStk->LinkCustomAttributes = "";
            $this->ClosingStk->HrefValue = "";

            // PurchasefreeQty
            $this->PurchasefreeQty->LinkCustomAttributes = "";
            $this->PurchasefreeQty->HrefValue = "";

            // TransferingQty
            $this->TransferingQty->LinkCustomAttributes = "";
            $this->TransferingQty->HrefValue = "";

            // UnitPurchaseRate
            $this->UnitPurchaseRate->LinkCustomAttributes = "";
            $this->UnitPurchaseRate->HrefValue = "";

            // UnitSaleRate
            $this->UnitSaleRate->LinkCustomAttributes = "";
            $this->UnitSaleRate->HrefValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";

            // BATCH
            $this->BATCH->LinkCustomAttributes = "";
            $this->BATCH->HrefValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";

            // OLDRT
            $this->OLDRT->LinkCustomAttributes = "";
            $this->OLDRT->HrefValue = "";

            // TEMPMRQ
            $this->TEMPMRQ->LinkCustomAttributes = "";
            $this->TEMPMRQ->HrefValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";

            // OLDRATE
            $this->OLDRATE->LinkCustomAttributes = "";
            $this->OLDRATE->HrefValue = "";

            // NEWRATE
            $this->NEWRATE->LinkCustomAttributes = "";
            $this->NEWRATE->HrefValue = "";

            // OTEMPMRA
            $this->OTEMPMRA->LinkCustomAttributes = "";
            $this->OTEMPMRA->HrefValue = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->LinkCustomAttributes = "";
            $this->ACTIVESTATUS->HrefValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";

            // baid
            $this->baid->LinkCustomAttributes = "";
            $this->baid->HrefValue = "";
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
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->PrName->Required) {
            if (!$this->PrName->IsDetailKey && EmptyValue($this->PrName->FormValue)) {
                $this->PrName->addErrorMessage(str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
            }
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
            }
        }
        if ($this->OpeningStk->Required) {
            if (!$this->OpeningStk->IsDetailKey && EmptyValue($this->OpeningStk->FormValue)) {
                $this->OpeningStk->addErrorMessage(str_replace("%s", $this->OpeningStk->caption(), $this->OpeningStk->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OpeningStk->FormValue)) {
            $this->OpeningStk->addErrorMessage($this->OpeningStk->getErrorMessage(false));
        }
        if ($this->PurchaseQty->Required) {
            if (!$this->PurchaseQty->IsDetailKey && EmptyValue($this->PurchaseQty->FormValue)) {
                $this->PurchaseQty->addErrorMessage(str_replace("%s", $this->PurchaseQty->caption(), $this->PurchaseQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurchaseQty->FormValue)) {
            $this->PurchaseQty->addErrorMessage($this->PurchaseQty->getErrorMessage(false));
        }
        if ($this->SalesQty->Required) {
            if (!$this->SalesQty->IsDetailKey && EmptyValue($this->SalesQty->FormValue)) {
                $this->SalesQty->addErrorMessage(str_replace("%s", $this->SalesQty->caption(), $this->SalesQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SalesQty->FormValue)) {
            $this->SalesQty->addErrorMessage($this->SalesQty->getErrorMessage(false));
        }
        if ($this->ClosingStk->Required) {
            if (!$this->ClosingStk->IsDetailKey && EmptyValue($this->ClosingStk->FormValue)) {
                $this->ClosingStk->addErrorMessage(str_replace("%s", $this->ClosingStk->caption(), $this->ClosingStk->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ClosingStk->FormValue)) {
            $this->ClosingStk->addErrorMessage($this->ClosingStk->getErrorMessage(false));
        }
        if ($this->PurchasefreeQty->Required) {
            if (!$this->PurchasefreeQty->IsDetailKey && EmptyValue($this->PurchasefreeQty->FormValue)) {
                $this->PurchasefreeQty->addErrorMessage(str_replace("%s", $this->PurchasefreeQty->caption(), $this->PurchasefreeQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurchasefreeQty->FormValue)) {
            $this->PurchasefreeQty->addErrorMessage($this->PurchasefreeQty->getErrorMessage(false));
        }
        if ($this->TransferingQty->Required) {
            if (!$this->TransferingQty->IsDetailKey && EmptyValue($this->TransferingQty->FormValue)) {
                $this->TransferingQty->addErrorMessage(str_replace("%s", $this->TransferingQty->caption(), $this->TransferingQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TransferingQty->FormValue)) {
            $this->TransferingQty->addErrorMessage($this->TransferingQty->getErrorMessage(false));
        }
        if ($this->UnitPurchaseRate->Required) {
            if (!$this->UnitPurchaseRate->IsDetailKey && EmptyValue($this->UnitPurchaseRate->FormValue)) {
                $this->UnitPurchaseRate->addErrorMessage(str_replace("%s", $this->UnitPurchaseRate->caption(), $this->UnitPurchaseRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UnitPurchaseRate->FormValue)) {
            $this->UnitPurchaseRate->addErrorMessage($this->UnitPurchaseRate->getErrorMessage(false));
        }
        if ($this->UnitSaleRate->Required) {
            if (!$this->UnitSaleRate->IsDetailKey && EmptyValue($this->UnitSaleRate->FormValue)) {
                $this->UnitSaleRate->addErrorMessage(str_replace("%s", $this->UnitSaleRate->caption(), $this->UnitSaleRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UnitSaleRate->FormValue)) {
            $this->UnitSaleRate->addErrorMessage($this->UnitSaleRate->getErrorMessage(false));
        }
        if ($this->CreatedDate->Required) {
            if (!$this->CreatedDate->IsDetailKey && EmptyValue($this->CreatedDate->FormValue)) {
                $this->CreatedDate->addErrorMessage(str_replace("%s", $this->CreatedDate->caption(), $this->CreatedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CreatedDate->FormValue)) {
            $this->CreatedDate->addErrorMessage($this->CreatedDate->getErrorMessage(false));
        }
        if ($this->OQ->Required) {
            if (!$this->OQ->IsDetailKey && EmptyValue($this->OQ->FormValue)) {
                $this->OQ->addErrorMessage(str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OQ->FormValue)) {
            $this->OQ->addErrorMessage($this->OQ->getErrorMessage(false));
        }
        if ($this->RQ->Required) {
            if (!$this->RQ->IsDetailKey && EmptyValue($this->RQ->FormValue)) {
                $this->RQ->addErrorMessage(str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RQ->FormValue)) {
            $this->RQ->addErrorMessage($this->RQ->getErrorMessage(false));
        }
        if ($this->MRQ->Required) {
            if (!$this->MRQ->IsDetailKey && EmptyValue($this->MRQ->FormValue)) {
                $this->MRQ->addErrorMessage(str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRQ->FormValue)) {
            $this->MRQ->addErrorMessage($this->MRQ->getErrorMessage(false));
        }
        if ($this->IQ->Required) {
            if (!$this->IQ->IsDetailKey && EmptyValue($this->IQ->FormValue)) {
                $this->IQ->addErrorMessage(str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IQ->FormValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
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
        if ($this->UR->Required) {
            if (!$this->UR->IsDetailKey && EmptyValue($this->UR->FormValue)) {
                $this->UR->addErrorMessage(str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UR->FormValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if ($this->RT->Required) {
            if (!$this->RT->IsDetailKey && EmptyValue($this->RT->FormValue)) {
                $this->RT->addErrorMessage(str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RT->FormValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if ($this->PRCODE->Required) {
            if (!$this->PRCODE->IsDetailKey && EmptyValue($this->PRCODE->FormValue)) {
                $this->PRCODE->addErrorMessage(str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
            }
        }
        if ($this->BATCH->Required) {
            if (!$this->BATCH->IsDetailKey && EmptyValue($this->BATCH->FormValue)) {
                $this->BATCH->addErrorMessage(str_replace("%s", $this->BATCH->caption(), $this->BATCH->RequiredErrorMessage));
            }
        }
        if ($this->PC->Required) {
            if (!$this->PC->IsDetailKey && EmptyValue($this->PC->FormValue)) {
                $this->PC->addErrorMessage(str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
            }
        }
        if ($this->OLDRT->Required) {
            if (!$this->OLDRT->IsDetailKey && EmptyValue($this->OLDRT->FormValue)) {
                $this->OLDRT->addErrorMessage(str_replace("%s", $this->OLDRT->caption(), $this->OLDRT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OLDRT->FormValue)) {
            $this->OLDRT->addErrorMessage($this->OLDRT->getErrorMessage(false));
        }
        if ($this->TEMPMRQ->Required) {
            if (!$this->TEMPMRQ->IsDetailKey && EmptyValue($this->TEMPMRQ->FormValue)) {
                $this->TEMPMRQ->addErrorMessage(str_replace("%s", $this->TEMPMRQ->caption(), $this->TEMPMRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TEMPMRQ->FormValue)) {
            $this->TEMPMRQ->addErrorMessage($this->TEMPMRQ->getErrorMessage(false));
        }
        if ($this->TAXP->Required) {
            if (!$this->TAXP->IsDetailKey && EmptyValue($this->TAXP->FormValue)) {
                $this->TAXP->addErrorMessage(str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TAXP->FormValue)) {
            $this->TAXP->addErrorMessage($this->TAXP->getErrorMessage(false));
        }
        if ($this->OLDRATE->Required) {
            if (!$this->OLDRATE->IsDetailKey && EmptyValue($this->OLDRATE->FormValue)) {
                $this->OLDRATE->addErrorMessage(str_replace("%s", $this->OLDRATE->caption(), $this->OLDRATE->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OLDRATE->FormValue)) {
            $this->OLDRATE->addErrorMessage($this->OLDRATE->getErrorMessage(false));
        }
        if ($this->NEWRATE->Required) {
            if (!$this->NEWRATE->IsDetailKey && EmptyValue($this->NEWRATE->FormValue)) {
                $this->NEWRATE->addErrorMessage(str_replace("%s", $this->NEWRATE->caption(), $this->NEWRATE->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NEWRATE->FormValue)) {
            $this->NEWRATE->addErrorMessage($this->NEWRATE->getErrorMessage(false));
        }
        if ($this->OTEMPMRA->Required) {
            if (!$this->OTEMPMRA->IsDetailKey && EmptyValue($this->OTEMPMRA->FormValue)) {
                $this->OTEMPMRA->addErrorMessage(str_replace("%s", $this->OTEMPMRA->caption(), $this->OTEMPMRA->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OTEMPMRA->FormValue)) {
            $this->OTEMPMRA->addErrorMessage($this->OTEMPMRA->getErrorMessage(false));
        }
        if ($this->ACTIVESTATUS->Required) {
            if (!$this->ACTIVESTATUS->IsDetailKey && EmptyValue($this->ACTIVESTATUS->FormValue)) {
                $this->ACTIVESTATUS->addErrorMessage(str_replace("%s", $this->ACTIVESTATUS->caption(), $this->ACTIVESTATUS->RequiredErrorMessage));
            }
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
        if ($this->MFRCODE->Required) {
            if (!$this->MFRCODE->IsDetailKey && EmptyValue($this->MFRCODE->FormValue)) {
                $this->MFRCODE->addErrorMessage(str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
            }
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BRCODE->FormValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if ($this->FRQ->Required) {
            if (!$this->FRQ->IsDetailKey && EmptyValue($this->FRQ->FormValue)) {
                $this->FRQ->addErrorMessage(str_replace("%s", $this->FRQ->caption(), $this->FRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->FRQ->FormValue)) {
            $this->FRQ->addErrorMessage($this->FRQ->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if ($this->UM->Required) {
            if (!$this->UM->IsDetailKey && EmptyValue($this->UM->FormValue)) {
                $this->UM->addErrorMessage(str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
            }
        }
        if ($this->GENNAME->Required) {
            if (!$this->GENNAME->IsDetailKey && EmptyValue($this->GENNAME->FormValue)) {
                $this->GENNAME->addErrorMessage(str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
            }
        }
        if ($this->BILLDATE->Required) {
            if (!$this->BILLDATE->IsDetailKey && EmptyValue($this->BILLDATE->FormValue)) {
                $this->BILLDATE->addErrorMessage(str_replace("%s", $this->BILLDATE->caption(), $this->BILLDATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BILLDATE->FormValue)) {
            $this->BILLDATE->addErrorMessage($this->BILLDATE->getErrorMessage(false));
        }
        if ($this->CreatedDateTime->Required) {
            if (!$this->CreatedDateTime->IsDetailKey && EmptyValue($this->CreatedDateTime->FormValue)) {
                $this->CreatedDateTime->addErrorMessage(str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CreatedDateTime->FormValue)) {
            $this->CreatedDateTime->addErrorMessage($this->CreatedDateTime->getErrorMessage(false));
        }
        if ($this->baid->Required) {
            if (!$this->baid->IsDetailKey && EmptyValue($this->baid->FormValue)) {
                $this->baid->addErrorMessage(str_replace("%s", $this->baid->caption(), $this->baid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->baid->FormValue)) {
            $this->baid->addErrorMessage($this->baid->getErrorMessage(false));
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

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // PrName
        $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, false);

        // BATCHNO
        $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, false);

        // OpeningStk
        $this->OpeningStk->setDbValueDef($rsnew, $this->OpeningStk->CurrentValue, null, strval($this->OpeningStk->CurrentValue) == "");

        // PurchaseQty
        $this->PurchaseQty->setDbValueDef($rsnew, $this->PurchaseQty->CurrentValue, null, strval($this->PurchaseQty->CurrentValue) == "");

        // SalesQty
        $this->SalesQty->setDbValueDef($rsnew, $this->SalesQty->CurrentValue, null, strval($this->SalesQty->CurrentValue) == "");

        // ClosingStk
        $this->ClosingStk->setDbValueDef($rsnew, $this->ClosingStk->CurrentValue, null, strval($this->ClosingStk->CurrentValue) == "");

        // PurchasefreeQty
        $this->PurchasefreeQty->setDbValueDef($rsnew, $this->PurchasefreeQty->CurrentValue, null, strval($this->PurchasefreeQty->CurrentValue) == "");

        // TransferingQty
        $this->TransferingQty->setDbValueDef($rsnew, $this->TransferingQty->CurrentValue, null, strval($this->TransferingQty->CurrentValue) == "");

        // UnitPurchaseRate
        $this->UnitPurchaseRate->setDbValueDef($rsnew, $this->UnitPurchaseRate->CurrentValue, null, strval($this->UnitPurchaseRate->CurrentValue) == "");

        // UnitSaleRate
        $this->UnitSaleRate->setDbValueDef($rsnew, $this->UnitSaleRate->CurrentValue, null, strval($this->UnitSaleRate->CurrentValue) == "");

        // CreatedDate
        $this->CreatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDate->CurrentValue, 0), null, false);

        // OQ
        $this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, null, strval($this->OQ->CurrentValue) == "");

        // RQ
        $this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, null, strval($this->RQ->CurrentValue) == "");

        // MRQ
        $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, strval($this->MRQ->CurrentValue) == "");

        // IQ
        $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, strval($this->IQ->CurrentValue) == "");

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, strval($this->MRP->CurrentValue) == "");

        // EXPDT
        $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, false);

        // UR
        $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, strval($this->UR->CurrentValue) == "");

        // RT
        $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, strval($this->RT->CurrentValue) == "");

        // PRCODE
        $this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, null, false);

        // BATCH
        $this->BATCH->setDbValueDef($rsnew, $this->BATCH->CurrentValue, null, false);

        // PC
        $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, false);

        // OLDRT
        $this->OLDRT->setDbValueDef($rsnew, $this->OLDRT->CurrentValue, null, false);

        // TEMPMRQ
        $this->TEMPMRQ->setDbValueDef($rsnew, $this->TEMPMRQ->CurrentValue, null, false);

        // TAXP
        $this->TAXP->setDbValueDef($rsnew, $this->TAXP->CurrentValue, null, false);

        // OLDRATE
        $this->OLDRATE->setDbValueDef($rsnew, $this->OLDRATE->CurrentValue, null, false);

        // NEWRATE
        $this->NEWRATE->setDbValueDef($rsnew, $this->NEWRATE->CurrentValue, null, false);

        // OTEMPMRA
        $this->OTEMPMRA->setDbValueDef($rsnew, $this->OTEMPMRA->CurrentValue, null, false);

        // ACTIVESTATUS
        $this->ACTIVESTATUS->setDbValueDef($rsnew, $this->ACTIVESTATUS->CurrentValue, null, false);

        // PSGST
        $this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, null, strval($this->PSGST->CurrentValue) == "");

        // PCGST
        $this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, null, strval($this->PCGST->CurrentValue) == "");

        // SSGST
        $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, strval($this->SSGST->CurrentValue) == "");

        // SCGST
        $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, strval($this->SCGST->CurrentValue) == "");

        // MFRCODE
        $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, false);

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // FRQ
        $this->FRQ->setDbValueDef($rsnew, $this->FRQ->CurrentValue, null, strval($this->FRQ->CurrentValue) == "");

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // UM
        $this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, null, false);

        // GENNAME
        $this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, null, false);

        // BILLDATE
        $this->BILLDATE->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDATE->CurrentValue, 0), null, false);

        // CreatedDateTime
        $this->CreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0), null, false);

        // baid
        $this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, null, false);

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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyStockMovementList"), "", $this->TableVar, true);
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
