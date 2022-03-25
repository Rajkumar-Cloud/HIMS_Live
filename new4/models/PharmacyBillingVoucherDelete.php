<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyBillingVoucherDelete extends PharmacyBillingVoucher
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_billing_voucher';

    // Page object name
    public $PageObjName = "PharmacyBillingVoucherDelete";

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

        // Table object (pharmacy_billing_voucher)
        if (!isset($GLOBALS["pharmacy_billing_voucher"]) || get_class($GLOBALS["pharmacy_billing_voucher"]) == PROJECT_NAMESPACE . "pharmacy_billing_voucher") {
            $GLOBALS["pharmacy_billing_voucher"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_billing_voucher');
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
                $doc = new $class(Container("pharmacy_billing_voucher"));
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
        $this->BillNumber->setVisibility();
        $this->voucher_type->Visible = false;
        $this->Reception->Visible = false;
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Mobile->setVisibility();
        $this->Age->Visible = false;
        $this->mrnno->setVisibility();
        $this->IP_OP->setVisibility();
        $this->Doctor->setVisibility();
        $this->Gender->Visible = false;
        $this->Details->Visible = false;
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->RealizationAmount->setVisibility();
        $this->RealizationStatus->Visible = false;
        $this->RealizationRemarks->Visible = false;
        $this->RealizationBatchNo->Visible = false;
        $this->RealizationDate->Visible = false;
        $this->HospID->Visible = false;
        $this->RIDNO->Visible = false;
        $this->TidNo->Visible = false;
        $this->CId->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PayerType->Visible = false;
        $this->profilePic->Visible = false;
        $this->Dob->Visible = false;
        $this->Currency->Visible = false;
        $this->DiscountRemarks->Visible = false;
        $this->Remarks->Visible = false;
        $this->PatId->Visible = false;
        $this->DrDepartment->Visible = false;
        $this->RefferedBy->Visible = false;
        $this->CardNumber->setVisibility();
        $this->BankName->Visible = false;
        $this->DrID->Visible = false;
        $this->BillStatus->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->PharID->setVisibility();
        $this->_UserName->setVisibility();
        $this->CardType->setVisibility();
        $this->DiscountAmount->setVisibility();
        $this->ApprovalNumber->setVisibility();
        $this->Cash->setVisibility();
        $this->Card->setVisibility();
        $this->BillType->setVisibility();
        $this->PartialSave->setVisibility();
        $this->PatientGST->setVisibility();
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
        $this->setupLookupOptions($this->Reception);
        $this->setupLookupOptions($this->ModeofPayment);
        $this->setupLookupOptions($this->RIDNO);
        $this->setupLookupOptions($this->CId);
        $this->setupLookupOptions($this->PatId);
        $this->setupLookupOptions($this->RefferedBy);
        $this->setupLookupOptions($this->DrID);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("PharmacyBillingVoucherList"); // Prevent SQL injection, return to list
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
                $this->terminate("PharmacyBillingVoucherList"); // Return to list
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
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->Age->setDbValue($row['Age']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->IP_OP->setDbValue($row['IP_OP']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Gender->setDbValue($row['Gender']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->RealizationAmount->setDbValue($row['RealizationAmount']);
        $this->RealizationStatus->setDbValue($row['RealizationStatus']);
        $this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
        $this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
        $this->RealizationDate->setDbValue($row['RealizationDate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->CId->setDbValue($row['CId']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PayerType->setDbValue($row['PayerType']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Dob->setDbValue($row['Dob']);
        $this->Currency->setDbValue($row['Currency']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->PatId->setDbValue($row['PatId']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->PharID->setDbValue($row['PharID']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->CardType->setDbValue($row['CardType']);
        $this->DiscountAmount->setDbValue($row['DiscountAmount']);
        $this->ApprovalNumber->setDbValue($row['ApprovalNumber']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
        $this->BillType->setDbValue($row['BillType']);
        $this->PartialSave->setDbValue($row['PartialSave']);
        $this->PatientGST->setDbValue($row['PatientGST']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['BillNumber'] = null;
        $row['voucher_type'] = null;
        $row['Reception'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['Mobile'] = null;
        $row['Age'] = null;
        $row['mrnno'] = null;
        $row['IP_OP'] = null;
        $row['Doctor'] = null;
        $row['Gender'] = null;
        $row['Details'] = null;
        $row['ModeofPayment'] = null;
        $row['Amount'] = null;
        $row['AnyDues'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['RealizationAmount'] = null;
        $row['RealizationStatus'] = null;
        $row['RealizationRemarks'] = null;
        $row['RealizationBatchNo'] = null;
        $row['RealizationDate'] = null;
        $row['HospID'] = null;
        $row['RIDNO'] = null;
        $row['TidNo'] = null;
        $row['CId'] = null;
        $row['PartnerName'] = null;
        $row['PayerType'] = null;
        $row['profilePic'] = null;
        $row['Dob'] = null;
        $row['Currency'] = null;
        $row['DiscountRemarks'] = null;
        $row['Remarks'] = null;
        $row['PatId'] = null;
        $row['DrDepartment'] = null;
        $row['RefferedBy'] = null;
        $row['CardNumber'] = null;
        $row['BankName'] = null;
        $row['DrID'] = null;
        $row['BillStatus'] = null;
        $row['ReportHeader'] = null;
        $row['PharID'] = null;
        $row['UserName'] = null;
        $row['CardType'] = null;
        $row['DiscountAmount'] = null;
        $row['ApprovalNumber'] = null;
        $row['Cash'] = null;
        $row['Card'] = null;
        $row['BillType'] = null;
        $row['PartialSave'] = null;
        $row['PatientGST'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue))) {
            $this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue))) {
            $this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue))) {
            $this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // BillNumber

        // voucher_type

        // Reception
        $this->Reception->CellCssStyle = "white-space: nowrap;";

        // PatientId

        // PatientName

        // Mobile

        // Age
        $this->Age->CellCssStyle = "white-space: nowrap;";

        // mrnno

        // IP_OP

        // Doctor

        // Gender

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // RealizationAmount

        // RealizationStatus

        // RealizationRemarks

        // RealizationBatchNo

        // RealizationDate

        // HospID

        // RIDNO

        // TidNo

        // CId

        // PartnerName

        // PayerType

        // profilePic

        // Dob

        // Currency

        // DiscountRemarks

        // Remarks

        // PatId

        // DrDepartment

        // RefferedBy

        // CardNumber

        // BankName

        // DrID

        // BillStatus

        // ReportHeader

        // PharID

        // UserName

        // CardType

        // DiscountAmount

        // ApprovalNumber

        // Cash

        // Card

        // BillType

        // PartialSave

        // PatientGST
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // Reception
            $curVal = trim(strval($this->Reception->CurrentValue));
            if ($curVal != "") {
                $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
                if ($this->Reception->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                        $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                    } else {
                        $this->Reception->ViewValue = $this->Reception->CurrentValue;
                    }
                }
            } else {
                $this->Reception->ViewValue = null;
            }
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // IP_OP
            $this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
            $this->IP_OP->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // ModeofPayment
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
                if ($this->ModeofPayment->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ModeofPayment->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ModeofPayment->Lookup->renderViewRow($rswrk[0]);
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
                    } else {
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
                    }
                }
            } else {
                $this->ModeofPayment->ViewValue = null;
            }
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // AnyDues
            $this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
            $this->AnyDues->ViewCustomAttributes = "";

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

            // RealizationAmount
            $this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
            $this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
            $this->RealizationAmount->ViewCustomAttributes = "";

            // RealizationStatus
            $this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
            $this->RealizationStatus->ViewCustomAttributes = "";

            // RealizationRemarks
            $this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
            $this->RealizationRemarks->ViewCustomAttributes = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
            $this->RealizationBatchNo->ViewCustomAttributes = "";

            // RealizationDate
            $this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
            $this->RealizationDate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // RIDNO
            $curVal = trim(strval($this->RIDNO->CurrentValue));
            if ($curVal != "") {
                $this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
                if ($this->RIDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
                    } else {
                        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                    }
                }
            } else {
                $this->RIDNO->ViewValue = null;
            }
            $this->RIDNO->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // CId
            $curVal = trim(strval($this->CId->CurrentValue));
            if ($curVal != "") {
                $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
                if ($this->CId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->CId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                        $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                    } else {
                        $this->CId->ViewValue = $this->CId->CurrentValue;
                    }
                }
            } else {
                $this->CId->ViewValue = null;
            }
            $this->CId->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PayerType
            $this->PayerType->ViewValue = $this->PayerType->CurrentValue;
            $this->PayerType->ViewCustomAttributes = "";

            // Dob
            $this->Dob->ViewValue = $this->Dob->CurrentValue;
            $this->Dob->ViewCustomAttributes = "";

            // Currency
            $this->Currency->ViewValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // DiscountRemarks
            $this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
            $this->DiscountRemarks->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // PatId
            $curVal = trim(strval($this->PatId->CurrentValue));
            if ($curVal != "") {
                $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
                if ($this->PatId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                        $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                    } else {
                        $this->PatId->ViewValue = $this->PatId->CurrentValue;
                    }
                }
            } else {
                $this->PatId->ViewValue = null;
            }
            $this->PatId->ViewCustomAttributes = "";

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // RefferedBy
            $curVal = trim(strval($this->RefferedBy->CurrentValue));
            if ($curVal != "") {
                $this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
                if ($this->RefferedBy->ViewValue === null) { // Lookup from database
                    $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->RefferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RefferedBy->Lookup->renderViewRow($rswrk[0]);
                        $this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
                    } else {
                        $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
                    }
                }
            } else {
                $this->RefferedBy->ViewValue = null;
            }
            $this->RefferedBy->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // DrID
            $curVal = trim(strval($this->DrID->CurrentValue));
            if ($curVal != "") {
                $this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
                if ($this->DrID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                        $this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
                    } else {
                        $this->DrID->ViewValue = $this->DrID->CurrentValue;
                    }
                }
            } else {
                $this->DrID->ViewValue = null;
            }
            $this->DrID->ViewCustomAttributes = "";

            // BillStatus
            $this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
            $this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
            $this->BillStatus->ViewCustomAttributes = "";

            // ReportHeader
            if (strval($this->ReportHeader->CurrentValue) != "") {
                $this->ReportHeader->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ReportHeader->ViewValue = null;
            }
            $this->ReportHeader->ViewCustomAttributes = "";

            // PharID
            $this->PharID->ViewValue = $this->PharID->CurrentValue;
            $this->PharID->ViewValue = FormatNumber($this->PharID->ViewValue, 0, -2, -2, -2);
            $this->PharID->ViewCustomAttributes = "";

            // UserName
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";

            // CardType
            if (strval($this->CardType->CurrentValue) != "") {
                $this->CardType->ViewValue = $this->CardType->optionCaption($this->CardType->CurrentValue);
            } else {
                $this->CardType->ViewValue = null;
            }
            $this->CardType->ViewCustomAttributes = "";

            // DiscountAmount
            $this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
            $this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, $this->DiscountAmount->DefaultDecimalPrecision);
            $this->DiscountAmount->ViewCustomAttributes = "";

            // ApprovalNumber
            $this->ApprovalNumber->ViewValue = $this->ApprovalNumber->CurrentValue;
            $this->ApprovalNumber->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // BillType
            if (strval($this->BillType->CurrentValue) != "") {
                $this->BillType->ViewValue = $this->BillType->optionCaption($this->BillType->CurrentValue);
            } else {
                $this->BillType->ViewValue = null;
            }
            $this->BillType->ViewCustomAttributes = "";

            // PartialSave
            if (strval($this->PartialSave->CurrentValue) != "") {
                $this->PartialSave->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->PartialSave->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->PartialSave->ViewValue->add($this->PartialSave->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->PartialSave->ViewValue = null;
            }
            $this->PartialSave->ViewCustomAttributes = "";

            // PatientGST
            $this->PatientGST->ViewValue = $this->PatientGST->CurrentValue;
            $this->PatientGST->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";
            $this->IP_OP->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";
            $this->AnyDues->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";
            $this->RealizationAmount->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";
            $this->BillStatus->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
            $this->PharID->TooltipValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";
            $this->_UserName->TooltipValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";
            $this->CardType->TooltipValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";
            $this->DiscountAmount->TooltipValue = "";

            // ApprovalNumber
            $this->ApprovalNumber->LinkCustomAttributes = "";
            $this->ApprovalNumber->HrefValue = "";
            $this->ApprovalNumber->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";
            $this->BillType->TooltipValue = "";

            // PartialSave
            $this->PartialSave->LinkCustomAttributes = "";
            $this->PartialSave->HrefValue = "";
            $this->PartialSave->TooltipValue = "";

            // PatientGST
            $this->PatientGST->LinkCustomAttributes = "";
            $this->PatientGST->HrefValue = "";
            $this->PatientGST->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyBillingVoucherList"), "", $this->TableVar, true);
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
                case "x_Reception":
                    break;
                case "x_ModeofPayment":
                    break;
                case "x_RIDNO":
                    break;
                case "x_CId":
                    break;
                case "x_PatId":
                    break;
                case "x_RefferedBy":
                    break;
                case "x_DrID":
                    break;
                case "x_ReportHeader":
                    break;
                case "x_CardType":
                    break;
                case "x_BillType":
                    break;
                case "x_PartialSave":
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
