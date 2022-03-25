<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeDelete extends Employee
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee';

    // Page object name
    public $PageObjName = "EmployeeDelete";

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

        // Table object (employee)
        if (!isset($GLOBALS["employee"]) || get_class($GLOBALS["employee"]) == PROJECT_NAMESPACE . "employee") {
            $GLOBALS["employee"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');
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
                $doc = new $class(Container("employee"));
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
        $this->employee_id->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->nationality->setVisibility();
        $this->birthday->setVisibility();
        $this->marital_status->setVisibility();
        $this->ssn_num->setVisibility();
        $this->nic_num->setVisibility();
        $this->other_id->setVisibility();
        $this->driving_license->setVisibility();
        $this->driving_license_exp_date->setVisibility();
        $this->employment_status->setVisibility();
        $this->job_title->setVisibility();
        $this->pay_grade->setVisibility();
        $this->work_station_id->setVisibility();
        $this->address1->setVisibility();
        $this->address2->setVisibility();
        $this->city->setVisibility();
        $this->country->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->home_phone->setVisibility();
        $this->mobile_phone->setVisibility();
        $this->work_phone->setVisibility();
        $this->work_email->setVisibility();
        $this->private_email->setVisibility();
        $this->joined_date->setVisibility();
        $this->confirmation_date->setVisibility();
        $this->supervisor->setVisibility();
        $this->indirect_supervisors->setVisibility();
        $this->department->setVisibility();
        $this->custom1->setVisibility();
        $this->custom2->setVisibility();
        $this->custom3->setVisibility();
        $this->custom4->setVisibility();
        $this->custom5->setVisibility();
        $this->custom6->setVisibility();
        $this->custom7->setVisibility();
        $this->custom8->setVisibility();
        $this->custom9->setVisibility();
        $this->custom10->setVisibility();
        $this->termination_date->setVisibility();
        $this->notes->Visible = false;
        $this->ethnicity->setVisibility();
        $this->immigration_status->setVisibility();
        $this->approver1->setVisibility();
        $this->approver2->setVisibility();
        $this->approver3->setVisibility();
        $this->status->setVisibility();
        $this->HospID->setVisibility();
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
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->nationality);
        $this->setupLookupOptions($this->approver1);
        $this->setupLookupOptions($this->approver2);
        $this->setupLookupOptions($this->approver3);
        $this->setupLookupOptions($this->status);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("EmployeeList"); // Prevent SQL injection, return to list
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
                $this->terminate("EmployeeList"); // Return to list
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
        $this->employee_id->setDbValue($row['employee_id']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->ssn_num->setDbValue($row['ssn_num']);
        $this->nic_num->setDbValue($row['nic_num']);
        $this->other_id->setDbValue($row['other_id']);
        $this->driving_license->setDbValue($row['driving_license']);
        $this->driving_license_exp_date->setDbValue($row['driving_license_exp_date']);
        $this->employment_status->setDbValue($row['employment_status']);
        $this->job_title->setDbValue($row['job_title']);
        $this->pay_grade->setDbValue($row['pay_grade']);
        $this->work_station_id->setDbValue($row['work_station_id']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->work_phone->setDbValue($row['work_phone']);
        $this->work_email->setDbValue($row['work_email']);
        $this->private_email->setDbValue($row['private_email']);
        $this->joined_date->setDbValue($row['joined_date']);
        $this->confirmation_date->setDbValue($row['confirmation_date']);
        $this->supervisor->setDbValue($row['supervisor']);
        $this->indirect_supervisors->setDbValue($row['indirect_supervisors']);
        $this->department->setDbValue($row['department']);
        $this->custom1->setDbValue($row['custom1']);
        $this->custom2->setDbValue($row['custom2']);
        $this->custom3->setDbValue($row['custom3']);
        $this->custom4->setDbValue($row['custom4']);
        $this->custom5->setDbValue($row['custom5']);
        $this->custom6->setDbValue($row['custom6']);
        $this->custom7->setDbValue($row['custom7']);
        $this->custom8->setDbValue($row['custom8']);
        $this->custom9->setDbValue($row['custom9']);
        $this->custom10->setDbValue($row['custom10']);
        $this->termination_date->setDbValue($row['termination_date']);
        $this->notes->setDbValue($row['notes']);
        $this->ethnicity->setDbValue($row['ethnicity']);
        $this->immigration_status->setDbValue($row['immigration_status']);
        $this->approver1->setDbValue($row['approver1']);
        $this->approver2->setDbValue($row['approver2']);
        $this->approver3->setDbValue($row['approver3']);
        $this->status->setDbValue($row['status']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['employee_id'] = null;
        $row['first_name'] = null;
        $row['middle_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['nationality'] = null;
        $row['birthday'] = null;
        $row['marital_status'] = null;
        $row['ssn_num'] = null;
        $row['nic_num'] = null;
        $row['other_id'] = null;
        $row['driving_license'] = null;
        $row['driving_license_exp_date'] = null;
        $row['employment_status'] = null;
        $row['job_title'] = null;
        $row['pay_grade'] = null;
        $row['work_station_id'] = null;
        $row['address1'] = null;
        $row['address2'] = null;
        $row['city'] = null;
        $row['country'] = null;
        $row['province'] = null;
        $row['postal_code'] = null;
        $row['home_phone'] = null;
        $row['mobile_phone'] = null;
        $row['work_phone'] = null;
        $row['work_email'] = null;
        $row['private_email'] = null;
        $row['joined_date'] = null;
        $row['confirmation_date'] = null;
        $row['supervisor'] = null;
        $row['indirect_supervisors'] = null;
        $row['department'] = null;
        $row['custom1'] = null;
        $row['custom2'] = null;
        $row['custom3'] = null;
        $row['custom4'] = null;
        $row['custom5'] = null;
        $row['custom6'] = null;
        $row['custom7'] = null;
        $row['custom8'] = null;
        $row['custom9'] = null;
        $row['custom10'] = null;
        $row['termination_date'] = null;
        $row['notes'] = null;
        $row['ethnicity'] = null;
        $row['immigration_status'] = null;
        $row['approver1'] = null;
        $row['approver2'] = null;
        $row['approver3'] = null;
        $row['status'] = null;
        $row['HospID'] = null;
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

        // id

        // employee_id

        // first_name

        // middle_name

        // last_name

        // gender

        // nationality

        // birthday

        // marital_status

        // ssn_num

        // nic_num

        // other_id

        // driving_license

        // driving_license_exp_date

        // employment_status

        // job_title

        // pay_grade

        // work_station_id

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // home_phone

        // mobile_phone

        // work_phone

        // work_email

        // private_email

        // joined_date

        // confirmation_date

        // supervisor

        // indirect_supervisors

        // department

        // custom1

        // custom2

        // custom3

        // custom4

        // custom5

        // custom6

        // custom7

        // custom8

        // custom9

        // custom10

        // termination_date

        // notes

        // ethnicity

        // immigration_status

        // approver1

        // approver2

        // approver3

        // status

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
            $this->employee_id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->ViewValue = $this->gender->CurrentValue;
                    }
                }
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // nationality
            $curVal = trim(strval($this->nationality->CurrentValue));
            if ($curVal != "") {
                $this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
                if ($this->nationality->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->nationality->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->nationality->Lookup->renderViewRow($rswrk[0]);
                        $this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
                    } else {
                        $this->nationality->ViewValue = $this->nationality->CurrentValue;
                    }
                }
            } else {
                $this->nationality->ViewValue = null;
            }
            $this->nationality->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // marital_status
            if (strval($this->marital_status->CurrentValue) != "") {
                $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
            } else {
                $this->marital_status->ViewValue = null;
            }
            $this->marital_status->ViewCustomAttributes = "";

            // ssn_num
            $this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
            $this->ssn_num->ViewCustomAttributes = "";

            // nic_num
            $this->nic_num->ViewValue = $this->nic_num->CurrentValue;
            $this->nic_num->ViewCustomAttributes = "";

            // other_id
            $this->other_id->ViewValue = $this->other_id->CurrentValue;
            $this->other_id->ViewCustomAttributes = "";

            // driving_license
            $this->driving_license->ViewValue = $this->driving_license->CurrentValue;
            $this->driving_license->ViewCustomAttributes = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->ViewValue = $this->driving_license_exp_date->CurrentValue;
            $this->driving_license_exp_date->ViewValue = FormatDateTime($this->driving_license_exp_date->ViewValue, 0);
            $this->driving_license_exp_date->ViewCustomAttributes = "";

            // employment_status
            $this->employment_status->ViewValue = $this->employment_status->CurrentValue;
            $this->employment_status->ViewValue = FormatNumber($this->employment_status->ViewValue, 0, -2, -2, -2);
            $this->employment_status->ViewCustomAttributes = "";

            // job_title
            $this->job_title->ViewValue = $this->job_title->CurrentValue;
            $this->job_title->ViewValue = FormatNumber($this->job_title->ViewValue, 0, -2, -2, -2);
            $this->job_title->ViewCustomAttributes = "";

            // pay_grade
            $this->pay_grade->ViewValue = $this->pay_grade->CurrentValue;
            $this->pay_grade->ViewValue = FormatNumber($this->pay_grade->ViewValue, 0, -2, -2, -2);
            $this->pay_grade->ViewCustomAttributes = "";

            // work_station_id
            $this->work_station_id->ViewValue = $this->work_station_id->CurrentValue;
            $this->work_station_id->ViewCustomAttributes = "";

            // address1
            $this->address1->ViewValue = $this->address1->CurrentValue;
            $this->address1->ViewCustomAttributes = "";

            // address2
            $this->address2->ViewValue = $this->address2->CurrentValue;
            $this->address2->ViewCustomAttributes = "";

            // city
            $this->city->ViewValue = $this->city->CurrentValue;
            $this->city->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // home_phone
            $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
            $this->home_phone->ViewCustomAttributes = "";

            // mobile_phone
            $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
            $this->mobile_phone->ViewCustomAttributes = "";

            // work_phone
            $this->work_phone->ViewValue = $this->work_phone->CurrentValue;
            $this->work_phone->ViewCustomAttributes = "";

            // work_email
            $this->work_email->ViewValue = $this->work_email->CurrentValue;
            $this->work_email->ViewCustomAttributes = "";

            // private_email
            $this->private_email->ViewValue = $this->private_email->CurrentValue;
            $this->private_email->ViewCustomAttributes = "";

            // joined_date
            $this->joined_date->ViewValue = $this->joined_date->CurrentValue;
            $this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
            $this->joined_date->ViewCustomAttributes = "";

            // confirmation_date
            $this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
            $this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
            $this->confirmation_date->ViewCustomAttributes = "";

            // supervisor
            $this->supervisor->ViewValue = $this->supervisor->CurrentValue;
            $this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
            $this->supervisor->ViewCustomAttributes = "";

            // indirect_supervisors
            $this->indirect_supervisors->ViewValue = $this->indirect_supervisors->CurrentValue;
            $this->indirect_supervisors->ViewCustomAttributes = "";

            // department
            $this->department->ViewValue = $this->department->CurrentValue;
            $this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
            $this->department->ViewCustomAttributes = "";

            // custom1
            $this->custom1->ViewValue = $this->custom1->CurrentValue;
            $this->custom1->ViewCustomAttributes = "";

            // custom2
            $this->custom2->ViewValue = $this->custom2->CurrentValue;
            $this->custom2->ViewCustomAttributes = "";

            // custom3
            $this->custom3->ViewValue = $this->custom3->CurrentValue;
            $this->custom3->ViewCustomAttributes = "";

            // custom4
            $this->custom4->ViewValue = $this->custom4->CurrentValue;
            $this->custom4->ViewCustomAttributes = "";

            // custom5
            $this->custom5->ViewValue = $this->custom5->CurrentValue;
            $this->custom5->ViewCustomAttributes = "";

            // custom6
            $this->custom6->ViewValue = $this->custom6->CurrentValue;
            $this->custom6->ViewCustomAttributes = "";

            // custom7
            $this->custom7->ViewValue = $this->custom7->CurrentValue;
            $this->custom7->ViewCustomAttributes = "";

            // custom8
            $this->custom8->ViewValue = $this->custom8->CurrentValue;
            $this->custom8->ViewCustomAttributes = "";

            // custom9
            $this->custom9->ViewValue = $this->custom9->CurrentValue;
            $this->custom9->ViewCustomAttributes = "";

            // custom10
            $this->custom10->ViewValue = $this->custom10->CurrentValue;
            $this->custom10->ViewCustomAttributes = "";

            // termination_date
            $this->termination_date->ViewValue = $this->termination_date->CurrentValue;
            $this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
            $this->termination_date->ViewCustomAttributes = "";

            // ethnicity
            $this->ethnicity->ViewValue = $this->ethnicity->CurrentValue;
            $this->ethnicity->ViewValue = FormatNumber($this->ethnicity->ViewValue, 0, -2, -2, -2);
            $this->ethnicity->ViewCustomAttributes = "";

            // immigration_status
            $this->immigration_status->ViewValue = $this->immigration_status->CurrentValue;
            $this->immigration_status->ViewValue = FormatNumber($this->immigration_status->ViewValue, 0, -2, -2, -2);
            $this->immigration_status->ViewCustomAttributes = "";

            // approver1
            $curVal = trim(strval($this->approver1->CurrentValue));
            if ($curVal != "") {
                $this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
                if ($this->approver1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver1->Lookup->renderViewRow($rswrk[0]);
                        $this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
                    } else {
                        $this->approver1->ViewValue = $this->approver1->CurrentValue;
                    }
                }
            } else {
                $this->approver1->ViewValue = null;
            }
            $this->approver1->ViewCustomAttributes = "";

            // approver2
            $curVal = trim(strval($this->approver2->CurrentValue));
            if ($curVal != "") {
                $this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
                if ($this->approver2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver2->Lookup->renderViewRow($rswrk[0]);
                        $this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
                    } else {
                        $this->approver2->ViewValue = $this->approver2->CurrentValue;
                    }
                }
            } else {
                $this->approver2->ViewValue = null;
            }
            $this->approver2->ViewCustomAttributes = "";

            // approver3
            $curVal = trim(strval($this->approver3->CurrentValue));
            if ($curVal != "") {
                $this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
                if ($this->approver3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver3->Lookup->renderViewRow($rswrk[0]);
                        $this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
                    } else {
                        $this->approver3->ViewValue = $this->approver3->CurrentValue;
                    }
                }
            } else {
                $this->approver3->ViewValue = null;
            }
            $this->approver3->ViewCustomAttributes = "";

            // status
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
                if ($this->status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                        $this->status->ViewValue = $this->status->displayValue($arwrk);
                    } else {
                        $this->status->ViewValue = $this->status->CurrentValue;
                    }
                }
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";
            $this->employee_id->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";
            $this->nationality->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";
            $this->marital_status->TooltipValue = "";

            // ssn_num
            $this->ssn_num->LinkCustomAttributes = "";
            $this->ssn_num->HrefValue = "";
            $this->ssn_num->TooltipValue = "";

            // nic_num
            $this->nic_num->LinkCustomAttributes = "";
            $this->nic_num->HrefValue = "";
            $this->nic_num->TooltipValue = "";

            // other_id
            $this->other_id->LinkCustomAttributes = "";
            $this->other_id->HrefValue = "";
            $this->other_id->TooltipValue = "";

            // driving_license
            $this->driving_license->LinkCustomAttributes = "";
            $this->driving_license->HrefValue = "";
            $this->driving_license->TooltipValue = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->LinkCustomAttributes = "";
            $this->driving_license_exp_date->HrefValue = "";
            $this->driving_license_exp_date->TooltipValue = "";

            // employment_status
            $this->employment_status->LinkCustomAttributes = "";
            $this->employment_status->HrefValue = "";
            $this->employment_status->TooltipValue = "";

            // job_title
            $this->job_title->LinkCustomAttributes = "";
            $this->job_title->HrefValue = "";
            $this->job_title->TooltipValue = "";

            // pay_grade
            $this->pay_grade->LinkCustomAttributes = "";
            $this->pay_grade->HrefValue = "";
            $this->pay_grade->TooltipValue = "";

            // work_station_id
            $this->work_station_id->LinkCustomAttributes = "";
            $this->work_station_id->HrefValue = "";
            $this->work_station_id->TooltipValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";
            $this->address1->TooltipValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";
            $this->address2->TooltipValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";
            $this->city->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";
            $this->home_phone->TooltipValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";
            $this->mobile_phone->TooltipValue = "";

            // work_phone
            $this->work_phone->LinkCustomAttributes = "";
            $this->work_phone->HrefValue = "";
            $this->work_phone->TooltipValue = "";

            // work_email
            $this->work_email->LinkCustomAttributes = "";
            $this->work_email->HrefValue = "";
            $this->work_email->TooltipValue = "";

            // private_email
            $this->private_email->LinkCustomAttributes = "";
            $this->private_email->HrefValue = "";
            $this->private_email->TooltipValue = "";

            // joined_date
            $this->joined_date->LinkCustomAttributes = "";
            $this->joined_date->HrefValue = "";
            $this->joined_date->TooltipValue = "";

            // confirmation_date
            $this->confirmation_date->LinkCustomAttributes = "";
            $this->confirmation_date->HrefValue = "";
            $this->confirmation_date->TooltipValue = "";

            // supervisor
            $this->supervisor->LinkCustomAttributes = "";
            $this->supervisor->HrefValue = "";
            $this->supervisor->TooltipValue = "";

            // indirect_supervisors
            $this->indirect_supervisors->LinkCustomAttributes = "";
            $this->indirect_supervisors->HrefValue = "";
            $this->indirect_supervisors->TooltipValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";
            $this->department->TooltipValue = "";

            // custom1
            $this->custom1->LinkCustomAttributes = "";
            $this->custom1->HrefValue = "";
            $this->custom1->TooltipValue = "";

            // custom2
            $this->custom2->LinkCustomAttributes = "";
            $this->custom2->HrefValue = "";
            $this->custom2->TooltipValue = "";

            // custom3
            $this->custom3->LinkCustomAttributes = "";
            $this->custom3->HrefValue = "";
            $this->custom3->TooltipValue = "";

            // custom4
            $this->custom4->LinkCustomAttributes = "";
            $this->custom4->HrefValue = "";
            $this->custom4->TooltipValue = "";

            // custom5
            $this->custom5->LinkCustomAttributes = "";
            $this->custom5->HrefValue = "";
            $this->custom5->TooltipValue = "";

            // custom6
            $this->custom6->LinkCustomAttributes = "";
            $this->custom6->HrefValue = "";
            $this->custom6->TooltipValue = "";

            // custom7
            $this->custom7->LinkCustomAttributes = "";
            $this->custom7->HrefValue = "";
            $this->custom7->TooltipValue = "";

            // custom8
            $this->custom8->LinkCustomAttributes = "";
            $this->custom8->HrefValue = "";
            $this->custom8->TooltipValue = "";

            // custom9
            $this->custom9->LinkCustomAttributes = "";
            $this->custom9->HrefValue = "";
            $this->custom9->TooltipValue = "";

            // custom10
            $this->custom10->LinkCustomAttributes = "";
            $this->custom10->HrefValue = "";
            $this->custom10->TooltipValue = "";

            // termination_date
            $this->termination_date->LinkCustomAttributes = "";
            $this->termination_date->HrefValue = "";
            $this->termination_date->TooltipValue = "";

            // ethnicity
            $this->ethnicity->LinkCustomAttributes = "";
            $this->ethnicity->HrefValue = "";
            $this->ethnicity->TooltipValue = "";

            // immigration_status
            $this->immigration_status->LinkCustomAttributes = "";
            $this->immigration_status->HrefValue = "";
            $this->immigration_status->TooltipValue = "";

            // approver1
            $this->approver1->LinkCustomAttributes = "";
            $this->approver1->HrefValue = "";
            $this->approver1->TooltipValue = "";

            // approver2
            $this->approver2->LinkCustomAttributes = "";
            $this->approver2->HrefValue = "";
            $this->approver2->TooltipValue = "";

            // approver3
            $this->approver3->LinkCustomAttributes = "";
            $this->approver3->HrefValue = "";
            $this->approver3->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeList"), "", $this->TableVar, true);
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
                case "x_gender":
                    break;
                case "x_nationality":
                    break;
                case "x_marital_status":
                    break;
                case "x_approver1":
                    break;
                case "x_approver2":
                    break;
                case "x_approver3":
                    break;
                case "x_status":
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
