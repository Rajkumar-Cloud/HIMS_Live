<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfDelete extends Ivf
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf';

    // Page object name
    public $PageObjName = "IvfDelete";

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

        // Table object (ivf)
        if (!isset($GLOBALS["ivf"]) || get_class($GLOBALS["ivf"]) == PROJECT_NAMESPACE . "ivf") {
            $GLOBALS["ivf"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf');
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
                $doc = new $class(Container("ivf"));
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
        $this->Male->setVisibility();
        $this->Female->setVisibility();
        $this->status->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->malepropic->setVisibility();
        $this->femalepropic->setVisibility();
        $this->HusbandEducation->setVisibility();
        $this->WifeEducation->setVisibility();
        $this->HusbandWorkHours->setVisibility();
        $this->WifeWorkHours->setVisibility();
        $this->PatientLanguage->setVisibility();
        $this->ReferedBy->setVisibility();
        $this->ReferPhNo->setVisibility();
        $this->WifeCell->setVisibility();
        $this->HusbandCell->setVisibility();
        $this->WifeEmail->setVisibility();
        $this->HusbandEmail->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->malepic->Visible = false;
        $this->femalepic->Visible = false;
        $this->Mgendar->Visible = false;
        $this->Fgendar->Visible = false;
        $this->CoupleID->setVisibility();
        $this->HospID->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatientID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerID->setVisibility();
        $this->DrID->setVisibility();
        $this->DrDepartment->setVisibility();
        $this->Doctor->setVisibility();
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
        $this->setupLookupOptions($this->Male);
        $this->setupLookupOptions($this->Female);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->ReferedBy);
        $this->setupLookupOptions($this->DrID);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("IvfList"); // Prevent SQL injection, return to list
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
                $this->terminate("IvfList"); // Return to list
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
        $this->Male->setDbValue($row['Male']);
        if (array_key_exists('EV__Male', $row)) {
            $this->Male->VirtualValue = $row['EV__Male']; // Set up virtual field value
        } else {
            $this->Male->VirtualValue = ""; // Clear value
        }
        $this->Female->setDbValue($row['Female']);
        if (array_key_exists('EV__Female', $row)) {
            $this->Female->VirtualValue = $row['EV__Female']; // Set up virtual field value
        } else {
            $this->Female->VirtualValue = ""; // Clear value
        }
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->malepropic->Upload->DbValue = $row['malepropic'];
        $this->malepropic->setDbValue($this->malepropic->Upload->DbValue);
        $this->femalepropic->Upload->DbValue = $row['femalepropic'];
        $this->femalepropic->setDbValue($this->femalepropic->Upload->DbValue);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        if (array_key_exists('EV__ReferedBy', $row)) {
            $this->ReferedBy->VirtualValue = $row['EV__ReferedBy']; // Set up virtual field value
        } else {
            $this->ReferedBy->VirtualValue = ""; // Clear value
        }
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->WifeEmail->setDbValue($row['WifeEmail']);
        $this->HusbandEmail->setDbValue($row['HusbandEmail']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->malepic->setDbValue($row['malepic']);
        $this->femalepic->setDbValue($row['femalepic']);
        $this->Mgendar->setDbValue($row['Mgendar']);
        $this->Fgendar->setDbValue($row['Fgendar']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->Doctor->setDbValue($row['Doctor']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Male'] = null;
        $row['Female'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['malepropic'] = null;
        $row['femalepropic'] = null;
        $row['HusbandEducation'] = null;
        $row['WifeEducation'] = null;
        $row['HusbandWorkHours'] = null;
        $row['WifeWorkHours'] = null;
        $row['PatientLanguage'] = null;
        $row['ReferedBy'] = null;
        $row['ReferPhNo'] = null;
        $row['WifeCell'] = null;
        $row['HusbandCell'] = null;
        $row['WifeEmail'] = null;
        $row['HusbandEmail'] = null;
        $row['ARTCYCLE'] = null;
        $row['RESULT'] = null;
        $row['malepic'] = null;
        $row['femalepic'] = null;
        $row['Mgendar'] = null;
        $row['Fgendar'] = null;
        $row['CoupleID'] = null;
        $row['HospID'] = null;
        $row['PatientName'] = null;
        $row['PatientID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerID'] = null;
        $row['DrID'] = null;
        $row['DrDepartment'] = null;
        $row['Doctor'] = null;
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

        // Male

        // Female

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // malepropic

        // femalepropic

        // HusbandEducation

        // WifeEducation

        // HusbandWorkHours

        // WifeWorkHours

        // PatientLanguage

        // ReferedBy

        // ReferPhNo

        // WifeCell

        // HusbandCell

        // WifeEmail

        // HusbandEmail

        // ARTCYCLE

        // RESULT

        // malepic

        // femalepic

        // Mgendar

        // Fgendar

        // CoupleID

        // HospID

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // DrID

        // DrDepartment

        // Doctor
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Male
            if ($this->Male->VirtualValue != "") {
                $this->Male->ViewValue = $this->Male->VirtualValue;
            } else {
                $curVal = trim(strval($this->Male->CurrentValue));
                if ($curVal != "") {
                    $this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
                    if ($this->Male->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->Male->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Male->Lookup->renderViewRow($rswrk[0]);
                            $this->Male->ViewValue = $this->Male->displayValue($arwrk);
                        } else {
                            $this->Male->ViewValue = $this->Male->CurrentValue;
                        }
                    }
                } else {
                    $this->Male->ViewValue = null;
                }
            }
            $this->Male->ViewCustomAttributes = "";

            // Female
            if ($this->Female->VirtualValue != "") {
                $this->Female->ViewValue = $this->Female->VirtualValue;
            } else {
                $curVal = trim(strval($this->Female->CurrentValue));
                if ($curVal != "") {
                    $this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
                    if ($this->Female->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->Female->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Female->Lookup->renderViewRow($rswrk[0]);
                            $this->Female->ViewValue = $this->Female->displayValue($arwrk);
                        } else {
                            $this->Female->ViewValue = $this->Female->CurrentValue;
                        }
                    }
                } else {
                    $this->Female->ViewValue = null;
                }
            }
            $this->Female->ViewCustomAttributes = "";

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

            // malepropic
            if (!EmptyValue($this->malepropic->Upload->DbValue)) {
                $this->malepropic->ImageWidth = 80;
                $this->malepropic->ImageHeight = 80;
                $this->malepropic->ImageAlt = $this->malepropic->alt();
                $this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
            } else {
                $this->malepropic->ViewValue = "";
            }
            $this->malepropic->ViewCustomAttributes = "";

            // femalepropic
            if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
                $this->femalepropic->ImageWidth = 80;
                $this->femalepropic->ImageHeight = 80;
                $this->femalepropic->ImageAlt = $this->femalepropic->alt();
                $this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
            } else {
                $this->femalepropic->ViewValue = "";
            }
            $this->femalepropic->ViewCustomAttributes = "";

            // HusbandEducation
            $this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
            $this->HusbandEducation->ViewCustomAttributes = "";

            // WifeEducation
            $this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
            $this->WifeEducation->ViewCustomAttributes = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
            $this->HusbandWorkHours->ViewCustomAttributes = "";

            // WifeWorkHours
            $this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
            $this->WifeWorkHours->ViewCustomAttributes = "";

            // PatientLanguage
            $this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
            $this->PatientLanguage->ViewCustomAttributes = "";

            // ReferedBy
            if ($this->ReferedBy->VirtualValue != "") {
                $this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferedBy->CurrentValue));
                if ($curVal != "") {
                    $this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
                    if ($this->ReferedBy->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferedBy->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
                        } else {
                            $this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferedBy->ViewValue = null;
                }
            }
            $this->ReferedBy->ViewCustomAttributes = "";

            // ReferPhNo
            $this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
            $this->ReferPhNo->ViewCustomAttributes = "";

            // WifeCell
            $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
            $this->WifeCell->ViewCustomAttributes = "";

            // HusbandCell
            $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
            $this->HusbandCell->ViewCustomAttributes = "";

            // WifeEmail
            $this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
            $this->WifeEmail->ViewCustomAttributes = "";

            // HusbandEmail
            $this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
            $this->HusbandEmail->ViewCustomAttributes = "";

            // ARTCYCLE
            if (strval($this->ARTCYCLE->CurrentValue) != "") {
                $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
            } else {
                $this->ARTCYCLE->ViewValue = null;
            }
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            if (strval($this->RESULT->CurrentValue) != "") {
                $this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
            } else {
                $this->RESULT->ViewValue = null;
            }
            $this->RESULT->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

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

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Male
            $this->Male->LinkCustomAttributes = "";
            $this->Male->HrefValue = "";
            $this->Male->TooltipValue = "";

            // Female
            $this->Female->LinkCustomAttributes = "";
            $this->Female->HrefValue = "";
            $this->Female->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // malepropic
            $this->malepropic->LinkCustomAttributes = "";
            if (!EmptyValue($this->malepropic->Upload->DbValue)) {
                $this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->htmlDecode($this->malepropic->Upload->DbValue)); // Add prefix/suffix
                $this->malepropic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
                }
            } else {
                $this->malepropic->HrefValue = "";
            }
            $this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
            $this->malepropic->TooltipValue = "";
            if ($this->malepropic->UseColorbox) {
                if (EmptyValue($this->malepropic->TooltipValue)) {
                    $this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->malepropic->LinkAttrs["data-rel"] = "ivf_x_malepropic";
                $this->malepropic->LinkAttrs->appendClass("ew-lightbox");
            }

            // femalepropic
            $this->femalepropic->LinkCustomAttributes = "";
            if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
                $this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->htmlDecode($this->femalepropic->Upload->DbValue)); // Add prefix/suffix
                $this->femalepropic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
                }
            } else {
                $this->femalepropic->HrefValue = "";
            }
            $this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
            $this->femalepropic->TooltipValue = "";
            if ($this->femalepropic->UseColorbox) {
                if (EmptyValue($this->femalepropic->TooltipValue)) {
                    $this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->femalepropic->LinkAttrs["data-rel"] = "ivf_x_femalepropic";
                $this->femalepropic->LinkAttrs->appendClass("ew-lightbox");
            }

            // HusbandEducation
            $this->HusbandEducation->LinkCustomAttributes = "";
            $this->HusbandEducation->HrefValue = "";
            $this->HusbandEducation->TooltipValue = "";

            // WifeEducation
            $this->WifeEducation->LinkCustomAttributes = "";
            $this->WifeEducation->HrefValue = "";
            $this->WifeEducation->TooltipValue = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->LinkCustomAttributes = "";
            $this->HusbandWorkHours->HrefValue = "";
            $this->HusbandWorkHours->TooltipValue = "";

            // WifeWorkHours
            $this->WifeWorkHours->LinkCustomAttributes = "";
            $this->WifeWorkHours->HrefValue = "";
            $this->WifeWorkHours->TooltipValue = "";

            // PatientLanguage
            $this->PatientLanguage->LinkCustomAttributes = "";
            $this->PatientLanguage->HrefValue = "";
            $this->PatientLanguage->TooltipValue = "";

            // ReferedBy
            $this->ReferedBy->LinkCustomAttributes = "";
            $this->ReferedBy->HrefValue = "";
            $this->ReferedBy->TooltipValue = "";

            // ReferPhNo
            $this->ReferPhNo->LinkCustomAttributes = "";
            $this->ReferPhNo->HrefValue = "";
            $this->ReferPhNo->TooltipValue = "";

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";
            $this->WifeCell->TooltipValue = "";

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";
            $this->HusbandCell->TooltipValue = "";

            // WifeEmail
            $this->WifeEmail->LinkCustomAttributes = "";
            $this->WifeEmail->HrefValue = "";
            $this->WifeEmail->TooltipValue = "";

            // HusbandEmail
            $this->HusbandEmail->LinkCustomAttributes = "";
            $this->HusbandEmail->HrefValue = "";
            $this->HusbandEmail->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // DrDepartment
            $this->DrDepartment->LinkCustomAttributes = "";
            $this->DrDepartment->HrefValue = "";
            $this->DrDepartment->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfList"), "", $this->TableVar, true);
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
                case "x_Male":
                    break;
                case "x_Female":
                    break;
                case "x_status":
                    break;
                case "x_ReferedBy":
                    break;
                case "x_ARTCYCLE":
                    break;
                case "x_RESULT":
                    break;
                case "x_DrID":
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
