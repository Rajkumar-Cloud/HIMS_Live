<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacySuppliersDelete extends PharmacySuppliers
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_suppliers';

    // Page object name
    public $PageObjName = "PharmacySuppliersDelete";

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

        // Table object (pharmacy_suppliers)
        if (!isset($GLOBALS["pharmacy_suppliers"]) || get_class($GLOBALS["pharmacy_suppliers"]) == PROJECT_NAMESPACE . "pharmacy_suppliers") {
            $GLOBALS["pharmacy_suppliers"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_suppliers');
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
                $doc = new $class(Container("pharmacy_suppliers"));
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
        $this->id->setVisibility();
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
            $this->terminate("PharmacySuppliersList"); // Prevent SQL injection, return to list
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
                $this->terminate("PharmacySuppliersList"); // Return to list
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
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Suppliercode'] = null;
        $row['Suppliername'] = null;
        $row['Abbreviation'] = null;
        $row['Creationdate'] = null;
        $row['Address1'] = null;
        $row['Address2'] = null;
        $row['Address3'] = null;
        $row['Citycode'] = null;
        $row['State'] = null;
        $row['Pincode'] = null;
        $row['Tngstnumber'] = null;
        $row['Phone'] = null;
        $row['Fax'] = null;
        $row['Email'] = null;
        $row['Paymentmode'] = null;
        $row['Contactperson1'] = null;
        $row['CP1Address1'] = null;
        $row['CP1Address2'] = null;
        $row['CP1Address3'] = null;
        $row['CP1Citycode'] = null;
        $row['CP1State'] = null;
        $row['CP1Pincode'] = null;
        $row['CP1Designation'] = null;
        $row['CP1Phone'] = null;
        $row['CP1MobileNo'] = null;
        $row['CP1Fax'] = null;
        $row['CP1Email'] = null;
        $row['Contactperson2'] = null;
        $row['CP2Address1'] = null;
        $row['CP2Address2'] = null;
        $row['CP2Address3'] = null;
        $row['CP2Citycode'] = null;
        $row['CP2State'] = null;
        $row['CP2Pincode'] = null;
        $row['CP2Designation'] = null;
        $row['CP2Phone'] = null;
        $row['CP2MobileNo'] = null;
        $row['CP2Fax'] = null;
        $row['CP2Email'] = null;
        $row['Type'] = null;
        $row['Creditterms'] = null;
        $row['Remarks'] = null;
        $row['Tinnumber'] = null;
        $row['Universalsuppliercode'] = null;
        $row['Mobilenumber'] = null;
        $row['PANNumber'] = null;
        $row['SalesRepMobileNo'] = null;
        $row['GSTNumber'] = null;
        $row['TANNumber'] = null;
        $row['id'] = null;
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacySuppliersList"), "", $this->TableVar, true);
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
