<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabTestMasterDelete extends LabTestMaster
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_test_master';

    // Page object name
    public $PageObjName = "LabTestMasterDelete";

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

        // Table object (lab_test_master)
        if (!isset($GLOBALS["lab_test_master"]) || get_class($GLOBALS["lab_test_master"]) == PROJECT_NAMESPACE . "lab_test_master") {
            $GLOBALS["lab_test_master"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_master');
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
                $doc = new $class(Container("lab_test_master"));
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
        $this->MainDeptCd->setVisibility();
        $this->DeptCd->setVisibility();
        $this->TestCd->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->TestName->setVisibility();
        $this->XrayPart->setVisibility();
        $this->Method->setVisibility();
        $this->Order->setVisibility();
        $this->Form->setVisibility();
        $this->Amt->setVisibility();
        $this->SplAmt->setVisibility();
        $this->ResType->setVisibility();
        $this->UnitCD->setVisibility();
        $this->RefValue->Visible = false;
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->Visible = false;
        $this->Inactive->setVisibility();
        $this->ReagentAmt->setVisibility();
        $this->LabAmt->setVisibility();
        $this->RefAmt->setVisibility();
        $this->CreFrom->setVisibility();
        $this->CreTo->setVisibility();
        $this->Note->Visible = false;
        $this->Sun->setVisibility();
        $this->Mon->setVisibility();
        $this->Tue->setVisibility();
        $this->Wed->setVisibility();
        $this->Thi->setVisibility();
        $this->Fri->setVisibility();
        $this->Sat->setVisibility();
        $this->Days->setVisibility();
        $this->Cutoff->setVisibility();
        $this->FontBold->setVisibility();
        $this->TestHeading->setVisibility();
        $this->Outsource->setVisibility();
        $this->NoResult->setVisibility();
        $this->GraphLow->setVisibility();
        $this->GraphHigh->setVisibility();
        $this->CollSample->setVisibility();
        $this->ProcessTime->setVisibility();
        $this->TamilName->setVisibility();
        $this->ShortName->setVisibility();
        $this->Individual->setVisibility();
        $this->PrevAmt->setVisibility();
        $this->PrevSplAmt->setVisibility();
        $this->Remarks->Visible = false;
        $this->EditDate->setVisibility();
        $this->BillName->setVisibility();
        $this->ActualAmt->setVisibility();
        $this->HISCD->setVisibility();
        $this->PriceList->setVisibility();
        $this->IPAmt->setVisibility();
        $this->InsAmt->setVisibility();
        $this->ManualCD->setVisibility();
        $this->Free->setVisibility();
        $this->AutoAuth->setVisibility();
        $this->ProductCD->setVisibility();
        $this->Inventory->setVisibility();
        $this->IntimateTest->setVisibility();
        $this->Manual->setVisibility();
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
            $this->terminate("LabTestMasterList"); // Prevent SQL injection, return to list
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
                $this->terminate("LabTestMasterList"); // Return to list
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
        $this->MainDeptCd->setDbValue($row['MainDeptCd']);
        $this->DeptCd->setDbValue($row['DeptCd']);
        $this->TestCd->setDbValue($row['TestCd']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->TestName->setDbValue($row['TestName']);
        $this->XrayPart->setDbValue($row['XrayPart']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->Amt->setDbValue($row['Amt']);
        $this->SplAmt->setDbValue($row['SplAmt']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->ReagentAmt->setDbValue($row['ReagentAmt']);
        $this->LabAmt->setDbValue($row['LabAmt']);
        $this->RefAmt->setDbValue($row['RefAmt']);
        $this->CreFrom->setDbValue($row['CreFrom']);
        $this->CreTo->setDbValue($row['CreTo']);
        $this->Note->setDbValue($row['Note']);
        $this->Sun->setDbValue($row['Sun']);
        $this->Mon->setDbValue($row['Mon']);
        $this->Tue->setDbValue($row['Tue']);
        $this->Wed->setDbValue($row['Wed']);
        $this->Thi->setDbValue($row['Thi']);
        $this->Fri->setDbValue($row['Fri']);
        $this->Sat->setDbValue($row['Sat']);
        $this->Days->setDbValue($row['Days']);
        $this->Cutoff->setDbValue($row['Cutoff']);
        $this->FontBold->setDbValue($row['FontBold']);
        $this->TestHeading->setDbValue($row['TestHeading']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->NoResult->setDbValue($row['NoResult']);
        $this->GraphLow->setDbValue($row['GraphLow']);
        $this->GraphHigh->setDbValue($row['GraphHigh']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->ProcessTime->setDbValue($row['ProcessTime']);
        $this->TamilName->setDbValue($row['TamilName']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->Individual->setDbValue($row['Individual']);
        $this->PrevAmt->setDbValue($row['PrevAmt']);
        $this->PrevSplAmt->setDbValue($row['PrevSplAmt']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->BillName->setDbValue($row['BillName']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->HISCD->setDbValue($row['HISCD']);
        $this->PriceList->setDbValue($row['PriceList']);
        $this->IPAmt->setDbValue($row['IPAmt']);
        $this->InsAmt->setDbValue($row['InsAmt']);
        $this->ManualCD->setDbValue($row['ManualCD']);
        $this->Free->setDbValue($row['Free']);
        $this->AutoAuth->setDbValue($row['AutoAuth']);
        $this->ProductCD->setDbValue($row['ProductCD']);
        $this->Inventory->setDbValue($row['Inventory']);
        $this->IntimateTest->setDbValue($row['IntimateTest']);
        $this->Manual->setDbValue($row['Manual']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['MainDeptCd'] = null;
        $row['DeptCd'] = null;
        $row['TestCd'] = null;
        $row['TestSubCd'] = null;
        $row['TestName'] = null;
        $row['XrayPart'] = null;
        $row['Method'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['Amt'] = null;
        $row['SplAmt'] = null;
        $row['ResType'] = null;
        $row['UnitCD'] = null;
        $row['RefValue'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['ReagentAmt'] = null;
        $row['LabAmt'] = null;
        $row['RefAmt'] = null;
        $row['CreFrom'] = null;
        $row['CreTo'] = null;
        $row['Note'] = null;
        $row['Sun'] = null;
        $row['Mon'] = null;
        $row['Tue'] = null;
        $row['Wed'] = null;
        $row['Thi'] = null;
        $row['Fri'] = null;
        $row['Sat'] = null;
        $row['Days'] = null;
        $row['Cutoff'] = null;
        $row['FontBold'] = null;
        $row['TestHeading'] = null;
        $row['Outsource'] = null;
        $row['NoResult'] = null;
        $row['GraphLow'] = null;
        $row['GraphHigh'] = null;
        $row['CollSample'] = null;
        $row['ProcessTime'] = null;
        $row['TamilName'] = null;
        $row['ShortName'] = null;
        $row['Individual'] = null;
        $row['PrevAmt'] = null;
        $row['PrevSplAmt'] = null;
        $row['Remarks'] = null;
        $row['EditDate'] = null;
        $row['BillName'] = null;
        $row['ActualAmt'] = null;
        $row['HISCD'] = null;
        $row['PriceList'] = null;
        $row['IPAmt'] = null;
        $row['InsAmt'] = null;
        $row['ManualCD'] = null;
        $row['Free'] = null;
        $row['AutoAuth'] = null;
        $row['ProductCD'] = null;
        $row['Inventory'] = null;
        $row['IntimateTest'] = null;
        $row['Manual'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Amt->FormValue == $this->Amt->CurrentValue && is_numeric(ConvertToFloatString($this->Amt->CurrentValue))) {
            $this->Amt->CurrentValue = ConvertToFloatString($this->Amt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SplAmt->FormValue == $this->SplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->SplAmt->CurrentValue))) {
            $this->SplAmt->CurrentValue = ConvertToFloatString($this->SplAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue))) {
            $this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue))) {
            $this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue))) {
            $this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CreFrom->FormValue == $this->CreFrom->CurrentValue && is_numeric(ConvertToFloatString($this->CreFrom->CurrentValue))) {
            $this->CreFrom->CurrentValue = ConvertToFloatString($this->CreFrom->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CreTo->FormValue == $this->CreTo->CurrentValue && is_numeric(ConvertToFloatString($this->CreTo->CurrentValue))) {
            $this->CreTo->CurrentValue = ConvertToFloatString($this->CreTo->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Days->FormValue == $this->Days->CurrentValue && is_numeric(ConvertToFloatString($this->Days->CurrentValue))) {
            $this->Days->CurrentValue = ConvertToFloatString($this->Days->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GraphLow->FormValue == $this->GraphLow->CurrentValue && is_numeric(ConvertToFloatString($this->GraphLow->CurrentValue))) {
            $this->GraphLow->CurrentValue = ConvertToFloatString($this->GraphLow->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GraphHigh->FormValue == $this->GraphHigh->CurrentValue && is_numeric(ConvertToFloatString($this->GraphHigh->CurrentValue))) {
            $this->GraphHigh->CurrentValue = ConvertToFloatString($this->GraphHigh->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue))) {
            $this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PrevSplAmt->FormValue == $this->PrevSplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevSplAmt->CurrentValue))) {
            $this->PrevSplAmt->CurrentValue = ConvertToFloatString($this->PrevSplAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue))) {
            $this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue))) {
            $this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue))) {
            $this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // MainDeptCd

        // DeptCd

        // TestCd

        // TestSubCd

        // TestName

        // XrayPart

        // Method

        // Order

        // Form

        // Amt

        // SplAmt

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // ReagentAmt

        // LabAmt

        // RefAmt

        // CreFrom

        // CreTo

        // Note

        // Sun

        // Mon

        // Tue

        // Wed

        // Thi

        // Fri

        // Sat

        // Days

        // Cutoff

        // FontBold

        // TestHeading

        // Outsource

        // NoResult

        // GraphLow

        // GraphHigh

        // CollSample

        // ProcessTime

        // TamilName

        // ShortName

        // Individual

        // PrevAmt

        // PrevSplAmt

        // Remarks

        // EditDate

        // BillName

        // ActualAmt

        // HISCD

        // PriceList

        // IPAmt

        // InsAmt

        // ManualCD

        // Free

        // AutoAuth

        // ProductCD

        // Inventory

        // IntimateTest

        // Manual
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // MainDeptCd
            $this->MainDeptCd->ViewValue = $this->MainDeptCd->CurrentValue;
            $this->MainDeptCd->ViewCustomAttributes = "";

            // DeptCd
            $this->DeptCd->ViewValue = $this->DeptCd->CurrentValue;
            $this->DeptCd->ViewCustomAttributes = "";

            // TestCd
            $this->TestCd->ViewValue = $this->TestCd->CurrentValue;
            $this->TestCd->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // TestName
            $this->TestName->ViewValue = $this->TestName->CurrentValue;
            $this->TestName->ViewCustomAttributes = "";

            // XrayPart
            $this->XrayPart->ViewValue = $this->XrayPart->CurrentValue;
            $this->XrayPart->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // Amt
            $this->Amt->ViewValue = $this->Amt->CurrentValue;
            $this->Amt->ViewValue = FormatNumber($this->Amt->ViewValue, 2, -2, -2, -2);
            $this->Amt->ViewCustomAttributes = "";

            // SplAmt
            $this->SplAmt->ViewValue = $this->SplAmt->CurrentValue;
            $this->SplAmt->ViewValue = FormatNumber($this->SplAmt->ViewValue, 2, -2, -2, -2);
            $this->SplAmt->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // UnitCD
            $this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
            $this->UnitCD->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Inactive
            $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
            $this->Inactive->ViewCustomAttributes = "";

            // ReagentAmt
            $this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
            $this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
            $this->ReagentAmt->ViewCustomAttributes = "";

            // LabAmt
            $this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
            $this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
            $this->LabAmt->ViewCustomAttributes = "";

            // RefAmt
            $this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
            $this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
            $this->RefAmt->ViewCustomAttributes = "";

            // CreFrom
            $this->CreFrom->ViewValue = $this->CreFrom->CurrentValue;
            $this->CreFrom->ViewValue = FormatNumber($this->CreFrom->ViewValue, 2, -2, -2, -2);
            $this->CreFrom->ViewCustomAttributes = "";

            // CreTo
            $this->CreTo->ViewValue = $this->CreTo->CurrentValue;
            $this->CreTo->ViewValue = FormatNumber($this->CreTo->ViewValue, 2, -2, -2, -2);
            $this->CreTo->ViewCustomAttributes = "";

            // Sun
            $this->Sun->ViewValue = $this->Sun->CurrentValue;
            $this->Sun->ViewCustomAttributes = "";

            // Mon
            $this->Mon->ViewValue = $this->Mon->CurrentValue;
            $this->Mon->ViewCustomAttributes = "";

            // Tue
            $this->Tue->ViewValue = $this->Tue->CurrentValue;
            $this->Tue->ViewCustomAttributes = "";

            // Wed
            $this->Wed->ViewValue = $this->Wed->CurrentValue;
            $this->Wed->ViewCustomAttributes = "";

            // Thi
            $this->Thi->ViewValue = $this->Thi->CurrentValue;
            $this->Thi->ViewCustomAttributes = "";

            // Fri
            $this->Fri->ViewValue = $this->Fri->CurrentValue;
            $this->Fri->ViewCustomAttributes = "";

            // Sat
            $this->Sat->ViewValue = $this->Sat->CurrentValue;
            $this->Sat->ViewCustomAttributes = "";

            // Days
            $this->Days->ViewValue = $this->Days->CurrentValue;
            $this->Days->ViewValue = FormatNumber($this->Days->ViewValue, 2, -2, -2, -2);
            $this->Days->ViewCustomAttributes = "";

            // Cutoff
            $this->Cutoff->ViewValue = $this->Cutoff->CurrentValue;
            $this->Cutoff->ViewCustomAttributes = "";

            // FontBold
            $this->FontBold->ViewValue = $this->FontBold->CurrentValue;
            $this->FontBold->ViewCustomAttributes = "";

            // TestHeading
            $this->TestHeading->ViewValue = $this->TestHeading->CurrentValue;
            $this->TestHeading->ViewCustomAttributes = "";

            // Outsource
            $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
            $this->Outsource->ViewCustomAttributes = "";

            // NoResult
            $this->NoResult->ViewValue = $this->NoResult->CurrentValue;
            $this->NoResult->ViewCustomAttributes = "";

            // GraphLow
            $this->GraphLow->ViewValue = $this->GraphLow->CurrentValue;
            $this->GraphLow->ViewValue = FormatNumber($this->GraphLow->ViewValue, 2, -2, -2, -2);
            $this->GraphLow->ViewCustomAttributes = "";

            // GraphHigh
            $this->GraphHigh->ViewValue = $this->GraphHigh->CurrentValue;
            $this->GraphHigh->ViewValue = FormatNumber($this->GraphHigh->ViewValue, 2, -2, -2, -2);
            $this->GraphHigh->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // ProcessTime
            $this->ProcessTime->ViewValue = $this->ProcessTime->CurrentValue;
            $this->ProcessTime->ViewCustomAttributes = "";

            // TamilName
            $this->TamilName->ViewValue = $this->TamilName->CurrentValue;
            $this->TamilName->ViewCustomAttributes = "";

            // ShortName
            $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
            $this->ShortName->ViewCustomAttributes = "";

            // Individual
            $this->Individual->ViewValue = $this->Individual->CurrentValue;
            $this->Individual->ViewCustomAttributes = "";

            // PrevAmt
            $this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
            $this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
            $this->PrevAmt->ViewCustomAttributes = "";

            // PrevSplAmt
            $this->PrevSplAmt->ViewValue = $this->PrevSplAmt->CurrentValue;
            $this->PrevSplAmt->ViewValue = FormatNumber($this->PrevSplAmt->ViewValue, 2, -2, -2, -2);
            $this->PrevSplAmt->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // BillName
            $this->BillName->ViewValue = $this->BillName->CurrentValue;
            $this->BillName->ViewCustomAttributes = "";

            // ActualAmt
            $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
            $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
            $this->ActualAmt->ViewCustomAttributes = "";

            // HISCD
            $this->HISCD->ViewValue = $this->HISCD->CurrentValue;
            $this->HISCD->ViewCustomAttributes = "";

            // PriceList
            $this->PriceList->ViewValue = $this->PriceList->CurrentValue;
            $this->PriceList->ViewCustomAttributes = "";

            // IPAmt
            $this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
            $this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
            $this->IPAmt->ViewCustomAttributes = "";

            // InsAmt
            $this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
            $this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
            $this->InsAmt->ViewCustomAttributes = "";

            // ManualCD
            $this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
            $this->ManualCD->ViewCustomAttributes = "";

            // Free
            $this->Free->ViewValue = $this->Free->CurrentValue;
            $this->Free->ViewCustomAttributes = "";

            // AutoAuth
            $this->AutoAuth->ViewValue = $this->AutoAuth->CurrentValue;
            $this->AutoAuth->ViewCustomAttributes = "";

            // ProductCD
            $this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
            $this->ProductCD->ViewCustomAttributes = "";

            // Inventory
            $this->Inventory->ViewValue = $this->Inventory->CurrentValue;
            $this->Inventory->ViewCustomAttributes = "";

            // IntimateTest
            $this->IntimateTest->ViewValue = $this->IntimateTest->CurrentValue;
            $this->IntimateTest->ViewCustomAttributes = "";

            // Manual
            $this->Manual->ViewValue = $this->Manual->CurrentValue;
            $this->Manual->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // MainDeptCd
            $this->MainDeptCd->LinkCustomAttributes = "";
            $this->MainDeptCd->HrefValue = "";
            $this->MainDeptCd->TooltipValue = "";

            // DeptCd
            $this->DeptCd->LinkCustomAttributes = "";
            $this->DeptCd->HrefValue = "";
            $this->DeptCd->TooltipValue = "";

            // TestCd
            $this->TestCd->LinkCustomAttributes = "";
            $this->TestCd->HrefValue = "";
            $this->TestCd->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // TestName
            $this->TestName->LinkCustomAttributes = "";
            $this->TestName->HrefValue = "";
            $this->TestName->TooltipValue = "";

            // XrayPart
            $this->XrayPart->LinkCustomAttributes = "";
            $this->XrayPart->HrefValue = "";
            $this->XrayPart->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Amt
            $this->Amt->LinkCustomAttributes = "";
            $this->Amt->HrefValue = "";
            $this->Amt->TooltipValue = "";

            // SplAmt
            $this->SplAmt->LinkCustomAttributes = "";
            $this->SplAmt->HrefValue = "";
            $this->SplAmt->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // UnitCD
            $this->UnitCD->LinkCustomAttributes = "";
            $this->UnitCD->HrefValue = "";
            $this->UnitCD->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // ReagentAmt
            $this->ReagentAmt->LinkCustomAttributes = "";
            $this->ReagentAmt->HrefValue = "";
            $this->ReagentAmt->TooltipValue = "";

            // LabAmt
            $this->LabAmt->LinkCustomAttributes = "";
            $this->LabAmt->HrefValue = "";
            $this->LabAmt->TooltipValue = "";

            // RefAmt
            $this->RefAmt->LinkCustomAttributes = "";
            $this->RefAmt->HrefValue = "";
            $this->RefAmt->TooltipValue = "";

            // CreFrom
            $this->CreFrom->LinkCustomAttributes = "";
            $this->CreFrom->HrefValue = "";
            $this->CreFrom->TooltipValue = "";

            // CreTo
            $this->CreTo->LinkCustomAttributes = "";
            $this->CreTo->HrefValue = "";
            $this->CreTo->TooltipValue = "";

            // Sun
            $this->Sun->LinkCustomAttributes = "";
            $this->Sun->HrefValue = "";
            $this->Sun->TooltipValue = "";

            // Mon
            $this->Mon->LinkCustomAttributes = "";
            $this->Mon->HrefValue = "";
            $this->Mon->TooltipValue = "";

            // Tue
            $this->Tue->LinkCustomAttributes = "";
            $this->Tue->HrefValue = "";
            $this->Tue->TooltipValue = "";

            // Wed
            $this->Wed->LinkCustomAttributes = "";
            $this->Wed->HrefValue = "";
            $this->Wed->TooltipValue = "";

            // Thi
            $this->Thi->LinkCustomAttributes = "";
            $this->Thi->HrefValue = "";
            $this->Thi->TooltipValue = "";

            // Fri
            $this->Fri->LinkCustomAttributes = "";
            $this->Fri->HrefValue = "";
            $this->Fri->TooltipValue = "";

            // Sat
            $this->Sat->LinkCustomAttributes = "";
            $this->Sat->HrefValue = "";
            $this->Sat->TooltipValue = "";

            // Days
            $this->Days->LinkCustomAttributes = "";
            $this->Days->HrefValue = "";
            $this->Days->TooltipValue = "";

            // Cutoff
            $this->Cutoff->LinkCustomAttributes = "";
            $this->Cutoff->HrefValue = "";
            $this->Cutoff->TooltipValue = "";

            // FontBold
            $this->FontBold->LinkCustomAttributes = "";
            $this->FontBold->HrefValue = "";
            $this->FontBold->TooltipValue = "";

            // TestHeading
            $this->TestHeading->LinkCustomAttributes = "";
            $this->TestHeading->HrefValue = "";
            $this->TestHeading->TooltipValue = "";

            // Outsource
            $this->Outsource->LinkCustomAttributes = "";
            $this->Outsource->HrefValue = "";
            $this->Outsource->TooltipValue = "";

            // NoResult
            $this->NoResult->LinkCustomAttributes = "";
            $this->NoResult->HrefValue = "";
            $this->NoResult->TooltipValue = "";

            // GraphLow
            $this->GraphLow->LinkCustomAttributes = "";
            $this->GraphLow->HrefValue = "";
            $this->GraphLow->TooltipValue = "";

            // GraphHigh
            $this->GraphHigh->LinkCustomAttributes = "";
            $this->GraphHigh->HrefValue = "";
            $this->GraphHigh->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // ProcessTime
            $this->ProcessTime->LinkCustomAttributes = "";
            $this->ProcessTime->HrefValue = "";
            $this->ProcessTime->TooltipValue = "";

            // TamilName
            $this->TamilName->LinkCustomAttributes = "";
            $this->TamilName->HrefValue = "";
            $this->TamilName->TooltipValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";
            $this->ShortName->TooltipValue = "";

            // Individual
            $this->Individual->LinkCustomAttributes = "";
            $this->Individual->HrefValue = "";
            $this->Individual->TooltipValue = "";

            // PrevAmt
            $this->PrevAmt->LinkCustomAttributes = "";
            $this->PrevAmt->HrefValue = "";
            $this->PrevAmt->TooltipValue = "";

            // PrevSplAmt
            $this->PrevSplAmt->LinkCustomAttributes = "";
            $this->PrevSplAmt->HrefValue = "";
            $this->PrevSplAmt->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // BillName
            $this->BillName->LinkCustomAttributes = "";
            $this->BillName->HrefValue = "";
            $this->BillName->TooltipValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";
            $this->ActualAmt->TooltipValue = "";

            // HISCD
            $this->HISCD->LinkCustomAttributes = "";
            $this->HISCD->HrefValue = "";
            $this->HISCD->TooltipValue = "";

            // PriceList
            $this->PriceList->LinkCustomAttributes = "";
            $this->PriceList->HrefValue = "";
            $this->PriceList->TooltipValue = "";

            // IPAmt
            $this->IPAmt->LinkCustomAttributes = "";
            $this->IPAmt->HrefValue = "";
            $this->IPAmt->TooltipValue = "";

            // InsAmt
            $this->InsAmt->LinkCustomAttributes = "";
            $this->InsAmt->HrefValue = "";
            $this->InsAmt->TooltipValue = "";

            // ManualCD
            $this->ManualCD->LinkCustomAttributes = "";
            $this->ManualCD->HrefValue = "";
            $this->ManualCD->TooltipValue = "";

            // Free
            $this->Free->LinkCustomAttributes = "";
            $this->Free->HrefValue = "";
            $this->Free->TooltipValue = "";

            // AutoAuth
            $this->AutoAuth->LinkCustomAttributes = "";
            $this->AutoAuth->HrefValue = "";
            $this->AutoAuth->TooltipValue = "";

            // ProductCD
            $this->ProductCD->LinkCustomAttributes = "";
            $this->ProductCD->HrefValue = "";
            $this->ProductCD->TooltipValue = "";

            // Inventory
            $this->Inventory->LinkCustomAttributes = "";
            $this->Inventory->HrefValue = "";
            $this->Inventory->TooltipValue = "";

            // IntimateTest
            $this->IntimateTest->LinkCustomAttributes = "";
            $this->IntimateTest->HrefValue = "";
            $this->IntimateTest->TooltipValue = "";

            // Manual
            $this->Manual->LinkCustomAttributes = "";
            $this->Manual->HrefValue = "";
            $this->Manual->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("LabTestMasterList"), "", $this->TableVar, true);
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
