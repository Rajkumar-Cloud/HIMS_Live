<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewStoreTransferAdd extends ViewStoreTransfer
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_store_transfer';

    // Page object name
    public $PageObjName = "ViewStoreTransferAdd";

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

        // Table object (view_store_transfer)
        if (!isset($GLOBALS["view_store_transfer"]) || get_class($GLOBALS["view_store_transfer"]) == PROJECT_NAMESPACE . "view_store_transfer") {
            $GLOBALS["view_store_transfer"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_store_transfer');
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
                $doc = new $class(Container("view_store_transfer"));
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
                    if ($pageName == "ViewStoreTransferView") {
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
        $this->ORDNO->setVisibility();
        $this->PRC->setVisibility();
        $this->QTY->setVisibility();
        $this->DT->setVisibility();
        $this->PC->setVisibility();
        $this->YM->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->Stock->setVisibility();
        $this->LastMonthSale->setVisibility();
        $this->Printcheck->setVisibility();
        $this->id->Visible = false;
        $this->poid->setVisibility();
        $this->grnid->setVisibility();
        $this->BatchNo->setVisibility();
        $this->ExpDate->setVisibility();
        $this->PrName->setVisibility();
        $this->Quantity->setVisibility();
        $this->FreeQty->setVisibility();
        $this->ItemValue->setVisibility();
        $this->Disc->setVisibility();
        $this->PTax->setVisibility();
        $this->MRP->setVisibility();
        $this->SalTax->setVisibility();
        $this->PurValue->setVisibility();
        $this->PurRate->setVisibility();
        $this->SalRate->setVisibility();
        $this->Discount->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->BRCODE->setVisibility();
        $this->HSN->setVisibility();
        $this->Pack->setVisibility();
        $this->PUnit->setVisibility();
        $this->SUnit->setVisibility();
        $this->GrnQuantity->setVisibility();
        $this->GrnMRP->setVisibility();
        $this->strid->setVisibility();
        $this->HospID->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->grncreatedby->setVisibility();
        $this->grncreatedDateTime->setVisibility();
        $this->grnModifiedby->setVisibility();
        $this->grnModifiedDateTime->setVisibility();
        $this->Received->setVisibility();
        $this->BillDate->setVisibility();
        $this->CurStock->setVisibility();
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
        $this->setupLookupOptions($this->ORDNO);
        $this->setupLookupOptions($this->LastMonthSale);
        $this->setupLookupOptions($this->BRCODE);

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

        // Set up master/detail parameters
        // NOTE: must be after loadOldRecord to prevent master key values overwritten
        $this->setupMasterParms();

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
                    $this->terminate("ViewStoreTransferList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "ViewStoreTransferList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "ViewStoreTransferView") {
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
        $this->ORDNO->CurrentValue = null;
        $this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->QTY->CurrentValue = null;
        $this->QTY->OldValue = $this->QTY->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->YM->CurrentValue = null;
        $this->YM->OldValue = $this->YM->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->Stock->CurrentValue = null;
        $this->Stock->OldValue = $this->Stock->CurrentValue;
        $this->LastMonthSale->CurrentValue = null;
        $this->LastMonthSale->OldValue = $this->LastMonthSale->CurrentValue;
        $this->Printcheck->CurrentValue = null;
        $this->Printcheck->OldValue = $this->Printcheck->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->poid->CurrentValue = null;
        $this->poid->OldValue = $this->poid->CurrentValue;
        $this->grnid->CurrentValue = null;
        $this->grnid->OldValue = $this->grnid->CurrentValue;
        $this->BatchNo->CurrentValue = null;
        $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
        $this->ExpDate->CurrentValue = null;
        $this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
        $this->PrName->CurrentValue = null;
        $this->PrName->OldValue = $this->PrName->CurrentValue;
        $this->Quantity->CurrentValue = null;
        $this->Quantity->OldValue = $this->Quantity->CurrentValue;
        $this->FreeQty->CurrentValue = null;
        $this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
        $this->ItemValue->CurrentValue = null;
        $this->ItemValue->OldValue = $this->ItemValue->CurrentValue;
        $this->Disc->CurrentValue = null;
        $this->Disc->OldValue = $this->Disc->CurrentValue;
        $this->PTax->CurrentValue = null;
        $this->PTax->OldValue = $this->PTax->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->SalTax->CurrentValue = null;
        $this->SalTax->OldValue = $this->SalTax->CurrentValue;
        $this->PurValue->CurrentValue = null;
        $this->PurValue->OldValue = $this->PurValue->CurrentValue;
        $this->PurRate->CurrentValue = null;
        $this->PurRate->OldValue = $this->PurRate->CurrentValue;
        $this->SalRate->CurrentValue = null;
        $this->SalRate->OldValue = $this->SalRate->CurrentValue;
        $this->Discount->CurrentValue = null;
        $this->Discount->OldValue = $this->Discount->CurrentValue;
        $this->PSGST->CurrentValue = null;
        $this->PSGST->OldValue = $this->PSGST->CurrentValue;
        $this->PCGST->CurrentValue = null;
        $this->PCGST->OldValue = $this->PCGST->CurrentValue;
        $this->SSGST->CurrentValue = null;
        $this->SSGST->OldValue = $this->SSGST->CurrentValue;
        $this->SCGST->CurrentValue = null;
        $this->SCGST->OldValue = $this->SCGST->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->HSN->CurrentValue = null;
        $this->HSN->OldValue = $this->HSN->CurrentValue;
        $this->Pack->CurrentValue = null;
        $this->Pack->OldValue = $this->Pack->CurrentValue;
        $this->PUnit->CurrentValue = 0;
        $this->SUnit->CurrentValue = 0;
        $this->GrnQuantity->CurrentValue = null;
        $this->GrnQuantity->OldValue = $this->GrnQuantity->CurrentValue;
        $this->GrnMRP->CurrentValue = null;
        $this->GrnMRP->OldValue = $this->GrnMRP->CurrentValue;
        $this->strid->CurrentValue = null;
        $this->strid->OldValue = $this->strid->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->CreatedBy->CurrentValue = null;
        $this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
        $this->CreatedDateTime->CurrentValue = null;
        $this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
        $this->ModifiedBy->CurrentValue = null;
        $this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedDateTime->CurrentValue = null;
        $this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
        $this->grncreatedby->CurrentValue = null;
        $this->grncreatedby->OldValue = $this->grncreatedby->CurrentValue;
        $this->grncreatedDateTime->CurrentValue = null;
        $this->grncreatedDateTime->OldValue = $this->grncreatedDateTime->CurrentValue;
        $this->grnModifiedby->CurrentValue = null;
        $this->grnModifiedby->OldValue = $this->grnModifiedby->CurrentValue;
        $this->grnModifiedDateTime->CurrentValue = null;
        $this->grnModifiedDateTime->OldValue = $this->grnModifiedDateTime->CurrentValue;
        $this->Received->CurrentValue = null;
        $this->Received->OldValue = $this->Received->CurrentValue;
        $this->BillDate->CurrentValue = null;
        $this->BillDate->OldValue = $this->BillDate->CurrentValue;
        $this->CurStock->CurrentValue = null;
        $this->CurStock->OldValue = $this->CurStock->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'ORDNO' first before field var 'x_ORDNO'
        $val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
        if (!$this->ORDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ORDNO->Visible = false; // Disable update for API request
            } else {
                $this->ORDNO->setFormValue($val);
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

        // Check field name 'QTY' first before field var 'x_QTY'
        $val = $CurrentForm->hasValue("QTY") ? $CurrentForm->getValue("QTY") : $CurrentForm->getValue("x_QTY");
        if (!$this->QTY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->QTY->Visible = false; // Disable update for API request
            } else {
                $this->QTY->setFormValue($val);
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
            $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
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

        // Check field name 'YM' first before field var 'x_YM'
        $val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
        if (!$this->YM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->YM->Visible = false; // Disable update for API request
            } else {
                $this->YM->setFormValue($val);
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

        // Check field name 'Stock' first before field var 'x_Stock'
        $val = $CurrentForm->hasValue("Stock") ? $CurrentForm->getValue("Stock") : $CurrentForm->getValue("x_Stock");
        if (!$this->Stock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Stock->Visible = false; // Disable update for API request
            } else {
                $this->Stock->setFormValue($val);
            }
        }

        // Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
        $val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
        if (!$this->LastMonthSale->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LastMonthSale->Visible = false; // Disable update for API request
            } else {
                $this->LastMonthSale->setFormValue($val);
            }
        }

        // Check field name 'Printcheck' first before field var 'x_Printcheck'
        $val = $CurrentForm->hasValue("Printcheck") ? $CurrentForm->getValue("Printcheck") : $CurrentForm->getValue("x_Printcheck");
        if (!$this->Printcheck->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Printcheck->Visible = false; // Disable update for API request
            } else {
                $this->Printcheck->setFormValue($val);
            }
        }

        // Check field name 'poid' first before field var 'x_poid'
        $val = $CurrentForm->hasValue("poid") ? $CurrentForm->getValue("poid") : $CurrentForm->getValue("x_poid");
        if (!$this->poid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->poid->Visible = false; // Disable update for API request
            } else {
                $this->poid->setFormValue($val);
            }
        }

        // Check field name 'grnid' first before field var 'x_grnid'
        $val = $CurrentForm->hasValue("grnid") ? $CurrentForm->getValue("grnid") : $CurrentForm->getValue("x_grnid");
        if (!$this->grnid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnid->Visible = false; // Disable update for API request
            } else {
                $this->grnid->setFormValue($val);
            }
        }

        // Check field name 'BatchNo' first before field var 'x_BatchNo'
        $val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
        if (!$this->BatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchNo->Visible = false; // Disable update for API request
            } else {
                $this->BatchNo->setFormValue($val);
            }
        }

        // Check field name 'ExpDate' first before field var 'x_ExpDate'
        $val = $CurrentForm->hasValue("ExpDate") ? $CurrentForm->getValue("ExpDate") : $CurrentForm->getValue("x_ExpDate");
        if (!$this->ExpDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpDate->Visible = false; // Disable update for API request
            } else {
                $this->ExpDate->setFormValue($val);
            }
            $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
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

        // Check field name 'Quantity' first before field var 'x_Quantity'
        $val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
        if (!$this->Quantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Quantity->Visible = false; // Disable update for API request
            } else {
                $this->Quantity->setFormValue($val);
            }
        }

        // Check field name 'FreeQty' first before field var 'x_FreeQty'
        $val = $CurrentForm->hasValue("FreeQty") ? $CurrentForm->getValue("FreeQty") : $CurrentForm->getValue("x_FreeQty");
        if (!$this->FreeQty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeQty->Visible = false; // Disable update for API request
            } else {
                $this->FreeQty->setFormValue($val);
            }
        }

        // Check field name 'ItemValue' first before field var 'x_ItemValue'
        $val = $CurrentForm->hasValue("ItemValue") ? $CurrentForm->getValue("ItemValue") : $CurrentForm->getValue("x_ItemValue");
        if (!$this->ItemValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ItemValue->Visible = false; // Disable update for API request
            } else {
                $this->ItemValue->setFormValue($val);
            }
        }

        // Check field name 'Disc' first before field var 'x_Disc'
        $val = $CurrentForm->hasValue("Disc") ? $CurrentForm->getValue("Disc") : $CurrentForm->getValue("x_Disc");
        if (!$this->Disc->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Disc->Visible = false; // Disable update for API request
            } else {
                $this->Disc->setFormValue($val);
            }
        }

        // Check field name 'PTax' first before field var 'x_PTax'
        $val = $CurrentForm->hasValue("PTax") ? $CurrentForm->getValue("PTax") : $CurrentForm->getValue("x_PTax");
        if (!$this->PTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PTax->Visible = false; // Disable update for API request
            } else {
                $this->PTax->setFormValue($val);
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

        // Check field name 'SalTax' first before field var 'x_SalTax'
        $val = $CurrentForm->hasValue("SalTax") ? $CurrentForm->getValue("SalTax") : $CurrentForm->getValue("x_SalTax");
        if (!$this->SalTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalTax->Visible = false; // Disable update for API request
            } else {
                $this->SalTax->setFormValue($val);
            }
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

        // Check field name 'PurRate' first before field var 'x_PurRate'
        $val = $CurrentForm->hasValue("PurRate") ? $CurrentForm->getValue("PurRate") : $CurrentForm->getValue("x_PurRate");
        if (!$this->PurRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurRate->Visible = false; // Disable update for API request
            } else {
                $this->PurRate->setFormValue($val);
            }
        }

        // Check field name 'SalRate' first before field var 'x_SalRate'
        $val = $CurrentForm->hasValue("SalRate") ? $CurrentForm->getValue("SalRate") : $CurrentForm->getValue("x_SalRate");
        if (!$this->SalRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalRate->Visible = false; // Disable update for API request
            } else {
                $this->SalRate->setFormValue($val);
            }
        }

        // Check field name 'Discount' first before field var 'x_Discount'
        $val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
        if (!$this->Discount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Discount->Visible = false; // Disable update for API request
            } else {
                $this->Discount->setFormValue($val);
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

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }

        // Check field name 'HSN' first before field var 'x_HSN'
        $val = $CurrentForm->hasValue("HSN") ? $CurrentForm->getValue("HSN") : $CurrentForm->getValue("x_HSN");
        if (!$this->HSN->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HSN->Visible = false; // Disable update for API request
            } else {
                $this->HSN->setFormValue($val);
            }
        }

        // Check field name 'Pack' first before field var 'x_Pack'
        $val = $CurrentForm->hasValue("Pack") ? $CurrentForm->getValue("Pack") : $CurrentForm->getValue("x_Pack");
        if (!$this->Pack->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pack->Visible = false; // Disable update for API request
            } else {
                $this->Pack->setFormValue($val);
            }
        }

        // Check field name 'PUnit' first before field var 'x_PUnit'
        $val = $CurrentForm->hasValue("PUnit") ? $CurrentForm->getValue("PUnit") : $CurrentForm->getValue("x_PUnit");
        if (!$this->PUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PUnit->Visible = false; // Disable update for API request
            } else {
                $this->PUnit->setFormValue($val);
            }
        }

        // Check field name 'SUnit' first before field var 'x_SUnit'
        $val = $CurrentForm->hasValue("SUnit") ? $CurrentForm->getValue("SUnit") : $CurrentForm->getValue("x_SUnit");
        if (!$this->SUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SUnit->Visible = false; // Disable update for API request
            } else {
                $this->SUnit->setFormValue($val);
            }
        }

        // Check field name 'GrnQuantity' first before field var 'x_GrnQuantity'
        $val = $CurrentForm->hasValue("GrnQuantity") ? $CurrentForm->getValue("GrnQuantity") : $CurrentForm->getValue("x_GrnQuantity");
        if (!$this->GrnQuantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GrnQuantity->Visible = false; // Disable update for API request
            } else {
                $this->GrnQuantity->setFormValue($val);
            }
        }

        // Check field name 'GrnMRP' first before field var 'x_GrnMRP'
        $val = $CurrentForm->hasValue("GrnMRP") ? $CurrentForm->getValue("GrnMRP") : $CurrentForm->getValue("x_GrnMRP");
        if (!$this->GrnMRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GrnMRP->Visible = false; // Disable update for API request
            } else {
                $this->GrnMRP->setFormValue($val);
            }
        }

        // Check field name 'strid' first before field var 'x_strid'
        $val = $CurrentForm->hasValue("strid") ? $CurrentForm->getValue("strid") : $CurrentForm->getValue("x_strid");
        if (!$this->strid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->strid->Visible = false; // Disable update for API request
            } else {
                $this->strid->setFormValue($val);
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

        // Check field name 'CreatedBy' first before field var 'x_CreatedBy'
        $val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
        if (!$this->CreatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedBy->Visible = false; // Disable update for API request
            } else {
                $this->CreatedBy->setFormValue($val);
            }
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

        // Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
        $val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
        if (!$this->ModifiedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedBy->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedBy->setFormValue($val);
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

        // Check field name 'grncreatedby' first before field var 'x_grncreatedby'
        $val = $CurrentForm->hasValue("grncreatedby") ? $CurrentForm->getValue("grncreatedby") : $CurrentForm->getValue("x_grncreatedby");
        if (!$this->grncreatedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grncreatedby->Visible = false; // Disable update for API request
            } else {
                $this->grncreatedby->setFormValue($val);
            }
        }

        // Check field name 'grncreatedDateTime' first before field var 'x_grncreatedDateTime'
        $val = $CurrentForm->hasValue("grncreatedDateTime") ? $CurrentForm->getValue("grncreatedDateTime") : $CurrentForm->getValue("x_grncreatedDateTime");
        if (!$this->grncreatedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grncreatedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->grncreatedDateTime->setFormValue($val);
            }
            $this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
        }

        // Check field name 'grnModifiedby' first before field var 'x_grnModifiedby'
        $val = $CurrentForm->hasValue("grnModifiedby") ? $CurrentForm->getValue("grnModifiedby") : $CurrentForm->getValue("x_grnModifiedby");
        if (!$this->grnModifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnModifiedby->Visible = false; // Disable update for API request
            } else {
                $this->grnModifiedby->setFormValue($val);
            }
        }

        // Check field name 'grnModifiedDateTime' first before field var 'x_grnModifiedDateTime'
        $val = $CurrentForm->hasValue("grnModifiedDateTime") ? $CurrentForm->getValue("grnModifiedDateTime") : $CurrentForm->getValue("x_grnModifiedDateTime");
        if (!$this->grnModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->grnModifiedDateTime->setFormValue($val);
            }
            $this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
        }

        // Check field name 'Received' first before field var 'x_Received'
        $val = $CurrentForm->hasValue("Received") ? $CurrentForm->getValue("Received") : $CurrentForm->getValue("x_Received");
        if (!$this->Received->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Received->Visible = false; // Disable update for API request
            } else {
                $this->Received->setFormValue($val);
            }
        }

        // Check field name 'BillDate' first before field var 'x_BillDate'
        $val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
        if (!$this->BillDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillDate->Visible = false; // Disable update for API request
            } else {
                $this->BillDate->setFormValue($val);
            }
            $this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
        }

        // Check field name 'CurStock' first before field var 'x_CurStock'
        $val = $CurrentForm->hasValue("CurStock") ? $CurrentForm->getValue("CurStock") : $CurrentForm->getValue("x_CurStock");
        if (!$this->CurStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CurStock->Visible = false; // Disable update for API request
            } else {
                $this->CurStock->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->QTY->CurrentValue = $this->QTY->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        $this->PC->CurrentValue = $this->PC->FormValue;
        $this->YM->CurrentValue = $this->YM->FormValue;
        $this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
        $this->Stock->CurrentValue = $this->Stock->FormValue;
        $this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
        $this->Printcheck->CurrentValue = $this->Printcheck->FormValue;
        $this->poid->CurrentValue = $this->poid->FormValue;
        $this->grnid->CurrentValue = $this->grnid->FormValue;
        $this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
        $this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
        $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
        $this->PrName->CurrentValue = $this->PrName->FormValue;
        $this->Quantity->CurrentValue = $this->Quantity->FormValue;
        $this->FreeQty->CurrentValue = $this->FreeQty->FormValue;
        $this->ItemValue->CurrentValue = $this->ItemValue->FormValue;
        $this->Disc->CurrentValue = $this->Disc->FormValue;
        $this->PTax->CurrentValue = $this->PTax->FormValue;
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->SalTax->CurrentValue = $this->SalTax->FormValue;
        $this->PurValue->CurrentValue = $this->PurValue->FormValue;
        $this->PurRate->CurrentValue = $this->PurRate->FormValue;
        $this->SalRate->CurrentValue = $this->SalRate->FormValue;
        $this->Discount->CurrentValue = $this->Discount->FormValue;
        $this->PSGST->CurrentValue = $this->PSGST->FormValue;
        $this->PCGST->CurrentValue = $this->PCGST->FormValue;
        $this->SSGST->CurrentValue = $this->SSGST->FormValue;
        $this->SCGST->CurrentValue = $this->SCGST->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->HSN->CurrentValue = $this->HSN->FormValue;
        $this->Pack->CurrentValue = $this->Pack->FormValue;
        $this->PUnit->CurrentValue = $this->PUnit->FormValue;
        $this->SUnit->CurrentValue = $this->SUnit->FormValue;
        $this->GrnQuantity->CurrentValue = $this->GrnQuantity->FormValue;
        $this->GrnMRP->CurrentValue = $this->GrnMRP->FormValue;
        $this->strid->CurrentValue = $this->strid->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
        $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
        $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
        $this->grncreatedby->CurrentValue = $this->grncreatedby->FormValue;
        $this->grncreatedDateTime->CurrentValue = $this->grncreatedDateTime->FormValue;
        $this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
        $this->grnModifiedby->CurrentValue = $this->grnModifiedby->FormValue;
        $this->grnModifiedDateTime->CurrentValue = $this->grnModifiedDateTime->FormValue;
        $this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
        $this->Received->CurrentValue = $this->Received->FormValue;
        $this->BillDate->CurrentValue = $this->BillDate->FormValue;
        $this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
        $this->CurStock->CurrentValue = $this->CurStock->FormValue;
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
        $this->ORDNO->setDbValue($row['ORDNO']);
        $this->PRC->setDbValue($row['PRC']);
        $this->QTY->setDbValue($row['QTY']);
        $this->DT->setDbValue($row['DT']);
        $this->PC->setDbValue($row['PC']);
        $this->YM->setDbValue($row['YM']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->Stock->setDbValue($row['Stock']);
        $this->LastMonthSale->setDbValue($row['LastMonthSale']);
        $this->Printcheck->setDbValue($row['Printcheck']);
        $this->id->setDbValue($row['id']);
        $this->poid->setDbValue($row['poid']);
        $this->grnid->setDbValue($row['grnid']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->ExpDate->setDbValue($row['ExpDate']);
        $this->PrName->setDbValue($row['PrName']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->FreeQty->setDbValue($row['FreeQty']);
        $this->ItemValue->setDbValue($row['ItemValue']);
        $this->Disc->setDbValue($row['Disc']);
        $this->PTax->setDbValue($row['PTax']);
        $this->MRP->setDbValue($row['MRP']);
        $this->SalTax->setDbValue($row['SalTax']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->SalRate->setDbValue($row['SalRate']);
        $this->Discount->setDbValue($row['Discount']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->HSN->setDbValue($row['HSN']);
        $this->Pack->setDbValue($row['Pack']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->GrnQuantity->setDbValue($row['GrnQuantity']);
        $this->GrnMRP->setDbValue($row['GrnMRP']);
        $this->strid->setDbValue($row['strid']);
        $this->HospID->setDbValue($row['HospID']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->grncreatedby->setDbValue($row['grncreatedby']);
        $this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
        $this->grnModifiedby->setDbValue($row['grnModifiedby']);
        $this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
        $this->Received->setDbValue($row['Received']);
        $this->BillDate->setDbValue($row['BillDate']);
        $this->CurStock->setDbValue($row['CurStock']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ORDNO'] = $this->ORDNO->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['QTY'] = $this->QTY->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['YM'] = $this->YM->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['Stock'] = $this->Stock->CurrentValue;
        $row['LastMonthSale'] = $this->LastMonthSale->CurrentValue;
        $row['Printcheck'] = $this->Printcheck->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['poid'] = $this->poid->CurrentValue;
        $row['grnid'] = $this->grnid->CurrentValue;
        $row['BatchNo'] = $this->BatchNo->CurrentValue;
        $row['ExpDate'] = $this->ExpDate->CurrentValue;
        $row['PrName'] = $this->PrName->CurrentValue;
        $row['Quantity'] = $this->Quantity->CurrentValue;
        $row['FreeQty'] = $this->FreeQty->CurrentValue;
        $row['ItemValue'] = $this->ItemValue->CurrentValue;
        $row['Disc'] = $this->Disc->CurrentValue;
        $row['PTax'] = $this->PTax->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['SalTax'] = $this->SalTax->CurrentValue;
        $row['PurValue'] = $this->PurValue->CurrentValue;
        $row['PurRate'] = $this->PurRate->CurrentValue;
        $row['SalRate'] = $this->SalRate->CurrentValue;
        $row['Discount'] = $this->Discount->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['HSN'] = $this->HSN->CurrentValue;
        $row['Pack'] = $this->Pack->CurrentValue;
        $row['PUnit'] = $this->PUnit->CurrentValue;
        $row['SUnit'] = $this->SUnit->CurrentValue;
        $row['GrnQuantity'] = $this->GrnQuantity->CurrentValue;
        $row['GrnMRP'] = $this->GrnMRP->CurrentValue;
        $row['strid'] = $this->strid->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['CreatedBy'] = $this->CreatedBy->CurrentValue;
        $row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
        $row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
        $row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
        $row['grncreatedby'] = $this->grncreatedby->CurrentValue;
        $row['grncreatedDateTime'] = $this->grncreatedDateTime->CurrentValue;
        $row['grnModifiedby'] = $this->grnModifiedby->CurrentValue;
        $row['grnModifiedDateTime'] = $this->grnModifiedDateTime->CurrentValue;
        $row['Received'] = $this->Received->CurrentValue;
        $row['BillDate'] = $this->BillDate->CurrentValue;
        $row['CurStock'] = $this->CurStock->CurrentValue;
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
        if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue))) {
            $this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PTax->FormValue == $this->PTax->CurrentValue && is_numeric(ConvertToFloatString($this->PTax->CurrentValue))) {
            $this->PTax->CurrentValue = ConvertToFloatString($this->PTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalTax->FormValue == $this->SalTax->CurrentValue && is_numeric(ConvertToFloatString($this->SalTax->CurrentValue))) {
            $this->SalTax->CurrentValue = ConvertToFloatString($this->SalTax->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalRate->FormValue == $this->SalRate->CurrentValue && is_numeric(ConvertToFloatString($this->SalRate->CurrentValue))) {
            $this->SalRate->CurrentValue = ConvertToFloatString($this->SalRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
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
        if ($this->GrnMRP->FormValue == $this->GrnMRP->CurrentValue && is_numeric(ConvertToFloatString($this->GrnMRP->CurrentValue))) {
            $this->GrnMRP->CurrentValue = ConvertToFloatString($this->GrnMRP->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ORDNO

        // PRC

        // QTY

        // DT

        // PC

        // YM

        // MFRCODE

        // Stock

        // LastMonthSale

        // Printcheck

        // id

        // poid

        // grnid

        // BatchNo

        // ExpDate

        // PrName

        // Quantity

        // FreeQty

        // ItemValue

        // Disc

        // PTax

        // MRP

        // SalTax

        // PurValue

        // PurRate

        // SalRate

        // Discount

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // BRCODE

        // HSN

        // Pack

        // PUnit

        // SUnit

        // GrnQuantity

        // GrnMRP

        // strid

        // HospID

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // grncreatedby

        // grncreatedDateTime

        // grnModifiedby

        // grnModifiedDateTime

        // Received

        // BillDate

        // CurStock
        if ($this->RowType == ROWTYPE_VIEW) {
            // ORDNO
            $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
            $curVal = trim(strval($this->ORDNO->CurrentValue));
            if ($curVal != "") {
                $this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
                if ($this->ORDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ORDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ORDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
                    } else {
                        $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
                    }
                }
            } else {
                $this->ORDNO->ViewValue = null;
            }
            $this->ORDNO->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // QTY
            $this->QTY->ViewValue = $this->QTY->CurrentValue;
            $this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
            $this->QTY->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // Stock
            $this->Stock->ViewValue = $this->Stock->CurrentValue;
            $this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
            $this->Stock->ViewCustomAttributes = "";

            // LastMonthSale
            $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
                    }
                }
            } else {
                $this->LastMonthSale->ViewValue = null;
            }
            $this->LastMonthSale->ViewCustomAttributes = "";

            // Printcheck
            $this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
            $this->Printcheck->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // poid
            $this->poid->ViewValue = $this->poid->CurrentValue;
            $this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
            $this->poid->ViewCustomAttributes = "";

            // grnid
            $this->grnid->ViewValue = $this->grnid->CurrentValue;
            $this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
            $this->grnid->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // ExpDate
            $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
            $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
            $this->ExpDate->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // FreeQty
            $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
            $this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
            $this->FreeQty->ViewCustomAttributes = "";

            // ItemValue
            $this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
            $this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
            $this->ItemValue->ViewCustomAttributes = "";

            // Disc
            $this->Disc->ViewValue = $this->Disc->CurrentValue;
            $this->Disc->ViewCustomAttributes = "";

            // PTax
            $this->PTax->ViewValue = $this->PTax->CurrentValue;
            $this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
            $this->PTax->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // SalTax
            $this->SalTax->ViewValue = $this->SalTax->CurrentValue;
            $this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
            $this->SalTax->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // SalRate
            $this->SalRate->ViewValue = $this->SalRate->CurrentValue;
            $this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
            $this->SalRate->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

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

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
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

            // HSN
            $this->HSN->ViewValue = $this->HSN->CurrentValue;
            $this->HSN->ViewCustomAttributes = "";

            // Pack
            $this->Pack->ViewValue = $this->Pack->CurrentValue;
            $this->Pack->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // GrnQuantity
            $this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
            $this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
            $this->GrnQuantity->ViewCustomAttributes = "";

            // GrnMRP
            $this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
            $this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
            $this->GrnMRP->ViewCustomAttributes = "";

            // strid
            $this->strid->ViewValue = $this->strid->CurrentValue;
            $this->strid->ViewValue = FormatNumber($this->strid->ViewValue, 0, -2, -2, -2);
            $this->strid->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // grncreatedby
            $this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
            $this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
            $this->grncreatedby->ViewCustomAttributes = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
            $this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
            $this->grncreatedDateTime->ViewCustomAttributes = "";

            // grnModifiedby
            $this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
            $this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
            $this->grnModifiedby->ViewCustomAttributes = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
            $this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
            $this->grnModifiedDateTime->ViewCustomAttributes = "";

            // Received
            $this->Received->ViewValue = $this->Received->CurrentValue;
            $this->Received->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
            $this->BillDate->ViewCustomAttributes = "";

            // CurStock
            $this->CurStock->ViewValue = $this->CurStock->CurrentValue;
            $this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
            $this->CurStock->ViewCustomAttributes = "";

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";
            $this->ORDNO->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // QTY
            $this->QTY->LinkCustomAttributes = "";
            $this->QTY->HrefValue = "";
            $this->QTY->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";
            $this->YM->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // Stock
            $this->Stock->LinkCustomAttributes = "";
            $this->Stock->HrefValue = "";
            $this->Stock->TooltipValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";
            $this->LastMonthSale->TooltipValue = "";

            // Printcheck
            $this->Printcheck->LinkCustomAttributes = "";
            $this->Printcheck->HrefValue = "";
            $this->Printcheck->TooltipValue = "";

            // poid
            $this->poid->LinkCustomAttributes = "";
            $this->poid->HrefValue = "";
            $this->poid->TooltipValue = "";

            // grnid
            $this->grnid->LinkCustomAttributes = "";
            $this->grnid->HrefValue = "";
            $this->grnid->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";
            $this->ExpDate->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";
            $this->FreeQty->TooltipValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";
            $this->ItemValue->TooltipValue = "";

            // Disc
            $this->Disc->LinkCustomAttributes = "";
            $this->Disc->HrefValue = "";
            $this->Disc->TooltipValue = "";

            // PTax
            $this->PTax->LinkCustomAttributes = "";
            $this->PTax->HrefValue = "";
            $this->PTax->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // SalTax
            $this->SalTax->LinkCustomAttributes = "";
            $this->SalTax->HrefValue = "";
            $this->SalTax->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";

            // SalRate
            $this->SalRate->LinkCustomAttributes = "";
            $this->SalRate->HrefValue = "";
            $this->SalRate->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

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

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // HSN
            $this->HSN->LinkCustomAttributes = "";
            $this->HSN->HrefValue = "";
            $this->HSN->TooltipValue = "";

            // Pack
            $this->Pack->LinkCustomAttributes = "";
            $this->Pack->HrefValue = "";
            $this->Pack->TooltipValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";
            $this->PUnit->TooltipValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";
            $this->SUnit->TooltipValue = "";

            // GrnQuantity
            $this->GrnQuantity->LinkCustomAttributes = "";
            $this->GrnQuantity->HrefValue = "";
            $this->GrnQuantity->TooltipValue = "";

            // GrnMRP
            $this->GrnMRP->LinkCustomAttributes = "";
            $this->GrnMRP->HrefValue = "";
            $this->GrnMRP->TooltipValue = "";

            // strid
            $this->strid->LinkCustomAttributes = "";
            $this->strid->HrefValue = "";
            $this->strid->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";
            $this->grncreatedby->TooltipValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";
            $this->grncreatedDateTime->TooltipValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";
            $this->grnModifiedby->TooltipValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";
            $this->grnModifiedDateTime->TooltipValue = "";

            // Received
            $this->Received->LinkCustomAttributes = "";
            $this->Received->HrefValue = "";
            $this->Received->TooltipValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";
            $this->BillDate->TooltipValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
            $this->CurStock->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ORDNO

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // QTY
            $this->QTY->EditAttrs["class"] = "form-control";
            $this->QTY->EditCustomAttributes = "";
            $this->QTY->EditValue = HtmlEncode($this->QTY->CurrentValue);
            $this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // YM
            $this->YM->EditAttrs["class"] = "form-control";
            $this->YM->EditCustomAttributes = "";
            if (!$this->YM->Raw) {
                $this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
            }
            $this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
            $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // Stock
            $this->Stock->EditAttrs["class"] = "form-control";
            $this->Stock->EditCustomAttributes = "";
            $this->Stock->EditValue = HtmlEncode($this->Stock->CurrentValue);
            $this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

            // LastMonthSale
            $this->LastMonthSale->EditAttrs["class"] = "form-control";
            $this->LastMonthSale->EditCustomAttributes = "";
            $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
                    }
                }
            } else {
                $this->LastMonthSale->EditValue = null;
            }
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // Printcheck
            $this->Printcheck->EditAttrs["class"] = "form-control";
            $this->Printcheck->EditCustomAttributes = "";
            if (!$this->Printcheck->Raw) {
                $this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
            }
            $this->Printcheck->EditValue = HtmlEncode($this->Printcheck->CurrentValue);
            $this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

            // poid
            $this->poid->EditAttrs["class"] = "form-control";
            $this->poid->EditCustomAttributes = "";
            $this->poid->EditValue = HtmlEncode($this->poid->CurrentValue);
            $this->poid->PlaceHolder = RemoveHtml($this->poid->caption());

            // grnid
            $this->grnid->EditAttrs["class"] = "form-control";
            $this->grnid->EditCustomAttributes = "";
            $this->grnid->EditValue = HtmlEncode($this->grnid->CurrentValue);
            $this->grnid->PlaceHolder = RemoveHtml($this->grnid->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // FreeQty
            $this->FreeQty->EditAttrs["class"] = "form-control";
            $this->FreeQty->EditCustomAttributes = "";
            $this->FreeQty->EditValue = HtmlEncode($this->FreeQty->CurrentValue);
            $this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

            // ItemValue
            $this->ItemValue->EditAttrs["class"] = "form-control";
            $this->ItemValue->EditCustomAttributes = "";
            $this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
            $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
            if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue)) {
                $this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
            }

            // Disc
            $this->Disc->EditAttrs["class"] = "form-control";
            $this->Disc->EditCustomAttributes = "";
            if (!$this->Disc->Raw) {
                $this->Disc->CurrentValue = HtmlDecode($this->Disc->CurrentValue);
            }
            $this->Disc->EditValue = HtmlEncode($this->Disc->CurrentValue);
            $this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());

            // PTax
            $this->PTax->EditAttrs["class"] = "form-control";
            $this->PTax->EditCustomAttributes = "";
            $this->PTax->EditValue = HtmlEncode($this->PTax->CurrentValue);
            $this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());
            if (strval($this->PTax->EditValue) != "" && is_numeric($this->PTax->EditValue)) {
                $this->PTax->EditValue = FormatNumber($this->PTax->EditValue, -2, -2, -2, -2);
            }

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
            }

            // SalTax
            $this->SalTax->EditAttrs["class"] = "form-control";
            $this->SalTax->EditCustomAttributes = "";
            $this->SalTax->EditValue = HtmlEncode($this->SalTax->CurrentValue);
            $this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());
            if (strval($this->SalTax->EditValue) != "" && is_numeric($this->SalTax->EditValue)) {
                $this->SalTax->EditValue = FormatNumber($this->SalTax->EditValue, -2, -2, -2, -2);
            }

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
            if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
                $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
            }

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
            if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
                $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
            }

            // SalRate
            $this->SalRate->EditAttrs["class"] = "form-control";
            $this->SalRate->EditCustomAttributes = "";
            $this->SalRate->EditValue = HtmlEncode($this->SalRate->CurrentValue);
            $this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
            if (strval($this->SalRate->EditValue) != "" && is_numeric($this->SalRate->EditValue)) {
                $this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);
            }

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
            if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
                $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
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

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
                    }
                }
            } else {
                $this->BRCODE->EditValue = null;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // HSN
            $this->HSN->EditAttrs["class"] = "form-control";
            $this->HSN->EditCustomAttributes = "";
            if (!$this->HSN->Raw) {
                $this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
            }
            $this->HSN->EditValue = HtmlEncode($this->HSN->CurrentValue);
            $this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

            // Pack
            $this->Pack->EditAttrs["class"] = "form-control";
            $this->Pack->EditCustomAttributes = "";
            if (!$this->Pack->Raw) {
                $this->Pack->CurrentValue = HtmlDecode($this->Pack->CurrentValue);
            }
            $this->Pack->EditValue = HtmlEncode($this->Pack->CurrentValue);
            $this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // GrnQuantity
            $this->GrnQuantity->EditAttrs["class"] = "form-control";
            $this->GrnQuantity->EditCustomAttributes = "";
            $this->GrnQuantity->EditValue = HtmlEncode($this->GrnQuantity->CurrentValue);
            $this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

            // GrnMRP
            $this->GrnMRP->EditAttrs["class"] = "form-control";
            $this->GrnMRP->EditCustomAttributes = "";
            $this->GrnMRP->EditValue = HtmlEncode($this->GrnMRP->CurrentValue);
            $this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());
            if (strval($this->GrnMRP->EditValue) != "" && is_numeric($this->GrnMRP->EditValue)) {
                $this->GrnMRP->EditValue = FormatNumber($this->GrnMRP->EditValue, -2, -2, -2, -2);
            }

            // strid
            $this->strid->EditAttrs["class"] = "form-control";
            $this->strid->EditCustomAttributes = "";
            if ($this->strid->getSessionValue() != "") {
                $this->strid->CurrentValue = GetForeignKeyValue($this->strid->getSessionValue());
                $this->strid->ViewValue = $this->strid->CurrentValue;
                $this->strid->ViewValue = FormatNumber($this->strid->ViewValue, 0, -2, -2, -2);
                $this->strid->ViewCustomAttributes = "";
            } else {
                $this->strid->EditValue = HtmlEncode($this->strid->CurrentValue);
                $this->strid->PlaceHolder = RemoveHtml($this->strid->caption());
            }

            // HospID

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreatedDateTime
            $this->CreatedDateTime->EditAttrs["class"] = "form-control";
            $this->CreatedDateTime->EditCustomAttributes = "";
            $this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->CreatedDateTime->CurrentValue, 8));
            $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            $this->ModifiedDateTime->EditValue = HtmlEncode(FormatDateTime($this->ModifiedDateTime->CurrentValue, 8));
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // grncreatedby

            // grncreatedDateTime

            // grnModifiedby

            // grnModifiedDateTime

            // Received
            $this->Received->EditAttrs["class"] = "form-control";
            $this->Received->EditCustomAttributes = "";
            if (!$this->Received->Raw) {
                $this->Received->CurrentValue = HtmlDecode($this->Received->CurrentValue);
            }
            $this->Received->EditValue = HtmlEncode($this->Received->CurrentValue);
            $this->Received->PlaceHolder = RemoveHtml($this->Received->caption());

            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // CurStock
            $this->CurStock->EditAttrs["class"] = "form-control";
            $this->CurStock->EditCustomAttributes = "";
            $this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
            $this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

            // Add refer script

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // QTY
            $this->QTY->LinkCustomAttributes = "";
            $this->QTY->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // Stock
            $this->Stock->LinkCustomAttributes = "";
            $this->Stock->HrefValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";

            // Printcheck
            $this->Printcheck->LinkCustomAttributes = "";
            $this->Printcheck->HrefValue = "";

            // poid
            $this->poid->LinkCustomAttributes = "";
            $this->poid->HrefValue = "";

            // grnid
            $this->grnid->LinkCustomAttributes = "";
            $this->grnid->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // FreeQty
            $this->FreeQty->LinkCustomAttributes = "";
            $this->FreeQty->HrefValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";

            // Disc
            $this->Disc->LinkCustomAttributes = "";
            $this->Disc->HrefValue = "";

            // PTax
            $this->PTax->LinkCustomAttributes = "";
            $this->PTax->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // SalTax
            $this->SalTax->LinkCustomAttributes = "";
            $this->SalTax->HrefValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";

            // SalRate
            $this->SalRate->LinkCustomAttributes = "";
            $this->SalRate->HrefValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";

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

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // HSN
            $this->HSN->LinkCustomAttributes = "";
            $this->HSN->HrefValue = "";

            // Pack
            $this->Pack->LinkCustomAttributes = "";
            $this->Pack->HrefValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";

            // GrnQuantity
            $this->GrnQuantity->LinkCustomAttributes = "";
            $this->GrnQuantity->HrefValue = "";

            // GrnMRP
            $this->GrnMRP->LinkCustomAttributes = "";
            $this->GrnMRP->HrefValue = "";

            // strid
            $this->strid->LinkCustomAttributes = "";
            $this->strid->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";

            // Received
            $this->Received->LinkCustomAttributes = "";
            $this->Received->HrefValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
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
        if ($this->ORDNO->Required) {
            if (!$this->ORDNO->IsDetailKey && EmptyValue($this->ORDNO->FormValue)) {
                $this->ORDNO->addErrorMessage(str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
            }
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->QTY->Required) {
            if (!$this->QTY->IsDetailKey && EmptyValue($this->QTY->FormValue)) {
                $this->QTY->addErrorMessage(str_replace("%s", $this->QTY->caption(), $this->QTY->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->QTY->FormValue)) {
            $this->QTY->addErrorMessage($this->QTY->getErrorMessage(false));
        }
        if ($this->DT->Required) {
            if (!$this->DT->IsDetailKey && EmptyValue($this->DT->FormValue)) {
                $this->DT->addErrorMessage(str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DT->FormValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if ($this->PC->Required) {
            if (!$this->PC->IsDetailKey && EmptyValue($this->PC->FormValue)) {
                $this->PC->addErrorMessage(str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
            }
        }
        if ($this->YM->Required) {
            if (!$this->YM->IsDetailKey && EmptyValue($this->YM->FormValue)) {
                $this->YM->addErrorMessage(str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
            }
        }
        if ($this->MFRCODE->Required) {
            if (!$this->MFRCODE->IsDetailKey && EmptyValue($this->MFRCODE->FormValue)) {
                $this->MFRCODE->addErrorMessage(str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
            }
        }
        if ($this->Stock->Required) {
            if (!$this->Stock->IsDetailKey && EmptyValue($this->Stock->FormValue)) {
                $this->Stock->addErrorMessage(str_replace("%s", $this->Stock->caption(), $this->Stock->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Stock->FormValue)) {
            $this->Stock->addErrorMessage($this->Stock->getErrorMessage(false));
        }
        if ($this->LastMonthSale->Required) {
            if (!$this->LastMonthSale->IsDetailKey && EmptyValue($this->LastMonthSale->FormValue)) {
                $this->LastMonthSale->addErrorMessage(str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->LastMonthSale->FormValue)) {
            $this->LastMonthSale->addErrorMessage($this->LastMonthSale->getErrorMessage(false));
        }
        if ($this->Printcheck->Required) {
            if (!$this->Printcheck->IsDetailKey && EmptyValue($this->Printcheck->FormValue)) {
                $this->Printcheck->addErrorMessage(str_replace("%s", $this->Printcheck->caption(), $this->Printcheck->RequiredErrorMessage));
            }
        }
        if ($this->poid->Required) {
            if (!$this->poid->IsDetailKey && EmptyValue($this->poid->FormValue)) {
                $this->poid->addErrorMessage(str_replace("%s", $this->poid->caption(), $this->poid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->poid->FormValue)) {
            $this->poid->addErrorMessage($this->poid->getErrorMessage(false));
        }
        if ($this->grnid->Required) {
            if (!$this->grnid->IsDetailKey && EmptyValue($this->grnid->FormValue)) {
                $this->grnid->addErrorMessage(str_replace("%s", $this->grnid->caption(), $this->grnid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->grnid->FormValue)) {
            $this->grnid->addErrorMessage($this->grnid->getErrorMessage(false));
        }
        if ($this->BatchNo->Required) {
            if (!$this->BatchNo->IsDetailKey && EmptyValue($this->BatchNo->FormValue)) {
                $this->BatchNo->addErrorMessage(str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
            }
        }
        if ($this->ExpDate->Required) {
            if (!$this->ExpDate->IsDetailKey && EmptyValue($this->ExpDate->FormValue)) {
                $this->ExpDate->addErrorMessage(str_replace("%s", $this->ExpDate->caption(), $this->ExpDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ExpDate->FormValue)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if ($this->PrName->Required) {
            if (!$this->PrName->IsDetailKey && EmptyValue($this->PrName->FormValue)) {
                $this->PrName->addErrorMessage(str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
            }
        }
        if ($this->Quantity->Required) {
            if (!$this->Quantity->IsDetailKey && EmptyValue($this->Quantity->FormValue)) {
                $this->Quantity->addErrorMessage(str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Quantity->FormValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if ($this->FreeQty->Required) {
            if (!$this->FreeQty->IsDetailKey && EmptyValue($this->FreeQty->FormValue)) {
                $this->FreeQty->addErrorMessage(str_replace("%s", $this->FreeQty->caption(), $this->FreeQty->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FreeQty->FormValue)) {
            $this->FreeQty->addErrorMessage($this->FreeQty->getErrorMessage(false));
        }
        if ($this->ItemValue->Required) {
            if (!$this->ItemValue->IsDetailKey && EmptyValue($this->ItemValue->FormValue)) {
                $this->ItemValue->addErrorMessage(str_replace("%s", $this->ItemValue->caption(), $this->ItemValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ItemValue->FormValue)) {
            $this->ItemValue->addErrorMessage($this->ItemValue->getErrorMessage(false));
        }
        if ($this->Disc->Required) {
            if (!$this->Disc->IsDetailKey && EmptyValue($this->Disc->FormValue)) {
                $this->Disc->addErrorMessage(str_replace("%s", $this->Disc->caption(), $this->Disc->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Disc->FormValue)) {
            $this->Disc->addErrorMessage($this->Disc->getErrorMessage(false));
        }
        if ($this->PTax->Required) {
            if (!$this->PTax->IsDetailKey && EmptyValue($this->PTax->FormValue)) {
                $this->PTax->addErrorMessage(str_replace("%s", $this->PTax->caption(), $this->PTax->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PTax->FormValue)) {
            $this->PTax->addErrorMessage($this->PTax->getErrorMessage(false));
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->SalTax->Required) {
            if (!$this->SalTax->IsDetailKey && EmptyValue($this->SalTax->FormValue)) {
                $this->SalTax->addErrorMessage(str_replace("%s", $this->SalTax->caption(), $this->SalTax->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SalTax->FormValue)) {
            $this->SalTax->addErrorMessage($this->SalTax->getErrorMessage(false));
        }
        if ($this->PurValue->Required) {
            if (!$this->PurValue->IsDetailKey && EmptyValue($this->PurValue->FormValue)) {
                $this->PurValue->addErrorMessage(str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurValue->FormValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if ($this->PurRate->Required) {
            if (!$this->PurRate->IsDetailKey && EmptyValue($this->PurRate->FormValue)) {
                $this->PurRate->addErrorMessage(str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurRate->FormValue)) {
            $this->PurRate->addErrorMessage($this->PurRate->getErrorMessage(false));
        }
        if ($this->SalRate->Required) {
            if (!$this->SalRate->IsDetailKey && EmptyValue($this->SalRate->FormValue)) {
                $this->SalRate->addErrorMessage(str_replace("%s", $this->SalRate->caption(), $this->SalRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SalRate->FormValue)) {
            $this->SalRate->addErrorMessage($this->SalRate->getErrorMessage(false));
        }
        if ($this->Discount->Required) {
            if (!$this->Discount->IsDetailKey && EmptyValue($this->Discount->FormValue)) {
                $this->Discount->addErrorMessage(str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Discount->FormValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
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
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BRCODE->FormValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if ($this->HSN->Required) {
            if (!$this->HSN->IsDetailKey && EmptyValue($this->HSN->FormValue)) {
                $this->HSN->addErrorMessage(str_replace("%s", $this->HSN->caption(), $this->HSN->RequiredErrorMessage));
            }
        }
        if ($this->Pack->Required) {
            if (!$this->Pack->IsDetailKey && EmptyValue($this->Pack->FormValue)) {
                $this->Pack->addErrorMessage(str_replace("%s", $this->Pack->caption(), $this->Pack->RequiredErrorMessage));
            }
        }
        if ($this->PUnit->Required) {
            if (!$this->PUnit->IsDetailKey && EmptyValue($this->PUnit->FormValue)) {
                $this->PUnit->addErrorMessage(str_replace("%s", $this->PUnit->caption(), $this->PUnit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PUnit->FormValue)) {
            $this->PUnit->addErrorMessage($this->PUnit->getErrorMessage(false));
        }
        if ($this->SUnit->Required) {
            if (!$this->SUnit->IsDetailKey && EmptyValue($this->SUnit->FormValue)) {
                $this->SUnit->addErrorMessage(str_replace("%s", $this->SUnit->caption(), $this->SUnit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SUnit->FormValue)) {
            $this->SUnit->addErrorMessage($this->SUnit->getErrorMessage(false));
        }
        if ($this->GrnQuantity->Required) {
            if (!$this->GrnQuantity->IsDetailKey && EmptyValue($this->GrnQuantity->FormValue)) {
                $this->GrnQuantity->addErrorMessage(str_replace("%s", $this->GrnQuantity->caption(), $this->GrnQuantity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GrnQuantity->FormValue)) {
            $this->GrnQuantity->addErrorMessage($this->GrnQuantity->getErrorMessage(false));
        }
        if ($this->GrnMRP->Required) {
            if (!$this->GrnMRP->IsDetailKey && EmptyValue($this->GrnMRP->FormValue)) {
                $this->GrnMRP->addErrorMessage(str_replace("%s", $this->GrnMRP->caption(), $this->GrnMRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GrnMRP->FormValue)) {
            $this->GrnMRP->addErrorMessage($this->GrnMRP->getErrorMessage(false));
        }
        if ($this->strid->Required) {
            if (!$this->strid->IsDetailKey && EmptyValue($this->strid->FormValue)) {
                $this->strid->addErrorMessage(str_replace("%s", $this->strid->caption(), $this->strid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->strid->FormValue)) {
            $this->strid->addErrorMessage($this->strid->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CreatedBy->FormValue)) {
            $this->CreatedBy->addErrorMessage($this->CreatedBy->getErrorMessage(false));
        }
        if ($this->CreatedDateTime->Required) {
            if (!$this->CreatedDateTime->IsDetailKey && EmptyValue($this->CreatedDateTime->FormValue)) {
                $this->CreatedDateTime->addErrorMessage(str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CreatedDateTime->FormValue)) {
            $this->CreatedDateTime->addErrorMessage($this->CreatedDateTime->getErrorMessage(false));
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ModifiedBy->FormValue)) {
            $this->ModifiedBy->addErrorMessage($this->ModifiedBy->getErrorMessage(false));
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ModifiedDateTime->FormValue)) {
            $this->ModifiedDateTime->addErrorMessage($this->ModifiedDateTime->getErrorMessage(false));
        }
        if ($this->grncreatedby->Required) {
            if (!$this->grncreatedby->IsDetailKey && EmptyValue($this->grncreatedby->FormValue)) {
                $this->grncreatedby->addErrorMessage(str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
            }
        }
        if ($this->grncreatedDateTime->Required) {
            if (!$this->grncreatedDateTime->IsDetailKey && EmptyValue($this->grncreatedDateTime->FormValue)) {
                $this->grncreatedDateTime->addErrorMessage(str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->grnModifiedby->Required) {
            if (!$this->grnModifiedby->IsDetailKey && EmptyValue($this->grnModifiedby->FormValue)) {
                $this->grnModifiedby->addErrorMessage(str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
            }
        }
        if ($this->grnModifiedDateTime->Required) {
            if (!$this->grnModifiedDateTime->IsDetailKey && EmptyValue($this->grnModifiedDateTime->FormValue)) {
                $this->grnModifiedDateTime->addErrorMessage(str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->Received->Required) {
            if (!$this->Received->IsDetailKey && EmptyValue($this->Received->FormValue)) {
                $this->Received->addErrorMessage(str_replace("%s", $this->Received->caption(), $this->Received->RequiredErrorMessage));
            }
        }
        if ($this->BillDate->Required) {
            if (!$this->BillDate->IsDetailKey && EmptyValue($this->BillDate->FormValue)) {
                $this->BillDate->addErrorMessage(str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillDate->FormValue)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if ($this->CurStock->Required) {
            if (!$this->CurStock->IsDetailKey && EmptyValue($this->CurStock->FormValue)) {
                $this->CurStock->addErrorMessage(str_replace("%s", $this->CurStock->caption(), $this->CurStock->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CurStock->FormValue)) {
            $this->CurStock->addErrorMessage($this->CurStock->getErrorMessage(false));
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

        // ORDNO
        $this->ORDNO->CurrentValue = PharmacyID();
        $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null);

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // QTY
        $this->QTY->setDbValueDef($rsnew, $this->QTY->CurrentValue, null, false);

        // DT
        $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), null, false);

        // PC
        $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, false);

        // YM
        $this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, null, false);

        // MFRCODE
        $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, false);

        // Stock
        $this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, null, false);

        // LastMonthSale
        $this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, null, false);

        // Printcheck
        $this->Printcheck->setDbValueDef($rsnew, $this->Printcheck->CurrentValue, null, false);

        // poid
        $this->poid->setDbValueDef($rsnew, $this->poid->CurrentValue, null, false);

        // grnid
        $this->grnid->setDbValueDef($rsnew, $this->grnid->CurrentValue, null, false);

        // BatchNo
        $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, false);

        // ExpDate
        $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), null, false);

        // PrName
        $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, false);

        // Quantity
        $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, false);

        // FreeQty
        $this->FreeQty->setDbValueDef($rsnew, $this->FreeQty->CurrentValue, null, false);

        // ItemValue
        $this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, null, false);

        // Disc
        $this->Disc->setDbValueDef($rsnew, $this->Disc->CurrentValue, null, false);

        // PTax
        $this->PTax->setDbValueDef($rsnew, $this->PTax->CurrentValue, null, false);

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, false);

        // SalTax
        $this->SalTax->setDbValueDef($rsnew, $this->SalTax->CurrentValue, null, false);

        // PurValue
        $this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, null, false);

        // PurRate
        $this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, null, false);

        // SalRate
        $this->SalRate->setDbValueDef($rsnew, $this->SalRate->CurrentValue, null, false);

        // Discount
        $this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, null, false);

        // PSGST
        $this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, null, false);

        // PCGST
        $this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, null, false);

        // SSGST
        $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, false);

        // SCGST
        $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, false);

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // HSN
        $this->HSN->setDbValueDef($rsnew, $this->HSN->CurrentValue, null, false);

        // Pack
        $this->Pack->setDbValueDef($rsnew, $this->Pack->CurrentValue, null, false);

        // PUnit
        $this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, null, strval($this->PUnit->CurrentValue) == "");

        // SUnit
        $this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, null, strval($this->SUnit->CurrentValue) == "");

        // GrnQuantity
        $this->GrnQuantity->setDbValueDef($rsnew, $this->GrnQuantity->CurrentValue, null, false);

        // GrnMRP
        $this->GrnMRP->setDbValueDef($rsnew, $this->GrnMRP->CurrentValue, null, false);

        // strid
        $this->strid->setDbValueDef($rsnew, $this->strid->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // CreatedBy
        $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, false);

        // CreatedDateTime
        $this->CreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0), null, false);

        // ModifiedBy
        $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, false);

        // ModifiedDateTime
        $this->ModifiedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0), null, false);

        // grncreatedby
        $this->grncreatedby->CurrentValue = CurrentUserID();
        $this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, null);

        // grncreatedDateTime
        $this->grncreatedDateTime->CurrentValue = CurrentDateTime();
        $this->grncreatedDateTime->setDbValueDef($rsnew, $this->grncreatedDateTime->CurrentValue, null);

        // grnModifiedby
        $this->grnModifiedby->CurrentValue = CurrentUserID();
        $this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, null);

        // grnModifiedDateTime
        $this->grnModifiedDateTime->CurrentValue = CurrentDateTime();
        $this->grnModifiedDateTime->setDbValueDef($rsnew, $this->grnModifiedDateTime->CurrentValue, null);

        // Received
        $this->Received->setDbValueDef($rsnew, $this->Received->CurrentValue, null, false);

        // BillDate
        $this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), null, false);

        // CurStock
        $this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, null, false);

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
            if ($masterTblVar == "store_billing_transfer") {
                $validMaster = true;
                $masterTbl = Container("store_billing_transfer");
                if (($parm = Get("fk_id", Get("strid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->strid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->strid->setSessionValue($this->strid->QueryStringValue);
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
            if ($masterTblVar == "store_billing_transfer") {
                $validMaster = true;
                $masterTbl = Container("store_billing_transfer");
                if (($parm = Post("fk_id", Post("strid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->strid->setFormValue($masterTbl->id->FormValue);
                    $this->strid->setSessionValue($this->strid->FormValue);
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

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "store_billing_transfer") {
                if ($this->strid->CurrentValue == "") {
                    $this->strid->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewStoreTransferList"), "", $this->TableVar, true);
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
                case "x_ORDNO":
                    break;
                case "x_LastMonthSale":
                    $lookupFilter = function () {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_BRCODE":
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
