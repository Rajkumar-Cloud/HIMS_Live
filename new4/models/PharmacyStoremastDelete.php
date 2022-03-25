<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStoremastDelete extends PharmacyStoremast
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_storemast';

    // Page object name
    public $PageObjName = "PharmacyStoremastDelete";

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
        $this->LASTPURDT->Visible = false;
        $this->LASTSUPP->Visible = false;
        $this->GENNAME->setVisibility();
        $this->LASTISSDT->Visible = false;
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
        $this->RACKNO->Visible = false;
        $this->SUPPNAME->Visible = false;
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

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PharmacyStoremastList"); // Prevent SQL injection, return to list
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
                $this->terminate("PharmacyStoremastList"); // Return to list
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
        $this->OV->CellCssStyle = "white-space: nowrap;";

        // LATESTOV
        $this->LATESTOV->CellCssStyle = "white-space: nowrap;";

        // ITEMTYPE
        $this->ITEMTYPE->CellCssStyle = "white-space: nowrap;";

        // ROWID
        $this->ROWID->CellCssStyle = "white-space: nowrap;";

        // MOVED
        $this->MOVED->CellCssStyle = "white-space: nowrap;";

        // NEWTAX
        $this->NEWTAX->CellCssStyle = "white-space: nowrap;";

        // HSNCODE
        $this->HSNCODE->CellCssStyle = "white-space: nowrap;";

        // OLDTAX
        $this->OLDTAX->CellCssStyle = "white-space: nowrap;";

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

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyStoremastList"), "", $this->TableVar, true);
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
