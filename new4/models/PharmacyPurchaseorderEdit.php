<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyPurchaseorderEdit extends PharmacyPurchaseorder
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_purchaseorder';

    // Page object name
    public $PageObjName = "PharmacyPurchaseorderEdit";

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

        // Table object (pharmacy_purchaseorder)
        if (!isset($GLOBALS["pharmacy_purchaseorder"]) || get_class($GLOBALS["pharmacy_purchaseorder"]) == PROJECT_NAMESPACE . "pharmacy_purchaseorder") {
            $GLOBALS["pharmacy_purchaseorder"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_purchaseorder');
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
                $doc = new $class(Container("pharmacy_purchaseorder"));
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
                    if ($pageName == "PharmacyPurchaseorderView") {
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
        $this->id->setVisibility();
        $this->poid->setVisibility();
        $this->grnid->Visible = false;
        $this->BatchNo->Visible = false;
        $this->ExpDate->Visible = false;
        $this->PrName->Visible = false;
        $this->Quantity->Visible = false;
        $this->FreeQty->Visible = false;
        $this->ItemValue->Visible = false;
        $this->Disc->Visible = false;
        $this->PTax->Visible = false;
        $this->MRP->Visible = false;
        $this->SalTax->Visible = false;
        $this->PurValue->Visible = false;
        $this->PurRate->Visible = false;
        $this->SalRate->Visible = false;
        $this->Discount->Visible = false;
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
        $this->trid->setVisibility();
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
        $this->grndate->setVisibility();
        $this->grndatetime->setVisibility();
        $this->strid->setVisibility();
        $this->GRNPer->setVisibility();
        $this->FreeQtyyy->setVisibility();
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
        $this->setupLookupOptions($this->PRC);
        $this->setupLookupOptions($this->PC);

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
                    $this->terminate("PharmacyPurchaseorderList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PharmacyPurchaseorderList") {
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
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

        // Check field name 'trid' first before field var 'x_trid'
        $val = $CurrentForm->hasValue("trid") ? $CurrentForm->getValue("trid") : $CurrentForm->getValue("x_trid");
        if (!$this->trid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->trid->Visible = false; // Disable update for API request
            } else {
                $this->trid->setFormValue($val);
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

        // Check field name 'grndate' first before field var 'x_grndate'
        $val = $CurrentForm->hasValue("grndate") ? $CurrentForm->getValue("grndate") : $CurrentForm->getValue("x_grndate");
        if (!$this->grndate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grndate->Visible = false; // Disable update for API request
            } else {
                $this->grndate->setFormValue($val);
            }
            $this->grndate->CurrentValue = UnFormatDateTime($this->grndate->CurrentValue, 0);
        }

        // Check field name 'grndatetime' first before field var 'x_grndatetime'
        $val = $CurrentForm->hasValue("grndatetime") ? $CurrentForm->getValue("grndatetime") : $CurrentForm->getValue("x_grndatetime");
        if (!$this->grndatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grndatetime->Visible = false; // Disable update for API request
            } else {
                $this->grndatetime->setFormValue($val);
            }
            $this->grndatetime->CurrentValue = UnFormatDateTime($this->grndatetime->CurrentValue, 0);
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

        // Check field name 'GRNPer' first before field var 'x_GRNPer'
        $val = $CurrentForm->hasValue("GRNPer") ? $CurrentForm->getValue("GRNPer") : $CurrentForm->getValue("x_GRNPer");
        if (!$this->GRNPer->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRNPer->Visible = false; // Disable update for API request
            } else {
                $this->GRNPer->setFormValue($val);
            }
        }

        // Check field name 'FreeQtyyy' first before field var 'x_FreeQtyyy'
        $val = $CurrentForm->hasValue("FreeQtyyy") ? $CurrentForm->getValue("FreeQtyyy") : $CurrentForm->getValue("x_FreeQtyyy");
        if (!$this->FreeQtyyy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FreeQtyyy->Visible = false; // Disable update for API request
            } else {
                $this->FreeQtyyy->setFormValue($val);
            }
        }
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
        $this->id->CurrentValue = $this->id->FormValue;
        $this->poid->CurrentValue = $this->poid->FormValue;
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
        $this->trid->CurrentValue = $this->trid->FormValue;
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
        $this->grndate->CurrentValue = $this->grndate->FormValue;
        $this->grndate->CurrentValue = UnFormatDateTime($this->grndate->CurrentValue, 0);
        $this->grndatetime->CurrentValue = $this->grndatetime->FormValue;
        $this->grndatetime->CurrentValue = UnFormatDateTime($this->grndatetime->CurrentValue, 0);
        $this->strid->CurrentValue = $this->strid->FormValue;
        $this->GRNPer->CurrentValue = $this->GRNPer->FormValue;
        $this->FreeQtyyy->CurrentValue = $this->FreeQtyyy->FormValue;
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
        if (array_key_exists('EV__PRC', $row)) {
            $this->PRC->VirtualValue = $row['EV__PRC']; // Set up virtual field value
        } else {
            $this->PRC->VirtualValue = ""; // Clear value
        }
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
        $this->trid->setDbValue($row['trid']);
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
        $this->grndate->setDbValue($row['grndate']);
        $this->grndatetime->setDbValue($row['grndatetime']);
        $this->strid->setDbValue($row['strid']);
        $this->GRNPer->setDbValue($row['GRNPer']);
        $this->FreeQtyyy->setDbValue($row['FreeQtyyy']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['ORDNO'] = null;
        $row['PRC'] = null;
        $row['QTY'] = null;
        $row['DT'] = null;
        $row['PC'] = null;
        $row['YM'] = null;
        $row['MFRCODE'] = null;
        $row['Stock'] = null;
        $row['LastMonthSale'] = null;
        $row['Printcheck'] = null;
        $row['id'] = null;
        $row['poid'] = null;
        $row['grnid'] = null;
        $row['BatchNo'] = null;
        $row['ExpDate'] = null;
        $row['PrName'] = null;
        $row['Quantity'] = null;
        $row['FreeQty'] = null;
        $row['ItemValue'] = null;
        $row['Disc'] = null;
        $row['PTax'] = null;
        $row['MRP'] = null;
        $row['SalTax'] = null;
        $row['PurValue'] = null;
        $row['PurRate'] = null;
        $row['SalRate'] = null;
        $row['Discount'] = null;
        $row['PSGST'] = null;
        $row['PCGST'] = null;
        $row['SSGST'] = null;
        $row['SCGST'] = null;
        $row['BRCODE'] = null;
        $row['HSN'] = null;
        $row['Pack'] = null;
        $row['PUnit'] = null;
        $row['SUnit'] = null;
        $row['GrnQuantity'] = null;
        $row['GrnMRP'] = null;
        $row['trid'] = null;
        $row['HospID'] = null;
        $row['CreatedBy'] = null;
        $row['CreatedDateTime'] = null;
        $row['ModifiedBy'] = null;
        $row['ModifiedDateTime'] = null;
        $row['grncreatedby'] = null;
        $row['grncreatedDateTime'] = null;
        $row['grnModifiedby'] = null;
        $row['grnModifiedDateTime'] = null;
        $row['Received'] = null;
        $row['BillDate'] = null;
        $row['CurStock'] = null;
        $row['grndate'] = null;
        $row['grndatetime'] = null;
        $row['strid'] = null;
        $row['GRNPer'] = null;
        $row['FreeQtyyy'] = null;
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

        // Convert decimal values if posted back
        if ($this->GRNPer->FormValue == $this->GRNPer->CurrentValue && is_numeric(ConvertToFloatString($this->GRNPer->CurrentValue))) {
            $this->GRNPer->CurrentValue = ConvertToFloatString($this->GRNPer->CurrentValue);
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

        // trid

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

        // grndate

        // grndatetime

        // strid

        // GRNPer

        // FreeQtyyy
        if ($this->RowType == ROWTYPE_VIEW) {
            // ORDNO
            $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
            $this->ORDNO->ViewCustomAttributes = "";

            // PRC
            if ($this->PRC->VirtualValue != "") {
                $this->PRC->ViewValue = $this->PRC->VirtualValue;
            } else {
                $this->PRC->ViewValue = $this->PRC->CurrentValue;
                $curVal = trim(strval($this->PRC->CurrentValue));
                if ($curVal != "") {
                    $this->PRC->ViewValue = $this->PRC->lookupCacheOption($curVal);
                    if ($this->PRC->ViewValue === null) { // Lookup from database
                        $filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->PRC->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->PRC->Lookup->renderViewRow($rswrk[0]);
                            $this->PRC->ViewValue = $this->PRC->displayValue($arwrk);
                        } else {
                            $this->PRC->ViewValue = $this->PRC->CurrentValue;
                        }
                    }
                } else {
                    $this->PRC->ViewValue = null;
                }
            }
            $this->PRC->ViewCustomAttributes = "";

            // QTY
            $this->QTY->ViewValue = $this->QTY->CurrentValue;
            $this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 2, -2, -2, -2);
            $this->QTY->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

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

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // Stock
            $this->Stock->ViewValue = $this->Stock->CurrentValue;
            $this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 2, -2, -2, -2);
            $this->Stock->ViewCustomAttributes = "";

            // LastMonthSale
            $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
            $this->LastMonthSale->ViewValue = FormatNumber($this->LastMonthSale->ViewValue, 2, -2, -2, -2);
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
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, $this->PSGST->DefaultDecimalPrecision);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, $this->PCGST->DefaultDecimalPrecision);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, $this->SSGST->DefaultDecimalPrecision);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, $this->SCGST->DefaultDecimalPrecision);
            $this->SCGST->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
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

            // trid
            $this->trid->ViewValue = $this->trid->CurrentValue;
            $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
            $this->trid->ViewCustomAttributes = "";

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
            if (strval($this->Received->CurrentValue) != "") {
                $this->Received->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Received->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Received->ViewValue->add($this->Received->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Received->ViewValue = null;
            }
            $this->Received->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
            $this->BillDate->ViewCustomAttributes = "";

            // CurStock
            $this->CurStock->ViewValue = $this->CurStock->CurrentValue;
            $this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
            $this->CurStock->ViewCustomAttributes = "";

            // grndate
            $this->grndate->ViewValue = $this->grndate->CurrentValue;
            $this->grndate->ViewValue = FormatDateTime($this->grndate->ViewValue, 0);
            $this->grndate->ViewCustomAttributes = "";

            // grndatetime
            $this->grndatetime->ViewValue = $this->grndatetime->CurrentValue;
            $this->grndatetime->ViewValue = FormatDateTime($this->grndatetime->ViewValue, 0);
            $this->grndatetime->ViewCustomAttributes = "";

            // strid
            $this->strid->ViewValue = $this->strid->CurrentValue;
            $this->strid->ViewValue = FormatNumber($this->strid->ViewValue, 0, -2, -2, -2);
            $this->strid->ViewCustomAttributes = "";

            // GRNPer
            $this->GRNPer->ViewValue = $this->GRNPer->CurrentValue;
            $this->GRNPer->ViewValue = FormatNumber($this->GRNPer->ViewValue, 2, -2, -2, -2);
            $this->GRNPer->ViewCustomAttributes = "";

            // FreeQtyyy
            $this->FreeQtyyy->ViewValue = $this->FreeQtyyy->CurrentValue;
            $this->FreeQtyyy->ViewValue = FormatNumber($this->FreeQtyyy->ViewValue, 0, -2, -2, -2);
            $this->FreeQtyyy->ViewCustomAttributes = "";

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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // poid
            $this->poid->LinkCustomAttributes = "";
            $this->poid->HrefValue = "";
            $this->poid->TooltipValue = "";

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

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";
            $this->trid->TooltipValue = "";

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

            // grndate
            $this->grndate->LinkCustomAttributes = "";
            $this->grndate->HrefValue = "";
            $this->grndate->TooltipValue = "";

            // grndatetime
            $this->grndatetime->LinkCustomAttributes = "";
            $this->grndatetime->HrefValue = "";
            $this->grndatetime->TooltipValue = "";

            // strid
            $this->strid->LinkCustomAttributes = "";
            $this->strid->HrefValue = "";
            $this->strid->TooltipValue = "";

            // GRNPer
            $this->GRNPer->LinkCustomAttributes = "";
            $this->GRNPer->HrefValue = "";
            $this->GRNPer->TooltipValue = "";

            // FreeQtyyy
            $this->FreeQtyyy->LinkCustomAttributes = "";
            $this->FreeQtyyy->HrefValue = "";
            $this->FreeQtyyy->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // ORDNO
            $this->ORDNO->EditAttrs["class"] = "form-control";
            $this->ORDNO->EditCustomAttributes = "";
            if (!$this->ORDNO->Raw) {
                $this->ORDNO->CurrentValue = HtmlDecode($this->ORDNO->CurrentValue);
            }
            $this->ORDNO->EditValue = HtmlEncode($this->ORDNO->CurrentValue);
            $this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $curVal = trim(strval($this->PRC->CurrentValue));
            if ($curVal != "") {
                $this->PRC->EditValue = $this->PRC->lookupCacheOption($curVal);
                if ($this->PRC->EditValue === null) { // Lookup from database
                    $filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PRC->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PRC->Lookup->renderViewRow($rswrk[0]);
                        $this->PRC->EditValue = $this->PRC->displayValue($arwrk);
                    } else {
                        $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
                    }
                }
            } else {
                $this->PRC->EditValue = null;
            }
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
                foreach ($arwrk as &$row)
                    $row = $this->PC->Lookup->renderViewRow($row);
                $this->PC->EditValue = $arwrk;
            }
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
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // Printcheck
            $this->Printcheck->EditAttrs["class"] = "form-control";
            $this->Printcheck->EditCustomAttributes = "";
            if (!$this->Printcheck->Raw) {
                $this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
            }
            $this->Printcheck->EditValue = HtmlEncode($this->Printcheck->CurrentValue);
            $this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // poid
            $this->poid->EditAttrs["class"] = "form-control";
            $this->poid->EditCustomAttributes = "";
            if ($this->poid->getSessionValue() != "") {
                $this->poid->CurrentValue = GetForeignKeyValue($this->poid->getSessionValue());
                $this->poid->ViewValue = $this->poid->CurrentValue;
                $this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
                $this->poid->ViewCustomAttributes = "";
            } else {
                $this->poid->EditValue = HtmlEncode($this->poid->CurrentValue);
                $this->poid->PlaceHolder = RemoveHtml($this->poid->caption());
            }

            // PSGST
            $this->PSGST->EditAttrs["class"] = "form-control";
            $this->PSGST->EditCustomAttributes = "";
            $this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
            $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
            if (strval($this->PSGST->EditValue) != "" && is_numeric($this->PSGST->EditValue)) {
                $this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -1, -2, 0);
            }

            // PCGST
            $this->PCGST->EditAttrs["class"] = "form-control";
            $this->PCGST->EditCustomAttributes = "";
            $this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
            $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
            if (strval($this->PCGST->EditValue) != "" && is_numeric($this->PCGST->EditValue)) {
                $this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -1, -2, 0);
            }

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
            if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
                $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -1, -2, 0);
            }

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
            if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
                $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -1, -2, 0);
            }

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
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

            // trid
            $this->trid->EditAttrs["class"] = "form-control";
            $this->trid->EditCustomAttributes = "";
            $this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
            $this->trid->PlaceHolder = RemoveHtml($this->trid->caption());

            // HospID

            // CreatedBy

            // CreatedDateTime

            // ModifiedBy

            // ModifiedDateTime

            // grncreatedby
            $this->grncreatedby->EditAttrs["class"] = "form-control";
            $this->grncreatedby->EditCustomAttributes = "";
            $this->grncreatedby->EditValue = HtmlEncode($this->grncreatedby->CurrentValue);
            $this->grncreatedby->PlaceHolder = RemoveHtml($this->grncreatedby->caption());

            // grncreatedDateTime
            $this->grncreatedDateTime->EditAttrs["class"] = "form-control";
            $this->grncreatedDateTime->EditCustomAttributes = "";
            $this->grncreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->grncreatedDateTime->CurrentValue, 8));
            $this->grncreatedDateTime->PlaceHolder = RemoveHtml($this->grncreatedDateTime->caption());

            // grnModifiedby
            $this->grnModifiedby->EditAttrs["class"] = "form-control";
            $this->grnModifiedby->EditCustomAttributes = "";
            $this->grnModifiedby->EditValue = HtmlEncode($this->grnModifiedby->CurrentValue);
            $this->grnModifiedby->PlaceHolder = RemoveHtml($this->grnModifiedby->caption());

            // grnModifiedDateTime
            $this->grnModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->grnModifiedDateTime->EditCustomAttributes = "";
            $this->grnModifiedDateTime->EditValue = HtmlEncode(FormatDateTime($this->grnModifiedDateTime->CurrentValue, 8));
            $this->grnModifiedDateTime->PlaceHolder = RemoveHtml($this->grnModifiedDateTime->caption());

            // Received
            $this->Received->EditCustomAttributes = "";
            $this->Received->EditValue = $this->Received->options(false);
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

            // grndate

            // grndatetime

            // strid
            $this->strid->EditAttrs["class"] = "form-control";
            $this->strid->EditCustomAttributes = "";
            $this->strid->EditValue = HtmlEncode($this->strid->CurrentValue);
            $this->strid->PlaceHolder = RemoveHtml($this->strid->caption());

            // GRNPer
            $this->GRNPer->EditAttrs["class"] = "form-control";
            $this->GRNPer->EditCustomAttributes = "";
            $this->GRNPer->EditValue = HtmlEncode($this->GRNPer->CurrentValue);
            $this->GRNPer->PlaceHolder = RemoveHtml($this->GRNPer->caption());
            if (strval($this->GRNPer->EditValue) != "" && is_numeric($this->GRNPer->EditValue)) {
                $this->GRNPer->EditValue = FormatNumber($this->GRNPer->EditValue, -2, -2, -2, -2);
            }

            // FreeQtyyy
            $this->FreeQtyyy->EditAttrs["class"] = "form-control";
            $this->FreeQtyyy->EditCustomAttributes = "";
            $this->FreeQtyyy->EditValue = HtmlEncode($this->FreeQtyyy->CurrentValue);
            $this->FreeQtyyy->PlaceHolder = RemoveHtml($this->FreeQtyyy->caption());

            // Edit refer script

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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // poid
            $this->poid->LinkCustomAttributes = "";
            $this->poid->HrefValue = "";

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

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";

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

            // grndate
            $this->grndate->LinkCustomAttributes = "";
            $this->grndate->HrefValue = "";

            // grndatetime
            $this->grndatetime->LinkCustomAttributes = "";
            $this->grndatetime->HrefValue = "";

            // strid
            $this->strid->LinkCustomAttributes = "";
            $this->strid->HrefValue = "";

            // GRNPer
            $this->GRNPer->LinkCustomAttributes = "";
            $this->GRNPer->HrefValue = "";

            // FreeQtyyy
            $this->FreeQtyyy->LinkCustomAttributes = "";
            $this->FreeQtyyy->HrefValue = "";
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
        if (!CheckNumber($this->QTY->FormValue)) {
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
        if (!CheckNumber($this->Stock->FormValue)) {
            $this->Stock->addErrorMessage($this->Stock->getErrorMessage(false));
        }
        if ($this->LastMonthSale->Required) {
            if (!$this->LastMonthSale->IsDetailKey && EmptyValue($this->LastMonthSale->FormValue)) {
                $this->LastMonthSale->addErrorMessage(str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LastMonthSale->FormValue)) {
            $this->LastMonthSale->addErrorMessage($this->LastMonthSale->getErrorMessage(false));
        }
        if ($this->Printcheck->Required) {
            if (!$this->Printcheck->IsDetailKey && EmptyValue($this->Printcheck->FormValue)) {
                $this->Printcheck->addErrorMessage(str_replace("%s", $this->Printcheck->caption(), $this->Printcheck->RequiredErrorMessage));
            }
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
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
        if ($this->PSGST->Required) {
            if (!$this->PSGST->IsDetailKey && EmptyValue($this->PSGST->FormValue)) {
                $this->PSGST->addErrorMessage(str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
            }
        }
        if ($this->PCGST->Required) {
            if (!$this->PCGST->IsDetailKey && EmptyValue($this->PCGST->FormValue)) {
                $this->PCGST->addErrorMessage(str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
            }
        }
        if ($this->SSGST->Required) {
            if (!$this->SSGST->IsDetailKey && EmptyValue($this->SSGST->FormValue)) {
                $this->SSGST->addErrorMessage(str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
            }
        }
        if ($this->SCGST->Required) {
            if (!$this->SCGST->IsDetailKey && EmptyValue($this->SCGST->FormValue)) {
                $this->SCGST->addErrorMessage(str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
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
        if ($this->trid->Required) {
            if (!$this->trid->IsDetailKey && EmptyValue($this->trid->FormValue)) {
                $this->trid->addErrorMessage(str_replace("%s", $this->trid->caption(), $this->trid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->trid->FormValue)) {
            $this->trid->addErrorMessage($this->trid->getErrorMessage(false));
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
        if ($this->CreatedDateTime->Required) {
            if (!$this->CreatedDateTime->IsDetailKey && EmptyValue($this->CreatedDateTime->FormValue)) {
                $this->CreatedDateTime->addErrorMessage(str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->grncreatedby->Required) {
            if (!$this->grncreatedby->IsDetailKey && EmptyValue($this->grncreatedby->FormValue)) {
                $this->grncreatedby->addErrorMessage(str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->grncreatedby->FormValue)) {
            $this->grncreatedby->addErrorMessage($this->grncreatedby->getErrorMessage(false));
        }
        if ($this->grncreatedDateTime->Required) {
            if (!$this->grncreatedDateTime->IsDetailKey && EmptyValue($this->grncreatedDateTime->FormValue)) {
                $this->grncreatedDateTime->addErrorMessage(str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->grncreatedDateTime->FormValue)) {
            $this->grncreatedDateTime->addErrorMessage($this->grncreatedDateTime->getErrorMessage(false));
        }
        if ($this->grnModifiedby->Required) {
            if (!$this->grnModifiedby->IsDetailKey && EmptyValue($this->grnModifiedby->FormValue)) {
                $this->grnModifiedby->addErrorMessage(str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->grnModifiedby->FormValue)) {
            $this->grnModifiedby->addErrorMessage($this->grnModifiedby->getErrorMessage(false));
        }
        if ($this->grnModifiedDateTime->Required) {
            if (!$this->grnModifiedDateTime->IsDetailKey && EmptyValue($this->grnModifiedDateTime->FormValue)) {
                $this->grnModifiedDateTime->addErrorMessage(str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->grnModifiedDateTime->FormValue)) {
            $this->grnModifiedDateTime->addErrorMessage($this->grnModifiedDateTime->getErrorMessage(false));
        }
        if ($this->Received->Required) {
            if ($this->Received->FormValue == "") {
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
        if ($this->grndate->Required) {
            if (!$this->grndate->IsDetailKey && EmptyValue($this->grndate->FormValue)) {
                $this->grndate->addErrorMessage(str_replace("%s", $this->grndate->caption(), $this->grndate->RequiredErrorMessage));
            }
        }
        if ($this->grndatetime->Required) {
            if (!$this->grndatetime->IsDetailKey && EmptyValue($this->grndatetime->FormValue)) {
                $this->grndatetime->addErrorMessage(str_replace("%s", $this->grndatetime->caption(), $this->grndatetime->RequiredErrorMessage));
            }
        }
        if ($this->strid->Required) {
            if (!$this->strid->IsDetailKey && EmptyValue($this->strid->FormValue)) {
                $this->strid->addErrorMessage(str_replace("%s", $this->strid->caption(), $this->strid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->strid->FormValue)) {
            $this->strid->addErrorMessage($this->strid->getErrorMessage(false));
        }
        if ($this->GRNPer->Required) {
            if (!$this->GRNPer->IsDetailKey && EmptyValue($this->GRNPer->FormValue)) {
                $this->GRNPer->addErrorMessage(str_replace("%s", $this->GRNPer->caption(), $this->GRNPer->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->GRNPer->FormValue)) {
            $this->GRNPer->addErrorMessage($this->GRNPer->getErrorMessage(false));
        }
        if ($this->FreeQtyyy->Required) {
            if (!$this->FreeQtyyy->IsDetailKey && EmptyValue($this->FreeQtyyy->FormValue)) {
                $this->FreeQtyyy->addErrorMessage(str_replace("%s", $this->FreeQtyyy->caption(), $this->FreeQtyyy->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FreeQtyyy->FormValue)) {
            $this->FreeQtyyy->addErrorMessage($this->FreeQtyyy->getErrorMessage(false));
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

            // ORDNO
            $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null, $this->ORDNO->ReadOnly);

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // QTY
            $this->QTY->setDbValueDef($rsnew, $this->QTY->CurrentValue, null, $this->QTY->ReadOnly);

            // DT
            $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), null, $this->DT->ReadOnly);

            // PC
            $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, $this->PC->ReadOnly);

            // YM
            $this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, null, $this->YM->ReadOnly);

            // MFRCODE
            $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, $this->MFRCODE->ReadOnly);

            // Stock
            $this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, null, $this->Stock->ReadOnly);

            // LastMonthSale
            $this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, null, $this->LastMonthSale->ReadOnly);

            // Printcheck
            $this->Printcheck->setDbValueDef($rsnew, $this->Printcheck->CurrentValue, null, $this->Printcheck->ReadOnly);

            // poid
            if ($this->poid->getSessionValue() != "") {
                $this->poid->ReadOnly = true;
            }
            $this->poid->setDbValueDef($rsnew, $this->poid->CurrentValue, null, $this->poid->ReadOnly);

            // PSGST
            $this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, null, $this->PSGST->ReadOnly);

            // PCGST
            $this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, null, $this->PCGST->ReadOnly);

            // SSGST
            $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, $this->SSGST->ReadOnly);

            // SCGST
            $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, $this->SCGST->ReadOnly);

            // BRCODE
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, $this->BRCODE->ReadOnly);

            // HSN
            $this->HSN->setDbValueDef($rsnew, $this->HSN->CurrentValue, null, $this->HSN->ReadOnly);

            // Pack
            $this->Pack->setDbValueDef($rsnew, $this->Pack->CurrentValue, null, $this->Pack->ReadOnly);

            // PUnit
            $this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, null, $this->PUnit->ReadOnly);

            // SUnit
            $this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, null, $this->SUnit->ReadOnly);

            // GrnQuantity
            $this->GrnQuantity->setDbValueDef($rsnew, $this->GrnQuantity->CurrentValue, null, $this->GrnQuantity->ReadOnly);

            // GrnMRP
            $this->GrnMRP->setDbValueDef($rsnew, $this->GrnMRP->CurrentValue, null, $this->GrnMRP->ReadOnly);

            // trid
            $this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, null, $this->trid->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // CreatedBy
            $this->CreatedBy->CurrentValue = CurrentUserID();
            $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null);

            // CreatedDateTime
            $this->CreatedDateTime->CurrentValue = CurrentDateTime();
            $this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, null);

            // ModifiedBy
            $this->ModifiedBy->CurrentValue = CurrentUserID();
            $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null);

            // ModifiedDateTime
            $this->ModifiedDateTime->CurrentValue = CurrentDateTime();
            $this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, null);

            // grncreatedby
            $this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, null, $this->grncreatedby->ReadOnly);

            // grncreatedDateTime
            $this->grncreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0), null, $this->grncreatedDateTime->ReadOnly);

            // grnModifiedby
            $this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, null, $this->grnModifiedby->ReadOnly);

            // grnModifiedDateTime
            $this->grnModifiedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0), null, $this->grnModifiedDateTime->ReadOnly);

            // Received
            $this->Received->setDbValueDef($rsnew, $this->Received->CurrentValue, null, $this->Received->ReadOnly);

            // BillDate
            $this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), null, $this->BillDate->ReadOnly);

            // CurStock
            $this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, null, $this->CurStock->ReadOnly);

            // grndate
            $this->grndate->CurrentValue = CurrentDate();
            $this->grndate->setDbValueDef($rsnew, $this->grndate->CurrentValue, null);

            // grndatetime
            $this->grndatetime->CurrentValue = CurrentDateTime();
            $this->grndatetime->setDbValueDef($rsnew, $this->grndatetime->CurrentValue, null);

            // strid
            $this->strid->setDbValueDef($rsnew, $this->strid->CurrentValue, null, $this->strid->ReadOnly);

            // GRNPer
            $this->GRNPer->setDbValueDef($rsnew, $this->GRNPer->CurrentValue, null, $this->GRNPer->ReadOnly);

            // FreeQtyyy
            $this->FreeQtyyy->setDbValueDef($rsnew, $this->FreeQtyyy->CurrentValue, null, $this->FreeQtyyy->ReadOnly);

            // Check referential integrity for master table 'pharmacy_po'
            $validMasterRecord = true;
            $masterFilter = $this->sqlMasterFilter_pharmacy_po();
            $keyValue = $rsnew['poid'] ?? $rsold['poid'];
            if (strval($keyValue) != "") {
                $masterFilter = str_replace("@id@", AdjustSql($keyValue), $masterFilter);
            } else {
                $validMasterRecord = false;
            }
            if ($validMasterRecord) {
                $rsmaster = Container("pharmacy_po")->loadRs($masterFilter)->fetch();
                $validMasterRecord = $rsmaster !== false;
            }
            if (!$validMasterRecord) {
                $relatedRecordMsg = str_replace("%t", "pharmacy_po", $Language->phrase("RelatedRecordRequired"));
                $this->setFailureMessage($relatedRecordMsg);
                return false;
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
            if ($masterTblVar == "pharmacy_po") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_po");
                if (($parm = Get("fk_id", Get("poid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->poid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->poid->setSessionValue($this->poid->QueryStringValue);
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
            if ($masterTblVar == "pharmacy_po") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_po");
                if (($parm = Post("fk_id", Post("poid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->poid->setFormValue($masterTbl->id->FormValue);
                    $this->poid->setSessionValue($this->poid->FormValue);
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
            if ($masterTblVar != "pharmacy_po") {
                if ($this->poid->CurrentValue == "") {
                    $this->poid->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyPurchaseorderList"), "", $this->TableVar, true);
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
                case "x_PRC":
                    break;
                case "x_PC":
                    break;
                case "x_Received":
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
