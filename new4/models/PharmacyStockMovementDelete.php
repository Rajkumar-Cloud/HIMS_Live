<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStockMovementDelete extends PharmacyStockMovement
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_stock_movement';

    // Page object name
    public $PageObjName = "PharmacyStockMovementDelete";

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
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $TotalRecords = 0;
    public $RecordCount;
    public $RecKeys = [];
    public $StartRowCount = 1;
    public $RowCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
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

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PharmacyStockMovementList"); // Prevent SQL injection, return to list
            return;
        }

        // Set up filter (WHERE Clause)
        $this->CurrentFilter = $filter;

        // Get action
        if (IsApi()) {
            $this->CurrentAction = "delete"; // Delete record directly
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action");
        } elseif (Get("action") == "1") {
            $this->CurrentAction = "delete"; // Delete record directly
        } else {
            $this->CurrentAction = "show"; // Display record
        }
        if ($this->isDelete()) {
            $this->SendEmail = true; // Send email on delete success
            if ($this->deleteRows()) { // Delete rows
                if ($this->getSuccessMessage() == "") {
                    $this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
                }
                if (IsApi()) {
                    $this->terminate(true);
                    return;
                } else {
                    $this->terminate($this->getReturnUrl()); // Return to caller
                    return;
                }
            } else { // Delete failed
                if (IsApi()) {
                    $this->terminate();
                    return;
                }
                $this->CurrentAction = "show"; // Display record
            }
        }
        if ($this->isShow()) { // Load records for display
            if ($this->Recordset = $this->loadRecordset()) {
                $this->TotalRecords = $this->Recordset->recordCount(); // Get record count
            }
            if ($this->TotalRecords <= 0) { // No record found, exit
                if ($this->Recordset) {
                    $this->Recordset->close();
                }
                $this->terminate("PharmacyStockMovementList"); // Return to list
                return;
            }
        }

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

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
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
        $row = [];
        $row['id'] = null;
        $row['PRC'] = null;
        $row['PrName'] = null;
        $row['BATCHNO'] = null;
        $row['OpeningStk'] = null;
        $row['PurchaseQty'] = null;
        $row['SalesQty'] = null;
        $row['ClosingStk'] = null;
        $row['PurchasefreeQty'] = null;
        $row['TransferingQty'] = null;
        $row['UnitPurchaseRate'] = null;
        $row['UnitSaleRate'] = null;
        $row['CreatedDate'] = null;
        $row['OQ'] = null;
        $row['RQ'] = null;
        $row['MRQ'] = null;
        $row['IQ'] = null;
        $row['MRP'] = null;
        $row['EXPDT'] = null;
        $row['UR'] = null;
        $row['RT'] = null;
        $row['PRCODE'] = null;
        $row['BATCH'] = null;
        $row['PC'] = null;
        $row['OLDRT'] = null;
        $row['TEMPMRQ'] = null;
        $row['TAXP'] = null;
        $row['OLDRATE'] = null;
        $row['NEWRATE'] = null;
        $row['OTEMPMRA'] = null;
        $row['ACTIVESTATUS'] = null;
        $row['PSGST'] = null;
        $row['PCGST'] = null;
        $row['SSGST'] = null;
        $row['SCGST'] = null;
        $row['MFRCODE'] = null;
        $row['BRCODE'] = null;
        $row['FRQ'] = null;
        $row['HospID'] = null;
        $row['UM'] = null;
        $row['GENNAME'] = null;
        $row['BILLDATE'] = null;
        $row['CreatedDateTime'] = null;
        $row['baid'] = null;
        return $row;
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }
        $conn->beginTransaction();

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }
        if ($deleteRows) {
            $conn->commit(); // Commit the changes
        } else {
            $conn->rollback(); // Rollback changes
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyStockMovementList"), "", $this->TableVar, true);
        $pageId = "delete";
        $Breadcrumb->add("delete", $pageId, $url);
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
