<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStoremastAddopt extends PharmacyStoremast
{
    use MessagesTrait;

    // Page ID
    public $PageID = "addopt";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_storemast';

    // Page object name
    public $PageObjName = "PharmacyStoremastAddopt";

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
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->TYPE->setVisibility();
        $this->DES->setVisibility();
        $this->UM->setVisibility();
        $this->RT->setVisibility();
        $this->UR->setVisibility();
        $this->TAXP->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRP->setVisibility();
        $this->EXPDT->setVisibility();
        $this->SALQTY->setVisibility();
        $this->LASTPURDT->setVisibility();
        $this->LASTSUPP->setVisibility();
        $this->GENNAME->setVisibility();
        $this->LASTISSDT->setVisibility();
        $this->CREATEDDT->setVisibility();
        $this->OPPRC->setVisibility();
        $this->RESTRICT->setVisibility();
        $this->BAWAPRC->setVisibility();
        $this->STAXPER->setVisibility();
        $this->TAXTYPE->setVisibility();
        $this->OLDTAXP->setVisibility();
        $this->TAXUPD->setVisibility();
        $this->PACKAGE->setVisibility();
        $this->NEWRT->setVisibility();
        $this->NEWMRP->setVisibility();
        $this->NEWUR->setVisibility();
        $this->STATUS->setVisibility();
        $this->RETNQTY->setVisibility();
        $this->KEMODISC->setVisibility();
        $this->PATSALE->setVisibility();
        $this->ORGAN->setVisibility();
        $this->OLDRQ->setVisibility();
        $this->DRID->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->COMBCODE->setVisibility();
        $this->GENCODE->setVisibility();
        $this->STRENGTH->setVisibility();
        $this->UNIT->setVisibility();
        $this->FORMULARY->setVisibility();
        $this->STOCK->setVisibility();
        $this->RACKNO->setVisibility();
        $this->SUPPNAME->setVisibility();
        $this->COMBNAME->setVisibility();
        $this->GENERICNAME->setVisibility();
        $this->REMARK->setVisibility();
        $this->TEMP->setVisibility();
        $this->PACKING->setVisibility();
        $this->PhysQty->setVisibility();
        $this->LedQty->setVisibility();
        $this->id->Visible = false;
        $this->PurValue->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SaleValue->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->SaleRate->setVisibility();
        $this->HospID->setVisibility();
        $this->BRNAME->setVisibility();
        $this->OV->setVisibility();
        $this->LATESTOV->setVisibility();
        $this->ITEMTYPE->setVisibility();
        $this->ROWID->setVisibility();
        $this->MOVED->setVisibility();
        $this->NEWTAX->setVisibility();
        $this->HSNCODE->setVisibility();
        $this->OLDTAX->setVisibility();
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
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->TYPE->CurrentValue = null;
        $this->TYPE->OldValue = $this->TYPE->CurrentValue;
        $this->DES->CurrentValue = null;
        $this->DES->OldValue = $this->DES->CurrentValue;
        $this->UM->CurrentValue = null;
        $this->UM->OldValue = $this->UM->CurrentValue;
        $this->RT->CurrentValue = null;
        $this->RT->OldValue = $this->RT->CurrentValue;
        $this->UR->CurrentValue = null;
        $this->UR->OldValue = $this->UR->CurrentValue;
        $this->TAXP->CurrentValue = null;
        $this->TAXP->OldValue = $this->TAXP->CurrentValue;
        $this->BATCHNO->CurrentValue = null;
        $this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
        $this->OQ->CurrentValue = null;
        $this->OQ->OldValue = $this->OQ->CurrentValue;
        $this->RQ->CurrentValue = null;
        $this->RQ->OldValue = $this->RQ->CurrentValue;
        $this->MRQ->CurrentValue = null;
        $this->MRQ->OldValue = $this->MRQ->CurrentValue;
        $this->IQ->CurrentValue = null;
        $this->IQ->OldValue = $this->IQ->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->EXPDT->CurrentValue = null;
        $this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
        $this->SALQTY->CurrentValue = null;
        $this->SALQTY->OldValue = $this->SALQTY->CurrentValue;
        $this->LASTPURDT->CurrentValue = null;
        $this->LASTPURDT->OldValue = $this->LASTPURDT->CurrentValue;
        $this->LASTSUPP->CurrentValue = null;
        $this->LASTSUPP->OldValue = $this->LASTSUPP->CurrentValue;
        $this->GENNAME->CurrentValue = null;
        $this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
        $this->LASTISSDT->CurrentValue = null;
        $this->LASTISSDT->OldValue = $this->LASTISSDT->CurrentValue;
        $this->CREATEDDT->CurrentValue = null;
        $this->CREATEDDT->OldValue = $this->CREATEDDT->CurrentValue;
        $this->OPPRC->CurrentValue = null;
        $this->OPPRC->OldValue = $this->OPPRC->CurrentValue;
        $this->RESTRICT->CurrentValue = null;
        $this->RESTRICT->OldValue = $this->RESTRICT->CurrentValue;
        $this->BAWAPRC->CurrentValue = null;
        $this->BAWAPRC->OldValue = $this->BAWAPRC->CurrentValue;
        $this->STAXPER->CurrentValue = null;
        $this->STAXPER->OldValue = $this->STAXPER->CurrentValue;
        $this->TAXTYPE->CurrentValue = null;
        $this->TAXTYPE->OldValue = $this->TAXTYPE->CurrentValue;
        $this->OLDTAXP->CurrentValue = null;
        $this->OLDTAXP->OldValue = $this->OLDTAXP->CurrentValue;
        $this->TAXUPD->CurrentValue = null;
        $this->TAXUPD->OldValue = $this->TAXUPD->CurrentValue;
        $this->PACKAGE->CurrentValue = null;
        $this->PACKAGE->OldValue = $this->PACKAGE->CurrentValue;
        $this->NEWRT->CurrentValue = null;
        $this->NEWRT->OldValue = $this->NEWRT->CurrentValue;
        $this->NEWMRP->CurrentValue = null;
        $this->NEWMRP->OldValue = $this->NEWMRP->CurrentValue;
        $this->NEWUR->CurrentValue = null;
        $this->NEWUR->OldValue = $this->NEWUR->CurrentValue;
        $this->STATUS->CurrentValue = null;
        $this->STATUS->OldValue = $this->STATUS->CurrentValue;
        $this->RETNQTY->CurrentValue = null;
        $this->RETNQTY->OldValue = $this->RETNQTY->CurrentValue;
        $this->KEMODISC->CurrentValue = null;
        $this->KEMODISC->OldValue = $this->KEMODISC->CurrentValue;
        $this->PATSALE->CurrentValue = null;
        $this->PATSALE->OldValue = $this->PATSALE->CurrentValue;
        $this->ORGAN->CurrentValue = null;
        $this->ORGAN->OldValue = $this->ORGAN->CurrentValue;
        $this->OLDRQ->CurrentValue = null;
        $this->OLDRQ->OldValue = $this->OLDRQ->CurrentValue;
        $this->DRID->CurrentValue = null;
        $this->DRID->OldValue = $this->DRID->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->COMBCODE->CurrentValue = null;
        $this->COMBCODE->OldValue = $this->COMBCODE->CurrentValue;
        $this->GENCODE->CurrentValue = null;
        $this->GENCODE->OldValue = $this->GENCODE->CurrentValue;
        $this->STRENGTH->CurrentValue = null;
        $this->STRENGTH->OldValue = $this->STRENGTH->CurrentValue;
        $this->UNIT->CurrentValue = null;
        $this->UNIT->OldValue = $this->UNIT->CurrentValue;
        $this->FORMULARY->CurrentValue = null;
        $this->FORMULARY->OldValue = $this->FORMULARY->CurrentValue;
        $this->STOCK->CurrentValue = null;
        $this->STOCK->OldValue = $this->STOCK->CurrentValue;
        $this->RACKNO->CurrentValue = null;
        $this->RACKNO->OldValue = $this->RACKNO->CurrentValue;
        $this->SUPPNAME->CurrentValue = null;
        $this->SUPPNAME->OldValue = $this->SUPPNAME->CurrentValue;
        $this->COMBNAME->CurrentValue = null;
        $this->COMBNAME->OldValue = $this->COMBNAME->CurrentValue;
        $this->GENERICNAME->CurrentValue = null;
        $this->GENERICNAME->OldValue = $this->GENERICNAME->CurrentValue;
        $this->REMARK->CurrentValue = null;
        $this->REMARK->OldValue = $this->REMARK->CurrentValue;
        $this->TEMP->CurrentValue = null;
        $this->TEMP->OldValue = $this->TEMP->CurrentValue;
        $this->PACKING->CurrentValue = null;
        $this->PACKING->OldValue = $this->PACKING->CurrentValue;
        $this->PhysQty->CurrentValue = null;
        $this->PhysQty->OldValue = $this->PhysQty->CurrentValue;
        $this->LedQty->CurrentValue = null;
        $this->LedQty->OldValue = $this->LedQty->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->PurValue->CurrentValue = null;
        $this->PurValue->OldValue = $this->PurValue->CurrentValue;
        $this->PSGST->CurrentValue = null;
        $this->PSGST->OldValue = $this->PSGST->CurrentValue;
        $this->PCGST->CurrentValue = null;
        $this->PCGST->OldValue = $this->PCGST->CurrentValue;
        $this->SaleValue->CurrentValue = null;
        $this->SaleValue->OldValue = $this->SaleValue->CurrentValue;
        $this->SSGST->CurrentValue = null;
        $this->SSGST->OldValue = $this->SSGST->CurrentValue;
        $this->SCGST->CurrentValue = null;
        $this->SCGST->OldValue = $this->SCGST->CurrentValue;
        $this->SaleRate->CurrentValue = null;
        $this->SaleRate->OldValue = $this->SaleRate->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->BRNAME->CurrentValue = null;
        $this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
        $this->OV->CurrentValue = null;
        $this->OV->OldValue = $this->OV->CurrentValue;
        $this->LATESTOV->CurrentValue = null;
        $this->LATESTOV->OldValue = $this->LATESTOV->CurrentValue;
        $this->ITEMTYPE->CurrentValue = null;
        $this->ITEMTYPE->OldValue = $this->ITEMTYPE->CurrentValue;
        $this->ROWID->CurrentValue = null;
        $this->ROWID->OldValue = $this->ROWID->CurrentValue;
        $this->MOVED->CurrentValue = null;
        $this->MOVED->OldValue = $this->MOVED->CurrentValue;
        $this->NEWTAX->CurrentValue = null;
        $this->NEWTAX->OldValue = $this->NEWTAX->CurrentValue;
        $this->HSNCODE->CurrentValue = null;
        $this->HSNCODE->OldValue = $this->HSNCODE->CurrentValue;
        $this->OLDTAX->CurrentValue = null;
        $this->OLDTAX->OldValue = $this->OLDTAX->CurrentValue;
        $this->Scheduling->CurrentValue = null;
        $this->Scheduling->OldValue = $this->Scheduling->CurrentValue;
        $this->Schedulingh1->CurrentValue = null;
        $this->Schedulingh1->OldValue = $this->Schedulingh1->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            $this->BRCODE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PRC' first before field var 'x_PRC'
        $val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
        if (!$this->PRC->IsDetailKey) {
            $this->PRC->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'TYPE' first before field var 'x_TYPE'
        $val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
        if (!$this->TYPE->IsDetailKey) {
            $this->TYPE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'DES' first before field var 'x_DES'
        $val = $CurrentForm->hasValue("DES") ? $CurrentForm->getValue("DES") : $CurrentForm->getValue("x_DES");
        if (!$this->DES->IsDetailKey) {
            $this->DES->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'UM' first before field var 'x_UM'
        $val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
        if (!$this->UM->IsDetailKey) {
            $this->UM->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'RT' first before field var 'x_RT'
        $val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
        if (!$this->RT->IsDetailKey) {
            $this->RT->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'UR' first before field var 'x_UR'
        $val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
        if (!$this->UR->IsDetailKey) {
            $this->UR->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'TAXP' first before field var 'x_TAXP'
        $val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
        if (!$this->TAXP->IsDetailKey) {
            $this->TAXP->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'BATCHNO' first before field var 'x_BATCHNO'
        $val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
        if (!$this->BATCHNO->IsDetailKey) {
            $this->BATCHNO->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'OQ' first before field var 'x_OQ'
        $val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
        if (!$this->OQ->IsDetailKey) {
            $this->OQ->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'RQ' first before field var 'x_RQ'
        $val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
        if (!$this->RQ->IsDetailKey) {
            $this->RQ->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'MRQ' first before field var 'x_MRQ'
        $val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
        if (!$this->MRQ->IsDetailKey) {
            $this->MRQ->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'IQ' first before field var 'x_IQ'
        $val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
        if (!$this->IQ->IsDetailKey) {
            $this->IQ->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'MRP' first before field var 'x_MRP'
        $val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
        if (!$this->MRP->IsDetailKey) {
            $this->MRP->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'EXPDT' first before field var 'x_EXPDT'
        $val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
        if (!$this->EXPDT->IsDetailKey) {
            $this->EXPDT->setFormValue(ConvertFromUtf8($val));
            $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        }

        // Check field name 'SALQTY' first before field var 'x_SALQTY'
        $val = $CurrentForm->hasValue("SALQTY") ? $CurrentForm->getValue("SALQTY") : $CurrentForm->getValue("x_SALQTY");
        if (!$this->SALQTY->IsDetailKey) {
            $this->SALQTY->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'LASTPURDT' first before field var 'x_LASTPURDT'
        $val = $CurrentForm->hasValue("LASTPURDT") ? $CurrentForm->getValue("LASTPURDT") : $CurrentForm->getValue("x_LASTPURDT");
        if (!$this->LASTPURDT->IsDetailKey) {
            $this->LASTPURDT->setFormValue(ConvertFromUtf8($val));
            $this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
        }

        // Check field name 'LASTSUPP' first before field var 'x_LASTSUPP'
        $val = $CurrentForm->hasValue("LASTSUPP") ? $CurrentForm->getValue("LASTSUPP") : $CurrentForm->getValue("x_LASTSUPP");
        if (!$this->LASTSUPP->IsDetailKey) {
            $this->LASTSUPP->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'GENNAME' first before field var 'x_GENNAME'
        $val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
        if (!$this->GENNAME->IsDetailKey) {
            $this->GENNAME->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'LASTISSDT' first before field var 'x_LASTISSDT'
        $val = $CurrentForm->hasValue("LASTISSDT") ? $CurrentForm->getValue("LASTISSDT") : $CurrentForm->getValue("x_LASTISSDT");
        if (!$this->LASTISSDT->IsDetailKey) {
            $this->LASTISSDT->setFormValue(ConvertFromUtf8($val));
            $this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
        }

        // Check field name 'CREATEDDT' first before field var 'x_CREATEDDT'
        $val = $CurrentForm->hasValue("CREATEDDT") ? $CurrentForm->getValue("CREATEDDT") : $CurrentForm->getValue("x_CREATEDDT");
        if (!$this->CREATEDDT->IsDetailKey) {
            $this->CREATEDDT->setFormValue(ConvertFromUtf8($val));
            $this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
        }

        // Check field name 'OPPRC' first before field var 'x_OPPRC'
        $val = $CurrentForm->hasValue("OPPRC") ? $CurrentForm->getValue("OPPRC") : $CurrentForm->getValue("x_OPPRC");
        if (!$this->OPPRC->IsDetailKey) {
            $this->OPPRC->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'RESTRICT' first before field var 'x_RESTRICT'
        $val = $CurrentForm->hasValue("RESTRICT") ? $CurrentForm->getValue("RESTRICT") : $CurrentForm->getValue("x_RESTRICT");
        if (!$this->RESTRICT->IsDetailKey) {
            $this->RESTRICT->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'BAWAPRC' first before field var 'x_BAWAPRC'
        $val = $CurrentForm->hasValue("BAWAPRC") ? $CurrentForm->getValue("BAWAPRC") : $CurrentForm->getValue("x_BAWAPRC");
        if (!$this->BAWAPRC->IsDetailKey) {
            $this->BAWAPRC->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'STAXPER' first before field var 'x_STAXPER'
        $val = $CurrentForm->hasValue("STAXPER") ? $CurrentForm->getValue("STAXPER") : $CurrentForm->getValue("x_STAXPER");
        if (!$this->STAXPER->IsDetailKey) {
            $this->STAXPER->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'TAXTYPE' first before field var 'x_TAXTYPE'
        $val = $CurrentForm->hasValue("TAXTYPE") ? $CurrentForm->getValue("TAXTYPE") : $CurrentForm->getValue("x_TAXTYPE");
        if (!$this->TAXTYPE->IsDetailKey) {
            $this->TAXTYPE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'OLDTAXP' first before field var 'x_OLDTAXP'
        $val = $CurrentForm->hasValue("OLDTAXP") ? $CurrentForm->getValue("OLDTAXP") : $CurrentForm->getValue("x_OLDTAXP");
        if (!$this->OLDTAXP->IsDetailKey) {
            $this->OLDTAXP->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'TAXUPD' first before field var 'x_TAXUPD'
        $val = $CurrentForm->hasValue("TAXUPD") ? $CurrentForm->getValue("TAXUPD") : $CurrentForm->getValue("x_TAXUPD");
        if (!$this->TAXUPD->IsDetailKey) {
            $this->TAXUPD->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PACKAGE' first before field var 'x_PACKAGE'
        $val = $CurrentForm->hasValue("PACKAGE") ? $CurrentForm->getValue("PACKAGE") : $CurrentForm->getValue("x_PACKAGE");
        if (!$this->PACKAGE->IsDetailKey) {
            $this->PACKAGE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'NEWRT' first before field var 'x_NEWRT'
        $val = $CurrentForm->hasValue("NEWRT") ? $CurrentForm->getValue("NEWRT") : $CurrentForm->getValue("x_NEWRT");
        if (!$this->NEWRT->IsDetailKey) {
            $this->NEWRT->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'NEWMRP' first before field var 'x_NEWMRP'
        $val = $CurrentForm->hasValue("NEWMRP") ? $CurrentForm->getValue("NEWMRP") : $CurrentForm->getValue("x_NEWMRP");
        if (!$this->NEWMRP->IsDetailKey) {
            $this->NEWMRP->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'NEWUR' first before field var 'x_NEWUR'
        $val = $CurrentForm->hasValue("NEWUR") ? $CurrentForm->getValue("NEWUR") : $CurrentForm->getValue("x_NEWUR");
        if (!$this->NEWUR->IsDetailKey) {
            $this->NEWUR->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'STATUS' first before field var 'x_STATUS'
        $val = $CurrentForm->hasValue("STATUS") ? $CurrentForm->getValue("STATUS") : $CurrentForm->getValue("x_STATUS");
        if (!$this->STATUS->IsDetailKey) {
            $this->STATUS->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'RETNQTY' first before field var 'x_RETNQTY'
        $val = $CurrentForm->hasValue("RETNQTY") ? $CurrentForm->getValue("RETNQTY") : $CurrentForm->getValue("x_RETNQTY");
        if (!$this->RETNQTY->IsDetailKey) {
            $this->RETNQTY->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'KEMODISC' first before field var 'x_KEMODISC'
        $val = $CurrentForm->hasValue("KEMODISC") ? $CurrentForm->getValue("KEMODISC") : $CurrentForm->getValue("x_KEMODISC");
        if (!$this->KEMODISC->IsDetailKey) {
            $this->KEMODISC->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PATSALE' first before field var 'x_PATSALE'
        $val = $CurrentForm->hasValue("PATSALE") ? $CurrentForm->getValue("PATSALE") : $CurrentForm->getValue("x_PATSALE");
        if (!$this->PATSALE->IsDetailKey) {
            $this->PATSALE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'ORGAN' first before field var 'x_ORGAN'
        $val = $CurrentForm->hasValue("ORGAN") ? $CurrentForm->getValue("ORGAN") : $CurrentForm->getValue("x_ORGAN");
        if (!$this->ORGAN->IsDetailKey) {
            $this->ORGAN->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'OLDRQ' first before field var 'x_OLDRQ'
        $val = $CurrentForm->hasValue("OLDRQ") ? $CurrentForm->getValue("OLDRQ") : $CurrentForm->getValue("x_OLDRQ");
        if (!$this->OLDRQ->IsDetailKey) {
            $this->OLDRQ->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'DRID' first before field var 'x_DRID'
        $val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
        if (!$this->DRID->IsDetailKey) {
            $this->DRID->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'MFRCODE' first before field var 'x_MFRCODE'
        $val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
        if (!$this->MFRCODE->IsDetailKey) {
            $this->MFRCODE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'COMBCODE' first before field var 'x_COMBCODE'
        $val = $CurrentForm->hasValue("COMBCODE") ? $CurrentForm->getValue("COMBCODE") : $CurrentForm->getValue("x_COMBCODE");
        if (!$this->COMBCODE->IsDetailKey) {
            $this->COMBCODE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'GENCODE' first before field var 'x_GENCODE'
        $val = $CurrentForm->hasValue("GENCODE") ? $CurrentForm->getValue("GENCODE") : $CurrentForm->getValue("x_GENCODE");
        if (!$this->GENCODE->IsDetailKey) {
            $this->GENCODE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'STRENGTH' first before field var 'x_STRENGTH'
        $val = $CurrentForm->hasValue("STRENGTH") ? $CurrentForm->getValue("STRENGTH") : $CurrentForm->getValue("x_STRENGTH");
        if (!$this->STRENGTH->IsDetailKey) {
            $this->STRENGTH->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'UNIT' first before field var 'x_UNIT'
        $val = $CurrentForm->hasValue("UNIT") ? $CurrentForm->getValue("UNIT") : $CurrentForm->getValue("x_UNIT");
        if (!$this->UNIT->IsDetailKey) {
            $this->UNIT->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'FORMULARY' first before field var 'x_FORMULARY'
        $val = $CurrentForm->hasValue("FORMULARY") ? $CurrentForm->getValue("FORMULARY") : $CurrentForm->getValue("x_FORMULARY");
        if (!$this->FORMULARY->IsDetailKey) {
            $this->FORMULARY->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'STOCK' first before field var 'x_STOCK'
        $val = $CurrentForm->hasValue("STOCK") ? $CurrentForm->getValue("STOCK") : $CurrentForm->getValue("x_STOCK");
        if (!$this->STOCK->IsDetailKey) {
            $this->STOCK->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'RACKNO' first before field var 'x_RACKNO'
        $val = $CurrentForm->hasValue("RACKNO") ? $CurrentForm->getValue("RACKNO") : $CurrentForm->getValue("x_RACKNO");
        if (!$this->RACKNO->IsDetailKey) {
            $this->RACKNO->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'SUPPNAME' first before field var 'x_SUPPNAME'
        $val = $CurrentForm->hasValue("SUPPNAME") ? $CurrentForm->getValue("SUPPNAME") : $CurrentForm->getValue("x_SUPPNAME");
        if (!$this->SUPPNAME->IsDetailKey) {
            $this->SUPPNAME->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'COMBNAME' first before field var 'x_COMBNAME'
        $val = $CurrentForm->hasValue("COMBNAME") ? $CurrentForm->getValue("COMBNAME") : $CurrentForm->getValue("x_COMBNAME");
        if (!$this->COMBNAME->IsDetailKey) {
            $this->COMBNAME->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'GENERICNAME' first before field var 'x_GENERICNAME'
        $val = $CurrentForm->hasValue("GENERICNAME") ? $CurrentForm->getValue("GENERICNAME") : $CurrentForm->getValue("x_GENERICNAME");
        if (!$this->GENERICNAME->IsDetailKey) {
            $this->GENERICNAME->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'REMARK' first before field var 'x_REMARK'
        $val = $CurrentForm->hasValue("REMARK") ? $CurrentForm->getValue("REMARK") : $CurrentForm->getValue("x_REMARK");
        if (!$this->REMARK->IsDetailKey) {
            $this->REMARK->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'TEMP' first before field var 'x_TEMP'
        $val = $CurrentForm->hasValue("TEMP") ? $CurrentForm->getValue("TEMP") : $CurrentForm->getValue("x_TEMP");
        if (!$this->TEMP->IsDetailKey) {
            $this->TEMP->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PACKING' first before field var 'x_PACKING'
        $val = $CurrentForm->hasValue("PACKING") ? $CurrentForm->getValue("PACKING") : $CurrentForm->getValue("x_PACKING");
        if (!$this->PACKING->IsDetailKey) {
            $this->PACKING->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PhysQty' first before field var 'x_PhysQty'
        $val = $CurrentForm->hasValue("PhysQty") ? $CurrentForm->getValue("PhysQty") : $CurrentForm->getValue("x_PhysQty");
        if (!$this->PhysQty->IsDetailKey) {
            $this->PhysQty->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'LedQty' first before field var 'x_LedQty'
        $val = $CurrentForm->hasValue("LedQty") ? $CurrentForm->getValue("LedQty") : $CurrentForm->getValue("x_LedQty");
        if (!$this->LedQty->IsDetailKey) {
            $this->LedQty->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PurValue' first before field var 'x_PurValue'
        $val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
        if (!$this->PurValue->IsDetailKey) {
            $this->PurValue->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PSGST' first before field var 'x_PSGST'
        $val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
        if (!$this->PSGST->IsDetailKey) {
            $this->PSGST->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'PCGST' first before field var 'x_PCGST'
        $val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
        if (!$this->PCGST->IsDetailKey) {
            $this->PCGST->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'SaleValue' first before field var 'x_SaleValue'
        $val = $CurrentForm->hasValue("SaleValue") ? $CurrentForm->getValue("SaleValue") : $CurrentForm->getValue("x_SaleValue");
        if (!$this->SaleValue->IsDetailKey) {
            $this->SaleValue->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'SSGST' first before field var 'x_SSGST'
        $val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
        if (!$this->SSGST->IsDetailKey) {
            $this->SSGST->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'SCGST' first before field var 'x_SCGST'
        $val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
        if (!$this->SCGST->IsDetailKey) {
            $this->SCGST->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'SaleRate' first before field var 'x_SaleRate'
        $val = $CurrentForm->hasValue("SaleRate") ? $CurrentForm->getValue("SaleRate") : $CurrentForm->getValue("x_SaleRate");
        if (!$this->SaleRate->IsDetailKey) {
            $this->SaleRate->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            $this->HospID->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'BRNAME' first before field var 'x_BRNAME'
        $val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
        if (!$this->BRNAME->IsDetailKey) {
            $this->BRNAME->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'OV' first before field var 'x_OV'
        $val = $CurrentForm->hasValue("OV") ? $CurrentForm->getValue("OV") : $CurrentForm->getValue("x_OV");
        if (!$this->OV->IsDetailKey) {
            $this->OV->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'LATESTOV' first before field var 'x_LATESTOV'
        $val = $CurrentForm->hasValue("LATESTOV") ? $CurrentForm->getValue("LATESTOV") : $CurrentForm->getValue("x_LATESTOV");
        if (!$this->LATESTOV->IsDetailKey) {
            $this->LATESTOV->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'ITEMTYPE' first before field var 'x_ITEMTYPE'
        $val = $CurrentForm->hasValue("ITEMTYPE") ? $CurrentForm->getValue("ITEMTYPE") : $CurrentForm->getValue("x_ITEMTYPE");
        if (!$this->ITEMTYPE->IsDetailKey) {
            $this->ITEMTYPE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'ROWID' first before field var 'x_ROWID'
        $val = $CurrentForm->hasValue("ROWID") ? $CurrentForm->getValue("ROWID") : $CurrentForm->getValue("x_ROWID");
        if (!$this->ROWID->IsDetailKey) {
            $this->ROWID->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'MOVED' first before field var 'x_MOVED'
        $val = $CurrentForm->hasValue("MOVED") ? $CurrentForm->getValue("MOVED") : $CurrentForm->getValue("x_MOVED");
        if (!$this->MOVED->IsDetailKey) {
            $this->MOVED->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'NEWTAX' first before field var 'x_NEWTAX'
        $val = $CurrentForm->hasValue("NEWTAX") ? $CurrentForm->getValue("NEWTAX") : $CurrentForm->getValue("x_NEWTAX");
        if (!$this->NEWTAX->IsDetailKey) {
            $this->NEWTAX->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'HSNCODE' first before field var 'x_HSNCODE'
        $val = $CurrentForm->hasValue("HSNCODE") ? $CurrentForm->getValue("HSNCODE") : $CurrentForm->getValue("x_HSNCODE");
        if (!$this->HSNCODE->IsDetailKey) {
            $this->HSNCODE->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'OLDTAX' first before field var 'x_OLDTAX'
        $val = $CurrentForm->hasValue("OLDTAX") ? $CurrentForm->getValue("OLDTAX") : $CurrentForm->getValue("x_OLDTAX");
        if (!$this->OLDTAX->IsDetailKey) {
            $this->OLDTAX->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Scheduling' first before field var 'x_Scheduling'
        $val = $CurrentForm->hasValue("Scheduling") ? $CurrentForm->getValue("Scheduling") : $CurrentForm->getValue("x_Scheduling");
        if (!$this->Scheduling->IsDetailKey) {
            $this->Scheduling->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'Schedulingh1' first before field var 'x_Schedulingh1'
        $val = $CurrentForm->hasValue("Schedulingh1") ? $CurrentForm->getValue("Schedulingh1") : $CurrentForm->getValue("x_Schedulingh1");
        if (!$this->Schedulingh1->IsDetailKey) {
            $this->Schedulingh1->setFormValue(ConvertFromUtf8($val));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->BRCODE->CurrentValue = ConvertToUtf8($this->BRCODE->FormValue);
        $this->PRC->CurrentValue = ConvertToUtf8($this->PRC->FormValue);
        $this->TYPE->CurrentValue = ConvertToUtf8($this->TYPE->FormValue);
        $this->DES->CurrentValue = ConvertToUtf8($this->DES->FormValue);
        $this->UM->CurrentValue = ConvertToUtf8($this->UM->FormValue);
        $this->RT->CurrentValue = ConvertToUtf8($this->RT->FormValue);
        $this->UR->CurrentValue = ConvertToUtf8($this->UR->FormValue);
        $this->TAXP->CurrentValue = ConvertToUtf8($this->TAXP->FormValue);
        $this->BATCHNO->CurrentValue = ConvertToUtf8($this->BATCHNO->FormValue);
        $this->OQ->CurrentValue = ConvertToUtf8($this->OQ->FormValue);
        $this->RQ->CurrentValue = ConvertToUtf8($this->RQ->FormValue);
        $this->MRQ->CurrentValue = ConvertToUtf8($this->MRQ->FormValue);
        $this->IQ->CurrentValue = ConvertToUtf8($this->IQ->FormValue);
        $this->MRP->CurrentValue = ConvertToUtf8($this->MRP->FormValue);
        $this->EXPDT->CurrentValue = ConvertToUtf8($this->EXPDT->FormValue);
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->SALQTY->CurrentValue = ConvertToUtf8($this->SALQTY->FormValue);
        $this->LASTPURDT->CurrentValue = ConvertToUtf8($this->LASTPURDT->FormValue);
        $this->LASTPURDT->CurrentValue = UnFormatDateTime($this->LASTPURDT->CurrentValue, 0);
        $this->LASTSUPP->CurrentValue = ConvertToUtf8($this->LASTSUPP->FormValue);
        $this->GENNAME->CurrentValue = ConvertToUtf8($this->GENNAME->FormValue);
        $this->LASTISSDT->CurrentValue = ConvertToUtf8($this->LASTISSDT->FormValue);
        $this->LASTISSDT->CurrentValue = UnFormatDateTime($this->LASTISSDT->CurrentValue, 0);
        $this->CREATEDDT->CurrentValue = ConvertToUtf8($this->CREATEDDT->FormValue);
        $this->CREATEDDT->CurrentValue = UnFormatDateTime($this->CREATEDDT->CurrentValue, 0);
        $this->OPPRC->CurrentValue = ConvertToUtf8($this->OPPRC->FormValue);
        $this->RESTRICT->CurrentValue = ConvertToUtf8($this->RESTRICT->FormValue);
        $this->BAWAPRC->CurrentValue = ConvertToUtf8($this->BAWAPRC->FormValue);
        $this->STAXPER->CurrentValue = ConvertToUtf8($this->STAXPER->FormValue);
        $this->TAXTYPE->CurrentValue = ConvertToUtf8($this->TAXTYPE->FormValue);
        $this->OLDTAXP->CurrentValue = ConvertToUtf8($this->OLDTAXP->FormValue);
        $this->TAXUPD->CurrentValue = ConvertToUtf8($this->TAXUPD->FormValue);
        $this->PACKAGE->CurrentValue = ConvertToUtf8($this->PACKAGE->FormValue);
        $this->NEWRT->CurrentValue = ConvertToUtf8($this->NEWRT->FormValue);
        $this->NEWMRP->CurrentValue = ConvertToUtf8($this->NEWMRP->FormValue);
        $this->NEWUR->CurrentValue = ConvertToUtf8($this->NEWUR->FormValue);
        $this->STATUS->CurrentValue = ConvertToUtf8($this->STATUS->FormValue);
        $this->RETNQTY->CurrentValue = ConvertToUtf8($this->RETNQTY->FormValue);
        $this->KEMODISC->CurrentValue = ConvertToUtf8($this->KEMODISC->FormValue);
        $this->PATSALE->CurrentValue = ConvertToUtf8($this->PATSALE->FormValue);
        $this->ORGAN->CurrentValue = ConvertToUtf8($this->ORGAN->FormValue);
        $this->OLDRQ->CurrentValue = ConvertToUtf8($this->OLDRQ->FormValue);
        $this->DRID->CurrentValue = ConvertToUtf8($this->DRID->FormValue);
        $this->MFRCODE->CurrentValue = ConvertToUtf8($this->MFRCODE->FormValue);
        $this->COMBCODE->CurrentValue = ConvertToUtf8($this->COMBCODE->FormValue);
        $this->GENCODE->CurrentValue = ConvertToUtf8($this->GENCODE->FormValue);
        $this->STRENGTH->CurrentValue = ConvertToUtf8($this->STRENGTH->FormValue);
        $this->UNIT->CurrentValue = ConvertToUtf8($this->UNIT->FormValue);
        $this->FORMULARY->CurrentValue = ConvertToUtf8($this->FORMULARY->FormValue);
        $this->STOCK->CurrentValue = ConvertToUtf8($this->STOCK->FormValue);
        $this->RACKNO->CurrentValue = ConvertToUtf8($this->RACKNO->FormValue);
        $this->SUPPNAME->CurrentValue = ConvertToUtf8($this->SUPPNAME->FormValue);
        $this->COMBNAME->CurrentValue = ConvertToUtf8($this->COMBNAME->FormValue);
        $this->GENERICNAME->CurrentValue = ConvertToUtf8($this->GENERICNAME->FormValue);
        $this->REMARK->CurrentValue = ConvertToUtf8($this->REMARK->FormValue);
        $this->TEMP->CurrentValue = ConvertToUtf8($this->TEMP->FormValue);
        $this->PACKING->CurrentValue = ConvertToUtf8($this->PACKING->FormValue);
        $this->PhysQty->CurrentValue = ConvertToUtf8($this->PhysQty->FormValue);
        $this->LedQty->CurrentValue = ConvertToUtf8($this->LedQty->FormValue);
        $this->PurValue->CurrentValue = ConvertToUtf8($this->PurValue->FormValue);
        $this->PSGST->CurrentValue = ConvertToUtf8($this->PSGST->FormValue);
        $this->PCGST->CurrentValue = ConvertToUtf8($this->PCGST->FormValue);
        $this->SaleValue->CurrentValue = ConvertToUtf8($this->SaleValue->FormValue);
        $this->SSGST->CurrentValue = ConvertToUtf8($this->SSGST->FormValue);
        $this->SCGST->CurrentValue = ConvertToUtf8($this->SCGST->FormValue);
        $this->SaleRate->CurrentValue = ConvertToUtf8($this->SaleRate->FormValue);
        $this->HospID->CurrentValue = ConvertToUtf8($this->HospID->FormValue);
        $this->BRNAME->CurrentValue = ConvertToUtf8($this->BRNAME->FormValue);
        $this->OV->CurrentValue = ConvertToUtf8($this->OV->FormValue);
        $this->LATESTOV->CurrentValue = ConvertToUtf8($this->LATESTOV->FormValue);
        $this->ITEMTYPE->CurrentValue = ConvertToUtf8($this->ITEMTYPE->FormValue);
        $this->ROWID->CurrentValue = ConvertToUtf8($this->ROWID->FormValue);
        $this->MOVED->CurrentValue = ConvertToUtf8($this->MOVED->FormValue);
        $this->NEWTAX->CurrentValue = ConvertToUtf8($this->NEWTAX->FormValue);
        $this->HSNCODE->CurrentValue = ConvertToUtf8($this->HSNCODE->FormValue);
        $this->OLDTAX->CurrentValue = ConvertToUtf8($this->OLDTAX->FormValue);
        $this->Scheduling->CurrentValue = ConvertToUtf8($this->Scheduling->FormValue);
        $this->Schedulingh1->CurrentValue = ConvertToUtf8($this->Schedulingh1->FormValue);
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
        $this->loadDefaultValues();
        $row = [];
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['TYPE'] = $this->TYPE->CurrentValue;
        $row['DES'] = $this->DES->CurrentValue;
        $row['UM'] = $this->UM->CurrentValue;
        $row['RT'] = $this->RT->CurrentValue;
        $row['UR'] = $this->UR->CurrentValue;
        $row['TAXP'] = $this->TAXP->CurrentValue;
        $row['BATCHNO'] = $this->BATCHNO->CurrentValue;
        $row['OQ'] = $this->OQ->CurrentValue;
        $row['RQ'] = $this->RQ->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['EXPDT'] = $this->EXPDT->CurrentValue;
        $row['SALQTY'] = $this->SALQTY->CurrentValue;
        $row['LASTPURDT'] = $this->LASTPURDT->CurrentValue;
        $row['LASTSUPP'] = $this->LASTSUPP->CurrentValue;
        $row['GENNAME'] = $this->GENNAME->CurrentValue;
        $row['LASTISSDT'] = $this->LASTISSDT->CurrentValue;
        $row['CREATEDDT'] = $this->CREATEDDT->CurrentValue;
        $row['OPPRC'] = $this->OPPRC->CurrentValue;
        $row['RESTRICT'] = $this->RESTRICT->CurrentValue;
        $row['BAWAPRC'] = $this->BAWAPRC->CurrentValue;
        $row['STAXPER'] = $this->STAXPER->CurrentValue;
        $row['TAXTYPE'] = $this->TAXTYPE->CurrentValue;
        $row['OLDTAXP'] = $this->OLDTAXP->CurrentValue;
        $row['TAXUPD'] = $this->TAXUPD->CurrentValue;
        $row['PACKAGE'] = $this->PACKAGE->CurrentValue;
        $row['NEWRT'] = $this->NEWRT->CurrentValue;
        $row['NEWMRP'] = $this->NEWMRP->CurrentValue;
        $row['NEWUR'] = $this->NEWUR->CurrentValue;
        $row['STATUS'] = $this->STATUS->CurrentValue;
        $row['RETNQTY'] = $this->RETNQTY->CurrentValue;
        $row['KEMODISC'] = $this->KEMODISC->CurrentValue;
        $row['PATSALE'] = $this->PATSALE->CurrentValue;
        $row['ORGAN'] = $this->ORGAN->CurrentValue;
        $row['OLDRQ'] = $this->OLDRQ->CurrentValue;
        $row['DRID'] = $this->DRID->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['COMBCODE'] = $this->COMBCODE->CurrentValue;
        $row['GENCODE'] = $this->GENCODE->CurrentValue;
        $row['STRENGTH'] = $this->STRENGTH->CurrentValue;
        $row['UNIT'] = $this->UNIT->CurrentValue;
        $row['FORMULARY'] = $this->FORMULARY->CurrentValue;
        $row['STOCK'] = $this->STOCK->CurrentValue;
        $row['RACKNO'] = $this->RACKNO->CurrentValue;
        $row['SUPPNAME'] = $this->SUPPNAME->CurrentValue;
        $row['COMBNAME'] = $this->COMBNAME->CurrentValue;
        $row['GENERICNAME'] = $this->GENERICNAME->CurrentValue;
        $row['REMARK'] = $this->REMARK->CurrentValue;
        $row['TEMP'] = $this->TEMP->CurrentValue;
        $row['PACKING'] = $this->PACKING->CurrentValue;
        $row['PhysQty'] = $this->PhysQty->CurrentValue;
        $row['LedQty'] = $this->LedQty->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['PurValue'] = $this->PurValue->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['SaleValue'] = $this->SaleValue->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['SaleRate'] = $this->SaleRate->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['BRNAME'] = $this->BRNAME->CurrentValue;
        $row['OV'] = $this->OV->CurrentValue;
        $row['LATESTOV'] = $this->LATESTOV->CurrentValue;
        $row['ITEMTYPE'] = $this->ITEMTYPE->CurrentValue;
        $row['ROWID'] = $this->ROWID->CurrentValue;
        $row['MOVED'] = $this->MOVED->CurrentValue;
        $row['NEWTAX'] = $this->NEWTAX->CurrentValue;
        $row['HSNCODE'] = $this->HSNCODE->CurrentValue;
        $row['OLDTAX'] = $this->OLDTAX->CurrentValue;
        $row['Scheduling'] = $this->Scheduling->CurrentValue;
        $row['Schedulingh1'] = $this->Schedulingh1->CurrentValue;
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
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
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
        if ($this->SALQTY->FormValue == $this->SALQTY->CurrentValue && is_numeric(ConvertToFloatString($this->SALQTY->CurrentValue))) {
            $this->SALQTY->CurrentValue = ConvertToFloatString($this->SALQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STAXPER->FormValue == $this->STAXPER->CurrentValue && is_numeric(ConvertToFloatString($this->STAXPER->CurrentValue))) {
            $this->STAXPER->CurrentValue = ConvertToFloatString($this->STAXPER->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDTAXP->FormValue == $this->OLDTAXP->CurrentValue && is_numeric(ConvertToFloatString($this->OLDTAXP->CurrentValue))) {
            $this->OLDTAXP->CurrentValue = ConvertToFloatString($this->OLDTAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWRT->FormValue == $this->NEWRT->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRT->CurrentValue))) {
            $this->NEWRT->CurrentValue = ConvertToFloatString($this->NEWRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWMRP->FormValue == $this->NEWMRP->CurrentValue && is_numeric(ConvertToFloatString($this->NEWMRP->CurrentValue))) {
            $this->NEWMRP->CurrentValue = ConvertToFloatString($this->NEWMRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWUR->FormValue == $this->NEWUR->CurrentValue && is_numeric(ConvertToFloatString($this->NEWUR->CurrentValue))) {
            $this->NEWUR->CurrentValue = ConvertToFloatString($this->NEWUR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RETNQTY->FormValue == $this->RETNQTY->CurrentValue && is_numeric(ConvertToFloatString($this->RETNQTY->CurrentValue))) {
            $this->RETNQTY->CurrentValue = ConvertToFloatString($this->RETNQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PATSALE->FormValue == $this->PATSALE->CurrentValue && is_numeric(ConvertToFloatString($this->PATSALE->CurrentValue))) {
            $this->PATSALE->CurrentValue = ConvertToFloatString($this->PATSALE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRQ->FormValue == $this->OLDRQ->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRQ->CurrentValue))) {
            $this->OLDRQ->CurrentValue = ConvertToFloatString($this->OLDRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue))) {
            $this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STOCK->FormValue == $this->STOCK->CurrentValue && is_numeric(ConvertToFloatString($this->STOCK->CurrentValue))) {
            $this->STOCK->CurrentValue = ConvertToFloatString($this->STOCK->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PACKING->FormValue == $this->PACKING->CurrentValue && is_numeric(ConvertToFloatString($this->PACKING->CurrentValue))) {
            $this->PACKING->CurrentValue = ConvertToFloatString($this->PACKING->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PhysQty->FormValue == $this->PhysQty->CurrentValue && is_numeric(ConvertToFloatString($this->PhysQty->CurrentValue))) {
            $this->PhysQty->CurrentValue = ConvertToFloatString($this->PhysQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LedQty->FormValue == $this->LedQty->CurrentValue && is_numeric(ConvertToFloatString($this->LedQty->CurrentValue))) {
            $this->LedQty->CurrentValue = ConvertToFloatString($this->LedQty->CurrentValue);
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

        // Convert decimal values if posted back
        if ($this->OV->FormValue == $this->OV->CurrentValue && is_numeric(ConvertToFloatString($this->OV->CurrentValue))) {
            $this->OV->CurrentValue = ConvertToFloatString($this->OV->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LATESTOV->FormValue == $this->LATESTOV->CurrentValue && is_numeric(ConvertToFloatString($this->LATESTOV->CurrentValue))) {
            $this->LATESTOV->CurrentValue = ConvertToFloatString($this->LATESTOV->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWTAX->FormValue == $this->NEWTAX->CurrentValue && is_numeric(ConvertToFloatString($this->NEWTAX->CurrentValue))) {
            $this->NEWTAX->CurrentValue = ConvertToFloatString($this->NEWTAX->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDTAX->FormValue == $this->OLDTAX->CurrentValue && is_numeric(ConvertToFloatString($this->OLDTAX->CurrentValue))) {
            $this->OLDTAX->CurrentValue = ConvertToFloatString($this->OLDTAX->CurrentValue);
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

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

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

            // SALQTY
            $this->SALQTY->ViewValue = $this->SALQTY->CurrentValue;
            $this->SALQTY->ViewValue = FormatNumber($this->SALQTY->ViewValue, 2, -2, -2, -2);
            $this->SALQTY->ViewCustomAttributes = "";

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

            // OPPRC
            $this->OPPRC->ViewValue = $this->OPPRC->CurrentValue;
            $this->OPPRC->ViewCustomAttributes = "";

            // RESTRICT
            $this->RESTRICT->ViewValue = $this->RESTRICT->CurrentValue;
            $this->RESTRICT->ViewCustomAttributes = "";

            // BAWAPRC
            $this->BAWAPRC->ViewValue = $this->BAWAPRC->CurrentValue;
            $this->BAWAPRC->ViewCustomAttributes = "";

            // STAXPER
            $this->STAXPER->ViewValue = $this->STAXPER->CurrentValue;
            $this->STAXPER->ViewValue = FormatNumber($this->STAXPER->ViewValue, 2, -2, -2, -2);
            $this->STAXPER->ViewCustomAttributes = "";

            // TAXTYPE
            $this->TAXTYPE->ViewValue = $this->TAXTYPE->CurrentValue;
            $this->TAXTYPE->ViewCustomAttributes = "";

            // OLDTAXP
            $this->OLDTAXP->ViewValue = $this->OLDTAXP->CurrentValue;
            $this->OLDTAXP->ViewValue = FormatNumber($this->OLDTAXP->ViewValue, 2, -2, -2, -2);
            $this->OLDTAXP->ViewCustomAttributes = "";

            // TAXUPD
            $this->TAXUPD->ViewValue = $this->TAXUPD->CurrentValue;
            $this->TAXUPD->ViewCustomAttributes = "";

            // PACKAGE
            $this->PACKAGE->ViewValue = $this->PACKAGE->CurrentValue;
            $this->PACKAGE->ViewCustomAttributes = "";

            // NEWRT
            $this->NEWRT->ViewValue = $this->NEWRT->CurrentValue;
            $this->NEWRT->ViewValue = FormatNumber($this->NEWRT->ViewValue, 2, -2, -2, -2);
            $this->NEWRT->ViewCustomAttributes = "";

            // NEWMRP
            $this->NEWMRP->ViewValue = $this->NEWMRP->CurrentValue;
            $this->NEWMRP->ViewValue = FormatNumber($this->NEWMRP->ViewValue, 2, -2, -2, -2);
            $this->NEWMRP->ViewCustomAttributes = "";

            // NEWUR
            $this->NEWUR->ViewValue = $this->NEWUR->CurrentValue;
            $this->NEWUR->ViewValue = FormatNumber($this->NEWUR->ViewValue, 2, -2, -2, -2);
            $this->NEWUR->ViewCustomAttributes = "";

            // STATUS
            $this->STATUS->ViewValue = $this->STATUS->CurrentValue;
            $this->STATUS->ViewCustomAttributes = "";

            // RETNQTY
            $this->RETNQTY->ViewValue = $this->RETNQTY->CurrentValue;
            $this->RETNQTY->ViewValue = FormatNumber($this->RETNQTY->ViewValue, 2, -2, -2, -2);
            $this->RETNQTY->ViewCustomAttributes = "";

            // KEMODISC
            $this->KEMODISC->ViewValue = $this->KEMODISC->CurrentValue;
            $this->KEMODISC->ViewCustomAttributes = "";

            // PATSALE
            $this->PATSALE->ViewValue = $this->PATSALE->CurrentValue;
            $this->PATSALE->ViewValue = FormatNumber($this->PATSALE->ViewValue, 2, -2, -2, -2);
            $this->PATSALE->ViewCustomAttributes = "";

            // ORGAN
            $this->ORGAN->ViewValue = $this->ORGAN->CurrentValue;
            $this->ORGAN->ViewCustomAttributes = "";

            // OLDRQ
            $this->OLDRQ->ViewValue = $this->OLDRQ->CurrentValue;
            $this->OLDRQ->ViewValue = FormatNumber($this->OLDRQ->ViewValue, 2, -2, -2, -2);
            $this->OLDRQ->ViewCustomAttributes = "";

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

            // STOCK
            $this->STOCK->ViewValue = $this->STOCK->CurrentValue;
            $this->STOCK->ViewValue = FormatNumber($this->STOCK->ViewValue, 2, -2, -2, -2);
            $this->STOCK->ViewCustomAttributes = "";

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

            // PACKING
            $this->PACKING->ViewValue = $this->PACKING->CurrentValue;
            $this->PACKING->ViewValue = FormatNumber($this->PACKING->ViewValue, 2, -2, -2, -2);
            $this->PACKING->ViewCustomAttributes = "";

            // PhysQty
            $this->PhysQty->ViewValue = $this->PhysQty->CurrentValue;
            $this->PhysQty->ViewValue = FormatNumber($this->PhysQty->ViewValue, 2, -2, -2, -2);
            $this->PhysQty->ViewCustomAttributes = "";

            // LedQty
            $this->LedQty->ViewValue = $this->LedQty->CurrentValue;
            $this->LedQty->ViewValue = FormatNumber($this->LedQty->ViewValue, 2, -2, -2, -2);
            $this->LedQty->ViewCustomAttributes = "";

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

            // OV
            $this->OV->ViewValue = $this->OV->CurrentValue;
            $this->OV->ViewValue = FormatNumber($this->OV->ViewValue, 2, -2, -2, -2);
            $this->OV->ViewCustomAttributes = "";

            // LATESTOV
            $this->LATESTOV->ViewValue = $this->LATESTOV->CurrentValue;
            $this->LATESTOV->ViewValue = FormatNumber($this->LATESTOV->ViewValue, 2, -2, -2, -2);
            $this->LATESTOV->ViewCustomAttributes = "";

            // ITEMTYPE
            $this->ITEMTYPE->ViewValue = $this->ITEMTYPE->CurrentValue;
            $this->ITEMTYPE->ViewCustomAttributes = "";

            // ROWID
            $this->ROWID->ViewValue = $this->ROWID->CurrentValue;
            $this->ROWID->ViewCustomAttributes = "";

            // MOVED
            $this->MOVED->ViewValue = $this->MOVED->CurrentValue;
            $this->MOVED->ViewValue = FormatNumber($this->MOVED->ViewValue, 0, -2, -2, -2);
            $this->MOVED->ViewCustomAttributes = "";

            // NEWTAX
            $this->NEWTAX->ViewValue = $this->NEWTAX->CurrentValue;
            $this->NEWTAX->ViewValue = FormatNumber($this->NEWTAX->ViewValue, 2, -2, -2, -2);
            $this->NEWTAX->ViewCustomAttributes = "";

            // HSNCODE
            $this->HSNCODE->ViewValue = $this->HSNCODE->CurrentValue;
            $this->HSNCODE->ViewCustomAttributes = "";

            // OLDTAX
            $this->OLDTAX->ViewValue = $this->OLDTAX->CurrentValue;
            $this->OLDTAX->ViewValue = FormatNumber($this->OLDTAX->ViewValue, 2, -2, -2, -2);
            $this->OLDTAX->ViewCustomAttributes = "";

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

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

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

            // SALQTY
            $this->SALQTY->LinkCustomAttributes = "";
            $this->SALQTY->HrefValue = "";
            $this->SALQTY->TooltipValue = "";

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

            // OPPRC
            $this->OPPRC->LinkCustomAttributes = "";
            $this->OPPRC->HrefValue = "";
            $this->OPPRC->TooltipValue = "";

            // RESTRICT
            $this->RESTRICT->LinkCustomAttributes = "";
            $this->RESTRICT->HrefValue = "";
            $this->RESTRICT->TooltipValue = "";

            // BAWAPRC
            $this->BAWAPRC->LinkCustomAttributes = "";
            $this->BAWAPRC->HrefValue = "";
            $this->BAWAPRC->TooltipValue = "";

            // STAXPER
            $this->STAXPER->LinkCustomAttributes = "";
            $this->STAXPER->HrefValue = "";
            $this->STAXPER->TooltipValue = "";

            // TAXTYPE
            $this->TAXTYPE->LinkCustomAttributes = "";
            $this->TAXTYPE->HrefValue = "";
            $this->TAXTYPE->TooltipValue = "";

            // OLDTAXP
            $this->OLDTAXP->LinkCustomAttributes = "";
            $this->OLDTAXP->HrefValue = "";
            $this->OLDTAXP->TooltipValue = "";

            // TAXUPD
            $this->TAXUPD->LinkCustomAttributes = "";
            $this->TAXUPD->HrefValue = "";
            $this->TAXUPD->TooltipValue = "";

            // PACKAGE
            $this->PACKAGE->LinkCustomAttributes = "";
            $this->PACKAGE->HrefValue = "";
            $this->PACKAGE->TooltipValue = "";

            // NEWRT
            $this->NEWRT->LinkCustomAttributes = "";
            $this->NEWRT->HrefValue = "";
            $this->NEWRT->TooltipValue = "";

            // NEWMRP
            $this->NEWMRP->LinkCustomAttributes = "";
            $this->NEWMRP->HrefValue = "";
            $this->NEWMRP->TooltipValue = "";

            // NEWUR
            $this->NEWUR->LinkCustomAttributes = "";
            $this->NEWUR->HrefValue = "";
            $this->NEWUR->TooltipValue = "";

            // STATUS
            $this->STATUS->LinkCustomAttributes = "";
            $this->STATUS->HrefValue = "";
            $this->STATUS->TooltipValue = "";

            // RETNQTY
            $this->RETNQTY->LinkCustomAttributes = "";
            $this->RETNQTY->HrefValue = "";
            $this->RETNQTY->TooltipValue = "";

            // KEMODISC
            $this->KEMODISC->LinkCustomAttributes = "";
            $this->KEMODISC->HrefValue = "";
            $this->KEMODISC->TooltipValue = "";

            // PATSALE
            $this->PATSALE->LinkCustomAttributes = "";
            $this->PATSALE->HrefValue = "";
            $this->PATSALE->TooltipValue = "";

            // ORGAN
            $this->ORGAN->LinkCustomAttributes = "";
            $this->ORGAN->HrefValue = "";
            $this->ORGAN->TooltipValue = "";

            // OLDRQ
            $this->OLDRQ->LinkCustomAttributes = "";
            $this->OLDRQ->HrefValue = "";
            $this->OLDRQ->TooltipValue = "";

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

            // STOCK
            $this->STOCK->LinkCustomAttributes = "";
            $this->STOCK->HrefValue = "";
            $this->STOCK->TooltipValue = "";

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

            // PACKING
            $this->PACKING->LinkCustomAttributes = "";
            $this->PACKING->HrefValue = "";
            $this->PACKING->TooltipValue = "";

            // PhysQty
            $this->PhysQty->LinkCustomAttributes = "";
            $this->PhysQty->HrefValue = "";
            $this->PhysQty->TooltipValue = "";

            // LedQty
            $this->LedQty->LinkCustomAttributes = "";
            $this->LedQty->HrefValue = "";
            $this->LedQty->TooltipValue = "";

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

            // OV
            $this->OV->LinkCustomAttributes = "";
            $this->OV->HrefValue = "";
            $this->OV->TooltipValue = "";

            // LATESTOV
            $this->LATESTOV->LinkCustomAttributes = "";
            $this->LATESTOV->HrefValue = "";
            $this->LATESTOV->TooltipValue = "";

            // ITEMTYPE
            $this->ITEMTYPE->LinkCustomAttributes = "";
            $this->ITEMTYPE->HrefValue = "";
            $this->ITEMTYPE->TooltipValue = "";

            // ROWID
            $this->ROWID->LinkCustomAttributes = "";
            $this->ROWID->HrefValue = "";
            $this->ROWID->TooltipValue = "";

            // MOVED
            $this->MOVED->LinkCustomAttributes = "";
            $this->MOVED->HrefValue = "";
            $this->MOVED->TooltipValue = "";

            // NEWTAX
            $this->NEWTAX->LinkCustomAttributes = "";
            $this->NEWTAX->HrefValue = "";
            $this->NEWTAX->TooltipValue = "";

            // HSNCODE
            $this->HSNCODE->LinkCustomAttributes = "";
            $this->HSNCODE->HrefValue = "";
            $this->HSNCODE->TooltipValue = "";

            // OLDTAX
            $this->OLDTAX->LinkCustomAttributes = "";
            $this->OLDTAX->HrefValue = "";
            $this->OLDTAX->TooltipValue = "";

            // Scheduling
            $this->Scheduling->LinkCustomAttributes = "";
            $this->Scheduling->HrefValue = "";
            $this->Scheduling->TooltipValue = "";

            // Schedulingh1
            $this->Schedulingh1->LinkCustomAttributes = "";
            $this->Schedulingh1->HrefValue = "";
            $this->Schedulingh1->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->CurrentValue = PharmacyID();

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

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
            }

            // TAXP
            $this->TAXP->EditAttrs["class"] = "form-control";
            $this->TAXP->EditCustomAttributes = "";
            $this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
            $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
            if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue)) {
                $this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
            }

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

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

            // SALQTY
            $this->SALQTY->EditAttrs["class"] = "form-control";
            $this->SALQTY->EditCustomAttributes = "";
            $this->SALQTY->EditValue = HtmlEncode($this->SALQTY->CurrentValue);
            $this->SALQTY->PlaceHolder = RemoveHtml($this->SALQTY->caption());
            if (strval($this->SALQTY->EditValue) != "" && is_numeric($this->SALQTY->EditValue)) {
                $this->SALQTY->EditValue = FormatNumber($this->SALQTY->EditValue, -2, -2, -2, -2);
            }

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
            $this->CREATEDDT->EditAttrs["class"] = "form-control";
            $this->CREATEDDT->EditCustomAttributes = "";
            $this->CREATEDDT->CurrentValue = FormatDateTime(CurrentDateTime(), 8);

            // OPPRC
            $this->OPPRC->EditAttrs["class"] = "form-control";
            $this->OPPRC->EditCustomAttributes = "";
            if (!$this->OPPRC->Raw) {
                $this->OPPRC->CurrentValue = HtmlDecode($this->OPPRC->CurrentValue);
            }
            $this->OPPRC->EditValue = HtmlEncode($this->OPPRC->CurrentValue);
            $this->OPPRC->PlaceHolder = RemoveHtml($this->OPPRC->caption());

            // RESTRICT
            $this->RESTRICT->EditAttrs["class"] = "form-control";
            $this->RESTRICT->EditCustomAttributes = "";
            if (!$this->RESTRICT->Raw) {
                $this->RESTRICT->CurrentValue = HtmlDecode($this->RESTRICT->CurrentValue);
            }
            $this->RESTRICT->EditValue = HtmlEncode($this->RESTRICT->CurrentValue);
            $this->RESTRICT->PlaceHolder = RemoveHtml($this->RESTRICT->caption());

            // BAWAPRC
            $this->BAWAPRC->EditAttrs["class"] = "form-control";
            $this->BAWAPRC->EditCustomAttributes = "";
            if (!$this->BAWAPRC->Raw) {
                $this->BAWAPRC->CurrentValue = HtmlDecode($this->BAWAPRC->CurrentValue);
            }
            $this->BAWAPRC->EditValue = HtmlEncode($this->BAWAPRC->CurrentValue);
            $this->BAWAPRC->PlaceHolder = RemoveHtml($this->BAWAPRC->caption());

            // STAXPER
            $this->STAXPER->EditAttrs["class"] = "form-control";
            $this->STAXPER->EditCustomAttributes = "";
            $this->STAXPER->EditValue = HtmlEncode($this->STAXPER->CurrentValue);
            $this->STAXPER->PlaceHolder = RemoveHtml($this->STAXPER->caption());
            if (strval($this->STAXPER->EditValue) != "" && is_numeric($this->STAXPER->EditValue)) {
                $this->STAXPER->EditValue = FormatNumber($this->STAXPER->EditValue, -2, -2, -2, -2);
            }

            // TAXTYPE
            $this->TAXTYPE->EditAttrs["class"] = "form-control";
            $this->TAXTYPE->EditCustomAttributes = "";
            if (!$this->TAXTYPE->Raw) {
                $this->TAXTYPE->CurrentValue = HtmlDecode($this->TAXTYPE->CurrentValue);
            }
            $this->TAXTYPE->EditValue = HtmlEncode($this->TAXTYPE->CurrentValue);
            $this->TAXTYPE->PlaceHolder = RemoveHtml($this->TAXTYPE->caption());

            // OLDTAXP
            $this->OLDTAXP->EditAttrs["class"] = "form-control";
            $this->OLDTAXP->EditCustomAttributes = "";
            $this->OLDTAXP->EditValue = HtmlEncode($this->OLDTAXP->CurrentValue);
            $this->OLDTAXP->PlaceHolder = RemoveHtml($this->OLDTAXP->caption());
            if (strval($this->OLDTAXP->EditValue) != "" && is_numeric($this->OLDTAXP->EditValue)) {
                $this->OLDTAXP->EditValue = FormatNumber($this->OLDTAXP->EditValue, -2, -2, -2, -2);
            }

            // TAXUPD
            $this->TAXUPD->EditAttrs["class"] = "form-control";
            $this->TAXUPD->EditCustomAttributes = "";
            if (!$this->TAXUPD->Raw) {
                $this->TAXUPD->CurrentValue = HtmlDecode($this->TAXUPD->CurrentValue);
            }
            $this->TAXUPD->EditValue = HtmlEncode($this->TAXUPD->CurrentValue);
            $this->TAXUPD->PlaceHolder = RemoveHtml($this->TAXUPD->caption());

            // PACKAGE
            $this->PACKAGE->EditAttrs["class"] = "form-control";
            $this->PACKAGE->EditCustomAttributes = "";
            if (!$this->PACKAGE->Raw) {
                $this->PACKAGE->CurrentValue = HtmlDecode($this->PACKAGE->CurrentValue);
            }
            $this->PACKAGE->EditValue = HtmlEncode($this->PACKAGE->CurrentValue);
            $this->PACKAGE->PlaceHolder = RemoveHtml($this->PACKAGE->caption());

            // NEWRT
            $this->NEWRT->EditAttrs["class"] = "form-control";
            $this->NEWRT->EditCustomAttributes = "";
            $this->NEWRT->EditValue = HtmlEncode($this->NEWRT->CurrentValue);
            $this->NEWRT->PlaceHolder = RemoveHtml($this->NEWRT->caption());
            if (strval($this->NEWRT->EditValue) != "" && is_numeric($this->NEWRT->EditValue)) {
                $this->NEWRT->EditValue = FormatNumber($this->NEWRT->EditValue, -2, -2, -2, -2);
            }

            // NEWMRP
            $this->NEWMRP->EditAttrs["class"] = "form-control";
            $this->NEWMRP->EditCustomAttributes = "";
            $this->NEWMRP->EditValue = HtmlEncode($this->NEWMRP->CurrentValue);
            $this->NEWMRP->PlaceHolder = RemoveHtml($this->NEWMRP->caption());
            if (strval($this->NEWMRP->EditValue) != "" && is_numeric($this->NEWMRP->EditValue)) {
                $this->NEWMRP->EditValue = FormatNumber($this->NEWMRP->EditValue, -2, -2, -2, -2);
            }

            // NEWUR
            $this->NEWUR->EditAttrs["class"] = "form-control";
            $this->NEWUR->EditCustomAttributes = "";
            $this->NEWUR->EditValue = HtmlEncode($this->NEWUR->CurrentValue);
            $this->NEWUR->PlaceHolder = RemoveHtml($this->NEWUR->caption());
            if (strval($this->NEWUR->EditValue) != "" && is_numeric($this->NEWUR->EditValue)) {
                $this->NEWUR->EditValue = FormatNumber($this->NEWUR->EditValue, -2, -2, -2, -2);
            }

            // STATUS
            $this->STATUS->EditAttrs["class"] = "form-control";
            $this->STATUS->EditCustomAttributes = "";
            if (!$this->STATUS->Raw) {
                $this->STATUS->CurrentValue = HtmlDecode($this->STATUS->CurrentValue);
            }
            $this->STATUS->EditValue = HtmlEncode($this->STATUS->CurrentValue);
            $this->STATUS->PlaceHolder = RemoveHtml($this->STATUS->caption());

            // RETNQTY
            $this->RETNQTY->EditAttrs["class"] = "form-control";
            $this->RETNQTY->EditCustomAttributes = "";
            $this->RETNQTY->EditValue = HtmlEncode($this->RETNQTY->CurrentValue);
            $this->RETNQTY->PlaceHolder = RemoveHtml($this->RETNQTY->caption());
            if (strval($this->RETNQTY->EditValue) != "" && is_numeric($this->RETNQTY->EditValue)) {
                $this->RETNQTY->EditValue = FormatNumber($this->RETNQTY->EditValue, -2, -2, -2, -2);
            }

            // KEMODISC
            $this->KEMODISC->EditAttrs["class"] = "form-control";
            $this->KEMODISC->EditCustomAttributes = "";
            if (!$this->KEMODISC->Raw) {
                $this->KEMODISC->CurrentValue = HtmlDecode($this->KEMODISC->CurrentValue);
            }
            $this->KEMODISC->EditValue = HtmlEncode($this->KEMODISC->CurrentValue);
            $this->KEMODISC->PlaceHolder = RemoveHtml($this->KEMODISC->caption());

            // PATSALE
            $this->PATSALE->EditAttrs["class"] = "form-control";
            $this->PATSALE->EditCustomAttributes = "";
            $this->PATSALE->EditValue = HtmlEncode($this->PATSALE->CurrentValue);
            $this->PATSALE->PlaceHolder = RemoveHtml($this->PATSALE->caption());
            if (strval($this->PATSALE->EditValue) != "" && is_numeric($this->PATSALE->EditValue)) {
                $this->PATSALE->EditValue = FormatNumber($this->PATSALE->EditValue, -2, -2, -2, -2);
            }

            // ORGAN
            $this->ORGAN->EditAttrs["class"] = "form-control";
            $this->ORGAN->EditCustomAttributes = "";
            if (!$this->ORGAN->Raw) {
                $this->ORGAN->CurrentValue = HtmlDecode($this->ORGAN->CurrentValue);
            }
            $this->ORGAN->EditValue = HtmlEncode($this->ORGAN->CurrentValue);
            $this->ORGAN->PlaceHolder = RemoveHtml($this->ORGAN->caption());

            // OLDRQ
            $this->OLDRQ->EditAttrs["class"] = "form-control";
            $this->OLDRQ->EditCustomAttributes = "";
            $this->OLDRQ->EditValue = HtmlEncode($this->OLDRQ->CurrentValue);
            $this->OLDRQ->PlaceHolder = RemoveHtml($this->OLDRQ->caption());
            if (strval($this->OLDRQ->EditValue) != "" && is_numeric($this->OLDRQ->EditValue)) {
                $this->OLDRQ->EditValue = FormatNumber($this->OLDRQ->EditValue, -2, -2, -2, -2);
            }

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

            // STOCK
            $this->STOCK->EditAttrs["class"] = "form-control";
            $this->STOCK->EditCustomAttributes = "";
            $this->STOCK->EditValue = HtmlEncode($this->STOCK->CurrentValue);
            $this->STOCK->PlaceHolder = RemoveHtml($this->STOCK->caption());
            if (strval($this->STOCK->EditValue) != "" && is_numeric($this->STOCK->EditValue)) {
                $this->STOCK->EditValue = FormatNumber($this->STOCK->EditValue, -2, -2, -2, -2);
            }

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

            // PACKING
            $this->PACKING->EditAttrs["class"] = "form-control";
            $this->PACKING->EditCustomAttributes = "";
            $this->PACKING->EditValue = HtmlEncode($this->PACKING->CurrentValue);
            $this->PACKING->PlaceHolder = RemoveHtml($this->PACKING->caption());
            if (strval($this->PACKING->EditValue) != "" && is_numeric($this->PACKING->EditValue)) {
                $this->PACKING->EditValue = FormatNumber($this->PACKING->EditValue, -2, -2, -2, -2);
            }

            // PhysQty
            $this->PhysQty->EditAttrs["class"] = "form-control";
            $this->PhysQty->EditCustomAttributes = "";
            $this->PhysQty->EditValue = HtmlEncode($this->PhysQty->CurrentValue);
            $this->PhysQty->PlaceHolder = RemoveHtml($this->PhysQty->caption());
            if (strval($this->PhysQty->EditValue) != "" && is_numeric($this->PhysQty->EditValue)) {
                $this->PhysQty->EditValue = FormatNumber($this->PhysQty->EditValue, -2, -2, -2, -2);
            }

            // LedQty
            $this->LedQty->EditAttrs["class"] = "form-control";
            $this->LedQty->EditCustomAttributes = "";
            $this->LedQty->EditValue = HtmlEncode($this->LedQty->CurrentValue);
            $this->LedQty->PlaceHolder = RemoveHtml($this->LedQty->caption());
            if (strval($this->LedQty->EditValue) != "" && is_numeric($this->LedQty->EditValue)) {
                $this->LedQty->EditValue = FormatNumber($this->LedQty->EditValue, -2, -2, -2, -2);
            }

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
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->CurrentValue = HospitalID();

            // BRNAME
            $this->BRNAME->EditAttrs["class"] = "form-control";
            $this->BRNAME->EditCustomAttributes = "";
            $this->BRNAME->CurrentValue = PharmacyID();

            // OV
            $this->OV->EditAttrs["class"] = "form-control";
            $this->OV->EditCustomAttributes = "";
            $this->OV->EditValue = HtmlEncode($this->OV->CurrentValue);
            $this->OV->PlaceHolder = RemoveHtml($this->OV->caption());
            if (strval($this->OV->EditValue) != "" && is_numeric($this->OV->EditValue)) {
                $this->OV->EditValue = FormatNumber($this->OV->EditValue, -2, -2, -2, -2);
            }

            // LATESTOV
            $this->LATESTOV->EditAttrs["class"] = "form-control";
            $this->LATESTOV->EditCustomAttributes = "";
            $this->LATESTOV->EditValue = HtmlEncode($this->LATESTOV->CurrentValue);
            $this->LATESTOV->PlaceHolder = RemoveHtml($this->LATESTOV->caption());
            if (strval($this->LATESTOV->EditValue) != "" && is_numeric($this->LATESTOV->EditValue)) {
                $this->LATESTOV->EditValue = FormatNumber($this->LATESTOV->EditValue, -2, -2, -2, -2);
            }

            // ITEMTYPE
            $this->ITEMTYPE->EditAttrs["class"] = "form-control";
            $this->ITEMTYPE->EditCustomAttributes = "";
            if (!$this->ITEMTYPE->Raw) {
                $this->ITEMTYPE->CurrentValue = HtmlDecode($this->ITEMTYPE->CurrentValue);
            }
            $this->ITEMTYPE->EditValue = HtmlEncode($this->ITEMTYPE->CurrentValue);
            $this->ITEMTYPE->PlaceHolder = RemoveHtml($this->ITEMTYPE->caption());

            // ROWID
            $this->ROWID->EditAttrs["class"] = "form-control";
            $this->ROWID->EditCustomAttributes = "";
            if (!$this->ROWID->Raw) {
                $this->ROWID->CurrentValue = HtmlDecode($this->ROWID->CurrentValue);
            }
            $this->ROWID->EditValue = HtmlEncode($this->ROWID->CurrentValue);
            $this->ROWID->PlaceHolder = RemoveHtml($this->ROWID->caption());

            // MOVED
            $this->MOVED->EditAttrs["class"] = "form-control";
            $this->MOVED->EditCustomAttributes = "";
            $this->MOVED->EditValue = HtmlEncode($this->MOVED->CurrentValue);
            $this->MOVED->PlaceHolder = RemoveHtml($this->MOVED->caption());

            // NEWTAX
            $this->NEWTAX->EditAttrs["class"] = "form-control";
            $this->NEWTAX->EditCustomAttributes = "";
            $this->NEWTAX->EditValue = HtmlEncode($this->NEWTAX->CurrentValue);
            $this->NEWTAX->PlaceHolder = RemoveHtml($this->NEWTAX->caption());
            if (strval($this->NEWTAX->EditValue) != "" && is_numeric($this->NEWTAX->EditValue)) {
                $this->NEWTAX->EditValue = FormatNumber($this->NEWTAX->EditValue, -2, -2, -2, -2);
            }

            // HSNCODE
            $this->HSNCODE->EditAttrs["class"] = "form-control";
            $this->HSNCODE->EditCustomAttributes = "";
            if (!$this->HSNCODE->Raw) {
                $this->HSNCODE->CurrentValue = HtmlDecode($this->HSNCODE->CurrentValue);
            }
            $this->HSNCODE->EditValue = HtmlEncode($this->HSNCODE->CurrentValue);
            $this->HSNCODE->PlaceHolder = RemoveHtml($this->HSNCODE->caption());

            // OLDTAX
            $this->OLDTAX->EditAttrs["class"] = "form-control";
            $this->OLDTAX->EditCustomAttributes = "";
            $this->OLDTAX->EditValue = HtmlEncode($this->OLDTAX->CurrentValue);
            $this->OLDTAX->PlaceHolder = RemoveHtml($this->OLDTAX->caption());
            if (strval($this->OLDTAX->EditValue) != "" && is_numeric($this->OLDTAX->EditValue)) {
                $this->OLDTAX->EditValue = FormatNumber($this->OLDTAX->EditValue, -2, -2, -2, -2);
            }

            // Scheduling
            $this->Scheduling->EditCustomAttributes = "";
            $this->Scheduling->EditValue = $this->Scheduling->options(false);
            $this->Scheduling->PlaceHolder = RemoveHtml($this->Scheduling->caption());

            // Schedulingh1
            $this->Schedulingh1->EditCustomAttributes = "";
            $this->Schedulingh1->EditValue = $this->Schedulingh1->options(false);
            $this->Schedulingh1->PlaceHolder = RemoveHtml($this->Schedulingh1->caption());

            // Add refer script

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

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

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

            // SALQTY
            $this->SALQTY->LinkCustomAttributes = "";
            $this->SALQTY->HrefValue = "";

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

            // OPPRC
            $this->OPPRC->LinkCustomAttributes = "";
            $this->OPPRC->HrefValue = "";

            // RESTRICT
            $this->RESTRICT->LinkCustomAttributes = "";
            $this->RESTRICT->HrefValue = "";

            // BAWAPRC
            $this->BAWAPRC->LinkCustomAttributes = "";
            $this->BAWAPRC->HrefValue = "";

            // STAXPER
            $this->STAXPER->LinkCustomAttributes = "";
            $this->STAXPER->HrefValue = "";

            // TAXTYPE
            $this->TAXTYPE->LinkCustomAttributes = "";
            $this->TAXTYPE->HrefValue = "";

            // OLDTAXP
            $this->OLDTAXP->LinkCustomAttributes = "";
            $this->OLDTAXP->HrefValue = "";

            // TAXUPD
            $this->TAXUPD->LinkCustomAttributes = "";
            $this->TAXUPD->HrefValue = "";

            // PACKAGE
            $this->PACKAGE->LinkCustomAttributes = "";
            $this->PACKAGE->HrefValue = "";

            // NEWRT
            $this->NEWRT->LinkCustomAttributes = "";
            $this->NEWRT->HrefValue = "";

            // NEWMRP
            $this->NEWMRP->LinkCustomAttributes = "";
            $this->NEWMRP->HrefValue = "";

            // NEWUR
            $this->NEWUR->LinkCustomAttributes = "";
            $this->NEWUR->HrefValue = "";

            // STATUS
            $this->STATUS->LinkCustomAttributes = "";
            $this->STATUS->HrefValue = "";

            // RETNQTY
            $this->RETNQTY->LinkCustomAttributes = "";
            $this->RETNQTY->HrefValue = "";

            // KEMODISC
            $this->KEMODISC->LinkCustomAttributes = "";
            $this->KEMODISC->HrefValue = "";

            // PATSALE
            $this->PATSALE->LinkCustomAttributes = "";
            $this->PATSALE->HrefValue = "";

            // ORGAN
            $this->ORGAN->LinkCustomAttributes = "";
            $this->ORGAN->HrefValue = "";

            // OLDRQ
            $this->OLDRQ->LinkCustomAttributes = "";
            $this->OLDRQ->HrefValue = "";

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

            // STOCK
            $this->STOCK->LinkCustomAttributes = "";
            $this->STOCK->HrefValue = "";

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

            // PACKING
            $this->PACKING->LinkCustomAttributes = "";
            $this->PACKING->HrefValue = "";

            // PhysQty
            $this->PhysQty->LinkCustomAttributes = "";
            $this->PhysQty->HrefValue = "";

            // LedQty
            $this->LedQty->LinkCustomAttributes = "";
            $this->LedQty->HrefValue = "";

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

            // OV
            $this->OV->LinkCustomAttributes = "";
            $this->OV->HrefValue = "";

            // LATESTOV
            $this->LATESTOV->LinkCustomAttributes = "";
            $this->LATESTOV->HrefValue = "";

            // ITEMTYPE
            $this->ITEMTYPE->LinkCustomAttributes = "";
            $this->ITEMTYPE->HrefValue = "";

            // ROWID
            $this->ROWID->LinkCustomAttributes = "";
            $this->ROWID->HrefValue = "";

            // MOVED
            $this->MOVED->LinkCustomAttributes = "";
            $this->MOVED->HrefValue = "";

            // NEWTAX
            $this->NEWTAX->LinkCustomAttributes = "";
            $this->NEWTAX->HrefValue = "";

            // HSNCODE
            $this->HSNCODE->LinkCustomAttributes = "";
            $this->HSNCODE->HrefValue = "";

            // OLDTAX
            $this->OLDTAX->LinkCustomAttributes = "";
            $this->OLDTAX->HrefValue = "";

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
        if ($this->UR->Required) {
            if (!$this->UR->IsDetailKey && EmptyValue($this->UR->FormValue)) {
                $this->UR->addErrorMessage(str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UR->FormValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if ($this->TAXP->Required) {
            if (!$this->TAXP->IsDetailKey && EmptyValue($this->TAXP->FormValue)) {
                $this->TAXP->addErrorMessage(str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TAXP->FormValue)) {
            $this->TAXP->addErrorMessage($this->TAXP->getErrorMessage(false));
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
            }
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
        if ($this->SALQTY->Required) {
            if (!$this->SALQTY->IsDetailKey && EmptyValue($this->SALQTY->FormValue)) {
                $this->SALQTY->addErrorMessage(str_replace("%s", $this->SALQTY->caption(), $this->SALQTY->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SALQTY->FormValue)) {
            $this->SALQTY->addErrorMessage($this->SALQTY->getErrorMessage(false));
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
        if ($this->OPPRC->Required) {
            if (!$this->OPPRC->IsDetailKey && EmptyValue($this->OPPRC->FormValue)) {
                $this->OPPRC->addErrorMessage(str_replace("%s", $this->OPPRC->caption(), $this->OPPRC->RequiredErrorMessage));
            }
        }
        if ($this->RESTRICT->Required) {
            if (!$this->RESTRICT->IsDetailKey && EmptyValue($this->RESTRICT->FormValue)) {
                $this->RESTRICT->addErrorMessage(str_replace("%s", $this->RESTRICT->caption(), $this->RESTRICT->RequiredErrorMessage));
            }
        }
        if ($this->BAWAPRC->Required) {
            if (!$this->BAWAPRC->IsDetailKey && EmptyValue($this->BAWAPRC->FormValue)) {
                $this->BAWAPRC->addErrorMessage(str_replace("%s", $this->BAWAPRC->caption(), $this->BAWAPRC->RequiredErrorMessage));
            }
        }
        if ($this->STAXPER->Required) {
            if (!$this->STAXPER->IsDetailKey && EmptyValue($this->STAXPER->FormValue)) {
                $this->STAXPER->addErrorMessage(str_replace("%s", $this->STAXPER->caption(), $this->STAXPER->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->STAXPER->FormValue)) {
            $this->STAXPER->addErrorMessage($this->STAXPER->getErrorMessage(false));
        }
        if ($this->TAXTYPE->Required) {
            if (!$this->TAXTYPE->IsDetailKey && EmptyValue($this->TAXTYPE->FormValue)) {
                $this->TAXTYPE->addErrorMessage(str_replace("%s", $this->TAXTYPE->caption(), $this->TAXTYPE->RequiredErrorMessage));
            }
        }
        if ($this->OLDTAXP->Required) {
            if (!$this->OLDTAXP->IsDetailKey && EmptyValue($this->OLDTAXP->FormValue)) {
                $this->OLDTAXP->addErrorMessage(str_replace("%s", $this->OLDTAXP->caption(), $this->OLDTAXP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OLDTAXP->FormValue)) {
            $this->OLDTAXP->addErrorMessage($this->OLDTAXP->getErrorMessage(false));
        }
        if ($this->TAXUPD->Required) {
            if (!$this->TAXUPD->IsDetailKey && EmptyValue($this->TAXUPD->FormValue)) {
                $this->TAXUPD->addErrorMessage(str_replace("%s", $this->TAXUPD->caption(), $this->TAXUPD->RequiredErrorMessage));
            }
        }
        if ($this->PACKAGE->Required) {
            if (!$this->PACKAGE->IsDetailKey && EmptyValue($this->PACKAGE->FormValue)) {
                $this->PACKAGE->addErrorMessage(str_replace("%s", $this->PACKAGE->caption(), $this->PACKAGE->RequiredErrorMessage));
            }
        }
        if ($this->NEWRT->Required) {
            if (!$this->NEWRT->IsDetailKey && EmptyValue($this->NEWRT->FormValue)) {
                $this->NEWRT->addErrorMessage(str_replace("%s", $this->NEWRT->caption(), $this->NEWRT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NEWRT->FormValue)) {
            $this->NEWRT->addErrorMessage($this->NEWRT->getErrorMessage(false));
        }
        if ($this->NEWMRP->Required) {
            if (!$this->NEWMRP->IsDetailKey && EmptyValue($this->NEWMRP->FormValue)) {
                $this->NEWMRP->addErrorMessage(str_replace("%s", $this->NEWMRP->caption(), $this->NEWMRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NEWMRP->FormValue)) {
            $this->NEWMRP->addErrorMessage($this->NEWMRP->getErrorMessage(false));
        }
        if ($this->NEWUR->Required) {
            if (!$this->NEWUR->IsDetailKey && EmptyValue($this->NEWUR->FormValue)) {
                $this->NEWUR->addErrorMessage(str_replace("%s", $this->NEWUR->caption(), $this->NEWUR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NEWUR->FormValue)) {
            $this->NEWUR->addErrorMessage($this->NEWUR->getErrorMessage(false));
        }
        if ($this->STATUS->Required) {
            if (!$this->STATUS->IsDetailKey && EmptyValue($this->STATUS->FormValue)) {
                $this->STATUS->addErrorMessage(str_replace("%s", $this->STATUS->caption(), $this->STATUS->RequiredErrorMessage));
            }
        }
        if ($this->RETNQTY->Required) {
            if (!$this->RETNQTY->IsDetailKey && EmptyValue($this->RETNQTY->FormValue)) {
                $this->RETNQTY->addErrorMessage(str_replace("%s", $this->RETNQTY->caption(), $this->RETNQTY->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RETNQTY->FormValue)) {
            $this->RETNQTY->addErrorMessage($this->RETNQTY->getErrorMessage(false));
        }
        if ($this->KEMODISC->Required) {
            if (!$this->KEMODISC->IsDetailKey && EmptyValue($this->KEMODISC->FormValue)) {
                $this->KEMODISC->addErrorMessage(str_replace("%s", $this->KEMODISC->caption(), $this->KEMODISC->RequiredErrorMessage));
            }
        }
        if ($this->PATSALE->Required) {
            if (!$this->PATSALE->IsDetailKey && EmptyValue($this->PATSALE->FormValue)) {
                $this->PATSALE->addErrorMessage(str_replace("%s", $this->PATSALE->caption(), $this->PATSALE->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PATSALE->FormValue)) {
            $this->PATSALE->addErrorMessage($this->PATSALE->getErrorMessage(false));
        }
        if ($this->ORGAN->Required) {
            if (!$this->ORGAN->IsDetailKey && EmptyValue($this->ORGAN->FormValue)) {
                $this->ORGAN->addErrorMessage(str_replace("%s", $this->ORGAN->caption(), $this->ORGAN->RequiredErrorMessage));
            }
        }
        if ($this->OLDRQ->Required) {
            if (!$this->OLDRQ->IsDetailKey && EmptyValue($this->OLDRQ->FormValue)) {
                $this->OLDRQ->addErrorMessage(str_replace("%s", $this->OLDRQ->caption(), $this->OLDRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OLDRQ->FormValue)) {
            $this->OLDRQ->addErrorMessage($this->OLDRQ->getErrorMessage(false));
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
        if ($this->STOCK->Required) {
            if (!$this->STOCK->IsDetailKey && EmptyValue($this->STOCK->FormValue)) {
                $this->STOCK->addErrorMessage(str_replace("%s", $this->STOCK->caption(), $this->STOCK->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->STOCK->FormValue)) {
            $this->STOCK->addErrorMessage($this->STOCK->getErrorMessage(false));
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
        if ($this->PACKING->Required) {
            if (!$this->PACKING->IsDetailKey && EmptyValue($this->PACKING->FormValue)) {
                $this->PACKING->addErrorMessage(str_replace("%s", $this->PACKING->caption(), $this->PACKING->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PACKING->FormValue)) {
            $this->PACKING->addErrorMessage($this->PACKING->getErrorMessage(false));
        }
        if ($this->PhysQty->Required) {
            if (!$this->PhysQty->IsDetailKey && EmptyValue($this->PhysQty->FormValue)) {
                $this->PhysQty->addErrorMessage(str_replace("%s", $this->PhysQty->caption(), $this->PhysQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PhysQty->FormValue)) {
            $this->PhysQty->addErrorMessage($this->PhysQty->getErrorMessage(false));
        }
        if ($this->LedQty->Required) {
            if (!$this->LedQty->IsDetailKey && EmptyValue($this->LedQty->FormValue)) {
                $this->LedQty->addErrorMessage(str_replace("%s", $this->LedQty->caption(), $this->LedQty->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LedQty->FormValue)) {
            $this->LedQty->addErrorMessage($this->LedQty->getErrorMessage(false));
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
        if ($this->OV->Required) {
            if (!$this->OV->IsDetailKey && EmptyValue($this->OV->FormValue)) {
                $this->OV->addErrorMessage(str_replace("%s", $this->OV->caption(), $this->OV->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OV->FormValue)) {
            $this->OV->addErrorMessage($this->OV->getErrorMessage(false));
        }
        if ($this->LATESTOV->Required) {
            if (!$this->LATESTOV->IsDetailKey && EmptyValue($this->LATESTOV->FormValue)) {
                $this->LATESTOV->addErrorMessage(str_replace("%s", $this->LATESTOV->caption(), $this->LATESTOV->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LATESTOV->FormValue)) {
            $this->LATESTOV->addErrorMessage($this->LATESTOV->getErrorMessage(false));
        }
        if ($this->ITEMTYPE->Required) {
            if (!$this->ITEMTYPE->IsDetailKey && EmptyValue($this->ITEMTYPE->FormValue)) {
                $this->ITEMTYPE->addErrorMessage(str_replace("%s", $this->ITEMTYPE->caption(), $this->ITEMTYPE->RequiredErrorMessage));
            }
        }
        if ($this->ROWID->Required) {
            if (!$this->ROWID->IsDetailKey && EmptyValue($this->ROWID->FormValue)) {
                $this->ROWID->addErrorMessage(str_replace("%s", $this->ROWID->caption(), $this->ROWID->RequiredErrorMessage));
            }
        }
        if ($this->MOVED->Required) {
            if (!$this->MOVED->IsDetailKey && EmptyValue($this->MOVED->FormValue)) {
                $this->MOVED->addErrorMessage(str_replace("%s", $this->MOVED->caption(), $this->MOVED->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MOVED->FormValue)) {
            $this->MOVED->addErrorMessage($this->MOVED->getErrorMessage(false));
        }
        if ($this->NEWTAX->Required) {
            if (!$this->NEWTAX->IsDetailKey && EmptyValue($this->NEWTAX->FormValue)) {
                $this->NEWTAX->addErrorMessage(str_replace("%s", $this->NEWTAX->caption(), $this->NEWTAX->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NEWTAX->FormValue)) {
            $this->NEWTAX->addErrorMessage($this->NEWTAX->getErrorMessage(false));
        }
        if ($this->HSNCODE->Required) {
            if (!$this->HSNCODE->IsDetailKey && EmptyValue($this->HSNCODE->FormValue)) {
                $this->HSNCODE->addErrorMessage(str_replace("%s", $this->HSNCODE->caption(), $this->HSNCODE->RequiredErrorMessage));
            }
        }
        if ($this->OLDTAX->Required) {
            if (!$this->OLDTAX->IsDetailKey && EmptyValue($this->OLDTAX->FormValue)) {
                $this->OLDTAX->addErrorMessage(str_replace("%s", $this->OLDTAX->caption(), $this->OLDTAX->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OLDTAX->FormValue)) {
            $this->OLDTAX->addErrorMessage($this->OLDTAX->getErrorMessage(false));
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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyStoremastList"), "", $this->TableVar, true);
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
