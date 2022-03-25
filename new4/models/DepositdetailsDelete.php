<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class DepositdetailsDelete extends Depositdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'depositdetails';

    // Page object name
    public $PageObjName = "DepositdetailsDelete";

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

        // Table object (depositdetails)
        if (!isset($GLOBALS["depositdetails"]) || get_class($GLOBALS["depositdetails"]) == PROJECT_NAMESPACE . "depositdetails") {
            $GLOBALS["depositdetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'depositdetails');
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
                $doc = new $class(Container("depositdetails"));
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
        $this->DepositDate->setVisibility();
        $this->DepositToBankSelect->Visible = false;
        $this->DepositToBank->Visible = false;
        $this->TransferToSelect->Visible = false;
        $this->TransferTo->setVisibility();
        $this->OpeningBalance->setVisibility();
        $this->Other->setVisibility();
        $this->TotalCash->setVisibility();
        $this->Cheque->setVisibility();
        $this->Card->setVisibility();
        $this->NEFTRTGS->setVisibility();
        $this->TotalTransferDepositAmount->setVisibility();
        $this->CreatedBy->Visible = false;
        $this->CreatedDateTime->Visible = false;
        $this->ModifiedBy->Visible = false;
        $this->ModifiedDateTime->Visible = false;
        $this->CreatedUserName->setVisibility();
        $this->ModifiedUserName->Visible = false;
        $this->A2000Count->Visible = false;
        $this->A2000Amount->Visible = false;
        $this->A1000Count->Visible = false;
        $this->A1000Amount->Visible = false;
        $this->A500Count->Visible = false;
        $this->A500Amount->Visible = false;
        $this->A200Count->Visible = false;
        $this->A200Amount->Visible = false;
        $this->A100Count->Visible = false;
        $this->A100Amount->Visible = false;
        $this->A50Count->Visible = false;
        $this->A50Amount->Visible = false;
        $this->A20Count->Visible = false;
        $this->A20Amount->Visible = false;
        $this->A10Count->Visible = false;
        $this->A10Amount->Visible = false;
        $this->BalanceAmount->Visible = false;
        $this->CashCollected->setVisibility();
        $this->RTGS->setVisibility();
        $this->PAYTM->setVisibility();
        $this->HospID->Visible = false;
        $this->ManualCash->setVisibility();
        $this->ManualCard->setVisibility();
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
        $this->setupLookupOptions($this->DepositToBank);
        $this->setupLookupOptions($this->TransferTo);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("DepositdetailsList"); // Prevent SQL injection, return to list
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
                $this->terminate("DepositdetailsList"); // Return to list
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
        $this->DepositDate->setDbValue($row['DepositDate']);
        $this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
        $this->DepositToBank->setDbValue($row['DepositToBank']);
        $this->TransferToSelect->setDbValue($row['TransferToSelect']);
        $this->TransferTo->setDbValue($row['TransferTo']);
        $this->OpeningBalance->setDbValue($row['OpeningBalance']);
        $this->Other->setDbValue($row['Other']);
        $this->TotalCash->setDbValue($row['TotalCash']);
        $this->Cheque->setDbValue($row['Cheque']);
        $this->Card->setDbValue($row['Card']);
        $this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
        $this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->CreatedUserName->setDbValue($row['CreatedUserName']);
        $this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
        $this->A2000Count->setDbValue($row['A2000Count']);
        $this->A2000Amount->setDbValue($row['A2000Amount']);
        $this->A1000Count->setDbValue($row['A1000Count']);
        $this->A1000Amount->setDbValue($row['A1000Amount']);
        $this->A500Count->setDbValue($row['A500Count']);
        $this->A500Amount->setDbValue($row['A500Amount']);
        $this->A200Count->setDbValue($row['A200Count']);
        $this->A200Amount->setDbValue($row['A200Amount']);
        $this->A100Count->setDbValue($row['A100Count']);
        $this->A100Amount->setDbValue($row['A100Amount']);
        $this->A50Count->setDbValue($row['A50Count']);
        $this->A50Amount->setDbValue($row['A50Amount']);
        $this->A20Count->setDbValue($row['A20Count']);
        $this->A20Amount->setDbValue($row['A20Amount']);
        $this->A10Count->setDbValue($row['A10Count']);
        $this->A10Amount->setDbValue($row['A10Amount']);
        $this->BalanceAmount->setDbValue($row['BalanceAmount']);
        $this->CashCollected->setDbValue($row['CashCollected']);
        $this->RTGS->setDbValue($row['RTGS']);
        $this->PAYTM->setDbValue($row['PAYTM']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ManualCash->setDbValue($row['ManualCash']);
        $this->ManualCard->setDbValue($row['ManualCard']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['DepositDate'] = null;
        $row['DepositToBankSelect'] = null;
        $row['DepositToBank'] = null;
        $row['TransferToSelect'] = null;
        $row['TransferTo'] = null;
        $row['OpeningBalance'] = null;
        $row['Other'] = null;
        $row['TotalCash'] = null;
        $row['Cheque'] = null;
        $row['Card'] = null;
        $row['NEFTRTGS'] = null;
        $row['TotalTransferDepositAmount'] = null;
        $row['CreatedBy'] = null;
        $row['CreatedDateTime'] = null;
        $row['ModifiedBy'] = null;
        $row['ModifiedDateTime'] = null;
        $row['CreatedUserName'] = null;
        $row['ModifiedUserName'] = null;
        $row['A2000Count'] = null;
        $row['A2000Amount'] = null;
        $row['A1000Count'] = null;
        $row['A1000Amount'] = null;
        $row['A500Count'] = null;
        $row['A500Amount'] = null;
        $row['A200Count'] = null;
        $row['A200Amount'] = null;
        $row['A100Count'] = null;
        $row['A100Amount'] = null;
        $row['A50Count'] = null;
        $row['A50Amount'] = null;
        $row['A20Count'] = null;
        $row['A20Amount'] = null;
        $row['A10Count'] = null;
        $row['A10Amount'] = null;
        $row['BalanceAmount'] = null;
        $row['CashCollected'] = null;
        $row['RTGS'] = null;
        $row['PAYTM'] = null;
        $row['HospID'] = null;
        $row['ManualCash'] = null;
        $row['ManualCard'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue))) {
            $this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue))) {
            $this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue))) {
            $this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue))) {
            $this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue))) {
            $this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue))) {
            $this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue))) {
            $this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue))) {
            $this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue))) {
            $this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ManualCash->FormValue == $this->ManualCash->CurrentValue && is_numeric(ConvertToFloatString($this->ManualCash->CurrentValue))) {
            $this->ManualCash->CurrentValue = ConvertToFloatString($this->ManualCash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ManualCard->FormValue == $this->ManualCard->CurrentValue && is_numeric(ConvertToFloatString($this->ManualCard->CurrentValue))) {
            $this->ManualCard->CurrentValue = ConvertToFloatString($this->ManualCard->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // DepositDate

        // DepositToBankSelect

        // DepositToBank

        // TransferToSelect

        // TransferTo

        // OpeningBalance

        // Other

        // TotalCash

        // Cheque

        // Card

        // NEFTRTGS

        // TotalTransferDepositAmount

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // CreatedUserName

        // ModifiedUserName

        // A2000Count

        // A2000Amount

        // A1000Count

        // A1000Amount

        // A500Count

        // A500Amount

        // A200Count

        // A200Amount

        // A100Count

        // A100Amount

        // A50Count

        // A50Amount

        // A20Count

        // A20Amount

        // A10Count

        // A10Amount

        // BalanceAmount

        // CashCollected

        // RTGS

        // PAYTM

        // HospID

        // ManualCash

        // ManualCard
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // DepositDate
            $this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
            $this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 7);
            $this->DepositDate->ViewCustomAttributes = "";

            // DepositToBankSelect
            if (strval($this->DepositToBankSelect->CurrentValue) != "") {
                $this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->optionCaption($this->DepositToBankSelect->CurrentValue);
            } else {
                $this->DepositToBankSelect->ViewValue = null;
            }
            $this->DepositToBankSelect->ViewCustomAttributes = "";

            // DepositToBank
            $curVal = trim(strval($this->DepositToBank->CurrentValue));
            if ($curVal != "") {
                $this->DepositToBank->ViewValue = $this->DepositToBank->lookupCacheOption($curVal);
                if ($this->DepositToBank->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Branch_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DepositToBank->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DepositToBank->Lookup->renderViewRow($rswrk[0]);
                        $this->DepositToBank->ViewValue = $this->DepositToBank->displayValue($arwrk);
                    } else {
                        $this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
                    }
                }
            } else {
                $this->DepositToBank->ViewValue = null;
            }
            $this->DepositToBank->ViewCustomAttributes = "";

            // TransferToSelect
            $this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
            $this->TransferToSelect->ViewCustomAttributes = "";

            // TransferTo
            $curVal = trim(strval($this->TransferTo->CurrentValue));
            if ($curVal != "") {
                $this->TransferTo->ViewValue = $this->TransferTo->lookupCacheOption($curVal);
                if ($this->TransferTo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->TransferTo->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TransferTo->Lookup->renderViewRow($rswrk[0]);
                        $this->TransferTo->ViewValue = $this->TransferTo->displayValue($arwrk);
                    } else {
                        $this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
                    }
                }
            } else {
                $this->TransferTo->ViewValue = null;
            }
            $this->TransferTo->ViewCustomAttributes = "";

            // OpeningBalance
            $this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
            $this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
            $this->OpeningBalance->ViewCustomAttributes = "";

            // Other
            $this->Other->ViewValue = $this->Other->CurrentValue;
            $this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
            $this->Other->ViewCustomAttributes = "";

            // TotalCash
            $this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
            $this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
            $this->TotalCash->ViewCustomAttributes = "";

            // Cheque
            $this->Cheque->ViewValue = $this->Cheque->CurrentValue;
            $this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
            $this->Cheque->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // NEFTRTGS
            $this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
            $this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
            $this->NEFTRTGS->ViewCustomAttributes = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
            $this->TotalTransferDepositAmount->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // CreatedUserName
            $this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
            $this->CreatedUserName->ViewCustomAttributes = "";

            // ModifiedUserName
            $this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
            $this->ModifiedUserName->ViewCustomAttributes = "";

            // A2000Count
            $this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
            $this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
            $this->A2000Count->ViewCustomAttributes = "";

            // A2000Amount
            $this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
            $this->A2000Amount->ViewValue = FormatCurrency($this->A2000Amount->ViewValue, 2, -2, -2, -2);
            $this->A2000Amount->ViewCustomAttributes = "";

            // A1000Count
            $this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
            $this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
            $this->A1000Count->ViewCustomAttributes = "";

            // A1000Amount
            $this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
            $this->A1000Amount->ViewValue = FormatCurrency($this->A1000Amount->ViewValue, 2, -2, -2, -2);
            $this->A1000Amount->ViewCustomAttributes = "";

            // A500Count
            $this->A500Count->ViewValue = $this->A500Count->CurrentValue;
            $this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
            $this->A500Count->ViewCustomAttributes = "";

            // A500Amount
            $this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
            $this->A500Amount->ViewValue = FormatCurrency($this->A500Amount->ViewValue, 2, -2, -2, -2);
            $this->A500Amount->ViewCustomAttributes = "";

            // A200Count
            $this->A200Count->ViewValue = $this->A200Count->CurrentValue;
            $this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
            $this->A200Count->ViewCustomAttributes = "";

            // A200Amount
            $this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
            $this->A200Amount->ViewValue = FormatCurrency($this->A200Amount->ViewValue, 2, -2, -2, -2);
            $this->A200Amount->ViewCustomAttributes = "";

            // A100Count
            $this->A100Count->ViewValue = $this->A100Count->CurrentValue;
            $this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
            $this->A100Count->ViewCustomAttributes = "";

            // A100Amount
            $this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
            $this->A100Amount->ViewValue = FormatCurrency($this->A100Amount->ViewValue, 2, -2, -2, -2);
            $this->A100Amount->ViewCustomAttributes = "";

            // A50Count
            $this->A50Count->ViewValue = $this->A50Count->CurrentValue;
            $this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
            $this->A50Count->ViewCustomAttributes = "";

            // A50Amount
            $this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
            $this->A50Amount->ViewValue = FormatCurrency($this->A50Amount->ViewValue, 2, -2, -2, -2);
            $this->A50Amount->ViewCustomAttributes = "";

            // A20Count
            $this->A20Count->ViewValue = $this->A20Count->CurrentValue;
            $this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
            $this->A20Count->ViewCustomAttributes = "";

            // A20Amount
            $this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
            $this->A20Amount->ViewValue = FormatCurrency($this->A20Amount->ViewValue, 2, -2, -2, -2);
            $this->A20Amount->ViewCustomAttributes = "";

            // A10Count
            $this->A10Count->ViewValue = $this->A10Count->CurrentValue;
            $this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
            $this->A10Count->ViewCustomAttributes = "";

            // A10Amount
            $this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
            $this->A10Amount->ViewValue = FormatCurrency($this->A10Amount->ViewValue, 2, -2, -2, -2);
            $this->A10Amount->ViewCustomAttributes = "";

            // BalanceAmount
            $this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
            $this->BalanceAmount->ViewValue = FormatCurrency($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
            $this->BalanceAmount->ViewCustomAttributes = "";

            // CashCollected
            $this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
            $this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
            $this->CashCollected->ViewCustomAttributes = "";

            // RTGS
            $this->RTGS->ViewValue = $this->RTGS->CurrentValue;
            $this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
            $this->RTGS->ViewCustomAttributes = "";

            // PAYTM
            $this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
            $this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
            $this->PAYTM->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // ManualCash
            $this->ManualCash->ViewValue = $this->ManualCash->CurrentValue;
            $this->ManualCash->ViewValue = FormatNumber($this->ManualCash->ViewValue, 2, -2, -2, -2);
            $this->ManualCash->ViewCustomAttributes = "";

            // ManualCard
            $this->ManualCard->ViewValue = $this->ManualCard->CurrentValue;
            $this->ManualCard->ViewValue = FormatNumber($this->ManualCard->ViewValue, 2, -2, -2, -2);
            $this->ManualCard->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // DepositDate
            $this->DepositDate->LinkCustomAttributes = "";
            $this->DepositDate->HrefValue = "";
            $this->DepositDate->TooltipValue = "";

            // TransferTo
            $this->TransferTo->LinkCustomAttributes = "";
            $this->TransferTo->HrefValue = "";
            $this->TransferTo->TooltipValue = "";

            // OpeningBalance
            $this->OpeningBalance->LinkCustomAttributes = "";
            $this->OpeningBalance->HrefValue = "";
            $this->OpeningBalance->TooltipValue = "";

            // Other
            $this->Other->LinkCustomAttributes = "";
            $this->Other->HrefValue = "";
            $this->Other->TooltipValue = "";

            // TotalCash
            $this->TotalCash->LinkCustomAttributes = "";
            $this->TotalCash->HrefValue = "";
            $this->TotalCash->TooltipValue = "";

            // Cheque
            $this->Cheque->LinkCustomAttributes = "";
            $this->Cheque->HrefValue = "";
            $this->Cheque->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // NEFTRTGS
            $this->NEFTRTGS->LinkCustomAttributes = "";
            $this->NEFTRTGS->HrefValue = "";
            $this->NEFTRTGS->TooltipValue = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->LinkCustomAttributes = "";
            $this->TotalTransferDepositAmount->HrefValue = "";
            $this->TotalTransferDepositAmount->TooltipValue = "";

            // CreatedUserName
            $this->CreatedUserName->LinkCustomAttributes = "";
            $this->CreatedUserName->HrefValue = "";
            $this->CreatedUserName->TooltipValue = "";

            // CashCollected
            $this->CashCollected->LinkCustomAttributes = "";
            $this->CashCollected->HrefValue = "";
            $this->CashCollected->TooltipValue = "";

            // RTGS
            $this->RTGS->LinkCustomAttributes = "";
            $this->RTGS->HrefValue = "";
            $this->RTGS->TooltipValue = "";

            // PAYTM
            $this->PAYTM->LinkCustomAttributes = "";
            $this->PAYTM->HrefValue = "";
            $this->PAYTM->TooltipValue = "";

            // ManualCash
            $this->ManualCash->LinkCustomAttributes = "";
            $this->ManualCash->HrefValue = "";
            $this->ManualCash->TooltipValue = "";

            // ManualCard
            $this->ManualCard->LinkCustomAttributes = "";
            $this->ManualCard->HrefValue = "";
            $this->ManualCard->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("DepositdetailsList"), "", $this->TableVar, true);
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
                case "x_DepositToBankSelect":
                    break;
                case "x_DepositToBank":
                    break;
                case "x_TransferTo":
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
