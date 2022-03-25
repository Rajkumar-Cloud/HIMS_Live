<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOtherprocedureDelete extends IvfOtherprocedure
{
    use MessagesTrait;

    // Page ID
    public $PageID = "delete";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_otherprocedure';

    // Page object name
    public $PageObjName = "IvfOtherprocedureDelete";

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

        // Table object (ivf_otherprocedure)
        if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
            $GLOBALS["ivf_otherprocedure"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');
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
                $doc = new $class(Container("ivf_otherprocedure"));
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->Visible = false;
        $this->SEX->Visible = false;
        $this->Address->Visible = false;
        $this->DateofAdmission->setVisibility();
        $this->DateofProcedure->setVisibility();
        $this->DateofDischarge->setVisibility();
        $this->Consultant->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->ProcedureDone->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Chiefcomplaints->setVisibility();
        $this->MaritallHistory->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->PastHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->CNS->setVisibility();
        $this->_RS->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->InvestigationReport->setVisibility();
        $this->FinalDiagnosis->Visible = false;
        $this->Treatment->Visible = false;
        $this->DetailOfOperation->Visible = false;
        $this->FollowUpAdvice->Visible = false;
        $this->FollowUpMedication->Visible = false;
        $this->Plan->Visible = false;
        $this->TempleteFinalDiagnosis->Visible = false;
        $this->TemplateTreatment->Visible = false;
        $this->TemplateOperation->Visible = false;
        $this->TemplateFollowUpAdvice->Visible = false;
        $this->TemplateFollowUpMedication->Visible = false;
        $this->TemplatePlan->Visible = false;
        $this->QRCode->Visible = false;
        $this->TidNo->setVisibility();
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
        $this->setupLookupOptions($this->Name);
        $this->setupLookupOptions($this->Consultant);
        $this->setupLookupOptions($this->Surgeon);
        $this->setupLookupOptions($this->Anesthetist);
        $this->setupLookupOptions($this->TempleteFinalDiagnosis);
        $this->setupLookupOptions($this->TemplateTreatment);
        $this->setupLookupOptions($this->TemplateOperation);
        $this->setupLookupOptions($this->TemplateFollowUpAdvice);
        $this->setupLookupOptions($this->TemplateFollowUpMedication);
        $this->setupLookupOptions($this->TemplatePlan);

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Load key parameters
        $this->RecKeys = $this->getRecordKeys(); // Load record keys
        $filter = $this->getFilterFromRecordKeys();
        if ($filter == "") {
            $this->terminate("IvfOtherprocedureList"); // Prevent SQL injection, return to list
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
                $this->terminate("IvfOtherprocedureList"); // Return to list
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Address->setDbValue($row['Address']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateofProcedure->setDbValue($row['DateofProcedure']);
        $this->DateofDischarge->setDbValue($row['DateofDischarge']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->ProcedureDone->setDbValue($row['ProcedureDone']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MaritallHistory->setDbValue($row['MaritallHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->CNS->setDbValue($row['CNS']);
        $this->_RS->setDbValue($row['RS']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->InvestigationReport->setDbValue($row['InvestigationReport']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
        $this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
        $this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
        $this->Plan->setDbValue($row['Plan']);
        $this->TempleteFinalDiagnosis->setDbValue($row['TempleteFinalDiagnosis']);
        $this->TemplateTreatment->setDbValue($row['TemplateTreatment']);
        $this->TemplateOperation->setDbValue($row['TemplateOperation']);
        $this->TemplateFollowUpAdvice->setDbValue($row['TemplateFollowUpAdvice']);
        $this->TemplateFollowUpMedication->setDbValue($row['TemplateFollowUpMedication']);
        $this->TemplatePlan->setDbValue($row['TemplatePlan']);
        $this->QRCode->setDbValue($row['QRCode']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['SEX'] = null;
        $row['Address'] = null;
        $row['DateofAdmission'] = null;
        $row['DateofProcedure'] = null;
        $row['DateofDischarge'] = null;
        $row['Consultant'] = null;
        $row['Surgeon'] = null;
        $row['Anesthetist'] = null;
        $row['IdentificationMark'] = null;
        $row['ProcedureDone'] = null;
        $row['PROVISIONALDIAGNOSIS'] = null;
        $row['Chiefcomplaints'] = null;
        $row['MaritallHistory'] = null;
        $row['MenstrualHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['PastHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['Temp'] = null;
        $row['Pulse'] = null;
        $row['BP'] = null;
        $row['CNS'] = null;
        $row['RS'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['InvestigationReport'] = null;
        $row['FinalDiagnosis'] = null;
        $row['Treatment'] = null;
        $row['DetailOfOperation'] = null;
        $row['FollowUpAdvice'] = null;
        $row['FollowUpMedication'] = null;
        $row['Plan'] = null;
        $row['TempleteFinalDiagnosis'] = null;
        $row['TemplateTreatment'] = null;
        $row['TemplateOperation'] = null;
        $row['TemplateFollowUpAdvice'] = null;
        $row['TemplateFollowUpMedication'] = null;
        $row['TemplatePlan'] = null;
        $row['QRCode'] = null;
        $row['TidNo'] = null;
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

        // RIDNO

        // Name

        // Age

        // SEX

        // Address

        // DateofAdmission

        // DateofProcedure

        // DateofDischarge

        // Consultant

        // Surgeon

        // Anesthetist

        // IdentificationMark

        // ProcedureDone

        // PROVISIONALDIAGNOSIS

        // Chiefcomplaints

        // MaritallHistory

        // MenstrualHistory

        // SurgicalHistory

        // PastHistory

        // FamilyHistory

        // Temp

        // Pulse

        // BP

        // CNS

        // RS

        // CVS

        // PA

        // InvestigationReport

        // FinalDiagnosis

        // Treatment

        // DetailOfOperation

        // FollowUpAdvice

        // FollowUpMedication

        // Plan

        // TempleteFinalDiagnosis

        // TemplateTreatment

        // TemplateOperation

        // TemplateFollowUpAdvice

        // TemplateFollowUpMedication

        // TemplatePlan

        // QRCode

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $curVal = trim(strval($this->Name->CurrentValue));
            if ($curVal != "") {
                $this->Name->ViewValue = $this->Name->lookupCacheOption($curVal);
                if ($this->Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Name->Lookup->renderViewRow($rswrk[0]);
                        $this->Name->ViewValue = $this->Name->displayValue($arwrk);
                    } else {
                        $this->Name->ViewValue = $this->Name->CurrentValue;
                    }
                }
            } else {
                $this->Name->ViewValue = null;
            }
            $this->Name->ViewCustomAttributes = "";

            // DateofAdmission
            $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
            $this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 11);
            $this->DateofAdmission->ViewCustomAttributes = "";

            // DateofProcedure
            $this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
            $this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 11);
            $this->DateofProcedure->ViewCustomAttributes = "";

            // DateofDischarge
            $this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
            $this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 11);
            $this->DateofDischarge->ViewCustomAttributes = "";

            // Consultant
            $curVal = trim(strval($this->Consultant->CurrentValue));
            if ($curVal != "") {
                $this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
                if ($this->Consultant->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Consultant->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Consultant->Lookup->renderViewRow($rswrk[0]);
                        $this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
                    } else {
                        $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
                    }
                }
            } else {
                $this->Consultant->ViewValue = null;
            }
            $this->Consultant->ViewCustomAttributes = "";

            // Surgeon
            $curVal = trim(strval($this->Surgeon->CurrentValue));
            if ($curVal != "") {
                $this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
                if ($this->Surgeon->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Surgeon->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Surgeon->Lookup->renderViewRow($rswrk[0]);
                        $this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
                    } else {
                        $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
                    }
                }
            } else {
                $this->Surgeon->ViewValue = null;
            }
            $this->Surgeon->ViewCustomAttributes = "";

            // Anesthetist
            $curVal = trim(strval($this->Anesthetist->CurrentValue));
            if ($curVal != "") {
                $this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
                if ($this->Anesthetist->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Anesthetist->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Anesthetist->Lookup->renderViewRow($rswrk[0]);
                        $this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
                    } else {
                        $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
                    }
                }
            } else {
                $this->Anesthetist->ViewValue = null;
            }
            $this->Anesthetist->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // ProcedureDone
            $this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
            $this->ProcedureDone->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
            $this->Chiefcomplaints->ViewCustomAttributes = "";

            // MaritallHistory
            $this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
            $this->MaritallHistory->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // PastHistory
            $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
            $this->PastHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RS
            $this->_RS->ViewValue = $this->_RS->CurrentValue;
            $this->_RS->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // InvestigationReport
            $this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
            $this->InvestigationReport->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->ExportHrefValue = Barcode()->getHrefValue($this->RIDNO->CurrentValue, 'EAN-13', 60);
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";
            $this->DateofAdmission->TooltipValue = "";

            // DateofProcedure
            $this->DateofProcedure->LinkCustomAttributes = "";
            $this->DateofProcedure->HrefValue = "";
            $this->DateofProcedure->TooltipValue = "";

            // DateofDischarge
            $this->DateofDischarge->LinkCustomAttributes = "";
            $this->DateofDischarge->HrefValue = "";
            $this->DateofDischarge->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // ProcedureDone
            $this->ProcedureDone->LinkCustomAttributes = "";
            $this->ProcedureDone->HrefValue = "";
            $this->ProcedureDone->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";
            $this->Chiefcomplaints->TooltipValue = "";

            // MaritallHistory
            $this->MaritallHistory->LinkCustomAttributes = "";
            $this->MaritallHistory->HrefValue = "";
            $this->MaritallHistory->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";
            $this->PastHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";

            // RS
            $this->_RS->LinkCustomAttributes = "";
            $this->_RS->HrefValue = "";
            $this->_RS->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // InvestigationReport
            $this->InvestigationReport->LinkCustomAttributes = "";
            $this->InvestigationReport->HrefValue = "";
            $this->InvestigationReport->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOtherprocedureList"), "", $this->TableVar, true);
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
                case "x_Name":
                    break;
                case "x_Consultant":
                    break;
                case "x_Surgeon":
                    break;
                case "x_Anesthetist":
                    break;
                case "x_TempleteFinalDiagnosis":
                    $lookupFilter = function () {
                        return "`TemplateType`='TemplateDiagnosis'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateTreatment":
                    $lookupFilter = function () {
                        return "`TemplateType`='Treatment'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateOperation":
                    $lookupFilter = function () {
                        return "`TemplateType`='Operation'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFollowUpAdvice":
                    $lookupFilter = function () {
                        return "`TemplateType`='FollowUpAdvice '";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFollowUpMedication":
                    $lookupFilter = function () {
                        return "`TemplateType`='FollowUpMedication'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplatePlan":
                    $lookupFilter = function () {
                        return "`TemplateType`='TemplatePlan'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
